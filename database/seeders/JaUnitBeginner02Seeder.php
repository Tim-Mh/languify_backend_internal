<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner02Seeder extends Seeder
{
    private const PICTURES = [
        '本' => 'book',
        'ペン' => 'pen',
        'テーブル' => 'table',
        '椅子' => 'chair',
        '家' => 'house',
        '猫' => 'cat',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 2, the Japanese twin of the
     * English "Unit 2: Colours & Counting" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'ユニット2: 色と数字', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 本・ペン', 1,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'ペン',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'ja' => '一',
                    ],
                    [
                        'ja' => '二',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '本',
                            '一冊',
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
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['iki', 'qələm']],
                            'ar' => ['sentence' => 'واحد كتاب', 'correct' => ['واحد', 'كتاب'], 'extra' => ['اثنان', 'قلم']],
                            'ru' => ['sentence' => 'один книга', 'correct' => ['один', 'книга'], 'extra' => ['два', 'ручка']],
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
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['iki', 'kalem']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ペン',
                            '二本',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'iki qələmlər', 'correct' => ['iki', 'qələmlər'], 'extra' => ['bir', 'kitab']],
                            'ar' => ['sentence' => 'اثنان أقلام', 'correct' => ['اثنان', 'أقلام'], 'extra' => ['واحد', 'كتاب']],
                            'ru' => ['sentence' => 'два ручки', 'correct' => ['два', 'ручки'], 'extra' => ['один', 'книга']],
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
                            'tr' => ['sentence' => 'iki kalem', 'correct' => ['iki', 'kalem'], 'extra' => ['bir', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '本',
                            'と',
                            'ペン',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['iki']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['اثنان']],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['два']],
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
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => ['iki']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 本・ペン', 2,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'ペン',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'ja' => '赤',
                    ],
                    [
                        'ja' => '青',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '赤い',
                            '本',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir qırmızı kitab', 'correct' => ['bir', 'qırmızı', 'kitab'], 'extra' => ['mavi']],
                            'ar' => ['sentence' => 'أحمر كتاب', 'correct' => ['أحمر', 'كتاب'], 'extra' => ['أزرق']],
                            'ru' => ['sentence' => 'красный книга', 'correct' => ['красный', 'книга'], 'extra' => ['синий']],
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
                            'tr' => ['sentence' => 'kırmızı bir kitap', 'correct' => ['kırmızı', 'bir', 'kitap'], 'extra' => ['mavi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '青い',
                            'ペン',
                        ],
                        'blank' => 1,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir mavi qələm', 'correct' => ['bir', 'mavi', 'qələm'], 'extra' => ['qırmızı']],
                            'ar' => ['sentence' => 'أزرق قلم', 'correct' => ['أزرق', 'قلم'], 'extra' => ['أحمر']],
                            'ru' => ['sentence' => 'синий ручка', 'correct' => ['синий', 'ручка'], 'extra' => ['красный']],
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
                            'tr' => ['sentence' => 'mavi bir kalem', 'correct' => ['mavi', 'bir', 'kalem'], 'extra' => ['kırmızı']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '赤い',
                            '本',
                            'と',
                            '青い',
                            'ペン',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'bir qırmızı kitab və bir mavi qələm', 'correct' => ['bir', 'qırmızı', 'kitab', 'və', 'bir', 'mavi', 'qələm'], 'extra' => ['yaşıl']],
                            'ar' => ['sentence' => 'أحمر كتاب و أزرق قلم', 'correct' => ['أحمر', 'كتاب', 'و', 'أزرق', 'قلم'], 'extra' => ['أخضر']],
                            'ru' => ['sentence' => 'красный книга и синий ручка', 'correct' => ['красный', 'книга', 'и', 'синий', 'ручка'], 'extra' => ['зелёный']],
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
                            'tr' => ['sentence' => 'kırmızı bir kitap ve mavi bir kalem', 'correct' => ['kırmızı', 'bir', 'kitap', 've', 'mavi', 'bir', 'kalem'], 'extra' => ['yeşil']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 本・ペン', 3,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'ペン',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'ja' => '緑',
                    ],
                    [
                        'ja' => '黄色',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '緑の',
                            'ペン',
                        ],
                        'blank' => 1,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir yaşıl qələm', 'correct' => ['bir', 'yaşıl', 'qələm'], 'extra' => ['sarı']],
                            'ar' => ['sentence' => 'أخضر قلم', 'correct' => ['أخضر', 'قلم'], 'extra' => ['أصفر']],
                            'ru' => ['sentence' => 'зелёный ручка', 'correct' => ['зелёный', 'ручка'], 'extra' => ['жёлтый']],
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
                            'tr' => ['sentence' => 'yeşil bir kalem', 'correct' => ['yeşil', 'bir', 'kalem'], 'extra' => ['sarı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '黄色い',
                            '本',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir sarı kitab', 'correct' => ['bir', 'sarı', 'kitab'], 'extra' => ['yaşıl']],
                            'ar' => ['sentence' => 'أصفر كتاب', 'correct' => ['أصفر', 'كتاب'], 'extra' => ['أخضر']],
                            'ru' => ['sentence' => 'жёлтый книга', 'correct' => ['жёлтый', 'книга'], 'extra' => ['зелёный']],
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
                            'tr' => ['sentence' => 'sarı bir kitap', 'correct' => ['sarı', 'bir', 'kitap'], 'extra' => ['yeşil']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '緑の',
                            '本',
                            'と',
                            '黄色い',
                            'ペン',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'bir yaşıl kitab və bir sarı qələm', 'correct' => ['bir', 'yaşıl', 'kitab', 'və', 'bir', 'sarı', 'qələm'], 'extra' => ['qırmızı']],
                            'ar' => ['sentence' => 'أخضر كتاب و أصفر قلم', 'correct' => ['أخضر', 'كتاب', 'و', 'أصفر', 'قلم'], 'extra' => ['أحمر']],
                            'ru' => ['sentence' => 'зелёный книга и жёлтый ручка', 'correct' => ['зелёный', 'книга', 'и', 'жёлтый', 'ручка'], 'extra' => ['красный']],
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
                            'tr' => ['sentence' => 'yeşil bir kitap ve sarı bir kalem', 'correct' => ['yeşil', 'bir', 'kitap', 've', 'sarı', 'bir', 'kalem'], 'extra' => ['kırmızı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 本・ペン', 4,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'ペン',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'ja' => '黒',
                    ],
                    [
                        'ja' => '白',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '黒い',
                            'ペン',
                        ],
                        'blank' => 1,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir qara qələm', 'correct' => ['bir', 'qara', 'qələm'], 'extra' => ['ağ']],
                            'ar' => ['sentence' => 'أسود قلم', 'correct' => ['أسود', 'قلم'], 'extra' => ['أبيض']],
                            'ru' => ['sentence' => 'чёрный ручка', 'correct' => ['чёрный', 'ручка'], 'extra' => ['белый']],
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
                            'tr' => ['sentence' => 'siyah bir kalem', 'correct' => ['siyah', 'bir', 'kalem'], 'extra' => ['beyaz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '白い',
                            '本',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir ağ kitab', 'correct' => ['bir', 'ağ', 'kitab'], 'extra' => ['qara']],
                            'ar' => ['sentence' => 'أبيض كتاب', 'correct' => ['أبيض', 'كتاب'], 'extra' => ['أسود']],
                            'ru' => ['sentence' => 'белый книга', 'correct' => ['белый', 'книга'], 'extra' => ['чёрный']],
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
                            'tr' => ['sentence' => 'beyaz bir kitap', 'correct' => ['beyaz', 'bir', 'kitap'], 'extra' => ['siyah']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '黒い',
                            '本',
                            'と',
                            '白い',
                            'ペン',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'bir qara kitab və bir ağ qələm', 'correct' => ['bir', 'qara', 'kitab', 'və', 'bir', 'ağ', 'qələm'], 'extra' => ['mavi']],
                            'ar' => ['sentence' => 'أسود كتاب و أبيض قلم', 'correct' => ['أسود', 'كتاب', 'و', 'أبيض', 'قلم'], 'extra' => ['أزرق']],
                            'ru' => ['sentence' => 'чёрный книга и белый ручка', 'correct' => ['чёрный', 'книга', 'и', 'белый', 'ручка'], 'extra' => ['синий']],
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
                            'tr' => ['sentence' => 'siyah bir kitap ve beyaz bir kalem', 'correct' => ['siyah', 'bir', 'kitap', 've', 'beyaz', 'bir', 'kalem'], 'extra' => ['mavi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 本・ペン', 5,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'ペン',
                        'img' => 'pen',
                    ],
                ],
                plain: [
                    [
                        'ja' => '三',
                    ],
                    [
                        'ja' => '十',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '本',
                            '三冊',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'three books',
                                'correct' => [
                                    'three',
                                    'books',
                                ],
                                'extra' => [
                                    'ten',
                                ],
                            ],
                            'az' => ['sentence' => 'üç kitablar', 'correct' => ['üç', 'kitablar'], 'extra' => ['on']],
                            'ar' => ['sentence' => 'ثلاثة كتب', 'correct' => ['ثلاثة', 'كتب'], 'extra' => ['عشرة']],
                            'ru' => ['sentence' => 'три книги', 'correct' => ['три', 'книги'], 'extra' => ['десять']],
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
                            'tr' => ['sentence' => 'üç kitap', 'correct' => ['üç', 'kitap'], 'extra' => ['on']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ペン',
                            '十本',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'ten pens',
                                'correct' => [
                                    'ten',
                                    'pens',
                                ],
                                'extra' => [
                                    'three',
                                ],
                            ],
                            'az' => ['sentence' => 'on qələmlər', 'correct' => ['on', 'qələmlər'], 'extra' => ['üç']],
                            'ar' => ['sentence' => 'عشرة أقلام', 'correct' => ['عشرة', 'أقلام'], 'extra' => ['ثلاثة']],
                            'ru' => ['sentence' => 'десять ручки', 'correct' => ['десять', 'ручки'], 'extra' => ['три']],
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
                            'tr' => ['sentence' => 'on kalem', 'correct' => ['on', 'kalem'], 'extra' => ['üç']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '本',
                            'と',
                            'ペン',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['üç', 'on']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['ثلاثة', 'عشرة']],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['три', 'десять']],
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
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => ['üç', 'on']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
