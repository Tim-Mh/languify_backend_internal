<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * A lesson must be completed several times (see
     * LessonProgressService::LESSON_TARGET_COMPLETIONS) to be "mastered", which
     * fills its progress ring and unlocks the next lesson. This counter tracks
     * how many sessions of a lesson the user has completed. Existing rows
     * represent one completed session, so default to 1.
     */
    public function up(): void
    {
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->unsignedInteger('completions_count')->default(1)->after('lesson_id');
        });
    }

    public function down(): void
    {
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->dropColumn('completions_count');
        });
    }
};
