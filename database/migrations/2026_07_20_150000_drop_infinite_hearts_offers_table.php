<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The "Infinite Hearts" shop purchase offer is being removed entirely —
     * the underlying buff itself (grantInfiniteHearts() in
     * LessonProgressService) stays, still earned via a perfect trivia score
     * or Family plan's permanent unlimited hearts. Only the gems-purchase
     * catalog entry and its admin CRUD are gone.
     */
    public function up(): void
    {
        Schema::dropIfExists('infinite_hearts_offers');
    }

    public function down(): void
    {
        Schema::create('infinite_hearts_offers', function ($table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title');
            $table->unsignedInteger('minutes');
            $table->unsignedInteger('price_gems');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });
    }
};
