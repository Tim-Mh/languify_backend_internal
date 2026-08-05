<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['attribute_type', 'value', 'price_gems', 'is_default', 'order_number'])]
class AvatarOption extends Model
{
    protected $casts = [
        'is_default' => 'boolean',
    ];
}
