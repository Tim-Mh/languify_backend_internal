<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * A learner can now enrol in the same learning language more than once with
     * a DIFFERENT native (hint) language — e.g. "German (English hints)" and
     * "German (Spanish hints)" as two separate courses. So the uniqueness of an
     * enrolment is (user, learning language, native language), not just
     * (user, learning language).
     */
    public function up(): void
    {
        // Add the wider unique FIRST so it can back the user_id foreign key,
        // then drop the old one (MySQL won't drop an index a FK still needs).
        Schema::table('user_courses', function (Blueprint $table) {
            $table->unique(['user_id', 'language_id', 'native_language_id']);
        });
        Schema::table('user_courses', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'language_id']);
        });
    }

    public function down(): void
    {
        Schema::table('user_courses', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'language_id', 'native_language_id']);
            $table->unique(['user_id', 'language_id']);
        });
    }
};
