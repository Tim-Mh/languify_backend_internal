<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner07Seeder extends Seeder
{
    private const PICTURES = [
        'groß' => 'big',
        'klein' => 'small',
        'heiß' => 'hot',
        'kalt' => 'cold',
        'Haus' => 'house',
        'Buch' => 'book',
        'Park' => 'park',
        'Tisch' => 'table',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 7, the German twin of the
     * English "Unit 7: Describing Things" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Einheit 7: Dinge beschreiben', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Groß & Klein', 1,
                pictures: [
                    [
                        'de' => 'groß',
                        'img' => 'big',
                    ],
                    [
                        'de' => 'klein',
                        'img' => 'small',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Haus',
                    ],
                    [
                        'de' => 'Katze',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'großes',
                            'Haus',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir böyük ev', 'correct' => ['bir', 'böyük', 'ev'], 'extra' => ['kiçik', 'pişik']],
                            'ar' => ['sentence' => 'كبير بيت', 'correct' => ['كبير', 'بيت'], 'extra' => ['صغير', 'قط']],
                            'ru' => ['sentence' => 'большой дом', 'correct' => ['большой', 'дом'], 'extra' => ['маленький', 'кот']],
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
                            'tr' => ['sentence' => 'büyük bir ev', 'correct' => ['büyük', 'bir', 'ev'], 'extra' => ['küçük', 'kedi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'kleine',
                            'Katze',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir kiçik pişik', 'correct' => ['bir', 'kiçik', 'pişik'], 'extra' => ['böyük', 'ev']],
                            'ar' => ['sentence' => 'صغير قط', 'correct' => ['صغير', 'قط'], 'extra' => ['كبير', 'بيت']],
                            'ru' => ['sentence' => 'маленький кот', 'correct' => ['маленький', 'кот'], 'extra' => ['большой', 'дом']],
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
                            'tr' => ['sentence' => 'küçük bir kedi', 'correct' => ['küçük', 'bir', 'kedi'], 'extra' => ['büyük', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'großes',
                            'Haus',
                            'und',
                            'eine',
                            'kleine',
                            'Katze',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir böyük ev və bir kiçik pişik', 'correct' => ['bir', 'böyük', 'ev', 'və', 'bir', 'kiçik', 'pişik'], 'extra' => ['isti']],
                            'ar' => ['sentence' => 'كبير بيت و صغير قط', 'correct' => ['كبير', 'بيت', 'و', 'صغير', 'قط'], 'extra' => ['ساخن']],
                            'ru' => ['sentence' => 'большой дом и маленький кот', 'correct' => ['большой', 'дом', 'и', 'маленький', 'кот'], 'extra' => ['горячий']],
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
                            'tr' => ['sentence' => 'büyük bir ev ve küçük bir kedi', 'correct' => ['büyük', 'bir', 'ev', 've', 'küçük', 'bir', 'kedi'], 'extra' => ['sıcak']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Heiß & Kalt', 2,
                pictures: [
                    [
                        'de' => 'heiß',
                        'img' => 'hot',
                    ],
                    [
                        'de' => 'kalt',
                        'img' => 'cold',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Kaffee',
                    ],
                    [
                        'de' => 'Wasser',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Heißer',
                            'Kaffee',
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
                                    'water',
                                ],
                            ],
                            'az' => ['sentence' => 'isti qəhvə', 'correct' => ['isti', 'qəhvə'], 'extra' => ['soyuq', 'su']],
                            'ar' => ['sentence' => 'ساخن قهوة', 'correct' => ['ساخن', 'قهوة'], 'extra' => ['بارد', 'ماء']],
                            'ru' => ['sentence' => 'горячий кофе', 'correct' => ['горячий', 'кофе'], 'extra' => ['холодный', 'вода']],
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
                            'tr' => ['sentence' => 'sıcak kahve', 'correct' => ['sıcak', 'kahve'], 'extra' => ['soğuk', 'su']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Kaltes',
                            'Wasser',
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
                            'az' => ['sentence' => 'soyuq su', 'correct' => ['soyuq', 'su'], 'extra' => ['isti', 'qəhvə']],
                            'ar' => ['sentence' => 'بارد ماء', 'correct' => ['بارد', 'ماء'], 'extra' => ['ساخن', 'قهوة']],
                            'ru' => ['sentence' => 'холодный вода', 'correct' => ['холодный', 'вода'], 'extra' => ['горячий', 'кофе']],
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
                            'tr' => ['sentence' => 'soğuk su', 'correct' => ['soğuk', 'su'], 'extra' => ['sıcak', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Heißer',
                            'Kaffee',
                            'und',
                            'kaltes',
                            'Wasser',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'isti qəhvə və soyuq su', 'correct' => ['isti', 'qəhvə', 'və', 'soyuq', 'su'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'ساخن قهوة و بارد ماء', 'correct' => ['ساخن', 'قهوة', 'و', 'بارد', 'ماء'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'горячий кофе и холодный вода', 'correct' => ['горячий', 'кофе', 'и', 'холодный', 'вода'], 'extra' => ['большой']],
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
                            'tr' => ['sentence' => 'sıcak kahve ve soğuk su', 'correct' => ['sıcak', 'kahve', 've', 'soğuk', 'su'], 'extra' => ['büyük']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Haus & Park', 3,
                pictures: [
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'de' => 'schön',
                    ],
                    [
                        'de' => 'hübsch',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'schönes',
                            'Haus',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir gözəl ev', 'correct' => ['bir', 'gözəl', 'ev'], 'extra' => ['park']],
                            'ar' => ['sentence' => 'جميل بيت', 'correct' => ['جميل', 'بيت'], 'extra' => ['حديقة']],
                            'ru' => ['sentence' => 'красивый дом', 'correct' => ['красивый', 'дом'], 'extra' => ['парк']],
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
                            'tr' => ['sentence' => 'güzel bir ev', 'correct' => ['güzel', 'bir', 'ev'], 'extra' => ['güzel', 'park']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'hübscher',
                            'Park',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir gözəl park', 'correct' => ['bir', 'gözəl', 'park'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'جميل حديقة', 'correct' => ['جميل', 'حديقة'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'красивый парк', 'correct' => ['красивый', 'парк'], 'extra' => ['дом']],
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
                            'tr' => ['sentence' => 'güzel bir park', 'correct' => ['güzel', 'bir', 'park'], 'extra' => ['güzel', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'schöner',
                            'und',
                            'hübscher',
                            'Park',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'bir gözəl və gözəl park', 'correct' => ['bir', 'gözəl', 'və', 'gözəl', 'park'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'جميل و جميل حديقة', 'correct' => ['جميل', 'و', 'جميل', 'حديقة'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'красивый и красивый парк', 'correct' => ['красивый', 'и', 'красивый', 'парк'], 'extra' => ['дом']],
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
                            'tr' => ['sentence' => 'güzel ve hoş bir park', 'correct' => ['güzel', 've', 'hoş', 'bir', 'park'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Buch & Tisch', 4,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Tisch',
                        'img' => 'table',
                    ],
                ],
                plain: [
                    [
                        'de' => 'einfach',
                    ],
                    [
                        'de' => 'schwer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'einfaches',
                            'Buch',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir asan kitab', 'correct' => ['bir', 'asan', 'kitab'], 'extra' => ['çətin', 'masa']],
                            'ar' => ['sentence' => 'سهل كتاب', 'correct' => ['سهل', 'كتاب'], 'extra' => ['صعب', 'طاولة']],
                            'ru' => ['sentence' => 'легко книга', 'correct' => ['легко', 'книга'], 'extra' => ['трудно', 'стол']],
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
                            'tr' => ['sentence' => 'kolay bir kitap', 'correct' => ['kolay', 'bir', 'kitap'], 'extra' => ['zor', 'masa']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'harter',
                            'Tisch',
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
                            'az' => ['sentence' => 'bir çətin masa', 'correct' => ['bir', 'çətin', 'masa'], 'extra' => ['asan', 'kitab']],
                            'ar' => ['sentence' => 'صعب طاولة', 'correct' => ['صعب', 'طاولة'], 'extra' => ['سهل', 'كتاب']],
                            'ru' => ['sentence' => 'трудно стол', 'correct' => ['трудно', 'стол'], 'extra' => ['легко', 'книга']],
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
                            'tr' => ['sentence' => 'sert bir masa', 'correct' => ['sert', 'bir', 'masa'], 'extra' => ['kolay', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Einfach',
                            'oder',
                            'schwer',
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
                            'az' => ['sentence' => 'asan və ya çətin', 'correct' => ['asan', 'və ya', 'çətin'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'سهل أو صعب', 'correct' => ['سهل', 'أو', 'صعب'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'легко или трудно', 'correct' => ['легко', 'или', 'трудно'], 'extra' => ['книга']],
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
                            'tr' => ['sentence' => 'kolay veya zor', 'correct' => ['kolay', 'veya', 'zor'], 'extra' => ['kitap']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Buch & Haus', 5,
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
                        'de' => 'gut',
                    ],
                    [
                        'de' => 'neu',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'gutes',
                            'Buch',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir yaxşı kitab', 'correct' => ['bir', 'yaxşı', 'kitab'], 'extra' => ['yeni', 'ev']],
                            'ar' => ['sentence' => 'جيد كتاب', 'correct' => ['جيد', 'كتاب'], 'extra' => ['جديد', 'بيت']],
                            'ru' => ['sentence' => 'хороший книга', 'correct' => ['хороший', 'книга'], 'extra' => ['новый', 'дом']],
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
                            'tr' => ['sentence' => 'iyi bir kitap', 'correct' => ['iyi', 'bir', 'kitap'], 'extra' => ['yeni', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'neues',
                            'Haus',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a new house',
                                'correct' => [
                                    'a',
                                    'new',
                                    'house',
                                ],
                                'extra' => [
                                    'well',
                                    'book',
                                ],
                            ],
                            'az' => ['sentence' => 'bir yeni ev', 'correct' => ['bir', 'yeni', 'ev'], 'extra' => ['yaxşıyam', 'kitab']],
                            'ar' => ['sentence' => 'جديد بيت', 'correct' => ['جديد', 'بيت'], 'extra' => ['بخير', 'كتاب']],
                            'ru' => ['sentence' => 'новый дом', 'correct' => ['новый', 'дом'], 'extra' => ['хорошо', 'книга']],
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
                            'tr' => ['sentence' => 'yeni bir ev', 'correct' => ['yeni', 'bir', 'ev'], 'extra' => ['iyi', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'gutes',
                            'und',
                            'neues',
                            'Buch',
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
                            'az' => ['sentence' => 'bir yaxşı və yeni kitab', 'correct' => ['bir', 'yaxşı', 'və', 'yeni', 'kitab'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'جيد و جديد كتاب', 'correct' => ['جيد', 'و', 'جديد', 'كتاب'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'хороший и новый книга', 'correct' => ['хороший', 'и', 'новый', 'книга'], 'extra' => ['дом']],
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
                            'tr' => ['sentence' => 'iyi ve yeni bir kitap', 'correct' => ['iyi', 've', 'yeni', 'bir', 'kitap'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
