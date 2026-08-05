<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Replaces the fixed 12-quest catalog with 4 growing templates (one per
     * goal type). Their targets auto-scale with the learner's total lessons
     * completed, up to max_target; rewards scale in proportion. Old fixed
     * quests are deactivated (kept for history, not assigned).
     */
    public function up(): void
    {
        DB::table('quests')->update(['is_active' => false]);

        $now = now();
        $templates = [
            ['key' => 'tpl-lessons', 'title' => 'Lesson Goal', 'description' => 'Complete lessons today', 'requirement_type' => 'lessons_completed', 'difficulty' => 1, 'target_count' => 1, 'target_increment' => 1, 'max_target' => 8, 'gems_reward' => 10, 'xp_reward' => 5, 'order_number' => 1],
            ['key' => 'tpl-xp', 'title' => 'XP Goal', 'description' => 'Earn XP today', 'requirement_type' => 'xp_earned', 'difficulty' => 1, 'target_count' => 15, 'target_increment' => 10, 'max_target' => 150, 'gems_reward' => 10, 'xp_reward' => 5, 'order_number' => 2],
            ['key' => 'tpl-perfect', 'title' => 'Flawless', 'description' => 'Finish lessons with no mistakes', 'requirement_type' => 'perfect_lesson', 'difficulty' => 2, 'target_count' => 1, 'target_increment' => 1, 'max_target' => 2, 'gems_reward' => 25, 'xp_reward' => 10, 'order_number' => 3],
            ['key' => 'tpl-units', 'title' => 'Unit Finisher', 'description' => 'Complete a unit today', 'requirement_type' => 'units_completed', 'difficulty' => 3, 'target_count' => 1, 'target_increment' => 0, 'max_target' => 1, 'gems_reward' => 35, 'xp_reward' => 15, 'order_number' => 4],
        ];

        foreach ($templates as $t) {
            DB::table('quests')->updateOrInsert(
                ['key' => $t['key']],
                array_merge($t, ['is_active' => true, 'updated_at' => $now, 'created_at' => $now]),
            );
        }
    }

    public function down(): void
    {
        DB::table('quests')->whereIn('key', ['tpl-lessons', 'tpl-xp', 'tpl-perfect', 'tpl-units'])->delete();
        DB::table('quests')->update(['is_active' => true]);
    }
};
