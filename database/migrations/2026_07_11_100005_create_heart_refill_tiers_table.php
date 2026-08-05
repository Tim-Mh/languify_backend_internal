<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heart_refill_tiers', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->unsignedInteger('hearts');
            $table->unsignedInteger('price_gems');
            $table->string('badge_label')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        $now = now();

        DB::table('heart_refill_tiers')->insert([
            ['key' => 'one', 'title' => '1 Heart', 'subtitle' => 'Instant Refill', 'hearts' => 1, 'price_gems' => 200, 'badge_label' => null, 'order_number' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'three', 'title' => '3 Hearts', 'subtitle' => 'Best Value', 'hearts' => 3, 'price_gems' => 400, 'badge_label' => 'POPULAR', 'order_number' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'full', 'title' => 'Full Refill', 'subtitle' => '5 Hearts', 'hearts' => 5, 'price_gems' => 600, 'badge_label' => null, 'order_number' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('heart_refill_tiers');
    }
};
