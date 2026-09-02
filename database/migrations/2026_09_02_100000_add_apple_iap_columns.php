<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Apple In-App Purchase alongside Stripe.
 *
 * A subscription row now names its billing provider, and an Apple-billed one
 * carries the originalTransactionId — Apple's stable identifier for the whole
 * subscription lifetime, which is what every App Store Server Notification is
 * keyed by. Gem purchases likewise: an Apple purchase has a transactionId and
 * no Stripe checkout session, so that column loosens to nullable.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->string('provider')->default('stripe')->after('plan_key');
            $table->string('apple_original_transaction_id')->nullable()->unique()->after('stripe_subscription_id');
        });

        Schema::table('gem_purchases', function (Blueprint $table) {
            $table->string('provider')->default('stripe')->after('pack_key');
            $table->string('apple_transaction_id')->nullable()->unique()->after('stripe_checkout_session_id');
            $table->string('stripe_checkout_session_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->dropColumn(['provider', 'apple_original_transaction_id']);
        });

        Schema::table('gem_purchases', function (Blueprint $table) {
            $table->dropColumn(['provider', 'apple_transaction_id']);
        });
    }
};
