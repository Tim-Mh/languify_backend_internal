<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'key', 'title', 'description', 'requirement_type', 'target_count', 'target_increment',
    'max_target', 'difficulty', 'gems_reward', 'xp_reward', 'is_active', 'order_number',
])]
class Quest extends Model
{
    /**
     * Valid requirement_type values — single source for the admin form's
     * validation. IMPORTANT: every value here MUST have a matching arm in
     * QuestService::todayForUser()'s progress `match`; a value validated here
     * but unhandled there silently computes 0 progress, making the quest
     * impossible to ever complete. Keep the two in lockstep.
     */
    public const REQUIREMENT_TYPES = [
        'lessons_completed', 'xp_earned', 'perfect_lesson', 'units_completed',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
