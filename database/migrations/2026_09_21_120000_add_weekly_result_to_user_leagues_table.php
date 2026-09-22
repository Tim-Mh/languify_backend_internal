<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * What the last rollover did to this member, kept until they have seen it.
 *
 * `pending_tier_change` already says "promoted" or "demoted", but only when the
 * tier actually moved — which is the rare case. Most weeks a learner finishes
 * mid-table, keeps their tier, and the app tells them nothing at all, so the
 * week they spent earning XP simply vanishes on Monday morning.
 *
 * These four columns carry the result itself: where they finished, what it did
 * to their points, how much XP earned it, and what they were paid for it. Read
 * once by the leaderboard screen and cleared immediately, the same one-shot
 * contract `pending_tier_change` already uses, so the popup appears on the next
 * visit after a rollover and never again.
 *
 * Nullable rather than defaulted to zero: null means "nothing to show", which
 * is different from "you finished with a delta of zero" and has to stay
 * distinguishable or every member sees a popup every week.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_leagues', function (Blueprint $table) {
            // Final position in the cohort, 1 = winner.
            $table->unsignedInteger('pending_result_rank')->nullable()->after('pending_tier_change');

            // Signed: the top half gain, the bottom half lose. This is the
            // number the popup leads with, so it keeps its sign.
            $table->integer('pending_result_points')->nullable()->after('pending_result_rank');

            // The XP that earned that rank, for context in the popup.
            $table->unsignedInteger('pending_result_xp')->nullable()->after('pending_result_points');

            // Gems actually credited. Zero is a real answer (finished in the
            // bottom half), so it is stored rather than inferred.
            $table->unsignedInteger('pending_result_gems')->nullable()->after('pending_result_xp');
        });
    }

    public function down(): void
    {
        Schema::table('user_leagues', function (Blueprint $table) {
            $table->dropColumn([
                'pending_result_rank',
                'pending_result_points',
                'pending_result_xp',
                'pending_result_gems',
            ]);
        });
    }
};
