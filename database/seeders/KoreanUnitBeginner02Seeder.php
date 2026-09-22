<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner02Seeder extends Seeder
{
    private const PICTURES = ['책' => 'book', '펜' => 'pen'];

    /**
     * Korean Chapter 1 (Beginner), Unit 2, the Korean twin of the English
     * "Unit 2: Colours & Counting" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, '유닛 2: 색깔과 숫자', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 책 · 펜', 1,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '펜', 'img' => 'pen']],
                plain: [['ko' => '하나'], ['ko' => '둘']],
                phrases: [
                    'a' => [
                        'words' => ['책', '한', '권'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'one book', 'correct' => ['one', 'book'], 'extra' => ['two', 'pen']],
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['iki', 'qələm']],
                            'ar' => ['sentence' => 'واحد كتاب', 'correct' => ['واحد', 'كتاب'], 'extra' => ['اثنان', 'قلم']],
                            'ru' => ['sentence' => 'один книга', 'correct' => ['один', 'книга'], 'extra' => ['два', 'ручка']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['uno', 'libro'], 'extra' => ['dos', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['eins', 'Buch'], 'extra' => ['zwei', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['deux', 'stylo']],
                            'ja' => ['sentence' => '本一冊', 'correct' => ['本', '一冊'], 'extra' => ['二', 'ペン']],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['iki', 'kalem']],
                        ],
                    ],
                    'b' => [
                        'words' => ['펜', '두', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'two pens', 'correct' => ['two', 'pens'], 'extra' => ['one', 'book']],
                            'az' => ['sentence' => 'iki qələmlər', 'correct' => ['iki', 'qələmlər'], 'extra' => ['bir', 'kitab']],
                            'ar' => ['sentence' => 'اثنان أقلام', 'correct' => ['اثنان', 'أقلام'], 'extra' => ['واحد', 'كتاب']],
                            'ru' => ['sentence' => 'два ручки', 'correct' => ['два', 'ручки'], 'extra' => ['один', 'книга']],
                            'es' => ['sentence' => 'Dos bolígrafos', 'correct' => ['dos', 'bolígrafos'], 'extra' => ['uno', 'libro']],
                            'de' => ['sentence' => 'Zwei Kugelschreiber', 'correct' => ['zwei', 'Kugelschreiber'], 'extra' => ['eins', 'Buch']],
                            'fr' => ['sentence' => 'Deux stylos', 'correct' => ['deux', 'stylos'], 'extra' => ['un', 'livre']],
                            'ja' => ['sentence' => 'ペン二本', 'correct' => ['ペン', '二本'], 'extra' => ['一', '本']],
                            'tr' => ['sentence' => 'iki kalem', 'correct' => ['iki', 'kalem'], 'extra' => ['bir', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['책과', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['two']],
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['iki']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['اثنان']],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['два']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Ein Buch und ein Kugelschreiber', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Kugelschreiber'], 'extra' => ['zwei']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['deux']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['二']],
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => ['iki']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 책 · 펜', 2,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '펜', 'img' => 'pen']],
                plain: [['ko' => '빨간색'], ['ko' => '파란색']],
                phrases: [
                    'a' => [
                        'words' => ['빨간', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a red book', 'correct' => ['a', 'red', 'book'], 'extra' => ['blue']],
                            'az' => ['sentence' => 'bir qırmızı kitab', 'correct' => ['bir', 'qırmızı', 'kitab'], 'extra' => ['mavi']],
                            'ar' => ['sentence' => 'أحمر كتاب', 'correct' => ['أحمر', 'كتاب'], 'extra' => ['أزرق']],
                            'ru' => ['sentence' => 'красный книга', 'correct' => ['красный', 'книга'], 'extra' => ['синий']],
                            'es' => ['sentence' => 'Un libro rojo', 'correct' => ['un', 'libro', 'rojo'], 'extra' => ['azul', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein rotes Buch', 'correct' => ['ein', 'rot', 'Buch'], 'extra' => ['blau', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre rouge', 'correct' => ['un', 'livre', 'rouge'], 'extra' => ['bleu', 'stylo']],
                            'ja' => ['sentence' => '赤い本', 'correct' => ['赤い', '本'], 'extra' => ['青']],
                            'tr' => ['sentence' => 'kırmızı bir kitap', 'correct' => ['kırmızı', 'bir', 'kitap'], 'extra' => ['mavi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['파란', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a blue pen', 'correct' => ['a', 'blue', 'pen'], 'extra' => ['red']],
                            'az' => ['sentence' => 'bir mavi qələm', 'correct' => ['bir', 'mavi', 'qələm'], 'extra' => ['qırmızı']],
                            'ar' => ['sentence' => 'أزرق قلم', 'correct' => ['أزرق', 'قلم'], 'extra' => ['أحمر']],
                            'ru' => ['sentence' => 'синий ручка', 'correct' => ['синий', 'ручка'], 'extra' => ['красный']],
                            'es' => ['sentence' => 'Un bolígrafo azul', 'correct' => ['un', 'bolígrafo', 'azul'], 'extra' => ['rojo', 'libro']],
                            'de' => ['sentence' => 'Ein blauer Kugelschreiber', 'correct' => ['ein', 'blau', 'Kugelschreiber'], 'extra' => ['rot', 'Buch']],
                            'fr' => ['sentence' => 'Un stylo bleu', 'correct' => ['un', 'stylo', 'bleu'], 'extra' => ['rouge', 'livre']],
                            'ja' => ['sentence' => '青いペン', 'correct' => ['青い', 'ペン'], 'extra' => ['赤']],
                            'tr' => ['sentence' => 'mavi bir kalem', 'correct' => ['mavi', 'bir', 'kalem'], 'extra' => ['kırmızı']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빨간', '책과', '파란', '펜'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a red book and a blue pen', 'correct' => ['a', 'red', 'book', 'and', 'a', 'blue', 'pen'], 'extra' => ['green']],
                            'az' => ['sentence' => 'bir qırmızı kitab və bir mavi qələm', 'correct' => ['bir', 'qırmızı', 'kitab', 'və', 'bir', 'mavi', 'qələm'], 'extra' => ['yaşıl']],
                            'ar' => ['sentence' => 'أحمر كتاب و أزرق قلم', 'correct' => ['أحمر', 'كتاب', 'و', 'أزرق', 'قلم'], 'extra' => ['أخضر']],
                            'ru' => ['sentence' => 'красный книга и синий ручка', 'correct' => ['красный', 'книга', 'и', 'синий', 'ручка'], 'extra' => ['зелёный']],
                            'es' => ['sentence' => 'Un libro rojo y un bolígrafo azul', 'correct' => ['un', 'libro', 'rojo', 'y', 'un', 'bolígrafo', 'azul'], 'extra' => ['verde']],
                            'de' => ['sentence' => 'Ein rotes Buch und ein blauer Kugelschreiber', 'correct' => ['ein', 'rot', 'Buch', 'und', 'ein', 'blau', 'Kugelschreiber'], 'extra' => ['grün']],
                            'fr' => ['sentence' => 'Un livre rouge et un stylo bleu', 'correct' => ['un', 'livre', 'rouge', 'et', 'un', 'stylo', 'bleu'], 'extra' => ['vert']],
                            'ja' => ['sentence' => '赤い本と青いペン', 'correct' => ['赤い', '本', 'と', '青い', 'ペン'], 'extra' => ['緑']],
                            'tr' => ['sentence' => 'kırmızı bir kitap ve mavi bir kalem', 'correct' => ['kırmızı', 'bir', 'kitap', 've', 'mavi', 'bir', 'kalem'], 'extra' => ['yeşil']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 책 · 펜', 3,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '펜', 'img' => 'pen']],
                plain: [['ko' => '초록색'], ['ko' => '노란색']],
                phrases: [
                    'a' => [
                        'words' => ['초록', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a green pen', 'correct' => ['a', 'green', 'pen'], 'extra' => ['yellow']],
                            'az' => ['sentence' => 'bir yaşıl qələm', 'correct' => ['bir', 'yaşıl', 'qələm'], 'extra' => ['sarı']],
                            'ar' => ['sentence' => 'أخضر قلم', 'correct' => ['أخضر', 'قلم'], 'extra' => ['أصفر']],
                            'ru' => ['sentence' => 'зелёный ручка', 'correct' => ['зелёный', 'ручка'], 'extra' => ['жёлтый']],
                            'es' => ['sentence' => 'Un bolígrafo verde', 'correct' => ['un', 'bolígrafo', 'verde'], 'extra' => ['amarillo', 'libro']],
                            'de' => ['sentence' => 'Ein grüner Kugelschreiber', 'correct' => ['ein', 'grün', 'Kugelschreiber'], 'extra' => ['gelb', 'Buch']],
                            'fr' => ['sentence' => 'Un stylo vert', 'correct' => ['un', 'stylo', 'vert'], 'extra' => ['jaune', 'livre']],
                            'ja' => ['sentence' => '緑のペン', 'correct' => ['緑の', 'ペン'], 'extra' => ['黄色']],
                            'tr' => ['sentence' => 'yeşil bir kalem', 'correct' => ['yeşil', 'bir', 'kalem'], 'extra' => ['sarı']],
                        ],
                    ],
                    'b' => [
                        'words' => ['노란', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a yellow book', 'correct' => ['a', 'yellow', 'book'], 'extra' => ['green']],
                            'az' => ['sentence' => 'bir sarı kitab', 'correct' => ['bir', 'sarı', 'kitab'], 'extra' => ['yaşıl']],
                            'ar' => ['sentence' => 'أصفر كتاب', 'correct' => ['أصفر', 'كتاب'], 'extra' => ['أخضر']],
                            'ru' => ['sentence' => 'жёлтый книга', 'correct' => ['жёлтый', 'книга'], 'extra' => ['зелёный']],
                            'es' => ['sentence' => 'Un libro amarillo', 'correct' => ['un', 'libro', 'amarillo'], 'extra' => ['verde', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein gelbes Buch', 'correct' => ['ein', 'gelb', 'Buch'], 'extra' => ['grün', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre jaune', 'correct' => ['un', 'livre', 'jaune'], 'extra' => ['vert', 'stylo']],
                            'ja' => ['sentence' => '黄色い本', 'correct' => ['黄色い', '本'], 'extra' => ['緑']],
                            'tr' => ['sentence' => 'sarı bir kitap', 'correct' => ['sarı', 'bir', 'kitap'], 'extra' => ['yeşil']],
                        ],
                    ],
                    'c' => [
                        'words' => ['초록', '책과', '노란', '펜'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a green book and a yellow pen', 'correct' => ['a', 'green', 'book', 'and', 'a', 'yellow', 'pen'], 'extra' => ['red']],
                            'az' => ['sentence' => 'bir yaşıl kitab və bir sarı qələm', 'correct' => ['bir', 'yaşıl', 'kitab', 'və', 'bir', 'sarı', 'qələm'], 'extra' => ['qırmızı']],
                            'ar' => ['sentence' => 'أخضر كتاب و أصفر قلم', 'correct' => ['أخضر', 'كتاب', 'و', 'أصفر', 'قلم'], 'extra' => ['أحمر']],
                            'ru' => ['sentence' => 'зелёный книга и жёлтый ручка', 'correct' => ['зелёный', 'книга', 'и', 'жёлтый', 'ручка'], 'extra' => ['красный']],
                            'es' => ['sentence' => 'Un libro verde y un bolígrafo amarillo', 'correct' => ['un', 'libro', 'verde', 'y', 'un', 'bolígrafo', 'amarillo'], 'extra' => ['rojo']],
                            'de' => ['sentence' => 'Ein grünes Buch und ein gelber Kugelschreiber', 'correct' => ['ein', 'grün', 'Buch', 'und', 'ein', 'gelb', 'Kugelschreiber'], 'extra' => ['rot']],
                            'fr' => ['sentence' => 'Un livre vert et un stylo jaune', 'correct' => ['un', 'livre', 'vert', 'et', 'un', 'stylo', 'jaune'], 'extra' => ['rouge']],
                            'ja' => ['sentence' => '緑の本と黄色いペン', 'correct' => ['緑の', '本', 'と', '黄色い', 'ペン'], 'extra' => ['赤']],
                            'tr' => ['sentence' => 'yeşil bir kitap ve sarı bir kalem', 'correct' => ['yeşil', 'bir', 'kitap', 've', 'sarı', 'bir', 'kalem'], 'extra' => ['kırmızı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 책 · 펜', 4,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '펜', 'img' => 'pen']],
                plain: [['ko' => '검은색'], ['ko' => '하얀색']],
                phrases: [
                    'a' => [
                        'words' => ['검은', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a black pen', 'correct' => ['a', 'black', 'pen'], 'extra' => ['white']],
                            'az' => ['sentence' => 'bir qara qələm', 'correct' => ['bir', 'qara', 'qələm'], 'extra' => ['ağ']],
                            'ar' => ['sentence' => 'أسود قلم', 'correct' => ['أسود', 'قلم'], 'extra' => ['أبيض']],
                            'ru' => ['sentence' => 'чёрный ручка', 'correct' => ['чёрный', 'ручка'], 'extra' => ['белый']],
                            'es' => ['sentence' => 'Un bolígrafo negro', 'correct' => ['un', 'bolígrafo', 'negro'], 'extra' => ['blanco', 'libro']],
                            'de' => ['sentence' => 'Ein schwarzer Kugelschreiber', 'correct' => ['ein', 'schwarz', 'Kugelschreiber'], 'extra' => ['weiß', 'Buch']],
                            'fr' => ['sentence' => 'Un stylo noir', 'correct' => ['un', 'stylo', 'noir'], 'extra' => ['blanc', 'livre']],
                            'ja' => ['sentence' => '黒いペン', 'correct' => ['黒い', 'ペン'], 'extra' => ['白']],
                            'tr' => ['sentence' => 'siyah bir kalem', 'correct' => ['siyah', 'bir', 'kalem'], 'extra' => ['beyaz']],
                        ],
                    ],
                    'b' => [
                        'words' => ['하얀', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a white book', 'correct' => ['a', 'white', 'book'], 'extra' => ['black']],
                            'az' => ['sentence' => 'bir ağ kitab', 'correct' => ['bir', 'ağ', 'kitab'], 'extra' => ['qara']],
                            'ar' => ['sentence' => 'أبيض كتاب', 'correct' => ['أبيض', 'كتاب'], 'extra' => ['أسود']],
                            'ru' => ['sentence' => 'белый книга', 'correct' => ['белый', 'книга'], 'extra' => ['чёрный']],
                            'es' => ['sentence' => 'Un libro blanco', 'correct' => ['un', 'libro', 'blanco'], 'extra' => ['negro', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein weißes Buch', 'correct' => ['ein', 'weiß', 'Buch'], 'extra' => ['schwarz', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre blanc', 'correct' => ['un', 'livre', 'blanc'], 'extra' => ['noir', 'stylo']],
                            'ja' => ['sentence' => '白い本', 'correct' => ['白い', '本'], 'extra' => ['黒']],
                            'tr' => ['sentence' => 'beyaz bir kitap', 'correct' => ['beyaz', 'bir', 'kitap'], 'extra' => ['siyah']],
                        ],
                    ],
                    'c' => [
                        'words' => ['검은', '책과', '하얀', '펜'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a black book and a white pen', 'correct' => ['a', 'black', 'book', 'and', 'a', 'white', 'pen'], 'extra' => ['blue']],
                            'az' => ['sentence' => 'bir qara kitab və bir ağ qələm', 'correct' => ['bir', 'qara', 'kitab', 'və', 'bir', 'ağ', 'qələm'], 'extra' => ['mavi']],
                            'ar' => ['sentence' => 'أسود كتاب و أبيض قلم', 'correct' => ['أسود', 'كتاب', 'و', 'أبيض', 'قلم'], 'extra' => ['أزرق']],
                            'ru' => ['sentence' => 'чёрный книга и белый ручка', 'correct' => ['чёрный', 'книга', 'и', 'белый', 'ручка'], 'extra' => ['синий']],
                            'es' => ['sentence' => 'Un libro negro y un bolígrafo blanco', 'correct' => ['un', 'libro', 'negro', 'y', 'un', 'bolígrafo', 'blanco'], 'extra' => ['azul']],
                            'de' => ['sentence' => 'Ein schwarzes Buch und ein weißer Kugelschreiber', 'correct' => ['ein', 'schwarz', 'Buch', 'und', 'ein', 'weiß', 'Kugelschreiber'], 'extra' => ['blau']],
                            'fr' => ['sentence' => 'Un livre noir et un stylo blanc', 'correct' => ['un', 'livre', 'noir', 'et', 'un', 'stylo', 'blanc'], 'extra' => ['bleu']],
                            'ja' => ['sentence' => '黒い本と白いペン', 'correct' => ['黒い', '本', 'と', '白い', 'ペン'], 'extra' => ['青']],
                            'tr' => ['sentence' => 'siyah bir kitap ve beyaz bir kalem', 'correct' => ['siyah', 'bir', 'kitap', 've', 'beyaz', 'bir', 'kalem'], 'extra' => ['mavi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 책 · 펜', 5,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '펜', 'img' => 'pen']],
                plain: [['ko' => '셋'], ['ko' => '열']],
                phrases: [
                    'a' => [
                        'words' => ['책', '세', '권'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'three books', 'correct' => ['three', 'books'], 'extra' => ['ten']],
                            'az' => ['sentence' => 'üç kitablar', 'correct' => ['üç', 'kitablar'], 'extra' => ['on']],
                            'ar' => ['sentence' => 'ثلاثة كتب', 'correct' => ['ثلاثة', 'كتب'], 'extra' => ['عشرة']],
                            'ru' => ['sentence' => 'три книги', 'correct' => ['три', 'книги'], 'extra' => ['десять']],
                            'es' => ['sentence' => 'Tres libros', 'correct' => ['tres', 'libros'], 'extra' => ['diez', 'bolígrafos']],
                            'de' => ['sentence' => 'Drei Bücher', 'correct' => ['drei', 'Bücher'], 'extra' => ['zehn', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Trois livres', 'correct' => ['trois', 'livres'], 'extra' => ['dix', 'stylos']],
                            'ja' => ['sentence' => '本三冊', 'correct' => ['本', '三冊'], 'extra' => ['十']],
                            'tr' => ['sentence' => 'üç kitap', 'correct' => ['üç', 'kitap'], 'extra' => ['on']],
                        ],
                    ],
                    'b' => [
                        'words' => ['펜', '열', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'ten pens', 'correct' => ['ten', 'pens'], 'extra' => ['three']],
                            'az' => ['sentence' => 'on qələmlər', 'correct' => ['on', 'qələmlər'], 'extra' => ['üç']],
                            'ar' => ['sentence' => 'عشرة أقلام', 'correct' => ['عشرة', 'أقلام'], 'extra' => ['ثلاثة']],
                            'ru' => ['sentence' => 'десять ручки', 'correct' => ['десять', 'ручки'], 'extra' => ['три']],
                            'es' => ['sentence' => 'Diez bolígrafos', 'correct' => ['diez', 'bolígrafos'], 'extra' => ['tres', 'libros']],
                            'de' => ['sentence' => 'Zehn Kugelschreiber', 'correct' => ['zehn', 'Kugelschreiber'], 'extra' => ['drei', 'Bücher']],
                            'fr' => ['sentence' => 'Dix stylos', 'correct' => ['dix', 'stylos'], 'extra' => ['trois', 'livres']],
                            'ja' => ['sentence' => 'ペン十本', 'correct' => ['ペン', '十本'], 'extra' => ['三']],
                            'tr' => ['sentence' => 'on kalem', 'correct' => ['on', 'kalem'], 'extra' => ['üç']],
                        ],
                    ],
                    'c' => [
                        'words' => ['책과', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['three', 'ten']],
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['üç', 'on']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['ثلاثة', 'عشرة']],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['три', 'десять']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['tres', 'diez']],
                            'de' => ['sentence' => 'Ein Buch und ein Kugelschreiber', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Kugelschreiber'], 'extra' => ['drei', 'zehn']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['trois', 'dix']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['三', '十']],
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => ['üç', 'on']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
