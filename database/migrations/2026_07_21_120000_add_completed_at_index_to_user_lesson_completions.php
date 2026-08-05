<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The admin dashboard's "lessons completed this week" counts across ALL
     * users with a bare `where('completed_at', '>=', ...)` — no user_id
     * filter — so the existing (user_id, lesson_id) unique index can't help
     * and it full-scans this ever-growing table. A composite (user_id,
     * completed_at) also speeds the per-user activity-calendar / quest range
     * scans that already filter by user_id.
     */
    public function up(): void
    {
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->index('completed_at');
            $table->index(['user_id', 'completed_at']);
        });
    }

    public function down(): void
    {
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->dropIndex(['completed_at']);
            $table->dropIndex(['user_id', 'completed_at']);
        });
    }
};
