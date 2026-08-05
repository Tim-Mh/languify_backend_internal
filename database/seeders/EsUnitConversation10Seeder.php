<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation10Seeder extends Seeder
{
    private const PICTURES = [
        'gato' => 'cat',
        'perro' => 'dog',
        'café' => 'coffee',
        'té' => 'tea',
        'libro' => 'book',
        'casa' => 'house',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 10, the Spanish twin of the
     * English "Unit 10: Comparisons & Preferences" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unidad 10: Comparaciones y preferencias', $this->lessonsData($builder));
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
                        'es' => 'más',
                    ],
                    [
                        'es' => 'menos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Más',
                            'café',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Menos',
                            'té',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Más',
                            'café',
                            'y',
                            'menos',
                            'té',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Gato y Perro', 2,
                pictures: [
                    [
                        'es' => 'gato',
                        'img' => 'cat',
                    ],
                    [
                        'es' => 'perro',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'es' => 'como',
                    ],
                    [
                        'es' => 'mismo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'gato',
                            'como',
                            'un',
                            'perro',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'mismo',
                            'gato',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'mismo',
                            'perro',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Libro y Casa', 3,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'mejor',
                    ],
                    [
                        'es' => 'peor',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Este',
                            'libro',
                            'es',
                            'mejor',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Esa',
                            'casa',
                            'es',
                            'peor',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mejor',
                            'o',
                            'peor',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Café y Libro', 4,
                pictures: [
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'es' => 'tanto',
                    ],
                    [
                        'es' => 'sobre todo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Tanto',
                            'café',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Sobre',
                            'todo',
                            'el',
                            'libro',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Tanto',
                            'como',
                            'el',
                            'café',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Gato y Perro', 5,
                pictures: [
                    [
                        'es' => 'gato',
                        'img' => 'cat',
                    ],
                    [
                        'es' => 'perro',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'es' => 'mejor',
                    ],
                    [
                        'es' => 'prefiero',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'gato',
                            'es',
                            'mejor',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Prefiero',
                            'el',
                            'perro',
                        ],
                        'blank' => 0,
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'gato',
                            'es',
                            'mejor',
                            'que',
                            'un',
                            'perro',
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
                        ],
                    ],
                ],
            ),
        ];
    }
}
