<?php

namespace App\Models;

use App\Enums\ChestType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'chest_type', 'reference', 'gems_awarded', 'xp_awarded', 'hearts_awarded', 'claimed_at'])]
class ChestClaim extends Model
{
    protected function casts(): array
    {
        return [
            'chest_type' => ChestType::class,
            'claimed_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
