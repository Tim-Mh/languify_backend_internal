<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'language_id',
    'word',
    'strength',
    'times_seen',
    'times_correct',
    'consecutive_correct',
    'half_life_minutes',
    'last_seen_at',
    'due_at',
])]
class UserWordStrength extends Model
{
    protected function casts(): array
    {
        return [
            'strength' => 'integer',
            'times_seen' => 'integer',
            'times_correct' => 'integer',
            'consecutive_correct' => 'integer',
            'half_life_minutes' => 'integer',
            'last_seen_at' => 'datetime',
            'due_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
