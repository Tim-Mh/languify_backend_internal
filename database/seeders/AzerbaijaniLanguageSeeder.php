<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\AlphabetLetter;
use App\Models\Chapter;
use App\Models\Language;
use Illuminate\Database\Seeder;

/**
 * Azerbaijani: the language row, its five chapters and its alphabet.
 *
 * Idempotent — safe to re-run. `is_active` is deliberately absent from the
 * updateOrCreate payload: re-running this seeder must not undo an admin's
 * choice in /admin/language-activation. A fresh row takes the column default
 * (false) and waits to be published there.
 */
class AzerbaijaniLanguageSeeder extends Seeder
{
    /**
     * The 32 letters of the Azerbaijani alphabet: character, letter name, example.
     *
     * Latin script, so a learner can already sound the letters out — which is
     * why this language is NOT in Language::NON_LATIN_SCRIPTS and its hints
     * retire normally.
     *
     * Four things worth knowing:
     *
     *  - `Ə ə` is the schwa, the most common vowel in the language and the one
     *    letter with no counterpart in any other course here. It sorts between
     *    E and F, which is where it sits below.
     *  - The dotted/dotless i is a genuine pair, exactly as in Turkish: `I` is
     *    the capital of `ı`, and `İ` is the capital of `i`.
     *  - `Q` and `X` are real letters carrying their own sounds (a hard g, and
     *    the kh of Bach), not the Latin leftovers they are in Turkish, which
     *    has neither.
     *  - No word begins with `ğ`, so its example contains the letter rather
     *    than starting with it. That is not an oversight.
     */
    private const LETTERS = [
        ['A', 'a', 'Alma'],
        ['B', 'be', 'Balıq'],
        ['C', 'ce', 'Cücə'],
        ['Ç', 'çe', 'Çörək'],
        ['D', 'de', 'Dəniz'],
        ['E', 'e', 'Ev'],
        ['Ə', 'ə', 'Ət'],
        ['F', 'fe', 'Fil'],
        ['G', 'ge', 'Gül'],
        ['Ğ', 'ğe', 'Ağac'],
        ['H', 'he', 'Hava'],
        ['X', 'xe', 'Xalça'],
        ['I', 'ı', 'Ilıq'],
        ['İ', 'i', 'İnək'],
        ['J', 'je', 'Jurnal'],
        ['K', 'ke', 'Kitab'],
        ['Q', 'qe', 'Qapı'],
        ['L', 'el', 'Limon'],
        ['M', 'em', 'Masa'],
        ['N', 'en', 'Nar'],
        ['O', 'o', 'Oğlan'],
        ['Ö', 'ö', 'Ördək'],
        ['P', 'pe', 'Pəncərə'],
        ['R', 'er', 'Rəng'],
        ['S', 'se', 'Su'],
        ['Ş', 'şe', 'Şəkər'],
        ['T', 'te', 'Tələbə'],
        ['U', 'u', 'Uşaq'],
        ['Ü', 'ü', 'Üzüm'],
        ['V', 've', 'Vaxt'],
        ['Y', 'ye', 'Yol'],
        ['Z', 'ze', 'Zəng'],
    ];

    public function run(): void
    {
        $language = Language::updateOrCreate(
            ['code' => 'az'],
            [
                'name' => 'Azerbaijani',
                'native_name' => 'Azərbaycan dili',
                'flag_emoji' => '🇦🇿',
                'is_learnable' => true,
            ],
        );

        $chapters = [
            ['key' => ChapterKey::Beginner, 'title' => 'Beginner', 'order' => 1],
            ['key' => ChapterKey::Conversation, 'title' => 'Conversation', 'order' => 2],
            ['key' => ChapterKey::Restaurant, 'title' => 'Restaurant', 'order' => 3],
            ['key' => ChapterKey::Supermarket, 'title' => 'Supermarket', 'order' => 4],
            ['key' => ChapterKey::FinalTest, 'title' => 'Final Test', 'order' => 5],
        ];

        foreach ($chapters as $chapter) {
            Chapter::firstOrCreate(
                ['language_id' => $language->id, 'chapter_key' => $chapter['key']],
                ['title' => $chapter['title'], 'order_number' => $chapter['order']],
            );
        }

        // Matched on order_number, NOT on character. The `character` column is
        // utf8mb4_unicode_ci, which is accent-insensitive: MySQL evaluates
        // 'C' = 'Ç', 'E' = 'Ə', 'G' = 'Ğ', 'I' = 'İ', 'O' = 'Ö', 'S' = 'Ş' and
        // 'U' = 'Ü' as equal. Keying on the character would match the base
        // letter and quietly overwrite it, leaving 25 rows instead of 32.
        // Order numbers are plain integers and cannot collide.
        foreach (self::LETTERS as $index => [$character, $romanization, $exampleWord]) {
            AlphabetLetter::updateOrCreate(
                ['language_id' => $language->id, 'order_number' => $index + 1],
                [
                    'character' => $character,
                    'romanization' => $romanization,
                    'example_word' => $exampleWord,
                    // Latin script needs no grouping; only Japanese and Korean
                    // set this, to split kana and jamo.
                    'script_group' => null,
                ],
            );
        }
    }
}
