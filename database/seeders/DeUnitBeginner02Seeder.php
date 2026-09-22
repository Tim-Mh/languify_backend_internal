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
                            'az' => ['sentence' => 'bir qırmızı kitab', 'correct' => ['bir', 'qırmızı', 'kitab'], 'extra' => ['mavi', 'qələm']],
                            'ar' => ['sentence' => 'أحمر كتاب', 'correct' => ['أحمر', 'كتاب'], 'extra' => ['أزرق', 'قلم']],
                            'ru' => ['sentence' => 'красный книга', 'correct' => ['красный', 'книга'], 'extra' => ['синий', 'ручка']],
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
                            'tr' => ['sentence' => 'kırmızı bir kitap', 'correct' => ['kırmızı', 'bir', 'kitap'], 'extra' => ['mavi', 'kalem']],
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
                            'az' => ['sentence' => 'bir mavi qələm', 'correct' => ['bir', 'mavi', 'qələm'], 'extra' => ['qırmızı', 'kitab']],
                            'ar' => ['sentence' => 'أزرق قلم', 'correct' => ['أزرق', 'قلم'], 'extra' => ['أحمر', 'كتاب']],
                            'ru' => ['sentence' => 'синий ручка', 'correct' => ['синий', 'ручка'], 'extra' => ['красный', 'книга']],
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
                            'tr' => ['sentence' => 'mavi bir kalem', 'correct' => ['mavi', 'bir', 'kalem'], 'extra' => ['kırmızı', 'kitap']],
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
                            'az' => ['sentence' => 'bir yaşıl qələm', 'correct' => ['bir', 'yaşıl', 'qələm'], 'extra' => ['sarı', 'kitab']],
                            'ar' => ['sentence' => 'أخضر قلم', 'correct' => ['أخضر', 'قلم'], 'extra' => ['أصفر', 'كتاب']],
                            'ru' => ['sentence' => 'зелёный ручка', 'correct' => ['зелёный', 'ручка'], 'extra' => ['жёлтый', 'книга']],
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
                            'tr' => ['sentence' => 'yeşil bir kalem', 'correct' => ['yeşil', 'bir', 'kalem'], 'extra' => ['sarı', 'kitap']],
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
                            'az' => ['sentence' => 'bir sarı kitab', 'correct' => ['bir', 'sarı', 'kitab'], 'extra' => ['yaşıl', 'qələm']],
                            'ar' => ['sentence' => 'أصفر كتاب', 'correct' => ['أصفر', 'كتاب'], 'extra' => ['أخضر', 'قلم']],
                            'ru' => ['sentence' => 'жёлтый книга', 'correct' => ['жёлтый', 'книга'], 'extra' => ['зелёный', 'ручка']],
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
                            'tr' => ['sentence' => 'sarı bir kitap', 'correct' => ['sarı', 'bir', 'kitap'], 'extra' => ['yeşil', 'kalem']],
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
                            'az' => ['sentence' => 'bir qara qələm', 'correct' => ['bir', 'qara', 'qələm'], 'extra' => ['ağ', 'kitab']],
                            'ar' => ['sentence' => 'أسود قلم', 'correct' => ['أسود', 'قلم'], 'extra' => ['أبيض', 'كتاب']],
                            'ru' => ['sentence' => 'чёрный ручка', 'correct' => ['чёрный', 'ручка'], 'extra' => ['белый', 'книга']],
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
                            'tr' => ['sentence' => 'siyah bir kalem', 'correct' => ['siyah', 'bir', 'kalem'], 'extra' => ['beyaz', 'kitap']],
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
                            'az' => ['sentence' => 'bir ağ kitab', 'correct' => ['bir', 'ağ', 'kitab'], 'extra' => ['qara', 'qələm']],
                            'ar' => ['sentence' => 'أبيض كتاب', 'correct' => ['أبيض', 'كتاب'], 'extra' => ['أسود', 'قلم']],
                            'ru' => ['sentence' => 'белый книга', 'correct' => ['белый', 'книга'], 'extra' => ['чёрный', 'ручка']],
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
                            'tr' => ['sentence' => 'beyaz bir kitap', 'correct' => ['beyaz', 'bir', 'kitap'], 'extra' => ['siyah', 'kalem']],
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
                            'az' => ['sentence' => 'üç kitablar', 'correct' => ['üç', 'kitablar'], 'extra' => ['on', 'qələm']],
                            'ar' => ['sentence' => 'ثلاثة كتب', 'correct' => ['ثلاثة', 'كتب'], 'extra' => ['عشرة', 'قلم']],
                            'ru' => ['sentence' => 'три книги', 'correct' => ['три', 'книги'], 'extra' => ['десять', 'ручка']],
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
                            'tr' => ['sentence' => 'üç kitap', 'correct' => ['üç', 'kitap'], 'extra' => ['on', 'kalem']],
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
                            'az' => ['sentence' => 'on qələmlər', 'correct' => ['on', 'qələmlər'], 'extra' => ['üç', 'kitablar']],
                            'ar' => ['sentence' => 'عشرة أقلام', 'correct' => ['عشرة', 'أقلام'], 'extra' => ['ثلاثة', 'كتب']],
                            'ru' => ['sentence' => 'десять ручки', 'correct' => ['десять', 'ручки'], 'extra' => ['три', 'книги']],
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
                            'tr' => ['sentence' => 'on kalem', 'correct' => ['on', 'kalem'], 'extra' => ['üç', 'kitaplar']],
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
