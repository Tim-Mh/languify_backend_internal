<?php

namespace App\Services;

use App\Enums\NotificationCategory;
use App\Models\NotificationPreference;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Decides whether a push may actually go out, and counts it if so.
 *
 * These rules matter more than the wording of any individual notification.
 * Without them the catalogue becomes spam, the learner switches notifications
 * off at the OS level, and every future notification is lost along with it —
 * there is no way back from that except reinstalling the app.
 *
 * Every check is per learner and in THEIR timezone, matching how streaks,
 * daily quests and heart regeneration already work in this app.
 */
class PushPolicy
{
    /** Nothing lands between these local hours. */
    private const QUIET_FROM_HOUR = 22;

    private const QUIET_UNTIL_HOUR = 8;

    /** Across every category combined. */
    private const MAX_PER_DAY = 3;

    /**
     * Whether to send, recording the send as it decides.
     *
     * Decision and increment are one locked transaction on purpose: the hourly
     * sweep and a live request can both reach this for the same learner at the
     * same moment, and two callers that each read "2 sent today" would both
     * pass and land four notifications on a cap of three.
     */
    public function allows(User $user, NotificationCategory $category, bool $lowPriority = false): bool
    {
        return DB::transaction(function () use ($user, $category, $lowPriority) {
            NotificationPreference::firstOrCreate(['user_id' => $user->id]);

            $preferences = NotificationPreference::where('user_id', $user->id)
                ->lockForUpdate()
                ->firstOrFail();

            // The learner switched this category off. Nothing else matters.
            if (! $preferences->allows($category)) {
                return false;
            }

            $now = Carbon::now($user->timezone ?: config('app.timezone'));

            if (! $category->bypassesQuietHours() && $this->isQuietHour($now)) {
                return false;
            }

            $this->resetCountersIfNewDay($preferences, $now);

            if (! $category->bypassesDailyCap() && $preferences->sent_count >= self::MAX_PER_DAY) {
                return false;
            }

            // The last slot of the day is reserved for messages that matter.
            // The cap is first-come-first-served, and without this a morning
            // of nice-to-haves would silently swallow the evening's
            // streak-at-risk push.
            if ($lowPriority && $preferences->sent_count >= self::MAX_PER_DAY - 1) {
                return false;
            }

            // At most one "you have not done it yet" push a day, however many
            // are due. Two in one day reads as pestering rather than helping.
            if ($category->isNag() && $preferences->nag_sent) {
                return false;
            }

            $preferences->sent_count += 1;

            if ($category->isNag()) {
                $preferences->nag_sent = true;
            }

            $preferences->save();

            return true;
        });
    }

    /**
     * Quiet hours wrap around midnight, so this is an OR rather than the usual
     * between-two-bounds check.
     */
    private function isQuietHour(Carbon $localNow): bool
    {
        return $localNow->hour >= self::QUIET_FROM_HOUR || $localNow->hour < self::QUIET_UNTIL_HOUR;
    }

    /**
     * Rolls the counters over when the learner's own day has changed.
     *
     * Done here rather than by a scheduled job because "midnight" is a
     * different instant for every learner, and a nightly reset job would have
     * to run hourly and touch every row to get it right.
     */
    private function resetCountersIfNewDay(NotificationPreference $preferences, Carbon $localNow): void
    {
        $today = $localNow->format('Y-m-d');

        if ($preferences->sent_date?->format('Y-m-d') === $today) {
            return;
        }

        $preferences->sent_date = $localNow->copy()->startOfDay();
        $preferences->sent_count = 0;
        $preferences->nag_sent = false;
    }
}
