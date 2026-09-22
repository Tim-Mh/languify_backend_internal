<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitRestaurant03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Hesab' => 'bill', 'Qəhvə' => 'coffee', 'Kart' => 'card', 'Çay' => 'tea',
        'Su' => 'water', 'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese',
    ];

    /**
     * Azerbaijani Restaurant Unit 3.
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
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Paying the Bill', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Bill Please', 1,
                pictures: [['az' => 'Hesab', 'img' => 'bill'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Zəhmət olmasa'], ['az' => 'İstəyirəm']],
                phrases: [
                    'a' => [
                        'words' => ['hesab', 'zəhmət olmasa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill please', 'correct' => ['the bill', 'please'], 'extra' => ['money']],
                            'fr' => ['sentence' => 'L’addition s’il vous plaît', 'correct' => ['l’addition', 's’il vous plaît'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'La cuenta por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Die Rechnung bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計を', 'お願いします'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['돈']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['para', 'para']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['деньги']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['نقود']],
                        ],
                    ],
                    'b' => [
                        'words' => ['istəyirəm', 'hesab'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like the bill', 'correct' => ['I would like', 'the bill'], 'extra' => ['money']],
                            'fr' => ['sentence' => 'Je voudrais l’addition', 'correct' => ['je voudrais', 'l’addition'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'Quisiera la cuenta', 'correct' => ['quisiera', 'la cuenta'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Ich möchte die Rechnung', 'correct' => ['ich möchte', 'die Rechnung'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => 'お会計をください', 'correct' => ['お会計を', 'ください'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서를 주세요', 'correct' => ['계산서를', '주세요'], 'extra' => ['돈']],
                            'tr' => ['sentence' => 'hesabı istiyorum', 'correct' => ['hesabı', 'istiyorum'], 'extra' => ['hesap', 'para']],
                            'ru' => ['sentence' => 'я хочу счёт', 'correct' => ['я', 'хочу', 'счёт'], 'extra' => ['деньги']],
                            'ar' => ['sentence' => 'أريد الحساب', 'correct' => ['أريد', 'الحساب'], 'extra' => ['نقود']],
                        ],
                    ],
                    'c' => [
                        'words' => ['neçə', 'manat', 'hesab'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the bill', 'correct' => ['how many', 'lira', 'is', 'the bill'], 'extra' => ['money']],
                            'fr' => ['sentence' => 'Combien de lires est l’addition', 'correct' => ['combien de', 'lires', 'est', 'l’addition'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'Cuántas liras es la cuenta', 'correct' => ['cuántas', 'liras', 'es', 'la cuenta'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Wie viele Lira ist die Rechnung', 'correct' => ['wie viele', 'Lira', 'ist', 'die Rechnung'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => 'お会計は何リラですか', 'correct' => ['お会計は', '何', 'リラですか'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서는 몇 리라예요', 'correct' => ['계산서는', '몇', '리라예요'], 'extra' => ['돈']],
                            'tr' => ['sentence' => 'hesap kaç lira', 'correct' => ['hesap', 'kaç', 'lira'], 'extra' => ['para', 'para']],
                            'ru' => ['sentence' => 'сколько рубль счёт', 'correct' => ['сколько', 'рубль', 'счёт'], 'extra' => ['деньги']],
                            'ar' => ['sentence' => 'كم ريال الحساب', 'correct' => ['كم', 'ريال', 'الحساب'], 'extra' => ['نقود']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Card or Cash', 2,
                pictures: [['az' => 'Kart', 'img' => 'card'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'İlə'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['ilə', 'bir', 'kart'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'With a card', 'correct' => ['with', 'a', 'card'], 'extra' => ['cash']],
                            'fr' => ['sentence' => 'Avec une carte', 'correct' => ['avec', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Con una tarjeta', 'correct' => ['con', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Mit einer Karte', 'correct' => ['mit', 'einer', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードで', 'correct' => ['カード', 'で'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로', 'correct' => ['카드로'], 'extra' => ['현금']],
                            'tr' => ['sentence' => 'kart ile', 'correct' => ['kart', 'ile'], 'extra' => ['nakit', 'para']],
                            'ru' => ['sentence' => 'с карта', 'correct' => ['с', 'карта'], 'extra' => ['наличные']],
                            'ar' => ['sentence' => 'مع بطاقة', 'correct' => ['مع', 'بطاقة'], 'extra' => ['كاش']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ilə', 'nağd'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'With cash', 'correct' => ['with', 'cash'], 'extra' => ['card']],
                            'fr' => ['sentence' => 'Avec des espèces', 'correct' => ['avec', 'des espèces'], 'extra' => ['carte']],
                            'es' => ['sentence' => 'Con efectivo', 'correct' => ['con', 'efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Mit Bargeld', 'correct' => ['mit', 'Bargeld'], 'extra' => ['Karte']],
                            'ja' => ['sentence' => '現金で', 'correct' => ['現金', 'で'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '현금으로', 'correct' => ['현금으로'], 'extra' => ['카드']],
                            'tr' => ['sentence' => 'nakit ile', 'correct' => ['nakit', 'ile'], 'extra' => ['kart', 'kart']],
                            'ru' => ['sentence' => 'с наличные', 'correct' => ['с', 'наличные'], 'extra' => ['карта']],
                            'ar' => ['sentence' => 'مع كاش', 'correct' => ['مع', 'كاش'], 'extra' => ['بطاقة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mı', 'bir', 'kart'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Is there a card', 'correct' => ['is there', 'a', 'card'], 'extra' => ['cash']],
                            'fr' => ['sentence' => 'Y a-t-il une carte', 'correct' => ['y a-t-il', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Hay una tarjeta', 'correct' => ['hay', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Gibt es eine Karte', 'correct' => ['gibt es', 'eine', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードがありますか', 'correct' => ['カードが', 'ありますか'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드가 있어요', 'correct' => ['카드가', '있어요'], 'extra' => ['현금']],
                            'tr' => ['sentence' => 'kart var mı', 'correct' => ['kart', 'var', 'mı'], 'extra' => ['nakit', 'para']],
                            'ru' => ['sentence' => 'ли карта', 'correct' => ['ли', 'карта'], 'extra' => ['наличные']],
                            'ar' => ['sentence' => 'هل بطاقة', 'correct' => ['هل', 'بطاقة'], 'extra' => ['كاش']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Paying Together', 3,
                pictures: [['az' => 'Hesab', 'img' => 'bill'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Ödəyirik'], ['az' => 'Birlikdə']],
                phrases: [
                    'a' => [
                        'words' => ['ödəyirik', 'birlikdə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'We are paying together', 'correct' => ['we are paying', 'together'], 'extra' => ['the bill']],
                            'fr' => ['sentence' => 'Nous payons ensemble', 'correct' => ['nous payons', 'ensemble'], 'extra' => ['l’addition']],
                            'es' => ['sentence' => 'Pagamos juntos', 'correct' => ['pagamos', 'juntos'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Wir zahlen zusammen', 'correct' => ['wir zahlen', 'zusammen'], 'extra' => ['die Rechnung']],
                            'ja' => ['sentence' => '一緒に払います', 'correct' => ['一緒に', '払います'], 'extra' => ['お会計']],
                            'ko' => ['sentence' => '함께 계산해요', 'correct' => ['함께', '계산해요'], 'extra' => ['계산서']],
                            'tr' => ['sentence' => 'birlikte ödüyoruz', 'correct' => ['birlikte', 'ödüyoruz'], 'extra' => ['hesap', 'hesap']],
                            'ru' => ['sentence' => 'мы платим вместе', 'correct' => ['мы', 'платим', 'вместе'], 'extra' => ['счёт']],
                            'ar' => ['sentence' => 'ندفع معا', 'correct' => ['ندفع', 'معا'], 'extra' => ['الحساب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ödəyirəm', 'hesab'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am paying the bill', 'correct' => ['I am paying', 'the bill'], 'extra' => ['together']],
                            'fr' => ['sentence' => 'Je paie l’addition', 'correct' => ['je paie', 'l’addition'], 'extra' => ['ensemble']],
                            'es' => ['sentence' => 'Pago la cuenta', 'correct' => ['pago', 'la cuenta'], 'extra' => ['juntos']],
                            'de' => ['sentence' => 'Ich zahle die Rechnung', 'correct' => ['ich zahle', 'die Rechnung'], 'extra' => ['zusammen']],
                            'ja' => ['sentence' => '私がお会計を払います', 'correct' => ['私が', 'お会計を', '払います'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '제가 계산서를 계산해요', 'correct' => ['제가', '계산서를', '계산해요'], 'extra' => ['함께']],
                            'tr' => ['sentence' => 'hesabı ben ödüyorum', 'correct' => ['hesabı', 'ben', 'ödüyorum'], 'extra' => ['birlikte', 'hesap']],
                            'ru' => ['sentence' => 'я плачу счёт', 'correct' => ['я', 'плачу', 'счёт'], 'extra' => ['вместе']],
                            'ar' => ['sentence' => 'أدفع الحساب', 'correct' => ['أدفع', 'الحساب'], 'extra' => ['معا']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çox sağ ol'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you very much', 'correct' => ['thank you', 'very much'], 'extra' => ['please']],
                            'fr' => ['sentence' => 'Merci beaucoup', 'correct' => ['merci', 'beaucoup'], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Muchas gracias', 'correct' => ['muchas', 'gracias'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Vielen Dank', 'correct' => ['vielen', 'Dank'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'どうもありがとう', 'correct' => ['どうも', 'ありがとう'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '정말 감사합니다', 'correct' => ['정말', '감사합니다'], 'extra' => ['부탁합니다']],
                            'tr' => ['sentence' => 'teşekkürler', 'correct' => ['teşekkürler'], 'extra' => ['birlikte', 'hesap']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['пожалуйста']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['من فضلك']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: A Mistake on the Bill', 4,
                pictures: [['az' => 'Hesab', 'img' => 'bill'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Səhv'], ['az' => 'Bu']],
                phrases: [
                    'a' => [
                        'words' => ['hesab', 'səhv'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The bill is wrong', 'correct' => ['the bill', 'is', 'wrong'], 'extra' => ['true']],
                            'fr' => ['sentence' => 'L’addition est fausse', 'correct' => ['l’addition', 'est', 'fausse'], 'extra' => ['vrai']],
                            'es' => ['sentence' => 'La cuenta es falsa', 'correct' => ['la cuenta', 'es', 'falsa'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Die Rechnung ist falsch', 'correct' => ['die Rechnung', 'ist', 'falsch'], 'extra' => ['richtig']],
                            'ja' => ['sentence' => 'お会計が間違いです', 'correct' => ['お会計が', '間違いです'], 'extra' => ['正しい']],
                            'ko' => ['sentence' => '계산서가 틀려요', 'correct' => ['계산서가', '틀려요'], 'extra' => ['맞는']],
                            'tr' => ['sentence' => 'hesap yanlış', 'correct' => ['hesap', 'yanlış'], 'extra' => ['doğru', 'menü']],
                            'ru' => ['sentence' => 'счёт неправильно', 'correct' => ['счёт', 'неправильно'], 'extra' => ['правильно']],
                            'ar' => ['sentence' => 'الحساب خطأ', 'correct' => ['الحساب', 'خطأ'], 'extra' => ['صحيح']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'deyil', 'düzgün'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is not true', 'correct' => ['this', 'is not', 'true'], 'extra' => ['wrong']],
                            'fr' => ['sentence' => 'Ceci n’est pas vrai', 'correct' => ['ceci', 'n’est pas', 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'Esto no es verdadero', 'correct' => ['esto', 'no es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Das ist nicht richtig', 'correct' => ['das', 'ist nicht', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'これは正しくありません', 'correct' => ['これは', '正しく', 'ありません'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '이것은 맞지 않아요', 'correct' => ['이것은', '맞지 않아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'bu doğru değil', 'correct' => ['bu', 'doğru', 'değil'], 'extra' => ['yanlış', 'hesap']],
                            'ru' => ['sentence' => 'это не правильно', 'correct' => ['это', 'не', 'правильно'], 'extra' => ['неправильно']],
                            'ar' => ['sentence' => 'هذا ليس صحيح', 'correct' => ['هذا', 'ليس', 'صحيح'], 'extra' => ['خطأ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bağışlayın', 'zəhmət olmasa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me please', 'correct' => ['excuse me', 'please'], 'extra' => ['thank you']],
                            'fr' => ['sentence' => "Excusez-moi s'il vous plaît", 'correct' => ['excusez-moi', "s'il vous plaît"], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Perdón por favor', 'correct' => ['perdón', 'por favor'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Entschuldigung bitte', 'correct' => ['Entschuldigung', 'bitte'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'すみませんお願いします', 'correct' => ['すみません', 'お願いします'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '실례합니다 부탁합니다', 'correct' => ['실례합니다', '부탁합니다'], 'extra' => ['고맙습니다']],
                            'tr' => ['sentence' => 'affedersiniz', 'correct' => ['affedersiniz'], 'extra' => ['yanlış', 'doğru']],
                            'ru' => ['sentence' => 'извините', 'correct' => ['извините'], 'extra' => ['спасибо']],
                            'ar' => ['sentence' => 'عفوا', 'correct' => ['عفوا'], 'extra' => ['شكرا']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Settling Up', 5,
                pictures: [['az' => 'Hesab', 'img' => 'bill'], ['az' => 'Kart', 'img' => 'card']],
                plain: [['az' => 'Ödəyirəm'], ['az' => 'İlə']],
                phrases: [
                    'a' => [
                        'words' => ['ödəyirəm', 'hesab', 'ilə', 'bir', 'kart'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am paying the bill with a card', 'correct' => ['I am paying', 'the bill', 'with', 'a', 'card'], 'extra' => ['cash']],
                            'fr' => ['sentence' => 'Je paie l’addition avec une carte', 'correct' => ['je paie', 'l’addition', 'avec', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Pago la cuenta con una tarjeta', 'correct' => ['pago', 'la cuenta', 'con', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Ich zahle die Rechnung mit einer Karte', 'correct' => ['ich zahle', 'die Rechnung', 'mit', 'einer', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードでお会計を払います', 'correct' => ['カードで', 'お会計を', '払います'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로 계산서를 계산해요', 'correct' => ['카드로', '계산서를', '계산해요'], 'extra' => ['현금']],
                            'tr' => ['sentence' => 'hesabı kart ile ödüyorum', 'correct' => ['hesabı', 'kart', 'ile', 'ödüyorum'], 'extra' => ['nakit', 'hesap']],
                            'ru' => ['sentence' => 'я плачу счёт с карта', 'correct' => ['я', 'плачу', 'счёт', 'с', 'карта'], 'extra' => ['наличные']],
                            'ar' => ['sentence' => 'أدفع الحساب مع بطاقة', 'correct' => ['أدفع', 'الحساب', 'مع', 'بطاقة'], 'extra' => ['كاش']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yoxdur', 'nağd'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no cash', 'correct' => ['there is no', 'cash'], 'extra' => ['card']],
                            'fr' => ['sentence' => 'Il n’y a pas d’espèces', 'correct' => ['il n’y a pas', 'd’espèces'], 'extra' => ['carte']],
                            'es' => ['sentence' => 'No hay efectivo', 'correct' => ['no hay', 'efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Es gibt kein Bargeld', 'correct' => ['es gibt kein', 'Bargeld'], 'extra' => ['Karte']],
                            'ja' => ['sentence' => '現金がありません', 'correct' => ['現金が', 'ありません'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '현금이 없어요', 'correct' => ['현금이', '없어요'], 'extra' => ['카드']],
                            'tr' => ['sentence' => 'nakit yok', 'correct' => ['nakit', 'yok'], 'extra' => ['kart', 'kart']],
                            'ru' => ['sentence' => 'нету наличные', 'correct' => ['нету', 'наличные'], 'extra' => ['карта']],
                            'ar' => ['sentence' => 'لا يوجد كاش', 'correct' => ['لا يوجد', 'كاش'], 'extra' => ['بطاقة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hesab', 'düzgün'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill is true', 'correct' => ['the bill', 'is', 'true'], 'extra' => ['wrong']],
                            'fr' => ['sentence' => 'L’addition est vraie', 'correct' => ['l’addition', 'est', 'vraie'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'La cuenta es verdadera', 'correct' => ['la cuenta', 'es', 'verdadera'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Die Rechnung ist richtig', 'correct' => ['die Rechnung', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => 'お会計は正しいです', 'correct' => ['お会計は', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '계산서는 맞아요', 'correct' => ['계산서는', '맞아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'hesap doğru', 'correct' => ['hesap', 'doğru'], 'extra' => ['nakit', 'kart']],
                            'ru' => ['sentence' => 'счёт правильно', 'correct' => ['счёт', 'правильно'], 'extra' => ['неправильно']],
                            'ar' => ['sentence' => 'الحساب صحيح', 'correct' => ['الحساب', 'صحيح'], 'extra' => ['خطأ']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
