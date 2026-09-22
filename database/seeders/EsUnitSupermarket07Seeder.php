<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket07Seeder extends Seeder
{
    private const PICTURES = [
        'dinero' => 'money',
        'pasillo' => 'shelf',
        'manzana' => 'apple',
        'plátano' => 'banana',
        'queso' => 'cheese',
        'arroz' => 'rice',
        'caja' => 'box',
        'carrito' => 'cart',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 7, the Spanish twin of the
     * English "Unit 7: Prices and Offers" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unidad 7: Precios y ofertas', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Manzana y Plátano', 1,
                pictures: [
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                    [
                        'es' => 'plátano',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'es' => 'comparar',
                    ],
                    [
                        'es' => 'precio',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Comparar',
                            'los',
                            'precios',
                        ],
                        'blank' => 0,
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
                            'El',
                            'precio',
                            'de',
                            'la',
                            'manzana',
                        ],
                        'blank' => 4,
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
                            'Comparar',
                            'la',
                            'manzana',
                            'y',
                            'el',
                            'plátano',
                        ],
                        'blank' => 5,
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
            $builder->lesson('Lección 2: Pasillo y Queso', 2,
                pictures: [
                    [
                        'es' => 'pasillo',
                        'img' => 'shelf',
                    ],
                    [
                        'es' => 'queso',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'es' => 'descuento',
                    ],
                    [
                        'es' => 'barato',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'descuento',
                            'en',
                            'el',
                            'queso',
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
                            'Un',
                            'queso',
                            'barato',
                        ],
                        'blank' => 2,
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
                            'Un',
                            'descuento',
                            'en',
                            'el',
                            'pasillo',
                        ],
                        'blank' => 4,
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
            $builder->lesson('Lección 3: Arroz y Manzana', 3,
                pictures: [
                    [
                        'es' => 'arroz',
                        'img' => 'rice',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'menos',
                    ],
                    [
                        'es' => 'mejor',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'arroz',
                            'es',
                            'menos',
                            'caro',
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
                            'La',
                            'manzana',
                            'es',
                            'mejor',
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
                            'El',
                            'arroz',
                            'es',
                            'mejor',
                            'y',
                            'menos',
                            'caro',
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
            $builder->lesson('Lección 4: Dinero y Caja', 4,
                pictures: [
                    [
                        'es' => 'dinero',
                        'img' => 'money',
                    ],
                    [
                        'es' => 'caja',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pagar',
                    ],
                    [
                        'es' => 'bastante',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Pagar',
                            'con',
                            'mi',
                            'dinero',
                        ],
                        'blank' => 0,
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
                                    'checkout',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək ilə mənim pul', 'correct' => ['ödəmək', 'ilə', 'mənim', 'pul'], 'extra' => ['kifayət', 'kassa']],
                            'ar' => ['sentence' => 'الدفع مع نقود', 'correct' => ['الدفع', 'مع', 'نقود'], 'extra' => ['كفى', 'صندوق الدفع']],
                            'ru' => ['sentence' => 'платить с мой деньги', 'correct' => ['платить', 'с', 'мой', 'деньги'], 'extra' => ['достаточно', 'касса']],
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
                            'tr' => ['sentence' => 'paramla ödemek', 'correct' => ['paramla', 'ödemek'], 'extra' => ['yeterli', 'kasa']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Bastante',
                            'dinero',
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
                                    'checkout',
                                ],
                            ],
                            'az' => ['sentence' => 'kifayət pul', 'correct' => ['kifayət', 'pul'], 'extra' => ['ödə', 'kassa']],
                            'ar' => ['sentence' => 'كفى نقود', 'correct' => ['كفى', 'نقود'], 'extra' => ['ادفع', 'صندوق الدفع']],
                            'ru' => ['sentence' => 'достаточно деньги', 'correct' => ['достаточно', 'деньги'], 'extra' => ['плати', 'касса']],
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
                            'tr' => ['sentence' => 'yeterli para', 'correct' => ['yeterli', 'para'], 'extra' => ['öde', 'kasa']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Pagar',
                            'la',
                            'caja',
                            'con',
                            'dinero',
                        ],
                        'blank' => 2,
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
            $builder->lesson('Lección 5: Carrito y Plátano', 5,
                pictures: [
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                    [
                        'es' => 'plátano',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'es' => 'bueno',
                    ],
                    [
                        'es' => 'cuántos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'buen',
                            'precio',
                        ],
                        'blank' => 2,
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
                            'Cuánto',
                            'por',
                            'el',
                            'plátano',
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
                                    'trolley',
                                ],
                            ],
                            'az' => ['sentence' => 'neçə üçün banan', 'correct' => ['neçə', 'üçün', 'banan'], 'extra' => ['yaxşı', 'araba']],
                            'ar' => ['sentence' => 'كم لأجل موزة', 'correct' => ['كم', 'لأجل', 'موزة'], 'extra' => ['جيد', 'عربة']],
                            'ru' => ['sentence' => 'сколько для банан', 'correct' => ['сколько', 'для', 'банан'], 'extra' => ['хороший', 'тележка']],
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
                            'Un',
                            'buen',
                            'precio',
                            'por',
                            'el',
                            'carrito',
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
