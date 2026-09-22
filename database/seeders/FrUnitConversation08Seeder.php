<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation08Seeder extends Seeder
{
    private const PICTURES = [
        'Ami' => 'friend', 'Mère' => 'mother', 'Père' => 'father', 'Frère' => 'brother',
        'Professeur' => 'teacher', 'Médecin' => 'doctor', 'Maison' => 'house', 'Café' => 'coffee',
    ];

    /**
     * French Chapter 2, Unit 8 — phone conversations.
     *
     * Nothing here can be drawn — "allô", "appeler", "message" have no picture.
     * So the picture questions show the PEOPLE you would actually ring (learned
     * in Chapter 1 Unit 3), and every phone word is carried by the phrases.
     * Same approach that worked for Feelings in Unit 4.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Phone Conversations', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Hello?', 1,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Mère', 'img' => 'mother']],
                plain: [['fr' => 'Allô'], ['fr' => 'Téléphone']],
                phrases: [
                    'a' => [
                        'words' => ['allô', 'mon', 'ami'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Hello, my friend', 'correct' => ['hello', 'my', 'friend'], 'extra' => ['telephone']],
                            'az' => ['sentence' => 'salam mənim dost', 'correct' => ['salam', 'mənim', 'dost'], 'extra' => ['telefon']],
                            'ar' => ['sentence' => 'مرحبا صديق', 'correct' => ['مرحبا', 'صديق'], 'extra' => ['هاتف']],
                            'ru' => ['sentence' => 'привет мой друг', 'correct' => ['привет', 'мой', 'друг'], 'extra' => ['телефон']],
                            'es' => ['sentence' => 'Aló, mi amigo', 'correct' => ['aló', 'mi', 'amigo'], 'extra' => ['teléfono']],
                            'de' => ['sentence' => 'Hallo, mein Freund', 'correct' => ['hallo', 'mein', 'Freund'], 'extra' => ['Telefon']],
                            'ja' => ['sentence' => 'もしもし、私の友達', 'correct' => ['もしもし', '私の', '友達'], 'extra' => ['電話']],
                            'ko' => ['sentence' => '여보세요, 나의 친구', 'correct' => ['여보세요', '나의', '친구'], 'extra' => ['전화']],
                            'tr' => ['sentence' => 'merhaba arkadaşım', 'correct' => ['merhaba', 'arkadaşım'], 'extra' => ['telefon']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'téléphone'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The telephone', 'correct' => ['the', 'telephone'], 'extra' => ['hello', 'mother']],
                            'az' => ['sentence' => 'telefon', 'correct' => ['telefon'], 'extra' => ['salam', 'ana']],
                            'ar' => ['sentence' => 'هاتف', 'correct' => ['هاتف'], 'extra' => ['مرحبا', 'أم']],
                            'ru' => ['sentence' => 'телефон', 'correct' => ['телефон'], 'extra' => ['привет', 'мама']],
                            'es' => ['sentence' => 'El teléfono', 'correct' => ['el', 'teléfono'], 'extra' => ['aló', 'madre']],
                            'de' => ['sentence' => 'Das Telefon', 'correct' => ['das', 'Telefon'], 'extra' => ['hallo', 'Mutter']],
                            'ja' => ['sentence' => '電話', 'correct' => ['電話'], 'extra' => ['もしもし', '母']],
                            'ko' => ['sentence' => '전화', 'correct' => ['전화'], 'extra' => ['여보세요', '어머니']],
                            'tr' => ['sentence' => 'telefon', 'correct' => ['telefon'], 'extra' => ['merhaba', 'anne']],
                        ],
                    ],
                    'c' => [
                        'words' => ['allô', 'ma', 'mère'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Hello, my mother', 'correct' => ['hello', 'my', 'mother'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'salam mənim ana', 'correct' => ['salam', 'mənim', 'ana'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'مرحبا أم', 'correct' => ['مرحبا', 'أم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'привет мой мама', 'correct' => ['привет', 'мой', 'мама'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Aló, mi madre', 'correct' => ['aló', 'mi', 'madre'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Hallo, meine Mutter', 'correct' => ['hallo', 'meine', 'Mutter'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => 'もしもし、私の母', 'correct' => ['もしもし', '私の', '母'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '여보세요, 나의 어머니', 'correct' => ['여보세요', '나의', '어머니'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'merhaba annem', 'correct' => ['merhaba', 'annem'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Call & Wait', 2,
                pictures: [['fr' => 'Père', 'img' => 'father'], ['fr' => 'Frère', 'img' => 'brother']],
                plain: [['fr' => 'Appeler'], ['fr' => 'Attendre']],
                phrases: [
                    'a' => [
                        'words' => ['appeler', 'mon', 'père'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To call my father', 'correct' => ['to call', 'my', 'father'], 'extra' => ['to wait']],
                            'az' => ['sentence' => 'zəng etmək mənim ata', 'correct' => ['zəng etmək', 'mənim', 'ata'], 'extra' => ['gözləmək']],
                            'ar' => ['sentence' => 'الاتصال أب', 'correct' => ['الاتصال', 'أب'], 'extra' => ['الانتظار']],
                            'ru' => ['sentence' => 'звонить мой папа', 'correct' => ['звонить', 'мой', 'папа'], 'extra' => ['ждать']],
                            'es' => ['sentence' => 'Llamar a mi padre', 'correct' => ['llamar', 'mi', 'padre'], 'extra' => ['esperar']],
                            'de' => ['sentence' => 'Meinen Vater anrufen', 'correct' => ['anrufen', 'mein', 'Vater'], 'extra' => ['warten']],
                            'ja' => ['sentence' => '私の父に電話する', 'correct' => ['私の', '父', 'に', '電話する'], 'extra' => ['待つ']],
                            'ko' => ['sentence' => '나의 아버지에게 전화하다', 'correct' => ['나의', '아버지에게', '전화하다'], 'extra' => ['기다리다']],
                            'tr' => ['sentence' => 'babamı aramak', 'correct' => ['babamı', 'aramak'], 'extra' => ['beklemek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['attendre', 'un peu'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To wait a little', 'correct' => ['to wait', 'a little'], 'extra' => ['to call', 'brother']],
                            'az' => ['sentence' => 'gözləmək az', 'correct' => ['gözləmək', 'az'], 'extra' => ['zəng etmək', 'qardaş']],
                            'ar' => ['sentence' => 'الانتظار قليل', 'correct' => ['الانتظار', 'قليل'], 'extra' => ['الاتصال', 'أخ']],
                            'ru' => ['sentence' => 'ждать немного', 'correct' => ['ждать', 'немного'], 'extra' => ['звонить', 'брат']],
                            'es' => ['sentence' => 'Esperar un poco', 'correct' => ['esperar', 'un poco'], 'extra' => ['llamar', 'hermano']],
                            'de' => ['sentence' => 'Ein wenig warten', 'correct' => ['ein wenig', 'warten'], 'extra' => ['anrufen', 'Bruder']],
                            'ja' => ['sentence' => '少し待つ', 'correct' => ['少し', '待つ'], 'extra' => ['電話する', '兄弟']],
                            'ko' => ['sentence' => '조금 기다리다', 'correct' => ['조금', '기다리다'], 'extra' => ['전화하다', '형제']],
                            'tr' => ['sentence' => 'biraz beklemek', 'correct' => ['biraz', 'beklemek'], 'extra' => ['aramak', 'erkek kardeş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['appeler', 'mon', 'frère'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To call my brother', 'correct' => ['to call', 'my', 'brother'], 'extra' => ['father']],
                            'az' => ['sentence' => 'zəng etmək mənim qardaş', 'correct' => ['zəng etmək', 'mənim', 'qardaş'], 'extra' => ['ata']],
                            'ar' => ['sentence' => 'الاتصال أخ', 'correct' => ['الاتصال', 'أخ'], 'extra' => ['أب']],
                            'ru' => ['sentence' => 'звонить мой брат', 'correct' => ['звонить', 'мой', 'брат'], 'extra' => ['папа']],
                            'es' => ['sentence' => 'Llamar a mi hermano', 'correct' => ['llamar', 'mi', 'hermano'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Meinen Bruder anrufen', 'correct' => ['anrufen', 'mein', 'Bruder'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => '私の兄弟に電話する', 'correct' => ['私の', '兄弟', 'に', '電話する'], 'extra' => ['父']],
                            'ko' => ['sentence' => '나의 형제에게 전화하다', 'correct' => ['나의', '형제에게', '전화하다'], 'extra' => ['아버지']],
                            'tr' => ['sentence' => 'erkek kardeşimi aramak', 'correct' => ['erkek', 'kardeşimi', 'aramak'], 'extra' => ['baba']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Message & Call Back', 3,
                pictures: [['fr' => 'Maison', 'img' => 'house'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Message'], ['fr' => 'Rappeler']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'message'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A message', 'correct' => ['a', 'message'], 'extra' => ['to call back', 'house']],
                            'az' => ['sentence' => 'bir mesaj', 'correct' => ['bir', 'mesaj'], 'extra' => ['geri zəng etmək', 'ev']],
                            'ar' => ['sentence' => 'رسالة', 'correct' => ['رسالة'], 'extra' => ['معاودة الاتصال', 'بيت']],
                            'ru' => ['sentence' => 'сообщение', 'correct' => ['сообщение'], 'extra' => ['перезвонить', 'дом']],
                            'es' => ['sentence' => 'Un mensaje', 'correct' => ['un', 'mensaje'], 'extra' => ['volver a llamar', 'casa']],
                            'de' => ['sentence' => 'Eine Nachricht', 'correct' => ['eine', 'Nachricht'], 'extra' => ['zurückrufen', 'Haus']],
                            'ja' => ['sentence' => 'メッセージ', 'correct' => ['メッセージ'], 'extra' => ['折り返す', '家']],
                            'ko' => ['sentence' => '메시지', 'correct' => ['메시지'], 'extra' => ['다시 전화하다', '집']],
                            'tr' => ['sentence' => 'bir mesaj', 'correct' => ['bir', 'mesaj'], 'extra' => ['tekrar aramak', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => ['rappeler', 'demain'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To call back tomorrow', 'correct' => ['to call back', 'tomorrow'], 'extra' => ['message']],
                            'az' => ['sentence' => 'geri zəng etmək sabah', 'correct' => ['geri zəng etmək', 'sabah'], 'extra' => ['mesaj']],
                            'ar' => ['sentence' => 'معاودة الاتصال غدا', 'correct' => ['معاودة الاتصال', 'غدا'], 'extra' => ['رسالة']],
                            'ru' => ['sentence' => 'перезвонить завтра', 'correct' => ['перезвонить', 'завтра'], 'extra' => ['сообщение']],
                            'es' => ['sentence' => 'Volver a llamar mañana', 'correct' => ['volver a llamar', 'mañana'], 'extra' => ['mensaje']],
                            'de' => ['sentence' => 'Morgen zurückrufen', 'correct' => ['morgen', 'zurückrufen'], 'extra' => ['Nachricht']],
                            'ja' => ['sentence' => '明日折り返す', 'correct' => ['明日', '折り返す'], 'extra' => ['メッセージ']],
                            'ko' => ['sentence' => '내일 다시 전화하다', 'correct' => ['내일', '다시', '전화하다'], 'extra' => ['메시지']],
                            'tr' => ['sentence' => 'yarın tekrar aramak', 'correct' => ['yarın', 'tekrar', 'aramak'], 'extra' => ['mesaj']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'maison', 'et', 'le', 'café'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The house and the coffee shop', 'correct' => ['the', 'house', 'and', 'the', 'coffee'], 'extra' => ['message']],
                            'az' => ['sentence' => 'ev və qəhvə', 'correct' => ['ev', 'və', 'qəhvə'], 'extra' => ['mesaj']],
                            'ar' => ['sentence' => 'بيت و قهوة', 'correct' => ['بيت', 'و', 'قهوة'], 'extra' => ['رسالة']],
                            'ru' => ['sentence' => 'дом и кофе', 'correct' => ['дом', 'и', 'кофе'], 'extra' => ['сообщение']],
                            'es' => ['sentence' => 'La casa y el café', 'correct' => ['la', 'casa', 'y', 'el', 'café'], 'extra' => ['mensaje']],
                            'de' => ['sentence' => 'Das Haus und der Kaffee', 'correct' => ['das', 'Haus', 'und', 'der', 'Kaffee'], 'extra' => ['Nachricht']],
                            'ja' => ['sentence' => '家とコーヒー', 'correct' => ['家', 'と', 'コーヒー'], 'extra' => ['メッセージ']],
                            'ko' => ['sentence' => '집과 커피', 'correct' => ['집과', '커피'], 'extra' => ['메시지']],
                            'tr' => ['sentence' => 'ev ve kafe', 'correct' => ['ev', 've', 'kafe'], 'extra' => ['mesaj']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Busy & Sorry', 4,
                pictures: [['fr' => 'Professeur', 'img' => 'teacher'], ['fr' => 'Médecin', 'img' => 'doctor']],
                plain: [['fr' => 'Occupé'], ['fr' => 'Désolé']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'occupé'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am busy', 'correct' => ['I am', 'busy'], 'extra' => ['sorry', 'teacher']],
                            'az' => ['sentence' => 'mən məşğul', 'correct' => ['mən', 'məşğul'], 'extra' => ['bağışlayın', 'müəllim']],
                            'ar' => ['sentence' => 'أنا مشغول', 'correct' => ['أنا', 'مشغول'], 'extra' => ['آسف', 'معلم']],
                            'ru' => ['sentence' => 'я занят', 'correct' => ['я', 'занят'], 'extra' => ['извините', 'учитель']],
                            'es' => ['sentence' => 'Soy ocupado', 'correct' => ['soy', 'ocupado'], 'extra' => ['lo siento', 'profesor']],
                            'de' => ['sentence' => 'Ich bin beschäftigt', 'correct' => ['ich bin', 'beschäftigt'], 'extra' => ['entschuldigung']],
                            'ja' => ['sentence' => '私は忙しいです', 'correct' => ['私', 'は', '忙しい', 'です'], 'extra' => ['ごめんなさい', '先生']],
                            'ko' => ['sentence' => '저는 바쁩니다', 'correct' => ['저는', '바쁩니다'], 'extra' => ['미안합니다', '선생님']],
                            'tr' => ['sentence' => 'meşgulüm', 'correct' => ['meşgulüm'], 'extra' => ['üzgünüm', 'öğretmen']],
                        ],
                    ],
                    'b' => [
                        'words' => ['désolé', 'je suis', 'occupé'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Sorry, I am busy', 'correct' => ['sorry', 'I am', 'busy'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'bağışlayın mən məşğul', 'correct' => ['bağışlayın', 'mən', 'məşğul'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'آسف أنا مشغول', 'correct' => ['آسف', 'أنا', 'مشغول'], 'extra' => ['طبيب']],
                            'ru' => ['sentence' => 'извините я занят', 'correct' => ['извините', 'я', 'занят'], 'extra' => ['врач']],
                            'es' => ['sentence' => 'Lo siento, soy ocupado', 'correct' => ['lo siento', 'soy', 'ocupado'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Entschuldigung, ich bin beschäftigt', 'correct' => ['entschuldigung', 'ich bin', 'beschäftigt'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => 'ごめんなさい、私は忙しいです', 'correct' => ['ごめんなさい', '私', 'は', '忙しい', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '미안합니다, 저는 바쁩니다', 'correct' => ['미안합니다', '저는', '바쁩니다'], 'extra' => ['의사']],
                            'tr' => ['sentence' => 'üzgünüm meşgulüm', 'correct' => ['üzgünüm', 'meşgulüm'], 'extra' => ['doktor']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'professeur', 'et', 'le', 'médecin'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The teacher and the doctor', 'correct' => ['the', 'teacher', 'and', 'the', 'doctor'], 'extra' => ['busy']],
                            'az' => ['sentence' => 'müəllim və həkim', 'correct' => ['müəllim', 'və', 'həkim'], 'extra' => ['məşğul']],
                            'ar' => ['sentence' => 'معلم و طبيب', 'correct' => ['معلم', 'و', 'طبيب'], 'extra' => ['مشغول']],
                            'ru' => ['sentence' => 'учитель и врач', 'correct' => ['учитель', 'и', 'врач'], 'extra' => ['занят']],
                            'es' => ['sentence' => 'El profesor y el médico', 'correct' => ['el', 'profesor', 'y', 'el', 'médico'], 'extra' => ['ocupado']],
                            'de' => ['sentence' => 'Der Lehrer und der Arzt', 'correct' => ['der', 'Lehrer', 'und', 'der', 'Arzt'], 'extra' => ['beschäftigt']],
                            'ja' => ['sentence' => '先生と医者', 'correct' => ['先生', 'と', '医者'], 'extra' => ['忙しい']],
                            'ko' => ['sentence' => '선생님과 의사', 'correct' => ['선생님과', '의사'], 'extra' => ['바쁜']],
                            'tr' => ['sentence' => 'öğretmen ve doktor', 'correct' => ['öğretmen', 've', 'doktor'], 'extra' => ['meşgul']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Call Me Tomorrow', 5,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Allô'], ['fr' => 'Appeler']],
                phrases: [
                    'a' => [
                        'words' => ['allô', 'mon', 'ami'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Hello, my friend', 'correct' => ['hello', 'my', 'friend'], 'extra' => ['to call']],
                            'az' => ['sentence' => 'salam mənim dost', 'correct' => ['salam', 'mənim', 'dost'], 'extra' => ['zəng etmək']],
                            'ar' => ['sentence' => 'مرحبا صديق', 'correct' => ['مرحبا', 'صديق'], 'extra' => ['الاتصال']],
                            'ru' => ['sentence' => 'привет мой друг', 'correct' => ['привет', 'мой', 'друг'], 'extra' => ['звонить']],
                            'es' => ['sentence' => 'Aló, mi amigo', 'correct' => ['aló', 'mi', 'amigo'], 'extra' => ['llamar']],
                            'de' => ['sentence' => 'Hallo, mein Freund', 'correct' => ['hallo', 'mein', 'Freund'], 'extra' => ['anrufen']],
                            'ja' => ['sentence' => 'もしもし、私の友達', 'correct' => ['もしもし', '私の', '友達'], 'extra' => ['電話する']],
                            'ko' => ['sentence' => '여보세요, 나의 친구', 'correct' => ['여보세요', '나의', '친구'], 'extra' => ['전화하다']],
                            'tr' => ['sentence' => 'merhaba arkadaşım', 'correct' => ['merhaba', 'arkadaşım'], 'extra' => ['aramak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['appeler', 'demain'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To call tomorrow', 'correct' => ['to call', 'tomorrow'], 'extra' => ['hello', 'house']],
                            'az' => ['sentence' => 'zəng etmək sabah', 'correct' => ['zəng etmək', 'sabah'], 'extra' => ['salam', 'ev']],
                            'ar' => ['sentence' => 'الاتصال غدا', 'correct' => ['الاتصال', 'غدا'], 'extra' => ['مرحبا', 'بيت']],
                            'ru' => ['sentence' => 'звонить завтра', 'correct' => ['звонить', 'завтра'], 'extra' => ['привет', 'дом']],
                            'es' => ['sentence' => 'Llamar mañana', 'correct' => ['llamar', 'mañana'], 'extra' => ['aló', 'casa']],
                            'de' => ['sentence' => 'Morgen anrufen', 'correct' => ['morgen', 'anrufen'], 'extra' => ['hallo', 'Haus']],
                            'ja' => ['sentence' => '明日電話する', 'correct' => ['明日', '電話する'], 'extra' => ['もしもし', '家']],
                            'ko' => ['sentence' => '내일 전화하다', 'correct' => ['내일', '전화하다'], 'extra' => ['여보세요', '집']],
                            'tr' => ['sentence' => 'yarın aramak', 'correct' => ['yarın', 'aramak'], 'extra' => ['merhaba', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je suis', 'dans', 'ma', 'maison'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am in my house', 'correct' => ['I am', 'in', 'my', 'house'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'mən içində mənim ev', 'correct' => ['mən', 'içində', 'mənim', 'ev'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أنا في بيت', 'correct' => ['أنا', 'في', 'بيت'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'я в мой дом', 'correct' => ['я', 'в', 'мой', 'дом'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Soy en mi casa', 'correct' => ['soy', 'en', 'mi', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ich bin in meinem Haus', 'correct' => ['ich bin', 'in', 'meinem', 'Haus'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私は私の家にいます', 'correct' => ['私', 'は', '私の', '家', 'に', 'います'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '저는 나의 집에 있습니다', 'correct' => ['저는', '나의', '집에', '있습니다'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'evimdeyim', 'correct' => ['evimdeyim'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
