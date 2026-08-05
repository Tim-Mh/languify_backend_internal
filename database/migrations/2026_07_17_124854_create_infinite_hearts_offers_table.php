<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('infinite_hearts_offers', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title');
            $table->unsignedInteger('minutes');
            $table->unsignedInteger('price_gems');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        DB::table('infinite_hearts_offers')->insert([
            'key' => 'five_minutes', 'title' => '5 Minutes Unlimited Hearts',
            'minutes' => 5, 'price_gems' => 100, 'order_number' => 1,
            'created_at' => now(), 'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infinite_hearts_offers');
    }
};
