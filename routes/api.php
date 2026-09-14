<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AppleIapController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AvatarController;
use App\Http\Controllers\Api\BadgeController;
use App\Http\Controllers\Api\ChestController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CourseEnrollmentController;
use App\Http\Controllers\Api\DeviceTokenController;
use App\Http\Controllers\Api\FamilyController;
use App\Http\Controllers\Api\GameStateController;
use App\Http\Controllers\Api\LeagueController;
use App\Http\Controllers\Api\LessonProgressController;
use App\Http\Controllers\Api\NotificationPreferenceController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PracticeController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\QuestController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\SpeechController;
use App\Http\Controllers\Api\NativeSocialAuthController;
use App\Http\Controllers\Api\SocialAuthController;
use App\Http\Controllers\Api\StripeWebhookController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\TriviaController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:6,1');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:6,1');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->middleware('throttle:6,1');
    Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->middleware('throttle:6,1');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('throttle:6,1');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('throttle:6,1');

    Route::get('/google/redirect', [SocialAuthController::class, 'redirectToGoogle'])->middleware('throttle:6,1');
    Route::get('/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->middleware('throttle:6,1');

    Route::get('/apple/redirect', [SocialAuthController::class, 'redirectToApple'])->middleware('throttle:6,1');
    Route::post('/apple/callback', [SocialAuthController::class, 'handleAppleCallback'])->middleware('throttle:6,1');

    // The mobile app's native Google/Apple SDKs post the identity token they
    // were handed and get a Sanctum token back, instead of running the browser
    // redirect above. Same rate limit: it is the same thing being guessed at.
    Route::post('/{provider}/native', [NativeSocialAuthController::class, 'store'])
        ->whereIn('provider', ['google', 'apple'])
        ->middleware('throttle:6,1');

    Route::middleware(['auth.cookie', 'auth:sanctum'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
    });
});

// Stripe calls this directly (no user session) — must stay outside the auth group,
// and must receive the raw request body for signature verification.
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle']);

// App Store Server Notifications — Apple calls this directly (no user
// session), so it stays outside the auth group like the Stripe one. The
// payload authenticates itself: it is a JWS verified against Apple's roots.
Route::post('/apple/webhook', [AppleIapController::class, 'webhook']);

// Pronunciation audio. Public because the phone's audio player and the web's
// <audio> element both fetch it directly and neither carries the session
// cookie cleanly across subdomains; what it returns is catalogue content spoken
// aloud, never user data.
Route::get('/speech', [SpeechController::class, 'show']);

