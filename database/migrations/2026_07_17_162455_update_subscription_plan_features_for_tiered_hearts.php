<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('subscription_plans')->where('key', 'monthly')->update([
            'features' => json_encode([
                '100 Hearts per Month', '+50% Bonus Gems', '1 Streak Freeze per Month', 'Ads shown between lessons',
            ]),
        ]);

        DB::table('subscription_plans')->where('key', 'yearly')->update([
            'features' => json_encode([
                '100 Hearts per Month', '+50% Bonus Gems', '1 Streak Freeze per Month', 'No Ads',
            ]),
        ]);

        DB::table('subscription_plans')->where('key', 'family')->update([
            'features' => json_encode([
                'Unlimited Hearts', '+50% Bonus Gems', '3 Streak Freezes per Month (per account)', 'No Ads', 'Shared across up to 5 accounts',
            ]),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('subscription_plans')->where('key', 'monthly')->update([
            'features' => json_encode(['Unlimited Hearts', '+50% Bonus Gems', 'Monthly Streak Freeze', 'Ads shown between lessons']),
        ]);

        DB::table('subscription_plans')->where('key', 'yearly')->update([
            'features' => json_encode(['Unlimited Hearts', '+50% Bonus Gems', 'Monthly Streak Freeze', 'No Ads']),
        ]);

        DB::table('subscription_plans')->where('key', 'family')->update([
            'features' => json_encode(['Unlimited Hearts', '+50% Bonus Gems', 'Monthly Streak Freeze', 'No Ads', 'Shared across up to 5 accounts']),
        ]);
    }
};
