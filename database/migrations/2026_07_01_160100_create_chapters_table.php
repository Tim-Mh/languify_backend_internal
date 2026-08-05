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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('language_id')->constrained()->cascadeOnDelete();
            // Includes 'final_test' directly (the later migration
            // 2026_07_02_173936_add_final_test_to_chapters_chapter_key_enum only
            // widens this via a MySQL-only raw ALTER, which fails on SQLite —
            // listing all 5 values here up front keeps fresh installs and the
            // SQLite test database correct without touching that migration's
            // already-applied effect on the real MySQL database).
            $table->enum('chapter_key', ['beginner', 'conversation', 'restaurant', 'supermarket', 'final_test']);
            $table->string('title');
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();

            $table->unique(['language_id', 'chapter_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
