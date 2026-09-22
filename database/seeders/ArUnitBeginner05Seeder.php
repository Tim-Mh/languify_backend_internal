<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitBeginner05Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'أحمر' => 'red', 'كتاب' => 'book', 'أخضر' => 'green', 'تفاحة' => 'apple',
        'أسود' => 'black', 'قط' => 'cat', 'كبير' => 'big', 'بيت' => 'house',
    ];

    /**
     * Arabic Beginner Unit 5.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Colours & Size', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Red & Blue', 1,
                pictures: [['ar' => 'أحمر', 'img' => 'red'], ['ar' => 'كتاب', 'img' => 'book']],
                plain: [['ar' => 'أزرق'], ['ar' => 'قلم']],
                phrases: [
                    'a' => [
                        'words' => ['أحمر', 'كتاب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A red book', 'correct' => ['a', 'red', 'book'], 'extra' => ['blue']],
                            'az' => ['sentence' => 'bir qırmızı kitab', 'correct' => ['bir', 'qırmızı', 'kitab'], 'extra' => ['mavi']],
                            'fr' => ['sentence' => 'Un livre rouge', 'correct' => ['un', 'livre', 'rouge'], 'extra' => ['bleu']],
                            'es' => ['sentence' => 'Un libro rojo', 'correct' => ['un', 'libro', 'rojo'], 'extra' => ['azul']],
                            'de' => ['sentence' => 'Ein rotes Buch', 'correct' => ['ein', 'rotes', 'Buch'], 'extra' => ['blau']],
                            'ja' => ['sentence' => '赤い本', 'correct' => ['赤い', '本'], 'extra' => ['青い']],
                            'ko' => ['sentence' => '빨간 책', 'correct' => ['빨간', '책'], 'extra' => ['파란']],
                            'tr' => ['sentence' => 'kırmızı bir kitap', 'correct' => ['kırmızı', 'bir', 'kitap'], 'extra' => ['kalem', 'mavi']],
                            'ru' => ['sentence' => 'красный книга', 'correct' => ['красный', 'книга'], 'extra' => ['синий']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أزرق', 'قلم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A blue pen', 'correct' => ['a', 'blue', 'pen'], 'extra' => ['red']],
                            'az' => ['sentence' => 'bir mavi qələm', 'correct' => ['bir', 'mavi', 'qələm'], 'extra' => ['qırmızı']],
                            'fr' => ['sentence' => 'Un stylo bleu', 'correct' => ['un', 'stylo', 'bleu'], 'extra' => ['rouge']],
                            'es' => ['sentence' => 'Un bolígrafo azul', 'correct' => ['un', 'bolígrafo', 'azul'], 'extra' => ['rojo']],
                            'de' => ['sentence' => 'Ein blauer Stift', 'correct' => ['ein', 'blauer', 'Stift'], 'extra' => ['rot']],
                            'ja' => ['sentence' => '青いペン', 'correct' => ['青い', 'ペン'], 'extra' => ['赤い']],
                            'ko' => ['sentence' => '파란 펜', 'correct' => ['파란', '펜'], 'extra' => ['빨간']],
                            'tr' => ['sentence' => 'mavi bir kalem', 'correct' => ['mavi', 'bir', 'kalem'], 'extra' => ['kitap', 'kırmızı']],
                            'ru' => ['sentence' => 'синий ручка', 'correct' => ['синий', 'ручка'], 'extra' => ['красный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أحمر', 'كتاب', 'و', 'أزرق', 'قلم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A red book and a blue pen', 'correct' => ['a', 'red', 'book', 'and', 'a', 'blue', 'pen'], 'extra' => ['green']],
                            'az' => ['sentence' => 'bir qırmızı kitab və bir mavi qələm', 'correct' => ['bir', 'qırmızı', 'kitab', 'və', 'bir', 'mavi', 'qələm'], 'extra' => ['yaşıl']],
                            'fr' => ['sentence' => 'Un livre rouge et un stylo bleu', 'correct' => ['un', 'livre', 'rouge', 'et', 'un', 'stylo', 'bleu'], 'extra' => ['vert']],
                            'es' => ['sentence' => 'Un libro rojo y un bolígrafo azul', 'correct' => ['un', 'libro', 'rojo', 'y', 'un', 'bolígrafo', 'azul'], 'extra' => ['verde']],
                            'de' => ['sentence' => 'Ein rotes Buch und ein blauer Stift', 'correct' => ['ein', 'rotes', 'Buch', 'und', 'ein', 'blauer', 'Stift'], 'extra' => ['grün']],
                            'ja' => ['sentence' => '赤い本と青いペン', 'correct' => ['赤い', '本', 'と', '青い', 'ペン'], 'extra' => ['緑の']],
                            'ko' => ['sentence' => '빨간 책과 파란 펜', 'correct' => ['빨간', '책과', '파란', '펜'], 'extra' => ['초록']],
                            'tr' => ['sentence' => 'kırmızı bir kitap ve mavi bir kalem', 'correct' => ['kırmızı', 'bir', 'kitap', 've', 'mavi', 'bir', 'kalem'], 'extra' => []],
                            'ru' => ['sentence' => 'красный книга и синий ручка', 'correct' => ['красный', 'книга', 'и', 'синий', 'ручка'], 'extra' => ['зелёный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Green & Yellow', 2,
                pictures: [['ar' => 'أخضر', 'img' => 'green'], ['ar' => 'تفاحة', 'img' => 'apple']],
                plain: [['ar' => 'أصفر'], ['ar' => 'بيت']],
                phrases: [
                    'a' => [
                        'words' => ['أخضر', 'تفاحة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A green apple', 'correct' => ['a', 'green', 'apple'], 'extra' => ['yellow']],
                            'az' => ['sentence' => 'bir yaşıl alma', 'correct' => ['bir', 'yaşıl', 'alma'], 'extra' => ['sarı']],
                            'fr' => ['sentence' => 'Une pomme verte', 'correct' => ['une', 'pomme', 'verte'], 'extra' => ['jaune']],
                            'es' => ['sentence' => 'Una manzana verde', 'correct' => ['una', 'manzana', 'verde'], 'extra' => ['amarillo']],
                            'de' => ['sentence' => 'Ein grüner Apfel', 'correct' => ['ein', 'grüner', 'Apfel'], 'extra' => ['gelb']],
                            'ja' => ['sentence' => '緑のりんご', 'correct' => ['緑の', 'りんご'], 'extra' => ['黄色い']],
                            'ko' => ['sentence' => '초록 사과', 'correct' => ['초록', '사과'], 'extra' => ['노란']],
                            'tr' => ['sentence' => 'yeşil bir elma', 'correct' => ['yeşil', 'bir', 'elma'], 'extra' => ['ev', 'sarı']],
                            'ru' => ['sentence' => 'зелёный яблоко', 'correct' => ['зелёный', 'яблоко'], 'extra' => ['жёлтый']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أصفر', 'بيت'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A yellow house', 'correct' => ['a', 'yellow', 'house'], 'extra' => ['green']],
                            'az' => ['sentence' => 'bir sarı ev', 'correct' => ['bir', 'sarı', 'ev'], 'extra' => ['yaşıl']],
                            'fr' => ['sentence' => 'Une maison jaune', 'correct' => ['une', 'maison', 'jaune'], 'extra' => ['vert']],
                            'es' => ['sentence' => 'Una casa amarilla', 'correct' => ['una', 'casa', 'amarilla'], 'extra' => ['verde']],
                            'de' => ['sentence' => 'Ein gelbes Haus', 'correct' => ['ein', 'gelbes', 'Haus'], 'extra' => ['grün']],
                            'ja' => ['sentence' => '黄色い家', 'correct' => ['黄色い', '家'], 'extra' => ['緑の']],
                            'ko' => ['sentence' => '노란 집', 'correct' => ['노란', '집'], 'extra' => ['초록']],
                            'tr' => ['sentence' => 'sarı bir ev', 'correct' => ['sarı', 'bir', 'ev'], 'extra' => ['elma', 'yeşil']],
                            'ru' => ['sentence' => 'жёлтый дом', 'correct' => ['жёлтый', 'дом'], 'extra' => ['зелёный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أخضر', 'تفاحة', 'و', 'أصفر', 'بيت'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A green apple and a yellow house', 'correct' => ['a', 'green', 'apple', 'and', 'a', 'yellow', 'house'], 'extra' => ['red']],
                            'az' => ['sentence' => 'bir yaşıl alma və bir sarı ev', 'correct' => ['bir', 'yaşıl', 'alma', 'və', 'bir', 'sarı', 'ev'], 'extra' => ['qırmızı']],
                            'fr' => ['sentence' => 'Une pomme verte et une maison jaune', 'correct' => ['une', 'pomme', 'verte', 'et', 'une', 'maison', 'jaune'], 'extra' => ['rouge']],
                            'es' => ['sentence' => 'Una manzana verde y una casa amarilla', 'correct' => ['una', 'manzana', 'verde', 'y', 'una', 'casa', 'amarilla'], 'extra' => ['rojo']],
                            'de' => ['sentence' => 'Ein grüner Apfel und ein gelbes Haus', 'correct' => ['ein', 'grüner', 'Apfel', 'und', 'ein', 'gelbes', 'Haus'], 'extra' => ['rot']],
                            'ja' => ['sentence' => '緑のりんごと黄色い家', 'correct' => ['緑の', 'りんご', 'と', '黄色い', '家'], 'extra' => ['赤い']],
                            'ko' => ['sentence' => '초록 사과와 노란 집', 'correct' => ['초록', '사과와', '노란', '집'], 'extra' => ['빨간']],
                            'tr' => ['sentence' => 'yeşil bir elma ve sarı bir ev', 'correct' => ['yeşil', 'bir', 'elma', 've', 'sarı', 'bir', 'ev'], 'extra' => []],
                            'ru' => ['sentence' => 'зелёный яблоко и жёлтый дом', 'correct' => ['зелёный', 'яблоко', 'и', 'жёлтый', 'дом'], 'extra' => ['красный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Black & White', 3,
                pictures: [['ar' => 'أسود', 'img' => 'black'], ['ar' => 'قط', 'img' => 'cat']],
                plain: [['ar' => 'أبيض'], ['ar' => 'كلب']],
                phrases: [
                    'a' => [
                        'words' => ['أسود', 'قط'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A black cat', 'correct' => ['a', 'black', 'cat'], 'extra' => ['white']],
                            'az' => ['sentence' => 'bir qara pişik', 'correct' => ['bir', 'qara', 'pişik'], 'extra' => ['ağ']],
                            'fr' => ['sentence' => 'Un chat noir', 'correct' => ['un', 'chat', 'noir'], 'extra' => ['blanc']],
                            'es' => ['sentence' => 'Un gato negro', 'correct' => ['un', 'gato', 'negro'], 'extra' => ['blanco']],
                            'de' => ['sentence' => 'Eine schwarze Katze', 'correct' => ['eine', 'schwarze', 'Katze'], 'extra' => ['weiß']],
                            'ja' => ['sentence' => '黒い猫', 'correct' => ['黒い', '猫'], 'extra' => ['白い']],
                            'ko' => ['sentence' => '검은 고양이', 'correct' => ['검은', '고양이'], 'extra' => ['하얀']],
                            'tr' => ['sentence' => 'siyah bir kedi', 'correct' => ['siyah', 'bir', 'kedi'], 'extra' => ['köpek', 'beyaz']],
                            'ru' => ['sentence' => 'чёрный кот', 'correct' => ['чёрный', 'кот'], 'extra' => ['белый']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أبيض', 'كلب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A white dog', 'correct' => ['a', 'white', 'dog'], 'extra' => ['black']],
                            'az' => ['sentence' => 'bir ağ it', 'correct' => ['bir', 'ağ', 'it'], 'extra' => ['qara']],
                            'fr' => ['sentence' => 'Un chien blanc', 'correct' => ['un', 'chien', 'blanc'], 'extra' => ['noir']],
                            'es' => ['sentence' => 'Un perro blanco', 'correct' => ['un', 'perro', 'blanco'], 'extra' => ['negro']],
                            'de' => ['sentence' => 'Ein weißer Hund', 'correct' => ['ein', 'weißer', 'Hund'], 'extra' => ['schwarz']],
                            'ja' => ['sentence' => '白い犬', 'correct' => ['白い', '犬'], 'extra' => ['黒い']],
                            'ko' => ['sentence' => '하얀 개', 'correct' => ['하얀', '개'], 'extra' => ['검은']],
                            'tr' => ['sentence' => 'beyaz bir köpek', 'correct' => ['beyaz', 'bir', 'köpek'], 'extra' => ['kedi', 'siyah']],
                            'ru' => ['sentence' => 'белый собака', 'correct' => ['белый', 'собака'], 'extra' => ['чёрный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أسود', 'قط', 'و', 'أبيض', 'كلب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A black cat and a white dog', 'correct' => ['a', 'black', 'cat', 'and', 'a', 'white', 'dog'], 'extra' => ['blue']],
                            'az' => ['sentence' => 'bir qara pişik və bir ağ it', 'correct' => ['bir', 'qara', 'pişik', 'və', 'bir', 'ağ', 'it'], 'extra' => ['mavi']],
                            'fr' => ['sentence' => 'Un chat noir et un chien blanc', 'correct' => ['un', 'chat', 'noir', 'et', 'un', 'chien', 'blanc'], 'extra' => ['bleu']],
                            'es' => ['sentence' => 'Un gato negro y un perro blanco', 'correct' => ['un', 'gato', 'negro', 'y', 'un', 'perro', 'blanco'], 'extra' => ['azul']],
                            'de' => ['sentence' => 'Eine schwarze Katze und ein weißer Hund', 'correct' => ['eine', 'schwarze', 'Katze', 'und', 'ein', 'weißer', 'Hund'], 'extra' => ['blau']],
                            'ja' => ['sentence' => '黒い猫と白い犬', 'correct' => ['黒い', '猫', 'と', '白い', '犬'], 'extra' => ['青い']],
                            'ko' => ['sentence' => '검은 고양이와 하얀 개', 'correct' => ['검은', '고양이와', '하얀', '개'], 'extra' => ['파란']],
                            'tr' => ['sentence' => 'siyah bir kedi ve beyaz bir köpek', 'correct' => ['siyah', 'bir', 'kedi', 've', 'beyaz', 'bir', 'köpek'], 'extra' => []],
                            'ru' => ['sentence' => 'чёрный кот и белый собака', 'correct' => ['чёрный', 'кот', 'и', 'белый', 'собака'], 'extra' => ['синий']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Big & Small', 4,
                pictures: [['ar' => 'كبير', 'img' => 'big'], ['ar' => 'بيت', 'img' => 'house']],
                plain: [['ar' => 'صغير'], ['ar' => 'قط']],
                phrases: [
                    'a' => [
                        'words' => ['كبير', 'بيت'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big house', 'correct' => ['a', 'big', 'house'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bir böyük ev', 'correct' => ['bir', 'böyük', 'ev'], 'extra' => ['kiçik']],
                            'fr' => ['sentence' => 'Une grande maison', 'correct' => ['une', 'grande', 'maison'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'Una casa grande', 'correct' => ['una', 'casa', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Ein großes Haus', 'correct' => ['ein', 'großes', 'Haus'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '大きい家', 'correct' => ['大きい', '家'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '큰 집', 'correct' => ['큰', '집'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'büyük bir ev', 'correct' => ['büyük', 'bir', 'ev'], 'extra' => ['kedi', 'küçük']],
                            'ru' => ['sentence' => 'большой дом', 'correct' => ['большой', 'дом'], 'extra' => ['маленький']],
                        ],
                    ],
                    'b' => [
                        'words' => ['صغير', 'قط'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A small cat', 'correct' => ['a', 'small', 'cat'], 'extra' => ['big']],
                            'az' => ['sentence' => 'bir kiçik pişik', 'correct' => ['bir', 'kiçik', 'pişik'], 'extra' => ['böyük']],
                            'fr' => ['sentence' => 'Un petit chat', 'correct' => ['un', 'petit', 'chat'], 'extra' => ['grand']],
                            'es' => ['sentence' => 'Un gato pequeño', 'correct' => ['un', 'gato', 'pequeño'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Eine kleine Katze', 'correct' => ['eine', 'kleine', 'Katze'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '小さい猫', 'correct' => ['小さい', '猫'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 고양이', 'correct' => ['작은', '고양이'], 'extra' => ['큰']],
                            'tr' => ['sentence' => 'küçük bir kedi', 'correct' => ['küçük', 'bir', 'kedi'], 'extra' => ['ev', 'büyük']],
                            'ru' => ['sentence' => 'маленький кот', 'correct' => ['маленький', 'кот'], 'extra' => ['большой']],
                        ],
                    ],
                    'c' => [
                        'words' => ['كبير', 'بيت', 'و', 'صغير', 'قط'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big house and a small cat', 'correct' => ['a', 'big', 'house', 'and', 'a', 'small', 'cat'], 'extra' => ['black']],
                            'az' => ['sentence' => 'bir böyük ev və bir kiçik pişik', 'correct' => ['bir', 'böyük', 'ev', 'və', 'bir', 'kiçik', 'pişik'], 'extra' => ['qara']],
                            'fr' => ['sentence' => 'Une grande maison et un petit chat', 'correct' => ['une', 'grande', 'maison', 'et', 'un', 'petit', 'chat'], 'extra' => ['noir']],
                            'es' => ['sentence' => 'Una casa grande y un gato pequeño', 'correct' => ['una', 'casa', 'grande', 'y', 'un', 'gato', 'pequeño'], 'extra' => ['negro']],
                            'de' => ['sentence' => 'Ein großes Haus und eine kleine Katze', 'correct' => ['ein', 'großes', 'Haus', 'und', 'eine', 'kleine', 'Katze'], 'extra' => ['schwarz']],
                            'ja' => ['sentence' => '大きい家と小さい猫', 'correct' => ['大きい', '家', 'と', '小さい', '猫'], 'extra' => ['黒い']],
                            'ko' => ['sentence' => '큰 집과 작은 고양이', 'correct' => ['큰', '집과', '작은', '고양이'], 'extra' => ['검은']],
                            'tr' => ['sentence' => 'büyük bir ev ve küçük bir kedi', 'correct' => ['büyük', 'bir', 'ev', 've', 'küçük', 'bir', 'kedi'], 'extra' => []],
                            'ru' => ['sentence' => 'большой дом и маленький кот', 'correct' => ['большой', 'дом', 'и', 'маленький', 'кот'], 'extra' => ['чёрный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Describing Things', 5,
                pictures: [['ar' => 'أحمر', 'img' => 'red'], ['ar' => 'تفاحة', 'img' => 'apple']],
                plain: [['ar' => 'الأكل'], ['ar' => 'هذا']],
                phrases: [
                    'a' => [
                        'words' => ['الأكل', 'أحمر', 'تفاحة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat a red apple', 'correct' => ['to eat', 'a', 'red', 'apple'], 'extra' => ['big']],
                            'az' => ['sentence' => 'yemək yemək bir qırmızı alma', 'correct' => ['yemək yemək', 'bir', 'qırmızı', 'alma'], 'extra' => ['böyük']],
                            'fr' => ['sentence' => 'Manger une pomme rouge', 'correct' => ['manger', 'une', 'pomme', 'rouge'], 'extra' => ['grand']],
                            'es' => ['sentence' => 'Comer una manzana roja', 'correct' => ['comer', 'una', 'manzana', 'roja'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Einen roten Apfel essen', 'correct' => ['einen', 'roten', 'Apfel', 'essen'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '赤いりんごを食べる', 'correct' => ['赤い', 'りんご', 'を', '食べる'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '빨간 사과를 먹다', 'correct' => ['빨간', '사과를', '먹다'], 'extra' => ['큰']],
                            'tr' => ['sentence' => 'kırmızı bir elma yemek', 'correct' => ['kırmızı', 'bir', 'elma', 'yemek'], 'extra' => ['kitap', 'büyük']],
                            'ru' => ['sentence' => 'кушать красный яблоко', 'correct' => ['кушать', 'красный', 'яблоко'], 'extra' => ['большой']],
                        ],
                    ],
                    'b' => [
                        'words' => ['هذا', 'كبير', 'كتاب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is my big book', 'correct' => ['this is', 'my', 'big', 'book'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bu mənim böyük kitab', 'correct' => ['bu', 'mənim', 'böyük', 'kitab'], 'extra' => ['kiçik']],
                            'fr' => ['sentence' => 'Ceci est mon grand livre', 'correct' => ['ceci est', 'mon', 'grand', 'livre'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'Este es mi libro grande', 'correct' => ['este es', 'mi', 'libro', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Das ist mein großes Buch', 'correct' => ['das ist', 'mein', 'großes', 'Buch'], 'extra' => ['klein']],
                            'ja' => ['sentence' => 'これは私の大きい本です', 'correct' => ['これは', '私の', '大きい', '本', 'です'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '이것은 내 큰 책입니다', 'correct' => ['이것은', '내', '큰', '책입니다'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'bu benim büyük kitabım', 'correct' => ['bu', 'benim', 'büyük', 'kitabım'], 'extra' => ['elma', 'kitap']],
                            'ru' => ['sentence' => 'это мой большой книга', 'correct' => ['это', 'мой', 'большой', 'книга'], 'extra' => ['маленький']],
                        ],
                    ],
                    'c' => [
                        'words' => ['صغير', 'كتاب', 'و', 'أحمر', 'قلم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A small book and a red pen', 'correct' => ['a', 'small', 'book', 'and', 'a', 'red', 'pen'], 'extra' => ['white']],
                            'az' => ['sentence' => 'bir kiçik kitab və bir qırmızı qələm', 'correct' => ['bir', 'kiçik', 'kitab', 'və', 'bir', 'qırmızı', 'qələm'], 'extra' => ['ağ']],
                            'fr' => ['sentence' => 'Un petit livre et un stylo rouge', 'correct' => ['un', 'petit', 'livre', 'et', 'un', 'stylo', 'rouge'], 'extra' => ['blanc']],
                            'es' => ['sentence' => 'Un libro pequeño y un bolígrafo rojo', 'correct' => ['un', 'libro', 'pequeño', 'y', 'un', 'bolígrafo', 'rojo'], 'extra' => ['blanco']],
                            'de' => ['sentence' => 'Ein kleines Buch und ein roter Stift', 'correct' => ['ein', 'kleines', 'Buch', 'und', 'ein', 'roter', 'Stift'], 'extra' => ['weiß']],
                            'ja' => ['sentence' => '小さい本と赤いペン', 'correct' => ['小さい', '本', 'と', '赤い', 'ペン'], 'extra' => ['白い']],
                            'ko' => ['sentence' => '작은 책과 빨간 펜', 'correct' => ['작은', '책과', '빨간', '펜'], 'extra' => ['하얀']],
                            'tr' => ['sentence' => 'küçük bir kitap ve kırmızı bir kalem', 'correct' => ['küçük', 'bir', 'kitap', 've', 'kırmızı', 'bir', 'kalem'], 'extra' => ['elma', 'büyük']],
                            'ru' => ['sentence' => 'маленький книга и красный ручка', 'correct' => ['маленький', 'книга', 'и', 'красный', 'ручка'], 'extra' => ['белый']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
