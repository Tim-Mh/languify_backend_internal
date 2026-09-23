<?php

namespace App\Console\Commands;

use App\Models\Badge;
use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Models\UserBadge;
use App\Notifications\DailyChestReadyNotification;
use App\Notifications\DailyLessonReminderNotification;
use App\Notifications\HeartsFullNotification;
use App\Notifications\LeagueZoneNotification;
use App\Notifications\MotivationNotification;
use App\Notifications\ReEngagementNotification;
use App\Notifications\SetupIncompleteNotification;
use App\Notifications\SubscriptionRenewalReminderNotification;
use App\Notifications\UnclaimedBadgeNotification;
use App\Services\LeagueService;
use App\Services\LessonProgressService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

/**
 * Runs hourly (see routes/console.php) since "6 PM local" is a different UTC
 * instant for every user's timezone. For each user with active app access:
 * re-hydrates their game state (which, as a side effect, sends the
 * streak-broken email via LessonProgressService::breakStreakIfMissed() if
 * their streak just lapsed), then checks three more time-gated sends —
 * daily lesson reminder, weekly "keep it up" motivation, and staged
 * re-engagement (3/7/14/30 days inactive) — each guarded by its own
 * tracking column on user_game_states so nobody gets emailed twice for the
 * same thing.
 */
class SendDailyNotifications extends Command
{
    protected $signature = 'notifications:daily-sweep';

    protected $description = "Send streak/lesson-reminder/re-engagement emails, timed to each user's own local time";

    private const REMINDER_LOCAL_HOUR = 18;

    /**
     * A learner with a streak worth protecting gets the reminder later and
     * closer to the deadline instead — "your streak dies at midnight" lands
     * harder at 20:00 than at 18:00. One or the other fires, never both:
     * both share last_lesson_reminder_date.
     */
    private const STREAK_RISK_LOCAL_HOUR = 20;

    private const STREAK_RISK_MIN_STREAK = 3;

    private const MOTIVATION_LOCAL_HOUR = 9;

    private const REENGAGEMENT_LOCAL_HOUR = 10;

    private const BADGE_NUDGE_LOCAL_HOUR = 17;

    /** The unclaimed-badge nudge repeats at most this often. */
    private const BADGE_NUDGE_MIN_DAYS = 7;

    /** How long a fresh account gets to finish setup before the one nudge. */
    private const SETUP_NUDGE_AFTER_HOURS = 3;

    private const MOTIVATION_MIN_STREAK = 7;

    private const INACTIVITY_STAGES = [3, 7, 14, 30];

    /**
     * Sunday evening, after the 18:00/20:00 reminder slots so the two rarely
     * collide, and hours before Monday's rollover settles the week.
     */
    private const LEAGUE_ZONE_LOCAL_HOUR = 19;

    private const CHEST_NUDGE_LOCAL_HOUR = 12;

    /**
     * Only chest-engaged learners: a claim older than this means the habit
     * lapsed and the nudge would read as noise, not a reminder.
     */
    private const CHEST_ENGAGED_WITHIN_HOURS = 48;

    private const CHEST_COOLDOWN_HOURS = 24;

    private const RENEWAL_REMINDER_LOCAL_HOUR = 10;

    private const RENEWAL_REMINDER_DAYS_BEFORE = 3;

    /** Five hearts at fifteen minutes each. */
    private const HEARTS_FULL_AFTER_MINUTES = 75;

