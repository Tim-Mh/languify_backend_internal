<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Fillable(['name', 'order_number', 'promotion_gems', 'promotion_xp', 'image_path'])]
class LeagueTier extends Model
{
    /**
     * The image an admin uploaded for this league, else the built-in
     * picture in public/images/leagues found by its lowercase name
     * (gold.png for Gold), else null.
     */
    public function imageUrl(): ?string
    {
        if ($this->image_path) {
            return Storage::disk('public')->url($this->image_path);
        }

        $slug = Str::slug((string) $this->name);

        if ($slug === '') {
            return null;
        }

        foreach (['webp', 'png'] as $ext) {
            $path = "images/leagues/{$slug}.{$ext}";

            if (is_file(public_path($path))) {
                return asset($path);
            }
        }

        return null;
    }
}
