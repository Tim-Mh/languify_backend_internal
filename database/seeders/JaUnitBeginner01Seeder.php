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
                            'az' => ['sentence' => 'bir qəhvə zəhmət olmasa', 'correct' => ['bir', 'qəhvə', 'zəhmət olmasa'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'قهوة من فضلك', 'correct' => ['قهوة', 'من فضلك'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'кофе пожалуйста', 'correct' => ['кофе', 'пожалуйста'], 'extra' => ['чай']],
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
                            'tr' => ['sentence' => 'bir kahve lütfen', 'correct' => ['bir', 'kahve', 'lütfen'], 'extra' => ['çay']],
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
                            'az' => ['sentence' => 'bir çay təşəkkür', 'correct' => ['bir', 'çay', 'təşəkkür'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'شاي شكرا', 'correct' => ['شاي', 'شكرا'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'чай спасибо', 'correct' => ['чай', 'спасибо'], 'extra' => ['кофе']],
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
                            'tr' => ['sentence' => 'bir çay teşekkürler', 'correct' => ['bir', 'çay', 'teşekkürler'], 'extra' => ['kahve']],
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
                            'az' => ['sentence' => 'bir qəhvə və bir çay', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'çay'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'قهوة و شاي', 'correct' => ['قهوة', 'و', 'شاي'], 'extra' => ['شكرا']],
                            'ru' => ['sentence' => 'кофе и чай', 'correct' => ['кофе', 'и', 'чай'], 'extra' => ['спасибо']],
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
                            'tr' => ['sentence' => 'bir kahve ve bir çay', 'correct' => ['bir', 'kahve', 've', 'bir', 'çay'], 'extra' => ['teşekkürler']],
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
                            'az' => ['sentence' => 'salam bir su zəhmət olmasa', 'correct' => ['salam', 'bir', 'su', 'zəhmət olmasa'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'مرحبا ماء من فضلك', 'correct' => ['مرحبا', 'ماء', 'من فضلك'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'привет вода пожалуйста', 'correct' => ['привет', 'вода', 'пожалуйста'], 'extra' => ['хлеб']],
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
                            'tr' => ['sentence' => 'merhaba bir su lütfen', 'correct' => ['merhaba', 'bir', 'su', 'lütfen'], 'extra' => ['ekmek']],
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
                            'az' => ['sentence' => 'çörək və su', 'correct' => ['çörək', 'və', 'su'], 'extra' => ['salam']],
                            'ar' => ['sentence' => 'خبز و ماء', 'correct' => ['خبز', 'و', 'ماء'], 'extra' => ['مرحبا']],
                            'ru' => ['sentence' => 'хлеб и вода', 'correct' => ['хлеб', 'и', 'вода'], 'extra' => ['привет']],
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
                            'tr' => ['sentence' => 'ekmek ve su', 'correct' => ['ekmek', 've', 'su'], 'extra' => ['merhaba']],
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
                            'az' => ['sentence' => 'salam çörək və bir qəhvə', 'correct' => ['salam', 'çörək', 'və', 'bir', 'qəhvə'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'مرحبا خبز و قهوة', 'correct' => ['مرحبا', 'خبز', 'و', 'قهوة'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'привет хлеб и кофе', 'correct' => ['привет', 'хлеб', 'и', 'кофе'], 'extra' => ['вода']],
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
                            'tr' => ['sentence' => 'merhaba ekmek ve bir kahve', 'correct' => ['merhaba', 'ekmek', 've', 'bir', 'kahve'], 'extra' => ['su']],
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
                            'az' => ['sentence' => 'bir qəhvə ilə süd', 'correct' => ['bir', 'qəhvə', 'ilə', 'süd'], 'extra' => ['şəkər']],
                            'ar' => ['sentence' => 'قهوة مع حليب', 'correct' => ['قهوة', 'مع', 'حليب'], 'extra' => ['سكر']],
                            'ru' => ['sentence' => 'кофе с молоко', 'correct' => ['кофе', 'с', 'молоко'], 'extra' => ['сахар']],
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
                            'tr' => ['sentence' => 'sütlü bir kahve', 'correct' => ['sütlü', 'bir', 'kahve'], 'extra' => ['şeker']],
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
                            'az' => ['sentence' => 'istəyirəm şəkər', 'correct' => ['istəyirəm', 'şəkər'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'أريد سكر', 'correct' => ['أريد', 'سكر'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'я хочу сахар', 'correct' => ['я', 'хочу', 'сахар'], 'extra' => ['молоко']],
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
                            'tr' => ['sentence' => 'şeker istiyorum', 'correct' => ['şeker', 'istiyorum'], 'extra' => ['süt']],
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
                            'az' => ['sentence' => 'istəyirəm bir çay ilə süd', 'correct' => ['istəyirəm', 'bir', 'çay', 'ilə', 'süd'], 'extra' => ['şəkər']],
                            'ar' => ['sentence' => 'أريد شاي مع حليب', 'correct' => ['أريد', 'شاي', 'مع', 'حليب'], 'extra' => ['سكر']],
                            'ru' => ['sentence' => 'я хочу чай с молоко', 'correct' => ['я', 'хочу', 'чай', 'с', 'молоко'], 'extra' => ['сахар']],
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
                            'tr' => ['sentence' => 'sütlü bir çay istiyorum', 'correct' => ['sütlü', 'bir', 'çay', 'istiyorum'], 'extra' => ['şeker']],
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
                            'az' => ['sentence' => 'bəli bir qəhvə zəhmət olmasa', 'correct' => ['bəli', 'bir', 'qəhvə', 'zəhmət olmasa'], 'extra' => ['xeyr']],
                            'ar' => ['sentence' => 'نعم قهوة من فضلك', 'correct' => ['نعم', 'قهوة', 'من فضلك'], 'extra' => ['لا']],
                            'ru' => ['sentence' => 'да кофе пожалуйста', 'correct' => ['да', 'кофе', 'пожалуйста'], 'extra' => ['нет']],
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
                            'tr' => ['sentence' => 'evet bir kahve lütfen', 'correct' => ['evet', 'bir', 'kahve', 'lütfen'], 'extra' => ['hayır']],
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
                            'az' => ['sentence' => 'xeyr süd', 'correct' => ['xeyr', 'süd'], 'extra' => ['bəli']],
                            'ar' => ['sentence' => 'لا حليب', 'correct' => ['لا', 'حليب'], 'extra' => ['نعم']],
                            'ru' => ['sentence' => 'нет молоко', 'correct' => ['нет', 'молоко'], 'extra' => ['да']],
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
                            'tr' => ['sentence' => 'süt yok', 'correct' => ['süt', 'yok'], 'extra' => ['evet']],
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
                            'az' => ['sentence' => 'bəli bir qəhvə ilə süd', 'correct' => ['bəli', 'bir', 'qəhvə', 'ilə', 'süd'], 'extra' => ['xeyr']],
                            'ar' => ['sentence' => 'نعم قهوة مع حليب', 'correct' => ['نعم', 'قهوة', 'مع', 'حليب'], 'extra' => ['لا']],
                            'ru' => ['sentence' => 'да кофе с молоко', 'correct' => ['да', 'кофе', 'с', 'молоко'], 'extra' => ['нет']],
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
                            'tr' => ['sentence' => 'evet sütlü bir kahve', 'correct' => ['evet', 'sütlü', 'bir', 'kahve'], 'extra' => ['hayır']],
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
                            'az' => ['sentence' => 'istəyirəm bir çay', 'correct' => ['istəyirəm', 'bir', 'çay'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'أريد شاي', 'correct' => ['أريد', 'شاي'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'я хочу чай', 'correct' => ['я', 'хочу', 'чай'], 'extra' => ['кофе']],
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
                            'tr' => ['sentence' => 'bir çay istiyorum', 'correct' => ['bir', 'çay', 'istiyorum'], 'extra' => ['kahve']],
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
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['şəkər']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['سكر']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['сахар']],
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
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['şeker']],
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
                            'az' => ['sentence' => 'istəyirəm bir çay ilə şəkər', 'correct' => ['istəyirəm', 'bir', 'çay', 'ilə', 'şəkər'], 'extra' => ['hesab']],
                            'ar' => ['sentence' => 'أريد شاي مع سكر', 'correct' => ['أريد', 'شاي', 'مع', 'سكر'], 'extra' => ['الحساب']],
                            'ru' => ['sentence' => 'я хочу чай с сахар', 'correct' => ['я', 'хочу', 'чай', 'с', 'сахар'], 'extra' => ['счёт']],
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
                            'tr' => ['sentence' => 'şekerli bir çay istiyorum', 'correct' => ['şekerli', 'bir', 'çay', 'istiyorum'], 'extra' => ['hesap']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
