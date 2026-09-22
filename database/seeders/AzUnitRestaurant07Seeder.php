<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitRestaurant07Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Çay' => 'tea', 'Qəhvə' => 'coffee', 'Su' => 'water', 'Süd' => 'milk',
        'Çörək' => 'bread', 'Pendir' => 'cheese', 'Tort' => 'cake', 'Şəkər' => 'sugar',
    ];

    /**
     * Azerbaijani Restaurant Unit 7.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Drinks and Beverages', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Drink', 1,
                pictures: [['az' => 'Çay', 'img' => 'tea'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'İstəyirəm'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['istəyirəm', 'bir', 'içki'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a drink', 'correct' => ['I would like', 'a', 'drink'], 'extra' => ['ice']],
                            'fr' => ['sentence' => 'Je voudrais une boisson', 'correct' => ['je voudrais', 'une', 'boisson'], 'extra' => ['glace']],
                            'es' => ['sentence' => 'Quisiera una bebida', 'correct' => ['quisiera', 'una', 'bebida'], 'extra' => ['hielo']],
                            'de' => ['sentence' => 'Ich möchte ein Getränk', 'correct' => ['ich möchte', 'ein', 'Getränk'], 'extra' => ['Eis']],
                            'ja' => ['sentence' => '飲み物をください', 'correct' => ['飲み物を', 'ください'], 'extra' => ['氷']],
                            'ko' => ['sentence' => '음료 주세요', 'correct' => ['음료', '주세요'], 'extra' => ['얼음']],
                            'tr' => ['sentence' => 'bir içecek istiyorum', 'correct' => ['bir', 'içecek', 'istiyorum'], 'extra' => ['i̇çecek', 'buz']],
                            'ru' => ['sentence' => 'я хочу напиток', 'correct' => ['я', 'хочу', 'напиток'], 'extra' => ['лёд']],
                            'ar' => ['sentence' => 'أريد مشروب', 'correct' => ['أريد', 'مشروب'], 'extra' => ['الثلج']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'çay', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A tea please', 'correct' => ['a', 'tea', 'please'], 'extra' => ['coffee']],
                            'fr' => ['sentence' => 'Un thé s’il vous plaît', 'correct' => ['un', 'thé', 's’il vous plaît'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Un té por favor', 'correct' => ['un', 'té', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Einen Tee bitte', 'correct' => ['einen', 'Tee', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お茶を一つお願いします', 'correct' => ['お茶を', '一つ', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '차 하나 부탁합니다', 'correct' => ['차', '하나', '부탁합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bir çay lütfen', 'correct' => ['bir', 'çay', 'lütfen'], 'extra' => ['i̇çecek', 'buz']],
                            'ru' => ['sentence' => 'чай пожалуйста', 'correct' => ['чай', 'пожалуйста'], 'extra' => ['кофе']],
                            'ar' => ['sentence' => 'شاي من فضلك', 'correct' => ['شاي', 'من فضلك'], 'extra' => ['قهوة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mı', 'buz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Is there ice', 'correct' => ['is there', 'ice'], 'extra' => ['sugar']],
                            'fr' => ['sentence' => 'Y a-t-il de la glace', 'correct' => ['y a-t-il', 'de la glace'], 'extra' => ['sucre']],
                            'es' => ['sentence' => 'Hay hielo', 'correct' => ['hay', 'hielo'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Gibt es Eis', 'correct' => ['gibt es', 'Eis'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => '氷がありますか', 'correct' => ['氷が', 'ありますか'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '얼음이 있어요', 'correct' => ['얼음이', '있어요'], 'extra' => ['설탕']],
                            'tr' => ['sentence' => 'buz var mı', 'correct' => ['buz', 'var', 'mı'], 'extra' => ['i̇çecek', 'su']],
                            'ru' => ['sentence' => 'ли лёд', 'correct' => ['ли', 'лёд'], 'extra' => ['сахар']],
                            'ar' => ['sentence' => 'هل الثلج', 'correct' => ['هل', 'الثلج'], 'extra' => ['سكر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: With & Without Ice', 2,
                pictures: [['az' => 'Su', 'img' => 'water'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Buzlu'], ['az' => 'Buzsuz']],
                phrases: [
                    'a' => [
                        'words' => ['su', 'buzlu'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Water with ice', 'correct' => ['water', 'with ice'], 'extra' => ['without ice']],
                            'fr' => ['sentence' => 'De l’eau avec de la glace', 'correct' => ['de l’eau', 'avec de la glace'], 'extra' => ['sans glace']],
                            'es' => ['sentence' => 'Agua con hielo', 'correct' => ['agua', 'con hielo'], 'extra' => ['sin hielo']],
                            'de' => ['sentence' => 'Wasser mit Eis', 'correct' => ['Wasser', 'mit Eis'], 'extra' => ['ohne Eis']],
                            'ja' => ['sentence' => '氷入りの水', 'correct' => ['氷入りの', '水'], 'extra' => ['氷なしの']],
                            'ko' => ['sentence' => '얼음 있는 물', 'correct' => ['얼음 있는', '물'], 'extra' => ['얼음 없는']],
                            'tr' => ['sentence' => 'buzlu su', 'correct' => ['buzlu', 'su'], 'extra' => ['buz', 'i̇çecek']],
                            'ru' => ['sentence' => 'вода со льдом', 'correct' => ['вода', 'со', 'льдом'], 'extra' => ['без', 'льда']],
                            'ar' => ['sentence' => 'ماء مع الثلج', 'correct' => ['ماء', 'مع الثلج'], 'extra' => ['بدون ثلج']],
                        ],
                    ],
                    'b' => [
                        'words' => ['su', 'buzsuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Water without ice', 'correct' => ['water', 'without ice'], 'extra' => ['with ice']],
                            'fr' => ['sentence' => 'De l’eau sans glace', 'correct' => ['de l’eau', 'sans glace'], 'extra' => ['avec de la glace']],
                            'es' => ['sentence' => 'Agua sin hielo', 'correct' => ['agua', 'sin hielo'], 'extra' => ['con hielo']],
                            'de' => ['sentence' => 'Wasser ohne Eis', 'correct' => ['Wasser', 'ohne Eis'], 'extra' => ['mit Eis']],
                            'ja' => ['sentence' => '氷なしの水', 'correct' => ['氷なしの', '水'], 'extra' => ['氷入りの']],
                            'ko' => ['sentence' => '얼음 없는 물', 'correct' => ['얼음 없는', '물'], 'extra' => ['얼음 있는']],
                            'tr' => ['sentence' => 'buzsuz su', 'correct' => ['buzsuz', 'su'], 'extra' => ['buz', 'i̇çecek']],
                            'ru' => ['sentence' => 'вода без льда', 'correct' => ['вода', 'без', 'льда'], 'extra' => ['со', 'льдом']],
                            'ar' => ['sentence' => 'ماء بدون ثلج', 'correct' => ['ماء', 'بدون ثلج'], 'extra' => ['مع الثلج']],
                        ],
                    ],
                    'c' => [
                        'words' => ['buzsuz', 'zəhmət olmasa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Without ice please', 'correct' => ['without ice', 'please'], 'extra' => ['with ice']],
                            'fr' => ['sentence' => 'Sans glace s’il vous plaît', 'correct' => ['sans glace', 's’il vous plaît'], 'extra' => ['avec de la glace']],
                            'es' => ['sentence' => 'Sin hielo por favor', 'correct' => ['sin hielo', 'por favor'], 'extra' => ['con hielo']],
                            'de' => ['sentence' => 'Ohne Eis bitte', 'correct' => ['ohne Eis', 'bitte'], 'extra' => ['mit Eis']],
                            'ja' => ['sentence' => '氷なしでお願いします', 'correct' => ['氷なしで', 'お願いします'], 'extra' => ['氷入りで']],
                            'ko' => ['sentence' => '얼음 없이 부탁합니다', 'correct' => ['얼음 없이', '부탁합니다'], 'extra' => ['얼음 있게']],
                            'tr' => ['sentence' => 'buzsuz lütfen', 'correct' => ['buzsuz', 'lütfen'], 'extra' => ['buz', 'i̇çecek']],
                            'ru' => ['sentence' => 'без льда пожалуйста', 'correct' => ['без', 'льда', 'пожалуйста'], 'extra' => ['со', 'льдом']],
                            'ar' => ['sentence' => 'بدون ثلج من فضلك', 'correct' => ['بدون ثلج', 'من فضلك'], 'extra' => ['مع الثلج']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Sugar or Not', 3,
                pictures: [['az' => 'Çay', 'img' => 'tea'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Şəkərli'], ['az' => 'Şəkərsiz']],
                phrases: [
                    'a' => [
                        'words' => ['çay', 'şəkərli'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Tea with sugar', 'correct' => ['tea', 'with sugar'], 'extra' => ['without sugar']],
                            'fr' => ['sentence' => 'Du thé avec du sucre', 'correct' => ['du thé', 'avec du sucre'], 'extra' => ['sans sucre']],
                            'es' => ['sentence' => 'Té con azúcar', 'correct' => ['té', 'con azúcar'], 'extra' => ['sin azúcar']],
                            'de' => ['sentence' => 'Tee mit Zucker', 'correct' => ['Tee', 'mit Zucker'], 'extra' => ['ohne Zucker']],
                            'ja' => ['sentence' => '砂糖入りのお茶', 'correct' => ['砂糖入りの', 'お茶'], 'extra' => ['砂糖なしの']],
                            'ko' => ['sentence' => '설탕 있는 차', 'correct' => ['설탕 있는', '차'], 'extra' => ['설탕 없는']],
                            'tr' => ['sentence' => 'şekerli çay', 'correct' => ['şekerli', 'çay'], 'extra' => ['şeker', 'süt']],
                            'ru' => ['sentence' => 'чай с сахаром', 'correct' => ['чай', 'с', 'сахаром'], 'extra' => ['без', 'сахара']],
                            'ar' => ['sentence' => 'شاي مع السكر', 'correct' => ['شاي', 'مع السكر'], 'extra' => ['بدون سكر']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çay', 'şəkərsiz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Tea without sugar', 'correct' => ['tea', 'without sugar'], 'extra' => ['with sugar']],
                            'fr' => ['sentence' => 'Du thé sans sucre', 'correct' => ['du thé', 'sans sucre'], 'extra' => ['avec du sucre']],
                            'es' => ['sentence' => 'Té sin azúcar', 'correct' => ['té', 'sin azúcar'], 'extra' => ['con azúcar']],
                            'de' => ['sentence' => 'Tee ohne Zucker', 'correct' => ['Tee', 'ohne Zucker'], 'extra' => ['mit Zucker']],
                            'ja' => ['sentence' => '砂糖なしのお茶', 'correct' => ['砂糖なしの', 'お茶'], 'extra' => ['砂糖入りの']],
                            'ko' => ['sentence' => '설탕 없는 차', 'correct' => ['설탕 없는', '차'], 'extra' => ['설탕 있는']],
                            'tr' => ['sentence' => 'şekersiz çay', 'correct' => ['şekersiz', 'çay'], 'extra' => ['şeker', 'süt']],
                            'ru' => ['sentence' => 'чай без сахара', 'correct' => ['чай', 'без', 'сахара'], 'extra' => ['с', 'сахаром']],
                            'ar' => ['sentence' => 'شاي بدون سكر', 'correct' => ['شاي', 'بدون سكر'], 'extra' => ['مع السكر']],
                        ],
                    ],
                    'c' => [
                        'words' => ['qəhvə', 'südlü'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Coffee with milk', 'correct' => ['coffee', 'with milk'], 'extra' => ['without milk']],
                            'fr' => ['sentence' => 'Du café avec du lait', 'correct' => ['du café', 'avec du lait'], 'extra' => ['sans lait']],
                            'es' => ['sentence' => 'Café con leche', 'correct' => ['café', 'con leche'], 'extra' => ['sin leche']],
                            'de' => ['sentence' => 'Kaffee mit Milch', 'correct' => ['Kaffee', 'mit Milch'], 'extra' => ['ohne Milch']],
                            'ja' => ['sentence' => '牛乳入りのコーヒー', 'correct' => ['牛乳入りの', 'コーヒー'], 'extra' => ['牛乳なしの']],
                            'ko' => ['sentence' => '우유 있는 커피', 'correct' => ['우유 있는', '커피'], 'extra' => ['우유 없는']],
                            'tr' => ['sentence' => 'sütlü kahve', 'correct' => ['sütlü', 'kahve'], 'extra' => ['şeker', 'süt']],
                            'ru' => ['sentence' => 'кофе с молоком', 'correct' => ['кофе', 'с', 'молоком'], 'extra' => ['без', 'молока']],
                            'ar' => ['sentence' => 'قهوة مع الحليب', 'correct' => ['قهوة', 'مع الحليب'], 'extra' => ['بدون حليب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Wine & Beer', 4,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Bir'], ['az' => 'Şərab']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'şərab', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A wine please', 'correct' => ['a', 'wine', 'please'], 'extra' => ['beer']],
                            'fr' => ['sentence' => 'Un vin s’il vous plaît', 'correct' => ['un', 'vin', 's’il vous plaît'], 'extra' => ['bière']],
                            'es' => ['sentence' => 'Un vino por favor', 'correct' => ['un', 'vino', 'por favor'], 'extra' => ['cerveza']],
                            'de' => ['sentence' => 'Einen Wein bitte', 'correct' => ['einen', 'Wein', 'bitte'], 'extra' => ['Bier']],
                            'ja' => ['sentence' => 'ワインを一つお願いします', 'correct' => ['ワインを', '一つ', 'お願いします'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '와인 하나 부탁합니다', 'correct' => ['와인', '하나', '부탁합니다'], 'extra' => ['맥주']],
                            'tr' => ['sentence' => 'bir şarap lütfen', 'correct' => ['bir', 'şarap', 'lütfen'], 'extra' => ['bira', 'su']],
                            'ru' => ['sentence' => 'вино пожалуйста', 'correct' => ['вино', 'пожалуйста'], 'extra' => ['пиво']],
                            'ar' => ['sentence' => 'نبيذ من فضلك', 'correct' => ['نبيذ', 'من فضلك'], 'extra' => ['بيرة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['istəyirəm', 'bir', 'pivə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a beer', 'correct' => ['I would like', 'a', 'beer'], 'extra' => ['wine']],
                            'fr' => ['sentence' => 'Je voudrais une bière', 'correct' => ['je voudrais', 'une', 'bière'], 'extra' => ['vin']],
                            'es' => ['sentence' => 'Quisiera una cerveza', 'correct' => ['quisiera', 'una', 'cerveza'], 'extra' => ['vino']],
                            'de' => ['sentence' => 'Ich möchte ein Bier', 'correct' => ['ich möchte', 'ein', 'Bier'], 'extra' => ['Wein']],
                            'ja' => ['sentence' => 'ビールをください', 'correct' => ['ビールを', 'ください'], 'extra' => ['ワイン']],
                            'ko' => ['sentence' => '맥주 주세요', 'correct' => ['맥주', '주세요'], 'extra' => ['와인']],
                            'tr' => ['sentence' => 'bir bira istiyorum', 'correct' => ['bir', 'bira', 'istiyorum'], 'extra' => ['şarap', 'su']],
                            'ru' => ['sentence' => 'я хочу пиво', 'correct' => ['я', 'хочу', 'пиво'], 'extra' => ['вино']],
                            'ar' => ['sentence' => 'أريد بيرة', 'correct' => ['أريد', 'بيرة'], 'extra' => ['نبيذ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['şərab', 'bahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The wine is expensive', 'correct' => ['the wine', 'is', 'expensive'], 'extra' => ['beer']],
                            'fr' => ['sentence' => 'Le vin est cher', 'correct' => ['le vin', 'est', 'cher'], 'extra' => ['bière']],
                            'es' => ['sentence' => 'El vino es caro', 'correct' => ['el vino', 'es', 'caro'], 'extra' => ['cerveza']],
                            'de' => ['sentence' => 'Der Wein ist teuer', 'correct' => ['der Wein', 'ist', 'teuer'], 'extra' => ['Bier']],
                            'ja' => ['sentence' => 'ワインは高いです', 'correct' => ['ワインは', '高いです'], 'extra' => ['ビール']],
                            'ko' => ['sentence' => '와인은 비싸요', 'correct' => ['와인은', '비싸요'], 'extra' => ['맥주']],
                            'tr' => ['sentence' => 'şarap pahalı', 'correct' => ['şarap', 'pahalı'], 'extra' => ['bira', 'su']],
                            'ru' => ['sentence' => 'вино дорогой', 'correct' => ['вино', 'дорогой'], 'extra' => ['пиво']],
                            'ar' => ['sentence' => 'نبيذ غالي', 'correct' => ['نبيذ', 'غالي'], 'extra' => ['بيرة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Whole Round', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Su', 'img' => 'water']],
                plain: [['az' => 'Bir'], ['az' => 'Şəkərsiz']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'qəhvə', 'şəkərsiz', 'zəhmət olmasa'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'A coffee without sugar please', 'correct' => ['a', 'coffee', 'without sugar', 'please'], 'extra' => ['with sugar']],
                            'fr' => ['sentence' => 'Un café sans sucre s’il vous plaît', 'correct' => ['un', 'café', 'sans sucre', 's’il vous plaît'], 'extra' => ['avec du sucre']],
                            'es' => ['sentence' => 'Un café sin azúcar por favor', 'correct' => ['un', 'café', 'sin azúcar', 'por favor'], 'extra' => ['con azúcar']],
                            'de' => ['sentence' => 'Einen Kaffee ohne Zucker bitte', 'correct' => ['einen', 'Kaffee', 'ohne Zucker', 'bitte'], 'extra' => ['mit Zucker']],
                            'ja' => ['sentence' => '砂糖なしのコーヒーをお願いします', 'correct' => ['砂糖なしの', 'コーヒーを', 'お願いします'], 'extra' => ['砂糖入りの']],
                            'ko' => ['sentence' => '설탕 없는 커피 부탁합니다', 'correct' => ['설탕 없는', '커피', '부탁합니다'], 'extra' => ['설탕 있는']],
                            'tr' => ['sentence' => 'şekersiz bir kahve lütfen', 'correct' => ['şekersiz', 'bir', 'kahve', 'lütfen'], 'extra' => ['buz', 'şeker']],
                            'ru' => ['sentence' => 'кофе без сахара пожалуйста', 'correct' => ['кофе', 'без', 'сахара', 'пожалуйста'], 'extra' => ['с', 'сахаром']],
                            'ar' => ['sentence' => 'قهوة بدون سكر من فضلك', 'correct' => ['قهوة', 'بدون سكر', 'من فضلك'], 'extra' => ['مع السكر']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'su', 'buzlu'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A water with ice', 'correct' => ['a', 'water', 'with ice'], 'extra' => ['without ice']],
                            'fr' => ['sentence' => 'Une eau avec de la glace', 'correct' => ['une', 'eau', 'avec de la glace'], 'extra' => ['sans glace']],
                            'es' => ['sentence' => 'Un agua con hielo', 'correct' => ['un', 'agua', 'con hielo'], 'extra' => ['sin hielo']],
                            'de' => ['sentence' => 'Ein Wasser mit Eis', 'correct' => ['ein', 'Wasser', 'mit Eis'], 'extra' => ['ohne Eis']],
                            'ja' => ['sentence' => '氷入りの水を一つ', 'correct' => ['氷入りの', '水を', '一つ'], 'extra' => ['氷なしの']],
                            'ko' => ['sentence' => '얼음 있는 물 하나', 'correct' => ['얼음 있는', '물', '하나'], 'extra' => ['얼음 없는']],
                            'tr' => ['sentence' => 'buzlu bir su', 'correct' => ['buzlu', 'bir', 'su'], 'extra' => ['buz', 'şeker']],
                            'ru' => ['sentence' => 'вода со льдом', 'correct' => ['вода', 'со', 'льдом'], 'extra' => ['без', 'льда']],
                            'ar' => ['sentence' => 'ماء مع الثلج', 'correct' => ['ماء', 'مع الثلج'], 'extra' => ['بدون ثلج']],
                        ],
                    ],
                    'c' => [
                        'words' => ['içki', 'soyuq'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The drink is cold', 'correct' => ['the drink', 'is', 'cold'], 'extra' => ['hot']],
                            'fr' => ['sentence' => 'La boisson est froide', 'correct' => ['la boisson', 'est', 'froide'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'La bebida está fría', 'correct' => ['la bebida', 'está', 'fría'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Das Getränk ist kalt', 'correct' => ['das Getränk', 'ist', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '飲み物は寒いです', 'correct' => ['飲み物は', '寒いです'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '음료는 추워요', 'correct' => ['음료는', '추워요'], 'extra' => ['더운']],
                            'tr' => ['sentence' => 'içecek soğuk', 'correct' => ['içecek', 'soğuk'], 'extra' => ['buz', 'şeker']],
                            'ru' => ['sentence' => 'напиток холодный', 'correct' => ['напиток', 'холодный'], 'extra' => ['горячий']],
                            'ar' => ['sentence' => 'مشروب بارد', 'correct' => ['مشروب', 'بارد'], 'extra' => ['ساخن']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
