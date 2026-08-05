<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['topic_id', 'question', 'options', 'correct_index', 'order_number'])]
class TriviaQuestion extends Model
{
    protected function casts(): array
    {
        return [
            'options' => 'array',
        ];
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(TriviaTopic::class, 'topic_id');
    }

    public function isCorrect(int $selectedIndex): bool
    {
        return $this->correct_index === $selectedIndex;
    }
}
