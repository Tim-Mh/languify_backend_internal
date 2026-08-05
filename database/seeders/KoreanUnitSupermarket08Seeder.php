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
                            'es' => ['sentence' => 'El cajero está en la caja', 'correct' => ['el', 'cajero', 'está', 'en', 'la', 'caja'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer ist an der Kasse', 'correct' => ['der', 'Kassierer', 'ist', 'an', 'der', 'Kasse'], 'extra' => ['Schlange']],
                            'fr' => ['sentence' => 'Le caissier est à la caisse', 'correct' => ['le', 'caissier', 'est', 'à', 'la', 'caisse'], 'extra' => ['file']],
                            'ja' => ['sentence' => 'レジ係はレジにいます', 'correct' => ['レジ係', 'は', 'レジ', 'に', 'います'], 'extra' => ['列']],
                        ],
                    ],
                    'b' => [
                        'words' => ['줄은', '여기', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the queue is here', 'correct' => ['the', 'queue', 'is', 'here'], 'extra' => ['cashier']],
                            'es' => ['sentence' => 'La cola está aquí', 'correct' => ['la', 'cola', 'está', 'aquí'], 'extra' => ['cajero', 'dinero']],
                            'de' => ['sentence' => 'Die Schlange ist hier', 'correct' => ['die', 'Schlange', 'ist', 'hier'], 'extra' => ['Kassierer', 'Geld']],
                            'fr' => ['sentence' => 'La file est ici', 'correct' => ['la', 'file', 'est', 'ici'], 'extra' => ['caissier']],
                            'ja' => ['sentence' => '列はここです', 'correct' => ['列', 'は', 'ここ', 'です'], 'extra' => ['レジ係']],
                        ],
                    ],
                    'c' => [
                        'words' => ['계산원과', '제', '돈'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the cashier and my money', 'correct' => ['the', 'cashier', 'and', 'my', 'money'], 'extra' => ['queue']],
                            'es' => ['sentence' => 'El cajero y mi dinero', 'correct' => ['el', 'cajero', 'y', 'mi', 'dinero'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer und mein Geld', 'correct' => ['der', 'Kassierer', 'und', 'mein', 'Geld'], 'extra' => ['Schlange']],
                            'fr' => ['sentence' => 'Le caissier et mon argent', 'correct' => ['le', 'caissier', 'et', 'mon', 'argent'], 'extra' => ['file']],
                            'ja' => ['sentence' => 'レジ係と私のお金', 'correct' => ['レジ係', 'と', '私の', 'お金'], 'extra' => ['列']],
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
                            'es' => ['sentence' => 'Esperar en la caja', 'correct' => ['esperar', 'en', 'la', 'caja'], 'extra' => ['delante', 'carrito']],
                            'de' => ['sentence' => 'An der Kasse warten', 'correct' => ['an', 'der', 'Kasse', 'warten'], 'extra' => ['vorne', 'Einkaufswagen']],
                            'fr' => ['sentence' => 'Attendre à la caisse', 'correct' => ['attendre', 'à', 'la', 'caisse'], 'extra' => ['devant', 'chariot']],
                            'ja' => ['sentence' => 'レジで待つ', 'correct' => ['レジ', 'で', '待つ'], 'extra' => ['前に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['카트는', '앞에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the trolley is in front', 'correct' => ['the', 'trolley', 'is', 'in front'], 'extra' => ['wait']],
                            'es' => ['sentence' => 'El carrito está delante', 'correct' => ['el', 'carrito', 'está', 'delante'], 'extra' => ['esperar', 'caja']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist vorne', 'correct' => ['der', 'Einkaufswagen', 'ist', 'vorne'], 'extra' => ['warten', 'Kasse']],
                            'fr' => ['sentence' => 'Le chariot est devant', 'correct' => ['le', 'chariot', 'est', 'devant'], 'extra' => ['attendre']],
                            'ja' => ['sentence' => 'カートは前にあります', 'correct' => ['カート', 'は', '前に', 'あります'], 'extra' => ['待つ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['계산대', '앞에서', '기다리세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'wait in front of the checkout', 'correct' => ['wait', 'in front', 'of', 'the', 'checkout'], 'extra' => ['trolley']],
                            'es' => ['sentence' => 'Esperar delante de la caja', 'correct' => ['esperar', 'delante', 'de', 'la', 'caja'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Vor der Kasse warten', 'correct' => ['warten', 'vorne', 'von', 'der', 'Kasse'], 'extra' => ['Einkaufswagen']],
                            'fr' => ['sentence' => 'Attendre devant la caisse', 'correct' => ['attendre', 'devant', 'de', 'la', 'caisse'], 'extra' => ['chariot']],
                            'ja' => ['sentence' => 'レジの前で待つ', 'correct' => ['レジ', 'の', '前', 'で', '待つ'], 'extra' => ['カート']],
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
                            'es' => ['sentence' => 'Pago con dinero', 'correct' => ['pago', 'con', 'dinero'], 'extra' => ['tarjeta', 'en efectivo']],
                            'de' => ['sentence' => 'Ich bezahle mit Geld', 'correct' => ['ich bezahle', 'mit', 'Geld'], 'extra' => ['Karte', 'in bar']],
                            'fr' => ['sentence' => 'Je paie avec de l\'argent', 'correct' => ['je paie', 'avec', 'argent'], 'extra' => ['carte', 'en espèces']],
                            'ja' => ['sentence' => 'お金で払います', 'correct' => ['お金', 'で', '払います'], 'extra' => ['カード']],
                        ],
                    ],
                    'b' => [
                        'words' => ['카드로', '지불하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to pay with the card', 'correct' => ['to pay', 'with', 'the', 'card'], 'extra' => ['cash']],
                            'es' => ['sentence' => 'Pagar con la tarjeta', 'correct' => ['pagar', 'con', 'la', 'tarjeta'], 'extra' => ['en efectivo', 'cesta']],
                            'de' => ['sentence' => 'Mit der Karte bezahlen', 'correct' => ['mit', 'der', 'Karte', 'bezahlen'], 'extra' => ['in bar', 'Korb']],
                            'fr' => ['sentence' => 'Payer avec la carte', 'correct' => ['payer', 'avec', 'la', 'carte'], 'extra' => ['en espèces']],
                            'ja' => ['sentence' => 'カードで払う', 'correct' => ['カード', 'で', '払う'], 'extra' => ['現金で']],
                        ],
                    ],
                    'c' => [
                        'words' => ['바구니를', '현금으로', '지불하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to pay the basket in cash', 'correct' => ['to pay', 'the', 'basket', 'in', 'cash'], 'extra' => ['card']],
                            'es' => ['sentence' => 'Pagar la cesta en efectivo', 'correct' => ['pagar', 'la', 'cesta', 'en', 'en efectivo'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Den Korb in bar bezahlen', 'correct' => ['bezahlen', 'den', 'Korb', 'in', 'in bar'], 'extra' => ['Karte']],
                            'fr' => ['sentence' => 'Payer le panier en espèces', 'correct' => ['payer', 'le', 'panier', 'dans', 'en espèces'], 'extra' => ['carte']],
                            'ja' => ['sentence' => 'かごを現金で払う', 'correct' => ['かご', 'を', '現金で', '払う'], 'extra' => ['カード']],
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
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['cambio', 'lista']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Wechselgeld', 'Liste']],
                            'fr' => ['sentence' => 'Le reçu, s\'il vous plaît', 'correct' => ['le', 'reçu', 's\'il vous plaît'], 'extra' => ['monnaie', 'liste']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['おつり']],
                        ],
                    ],
                    'b' => [
                        'words' => ['거스름돈과', '영수증'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the change and the receipt', 'correct' => ['the', 'change', 'and', 'the', 'receipt'], 'extra' => ['list']],
                            'es' => ['sentence' => 'El cambio y el recibo', 'correct' => ['el', 'cambio', 'y', 'el', 'recibo'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Das Wechselgeld und die Quittung', 'correct' => ['das', 'Wechselgeld', 'und', 'die', 'Quittung'], 'extra' => ['Liste']],
                            'fr' => ['sentence' => 'La monnaie et le reçu', 'correct' => ['la', 'monnaie', 'et', 'le', 'reçu'], 'extra' => ['liste']],
                            'ja' => ['sentence' => 'おつりとレシート', 'correct' => ['おつり', 'と', 'レシート'], 'extra' => ['リスト']],
                        ],
                    ],
                    'c' => [
                        'words' => ['상자', '안의', '목록'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the list in the box', 'correct' => ['the', 'list', 'in', 'the', 'box'], 'extra' => ['receipt']],
                            'es' => ['sentence' => 'La lista en la caja', 'correct' => ['la', 'lista', 'en', 'la', 'caja'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Die Liste in der Schachtel', 'correct' => ['die', 'Liste', 'in', 'der', 'Schachtel'], 'extra' => ['Quittung']],
                            'fr' => ['sentence' => 'La liste dans la boîte', 'correct' => ['la', 'liste', 'dans', 'la', 'boîte'], 'extra' => ['reçu']],
                            'ja' => ['sentence' => '箱の中のリスト', 'correct' => ['箱', 'の', '中', 'の', 'リスト'], 'extra' => ['レシート']],
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
                            'es' => ['sentence' => 'Poner el pan en la bolsa', 'correct' => ['poner', 'el', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevo']],
                            'de' => ['sentence' => 'Das Brot in die Tüte legen', 'correct' => ['das', 'Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Ei']],
                            'fr' => ['sentence' => 'Mettre le pain dans le sac', 'correct' => ['mettre', 'le', 'pain', 'dans', 'le', 'sac'], 'extra' => ['œuf']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                        ],
                    ],
                    'b' => [
                        'words' => ['봉투', '안의', '계란'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'an egg in a bag', 'correct' => ['an', 'egg', 'in', 'a', 'bag'], 'extra' => ['to put']],
                            'es' => ['sentence' => 'Un huevo en una bolsa', 'correct' => ['un', 'huevo', 'en', 'una', 'bolsa'], 'extra' => ['poner', 'pan']],
                            'de' => ['sentence' => 'Ein Ei in einer Tüte', 'correct' => ['ein', 'Ei', 'in', 'einer', 'Tüte'], 'extra' => ['legen', 'Brot']],
                            'fr' => ['sentence' => 'Un œuf dans un sac', 'correct' => ['un', 'œuf', 'dans', 'un', 'sac'], 'extra' => ['mettre']],
                            'ja' => ['sentence' => '袋の中の卵', 'correct' => ['袋', 'の', '中', 'の', '卵'], 'extra' => ['入れる']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵을', '봉투에', '넣으세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to put bread in the bag', 'correct' => ['to put', 'bread', 'in', 'the', 'bag'], 'extra' => ['egg']],
                            'es' => ['sentence' => 'Poner pan en la bolsa', 'correct' => ['poner', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevo']],
                            'de' => ['sentence' => 'Brot in die Tüte legen', 'correct' => ['Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Ei']],
                            'fr' => ['sentence' => 'Mettre du pain dans le sac', 'correct' => ['mettre', 'pain', 'dans', 'le', 'sac'], 'extra' => ['œuf']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
