<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesCourseContent;
use Tests\TestCase;

/**
 * The app has a free tier: an unsubscribed account can use everything —
 * chapters, lessons, game state, leaderboard, trivia — without a subscription.
 * Premium only changes in-app perks (hearts cap, ads, gem bonus, freezes),
 * never access. These tests lock that in.
 */
class FreeTierAccessTest extends TestCase
{
    use CreatesCourseContent;
    use RefreshDatabase;

    public function test_free_user_can_select_a_course_and_read_chapters(): void
    {
        $user = User::factory()->unsubscribed()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $this->createChapterWithLessons($learning, 2);

        $this->actingAs($user)->getJson('/api/course/chapters')
            ->assertOk()
            ->assertJsonCount(1, 'chapters');
    }

    public function test_free_user_can_read_units_lessons_and_exercises(): void
    {
        $user = User::factory()->unsubscribed()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $content = $this->createChapterWithLessons($learning, 2);

        $this->actingAs($user)->getJson("/api/chapters/{$content['chapter']->id}/units")->assertOk();
        $this->actingAs($user)->getJson("/api/units/{$content['unit']->id}/lessons")->assertOk();
        $this->actingAs($user)->getJson("/api/lessons/{$content['lessons']->first()->id}/exercises")->assertOk();
    }

    public function test_free_user_can_complete_a_lesson_and_earn_xp(): void
    {
        $user = User::factory()->unsubscribed()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $content = $this->createChapterWithLessons($learning, 2);

        $this->actingAs($user)->postJson("/api/lessons/{$content['lessons']->first()->id}/complete", ['mistakes' => 0])
            ->assertOk()
            ->assertJsonPath('streak', 1);
    }

    public function test_free_user_can_reach_the_leaderboard(): void
    {
        $user = User::factory()->unsubscribed()->create();
        $this->enrollUserInCourse($user);

        $this->actingAs($user)->getJson('/api/league')->assertOk();
    }
}
