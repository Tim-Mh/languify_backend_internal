<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DeviceToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use OpenApi\Attributes as OA;

/**
 * Registration of the mobile app's push tokens.
 *
 * The app calls store() on every launch of a signed-in session (the push
 * service can reissue a token after an app update or a device restore, and
 * the client has no reliable way to notice), and revoke() on sign-out.
 *
 * Two token dialects coexist here while the Expo build ages out: the Expo
 * builds register wrapped ExponentPushToken[…] strings, and the bare React
 * Native build registers raw FCM registration tokens with provider 'fcm'.
 */
class DeviceTokenController extends Controller
{
    /**
     * Expo's own token format. Validated because anything else is guaranteed to
     * fail at send time, and a table of junk tokens costs a failed HTTP call per
     * notification forever.
     */
    private const EXPO_TOKEN_PATTERN = '/^Expo(nent)?PushToken\[[^\]]+\]$/';

    /**
     * FCM registration tokens have no documented grammar, so this is the
     * loosest check that still keeps junk out: the characters FCM actually
     * uses, and a length no hand-typed string reaches by accident.
     */
    private const FCM_TOKEN_PATTERN = '/^[A-Za-z0-9_:\-.]{40,}$/';

    #[OA\Post(
        path: '/api/device-tokens',
        summary: 'Register this device for push notifications',
        description: 'Idempotent: keyed on the token, so repeat calls from the same device update the existing row '
            .'rather than adding another. A token already registered to a different account is MOVED to the caller, '
            .'which is what stops the previous user\'s notifications arriving on a shared phone.',
        tags: ['Notifications'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['token'],
            properties: [
                new OA\Property(property: 'token', type: 'string', example: 'ExponentPushToken[xxxxxxxxxxxxxxxxxxxxxx]'),
                new OA\Property(property: 'provider', type: 'string', enum: ['expo', 'fcm'], example: 'fcm',
                    description: 'Which push service issued the token. Defaults to expo, which is what the Expo builds send (nothing at all).'),
                new OA\Property(property: 'platform', type: 'string', enum: ['ios', 'android'], example: 'android'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Device registered'),
            new OA\Response(response: 422, description: 'Validation error'),
        ],
    )]
    public function store(Request $request): JsonResponse
    {
        // Defaulted before validation so the token rule can depend on it: the
        // Expo builds predate the field and send nothing, which has to keep
        // meaning what it always meant.
        $provider = $request->input('provider', 'expo');

        $data = $request->validate([
            'token' => [
                'required', 'string', 'max:255',
                'regex:'.($provider === 'fcm' ? self::FCM_TOKEN_PATTERN : self::EXPO_TOKEN_PATTERN),
            ],
            'provider' => ['nullable', 'string', 'in:expo,fcm'],
            'platform' => ['nullable', 'string', 'in:ios,android'],
        ]);

        // Keyed on the token alone, not (user, token). The token identifies a
        // physical device: if somebody signs out and a second learner signs in
        // on the same phone, that row has to change hands, not gain a sibling —
        // otherwise the first account keeps pushing to a phone it no longer
        // has.
        DeviceToken::updateOrCreate(
            ['token' => $data['token']],
            [
                'user_id' => $request->user()->id,
                'provider' => $provider,
                'platform' => $data['platform'] ?? null,
                'last_registered_at' => Carbon::now(),
            ],
        );

        return response()->json(['registered' => true]);
    }

    #[OA\Post(
        path: '/api/device-tokens/revoke',
        summary: 'Stop sending push notifications to this device',
        description: 'Called on sign-out. Scoped to the caller\'s own devices, so a token cannot be used to '
            .'unregister somebody else\'s phone.',
        tags: ['Notifications'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['token'],
            properties: [new OA\Property(property: 'token', type: 'string', example: 'ExponentPushToken[xxxxxxxxxxxxxxxxxxxxxx]')],
        )),
        responses: [new OA\Response(response: 200, description: 'Device revoked, or was not registered')],
    )]
    public function revoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'token' => ['required', 'string', 'max:255'],
        ]);

        // Deliberately not a 404 when nothing matches. Sign-out is fire and
        // forget on the client, and a device that was never registered (Expo
        // Go, a declined permission prompt) is a success as far as the caller
        // is concerned: it is not receiving push either way.
        $request->user()->deviceTokens()->where('token', $data['token'])->delete();

        return response()->json(['revoked' => true]);
    }
}
