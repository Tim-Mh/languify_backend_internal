<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\AlphabetLetter;
use App\Models\Chapter;
use App\Models\Language;
use Illuminate\Database\Seeder;

/**
 * Arabic: the language row, its five chapters and its alphabet.
 *
 * Idempotent — safe to re-run. `is_active` is deliberately absent from the
 * updateOrCreate payload: re-running this seeder must not undo an admin's
 * choice in /admin/language-activation. A fresh row takes the column default
 * (false) and waits to be published there.
 */
class ArabicLanguageSeeder extends Seeder
{
    /**
     * The 28 letters of the Arabic alphabet: character, romanization, example.
     *
     * Two things about this alphabet that the other eight do not have:
     *
     *  - Arabic is written right to left, and each letter takes a different
     *    shape depending on whether it starts, sits inside, or ends a word.
     *    The characters below are the ISOLATED forms, which is what an
     *    alphabet chart shows and what a learner needs to recognise first.
     *  - There are no capitals, so nothing here is title-cased. Code that
     *    upper-cases a first letter is a no-op on Arabic rather than a bug.
     *
     * The romanization is the letter's sound rather than its Arabic name
     * ("b", not "bāʼ"), matching Russian: a learner who cannot read the script
     * needs to know what the letter says, and the alphabet screen indexes its
     * headings on this.
     */
    private const LETTERS = [
        ['ا', 'a', 'أسد'],
        ['ب', 'b', 'باب'],
        ['ت', 't', 'تفاح'],
        ['ث', 'th', 'ثعلب'],
        ['ج', 'j', 'جمل'],
        ['ح', 'h', 'حليب'],
        ['خ', 'kh', 'خبز'],
        ['د', 'd', 'دار'],
        ['ذ', 'dh', 'ذهب'],
        ['ر', 'r', 'رجل'],
        ['ز', 'z', 'زهرة'],
        ['س', 's', 'سمك'],
        ['ش', 'sh', 'شمس'],
        ['ص', 'sd', 'صديق'],
        ['ض', 'dd', 'ضوء'],
        ['ط', 'tt', 'طاولة'],
        ['ظ', 'zz', 'ظل'],
        ['ع', 'aa', 'عين'],
        ['غ', 'gh', 'غرفة'],
        ['ف', 'f', 'فندق'],
        ['ق', 'q', 'قلم'],
        ['ك', 'k', 'كتاب'],
        ['ل', 'l', 'ليمون'],
        ['م', 'm', 'ماء'],
        ['ن', 'n', 'نجم'],
        ['ه', 'h', 'هاتف'],
        ['و', 'w', 'وردة'],
        ['ي', 'y', 'يد'],
    ];

    public function run(): void
    {
        $language = Language::updateOrCreate(
            ['code' => 'ar'],
            [
                'name' => 'Arabic',
                'native_name' => 'العربية',
                'flag_emoji' => '🇸🇦',
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
        // Turkish and Russian: the `character` column collates
        // accent-insensitively, and Arabic has several letters that differ only
        // by their dots (ب ت ث, ج ح خ, د ذ, ر ز, س ش, ص ض, ط ظ, ع غ). Keying on
        // the character would collapse those onto each other. Order numbers are
        // plain integers and cannot collide.
        foreach (self::LETTERS as $index => [$character, $romanization, $exampleWord]) {
            AlphabetLetter::updateOrCreate(
                ['language_id' => $language->id, 'order_number' => $index + 1],
                [
                    'character' => $character,
                    'romanization' => $romanization,
                    'example_word' => $exampleWord,
                    // One script with no sub-alphabets; only Japanese and
                    // Korean set this, to split kana and jamo.
                    'script_group' => null,
                ],
            );
        }
    }
}
