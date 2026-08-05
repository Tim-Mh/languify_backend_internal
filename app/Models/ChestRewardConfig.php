<?php

namespace App\Models;

use App\Enums\ChestType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'chest_type', 'reference', 'label', 'reward_description', 'badge_key',
    'min_gems', 'max_gems', 'min_xp', 'max_xp', 'min_hearts', 'max_hearts',
    'order_number', 'is_active',
])]
class ChestRewardConfig extends Model
{
    protected $casts = [
        'chest_type' => ChestType::class,
        'is_active' => 'boolean',
    ];
}
