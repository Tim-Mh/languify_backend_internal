<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant07Seeder extends Seeder
{
    private const PICTURES = [
        'ワイン' => 'wine',
        'グラス' => 'glass',
        'ジュース' => 'juice',
        '水' => 'water',
        'コーヒー' => 'coffee',
        'お茶' => 'tea',
        '牛乳' => 'milk',
        '砂糖' => 'sugar',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 7, the Japanese twin of the
     * English "Unit 7: Drinks and Beverages" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'ユニット7: 飲み物', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: ワイン・グラス', 1,
                pictures: [
                    [
                        'ja' => 'ワイン',
                        'img' => 'wine',
                    ],
                    [
                        'ja' => 'グラス',
                        'img' => 'glass',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'ボトル',
                    ],
                    [
                        'ja' => '赤',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ワイン',
                            '一',
                            '杯',
                        ],
                        'blank' => 0,
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
                            'de' => [
                                'sentence' => 'Ein Glas Wein',
                                'correct' => [
                                    'ein',
                                    'Glas',
                                    'von',
                                    'Wein',
                                ],
                                'extra' => [
                                    'Flasche',
                                    'rot',
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
                            '赤',
                            'ワイン',
                            'の',
                            'ボトル',
                        ],
                        'blank' => 3,
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
                            'de' => [
                                'sentence' => 'Eine Flasche Rotwein',
                                'correct' => [
                                    'eine',
                                    'Flasche',
                                    'von',
                                    'rot',
                                    'Wein',
                                ],
                                'extra' => [
                                    'Glas',
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
                            '赤い',
                            'グラス',
                            'と',
                            'ボトル',
                        ],
                        'blank' => 3,
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
                            'de' => [
                                'sentence' => 'Ein rotes Glas und eine Flasche',
                                'correct' => [
                                    'ein',
                                    'rot',
                                    'Glas',
                                    'und',
                                    'eine',
                                    'Flasche',
                                ],
                                'extra' => [
                                    'Wein',
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
            $builder->lesson('レッスン2: ジュース・水', 2,
                pictures: [
                    [
                        'ja' => 'ジュース',
                        'img' => 'juice',
                    ],
                    [
                        'ja' => '水',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'ja' => '新鮮',
                    ],
                    [
                        'ja' => 'のどが渇いた',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '新鮮な',
                            'ジュース',
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
                            'de' => [
                                'sentence' => 'Ein frischer Saft',
                                'correct' => [
                                    'ein',
                                    'frisch',
                                    'Saft',
                                ],
                                'extra' => [
                                    'durstig',
                                    'Wasser',
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
                            '私',
                            'は',
                            'のどが渇いた',
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
                            'de' => [
                                'sentence' => 'Ich bin durstig',
                                'correct' => [
                                    'ich bin',
                                    'durstig',
                                ],
                                'extra' => [
                                    'frisch',
                                    'Saft',
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
                            'ジュース',
                            'と',
                            '水',
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
                            'de' => [
                                'sentence' => 'Ein Saft und ein Wasser',
                                'correct' => [
                                    'ein',
                                    'Saft',
                                    'und',
                                    'ein',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'frisch',
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
            $builder->lesson('レッスン3: コーヒー・お茶', 3,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => 'お茶',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'ビール',
                    ],
                    [
                        'ja' => '飲む',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ビール',
                            'を',
                            '飲み',
                            'たいです',
                        ],
                        'blank' => 3,
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
                            'de' => [
                                'sentence' => 'Ich möchte ein Bier trinken',
                                'correct' => [
                                    'ich möchte',
                                    'zu',
                                    'trinken',
                                    'ein',
                                    'Bier',
                                ],
                                'extra' => [
                                    'Tee',
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
                            'コーヒー',
                            'か',
                            'お茶',
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
                            'de' => [
                                'sentence' => 'Ein Kaffee oder ein Tee',
                                'correct' => [
                                    'ein',
                                    'Kaffee',
                                    'oder',
                                    'ein',
                                    'Tee',
                                ],
                                'extra' => [
                                    'Bier',
                                    'trinken',
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
                            '熱い',
                            'コーヒー',
                            'を',
                            '飲む',
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
                            'de' => [
                                'sentence' => 'Einen heißen Kaffee trinken',
                                'correct' => [
                                    'trinken',
                                    'einen',
                                    'heiß',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'Bier',
                                    'Tee',
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
            $builder->lesson('レッスン4: 牛乳・砂糖', 4,
                pictures: [
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                    [
                        'ja' => '砂糖',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'ja' => '氷',
                    ],
                    [
                        'ja' => '甘い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '氷',
                            '入り',
                            'の',
                            'コーヒー',
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
                            'de' => [
                                'sentence' => 'Ein Kaffee mit Eiswürfeln',
                                'correct' => [
                                    'ein',
                                    'Kaffee',
                                    'mit',
                                    'Eiswürfel',
                                ],
                                'extra' => [
                                    'süß',
                                    'Zucker',
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
                            '牛乳',
                            'は',
                            '甘い',
                            'です',
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
                            'de' => [
                                'sentence' => 'Die Milch ist süß',
                                'correct' => [
                                    'die',
                                    'Milch',
                                    'ist',
                                    'süß',
                                ],
                                'extra' => [
                                    'Eiswürfel',
                                    'Zucker',
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
                            '砂糖',
                            'と',
                            '氷',
                        ],
                        'blank' => 0,
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
                            'de' => [
                                'sentence' => 'Etwas Zucker und etwas Eis',
                                'correct' => [
                                    'etwas',
                                    'Zucker',
                                    'und',
                                    'etwas',
                                    'Eiswürfel',
                                ],
                                'extra' => [
                                    'süß',
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
            $builder->lesson('レッスン5: 水・ワイン', 5,
                pictures: [
                    [
                        'ja' => '水',
                        'img' => 'water',
                    ],
                    [
                        'ja' => 'ワイン',
                        'img' => 'wine',
                    ],
                ],
                plain: [
                    [
                        'ja' => '持ってくる',
                    ],
                    [
                        'ja' => 'もう一つの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '持ってくる',
                            'もう一つの',
                            'ワイン',
                        ],
                        'blank' => 1,
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
                            'de' => [
                                'sentence' => 'Noch einen Wein bringen',
                                'correct' => [
                                    'bringen',
                                    'noch ein',
                                    'Wein',
                                ],
                                'extra' => [
                                    'Wasser',
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
                            '水',
                            'を',
                            '持ってくる',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Ein Wasser bringen',
                                'correct' => [
                                    'ein',
                                    'Wasser',
                                    'bringen',
                                ],
                                'extra' => [
                                    'noch ein',
                                    'Wein',
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
                            'ワイン',
                            'を',
                            'もう',
                            '一',
                            '杯',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Noch ein Glas Wein',
                                'correct' => [
                                    'noch ein',
                                    'Glas',
                                    'von',
                                    'Wein',
                                ],
                                'extra' => [
                                    'Wasser',
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
