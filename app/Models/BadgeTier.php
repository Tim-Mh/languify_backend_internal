<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * A badge tier is only a name (the badge's look) and a sort position,
 * lowest first. Rewards live on each badge. The leftover reward columns on
 * the table are no longer used.
 */
#[Fillable(['name', 'order_number'])]
class BadgeTier extends Model
{
    /** Tier names, lowest to highest. */
    public static function names(): array
    {
        return static::orderBy('order_number')->orderBy('id')->pluck('name')->all();
    }
}
