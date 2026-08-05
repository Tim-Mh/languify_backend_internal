<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\User;
use App\Models\UserGameState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesCourseContent;
use Tests\TestCase;

class LessonProgressTest extends TestCase
{
    use CreatesCourseContent;
    use RefreshDatabase;

    public function test_completing_a_lesson_awards_xp_and_badges(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $lesson = $this->createChapterWithLessons($learning, 1)['lessons']->first();

        $response = $this->actingAs($user)
            ->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => 0]);

        $response->assertOk()->assertJson([
            'xpAwarded' => 30, // 20 base + 10 perfect bonus
            'streak' => 1,
            'alreadyCompletedBefore' => false,
        ]);

        $badgeIds = collect($response->json('newBadges'))->pluck('id');
        $this->assertTrue($badgeIds->contains('xp-first'));
        $this->assertTrue($badgeIds->contains('lesson-first'));
        $this->assertTrue($badgeIds->contains('lesson-perfect'));

        $this->assertDatabaseHas('user_lesson_completions', [
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'is_perfect' => true,
        ]);
    }

    public function test_replaying_a_lesson_awards_xp_and_advances_the_session_count(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $lesson = $this->createChapterWithLessons($learning, 1)['lessons']->first();

        $first = $this->actingAs($user)->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => 0]);
        $first->assertOk()->assertJson([
            'alreadyCompletedBefore' => false,
            'completionsCount' => 1,
            'targetCompletions' => 5,
            'mastered' => false,
        ]);

        // Replaying still awards XP (Duolingo-style, to motivate the repeat
        // sessions) and advances the session count toward mastery.
        $second = $this->actingAs($user)->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => 3]);
        $second->assertOk()->assertJson([
            'xpAwarded' => 20, // base lesson XP, no perfect bonus (had mistakes)
            'alreadyCompletedBefore' => true,
            'completionsCount' => 2,
            'mastered' => false,
        ]);
    }

    public function test_a_lesson_is_mastered_after_the_target_number_of_sessions(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        [, $learning] = $this->enrollUserInCourse($user);
        $lesson = $this->createChapterWithLessons($learning, 1)['lessons']->first();

        $last = null;
        for ($i = 0; $i < 5; $i++) {
            $last = $this->actingAs($user)->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => 0]);
        }

        $last->assertOk()->assertJson(['completionsCount' => 5, 'mastered' => true]);

        $this->assertDatabaseHas('user_lesson_completions', [
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'completions_count' => 5,
        ]);
    }

    public function test_completing_the_final_lesson_in_a_unit_awards_the_unit_bonus(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $lessons = $this->createChapterWithLessons($learning, 2)['lessons'];

        $this->actingAs($user)->postJson("/api/lessons/{$lessons[0]->id}/complete", ['mistakes' => 0]);
        $response = $this->actingAs($user)->postJson("/api/lessons/{$lessons[1]->id}/complete", ['mistakes' => 1]);

        $response->assertOk()->assertJson(['unitXpAwarded' => 20]);
        $badgeIds = collect($response->json('newBadges'))->pluck('id');
        $this->assertTrue($badgeIds->contains('lesson-unit'));
    }

    public function test_completing_a_lesson_no_longer_deducts_hearts_directly(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        // Two lessons so completing only the first does NOT also complete the
        // unit (which would fire the lesson-unit badge and add back a heart,
        // muddying this specific assertion).
        $lesson = $this->createChapterWithLessons($learning, 2)['lessons']->first();

        $response = $this->actingAs($user)
            ->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => 4]);

        // Hearts are lost in real time via /api/game-state/lose-heart while
        // the exercise is in progress, not batched here from $mistakes —
        // starts at 5, untouched by completion itself, then +1 each from the
        // xp-first and lesson-first BRONZE badge rewards => 7 (every factory
        // user is a Monthly subscriber by default, capped at 100, not 5).
        $response->assertOk()->assertJsonPath('hearts', 7);
    }

    public function test_lose_heart_endpoint_deducts_one_heart_immediately_and_floors_at_zero(): void
    {
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'hearts' => 1]);

        $response = $this->actingAs($user)->postJson('/api/game-state/lose-heart');
        $response->assertOk()->assertJsonPath('hearts', 0);
    }

    public function test_completing_a_lesson_requires_authentication(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $lesson = $this->createChapterWithLessons($learning, 1)['lessons']->first();

        $this->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => 0])
            ->assertUnauthorized();
    }

    public function test_completing_a_lesson_validates_mistakes_field(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $lesson = $this->createChapterWithLessons($learning, 1)['lessons']->first();

        $this->actingAs($user)
            ->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => -1])
            ->assertStatus(422);
    }

    public function test_completing_a_lesson_outside_the_users_course_is_forbidden(): void
    {
        $user = User::factory()->create();
        $this->enrollUserInCourse($user);

        $otherLanguage = Language::create(['code' => 'fr', 'name' => 'French', 'native_name' => 'Français', 'flag_emoji' => '🇫🇷']);
        $otherLesson = $this->createChapterWithLessons($otherLanguage, 1)['lessons']->first();

        $this->actingAs($user)
            ->postJson("/api/lessons/{$otherLesson->id}/complete", ['mistakes' => 0])
            ->assertForbidden();
    }
}
