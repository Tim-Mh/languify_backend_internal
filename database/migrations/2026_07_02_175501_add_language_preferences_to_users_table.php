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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('native_language_id')->nullable()->after('role')->constrained('languages')->nullOnDelete();
            $table->foreignId('learning_language_id')->nullable()->after('native_language_id')->constrained('languages')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('native_language_id');
            $table->dropConstrainedForeignId('learning_language_id');
        });
    }
};
