<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use OpenApi\Attributes as OA;

class SocialAuthController extends Controller
{
    #[OA\Get(
        path: '/api/auth/google/redirect',
        summary: 'Start Google OAuth login',
        description: 'Redirects the browser to Google\'s consent screen.',
        tags: ['Auth'],
        responses: [new OA\Response(response: 302, description: 'Redirect to Google')],
    )]
    public function redirectToGoogle(Request $request): RedirectResponse
    {
        return self::withMobileRedirectCookie(
            self::withTimezoneCookie(
                Socialite::driver('google')
                    ->stateless()
                    // Always show the account picker. Without this Google
                    // silently reuses the one session already signed in to the
                    // browser, so anyone with more than one account (a personal
                    // and a work one, say) gets whichever Google picked and has
                    // no way to choose from inside our app.
                    ->with(['prompt' => 'select_account'])
                    ->redirect(),
                $request,
            ),
            $request,
        );
    }

    /**
     * Whether Google states it has verified this account's email address.
     *
     * Socialite copies the provider's `email_verified` claim into the raw user
     * array and also mirrors it as `verified_email`, so both are checked. The
     * value arrives as a real boolean from the v3 userinfo endpoint but as the
     * string "true" from some other Google surfaces, hence FILTER_VALIDATE_BOOLEAN
     * rather than a plain cast, which would read "false" as true.
     *
     * Anything missing or unrecognised is treated as NOT verified.
     */
    private static function googleVerifiedEmail(\Laravel\Socialite\Contracts\User $googleUser): bool
    {
        $raw = (array) ($googleUser->user ?? []);
        $claim = $raw['email_verified'] ?? $raw['verified_email'] ?? null;

        return filter_var($claim, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === true;
    }

    #[OA\Get(
        path: '/api/auth/google/callback',
        summary: 'Google OAuth callback',
        description: 'Finds or creates the user from the Google profile, sets the auth cookie, and redirects back into the SPA.',
        tags: ['Auth'],
        responses: [new OA\Response(response: 302, description: 'Redirect back to the frontend, logged in')],
    )]
    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        $frontendUrl = rtrim(config('app.frontend_url'), '/');

        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Throwable $e) {
            Log::error('Google OAuth callback failed', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            return self::appRedirect($request, ['error' => 'google_auth_failed'])
                ?? redirect($frontendUrl.'/login?error=google_auth_failed');
        }

        try {
            $user = User::where('google_id', $googleUser->getId())->first();

            if (! $user) {
                $existingByEmail = User::where('email', $googleUser->getEmail())->first();

                if ($existingByEmail) {
                    // An account already exists for this email, created with a
                    // password. Link Google to it and sign them in, PROVIDED
                    // Google says it verified the address.
                    //
                    // That proviso is the whole security argument. Someone who
                    // controls the mailbox can already take the account over
                    // through "forgot password", so linking on a verified email
                    // opens no door that was not open already. On an
                    // unverified one it would, which is why that case still
                    // falls through to the old prove-it-with-your-password
                    // flow rather than being waved through.
                    if (! self::googleVerifiedEmail($googleUser)) {
                        self::stashPendingOAuthLink('google', $existingByEmail->email, $googleUser->getId());

                        return redirect($frontendUrl.'/login?oauthConflict=google&email='.urlencode($existingByEmail->email));
                    }

                    // Linked. From here it is an ordinary returning user, so
                    // the branch below fills in the name and timezone exactly
                    // as it would on any later sign-in.
                    $user = $existingByEmail;
                    $user->forceFill([
                        'google_id' => $googleUser->getId(),
                        // Signing in through a provider that verified the
                        // address also settles an account that never confirmed
                        // its own email.
                        'email_verified_at' => $user->email_verified_at ?? now(),
                    ])->save();
                }
            }

            if (! $user) {
                $user = User::create([
                    'full_name' => self::resolveFullName($googleUser),
                    'email' => $googleUser->getEmail(),
                    'password' => Str::random(40),
                ]);

                $user->forceFill([
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                ])->save();

                // Set before the welcome email and before any game state is
                // touched, so this account's very first day boundary is already
                // computed in the learner's own timezone.
                self::applyTimezone($user, $request);

                // Google effectively always sends a name, but fall back anyway
                // rather than let a nameless account through.
                if (trim((string) $user->full_name) === '') {
                    self::assignGeneratedName($user);
                }

                $user->notify(new WelcomeNotification);
            } else {
                // Returning user: backfill the name if we never captured one
                // (e.g. the account predates name capture, or was created by a
                // provider that withheld it at the time).
                self::backfillFullName($user, $googleUser);

                if (! $user->timezone) {
                    self::applyTimezone($user, $request);
                }
            }
        } catch (\Throwable $e) {
            // A rare unique-constraint race (e.g. two callbacks for a
            // brand-new email landing at the same instant) would otherwise
            // bubble up as a raw 500 instead of a graceful redirect.
            Log::error('Google OAuth account resolution failed', ['exception' => $e->getMessage()]);

            return self::appRedirect($request, ['error' => 'google_auth_failed'])
                ?? redirect($frontendUrl.'/login?error=google_auth_failed');
        }

        $expiryMinutes = config('auth_cookie.expire_minutes');
        $token = $user->createToken('auth_token', ['*'], now()->addMinutes($expiryMinutes))->plainTextToken;

        $cookie = Cookie::make(
            name: config('auth_cookie.name'),
            value: $token,
            minutes: $expiryMinutes,
            path: '/',
            domain: null,
            secure: config('auth_cookie.secure'),
            httpOnly: true,
            raw: false,
            sameSite: config('auth_cookie.same_site'),
        );

        // A native app cannot read the cookie, so it gets the token in the deep
        // link instead. Returns null for the SPA, which falls through below.
        if ($appRedirect = self::appRedirect($request, ['token' => $token])) {
            return $appRedirect;
        }

        // /dashboard is behind ProtectedRoute, which redirects to whichever
        // onboarding step (if any) is still incomplete — correct landing
        // spot for both brand-new and returning Google users.
        return redirect($frontendUrl.'/dashboard')->withCookie($cookie);
    }

    #[OA\Get(
        path: '/api/auth/apple/redirect',
        summary: 'Start Sign In with Apple',
        description: 'Redirects the browser to Apple\'s consent screen.',
        tags: ['Auth'],
        responses: [new OA\Response(response: 302, description: 'Redirect to Apple')],
    )]
    public function redirectToApple(Request $request): RedirectResponse
    {
        return self::withMobileRedirectCookie(
            self::withTimezoneCookie(
                Socialite::driver('apple')->stateless()->redirect(),
                $request,
            ),
            $request,
        );
    }

    #[OA\Post(
        path: '/api/auth/apple/callback',
        summary: 'Sign In with Apple callback',
        description: 'Apple posts back here (form_post response mode, not a GET redirect like Google). Finds or creates the user from the Apple profile, sets the auth cookie, and redirects back into the SPA.',
        tags: ['Auth'],
        responses: [new OA\Response(response: 302, description: 'Redirect back to the frontend, logged in')],
    )]
    public function handleAppleCallback(Request $request): RedirectResponse
    {
        $frontendUrl = rtrim(config('app.frontend_url'), '/');

        try {
            $appleUser = Socialite::driver('apple')->stateless()->user();
        } catch (\Throwable $e) {
            Log::error('Apple OAuth callback failed', ['exception' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);

            return self::appRedirect($request, ['error' => 'apple_auth_failed'])
                ?? redirect($frontendUrl.'/login?error=apple_auth_failed');
        }

        try {
            $user = User::where('apple_id', $appleUser->getId())->first();

            if (! $user) {
                $existingByEmail = User::where('email', $appleUser->getEmail())->first();

                if ($existingByEmail) {
                    // See handleGoogleCallback() for why we don't auto-link here.
                    self::stashPendingOAuthLink('apple', $existingByEmail->email, $appleUser->getId());

                    return redirect($frontendUrl.'/login?oauthConflict=apple&email='.urlencode($existingByEmail->email));
                }

                // Apple only sends the user's name on the very first authorization
                // ever (never again after that), and only in the POST body of
                // this callback — never in the id_token. resolveFullName()
                // therefore also reads it straight off the request as a
                // fallback, and derives a name from the email address when
                // Apple withheld it entirely.
                $user = User::create([
                    'full_name' => self::resolveFullName($appleUser),
                    'email' => $appleUser->getEmail(),
                    'password' => Str::random(40),
                ]);

                $user->forceFill([
                    'apple_id' => $appleUser->getId(),
                    'email_verified_at' => now(),
                ])->save();

                self::applyTimezone($user, $request);

                // The usual Apple case: no name was sent, so hand out the next
                // LanguifyChampN. Assigned before the welcome email so the
                // greeting uses it instead of "there".
                if (trim((string) $user->full_name) === '') {
                    self::assignGeneratedName($user);
                }

                $user->notify(new WelcomeNotification);
            } else {
                self::backfillFullName($user, $appleUser);

                if (! $user->timezone) {
                    self::applyTimezone($user, $request);
                }
            }
        } catch (\Throwable $e) {
            Log::error('Apple OAuth account resolution failed', ['exception' => $e->getMessage()]);

            return self::appRedirect($request, ['error' => 'apple_auth_failed'])
                ?? redirect($frontendUrl.'/login?error=apple_auth_failed');
        }

        $expiryMinutes = config('auth_cookie.expire_minutes');
        $token = $user->createToken('auth_token', ['*'], now()->addMinutes($expiryMinutes))->plainTextToken;

        $cookie = Cookie::make(
            name: config('auth_cookie.name'),
            value: $token,
            minutes: $expiryMinutes,
            path: '/',
            domain: null,
            secure: config('auth_cookie.secure'),
            httpOnly: true,
            raw: false,
            sameSite: config('auth_cookie.same_site'),
        );

        // A native app cannot read the cookie, so it gets the token in the deep
        // link instead. Returns null for the SPA, which falls through below.
        if ($appRedirect = self::appRedirect($request, ['token' => $token])) {
            return $appRedirect;
        }

        return redirect($frontendUrl.'/dashboard')->withCookie($cookie);
    }

    /** Carries the browser's timezone across the OAuth round trip. */
    private const TIMEZONE_COOKIE = 'oauth_timezone';

    /** Carries the native app's redirect target across the OAuth round trip. */
    private const MOBILE_REDIRECT_COOKIE = 'oauth_mobile_redirect';

    /**
     * Stashes the native app's own redirect URI, so the callback can hand the
     * token back to the app instead of to the web SPA.
     *
     * The app cannot read the httpOnly cookie the SPA uses, so a deep link
     * carrying the token is what gets it across. Same cookie mechanics as the
     * timezone above, including SameSite=None for Apple's cross-site form POST.
     */
    private static function withMobileRedirectCookie(RedirectResponse $response, Request $request): RedirectResponse
    {
        $redirect = (string) $request->query('appRedirect', '');

        if (! self::isAllowedAppRedirect($redirect)) {
            return $response;
        }

        return $response->withCookie(Cookie::make(
            name: self::MOBILE_REDIRECT_COOKIE,
            value: $redirect,
            minutes: 15,
            path: '/',
            domain: null,
            secure: true,
            httpOnly: true,
            raw: false,
            sameSite: 'none',
        ));
    }

    /**
     * Whether a redirect target is one of ours.
     *
     * This value arrives from the client, so it is untrusted: redirecting
     * anywhere it asks would hand a valid session token to whoever crafted the
     * URL. Only the schemes in config/mobile_oauth.php are ever honoured.
     */
    private static function isAllowedAppRedirect(string $url): bool
    {
        if ($url === '') {
            return false;
        }

        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));

        return $scheme !== '' && in_array($scheme, config('mobile_oauth.allowed_schemes', []), true);
    }

    /**
     * The deep link back into the native app, or null when this round trip did
     * not start there (i.e. it was the web SPA, which uses the cookie instead).
     *
     * `$params` carries either the token or an error, so a failed sign-in
     * returns to the app rather than dead-ending on a web page.
     */
    private static function appRedirect(Request $request, array $params): ?RedirectResponse
    {
        $target = (string) $request->cookie(self::MOBILE_REDIRECT_COOKIE, '');

        if (! self::isAllowedAppRedirect($target)) {
            return null;
        }

        $separator = str_contains($target, '?') ? '&' : '?';

        return redirect($target.$separator.http_build_query($params))
            ->withCookie(Cookie::forget(self::MOBILE_REDIRECT_COOKIE, '/', null));
    }

    /**
     * Attaches the browser-reported timezone to the redirect heading off to the
     * provider, so the callback can read it back.
     *
     * Neither Google nor Apple returns a timezone in the OAuth profile, and the
     * callback is a fresh request with no session (both drivers run stateless),
     * so a short-lived cookie is what bridges the two.
     *
     * SameSite=None is required, not optional: Apple replies with a cross-site
     * form POST to the callback, and a Lax cookie is not sent on those. Google's
     * callback is a top-level GET, which Lax would have allowed, but both
     * providers share this one path.
     */
    private static function withTimezoneCookie(RedirectResponse $response, Request $request): RedirectResponse
    {
        $timezone = (string) $request->query('timezone', '');

        // Validate before storing: this value ends up driving every day-boundary
        // decision for the account, and an unknown identifier would throw deep
        // inside Carbon later rather than here.
        if ($timezone === '' || ! in_array($timezone, timezone_identifiers_list(), true)) {
            return $response;
        }

        return $response->withCookie(Cookie::make(
            name: self::TIMEZONE_COOKIE,
            value: $timezone,
            minutes: 15,
            path: '/',
            domain: null,
            secure: true,
            httpOnly: true,
            raw: false,
            sameSite: 'none',
        ));
    }

    /**
     * Applies the timezone stashed before the redirect, and clears the cookie.
     *
     * Only fills a blank: a returning learner who has since travelled gets their
     * timezone refreshed by the SPA on the next load (see AuthContext), which is
     * the same path a password login uses. Silently does nothing when the cookie
     * is missing, which is the normal outcome if a browser blocks third-party
     * cookies outright.
     */
    private static function applyTimezone(User $user, Request $request): void
    {
        $timezone = (string) $request->cookie(self::TIMEZONE_COOKIE, '');

        if ($timezone === '' || ! in_array($timezone, timezone_identifiers_list(), true)) {
            return;
        }

        if ($user->timezone !== $timezone) {
            $user->forceFill(['timezone' => $timezone])->save();
        }
    }

    /**
     * Prefix for the generated display name given to accounts whose provider
     * withheld a real one. Apple does this to everyone after their first-ever
     * authorization, so it is the common case, not an edge case.
     */
    private const GENERATED_NAME_PREFIX = 'LanguifyChamp';

    /**
     * The best display name we can get for a social account, in order of trust:
     *
     *   1. The provider's own name field (Google always sends it; Apple only on
     *      the very first authorization, and only in this request's POST body).
     *   2. The raw first/last name payload, in case the provider mapped it but
     *      left the composed name empty.
     *
     * Returns null when neither is available, and the caller falls back to a
     * generated LanguifyChampN name.
     *
     * Note there is deliberately no "guess it from the email address" step. It
     * produces gibberish for an Apple private relay address, and for a real one
     * it would put part of the learner's email address on the public
     * leaderboard for strangers to read.
     */
    private static function resolveFullName(\Laravel\Socialite\Contracts\User $socialUser): ?string
    {
        $name = trim((string) $socialUser->getName());

        if ($name !== '') {
            return Str::limit($name, 255, '');
        }

        $raw = $socialUser->getRaw();
        $rawName = $raw['name'] ?? null;

        if (is_array($rawName)) {
            $composed = trim(($rawName['firstName'] ?? '').' '.($rawName['lastName'] ?? ''));

            if ($composed !== '') {
                return Str::limit($composed, 255, '');
            }
        }

        return null;
    }

    /**
     * The next display name in the LanguifyChampN series: the first learner to
     * need one gets LanguifyChamp1, the next LanguifyChamp2, and so on.
     *
     * The number is derived from the highest one already handed out rather than
     * from a counter column, so it stays correct even if rows are deleted, and
     * it needs no extra table. The whole read-then-write runs inside a named
     * lock (the cache store is the database, so the lock is shared across every
     * PHP process) because two Apple sign-ins landing at the same instant would
     * otherwise both read the same maximum and both claim the same number.
     *
     * If the lock cannot be acquired in time we fall back to the user's own id,
     * which is unique by construction. A slightly out-of-sequence name is a far
     * better outcome than a failed sign-in.
     */
    public static function assignGeneratedName(User $user): string
    {
        $assign = function () use ($user): string {
            $prefix = self::GENERATED_NAME_PREFIX;
            $offset = strlen($prefix) + 1;

            $highest = (int) User::query()
                ->where('full_name', 'REGEXP', '^'.$prefix.'[0-9]+$')
                ->selectRaw("MAX(CAST(SUBSTRING(full_name, {$offset}) AS UNSIGNED)) as highest")
                ->value('highest');

            $name = $prefix.($highest + 1);
            $user->forceFill(['full_name' => $name])->save();

            return $name;
        };

        try {
            return Cache::lock('social-generated-name', 10)->block(5, $assign);
        } catch (LockTimeoutException $e) {
            Log::warning('Timed out waiting for the generated-name lock; falling back to the user id', [
                'user_id' => $user->id,
                'exception' => $e->getMessage(),
            ]);

            $name = self::GENERATED_NAME_PREFIX.$user->id;
            $user->forceFill(['full_name' => $name])->save();

            return $name;
        }
    }

    /**
     * Best-effort human name from an email local part: "mark.hasan+dev@x.com"
     * becomes "Mark Hasan". Deliberately conservative — anything that looks
     * machine generated (a relay address, a mostly-numeric handle, a random
     * token) returns null, because a wrong name shown on the leaderboard and in
     * email is worse than no name at all.
     */
    /**
     * Fills in a missing name on a returning social login: the provider's real
     * name if it is finally available, otherwise the next LanguifyChampN.
     *
     * Only ever writes when the stored name is empty, so a name the learner has
     * since edited on their profile is never overwritten.
     */
    private static function backfillFullName(User $user, \Laravel\Socialite\Contracts\User $socialUser): void
    {
        if (trim((string) $user->full_name) !== '') {
            return;
        }

        $name = self::resolveFullName($socialUser);

        if ($name !== null && $name !== '') {
            $user->forceFill(['full_name' => $name])->save();

            return;
        }

        self::assignGeneratedName($user);
    }

    private static function pendingLinkCacheKey(string $provider, string $email): string
    {
        return 'oauth_link:'.$provider.':'.strtolower(trim($email));
    }

    private static function stashPendingOAuthLink(string $provider, string $email, string $providerId): void
    {
        Cache::put(self::pendingLinkCacheKey($provider, $email), $providerId, now()->addMinutes(10));
    }

    /**
     * The same stash, for the native-SDK sign-in path.
     *
     * Exposed rather than reimplemented in NativeSocialAuthController: the
     * cache key and the TTL have to match exactly, or a link stashed by one
     * flow is invisible to the login that is supposed to apply it.
     */
    public static function stashPendingLink(string $provider, string $email, string $providerId): void
    {
        self::stashPendingOAuthLink($provider, $email, $providerId);
    }

    /**
     * Applies any pending Google/Apple link for this now-password-verified
     * user. Called from AuthController::login() — proving the password is
     * what makes it safe to attach the provider id stashed above.
     */
    public static function applyPendingOAuthLinks(User $user): void
    {
        foreach (['google' => 'google_id', 'apple' => 'apple_id'] as $provider => $column) {
            $key = self::pendingLinkCacheKey($provider, $user->email);
            $providerId = Cache::get($key);

            if ($providerId && ! $user->{$column}) {
                $user->forceFill([$column => $providerId])->save();
            }

            Cache::forget($key);
        }
    }
}
