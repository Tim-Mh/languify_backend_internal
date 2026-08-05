<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\DailyLessonReminderNotification;
use App\Notifications\MotivationNotification;
use App\Notifications\ReEngagementNotification;
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

    private const MOTIVATION_LOCAL_HOUR = 9;

    private const REENGAGEMENT_LOCAL_HOUR = 10;

    private const MOTIVATION_MIN_STREAK = 7;

    private const INACTIVITY_STAGES = [3, 7, 14, 30];

    public function handle(LessonProgressService $progress): int
    {
        $sent = ['reminder' => 0, 'motivation' => 0, 'reEngagement' => 0];

        // Eager-load the whole access-resolution relation chain per chunk, so
        // hasActiveAppAccess()/effectivePlanKey() below don't lazy-load
        // subscription + family relations one user at a time — that's ~2
        // queries per user, every hour, across the entire user base, just to
        // decide whether to skip them.
        User::query()
            ->with(['activeSubscription', 'familyMembership.familyGroup.owner.activeSubscription'])
            ->chunkById(200, function ($users) use ($progress, &$sent) {
                foreach ($users as $user) {
                    if (! $user->hasActiveAppAccess()) {
                        continue;
                    }

                    try {
                        $this->processUser($user, $progress, $sent);
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
            'Daily sweep: %d reminders, %d motivation, %d re-engagement sent.',
            $sent['reminder'],
            $sent['motivation'],
            $sent['reEngagement'],
        ));

        return self::SUCCESS;
    }

    private function processUser(User $user, LessonProgressService $progress, array &$sent): void
    {
        $timezone = $user->timezone ?: config('app.timezone');
        $now = Carbon::now($timezone);
        $today = $now->copy()->startOfDay();
        $todayStr = $today->format('Y-m-d');

        // Also fires StreakBrokenNotification as a side effect when
        // it detects a lapsed streak — see breakStreakIfMissed().
        $state = $progress->hydrate($user);

        if (
            $now->hour === self::REMINDER_LOCAL_HOUR
            && $state->lessons_today === 0
            && $state->last_lesson_reminder_date?->format('Y-m-d') !== $todayStr
        ) {
            $user->notify(new DailyLessonReminderNotification($state->streak));
            $state->last_lesson_reminder_date = $today;
            $sent['reminder']++;
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

        $state->save();
    }
}
