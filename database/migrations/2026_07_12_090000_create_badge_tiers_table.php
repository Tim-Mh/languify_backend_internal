<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('badge_tiers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedInteger('gems_reward')->default(0);
            $table->unsignedInteger('xp_reward')->default(0);
            $table->unsignedInteger('hearts_reward')->default(0);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        $now = now();

        DB::table('badge_tiers')->insert([
            ['name' => 'BRONZE', 'gems_reward' => 20, 'xp_reward' => 10, 'hearts_reward' => 1, 'order_number' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SILVER', 'gems_reward' => 50, 'xp_reward' => 25, 'hearts_reward' => 1, 'order_number' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'GOLD', 'gems_reward' => 100, 'xp_reward' => 50, 'hearts_reward' => 2, 'order_number' => 3, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PLATINUM', 'gems_reward' => 200, 'xp_reward' => 100, 'hearts_reward' => 3, 'order_number' => 4, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'LEGENDARY', 'gems_reward' => 500, 'xp_reward' => 250, 'hearts_reward' => 5, 'order_number' => 5, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // badges.tier was a fixed 5-value ENUM — relax it to a plain string so
        // admins can add/rename tiers without a schema change every time.
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE badges MODIFY COLUMN tier VARCHAR(50) NOT NULL');
        }
    }

    public function down(): void
    {
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE badges MODIFY COLUMN tier ENUM('BRONZE', 'SILVER', 'GOLD', 'PLATINUM', 'LEGENDARY') NOT NULL");
        }

        Schema::dropIfExists('badge_tiers');
    }
};
