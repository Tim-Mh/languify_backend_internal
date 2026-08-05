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
        DB::statement(<<<'SQL'
            UPDATE user_daily_quests udq
            JOIN quests q ON q.id = udq.quest_id
            SET udq.target_count = q.target_count,
                udq.gems_reward = q.gems_reward,
                udq.xp_reward = q.xp_reward
            WHERE udq.target_count IS NULL
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
