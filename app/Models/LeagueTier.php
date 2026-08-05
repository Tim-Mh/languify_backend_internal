<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'order_number', 'promotion_gems', 'promotion_xp'])]
class LeagueTier extends Model
{
    //
}
