<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner02Seeder extends Seeder
{
    private const PICTURES = [
        'libro' => 'book',
        'bolígrafo' => 'pen',
        'mesa' => 'table',
        'silla' => 'chair',
        'casa' => 'house',
        'gato' => 'cat',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 2, the Spanish twin of the
     * English "Unit 2: Colours & Counting" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unidad 2: Colores y números', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Libro y Bolígrafo', 1,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'bolígrafo',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'es' => 'uno',
                    ],
                    [
                        'es' => 'dos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'libro',
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
                            'de' => [
                                'sentence' => 'Ein Buch',
                                'correct' => [
                                    'eins',
                                    'Buch',
                                ],
                                'extra' => [
                                    'zwei',
                                    'Kugelschreiber',
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
                            'Dos',
                            'bolígrafos',
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
                            'de' => [
                                'sentence' => 'Zwei Kugelschreiber',
                                'correct' => [
                                    'zwei',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'eins',
                                    'Buch',
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
                            'Un',
                            'libro',
                            'y',
                            'un',
                            'bolígrafo',
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
                            'de' => [
                                'sentence' => 'Ein Buch und ein Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'Buch',
                                    'und',
                                    'ein',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'zwei',
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
            $builder->lesson('Lección 2: Libro y Bolígrafo', 2,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'bolígrafo',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'es' => 'rojo',
                    ],
                    [
                        'es' => 'azul',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'libro',
                            'rojo',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Ein rotes Buch',
                                'correct' => [
                                    'ein',
                                    'rot',
                                    'Buch',
                                ],
                                'extra' => [
                                    'blau',
                                    'Kugelschreiber',
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
                            'Un',
                            'bolígrafo',
                            'azul',
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
                            'de' => [
                                'sentence' => 'Ein blauer Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'blau',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'rot',
                                    'Buch',
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
                            'Un',
                            'libro',
                            'rojo',
                            'y',
                            'un',
                            'bolígrafo',
                            'azul',
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
                            'de' => [
                                'sentence' => 'Ein rotes Buch und ein blauer Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'rot',
                                    'Buch',
                                    'und',
                                    'ein',
                                    'blau',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'grün',
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
            $builder->lesson('Lección 3: Libro y Bolígrafo', 3,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'bolígrafo',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'es' => 'verde',
                    ],
                    [
                        'es' => 'amarillo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'bolígrafo',
                            'verde',
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
                            'de' => [
                                'sentence' => 'Ein grüner Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'grün',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'gelb',
                                    'Buch',
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
                            'Un',
                            'libro',
                            'amarillo',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Ein gelbes Buch',
                                'correct' => [
                                    'ein',
                                    'gelb',
                                    'Buch',
                                ],
                                'extra' => [
                                    'grün',
                                    'Kugelschreiber',
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
                            'Un',
                            'libro',
                            'verde',
                            'y',
                            'un',
                            'bolígrafo',
                            'amarillo',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Ein grünes Buch und ein gelber Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'grün',
                                    'Buch',
                                    'und',
                                    'ein',
                                    'gelb',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'rot',
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
            $builder->lesson('Lección 4: Libro y Bolígrafo', 4,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'bolígrafo',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'es' => 'negro',
                    ],
                    [
                        'es' => 'blanco',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'bolígrafo',
                            'negro',
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
                            'de' => [
                                'sentence' => 'Ein schwarzer Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'schwarz',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'weiß',
                                    'Buch',
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
                            'Un',
                            'libro',
                            'blanco',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Ein weißes Buch',
                                'correct' => [
                                    'ein',
                                    'weiß',
                                    'Buch',
                                ],
                                'extra' => [
                                    'schwarz',
                                    'Kugelschreiber',
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
                            'Un',
                            'libro',
                            'negro',
                            'y',
                            'un',
                            'bolígrafo',
                            'blanco',
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
                            'de' => [
                                'sentence' => 'Ein schwarzes Buch und ein weißer Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'schwarz',
                                    'Buch',
                                    'und',
                                    'ein',
                                    'weiß',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'blau',
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
            $builder->lesson('Lección 5: Libro y Bolígrafo', 5,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'bolígrafo',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'es' => 'tres',
                    ],
                    [
                        'es' => 'diez',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Tres',
                            'libros',
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
                                    'pens',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Drei Bücher',
                                'correct' => [
                                    'drei',
                                    'Bücher',
                                ],
                                'extra' => [
                                    'zehn',
                                    'Kugelschreiber',
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
                            'Diez',
                            'bolígrafos',
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
                            'de' => [
                                'sentence' => 'Zehn Kugelschreiber',
                                'correct' => [
                                    'zehn',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'drei',
                                    'Bücher',
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
                            'Un',
                            'libro',
                            'y',
                            'un',
                            'bolígrafo',
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
                            'de' => [
                                'sentence' => 'Ein Buch und ein Kugelschreiber',
                                'correct' => [
                                    'ein',
                                    'Buch',
                                    'und',
                                    'ein',
                                    'Kugelschreiber',
                                ],
                                'extra' => [
                                    'drei',
                                    'zehn',
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
