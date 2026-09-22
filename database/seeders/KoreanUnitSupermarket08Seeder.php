<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket08Seeder extends Seeder
{
    private const PICTURES = ['계산대' => 'checkout', '돈' => 'money', '카트' => 'cart', '바구니' => 'basket', '목록' => 'list', '상자' => 'box', '빵' => 'bread', '계란' => 'egg'];

    /**
     * Korean Supermarket, Unit 8, the Korean twin of the English "At the Checkout" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, '유닛 8: 계산대에서', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 계산대 · 돈', 1,
                pictures: [['ko' => '계산대', 'img' => 'checkout'], ['ko' => '돈', 'img' => 'money']],
                plain: [['ko' => '계산원'], ['ko' => '줄']],
                phrases: [
                    'a' => [
                        'words' => ['계산원은', '계산대에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the cashier is at the checkout', 'correct' => ['the', 'cashier', 'is', 'at', 'the', 'checkout'], 'extra' => ['queue']],
                            'az' => ['sentence' => 'kassir yanında kassa', 'correct' => ['kassir', 'yanında', 'kassa'], 'extra' => ['növbə']],
                            'ar' => ['sentence' => 'أمين الصندوق على صندوق الدفع', 'correct' => ['أمين الصندوق', 'على', 'صندوق الدفع'], 'extra' => ['طابور']],
                            'ru' => ['sentence' => 'кассир на касса', 'correct' => ['кассир', 'на', 'касса'], 'extra' => ['очередь']],
                            'es' => ['sentence' => 'El cajero está en la caja', 'correct' => ['el', 'cajero', 'está', 'en', 'la', 'caja'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer ist an der Kasse', 'correct' => ['der', 'Kassierer', 'ist', 'an', 'der', 'Kasse'], 'extra' => ['Schlange']],
                            'fr' => ['sentence' => 'Le caissier est à la caisse', 'correct' => ['le', 'caissier', 'est', 'à', 'la', 'caisse'], 'extra' => ['file']],
                            'ja' => ['sentence' => 'レジ係はレジにいます', 'correct' => ['レジ係', 'は', 'レジ', 'に', 'います'], 'extra' => ['列']],
                            'tr' => ['sentence' => 'kasiyer kasada', 'correct' => ['kasiyer', 'kasada'], 'extra' => ['sıra']],
                        ],
                    ],
                    'b' => [
                        'words' => ['줄은', '여기', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the queue is here', 'correct' => ['the', 'queue', 'is', 'here'], 'extra' => ['cashier']],
                            'az' => ['sentence' => 'növbə burada', 'correct' => ['növbə', 'burada'], 'extra' => ['kassir']],
                            'ar' => ['sentence' => 'طابور هنا', 'correct' => ['طابور', 'هنا'], 'extra' => ['أمين الصندوق']],
                            'ru' => ['sentence' => 'очередь здесь', 'correct' => ['очередь', 'здесь'], 'extra' => ['кассир']],
                            'es' => ['sentence' => 'La cola está aquí', 'correct' => ['la', 'cola', 'está', 'aquí'], 'extra' => ['cajero', 'dinero']],
                            'de' => ['sentence' => 'Die Schlange ist hier', 'correct' => ['die', 'Schlange', 'ist', 'hier'], 'extra' => ['Kassierer', 'Geld']],
                            'fr' => ['sentence' => 'La file est ici', 'correct' => ['la', 'file', 'est', 'ici'], 'extra' => ['caissier']],
                            'ja' => ['sentence' => '列はここです', 'correct' => ['列', 'は', 'ここ', 'です'], 'extra' => ['レジ係']],
                            'tr' => ['sentence' => 'sıra burada', 'correct' => ['sıra', 'burada'], 'extra' => ['kasiyer']],
                        ],
                    ],
                    'c' => [
                        'words' => ['계산원과', '제', '돈'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the cashier and my money', 'correct' => ['the', 'cashier', 'and', 'my', 'money'], 'extra' => ['queue']],
                            'az' => ['sentence' => 'kassir və mənim pul', 'correct' => ['kassir', 'və', 'mənim', 'pul'], 'extra' => ['növbə']],
                            'ar' => ['sentence' => 'أمين الصندوق و نقود', 'correct' => ['أمين الصندوق', 'و', 'نقود'], 'extra' => ['طابور']],
                            'ru' => ['sentence' => 'кассир и мой деньги', 'correct' => ['кассир', 'и', 'мой', 'деньги'], 'extra' => ['очередь']],
                            'es' => ['sentence' => 'El cajero y mi dinero', 'correct' => ['el', 'cajero', 'y', 'mi', 'dinero'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer und mein Geld', 'correct' => ['der', 'Kassierer', 'und', 'mein', 'Geld'], 'extra' => ['Schlange']],
                            'fr' => ['sentence' => 'Le caissier et mon argent', 'correct' => ['le', 'caissier', 'et', 'mon', 'argent'], 'extra' => ['file']],
                            'ja' => ['sentence' => 'レジ係と私のお金', 'correct' => ['レジ係', 'と', '私の', 'お金'], 'extra' => ['列']],
                            'tr' => ['sentence' => 'kasiyer ve param', 'correct' => ['kasiyer', 've', 'param'], 'extra' => ['sıra']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 카트 · 계산대', 2,
                pictures: [['ko' => '카트', 'img' => 'cart'], ['ko' => '계산대', 'img' => 'checkout']],
                plain: [['ko' => '기다리다'], ['ko' => '앞에']],
                phrases: [
                    'a' => [
                        'words' => ['계산대에서', '기다리세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'wait at the checkout', 'correct' => ['wait', 'at', 'the', 'checkout'], 'extra' => ['in front']],
                            'az' => ['sentence' => 'gözlə yanında kassa', 'correct' => ['gözlə', 'yanında', 'kassa'], 'extra' => ['qarşıda']],
                            'ar' => ['sentence' => 'انتظر على صندوق الدفع', 'correct' => ['انتظر', 'على', 'صندوق الدفع'], 'extra' => ['أمام']],
                            'ru' => ['sentence' => 'подожди на касса', 'correct' => ['подожди', 'на', 'касса'], 'extra' => ['впереди']],
                            'es' => ['sentence' => 'Esperar en la caja', 'correct' => ['esperar', 'en', 'la', 'caja'], 'extra' => ['delante', 'carrito']],
                            'de' => ['sentence' => 'An der Kasse warten', 'correct' => ['an', 'der', 'Kasse', 'warten'], 'extra' => ['vorne', 'Einkaufswagen']],
                            'fr' => ['sentence' => 'Attendre à la caisse', 'correct' => ['attendre', 'à', 'la', 'caisse'], 'extra' => ['devant', 'chariot']],
                            'ja' => ['sentence' => 'レジで待つ', 'correct' => ['レジ', 'で', '待つ'], 'extra' => ['前に']],
                            'tr' => ['sentence' => 'kasada bekle', 'correct' => ['kasada', 'bekle'], 'extra' => ['önde']],
                        ],
                    ],
                    'b' => [
                        'words' => ['카트는', '앞에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the trolley is in front', 'correct' => ['the', 'trolley', 'is', 'in front'], 'extra' => ['wait']],
                            'az' => ['sentence' => 'araba qarşıda', 'correct' => ['araba', 'qarşıda'], 'extra' => ['gözlə']],
                            'ar' => ['sentence' => 'عربة أمام', 'correct' => ['عربة', 'أمام'], 'extra' => ['انتظر']],
                            'ru' => ['sentence' => 'тележка впереди', 'correct' => ['тележка', 'впереди'], 'extra' => ['подожди']],
                            'es' => ['sentence' => 'El carrito está delante', 'correct' => ['el', 'carrito', 'está', 'delante'], 'extra' => ['esperar', 'caja']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist vorne', 'correct' => ['der', 'Einkaufswagen', 'ist', 'vorne'], 'extra' => ['warten', 'Kasse']],
                            'fr' => ['sentence' => 'Le chariot est devant', 'correct' => ['le', 'chariot', 'est', 'devant'], 'extra' => ['attendre']],
                            'ja' => ['sentence' => 'カートは前にあります', 'correct' => ['カート', 'は', '前に', 'あります'], 'extra' => ['待つ']],
                            'tr' => ['sentence' => 'araba önde', 'correct' => ['araba', 'önde'], 'extra' => ['bekle']],
                        ],
                    ],
                    'c' => [
                        'words' => ['계산대', '앞에서', '기다리세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'wait in front of the checkout', 'correct' => ['wait', 'in front', 'of', 'the', 'checkout'], 'extra' => ['trolley']],
                            'az' => ['sentence' => 'gözlə qarşıda kassa', 'correct' => ['gözlə', 'qarşıda', 'kassa'], 'extra' => ['araba']],
                            'ar' => ['sentence' => 'انتظر أمام صندوق الدفع', 'correct' => ['انتظر', 'أمام', 'صندوق الدفع'], 'extra' => ['عربة']],
                            'ru' => ['sentence' => 'подожди впереди касса', 'correct' => ['подожди', 'впереди', 'касса'], 'extra' => ['тележка']],
                            'es' => ['sentence' => 'Esperar delante de la caja', 'correct' => ['esperar', 'delante', 'de', 'la', 'caja'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Vor der Kasse warten', 'correct' => ['warten', 'vorne', 'von', 'der', 'Kasse'], 'extra' => ['Einkaufswagen']],
                            'fr' => ['sentence' => 'Attendre devant la caisse', 'correct' => ['attendre', 'devant', 'de', 'la', 'caisse'], 'extra' => ['chariot']],
                            'ja' => ['sentence' => 'レジの前で待つ', 'correct' => ['レジ', 'の', '前', 'で', '待つ'], 'extra' => ['カート']],
                            'tr' => ['sentence' => 'kasanın önünde bekle', 'correct' => ['kasanın', 'önünde', 'bekle'], 'extra' => ['araba']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 돈 · 바구니', 3,
                pictures: [['ko' => '돈', 'img' => 'money'], ['ko' => '바구니', 'img' => 'basket']],
                plain: [['ko' => '현금으로'], ['ko' => '카드']],
                phrases: [
                    'a' => [
                        'words' => ['돈으로', '냅니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I pay with money', 'correct' => ['I pay', 'with', 'money'], 'extra' => ['card']],
                            'az' => ['sentence' => 'ödəyirəm ilə pul', 'correct' => ['ödəyirəm', 'ilə', 'pul'], 'extra' => ['kart']],
                            'ar' => ['sentence' => 'أدفع مع نقود', 'correct' => ['أدفع', 'مع', 'نقود'], 'extra' => ['بطاقة']],
                            'ru' => ['sentence' => 'я плачу с деньги', 'correct' => ['я плачу', 'с', 'деньги'], 'extra' => ['карта']],
                            'es' => ['sentence' => 'Pago con dinero', 'correct' => ['pago', 'con', 'dinero'], 'extra' => ['tarjeta', 'en efectivo']],
                            'de' => ['sentence' => 'Ich bezahle mit Geld', 'correct' => ['ich bezahle', 'mit', 'Geld'], 'extra' => ['Karte', 'in bar']],
                            'fr' => ['sentence' => 'Je paie avec de l\'argent', 'correct' => ['je paie', 'avec', 'argent'], 'extra' => ['carte', 'en espèces']],
                            'ja' => ['sentence' => 'お金で払います', 'correct' => ['お金', 'で', '払います'], 'extra' => ['カード']],
                            'tr' => ['sentence' => 'parayla ödüyorum', 'correct' => ['parayla', 'ödüyorum'], 'extra' => ['kart']],
                        ],
                    ],
                    'b' => [
                        'words' => ['카드로', '지불하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to pay with the card', 'correct' => ['to pay', 'with', 'the', 'card'], 'extra' => ['cash']],
                            'az' => ['sentence' => 'ödəmək ilə kart', 'correct' => ['ödəmək', 'ilə', 'kart'], 'extra' => ['nağd']],
                            'ar' => ['sentence' => 'الدفع مع بطاقة', 'correct' => ['الدفع', 'مع', 'بطاقة'], 'extra' => ['كاش']],
                            'ru' => ['sentence' => 'платить с карта', 'correct' => ['платить', 'с', 'карта'], 'extra' => ['наличные']],
                            'es' => ['sentence' => 'Pagar con la tarjeta', 'correct' => ['pagar', 'con', 'la', 'tarjeta'], 'extra' => ['en efectivo', 'cesta']],
                            'de' => ['sentence' => 'Mit der Karte bezahlen', 'correct' => ['mit', 'der', 'Karte', 'bezahlen'], 'extra' => ['in bar', 'Korb']],
                            'fr' => ['sentence' => 'Payer avec la carte', 'correct' => ['payer', 'avec', 'la', 'carte'], 'extra' => ['en espèces']],
                            'ja' => ['sentence' => 'カードで払う', 'correct' => ['カード', 'で', '払う'], 'extra' => ['現金で']],
                            'tr' => ['sentence' => 'kartla ödemek', 'correct' => ['kartla', 'ödemek'], 'extra' => ['nakit']],
                        ],
                    ],
                    'c' => [
                        'words' => ['바구니를', '현금으로', '지불하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to pay the basket in cash', 'correct' => ['to pay', 'the', 'basket', 'in', 'cash'], 'extra' => ['card']],
                            'az' => ['sentence' => 'ödəmək səbət içində nağd', 'correct' => ['ödəmək', 'səbət', 'içində', 'nağd'], 'extra' => ['kart']],
                            'ar' => ['sentence' => 'الدفع سلة في كاش', 'correct' => ['الدفع', 'سلة', 'في', 'كاش'], 'extra' => ['بطاقة']],
                            'ru' => ['sentence' => 'платить корзина в наличные', 'correct' => ['платить', 'корзина', 'в', 'наличные'], 'extra' => ['карта']],
                            'es' => ['sentence' => 'Pagar la cesta en efectivo', 'correct' => ['pagar', 'la', 'cesta', 'en', 'en efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Den Korb in bar bezahlen', 'correct' => ['bezahlen', 'den', 'Korb', 'in', 'in bar'], 'extra' => ['Karte']],
                            'fr' => ['sentence' => 'Payer le panier en espèces', 'correct' => ['payer', 'le', 'panier', 'dans', 'en espèces'], 'extra' => ['carte']],
                            'ja' => ['sentence' => 'かごを現金で払う', 'correct' => ['かご', 'を', '現金で', '払う'], 'extra' => ['カード']],
                            'tr' => ['sentence' => 'sepeti nakit ödemek', 'correct' => ['sepeti', 'nakit', 'ödemek'], 'extra' => ['kart']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 목록 · 상자', 4,
                pictures: [['ko' => '목록', 'img' => 'list'], ['ko' => '상자', 'img' => 'box']],
                plain: [['ko' => '영수증'], ['ko' => '거스름돈']],
                phrases: [
                    'a' => [
                        'words' => ['영수증', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the receipt please', 'correct' => ['the', 'receipt', 'please'], 'extra' => ['change']],
                            'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => ['qalıq']],
                            'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => ['الباقي']],
                            'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => ['сдача']],
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['cambio', 'lista']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Wechselgeld', 'Liste']],
                            'fr' => ['sentence' => 'Le reçu, s\'il vous plaît', 'correct' => ['le', 'reçu', 's\'il vous plaît'], 'extra' => ['monnaie', 'liste']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['おつり']],
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => ['para üstü']],
                        ],
                    ],
                    'b' => [
                        'words' => ['거스름돈과', '영수증'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the change and the receipt', 'correct' => ['the', 'change', 'and', 'the', 'receipt'], 'extra' => ['list']],
                            'az' => ['sentence' => 'qalıq və qəbz', 'correct' => ['qalıq', 'və', 'qəbz'], 'extra' => ['siyahı']],
                            'ar' => ['sentence' => 'الباقي و إيصال', 'correct' => ['الباقي', 'و', 'إيصال'], 'extra' => ['قائمة']],
                            'ru' => ['sentence' => 'сдача и чек', 'correct' => ['сдача', 'и', 'чек'], 'extra' => ['список']],
                            'es' => ['sentence' => 'El cambio y el recibo', 'correct' => ['el', 'cambio', 'y', 'el', 'recibo'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Das Wechselgeld und die Quittung', 'correct' => ['das', 'Wechselgeld', 'und', 'die', 'Quittung'], 'extra' => ['Liste']],
                            'fr' => ['sentence' => 'La monnaie et le reçu', 'correct' => ['la', 'monnaie', 'et', 'le', 'reçu'], 'extra' => ['liste']],
                            'ja' => ['sentence' => 'おつりとレシート', 'correct' => ['おつり', 'と', 'レシート'], 'extra' => ['リスト']],
                            'tr' => ['sentence' => 'para üstü ve fiş', 'correct' => ['para', 'üstü', 've', 'fiş'], 'extra' => ['liste']],
                        ],
                    ],
                    'c' => [
                        'words' => ['상자', '안의', '목록'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the list in the box', 'correct' => ['the', 'list', 'in', 'the', 'box'], 'extra' => ['receipt']],
                            'az' => ['sentence' => 'siyahı içində qutu', 'correct' => ['siyahı', 'içində', 'qutu'], 'extra' => ['qəbz']],
                            'ar' => ['sentence' => 'قائمة في علبة', 'correct' => ['قائمة', 'في', 'علبة'], 'extra' => ['إيصال']],
                            'ru' => ['sentence' => 'список в коробка', 'correct' => ['список', 'в', 'коробка'], 'extra' => ['чек']],
                            'es' => ['sentence' => 'La lista en la caja', 'correct' => ['la', 'lista', 'en', 'la', 'caja'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Die Liste in der Schachtel', 'correct' => ['die', 'Liste', 'in', 'der', 'Schachtel'], 'extra' => ['Quittung']],
                            'fr' => ['sentence' => 'La liste dans la boîte', 'correct' => ['la', 'liste', 'dans', 'la', 'boîte'], 'extra' => ['reçu']],
                            'ja' => ['sentence' => '箱の中のリスト', 'correct' => ['箱', 'の', '中', 'の', 'リスト'], 'extra' => ['レシート']],
                            'tr' => ['sentence' => 'kutudaki liste', 'correct' => ['kutudaki', 'liste'], 'extra' => ['fiş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 빵 · 계란', 5,
                pictures: [['ko' => '빵', 'img' => 'bread'], ['ko' => '계란', 'img' => 'egg']],
                plain: [['ko' => '봉투'], ['ko' => '넣다']],
                phrases: [
                    'a' => [
                        'words' => ['빵을', '봉투에', '넣으세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to put the bread in the bag', 'correct' => ['to put', 'the', 'bread', 'in', 'the', 'bag'], 'extra' => ['egg']],
                            'az' => ['sentence' => 'qoymaq çörək içində torba', 'correct' => ['qoymaq', 'çörək', 'içində', 'torba'], 'extra' => ['yumurta']],
                            'ar' => ['sentence' => 'وضع خبز في كيس', 'correct' => ['وضع', 'خبز', 'في', 'كيس'], 'extra' => ['بيضة']],
                            'ru' => ['sentence' => 'положить хлеб в пакет', 'correct' => ['положить', 'хлеб', 'в', 'пакет'], 'extra' => ['яйцо']],
                            'es' => ['sentence' => 'Poner el pan en la bolsa', 'correct' => ['poner', 'el', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevo']],
                            'de' => ['sentence' => 'Das Brot in die Tüte legen', 'correct' => ['das', 'Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Ei']],
                            'fr' => ['sentence' => 'Mettre le pain dans le sac', 'correct' => ['mettre', 'le', 'pain', 'dans', 'le', 'sac'], 'extra' => ['œuf']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                            'tr' => ['sentence' => 'ekmeği poşete koymak', 'correct' => ['ekmeği', 'poşete', 'koymak'], 'extra' => ['yumurta']],
                        ],
                    ],
                    'b' => [
                        'words' => ['봉투', '안의', '계란'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'an egg in a bag', 'correct' => ['an', 'egg', 'in', 'a', 'bag'], 'extra' => ['to put']],
                            'az' => ['sentence' => 'bir yumurta içində bir torba', 'correct' => ['bir', 'yumurta', 'içində', 'bir', 'torba'], 'extra' => ['qoymaq']],
                            'ar' => ['sentence' => 'بيضة في كيس', 'correct' => ['بيضة', 'في', 'كيس'], 'extra' => ['وضع']],
                            'ru' => ['sentence' => 'яйцо в пакет', 'correct' => ['яйцо', 'в', 'пакет'], 'extra' => ['положить']],
                            'es' => ['sentence' => 'Un huevo en una bolsa', 'correct' => ['un', 'huevo', 'en', 'una', 'bolsa'], 'extra' => ['poner', 'pan']],
                            'de' => ['sentence' => 'Ein Ei in einer Tüte', 'correct' => ['ein', 'Ei', 'in', 'einer', 'Tüte'], 'extra' => ['legen', 'Brot']],
                            'fr' => ['sentence' => 'Un œuf dans un sac', 'correct' => ['un', 'œuf', 'dans', 'un', 'sac'], 'extra' => ['mettre']],
                            'ja' => ['sentence' => '袋の中の卵', 'correct' => ['袋', 'の', '中', 'の', '卵'], 'extra' => ['入れる']],
                            'tr' => ['sentence' => 'poşette bir yumurta', 'correct' => ['poşette', 'bir', 'yumurta'], 'extra' => ['koymak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵을', '봉투에', '넣으세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to put bread in the bag', 'correct' => ['to put', 'bread', 'in', 'the', 'bag'], 'extra' => ['egg']],
                            'az' => ['sentence' => 'qoymaq çörək içində torba', 'correct' => ['qoymaq', 'çörək', 'içində', 'torba'], 'extra' => ['yumurta']],
                            'ar' => ['sentence' => 'وضع خبز في كيس', 'correct' => ['وضع', 'خبز', 'في', 'كيس'], 'extra' => ['بيضة']],
                            'ru' => ['sentence' => 'положить хлеб в пакет', 'correct' => ['положить', 'хлеб', 'в', 'пакет'], 'extra' => ['яйцо']],
                            'es' => ['sentence' => 'Poner pan en la bolsa', 'correct' => ['poner', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevo']],
                            'de' => ['sentence' => 'Brot in die Tüte legen', 'correct' => ['Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Ei']],
                            'fr' => ['sentence' => 'Mettre du pain dans le sac', 'correct' => ['mettre', 'pain', 'dans', 'le', 'sac'], 'extra' => ['œuf']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                            'tr' => ['sentence' => 'poşete ekmek koymak', 'correct' => ['poşete', 'ekmek', 'koymak'], 'extra' => ['yumurta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
