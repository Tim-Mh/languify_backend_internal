<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket08Seeder extends Seeder
{
    private const PICTURES = [
        'Caisse' => 'checkout', 'Argent' => 'money', 'Chariot' => 'cart', 'Panier' => 'basket',
        'Liste' => 'list', 'Boîte' => 'box', 'Pain' => 'bread', 'Œufs' => 'egg',
    ];

    /**
     * French Chapter 4, Unit 8 — the checkout.
     *
     * This is the counterpart to Chapter 3's "paying the bill" unit, and it
     * reuses that language on purpose: a learner who can settle a restaurant
     * bill should discover they can already mostly handle a till, with only
     * the queue and the cashier as new words.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: At the Checkout', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Cashier', 1,
                pictures: [['fr' => 'Caisse', 'img' => 'checkout'], ['fr' => 'Argent', 'img' => 'money']],
                plain: [['fr' => 'Caissier'], ['fr' => 'File']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'caissier', 'est', 'à', 'la', 'caisse'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The cashier is at the checkout', 'correct' => ['the', 'cashier', 'is', 'at', 'the', 'checkout'], 'extra' => ['queue']],
                            'az' => ['sentence' => 'kassir yanında kassa', 'correct' => ['kassir', 'yanında', 'kassa'], 'extra' => ['növbə']],
                            'ar' => ['sentence' => 'أمين الصندوق على صندوق الدفع', 'correct' => ['أمين الصندوق', 'على', 'صندوق الدفع'], 'extra' => ['طابور']],
                            'ru' => ['sentence' => 'кассир на касса', 'correct' => ['кассир', 'на', 'касса'], 'extra' => ['очередь']],
                            'es' => ['sentence' => 'El cajero está en la caja', 'correct' => ['el', 'cajero', 'está', 'a', 'la', 'caja'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer ist an der Kasse', 'correct' => ['der', 'Kassierer', 'ist', 'zu', 'der', 'Kasse'], 'extra' => ['Schlange']],
                            'ja' => ['sentence' => 'レジ係はレジにいます', 'correct' => ['レジ係', 'は', 'レジ', 'に', 'います'], 'extra' => ['列']],
                            'ko' => ['sentence' => '계산원은 계산대에 있습니다', 'correct' => ['계산원은', '계산대에', '있습니다'], 'extra' => ['줄']],
                            'tr' => ['sentence' => 'kasiyer kasada', 'correct' => ['kasiyer', 'kasada'], 'extra' => ['sıra']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'file', 'est', 'longue'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The queue is long', 'correct' => ['the', 'queue', 'is', 'long'], 'extra' => ['cashier', 'money']],
                            'az' => ['sentence' => 'növbə uzun', 'correct' => ['növbə', 'uzun'], 'extra' => ['kassir', 'pul']],
                            'ar' => ['sentence' => 'طابور طويل', 'correct' => ['طابور', 'طويل'], 'extra' => ['أمين الصندوق', 'نقود']],
                            'ru' => ['sentence' => 'очередь длинный', 'correct' => ['очередь', 'длинный'], 'extra' => ['кассир', 'деньги']],
                            'es' => ['sentence' => 'La cola es larga', 'correct' => ['la', 'cola', 'es', 'larga'], 'extra' => ['cajero', 'dinero']],
                            'de' => ['sentence' => 'Die Schlange ist lang', 'correct' => ['die', 'Schlange', 'ist', 'lang'], 'extra' => ['Kassierer', 'Geld']],
                            'ja' => ['sentence' => '列は長いです', 'correct' => ['列', 'は', '長い', 'です'], 'extra' => ['レジ係']],
                            'ko' => ['sentence' => '줄이 깁니다', 'correct' => ['줄이', '깁니다'], 'extra' => ['계산원']],
                            'tr' => ['sentence' => 'sıra uzun', 'correct' => ['sıra', 'uzun'], 'extra' => ['kasiyer', 'para']],
                        ],
                    ],
                    'c' => [
                        'words' => ['donner', 'mon', 'argent', 'au', 'caissier'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To give my money to the cashier', 'correct' => ['to give', 'my', 'money', 'to the', 'cashier'], 'extra' => ['queue']],
                            'az' => ['sentence' => 'vermək mənim pul kassir', 'correct' => ['vermək', 'mənim', 'pul', 'kassir'], 'extra' => ['növbə']],
                            'ar' => ['sentence' => 'الإعطاء نقود إلى أمين الصندوق', 'correct' => ['الإعطاء', 'نقود', 'إلى', 'أمين الصندوق'], 'extra' => ['طابور']],
                            'ru' => ['sentence' => 'дать мой деньги в кассир', 'correct' => ['дать', 'мой', 'деньги', 'в', 'кассир'], 'extra' => ['очередь']],
                            'es' => ['sentence' => 'Dar mi dinero al cajero', 'correct' => ['dar', 'mi', 'dinero', 'al', 'cajero'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Mein Geld dem Kassierer geben', 'correct' => ['geben', 'mein', 'Geld', 'zum', 'Kassierer'], 'extra' => ['Schlange']],
                            'ja' => ['sentence' => 'レジ係にお金を渡す', 'correct' => ['レジ係', 'に', 'お金', 'を', '渡す'], 'extra' => ['列']],
                            'ko' => ['sentence' => '계산원에게 제 돈을 주다', 'correct' => ['계산원에게', '제', '돈을', '주다'], 'extra' => ['줄']],
                            'tr' => ['sentence' => 'paramı kasiyere vermek', 'correct' => ['paramı', 'kasiyere', 'vermek'], 'extra' => ['sıra']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Waiting in Line', 2,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Caisse', 'img' => 'checkout']],
                plain: [['fr' => 'Attendre'], ['fr' => 'Devant']],
                phrases: [
                    'a' => [
                        'words' => ['attendre', 'à', 'la', 'caisse'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To wait at the checkout', 'correct' => ['to wait', 'at', 'the', 'checkout'], 'extra' => ['in front', 'trolley']],
                            'az' => ['sentence' => 'gözləmək yanında kassa', 'correct' => ['gözləmək', 'yanında', 'kassa'], 'extra' => ['qarşıda', 'araba']],
                            'ar' => ['sentence' => 'الانتظار على صندوق الدفع', 'correct' => ['الانتظار', 'على', 'صندوق الدفع'], 'extra' => ['أمام', 'عربة']],
                            'ru' => ['sentence' => 'ждать на касса', 'correct' => ['ждать', 'на', 'касса'], 'extra' => ['впереди', 'тележка']],
                            'es' => ['sentence' => 'Esperar en la caja', 'correct' => ['esperar', 'a', 'la', 'caja'], 'extra' => ['delante', 'carrito']],
                            'de' => ['sentence' => 'An der Kasse warten', 'correct' => ['warten', 'zu', 'der', 'Kasse'], 'extra' => ['vor', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'レジで待つ', 'correct' => ['レジ', 'で', '待つ'], 'extra' => ['の前に']],
                            'ko' => ['sentence' => '계산대에서 기다리다', 'correct' => ['계산대에서', '기다리다'], 'extra' => ['앞에']],
                            'tr' => ['sentence' => 'kasada beklemek', 'correct' => ['kasada', 'beklemek'], 'extra' => ['önde', 'araba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'chariot', 'est', 'devant'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The trolley is in front', 'correct' => ['the', 'trolley', 'is', 'in front'], 'extra' => ['to wait', 'checkout']],
                            'az' => ['sentence' => 'araba qarşıda', 'correct' => ['araba', 'qarşıda'], 'extra' => ['gözləmək', 'kassa']],
                            'ar' => ['sentence' => 'عربة أمام', 'correct' => ['عربة', 'أمام'], 'extra' => ['الانتظار', 'صندوق الدفع']],
                            'ru' => ['sentence' => 'тележка впереди', 'correct' => ['тележка', 'впереди'], 'extra' => ['ждать', 'касса']],
                            'es' => ['sentence' => 'El carrito está delante', 'correct' => ['el', 'carrito', 'está', 'delante'], 'extra' => ['esperar', 'caja']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist vorne', 'correct' => ['der', 'Einkaufswagen', 'ist', 'vor'], 'extra' => ['warten', 'Kasse']],
                            'ja' => ['sentence' => 'カートは前にあります', 'correct' => ['カート', 'は', '前に', 'あります'], 'extra' => ['待つ']],
                            'ko' => ['sentence' => '카트는 앞에 있습니다', 'correct' => ['카트는', '앞에', '있습니다'], 'extra' => ['기다리다']],
                            'tr' => ['sentence' => 'araba önde', 'correct' => ['araba', 'önde'], 'extra' => ['beklemek', 'kasa']],
                        ],
                    ],
                    'c' => [
                        'words' => ['attendre', 'devant', 'la', 'caisse'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To wait in front of the checkout', 'correct' => ['to wait', 'in front', 'the', 'checkout'], 'extra' => ['trolley']],
                            'az' => ['sentence' => 'gözləmək qarşıda kassa', 'correct' => ['gözləmək', 'qarşıda', 'kassa'], 'extra' => ['araba']],
                            'ar' => ['sentence' => 'الانتظار أمام صندوق الدفع', 'correct' => ['الانتظار', 'أمام', 'صندوق الدفع'], 'extra' => ['عربة']],
                            'ru' => ['sentence' => 'ждать впереди касса', 'correct' => ['ждать', 'впереди', 'касса'], 'extra' => ['тележка']],
                            'es' => ['sentence' => 'Esperar delante de la caja', 'correct' => ['esperar', 'delante', 'la', 'caja'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Vor der Kasse warten', 'correct' => ['vor', 'der', 'Kasse', 'warten'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => 'レジの前で待つ', 'correct' => ['レジ', 'の', '前', 'で', '待つ'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '계산대 앞에서 기다리다', 'correct' => ['계산대', '앞에서', '기다리다'], 'extra' => ['카트']],
                            'tr' => ['sentence' => 'kasanın önünde beklemek', 'correct' => ['kasanın', 'önünde', 'beklemek'], 'extra' => ['araba']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Cash or Card', 3,
                pictures: [['fr' => 'Argent', 'img' => 'money'], ['fr' => 'Panier', 'img' => 'basket']],
                plain: [['fr' => 'En espèces'], ['fr' => 'Carte bancaire']],
                phrases: [
                    'a' => [
                        'words' => ['je paie', 'en espèces', 'avec', 'mon', 'argent'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I pay in cash with my money', 'correct' => ['I pay', 'in cash', 'with', 'my', 'money'], 'extra' => ['bank card']],
                            'az' => ['sentence' => 'ödəyirəm içində nağd ilə mənim pul', 'correct' => ['ödəyirəm', 'içində', 'nağd', 'ilə', 'mənim', 'pul'], 'extra' => ['bank kartı']],
                            'ar' => ['sentence' => 'أدفع في كاش مع نقود', 'correct' => ['أدفع', 'في', 'كاش', 'مع', 'نقود'], 'extra' => ['بطاقة بنكية']],
                            'ru' => ['sentence' => 'я плачу в наличные с мой деньги', 'correct' => ['я плачу', 'в', 'наличные', 'с', 'мой', 'деньги'], 'extra' => ['банковская карта']],
                            'es' => ['sentence' => 'Pago en efectivo con mi dinero', 'correct' => ['pago', 'en efectivo', 'con', 'mi', 'dinero'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Ich bezahle in bar mit meinem Geld', 'correct' => ['ich bezahle', 'in bar', 'mit', 'meinem', 'Geld'], 'extra' => ['Bankkarte']],
                            'ja' => ['sentence' => '私のお金で現金で払います', 'correct' => ['私の', 'お金', 'で', '現金で', '払います'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '제 돈으로 현금으로 냅니다', 'correct' => ['제', '돈으로', '현금으로', '냅니다'], 'extra' => ['카드']],
                            'tr' => ['sentence' => 'paramla nakit ödüyorum', 'correct' => ['paramla', 'nakit', 'ödüyorum'], 'extra' => ['banka kartı']],
                        ],
                    ],
                    'b' => [
                        'words' => ['payer', 'avec', 'la', 'carte bancaire'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To pay with the bank card', 'correct' => ['to pay', 'with', 'the', 'bank card'], 'extra' => ['in cash', 'basket']],
                            'az' => ['sentence' => 'ödəmək ilə bank kartı', 'correct' => ['ödəmək', 'ilə', 'bank kartı'], 'extra' => ['içində', 'nağd', 'səbət']],
                            'ar' => ['sentence' => 'الدفع مع بطاقة بنكية', 'correct' => ['الدفع', 'مع', 'بطاقة بنكية'], 'extra' => ['في', 'كاش', 'سلة']],
                            'ru' => ['sentence' => 'платить с банковская карта', 'correct' => ['платить', 'с', 'банковская карта'], 'extra' => ['в', 'наличные', 'корзина']],
                            'es' => ['sentence' => 'Pagar con la tarjeta', 'correct' => ['pagar', 'con', 'la', 'tarjeta'], 'extra' => ['en efectivo', 'cesta']],
                            'de' => ['sentence' => 'Mit der Bankkarte bezahlen', 'correct' => ['mit', 'der', 'Bankkarte', 'bezahlen'], 'extra' => ['in bar', 'Korb']],
                            'ja' => ['sentence' => 'カードで払う', 'correct' => ['カード', 'で', '払う'], 'extra' => ['現金で']],
                            'ko' => ['sentence' => '카드로 지불하다', 'correct' => ['카드로', '지불하다'], 'extra' => ['현금으로']],
                            'tr' => ['sentence' => 'banka kartıyla ödemek', 'correct' => ['banka', 'kartıyla', 'ödemek'], 'extra' => ['nakit', 'sepet']],
                        ],
                    ],
                    'c' => [
                        'words' => ['payer', 'le', 'panier', 'en espèces'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To pay for the basket in cash', 'correct' => ['to pay', 'the', 'basket', 'in cash'], 'extra' => ['menu card']],
                            'az' => ['sentence' => 'ödəmək səbət içində nağd', 'correct' => ['ödəmək', 'səbət', 'içində', 'nağd'], 'extra' => ['menyu', 'kart']],
                            'ar' => ['sentence' => 'الدفع سلة في كاش', 'correct' => ['الدفع', 'سلة', 'في', 'كاش'], 'extra' => ['قائمة الطعام', 'بطاقة']],
                            'ru' => ['sentence' => 'платить корзина в наличные', 'correct' => ['платить', 'корзина', 'в', 'наличные'], 'extra' => ['меню', 'карта']],
                            'es' => ['sentence' => 'Pagar la cesta en efectivo', 'correct' => ['pagar', 'la', 'cesta', 'en efectivo'], 'extra' => ['carta']],
                            'de' => ['sentence' => 'Den Korb in bar bezahlen', 'correct' => ['den', 'Korb', 'in bar', 'bezahlen'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'かごを現金で払う', 'correct' => ['かご', 'を', '現金で', '払う'], 'extra' => ['メニュー表']],
                            'ko' => ['sentence' => '바구니를 현금으로 지불하다', 'correct' => ['바구니를', '현금으로', '지불하다'], 'extra' => ['메뉴판']],
                            'tr' => ['sentence' => 'sepeti nakit ödemek', 'correct' => ['sepeti', 'nakit', 'ödemek'], 'extra' => ['menü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: The Receipt', 4,
                pictures: [['fr' => 'Liste', 'img' => 'list'], ['fr' => 'Boîte', 'img' => 'box']],
                plain: [['fr' => 'Reçu'], ['fr' => 'Monnaie']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'reçu', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The receipt, please', 'correct' => ['the', 'receipt', 'please'], 'extra' => ['change', 'list']],
                            'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => ['qalıq', 'siyahı']],
                            'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => ['الباقي', 'قائمة']],
                            'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => ['сдача', 'список']],
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['cambio', 'lista']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Wechselgeld', 'Liste']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '영수증 부탁합니다', 'correct' => ['영수증', '부탁합니다'], 'extra' => ['거스름돈']],
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => ['para üstü', 'liste']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'monnaie', 'et', 'le', 'reçu'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The change and the receipt', 'correct' => ['the', 'change', 'and', 'the', 'receipt'], 'extra' => ['list', 'box']],
                            'az' => ['sentence' => 'qalıq və qəbz', 'correct' => ['qalıq', 'və', 'qəbz'], 'extra' => ['siyahı', 'qutu']],
                            'ar' => ['sentence' => 'الباقي و إيصال', 'correct' => ['الباقي', 'و', 'إيصال'], 'extra' => ['قائمة', 'علبة']],
                            'ru' => ['sentence' => 'сдача и чек', 'correct' => ['сдача', 'и', 'чек'], 'extra' => ['список', 'коробка']],
                            'es' => ['sentence' => 'El cambio y el recibo', 'correct' => ['el', 'cambio', 'y', 'el', 'recibo'], 'extra' => ['lista', 'caja']],
                            'de' => ['sentence' => 'Das Wechselgeld und die Quittung', 'correct' => ['das', 'Wechselgeld', 'und', 'die', 'Quittung'], 'extra' => ['Liste', 'Schachtel']],
                            'ja' => ['sentence' => 'おつりとレシート', 'correct' => ['おつり', 'と', 'レシート'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '거스름돈과 영수증', 'correct' => ['거스름돈과', '영수증'], 'extra' => ['목록']],
                            'tr' => ['sentence' => 'para üstü ve fiş', 'correct' => ['para', 'üstü', 've', 'fiş'], 'extra' => ['liste', 'kutu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'liste', 'dans', 'la', 'boîte'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The list in the box', 'correct' => ['the', 'list', 'in', 'the', 'box'], 'extra' => ['change', 'receipt']],
                            'az' => ['sentence' => 'siyahı içində qutu', 'correct' => ['siyahı', 'içində', 'qutu'], 'extra' => ['qalıq', 'qəbz']],
                            'ar' => ['sentence' => 'قائمة في علبة', 'correct' => ['قائمة', 'في', 'علبة'], 'extra' => ['الباقي', 'إيصال']],
                            'ru' => ['sentence' => 'список в коробка', 'correct' => ['список', 'в', 'коробка'], 'extra' => ['сдача', 'чек']],
                            'es' => ['sentence' => 'La lista en la caja', 'correct' => ['la', 'lista', 'en', 'la', 'caja'], 'extra' => ['cambio', 'recibo']],
                            'de' => ['sentence' => 'Die Liste in der Schachtel', 'correct' => ['die', 'Liste', 'in', 'der', 'Schachtel'], 'extra' => ['Wechselgeld', 'Quittung']],
                            'ja' => ['sentence' => '箱の中のリスト', 'correct' => ['箱', 'の', '中', 'の', 'リスト'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '상자 안의 목록', 'correct' => ['상자', '안의', '목록'], 'extra' => ['거스름돈']],
                            'tr' => ['sentence' => 'kutudaki liste', 'correct' => ['kutudaki', 'liste'], 'extra' => ['para üstü', 'fiş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Bagging It Up', 5,
                pictures: [['fr' => 'Pain', 'img' => 'bread'], ['fr' => 'Œufs', 'img' => 'egg']],
                plain: [['fr' => 'Sac'], ['fr' => 'Mettre']],
                phrases: [
                    'a' => [
                        'words' => ['mettre', 'le', 'pain', 'dans', 'le', 'sac'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To put the bread in the bag', 'correct' => ['to put', 'the', 'bread', 'in', 'the', 'bag'], 'extra' => ['eggs']],
                            'az' => ['sentence' => 'qoymaq çörək içində torba', 'correct' => ['qoymaq', 'çörək', 'içində', 'torba'], 'extra' => ['yumurtalar']],
                            'ar' => ['sentence' => 'وضع خبز في كيس', 'correct' => ['وضع', 'خبز', 'في', 'كيس'], 'extra' => ['بيض']],
                            'ru' => ['sentence' => 'положить хлеб в пакет', 'correct' => ['положить', 'хлеб', 'в', 'пакет'], 'extra' => ['яйца']],
                            'es' => ['sentence' => 'Poner el pan en la bolsa', 'correct' => ['poner', 'el', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Das Brot in die Tüte legen', 'correct' => ['das', 'Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '빵을 봉투에 넣다', 'correct' => ['빵을', '봉투에', '넣다'], 'extra' => ['계란']],
                            'tr' => ['sentence' => 'ekmeği poşete koymak', 'correct' => ['ekmeği', 'poşete', 'koymak'], 'extra' => ['yumurta']],
                        ],
                    ],
                    'b' => [
                        'words' => ['des', 'œufs', 'dans', 'un', 'sac'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Some eggs in a bag', 'correct' => ['some', 'eggs', 'in', 'a', 'bag'], 'extra' => ['to put', 'bread']],
                            'az' => ['sentence' => 'bir az yumurtalar içində bir torba', 'correct' => ['bir az', 'yumurtalar', 'içində', 'bir', 'torba'], 'extra' => ['qoymaq', 'çörək']],
                            'ar' => ['sentence' => 'بعض بيض في كيس', 'correct' => ['بعض', 'بيض', 'في', 'كيس'], 'extra' => ['وضع', 'خبز']],
                            'ru' => ['sentence' => 'немного яйца в пакет', 'correct' => ['немного', 'яйца', 'в', 'пакет'], 'extra' => ['положить', 'хлеб']],
                            'es' => ['sentence' => 'Unos huevos en una bolsa', 'correct' => ['unos', 'huevos', 'en', 'una', 'bolsa'], 'extra' => ['poner', 'pan']],
                            'de' => ['sentence' => 'Eier in einer Tüte', 'correct' => ['einige', 'Eier', 'in', 'einer', 'Tüte'], 'extra' => ['legen', 'Brot']],
                            'ja' => ['sentence' => '袋の中の卵', 'correct' => ['袋', 'の', '中', 'の', '卵'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '봉투 안의 계란', 'correct' => ['봉투', '안의', '계란'], 'extra' => ['넣다']],
                            'tr' => ['sentence' => 'poşette biraz yumurta', 'correct' => ['poşette', 'biraz', 'yumurta'], 'extra' => ['koymak', 'ekmek']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mettre', 'des', 'œufs', 'et', 'du', 'pain'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To put some eggs and some bread', 'correct' => ['to put', 'some', 'eggs', 'and', 'some', 'bread'], 'extra' => ['bag']],
                            'az' => ['sentence' => 'qoymaq bir az yumurtalar və bir az çörək', 'correct' => ['qoymaq', 'bir az', 'yumurtalar', 'və', 'bir az', 'çörək'], 'extra' => ['torba']],
                            'ar' => ['sentence' => 'وضع بعض بيض و بعض خبز', 'correct' => ['وضع', 'بعض', 'بيض', 'و', 'بعض', 'خبز'], 'extra' => ['كيس']],
                            'ru' => ['sentence' => 'положить немного яйца и немного хлеб', 'correct' => ['положить', 'немного', 'яйца', 'и', 'немного', 'хлеб'], 'extra' => ['пакет']],
                            'es' => ['sentence' => 'Poner huevos y pan', 'correct' => ['poner', 'unos', 'huevos', 'y', 'algo de', 'pan'], 'extra' => ['bolsa']],
                            'de' => ['sentence' => 'Eier und Brot legen', 'correct' => ['legen', 'einige', 'Eier', 'und', 'etwas', 'Brot'], 'extra' => ['Tüte']],
                            'ja' => ['sentence' => '卵とパンを入れる', 'correct' => ['卵', 'と', 'パン', 'を', '入れる'], 'extra' => ['袋']],
                            'ko' => ['sentence' => '계란과 빵을 넣다', 'correct' => ['계란과', '빵을', '넣다'], 'extra' => ['봉투']],
                            'tr' => ['sentence' => 'biraz yumurta ve biraz ekmek koymak', 'correct' => ['biraz', 'yumurta', 've', 'biraz', 'ekmek', 'koymak'], 'extra' => ['poşet']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
