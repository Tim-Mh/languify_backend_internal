<?php

namespace App\Services;

use App\Models\DeviceToken;
use App\Notifications\Messages\ExpoMessage;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Delivers push notifications straight through FCM's HTTP v1 API, for tokens
 * the bare React Native app registers with provider 'fcm'.
 *
 * This is the counterpart to ExpoPushService, which keeps handling the wrapped
 * tokens the Expo builds registered. Same message, same policy checks — only
 * the wire protocol differs, and ExpoChannel picks the service per token.
 *
 * Credentials are a Firebase service account key: a JSON file whose path is
 * FIREBASE_CREDENTIALS in .env, downloaded from the Firebase console (project
 * settings → service accounts → generate new private key). It stays out of
 * the repository for the same reason the Stripe secret does. Without it every
 * send is skipped with one log line, which keeps a half-configured deploy
 * from failing requests.
 *
 * Sends are synchronous, matching every other notification in this app. FCM
 * v1 has no batch endpoint (the old one was retired in 2024), so it is one
 * HTTP call per device — fine at this app's scale, where a user has one or
 * two phones and pushes are capped at three a day anyway.
 */
class FcmPushService
{
    /** Matches ExpoPushService: this runs inline inside the hourly sweep. */
    private const TIMEOUT_SECONDS = 10;

    private const OAUTH_SCOPE = 'https://www.googleapis.com/auth/firebase.messaging';

    /**
     * Sends one message to every supplied FCM registration token.
     *
     * @param  array<int, string>  $tokens
     */
    public function send(array $tokens, ExpoMessage $message): void
    {
        $tokens = array_values(array_unique(array_filter($tokens)));

        if ($tokens === []) {
            return;
        }

        $account = $this->serviceAccount();

        if ($account === null) {
            Log::warning('FCM push skipped: no service account configured', [
                'devices' => count($tokens),
            ]);

            return;
        }

        $accessToken = $this->accessToken($account);

        if ($accessToken === null) {
            return;
        }

        $body = $this->messageBody($message);
        $endpoint = 'https://fcm.googleapis.com/v1/projects/'.$account['project_id'].'/messages:send';

        foreach ($tokens as $token) {
            $this->sendOne($endpoint, $accessToken, $token, $body);
        }
    }

    /**
     * The FCM v1 message, minus the per-device token.
     *
     * Built from the same ExpoMessage the Expo path sends, so a notification
     * class does not know or care which service delivers it. The notification
     * block makes the system draw it (matching how Expo-relayed messages
     * arrived), the Android channel comes from the category exactly as it did
     * via Expo's channelId, and `data` carries the deep link the app reads.
     *
     * @return array<string, mixed>
     */
    private function messageBody(ExpoMessage $message): array
    {
        $payload = $message->toArray();

        // FCM requires data values to be strings — anything else is rejected
        // with INVALID_ARGUMENT for the whole message.
        $data = [];

        foreach (($payload['data'] ?? []) as $key => $value) {
            $data[$key] = is_string($value) ? $value : json_encode($value);
        }

        // The app's background handler falls back to the 'default' channel for
        // an unknown id, but it reads data.channelId to decide — carried here
        // so a data-only future message keeps working unchanged.
        $data['channelId'] = $payload['channelId'];

        return [
            'notification' => [
                'title' => $payload['title'],
                'body' => $payload['body'],
            ],
            'data' => $data,
            'android' => [
                'notification' => [
                    'channel_id' => $payload['channelId'],
                    'default_sound' => true,
                ],
            ],
            'apns' => [
                'payload' => [
                    'aps' => ['sound' => 'default'],
                ],
            ],
        ];
    }

    /**
     * @param  array<string, mixed>  $body
     */
    private function sendOne(string $endpoint, string $accessToken, string $token, array $body): void
    {
        try {
            $response = Http::withToken($accessToken)
                ->timeout(self::TIMEOUT_SECONDS)
                ->asJson()
                ->post($endpoint, ['message' => ['token' => $token, ...$body]]);
        } catch (\Throwable $e) {
            // FCM unreachable, or the request timed out. A learner missing one
            // notification is not worth failing the request that triggered it.
            Log::warning('FCM push request failed', ['exception' => $e->getMessage()]);

            return;
        }

        if ($response->successful()) {
            return;
        }

        // UNREGISTERED is FCM's DeviceNotRegistered: the app was deleted or
        // the token rotated, and the row will fail forever if left. Surfaced
        // as 404/NOT_FOUND with UNREGISTERED in the error details.
        $status = $response->json('error.status');
        $details = $response->json('error.details.0.errorCode');

        if ($response->status() === 404 || $status === 'NOT_FOUND' || $details === 'UNREGISTERED') {
            DeviceToken::where('token', $token)->delete();

            return;
        }

        Log::warning('FCM push rejected the message', [
            'http_status' => $response->status(),
            'status' => $status,
            'message' => $response->json('error.message'),
        ]);
    }

    /**
     * The parsed service account key, or null when none is configured.
     *
     * @return array{project_id: string, client_email: string, private_key: string, token_uri: string}|null
     */
    private function serviceAccount(): ?array
    {
        $path = config('services.fcm.credentials');

        if (! $path || ! is_readable($path)) {
            return null;
        }

        $account = json_decode((string) file_get_contents($path), true);

        if (! isset($account['project_id'], $account['client_email'], $account['private_key'])) {
            Log::warning('FCM service account file is not a valid key', ['path' => $path]);

            return null;
        }

        $account['token_uri'] ??= 'https://oauth2.googleapis.com/token';

        return $account;
    }

    /**
     * A Google OAuth access token for the messaging scope.
     *
     * The JWT-bearer grant: sign a short-lived assertion with the service
     * account's private key and swap it for an access token. Cached just shy
     * of its hour so the hourly sweep mints one token, not one per learner.
     *
     * @param  array{project_id: string, client_email: string, private_key: string, token_uri: string}  $account
     */
    private function accessToken(array $account): ?string
    {
        return Cache::remember('fcm.access_token', now()->addMinutes(50), function () use ($account) {
            $issued = time();

            $assertion = JWT::encode([
                'iss' => $account['client_email'],
                'scope' => self::OAUTH_SCOPE,
                'aud' => $account['token_uri'],
                'iat' => $issued,
                'exp' => $issued + 3600,
            ], $account['private_key'], 'RS256');

            try {
                $response = Http::asForm()
                    ->timeout(self::TIMEOUT_SECONDS)
                    ->post($account['token_uri'], [
                        'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                        'assertion' => $assertion,
                    ]);
            } catch (\Throwable $e) {
                Log::warning('FCM token exchange failed', ['exception' => $e->getMessage()]);

                return null;
            }

            if ($response->failed() || ! $response->json('access_token')) {
                Log::warning('FCM token exchange rejected', [
                    'status' => $response->status(),
                    'error' => $response->json('error_description') ?? $response->json('error'),
                ]);

                return null;
            }

            return $response->json('access_token');
        });
    }
}
