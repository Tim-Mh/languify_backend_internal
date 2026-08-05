<?php

namespace App\Enums;

/**
 * The push notification groups a learner can switch off independently.
 *
 * Six, not one per notification. A single on/off switch means people disable
 * everything to stop one annoyance, and a toggle per notification is a wall of
 * switches nobody reads. Both app stores expect to see something in between.
 *
 * Each case is three things at once, deliberately kept as one identifier:
 *   - a column on notification_preferences
 *   - the Android channel id the app creates in src/lib/push.js
 *   - the key the mobile settings screen renders
 *
 * Adding a case therefore means a migration AND a matching channel in the app.
 * An unknown channel id is dropped by Android without a word, so the two lists
 * have to stay in step.
 */
enum NotificationCategory: string
{
    case Reminders = 'reminders';
    case Rewards = 'rewards';
    case League = 'league';
    case Progress = 'progress';
    case Family = 'family';
    case Billing = 'billing';

    /**
     * Categories that nag rather than report: they fire because the learner has
     * NOT done something. At most one a day, however many are due, because two
     * "come back" pushes in one day is the fastest way to get notifications
     * turned off for good.
     */
    public function isNag(): bool
    {
        return $this === self::Reminders;
    }

    /**
     * Whether the daily cap does not apply.
     *
     * Only billing. It is the one category where silence actively costs the
     * learner money, and suppressing "your card was declined" because they had
     * already had three league updates that day would be indefensible. Quiet
     * hours still apply — the same events are emailed too, so nothing is lost
     * by waiting until morning.
     */
    public function bypassesDailyCap(): bool
    {
        return $this === self::Billing;
    }

    /** @return array<int, string> */
    public static function values(): array
    {
        return array_map(fn (self $case) => $case->value, self::cases());
    }
}
