<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adds the new 'translate' exercise type to the type enum, and a
     * session_number column so a lesson can hold several progressive sessions
     * (each play of the lesson serves the next session's set until mastered).
     */
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement(
                "ALTER TABLE exercises MODIFY COLUMN type ENUM("
                ."'match_pairs','fill_blank','tap_word','listen_select','multiple_choice',"
                ."'paragraph_translation','translate')"
            );
        }

        Schema::table('exercises', function (Blueprint $table) {
            $table->unsignedInteger('session_number')->default(1)->after('data');
        });
    }

    public function down(): void
    {
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropColumn('session_number');
        });

        if (DB::getDriverName() === 'mysql') {
            DB::statement(
                "ALTER TABLE exercises MODIFY COLUMN type ENUM("
                ."'match_pairs','fill_blank','tap_word','listen_select','multiple_choice',"
                ."'paragraph_translation')"
            );
        }
    }
};
