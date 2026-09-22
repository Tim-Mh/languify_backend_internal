<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket05Seeder extends Seeder
{
    private const PICTURES = [
        '肉' => 'meat',
        '鶏肉' => 'chicken',
        '魚' => 'fish',
        'ご飯' => 'rice',
        'かご' => 'basket',
        '箱' => 'box',
        'チーズ' => 'cheese',
        'パン' => 'bread',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 5, the Japanese twin of the
     * English "Unit 5: Meat and Fish" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'ユニット5: 肉と魚', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 肉・鶏肉', 1,
                pictures: [
                    [
                        'ja' => '肉',
                        'img' => 'meat',
                    ],
                    [
                        'ja' => '鶏肉',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'ja' => '高い',
                    ],
                    [
                        'ja' => '安い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '鶏肉',
                            'は',
                            '高い',
                            'です',
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
                                ],
                            ],
                            'az' => ['sentence' => 'toyuq bahalı', 'correct' => ['toyuq', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'دجاج غالي', 'correct' => ['دجاج', 'غالي'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'курица дорогой', 'correct' => ['курица', 'дорогой'], 'extra' => ['дешёвый']],
                            'es' => [
                                'sentence' => 'El pollo es caro',
                                'correct' => [
                                    'el',
                                    'pollo',
                                    'es',
                                    'caro',
                                ],
                                'extra' => [
                                    'barato',
                                    'carne',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'tavuk pahalı', 'correct' => ['tavuk', 'pahalı'], 'extra' => ['ucuz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '安い',
                            '鶏肉',
                        ],
                        'blank' => 1,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir ucuz toyuq', 'correct' => ['bir', 'ucuz', 'toyuq'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'رخيص دجاج', 'correct' => ['رخيص', 'دجاج'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'дешёвый курица', 'correct' => ['дешёвый', 'курица'], 'extra' => ['дорогой']],
                            'es' => [
                                'sentence' => 'Un pollo barato',
                                'correct' => [
                                    'un',
                                    'pollo',
                                    'barato',
                                ],
                                'extra' => [
                                    'caro',
                                    'carne',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'ucuz bir tavuk', 'correct' => ['ucuz', 'bir', 'tavuk'], 'extra' => ['pahalı']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '肉',
                            'は',
                            '安い',
                            'です',
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
                                ],
                            ],
                            'az' => ['sentence' => 'ət ucuz', 'correct' => ['ət', 'ucuz'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'لحم رخيص', 'correct' => ['لحم', 'رخيص'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'мясо дешёвый', 'correct' => ['мясо', 'дешёвый'], 'extra' => ['дорогой']],
                            'es' => [
                                'sentence' => 'La carne es barata',
                                'correct' => [
                                    'la',
                                    'carne',
                                    'es',
                                    'barato',
                                ],
                                'extra' => [
                                    'caro',
                                    'pollo',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'et ucuz', 'correct' => ['et', 'ucuz'], 'extra' => ['pahalı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 魚・肉', 2,
                pictures: [
                    [
                        'ja' => '魚',
                        'img' => 'fish',
                    ],
                    [
                        'ja' => '肉',
                        'img' => 'meat',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'より少ない',
                    ],
                    [
                        'ja' => 'もっと',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '肉',
                            'を',
                            '少なく',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'less meat',
                                'correct' => [
                                    'less',
                                    'meat',
                                ],
                                'extra' => [
                                    'more',
                                ],
                            ],
                            'az' => ['sentence' => 'daha az ət', 'correct' => ['daha az', 'ət'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'أقل لحم', 'correct' => ['أقل', 'لحم'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'меньше мясо', 'correct' => ['меньше', 'мясо'], 'extra' => ['больше']],
                            'es' => [
                                'sentence' => 'Menos carne',
                                'correct' => [
                                    'menos',
                                    'carne',
                                ],
                                'extra' => [
                                    'más',
                                    'pescado',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'daha az et', 'correct' => ['daha', 'az', 'et'], 'extra' => ['daha çok']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '魚',
                            'を',
                            'もっと',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'more fish',
                                'correct' => [
                                    'more',
                                    'fish',
                                ],
                                'extra' => [
                                    'less',
                                ],
                            ],
                            'az' => ['sentence' => 'daha balıq', 'correct' => ['daha', 'balıq'], 'extra' => ['daha az']],
                            'ar' => ['sentence' => 'أكثر سمك', 'correct' => ['أكثر', 'سمك'], 'extra' => ['أقل']],
                            'ru' => ['sentence' => 'больше рыба', 'correct' => ['больше', 'рыба'], 'extra' => ['меньше']],
                            'es' => [
                                'sentence' => 'Más pescado',
                                'correct' => [
                                    'más',
                                    'pescado',
                                ],
                                'extra' => [
                                    'menos',
                                    'carne',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'daha çok balık', 'correct' => ['daha', 'çok', 'balık'], 'extra' => ['daha az']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '肉',
                            'を',
                            '少なく',
                            '魚',
                            'を',
                            'もっと',
                        ],
                        'blank' => 5,
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
                            'es' => [
                                'sentence' => 'Menos carne y más pescado',
                                'correct' => [
                                    'menos',
                                    'carne',
                                    'y',
                                    'más',
                                    'pescado',
                                ],
                                'extra' => [
                                    'pollo',
                                ],
                            ],
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
            $builder->lesson('レッスン3: 鶏肉・魚', 3,
                pictures: [
                    [
                        'ja' => '鶏肉',
                        'img' => 'chicken',
                    ],
                    [
                        'ja' => '魚',
                        'img' => 'fish',
                    ],
                ],
                plain: [
                    [
                        'ja' => '値段',
                    ],
                    [
                        'ja' => 'いくつ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '魚',
                            'の',
                            '値段',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'El precio del pescado',
                                'correct' => [
                                    'el',
                                    'precio',
                                    'de',
                                    'el',
                                    'pescado',
                                ],
                                'extra' => [
                                    'cuántos',
                                ],
                            ],
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
                            '鶏肉',
                            'は',
                            'いくら',
                            'です',
                            'か',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Cuánto por el pollo',
                                'correct' => [
                                    'cuántos',
                                    'para',
                                    'el',
                                    'pollo',
                                ],
                                'extra' => [
                                    'precio',
                                ],
                            ],
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
                            '鶏肉',
                            'の',
                            '値段',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'El precio del pollo',
                                'correct' => [
                                    'el',
                                    'precio',
                                    'de',
                                    'el',
                                    'pollo',
                                ],
                                'extra' => [
                                    'cuántos',
                                ],
                            ],
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
            $builder->lesson('レッスン4: 肉・かご', 4,
                pictures: [
                    [
                        'ja' => '肉',
                        'img' => 'meat',
                    ],
                    [
                        'ja' => 'かご',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'ja' => '運ぶ',
                    ],
                    [
                        'ja' => '袋',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'かご',
                            'を',
                            '運ぶ',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'daşımaq səbət', 'correct' => ['daşımaq', 'səbət'], 'extra' => ['torba']],
                            'ar' => ['sentence' => 'الحمل سلة', 'correct' => ['الحمل', 'سلة'], 'extra' => ['كيس']],
                            'ru' => ['sentence' => 'нести корзина', 'correct' => ['нести', 'корзина'], 'extra' => ['пакет']],
                            'es' => [
                                'sentence' => 'Llevar la cesta',
                                'correct' => [
                                    'llevar',
                                    'la',
                                    'cesta',
                                ],
                                'extra' => [
                                    'bolsa',
                                    'carne',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'sepeti taşımak', 'correct' => ['sepeti', 'taşımak'], 'extra' => ['poşet']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '袋',
                            'の',
                            '中',
                            'の',
                            '肉',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'La carne en una bolsa',
                                'correct' => [
                                    'la',
                                    'carne',
                                    'en',
                                    'una',
                                    'bolsa',
                                ],
                                'extra' => [
                                    'llevar',
                                ],
                            ],
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
                            '重い',
                            '袋',
                            'を',
                            '運ぶ',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Llevar una bolsa pesada',
                                'correct' => [
                                    'llevar',
                                    'una',
                                    'pesado',
                                    'bolsa',
                                ],
                                'extra' => [
                                    'cesta',
                                ],
                            ],
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
            $builder->lesson('レッスン5: 鶏肉・ご飯', 5,
                pictures: [
                    [
                        'ja' => '鶏肉',
                        'img' => 'chicken',
                    ],
                    [
                        'ja' => 'ご飯',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'ja' => '一緒に',
                    ],
                    [
                        'ja' => 'も',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '鶏肉',
                            'と',
                            'ご飯',
                            'を',
                            '一緒に',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'El pollo y el arroz juntos',
                                'correct' => [
                                    'el',
                                    'pollo',
                                    'y',
                                    'el',
                                    'arroz',
                                    'juntos',
                                ],
                                'extra' => [
                                    'también',
                                ],
                            ],
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
                            'ご飯',
                            'も',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir az düyü həmçinin', 'correct' => ['bir az', 'düyü', 'həmçinin'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'بعض أرز أيضا', 'correct' => ['بعض', 'أرز', 'أيضا'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'немного рис тоже', 'correct' => ['немного', 'рис', 'тоже'], 'extra' => ['вместе']],
                            'es' => [
                                'sentence' => 'Arroz también',
                                'correct' => [
                                    'algo de',
                                    'arroz',
                                    'también',
                                ],
                                'extra' => [
                                    'juntos',
                                    'pollo',
                                ],
                            ],
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
                            'ko' => [
                                'sentence' => '밥도',
                                'correct' => [
                                    '밥도',
                                ],
                                'extra' => [
                                    '함께',
                                ],
                            ],
                            'tr' => ['sentence' => 'biraz pirinç de', 'correct' => ['biraz', 'pirinç', 'de'], 'extra' => ['birlikte']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ご飯',
                            'と一緒に',
                            '鶏肉',
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
                            'es' => [
                                'sentence' => 'El pollo con el arroz',
                                'correct' => [
                                    'el',
                                    'pollo',
                                    'con',
                                    'el',
                                    'arroz',
                                ],
                                'extra' => [
                                    'juntos',
                                ],
                            ],
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
