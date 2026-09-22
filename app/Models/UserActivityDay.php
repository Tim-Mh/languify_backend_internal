<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * A day the learner did something, for the Activity Calendar.
 *
 * `activity_date` is the date in the LEARNER'S timezone, the same convention as
 * `user_game_states.last_lesson_date`, so the calendar and the streak agree on
 * where a day ends. See the migration for why this exists rather than the
 * calendar being derived from lesson completions.
 */
#[Fillable(['user_id', 'activity_date'])]
class UserActivityDay extends Model
{
    protected function casts(): array
    {
        return [
            // Y-m-d explicitly, not the bare `date` cast. The bare cast
            // serialises through the connection's datetime format, so a
            // DATE column receives '2026-01-01 00:00:00'. MySQL truncates
            // that and nobody notices; SQLite stores the string verbatim,
            // so the next firstOrCreate's WHERE misses its own row and the
            // insert hits the unique index. That is a 500 on a learner's
            // second lesson of the day, and it is why five LessonProgress
            // tests could not run.
            'activity_date' => 'date:Y-m-d',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
