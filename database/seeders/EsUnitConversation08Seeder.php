<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation08Seeder extends Seeder
{
    private const PICTURES = [
        'amigo' => 'friend',
        'madre' => 'mother',
        'médico' => 'doctor',
        'casa' => 'house',
        'profesor' => 'teacher',
        'hermana' => 'sister',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 8, the Spanish twin of the
     * English "Unit 8: Phone Conversations" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unidad 8: Conversaciones telefónicas', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Amigo y Madre', 1,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'madre',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'es' => 'teléfono',
                    ],
                    [
                        'es' => 'hola',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hola',
                            'mi',
                            'amigo',
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
                            'El',
                            'teléfono',
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
                            'Hola',
                            'madre',
                            'al',
                            'teléfono',
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
            $builder->lesson('Lección 2: Médico y Amigo', 2,
                pictures: [
                    [
                        'es' => 'médico',
                        'img' => 'doctor',
                    ],
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'es' => 'llamar',
                    ],
                    [
                        'es' => 'esperar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Llama',
                            'al',
                            'médico',
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
                            'Espera',
                            'un',
                            'poco',
                        ],
                        'blank' => 0,
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
                            'Llama',
                            'a',
                            'mi',
                            'amigo',
                            'y',
                            'espera',
                        ],
                        'blank' => 5,
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
            $builder->lesson('Lección 3: Profesor y Amigo', 3,
                pictures: [
                    [
                        'es' => 'profesor',
                        'img' => 'teacher',
                    ],
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'es' => 'mensaje',
                    ],
                    [
                        'es' => 'devolver la llamada',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'mensaje',
                            'para',
                            'el',
                            'profesor',
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
                            'Devuelve',
                            'la',
                            'llamada',
                            'más',
                            'tarde',
                        ],
                        'blank' => 0,
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
                            'Un',
                            'mensaje',
                            'para',
                            'mi',
                            'amigo',
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
            $builder->lesson('Lección 4: Hermana y Médico', 4,
                pictures: [
                    [
                        'es' => 'hermana',
                        'img' => 'sister',
                    ],
                    [
                        'es' => 'médico',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ocupado',
                    ],
                    [
                        'es' => 'lo siento',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mi',
                            'hermana',
                            'está',
                            'ocupada',
                        ],
                        'blank' => 1,
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
                            'Lo',
                            'siento',
                            'devuelve',
                            'la',
                            'llamada',
                            'más',
                            'tarde',
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
                            'El',
                            'médico',
                            'está',
                            'ocupado',
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
            $builder->lesson('Lección 5: Amigo y Madre', 5,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'madre',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'es' => 'llamar',
                    ],
                    [
                        'es' => 'mañana',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Llámame',
                            'mañana',
                        ],
                        'blank' => 1,
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
                            'Llama',
                            'a',
                            'mi',
                            'madre',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'call my mother',
                                'correct' => [
                                    'call',
                                    'my',
                                    'mother',
                                ],
                                'extra' => [
                                    'morning',
                                    'friend',
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
                            'Llama',
                            'a',
                            'mi',
                            'amigo',
                            'mañana',
                        ],
                        'blank' => 4,
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
