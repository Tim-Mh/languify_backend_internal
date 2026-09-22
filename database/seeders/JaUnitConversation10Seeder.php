<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation10Seeder extends Seeder
{
    private const PICTURES = [
        '猫' => 'cat',
        '犬' => 'dog',
        'コーヒー' => 'coffee',
        'お茶' => 'tea',
        '本' => 'book',
        '家' => 'house',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 10, the Japanese twin of the
     * English "Unit 10: Comparisons & Preferences" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'ユニット10: 比較と好み', $this->lessonsData($builder));
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
                        'ja' => 'もっと',
                    ],
                    [
                        'ja' => 'より少ない',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'もっと',
                            'コーヒー',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'more coffee',
                                'correct' => [
                                    'more',
                                    'coffee',
                                ],
                                'extra' => [
                                    'less',
                                ],
                            ],
                            'az' => ['sentence' => 'daha qəhvə', 'correct' => ['daha', 'qəhvə'], 'extra' => ['daha az']],
                            'ar' => ['sentence' => 'أكثر قهوة', 'correct' => ['أكثر', 'قهوة'], 'extra' => ['أقل']],
                            'ru' => ['sentence' => 'больше кофе', 'correct' => ['больше', 'кофе'], 'extra' => ['меньше']],
                            'es' => [
                                'sentence' => 'Más café',
                                'correct' => [
                                    'más',
                                    'café',
                                ],
                                'extra' => [
                                    'menos',
                                    'té',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mehr Kaffee',
                                'correct' => [
                                    'mehr',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'weniger',
                                    'Tee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Plus de café',
                                'correct' => [
                                    'plus',
                                    'café',
                                ],
                                'extra' => [
                                    'moins',
                                    'thé',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피 더',
                                'correct' => [
                                    '커피',
                                    '더',
                                ],
                                'extra' => [
                                    '덜',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha çok kahve', 'correct' => ['daha', 'çok', 'kahve'], 'extra' => ['daha az']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'お茶',
                            'を',
                            '少なく',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'less tea',
                                'correct' => [
                                    'less',
                                    'tea',
                                ],
                                'extra' => [
                                    'more',
                                ],
                            ],
                            'az' => ['sentence' => 'daha az çay', 'correct' => ['daha az', 'çay'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'أقل شاي', 'correct' => ['أقل', 'شاي'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'меньше чай', 'correct' => ['меньше', 'чай'], 'extra' => ['больше']],
                            'es' => [
                                'sentence' => 'Menos té',
                                'correct' => [
                                    'menos',
                                    'té',
                                ],
                                'extra' => [
                                    'más',
                                    'café',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Weniger Tee',
                                'correct' => [
                                    'weniger',
                                    'Tee',
                                ],
                                'extra' => [
                                    'mehr',
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Moins de thé',
                                'correct' => [
                                    'moins',
                                    'thé',
                                ],
                                'extra' => [
                                    'plus',
                                    'café',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '차 덜',
                                'correct' => [
                                    '차',
                                    '덜',
                                ],
                                'extra' => [
                                    '더',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha az çay', 'correct' => ['daha', 'az', 'çay'], 'extra' => ['daha çok']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'もっと',
                            'コーヒー',
                            'と',
                            'お茶',
                            'を',
                            '少なく',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'more coffee and less tea',
                                'correct' => [
                                    'more',
                                    'coffee',
                                    'and',
                                    'less',
                                    'tea',
                                ],
                                'extra' => [
                                    'same',
                                ],
                            ],
                            'az' => ['sentence' => 'daha qəhvə və daha az çay', 'correct' => ['daha', 'qəhvə', 'və', 'daha az', 'çay'], 'extra' => ['eyni']],
                            'ar' => ['sentence' => 'أكثر قهوة و أقل شاي', 'correct' => ['أكثر', 'قهوة', 'و', 'أقل', 'شاي'], 'extra' => ['نفسه']],
                            'ru' => ['sentence' => 'больше кофе и меньше чай', 'correct' => ['больше', 'кофе', 'и', 'меньше', 'чай'], 'extra' => ['такой же']],
                            'es' => [
                                'sentence' => 'Más café y menos té',
                                'correct' => [
                                    'más',
                                    'café',
                                    'y',
                                    'menos',
                                    'té',
                                ],
                                'extra' => [
                                    'mismo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mehr Kaffee und weniger Tee',
                                'correct' => [
                                    'mehr',
                                    'Kaffee',
                                    'und',
                                    'weniger',
                                    'Tee',
                                ],
                                'extra' => [
                                    'gleich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Plus de café et moins de thé',
                                'correct' => [
                                    'plus',
                                    'café',
                                    'et',
                                    'moins',
                                    'thé',
                                ],
                                'extra' => [
                                    'même',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피 더 그리고 차 덜',
                                'correct' => [
                                    '커피',
                                    '더',
                                    '그리고',
                                    '차',
                                    '덜',
                                ],
                                'extra' => [
                                    '같은',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha çok kahve ve daha az çay', 'correct' => ['daha', 'çok', 'kahve', 've', 'daha', 'az', 'çay'], 'extra' => ['aynı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 猫・犬', 2,
                pictures: [
                    [
                        'ja' => '猫',
                        'img' => 'cat',
                    ],
                    [
                        'ja' => '犬',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'のように',
                    ],
                    [
                        'ja' => '同じ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '犬',
                            'の',
                            'ような',
                            '猫',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cat like a dog',
                                'correct' => [
                                    'a',
                                    'cat',
                                    'like',
                                    'a',
                                    'dog',
                                ],
                                'extra' => [
                                    'same',
                                ],
                            ],
                            'az' => ['sentence' => 'bir pişik xoşuma gəlir bir it', 'correct' => ['bir', 'pişik', 'xoşuma gəlir', 'bir', 'it'], 'extra' => ['eyni']],
                            'ar' => ['sentence' => 'قط يعجبني كلب', 'correct' => ['قط', 'يعجبني', 'كلب'], 'extra' => ['نفسه']],
                            'ru' => ['sentence' => 'кот нравится собака', 'correct' => ['кот', 'нравится', 'собака'], 'extra' => ['такой же']],
                            'es' => [
                                'sentence' => 'Un gato como un perro',
                                'correct' => [
                                    'un',
                                    'gato',
                                    'como',
                                    'un',
                                    'perro',
                                ],
                                'extra' => [
                                    'mismo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Katze wie ein Hund',
                                'correct' => [
                                    'eine',
                                    'Katze',
                                    'wie',
                                    'ein',
                                    'Hund',
                                ],
                                'extra' => [
                                    'gleich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chat comme un chien',
                                'correct' => [
                                    'un',
                                    'chat',
                                    'comme',
                                    'un',
                                    'chien',
                                ],
                                'extra' => [
                                    'même',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '개 같은 고양이',
                                'correct' => [
                                    '개',
                                    '같은',
                                    '고양이',
                                ],
                                'extra' => [
                                    '같은',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir köpek gibi bir kedi', 'correct' => ['bir', 'köpek', 'gibi', 'bir', 'kedi'], 'extra' => ['aynı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '同じ',
                            '猫',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the same cat',
                                'correct' => [
                                    'the',
                                    'same',
                                    'cat',
                                ],
                                'extra' => [
                                    'like',
                                ],
                            ],
                            'az' => ['sentence' => 'eyni pişik', 'correct' => ['eyni', 'pişik'], 'extra' => ['xoşuma gəlir']],
                            'ar' => ['sentence' => 'نفسه قط', 'correct' => ['نفسه', 'قط'], 'extra' => ['يعجبني']],
                            'ru' => ['sentence' => 'такой же кот', 'correct' => ['такой же', 'кот'], 'extra' => ['нравится']],
                            'es' => [
                                'sentence' => 'El mismo gato',
                                'correct' => [
                                    'el',
                                    'mismo',
                                    'gato',
                                ],
                                'extra' => [
                                    'como',
                                    'perro',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die gleiche Katze',
                                'correct' => [
                                    'die',
                                    'gleich',
                                    'Katze',
                                ],
                                'extra' => [
                                    'wie',
                                    'Hund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le même chat',
                                'correct' => [
                                    'le',
                                    'même',
                                    'chat',
                                ],
                                'extra' => [
                                    'comme',
                                    'chien',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '같은 고양이',
                                'correct' => [
                                    '같은',
                                    '고양이',
                                ],
                                'extra' => [
                                    '처럼',
                                ],
                            ],
                            'tr' => ['sentence' => 'aynı kedi', 'correct' => ['aynı', 'kedi'], 'extra' => ['gibi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '同じ',
                            '犬',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the same dog',
                                'correct' => [
                                    'the',
                                    'same',
                                    'dog',
                                ],
                                'extra' => [
                                    'like',
                                ],
                            ],
                            'az' => ['sentence' => 'eyni it', 'correct' => ['eyni', 'it'], 'extra' => ['xoşuma gəlir']],
                            'ar' => ['sentence' => 'نفسه كلب', 'correct' => ['نفسه', 'كلب'], 'extra' => ['يعجبني']],
                            'ru' => ['sentence' => 'такой же собака', 'correct' => ['такой же', 'собака'], 'extra' => ['нравится']],
                            'es' => [
                                'sentence' => 'El mismo perro',
                                'correct' => [
                                    'el',
                                    'mismo',
                                    'perro',
                                ],
                                'extra' => [
                                    'como',
                                    'gato',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der gleiche Hund',
                                'correct' => [
                                    'der',
                                    'gleich',
                                    'Hund',
                                ],
                                'extra' => [
                                    'wie',
                                    'Katze',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le même chien',
                                'correct' => [
                                    'le',
                                    'même',
                                    'chien',
                                ],
                                'extra' => [
                                    'comme',
                                    'chat',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '같은 개',
                                'correct' => [
                                    '같은',
                                    '개',
                                ],
                                'extra' => [
                                    '처럼',
                                ],
                            ],
                            'tr' => ['sentence' => 'aynı köpek', 'correct' => ['aynı', 'köpek'], 'extra' => ['gibi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 本・家', 3,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'もっと良い',
                    ],
                    [
                        'ja' => 'もっと悪い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'この',
                            '本',
                            'の',
                            '方',
                            'が',
                            '良い',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'this book is better',
                                'correct' => [
                                    'this',
                                    'book',
                                    'is',
                                    'better',
                                ],
                                'extra' => [
                                    'worse',
                                ],
                            ],
                            'az' => ['sentence' => 'bu kitab daha yaxşı', 'correct' => ['bu', 'kitab', 'daha yaxşı'], 'extra' => ['daha pis']],
                            'ar' => ['sentence' => 'هذا كتاب أحسن', 'correct' => ['هذا', 'كتاب', 'أحسن'], 'extra' => ['أسوأ']],
                            'ru' => ['sentence' => 'это книга лучше', 'correct' => ['это', 'книга', 'лучше'], 'extra' => ['хуже']],
                            'es' => [
                                'sentence' => 'Este libro es mejor',
                                'correct' => [
                                    'este',
                                    'libro',
                                    'es',
                                    'mejor',
                                ],
                                'extra' => [
                                    'peor',
                                    'casa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Dieses Buch ist besser',
                                'correct' => [
                                    'dieser',
                                    'Buch',
                                    'ist',
                                    'besser',
                                ],
                                'extra' => [
                                    'schlechter',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ce livre est meilleur',
                                'correct' => [
                                    'ce',
                                    'livre',
                                    'est',
                                    'meilleur',
                                ],
                                'extra' => [
                                    'pire',
                                    'maison',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '이 책이 더 좋다',
                                'correct' => [
                                    '이',
                                    '책이',
                                    '더',
                                    '좋다',
                                ],
                                'extra' => [
                                    '더 나쁜',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu kitap daha iyi', 'correct' => ['bu', 'kitap', 'daha', 'iyi'], 'extra' => ['daha kötü']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'あの',
                            '家',
                            'の',
                            '方',
                            'が',
                            '悪い',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'that house is worse',
                                'correct' => [
                                    'that',
                                    'house',
                                    'is',
                                    'worse',
                                ],
                                'extra' => [
                                    'better',
                                ],
                            ],
                            'az' => ['sentence' => 'o ev daha pis', 'correct' => ['o', 'ev', 'daha pis'], 'extra' => ['daha yaxşı']],
                            'ar' => ['sentence' => 'ذلك بيت أسوأ', 'correct' => ['ذلك', 'بيت', 'أسوأ'], 'extra' => ['أحسن']],
                            'ru' => ['sentence' => 'тот дом хуже', 'correct' => ['тот', 'дом', 'хуже'], 'extra' => ['лучше']],
                            'es' => [
                                'sentence' => 'Esa casa es peor',
                                'correct' => [
                                    'ese',
                                    'casa',
                                    'es',
                                    'peor',
                                ],
                                'extra' => [
                                    'mejor',
                                    'libro',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Jenes Haus ist schlechter',
                                'correct' => [
                                    'jener',
                                    'Haus',
                                    'ist',
                                    'schlechter',
                                ],
                                'extra' => [
                                    'besser',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Cette maison est pire',
                                'correct' => [
                                    'cette',
                                    'maison',
                                    'est',
                                    'pire',
                                ],
                                'extra' => [
                                    'meilleur',
                                    'livre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저 집이 더 나쁘다',
                                'correct' => [
                                    '저',
                                    '집이',
                                    '더',
                                    '나쁘다',
                                ],
                                'extra' => [
                                    '더 좋은',
                                ],
                            ],
                            'tr' => ['sentence' => 'o ev daha kötü', 'correct' => ['o', 'ev', 'daha', 'kötü'], 'extra' => ['daha iyi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '良い',
                            'か',
                            '悪い',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'better or worse',
                                'correct' => [
                                    'better',
                                    'or',
                                    'worse',
                                ],
                                'extra' => [
                                    'book',
                                ],
                            ],
                            'az' => ['sentence' => 'daha yaxşı və ya daha pis', 'correct' => ['daha yaxşı', 'və ya', 'daha pis'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'أحسن أو أسوأ', 'correct' => ['أحسن', 'أو', 'أسوأ'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'лучше или хуже', 'correct' => ['лучше', 'или', 'хуже'], 'extra' => ['книга']],
                            'es' => [
                                'sentence' => 'Mejor o peor',
                                'correct' => [
                                    'mejor',
                                    'o',
                                    'peor',
                                ],
                                'extra' => [
                                    'libro',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Besser oder schlechter',
                                'correct' => [
                                    'besser',
                                    'oder',
                                    'schlechter',
                                ],
                                'extra' => [
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Meilleur ou pire',
                                'correct' => [
                                    'meilleur',
                                    'ou',
                                    'pire',
                                ],
                                'extra' => [
                                    'livre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '더 좋거나 더 나쁜',
                                'correct' => [
                                    '더',
                                    '좋거나',
                                    '더',
                                    '나쁜',
                                ],
                                'extra' => [
                                    '책',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha iyi veya daha kötü', 'correct' => ['daha', 'iyi', 'veya', 'daha', 'kötü'], 'extra' => ['kitap']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: コーヒー・本', 4,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'ja' => '同じくらい',
                    ],
                    [
                        'ja' => '特に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '同じくらい',
                            'の',
                            'コーヒー',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'as much coffee',
                                'correct' => [
                                    'as much',
                                    'coffee',
                                ],
                                'extra' => [
                                    'especially',
                                ],
                            ],
                            'az' => ['sentence' => 'qədər qəhvə', 'correct' => ['qədər', 'qəhvə'], 'extra' => ['xüsusilə']],
                            'ar' => ['sentence' => 'بقدر قهوة', 'correct' => ['بقدر', 'قهوة'], 'extra' => ['خاصة']],
                            'ru' => ['sentence' => 'столько же кофе', 'correct' => ['столько же', 'кофе'], 'extra' => ['особенно']],
                            'es' => [
                                'sentence' => 'Tanto café',
                                'correct' => [
                                    'tanto',
                                    'café',
                                ],
                                'extra' => [
                                    'sobre todo',
                                    'libro',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Genauso viel Kaffee',
                                'correct' => [
                                    'genauso viel',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'besonders',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Autant de café',
                                'correct' => [
                                    'autant',
                                    'café',
                                ],
                                'extra' => [
                                    'surtout',
                                    'livre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그만큼의 커피',
                                'correct' => [
                                    '그만큼의',
                                    '커피',
                                ],
                                'extra' => [
                                    '특히',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu kadar kahve', 'correct' => ['bu', 'kadar', 'kahve'], 'extra' => ['özellikle']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '特に',
                            'その',
                            '本',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'especially the book',
                                'correct' => [
                                    'especially',
                                    'the',
                                    'book',
                                ],
                                'extra' => [
                                    'as much',
                                ],
                            ],
                            'az' => ['sentence' => 'xüsusilə kitab', 'correct' => ['xüsusilə', 'kitab'], 'extra' => ['qədər']],
                            'ar' => ['sentence' => 'خاصة كتاب', 'correct' => ['خاصة', 'كتاب'], 'extra' => ['بقدر']],
                            'ru' => ['sentence' => 'особенно книга', 'correct' => ['особенно', 'книга'], 'extra' => ['столько же']],
                            'es' => [
                                'sentence' => 'Sobre todo el libro',
                                'correct' => [
                                    'sobre todo',
                                    'el',
                                    'libro',
                                ],
                                'extra' => [
                                    'tanto',
                                    'café',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Besonders das Buch',
                                'correct' => [
                                    'besonders',
                                    'das',
                                    'Buch',
                                ],
                                'extra' => [
                                    'genauso viel',
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Surtout le livre',
                                'correct' => [
                                    'surtout',
                                    'le',
                                    'livre',
                                ],
                                'extra' => [
                                    'autant',
                                    'café',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '특히 그 책',
                                'correct' => [
                                    '특히',
                                    '그',
                                    '책',
                                ],
                                'extra' => [
                                    '그만큼',
                                ],
                            ],
                            'tr' => ['sentence' => 'özellikle kitap', 'correct' => ['özellikle', 'kitap'], 'extra' => ['bu kadar']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'コーヒー',
                            'と',
                            '同じくらい',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'as much as the coffee',
                                'correct' => [
                                    'as much',
                                    'as',
                                    'the',
                                    'coffee',
                                ],
                                'extra' => [
                                    'especially',
                                ],
                            ],
                            'az' => ['sentence' => 'qədər kimi qəhvə', 'correct' => ['qədər', 'kimi', 'qəhvə'], 'extra' => ['xüsusilə']],
                            'ar' => ['sentence' => 'بقدر كما قهوة', 'correct' => ['بقدر', 'كما', 'قهوة'], 'extra' => ['خاصة']],
                            'ru' => ['sentence' => 'столько же как кофе', 'correct' => ['столько же', 'как', 'кофе'], 'extra' => ['особенно']],
                            'es' => [
                                'sentence' => 'Tanto como el café',
                                'correct' => [
                                    'tanto',
                                    'como',
                                    'el',
                                    'café',
                                ],
                                'extra' => [
                                    'sobre todo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Genauso viel wie der Kaffee',
                                'correct' => [
                                    'genauso viel',
                                    'wie',
                                    'der',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'besonders',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Autant que le café',
                                'correct' => [
                                    'autant',
                                    'comme',
                                    'le',
                                    'café',
                                ],
                                'extra' => [
                                    'surtout',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피만큼',
                                'correct' => [
                                    '커피만큼',
                                ],
                                'extra' => [
                                    '특히',
                                ],
                            ],
                            'tr' => ['sentence' => 'kahve kadar', 'correct' => ['kahve', 'kadar'], 'extra' => ['özellikle']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 猫・犬', 5,
                pictures: [
                    [
                        'ja' => '猫',
                        'img' => 'cat',
                    ],
                    [
                        'ja' => '犬',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'もっと良い',
                    ],
                    [
                        'ja' => '私は好む',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '猫',
                            'の',
                            '方',
                            'が',
                            '良い',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cat is better',
                                'correct' => [
                                    'a',
                                    'cat',
                                    'is',
                                    'better',
                                ],
                                'extra' => [
                                    'dog',
                                ],
                            ],
                            'az' => ['sentence' => 'bir pişik daha yaxşı', 'correct' => ['bir', 'pişik', 'daha yaxşı'], 'extra' => ['it']],
                            'ar' => ['sentence' => 'قط أحسن', 'correct' => ['قط', 'أحسن'], 'extra' => ['كلب']],
                            'ru' => ['sentence' => 'кот лучше', 'correct' => ['кот', 'лучше'], 'extra' => ['собака']],
                            'es' => [
                                'sentence' => 'Un gato es mejor',
                                'correct' => [
                                    'un',
                                    'gato',
                                    'es',
                                    'mejor',
                                ],
                                'extra' => [
                                    'perro',
                                    'prefiero',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Katze ist besser',
                                'correct' => [
                                    'eine',
                                    'Katze',
                                    'ist',
                                    'besser',
                                ],
                                'extra' => [
                                    'Hund',
                                    'ich bevorzuge',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chat est meilleur',
                                'correct' => [
                                    'un',
                                    'chat',
                                    'est',
                                    'meilleur',
                                ],
                                'extra' => [
                                    'chien',
                                    'je préfère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고양이가 더 좋다',
                                'correct' => [
                                    '고양이가',
                                    '더',
                                    '좋다',
                                ],
                                'extra' => [
                                    '개',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kedi daha iyi', 'correct' => ['bir', 'kedi', 'daha', 'iyi'], 'extra' => ['köpek']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私',
                            'は',
                            '犬',
                            'を',
                            '好む',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I prefer the dog',
                                'correct' => [
                                    'I prefer',
                                    'the',
                                    'dog',
                                ],
                                'extra' => [
                                    'better',
                                ],
                            ],
                            'az' => ['sentence' => 'üstünlük verirəm it', 'correct' => ['üstünlük verirəm', 'it'], 'extra' => ['daha yaxşı']],
                            'ar' => ['sentence' => 'أفضل كلب', 'correct' => ['أفضل', 'كلب'], 'extra' => ['أحسن']],
                            'ru' => ['sentence' => 'я предпочитаю собака', 'correct' => ['я', 'предпочитаю', 'собака'], 'extra' => ['лучше']],
                            'es' => [
                                'sentence' => 'Prefiero el perro',
                                'correct' => [
                                    'prefiero',
                                    'el',
                                    'perro',
                                ],
                                'extra' => [
                                    'mejor',
                                    'gato',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bevorzuge den Hund',
                                'correct' => [
                                    'ich bevorzuge',
                                    'den',
                                    'Hund',
                                ],
                                'extra' => [
                                    'besser',
                                    'Katze',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je préfère le chien',
                                'correct' => [
                                    'je préfère',
                                    'le',
                                    'chien',
                                ],
                                'extra' => [
                                    'meilleur',
                                    'chat',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 개를 선호한다',
                                'correct' => [
                                    '나는',
                                    '개를',
                                    '선호한다',
                                ],
                                'extra' => [
                                    '더 좋은',
                                ],
                            ],
                            'tr' => ['sentence' => 'köpeği tercih ederim', 'correct' => ['köpeği', 'tercih', 'ederim'], 'extra' => ['daha iyi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '猫',
                            'は',
                            '犬',
                            'より',
                            '良い',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cat is better than a dog',
                                'correct' => [
                                    'a',
                                    'cat',
                                    'is',
                                    'better',
                                    'than',
                                    'a',
                                    'dog',
                                ],
                                'extra' => [
                                    'I prefer',
                                ],
                            ],
                            'az' => ['sentence' => 'bir pişik daha yaxşı dan bir it', 'correct' => ['bir', 'pişik', 'daha yaxşı', 'dan', 'bir', 'it'], 'extra' => ['üstünlük verirəm']],
                            'ar' => ['sentence' => 'قط أحسن من كلب', 'correct' => ['قط', 'أحسن', 'من', 'كلب'], 'extra' => ['أفضل']],
                            'ru' => ['sentence' => 'кот лучше чем собака', 'correct' => ['кот', 'лучше', 'чем', 'собака'], 'extra' => ['я', 'предпочитаю']],
                            'es' => [
                                'sentence' => 'Un gato es mejor que un perro',
                                'correct' => [
                                    'un',
                                    'gato',
                                    'es',
                                    'mejor',
                                    'que',
                                    'un',
                                    'perro',
                                ],
                                'extra' => [
                                    'prefiero',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Katze ist besser als ein Hund',
                                'correct' => [
                                    'eine',
                                    'Katze',
                                    'ist',
                                    'besser',
                                    'als',
                                    'ein',
                                    'Hund',
                                ],
                                'extra' => [
                                    'ich bevorzuge',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chat est meilleur qu\'un chien',
                                'correct' => [
                                    'un',
                                    'chat',
                                    'est',
                                    'meilleur',
                                    'que',
                                    'un',
                                    'chien',
                                ],
                                'extra' => [
                                    'je préfère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고양이가 개보다 더 좋다',
                                'correct' => [
                                    '고양이가',
                                    '개보다',
                                    '더',
                                    '좋다',
                                ],
                                'extra' => [
                                    '나는 선호한다',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kedi bir köpekten daha iyi', 'correct' => ['bir', 'kedi', 'bir', 'köpekten', 'daha', 'iyi'], 'extra' => ['tercih ederim']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
