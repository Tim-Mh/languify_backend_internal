<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Badges are now claimed manually from the profile (with a reward payout),
     * rather than auto-granted. Clear existing user_badges so every badge a
     * learner already qualifies for shows up as claimable — they then claim it
     * and receive the tier reward, instead of it being silently held.
     */
    public function up(): void
    {
        DB::table('user_badges')->delete();
    }

    public function down(): void
    {
        // Nothing to restore.
    }
};
