<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket05Seeder extends Seeder
{
    private const PICTURES = [
        'carne' => 'meat',
        'pollo' => 'chicken',
        'pescado' => 'fish',
        'arroz' => 'rice',
        'cesta' => 'basket',
        'caja' => 'box',
        'queso' => 'cheese',
        'pan' => 'bread',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 5, the Spanish twin of the
     * English "Unit 5: Meat and Fish" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unidad 5: Carne y pescado', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Carne y Pollo', 1,
                pictures: [
                    [
                        'es' => 'carne',
                        'img' => 'meat',
                    ],
                    [
                        'es' => 'pollo',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'es' => 'caro',
                    ],
                    [
                        'es' => 'barato',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pollo',
                            'es',
                            'caro',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chicken is expensive',
                                'correct' => [
                                    'the',
                                    'chicken',
                                    'is',
                                    'expensive',
                                ],
                                'extra' => [
                                    'cheap',
                                    'meat',
                                ],
                            ],
                            'az' => ['sentence' => 'toyuq bahalı', 'correct' => ['toyuq', 'bahalı'], 'extra' => ['ucuz', 'ət']],
                            'ar' => ['sentence' => 'دجاج غالي', 'correct' => ['دجاج', 'غالي'], 'extra' => ['رخيص', 'لحم']],
                            'ru' => ['sentence' => 'курица дорогой', 'correct' => ['курица', 'дорогой'], 'extra' => ['дешёвый', 'мясо']],
                            'de' => [
                                'sentence' => 'Das Hähnchen ist teuer',
                                'correct' => [
                                    'das',
                                    'Hähnchen',
                                    'ist',
                                    'teuer',
                                ],
                                'extra' => [
                                    'billig',
                                    'Fleisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poulet est cher',
                                'correct' => [
                                    'le',
                                    'poulet',
                                    'est',
                                    'cher',
                                ],
                                'extra' => [
                                    'bon marché',
                                    'viande',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '鶏肉は高いです',
                                'correct' => [
                                    '鶏肉',
                                    'は',
                                    '高い',
                                    'です',
                                ],
                                'extra' => [
                                    '安い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기는 비쌉니다',
                                'correct' => [
                                    '닭고기는',
                                    '비쌉니다',
                                ],
                                'extra' => [
                                    '싼',
                                ],
                            ],
                            'tr' => ['sentence' => 'tavuk pahalı', 'correct' => ['tavuk', 'pahalı'], 'extra' => ['ucuz', 'et']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'pollo',
                            'barato',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cheap chicken',
                                'correct' => [
                                    'a',
                                    'cheap',
                                    'chicken',
                                ],
                                'extra' => [
                                    'expensive',
                                    'meat',
                                ],
                            ],
                            'az' => ['sentence' => 'bir ucuz toyuq', 'correct' => ['bir', 'ucuz', 'toyuq'], 'extra' => ['bahalı', 'ət']],
                            'ar' => ['sentence' => 'رخيص دجاج', 'correct' => ['رخيص', 'دجاج'], 'extra' => ['غالي', 'لحم']],
                            'ru' => ['sentence' => 'дешёвый курица', 'correct' => ['дешёвый', 'курица'], 'extra' => ['дорогой', 'мясо']],
                            'de' => [
                                'sentence' => 'Ein billiges Hähnchen',
                                'correct' => [
                                    'ein',
                                    'billig',
                                    'Hähnchen',
                                ],
                                'extra' => [
                                    'teuer',
                                    'Fleisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un poulet bon marché',
                                'correct' => [
                                    'un',
                                    'poulet',
                                    'bon marché',
                                ],
                                'extra' => [
                                    'cher',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '安い鶏肉',
                                'correct' => [
                                    '安い',
                                    '鶏肉',
                                ],
                                'extra' => [
                                    '高い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '싼 닭고기',
                                'correct' => [
                                    '싼',
                                    '닭고기',
                                ],
                                'extra' => [
                                    '비싼',
                                ],
                            ],
                            'tr' => ['sentence' => 'ucuz bir tavuk', 'correct' => ['ucuz', 'bir', 'tavuk'], 'extra' => ['pahalı', 'et']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'La',
                            'carne',
                            'es',
                            'barata',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the meat is cheap',
                                'correct' => [
                                    'the',
                                    'meat',
                                    'is',
                                    'cheap',
                                ],
                                'extra' => [
                                    'expensive',
                                    'chicken',
                                ],
                            ],
                            'az' => ['sentence' => 'ət ucuz', 'correct' => ['ət', 'ucuz'], 'extra' => ['bahalı', 'toyuq']],
                            'ar' => ['sentence' => 'لحم رخيص', 'correct' => ['لحم', 'رخيص'], 'extra' => ['غالي', 'دجاج']],
                            'ru' => ['sentence' => 'мясо дешёвый', 'correct' => ['мясо', 'дешёвый'], 'extra' => ['дорогой', 'курица']],
                            'de' => [
                                'sentence' => 'Das Fleisch ist billig',
                                'correct' => [
                                    'das',
                                    'Fleisch',
                                    'ist',
                                    'billig',
                                ],
                                'extra' => [
                                    'teuer',
                                    'Hähnchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La viande est bon marché',
                                'correct' => [
                                    'la',
                                    'viande',
                                    'est',
                                    'bon marché',
                                ],
                                'extra' => [
                                    'cher',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '肉は安いです',
                                'correct' => [
                                    '肉',
                                    'は',
                                    '安い',
                                    'です',
                                ],
                                'extra' => [
                                    '高い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고기는 쌉니다',
                                'correct' => [
                                    '고기는',
                                    '쌉니다',
                                ],
                                'extra' => [
                                    '비싼',
                                ],
                            ],
                            'tr' => ['sentence' => 'et ucuz', 'correct' => ['et', 'ucuz'], 'extra' => ['pahalı', 'tavuk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Pescado y Carne', 2,
                pictures: [
                    [
                        'es' => 'pescado',
                        'img' => 'fish',
                    ],
                    [
                        'es' => 'carne',
                        'img' => 'meat',
                    ],
                ],
                plain: [
                    [
                        'es' => 'menos',
                    ],
                    [
                        'es' => 'más',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Menos',
                            'carne',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'less meat',
                                'correct' => [
                                    'less',
                                    'meat',
                                ],
                                'extra' => [
                                    'more',
                                    'fish',
                                ],
                            ],
                            'az' => ['sentence' => 'daha az ət', 'correct' => ['daha az', 'ət'], 'extra' => ['daha', 'balıq']],
                            'ar' => ['sentence' => 'أقل لحم', 'correct' => ['أقل', 'لحم'], 'extra' => ['أكثر', 'سمك']],
                            'ru' => ['sentence' => 'меньше мясо', 'correct' => ['меньше', 'мясо'], 'extra' => ['больше', 'рыба']],
                            'de' => [
                                'sentence' => 'Weniger Fleisch',
                                'correct' => [
                                    'weniger',
                                    'Fleisch',
                                ],
                                'extra' => [
                                    'mehr',
                                    'Fisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Moins de viande',
                                'correct' => [
                                    'moins',
                                    'viande',
                                ],
                                'extra' => [
                                    'plus',
                                    'poisson',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '肉を少なく',
                                'correct' => [
                                    '肉',
                                    'を',
                                    '少なく',
                                ],
                                'extra' => [
                                    'もっと',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고기 적게',
                                'correct' => [
                                    '고기',
                                    '적게',
                                ],
                                'extra' => [
                                    '더',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha az et', 'correct' => ['daha', 'az', 'et'], 'extra' => ['daha çok', 'balık']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Más',
                            'pescado',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'more fish',
                                'correct' => [
                                    'more',
                                    'fish',
                                ],
                                'extra' => [
                                    'less',
                                    'meat',
                                ],
                            ],
                            'az' => ['sentence' => 'daha balıq', 'correct' => ['daha', 'balıq'], 'extra' => ['daha az', 'ət']],
                            'ar' => ['sentence' => 'أكثر سمك', 'correct' => ['أكثر', 'سمك'], 'extra' => ['أقل', 'لحم']],
                            'ru' => ['sentence' => 'больше рыба', 'correct' => ['больше', 'рыба'], 'extra' => ['меньше', 'мясо']],
                            'de' => [
                                'sentence' => 'Mehr Fisch',
                                'correct' => [
                                    'mehr',
                                    'Fisch',
                                ],
                                'extra' => [
                                    'weniger',
                                    'Fleisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Plus de poisson',
                                'correct' => [
                                    'plus',
                                    'poisson',
                                ],
                                'extra' => [
                                    'moins',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '魚をもっと',
                                'correct' => [
                                    '魚',
                                    'を',
                                    'もっと',
                                ],
                                'extra' => [
                                    'より少ない',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '생선 더',
                                'correct' => [
                                    '생선',
                                    '더',
                                ],
                                'extra' => [
                                    '덜',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha çok balık', 'correct' => ['daha', 'çok', 'balık'], 'extra' => ['daha az', 'et']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Menos',
                            'carne',
                            'y',
                            'más',
                            'pescado',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'less meat and more fish',
                                'correct' => [
                                    'less',
                                    'meat',
                                    'and',
                                    'more',
                                    'fish',
                                ],
                                'extra' => [
                                    'chicken',
                                ],
                            ],
                            'az' => ['sentence' => 'daha az ət və daha balıq', 'correct' => ['daha az', 'ət', 'və', 'daha', 'balıq'], 'extra' => ['toyuq']],
                            'ar' => ['sentence' => 'أقل لحم و أكثر سمك', 'correct' => ['أقل', 'لحم', 'و', 'أكثر', 'سمك'], 'extra' => ['دجاج']],
                            'ru' => ['sentence' => 'меньше мясо и больше рыба', 'correct' => ['меньше', 'мясо', 'и', 'больше', 'рыба'], 'extra' => ['курица']],
                            'de' => [
                                'sentence' => 'Weniger Fleisch und mehr Fisch',
                                'correct' => [
                                    'weniger',
                                    'Fleisch',
                                    'und',
                                    'mehr',
                                    'Fisch',
                                ],
                                'extra' => [
                                    'Hähnchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Moins de viande et plus de poisson',
                                'correct' => [
                                    'moins',
                                    'viande',
                                    'et',
                                    'plus',
                                    'poisson',
                                ],
                                'extra' => [
                                    'poulet',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '肉を少なく魚をもっと',
                                'correct' => [
                                    '肉',
                                    'を',
                                    '少なく',
                                    '魚',
                                    'を',
                                    'もっと',
                                ],
                                'extra' => [
                                    '鶏肉',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고기 적게 생선 더',
                                'correct' => [
                                    '고기',
                                    '적게',
                                    '생선',
                                    '더',
                                ],
                                'extra' => [
                                    '닭고기',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha az et ve daha çok balık', 'correct' => ['daha', 'az', 'et', 've', 'daha', 'çok', 'balık'], 'extra' => ['tavuk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Pollo y Pescado', 3,
                pictures: [
                    [
                        'es' => 'pollo',
                        'img' => 'chicken',
                    ],
                    [
                        'es' => 'pescado',
                        'img' => 'fish',
                    ],
                ],
                plain: [
                    [
                        'es' => 'precio',
                    ],
                    [
                        'es' => 'cuántos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'precio',
                            'del',
                            'pescado',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the price of the fish',
                                'correct' => [
                                    'the',
                                    'price',
                                    'of',
                                    'the',
                                    'fish',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'az' => ['sentence' => 'qiymət balıq', 'correct' => ['qiymət', 'balıq'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'سعر سمك', 'correct' => ['سعر', 'سمك'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'цена рыба', 'correct' => ['цена', 'рыба'], 'extra' => ['сколько']],
                            'de' => [
                                'sentence' => 'Der Preis des Fisches',
                                'correct' => [
                                    'der',
                                    'Preis',
                                    'von',
                                    'dem',
                                    'Fisch',
                                ],
                                'extra' => [
                                    'wie viele',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le prix du poisson',
                                'correct' => [
                                    'le',
                                    'prix',
                                    'de',
                                    'le',
                                    'poisson',
                                ],
                                'extra' => [
                                    'combien',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '魚の値段',
                                'correct' => [
                                    '魚',
                                    'の',
                                    '値段',
                                ],
                                'extra' => [
                                    'いくつ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '생선의 가격',
                                'correct' => [
                                    '생선의',
                                    '가격',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                            'tr' => ['sentence' => 'balığın fiyatı', 'correct' => ['balığın', 'fiyatı'], 'extra' => ['kaç']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Cuánto',
                            'por',
                            'el',
                            'pollo',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how much for the chicken',
                                'correct' => [
                                    'how many',
                                    'for',
                                    'the',
                                    'chicken',
                                ],
                                'extra' => [
                                    'price',
                                ],
                            ],
                            'az' => ['sentence' => 'neçə üçün toyuq', 'correct' => ['neçə', 'üçün', 'toyuq'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'كم لأجل دجاج', 'correct' => ['كم', 'لأجل', 'دجاج'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'сколько для курица', 'correct' => ['сколько', 'для', 'курица'], 'extra' => ['цена']],
                            'de' => [
                                'sentence' => 'Wie viel für das Hähnchen',
                                'correct' => [
                                    'wie viele',
                                    'für',
                                    'das',
                                    'Hähnchen',
                                ],
                                'extra' => [
                                    'Preis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Combien pour le poulet',
                                'correct' => [
                                    'combien',
                                    'pour',
                                    'le',
                                    'poulet',
                                ],
                                'extra' => [
                                    'prix',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '鶏肉はいくつ',
                                'correct' => [
                                    '鶏肉',
                                    'は',
                                    'いくつ',
                                ],
                                'extra' => [
                                    '値段',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기는 몇 개',
                                'correct' => [
                                    '닭고기는',
                                    '몇',
                                    '개',
                                ],
                                'extra' => [
                                    '가격',
                                ],
                            ],
                            'tr' => ['sentence' => 'tavuk kaç lira', 'correct' => ['tavuk', 'kaç', 'lira'], 'extra' => ['fiyat']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'precio',
                            'del',
                            'pollo',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the price of the chicken',
                                'correct' => [
                                    'the',
                                    'price',
                                    'of',
                                    'the',
                                    'chicken',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'az' => ['sentence' => 'qiymət toyuq', 'correct' => ['qiymət', 'toyuq'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'سعر دجاج', 'correct' => ['سعر', 'دجاج'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'цена курица', 'correct' => ['цена', 'курица'], 'extra' => ['сколько']],
                            'de' => [
                                'sentence' => 'Der Preis des Hähnchens',
                                'correct' => [
                                    'der',
                                    'Preis',
                                    'von',
                                    'dem',
                                    'Hähnchen',
                                ],
                                'extra' => [
                                    'wie viele',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le prix du poulet',
                                'correct' => [
                                    'le',
                                    'prix',
                                    'de',
                                    'le',
                                    'poulet',
                                ],
                                'extra' => [
                                    'combien',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '鶏肉の値段',
                                'correct' => [
                                    '鶏肉',
                                    'の',
                                    '値段',
                                ],
                                'extra' => [
                                    'いくつ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기의 가격',
                                'correct' => [
                                    '닭고기의',
                                    '가격',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                            'tr' => ['sentence' => 'tavuğun fiyatı', 'correct' => ['tavuğun', 'fiyatı'], 'extra' => ['kaç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Carne y Cesta', 4,
                pictures: [
                    [
                        'es' => 'carne',
                        'img' => 'meat',
                    ],
                    [
                        'es' => 'cesta',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'es' => 'llevar',
                    ],
                    [
                        'es' => 'bolsa',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Llevar',
                            'la',
                            'cesta',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to carry the basket',
                                'correct' => [
                                    'to carry',
                                    'the',
                                    'basket',
                                ],
                                'extra' => [
                                    'bag',
                                    'meat',
                                ],
                            ],
                            'az' => ['sentence' => 'daşımaq səbət', 'correct' => ['daşımaq', 'səbət'], 'extra' => ['torba', 'ət']],
                            'ar' => ['sentence' => 'الحمل سلة', 'correct' => ['الحمل', 'سلة'], 'extra' => ['كيس', 'لحم']],
                            'ru' => ['sentence' => 'нести корзина', 'correct' => ['нести', 'корзина'], 'extra' => ['пакет', 'мясо']],
                            'de' => [
                                'sentence' => 'Den Korb tragen',
                                'correct' => [
                                    'den',
                                    'Korb',
                                    'tragen',
                                ],
                                'extra' => [
                                    'Tüte',
                                    'Fleisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Porter le panier',
                                'correct' => [
                                    'porter',
                                    'le',
                                    'panier',
                                ],
                                'extra' => [
                                    'sac',
                                    'viande',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'かごを運ぶ',
                                'correct' => [
                                    'かご',
                                    'を',
                                    '運ぶ',
                                ],
                                'extra' => [
                                    '袋',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바구니를 나르다',
                                'correct' => [
                                    '바구니를',
                                    '나르다',
                                ],
                                'extra' => [
                                    '봉투',
                                ],
                            ],
                            'tr' => ['sentence' => 'sepeti taşımak', 'correct' => ['sepeti', 'taşımak'], 'extra' => ['poşet', 'et']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'carne',
                            'en',
                            'una',
                            'bolsa',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the meat in a bag',
                                'correct' => [
                                    'the',
                                    'meat',
                                    'in',
                                    'a',
                                    'bag',
                                ],
                                'extra' => [
                                    'to carry',
                                ],
                            ],
                            'az' => ['sentence' => 'ət içində bir torba', 'correct' => ['ət', 'içində', 'bir', 'torba'], 'extra' => ['daşımaq']],
                            'ar' => ['sentence' => 'لحم في كيس', 'correct' => ['لحم', 'في', 'كيس'], 'extra' => ['الحمل']],
                            'ru' => ['sentence' => 'мясо в пакет', 'correct' => ['мясо', 'в', 'пакет'], 'extra' => ['нести']],
                            'de' => [
                                'sentence' => 'Das Fleisch in einer Tüte',
                                'correct' => [
                                    'das',
                                    'Fleisch',
                                    'in',
                                    'einer',
                                    'Tüte',
                                ],
                                'extra' => [
                                    'tragen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La viande dans un sac',
                                'correct' => [
                                    'la',
                                    'viande',
                                    'dans',
                                    'un',
                                    'sac',
                                ],
                                'extra' => [
                                    'porter',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '袋の中の肉',
                                'correct' => [
                                    '袋',
                                    'の',
                                    '中',
                                    'の',
                                    '肉',
                                ],
                                'extra' => [
                                    '運ぶ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '봉투 안의 고기',
                                'correct' => [
                                    '봉투',
                                    '안의',
                                    '고기',
                                ],
                                'extra' => [
                                    '나르다',
                                ],
                            ],
                            'tr' => ['sentence' => 'poşette et', 'correct' => ['poşette', 'et'], 'extra' => ['taşımak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Llevar',
                            'una',
                            'bolsa',
                            'pesada',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to carry a heavy bag',
                                'correct' => [
                                    'to carry',
                                    'a',
                                    'heavy',
                                    'bag',
                                ],
                                'extra' => [
                                    'basket',
                                ],
                            ],
                            'az' => ['sentence' => 'daşımaq bir ağır torba', 'correct' => ['daşımaq', 'bir', 'ağır', 'torba'], 'extra' => ['səbət']],
                            'ar' => ['sentence' => 'الحمل ثقيل كيس', 'correct' => ['الحمل', 'ثقيل', 'كيس'], 'extra' => ['سلة']],
                            'ru' => ['sentence' => 'нести тяжёлый пакет', 'correct' => ['нести', 'тяжёлый', 'пакет'], 'extra' => ['корзина']],
                            'de' => [
                                'sentence' => 'Eine schwere Tüte tragen',
                                'correct' => [
                                    'tragen',
                                    'eine',
                                    'schwer',
                                    'Tüte',
                                ],
                                'extra' => [
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Porter un sac lourd',
                                'correct' => [
                                    'porter',
                                    'un',
                                    'sac',
                                    'lourd',
                                ],
                                'extra' => [
                                    'panier',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '重い袋を運ぶ',
                                'correct' => [
                                    '重い',
                                    '袋',
                                    'を',
                                    '運ぶ',
                                ],
                                'extra' => [
                                    'かご',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '무거운 봉투를 나르다',
                                'correct' => [
                                    '무거운',
                                    '봉투를',
                                    '나르다',
                                ],
                                'extra' => [
                                    '바구니',
                                ],
                            ],
                            'tr' => ['sentence' => 'ağır bir poşet taşımak', 'correct' => ['ağır', 'bir', 'poşet', 'taşımak'], 'extra' => ['sepet']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Pollo y Arroz', 5,
                pictures: [
                    [
                        'es' => 'pollo',
                        'img' => 'chicken',
                    ],
                    [
                        'es' => 'arroz',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'es' => 'juntos',
                    ],
                    [
                        'es' => 'también',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pollo',
                            'y',
                            'el',
                            'arroz',
                            'juntos',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chicken and the rice together',
                                'correct' => [
                                    'the',
                                    'chicken',
                                    'and',
                                    'the',
                                    'rice',
                                    'together',
                                ],
                                'extra' => [
                                    'also',
                                ],
                            ],
                            'az' => ['sentence' => 'toyuq və düyü birlikdə', 'correct' => ['toyuq', 'və', 'düyü', 'birlikdə'], 'extra' => ['həmçinin']],
                            'ar' => ['sentence' => 'دجاج و أرز معا', 'correct' => ['دجاج', 'و', 'أرز', 'معا'], 'extra' => ['أيضا']],
                            'ru' => ['sentence' => 'курица и рис вместе', 'correct' => ['курица', 'и', 'рис', 'вместе'], 'extra' => ['тоже']],
                            'de' => [
                                'sentence' => 'Das Hähnchen und der Reis zusammen',
                                'correct' => [
                                    'das',
                                    'Hähnchen',
                                    'und',
                                    'der',
                                    'Reis',
                                    'zusammen',
                                ],
                                'extra' => [
                                    'auch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poulet et le riz ensemble',
                                'correct' => [
                                    'le',
                                    'poulet',
                                    'et',
                                    'le',
                                    'riz',
                                    'ensemble',
                                ],
                                'extra' => [
                                    'aussi',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '鶏肉とご飯を一緒に',
                                'correct' => [
                                    '鶏肉',
                                    'と',
                                    'ご飯',
                                    'を',
                                    '一緒に',
                                ],
                                'extra' => [
                                    'も',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기와 밥 같이',
                                'correct' => [
                                    '닭고기와',
                                    '밥',
                                    '같이',
                                ],
                                'extra' => [
                                    '또한',
                                ],
                            ],
                            'tr' => ['sentence' => 'tavuk ve pirinç birlikte', 'correct' => ['tavuk', 've', 'pirinç', 'birlikte'], 'extra' => ['de']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Arroz',
                            'también',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some rice also',
                                'correct' => [
                                    'some',
                                    'rice',
                                    'also',
                                ],
                                'extra' => [
                                    'together',
                                    'chicken',
                                ],
                            ],
                            'az' => ['sentence' => 'bir az düyü həmçinin', 'correct' => ['bir az', 'düyü', 'həmçinin'], 'extra' => ['birlikdə', 'toyuq']],
                            'ar' => ['sentence' => 'بعض أرز أيضا', 'correct' => ['بعض', 'أرز', 'أيضا'], 'extra' => ['معا', 'دجاج']],
                            'ru' => ['sentence' => 'немного рис тоже', 'correct' => ['немного', 'рис', 'тоже'], 'extra' => ['вместе', 'курица']],
                            'de' => [
                                'sentence' => 'Auch etwas Reis',
                                'correct' => [
                                    'auch',
                                    'etwas',
                                    'Reis',
                                ],
                                'extra' => [
                                    'zusammen',
                                    'Hähnchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du riz aussi',
                                'correct' => [
                                    'du',
                                    'riz',
                                    'aussi',
                                ],
                                'extra' => [
                                    'ensemble',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯も',
                                'correct' => [
                                    'ご飯',
                                    'も',
                                ],
                                'extra' => [
                                    '一緒に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥도',
                                'correct' => [
                                    '밥도',
                                ],
                                'extra' => [
                                    '함께',
                                ],
                            ],
                            'tr' => ['sentence' => 'biraz pirinç de', 'correct' => ['biraz', 'pirinç', 'de'], 'extra' => ['birlikte', 'tavuk']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'pollo',
                            'con',
                            'el',
                            'arroz',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chicken with the rice',
                                'correct' => [
                                    'the',
                                    'chicken',
                                    'with',
                                    'the',
                                    'rice',
                                ],
                                'extra' => [
                                    'together',
                                ],
                            ],
                            'az' => ['sentence' => 'toyuq ilə düyü', 'correct' => ['toyuq', 'ilə', 'düyü'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'دجاج مع أرز', 'correct' => ['دجاج', 'مع', 'أرز'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'курица с рис', 'correct' => ['курица', 'с', 'рис'], 'extra' => ['вместе']],
                            'de' => [
                                'sentence' => 'Das Hähnchen mit dem Reis',
                                'correct' => [
                                    'das',
                                    'Hähnchen',
                                    'mit',
                                    'dem',
                                    'Reis',
                                ],
                                'extra' => [
                                    'zusammen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poulet avec le riz',
                                'correct' => [
                                    'le',
                                    'poulet',
                                    'avec',
                                    'le',
                                    'riz',
                                ],
                                'extra' => [
                                    'ensemble',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯と一緒に鶏肉',
                                'correct' => [
                                    'ご飯',
                                    'と一緒に',
                                    '鶏肉',
                                ],
                                'extra' => [
                                    '一緒に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥과 함께 닭고기',
                                'correct' => [
                                    '밥과',
                                    '함께',
                                    '닭고기',
                                ],
                                'extra' => [
                                    '함께',
                                ],
                            ],
                            'tr' => ['sentence' => 'pirinçli tavuk', 'correct' => ['pirinçli', 'tavuk'], 'extra' => ['birlikte']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
