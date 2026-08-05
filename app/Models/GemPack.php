<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['key', 'title', 'description', 'gems', 'amount_cents', 'badge_label', 'is_active', 'order_number'])]
class GemPack extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
