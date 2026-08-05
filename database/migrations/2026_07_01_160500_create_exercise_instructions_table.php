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
        Schema::create('exercise_instructions', function (Blueprint $table) {
            $table->id();
            $table->enum('exercise_type', ['match_pairs', 'fill_blank', 'tap_word', 'listen_select', 'multiple_choice']);
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            $table->text('template');
            $table->timestamps();

            $table->unique(['exercise_type', 'language_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_instructions');
    }
};
