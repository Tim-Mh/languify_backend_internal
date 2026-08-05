<?php

namespace Tests\Feature;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\TriviaQuestion;
use App\Models\TriviaTopic;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserLessonCompletion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesCourseContent;
use Tests\TestCase;

class TriviaTest extends TestCase
{
    use CreatesCourseContent, RefreshDatabase;

    private function makeTopicWithQuestions(Language $language, string $key = 'science'): TriviaTopic
    {
        $topic = TriviaTopic::create([
            'language_id' => $language->id,
            'key' => $key,
            'title' => 'Science',
            'order_number' => 1,
        ]);

        TriviaQuestion::create([
            'topic_id' => $topic->id,
            'question' => 'What is the chemical symbol for water?',
            'options' => ['H2O', 'CO2', 'O2', 'NaCl'],
            'correct_index' => 0,
            'order_number' => 1,
        ]);
        TriviaQuestion::create([
            'topic_id' => $topic->id,
            'question' => 'Which planet is known as the Red Planet?',
            'options' => ['Venus', 'Mars', 'Jupiter', 'Saturn'],
            'correct_index' => 1,
            'order_number' => 2,
        ]);

        return $topic;
    }

    /**
     * Completes the Conversation chapter (chapter 2) for the given language,
     * which is what unlocks Trivia access.
     */
    private function completeConversationChapter(User $user, Language $language): void
    {
        $chapter = Chapter::create([
            'language_id' => $language->id,
            'chapter_key' => ChapterKey::Conversation->value,
            'title' => 'Conversation',
            'order_number' => 2,
        ]);

        $unit = Unit::create(['chapter_id' => $chapter->id, 'title' => 'Unit 1', 'order_number' => 1]);
        $lesson = Lesson::create(['unit_id' => $unit->id, 'title' => 'Lesson 1', 'order_number' => 1]);

        UserLessonCompletion::create([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'mistakes' => 0,
            'is_perfect' => true,
            'xp_awarded' => 30,
            'completed_at' => now(),
        ]);
    }

    private function makeUnlockedUser(): array
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $this->completeConversationChapter($user, $learning);

