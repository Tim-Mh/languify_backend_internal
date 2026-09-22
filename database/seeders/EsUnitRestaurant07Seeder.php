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
                            'az' => ['sentence' => 'bir stəkan şərab', 'correct' => ['bir', 'stəkan', 'şərab'], 'extra' => ['şüşə', 'qırmızı']],
                            'ar' => ['sentence' => 'كوب نبيذ', 'correct' => ['كوب', 'نبيذ'], 'extra' => ['زجاجة', 'أحمر']],
                            'ru' => ['sentence' => 'стакан вино', 'correct' => ['стакан', 'вино'], 'extra' => ['бутылка', 'красный']],
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
                            'tr' => ['sentence' => 'bir bardak şarap', 'correct' => ['bir', 'bardak', 'şarap'], 'extra' => ['şişe', 'kırmızı']],
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
                            'az' => ['sentence' => 'bir şüşə qırmızı şərab', 'correct' => ['bir', 'şüşə', 'qırmızı', 'şərab'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'زجاجة أحمر نبيذ', 'correct' => ['زجاجة', 'أحمر', 'نبيذ'], 'extra' => ['كوب']],
                            'ru' => ['sentence' => 'бутылка красный вино', 'correct' => ['бутылка', 'красный', 'вино'], 'extra' => ['стакан']],
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
                            'tr' => ['sentence' => 'bir şişe kırmızı şarap', 'correct' => ['bir', 'şişe', 'kırmızı', 'şarap'], 'extra' => ['bardak']],
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
                            'az' => ['sentence' => 'bir qırmızı stəkan və bir şüşə', 'correct' => ['bir', 'qırmızı', 'stəkan', 'və', 'bir', 'şüşə'], 'extra' => ['şərab']],
                            'ar' => ['sentence' => 'أحمر كوب و زجاجة', 'correct' => ['أحمر', 'كوب', 'و', 'زجاجة'], 'extra' => ['نبيذ']],
                            'ru' => ['sentence' => 'красный стакан и бутылка', 'correct' => ['красный', 'стакан', 'и', 'бутылка'], 'extra' => ['вино']],
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
                            'tr' => ['sentence' => 'kırmızı bir bardak ve bir şişe', 'correct' => ['kırmızı', 'bir', 'bardak', 've', 'bir', 'şişe'], 'extra' => ['şarap']],
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
                            'az' => ['sentence' => 'bir təzə şirə', 'correct' => ['bir', 'təzə', 'şirə'], 'extra' => ['susuz', 'su']],
                            'ar' => ['sentence' => 'طازج عصير', 'correct' => ['طازج', 'عصير'], 'extra' => ['عطشان', 'ماء']],
                            'ru' => ['sentence' => 'свежий сок', 'correct' => ['свежий', 'сок'], 'extra' => ['хочу пить', 'вода']],
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
                            'tr' => ['sentence' => 'taze bir meyve suyu', 'correct' => ['taze', 'bir', 'meyve', 'suyu'], 'extra' => ['susamış', 'su']],
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
                            'az' => ['sentence' => 'mən susuz', 'correct' => ['mən', 'susuz'], 'extra' => ['təzə', 'şirə']],
                            'ar' => ['sentence' => 'أنا عطشان', 'correct' => ['أنا', 'عطشان'], 'extra' => ['طازج', 'عصير']],
                            'ru' => ['sentence' => 'я хочу пить', 'correct' => ['я', 'хочу пить'], 'extra' => ['свежий', 'сок']],
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
                            'tr' => ['sentence' => 'susadım', 'correct' => ['susadım'], 'extra' => ['taze', 'meyve suyu']],
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
                            'az' => ['sentence' => 'bir şirə və bir su', 'correct' => ['bir', 'şirə', 'və', 'bir', 'su'], 'extra' => ['təzə']],
                            'ar' => ['sentence' => 'عصير و ماء', 'correct' => ['عصير', 'و', 'ماء'], 'extra' => ['طازج']],
                            'ru' => ['sentence' => 'сок и вода', 'correct' => ['сок', 'и', 'вода'], 'extra' => ['свежий']],
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
                            'tr' => ['sentence' => 'bir meyve suyu ve bir su', 'correct' => ['bir', 'meyve', 'suyu', 've', 'bir', 'su'], 'extra' => ['taze']],
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
                            'az' => ['sentence' => 'istəyirəm içki bir pivə', 'correct' => ['istəyirəm', 'içki', 'bir', 'pivə'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أريد إلى مشروب بيرة', 'correct' => ['أريد', 'إلى', 'مشروب', 'بيرة'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'я хочу в напиток пиво', 'correct' => ['я', 'хочу', 'в', 'напиток', 'пиво'], 'extra' => ['чай']],
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
                            'tr' => ['sentence' => 'bir bira içmek istiyorum', 'correct' => ['bir', 'bira', 'içmek', 'istiyorum'], 'extra' => ['çay']],
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
                            'az' => ['sentence' => 'bir qəhvə və ya bir çay', 'correct' => ['bir', 'qəhvə', 'və ya', 'bir', 'çay'], 'extra' => ['pivə', 'içki']],
                            'ar' => ['sentence' => 'قهوة أو شاي', 'correct' => ['قهوة', 'أو', 'شاي'], 'extra' => ['بيرة', 'مشروب']],
                            'ru' => ['sentence' => 'кофе или чай', 'correct' => ['кофе', 'или', 'чай'], 'extra' => ['пиво', 'напиток']],
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
                            'tr' => ['sentence' => 'bir kahve veya bir çay', 'correct' => ['bir', 'kahve', 'veya', 'bir', 'çay'], 'extra' => ['bira', 'iç']],
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
                            'az' => ['sentence' => 'içki bir isti qəhvə', 'correct' => ['içki', 'bir', 'isti', 'qəhvə'], 'extra' => ['pivə', 'çay']],
                            'ar' => ['sentence' => 'مشروب ساخن قهوة', 'correct' => ['مشروب', 'ساخن', 'قهوة'], 'extra' => ['بيرة', 'شاي']],
                            'ru' => ['sentence' => 'напиток горячий кофе', 'correct' => ['напиток', 'горячий', 'кофе'], 'extra' => ['пиво', 'чай']],
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
                            'tr' => ['sentence' => 'sıcak bir kahve iç', 'correct' => ['sıcak', 'bir', 'kahve', 'iç'], 'extra' => ['bira', 'çay']],
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
                            'az' => ['sentence' => 'bir qəhvə ilə buz', 'correct' => ['bir', 'qəhvə', 'ilə', 'buz'], 'extra' => ['şirin', 'şəkər']],
                            'ar' => ['sentence' => 'قهوة مع الثلج', 'correct' => ['قهوة', 'مع', 'الثلج'], 'extra' => ['حلو', 'سكر']],
                            'ru' => ['sentence' => 'кофе с лёд', 'correct' => ['кофе', 'с', 'лёд'], 'extra' => ['сладкий', 'сахар']],
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
                            'tr' => ['sentence' => 'buzlu bir kahve', 'correct' => ['buzlu', 'bir', 'kahve'], 'extra' => ['tatlı', 'şeker']],
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
                            'az' => ['sentence' => 'süd şirin', 'correct' => ['süd', 'şirin'], 'extra' => ['buz', 'şəkər']],
                            'ar' => ['sentence' => 'حليب حلو', 'correct' => ['حليب', 'حلو'], 'extra' => ['الثلج', 'سكر']],
                            'ru' => ['sentence' => 'молоко сладкий', 'correct' => ['молоко', 'сладкий'], 'extra' => ['лёд', 'сахар']],
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
                            'tr' => ['sentence' => 'süt tatlı', 'correct' => ['süt', 'tatlı'], 'extra' => ['buz', 'şeker']],
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
                            'az' => ['sentence' => 'bir az şəkər və bir az buz', 'correct' => ['bir az', 'şəkər', 'və', 'bir az', 'buz'], 'extra' => ['şirin']],
                            'ar' => ['sentence' => 'بعض سكر و بعض الثلج', 'correct' => ['بعض', 'سكر', 'و', 'بعض', 'الثلج'], 'extra' => ['حلو']],
                            'ru' => ['sentence' => 'немного сахар и немного лёд', 'correct' => ['немного', 'сахар', 'и', 'немного', 'лёд'], 'extra' => ['сладкий']],
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
                            'tr' => ['sentence' => 'biraz şeker ve biraz buz', 'correct' => ['biraz', 'şeker', 've', 'biraz', 'buz'], 'extra' => ['tatlı']],
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
                            'az' => ['sentence' => 'gətirmək başqa şərab', 'correct' => ['gətirmək', 'başqa', 'şərab'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'الإحضار آخر نبيذ', 'correct' => ['الإحضار', 'آخر', 'نبيذ'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'принести другой вино', 'correct' => ['принести', 'другой', 'вино'], 'extra' => ['вода']],
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
                            'tr' => ['sentence' => 'bir şarap daha getirmek', 'correct' => ['bir', 'şarap', 'daha', 'getirmek'], 'extra' => ['su']],
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
                            'az' => ['sentence' => 'gətirmək bir su', 'correct' => ['gətirmək', 'bir', 'su'], 'extra' => ['başqa', 'şərab']],
                            'ar' => ['sentence' => 'الإحضار ماء', 'correct' => ['الإحضار', 'ماء'], 'extra' => ['آخر', 'نبيذ']],
                            'ru' => ['sentence' => 'принести вода', 'correct' => ['принести', 'вода'], 'extra' => ['другой', 'вино']],
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
                            'tr' => ['sentence' => 'bir su getirmek', 'correct' => ['bir', 'su', 'getirmek'], 'extra' => ['başka', 'şarap']],
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
                            'az' => ['sentence' => 'başqa stəkan şərab', 'correct' => ['başqa', 'stəkan', 'şərab'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'آخر كوب نبيذ', 'correct' => ['آخر', 'كوب', 'نبيذ'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'другой стакан вино', 'correct' => ['другой', 'стакан', 'вино'], 'extra' => ['вода']],
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
                            'tr' => ['sentence' => 'bir bardak şarap daha', 'correct' => ['bir', 'bardak', 'şarap', 'daha'], 'extra' => ['su']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
