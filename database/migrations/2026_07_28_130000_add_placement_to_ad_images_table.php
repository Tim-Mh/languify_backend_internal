<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Splits the single shared creative pool into three independently managed
 * placements: the two home-sidebar slots and the post-lesson interstitial.
 *
 * Separate pools are what makes "the two home cards always show different ads"
 * true by construction rather than by client-side juggling, and they give the
 * admin explicit control over what appears where.
 *
 * Existing rows are spread across the home slots in display order, so the
 * sidebar keeps working immediately after deploying. The interstitial pool
 * starts empty on purpose: assigning someone else's creative to it would be a
 * guess, and an empty pool simply means no interstitial is shown.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ad_images', function (Blueprint $table) {
            $table->enum('placement', ['home_primary', 'home_secondary', 'lesson_complete'])
                ->default('home_primary')
                ->after('product_name')
                ->index();
        });

        // Alternate existing creatives between the two home slots, in the order
        // the admin already put them in, so both slots have something to show.
        $ids = DB::table('ad_images')->orderBy('order_number')->orderBy('id')->pluck('id');

        foreach ($ids as $index => $id) {
            DB::table('ad_images')->where('id', $id)->update([
                'placement' => $index % 2 === 0 ? 'home_primary' : 'home_secondary',
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('ad_images', function (Blueprint $table) {
            $table->dropIndex(['placement']);
            $table->dropColumn('placement');
        });
    }
};
