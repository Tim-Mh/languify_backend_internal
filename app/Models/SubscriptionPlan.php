<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'key', 'title', 'description', 'features', 'amount_cents', 'interval',
    'badge_label', 'savings_label', 'is_active', 'order_number',
])]
class SubscriptionPlan extends Model
{
    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];
}
