<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner10Seeder extends Seeder
{
    private const PICTURES = [
        '本' => 'book',
        'りんご' => 'apple',
        '猫' => 'cat',
        '犬' => 'dog',
        '家' => 'house',
        'テーブル' => 'table',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 10, the Japanese twin of the
     * English "Unit 10: A, The, This & These" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'ユニット10: 文法: 冠詞と指示詞', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 本・りんご', 1,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'ja' => '一つの',
                    ],
                    [
                        'ja' => '一つの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '一冊',
                            'の',
                            '本',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'りんご',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '本',
                            'と',
                            'りんご',
                        ],
                        'blank' => 2,
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
                        'ja' => 'その',
                    ],
                    [
                        'ja' => '少しの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'その',
                            '猫',
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
                                ],
                            ],
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '少しの',
                            '水',
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
                                ],
                            ],
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '犬',
                            'と',
                            '猫',
                        ],
                        'blank' => 1,
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 猫・本', 3,
                pictures: [
                    [
                        'ja' => '猫',
                        'img' => 'cat',
                    ],
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'ja' => '猫',
                    ],
                    [
                        'ja' => '本',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '猫',
                            '二匹',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'two cats',
                                'correct' => [
                                    'two',
                                    'cats',
                                ],
                                'extra' => [
                                    'book',
                                ],
                            ],
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '本',
                            '三冊',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'three books',
                                'correct' => [
                                    'three',
                                    'books',
                                ],
                                'extra' => [
                                    'cat',
                                ],
                            ],
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '猫',
                            'と',
                            '本',
                        ],
                        'blank' => 1,
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
                                    'two',
                                ],
                            ],
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 本・家', 4,
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
                        'ja' => 'この',
                    ],
                    [
                        'ja' => 'あの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'この',
                            '本',
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
                                ],
                            ],
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'あの',
                            '家',
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
                                ],
                            ],
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'この',
                            '本',
                            'と',
                            'あの',
                            '家',
                        ],
                        'blank' => 3,
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
                        'ja' => 'これらの',
                    ],
                    [
                        'ja' => 'あれらの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'これらの',
                            '猫',
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
                                ],
                            ],
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'あれらの',
                            '犬',
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
                                ],
                            ],
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '猫',
                            'と',
                            '犬',
                        ],
                        'blank' => 1,
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
                        ],
                    ],
                ],
            ),
        ];
    }
}
