<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\AlphabetLetter;
use App\Models\Chapter;
use App\Models\Language;
use Illuminate\Database\Seeder;

/**
 * Russian: the language row, its five chapters and its alphabet.
 *
 * Idempotent — safe to re-run. `is_active` is deliberately absent from the
 * updateOrCreate payload: re-running this seeder must not undo an admin's
 * choice in /admin/language-activation. A fresh row takes the column default
 * (false) and waits to be published there.
 */
class RussianLanguageSeeder extends Seeder
{
    /**
     * The 33 letters of the Russian alphabet: character, romanization, example.
     *
     * The romanization is the letter's SOUND rather than its Russian name
     * ("v", not "ve"), because a learner who cannot read Cyrillic needs to know
     * what the letter says. It is also what the alphabet screen indexes its
     * headings on, and sounds group usefully where names would not.
     *
     * Three letters need explaining:
     *
     *  - Ъ and Ь are signs, not sounds. They harden or soften the consonant
     *    before them and are never pronounced alone, so their romanization
     *    says what they are instead of inventing a sound for them.
     *  - Ы has no English equivalent and never begins a word, so its example
     *    contains the letter rather than starting with it. Ъ and Ь are the
     *    same. That is not an oversight.
     */
    private const LETTERS = [
        ['А', 'a', 'Арбуз'],
        ['Б', 'b', 'Банан'],
        ['В', 'v', 'Вода'],
        ['Г', 'g', 'Город'],
        ['Д', 'd', 'Дом'],
        ['Е', 'ye', 'Ель'],
        ['Ё', 'yo', 'Ёж'],
        ['Ж', 'zh', 'Жираф'],
        ['З', 'z', 'Зима'],
        ['И', 'i', 'Игра'],
        ['Й', 'y', 'Йогурт'],
        ['К', 'k', 'Книга'],
        ['Л', 'l', 'Лампа'],
        ['М', 'm', 'Море'],
        ['Н', 'n', 'Небо'],
        ['О', 'o', 'Окно'],
        ['П', 'p', 'Парк'],
        ['Р', 'r', 'Река'],
        ['С', 's', 'Солнце'],
        ['Т', 't', 'Театр'],
        ['У', 'u', 'Утро'],
        ['Ф', 'f', 'Фрукт'],
        ['Х', 'kh', 'Хлеб'],
        ['Ц', 'ts', 'Цветок'],
        ['Ч', 'ch', 'Чай'],
        ['Ш', 'sh', 'Школа'],
        ['Щ', 'shch', 'Щенок'],
        ['Ъ', 'hard sign', 'Подъезд'],
        ['Ы', 'y', 'Сыр'],
        ['Ь', 'soft sign', 'Соль'],
        ['Э', 'e', 'Этаж'],
        ['Ю', 'yu', 'Юг'],
        ['Я', 'ya', 'Яблоко'],
    ];

    public function run(): void
    {
        $language = Language::updateOrCreate(
            ['code' => 'ru'],
            [
                'name' => 'Russian',
                'native_name' => 'Русский',
                'flag_emoji' => '🇷🇺',
                // The course is complete and matches the other seven: 41 units,
                // 201 lessons, 2001 exercises across the five chapters, plus the
                // final test. `is_active` stays out of this payload so publishing
                // remains the admin's call in /admin/language-activation.
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

        // Matched on order_number, NOT on character, for the same reason as
        // Turkish: the `character` column collates case- and accent-
        // insensitively, so 'Е' = 'Ё' and 'И' = 'Й' compare equal in MySQL and
        // keying on the character would silently overwrite the base letter.
        // Order numbers are plain integers and cannot collide.
        foreach (self::LETTERS as $index => [$character, $romanization, $exampleWord]) {
            AlphabetLetter::updateOrCreate(
                ['language_id' => $language->id, 'order_number' => $index + 1],
                [
                    'character' => $character,
                    'romanization' => $romanization,
                    'example_word' => $exampleWord,
                    // Cyrillic is one script with no sub-alphabets; only
                    // Japanese and Korean set this, to split kana and jamo.
                    'script_group' => null,
                ],
            );
        }
    }
}
