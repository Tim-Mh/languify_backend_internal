<?php

namespace App\Support;

use Illuminate\Http\Request;

/**
 * How many rows an admin list shows per page.
 *
 * The value rides in the query string so it survives the pagination links and
 * can be bookmarked, and it is checked against a fixed set on the way in. An
 * unvalidated ?per_page=100000 would quietly turn every list back into the
 * unbounded page load that pagination exists to prevent.
 */
class PerPage
{
    /** The sizes offered in the dropdown. */
    public const OPTIONS = [10, 20, 50, 100];

    public const FALLBACK = 20;

    public static function resolve(Request $request): int
    {
        $value = (int) $request->query('per_page', self::FALLBACK);

        return in_array($value, self::OPTIONS, true) ? $value : self::FALLBACK;
    }
}
