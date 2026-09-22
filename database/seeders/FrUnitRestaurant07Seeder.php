<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant07Seeder extends Seeder
{
    private const PICTURES = [
        'Vin' => 'wine', 'Verre' => 'glass', 'Jus' => 'juice', 'Eau' => 'water',
        'Café' => 'coffee', 'Thé' => 'tea', 'Lait' => 'milk', 'Sucre' => 'sugar',
    ];

    /**
     * French Chapter 3, Unit 7 — drinks.
     *
     * Drinks are where French quantity words show up constantly ("un verre de",
     * "une bouteille de", "des glaçons"), so the lessons build the container
     * before the contents: first the glass and the bottle, then what goes in
     * them, then how you want it served.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Drinks and Beverages', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Glass of Wine', 1,
                pictures: [['fr' => 'Vin', 'img' => 'wine'], ['fr' => 'Verre', 'img' => 'glass']],
                plain: [['fr' => 'Bouteille'], ['fr' => 'Rouge']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'verre', 'de', 'vin'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A glass of wine', 'correct' => ['a', 'glass', 'of', 'wine'], 'extra' => ['bottle', 'red']],
                            'az' => ['sentence' => 'bir stəkan şərab', 'correct' => ['bir', 'stəkan', 'şərab'], 'extra' => ['şüşə', 'qırmızı']],
                            'ar' => ['sentence' => 'كوب نبيذ', 'correct' => ['كوب', 'نبيذ'], 'extra' => ['زجاجة', 'أحمر']],
                            'ru' => ['sentence' => 'стакан вино', 'correct' => ['стакан', 'вино'], 'extra' => ['бутылка', 'красный']],
                            'es' => ['sentence' => 'Un vaso de vino', 'correct' => ['un', 'vaso', 'de', 'vino'], 'extra' => ['botella', 'rojo']],
                            'de' => ['sentence' => 'Ein Glas Wein', 'correct' => ['ein', 'Glas', 'von', 'Wein'], 'extra' => ['Flasche', 'rot']],
                            'ja' => ['sentence' => 'ワイン一杯', 'correct' => ['ワイン', '一', '杯'], 'extra' => ['ボトル', '赤']],
                            'ko' => ['sentence' => '와인 한 잔', 'correct' => ['와인', '한', '잔'], 'extra' => ['병', '빨간색']],
                            'tr' => ['sentence' => 'bir bardak şarap', 'correct' => ['bir', 'bardak', 'şarap'], 'extra' => ['şişe', 'kırmızı']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'bouteille', 'de', 'vin', 'rouge'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A bottle of red wine', 'correct' => ['a', 'bottle', 'of', 'red', 'wine'], 'extra' => ['glass']],
                            'az' => ['sentence' => 'bir şüşə qırmızı şərab', 'correct' => ['bir', 'şüşə', 'qırmızı', 'şərab'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'زجاجة أحمر نبيذ', 'correct' => ['زجاجة', 'أحمر', 'نبيذ'], 'extra' => ['كوب']],
                            'ru' => ['sentence' => 'бутылка красный вино', 'correct' => ['бутылка', 'красный', 'вино'], 'extra' => ['стакан']],
                            'es' => ['sentence' => 'Una botella de vino tinto', 'correct' => ['una', 'botella', 'de', 'vino', 'tinto'], 'extra' => ['vaso']],
                            'de' => ['sentence' => 'Eine Flasche Rotwein', 'correct' => ['eine', 'Flasche', 'von', 'rot', 'Wein'], 'extra' => ['Glas']],
                            'ja' => ['sentence' => '赤ワインのボトル', 'correct' => ['赤', 'ワイン', 'の', 'ボトル'], 'extra' => ['グラス']],
                            'ko' => ['sentence' => '레드 와인 한 병', 'correct' => ['레드', '와인', '한', '병'], 'extra' => ['유리잔']],
                            'tr' => ['sentence' => 'bir şişe kırmızı şarap', 'correct' => ['bir', 'şişe', 'kırmızı', 'şarap'], 'extra' => ['bardak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'verre', 'rouge', 'et', 'une', 'bouteille'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A red glass and a bottle', 'correct' => ['a', 'red', 'glass', 'and', 'a', 'bottle'], 'extra' => ['wine']],
                            'az' => ['sentence' => 'bir qırmızı stəkan və bir şüşə', 'correct' => ['bir', 'qırmızı', 'stəkan', 'və', 'bir', 'şüşə'], 'extra' => ['şərab']],
                            'ar' => ['sentence' => 'أحمر كوب و زجاجة', 'correct' => ['أحمر', 'كوب', 'و', 'زجاجة'], 'extra' => ['نبيذ']],
                            'ru' => ['sentence' => 'красный стакан и бутылка', 'correct' => ['красный', 'стакан', 'и', 'бутылка'], 'extra' => ['вино']],
                            'es' => ['sentence' => 'Un vaso rojo y una botella', 'correct' => ['un', 'vaso', 'rojo', 'y', 'una', 'botella'], 'extra' => ['vino']],
                            'de' => ['sentence' => 'Ein rotes Glas und eine Flasche', 'correct' => ['ein', 'rot', 'Glas', 'und', 'eine', 'Flasche'], 'extra' => ['Wein']],
                            'ja' => ['sentence' => '赤いグラスとボトル', 'correct' => ['赤い', 'グラス', 'と', 'ボトル'], 'extra' => ['ワイン']],
                            'ko' => ['sentence' => '빨간 유리잔과 병', 'correct' => ['빨간', '유리잔과', '병'], 'extra' => ['와인']],
                            'tr' => ['sentence' => 'kırmızı bir bardak ve bir şişe', 'correct' => ['kırmızı', 'bir', 'bardak', 've', 'bir', 'şişe'], 'extra' => ['şarap']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Juice and Water', 2,
                pictures: [['fr' => 'Jus', 'img' => 'juice'], ['fr' => 'Eau', 'img' => 'water']],
                plain: [['fr' => 'Frais'], ['fr' => 'Soif']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'jus', 'frais'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A fresh juice', 'correct' => ['a', 'fresh', 'juice'], 'extra' => ['thirst', 'water']],
                            'az' => ['sentence' => 'bir təzə şirə', 'correct' => ['bir', 'təzə', 'şirə'], 'extra' => ['susuzluq', 'su']],
                            'ar' => ['sentence' => 'طازج عصير', 'correct' => ['طازج', 'عصير'], 'extra' => ['عطش', 'ماء']],
                            'ru' => ['sentence' => 'свежий сок', 'correct' => ['свежий', 'сок'], 'extra' => ['жажда', 'вода']],
                            'es' => ['sentence' => 'Un zumo fresco', 'correct' => ['un', 'zumo', 'fresco'], 'extra' => ['sed', 'agua']],
                            'de' => ['sentence' => 'Ein frischer Saft', 'correct' => ['ein', 'frisch', 'Saft'], 'extra' => ['Durst', 'Wasser']],
                            'ja' => ['sentence' => '新鮮なジュース', 'correct' => ['新鮮な', 'ジュース'], 'extra' => ['のどの渇き', '水']],
                            'ko' => ['sentence' => '신선한 주스', 'correct' => ['신선한', '주스'], 'extra' => ['갈증', '물']],
                            'tr' => ['sentence' => 'taze bir meyve suyu', 'correct' => ['taze', 'bir', 'meyve', 'suyu'], 'extra' => ['susuzluk', 'su']],
                        ],
                    ],
                    'b' => [
                        'words' => ["j'ai", 'soif'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am thirsty', 'correct' => ['I have', 'thirst'], 'extra' => ['fresh', 'juice']],
                            'az' => ['sentence' => 'məndə var susuzluq', 'correct' => ['məndə var', 'susuzluq'], 'extra' => ['təzə', 'şirə']],
                            'ar' => ['sentence' => 'عندي عطش', 'correct' => ['عندي', 'عطش'], 'extra' => ['طازج', 'عصير']],
                            'ru' => ['sentence' => 'у меня жажда', 'correct' => ['у', 'меня', 'жажда'], 'extra' => ['свежий', 'сок']],
                            'es' => ['sentence' => 'Tengo sed', 'correct' => ['tengo', 'sed'], 'extra' => ['fresco', 'zumo']],
                            'de' => ['sentence' => 'Ich habe Durst', 'correct' => ['ich habe', 'Durst'], 'extra' => ['frisch', 'Saft']],
                            'ja' => ['sentence' => 'のどが渇いています', 'correct' => ['のどが', '渇いています'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '목이 마릅니다', 'correct' => ['목이', '마릅니다'], 'extra' => ['신선한']],
                            'tr' => ['sentence' => 'susadım', 'correct' => ['susadım'], 'extra' => ['taze', 'meyve suyu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'jus', 'et', 'une', 'eau'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A juice and a water', 'correct' => ['a', 'juice', 'and', 'a', 'water'], 'extra' => ['fresh', 'thirst']],
                            'az' => ['sentence' => 'bir şirə və bir su', 'correct' => ['bir', 'şirə', 'və', 'bir', 'su'], 'extra' => ['təzə', 'susuzluq']],
                            'ar' => ['sentence' => 'عصير و ماء', 'correct' => ['عصير', 'و', 'ماء'], 'extra' => ['طازج', 'عطش']],
                            'ru' => ['sentence' => 'сок и вода', 'correct' => ['сок', 'и', 'вода'], 'extra' => ['свежий', 'жажда']],
                            'es' => ['sentence' => 'Un zumo y un agua', 'correct' => ['un', 'zumo', 'y', 'un', 'agua'], 'extra' => ['fresco', 'sed']],
                            'de' => ['sentence' => 'Ein Saft und ein Wasser', 'correct' => ['ein', 'Saft', 'und', 'ein', 'Wasser'], 'extra' => ['frisch', 'Durst']],
                            'ja' => ['sentence' => 'ジュースと水', 'correct' => ['ジュース', 'と', '水'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '주스와 물', 'correct' => ['주스와', '물'], 'extra' => ['신선한']],
                            'tr' => ['sentence' => 'bir meyve suyu ve bir su', 'correct' => ['bir', 'meyve', 'suyu', 've', 'bir', 'su'], 'extra' => ['taze', 'susuzluk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: A Beer to Drink', 3,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Thé', 'img' => 'tea']],
                plain: [['fr' => 'Bière'], ['fr' => 'Boire']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'boire', 'une', 'bière'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to drink a beer', 'correct' => ['I would like', 'to drink', 'a', 'beer'], 'extra' => ['tea', 'coffee']],
                            'az' => ['sentence' => 'istəyirəm içmək bir pivə', 'correct' => ['istəyirəm', 'içmək', 'bir', 'pivə'], 'extra' => ['çay', 'qəhvə']],
                            'ar' => ['sentence' => 'أريد الشرب بيرة', 'correct' => ['أريد', 'الشرب', 'بيرة'], 'extra' => ['شاي', 'قهوة']],
                            'ru' => ['sentence' => 'я хочу пить пиво', 'correct' => ['я', 'хочу', 'пить', 'пиво'], 'extra' => ['чай', 'кофе']],
                            'es' => ['sentence' => 'Quisiera beber una cerveza', 'correct' => ['quisiera', 'beber', 'una', 'cerveza'], 'extra' => ['té', 'café']],
                            'de' => ['sentence' => 'Ich möchte ein Bier trinken', 'correct' => ['ich möchte', 'ein', 'Bier', 'trinken'], 'extra' => ['Tee', 'Kaffee']],
                            'ja' => ['sentence' => 'ビールを飲みたいです', 'correct' => ['ビール', 'を', '飲み', 'たいです'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '맥주를 마시고 싶습니다', 'correct' => ['맥주를', '마시고', '싶습니다'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'bir bira içmek istiyorum', 'correct' => ['bir', 'bira', 'içmek', 'istiyorum'], 'extra' => ['çay', 'kahve']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'café', 'ou', 'un', 'thé'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee or a tea', 'correct' => ['a', 'coffee', 'or', 'a', 'tea'], 'extra' => ['beer', 'to drink']],
                            'az' => ['sentence' => 'bir qəhvə və ya bir çay', 'correct' => ['bir', 'qəhvə', 'və ya', 'bir', 'çay'], 'extra' => ['pivə', 'içmək']],
                            'ar' => ['sentence' => 'قهوة أو شاي', 'correct' => ['قهوة', 'أو', 'شاي'], 'extra' => ['بيرة', 'الشرب']],
                            'ru' => ['sentence' => 'кофе или чай', 'correct' => ['кофе', 'или', 'чай'], 'extra' => ['пиво', 'пить']],
                            'es' => ['sentence' => 'Un café o un té', 'correct' => ['un', 'café', 'o', 'un', 'té'], 'extra' => ['cerveza', 'beber']],
                            'de' => ['sentence' => 'Ein Kaffee oder ein Tee', 'correct' => ['ein', 'Kaffee', 'oder', 'ein', 'Tee'], 'extra' => ['Bier', 'trinken']],
                            'ja' => ['sentence' => 'コーヒーかお茶', 'correct' => ['コーヒー', 'か', 'お茶'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '커피 또는 차', 'correct' => ['커피', '또는', '차'], 'extra' => ['맥주']],
                            'tr' => ['sentence' => 'bir kahve veya bir çay', 'correct' => ['bir', 'kahve', 'veya', 'bir', 'çay'], 'extra' => ['bira', 'içmek']],
                        ],
                    ],
                    'c' => [
                        'words' => ['boire', 'un', 'café', 'chaud'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To drink a hot coffee', 'correct' => ['to drink', 'a', 'hot', 'coffee'], 'extra' => ['beer', 'tea']],
                            'az' => ['sentence' => 'içmək bir isti qəhvə', 'correct' => ['içmək', 'bir', 'isti', 'qəhvə'], 'extra' => ['pivə', 'çay']],
                            'ar' => ['sentence' => 'الشرب ساخن قهوة', 'correct' => ['الشرب', 'ساخن', 'قهوة'], 'extra' => ['بيرة', 'شاي']],
                            'ru' => ['sentence' => 'пить горячий кофе', 'correct' => ['пить', 'горячий', 'кофе'], 'extra' => ['пиво', 'чай']],
                            'es' => ['sentence' => 'Beber un café caliente', 'correct' => ['beber', 'un', 'café', 'caliente'], 'extra' => ['cerveza', 'té']],
                            'de' => ['sentence' => 'Einen heißen Kaffee trinken', 'correct' => ['trinken', 'einen', 'heiß', 'Kaffee'], 'extra' => ['Bier', 'Tee']],
                            'ja' => ['sentence' => '熱いコーヒーを飲む', 'correct' => ['熱い', 'コーヒー', 'を', '飲む'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '뜨거운 커피를 마시다', 'correct' => ['뜨거운', '커피를', '마시다'], 'extra' => ['맥주']],
                            'tr' => ['sentence' => 'sıcak bir kahve içmek', 'correct' => ['sıcak', 'bir', 'kahve', 'içmek'], 'extra' => ['bira', 'çay']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Milk, Sugar and Ice', 4,
                pictures: [['fr' => 'Lait', 'img' => 'milk'], ['fr' => 'Sucre', 'img' => 'sugar']],
                plain: [['fr' => 'Glaçons'], ['fr' => 'Sucré']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'café', 'avec', 'des', 'glaçons'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee with ice cubes', 'correct' => ['a', 'coffee', 'with', 'some', 'ice cubes'], 'extra' => ['sweet', 'sugar']],
                            'az' => ['sentence' => 'bir qəhvə ilə bir az buz parçaları', 'correct' => ['bir', 'qəhvə', 'ilə', 'bir az', 'buz parçaları'], 'extra' => ['şirin', 'şəkər']],
                            'ar' => ['sentence' => 'قهوة مع بعض مكعبات ثلج', 'correct' => ['قهوة', 'مع', 'بعض', 'مكعبات ثلج'], 'extra' => ['حلو', 'سكر']],
                            'ru' => ['sentence' => 'кофе с немного кубики льда', 'correct' => ['кофе', 'с', 'немного', 'кубики льда'], 'extra' => ['сладкий', 'сахар']],
                            'es' => ['sentence' => 'Un café con hielo', 'correct' => ['un', 'café', 'con', 'unos', 'hielo'], 'extra' => ['dulce', 'azúcar']],
                            'de' => ['sentence' => 'Ein Kaffee mit Eiswürfeln', 'correct' => ['ein', 'Kaffee', 'mit', 'einigen', 'Eiswürfel'], 'extra' => ['süß', 'Zucker']],
                            'ja' => ['sentence' => '氷入りのコーヒー', 'correct' => ['氷', '入り', 'の', 'コーヒー'], 'extra' => ['甘い']],
                            'ko' => ['sentence' => '얼음이 든 커피', 'correct' => ['얼음이', '든', '커피'], 'extra' => ['단']],
                            'tr' => ['sentence' => 'buzlu bir kahve', 'correct' => ['buzlu', 'bir', 'kahve'], 'extra' => ['tatlı', 'şeker']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'lait', 'est', 'sucré'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The milk is sweet', 'correct' => ['the', 'milk', 'is', 'sweet'], 'extra' => ['ice cubes', 'sugar']],
                            'az' => ['sentence' => 'süd şirin', 'correct' => ['süd', 'şirin'], 'extra' => ['buz parçaları', 'şəkər']],
                            'ar' => ['sentence' => 'حليب حلو', 'correct' => ['حليب', 'حلو'], 'extra' => ['مكعبات ثلج', 'سكر']],
                            'ru' => ['sentence' => 'молоко сладкий', 'correct' => ['молоко', 'сладкий'], 'extra' => ['кубики льда', 'сахар']],
                            'es' => ['sentence' => 'La leche es dulce', 'correct' => ['la', 'leche', 'es', 'dulce'], 'extra' => ['hielo', 'azúcar']],
                            'de' => ['sentence' => 'Die Milch ist süß', 'correct' => ['die', 'Milch', 'ist', 'süß'], 'extra' => ['Eiswürfel', 'Zucker']],
                            'ja' => ['sentence' => '牛乳は甘いです', 'correct' => ['牛乳', 'は', '甘い', 'です'], 'extra' => ['氷']],
                            'ko' => ['sentence' => '우유는 답니다', 'correct' => ['우유는', '답니다'], 'extra' => ['얼음']],
                            'tr' => ['sentence' => 'süt tatlı', 'correct' => ['süt', 'tatlı'], 'extra' => ['buz', 'şeker']],
                        ],
                    ],
                    'c' => [
                        'words' => ['du', 'sucre', 'et', 'des', 'glaçons'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Some sugar and some ice cubes', 'correct' => ['some', 'sugar', 'and', 'some', 'ice cubes'], 'extra' => ['sweet', 'milk']],
                            'az' => ['sentence' => 'bir az şəkər və bir az buz parçaları', 'correct' => ['bir az', 'şəkər', 'və', 'bir az', 'buz parçaları'], 'extra' => ['şirin', 'süd']],
                            'ar' => ['sentence' => 'بعض سكر و بعض مكعبات ثلج', 'correct' => ['بعض', 'سكر', 'و', 'بعض', 'مكعبات ثلج'], 'extra' => ['حلو', 'حليب']],
                            'ru' => ['sentence' => 'немного сахар и немного кубики льда', 'correct' => ['немного', 'сахар', 'и', 'немного', 'кубики льда'], 'extra' => ['сладкий', 'молоко']],
                            'es' => ['sentence' => 'Algo de azúcar y algo de hielo', 'correct' => ['algo de', 'azúcar', 'y', 'unos', 'hielo'], 'extra' => ['dulce', 'leche']],
                            'de' => ['sentence' => 'Etwas Zucker und einige Eiswürfel', 'correct' => ['etwas', 'Zucker', 'und', 'einigen', 'Eiswürfel'], 'extra' => ['süß', 'Milch']],
                            'ja' => ['sentence' => '砂糖と氷', 'correct' => ['砂糖', 'と', '氷'], 'extra' => ['甘い']],
                            'ko' => ['sentence' => '약간의 설탕과 얼음', 'correct' => ['약간의', '설탕과', '얼음'], 'extra' => ['단']],
                            'tr' => ['sentence' => 'biraz şeker ve biraz buz', 'correct' => ['biraz', 'şeker', 've', 'biraz', 'buz'], 'extra' => ['tatlı', 'süt']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Another One, Please', 5,
                pictures: [['fr' => 'Eau', 'img' => 'water'], ['fr' => 'Vin', 'img' => 'wine']],
                plain: [['fr' => 'Apporter'], ['fr' => 'Encore']],
                phrases: [
                    'a' => [
                        'words' => ['apporter', 'encore', 'du', 'vin'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To bring more wine', 'correct' => ['to bring', 'more', 'some', 'wine'], 'extra' => ['water']],
                            'az' => ['sentence' => 'gətirmək daha bir az şərab', 'correct' => ['gətirmək', 'daha', 'bir az', 'şərab'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'الإحضار أكثر بعض نبيذ', 'correct' => ['الإحضار', 'أكثر', 'بعض', 'نبيذ'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'принести больше немного вино', 'correct' => ['принести', 'больше', 'немного', 'вино'], 'extra' => ['вода']],
                            'es' => ['sentence' => 'Traer más vino', 'correct' => ['traer', 'más', 'algo de', 'vino'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Mehr Wein bringen', 'correct' => ['bringen', 'noch', 'etwas', 'Wein'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => 'ワインをもっと持ってくる', 'correct' => ['ワイン', 'を', 'もっと', '持ってくる'], 'extra' => ['水']],
                            'ko' => ['sentence' => '와인을 더 가져오다', 'correct' => ['와인을', '더', '가져오다'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'daha çok şarap getirmek', 'correct' => ['daha', 'çok', 'şarap', 'getirmek'], 'extra' => ['su']],
                        ],
                    ],
                    'b' => [
                        'words' => ['apporter', 'une', 'eau'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To bring a water', 'correct' => ['to bring', 'a', 'water'], 'extra' => ['more', 'wine']],
                            'az' => ['sentence' => 'gətirmək bir su', 'correct' => ['gətirmək', 'bir', 'su'], 'extra' => ['daha', 'şərab']],
                            'ar' => ['sentence' => 'الإحضار ماء', 'correct' => ['الإحضار', 'ماء'], 'extra' => ['أكثر', 'نبيذ']],
                            'ru' => ['sentence' => 'принести вода', 'correct' => ['принести', 'вода'], 'extra' => ['больше', 'вино']],
                            'es' => ['sentence' => 'Traer un agua', 'correct' => ['traer', 'un', 'agua'], 'extra' => ['más', 'vino']],
                            'de' => ['sentence' => 'Ein Wasser bringen', 'correct' => ['ein', 'Wasser', 'bringen'], 'extra' => ['noch', 'Wein']],
                            'ja' => ['sentence' => '水を持ってくる', 'correct' => ['水', 'を', '持ってくる'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '물을 가져오다', 'correct' => ['물을', '가져오다'], 'extra' => ['더']],
                            'tr' => ['sentence' => 'bir su getirmek', 'correct' => ['bir', 'su', 'getirmek'], 'extra' => ['daha çok', 'şarap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['encore', 'un', 'verre', 'de', 'vin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Another glass of wine', 'correct' => ['another', 'a', 'glass', 'of', 'wine'], 'extra' => ['to bring', 'water']],
                            'az' => ['sentence' => 'başqa bir stəkan şərab', 'correct' => ['başqa', 'bir', 'stəkan', 'şərab'], 'extra' => ['gətirmək', 'su']],
                            'ar' => ['sentence' => 'آخر كوب نبيذ', 'correct' => ['آخر', 'كوب', 'نبيذ'], 'extra' => ['الإحضار', 'ماء']],
                            'ru' => ['sentence' => 'другой стакан вино', 'correct' => ['другой', 'стакан', 'вино'], 'extra' => ['принести', 'вода']],
                            'es' => ['sentence' => 'Otro vaso de vino', 'correct' => ['más', 'un', 'vaso', 'de', 'vino'], 'extra' => ['traer', 'agua']],
                            'de' => ['sentence' => 'Noch ein Glas Wein', 'correct' => ['noch', 'ein', 'Glas', 'von', 'Wein'], 'extra' => ['bringen', 'Wasser']],
                            'ja' => ['sentence' => 'ワインをもう一杯', 'correct' => ['ワイン', 'を', 'もう', '一', '杯'], 'extra' => ['水']],
                            'ko' => ['sentence' => '와인 한 잔 더', 'correct' => ['와인', '한', '잔', '더'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'bir bardak şarap daha', 'correct' => ['bir', 'bardak', 'şarap', 'daha'], 'extra' => ['getirmek', 'su']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
