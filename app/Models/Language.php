<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['code', 'name', 'native_name', 'flag_emoji', 'is_active', 'is_learnable'])]
class Language extends Model
{
    use HasFactory;

    /**
     * Courses written in a script a Latin-alphabet learner cannot sound out.
     * Add a code here when a course's alphabet is the barrier, not its
     * vocabulary.
     */
    private const NON_LATIN_SCRIPTS = ['ja', 'ko'];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_learnable' => 'boolean',
        ];
    }

    /**
     * Whether a learner of this course has to decode an unfamiliar script
     * before they can even read a word tile.
     *
     * Hover hints never fade for these courses. The usual rule retires a
     * word's hint once the learner has demonstrably retained it, which suits
     * French — you can still pronounce "café" after the hint goes. In Japanese
     * or Korean the hint is the only thing making the tile readable at all, so
     * retiring it leaves the learner staring at glyphs with no way back in.
     */
    public function usesNonLatinScript(): bool
    {
        return in_array($this->code, self::NON_LATIN_SCRIPTS, true);
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function exerciseInstructions(): HasMany
    {
        return $this->hasMany(ExerciseInstruction::class);
    }

    public function alphabetLetters(): HasMany
    {
        return $this->hasMany(AlphabetLetter::class);
    }
}
