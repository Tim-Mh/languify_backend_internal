<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner04Seeder extends Seeder
{
    private const PICTURES = [
        'Tisch' => 'table',
        'Stuhl' => 'chair',
        'Haus' => 'house',
        'Katze' => 'cat',
        'Hund' => 'dog',
        'Buch' => 'book',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 4, the German twin of the
     * English "Unit 4: Home & Objects" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Einheit 4: Zuhause & Dinge', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Tisch & Stuhl', 1,
                pictures: [
                    [
                        'de' => 'Tisch',
                        'img' => 'table',
                    ],
                    [
                        'de' => 'Stuhl',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'de' => 'der',
                    ],
                    [
                        'de' => 'und',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Tisch',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the table',
                                'correct' => [
                                    'the',
                                    'table',
                                ],
                                'extra' => [
                                    'chair',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La mesa',
                                'correct' => [
                                    'la',
                                    'mesa',
                                ],
                                'extra' => [
                                    'silla',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La table',
                                'correct' => [
                                    'la',
                                    'table',
                                ],
                                'extra' => [
                                    'chaise',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'そのテーブル',
                                'correct' => [
                                    'その',
                                    'テーブル',
                                ],
                                'extra' => [
                                    '椅子',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그 탁자',
                                'correct' => [
                                    '그',
                                    '탁자',
                                ],
                                'extra' => [
                                    '의자',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Stuhl',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chair',
                                'correct' => [
                                    'the',
                                    'chair',
                                ],
                                'extra' => [
                                    'table',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La silla',
                                'correct' => [
                                    'la',
                                    'silla',
                                ],
                                'extra' => [
                                    'mesa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La chaise',
                                'correct' => [
                                    'la',
                                    'chaise',
                                ],
                                'extra' => [
                                    'table',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'その椅子',
                                'correct' => [
                                    'その',
                                    '椅子',
                                ],
                                'extra' => [
                                    'テーブル',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그 의자',
                                'correct' => [
                                    '그',
                                    '의자',
                                ],
                                'extra' => [
                                    '탁자',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'Tisch',
                            'und',
                            'der',
                            'Stuhl',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the table and the chair',
                                'correct' => [
                                    'the',
                                    'table',
                                    'and',
                                    'the',
                                    'chair',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La mesa y la silla',
                                'correct' => [
                                    'la',
                                    'mesa',
                                    'y',
                                    'la',
                                    'silla',
                                ],
                                'extra' => [
                                    'casa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La table et la chaise',
                                'correct' => [
                                    'la',
                                    'table',
                                    'et',
                                    'la',
                                    'chaise',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'テーブルと椅子',
                                'correct' => [
                                    'テーブル',
                                    'と',
                                    '椅子',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '탁자와 의자',
                                'correct' => [
                                    '탁자와',
                                    '의자',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Katze & Tisch', 2,
                pictures: [
                    [
                        'de' => 'Katze',
                        'img' => 'cat',
                    ],
                    [
                        'de' => 'Tisch',
                        'img' => 'table',
                    ],
                ],
                plain: [
                    [
                        'de' => 'in',
                    ],
                    [
                        'de' => 'auf',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Katze',
                            'auf',
                            'dem',
                            'Tisch',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cat on the table',
                                'correct' => [
                                    'the',
                                    'cat',
                                    'on',
                                    'the',
                                    'table',
                                ],
                                'extra' => [
                                    'in',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El gato sobre la mesa',
                                'correct' => [
                                    'el',
                                    'gato',
                                    'sobre',
                                    'la',
                                    'mesa',
                                ],
                                'extra' => [
                                    'en',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chat sur la table',
                                'correct' => [
                                    'le',
                                    'chat',
                                    'sur',
                                    'la',
                                    'table',
                                ],
                                'extra' => [
                                    'dans',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'テーブルの上の猫',
                                'correct' => [
                                    'テーブル',
                                    'の',
                                    '上',
                                    'の',
                                    '猫',
                                ],
                                'extra' => [
                                    'の中に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '탁자 위의 고양이',
                                'correct' => [
                                    '탁자',
                                    '위의',
                                    '고양이',
                                ],
                                'extra' => [
                                    '안에',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Die',
                            'Katze',
                            'im',
                            'Haus',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cat in the house',
                                'correct' => [
                                    'the',
                                    'cat',
                                    'in',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'on',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El gato en la casa',
                                'correct' => [
                                    'el',
                                    'gato',
                                    'en',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'sobre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chat dans la maison',
                                'correct' => [
                                    'le',
                                    'chat',
                                    'dans',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'sur',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家の中の猫',
                                'correct' => [
                                    '家',
                                    'の',
                                    '中',
                                    'の',
                                    '猫',
                                ],
                                'extra' => [
                                    'の上に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집 안의 고양이',
                                'correct' => [
                                    '집',
                                    '안의',
                                    '고양이',
                                ],
                                'extra' => [
                                    '위에',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Auf',
                            'dem',
                            'Tisch',
                            'oder',
                            'im',
                            'Haus',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'on the table or in the house',
                                'correct' => [
                                    'on',
                                    'the',
                                    'table',
                                    'or',
                                    'in',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'cat',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Sobre la mesa o en la casa',
                                'correct' => [
                                    'sobre',
                                    'la',
                                    'mesa',
                                    'o',
                                    'en',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'gato',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Sur la table ou dans la maison',
                                'correct' => [
                                    'sur',
                                    'la',
                                    'table',
                                    'ou',
                                    'dans',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'chat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'テーブルの上か家の中',
                                'correct' => [
                                    'テーブル',
                                    'の',
                                    '上',
                                    'か',
                                    '家',
                                    'の',
                                    '中',
                                ],
                                'extra' => [
                                    '猫',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '탁자 위 또는 집 안',
                                'correct' => [
                                    '탁자',
                                    '위',
                                    '또는',
                                    '집',
                                    '안',
                                ],
                                'extra' => [
                                    '고양이',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Hund & Katze', 3,
                pictures: [
                    [
                        'de' => 'Hund',
                        'img' => 'dog',
                    ],
                    [
                        'de' => 'Katze',
                        'img' => 'cat',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich habe',
                    ],
                    [
                        'de' => 'ein',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'habe',
                            'einen',
                            'Hund',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I have a dog',
                                'correct' => [
                                    'I have',
                                    'a',
                                    'dog',
                                ],
                                'extra' => [
                                    'cat',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Tengo un perro',
                                'correct' => [
                                    'tengo',
                                    'un',
                                    'perro',
                                ],
                                'extra' => [
                                    'gato',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai un chien',
                                'correct' => [
                                    'j\'ai',
                                    'un',
                                    'chien',
                                ],
                                'extra' => [
                                    'chat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は犬を飼っています',
                                'correct' => [
                                    '私',
                                    'は',
                                    '犬',
                                    'を',
                                    '飼っています',
                                ],
                                'extra' => [
                                    '猫',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 개를 키웁니다',
                                'correct' => [
                                    '나는',
                                    '개를',
                                    '키웁니다',
                                ],
                                'extra' => [
                                    '고양이',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'habe',
                            'eine',
                            'Katze',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I have a cat',
                                'correct' => [
                                    'I have',
                                    'a',
                                    'cat',
                                ],
                                'extra' => [
                                    'dog',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Tengo un gato',
                                'correct' => [
                                    'tengo',
                                    'un',
                                    'gato',
                                ],
                                'extra' => [
                                    'perro',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai un chat',
                                'correct' => [
                                    'j\'ai',
                                    'un',
                                    'chat',
                                ],
                                'extra' => [
                                    'chien',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は猫を飼っています',
                                'correct' => [
                                    '私',
                                    'は',
                                    '猫',
                                    'を',
                                    '飼っています',
                                ],
                                'extra' => [
                                    '犬',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 고양이를 키웁니다',
                                'correct' => [
                                    '나는',
                                    '고양이를',
                                    '키웁니다',
                                ],
                                'extra' => [
                                    '개',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ich',
                            'habe',
                            'eine',
                            'Katze',
                            'und',
                            'einen',
                            'Hund',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I have a cat and a dog',
                                'correct' => [
                                    'I have',
                                    'a',
                                    'cat',
                                    'and',
                                    'a',
                                    'dog',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Tengo un gato y un perro',
                                'correct' => [
                                    'tengo',
                                    'un',
                                    'gato',
                                    'y',
                                    'un',
                                    'perro',
                                ],
                                'extra' => [
                                    'casa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai un chat et un chien',
                                'correct' => [
                                    'j\'ai',
                                    'un',
                                    'chat',
                                    'et',
                                    'un',
                                    'chien',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は猫と犬を飼っています',
                                'correct' => [
                                    '私',
                                    'は',
                                    '猫',
                                    'と',
                                    '犬',
                                    'を',
                                    '飼っています',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 고양이와 개를 키웁니다',
                                'correct' => [
                                    '나는',
                                    '고양이와',
                                    '개를',
                                    '키웁니다',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Haus & Hund', 4,
                pictures: [
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                    [
                        'de' => 'Hund',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wo ist',
                    ],
                    [
                        'de' => 'unter',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Wo',
                            'ist',
                            'der',
                            'Hund',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'where is the dog',
                                'correct' => [
                                    'where is',
                                    'the',
                                    'dog',
                                ],
                                'extra' => [
                                    'house',
                                    'under',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Dónde está el perro',
                                'correct' => [
                                    'dónde está',
                                    'el',
                                    'perro',
                                ],
                                'extra' => [
                                    'casa',
                                    'debajo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Où est le chien',
                                'correct' => [
                                    'où est',
                                    'le',
                                    'chien',
                                ],
                                'extra' => [
                                    'maison',
                                    'sous',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '犬はどこですか',
                                'correct' => [
                                    '犬',
                                    'は',
                                    'どこですか',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '개는 어디입니까',
                                'correct' => [
                                    '개는',
                                    '어디입니까',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Hund',
                            'unter',
                            'dem',
                            'Tisch',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the dog under the table',
                                'correct' => [
                                    'the',
                                    'dog',
                                    'under',
                                    'the',
                                    'table',
                                ],
                                'extra' => [
                                    'where is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El perro debajo de la mesa',
                                'correct' => [
                                    'el',
                                    'perro',
                                    'debajo',
                                    'la',
                                    'mesa',
                                ],
                                'extra' => [
                                    'dónde está',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chien sous la table',
                                'correct' => [
                                    'le',
                                    'chien',
                                    'sous',
                                    'la',
                                    'table',
                                ],
                                'extra' => [
                                    'où est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'テーブルの下の犬',
                                'correct' => [
                                    'テーブル',
                                    'の',
                                    '下',
                                    'の',
                                    '犬',
                                ],
                                'extra' => [
                                    'どこですか',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '탁자 아래의 개',
                                'correct' => [
                                    '탁자',
                                    '아래의',
                                    '개',
                                ],
                                'extra' => [
                                    '어디입니까',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Wo',
                            'ist',
                            'das',
                            'Haus',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'where is the house',
                                'correct' => [
                                    'where is',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'dog',
                                    'under',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Dónde está la casa',
                                'correct' => [
                                    'dónde está',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'perro',
                                    'debajo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Où est la maison',
                                'correct' => [
                                    'où est',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'chien',
                                    'sous',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家はどこですか',
                                'correct' => [
                                    '家',
                                    'は',
                                    'どこですか',
                                ],
                                'extra' => [
                                    '犬',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집은 어디입니까',
                                'correct' => [
                                    '집은',
                                    '어디입니까',
                                ],
                                'extra' => [
                                    '개',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Haus & Stuhl', 5,
                pictures: [
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                    [
                        'de' => 'Stuhl',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'de' => 'hier ist',
                    ],
                    [
                        'de' => 'mein',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hier',
                            'ist',
                            'mein',
                            'Haus',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'here is my house',
                                'correct' => [
                                    'here is',
                                    'my',
                                    'house',
                                ],
                                'extra' => [
                                    'chair',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Aquí está mi casa',
                                'correct' => [
                                    'aquí está',
                                    'mi',
                                    'casa',
                                ],
                                'extra' => [
                                    'silla',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Voici ma maison',
                                'correct' => [
                                    'voici',
                                    'ma',
                                    'maison',
                                ],
                                'extra' => [
                                    'chaise',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'これが私の家です',
                                'correct' => [
                                    'これが',
                                    '私の',
                                    '家',
                                    'です',
                                ],
                                'extra' => [
                                    '椅子',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여기 나의 집입니다',
                                'correct' => [
                                    '여기',
                                    '나의',
                                    '집입니다',
                                ],
                                'extra' => [
                                    '의자',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Hier',
                            'ist',
                            'mein',
                            'Stuhl',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'here is my chair',
                                'correct' => [
                                    'here is',
                                    'my',
                                    'chair',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Aquí está mi silla',
                                'correct' => [
                                    'aquí está',
                                    'mi',
                                    'silla',
                                ],
                                'extra' => [
                                    'casa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Voici ma chaise',
                                'correct' => [
                                    'voici',
                                    'ma',
                                    'chaise',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'これが私の椅子です',
                                'correct' => [
                                    'これが',
                                    '私の',
                                    '椅子',
                                    'です',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여기 나의 의자입니다',
                                'correct' => [
                                    '여기',
                                    '나의',
                                    '의자입니다',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mein',
                            'Haus',
                            'und',
                            'mein',
                            'Stuhl',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my house and my chair',
                                'correct' => [
                                    'my',
                                    'house',
                                    'and',
                                    'my',
                                    'chair',
                                ],
                                'extra' => [
                                    'here is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi casa y mi silla',
                                'correct' => [
                                    'mi',
                                    'casa',
                                    'y',
                                    'mi',
                                    'silla',
                                ],
                                'extra' => [
                                    'aquí está',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma maison et ma chaise',
                                'correct' => [
                                    'ma',
                                    'maison',
                                    'et',
                                    'ma',
                                    'chaise',
                                ],
                                'extra' => [
                                    'voici',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の家と私の椅子',
                                'correct' => [
                                    '私の',
                                    '家',
                                    'と',
                                    '私の',
                                    '椅子',
                                ],
                                'extra' => [
                                    'これが',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 집과 나의 의자',
                                'correct' => [
                                    '나의',
                                    '집과',
                                    '나의',
                                    '의자',
                                ],
                                'extra' => [
                                    '여기',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
