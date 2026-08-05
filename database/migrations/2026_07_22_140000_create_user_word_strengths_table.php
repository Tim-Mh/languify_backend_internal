<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Tracks how well each learner knows each individual course-language word, so
// the app can auto-assemble a "practice your weak words" session instead of a
// fixed lesson. One row per (user, language, word). `strength` (0-100) is a
// simple mastery score that rises on correct answers and drops on wrong ones;
// `due_at` schedules when a word should resurface (spaced repetition).
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_word_strengths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->string('word');
            $table->unsignedTinyInteger('strength')->default(0);
            $table->unsignedInteger('times_seen')->default(0);
            $table->unsignedInteger('times_correct')->default(0);
            $table->unsignedSmallInteger('consecutive_correct')->default(0);
            $table->timestamp('last_seen_at')->nullable();
            $table->timestamp('due_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'language_id', 'word']);
            // The practice picker sorts a user's words by strength then due date.
            $table->index(['user_id', 'language_id', 'strength']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_word_strengths');
    }
};
