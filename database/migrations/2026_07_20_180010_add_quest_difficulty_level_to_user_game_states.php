<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            // 1-3, adapted daily by QuestService based on yesterday's quest
            // completion: all 3 done -> level up, none done -> level down,
            // partial -> unchanged. Drives which difficulty tier today's 3
            // quests get pulled from.
            $table->unsignedTinyInteger('quest_difficulty_level')->default(1)->after('weekly_league_xp');
        });
    }

    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn('quest_difficulty_level');
        });
    }
};
