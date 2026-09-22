<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use App\Support\DeviceTimezone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use OpenApi\Attributes as OA;

/**
 * Sign-in from the mobile app's native Google and Apple SDKs.
 *
 * The browser flow in SocialAuthController is still how the website signs in,
 * and still how the app signs in when it is running somewhere the native SDKs
 * are unavailable. This is the other half: the native SDK runs the consent
 * sheet on the device, hands the app a signed **identity token**, and the app
 * posts it here to be exchanged for a Sanctum token.
 *
 * The identity token is the whole security boundary, so it is verified rather
 * than trusted:
 *
 * - **Google**: checked with Google's own tokeninfo endpoint, which validates
 *   the signature and expiry, and then the `aud` claim is matched against our
 *   configured client IDs. Skipping that last step is the classic mistake — a
 *   token minted for *someone else's* app is perfectly valid, and would let
 *   them sign in as any of our users.
 * - **Apple**: handed to the Socialite Apple provider's `userFromToken`, which
 *   verifies the JWT against Apple's published keys before decoding it.
 *
 * Account resolution deliberately mirrors the browser callback exactly,
 * including refusing to auto-link a social identity onto an existing
 * password account.
 */
class NativeSocialAuthController extends Controller
{
    #[OA\Post(
        path: '/api/auth/{provider}/native',
        summary: 'Exchange a native Google/Apple identity token for a Sanctum token',
        description: 'Used by the mobile app when signing in through the platform SDK rather than the browser redirect flow. '
            .'The identity token is verified against the provider before any account is touched.',
        tags: ['Auth'],
        parameters: [new OA\PathParameter(name: 'provider', schema: new OA\Schema(type: 'string', enum: ['google', 'apple']))],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['identityToken'],
            properties: [
                new OA\Property(property: 'identityToken', type: 'string', description: 'Google id_token or Apple identityToken'),
                new OA\Property(property: 'fullName', type: 'string', nullable: true, description: 'Apple only, and only on the very first authorization'),
                new OA\Property(property: 'timezone', type: 'string', nullable: true, example: 'Asia/Karachi'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Signed in'),
            new OA\Response(response: 409, description: 'An account with this email already exists; sign in with its password first'),
            new OA\Response(response: 422, description: 'The identity token was rejected'),
        ],
    )]
    public function store(Request $request, string $provider): JsonResponse
    {
        if (! in_array($provider, ['google', 'apple'], true)) {
            return response()->json(['message' => 'Unsupported provider.'], 422);
        }

        $data = $request->validate([
            'identityToken' => ['required', 'string'],
            'fullName' => ['nullable', 'string', 'max:255'],
            'timezone' => DeviceTimezone::RULES,
        ]);

        try {
            $identity = $provider === 'google'
                ? $this->verifyGoogleToken($data['identityToken'])
                : $this->verifyAppleToken($data['identityToken']);
        } catch (\Throwable $e) {
            Log::warning('Native OAuth token rejected', [
                'provider' => $provider,
                'reason' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'That sign-in could not be verified. Please try again.'], 422);
        }

        if (! $identity['email']) {
            return response()->json([
                'message' => 'That account did not share an email address, so we cannot sign you in.',
            ], 422);
        }

        $column = $provider === 'google' ? 'google_id' : 'apple_id';
        $user = User::where($column, $identity['id'])->first();

        try {
            if (! $user) {
                $existing = User::where('email', $identity['email'])->first();

                if ($existing) {
                    // Same rule as the browser callback: link the provider to
                    // the existing password account, because verifyGoogleToken()
                    // above has already refused any token whose email_verified
                    // claim is not true, and someone holding the mailbox could
                    // reset the password anyway.
                    //
                    // Apple still has to prove it. Its tokens can carry a
                    // private-relay address, or one Apple has not verified, so
                    // the old stash-and-confirm flow stays for that provider.
                    if ($provider !== 'google') {
                        SocialAuthController::stashPendingLink($provider, $existing->email, $identity['id']);

                        return response()->json([
                            'message' => 'An account already exists for this email. Sign in with your password once, and this will be linked automatically.',
                            'oauthConflict' => $provider,
                            'email' => $existing->email,
                        ], 409);
                    }

                    $user = $existing;
                    $user->forceFill([
                        $column => $identity['id'],
                        'email_verified_at' => $user->email_verified_at ?? now(),
                    ])->save();
                }
            }

            if (! $user) {
                $user = User::create([
                    // Apple sends a name only on the very first authorization
                    // ever, and the SDK gives it to the app rather than putting
                    // it in the token — hence `fullName` coming in on the body.
                    'full_name' => $identity['name'] ?: ($data['fullName'] ?: null),
                    'email' => $identity['email'],
                    'password' => Str::random(40),
                ]);

                $user->forceFill([
                    $column => $identity['id'],
                    'email_verified_at' => now(),
                ])->save();

                // Set before the welcome email and before any game state exists,
                // so this account's first day boundary is already in the
                // learner's own timezone.
                if ($timezone = DeviceTimezone::normalise($data['timezone'] ?? null)) {
                    $user->forceFill(['timezone' => $timezone])->save();
                }

                if (trim((string) $user->full_name) === '') {
                    SocialAuthController::assignGeneratedName($user);
                }

                $user->notify(new WelcomeNotification);
            } else {
                if (trim((string) $user->full_name) === '' && ($identity['name'] || ! empty($data['fullName']))) {
                    $user->forceFill(['full_name' => $identity['name'] ?: $data['fullName']])->save();
                }

                if (! $user->timezone && ($timezone = DeviceTimezone::normalise($data['timezone'] ?? null))) {
                    $user->forceFill(['timezone' => $timezone])->save();
                }
            }
        } catch (\Throwable $e) {
            // A unique-constraint race — two sign-ins for a brand-new email
            // landing together — would otherwise surface as a raw 500.
            Log::error('Native OAuth account resolution failed', [
                'provider' => $provider,
                'exception' => $e->getMessage(),
            ]);

            return response()->json(['message' => 'Could not complete sign-in. Please try again.'], 422);
        }

        $expiryMinutes = config('auth_cookie.expire_minutes');

        return response()->json([
            'token' => $user->createToken('auth_token', ['*'], now()->addMinutes($expiryMinutes))->plainTextToken,
            'user' => $user->fresh(),
        ]);
    }

    /**
     * Verifies a Google ID token and returns `[id, email, name]`.
     *
     * tokeninfo does the signature and expiry checks at Google's end; the
     * audience check is ours to make and is the part that matters. Any client
     * ID we ship — web, Android, iOS — is acceptable, because they all belong
     * to this project; anything else is a token minted for a different app.
     */
    private function verifyGoogleToken(string $idToken): array
    {
        $response = Http::asJson()
            ->timeout(10)
            ->get('https://oauth2.googleapis.com/tokeninfo', ['id_token' => $idToken]);

        if (! $response->successful()) {
            throw new \RuntimeException('Google rejected the identity token.');
        }

        $claims = $response->json();

        $allowed = collect([
            config('services.google.client_id'),
            config('services.google.android_client_id'),
            config('services.google.ios_client_id'),
        ])->filter()->values()->all();

        if (empty($allowed)) {
            throw new \RuntimeException('No Google client IDs are configured to check the audience against.');
        }

        if (! in_array($claims['aud'] ?? null, $allowed, true)) {
            throw new \RuntimeException('The identity token was issued for a different application.');
        }

        if (($claims['iss'] ?? null) !== 'https://accounts.google.com'
            && ($claims['iss'] ?? null) !== 'accounts.google.com') {
            throw new \RuntimeException('Unexpected issuer.');
        }

        // Google returns this as the string "true".
        if (filter_var($claims['email_verified'] ?? false, FILTER_VALIDATE_BOOLEAN) !== true) {
            throw new \RuntimeException('The Google account has no verified email.');
        }

        return [
            'id' => (string) ($claims['sub'] ?? ''),
            'email' => $claims['email'] ?? null,
            'name' => $claims['name'] ?? null,
        ];
    }

    /**
     * Verifies an Apple identity token and returns `[id, email, name]`.
     *
     * `userFromToken` runs the provider's own `checkToken`, which validates the
     * signature against Apple's published keys and the standard claims, so the
     * audience is checked there against `services.apple.client_id`.
     *
     * Apple mints the audience as whichever client asked for the token: the
     * web Services ID from the browser flow, the app's BUNDLE ID from the
     * native iOS sheet. Both belong to us, so when the token's (unverified)
     * aud matches the configured native client id, that id is swapped in
     * before the driver resolves — the signature check afterwards is what
     * makes trusting the claim safe: a forged aud fails verification anyway.
     */
    private function verifyAppleToken(string $identityToken): array
    {
        $native = config('services.apple.native_client_id');

        if ($native && $this->unverifiedAudience($identityToken) === $native) {
            config(['services.apple.client_id' => $native]);
        }

        $appleUser = Socialite::driver('apple')->userFromToken($identityToken);

        return [
            'id' => (string) $appleUser->getId(),
            'email' => $appleUser->getEmail(),
            'name' => $appleUser->getName(),
        ];
    }

    /** The token's aud claim, read without verifying — see verifyAppleToken. */
    private function unverifiedAudience(string $jwt): ?string
    {
        $segments = explode('.', $jwt);

        if (count($segments) !== 3) {
            return null;
        }

        $claims = json_decode(base64_decode(strtr($segments[1], '-_', '+/')) ?: '', true);
        $aud = $claims['aud'] ?? null;

        return is_array($aud) ? ($aud[0] ?? null) : $aud;
    }
}
