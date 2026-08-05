<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Adds the `tr` key to exercise i18n maps, so a learner whose native language
 * is Turkish reads hints in Turkish instead of falling back to English.
 *
 * Translations come from database/data/turkish-glosses.json, keyed by the exact
 * English string. Anything not in that file is left alone and reported, so this
 * can be run repeatedly as the dictionary grows.
 *
 * TWO RULES MAKE THIS SAFE TO RUN PARTIALLY
 *
 * 1. String-valued maps (a word hint, a sentence translation) are independent —
 *    translating one is always an improvement, and an untranslated one still
 *    falls back to English.
 *
 * 2. Array-valued maps are NOT independent. A `translate` exercise stores its
 *    tile bank in `word_bank` and the expected answer in `correct`, as two
 *    separate maps. Give one a `tr` key without the other and the learner is
 *    shown English tiles and graded against a Turkish answer, or the reverse —
 *    strictly worse than the all-English fallback. So an exercise's array maps
 *    are only written when EVERY one of them can be fully translated, and
 *    otherwise the exercise is skipped whole.
 *
 * Rule 2 is also why word-level translation cannot be applied blindly to
 * `correct`: languages tokenise an answer differently (Japanese drops the
 * articles English needs, Korean fuses conjunctions onto the noun). Turkish
 * does the same, so a bank is only emitted when the mapping is one-for-one and
 * every tile is known; anything else needs authoring per sentence.
 */
class TurkishGlossSeeder extends Seeder
{
    private const DICTIONARY = __DIR__.'/../data/turkish-glosses.json';

    public function run(): void
    {
        $raw = json_decode(file_get_contents(self::DICTIONARY), true);
        unset($raw['_readme']);
        $dictionary = $raw;

        $this->command?->info('Dictionary entries: '.count($dictionary));

        $stats = [
            'exercises_touched' => 0,
            'string_maps_written' => 0,
            'string_maps_missing' => 0,
            'array_maps_written' => 0,
            'exercises_array_skipped' => 0,
        ];
        $missing = [];

        Exercise::select('id', 'data')->chunkById(500, function ($rows) use ($dictionary, &$stats, &$missing) {
            foreach ($rows as $exercise) {
                $data = is_string($exercise->data) ? json_decode($exercise->data, true) : $exercise->data;

                if (! is_array($data)) {
                    continue;
                }

                // Pass 1: can every array map in this exercise be translated?
                // Decided before writing anything, so the write is all or nothing.
                $arraysTranslatable = $this->arraysFullyTranslatable($data, $dictionary);

                $changed = false;
                $updated = $this->apply($data, $dictionary, $arraysTranslatable, $changed, $stats, $missing);

                if (! $arraysTranslatable && $this->hasArrayMap($data)) {
                    $stats['exercises_array_skipped']++;
                }

                if ($changed) {
                    // Written straight through the query builder: touching the
                    // model would fire events and updated_at on 60k rows for a
                    // pure data backfill.
                    DB::table('exercises')
                        ->where('id', $exercise->id)
                        ->update(['data' => json_encode($updated, JSON_UNESCAPED_UNICODE)]);
                    $stats['exercises_touched']++;
                }
            }
        });

        foreach ($stats as $key => $value) {
            $this->command?->info(str_pad($key, 26).$value);
        }

        if ($missing) {
            arsort($missing);
            $this->command?->warn('Untranslated distinct strings: '.count($missing));
            $path = __DIR__.'/../data/turkish-glosses-missing.json';
            file_put_contents($path, json_encode(array_keys($missing), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            $this->command?->warn('Written to '.basename($path).' for the next pass.');
        }
    }

    /** True when the value contains at least one array-valued i18n map. */
    private function hasArrayMap(mixed $value): bool
    {
        if (! is_array($value)) {
            return false;
        }

        if (isset($value['i18n']) && is_array($value['i18n'])) {
            return is_array($value['i18n']['en'] ?? null);
        }

        foreach ($value as $item) {
            if ($this->hasArrayMap($item)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Every tile of every array map in this exercise has a translation.
     *
     * @param  array<string, string>  $dictionary
     */
    private function arraysFullyTranslatable(mixed $value, array $dictionary): bool
    {
        if (! is_array($value)) {
            return true;
        }

        if (isset($value['i18n']) && is_array($value['i18n'])) {
            $en = $value['i18n']['en'] ?? null;

            if (! is_array($en)) {
                return true;
            }

            foreach ($en as $tile) {
                if (! is_string($tile) || ! isset($dictionary[$tile])) {
                    return false;
                }
            }

            return true;
        }

        foreach ($value as $item) {
            if (! $this->arraysFullyTranslatable($item, $dictionary)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param  array<string, string>  $dictionary
     * @param  array<string, int>  $stats
     * @param  array<string, int>  $missing
     */
    private function apply(
        mixed $value,
        array $dictionary,
        bool $arraysTranslatable,
        bool &$changed,
        array &$stats,
        array &$missing,
    ): mixed {
        if (! is_array($value)) {
            return $value;
        }

        if (isset($value['i18n']) && is_array($value['i18n'])) {
            $en = $value['i18n']['en'] ?? null;

            // Already done on a previous run.
            if (array_key_exists('tr', $value['i18n'])) {
                return $value;
            }

            if (is_array($en)) {
                if (! $arraysTranslatable) {
                    return $value;
                }

                $value['i18n']['tr'] = array_map(fn (string $tile) => $dictionary[$tile], $en);
                $changed = true;
                $stats['array_maps_written']++;

                return $value;
            }

            if (is_string($en) && $en !== '') {
                if (! isset($dictionary[$en])) {
                    $missing[$en] = ($missing[$en] ?? 0) + 1;
                    $stats['string_maps_missing']++;

                    return $value;
                }

                $value['i18n']['tr'] = $dictionary[$en];
                $changed = true;
                $stats['string_maps_written']++;
            }

            return $value;
        }

        foreach ($value as $key => $item) {
            $value[$key] = $this->apply($item, $dictionary, $arraysTranslatable, $changed, $stats, $missing);
        }

        return $value;
    }
}
