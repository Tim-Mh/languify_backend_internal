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
            // 'YYYY-MM' of the last month a Monthly/Yearly subscriber's
            // hearts were topped up to their 100/month allowance.
            $table->string('hearts_month', 7)->nullable()->after('hearts_updated_at');
            // Number of streak freezes consumed so far in
            // last_streak_freeze_month (was a boolean-ish "already used"
            // flag; now a count so Family's 3/month can be tracked too).
            $table->unsignedTinyInteger('streak_freeze_count')->default(0)->after('last_streak_freeze_month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn(['hearts_month', 'streak_freeze_count']);
        });
    }
};
