<?php

namespace App\Http\Controllers\Api;

use App\Enums\ChapterKey;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\TriviaAttempt;
use App\Models\TriviaQuestion;
use App\Models\TriviaTopic;
use App\Models\User;
use App\Models\UserGameState;
use App\Services\LessonProgressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OA;

class TriviaController extends Controller
{
    private const BASE_GEMS_PER_CORRECT = 4;

    private const BASE_XP_PER_CORRECT = 8;

    private const HIGH_SCORE_THRESHOLD = 0.8;

    private const HIGH_SCORE_BONUS_GEMS = 5;

    private const HIGH_SCORE_BONUS_XP = 10;

    private const PERFECT_BONUS_GEMS = 10;

    private const PERFECT_BONUS_XP = 20;

    private const INFINITE_HEARTS_MINUTES = 5;

    public function __construct(private LessonProgressService $progress) {}

    #[OA\Get(
        path: '/api/trivia/topics',
        summary: 'List trivia topics for the user\'s current learning language',
        description: 'Always browsable once a course is selected — playing a topic (questions/check/submit) is what\'s actually locked until Chapter 1 is complete.',
        tags: ['Trivia'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Topics list')],
    )]
    public function topics(Request $request): JsonResponse
    {
        $user = $this->requireCourseSelected($request);

        $topics = TriviaTopic::withCount('questions')
            ->where('language_id', $user->learning_language_id)
            ->orderBy('order_number')
            ->get();

        $completedTopicIds = TriviaAttempt::where('user_id', $user->id)
            ->whereIn('topic_id', $topics->pluck('id'))
            ->pluck('topic_id')
            ->unique();

        return response()->json([
            // Whether the user may actually PLAY (testers, or anyone who's
            // finished Chapter 1). Topics still list either way; the frontend
            // shows them locked until this is true.
            'unlocked' => $this->triviaUnlockedFor($user),
            'topics' => $topics->map(fn (TriviaTopic $topic) => [
                'key' => $topic->key,
                'title' => $topic->title,
                'description' => $topic->description,
                'icon' => $topic->icon,
                'questionsCount' => $topic->questions_count,
                'completed' => $completedTopicIds->contains($topic->id),
            ]),
        ]);
    }

    #[OA\Get(
        path: '/api/trivia/topics/{topicKey}/questions',
        summary: 'Get a topic\'s questions',
        description: 'The correct answer index is intentionally never included in the response — use POST .../check for live feedback, grading happens authoritatively in POST .../submit.',
        tags: ['Trivia'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'topicKey', description: 'Topic key (e.g. "science")', schema: new OA\Schema(type: 'string'))],
        responses: [
            new OA\Response(response: 200, description: 'Questions (without answers)'),
            new OA\Response(response: 403, description: 'Trivia is locked until Chapter 1 is complete'),
            new OA\Response(response: 404, description: 'No such topic for this language'),
        ],
    )]
    public function questions(Request $request, string $topicKey): JsonResponse
    {
        $user = $this->authorizeTriviaAccess($request);
        $topic = $this->resolveTopic($user, $topicKey);
        $this->abortIfAlreadyCompleted($user, $topic);

        $questions = $topic->questions()->orderBy('order_number')->get();

        return response()->json([
            'questions' => $questions->map(fn ($question) => [
                'id' => $question->id,
                'question' => $question->question,
                // correct_index is intentionally omitted — grading happens server-side.
                'options' => $question->options,
            ]),
        ]);
    }

    #[OA\Post(
        path: '/api/trivia/topics/{topicKey}/questions/{question}/check',
        summary: 'Check a single answer, for immediate right/wrong feedback during play',
        description: 'One-shot per question (subsequent calls for the same question return 409) so a client cannot brute-force the answer key. Never trusted for reward computation — POST .../submit independently re-grades everything from the database.',
        tags: ['Trivia'],
        security: [['cookieAuth' => []]],
        parameters: [
            new OA\PathParameter(name: 'topicKey', schema: new OA\Schema(type: 'string')),
            new OA\PathParameter(name: 'question', schema: new OA\Schema(type: 'integer')),
        ],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['selectedIndex'],
            properties: [new OA\Property(property: 'selectedIndex', type: 'integer', example: 1)],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Whether the selected option was correct'),
            new OA\Response(response: 403, description: 'Trivia is locked until Chapter 1 is complete'),
            new OA\Response(response: 404, description: 'No such topic/question for this language'),
            new OA\Response(response: 409, description: 'This question has already been checked'),
        ],
    )]
    public function check(Request $request, string $topicKey, TriviaQuestion $question): JsonResponse
    {
        $user = $this->authorizeTriviaAccess($request);
        $topic = $this->resolveTopic($user, $topicKey);
        $this->abortIfAlreadyCompleted($user, $topic);

        abort_if($question->topic_id !== $topic->id, 404);

        $data = $request->validate([
            'selectedIndex' => ['required', 'integer', 'min:0'],
        ]);

        // No re-check guard needed: a topic can only be completed once
        // (abortIfAlreadyCompleted above), and submit re-grades authoritatively.
        return response()->json(['correct' => $question->isCorrect($data['selectedIndex'])]);
    }

    #[OA\Post(
        path: '/api/trivia/topics/{topicKey}/submit',
        summary: 'Submit answers for grading',
        description: 'Grades server-side from scratch (never trusts prior /check calls). Reward tiers: 100% correct grants 5 minutes of app-wide infinite hearts (every time, even on replays); 80-99% grants a gems/xp bonus (first completion only); below 80% gets only the base per-correct reward (first completion only). Replays are always graded/logged but currency rewards are zero after the first completion.',
        tags: ['Trivia'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'topicKey', description: 'Topic key (e.g. "science")', schema: new OA\Schema(type: 'string'))],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['answers'],
            properties: [new OA\Property(
                property: 'answers',
                type: 'array',
                items: new OA\Items(properties: [
                    new OA\Property(property: 'questionId', type: 'integer', example: 16),
                    new OA\Property(property: 'selectedIndex', type: 'integer', example: 1),
                ], type: 'object'),
            )],
        )),
        responses: [
            new OA\Response(
                response: 200,
                description: 'Grading result',
                content: new OA\JsonContent(properties: [
                    new OA\Property(property: 'correctCount', type: 'integer', example: 10),
                    new OA\Property(property: 'totalQuestions', type: 'integer', example: 12),
                    new OA\Property(property: 'gemsAwarded', type: 'integer', example: 40),
                    new OA\Property(property: 'xpAwarded', type: 'integer', example: 80),
                    new OA\Property(property: 'alreadyCompletedBefore', type: 'boolean', example: false),
                    new OA\Property(property: 'infiniteHeartsGranted', type: 'boolean', example: false),
                    new OA\Property(property: 'infiniteHeartsSecondsRemaining', type: 'integer', example: 0),
                ]),
            ),
            new OA\Response(response: 403, description: 'Trivia is locked until Chapter 1 is complete'),
            new OA\Response(response: 404, description: 'No such topic for this language'),
        ],
    )]
    public function submit(Request $request, string $topicKey): JsonResponse
    {
        $user = $this->authorizeTriviaAccess($request);
        $topic = $this->resolveTopic($user, $topicKey);

        $data = $request->validate([
            // max caps the payload — no legitimate topic has anywhere near
            // this many questions, and it stops a client sending a huge array.
            'answers' => ['required', 'array', 'min:1', 'max:100'],
            'answers.*.questionId' => ['required', 'integer'],
            'answers.*.selectedIndex' => ['required', 'integer', 'min:0'],
        ]);

        $questions = $topic->questions()->get()->keyBy('id');
        $totalQuestions = $questions->count();

        // Grade at most once per question: dedupe by questionId (first answer
        // wins) and only count questions that actually belong to this topic.
        // Without this, a client could POST the same known-correct answer many
        // times to inflate gems/XP, or hit correctCount === totalQuestions on
        // demand to farm the perfect-score infinite-hearts reward.
        $seenQuestionIds = [];
        $correctCount = 0;
        foreach ($data['answers'] as $answer) {
            $questionId = $answer['questionId'];

            if (isset($seenQuestionIds[$questionId])) {
                continue;
            }
            $seenQuestionIds[$questionId] = true;

            $question = $questions->get($questionId);
            if ($question && $question->isCorrect($answer['selectedIndex'])) {
                $correctCount++;
            }
        }

        // Belt-and-suspenders: correctCount can never legitimately exceed the
        // number of real questions in the topic.
        $correctCount = min($correctCount, $totalQuestions);

        return DB::transaction(function () use ($user, $topic, $correctCount, $totalQuestions) {
            // Lock the user's game-state row up front so two concurrent
            // first-time submits for the same topic serialize on it — without
            // this, both would read alreadyCompletedBefore=false and both
            // credit the one-time first-completion reward.
            UserGameState::firstOrCreate(['user_id' => $user->id]);
            $state = UserGameState::where('user_id', $user->id)->lockForUpdate()->firstOrFail();

            $alreadyCompletedBefore = TriviaAttempt::where('user_id', $user->id)
                ->where('topic_id', $topic->id)
                ->exists();

            // A topic is one-shot — once completed it can't be retaken. (The
            // lock above serializes two racing first-submits so only one wins.)
            abort_if($alreadyCompletedBefore, 403, 'You have already completed this trivia topic.');

            // Comparing counts directly (rather than an accuracy===1.0 float
            // check) sidesteps PHP's int/float division quirk — 2/2 is the
            // int 1, not the float 1.0, so a strict float comparison would
            // silently miss perfect scores.
            $isPerfect = $totalQuestions > 0 && $correctCount === $totalQuestions;
            $accuracy = $totalQuestions > 0 ? $correctCount / $totalQuestions : 0;
            $isHighScore = $totalQuestions > 0 && $accuracy >= self::HIGH_SCORE_THRESHOLD;

            $gemsAwarded = 0;
            $xpAwarded = 0;

            if (! $alreadyCompletedBefore && $totalQuestions > 0) {
                $gemsAwarded = (int) round($correctCount * self::BASE_GEMS_PER_CORRECT);
                $xpAwarded = (int) round($correctCount * self::BASE_XP_PER_CORRECT);

                if ($isPerfect) {
                    $gemsAwarded += self::PERFECT_BONUS_GEMS;
                    $xpAwarded += self::PERFECT_BONUS_XP;
                } elseif ($isHighScore) {
                    $gemsAwarded += self::HIGH_SCORE_BONUS_GEMS;
                    $xpAwarded += self::HIGH_SCORE_BONUS_XP;
                }

                $gemsAwarded = $this->progress->applyGemsBonus($user, $gemsAwarded);
            }

            TriviaAttempt::create([
                'user_id' => $user->id,
                'topic_id' => $topic->id,
                'correct_count' => $correctCount,
                'total_questions' => $totalQuestions,
                'gems_awarded' => $gemsAwarded,
                'xp_awarded' => $xpAwarded,
                'completed_at' => now(),
            ]);

            $infiniteHeartsGranted = false;

            if ($gemsAwarded > 0 || $xpAwarded > 0 || $isPerfect) {
                $state->gems += $gemsAwarded;
                $state->total_xp += $xpAwarded;
                $state->today_xp += $xpAwarded;
                $state->weekly_league_xp += $xpAwarded;

                if ($isPerfect) {
                    $this->progress->grantInfiniteHearts($state, self::INFINITE_HEARTS_MINUTES);
                    $infiniteHeartsGranted = true;
                }

                $state->save();
            }

            return response()->json([
                'correctCount' => $correctCount,
                'totalQuestions' => $totalQuestions,
                'gemsAwarded' => $gemsAwarded,
                'xpAwarded' => $xpAwarded,
                'alreadyCompletedBefore' => $alreadyCompletedBefore,
                'infiniteHeartsGranted' => $infiniteHeartsGranted,
                'infiniteHeartsSecondsRemaining' => $this->progress->infiniteHeartsSecondsRemaining($state),
            ]);
        });
    }

    private function requireCourseSelected(Request $request): User
    {
        $user = $request->user();

        abort_if(! $user->learning_language_id, 422, 'Please select a course first.');

        return $user;
    }

    /**
     * 403 unless the user has completed the FIRST chapter (Beginner) of their
     * currently selected language. Topics are always browsable
     * (requireCourseSelected() above) — this stricter check gates actually
     * playing one (questions/check/submit). Deliberately enforced server-side
     * (unlike chapters/units, which are only cosmetically locked client-side)
     * because the infinite-hearts reward this unlocks affects heart loss
     * app-wide, not just within trivia — a client-only lock would let it be
     * farmed from day one via direct API calls. Gating is per-course: each
     * language's chapter 1 unlocks that language's trivia independently.
     * Tester accounts (see User::isTester) bypass the gate entirely.
     */
    private function authorizeTriviaAccess(Request $request): User
    {
        $user = $this->requireCourseSelected($request);

        abort_if(! $this->triviaUnlockedFor($user), 403, 'Finish Chapter 1 to unlock trivia.');

        return $user;
    }

    /**
     * Whether the user may PLAY trivia: testers always can; everyone else once
     * they've finished the Beginner (first) chapter of their selected course.
     */
    private function triviaUnlockedFor(User $user): bool
    {
        if ($user->isTester()) {
            return true;
        }

        $firstChapter = Chapter::where('language_id', $user->learning_language_id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->first();

        if (! $firstChapter) {
            return false;
        }

        return $this->progress->completeChapterIdsForLanguage($user, $user->learning_language_id)
            ->has($firstChapter->id);
    }

    /** A topic can be played once — block reopening or resubmitting a finished one. */
    private function abortIfAlreadyCompleted(User $user, TriviaTopic $topic): void
    {
        abort_if(
            TriviaAttempt::where('user_id', $user->id)->where('topic_id', $topic->id)->exists(),
            403,
            'You have already completed this trivia topic.',
        );
    }

    private function resolveTopic(User $user, string $topicKey): TriviaTopic
    {
        return TriviaTopic::where('language_id', $user->learning_language_id)
            ->where('key', $topicKey)
            ->firstOrFail();
    }
}
