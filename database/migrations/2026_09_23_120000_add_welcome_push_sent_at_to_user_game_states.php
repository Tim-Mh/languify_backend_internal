<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Marks that a learner has already had the one-off welcome push.
 *
 * A durable column rather than "has no other marker", because the sweep runs
 * every five minutes and would otherwise resend on every pass. Deleting the
 * device token on sign-out must not reset it either: signing back in is not a
 * new welcome.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->timestamp('welcome_push_sent_at')->nullable()->after('setup_nudge_sent_at');
        });
    }

    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn('welcome_push_sent_at');
        });
    }
};
