<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'pack_key', 'gems_credited', 'amount_cents', 'currency',
    'stripe_checkout_session_id', 'status',
])]
class GemPurchase extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
