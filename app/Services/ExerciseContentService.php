<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

/**
 * Prepares an exercise's `data` for one specific learner, at request time.
 *
 * Two jobs:
 *
 * 1. localize() — exercise content that must be in the learner's NATIVE
 *    language (hover hints, word-bank tiles, the English-side prompt) is
 *    authored as a language map: ['i18n' => ['en' => ..., 'de' => ..., ...]].
 *    This resolves those maps to the learner's own native language, so a
 *    German speaker learning French sees German hints, not English ones.
 *    Course-language content (the French words themselves) is never localized.
 *
 * 2. shuffleChoices() — answer options and word tiles are stored in a fixed
 *    order, which would otherwise let a learner answer by position (and made
 *    tap_word trivial, since its tiles were stored already in the correct
 *    order). Shuffling per request keeps every attempt honest.
 */
class ExerciseContentService
{
    /** Fallback when a translation is missing for the learner's language. */
    private const FALLBACK_LANGUAGE = 'en';

    /**
     * Which key holds the shuffleable choices, per exercise type. The correct
     * answer is always matched by TEXT (never by index), so reordering is safe.
     */
    private const CHOICE_KEYS = [
        'match_pairs' => 'options',
        'multiple_choice' => 'options',
        'fill_blank' => 'options',
        'listen_select' => 'options',
        'translate' => 'word_bank',
        'tap_word' => 'words',
    ];

    /**
     * Resolve every ['i18n' => [...]] map in the data to $languageCode.
     * Walks the whole structure, so it works for any exercise type and for
     * values that are strings OR arrays (e.g. a word bank of tiles).
     */
    public function localize(mixed $value, string $languageCode): mixed
    {
        if (! is_array($value)) {
            return $value;
        }

        if (array_key_exists('i18n', $value) && is_array($value['i18n'])) {
            $translations = $value['i18n'];

            if (array_key_exists($languageCode, $translations)) {
                return $translations[$languageCode];
            }

            if (array_key_exists(self::FALLBACK_LANGUAGE, $translations)) {
                return $translations[self::FALLBACK_LANGUAGE];
            }

            // Last resort: whichever translation sorts first. This is a real
            // failure dressed up as a result — an Arabic speaker learning
            // English was served the German word bank, because the English
            // course's maps never contain 'en' (English is the source), so a
            // missing 'ar' fell straight past both branches above and `de`
            // happened to be first.
            //
            // It still returns something, because a blank tile is worse than a
            // wrong one mid-lesson, but it says so once per language per
            // request so the gap shows up in the log instead of in a
            // screenshot. The cure is always to re-seed the course.
            $this->warnOnce($languageCode, array_keys($translations));

            return reset($translations);
        }

        return array_map(fn (mixed $item) => $this->localize($item, $languageCode), $value);
    }

    /**
     * Languages already reported this request.
     *
     * A lesson resolves thousands of maps, so logging each one would bury the
     * signal in its own noise. One line names the language and what the map
     * actually held, which is all anyone needs to know what to re-seed.
     *
     * @var array<string, true>
     */
    private array $warned = [];

    private function warnOnce(string $languageCode, array $available): void
    {
        if (isset($this->warned[$languageCode])) {
            return;
        }

        $this->warned[$languageCode] = true;

        Log::warning('exercise content has no translation for this language; serving another', [
            'wanted' => $languageCode,
            'available' => $available,
        ]);
    }

    /**
     * Randomise the answer options / word tiles so the correct answer never
     * sits in a predictable place.
     */
    public function shuffleChoices(array $data, string $type): array
    {
        $key = self::CHOICE_KEYS[$type] ?? null;

        if ($key === null || ! isset($data[$key]) || ! is_array($data[$key]) || count($data[$key]) < 2) {
            return $data;
        }

        $choices = array_values($data[$key]);
        shuffle($choices);
        $data[$key] = $choices;

        return $data;
    }
}
