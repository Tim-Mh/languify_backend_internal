<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Café' => 'coffee', 'Thé' => 'tea', 'Eau' => 'water', 'Lait' => 'milk',
        'Pain' => 'bread', 'Croissant' => 'croissant', 'Éclair' => 'eclair', 'Sucre' => 'sugar',
    ];

    /**
     * French Beginner Unit 1 — ordering at a café.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     * Words drilled only in isolation don't stick, so nothing is taught that
     * the learner never gets to use.
     *
     * Three phrases per lesson also mean the five sessions never repeat the
     * same set — see FrenchLessonBuilder::SESSION_PLAN.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: At the Café', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Coffee & Tea', 1,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Thé', 'img' => 'tea']],
                plain: [['fr' => 'Un'], ['fr' => 'Et']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'café'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee', 'correct' => ['a', 'coffee'], 'extra' => ['tea', 'and']],
                            'es' => ['sentence' => 'Un café', 'correct' => ['un', 'café'], 'extra' => ['té', 'y']],
                            'de' => ['sentence' => 'Einen Kaffee', 'correct' => ['einen', 'Kaffee'], 'extra' => ['Tee', 'und']],
                            'ja' => ['sentence' => 'コーヒー', 'correct' => ['コーヒー'], 'extra' => ['お茶', 'と']],
                            'ko' => ['sentence' => '커피', 'correct' => ['커피'], 'extra' => ['차', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'thé'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A tea', 'correct' => ['a', 'tea'], 'extra' => ['coffee', 'and']],
                            'es' => ['sentence' => 'Un té', 'correct' => ['un', 'té'], 'extra' => ['café', 'y']],
                            'de' => ['sentence' => 'Einen Tee', 'correct' => ['einen', 'Tee'], 'extra' => ['Kaffee', 'und']],
                            'ja' => ['sentence' => 'お茶', 'correct' => ['お茶'], 'extra' => ['コーヒー', 'と']],
                            'ko' => ['sentence' => '차', 'correct' => ['차'], 'extra' => ['커피', '그리고']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'café', 'et', 'un', 'thé'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee and a tea', 'correct' => ['a', 'coffee', 'and', 'a', 'tea'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'Un café y un té', 'correct' => ['un', 'café', 'y', 'un', 'té'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Tee'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'コーヒーとお茶', 'correct' => ['コーヒー', 'と', 'お茶'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '커피와 차', 'correct' => ['커피와', '차'], 'extra' => ['우유']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Bread & Please', 2,
                pictures: [['fr' => 'Croissant', 'img' => 'croissant'], ['fr' => 'Pain', 'img' => 'bread']],
                plain: [['fr' => 'Bonjour'], ['fr' => "S'il vous plaît"]],
                phrases: [
                    'a' => [
                        'words' => ['un', 'croissant'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A croissant', 'correct' => ['a', 'croissant'], 'extra' => ['bread', 'hello']],
                            'es' => ['sentence' => 'Un cruasán', 'correct' => ['un', 'cruasán'], 'extra' => ['pan', 'hola']],
                            'de' => ['sentence' => 'Ein Croissant', 'correct' => ['ein', 'Croissant'], 'extra' => ['Brot', 'hallo']],
                            'ja' => ['sentence' => 'クロワッサン', 'correct' => ['クロワッサン'], 'extra' => ['パン', 'こんにちは']],
                            'ko' => ['sentence' => '크루아상', 'correct' => ['크루아상'], 'extra' => ['빵', '안녕하세요']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bonjour', 'un', 'pain'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Hello, a bread', 'correct' => ['hello', 'a', 'bread'], 'extra' => ['croissant']],
                            'es' => ['sentence' => 'Hola, un pan', 'correct' => ['hola', 'un', 'pan'], 'extra' => ['cruasán']],
                            'de' => ['sentence' => 'Hallo, ein Brot', 'correct' => ['hallo', 'ein', 'Brot'], 'extra' => ['Croissant']],
                            'ja' => ['sentence' => 'こんにちは、パン', 'correct' => ['こんにちは', 'パン'], 'extra' => ['クロワッサン']],
                            'ko' => ['sentence' => '안녕하세요, 빵', 'correct' => ['안녕하세요', '빵'], 'extra' => ['크루아상']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'croissant', "s'il vous plaît"], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A croissant, please', 'correct' => ['a', 'croissant', 'please'], 'extra' => ['bread']],
                            'es' => ['sentence' => 'Un cruasán, por favor', 'correct' => ['un', 'cruasán', 'por favor'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ein Croissant, bitte', 'correct' => ['ein', 'Croissant', 'bitte'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'クロワッサンをお願いします', 'correct' => ['クロワッサン', 'を', 'お願いします'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '크루아상 부탁합니다', 'correct' => ['크루아상', '부탁합니다'], 'extra' => ['빵']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Milk & Sugar', 3,
                pictures: [['fr' => 'Lait', 'img' => 'milk'], ['fr' => 'Sucre', 'img' => 'sugar']],
                plain: [['fr' => 'Merci'], ['fr' => 'Avec']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'lait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A milk', 'correct' => ['a', 'milk'], 'extra' => ['sugar', 'thank you']],
                            'es' => ['sentence' => 'Una leche', 'correct' => ['una', 'leche'], 'extra' => ['azúcar', 'gracias']],
                            'de' => ['sentence' => 'Eine Milch', 'correct' => ['eine', 'Milch'], 'extra' => ['Zucker', 'danke']],
                            'ja' => ['sentence' => '牛乳', 'correct' => ['牛乳'], 'extra' => ['砂糖', 'ありがとう']],
                            'ko' => ['sentence' => '우유', 'correct' => ['우유'], 'extra' => ['설탕', '감사합니다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'café', 'avec', 'un', 'sucre'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee with a sugar', 'correct' => ['a', 'coffee', 'with', 'a', 'sugar'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'Un café con un azúcar', 'correct' => ['un', 'café', 'con', 'un', 'azúcar'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee mit einem Zucker', 'correct' => ['einen', 'Kaffee', 'mit', 'einem', 'Zucker'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '砂糖入りのコーヒー', 'correct' => ['砂糖', '入り', 'の', 'コーヒー'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '설탕을 넣은 커피', 'correct' => ['설탕을', '넣은', '커피'], 'extra' => ['우유']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'lait', 'avec', 'un', 'sucre', 'merci'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A milk with a sugar, thank you', 'correct' => ['a', 'milk', 'with', 'a', 'sugar', 'thank you'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'Una leche con un azúcar, gracias', 'correct' => ['una', 'leche', 'con', 'un', 'azúcar', 'gracias'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Eine Milch mit einem Zucker, danke', 'correct' => ['eine', 'Milch', 'mit', 'einem', 'Zucker', 'danke'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '砂糖入りの牛乳、ありがとう', 'correct' => ['砂糖', '入り', 'の', '牛乳', 'ありがとう'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '설탕을 넣은 우유, 감사합니다', 'correct' => ['설탕을', '넣은', '우유', '감사합니다'], 'extra' => ['커피']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Madam & Sir', 4,
                pictures: [['fr' => 'Éclair', 'img' => 'eclair'], ['fr' => 'Eau', 'img' => 'water']],
                plain: [['fr' => 'Madame'], ['fr' => 'Monsieur']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'éclair'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'An eclair', 'correct' => ['an', 'eclair'], 'extra' => ['water', 'madam']],
                            'es' => ['sentence' => 'Un éclair', 'correct' => ['un', 'éclair'], 'extra' => ['agua', 'señora']],
                            'de' => ['sentence' => 'Ein Éclair', 'correct' => ['ein', 'Éclair'], 'extra' => ['Wasser', 'gnädige Frau']],
                            'ja' => ['sentence' => 'エクレア', 'correct' => ['エクレア'], 'extra' => ['水', 'マダム']],
                            'ko' => ['sentence' => '에클레어', 'correct' => ['에클레어'], 'extra' => ['물', '부인']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bonjour', 'madame'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Hello madam', 'correct' => ['hello', 'madam'], 'extra' => ['sir', 'eclair']],
                            'es' => ['sentence' => 'Hola señora', 'correct' => ['hola', 'señora'], 'extra' => ['señor', 'éclair']],
                            'de' => ['sentence' => 'Hallo gnädige Frau', 'correct' => ['hallo', 'gnädige Frau'], 'extra' => ['mein Herr', 'Éclair']],
                            'ja' => ['sentence' => 'こんにちはマダム', 'correct' => ['こんにちは', 'マダム'], 'extra' => ['ムッシュ', 'エクレア']],
                            'ko' => ['sentence' => '안녕하세요 부인', 'correct' => ['안녕하세요', '부인'], 'extra' => ['선생님', '에클레어']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'éclair', 'et', 'une', 'eau', 'monsieur'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'An eclair and a water, sir', 'correct' => ['an', 'eclair', 'and', 'a', 'water', 'sir'], 'extra' => ['madam']],
                            'es' => ['sentence' => 'Un éclair y un agua, señor', 'correct' => ['un', 'éclair', 'y', 'un', 'agua', 'señor'], 'extra' => ['señora']],
                            'de' => ['sentence' => 'Ein Éclair und ein Wasser, mein Herr', 'correct' => ['ein', 'Éclair', 'und', 'ein', 'Wasser', 'mein Herr'], 'extra' => ['gnädige Frau']],
                            'ja' => ['sentence' => 'エクレアと水、ムッシュ', 'correct' => ['エクレア', 'と', '水', 'ムッシュ'], 'extra' => ['マダム']],
                            'ko' => ['sentence' => '에클레어와 물, 선생님', 'correct' => ['에클레어와', '물', '선생님'], 'extra' => ['부인']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Ordering', 5,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Croissant', 'img' => 'croissant']],
                plain: [['fr' => 'Je voudrais'], ['fr' => "L'addition"]],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I would like a coffee', 'correct' => ['I', 'would', 'like', 'a', 'coffee'], 'extra' => ['tea']],
                            'es' => ['sentence' => 'Quisiera un café', 'correct' => ['quisiera', 'un', 'café'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte einen Kaffee', 'correct' => ['ich', 'möchte', 'einen', 'Kaffee'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'コーヒーをください', 'correct' => ['コーヒー', 'を', 'ください'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피를 주세요', 'correct' => ['커피를', '주세요'], 'extra' => ['차']],
                        ],
                    ],
                    'b' => [
                        'words' => ["l'addition", "s'il vous plaît"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The bill, please', 'correct' => ['the', 'bill', 'please'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la', 'cuenta', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die', 'Rechnung', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['커피']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je voudrais', 'un', 'croissant', 'et', 'un', 'thé'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like a croissant and a tea', 'correct' => ['I', 'would', 'like', 'a', 'croissant', 'and', 'a', 'tea'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'Quisiera un cruasán y un té', 'correct' => ['quisiera', 'un', 'cruasán', 'y', 'un', 'té'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ich möchte ein Croissant und einen Tee', 'correct' => ['ich', 'möchte', 'ein', 'Croissant', 'und', 'einen', 'Tee'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'クロワッサンとお茶をください', 'correct' => ['クロワッサン', 'と', 'お茶', 'を', 'ください'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '크루아상과 차를 주세요', 'correct' => ['크루아상과', '차를', '주세요'], 'extra' => ['커피']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
