<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitRestaurant03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Hesap' => 'bill',
        'Kart' => 'card',
        'Para' => 'money',
        'Menü' => 'menu',
        'Masa' => 'table',
    ];

    /**
     * Turkish Restaurant Unit 3 - settling up.
     *
     * THE RULE THIS UNIT TEACHES: THE ACCUSATIVE MARKS A DEFINITE OBJECT.
     *
     * Unit 1 kept the ordered noun bare, because ordering introduces something new.
     * Paying is the opposite: the bill is already on the table, both people know
     * which one, so it takes the accusative -ı:
     *
     *     hesap    a bill
     *     hesabı   the bill        (and the p softens to b before a vowel)
     *
     * `Hesabı istiyorum` is "the-bill I-want". A learner who says `hesap istiyorum`
     * is asking for "a bill" as though one had never been mentioned, which is the
     * mistake this unit exists to prevent.
     *
     * `ile` means "with" and attaches to the means of payment: `kart ile`, `nakit
     * ile`. It stays a separate word here rather than the -la suffix, because the
     * suffix form varies by vowel and that is a later lesson.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Paying the Bill', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Bill Please', 1,
                pictures: [['tr' => 'Hesap', 'img' => 'bill'], ['tr' => 'Para', 'img' => 'money']],
                plain: [['tr' => 'Hesap'], ['tr' => 'Para']],
                phrases: [
                    'a' => [
                        'words' => ['hesap', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill please', 'correct' => ['the bill', 'please'], 'extra' => ['money']],
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['pul']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['نقود']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['деньги']],
                            'fr' => ['sentence' => 'L’addition s’il vous plaît', 'correct' => ['l’addition', 's’il vous plaît'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'La cuenta por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Die Rechnung bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計を', 'お願いします'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['돈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['hesabı', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like the bill', 'correct' => ['I would like', 'the bill'], 'extra' => ['money']],
                            'az' => ['sentence' => 'istəyirəm hesab', 'correct' => ['istəyirəm', 'hesab'], 'extra' => ['pul']],
                            'ar' => ['sentence' => 'أريد الحساب', 'correct' => ['أريد', 'الحساب'], 'extra' => ['نقود']],
                            'ru' => ['sentence' => 'я хочу счёт', 'correct' => ['я', 'хочу', 'счёт'], 'extra' => ['деньги']],
                            'fr' => ['sentence' => 'Je voudrais l’addition', 'correct' => ['je voudrais', 'l’addition'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'Quisiera la cuenta', 'correct' => ['quisiera', 'la cuenta'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Ich möchte die Rechnung', 'correct' => ['ich möchte', 'die Rechnung'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => 'お会計をください', 'correct' => ['お会計を', 'ください'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서를 주세요', 'correct' => ['계산서를', '주세요'], 'extra' => ['돈']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hesap', 'kaç', 'lira'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the bill', 'correct' => ['how many', 'lira', 'is', 'the bill'], 'extra' => ['money']],
                            'az' => ['sentence' => 'neçə manat hesab', 'correct' => ['neçə', 'manat', 'hesab'], 'extra' => ['pul']],
                            'ar' => ['sentence' => 'كم ريال الحساب', 'correct' => ['كم', 'ريال', 'الحساب'], 'extra' => ['نقود']],
                            'ru' => ['sentence' => 'сколько рубль счёт', 'correct' => ['сколько', 'рубль', 'счёт'], 'extra' => ['деньги']],
                            'fr' => ['sentence' => 'Combien de lires est l’addition', 'correct' => ['combien de', 'lires', 'est', 'l’addition'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'Cuántas liras es la cuenta', 'correct' => ['cuántas', 'liras', 'es', 'la cuenta'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Wie viele Lira ist die Rechnung', 'correct' => ['wie viele', 'Lira', 'ist', 'die Rechnung'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => 'お会計は何リラですか', 'correct' => ['お会計は', '何', 'リラですか'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서는 몇 리라예요', 'correct' => ['계산서는', '몇', '리라예요'], 'extra' => ['돈']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Card or Cash', 2,
                pictures: [['tr' => 'Kart', 'img' => 'card'], ['tr' => 'Para', 'img' => 'money']],
                plain: [['tr' => 'Kart'], ['tr' => 'Nakit']],
                phrases: [
                    'a' => [
                        'words' => ['kart', 'ile'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'With a card', 'correct' => ['with', 'a', 'card'], 'extra' => ['cash']],
                            'az' => ['sentence' => 'ilə bir kart', 'correct' => ['ilə', 'bir', 'kart'], 'extra' => ['nağd']],
                            'ar' => ['sentence' => 'مع بطاقة', 'correct' => ['مع', 'بطاقة'], 'extra' => ['كاش']],
                            'ru' => ['sentence' => 'с карта', 'correct' => ['с', 'карта'], 'extra' => ['наличные']],
                            'fr' => ['sentence' => 'Avec une carte', 'correct' => ['avec', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Con una tarjeta', 'correct' => ['con', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Mit einer Karte', 'correct' => ['mit', 'einer', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードで', 'correct' => ['カード', 'で'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로', 'correct' => ['카드로'], 'extra' => ['현금']],
                        ],
                    ],
                    'b' => [
                        'words' => ['nakit', 'ile'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'With cash', 'correct' => ['with', 'cash'], 'extra' => ['card']],
                            'az' => ['sentence' => 'ilə nağd', 'correct' => ['ilə', 'nağd'], 'extra' => ['kart']],
                            'ar' => ['sentence' => 'مع كاش', 'correct' => ['مع', 'كاش'], 'extra' => ['بطاقة']],
                            'ru' => ['sentence' => 'с наличные', 'correct' => ['с', 'наличные'], 'extra' => ['карта']],
                            'fr' => ['sentence' => 'Avec des espèces', 'correct' => ['avec', 'des espèces'], 'extra' => ['carte']],
                            'es' => ['sentence' => 'Con efectivo', 'correct' => ['con', 'efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Mit Bargeld', 'correct' => ['mit', 'Bargeld'], 'extra' => ['Karte']],
                            'ja' => ['sentence' => '現金で', 'correct' => ['現金', 'で'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '현금으로', 'correct' => ['현금으로'], 'extra' => ['카드']],
                        ],
                    ],
                    'c' => [
                        'words' => ['kart', 'var', 'mı'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Is there a card', 'correct' => ['is there', 'a', 'card'], 'extra' => ['cash']],
                            'az' => ['sentence' => 'mı bir kart', 'correct' => ['mı', 'bir', 'kart'], 'extra' => ['nağd']],
                            'ar' => ['sentence' => 'هل بطاقة', 'correct' => ['هل', 'بطاقة'], 'extra' => ['كاش']],
                            'ru' => ['sentence' => 'ли карта', 'correct' => ['ли', 'карта'], 'extra' => ['наличные']],
                            'fr' => ['sentence' => 'Y a-t-il une carte', 'correct' => ['y a-t-il', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Hay una tarjeta', 'correct' => ['hay', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Gibt es eine Karte', 'correct' => ['gibt es', 'eine', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードがありますか', 'correct' => ['カードが', 'ありますか'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드가 있어요', 'correct' => ['카드가', '있어요'], 'extra' => ['현금']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Paying Together', 3,
                pictures: [['tr' => 'Hesap', 'img' => 'bill'], ['tr' => 'Masa', 'img' => 'table']],
                plain: [['tr' => 'Birlikte'], ['tr' => 'Hesap']],
                phrases: [
                    'a' => [
                        'words' => ['birlikte', 'ödüyoruz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'We are paying together', 'correct' => ['we are paying', 'together'], 'extra' => ['the bill']],
                            'az' => ['sentence' => 'ödəyirik birlikdə', 'correct' => ['ödəyirik', 'birlikdə'], 'extra' => ['hesab']],
                            'ar' => ['sentence' => 'ندفع معا', 'correct' => ['ندفع', 'معا'], 'extra' => ['الحساب']],
                            'ru' => ['sentence' => 'мы платим вместе', 'correct' => ['мы', 'платим', 'вместе'], 'extra' => ['счёт']],
                            'fr' => ['sentence' => 'Nous payons ensemble', 'correct' => ['nous payons', 'ensemble'], 'extra' => ['l’addition']],
                            'es' => ['sentence' => 'Pagamos juntos', 'correct' => ['pagamos', 'juntos'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Wir zahlen zusammen', 'correct' => ['wir zahlen', 'zusammen'], 'extra' => ['die Rechnung']],
                            'ja' => ['sentence' => '一緒に払います', 'correct' => ['一緒に', '払います'], 'extra' => ['お会計']],
                            'ko' => ['sentence' => '함께 계산해요', 'correct' => ['함께', '계산해요'], 'extra' => ['계산서']],
                        ],
                    ],
                    'b' => [
                        'words' => ['hesabı', 'ben', 'ödüyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am paying the bill', 'correct' => ['I am paying', 'the bill'], 'extra' => ['together']],
                            'az' => ['sentence' => 'ödəyirəm hesab', 'correct' => ['ödəyirəm', 'hesab'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'أدفع الحساب', 'correct' => ['أدفع', 'الحساب'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'я плачу счёт', 'correct' => ['я', 'плачу', 'счёт'], 'extra' => ['вместе']],
                            'fr' => ['sentence' => 'Je paie l’addition', 'correct' => ['je paie', 'l’addition'], 'extra' => ['ensemble']],
                            'es' => ['sentence' => 'Pago la cuenta', 'correct' => ['pago', 'la cuenta'], 'extra' => ['juntos']],
                            'de' => ['sentence' => 'Ich zahle die Rechnung', 'correct' => ['ich zahle', 'die Rechnung'], 'extra' => ['zusammen']],
                            'ja' => ['sentence' => '私がお会計を払います', 'correct' => ['私が', 'お会計を', '払います'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '제가 계산서를 계산해요', 'correct' => ['제가', '계산서를', '계산해요'], 'extra' => ['함께']],
                        ],
                    ],
                    'c' => [
                        'words' => ['teşekkürler'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you', 'correct' => ['thank you'], 'extra' => ['please']],
                            'az' => ['sentence' => 'təşəkkür', 'correct' => ['təşəkkür'], 'extra' => ['zəhmət olmasa']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['من فضلك']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['пожалуйста']],
                            'fr' => ['sentence' => 'Merci', 'correct' => ['merci'], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Gracias', 'correct' => ['gracias'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Danke', 'correct' => ['danke'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'ありがとう', 'correct' => ['ありがとう'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '고맙습니다', 'correct' => ['고맙습니다'], 'extra' => ['부탁합니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: A Mistake on the Bill', 4,
                pictures: [['tr' => 'Hesap', 'img' => 'bill'], ['tr' => 'Menü', 'img' => 'menu']],
                plain: [['tr' => 'Yanlış'], ['tr' => 'Doğru']],
                phrases: [
                    'a' => [
                        'words' => ['hesap', 'yanlış'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill is wrong', 'correct' => ['the bill', 'is', 'wrong'], 'extra' => ['true']],
                            'az' => ['sentence' => 'hesab səhv', 'correct' => ['hesab', 'səhv'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'الحساب خطأ', 'correct' => ['الحساب', 'خطأ'], 'extra' => ['صحيح']],
                            'ru' => ['sentence' => 'счёт неправильно', 'correct' => ['счёт', 'неправильно'], 'extra' => ['правильно']],
                            'fr' => ['sentence' => 'L’addition est fausse', 'correct' => ['l’addition', 'est', 'fausse'], 'extra' => ['vrai']],
                            'es' => ['sentence' => 'La cuenta es falsa', 'correct' => ['la cuenta', 'es', 'falsa'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Die Rechnung ist falsch', 'correct' => ['die Rechnung', 'ist', 'falsch'], 'extra' => ['richtig']],
                            'ja' => ['sentence' => 'お会計が間違いです', 'correct' => ['お会計が', '間違いです'], 'extra' => ['正しい']],
                            'ko' => ['sentence' => '계산서가 틀려요', 'correct' => ['계산서가', '틀려요'], 'extra' => ['맞는']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'doğru', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is not true', 'correct' => ['this', 'is not', 'true'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'bu deyil düzgün', 'correct' => ['bu', 'deyil', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'هذا ليس صحيح', 'correct' => ['هذا', 'ليس', 'صحيح'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'это не правильно', 'correct' => ['это', 'не', 'правильно'], 'extra' => ['неправильно']],
                            'fr' => ['sentence' => 'Ceci n’est pas vrai', 'correct' => ['ceci', 'n’est pas', 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto no es verdadero', 'correct' => ['esto', 'no es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist nicht richtig', 'correct' => ['das', 'ist nicht', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しくありません', 'correct' => ['これは', '正しく', 'ありません'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞지 않아요', 'correct' => ['이것은', '맞지 않아요'], 'extra' => ['틀린']],
                        ],
                    ],
                    'c' => [
                        'words' => ['affedersiniz'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me', 'correct' => ['excuse me'], 'extra' => ['thank you']],
                            'az' => ['sentence' => 'bağışlayın', 'correct' => ['bağışlayın'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'عفوا', 'correct' => ['عفوا'], 'extra' => ['شكرا']],
                            'ru' => ['sentence' => 'извините', 'correct' => ['извините'], 'extra' => ['спасибо']],
                            'fr' => ['sentence' => 'Excusez-moi', 'correct' => ['excusez-moi'], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Perdón', 'correct' => ['perdón'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Entschuldigung', 'correct' => ['Entschuldigung'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'すみません', 'correct' => ['すみません'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '실례합니다', 'correct' => ['실례합니다'], 'extra' => ['고맙습니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Settling Up', 5,
                pictures: [['tr' => 'Kart', 'img' => 'card'], ['tr' => 'Hesap', 'img' => 'bill']],
                plain: [['tr' => 'Nakit'], ['tr' => 'Kart']],
                phrases: [
                    'a' => [
                        'words' => ['hesabı', 'kart', 'ile', 'ödüyorum'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I am paying the bill with a card', 'correct' => ['I am paying', 'the bill', 'with', 'a', 'card'], 'extra' => ['cash']],
                            'az' => ['sentence' => 'ödəyirəm hesab ilə bir kart', 'correct' => ['ödəyirəm', 'hesab', 'ilə', 'bir', 'kart'], 'extra' => ['nağd']],
                            'ar' => ['sentence' => 'أدفع الحساب مع بطاقة', 'correct' => ['أدفع', 'الحساب', 'مع', 'بطاقة'], 'extra' => ['كاش']],
                            'ru' => ['sentence' => 'я плачу счёт с карта', 'correct' => ['я', 'плачу', 'счёт', 'с', 'карта'], 'extra' => ['наличные']],
                            'fr' => ['sentence' => 'Je paie l’addition avec une carte', 'correct' => ['je paie', 'l’addition', 'avec', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Pago la cuenta con una tarjeta', 'correct' => ['pago', 'la cuenta', 'con', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Ich zahle die Rechnung mit einer Karte', 'correct' => ['ich zahle', 'die Rechnung', 'mit', 'einer', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードでお会計を払います', 'correct' => ['カードで', 'お会計を', '払います'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로 계산서를 계산해요', 'correct' => ['카드로', '계산서를', '계산해요'], 'extra' => ['현금']],
                        ],
                    ],
                    'b' => [
                        'words' => ['nakit', 'yok'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is no cash', 'correct' => ['there is no', 'cash'], 'extra' => ['card']],
                            'az' => ['sentence' => 'yoxdur nağd', 'correct' => ['yoxdur', 'nağd'], 'extra' => ['kart']],
                            'ar' => ['sentence' => 'لا يوجد كاش', 'correct' => ['لا يوجد', 'كاش'], 'extra' => ['بطاقة']],
                            'ru' => ['sentence' => 'нету наличные', 'correct' => ['нету', 'наличные'], 'extra' => ['карта']],
                            'fr' => ['sentence' => 'Il n’y a pas d’espèces', 'correct' => ['il n’y a pas', 'd’espèces'], 'extra' => ['carte']],
                            'es' => ['sentence' => 'No hay efectivo', 'correct' => ['no hay', 'efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Es gibt kein Bargeld', 'correct' => ['es gibt kein', 'Bargeld'], 'extra' => ['Karte']],
                            'ja' => ['sentence' => '現金がありません', 'correct' => ['現金が', 'ありません'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '현금이 없어요', 'correct' => ['현금이', '없어요'], 'extra' => ['카드']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hesap', 'doğru'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill is true', 'correct' => ['the bill', 'is', 'true'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'hesab düzgün', 'correct' => ['hesab', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'الحساب صحيح', 'correct' => ['الحساب', 'صحيح'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'счёт правильно', 'correct' => ['счёт', 'правильно'], 'extra' => ['неправильно']],
                            'fr' => ['sentence' => 'L’addition est vraie', 'correct' => ['l’addition', 'est', 'vraie'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'La cuenta es verdadera', 'correct' => ['la cuenta', 'es', 'verdadera'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Die Rechnung ist richtig', 'correct' => ['die Rechnung', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'お会計は正しいです', 'correct' => ['お会計は', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '계산서는 맞아요', 'correct' => ['계산서는', '맞아요'], 'extra' => ['틀린']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
