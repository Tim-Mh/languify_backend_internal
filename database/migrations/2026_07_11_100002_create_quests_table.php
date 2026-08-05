<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quests', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title');
            $table->string('description')->nullable();
            $table->enum('requirement_type', ['lessons_completed', 'xp_earned', 'perfect_lesson']);
            $table->unsignedInteger('target_count');
            $table->unsignedInteger('gems_reward')->default(0);
            $table->unsignedInteger('xp_reward')->default(0);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        $now = now();

        DB::table('quests')->insert([
            ['key' => 'quest-2-lessons', 'title' => 'Quick Study', 'description' => 'Complete 2 lessons today', 'requirement_type' => 'lessons_completed', 'target_count' => 2, 'gems_reward' => 20, 'xp_reward' => 0, 'order_number' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'quest-4-lessons', 'title' => 'Study Session', 'description' => 'Complete 4 lessons today', 'requirement_type' => 'lessons_completed', 'target_count' => 4, 'gems_reward' => 40, 'xp_reward' => 20, 'order_number' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'quest-30-xp', 'title' => 'XP Hunter', 'description' => 'Earn 30 XP today', 'requirement_type' => 'xp_earned', 'target_count' => 30, 'gems_reward' => 15, 'xp_reward' => 0, 'order_number' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'quest-60-xp', 'title' => 'XP Champion', 'description' => 'Earn 60 XP today', 'requirement_type' => 'xp_earned', 'target_count' => 60, 'gems_reward' => 30, 'xp_reward' => 0, 'order_number' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'quest-perfect-lesson', 'title' => 'Flawless', 'description' => 'Finish a lesson with 0 mistakes', 'requirement_type' => 'perfect_lesson', 'target_count' => 1, 'gems_reward' => 25, 'xp_reward' => 10, 'order_number' => 5, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('quests');
    }
};
