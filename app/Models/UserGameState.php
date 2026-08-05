<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'total_xp', 'today_xp', 'today_date', 'streak', 'longest_streak',
    'last_lesson_date', 'lessons_today', 'lessons_mastered_today', 'max_lessons_in_a_day', 'total_lessons_completed',
    'perfect_lessons', 'units_completed_count',
    'daily_chest_claimed_at', 'gems', 'hearts', 'hearts_updated_at',
    'infinite_hearts_until', 'last_streak_freeze_month', 'streak_freeze_count', 'weekly_league_xp',
    'streak_broken_notified_date', 'last_lesson_reminder_date', 'last_inactivity_stage_notified',
    'last_motivation_notified_week', 'quest_difficulty_level',
])]
class UserGameState extends Model
{
    /**
     * Mirrors the migration's column defaults. Eloquent does NOT re-fetch
     * DB-applied defaults into the in-memory model after an insert, so
     * relying on the DB alone leaves fresh instances with null attributes
     * until the next full reload — set them here instead so every code path
     * (firstOrCreate, new, etc.) sees the correct starting values immediately.
     */
    protected $attributes = [
        'total_xp' => 0,
        'today_xp' => 0,
        'streak' => 0,
        'longest_streak' => 0,
        'lessons_today' => 0,
        'lessons_mastered_today' => 0,
        'max_lessons_in_a_day' => 0,
        'total_lessons_completed' => 0,
        'perfect_lessons' => 0,
        'units_completed_count' => 0,
        'gems' => 0,
        'hearts' => 5,
        'weekly_league_xp' => 0,
        'quest_difficulty_level' => 1,
    ];

    protected function casts(): array
    {
        return [
            'today_date' => 'date',
            'last_lesson_date' => 'date',
            'daily_chest_claimed_at' => 'datetime',
            'hearts_updated_at' => 'datetime',
            'infinite_hearts_until' => 'datetime',
            'streak_broken_notified_date' => 'date',
            'last_lesson_reminder_date' => 'date',
            'last_motivation_notified_week' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
