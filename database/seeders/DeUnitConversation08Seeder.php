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
                            'az' => ['sentence' => 'salam mənim dost', 'correct' => ['salam', 'mənim', 'dost'], 'extra' => ['telefon', 'ana']],
                            'ar' => ['sentence' => 'مرحبا صديق', 'correct' => ['مرحبا', 'صديق'], 'extra' => ['هاتف', 'أم']],
                            'ru' => ['sentence' => 'привет мой друг', 'correct' => ['привет', 'мой', 'друг'], 'extra' => ['телефон', 'мама']],
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
                            'tr' => ['sentence' => 'merhaba arkadaşım', 'correct' => ['merhaba', 'arkadaşım'], 'extra' => ['telefon', 'anne']],
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
                            'az' => ['sentence' => 'telefon', 'correct' => ['telefon'], 'extra' => ['salam', 'ana']],
                            'ar' => ['sentence' => 'هاتف', 'correct' => ['هاتف'], 'extra' => ['مرحبا', 'أم']],
                            'ru' => ['sentence' => 'телефон', 'correct' => ['телефон'], 'extra' => ['привет', 'мама']],
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
                            'tr' => ['sentence' => 'telefon', 'correct' => ['telefon'], 'extra' => ['merhaba', 'anne']],
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
                            'az' => ['sentence' => 'salam ana üzərində telefon', 'correct' => ['salam', 'ana', 'üzərində', 'telefon'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'مرحبا أم على هاتف', 'correct' => ['مرحبا', 'أم', 'على', 'هاتف'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'привет мама на телефон', 'correct' => ['привет', 'мама', 'на', 'телефон'], 'extra' => ['друг']],
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
                            'tr' => ['sentence' => 'merhaba anne telefonda', 'correct' => ['merhaba', 'anne', 'telefonda'], 'extra' => ['arkadaş']],
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
                            'az' => ['sentence' => 'zəng et həkim', 'correct' => ['zəng et', 'həkim'], 'extra' => ['gözlə', 'dost']],
                            'ar' => ['sentence' => 'اتصل طبيب', 'correct' => ['اتصل', 'طبيب'], 'extra' => ['انتظر', 'صديق']],
                            'ru' => ['sentence' => 'позвони врач', 'correct' => ['позвони', 'врач'], 'extra' => ['подожди', 'друг']],
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
                            'tr' => ['sentence' => 'doktoru ara', 'correct' => ['doktoru', 'ara'], 'extra' => ['bekle', 'arkadaş']],
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
                            'az' => ['sentence' => 'gözlə az', 'correct' => ['gözlə', 'az'], 'extra' => ['zəng et', 'həkim']],
                            'ar' => ['sentence' => 'انتظر قليل', 'correct' => ['انتظر', 'قليل'], 'extra' => ['اتصل', 'طبيب']],
                            'ru' => ['sentence' => 'подожди немного', 'correct' => ['подожди', 'немного'], 'extra' => ['позвони', 'врач']],
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
                            'tr' => ['sentence' => 'biraz bekle', 'correct' => ['biraz', 'bekle'], 'extra' => ['ara', 'doktor']],
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
                            'az' => ['sentence' => 'zəng et mənim dost və gözlə', 'correct' => ['zəng et', 'mənim', 'dost', 'və', 'gözlə'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'اتصل صديق و انتظر', 'correct' => ['اتصل', 'صديق', 'و', 'انتظر'], 'extra' => ['طبيب']],
                            'ru' => ['sentence' => 'позвони мой друг и подожди', 'correct' => ['позвони', 'мой', 'друг', 'и', 'подожди'], 'extra' => ['врач']],
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
                            'tr' => ['sentence' => 'arkadaşımı ara ve bekle', 'correct' => ['arkadaşımı', 'ara', 've', 'bekle'], 'extra' => ['doktor']],
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
                            'az' => ['sentence' => 'bir mesaj üçün müəllim', 'correct' => ['bir', 'mesaj', 'üçün', 'müəllim'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'رسالة لأجل معلم', 'correct' => ['رسالة', 'لأجل', 'معلم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'сообщение для учитель', 'correct' => ['сообщение', 'для', 'учитель'], 'extra' => ['друг']],
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
                            'tr' => ['sentence' => 'öğretmen için bir mesaj', 'correct' => ['öğretmen', 'için', 'bir', 'mesaj'], 'extra' => ['arkadaş']],
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
                            'az' => ['sentence' => 'geri zəng et sonradan', 'correct' => ['geri zəng et', 'sonradan'], 'extra' => ['mesaj']],
                            'ar' => ['sentence' => 'عاود الاتصال لاحقا', 'correct' => ['عاود الاتصال', 'لاحقا'], 'extra' => ['رسالة']],
                            'ru' => ['sentence' => 'перезвони позже', 'correct' => ['перезвони', 'позже'], 'extra' => ['сообщение']],
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
                            'tr' => ['sentence' => 'sonra tekrar ara', 'correct' => ['sonra', 'tekrar', 'ara'], 'extra' => ['mesaj']],
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
                            'az' => ['sentence' => 'bir mesaj üçün mənim dost', 'correct' => ['bir', 'mesaj', 'üçün', 'mənim', 'dost'], 'extra' => ['müəllim']],
                            'ar' => ['sentence' => 'رسالة لأجل صديق', 'correct' => ['رسالة', 'لأجل', 'صديق'], 'extra' => ['معلم']],
                            'ru' => ['sentence' => 'сообщение для мой друг', 'correct' => ['сообщение', 'для', 'мой', 'друг'], 'extra' => ['учитель']],
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
                            'tr' => ['sentence' => 'arkadaşım için bir mesaj', 'correct' => ['arkadaşım', 'için', 'bir', 'mesaj'], 'extra' => ['öğretmen']],
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
                            'az' => ['sentence' => 'mənim bacı məşğul', 'correct' => ['mənim', 'bacı', 'məşğul'], 'extra' => ['bağışlayın', 'həkim']],
                            'ar' => ['sentence' => 'أخت مشغول', 'correct' => ['أخت', 'مشغول'], 'extra' => ['آسف', 'طبيب']],
                            'ru' => ['sentence' => 'мой сестра занят', 'correct' => ['мой', 'сестра', 'занят'], 'extra' => ['извините', 'врач']],
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
                            'tr' => ['sentence' => 'kız kardeşim meşgul', 'correct' => ['kız', 'kardeşim', 'meşgul'], 'extra' => ['üzgünüm', 'doktor']],
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
                            'az' => ['sentence' => 'bağışlayın geri zəng et sonradan', 'correct' => ['bağışlayın', 'geri zəng et', 'sonradan'], 'extra' => ['məşğul']],
                            'ar' => ['sentence' => 'آسف عاود الاتصال لاحقا', 'correct' => ['آسف', 'عاود الاتصال', 'لاحقا'], 'extra' => ['مشغول']],
                            'ru' => ['sentence' => 'извините перезвони позже', 'correct' => ['извините', 'перезвони', 'позже'], 'extra' => ['занят']],
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
                            'tr' => ['sentence' => 'üzgünüm sonra tekrar ara', 'correct' => ['üzgünüm', 'sonra', 'tekrar', 'ara'], 'extra' => ['meşgul']],
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
                            'az' => ['sentence' => 'həkim məşğul', 'correct' => ['həkim', 'məşğul'], 'extra' => ['bağışlayın']],
                            'ar' => ['sentence' => 'طبيب مشغول', 'correct' => ['طبيب', 'مشغول'], 'extra' => ['آسف']],
                            'ru' => ['sentence' => 'врач занят', 'correct' => ['врач', 'занят'], 'extra' => ['извините']],
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
                            'tr' => ['sentence' => 'doktor meşgul', 'correct' => ['doktor', 'meşgul'], 'extra' => ['üzgünüm']],
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
                            'az' => ['sentence' => 'zəng et mənə sabah', 'correct' => ['zəng et', 'mənə', 'sabah'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'اتصل لي غدا', 'correct' => ['اتصل', 'لي', 'غدا'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'позвони меня завтра', 'correct' => ['позвони', 'меня', 'завтра'], 'extra' => ['друг']],
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
                            'tr' => ['sentence' => 'yarın beni ara', 'correct' => ['yarın', 'beni', 'ara'], 'extra' => ['arkadaş']],
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
                            'az' => ['sentence' => 'zəng et mənim ana', 'correct' => ['zəng et', 'mənim', 'ana'], 'extra' => ['sabah', 'dost']],
                            'ar' => ['sentence' => 'اتصل أم', 'correct' => ['اتصل', 'أم'], 'extra' => ['غدا', 'صديق']],
                            'ru' => ['sentence' => 'позвони мой мама', 'correct' => ['позвони', 'мой', 'мама'], 'extra' => ['завтра', 'друг']],
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
                            'tr' => ['sentence' => 'annemi ara', 'correct' => ['annemi', 'ara'], 'extra' => ['yarın', 'arkadaş']],
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
                            'az' => ['sentence' => 'zəng et mənim dost sabah', 'correct' => ['zəng et', 'mənim', 'dost', 'sabah'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'اتصل صديق غدا', 'correct' => ['اتصل', 'صديق', 'غدا'], 'extra' => ['أم']],
                            'ru' => ['sentence' => 'позвони мой друг завтра', 'correct' => ['позвони', 'мой', 'друг', 'завтра'], 'extra' => ['мама']],
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
                            'tr' => ['sentence' => 'yarın arkadaşımı ara', 'correct' => ['yarın', 'arkadaşımı', 'ara'], 'extra' => ['anne']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
