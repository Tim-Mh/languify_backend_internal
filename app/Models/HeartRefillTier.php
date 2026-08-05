<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['key', 'title', 'subtitle', 'hearts', 'price_gems', 'badge_label', 'is_active', 'order_number'])]
class HeartRefillTier extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
