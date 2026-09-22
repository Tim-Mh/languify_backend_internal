<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitRestaurant07Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'شاي' => 'tea', 'قهوة' => 'coffee', 'ماء' => 'water', 'حليب' => 'milk',
        'خبز' => 'bread', 'جبن' => 'cheese', 'كعكة' => 'cake', 'سكر' => 'sugar',
    ];

    /**
     * Arabic Restaurant Unit 7.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Drinks and Beverages', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Drink', 1,
                pictures: [['ar' => 'شاي', 'img' => 'tea'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'أريد'], ['ar' => 'مشروب']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'مشروب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like a drink', 'correct' => ['I would like', 'a', 'drink'], 'extra' => ['ice']],
                            'az' => ['sentence' => 'istəyirəm bir içki', 'correct' => ['istəyirəm', 'bir', 'içki'], 'extra' => ['buz']],
                            'fr' => ['sentence' => 'Je voudrais une boisson', 'correct' => ['je voudrais', 'une', 'boisson'], 'extra' => ['glace']],
                            'es' => ['sentence' => 'Quisiera una bebida', 'correct' => ['quisiera', 'una', 'bebida'], 'extra' => ['hielo']],
                            'de' => ['sentence' => 'Ich möchte ein Getränk', 'correct' => ['ich möchte', 'ein', 'Getränk'], 'extra' => ['Eis']],
                            'ja' => ['sentence' => '飲み物をください', 'correct' => ['飲み物を', 'ください'], 'extra' => ['氷']],
                            'ko' => ['sentence' => '음료 주세요', 'correct' => ['음료', '주세요'], 'extra' => ['얼음']],
                            'tr' => ['sentence' => 'bir içecek istiyorum', 'correct' => ['bir', 'içecek', 'istiyorum'], 'extra' => ['i̇çecek', 'buz']],
                            'ru' => ['sentence' => 'я хочу напиток', 'correct' => ['я', 'хочу', 'напиток'], 'extra' => ['лёд']],
                        ],
                    ],
                    'b' => [
                        'words' => ['شاي', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A tea please', 'correct' => ['a', 'tea', 'please'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'bir çay zəhmət olmasa', 'correct' => ['bir', 'çay', 'zəhmət olmasa'], 'extra' => ['qəhvə']],
                            'fr' => ['sentence' => 'Un thé s’il vous plaît', 'correct' => ['un', 'thé', 's’il vous plaît'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Un té por favor', 'correct' => ['un', 'té', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Einen Tee bitte', 'correct' => ['einen', 'Tee', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お茶を一つお願いします', 'correct' => ['お茶を', '一つ', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '차 하나 부탁합니다', 'correct' => ['차', '하나', '부탁합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bir çay lütfen', 'correct' => ['bir', 'çay', 'lütfen'], 'extra' => ['i̇çecek', 'buz']],
                            'ru' => ['sentence' => 'чай пожалуйста', 'correct' => ['чай', 'пожалуйста'], 'extra' => ['кофе']],
                        ],
                    ],
                    'c' => [
                        'words' => ['هل', 'الثلج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Is there ice', 'correct' => ['is there', 'ice'], 'extra' => ['sugar']],
                            'az' => ['sentence' => 'mı buz', 'correct' => ['mı', 'buz'], 'extra' => ['şəkər']],
                            'fr' => ['sentence' => 'Y a-t-il de la glace', 'correct' => ['y a-t-il', 'de la glace'], 'extra' => ['sucre']],
                            'es' => ['sentence' => 'Hay hielo', 'correct' => ['hay', 'hielo'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Gibt es Eis', 'correct' => ['gibt es', 'Eis'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => '氷がありますか', 'correct' => ['氷が', 'ありますか'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '얼음이 있어요', 'correct' => ['얼음이', '있어요'], 'extra' => ['설탕']],
                            'tr' => ['sentence' => 'buz var mı', 'correct' => ['buz', 'var', 'mı'], 'extra' => ['i̇çecek', 'su']],
                            'ru' => ['sentence' => 'ли лёд', 'correct' => ['ли', 'лёд'], 'extra' => ['сахар']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: With & Without Ice', 2,
                pictures: [['ar' => 'ماء', 'img' => 'water'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'مع الثلج'], ['ar' => 'بدون ثلج']],
                phrases: [
                    'a' => [
                        'words' => ['ماء', 'مع الثلج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Water with ice', 'correct' => ['water', 'with ice'], 'extra' => ['without ice']],
                            'az' => ['sentence' => 'su buzlu', 'correct' => ['su', 'buzlu'], 'extra' => ['buzsuz']],
                            'fr' => ['sentence' => 'De l’eau avec de la glace', 'correct' => ['de l’eau', 'avec de la glace'], 'extra' => ['sans glace']],
                            'es' => ['sentence' => 'Agua con hielo', 'correct' => ['agua', 'con hielo'], 'extra' => ['sin hielo']],
                            'de' => ['sentence' => 'Wasser mit Eis', 'correct' => ['Wasser', 'mit Eis'], 'extra' => ['ohne Eis']],
                            'ja' => ['sentence' => '氷入りの水', 'correct' => ['氷入りの', '水'], 'extra' => ['氷なしの']],
                            'ko' => ['sentence' => '얼음 있는 물', 'correct' => ['얼음 있는', '물'], 'extra' => ['얼음 없는']],
                            'tr' => ['sentence' => 'buzlu su', 'correct' => ['buzlu', 'su'], 'extra' => ['buz', 'i̇çecek']],
                            'ru' => ['sentence' => 'вода со льдом', 'correct' => ['вода', 'со', 'льдом'], 'extra' => ['без', 'льда']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ماء', 'بدون ثلج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Water without ice', 'correct' => ['water', 'without ice'], 'extra' => ['with ice']],
                            'az' => ['sentence' => 'su buzsuz', 'correct' => ['su', 'buzsuz'], 'extra' => ['buzlu']],
                            'fr' => ['sentence' => 'De l’eau sans glace', 'correct' => ['de l’eau', 'sans glace'], 'extra' => ['avec de la glace']],
                            'es' => ['sentence' => 'Agua sin hielo', 'correct' => ['agua', 'sin hielo'], 'extra' => ['con hielo']],
                            'de' => ['sentence' => 'Wasser ohne Eis', 'correct' => ['Wasser', 'ohne Eis'], 'extra' => ['mit Eis']],
                            'ja' => ['sentence' => '氷なしの水', 'correct' => ['氷なしの', '水'], 'extra' => ['氷入りの']],
                            'ko' => ['sentence' => '얼음 없는 물', 'correct' => ['얼음 없는', '물'], 'extra' => ['얼음 있는']],
                            'tr' => ['sentence' => 'buzsuz su', 'correct' => ['buzsuz', 'su'], 'extra' => ['buz', 'i̇çecek']],
                            'ru' => ['sentence' => 'вода без льда', 'correct' => ['вода', 'без', 'льда'], 'extra' => ['со', 'льдом']],
                        ],
                    ],
                    'c' => [
                        'words' => ['بدون ثلج', 'من فضلك'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Without ice please', 'correct' => ['without ice', 'please'], 'extra' => ['with ice']],
                            'az' => ['sentence' => 'buzsuz zəhmət olmasa', 'correct' => ['buzsuz', 'zəhmət olmasa'], 'extra' => ['buzlu']],
                            'fr' => ['sentence' => 'Sans glace s’il vous plaît', 'correct' => ['sans glace', 's’il vous plaît'], 'extra' => ['avec de la glace']],
                            'es' => ['sentence' => 'Sin hielo por favor', 'correct' => ['sin hielo', 'por favor'], 'extra' => ['con hielo']],
                            'de' => ['sentence' => 'Ohne Eis bitte', 'correct' => ['ohne Eis', 'bitte'], 'extra' => ['mit Eis']],
                            'ja' => ['sentence' => '氷なしでお願いします', 'correct' => ['氷なしで', 'お願いします'], 'extra' => ['氷入りで']],
                            'ko' => ['sentence' => '얼음 없이 부탁합니다', 'correct' => ['얼음 없이', '부탁합니다'], 'extra' => ['얼음 있게']],
                            'tr' => ['sentence' => 'buzsuz lütfen', 'correct' => ['buzsuz', 'lütfen'], 'extra' => ['buz', 'i̇çecek']],
                            'ru' => ['sentence' => 'без льда пожалуйста', 'correct' => ['без', 'льда', 'пожалуйста'], 'extra' => ['со', 'льдом']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Sugar or Not', 3,
                pictures: [['ar' => 'شاي', 'img' => 'tea'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'مع السكر'], ['ar' => 'بدون سكر']],
                phrases: [
                    'a' => [
                        'words' => ['شاي', 'مع السكر'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Tea with sugar', 'correct' => ['tea', 'with sugar'], 'extra' => ['without sugar']],
                            'az' => ['sentence' => 'çay şəkərli', 'correct' => ['çay', 'şəkərli'], 'extra' => ['şəkərsiz']],
                            'fr' => ['sentence' => 'Du thé avec du sucre', 'correct' => ['du thé', 'avec du sucre'], 'extra' => ['sans sucre']],
                            'es' => ['sentence' => 'Té con azúcar', 'correct' => ['té', 'con azúcar'], 'extra' => ['sin azúcar']],
                            'de' => ['sentence' => 'Tee mit Zucker', 'correct' => ['Tee', 'mit Zucker'], 'extra' => ['ohne Zucker']],
                            'ja' => ['sentence' => '砂糖入りのお茶', 'correct' => ['砂糖入りの', 'お茶'], 'extra' => ['砂糖なしの']],
                            'ko' => ['sentence' => '설탕 있는 차', 'correct' => ['설탕 있는', '차'], 'extra' => ['설탕 없는']],
                            'tr' => ['sentence' => 'şekerli çay', 'correct' => ['şekerli', 'çay'], 'extra' => ['şeker', 'süt']],
                            'ru' => ['sentence' => 'чай с сахаром', 'correct' => ['чай', 'с', 'сахаром'], 'extra' => ['без', 'сахара']],
                        ],
                    ],
                    'b' => [
                        'words' => ['شاي', 'بدون سكر'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Tea without sugar', 'correct' => ['tea', 'without sugar'], 'extra' => ['with sugar']],
                            'az' => ['sentence' => 'çay şəkərsiz', 'correct' => ['çay', 'şəkərsiz'], 'extra' => ['şəkərli']],
                            'fr' => ['sentence' => 'Du thé sans sucre', 'correct' => ['du thé', 'sans sucre'], 'extra' => ['avec du sucre']],
                            'es' => ['sentence' => 'Té sin azúcar', 'correct' => ['té', 'sin azúcar'], 'extra' => ['con azúcar']],
                            'de' => ['sentence' => 'Tee ohne Zucker', 'correct' => ['Tee', 'ohne Zucker'], 'extra' => ['mit Zucker']],
                            'ja' => ['sentence' => '砂糖なしのお茶', 'correct' => ['砂糖なしの', 'お茶'], 'extra' => ['砂糖入りの']],
                            'ko' => ['sentence' => '설탕 없는 차', 'correct' => ['설탕 없는', '차'], 'extra' => ['설탕 있는']],
                            'tr' => ['sentence' => 'şekersiz çay', 'correct' => ['şekersiz', 'çay'], 'extra' => ['şeker', 'süt']],
                            'ru' => ['sentence' => 'чай без сахара', 'correct' => ['чай', 'без', 'сахара'], 'extra' => ['с', 'сахаром']],
                        ],
                    ],
                    'c' => [
                        'words' => ['قهوة', 'مع الحليب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Coffee with milk', 'correct' => ['coffee', 'with milk'], 'extra' => ['without milk']],
                            'az' => ['sentence' => 'qəhvə südlü', 'correct' => ['qəhvə', 'südlü'], 'extra' => ['südsüz']],
                            'fr' => ['sentence' => 'Du café avec du lait', 'correct' => ['du café', 'avec du lait'], 'extra' => ['sans lait']],
                            'es' => ['sentence' => 'Café con leche', 'correct' => ['café', 'con leche'], 'extra' => ['sin leche']],
                            'de' => ['sentence' => 'Kaffee mit Milch', 'correct' => ['Kaffee', 'mit Milch'], 'extra' => ['ohne Milch']],
                            'ja' => ['sentence' => '牛乳入りのコーヒー', 'correct' => ['牛乳入りの', 'コーヒー'], 'extra' => ['牛乳なしの']],
                            'ko' => ['sentence' => '우유 있는 커피', 'correct' => ['우유 있는', '커피'], 'extra' => ['우유 없는']],
                            'tr' => ['sentence' => 'sütlü kahve', 'correct' => ['sütlü', 'kahve'], 'extra' => ['şeker', 'süt']],
                            'ru' => ['sentence' => 'кофе с молоком', 'correct' => ['кофе', 'с', 'молоком'], 'extra' => ['без', 'молока']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Wine & Beer', 4,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'نبيذ'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['نبيذ', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A wine please', 'correct' => ['a', 'wine', 'please'], 'extra' => ['beer']],
                            'az' => ['sentence' => 'bir şərab zəhmət olmasa', 'correct' => ['bir', 'şərab', 'zəhmət olmasa'], 'extra' => ['pivə']],
                            'fr' => ['sentence' => 'Un vin s’il vous plaît', 'correct' => ['un', 'vin', 's’il vous plaît'], 'extra' => ['bière']],
                            'es' => ['sentence' => 'Un vino por favor', 'correct' => ['un', 'vino', 'por favor'], 'extra' => ['cerveza']],
                            'de' => ['sentence' => 'Einen Wein bitte', 'correct' => ['einen', 'Wein', 'bitte'], 'extra' => ['Bier']],
                            'ja' => ['sentence' => 'ワインを一つお願いします', 'correct' => ['ワインを', '一つ', 'お願いします'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '와인 하나 부탁합니다', 'correct' => ['와인', '하나', '부탁합니다'], 'extra' => ['맥주']],
                            'tr' => ['sentence' => 'bir şarap lütfen', 'correct' => ['bir', 'şarap', 'lütfen'], 'extra' => ['bira', 'su']],
                            'ru' => ['sentence' => 'вино пожалуйста', 'correct' => ['вино', 'пожалуйста'], 'extra' => ['пиво']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أريد', 'بيرة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a beer', 'correct' => ['I would like', 'a', 'beer'], 'extra' => ['wine']],
                            'az' => ['sentence' => 'istəyirəm bir pivə', 'correct' => ['istəyirəm', 'bir', 'pivə'], 'extra' => ['şərab']],
                            'fr' => ['sentence' => 'Je voudrais une bière', 'correct' => ['je voudrais', 'une', 'bière'], 'extra' => ['vin']],
                            'es' => ['sentence' => 'Quisiera una cerveza', 'correct' => ['quisiera', 'una', 'cerveza'], 'extra' => ['vino']],
                            'de' => ['sentence' => 'Ich möchte ein Bier', 'correct' => ['ich möchte', 'ein', 'Bier'], 'extra' => ['Wein']],
                            'ja' => ['sentence' => 'ビールをください', 'correct' => ['ビールを', 'ください'], 'extra' => ['ワイン']],
                            'ko' => ['sentence' => '맥주 주세요', 'correct' => ['맥주', '주세요'], 'extra' => ['와인']],
                            'tr' => ['sentence' => 'bir bira istiyorum', 'correct' => ['bir', 'bira', 'istiyorum'], 'extra' => ['şarap', 'su']],
                            'ru' => ['sentence' => 'я хочу пиво', 'correct' => ['я', 'хочу', 'пиво'], 'extra' => ['вино']],
                        ],
                    ],
                    'c' => [
                        'words' => ['نبيذ', 'غالي'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The wine is expensive', 'correct' => ['the wine', 'is', 'expensive'], 'extra' => ['beer']],
                            'az' => ['sentence' => 'şərab bahalı', 'correct' => ['şərab', 'bahalı'], 'extra' => ['pivə']],
                            'fr' => ['sentence' => 'Le vin est cher', 'correct' => ['le vin', 'est', 'cher'], 'extra' => ['bière']],
                            'es' => ['sentence' => 'El vino es caro', 'correct' => ['el vino', 'es', 'caro'], 'extra' => ['cerveza']],
                            'de' => ['sentence' => 'Der Wein ist teuer', 'correct' => ['der Wein', 'ist', 'teuer'], 'extra' => ['Bier']],
                            'ja' => ['sentence' => 'ワインは高いです', 'correct' => ['ワインは', '高いです'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '와인은 비싸요', 'correct' => ['와인은', '비싸요'], 'extra' => ['맥주']],
                            'tr' => ['sentence' => 'şarap pahalı', 'correct' => ['şarap', 'pahalı'], 'extra' => ['bira', 'su']],
                            'ru' => ['sentence' => 'вино дорогой', 'correct' => ['вино', 'дорогой'], 'extra' => ['пиво']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Whole Round', 5,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'ماء', 'img' => 'water']],
                plain: [['ar' => 'بدون سكر'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['قهوة', 'بدون سكر', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A coffee without sugar please', 'correct' => ['a', 'coffee', 'without sugar', 'please'], 'extra' => ['with sugar']],
                            'az' => ['sentence' => 'bir qəhvə şəkərsiz zəhmət olmasa', 'correct' => ['bir', 'qəhvə', 'şəkərsiz', 'zəhmət olmasa'], 'extra' => ['şəkərli']],
                            'fr' => ['sentence' => 'Un café sans sucre s’il vous plaît', 'correct' => ['un', 'café', 'sans sucre', 's’il vous plaît'], 'extra' => ['avec du sucre']],
                            'es' => ['sentence' => 'Un café sin azúcar por favor', 'correct' => ['un', 'café', 'sin azúcar', 'por favor'], 'extra' => ['con azúcar']],
                            'de' => ['sentence' => 'Einen Kaffee ohne Zucker bitte', 'correct' => ['einen', 'Kaffee', 'ohne Zucker', 'bitte'], 'extra' => ['mit Zucker']],
                            'ja' => ['sentence' => '砂糖なしのコーヒーをお願いします', 'correct' => ['砂糖なしの', 'コーヒーを', 'お願いします'], 'extra' => ['砂糖入りの']],
                            'ko' => ['sentence' => '설탕 없는 커피 부탁합니다', 'correct' => ['설탕 없는', '커피', '부탁합니다'], 'extra' => ['설탕 있는']],
                            'tr' => ['sentence' => 'şekersiz bir kahve lütfen', 'correct' => ['şekersiz', 'bir', 'kahve', 'lütfen'], 'extra' => ['buz', 'şeker']],
                            'ru' => ['sentence' => 'кофе без сахара пожалуйста', 'correct' => ['кофе', 'без', 'сахара', 'пожалуйста'], 'extra' => ['с', 'сахаром']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ماء', 'مع الثلج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A water with ice', 'correct' => ['a', 'water', 'with ice'], 'extra' => ['without ice']],
                            'az' => ['sentence' => 'bir su buzlu', 'correct' => ['bir', 'su', 'buzlu'], 'extra' => ['buzsuz']],
                            'fr' => ['sentence' => 'Une eau avec de la glace', 'correct' => ['une', 'eau', 'avec de la glace'], 'extra' => ['sans glace']],
                            'es' => ['sentence' => 'Un agua con hielo', 'correct' => ['un', 'agua', 'con hielo'], 'extra' => ['sin hielo']],
                            'de' => ['sentence' => 'Ein Wasser mit Eis', 'correct' => ['ein', 'Wasser', 'mit Eis'], 'extra' => ['ohne Eis']],
                            'ja' => ['sentence' => '氷入りの水を一つ', 'correct' => ['氷入りの', '水を', '一つ'], 'extra' => ['氷なしの']],
                            'ko' => ['sentence' => '얼음 있는 물 하나', 'correct' => ['얼음 있는', '물', '하나'], 'extra' => ['얼음 없는']],
                            'tr' => ['sentence' => 'buzlu bir su', 'correct' => ['buzlu', 'bir', 'su'], 'extra' => ['buz', 'şeker']],
                            'ru' => ['sentence' => 'вода со льдом', 'correct' => ['вода', 'со', 'льдом'], 'extra' => ['без', 'льда']],
                        ],
                    ],
                    'c' => [
                        'words' => ['مشروب', 'بارد'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The drink is cold', 'correct' => ['the drink', 'is', 'cold'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'içki soyuq', 'correct' => ['içki', 'soyuq'], 'extra' => ['isti']],
                            'fr' => ['sentence' => 'La boisson est froide', 'correct' => ['la boisson', 'est', 'froide'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'La bebida está fría', 'correct' => ['la bebida', 'está', 'fría'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Das Getränk ist kalt', 'correct' => ['das Getränk', 'ist', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '飲み物は寒いです', 'correct' => ['飲み物は', '寒いです'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '음료는 추워요', 'correct' => ['음료는', '추워요'], 'extra' => ['더운']],
                            'tr' => ['sentence' => 'içecek soğuk', 'correct' => ['içecek', 'soğuk'], 'extra' => ['buz', 'şeker']],
                            'ru' => ['sentence' => 'напиток холодный', 'correct' => ['напиток', 'холодный'], 'extra' => ['горячий']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
