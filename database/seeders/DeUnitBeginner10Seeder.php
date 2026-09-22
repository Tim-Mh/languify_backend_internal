<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner10Seeder extends Seeder
{
    private const PICTURES = [
        'Buch' => 'book',
        'Apfel' => 'apple',
        'Katze' => 'cat',
        'Hund' => 'dog',
        'Haus' => 'house',
        'Tisch' => 'table',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 10, the German twin of the
     * English "Unit 10: A, The, This & These" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Einheit 10: Grammatik: ein, der, dieser', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Buch & Apfel', 1,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ein',
                    ],
                    [
                        'de' => 'ein',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Buch',
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
                            'es' => [
                                'sentence' => 'Un libro',
                                'correct' => [
                                    'un',
                                    'libro',
                                ],
                                'extra' => [
                                    'manzana',
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
                            'Ein',
                            'Apfel',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'Una manzana',
                                'correct' => [
                                    'un',
                                    'manzana',
                                ],
                                'extra' => [
                                    'libro',
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
                            'Ein',
                            'Buch',
                            'und',
                            'ein',
                            'Apfel',
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
                            'es' => [
                                'sentence' => 'Un libro y una manzana',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'y',
                                    'un',
                                    'manzana',
                                ],
                                'extra' => [
                                    'gato',
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
                        'de' => 'der',
                    ],
                    [
                        'de' => 'etwas',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Katze',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'El gato',
                                'correct' => [
                                    'el',
                                    'gato',
                                ],
                                'extra' => [
                                    'perro',
                                    'algo de',
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
                            'Etwas',
                            'Wasser',
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
                            'es' => [
                                'sentence' => 'Algo de agua',
                                'correct' => [
                                    'algo de',
                                    'agua',
                                ],
                                'extra' => [
                                    'el',
                                    'gato',
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
                            'Der',
                            'Hund',
                            'und',
                            'die',
                            'Katze',
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
                            'es' => [
                                'sentence' => 'El perro y el gato',
                                'correct' => [
                                    'el',
                                    'perro',
                                    'y',
                                    'el',
                                    'gato',
                                ],
                                'extra' => [
                                    'algo de',
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
            $builder->lesson('Lektion 3: Katze & Buch', 3,
                pictures: [
                    [
                        'de' => 'Katze',
                        'img' => 'cat',
                    ],
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Katzen',
                    ],
                    [
                        'de' => 'Bücher',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Zwei',
                            'Katzen',
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
                            'es' => [
                                'sentence' => 'Dos gatos',
                                'correct' => [
                                    'dos',
                                    'gatos',
                                ],
                                'extra' => [
                                    'libros',
                                    'uno',
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
                            'Drei',
                            'Bücher',
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
                            'es' => [
                                'sentence' => 'Tres libros',
                                'correct' => [
                                    'tres',
                                    'libros',
                                ],
                                'extra' => [
                                    'gatos',
                                    'dos',
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
                            'Eine',
                            'Katze',
                            'und',
                            'ein',
                            'Buch',
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
                            'es' => [
                                'sentence' => 'Un gato y un libro',
                                'correct' => [
                                    'un',
                                    'gato',
                                    'y',
                                    'un',
                                    'libro',
                                ],
                                'extra' => [
                                    'gatos',
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
            $builder->lesson('Lektion 4: Buch & Haus', 4,
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
                        'de' => 'dieser',
                    ],
                    [
                        'de' => 'jener',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Dieses',
                            'Buch',
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
                            'es' => [
                                'sentence' => 'Este libro',
                                'correct' => [
                                    'este',
                                    'libro',
                                ],
                                'extra' => [
                                    'ese',
                                    'casa',
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
                            'Jenes',
                            'Haus',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'Esa casa',
                                'correct' => [
                                    'ese',
                                    'casa',
                                ],
                                'extra' => [
                                    'este',
                                    'libro',
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
                            'Dieses',
                            'Buch',
                            'und',
                            'jenes',
                            'Haus',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'Este libro y esa casa',
                                'correct' => [
                                    'este',
                                    'libro',
                                    'y',
                                    'ese',
                                    'casa',
                                ],
                                'extra' => [
                                    'gato',
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
                        'de' => 'diese',
                    ],
                    [
                        'de' => 'jene',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Diese',
                            'Katzen',
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
                            'es' => [
                                'sentence' => 'Estos gatos',
                                'correct' => [
                                    'estos',
                                    'gatos',
                                ],
                                'extra' => [
                                    'esos',
                                    'perros',
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
                            'Jene',
                            'Hunde',
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
                            'es' => [
                                'sentence' => 'Esos perros',
                                'correct' => [
                                    'esos',
                                    'perros',
                                ],
                                'extra' => [
                                    'estos',
                                    'gatos',
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
                            'Eine',
                            'Katze',
                            'und',
                            'ein',
                            'Hund',
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
                            'es' => [
                                'sentence' => 'Un gato y un perro',
                                'correct' => [
                                    'un',
                                    'gato',
                                    'y',
                                    'un',
                                    'perro',
                                ],
                                'extra' => [
                                    'estos',
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
