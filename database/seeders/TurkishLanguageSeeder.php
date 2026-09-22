<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\AlphabetLetter;
use App\Models\Chapter;
use App\Models\Language;
use Illuminate\Database\Seeder;

/**
 * Turkish, an interface language that is now also a course.
 *
 * `is_learnable` was false while this was interface-only: the UI was fully
 * translated but the course did not exist, and a single `is_active` list feeds
 * both the native and the learning picker, so without the flag the only way to
 * let a Turkish speaker read the app in Turkish was to also offer them an empty
 * Turkish course.
 *
 * It is true now. The course is complete and matches the other six: 41 units,
 * 201 lessons, 2001 exercises across the five chapters, plus the final test.
 *
 * Idempotent — safe to re-run. `is_active` is deliberately absent from the
 * updateOrCreate payload: re-running this seeder must not undo an admin's
 * choice in /admin/language-activation. A fresh row takes the column default
 * (false) and waits to be published there.
 */
class TurkishLanguageSeeder extends Seeder
{
    /**
     * The 29 letters of the Turkish alphabet: character, letter name, example.
     *
     * Latin script with six letters English lacks (ç, ğ, ı, ö, ş, ü) and
     * without q, w or x. Two things worth knowing:
     *
     *  - The dotted/dotless i is a genuine pair, not an accent. `I` is the
     *    capital of `ı`, and `İ` is the capital of `i`. They are stored as
     *    separate letters here because that is what they are.
     *  - No Turkish word begins with `ğ`, so its example word has to contain
     *    the letter rather than start with it. That is not an oversight.
     */
    private const LETTERS = [
        ['A', 'a', 'Armut'],
        ['B', 'be', 'Balık'],
        ['C', 'ce', 'Ceviz'],
        ['Ç', 'çe', 'Çiçek'],
        ['D', 'de', 'Deniz'],
        ['E', 'e', 'Elma'],
        ['F', 'fe', 'Fil'],
        ['G', 'ge', 'Güneş'],
        ['Ğ', 'yumuşak ge', 'Ağaç'],
        ['H', 'he', 'Hava'],
        ['I', 'ı', 'Irmak'],
        ['İ', 'i', 'İnek'],
        ['J', 'je', 'Jeton'],
        ['K', 'ke', 'Kitap'],
        ['L', 'le', 'Limon'],
        ['M', 'me', 'Masa'],
        ['N', 'ne', 'Nehir'],
        ['O', 'o', 'Okul'],
        ['Ö', 'ö', 'Ördek'],
        ['P', 'pe', 'Pencere'],
        ['R', 're', 'Rüzgâr'],
        ['S', 'se', 'Su'],
        ['Ş', 'şe', 'Şeker'],
        ['T', 'te', 'Tavşan'],
        ['U', 'u', 'Uçak'],
        ['Ü', 'ü', 'Üzüm'],
        ['V', 've', 'Vapur'],
        ['Y', 'ye', 'Yıldız'],
        ['Z', 'ze', 'Zaman'],
    ];

    public function run(): void
    {
        $language = Language::updateOrCreate(
            ['code' => 'tr'],
            [
                'name' => 'Turkish',
                'native_name' => 'Türkçe',
                'flag_emoji' => '🇹🇷',
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
        // 'C' = 'Ç', 'G' = 'Ğ', 'I' = 'İ', 'O' = 'Ö', 'S' = 'Ş' and 'U' = 'Ü'
        // as true. Keying on the character therefore matched the base letter
        // and quietly overwrote it, leaving 23 rows instead of 29 with the
        // accented letters' data sitting on the wrong ones. Order numbers are
        // plain integers and cannot collide.
        foreach (self::LETTERS as $index => [$character, $romanization, $exampleWord]) {
            AlphabetLetter::updateOrCreate(
                ['language_id' => $language->id, 'order_number' => $index + 1],
                [
                    'character' => $character,
                    'romanization' => $romanization,
                    'example_word' => $exampleWord,
                    // Latin script needs no grouping; only Japanese and Korean
                    // set this, to split hiragana/katakana and jamo.
                    'script_group' => null,
                ],
            );
        }
    }
}
