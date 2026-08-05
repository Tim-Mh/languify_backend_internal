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
                            'es' => ['sentence' => 'El cajero está en la caja', 'correct' => ['el', 'cajero', 'está', 'a', 'la', 'caja'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Der Kassierer ist an der Kasse', 'correct' => ['der', 'Kassierer', 'ist', 'zu', 'der', 'Kasse'], 'extra' => ['Schlange']],
                            'ja' => ['sentence' => 'レジ係はレジにいます', 'correct' => ['レジ係', 'は', 'レジ', 'に', 'います'], 'extra' => ['列']],
                            'ko' => ['sentence' => '계산원은 계산대에 있습니다', 'correct' => ['계산원은', '계산대에', '있습니다'], 'extra' => ['줄']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'file', 'est', 'longue'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The queue is long', 'correct' => ['the', 'queue', 'is', 'long'], 'extra' => ['cashier', 'money']],
                            'es' => ['sentence' => 'La cola es larga', 'correct' => ['la', 'cola', 'es', 'larga'], 'extra' => ['cajero', 'dinero']],
                            'de' => ['sentence' => 'Die Schlange ist lang', 'correct' => ['die', 'Schlange', 'ist', 'lang'], 'extra' => ['Kassierer', 'Geld']],
                            'ja' => ['sentence' => '列は長いです', 'correct' => ['列', 'は', '長い', 'です'], 'extra' => ['レジ係']],
                            'ko' => ['sentence' => '줄이 깁니다', 'correct' => ['줄이', '깁니다'], 'extra' => ['계산원']],
                        ],
                    ],
                    'c' => [
                        'words' => ['donner', 'mon', 'argent', 'au', 'caissier'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To give my money to the cashier', 'correct' => ['to give', 'my', 'money', 'to the', 'cashier'], 'extra' => ['queue']],
                            'es' => ['sentence' => 'Dar mi dinero al cajero', 'correct' => ['dar', 'mi', 'dinero', 'al', 'cajero'], 'extra' => ['cola']],
                            'de' => ['sentence' => 'Mein Geld dem Kassierer geben', 'correct' => ['geben', 'mein', 'Geld', 'zum', 'Kassierer'], 'extra' => ['Schlange']],
                            'ja' => ['sentence' => 'レジ係にお金を渡す', 'correct' => ['レジ係', 'に', 'お金', 'を', '渡す'], 'extra' => ['列']],
                            'ko' => ['sentence' => '계산원에게 제 돈을 주다', 'correct' => ['계산원에게', '제', '돈을', '주다'], 'extra' => ['줄']],
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
                            'es' => ['sentence' => 'Esperar en la caja', 'correct' => ['esperar', 'a', 'la', 'caja'], 'extra' => ['delante', 'carrito']],
                            'de' => ['sentence' => 'An der Kasse warten', 'correct' => ['warten', 'zu', 'der', 'Kasse'], 'extra' => ['vor', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'レジで待つ', 'correct' => ['レジ', 'で', '待つ'], 'extra' => ['の前に']],
                            'ko' => ['sentence' => '계산대에서 기다리다', 'correct' => ['계산대에서', '기다리다'], 'extra' => ['앞에']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'chariot', 'est', 'devant'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The trolley is in front', 'correct' => ['the', 'trolley', 'is', 'in front'], 'extra' => ['to wait', 'checkout']],
                            'es' => ['sentence' => 'El carrito está delante', 'correct' => ['el', 'carrito', 'está', 'delante'], 'extra' => ['esperar', 'caja']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist vorne', 'correct' => ['der', 'Einkaufswagen', 'ist', 'vor'], 'extra' => ['warten', 'Kasse']],
                            'ja' => ['sentence' => 'カートは前にあります', 'correct' => ['カート', 'は', '前に', 'あります'], 'extra' => ['待つ']],
                            'ko' => ['sentence' => '카트는 앞에 있습니다', 'correct' => ['카트는', '앞에', '있습니다'], 'extra' => ['기다리다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['attendre', 'devant', 'la', 'caisse'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To wait in front of the checkout', 'correct' => ['to wait', 'in front', 'the', 'checkout'], 'extra' => ['trolley']],
                            'es' => ['sentence' => 'Esperar delante de la caja', 'correct' => ['esperar', 'delante', 'la', 'caja'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Vor der Kasse warten', 'correct' => ['vor', 'der', 'Kasse', 'warten'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => 'レジの前で待つ', 'correct' => ['レジ', 'の', '前', 'で', '待つ'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '계산대 앞에서 기다리다', 'correct' => ['계산대', '앞에서', '기다리다'], 'extra' => ['카트']],
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
                            'es' => ['sentence' => 'Pago en efectivo con mi dinero', 'correct' => ['pago', 'en efectivo', 'con', 'mi', 'dinero'], 'extra' => ['tarjeta']],
                            'de' => ['sentence' => 'Ich bezahle in bar mit meinem Geld', 'correct' => ['ich bezahle', 'in bar', 'mit', 'meinem', 'Geld'], 'extra' => ['Bankkarte']],
                            'ja' => ['sentence' => '私のお金で現金で払います', 'correct' => ['私の', 'お金', 'で', '現金で', '払います'], 'extra' => ['カード']],
                            'ko' => ['sentence' => '제 돈으로 현금으로 냅니다', 'correct' => ['제', '돈으로', '현금으로', '냅니다'], 'extra' => ['카드']],
                        ],
                    ],
                    'b' => [
                        'words' => ['payer', 'avec', 'la', 'carte bancaire'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To pay with the bank card', 'correct' => ['to pay', 'with', 'the', 'bank card'], 'extra' => ['in cash', 'basket']],
                            'es' => ['sentence' => 'Pagar con la tarjeta', 'correct' => ['pagar', 'con', 'la', 'tarjeta'], 'extra' => ['en efectivo', 'cesta']],
                            'de' => ['sentence' => 'Mit der Bankkarte bezahlen', 'correct' => ['mit', 'der', 'Bankkarte', 'bezahlen'], 'extra' => ['in bar', 'Korb']],
                            'ja' => ['sentence' => 'カードで払う', 'correct' => ['カード', 'で', '払う'], 'extra' => ['現金で']],
                            'ko' => ['sentence' => '카드로 지불하다', 'correct' => ['카드로', '지불하다'], 'extra' => ['현금으로']],
                        ],
                    ],
                    'c' => [
                        'words' => ['payer', 'le', 'panier', 'en espèces'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To pay for the basket in cash', 'correct' => ['to pay', 'the', 'basket', 'in cash'], 'extra' => ['menu card']],
                            'es' => ['sentence' => 'Pagar la cesta en efectivo', 'correct' => ['pagar', 'la', 'cesta', 'en efectivo'], 'extra' => ['carta']],
                            'de' => ['sentence' => 'Den Korb in bar bezahlen', 'correct' => ['den', 'Korb', 'in bar', 'bezahlen'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'かごを現金で払う', 'correct' => ['かご', 'を', '現金で', '払う'], 'extra' => ['メニュー表']],
                            'ko' => ['sentence' => '바구니를 현금으로 지불하다', 'correct' => ['바구니를', '현금으로', '지불하다'], 'extra' => ['메뉴판']],
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
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['cambio', 'lista']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Wechselgeld', 'Liste']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '영수증 부탁합니다', 'correct' => ['영수증', '부탁합니다'], 'extra' => ['거스름돈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'monnaie', 'et', 'le', 'reçu'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The change and the receipt', 'correct' => ['the', 'change', 'and', 'the', 'receipt'], 'extra' => ['list', 'box']],
                            'es' => ['sentence' => 'El cambio y el recibo', 'correct' => ['el', 'cambio', 'y', 'el', 'recibo'], 'extra' => ['lista', 'caja']],
                            'de' => ['sentence' => 'Das Wechselgeld und die Quittung', 'correct' => ['das', 'Wechselgeld', 'und', 'die', 'Quittung'], 'extra' => ['Liste', 'Schachtel']],
                            'ja' => ['sentence' => 'おつりとレシート', 'correct' => ['おつり', 'と', 'レシート'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '거스름돈과 영수증', 'correct' => ['거스름돈과', '영수증'], 'extra' => ['목록']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'liste', 'dans', 'la', 'boîte'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The list in the box', 'correct' => ['the', 'list', 'in', 'the', 'box'], 'extra' => ['change', 'receipt']],
                            'es' => ['sentence' => 'La lista en la caja', 'correct' => ['la', 'lista', 'en', 'la', 'caja'], 'extra' => ['cambio', 'recibo']],
                            'de' => ['sentence' => 'Die Liste in der Schachtel', 'correct' => ['die', 'Liste', 'in', 'der', 'Schachtel'], 'extra' => ['Wechselgeld', 'Quittung']],
                            'ja' => ['sentence' => '箱の中のリスト', 'correct' => ['箱', 'の', '中', 'の', 'リスト'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '상자 안의 목록', 'correct' => ['상자', '안의', '목록'], 'extra' => ['거스름돈']],
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
                            'es' => ['sentence' => 'Poner el pan en la bolsa', 'correct' => ['poner', 'el', 'pan', 'en', 'la', 'bolsa'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Das Brot in die Tüte legen', 'correct' => ['das', 'Brot', 'in', 'die', 'Tüte', 'legen'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => 'パンを袋に入れる', 'correct' => ['パン', 'を', '袋', 'に', '入れる'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '빵을 봉투에 넣다', 'correct' => ['빵을', '봉투에', '넣다'], 'extra' => ['계란']],
                        ],
                    ],
                    'b' => [
                        'words' => ['des', 'œufs', 'dans', 'un', 'sac'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Some eggs in a bag', 'correct' => ['some', 'eggs', 'in', 'a', 'bag'], 'extra' => ['to put', 'bread']],
                            'es' => ['sentence' => 'Unos huevos en una bolsa', 'correct' => ['unos', 'huevos', 'en', 'una', 'bolsa'], 'extra' => ['poner', 'pan']],
                            'de' => ['sentence' => 'Eier in einer Tüte', 'correct' => ['einige', 'Eier', 'in', 'einer', 'Tüte'], 'extra' => ['legen', 'Brot']],
                            'ja' => ['sentence' => '袋の中の卵', 'correct' => ['袋', 'の', '中', 'の', '卵'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '봉투 안의 계란', 'correct' => ['봉투', '안의', '계란'], 'extra' => ['넣다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mettre', 'des', 'œufs', 'et', 'du', 'pain'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To put some eggs and some bread', 'correct' => ['to put', 'some', 'eggs', 'and', 'some', 'bread'], 'extra' => ['bag']],
                            'es' => ['sentence' => 'Poner huevos y pan', 'correct' => ['poner', 'unos', 'huevos', 'y', 'algo de', 'pan'], 'extra' => ['bolsa']],
                            'de' => ['sentence' => 'Eier und Brot legen', 'correct' => ['legen', 'einige', 'Eier', 'und', 'etwas', 'Brot'], 'extra' => ['Tüte']],
                            'ja' => ['sentence' => '卵とパンを入れる', 'correct' => ['卵', 'と', 'パン', 'を', '入れる'], 'extra' => ['袋']],
                            'ko' => ['sentence' => '계란과 빵을 넣다', 'correct' => ['계란과', '빵을', '넣다'], 'extra' => ['봉투']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
