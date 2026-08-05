<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner06Seeder extends Seeder
{
    private const PICTURES = [
        'comer' => 'eat',
        'beber' => 'drink',
        'caminar' => 'walk',
        'hablar' => 'speak',
        'dormir' => 'sleep',
        'agua' => 'water',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 6, the Spanish twin of the
     * English "Unit 6: Everyday Verbs" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unidad 6: Verbos cotidianos', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Comer y Beber', 1,
                pictures: [
                    [
                        'es' => 'comer',
                        'img' => 'eat',
                    ],
                    [
                        'es' => 'beber',
                        'img' => 'drink',
                    ],
                ],
                plain: [
                    [
                        'es' => 'agua',
                    ],
                    [
                        'es' => 'juntos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Yo',
                            'como',
                            'pan',
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
                            'de' => [
                                'sentence' => 'Ich esse Brot',
                                'correct' => [
                                    'ich',
                                    'essen',
                                    'Brot',
                                ],
                                'extra' => [
                                    'trinken',
                                    'Wasser',
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
                            'Yo',
                            'bebo',
                            'agua',
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
                            'de' => [
                                'sentence' => 'Ich trinke Wasser',
                                'correct' => [
                                    'ich',
                                    'trinken',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'essen',
                                    'Brot',
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
                            'Comer',
                            'y',
                            'beber',
                            'juntos',
                        ],
                        'blank' => 3,
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
                            'de' => [
                                'sentence' => 'Zusammen essen und trinken',
                                'correct' => [
                                    'zusammen',
                                    'essen',
                                    'und',
                                    'trinken',
                                ],
                                'extra' => [
                                    'Wasser',
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
            $builder->lesson('Lección 2: Caminar y Hablar', 2,
                pictures: [
                    [
                        'es' => 'caminar',
                        'img' => 'walk',
                    ],
                    [
                        'es' => 'hablar',
                        'img' => 'speak',
                    ],
                ],
                plain: [
                    [
                        'es' => 'despacio',
                    ],
                    [
                        'es' => 'ahora',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Yo',
                            'camino',
                            'despacio',
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
                            'de' => [
                                'sentence' => 'Ich gehe langsam',
                                'correct' => [
                                    'ich',
                                    'gehen',
                                    'langsam',
                                ],
                                'extra' => [
                                    'sprechen',
                                    'jetzt',
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
                            'Habla',
                            'ahora',
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
                            'de' => [
                                'sentence' => 'Sprich jetzt',
                                'correct' => [
                                    'sprechen',
                                    'jetzt',
                                ],
                                'extra' => [
                                    'gehen',
                                    'langsam',
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
                            'Camina',
                            'y',
                            'habla',
                            'despacio',
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
                            'de' => [
                                'sentence' => 'Geh und sprich langsam',
                                'correct' => [
                                    'gehen',
                                    'und',
                                    'sprechen',
                                    'langsam',
                                ],
                                'extra' => [
                                    'jetzt',
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
            $builder->lesson('Lección 3: Dormir y Comer', 3,
                pictures: [
                    [
                        'es' => 'dormir',
                        'img' => 'sleep',
                    ],
                    [
                        'es' => 'comer',
                        'img' => 'eat',
                    ],
                ],
                plain: [
                    [
                        'es' => 'bien',
                    ],
                    [
                        'es' => 'ahora',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Yo',
                            'duermo',
                            'bien',
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
                            'de' => [
                                'sentence' => 'Ich schlafe gut',
                                'correct' => [
                                    'ich',
                                    'schlafen',
                                    'gut',
                                ],
                                'extra' => [
                                    'essen',
                                    'jetzt',
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
                            'Come',
                            'ahora',
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
                            'de' => [
                                'sentence' => 'Iss jetzt',
                                'correct' => [
                                    'essen',
                                    'jetzt',
                                ],
                                'extra' => [
                                    'schlafen',
                                    'gut',
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
                            'Duerme',
                            'y',
                            'come',
                            'bien',
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
                            'de' => [
                                'sentence' => 'Schlaf und iss gut',
                                'correct' => [
                                    'schlafen',
                                    'und',
                                    'essen',
                                    'gut',
                                ],
                                'extra' => [
                                    'jetzt',
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
            $builder->lesson('Lección 4: Comer y Beber', 4,
                pictures: [
                    [
                        'es' => 'comer',
                        'img' => 'eat',
                    ],
                    [
                        'es' => 'beber',
                        'img' => 'drink',
                    ],
                ],
                plain: [
                    [
                        'es' => 'demasiado',
                    ],
                    [
                        'es' => 'leer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Yo',
                            'como',
                            'demasiado',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Ich esse zu viel',
                                'correct' => [
                                    'ich',
                                    'essen',
                                    'zu viel',
                                ],
                                'extra' => [
                                    'trinken',
                                    'lesen',
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
                            'Yo',
                            'leo',
                            'ahora',
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
                            'de' => [
                                'sentence' => 'Ich lese jetzt',
                                'correct' => [
                                    'ich',
                                    'lesen',
                                    'jetzt',
                                ],
                                'extra' => [
                                    'essen',
                                    'zu viel',
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
                            'Beber',
                            'y',
                            'leer',
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
                            'de' => [
                                'sentence' => 'Trinken und lesen',
                                'correct' => [
                                    'trinken',
                                    'und',
                                    'lesen',
                                ],
                                'extra' => [
                                    'zu viel',
                                    'essen',
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
            $builder->lesson('Lección 5: Caminar y Dormir', 5,
                pictures: [
                    [
                        'es' => 'caminar',
                        'img' => 'walk',
                    ],
                    [
                        'es' => 'dormir',
                        'img' => 'sleep',
                    ],
                ],
                plain: [
                    [
                        'es' => 'despacio',
                    ],
                    [
                        'es' => 'ahora',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Camina',
                            'despacio',
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
                            'de' => [
                                'sentence' => 'Geh langsam',
                                'correct' => [
                                    'gehen',
                                    'langsam',
                                ],
                                'extra' => [
                                    'schlafen',
                                    'jetzt',
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
                            'Duerme',
                            'ahora',
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
                            'de' => [
                                'sentence' => 'Schlaf jetzt',
                                'correct' => [
                                    'schlafen',
                                    'jetzt',
                                ],
                                'extra' => [
                                    'gehen',
                                    'langsam',
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
                            'Yo',
                            'camino',
                            'despacio',
                            'ahora',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Ich gehe jetzt langsam',
                                'correct' => [
                                    'ich',
                                    'gehen',
                                    'langsam',
                                    'jetzt',
                                ],
                                'extra' => [
                                    'schlafen',
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
