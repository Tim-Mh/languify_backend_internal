<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant05Seeder extends Seeder
{
    private const PICTURES = [
        'pastel' => 'cake',
        'café' => 'coffee',
        'arroz' => 'rice',
        'pollo' => 'chicken',
        'pescado' => 'fish',
        'plato' => 'plate',
        'vaso' => 'glass',
        'sopa' => 'soup',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 5, the Spanish twin of the
     * English "Unit 5: Complaints and Compliments" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unidad 5: Quejas y elogios', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Pastel y Café', 1,
                pictures: [
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'es' => 'delicioso',
                    ],
                    [
                        'es' => 'excelente',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pastel',
                            'está',
                            'delicioso',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cake is delicious',
                                'correct' => [
                                    'the',
                                    'cake',
                                    'is',
                                    'delicious',
                                ],
                                'extra' => [
                                    'excellent',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kuchen ist köstlich',
                                'correct' => [
                                    'der',
                                    'Kuchen',
                                    'ist',
                                    'köstlich',
                                ],
                                'extra' => [
                                    'ausgezeichnet',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le gâteau est délicieux',
                                'correct' => [
                                    'le',
                                    'gâteau',
                                    'est',
                                    'délicieux',
                                ],
                                'extra' => [
                                    'excellent',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ケーキはおいしいです',
                                'correct' => [
                                    'ケーキ',
                                    'は',
                                    'おいしい',
                                    'です',
                                ],
                                'extra' => [
                                    '素晴らしい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크는 맛있습니다',
                                'correct' => [
                                    '케이크는',
                                    '맛있습니다',
                                ],
                                'extra' => [
                                    '훌륭한',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'café',
                            'es',
                            'excelente',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the coffee is excellent',
                                'correct' => [
                                    'the',
                                    'coffee',
                                    'is',
                                    'excellent',
                                ],
                                'extra' => [
                                    'delicious',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kaffee ist ausgezeichnet',
                                'correct' => [
                                    'der',
                                    'Kaffee',
                                    'ist',
                                    'ausgezeichnet',
                                ],
                                'extra' => [
                                    'köstlich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le café est excellent',
                                'correct' => [
                                    'le',
                                    'café',
                                    'est',
                                    'excellent',
                                ],
                                'extra' => [
                                    'délicieux',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'コーヒーは素晴らしいです',
                                'correct' => [
                                    'コーヒー',
                                    'は',
                                    '素晴らしい',
                                    'です',
                                ],
                                'extra' => [
                                    'おいしい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피는 훌륭합니다',
                                'correct' => [
                                    '커피는',
                                    '훌륭합니다',
                                ],
                                'extra' => [
                                    '맛있는',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'pastel',
                            'excelente',
                            'y',
                            'un',
                            'café',
                            'delicioso',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an excellent cake and a delicious coffee',
                                'correct' => [
                                    'an',
                                    'excellent',
                                    'cake',
                                    'and',
                                    'a',
                                    'delicious',
                                    'coffee',
                                ],
                                'extra' => [],
                            ],
                            'de' => [
                                'sentence' => 'Ein ausgezeichneter Kuchen und ein köstlicher Kaffee',
                                'correct' => [
                                    'ein',
                                    'ausgezeichnet',
                                    'Kuchen',
                                    'und',
                                    'ein',
                                    'köstlich',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'ist',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gâteau excellent et un café délicieux',
                                'correct' => [
                                    'un',
                                    'gâteau',
                                    'excellent',
                                    'et',
                                    'un',
                                    'café',
                                    'délicieux',
                                ],
                                'extra' => [
                                    'est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '素晴らしいケーキとおいしいコーヒー',
                                'correct' => [
                                    '素晴らしい',
                                    'ケーキ',
                                    'と',
                                    'おいしい',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    'です',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '훌륭한 케이크와 맛있는 커피',
                                'correct' => [
                                    '훌륭한',
                                    '케이크와',
                                    '맛있는',
                                    '커피',
                                ],
                                'extra' => [
                                    '입니다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Arroz y Pollo', 2,
                pictures: [
                    [
                        'es' => 'arroz',
                        'img' => 'rice',
                    ],
                    [
                        'es' => 'pollo',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'es' => 'salado',
                    ],
                    [
                        'es' => 'picante',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'arroz',
                            'está',
                            'demasiado',
                            'salado',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the rice is too salty',
                                'correct' => [
                                    'the',
                                    'rice',
                                    'is',
                                    'too much',
                                    'salty',
                                ],
                                'extra' => [
                                    'spicy',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Reis ist zu salzig',
                                'correct' => [
                                    'der',
                                    'Reis',
                                    'ist',
                                    'zu viel',
                                    'salzig',
                                ],
                                'extra' => [
                                    'scharf',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le riz est trop salé',
                                'correct' => [
                                    'le',
                                    'riz',
                                    'est',
                                    'trop',
                                    'salé',
                                ],
                                'extra' => [
                                    'épicé',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯はしょっぱすぎます',
                                'correct' => [
                                    'ご飯',
                                    'は',
                                    'しょっぱすぎます',
                                ],
                                'extra' => [
                                    '辛い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥은 너무 짭니다',
                                'correct' => [
                                    '밥은',
                                    '너무',
                                    '짭니다',
                                ],
                                'extra' => [
                                    '매운',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'pollo',
                            'está',
                            'picante',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chicken is spicy',
                                'correct' => [
                                    'the',
                                    'chicken',
                                    'is',
                                    'spicy',
                                ],
                                'extra' => [
                                    'salty',
                                    'rice',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Hähnchen ist scharf',
                                'correct' => [
                                    'das',
                                    'Hähnchen',
                                    'ist',
                                    'scharf',
                                ],
                                'extra' => [
                                    'salzig',
                                    'Reis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poulet est épicé',
                                'correct' => [
                                    'le',
                                    'poulet',
                                    'est',
                                    'épicé',
                                ],
                                'extra' => [
                                    'salé',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '鶏肉は辛いです',
                                'correct' => [
                                    '鶏肉',
                                    'は',
                                    '辛い',
                                    'です',
                                ],
                                'extra' => [
                                    'しょっぱい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기는 맵습니다',
                                'correct' => [
                                    '닭고기는',
                                    '맵습니다',
                                ],
                                'extra' => [
                                    '짠',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'arroz',
                            'salado',
                            'y',
                            'un',
                            'pollo',
                            'picante',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a salty rice and a spicy chicken',
                                'correct' => [
                                    'a',
                                    'salty',
                                    'rice',
                                    'and',
                                    'a',
                                    'spicy',
                                    'chicken',
                                ],
                                'extra' => [
                                    'too much',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein salziger Reis und ein scharfes Hähnchen',
                                'correct' => [
                                    'ein',
                                    'salzig',
                                    'Reis',
                                    'und',
                                    'ein',
                                    'scharf',
                                    'Hähnchen',
                                ],
                                'extra' => [
                                    'zu viel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un riz salé et un poulet épicé',
                                'correct' => [
                                    'un',
                                    'riz',
                                    'salé',
                                    'et',
                                    'un',
                                    'poulet',
                                    'épicé',
                                ],
                                'extra' => [
                                    'trop',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'しょっぱいご飯と辛い鶏肉',
                                'correct' => [
                                    'しょっぱい',
                                    'ご飯',
                                    'と',
                                    '辛い',
                                    '鶏肉',
                                ],
                                'extra' => [
                                    'すぎます',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '짠 밥과 매운 닭고기',
                                'correct' => [
                                    '짠',
                                    '밥과',
                                    '매운',
                                    '닭고기',
                                ],
                                'extra' => [
                                    '너무',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Pescado y Plato', 3,
                pictures: [
                    [
                        'es' => 'pescado',
                        'img' => 'fish',
                    ],
                    [
                        'es' => 'plato',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'es' => 'frío',
                    ],
                    [
                        'es' => 'problema',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pescado',
                            'está',
                            'frío',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the fish is cold',
                                'correct' => [
                                    'the',
                                    'fish',
                                    'is',
                                    'cold',
                                ],
                                'extra' => [
                                    'problem',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Fisch ist kalt',
                                'correct' => [
                                    'der',
                                    'Fisch',
                                    'ist',
                                    'kalt',
                                ],
                                'extra' => [
                                    'Problem',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poisson est froid',
                                'correct' => [
                                    'le',
                                    'poisson',
                                    'est',
                                    'froid',
                                ],
                                'extra' => [
                                    'problème',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '魚は冷たいです',
                                'correct' => [
                                    '魚',
                                    'は',
                                    '冷たい',
                                    'です',
                                ],
                                'extra' => [
                                    '問題',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '생선은 차갑습니다',
                                'correct' => [
                                    '생선은',
                                    '차갑습니다',
                                ],
                                'extra' => [
                                    '문제',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'problema',
                            'con',
                            'el',
                            'pescado',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a problem with the fish',
                                'correct' => [
                                    'a',
                                    'problem',
                                    'with',
                                    'the',
                                    'fish',
                                ],
                                'extra' => [
                                    'cold',
                                    'plate',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Problem mit dem Fisch',
                                'correct' => [
                                    'ein',
                                    'Problem',
                                    'mit',
                                    'dem',
                                    'Fisch',
                                ],
                                'extra' => [
                                    'kalt',
                                    'Teller',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un problème avec le poisson',
                                'correct' => [
                                    'un',
                                    'problème',
                                    'avec',
                                    'le',
                                    'poisson',
                                ],
                                'extra' => [
                                    'froid',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '魚に問題があります',
                                'correct' => [
                                    '魚',
                                    'に',
                                    '問題',
                                    'が',
                                    'あります',
                                ],
                                'extra' => [
                                    '冷たい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '생선에 문제가 있습니다',
                                'correct' => [
                                    '생선에',
                                    '문제가',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '차가운',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'plato',
                            'y',
                            'un',
                            'problema',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a plate and a problem',
                                'correct' => [
                                    'a',
                                    'plate',
                                    'and',
                                    'a',
                                    'problem',
                                ],
                                'extra' => [
                                    'cold',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Teller und ein Problem',
                                'correct' => [
                                    'ein',
                                    'Teller',
                                    'und',
                                    'ein',
                                    'Problem',
                                ],
                                'extra' => [
                                    'kalt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette et un problème',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'et',
                                    'un',
                                    'problème',
                                ],
                                'extra' => [
                                    'froid',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'お皿と問題',
                                'correct' => [
                                    'お皿',
                                    'と',
                                    '問題',
                                ],
                                'extra' => [
                                    '冷たい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '접시와 문제',
                                'correct' => [
                                    '접시와',
                                    '문제',
                                ],
                                'extra' => [
                                    '차가운',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Vaso y Plato', 4,
                pictures: [
                    [
                        'es' => 'vaso',
                        'img' => 'glass',
                    ],
                    [
                        'es' => 'plato',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'es' => 'limpio',
                    ],
                    [
                        'es' => 'sucio',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'vaso',
                            'está',
                            'limpio',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the glass is clean',
                                'correct' => [
                                    'the',
                                    'glass',
                                    'is',
                                    'clean',
                                ],
                                'extra' => [
                                    'dirty',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Glas ist sauber',
                                'correct' => [
                                    'das',
                                    'Glas',
                                    'ist',
                                    'sauber',
                                ],
                                'extra' => [
                                    'schmutzig',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le verre est propre',
                                'correct' => [
                                    'le',
                                    'verre',
                                    'est',
                                    'propre',
                                ],
                                'extra' => [
                                    'sale',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'グラスはきれいです',
                                'correct' => [
                                    'グラス',
                                    'は',
                                    'きれい',
                                    'です',
                                ],
                                'extra' => [
                                    '汚い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '유리잔은 깨끗합니다',
                                'correct' => [
                                    '유리잔은',
                                    '깨끗합니다',
                                ],
                                'extra' => [
                                    '더러운',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'plato',
                            'sucio',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a dirty plate',
                                'correct' => [
                                    'a',
                                    'dirty',
                                    'plate',
                                ],
                                'extra' => [
                                    'clean',
                                    'glass',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein schmutziger Teller',
                                'correct' => [
                                    'ein',
                                    'schmutzig',
                                    'Teller',
                                ],
                                'extra' => [
                                    'sauber',
                                    'Glas',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette sale',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'sale',
                                ],
                                'extra' => [
                                    'propre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '汚いお皿',
                                'correct' => [
                                    '汚い',
                                    'お皿',
                                ],
                                'extra' => [
                                    'きれい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '더러운 접시',
                                'correct' => [
                                    '더러운',
                                    '접시',
                                ],
                                'extra' => [
                                    '깨끗한',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'vaso',
                            'limpio',
                            'y',
                            'un',
                            'plato',
                            'sucio',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a clean glass and a dirty plate',
                                'correct' => [
                                    'a',
                                    'clean',
                                    'glass',
                                    'and',
                                    'a',
                                    'dirty',
                                    'plate',
                                ],
                                'extra' => [],
                            ],
                            'de' => [
                                'sentence' => 'Ein sauberes Glas und ein schmutziger Teller',
                                'correct' => [
                                    'ein',
                                    'sauber',
                                    'Glas',
                                    'und',
                                    'ein',
                                    'schmutzig',
                                    'Teller',
                                ],
                                'extra' => [
                                    'ist',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un verre propre et une assiette sale',
                                'correct' => [
                                    'un',
                                    'verre',
                                    'propre',
                                    'et',
                                    'une',
                                    'assiette',
                                    'sale',
                                ],
                                'extra' => [
                                    'est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'きれいなグラスと汚いお皿',
                                'correct' => [
                                    'きれいな',
                                    'グラス',
                                    'と',
                                    '汚い',
                                    'お皿',
                                ],
                                'extra' => [
                                    'です',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '깨끗한 유리잔과 더러운 접시',
                                'correct' => [
                                    '깨끗한',
                                    '유리잔과',
                                    '더러운',
                                    '접시',
                                ],
                                'extra' => [
                                    '입니다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Café y Pastel', 5,
                pictures: [
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'es' => 'perfecto',
                    ],
                    [
                        'es' => 'sabor',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'café',
                            'es',
                            'perfecto',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the coffee is perfect',
                                'correct' => [
                                    'the',
                                    'coffee',
                                    'is',
                                    'perfect',
                                ],
                                'extra' => [
                                    'taste',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kaffee ist perfekt',
                                'correct' => [
                                    'der',
                                    'Kaffee',
                                    'ist',
                                    'perfekt',
                                ],
                                'extra' => [
                                    'Geschmack',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le café est parfait',
                                'correct' => [
                                    'le',
                                    'café',
                                    'est',
                                    'parfait',
                                ],
                                'extra' => [
                                    'goût',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'コーヒーは完璧です',
                                'correct' => [
                                    'コーヒー',
                                    'は',
                                    '完璧',
                                    'です',
                                ],
                                'extra' => [
                                    '味',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피는 완벽합니다',
                                'correct' => [
                                    '커피는',
                                    '완벽합니다',
                                ],
                                'extra' => [
                                    '맛',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'sabor',
                            'es',
                            'bueno',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the taste is good',
                                'correct' => [
                                    'the',
                                    'taste',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'perfect',
                                    'coffee',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Geschmack ist gut',
                                'correct' => [
                                    'der',
                                    'Geschmack',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'perfekt',
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le goût est bon',
                                'correct' => [
                                    'le',
                                    'goût',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'parfait',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '味は良いです',
                                'correct' => [
                                    '味',
                                    'は',
                                    '良い',
                                    'です',
                                ],
                                'extra' => [
                                    '完璧',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '맛은 좋습니다',
                                'correct' => [
                                    '맛은',
                                    '좋습니다',
                                ],
                                'extra' => [
                                    '완벽한',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'sabor',
                            'del',
                            'pastel',
                            'es',
                            'perfecto',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the taste of the cake is perfect',
                                'correct' => [
                                    'the',
                                    'taste',
                                    'of',
                                    'the',
                                    'cake',
                                    'is',
                                    'perfect',
                                ],
                                'extra' => [
                                    'coffee',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Geschmack des Kuchens ist perfekt',
                                'correct' => [
                                    'der',
                                    'Geschmack',
                                    'von',
                                    'dem',
                                    'Kuchen',
                                    'ist',
                                    'perfekt',
                                ],
                                'extra' => [
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le goût du gâteau est parfait',
                                'correct' => [
                                    'le',
                                    'goût',
                                    'de',
                                    'le',
                                    'gâteau',
                                    'est',
                                    'parfait',
                                ],
                                'extra' => [
                                    'café',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ケーキの味は完璧です',
                                'correct' => [
                                    'ケーキ',
                                    'の',
                                    '味',
                                    'は',
                                    '完璧',
                                    'です',
                                ],
                                'extra' => [
                                    'コーヒー',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크의 맛은 완벽합니다',
                                'correct' => [
                                    '케이크의',
                                    '맛은',
                                    '완벽합니다',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
