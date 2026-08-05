<?php

use App\Models\Badge;
use App\Models\UserBadge;
use App\Models\UserGameState;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Badges are normally awarded lazily (on lesson completion). After resetting
     * the badge set, every learner who ALREADY meets a threshold should see that
     * badge immediately, not only after their next lesson — so grant, right now,
     * every badge each learner already qualifies for based on their current
     * game state. Idempotent: skips badges already earned.
     */
    public function up(): void
    {
        $badges = Badge::where('is_active', true)->get();

        UserGameState::query()->with('user')->chunkById(200, function ($states) use ($badges) {
            foreach ($states as $state) {
                $earned = UserBadge::where('user_id', $state->user_id)->pluck('badge_key')->flip();

                foreach ($badges as $badge) {
                    if ($earned->has($badge->key)) {
                        continue;
                    }

                    $qualifies = match ($badge->requirement_type) {
                        'streak' => $state->streak >= $badge->requirement_value,
                        'total_xp' => $state->total_xp >= $badge->requirement_value,
                        'total_lessons_completed' => $state->total_lessons_completed >= $badge->requirement_value,
                        default => false,
                    };

                    if ($qualifies) {
                        UserBadge::create([
                            'user_id' => $state->user_id,
                            'badge_key' => $badge->key,
                            'earned_at' => now(),
                        ]);
                    }
                }
            }
        });
    }

    public function down(): void
    {
        // Retroactive grant; nothing to reverse.
    }
};
