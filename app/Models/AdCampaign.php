<?php

namespace App\Models;

use App\Enums\AdPlacement;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * One advertised product in one placement, holding any number of images.
 */
#[Fillable(['placement', 'product_name', 'link_url', 'is_active'])]
class AdCampaign extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'placement' => AdPlacement::class,
        ];
    }

    public function ads(): HasMany
    {
        return $this->hasMany(Ad::class)->orderBy('position');
    }
}
