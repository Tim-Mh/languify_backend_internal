<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_game_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();

            $table->unsignedInteger('total_xp')->default(0);
            $table->unsignedInteger('today_xp')->default(0);
            $table->date('today_date')->nullable();

            $table->unsignedInteger('streak')->default(0);
            $table->unsignedInteger('longest_streak')->default(0);
            $table->date('last_lesson_date')->nullable();

            $table->unsignedInteger('lessons_today')->default(0);
            $table->unsignedInteger('max_lessons_in_a_day')->default(0);
            $table->unsignedInteger('total_lessons_completed')->default(0);
            $table->unsignedInteger('perfect_lessons')->default(0);
            $table->unsignedInteger('units_completed_count')->default(0);

            $table->boolean('streak_freeze_available')->default(false);
            $table->timestamp('daily_chest_claimed_at')->nullable();

            $table->unsignedInteger('gems')->default(0);
            $table->unsignedTinyInteger('hearts')->default(5);
            $table->timestamp('hearts_updated_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_game_states');
    }
};
