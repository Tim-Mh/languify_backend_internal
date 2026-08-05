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
                        ],
                    ],
                ],
            ),
        ];
    }
}
