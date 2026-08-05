<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation09Seeder extends Seeder
{
    private const PICTURES = [
        'libro' => 'book',
        'café' => 'coffee',
        'té' => 'tea',
        'casa' => 'house',
        'amigo' => 'friend',
        'escuela' => 'school',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 9, the Spanish twin of the
     * English "Unit 9: Expressing Opinions" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unidad 9: Expresar opiniones', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Libro y Café', 1,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'es' => 'creo',
                    ],
                    [
                        'es' => 'bueno',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Creo',
                            'que',
                            'el',
                            'libro',
                            'es',
                            'bueno',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I think the book is good',
                                'correct' => [
                                    'I think',
                                    'the',
                                    'book',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'coffee',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich denke das Buch ist gut',
                                'correct' => [
                                    'ich denke',
                                    'das',
                                    'Buch',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je pense que le livre est bon',
                                'correct' => [
                                    'je pense',
                                    'le',
                                    'livre',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'café',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本は良いと思う',
                                'correct' => [
                                    '本',
                                    'は',
                                    '良い',
                                    'と',
                                    '思う',
                                ],
                                'extra' => [
                                    'コーヒー',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책이 좋다고 생각한다',
                                'correct' => [
                                    '책이',
                                    '좋다고',
                                    '생각한다',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Creo',
                            'que',
                            'el',
                            'café',
                            'es',
                            'bueno',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I think the coffee is good',
                                'correct' => [
                                    'I think',
                                    'the',
                                    'coffee',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'book',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich denke der Kaffee ist gut',
                                'correct' => [
                                    'ich denke',
                                    'der',
                                    'Kaffee',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je pense que le café est bon',
                                'correct' => [
                                    'je pense',
                                    'le',
                                    'café',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'コーヒーは良いと思う',
                                'correct' => [
                                    'コーヒー',
                                    'は',
                                    '良い',
                                    'と',
                                    '思う',
                                ],
                                'extra' => [
                                    '本',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피가 좋다고 생각한다',
                                'correct' => [
                                    '커피가',
                                    '좋다고',
                                    '생각한다',
                                ],
                                'extra' => [
                                    '책',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'libro',
                            'y',
                            'el',
                            'café',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the book and the coffee',
                                'correct' => [
                                    'the',
                                    'book',
                                    'and',
                                    'the',
                                    'coffee',
                                ],
                                'extra' => [
                                    'I think',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Buch und der Kaffee',
                                'correct' => [
                                    'das',
                                    'Buch',
                                    'und',
                                    'der',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'ich denke',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le livre et le café',
                                'correct' => [
                                    'le',
                                    'livre',
                                    'et',
                                    'le',
                                    'café',
                                ],
                                'extra' => [
                                    'je pense',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本とコーヒー',
                                'correct' => [
                                    '本',
                                    'と',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    '私は思う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책과 커피',
                                'correct' => [
                                    '책과',
                                    '커피',
                                ],
                                'extra' => [
                                    '나는 생각한다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Café y Té', 2,
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
                        'es' => 'creo que',
                    ],
                    [
                        'es' => 'mejor',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Creo',
                            'que',
                            'el',
                            'café',
                            'es',
                            'mejor',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I believe coffee is better',
                                'correct' => [
                                    'I believe',
                                    'coffee',
                                    'is',
                                    'better',
                                ],
                                'extra' => [
                                    'tea',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich glaube Kaffee ist besser',
                                'correct' => [
                                    'ich glaube',
                                    'Kaffee',
                                    'ist',
                                    'besser',
                                ],
                                'extra' => [
                                    'Tee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je crois que le café est meilleur',
                                'correct' => [
                                    'je crois',
                                    'café',
                                    'est',
                                    'meilleur',
                                ],
                                'extra' => [
                                    'thé',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'コーヒーの方が良いと信じる',
                                'correct' => [
                                    'コーヒー',
                                    'の',
                                    '方',
                                    'が',
                                    '良い',
                                    'と',
                                    '信じる',
                                ],
                                'extra' => [
                                    'お茶',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피가 더 좋다고 믿는다',
                                'correct' => [
                                    '커피가',
                                    '더',
                                    '좋다고',
                                    '믿는다',
                                ],
                                'extra' => [
                                    '차',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'té',
                            'es',
                            'mejor',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'tea is better',
                                'correct' => [
                                    'tea',
                                    'is',
                                    'better',
                                ],
                                'extra' => [
                                    'coffee',
                                    'I believe',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Tee ist besser',
                                'correct' => [
                                    'Tee',
                                    'ist',
                                    'besser',
                                ],
                                'extra' => [
                                    'Kaffee',
                                    'ich glaube',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le thé est meilleur',
                                'correct' => [
                                    'thé',
                                    'est',
                                    'meilleur',
                                ],
                                'extra' => [
                                    'café',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'お茶の方が良い',
                                'correct' => [
                                    'お茶',
                                    'の',
                                    '方',
                                    'が',
                                    '良い',
                                ],
                                'extra' => [
                                    'コーヒー',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '차가 더 좋다',
                                'correct' => [
                                    '차가',
                                    '더',
                                    '좋다',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Creo',
                            'que',
                            'el',
                            'té',
                            'es',
                            'bueno',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I believe tea is good',
                                'correct' => [
                                    'I believe',
                                    'tea',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'better',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich glaube Tee ist gut',
                                'correct' => [
                                    'ich glaube',
                                    'Tee',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'besser',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je crois que le thé est bon',
                                'correct' => [
                                    'je crois',
                                    'thé',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'meilleur',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'お茶は良いと信じる',
                                'correct' => [
                                    'お茶',
                                    'は',
                                    '良い',
                                    'と',
                                    '信じる',
                                ],
                                'extra' => [
                                    'もっと良い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '차가 좋다고 믿는다',
                                'correct' => [
                                    '차가',
                                    '좋다고',
                                    '믿는다',
                                ],
                                'extra' => [
                                    '더 좋은',
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
                        'es' => 'verdadero',
                    ],
                    [
                        'es' => 'falso',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Es',
                            'verdadero',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'it is true',
                                'correct' => [
                                    'it',
                                    'is',
                                    'true',
                                ],
                                'extra' => [
                                    'false',
                                    'book',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Es ist wahr',
                                'correct' => [
                                    'es',
                                    'ist',
                                    'wahr',
                                ],
                                'extra' => [
                                    'falsch',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'C\'est vrai',
                                'correct' => [
                                    'ce',
                                    'est',
                                    'vrai',
                                ],
                                'extra' => [
                                    'faux',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'それは本当です',
                                'correct' => [
                                    'それ',
                                    'は',
                                    '本当',
                                    'です',
                                ],
                                'extra' => [
                                    '偽',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그것은 사실이다',
                                'correct' => [
                                    '그것은',
                                    '사실이다',
                                ],
                                'extra' => [
                                    '거짓',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Es',
                            'falso',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'it is false',
                                'correct' => [
                                    'it',
                                    'is',
                                    'false',
                                ],
                                'extra' => [
                                    'true',
                                    'house',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Es ist falsch',
                                'correct' => [
                                    'es',
                                    'ist',
                                    'falsch',
                                ],
                                'extra' => [
                                    'wahr',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'C\'est faux',
                                'correct' => [
                                    'ce',
                                    'est',
                                    'faux',
                                ],
                                'extra' => [
                                    'vrai',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'それは偽です',
                                'correct' => [
                                    'それ',
                                    'は',
                                    '偽',
                                    'です',
                                ],
                                'extra' => [
                                    '本当',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그것은 거짓이다',
                                'correct' => [
                                    '그것은',
                                    '거짓이다',
                                ],
                                'extra' => [
                                    '사실',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'libro',
                            'o',
                            'la',
                            'casa',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the book or the house',
                                'correct' => [
                                    'the',
                                    'book',
                                    'or',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'true',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Buch oder das Haus',
                                'correct' => [
                                    'das',
                                    'Buch',
                                    'oder',
                                    'das',
                                    'Haus',
                                ],
                                'extra' => [
                                    'wahr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le livre ou la maison',
                                'correct' => [
                                    'le',
                                    'livre',
                                    'ou',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'vrai',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本か家',
                                'correct' => [
                                    '本',
                                    'か',
                                    '家',
                                ],
                                'extra' => [
                                    '本当',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책 또는 집',
                                'correct' => [
                                    '책',
                                    '또는',
                                    '집',
                                ],
                                'extra' => [
                                    '사실',
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
                        'es' => 'prefiero',
                    ],
                    [
                        'es' => 'mejor',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Prefiero',
                            'el',
                            'café',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I prefer coffee',
                                'correct' => [
                                    'I prefer',
                                    'coffee',
                                ],
                                'extra' => [
                                    'better',
                                    'book',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bevorzuge Kaffee',
                                'correct' => [
                                    'ich bevorzuge',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'besser',
                                    'Buch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je préfère le café',
                                'correct' => [
                                    'je préfère',
                                    'café',
                                ],
                                'extra' => [
                                    'meilleur',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はコーヒーを好む',
                                'correct' => [
                                    '私',
                                    'は',
                                    'コーヒー',
                                    'を',
                                    '好む',
                                ],
                                'extra' => [
                                    'もっと良い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 커피를 선호한다',
                                'correct' => [
                                    '나는',
                                    '커피를',
                                    '선호한다',
                                ],
                                'extra' => [
                                    '더 좋은',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
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
                                    'I prefer',
                                    'coffee',
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
                                    'ich bevorzuge',
                                    'Kaffee',
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
                                    'je préfère',
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
                                    '私は好む',
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
                                    '나는 선호한다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Prefiero',
                            'este',
                            'libro',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I prefer this book',
                                'correct' => [
                                    'I prefer',
                                    'this',
                                    'book',
                                ],
                                'extra' => [
                                    'coffee',
                                    'better',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bevorzuge dieses Buch',
                                'correct' => [
                                    'ich bevorzuge',
                                    'dieser',
                                    'Buch',
                                ],
                                'extra' => [
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je préfère ce livre',
                                'correct' => [
                                    'je préfère',
                                    'ce',
                                    'livre',
                                ],
                                'extra' => [
                                    'café',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はこの本を好む',
                                'correct' => [
                                    '私',
                                    'は',
                                    'この',
                                    '本',
                                    'を',
                                    '好む',
                                ],
                                'extra' => [
                                    'コーヒー',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 이 책을 선호한다',
                                'correct' => [
                                    '나는',
                                    '이',
                                    '책을',
                                    '선호한다',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Amigo y Escuela', 5,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'es' => 'creo',
                    ],
                    [
                        'es' => 'verdadero',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Creo',
                            'que',
                            'es',
                            'verdadero',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I think it is true',
                                'correct' => [
                                    'I think',
                                    'it',
                                    'is',
                                    'true',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich denke es ist wahr',
                                'correct' => [
                                    'ich denke',
                                    'es',
                                    'ist',
                                    'wahr',
                                ],
                                'extra' => [
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je pense que c\'est vrai',
                                'correct' => [
                                    'je pense',
                                    'ce',
                                    'est',
                                    'vrai',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'それは本当だと思う',
                                'correct' => [
                                    'それ',
                                    'は',
                                    '本当',
                                    'だ',
                                    'と',
                                    '思う',
                                ],
                                'extra' => [
                                    '友達',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그것이 사실이라고 생각한다',
                                'correct' => [
                                    '그것이',
                                    '사실이라고',
                                    '생각한다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'y',
                            'la',
                            'escuela',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend and the school',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'and',
                                    'the',
                                    'school',
                                ],
                                'extra' => [
                                    'true',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mein Freund und die Schule',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'und',
                                    'die',
                                    'Schule',
                                ],
                                'extra' => [
                                    'wahr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami et l\'école',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'et',
                                    'école',
                                ],
                                'extra' => [
                                    'vrai',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達と学校',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'と',
                                    '学校',
                                ],
                                'extra' => [
                                    '本当',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구와 학교',
                                'correct' => [
                                    '나의',
                                    '친구와',
                                    '학교',
                                ],
                                'extra' => [
                                    '사실',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Creo',
                            'que',
                            'la',
                            'escuela',
                            'es',
                            'buena',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I think the school is good',
                                'correct' => [
                                    'I think',
                                    'the',
                                    'school',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'true',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich denke die Schule ist gut',
                                'correct' => [
                                    'ich denke',
                                    'die',
                                    'Schule',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'wahr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je pense que l\'école est bonne',
                                'correct' => [
                                    'je pense',
                                    'école',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'vrai',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校は良いと思う',
                                'correct' => [
                                    '学校',
                                    'は',
                                    '良い',
                                    'と',
                                    '思う',
                                ],
                                'extra' => [
                                    '本当',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교가 좋다고 생각한다',
                                'correct' => [
                                    '학교가',
                                    '좋다고',
                                    '생각한다',
                                ],
                                'extra' => [
                                    '사실',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
