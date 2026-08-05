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
                        ],
                    ],
                ],
            ),
        ];
    }
}
