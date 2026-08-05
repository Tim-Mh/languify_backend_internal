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
        DB::table('subscription_plans')->where('key', 'family')->update([
            'description' => 'Up to 5 accounts. Share the joy of learning together.',
            'features' => json_encode(['Unlimited Hearts', '+50% Bonus Gems', 'Monthly Streak Freeze', 'No Ads', 'Shared across up to 5 accounts']),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('subscription_plans')->where('key', 'family')->update([
            'description' => 'Up to 7 accounts. Share the joy of learning together.',
            'features' => json_encode(['Unlimited Hearts', '+50% Bonus Gems', 'Monthly Streak Freeze', 'No Ads', 'Shared across up to 7 accounts']),
        ]);
    }
};
