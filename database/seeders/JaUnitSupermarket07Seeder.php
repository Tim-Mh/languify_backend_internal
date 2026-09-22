<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket07Seeder extends Seeder
{
    private const PICTURES = [
        'お金' => 'money',
        '売り場' => 'shelf',
        'りんご' => 'apple',
        'バナナ' => 'banana',
        'チーズ' => 'cheese',
        'ご飯' => 'rice',
        '箱' => 'box',
        'カート' => 'cart',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 7, the Japanese twin of the
     * English "Unit 7: Prices and Offers" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'ユニット7: 値段と特売', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: りんご・バナナ', 1,
                pictures: [
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                    [
                        'ja' => 'バナナ',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'ja' => '比べる',
                    ],
                    [
                        'ja' => '値段',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '値段',
                            'を',
                            '比べる',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to compare the prices',
                                'correct' => [
                                    'to compare',
                                    'the',
                                    'prices',
                                ],
                                'extra' => [
                                    'apple',
                                ],
                            ],
                            'az' => ['sentence' => 'müqayisə etmək qiymətlər', 'correct' => ['müqayisə etmək', 'qiymətlər'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'المقارنة أسعار', 'correct' => ['المقارنة', 'أسعار'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'сравнить цены', 'correct' => ['сравнить', 'цены'], 'extra' => ['яблоко']],
                            'es' => [
                                'sentence' => 'Comparar los precios',
                                'correct' => [
                                    'comparar',
                                    'los',
                                    'precio',
                                ],
                                'extra' => [
                                    'manzana',
                                    'plátano',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Preise vergleichen',
                                'correct' => [
                                    'vergleichen',
                                    'die',
                                    'Preis',
                                ],
                                'extra' => [
                                    'Apfel',
                                    'Banane',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Comparer les prix',
                                'correct' => [
                                    'comparer',
                                    'les',
                                    'prix',
                                ],
                                'extra' => [
                                    'pomme',
                                    'banane',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가격을 비교하다',
                                'correct' => [
                                    '가격을',
                                    '비교하다',
                                ],
                                'extra' => [
                                    '사과',
                                ],
                            ],
                            'tr' => ['sentence' => 'fiyatları karşılaştırmak', 'correct' => ['fiyatları', 'karşılaştırmak'], 'extra' => ['elma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'りんご',
                            'の',
                            '値段',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the price of the apple',
                                'correct' => [
                                    'the',
                                    'price',
                                    'of',
                                    'the',
                                    'apple',
                                ],
                                'extra' => [
                                    'to compare',
                                ],
                            ],
                            'az' => ['sentence' => 'qiymət alma', 'correct' => ['qiymət', 'alma'], 'extra' => ['müqayisə etmək']],
                            'ar' => ['sentence' => 'سعر تفاحة', 'correct' => ['سعر', 'تفاحة'], 'extra' => ['المقارنة']],
                            'ru' => ['sentence' => 'цена яблоко', 'correct' => ['цена', 'яблоко'], 'extra' => ['сравнить']],
                            'es' => [
                                'sentence' => 'El precio de la manzana',
                                'correct' => [
                                    'el',
                                    'precio',
                                    'de',
                                    'la',
                                    'manzana',
                                ],
                                'extra' => [
                                    'comparar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Preis des Apfels',
                                'correct' => [
                                    'der',
                                    'Preis',
                                    'von',
                                    'dem',
                                    'Apfel',
                                ],
                                'extra' => [
                                    'vergleichen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le prix de la pomme',
                                'correct' => [
                                    'le',
                                    'prix',
                                    'de',
                                    'la',
                                    'pomme',
                                ],
                                'extra' => [
                                    'comparer',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과의 가격',
                                'correct' => [
                                    '사과의',
                                    '가격',
                                ],
                                'extra' => [
                                    '비교하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'elmanın fiyatı', 'correct' => ['elmanın', 'fiyatı'], 'extra' => ['karşılaştırmak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'りんご',
                            'と',
                            'バナナ',
                            'を',
                            '比べる',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to compare the apple and the banana',
                                'correct' => [
                                    'to compare',
                                    'the',
                                    'apple',
                                    'and',
                                    'the',
                                    'banana',
                                ],
                                'extra' => [
                                    'price',
                                ],
                            ],
                            'az' => ['sentence' => 'müqayisə etmək alma və banan', 'correct' => ['müqayisə etmək', 'alma', 'və', 'banan'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'المقارنة تفاحة و موزة', 'correct' => ['المقارنة', 'تفاحة', 'و', 'موزة'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'сравнить яблоко и банан', 'correct' => ['сравнить', 'яблоко', 'и', 'банан'], 'extra' => ['цена']],
                            'es' => [
                                'sentence' => 'Comparar la manzana y el plátano',
                                'correct' => [
                                    'comparar',
                                    'la',
                                    'manzana',
                                    'y',
                                    'el',
                                    'plátano',
                                ],
                                'extra' => [
                                    'precio',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Den Apfel und die Banane vergleichen',
                                'correct' => [
                                    'den',
                                    'Apfel',
                                    'und',
                                    'die',
                                    'Banane',
                                    'vergleichen',
                                ],
                                'extra' => [
                                    'Preis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Comparer la pomme et la banane',
                                'correct' => [
                                    'comparer',
                                    'la',
                                    'pomme',
                                    'et',
                                    'la',
                                    'banane',
                                ],
                                'extra' => [
                                    'prix',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과와 바나나를 비교하다',
                                'correct' => [
                                    '사과와',
                                    '바나나를',
                                    '비교하다',
                                ],
                                'extra' => [
                                    '가격',
                                ],
                            ],
                            'tr' => ['sentence' => 'elmayı ve muzu karşılaştırmak', 'correct' => ['elmayı', 've', 'muzu', 'karşılaştırmak'], 'extra' => ['fiyat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 売り場・チーズ', 2,
                pictures: [
                    [
                        'ja' => '売り場',
                        'img' => 'shelf',
                    ],
                    [
                        'ja' => 'チーズ',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'ja' => '割引',
                    ],
                    [
                        'ja' => '安い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'チーズ',
                            'の',
                            '割引',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a discount on the cheese',
                                'correct' => [
                                    'a',
                                    'discount',
                                    'on',
                                    'the',
                                    'cheese',
                                ],
                                'extra' => [
                                    'cheap',
                                ],
                            ],
                            'az' => ['sentence' => 'bir endirim üzərində pendir', 'correct' => ['bir', 'endirim', 'üzərində', 'pendir'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'خصم على جبن', 'correct' => ['خصم', 'على', 'جبن'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'скидка на сыр', 'correct' => ['скидка', 'на', 'сыр'], 'extra' => ['дешёвый']],
                            'es' => [
                                'sentence' => 'Un descuento en el queso',
                                'correct' => [
                                    'un',
                                    'descuento',
                                    'sobre',
                                    'el',
                                    'queso',
                                ],
                                'extra' => [
                                    'barato',
                                    'pasillo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Rabatt auf den Käse',
                                'correct' => [
                                    'ein',
                                    'Rabatt',
                                    'auf',
                                    'den',
                                    'Käse',
                                ],
                                'extra' => [
                                    'billig',
                                    'Regal',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une réduction sur le fromage',
                                'correct' => [
                                    'une',
                                    'réduction',
                                    'sur',
                                    'le',
                                    'fromage',
                                ],
                                'extra' => [
                                    'bon marché',
                                    'rayon',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '치즈 할인',
                                'correct' => [
                                    '치즈',
                                    '할인',
                                ],
                                'extra' => [
                                    '싼',
                                ],
                            ],
                            'tr' => ['sentence' => 'peynirde bir indirim', 'correct' => ['peynirde', 'bir', 'indirim'], 'extra' => ['ucuz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '安い',
                            'チーズ',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cheap cheese',
                                'correct' => [
                                    'a',
                                    'cheap',
                                    'cheese',
                                ],
                                'extra' => [
                                    'discount',
                                ],
                            ],
                            'az' => ['sentence' => 'bir ucuz pendir', 'correct' => ['bir', 'ucuz', 'pendir'], 'extra' => ['endirim']],
                            'ar' => ['sentence' => 'رخيص جبن', 'correct' => ['رخيص', 'جبن'], 'extra' => ['خصم']],
                            'ru' => ['sentence' => 'дешёвый сыр', 'correct' => ['дешёвый', 'сыр'], 'extra' => ['скидка']],
                            'es' => [
                                'sentence' => 'Un queso barato',
                                'correct' => [
                                    'un',
                                    'queso',
                                    'barato',
                                ],
                                'extra' => [
                                    'descuento',
                                    'pasillo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein billiger Käse',
                                'correct' => [
                                    'ein',
                                    'billig',
                                    'Käse',
                                ],
                                'extra' => [
                                    'Rabatt',
                                    'Regal',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un fromage bon marché',
                                'correct' => [
                                    'un',
                                    'fromage',
                                    'bon marché',
                                ],
                                'extra' => [
                                    'réduction',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '싼 치즈',
                                'correct' => [
                                    '싼',
                                    '치즈',
                                ],
                                'extra' => [
                                    '할인',
                                ],
                            ],
                            'tr' => ['sentence' => 'ucuz bir peynir', 'correct' => ['ucuz', 'bir', 'peynir'], 'extra' => ['indirim']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '売り場',
                            'の',
                            '割引',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a discount in the aisle',
                                'correct' => [
                                    'a',
                                    'discount',
                                    'in',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'cheap',
                                ],
                            ],
                            'az' => ['sentence' => 'bir endirim içində şöbə', 'correct' => ['bir', 'endirim', 'içində', 'şöbə'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'خصم في قسم', 'correct' => ['خصم', 'في', 'قسم'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'скидка в отдел', 'correct' => ['скидка', 'в', 'отдел'], 'extra' => ['дешёвый']],
                            'es' => [
                                'sentence' => 'Un descuento en el pasillo',
                                'correct' => [
                                    'un',
                                    'descuento',
                                    'en',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'barato',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Rabatt im Regal',
                                'correct' => [
                                    'ein',
                                    'Rabatt',
                                    'in',
                                    'dem',
                                    'Regal',
                                ],
                                'extra' => [
                                    'billig',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une réduction dans le rayon',
                                'correct' => [
                                    'une',
                                    'réduction',
                                    'dans',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'bon marché',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대의 할인',
                                'correct' => [
                                    '진열대의',
                                    '할인',
                                ],
                                'extra' => [
                                    '싼',
                                ],
                            ],
                            'tr' => ['sentence' => 'reyonda bir indirim', 'correct' => ['reyonda', 'bir', 'indirim'], 'extra' => ['ucuz']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: ご飯・りんご', 3,
                pictures: [
                    [
                        'ja' => 'ご飯',
                        'img' => 'rice',
                    ],
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'より少ない',
                    ],
                    [
                        'ja' => 'もっと良い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ご飯',
                            'は',
                            '高くない',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the rice is less expensive',
                                'correct' => [
                                    'the',
                                    'rice',
                                    'is',
                                    'less',
                                    'expensive',
                                ],
                                'extra' => [
                                    'better',
                                ],
                            ],
                            'az' => ['sentence' => 'düyü daha az bahalı', 'correct' => ['düyü', 'daha az', 'bahalı'], 'extra' => ['daha yaxşı']],
                            'ar' => ['sentence' => 'أرز أقل غالي', 'correct' => ['أرز', 'أقل', 'غالي'], 'extra' => ['أحسن']],
                            'ru' => ['sentence' => 'рис меньше дорогой', 'correct' => ['рис', 'меньше', 'дорогой'], 'extra' => ['лучше']],
                            'es' => [
                                'sentence' => 'El arroz es menos caro',
                                'correct' => [
                                    'el',
                                    'arroz',
                                    'es',
                                    'menos',
                                    'caro',
                                ],
                                'extra' => [
                                    'mejor',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Reis ist weniger teuer',
                                'correct' => [
                                    'der',
                                    'Reis',
                                    'ist',
                                    'weniger',
                                    'teuer',
                                ],
                                'extra' => [
                                    'besser',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le riz est moins cher',
                                'correct' => [
                                    'le',
                                    'riz',
                                    'est',
                                    'moins',
                                    'cher',
                                ],
                                'extra' => [
                                    'meilleur',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥은 덜 비쌉니다',
                                'correct' => [
                                    '밥은',
                                    '덜',
                                    '비쌉니다',
                                ],
                                'extra' => [
                                    '더 좋은',
                                ],
                            ],
                            'tr' => ['sentence' => 'pirinç daha ucuz', 'correct' => ['pirinç', 'daha', 'ucuz'], 'extra' => ['daha iyi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'りんご',
                            'の',
                            '方',
                            'が',
                            '良い',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the apple is better',
                                'correct' => [
                                    'the',
                                    'apple',
                                    'is',
                                    'better',
                                ],
                                'extra' => [
                                    'less',
                                ],
                            ],
                            'az' => ['sentence' => 'alma daha yaxşı', 'correct' => ['alma', 'daha yaxşı'], 'extra' => ['daha az']],
                            'ar' => ['sentence' => 'تفاحة أحسن', 'correct' => ['تفاحة', 'أحسن'], 'extra' => ['أقل']],
                            'ru' => ['sentence' => 'яблоко лучше', 'correct' => ['яблоко', 'лучше'], 'extra' => ['меньше']],
                            'es' => [
                                'sentence' => 'La manzana es mejor',
                                'correct' => [
                                    'la',
                                    'manzana',
                                    'es',
                                    'mejor',
                                ],
                                'extra' => [
                                    'menos',
                                    'arroz',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Apfel ist besser',
                                'correct' => [
                                    'der',
                                    'Apfel',
                                    'ist',
                                    'besser',
                                ],
                                'extra' => [
                                    'weniger',
                                    'Reis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La pomme est meilleure',
                                'correct' => [
                                    'la',
                                    'pomme',
                                    'est',
                                    'meilleur',
                                ],
                                'extra' => [
                                    'moins',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과가 더 좋습니다',
                                'correct' => [
                                    '사과가',
                                    '더',
                                    '좋습니다',
                                ],
                                'extra' => [
                                    '덜',
                                ],
                            ],
                            'tr' => ['sentence' => 'elma daha iyi', 'correct' => ['elma', 'daha', 'iyi'], 'extra' => ['daha az']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ご飯',
                            'は',
                            'もっと',
                            '良くて',
                            '高くない',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the rice is better and less expensive',
                                'correct' => [
                                    'the',
                                    'rice',
                                    'is',
                                    'better',
                                    'and',
                                    'less',
                                    'expensive',
                                ],
                                'extra' => [
                                    'apple',
                                ],
                            ],
                            'az' => ['sentence' => 'düyü daha yaxşı və daha az bahalı', 'correct' => ['düyü', 'daha yaxşı', 'və', 'daha az', 'bahalı'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'أرز أحسن و أقل غالي', 'correct' => ['أرز', 'أحسن', 'و', 'أقل', 'غالي'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'рис лучше и меньше дорогой', 'correct' => ['рис', 'лучше', 'и', 'меньше', 'дорогой'], 'extra' => ['яблоко']],
                            'es' => [
                                'sentence' => 'El arroz es mejor y menos caro',
                                'correct' => [
                                    'el',
                                    'arroz',
                                    'es',
                                    'mejor',
                                    'y',
                                    'menos',
                                    'caro',
                                ],
                                'extra' => [
                                    'manzana',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Reis ist besser und weniger teuer',
                                'correct' => [
                                    'der',
                                    'Reis',
                                    'ist',
                                    'besser',
                                    'und',
                                    'weniger',
                                    'teuer',
                                ],
                                'extra' => [
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le riz est meilleur et moins cher',
                                'correct' => [
                                    'le',
                                    'riz',
                                    'est',
                                    'meilleur',
                                    'et',
                                    'moins',
                                    'cher',
                                ],
                                'extra' => [
                                    'pomme',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥은 더 좋고 덜 비쌉니다',
                                'correct' => [
                                    '밥은',
                                    '더',
                                    '좋고',
                                    '덜',
                                    '비쌉니다',
                                ],
                                'extra' => [
                                    '사과',
                                ],
                            ],
                            'tr' => ['sentence' => 'pirinç daha iyi ve daha ucuz', 'correct' => ['pirinç', 'daha', 'iyi', 've', 'daha', 'ucuz'], 'extra' => ['elma']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: お金・箱', 4,
                pictures: [
                    [
                        'ja' => 'お金',
                        'img' => 'money',
                    ],
                    [
                        'ja' => '箱',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'ja' => '払う',
                    ],
                    [
                        'ja' => '十分に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私の',
                            'お金',
                            'で',
                            '払う',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay with my money',
                                'correct' => [
                                    'to pay',
                                    'with',
                                    'my',
                                    'money',
                                ],
                                'extra' => [
                                    'enough',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək ilə mənim pul', 'correct' => ['ödəmək', 'ilə', 'mənim', 'pul'], 'extra' => ['kifayət']],
                            'ar' => ['sentence' => 'الدفع مع نقود', 'correct' => ['الدفع', 'مع', 'نقود'], 'extra' => ['كفى']],
                            'ru' => ['sentence' => 'платить с мой деньги', 'correct' => ['платить', 'с', 'мой', 'деньги'], 'extra' => ['достаточно']],
                            'es' => [
                                'sentence' => 'Pagar con mi dinero',
                                'correct' => [
                                    'pagar',
                                    'con',
                                    'mi',
                                    'dinero',
                                ],
                                'extra' => [
                                    'bastante',
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mit meinem Geld bezahlen',
                                'correct' => [
                                    'bezahlen',
                                    'mit',
                                    'mein',
                                    'Geld',
                                ],
                                'extra' => [
                                    'genug',
                                    'Schachtel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer avec mon argent',
                                'correct' => [
                                    'payer',
                                    'avec',
                                    'mon',
                                    'argent',
                                ],
                                'extra' => [
                                    'assez',
                                    'boîte',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 돈으로 지불하다',
                                'correct' => [
                                    '제',
                                    '돈으로',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '충분히',
                                ],
                            ],
                            'tr' => ['sentence' => 'paramla ödemek', 'correct' => ['paramla', 'ödemek'], 'extra' => ['yeterli']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '十分な',
                            'お金',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'enough money',
                                'correct' => [
                                    'enough',
                                    'money',
                                ],
                                'extra' => [
                                    'pay',
                                ],
                            ],
                            'az' => ['sentence' => 'kifayət pul', 'correct' => ['kifayət', 'pul'], 'extra' => ['ödə']],
                            'ar' => ['sentence' => 'كفى نقود', 'correct' => ['كفى', 'نقود'], 'extra' => ['ادفع']],
                            'ru' => ['sentence' => 'достаточно деньги', 'correct' => ['достаточно', 'деньги'], 'extra' => ['плати']],
                            'es' => [
                                'sentence' => 'Bastante dinero',
                                'correct' => [
                                    'bastante',
                                    'dinero',
                                ],
                                'extra' => [
                                    'pagar',
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Genug Geld',
                                'correct' => [
                                    'genug',
                                    'Geld',
                                ],
                                'extra' => [
                                    'bezahlen',
                                    'Schachtel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Assez d\'argent',
                                'correct' => [
                                    'assez',
                                    'argent',
                                ],
                                'extra' => [
                                    'payer',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '충분한 돈',
                                'correct' => [
                                    '충분한',
                                    '돈',
                                ],
                                'extra' => [
                                    '지불하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'yeterli para', 'correct' => ['yeterli', 'para'], 'extra' => ['öde']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'お金',
                            'で',
                            '箱',
                            'を',
                            '払う',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay the box with money',
                                'correct' => [
                                    'to pay',
                                    'the',
                                    'box',
                                    'with',
                                    'money',
                                ],
                                'extra' => [
                                    'enough',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək qutu ilə pul', 'correct' => ['ödəmək', 'qutu', 'ilə', 'pul'], 'extra' => ['kifayət']],
                            'ar' => ['sentence' => 'الدفع علبة مع نقود', 'correct' => ['الدفع', 'علبة', 'مع', 'نقود'], 'extra' => ['كفى']],
                            'ru' => ['sentence' => 'платить коробка с деньги', 'correct' => ['платить', 'коробка', 'с', 'деньги'], 'extra' => ['достаточно']],
                            'es' => [
                                'sentence' => 'Pagar la caja con dinero',
                                'correct' => [
                                    'pagar',
                                    'la',
                                    'caja',
                                    'con',
                                    'dinero',
                                ],
                                'extra' => [
                                    'bastante',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Schachtel mit Geld bezahlen',
                                'correct' => [
                                    'die',
                                    'Schachtel',
                                    'mit',
                                    'Geld',
                                    'bezahlen',
                                ],
                                'extra' => [
                                    'genug',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer la boîte avec de l\'argent',
                                'correct' => [
                                    'payer',
                                    'la',
                                    'boîte',
                                    'avec',
                                    'argent',
                                ],
                                'extra' => [
                                    'assez',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '돈으로 상자를 지불하다',
                                'correct' => [
                                    '돈으로',
                                    '상자를',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '충분히',
                                ],
                            ],
                            'tr' => ['sentence' => 'kutuyu parayla ödemek', 'correct' => ['kutuyu', 'parayla', 'ödemek'], 'extra' => ['yeterli']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: カート・バナナ', 5,
                pictures: [
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                    [
                        'ja' => 'バナナ',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'ja' => '良い',
                    ],
                    [
                        'ja' => 'いくつ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '良い',
                            '値段',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a good price',
                                'correct' => [
                                    'a',
                                    'good',
                                    'price',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'az' => ['sentence' => 'bir yaxşı qiymət', 'correct' => ['bir', 'yaxşı', 'qiymət'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'جيد سعر', 'correct' => ['جيد', 'سعر'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'хороший цена', 'correct' => ['хороший', 'цена'], 'extra' => ['сколько']],
                            'es' => [
                                'sentence' => 'Un buen precio',
                                'correct' => [
                                    'un',
                                    'bueno',
                                    'precio',
                                ],
                                'extra' => [
                                    'cuántos',
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein guter Preis',
                                'correct' => [
                                    'ein',
                                    'gut',
                                    'Preis',
                                ],
                                'extra' => [
                                    'wie viele',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un bon prix',
                                'correct' => [
                                    'un',
                                    'bon',
                                    'prix',
                                ],
                                'extra' => [
                                    'combien',
                                    'chariot',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '좋은 가격',
                                'correct' => [
                                    '좋은',
                                    '가격',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                            'tr' => ['sentence' => 'iyi bir fiyat', 'correct' => ['iyi', 'bir', 'fiyat'], 'extra' => ['kaç']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'バナナ',
                            'は',
                            'いくら',
                            'です',
                            'か',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how much for the banana',
                                'correct' => [
                                    'how many',
                                    'for',
                                    'the',
                                    'banana',
                                ],
                                'extra' => [
                                    'good',
                                ],
                            ],
                            'az' => ['sentence' => 'neçə üçün banan', 'correct' => ['neçə', 'üçün', 'banan'], 'extra' => ['yaxşı']],
                            'ar' => ['sentence' => 'كم لأجل موزة', 'correct' => ['كم', 'لأجل', 'موزة'], 'extra' => ['جيد']],
                            'ru' => ['sentence' => 'сколько для банан', 'correct' => ['сколько', 'для', 'банан'], 'extra' => ['хороший']],
                            'es' => [
                                'sentence' => 'Cuánto por el plátano',
                                'correct' => [
                                    'cuántos',
                                    'para',
                                    'el',
                                    'plátano',
                                ],
                                'extra' => [
                                    'bueno',
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wie viel für die Banane',
                                'correct' => [
                                    'wie viele',
                                    'für',
                                    'die',
                                    'Banane',
                                ],
                                'extra' => [
                                    'gut',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Combien pour la banane',
                                'correct' => [
                                    'combien',
                                    'pour',
                                    'la',
                                    'banane',
                                ],
                                'extra' => [
                                    'bon',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바나나는 몇 개',
                                'correct' => [
                                    '바나나는',
                                    '몇',
                                    '개',
                                ],
                                'extra' => [
                                    '좋은',
                                ],
                            ],
                            'tr' => ['sentence' => 'muz kaç lira', 'correct' => ['muz', 'kaç', 'lira'], 'extra' => ['iyi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'カート',
                            'の',
                            'ため',
                            'の',
                            '良い',
                            '値段',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a good price for the trolley',
                                'correct' => [
                                    'a',
                                    'good',
                                    'price',
                                    'for',
                                    'the',
                                    'trolley',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'az' => ['sentence' => 'bir yaxşı qiymət üçün araba', 'correct' => ['bir', 'yaxşı', 'qiymət', 'üçün', 'araba'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'جيد سعر لأجل عربة', 'correct' => ['جيد', 'سعر', 'لأجل', 'عربة'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'хороший цена для тележка', 'correct' => ['хороший', 'цена', 'для', 'тележка'], 'extra' => ['сколько']],
                            'es' => [
                                'sentence' => 'Un buen precio por el carrito',
                                'correct' => [
                                    'un',
                                    'bueno',
                                    'precio',
                                    'para',
                                    'el',
                                    'carrito',
                                ],
                                'extra' => [
                                    'cuántos',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein guter Preis für den Einkaufswagen',
                                'correct' => [
                                    'ein',
                                    'gut',
                                    'Preis',
                                    'für',
                                    'den',
                                    'Einkaufswagen',
                                ],
                                'extra' => [
                                    'wie viele',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un bon prix pour le chariot',
                                'correct' => [
                                    'un',
                                    'bon',
                                    'prix',
                                    'pour',
                                    'le',
                                    'chariot',
                                ],
                                'extra' => [
                                    'combien',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트를 위한 좋은 가격',
                                'correct' => [
                                    '카트를',
                                    '위한',
                                    '좋은',
                                    '가격',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                            'tr' => ['sentence' => 'araba için iyi bir fiyat', 'correct' => ['araba', 'için', 'iyi', 'bir', 'fiyat'], 'extra' => ['kaç']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
