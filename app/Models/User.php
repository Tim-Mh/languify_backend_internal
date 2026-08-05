<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\PlanKey;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['full_name', 'email', 'password', 'role', 'is_tester', 'timezone'])]
#[Hidden(['password', 'remember_token', 'otp_code', 'otp_expires_at', 'password_reset_code', 'password_reset_expires_at'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function nativeLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'native_language_id');
    }

    public function learningLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'learning_language_id');
    }

    public function gameState(): HasOne
    {
        return $this->hasOne(UserGameState::class);
    }

    public function avatar(): HasOne
    {
        return $this->hasOne(UserAvatar::class);
    }

    public function activeSubscription(): HasOne
    {
        // Manual-renewal model: a plan grants access only until its
        // current_period_end. Past that it's expired and this returns null, so
        // perks, app access, AND family inheritance all drop to free the moment
        // a plan lapses — no cron required, it's evaluated live per request.
        // (A background sweep also flips the stored status to 'expired' for
        // clean data/UI; see SubscriptionsExpire. The null guard keeps any
        // legacy row without a period end treated as non-expiring.)
        return $this->hasOne(UserSubscription::class)->ofMany([], function ($query) {
            $query->whereIn('status', ['active', 'trialing'])
                ->where(function ($q) {
                    $q->whereNull('current_period_end')
                        ->orWhere('current_period_end', '>', now());
                });
        });
    }

    /**
     * The family group this user OWNS (i.e. they're the paying subscriber
     * who invited others), if any.
     */
    public function familyGroupOwned(): HasOne
    {
        return $this->hasOne(FamilyGroup::class, 'owner_id');
    }

    /**
     * The membership row for the family group this user BELONGS TO as an
     * invited member (not the owner), if any.
     */
    public function familyMembership(): HasOne
    {
        return $this->hasOne(FamilyMember::class);
    }

    /**
     * This user's own active subscription always wins. Failing that, a
     * Family plan member inherits 'family' as long as the group owner's OWN
     * subscription is still active — members never get a user_subscriptions
     * row of their own, so their access is entirely derived, live, from the
     * owner's status (see FamilyService). The single source of truth for
     * both gameplay perks (LessonProgressService) and app-access gating
     * (RequireActiveSubscription middleware).
     */
    public function effectivePlanKey(): ?string
    {
        $ownPlan = $this->activeSubscription?->plan_key;

        if ($ownPlan) {
            return $ownPlan;
        }

        $membership = $this->familyMembership;

        if ($membership && $membership->familyGroup->owner->activeSubscription?->plan_key === PlanKey::Family->value) {
            return PlanKey::Family->value;
        }

        return null;
    }

    public function hasActiveAppAccess(): bool
    {
        return $this->effectivePlanKey() !== null;
    }

    /**
     * Tester accounts get every chapter, lesson, exercise, and trivia topic
     * unlocked regardless of progress, so the full app can be walked through on
     * the live site. Everyone else follows normal step-by-step progression.
     *
     * True if EITHER the per-user admin toggle (is_tester) is on, OR the email
     * is in the config allowlist (config/app.php `tester_emails`, case
     * insensitive) — so admins can grant it ad hoc without a deploy, and the
     * seeded allowlist keeps working.
     */
    public function isTester(): bool
    {
        if ($this->is_tester) {
            return true;
        }

        $testers = array_map('strtolower', (array) config('app.tester_emails', []));

        return in_array(strtolower((string) $this->email), $testers, true);
    }

    public function lessonCompletions(): HasMany
    {
        return $this->hasMany(UserLessonCompletion::class);
    }

    public function unitCompletions(): HasMany
    {
        return $this->hasMany(UserUnitCompletion::class);
    }

    public function badges(): HasMany
    {
        return $this->hasMany(UserBadge::class);
    }

    public function chestClaims(): HasMany
    {
        return $this->hasMany(ChestClaim::class);
    }

    public function completedLanguages(): HasMany
    {
        return $this->hasMany(UserCompletedLanguage::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(UserCourse::class);
    }

    public function triviaAttempts(): HasMany
    {
        return $this->hasMany(TriviaAttempt::class);
    }

    public function deviceTokens(): HasMany
    {
        return $this->hasMany(DeviceToken::class);
    }

    public function notificationPreference(): HasOne
    {
        return $this->hasOne(NotificationPreference::class);
    }

    /**
     * Where the 'expo' notification channel sends. Laravel finds this by name
     * (routeNotificationFor + the studly channel name), the same way
     * routeNotificationForMail resolves to the email address.
     *
     * Returns every device the learner has, so a notification reaches their
     * phone and their tablet both. An empty array is the normal case for anyone
     * who only uses the web app.
     *
     * Keyed by token with the provider as the value, because the channel sends
     * Expo-wrapped tokens and raw FCM ones through different services and has
     * to tell them apart.
     *
     * @return array<string, string>
     */
    public function routeNotificationForExpo(): array
    {
        return $this->deviceTokens()->pluck('provider', 'token')->all();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'otp_expires_at' => 'datetime',
            'password_reset_expires_at' => 'datetime',
            'password' => 'hashed',
            'is_tester' => 'boolean',
        ];
    }
}
