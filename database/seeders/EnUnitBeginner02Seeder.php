<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner02Seeder extends Seeder
{
    private const PICTURES = [
        'Book' => 'book', 'Pen' => 'pen', 'Table' => 'table', 'Chair' => 'chair',
        'House' => 'house', 'Cat' => 'cat',
    ];

    /**
     * English Chapter 1, Unit 2 — colours and counting.
     *
     * Colours and numbers are not picturable, so every lesson keeps the same
     * two picture words (a book and a pen) as its visual anchor and teaches the
     * new colour or number through phrases that attach it to those objects —
     * "a red book", "two pens" — which is also exactly how a beginner first
     * uses them.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Colours & Counting', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Book & A Pen', 1,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Pen', 'img' => 'pen']],
                plain: [['en' => 'One'], ['en' => 'Two']],
                phrases: [
                    'a' => [
                        'words' => ['one', 'book'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro', 'correct' => ['uno', 'libro'], 'extra' => ['dos', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['eins', 'Buch'], 'extra' => ['zwei', 'Kugelschreiber']],
                            'ja' => ['sentence' => '本一冊', 'correct' => ['本', '一冊'], 'extra' => ['二', 'ペン']],
                            'ko' => ['sentence' => '책 한 권', 'correct' => ['책', '한', '권'], 'extra' => ['둘', '펜']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['deux', 'stylo']],
                        ],
                    ],
                    'b' => [
                        'words' => ['two', 'pens'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dos bolígrafos', 'correct' => ['dos', 'bolígrafos'], 'extra' => ['uno', 'libro']],
                            'de' => ['sentence' => 'Zwei Kugelschreiber', 'correct' => ['zwei', 'Kugelschreiber'], 'extra' => ['eins', 'Buch']],
                            'ja' => ['sentence' => 'ペン二本', 'correct' => ['ペン', '二本'], 'extra' => ['一', '本']],
                            'ko' => ['sentence' => '펜 두 개', 'correct' => ['펜', '두', '개'], 'extra' => ['하나', '책']],
                            'fr' => ['sentence' => 'Deux stylos', 'correct' => ['deux', 'stylos'], 'extra' => ['un', 'livre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'book', 'and', 'a', 'pen'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Ein Buch und ein Kugelschreiber', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Kugelschreiber'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['二']],
                            'ko' => ['sentence' => '책과 펜', 'correct' => ['책과', '펜'], 'extra' => ['둘']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['deux']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Red & Blue', 2,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Pen', 'img' => 'pen']],
                plain: [['en' => 'Red'], ['en' => 'Blue']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'red', 'book'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro rojo', 'correct' => ['un', 'libro', 'rojo'], 'extra' => ['azul', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein rotes Buch', 'correct' => ['ein', 'rot', 'Buch'], 'extra' => ['blau', 'Kugelschreiber']],
                            'ja' => ['sentence' => '赤い本', 'correct' => ['赤い', '本'], 'extra' => ['青']],
                            'ko' => ['sentence' => '빨간 책', 'correct' => ['빨간', '책'], 'extra' => ['파란색']],
                            'fr' => ['sentence' => 'Un livre rouge', 'correct' => ['un', 'livre', 'rouge'], 'extra' => ['bleu', 'stylo']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'blue', 'pen'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un bolígrafo azul', 'correct' => ['un', 'bolígrafo', 'azul'], 'extra' => ['rojo', 'libro']],
                            'de' => ['sentence' => 'Ein blauer Kugelschreiber', 'correct' => ['ein', 'blau', 'Kugelschreiber'], 'extra' => ['rot', 'Buch']],
                            'ja' => ['sentence' => '青いペン', 'correct' => ['青い', 'ペン'], 'extra' => ['赤']],
                            'ko' => ['sentence' => '파란 펜', 'correct' => ['파란', '펜'], 'extra' => ['빨간색']],
                            'fr' => ['sentence' => 'Un stylo bleu', 'correct' => ['un', 'stylo', 'bleu'], 'extra' => ['rouge', 'livre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'red', 'book', 'and', 'a', 'blue', 'pen'], 'blank' => 5,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro rojo y un bolígrafo azul', 'correct' => ['un', 'libro', 'rojo', 'y', 'un', 'bolígrafo', 'azul'], 'extra' => ['verde']],
                            'de' => ['sentence' => 'Ein rotes Buch und ein blauer Kugelschreiber', 'correct' => ['ein', 'rot', 'Buch', 'und', 'ein', 'blau', 'Kugelschreiber'], 'extra' => ['grün']],
                            'ja' => ['sentence' => '赤い本と青いペン', 'correct' => ['赤い', '本', 'と', '青い', 'ペン'], 'extra' => ['緑']],
                            'ko' => ['sentence' => '빨간 책과 파란 펜', 'correct' => ['빨간', '책과', '파란', '펜'], 'extra' => ['초록색']],
                            'fr' => ['sentence' => 'Un livre rouge et un stylo bleu', 'correct' => ['un', 'livre', 'rouge', 'et', 'un', 'stylo', 'bleu'], 'extra' => ['vert']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Green & Yellow', 3,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Pen', 'img' => 'pen']],
                plain: [['en' => 'Green'], ['en' => 'Yellow']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'green', 'pen'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un bolígrafo verde', 'correct' => ['un', 'bolígrafo', 'verde'], 'extra' => ['amarillo', 'libro']],
                            'de' => ['sentence' => 'Ein grüner Kugelschreiber', 'correct' => ['ein', 'grün', 'Kugelschreiber'], 'extra' => ['gelb', 'Buch']],
                            'ja' => ['sentence' => '緑のペン', 'correct' => ['緑の', 'ペン'], 'extra' => ['黄色']],
                            'ko' => ['sentence' => '초록 펜', 'correct' => ['초록', '펜'], 'extra' => ['노란색']],
                            'fr' => ['sentence' => 'Un stylo vert', 'correct' => ['un', 'stylo', 'vert'], 'extra' => ['jaune', 'livre']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'yellow', 'book'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro amarillo', 'correct' => ['un', 'libro', 'amarillo'], 'extra' => ['verde', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein gelbes Buch', 'correct' => ['ein', 'gelb', 'Buch'], 'extra' => ['grün', 'Kugelschreiber']],
                            'ja' => ['sentence' => '黄色い本', 'correct' => ['黄色い', '本'], 'extra' => ['緑']],
                            'ko' => ['sentence' => '노란 책', 'correct' => ['노란', '책'], 'extra' => ['초록색']],
                            'fr' => ['sentence' => 'Un livre jaune', 'correct' => ['un', 'livre', 'jaune'], 'extra' => ['vert', 'stylo']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'green', 'book', 'and', 'a', 'yellow', 'pen'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro verde y un bolígrafo amarillo', 'correct' => ['un', 'libro', 'verde', 'y', 'un', 'bolígrafo', 'amarillo'], 'extra' => ['rojo']],
                            'de' => ['sentence' => 'Ein grünes Buch und ein gelber Kugelschreiber', 'correct' => ['ein', 'grün', 'Buch', 'und', 'ein', 'gelb', 'Kugelschreiber'], 'extra' => ['rot']],
                            'ja' => ['sentence' => '緑の本と黄色いペン', 'correct' => ['緑の', '本', 'と', '黄色い', 'ペン'], 'extra' => ['赤']],
                            'ko' => ['sentence' => '초록 책과 노란 펜', 'correct' => ['초록', '책과', '노란', '펜'], 'extra' => ['빨간색']],
                            'fr' => ['sentence' => 'Un livre vert et un stylo jaune', 'correct' => ['un', 'livre', 'vert', 'et', 'un', 'stylo', 'jaune'], 'extra' => ['rouge']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Black & White', 4,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Pen', 'img' => 'pen']],
                plain: [['en' => 'Black'], ['en' => 'White']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'black', 'pen'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un bolígrafo negro', 'correct' => ['un', 'bolígrafo', 'negro'], 'extra' => ['blanco', 'libro']],
                            'de' => ['sentence' => 'Ein schwarzer Kugelschreiber', 'correct' => ['ein', 'schwarz', 'Kugelschreiber'], 'extra' => ['weiß', 'Buch']],
                            'ja' => ['sentence' => '黒いペン', 'correct' => ['黒い', 'ペン'], 'extra' => ['白']],
                            'ko' => ['sentence' => '검은 펜', 'correct' => ['검은', '펜'], 'extra' => ['하얀색']],
                            'fr' => ['sentence' => 'Un stylo noir', 'correct' => ['un', 'stylo', 'noir'], 'extra' => ['blanc', 'livre']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'white', 'book'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro blanco', 'correct' => ['un', 'libro', 'blanco'], 'extra' => ['negro', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein weißes Buch', 'correct' => ['ein', 'weiß', 'Buch'], 'extra' => ['schwarz', 'Kugelschreiber']],
                            'ja' => ['sentence' => '白い本', 'correct' => ['白い', '本'], 'extra' => ['黒']],
                            'ko' => ['sentence' => '하얀 책', 'correct' => ['하얀', '책'], 'extra' => ['검은색']],
                            'fr' => ['sentence' => 'Un livre blanc', 'correct' => ['un', 'livre', 'blanc'], 'extra' => ['noir', 'stylo']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'black', 'book', 'and', 'a', 'white', 'pen'], 'blank' => 5,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro negro y un bolígrafo blanco', 'correct' => ['un', 'libro', 'negro', 'y', 'un', 'bolígrafo', 'blanco'], 'extra' => ['azul']],
                            'de' => ['sentence' => 'Ein schwarzes Buch und ein weißer Kugelschreiber', 'correct' => ['ein', 'schwarz', 'Buch', 'und', 'ein', 'weiß', 'Kugelschreiber'], 'extra' => ['blau']],
                            'ja' => ['sentence' => '黒い本と白いペン', 'correct' => ['黒い', '本', 'と', '白い', 'ペン'], 'extra' => ['青']],
                            'ko' => ['sentence' => '검은 책과 하얀 펜', 'correct' => ['검은', '책과', '하얀', '펜'], 'extra' => ['파란색']],
                            'fr' => ['sentence' => 'Un livre noir et un stylo blanc', 'correct' => ['un', 'livre', 'noir', 'et', 'un', 'stylo', 'blanc'], 'extra' => ['bleu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Counting', 5,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Pen', 'img' => 'pen']],
                plain: [['en' => 'Three'], ['en' => 'Ten']],
                phrases: [
                    'a' => [
                        'words' => ['three', 'books'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tres libros', 'correct' => ['tres', 'libros'], 'extra' => ['diez', 'bolígrafos']],
                            'de' => ['sentence' => 'Drei Bücher', 'correct' => ['drei', 'Bücher'], 'extra' => ['zehn', 'Kugelschreiber']],
                            'ja' => ['sentence' => '本三冊', 'correct' => ['本', '三冊'], 'extra' => ['十']],
                            'ko' => ['sentence' => '책 세 권', 'correct' => ['책', '세', '권'], 'extra' => ['열']],
                            'fr' => ['sentence' => 'Trois livres', 'correct' => ['trois', 'livres'], 'extra' => ['dix', 'stylos']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ten', 'pens'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Diez bolígrafos', 'correct' => ['diez', 'bolígrafos'], 'extra' => ['tres', 'libros']],
                            'de' => ['sentence' => 'Zehn Kugelschreiber', 'correct' => ['zehn', 'Kugelschreiber'], 'extra' => ['drei', 'Bücher']],
                            'ja' => ['sentence' => 'ペン十本', 'correct' => ['ペン', '十本'], 'extra' => ['三']],
                            'ko' => ['sentence' => '펜 열 개', 'correct' => ['펜', '열', '개'], 'extra' => ['셋']],
                            'fr' => ['sentence' => 'Dix stylos', 'correct' => ['dix', 'stylos'], 'extra' => ['trois', 'livres']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'book', 'and', 'a', 'pen'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['tres', 'diez']],
                            'de' => ['sentence' => 'Ein Buch und ein Kugelschreiber', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Kugelschreiber'], 'extra' => ['drei', 'zehn']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['三', '十']],
                            'ko' => ['sentence' => '책과 펜', 'correct' => ['책과', '펜'], 'extra' => ['셋', '열']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['trois', 'dix']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