    public function handle(LessonProgressService $progress, LeagueService $leagues): int
    {
        $sent = [
            'reminder' => 0, 'motivation' => 0, 'reEngagement' => 0, 'setup' => 0,
            'badge' => 0, 'league' => 0, 'chest' => 0, 'hearts' => 0, 'renewal' => 0,
        ];

        // One catalog read for the whole sweep, not one per user.
        $badges = Badge::where('is_active', true)->get();
        $plans = SubscriptionPlan::get()->keyBy('key');

        // Eager-load the subscription per chunk. The renewal reminder reads it
        // for every user, and without this that is one extra query per user,
        // every hour, across the entire user base.
        //
        // The family-plan chain that used to be loaded alongside it went with
        // the access gate that needed it: nothing in this sweep resolves an
        // effective plan any more, so loading it was work for no reader.
        User::query()
            ->with('activeSubscription')
            ->chunkById(200, function ($users) use ($progress, $leagues, $badges, $plans, &$sent) {
                foreach ($users as $user) {
                    // No subscription gate here, deliberately. Everything below
                    // is a retention nudge - a streak reminder, a re-engagement
                    // message, an unclaimed badge - and the learners most likely
                    // to lapse are exactly the ones who have not paid. Gating the
                    // whole sweep on an active plan skipped every free account
                    // before a single notification was considered, which on a
                    // user base with no subscribers meant push had never fired
                    // in production at all: healthy device tokens, valid
                    // credentials, cron on time, and nine zeroes in the summary.
                    //
                    // The one subscriber-only message, the renewal reminder,
                    // gates itself further down on $user->activeSubscription, so
                    // it still cannot reach anyone without a plan.
                    try {
                        $this->processUser($user, $progress, $leagues, $badges, $plans, $sent);
                    } catch (\Throwable $e) {
                        // None of these notifications are ShouldQueue, so mail is
                        // sent synchronously right here — a single transient SMTP
                        // failure shouldn't silently abort the rest of this
                        // chunk's users for the whole hour.
                        Log::error('Daily notification sweep failed for a user', [
                            'user_id' => $user->id,
                            'exception' => $e->getMessage(),
                        ]);
                    }
                }
            });

        $this->info(sprintf(
            'Daily sweep: %d reminders, %d motivation, %d re-engagement, %d setup, %d badge, '
            .'%d league, %d chest, %d hearts, %d renewal sent.',
            $sent['reminder'],
            $sent['motivation'],
            $sent['reEngagement'],
            $sent['setup'],
            $sent['badge'],
            $sent['league'],
            $sent['chest'],
            $sent['hearts'],
            $sent['renewal'],
        ));

        return self::SUCCESS;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Collection<int, Badge>  $badges
     * @param  \Illuminate\Support\Collection<string, SubscriptionPlan>  $plans
     */
    private function processUser(User $user, LessonProgressService $progress, LeagueService $leagues, $badges, $plans, array &$sent): void
    {
        $timezone = $user->timezone ?: config('app.timezone');
        $now = Carbon::now($timezone);
        $today = $now->copy()->startOfDay();
        $todayStr = $today->format('Y-m-d');

        // Also fires StreakBrokenNotification as a side effect when
        // it detects a lapsed streak — see breakStreakIfMissed().
        $state = $progress->hydrate($user);

        // A signed-up account that never picked a language, nudged exactly
        // once, at whatever hour the threshold passes — the sooner it lands
        // the likelier they finish.
        if (
            $state->setup_nudge_sent_at === null
            && $this->setupIncomplete($user)
            && $user->created_at->diffInHours(Carbon::now()) >= self::SETUP_NUDGE_AFTER_HOURS
        ) {
            $user->notify(new SetupIncompleteNotification);
            $state->setup_nudge_sent_at = Carbon::now();
            $sent['setup']++;
        }

        // A streak worth protecting moves the reminder to the later, more
        // urgent slot; both slots share the same once-a-day tracking column.
        $reminderHour = $state->streak >= self::STREAK_RISK_MIN_STREAK
            ? self::STREAK_RISK_LOCAL_HOUR
            : self::REMINDER_LOCAL_HOUR;

        if (
            $now->hour === $reminderHour
            && $state->lessons_today === 0
            && $state->last_lesson_reminder_date?->format('Y-m-d') !== $todayStr
        ) {
            $user->notify(new DailyLessonReminderNotification($state->streak));
            $state->last_lesson_reminder_date = $today;
            $sent['reminder']++;
        }

        if (
            $now->hour === self::BADGE_NUDGE_LOCAL_HOUR
            && ($state->last_badge_nudge_date === null
                || $state->last_badge_nudge_date->diffInDays($today) >= self::BADGE_NUDGE_MIN_DAYS)
        ) {
            $claimed = UserBadge::where('user_id', $user->id)->pluck('badge_key')->flip();
            $claimable = $badges
                ->reject(fn (Badge $badge) => $claimed->has($badge->key))
                ->filter(fn (Badge $badge) => $progress->meetsBadgeRequirement($state, $badge))
                ->count();

            if ($claimable > 0) {
                $user->notify(new UnclaimedBadgeNotification($claimable));
                $state->last_badge_nudge_date = $today;
                $sent['badge']++;
            }
        }

        if (
            $now->hour === self::MOTIVATION_LOCAL_HOUR
            && $today->isMonday()
            && $state->streak >= self::MOTIVATION_MIN_STREAK
            && $state->last_motivation_notified_week?->format('Y-m-d') !== $todayStr
        ) {
            $user->notify(new MotivationNotification($state->streak));
            $state->last_motivation_notified_week = $today;
            $sent['motivation']++;
        }

        if ($now->hour === self::REENGAGEMENT_LOCAL_HOUR) {
            $lastActive = ($state->last_lesson_date ?? $user->created_at)->copy()->startOfDay();
            $daysInactive = (int) $lastActive->diffInDays($today);

            $stage = null;
            foreach (self::INACTIVITY_STAGES as $candidate) {
                if ($daysInactive >= $candidate) {
                    $stage = $candidate;
                }
            }

            if ($stage && $stage !== $state->last_inactivity_stage_notified) {
                $user->notify(new ReEngagementNotification($stage));
                $state->last_inactivity_stage_notified = $stage;
                $sent['reEngagement']++;
            }
        }

        // Ran dry mid-lesson, regen has caught up, and they have not been
        // back since (completing a lesson or buying a refill clears the
        // marker). Checked hourly rather than at a fixed hour: the moment
        // hearts are back IS the message.
        if (
            $state->hearts_depleted_at !== null
            && $state->hearts_depleted_at->diffInMinutes(Carbon::now()) >= self::HEARTS_FULL_AFTER_MINUTES
        ) {
            $user->notify(new HeartsFullNotification);
            $state->hearts_depleted_at = null;
            $sent['hearts']++;
        }

        // Sunday evening, on either edge of the league table. The projected
        // points use the same pointsDeltaForRank the leaderboard preview
        // shows, so the push never contradicts the screen it opens.
        if (
            $now->hour === self::LEAGUE_ZONE_LOCAL_HOUR
            && $today->isSunday()
            && $state->last_league_nudge_date?->format('Y-m-d') !== $todayStr
            && ($league = $leagues->currentLeagueFor($user)) !== null
        ) {
            $members = $leagues->cohortMembers($league);
            $rank = $members->search(fn ($member) => $member->user_id === $user->id);

            if ($rank !== false) {
                $projected = $league->league_points
                    + $leagues->pointsDeltaForRank($rank + 1, $members->count());

                $zone = match (true) {
                    $projected >= LeagueService::PROMOTION_THRESHOLD => 'promotion',
                    $projected < 0 => 'demotion',
                    default => null,
                };

                if ($zone !== null) {
                    $user->notify(new LeagueZoneNotification($zone));
                    $state->last_league_nudge_date = $today;
                    $sent['league']++;
                }
            }
        }

        // Daily chest back off cooldown, for learners who claimed one in the
        // last two days. The 24–48h window is self-deduplicating: one nudge
        // per claim cycle, and a lapsed habit stops the nudges by itself.
        if ($now->hour === self::CHEST_NUDGE_LOCAL_HOUR && $state->daily_chest_claimed_at !== null) {
            $hoursSinceClaim = $state->daily_chest_claimed_at->diffInHours(Carbon::now());

            if ($hoursSinceClaim >= self::CHEST_COOLDOWN_HOURS && $hoursSinceClaim < self::CHEST_ENGAGED_WITHIN_HOURS) {
                $user->notify(new DailyChestReadyNotification);
                $sent['chest']++;
            }
        }

        // A yearly plan renews in a few days. One reminder per billing
        // period, keyed on the period end it warned about.
        $subscription = $user->activeSubscription;

        if (
            $now->hour === self::RENEWAL_REMINDER_LOCAL_HOUR
            && $subscription !== null
            && $subscription->autoRenews()
            && $plans->get($subscription->plan_key)?->interval === 'year'
            && $subscription->current_period_end !== null
        ) {
            $daysUntil = (int) Carbon::now()->diffInDays($subscription->current_period_end, false);
            $periodEnd = $subscription->current_period_end->format('Y-m-d');

            if (
                $daysUntil >= 0
                && $daysUntil <= self::RENEWAL_REMINDER_DAYS_BEFORE
                && $subscription->renewal_reminder_sent_for?->format('Y-m-d') !== $periodEnd
            ) {
                $user->notify(new SubscriptionRenewalReminderNotification(
                    $plans->get($subscription->plan_key)->title,
                    max(1, $daysUntil),
                ));
                $subscription->renewal_reminder_sent_for = $subscription->current_period_end;
                $subscription->save();
                $sent['renewal']++;
            }
        }

        $state->save();
    }

    /**
     * The same four fields the mobile app's setupState derives "needs setup"
     * from: both languages, proficiency, and the streak goal. Any missing one
     * strands the user on the setup wizard.
     */
    private function setupIncomplete(User $user): bool
    {
        return $user->native_language_id === null
            || $user->learning_language_id === null
            || $user->proficiency_level === null
            || $user->streak_goal_days === null;
    }
}
