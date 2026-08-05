<?php

namespace App\Models;

use App\Enums\ExerciseType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['lesson_id', 'type', 'data', 'order_number', 'session_number'])]
class Exercise extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'type' => ExerciseType::class,
            'data' => 'array',
        ];
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function summaryText(): string
    {
        return match ($this->type) {
            ExerciseType::MatchPairs => $this->plainText($this->data['word'] ?? ''),
            ExerciseType::FillBlank => $this->plainText($this->data['sentence'] ?? ''),
            ExerciseType::TapWord => $this->plainText($this->data['target_sentence'] ?? ''),
            ExerciseType::ListenSelect => $this->plainText($this->data['audio_text'] ?? ''),
            ExerciseType::MultipleChoice => $this->plainText($this->data['word'] ?? $this->data['question'] ?? ''),
            ExerciseType::ParagraphTranslation => $this->plainText($this->data['reference_translation'] ?? ''),
            ExerciseType::Translate => implode(' ', array_map(
                fn (array $word) => $this->plainText($word['text'] ?? ''),
                $this->data['prompt_words'] ?? [],
            )),
            // Never let a newly-added exercise type blow up the admin content
            // tree with an UnhandledMatchError before its arm is written.
            default => '',
        };
    }

    /**
     * A field may hold a plain string or an ['i18n' => [lang => text]] map that
     * ExerciseContentService normally resolves per learner. The admin panel has
     * no learner, so fall back to English for the label rather than casting the
     * map to the string "Array".
     */
    private function plainText(mixed $value): string
    {
        if (is_array($value)) {
            $translations = $value['i18n'] ?? $value;

            $value = is_array($translations)
                ? ($translations['en'] ?? (is_array(reset($translations)) ? '' : reset($translations)))
                : $translations;
        }

        return is_scalar($value) ? (string) $value : '';
    }

    /**
     * Resolve this exercise's instruction template for the given native/UI
     * language, interpolating {placeholder} tokens from the exercise's own
     * data (which stays in the learning language). Returns null if no
     * instruction template has been authored for this (type, language) pair.
     *
     * If the primary template references a placeholder this exercise's data
     * doesn't have (e.g. a grammar-only multiple_choice exercise with no
     * "word" field), falls back to the instruction's fallback_template
     * instead of leaving a literal unresolved "{word}" in the output.
     */
    public function resolvedInstructionFor(Language $nativeLanguage): ?string
    {
        $instruction = ExerciseInstruction::where('exercise_type', $this->type)
            ->where('language_id', $nativeLanguage->id)
            ->first(['template', 'fallback_template']);

        return $this->resolveInstruction($instruction);
    }

    /**
     * Interpolation-only variant of resolvedInstructionFor() that takes an
     * already-loaded instruction row instead of querying for it — lets a
     * caller preload the whole (exercise_type → instruction) map for one
     * language in a single query and avoid the per-exercise N+1 when
     * rendering a lesson's exercises. Pass null when no template exists for
     * this exercise's (type, language) pair.
     */
    public function resolveInstruction(?ExerciseInstruction $instruction): ?string
    {
        if ($instruction === null) {
            return null;
        }

        $template = $instruction->template;

        preg_match_all('/\{(\w+)\}/', $template, $placeholders);
        $isSatisfiable = collect($placeholders[1])->every(fn (string $key) => array_key_exists($key, $this->data));

        if (! $isSatisfiable) {
            if ($instruction->fallback_template === null) {
                return null;
            }

            $template = $instruction->fallback_template;
        }

        return preg_replace_callback('/\{(\w+)\}/', function (array $matches): string {
            return (string) ($this->data[$matches[1]] ?? $matches[0]);
        }, $template);
    }
}
