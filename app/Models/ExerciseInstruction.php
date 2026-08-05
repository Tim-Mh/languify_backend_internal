<?php

namespace App\Models;

use App\Enums\ExerciseType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['exercise_type', 'language_id', 'template', 'fallback_template'])]
class ExerciseInstruction extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'exercise_type' => ExerciseType::class,
        ];
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
