<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * An optional image an admin uploads for a league. When empty, the league
 * shows the built-in picture for its name, if there is one.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('league_tiers', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('promotion_xp');
        });
    }

    public function down(): void
    {
        Schema::table('league_tiers', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};
