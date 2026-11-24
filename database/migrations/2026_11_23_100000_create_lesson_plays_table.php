<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * One row per finished lesson play, replays included. user_lesson_completions
 * keeps a single row per lesson and moves its date on every replay, so it
 * cannot say how many lessons were played on a given day.
 *
 * Seeded with one play per existing completion at its latest date. Earlier
 * replays were never recorded anywhere, so they cannot be recovered.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_plays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lesson_id')->constrained()->cascadeOnDelete();
            $table->timestamp('played_at')->index();
        });

        DB::table('lesson_plays')->insertUsing(
            ['user_id', 'lesson_id', 'played_at'],
            DB::table('user_lesson_completions')->whereNotNull('completed_at')->select('user_id', 'lesson_id', 'completed_at'),
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_plays');
    }
};
