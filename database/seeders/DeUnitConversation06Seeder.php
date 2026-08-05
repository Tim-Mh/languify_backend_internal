<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation06Seeder extends Seeder
{
    private const PICTURES = [
        'Park' => 'park',
        'Schule' => 'school',
        'Geschäft' => 'shop',
        'Haus' => 'house',
        'Freund' => 'friend',
        'Buch' => 'book',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 6, the German twin of the
     * English "Unit 6: Future Plans" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Einheit 6: Zukunftspläne', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Park & Schule', 1,
                pictures: [
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich gehe',
                    ],
                    [
                        'de' => 'morgen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'gehe',
                            'zum',
                            'Park',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going to the park',
                                'correct' => [
                                    'I am going',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'tomorrow',
                                    'school',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Voy al parque',
                                'correct' => [
                                    'voy',
                                    'a',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'mañana',
                                    'escuela',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais au parc',
                                'correct' => [
                                    'je vais',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'demain',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は公園へ行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '公園',
                                    'へ',
                                    '行く',
                                ],
                                'extra' => [
                                    '明日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 공원에 간다',
                                'correct' => [
                                    '나는',
                                    '공원에',
                                    '간다',
                                ],
                                'extra' => [
                                    '내일',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'gehe',
                            'morgen',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going tomorrow',
                                'correct' => [
                                    'I am going',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'park',
                                    'school',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Voy mañana',
                                'correct' => [
                                    'voy',
                                    'mañana',
                                ],
                                'extra' => [
                                    'parque',
                                    'escuela',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais demain',
                                'correct' => [
                                    'je vais',
                                    'demain',
                                ],
                                'extra' => [
                                    'parc',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は明日行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '明日',
                                    '行く',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 내일 간다',
                                'correct' => [
                                    '나는',
                                    '내일',
                                    '간다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ich',
                            'gehe',
                            'morgen',
                            'zur',
                            'Schule',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going to the school tomorrow',
                                'correct' => [
                                    'I am going',
                                    'to',
                                    'the',
                                    'school',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'park',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Voy a la escuela mañana',
                                'correct' => [
                                    'voy',
                                    'a',
                                    'la',
                                    'escuela',
                                    'mañana',
                                ],
                                'extra' => [
                                    'parque',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais à l\'école demain',
                                'correct' => [
                                    'je vais',
                                    'à',
                                    'le',
                                    'école',
                                    'demain',
                                ],
                                'extra' => [
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は明日学校へ行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '明日',
                                    '学校',
                                    'へ',
                                    '行く',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 내일 학교에 간다',
                                'correct' => [
                                    '나는',
                                    '내일',
                                    '학교에',
                                    '간다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Geschäft & Haus', 2,
                pictures: [
                    [
                        'de' => 'Geschäft',
                        'img' => 'shop',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'vor',
                    ],
                    [
                        'de' => 'nach',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vor',
                            'dem',
                            'Geschäft',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'before the shop',
                                'correct' => [
                                    'before',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'after',
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Antes de la tienda',
                                'correct' => [
                                    'antes',
                                    'la',
                                    'tienda',
                                ],
                                'extra' => [
                                    'después',
                                    'casa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Avant le magasin',
                                'correct' => [
                                    'avant',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'après',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店の前に',
                                'correct' => [
                                    '店',
                                    'の前に',
                                ],
                                'extra' => [
                                    '後に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게 전에',
                                'correct' => [
                                    '가게',
                                    '전에',
                                ],
                                'extra' => [
                                    '후에',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Nach',
                            'dem',
                            'Haus',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'after the house',
                                'correct' => [
                                    'after',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'before',
                                    'shop',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Después de la casa',
                                'correct' => [
                                    'después',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'antes',
                                    'tienda',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Après la maison',
                                'correct' => [
                                    'après',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'avant',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家の後に',
                                'correct' => [
                                    '家',
                                    'の',
                                    '後に',
                                ],
                                'extra' => [
                                    '前に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집 후에',
                                'correct' => [
                                    '집',
                                    '후에',
                                ],
                                'extra' => [
                                    '전에',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Vor',
                            'oder',
                            'nach',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'before or after',
                                'correct' => [
                                    'before',
                                    'or',
                                    'after',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Antes o después',
                                'correct' => [
                                    'antes',
                                    'o',
                                    'después',
                                ],
                                'extra' => [
                                    'tienda',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Avant ou après',
                                'correct' => [
                                    'avant',
                                    'ou',
                                    'après',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '前か後',
                                'correct' => [
                                    '前',
                                    'か',
                                    '後',
                                ],
                                'extra' => [
                                    '家',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '전에 또는 후에',
                                'correct' => [
                                    '전에',
                                    '또는',
                                    '후에',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Buch & Park', 3,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich will',
                    ],
                    [
                        'de' => 'ich kann',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'will',
                            'ein',
                            'Buch',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I want a book',
                                'correct' => [
                                    'I want',
                                    'a',
                                    'book',
                                ],
                                'extra' => [
                                    'I can',
                                    'park',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quiero un libro',
                                'correct' => [
                                    'quiero',
                                    'un',
                                    'libro',
                                ],
                                'extra' => [
                                    'puedo',
                                    'parque',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je veux un livre',
                                'correct' => [
                                    'je veux',
                                    'un',
                                    'livre',
                                ],
                                'extra' => [
                                    'je peux',
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は本がほしい',
                                'correct' => [
                                    '私',
                                    'は',
                                    '本',
                                    'が',
                                    'ほしい',
                                ],
                                'extra' => [
                                    '私はできる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 책을 원한다',
                                'correct' => [
                                    '나는',
                                    '책을',
                                    '원한다',
                                ],
                                'extra' => [
                                    '나는 할 수 있다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'kann',
                            'gehen',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I can go',
                                'correct' => [
                                    'I can',
                                    'go',
                                ],
                                'extra' => [
                                    'I want',
                                    'book',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Puedo ir',
                                'correct' => [
                                    'puedo',
                                    'ir',
                                ],
                                'extra' => [
                                    'quiero',
                                    'libro',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je peux aller',
                                'correct' => [
                                    'je peux',
                                    'aller',
                                ],
                                'extra' => [
                                    'je veux',
                                    'livre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は行ける',
                                'correct' => [
                                    '私',
                                    'は',
                                    '行ける',
                                ],
                                'extra' => [
                                    'たいです',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 갈 수 있다',
                                'correct' => [
                                    '나는',
                                    '갈',
                                    '수',
                                    '있다',
                                ],
                                'extra' => [
                                    '나는 원한다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ich',
                            'will',
                            'zum',
                            'Park',
                            'gehen',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I want to go to the park',
                                'correct' => [
                                    'I want',
                                    'to',
                                    'go',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'I can',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quiero ir al parque',
                                'correct' => [
                                    'quiero',
                                    'ir',
                                    'a',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'puedo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je veux aller au parc',
                                'correct' => [
                                    'je veux',
                                    'aller',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'je peux',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は公園へ行きたい',
                                'correct' => [
                                    '私',
                                    'は',
                                    '公園',
                                    'へ',
                                    '行きたい',
                                ],
                                'extra' => [
                                    '私はできる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 공원에 가고 싶다',
                                'correct' => [
                                    '나는',
                                    '공원에',
                                    '가고',
                                    '싶다',
                                ],
                                'extra' => [
                                    '나는 할 수 있다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Freund & Haus', 4,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bereit',
                    ],
                    [
                        'de' => 'frei',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bin',
                            'bereit',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am ready',
                                'correct' => [
                                    'I am',
                                    'ready',
                                ],
                                'extra' => [
                                    'free',
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Estoy listo',
                                'correct' => [
                                    'soy',
                                    'listo',
                                ],
                                'extra' => [
                                    'libre',
                                    'amigo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis prêt',
                                'correct' => [
                                    'je suis',
                                    'prêt',
                                ],
                                'extra' => [
                                    'libre',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は準備ができた',
                                'correct' => [
                                    '私',
                                    'は',
                                    '準備ができた',
                                ],
                                'extra' => [
                                    '暇',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 준비됐습니다',
                                'correct' => [
                                    '저는',
                                    '준비됐습니다',
                                ],
                                'extra' => [
                                    '한가한',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mein',
                            'Freund',
                            'ist',
                            'frei',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is free',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'free',
                                ],
                                'extra' => [
                                    'ready',
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi amigo está libre',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'está',
                                    'libre',
                                ],
                                'extra' => [
                                    'listo',
                                    'casa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami est libre',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'libre',
                                ],
                                'extra' => [
                                    'prêt',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達は暇です',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '暇',
                                    'です',
                                ],
                                'extra' => [
                                    '準備ができた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 한가합니다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '한가합니다',
                                ],
                                'extra' => [
                                    '준비된',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Bereit',
                            'im',
                            'Haus',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'ready in the house',
                                'correct' => [
                                    'ready',
                                    'in',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'free',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Listo en la casa',
                                'correct' => [
                                    'listo',
                                    'en',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'libre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Prêt dans la maison',
                                'correct' => [
                                    'prêt',
                                    'dans',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'libre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家で準備ができた',
                                'correct' => [
                                    '家',
                                    'で',
                                    '準備ができた',
                                ],
                                'extra' => [
                                    '暇',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집에서 준비된',
                                'correct' => [
                                    '집에서',
                                    '준비된',
                                ],
                                'extra' => [
                                    '한가한',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Schule & Freund', 5,
                pictures: [
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'de' => 'nächste',
                    ],
                    [
                        'de' => 'Woche',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Nächste',
                            'Woche',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'next week',
                                'correct' => [
                                    'next',
                                    'week',
                                ],
                                'extra' => [
                                    'school',
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La próxima semana',
                                'correct' => [
                                    'próximo',
                                    'semana',
                                ],
                                'extra' => [
                                    'escuela',
                                    'amigo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La semaine prochaine',
                                'correct' => [
                                    'prochain',
                                    'semaine',
                                ],
                                'extra' => [
                                    'école',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '来週',
                                'correct' => [
                                    '来',
                                    '週',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '다음 주',
                                'correct' => [
                                    '다음',
                                    '주',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'gehe',
                            'nächste',
                            'Woche',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going next week',
                                'correct' => [
                                    'I am going',
                                    'next',
                                    'week',
                                ],
                                'extra' => [
                                    'school',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Voy la próxima semana',
                                'correct' => [
                                    'voy',
                                    'próximo',
                                    'semana',
                                ],
                                'extra' => [
                                    'escuela',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais la semaine prochaine',
                                'correct' => [
                                    'je vais',
                                    'prochain',
                                    'semaine',
                                ],
                                'extra' => [
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は来週行く',
                                'correct' => [
                                    '私',
                                    'は',
                                    '来',
                                    '週',
                                    '行く',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 다음 주에 간다',
                                'correct' => [
                                    '나는',
                                    '다음',
                                    '주에',
                                    '간다',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mein',
                            'Freund',
                            'und',
                            'die',
                            'Schule',
                        ],
                        'blank' => 2,
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
                                    'week',
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
                                    'semana',
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
                                    'semaine',
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
                                    '週',
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
                                    '주',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
