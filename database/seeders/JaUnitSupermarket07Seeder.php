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
                        ],
                    ],
                ],
            ),
        ];
    }
}
