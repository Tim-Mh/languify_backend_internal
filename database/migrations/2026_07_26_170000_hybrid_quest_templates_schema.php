<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Turns quests into growing TEMPLATES: `target_increment` is how much the
     * target rises per growth step, `max_target` is the cap. And each assigned
     * daily quest snapshots the concrete target + rewards it was issued with,
     * so growth mid-day never moves the goalposts.
     */
    public function up(): void
    {
        Schema::table('quests', function (Blueprint $table) {
            $table->unsignedInteger('target_increment')->default(0)->after('target_count');
            $table->unsignedInteger('max_target')->nullable()->after('target_increment');
        });

        Schema::table('user_daily_quests', function (Blueprint $table) {
            $table->unsignedInteger('target_count')->nullable()->after('quest_id');
            $table->unsignedInteger('gems_reward')->nullable()->after('target_count');
            $table->unsignedInteger('xp_reward')->nullable()->after('gems_reward');
        });

        // Backfill existing assignments from their quest's fixed values.
        // Correlated subqueries rather than MySQL's UPDATE…JOIN, because this
        // also has to run on the sqlite database the test suite migrates.
        DB::statement(<<<'SQL'
            UPDATE user_daily_quests
            SET target_count = (SELECT q.target_count FROM quests q WHERE q.id = user_daily_quests.quest_id),
                gems_reward = (SELECT q.gems_reward FROM quests q WHERE q.id = user_daily_quests.quest_id),
                xp_reward = (SELECT q.xp_reward FROM quests q WHERE q.id = user_daily_quests.quest_id)
            WHERE target_count IS NULL
        SQL);
    }

    public function down(): void
    {
        Schema::table('quests', function (Blueprint $table) {
            $table->dropColumn(['target_increment', 'max_target']);
        });
        Schema::table('user_daily_quests', function (Blueprint $table) {
            $table->dropColumn(['target_count', 'gems_reward', 'xp_reward']);
        });
    }
};
