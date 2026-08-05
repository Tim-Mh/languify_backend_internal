<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            // Guards against double-sending when the same user is processed
            // more than once in a day (e.g. both a real request and the
            // scheduled notification sweep hit hydrate() the same day).
            $table->date('streak_broken_notified_date')->nullable()->after('last_streak_freeze_month');
            $table->date('last_lesson_reminder_date')->nullable()->after('streak_broken_notified_date');
            // Which inactivity stage (3/7/14/30 days) was last emailed —
            // only ever moves forward, so a user who comes back and goes
            // quiet again starts the staged sequence over from 3.
            $table->unsignedSmallInteger('last_inactivity_stage_notified')->nullable()->after('last_lesson_reminder_date');
            // The Monday (week start date) the "keep it up" motivation email
            // was last sent, so it fires at most once per week.
            $table->date('last_motivation_notified_week')->nullable()->after('last_inactivity_stage_notified');
        });
    }

    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn([
                'streak_broken_notified_date',
                'last_lesson_reminder_date',
                'last_inactivity_stage_notified',
                'last_motivation_notified_week',
            ]);
        });
    }
};
