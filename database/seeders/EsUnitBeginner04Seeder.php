<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner04Seeder extends Seeder
{
    private const PICTURES = [
        'mesa' => 'table',
        'silla' => 'chair',
        'casa' => 'house',
        'gato' => 'cat',
        'perro' => 'dog',
        'libro' => 'book',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 4, the Spanish twin of the
     * English "Unit 4: Home & Objects" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unidad 4: Casa y objetos', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Mesa y Silla', 1,
                pictures: [
                    [
                        'es' => 'mesa',
                        'img' => 'table',
                    ],
                    [
                        'es' => 'silla',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'es' => 'el',
                    ],
                    [
                        'es' => 'y',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'mesa',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'masa', 'correct' => ['masa'], 'extra' => ['stul']],
                            'ar' => ['sentence' => 'طاولة', 'correct' => ['طاولة'], 'extra' => ['كرسي']],
                            'ru' => ['sentence' => 'стол', 'correct' => ['стол'], 'extra' => ['стул']],
                            'de' => [
                                'sentence' => 'Der Tisch',
                                'correct' => [
                                    'der',
                                    'Tisch',
                                ],
                                'extra' => [
                                    'Stuhl',
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
                            'tr' => ['sentence' => 'masa', 'correct' => ['masa'], 'extra' => ['sandalye']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'silla',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'stul', 'correct' => ['stul'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'كرسي', 'correct' => ['كرسي'], 'extra' => ['طاولة']],
                            'ru' => ['sentence' => 'стул', 'correct' => ['стул'], 'extra' => ['стол']],
                            'de' => [
                                'sentence' => 'Der Stuhl',
                                'correct' => [
                                    'der',
                                    'Stuhl',
                                ],
                                'extra' => [
                                    'Tisch',
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
                            'tr' => ['sentence' => 'sandalye', 'correct' => ['sandalye'], 'extra' => ['masa']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'La',
                            'mesa',
                            'y',
                            'la',
                            'silla',
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
                            'az' => ['sentence' => 'masa və stul', 'correct' => ['masa', 'və', 'stul'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'طاولة و كرسي', 'correct' => ['طاولة', 'و', 'كرسي'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'стол и стул', 'correct' => ['стол', 'и', 'стул'], 'extra' => ['дом']],
                            'de' => [
                                'sentence' => 'Der Tisch und der Stuhl',
                                'correct' => [
                                    'der',
                                    'Tisch',
                                    'und',
                                    'der',
                                    'Stuhl',
                                ],
                                'extra' => [
                                    'Haus',
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
                            'tr' => ['sentence' => 'masa ve sandalye', 'correct' => ['masa', 've', 'sandalye'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Gato y Mesa', 2,
                pictures: [
                    [
                        'es' => 'gato',
                        'img' => 'cat',
                    ],
                    [
                        'es' => 'mesa',
                        'img' => 'table',
                    ],
                ],
                plain: [
                    [
                        'es' => 'en',
                    ],
                    [
                        'es' => 'sobre',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'gato',
                            'sobre',
                            'la',
                            'mesa',
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
                            'az' => ['sentence' => 'pişik üzərində masa', 'correct' => ['pişik', 'üzərində', 'masa'], 'extra' => ['içində']],
                            'ar' => ['sentence' => 'قط على طاولة', 'correct' => ['قط', 'على', 'طاولة'], 'extra' => ['في']],
                            'ru' => ['sentence' => 'кот на стол', 'correct' => ['кот', 'на', 'стол'], 'extra' => ['в']],
                            'de' => [
                                'sentence' => 'Die Katze auf dem Tisch',
                                'correct' => [
                                    'die',
                                    'Katze',
                                    'auf',
                                    'dem',
                                    'Tisch',
                                ],
                                'extra' => [
                                    'in',
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
                            'tr' => ['sentence' => 'masadaki kedi', 'correct' => ['masadaki', 'kedi'], 'extra' => ['içinde']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'gato',
                            'en',
                            'la',
                            'casa',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'pişik içində ev', 'correct' => ['pişik', 'içində', 'ev'], 'extra' => ['üzərində']],
                            'ar' => ['sentence' => 'قط في بيت', 'correct' => ['قط', 'في', 'بيت'], 'extra' => ['على']],
                            'ru' => ['sentence' => 'кот в дом', 'correct' => ['кот', 'в', 'дом'], 'extra' => ['на']],
                            'de' => [
                                'sentence' => 'Die Katze im Haus',
                                'correct' => [
                                    'die',
                                    'Katze',
                                    'in',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'auf',
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
                            'tr' => ['sentence' => 'evdeki kedi', 'correct' => ['evdeki', 'kedi'], 'extra' => ['üzerinde']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Sobre',
                            'la',
                            'mesa',
                            'o',
                            'en',
                            'la',
                            'casa',
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
                            'az' => ['sentence' => 'üzərində masa və ya içində ev', 'correct' => ['üzərində', 'masa', 'və ya', 'içində', 'ev'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'على طاولة أو في بيت', 'correct' => ['على', 'طاولة', 'أو', 'في', 'بيت'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'на стол или в дом', 'correct' => ['на', 'стол', 'или', 'в', 'дом'], 'extra' => ['кот']],
                            'de' => [
                                'sentence' => 'Auf dem Tisch oder im Haus',
                                'correct' => [
                                    'auf',
                                    'dem',
                                    'Tisch',
                                    'oder',
                                    'in',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Katze',
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
                            'tr' => ['sentence' => 'masada veya evde', 'correct' => ['masada', 'veya', 'evde'], 'extra' => ['kedi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Perro y Gato', 3,
                pictures: [
                    [
                        'es' => 'perro',
                        'img' => 'dog',
                    ],
                    [
                        'es' => 'gato',
                        'img' => 'cat',
                    ],
                ],
                plain: [
                    [
                        'es' => 'tengo',
                    ],
                    [
                        'es' => 'un',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Tengo',
                            'un',
                            'perro',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'məndə var bir it', 'correct' => ['məndə var', 'bir', 'it'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'عندي كلب', 'correct' => ['عندي', 'كلب'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'у меня собака', 'correct' => ['у', 'меня', 'собака'], 'extra' => ['кот']],
                            'de' => [
                                'sentence' => 'Ich habe einen Hund',
                                'correct' => [
                                    'ich habe',
                                    'einen',
                                    'Hund',
                                ],
                                'extra' => [
                                    'Katze',
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
                            'tr' => ['sentence' => 'bir köpeğim var', 'correct' => ['bir', 'köpeğim', 'var'], 'extra' => ['kedi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Tengo',
                            'un',
                            'gato',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'məndə var bir pişik', 'correct' => ['məndə var', 'bir', 'pişik'], 'extra' => ['it']],
                            'ar' => ['sentence' => 'عندي قط', 'correct' => ['عندي', 'قط'], 'extra' => ['كلب']],
                            'ru' => ['sentence' => 'у меня кот', 'correct' => ['у', 'меня', 'кот'], 'extra' => ['собака']],
                            'de' => [
                                'sentence' => 'Ich habe eine Katze',
                                'correct' => [
                                    'ich habe',
                                    'eine',
                                    'Katze',
                                ],
                                'extra' => [
                                    'Hund',
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
                            'tr' => ['sentence' => 'bir kedim var', 'correct' => ['bir', 'kedim', 'var'], 'extra' => ['köpek']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Tengo',
                            'un',
                            'gato',
                            'y',
                            'un',
                            'perro',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'məndə var bir pişik və bir it', 'correct' => ['məndə var', 'bir', 'pişik', 'və', 'bir', 'it'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'عندي قط و كلب', 'correct' => ['عندي', 'قط', 'و', 'كلب'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'у меня кот и собака', 'correct' => ['у', 'меня', 'кот', 'и', 'собака'], 'extra' => ['дом']],
                            'de' => [
                                'sentence' => 'Ich habe eine Katze und einen Hund',
                                'correct' => [
                                    'ich habe',
                                    'eine',
                                    'Katze',
                                    'und',
                                    'einen',
                                    'Hund',
                                ],
                                'extra' => [
                                    'Haus',
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
                            'tr' => ['sentence' => 'bir kedim ve bir köpeğim var', 'correct' => ['bir', 'kedim', 've', 'bir', 'köpeğim', 'var'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Casa y Perro', 4,
                pictures: [
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                    [
                        'es' => 'perro',
                        'img' => 'dog',
                    ],
                ],
                plain: [
                    [
                        'es' => 'dónde está',
                    ],
                    [
                        'es' => 'debajo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Dónde',
                            'está',
                            'el',
                            'perro',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'harada it', 'correct' => ['harada', 'it'], 'extra' => ['ev', 'altında']],
                            'ar' => ['sentence' => 'أين كلب', 'correct' => ['أين', 'كلب'], 'extra' => ['بيت', 'تحت']],
                            'ru' => ['sentence' => 'где собака', 'correct' => ['где', 'собака'], 'extra' => ['дом', 'под']],
                            'de' => [
                                'sentence' => 'Wo ist der Hund',
                                'correct' => [
                                    'wo ist',
                                    'der',
                                    'Hund',
                                ],
                                'extra' => [
                                    'Haus',
                                    'unter',
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
                            'tr' => ['sentence' => 'köpek nerede', 'correct' => ['köpek', 'nerede'], 'extra' => ['ev', 'altında']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'perro',
                            'debajo',
                            'de',
                            'la',
                            'mesa',
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
                            'az' => ['sentence' => 'it altında masa', 'correct' => ['it', 'altında', 'masa'], 'extra' => ['harada']],
                            'ar' => ['sentence' => 'كلب تحت طاولة', 'correct' => ['كلب', 'تحت', 'طاولة'], 'extra' => ['أين']],
                            'ru' => ['sentence' => 'собака под стол', 'correct' => ['собака', 'под', 'стол'], 'extra' => ['где']],
                            'de' => [
                                'sentence' => 'Der Hund unter dem Tisch',
                                'correct' => [
                                    'der',
                                    'Hund',
                                    'unter',
                                    'dem',
                                    'Tisch',
                                ],
                                'extra' => [
                                    'wo ist',
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
                            'tr' => ['sentence' => 'masanın altındaki köpek', 'correct' => ['masanın', 'altındaki', 'köpek'], 'extra' => ['nerede']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Dónde',
                            'está',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'harada ev', 'correct' => ['harada', 'ev'], 'extra' => ['it', 'altında']],
                            'ar' => ['sentence' => 'أين بيت', 'correct' => ['أين', 'بيت'], 'extra' => ['كلب', 'تحت']],
                            'ru' => ['sentence' => 'где дом', 'correct' => ['где', 'дом'], 'extra' => ['собака', 'под']],
                            'de' => [
                                'sentence' => 'Wo ist das Haus',
                                'correct' => [
                                    'wo ist',
                                    'das',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Hund',
                                    'unter',
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
                            'tr' => ['sentence' => 'ev nerede', 'correct' => ['ev', 'nerede'], 'extra' => ['köpek', 'altında']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Casa y Silla', 5,
                pictures: [
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                    [
                        'es' => 'silla',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'es' => 'aquí está',
                    ],
                    [
                        'es' => 'mi',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Aquí',
                            'está',
                            'mi',
                            'casa',
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
                            'az' => ['sentence' => 'burada mənim ev', 'correct' => ['burada', 'mənim', 'ev'], 'extra' => ['stul']],
                            'ar' => ['sentence' => 'هنا بيت', 'correct' => ['هنا', 'بيت'], 'extra' => ['كرسي']],
                            'ru' => ['sentence' => 'здесь мой дом', 'correct' => ['здесь', 'мой', 'дом'], 'extra' => ['стул']],
                            'de' => [
                                'sentence' => 'Hier ist mein Haus',
                                'correct' => [
                                    'hier ist',
                                    'mein',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Stuhl',
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
                            'tr' => ['sentence' => 'işte evim', 'correct' => ['işte', 'evim'], 'extra' => ['sandalye']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Aquí',
                            'está',
                            'mi',
                            'silla',
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
                            'az' => ['sentence' => 'burada mənim stul', 'correct' => ['burada', 'mənim', 'stul'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'هنا كرسي', 'correct' => ['هنا', 'كرسي'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'здесь мой стул', 'correct' => ['здесь', 'мой', 'стул'], 'extra' => ['дом']],
                            'de' => [
                                'sentence' => 'Hier ist mein Stuhl',
                                'correct' => [
                                    'hier ist',
                                    'mein',
                                    'Stuhl',
                                ],
                                'extra' => [
                                    'Haus',
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
                            'tr' => ['sentence' => 'işte sandalyem', 'correct' => ['işte', 'sandalyem'], 'extra' => ['ev']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'casa',
                            'y',
                            'mi',
                            'silla',
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
                            'az' => ['sentence' => 'mənim ev və mənim stul', 'correct' => ['mənim', 'ev', 'və', 'mənim', 'stul'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'بيت و كرسي', 'correct' => ['بيت', 'و', 'كرسي'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'мой дом и мой стул', 'correct' => ['мой', 'дом', 'и', 'мой', 'стул'], 'extra' => ['здесь']],
                            'de' => [
                                'sentence' => 'Mein Haus und mein Stuhl',
                                'correct' => [
                                    'mein',
                                    'Haus',
                                    'und',
                                    'mein',
                                    'Stuhl',
                                ],
                                'extra' => [
                                    'hier ist',
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
                            'tr' => ['sentence' => 'evim ve sandalyem', 'correct' => ['evim', 've', 'sandalyem'], 'extra' => ['işte']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
