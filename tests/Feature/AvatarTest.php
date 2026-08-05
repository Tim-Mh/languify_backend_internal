<?php

namespace Tests\Feature;

use App\Models\AvatarOption;
use App\Models\User;
use App\Models\UserGameState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AvatarTest extends TestCase
{
    use RefreshDatabase;

    private function seedOptions(): void
    {
        AvatarOption::create(['attribute_type' => 'skinColor', 'value' => 'f2d3b1', 'price_gems' => 0, 'is_default' => true, 'order_number' => 1]);
        AvatarOption::create(['attribute_type' => 'skinColor', 'value' => 'edb98a', 'price_gems' => 20, 'is_default' => false, 'order_number' => 2]);
        AvatarOption::create(['attribute_type' => 'hair', 'value' => 'short16', 'price_gems' => 0, 'is_default' => true, 'order_number' => 1]);
        AvatarOption::create(['attribute_type' => 'hair', 'value' => 'short01', 'price_gems' => 40, 'is_default' => false, 'order_number' => 2]);
    }

    public function test_a_new_users_avatar_is_all_null(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->getJson('/api/avatar')
            ->assertOk()
            ->assertJson(['avatar' => [
                'skinColor' => null,
                'hair' => null,
            ]]);
    }

    public function test_options_catalog_marks_the_default_as_unlocked_and_others_as_locked(): void
    {
        $this->seedOptions();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson('/api/avatar/options')->assertOk();

        $response->assertJsonPath('options.skinColor.0.value', 'f2d3b1')
            ->assertJsonPath('options.skinColor.0.unlocked', true)
            ->assertJsonPath('options.skinColor.1.value', 'edb98a')
            ->assertJsonPath('options.skinColor.1.unlocked', false);
    }

    public function test_default_values_can_be_saved_without_unlocking_anything(): void
    {
        $this->seedOptions();
        $user = User::factory()->create();

        $this->actingAs($user)->putJson('/api/avatar', ['skinColor' => 'f2d3b1', 'hair' => 'short16'])
            ->assertOk()
            ->assertJsonPath('avatar.skinColor', 'f2d3b1')
            ->assertJsonPath('avatar.hair', 'short16');
    }

    public function test_saving_a_non_unlocked_value_is_rejected(): void
    {
        $this->seedOptions();
        $user = User::factory()->create();

        $this->actingAs($user)->putJson('/api/avatar', ['hair' => 'short01'])
            ->assertStatus(422);
    }

    public function test_unlocking_an_option_spends_gems_and_lets_it_be_equipped(): void
    {
        $this->seedOptions();
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 100]);

        $this->actingAs($user)->postJson('/api/avatar/unlock', ['attributeType' => 'hair', 'value' => 'short01'])
            ->assertOk()
            ->assertJsonPath('gems', 60);

        $this->actingAs($user)->putJson('/api/avatar', ['hair' => 'short01'])
            ->assertOk()
            ->assertJsonPath('avatar.hair', 'short01');
    }

    public function test_unlocking_fails_with_insufficient_gems(): void
    {
        $this->seedOptions();
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 10]);

        $this->actingAs($user)->postJson('/api/avatar/unlock', ['attributeType' => 'hair', 'value' => 'short01'])
            ->assertStatus(422);
    }

    public function test_unlocking_an_already_unlocked_option_fails(): void
    {
        $this->seedOptions();
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 200]);

        $this->actingAs($user)->postJson('/api/avatar/unlock', ['attributeType' => 'hair', 'value' => 'short01'])->assertOk();
        $this->actingAs($user)->postJson('/api/avatar/unlock', ['attributeType' => 'hair', 'value' => 'short01'])
            ->assertStatus(422);
    }

    public function test_unlocking_the_default_option_fails(): void
    {
        $this->seedOptions();
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 200]);

        $this->actingAs($user)->postJson('/api/avatar/unlock', ['attributeType' => 'hair', 'value' => 'short16'])
            ->assertStatus(422);
    }

    public function test_unlocking_an_unknown_option_fails(): void
    {
        $user = User::factory()->create();
        UserGameState::create(['user_id' => $user->id, 'gems' => 200]);

        $this->actingAs($user)->postJson('/api/avatar/unlock', ['attributeType' => 'hair', 'value' => 'bogus'])
            ->assertStatus(422);
    }

    public function test_avatar_endpoints_require_authentication(): void
    {
        $this->getJson('/api/avatar')->assertUnauthorized();
        $this->getJson('/api/avatar/options')->assertUnauthorized();
        $this->postJson('/api/avatar/unlock', [])->assertUnauthorized();
        $this->putJson('/api/avatar', [])->assertUnauthorized();
    }
}
