<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameStateTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_new_users_game_state_has_default_values(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->getJson('/api/game-state')
            ->assertOk()
            ->assertJson([
                'gameState' => [
                    'totalXp' => 0,
                    'streak' => 0,
                    'gems' => 0,
                    'hearts' => 5,
                    'earnedBadgeIds' => [],
                ],
            ]);
    }

    public function test_game_state_requires_authentication(): void
    {
        $this->getJson('/api/game-state')->assertUnauthorized();
    }
}
