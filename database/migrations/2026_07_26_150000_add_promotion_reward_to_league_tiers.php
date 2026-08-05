<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Reward granted when a learner is promoted INTO a tier at the weekly
     * rollover (e.g. Bronze -> Silver). Admin-editable per tier; higher tiers
     * pay more. Bronze is the starting tier, so its reward is 0 (nobody is
     * promoted into it).
     */
    public function up(): void
    {
        Schema::table('league_tiers', function (Blueprint $table) {
            $table->unsignedInteger('promotion_gems')->default(0)->after('order_number');
            $table->unsignedInteger('promotion_xp')->default(0)->after('promotion_gems');
        });

        $defaults = [
            'Silver' => ['promotion_gems' => 50, 'promotion_xp' => 25],
            'Gold' => ['promotion_gems' => 100, 'promotion_xp' => 50],
            'Sapphire' => ['promotion_gems' => 200, 'promotion_xp' => 100],
            'Diamond' => ['promotion_gems' => 400, 'promotion_xp' => 200],
        ];
        foreach ($defaults as $name => $reward) {
            DB::table('league_tiers')->where('name', $name)->update($reward);
        }
    }

    public function down(): void
    {
        Schema::table('league_tiers', function (Blueprint $table) {
            $table->dropColumn(['promotion_gems', 'promotion_xp']);
        });
    }
};
