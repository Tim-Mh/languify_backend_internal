<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitBeginner01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water', 'Süd' => 'milk',
        'Çörək' => 'bread', 'Pendir' => 'cheese', 'Tort' => 'cake', 'Şəkər' => 'sugar',
        'Hesab' => 'bill',
    ];

    /**
     * Azerbaijani Beginner Unit 1.
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
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: At the Café', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Coffee & Tea', 1,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Bir'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'qəhvə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A coffee', 'correct' => ['a', 'coffee'], 'extra' => ['tea', 'and']],
                            'fr' => ['sentence' => 'Un café', 'correct' => ['un', 'café'], 'extra' => ['thé', 'et']],
                            'es' => ['sentence' => 'Un café', 'correct' => ['un', 'café'], 'extra' => ['té', 'y']],
                            'de' => ['sentence' => 'Einen Kaffee', 'correct' => ['einen', 'Kaffee'], 'extra' => ['Tee', 'und']],
                            'ja' => ['sentence' => 'コーヒー', 'correct' => ['コーヒー'], 'extra' => ['お茶', 'と']],
                            'ko' => ['sentence' => '커피', 'correct' => ['커피'], 'extra' => ['차', '그리고']],
                            'tr' => ['sentence' => 'bir kahve', 'correct' => ['bir', 'kahve'], 'extra' => ['ve', 'çay']],
                            'ru' => ['sentence' => 'кофе', 'correct' => ['кофе'], 'extra' => ['чай', 'и']],
                            'ar' => ['sentence' => 'قهوة', 'correct' => ['قهوة'], 'extra' => ['شاي', 'و']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'çay'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A tea', 'correct' => ['a', 'tea'], 'extra' => ['coffee', 'and']],
                            'fr' => ['sentence' => 'Un thé', 'correct' => ['un', 'thé'], 'extra' => ['café', 'et']],
                            'es' => ['sentence' => 'Un té', 'correct' => ['un', 'té'], 'extra' => ['café', 'y']],
                            'de' => ['sentence' => 'Einen Tee', 'correct' => ['einen', 'Tee'], 'extra' => ['Kaffee', 'und']],
                            'ja' => ['sentence' => 'お茶', 'correct' => ['お茶'], 'extra' => ['コーヒー', 'と']],
                            'ko' => ['sentence' => '차', 'correct' => ['차'], 'extra' => ['커피', '그리고']],
                            'tr' => ['sentence' => 'bir çay', 'correct' => ['bir', 'çay'], 'extra' => ['ve', 'kahve']],
                            'ru' => ['sentence' => 'чай', 'correct' => ['чай'], 'extra' => ['кофе', 'и']],
                            'ar' => ['sentence' => 'شاي', 'correct' => ['شاي'], 'extra' => ['قهوة', 'و']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'qəhvə', 'və', 'bir', 'çay'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A coffee and a tea', 'correct' => ['a', 'coffee', 'and', 'a', 'tea'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Un café et un thé', 'correct' => ['un', 'café', 'et', 'un', 'thé'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Un café y un té', 'correct' => ['un', 'café', 'y', 'un', 'té'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Tee'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'コーヒーとお茶', 'correct' => ['コーヒー', 'と', 'お茶'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '커피와 차', 'correct' => ['커피와', '차'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir kahve ve bir çay', 'correct' => ['bir', 'kahve', 've', 'bir', 'çay'], 'extra' => []],
                            'ru' => ['sentence' => 'кофе и чай', 'correct' => ['кофе', 'и', 'чай'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'قهوة و شاي', 'correct' => ['قهوة', 'و', 'شاي'], 'extra' => ['حليب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Water & Milk', 2,
                pictures: [['az' => 'Su', 'img' => 'water'], ['az' => 'Süd', 'img' => 'milk']],
                plain: [['az' => 'Bir'], ['az' => 'Zəhmət olmasa']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'su'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A water', 'correct' => ['a', 'water'], 'extra' => ['milk', 'please']],
                            'fr' => ['sentence' => 'Une eau', 'correct' => ['une', 'eau'], 'extra' => ['lait', "s'il vous plaît"]],
                            'es' => ['sentence' => 'Un agua', 'correct' => ['un', 'agua'], 'extra' => ['leche', 'por favor']],
                            'de' => ['sentence' => 'Ein Wasser', 'correct' => ['ein', 'Wasser'], 'extra' => ['Milch', 'bitte']],
                            'ja' => ['sentence' => '水', 'correct' => ['水'], 'extra' => ['牛乳', 'お願いします']],
                            'ko' => ['sentence' => '물', 'correct' => ['물'], 'extra' => ['우유', '부탁합니다']],
                            'tr' => ['sentence' => 'bir su', 'correct' => ['bir', 'su'], 'extra' => ['lütfen', 'merhaba']],
                            'ru' => ['sentence' => 'вода', 'correct' => ['вода'], 'extra' => ['молоко', 'пожалуйста']],
                            'ar' => ['sentence' => 'ماء', 'correct' => ['ماء'], 'extra' => ['حليب', 'من فضلك']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'süd', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A milk please', 'correct' => ['a', 'milk', 'please'], 'extra' => ['water']],
                            'fr' => ['sentence' => "Un lait s'il vous plaît", 'correct' => ['un', 'lait', "s'il vous plaît"], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Una leche por favor', 'correct' => ['una', 'leche', 'por favor'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Eine Milch bitte', 'correct' => ['eine', 'Milch', 'bitte'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳をお願いします', 'correct' => ['牛乳', 'を', 'お願いします'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유 부탁합니다', 'correct' => ['우유', '부탁합니다'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'bir süt lütfen', 'correct' => ['bir', 'süt', 'lütfen'], 'extra' => ['merhaba', 'su']],
                            'ru' => ['sentence' => 'молоко пожалуйста', 'correct' => ['молоко', 'пожалуйста'], 'extra' => ['вода']],
                            'ar' => ['sentence' => 'حليب من فضلك', 'correct' => ['حليب', 'من فضلك'], 'extra' => ['ماء']],
                        ],
                    ],
                    'c' => [
                        'words' => ['salam', 'bir', 'su', 'və', 'bir', 'süd'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Hello a water and a milk', 'correct' => ['hello', 'a', 'water', 'and', 'a', 'milk'], 'extra' => ['please']],
                            'fr' => ['sentence' => 'Bonjour une eau et un lait', 'correct' => ['bonjour', 'une', 'eau', 'et', 'un', 'lait'], 'extra' => ["s'il vous plaît"]],
                            'es' => ['sentence' => 'Hola un agua y una leche', 'correct' => ['hola', 'un', 'agua', 'y', 'una', 'leche'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Hallo ein Wasser und eine Milch', 'correct' => ['hallo', 'ein', 'Wasser', 'und', 'eine', 'Milch'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'こんにちは、水と牛乳', 'correct' => ['こんにちは', '水', 'と', '牛乳'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '안녕하세요 물과 우유', 'correct' => ['안녕하세요', '물과', '우유'], 'extra' => ['부탁합니다']],
                            'tr' => ['sentence' => 'merhaba bir su ve bir süt', 'correct' => ['merhaba', 'bir', 'su', 've', 'bir', 'süt'], 'extra' => ['lütfen']],
                            'ru' => ['sentence' => 'привет вода и молоко', 'correct' => ['привет', 'вода', 'и', 'молоко'], 'extra' => ['пожалуйста']],
                            'ar' => ['sentence' => 'مرحبا ماء و حليب', 'correct' => ['مرحبا', 'ماء', 'و', 'حليب'], 'extra' => ['من فضلك']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Bread & Cheese', 3,
                pictures: [['az' => 'Çörək', 'img' => 'bread'], ['az' => 'Pendir', 'img' => 'cheese']],
                plain: [['az' => 'Bir'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'çörək'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A bread', 'correct' => ['a', 'bread'], 'extra' => ['cheese', 'and']],
                            'fr' => ['sentence' => 'Un pain', 'correct' => ['un', 'pain'], 'extra' => ['fromage', 'et']],
                            'es' => ['sentence' => 'Un pan', 'correct' => ['un', 'pan'], 'extra' => ['queso', 'y']],
                            'de' => ['sentence' => 'Ein Brot', 'correct' => ['ein', 'Brot'], 'extra' => ['Käse', 'und']],
                            'ja' => ['sentence' => 'パン', 'correct' => ['パン'], 'extra' => ['チーズ', 'と']],
                            'ko' => ['sentence' => '빵', 'correct' => ['빵'], 'extra' => ['치즈', '그리고']],
                            'tr' => ['sentence' => 'bir ekmek', 'correct' => ['bir', 'ekmek'], 'extra' => ['ve', 'teşekkürler']],
                            'ru' => ['sentence' => 'хлеб', 'correct' => ['хлеб'], 'extra' => ['сыр', 'и']],
                            'ar' => ['sentence' => 'خبز', 'correct' => ['خبز'], 'extra' => ['جبن', 'و']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çörək', 'və', 'pendir'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Bread and cheese', 'correct' => ['bread', 'and', 'cheese'], 'extra' => ['thank you']],
                            'fr' => ['sentence' => 'Pain et fromage', 'correct' => ['pain', 'et', 'fromage'], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Pan y queso', 'correct' => ['pan', 'y', 'queso'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Brot und Käse', 'correct' => ['Brot', 'und', 'Käse'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'パンとチーズ', 'correct' => ['パン', 'と', 'チーズ'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '빵과 치즈', 'correct' => ['빵과', '치즈'], 'extra' => ['감사합니다']],
                            'tr' => ['sentence' => 'ekmek ve peynir', 'correct' => ['ekmek', 've', 'peynir'], 'extra' => ['teşekkürler']],
                            'ru' => ['sentence' => 'хлеб и сыр', 'correct' => ['хлеб', 'и', 'сыр'], 'extra' => ['спасибо']],
                            'ar' => ['sentence' => 'خبز و جبن', 'correct' => ['خبز', 'و', 'جبن'], 'extra' => ['شكرا']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'çörək', 'və', 'bir', 'pendir', 'təşəkkür'], 'blank' => 5,
                        'means' => [
                            'en' => ['sentence' => 'A bread and a cheese thank you', 'correct' => ['a', 'bread', 'and', 'a', 'cheese', 'thank you'], 'extra' => ['coffee']],
                            'fr' => ['sentence' => 'Un pain et un fromage merci', 'correct' => ['un', 'pain', 'et', 'un', 'fromage', 'merci'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Un pan y un queso gracias', 'correct' => ['un', 'pan', 'y', 'un', 'queso', 'gracias'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ein Brot und ein Käse danke', 'correct' => ['ein', 'Brot', 'und', 'ein', 'Käse', 'danke'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'パンとチーズ、ありがとう', 'correct' => ['パン', 'と', 'チーズ', 'ありがとう'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '빵과 치즈 감사합니다', 'correct' => ['빵과', '치즈', '감사합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bir ekmek ve bir peynir teşekkürler', 'correct' => ['bir', 'ekmek', 've', 'bir', 'peynir', 'teşekkürler'], 'extra' => []],
                            'ru' => ['sentence' => 'хлеб и сыр спасибо', 'correct' => ['хлеб', 'и', 'сыр', 'спасибо'], 'extra' => ['кофе']],
                            'ar' => ['sentence' => 'خبز و جبن شكرا', 'correct' => ['خبز', 'و', 'جبن', 'شكرا'], 'extra' => ['قهوة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Sugar & Cake', 4,
                pictures: [['az' => 'Tort', 'img' => 'cake'], ['az' => 'Şəkər', 'img' => 'sugar']],
                plain: [['az' => 'Bir'], ['az' => 'Zəhmət olmasa']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'tort'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A cake', 'correct' => ['a', 'cake'], 'extra' => ['sugar', 'please']],
                            'fr' => ['sentence' => 'Un gâteau', 'correct' => ['un', 'gâteau'], 'extra' => ['sucre', "s'il vous plaît"]],
                            'es' => ['sentence' => 'Un pastel', 'correct' => ['un', 'pastel'], 'extra' => ['azúcar', 'por favor']],
                            'de' => ['sentence' => 'Einen Kuchen', 'correct' => ['einen', 'Kuchen'], 'extra' => ['Zucker', 'bitte']],
                            'ja' => ['sentence' => 'ケーキ', 'correct' => ['ケーキ'], 'extra' => ['砂糖', 'お願いします']],
                            'ko' => ['sentence' => '케이크', 'correct' => ['케이크'], 'extra' => ['설탕', '부탁합니다']],
                            'tr' => ['sentence' => 'bir pasta', 'correct' => ['bir', 'pasta'], 'extra' => ['lütfen', 'şeker']],
                            'ru' => ['sentence' => 'торт', 'correct' => ['торт'], 'extra' => ['сахар', 'пожалуйста']],
                            'ar' => ['sentence' => 'كعكة', 'correct' => ['كعكة'], 'extra' => ['سكر', 'من فضلك']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'şəkər', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A sugar please', 'correct' => ['a', 'sugar', 'please'], 'extra' => ['cake']],
                            'fr' => ['sentence' => "Un sucre s'il vous plaît", 'correct' => ['un', 'sucre', "s'il vous plaît"], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Un azúcar por favor', 'correct' => ['un', 'azúcar', 'por favor'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Einen Zucker bitte', 'correct' => ['einen', 'Zucker', 'bitte'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => '砂糖をお願いします', 'correct' => ['砂糖', 'を', 'お願いします'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '설탕 부탁합니다', 'correct' => ['설탕', '부탁합니다'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'bir şeker lütfen', 'correct' => ['bir', 'şeker', 'lütfen'], 'extra' => ['pasta']],
                            'ru' => ['sentence' => 'сахар пожалуйста', 'correct' => ['сахар', 'пожалуйста'], 'extra' => ['торт']],
                            'ar' => ['sentence' => 'سكر من فضلك', 'correct' => ['سكر', 'من فضلك'], 'extra' => ['كعكة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'qəhvə', 'və', 'bir', 'tort', 'zəhmət olmasa'], 'blank' => 5,
                        'means' => [
                            'en' => ['sentence' => 'A coffee and a cake please', 'correct' => ['a', 'coffee', 'and', 'a', 'cake', 'please'], 'extra' => ['sugar']],
                            'fr' => ['sentence' => "Un café et un gâteau s'il vous plaît", 'correct' => ['un', 'café', 'et', 'un', 'gâteau', "s'il vous plaît"], 'extra' => ['sucre']],
                            'es' => ['sentence' => 'Un café y un pastel por favor', 'correct' => ['un', 'café', 'y', 'un', 'pastel', 'por favor'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Kuchen bitte', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Kuchen', 'bitte'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => 'コーヒーとケーキをお願いします', 'correct' => ['コーヒー', 'と', 'ケーキ', 'を', 'お願いします'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '커피와 케이크 부탁합니다', 'correct' => ['커피와', '케이크', '부탁합니다'], 'extra' => ['설탕']],
                            'tr' => ['sentence' => 'bir kahve ve bir pasta lütfen', 'correct' => ['bir', 'kahve', 've', 'bir', 'pasta', 'lütfen'], 'extra' => ['şeker']],
                            'ru' => ['sentence' => 'кофе и торт пожалуйста', 'correct' => ['кофе', 'и', 'торт', 'пожалуйста'], 'extra' => ['сахар']],
                            'ar' => ['sentence' => 'قهوة و كعكة من فضلك', 'correct' => ['قهوة', 'و', 'كعكة', 'من فضلك'], 'extra' => ['سكر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ordering', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Hesab', 'img' => 'bill']],
                plain: [['az' => 'İstəyirəm'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['istəyirəm', 'bir', 'qəhvə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a coffee', 'correct' => ['I would like', 'a', 'coffee'], 'extra' => ['cake']],
                            'fr' => ['sentence' => 'Je voudrais un café', 'correct' => ['je voudrais', 'un', 'café'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Quisiera un café', 'correct' => ['quisiera', 'un', 'café'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ich möchte einen Kaffee', 'correct' => ['ich möchte', 'einen', 'Kaffee'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'コーヒーをください', 'correct' => ['コーヒー', 'を', 'ください'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '커피를 주세요', 'correct' => ['커피를', '주세요'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'bir kahve istiyorum', 'correct' => ['bir', 'kahve', 'istiyorum'], 'extra' => ['i̇stiyorum', 'hesap']],
                            'ru' => ['sentence' => 'я хочу кофе', 'correct' => ['я', 'хочу', 'кофе'], 'extra' => ['торт']],
                            'ar' => ['sentence' => 'أريد قهوة', 'correct' => ['أريد', 'قهوة'], 'extra' => ['كعكة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['hesab', 'zəhmət olmasa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill please', 'correct' => ['the bill', 'please'], 'extra' => ['coffee']],
                            'fr' => ['sentence' => "L'addition s'il vous plaît", 'correct' => ["l'addition", "s'il vous plaît"], 'extra' => ['café']],
                            'es' => ['sentence' => 'La cuenta por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Die Rechnung bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['i̇stiyorum', 'kahve']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['кофе']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['قهوة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['istəyirəm', 'bir', 'tort', 'və', 'hesab'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a cake and the bill', 'correct' => ['I would like', 'a', 'cake', 'and', 'the bill'], 'extra' => ['tea']],
                            'fr' => ['sentence' => "Je voudrais un gâteau et l'addition", 'correct' => ['je voudrais', 'un', 'gâteau', 'et', "l'addition"], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Quisiera un pastel y la cuenta', 'correct' => ['quisiera', 'un', 'pastel', 'y', 'la cuenta'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte einen Kuchen und die Rechnung', 'correct' => ['ich möchte', 'einen', 'Kuchen', 'und', 'die Rechnung'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'ケーキとお会計をお願いします', 'correct' => ['ケーキ', 'と', 'お会計', 'を', 'お願いします'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '케이크와 계산서를 주세요', 'correct' => ['케이크와', '계산서를', '주세요'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'bir pasta istiyorum ve hesap', 'correct' => ['bir', 'pasta', 'istiyorum', 've', 'hesap'], 'extra' => ['i̇stiyorum', 'kahve']],
                            'ru' => ['sentence' => 'я хочу торт и счёт', 'correct' => ['я', 'хочу', 'торт', 'и', 'счёт'], 'extra' => ['чай']],
                            'ar' => ['sentence' => 'أريد كعكة و الحساب', 'correct' => ['أريد', 'كعكة', 'و', 'الحساب'], 'extra' => ['شاي']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
