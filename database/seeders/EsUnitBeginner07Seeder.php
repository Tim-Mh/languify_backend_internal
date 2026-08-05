<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner07Seeder extends Seeder
{
    private const PICTURES = [
        'grande' => 'big',
        'pequeño' => 'small',
        'caliente' => 'hot',
        'frío' => 'cold',
        'casa' => 'house',
        'libro' => 'book',
        'parque' => 'park',
        'mesa' => 'table',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 7, the Spanish twin of the
     * English "Unit 7: Describing Things" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unidad 7: Describir cosas', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Grande y Pequeño', 1,
                pictures: [
                    [
                        'es' => 'grande',
                        'img' => 'big',
                    ],
                    [
                        'es' => 'pequeño',
                        'img' => 'small',
                    ],
                ],
                plain: [
                    [
                        'es' => 'casa',
                    ],
                    [
                        'es' => 'gato',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'casa',
                            'grande',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a big house',
                                'correct' => [
                                    'a',
                                    'big',
                                    'house',
                                ],
                                'extra' => [
                                    'small',
                                    'cat',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein großes Haus',
                                'correct' => [
                                    'ein',
                                    'groß',
                                    'Haus',
                                ],
                                'extra' => [
                                    'klein',
                                    'Katze',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une grande maison',
                                'correct' => [
                                    'une',
                                    'maison',
                                    'grand',
                                ],
                                'extra' => [
                                    'petit',
                                    'chat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '大きい家',
                                'correct' => [
                                    '大きい',
                                    '家',
                                ],
                                'extra' => [
                                    '小さい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '큰 집',
                                'correct' => [
                                    '큰',
                                    '집',
                                ],
                                'extra' => [
                                    '작은',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'gato',
                            'pequeño',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a small cat',
                                'correct' => [
                                    'a',
                                    'small',
                                    'cat',
                                ],
                                'extra' => [
                                    'big',
                                    'house',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine kleine Katze',
                                'correct' => [
                                    'eine',
                                    'klein',
                                    'Katze',
                                ],
                                'extra' => [
                                    'groß',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un petit chat',
                                'correct' => [
                                    'un',
                                    'petit',
                                    'chat',
                                ],
                                'extra' => [
                                    'grand',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '小さい猫',
                                'correct' => [
                                    '小さい',
                                    '猫',
                                ],
                                'extra' => [
                                    '大きい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '작은 고양이',
                                'correct' => [
                                    '작은',
                                    '고양이',
                                ],
                                'extra' => [
                                    '큰',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Una',
                            'casa',
                            'grande',
                            'y',
                            'un',
                            'gato',
                            'pequeño',
                        ],
                        'blank' => 6,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a big house and a small cat',
                                'correct' => [
                                    'a',
                                    'big',
                                    'house',
                                    'and',
                                    'a',
                                    'small',
                                    'cat',
                                ],
                                'extra' => [
                                    'hot',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein großes Haus und eine kleine Katze',
                                'correct' => [
                                    'ein',
                                    'groß',
                                    'Haus',
                                    'und',
                                    'eine',
                                    'klein',
                                    'Katze',
                                ],
                                'extra' => [
                                    'heiß',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une grande maison et un petit chat',
                                'correct' => [
                                    'une',
                                    'maison',
                                    'grand',
                                    'et',
                                    'un',
                                    'chat',
                                    'petit',
                                ],
                                'extra' => [
                                    'chaud',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '大きい家と小さい猫',
                                'correct' => [
                                    '大きい',
                                    '家',
                                    'と',
                                    '小さい',
                                    '猫',
                                ],
                                'extra' => [
                                    '熱い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '큰 집과 작은 고양이',
                                'correct' => [
                                    '큰',
                                    '집과',
                                    '작은',
                                    '고양이',
                                ],
                                'extra' => [
                                    '뜨거운',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Caliente y Frío', 2,
                pictures: [
                    [
                        'es' => 'caliente',
                        'img' => 'hot',
                    ],
                    [
                        'es' => 'frío',
                        'img' => 'cold',
                    ],
                ],
                plain: [
                    [
                        'es' => 'café',
                    ],
                    [
                        'es' => 'agua',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Café',
                            'caliente',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'hot coffee',
                                'correct' => [
                                    'hot',
                                    'coffee',
                                ],
                                'extra' => [
                                    'cold',
                                    'water',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Heißer Kaffee',
                                'correct' => [
                                    'heiß',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'kalt',
                                    'Wasser',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café chaud',
                                'correct' => [
                                    'chaud',
                                    'café',
                                ],
                                'extra' => [
                                    'froid',
                                    'eau',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '熱いコーヒー',
                                'correct' => [
                                    '熱い',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    '冷たい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '뜨거운 커피',
                                'correct' => [
                                    '뜨거운',
                                    '커피',
                                ],
                                'extra' => [
                                    '차가운',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Agua',
                            'fría',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'cold water',
                                'correct' => [
                                    'cold',
                                    'water',
                                ],
                                'extra' => [
                                    'hot',
                                    'coffee',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Kaltes Wasser',
                                'correct' => [
                                    'kalt',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'heiß',
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'De l\'eau froide',
                                'correct' => [
                                    'froid',
                                    'eau',
                                ],
                                'extra' => [
                                    'chaud',
                                    'café',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '冷たい水',
                                'correct' => [
                                    '冷たい',
                                    '水',
                                ],
                                'extra' => [
                                    '熱い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '차가운 물',
                                'correct' => [
                                    '차가운',
                                    '물',
                                ],
                                'extra' => [
                                    '뜨거운',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Café',
                            'caliente',
                            'y',
                            'agua',
                            'fría',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'hot coffee and cold water',
                                'correct' => [
                                    'hot',
                                    'coffee',
                                    'and',
                                    'cold',
                                    'water',
                                ],
                                'extra' => [
                                    'big',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Heißer Kaffee und kaltes Wasser',
                                'correct' => [
                                    'heiß',
                                    'Kaffee',
                                    'und',
                                    'kalt',
                                    'Wasser',
                                ],
                                'extra' => [
                                    'groß',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café chaud et de l\'eau froide',
                                'correct' => [
                                    'chaud',
                                    'café',
                                    'et',
                                    'froid',
                                    'eau',
                                ],
                                'extra' => [
                                    'grand',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '熱いコーヒーと冷たい水',
                                'correct' => [
                                    '熱い',
                                    'コーヒー',
                                    'と',
                                    '冷たい',
                                    '水',
                                ],
                                'extra' => [
                                    '大きい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '뜨거운 커피와 차가운 물',
                                'correct' => [
                                    '뜨거운',
                                    '커피와',
                                    '차가운',
                                    '물',
                                ],
                                'extra' => [
                                    '큰',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Casa y Parque', 3,
                pictures: [
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'es' => 'hermoso',
                    ],
                    [
                        'es' => 'bonito',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'casa',
                            'hermosa',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a beautiful house',
                                'correct' => [
                                    'a',
                                    'beautiful',
                                    'house',
                                ],
                                'extra' => [
                                    'pretty',
                                    'park',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein schönes Haus',
                                'correct' => [
                                    'ein',
                                    'schön',
                                    'Haus',
                                ],
                                'extra' => [
                                    'hübsch',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une belle maison',
                                'correct' => [
                                    'une',
                                    'maison',
                                    'beau',
                                ],
                                'extra' => [
                                    'joli',
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '美しい家',
                                'correct' => [
                                    '美しい',
                                    '家',
                                ],
                                'extra' => [
                                    'かわいい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '아름다운 집',
                                'correct' => [
                                    '아름다운',
                                    '집',
                                ],
                                'extra' => [
                                    '예쁜',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'parque',
                            'bonito',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a pretty park',
                                'correct' => [
                                    'a',
                                    'pretty',
                                    'park',
                                ],
                                'extra' => [
                                    'beautiful',
                                    'house',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein hübscher Park',
                                'correct' => [
                                    'ein',
                                    'hübsch',
                                    'Park',
                                ],
                                'extra' => [
                                    'schön',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un joli parc',
                                'correct' => [
                                    'un',
                                    'joli',
                                    'parc',
                                ],
                                'extra' => [
                                    'beau',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'かわいい公園',
                                'correct' => [
                                    'かわいい',
                                    '公園',
                                ],
                                'extra' => [
                                    '美しい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '예쁜 공원',
                                'correct' => [
                                    '예쁜',
                                    '공원',
                                ],
                                'extra' => [
                                    '아름다운',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'parque',
                            'hermoso',
                            'y',
                            'bonito',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a beautiful and pretty park',
                                'correct' => [
                                    'a',
                                    'beautiful',
                                    'and',
                                    'pretty',
                                    'park',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein schöner und hübscher Park',
                                'correct' => [
                                    'ein',
                                    'schön',
                                    'und',
                                    'hübsch',
                                    'Park',
                                ],
                                'extra' => [
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un parc beau et joli',
                                'correct' => [
                                    'un',
                                    'parc',
                                    'beau',
                                    'et',
                                    'joli',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '美しくてかわいい公園',
                                'correct' => [
                                    '美しくて',
                                    'かわいい',
                                    '公園',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '아름답고 예쁜 공원',
                                'correct' => [
                                    '아름답고',
                                    '예쁜',
                                    '공원',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Libro y Mesa', 4,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'mesa',
                        'img' => 'table',
                    ],
                ],
                plain: [
                    [
                        'es' => 'fácil',
                    ],
                    [
                        'es' => 'difícil',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'libro',
                            'fácil',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an easy book',
                                'correct' => [
                                    'an',
                                    'easy',
                                    'book',
                                ],
                                'extra' => [
                                    'hard',
                                    'table',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein einfaches Buch',
                                'correct' => [
                                    'ein',
                                    'einfach',
                                    'Buch',
                                ],
                                'extra' => [
                                    'schwer',
                                    'Tisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un livre facile',
                                'correct' => [
                                    'un',
                                    'livre',
                                    'facile',
                                ],
                                'extra' => [
                                    'difficile',
                                    'table',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '簡単な本',
                                'correct' => [
                                    '簡単な',
                                    '本',
                                ],
                                'extra' => [
                                    '難しい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '쉬운 책',
                                'correct' => [
                                    '쉬운',
                                    '책',
                                ],
                                'extra' => [
                                    '어려운',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'mesa',
                            'dura',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a hard table',
                                'correct' => [
                                    'a',
                                    'hard',
                                    'table',
                                ],
                                'extra' => [
                                    'easy',
                                    'book',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein harter Tisch',
                                'correct' => [
                                    'ein',
                                    'schwer',
                                    'Tisch',
                                ],
                                'extra' => [
                                    'einfach',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une table dure',
                                'correct' => [
                                    'une',
                                    'table',
                                    'difficile',
                                ],
                                'extra' => [
                                    'facile',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '硬いテーブル',
                                'correct' => [
                                    '硬い',
                                    'テーブル',
                                ],
                                'extra' => [
                                    '簡単',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '단단한 탁자',
                                'correct' => [
                                    '단단한',
                                    '탁자',
                                ],
                                'extra' => [
                                    '쉬운',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Fácil',
                            'o',
                            'difícil',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'easy or hard',
                                'correct' => [
                                    'easy',
                                    'or',
                                    'hard',
                                ],
                                'extra' => [
                                    'book',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einfach oder schwer',
                                'correct' => [
                                    'einfach',
                                    'oder',
                                    'schwer',
                                ],
                                'extra' => [
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Facile ou difficile',
                                'correct' => [
                                    'facile',
                                    'ou',
                                    'difficile',
                                ],
                                'extra' => [
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '簡単か難しい',
                                'correct' => [
                                    '簡単',
                                    'か',
                                    '難しい',
                                ],
                                'extra' => [
                                    '本',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '쉽거나 어려운',
                                'correct' => [
                                    '쉽거나',
                                    '어려운',
                                ],
                                'extra' => [
                                    '책',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Libro y Casa', 5,
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
                        'es' => 'bueno',
                    ],
                    [
                        'es' => 'nuevo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'buen',
                            'libro',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a good book',
                                'correct' => [
                                    'a',
                                    'good',
                                    'book',
                                ],
                                'extra' => [
                                    'new',
                                    'house',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein gutes Buch',
                                'correct' => [
                                    'ein',
                                    'gut',
                                    'Buch',
                                ],
                                'extra' => [
                                    'neu',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un bon livre',
                                'correct' => [
                                    'un',
                                    'bon',
                                    'livre',
                                ],
                                'extra' => [
                                    'nouveau',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '良い本',
                                'correct' => [
                                    '良い',
                                    '本',
                                ],
                                'extra' => [
                                    '新しい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '좋은 책',
                                'correct' => [
                                    '좋은',
                                    '책',
                                ],
                                'extra' => [
                                    '새로운',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'casa',
                            'nueva',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a new house',
                                'correct' => [
                                    'a',
                                    'new',
                                    'house',
                                ],
                                'extra' => [
                                    'good',
                                    'book',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein neues Haus',
                                'correct' => [
                                    'ein',
                                    'neu',
                                    'Haus',
                                ],
                                'extra' => [
                                    'gut',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une nouvelle maison',
                                'correct' => [
                                    'une',
                                    'maison',
                                    'nouveau',
                                ],
                                'extra' => [
                                    'bon',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '新しい家',
                                'correct' => [
                                    '新しい',
                                    '家',
                                ],
                                'extra' => [
                                    '良い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '새 집',
                                'correct' => [
                                    '새',
                                    '집',
                                ],
                                'extra' => [
                                    '좋은',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'libro',
                            'bueno',
                            'y',
                            'nuevo',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a good and new book',
                                'correct' => [
                                    'a',
                                    'good',
                                    'and',
                                    'new',
                                    'book',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein gutes und neues Buch',
                                'correct' => [
                                    'ein',
                                    'gut',
                                    'und',
                                    'neu',
                                    'Buch',
                                ],
                                'extra' => [
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un bon et nouveau livre',
                                'correct' => [
                                    'un',
                                    'bon',
                                    'et',
                                    'nouveau',
                                    'livre',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '良くて新しい本',
                                'correct' => [
                                    '良くて',
                                    '新しい',
                                    '本',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '좋고 새로운 책',
                                'correct' => [
                                    '좋고',
                                    '새로운',
                                    '책',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
