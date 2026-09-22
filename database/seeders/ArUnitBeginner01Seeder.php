<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitBeginner01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'قهوة' => 'coffee', 'شاي' => 'tea', 'ماء' => 'water', 'حليب' => 'milk',
        'خبز' => 'bread', 'جبن' => 'cheese', 'كعكة' => 'cake', 'سكر' => 'sugar',
        'الحساب' => 'bill',
    ];

    /**
     * Arabic Beginner Unit 1.
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
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: At the Café', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Coffee & Tea', 1,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'هذا'], ['ar' => 'مع السلامة']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'قهوة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A coffee', 'correct' => ['this is', 'a', 'coffee'], 'extra' => ['tea', 'and']],
                            'az' => ['sentence' => 'bu bir qəhvə', 'correct' => ['bu', 'bir', 'qəhvə'], 'extra' => ['çay', 'və']],
                            'fr' => ['sentence' => "C'est Un café", 'correct' => ["c'est", 'un', 'café'], 'extra' => ['thé', 'et']],
                            'es' => ['sentence' => 'Esto es Un café', 'correct' => ['esto es', 'un', 'café'], 'extra' => ['té', 'y']],
                            'de' => ['sentence' => 'Das ist Einen Kaffee', 'correct' => ['das ist', 'einen', 'Kaffee'], 'extra' => ['Tee', 'und']],
                            'ja' => ['sentence' => 'これはコーヒーです', 'correct' => ['これは', 'コーヒー'], 'extra' => ['お茶', 'と']],
                            'ko' => ['sentence' => '이것은 커피입니다', 'correct' => ['이것은', '커피'], 'extra' => ['차', '그리고']],
                            'tr' => ['sentence' => 'bir kahve', 'correct' => ['bir', 'kahve'], 'extra' => ['ve', 'çay']],
                            'ru' => ['sentence' => 'Это кофе', 'correct' => ['это', 'кофе'], 'extra' => ['чай', 'и']],
                        ],
                    ],
                    'b' => [
                        'words' => ['هذا', 'شاي'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is A tea', 'correct' => ['this is', 'a', 'tea'], 'extra' => ['coffee', 'and']],
                            'az' => ['sentence' => 'bu bir çay', 'correct' => ['bu', 'bir', 'çay'], 'extra' => ['qəhvə', 'və']],
                            'fr' => ['sentence' => "C'est Un thé", 'correct' => ["c'est", 'un', 'thé'], 'extra' => ['café', 'et']],
                            'es' => ['sentence' => 'Esto es Un té', 'correct' => ['esto es', 'un', 'té'], 'extra' => ['café', 'y']],
                            'de' => ['sentence' => 'Das ist Einen Tee', 'correct' => ['das ist', 'einen', 'Tee'], 'extra' => ['Kaffee', 'und']],
                            'ja' => ['sentence' => 'これはお茶です', 'correct' => ['これは', 'お茶'], 'extra' => ['コーヒー', 'と']],
                            'ko' => ['sentence' => '이것은 차입니다', 'correct' => ['이것은', '차'], 'extra' => ['커피', '그리고']],
                            'tr' => ['sentence' => 'bir çay', 'correct' => ['bir', 'çay'], 'extra' => ['ve', 'kahve']],
                            'ru' => ['sentence' => 'Это чай', 'correct' => ['это', 'чай'], 'extra' => ['кофе', 'и']],
                        ],
                    ],
                    'c' => [
                        'words' => ['قهوة', 'و', 'شاي'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A coffee and a tea', 'correct' => ['a', 'coffee', 'and', 'a', 'tea'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir qəhvə və bir çay', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'çay'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Un café et un thé', 'correct' => ['un', 'café', 'et', 'un', 'thé'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Un café y un té', 'correct' => ['un', 'café', 'y', 'un', 'té'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Tee'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'コーヒーとお茶', 'correct' => ['コーヒー', 'と', 'お茶'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '커피와 차', 'correct' => ['커피와', '차'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir kahve ve bir çay', 'correct' => ['bir', 'kahve', 've', 'bir', 'çay'], 'extra' => []],
                            'ru' => ['sentence' => 'кофе и чай', 'correct' => ['кофе', 'и', 'чай'], 'extra' => ['молоко']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Water & Milk', 2,
                pictures: [['ar' => 'ماء', 'img' => 'water'], ['ar' => 'حليب', 'img' => 'milk']],
                plain: [['ar' => 'هذا'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'ماء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is A water', 'correct' => ['this is', 'a', 'water'], 'extra' => ['milk', 'please']],
                            'az' => ['sentence' => 'bu bir su', 'correct' => ['bu', 'bir', 'su'], 'extra' => ['süd', 'zəhmət olmasa']],
                            'fr' => ['sentence' => "C'est Une eau", 'correct' => ["c'est", 'une', 'eau'], 'extra' => ['lait', "s'il vous plaît"]],
                            'es' => ['sentence' => 'Esto es Un agua', 'correct' => ['esto es', 'un', 'agua'], 'extra' => ['leche', 'por favor']],
                            'de' => ['sentence' => 'Das ist Ein Wasser', 'correct' => ['das ist', 'ein', 'Wasser'], 'extra' => ['Milch', 'bitte']],
                            'ja' => ['sentence' => 'これは水です', 'correct' => ['これは', '水'], 'extra' => ['牛乳', 'お願いします']],
                            'ko' => ['sentence' => '이것은 물입니다', 'correct' => ['이것은', '물'], 'extra' => ['우유', '부탁합니다']],
                            'tr' => ['sentence' => 'bir su', 'correct' => ['bir', 'su'], 'extra' => ['lütfen', 'merhaba']],
                            'ru' => ['sentence' => 'Это вода', 'correct' => ['это', 'вода'], 'extra' => ['молоко', 'пожалуйста']],
                        ],
                    ],
                    'b' => [
                        'words' => ['حليب', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A milk please', 'correct' => ['a', 'milk', 'please'], 'extra' => ['water']],
                            'az' => ['sentence' => 'bir süd zəhmət olmasa', 'correct' => ['bir', 'süd', 'zəhmət olmasa'], 'extra' => ['su']],
                            'fr' => ['sentence' => "Un lait s'il vous plaît", 'correct' => ['un', 'lait', "s'il vous plaît"], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Una leche por favor', 'correct' => ['una', 'leche', 'por favor'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Eine Milch bitte', 'correct' => ['eine', 'Milch', 'bitte'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳をお願いします', 'correct' => ['牛乳', 'を', 'お願いします'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유 부탁합니다', 'correct' => ['우유', '부탁합니다'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'bir süt lütfen', 'correct' => ['bir', 'süt', 'lütfen'], 'extra' => ['merhaba', 'su']],
                            'ru' => ['sentence' => 'молоко пожалуйста', 'correct' => ['молоко', 'пожалуйста'], 'extra' => ['вода']],
                        ],
                    ],
                    'c' => [
                        'words' => ['مرحبا', 'ماء', 'و', 'حليب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Hello a water and a milk', 'correct' => ['hello', 'a', 'water', 'and', 'a', 'milk'], 'extra' => ['please']],
                            'az' => ['sentence' => 'salam bir su və bir süd', 'correct' => ['salam', 'bir', 'su', 'və', 'bir', 'süd'], 'extra' => ['zəhmət olmasa']],
                            'fr' => ['sentence' => 'Bonjour une eau et un lait', 'correct' => ['bonjour', 'une', 'eau', 'et', 'un', 'lait'], 'extra' => ["s'il vous plaît"]],
                            'es' => ['sentence' => 'Hola un agua y una leche', 'correct' => ['hola', 'un', 'agua', 'y', 'una', 'leche'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Hallo ein Wasser und eine Milch', 'correct' => ['hallo', 'ein', 'Wasser', 'und', 'eine', 'Milch'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'こんにちは、水と牛乳', 'correct' => ['こんにちは', '水', 'と', '牛乳'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '안녕하세요 물과 우유', 'correct' => ['안녕하세요', '물과', '우유'], 'extra' => ['부탁합니다']],
                            'tr' => ['sentence' => 'merhaba bir su ve bir süt', 'correct' => ['merhaba', 'bir', 'su', 've', 'bir', 'süt'], 'extra' => ['lütfen']],
                            'ru' => ['sentence' => 'привет вода и молоко', 'correct' => ['привет', 'вода', 'и', 'молоко'], 'extra' => ['пожалуйста']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Bread & Cheese', 3,
                pictures: [['ar' => 'خبز', 'img' => 'bread'], ['ar' => 'جبن', 'img' => 'cheese']],
                plain: [['ar' => 'هذا'], ['ar' => 'شكرا']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'خبز'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is A bread', 'correct' => ['this is', 'a', 'bread'], 'extra' => ['cheese', 'and']],
                            'az' => ['sentence' => 'bu bir çörək', 'correct' => ['bu', 'bir', 'çörək'], 'extra' => ['pendir', 'və']],
                            'fr' => ['sentence' => "C'est Un pain", 'correct' => ["c'est", 'un', 'pain'], 'extra' => ['fromage', 'et']],
                            'es' => ['sentence' => 'Esto es Un pan', 'correct' => ['esto es', 'un', 'pan'], 'extra' => ['queso', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Brot', 'correct' => ['das ist', 'ein', 'Brot'], 'extra' => ['Käse', 'und']],
                            'ja' => ['sentence' => 'これはパンです', 'correct' => ['これは', 'パン'], 'extra' => ['チーズ', 'と']],
                            'ko' => ['sentence' => '이것은 빵입니다', 'correct' => ['이것은', '빵'], 'extra' => ['치즈', '그리고']],
                            'tr' => ['sentence' => 'bir ekmek', 'correct' => ['bir', 'ekmek'], 'extra' => ['ve', 'teşekkürler']],
                            'ru' => ['sentence' => 'Это хлеб', 'correct' => ['это', 'хлеб'], 'extra' => ['сыр', 'и']],
                        ],
                    ],
                    'b' => [
                        'words' => ['خبز', 'و', 'جبن'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Bread and cheese', 'correct' => ['bread', 'and', 'cheese'], 'extra' => ['thank you']],
                            'az' => ['sentence' => 'çörək və pendir', 'correct' => ['çörək', 'və', 'pendir'], 'extra' => ['təşəkkür']],
                            'fr' => ['sentence' => 'Pain et fromage', 'correct' => ['pain', 'et', 'fromage'], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Pan y queso', 'correct' => ['pan', 'y', 'queso'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Brot und Käse', 'correct' => ['Brot', 'und', 'Käse'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'パンとチーズ', 'correct' => ['パン', 'と', 'チーズ'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '빵과 치즈', 'correct' => ['빵과', '치즈'], 'extra' => ['감사합니다']],
                            'tr' => ['sentence' => 'ekmek ve peynir', 'correct' => ['ekmek', 've', 'peynir'], 'extra' => ['teşekkürler']],
                            'ru' => ['sentence' => 'хлеб и сыр', 'correct' => ['хлеб', 'и', 'сыр'], 'extra' => ['спасибо']],
                        ],
                    ],
                    'c' => [
                        'words' => ['خبز', 'و', 'جبن', 'شكرا'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'A bread and a cheese thank you', 'correct' => ['a', 'bread', 'and', 'a', 'cheese', 'thank you'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'bir çörək və bir pendir təşəkkür', 'correct' => ['bir', 'çörək', 'və', 'bir', 'pendir', 'təşəkkür'], 'extra' => ['qəhvə']],
                            'fr' => ['sentence' => 'Un pain et un fromage merci', 'correct' => ['un', 'pain', 'et', 'un', 'fromage', 'merci'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Un pan y un queso gracias', 'correct' => ['un', 'pan', 'y', 'un', 'queso', 'gracias'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ein Brot und ein Käse danke', 'correct' => ['ein', 'Brot', 'und', 'ein', 'Käse', 'danke'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'パンとチーズ、ありがとう', 'correct' => ['パン', 'と', 'チーズ', 'ありがとう'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '빵과 치즈 감사합니다', 'correct' => ['빵과', '치즈', '감사합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bir ekmek ve bir peynir teşekkürler', 'correct' => ['bir', 'ekmek', 've', 'bir', 'peynir', 'teşekkürler'], 'extra' => []],
                            'ru' => ['sentence' => 'хлеб и сыр спасибо', 'correct' => ['хлеб', 'и', 'сыр', 'спасибо'], 'extra' => ['кофе']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Sugar & Cake', 4,
                pictures: [['ar' => 'كعكة', 'img' => 'cake'], ['ar' => 'سكر', 'img' => 'sugar']],
                plain: [['ar' => 'هذا'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'كعكة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A cake', 'correct' => ['this is', 'a', 'cake'], 'extra' => ['sugar', 'please']],
                            'az' => ['sentence' => 'bu bir tort', 'correct' => ['bu', 'bir', 'tort'], 'extra' => ['şəkər', 'zəhmət olmasa']],
                            'fr' => ['sentence' => "C'est Un gâteau", 'correct' => ["c'est", 'un', 'gâteau'], 'extra' => ['sucre', "s'il vous plaît"]],
                            'es' => ['sentence' => 'Esto es Un pastel', 'correct' => ['esto es', 'un', 'pastel'], 'extra' => ['azúcar', 'por favor']],
                            'de' => ['sentence' => 'Das ist Einen Kuchen', 'correct' => ['das ist', 'einen', 'Kuchen'], 'extra' => ['Zucker', 'bitte']],
                            'ja' => ['sentence' => 'これはケーキです', 'correct' => ['これは', 'ケーキ'], 'extra' => ['砂糖', 'お願いします']],
                            'ko' => ['sentence' => '이것은 케이크입니다', 'correct' => ['이것은', '케이크'], 'extra' => ['설탕', '부탁합니다']],
                            'tr' => ['sentence' => 'bir pasta', 'correct' => ['bir', 'pasta'], 'extra' => ['lütfen', 'şeker']],
                            'ru' => ['sentence' => 'Это торт', 'correct' => ['это', 'торт'], 'extra' => ['сахар', 'пожалуйста']],
                        ],
                    ],
                    'b' => [
                        'words' => ['سكر', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A sugar please', 'correct' => ['a', 'sugar', 'please'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'bir şəkər zəhmət olmasa', 'correct' => ['bir', 'şəkər', 'zəhmət olmasa'], 'extra' => ['tort']],
                            'fr' => ['sentence' => "Un sucre s'il vous plaît", 'correct' => ['un', 'sucre', "s'il vous plaît"], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Un azúcar por favor', 'correct' => ['un', 'azúcar', 'por favor'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Einen Zucker bitte', 'correct' => ['einen', 'Zucker', 'bitte'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => '砂糖をお願いします', 'correct' => ['砂糖', 'を', 'お願いします'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '설탕 부탁합니다', 'correct' => ['설탕', '부탁합니다'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'bir şeker lütfen', 'correct' => ['bir', 'şeker', 'lütfen'], 'extra' => ['pasta']],
                            'ru' => ['sentence' => 'сахар пожалуйста', 'correct' => ['сахар', 'пожалуйста'], 'extra' => ['торт']],
                        ],
                    ],
                    'c' => [
                        'words' => ['قهوة', 'و', 'كعكة', 'من فضلك'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'A coffee and a cake please', 'correct' => ['a', 'coffee', 'and', 'a', 'cake', 'please'], 'extra' => ['sugar']],
                            'az' => ['sentence' => 'bir qəhvə və bir tort zəhmət olmasa', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'tort', 'zəhmət olmasa'], 'extra' => ['şəkər']],
                            'fr' => ['sentence' => "Un café et un gâteau s'il vous plaît", 'correct' => ['un', 'café', 'et', 'un', 'gâteau', "s'il vous plaît"], 'extra' => ['sucre']],
                            'es' => ['sentence' => 'Un café y un pastel por favor', 'correct' => ['un', 'café', 'y', 'un', 'pastel', 'por favor'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Kuchen bitte', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Kuchen', 'bitte'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => 'コーヒーとケーキをお願いします', 'correct' => ['コーヒー', 'と', 'ケーキ', 'を', 'お願いします'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '커피와 케이크 부탁합니다', 'correct' => ['커피와', '케이크', '부탁합니다'], 'extra' => ['설탕']],
                            'tr' => ['sentence' => 'bir kahve ve bir pasta lütfen', 'correct' => ['bir', 'kahve', 've', 'bir', 'pasta', 'lütfen'], 'extra' => ['şeker']],
                            'ru' => ['sentence' => 'кофе и торт пожалуйста', 'correct' => ['кофе', 'и', 'торт', 'пожалуйста'], 'extra' => ['сахар']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ordering', 5,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'الحساب', 'img' => 'bill']],
                plain: [['ar' => 'أريد'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'قهوة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a coffee', 'correct' => ['I would like', 'a', 'coffee'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'istəyirəm bir qəhvə', 'correct' => ['istəyirəm', 'bir', 'qəhvə'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Je voudrais un café', 'correct' => ['je voudrais', 'un', 'café'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Quisiera un café', 'correct' => ['quisiera', 'un', 'café'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ich möchte einen Kaffee', 'correct' => ['ich möchte', 'einen', 'Kaffee'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'コーヒーをください', 'correct' => ['コーヒー', 'を', 'ください'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '커피를 주세요', 'correct' => ['커피를', '주세요'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'bir kahve istiyorum', 'correct' => ['bir', 'kahve', 'istiyorum'], 'extra' => ['i̇stiyorum', 'hesap']],
                            'ru' => ['sentence' => 'я хочу кофе', 'correct' => ['я', 'хочу', 'кофе'], 'extra' => ['торт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الحساب', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill please', 'correct' => ['the bill', 'please'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['qəhvə']],
                            'fr' => ['sentence' => "L'addition s'il vous plaît", 'correct' => ["l'addition", "s'il vous plaît"], 'extra' => ['café']],
                            'es' => ['sentence' => 'La cuenta por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Die Rechnung bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['i̇stiyorum', 'kahve']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['кофе']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أريد', 'كعكة', 'و', 'الحساب'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I would like a cake and the bill', 'correct' => ['I would like', 'a', 'cake', 'and', 'the bill'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'istəyirəm bir tort və hesab', 'correct' => ['istəyirəm', 'bir', 'tort', 'və', 'hesab'], 'extra' => ['çay']],
                            'fr' => ['sentence' => "Je voudrais un gâteau et l'addition", 'correct' => ['je voudrais', 'un', 'gâteau', 'et', "l'addition"], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Quisiera un pastel y la cuenta', 'correct' => ['quisiera', 'un', 'pastel', 'y', 'la cuenta'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte einen Kuchen und die Rechnung', 'correct' => ['ich möchte', 'einen', 'Kuchen', 'und', 'die Rechnung'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'ケーキとお会計をお願いします', 'correct' => ['ケーキ', 'と', 'お会計', 'を', 'お願いします'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '케이크와 계산서를 주세요', 'correct' => ['케이크와', '계산서를', '주세요'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'bir pasta istiyorum ve hesap', 'correct' => ['bir', 'pasta', 'istiyorum', 've', 'hesap'], 'extra' => ['i̇stiyorum', 'kahve']],
                            'ru' => ['sentence' => 'я хочу торт и счёт', 'correct' => ['я', 'хочу', 'торт', 'и', 'счёт'], 'extra' => ['чай']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
