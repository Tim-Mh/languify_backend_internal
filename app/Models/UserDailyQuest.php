<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'quest_id', 'quest_date', 'target_count', 'gems_reward', 'xp_reward', 'progress', 'completed_at', 'claimed_at'])]
class UserDailyQuest extends Model
{
    protected $casts = [
        'quest_date' => 'date',
        'completed_at' => 'datetime',
        'claimed_at' => 'datetime',
    ];

    public function quest(): BelongsTo
    {
        return $this->belongsTo(Quest::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
