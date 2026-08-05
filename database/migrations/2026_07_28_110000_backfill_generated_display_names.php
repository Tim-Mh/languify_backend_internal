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
        $offset = strlen(self::PREFIX) + 1;

        $next = 1 + (int) DB::table('users')
            ->where('full_name', 'REGEXP', '^'.self::PREFIX.'[0-9]+$')
            ->selectRaw("MAX(CAST(SUBSTRING(full_name, {$offset}) AS UNSIGNED)) as highest")
            ->value('highest');

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
