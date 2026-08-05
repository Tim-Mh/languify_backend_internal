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
                        ],
                    ],
                ],
            ),
        ];
    }
}
