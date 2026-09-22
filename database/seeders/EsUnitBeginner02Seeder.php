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
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['iki', 'qələm']],
                            'ar' => ['sentence' => 'واحد كتاب', 'correct' => ['واحد', 'كتاب'], 'extra' => ['اثنان', 'قلم']],
                            'ru' => ['sentence' => 'один книга', 'correct' => ['один', 'книга'], 'extra' => ['два', 'ручка']],
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
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['iki', 'kalem']],
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
                            'az' => ['sentence' => 'iki qələmlər', 'correct' => ['iki', 'qələmlər'], 'extra' => ['bir', 'kitab']],
                            'ar' => ['sentence' => 'اثنان أقلام', 'correct' => ['اثنان', 'أقلام'], 'extra' => ['واحد', 'كتاب']],
                            'ru' => ['sentence' => 'два ручки', 'correct' => ['два', 'ручки'], 'extra' => ['один', 'книга']],
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
                            'tr' => ['sentence' => 'iki kalem', 'correct' => ['iki', 'kalem'], 'extra' => ['bir', 'kitap']],
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
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['iki']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['اثنان']],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['два']],
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
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => ['iki']],
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
                            'az' => ['sentence' => 'bir qırmızı kitab', 'correct' => ['bir', 'qırmızı', 'kitab'], 'extra' => ['mavi', 'qələm']],
                            'ar' => ['sentence' => 'أحمر كتاب', 'correct' => ['أحمر', 'كتاب'], 'extra' => ['أزرق', 'قلم']],
                            'ru' => ['sentence' => 'красный книга', 'correct' => ['красный', 'книга'], 'extra' => ['синий', 'ручка']],
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
                            'tr' => ['sentence' => 'kırmızı bir kitap', 'correct' => ['kırmızı', 'bir', 'kitap'], 'extra' => ['mavi', 'kalem']],
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
                            'az' => ['sentence' => 'bir mavi qələm', 'correct' => ['bir', 'mavi', 'qələm'], 'extra' => ['qırmızı', 'kitab']],
                            'ar' => ['sentence' => 'أزرق قلم', 'correct' => ['أزرق', 'قلم'], 'extra' => ['أحمر', 'كتاب']],
                            'ru' => ['sentence' => 'синий ручка', 'correct' => ['синий', 'ручка'], 'extra' => ['красный', 'книга']],
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
                            'tr' => ['sentence' => 'mavi bir kalem', 'correct' => ['mavi', 'bir', 'kalem'], 'extra' => ['kırmızı', 'kitap']],
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
                            'az' => ['sentence' => 'bir qırmızı kitab və bir mavi qələm', 'correct' => ['bir', 'qırmızı', 'kitab', 'və', 'bir', 'mavi', 'qələm'], 'extra' => ['yaşıl']],
                            'ar' => ['sentence' => 'أحمر كتاب و أزرق قلم', 'correct' => ['أحمر', 'كتاب', 'و', 'أزرق', 'قلم'], 'extra' => ['أخضر']],
                            'ru' => ['sentence' => 'красный книга и синий ручка', 'correct' => ['красный', 'книга', 'и', 'синий', 'ручка'], 'extra' => ['зелёный']],
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
                            'tr' => ['sentence' => 'kırmızı bir kitap ve mavi bir kalem', 'correct' => ['kırmızı', 'bir', 'kitap', 've', 'mavi', 'bir', 'kalem'], 'extra' => ['yeşil']],
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
                            'az' => ['sentence' => 'bir yaşıl qələm', 'correct' => ['bir', 'yaşıl', 'qələm'], 'extra' => ['sarı', 'kitab']],
                            'ar' => ['sentence' => 'أخضر قلم', 'correct' => ['أخضر', 'قلم'], 'extra' => ['أصفر', 'كتاب']],
                            'ru' => ['sentence' => 'зелёный ручка', 'correct' => ['зелёный', 'ручка'], 'extra' => ['жёлтый', 'книга']],
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
                            'tr' => ['sentence' => 'yeşil bir kalem', 'correct' => ['yeşil', 'bir', 'kalem'], 'extra' => ['sarı', 'kitap']],
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
                            'az' => ['sentence' => 'bir sarı kitab', 'correct' => ['bir', 'sarı', 'kitab'], 'extra' => ['yaşıl', 'qələm']],
                            'ar' => ['sentence' => 'أصفر كتاب', 'correct' => ['أصفر', 'كتاب'], 'extra' => ['أخضر', 'قلم']],
                            'ru' => ['sentence' => 'жёлтый книга', 'correct' => ['жёлтый', 'книга'], 'extra' => ['зелёный', 'ручка']],
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
                            'tr' => ['sentence' => 'sarı bir kitap', 'correct' => ['sarı', 'bir', 'kitap'], 'extra' => ['yeşil', 'kalem']],
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
                            'az' => ['sentence' => 'bir yaşıl kitab və bir sarı qələm', 'correct' => ['bir', 'yaşıl', 'kitab', 'və', 'bir', 'sarı', 'qələm'], 'extra' => ['qırmızı']],
                            'ar' => ['sentence' => 'أخضر كتاب و أصفر قلم', 'correct' => ['أخضر', 'كتاب', 'و', 'أصفر', 'قلم'], 'extra' => ['أحمر']],
                            'ru' => ['sentence' => 'зелёный книга и жёлтый ручка', 'correct' => ['зелёный', 'книга', 'и', 'жёлтый', 'ручка'], 'extra' => ['красный']],
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
                            'tr' => ['sentence' => 'yeşil bir kitap ve sarı bir kalem', 'correct' => ['yeşil', 'bir', 'kitap', 've', 'sarı', 'bir', 'kalem'], 'extra' => ['kırmızı']],
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
                            'az' => ['sentence' => 'bir qara qələm', 'correct' => ['bir', 'qara', 'qələm'], 'extra' => ['ağ', 'kitab']],
                            'ar' => ['sentence' => 'أسود قلم', 'correct' => ['أسود', 'قلم'], 'extra' => ['أبيض', 'كتاب']],
                            'ru' => ['sentence' => 'чёрный ручка', 'correct' => ['чёрный', 'ручка'], 'extra' => ['белый', 'книга']],
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
                            'tr' => ['sentence' => 'siyah bir kalem', 'correct' => ['siyah', 'bir', 'kalem'], 'extra' => ['beyaz', 'kitap']],
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
                            'az' => ['sentence' => 'bir ağ kitab', 'correct' => ['bir', 'ağ', 'kitab'], 'extra' => ['qara', 'qələm']],
                            'ar' => ['sentence' => 'أبيض كتاب', 'correct' => ['أبيض', 'كتاب'], 'extra' => ['أسود', 'قلم']],
                            'ru' => ['sentence' => 'белый книга', 'correct' => ['белый', 'книга'], 'extra' => ['чёрный', 'ручка']],
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
                            'tr' => ['sentence' => 'beyaz bir kitap', 'correct' => ['beyaz', 'bir', 'kitap'], 'extra' => ['siyah', 'kalem']],
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
                            'az' => ['sentence' => 'bir qara kitab və bir ağ qələm', 'correct' => ['bir', 'qara', 'kitab', 'və', 'bir', 'ağ', 'qələm'], 'extra' => ['mavi']],
                            'ar' => ['sentence' => 'أسود كتاب و أبيض قلم', 'correct' => ['أسود', 'كتاب', 'و', 'أبيض', 'قلم'], 'extra' => ['أزرق']],
                            'ru' => ['sentence' => 'чёрный книга и белый ручка', 'correct' => ['чёрный', 'книга', 'и', 'белый', 'ручка'], 'extra' => ['синий']],
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
                            'tr' => ['sentence' => 'siyah bir kitap ve beyaz bir kalem', 'correct' => ['siyah', 'bir', 'kitap', 've', 'beyaz', 'bir', 'kalem'], 'extra' => ['mavi']],
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
                            'az' => ['sentence' => 'üç kitablar', 'correct' => ['üç', 'kitablar'], 'extra' => ['on', 'qələmlər']],
                            'ar' => ['sentence' => 'ثلاثة كتب', 'correct' => ['ثلاثة', 'كتب'], 'extra' => ['عشرة', 'أقلام']],
                            'ru' => ['sentence' => 'три книги', 'correct' => ['три', 'книги'], 'extra' => ['десять', 'ручки']],
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
                            'tr' => ['sentence' => 'üç kitap', 'correct' => ['üç', 'kitap'], 'extra' => ['on', 'kalemler']],
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
                            'az' => ['sentence' => 'on qələmlər', 'correct' => ['on', 'qələmlər'], 'extra' => ['üç', 'kitablar']],
                            'ar' => ['sentence' => 'عشرة أقلام', 'correct' => ['عشرة', 'أقلام'], 'extra' => ['ثلاثة', 'كتب']],
                            'ru' => ['sentence' => 'десять ручки', 'correct' => ['десять', 'ручки'], 'extra' => ['три', 'книги']],
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
                            'tr' => ['sentence' => 'on kalem', 'correct' => ['on', 'kalem'], 'extra' => ['üç', 'kitaplar']],
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
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['üç', 'on']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['ثلاثة', 'عشرة']],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['три', 'десять']],
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
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => ['üç', 'on']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
