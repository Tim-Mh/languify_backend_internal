<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner02Seeder extends Seeder
{
    private const PICTURES = [
        'Livre' => 'book', 'Stylo' => 'pen', 'Rouge' => 'red', 'Bleu' => 'blue',
        'Vert' => 'green', 'Jaune' => 'yellow', 'Noir' => 'black', 'Blanc' => 'white',
    ];

    /**
     * French Beginner Unit 2 — colours and counting.
     *
     * Objects come first so colours have something to describe, and the numbers
     * ride along on the same objects ("deux livres"). Colours follow the noun in
     * French — "un livre rouge" is literally "a book red" — which is why the
     * build-the-French exercise shows the meaning as a sentence rather than
     * leaving the learner to infer it word by word.
     *
     * Every one of a lesson's four words appears in at least one of its three
     * phrases; nothing is taught that the learner never gets to use.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Colours & Counting', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Book & A Pen', 1,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'Stylo', 'img' => 'pen']],
                plain: [['fr' => 'Un'], ['fr' => 'Deux']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'livre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A book', 'correct' => ['a', 'book'], 'extra' => ['pen', 'two']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['bolígrafo', 'dos']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['Kugelschreiber', 'zwei']],
                            'ja' => ['sentence' => '本', 'correct' => ['本'], 'extra' => ['ペン', '二']],
                            'ko' => ['sentence' => '책', 'correct' => ['책'], 'extra' => ['펜', '둘']],
                        ],
                    ],
                    'b' => [
                        'words' => ['deux', 'livres'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Two books', 'correct' => ['two', 'books'], 'extra' => ['pen', 'a']],
                            'es' => ['sentence' => 'Dos libros', 'correct' => ['dos', 'libros'], 'extra' => ['bolígrafo', 'un']],
                            'de' => ['sentence' => 'Zwei Bücher', 'correct' => ['zwei', 'Bücher'], 'extra' => ['Kugelschreiber', 'ein']],
                            'ja' => ['sentence' => '二冊の本', 'correct' => ['二冊の本'], 'extra' => ['ペン']],
                            'ko' => ['sentence' => '책 두 권', 'correct' => ['책', '두', '권'], 'extra' => ['펜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'livre', 'et', 'un', 'stylo'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['two']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Ein Buch und ein Kugelschreiber', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Kugelschreiber'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['二']],
                            'ko' => ['sentence' => '책과 펜', 'correct' => ['책과', '펜'], 'extra' => ['둘']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Red & Blue', 2,
                pictures: [['fr' => 'Rouge', 'img' => 'red'], ['fr' => 'Bleu', 'img' => 'blue']],
                plain: [['fr' => 'Trois'], ['fr' => 'Quatre']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'livre', 'rouge'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A red book', 'correct' => ['a', 'red', 'book'], 'extra' => ['blue', 'pen']],
                            'es' => ['sentence' => 'Un libro rojo', 'correct' => ['un', 'libro', 'rojo'], 'extra' => ['azul', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein rotes Buch', 'correct' => ['ein', 'rotes', 'Buch'], 'extra' => ['blau', 'Kugelschreiber']],
                            'ja' => ['sentence' => '赤い本', 'correct' => ['赤い', '本'], 'extra' => ['青い', 'ペン']],
                            'ko' => ['sentence' => '빨간 책', 'correct' => ['빨간', '책'], 'extra' => ['파란', '펜']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'stylo', 'bleu'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A blue pen', 'correct' => ['a', 'blue', 'pen'], 'extra' => ['red', 'book']],
                            'es' => ['sentence' => 'Un bolígrafo azul', 'correct' => ['un', 'bolígrafo', 'azul'], 'extra' => ['rojo', 'libro']],
                            'de' => ['sentence' => 'Ein blauer Kugelschreiber', 'correct' => ['ein', 'blauer', 'Kugelschreiber'], 'extra' => ['rot', 'Buch']],
                            'ja' => ['sentence' => '青いペン', 'correct' => ['青い', 'ペン'], 'extra' => ['赤い', '本']],
                            'ko' => ['sentence' => '파란 펜', 'correct' => ['파란', '펜'], 'extra' => ['빨간', '책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['trois', 'livres', 'et', 'quatre', 'stylos'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Three books and four pens', 'correct' => ['three', 'books', 'and', 'four', 'pens'], 'extra' => ['two']],
                            'es' => ['sentence' => 'Tres libros y cuatro bolígrafos', 'correct' => ['tres', 'libros', 'y', 'cuatro', 'bolígrafos'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Drei Bücher und vier Kugelschreiber', 'correct' => ['drei', 'Bücher', 'und', 'vier', 'Kugelschreiber'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => '三冊の本と四本のペン', 'correct' => ['三冊', 'の', '本', 'と', '四', '本', 'の', 'ペン'], 'extra' => ['二']],
                            'ko' => ['sentence' => '책 세 권과 펜 네 개', 'correct' => ['책', '세', '권과', '펜', '네', '개'], 'extra' => ['둘']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Green & Yellow', 3,
                pictures: [['fr' => 'Vert', 'img' => 'green'], ['fr' => 'Jaune', 'img' => 'yellow']],
                plain: [['fr' => 'Cinq'], ['fr' => 'Six']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'stylo', 'vert'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A green pen', 'correct' => ['a', 'green', 'pen'], 'extra' => ['yellow', 'book']],
                            'es' => ['sentence' => 'Un bolígrafo verde', 'correct' => ['un', 'bolígrafo', 'verde'], 'extra' => ['amarillo', 'libro']],
                            'de' => ['sentence' => 'Ein grüner Kugelschreiber', 'correct' => ['ein', 'grüner', 'Kugelschreiber'], 'extra' => ['gelb', 'Buch']],
                            'ja' => ['sentence' => '緑のペン', 'correct' => ['緑の', 'ペン'], 'extra' => ['黄色い', '本']],
                            'ko' => ['sentence' => '초록 펜', 'correct' => ['초록', '펜'], 'extra' => ['노란', '책']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'livre', 'jaune'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A yellow book', 'correct' => ['a', 'yellow', 'book'], 'extra' => ['green', 'pen']],
                            'es' => ['sentence' => 'Un libro amarillo', 'correct' => ['un', 'libro', 'amarillo'], 'extra' => ['verde', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein gelbes Buch', 'correct' => ['ein', 'gelbes', 'Buch'], 'extra' => ['grün', 'Kugelschreiber']],
                            'ja' => ['sentence' => '黄色い本', 'correct' => ['黄色い', '本'], 'extra' => ['緑の', 'ペン']],
                            'ko' => ['sentence' => '노란 책', 'correct' => ['노란', '책'], 'extra' => ['초록', '펜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['cinq', 'livres', 'et', 'six', 'stylos'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Five books and six pens', 'correct' => ['five', 'books', 'and', 'six', 'pens'], 'extra' => ['four']],
                            'es' => ['sentence' => 'Cinco libros y seis bolígrafos', 'correct' => ['cinco', 'libros', 'y', 'seis', 'bolígrafos'], 'extra' => ['cuatro']],
                            'de' => ['sentence' => 'Fünf Bücher und sechs Kugelschreiber', 'correct' => ['fünf', 'Bücher', 'und', 'sechs', 'Kugelschreiber'], 'extra' => ['vier']],
                            'ja' => ['sentence' => '五冊の本と六本のペン', 'correct' => ['五', '冊', 'の', '本', 'と', '六', '本', 'の', 'ペン'], 'extra' => ['四']],
                            'ko' => ['sentence' => '책 다섯 권과 펜 여섯 개', 'correct' => ['책', '다섯', '권과', '펜', '여섯', '개'], 'extra' => ['넷']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Black & White', 4,
                pictures: [['fr' => 'Noir', 'img' => 'black'], ['fr' => 'Blanc', 'img' => 'white']],
                plain: [['fr' => 'Sept'], ['fr' => 'Huit']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'livre', 'noir'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A black book', 'correct' => ['a', 'black', 'book'], 'extra' => ['white', 'pen']],
                            'es' => ['sentence' => 'Un libro negro', 'correct' => ['un', 'libro', 'negro'], 'extra' => ['blanco', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein schwarzes Buch', 'correct' => ['ein', 'schwarzes', 'Buch'], 'extra' => ['weiß', 'Kugelschreiber']],
                            'ja' => ['sentence' => '黒い本', 'correct' => ['黒い', '本'], 'extra' => ['白い', 'ペン']],
                            'ko' => ['sentence' => '검은 책', 'correct' => ['검은', '책'], 'extra' => ['하얀', '펜']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'stylo', 'blanc'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A white pen', 'correct' => ['a', 'white', 'pen'], 'extra' => ['black', 'book']],
                            'es' => ['sentence' => 'Un bolígrafo blanco', 'correct' => ['un', 'bolígrafo', 'blanco'], 'extra' => ['negro', 'libro']],
                            'de' => ['sentence' => 'Ein weißer Kugelschreiber', 'correct' => ['ein', 'weißer', 'Kugelschreiber'], 'extra' => ['schwarz', 'Buch']],
                            'ja' => ['sentence' => '白いペン', 'correct' => ['白い', 'ペン'], 'extra' => ['黒い', '本']],
                            'ko' => ['sentence' => '하얀 펜', 'correct' => ['하얀', '펜'], 'extra' => ['검은', '책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sept', 'stylos', 'et', 'huit', 'livres'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Seven pens and eight books', 'correct' => ['seven', 'pens', 'and', 'eight', 'books'], 'extra' => ['six']],
                            'es' => ['sentence' => 'Siete bolígrafos y ocho libros', 'correct' => ['siete', 'bolígrafos', 'y', 'ocho', 'libros'], 'extra' => ['seis']],
                            'de' => ['sentence' => 'Sieben Kugelschreiber und acht Bücher', 'correct' => ['sieben', 'Kugelschreiber', 'und', 'acht', 'Bücher'], 'extra' => ['sechs']],
                            'ja' => ['sentence' => '七本のペンと八冊の本', 'correct' => ['七', '本', 'の', 'ペン', 'と', '八', '冊', 'の', '本'], 'extra' => ['六']],
                            'ko' => ['sentence' => '펜 일곱 개와 책 여덟 권', 'correct' => ['펜', '일곱', '개와', '책', '여덟', '권'], 'extra' => ['여섯']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Nine & Ten', 5,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'Rouge', 'img' => 'red']],
                plain: [['fr' => 'Neuf'], ['fr' => 'Dix']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'stylo', 'rouge'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A red pen', 'correct' => ['a', 'red', 'pen'], 'extra' => ['black', 'book']],
                            'es' => ['sentence' => 'Un bolígrafo rojo', 'correct' => ['un', 'bolígrafo', 'rojo'], 'extra' => ['negro', 'libro']],
                            'de' => ['sentence' => 'Ein roter Kugelschreiber', 'correct' => ['ein', 'roter', 'Kugelschreiber'], 'extra' => ['schwarz', 'Buch']],
                            'ja' => ['sentence' => '赤いペン', 'correct' => ['赤い', 'ペン'], 'extra' => ['黒い', '本']],
                            'ko' => ['sentence' => '빨간 펜', 'correct' => ['빨간', '펜'], 'extra' => ['검은', '책']],
                        ],
                    ],
                    'b' => [
                        'words' => ['neuf', 'livres'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Nine books', 'correct' => ['nine', 'books'], 'extra' => ['ten', 'pens']],
                            'es' => ['sentence' => 'Nueve libros', 'correct' => ['nueve', 'libros'], 'extra' => ['diez', 'bolígrafos']],
                            'de' => ['sentence' => 'Neun Bücher', 'correct' => ['neun', 'Bücher'], 'extra' => ['zehn', 'Kugelschreiber']],
                            'ja' => ['sentence' => '九冊の本', 'correct' => ['九', '冊', 'の', '本'], 'extra' => ['十', 'ペン']],
                            'ko' => ['sentence' => '책 아홉 권', 'correct' => ['책', '아홉', '권'], 'extra' => ['열', '펜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['dix', 'stylos', 'et', 'un', 'livre', 'rouge'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Ten pens and a red book', 'correct' => ['ten', 'pens', 'and', 'a', 'red', 'book'], 'extra' => ['nine']],
                            'es' => ['sentence' => 'Diez bolígrafos y un libro rojo', 'correct' => ['diez', 'bolígrafos', 'y', 'un', 'libro', 'rojo'], 'extra' => ['nueve']],
                            'de' => ['sentence' => 'Zehn Kugelschreiber und ein rotes Buch', 'correct' => ['zehn', 'Kugelschreiber', 'und', 'ein', 'rotes', 'Buch'], 'extra' => ['neun']],
                            'ja' => ['sentence' => '十本のペンと赤い本', 'correct' => ['十本', 'の', 'ペン', 'と', '赤い', '本'], 'extra' => ['九']],
                            'ko' => ['sentence' => '펜 열 개와 빨간 책', 'correct' => ['펜', '열', '개와', '빨간', '책'], 'extra' => ['아홉']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
