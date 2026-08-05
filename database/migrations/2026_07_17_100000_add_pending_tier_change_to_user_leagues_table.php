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
        Schema::table('user_leagues', function (Blueprint $table) {
            $table->string('pending_tier_change')->nullable()->after('league_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_leagues', function (Blueprint $table) {
            $table->dropColumn('pending_tier_change');
        });
    }
};
