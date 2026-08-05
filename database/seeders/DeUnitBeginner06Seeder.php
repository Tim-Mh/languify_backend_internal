<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner06Seeder extends Seeder
{
    private const PICTURES = [
        'essen' => 'eat',
        'trinken' => 'drink',
        'gehen' => 'walk',
        'sprechen' => 'speak',
        'schlafen' => 'sleep',
        'Wasser' => 'water',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 6, the German twin of the
     * English "Unit 6: Everyday Verbs" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Einheit 6: Alltagsverben', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Essen & Trinken', 1,
                pictures: [
                    [
                        'de' => 'essen',
                        'img' => 'eat',
                    ],
                    [
                        'de' => 'trinken',
                        'img' => 'drink',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Wasser',
                    ],
                    [
                        'de' => 'zusammen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'esse',
                            'Brot',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I eat bread',
                                'correct' => [
                                    'I',
                                    'eat',
                                    'bread',
                                ],
                                'extra' => [
                                    'drink',
                                    'water',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Yo como pan',
                                'correct' => [
                                    'yo',
                                    'comer',
                                    'pan',
                                ],
                                'extra' => [
                                    'beber',
                                    'agua',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je mange du pain',
                                'correct' => [
                                    'je',
                                    'manger',
                                    'pain',
                                ],
                                'extra' => [
                                    'boire',
                                    'eau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はパンを食べる',
                                'correct' => [
                                    '私',
                                    'は',
                                    'パン',
                                    'を',
                                    '食べる',
                                ],
                                'extra' => [
                                    '飲む',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 빵을 먹는다',
                                'correct' => [
                                    '나는',
                                    '빵을',
                                    '먹는다',
                                ],
                                'extra' => [
                                    '마시다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'trinke',
                            'Wasser',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I drink water',
                                'correct' => [
                                    'I',
                                    'drink',
                                    'water',
                                ],
                                'extra' => [
                                    'eat',
                                    'bread',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Yo bebo agua',
                                'correct' => [
                                    'yo',
                                    'beber',
                                    'agua',
                                ],
                                'extra' => [
                                    'comer',
                                    'pan',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je bois de l\'eau',
                                'correct' => [
                                    'je',
                                    'boire',
                                    'eau',
                                ],
                                'extra' => [
                                    'manger',
                                    'pain',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は水を飲む',
                                'correct' => [
                                    '私',
                                    'は',
                                    '水',
                                    'を',
                                    '飲む',
                                ],
                                'extra' => [
                                    '食べる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 물을 마신다',
                                'correct' => [
                                    '나는',
                                    '물을',
                                    '마신다',
                                ],
                                'extra' => [
                                    '먹다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Zusammen',
                            'essen',
                            'und',
                            'trinken',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'eat and drink together',
                                'correct' => [
                                    'eat',
                                    'and',
                                    'drink',
                                    'together',
                                ],
                                'extra' => [
                                    'water',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Comer y beber juntos',
                                'correct' => [
                                    'comer',
                                    'y',
                                    'beber',
                                    'juntos',
                                ],
                                'extra' => [
                                    'agua',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Manger et boire ensemble',
                                'correct' => [
                                    'manger',
                                    'et',
                                    'boire',
                                    'ensemble',
                                ],
                                'extra' => [
                                    'eau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '一緒に食べて飲む',
                                'correct' => [
                                    '一緒に',
                                    '食べて',
                                    '飲む',
                                ],
                                'extra' => [
                                    '水',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '함께 먹고 마시다',
                                'correct' => [
                                    '함께',
                                    '먹고',
                                    '마시다',
                                ],
                                'extra' => [
                                    '물',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Gehen & Sprechen', 2,
                pictures: [
                    [
                        'de' => 'gehen',
                        'img' => 'walk',
                    ],
                    [
                        'de' => 'sprechen',
                        'img' => 'speak',
                    ],
                ],
                plain: [
                    [
                        'de' => 'langsam',
                    ],
                    [
                        'de' => 'jetzt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'gehe',
                            'langsam',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I walk slowly',
                                'correct' => [
                                    'I',
                                    'walk',
                                    'slowly',
                                ],
                                'extra' => [
                                    'speak',
                                    'now',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Yo camino despacio',
                                'correct' => [
                                    'yo',
                                    'caminar',
                                    'despacio',
                                ],
                                'extra' => [
                                    'hablar',
                                    'ahora',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je marche lentement',
                                'correct' => [
                                    'je',
                                    'marcher',
                                    'lentement',
                                ],
                                'extra' => [
                                    'parler',
                                    'maintenant',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はゆっくり歩く',
                                'correct' => [
                                    '私',
                                    'は',
                                    'ゆっくり',
                                    '歩く',
                                ],
                                'extra' => [
                                    '話す',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 천천히 걷는다',
                                'correct' => [
                                    '나는',
                                    '천천히',
                                    '걷는다',
                                ],
                                'extra' => [
                                    '말하다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Sprich',
                            'jetzt',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'speak now',
                                'correct' => [
                                    'speak',
                                    'now',
                                ],
                                'extra' => [
                                    'walk',
                                    'slowly',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Habla ahora',
                                'correct' => [
                                    'hablar',
                                    'ahora',
                                ],
                                'extra' => [
                                    'caminar',
                                    'despacio',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Parle maintenant',
                                'correct' => [
                                    'parler',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'marcher',
                                    'lentement',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今話す',
                                'correct' => [
                                    '今',
                                    '話す',
                                ],
                                'extra' => [
                                    '歩く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '지금 말하다',
                                'correct' => [
                                    '지금',
                                    '말하다',
                                ],
                                'extra' => [
                                    '걷다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Geh',
                            'und',
                            'sprich',
                            'langsam',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'walk and speak slowly',
                                'correct' => [
                                    'walk',
                                    'and',
                                    'speak',
                                    'slowly',
                                ],
                                'extra' => [
                                    'now',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Camina y habla despacio',
                                'correct' => [
                                    'caminar',
                                    'y',
                                    'hablar',
                                    'despacio',
                                ],
                                'extra' => [
                                    'ahora',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Marche et parle lentement',
                                'correct' => [
                                    'marcher',
                                    'et',
                                    'parler',
                                    'lentement',
                                ],
                                'extra' => [
                                    'maintenant',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ゆっくり歩いて話す',
                                'correct' => [
                                    'ゆっくり',
                                    '歩いて',
                                    '話す',
                                ],
                                'extra' => [
                                    '今',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '천천히 걷고 말하다',
                                'correct' => [
                                    '천천히',
                                    '걷고',
                                    '말하다',
                                ],
                                'extra' => [
                                    '지금',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Schlafen & Essen', 3,
                pictures: [
                    [
                        'de' => 'schlafen',
                        'img' => 'sleep',
                    ],
                    [
                        'de' => 'essen',
                        'img' => 'eat',
                    ],
                ],
                plain: [
                    [
                        'de' => 'gut',
                    ],
                    [
                        'de' => 'jetzt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'schlafe',
                            'gut',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I sleep well',
                                'correct' => [
                                    'I',
                                    'sleep',
                                    'well',
                                ],
                                'extra' => [
                                    'eat',
                                    'now',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Yo duermo bien',
                                'correct' => [
                                    'yo',
                                    'dormir',
                                    'bien',
                                ],
                                'extra' => [
                                    'comer',
                                    'ahora',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je dors bien',
                                'correct' => [
                                    'je',
                                    'dormir',
                                    'bien',
                                ],
                                'extra' => [
                                    'manger',
                                    'maintenant',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はよく眠る',
                                'correct' => [
                                    '私',
                                    'は',
                                    'よく',
                                    '眠る',
                                ],
                                'extra' => [
                                    '食べる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 잘 잔다',
                                'correct' => [
                                    '나는',
                                    '잘',
                                    '잔다',
                                ],
                                'extra' => [
                                    '먹다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Iss',
                            'jetzt',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'eat now',
                                'correct' => [
                                    'eat',
                                    'now',
                                ],
                                'extra' => [
                                    'sleep',
                                    'well',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Come ahora',
                                'correct' => [
                                    'comer',
                                    'ahora',
                                ],
                                'extra' => [
                                    'dormir',
                                    'bien',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mange maintenant',
                                'correct' => [
                                    'manger',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'dormir',
                                    'bien',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今食べる',
                                'correct' => [
                                    '今',
                                    '食べる',
                                ],
                                'extra' => [
                                    '眠る',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '지금 먹다',
                                'correct' => [
                                    '지금',
                                    '먹다',
                                ],
                                'extra' => [
                                    '자다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Schlaf',
                            'und',
                            'iss',
                            'gut',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'sleep and eat well',
                                'correct' => [
                                    'sleep',
                                    'and',
                                    'eat',
                                    'well',
                                ],
                                'extra' => [
                                    'now',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Duerme y come bien',
                                'correct' => [
                                    'dormir',
                                    'y',
                                    'comer',
                                    'bien',
                                ],
                                'extra' => [
                                    'ahora',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Dors et mange bien',
                                'correct' => [
                                    'dormir',
                                    'et',
                                    'manger',
                                    'bien',
                                ],
                                'extra' => [
                                    'maintenant',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'よく眠って食べる',
                                'correct' => [
                                    'よく',
                                    '眠って',
                                    '食べる',
                                ],
                                'extra' => [
                                    '今',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '잘 자고 먹다',
                                'correct' => [
                                    '잘',
                                    '자고',
                                    '먹다',
                                ],
                                'extra' => [
                                    '지금',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Essen & Trinken', 4,
                pictures: [
                    [
                        'de' => 'essen',
                        'img' => 'eat',
                    ],
                    [
                        'de' => 'trinken',
                        'img' => 'drink',
                    ],
                ],
                plain: [
                    [
                        'de' => 'zu viel',
                    ],
                    [
                        'de' => 'lesen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'esse',
                            'zu',
                            'viel',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I eat too much',
                                'correct' => [
                                    'I',
                                    'eat',
                                    'too much',
                                ],
                                'extra' => [
                                    'drink',
                                    'read',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Yo como demasiado',
                                'correct' => [
                                    'yo',
                                    'comer',
                                    'demasiado',
                                ],
                                'extra' => [
                                    'beber',
                                    'leer',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je mange trop',
                                'correct' => [
                                    'je',
                                    'manger',
                                    'trop',
                                ],
                                'extra' => [
                                    'boire',
                                    'lire',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は食べすぎる',
                                'correct' => [
                                    '私',
                                    'は',
                                    '食べすぎる',
                                ],
                                'extra' => [
                                    '飲む',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 너무 많이 먹는다',
                                'correct' => [
                                    '나는',
                                    '너무',
                                    '많이',
                                    '먹는다',
                                ],
                                'extra' => [
                                    '마시다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'lese',
                            'jetzt',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I read now',
                                'correct' => [
                                    'I',
                                    'read',
                                    'now',
                                ],
                                'extra' => [
                                    'eat',
                                    'too much',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Yo leo ahora',
                                'correct' => [
                                    'yo',
                                    'leer',
                                    'ahora',
                                ],
                                'extra' => [
                                    'comer',
                                    'demasiado',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je lis maintenant',
                                'correct' => [
                                    'je',
                                    'lire',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'manger',
                                    'trop',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は今読む',
                                'correct' => [
                                    '私',
                                    'は',
                                    '今',
                                    '読む',
                                ],
                                'extra' => [
                                    '食べる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 지금 읽는다',
                                'correct' => [
                                    '나는',
                                    '지금',
                                    '읽는다',
                                ],
                                'extra' => [
                                    '먹다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Trinken',
                            'und',
                            'lesen',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'drink and read',
                                'correct' => [
                                    'drink',
                                    'and',
                                    'read',
                                ],
                                'extra' => [
                                    'too much',
                                    'eat',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Beber y leer',
                                'correct' => [
                                    'beber',
                                    'y',
                                    'leer',
                                ],
                                'extra' => [
                                    'demasiado',
                                    'comer',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Boire et lire',
                                'correct' => [
                                    'boire',
                                    'et',
                                    'lire',
                                ],
                                'extra' => [
                                    'trop',
                                    'manger',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '飲んで読む',
                                'correct' => [
                                    '飲んで',
                                    '読む',
                                ],
                                'extra' => [
                                    'すぎます',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '마시고 읽다',
                                'correct' => [
                                    '마시고',
                                    '읽다',
                                ],
                                'extra' => [
                                    '너무',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Gehen & Schlafen', 5,
                pictures: [
                    [
                        'de' => 'gehen',
                        'img' => 'walk',
                    ],
                    [
                        'de' => 'schlafen',
                        'img' => 'sleep',
                    ],
                ],
                plain: [
                    [
                        'de' => 'langsam',
                    ],
                    [
                        'de' => 'jetzt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Geh',
                            'langsam',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'walk slowly',
                                'correct' => [
                                    'walk',
                                    'slowly',
                                ],
                                'extra' => [
                                    'sleep',
                                    'now',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Camina despacio',
                                'correct' => [
                                    'caminar',
                                    'despacio',
                                ],
                                'extra' => [
                                    'dormir',
                                    'ahora',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Marche lentement',
                                'correct' => [
                                    'marcher',
                                    'lentement',
                                ],
                                'extra' => [
                                    'dormir',
                                    'maintenant',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ゆっくり歩く',
                                'correct' => [
                                    'ゆっくり',
                                    '歩く',
                                ],
                                'extra' => [
                                    '眠る',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '천천히 걷다',
                                'correct' => [
                                    '천천히',
                                    '걷다',
                                ],
                                'extra' => [
                                    '자다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Schlaf',
                            'jetzt',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'sleep now',
                                'correct' => [
                                    'sleep',
                                    'now',
                                ],
                                'extra' => [
                                    'walk',
                                    'slowly',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Duerme ahora',
                                'correct' => [
                                    'dormir',
                                    'ahora',
                                ],
                                'extra' => [
                                    'caminar',
                                    'despacio',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Dors maintenant',
                                'correct' => [
                                    'dormir',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'marcher',
                                    'lentement',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今眠る',
                                'correct' => [
                                    '今',
                                    '眠る',
                                ],
                                'extra' => [
                                    '歩く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '지금 자다',
                                'correct' => [
                                    '지금',
                                    '자다',
                                ],
                                'extra' => [
                                    '걷다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ich',
                            'gehe',
                            'jetzt',
                            'langsam',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I walk slowly now',
                                'correct' => [
                                    'I',
                                    'walk',
                                    'slowly',
                                    'now',
                                ],
                                'extra' => [
                                    'sleep',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Yo camino despacio ahora',
                                'correct' => [
                                    'yo',
                                    'caminar',
                                    'despacio',
                                    'ahora',
                                ],
                                'extra' => [
                                    'dormir',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je marche lentement maintenant',
                                'correct' => [
                                    'je',
                                    'marcher',
                                    'lentement',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'dormir',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は今ゆっくり歩く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '今',
                                    'ゆっくり',
                                    '歩く',
                                ],
                                'extra' => [
                                    '眠る',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 지금 천천히 걷는다',
                                'correct' => [
                                    '나는',
                                    '지금',
                                    '천천히',
                                    '걷는다',
                                ],
                                'extra' => [
                                    '자다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
