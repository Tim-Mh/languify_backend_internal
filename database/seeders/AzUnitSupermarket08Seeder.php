<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitSupermarket08Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kassa' => 'checkout', 'Qəhvə' => 'coffee', 'Kart' => 'card', 'Çay' => 'tea',
        'Su' => 'water', 'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese',
    ];

    /**
     * Azerbaijani Supermarket Unit 8.
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
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: At the Checkout', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Checkout', 1,
                pictures: [['az' => 'Kassa', 'img' => 'checkout'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Harada'], ['az' => 'Burada']],
                phrases: [
                    'a' => [
                        'words' => ['harada', 'kassa'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the checkout', 'correct' => ['where', 'is', 'the checkout'], 'extra' => ['basket']],
                            'fr' => ['sentence' => 'Où est la caisse', 'correct' => ['où', 'est', 'la caisse'], 'extra' => ['panier']],
                            'es' => ['sentence' => 'Dónde está la caja', 'correct' => ['dónde', 'está', 'la caja'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Wo ist die Kasse', 'correct' => ['wo', 'ist', 'die Kasse'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => 'レジはどこですか', 'correct' => ['レジは', 'どこですか'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '계산대는 어디에 있어요', 'correct' => ['계산대는', '어디에', '있어요'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'kasa nerede', 'correct' => ['kasa', 'nerede'], 'extra' => ['poşet', 'sepet']],
                            'ru' => ['sentence' => 'где касса', 'correct' => ['где', 'касса'], 'extra' => ['корзина']],
                            'ar' => ['sentence' => 'أين صندوق الدفع', 'correct' => ['أين', 'صندوق الدفع'], 'extra' => ['سلة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['kassa', 'burada'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The checkout is here', 'correct' => ['the checkout', 'is', 'here'], 'extra' => ['there']],
                            'fr' => ['sentence' => 'La caisse est ici', 'correct' => ['la caisse', 'est', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'La caja está aquí', 'correct' => ['la caja', 'está', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Die Kasse ist hier', 'correct' => ['die Kasse', 'ist', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => 'レジはここにあります', 'correct' => ['レジは', 'ここに', 'あります'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '계산대는 여기에 있어요', 'correct' => ['계산대는', '여기에', '있어요'], 'extra' => ['거기에']],
                            'tr' => ['sentence' => 'kasa burada', 'correct' => ['kasa', 'burada'], 'extra' => ['poşet', 'sepet']],
                            'ru' => ['sentence' => 'касса здесь', 'correct' => ['касса', 'здесь'], 'extra' => ['там']],
                            'ar' => ['sentence' => 'صندوق الدفع هنا', 'correct' => ['صندوق الدفع', 'هنا'], 'extra' => ['هناك']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'torba', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A bag please', 'correct' => ['a', 'bag', 'please'], 'extra' => ['basket']],
                            'fr' => ['sentence' => 'Un sac s’il vous plaît', 'correct' => ['un', 'sac', 's’il vous plaît'], 'extra' => ['panier']],
                            'es' => ['sentence' => 'Una bolsa por favor', 'correct' => ['una', 'bolsa', 'por favor'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Eine Tüte bitte', 'correct' => ['eine', 'Tüte', 'bitte'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => '袋を一つお願いします', 'correct' => ['袋を', '一つ', 'お願いします'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '봉투 하나 부탁합니다', 'correct' => ['봉투', '하나', '부탁합니다'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'bir poşet lütfen', 'correct' => ['bir', 'poşet', 'lütfen'], 'extra' => ['kasa', 'kasa']],
                            'ru' => ['sentence' => 'пакет пожалуйста', 'correct' => ['пакет', 'пожалуйста'], 'extra' => ['корзина']],
                            'ar' => ['sentence' => 'كيس من فضلك', 'correct' => ['كيس', 'من فضلك'], 'extra' => ['سلة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Paying', 2,
                pictures: [['az' => 'Kart', 'img' => 'card'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Ödəyirəm'], ['az' => 'İlə']],
                phrases: [
                    'a' => [
                        'words' => ['ödəyirəm', 'ilə', 'bir', 'kart'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am paying with a card', 'correct' => ['I am paying', 'with', 'a', 'card'], 'extra' => ['cash']],
                            'fr' => ['sentence' => 'Je paie avec une carte', 'correct' => ['je paie', 'avec', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Pago con una tarjeta', 'correct' => ['pago', 'con', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Ich zahle mit einer Karte', 'correct' => ['ich zahle', 'mit', 'einer', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードで払います', 'correct' => ['カードで', '払います'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로 계산해요', 'correct' => ['카드로', '계산해요'], 'extra' => ['현금']],
                            'tr' => ['sentence' => 'kart ile ödüyorum', 'correct' => ['kart', 'ile', 'ödüyorum'], 'extra' => ['nakit', 'elma']],
                            'ru' => ['sentence' => 'я плачу с карта', 'correct' => ['я', 'плачу', 'с', 'карта'], 'extra' => ['наличные']],
                            'ar' => ['sentence' => 'أدفع مع بطاقة', 'correct' => ['أدفع', 'مع', 'بطاقة'], 'extra' => ['كاش']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ödəyirəm', 'ilə', 'nağd'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am paying with cash', 'correct' => ['I am paying', 'with', 'cash'], 'extra' => ['card']],
                            'fr' => ['sentence' => 'Je paie avec des espèces', 'correct' => ['je paie', 'avec', 'des espèces'], 'extra' => ['carte']],
                            'es' => ['sentence' => 'Pago con efectivo', 'correct' => ['pago', 'con', 'efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Ich zahle mit Bargeld', 'correct' => ['ich zahle', 'mit', 'Bargeld'], 'extra' => ['Karte']],
                            'ja' => ['sentence' => '現金で払います', 'correct' => ['現金で', '払います'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '현금으로 계산해요', 'correct' => ['현금으로', '계산해요'], 'extra' => ['카드']],
                            'tr' => ['sentence' => 'nakit ile ödüyorum', 'correct' => ['nakit', 'ile', 'ödüyorum'], 'extra' => ['kart', 'elma']],
                            'ru' => ['sentence' => 'я плачу с наличные', 'correct' => ['я', 'плачу', 'с', 'наличные'], 'extra' => ['карта']],
                            'ar' => ['sentence' => 'أدفع مع كاش', 'correct' => ['أدفع', 'مع', 'كاش'], 'extra' => ['بطاقة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['cəmi', 'iyirmi', 'manat'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The total is twenty lira', 'correct' => ['the total', 'is', 'twenty', 'lira'], 'extra' => ['price']],
                            'fr' => ['sentence' => 'Le total est vingt lires', 'correct' => ['le total', 'est', 'vingt', 'lires'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'El total es veinte liras', 'correct' => ['el total', 'es', 'veinte', 'liras'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Der Gesamt ist zwanzig Lira', 'correct' => ['der Gesamt', 'ist', 'zwanzig', 'Lira'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '合計は二十リラです', 'correct' => ['合計は', '二十', 'リラです'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '합계는 이십 리라예요', 'correct' => ['합계는', '이십', '리라예요'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'toplam yirmi lira', 'correct' => ['toplam', 'yirmi', 'lira'], 'extra' => ['kart', 'nakit']],
                            'ru' => ['sentence' => 'итого двадцать рубль', 'correct' => ['итого', 'двадцать', 'рубль'], 'extra' => ['цена']],
                            'ar' => ['sentence' => 'المجموع عشرون ريال', 'correct' => ['المجموع', 'عشرون', 'ريال'], 'extra' => ['سعر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: A Bag', 3,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'İstəyirəm'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['istəyirəm', 'bir', 'torba'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a bag', 'correct' => ['I would like', 'a', 'bag'], 'extra' => ['basket']],
                            'fr' => ['sentence' => 'Je voudrais un sac', 'correct' => ['je voudrais', 'un', 'sac'], 'extra' => ['panier']],
                            'es' => ['sentence' => 'Quisiera una bolsa', 'correct' => ['quisiera', 'una', 'bolsa'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Ich möchte eine Tüte', 'correct' => ['ich möchte', 'eine', 'Tüte'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => '袋をください', 'correct' => ['袋を', 'ください'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '봉투 주세요', 'correct' => ['봉투', '주세요'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'poşet istiyorum', 'correct' => ['poşet', 'istiyorum'], 'extra' => ['sepet', 'sepet']],
                            'ru' => ['sentence' => 'я хочу пакет', 'correct' => ['я', 'хочу', 'пакет'], 'extra' => ['корзина']],
                            'ar' => ['sentence' => 'أريد كيس', 'correct' => ['أريد', 'كيس'], 'extra' => ['سلة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yoxdur', 'torba'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no bag', 'correct' => ['there is no', 'bag'], 'extra' => ['basket']],
                            'fr' => ['sentence' => 'Il n’y a pas de sac', 'correct' => ['il n’y a pas', 'de sac'], 'extra' => ['panier']],
                            'es' => ['sentence' => 'No hay bolsa', 'correct' => ['no hay', 'bolsa'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Es gibt keine Tüte', 'correct' => ['es gibt keine', 'Tüte'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => '袋がありません', 'correct' => ['袋が', 'ありません'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '봉투가 없어요', 'correct' => ['봉투가', '없어요'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'poşet yok', 'correct' => ['poşet', 'yok'], 'extra' => ['sepet', 'sepet']],
                            'ru' => ['sentence' => 'нету пакет', 'correct' => ['нету', 'пакет'], 'extra' => ['корзина']],
                            'ar' => ['sentence' => 'لا يوجد كيس', 'correct' => ['لا يوجد', 'كيس'], 'extra' => ['سلة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['neçə', 'manat', 'torba'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the bag', 'correct' => ['how many', 'lira', 'is', 'the bag'], 'extra' => ['basket']],
                            'fr' => ['sentence' => 'Combien de lires est le sac', 'correct' => ['combien de', 'lires', 'est', 'le sac'], 'extra' => ['panier']],
                            'es' => ['sentence' => 'Cuántas liras es la bolsa', 'correct' => ['cuántas', 'liras', 'es', 'la bolsa'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Wie viele Lira ist die Tüte', 'correct' => ['wie viele', 'Lira', 'ist', 'die Tüte'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => '袋は何リラですか', 'correct' => ['袋は', '何', 'リラですか'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '봉투는 몇 리라예요', 'correct' => ['봉투는', '몇', '리라예요'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'poşet kaç lira', 'correct' => ['poşet', 'kaç', 'lira'], 'extra' => ['sepet', 'sepet']],
                            'ru' => ['sentence' => 'сколько рубль пакет', 'correct' => ['сколько', 'рубль', 'пакет'], 'extra' => ['корзина']],
                            'ar' => ['sentence' => 'كم ريال كيس', 'correct' => ['كم', 'ريال', 'كيس'], 'extra' => ['سلة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: The Receipt', 4,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Cəmi'], ['az' => 'Düzgün']],
                phrases: [
                    'a' => [
                        'words' => ['cəmi', 'düzgün'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The total is true', 'correct' => ['the total', 'is', 'true'], 'extra' => ['wrong']],
                            'fr' => ['sentence' => 'Le total est vrai', 'correct' => ['le total', 'est', 'vrai'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'El total es verdadero', 'correct' => ['el total', 'es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Der Gesamt ist richtig', 'correct' => ['der Gesamt', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => '合計は正しいです', 'correct' => ['合計は', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '합계는 맞아요', 'correct' => ['합계는', '맞아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'toplam doğru', 'correct' => ['toplam', 'doğru'], 'extra' => ['kasa', 'kasa']],
                            'ru' => ['sentence' => 'итого правильно', 'correct' => ['итого', 'правильно'], 'extra' => ['неправильно']],
                            'ar' => ['sentence' => 'المجموع صحيح', 'correct' => ['المجموع', 'صحيح'], 'extra' => ['خطأ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'səhv'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is wrong', 'correct' => ['this', 'is', 'wrong'], 'extra' => ['true']],
                            'fr' => ['sentence' => 'Ceci est faux', 'correct' => ['ceci', 'est', 'faux'], 'extra' => ['vrai']],
                            'es' => ['sentence' => 'Esto es falso', 'correct' => ['esto', 'es', 'falso'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Das ist falsch', 'correct' => ['das', 'ist', 'falsch'], 'extra' => ['richtig']],
                            'ja' => ['sentence' => 'これは間違いです', 'correct' => ['これは', '間違いです'], 'extra' => ['正しい']],
                            'ko' => ['sentence' => '이것은 틀려요', 'correct' => ['이것은', '틀려요'], 'extra' => ['맞는']],
                            'tr' => ['sentence' => 'bu yanlış', 'correct' => ['bu', 'yanlış'], 'extra' => ['toplam', 'kasa']],
                            'ru' => ['sentence' => 'это неправильно', 'correct' => ['это', 'неправильно'], 'extra' => ['правильно']],
                            'ar' => ['sentence' => 'هذا خطأ', 'correct' => ['هذا', 'خطأ'], 'extra' => ['صحيح']],
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
                            'tr' => ['sentence' => 'teşekkürler', 'correct' => ['teşekkürler'], 'extra' => ['toplam', 'kasa']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['пожалуйста']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['من فضلك']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Leaving the Shop', 5,
                pictures: [['az' => 'Kart', 'img' => 'card'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Neçə'], ['az' => 'Manat']],
                phrases: [
                    'a' => [
                        'words' => ['neçə', 'manat', 'cəmi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the total', 'correct' => ['how many', 'lira', 'is', 'the total'], 'extra' => ['bag']],
                            'fr' => ['sentence' => 'Combien de lires est le total', 'correct' => ['combien de', 'lires', 'est', 'le total'], 'extra' => ['sac']],
                            'es' => ['sentence' => 'Cuántas liras es el total', 'correct' => ['cuántas', 'liras', 'es', 'el total'], 'extra' => ['bolsa']],
                            'de' => ['sentence' => 'Wie viele Lira ist der Gesamt', 'correct' => ['wie viele', 'Lira', 'ist', 'der Gesamt'], 'extra' => ['Tüte']],
                            'ja' => ['sentence' => '合計は何リラですか', 'correct' => ['合計は', '何', 'リラですか'], 'extra' => ['袋']],
                            'ko' => ['sentence' => '합계는 몇 리라예요', 'correct' => ['합계는', '몇', '리라예요'], 'extra' => ['봉투']],
                            'tr' => ['sentence' => 'toplam kaç lira', 'correct' => ['toplam', 'kaç', 'lira'], 'extra' => ['poşet', 'kasa']],
                            'ru' => ['sentence' => 'сколько рубль итого', 'correct' => ['сколько', 'рубль', 'итого'], 'extra' => ['пакет']],
                            'ar' => ['sentence' => 'كم ريال المجموع', 'correct' => ['كم', 'ريال', 'المجموع'], 'extra' => ['كيس']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ilə', 'bir', 'kart', 'zəhmət olmasa'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'With a card please', 'correct' => ['with', 'a', 'card', 'please'], 'extra' => ['cash']],
                            'fr' => ['sentence' => 'Avec une carte s’il vous plaît', 'correct' => ['avec', 'une', 'carte', 's’il vous plaît'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Con una tarjeta por favor', 'correct' => ['con', 'una', 'tarjeta', 'por favor'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Mit einer Karte bitte', 'correct' => ['mit', 'einer', 'Karte', 'bitte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードでお願いします', 'correct' => ['カードで', 'お願いします'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로 부탁합니다', 'correct' => ['카드로', '부탁합니다'], 'extra' => ['현금']],
                            'tr' => ['sentence' => 'kart ile lütfen', 'correct' => ['kart', 'ile', 'lütfen'], 'extra' => ['poşet', 'toplam']],
                            'ru' => ['sentence' => 'с карта пожалуйста', 'correct' => ['с', 'карта', 'пожалуйста'], 'extra' => ['наличные']],
                            'ar' => ['sentence' => 'مع بطاقة من فضلك', 'correct' => ['مع', 'بطاقة', 'من فضلك'], 'extra' => ['كاش']],
                        ],
                    ],
                    'c' => [
                        'words' => ['təşəkkür', 'və', 'sağ ol'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you and goodbye', 'correct' => ['thank you', 'and', 'goodbye'], 'extra' => ['hello']],
                            'fr' => ['sentence' => 'Merci et au revoir', 'correct' => ['merci', 'et', 'au revoir'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Gracias y adiós', 'correct' => ['gracias', 'y', 'adiós'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Danke und auf Wiedersehen', 'correct' => ['danke', 'und', 'auf Wiedersehen'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'ありがとうさようなら', 'correct' => ['ありがとう', 'さようなら'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '고맙습니다 안녕히 계세요', 'correct' => ['고맙습니다', '안녕히 계세요'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'teşekkürler ve hoşça kal', 'correct' => ['teşekkürler', 've', 'hoşça kal'], 'extra' => ['poşet', 'toplam']],
                            'ru' => ['sentence' => 'спасибо и до свидания', 'correct' => ['спасибо', 'и', 'до свидания'], 'extra' => ['привет']],
                            'ar' => ['sentence' => 'شكرا و مع السلامة', 'correct' => ['شكرا', 'و', 'مع السلامة'], 'extra' => ['مرحبا']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
