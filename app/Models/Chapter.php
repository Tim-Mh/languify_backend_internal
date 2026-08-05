<?php

namespace App\Models;

use App\Enums\ChapterKey;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['language_id', 'chapter_key', 'title', 'order_number'])]
class Chapter extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'chapter_key' => ChapterKey::class,
        ];
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
