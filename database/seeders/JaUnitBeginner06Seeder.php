<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner06Seeder extends Seeder
{
    private const PICTURES = [
        '食べる' => 'eat',
        '飲む' => 'drink',
        '歩く' => 'walk',
        '話す' => 'speak',
        '眠る' => 'sleep',
        '水' => 'water',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 6, the Japanese twin of the
     * English "Unit 6: Everyday Verbs" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'ユニット6: 日常の動詞', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 食べる・飲む', 1,
                pictures: [
                    [
                        'ja' => '食べる',
                        'img' => 'eat',
                    ],
                    [
                        'ja' => '飲む',
                        'img' => 'drink',
                    ],
                ],
                plain: [
                    [
                        'ja' => '水',
                    ],
                    [
                        'ja' => '一緒に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'パン',
                            'を',
                            '食べる',
                        ],
                        'blank' => 4,
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
                            '私',
                            'は',
                            '水',
                            'を',
                            '飲む',
                        ],
                        'blank' => 4,
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
                            '一緒に',
                            '食べて',
                            '飲む',
                        ],
                        'blank' => 2,
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
            $builder->lesson('レッスン2: 歩く・話す', 2,
                pictures: [
                    [
                        'ja' => '歩く',
                        'img' => 'walk',
                    ],
                    [
                        'ja' => '話す',
                        'img' => 'speak',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'ゆっくり',
                    ],
                    [
                        'ja' => '今',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'ゆっくり',
                            '歩く',
                        ],
                        'blank' => 3,
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
                            '今',
                            '話す',
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
                            'ゆっくり',
                            '歩いて',
                            '話す',
                        ],
                        'blank' => 2,
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
            $builder->lesson('レッスン3: 眠る・食べる', 3,
                pictures: [
                    [
                        'ja' => '眠る',
                        'img' => 'sleep',
                    ],
                    [
                        'ja' => '食べる',
                        'img' => 'eat',
                    ],
                ],
                plain: [
                    [
                        'ja' => '元気',
                    ],
                    [
                        'ja' => '今',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'よく',
                            '眠る',
                        ],
                        'blank' => 3,
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
                            '今',
                            '食べる',
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
                            'よく',
                            '眠って',
                            '食べる',
                        ],
                        'blank' => 2,
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
            $builder->lesson('レッスン4: 食べる・飲む', 4,
                pictures: [
                    [
                        'ja' => '食べる',
                        'img' => 'eat',
                    ],
                    [
                        'ja' => '飲む',
                        'img' => 'drink',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'すぎます',
                    ],
                    [
                        'ja' => '読む',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '食べすぎる',
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
                            '私',
                            'は',
                            '今',
                            '読む',
                        ],
                        'blank' => 3,
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
                            '飲んで',
                            '読む',
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
            $builder->lesson('レッスン5: 歩く・眠る', 5,
                pictures: [
                    [
                        'ja' => '歩く',
                        'img' => 'walk',
                    ],
                    [
                        'ja' => '眠る',
                        'img' => 'sleep',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'ゆっくり',
                    ],
                    [
                        'ja' => '今',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ゆっくり',
                            '歩く',
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
                            '今',
                            '眠る',
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
                            '私',
                            'は',
                            '今',
                            'ゆっくり',
                            '歩く',
                        ],
                        'blank' => 4,
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
