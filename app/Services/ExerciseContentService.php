<?php

namespace App\Services;

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

            return $translations[$languageCode]
                ?? $translations[self::FALLBACK_LANGUAGE]
                ?? reset($translations);
        }

        return array_map(fn (mixed $item) => $this->localize($item, $languageCode), $value);
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
