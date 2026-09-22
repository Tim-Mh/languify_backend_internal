<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitBeginner01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Кофе' => 'coffee', 'Чай' => 'tea', 'Вода' => 'water', 'Молоко' => 'milk',
        'Хлеб' => 'bread', 'Сыр' => 'cheese', 'Торт' => 'cake', 'Сахар' => 'sugar',
    ];

    /**
     * Russian Beginner Unit 1 — ordering at a café.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     * Words drilled only in isolation don't stick, so nothing is taught that
     * the learner never gets to use.
     *
     * RUSSIAN-SPECIFIC CHOICE: this unit stays on bare nominative nouns.
     * Russian marks the direct object with the accusative (`воду`, not `вода`),
     * and introducing that in lesson 1 would put grammar on every tile that the
     * learner has no way to parse yet. A café order is a noun phrase, not a
     * sentence — "Кофе и чай, пожалуйста" is exactly what a Russian speaker
     * says and needs no case marking at all. Cases arrive in Unit 4.
     *
     * The other half of that choice is what Russian LACKS: there are no
     * articles, so where the Turkish and French courses spend Unit 1 teaching
     * "bir"/"un", this unit spends it on real vocabulary instead.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ru')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: At the Café', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Coffee & Tea', 1,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'И'], ['ru' => 'Пожалуйста']],
                phrases: [
                    'a' => [
                        'words' => ['кофе', 'пожалуйста'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Coffee please', 'correct' => ['coffee', 'please'], 'extra' => ['tea', 'and']],
                            'az' => ['sentence' => 'qəhvə zəhmət olmasa', 'correct' => ['qəhvə', 'zəhmət olmasa'], 'extra' => ['çay', 'və']],
                            'ar' => ['sentence' => 'قهوة من فضلك', 'correct' => ['قهوة', 'من فضلك'], 'extra' => ['شاي', 'و']],
                            'fr' => ['sentence' => "Un café s'il vous plaît", 'correct' => ['café', "s'il vous plaît"], 'extra' => ['thé', 'et']],
                            'es' => ['sentence' => 'Un café por favor', 'correct' => ['café', 'por favor'], 'extra' => ['té', 'y']],
                            'de' => ['sentence' => 'Einen Kaffee bitte', 'correct' => ['Kaffee', 'bitte'], 'extra' => ['Tee', 'und']],
                            'ja' => ['sentence' => 'コーヒーをお願いします', 'correct' => ['コーヒー', 'お願いします'], 'extra' => ['お茶', 'と']],
                            'ko' => ['sentence' => '커피 부탁합니다', 'correct' => ['커피', '부탁합니다'], 'extra' => ['차', '그리고']],
                            'tr' => ['sentence' => 'Kahve lütfen', 'correct' => ['kahve', 'lütfen'], 'extra' => ['çay', 've']],
                        ],
                    ],
                    'b' => [
                        'words' => ['чай', 'пожалуйста'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Tea please', 'correct' => ['tea', 'please'], 'extra' => ['coffee', 'and']],
                            'az' => ['sentence' => 'çay zəhmət olmasa', 'correct' => ['çay', 'zəhmət olmasa'], 'extra' => ['qəhvə', 'və']],
                            'ar' => ['sentence' => 'شاي من فضلك', 'correct' => ['شاي', 'من فضلك'], 'extra' => ['قهوة', 'و']],
                            'fr' => ['sentence' => "Un thé s'il vous plaît", 'correct' => ['thé', "s'il vous plaît"], 'extra' => ['café', 'et']],
                            'es' => ['sentence' => 'Un té por favor', 'correct' => ['té', 'por favor'], 'extra' => ['café', 'y']],
                            'de' => ['sentence' => 'Einen Tee bitte', 'correct' => ['Tee', 'bitte'], 'extra' => ['Kaffee', 'und']],
                            'ja' => ['sentence' => 'お茶をお願いします', 'correct' => ['お茶', 'お願いします'], 'extra' => ['コーヒー', 'と']],
                            'ko' => ['sentence' => '차 부탁합니다', 'correct' => ['차', '부탁합니다'], 'extra' => ['커피', '그리고']],
                            'tr' => ['sentence' => 'Çay lütfen', 'correct' => ['çay', 'lütfen'], 'extra' => ['kahve', 've']],
                        ],
                    ],
                    'c' => [
                        'words' => ['кофе', 'и', 'чай', 'пожалуйста'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Coffee and tea please', 'correct' => ['coffee', 'and', 'tea', 'please'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'qəhvə və çay zəhmət olmasa', 'correct' => ['qəhvə', 'və', 'çay', 'zəhmət olmasa'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'قهوة و شاي من فضلك', 'correct' => ['قهوة', 'و', 'شاي', 'من فضلك'], 'extra' => ['حليب']],
                            'fr' => ['sentence' => "Un café et un thé s'il vous plaît", 'correct' => ['café', 'et', 'thé', "s'il vous plaît"], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Un café y un té por favor', 'correct' => ['café', 'y', 'té', 'por favor'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee bitte', 'correct' => ['Kaffee', 'und', 'Tee', 'bitte'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'コーヒーとお茶をお願いします', 'correct' => ['コーヒー', 'と', 'お茶', 'お願いします'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '커피와 차 부탁합니다', 'correct' => ['커피', '그리고', '차', '부탁합니다'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'Kahve ve çay lütfen', 'correct' => ['kahve', 've', 'çay', 'lütfen'], 'extra' => ['süt']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Water & Milk', 2,
                pictures: [['ru' => 'Вода', 'img' => 'water'], ['ru' => 'Молоко', 'img' => 'milk']],
                plain: [['ru' => 'Привет'], ['ru' => 'Спасибо']],
                phrases: [
                    'a' => [
                        'words' => ['вода', 'пожалуйста'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Water please', 'correct' => ['water', 'please'], 'extra' => ['milk', 'hello']],
                            'az' => ['sentence' => 'su zəhmət olmasa', 'correct' => ['su', 'zəhmət olmasa'], 'extra' => ['süd', 'salam']],
                            'ar' => ['sentence' => 'ماء من فضلك', 'correct' => ['ماء', 'من فضلك'], 'extra' => ['حليب', 'مرحبا']],
                            'fr' => ['sentence' => "Une eau s'il vous plaît", 'correct' => ['eau', "s'il vous plaît"], 'extra' => ['lait', 'bonjour']],
                            'es' => ['sentence' => 'Un agua por favor', 'correct' => ['agua', 'por favor'], 'extra' => ['leche', 'hola']],
                            'de' => ['sentence' => 'Ein Wasser bitte', 'correct' => ['Wasser', 'bitte'], 'extra' => ['Milch', 'hallo']],
                            'ja' => ['sentence' => '水をお願いします', 'correct' => ['水', 'お願いします'], 'extra' => ['牛乳', 'こんにちは']],
                            'ko' => ['sentence' => '물 부탁합니다', 'correct' => ['물', '부탁합니다'], 'extra' => ['우유', '안녕하세요']],
                            'tr' => ['sentence' => 'Su lütfen', 'correct' => ['su', 'lütfen'], 'extra' => ['süt', 'merhaba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['молоко', 'спасибо'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Milk thank you', 'correct' => ['milk', 'thank you'], 'extra' => ['water']],
                            'az' => ['sentence' => 'süd təşəkkür', 'correct' => ['süd', 'təşəkkür'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'حليب شكرا', 'correct' => ['حليب', 'شكرا'], 'extra' => ['ماء']],
                            'fr' => ['sentence' => 'Un lait merci', 'correct' => ['lait', 'merci'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Una leche gracias', 'correct' => ['leche', 'gracias'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Eine Milch danke', 'correct' => ['Milch', 'danke'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳ありがとう', 'correct' => ['牛乳', 'ありがとう'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유 감사합니다', 'correct' => ['우유', '감사합니다'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'Süt teşekkürler', 'correct' => ['süt', 'teşekkürler'], 'extra' => ['su']],
                        ],
                    ],
                    'c' => [
                        'words' => ['привет', 'вода', 'и', 'молоко'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Hello water and milk', 'correct' => ['hello', 'water', 'and', 'milk'], 'extra' => ['thank you']],
                            'az' => ['sentence' => 'salam su və süd', 'correct' => ['salam', 'su', 'və', 'süd'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'مرحبا ماء و حليب', 'correct' => ['مرحبا', 'ماء', 'و', 'حليب'], 'extra' => ['شكرا']],
                            'fr' => ['sentence' => 'Bonjour une eau et un lait', 'correct' => ['bonjour', 'eau', 'et', 'lait'], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Hola un agua y una leche', 'correct' => ['hola', 'agua', 'y', 'leche'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Hallo ein Wasser und eine Milch', 'correct' => ['hallo', 'Wasser', 'und', 'Milch'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'こんにちは水と牛乳', 'correct' => ['こんにちは', '水', 'と', '牛乳'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '안녕하세요 물 그리고 우유', 'correct' => ['안녕하세요', '물', '그리고', '우유'], 'extra' => ['감사합니다']],
                            'tr' => ['sentence' => 'Merhaba su ve süt', 'correct' => ['merhaba', 'su', 've', 'süt'], 'extra' => ['teşekkürler']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Bread & Cheese', 3,
                pictures: [['ru' => 'Хлеб', 'img' => 'bread'], ['ru' => 'Сыр', 'img' => 'cheese']],
                plain: [['ru' => 'И'], ['ru' => 'Спасибо']],
                phrases: [
                    'a' => [
                        'words' => ['хлеб', 'и', 'сыр'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Bread and cheese', 'correct' => ['bread', 'and', 'cheese'], 'extra' => ['thank you']],
                            'az' => ['sentence' => 'çörək və pendir', 'correct' => ['çörək', 'və', 'pendir'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'خبز و جبن', 'correct' => ['خبز', 'و', 'جبن'], 'extra' => ['شكرا']],
                            'fr' => ['sentence' => 'Du pain et du fromage', 'correct' => ['pain', 'et', 'fromage'], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Pan y queso', 'correct' => ['pan', 'y', 'queso'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Brot und Käse', 'correct' => ['Brot', 'und', 'Käse'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'パンとチーズ', 'correct' => ['パン', 'と', 'チーズ'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '빵 그리고 치즈', 'correct' => ['빵', '그리고', '치즈'], 'extra' => ['감사합니다']],
                            'tr' => ['sentence' => 'Ekmek ve peynir', 'correct' => ['ekmek', 've', 'peynir'], 'extra' => ['teşekkürler']],
                        ],
                    ],
                    'b' => [
                        'words' => ['сыр', 'пожалуйста'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Cheese please', 'correct' => ['cheese', 'please'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'pendir zəhmət olmasa', 'correct' => ['pendir', 'zəhmət olmasa'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'جبن من فضلك', 'correct' => ['جبن', 'من فضلك'], 'extra' => ['خبز']],
                            'fr' => ['sentence' => "Du fromage s'il vous plaît", 'correct' => ['fromage', "s'il vous plaît"], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Queso por favor', 'correct' => ['queso', 'por favor'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Käse bitte', 'correct' => ['Käse', 'bitte'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'チーズをお願いします', 'correct' => ['チーズ', 'お願いします'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '치즈 부탁합니다', 'correct' => ['치즈', '부탁합니다'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'Peynir lütfen', 'correct' => ['peynir', 'lütfen'], 'extra' => ['ekmek']],
                        ],
                    ],
                    'c' => [
                        'words' => ['хлеб', 'сыр', 'и', 'чай', 'спасибо'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Bread cheese and tea thank you', 'correct' => ['bread', 'cheese', 'and', 'tea', 'thank you'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'çörək pendir və çay təşəkkür', 'correct' => ['çörək', 'pendir', 'və', 'çay', 'təşəkkür'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'خبز جبن و شاي شكرا', 'correct' => ['خبز', 'جبن', 'و', 'شاي', 'شكرا'], 'extra' => ['قهوة']],
                            'fr' => ['sentence' => 'Du pain du fromage et un thé merci', 'correct' => ['pain', 'fromage', 'et', 'thé', 'merci'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Pan queso y un té gracias', 'correct' => ['pan', 'queso', 'y', 'té', 'gracias'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Brot Käse und einen Tee danke', 'correct' => ['Brot', 'Käse', 'und', 'Tee', 'danke'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'パンとチーズとお茶ありがとう', 'correct' => ['パン', 'チーズ', 'と', 'お茶', 'ありがとう'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '빵 치즈 그리고 차 감사합니다', 'correct' => ['빵', '치즈', '그리고', '차', '감사합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'Ekmek peynir ve çay teşekkürler', 'correct' => ['ekmek', 'peynir', 've', 'çay', 'teşekkürler'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Sugar & Cake', 4,
                pictures: [['ru' => 'Сахар', 'img' => 'sugar'], ['ru' => 'Торт', 'img' => 'cake']],
                plain: [['ru' => 'Пожалуйста'], ['ru' => 'Да']],
                phrases: [
                    'a' => [
                        'words' => ['торт', 'пожалуйста'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Cake please', 'correct' => ['cake', 'please'], 'extra' => ['sugar', 'yes']],
                            'az' => ['sentence' => 'tort zəhmət olmasa', 'correct' => ['tort', 'zəhmət olmasa'], 'extra' => ['şəkər', 'bəli']],
                            'ar' => ['sentence' => 'كعكة من فضلك', 'correct' => ['كعكة', 'من فضلك'], 'extra' => ['سكر', 'نعم']],
                            'fr' => ['sentence' => "Un gâteau s'il vous plaît", 'correct' => ['gâteau', "s'il vous plaît"], 'extra' => ['sucre', 'oui']],
                            'es' => ['sentence' => 'Un pastel por favor', 'correct' => ['pastel', 'por favor'], 'extra' => ['azúcar', 'sí']],
                            'de' => ['sentence' => 'Einen Kuchen bitte', 'correct' => ['Kuchen', 'bitte'], 'extra' => ['Zucker', 'ja']],
                            'ja' => ['sentence' => 'ケーキをお願いします', 'correct' => ['ケーキ', 'お願いします'], 'extra' => ['砂糖', 'はい']],
                            'ko' => ['sentence' => '케이크 부탁합니다', 'correct' => ['케이크', '부탁합니다'], 'extra' => ['설탕', '네']],
                            'tr' => ['sentence' => 'Pasta lütfen', 'correct' => ['pasta', 'lütfen'], 'extra' => ['şeker', 'evet']],
                        ],
                    ],
                    'b' => [
                        'words' => ['да', 'сахар', 'пожалуйста'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Yes sugar please', 'correct' => ['yes', 'sugar', 'please'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'bəli şəkər zəhmət olmasa', 'correct' => ['bəli', 'şəkər', 'zəhmət olmasa'], 'extra' => ['tort']],
                            'ar' => ['sentence' => 'نعم سكر من فضلك', 'correct' => ['نعم', 'سكر', 'من فضلك'], 'extra' => ['كعكة']],
                            'fr' => ['sentence' => "Oui du sucre s'il vous plaît", 'correct' => ['oui', 'sucre', "s'il vous plaît"], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Sí azúcar por favor', 'correct' => ['sí', 'azúcar', 'por favor'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ja Zucker bitte', 'correct' => ['ja', 'Zucker', 'bitte'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'はい砂糖をお願いします', 'correct' => ['はい', '砂糖', 'お願いします'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '네 설탕 부탁합니다', 'correct' => ['네', '설탕', '부탁합니다'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'Evet şeker lütfen', 'correct' => ['evet', 'şeker', 'lütfen'], 'extra' => ['pasta']],
                        ],
                    ],
                    'c' => [
                        'words' => ['торт', 'и', 'кофе', 'сахар', 'пожалуйста'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Cake and coffee sugar please', 'correct' => ['cake', 'and', 'coffee', 'sugar', 'please'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'tort və qəhvə şəkər zəhmət olmasa', 'correct' => ['tort', 'və', 'qəhvə', 'şəkər', 'zəhmət olmasa'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'كعكة و قهوة سكر من فضلك', 'correct' => ['كعكة', 'و', 'قهوة', 'سكر', 'من فضلك'], 'extra' => ['شاي']],
                            'fr' => ['sentence' => "Un gâteau et un café du sucre s'il vous plaît", 'correct' => ['gâteau', 'et', 'café', 'sucre', "s'il vous plaît"], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Un pastel y un café azúcar por favor', 'correct' => ['pastel', 'y', 'café', 'azúcar', 'por favor'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Einen Kuchen und einen Kaffee Zucker bitte', 'correct' => ['Kuchen', 'und', 'Kaffee', 'Zucker', 'bitte'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'ケーキとコーヒー砂糖をお願いします', 'correct' => ['ケーキ', 'と', 'コーヒー', '砂糖', 'お願いします'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '케이크 그리고 커피 설탕 부탁합니다', 'correct' => ['케이크', '그리고', '커피', '설탕', '부탁합니다'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'Pasta ve kahve şeker lütfen', 'correct' => ['pasta', 've', 'kahve', 'şeker', 'lütfen'], 'extra' => ['çay']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ordering', 5,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Торт', 'img' => 'cake']],
                plain: [['ru' => 'Хочу'], ['ru' => 'Счёт']],
                phrases: [
                    'a' => [
                        'words' => ['я', 'хочу', 'кофе'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like coffee', 'correct' => ['I', 'I would like', 'coffee'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'mən istəyirəm qəhvə', 'correct' => ['mən', 'istəyirəm', 'qəhvə'], 'extra' => ['tort']],
                            'ar' => ['sentence' => 'أنا أريد قهوة', 'correct' => ['أنا', 'أريد', 'قهوة'], 'extra' => ['كعكة']],
                            'fr' => ['sentence' => 'Je voudrais un café', 'correct' => ['je', 'je voudrais', 'café'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Quisiera un café', 'correct' => ['yo', 'quisiera', 'café'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ich möchte einen Kaffee', 'correct' => ['ich', 'ich möchte', 'Kaffee'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'コーヒーをください', 'correct' => ['私', 'ください', 'コーヒー'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '커피 주세요', 'correct' => ['저', '주세요', '커피'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'Kahve istiyorum', 'correct' => ['ben', 'istiyorum', 'kahve'], 'extra' => ['pasta']],
                        ],
                    ],
                    'b' => [
                        'words' => ['счёт', 'пожалуйста'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The bill please', 'correct' => ['the bill', 'please'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['قهوة']],
                            'fr' => ['sentence' => "L'addition s'il vous plaît", 'correct' => ["l'addition", "s'il vous plaît"], 'extra' => ['café']],
                            'es' => ['sentence' => 'La cuenta por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Die Rechnung bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'Hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['я', 'хочу', 'торт', 'и', 'счёт'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I would like cake and the bill', 'correct' => ['I', 'I would like', 'cake', 'and', 'the bill'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'mən istəyirəm tort və hesab', 'correct' => ['mən', 'istəyirəm', 'tort', 'və', 'hesab'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أنا أريد كعكة و الحساب', 'correct' => ['أنا', 'أريد', 'كعكة', 'و', 'الحساب'], 'extra' => ['شاي']],
                            'fr' => ['sentence' => "Je voudrais un gâteau et l'addition", 'correct' => ['je', 'je voudrais', 'gâteau', 'et', "l'addition"], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Quisiera un pastel y la cuenta', 'correct' => ['yo', 'quisiera', 'pastel', 'y', 'la cuenta'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte einen Kuchen und die Rechnung', 'correct' => ['ich', 'ich möchte', 'Kuchen', 'und', 'die Rechnung'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'ケーキとお会計をください', 'correct' => ['私', 'ください', 'ケーキ', 'と', 'お会計'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '케이크 그리고 계산서 주세요', 'correct' => ['저', '주세요', '케이크', '그리고', '계산서'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'Pasta ve hesap istiyorum', 'correct' => ['ben', 'istiyorum', 'pasta', 've', 'hesap'], 'extra' => ['çay']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
