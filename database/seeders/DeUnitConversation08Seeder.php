<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation08Seeder extends Seeder
{
    private const PICTURES = [
        'Freund' => 'friend',
        'Mutter' => 'mother',
        'Arzt' => 'doctor',
        'Haus' => 'house',
        'Lehrer' => 'teacher',
        'Schwester' => 'sister',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 8, the German twin of the
     * English "Unit 8: Phone Conversations" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Einheit 8: Telefongespräche', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Freund & Mutter', 1,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Mutter',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Telefon',
                    ],
                    [
                        'de' => 'hallo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hallo',
                            'mein',
                            'Freund',
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
                                    'mother',
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
                            'ja' => [
                                'sentence' => 'こんにちは、私の友達',
                                'correct' => [
                                    'こんにちは',
                                    '私の',
                                    '友達',
                                ],
                                'extra' => [
                                    '電話',
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
                            'Das',
                            'Telefon',
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
                                    'mother',
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
                            'ja' => [
                                'sentence' => 'その電話',
                                'correct' => [
                                    'その',
                                    '電話',
                                ],
                                'extra' => [
                                    'こんにちは',
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
                            'Hallo',
                            'Mutter',
                            'am',
                            'Telefon',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'もしもし、母さん、電話で',
                                'correct' => [
                                    'もしもし',
                                    '母さん',
                                    '電話',
                                    'で',
                                ],
                                'extra' => [
                                    '友達',
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
            $builder->lesson('Lektion 2: Arzt & Freund', 2,
                pictures: [
                    [
                        'de' => 'Arzt',
                        'img' => 'doctor',
                    ],
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'de' => 'anrufen',
                    ],
                    [
                        'de' => 'warten',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ruf',
                            'den',
                            'Arzt',
                            'an',
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
                                    'friend',
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
                            'ja' => [
                                'sentence' => '医者に電話する',
                                'correct' => [
                                    '医者',
                                    'に',
                                    '電話する',
                                ],
                                'extra' => [
                                    '待つ',
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
                            'Warte',
                            'ein',
                            'bisschen',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'wait a little',
                                'correct' => [
                                    'wait',
                                    'a little',
                                ],
                                'extra' => [
                                    'call',
                                    'doctor',
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
                            'ja' => [
                                'sentence' => '少し待つ',
                                'correct' => [
                                    '少し',
                                    '待つ',
                                ],
                                'extra' => [
                                    '電話する',
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
                            'Ruf',
                            'meinen',
                            'Freund',
                            'an',
                            'und',
                            'warte',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '友達に電話して待つ',
                                'correct' => [
                                    '友達',
                                    'に',
                                    '電話',
                                    'して',
                                    '待つ',
                                ],
                                'extra' => [
                                    '医者',
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
            $builder->lesson('Lektion 3: Lehrer & Freund', 3,
                pictures: [
                    [
                        'de' => 'Lehrer',
                        'img' => 'teacher',
                    ],
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Nachricht',
                    ],
                    [
                        'de' => 'zurückrufen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Nachricht',
                            'für',
                            'den',
                            'Lehrer',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '先生へのメッセージ',
                                'correct' => [
                                    '先生',
                                    'へ',
                                    'の',
                                    'メッセージ',
                                ],
                                'extra' => [
                                    '友達',
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
                            'Ruf',
                            'später',
                            'zurück',
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
                            'ja' => [
                                'sentence' => '後で折り返す',
                                'correct' => [
                                    '後で',
                                    '折り返す',
                                ],
                                'extra' => [
                                    'メッセージ',
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
                            'Eine',
                            'Nachricht',
                            'für',
                            'meinen',
                            'Freund',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '友達へのメッセージ',
                                'correct' => [
                                    '友達',
                                    'へ',
                                    'の',
                                    'メッセージ',
                                ],
                                'extra' => [
                                    '先生',
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
            $builder->lesson('Lektion 4: Schwester & Arzt', 4,
                pictures: [
                    [
                        'de' => 'Schwester',
                        'img' => 'sister',
                    ],
                    [
                        'de' => 'Arzt',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'de' => 'beschäftigt',
                    ],
                    [
                        'de' => 'Entschuldigung',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Meine',
                            'Schwester',
                            'ist',
                            'beschäftigt',
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
                                    'doctor',
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
                            'ja' => [
                                'sentence' => '私の姉妹は忙しいです',
                                'correct' => [
                                    '私の',
                                    '姉妹',
                                    'は',
                                    '忙しい',
                                    'です',
                                ],
                                'extra' => [
                                    'ごめんなさい',
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
                            'Entschuldigung',
                            'ruf',
                            'später',
                            'zurück',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'ごめんなさい、後で折り返す',
                                'correct' => [
                                    'ごめんなさい',
                                    '後で',
                                    '折り返す',
                                ],
                                'extra' => [
                                    '忙しい',
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
                            'Der',
                            'Arzt',
                            'ist',
                            'beschäftigt',
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
                            'ja' => [
                                'sentence' => '医者は忙しいです',
                                'correct' => [
                                    '医者',
                                    'は',
                                    '忙しい',
                                    'です',
                                ],
                                'extra' => [
                                    'ごめんなさい',
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
            $builder->lesson('Lektion 5: Freund & Mutter', 5,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Mutter',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'de' => 'anrufen',
                    ],
                    [
                        'de' => 'morgen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ruf',
                            'mich',
                            'morgen',
                            'an',
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
                            'ja' => [
                                'sentence' => '明日電話して',
                                'correct' => [
                                    '明日',
                                    '電話',
                                    'して',
                                ],
                                'extra' => [
                                    '友達',
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
                            'Ruf',
                            'meine',
                            'Mutter',
                            'an',
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
                                    'friend',
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
                            'ja' => [
                                'sentence' => '母に電話する',
                                'correct' => [
                                    '母',
                                    'に',
                                    '電話する',
                                ],
                                'extra' => [
                                    '明日',
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
                            'Ruf',
                            'meinen',
                            'Freund',
                            'morgen',
                            'an',
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
                            'ja' => [
                                'sentence' => '明日友達に電話する',
                                'correct' => [
                                    '明日',
                                    '友達',
                                    'に',
                                    '電話する',
                                ],
                                'extra' => [
                                    '母',
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
