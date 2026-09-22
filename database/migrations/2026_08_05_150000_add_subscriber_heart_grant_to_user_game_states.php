<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tracks when a subscriber was last given their monthly hearts.
 *
 * The 100 hearts a paid plan comes with are an allowance, not a ceiling that
 * passive regen keeps topping back up. Before this, 100 was simply the regen
 * cap, so a subscriber who spent three hearts watched them trickle back one
 * every fifteen minutes until they were at 100 again — which makes the
 * allowance meaningless, since it can never actually be spent.
 *
 * Now it is granted once per billing month and spent down. This column is what
 * makes "once per month" enforceable across a monthly plan, a yearly plan and
 * any number of requests in between: the grant is idempotent because it checks
 * this date rather than trusting a webhook to fire exactly once.
 *
 * Nullable, and null means "never granted", so every existing subscriber
 * receives their allowance on the next request rather than having to wait for
 * a renewal that might be eleven months away.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->timestamp('subscriber_hearts_granted_at')->nullable()->after('hearts_updated_at');
        });
    }

    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn('subscriber_hearts_granted_at');
        });
    }
};
