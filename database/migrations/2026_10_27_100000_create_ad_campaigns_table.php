<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Ads grouped by product. An admin enters the product name, link and
 * placement once and uploads many images for it; each image is one ad.
 *
 * Replaces the flat `ad_images` table, which is left in place (unused) rather
 * than converted: the admin starts the new system fresh.
 */
return new class extends Migration
{
    public function up(): void
    {
        // One product in one placement. The same product in two placements is
        // two campaigns, because each placement wants a differently sized image.
        Schema::create('ad_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('placement', 32);
            $table->string('product_name', 120);
            $table->string('link_url', 2048);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['placement', 'is_active']);
        });

        // One image of a campaign.
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_campaign_id')->constrained()->cascadeOnDelete();
            $table->string('image_path');
            $table->string('image_alt')->nullable();
            $table->unsignedInteger('position');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Append-only view/click log. The placement is copied from the campaign
        // so the stats page can filter without a join.
        Schema::create('ad_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_id')->constrained()->cascadeOnDelete();
            $table->string('type', 10);
            $table->string('placement', 32);
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('created_at')->useCurrent();

            $table->index(['ad_id', 'type', 'created_at']);
            $table->index(['placement', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_events');
        Schema::dropIfExists('ads');
        Schema::dropIfExists('ad_campaigns');
    }
};
