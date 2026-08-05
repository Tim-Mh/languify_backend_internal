<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Raw MySQL syntax — the create_chapters_table migration now lists
        // 'final_test' directly for every driver, so this is a no-op
        // everywhere except MySQL (where it's a harmless redundant restatement
        // on a fresh install, and matches what already ran on the real DB).
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE chapters MODIFY COLUMN chapter_key ENUM('beginner', 'conversation', 'restaurant', 'supermarket', 'final_test') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getDriverName() !== 'mysql') {
            return;
        }

        DB::statement("ALTER TABLE chapters MODIFY COLUMN chapter_key ENUM('beginner', 'conversation', 'restaurant', 'supermarket') NOT NULL");
    }
};
