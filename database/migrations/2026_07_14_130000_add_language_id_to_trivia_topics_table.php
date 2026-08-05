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
        Schema::table('trivia_topics', function (Blueprint $table) {
            $table->dropUnique(['key']);
            $table->foreignId('language_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
            $table->unique(['language_id', 'key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trivia_topics', function (Blueprint $table) {
            $table->dropUnique(['language_id', 'key']);
            $table->dropConstrainedForeignId('language_id');
            $table->unique(['key']);
        });
    }
};
