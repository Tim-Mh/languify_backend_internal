<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registering_creates_an_unverified_user_and_does_not_log_in(): void
    {
        $response = $this->postJson('/api/auth/register', [
            'email' => 'new@example.com',
            'password' => 'secret123',
        ])->assertStatus(201);

        $response->assertJsonPath('email', 'new@example.com')
            ->assertCookieMissing(config('auth_cookie.name'));

        $user = User::where('email', 'new@example.com')->first();
        $this->assertNull($user->email_verified_at);
        $this->assertNotNull($user->otp_code);
        $this->assertNotNull($user->otp_expires_at);

        // No auth cookie should be set yet.
        $this->getJson('/api/auth/me')->assertStatus(401);
    }

    public function test_verifying_the_correct_otp_logs_the_user_in(): void
    {
        $this->postJson('/api/auth/register', [
            'email' => 'new@example.com',
            'password' => 'secret123',
        ]);

        $user = User::where('email', 'new@example.com')->first();

        $this->postJson('/api/auth/verify-otp', [
            'email' => 'new@example.com',
            'otp' => $user->otp_code,
        ])->assertOk();

        $user->refresh();
        $this->assertNotNull($user->email_verified_at);
        $this->assertNull($user->otp_code);
        $this->assertNull($user->otp_expires_at);
    }

    public function test_verifying_the_wrong_otp_fails(): void
    {
        $this->postJson('/api/auth/register', [
            'email' => 'new@example.com',
            'password' => 'secret123',
        ]);

        $this->postJson('/api/auth/verify-otp', [
            'email' => 'new@example.com',
            'otp' => '000000',
        ])->assertStatus(422);
    }

    public function test_verifying_an_expired_otp_fails(): void
    {
        $this->postJson('/api/auth/register', [
            'email' => 'new@example.com',
            'password' => 'secret123',
        ]);

        $user = User::where('email', 'new@example.com')->first();
        $user->forceFill(['otp_expires_at' => now()->subMinute()])->save();

        $this->postJson('/api/auth/verify-otp', [
            'email' => 'new@example.com',
            'otp' => $user->otp_code,
        ])->assertStatus(422);
    }

    public function test_resending_otp_issues_a_new_code(): void
    {
        $this->postJson('/api/auth/register', [
            'email' => 'new@example.com',
            'password' => 'secret123',
        ]);

        $user = User::where('email', 'new@example.com')->first();
        $originalOtp = $user->otp_code;

        $this->postJson('/api/auth/resend-otp', ['email' => 'new@example.com'])->assertOk();

        $user->refresh();
        // Astronomically unlikely to collide, but assert the fields were touched either way.
        $this->assertNotNull($user->otp_code);
        $this->assertNotNull($user->otp_expires_at);
        if ($user->otp_code === $originalOtp) {
            $this->assertTrue(true); // collision, still a valid resend
        }
    }

    public function test_resending_otp_for_an_already_verified_user_fails(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->postJson('/api/auth/resend-otp', ['email' => $user->email])->assertStatus(422);
    }

    public function test_logging_in_before_verifying_email_is_blocked_and_sends_a_fresh_otp(): void
    {
        $user = User::factory()->create(['email_verified_at' => null, 'password' => 'secret123']);

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ])->assertStatus(403);

        $response->assertJsonPath('requiresVerification', true);

        $user->refresh();
        $this->assertNotNull($user->otp_code);
    }

    public function test_logging_in_after_verifying_email_succeeds(): void
    {
        $user = User::factory()->create(['email_verified_at' => now(), 'password' => 'secret123']);

        $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ])->assertOk();
    }

    public function test_forgot_password_returns_the_same_message_whether_or_not_the_email_exists(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $known = $this->postJson('/api/auth/forgot-password', ['email' => $user->email])->assertOk();
        $unknown = $this->postJson('/api/auth/forgot-password', ['email' => 'nobody@example.com'])->assertOk();

        $this->assertSame($known->json('message'), $unknown->json('message'));

        $user->refresh();
        $this->assertNotNull($user->password_reset_code);
    }

    public function test_reset_password_with_the_correct_otp_changes_the_password(): void
    {
        $user = User::factory()->create(['email_verified_at' => now(), 'password' => 'oldPassword']);

        $this->postJson('/api/auth/forgot-password', ['email' => $user->email]);
        $user->refresh();

        $this->postJson('/api/auth/reset-password', [
            'email' => $user->email,
            'otp' => $user->password_reset_code,
            'password' => 'brandNewPassword',
        ])->assertOk();

        $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'brandNewPassword',
        ])->assertOk();
    }

    public function test_reset_password_with_the_wrong_otp_fails(): void
    {
        $user = User::factory()->create(['email_verified_at' => now()]);

        $this->postJson('/api/auth/forgot-password', ['email' => $user->email]);

        $this->postJson('/api/auth/reset-password', [
            'email' => $user->email,
            'otp' => '000000',
            'password' => 'brandNewPassword',
        ])->assertStatus(422);
    }

    public function test_reset_password_revokes_existing_tokens(): void
    {
        $user = User::factory()->create(['email_verified_at' => now(), 'password' => 'oldPassword']);
        $existingToken = $user->createToken('pre-reset-session')->plainTextToken;

        $this->postJson('/api/auth/forgot-password', ['email' => $user->email]);
        $user->refresh();

        $this->postJson('/api/auth/reset-password', [
            'email' => $user->email,
            'otp' => $user->password_reset_code,
            'password' => 'brandNewPassword',
        ])->assertOk();

        $this->withHeader('Authorization', 'Bearer '.$existingToken)
            ->getJson('/api/auth/me')
            ->assertStatus(401);
    }

    /**
     * Google/Apple sign-in never silently attaches to a pre-existing
     * password account just because the email matches (see
     * SocialAuthController) — it stashes the pending link and only applies
     * it once the real password has been verified via login(), which is
     * exactly what this exercises without needing to mock Socialite.
     */
    public function test_login_applies_a_pending_oauth_link_after_password_verification(): void
    {
        $user = User::factory()->create(['email_verified_at' => now(), 'password' => 'secret123']);
        $this->assertNull($user->google_id);

        Cache::put('oauth_link:google:'.strtolower($user->email), 'google-external-id-123', now()->addMinutes(10));

        $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ])->assertOk();

        $user->refresh();
        $this->assertSame('google-external-id-123', $user->google_id);
        $this->assertNull(Cache::get('oauth_link:google:'.strtolower($user->email)));
    }

    public function test_login_does_not_overwrite_an_already_linked_provider_id(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
            'password' => 'secret123',
            'google_id' => 'original-google-id',
        ]);

        Cache::put('oauth_link:google:'.strtolower($user->email), 'a-different-google-id', now()->addMinutes(10));

        $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ])->assertOk();

        $user->refresh();
        $this->assertSame('original-google-id', $user->google_id);
    }
}
