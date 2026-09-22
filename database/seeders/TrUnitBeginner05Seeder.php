<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner05Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kırmızı' => 'red', 'Mavi' => 'blue', 'Yeşil' => 'green', 'Sarı' => 'yellow',
        'Siyah' => 'black', 'Beyaz' => 'white', 'Büyük' => 'big', 'Küçük' => 'small',
    ];

    /**
     * Turkish Beginner Unit 5 — colours and size.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * A DELIBERATE BREATHER AFTER UNIT 4.
     *
     * Unit 4 introduced the accusative, which is the hardest idea in the
     * chapter. This unit introduces no morphology at all: Turkish adjectives sit
     * in front of the noun and never change shape, exactly like English.
     * `kırmızı kitap`, `kırmızı ev`, `kırmızı elma` — one form every time, no
     * agreement, no harmony, nothing to get wrong.
     *
     * That is worth a whole unit right after a hard one. The learner gets five
     * lessons of visible progress while the accusative settles, and every phrase
     * here quietly re-uses nouns from Units 1-4 so the earlier vocabulary keeps
     * getting drilled.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Colours & Size', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Red & Blue', 1,
                pictures: [['tr' => 'Kırmızı', 'img' => 'red'], ['tr' => 'Mavi', 'img' => 'blue']],
                plain: [['tr' => 'Kitap'], ['tr' => 'Kalem']],
                phrases: [
                    'a' => [
                        'words' => ['kırmızı', 'bir', 'kitap'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A red book', 'correct' => ['a', 'red', 'book'], 'extra' => ['blue']],
                            'az' => ['sentence' => 'bir qırmızı kitab', 'correct' => ['bir', 'qırmızı', 'kitab'], 'extra' => ['mavi']],
                            'ar' => ['sentence' => 'أحمر كتاب', 'correct' => ['أحمر', 'كتاب'], 'extra' => ['أزرق']],
                            'ru' => ['sentence' => 'красный книга', 'correct' => ['красный', 'книга'], 'extra' => ['синий']],
                            'fr' => ['sentence' => 'Un livre rouge', 'correct' => ['un', 'livre', 'rouge'], 'extra' => ['bleu']],
                            'es' => ['sentence' => 'Un libro rojo', 'correct' => ['un', 'libro', 'rojo'], 'extra' => ['azul']],
                            'de' => ['sentence' => 'Ein rotes Buch', 'correct' => ['ein', 'rotes', 'Buch'], 'extra' => ['blau']],
                            'ja' => ['sentence' => '赤い本', 'correct' => ['赤い', '本'], 'extra' => ['青い']],
                            'ko' => ['sentence' => '빨간 책', 'correct' => ['빨간', '책'], 'extra' => ['파란']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mavi', 'bir', 'kalem'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A blue pen', 'correct' => ['a', 'blue', 'pen'], 'extra' => ['red']],
                            'az' => ['sentence' => 'bir mavi qələm', 'correct' => ['bir', 'mavi', 'qələm'], 'extra' => ['qırmızı']],
                            'ar' => ['sentence' => 'أزرق قلم', 'correct' => ['أزرق', 'قلم'], 'extra' => ['أحمر']],
                            'ru' => ['sentence' => 'синий ручка', 'correct' => ['синий', 'ручка'], 'extra' => ['красный']],
                            'fr' => ['sentence' => 'Un stylo bleu', 'correct' => ['un', 'stylo', 'bleu'], 'extra' => ['rouge']],
                            'es' => ['sentence' => 'Un bolígrafo azul', 'correct' => ['un', 'bolígrafo', 'azul'], 'extra' => ['rojo']],
                            'de' => ['sentence' => 'Ein blauer Stift', 'correct' => ['ein', 'blauer', 'Stift'], 'extra' => ['rot']],
                            'ja' => ['sentence' => '青いペン', 'correct' => ['青い', 'ペン'], 'extra' => ['赤い']],
                            'ko' => ['sentence' => '파란 펜', 'correct' => ['파란', '펜'], 'extra' => ['빨간']],
                        ],
                    ],
                    'c' => [
                        'words' => ['kırmızı', 'bir', 'kitap', 've', 'mavi', 'bir', 'kalem'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A red book and a blue pen', 'correct' => ['a', 'red', 'book', 'and', 'a', 'blue', 'pen'], 'extra' => ['green']],
                            'az' => ['sentence' => 'bir qırmızı kitab və bir mavi qələm', 'correct' => ['bir', 'qırmızı', 'kitab', 'və', 'bir', 'mavi', 'qələm'], 'extra' => ['yaşıl']],
                            'ar' => ['sentence' => 'أحمر كتاب و أزرق قلم', 'correct' => ['أحمر', 'كتاب', 'و', 'أزرق', 'قلم'], 'extra' => ['أخضر']],
                            'ru' => ['sentence' => 'красный книга и синий ручка', 'correct' => ['красный', 'книга', 'и', 'синий', 'ручка'], 'extra' => ['зелёный']],
                            'fr' => ['sentence' => 'Un livre rouge et un stylo bleu', 'correct' => ['un', 'livre', 'rouge', 'et', 'un', 'stylo', 'bleu'], 'extra' => ['vert']],
                            'es' => ['sentence' => 'Un libro rojo y un bolígrafo azul', 'correct' => ['un', 'libro', 'rojo', 'y', 'un', 'bolígrafo', 'azul'], 'extra' => ['verde']],
                            'de' => ['sentence' => 'Ein rotes Buch und ein blauer Stift', 'correct' => ['ein', 'rotes', 'Buch', 'und', 'ein', 'blauer', 'Stift'], 'extra' => ['grün']],
                            'ja' => ['sentence' => '赤い本と青いペン', 'correct' => ['赤い', '本', 'と', '青い', 'ペン'], 'extra' => ['緑の']],
                            'ko' => ['sentence' => '빨간 책과 파란 펜', 'correct' => ['빨간', '책과', '파란', '펜'], 'extra' => ['초록']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Green & Yellow', 2,
                pictures: [['tr' => 'Yeşil', 'img' => 'green'], ['tr' => 'Sarı', 'img' => 'yellow']],
                plain: [['tr' => 'Elma'], ['tr' => 'Ev']],
                phrases: [
                    'a' => [
                        'words' => ['yeşil', 'bir', 'elma'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A green apple', 'correct' => ['a', 'green', 'apple'], 'extra' => ['yellow']],
                            'az' => ['sentence' => 'bir yaşıl alma', 'correct' => ['bir', 'yaşıl', 'alma'], 'extra' => ['sarı']],
                            'ar' => ['sentence' => 'أخضر تفاحة', 'correct' => ['أخضر', 'تفاحة'], 'extra' => ['أصفر']],
                            'ru' => ['sentence' => 'зелёный яблоко', 'correct' => ['зелёный', 'яблоко'], 'extra' => ['жёлтый']],
                            'fr' => ['sentence' => 'Une pomme verte', 'correct' => ['une', 'pomme', 'verte'], 'extra' => ['jaune']],
                            'es' => ['sentence' => 'Una manzana verde', 'correct' => ['una', 'manzana', 'verde'], 'extra' => ['amarillo']],
                            'de' => ['sentence' => 'Ein grüner Apfel', 'correct' => ['ein', 'grüner', 'Apfel'], 'extra' => ['gelb']],
                            'ja' => ['sentence' => '緑のりんご', 'correct' => ['緑の', 'りんご'], 'extra' => ['黄色い']],
                            'ko' => ['sentence' => '초록 사과', 'correct' => ['초록', '사과'], 'extra' => ['노란']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sarı', 'bir', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A yellow house', 'correct' => ['a', 'yellow', 'house'], 'extra' => ['green']],
                            'az' => ['sentence' => 'bir sarı ev', 'correct' => ['bir', 'sarı', 'ev'], 'extra' => ['yaşıl']],
                            'ar' => ['sentence' => 'أصفر بيت', 'correct' => ['أصفر', 'بيت'], 'extra' => ['أخضر']],
                            'ru' => ['sentence' => 'жёлтый дом', 'correct' => ['жёлтый', 'дом'], 'extra' => ['зелёный']],
                            'fr' => ['sentence' => 'Une maison jaune', 'correct' => ['une', 'maison', 'jaune'], 'extra' => ['vert']],
                            'es' => ['sentence' => 'Una casa amarilla', 'correct' => ['una', 'casa', 'amarilla'], 'extra' => ['verde']],
                            'de' => ['sentence' => 'Ein gelbes Haus', 'correct' => ['ein', 'gelbes', 'Haus'], 'extra' => ['grün']],
                            'ja' => ['sentence' => '黄色い家', 'correct' => ['黄色い', '家'], 'extra' => ['緑の']],
                            'ko' => ['sentence' => '노란 집', 'correct' => ['노란', '집'], 'extra' => ['초록']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yeşil', 'bir', 'elma', 've', 'sarı', 'bir', 'ev'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A green apple and a yellow house', 'correct' => ['a', 'green', 'apple', 'and', 'a', 'yellow', 'house'], 'extra' => ['red']],
                            'az' => ['sentence' => 'bir yaşıl alma və bir sarı ev', 'correct' => ['bir', 'yaşıl', 'alma', 'və', 'bir', 'sarı', 'ev'], 'extra' => ['qırmızı']],
                            'ar' => ['sentence' => 'أخضر تفاحة و أصفر بيت', 'correct' => ['أخضر', 'تفاحة', 'و', 'أصفر', 'بيت'], 'extra' => ['أحمر']],
                            'ru' => ['sentence' => 'зелёный яблоко и жёлтый дом', 'correct' => ['зелёный', 'яблоко', 'и', 'жёлтый', 'дом'], 'extra' => ['красный']],
                            'fr' => ['sentence' => 'Une pomme verte et une maison jaune', 'correct' => ['une', 'pomme', 'verte', 'et', 'une', 'maison', 'jaune'], 'extra' => ['rouge']],
                            'es' => ['sentence' => 'Una manzana verde y una casa amarilla', 'correct' => ['una', 'manzana', 'verde', 'y', 'una', 'casa', 'amarilla'], 'extra' => ['rojo']],
                            'de' => ['sentence' => 'Ein grüner Apfel und ein gelbes Haus', 'correct' => ['ein', 'grüner', 'Apfel', 'und', 'ein', 'gelbes', 'Haus'], 'extra' => ['rot']],
                            'ja' => ['sentence' => '緑のりんごと黄色い家', 'correct' => ['緑の', 'りんご', 'と', '黄色い', '家'], 'extra' => ['赤い']],
                            'ko' => ['sentence' => '초록 사과와 노란 집', 'correct' => ['초록', '사과와', '노란', '집'], 'extra' => ['빨간']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Black & White', 3,
                pictures: [['tr' => 'Siyah', 'img' => 'black'], ['tr' => 'Beyaz', 'img' => 'white']],
                plain: [['tr' => 'Kedi'], ['tr' => 'Köpek']],
                phrases: [
                    'a' => [
                        'words' => ['siyah', 'bir', 'kedi'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A black cat', 'correct' => ['a', 'black', 'cat'], 'extra' => ['white']],
                            'az' => ['sentence' => 'bir qara pişik', 'correct' => ['bir', 'qara', 'pişik'], 'extra' => ['ağ']],
                            'ar' => ['sentence' => 'أسود قط', 'correct' => ['أسود', 'قط'], 'extra' => ['أبيض']],
                            'ru' => ['sentence' => 'чёрный кот', 'correct' => ['чёрный', 'кот'], 'extra' => ['белый']],
                            'fr' => ['sentence' => 'Un chat noir', 'correct' => ['un', 'chat', 'noir'], 'extra' => ['blanc']],
                            'es' => ['sentence' => 'Un gato negro', 'correct' => ['un', 'gato', 'negro'], 'extra' => ['blanco']],
                            'de' => ['sentence' => 'Eine schwarze Katze', 'correct' => ['eine', 'schwarze', 'Katze'], 'extra' => ['weiß']],
                            'ja' => ['sentence' => '黒い猫', 'correct' => ['黒い', '猫'], 'extra' => ['白い']],
                            'ko' => ['sentence' => '검은 고양이', 'correct' => ['검은', '고양이'], 'extra' => ['하얀']],
                        ],
                    ],
                    'b' => [
                        'words' => ['beyaz', 'bir', 'köpek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A white dog', 'correct' => ['a', 'white', 'dog'], 'extra' => ['black']],
                            'az' => ['sentence' => 'bir ağ it', 'correct' => ['bir', 'ağ', 'it'], 'extra' => ['qara']],
                            'ar' => ['sentence' => 'أبيض كلب', 'correct' => ['أبيض', 'كلب'], 'extra' => ['أسود']],
                            'ru' => ['sentence' => 'белый собака', 'correct' => ['белый', 'собака'], 'extra' => ['чёрный']],
                            'fr' => ['sentence' => 'Un chien blanc', 'correct' => ['un', 'chien', 'blanc'], 'extra' => ['noir']],
                            'es' => ['sentence' => 'Un perro blanco', 'correct' => ['un', 'perro', 'blanco'], 'extra' => ['negro']],
                            'de' => ['sentence' => 'Ein weißer Hund', 'correct' => ['ein', 'weißer', 'Hund'], 'extra' => ['schwarz']],
                            'ja' => ['sentence' => '白い犬', 'correct' => ['白い', '犬'], 'extra' => ['黒い']],
                            'ko' => ['sentence' => '하얀 개', 'correct' => ['하얀', '개'], 'extra' => ['검은']],
                        ],
                    ],
                    'c' => [
                        'words' => ['siyah', 'bir', 'kedi', 've', 'beyaz', 'bir', 'köpek'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A black cat and a white dog', 'correct' => ['a', 'black', 'cat', 'and', 'a', 'white', 'dog'], 'extra' => ['blue']],
                            'az' => ['sentence' => 'bir qara pişik və bir ağ it', 'correct' => ['bir', 'qara', 'pişik', 'və', 'bir', 'ağ', 'it'], 'extra' => ['mavi']],
                            'ar' => ['sentence' => 'أسود قط و أبيض كلب', 'correct' => ['أسود', 'قط', 'و', 'أبيض', 'كلب'], 'extra' => ['أزرق']],
                            'ru' => ['sentence' => 'чёрный кот и белый собака', 'correct' => ['чёрный', 'кот', 'и', 'белый', 'собака'], 'extra' => ['синий']],
                            'fr' => ['sentence' => 'Un chat noir et un chien blanc', 'correct' => ['un', 'chat', 'noir', 'et', 'un', 'chien', 'blanc'], 'extra' => ['bleu']],
                            'es' => ['sentence' => 'Un gato negro y un perro blanco', 'correct' => ['un', 'gato', 'negro', 'y', 'un', 'perro', 'blanco'], 'extra' => ['azul']],
                            'de' => ['sentence' => 'Eine schwarze Katze und ein weißer Hund', 'correct' => ['eine', 'schwarze', 'Katze', 'und', 'ein', 'weißer', 'Hund'], 'extra' => ['blau']],
                            'ja' => ['sentence' => '黒い猫と白い犬', 'correct' => ['黒い', '猫', 'と', '白い', '犬'], 'extra' => ['青い']],
                            'ko' => ['sentence' => '검은 고양이와 하얀 개', 'correct' => ['검은', '고양이와', '하얀', '개'], 'extra' => ['파란']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Big & Small', 4,
                pictures: [['tr' => 'Büyük', 'img' => 'big'], ['tr' => 'Küçük', 'img' => 'small']],
                plain: [['tr' => 'Ev'], ['tr' => 'Kedi']],
                phrases: [
                    'a' => [
                        'words' => ['büyük', 'bir', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big house', 'correct' => ['a', 'big', 'house'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bir böyük ev', 'correct' => ['bir', 'böyük', 'ev'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'كبير بيت', 'correct' => ['كبير', 'بيت'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'большой дом', 'correct' => ['большой', 'дом'], 'extra' => ['маленький']],
                            'fr' => ['sentence' => 'Une grande maison', 'correct' => ['une', 'grande', 'maison'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'Una casa grande', 'correct' => ['una', 'casa', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Ein großes Haus', 'correct' => ['ein', 'großes', 'Haus'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '大きい家', 'correct' => ['大きい', '家'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '큰 집', 'correct' => ['큰', '집'], 'extra' => ['작은']],
                        ],
                    ],
                    'b' => [
                        'words' => ['küçük', 'bir', 'kedi'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A small cat', 'correct' => ['a', 'small', 'cat'], 'extra' => ['big']],
                            'az' => ['sentence' => 'bir kiçik pişik', 'correct' => ['bir', 'kiçik', 'pişik'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'صغير قط', 'correct' => ['صغير', 'قط'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'маленький кот', 'correct' => ['маленький', 'кот'], 'extra' => ['большой']],
                            'fr' => ['sentence' => 'Un petit chat', 'correct' => ['un', 'petit', 'chat'], 'extra' => ['grand']],
                            'es' => ['sentence' => 'Un gato pequeño', 'correct' => ['un', 'gato', 'pequeño'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Eine kleine Katze', 'correct' => ['eine', 'kleine', 'Katze'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '小さい猫', 'correct' => ['小さい', '猫'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 고양이', 'correct' => ['작은', '고양이'], 'extra' => ['큰']],
                        ],
                    ],
                    'c' => [
                        'words' => ['büyük', 'bir', 'ev', 've', 'küçük', 'bir', 'kedi'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A big house and a small cat', 'correct' => ['a', 'big', 'house', 'and', 'a', 'small', 'cat'], 'extra' => ['black']],
                            'az' => ['sentence' => 'bir böyük ev və bir kiçik pişik', 'correct' => ['bir', 'böyük', 'ev', 'və', 'bir', 'kiçik', 'pişik'], 'extra' => ['qara']],
                            'ar' => ['sentence' => 'كبير بيت و صغير قط', 'correct' => ['كبير', 'بيت', 'و', 'صغير', 'قط'], 'extra' => ['أسود']],
                            'ru' => ['sentence' => 'большой дом и маленький кот', 'correct' => ['большой', 'дом', 'и', 'маленький', 'кот'], 'extra' => ['чёрный']],
                            'fr' => ['sentence' => 'Une grande maison et un petit chat', 'correct' => ['une', 'grande', 'maison', 'et', 'un', 'petit', 'chat'], 'extra' => ['noir']],
                            'es' => ['sentence' => 'Una casa grande y un gato pequeño', 'correct' => ['una', 'casa', 'grande', 'y', 'un', 'gato', 'pequeño'], 'extra' => ['negro']],
                            'de' => ['sentence' => 'Ein großes Haus und eine kleine Katze', 'correct' => ['ein', 'großes', 'Haus', 'und', 'eine', 'kleine', 'Katze'], 'extra' => ['schwarz']],
                            'ja' => ['sentence' => '大きい家と小さい猫', 'correct' => ['大きい', '家', 'と', '小さい', '猫'], 'extra' => ['黒い']],
                            'ko' => ['sentence' => '큰 집과 작은 고양이', 'correct' => ['큰', '집과', '작은', '고양이'], 'extra' => ['검은']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Describing Things', 5,
                pictures: [['tr' => 'Kırmızı', 'img' => 'red'], ['tr' => 'Büyük', 'img' => 'big']],
                plain: [['tr' => 'Elma'], ['tr' => 'Kitap']],
                phrases: [
                    'a' => [
                        'words' => ['kırmızı', 'bir', 'elma', 'yemek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat a red apple', 'correct' => ['to eat', 'a', 'red', 'apple'], 'extra' => ['big']],
                            'az' => ['sentence' => 'yemək yemək bir qırmızı alma', 'correct' => ['yemək yemək', 'bir', 'qırmızı', 'alma'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'الأكل أحمر تفاحة', 'correct' => ['الأكل', 'أحمر', 'تفاحة'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'кушать красный яблоко', 'correct' => ['кушать', 'красный', 'яблоко'], 'extra' => ['большой']],
                            'fr' => ['sentence' => 'Manger une pomme rouge', 'correct' => ['manger', 'une', 'pomme', 'rouge'], 'extra' => ['grand']],
                            'es' => ['sentence' => 'Comer una manzana roja', 'correct' => ['comer', 'una', 'manzana', 'roja'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Einen roten Apfel essen', 'correct' => ['einen', 'roten', 'Apfel', 'essen'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '赤いりんごを食べる', 'correct' => ['赤い', 'りんご', 'を', '食べる'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '빨간 사과를 먹다', 'correct' => ['빨간', '사과를', '먹다'], 'extra' => ['큰']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'benim', 'büyük', 'kitabım'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my big book', 'correct' => ['this is', 'my', 'big', 'book'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bu mənim böyük kitab', 'correct' => ['bu', 'mənim', 'böyük', 'kitab'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'هذا كبير كتاب', 'correct' => ['هذا', 'كبير', 'كتاب'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'это мой большой книга', 'correct' => ['это', 'мой', 'большой', 'книга'], 'extra' => ['маленький']],
                            'fr' => ['sentence' => 'Ceci est mon grand livre', 'correct' => ['ceci est', 'mon', 'grand', 'livre'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'Este es mi libro grande', 'correct' => ['este es', 'mi', 'libro', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Das ist mein großes Buch', 'correct' => ['das ist', 'mein', 'großes', 'Buch'], 'extra' => ['klein']],
                            'ja' => ['sentence' => 'これは私の大きい本です', 'correct' => ['これは', '私の', '大きい', '本', 'です'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '이것은 내 큰 책입니다', 'correct' => ['이것은', '내', '큰', '책입니다'], 'extra' => ['작은']],
                        ],
                    ],
                    'c' => [
                        'words' => ['küçük', 'bir', 'kitap', 've', 'kırmızı', 'bir', 'kalem'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A small book and a red pen', 'correct' => ['a', 'small', 'book', 'and', 'a', 'red', 'pen'], 'extra' => ['white']],
                            'az' => ['sentence' => 'bir kiçik kitab və bir qırmızı qələm', 'correct' => ['bir', 'kiçik', 'kitab', 'və', 'bir', 'qırmızı', 'qələm'], 'extra' => ['ağ']],
                            'ar' => ['sentence' => 'صغير كتاب و أحمر قلم', 'correct' => ['صغير', 'كتاب', 'و', 'أحمر', 'قلم'], 'extra' => ['أبيض']],
                            'ru' => ['sentence' => 'маленький книга и красный ручка', 'correct' => ['маленький', 'книга', 'и', 'красный', 'ручка'], 'extra' => ['белый']],
                            'fr' => ['sentence' => 'Un petit livre et un stylo rouge', 'correct' => ['un', 'petit', 'livre', 'et', 'un', 'stylo', 'rouge'], 'extra' => ['blanc']],
                            'es' => ['sentence' => 'Un libro pequeño y un bolígrafo rojo', 'correct' => ['un', 'libro', 'pequeño', 'y', 'un', 'bolígrafo', 'rojo'], 'extra' => ['blanco']],
                            'de' => ['sentence' => 'Ein kleines Buch und ein roter Stift', 'correct' => ['ein', 'kleines', 'Buch', 'und', 'ein', 'roter', 'Stift'], 'extra' => ['weiß']],
                            'ja' => ['sentence' => '小さい本と赤いペン', 'correct' => ['小さい', '本', 'と', '赤い', 'ペン'], 'extra' => ['白い']],
                            'ko' => ['sentence' => '작은 책과 빨간 펜', 'correct' => ['작은', '책과', '빨간', '펜'], 'extra' => ['하얀']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
