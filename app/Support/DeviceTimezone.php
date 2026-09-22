<?php

namespace App\Support;

use DateTimeZone;
use Throwable;

/**
 * The timezone a device reports about itself.
 *
 * WHY THIS EXISTS
 *
 * The apps send `Intl.DateTimeFormat().resolvedOptions().timeZone` with every
 * register, login and social sign-in, because day boundaries for streaks and
 * daily resets are computed in the learner's own timezone rather than the
 * server's.
 *
 * That value was validated with Laravel's `timezone` rule, which rejects
 * anything not in `timezone_identifiers_list()`. Android returns **`Etc/Unknown`**
 * whenever it cannot resolve the device timezone, which is the normal state on
 * emulators and on freshly provisioned handsets. The rule failed, the request
 * came back 422 before the password was ever checked, and the learner could not
 * log in, register, or sign in with Google. Google Play rejected the app for
 * exactly this: their review device reported `Etc/Unknown` and nothing worked.
 *
 * The lesson is the rule here: **a cosmetic preference the device volunteers
 * must never be able to reject the request it rode in on.** A timezone we cannot
 * use is worth ignoring, not worth refusing a sign-in over. The learner keeps
 * whatever timezone they already had, or none, and their streak resets on server
 * time until the device reports something usable.
 *
 * `DateTimeZone` rather than `timezone_identifiers_list()` decides what is
 * usable, because it is the thing that will actually be constructed later. It is
 * also more forgiving in the right direction: `GMT`, `UTC` and `Etc/GMT+5` are
 * all perfectly usable and all rejected by Laravel's rule.
 */
class DeviceTimezone
{
    /**
     * Validation for a device-reported timezone.
     *
     * Deliberately loose. The length cap is the only real constraint, and it is
     * there to stop the field being used to post a novel. Whether the value
     * means anything is decided by `normalise()` afterwards, where a bad answer
     * costs the value rather than the request.
     */
    public const RULES = ['nullable', 'string', 'max:64'];

    /** The value if it can be used, or null if it cannot. Never throws. */
    public static function normalise(?string $value): ?string
    {
        $value = trim((string) $value);

        if ($value === '') {
            return null;
        }

        try {
            return (new DateTimeZone($value))->getName();
        } catch (Throwable) {
            // `Etc/Unknown`, an empty ICU answer, or anything else the device
            // invented. Not an error, just not usable.
            return null;
        }
    }
}
