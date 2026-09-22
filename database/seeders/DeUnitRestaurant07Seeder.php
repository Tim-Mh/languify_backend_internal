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
                            'az' => ['sentence' => 'bir stəkan şərab', 'correct' => ['bir', 'stəkan', 'şərab'], 'extra' => ['şüşə', 'qırmızı']],
                            'ar' => ['sentence' => 'كوب نبيذ', 'correct' => ['كوب', 'نبيذ'], 'extra' => ['زجاجة', 'أحمر']],
                            'ru' => ['sentence' => 'стакан вино', 'correct' => ['стакан', 'вино'], 'extra' => ['бутылка', 'красный']],
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
                            'tr' => ['sentence' => 'bir bardak şarap', 'correct' => ['bir', 'bardak', 'şarap'], 'extra' => ['şişe', 'kırmızı']],
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
                            'az' => ['sentence' => 'bir şüşə qırmızı şərab', 'correct' => ['bir', 'şüşə', 'qırmızı', 'şərab'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'زجاجة أحمر نبيذ', 'correct' => ['زجاجة', 'أحمر', 'نبيذ'], 'extra' => ['كوب']],
                            'ru' => ['sentence' => 'бутылка красный вино', 'correct' => ['бутылка', 'красный', 'вино'], 'extra' => ['стакан']],
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
                            'tr' => ['sentence' => 'bir şişe kırmızı şarap', 'correct' => ['bir', 'şişe', 'kırmızı', 'şarap'], 'extra' => ['bardak']],
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
                            'az' => ['sentence' => 'bir qırmızı stəkan və bir şüşə', 'correct' => ['bir', 'qırmızı', 'stəkan', 'və', 'bir', 'şüşə'], 'extra' => ['şərab']],
                            'ar' => ['sentence' => 'أحمر كوب و زجاجة', 'correct' => ['أحمر', 'كوب', 'و', 'زجاجة'], 'extra' => ['نبيذ']],
                            'ru' => ['sentence' => 'красный стакан и бутылка', 'correct' => ['красный', 'стакан', 'и', 'бутылка'], 'extra' => ['вино']],
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
                            'tr' => ['sentence' => 'kırmızı bir bardak ve bir şişe', 'correct' => ['kırmızı', 'bir', 'bardak', 've', 'bir', 'şişe'], 'extra' => ['şarap']],
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
                            'az' => ['sentence' => 'bir təzə şirə', 'correct' => ['bir', 'təzə', 'şirə'], 'extra' => ['susuz', 'su']],
                            'ar' => ['sentence' => 'طازج عصير', 'correct' => ['طازج', 'عصير'], 'extra' => ['عطشان', 'ماء']],
                            'ru' => ['sentence' => 'свежий сок', 'correct' => ['свежий', 'сок'], 'extra' => ['хочу пить', 'вода']],
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
                            'tr' => ['sentence' => 'taze bir meyve suyu', 'correct' => ['taze', 'bir', 'meyve', 'suyu'], 'extra' => ['susamış', 'su']],
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
                            'az' => ['sentence' => 'mən susuz', 'correct' => ['mən', 'susuz'], 'extra' => ['təzə', 'şirə']],
                            'ar' => ['sentence' => 'أنا عطشان', 'correct' => ['أنا', 'عطشان'], 'extra' => ['طازج', 'عصير']],
                            'ru' => ['sentence' => 'я хочу пить', 'correct' => ['я', 'хочу пить'], 'extra' => ['свежий', 'сок']],
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
                            'tr' => ['sentence' => 'susadım', 'correct' => ['susadım'], 'extra' => ['taze', 'meyve suyu']],
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
                            'az' => ['sentence' => 'bir şirə və bir su', 'correct' => ['bir', 'şirə', 'və', 'bir', 'su'], 'extra' => ['təzə']],
                            'ar' => ['sentence' => 'عصير و ماء', 'correct' => ['عصير', 'و', 'ماء'], 'extra' => ['طازج']],
                            'ru' => ['sentence' => 'сок и вода', 'correct' => ['сок', 'и', 'вода'], 'extra' => ['свежий']],
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
                            'tr' => ['sentence' => 'bir meyve suyu ve bir su', 'correct' => ['bir', 'meyve', 'suyu', 've', 'bir', 'su'], 'extra' => ['taze']],
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
                            'az' => ['sentence' => 'istəyirəm içki bir pivə', 'correct' => ['istəyirəm', 'içki', 'bir', 'pivə'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أريد إلى مشروب بيرة', 'correct' => ['أريد', 'إلى', 'مشروب', 'بيرة'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'я хочу в напиток пиво', 'correct' => ['я', 'хочу', 'в', 'напиток', 'пиво'], 'extra' => ['чай']],
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
                            'tr' => ['sentence' => 'bir bira içmek istiyorum', 'correct' => ['bir', 'bira', 'içmek', 'istiyorum'], 'extra' => ['çay']],
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
                            'az' => ['sentence' => 'bir qəhvə və ya bir çay', 'correct' => ['bir', 'qəhvə', 'və ya', 'bir', 'çay'], 'extra' => ['pivə', 'içki']],
                            'ar' => ['sentence' => 'قهوة أو شاي', 'correct' => ['قهوة', 'أو', 'شاي'], 'extra' => ['بيرة', 'مشروب']],
                            'ru' => ['sentence' => 'кофе или чай', 'correct' => ['кофе', 'или', 'чай'], 'extra' => ['пиво', 'напиток']],
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
                            'tr' => ['sentence' => 'bir kahve veya bir çay', 'correct' => ['bir', 'kahve', 'veya', 'bir', 'çay'], 'extra' => ['bira', 'iç']],
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
                            'az' => ['sentence' => 'içki bir isti qəhvə', 'correct' => ['içki', 'bir', 'isti', 'qəhvə'], 'extra' => ['pivə', 'çay']],
                            'ar' => ['sentence' => 'مشروب ساخن قهوة', 'correct' => ['مشروب', 'ساخن', 'قهوة'], 'extra' => ['بيرة', 'شاي']],
                            'ru' => ['sentence' => 'напиток горячий кофе', 'correct' => ['напиток', 'горячий', 'кофе'], 'extra' => ['пиво', 'чай']],
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
                            'tr' => ['sentence' => 'sıcak bir kahve iç', 'correct' => ['sıcak', 'bir', 'kahve', 'iç'], 'extra' => ['bira', 'çay']],
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
                            'az' => ['sentence' => 'bir qəhvə ilə buz', 'correct' => ['bir', 'qəhvə', 'ilə', 'buz'], 'extra' => ['şirin', 'şəkər']],
                            'ar' => ['sentence' => 'قهوة مع الثلج', 'correct' => ['قهوة', 'مع', 'الثلج'], 'extra' => ['حلو', 'سكر']],
                            'ru' => ['sentence' => 'кофе с лёд', 'correct' => ['кофе', 'с', 'лёд'], 'extra' => ['сладкий', 'сахар']],
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
                            'tr' => ['sentence' => 'buzlu bir kahve', 'correct' => ['buzlu', 'bir', 'kahve'], 'extra' => ['tatlı', 'şeker']],
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
                            'az' => ['sentence' => 'süd şirin', 'correct' => ['süd', 'şirin'], 'extra' => ['buz', 'şəkər']],
                            'ar' => ['sentence' => 'حليب حلو', 'correct' => ['حليب', 'حلو'], 'extra' => ['الثلج', 'سكر']],
                            'ru' => ['sentence' => 'молоко сладкий', 'correct' => ['молоко', 'сладкий'], 'extra' => ['лёд', 'сахар']],
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
                            'tr' => ['sentence' => 'süt tatlı', 'correct' => ['süt', 'tatlı'], 'extra' => ['buz', 'şeker']],
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
                            'az' => ['sentence' => 'bir az şəkər və bir az buz', 'correct' => ['bir az', 'şəkər', 'və', 'bir az', 'buz'], 'extra' => ['şirin']],
                            'ar' => ['sentence' => 'بعض سكر و بعض الثلج', 'correct' => ['بعض', 'سكر', 'و', 'بعض', 'الثلج'], 'extra' => ['حلو']],
                            'ru' => ['sentence' => 'немного сахар и немного лёд', 'correct' => ['немного', 'сахар', 'и', 'немного', 'лёд'], 'extra' => ['сладкий']],
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
                            'tr' => ['sentence' => 'biraz şeker ve biraz buz', 'correct' => ['biraz', 'şeker', 've', 'biraz', 'buz'], 'extra' => ['tatlı']],
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
                            'az' => ['sentence' => 'gətirmək başqa şərab', 'correct' => ['gətirmək', 'başqa', 'şərab'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'الإحضار آخر نبيذ', 'correct' => ['الإحضار', 'آخر', 'نبيذ'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'принести другой вино', 'correct' => ['принести', 'другой', 'вино'], 'extra' => ['вода']],
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
                            'tr' => ['sentence' => 'bir şarap daha getirmek', 'correct' => ['bir', 'şarap', 'daha', 'getirmek'], 'extra' => ['su']],
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
                            'az' => ['sentence' => 'gətirmək bir su', 'correct' => ['gətirmək', 'bir', 'su'], 'extra' => ['başqa', 'şərab']],
                            'ar' => ['sentence' => 'الإحضار ماء', 'correct' => ['الإحضار', 'ماء'], 'extra' => ['آخر', 'نبيذ']],
                            'ru' => ['sentence' => 'принести вода', 'correct' => ['принести', 'вода'], 'extra' => ['другой', 'вино']],
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
                            'tr' => ['sentence' => 'bir su getirmek', 'correct' => ['bir', 'su', 'getirmek'], 'extra' => ['başka', 'şarap']],
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
                            'az' => ['sentence' => 'başqa stəkan şərab', 'correct' => ['başqa', 'stəkan', 'şərab'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'آخر كوب نبيذ', 'correct' => ['آخر', 'كوب', 'نبيذ'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'другой стакан вино', 'correct' => ['другой', 'стакан', 'вино'], 'extra' => ['вода']],
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
                            'tr' => ['sentence' => 'bir bardak şarap daha', 'correct' => ['bir', 'bardak', 'şarap', 'daha'], 'extra' => ['su']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
