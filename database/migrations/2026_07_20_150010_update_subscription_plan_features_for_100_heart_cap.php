<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Reverts the "invisible safety net" copy back to describing a simple
     * visible 100-heart cap, matching LessonProgressService::effectiveMaxHearts().
     */
    public function up(): void
    {
        DB::table('subscription_plans')->where('key', 'monthly')->update([
            'features' => json_encode([
                '100 Max Hearts', '+50% Bonus Gems', '1 Streak Freeze per Month', 'Ads shown between lessons',
            ]),
        ]);

        DB::table('subscription_plans')->where('key', 'yearly')->update([
            'features' => json_encode([
                '100 Max Hearts', '+50% Bonus Gems', '1 Streak Freeze per Month', 'No Ads',
            ]),
        ]);
    }

    public function down(): void
    {
        DB::table('subscription_plans')->where('key', 'monthly')->update([
            'features' => json_encode([
                'Never Locked Out of Hearts (100/Month)', '+50% Bonus Gems', '1 Streak Freeze per Month', 'Ads shown between lessons',
            ]),
        ]);

        DB::table('subscription_plans')->where('key', 'yearly')->update([
            'features' => json_encode([
                'Never Locked Out of Hearts (100/Month)', '+50% Bonus Gems', '1 Streak Freeze per Month', 'No Ads',
            ]),
        ]);
    }
};
