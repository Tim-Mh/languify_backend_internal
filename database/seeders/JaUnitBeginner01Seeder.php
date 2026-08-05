<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner01Seeder extends Seeder
{
    private const PICTURES = [
        'コーヒー' => 'coffee',
        'お茶' => 'tea',
        '牛乳' => 'milk',
        '砂糖' => 'sugar',
        'パン' => 'bread',
        '水' => 'water',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 1, the Japanese twin of the
     * English "Unit 1: At the Café" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'ユニット1: カフェで', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: コーヒー・お茶', 1,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => 'お茶',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'お願いします',
                    ],
                    [
                        'ja' => 'ありがとう',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'コーヒー',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee please',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'please',
                                ],
                                'extra' => [
                                    'tea',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un café, por favor',
                                'correct' => [
                                    'un',
                                    'café',
                                    'por favor',
                                ],
                                'extra' => [
                                    'té',
                                    'gracias',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Kaffee, bitte',
                                'correct' => [
                                    'einen',
                                    'Kaffee',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Tee',
                                    'danke',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café, s\'il vous plaît',
                                'correct' => [
                                    'un',
                                    'café',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'thé',
                                    'merci',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피 부탁합니다',
                                'correct' => [
                                    '커피',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '차',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'お茶',
                            'を',
                            'ありがとう',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a tea thank you',
                                'correct' => [
                                    'a',
                                    'tea',
                                    'thank you',
                                ],
                                'extra' => [
                                    'coffee',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un té, gracias',
                                'correct' => [
                                    'un',
                                    'té',
                                    'gracias',
                                ],
                                'extra' => [
                                    'café',
                                    'por favor',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Tee, danke',
                                'correct' => [
                                    'einen',
                                    'Tee',
                                    'danke',
                                ],
                                'extra' => [
                                    'Kaffee',
                                    'bitte',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un thé, merci',
                                'correct' => [
                                    'un',
                                    'thé',
                                    'merci',
                                ],
                                'extra' => [
                                    'café',
                                    's\'il vous plaît',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '차 감사합니다',
                                'correct' => [
                                    '차',
                                    '감사합니다',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'コーヒー',
                            'と',
                            'お茶',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee and a tea',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'and',
                                    'a',
                                    'tea',
                                ],
                                'extra' => [
                                    'thank you',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un café y un té',
                                'correct' => [
                                    'un',
                                    'café',
                                    'y',
                                    'un',
                                    'té',
                                ],
                                'extra' => [
                                    'gracias',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Kaffee und einen Tee',
                                'correct' => [
                                    'einen',
                                    'Kaffee',
                                    'und',
                                    'einen',
                                    'Tee',
                                ],
                                'extra' => [
                                    'danke',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café et un thé',
                                'correct' => [
                                    'un',
                                    'café',
                                    'et',
                                    'un',
                                    'thé',
                                ],
                                'extra' => [
                                    'merci',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피와 차',
                                'correct' => [
                                    '커피와',
                                    '차',
                                ],
                                'extra' => [
                                    '감사합니다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: パン・水', 2,
                pictures: [
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                    [
                        'ja' => '水',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'こんにちは',
                    ],
                    [
                        'ja' => 'と',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'こんにちは',
                            '水',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'hello a water please',
                                'correct' => [
                                    'hello',
                                    'a',
                                    'water',
                                    'please',
                                ],
                                'extra' => [
                                    'bread',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Hola, un agua por favor',
                                'correct' => [
                                    'hola',
                                    'un',
                                    'agua',
                                    'por favor',
                                ],
                                'extra' => [
                                    'pan',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hallo, ein Wasser bitte',
                                'correct' => [
                                    'hallo',
                                    'ein',
                                    'Wasser',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Bonjour, une eau s\'il vous plaît',
                                'correct' => [
                                    'bonjour',
                                    'une',
                                    'eau',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'pain',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '안녕하세요, 물 부탁합니다',
                                'correct' => [
                                    '안녕하세요',
                                    '물',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '빵',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'パン',
                            'と',
                            '水',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'bread and water',
                                'correct' => [
                                    'bread',
                                    'and',
                                    'water',
                                ],
                                'extra' => [
                                    'hello',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pan y agua',
                                'correct' => [
                                    'pan',
                                    'y',
                                    'agua',
                                ],
                                'extra' => [
                                    'hola',
                                    'gracias',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Brot und Wasser',
                                'correct' => [
                                    'Brot',
                                    'und',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'hallo',
                                    'danke',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain et de l\'eau',
                                'correct' => [
                                    'pain',
                                    'et',
                                    'eau',
                                ],
                                'extra' => [
                                    'bonjour',
                                    'merci',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵과 물',
                                'correct' => [
                                    '빵과',
                                    '물',
                                ],
                                'extra' => [
                                    '안녕하세요',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'こんにちは',
                            'パン',
                            'と',
                            'コーヒー',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'hello bread and a coffee',
                                'correct' => [
                                    'hello',
                                    'bread',
                                    'and',
                                    'a',
                                    'coffee',
                                ],
                                'extra' => [
                                    'water',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Hola, pan y un café',
                                'correct' => [
                                    'hola',
                                    'pan',
                                    'y',
                                    'un',
                                    'café',
                                ],
                                'extra' => [
                                    'agua',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hallo, Brot und einen Kaffee',
                                'correct' => [
                                    'hallo',
                                    'Brot',
                                    'und',
                                    'einen',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'Wasser',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Bonjour, du pain et un café',
                                'correct' => [
                                    'bonjour',
                                    'pain',
                                    'et',
                                    'un',
                                    'café',
                                ],
                                'extra' => [
                                    'eau',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '안녕하세요, 빵과 커피',
                                'correct' => [
                                    '안녕하세요',
                                    '빵과',
                                    '커피',
                                ],
                                'extra' => [
                                    '물',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 牛乳・砂糖', 3,
                pictures: [
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                    [
                        'ja' => '砂糖',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'と一緒に',
                    ],
                    [
                        'ja' => 'ください',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '牛乳',
                            'を',
                            '入れた',
                            'コーヒー',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee with milk',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'with',
                                    'milk',
                                ],
                                'extra' => [
                                    'sugar',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un café con leche',
                                'correct' => [
                                    'un',
                                    'café',
                                    'con',
                                    'leche',
                                ],
                                'extra' => [
                                    'azúcar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Kaffee mit Milch',
                                'correct' => [
                                    'einen',
                                    'Kaffee',
                                    'mit',
                                    'Milch',
                                ],
                                'extra' => [
                                    'Zucker',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café avec du lait',
                                'correct' => [
                                    'un',
                                    'café',
                                    'avec',
                                    'lait',
                                ],
                                'extra' => [
                                    'sucre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유를 넣은 커피',
                                'correct' => [
                                    '우유를',
                                    '넣은',
                                    '커피',
                                ],
                                'extra' => [
                                    '설탕',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '砂糖',
                            'を',
                            'ください',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like sugar',
                                'correct' => [
                                    'I would like',
                                    'sugar',
                                ],
                                'extra' => [
                                    'milk',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera azúcar',
                                'correct' => [
                                    'quisiera',
                                    'azúcar',
                                ],
                                'extra' => [
                                    'leche',
                                    'con',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte Zucker',
                                'correct' => [
                                    'ich möchte',
                                    'Zucker',
                                ],
                                'extra' => [
                                    'Milch',
                                    'mit',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais du sucre',
                                'correct' => [
                                    'je voudrais',
                                    'sucre',
                                ],
                                'extra' => [
                                    'lait',
                                    'avec',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '설탕을 주세요',
                                'correct' => [
                                    '설탕을',
                                    '주세요',
                                ],
                                'extra' => [
                                    '우유',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '牛乳',
                            'を',
                            '入れた',
                            'お茶',
                            'を',
                            'ください',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like a tea with milk',
                                'correct' => [
                                    'I would like',
                                    'a',
                                    'tea',
                                    'with',
                                    'milk',
                                ],
                                'extra' => [
                                    'sugar',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera un té con leche',
                                'correct' => [
                                    'quisiera',
                                    'un',
                                    'té',
                                    'con',
                                    'leche',
                                ],
                                'extra' => [
                                    'azúcar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte einen Tee mit Milch',
                                'correct' => [
                                    'ich möchte',
                                    'einen',
                                    'Tee',
                                    'mit',
                                    'Milch',
                                ],
                                'extra' => [
                                    'Zucker',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais un thé avec du lait',
                                'correct' => [
                                    'je voudrais',
                                    'un',
                                    'thé',
                                    'avec',
                                    'lait',
                                ],
                                'extra' => [
                                    'sucre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유를 넣은 차를 주세요',
                                'correct' => [
                                    '우유를',
                                    '넣은',
                                    '차를',
                                    '주세요',
                                ],
                                'extra' => [
                                    '설탕',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: コーヒー・牛乳', 4,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'はい',
                    ],
                    [
                        'ja' => 'いいえ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'はい',
                            'コーヒー',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'yes a coffee please',
                                'correct' => [
                                    'yes',
                                    'a',
                                    'coffee',
                                    'please',
                                ],
                                'extra' => [
                                    'no',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Sí, un café por favor',
                                'correct' => [
                                    'sí',
                                    'un',
                                    'café',
                                    'por favor',
                                ],
                                'extra' => [
                                    'no',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ja, einen Kaffee bitte',
                                'correct' => [
                                    'ja',
                                    'einen',
                                    'Kaffee',
                                    'bitte',
                                ],
                                'extra' => [
                                    'nein',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Oui, un café s\'il vous plaît',
                                'correct' => [
                                    'oui',
                                    'un',
                                    'café',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'non',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '네, 커피 부탁합니다',
                                'correct' => [
                                    '네',
                                    '커피',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '아니요',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '牛乳',
                            'は',
                            'いりません',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'no milk',
                                'correct' => [
                                    'no',
                                    'milk',
                                ],
                                'extra' => [
                                    'yes',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Sin leche',
                                'correct' => [
                                    'no',
                                    'leche',
                                ],
                                'extra' => [
                                    'sí',
                                    'café',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Keine Milch',
                                'correct' => [
                                    'nein',
                                    'Milch',
                                ],
                                'extra' => [
                                    'ja',
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pas de lait',
                                'correct' => [
                                    'non',
                                    'lait',
                                ],
                                'extra' => [
                                    'oui',
                                    'café',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유는 아니요',
                                'correct' => [
                                    '우유는',
                                    '아니요',
                                ],
                                'extra' => [
                                    '네',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'はい',
                            '牛乳',
                            'を',
                            '入れた',
                            'コーヒー',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'yes a coffee with milk',
                                'correct' => [
                                    'yes',
                                    'a',
                                    'coffee',
                                    'with',
                                    'milk',
                                ],
                                'extra' => [
                                    'no',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Sí, un café con leche',
                                'correct' => [
                                    'sí',
                                    'un',
                                    'café',
                                    'con',
                                    'leche',
                                ],
                                'extra' => [
                                    'no',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ja, einen Kaffee mit Milch',
                                'correct' => [
                                    'ja',
                                    'einen',
                                    'Kaffee',
                                    'mit',
                                    'Milch',
                                ],
                                'extra' => [
                                    'nein',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Oui, un café avec du lait',
                                'correct' => [
                                    'oui',
                                    'un',
                                    'café',
                                    'avec',
                                    'lait',
                                ],
                                'extra' => [
                                    'non',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '네, 우유를 넣은 커피',
                                'correct' => [
                                    '네',
                                    '우유를',
                                    '넣은',
                                    '커피',
                                ],
                                'extra' => [
                                    '아니요',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: お茶・砂糖', 5,
                pictures: [
                    [
                        'ja' => 'お茶',
                        'img' => 'tea',
                    ],
                    [
                        'ja' => '砂糖',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'ください',
                    ],
                    [
                        'ja' => 'お会計',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'お茶',
                            'を',
                            'ください',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like a tea',
                                'correct' => [
                                    'I would like',
                                    'a',
                                    'tea',
                                ],
                                'extra' => [
                                    'coffee',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera un té',
                                'correct' => [
                                    'quisiera',
                                    'un',
                                    'té',
                                ],
                                'extra' => [
                                    'café',
                                    'azúcar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte einen Tee',
                                'correct' => [
                                    'ich möchte',
                                    'einen',
                                    'Tee',
                                ],
                                'extra' => [
                                    'Kaffee',
                                    'Zucker',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais un thé',
                                'correct' => [
                                    'je voudrais',
                                    'un',
                                    'thé',
                                ],
                                'extra' => [
                                    'café',
                                    'sucre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '차를 주세요',
                                'correct' => [
                                    '차를',
                                    '주세요',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'お会計',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the bill please',
                                'correct' => [
                                    'the bill',
                                    'please',
                                ],
                                'extra' => [
                                    'sugar',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La cuenta, por favor',
                                'correct' => [
                                    'la cuenta',
                                    'por favor',
                                ],
                                'extra' => [
                                    'gracias',
                                    'azúcar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Rechnung, bitte',
                                'correct' => [
                                    'die Rechnung',
                                    'bitte',
                                ],
                                'extra' => [
                                    'danke',
                                    'Zucker',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'addition, s\'il vous plaît',
                                'correct' => [
                                    'l\'addition',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'merci',
                                    'sucre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산서 부탁합니다',
                                'correct' => [
                                    '계산서',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '설탕',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '砂糖',
                            'を',
                            '入れた',
                            'お茶',
                            'を',
                            'ください',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like a tea with sugar',
                                'correct' => [
                                    'I would like',
                                    'a',
                                    'tea',
                                    'with',
                                    'sugar',
                                ],
                                'extra' => [
                                    'the bill',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera un té con azúcar',
                                'correct' => [
                                    'quisiera',
                                    'un',
                                    'té',
                                    'con',
                                    'azúcar',
                                ],
                                'extra' => [
                                    'la cuenta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte einen Tee mit Zucker',
                                'correct' => [
                                    'ich möchte',
                                    'einen',
                                    'Tee',
                                    'mit',
                                    'Zucker',
                                ],
                                'extra' => [
                                    'die Rechnung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais un thé avec du sucre',
                                'correct' => [
                                    'je voudrais',
                                    'un',
                                    'thé',
                                    'avec',
                                    'sucre',
                                ],
                                'extra' => [
                                    'l\'addition',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '설탕을 넣은 차를 주세요',
                                'correct' => [
                                    '설탕을',
                                    '넣은',
                                    '차를',
                                    '주세요',
                                ],
                                'extra' => [
                                    '계산서',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
