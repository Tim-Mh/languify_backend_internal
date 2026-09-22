<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation08Seeder extends Seeder
{
    private const PICTURES = ['친구' => 'friend', '어머니' => 'mother', '의사' => 'doctor', '선생님' => 'teacher', '자매' => 'sister'];

    /**
     * Korean Conversation, Unit 8, the Korean twin of the English "Phone Conversations" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, '유닛 8: 전화 대화', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 친구 · 어머니', 1,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '어머니', 'img' => 'mother']],
                plain: [['ko' => '전화'], ['ko' => '안녕하세요']],
                phrases: [
                    'a' => [
                        'words' => ['안녕하세요', '제', '친구'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'hello my friend', 'correct' => ['hello', 'my', 'friend'], 'extra' => ['phone']],
                            'az' => ['sentence' => 'salam mənim dost', 'correct' => ['salam', 'mənim', 'dost'], 'extra' => ['telefon']],
                            'ar' => ['sentence' => 'مرحبا صديق', 'correct' => ['مرحبا', 'صديق'], 'extra' => ['هاتف']],
                            'ru' => ['sentence' => 'привет мой друг', 'correct' => ['привет', 'мой', 'друг'], 'extra' => ['телефон']],
                            'es' => ['sentence' => 'Hola, mi amigo', 'correct' => ['hola', 'mi', 'amigo'], 'extra' => ['teléfono', 'madre']],
                            'de' => ['sentence' => 'Hallo, mein Freund', 'correct' => ['hallo', 'mein', 'Freund'], 'extra' => ['Telefon', 'Mutter']],
                            'fr' => ['sentence' => 'Bonjour, mon ami', 'correct' => ['bonjour', 'mon', 'ami'], 'extra' => ['téléphone', 'mère']],
                            'ja' => ['sentence' => 'こんにちは、私の友達', 'correct' => ['こんにちは', '私の', '友達'], 'extra' => ['電話']],
                            'tr' => ['sentence' => 'merhaba arkadaşım', 'correct' => ['merhaba', 'arkadaşım'], 'extra' => ['telefon']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그', '전화'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the phone', 'correct' => ['the', 'phone'], 'extra' => ['hello']],
                            'az' => ['sentence' => 'telefon', 'correct' => ['telefon'], 'extra' => ['salam']],
                            'ar' => ['sentence' => 'هاتف', 'correct' => ['هاتف'], 'extra' => ['مرحبا']],
                            'ru' => ['sentence' => 'телефон', 'correct' => ['телефон'], 'extra' => ['привет']],
                            'es' => ['sentence' => 'El teléfono', 'correct' => ['el', 'teléfono'], 'extra' => ['hola', 'madre']],
                            'de' => ['sentence' => 'Das Telefon', 'correct' => ['das', 'Telefon'], 'extra' => ['hallo', 'Mutter']],
                            'fr' => ['sentence' => 'Le téléphone', 'correct' => ['le', 'téléphone'], 'extra' => ['bonjour', 'mère']],
                            'ja' => ['sentence' => 'その電話', 'correct' => ['その', '電話'], 'extra' => ['こんにちは']],
                            'tr' => ['sentence' => 'telefon', 'correct' => ['telefon'], 'extra' => ['merhaba']],
                        ],
                    ],
                    'c' => [
                        'words' => ['여보세요', '어머니', '전화로'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'hello mother on the phone', 'correct' => ['hello', 'mother', 'on', 'the', 'phone'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'salam ana üzərində telefon', 'correct' => ['salam', 'ana', 'üzərində', 'telefon'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'مرحبا أم على هاتف', 'correct' => ['مرحبا', 'أم', 'على', 'هاتف'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'привет мама на телефон', 'correct' => ['привет', 'мама', 'на', 'телефон'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Hola, madre, al teléfono', 'correct' => ['hola', 'madre', 'sobre', 'el', 'teléfono'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Hallo, Mutter, am Telefon', 'correct' => ['hallo', 'Mutter', 'auf', 'dem', 'Telefon'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Bonjour maman, au téléphone', 'correct' => ['bonjour', 'mère', 'sur', 'le', 'téléphone'], 'extra' => ['ami']],
                            'ja' => ['sentence' => 'もしもし、母さん、電話で', 'correct' => ['もしもし', '母さん', '電話', 'で'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'merhaba anne telefonda', 'correct' => ['merhaba', 'anne', 'telefonda'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 의사 · 친구', 2,
                pictures: [['ko' => '의사', 'img' => 'doctor'], ['ko' => '친구', 'img' => 'friend']],
                plain: [['ko' => '전화하다'], ['ko' => '기다리다']],
                phrases: [
                    'a' => [
                        'words' => ['의사에게', '전화하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'call the doctor', 'correct' => ['call', 'the', 'doctor'], 'extra' => ['wait']],
                            'az' => ['sentence' => 'zəng et həkim', 'correct' => ['zəng et', 'həkim'], 'extra' => ['gözlə']],
                            'ar' => ['sentence' => 'اتصل طبيب', 'correct' => ['اتصل', 'طبيب'], 'extra' => ['انتظر']],
                            'ru' => ['sentence' => 'позвони врач', 'correct' => ['позвони', 'врач'], 'extra' => ['подожди']],
                            'es' => ['sentence' => 'Llama al médico', 'correct' => ['llamar', 'el', 'médico'], 'extra' => ['esperar', 'amigo']],
                            'de' => ['sentence' => 'Ruf den Arzt an', 'correct' => ['anrufen', 'den', 'Arzt'], 'extra' => ['warten', 'Freund']],
                            'fr' => ['sentence' => 'Appelle le médecin', 'correct' => ['appeler', 'le', 'médecin'], 'extra' => ['attendre', 'ami']],
                            'ja' => ['sentence' => '医者に電話する', 'correct' => ['医者', 'に', '電話する'], 'extra' => ['待つ']],
                            'tr' => ['sentence' => 'doktoru ara', 'correct' => ['doktoru', 'ara'], 'extra' => ['bekle']],
                        ],
                    ],
                    'b' => [
                        'words' => ['조금', '기다리세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'wait a little', 'correct' => ['wait', 'a little'], 'extra' => ['call']],
                            'az' => ['sentence' => 'gözlə az', 'correct' => ['gözlə', 'az'], 'extra' => ['zəng et']],
                            'ar' => ['sentence' => 'انتظر قليل', 'correct' => ['انتظر', 'قليل'], 'extra' => ['اتصل']],
                            'ru' => ['sentence' => 'подожди немного', 'correct' => ['подожди', 'немного'], 'extra' => ['позвони']],
                            'es' => ['sentence' => 'Espera un poco', 'correct' => ['esperar', 'un poco'], 'extra' => ['llamar', 'médico']],
                            'de' => ['sentence' => 'Warte ein bisschen', 'correct' => ['warten', 'ein bisschen'], 'extra' => ['anrufen', 'Arzt']],
                            'fr' => ['sentence' => 'Attends un peu', 'correct' => ['attendre', 'un peu'], 'extra' => ['appeler', 'médecin']],
                            'ja' => ['sentence' => '少し待つ', 'correct' => ['少し', '待つ'], 'extra' => ['電話する']],
                            'tr' => ['sentence' => 'biraz bekle', 'correct' => ['biraz', 'bekle'], 'extra' => ['ara']],
                        ],
                    ],
                    'c' => [
                        'words' => ['친구에게', '전화하고', '기다리세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'call my friend and wait', 'correct' => ['call', 'my', 'friend', 'and', 'wait'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'zəng et mənim dost və gözlə', 'correct' => ['zəng et', 'mənim', 'dost', 'və', 'gözlə'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'اتصل صديق و انتظر', 'correct' => ['اتصل', 'صديق', 'و', 'انتظر'], 'extra' => ['طبيب']],
                            'ru' => ['sentence' => 'позвони мой друг и подожди', 'correct' => ['позвони', 'мой', 'друг', 'и', 'подожди'], 'extra' => ['врач']],
                            'es' => ['sentence' => 'Llama a mi amigo y espera', 'correct' => ['llamar', 'mi', 'amigo', 'y', 'esperar'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Ruf meinen Freund an und warte', 'correct' => ['anrufen', 'mein', 'Freund', 'und', 'warten'], 'extra' => ['Arzt']],
                            'fr' => ['sentence' => 'Appelle mon ami et attends', 'correct' => ['appeler', 'mon', 'ami', 'et', 'attendre'], 'extra' => ['médecin']],
                            'ja' => ['sentence' => '友達に電話して待つ', 'correct' => ['友達', 'に', '電話', 'して', '待つ'], 'extra' => ['医者']],
                            'tr' => ['sentence' => 'arkadaşımı ara ve bekle', 'correct' => ['arkadaşımı', 'ara', 've', 'bekle'], 'extra' => ['doktor']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 선생님 · 친구', 3,
                pictures: [['ko' => '선생님', 'img' => 'teacher'], ['ko' => '친구', 'img' => 'friend']],
                plain: [['ko' => '메시지'], ['ko' => '다시 전화하다']],
                phrases: [
                    'a' => [
                        'words' => ['선생님에게', '메시지'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a message for the teacher', 'correct' => ['a', 'message', 'for', 'the', 'teacher'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'bir mesaj üçün müəllim', 'correct' => ['bir', 'mesaj', 'üçün', 'müəllim'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'رسالة لأجل معلم', 'correct' => ['رسالة', 'لأجل', 'معلم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'сообщение для учитель', 'correct' => ['сообщение', 'для', 'учитель'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Un mensaje para el profesor', 'correct' => ['un', 'mensaje', 'para', 'el', 'profesor'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Eine Nachricht für den Lehrer', 'correct' => ['eine', 'Nachricht', 'für', 'den', 'Lehrer'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Un message pour le professeur', 'correct' => ['un', 'message', 'pour', 'le', 'professeur'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '先生へのメッセージ', 'correct' => ['先生', 'へ', 'の', 'メッセージ'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'öğretmen için bir mesaj', 'correct' => ['öğretmen', 'için', 'bir', 'mesaj'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['나중에', '다시', '전화하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'call back later', 'correct' => ['call back', 'later'], 'extra' => ['message']],
                            'az' => ['sentence' => 'geri zəng et sonradan', 'correct' => ['geri zəng et', 'sonradan'], 'extra' => ['mesaj']],
                            'ar' => ['sentence' => 'عاود الاتصال لاحقا', 'correct' => ['عاود الاتصال', 'لاحقا'], 'extra' => ['رسالة']],
                            'ru' => ['sentence' => 'перезвони позже', 'correct' => ['перезвони', 'позже'], 'extra' => ['сообщение']],
                            'es' => ['sentence' => 'Devuelve la llamada más tarde', 'correct' => ['devolver la llamada', 'más tarde'], 'extra' => ['mensaje']],
                            'de' => ['sentence' => 'Ruf später zurück', 'correct' => ['zurückrufen', 'später'], 'extra' => ['Nachricht']],
                            'fr' => ['sentence' => 'Rappelle plus tard', 'correct' => ['rappeler', 'plus tard'], 'extra' => ['message']],
                            'ja' => ['sentence' => '後で折り返す', 'correct' => ['後で', '折り返す'], 'extra' => ['メッセージ']],
                            'tr' => ['sentence' => 'sonra tekrar ara', 'correct' => ['sonra', 'tekrar', 'ara'], 'extra' => ['mesaj']],
                        ],
                    ],
                    'c' => [
                        'words' => ['친구에게', '메시지'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a message for my friend', 'correct' => ['a', 'message', 'for', 'my', 'friend'], 'extra' => ['sir']],
                            'az' => ['sentence' => 'bir mesaj üçün mənim dost', 'correct' => ['bir', 'mesaj', 'üçün', 'mənim', 'dost'], 'extra' => ['cənab']],
                            'ar' => ['sentence' => 'رسالة لأجل صديق', 'correct' => ['رسالة', 'لأجل', 'صديق'], 'extra' => ['سيدي']],
                            'ru' => ['sentence' => 'сообщение для мой друг', 'correct' => ['сообщение', 'для', 'мой', 'друг'], 'extra' => ['господин']],
                            'es' => ['sentence' => 'Un mensaje para mi amigo', 'correct' => ['un', 'mensaje', 'para', 'mi', 'amigo'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Eine Nachricht für meinen Freund', 'correct' => ['eine', 'Nachricht', 'für', 'mein', 'Freund'], 'extra' => ['Lehrer']],
                            'fr' => ['sentence' => 'Un message pour mon ami', 'correct' => ['un', 'message', 'pour', 'mon', 'ami'], 'extra' => ['professeur']],
                            'ja' => ['sentence' => '友達へのメッセージ', 'correct' => ['友達', 'へ', 'の', 'メッセージ'], 'extra' => ['先生']],
                            'tr' => ['sentence' => 'arkadaşım için bir mesaj', 'correct' => ['arkadaşım', 'için', 'bir', 'mesaj'], 'extra' => ['beyefendi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 자매 · 의사', 4,
                pictures: [['ko' => '자매', 'img' => 'sister'], ['ko' => '의사', 'img' => 'doctor']],
                plain: [['ko' => '바쁜'], ['ko' => '죄송합니다']],
                phrases: [
                    'a' => [
                        'words' => ['제', '자매는', '바쁩니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my sister is busy', 'correct' => ['my', 'sister', 'is', 'busy'], 'extra' => ['sorry']],
                            'az' => ['sentence' => 'mənim bacı məşğul', 'correct' => ['mənim', 'bacı', 'məşğul'], 'extra' => ['bağışlayın']],
                            'ar' => ['sentence' => 'أخت مشغول', 'correct' => ['أخت', 'مشغول'], 'extra' => ['آسف']],
                            'ru' => ['sentence' => 'мой сестра занят', 'correct' => ['мой', 'сестра', 'занят'], 'extra' => ['извините']],
                            'es' => ['sentence' => 'Mi hermana está ocupada', 'correct' => ['mi', 'hermana', 'está', 'ocupado'], 'extra' => ['lo siento', 'médico']],
                            'de' => ['sentence' => 'Meine Schwester ist beschäftigt', 'correct' => ['meine', 'Schwester', 'ist', 'beschäftigt'], 'extra' => ['Entschuldigung', 'Arzt']],
                            'fr' => ['sentence' => 'Ma sœur est occupée', 'correct' => ['ma', 'sœur', 'est', 'occupé'], 'extra' => ['désolé', 'médecin']],
                            'ja' => ['sentence' => '私の姉妹は忙しいです', 'correct' => ['私の', '姉妹', 'は', '忙しい', 'です'], 'extra' => ['ごめんなさい']],
                            'tr' => ['sentence' => 'kız kardeşim meşgul', 'correct' => ['kız', 'kardeşim', 'meşgul'], 'extra' => ['üzgünüm']],
                        ],
                    ],
                    'b' => [
                        'words' => ['죄송합니다', '나중에', '다시', '전화하세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'sorry call back later', 'correct' => ['sorry', 'call back', 'later'], 'extra' => ['busy']],
                            'az' => ['sentence' => 'bağışlayın geri zəng et sonradan', 'correct' => ['bağışlayın', 'geri zəng et', 'sonradan'], 'extra' => ['məşğul']],
                            'ar' => ['sentence' => 'آسف عاود الاتصال لاحقا', 'correct' => ['آسف', 'عاود الاتصال', 'لاحقا'], 'extra' => ['مشغول']],
                            'ru' => ['sentence' => 'извините перезвони позже', 'correct' => ['извините', 'перезвони', 'позже'], 'extra' => ['занят']],
                            'es' => ['sentence' => 'Lo siento, devuelve la llamada más tarde', 'correct' => ['lo siento', 'devolver la llamada', 'más tarde'], 'extra' => ['ocupado']],
                            'de' => ['sentence' => 'Entschuldigung, ruf später zurück', 'correct' => ['Entschuldigung', 'zurückrufen', 'später'], 'extra' => ['beschäftigt']],
                            'fr' => ['sentence' => 'Désolé, rappelle plus tard', 'correct' => ['désolé', 'rappeler', 'plus tard'], 'extra' => ['occupé']],
                            'ja' => ['sentence' => 'ごめんなさい、後で折り返す', 'correct' => ['ごめんなさい', '後で', '折り返す'], 'extra' => ['忙しい']],
                            'tr' => ['sentence' => 'üzgünüm sonra tekrar ara', 'correct' => ['üzgünüm', 'sonra', 'tekrar', 'ara'], 'extra' => ['meşgul']],
                        ],
                    ],
                    'c' => [
                        'words' => ['의사는', '바쁩니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the doctor is busy', 'correct' => ['the', 'doctor', 'is', 'busy'], 'extra' => ['sorry']],
                            'az' => ['sentence' => 'həkim məşğul', 'correct' => ['həkim', 'məşğul'], 'extra' => ['bağışlayın']],
                            'ar' => ['sentence' => 'طبيب مشغول', 'correct' => ['طبيب', 'مشغول'], 'extra' => ['آسف']],
                            'ru' => ['sentence' => 'врач занят', 'correct' => ['врач', 'занят'], 'extra' => ['извините']],
                            'es' => ['sentence' => 'El médico está ocupado', 'correct' => ['el', 'médico', 'está', 'ocupado'], 'extra' => ['lo siento']],
                            'de' => ['sentence' => 'Der Arzt ist beschäftigt', 'correct' => ['der', 'Arzt', 'ist', 'beschäftigt'], 'extra' => ['Entschuldigung']],
                            'fr' => ['sentence' => 'Le médecin est occupé', 'correct' => ['le', 'médecin', 'est', 'occupé'], 'extra' => ['désolé']],
                            'ja' => ['sentence' => '医者は忙しいです', 'correct' => ['医者', 'は', '忙しい', 'です'], 'extra' => ['ごめんなさい']],
                            'tr' => ['sentence' => 'doktor meşgul', 'correct' => ['doktor', 'meşgul'], 'extra' => ['üzgünüm']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 친구 · 어머니', 5,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '어머니', 'img' => 'mother']],
                plain: [['ko' => '전화하다'], ['ko' => '내일']],
                phrases: [
                    'a' => [
                        'words' => ['내일', '전화해'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'call me tomorrow', 'correct' => ['call', 'me', 'tomorrow'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'zəng et mənə sabah', 'correct' => ['zəng et', 'mənə', 'sabah'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'اتصل لي غدا', 'correct' => ['اتصل', 'لي', 'غدا'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'позвони меня завтра', 'correct' => ['позвони', 'меня', 'завтра'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Llámame mañana', 'correct' => ['llamar', 'me', 'mañana'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ruf mich morgen an', 'correct' => ['anrufen', 'mich', 'morgen'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Appelle-moi demain', 'correct' => ['appeler', 'moi', 'demain'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '明日電話して', 'correct' => ['明日', '電話', 'して'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'yarın beni ara', 'correct' => ['yarın', 'beni', 'ara'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['어머니에게', '전화하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'call my mother', 'correct' => ['call', 'my', 'mother'], 'extra' => ['tomorrow']],
                            'az' => ['sentence' => 'zəng et mənim ana', 'correct' => ['zəng et', 'mənim', 'ana'], 'extra' => ['sabah']],
                            'ar' => ['sentence' => 'اتصل أم', 'correct' => ['اتصل', 'أم'], 'extra' => ['غدا']],
                            'ru' => ['sentence' => 'позвони мой мама', 'correct' => ['позвони', 'мой', 'мама'], 'extra' => ['завтра']],
                            'es' => ['sentence' => 'Llama a mi madre', 'correct' => ['llamar', 'mi', 'madre'], 'extra' => ['mañana', 'amigo']],
                            'de' => ['sentence' => 'Ruf meine Mutter an', 'correct' => ['anrufen', 'meine', 'Mutter'], 'extra' => ['morgen', 'Freund']],
                            'fr' => ['sentence' => 'Appelle ma mère', 'correct' => ['appeler', 'ma', 'mère'], 'extra' => ['demain', 'ami']],
                            'ja' => ['sentence' => '母に電話する', 'correct' => ['母', 'に', '電話する'], 'extra' => ['明日']],
                            'tr' => ['sentence' => 'annemi ara', 'correct' => ['annemi', 'ara'], 'extra' => ['yarın']],
                        ],
                    ],
                    'c' => [
                        'words' => ['내일', '친구에게', '전화하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'call my friend tomorrow', 'correct' => ['call', 'my', 'friend', 'tomorrow'], 'extra' => ['mother']],
                            'az' => ['sentence' => 'zəng et mənim dost sabah', 'correct' => ['zəng et', 'mənim', 'dost', 'sabah'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'اتصل صديق غدا', 'correct' => ['اتصل', 'صديق', 'غدا'], 'extra' => ['أم']],
                            'ru' => ['sentence' => 'позвони мой друг завтра', 'correct' => ['позвони', 'мой', 'друг', 'завтра'], 'extra' => ['мама']],
                            'es' => ['sentence' => 'Llama a mi amigo mañana', 'correct' => ['llamar', 'mi', 'amigo', 'mañana'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Ruf meinen Freund morgen an', 'correct' => ['anrufen', 'mein', 'Freund', 'morgen'], 'extra' => ['Mutter']],
                            'fr' => ['sentence' => 'Appelle mon ami demain', 'correct' => ['appeler', 'mon', 'ami', 'demain'], 'extra' => ['mère']],
                            'ja' => ['sentence' => '明日友達に電話する', 'correct' => ['明日', '友達', 'に', '電話する'], 'extra' => ['母']],
                            'tr' => ['sentence' => 'yarın arkadaşımı ara', 'correct' => ['yarın', 'arkadaşımı', 'ara'], 'extra' => ['anne']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
