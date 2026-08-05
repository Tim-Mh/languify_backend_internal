<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Illuminate\Database\Seeder;

class NewLanguagesSetupSeeder extends Seeder
{
    /**
     * Creates the Language rows and the 5-chapter scaffolding (same
     * chapter_key/title/order_number as English) for each new learning
     * language, ahead of the per-unit translation workflow. Kept as a
     * separate, single-run step to avoid concurrent agents racing to
     * create the same chapter rows.
     */
    public function run(): void
    {
        $languages = [
            ['code' => 'es', 'name' => 'Spanish', 'native_name' => 'Español', 'flag_emoji' => '🇪🇸'],
            ['code' => 'de', 'name' => 'German', 'native_name' => 'Deutsch', 'flag_emoji' => '🇩🇪'],
            ['code' => 'fr', 'name' => 'French', 'native_name' => 'Français', 'flag_emoji' => '🇫🇷'],
            ['code' => 'ja', 'name' => 'Japanese', 'native_name' => '日本語', 'flag_emoji' => '🇯🇵'],
            ['code' => 'ko', 'name' => 'Korean', 'native_name' => '한국어', 'flag_emoji' => '🇰🇷'],
        ];

        $chapters = [
            ['key' => ChapterKey::Beginner, 'title' => 'Beginner', 'order' => 1],
            ['key' => ChapterKey::Conversation, 'title' => 'Conversation', 'order' => 2],
            ['key' => ChapterKey::Restaurant, 'title' => 'Restaurant', 'order' => 3],
            ['key' => ChapterKey::Supermarket, 'title' => 'Supermarket', 'order' => 4],
            ['key' => ChapterKey::FinalTest, 'title' => 'Final Test', 'order' => 5],
        ];

        foreach ($languages as $languageData) {
            // `is_active` is left to the column default (false). Seeding
            // creates the course scaffolding; publishing it to the pickers is
            // an admin decision, made in /admin/language-activation.
            $language = Language::firstOrCreate(
                ['code' => $languageData['code']],
                [
                    'name' => $languageData['name'],
                    'native_name' => $languageData['native_name'],
                    'flag_emoji' => $languageData['flag_emoji'],
                ]
            );

            foreach ($chapters as $chapterData) {
                Chapter::firstOrCreate(
                    ['language_id' => $language->id, 'chapter_key' => $chapterData['key']],
                    ['title' => $chapterData['title'], 'order_number' => $chapterData['order']]
                );
            }
        }
    }
}
