<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'key', 'category', 'title', 'description', 'tier',
    'requirement_type', 'requirement_value', 'is_active', 'order_number',
])]
class Badge extends Model
{
    public const CATEGORIES = ['streak', 'xp', 'lesson'];

    /**
     * Valid requirement_type values — single source for the admin form's
     * validation. IMPORTANT: every value here MUST have a matching arm in
     * LessonProgressService::checkNewBadges()'s `match`; a value validated
     * here but unhandled there silently evaluates to false, making the badge
     * impossible to ever earn. Keep the two in lockstep.
     */
    public const REQUIREMENT_TYPES = [
        'streak', 'total_xp', 'total_lessons_completed',
        'perfect_lessons', 'units_completed_count', 'max_lessons_in_a_day', 'chapter_complete',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * @return array{gems: int, xp: int, hearts: int}
     */
    public static function tierReward(string $tier): array
    {
        $badgeTier = BadgeTier::where('name', $tier)->first();

        return $badgeTier
            ? ['gems' => $badgeTier->gems_reward, 'xp' => $badgeTier->xp_reward, 'hearts' => $badgeTier->hearts_reward]
            : ['gems' => 0, 'xp' => 0, 'hearts' => 0];
    }
}