        return [$user, $learning];
    }

    public function test_topics_are_browsable_but_playing_is_locked_until_conversation_chapter_is_complete(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $topic = $this->makeTopicWithQuestions($learning);

        $this->actingAs($user)->getJson('/api/trivia/topics')->assertOk()->assertJsonCount(1, 'topics');
        $this->actingAs($user)->getJson("/api/trivia/topics/{$topic->key}/questions")->assertForbidden();
        $this->actingAs($user)->postJson("/api/trivia/topics/{$topic->key}/submit", ['answers' => []])->assertForbidden();
    }

    public function test_topics_list_includes_question_counts(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $this->makeTopicWithQuestions($learning);

        $this->actingAs($user)->getJson('/api/trivia/topics')
            ->assertOk()
            ->assertJsonPath('topics.0.key', 'science')
            ->assertJsonPath('topics.0.questionsCount', 2)
            ->assertJsonPath('topics.0.completed', false);
    }

    public function test_topics_are_scoped_to_the_users_current_learning_language(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $this->makeTopicWithQuestions($learning);

        $otherLanguage = Language::create(['code' => 'fr', 'name' => 'French', 'native_name' => 'Français', 'flag_emoji' => '🇫🇷']);
        $otherTopic = $this->makeTopicWithQuestions($otherLanguage, 'geography');

        $this->actingAs($user)->getJson('/api/trivia/topics')->assertOk()->assertJsonCount(1, 'topics');
        $this->actingAs($user)->getJson("/api/trivia/topics/{$otherTopic->key}/questions")->assertNotFound();
    }

    public function test_questions_never_expose_the_correct_answer(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $topic = $this->makeTopicWithQuestions($learning);

        $response = $this->actingAs($user)->getJson("/api/trivia/topics/{$topic->key}/questions")->assertOk();

        $response->assertJsonMissingPath('questions.0.correct_index');
        $response->assertJsonMissingPath('questions.0.correctIndex');
        $this->assertSame(['id', 'question', 'options'], array_keys($response->json('questions.0')));
    }

    public function test_check_endpoint_grades_correctly_and_is_one_shot_per_question(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $topic = $this->makeTopicWithQuestions($learning);
        $question = $topic->questions()->orderBy('order_number')->first();

        $this->actingAs($user)
            ->postJson("/api/trivia/topics/{$topic->key}/questions/{$question->id}/check", ['selectedIndex' => 0])
            ->assertOk()
            ->assertJson(['correct' => true]);

        $this->actingAs($user)
            ->postJson("/api/trivia/topics/{$topic->key}/questions/{$question->id}/check", ['selectedIndex' => 1])
            ->assertStatus(409);
    }

    public function test_100_percent_awards_perfect_bonus_and_grants_infinite_hearts_even_on_repeat(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $topic = $this->makeTopicWithQuestions($learning);
        $questions = $topic->questions()->orderBy('order_number')->get();

        $answers = [
            ['questionId' => $questions[0]->id, 'selectedIndex' => 0],
            ['questionId' => $questions[1]->id, 'selectedIndex' => 1],
        ];

        $first = $this->actingAs($user)->postJson("/api/trivia/topics/{$topic->key}/submit", ['answers' => $answers]);
        // Every factory user is a subscriber by default (see
        // UserFactory::configure()), so the +50% gems bonus always applies now.
        $first->assertOk()->assertJson([
            'correctCount' => 2,
            'totalQuestions' => 2,
            'gemsAwarded' => (int) round((2 * 4 + 10) * 1.5),
            'xpAwarded' => 2 * 8 + 20,
            'alreadyCompletedBefore' => false,
            'infiniteHeartsGranted' => true,
        ]);
        $this->assertGreaterThan(0, $first->json('infiniteHeartsSecondsRemaining'));

        $second = $this->actingAs($user)->postJson("/api/trivia/topics/{$topic->key}/submit", ['answers' => $answers]);
        $second->assertOk()->assertJson([
            'correctCount' => 2,
            'gemsAwarded' => 0,
            'xpAwarded' => 0,
            'alreadyCompletedBefore' => true,
            'infiniteHeartsGranted' => true,
        ]);

        $this->actingAs($user)->getJson('/api/trivia/topics')->assertOk()->assertJsonPath('topics.0.completed', true);
    }

    public function test_high_score_without_perfect_score_awards_bonus_but_no_infinite_hearts(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $topic = TriviaTopic::create(['language_id' => $learning->id, 'key' => 'science', 'title' => 'Science', 'order_number' => 1]);

        // 5 questions, 4 correct = 80% — high-score tier, not perfect.
        $questions = collect(range(1, 5))->map(fn ($i) => TriviaQuestion::create([
            'topic_id' => $topic->id,
            'question' => "Q{$i}",
            'options' => ['A', 'B'],
            'correct_index' => 0,
            'order_number' => $i,
        ]));

        $answers = $questions->map(fn ($q, $i) => ['questionId' => $q->id, 'selectedIndex' => $i === 4 ? 1 : 0])->values()->all();

        $response = $this->actingAs($user)->postJson("/api/trivia/topics/{$topic->key}/submit", ['answers' => $answers]);

        // Every factory user is a subscriber by default (see
        // UserFactory::configure()), so the +50% gems bonus always applies now.
        $response->assertOk()->assertJson([
            'correctCount' => 4,
            'totalQuestions' => 5,
            'gemsAwarded' => (int) round((4 * 4 + 5) * 1.5),
            'xpAwarded' => 4 * 8 + 10,
            'infiniteHeartsGranted' => false,
        ]);
    }

    public function test_duplicate_answers_cannot_inflate_the_score(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $topic = $this->makeTopicWithQuestions($learning);
        $questions = $topic->questions()->orderBy('order_number')->get();

        // Send the same known-correct answer for question 1 fifty times, plus
        // the correct answer for question 2 once. A naive grader would count
        // 51 "correct"; dedup-by-questionId must cap it at the 2 real
        // questions, and the reward must match a normal 2/2 perfect score.
        $answers = collect(range(1, 50))
            ->map(fn () => ['questionId' => $questions[0]->id, 'selectedIndex' => 0])
            ->push(['questionId' => $questions[1]->id, 'selectedIndex' => 1])
            ->all();

        $response = $this->actingAs($user)->postJson("/api/trivia/topics/{$topic->key}/submit", ['answers' => $answers]);

        $response->assertOk()->assertJson([
            'correctCount' => 2,
            'totalQuestions' => 2,
            'gemsAwarded' => (int) round((2 * 4 + 10) * 1.5),
            'xpAwarded' => 2 * 8 + 20,
        ]);
    }

    public function test_wrong_answers_are_graded_as_incorrect(): void
    {
        [$user, $learning] = $this->makeUnlockedUser();
        $topic = $this->makeTopicWithQuestions($learning);
        $question = $topic->questions()->first();

        $response = $this->actingAs($user)->postJson("/api/trivia/topics/{$topic->key}/submit", [
            'answers' => [['questionId' => $question->id, 'selectedIndex' => 3]],
        ]);

        $response->assertOk()->assertJsonPath('correctCount', 0)->assertJsonPath('infiniteHeartsGranted', false);
    }

    public function test_trivia_endpoints_require_authentication(): void
    {
        $learning = Language::create(['code' => 'es', 'name' => 'Spanish', 'native_name' => 'Español', 'flag_emoji' => '🇪🇸']);
        $topic = $this->makeTopicWithQuestions($learning);

        $this->getJson('/api/trivia/topics')->assertUnauthorized();
        $this->getJson("/api/trivia/topics/{$topic->key}/questions")->assertUnauthorized();
    }
}
