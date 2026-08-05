<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chest_reward_configs', function (Blueprint $table) {
            $table->id();
            $table->enum('chest_type', ['daily', 'streak', 'unit_bonus']);
            $table->string('reference')->nullable();
            $table->string('label');
            $table->string('reward_description')->nullable();
            $table->string('badge_key')->nullable();
            $table->unsignedInteger('min_gems')->default(0);
            $table->unsignedInteger('max_gems')->default(0);
            $table->unsignedInteger('min_xp')->default(0);
            $table->unsignedInteger('max_xp')->default(0);
            $table->unsignedInteger('min_hearts')->default(0);
            $table->unsignedInteger('max_hearts')->default(0);
            $table->unsignedInteger('order_number')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['chest_type', 'reference']);
        });

        $now = now();

        DB::table('chest_reward_configs')->insert([
            ['chest_type' => 'daily', 'reference' => null, 'label' => 'Daily Chest', 'reward_description' => null, 'badge_key' => null, 'min_gems' => 20, 'max_gems' => 30, 'min_xp' => 0, 'max_xp' => 0, 'min_hearts' => 0, 'max_hearts' => 0, 'order_number' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['chest_type' => 'unit_bonus', 'reference' => null, 'label' => 'Unit Bonus Chest', 'reward_description' => null, 'badge_key' => null, 'min_gems' => 20, 'max_gems' => 59, 'min_xp' => 10, 'max_xp' => 29, 'min_hearts' => 1, 'max_hearts' => 1, 'order_number' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['chest_type' => 'streak', 'reference' => '3', 'label' => '3-Day Streak', 'reward_description' => 'Badge on profile', 'badge_key' => 'streak-3', 'min_gems' => 0, 'max_gems' => 0, 'min_xp' => 0, 'max_xp' => 0, 'min_hearts' => 0, 'max_hearts' => 0, 'order_number' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['chest_type' => 'streak', 'reference' => '7', 'label' => '7-Day Streak', 'reward_description' => 'Badge + Gems', 'badge_key' => 'streak-7', 'min_gems' => 50, 'max_gems' => 50, 'min_xp' => 0, 'max_xp' => 0, 'min_hearts' => 0, 'max_hearts' => 0, 'order_number' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['chest_type' => 'streak', 'reference' => '30', 'label' => '30-Day Streak', 'reward_description' => 'Badge + Gems + Chest', 'badge_key' => 'streak-30', 'min_gems' => 150, 'max_gems' => 150, 'min_xp' => 0, 'max_xp' => 0, 'min_hearts' => 0, 'max_hearts' => 0, 'order_number' => 5, 'created_at' => $now, 'updated_at' => $now],
            ['chest_type' => 'streak', 'reference' => '100', 'label' => '100-Day Streak', 'reward_description' => 'Badge + Big Gem reward', 'badge_key' => 'streak-100', 'min_gems' => 500, 'max_gems' => 500, 'min_xp' => 0, 'max_xp' => 0, 'min_hearts' => 0, 'max_hearts' => 0, 'order_number' => 6, 'created_at' => $now, 'updated_at' => $now],
            ['chest_type' => 'streak', 'reference' => '365', 'label' => '365-Day Streak', 'reward_description' => 'Special badge + Huge reward', 'badge_key' => 'streak-365', 'min_gems' => 2000, 'max_gems' => 2000, 'min_xp' => 0, 'max_xp' => 0, 'min_hearts' => 0, 'max_hearts' => 0, 'order_number' => 7, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('chest_reward_configs');
    }
};
