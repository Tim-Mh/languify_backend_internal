<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner01Seeder extends Seeder
{
    private const PICTURES = [
        '커피' => 'coffee', '차' => 'tea', '우유' => 'milk', '설탕' => 'sugar',
        '빵' => 'bread', '물' => 'water',
    ];

    /**
     * Korean Chapter 1 (Beginner), Unit 1, the Korean twin of the English
     * "Unit 1: At the Café" unit. Same 5-lesson shape and vocabulary, authored
     * in Korean with hints in English, Spanish, German, French and Japanese.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, '유닛 1: 카페에서', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 커피와 차', 1,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '차', 'img' => 'tea']],
                plain: [['ko' => '부탁합니다'], ['ko' => '감사합니다']],
                phrases: [
                    'a' => [
                        'words' => ['커피', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee please', 'correct' => ['a', 'coffee', 'please'], 'extra' => ['tea']],
                            'es' => ['sentence' => 'Un café, por favor', 'correct' => ['un', 'café', 'por favor'], 'extra' => ['té', 'gracias']],
                            'de' => ['sentence' => 'Einen Kaffee, bitte', 'correct' => ['einen', 'Kaffee', 'bitte'], 'extra' => ['Tee', 'danke']],
                            'fr' => ['sentence' => "Un café, s'il vous plaît", 'correct' => ['un', 'café', "s'il vous plaît"], 'extra' => ['thé', 'merci']],
                            'ja' => ['sentence' => 'コーヒーをお願いします', 'correct' => ['コーヒー', 'を', 'お願いします'], 'extra' => ['お茶']],
                        ],
                    ],
                    'b' => [
                        'words' => ['차', '감사합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a tea thank you', 'correct' => ['a', 'tea', 'thank you'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'Un té, gracias', 'correct' => ['un', 'té', 'gracias'], 'extra' => ['café', 'por favor']],
                            'de' => ['sentence' => 'Einen Tee, danke', 'correct' => ['einen', 'Tee', 'danke'], 'extra' => ['Kaffee', 'bitte']],
                            'fr' => ['sentence' => 'Un thé, merci', 'correct' => ['un', 'thé', 'merci'], 'extra' => ['café', "s'il vous plaît"]],
                            'ja' => ['sentence' => 'お茶をありがとう', 'correct' => ['お茶', 'を', 'ありがとう'], 'extra' => ['コーヒー']],
                        ],
                    ],
                    'c' => [
                        'words' => ['커피와', '차'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee and a tea', 'correct' => ['a', 'coffee', 'and', 'a', 'tea'], 'extra' => ['thank you']],
                            'es' => ['sentence' => 'Un café y un té', 'correct' => ['un', 'café', 'y', 'un', 'té'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Tee'], 'extra' => ['danke']],
                            'fr' => ['sentence' => 'Un café et un thé', 'correct' => ['un', 'café', 'et', 'un', 'thé'], 'extra' => ['merci']],
                            'ja' => ['sentence' => 'コーヒーとお茶', 'correct' => ['コーヒー', 'と', 'お茶'], 'extra' => ['ありがとう']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 빵과 물', 2,
                pictures: [['ko' => '빵', 'img' => 'bread'], ['ko' => '물', 'img' => 'water']],
                plain: [['ko' => '안녕하세요'], ['ko' => '그리고']],
                phrases: [
                    'a' => [
                        'words' => ['안녕하세요', '물', '부탁합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'hello a water please', 'correct' => ['hello', 'a', 'water', 'please'], 'extra' => ['bread']],
                            'es' => ['sentence' => 'Hola, un agua por favor', 'correct' => ['hola', 'un', 'agua', 'por favor'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Hallo, ein Wasser bitte', 'correct' => ['hallo', 'ein', 'Wasser', 'bitte'], 'extra' => ['Brot']],
                            'fr' => ['sentence' => "Bonjour, une eau s'il vous plaît", 'correct' => ['bonjour', 'une', 'eau', "s'il vous plaît"], 'extra' => ['pain']],
                            'ja' => ['sentence' => 'こんにちは、水をお願いします', 'correct' => ['こんにちは', '水', 'を', 'お願いします'], 'extra' => ['パン']],
                        ],
                    ],
                    'b' => [
                        'words' => ['빵과', '물'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'bread and water', 'correct' => ['bread', 'and', 'water'], 'extra' => ['hello', 'thank you']],
                            'es' => ['sentence' => 'Pan y agua', 'correct' => ['pan', 'y', 'agua'], 'extra' => ['hola', 'gracias']],
                            'de' => ['sentence' => 'Brot und Wasser', 'correct' => ['Brot', 'und', 'Wasser'], 'extra' => ['hallo', 'danke']],
                            'fr' => ['sentence' => "Du pain et de l'eau", 'correct' => ['pain', 'et', 'eau'], 'extra' => ['bonjour', 'merci']],
                            'ja' => ['sentence' => 'パンと水', 'correct' => ['パン', 'と', '水'], 'extra' => ['こんにちは']],
                        ],
                    ],
                    'c' => [
                        'words' => ['안녕하세요', '빵과', '커피'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'hello bread and a coffee', 'correct' => ['hello', 'bread', 'and', 'a', 'coffee'], 'extra' => ['water']],
                            'es' => ['sentence' => 'Hola, pan y un café', 'correct' => ['hola', 'pan', 'y', 'un', 'café'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Hallo, Brot und einen Kaffee', 'correct' => ['hallo', 'Brot', 'und', 'einen', 'Kaffee'], 'extra' => ['Wasser']],
                            'fr' => ['sentence' => 'Bonjour, du pain et un café', 'correct' => ['bonjour', 'pain', 'et', 'un', 'café'], 'extra' => ['eau']],
                            'ja' => ['sentence' => 'こんにちは、パンとコーヒー', 'correct' => ['こんにちは', 'パン', 'と', 'コーヒー'], 'extra' => ['水']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 우유와 설탕', 3,
                pictures: [['ko' => '우유', 'img' => 'milk'], ['ko' => '설탕', 'img' => 'sugar']],
                plain: [['ko' => '와 함께'], ['ko' => '주세요']],
                phrases: [
                    'a' => [
                        'words' => ['우유를', '넣은', '커피'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee with milk', 'correct' => ['a', 'coffee', 'with', 'milk'], 'extra' => ['sugar']],
                            'es' => ['sentence' => 'Un café con leche', 'correct' => ['un', 'café', 'con', 'leche'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Einen Kaffee mit Milch', 'correct' => ['einen', 'Kaffee', 'mit', 'Milch'], 'extra' => ['Zucker']],
                            'fr' => ['sentence' => 'Un café avec du lait', 'correct' => ['un', 'café', 'avec', 'lait'], 'extra' => ['sucre']],
                            'ja' => ['sentence' => '牛乳を入れたコーヒー', 'correct' => ['牛乳', 'を', '入れた', 'コーヒー'], 'extra' => ['砂糖']],
                        ],
                    ],
                    'b' => [
                        'words' => ['설탕을', '주세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like sugar', 'correct' => ['I would like', 'sugar'], 'extra' => ['milk', 'with']],
                            'es' => ['sentence' => 'Quisiera azúcar', 'correct' => ['quisiera', 'azúcar'], 'extra' => ['leche', 'con']],
                            'de' => ['sentence' => 'Ich möchte Zucker', 'correct' => ['ich möchte', 'Zucker'], 'extra' => ['Milch', 'mit']],
                            'fr' => ['sentence' => 'Je voudrais du sucre', 'correct' => ['je voudrais', 'sucre'], 'extra' => ['lait', 'avec']],
                            'ja' => ['sentence' => '砂糖をください', 'correct' => ['砂糖', 'を', 'ください'], 'extra' => ['牛乳']],
                        ],
                    ],
                    'c' => [
                        'words' => ['우유를', '넣은', '차를', '주세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I would like a tea with milk', 'correct' => ['I would like', 'a', 'tea', 'with', 'milk'], 'extra' => ['sugar']],
                            'es' => ['sentence' => 'Quisiera un té con leche', 'correct' => ['quisiera', 'un', 'té', 'con', 'leche'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Ich möchte einen Tee mit Milch', 'correct' => ['ich möchte', 'einen', 'Tee', 'mit', 'Milch'], 'extra' => ['Zucker']],
                            'fr' => ['sentence' => 'Je voudrais un thé avec du lait', 'correct' => ['je voudrais', 'un', 'thé', 'avec', 'lait'], 'extra' => ['sucre']],
                            'ja' => ['sentence' => '牛乳を入れたお茶をください', 'correct' => ['牛乳', 'を', '入れた', 'お茶', 'を', 'ください'], 'extra' => ['砂糖']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 네, 아니요', 4,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '우유', 'img' => 'milk']],
                plain: [['ko' => '네'], ['ko' => '아니요']],
                phrases: [
                    'a' => [
                        'words' => ['네', '커피', '부탁합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'yes a coffee please', 'correct' => ['yes', 'a', 'coffee', 'please'], 'extra' => ['no']],
                            'es' => ['sentence' => 'Sí, un café por favor', 'correct' => ['sí', 'un', 'café', 'por favor'], 'extra' => ['no']],
                            'de' => ['sentence' => 'Ja, einen Kaffee bitte', 'correct' => ['ja', 'einen', 'Kaffee', 'bitte'], 'extra' => ['nein']],
                            'fr' => ['sentence' => "Oui, un café s'il vous plaît", 'correct' => ['oui', 'un', 'café', "s'il vous plaît"], 'extra' => ['non']],
                            'ja' => ['sentence' => 'はい、コーヒーをお願いします', 'correct' => ['はい', 'コーヒー', 'を', 'お願いします'], 'extra' => ['いいえ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['우유는', '아니요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'no milk', 'correct' => ['no', 'milk'], 'extra' => ['yes', 'coffee']],
                            'es' => ['sentence' => 'Sin leche', 'correct' => ['no', 'leche'], 'extra' => ['sí', 'café']],
                            'de' => ['sentence' => 'Keine Milch', 'correct' => ['nein', 'Milch'], 'extra' => ['ja', 'Kaffee']],
                            'fr' => ['sentence' => 'Pas de lait', 'correct' => ['non', 'lait'], 'extra' => ['oui', 'café']],
                            'ja' => ['sentence' => '牛乳はいりません', 'correct' => ['牛乳', 'は', 'いりません'], 'extra' => ['はい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['네', '우유를', '넣은', '커피'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'yes a coffee with milk', 'correct' => ['yes', 'a', 'coffee', 'with', 'milk'], 'extra' => ['no']],
                            'es' => ['sentence' => 'Sí, un café con leche', 'correct' => ['sí', 'un', 'café', 'con', 'leche'], 'extra' => ['no']],
                            'de' => ['sentence' => 'Ja, einen Kaffee mit Milch', 'correct' => ['ja', 'einen', 'Kaffee', 'mit', 'Milch'], 'extra' => ['nein']],
                            'fr' => ['sentence' => 'Oui, un café avec du lait', 'correct' => ['oui', 'un', 'café', 'avec', 'lait'], 'extra' => ['non']],
                            'ja' => ['sentence' => 'はい、牛乳を入れたコーヒー', 'correct' => ['はい', '牛乳', 'を', '入れた', 'コーヒー'], 'extra' => ['いいえ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 주문하기', 5,
                pictures: [['ko' => '차', 'img' => 'tea'], ['ko' => '설탕', 'img' => 'sugar']],
                plain: [['ko' => '주세요'], ['ko' => '계산서']],
                phrases: [
                    'a' => [
                        'words' => ['차를', '주세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like a tea', 'correct' => ['I would like', 'a', 'tea'], 'extra' => ['coffee', 'sugar']],
                            'es' => ['sentence' => 'Quisiera un té', 'correct' => ['quisiera', 'un', 'té'], 'extra' => ['café', 'azúcar']],
                            'de' => ['sentence' => 'Ich möchte einen Tee', 'correct' => ['ich möchte', 'einen', 'Tee'], 'extra' => ['Kaffee', 'Zucker']],
                            'fr' => ['sentence' => 'Je voudrais un thé', 'correct' => ['je voudrais', 'un', 'thé'], 'extra' => ['café', 'sucre']],
                            'ja' => ['sentence' => 'お茶をください', 'correct' => ['お茶', 'を', 'ください'], 'extra' => ['コーヒー']],
                        ],
                    ],
                    'b' => [
                        'words' => ['계산서', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the bill please', 'correct' => ['the bill', 'please'], 'extra' => ['thank you', 'sugar']],
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['gracias', 'azúcar']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['danke', 'Zucker']],
                            'fr' => ['sentence' => "L'addition, s'il vous plaît", 'correct' => ["l'addition", "s'il vous plaît"], 'extra' => ['merci', 'sucre']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['砂糖']],
                        ],
                    ],
                    'c' => [
                        'words' => ['설탕을', '넣은', '차를', '주세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I would like a tea with sugar', 'correct' => ['I would like', 'a', 'tea', 'with', 'sugar'], 'extra' => ['the bill']],
                            'es' => ['sentence' => 'Quisiera un té con azúcar', 'correct' => ['quisiera', 'un', 'té', 'con', 'azúcar'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Ich möchte einen Tee mit Zucker', 'correct' => ['ich möchte', 'einen', 'Tee', 'mit', 'Zucker'], 'extra' => ['die Rechnung']],
                            'fr' => ['sentence' => 'Je voudrais un thé avec du sucre', 'correct' => ['je voudrais', 'un', 'thé', 'avec', 'sucre'], 'extra' => ["l'addition"]],
                            'ja' => ['sentence' => '砂糖を入れたお茶をください', 'correct' => ['砂糖', 'を', '入れた', 'お茶', 'を', 'ください'], 'extra' => ['お会計']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
