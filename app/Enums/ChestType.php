<?php

namespace App\Enums;

enum ChestType: string
{
    case Daily = 'daily';
    case Streak = 'streak';
    case UnitBonus = 'unit_bonus';
}
