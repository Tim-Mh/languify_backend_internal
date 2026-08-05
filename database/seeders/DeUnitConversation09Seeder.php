<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation09Seeder extends Seeder
{
    private const PICTURES = [
        'Buch' => 'book',
        'Kaffee' => 'coffee',
        'Tee' => 'tea',
        'Haus' => 'house',
        'Freund' => 'friend',
        'Schule' => 'school',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 9, the German twin of the
     * English "Unit 9: Expressing Opinions" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Einheit 9: Meinungen äußern', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Buch & Kaffee', 1,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich denke',
                    ],
                    [
                        'de' => 'gut',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'denke',
                            'das',
                            'Buch',
                            'ist',
                            'gut',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Creo que el libro es bueno',
                                'correct' => [
                                    'creo',
                                    'el',
                                    'libro',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'café',
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
                            'Ich',
                            'denke',
                            'der',
                            'Kaffee',
                            'ist',
                            'gut',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Creo que el café es bueno',
                                'correct' => [
                                    'creo',
                                    'el',
                                    'café',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'libro',
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
                            'Das',
                            'Buch',
                            'und',
                            'der',
                            'Kaffee',
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
                            'es' => [
                                'sentence' => 'El libro y el café',
                                'correct' => [
                                    'el',
                                    'libro',
                                    'y',
                                    'el',
                                    'café',
                                ],
                                'extra' => [
                                    'creo',
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
            $builder->lesson('Lektion 2: Kaffee & Tee', 2,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Tee',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich glaube',
                    ],
                    [
                        'de' => 'besser',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'glaube',
                            'Kaffee',
                            'ist',
                            'besser',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Creo que el café es mejor',
                                'correct' => [
                                    'creo que',
                                    'café',
                                    'es',
                                    'mejor',
                                ],
                                'extra' => [
                                    'té',
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
                            'Tee',
                            'ist',
                            'besser',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'El té es mejor',
                                'correct' => [
                                    'té',
                                    'es',
                                    'mejor',
                                ],
                                'extra' => [
                                    'café',
                                    'creo que',
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
                            'Ich',
                            'glaube',
                            'Tee',
                            'ist',
                            'gut',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Creo que el té es bueno',
                                'correct' => [
                                    'creo que',
                                    'té',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'mejor',
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
            $builder->lesson('Lektion 3: Buch & Haus', 3,
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
                        'de' => 'wahr',
                    ],
                    [
                        'de' => 'falsch',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Es',
                            'ist',
                            'wahr',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Es verdadero',
                                'correct' => [
                                    'eso',
                                    'es',
                                    'verdadero',
                                ],
                                'extra' => [
                                    'falso',
                                    'libro',
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
                            'ist',
                            'falsch',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Es falso',
                                'correct' => [
                                    'eso',
                                    'es',
                                    'falso',
                                ],
                                'extra' => [
                                    'verdadero',
                                    'casa',
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
                            'Das',
                            'Buch',
                            'oder',
                            'das',
                            'Haus',
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
                            'es' => [
                                'sentence' => 'El libro o la casa',
                                'correct' => [
                                    'el',
                                    'libro',
                                    'o',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'verdadero',
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
            $builder->lesson('Lektion 4: Kaffee & Buch', 4,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich bevorzuge',
                    ],
                    [
                        'de' => 'besser',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bevorzuge',
                            'Kaffee',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Prefiero el café',
                                'correct' => [
                                    'prefiero',
                                    'café',
                                ],
                                'extra' => [
                                    'mejor',
                                    'libro',
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
                            'Dieses',
                            'Buch',
                            'ist',
                            'besser',
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
                            'es' => [
                                'sentence' => 'Este libro es mejor',
                                'correct' => [
                                    'este',
                                    'libro',
                                    'es',
                                    'mejor',
                                ],
                                'extra' => [
                                    'prefiero',
                                    'café',
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
                            'Ich',
                            'bevorzuge',
                            'dieses',
                            'Buch',
                        ],
                        'blank' => 1,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Prefiero este libro',
                                'correct' => [
                                    'prefiero',
                                    'este',
                                    'libro',
                                ],
                                'extra' => [
                                    'café',
                                    'mejor',
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
            $builder->lesson('Lektion 5: Freund & Schule', 5,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich denke',
                    ],
                    [
                        'de' => 'wahr',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'denke',
                            'es',
                            'ist',
                            'wahr',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Creo que es verdadero',
                                'correct' => [
                                    'creo',
                                    'eso',
                                    'es',
                                    'verdadero',
                                ],
                                'extra' => [
                                    'amigo',
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
                            'Mein',
                            'Freund',
                            'und',
                            'die',
                            'Schule',
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
                            'es' => [
                                'sentence' => 'Mi amigo y la escuela',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'y',
                                    'la',
                                    'escuela',
                                ],
                                'extra' => [
                                    'verdadero',
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
                            'Ich',
                            'denke',
                            'die',
                            'Schule',
                            'ist',
                            'gut',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Creo que la escuela es buena',
                                'correct' => [
                                    'creo',
                                    'la',
                                    'escuela',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'verdadero',
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
