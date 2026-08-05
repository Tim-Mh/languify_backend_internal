<?php

namespace App\Models;

use App\Enums\AdPlacement;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['image_path', 'product_name', 'placement', 'target_url', 'order_number', 'is_active'])]
class AdImage extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'placement' => AdPlacement::class,
        ];
    }

    public function url(): string
    {
        return Storage::disk('public')->url($this->image_path);
    }
}
