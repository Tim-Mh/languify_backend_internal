<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket08Seeder extends Seeder
{
    private const PICTURES = [
        'Checkout' => 'checkout', 'Money' => 'money', 'Trolley' => 'cart', 'Basket' => 'basket',
        'List' => 'list', 'Box' => 'box', 'Bread' => 'bread', 'Egg' => 'egg',
    ];

    /**
     * English Chapter 4, Unit 8 — the checkout.
     *
     * The counterpart to Chapter 3's "paying the bill", reusing that language on
     * purpose: a learner who can settle a restaurant bill should find they can
     * mostly handle a till, with only the queue and the cashier as new words.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: At the Checkout', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Cashier', 1,
                pictures: [['en' => 'Checkout', 'img' => 'checkout'], ['en' => 'Money', 'img' => 'money']],
                plain: [['en' => 'Cashier'], ['en' => 'Queue']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'cashier', 'is', 'at', 'the', 'checkout'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El cajero está en la caja', 'correct' => ['el', 'cajero', 'está', 'en', 'la', 'caja'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer ist an der Kasse', 'correct' => ['der', 'Kassierer', 'ist', 'an', 'der', 'Kasse'], 'extra' => ['Schlange']],
                            'ja' => ['sentence' => 'レジ係はレジにいます', 'correct' => ['レジ係', 'は', 'レジ', 'に', 'います'], 'extra' => ['列']],
                            'ko' => ['sentence' => '계산원은 계산대에 있습니다', 'correct' => ['계산원은', '계산대에', '있습니다'], 'extra' => ['줄']],
                            'fr' => ['sentence' => 'Le caissier est à la caisse', 'correct' => ['le', 'caissier', 'est', 'à', 'la', 'caisse'], 'extra' => ['file']],
                            'tr' => ['sentence' => 'kasiyer kasada', 'correct' => ['kasiyer', 'kasada'], 'extra' => []],
                        'ru' => ['sentence' => 'кассир на касса', 'correct' => ['кассир', 'на', 'касса'], 'extra' => []],
                        'ar' => ['sentence' => 'أمين الصندوق على صندوق الدفع', 'correct' => ['أمين الصندوق', 'على', 'صندوق الدفع'], 'extra' => []],
                        'az' => ['sentence' => 'kassir yanında kassa', 'correct' => ['kassir', 'yanında', 'kassa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'queue', 'is', 'here'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La cola está aquí', 'correct' => ['la', 'cola', 'está', 'aquí'], 'extra' => ['cajero', 'dinero']],
                            'de' => ['sentence' => 'Die Schlange ist hier', 'correct' => ['die', 'Schlange', 'ist', 'hier'], 'extra' => ['Kassierer', 'Geld']],
                            'ja' => ['sentence' => '列はここです', 'correct' => ['列', 'は', 'ここ', 'です'], 'extra' => ['レジ係']],
                            'ko' => ['sentence' => '줄은 여기 있습니다', 'correct' => ['줄은', '여기', '있습니다'], 'extra' => ['계산원']],
                            'fr' => ['sentence' => 'La file est ici', 'correct' => ['la', 'file', 'est', 'ici'], 'extra' => ['caissier']],
                            'tr' => ['sentence' => 'sıra burada', 'correct' => ['sıra', 'burada'], 'extra' => []],
                        'ru' => ['sentence' => 'очередь здесь', 'correct' => ['очередь', 'здесь'], 'extra' => []],
                        'ar' => ['sentence' => 'طابور هنا', 'correct' => ['طابور', 'هنا'], 'extra' => []],
                        'az' => ['sentence' => 'növbə burada', 'correct' => ['növbə', 'burada'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'cashier', 'and', 'my', 'money'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El cajero y mi dinero', 'correct' => ['el', 'cajero', 'y', 'mi', 'dinero'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer und mein Geld', 'correct' => ['der', 'Kassierer', 'und', 'mein', 'Geld'], 'extra' => ['Schlange']],
                            'ja' => ['sentence' => 'レジ係と私のお金', 'correct' => ['レジ係', 'と', '私の', 'お金'], 'extra' => ['列']],
                            'ko' => ['sentence' => '계산원과 제 돈', 'correct' => ['계산원과', '제', '돈'], 'extra' => ['줄']],
                            'fr' => ['sentence' => 'Le caissier et mon argent', 'correct' => ['le', 'caissier', 'et', 'mon', 'argent'], 'extra' => ['file']],
                            'tr' => ['sentence' => 'kasiyer ve param', 'correct' => ['kasiyer', 've', 'param'], 'extra' => []],
                        'ru' => ['sentence' => 'кассир и мой деньги', 'correct' => ['кассир', 'и', 'мой', 'деньги'], 'extra' => []],
                        'ar' => ['sentence' => 'أمين الصندوق و نقود', 'correct' => ['أمين الصندوق', 'و', 'نقود'], 'extra' => []],
                        'az' => ['sentence' => 'kassir və mənim pul', 'correct' => ['kassir', 'və', 'mənim', 'pul'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Waiting in Line', 2,
                pictures: [['en' => 'Trolley', 'img' => 'cart'], ['en' => 'Checkout', 'img' => 'checkout']],
                plain: [['en' => 'Wait'], ['en' => 'In front']],
                phrases: [
                    'a' => [
                        'words' => ['wait', 'at', 'the', 'checkout'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Esperar en la caja', 'correct' => ['esperar', 'en', 'la', 'caja'], 'extra' => ['delante', 'carrito']],
                            'de' => ['sentence' => 'An der Kasse warten', 'correct' => ['an', 'der', 'Kasse', 'warten'], 'extra' => ['vorne', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'レジで待つ', 'correct' => ['レジ', 'で', '待つ'], 'extra' => ['前に']],
                            'ko' => ['sentence' => '계산대에서 기다리다', 'correct' => ['계산대에서', '기다리다'], 'extra' => ['앞에']],
                            'fr' => ['sentence' => 'Attendre à la caisse', 'correct' => ['attendre', 'à', 'la', 'caisse'], 'extra' => ['devant', 'chariot']],
                            'tr' => ['sentence' => 'kasada bekle', 'correct' => ['kasada', 'bekle'], 'extra' => []],
                        'ru' => ['sentence' => 'подожди на касса', 'correct' => ['подожди', 'на', 'касса'], 'extra' => []],
                        'ar' => ['sentence' => 'انتظر على صندوق الدفع', 'correct' => ['انتظر', 'على', 'صندوق الدفع'], 'extra' => []],
                        'az' => ['sentence' => 'gözlə yanında kassa', 'correct' => ['gözlə', 'yanında', 'kassa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'trolley', 'is', 'in front'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El carrito está delante', 'correct' => ['el', 'carrito', 'está', 'delante'], 'extra' => ['esperar', 'caja']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist vorne', 'correct' => ['der', 'Einkaufswagen', 'ist', 'vorne'], 'extra' => ['warten', 'Kasse']],
                            'ja' => ['sentence' => 'カートは前にあります', 'correct' => ['カート', 'は', '前に', 'あります'], 'extra' => ['待つ']],
                            'ko' => ['sentence' => '카트는 앞에 있습니다', 'correct' => ['카트는', '앞에', '있습니다'], 'extra' => ['기다리다']],
                            'fr' => ['sentence' => 'Le chariot est devant', 'correct' => ['le', 'chariot', 'est', 'devant'], 'extra' => ['attendre']],
                            'tr' => ['sentence' => 'araba önde', 'correct' => ['araba', 'önde'], 'extra' => []],
                        'ru' => ['sentence' => 'тележка впереди', 'correct' => ['тележка', 'впереди'], 'extra' => []],
                        'ar' => ['sentence' => 'عربة أمام', 'correct' => ['عربة', 'أمام'], 'extra' => []],
                        'az' => ['sentence' => 'araba qarşıda', 'correct' => ['araba', 'qarşıda'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['wait', 'in front', 'of', 'the', 'checkout'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Esperar delante de la caja', 'correct' => ['esperar', 'delante', 'de', 'la', 'caja'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Vor der Kasse warten', 'correct' => ['warten', 'vorne', 'von', 'der', 'Kasse'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => 'レジの前で待つ', 'correct' => ['レジ', 'の', '前', 'で', '待つ'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '계산대 앞에서 기다리다', 'correct' => ['계산대', '앞에서', '기다리다'], 'extra' => ['카트']],
                            'fr' => ['sentence' => 'Attendre devant la caisse', 'correct' => ['attendre', 'devant', 'de', 'la', 'caisse'], 'extra' => ['chariot']],
                            'tr' => ['sentence' => 'kasanın önünde bekle', 'correct' => ['kasanın', 'önünde', 'bekle'], 'extra' => []],
                        'ru' => ['sentence' => 'подожди впереди касса', 'correct' => ['подожди', 'впереди', 'касса'], 'extra' => []],
                        'ar' => ['sentence' => 'انتظر أمام صندوق الدفع', 'correct' => ['انتظر', 'أمام', 'صندوق الدفع'], 'extra' => []],
                        'az' => ['sentence' => 'gözlə qarşıda kassa', 'correct' => ['gözlə', 'qarşıda', 'kassa'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Cash or Card', 3,
                pictures: [['en' => 'Money', 'img' => 'money'], ['en' => 'Basket', 'img' => 'basket']],
                plain: [['en' => 'Cash'], ['en' => 'Card']],
                phrases: [
                    'a' => [
                        'words' => ['I pay', 'with', 'money'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Pago con dinero', 'correct' => ['pago', 'con', 'dinero'], 'extra' => ['tarjeta', 'en efectivo']],
                            'de' => ['sentence' => 'Ich bezahle mit Geld', 'correct' => ['ich bezahle', 'mit', 'Geld'], 'extra' => ['Karte', 'in bar']],
                            'ja' => ['sentence' => 'お金で払います', 'correct' => ['お金', 'で', '払います'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '돈으로 냅니다', 'correct' => ['돈으로', '냅니다'], 'extra' => ['카드']],
                            'fr' => ['sentence' => "Je paie avec de l'argent", 'correct' => ['je paie', 'avec', 'argent'], 'extra' => ['carte', 'en espèces']],
                            'tr' => ['sentence' => 'parayla ödüyorum', 'correct' => ['parayla', 'ödüyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я плачу с деньги', 'correct' => ['я плачу', 'с', 'деньги'], 'extra' => []],
                        'ar' => ['sentence' => 'أدفع مع نقود', 'correct' => ['أدفع', 'مع', 'نقود'], 'extra' => []],
                        'az' => ['sentence' => 'ödəyirəm ilə pul', 'correct' => ['ödəyirəm', 'ilə', 'pul'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['to pay', 'with', 'the', 'card'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Pagar con la tarjeta', 'correct' => ['pagar', 'con', 'la', 'tarjeta'], 'extra' => ['en efectivo', 'cesta']],
                            'de' => ['sentence' => 'Mit der Karte bezahlen', 'correct' => ['mit', 'der', 'Karte', 'bezahlen'], 'extra' => ['in bar', 'Korb']],
                            'ja' => ['sentence' => 'カードで払う', 'correct' => ['カード', 'で', '払う'], 'extra' => ['現金で']],
                            'ko' => ['sentence' => '카드로 지불하다', 'correct' => ['카드로', '지불하다'], 'extra' => ['현금으로']],
                            'fr' => ['sentence' => 'Payer avec la carte', 'correct' => ['payer', 'avec', 'la', 'carte'], 'extra' => ['en espèces']],
                            'tr' => ['sentence' => 'kartla ödemek', 'correct' => ['kartla', 'ödemek'], 'extra' => []],
                        'ru' => ['sentence' => 'платить с карта', 'correct' => ['платить', 'с', 'карта'], 'extra' => []],
                        'ar' => ['sentence' => 'الدفع مع بطاقة', 'correct' => ['الدفع', 'مع', 'بطاقة'], 'extra' => []],
                        'az' => ['sentence' => 'ödəmək ilə kart', 'correct' => ['ödəmək', 'ilə', 'kart'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to pay', 'the', 'basket', 'in', 'cash'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Pagar la cesta en efectivo', 'correct' => ['pagar', 'la', 'cesta', 'en', 'en efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Den Korb in bar bezahlen', 'correct' => ['bezahlen', 'den', 'Korb', 'in', 'in bar'], 'extra' => ['Karte']],
                            'ja' => ['sentence' => 'かごを現金で払う', 'correct' => ['かご', 'を', '現金で', '払う'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '바구니를 현금으로 지불하다', 'correct' => ['바구니를', '현금으로', '지불하다'], 'extra' => ['카드']],
                            'fr' => ['sentence' => 'Payer le panier en espèces', 'correct' => ['payer', 'le', 'panier', 'dans', 'en espèces'], 'extra' => ['carte']],
                            'tr' => ['sentence' => 'sepeti nakit ödemek', 'correct' => ['sepeti', 'nakit', 'ödemek'], 'extra' => []],
                        'ru' => ['sentence' => 'платить корзина в наличные', 'correct' => ['платить', 'корзина', 'в', 'наличные'], 'extra' => []],
                        'ar' => ['sentence' => 'الدفع سلة في كاش', 'correct' => ['الدفع', 'سلة', 'في', 'كاش'], 'extra' => []],
                        'az' => ['sentence' => 'ödəmək səbət içində nağd', 'correct' => ['ödəmək', 'səbət', 'içində', 'nağd'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: The Receipt', 4,
                pictures: [['en' => 'List', 'img' => 'list'], ['en' => 'Box', 'img' => 'box']],
                plain: [['en' => 'Receipt'], ['en' => 'Change']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'receipt', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['cambio', 'lista']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Wechselgeld', 'Liste']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '영수증 부탁합니다', 'correct' => ['영수증', '부탁합니다'], 'extra' => ['거스름돈']],
                            'fr' => ['sentence' => "Le reçu, s'il vous plaît", 'correct' => ['le', 'reçu', "s'il vous plaît"], 'extra' => ['monnaie', 'liste']],
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'change', 'and', 'the', 'receipt'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El cambio y el recibo', 'correct' => ['el', 'cambio', 'y', 'el', 'recibo'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Das Wechselgeld und die Quittung', 'correct' => ['das', 'Wechselgeld', 'und', 'die', 'Quittung'], 'extra' => ['Liste']],
                            'ja' => ['sentence' => 'おつりとレシート', 'correct' => ['おつり', 'と', 'レシート'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '거스름돈과 영수증', 'correct' => ['거스름돈과', '영수증'], 'extra' => ['목록']],
                            'fr' => ['sentence' => 'La monnaie et le reçu', 'correct' => ['la', 'monnaie', 'et', 'le', 'reçu'], 'extra' => ['liste']],
                            'tr' => ['sentence' => 'para üstü ve fiş', 'correct' => ['para', 'üstü', 've', 'fiş'], 'extra' => []],
                        'ru' => ['sentence' => 'сдача и чек', 'correct' => ['сдача', 'и', 'чек'], 'extra' => []],
                        'ar' => ['sentence' => 'الباقي و إيصال', 'correct' => ['الباقي', 'و', 'إيصال'], 'extra' => []],
                        'az' => ['sentence' => 'qalıq və qəbz', 'correct' => ['qalıq', 'və', 'qəbz'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'list', 'in', 'the', 'box'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'La lista en la caja', 'correct' => ['la', 'lista', 'en', 'la', 'caja'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Die Liste in der Schachtel', 'correct' => ['die', 'Liste', 'in', 'der', 'Schachtel'], 'extra' => ['Quittung']],
                            'ja' => ['sentence' => '箱の中のリスト', 'correct' => ['箱', 'の', '中', 'の', 'リスト'], 'extra' => ['レシート']],
                            'ko' => ['sentence' => '상자 안의 목록', 'correct' => ['상자', '안의', '목록'], 'extra' => ['영수증']],
                            'fr' => ['sentence' => 'La liste dans la boîte', 'correct' => ['la', 'liste', 'dans', 'la', 'boîte'], 'extra' => ['reçu']],
                            'tr' => ['sentence' => 'kutudaki liste', 'correct' => ['kutudaki', 'liste'], 'extra' => []],
                        'ru' => ['sentence' => 'список в коробка', 'correct' => ['список', 'в', 'коробка'], 'extra' => []],
                        'ar' => ['sentence' => 'قائمة في علبة', 'correct' => ['قائمة', 'في', 'علبة'], 'extra' => []],
                        'az' => ['sentence' => 'siyahı içində qutu', 'correct' => ['siyahı', 'içində', 'qutu'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Bagging It Up', 5,
                pictures: [['en' => 'Bread', 'img' => 'bread'], ['en' => 'Egg', 'img' => 'egg']],
                plain: [['en' => 'Bag'], ['en' => 'To put']],
                phrases: [
                    'a' => [
                        'words' => ['to put', 'the', 'bread', 'in', 'the', 'bag'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Poner el pan en la bolsa', 'correct' => ['poner', 'el', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevo']],
                            'de' => ['sentence' => 'Das Brot in die Tüte legen', 'correct' => ['das', 'Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Ei']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '빵을 봉투에 넣다', 'correct' => ['빵을', '봉투에', '넣다'], 'extra' => ['계란']],
                            'fr' => ['sentence' => 'Mettre le pain dans le sac', 'correct' => ['mettre', 'le', 'pain', 'dans', 'le', 'sac'], 'extra' => ['œuf']],
                            'tr' => ['sentence' => 'ekmeği poşete koymak', 'correct' => ['ekmeği', 'poşete', 'koymak'], 'extra' => []],
                        'ru' => ['sentence' => 'положить хлеб в пакет', 'correct' => ['положить', 'хлеб', 'в', 'пакет'], 'extra' => []],
                        'ar' => ['sentence' => 'وضع خبز في كيس', 'correct' => ['وضع', 'خبز', 'في', 'كيس'], 'extra' => []],
                        'az' => ['sentence' => 'qoymaq çörək içində torba', 'correct' => ['qoymaq', 'çörək', 'içində', 'torba'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'egg', 'in', 'a', 'bag'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Un huevo en una bolsa', 'correct' => ['un', 'huevo', 'en', 'una', 'bolsa'], 'extra' => ['poner', 'pan']],
                            'de' => ['sentence' => 'Ein Ei in einer Tüte', 'correct' => ['ein', 'Ei', 'in', 'einer', 'Tüte'], 'extra' => ['legen', 'Brot']],
                            'ja' => ['sentence' => '袋の中の卵', 'correct' => ['袋', 'の', '中', 'の', '卵'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '봉투 안의 계란', 'correct' => ['봉투', '안의', '계란'], 'extra' => ['넣다']],
                            'fr' => ['sentence' => 'Un œuf dans un sac', 'correct' => ['un', 'œuf', 'dans', 'un', 'sac'], 'extra' => ['mettre']],
                            'tr' => ['sentence' => 'poşette bir yumurta', 'correct' => ['poşette', 'bir', 'yumurta'], 'extra' => []],
                        'ru' => ['sentence' => 'яйцо в пакет', 'correct' => ['яйцо', 'в', 'пакет'], 'extra' => []],
                        'ar' => ['sentence' => 'بيضة في كيس', 'correct' => ['بيضة', 'في', 'كيس'], 'extra' => []],
                        'az' => ['sentence' => 'bir yumurta içində bir torba', 'correct' => ['bir', 'yumurta', 'içində', 'bir', 'torba'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to put', 'bread', 'in', 'the', 'bag'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Poner pan en la bolsa', 'correct' => ['poner', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevo']],
                            'de' => ['sentence' => 'Brot in die Tüte legen', 'correct' => ['Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Ei']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '빵을 봉투에 넣다', 'correct' => ['빵을', '봉투에', '넣다'], 'extra' => ['계란']],
                            'fr' => ['sentence' => 'Mettre du pain dans le sac', 'correct' => ['mettre', 'pain', 'dans', 'le', 'sac'], 'extra' => ['œuf']],
                            'tr' => ['sentence' => 'poşete ekmek koymak', 'correct' => ['poşete', 'ekmek', 'koymak'], 'extra' => []],
                        'ru' => ['sentence' => 'положить хлеб в пакет', 'correct' => ['положить', 'хлеб', 'в', 'пакет'], 'extra' => []],
                        'ar' => ['sentence' => 'وضع خبز في كيس', 'correct' => ['وضع', 'خبز', 'في', 'كيس'], 'extra' => []],
                        'az' => ['sentence' => 'qoymaq çörək içində torba', 'correct' => ['qoymaq', 'çörək', 'içində', 'torba'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
