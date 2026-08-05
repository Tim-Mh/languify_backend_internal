<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Adds a per-word "half-life" so the engine can model memory decay the way
// Duolingo's Half-Life Regression does: recall probability = 2^(-elapsed /
// half_life). A correct answer lengthens the half-life (you'll remember it
// longer); a wrong answer collapses it (it comes back soon). This lets a
// once-mastered word resurface on its own as time passes, instead of the
// old static strength that only moved when the word was answered.
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_word_strengths', function (Blueprint $table) {
            $table->unsignedInteger('half_life_minutes')->nullable()->after('consecutive_correct');
        });
    }

    public function down(): void
    {
        Schema::table('user_word_strengths', function (Blueprint $table) {
            $table->dropColumn('half_life_minutes');
        });
    }
};
