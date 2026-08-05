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
        Schema::create('league_tiers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        DB::table('league_tiers')->insert([
            ['name' => 'Bronze', 'order_number' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Silver', 'order_number' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gold', 'order_number' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sapphire', 'order_number' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Diamond', 'order_number' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('league_tiers');
    }
};
