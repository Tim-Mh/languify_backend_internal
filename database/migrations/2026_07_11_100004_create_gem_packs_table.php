<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gem_packs', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title');
            $table->string('description')->nullable();
            $table->unsignedInteger('gems');
            $table->unsignedInteger('amount_cents');
            $table->string('badge_label')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        $now = now();

        DB::table('gem_packs')->insert([
            ['key' => 'basic', 'title' => 'Basic Pack', 'description' => null, 'gems' => 200, 'amount_cents' => 200, 'badge_label' => null, 'order_number' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'adventure', 'title' => 'Adventure Pack', 'description' => null, 'gems' => 400, 'amount_cents' => 400, 'badge_label' => 'MOST POPULAR', 'order_number' => 2, 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'vault', 'title' => 'Vault of Gems', 'description' => null, 'gems' => 700, 'amount_cents' => 2000, 'badge_label' => null, 'order_number' => 3, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('gem_packs');
    }
};
