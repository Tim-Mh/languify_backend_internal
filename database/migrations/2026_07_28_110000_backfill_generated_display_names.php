<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Gives every existing nameless account a LanguifyChampN display name.
 *
 * Accounts created before name capture existed (in particular Apple sign-ins,
 * since Apple only ever sends the name on the very first authorization and will
 * never resend it) are stuck with a null name, which surfaces as "there" in the
 * welcome email and an anonymous entry on the leaderboard. There is no way to
 * recover their real name, so they get a friendly generated one instead.
 *
 * Numbering continues from the highest LanguifyChampN already in use, and rows
 * are numbered by id so the order is stable and repeatable.
 */
return new class extends Migration
{
    private const PREFIX = 'LanguifyChamp';

    public function up(): void
    {
        // The numeric scan happens in PHP rather than SQL (REGEXP, SUBSTRING
        // and CAST AS UNSIGNED are MySQL dialect) so this also runs on the
        // sqlite database the test suite migrates. LIKE narrows the fetch;
        // the regex confirms the tail is purely numeric.
        $highest = DB::table('users')
            ->where('full_name', 'LIKE', self::PREFIX.'%')
            ->pluck('full_name')
            ->map(function (string $name) {
                return preg_match('/^'.self::PREFIX.'(\d+)$/', $name, $matches)
                    ? (int) $matches[1]
                    : 0;
            })
            ->max();

        $next = 1 + (int) $highest;

        $nameless = DB::table('users')
            ->where(function ($query) {
                $query->whereNull('full_name')->orWhere('full_name', '');
            })
            ->orderBy('id')
            ->pluck('id');

        foreach ($nameless as $id) {
            DB::table('users')->where('id', $id)->update(['full_name' => self::PREFIX.$next]);
            $next++;
        }
    }

    public function down(): void
    {
        // Deliberately not reversible: the original values were null or empty,
        // and clearing every generated name would also wipe any that were
        // handed out legitimately after this ran.
    }
};
