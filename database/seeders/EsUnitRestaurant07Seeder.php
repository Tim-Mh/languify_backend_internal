<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant07Seeder extends Seeder
{
    private const PICTURES = [
        'vino' => 'wine',
        'vaso' => 'glass',
        'zumo' => 'juice',
        'agua' => 'water',
        'café' => 'coffee',
        'té' => 'tea',
        'leche' => 'milk',
        'azúcar' => 'sugar',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 7, the Spanish twin of the
     * English "Unit 7: Drinks and Beverages" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unidad 7: Bebidas', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Vino y Vaso', 1,
                pictures: [
                    [
                        'es' => 'vino',
                        'img' => 'wine',
                    ],
                    [
                        'es' => 'vaso',
                        'img' => 'glass',
                    ],
                ],
                plain: [
                    [
                        'es' => 'botella',
                    ],
                    [
                        'es' => 'rojo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'vaso',
                            'de',
                            'vino',
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
                            'Una',
                            'botella',
                            'de',
                            'vino',
                            'rojo',
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
                            'Un',
                            'vaso',
                            'rojo',
                            'y',
                            'una',
                            'botella',
                        ],
                        'blank' => 2,
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
            $builder->lesson('Lección 2: Zumo y Agua', 2,
                pictures: [
                    [
                        'es' => 'zumo',
                        'img' => 'juice',
                    ],
                    [
                        'es' => 'agua',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'es' => 'fresco',
                    ],
                    [
                        'es' => 'sediento',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'zumo',
                            'fresco',
                        ],
                        'blank' => 2,
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
                            'Tengo',
                            'sed',
                        ],
                        'blank' => 0,
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
                            'Un',
                            'zumo',
                            'y',
                            'un',
                            'agua',
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
            $builder->lesson('Lección 3: Café y Té', 3,
                pictures: [
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                    [
                        'es' => 'té',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cerveza',
                    ],
                    [
                        'es' => 'beber',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quisiera',
                            'beber',
                            'una',
                            'cerveza',
                        ],
                        'blank' => 1,
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
                            'Un',
                            'café',
                            'o',
                            'un',
                            'té',
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
                            'Beber',
                            'un',
                            'café',
                            'caliente',
                        ],
                        'blank' => 0,
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
            $builder->lesson('Lección 4: Leche y Azúcar', 4,
                pictures: [
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                    [
                        'es' => 'azúcar',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'es' => 'hielo',
                    ],
                    [
                        'es' => 'dulce',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'café',
                            'con',
                            'hielo',
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
                            'La',
                            'leche',
                            'es',
                            'dulce',
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
                            'Algo',
                            'de',
                            'azúcar',
                            'y',
                            'algo',
                            'de',
                            'hielo',
                        ],
                        'blank' => 2,
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
            $builder->lesson('Lección 5: Agua y Vino', 5,
                pictures: [
                    [
                        'es' => 'agua',
                        'img' => 'water',
                    ],
                    [
                        'es' => 'vino',
                        'img' => 'wine',
                    ],
                ],
                plain: [
                    [
                        'es' => 'traer',
                    ],
                    [
                        'es' => 'otro',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Traer',
                            'otro',
                            'vino',
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
                            'Traer',
                            'un',
                            'agua',
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
                                    'wine',
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
                            'Otro',
                            'vaso',
                            'de',
                            'vino',
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
