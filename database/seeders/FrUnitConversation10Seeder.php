<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation10Seeder extends Seeder
{
    private const PICTURES = [
        'Café' => 'coffee', 'Thé' => 'tea', 'Livre' => 'book',
        'Stylo' => 'pen', 'Chat' => 'cat', 'Chien' => 'dog',
    ];

    /**
     * French Chapter 2, Unit 10 — comparisons and preferences.
     *
     * Comparisons only make sense between two things, so every lesson pairs two
     * items the learner already owns and the new word is what sits between them:
     * plus/moins, comme/même, mieux/pire, autant/surtout. This is the closing
     * unit of the chapter, so the nouns are deliberately all Chapter 1 ones.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Comparisons & Preferences', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: More & Less', 1,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Thé', 'img' => 'tea']],
                plain: [['fr' => 'Plus'], ['fr' => 'Moins']],
                phrases: [
                    'a' => [
                        'words' => ['plus', 'de', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'More coffee', 'correct' => ['more', 'coffee'], 'extra' => ['less', 'tea']],
                            'es' => ['sentence' => 'Más café', 'correct' => ['más', 'café'], 'extra' => ['menos', 'té']],
                            'de' => ['sentence' => 'Mehr Kaffee', 'correct' => ['mehr', 'Kaffee'], 'extra' => ['weniger', 'Tee']],
                            'ja' => ['sentence' => 'もっとコーヒー', 'correct' => ['もっと', 'コーヒー'], 'extra' => ['より少ない', 'お茶']],
                            'ko' => ['sentence' => '더 커피', 'correct' => ['더', '커피'], 'extra' => ['덜', '차']],
                        ],
                    ],
                    'b' => [
                        'words' => ['moins', 'de', 'thé'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Less tea', 'correct' => ['less', 'tea'], 'extra' => ['more', 'coffee']],
                            'es' => ['sentence' => 'Menos té', 'correct' => ['menos', 'té'], 'extra' => ['más', 'café']],
                            'de' => ['sentence' => 'Weniger Tee', 'correct' => ['weniger', 'Tee'], 'extra' => ['mehr', 'Kaffee']],
                            'ja' => ['sentence' => 'より少ないお茶', 'correct' => ['より少ない', 'お茶'], 'extra' => ['もっと', 'コーヒー']],
                            'ko' => ['sentence' => '덜 차', 'correct' => ['덜', '차'], 'extra' => ['더', '커피']],
                        ],
                    ],
                    'c' => [
                        'words' => ['plus', 'de', 'café', 'et', 'moins', 'de', 'thé'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'More coffee and less tea', 'correct' => ['more', 'coffee', 'and', 'less', 'tea'], 'extra' => ['book']],
                            'es' => ['sentence' => 'Más café y menos té', 'correct' => ['más', 'café', 'y', 'menos', 'té'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Mehr Kaffee und weniger Tee', 'correct' => ['mehr', 'Kaffee', 'und', 'weniger', 'Tee'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'もっとコーヒーとより少ないお茶', 'correct' => ['もっと', 'コーヒー', 'と', 'より少ない', 'お茶'], 'extra' => ['本']],
                            'ko' => ['sentence' => '더 커피와 덜 차', 'correct' => ['더', '커피와', '덜', '차'], 'extra' => ['책']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Like & Same', 2,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'Stylo', 'img' => 'pen']],
                plain: [['fr' => 'Comme'], ['fr' => 'Même']],
                phrases: [
                    'a' => [
                        'words' => ['comme', 'un', 'livre'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Like a book', 'correct' => ['like', 'a', 'book'], 'extra' => ['same', 'pen']],
                            'es' => ['sentence' => 'Como un libro', 'correct' => ['como', 'un', 'libro'], 'extra' => ['mismo', 'bolígrafo']],
                            'de' => ['sentence' => 'Wie ein Buch', 'correct' => ['wie', 'ein', 'Buch'], 'extra' => ['gleich', 'Kugelschreiber']],
                            'ja' => ['sentence' => '本のように', 'correct' => ['本', 'のように'], 'extra' => ['同じ', 'ペン']],
                            'ko' => ['sentence' => '책처럼', 'correct' => ['책처럼'], 'extra' => ['같은', '펜']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'même', 'stylo'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The same pen', 'correct' => ['the', 'same', 'pen'], 'extra' => ['like', 'book']],
                            'es' => ['sentence' => 'El mismo bolígrafo', 'correct' => ['el', 'mismo', 'bolígrafo'], 'extra' => ['como', 'libro']],
                            'de' => ['sentence' => 'Der gleiche Kugelschreiber', 'correct' => ['der', 'gleich', 'Kugelschreiber'], 'extra' => ['wie', 'Buch']],
                            'ja' => ['sentence' => '同じペン', 'correct' => ['同じ', 'ペン'], 'extra' => ['のように', '本']],
                            'ko' => ['sentence' => '같은 펜', 'correct' => ['같은', '펜'], 'extra' => ['처럼', '책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['comme', 'le', 'même', 'livre'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Like the same book', 'correct' => ['like', 'the', 'same', 'book'], 'extra' => ['pen']],
                            'es' => ['sentence' => 'Como el mismo libro', 'correct' => ['como', 'el', 'mismo', 'libro'], 'extra' => ['bolígrafo']],
                            'de' => ['sentence' => 'Wie das gleiche Buch', 'correct' => ['wie', 'das', 'gleich', 'Buch'], 'extra' => ['Kugelschreiber']],
                            'ja' => ['sentence' => '同じ本のように', 'correct' => ['同じ', '本', 'のように'], 'extra' => ['ペン']],
                            'ko' => ['sentence' => '같은 책처럼', 'correct' => ['같은', '책처럼'], 'extra' => ['펜']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Better & Worse', 3,
                pictures: [['fr' => 'Chat', 'img' => 'cat'], ['fr' => 'Chien', 'img' => 'dog']],
                plain: [['fr' => 'Mieux'], ['fr' => 'Pire']],
                phrases: [
                    'a' => [
                        'words' => ["c'est", 'mieux'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'This is better', 'correct' => ['this is', 'better'], 'extra' => ['worse', 'cat']],
                            'es' => ['sentence' => 'Este es mejor', 'correct' => ['este es', 'mejor'], 'extra' => ['peor', 'gato']],
                            'de' => ['sentence' => 'Das ist besser', 'correct' => ['das ist', 'besser'], 'extra' => ['schlechter', 'Katze']],
                            'ja' => ['sentence' => 'これはもっと良い', 'correct' => ['これは', 'もっと良い'], 'extra' => ['より悪い', '猫']],
                            'ko' => ['sentence' => '이것은 더 좋다', 'correct' => ['이것은', '더', '좋다'], 'extra' => ['더 나쁜', '고양이']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'est", 'pire'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'This is worse', 'correct' => ['this is', 'worse'], 'extra' => ['better', 'dog']],
                            'es' => ['sentence' => 'Este es peor', 'correct' => ['este es', 'peor'], 'extra' => ['mejor', 'perro']],
                            'de' => ['sentence' => 'Das ist schlechter', 'correct' => ['das ist', 'schlechter'], 'extra' => ['besser', 'Hund']],
                            'ja' => ['sentence' => 'これはより悪い', 'correct' => ['これは', 'より', '悪い'], 'extra' => ['もっと良い', '犬']],
                            'ko' => ['sentence' => '이것은 더 나쁘다', 'correct' => ['이것은', '더', '나쁘다'], 'extra' => ['더 잘', '개']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'chat', 'et', 'un', 'chien'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A cat and a dog', 'correct' => ['a', 'cat', 'and', 'a', 'dog'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Un gato y un perro', 'correct' => ['un', 'gato', 'y', 'un', 'perro'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Eine Katze und ein Hund', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Hund'], 'extra' => ['besser']],
                            'ja' => ['sentence' => '猫と犬', 'correct' => ['猫', 'と', '犬'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '고양이와 개', 'correct' => ['고양이와', '개'], 'extra' => ['더 잘']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: As Much & Especially', 4,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Livre', 'img' => 'book']],
                plain: [['fr' => 'Autant'], ['fr' => 'Surtout']],
                phrases: [
                    'a' => [
                        'words' => ['autant', 'de', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'As much coffee', 'correct' => ['as much', 'coffee'], 'extra' => ['especially', 'book']],
                            'es' => ['sentence' => 'Tanto café', 'correct' => ['tanto', 'café'], 'extra' => ['sobre todo', 'libro']],
                            'de' => ['sentence' => 'Genauso viel Kaffee', 'correct' => ['genauso viel', 'Kaffee'], 'extra' => ['besonders', 'Buch']],
                            'ja' => ['sentence' => '同じくらいのコーヒー', 'correct' => ['同じくらい', 'の', 'コーヒー'], 'extra' => ['特に', '本']],
                            'ko' => ['sentence' => '그만큼 커피', 'correct' => ['그만큼', '커피'], 'extra' => ['특히', '책']],
                        ],
                    ],
                    'b' => [
                        'words' => ['surtout', 'un', 'livre'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Especially a book', 'correct' => ['especially', 'a', 'book'], 'extra' => ['as much', 'coffee']],
                            'es' => ['sentence' => 'Sobre todo un libro', 'correct' => ['sobre todo', 'un', 'libro'], 'extra' => ['tanto', 'café']],
                            'de' => ['sentence' => 'Besonders ein Buch', 'correct' => ['besonders', 'ein', 'Buch'], 'extra' => ['genauso viel']],
                            'ja' => ['sentence' => '特に本', 'correct' => ['特に', '本'], 'extra' => ['同じくらい', 'コーヒー']],
                            'ko' => ['sentence' => '특히 책', 'correct' => ['특히', '책'], 'extra' => ['그만큼', '커피']],
                        ],
                    ],
                    'c' => [
                        'words' => ['autant', 'de', 'café', 'et', 'surtout', 'un', 'livre'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'As much coffee and especially a book', 'correct' => ['as much', 'coffee', 'and', 'especially', 'a', 'book'], 'extra' => ['tea']],
                            'es' => ['sentence' => 'Tanto café y sobre todo un libro', 'correct' => ['tanto', 'café', 'y', 'sobre todo', 'un', 'libro'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Genauso viel Kaffee und besonders ein Buch', 'correct' => ['genauso viel', 'Kaffee', 'und', 'besonders', 'ein', 'Buch'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '同じくらいのコーヒーと特に本', 'correct' => ['同じくらい', 'の', 'コーヒー', 'と', '特に', '本'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '그만큼 커피와 특히 책', 'correct' => ['그만큼', '커피와', '특히', '책'], 'extra' => ['차']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Cat Is Better', 5,
                pictures: [['fr' => 'Thé', 'img' => 'tea'], ['fr' => 'Chat', 'img' => 'cat']],
                plain: [['fr' => 'Plus'], ['fr' => 'Mieux']],
                phrases: [
                    'a' => [
                        'words' => ['plus', 'de', 'thé'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'More tea', 'correct' => ['more', 'tea'], 'extra' => ['better', 'cat']],
                            'es' => ['sentence' => 'Más té', 'correct' => ['más', 'té'], 'extra' => ['mejor', 'gato']],
                            'de' => ['sentence' => 'Mehr Tee', 'correct' => ['mehr', 'Tee'], 'extra' => ['besser', 'Katze']],
                            'ja' => ['sentence' => 'もっとお茶', 'correct' => ['もっと', 'お茶'], 'extra' => ['もっと良い', '猫']],
                            'ko' => ['sentence' => '더 차', 'correct' => ['더', '차'], 'extra' => ['더 잘', '고양이']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'est", 'mieux'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'This is better', 'correct' => ['this is', 'better'], 'extra' => ['more', 'tea']],
                            'es' => ['sentence' => 'Este es mejor', 'correct' => ['este es', 'mejor'], 'extra' => ['más', 'té']],
                            'de' => ['sentence' => 'Das ist besser', 'correct' => ['das ist', 'besser'], 'extra' => ['mehr', 'Tee']],
                            'ja' => ['sentence' => 'これはもっと良い', 'correct' => ['これは', 'もっと良い'], 'extra' => ['もっと', 'お茶']],
                            'ko' => ['sentence' => '이것은 더 좋다', 'correct' => ['이것은', '더', '좋다'], 'extra' => ['더', '차']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'chat', "c'est", 'mieux'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A cat, this is better', 'correct' => ['a', 'cat', 'this is', 'better'], 'extra' => ['tea']],
                            'es' => ['sentence' => 'Un gato, este es mejor', 'correct' => ['un', 'gato', 'este es', 'mejor'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Eine Katze, das ist besser', 'correct' => ['eine', 'Katze', 'das ist', 'besser'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '猫、これはもっと良い', 'correct' => ['猫', 'これは', 'もっと良い'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '고양이, 이것은 더 좋다', 'correct' => ['고양이', '이것은', '더', '좋다'], 'extra' => ['차']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
