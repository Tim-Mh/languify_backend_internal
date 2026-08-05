<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Moves the app off the old manual-renewal model onto real auto-renewing
 * subscriptions.
 *
 * cancel_at_period_end mirrors the identically named flag on the Stripe
 * subscription: false means Stripe will bill again on the renewal date, true
 * means the plan runs out at current_period_end and stops. Access itself keeps
 * being gated purely by current_period_end (see User::activeSubscription), so
 * "cancel at period end" needs no change to the access path at all.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->boolean('cancel_at_period_end')->default(false)->after('status');
            $table->timestamp('canceled_at')->nullable()->after('cancel_at_period_end');
        });

        // Every subscription sold before this migration was created under the
        // manual model, which explicitly set cancel_at_period_end on Stripe
        // right after activation. Backfilling true keeps the local mirror
        // honest about what Stripe will actually do for those rows; the daily
        // subscriptions:sync reconcile will confirm it from Stripe either way.
        DB::table('user_subscriptions')->update(['cancel_at_period_end' => true]);
    }

    public function down(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->dropColumn(['cancel_at_period_end', 'canceled_at']);
        });
    }
};
