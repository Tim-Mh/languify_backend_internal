<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Records the amount actually charged for each subscription payment, so admin
 * revenue reflects REAL cumulative income (every purchase AND every renewal)
 * rather than a live "active subscriptions x current price" snapshot that
 * ignored renewals and shrank whenever a plan expired.
 *
 * Each checkout (initial or renewal) already creates its own user_subscriptions
 * row — see StripeService::activateSubscriptionFromSession — so stamping the
 * charge onto each row and summing across paid rows yields accurate lifetime
 * revenue, immune to later admin price edits.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->unsignedInteger('amount_cents')->nullable()->after('plan_key');
        });

        // Backfill existing rows from their plan's current price so historical
        // revenue isn't lost when the dashboard switches to summing this column.
        // A correlated subquery rather than MySQL's UPDATE…JOIN, because this
        // also has to run on the sqlite database the test suite migrates.
        DB::statement(<<<'SQL'
            UPDATE user_subscriptions
            SET amount_cents = (
                SELECT sp.amount_cents FROM subscription_plans sp
                WHERE sp.key = user_subscriptions.plan_key
            )
            WHERE amount_cents IS NULL
        SQL);
    }

    public function down(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->dropColumn('amount_cents');
        });
    }
};
