<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Counts lessons MASTERED (all sessions completed) so far today, reset daily
 * like lessons_today. The "Complete N lessons today" quest reads this instead
 * of lessons_today (raw session count), so a single session of a 5-session
 * lesson no longer completes the quest — only finishing the whole lesson does.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->unsignedInteger('lessons_mastered_today')->default(0)->after('lessons_today');
        });
    }

    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn('lessons_mastered_today');
        });
    }
};
