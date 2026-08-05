<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->enum('category', ['streak', 'xp', 'lesson']);
            $table->string('title');
            $table->string('description');
            $table->enum('tier', ['BRONZE', 'SILVER', 'GOLD', 'PLATINUM', 'LEGENDARY']);
            $table->enum('requirement_type', [
                'streak', 'total_xp', 'total_lessons_completed',
                'perfect_lessons', 'units_completed_count', 'max_lessons_in_a_day', 'chapter_complete',
            ]);
            $table->unsignedInteger('requirement_value')->default(0);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        $now = now();

        DB::table('badges')->insert([
            ['key' => 'streak-3', 'category' => 'streak', 'title' => 'On a Roll', 'description' => '3-day streak', 'tier' => 'BRONZE', 'requirement_type' => 'streak', 'requirement_value' => 3, 'order_number' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'streak-7', 'category' => 'streak', 'title' => 'Committed', 'description' => '7-day streak', 'tier' => 'SILVER', 'requirement_type' => 'streak', 'requirement_value' => 7, 'order_number' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'streak-30', 'category' => 'streak', 'title' => 'Dedicated', 'description' => '30-day streak', 'tier' => 'GOLD', 'requirement_type' => 'streak', 'requirement_value' => 30, 'order_number' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'streak-100', 'category' => 'streak', 'title' => 'Unstoppable', 'description' => '100-day streak', 'tier' => 'PLATINUM', 'requirement_type' => 'streak', 'requirement_value' => 100, 'order_number' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'streak-365', 'category' => 'streak', 'title' => 'Legendary', 'description' => '365-day streak', 'tier' => 'LEGENDARY', 'requirement_type' => 'streak', 'requirement_value' => 365, 'order_number' => 5, 'created_at' => $now, 'updated_at' => $now],

            ['key' => 'xp-first', 'category' => 'xp', 'title' => 'First Steps', 'description' => 'Earn your first XP', 'tier' => 'BRONZE', 'requirement_type' => 'total_xp', 'requirement_value' => 1, 'order_number' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'xp-1000', 'category' => 'xp', 'title' => 'Scholar', 'description' => 'Earn 1,000 total XP', 'tier' => 'SILVER', 'requirement_type' => 'total_xp', 'requirement_value' => 1000, 'order_number' => 7, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'xp-5000', 'category' => 'xp', 'title' => 'Overachiever', 'description' => 'Earn 5,000 total XP', 'tier' => 'GOLD', 'requirement_type' => 'total_xp', 'requirement_value' => 5000, 'order_number' => 8, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'xp-10000', 'category' => 'xp', 'title' => 'Obsessed', 'description' => 'Earn 10,000 total XP', 'tier' => 'PLATINUM', 'requirement_type' => 'total_xp', 'requirement_value' => 10000, 'order_number' => 9, 'created_at' => $now, 'updated_at' => $now],

            ['key' => 'lesson-first', 'category' => 'lesson', 'title' => 'First Lesson', 'description' => 'Complete your very first lesson', 'tier' => 'BRONZE', 'requirement_type' => 'total_lessons_completed', 'requirement_value' => 1, 'order_number' => 10, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'lesson-unit', 'category' => 'lesson', 'title' => 'Unit Complete', 'description' => 'Finish all lessons in a unit', 'tier' => 'SILVER', 'requirement_type' => 'units_completed_count', 'requirement_value' => 1, 'order_number' => 11, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'lesson-section', 'category' => 'lesson', 'title' => 'Section Master', 'description' => 'Complete an entire section', 'tier' => 'GOLD', 'requirement_type' => 'chapter_complete', 'requirement_value' => 0, 'order_number' => 12, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'lesson-perfect', 'category' => 'lesson', 'title' => 'Perfect Lesson', 'description' => 'Finish a lesson with 0 mistakes', 'tier' => 'SILVER', 'requirement_type' => 'perfect_lessons', 'requirement_value' => 1, 'order_number' => 13, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'lesson-marathon', 'category' => 'lesson', 'title' => 'Study Marathon', 'description' => 'Complete 10 lessons in one day', 'tier' => 'GOLD', 'requirement_type' => 'max_lessons_in_a_day', 'requirement_value' => 10, 'order_number' => 14, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('badges');
    }
};
