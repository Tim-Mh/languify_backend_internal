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
        Schema::create('trivia_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('topic_id')->constrained('trivia_topics')->cascadeOnDelete();
            $table->unsignedInteger('correct_count');
            $table->unsignedInteger('total_questions');
            $table->unsignedInteger('gems_awarded')->default(0);
            $table->unsignedInteger('xp_awarded')->default(0);
            $table->timestamp('completed_at');
            $table->timestamps();

            $table->index(['user_id', 'topic_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trivia_attempts');
    }
};
