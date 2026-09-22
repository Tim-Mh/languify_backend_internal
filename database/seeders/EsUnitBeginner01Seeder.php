<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner01Seeder extends Seeder
{
    private const PICTURES = [
        'café' => 'coffee',
        'té' => 'tea',
        'leche' => 'milk',
        'azúcar' => 'sugar',
        'pan' => 'bread',
        'agua' => 'water',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 1, the Spanish twin of the
     * English "Unit 1: At the Café" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unidad 1: En el café', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Café y Té', 1,
                pictures: [
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                    [
                        'es' => 'té',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'es' => 'por favor',
                    ],
                    [
                        'es' => 'gracias',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'café',
                            'por',
                            'favor',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'bir qəhvə zəhmət olmasa', 'correct' => ['bir', 'qəhvə', 'zəhmət olmasa'], 'extra' => ['çay', 'təşəkkür']],
                            'ar' => ['sentence' => 'قهوة من فضلك', 'correct' => ['قهوة', 'من فضلك'], 'extra' => ['شاي', 'شكرا']],
                            'ru' => ['sentence' => 'кофе пожалуйста', 'correct' => ['кофе', 'пожалуйста'], 'extra' => ['чай', 'спасибо']],
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
                            'tr' => ['sentence' => 'bir kahve lütfen', 'correct' => ['bir', 'kahve', 'lütfen'], 'extra' => ['çay', 'teşekkürler']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'té',
                            'gracias',
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
                            'az' => ['sentence' => 'bir çay təşəkkür', 'correct' => ['bir', 'çay', 'təşəkkür'], 'extra' => ['qəhvə', 'zəhmət olmasa']],
                            'ar' => ['sentence' => 'شاي شكرا', 'correct' => ['شاي', 'شكرا'], 'extra' => ['قهوة', 'من فضلك']],
                            'ru' => ['sentence' => 'чай спасибо', 'correct' => ['чай', 'спасибо'], 'extra' => ['кофе', 'пожалуйста']],
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
                            'tr' => ['sentence' => 'bir çay teşekkürler', 'correct' => ['bir', 'çay', 'teşekkürler'], 'extra' => ['kahve', 'lütfen']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'café',
                            'y',
                            'un',
                            'té',
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
                            'az' => ['sentence' => 'bir qəhvə və bir çay', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'çay'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'قهوة و شاي', 'correct' => ['قهوة', 'و', 'شاي'], 'extra' => ['شكرا']],
                            'ru' => ['sentence' => 'кофе и чай', 'correct' => ['кофе', 'и', 'чай'], 'extra' => ['спасибо']],
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
                            'tr' => ['sentence' => 'bir kahve ve bir çay', 'correct' => ['bir', 'kahve', 've', 'bir', 'çay'], 'extra' => ['teşekkürler']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Pan y Agua', 2,
                pictures: [
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                    [
                        'es' => 'agua',
                        'img' => 'water',
                    ],
                ],
                plain: [
                    [
                        'es' => 'hola',
                    ],
                    [
                        'es' => 'y',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hola',
                            'un',
                            'agua',
                            'por',
                            'favor',
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
                            'tr' => ['sentence' => 'merhaba bir su lütfen', 'correct' => ['merhaba', 'bir', 'su', 'lütfen'], 'extra' => ['ekmek']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Pan',
                            'y',
                            'agua',
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
                            'az' => ['sentence' => 'çörək və su', 'correct' => ['çörək', 'və', 'su'], 'extra' => ['salam', 'təşəkkür']],
                            'ar' => ['sentence' => 'خبز و ماء', 'correct' => ['خبز', 'و', 'ماء'], 'extra' => ['مرحبا', 'شكرا']],
                            'ru' => ['sentence' => 'хлеб и вода', 'correct' => ['хлеб', 'и', 'вода'], 'extra' => ['привет', 'спасибо']],
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
                            'tr' => ['sentence' => 'ekmek ve su', 'correct' => ['ekmek', 've', 'su'], 'extra' => ['merhaba', 'teşekkürler']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Hola',
                            'pan',
                            'y',
                            'un',
                            'café',
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
                            'tr' => ['sentence' => 'merhaba ekmek ve bir kahve', 'correct' => ['merhaba', 'ekmek', 've', 'bir', 'kahve'], 'extra' => ['su']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Leche y Azúcar', 3,
                pictures: [
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                    [
                        'es' => 'azúcar',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'es' => 'con',
                    ],
                    [
                        'es' => 'quisiera',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'café',
                            'con',
                            'leche',
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
                            'az' => ['sentence' => 'bir qəhvə ilə süd', 'correct' => ['bir', 'qəhvə', 'ilə', 'süd'], 'extra' => ['şəkər']],
                            'ar' => ['sentence' => 'قهوة مع حليب', 'correct' => ['قهوة', 'مع', 'حليب'], 'extra' => ['سكر']],
                            'ru' => ['sentence' => 'кофе с молоко', 'correct' => ['кофе', 'с', 'молоко'], 'extra' => ['сахар']],
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
                            'tr' => ['sentence' => 'sütlü bir kahve', 'correct' => ['sütlü', 'bir', 'kahve'], 'extra' => ['şeker']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Quisiera',
                            'azúcar',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'istəyirəm şəkər', 'correct' => ['istəyirəm', 'şəkər'], 'extra' => ['süd', 'ilə']],
                            'ar' => ['sentence' => 'أريد سكر', 'correct' => ['أريد', 'سكر'], 'extra' => ['حليب', 'مع']],
                            'ru' => ['sentence' => 'я хочу сахар', 'correct' => ['я', 'хочу', 'сахар'], 'extra' => ['молоко', 'с']],
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
                            'tr' => ['sentence' => 'şeker istiyorum', 'correct' => ['şeker', 'istiyorum'], 'extra' => ['süt', 'ile']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Quisiera',
                            'un',
                            'té',
                            'con',
                            'leche',
                        ],
                        'blank' => 3,
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
                            'tr' => ['sentence' => 'sütlü bir çay istiyorum', 'correct' => ['sütlü', 'bir', 'çay', 'istiyorum'], 'extra' => ['şeker']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Café y Leche', 4,
                pictures: [
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'es' => 'sí',
                    ],
                    [
                        'es' => 'no',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Sí',
                            'un',
                            'café',
                            'por',
                            'favor',
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
                            'tr' => ['sentence' => 'evet bir kahve lütfen', 'correct' => ['evet', 'bir', 'kahve', 'lütfen'], 'extra' => ['hayır']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Sin',
                            'leche',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'xeyr süd', 'correct' => ['xeyr', 'süd'], 'extra' => ['bəli', 'qəhvə']],
                            'ar' => ['sentence' => 'لا حليب', 'correct' => ['لا', 'حليب'], 'extra' => ['نعم', 'قهوة']],
                            'ru' => ['sentence' => 'нет молоко', 'correct' => ['нет', 'молоко'], 'extra' => ['да', 'кофе']],
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
                            'tr' => ['sentence' => 'süt yok', 'correct' => ['süt', 'yok'], 'extra' => ['evet', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Sí',
                            'un',
                            'café',
                            'con',
                            'leche',
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
                            'az' => ['sentence' => 'bəli bir qəhvə ilə süd', 'correct' => ['bəli', 'bir', 'qəhvə', 'ilə', 'süd'], 'extra' => ['xeyr']],
                            'ar' => ['sentence' => 'نعم قهوة مع حليب', 'correct' => ['نعم', 'قهوة', 'مع', 'حليب'], 'extra' => ['لا']],
                            'ru' => ['sentence' => 'да кофе с молоко', 'correct' => ['да', 'кофе', 'с', 'молоко'], 'extra' => ['нет']],
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
                            'tr' => ['sentence' => 'evet sütlü bir kahve', 'correct' => ['evet', 'sütlü', 'bir', 'kahve'], 'extra' => ['hayır']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Té y Azúcar', 5,
                pictures: [
                    [
                        'es' => 'té',
                        'img' => 'tea',
                    ],
                    [
                        'es' => 'azúcar',
                        'img' => 'sugar',
                    ],
                ],
                plain: [
                    [
                        'es' => 'quisiera',
                    ],
                    [
                        'es' => 'la cuenta',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quisiera',
                            'un',
                            'té',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'istəyirəm bir çay', 'correct' => ['istəyirəm', 'bir', 'çay'], 'extra' => ['qəhvə', 'şəkər']],
                            'ar' => ['sentence' => 'أريد شاي', 'correct' => ['أريد', 'شاي'], 'extra' => ['قهوة', 'سكر']],
                            'ru' => ['sentence' => 'я хочу чай', 'correct' => ['я', 'хочу', 'чай'], 'extra' => ['кофе', 'сахар']],
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
                            'tr' => ['sentence' => 'bir çay istiyorum', 'correct' => ['bir', 'çay', 'istiyorum'], 'extra' => ['kahve', 'şeker']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'cuenta',
                            'por',
                            'favor',
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
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['təşəkkür', 'şəkər']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['شكرا', 'سكر']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['спасибо', 'сахар']],
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
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['teşekkürler', 'şeker']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Quisiera',
                            'un',
                            'té',
                            'con',
                            'azúcar',
                        ],
                        'blank' => 4,
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
                            'tr' => ['sentence' => 'şekerli bir çay istiyorum', 'correct' => ['şekerli', 'bir', 'çay', 'istiyorum'], 'extra' => ['hesap']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
