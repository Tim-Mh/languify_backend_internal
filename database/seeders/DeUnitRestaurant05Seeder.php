<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant05Seeder extends Seeder
{
    private const PICTURES = [
        'Kuchen' => 'cake',
        'Kaffee' => 'coffee',
        'Reis' => 'rice',
        'Hähnchen' => 'chicken',
        'Fisch' => 'fish',
        'Teller' => 'plate',
        'Glas' => 'glass',
        'Suppe' => 'soup',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 5, the German twin of the
     * English "Unit 5: Complaints and Compliments" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Einheit 5: Lob & Beschwerden', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Kuchen & Kaffee', 1,
                pictures: [
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'de' => 'köstlich',
                    ],
                    [
                        'de' => 'ausgezeichnet',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Kuchen',
                            'ist',
                            'köstlich',
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
                            'es' => [
                                'sentence' => 'El pastel está delicioso',
                                'correct' => [
                                    'el',
                                    'pastel',
                                    'está',
                                    'delicioso',
                                ],
                                'extra' => [
                                    'excelente',
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
                            'Der',
                            'Kaffee',
                            'ist',
                            'ausgezeichnet',
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
                            'es' => [
                                'sentence' => 'El café es excelente',
                                'correct' => [
                                    'el',
                                    'café',
                                    'es',
                                    'excelente',
                                ],
                                'extra' => [
                                    'delicioso',
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
                            'Ein',
                            'ausgezeichneter',
                            'Kuchen',
                            'und',
                            'ein',
                            'köstlicher',
                            'Kaffee',
                        ],
                        'blank' => 1,
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
                                'extra' => [
                                    'is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un pastel excelente y un café delicioso',
                                'correct' => [
                                    'un',
                                    'pastel',
                                    'excelente',
                                    'y',
                                    'un',
                                    'café',
                                    'delicioso',
                                ],
                                'extra' => [
                                    'está',
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
            $builder->lesson('Lektion 2: Reis & Hähnchen', 2,
                pictures: [
                    [
                        'de' => 'Reis',
                        'img' => 'rice',
                    ],
                    [
                        'de' => 'Hähnchen',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'de' => 'salzig',
                    ],
                    [
                        'de' => 'scharf',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Reis',
                            'ist',
                            'zu',
                            'salzig',
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
                            'es' => [
                                'sentence' => 'El arroz está demasiado salado',
                                'correct' => [
                                    'el',
                                    'arroz',
                                    'está',
                                    'demasiado',
                                    'salado',
                                ],
                                'extra' => [
                                    'picante',
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
                            'Das',
                            'Hähnchen',
                            'ist',
                            'scharf',
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
                            'es' => [
                                'sentence' => 'El pollo está picante',
                                'correct' => [
                                    'el',
                                    'pollo',
                                    'está',
                                    'picante',
                                ],
                                'extra' => [
                                    'salado',
                                    'arroz',
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
                            'Ein',
                            'salziger',
                            'Reis',
                            'und',
                            'ein',
                            'scharfes',
                            'Hähnchen',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Un arroz salado y un pollo picante',
                                'correct' => [
                                    'un',
                                    'arroz',
                                    'salado',
                                    'y',
                                    'un',
                                    'pollo',
                                    'picante',
                                ],
                                'extra' => [
                                    'demasiado',
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
            $builder->lesson('Lektion 3: Fisch & Teller', 3,
                pictures: [
                    [
                        'de' => 'Fisch',
                        'img' => 'fish',
                    ],
                    [
                        'de' => 'Teller',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'de' => 'kalt',
                    ],
                    [
                        'de' => 'Problem',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Fisch',
                            'ist',
                            'kalt',
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
                            'es' => [
                                'sentence' => 'El pescado está frío',
                                'correct' => [
                                    'el',
                                    'pescado',
                                    'está',
                                    'frío',
                                ],
                                'extra' => [
                                    'problema',
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
                            'Ein',
                            'Problem',
                            'mit',
                            'dem',
                            'Fisch',
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
                            'es' => [
                                'sentence' => 'Un problema con el pescado',
                                'correct' => [
                                    'un',
                                    'problema',
                                    'con',
                                    'el',
                                    'pescado',
                                ],
                                'extra' => [
                                    'frío',
                                    'plato',
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
                            'Ein',
                            'Teller',
                            'und',
                            'ein',
                            'Problem',
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
                            'es' => [
                                'sentence' => 'Un plato y un problema',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'y',
                                    'un',
                                    'problema',
                                ],
                                'extra' => [
                                    'frío',
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
            $builder->lesson('Lektion 4: Glas & Teller', 4,
                pictures: [
                    [
                        'de' => 'Glas',
                        'img' => 'glass',
                    ],
                    [
                        'de' => 'Teller',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'de' => 'sauber',
                    ],
                    [
                        'de' => 'schmutzig',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Glas',
                            'ist',
                            'sauber',
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
                            'es' => [
                                'sentence' => 'El vaso está limpio',
                                'correct' => [
                                    'el',
                                    'vaso',
                                    'está',
                                    'limpio',
                                ],
                                'extra' => [
                                    'sucio',
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
                            'Ein',
                            'schmutziger',
                            'Teller',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Un plato sucio',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'sucio',
                                ],
                                'extra' => [
                                    'limpio',
                                    'vaso',
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
                            'Ein',
                            'sauberes',
                            'Glas',
                            'und',
                            'ein',
                            'schmutziger',
                            'Teller',
                        ],
                        'blank' => 5,
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
                                'extra' => [
                                    'is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un vaso limpio y un plato sucio',
                                'correct' => [
                                    'un',
                                    'vaso',
                                    'limpio',
                                    'y',
                                    'un',
                                    'plato',
                                    'sucio',
                                ],
                                'extra' => [
                                    'está',
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
            $builder->lesson('Lektion 5: Kaffee & Kuchen', 5,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'de' => 'perfekt',
                    ],
                    [
                        'de' => 'Geschmack',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Kaffee',
                            'ist',
                            'perfekt',
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
                            'es' => [
                                'sentence' => 'El café es perfecto',
                                'correct' => [
                                    'el',
                                    'café',
                                    'es',
                                    'perfecto',
                                ],
                                'extra' => [
                                    'sabor',
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
                            'Der',
                            'Geschmack',
                            'ist',
                            'gut',
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
                            'es' => [
                                'sentence' => 'El sabor es bueno',
                                'correct' => [
                                    'el',
                                    'sabor',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'perfecto',
                                    'café',
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
                            'Der',
                            'Geschmack',
                            'des',
                            'Kuchens',
                            'ist',
                            'perfekt',
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
                            'es' => [
                                'sentence' => 'El sabor del pastel es perfecto',
                                'correct' => [
                                    'el',
                                    'sabor',
                                    'de',
                                    'el',
                                    'pastel',
                                    'es',
                                    'perfecto',
                                ],
                                'extra' => [
                                    'café',
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
