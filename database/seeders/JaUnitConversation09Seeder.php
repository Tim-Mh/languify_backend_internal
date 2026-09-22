<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation09Seeder extends Seeder
{
    private const PICTURES = [
        '本' => 'book',
        'コーヒー' => 'coffee',
        'お茶' => 'tea',
        '家' => 'house',
        '友達' => 'friend',
        '学校' => 'school',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 9, the Japanese twin of the
     * English "Unit 9: Expressing Opinions" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'ユニット9: 意見を述べる', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 本・コーヒー', 1,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は思う',
                    ],
                    [
                        'ja' => '良い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '本',
                            'は',
                            '良い',
                            'と',
                            '思う',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'düşünürəm kitab yaxşı', 'correct' => ['düşünürəm', 'kitab', 'yaxşı'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'أفكر كتاب جيد', 'correct' => ['أفكر', 'كتاب', 'جيد'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'я думаю книга хороший', 'correct' => ['я', 'думаю', 'книга', 'хороший'], 'extra' => ['кофе']],
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
                            'tr' => ['sentence' => 'bence kitap iyi', 'correct' => ['bence', 'kitap', 'iyi'], 'extra' => ['kahve']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'コーヒー',
                            'は',
                            '良い',
                            'と',
                            '思う',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'düşünürəm qəhvə yaxşı', 'correct' => ['düşünürəm', 'qəhvə', 'yaxşı'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'أفكر قهوة جيد', 'correct' => ['أفكر', 'قهوة', 'جيد'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'я думаю кофе хороший', 'correct' => ['я', 'думаю', 'кофе', 'хороший'], 'extra' => ['книга']],
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
                            'tr' => ['sentence' => 'bence kahve iyi', 'correct' => ['bence', 'kahve', 'iyi'], 'extra' => ['kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '本',
                            'と',
                            'コーヒー',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'kitab və qəhvə', 'correct' => ['kitab', 'və', 'qəhvə'], 'extra' => ['düşünürəm']],
                            'ar' => ['sentence' => 'كتاب و قهوة', 'correct' => ['كتاب', 'و', 'قهوة'], 'extra' => ['أفكر']],
                            'ru' => ['sentence' => 'книга и кофе', 'correct' => ['книга', 'и', 'кофе'], 'extra' => ['я', 'думаю']],
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
                            'tr' => ['sentence' => 'kitap ve kahve', 'correct' => ['kitap', 've', 'kahve'], 'extra' => ['düşünüyorum']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: コーヒー・お茶', 2,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => 'お茶',
                        'img' => 'tea',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は信じる',
                    ],
                    [
                        'ja' => 'もっと良い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'コーヒー',
                            'の',
                            '方',
                            'が',
                            '良い',
                            'と',
                            '信じる',
                        ],
                        'blank' => 6,
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
                            'az' => ['sentence' => 'inanıram qəhvə daha yaxşı', 'correct' => ['inanıram', 'qəhvə', 'daha yaxşı'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أعتقد قهوة أحسن', 'correct' => ['أعتقد', 'قهوة', 'أحسن'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'я думаю кофе лучше', 'correct' => ['я думаю', 'кофе', 'лучше'], 'extra' => ['чай']],
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
                            'tr' => ['sentence' => 'bence kahve daha iyi', 'correct' => ['bence', 'kahve', 'daha', 'iyi'], 'extra' => ['çay']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'お茶',
                            'の',
                            '方',
                            'が',
                            '良い',
                        ],
                        'blank' => 4,
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
                                ],
                            ],
                            'az' => ['sentence' => 'çay daha yaxşı', 'correct' => ['çay', 'daha yaxşı'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'شاي أحسن', 'correct' => ['شاي', 'أحسن'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'чай лучше', 'correct' => ['чай', 'лучше'], 'extra' => ['кофе']],
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
                            'tr' => ['sentence' => 'çay daha iyi', 'correct' => ['çay', 'daha', 'iyi'], 'extra' => ['kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'お茶',
                            'は',
                            '良い',
                            'と',
                            '信じる',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'inanıram çay yaxşı', 'correct' => ['inanıram', 'çay', 'yaxşı'], 'extra' => ['daha yaxşı']],
                            'ar' => ['sentence' => 'أعتقد شاي جيد', 'correct' => ['أعتقد', 'شاي', 'جيد'], 'extra' => ['أحسن']],
                            'ru' => ['sentence' => 'я думаю чай хороший', 'correct' => ['я думаю', 'чай', 'хороший'], 'extra' => ['лучше']],
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
                            'tr' => ['sentence' => 'bence çay iyi', 'correct' => ['bence', 'çay', 'iyi'], 'extra' => ['daha iyi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 本・家', 3,
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
                        'ja' => '本当',
                    ],
                    [
                        'ja' => '偽',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'それ',
                            'は',
                            '本当',
                            'です',
                        ],
                        'blank' => 3,
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
                                ],
                            ],
                            'az' => ['sentence' => 'o düzgün', 'correct' => ['o', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'هو صحيح', 'correct' => ['هو', 'صحيح'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'оно правильно', 'correct' => ['оно', 'правильно'], 'extra' => ['неверно']],
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
                            'tr' => ['sentence' => 'bu doğru', 'correct' => ['bu', 'doğru'], 'extra' => ['yanlış']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'それ',
                            'は',
                            '偽',
                            'です',
                        ],
                        'blank' => 3,
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
                                ],
                            ],
                            'az' => ['sentence' => 'o səhv', 'correct' => ['o', 'səhv'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'هو خطأ', 'correct' => ['هو', 'خطأ'], 'extra' => ['صحيح']],
                            'ru' => ['sentence' => 'оно неверно', 'correct' => ['оно', 'неверно'], 'extra' => ['правильно']],
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
                            'tr' => ['sentence' => 'bu yanlış', 'correct' => ['bu', 'yanlış'], 'extra' => ['doğru']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '本',
                            'か',
                            '家',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'kitab və ya ev', 'correct' => ['kitab', 'və ya', 'ev'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'كتاب أو بيت', 'correct' => ['كتاب', 'أو', 'بيت'], 'extra' => ['صحيح']],
                            'ru' => ['sentence' => 'книга или дом', 'correct' => ['книга', 'или', 'дом'], 'extra' => ['правильно']],
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
                            'tr' => ['sentence' => 'kitap veya ev', 'correct' => ['kitap', 'veya', 'ev'], 'extra' => ['doğru']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: コーヒー・本', 4,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は好む',
                    ],
                    [
                        'ja' => 'もっと良い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'コーヒー',
                            'を',
                            '好む',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I prefer coffee',
                                'correct' => [
                                    'I prefer',
                                    'coffee',
                                ],
                                'extra' => [
                                    'better',
                                ],
                            ],
                            'az' => ['sentence' => 'üstünlük verirəm qəhvə', 'correct' => ['üstünlük verirəm', 'qəhvə'], 'extra' => ['daha yaxşı']],
                            'ar' => ['sentence' => 'أفضل قهوة', 'correct' => ['أفضل', 'قهوة'], 'extra' => ['أحسن']],
                            'ru' => ['sentence' => 'я предпочитаю кофе', 'correct' => ['я', 'предпочитаю', 'кофе'], 'extra' => ['лучше']],
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
                            'tr' => ['sentence' => 'ben kahve tercih ederim', 'correct' => ['ben', 'kahve', 'tercih', 'ederim'], 'extra' => ['daha iyi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'この',
                            '本',
                            'の',
                            '方',
                            'が',
                            '良い',
                        ],
                        'blank' => 5,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bu kitab daha yaxşı', 'correct' => ['bu', 'kitab', 'daha yaxşı'], 'extra' => ['üstünlük verirəm']],
                            'ar' => ['sentence' => 'هذا كتاب أحسن', 'correct' => ['هذا', 'كتاب', 'أحسن'], 'extra' => ['أفضل']],
                            'ru' => ['sentence' => 'это книга лучше', 'correct' => ['это', 'книга', 'лучше'], 'extra' => ['я', 'предпочитаю']],
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
                            'tr' => ['sentence' => 'bu kitap daha iyi', 'correct' => ['bu', 'kitap', 'daha', 'iyi'], 'extra' => ['tercih ederim']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私',
                            'は',
                            'この',
                            '本',
                            'を',
                            '好む',
                        ],
                        'blank' => 5,
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
                            'az' => ['sentence' => 'üstünlük verirəm bu kitab', 'correct' => ['üstünlük verirəm', 'bu', 'kitab'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'أفضل هذا كتاب', 'correct' => ['أفضل', 'هذا', 'كتاب'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'я предпочитаю это книга', 'correct' => ['я', 'предпочитаю', 'это', 'книга'], 'extra' => ['кофе']],
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
                            'tr' => ['sentence' => 'bu kitabı tercih ederim', 'correct' => ['bu', 'kitabı', 'tercih', 'ederim'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 友達・学校', 5,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は思う',
                    ],
                    [
                        'ja' => '本当',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'それ',
                            'は',
                            '本当',
                            'だ',
                            'と',
                            '思います',
                        ],
                        'blank' => 5,
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
                            'az' => ['sentence' => 'düşünürəm o düzgün', 'correct' => ['düşünürəm', 'o', 'düzgün'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أفكر هو صحيح', 'correct' => ['أفكر', 'هو', 'صحيح'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'я думаю оно правильно', 'correct' => ['я', 'думаю', 'оно', 'правильно'], 'extra' => ['друг']],
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
                            'tr' => ['sentence' => 'bence bu doğru', 'correct' => ['bence', 'bu', 'doğru'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            '友達',
                            'と',
                            '学校',
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
                            'az' => ['sentence' => 'mənim dost və məktəb', 'correct' => ['mənim', 'dost', 'və', 'məktəb'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'صديق و مدرسة', 'correct' => ['صديق', 'و', 'مدرسة'], 'extra' => ['صحيح']],
                            'ru' => ['sentence' => 'мой друг и школа', 'correct' => ['мой', 'друг', 'и', 'школа'], 'extra' => ['правильно']],
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
                            'tr' => ['sentence' => 'arkadaşım ve okul', 'correct' => ['arkadaşım', 've', 'okul'], 'extra' => ['doğru']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '学校',
                            'は',
                            '良い',
                            'と',
                            '思う',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'düşünürəm məktəb yaxşı', 'correct' => ['düşünürəm', 'məktəb', 'yaxşı'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'أفكر مدرسة جيد', 'correct' => ['أفكر', 'مدرسة', 'جيد'], 'extra' => ['صحيح']],
                            'ru' => ['sentence' => 'я думаю школа хороший', 'correct' => ['я', 'думаю', 'школа', 'хороший'], 'extra' => ['правильно']],
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
                            'tr' => ['sentence' => 'bence okul iyi', 'correct' => ['bence', 'okul', 'iyi'], 'extra' => ['doğru']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
