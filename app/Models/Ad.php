<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 * One image of an ad campaign. Each image is shown as its own ad.
 */
#[Fillable(['ad_campaign_id', 'image_path', 'image_alt', 'position', 'is_active'])]
class Ad extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(AdCampaign::class, 'ad_campaign_id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(AdEvent::class);
    }

    public function url(): string
    {
        return Storage::disk('public')->url($this->image_path);
    }
}
