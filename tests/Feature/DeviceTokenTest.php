<?php

namespace Tests\Feature;

use App\Models\DeviceToken;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeviceTokenTest extends TestCase
{
    use RefreshDatabase;

    private const EXPO_TOKEN = 'ExponentPushToken[AAAAAAAAAAAAAAAAAAAAAA]';

    private const FCM_TOKEN = 'dGVzdC1pbnN0YW5jZS1pZA:APA91bE_fake_registration_token_long_enough_to_pass';

    public function test_expo_token_registers_without_a_provider(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->postJson('/api/device-tokens', ['token' => self::EXPO_TOKEN, 'platform' => 'android'])
            ->assertOk()
            ->assertJson(['registered' => true]);

        $this->assertDatabaseHas('device_tokens', [
            'token' => self::EXPO_TOKEN,
            'user_id' => $user->id,
            'provider' => 'expo',
        ]);
    }

    public function test_fcm_token_registers_with_the_fcm_provider(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->postJson('/api/device-tokens', [
                'token' => self::FCM_TOKEN,
                'provider' => 'fcm',
                'platform' => 'android',
            ])
            ->assertOk()
            ->assertJson(['registered' => true]);

        $this->assertDatabaseHas('device_tokens', [
            'token' => self::FCM_TOKEN,
            'user_id' => $user->id,
            'provider' => 'fcm',
        ]);
    }

    public function test_fcm_shaped_token_is_rejected_without_the_fcm_provider(): void
    {
        // The old contract stays strict: a client that does not say 'fcm' is
        // an Expo build, and an Expo build sending a raw token is a bug.
        $this->actingAs(User::factory()->create())
            ->postJson('/api/device-tokens', ['token' => self::FCM_TOKEN])
            ->assertStatus(422)
            ->assertJsonValidationErrors('token');
    }

    public function test_junk_token_is_rejected_for_both_providers(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->postJson('/api/device-tokens', ['token' => 'short junk'])
            ->assertStatus(422);

        $this->actingAs($user)
            ->postJson('/api/device-tokens', ['token' => 'has spaces so not a token', 'provider' => 'fcm'])
            ->assertStatus(422);
    }

    public function test_a_token_moves_between_users_rather_than_duplicating(): void
    {
        $first = User::factory()->create();
        $second = User::factory()->create();

        $this->actingAs($first)
            ->postJson('/api/device-tokens', ['token' => self::FCM_TOKEN, 'provider' => 'fcm'])
            ->assertOk();

        $this->actingAs($second)
            ->postJson('/api/device-tokens', ['token' => self::FCM_TOKEN, 'provider' => 'fcm'])
            ->assertOk();

        $this->assertSame(1, DeviceToken::where('token', self::FCM_TOKEN)->count());
        $this->assertSame($second->id, DeviceToken::where('token', self::FCM_TOKEN)->value('user_id'));
    }

    public function test_revoke_only_touches_the_callers_own_devices(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();

        DeviceToken::create([
            'user_id' => $owner->id,
            'token' => self::FCM_TOKEN,
            'provider' => 'fcm',
        ]);

        $this->actingAs($other)
            ->postJson('/api/device-tokens/revoke', ['token' => self::FCM_TOKEN])
            ->assertOk();

        $this->assertDatabaseHas('device_tokens', ['token' => self::FCM_TOKEN]);

        $this->actingAs($owner)
            ->postJson('/api/device-tokens/revoke', ['token' => self::FCM_TOKEN])
            ->assertOk();

        $this->assertDatabaseMissing('device_tokens', ['token' => self::FCM_TOKEN]);
    }
}
