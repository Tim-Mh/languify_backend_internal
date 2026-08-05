<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'gems_reward', 'xp_reward', 'hearts_reward', 'order_number'])]
class BadgeTier extends Model
{
    //
}
