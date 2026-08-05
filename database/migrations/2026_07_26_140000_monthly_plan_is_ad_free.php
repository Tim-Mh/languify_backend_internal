<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Ad-free is now a perk of every paid plan, including Monthly. Update the
     * Monthly plan's marketing feature list accordingly — it used to advertise
     * "Ads shown between lessons".
     */
    public function up(): void
    {
        $plan = DB::table('subscription_plans')->where('key', 'monthly')->first();
        if (! $plan) {
            return;
        }

        $features = json_decode($plan->features ?? '[]', true) ?: [];
        $features = array_values(array_filter(
            $features,
            fn ($f) => ! str_contains(strtolower((string) $f), 'ad'),
        ));
        if (! in_array('No Ads', $features, true)) {
            $features[] = 'No Ads';
        }

        DB::table('subscription_plans')->where('key', 'monthly')->update([
            'features' => json_encode($features),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        // Marketing copy only; nothing to reverse.
    }
};
