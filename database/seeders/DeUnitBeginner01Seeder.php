<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner01Seeder extends Seeder
{
    private const PICTURES = [
        'Kaffee' => 'coffee',
        'Tee' => 'tea',
        'Milch' => 'milk',
        'Zucker' => 'sugar',
        'Brot' => 'bread',
        'Wasser' => 'water',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 1, the German twin of the
     * English "Unit 1: At the Café" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Einheit 1: Im Café', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Kaffee & Tee', 1,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Tee',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bitte',
                    ],
                    [
                        'de' => 'danke',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Einen',
                            'Kaffee',
                            'bitte',
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
                                    'thank you',
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
                            'ja' => [
                                'sentence' => 'コーヒーをお願いします',
                                'correct' => [
                                    'コーヒー',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    'お茶',
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
                            'Einen',
                            'Tee',
                            'danke',
                        ],
                        'blank' => 1,
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
                                    'please',
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
                            'ja' => [
                                'sentence' => 'お茶をありがとう',
                                'correct' => [
                                    'お茶',
                                    'を',
                                    'ありがとう',
                                ],
                                'extra' => [
                                    'コーヒー',
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
                            'Einen',
                            'Kaffee',
                            'und',
                            'einen',
                            'Tee',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => 'コーヒーとお茶',
                                'correct' => [
                                    'コーヒー',
                                    'と',
                                    'お茶',
                                ],
                                'extra' => [
                                    'ありがとう',
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
            $builder->lesson('Lektion 2: Brot & Wasser', 2,
                pictures: [
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                    [
                        'de' => 'Wasser',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'de' => 'hallo',
                    ],
                    [
                        'de' => 'und',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hallo',
                            'ein',
                            'Wasser',
                            'bitte',
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
                            'ja' => [
                                'sentence' => 'こんにちは、水をお願いします',
                                'correct' => [
                                    'こんにちは',
                                    '水',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    'パン',
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
                            'Brot',
                            'und',
                            'Wasser',
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
                                    'thank you',
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
                            'ja' => [
                                'sentence' => 'パンと水',
                                'correct' => [
                                    'パン',
                                    'と',
                                    '水',
                                ],
                                'extra' => [
                                    'こんにちは',
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
                            'Hallo',
                            'Brot',
                            'und',
                            'einen',
                            'Kaffee',
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
                            'ja' => [
                                'sentence' => 'こんにちは、パンとコーヒー',
                                'correct' => [
                                    'こんにちは',
                                    'パン',
                                    'と',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    '水',
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
            $builder->lesson('Lektion 3: Milch & Zucker', 3,
                pictures: [
                    [
                        'de' => 'Milch',
                        'img' => 'milk',
                    ],
                    [
                        'de' => 'Zucker',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'de' => 'mit',
                    ],
                    [
                        'de' => 'ich möchte',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Einen',
                            'Kaffee',
                            'mit',
                            'Milch',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => '牛乳を入れたコーヒー',
                                'correct' => [
                                    '牛乳',
                                    'を',
                                    '入れた',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    '砂糖',
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
                            'Ich',
                            'möchte',
                            'Zucker',
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
                                    'with',
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
                            'ja' => [
                                'sentence' => '砂糖をください',
                                'correct' => [
                                    '砂糖',
                                    'を',
                                    'ください',
                                ],
                                'extra' => [
                                    '牛乳',
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
                            'Ich',
                            'möchte',
                            'einen',
                            'Tee',
                            'mit',
                            'Milch',
                        ],
                        'blank' => 4,
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
                            'ja' => [
                                'sentence' => '牛乳を入れたお茶をください',
                                'correct' => [
                                    '牛乳',
                                    'を',
                                    '入れた',
                                    'お茶',
                                    'を',
                                    'ください',
                                ],
                                'extra' => [
                                    '砂糖',
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
            $builder->lesson('Lektion 4: Kaffee & Milch', 4,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Milch',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ja',
                    ],
                    [
                        'de' => 'nein',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ja',
                            'einen',
                            'Kaffee',
                            'bitte',
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
                            'ja' => [
                                'sentence' => 'はい、コーヒーをお願いします',
                                'correct' => [
                                    'はい',
                                    'コーヒー',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    'いいえ',
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
                            'Keine',
                            'Milch',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'no milk',
                                'correct' => [
                                    'no',
                                    'milk',
                                ],
                                'extra' => [
                                    'yes',
                                    'coffee',
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
                            'ja' => [
                                'sentence' => '牛乳はいりません',
                                'correct' => [
                                    '牛乳',
                                    'は',
                                    'いりません',
                                ],
                                'extra' => [
                                    'はい',
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
                            'Ja',
                            'einen',
                            'Kaffee',
                            'mit',
                            'Milch',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => 'はい、牛乳を入れたコーヒー',
                                'correct' => [
                                    'はい',
                                    '牛乳',
                                    'を',
                                    '入れた',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    'いいえ',
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
            $builder->lesson('Lektion 5: Tee & Zucker', 5,
                pictures: [
                    [
                        'de' => 'Tee',
                        'img' => 'tea',
                    ],
                    [
                        'de' => 'Zucker',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich möchte',
                    ],
                    [
                        'de' => 'die Rechnung',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'einen',
                            'Tee',
                        ],
                        'blank' => 1,
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
                                    'sugar',
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
                            'ja' => [
                                'sentence' => 'お茶をください',
                                'correct' => [
                                    'お茶',
                                    'を',
                                    'ください',
                                ],
                                'extra' => [
                                    'コーヒー',
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
                            'Die',
                            'Rechnung',
                            'bitte',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the bill please',
                                'correct' => [
                                    'the bill',
                                    'please',
                                ],
                                'extra' => [
                                    'thank you',
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
                            'ja' => [
                                'sentence' => 'お会計をお願いします',
                                'correct' => [
                                    'お会計',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    '砂糖',
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
                            'Ich',
                            'möchte',
                            'einen',
                            'Tee',
                            'mit',
                            'Zucker',
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
                            'ja' => [
                                'sentence' => '砂糖を入れたお茶をください',
                                'correct' => [
                                    '砂糖',
                                    'を',
                                    '入れた',
                                    'お茶',
                                    'を',
                                    'ください',
                                ],
                                'extra' => [
                                    'お会計',
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
