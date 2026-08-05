<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'avatar_option_id', 'unlocked_at'])]
class UserAvatarUnlock extends Model
{
    protected $casts = [
        'unlocked_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function avatarOption(): BelongsTo
    {
        return $this->belongsTo(AvatarOption::class);
    }
}
