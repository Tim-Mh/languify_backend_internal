<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner07Seeder extends Seeder
{
    private const PICTURES = [
        '大きい' => 'big',
        '小さい' => 'small',
        '熱い' => 'hot',
        '冷たい' => 'cold',
        '家' => 'house',
        '本' => 'book',
        '公園' => 'park',
        'テーブル' => 'table',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 7, the Japanese twin of the
     * English "Unit 7: Describing Things" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'ユニット7: 物の描写', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 大きい・小さい', 1,
                pictures: [
                    [
                        'ja' => '大きい',
                        'img' => 'big',
                    ],
                    [
                        'ja' => '小さい',
                        'img' => 'small',
                    ],
                ],
                plain: [
                    [
                        'ja' => '家',
                    ],
                    [
                        'ja' => '猫',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '大きい',
                            '家',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una casa grande',
                                'correct' => [
                                    'una',
                                    'casa',
                                    'grande',
                                ],
                                'extra' => [
                                    'pequeño',
                                    'gato',
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
                            '小さい',
                            '猫',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un gato pequeño',
                                'correct' => [
                                    'un',
                                    'gato',
                                    'pequeño',
                                ],
                                'extra' => [
                                    'grande',
                                    'casa',
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
                            '大きい',
                            '家',
                            'と',
                            '小さい',
                            '猫',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Una casa grande y un gato pequeño',
                                'correct' => [
                                    'una',
                                    'casa',
                                    'grande',
                                    'y',
                                    'un',
                                    'gato',
                                    'pequeño',
                                ],
                                'extra' => [
                                    'caliente',
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
            $builder->lesson('レッスン2: 熱い・冷たい', 2,
                pictures: [
                    [
                        'ja' => '熱い',
                        'img' => 'hot',
                    ],
                    [
                        'ja' => '冷たい',
                        'img' => 'cold',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'コーヒー',
                    ],
                    [
                        'ja' => '水',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '熱い',
                            'コーヒー',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'hot coffee',
                                'correct' => [
                                    'hot',
                                    'coffee',
                                ],
                                'extra' => [
                                    'cold',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Café caliente',
                                'correct' => [
                                    'café',
                                    'caliente',
                                ],
                                'extra' => [
                                    'frío',
                                    'agua',
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
                            '冷たい',
                            '水',
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Agua fría',
                                'correct' => [
                                    'frío',
                                    'agua',
                                ],
                                'extra' => [
                                    'caliente',
                                    'café',
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
                            '熱い',
                            'コーヒー',
                            'と',
                            '冷たい',
                            '水',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Café caliente y agua fría',
                                'correct' => [
                                    'caliente',
                                    'café',
                                    'y',
                                    'frío',
                                    'agua',
                                ],
                                'extra' => [
                                    'grande',
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
            $builder->lesson('レッスン3: 家・公園', 3,
                pictures: [
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'ja' => '美しい',
                    ],
                    [
                        'ja' => 'かわいい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '美しい',
                            '家',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una casa hermosa',
                                'correct' => [
                                    'una',
                                    'hermoso',
                                    'casa',
                                ],
                                'extra' => [
                                    'bonito',
                                    'parque',
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
                            'かわいい',
                            '公園',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un parque bonito',
                                'correct' => [
                                    'un',
                                    'parque',
                                    'bonito',
                                ],
                                'extra' => [
                                    'hermoso',
                                    'casa',
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
                            '美しくて',
                            'かわいい',
                            '公園',
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
                            'es' => [
                                'sentence' => 'Un parque hermoso y bonito',
                                'correct' => [
                                    'un',
                                    'parque',
                                    'hermoso',
                                    'y',
                                    'bonito',
                                ],
                                'extra' => [
                                    'casa',
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
            $builder->lesson('レッスン4: 本・テーブル', 4,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'テーブル',
                        'img' => 'table',
                    ],
                ],
                plain: [
                    [
                        'ja' => '簡単',
                    ],
                    [
                        'ja' => '難しい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '簡単な',
                            '本',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un libro fácil',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'fácil',
                                ],
                                'extra' => [
                                    'difícil',
                                    'mesa',
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
                            '硬い',
                            'テーブル',
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una mesa dura',
                                'correct' => [
                                    'una',
                                    'difícil',
                                    'mesa',
                                ],
                                'extra' => [
                                    'fácil',
                                    'libro',
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
                            '簡単',
                            'か',
                            '難しい',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Fácil o difícil',
                                'correct' => [
                                    'fácil',
                                    'o',
                                    'difícil',
                                ],
                                'extra' => [
                                    'libro',
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
            $builder->lesson('レッスン5: 本・家', 5,
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
                        'ja' => '良い',
                    ],
                    [
                        'ja' => '新しい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '良い',
                            '本',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un buen libro',
                                'correct' => [
                                    'un',
                                    'bueno',
                                    'libro',
                                ],
                                'extra' => [
                                    'nuevo',
                                    'casa',
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
                            '新しい',
                            '家',
                        ],
                        'blank' => 0,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una casa nueva',
                                'correct' => [
                                    'una',
                                    'nuevo',
                                    'casa',
                                ],
                                'extra' => [
                                    'bueno',
                                    'libro',
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
                            '良くて',
                            '新しい',
                            '本',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Un libro bueno y nuevo',
                                'correct' => [
                                    'un',
                                    'libro',
                                    'bueno',
                                    'y',
                                    'nuevo',
                                ],
                                'extra' => [
                                    'casa',
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
