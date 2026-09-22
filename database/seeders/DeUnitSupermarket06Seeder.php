<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket06Seeder extends Seeder
{
    private const PICTURES = [
        'Schachtel' => 'box',
        'Flasche' => 'bottle',
        'Waage' => 'scale',
        'Saft' => 'juice',
        'Wasser' => 'water',
        'Zucker' => 'sugar',
        'Einkaufswagen' => 'cart',
        'Apfel' => 'apple',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 6, the German twin of the
     * English "Unit 6: Quantities and Packaging" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Einheit 6: Mengen & Verpackungen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Schachtel & Flasche', 1,
                pictures: [
                    [
                        'de' => 'Schachtel',
                        'img' => 'box',
                    ],
                    [
                        'de' => 'Flasche',
                        'img' => 'bottle',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Liter',
                    ],
                    [
                        'de' => 'Saft',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Liter',
                            'Saft',
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
                                    'box',
                                    'bottle',
                                ],
                            ],
                            'az' => ['sentence' => 'bir litr şirə', 'correct' => ['bir', 'litr', 'şirə'], 'extra' => ['qutu', 'şüşə']],
                            'ar' => ['sentence' => 'لتر عصير', 'correct' => ['لتر', 'عصير'], 'extra' => ['علبة', 'زجاجة']],
                            'ru' => ['sentence' => 'литр сок', 'correct' => ['литр', 'сок'], 'extra' => ['коробка', 'бутылка']],
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
                            'tr' => ['sentence' => 'bir litre meyve suyu', 'correct' => ['bir', 'litre', 'meyve', 'suyu'], 'extra' => ['kutu', 'şişe']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'Schachtel',
                            'und',
                            'eine',
                            'Flasche',
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
                            'tr' => ['sentence' => 'bir kutu ve bir şişe', 'correct' => ['bir', 'kutu', 've', 'bir', 'şişe'], 'extra' => ['litre']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Eine',
                            'Flasche',
                            'Saft',
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
                            'tr' => ['sentence' => 'bir şişe meyve suyu', 'correct' => ['bir', 'şişe', 'meyve', 'suyu'], 'extra' => ['kutu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Waage & Apfel', 2,
                pictures: [
                    [
                        'de' => 'Waage',
                        'img' => 'scale',
                    ],
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wiegen',
                    ],
                    [
                        'de' => 'Gramm',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Einen',
                            'Apfel',
                            'wiegen',
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
                                    'scales',
                                ],
                            ],
                            'az' => ['sentence' => 'çəkmək bir alma', 'correct' => ['çəkmək', 'bir', 'alma'], 'extra' => ['qram', 'tərəzi']],
                            'ar' => ['sentence' => 'الوزن تفاحة', 'correct' => ['الوزن', 'تفاحة'], 'extra' => ['غرام', 'ميزان']],
                            'ru' => ['sentence' => 'взвесить яблоко', 'correct' => ['взвесить', 'яблоко'], 'extra' => ['грамм', 'весы']],
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
                            'tr' => ['sentence' => 'bir elma tartmak', 'correct' => ['bir', 'elma', 'tartmak'], 'extra' => ['gram', 'terazi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Die',
                            'Waage',
                            'und',
                            'das',
                            'Gramm',
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
                            'az' => ['sentence' => 'tərəzi və qram', 'correct' => ['tərəzi', 'və', 'qram'], 'extra' => ['çəkmək', 'alma']],
                            'ar' => ['sentence' => 'ميزان و غرام', 'correct' => ['ميزان', 'و', 'غرام'], 'extra' => ['الوزن', 'تفاحة']],
                            'ru' => ['sentence' => 'весы и грамм', 'correct' => ['весы', 'и', 'грамм'], 'extra' => ['взвесить', 'яблоко']],
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
                            'tr' => ['sentence' => 'terazi ve gram', 'correct' => ['terazi', 've', 'gram'], 'extra' => ['tartmak', 'elma']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Auf',
                            'der',
                            'Waage',
                            'wiegen',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'çəkmək üzərində tərəzi', 'correct' => ['çəkmək', 'üzərində', 'tərəzi'], 'extra' => ['qram', 'alma']],
                            'ar' => ['sentence' => 'الوزن على ميزان', 'correct' => ['الوزن', 'على', 'ميزان'], 'extra' => ['غرام', 'تفاحة']],
                            'ru' => ['sentence' => 'взвесить на весы', 'correct' => ['взвесить', 'на', 'весы'], 'extra' => ['грамм', 'яблоко']],
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
                            'tr' => ['sentence' => 'terazide tartmak', 'correct' => ['terazide', 'tartmak'], 'extra' => ['gram', 'elma']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Zucker & Schachtel', 3,
                pictures: [
                    [
                        'de' => 'Zucker',
                        'img' => 'sugar',
                    ],
                    [
                        'de' => 'Schachtel',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'de' => 'klein',
                    ],
                    [
                        'de' => 'groß',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Schachtel',
                            'Zucker',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'bir qutu şəkər', 'correct' => ['bir', 'qutu', 'şəkər'], 'extra' => ['kiçik', 'böyük']],
                            'ar' => ['sentence' => 'علبة سكر', 'correct' => ['علبة', 'سكر'], 'extra' => ['صغير', 'كبير']],
                            'ru' => ['sentence' => 'коробка сахар', 'correct' => ['коробка', 'сахар'], 'extra' => ['маленький', 'большой']],
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
                            'tr' => ['sentence' => 'bir kutu şeker', 'correct' => ['bir', 'kutu', 'şeker'], 'extra' => ['küçük', 'büyük']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'kleine',
                            'Schachtel',
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
                            'az' => ['sentence' => 'bir kiçik qutu', 'correct' => ['bir', 'kiçik', 'qutu'], 'extra' => ['böyük', 'şəkər']],
                            'ar' => ['sentence' => 'صغير علبة', 'correct' => ['صغير', 'علبة'], 'extra' => ['كبير', 'سكر']],
                            'ru' => ['sentence' => 'маленький коробка', 'correct' => ['маленький', 'коробка'], 'extra' => ['большой', 'сахар']],
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
                            'tr' => ['sentence' => 'küçük bir kutu', 'correct' => ['küçük', 'bir', 'kutu'], 'extra' => ['büyük', 'şeker']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Eine',
                            'große',
                            'Schachtel',
                            'Zucker',
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
                            'tr' => ['sentence' => 'büyük bir kutu şeker', 'correct' => ['büyük', 'bir', 'kutu', 'şeker'], 'extra' => ['küçük']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Wasser & Flasche', 4,
                pictures: [
                    [
                        'de' => 'Wasser',
                        'img' => 'water',
                    ],
                    [
                        'de' => 'Flasche',
                        'img' => 'bottle',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Liter',
                    ],
                    [
                        'de' => 'zwei',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Zwei',
                            'Liter',
                            'Wasser',
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
                            'tr' => ['sentence' => 'iki litre su', 'correct' => ['iki', 'litre', 'su'], 'extra' => ['şişe']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'Flasche',
                            'Wasser',
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
                            'az' => ['sentence' => 'bir şüşə su', 'correct' => ['bir', 'şüşə', 'su'], 'extra' => ['iki', 'litr']],
                            'ar' => ['sentence' => 'زجاجة ماء', 'correct' => ['زجاجة', 'ماء'], 'extra' => ['اثنان', 'لتر']],
                            'ru' => ['sentence' => 'бутылка вода', 'correct' => ['бутылка', 'вода'], 'extra' => ['два', 'литр']],
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
                            'tr' => ['sentence' => 'bir şişe su', 'correct' => ['bir', 'şişe', 'su'], 'extra' => ['iki', 'litre']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Zwei',
                            'Flaschen',
                            'Wasser',
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
                            'tr' => ['sentence' => 'iki şişe su', 'correct' => ['iki', 'şişe', 'su'], 'extra' => ['litre']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Einkaufswagen & Saft', 5,
                pictures: [
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                    [
                        'de' => 'Saft',
                        'img' => 'juice',
                    ],
                ],
                plain: [
                    [
                        'de' => 'legen',
                    ],
                    [
                        'de' => 'Schachtel',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Schachtel',
                            'in',
                            'den',
                            'Einkaufswagen',
                            'legen',
                        ],
                        'blank' => 5,
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
                            'tr' => ['sentence' => 'arabaya bir kutu koymak', 'correct' => ['arabaya', 'bir', 'kutu', 'koymak'], 'extra' => ['meyve suyu']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'Schachtel',
                            'Saft',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'bir qutu şirə', 'correct' => ['bir', 'qutu', 'şirə'], 'extra' => ['qoymaq', 'araba']],
                            'ar' => ['sentence' => 'علبة عصير', 'correct' => ['علبة', 'عصير'], 'extra' => ['وضع', 'عربة']],
                            'ru' => ['sentence' => 'коробка сок', 'correct' => ['коробка', 'сок'], 'extra' => ['положить', 'тележка']],
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
                            'tr' => ['sentence' => 'bir kutu meyve suyu', 'correct' => ['bir', 'kutu', 'meyve', 'suyu'], 'extra' => ['koymak', 'araba']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Saft',
                            'in',
                            'den',
                            'Einkaufswagen',
                            'legen',
                        ],
                        'blank' => 0,
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
                            'tr' => ['sentence' => 'arabaya meyve suyu koymak', 'correct' => ['arabaya', 'meyve', 'suyu', 'koymak'], 'extra' => ['kutu']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
