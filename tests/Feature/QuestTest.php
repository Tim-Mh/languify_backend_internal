<?php

namespace Tests\Feature;

use App\Models\Quest;
use App\Models\User;
use App\Models\UserDailyQuest;
use App\Models\UserGameState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestTest extends TestCase
{
    use RefreshDatabase;

    public function test_today_assigns_three_quests_ordered_easiest_to_hardest(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);

        $response = $this->actingAs($user)->getJson('/api/quests/today')->assertOk();

        $quests = $response->json('quests');
        $this->assertCount(3, $quests);

        $difficulties = array_column($quests, 'difficulty');
        $sorted = $difficulties;
        sort($sorted);
        $this->assertSame($sorted, $difficulties, 'Quests should be ordered easiest to hardest');

        // Re-requesting the same day returns the same 3 assignments, not a
        // fresh random set.
        $again = $this->actingAs($user)->getJson('/api/quests/today')->assertOk();
        $this->assertSame(
            array_column($quests, 'id'),
            array_column($again->json('quests'), 'id'),
        );
    }

    public function test_claiming_a_completed_quest_awards_gems_and_xp(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        // A brand-new user starts at difficulty level 1, whose 3 tiers are
        // [1, 1, 2] — the two tier-1 slots are always lessons_completed or
        // xp_earned quests (the only types in the easy pool), so values this
        // high guarantee both are already complete regardless of which
        // specific quests get randomly picked.
        UserGameState::create([
            'user_id' => $user->id,
            'lessons_today' => 10,
            'today_xp' => 200,
            'today_date' => now('UTC')->startOfDay(),
            'gems' => 0,
        ]);

        $quests = $this->actingAs($user)->getJson('/api/quests/today')->json('quests');
        $completed = collect($quests)->first(fn ($q) => $q['completed']);
        $this->assertNotNull($completed, 'At least one quest should already be completed with lessons_today=5');

        $response = $this->actingAs($user)->postJson("/api/quests/{$completed['id']}/claim")->assertOk();

        // Every factory user is a subscriber by default (see
        // UserFactory::configure()), so the +50% gems bonus always applies.
        $this->assertSame((int) round($completed['gemsReward'] * 1.5), $response->json('gems'));
        $this->assertSame($completed['xpReward'], $response->json('xp'));

        // Can't claim twice.
        $this->actingAs($user)->postJson("/api/quests/{$completed['id']}/claim")->assertStatus(422);
    }

    public function test_claiming_before_completion_fails(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        UserGameState::create(['user_id' => $user->id, 'lessons_today' => 0, 'today_xp' => 0]);

        $quests = $this->actingAs($user)->getJson('/api/quests/today')->json('quests');
        $incomplete = collect($quests)->first(fn ($q) => ! $q['completed']);

        $this->actingAs($user)->postJson("/api/quests/{$incomplete['id']}/claim")->assertStatus(422);
    }

    public function test_difficulty_level_increases_after_completing_all_of_yesterdays_quests(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        UserGameState::create(['user_id' => $user->id, 'quest_difficulty_level' => 1]);
        $this->seedYesterdaysQuests($user, allCompleted: true);

        $this->actingAs($user)->getJson('/api/quests/today')->assertOk();

        $this->assertSame(2, UserGameState::where('user_id', $user->id)->value('quest_difficulty_level'));
    }

    public function test_difficulty_level_decreases_after_completing_none_of_yesterdays_quests(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        UserGameState::create(['user_id' => $user->id, 'quest_difficulty_level' => 2]);
        $this->seedYesterdaysQuests($user, allCompleted: false);

        $this->actingAs($user)->getJson('/api/quests/today')->assertOk();

        $this->assertSame(1, UserGameState::where('user_id', $user->id)->value('quest_difficulty_level'));
    }

    public function test_difficulty_level_holds_steady_after_partial_completion(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);
        UserGameState::create(['user_id' => $user->id, 'quest_difficulty_level' => 2]);
        $this->seedYesterdaysQuests($user, allCompleted: false, completedCount: 1);

        $this->actingAs($user)->getJson('/api/quests/today')->assertOk();

        $this->assertSame(2, UserGameState::where('user_id', $user->id)->value('quest_difficulty_level'));
    }

    public function test_difficulty_level_clamps_at_the_top_and_bottom(): void
    {
        $topUser = User::factory()->create(['timezone' => 'UTC']);
        UserGameState::create(['user_id' => $topUser->id, 'quest_difficulty_level' => 3]);
        $this->seedYesterdaysQuests($topUser, allCompleted: true);
        $this->actingAs($topUser)->getJson('/api/quests/today')->assertOk();
        $this->assertSame(3, UserGameState::where('user_id', $topUser->id)->value('quest_difficulty_level'));

        $bottomUser = User::factory()->create(['timezone' => 'UTC']);
        UserGameState::create(['user_id' => $bottomUser->id, 'quest_difficulty_level' => 1]);
        $this->seedYesterdaysQuests($bottomUser, allCompleted: false);
        $this->actingAs($bottomUser)->getJson('/api/quests/today')->assertOk();
        $this->assertSame(1, UserGameState::where('user_id', $bottomUser->id)->value('quest_difficulty_level'));
    }

    private function seedYesterdaysQuests(User $user, bool $allCompleted, int $completedCount = 0): void
    {
        $yesterday = now('UTC')->subDay()->startOfDay();
        $quests = Quest::inRandomOrder()->limit(3)->get();

        foreach ($quests as $i => $quest) {
            $isCompleted = $allCompleted || $i < $completedCount;

            UserDailyQuest::create([
                'user_id' => $user->id,
                'quest_id' => $quest->id,
                'quest_date' => $yesterday,
                'progress' => $isCompleted ? $quest->target_count : 0,
                'completed_at' => $isCompleted ? $yesterday->copy()->addHours(2) : null,
            ]);
        }
    }
}
