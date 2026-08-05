<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation06Seeder extends Seeder
{
    private const PICTURES = [
        '公園' => 'park',
        '学校' => 'school',
        '店' => 'shop',
        '家' => 'house',
        '友達' => 'friend',
        '本' => 'book',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 6, the Japanese twin of the
     * English "Unit 6: Future Plans" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'ユニット6: 将来の計画', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 公園・学校', 1,
                pictures: [
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は行く',
                    ],
                    [
                        'ja' => '明日',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '公園',
                            'へ',
                            '行く',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Ich gehe zum Park',
                                'correct' => [
                                    'ich gehe',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'morgen',
                                    'Schule',
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
                            '私',
                            'は',
                            '明日',
                            '行く',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am going tomorrow',
                                'correct' => [
                                    'I am going',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'park',
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
                            'de' => [
                                'sentence' => 'Ich gehe morgen',
                                'correct' => [
                                    'ich gehe',
                                    'morgen',
                                ],
                                'extra' => [
                                    'Park',
                                    'Schule',
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
                            '私',
                            'は',
                            '明日',
                            '学校',
                            'へ',
                            '行く',
                        ],
                        'blank' => 5,
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
                            'de' => [
                                'sentence' => 'Ich gehe morgen zur Schule',
                                'correct' => [
                                    'ich gehe',
                                    'zu',
                                    'der',
                                    'Schule',
                                    'morgen',
                                ],
                                'extra' => [
                                    'Park',
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
            $builder->lesson('レッスン2: 店・家', 2,
                pictures: [
                    [
                        'ja' => '店',
                        'img' => 'shop',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => '前に',
                    ],
                    [
                        'ja' => '後に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '店',
                            'の前に',
                        ],
                        'blank' => 1,
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
                            'de' => [
                                'sentence' => 'Vor dem Geschäft',
                                'correct' => [
                                    'vor',
                                    'dem',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'nach',
                                    'Haus',
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
                            '家',
                            'の',
                            '後に',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Nach dem Haus',
                                'correct' => [
                                    'nach',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'vor',
                                    'Geschäft',
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
                            '前',
                            'か',
                            '後',
                        ],
                        'blank' => 0,
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
                            'de' => [
                                'sentence' => 'Vor oder nach',
                                'correct' => [
                                    'vor',
                                    'oder',
                                    'nach',
                                ],
                                'extra' => [
                                    'Haus',
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
            $builder->lesson('レッスン3: 本・公園', 3,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'たいです',
                    ],
                    [
                        'ja' => '私はできる',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '本',
                            'が',
                            'ほしい',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Ich will ein Buch',
                                'correct' => [
                                    'ich will',
                                    'ein',
                                    'Buch',
                                ],
                                'extra' => [
                                    'ich kann',
                                    'Park',
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
                            '私',
                            'は',
                            '行ける',
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
                            'de' => [
                                'sentence' => 'Ich kann gehen',
                                'correct' => [
                                    'ich kann',
                                    'gehen',
                                ],
                                'extra' => [
                                    'ich will',
                                    'Buch',
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
                            '私',
                            'は',
                            '公園',
                            'へ',
                            '行きたい',
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
                            'de' => [
                                'sentence' => 'Ich will zum Park gehen',
                                'correct' => [
                                    'ich will',
                                    'gehen',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'ich kann',
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
            $builder->lesson('レッスン4: 友達・家', 4,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => '準備ができた',
                    ],
                    [
                        'ja' => '暇',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '準備ができた',
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
                            'de' => [
                                'sentence' => 'Ich bin bereit',
                                'correct' => [
                                    'ich bin',
                                    'bereit',
                                ],
                                'extra' => [
                                    'frei',
                                    'Freund',
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
                            '私の',
                            '友達',
                            'は',
                            '暇',
                            'です',
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
                            'de' => [
                                'sentence' => 'Mein Freund ist frei',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'frei',
                                ],
                                'extra' => [
                                    'bereit',
                                    'Haus',
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
                            '家',
                            'で',
                            '準備ができた',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Bereit im Haus',
                                'correct' => [
                                    'bereit',
                                    'in',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'frei',
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
            $builder->lesson('レッスン5: 学校・友達', 5,
                pictures: [
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'ja' => '次の',
                    ],
                    [
                        'ja' => '週',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '来',
                            '週',
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
                            'de' => [
                                'sentence' => 'Nächste Woche',
                                'correct' => [
                                    'nächste',
                                    'Woche',
                                ],
                                'extra' => [
                                    'Schule',
                                    'Freund',
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
                            '私',
                            'は',
                            '来',
                            '週',
                            '行く',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Ich gehe nächste Woche',
                                'correct' => [
                                    'ich gehe',
                                    'nächste',
                                    'Woche',
                                ],
                                'extra' => [
                                    'Schule',
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
                            '私の',
                            '友達',
                            'と',
                            '学校',
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
                                    'Woche',
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
