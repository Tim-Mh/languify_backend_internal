<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket06Seeder extends Seeder
{
    private const PICTURES = [
        'caja' => 'box',
        'botella' => 'bottle',
        'balanza' => 'scale',
        'zumo' => 'juice',
        'agua' => 'water',
        'azúcar' => 'sugar',
        'carrito' => 'cart',
        'manzana' => 'apple',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 6, the Spanish twin of the
     * English "Unit 6: Quantities and Packaging" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unidad 6: Cantidades y envases', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Caja y Botella', 1,
                pictures: [
                    [
                        'es' => 'caja',
                        'img' => 'box',
                    ],
                    [
                        'es' => 'botella',
                        'img' => 'bottle',
                    ],
                ],
                plain: [
                    [
                        'es' => 'litro',
                    ],
                    [
                        'es' => 'zumo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'litro',
                            'de',
                            'zumo',
                        ],
                        'blank' => 1,
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
                                    'checkout',
                                    'bottle',
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
                            'ja' => [
                                'sentence' => 'ジュース一リットル',
                                'correct' => [
                                    'ジュース',
                                    '一',
                                    'リットル',
                                ],
                                'extra' => [
                                    '箱',
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
                            'Una',
                            'caja',
                            'y',
                            'una',
                            'botella',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '箱とボトル',
                                'correct' => [
                                    '箱',
                                    'と',
                                    'ボトル',
                                ],
                                'extra' => [
                                    'リットル',
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
                            'Una',
                            'botella',
                            'de',
                            'zumo',
                        ],
                        'blank' => 3,
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
                                    'checkout',
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
                            'ja' => [
                                'sentence' => 'ジュースのボトル',
                                'correct' => [
                                    'ジュース',
                                    'の',
                                    'ボトル',
                                ],
                                'extra' => [
                                    '箱',
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
            $builder->lesson('Lección 2: Balanza y Manzana', 2,
                pictures: [
                    [
                        'es' => 'balanza',
                        'img' => 'scale',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pesar',
                    ],
                    [
                        'es' => 'gramo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Pesar',
                            'una',
                            'manzana',
                        ],
                        'blank' => 0,
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
                                    'scales',
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
                            'ja' => [
                                'sentence' => 'りんごを量る',
                                'correct' => [
                                    'りんご',
                                    'を',
                                    '量る',
                                ],
                                'extra' => [
                                    'グラム',
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
                            'La',
                            'balanza',
                            'y',
                            'el',
                            'gramo',
                        ],
                        'blank' => 1,
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
                                    'apple',
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
                            'ja' => [
                                'sentence' => 'はかりとグラム',
                                'correct' => [
                                    'はかり',
                                    'と',
                                    'グラム',
                                ],
                                'extra' => [
                                    '量る',
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
                            'Pesar',
                            'en',
                            'la',
                            'balanza',
                        ],
                        'blank' => 3,
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
                                    'apple',
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
                            'ja' => [
                                'sentence' => 'はかりの上で量る',
                                'correct' => [
                                    'はかり',
                                    'の',
                                    '上',
                                    'で',
                                    '量る',
                                ],
                                'extra' => [
                                    'グラム',
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
            $builder->lesson('Lección 3: Azúcar y Caja', 3,
                pictures: [
                    [
                        'es' => 'azúcar',
                        'img' => 'sugar',
                    ],
                    [
                        'es' => 'caja',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pequeño',
                    ],
                    [
                        'es' => 'grande',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'caja',
                            'de',
                            'azúcar',
                        ],
                        'blank' => 3,
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
                                    'big',
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
                            'ja' => [
                                'sentence' => '砂糖の箱',
                                'correct' => [
                                    '砂糖',
                                    'の',
                                    '箱',
                                ],
                                'extra' => [
                                    '小さい',
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
                            'Una',
                            'caja',
                            'pequeña',
                        ],
                        'blank' => 2,
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
                                    'sugar',
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
                            'ja' => [
                                'sentence' => '小さい箱',
                                'correct' => [
                                    '小さい',
                                    '箱',
                                ],
                                'extra' => [
                                    '大きい',
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
                            'Una',
                            'caja',
                            'grande',
                            'de',
                            'azúcar',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => '大きい砂糖の箱',
                                'correct' => [
                                    '大きい',
                                    '砂糖',
                                    'の',
                                    '箱',
                                ],
                                'extra' => [
                                    '小さい',
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
            $builder->lesson('Lección 4: Agua y Botella', 4,
                pictures: [
                    [
                        'es' => 'agua',
                        'img' => 'water',
                    ],
                    [
                        'es' => 'botella',
                        'img' => 'bottle',
                    ],
                ],
                plain: [
                    [
                        'es' => 'litro',
                    ],
                    [
                        'es' => 'dos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Dos',
                            'litros',
                            'de',
                            'agua',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => '水二リットル',
                                'correct' => [
                                    '水',
                                    '二',
                                    'リットル',
                                ],
                                'extra' => [
                                    'ボトル',
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
                            'Una',
                            'botella',
                            'de',
                            'agua',
                        ],
                        'blank' => 1,
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
                                    'two',
                                    'litre',
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
                            'ja' => [
                                'sentence' => '水のボトル',
                                'correct' => [
                                    '水',
                                    'の',
                                    'ボトル',
                                ],
                                'extra' => [
                                    'リットル',
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
                            'Dos',
                            'botellas',
                            'de',
                            'agua',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => '水二本',
                                'correct' => [
                                    '水',
                                    '二本',
                                ],
                                'extra' => [
                                    'リットル',
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
            $builder->lesson('Lección 5: Carrito y Zumo', 5,
                pictures: [
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                    [
                        'es' => 'zumo',
                        'img' => 'juice',
                    ],
                ],
                plain: [
                    [
                        'es' => 'poner',
                    ],
                    [
                        'es' => 'caja',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Poner',
                            'una',
                            'caja',
                            'en',
                            'el',
                            'carrito',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => '箱をカートに入れる',
                                'correct' => [
                                    '箱',
                                    'を',
                                    'カート',
                                    'に',
                                    '入れる',
                                ],
                                'extra' => [
                                    'ジュース',
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
                            'Una',
                            'caja',
                            'de',
                            'zumo',
                        ],
                        'blank' => 3,
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
                                    'trolley',
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
                            'ja' => [
                                'sentence' => 'ジュースの箱',
                                'correct' => [
                                    'ジュース',
                                    'の',
                                    '箱',
                                ],
                                'extra' => [
                                    '入れる',
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
                            'Poner',
                            'zumo',
                            'en',
                            'el',
                            'carrito',
                        ],
                        'blank' => 1,
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
                                    'checkout',
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
                            'ja' => [
                                'sentence' => 'ジュースをカートに入れる',
                                'correct' => [
                                    'ジュース',
                                    'を',
                                    'カート',
                                    'に',
                                    '入れる',
                                ],
                                'extra' => [
                                    '箱',
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
