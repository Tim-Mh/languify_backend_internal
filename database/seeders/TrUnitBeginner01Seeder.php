<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kahve' => 'coffee', 'Çay' => 'tea', 'Su' => 'water', 'Süt' => 'milk',
        'Ekmek' => 'bread', 'Peynir' => 'cheese', 'Pasta' => 'cake', 'Şeker' => 'sugar',
    ];

    /**
     * Turkish Beginner Unit 1 — ordering at a café.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     * Words drilled only in isolation don't stick, so nothing is taught that
     * the learner never gets to use.
     *
     * TURKISH-SPECIFIC CHOICE: this unit stays on bare nominative nouns and the
     * `bir` article. That is not laziness — Turkish marks the definite direct
     * object with an accusative suffix (`kahveyi`, not `kahve`), and introducing
     * that in lesson 1 would mean every tile carries grammar the learner has no
     * way to parse yet. "Bir kahve ve bir çay" is a complete, natural order at a
     * café and needs no case marking at all, so the first unit can teach real
     * sentences without teaching morphology first. Cases arrive in Unit 4.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: At the Café', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Coffee & Tea', 1,
                pictures: [['tr' => 'Kahve', 'img' => 'coffee'], ['tr' => 'Çay', 'img' => 'tea']],
                plain: [['tr' => 'Bir'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kahve'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A coffee', 'correct' => ['a', 'coffee'], 'extra' => ['tea', 'and']],
                            'fr' => ['sentence' => 'Un café', 'correct' => ['un', 'café'], 'extra' => ['thé', 'et']],
                            'es' => ['sentence' => 'Un café', 'correct' => ['un', 'café'], 'extra' => ['té', 'y']],
                            'de' => ['sentence' => 'Einen Kaffee', 'correct' => ['einen', 'Kaffee'], 'extra' => ['Tee', 'und']],
                            'ja' => ['sentence' => 'コーヒー', 'correct' => ['コーヒー'], 'extra' => ['お茶', 'と']],
                            'ko' => ['sentence' => '커피', 'correct' => ['커피'], 'extra' => ['차', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'çay'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A tea', 'correct' => ['a', 'tea'], 'extra' => ['coffee', 'and']],
                            'fr' => ['sentence' => 'Un thé', 'correct' => ['un', 'thé'], 'extra' => ['café', 'et']],
                            'es' => ['sentence' => 'Un té', 'correct' => ['un', 'té'], 'extra' => ['café', 'y']],
                            'de' => ['sentence' => 'Einen Tee', 'correct' => ['einen', 'Tee'], 'extra' => ['Kaffee', 'und']],
                            'ja' => ['sentence' => 'お茶', 'correct' => ['お茶'], 'extra' => ['コーヒー', 'と']],
                            'ko' => ['sentence' => '차', 'correct' => ['차'], 'extra' => ['커피', '그리고']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kahve', 've', 'bir', 'çay'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A coffee and a tea', 'correct' => ['a', 'coffee', 'and', 'a', 'tea'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Un café et un thé', 'correct' => ['un', 'café', 'et', 'un', 'thé'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Un café y un té', 'correct' => ['un', 'café', 'y', 'un', 'té'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Tee'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'コーヒーとお茶', 'correct' => ['コーヒー', 'と', 'お茶'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '커피와 차', 'correct' => ['커피와', '차'], 'extra' => ['우유']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Water & Milk', 2,
                pictures: [['tr' => 'Su', 'img' => 'water'], ['tr' => 'Süt', 'img' => 'milk']],
                plain: [['tr' => 'Lütfen'], ['tr' => 'Merhaba']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'su'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A water', 'correct' => ['a', 'water'], 'extra' => ['milk', 'please']],
                            'fr' => ['sentence' => 'Une eau', 'correct' => ['une', 'eau'], 'extra' => ['lait', "s'il vous plaît"]],
                            'es' => ['sentence' => 'Un agua', 'correct' => ['un', 'agua'], 'extra' => ['leche', 'por favor']],
                            'de' => ['sentence' => 'Ein Wasser', 'correct' => ['ein', 'Wasser'], 'extra' => ['Milch', 'bitte']],
                            'ja' => ['sentence' => '水', 'correct' => ['水'], 'extra' => ['牛乳', 'お願いします']],
                            'ko' => ['sentence' => '물', 'correct' => ['물'], 'extra' => ['우유', '부탁합니다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'süt', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A milk please', 'correct' => ['a', 'milk', 'please'], 'extra' => ['water']],
                            'fr' => ['sentence' => "Un lait s'il vous plaît", 'correct' => ['un', 'lait', "s'il vous plaît"], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Una leche por favor', 'correct' => ['una', 'leche', 'por favor'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Eine Milch bitte', 'correct' => ['eine', 'Milch', 'bitte'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳をお願いします', 'correct' => ['牛乳', 'を', 'お願いします'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유 부탁합니다', 'correct' => ['우유', '부탁합니다'], 'extra' => ['물']],
                        ],
                    ],
                    'c' => [
                        'words' => ['merhaba', 'bir', 'su', 've', 'bir', 'süt'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Hello a water and a milk', 'correct' => ['hello', 'a', 'water', 'and', 'a', 'milk'], 'extra' => ['please']],
                            'fr' => ['sentence' => 'Bonjour une eau et un lait', 'correct' => ['bonjour', 'une', 'eau', 'et', 'un', 'lait'], 'extra' => ["s'il vous plaît"]],
                            'es' => ['sentence' => 'Hola un agua y una leche', 'correct' => ['hola', 'un', 'agua', 'y', 'una', 'leche'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Hallo ein Wasser und eine Milch', 'correct' => ['hallo', 'ein', 'Wasser', 'und', 'eine', 'Milch'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'こんにちは、水と牛乳', 'correct' => ['こんにちは', '水', 'と', '牛乳'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '안녕하세요 물과 우유', 'correct' => ['안녕하세요', '물과', '우유'], 'extra' => ['부탁합니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Bread & Cheese', 3,
                pictures: [['tr' => 'Ekmek', 'img' => 'bread'], ['tr' => 'Peynir', 'img' => 'cheese']],
                plain: [['tr' => 'Ve'], ['tr' => 'Teşekkürler']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'ekmek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A bread', 'correct' => ['a', 'bread'], 'extra' => ['cheese', 'and']],
                            'fr' => ['sentence' => 'Un pain', 'correct' => ['un', 'pain'], 'extra' => ['fromage', 'et']],
                            'es' => ['sentence' => 'Un pan', 'correct' => ['un', 'pan'], 'extra' => ['queso', 'y']],
                            'de' => ['sentence' => 'Ein Brot', 'correct' => ['ein', 'Brot'], 'extra' => ['Käse', 'und']],
                            'ja' => ['sentence' => 'パン', 'correct' => ['パン'], 'extra' => ['チーズ', 'と']],
                            'ko' => ['sentence' => '빵', 'correct' => ['빵'], 'extra' => ['치즈', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ekmek', 've', 'peynir'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Bread and cheese', 'correct' => ['bread', 'and', 'cheese'], 'extra' => ['thank you']],
                            'fr' => ['sentence' => 'Pain et fromage', 'correct' => ['pain', 'et', 'fromage'], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Pan y queso', 'correct' => ['pan', 'y', 'queso'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Brot und Käse', 'correct' => ['Brot', 'und', 'Käse'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'パンとチーズ', 'correct' => ['パン', 'と', 'チーズ'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '빵과 치즈', 'correct' => ['빵과', '치즈'], 'extra' => ['감사합니다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'ekmek', 've', 'bir', 'peynir', 'teşekkürler'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A bread and a cheese thank you', 'correct' => ['a', 'bread', 'and', 'a', 'cheese', 'thank you'], 'extra' => ['coffee']],
                            'fr' => ['sentence' => 'Un pain et un fromage merci', 'correct' => ['un', 'pain', 'et', 'un', 'fromage', 'merci'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Un pan y un queso gracias', 'correct' => ['un', 'pan', 'y', 'un', 'queso', 'gracias'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ein Brot und ein Käse danke', 'correct' => ['ein', 'Brot', 'und', 'ein', 'Käse', 'danke'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'パンとチーズ、ありがとう', 'correct' => ['パン', 'と', 'チーズ', 'ありがとう'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '빵과 치즈 감사합니다', 'correct' => ['빵과', '치즈', '감사합니다'], 'extra' => ['커피']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Sugar & Cake', 4,
                pictures: [['tr' => 'Şeker', 'img' => 'sugar'], ['tr' => 'Pasta', 'img' => 'cake']],
                plain: [['tr' => 'Bir'], ['tr' => 'Lütfen']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'pasta'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A cake', 'correct' => ['a', 'cake'], 'extra' => ['sugar', 'please']],
                            'fr' => ['sentence' => 'Un gâteau', 'correct' => ['un', 'gâteau'], 'extra' => ['sucre', "s'il vous plaît"]],
                            'es' => ['sentence' => 'Un pastel', 'correct' => ['un', 'pastel'], 'extra' => ['azúcar', 'por favor']],
                            'de' => ['sentence' => 'Einen Kuchen', 'correct' => ['einen', 'Kuchen'], 'extra' => ['Zucker', 'bitte']],
                            'ja' => ['sentence' => 'ケーキ', 'correct' => ['ケーキ'], 'extra' => ['砂糖', 'お願いします']],
                            'ko' => ['sentence' => '케이크', 'correct' => ['케이크'], 'extra' => ['설탕', '부탁합니다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'şeker', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A sugar please', 'correct' => ['a', 'sugar', 'please'], 'extra' => ['cake']],
                            'fr' => ['sentence' => "Un sucre s'il vous plaît", 'correct' => ['un', 'sucre', "s'il vous plaît"], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Un azúcar por favor', 'correct' => ['un', 'azúcar', 'por favor'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Einen Zucker bitte', 'correct' => ['einen', 'Zucker', 'bitte'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => '砂糖をお願いします', 'correct' => ['砂糖', 'を', 'お願いします'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '설탕 부탁합니다', 'correct' => ['설탕', '부탁합니다'], 'extra' => ['케이크']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kahve', 've', 'bir', 'pasta', 'lütfen'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A coffee and a cake please', 'correct' => ['a', 'coffee', 'and', 'a', 'cake', 'please'], 'extra' => ['sugar']],
                            'fr' => ['sentence' => "Un café et un gâteau s'il vous plaît", 'correct' => ['un', 'café', 'et', 'un', 'gâteau', "s'il vous plaît"], 'extra' => ['sucre']],
                            'es' => ['sentence' => 'Un café y un pastel por favor', 'correct' => ['un', 'café', 'y', 'un', 'pastel', 'por favor'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Kuchen bitte', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Kuchen', 'bitte'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => 'コーヒーとケーキをお願いします', 'correct' => ['コーヒー', 'と', 'ケーキ', 'を', 'お願いします'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '커피와 케이크 부탁합니다', 'correct' => ['커피와', '케이크', '부탁합니다'], 'extra' => ['설탕']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ordering', 5,
                pictures: [['tr' => 'Kahve', 'img' => 'coffee'], ['tr' => 'Pasta', 'img' => 'cake']],
                plain: [['tr' => 'İstiyorum'], ['tr' => 'Hesap']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kahve', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like a coffee', 'correct' => ['I would like', 'a', 'coffee'], 'extra' => ['cake']],
                            'fr' => ['sentence' => 'Je voudrais un café', 'correct' => ['je voudrais', 'un', 'café'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Quisiera un café', 'correct' => ['quisiera', 'un', 'café'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ich möchte einen Kaffee', 'correct' => ['ich möchte', 'einen', 'Kaffee'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'コーヒーをください', 'correct' => ['コーヒー', 'を', 'ください'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '커피를 주세요', 'correct' => ['커피를', '주세요'], 'extra' => ['케이크']],
                        ],
                    ],
                    'b' => [
                        'words' => ['hesap', 'lütfen'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The bill please', 'correct' => ['the bill', 'please'], 'extra' => ['coffee']],
                            'fr' => ['sentence' => "L'addition s'il vous plaît", 'correct' => ["l'addition", "s'il vous plaît"], 'extra' => ['café']],
                            'es' => ['sentence' => 'La cuenta por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Die Rechnung bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['커피']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'pasta', 'istiyorum', 've', 'hesap'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I would like a cake and the bill', 'correct' => ['I would like', 'a', 'cake', 'and', 'the bill'], 'extra' => ['tea']],
                            'fr' => ['sentence' => "Je voudrais un gâteau et l'addition", 'correct' => ['je voudrais', 'un', 'gâteau', 'et', "l'addition"], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Quisiera un pastel y la cuenta', 'correct' => ['quisiera', 'un', 'pastel', 'y', 'la cuenta'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte einen Kuchen und die Rechnung', 'correct' => ['ich möchte', 'einen', 'Kuchen', 'und', 'die Rechnung'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'ケーキとお会計をお願いします', 'correct' => ['ケーキ', 'と', 'お会計', 'を', 'お願いします'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '케이크와 계산서를 주세요', 'correct' => ['케이크와', '계산서를', '주세요'], 'extra' => ['차']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
