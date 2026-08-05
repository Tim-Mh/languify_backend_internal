<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'league_tier_id', 'league_points', 'pending_tier_change', 'cohort_group_number', 'week_start_date'])]
class UserLeague extends Model
{
    protected function casts(): array
    {
        return [
            'week_start_date' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function leagueTier(): BelongsTo
    {
        return $this->belongsTo(LeagueTier::class);
    }
}
