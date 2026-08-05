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
                            'es' => ['sentence' => 'Un libro', 'correct' => ['uno', 'libro'], 'extra' => ['dos', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['eins', 'Buch'], 'extra' => ['zwei', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['deux', 'stylo']],
                            'ja' => ['sentence' => '本一冊', 'correct' => ['本', '一冊'], 'extra' => ['二', 'ペン']],
                        ],
                    ],
                    'b' => [
                        'words' => ['펜', '두', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'two pens', 'correct' => ['two', 'pens'], 'extra' => ['one', 'book']],
                            'es' => ['sentence' => 'Dos bolígrafos', 'correct' => ['dos', 'bolígrafos'], 'extra' => ['uno', 'libro']],
                            'de' => ['sentence' => 'Zwei Kugelschreiber', 'correct' => ['zwei', 'Kugelschreiber'], 'extra' => ['eins', 'Buch']],
                            'fr' => ['sentence' => 'Deux stylos', 'correct' => ['deux', 'stylos'], 'extra' => ['un', 'livre']],
                            'ja' => ['sentence' => 'ペン二本', 'correct' => ['ペン', '二本'], 'extra' => ['一', '本']],
                        ],
                    ],
                    'c' => [
                        'words' => ['책과', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['two']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Ein Buch und ein Kugelschreiber', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Kugelschreiber'], 'extra' => ['zwei']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['deux']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['二']],
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
                            'es' => ['sentence' => 'Un libro rojo', 'correct' => ['un', 'libro', 'rojo'], 'extra' => ['azul', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein rotes Buch', 'correct' => ['ein', 'rot', 'Buch'], 'extra' => ['blau', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre rouge', 'correct' => ['un', 'livre', 'rouge'], 'extra' => ['bleu', 'stylo']],
                            'ja' => ['sentence' => '赤い本', 'correct' => ['赤い', '本'], 'extra' => ['青']],
                        ],
                    ],
                    'b' => [
                        'words' => ['파란', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a blue pen', 'correct' => ['a', 'blue', 'pen'], 'extra' => ['red']],
                            'es' => ['sentence' => 'Un bolígrafo azul', 'correct' => ['un', 'bolígrafo', 'azul'], 'extra' => ['rojo', 'libro']],
                            'de' => ['sentence' => 'Ein blauer Kugelschreiber', 'correct' => ['ein', 'blau', 'Kugelschreiber'], 'extra' => ['rot', 'Buch']],
                            'fr' => ['sentence' => 'Un stylo bleu', 'correct' => ['un', 'stylo', 'bleu'], 'extra' => ['rouge', 'livre']],
                            'ja' => ['sentence' => '青いペン', 'correct' => ['青い', 'ペン'], 'extra' => ['赤']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빨간', '책과', '파란', '펜'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a red book and a blue pen', 'correct' => ['a', 'red', 'book', 'and', 'a', 'blue', 'pen'], 'extra' => ['green']],
                            'es' => ['sentence' => 'Un libro rojo y un bolígrafo azul', 'correct' => ['un', 'libro', 'rojo', 'y', 'un', 'bolígrafo', 'azul'], 'extra' => ['verde']],
                            'de' => ['sentence' => 'Ein rotes Buch und ein blauer Kugelschreiber', 'correct' => ['ein', 'rot', 'Buch', 'und', 'ein', 'blau', 'Kugelschreiber'], 'extra' => ['grün']],
                            'fr' => ['sentence' => 'Un livre rouge et un stylo bleu', 'correct' => ['un', 'livre', 'rouge', 'et', 'un', 'stylo', 'bleu'], 'extra' => ['vert']],
                            'ja' => ['sentence' => '赤い本と青いペン', 'correct' => ['赤い', '本', 'と', '青い', 'ペン'], 'extra' => ['緑']],
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
                            'es' => ['sentence' => 'Un bolígrafo verde', 'correct' => ['un', 'bolígrafo', 'verde'], 'extra' => ['amarillo', 'libro']],
                            'de' => ['sentence' => 'Ein grüner Kugelschreiber', 'correct' => ['ein', 'grün', 'Kugelschreiber'], 'extra' => ['gelb', 'Buch']],
                            'fr' => ['sentence' => 'Un stylo vert', 'correct' => ['un', 'stylo', 'vert'], 'extra' => ['jaune', 'livre']],
                            'ja' => ['sentence' => '緑のペン', 'correct' => ['緑の', 'ペン'], 'extra' => ['黄色']],
                        ],
                    ],
                    'b' => [
                        'words' => ['노란', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a yellow book', 'correct' => ['a', 'yellow', 'book'], 'extra' => ['green']],
                            'es' => ['sentence' => 'Un libro amarillo', 'correct' => ['un', 'libro', 'amarillo'], 'extra' => ['verde', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein gelbes Buch', 'correct' => ['ein', 'gelb', 'Buch'], 'extra' => ['grün', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre jaune', 'correct' => ['un', 'livre', 'jaune'], 'extra' => ['vert', 'stylo']],
                            'ja' => ['sentence' => '黄色い本', 'correct' => ['黄色い', '本'], 'extra' => ['緑']],
                        ],
                    ],
                    'c' => [
                        'words' => ['초록', '책과', '노란', '펜'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a green book and a yellow pen', 'correct' => ['a', 'green', 'book', 'and', 'a', 'yellow', 'pen'], 'extra' => ['red']],
                            'es' => ['sentence' => 'Un libro verde y un bolígrafo amarillo', 'correct' => ['un', 'libro', 'verde', 'y', 'un', 'bolígrafo', 'amarillo'], 'extra' => ['rojo']],
                            'de' => ['sentence' => 'Ein grünes Buch und ein gelber Kugelschreiber', 'correct' => ['ein', 'grün', 'Buch', 'und', 'ein', 'gelb', 'Kugelschreiber'], 'extra' => ['rot']],
                            'fr' => ['sentence' => 'Un livre vert et un stylo jaune', 'correct' => ['un', 'livre', 'vert', 'et', 'un', 'stylo', 'jaune'], 'extra' => ['rouge']],
                            'ja' => ['sentence' => '緑の本と黄色いペン', 'correct' => ['緑の', '本', 'と', '黄色い', 'ペン'], 'extra' => ['赤']],
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
                            'es' => ['sentence' => 'Un bolígrafo negro', 'correct' => ['un', 'bolígrafo', 'negro'], 'extra' => ['blanco', 'libro']],
                            'de' => ['sentence' => 'Ein schwarzer Kugelschreiber', 'correct' => ['ein', 'schwarz', 'Kugelschreiber'], 'extra' => ['weiß', 'Buch']],
                            'fr' => ['sentence' => 'Un stylo noir', 'correct' => ['un', 'stylo', 'noir'], 'extra' => ['blanc', 'livre']],
                            'ja' => ['sentence' => '黒いペン', 'correct' => ['黒い', 'ペン'], 'extra' => ['白']],
                        ],
                    ],
                    'b' => [
                        'words' => ['하얀', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a white book', 'correct' => ['a', 'white', 'book'], 'extra' => ['black']],
                            'es' => ['sentence' => 'Un libro blanco', 'correct' => ['un', 'libro', 'blanco'], 'extra' => ['negro', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein weißes Buch', 'correct' => ['ein', 'weiß', 'Buch'], 'extra' => ['schwarz', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Un livre blanc', 'correct' => ['un', 'livre', 'blanc'], 'extra' => ['noir', 'stylo']],
                            'ja' => ['sentence' => '白い本', 'correct' => ['白い', '本'], 'extra' => ['黒']],
                        ],
                    ],
                    'c' => [
                        'words' => ['검은', '책과', '하얀', '펜'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a black book and a white pen', 'correct' => ['a', 'black', 'book', 'and', 'a', 'white', 'pen'], 'extra' => ['blue']],
                            'es' => ['sentence' => 'Un libro negro y un bolígrafo blanco', 'correct' => ['un', 'libro', 'negro', 'y', 'un', 'bolígrafo', 'blanco'], 'extra' => ['azul']],
                            'de' => ['sentence' => 'Ein schwarzes Buch und ein weißer Kugelschreiber', 'correct' => ['ein', 'schwarz', 'Buch', 'und', 'ein', 'weiß', 'Kugelschreiber'], 'extra' => ['blau']],
                            'fr' => ['sentence' => 'Un livre noir et un stylo blanc', 'correct' => ['un', 'livre', 'noir', 'et', 'un', 'stylo', 'blanc'], 'extra' => ['bleu']],
                            'ja' => ['sentence' => '黒い本と白いペン', 'correct' => ['黒い', '本', 'と', '白い', 'ペン'], 'extra' => ['青']],
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
                            'es' => ['sentence' => 'Tres libros', 'correct' => ['tres', 'libros'], 'extra' => ['diez', 'bolígrafos']],
                            'de' => ['sentence' => 'Drei Bücher', 'correct' => ['drei', 'Bücher'], 'extra' => ['zehn', 'Kugelschreiber']],
                            'fr' => ['sentence' => 'Trois livres', 'correct' => ['trois', 'livres'], 'extra' => ['dix', 'stylos']],
                            'ja' => ['sentence' => '本三冊', 'correct' => ['本', '三冊'], 'extra' => ['十']],
                        ],
                    ],
                    'b' => [
                        'words' => ['펜', '열', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'ten pens', 'correct' => ['ten', 'pens'], 'extra' => ['three']],
                            'es' => ['sentence' => 'Diez bolígrafos', 'correct' => ['diez', 'bolígrafos'], 'extra' => ['tres', 'libros']],
                            'de' => ['sentence' => 'Zehn Kugelschreiber', 'correct' => ['zehn', 'Kugelschreiber'], 'extra' => ['drei', 'Bücher']],
                            'fr' => ['sentence' => 'Dix stylos', 'correct' => ['dix', 'stylos'], 'extra' => ['trois', 'livres']],
                            'ja' => ['sentence' => 'ペン十本', 'correct' => ['ペン', '十本'], 'extra' => ['三']],
                        ],
                    ],
                    'c' => [
                        'words' => ['책과', '펜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['three', 'ten']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['tres', 'diez']],
                            'de' => ['sentence' => 'Ein Buch und ein Kugelschreiber', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Kugelschreiber'], 'extra' => ['drei', 'zehn']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['trois', 'dix']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['三', '十']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
