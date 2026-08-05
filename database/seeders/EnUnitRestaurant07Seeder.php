<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant07Seeder extends Seeder
{
    private const PICTURES = [
        'Wine' => 'wine', 'Glass' => 'glass', 'Juice' => 'juice', 'Water' => 'water',
        'Coffee' => 'coffee', 'Tea' => 'tea', 'Milk' => 'milk', 'Sugar' => 'sugar',
    ];

    /**
     * English Chapter 3, Unit 7 — drinks.
     *
     * Drinks are all about the container and what goes in it, so the lessons
     * build the glass and the bottle before the wine and the water, and close
     * on asking for another one.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Drinks and Beverages', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Glass of Wine', 1,
                pictures: [['en' => 'Wine', 'img' => 'wine'], ['en' => 'Glass', 'img' => 'glass']],
                plain: [['en' => 'Bottle'], ['en' => 'Red']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'glass', 'of', 'wine'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un vaso de vino', 'correct' => ['un', 'vaso', 'de', 'vino'], 'extra' => ['botella', 'rojo']],
                            'de' => ['sentence' => 'Ein Glas Wein', 'correct' => ['ein', 'Glas', 'von', 'Wein'], 'extra' => ['Flasche', 'rot']],
                            'ja' => ['sentence' => 'ワイン一杯', 'correct' => ['ワイン', '一', '杯'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '와인 한 잔', 'correct' => ['와인', '한', '잔'], 'extra' => ['병']],
                            'fr' => ['sentence' => 'Un verre de vin', 'correct' => ['un', 'verre', 'de', 'vin'], 'extra' => ['bouteille', 'rouge']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'bottle', 'of', 'red', 'wine'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una botella de vino tinto', 'correct' => ['una', 'botella', 'de', 'vino', 'tinto'], 'extra' => ['vaso']],
                            'de' => ['sentence' => 'Eine Flasche Rotwein', 'correct' => ['eine', 'Flasche', 'von', 'rot', 'Wein'], 'extra' => ['Glas']],
                            'ja' => ['sentence' => '赤ワインのボトル', 'correct' => ['赤', 'ワイン', 'の', 'ボトル'], 'extra' => ['グラス']],
                            'ko' => ['sentence' => '레드 와인 한 병', 'correct' => ['레드', '와인', '한', '병'], 'extra' => ['유리잔']],
                            'fr' => ['sentence' => 'Une bouteille de vin rouge', 'correct' => ['une', 'bouteille', 'de', 'vin', 'rouge'], 'extra' => ['verre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'red', 'glass', 'and', 'a', 'bottle'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un vaso rojo y una botella', 'correct' => ['un', 'vaso', 'rojo', 'y', 'una', 'botella'], 'extra' => ['vino']],
                            'de' => ['sentence' => 'Ein rotes Glas und eine Flasche', 'correct' => ['ein', 'rot', 'Glas', 'und', 'eine', 'Flasche'], 'extra' => ['Wein']],
                            'ja' => ['sentence' => '赤いグラスとボトル', 'correct' => ['赤い', 'グラス', 'と', 'ボトル'], 'extra' => ['ワイン']],
                            'ko' => ['sentence' => '빨간 유리잔과 병', 'correct' => ['빨간', '유리잔과', '병'], 'extra' => ['와인']],
                            'fr' => ['sentence' => 'Un verre rouge et une bouteille', 'correct' => ['un', 'verre', 'rouge', 'et', 'une', 'bouteille'], 'extra' => ['vin']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Juice and Water', 2,
                pictures: [['en' => 'Juice', 'img' => 'juice'], ['en' => 'Water', 'img' => 'water']],
                plain: [['en' => 'Fresh'], ['en' => 'Thirsty']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'fresh', 'juice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un zumo fresco', 'correct' => ['un', 'zumo', 'fresco'], 'extra' => ['sediento', 'agua']],
                            'de' => ['sentence' => 'Ein frischer Saft', 'correct' => ['ein', 'frisch', 'Saft'], 'extra' => ['durstig', 'Wasser']],
                            'ja' => ['sentence' => '新鮮なジュース', 'correct' => ['新鮮な', 'ジュース'], 'extra' => ['のどが渇いた']],
                            'ko' => ['sentence' => '신선한 주스', 'correct' => ['신선한', '주스'], 'extra' => ['목마른']],
                            'fr' => ['sentence' => 'Un jus frais', 'correct' => ['un', 'jus', 'frais'], 'extra' => ['assoiffé', 'eau']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I am', 'thirsty'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Tengo sed', 'correct' => ['soy', 'sediento'], 'extra' => ['fresco', 'zumo']],
                            'de' => ['sentence' => 'Ich bin durstig', 'correct' => ['ich bin', 'durstig'], 'extra' => ['frisch', 'Saft']],
                            'ja' => ['sentence' => 'のどが渇いています', 'correct' => ['のどが', '渇いています'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '목이 마릅니다', 'correct' => ['목이', '마릅니다'], 'extra' => ['신선한']],
                            'fr' => ['sentence' => "J'ai soif", 'correct' => ['je suis', 'assoiffé'], 'extra' => ['frais']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'juice', 'and', 'a', 'water'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un zumo y un agua', 'correct' => ['un', 'zumo', 'y', 'un', 'agua'], 'extra' => ['fresco']],
                            'de' => ['sentence' => 'Ein Saft und ein Wasser', 'correct' => ['ein', 'Saft', 'und', 'ein', 'Wasser'], 'extra' => ['frisch']],
                            'ja' => ['sentence' => 'ジュースと水', 'correct' => ['ジュース', 'と', '水'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '주스와 물', 'correct' => ['주스와', '물'], 'extra' => ['신선한']],
                            'fr' => ['sentence' => 'Un jus et une eau', 'correct' => ['un', 'jus', 'et', 'une', 'eau'], 'extra' => ['frais']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: A Beer to Drink', 3,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Tea', 'img' => 'tea']],
                plain: [['en' => 'Beer'], ['en' => 'Drink']],
                phrases: [
                    'a' => [
                        'words' => ['I would like', 'to', 'drink', 'a', 'beer'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera beber una cerveza', 'correct' => ['quisiera', 'a', 'beber', 'una', 'cerveza'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte ein Bier trinken', 'correct' => ['ich möchte', 'zu', 'trinken', 'ein', 'Bier'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'ビールを飲みたいです', 'correct' => ['ビール', 'を', '飲み', 'たいです'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '맥주를 마시고 싶습니다', 'correct' => ['맥주를', '마시고', '싶습니다'], 'extra' => ['차']],
                            'fr' => ['sentence' => 'Je voudrais boire une bière', 'correct' => ['je voudrais', 'à', 'boire', 'une', 'bière'], 'extra' => ['thé']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'coffee', 'or', 'a', 'tea'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un café o un té', 'correct' => ['un', 'café', 'o', 'un', 'té'], 'extra' => ['cerveza', 'beber']],
                            'de' => ['sentence' => 'Ein Kaffee oder ein Tee', 'correct' => ['ein', 'Kaffee', 'oder', 'ein', 'Tee'], 'extra' => ['Bier', 'trinken']],
                            'ja' => ['sentence' => 'コーヒーかお茶', 'correct' => ['コーヒー', 'か', 'お茶'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '커피 또는 차', 'correct' => ['커피', '또는', '차'], 'extra' => ['맥주']],
                            'fr' => ['sentence' => 'Un café ou un thé', 'correct' => ['un', 'café', 'ou', 'un', 'thé'], 'extra' => ['bière']],
                        ],
                    ],
                    'c' => [
                        'words' => ['drink', 'a', 'hot', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Beber un café caliente', 'correct' => ['beber', 'un', 'café', 'caliente'], 'extra' => ['cerveza', 'té']],
                            'de' => ['sentence' => 'Einen heißen Kaffee trinken', 'correct' => ['trinken', 'einen', 'heiß', 'Kaffee'], 'extra' => ['Bier', 'Tee']],
                            'ja' => ['sentence' => '熱いコーヒーを飲む', 'correct' => ['熱い', 'コーヒー', 'を', '飲む'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '뜨거운 커피를 마시다', 'correct' => ['뜨거운', '커피를', '마시다'], 'extra' => ['맥주']],
                            'fr' => ['sentence' => 'Boire un café chaud', 'correct' => ['boire', 'un', 'café', 'chaud'], 'extra' => ['bière']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Milk, Sugar and Ice', 4,
                pictures: [['en' => 'Milk', 'img' => 'milk'], ['en' => 'Sugar', 'img' => 'sugar']],
                plain: [['en' => 'Ice'], ['en' => 'Sweet']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'coffee', 'with', 'ice'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un café con hielo', 'correct' => ['un', 'café', 'con', 'hielo'], 'extra' => ['dulce', 'azúcar']],
                            'de' => ['sentence' => 'Ein Kaffee mit Eiswürfeln', 'correct' => ['ein', 'Kaffee', 'mit', 'Eiswürfel'], 'extra' => ['süß', 'Zucker']],
                            'ja' => ['sentence' => '氷入りのコーヒー', 'correct' => ['氷', '入り', 'の', 'コーヒー'], 'extra' => ['甘い']],
                            'ko' => ['sentence' => '얼음이 든 커피', 'correct' => ['얼음이', '든', '커피'], 'extra' => ['단']],
                            'fr' => ['sentence' => 'Un café avec des glaçons', 'correct' => ['un', 'café', 'avec', 'glaçons'], 'extra' => ['sucré']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'milk', 'is', 'sweet'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La leche es dulce', 'correct' => ['la', 'leche', 'es', 'dulce'], 'extra' => ['hielo', 'azúcar']],
                            'de' => ['sentence' => 'Die Milch ist süß', 'correct' => ['die', 'Milch', 'ist', 'süß'], 'extra' => ['Eiswürfel', 'Zucker']],
                            'ja' => ['sentence' => '牛乳は甘いです', 'correct' => ['牛乳', 'は', '甘い', 'です'], 'extra' => ['氷']],
                            'ko' => ['sentence' => '우유는 답니다', 'correct' => ['우유는', '답니다'], 'extra' => ['얼음']],
                            'fr' => ['sentence' => 'Le lait est sucré', 'correct' => ['le', 'lait', 'est', 'sucré'], 'extra' => ['glaçons']],
                        ],
                    ],
                    'c' => [
                        'words' => ['some', 'sugar', 'and', 'some', 'ice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de azúcar y algo de hielo', 'correct' => ['algo de', 'azúcar', 'y', 'algo de', 'hielo'], 'extra' => ['dulce']],
                            'de' => ['sentence' => 'Etwas Zucker und etwas Eis', 'correct' => ['etwas', 'Zucker', 'und', 'etwas', 'Eiswürfel'], 'extra' => ['süß']],
                            'ja' => ['sentence' => '砂糖と氷', 'correct' => ['砂糖', 'と', '氷'], 'extra' => ['甘い']],
                            'ko' => ['sentence' => '약간의 설탕과 얼음', 'correct' => ['약간의', '설탕과', '얼음'], 'extra' => ['단']],
                            'fr' => ['sentence' => 'Du sucre et des glaçons', 'correct' => ['du', 'sucre', 'et', 'du', 'glaçons'], 'extra' => ['sucré']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Another One, Please', 5,
                pictures: [['en' => 'Water', 'img' => 'water'], ['en' => 'Wine', 'img' => 'wine']],
                plain: [['en' => 'To bring'], ['en' => 'Another']],
                phrases: [
                    'a' => [
                        'words' => ['to bring', 'another', 'wine'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Traer otro vino', 'correct' => ['traer', 'otro', 'vino'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Noch einen Wein bringen', 'correct' => ['bringen', 'noch ein', 'Wein'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => 'ワインをもう一つ持ってくる', 'correct' => ['ワイン', 'を', 'もう一つ', '持ってくる'], 'extra' => ['水']],
                            'ko' => ['sentence' => '와인 하나 더 가져오다', 'correct' => ['와인', '하나', '더', '가져오다'], 'extra' => ['물']],
                            'fr' => ['sentence' => 'Apporter encore un vin', 'correct' => ['apporter', 'encore', 'vin'], 'extra' => ['eau']],
                        ],
                    ],
                    'b' => [
                        'words' => ['to bring', 'a', 'water'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Traer un agua', 'correct' => ['traer', 'un', 'agua'], 'extra' => ['otro', 'vino']],
                            'de' => ['sentence' => 'Ein Wasser bringen', 'correct' => ['ein', 'Wasser', 'bringen'], 'extra' => ['noch ein', 'Wein']],
                            'ja' => ['sentence' => '水を持ってくる', 'correct' => ['水', 'を', '持ってくる'], 'extra' => ['もう一つの']],
                            'ko' => ['sentence' => '물을 가져오다', 'correct' => ['물을', '가져오다'], 'extra' => ['하나 더']],
                            'fr' => ['sentence' => 'Apporter une eau', 'correct' => ['apporter', 'une', 'eau'], 'extra' => ['encore']],
                        ],
                    ],
                    'c' => [
                        'words' => ['another', 'glass', 'of', 'wine'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Otro vaso de vino', 'correct' => ['otro', 'vaso', 'de', 'vino'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Noch ein Glas Wein', 'correct' => ['noch ein', 'Glas', 'von', 'Wein'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => 'ワインをもう一杯', 'correct' => ['ワイン', 'を', 'もう', '一', '杯'], 'extra' => ['水']],
                            'ko' => ['sentence' => '와인 한 잔 더', 'correct' => ['와인', '한', '잔', '더'], 'extra' => ['물']],
                            'fr' => ['sentence' => 'Encore un verre de vin', 'correct' => ['encore', 'verre', 'de', 'vin'], 'extra' => ['eau']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
