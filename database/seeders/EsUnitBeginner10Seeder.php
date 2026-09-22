<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner10Seeder extends Seeder
{
    private const PICTURES = [
        'libro' => 'book',
        'manzana' => 'apple',
        'gato' => 'cat',
        'perro' => 'dog',
        'casa' => 'house',
        'mesa' => 'table',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 10, the Spanish twin of the
     * English "Unit 10: A, The, This & These" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unidad 10: Gramática: un, el, este', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Libro y Manzana', 1,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'un',
                    ],
                    [
                        'es' => 'un',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'libro',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a book',
                                'correct' => [
                                    'a',
                                    'book',
                                ],
                                'extra' => [
                                    'apple',
                                ],
                            ],
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'كتاب', 'correct' => ['كتاب'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'книга', 'correct' => ['книга'], 'extra' => ['яблоко']],
                            'de' => [
                                'sentence' => 'Ein Buch',
                                'correct' => [
                                    'ein',
                                    'Buch',
                                ],
                                'extra' => [
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre',
                                'correct' => [
                                    'un',
                                    'livre',
                                ],
                                'extra' => [
                                    'pomme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '一冊の本',
                                'correct' => [
                                    '一冊',
                                    'の',
                                    '本',
                                ],
                                'extra' => [
                                    'りんご',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책 하나',
                                'correct' => [
                                    '책',
                                    '하나',
                                ],
                                'extra' => [
                                    '사과',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['elma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'manzana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an apple',
                                'correct' => [
                                    'an',
                                    'apple',
                                ],
                                'extra' => [
                                    'book',
                                ],
                            ],
                            'az' => ['sentence' => 'bir alma', 'correct' => ['bir', 'alma'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'تفاحة', 'correct' => ['تفاحة'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'яблоко', 'correct' => ['яблоко'], 'extra' => ['книга']],
                            'de' => [
                                'sentence' => 'Ein Apfel',
                                'correct' => [
                                    'ein',
                                    'Apfel',
                                ],
                                'extra' => [
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une pomme',
                                'correct' => [
                                    'un',
                                    'pomme',
                                ],
                                'extra' => [
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '一つのりんご',
                                'correct' => [
                                    '一つの',
                                    'りんご',
                                ],
                                'extra' => [
                                    '本',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과 하나',
                                'correct' => [
                                    '사과',
                                    '하나',
                                ],
                                'extra' => [
                                    '책',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir elma', 'correct' => ['bir', 'elma'], 'extra' => ['kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'libro',
                            'y',
                            'una',
                            'manzana',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a book and an apple',
                                'correct' => [
                                    'a',
                                    'book',
                                    'and',
                                    'an',
                                    'apple',
                                ],
                                'extra' => [
                                    'cat',
                                ],
                            ],
                            'az' => ['sentence' => 'bir kitab və bir alma', 'correct' => ['bir', 'kitab', 'və', 'bir', 'alma'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'كتاب و تفاحة', 'correct' => ['كتاب', 'و', 'تفاحة'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'книга и яблоко', 'correct' => ['книга', 'и', 'яблоко'], 'extra' => ['кот']],
                            'de' => [
                                'sentence' => 'Ein Buch und ein Apfel',
                                'correct' => [
                                    'ein',
                                    'Buch',
                                    'und',
                                    'ein',
                                    'Apfel',
                                ],
                                'extra' => [
                                    'Katze',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre et une pomme',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'et',
                                    'un',
                                    'pomme',
                                ],
                                'extra' => [
                                    'chat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本とりんご',
                                'correct' => [
                                    '本',
                                    'と',
                                    'りんご',
                                ],
                                'extra' => [
                                    '猫',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책과 사과',
                                'correct' => [
                                    '책과',
                                    '사과',
                                ],
                                'extra' => [
                                    '고양이',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kitap ve bir elma', 'correct' => ['bir', 'kitap', 've', 'bir', 'elma'], 'extra' => ['kedi']],
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
                        'es' => 'el',
                    ],
                    [
                        'es' => 'algo de',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'gato',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cat',
                                'correct' => [
                                    'the',
                                    'cat',
                                ],
                                'extra' => [
                                    'dog',
                                    'some',
                                ],
                            ],
                            'az' => ['sentence' => 'pişik', 'correct' => ['pişik'], 'extra' => ['it', 'bir az']],
                            'ar' => ['sentence' => 'قط', 'correct' => ['قط'], 'extra' => ['كلب', 'بعض']],
                            'ru' => ['sentence' => 'кот', 'correct' => ['кот'], 'extra' => ['собака', 'немного']],
                            'de' => [
                                'sentence' => 'Die Katze',
                                'correct' => [
                                    'der',
                                    'Katze',
                                ],
                                'extra' => [
                                    'Hund',
                                    'etwas',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chat',
                                'correct' => [
                                    'le',
                                    'chat',
                                ],
                                'extra' => [
                                    'chien',
                                    'du',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'その猫',
                                'correct' => [
                                    'その',
                                    '猫',
                                ],
                                'extra' => [
                                    '犬',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그 고양이',
                                'correct' => [
                                    '그',
                                    '고양이',
                                ],
                                'extra' => [
                                    '개',
                                ],
                            ],
                            'tr' => ['sentence' => 'kedi', 'correct' => ['kedi'], 'extra' => ['köpek', 'biraz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Algo',
                            'de',
                            'agua',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some water',
                                'correct' => [
                                    'some',
                                    'water',
                                ],
                                'extra' => [
                                    'the',
                                    'cat',
                                ],
                            ],
                            'az' => ['sentence' => 'bir az su', 'correct' => ['bir az', 'su'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'بعض ماء', 'correct' => ['بعض', 'ماء'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'немного вода', 'correct' => ['немного', 'вода'], 'extra' => ['кот']],
                            'de' => [
                                'sentence' => 'Etwas Wasser',
                                'correct' => [
                                    'etwas',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'der',
                                    'Katze',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'De l\'eau',
                                'correct' => [
                                    'du',
                                    'eau',
                                ],
                                'extra' => [
                                    'le',
                                    'chat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '少しの水',
                                'correct' => [
                                    '少しの',
                                    '水',
                                ],
                                'extra' => [
                                    'その',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '약간의 물',
                                'correct' => [
                                    '약간의',
                                    '물',
                                ],
                                'extra' => [
                                    '그',
                                ],
                            ],
                            'tr' => ['sentence' => 'biraz su', 'correct' => ['biraz', 'su'], 'extra' => ['o', 'kedi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'perro',
                            'y',
                            'el',
                            'gato',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the dog and the cat',
                                'correct' => [
                                    'the',
                                    'dog',
                                    'and',
                                    'the',
                                    'cat',
                                ],
                                'extra' => [
                                    'some',
                                ],
                            ],
                            'az' => ['sentence' => 'it və pişik', 'correct' => ['it', 'və', 'pişik'], 'extra' => ['bir az']],
                            'ar' => ['sentence' => 'كلب و قط', 'correct' => ['كلب', 'و', 'قط'], 'extra' => ['بعض']],
                            'ru' => ['sentence' => 'собака и кот', 'correct' => ['собака', 'и', 'кот'], 'extra' => ['немного']],
                            'de' => [
                                'sentence' => 'Der Hund und die Katze',
                                'correct' => [
                                    'der',
                                    'Hund',
                                    'und',
                                    'der',
                                    'Katze',
                                ],
                                'extra' => [
                                    'etwas',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chien et le chat',
                                'correct' => [
                                    'le',
                                    'chien',
                                    'et',
                                    'le',
                                    'chat',
                                ],
                                'extra' => [
                                    'du',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '犬と猫',
                                'correct' => [
                                    '犬',
                                    'と',
                                    '猫',
                                ],
                                'extra' => [
                                    '少しの',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '개와 고양이',
                                'correct' => [
                                    '개와',
                                    '고양이',
                                ],
                                'extra' => [
                                    '약간의',
                                ],
                            ],
                            'tr' => ['sentence' => 'köpek ve kedi', 'correct' => ['köpek', 've', 'kedi'], 'extra' => ['biraz']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Gato y Libro', 3,
                pictures: [
                    [
                        'es' => 'gato',
                        'img' => 'cat',
                    ],
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'es' => 'gatos',
                    ],
                    [
                        'es' => 'libros',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Dos',
                            'gatos',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'two cats',
                                'correct' => [
                                    'two',
                                    'cats',
                                ],
                                'extra' => [
                                    'books',
                                    'one',
                                ],
                            ],
                            'az' => ['sentence' => 'iki pişiklər', 'correct' => ['iki', 'pişiklər'], 'extra' => ['kitablar', 'bir']],
                            'ar' => ['sentence' => 'اثنان قطط', 'correct' => ['اثنان', 'قطط'], 'extra' => ['كتب', 'واحد']],
                            'ru' => ['sentence' => 'два коты', 'correct' => ['два', 'коты'], 'extra' => ['книги', 'один']],
                            'de' => [
                                'sentence' => 'Zwei Katzen',
                                'correct' => [
                                    'zwei',
                                    'Katzen',
                                ],
                                'extra' => [
                                    'Bücher',
                                    'eins',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Deux chats',
                                'correct' => [
                                    'deux',
                                    'chats',
                                ],
                                'extra' => [
                                    'livres',
                                    'un',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '猫二匹',
                                'correct' => [
                                    '猫',
                                    '二匹',
                                ],
                                'extra' => [
                                    '本',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고양이 두 마리',
                                'correct' => [
                                    '고양이',
                                    '두',
                                    '마리',
                                ],
                                'extra' => [
                                    '책들',
                                ],
                            ],
                            'tr' => ['sentence' => 'iki kedi', 'correct' => ['iki', 'kedi'], 'extra' => ['kitaplar', 'bir']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Tres',
                            'libros',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'three books',
                                'correct' => [
                                    'three',
                                    'books',
                                ],
                                'extra' => [
                                    'cats',
                                    'two',
                                ],
                            ],
                            'az' => ['sentence' => 'üç kitablar', 'correct' => ['üç', 'kitablar'], 'extra' => ['pişiklər', 'iki']],
                            'ar' => ['sentence' => 'ثلاثة كتب', 'correct' => ['ثلاثة', 'كتب'], 'extra' => ['قطط', 'اثنان']],
                            'ru' => ['sentence' => 'три книги', 'correct' => ['три', 'книги'], 'extra' => ['коты', 'два']],
                            'de' => [
                                'sentence' => 'Drei Bücher',
                                'correct' => [
                                    'drei',
                                    'Bücher',
                                ],
                                'extra' => [
                                    'Katzen',
                                    'zwei',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trois livres',
                                'correct' => [
                                    'trois',
                                    'livres',
                                ],
                                'extra' => [
                                    'chats',
                                    'deux',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本三冊',
                                'correct' => [
                                    '本',
                                    '三冊',
                                ],
                                'extra' => [
                                    '猫',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책 세 권',
                                'correct' => [
                                    '책',
                                    '세',
                                    '권',
                                ],
                                'extra' => [
                                    '고양이들',
                                ],
                            ],
                            'tr' => ['sentence' => 'üç kitap', 'correct' => ['üç', 'kitap'], 'extra' => ['kediler', 'iki']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'gato',
                            'y',
                            'un',
                            'libro',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cat and a book',
                                'correct' => [
                                    'a',
                                    'cat',
                                    'and',
                                    'a',
                                    'book',
                                ],
                                'extra' => [
                                    'cats',
                                ],
                            ],
                            'az' => ['sentence' => 'bir pişik və bir kitab', 'correct' => ['bir', 'pişik', 'və', 'bir', 'kitab'], 'extra' => ['pişiklər']],
                            'ar' => ['sentence' => 'قط و كتاب', 'correct' => ['قط', 'و', 'كتاب'], 'extra' => ['قطط']],
                            'ru' => ['sentence' => 'кот и книга', 'correct' => ['кот', 'и', 'книга'], 'extra' => ['коты']],
                            'de' => [
                                'sentence' => 'Eine Katze und ein Buch',
                                'correct' => [
                                    'eine',
                                    'Katze',
                                    'und',
                                    'ein',
                                    'Buch',
                                ],
                                'extra' => [
                                    'Katzen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chat et un livre',
                                'correct' => [
                                    'un',
                                    'chat',
                                    'et',
                                    'un',
                                    'livre',
                                ],
                                'extra' => [
                                    'chats',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '猫と本',
                                'correct' => [
                                    '猫',
                                    'と',
                                    '本',
                                ],
                                'extra' => [
                                    '二',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고양이와 책',
                                'correct' => [
                                    '고양이와',
                                    '책',
                                ],
                                'extra' => [
                                    '고양이들',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kedi ve bir kitap', 'correct' => ['bir', 'kedi', 've', 'bir', 'kitap'], 'extra' => ['kediler']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Libro y Casa', 4,
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
                        'es' => 'este',
                    ],
                    [
                        'es' => 'ese',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Este',
                            'libro',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'this book',
                                'correct' => [
                                    'this',
                                    'book',
                                ],
                                'extra' => [
                                    'that',
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'bu kitab', 'correct' => ['bu', 'kitab'], 'extra' => ['o', 'ev']],
                            'ar' => ['sentence' => 'هذا كتاب', 'correct' => ['هذا', 'كتاب'], 'extra' => ['ذلك', 'بيت']],
                            'ru' => ['sentence' => 'это книга', 'correct' => ['это', 'книга'], 'extra' => ['тот', 'дом']],
                            'de' => [
                                'sentence' => 'Dieses Buch',
                                'correct' => [
                                    'dieser',
                                    'Buch',
                                ],
                                'extra' => [
                                    'jener',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ce livre',
                                'correct' => [
                                    'ce',
                                    'livre',
                                ],
                                'extra' => [
                                    'cette',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'この本',
                                'correct' => [
                                    'この',
                                    '本',
                                ],
                                'extra' => [
                                    'あの',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '이 책',
                                'correct' => [
                                    '이',
                                    '책',
                                ],
                                'extra' => [
                                    '저',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu kitap', 'correct' => ['bu', 'kitap'], 'extra' => ['o', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Esa',
                            'casa',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'that house',
                                'correct' => [
                                    'that',
                                    'house',
                                ],
                                'extra' => [
                                    'this',
                                    'book',
                                ],
                            ],
                            'az' => ['sentence' => 'o ev', 'correct' => ['o', 'ev'], 'extra' => ['bu', 'kitab']],
                            'ar' => ['sentence' => 'ذلك بيت', 'correct' => ['ذلك', 'بيت'], 'extra' => ['هذا', 'كتاب']],
                            'ru' => ['sentence' => 'тот дом', 'correct' => ['тот', 'дом'], 'extra' => ['это', 'книга']],
                            'de' => [
                                'sentence' => 'Jenes Haus',
                                'correct' => [
                                    'jener',
                                    'Haus',
                                ],
                                'extra' => [
                                    'dieser',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Cette maison',
                                'correct' => [
                                    'cette',
                                    'maison',
                                ],
                                'extra' => [
                                    'ce',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'あの家',
                                'correct' => [
                                    'あの',
                                    '家',
                                ],
                                'extra' => [
                                    'この',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저 집',
                                'correct' => [
                                    '저',
                                    '집',
                                ],
                                'extra' => [
                                    '이',
                                ],
                            ],
                            'tr' => ['sentence' => 'o ev', 'correct' => ['o', 'ev'], 'extra' => ['bu', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Este',
                            'libro',
                            'y',
                            'esa',
                            'casa',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'this book and that house',
                                'correct' => [
                                    'this',
                                    'book',
                                    'and',
                                    'that',
                                    'house',
                                ],
                                'extra' => [
                                    'cat',
                                ],
                            ],
                            'az' => ['sentence' => 'bu kitab və o ev', 'correct' => ['bu', 'kitab', 'və', 'o', 'ev'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'هذا كتاب و ذلك بيت', 'correct' => ['هذا', 'كتاب', 'و', 'ذلك', 'بيت'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'это книга и тот дом', 'correct' => ['это', 'книга', 'и', 'тот', 'дом'], 'extra' => ['кот']],
                            'de' => [
                                'sentence' => 'Dieses Buch und jenes Haus',
                                'correct' => [
                                    'dieser',
                                    'Buch',
                                    'und',
                                    'jener',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Katze',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ce livre et cette maison',
                                'correct' => [
                                    'ce',
                                    'livre',
                                    'et',
                                    'cette',
                                    'maison',
                                ],
                                'extra' => [
                                    'chat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'この本とあの家',
                                'correct' => [
                                    'この',
                                    '本',
                                    'と',
                                    'あの',
                                    '家',
                                ],
                                'extra' => [
                                    '猫',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '이 책과 저 집',
                                'correct' => [
                                    '이',
                                    '책과',
                                    '저',
                                    '집',
                                ],
                                'extra' => [
                                    '고양이',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu kitap ve o ev', 'correct' => ['bu', 'kitap', 've', 'o', 'ev'], 'extra' => ['kedi']],
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
                        'es' => 'estos',
                    ],
                    [
                        'es' => 'esos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estos',
                            'gatos',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'these cats',
                                'correct' => [
                                    'these',
                                    'cats',
                                ],
                                'extra' => [
                                    'those',
                                    'dogs',
                                ],
                            ],
                            'az' => ['sentence' => 'bunlar pişiklər', 'correct' => ['bunlar', 'pişiklər'], 'extra' => ['onlar', 'itlər']],
                            'ar' => ['sentence' => 'هذه قطط', 'correct' => ['هذه', 'قطط'], 'extra' => ['تلك', 'كلاب']],
                            'ru' => ['sentence' => 'эти коты', 'correct' => ['эти', 'коты'], 'extra' => ['те', 'собаки']],
                            'de' => [
                                'sentence' => 'Diese Katzen',
                                'correct' => [
                                    'diese',
                                    'Katzen',
                                ],
                                'extra' => [
                                    'jene',
                                    'Hunde',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ces chats',
                                'correct' => [
                                    'ces',
                                    'chats',
                                ],
                                'extra' => [
                                    'chiens',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'これらの猫',
                                'correct' => [
                                    'これらの',
                                    '猫',
                                ],
                                'extra' => [
                                    'あれらの',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '이 고양이들',
                                'correct' => [
                                    '이',
                                    '고양이들',
                                ],
                                'extra' => [
                                    '저것들',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu kediler', 'correct' => ['bu', 'kediler'], 'extra' => ['onlar', 'köpekler']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Esos',
                            'perros',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'those dogs',
                                'correct' => [
                                    'those',
                                    'dogs',
                                ],
                                'extra' => [
                                    'these',
                                    'cats',
                                ],
                            ],
                            'az' => ['sentence' => 'onlar itlər', 'correct' => ['onlar', 'itlər'], 'extra' => ['bunlar', 'pişiklər']],
                            'ar' => ['sentence' => 'تلك كلاب', 'correct' => ['تلك', 'كلاب'], 'extra' => ['هذه', 'قطط']],
                            'ru' => ['sentence' => 'те собаки', 'correct' => ['те', 'собаки'], 'extra' => ['эти', 'коты']],
                            'de' => [
                                'sentence' => 'Jene Hunde',
                                'correct' => [
                                    'jene',
                                    'Hunde',
                                ],
                                'extra' => [
                                    'diese',
                                    'Katzen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ces chiens',
                                'correct' => [
                                    'ces',
                                    'chiens',
                                ],
                                'extra' => [
                                    'chats',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'あれらの犬',
                                'correct' => [
                                    'あれらの',
                                    '犬',
                                ],
                                'extra' => [
                                    'これらの',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저 개들',
                                'correct' => [
                                    '저',
                                    '개들',
                                ],
                                'extra' => [
                                    '이것들',
                                ],
                            ],
                            'tr' => ['sentence' => 'o köpekler', 'correct' => ['o', 'köpekler'], 'extra' => ['bunlar', 'kediler']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'gato',
                            'y',
                            'un',
                            'perro',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cat and a dog',
                                'correct' => [
                                    'a',
                                    'cat',
                                    'and',
                                    'a',
                                    'dog',
                                ],
                                'extra' => [
                                    'these',
                                ],
                            ],
                            'az' => ['sentence' => 'bir pişik və bir it', 'correct' => ['bir', 'pişik', 'və', 'bir', 'it'], 'extra' => ['bunlar']],
                            'ar' => ['sentence' => 'قط و كلب', 'correct' => ['قط', 'و', 'كلب'], 'extra' => ['هذه']],
                            'ru' => ['sentence' => 'кот и собака', 'correct' => ['кот', 'и', 'собака'], 'extra' => ['эти']],
                            'de' => [
                                'sentence' => 'Eine Katze und ein Hund',
                                'correct' => [
                                    'eine',
                                    'Katze',
                                    'und',
                                    'ein',
                                    'Hund',
                                ],
                                'extra' => [
                                    'diese',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chat et un chien',
                                'correct' => [
                                    'un',
                                    'chat',
                                    'et',
                                    'un',
                                    'chien',
                                ],
                                'extra' => [
                                    'ces',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '猫と犬',
                                'correct' => [
                                    '猫',
                                    'と',
                                    '犬',
                                ],
                                'extra' => [
                                    'これらの',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고양이와 개',
                                'correct' => [
                                    '고양이와',
                                    '개',
                                ],
                                'extra' => [
                                    '이것들',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kedi ve bir köpek', 'correct' => ['bir', 'kedi', 've', 'bir', 'köpek'], 'extra' => ['bunlar']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
