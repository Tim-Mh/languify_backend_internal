<?php

namespace Tests\Feature;

use App\Models\ChestRewardConfig;
use App\Models\User;
use App\Models\UserGameState;
use App\Models\UserSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriptionPerksTest extends TestCase
{
    use RefreshDatabase;

    private function subscribe(User $user, string $planKey = 'monthly'): void
    {
        // updateOrCreate, not create — every factory user already has a
        // default Monthly subscription (see UserFactory::configure()), so
        // this overrides that single row's tier instead of adding a second.
        UserSubscription::updateOrCreate(
            ['user_id' => $user->id],
            [
                'plan_key' => $planKey,
                'stripe_customer_id' => 'cus_test',
                'stripe_subscription_id' => 'sub_test_'.$user->id,
                'status' => 'active',
                'current_period_end' => now()->addMonth(),
            ],
        );
    }

    public function test_family_subscriber_does_not_lose_hearts(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'family');
        UserGameState::create(['user_id' => $user->id, 'hearts' => 3]);

        $response = $this->actingAs($user)->postJson('/api/game-state/lose-heart')->assertOk();

        $response->assertJsonPath('hearts', 3)
            ->assertJsonPath('infiniteHeartsActive', true)
            ->assertJsonPath('infiniteHeartsPermanent', true);
    }

    public function test_monthly_subscriber_loses_hearts_normally_above_the_last_one(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');
        // The monthly allowance is granted once a billing month; marking it
        // spent lets this test start from the heart count it means to test.
        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 3,
            'subscriber_hearts_granted_at' => now(),
        ]);

        // Same 5-heart-cap behavior as a free user while above 1 heart.
        $this->actingAs($user)->postJson('/api/game-state/lose-heart')
            ->assertOk()
            ->assertJsonPath('hearts', 2)
            ->assertJsonPath('infiniteHeartsActive', false)
            ->assertJsonPath('infiniteHeartsPermanent', false);
    }

    public function test_monthly_subscriber_loses_last_heart_normally_down_to_zero(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');
        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 1,
            'subscriber_hearts_granted_at' => now(),
        ]);

        $this->actingAs($user)->postJson('/api/game-state/lose-heart')
            ->assertOk()
            ->assertJsonPath('hearts', 0);
    }

    public function test_yearly_subscriber_gets_the_same_100_heart_cap_as_monthly(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'yearly');
        UserGameState::create(['user_id' => $user->id, 'hearts' => 100]);

        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 100)
            ->assertJsonPath('gameState.maxHearts', 100);
    }

    public function test_monthly_subscriber_hearts_cap_at_100(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');
        UserGameState::create(['user_id' => $user->id, 'hearts' => 100]);

        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 100)
            ->assertJsonPath('gameState.maxHearts', 100);
    }

    public function test_monthly_subscriber_cannot_buy_a_heart_refill_while_already_full(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');
        UserGameState::create(['user_id' => $user->id, 'hearts' => 100, 'gems' => 1000]);

        $this->actingAs($user)->postJson('/api/shop/hearts/refill', ['tierKey' => 'one'])
            ->assertStatus(422);
    }

    public function test_free_user_can_play_with_the_base_heart_cap(): void
    {
        // Free tier: a user with no subscription can play — gameplay endpoints
        // are open to everyone now. They just get the base experience (5-heart
        // cap, no perks) rather than being blocked.
        $user = User::factory()->unsubscribed()->create();
        UserGameState::create(['user_id' => $user->id, 'hearts' => 3]);

        $this->actingAs($user)->postJson('/api/game-state/lose-heart')
            ->assertOk()
            ->assertJsonPath('hearts', 2);
    }

    public function test_subscriber_gets_bonus_gems_on_daily_chest(): void
    {
        // The base migration already seeds a 'daily'/null-reference row —
        // update it (unique on chest_type+reference) rather than duplicate it.
        ChestRewardConfig::where('chest_type', 'daily')->whereNull('reference')
            ->update(['min_gems' => 100, 'max_gems' => 100]);

        $user = User::factory()->create();
        $this->subscribe($user);
        UserGameState::create(['user_id' => $user->id]);

        $this->actingAs($user)->postJson('/api/chests/daily/claim')
            ->assertOk()
            ->assertJsonPath('reward.gems', 150); // 100 base * 1.5 subscriber bonus
    }

    public function test_free_user_claims_chests_without_the_gem_bonus(): void
    {
        ChestRewardConfig::where('chest_type', 'daily')->whereNull('reference')
            ->update(['min_gems' => 100, 'max_gems' => 100]);

        // Free tier: a non-subscriber CAN claim chests now — they just get the
        // base reward with no +50% subscriber gem bonus (100, not 150).
        $user = User::factory()->unsubscribed()->create();
        UserGameState::create(['user_id' => $user->id]);

        $this->actingAs($user)->postJson('/api/chests/daily/claim')
            ->assertOk()
            ->assertJsonPath('reward.gems', 100);
    }

    public function test_monthly_subscriber_streak_freeze_protects_exactly_one_missed_day_once_per_month(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        $this->subscribe($user, 'monthly');
        UserGameState::create([
            'user_id' => $user->id,
            'streak' => 5,
            'last_lesson_date' => now()->subDays(2)->toDateString(),
        ]);

        // Exactly one day missed — freeze should preserve the streak.
        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.streak', 5);

        // Freeze already used this month — a second gap should break it.
        $state = UserGameState::where('user_id', $user->id)->first();
        $state->forceFill(['last_lesson_date' => now()->subDays(2)->toDateString()])->save();

        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.streak', 0);
    }

    public function test_family_subscriber_gets_three_streak_freezes_per_month(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        $this->subscribe($user, 'family');
        UserGameState::create([
            'user_id' => $user->id,
            'streak' => 5,
            'last_lesson_date' => now()->subDays(2)->toDateString(),
        ]);

        // Three separate one-day gaps in the same month all get frozen.
        for ($i = 0; $i < 3; $i++) {
            $this->actingAs($user)->getJson('/api/game-state')
                ->assertOk()
                ->assertJsonPath('gameState.streak', 5);

            $state = UserGameState::where('user_id', $user->id)->first();
            $state->forceFill(['last_lesson_date' => now()->subDays(2)->toDateString()])->save();
        }

        // The 4th gap in the same month is no longer covered.
        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.streak', 0);
    }

    public function test_free_user_can_read_game_state(): void
    {
        // Free tier: reading game state is open to everyone. A free user's
        // monthly streak freeze allowance is 0 (a premium perk), so a 2-day
        // gap breaks their streak rather than being bridged.
        $user = User::factory()->unsubscribed()->create(['timezone' => 'UTC']);
        UserGameState::create([
            'user_id' => $user->id,
            'streak' => 5,
            'last_lesson_date' => now()->subDays(2)->toDateString(),
        ]);

        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.streak', 0);
    }

    public function test_the_monthly_allowance_is_granted_on_first_read(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');
        UserGameState::create(['user_id' => $user->id, 'hearts' => 5]);

        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 100);
    }

    public function test_spent_allowance_does_not_regenerate_back_up(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');

        // Already granted this month, three hearts spent, and long enough ago
        // that passive regen would have refilled everything if it applied.
        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 97,
            'subscriber_hearts_granted_at' => now()->subDays(2),
            'hearts_updated_at' => now()->subDays(2),
        ]);

        // This is the whole bug: 97 used to trickle back to 100 one heart every
        // fifteen minutes, so the allowance could never actually be spent.
        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 97)
            ->assertJsonPath('gameState.heartsRegenSecondsRemaining', 0);
    }

    public function test_a_subscriber_below_five_regenerates_only_up_to_five(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');

        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 0,
            'subscriber_hearts_granted_at' => now()->subDays(2),
            'hearts_updated_at' => now()->subDays(2),
        ]);

        // Regen is the safety net that gets someone off zero, not a refill of
        // the allowance, so it stops at five however long has passed.
        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 5);
    }

    public function test_the_allowance_is_granted_again_the_next_month(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'monthly');

        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 12,
            'subscriber_hearts_granted_at' => now()->subMonths(2),
            'hearts_updated_at' => now()->subMonths(2),
        ]);

        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 100);
    }

    public function test_a_yearly_plan_is_topped_up_monthly_too(): void
    {
        $user = User::factory()->create();
        $this->subscribe($user, 'yearly');

        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 8,
            'subscriber_hearts_granted_at' => now()->subMonth()->subDay(),
            'hearts_updated_at' => now()->subMonth()->subDay(),
        ]);

        // A year's plan buys a hundred hearts a month, not a hundred for the year.
        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 100);
    }

    public function test_an_ended_plan_drops_the_wallet_back_to_five(): void
    {
        $user = User::factory()->unsubscribed()->create();

        UserGameState::create([
            'user_id' => $user->id,
            'hearts' => 100,
            'subscriber_hearts_granted_at' => now()->subDay(),
            'hearts_updated_at' => now()->subDay(),
        ]);

        // Nothing else lowers the count when a plan lapses, so the trim has to
        // happen on the next read however the plan actually ended.
        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJsonPath('gameState.hearts', 5);
    }
}
