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
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn('streak_freeze_available');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->boolean('streak_freeze_available')->default(false)->after('units_completed_count');
        });
    }
};
