<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitConversation08Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Telefon' => 'phone', 'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water',
        'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese', 'Tort' => 'cake',
    ];

    /**
     * Azerbaijani Conversation Unit 8.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Phone Conversations', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Hello & Calling', 1,
                pictures: [['az' => 'Telefon', 'img' => 'phone'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Salam'], ['az' => 'Zəng edirəm']],
                phrases: [
                    'a' => [
                        'words' => ['salam', 'zəng edirəm'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Hello I am calling', 'correct' => ['hello', 'I am calling'], 'extra' => ['message', 'busy']],
                            'fr' => ['sentence' => "Allô j'appelle", 'correct' => ['allô', "j'appelle"], 'extra' => ['message', 'occupé']],
                            'es' => ['sentence' => 'Diga estoy llamando', 'correct' => ['diga', 'estoy llamando'], 'extra' => ['mensaje', 'ocupado']],
                            'de' => ['sentence' => 'Hallo ich rufe an', 'correct' => ['hallo', 'ich rufe an'], 'extra' => ['Nachricht', 'beschäftigt']],
                            'ja' => ['sentence' => 'もしもし電話しています', 'correct' => ['もしもし', '電話しています'], 'extra' => ['メッセージ', '忙しい']],
                            'ko' => ['sentence' => '여보세요 전화하고 있어요', 'correct' => ['여보세요', '전화하고 있어요'], 'extra' => ['메시지', '바쁜']],
                            'tr' => ['sentence' => 'alo ben arıyorum', 'correct' => ['alo', 'ben', 'arıyorum'], 'extra' => ['telefon', 'arkadaş']],
                            'ru' => ['sentence' => 'привет я звоню', 'correct' => ['привет', 'я', 'звоню'], 'extra' => ['сообщение', 'занят']],
                            'ar' => ['sentence' => 'مرحبا أتصل', 'correct' => ['مرحبا', 'أتصل'], 'extra' => ['رسالة', 'مشغول']],
                        ],
                    ],
                    'b' => [
                        'words' => ['zəng edirəm', 'dostum'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am calling my friend', 'correct' => ['I am calling', 'my friend'], 'extra' => ['hello', 'number']],
                            'fr' => ['sentence' => "J'appelle mon ami", 'correct' => ["j'appelle", 'mon ami'], 'extra' => ['allô', 'numéro']],
                            'es' => ['sentence' => 'Estoy llamando a mi amigo', 'correct' => ['estoy llamando', 'a mi amigo'], 'extra' => ['diga', 'número']],
                            'de' => ['sentence' => 'Ich rufe meinen Freund an', 'correct' => ['ich rufe', 'meinen Freund', 'an'], 'extra' => ['hallo', 'Nummer']],
                            'ja' => ['sentence' => '私の友達に電話しています', 'correct' => ['私の友達に', '電話しています'], 'extra' => ['もしもし', '番号']],
                            'ko' => ['sentence' => '제 친구에게 전화하고 있어요', 'correct' => ['제 친구에게', '전화하고 있어요'], 'extra' => ['여보세요', '번호']],
                            'tr' => ['sentence' => 'arkadaşımı arıyorum', 'correct' => ['arkadaşımı', 'arıyorum'], 'extra' => ['alo', 'telefon']],
                            'ru' => ['sentence' => 'я звоню мой друг', 'correct' => ['я', 'звоню', 'мой друг'], 'extra' => ['привет', 'номер']],
                            'ar' => ['sentence' => 'أتصل صديقي', 'correct' => ['أتصل', 'صديقي'], 'extra' => ['مرحبا', 'رقم']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'telefon'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This telephone', 'correct' => ['this', 'telephone'], 'extra' => ['message']],
                            'fr' => ['sentence' => 'Ce téléphone', 'correct' => ['ce', 'téléphone'], 'extra' => ['message']],
                            'es' => ['sentence' => 'Este teléfono', 'correct' => ['este', 'teléfono'], 'extra' => ['mensaje']],
                            'de' => ['sentence' => 'Dieses Telefon', 'correct' => ['dieses', 'Telefon'], 'extra' => ['Nachricht']],
                            'ja' => ['sentence' => 'この電話', 'correct' => ['この', '電話'], 'extra' => ['メッセージ']],
                            'ko' => ['sentence' => '이 전화', 'correct' => ['이', '전화'], 'extra' => ['메시지']],
                            'tr' => ['sentence' => 'bu telefon', 'correct' => ['bu', 'telefon'], 'extra' => ['alo', 'arıyorum']],
                            'ru' => ['sentence' => 'это телефон', 'correct' => ['это', 'телефон'], 'extra' => ['сообщение']],
                            'ar' => ['sentence' => 'هذا هاتف', 'correct' => ['هذا', 'هاتف'], 'extra' => ['رسالة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: I Have Time', 2,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Məndə var'], ['az' => 'Vaxt']],
                phrases: [
                    'a' => [
                        'words' => ['məndə var', 'vaxt'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I have time', 'correct' => ['I have', 'time'], 'extra' => ['there is not']],
                            'fr' => ['sentence' => "J'ai du temps", 'correct' => ["j'ai", 'du temps'], 'extra' => ["il n'y a pas"]],
                            'es' => ['sentence' => 'Tengo tiempo', 'correct' => ['tengo', 'tiempo'], 'extra' => ['no hay']],
                            'de' => ['sentence' => 'Ich habe Zeit', 'correct' => ['ich habe', 'Zeit'], 'extra' => ['es gibt nicht']],
                            'ja' => ['sentence' => '時間があります', 'correct' => ['時間が', 'あります'], 'extra' => ['ありません']],
                            'ko' => ['sentence' => '시간이 있어요', 'correct' => ['시간이', '있어요'], 'extra' => ['없어요']],
                            'tr' => ['sentence' => 'zamanım var', 'correct' => ['zamanım', 'var'], 'extra' => ['yok', 'ev']],
                            'ru' => ['sentence' => 'у меня время', 'correct' => ['у', 'меня', 'время'], 'extra' => ['нету']],
                            'ar' => ['sentence' => 'عندي وقت', 'correct' => ['عندي', 'وقت'], 'extra' => ['لا يوجد']],
                        ],
                    ],
                    'b' => [
                        'words' => ['məndə yoxdur', 'vaxt'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I do not have time', 'correct' => ['I do not have', 'time'], 'extra' => ['there is']],
                            'fr' => ['sentence' => "Je n'ai pas de temps", 'correct' => ["je n'ai pas", 'de temps'], 'extra' => ['il y a']],
                            'es' => ['sentence' => 'No tengo tiempo', 'correct' => ['no tengo', 'tiempo'], 'extra' => ['hay']],
                            'de' => ['sentence' => 'Ich habe keine Zeit', 'correct' => ['ich habe', 'keine', 'Zeit'], 'extra' => ['es gibt']],
                            'ja' => ['sentence' => '時間がありません', 'correct' => ['時間が', 'ありません'], 'extra' => ['あります']],
                            'ko' => ['sentence' => '시간이 없어요', 'correct' => ['시간이', '없어요'], 'extra' => ['있어요']],
                            'tr' => ['sentence' => 'zamanım yok', 'correct' => ['zamanım', 'yok'], 'extra' => ['var', 'ev']],
                            'ru' => ['sentence' => 'у меня нету время', 'correct' => ['у', 'меня', 'нету', 'время'], 'extra' => ['есть']],
                            'ar' => ['sentence' => 'ليس عندي وقت', 'correct' => ['ليس عندي', 'وقت'], 'extra' => ['يوجد']],
                        ],
                    ],
                    'c' => [
                        'words' => ['indi', 'mən', 'məşğul'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Now I am busy', 'correct' => ['now', 'I am', 'busy'], 'extra' => ['time']],
                            'fr' => ['sentence' => 'Maintenant je suis occupé', 'correct' => ['maintenant', 'je suis', 'occupé'], 'extra' => ['temps']],
                            'es' => ['sentence' => 'Ahora estoy ocupado', 'correct' => ['ahora', 'estoy', 'ocupado'], 'extra' => ['tiempo']],
                            'de' => ['sentence' => 'Jetzt bin ich beschäftigt', 'correct' => ['jetzt', 'bin ich', 'beschäftigt'], 'extra' => ['Zeit']],
                            'ja' => ['sentence' => '今忙しいです', 'correct' => ['今', '忙しいです'], 'extra' => ['時間']],
                            'ko' => ['sentence' => '지금 바빠요', 'correct' => ['지금', '바빠요'], 'extra' => ['시간']],
                            'tr' => ['sentence' => 'şimdi meşgul', 'correct' => ['şimdi', 'meşgul'], 'extra' => ['var', 'yok']],
                            'ru' => ['sentence' => 'сейчас я занят', 'correct' => ['сейчас', 'я', 'занят'], 'extra' => ['время']],
                            'ar' => ['sentence' => 'الآن أنا مشغول', 'correct' => ['الآن', 'أنا', 'مشغول'], 'extra' => ['وقت']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Leaving a Message', 3,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Var'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['var', 'bir', 'mesaj'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is a message', 'correct' => ['there is', 'a', 'message'], 'extra' => ['number']],
                            'fr' => ['sentence' => 'Il y a un message', 'correct' => ['il y a', 'un', 'message'], 'extra' => ['numéro']],
                            'es' => ['sentence' => 'Hay un mensaje', 'correct' => ['hay', 'un', 'mensaje'], 'extra' => ['número']],
                            'de' => ['sentence' => 'Es gibt eine Nachricht', 'correct' => ['es gibt', 'eine', 'Nachricht'], 'extra' => ['Nummer']],
                            'ja' => ['sentence' => 'メッセージがあります', 'correct' => ['メッセージが', 'あります'], 'extra' => ['番号']],
                            'ko' => ['sentence' => '메시지가 있어요', 'correct' => ['메시지가', '있어요'], 'extra' => ['번호']],
                            'tr' => ['sentence' => 'bir mesaj var', 'correct' => ['bir', 'mesaj', 'var'], 'extra' => ['numara', 'telefon']],
                            'ru' => ['sentence' => 'есть сообщение', 'correct' => ['есть', 'сообщение'], 'extra' => ['номер']],
                            'ar' => ['sentence' => 'يوجد رسالة', 'correct' => ['يوجد', 'رسالة'], 'extra' => ['رقم']],
                        ],
                    ],
                    'b' => [
                        'words' => ['nömrə', 'səhv'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The number is wrong', 'correct' => ['the number', 'is', 'wrong'], 'extra' => ['message']],
                            'fr' => ['sentence' => 'Le numéro est faux', 'correct' => ['le numéro', 'est', 'faux'], 'extra' => ['message']],
                            'es' => ['sentence' => 'El número es falso', 'correct' => ['el número', 'es', 'falso'], 'extra' => ['mensaje']],
                            'de' => ['sentence' => 'Die Nummer ist falsch', 'correct' => ['die Nummer', 'ist', 'falsch'], 'extra' => ['Nachricht']],
                            'ja' => ['sentence' => '番号が間違いです', 'correct' => ['番号が', '間違いです'], 'extra' => ['メッセージ']],
                            'ko' => ['sentence' => '번호가 틀려요', 'correct' => ['번호가', '틀려요'], 'extra' => ['메시지']],
                            'tr' => ['sentence' => 'numara yanlış', 'correct' => ['numara', 'yanlış'], 'extra' => ['mesaj', 'telefon']],
                            'ru' => ['sentence' => 'номер неправильно', 'correct' => ['номер', 'неправильно'], 'extra' => ['сообщение']],
                            'ar' => ['sentence' => 'رقم خطأ', 'correct' => ['رقم', 'خطأ'], 'extra' => ['رسالة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['zəng edəcəyəm', 'sonradan'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I will call later', 'correct' => ['I will call', 'later'], 'extra' => ['now', 'message']],
                            'fr' => ['sentence' => "J'appellerai ensuite", 'correct' => ["j'appellerai", 'ensuite'], 'extra' => ['maintenant', 'message']],
                            'es' => ['sentence' => 'Llamaré luego', 'correct' => ['llamaré', 'luego'], 'extra' => ['ahora', 'mensaje']],
                            'de' => ['sentence' => 'Ich rufe dann an', 'correct' => ['ich rufe', 'dann', 'an'], 'extra' => ['jetzt', 'Nachricht']],
                            'ja' => ['sentence' => 'それから電話します', 'correct' => ['それから', '電話します'], 'extra' => ['今', 'メッセージ']],
                            'ko' => ['sentence' => '그 다음 전화할게요', 'correct' => ['그 다음', '전화할게요'], 'extra' => ['지금', '메시지']],
                            'tr' => ['sentence' => 'sonra ararım', 'correct' => ['sonra', 'ararım'], 'extra' => ['mesaj', 'numara']],
                            'ru' => ['sentence' => 'я позвоню позже', 'correct' => ['я', 'позвоню', 'позже'], 'extra' => ['сейчас', 'сообщение']],
                            'ar' => ['sentence' => 'سأتصل لاحقا', 'correct' => ['سأتصل', 'لاحقا'], 'extra' => ['الآن', 'رسالة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Is Everything Alright?', 4,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Hər şey'], ['az' => 'Yaxşı']],
                phrases: [
                    'a' => [
                        'words' => ['hər şey', 'yaxşı'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Everything is good', 'correct' => ['everything', 'is', 'good'], 'extra' => ['bad']],
                            'fr' => ['sentence' => 'Tout est bien', 'correct' => ['tout', 'est', 'bien'], 'extra' => ['mauvais']],
                            'es' => ['sentence' => 'Todo está bien', 'correct' => ['todo', 'está', 'bien'], 'extra' => ['malo']],
                            'de' => ['sentence' => 'Alles ist gut', 'correct' => ['alles', 'ist', 'gut'], 'extra' => ['schlecht']],
                            'ja' => ['sentence' => 'すべて良いです', 'correct' => ['すべて', '良いです'], 'extra' => ['悪い']],
                            'ko' => ['sentence' => '모든 것이 좋아요', 'correct' => ['모든 것이', '좋아요'], 'extra' => ['나쁜']],
                            'tr' => ['sentence' => 'her şey iyi', 'correct' => ['her', 'şey', 'iyi'], 'extra' => ['i̇yi', 'şimdi']],
                            'ru' => ['sentence' => 'всё хороший', 'correct' => ['всё', 'хороший'], 'extra' => ['плохой']],
                            'ar' => ['sentence' => 'كل شيء جيد', 'correct' => ['كل شيء', 'جيد'], 'extra' => ['سيء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['o kişi', 'deyil', 'evdə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'He is not in the house', 'correct' => ['he', 'is not', 'in the house'], 'extra' => ['now']],
                            'fr' => ['sentence' => "Il n'est pas à la maison", 'correct' => ['il', "n'est pas", 'à la maison'], 'extra' => ['maintenant']],
                            'es' => ['sentence' => 'No está en la casa', 'correct' => ['no está', 'en la casa'], 'extra' => ['ahora']],
                            'de' => ['sentence' => 'Er ist nicht im Haus', 'correct' => ['er', 'ist nicht', 'im Haus'], 'extra' => ['jetzt']],
                            'ja' => ['sentence' => '家にいません', 'correct' => ['家に', 'いません'], 'extra' => ['今']],
                            'ko' => ['sentence' => '집에 없어요', 'correct' => ['집에', '없어요'], 'extra' => ['지금']],
                            'tr' => ['sentence' => 'ev evde değil', 'correct' => ['ev', 'evde', 'değil'], 'extra' => ['i̇yi', 'şimdi']],
                            'ru' => ['sentence' => 'он не в доме', 'correct' => ['он', 'не', 'в', 'доме'], 'extra' => ['сейчас']],
                            'ar' => ['sentence' => 'هو ليس في البيت', 'correct' => ['هو', 'ليس', 'في', 'البيت'], 'extra' => ['الآن']],
                        ],
                    ],
                    'c' => [
                        'words' => ['indi', 'o', 'məktəbdə'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Now he is at school', 'correct' => ['now', 'he is', 'at school'], 'extra' => ['in the house']],
                            'fr' => ['sentence' => "Maintenant il est à l'école", 'correct' => ['maintenant', 'il est', "à l'école"], 'extra' => ['à la maison']],
                            'es' => ['sentence' => 'Ahora está en la escuela', 'correct' => ['ahora', 'está', 'en la escuela'], 'extra' => ['en la casa']],
                            'de' => ['sentence' => 'Jetzt ist er in der Schule', 'correct' => ['jetzt', 'ist er', 'in der Schule'], 'extra' => ['im Haus']],
                            'ja' => ['sentence' => '今学校にいます', 'correct' => ['今', '学校に', 'います'], 'extra' => ['家に']],
                            'ko' => ['sentence' => '지금 학교에 있어요', 'correct' => ['지금', '학교에', '있어요'], 'extra' => ['집에']],
                            'tr' => ['sentence' => 'şimdi okulda', 'correct' => ['şimdi', 'okulda'], 'extra' => ['i̇yi', 'arkadaş']],
                            'ru' => ['sentence' => 'сейчас он в школе', 'correct' => ['сейчас', 'он', 'в', 'школе'], 'extra' => ['доме']],
                            'ar' => ['sentence' => 'الآن هو في المدرسة', 'correct' => ['الآن', 'هو', 'في المدرسة'], 'extra' => ['في', 'البيت']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ending the Call', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'İndi'], ['az' => 'O kişi']],
                phrases: [
                    'a' => [
                        'words' => ['indi', 'o kişi', 'deyil', 'məşğul'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Now he is not busy', 'correct' => ['now', 'he', 'is not', 'busy'], 'extra' => ['time']],
                            'fr' => ['sentence' => "Maintenant il n'est pas occupé", 'correct' => ['maintenant', 'il', "n'est pas", 'occupé'], 'extra' => ['temps']],
                            'es' => ['sentence' => 'Ahora no está ocupado', 'correct' => ['ahora', 'no está', 'ocupado'], 'extra' => ['tiempo']],
                            'de' => ['sentence' => 'Jetzt ist er nicht beschäftigt', 'correct' => ['jetzt', 'ist er nicht', 'beschäftigt'], 'extra' => ['Zeit']],
                            'ja' => ['sentence' => '今忙しくありません', 'correct' => ['今', '忙しく', 'ありません'], 'extra' => ['時間']],
                            'ko' => ['sentence' => '지금 바쁘지 않아요', 'correct' => ['지금', '바쁘지 않아요'], 'extra' => ['시간']],
                            'tr' => ['sentence' => 'şimdi meşgul değil', 'correct' => ['şimdi', 'meşgul', 'değil'], 'extra' => ['ararım', 'telefon']],
                            'ru' => ['sentence' => 'сейчас он не занят', 'correct' => ['сейчас', 'он', 'не', 'занят'], 'extra' => ['время']],
                            'ar' => ['sentence' => 'الآن هو ليس مشغول', 'correct' => ['الآن', 'هو', 'ليس', 'مشغول'], 'extra' => ['وقت']],
                        ],
                    ],
                    'b' => [
                        'words' => ['zəng edəcəyəm', 'sabah'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I will call tomorrow', 'correct' => ['I will call', 'tomorrow'], 'extra' => ['now']],
                            'fr' => ['sentence' => "J'appellerai demain", 'correct' => ["j'appellerai", 'demain'], 'extra' => ['maintenant']],
                            'es' => ['sentence' => 'Llamaré mañana', 'correct' => ['llamaré', 'mañana'], 'extra' => ['ahora']],
                            'de' => ['sentence' => 'Ich rufe morgen an', 'correct' => ['ich rufe', 'morgen', 'an'], 'extra' => ['jetzt']],
                            'ja' => ['sentence' => '明日電話します', 'correct' => ['明日', '電話します'], 'extra' => ['今']],
                            'ko' => ['sentence' => '내일 전화할게요', 'correct' => ['내일', '전화할게요'], 'extra' => ['지금']],
                            'tr' => ['sentence' => 'yarın ararım', 'correct' => ['yarın', 'ararım'], 'extra' => ['meşgul', 'telefon']],
                            'ru' => ['sentence' => 'я позвоню завтра', 'correct' => ['я', 'позвоню', 'завтра'], 'extra' => ['сейчас']],
                            'ar' => ['sentence' => 'سأتصل غدا', 'correct' => ['سأتصل', 'غدا'], 'extra' => ['الآن']],
                        ],
                    ],
                    'c' => [
                        'words' => ['təşəkkür', 'və', 'sağ ol'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you and goodbye', 'correct' => ['thank you', 'and', 'goodbye'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Merci et au revoir', 'correct' => ['merci', 'et', 'au revoir'], 'extra' => ['allô']],
                            'es' => ['sentence' => 'Gracias y adiós', 'correct' => ['gracias', 'y', 'adiós'], 'extra' => ['diga']],
                            'de' => ['sentence' => 'Danke und auf Wiedersehen', 'correct' => ['danke', 'und', 'auf Wiedersehen'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'ありがとうさようなら', 'correct' => ['ありがとう', 'さようなら'], 'extra' => ['もしもし']],
                            'ko' => ['sentence' => '고맙습니다 안녕히 계세요', 'correct' => ['고맙습니다', '안녕히 계세요'], 'extra' => ['여보세요']],
                            'tr' => ['sentence' => 'teşekkürler ve hoşça kal', 'correct' => ['teşekkürler', 've', 'hoşça kal'], 'extra' => ['ararım', 'meşgul']],
                            'ru' => ['sentence' => 'спасибо и до свидания', 'correct' => ['спасибо', 'и', 'до свидания'], 'extra' => ['привет']],
                            'ar' => ['sentence' => 'شكرا و مع السلامة', 'correct' => ['شكرا', 'و', 'مع السلامة'], 'extra' => ['مرحبا']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
