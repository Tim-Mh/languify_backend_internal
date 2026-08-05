<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['language_id', 'key', 'title', 'description', 'icon', 'order_number'])]
class TriviaTopic extends Model
{
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(TriviaQuestion::class, 'topic_id');
    }
}
