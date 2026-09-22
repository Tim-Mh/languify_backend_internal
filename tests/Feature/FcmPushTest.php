<?php

namespace Tests\Feature;

use App\Enums\NotificationCategory;
use App\Models\DeviceToken;
use App\Models\User;
use App\Notifications\Messages\ExpoMessage;
use App\Services\FcmPushService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FcmPushTest extends TestCase
{
    use RefreshDatabase;

    private const FCM_ENDPOINT = 'https://fcm.googleapis.com/v1/projects/test-project/messages:send';

    private string $keyFile;

    protected function setUp(): void
    {
        // Generated BEFORE parent::setUp(), deliberately. openssl_pkey_new()
        // returns false when OpenSSL cannot find its config file, which is the
        // default state of a stock Windows PHP build, and openssl_pkey_export()
        // then throws. Doing it after parent::setUp() meant that throw escaped
        // with RefreshDatabase's transaction already open and nothing to roll
        // it back, so every later test in the process died with "cannot start a
        // transaction within a transaction" -- one broken test hiding eighty.
        //
        // Skipping here costs four tests on a machine without a usable OpenSSL
        // and keeps the other hundred-odd meaningful. CI on Linux runs them all.
        $pair = @openssl_pkey_new(['private_key_bits' => 2048, 'private_key_type' => OPENSSL_KEYTYPE_RSA]);

        if ($pair === false) {
            $this->markTestSkipped('OpenSSL cannot generate a key here (no openssl.cnf); FCM signing cannot be exercised.');
        }

        openssl_pkey_export($pair, $privateKey);

        parent::setUp();

        $this->keyFile = tempnam(sys_get_temp_dir(), 'fcm-test-');
        file_put_contents($this->keyFile, json_encode([
            'project_id' => 'test-project',
            'client_email' => 'test@test-project.iam.gserviceaccount.com',
            'private_key' => $privateKey,
            'token_uri' => 'https://oauth2.googleapis.com/token',
        ]));

        config(['services.fcm.credentials' => $this->keyFile]);

        // Noon, far from the 22:00–08:00 quiet window, so PushPolicy never
        // swallows a send in these tests.
        Carbon::setTestNow(Carbon::parse('2026-08-05 12:00:00', 'UTC'));
    }

    protected function tearDown(): void
    {
        // isset() rather than a bare read: the property is typed and stays
        // uninitialised when setUp skipped before assigning it.
        if (isset($this->keyFile)) {
            @unlink($this->keyFile);
        }

        parent::tearDown();
    }

    private function fakeGoogle(mixed $fcmResponse = null): void
    {
        Http::fake([
            'oauth2.googleapis.com/token' => Http::response(['access_token' => 'fake-access', 'expires_in' => 3600]),
            'fcm.googleapis.com/*' => $fcmResponse ?? Http::response(['name' => 'projects/test-project/messages/1']),
        ]);
    }

    public function test_sends_one_correctly_shaped_message_per_token(): void
    {
        $this->fakeGoogle();

        $message = ExpoMessage::make(NotificationCategory::Rewards, 'Chest ready', 'Free gems waiting.')
            ->deepLink('/rewards');

        app(FcmPushService::class)->send(['token-a', 'token-b'], $message);

        Http::assertSentCount(3); // one token exchange + two sends

        Http::assertSent(function ($request) {
            if ($request->url() !== self::FCM_ENDPOINT) {
                return false;
            }

            $message = $request['message'];

            return in_array($message['token'], ['token-a', 'token-b'], true)
                && $message['notification'] === ['title' => 'Chest ready', 'body' => 'Free gems waiting.']
                && $message['data']['url'] === '/rewards'
                && $message['data']['channelId'] === 'rewards'
                && $message['android']['notification']['channel_id'] === 'rewards';
        });
    }

    public function test_an_unregistered_token_is_pruned(): void
    {
        $user = User::factory()->create();

        DeviceToken::create(['user_id' => $user->id, 'token' => 'dead-token', 'provider' => 'fcm']);

        $this->fakeGoogle(Http::response([
            'error' => [
                'code' => 404,
                'status' => 'NOT_FOUND',
                'details' => [['errorCode' => 'UNREGISTERED']],
            ],
        ], 404));

        app(FcmPushService::class)->send(
            ['dead-token'],
            ExpoMessage::make(NotificationCategory::Rewards, 'T', 'B'),
        );

        $this->assertDatabaseMissing('device_tokens', ['token' => 'dead-token']);
    }

    public function test_missing_credentials_skips_sending_without_calling_out(): void
    {
        config(['services.fcm.credentials' => null]);
        Http::fake();

        app(FcmPushService::class)->send(
            ['some-token'],
            ExpoMessage::make(NotificationCategory::Rewards, 'T', 'B'),
        );

        Http::assertNothingSent();
    }

    public function test_the_channel_routes_each_token_to_its_own_service(): void
    {
        $user = User::factory()->create(['timezone' => 'UTC']);

        DeviceToken::create(['user_id' => $user->id, 'token' => 'ExponentPushToken[AAA]', 'provider' => 'expo']);
        DeviceToken::create(['user_id' => $user->id, 'token' => 'raw-fcm-token', 'provider' => 'fcm']);

        Http::fake([
            'exp.host/*' => Http::response(['data' => [['status' => 'ok']]]),
            'oauth2.googleapis.com/token' => Http::response(['access_token' => 'fake-access', 'expires_in' => 3600]),
            'fcm.googleapis.com/*' => Http::response(['name' => 'projects/test-project/messages/1']),
        ]);

        $user->notify(new class extends Notification
        {
            public function via(object $notifiable): array
            {
                return ['expo'];
            }

            public function toExpo(object $notifiable): ExpoMessage
            {
                return ExpoMessage::make(NotificationCategory::Rewards, 'Chest ready', 'Free gems waiting.')
                    ->deepLink('/rewards');
            }
        });

        Http::assertSent(fn ($request) => str_contains($request->url(), 'exp.host')
            && $request[0]['to'] === 'ExponentPushToken[AAA]');

        Http::assertSent(fn ($request) => $request->url() === self::FCM_ENDPOINT
            && $request['message']['token'] === 'raw-fcm-token');
    }
}
