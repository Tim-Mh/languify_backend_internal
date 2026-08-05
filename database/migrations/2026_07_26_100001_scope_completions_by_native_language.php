<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Lesson- and unit-completion progress becomes per-course by tagging each
     * completion with the native (hint) language of the course it was earned
     * in. That way "German (English hints)" and "German (Spanish hints)" — which
     * share the same German lessons — keep SEPARATE path progress. Account-wide
     * gamification (XP, streak, hearts, badges) is untouched and stays global.
     *
     * Existing rows are backfilled from the user's current course pairing, so
     * everyone's progress carries over unchanged.
     */
    public function up(): void
    {
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->foreignId('native_language_id')->nullable()->after('lesson_id')
                ->constrained('languages')->nullOnDelete();
        });
        // A correlated subquery rather than MySQL's UPDATE…JOIN, because this
        // also has to run on the sqlite database the test suite migrates.
        DB::statement(<<<'SQL'
            UPDATE user_lesson_completions
            SET native_language_id = (
                SELECT uc.native_language_id
                FROM lessons l
                JOIN units u ON u.id = l.unit_id
                JOIN chapters c ON c.id = u.chapter_id
                JOIN user_courses uc ON uc.language_id = c.language_id
                    AND uc.user_id = user_lesson_completions.user_id
                WHERE l.id = user_lesson_completions.lesson_id
                LIMIT 1
            )
        SQL);
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->unique(['user_id', 'lesson_id', 'native_language_id'], 'ulc_user_lesson_native_unique');
        });
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'lesson_id']);
        });

        Schema::table('user_unit_completions', function (Blueprint $table) {
            $table->foreignId('native_language_id')->nullable()->after('unit_id')
                ->constrained('languages')->nullOnDelete();
        });
        DB::statement(<<<'SQL'
            UPDATE user_unit_completions
            SET native_language_id = (
                SELECT uc.native_language_id
                FROM units u
                JOIN chapters c ON c.id = u.chapter_id
                JOIN user_courses uc ON uc.language_id = c.language_id
                    AND uc.user_id = user_unit_completions.user_id
                WHERE u.id = user_unit_completions.unit_id
                LIMIT 1
            )
        SQL);
        Schema::table('user_unit_completions', function (Blueprint $table) {
            $table->unique(['user_id', 'unit_id', 'native_language_id'], 'uuc_user_unit_native_unique');
        });
        Schema::table('user_unit_completions', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'unit_id']);
        });
    }

    public function down(): void
    {
        Schema::table('user_lesson_completions', function (Blueprint $table) {
            $table->dropUnique('ulc_user_lesson_native_unique');
            $table->dropConstrainedForeignId('native_language_id');
            $table->unique(['user_id', 'lesson_id']);
        });
        Schema::table('user_unit_completions', function (Blueprint $table) {
            $table->dropUnique('uuc_user_unit_native_unique');
            $table->dropConstrainedForeignId('native_language_id');
            $table->unique(['user_id', 'unit_id']);
        });
    }
};
