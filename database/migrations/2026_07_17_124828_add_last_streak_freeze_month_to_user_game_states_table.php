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
            // 'YYYY-MM' of the last calendar month a subscriber's streak
            // freeze was consumed — caps it at one use per month.
            $table->string('last_streak_freeze_month', 7)->nullable()->after('infinite_hearts_until');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn('last_streak_freeze_month');
        });
    }
};
