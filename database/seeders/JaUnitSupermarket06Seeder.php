<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket06Seeder extends Seeder
{
    private const PICTURES = [
        '箱' => 'box',
        'ボトル' => 'bottle',
        'はかり' => 'scale',
        'ジュース' => 'juice',
        '水' => 'water',
        '砂糖' => 'sugar',
        'カート' => 'cart',
        'りんご' => 'apple',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 6, the Japanese twin of the
     * English "Unit 6: Quantities and Packaging" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'ユニット6: 量と包装', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 箱・ボトル', 1,
                pictures: [
                    [
                        'ja' => '箱',
                        'img' => 'box',
                    ],
                    [
                        'ja' => 'ボトル',
                        'img' => 'bottle',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'リットル',
                    ],
                    [
                        'ja' => 'ジュース',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ジュース',
                            '一',
                            'リットル',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a litre of juice',
                                'correct' => [
                                    'a',
                                    'litre',
                                    'of',
                                    'juice',
                                ],
                                'extra' => [
                                    'box',
                                ],
                            ],
                            'az' => ['sentence' => 'bir litr şirə', 'correct' => ['bir', 'litr', 'şirə'], 'extra' => ['qutu']],
                            'ar' => ['sentence' => 'لتر عصير', 'correct' => ['لتر', 'عصير'], 'extra' => ['علبة']],
                            'ru' => ['sentence' => 'литр сок', 'correct' => ['литр', 'сок'], 'extra' => ['коробка']],
                            'es' => [
                                'sentence' => 'Un litro de zumo',
                                'correct' => [
                                    'un',
                                    'litro',
                                    'de',
                                    'zumo',
                                ],
                                'extra' => [
                                    'caja',
                                    'botella',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Liter Saft',
                                'correct' => [
                                    'ein',
                                    'Liter',
                                    'von',
                                    'Saft',
                                ],
                                'extra' => [
                                    'Schachtel',
                                    'Flasche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un litre de jus',
                                'correct' => [
                                    'un',
                                    'litre',
                                    'de',
                                    'jus',
                                ],
                                'extra' => [
                                    'boîte',
                                    'bouteille',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스 일 리터',
                                'correct' => [
                                    '주스',
                                    '일',
                                    '리터',
                                ],
                                'extra' => [
                                    '상자',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir litre meyve suyu', 'correct' => ['bir', 'litre', 'meyve', 'suyu'], 'extra' => ['kutu']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '箱',
                            'と',
                            'ボトル',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a box and a bottle',
                                'correct' => [
                                    'a',
                                    'box',
                                    'and',
                                    'a',
                                    'bottle',
                                ],
                                'extra' => [
                                    'litre',
                                ],
                            ],
                            'az' => ['sentence' => 'bir qutu və bir şüşə', 'correct' => ['bir', 'qutu', 'və', 'bir', 'şüşə'], 'extra' => ['litr']],
                            'ar' => ['sentence' => 'علبة و زجاجة', 'correct' => ['علبة', 'و', 'زجاجة'], 'extra' => ['لتر']],
                            'ru' => ['sentence' => 'коробка и бутылка', 'correct' => ['коробка', 'и', 'бутылка'], 'extra' => ['литр']],
                            'es' => [
                                'sentence' => 'Una caja y una botella',
                                'correct' => [
                                    'una',
                                    'caja',
                                    'y',
                                    'una',
                                    'botella',
                                ],
                                'extra' => [
                                    'litro',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Schachtel und eine Flasche',
                                'correct' => [
                                    'eine',
                                    'Schachtel',
                                    'und',
                                    'eine',
                                    'Flasche',
                                ],
                                'extra' => [
                                    'Liter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une boîte et une bouteille',
                                'correct' => [
                                    'une',
                                    'boîte',
                                    'et',
                                    'une',
                                    'bouteille',
                                ],
                                'extra' => [
                                    'litre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '상자와 병',
                                'correct' => [
                                    '상자와',
                                    '병',
                                ],
                                'extra' => [
                                    '리터',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kutu ve bir şişe', 'correct' => ['bir', 'kutu', 've', 'bir', 'şişe'], 'extra' => ['litre']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ジュース',
                            'の',
                            'ボトル',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a bottle of juice',
                                'correct' => [
                                    'a',
                                    'bottle',
                                    'of',
                                    'juice',
                                ],
                                'extra' => [
                                    'box',
                                ],
                            ],
                            'az' => ['sentence' => 'bir şüşə şirə', 'correct' => ['bir', 'şüşə', 'şirə'], 'extra' => ['qutu']],
                            'ar' => ['sentence' => 'زجاجة عصير', 'correct' => ['زجاجة', 'عصير'], 'extra' => ['علبة']],
                            'ru' => ['sentence' => 'бутылка сок', 'correct' => ['бутылка', 'сок'], 'extra' => ['коробка']],
                            'es' => [
                                'sentence' => 'Una botella de zumo',
                                'correct' => [
                                    'una',
                                    'botella',
                                    'de',
                                    'zumo',
                                ],
                                'extra' => [
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Flasche Saft',
                                'correct' => [
                                    'eine',
                                    'Flasche',
                                    'von',
                                    'Saft',
                                ],
                                'extra' => [
                                    'Schachtel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une bouteille de jus',
                                'correct' => [
                                    'une',
                                    'bouteille',
                                    'de',
                                    'jus',
                                ],
                                'extra' => [
                                    'boîte',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스 한 병',
                                'correct' => [
                                    '주스',
                                    '한',
                                    '병',
                                ],
                                'extra' => [
                                    '상자',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir şişe meyve suyu', 'correct' => ['bir', 'şişe', 'meyve', 'suyu'], 'extra' => ['kutu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: はかり・りんご', 2,
                pictures: [
                    [
                        'ja' => 'はかり',
                        'img' => 'scale',
                    ],
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'ja' => '量る',
                    ],
                    [
                        'ja' => 'グラム',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'りんご',
                            'を',
                            '量る',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to weigh an apple',
                                'correct' => [
                                    'to weigh',
                                    'an',
                                    'apple',
                                ],
                                'extra' => [
                                    'gram',
                                ],
                            ],
                            'az' => ['sentence' => 'çəkmək bir alma', 'correct' => ['çəkmək', 'bir', 'alma'], 'extra' => ['qram']],
                            'ar' => ['sentence' => 'الوزن تفاحة', 'correct' => ['الوزن', 'تفاحة'], 'extra' => ['غرام']],
                            'ru' => ['sentence' => 'взвесить яблоко', 'correct' => ['взвесить', 'яблоко'], 'extra' => ['грамм']],
                            'es' => [
                                'sentence' => 'Pesar una manzana',
                                'correct' => [
                                    'pesar',
                                    'una',
                                    'manzana',
                                ],
                                'extra' => [
                                    'gramo',
                                    'balanza',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Apfel wiegen',
                                'correct' => [
                                    'einen',
                                    'Apfel',
                                    'wiegen',
                                ],
                                'extra' => [
                                    'Gramm',
                                    'Waage',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Peser une pomme',
                                'correct' => [
                                    'peser',
                                    'une',
                                    'pomme',
                                ],
                                'extra' => [
                                    'gramme',
                                    'balance',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과의 무게를 재다',
                                'correct' => [
                                    '사과의',
                                    '무게를',
                                    '재다',
                                ],
                                'extra' => [
                                    '그램',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir elma tartmak', 'correct' => ['bir', 'elma', 'tartmak'], 'extra' => ['gram']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'はかり',
                            'と',
                            'グラム',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the scales and the gram',
                                'correct' => [
                                    'the',
                                    'scales',
                                    'and',
                                    'the',
                                    'gram',
                                ],
                                'extra' => [
                                    'to weigh',
                                ],
                            ],
                            'az' => ['sentence' => 'tərəzi və qram', 'correct' => ['tərəzi', 'və', 'qram'], 'extra' => ['çəkmək']],
                            'ar' => ['sentence' => 'ميزان و غرام', 'correct' => ['ميزان', 'و', 'غرام'], 'extra' => ['الوزن']],
                            'ru' => ['sentence' => 'весы и грамм', 'correct' => ['весы', 'и', 'грамм'], 'extra' => ['взвесить']],
                            'es' => [
                                'sentence' => 'La balanza y el gramo',
                                'correct' => [
                                    'la',
                                    'balanza',
                                    'y',
                                    'el',
                                    'gramo',
                                ],
                                'extra' => [
                                    'pesar',
                                    'manzana',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Waage und das Gramm',
                                'correct' => [
                                    'die',
                                    'Waage',
                                    'und',
                                    'das',
                                    'Gramm',
                                ],
                                'extra' => [
                                    'wiegen',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La balance et le gramme',
                                'correct' => [
                                    'la',
                                    'balance',
                                    'et',
                                    'le',
                                    'gramme',
                                ],
                                'extra' => [
                                    'peser',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저울과 그램',
                                'correct' => [
                                    '저울과',
                                    '그램',
                                ],
                                'extra' => [
                                    '무게를 재다',
                                ],
                            ],
                            'tr' => ['sentence' => 'terazi ve gram', 'correct' => ['terazi', 've', 'gram'], 'extra' => ['tartmak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'はかり',
                            'の',
                            '上',
                            'で',
                            '量る',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to weigh on the scales',
                                'correct' => [
                                    'to weigh',
                                    'on',
                                    'the',
                                    'scales',
                                ],
                                'extra' => [
                                    'gram',
                                ],
                            ],
                            'az' => ['sentence' => 'çəkmək üzərində tərəzi', 'correct' => ['çəkmək', 'üzərində', 'tərəzi'], 'extra' => ['qram']],
                            'ar' => ['sentence' => 'الوزن على ميزان', 'correct' => ['الوزن', 'على', 'ميزان'], 'extra' => ['غرام']],
                            'ru' => ['sentence' => 'взвесить на весы', 'correct' => ['взвесить', 'на', 'весы'], 'extra' => ['грамм']],
                            'es' => [
                                'sentence' => 'Pesar en la balanza',
                                'correct' => [
                                    'pesar',
                                    'sobre',
                                    'la',
                                    'balanza',
                                ],
                                'extra' => [
                                    'gramo',
                                    'manzana',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Auf der Waage wiegen',
                                'correct' => [
                                    'auf',
                                    'der',
                                    'Waage',
                                    'wiegen',
                                ],
                                'extra' => [
                                    'Gramm',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Peser sur la balance',
                                'correct' => [
                                    'peser',
                                    'sur',
                                    'la',
                                    'balance',
                                ],
                                'extra' => [
                                    'gramme',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저울 위에서 무게를 재다',
                                'correct' => [
                                    '저울',
                                    '위에서',
                                    '무게를',
                                    '재다',
                                ],
                                'extra' => [
                                    '그램',
                                ],
                            ],
                            'tr' => ['sentence' => 'terazide tartmak', 'correct' => ['terazide', 'tartmak'], 'extra' => ['gram']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 砂糖・箱', 3,
                pictures: [
                    [
                        'ja' => '砂糖',
                        'img' => 'sugar',
                    ],
                    [
                        'ja' => '箱',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'ja' => '小さい',
                    ],
                    [
                        'ja' => '大きい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '砂糖',
                            'の',
                            '箱',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a box of sugar',
                                'correct' => [
                                    'a',
                                    'box',
                                    'of',
                                    'sugar',
                                ],
                                'extra' => [
                                    'small',
                                ],
                            ],
                            'az' => ['sentence' => 'bir qutu şəkər', 'correct' => ['bir', 'qutu', 'şəkər'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'علبة سكر', 'correct' => ['علبة', 'سكر'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'коробка сахар', 'correct' => ['коробка', 'сахар'], 'extra' => ['маленький']],
                            'es' => [
                                'sentence' => 'Una caja de azúcar',
                                'correct' => [
                                    'una',
                                    'caja',
                                    'de',
                                    'azúcar',
                                ],
                                'extra' => [
                                    'pequeño',
                                    'grande',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Schachtel Zucker',
                                'correct' => [
                                    'eine',
                                    'Schachtel',
                                    'von',
                                    'Zucker',
                                ],
                                'extra' => [
                                    'klein',
                                    'groß',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une boîte de sucre',
                                'correct' => [
                                    'une',
                                    'boîte',
                                    'de',
                                    'sucre',
                                ],
                                'extra' => [
                                    'petit',
                                    'grand',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '설탕 한 상자',
                                'correct' => [
                                    '설탕',
                                    '한',
                                    '상자',
                                ],
                                'extra' => [
                                    '작은',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kutu şeker', 'correct' => ['bir', 'kutu', 'şeker'], 'extra' => ['küçük']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '小さい',
                            '箱',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a small box',
                                'correct' => [
                                    'a',
                                    'small',
                                    'box',
                                ],
                                'extra' => [
                                    'big',
                                ],
                            ],
                            'az' => ['sentence' => 'bir kiçik qutu', 'correct' => ['bir', 'kiçik', 'qutu'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'صغير علبة', 'correct' => ['صغير', 'علبة'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'маленький коробка', 'correct' => ['маленький', 'коробка'], 'extra' => ['большой']],
                            'es' => [
                                'sentence' => 'Una caja pequeña',
                                'correct' => [
                                    'una',
                                    'pequeño',
                                    'caja',
                                ],
                                'extra' => [
                                    'grande',
                                    'azúcar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine kleine Schachtel',
                                'correct' => [
                                    'eine',
                                    'klein',
                                    'Schachtel',
                                ],
                                'extra' => [
                                    'groß',
                                    'Zucker',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une petite boîte',
                                'correct' => [
                                    'une',
                                    'boîte',
                                    'petit',
                                ],
                                'extra' => [
                                    'grand',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '작은 상자',
                                'correct' => [
                                    '작은',
                                    '상자',
                                ],
                                'extra' => [
                                    '큰',
                                ],
                            ],
                            'tr' => ['sentence' => 'küçük bir kutu', 'correct' => ['küçük', 'bir', 'kutu'], 'extra' => ['büyük']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '大きい',
                            '砂糖',
                            'の',
                            '箱',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a big box of sugar',
                                'correct' => [
                                    'a',
                                    'big',
                                    'box',
                                    'of',
                                    'sugar',
                                ],
                                'extra' => [
                                    'small',
                                ],
                            ],
                            'az' => ['sentence' => 'bir böyük qutu şəkər', 'correct' => ['bir', 'böyük', 'qutu', 'şəkər'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'كبير علبة سكر', 'correct' => ['كبير', 'علبة', 'سكر'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'большой коробка сахар', 'correct' => ['большой', 'коробка', 'сахар'], 'extra' => ['маленький']],
                            'es' => [
                                'sentence' => 'Una caja grande de azúcar',
                                'correct' => [
                                    'una',
                                    'caja',
                                    'grande',
                                    'de',
                                    'azúcar',
                                ],
                                'extra' => [
                                    'pequeño',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine große Schachtel Zucker',
                                'correct' => [
                                    'eine',
                                    'groß',
                                    'Schachtel',
                                    'von',
                                    'Zucker',
                                ],
                                'extra' => [
                                    'klein',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une grande boîte de sucre',
                                'correct' => [
                                    'une',
                                    'grand',
                                    'boîte',
                                    'de',
                                    'sucre',
                                ],
                                'extra' => [
                                    'petit',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '큰 설탕 상자',
                                'correct' => [
                                    '큰',
                                    '설탕',
                                    '상자',
                                ],
                                'extra' => [
                                    '작은',
                                ],
                            ],
                            'tr' => ['sentence' => 'büyük bir kutu şeker', 'correct' => ['büyük', 'bir', 'kutu', 'şeker'], 'extra' => ['küçük']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 水・ボトル', 4,
                pictures: [
                    [
                        'ja' => '水',
                        'img' => 'water',
                    ],
                    [
                        'ja' => 'ボトル',
                        'img' => 'bottle',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'リットル',
                    ],
                    [
                        'ja' => '二',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '水',
                            '二',
                            'リットル',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'two litres of water',
                                'correct' => [
                                    'two',
                                    'litre',
                                    'of',
                                    'water',
                                ],
                                'extra' => [
                                    'bottle',
                                ],
                            ],
                            'az' => ['sentence' => 'iki litr su', 'correct' => ['iki', 'litr', 'su'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'اثنان لتر ماء', 'correct' => ['اثنان', 'لتر', 'ماء'], 'extra' => ['زجاجة']],
                            'ru' => ['sentence' => 'два литр вода', 'correct' => ['два', 'литр', 'вода'], 'extra' => ['бутылка']],
                            'es' => [
                                'sentence' => 'Dos litros de agua',
                                'correct' => [
                                    'dos',
                                    'litro',
                                    'de',
                                    'agua',
                                ],
                                'extra' => [
                                    'botella',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Zwei Liter Wasser',
                                'correct' => [
                                    'zwei',
                                    'Liter',
                                    'von',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'Flasche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Deux litres d\'eau',
                                'correct' => [
                                    'deux',
                                    'litre',
                                    'de',
                                    'eau',
                                ],
                                'extra' => [
                                    'bouteille',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '물 이 리터',
                                'correct' => [
                                    '물',
                                    '이',
                                    '리터',
                                ],
                                'extra' => [
                                    '병',
                                ],
                            ],
                            'tr' => ['sentence' => 'iki litre su', 'correct' => ['iki', 'litre', 'su'], 'extra' => ['şişe']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '水',
                            'の',
                            'ボトル',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a bottle of water',
                                'correct' => [
                                    'a',
                                    'bottle',
                                    'of',
                                    'water',
                                ],
                                'extra' => [
                                    'litre',
                                ],
                            ],
                            'az' => ['sentence' => 'bir şüşə su', 'correct' => ['bir', 'şüşə', 'su'], 'extra' => ['litr']],
                            'ar' => ['sentence' => 'زجاجة ماء', 'correct' => ['زجاجة', 'ماء'], 'extra' => ['لتر']],
                            'ru' => ['sentence' => 'бутылка вода', 'correct' => ['бутылка', 'вода'], 'extra' => ['литр']],
                            'es' => [
                                'sentence' => 'Una botella de agua',
                                'correct' => [
                                    'una',
                                    'botella',
                                    'de',
                                    'agua',
                                ],
                                'extra' => [
                                    'dos',
                                    'litro',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Flasche Wasser',
                                'correct' => [
                                    'eine',
                                    'Flasche',
                                    'von',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'zwei',
                                    'Liter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une bouteille d\'eau',
                                'correct' => [
                                    'une',
                                    'bouteille',
                                    'de',
                                    'eau',
                                ],
                                'extra' => [
                                    'litre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '물 한 병',
                                'correct' => [
                                    '물',
                                    '한',
                                    '병',
                                ],
                                'extra' => [
                                    '리터',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir şişe su', 'correct' => ['bir', 'şişe', 'su'], 'extra' => ['litre']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '水',
                            '二本',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'two bottles of water',
                                'correct' => [
                                    'two',
                                    'bottle',
                                    'of',
                                    'water',
                                ],
                                'extra' => [
                                    'litre',
                                ],
                            ],
                            'az' => ['sentence' => 'iki şüşə su', 'correct' => ['iki', 'şüşə', 'su'], 'extra' => ['litr']],
                            'ar' => ['sentence' => 'اثنان زجاجة ماء', 'correct' => ['اثنان', 'زجاجة', 'ماء'], 'extra' => ['لتر']],
                            'ru' => ['sentence' => 'два бутылка вода', 'correct' => ['два', 'бутылка', 'вода'], 'extra' => ['литр']],
                            'es' => [
                                'sentence' => 'Dos botellas de agua',
                                'correct' => [
                                    'dos',
                                    'botella',
                                    'de',
                                    'agua',
                                ],
                                'extra' => [
                                    'litro',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Zwei Flaschen Wasser',
                                'correct' => [
                                    'zwei',
                                    'Flasche',
                                    'von',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'Liter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Deux bouteilles d\'eau',
                                'correct' => [
                                    'deux',
                                    'bouteille',
                                    'de',
                                    'eau',
                                ],
                                'extra' => [
                                    'litre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '물 두 병',
                                'correct' => [
                                    '물',
                                    '두',
                                    '병',
                                ],
                                'extra' => [
                                    '리터',
                                ],
                            ],
                            'tr' => ['sentence' => 'iki şişe su', 'correct' => ['iki', 'şişe', 'su'], 'extra' => ['litre']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: カート・ジュース', 5,
                pictures: [
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                    [
                        'ja' => 'ジュース',
                        'img' => 'juice',
                    ],
                ],
                plain: [
                    [
                        'ja' => '入れる',
                    ],
                    [
                        'ja' => '箱',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '箱',
                            'を',
                            'カート',
                            'に',
                            '入れる',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put a box in the trolley',
                                'correct' => [
                                    'to put',
                                    'a',
                                    'box',
                                    'in',
                                    'the',
                                    'trolley',
                                ],
                                'extra' => [
                                    'juice',
                                ],
                            ],
                            'az' => ['sentence' => 'qoymaq bir qutu içində araba', 'correct' => ['qoymaq', 'bir', 'qutu', 'içində', 'araba'], 'extra' => ['şirə']],
                            'ar' => ['sentence' => 'وضع علبة في عربة', 'correct' => ['وضع', 'علبة', 'في', 'عربة'], 'extra' => ['عصير']],
                            'ru' => ['sentence' => 'положить коробка в тележка', 'correct' => ['положить', 'коробка', 'в', 'тележка'], 'extra' => ['сок']],
                            'es' => [
                                'sentence' => 'Poner una caja en el carrito',
                                'correct' => [
                                    'poner',
                                    'una',
                                    'caja',
                                    'en',
                                    'el',
                                    'carrito',
                                ],
                                'extra' => [
                                    'zumo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Schachtel in den Einkaufswagen legen',
                                'correct' => [
                                    'eine',
                                    'Schachtel',
                                    'in',
                                    'den',
                                    'Einkaufswagen',
                                    'legen',
                                ],
                                'extra' => [
                                    'Saft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre une boîte dans le chariot',
                                'correct' => [
                                    'mettre',
                                    'une',
                                    'boîte',
                                    'dans',
                                    'le',
                                    'chariot',
                                ],
                                'extra' => [
                                    'jus',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '상자를 카트에 넣다',
                                'correct' => [
                                    '상자를',
                                    '카트에',
                                    '넣다',
                                ],
                                'extra' => [
                                    '주스',
                                ],
                            ],
                            'tr' => ['sentence' => 'arabaya bir kutu koymak', 'correct' => ['arabaya', 'bir', 'kutu', 'koymak'], 'extra' => ['meyve suyu']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ジュース',
                            'の',
                            '箱',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a box of juice',
                                'correct' => [
                                    'a',
                                    'box',
                                    'of',
                                    'juice',
                                ],
                                'extra' => [
                                    'to put',
                                ],
                            ],
                            'az' => ['sentence' => 'bir qutu şirə', 'correct' => ['bir', 'qutu', 'şirə'], 'extra' => ['qoymaq']],
                            'ar' => ['sentence' => 'علبة عصير', 'correct' => ['علبة', 'عصير'], 'extra' => ['وضع']],
                            'ru' => ['sentence' => 'коробка сок', 'correct' => ['коробка', 'сок'], 'extra' => ['положить']],
                            'es' => [
                                'sentence' => 'Una caja de zumo',
                                'correct' => [
                                    'una',
                                    'caja',
                                    'de',
                                    'zumo',
                                ],
                                'extra' => [
                                    'poner',
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Schachtel Saft',
                                'correct' => [
                                    'eine',
                                    'Schachtel',
                                    'von',
                                    'Saft',
                                ],
                                'extra' => [
                                    'legen',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une boîte de jus',
                                'correct' => [
                                    'une',
                                    'boîte',
                                    'de',
                                    'jus',
                                ],
                                'extra' => [
                                    'mettre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스 한 상자',
                                'correct' => [
                                    '주스',
                                    '한',
                                    '상자',
                                ],
                                'extra' => [
                                    '넣다',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kutu meyve suyu', 'correct' => ['bir', 'kutu', 'meyve', 'suyu'], 'extra' => ['koymak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ジュース',
                            'を',
                            'カート',
                            'に',
                            '入れる',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put juice in the trolley',
                                'correct' => [
                                    'to put',
                                    'juice',
                                    'in',
                                    'the',
                                    'trolley',
                                ],
                                'extra' => [
                                    'box',
                                ],
                            ],
                            'az' => ['sentence' => 'qoymaq şirə içində araba', 'correct' => ['qoymaq', 'şirə', 'içində', 'araba'], 'extra' => ['qutu']],
                            'ar' => ['sentence' => 'وضع عصير في عربة', 'correct' => ['وضع', 'عصير', 'في', 'عربة'], 'extra' => ['علبة']],
                            'ru' => ['sentence' => 'положить сок в тележка', 'correct' => ['положить', 'сок', 'в', 'тележка'], 'extra' => ['коробка']],
                            'es' => [
                                'sentence' => 'Poner zumo en el carrito',
                                'correct' => [
                                    'poner',
                                    'zumo',
                                    'en',
                                    'el',
                                    'carrito',
                                ],
                                'extra' => [
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Saft in den Einkaufswagen legen',
                                'correct' => [
                                    'Saft',
                                    'in',
                                    'den',
                                    'Einkaufswagen',
                                    'legen',
                                ],
                                'extra' => [
                                    'Schachtel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre du jus dans le chariot',
                                'correct' => [
                                    'mettre',
                                    'jus',
                                    'dans',
                                    'le',
                                    'chariot',
                                ],
                                'extra' => [
                                    'boîte',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스를 카트에 넣다',
                                'correct' => [
                                    '주스를',
                                    '카트에',
                                    '넣다',
                                ],
                                'extra' => [
                                    '상자',
                                ],
                            ],
                            'tr' => ['sentence' => 'arabaya meyve suyu koymak', 'correct' => ['arabaya', 'meyve', 'suyu', 'koymak'], 'extra' => ['kutu']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
