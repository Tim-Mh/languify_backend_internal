<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ad_images', function (Blueprint $table) {
            // Optional click-through destination. Blank = the ad is shown but
            // not clickable.
            $table->string('target_url', 2048)->nullable()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('ad_images', function (Blueprint $table) {
            $table->dropColumn('target_url');
        });
    }
};
