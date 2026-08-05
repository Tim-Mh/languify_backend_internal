<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Replaces the old mixed badge set with three clean 5-tier ladders
     * (Streak, XP, Lesson), 15 badges total. Each is a straight
     * Bronze -> Legendary staircase on a single metric, matching the badge
     * artwork in the frontend's *-badges/ folders. Orphaned user_badges from
     * removed keys are cleared; qualifying users re-earn the new ones on their
     * next lesson completion.
     */
    public function up(): void
    {
        $now = now();
        $badges = [
            // Streak (unchanged keys, kept for continuity)
            ['key' => 'streak-3', 'category' => 'streak', 'title' => 'On a Roll', 'description' => '3-day streak', 'tier' => 'BRONZE', 'requirement_type' => 'streak', 'requirement_value' => 3, 'order_number' => 1],
            ['key' => 'streak-7', 'category' => 'streak', 'title' => 'Committed', 'description' => '7-day streak', 'tier' => 'SILVER', 'requirement_type' => 'streak', 'requirement_value' => 7, 'order_number' => 2],
            ['key' => 'streak-30', 'category' => 'streak', 'title' => 'Dedicated', 'description' => '30-day streak', 'tier' => 'GOLD', 'requirement_type' => 'streak', 'requirement_value' => 30, 'order_number' => 3],
            ['key' => 'streak-100', 'category' => 'streak', 'title' => 'Unstoppable', 'description' => '100-day streak', 'tier' => 'PLATINUM', 'requirement_type' => 'streak', 'requirement_value' => 100, 'order_number' => 4],
            ['key' => 'streak-365', 'category' => 'streak', 'title' => 'Legendary', 'description' => '365-day streak', 'tier' => 'LEGENDARY', 'requirement_type' => 'streak', 'requirement_value' => 365, 'order_number' => 5],

            // XP
            ['key' => 'xp-100', 'category' => 'xp', 'title' => 'First Steps', 'description' => 'Earn 100 XP', 'tier' => 'BRONZE', 'requirement_type' => 'total_xp', 'requirement_value' => 100, 'order_number' => 6],
            ['key' => 'xp-1000', 'category' => 'xp', 'title' => 'Scholar', 'description' => 'Earn 1,000 XP', 'tier' => 'SILVER', 'requirement_type' => 'total_xp', 'requirement_value' => 1000, 'order_number' => 7],
            ['key' => 'xp-5000', 'category' => 'xp', 'title' => 'Overachiever', 'description' => 'Earn 5,000 XP', 'tier' => 'GOLD', 'requirement_type' => 'total_xp', 'requirement_value' => 5000, 'order_number' => 8],
            ['key' => 'xp-10000', 'category' => 'xp', 'title' => 'Obsessed', 'description' => 'Earn 10,000 XP', 'tier' => 'PLATINUM', 'requirement_type' => 'total_xp', 'requirement_value' => 10000, 'order_number' => 9],
            ['key' => 'xp-25000', 'category' => 'xp', 'title' => 'XP Legend', 'description' => 'Earn 25,000 XP', 'tier' => 'LEGENDARY', 'requirement_type' => 'total_xp', 'requirement_value' => 25000, 'order_number' => 10],

            // Lesson
            ['key' => 'lesson-1', 'category' => 'lesson', 'title' => 'First Lesson', 'description' => 'Complete 1 lesson', 'tier' => 'BRONZE', 'requirement_type' => 'total_lessons_completed', 'requirement_value' => 1, 'order_number' => 11],
            ['key' => 'lesson-25', 'category' => 'lesson', 'title' => 'Getting the Hang of It', 'description' => 'Complete 25 lessons', 'tier' => 'SILVER', 'requirement_type' => 'total_lessons_completed', 'requirement_value' => 25, 'order_number' => 12],
            ['key' => 'lesson-100', 'category' => 'lesson', 'title' => 'Lesson Master', 'description' => 'Complete 100 lessons', 'tier' => 'GOLD', 'requirement_type' => 'total_lessons_completed', 'requirement_value' => 100, 'order_number' => 13],
            ['key' => 'lesson-250', 'category' => 'lesson', 'title' => 'Lesson Machine', 'description' => 'Complete 250 lessons', 'tier' => 'PLATINUM', 'requirement_type' => 'total_lessons_completed', 'requirement_value' => 250, 'order_number' => 14],
            ['key' => 'lesson-500', 'category' => 'lesson', 'title' => 'Lesson Legend', 'description' => 'Complete 500 lessons', 'tier' => 'LEGENDARY', 'requirement_type' => 'total_lessons_completed', 'requirement_value' => 500, 'order_number' => 15],
        ];

        $keptKeys = array_column($badges, 'key');

        // Remove user badges earned under keys that no longer exist.
        DB::table('user_badges')->whereNotIn('badge_key', $keptKeys)->delete();

        DB::table('badges')->delete();
        foreach ($badges as $badge) {
            DB::table('badges')->insert(array_merge($badge, [
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }

    public function down(): void
    {
        // One-way content reset; no structural change to reverse.
    }
};
