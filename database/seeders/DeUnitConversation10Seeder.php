<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation10Seeder extends Seeder
{
    private const PICTURES = [
        'Katze' => 'cat',
        'Hund' => 'dog',
        'Kaffee' => 'coffee',
        'Tee' => 'tea',
        'Buch' => 'book',
        'Haus' => 'house',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 10, the German twin of the
     * English "Unit 10: Comparisons & Preferences" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Einheit 10: Vergleiche & Vorlieben', $this->lessonsData($builder));
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
                        'de' => 'mehr',
                    ],
                    [
                        'de' => 'weniger',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mehr',
                            'Kaffee',
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
                                    'tea',
                                ],
                            ],
                            'az' => ['sentence' => 'daha qəhvə', 'correct' => ['daha', 'qəhvə'], 'extra' => ['daha az', 'çay']],
                            'ar' => ['sentence' => 'أكثر قهوة', 'correct' => ['أكثر', 'قهوة'], 'extra' => ['أقل', 'شاي']],
                            'ru' => ['sentence' => 'больше кофе', 'correct' => ['больше', 'кофе'], 'extra' => ['меньше', 'чай']],
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
                            'ja' => [
                                'sentence' => 'もっとコーヒー',
                                'correct' => [
                                    'もっと',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    'より少ない',
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
                            'tr' => ['sentence' => 'daha çok kahve', 'correct' => ['daha', 'çok', 'kahve'], 'extra' => ['daha az', 'çay']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Weniger',
                            'Tee',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'less tea',
                                'correct' => [
                                    'less',
                                    'tea',
                                ],
                                'extra' => [
                                    'more',
                                    'coffee',
                                ],
                            ],
                            'az' => ['sentence' => 'daha az çay', 'correct' => ['daha az', 'çay'], 'extra' => ['daha', 'qəhvə']],
                            'ar' => ['sentence' => 'أقل شاي', 'correct' => ['أقل', 'شاي'], 'extra' => ['أكثر', 'قهوة']],
                            'ru' => ['sentence' => 'меньше чай', 'correct' => ['меньше', 'чай'], 'extra' => ['больше', 'кофе']],
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
                            'ja' => [
                                'sentence' => 'お茶を少なく',
                                'correct' => [
                                    'お茶',
                                    'を',
                                    '少なく',
                                ],
                                'extra' => [
                                    'もっと',
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
                            'tr' => ['sentence' => 'daha az çay', 'correct' => ['daha', 'az', 'çay'], 'extra' => ['daha çok', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mehr',
                            'Kaffee',
                            'und',
                            'weniger',
                            'Tee',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => 'もっとコーヒーとお茶を少なく',
                                'correct' => [
                                    'もっと',
                                    'コーヒー',
                                    'と',
                                    'お茶',
                                    'を',
                                    '少なく',
                                ],
                                'extra' => [
                                    '同じ',
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
            $builder->lesson('Lektion 2: Katze & Hund', 2,
                pictures: [
                    [
                        'de' => 'Katze',
                        'img' => 'cat',
                    ],
                    [
                        'de' => 'Hund',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wie',
                    ],
                    [
                        'de' => 'gleich',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Katze',
                            'wie',
                            'ein',
                            'Hund',
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
                            'ja' => [
                                'sentence' => '犬のような猫',
                                'correct' => [
                                    '犬',
                                    'の',
                                    'ような',
                                    '猫',
                                ],
                                'extra' => [
                                    '同じ',
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
                            'Die',
                            'gleiche',
                            'Katze',
                        ],
                        'blank' => 1,
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
                                    'dog',
                                ],
                            ],
                            'az' => ['sentence' => 'eyni pişik', 'correct' => ['eyni', 'pişik'], 'extra' => ['xoşuma gəlir', 'it']],
                            'ar' => ['sentence' => 'نفسه قط', 'correct' => ['نفسه', 'قط'], 'extra' => ['يعجبني', 'كلب']],
                            'ru' => ['sentence' => 'такой же кот', 'correct' => ['такой же', 'кот'], 'extra' => ['нравится', 'собака']],
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
                            'ja' => [
                                'sentence' => '同じ猫',
                                'correct' => [
                                    '同じ',
                                    '猫',
                                ],
                                'extra' => [
                                    'のように',
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
                            'tr' => ['sentence' => 'aynı kedi', 'correct' => ['aynı', 'kedi'], 'extra' => ['gibi', 'köpek']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'gleiche',
                            'Hund',
                        ],
                        'blank' => 1,
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
                                    'cat',
                                ],
                            ],
                            'az' => ['sentence' => 'eyni it', 'correct' => ['eyni', 'it'], 'extra' => ['xoşuma gəlir', 'pişik']],
                            'ar' => ['sentence' => 'نفسه كلب', 'correct' => ['نفسه', 'كلب'], 'extra' => ['يعجبني', 'قط']],
                            'ru' => ['sentence' => 'такой же собака', 'correct' => ['такой же', 'собака'], 'extra' => ['нравится', 'кот']],
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
                            'ja' => [
                                'sentence' => '同じ犬',
                                'correct' => [
                                    '同じ',
                                    '犬',
                                ],
                                'extra' => [
                                    'のように',
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
                            'tr' => ['sentence' => 'aynı köpek', 'correct' => ['aynı', 'köpek'], 'extra' => ['gibi', 'kedi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Buch & Haus', 3,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'besser',
                    ],
                    [
                        'de' => 'schlechter',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Dieses',
                            'Buch',
                            'ist',
                            'besser',
                        ],
                        'blank' => 3,
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
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'bu kitab daha yaxşı', 'correct' => ['bu', 'kitab', 'daha yaxşı'], 'extra' => ['daha pis', 'ev']],
                            'ar' => ['sentence' => 'هذا كتاب أحسن', 'correct' => ['هذا', 'كتاب', 'أحسن'], 'extra' => ['أسوأ', 'بيت']],
                            'ru' => ['sentence' => 'это книга лучше', 'correct' => ['это', 'книга', 'лучше'], 'extra' => ['хуже', 'дом']],
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
                            'ja' => [
                                'sentence' => 'この本の方が良い',
                                'correct' => [
                                    'この',
                                    '本',
                                    'の',
                                    '方',
                                    'が',
                                    '良い',
                                ],
                                'extra' => [
                                    'もっと悪い',
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
                            'tr' => ['sentence' => 'bu kitap daha iyi', 'correct' => ['bu', 'kitap', 'daha', 'iyi'], 'extra' => ['daha kötü', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Jenes',
                            'Haus',
                            'ist',
                            'schlechter',
                        ],
                        'blank' => 3,
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
                                    'book',
                                ],
                            ],
                            'az' => ['sentence' => 'o ev daha pis', 'correct' => ['o', 'ev', 'daha pis'], 'extra' => ['daha yaxşı', 'kitab']],
                            'ar' => ['sentence' => 'ذلك بيت أسوأ', 'correct' => ['ذلك', 'بيت', 'أسوأ'], 'extra' => ['أحسن', 'كتاب']],
                            'ru' => ['sentence' => 'тот дом хуже', 'correct' => ['тот', 'дом', 'хуже'], 'extra' => ['лучше', 'книга']],
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
                            'ja' => [
                                'sentence' => 'あの家の方が悪い',
                                'correct' => [
                                    'あの',
                                    '家',
                                    'の',
                                    '方',
                                    'が',
                                    '悪い',
                                ],
                                'extra' => [
                                    'もっと良い',
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
                            'tr' => ['sentence' => 'o ev daha kötü', 'correct' => ['o', 'ev', 'daha', 'kötü'], 'extra' => ['daha iyi', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Besser',
                            'oder',
                            'schlechter',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '良いか悪い',
                                'correct' => [
                                    '良い',
                                    'か',
                                    '悪い',
                                ],
                                'extra' => [
                                    '本',
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
            $builder->lesson('Lektion 4: Kaffee & Buch', 4,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'de' => 'genauso viel',
                    ],
                    [
                        'de' => 'besonders',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Genauso',
                            'viel',
                            'Kaffee',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'as much coffee',
                                'correct' => [
                                    'as much',
                                    'coffee',
                                ],
                                'extra' => [
                                    'especially',
                                    'book',
                                ],
                            ],
                            'az' => ['sentence' => 'qədər qəhvə', 'correct' => ['qədər', 'qəhvə'], 'extra' => ['xüsusilə', 'kitab']],
                            'ar' => ['sentence' => 'بقدر قهوة', 'correct' => ['بقدر', 'قهوة'], 'extra' => ['خاصة', 'كتاب']],
                            'ru' => ['sentence' => 'столько же кофе', 'correct' => ['столько же', 'кофе'], 'extra' => ['особенно', 'книга']],
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
                            'ja' => [
                                'sentence' => '同じくらいのコーヒー',
                                'correct' => [
                                    '同じくらい',
                                    'の',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    '特に',
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
                            'tr' => ['sentence' => 'bu kadar kahve', 'correct' => ['bu', 'kadar', 'kahve'], 'extra' => ['özellikle', 'kitap']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Besonders',
                            'das',
                            'Buch',
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
                                    'coffee',
                                ],
                            ],
                            'az' => ['sentence' => 'xüsusilə kitab', 'correct' => ['xüsusilə', 'kitab'], 'extra' => ['qədər', 'qəhvə']],
                            'ar' => ['sentence' => 'خاصة كتاب', 'correct' => ['خاصة', 'كتاب'], 'extra' => ['بقدر', 'قهوة']],
                            'ru' => ['sentence' => 'особенно книга', 'correct' => ['особенно', 'книга'], 'extra' => ['столько же', 'кофе']],
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
                            'ja' => [
                                'sentence' => '特にその本',
                                'correct' => [
                                    '特に',
                                    'その',
                                    '本',
                                ],
                                'extra' => [
                                    '同じくらい',
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
                            'tr' => ['sentence' => 'özellikle kitap', 'correct' => ['özellikle', 'kitap'], 'extra' => ['bu kadar', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Genauso',
                            'viel',
                            'wie',
                            'der',
                            'Kaffee',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'コーヒーと同じくらい',
                                'correct' => [
                                    'コーヒー',
                                    'と',
                                    '同じくらい',
                                ],
                                'extra' => [
                                    '特に',
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
            $builder->lesson('Lektion 5: Katze & Hund', 5,
                pictures: [
                    [
                        'de' => 'Katze',
                        'img' => 'cat',
                    ],
                    [
                        'de' => 'Hund',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'de' => 'besser',
                    ],
                    [
                        'de' => 'ich bevorzuge',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Katze',
                            'ist',
                            'besser',
                        ],
                        'blank' => 3,
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
                                    'I prefer',
                                ],
                            ],
                            'az' => ['sentence' => 'bir pişik daha yaxşı', 'correct' => ['bir', 'pişik', 'daha yaxşı'], 'extra' => ['it', 'üstünlük verirəm']],
                            'ar' => ['sentence' => 'قط أحسن', 'correct' => ['قط', 'أحسن'], 'extra' => ['كلب', 'أفضل']],
                            'ru' => ['sentence' => 'кот лучше', 'correct' => ['кот', 'лучше'], 'extra' => ['собака', 'я', 'предпочитаю']],
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
                            'ja' => [
                                'sentence' => '猫の方が良い',
                                'correct' => [
                                    '猫',
                                    'の',
                                    '方',
                                    'が',
                                    '良い',
                                ],
                                'extra' => [
                                    '犬',
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
                            'tr' => ['sentence' => 'bir kedi daha iyi', 'correct' => ['bir', 'kedi', 'daha', 'iyi'], 'extra' => ['köpek', 'tercih ederim']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'bevorzuge',
                            'den',
                            'Hund',
                        ],
                        'blank' => 1,
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
                                    'cat',
                                ],
                            ],
                            'az' => ['sentence' => 'üstünlük verirəm it', 'correct' => ['üstünlük verirəm', 'it'], 'extra' => ['daha yaxşı', 'pişik']],
                            'ar' => ['sentence' => 'أفضل كلب', 'correct' => ['أفضل', 'كلب'], 'extra' => ['أحسن', 'قط']],
                            'ru' => ['sentence' => 'я предпочитаю собака', 'correct' => ['я', 'предпочитаю', 'собака'], 'extra' => ['лучше', 'кот']],
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
                            'ja' => [
                                'sentence' => '私は犬を好む',
                                'correct' => [
                                    '私',
                                    'は',
                                    '犬',
                                    'を',
                                    '好む',
                                ],
                                'extra' => [
                                    'もっと良い',
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
                            'tr' => ['sentence' => 'köpeği tercih ederim', 'correct' => ['köpeği', 'tercih', 'ederim'], 'extra' => ['daha iyi', 'kedi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Eine',
                            'Katze',
                            'ist',
                            'besser',
                            'als',
                            'ein',
                            'Hund',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => '猫は犬より良い',
                                'correct' => [
                                    '猫',
                                    'は',
                                    '犬',
                                    'より',
                                    '良い',
                                ],
                                'extra' => [
                                    '私は好む',
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
