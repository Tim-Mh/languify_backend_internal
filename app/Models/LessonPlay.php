<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * One finished play of a lesson, replays included, for the admin dashboard's
 * lesson counts. user_lesson_completions cannot answer that: it keeps one row
 * per lesson and moves its date on every replay.
 */
#[Fillable(['user_id', 'lesson_id', 'played_at'])]
class LessonPlay extends Model
{
    public $timestamps = false;

    protected function casts(): array
    {
        return ['played_at' => 'datetime'];
    }
}
