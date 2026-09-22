<?php

namespace Tests\Feature;

use App\Models\ChestRewardConfig;
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

        // Bounds come from the same config row the service rewards from, not
        // from a number typed here: the seeded daily range has already moved
        // once (10-20 to 20-30) and left this test failing on any high roll.
        // Every factory user is a subscriber by default (see
        // UserFactory::configure()), so the +50% bonus always applies.
        $config = ChestRewardConfig::where('chest_type', 'daily')->firstOrFail();
        $gems = UserGameState::where('user_id', $user->id)->value('gems');

        $this->assertGreaterThanOrEqual((int) floor($config->min_gems * 1.5), $gems);
        $this->assertLessThanOrEqual((int) ceil($config->max_gems * 1.5), $gems);

        $this->actingAs($user)->postJson('/api/chests/daily/claim')
            ->assertStatus(422);
    }

    /**
     * The streak and unit-bonus chests were removed from the product: only the
     * daily chest is offered, and routes/api.php drops both claim routes so
     * they cannot be reached even by a direct API call.
     *
     * This test exists to keep them gone. If someone re-adds a route, this
     * fails and they have to make the case for it deliberately, which is the
     * whole point of deleting a route rather than hiding a button.
     */
    public function test_the_streak_and_unit_bonus_chest_claims_stay_unreachable(): void
    {
        $user = User::factory()->create();
        [, $learning] = $this->enrollUserInCourse($user);
        $unit = $this->createChapterWithLessons($learning, 2);

        $this->actingAs($user)
            ->postJson('/api/chests/streak/claim')
            ->assertStatus(404);

        $this->actingAs($user)
            ->postJson('/api/chests/unit-bonus/claim', ['unitId' => $unit['unit']->id])
            ->assertStatus(404);
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

    public function test_chest_endpoints_require_authentication(): void
    {
        $this->postJson('/api/chests/daily/claim')->assertUnauthorized();
        $this->getJson('/api/chests/status')->assertUnauthorized();
    }
}
