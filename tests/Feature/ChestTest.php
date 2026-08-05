<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserGameState;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesCourseContent;
use Tests\TestCase;

class ChestTest extends TestCase
{
    use CreatesCourseContent;
    use RefreshDatabase;

    protected function tearDown(): void
    {
        Carbon::setTestNow();
        parent::tearDown();
    }

    public function test_daily_chest_can_be_claimed_and_then_is_on_cooldown(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->postJson('/api/chests/daily/claim')
            ->assertOk()
            ->assertJsonPath('reward.xp', 0)
            ->assertJsonPath('reward.hearts', 0);

        // Base reward is 10-20 gems; every factory user is a subscriber by
        // default (see UserFactory::configure()), so +50% bonus always applies.
        $gems = UserGameState::where('user_id', $user->id)->value('gems');
        $this->assertGreaterThanOrEqual(15, $gems);
        $this->assertLessThanOrEqual(30, $gems);

        $this->actingAs($user)->postJson('/api/chests/daily/claim')
            ->assertStatus(422);
    }

    public function test_streak_chest_becomes_claimable_after_reaching_a_3_day_streak(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $lessons = $this->createChapterWithLessons($learning, 3)['lessons'];

        Carbon::setTestNow(Carbon::parse('2026-01-01 10:00:00'));
        $this->actingAs($user)->postJson("/api/lessons/{$lessons[0]->id}/complete", ['mistakes' => 0])
            ->assertJsonPath('streak', 1);

        Carbon::setTestNow(Carbon::parse('2026-01-02 10:00:00'));
        $this->actingAs($user)->postJson("/api/lessons/{$lessons[1]->id}/complete", ['mistakes' => 0])
            ->assertJsonPath('streak', 2);

        Carbon::setTestNow(Carbon::parse('2026-01-03 10:00:00'));
        $response = $this->actingAs($user)->postJson("/api/lessons/{$lessons[2]->id}/complete", ['mistakes' => 0]);
        $response->assertJsonPath('streak', 3);
        $this->assertSame(3, $response->json('streakMilestoneHit.days'));

        $claim = $this->actingAs($user)->postJson('/api/chests/streak/claim');
        $claim->assertOk()->assertJsonPath('reward.milestoneDays', 3);

        // The 3-day milestone reward is "Badge on profile" — 0 gems.
        $claim->assertJsonPath('reward.gems', 0);

        $this->actingAs($user)->postJson('/api/chests/streak/claim')->assertStatus(422);
    }

    public function test_streak_resets_after_a_missed_day(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $lessons = $this->createChapterWithLessons($learning, 2)['lessons'];

        Carbon::setTestNow(Carbon::parse('2026-01-01 10:00:00'));
        $this->actingAs($user)->postJson("/api/lessons/{$lessons[0]->id}/complete", ['mistakes' => 0])
            ->assertJsonPath('streak', 1);

        // Every factory user is a subscriber by default (see
        // UserFactory::configure()), and subscribers get a monthly streak
        // freeze that would otherwise bridge exactly one missed day —
        // exhaust it first so this test genuinely exercises the
        // no-freeze-available hard reset (the freeze-bridges-the-gap
        // behavior is covered separately).
        UserGameState::where('user_id', $user->id)->update([
            'last_streak_freeze_month' => '2026-01',
            'streak_freeze_count' => 1,
        ]);

        // Skip a day (Jan 2) entirely, resume on Jan 3.
        Carbon::setTestNow(Carbon::parse('2026-01-03 10:00:00'));
        $this->actingAs($user)->postJson("/api/lessons/{$lessons[1]->id}/complete", ['mistakes' => 0])
            ->assertJsonPath('streak', 1);
    }

    public function test_unit_bonus_chest_requires_the_first_lesson_to_be_completed(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $unit = $this->createChapterWithLessons($learning, 2);

        $this->actingAs($user)
            ->postJson('/api/chests/unit-bonus/claim', ['unitId' => $unit['unit']->id])
            ->assertStatus(422);

        $this->actingAs($user)->postJson("/api/lessons/{$unit['lessons'][0]->id}/complete", ['mistakes' => 0]);

        $this->actingAs($user)
            ->postJson('/api/chests/unit-bonus/claim', ['unitId' => $unit['unit']->id])
            ->assertOk();

        // Claiming twice is rejected.
        $this->actingAs($user)
            ->postJson('/api/chests/unit-bonus/claim', ['unitId' => $unit['unit']->id])
            ->assertStatus(422);
    }

    public function test_chest_endpoints_require_authentication(): void
    {
        $this->postJson('/api/chests/daily/claim')->assertUnauthorized();
        $this->getJson('/api/chests/status')->assertUnauthorized();
    }
}
