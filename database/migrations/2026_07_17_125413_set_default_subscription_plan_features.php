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
        // All three tiers grant the same gameplay perks (enforced in
        // LessonProgressService via User::activeSubscription()); ads are the
        // only thing that differs, and that's a plan_key check on the
        // frontend, not something stored here.
        $sharedFeatures = ['Unlimited Hearts', '+50% Bonus Gems', 'Monthly Streak Freeze'];

        DB::table('subscription_plans')->where('key', 'monthly')->update([
            'features' => json_encode([...$sharedFeatures, 'Ads shown between lessons']),
        ]);

        DB::table('subscription_plans')->where('key', 'yearly')->update([
            'features' => json_encode([...$sharedFeatures, 'No Ads']),
        ]);

        DB::table('subscription_plans')->where('key', 'family')->update([
            'features' => json_encode([...$sharedFeatures, 'No Ads', 'Shared across up to 7 accounts']),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('subscription_plans')->update(['features' => null]);
    }
};
