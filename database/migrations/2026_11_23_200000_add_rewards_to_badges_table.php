<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Each badge now carries its own reward instead of taking it from its tier.
 * Existing badges start with exactly what their tier paid, so learners see
 * no change until an admin edits a badge.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('badges', function (Blueprint $table) {
            $table->unsignedInteger('gems_reward')->default(0)->after('tier');
            $table->unsignedInteger('xp_reward')->default(0)->after('gems_reward');
            $table->unsignedInteger('hearts_reward')->default(0)->after('xp_reward');
        });

        foreach (DB::table('badge_tiers')->get() as $tier) {
            DB::table('badges')->where('tier', $tier->name)->update([
                'gems_reward' => $tier->gems_reward,
                'xp_reward' => $tier->xp_reward,
                'hearts_reward' => $tier->hearts_reward,
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('badges', function (Blueprint $table) {
            $table->dropColumn(['gems_reward', 'xp_reward', 'hearts_reward']);
        });
    }
};
