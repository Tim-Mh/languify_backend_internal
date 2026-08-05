<?php

namespace App\Services;

use App\Models\DeviceToken;
use App\Notifications\Messages\ExpoMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Delivers push notifications through Expo's push service, which fans out to
 * FCM (Android) and APNs (iOS) on our behalf.
 *
 * Expo holds the FCM service account key and the APNs key — they were uploaded
 * once with `eas credentials` and live on Expo's side, NOT on this server. That
 * is the whole reason for routing through Expo rather than talking to Google and
 * Apple directly: no push credentials sit on a shared cPanel host, and there is
 * one API instead of two.
 *
 * Sends are synchronous, matching every other notification in this app (none of
 * them are ShouldQueue). The timeout is deliberately short because the hourly
 * sweep runs these in a loop over chunked users — see SendDailyNotifications —
 * and a hanging HTTP call there stalls every user behind it.
 */
class ExpoPushService
{
    private const ENDPOINT = 'https://exp.host/--/api/v2/push/send';

    /** Expo rejects a request carrying more than this many messages. */
    private const MAX_PER_REQUEST = 100;

    /** Short on purpose: this runs inline inside the hourly sweep. */
    private const TIMEOUT_SECONDS = 10;

    /**
     * Sends one message to every supplied device token.
     *
     * @param  array<int, string>  $tokens
     */
    public function send(array $tokens, ExpoMessage $message): void
    {
        $tokens = array_values(array_unique(array_filter($tokens)));

        if ($tokens === []) {
            return;
        }

        $payload = $message->toArray();

        foreach (array_chunk($tokens, self::MAX_PER_REQUEST) as $chunk) {
            $this->sendChunk($chunk, $payload);
        }
    }

    /**
     * One message object per token rather than a single message addressed to
     * many. Expo accepts both, but the per-token form keeps the response's
     * ticket array index-aligned with $chunk, which is what makes it possible
     * to tell WHICH device a DeviceNotRegistered belongs to.
     *
     * @param  array<int, string>  $chunk
     */
    private function sendChunk(array $chunk, array $payload): void
    {
        $messages = array_map(fn (string $token) => ['to' => $token, ...$payload], $chunk);

        try {
            $response = Http::withHeaders([
                'accept' => 'application/json',
                'accept-encoding' => 'gzip, deflate',
            ])
                ->when(
                    // Expo only requires this if "enhanced security for push
                    // notifications" is switched on for the project. Unset is
                    // the normal case and works fine.
                    (bool) config('services.expo.access_token'),
                    fn ($request) => $request->withToken(config('services.expo.access_token')),
                )
                ->timeout(self::TIMEOUT_SECONDS)
                ->asJson()
                ->post(self::ENDPOINT, $messages);
        } catch (\Throwable $e) {
            // Expo unreachable, or the request timed out. A learner missing one
            // notification is not worth failing the request (or the sweep) that
            // triggered it.
            Log::warning('Expo push request failed', [
                'exception' => $e->getMessage(),
                'devices' => count($chunk),
            ]);

            return;
        }

        if ($response->failed()) {
            // Request-level rejection: everything in this chunk was dropped.
            // Codes worth recognising here are PUSH_TOO_MANY_NOTIFICATIONS
            // (a chunking bug on our side) and TOO_MANY_REQUESTS (over Expo's
            // 600/second project limit).
            Log::warning('Expo push rejected the request', [
                'status' => $response->status(),
                'errors' => $response->json('errors'),
            ]);

            return;
        }

        $this->handleTickets($response->json('data') ?? [], $chunk);
    }

    /**
     * Reads the per-device outcome. Expo returns one ticket per message, in the
     * order they were sent.
     *
     * An "ok" ticket only means Expo accepted it for delivery, not that the
     * phone got it — that is what the receipts endpoint is for, and it is not
     * worth polling at this app's scale. The one outcome that matters here is
     * DeviceNotRegistered: the app was deleted, or the token was rotated, and
     * the row is dead weight that will fail forever if left.
     *
     * @param  array<int, array<string, mixed>>  $tickets
     * @param  array<int, string>  $chunk
     */
    private function handleTickets(array $tickets, array $chunk): void
    {
        $dead = [];

        foreach ($tickets as $index => $ticket) {
            if (($ticket['status'] ?? null) === 'ok') {
                continue;
            }

            $token = $chunk[$index] ?? null;
            $error = $ticket['details']['error'] ?? null;

            if ($token && $error === 'DeviceNotRegistered') {
                $dead[] = $token;

                continue;
            }

            Log::warning('Expo push ticket returned an error', [
                'error' => $error,
                'message' => $ticket['message'] ?? null,
            ]);
        }

        if ($dead !== []) {
            DeviceToken::whereIn('token', $dead)->delete();
        }
    }
}
