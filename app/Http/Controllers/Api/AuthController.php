<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\User;
use App\Notifications\OtpNotification;
use App\Notifications\PasswordChangedNotification;
use App\Notifications\PasswordResetNotification;
use App\Notifications\WelcomeNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{
    #[OA\Post(
        path: '/api/auth/register',
        summary: 'Register a new account',
        description: 'Creates the user (unverified) and emails a 6-digit OTP. No auth cookie is set until /auth/verify-otp succeeds.',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['email', 'password'],
            properties: [
                new OA\Property(property: 'fullName', type: 'string', nullable: true, example: 'Mark Test'),
                new OA\Property(property: 'email', type: 'string', format: 'email', example: 'mark@example.com'),
                new OA\Property(property: 'password', type: 'string', format: 'password', minLength: 6, example: 'secret123'),
                new OA\Property(property: 'timezone', type: 'string', nullable: true, description: 'IANA timezone, e.g. Asia/Karachi. Drives streak/daily-reset day boundaries.', example: 'Asia/Karachi'),
            ],
        )),
        responses: [
            new OA\Response(response: 201, description: 'Account created, OTP emailed'),
            new OA\Response(response: 422, description: 'Validation error (e.g. email already taken)'),
        ],
    )]
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'fullName' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'timezone' => ['nullable', 'string', 'timezone'],
        ]);

        $user = User::create([
            'full_name' => $data['fullName'] ?? null,
            'email' => $data['email'],
            'password' => $data['password'],
            'timezone' => $data['timezone'] ?? null,
        ]);

        $this->sendOtp($user);

        return response()->json([
            'message' => 'Account created. Please check your email for a verification code.',
            'email' => $user->email,
        ], 201);
    }

    #[OA\Post(
        path: '/api/auth/verify-otp',
        summary: 'Verify the registration OTP',
        description: 'On success, marks the account verified and sets the auth cookie, same as /auth/login.',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['email', 'otp'],
            properties: [
                new OA\Property(property: 'email', type: 'string', format: 'email', example: 'mark@example.com'),
                new OA\Property(property: 'otp', type: 'string', example: '482913'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Email verified, logged in'),
            new OA\Response(response: 422, description: 'Invalid or expired code'),
        ],
    )]
    public function verifyOtp(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email'],
            'otp' => ['required', 'string'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! $this->otpIsValid($user->otp_code, $user->otp_expires_at, $data['otp'])) {
            return response()->json(['message' => 'Invalid or expired verification code.'], 422);
        }

        $user->forceFill([
            'email_verified_at' => now(),
            'otp_code' => null,
            'otp_expires_at' => null,
        ])->save();

        $user->notify(new WelcomeNotification);

        SocialAuthController::applyPendingOAuthLinks($user);

        return $this->authenticatedResponse($request, $user, 'Email verified successfully.');
    }

    #[OA\Post(
        path: '/api/auth/resend-otp',
        summary: 'Resend the registration OTP',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['email'],
            properties: [new OA\Property(property: 'email', type: 'string', format: 'email', example: 'mark@example.com')],
        )),
        responses: [
            new OA\Response(response: 200, description: 'A new code was emailed'),
            new OA\Response(response: 422, description: 'Unknown email or already verified'),
        ],
    )]
    public function resendOtp(Request $request): JsonResponse
    {
        $data = $request->validate(['email' => ['required', 'string', 'email']]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || $user->email_verified_at !== null) {
            return response()->json(['message' => 'Invalid request.'], 422);
        }

        $this->sendOtp($user);

        return response()->json(['message' => 'A new verification code has been sent.']);
    }

    #[OA\Post(
        path: '/api/auth/login',
        summary: 'Log in with email and password',
        description: 'Sets an httpOnly session cookie carrying a Sanctum token on success.',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['email', 'password'],
            properties: [
                new OA\Property(property: 'email', type: 'string', format: 'email', example: 'mark@example.com'),
                new OA\Property(property: 'password', type: 'string', format: 'password', example: 'secret123'),
                new OA\Property(property: 'timezone', type: 'string', nullable: true, description: 'IANA timezone, e.g. Asia/Karachi. Refreshed on every login in case the user has traveled.', example: 'Asia/Karachi'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Login successful'),
            new OA\Response(response: 401, description: 'Invalid email or password'),
        ],
    )]
    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'timezone' => ['nullable', 'string', 'timezone'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        if ($user->email_verified_at === null) {
            // Their original OTP may well have expired by now — send a fresh
            // one so they're not stuck, rather than making them ask for it.
            $this->sendOtp($user);

            return response()->json([
                'message' => 'Please verify your email first. A new code has been sent.',
                'requiresVerification' => true,
                'email' => $user->email,
            ], 403);
        }

        if (! empty($data['timezone']) && $data['timezone'] !== $user->timezone) {
            $user->forceFill(['timezone' => $data['timezone']])->save();
        }

        // Proving the password is what makes it safe to attach any Google/Apple
        // account that was stashed pending this exact confirmation — see
        // SocialAuthController::handleGoogleCallback()/handleAppleCallback().
        SocialAuthController::applyPendingOAuthLinks($user);

        return $this->authenticatedResponse($request, $user, 'Login successful');
    }

    #[OA\Post(
        path: '/api/auth/forgot-password',
        summary: 'Request a password reset OTP',
        description: 'Always returns a generic success message, whether or not the email exists, to avoid leaking which emails are registered.',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['email'],
            properties: [new OA\Property(property: 'email', type: 'string', format: 'email', example: 'mark@example.com')],
        )),
        responses: [new OA\Response(response: 200, description: 'If the email exists, a reset code was sent')],
    )]
    public function forgotPassword(Request $request): JsonResponse
    {
        $data = $request->validate(['email' => ['required', 'string', 'email']]);

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $otp = $this->generateOtp();
            $user->forceFill([
                'password_reset_code' => $otp,
                'password_reset_expires_at' => now()->addMinutes(10),
            ])->save();
            $user->notify(new PasswordResetNotification($otp));
        }

        return response()->json(['message' => 'If that email is registered, a reset code has been sent.']);
    }

    #[OA\Post(
        path: '/api/auth/reset-password',
        summary: 'Reset the password using the emailed OTP',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['email', 'otp', 'password'],
            properties: [
                new OA\Property(property: 'email', type: 'string', format: 'email', example: 'mark@example.com'),
                new OA\Property(property: 'otp', type: 'string', example: '482913'),
                new OA\Property(property: 'password', type: 'string', format: 'password', minLength: 6, example: 'newSecret123'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Password reset'),
            new OA\Response(response: 422, description: 'Invalid or expired code'),
        ],
    )]
    public function resetPassword(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email'],
            'otp' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! $this->otpIsValid($user->password_reset_code, $user->password_reset_expires_at, $data['otp'])) {
            return response()->json(['message' => 'Invalid or expired reset code.'], 422);
        }

        $user->forceFill([
            'password' => $data['password'],
            'password_reset_code' => null,
            'password_reset_expires_at' => null,
        ])->save();

        // A password reset is often done specifically because a session may
        // be compromised — revoke every existing token, not just the one
        // making this (unauthenticated) request, so the reset actually locks
        // out whoever else was logged in.
        $user->tokens()->delete();

        $user->notify(new PasswordChangedNotification);

        return response()->json(['message' => 'Password reset successfully. Please log in.']);
    }

    #[OA\Post(
        path: '/api/auth/logout',
        summary: 'Log out (revokes the current token and clears the cookie)',
        tags: ['Auth'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Logged out successfully')],
    )]
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()
            ->json(['message' => 'Logged out successfully'])
            ->withCookie(Cookie::forget(config('auth_cookie.name'), '/', null));
    }

    #[OA\Get(
        path: '/api/auth/me',
        summary: 'Get the currently authenticated user',
        tags: ['Auth'],
        security: [['cookieAuth' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Current user'),
            new OA\Response(response: 401, description: 'Unauthenticated'),
        ],
    )]
    public function me(Request $request): JsonResponse
    {
        return response()->json(['user' => $this->formatUser($request->user())]);
    }

    private function sendOtp(User $user): void
    {
        $otp = $this->generateOtp();

        $user->forceFill([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ])->save();

        $user->notify(new OtpNotification($otp));
    }

    private function generateOtp(): string
    {
        return (string) random_int(100000, 999999);
    }

    private function otpIsValid(?string $storedCode, ?Carbon $expiresAt, string $submittedCode): bool
    {
        return $storedCode !== null
            && $expiresAt !== null
            && $expiresAt->isFuture()
            && hash_equals($storedCode, $submittedCode);
    }

    private function authenticatedResponse(Request $request, User $user, string $message, int $status = 200): JsonResponse
    {
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

        $body = [
            'message' => $message,
            'user' => $this->formatUser($user),
        ];

        // Native apps have no usable cookie jar to read from, so they ask for the
        // token itself and store it in the device keychain. Browsers never send
        // this header, so the SPA keeps its httpOnly cookie and the token stays
        // unreadable to JavaScript there. Nothing is weakened by handing it over
        // here: it is only ever minted in exchange for valid credentials.
        if ($this->wantsToken($request)) {
            $body['token'] = $token;
        }

        return response()
            ->json($body, $status)
            ->withCookie($cookie);
    }

    private function wantsToken(Request $request): bool
    {
        return strtolower((string) $request->header('X-Client-Type')) === 'mobile';
    }

    private function formatUser(User $user): array
    {
        $user->loadMissing('nativeLanguage', 'learningLanguage');

        return [
            'id' => $user->id,
            'fullName' => $user->full_name,
            'email' => $user->email,
            'role' => $user->role,
            'emailVerified' => $user->email_verified_at !== null,
            'nativeLanguage' => $this->formatLanguage($user->nativeLanguage),
            'learningLanguage' => $this->formatLanguage($user->learningLanguage),
            'proficiencyLevel' => $user->proficiency_level,
            'streakGoalDays' => $user->streak_goal_days,
            'hasActiveAppAccess' => $user->hasActiveAppAccess(),
            'isTester' => $user->isTester(),
        ];
    }

    private function formatLanguage(?Language $language): ?array
    {
        if (! $language) {
            return null;
        }

        return [
            'id' => $language->id,
            'code' => $language->code,
            'name' => $language->name,
            'nativeName' => $language->native_name,
            'flagEmoji' => $language->flag_emoji,
        ];
    }
}
