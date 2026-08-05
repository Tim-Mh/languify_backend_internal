<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'skin_color', 'hair', 'hair_color', 'eyes', 'eyebrows',
    'mouth', 'glasses', 'earrings', 'background_color',
])]
class UserAvatar extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
