<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation08Seeder extends Seeder
{
    private const PICTURES = [
        'Friend' => 'friend', 'Mother' => 'mother', 'Doctor' => 'doctor', 'House' => 'house',
        'Teacher' => 'teacher', 'Sister' => 'sister',
    ];

    /**
     * English Chapter 2, Unit 8 — phone conversations.
     *
     * Everything you say on a call before you get to the point — hello, call,
     * wait, message, call back, busy, sorry — practised against the people from
     * Chapter 1 you might be calling.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Phone Conversations', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Hello?', 1,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Mother', 'img' => 'mother']],
                plain: [['en' => 'Phone'], ['en' => 'Hello']],
                phrases: [
                    'a' => [
                        'words' => ['hello', 'my', 'friend'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Hola, mi amigo', 'correct' => ['hola', 'mi', 'amigo'], 'extra' => ['teléfono', 'madre']],
                            'de' => ['sentence' => 'Hallo, mein Freund', 'correct' => ['hallo', 'mein', 'Freund'], 'extra' => ['Telefon', 'Mutter']],
                            'ja' => ['sentence' => 'こんにちは、私の友達', 'correct' => ['こんにちは', '私の', '友達'], 'extra' => ['電話']],
                            'ko' => ['sentence' => '안녕하세요, 나의 친구', 'correct' => ['안녕하세요', '나의', '친구'], 'extra' => ['전화']],
                            'fr' => ['sentence' => 'Bonjour, mon ami', 'correct' => ['bonjour', 'mon', 'ami'], 'extra' => ['téléphone', 'mère']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'phone'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El teléfono', 'correct' => ['el', 'teléfono'], 'extra' => ['hola', 'madre']],
                            'de' => ['sentence' => 'Das Telefon', 'correct' => ['das', 'Telefon'], 'extra' => ['hallo', 'Mutter']],
                            'ja' => ['sentence' => 'その電話', 'correct' => ['その', '電話'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '그 전화', 'correct' => ['그', '전화'], 'extra' => ['안녕하세요']],
                            'fr' => ['sentence' => 'Le téléphone', 'correct' => ['le', 'téléphone'], 'extra' => ['bonjour', 'mère']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hello', 'mother', 'on', 'the', 'phone'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Hola, madre, al teléfono', 'correct' => ['hola', 'madre', 'sobre', 'el', 'teléfono'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Hallo, Mutter, am Telefon', 'correct' => ['hallo', 'Mutter', 'auf', 'dem', 'Telefon'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => 'もしもし、母さん、電話で', 'correct' => ['もしもし', '母さん', '電話', 'で'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '여보세요, 어머니, 전화로', 'correct' => ['여보세요', '어머니', '전화로'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Bonjour maman, au téléphone', 'correct' => ['bonjour', 'mère', 'sur', 'le', 'téléphone'], 'extra' => ['ami']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Call & Wait', 2,
                pictures: [['en' => 'Doctor', 'img' => 'doctor'], ['en' => 'Friend', 'img' => 'friend']],
                plain: [['en' => 'Call'], ['en' => 'Wait']],
                phrases: [
                    'a' => [
                        'words' => ['call', 'the', 'doctor'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Llama al médico', 'correct' => ['llamar', 'el', 'médico'], 'extra' => ['esperar', 'amigo']],
                            'de' => ['sentence' => 'Ruf den Arzt an', 'correct' => ['anrufen', 'den', 'Arzt'], 'extra' => ['warten', 'Freund']],
                            'ja' => ['sentence' => '医者に電話する', 'correct' => ['医者', 'に', '電話する'], 'extra' => ['待つ']],
                            'ko' => ['sentence' => '의사에게 전화하다', 'correct' => ['의사에게', '전화하다'], 'extra' => ['기다리다']],
                            'fr' => ['sentence' => 'Appelle le médecin', 'correct' => ['appeler', 'le', 'médecin'], 'extra' => ['attendre', 'ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['wait', 'a little'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Espera un poco', 'correct' => ['esperar', 'un poco'], 'extra' => ['llamar', 'médico']],
                            'de' => ['sentence' => 'Warte ein bisschen', 'correct' => ['warten', 'ein bisschen'], 'extra' => ['anrufen', 'Arzt']],
                            'ja' => ['sentence' => '少し待つ', 'correct' => ['少し', '待つ'], 'extra' => ['電話する']],
                            'ko' => ['sentence' => '조금 기다리다', 'correct' => ['조금', '기다리다'], 'extra' => ['전화하다']],
                            'fr' => ['sentence' => 'Attends un peu', 'correct' => ['attendre', 'un peu'], 'extra' => ['appeler', 'médecin']],
                        ],
                    ],
                    'c' => [
                        'words' => ['call', 'my', 'friend', 'and', 'wait'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Llama a mi amigo y espera', 'correct' => ['llamar', 'mi', 'amigo', 'y', 'esperar'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Ruf meinen Freund an und warte', 'correct' => ['anrufen', 'mein', 'Freund', 'und', 'warten'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '友達に電話して待つ', 'correct' => ['友達', 'に', '電話', 'して', '待つ'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '친구에게 전화하고 기다리다', 'correct' => ['친구에게', '전화하고', '기다리다'], 'extra' => ['의사']],
                            'fr' => ['sentence' => 'Appelle mon ami et attends', 'correct' => ['appeler', 'mon', 'ami', 'et', 'attendre'], 'extra' => ['médecin']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Message & Call Back', 3,
                pictures: [['en' => 'Teacher', 'img' => 'teacher'], ['en' => 'Friend', 'img' => 'friend']],
                plain: [['en' => 'Message'], ['en' => 'Call back']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'message', 'for', 'the', 'teacher'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un mensaje para el profesor', 'correct' => ['un', 'mensaje', 'para', 'el', 'profesor'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Eine Nachricht für den Lehrer', 'correct' => ['eine', 'Nachricht', 'für', 'den', 'Lehrer'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '先生へのメッセージ', 'correct' => ['先生', 'へ', 'の', 'メッセージ'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '선생님에게 메시지', 'correct' => ['선생님에게', '메시지'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Un message pour le professeur', 'correct' => ['un', 'message', 'pour', 'le', 'professeur'], 'extra' => ['ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['call back', 'later'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Devuelve la llamada más tarde', 'correct' => ['devolver la llamada', 'más tarde'], 'extra' => ['mensaje']],
                            'de' => ['sentence' => 'Ruf später zurück', 'correct' => ['zurückrufen', 'später'], 'extra' => ['Nachricht']],
                            'ja' => ['sentence' => '後で折り返す', 'correct' => ['後で', '折り返す'], 'extra' => ['メッセージ']],
                            'ko' => ['sentence' => '나중에 다시 전화하다', 'correct' => ['나중에', '다시', '전화하다'], 'extra' => ['메시지']],
                            'fr' => ['sentence' => 'Rappelle plus tard', 'correct' => ['rappeler', 'plus tard'], 'extra' => ['message']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'message', 'for', 'my', 'friend'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un mensaje para mi amigo', 'correct' => ['un', 'mensaje', 'para', 'mi', 'amigo'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Eine Nachricht für meinen Freund', 'correct' => ['eine', 'Nachricht', 'für', 'mein', 'Freund'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => '友達へのメッセージ', 'correct' => ['友達', 'へ', 'の', 'メッセージ'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '친구에게 메시지', 'correct' => ['친구에게', '메시지'], 'extra' => ['선생님']],
                            'fr' => ['sentence' => 'Un message pour mon ami', 'correct' => ['un', 'message', 'pour', 'mon', 'ami'], 'extra' => ['professeur']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Busy & Sorry', 4,
                pictures: [['en' => 'Sister', 'img' => 'sister'], ['en' => 'Doctor', 'img' => 'doctor']],
                plain: [['en' => 'Busy'], ['en' => 'Sorry']],
                phrases: [
                    'a' => [
                        'words' => ['my', 'sister', 'is', 'busy'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi hermana está ocupada', 'correct' => ['mi', 'hermana', 'está', 'ocupado'], 'extra' => ['lo siento', 'médico']],
                            'de' => ['sentence' => 'Meine Schwester ist beschäftigt', 'correct' => ['meine', 'Schwester', 'ist', 'beschäftigt'], 'extra' => ['Entschuldigung', 'Arzt']],
                            'ja' => ['sentence' => '私の姉妹は忙しいです', 'correct' => ['私の', '姉妹', 'は', '忙しい', 'です'], 'extra' => ['ごめんなさい']],
                            'ko' => ['sentence' => '나의 자매는 바쁩니다', 'correct' => ['나의', '자매는', '바쁩니다'], 'extra' => ['죄송합니다']],
                            'fr' => ['sentence' => 'Ma sœur est occupée', 'correct' => ['ma', 'sœur', 'est', 'occupé'], 'extra' => ['désolé', 'médecin']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sorry', 'call back', 'later'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Lo siento, devuelve la llamada más tarde', 'correct' => ['lo siento', 'devolver la llamada', 'más tarde'], 'extra' => ['ocupado']],
                            'de' => ['sentence' => 'Entschuldigung, ruf später zurück', 'correct' => ['Entschuldigung', 'zurückrufen', 'später'], 'extra' => ['beschäftigt']],
                            'ja' => ['sentence' => 'ごめんなさい、後で折り返す', 'correct' => ['ごめんなさい', '後で', '折り返す'], 'extra' => ['忙しい']],
                            'ko' => ['sentence' => '죄송합니다, 나중에 다시 전화하다', 'correct' => ['죄송합니다', '나중에', '다시', '전화하다'], 'extra' => ['바쁜']],
                            'fr' => ['sentence' => 'Désolé, rappelle plus tard', 'correct' => ['désolé', 'rappeler', 'plus tard'], 'extra' => ['occupé']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'doctor', 'is', 'busy'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El médico está ocupado', 'correct' => ['el', 'médico', 'está', 'ocupado'], 'extra' => ['lo siento']],
                            'de' => ['sentence' => 'Der Arzt ist beschäftigt', 'correct' => ['der', 'Arzt', 'ist', 'beschäftigt'], 'extra' => ['Entschuldigung']],
                            'ja' => ['sentence' => '医者は忙しいです', 'correct' => ['医者', 'は', '忙しい', 'です'], 'extra' => ['ごめんなさい']],
                            'ko' => ['sentence' => '의사는 바쁩니다', 'correct' => ['의사는', '바쁩니다'], 'extra' => ['죄송합니다']],
                            'fr' => ['sentence' => 'Le médecin est occupé', 'correct' => ['le', 'médecin', 'est', 'occupé'], 'extra' => ['désolé']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Call Me Tomorrow', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Mother', 'img' => 'mother']],
                plain: [['en' => 'Call'], ['en' => 'Tomorrow']],
                phrases: [
                    'a' => [
                        'words' => ['call', 'me', 'tomorrow'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Llámame mañana', 'correct' => ['llamar', 'me', 'mañana'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ruf mich morgen an', 'correct' => ['anrufen', 'mich', 'morgen'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '明日電話して', 'correct' => ['明日', '電話', 'して'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '내일 전화해', 'correct' => ['내일', '전화해'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Appelle-moi demain', 'correct' => ['appeler', 'moi', 'demain'], 'extra' => ['ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['call', 'my', 'mother'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Llama a mi madre', 'correct' => ['llamar', 'mi', 'madre'], 'extra' => ['mañana', 'amigo']],
                            'de' => ['sentence' => 'Ruf meine Mutter an', 'correct' => ['anrufen', 'meine', 'Mutter'], 'extra' => ['morgen', 'Freund']],
                            'ja' => ['sentence' => '母に電話する', 'correct' => ['母', 'に', '電話する'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '어머니에게 전화하다', 'correct' => ['어머니에게', '전화하다'], 'extra' => ['내일']],
                            'fr' => ['sentence' => 'Appelle ma mère', 'correct' => ['appeler', 'ma', 'mère'], 'extra' => ['demain', 'ami']],
                        ],
                    ],
                    'c' => [
                        'words' => ['call', 'my', 'friend', 'tomorrow'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Llama a mi amigo mañana', 'correct' => ['llamar', 'mi', 'amigo', 'mañana'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Ruf meinen Freund morgen an', 'correct' => ['anrufen', 'mein', 'Freund', 'morgen'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '明日友達に電話する', 'correct' => ['明日', '友達', 'に', '電話する'], 'extra' => ['母']],
                            'ko' => ['sentence' => '내일 친구에게 전화하다', 'correct' => ['내일', '친구에게', '전화하다'], 'extra' => ['어머니']],
                            'fr' => ['sentence' => 'Appelle mon ami demain', 'correct' => ['appeler', 'mon', 'ami', 'demain'], 'extra' => ['mère']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
