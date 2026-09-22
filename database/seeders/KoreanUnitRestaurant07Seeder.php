<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant07Seeder extends Seeder
{
    private const PICTURES = ['와인' => 'wine', '유리잔' => 'glass', '주스' => 'juice', '물' => 'water', '커피' => 'coffee', '차' => 'tea', '우유' => 'milk', '설탕' => 'sugar'];

    /**
     * Korean Restaurant, Unit 7, the Korean twin of the English "Drinks and Beverages" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, '유닛 7: 음료', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 와인 · 유리잔', 1,
                pictures: [['ko' => '와인', 'img' => 'wine'], ['ko' => '유리잔', 'img' => 'glass']],
                plain: [['ko' => '병'], ['ko' => '빨간색']],
                phrases: [
                    'a' => [
                        'words' => ['와인', '한', '잔'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a glass of wine', 'correct' => ['a', 'glass', 'of', 'wine'], 'extra' => ['bottle']],
                            'az' => ['sentence' => 'bir stəkan şərab', 'correct' => ['bir', 'stəkan', 'şərab'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'كوب نبيذ', 'correct' => ['كوب', 'نبيذ'], 'extra' => ['زجاجة']],
                            'ru' => ['sentence' => 'стакан вино', 'correct' => ['стакан', 'вино'], 'extra' => ['бутылка']],
                            'es' => ['sentence' => 'Un vaso de vino', 'correct' => ['un', 'vaso', 'de', 'vino'], 'extra' => ['botella', 'rojo']],
                            'de' => ['sentence' => 'Ein Glas Wein', 'correct' => ['ein', 'Glas', 'von', 'Wein'], 'extra' => ['Flasche', 'rot']],
                            'fr' => ['sentence' => 'Un verre de vin', 'correct' => ['un', 'verre', 'de', 'vin'], 'extra' => ['bouteille', 'rouge']],
                            'ja' => ['sentence' => 'ワイン一杯', 'correct' => ['ワイン', '一', '杯'], 'extra' => ['ボトル']],
                            'tr' => ['sentence' => 'bir bardak şarap', 'correct' => ['bir', 'bardak', 'şarap'], 'extra' => ['şişe']],
                        ],
                    ],
                    'b' => [
                        'words' => ['레드', '와인', '한', '병'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a bottle of red wine', 'correct' => ['a', 'bottle', 'of', 'red', 'wine'], 'extra' => ['glass']],
                            'az' => ['sentence' => 'bir şüşə qırmızı şərab', 'correct' => ['bir', 'şüşə', 'qırmızı', 'şərab'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'زجاجة أحمر نبيذ', 'correct' => ['زجاجة', 'أحمر', 'نبيذ'], 'extra' => ['كوب']],
                            'ru' => ['sentence' => 'бутылка красный вино', 'correct' => ['бутылка', 'красный', 'вино'], 'extra' => ['стакан']],
                            'es' => ['sentence' => 'Una botella de vino tinto', 'correct' => ['una', 'botella', 'de', 'vino', 'tinto'], 'extra' => ['vaso']],
                            'de' => ['sentence' => 'Eine Flasche Rotwein', 'correct' => ['eine', 'Flasche', 'von', 'rot', 'Wein'], 'extra' => ['Glas']],
                            'fr' => ['sentence' => 'Une bouteille de vin rouge', 'correct' => ['une', 'bouteille', 'de', 'vin', 'rouge'], 'extra' => ['verre']],
                            'ja' => ['sentence' => '赤ワインのボトル', 'correct' => ['赤', 'ワイン', 'の', 'ボトル'], 'extra' => ['グラス']],
                            'tr' => ['sentence' => 'bir şişe kırmızı şarap', 'correct' => ['bir', 'şişe', 'kırmızı', 'şarap'], 'extra' => ['bardak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빨간', '유리잔과', '병'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a red glass and a bottle', 'correct' => ['a', 'red', 'glass', 'and', 'a', 'bottle'], 'extra' => ['wine']],
                            'az' => ['sentence' => 'bir qırmızı stəkan və bir şüşə', 'correct' => ['bir', 'qırmızı', 'stəkan', 'və', 'bir', 'şüşə'], 'extra' => ['şərab']],
                            'ar' => ['sentence' => 'أحمر كوب و زجاجة', 'correct' => ['أحمر', 'كوب', 'و', 'زجاجة'], 'extra' => ['نبيذ']],
                            'ru' => ['sentence' => 'красный стакан и бутылка', 'correct' => ['красный', 'стакан', 'и', 'бутылка'], 'extra' => ['вино']],
                            'es' => ['sentence' => 'Un vaso rojo y una botella', 'correct' => ['un', 'vaso', 'rojo', 'y', 'una', 'botella'], 'extra' => ['vino']],
                            'de' => ['sentence' => 'Ein rotes Glas und eine Flasche', 'correct' => ['ein', 'rot', 'Glas', 'und', 'eine', 'Flasche'], 'extra' => ['Wein']],
                            'fr' => ['sentence' => 'Un verre rouge et une bouteille', 'correct' => ['un', 'verre', 'rouge', 'et', 'une', 'bouteille'], 'extra' => ['vin']],
                            'ja' => ['sentence' => '赤いグラスとボトル', 'correct' => ['赤い', 'グラス', 'と', 'ボトル'], 'extra' => ['ワイン']],
                            'tr' => ['sentence' => 'kırmızı bir bardak ve bir şişe', 'correct' => ['kırmızı', 'bir', 'bardak', 've', 'bir', 'şişe'], 'extra' => ['şarap']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 주스 · 물', 2,
                pictures: [['ko' => '주스', 'img' => 'juice'], ['ko' => '물', 'img' => 'water']],
                plain: [['ko' => '신선한'], ['ko' => '목마른']],
                phrases: [
                    'a' => [
                        'words' => ['신선한', '주스'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a fresh juice', 'correct' => ['a', 'fresh', 'juice'], 'extra' => ['thirsty']],
                            'az' => ['sentence' => 'bir təzə şirə', 'correct' => ['bir', 'təzə', 'şirə'], 'extra' => ['susuz']],
                            'ar' => ['sentence' => 'طازج عصير', 'correct' => ['طازج', 'عصير'], 'extra' => ['عطشان']],
                            'ru' => ['sentence' => 'свежий сок', 'correct' => ['свежий', 'сок'], 'extra' => ['хочу пить']],
                            'es' => ['sentence' => 'Un zumo fresco', 'correct' => ['un', 'zumo', 'fresco'], 'extra' => ['sediento', 'agua']],
                            'de' => ['sentence' => 'Ein frischer Saft', 'correct' => ['ein', 'frisch', 'Saft'], 'extra' => ['durstig', 'Wasser']],
                            'fr' => ['sentence' => 'Un jus frais', 'correct' => ['un', 'jus', 'frais'], 'extra' => ['assoiffé', 'eau']],
                            'ja' => ['sentence' => '新鮮なジュース', 'correct' => ['新鮮な', 'ジュース'], 'extra' => ['のどが渇いた']],
                            'tr' => ['sentence' => 'taze bir meyve suyu', 'correct' => ['taze', 'bir', 'meyve', 'suyu'], 'extra' => ['susamış']],
                        ],
                    ],
                    'b' => [
                        'words' => ['목이', '마릅니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am thirsty', 'correct' => ['I am', 'thirsty'], 'extra' => ['fresh']],
                            'az' => ['sentence' => 'mən susuz', 'correct' => ['mən', 'susuz'], 'extra' => ['təzə']],
                            'ar' => ['sentence' => 'أنا عطشان', 'correct' => ['أنا', 'عطشان'], 'extra' => ['طازج']],
                            'ru' => ['sentence' => 'я хочу пить', 'correct' => ['я', 'хочу пить'], 'extra' => ['свежий']],
                            'es' => ['sentence' => 'Tengo sed', 'correct' => ['soy', 'sediento'], 'extra' => ['fresco', 'zumo']],
                            'de' => ['sentence' => 'Ich bin durstig', 'correct' => ['ich bin', 'durstig'], 'extra' => ['frisch', 'Saft']],
                            'fr' => ['sentence' => 'J\'ai soif', 'correct' => ['je suis', 'assoiffé'], 'extra' => ['frais']],
                            'ja' => ['sentence' => 'のどが渇いています', 'correct' => ['のどが', '渇いています'], 'extra' => ['新鮮']],
                            'tr' => ['sentence' => 'susadım', 'correct' => ['susadım'], 'extra' => ['taze']],
                        ],
                    ],
                    'c' => [
                        'words' => ['주스와', '물'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a juice and a water', 'correct' => ['a', 'juice', 'and', 'a', 'water'], 'extra' => ['fresh']],
                            'az' => ['sentence' => 'bir şirə və bir su', 'correct' => ['bir', 'şirə', 'və', 'bir', 'su'], 'extra' => ['təzə']],
                            'ar' => ['sentence' => 'عصير و ماء', 'correct' => ['عصير', 'و', 'ماء'], 'extra' => ['طازج']],
                            'ru' => ['sentence' => 'сок и вода', 'correct' => ['сок', 'и', 'вода'], 'extra' => ['свежий']],
                            'es' => ['sentence' => 'Un zumo y un agua', 'correct' => ['un', 'zumo', 'y', 'un', 'agua'], 'extra' => ['fresco']],
                            'de' => ['sentence' => 'Ein Saft und ein Wasser', 'correct' => ['ein', 'Saft', 'und', 'ein', 'Wasser'], 'extra' => ['frisch']],
                            'fr' => ['sentence' => 'Un jus et une eau', 'correct' => ['un', 'jus', 'et', 'une', 'eau'], 'extra' => ['frais']],
                            'ja' => ['sentence' => 'ジュースと水', 'correct' => ['ジュース', 'と', '水'], 'extra' => ['新鮮']],
                            'tr' => ['sentence' => 'bir meyve suyu ve bir su', 'correct' => ['bir', 'meyve', 'suyu', 've', 'bir', 'su'], 'extra' => ['taze']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 커피 · 차', 3,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '차', 'img' => 'tea']],
                plain: [['ko' => '맥주'], ['ko' => '마시다']],
                phrases: [
                    'a' => [
                        'words' => ['맥주를', '마시고', '싶습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to drink a beer', 'correct' => ['I would like', 'to', 'drink', 'a', 'beer'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'istəyirəm içki bir pivə', 'correct' => ['istəyirəm', 'içki', 'bir', 'pivə'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أريد إلى مشروب بيرة', 'correct' => ['أريد', 'إلى', 'مشروب', 'بيرة'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'я хочу в напиток пиво', 'correct' => ['я', 'хочу', 'в', 'напиток', 'пиво'], 'extra' => ['чай']],
                            'es' => ['sentence' => 'Quisiera beber una cerveza', 'correct' => ['quisiera', 'a', 'beber', 'una', 'cerveza'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte ein Bier trinken', 'correct' => ['ich möchte', 'zu', 'trinken', 'ein', 'Bier'], 'extra' => ['Tee']],
                            'fr' => ['sentence' => 'Je voudrais boire une bière', 'correct' => ['je voudrais', 'à', 'boire', 'une', 'bière'], 'extra' => ['thé']],
                            'ja' => ['sentence' => 'ビールを飲みたいです', 'correct' => ['ビール', 'を', '飲み', 'たいです'], 'extra' => ['お茶']],
                            'tr' => ['sentence' => 'bir bira içmek istiyorum', 'correct' => ['bir', 'bira', 'içmek', 'istiyorum'], 'extra' => ['çay']],
                        ],
                    ],
                    'b' => [
                        'words' => ['커피', '또는', '차'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee or a tea', 'correct' => ['a', 'coffee', 'or', 'a', 'tea'], 'extra' => ['beer']],
                            'az' => ['sentence' => 'bir qəhvə və ya bir çay', 'correct' => ['bir', 'qəhvə', 'və ya', 'bir', 'çay'], 'extra' => ['pivə']],
                            'ar' => ['sentence' => 'قهوة أو شاي', 'correct' => ['قهوة', 'أو', 'شاي'], 'extra' => ['بيرة']],
                            'ru' => ['sentence' => 'кофе или чай', 'correct' => ['кофе', 'или', 'чай'], 'extra' => ['пиво']],
                            'es' => ['sentence' => 'Un café o un té', 'correct' => ['un', 'café', 'o', 'un', 'té'], 'extra' => ['cerveza', 'beber']],
                            'de' => ['sentence' => 'Ein Kaffee oder ein Tee', 'correct' => ['ein', 'Kaffee', 'oder', 'ein', 'Tee'], 'extra' => ['Bier', 'trinken']],
                            'fr' => ['sentence' => 'Un café ou un thé', 'correct' => ['un', 'café', 'ou', 'un', 'thé'], 'extra' => ['bière']],
                            'ja' => ['sentence' => 'コーヒーかお茶', 'correct' => ['コーヒー', 'か', 'お茶'], 'extra' => ['ビール']],
                            'tr' => ['sentence' => 'bir kahve veya bir çay', 'correct' => ['bir', 'kahve', 'veya', 'bir', 'çay'], 'extra' => ['bira']],
                        ],
                    ],
                    'c' => [
                        'words' => ['뜨거운', '커피를', '마시세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'drink a hot coffee', 'correct' => ['drink', 'a', 'hot', 'coffee'], 'extra' => ['beer']],
                            'az' => ['sentence' => 'içki bir isti qəhvə', 'correct' => ['içki', 'bir', 'isti', 'qəhvə'], 'extra' => ['pivə']],
                            'ar' => ['sentence' => 'مشروب ساخن قهوة', 'correct' => ['مشروب', 'ساخن', 'قهوة'], 'extra' => ['بيرة']],
                            'ru' => ['sentence' => 'напиток горячий кофе', 'correct' => ['напиток', 'горячий', 'кофе'], 'extra' => ['пиво']],
                            'es' => ['sentence' => 'Beber un café caliente', 'correct' => ['beber', 'un', 'café', 'caliente'], 'extra' => ['cerveza', 'té']],
                            'de' => ['sentence' => 'Einen heißen Kaffee trinken', 'correct' => ['trinken', 'einen', 'heiß', 'Kaffee'], 'extra' => ['Bier', 'Tee']],
                            'fr' => ['sentence' => 'Boire un café chaud', 'correct' => ['boire', 'un', 'café', 'chaud'], 'extra' => ['bière']],
                            'ja' => ['sentence' => '熱いコーヒーを飲む', 'correct' => ['熱い', 'コーヒー', 'を', '飲む'], 'extra' => ['ビール']],
                            'tr' => ['sentence' => 'sıcak bir kahve iç', 'correct' => ['sıcak', 'bir', 'kahve', 'iç'], 'extra' => ['bira']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 우유 · 설탕', 4,
                pictures: [['ko' => '우유', 'img' => 'milk'], ['ko' => '설탕', 'img' => 'sugar']],
                plain: [['ko' => '얼음'], ['ko' => '단']],
                phrases: [
                    'a' => [
                        'words' => ['얼음이', '든', '커피'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee with ice', 'correct' => ['a', 'coffee', 'with', 'ice'], 'extra' => ['sweet']],
                            'az' => ['sentence' => 'bir qəhvə ilə buz', 'correct' => ['bir', 'qəhvə', 'ilə', 'buz'], 'extra' => ['şirin']],
                            'ar' => ['sentence' => 'قهوة مع الثلج', 'correct' => ['قهوة', 'مع', 'الثلج'], 'extra' => ['حلو']],
                            'ru' => ['sentence' => 'кофе с лёд', 'correct' => ['кофе', 'с', 'лёд'], 'extra' => ['сладкий']],
                            'es' => ['sentence' => 'Un café con hielo', 'correct' => ['un', 'café', 'con', 'hielo'], 'extra' => ['dulce', 'azúcar']],
                            'de' => ['sentence' => 'Ein Kaffee mit Eiswürfeln', 'correct' => ['ein', 'Kaffee', 'mit', 'Eiswürfel'], 'extra' => ['süß', 'Zucker']],
                            'fr' => ['sentence' => 'Un café avec des glaçons', 'correct' => ['un', 'café', 'avec', 'glaçons'], 'extra' => ['sucré']],
                            'ja' => ['sentence' => '氷入りのコーヒー', 'correct' => ['氷', '入り', 'の', 'コーヒー'], 'extra' => ['甘い']],
                            'tr' => ['sentence' => 'buzlu bir kahve', 'correct' => ['buzlu', 'bir', 'kahve'], 'extra' => ['tatlı']],
                        ],
                    ],
                    'b' => [
                        'words' => ['우유는', '답니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the milk is sweet', 'correct' => ['the', 'milk', 'is', 'sweet'], 'extra' => ['ice']],
                            'az' => ['sentence' => 'süd şirin', 'correct' => ['süd', 'şirin'], 'extra' => ['buz']],
                            'ar' => ['sentence' => 'حليب حلو', 'correct' => ['حليب', 'حلو'], 'extra' => ['الثلج']],
                            'ru' => ['sentence' => 'молоко сладкий', 'correct' => ['молоко', 'сладкий'], 'extra' => ['лёд']],
                            'es' => ['sentence' => 'La leche es dulce', 'correct' => ['la', 'leche', 'es', 'dulce'], 'extra' => ['hielo', 'azúcar']],
                            'de' => ['sentence' => 'Die Milch ist süß', 'correct' => ['die', 'Milch', 'ist', 'süß'], 'extra' => ['Eiswürfel', 'Zucker']],
                            'fr' => ['sentence' => 'Le lait est sucré', 'correct' => ['le', 'lait', 'est', 'sucré'], 'extra' => ['glaçons']],
                            'ja' => ['sentence' => '牛乳は甘いです', 'correct' => ['牛乳', 'は', '甘い', 'です'], 'extra' => ['氷']],
                            'tr' => ['sentence' => 'süt tatlı', 'correct' => ['süt', 'tatlı'], 'extra' => ['buz']],
                        ],
                    ],
                    'c' => [
                        'words' => ['약간의', '설탕과', '얼음'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'some sugar and some ice', 'correct' => ['some', 'sugar', 'and', 'some', 'ice'], 'extra' => ['sweet']],
                            'az' => ['sentence' => 'bir az şəkər və bir az buz', 'correct' => ['bir az', 'şəkər', 'və', 'bir az', 'buz'], 'extra' => ['şirin']],
                            'ar' => ['sentence' => 'بعض سكر و بعض الثلج', 'correct' => ['بعض', 'سكر', 'و', 'بعض', 'الثلج'], 'extra' => ['حلو']],
                            'ru' => ['sentence' => 'немного сахар и немного лёд', 'correct' => ['немного', 'сахар', 'и', 'немного', 'лёд'], 'extra' => ['сладкий']],
                            'es' => ['sentence' => 'Algo de azúcar y algo de hielo', 'correct' => ['algo de', 'azúcar', 'y', 'algo de', 'hielo'], 'extra' => ['dulce']],
                            'de' => ['sentence' => 'Etwas Zucker und etwas Eis', 'correct' => ['etwas', 'Zucker', 'und', 'etwas', 'Eiswürfel'], 'extra' => ['süß']],
                            'fr' => ['sentence' => 'Du sucre et des glaçons', 'correct' => ['du', 'sucre', 'et', 'du', 'glaçons'], 'extra' => ['sucré']],
                            'ja' => ['sentence' => '砂糖と氷', 'correct' => ['砂糖', 'と', '氷'], 'extra' => ['甘い']],
                            'tr' => ['sentence' => 'biraz şeker ve biraz buz', 'correct' => ['biraz', 'şeker', 've', 'biraz', 'buz'], 'extra' => ['tatlı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 물 · 와인', 5,
                pictures: [['ko' => '물', 'img' => 'water'], ['ko' => '와인', 'img' => 'wine']],
                plain: [['ko' => '가져오다'], ['ko' => '하나 더']],
                phrases: [
                    'a' => [
                        'words' => ['와인', '하나', '더', '가져오세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'to bring another wine', 'correct' => ['to bring', 'another', 'wine'], 'extra' => ['water']],
                            'az' => ['sentence' => 'gətirmək başqa şərab', 'correct' => ['gətirmək', 'başqa', 'şərab'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'الإحضار آخر نبيذ', 'correct' => ['الإحضار', 'آخر', 'نبيذ'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'принести другой вино', 'correct' => ['принести', 'другой', 'вино'], 'extra' => ['вода']],
                            'es' => ['sentence' => 'Traer otro vino', 'correct' => ['traer', 'otro', 'vino'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Noch einen Wein bringen', 'correct' => ['bringen', 'noch ein', 'Wein'], 'extra' => ['Wasser']],
                            'fr' => ['sentence' => 'Apporter encore un vin', 'correct' => ['apporter', 'encore', 'vin'], 'extra' => ['eau']],
                            'ja' => ['sentence' => 'ワインをもう一つ持ってくる', 'correct' => ['ワイン', 'を', 'もう一つ', '持ってくる'], 'extra' => ['水']],
                            'tr' => ['sentence' => 'bir şarap daha getirmek', 'correct' => ['bir', 'şarap', 'daha', 'getirmek'], 'extra' => ['su']],
                        ],
                    ],
                    'b' => [
                        'words' => ['물을', '가져오세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to bring a water', 'correct' => ['to bring', 'a', 'water'], 'extra' => ['another']],
                            'az' => ['sentence' => 'gətirmək bir su', 'correct' => ['gətirmək', 'bir', 'su'], 'extra' => ['başqa']],
                            'ar' => ['sentence' => 'الإحضار ماء', 'correct' => ['الإحضار', 'ماء'], 'extra' => ['آخر']],
                            'ru' => ['sentence' => 'принести вода', 'correct' => ['принести', 'вода'], 'extra' => ['другой']],
                            'es' => ['sentence' => 'Traer un agua', 'correct' => ['traer', 'un', 'agua'], 'extra' => ['otro', 'vino']],
                            'de' => ['sentence' => 'Ein Wasser bringen', 'correct' => ['ein', 'Wasser', 'bringen'], 'extra' => ['noch ein', 'Wein']],
                            'fr' => ['sentence' => 'Apporter une eau', 'correct' => ['apporter', 'une', 'eau'], 'extra' => ['encore']],
                            'ja' => ['sentence' => '水を持ってくる', 'correct' => ['水', 'を', '持ってくる'], 'extra' => ['もう一つの']],
                            'tr' => ['sentence' => 'bir su getirmek', 'correct' => ['bir', 'su', 'getirmek'], 'extra' => ['başka']],
                        ],
                    ],
                    'c' => [
                        'words' => ['와인', '한', '잔', '더'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'another glass of wine', 'correct' => ['another', 'glass', 'of', 'wine'], 'extra' => ['water']],
                            'az' => ['sentence' => 'başqa stəkan şərab', 'correct' => ['başqa', 'stəkan', 'şərab'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'آخر كوب نبيذ', 'correct' => ['آخر', 'كوب', 'نبيذ'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'другой стакан вино', 'correct' => ['другой', 'стакан', 'вино'], 'extra' => ['вода']],
                            'es' => ['sentence' => 'Otro vaso de vino', 'correct' => ['otro', 'vaso', 'de', 'vino'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Noch ein Glas Wein', 'correct' => ['noch ein', 'Glas', 'von', 'Wein'], 'extra' => ['Wasser']],
                            'fr' => ['sentence' => 'Encore un verre de vin', 'correct' => ['encore', 'verre', 'de', 'vin'], 'extra' => ['eau']],
                            'ja' => ['sentence' => 'ワインをもう一杯', 'correct' => ['ワイン', 'を', 'もう', '一', '杯'], 'extra' => ['水']],
                            'tr' => ['sentence' => 'bir bardak şarap daha', 'correct' => ['bir', 'bardak', 'şarap', 'daha'], 'extra' => ['su']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
