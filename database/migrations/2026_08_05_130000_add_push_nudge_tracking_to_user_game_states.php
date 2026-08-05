<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tracking columns for the two new sweep-fired nudges, following the pattern
 * already on this table (last_lesson_reminder_date and friends): anything the
 * hourly sweep sends needs its own column or it re-sends every hour. The
 * daily cap would mask that, but masking is not fixing.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            // One-shot: the "finish your setup" nudge is sent at most once,
            // ever. The re-engagement ladder takes over from there.
            $table->timestamp('setup_nudge_sent_at')->nullable()->after('last_motivation_notified_week');

            // The unclaimed-badge nudge repeats at most weekly.
            $table->date('last_badge_nudge_date')->nullable()->after('setup_nudge_sent_at');

            // Set when hearts hit zero mid-lesson, cleared when the learner
            // completes a lesson or buys a refill — while set, the sweep may
            // send one "hearts are full again" push once regen catches up.
            $table->timestamp('hearts_depleted_at')->nullable()->after('last_badge_nudge_date');

            // The Sunday-evening league-zone nudge, at most once per week.
            $table->date('last_league_nudge_date')->nullable()->after('hearts_depleted_at');
        });
    }

    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn([
                'setup_nudge_sent_at', 'last_badge_nudge_date',
                'hearts_depleted_at', 'last_league_nudge_date',
            ]);
        });
    }
};
