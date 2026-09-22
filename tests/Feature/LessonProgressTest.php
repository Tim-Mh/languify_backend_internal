<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\User;
use App\Models\UserGameState;
use App\Services\LessonProgressService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesCourseContent;
use Tests\TestCase;

class LessonProgressTest extends TestCase
{
    use CreatesCourseContent;
    use RefreshDatabase;

    public function test_completing_a_lesson_awards_xp_and_grants_no_badges(): void
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

        // Badges are CLAIMED from the profile now, not handed out here: see
        // LessonProgressService, where the award step is kept as a documented
        // no-op. An empty list is the correct answer, and asserting it keeps
        // anyone from quietly re-introducing auto-granting.
        $this->assertSame([], $response->json('newBadges'));

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
        ]);

        // Replaying advances the completion count but pays nothing: the XP for
        // a lesson is earned once. It still counts as turning up, which is what
        // keeps a streak alive for someone who has finished everything.
        $second = $this->actingAs($user)->postJson("/api/lessons/{$lesson->id}/complete", ['mistakes' => 3]);
        $second->assertOk()->assertJson([
            'xpAwarded' => 0,
            'alreadyCompletedBefore' => true,
            'completionsCount' => 2,
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

        // The unit bonus itself is still paid; only the badge that used to come
        // with it has moved to manual claiming.
        $response->assertOk()
            ->assertJson(['unitXpAwarded' => 20])
            ->assertJsonPath('newBadges', []);

        $this->assertGreaterThan(0, $response->json('unitBonusGems'));
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

        // Hearts are lost in real time via /api/game-state/lose-heart while the
        // exercise is in progress, never batched here from $mistakes. Four
        // mistakes therefore cost nothing at completion.
        //
        // The expected number is the subscriber cap, not 5: every factory user
        // is a Monthly subscriber, and the monthly allowance tops their balance
        // up to 100 on read. It used to be 7 because two bronze badges granted
        // a heart each, which manual claiming ended.
        $response->assertOk()->assertJsonPath(
            'hearts',
            LessonProgressService::SUBSCRIBER_MAX_HEARTS
        );
    }

    public function test_lose_heart_endpoint_deducts_one_heart_immediately_and_floors_at_zero(): void
    {
        $user = User::factory()->create();
        // Every factory user is a Monthly subscriber, and a subscriber who has
        // not been granted this month's hundred hearts gets them on the next
        // request. Marking the grant as already spent is what lets this test
        // set the heart count it actually wants to exercise.
        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 1,
            'subscriber_hearts_granted_at' => now(),
        ]);

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
