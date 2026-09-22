<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket07Seeder extends Seeder
{
    private const PICTURES = [
        'Geld' => 'money',
        'Regal' => 'shelf',
        'Apfel' => 'apple',
        'Banane' => 'banana',
        'Käse' => 'cheese',
        'Reis' => 'rice',
        'Schachtel' => 'box',
        'Einkaufswagen' => 'cart',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 7, the German twin of the
     * English "Unit 7: Prices and Offers" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Einheit 7: Preise & Angebote', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Apfel & Banane', 1,
                pictures: [
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                    [
                        'de' => 'Banane',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'de' => 'vergleichen',
                    ],
                    [
                        'de' => 'Preis',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Preise',
                            'vergleichen',
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
                                    'banana',
                                ],
                            ],
                            'az' => ['sentence' => 'müqayisə etmək qiymətlər', 'correct' => ['müqayisə etmək', 'qiymətlər'], 'extra' => ['alma', 'banan']],
                            'ar' => ['sentence' => 'المقارنة أسعار', 'correct' => ['المقارنة', 'أسعار'], 'extra' => ['تفاحة', 'موزة']],
                            'ru' => ['sentence' => 'сравнить цены', 'correct' => ['сравнить', 'цены'], 'extra' => ['яблоко', 'банан']],
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
                            'ja' => [
                                'sentence' => '値段を比べる',
                                'correct' => [
                                    '値段',
                                    'を',
                                    '比べる',
                                ],
                                'extra' => [
                                    'りんご',
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
                            'tr' => ['sentence' => 'fiyatları karşılaştırmak', 'correct' => ['fiyatları', 'karşılaştırmak'], 'extra' => ['elma', 'muz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Preis',
                            'des',
                            'Apfels',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => 'りんごの値段',
                                'correct' => [
                                    'りんご',
                                    'の',
                                    '値段',
                                ],
                                'extra' => [
                                    '比べる',
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
                            'Den',
                            'Apfel',
                            'und',
                            'die',
                            'Banane',
                            'vergleichen',
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
                            'ja' => [
                                'sentence' => 'りんごとバナナを比べる',
                                'correct' => [
                                    'りんご',
                                    'と',
                                    'バナナ',
                                    'を',
                                    '比べる',
                                ],
                                'extra' => [
                                    '値段',
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
            $builder->lesson('Lektion 2: Regal & Käse', 2,
                pictures: [
                    [
                        'de' => 'Regal',
                        'img' => 'shelf',
                    ],
                    [
                        'de' => 'Käse',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Rabatt',
                    ],
                    [
                        'de' => 'billig',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Rabatt',
                            'auf',
                            'den',
                            'Käse',
                        ],
                        'blank' => 1,
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
                                    'aisle',
                                ],
                            ],
                            'az' => ['sentence' => 'bir endirim üzərində pendir', 'correct' => ['bir', 'endirim', 'üzərində', 'pendir'], 'extra' => ['ucuz', 'şöbə']],
                            'ar' => ['sentence' => 'خصم على جبن', 'correct' => ['خصم', 'على', 'جبن'], 'extra' => ['رخيص', 'قسم']],
                            'ru' => ['sentence' => 'скидка на сыр', 'correct' => ['скидка', 'на', 'сыр'], 'extra' => ['дешёвый', 'отдел']],
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
                            'ja' => [
                                'sentence' => 'チーズの割引',
                                'correct' => [
                                    'チーズ',
                                    'の',
                                    '割引',
                                ],
                                'extra' => [
                                    '安い',
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
                            'tr' => ['sentence' => 'peynirde bir indirim', 'correct' => ['peynirde', 'bir', 'indirim'], 'extra' => ['ucuz', 'reyon']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'billiger',
                            'Käse',
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
                                    'aisle',
                                ],
                            ],
                            'az' => ['sentence' => 'bir ucuz pendir', 'correct' => ['bir', 'ucuz', 'pendir'], 'extra' => ['endirim', 'şöbə']],
                            'ar' => ['sentence' => 'رخيص جبن', 'correct' => ['رخيص', 'جبن'], 'extra' => ['خصم', 'قسم']],
                            'ru' => ['sentence' => 'дешёвый сыр', 'correct' => ['дешёвый', 'сыр'], 'extra' => ['скидка', 'отдел']],
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
                            'ja' => [
                                'sentence' => '安いチーズ',
                                'correct' => [
                                    '安い',
                                    'チーズ',
                                ],
                                'extra' => [
                                    '割引',
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
                            'tr' => ['sentence' => 'ucuz bir peynir', 'correct' => ['ucuz', 'bir', 'peynir'], 'extra' => ['indirim', 'reyon']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Rabatt',
                            'im',
                            'Regal',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => '売り場の割引',
                                'correct' => [
                                    '売り場',
                                    'の',
                                    '割引',
                                ],
                                'extra' => [
                                    '安い',
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
            $builder->lesson('Lektion 3: Reis & Apfel', 3,
                pictures: [
                    [
                        'de' => 'Reis',
                        'img' => 'rice',
                    ],
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'de' => 'weniger',
                    ],
                    [
                        'de' => 'besser',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Reis',
                            'ist',
                            'weniger',
                            'teuer',
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
                            'ja' => [
                                'sentence' => 'ご飯は高くないです',
                                'correct' => [
                                    'ご飯',
                                    'は',
                                    '高くない',
                                    'です',
                                ],
                                'extra' => [
                                    'もっと良い',
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
                            'Der',
                            'Apfel',
                            'ist',
                            'besser',
                        ],
                        'blank' => 3,
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
                                    'rice',
                                ],
                            ],
                            'az' => ['sentence' => 'alma daha yaxşı', 'correct' => ['alma', 'daha yaxşı'], 'extra' => ['daha az', 'düyü']],
                            'ar' => ['sentence' => 'تفاحة أحسن', 'correct' => ['تفاحة', 'أحسن'], 'extra' => ['أقل', 'أرز']],
                            'ru' => ['sentence' => 'яблоко лучше', 'correct' => ['яблоко', 'лучше'], 'extra' => ['меньше', 'рис']],
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
                            'ja' => [
                                'sentence' => 'りんごの方が良いです',
                                'correct' => [
                                    'りんご',
                                    'の',
                                    '方',
                                    'が',
                                    '良い',
                                    'です',
                                ],
                                'extra' => [
                                    'より少ない',
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
                            'tr' => ['sentence' => 'elma daha iyi', 'correct' => ['elma', 'daha', 'iyi'], 'extra' => ['daha az', 'pirinç']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'Reis',
                            'ist',
                            'besser',
                            'und',
                            'weniger',
                            'teuer',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => 'ご飯はもっと良くて高くない',
                                'correct' => [
                                    'ご飯',
                                    'は',
                                    'もっと',
                                    '良くて',
                                    '高くない',
                                ],
                                'extra' => [
                                    'りんご',
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
            $builder->lesson('Lektion 4: Geld & Schachtel', 4,
                pictures: [
                    [
                        'de' => 'Geld',
                        'img' => 'money',
                    ],
                    [
                        'de' => 'Schachtel',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bezahlen',
                    ],
                    [
                        'de' => 'genug',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mit',
                            'meinem',
                            'Geld',
                            'bezahlen',
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
                                    'box',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək ilə mənim pul', 'correct' => ['ödəmək', 'ilə', 'mənim', 'pul'], 'extra' => ['kifayət', 'qutu']],
                            'ar' => ['sentence' => 'الدفع مع نقود', 'correct' => ['الدفع', 'مع', 'نقود'], 'extra' => ['كفى', 'علبة']],
                            'ru' => ['sentence' => 'платить с мой деньги', 'correct' => ['платить', 'с', 'мой', 'деньги'], 'extra' => ['достаточно', 'коробка']],
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
                            'ja' => [
                                'sentence' => '私のお金で払う',
                                'correct' => [
                                    '私の',
                                    'お金',
                                    'で',
                                    '払う',
                                ],
                                'extra' => [
                                    '十分に',
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
                            'tr' => ['sentence' => 'paramla ödemek', 'correct' => ['paramla', 'ödemek'], 'extra' => ['yeterli', 'kutu']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Genug',
                            'Geld',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'enough money',
                                'correct' => [
                                    'enough',
                                    'money',
                                ],
                                'extra' => [
                                    'pay',
                                    'box',
                                ],
                            ],
                            'az' => ['sentence' => 'kifayət pul', 'correct' => ['kifayət', 'pul'], 'extra' => ['ödə', 'qutu']],
                            'ar' => ['sentence' => 'كفى نقود', 'correct' => ['كفى', 'نقود'], 'extra' => ['ادفع', 'علبة']],
                            'ru' => ['sentence' => 'достаточно деньги', 'correct' => ['достаточно', 'деньги'], 'extra' => ['плати', 'коробка']],
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
                            'ja' => [
                                'sentence' => '十分なお金',
                                'correct' => [
                                    '十分な',
                                    'お金',
                                ],
                                'extra' => [
                                    '払う',
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
                            'tr' => ['sentence' => 'yeterli para', 'correct' => ['yeterli', 'para'], 'extra' => ['öde', 'kutu']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Schachtel',
                            'mit',
                            'Geld',
                            'bezahlen',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => 'お金で箱を払う',
                                'correct' => [
                                    'お金',
                                    'で',
                                    '箱',
                                    'を',
                                    '払う',
                                ],
                                'extra' => [
                                    '十分に',
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
            $builder->lesson('Lektion 5: Einkaufswagen & Banane', 5,
                pictures: [
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                    [
                        'de' => 'Banane',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'de' => 'gut',
                    ],
                    [
                        'de' => 'wie viele',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'guter',
                            'Preis',
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
                                    'trolley',
                                ],
                            ],
                            'az' => ['sentence' => 'bir yaxşı qiymət', 'correct' => ['bir', 'yaxşı', 'qiymət'], 'extra' => ['neçə', 'araba']],
                            'ar' => ['sentence' => 'جيد سعر', 'correct' => ['جيد', 'سعر'], 'extra' => ['كم', 'عربة']],
                            'ru' => ['sentence' => 'хороший цена', 'correct' => ['хороший', 'цена'], 'extra' => ['сколько', 'тележка']],
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
                            'ja' => [
                                'sentence' => '良い値段',
                                'correct' => [
                                    '良い',
                                    '値段',
                                ],
                                'extra' => [
                                    'いくつ',
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
                            'tr' => ['sentence' => 'iyi bir fiyat', 'correct' => ['iyi', 'bir', 'fiyat'], 'extra' => ['kaç', 'araba']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Wie',
                            'viel',
                            'für',
                            'die',
                            'Banane',
                        ],
                        'blank' => 4,
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
                                    'well',
                                    'trolley',
                                ],
                            ],
                            'az' => ['sentence' => 'neçə üçün banan', 'correct' => ['neçə', 'üçün', 'banan'], 'extra' => ['yaxşıyam', 'araba']],
                            'ar' => ['sentence' => 'كم لأجل موزة', 'correct' => ['كم', 'لأجل', 'موزة'], 'extra' => ['بخير', 'عربة']],
                            'ru' => ['sentence' => 'сколько для банан', 'correct' => ['сколько', 'для', 'банан'], 'extra' => ['хорошо', 'тележка']],
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
                            'ja' => [
                                'sentence' => 'バナナはいくつ',
                                'correct' => [
                                    'バナナ',
                                    'は',
                                    'いくつ',
                                ],
                                'extra' => [
                                    '良い',
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
                            'tr' => ['sentence' => 'muz kaç lira', 'correct' => ['muz', 'kaç', 'lira'], 'extra' => ['iyi', 'araba']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'guter',
                            'Preis',
                            'für',
                            'den',
                            'Einkaufswagen',
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
                            'ja' => [
                                'sentence' => 'カートのための良い値段',
                                'correct' => [
                                    'カート',
                                    'の',
                                    'ため',
                                    'の',
                                    '良い',
                                    '値段',
                                ],
                                'extra' => [
                                    'いくつ',
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
