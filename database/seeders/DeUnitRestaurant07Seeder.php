<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant07Seeder extends Seeder
{
    private const PICTURES = [
        'Wein' => 'wine',
        'Glas' => 'glass',
        'Saft' => 'juice',
        'Wasser' => 'water',
        'Kaffee' => 'coffee',
        'Tee' => 'tea',
        'Milch' => 'milk',
        'Zucker' => 'sugar',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 7, the German twin of the
     * English "Unit 7: Drinks and Beverages" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Einheit 7: Getränke', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Wein & Glas', 1,
                pictures: [
                    [
                        'de' => 'Wein',
                        'img' => 'wine',
                    ],
                    [
                        'de' => 'Glas',
                        'img' => 'glass',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Flasche',
                    ],
                    [
                        'de' => 'rot',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Glas',
                            'Wein',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a glass of wine',
                                'correct' => [
                                    'a',
                                    'glass',
                                    'of',
                                    'wine',
                                ],
                                'extra' => [
                                    'bottle',
                                    'red',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un vaso de vino',
                                'correct' => [
                                    'un',
                                    'vaso',
                                    'de',
                                    'vino',
                                ],
                                'extra' => [
                                    'botella',
                                    'rojo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un verre de vin',
                                'correct' => [
                                    'un',
                                    'verre',
                                    'de',
                                    'vin',
                                ],
                                'extra' => [
                                    'bouteille',
                                    'rouge',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ワイン一杯',
                                'correct' => [
                                    'ワイン',
                                    '一',
                                    '杯',
                                ],
                                'extra' => [
                                    'ボトル',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '와인 한 잔',
                                'correct' => [
                                    '와인',
                                    '한',
                                    '잔',
                                ],
                                'extra' => [
                                    '병',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'Flasche',
                            'Rotwein',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a bottle of red wine',
                                'correct' => [
                                    'a',
                                    'bottle',
                                    'of',
                                    'red',
                                    'wine',
                                ],
                                'extra' => [
                                    'glass',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una botella de vino tinto',
                                'correct' => [
                                    'una',
                                    'botella',
                                    'de',
                                    'rojo',
                                    'vino',
                                ],
                                'extra' => [
                                    'vaso',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une bouteille de vin rouge',
                                'correct' => [
                                    'une',
                                    'bouteille',
                                    'de',
                                    'vin',
                                    'rouge',
                                ],
                                'extra' => [
                                    'verre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '赤ワインのボトル',
                                'correct' => [
                                    '赤',
                                    'ワイン',
                                    'の',
                                    'ボトル',
                                ],
                                'extra' => [
                                    'グラス',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '레드 와인 한 병',
                                'correct' => [
                                    '레드',
                                    '와인',
                                    '한',
                                    '병',
                                ],
                                'extra' => [
                                    '유리잔',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'rotes',
                            'Glas',
                            'und',
                            'eine',
                            'Flasche',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a red glass and a bottle',
                                'correct' => [
                                    'a',
                                    'red',
                                    'glass',
                                    'and',
                                    'a',
                                    'bottle',
                                ],
                                'extra' => [
                                    'wine',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un vaso rojo y una botella',
                                'correct' => [
                                    'un',
                                    'vaso',
                                    'rojo',
                                    'y',
                                    'una',
                                    'botella',
                                ],
                                'extra' => [
                                    'vino',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un verre rouge et une bouteille',
                                'correct' => [
                                    'un',
                                    'verre',
                                    'rouge',
                                    'et',
                                    'une',
                                    'bouteille',
                                ],
                                'extra' => [
                                    'vin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '赤いグラスとボトル',
                                'correct' => [
                                    '赤い',
                                    'グラス',
                                    'と',
                                    'ボトル',
                                ],
                                'extra' => [
                                    'ワイン',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빨간 유리잔과 병',
                                'correct' => [
                                    '빨간',
                                    '유리잔과',
                                    '병',
                                ],
                                'extra' => [
                                    '와인',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Saft & Wasser', 2,
                pictures: [
                    [
                        'de' => 'Saft',
                        'img' => 'juice',
                    ],
                    [
                        'de' => 'Wasser',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'de' => 'frisch',
                    ],
                    [
                        'de' => 'durstig',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'frischer',
                            'Saft',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a fresh juice',
                                'correct' => [
                                    'a',
                                    'fresh',
                                    'juice',
                                ],
                                'extra' => [
                                    'thirsty',
                                    'water',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un zumo fresco',
                                'correct' => [
                                    'un',
                                    'zumo',
                                    'fresco',
                                ],
                                'extra' => [
                                    'sediento',
                                    'agua',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un jus frais',
                                'correct' => [
                                    'un',
                                    'jus',
                                    'frais',
                                ],
                                'extra' => [
                                    'assoiffé',
                                    'eau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '新鮮なジュース',
                                'correct' => [
                                    '新鮮な',
                                    'ジュース',
                                ],
                                'extra' => [
                                    'のどが渇いた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '신선한 주스',
                                'correct' => [
                                    '신선한',
                                    '주스',
                                ],
                                'extra' => [
                                    '목마른',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'bin',
                            'durstig',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am thirsty',
                                'correct' => [
                                    'I am',
                                    'thirsty',
                                ],
                                'extra' => [
                                    'fresh',
                                    'juice',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Tengo sed',
                                'correct' => [
                                    'soy',
                                    'sediento',
                                ],
                                'extra' => [
                                    'fresco',
                                    'zumo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai soif',
                                'correct' => [
                                    'je suis',
                                    'assoiffé',
                                ],
                                'extra' => [
                                    'frais',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'のどが渇いています',
                                'correct' => [
                                    'のどが',
                                    '渇いています',
                                ],
                                'extra' => [
                                    '新鮮',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '목이 마릅니다',
                                'correct' => [
                                    '목이',
                                    '마릅니다',
                                ],
                                'extra' => [
                                    '신선한',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Saft',
                            'und',
                            'ein',
                            'Wasser',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a juice and a water',
                                'correct' => [
                                    'a',
                                    'juice',
                                    'and',
                                    'a',
                                    'water',
                                ],
                                'extra' => [
                                    'fresh',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un zumo y un agua',
                                'correct' => [
                                    'un',
                                    'zumo',
                                    'y',
                                    'un',
                                    'agua',
                                ],
                                'extra' => [
                                    'fresco',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un jus et une eau',
                                'correct' => [
                                    'un',
                                    'jus',
                                    'et',
                                    'une',
                                    'eau',
                                ],
                                'extra' => [
                                    'frais',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ジュースと水',
                                'correct' => [
                                    'ジュース',
                                    'と',
                                    '水',
                                ],
                                'extra' => [
                                    '新鮮',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스와 물',
                                'correct' => [
                                    '주스와',
                                    '물',
                                ],
                                'extra' => [
                                    '신선한',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Kaffee & Tee', 3,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Tee',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Bier',
                    ],
                    [
                        'de' => 'trinken',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'ein',
                            'Bier',
                            'trinken',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to drink a beer',
                                'correct' => [
                                    'I would like',
                                    'to',
                                    'drink',
                                    'a',
                                    'beer',
                                ],
                                'extra' => [
                                    'tea',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera beber una cerveza',
                                'correct' => [
                                    'quisiera',
                                    'a',
                                    'beber',
                                    'una',
                                    'cerveza',
                                ],
                                'extra' => [
                                    'té',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais boire une bière',
                                'correct' => [
                                    'je voudrais',
                                    'à',
                                    'boire',
                                    'une',
                                    'bière',
                                ],
                                'extra' => [
                                    'thé',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ビールを飲みたいです',
                                'correct' => [
                                    'ビール',
                                    'を',
                                    '飲み',
                                    'たいです',
                                ],
                                'extra' => [
                                    'お茶',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '맥주를 마시고 싶습니다',
                                'correct' => [
                                    '맥주를',
                                    '마시고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '차',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'Kaffee',
                            'oder',
                            'ein',
                            'Tee',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee or a tea',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'or',
                                    'a',
                                    'tea',
                                ],
                                'extra' => [
                                    'beer',
                                    'drink',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un café o un té',
                                'correct' => [
                                    'un',
                                    'café',
                                    'o',
                                    'un',
                                    'té',
                                ],
                                'extra' => [
                                    'cerveza',
                                    'beber',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café ou un thé',
                                'correct' => [
                                    'un',
                                    'café',
                                    'ou',
                                    'un',
                                    'thé',
                                ],
                                'extra' => [
                                    'bière',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'コーヒーかお茶',
                                'correct' => [
                                    'コーヒー',
                                    'か',
                                    'お茶',
                                ],
                                'extra' => [
                                    'ビール',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피 또는 차',
                                'correct' => [
                                    '커피',
                                    '또는',
                                    '차',
                                ],
                                'extra' => [
                                    '맥주',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Einen',
                            'heißen',
                            'Kaffee',
                            'trinken',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'drink a hot coffee',
                                'correct' => [
                                    'drink',
                                    'a',
                                    'hot',
                                    'coffee',
                                ],
                                'extra' => [
                                    'beer',
                                    'tea',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Beber un café caliente',
                                'correct' => [
                                    'beber',
                                    'un',
                                    'café',
                                    'caliente',
                                ],
                                'extra' => [
                                    'cerveza',
                                    'té',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Boire un café chaud',
                                'correct' => [
                                    'boire',
                                    'un',
                                    'café',
                                    'chaud',
                                ],
                                'extra' => [
                                    'bière',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '熱いコーヒーを飲む',
                                'correct' => [
                                    '熱い',
                                    'コーヒー',
                                    'を',
                                    '飲む',
                                ],
                                'extra' => [
                                    'ビール',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '뜨거운 커피를 마시다',
                                'correct' => [
                                    '뜨거운',
                                    '커피를',
                                    '마시다',
                                ],
                                'extra' => [
                                    '맥주',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Milch & Zucker', 4,
                pictures: [
                    [
                        'de' => 'Milch',
                        'img' => 'milk',
                    ],
                    [
                        'de' => 'Zucker',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Eiswürfel',
                    ],
                    [
                        'de' => 'süß',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Kaffee',
                            'mit',
                            'Eiswürfeln',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee with ice',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'with',
                                    'ice',
                                ],
                                'extra' => [
                                    'sweet',
                                    'sugar',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un café con hielo',
                                'correct' => [
                                    'un',
                                    'café',
                                    'con',
                                    'hielo',
                                ],
                                'extra' => [
                                    'dulce',
                                    'azúcar',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café avec des glaçons',
                                'correct' => [
                                    'un',
                                    'café',
                                    'avec',
                                    'glaçons',
                                ],
                                'extra' => [
                                    'sucré',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '氷入りのコーヒー',
                                'correct' => [
                                    '氷',
                                    '入り',
                                    'の',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    '甘い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '얼음이 든 커피',
                                'correct' => [
                                    '얼음이',
                                    '든',
                                    '커피',
                                ],
                                'extra' => [
                                    '단',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Die',
                            'Milch',
                            'ist',
                            'süß',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the milk is sweet',
                                'correct' => [
                                    'the',
                                    'milk',
                                    'is',
                                    'sweet',
                                ],
                                'extra' => [
                                    'ice',
                                    'sugar',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La leche es dulce',
                                'correct' => [
                                    'la',
                                    'leche',
                                    'es',
                                    'dulce',
                                ],
                                'extra' => [
                                    'hielo',
                                    'azúcar',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le lait est sucré',
                                'correct' => [
                                    'le',
                                    'lait',
                                    'est',
                                    'sucré',
                                ],
                                'extra' => [
                                    'glaçons',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '牛乳は甘いです',
                                'correct' => [
                                    '牛乳',
                                    'は',
                                    '甘い',
                                    'です',
                                ],
                                'extra' => [
                                    '氷',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유는 답니다',
                                'correct' => [
                                    '우유는',
                                    '답니다',
                                ],
                                'extra' => [
                                    '얼음',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Etwas',
                            'Zucker',
                            'und',
                            'etwas',
                            'Eis',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some sugar and some ice',
                                'correct' => [
                                    'some',
                                    'sugar',
                                    'and',
                                    'some',
                                    'ice',
                                ],
                                'extra' => [
                                    'sweet',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Algo de azúcar y algo de hielo',
                                'correct' => [
                                    'algo de',
                                    'azúcar',
                                    'y',
                                    'algo de',
                                    'hielo',
                                ],
                                'extra' => [
                                    'dulce',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du sucre et des glaçons',
                                'correct' => [
                                    'du',
                                    'sucre',
                                    'et',
                                    'du',
                                    'glaçons',
                                ],
                                'extra' => [
                                    'sucré',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '砂糖と氷',
                                'correct' => [
                                    '砂糖',
                                    'と',
                                    '氷',
                                ],
                                'extra' => [
                                    '甘い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '약간의 설탕과 얼음',
                                'correct' => [
                                    '약간의',
                                    '설탕과',
                                    '얼음',
                                ],
                                'extra' => [
                                    '단',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Wasser & Wein', 5,
                pictures: [
                    [
                        'de' => 'Wasser',
                        'img' => 'water',
                    ],
                    [
                        'de' => 'Wein',
                        'img' => 'wine',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bringen',
                    ],
                    [
                        'de' => 'noch ein',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Noch',
                            'einen',
                            'Wein',
                            'bringen',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to bring another wine',
                                'correct' => [
                                    'to bring',
                                    'another',
                                    'wine',
                                ],
                                'extra' => [
                                    'water',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Traer otro vino',
                                'correct' => [
                                    'traer',
                                    'otro',
                                    'vino',
                                ],
                                'extra' => [
                                    'agua',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Apporter encore un vin',
                                'correct' => [
                                    'apporter',
                                    'encore',
                                    'vin',
                                ],
                                'extra' => [
                                    'eau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ワインをもう一つ持ってくる',
                                'correct' => [
                                    'ワイン',
                                    'を',
                                    'もう一つ',
                                    '持ってくる',
                                ],
                                'extra' => [
                                    '水',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '와인 하나 더 가져오다',
                                'correct' => [
                                    '와인',
                                    '하나',
                                    '더',
                                    '가져오다',
                                ],
                                'extra' => [
                                    '물',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'Wasser',
                            'bringen',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to bring a water',
                                'correct' => [
                                    'to bring',
                                    'a',
                                    'water',
                                ],
                                'extra' => [
                                    'another',
                                    'wine',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Traer un agua',
                                'correct' => [
                                    'traer',
                                    'un',
                                    'agua',
                                ],
                                'extra' => [
                                    'otro',
                                    'vino',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Apporter une eau',
                                'correct' => [
                                    'apporter',
                                    'une',
                                    'eau',
                                ],
                                'extra' => [
                                    'encore',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '水を持ってくる',
                                'correct' => [
                                    '水',
                                    'を',
                                    '持ってくる',
                                ],
                                'extra' => [
                                    'もう一つの',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '물을 가져오다',
                                'correct' => [
                                    '물을',
                                    '가져오다',
                                ],
                                'extra' => [
                                    '하나 더',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Noch',
                            'ein',
                            'Glas',
                            'Wein',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'another glass of wine',
                                'correct' => [
                                    'another',
                                    'glass',
                                    'of',
                                    'wine',
                                ],
                                'extra' => [
                                    'water',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Otro vaso de vino',
                                'correct' => [
                                    'otro',
                                    'vaso',
                                    'de',
                                    'vino',
                                ],
                                'extra' => [
                                    'agua',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Encore un verre de vin',
                                'correct' => [
                                    'encore',
                                    'verre',
                                    'de',
                                    'vin',
                                ],
                                'extra' => [
                                    'eau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ワインをもう一杯',
                                'correct' => [
                                    'ワイン',
                                    'を',
                                    'もう',
                                    '一',
                                    '杯',
                                ],
                                'extra' => [
                                    '水',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '와인 한 잔 더',
                                'correct' => [
                                    '와인',
                                    '한',
                                    '잔',
                                    '더',
                                ],
                                'extra' => [
                                    '물',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
