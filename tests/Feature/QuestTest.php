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

        // Narrow the pool to one requirement type so the assertion does not
        // depend on which three quests the shuffle returns. Progress for that
        // type is read from `lessons_mastered_today`, NOT `lessons_today` --
        // seeding the latter is why this test used to find nothing completed.
        Quest::where('requirement_type', '!=', 'lessons_completed')->update(['is_active' => false]);

        UserGameState::create([
            'user_id' => $user->id,
            'lessons_mastered_today' => 50,
            'lessons_today' => 50,
            'today_xp' => 500,
            'today_date' => now('UTC')->startOfDay(),
            'gems' => 0,
        ]);

        $quests = $this->actingAs($user)->getJson('/api/quests/today')->json('quests');
        $completed = collect($quests)->first(fn ($q) => $q['completed']);
        $this->assertNotNull($completed, 'A lessons_completed quest should already be done at 50 mastered lessons');

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

}
