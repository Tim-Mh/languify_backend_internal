<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['interstitial_seconds'])]
class AdSetting extends Model
{
    protected function casts(): array
    {
        return [
            'interstitial_seconds' => 'integer',
        ];
    }

    // The one-and-only settings row. Created lazily so the app still works if
    // the seed insert was ever skipped.
    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], ['interstitial_seconds' => 10]);
    }
}
