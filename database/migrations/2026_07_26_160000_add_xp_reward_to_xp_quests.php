<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * The "earn XP" daily quests used to reward gems only (0 XP) — odd for an
     * XP-goal quest, and out of step with the lesson/perfect/unit quests that
     * do grant XP. Give them a modest XP reward scaled to their target.
     */
    public function up(): void
    {
        $rewards = [15 => 5, 30 => 10, 60 => 15, 100 => 25];
        foreach ($rewards as $target => $xp) {
            DB::table('quests')
                ->where('requirement_type', 'xp_earned')
                ->where('target_count', $target)
                ->where('xp_reward', 0)
                ->update(['xp_reward' => $xp]);
        }
    }

    public function down(): void
    {
        DB::table('quests')->where('requirement_type', 'xp_earned')->update(['xp_reward' => 0]);
    }
};
