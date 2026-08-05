<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner02Seeder extends Seeder
{
    private const PICTURES = [
        'Buch' => 'book',
        'Kugelschreiber' => 'pen',
        'Tisch' => 'table',
        'Stuhl' => 'chair',
        'Haus' => 'house',
        'Katze' => 'cat',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 2, the German twin of the
     * English "Unit 2: Colours & Counting" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Einheit 2: Farben & Zahlen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Buch & Kugelschreiber', 1,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Kugelschreiber',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'de' => 'eins',
                    ],
                    [
                        'de' => 'zwei',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Buch',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'one book',
                                'correct' => [
                                    'one',
                                    'book',
                                ],
                                'extra' => [
                                    'two',
                                    'pen',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro',
                                'correct' => [
                                    'uno',
                                    'libro',
                                ],
                                'extra' => [
                                    'dos',
                                    'bolígrafo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre',
                                'correct' => [
                                    'un',
                                    'livre',
                                ],
                                'extra' => [
                                    'deux',
                                    'stylo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本一冊',
                                'correct' => [
                                    '本',
                                    '一冊',
                                ],
                                'extra' => [
                                    '二',
                                    'ペン',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책 한 권',
                                'correct' => [
                                    '책',
                                    '한',
                                    '권',
                                ],
                                'extra' => [
                                    '둘',
                                    '펜',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Zwei',
                            'Kugelschreiber',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'two pens',
                                'correct' => [
                                    'two',
                                    'pens',
                                ],
                                'extra' => [
                                    'one',
                                    'book',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Dos bolígrafos',
                                'correct' => [
                                    'dos',
                                    'bolígrafos',
                                ],
                                'extra' => [
                                    'uno',
                                    'libro',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Deux stylos',
                                'correct' => [
                                    'deux',
                                    'stylos',
                                ],
                                'extra' => [
                                    'un',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ペン二本',
                                'correct' => [
                                    'ペン',
                                    '二本',
                                ],
                                'extra' => [
                                    '一',
                                    '本',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '펜 두 개',
                                'correct' => [
                                    '펜',
                                    '두',
                                    '개',
                                ],
                                'extra' => [
                                    '하나',
                                    '책',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Buch',
                            'und',
                            'ein',
                            'Kugelschreiber',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a book and a pen',
                                'correct' => [
                                    'a',
                                    'book',
                                    'and',
                                    'a',
                                    'pen',
                                ],
                                'extra' => [
                                    'two',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro y un bolígrafo',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'y',
                                    'un',
                                    'bolígrafo',
                                ],
                                'extra' => [
                                    'dos',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre et un stylo',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'et',
                                    'un',
                                    'stylo',
                                ],
                                'extra' => [
                                    'deux',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本とペン',
                                'correct' => [
                                    '本',
                                    'と',
                                    'ペン',
                                ],
                                'extra' => [
                                    '二',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책과 펜',
                                'correct' => [
                                    '책과',
                                    '펜',
                                ],
                                'extra' => [
                                    '둘',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Buch & Kugelschreiber', 2,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Kugelschreiber',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'de' => 'rot',
                    ],
                    [
                        'de' => 'blau',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'rotes',
                            'Buch',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a red book',
                                'correct' => [
                                    'a',
                                    'red',
                                    'book',
                                ],
                                'extra' => [
                                    'blue',
                                    'pen',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro rojo',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'rojo',
                                ],
                                'extra' => [
                                    'azul',
                                    'bolígrafo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre rouge',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'rouge',
                                ],
                                'extra' => [
                                    'bleu',
                                    'stylo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '赤い本',
                                'correct' => [
                                    '赤い',
                                    '本',
                                ],
                                'extra' => [
                                    '青',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빨간 책',
                                'correct' => [
                                    '빨간',
                                    '책',
                                ],
                                'extra' => [
                                    '파란색',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'blauer',
                            'Kugelschreiber',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a blue pen',
                                'correct' => [
                                    'a',
                                    'blue',
                                    'pen',
                                ],
                                'extra' => [
                                    'red',
                                    'book',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un bolígrafo azul',
                                'correct' => [
                                    'un',
                                    'bolígrafo',
                                    'azul',
                                ],
                                'extra' => [
                                    'rojo',
                                    'libro',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un stylo bleu',
                                'correct' => [
                                    'un',
                                    'stylo',
                                    'bleu',
                                ],
                                'extra' => [
                                    'rouge',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '青いペン',
                                'correct' => [
                                    '青い',
                                    'ペン',
                                ],
                                'extra' => [
                                    '赤',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '파란 펜',
                                'correct' => [
                                    '파란',
                                    '펜',
                                ],
                                'extra' => [
                                    '빨간색',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'rotes',
                            'Buch',
                            'und',
                            'ein',
                            'blauer',
                            'Kugelschreiber',
                        ],
                        'blank' => 6,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a red book and a blue pen',
                                'correct' => [
                                    'a',
                                    'red',
                                    'book',
                                    'and',
                                    'a',
                                    'blue',
                                    'pen',
                                ],
                                'extra' => [
                                    'green',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro rojo y un bolígrafo azul',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'rojo',
                                    'y',
                                    'un',
                                    'bolígrafo',
                                    'azul',
                                ],
                                'extra' => [
                                    'verde',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre rouge et un stylo bleu',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'rouge',
                                    'et',
                                    'un',
                                    'stylo',
                                    'bleu',
                                ],
                                'extra' => [
                                    'vert',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '赤い本と青いペン',
                                'correct' => [
                                    '赤い',
                                    '本',
                                    'と',
                                    '青い',
                                    'ペン',
                                ],
                                'extra' => [
                                    '緑',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빨간 책과 파란 펜',
                                'correct' => [
                                    '빨간',
                                    '책과',
                                    '파란',
                                    '펜',
                                ],
                                'extra' => [
                                    '초록색',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Buch & Kugelschreiber', 3,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Kugelschreiber',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'de' => 'grün',
                    ],
                    [
                        'de' => 'gelb',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'grüner',
                            'Kugelschreiber',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a green pen',
                                'correct' => [
                                    'a',
                                    'green',
                                    'pen',
                                ],
                                'extra' => [
                                    'yellow',
                                    'book',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un bolígrafo verde',
                                'correct' => [
                                    'un',
                                    'bolígrafo',
                                    'verde',
                                ],
                                'extra' => [
                                    'amarillo',
                                    'libro',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un stylo vert',
                                'correct' => [
                                    'un',
                                    'stylo',
                                    'vert',
                                ],
                                'extra' => [
                                    'jaune',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '緑のペン',
                                'correct' => [
                                    '緑の',
                                    'ペン',
                                ],
                                'extra' => [
                                    '黄色',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '초록 펜',
                                'correct' => [
                                    '초록',
                                    '펜',
                                ],
                                'extra' => [
                                    '노란색',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'gelbes',
                            'Buch',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a yellow book',
                                'correct' => [
                                    'a',
                                    'yellow',
                                    'book',
                                ],
                                'extra' => [
                                    'green',
                                    'pen',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro amarillo',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'amarillo',
                                ],
                                'extra' => [
                                    'verde',
                                    'bolígrafo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre jaune',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'jaune',
                                ],
                                'extra' => [
                                    'vert',
                                    'stylo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '黄色い本',
                                'correct' => [
                                    '黄色い',
                                    '本',
                                ],
                                'extra' => [
                                    '緑',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '노란 책',
                                'correct' => [
                                    '노란',
                                    '책',
                                ],
                                'extra' => [
                                    '초록색',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'grünes',
                            'Buch',
                            'und',
                            'ein',
                            'gelber',
                            'Kugelschreiber',
                        ],
                        'blank' => 6,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a green book and a yellow pen',
                                'correct' => [
                                    'a',
                                    'green',
                                    'book',
                                    'and',
                                    'a',
                                    'yellow',
                                    'pen',
                                ],
                                'extra' => [
                                    'red',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro verde y un bolígrafo amarillo',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'verde',
                                    'y',
                                    'un',
                                    'bolígrafo',
                                    'amarillo',
                                ],
                                'extra' => [
                                    'rojo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre vert et un stylo jaune',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'vert',
                                    'et',
                                    'un',
                                    'stylo',
                                    'jaune',
                                ],
                                'extra' => [
                                    'rouge',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '緑の本と黄色いペン',
                                'correct' => [
                                    '緑の',
                                    '本',
                                    'と',
                                    '黄色い',
                                    'ペン',
                                ],
                                'extra' => [
                                    '赤',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '초록 책과 노란 펜',
                                'correct' => [
                                    '초록',
                                    '책과',
                                    '노란',
                                    '펜',
                                ],
                                'extra' => [
                                    '빨간색',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Buch & Kugelschreiber', 4,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Kugelschreiber',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'de' => 'schwarz',
                    ],
                    [
                        'de' => 'weiß',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'schwarzer',
                            'Kugelschreiber',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a black pen',
                                'correct' => [
                                    'a',
                                    'black',
                                    'pen',
                                ],
                                'extra' => [
                                    'white',
                                    'book',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un bolígrafo negro',
                                'correct' => [
                                    'un',
                                    'bolígrafo',
                                    'negro',
                                ],
                                'extra' => [
                                    'blanco',
                                    'libro',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un stylo noir',
                                'correct' => [
                                    'un',
                                    'stylo',
                                    'noir',
                                ],
                                'extra' => [
                                    'blanc',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '黒いペン',
                                'correct' => [
                                    '黒い',
                                    'ペン',
                                ],
                                'extra' => [
                                    '白',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '검은 펜',
                                'correct' => [
                                    '검은',
                                    '펜',
                                ],
                                'extra' => [
                                    '하얀색',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'weißes',
                            'Buch',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a white book',
                                'correct' => [
                                    'a',
                                    'white',
                                    'book',
                                ],
                                'extra' => [
                                    'black',
                                    'pen',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro blanco',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'blanco',
                                ],
                                'extra' => [
                                    'negro',
                                    'bolígrafo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre blanc',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'blanc',
                                ],
                                'extra' => [
                                    'noir',
                                    'stylo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '白い本',
                                'correct' => [
                                    '白い',
                                    '本',
                                ],
                                'extra' => [
                                    '黒',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '하얀 책',
                                'correct' => [
                                    '하얀',
                                    '책',
                                ],
                                'extra' => [
                                    '검은색',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'schwarzes',
                            'Buch',
                            'und',
                            'ein',
                            'weißer',
                            'Kugelschreiber',
                        ],
                        'blank' => 6,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a black book and a white pen',
                                'correct' => [
                                    'a',
                                    'black',
                                    'book',
                                    'and',
                                    'a',
                                    'white',
                                    'pen',
                                ],
                                'extra' => [
                                    'blue',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro negro y un bolígrafo blanco',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'negro',
                                    'y',
                                    'un',
                                    'bolígrafo',
                                    'blanco',
                                ],
                                'extra' => [
                                    'azul',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre noir et un stylo blanc',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'noir',
                                    'et',
                                    'un',
                                    'stylo',
                                    'blanc',
                                ],
                                'extra' => [
                                    'bleu',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '黒い本と白いペン',
                                'correct' => [
                                    '黒い',
                                    '本',
                                    'と',
                                    '白い',
                                    'ペン',
                                ],
                                'extra' => [
                                    '青',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '검은 책과 하얀 펜',
                                'correct' => [
                                    '검은',
                                    '책과',
                                    '하얀',
                                    '펜',
                                ],
                                'extra' => [
                                    '파란색',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Buch & Kugelschreiber', 5,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Kugelschreiber',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'de' => 'drei',
                    ],
                    [
                        'de' => 'zehn',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Drei',
                            'Bücher',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'three books',
                                'correct' => [
                                    'three',
                                    'books',
                                ],
                                'extra' => [
                                    'ten',
                                    'pen',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Tres libros',
                                'correct' => [
                                    'tres',
                                    'libros',
                                ],
                                'extra' => [
                                    'diez',
                                    'bolígrafos',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trois livres',
                                'correct' => [
                                    'trois',
                                    'livres',
                                ],
                                'extra' => [
                                    'dix',
                                    'stylos',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本三冊',
                                'correct' => [
                                    '本',
                                    '三冊',
                                ],
                                'extra' => [
                                    '十',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책 세 권',
                                'correct' => [
                                    '책',
                                    '세',
                                    '권',
                                ],
                                'extra' => [
                                    '열',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Zehn',
                            'Kugelschreiber',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'ten pens',
                                'correct' => [
                                    'ten',
                                    'pens',
                                ],
                                'extra' => [
                                    'three',
                                    'books',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Diez bolígrafos',
                                'correct' => [
                                    'diez',
                                    'bolígrafos',
                                ],
                                'extra' => [
                                    'tres',
                                    'libros',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Dix stylos',
                                'correct' => [
                                    'dix',
                                    'stylos',
                                ],
                                'extra' => [
                                    'trois',
                                    'livres',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ペン十本',
                                'correct' => [
                                    'ペン',
                                    '十本',
                                ],
                                'extra' => [
                                    '三',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '펜 열 개',
                                'correct' => [
                                    '펜',
                                    '열',
                                    '개',
                                ],
                                'extra' => [
                                    '셋',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Buch',
                            'und',
                            'ein',
                            'Kugelschreiber',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a book and a pen',
                                'correct' => [
                                    'a',
                                    'book',
                                    'and',
                                    'a',
                                    'pen',
                                ],
                                'extra' => [
                                    'three',
                                    'ten',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro y un bolígrafo',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'y',
                                    'un',
                                    'bolígrafo',
                                ],
                                'extra' => [
                                    'tres',
                                    'diez',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre et un stylo',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'et',
                                    'un',
                                    'stylo',
                                ],
                                'extra' => [
                                    'trois',
                                    'dix',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本とペン',
                                'correct' => [
                                    '本',
                                    'と',
                                    'ペン',
                                ],
                                'extra' => [
                                    '三',
                                    '十',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책과 펜',
                                'correct' => [
                                    '책과',
                                    '펜',
                                ],
                                'extra' => [
                                    '셋',
                                    '열',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
