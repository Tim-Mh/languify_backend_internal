<?php

namespace App\Http\Controllers\Api;

use App\Enums\ChestType;
use App\Http\Controllers\Controller;
use App\Models\AlphabetLetter;
use App\Models\Chapter;
use App\Models\ChestClaim;
use App\Models\ExerciseInstruction;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Unit;
use App\Models\UserCourse;
use App\Models\UserLessonCompletion;
use App\Services\CourseTitleService;
use App\Services\ExerciseContentService;
use App\Services\LessonProgressService;
use App\Services\WordStrengthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use OpenApi\Attributes as OA;

class CourseController extends Controller
{
    private const PROFICIENCY_LEVELS = ['beginner', 'some_knowledge', 'conversational'];

    private const STREAK_GOAL_DAYS = [10, 20, 30, 40, 50];

    public function __construct(
        private LessonProgressService $progress,
        private WordStrengthService $words,
        private ExerciseContentService $content,
        private CourseTitleService $titles,
    ) {}

    #[OA\Get(
        path: '/api/languages',
        summary: 'List all active languages available for native/learning selection',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Languages list')],
    )]
    public function languages(): JsonResponse
    {
        $languages = Language::where('is_active', true)->orderBy('name')->get();

        return response()->json([
            'languages' => $languages->map(fn (Language $language) => [
                'id' => $language->id,
                'code' => $language->code,
                'name' => $language->name,
                'nativeName' => $language->native_name,
                'flagEmoji' => $language->flag_emoji,
                // False for a language the app is translated into but has no
                // course for yet, so the native picker can offer it while the
                // learning picker hides it.
                'isLearnable' => $language->is_learnable,
            ]),
        ]);
    }

    #[OA\Post(
        path: '/api/course/select',
        summary: 'Select (or switch to) a native/learning language pair',
        description: 'Also upserts a user_courses enrollment row for the learning language, marking it active and deactivating any other course.',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['nativeLanguageId', 'learningLanguageId'],
            properties: [
                new OA\Property(property: 'nativeLanguageId', type: 'integer', example: 3),
                new OA\Property(property: 'learningLanguageId', type: 'integer', example: 7),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Course selected successfully'),
            new OA\Response(response: 422, description: 'Validation error'),
        ],
    )]
    public function selectCourse(Request $request): JsonResponse
    {
        $data = $request->validate([
            'nativeLanguageId' => ['required', 'integer', 'exists:languages,id'],
            'learningLanguageId' => ['required', 'integer', 'exists:languages,id', 'different:nativeLanguageId'],
        ], [
            'learningLanguageId.different' => "You can't learn a language you've chosen as your native language.",
        ]);

        $user = $request->user();

        $user->forceFill([
            'native_language_id' => $data['nativeLanguageId'],
            'learning_language_id' => $data['learningLanguageId'],
        ])->save();

        DB::transaction(function () use ($user, $data) {
            UserCourse::where('user_id', $user->id)->update(['is_active' => false]);

            // Keyed by (user, learning, native): the same learning language with a
            // different native is a separate course with its own progress.
            $course = UserCourse::firstOrNew([
                'user_id' => $user->id,
                'language_id' => $data['learningLanguageId'],
                'native_language_id' => $data['nativeLanguageId'],
            ]);

            if (! $course->exists) {
                $course->enrolled_at = now();
            }

            $course->native_language_id = $data['nativeLanguageId'];
            $course->proficiency_level = $user->proficiency_level;
            $course->is_active = true;
            $course->save();
        });

        $user->refresh()->load('nativeLanguage', 'learningLanguage');

        return response()->json([
            'message' => 'Course selected successfully',
            'nativeLanguage' => $this->formatLanguage($user->nativeLanguage),
            'learningLanguage' => $this->formatLanguage($user->learningLanguage),
        ]);
    }

    #[OA\Post(
        path: '/api/course/proficiency',
        summary: 'Save the user\'s self-reported proficiency level',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['proficiencyLevel'],
            properties: [new OA\Property(property: 'proficiencyLevel', type: 'string', enum: ['beginner', 'some_knowledge', 'conversational'])],
        )),
        responses: [new OA\Response(response: 200, description: 'Proficiency level saved')],
    )]
    public function selectProficiency(Request $request): JsonResponse
    {
        $data = $request->validate([
            'proficiencyLevel' => ['required', 'string', Rule::in(self::PROFICIENCY_LEVELS)],
        ]);

        $user = $request->user();
        $user->forceFill(['proficiency_level' => $data['proficiencyLevel']])->save();

        if ($user->learning_language_id) {
            UserCourse::where('user_id', $user->id)
                ->where('language_id', $user->learning_language_id)
                ->update(['proficiency_level' => $data['proficiencyLevel']]);
        }

        return response()->json([
            'message' => 'Proficiency level saved',
            'proficiencyLevel' => $user->proficiency_level,
        ]);
    }

    #[OA\Post(
        path: '/api/course/streak-goal',
        summary: 'Save the user\'s daily streak goal',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['streakGoalDays'],
            properties: [new OA\Property(property: 'streakGoalDays', type: 'integer', enum: [10, 20, 30, 40, 50])],
        )),
        responses: [new OA\Response(response: 200, description: 'Streak goal saved')],
    )]
    public function selectStreakGoal(Request $request): JsonResponse
    {
        $data = $request->validate([
            'streakGoalDays' => ['required', 'integer', Rule::in(self::STREAK_GOAL_DAYS)],
        ]);

        $user = $request->user();
        $user->forceFill(['streak_goal_days' => $data['streakGoalDays']])->save();

        return response()->json([
            'message' => 'Streak goal saved',
            'streakGoalDays' => $user->streak_goal_days,
        ]);
    }

    #[OA\Get(
        path: '/api/course/chapters',
        summary: 'List chapters for the user\'s currently selected learning language',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Chapters list'),
            new OA\Response(response: 422, description: 'No course selected yet'),
        ],
    )]
    public function chapters(Request $request): JsonResponse
    {
        $user = $request->user();

        if (! $user->learning_language_id) {
            return response()->json(['message' => 'Please select a course first.'], 422);
        }

        $chapters = $user->learningLanguage
            ->chapters()
            ->withCount('units')
            ->orderBy('order_number')
            ->get();

        // Batched completion + progress for all chapters at once (a few
        // queries total) instead of per-chapter queries.
        $completeChapterIds = $this->progress->completeChapterIdsForLanguage($user, $user->learning_language_id);
        $progressByChapter = $this->progress->chapterProgressPercentForLanguage($user, $user->learning_language_id);

        return response()->json([
            'chapters' => $chapters->map(fn ($chapter) => [
                'id' => $chapter->id,
                'chapterKey' => $chapter->chapter_key->value,
                'title' => $chapter->title,
                'orderNumber' => $chapter->order_number,
                'unitsCount' => $chapter->units_count,
                'completed' => $chapter->units_count > 0 && $completeChapterIds->has($chapter->id),
                'progressPercent' => (int) ($progressByChapter[$chapter->id] ?? 0),
            ]),
        ]);
    }

    #[OA\Get(
        path: '/api/course/alphabet',
        summary: 'List the alphabet/character set for the user\'s currently selected learning language',
        description: 'Purely a reference screen (tap a character to hear it) — not gated by any chapter completion and does not affect chapter locking.',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Alphabet letters list'),
            new OA\Response(response: 422, description: 'No course selected yet'),
        ],
    )]
    public function alphabet(Request $request): JsonResponse
    {
        $user = $request->user();

        if (! $user->learning_language_id) {
            return response()->json(['message' => 'Please select a course first.'], 422);
        }

        $language = $user->learningLanguage;

        $letters = AlphabetLetter::where('language_id', $language->id)
            ->orderBy('order_number')
            ->get();

        return response()->json([
            'language' => $this->formatLanguage($language),
            'letters' => $letters->map(fn (AlphabetLetter $letter) => [
                'id' => $letter->id,
                'character' => $letter->character,
                'romanization' => $letter->romanization,
                'exampleWord' => $letter->example_word,
                'scriptGroup' => $letter->script_group,
                'orderNumber' => $letter->order_number,
            ]),
        ]);
    }

    #[OA\Get(
        path: '/api/chapters/{chapter}/units',
        summary: 'List units within a chapter',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'chapter', description: 'Chapter ID', schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(response: 200, description: 'Units list'),
            new OA\Response(response: 403, description: 'Chapter does not belong to the user\'s selected course'),
        ],
    )]
    public function units(Request $request, Chapter $chapter): JsonResponse
    {
        $user = $request->user();

        if (! $user->learning_language_id) {
            return response()->json(['message' => 'Please select a course first.'], 422);
        }

        if ($chapter->language_id !== $user->learning_language_id) {
            abort(403, 'This content does not belong to your selected course.');
        }

        $units = $chapter->units()->withCount('lessons')->orderBy('order_number')->get();

        $claimedUnitBonusIds = ChestClaim::where('user_id', $user->id)
            ->where('chest_type', ChestType::UnitBonus)
            ->whereIn('reference', $units->pluck('id')->map(fn ($id) => (string) $id))
            ->pluck('reference')
            ->map(fn ($id) => (int) $id)
            ->flip();

        // Batched completion for all units at once (2 queries) instead of
        // isUnitComplete() per unit (2 queries each).
        $completeUnitIds = $this->progress->completeUnitIdsForChapter($user, $chapter->id);

        // Headings read in the learner's native language, not the course
        // language (see CourseTitleService).
        $unitTitles = $this->titles->unitTitlesById($chapter, $units, $user->native_language_id);

        return response()->json([
            'chapter' => [
                'id' => $chapter->id,
                'chapterKey' => $chapter->chapter_key->value,
                'title' => $chapter->title,
            ],
            'units' => $units->map(fn ($unit) => [
                'id' => $unit->id,
                'title' => $unitTitles[$unit->id] ?? $unit->title,
                'orderNumber' => $unit->order_number,
                'lessonsCount' => $unit->lessons_count,
                'completed' => $unit->lessons_count > 0 && $completeUnitIds->has($unit->id),
                'bonusChestClaimed' => $claimedUnitBonusIds->has($unit->id),
            ]),
        ]);
    }

    #[OA\Get(
        path: '/api/units/{unit}/lessons',
        summary: 'List lessons within a unit',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'unit', description: 'Unit ID', schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(response: 200, description: 'Lessons list'),
            new OA\Response(response: 403, description: 'Unit does not belong to the user\'s selected course'),
        ],
    )]
    public function lessons(Request $request, Unit $unit): JsonResponse
    {
        $user = $request->user();
        $this->authorizeUnitAccess($request, $unit);

        $lessons = $unit->lessons()->withCount('exercises')->orderBy('order_number')->get();

        // Session counts per lesson (a lesson must be completed
        // LESSON_TARGET_COMPLETIONS times to be "mastered", which fills its
        // ring and unlocks the next lesson).
        $completionsByLesson = UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->whereIn('lesson_id', $lessons->pluck('id'))
            ->pluck('completions_count', 'lesson_id');

        $target = LessonProgressService::LESSON_TARGET_COMPLETIONS;

        // Headings read in the learner's native language (see CourseTitleService).
        $unitTitle = $this->titles->unitTitle($unit, $user->native_language_id);
        $lessonTitles = $this->titles->lessonTitlesById($unit, $lessons, $user->native_language_id);

        return response()->json([
            'unit' => [
                'id' => $unit->id,
                'title' => $unitTitle,
            ],
            'lessons' => $lessons->map(function ($lesson) use ($completionsByLesson, $target, $lessonTitles) {
                $count = (int) ($completionsByLesson[$lesson->id] ?? 0);

                return [
                    'id' => $lesson->id,
                    'title' => $lessonTitles[$lesson->id] ?? $lesson->title,
                    'orderNumber' => $lesson->order_number,
                    'exercisesCount' => $lesson->exercises_count,
                    'completionsCount' => $count,
                    'targetCompletions' => $target,
                    // "completed" now means fully mastered (all sessions done),
                    // which is what gates the next lesson unlock.
                    'completed' => $count >= $target,
                ];
            }),
        ]);
    }

    #[OA\Get(
        path: '/api/lessons/{lesson}/exercises',
        summary: 'List exercises within a lesson',
        description: 'Each exercise\'s instruction text is localized into the user\'s native language.',
        tags: ['Courses'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'lesson', description: 'Lesson ID', schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(response: 200, description: 'Exercises list'),
            new OA\Response(response: 403, description: 'Lesson does not belong to the user\'s selected course'),
        ],
    )]
    public function exercises(Request $request, Lesson $lesson): JsonResponse
    {
        $user = $request->user();
        $lesson->load('unit.chapter');
        $this->authorizeUnitAccess($request, $lesson->unit);

        // A lesson can hold several progressive sessions (session_number). Each
        // play serves the NEXT session's set based on how many the user has
        // already completed, capped at the last authored session — so replaying
        // to master a lesson shows fresh, harder content each time. Lessons that
        // don't use sessions have everything at session_number = 1, so this is a
        // no-op for them.
        $maxSession = (int) ($lesson->exercises()->max('session_number') ?: 1);
        $completionsCount = (int) UserLessonCompletion::where('user_id', $user->id)
            ->where('native_language_id', $user->native_language_id)
            ->where('lesson_id', $lesson->id)
            ->value('completions_count');
        $currentSession = min($completionsCount + 1, $maxSession);

        $exercises = $lesson->exercises()
            ->where('session_number', $currentSession)
            ->orderBy('order_number')
            ->get();

        // Preload every instruction template for the user's native language in
        // ONE query, keyed by exercise type — otherwise resolvedInstructionFor()
        // fires a separate query per exercise (N+1 on the most-hit content
        // endpoint). Lessons only span ~6 distinct exercise types.
        $instructionsByType = ExerciseInstruction::where('language_id', $user->native_language_id)
            ->get()
            ->keyBy(fn (ExerciseInstruction $instruction) => $instruction->exercise_type->value);

        // Course-language words already introduced in earlier sessions of this
        // lesson (so we know which are "new" this session).
        $seenBefore = [];
        if ($currentSession > 1) {
            foreach ($lesson->exercises()->where('session_number', '<', $currentSession)->get() as $prior) {
                foreach ($this->hintTokens($prior->data, $prior->type->value) as $token) {
                    $seenBefore[$token] = true;
                }
            }
        }

        // A word shows its hover hint if it's NEW to this session, OR the
        // learner hasn't retained it yet (low predicted recall from the
        // half-life engine). So scaffolding lingers on a word until it's
        // genuinely learned, rather than vanishing at a session boundary and
        // leaving the learner blank on a word they never really absorbed. (The
        // frontend also forces every hint on for an exercise answered wrong.)
        $sessionTokens = [];
        foreach ($exercises as $exercise) {
            foreach ($this->hintTokens($exercise->data, $exercise->type->value) as $token) {
                $sessionTokens[$token] = true;
            }
        }
        // ...except in a course written in an unfamiliar script, where the hint
        // is what makes the tile readable in the first place. Fading it there
        // leaves the learner with glyphs and no way back in, so every hint
        // stays on for the whole course.
        if ($user->learningLanguage?->usesNonLatinScript()) {
            $showHint = $sessionTokens;
        } else {
            $unretained = $this->words->unretainedTokens($user, array_keys($sessionTokens));
            $showHint = [];
            foreach (array_keys($sessionTokens) as $token) {
                if (! isset($seenBefore[$token]) || isset($unretained[$token])) {
                    $showHint[$token] = true;
                }
            }
        }

        // Hints and word-bank tiles are authored per native language, so a
        // German speaker learning French gets German, not English.
        $nativeCode = $user->nativeLanguage?->code ?? 'en';

        return response()->json([
            'lesson' => [
                'id' => $lesson->id,
                'title' => $this->titles->lessonTitle($lesson, $user->native_language_id),
            ],
            'session' => $currentSession,
            'maxSession' => $maxSession,
            'exercises' => $exercises->map(fn ($exercise) => [
                'id' => $exercise->id,
                'type' => $exercise->type->value,
                'instruction' => $exercise->resolveInstruction($instructionsByType->get($exercise->type->value)),
                'data' => $this->prepareData($exercise, $showHint, $nativeCode),
                'orderNumber' => $exercise->order_number,
            ]),
        ]);
    }

    /**
     * The course-language tokens in an exercise that carry a hover hint, used
     * to decide which are "new" in a later session. Same extraction the
     * practice engine uses to score words, so the two stay in lockstep.
     *
     * @return array<int, string>
     */
    private function hintTokens(array $data, string $type): array
    {
        return $this->words->tokensForData($data, $type);
    }

    /**
     * Everything an exercise's data needs before it reaches one learner:
     * resolve native-language content, mark which words still need a hint, and
     * shuffle the answer choices so the correct one isn't in a fixed position.
     */
    private function prepareData(object $exercise, array $showHint, string $nativeCode): array
    {
        $type = $exercise->type->value;

        $data = $this->content->localize($exercise->data, $nativeCode);
        $data = $this->tagNewWords($data, $type, $showHint);

        return $this->content->shuffleChoices($data, $type);
    }

    /**
     * Tags each hoverable course-language word with a `new` flag that the
     * frontend reads purely as "show this word's hint". A word is flagged when
     * it's in $showHint — i.e. new to this session, or not yet retained by the
     * learner (see exercises()). The frontend also forces every hint on for an
     * exercise the learner just answered wrong.
     *
     * @param  array<string, true>  $showHint
     */
    private function tagNewWords(array $data, string $type, array $showHint): array
    {
        $shouldHint = fn (string $token) => isset($showHint[mb_strtolower($token)]);

        if ($type === 'translate') {
            $data['prompt_words'] = array_map(
                fn (array $word) => $word + ['new' => $shouldHint($word['text'])],
                $data['prompt_words'] ?? [],
            );
        } elseif ($type === 'tap_word') {
            $data['words'] = array_map(
                fn (array $word) => isset($word['en']) ? $word + ['new' => $shouldHint($word['text'])] : $word,
                $data['words'] ?? [],
            );
        } elseif (($type === 'multiple_choice' || $type === 'match_pairs') && ! empty($data['word_translation'])) {
            $data['word_is_new'] = $shouldHint($data['word']);
        } elseif ($type === 'fill_blank' || $type === 'listen_select') {
            $data['options'] = array_map(
                fn (array $option) => isset($option['en']) ? $option + ['new' => $shouldHint($option['text'])] : $option,
                $data['options'] ?? [],
            );
            if ($type === 'fill_blank' && isset($data['sentence_translation'])) {
                $data['sentence_is_new'] = $shouldHint((string) ($data['correct_answer'] ?? ''));
            }
        }

        return $data;
    }

    private function authorizeUnitAccess(Request $request, Unit $unit): void
    {
        $user = $request->user();

        if (! $user->learning_language_id) {
            abort(422, 'Please select a course first.');
        }

        $unit->loadMissing('chapter');

        if ($unit->chapter->language_id !== $user->learning_language_id) {
            abort(403, 'This content does not belong to your selected course.');
        }
    }

    private function formatLanguage(?Language $language): ?array
    {
        if (! $language) {
            return null;
        }

        return [
            'id' => $language->id,
            'code' => $language->code,
            'name' => $language->name,
            'nativeName' => $language->native_name,
            'flagEmoji' => $language->flag_emoji,
        ];
    }
}
