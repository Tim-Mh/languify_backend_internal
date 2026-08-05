<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation08Seeder extends Seeder
{
    private const PICTURES = [
        '友達' => 'friend',
        '母' => 'mother',
        '医者' => 'doctor',
        '家' => 'house',
        '先生' => 'teacher',
        '姉妹' => 'sister',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 8, the Japanese twin of the
     * English "Unit 8: Phone Conversations" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'ユニット8: 電話の会話', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 友達・母', 1,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '母',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'ja' => '電話',
                    ],
                    [
                        'ja' => 'こんにちは',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'こんにちは',
                            '私の',
                            '友達',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'hello my friend',
                                'correct' => [
                                    'hello',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'phone',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Hola, mi amigo',
                                'correct' => [
                                    'hola',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'teléfono',
                                    'madre',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hallo, mein Freund',
                                'correct' => [
                                    'hallo',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'Telefon',
                                    'Mutter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Bonjour, mon ami',
                                'correct' => [
                                    'bonjour',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'téléphone',
                                    'mère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '안녕하세요, 나의 친구',
                                'correct' => [
                                    '안녕하세요',
                                    '나의',
                                    '친구',
                                ],
                                'extra' => [
                                    '전화',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'その',
                            '電話',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the phone',
                                'correct' => [
                                    'the',
                                    'phone',
                                ],
                                'extra' => [
                                    'hello',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El teléfono',
                                'correct' => [
                                    'el',
                                    'teléfono',
                                ],
                                'extra' => [
                                    'hola',
                                    'madre',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Telefon',
                                'correct' => [
                                    'das',
                                    'Telefon',
                                ],
                                'extra' => [
                                    'hallo',
                                    'Mutter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le téléphone',
                                'correct' => [
                                    'le',
                                    'téléphone',
                                ],
                                'extra' => [
                                    'bonjour',
                                    'mère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그 전화',
                                'correct' => [
                                    '그',
                                    '전화',
                                ],
                                'extra' => [
                                    '안녕하세요',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'こんにちは',
                            '電話',
                            'の',
                            '母',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'hello mother on the phone',
                                'correct' => [
                                    'hello',
                                    'mother',
                                    'on',
                                    'the',
                                    'phone',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Hola, madre, al teléfono',
                                'correct' => [
                                    'hola',
                                    'madre',
                                    'sobre',
                                    'el',
                                    'teléfono',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hallo, Mutter, am Telefon',
                                'correct' => [
                                    'hallo',
                                    'Mutter',
                                    'auf',
                                    'dem',
                                    'Telefon',
                                ],
                                'extra' => [
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Bonjour maman, au téléphone',
                                'correct' => [
                                    'bonjour',
                                    'mère',
                                    'sur',
                                    'le',
                                    'téléphone',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여보세요, 어머니, 전화로',
                                'correct' => [
                                    '여보세요',
                                    '어머니',
                                    '전화로',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 医者・友達', 2,
                pictures: [
                    [
                        'ja' => '医者',
                        'img' => 'doctor',
                    ],
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'ja' => '電話する',
                    ],
                    [
                        'ja' => '待つ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '医者',
                            'に',
                            '電話する',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'call the doctor',
                                'correct' => [
                                    'call',
                                    'the',
                                    'doctor',
                                ],
                                'extra' => [
                                    'wait',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Llama al médico',
                                'correct' => [
                                    'llamar',
                                    'el',
                                    'médico',
                                ],
                                'extra' => [
                                    'esperar',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ruf den Arzt an',
                                'correct' => [
                                    'anrufen',
                                    'den',
                                    'Arzt',
                                ],
                                'extra' => [
                                    'warten',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Appelle le médecin',
                                'correct' => [
                                    'appeler',
                                    'le',
                                    'médecin',
                                ],
                                'extra' => [
                                    'attendre',
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '의사에게 전화하다',
                                'correct' => [
                                    '의사에게',
                                    '전화하다',
                                ],
                                'extra' => [
                                    '기다리다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '少し',
                            '待つ',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'wait a little',
                                'correct' => [
                                    'wait',
                                    'a little',
                                ],
                                'extra' => [
                                    'call',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Espera un poco',
                                'correct' => [
                                    'esperar',
                                    'un poco',
                                ],
                                'extra' => [
                                    'llamar',
                                    'médico',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Warte ein bisschen',
                                'correct' => [
                                    'warten',
                                    'ein bisschen',
                                ],
                                'extra' => [
                                    'anrufen',
                                    'Arzt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Attends un peu',
                                'correct' => [
                                    'attendre',
                                    'un peu',
                                ],
                                'extra' => [
                                    'appeler',
                                    'médecin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '조금 기다리다',
                                'correct' => [
                                    '조금',
                                    '기다리다',
                                ],
                                'extra' => [
                                    '전화하다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '友達',
                            'に',
                            '電話',
                            'して',
                            '待つ',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'call my friend and wait',
                                'correct' => [
                                    'call',
                                    'my',
                                    'friend',
                                    'and',
                                    'wait',
                                ],
                                'extra' => [
                                    'doctor',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Llama a mi amigo y espera',
                                'correct' => [
                                    'llamar',
                                    'mi',
                                    'amigo',
                                    'y',
                                    'esperar',
                                ],
                                'extra' => [
                                    'médico',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ruf meinen Freund an und warte',
                                'correct' => [
                                    'anrufen',
                                    'mein',
                                    'Freund',
                                    'und',
                                    'warten',
                                ],
                                'extra' => [
                                    'Arzt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Appelle mon ami et attends',
                                'correct' => [
                                    'appeler',
                                    'mon',
                                    'ami',
                                    'et',
                                    'attendre',
                                ],
                                'extra' => [
                                    'médecin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '친구에게 전화하고 기다리다',
                                'correct' => [
                                    '친구에게',
                                    '전화하고',
                                    '기다리다',
                                ],
                                'extra' => [
                                    '의사',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 先生・友達', 3,
                pictures: [
                    [
                        'ja' => '先生',
                        'img' => 'teacher',
                    ],
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'メッセージ',
                    ],
                    [
                        'ja' => '折り返す',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '先生',
                            'へ',
                            'の',
                            'メッセージ',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a message for the teacher',
                                'correct' => [
                                    'a',
                                    'message',
                                    'for',
                                    'the',
                                    'teacher',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un mensaje para el profesor',
                                'correct' => [
                                    'un',
                                    'mensaje',
                                    'para',
                                    'el',
                                    'profesor',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Nachricht für den Lehrer',
                                'correct' => [
                                    'eine',
                                    'Nachricht',
                                    'für',
                                    'den',
                                    'Lehrer',
                                ],
                                'extra' => [
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un message pour le professeur',
                                'correct' => [
                                    'un',
                                    'message',
                                    'pour',
                                    'le',
                                    'professeur',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '선생님에게 메시지',
                                'correct' => [
                                    '선생님에게',
                                    '메시지',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '後で',
                            '折り返す',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'call back later',
                                'correct' => [
                                    'call back',
                                    'later',
                                ],
                                'extra' => [
                                    'message',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Devuelve la llamada más tarde',
                                'correct' => [
                                    'devolver la llamada',
                                    'más tarde',
                                ],
                                'extra' => [
                                    'mensaje',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ruf später zurück',
                                'correct' => [
                                    'zurückrufen',
                                    'später',
                                ],
                                'extra' => [
                                    'Nachricht',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Rappelle plus tard',
                                'correct' => [
                                    'rappeler',
                                    'plus tard',
                                ],
                                'extra' => [
                                    'message',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나중에 다시 전화하다',
                                'correct' => [
                                    '나중에',
                                    '다시',
                                    '전화하다',
                                ],
                                'extra' => [
                                    '메시지',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '友達',
                            'へ',
                            'の',
                            'メッセージ',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a message for my friend',
                                'correct' => [
                                    'a',
                                    'message',
                                    'for',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'teacher',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un mensaje para mi amigo',
                                'correct' => [
                                    'un',
                                    'mensaje',
                                    'para',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'profesor',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Nachricht für meinen Freund',
                                'correct' => [
                                    'eine',
                                    'Nachricht',
                                    'für',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'Lehrer',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un message pour mon ami',
                                'correct' => [
                                    'un',
                                    'message',
                                    'pour',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'professeur',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '친구에게 메시지',
                                'correct' => [
                                    '친구에게',
                                    '메시지',
                                ],
                                'extra' => [
                                    '선생님',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 姉妹・医者', 4,
                pictures: [
                    [
                        'ja' => '姉妹',
                        'img' => 'sister',
                    ],
                    [
                        'ja' => '医者',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'ja' => '忙しい',
                    ],
                    [
                        'ja' => 'ごめんなさい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私の',
                            '姉妹',
                            'は',
                            '忙しい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my sister is busy',
                                'correct' => [
                                    'my',
                                    'sister',
                                    'is',
                                    'busy',
                                ],
                                'extra' => [
                                    'sorry',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi hermana está ocupada',
                                'correct' => [
                                    'mi',
                                    'hermana',
                                    'está',
                                    'ocupado',
                                ],
                                'extra' => [
                                    'lo siento',
                                    'médico',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Schwester ist beschäftigt',
                                'correct' => [
                                    'meine',
                                    'Schwester',
                                    'ist',
                                    'beschäftigt',
                                ],
                                'extra' => [
                                    'Entschuldigung',
                                    'Arzt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma sœur est occupée',
                                'correct' => [
                                    'ma',
                                    'sœur',
                                    'est',
                                    'occupé',
                                ],
                                'extra' => [
                                    'désolé',
                                    'médecin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 자매는 바쁩니다',
                                'correct' => [
                                    '나의',
                                    '자매는',
                                    '바쁩니다',
                                ],
                                'extra' => [
                                    '죄송합니다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ごめんなさい',
                            '後で',
                            '折り返す',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'sorry call back later',
                                'correct' => [
                                    'sorry',
                                    'call back',
                                    'later',
                                ],
                                'extra' => [
                                    'busy',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Lo siento, devuelve la llamada más tarde',
                                'correct' => [
                                    'lo siento',
                                    'devolver la llamada',
                                    'más tarde',
                                ],
                                'extra' => [
                                    'ocupado',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Entschuldigung, ruf später zurück',
                                'correct' => [
                                    'Entschuldigung',
                                    'zurückrufen',
                                    'später',
                                ],
                                'extra' => [
                                    'beschäftigt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Désolé, rappelle plus tard',
                                'correct' => [
                                    'désolé',
                                    'rappeler',
                                    'plus tard',
                                ],
                                'extra' => [
                                    'occupé',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '죄송합니다, 나중에 다시 전화하다',
                                'correct' => [
                                    '죄송합니다',
                                    '나중에',
                                    '다시',
                                    '전화하다',
                                ],
                                'extra' => [
                                    '바쁜',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '医者',
                            'は',
                            '忙しい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the doctor is busy',
                                'correct' => [
                                    'the',
                                    'doctor',
                                    'is',
                                    'busy',
                                ],
                                'extra' => [
                                    'sorry',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El médico está ocupado',
                                'correct' => [
                                    'el',
                                    'médico',
                                    'está',
                                    'ocupado',
                                ],
                                'extra' => [
                                    'lo siento',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Arzt ist beschäftigt',
                                'correct' => [
                                    'der',
                                    'Arzt',
                                    'ist',
                                    'beschäftigt',
                                ],
                                'extra' => [
                                    'Entschuldigung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le médecin est occupé',
                                'correct' => [
                                    'le',
                                    'médecin',
                                    'est',
                                    'occupé',
                                ],
                                'extra' => [
                                    'désolé',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '의사는 바쁩니다',
                                'correct' => [
                                    '의사는',
                                    '바쁩니다',
                                ],
                                'extra' => [
                                    '죄송합니다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 友達・母', 5,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '母',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'ja' => '電話する',
                    ],
                    [
                        'ja' => '明日',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '明日',
                            '電話',
                            'して',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'call me tomorrow',
                                'correct' => [
                                    'call',
                                    'me',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Llámame mañana',
                                'correct' => [
                                    'llamar',
                                    'me',
                                    'mañana',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ruf mich morgen an',
                                'correct' => [
                                    'anrufen',
                                    'mich',
                                    'morgen',
                                ],
                                'extra' => [
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Appelle-moi demain',
                                'correct' => [
                                    'appeler',
                                    'moi',
                                    'demain',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '내일 전화해',
                                'correct' => [
                                    '내일',
                                    '전화해',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '母',
                            'に',
                            '電話する',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'call my mother',
                                'correct' => [
                                    'call',
                                    'my',
                                    'mother',
                                ],
                                'extra' => [
                                    'tomorrow',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Llama a mi madre',
                                'correct' => [
                                    'llamar',
                                    'mi',
                                    'madre',
                                ],
                                'extra' => [
                                    'mañana',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ruf meine Mutter an',
                                'correct' => [
                                    'anrufen',
                                    'meine',
                                    'Mutter',
                                ],
                                'extra' => [
                                    'morgen',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Appelle ma mère',
                                'correct' => [
                                    'appeler',
                                    'ma',
                                    'mère',
                                ],
                                'extra' => [
                                    'demain',
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어머니에게 전화하다',
                                'correct' => [
                                    '어머니에게',
                                    '전화하다',
                                ],
                                'extra' => [
                                    '내일',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '明日',
                            '友達',
                            'に',
                            '電話する',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'call my friend tomorrow',
                                'correct' => [
                                    'call',
                                    'my',
                                    'friend',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'mother',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Llama a mi amigo mañana',
                                'correct' => [
                                    'llamar',
                                    'mi',
                                    'amigo',
                                    'mañana',
                                ],
                                'extra' => [
                                    'madre',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ruf meinen Freund morgen an',
                                'correct' => [
                                    'anrufen',
                                    'mein',
                                    'Freund',
                                    'morgen',
                                ],
                                'extra' => [
                                    'Mutter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Appelle mon ami demain',
                                'correct' => [
                                    'appeler',
                                    'mon',
                                    'ami',
                                    'demain',
                                ],
                                'extra' => [
                                    'mère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '내일 친구에게 전화하다',
                                'correct' => [
                                    '내일',
                                    '친구에게',
                                    '전화하다',
                                ],
                                'extra' => [
                                    '어머니',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
