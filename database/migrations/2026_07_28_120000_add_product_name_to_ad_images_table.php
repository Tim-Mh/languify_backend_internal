<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * The sidebar now shows two ad slots at once, each captioned with what is being
 * advertised, so a creative needs a short product name to sit under its image.
 *
 * Nullable on purpose: existing creatives have no name, and an ad without one
 * should still render (just as an image), rather than blocking the admin from
 * saving until every old row is edited.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ad_images', function (Blueprint $table) {
            $table->string('product_name')->nullable()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('ad_images', function (Blueprint $table) {
            $table->dropColumn('product_name');
        });
    }
};
