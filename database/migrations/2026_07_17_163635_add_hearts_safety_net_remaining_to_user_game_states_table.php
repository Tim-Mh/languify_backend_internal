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
            // Monthly/Yearly-only "never fully blocked" allowance — the
            // visible heart pool still caps at 5 and refills exactly like
            // the free tier; this separate counter (tracked against the
            // existing hearts_month column) absorbs up to 100 last-heart
            // losses per month instead of letting hearts drop to 0 and lock
            // the user out.
            $table->unsignedSmallInteger('hearts_safety_net_remaining')->default(0)->after('hearts_month');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_game_states', function (Blueprint $table) {
            $table->dropColumn('hearts_safety_net_remaining');
        });
    }
};
