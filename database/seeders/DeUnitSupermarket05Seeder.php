<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket05Seeder extends Seeder
{
    private const PICTURES = [
        'Fleisch' => 'meat',
        'Hähnchen' => 'chicken',
        'Fisch' => 'fish',
        'Reis' => 'rice',
        'Korb' => 'basket',
        'Schachtel' => 'box',
        'Käse' => 'cheese',
        'Brot' => 'bread',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 5, the German twin of the
     * English "Unit 5: Meat and Fish" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Einheit 5: Fleisch & Fisch', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Fleisch & Hähnchen', 1,
                pictures: [
                    [
                        'de' => 'Fleisch',
                        'img' => 'meat',
                    ],
                    [
                        'de' => 'Hähnchen',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'de' => 'teuer',
                    ],
                    [
                        'de' => 'billig',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Hähnchen',
                            'ist',
                            'teuer',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'billiges',
                            'Hähnchen',
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
                                    'meat',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Das',
                            'Fleisch',
                            'ist',
                            'billig',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Fisch & Fleisch', 2,
                pictures: [
                    [
                        'de' => 'Fisch',
                        'img' => 'fish',
                    ],
                    [
                        'de' => 'Fleisch',
                        'img' => 'meat',
                    ],
                ],
                plain: [
                    [
                        'de' => 'weniger',
                    ],
                    [
                        'de' => 'mehr',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Weniger',
                            'Fleisch',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mehr',
                            'Fisch',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Weniger',
                            'Fleisch',
                            'und',
                            'mehr',
                            'Fisch',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Hähnchen & Fisch', 3,
                pictures: [
                    [
                        'de' => 'Hähnchen',
                        'img' => 'chicken',
                    ],
                    [
                        'de' => 'Fisch',
                        'img' => 'fish',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Preis',
                    ],
                    [
                        'de' => 'wie viele',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Preis',
                            'des',
                            'Fisches',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Wie',
                            'viel',
                            'für',
                            'das',
                            'Hähnchen',
                        ],
                        'blank' => 4,
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'Preis',
                            'des',
                            'Hähnchens',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Fleisch & Korb', 4,
                pictures: [
                    [
                        'de' => 'Fleisch',
                        'img' => 'meat',
                    ],
                    [
                        'de' => 'Korb',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'de' => 'tragen',
                    ],
                    [
                        'de' => 'Tüte',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Den',
                            'Korb',
                            'tragen',
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
                                    'meat',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Das',
                            'Fleisch',
                            'in',
                            'einer',
                            'Tüte',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Eine',
                            'schwere',
                            'Tüte',
                            'tragen',
                        ],
                        'blank' => 1,
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Hähnchen & Reis', 5,
                pictures: [
                    [
                        'de' => 'Hähnchen',
                        'img' => 'chicken',
                    ],
                    [
                        'de' => 'Reis',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'de' => 'zusammen',
                    ],
                    [
                        'de' => 'auch',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Hähnchen',
                            'und',
                            'der',
                            'Reis',
                            'zusammen',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Auch',
                            'etwas',
                            'Reis',
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
                                    'chicken',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Das',
                            'Hähnchen',
                            'mit',
                            'dem',
                            'Reis',
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
                        ],
                    ],
                ],
            ),
        ];
    }
}