// Public content pages (Terms, Privacy, Contact) — visible to logged-out visitors too.
Route::get('/pages/{slug}', [PageController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:6,1');

// The accept-invite page shows who invited you before you've logged in, so this
// one family lookup stays public — everything else (accepting, managing) needs auth.
Route::get('/family/invite/{token}', [FamilyController::class, 'inviteDetails']);

Route::middleware(['auth.cookie', 'auth:sanctum'])->group(function () {
    // /profile/timezone is rate-limited (not just for abuse generally, but
    // specifically because userToday() recomputes "today" straight from this
    // value — an unthrottled endpoint lets a client jump into a new "day" on
    // demand and farm streak/quest/daily-counter resets in seconds. 5/day
    // comfortably covers real travel and still closes that off.
    Route::patch('/profile/timezone', [ProfileController::class, 'updateTimezone'])->middleware('throttle:5,1440');
    Route::get('/shop/catalog', [ShopController::class, 'catalog']);
    Route::post('/shop/subscription/checkout', [ShopController::class, 'checkoutSubscription']);
    Route::get('/subscription/verify', [ShopController::class, 'verifySubscriptionCheckout']);
    Route::get('/subscription/status', [SubscriptionController::class, 'status']);
    // Each of these reaches out to Stripe, so cap the rate: a learner has no
    // legitimate reason to flip auto-renew dozens of times a minute.
    Route::post('/subscription/auto-renew', [SubscriptionController::class, 'autoRenew'])->middleware('throttle:10,1');
    // No resume route: cancelling is one-way by design. Auto-renew can be
    // toggled freely up until the learner actually cancels.
    Route::post('/subscription/cancel', [SubscriptionController::class, 'cancel'])->middleware('throttle:10,1');
    Route::get('/family', [FamilyController::class, 'show']);
    Route::post('/family/invite/{token}/accept', [FamilyController::class, 'acceptInvite']);
    Route::post('/family/invite/{token}/decline', [FamilyController::class, 'declineInvite']);

    // Free tier: all learning content — chapters, lessons, leaderboard,
    // trivia, quests, avatar, chests, etc. — is reachable by any authenticated
    // user, subscribed or not. Premium value is delivered as in-app perks
    // (no ads, 100-heart cap vs the base 5, +50% gem bonus, monthly streak
    // freezes), enforced in the service layer off subscription status — NOT by
    // blocking these routes. (The `subscription.active` middleware still
    // exists for any future premium-only endpoint.)
    Route::get('/languages', [CourseController::class, 'languages']);
    Route::post('/course/select', [CourseController::class, 'selectCourse']);
    Route::post('/course/proficiency', [CourseController::class, 'selectProficiency']);
    Route::post('/course/streak-goal', [CourseController::class, 'selectStreakGoal']);
    Route::get('/course/chapters', [CourseController::class, 'chapters']);
    Route::get('/course/alphabet', [CourseController::class, 'alphabet']);
    Route::get('/chapters/{chapter}/units', [CourseController::class, 'units']);
    Route::get('/units/{unit}/lessons', [CourseController::class, 'lessons']);
    Route::get('/lessons/{lesson}/exercises', [CourseController::class, 'exercises']);
    Route::post('/lessons/{lesson}/complete', [LessonProgressController::class, 'complete']);

    // Adaptive practice: record per-answer word performance, and serve a
    // "practice your weak words" session built from a lesson's exercises.
    Route::post('/exercises/{exercise}/attempt', [PracticeController::class, 'recordAttempt']);
    Route::get('/practice/lessons/{lesson}', [PracticeController::class, 'lesson']);

    Route::get('/game-state', [GameStateController::class, 'show']);
    Route::post('/game-state/lose-heart', [GameStateController::class, 'loseHeart']);
    Route::get('/game-state/activity', [GameStateController::class, 'activity']);

    Route::get('/chests/status', [ChestController::class, 'status']);
    Route::post('/chests/daily/claim', [ChestController::class, 'claimDaily']);
    // Only the daily chest is offered. The streak and unit-bonus chest claim
    // endpoints are intentionally disabled (routes removed) so they can't be
    // claimed, including via direct API calls.

    Route::get('/avatar', [AvatarController::class, 'show']);
    Route::get('/avatar/options', [AvatarController::class, 'options']);
    Route::post('/avatar/unlock', [AvatarController::class, 'unlock']);
    Route::put('/avatar', [AvatarController::class, 'update']);

    // Push notification devices. The app re-registers on every launch, so the
    // throttle is generous enough for a learner reopening the app repeatedly
    // and still closes off writing junk rows in bulk.
    Route::post('/device-tokens', [DeviceTokenController::class, 'store'])->middleware('throttle:20,1');
    Route::post('/device-tokens/revoke', [DeviceTokenController::class, 'revoke'])->middleware('throttle:20,1');

    Route::get('/notification-preferences', [NotificationPreferenceController::class, 'show']);
    Route::patch('/notification-preferences', [NotificationPreferenceController::class, 'update']);

    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
    Route::get('/profile/completed-languages', [ProfileController::class, 'completedLanguages']);

    Route::get('/courses/mine', [CourseEnrollmentController::class, 'mine']);
    Route::post('/courses/switch', [CourseEnrollmentController::class, 'switchCourse']);
    // Removes the enrolment only; lesson progress for that language pair is
    // kept so re-adding the course resumes instead of restarting.
    Route::delete('/courses/{course}', [CourseEnrollmentController::class, 'destroy']);

    Route::get('/quests/today', [QuestController::class, 'today']);
    Route::post('/quests/{userDailyQuest}/claim', [QuestController::class, 'claim']);

    Route::get('/trivia/topics', [TriviaController::class, 'topics']);
    Route::get('/trivia/topics/{topicKey}/questions', [TriviaController::class, 'questions']);
    Route::post('/trivia/topics/{topicKey}/questions/{question}/check', [TriviaController::class, 'check']);
    // Throttled: this is the reward-granting endpoint (gems/XP + the
    // perfect-score infinite-hearts buff), so cap how fast it can be
    // replayed even by a legitimate client.
    Route::post('/trivia/topics/{topicKey}/submit', [TriviaController::class, 'submit'])->middleware('throttle:20,1');

    Route::get('/league', [LeagueController::class, 'show']);

    Route::get('/ads', [AdController::class, 'index']);

    Route::post('/badges/{badgeKey}/claim', [BadgeController::class, 'claim']);

    // Apple In-App Purchase: the iOS app posts the signed transaction after
    // a StoreKit purchase (or a restore) and the server credits it.
    Route::post('/shop/apple/verify', [AppleIapController::class, 'verify'])->middleware('throttle:30,1');

    Route::post('/shop/gems/checkout', [ShopController::class, 'checkoutGems']);
    Route::get('/shop/gems/verify', [ShopController::class, 'verifyGemsCheckout']);
    Route::post('/shop/hearts/refill', [ShopController::class, 'refillHearts']);

    // Throttled: sends an email to an arbitrary address, so cap the rate
    // to prevent invite→revoke→re-invite email spamming.
    Route::post('/family/invite', [FamilyController::class, 'invite'])->middleware('throttle:10,1');
    Route::delete('/family/invites/{invite}', [FamilyController::class, 'revokeInvite']);
    Route::delete('/family/members/{member}', [FamilyController::class, 'removeMember']);
    Route::post('/family/leave', [FamilyController::class, 'leave']);
});
