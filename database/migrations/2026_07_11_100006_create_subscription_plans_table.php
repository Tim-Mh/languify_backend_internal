<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title');
            $table->string('description')->nullable();
            $table->json('features')->nullable();
            $table->unsignedInteger('amount_cents');
            $table->enum('interval', ['month', 'year']);
            $table->string('badge_label')->nullable();
            $table->string('savings_label')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order_number')->default(0);
            $table->timestamps();
        });

        $now = now();

        DB::table('subscription_plans')->insert([
            [
                'key' => 'monthly', 'title' => 'Monthly Plan',
                'description' => 'Perfect for short-term goals and quick refreshes.',
                'features' => null, 'amount_cents' => 200, 'interval' => 'month',
                'badge_label' => null, 'savings_label' => null, 'order_number' => 1,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'key' => 'yearly', 'title' => 'Yearly Plan',
                'description' => 'Our most popular choice for dedicated polyglots.',
                'features' => null, 'amount_cents' => 1500, 'interval' => 'year',
                'badge_label' => 'BEST VALUE', 'savings_label' => 'Save 38% compared to monthly', 'order_number' => 2,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'key' => 'family', 'title' => 'Family Plan',
                'description' => 'Up to 7 accounts. Share the joy of learning together.',
                'features' => null, 'amount_cents' => 1900, 'interval' => 'month',
                'badge_label' => null, 'savings_label' => null, 'order_number' => 3,
                'created_at' => $now, 'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_plans');
    }
};
