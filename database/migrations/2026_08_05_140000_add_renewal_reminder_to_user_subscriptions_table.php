<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tracks which billing period the "your plan renews soon" push was sent for,
 * so one reminder goes out per yearly cycle: the stored date IS the period
 * end it warned about, and a later cycle has a later period end.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->date('renewal_reminder_sent_for')->nullable()->after('cancel_at_period_end');
        });
    }

    public function down(): void
    {
        Schema::table('user_subscriptions', function (Blueprint $table) {
            $table->dropColumn('renewal_reminder_sent_for');
        });
    }
};
