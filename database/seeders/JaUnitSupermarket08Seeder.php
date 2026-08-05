<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket08Seeder extends Seeder
{
    private const PICTURES = [
        'レジ' => 'checkout',
        'お金' => 'money',
        'カート' => 'cart',
        'かご' => 'basket',
        'リスト' => 'list',
        '箱' => 'box',
        'パン' => 'bread',
        '卵' => 'egg',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 8, the Japanese twin of the
     * English "Unit 8: At the Checkout" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'ユニット8: レジで', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: レジ・お金', 1,
                pictures: [
                    [
                        'ja' => 'レジ',
                        'img' => 'checkout',
                    ],
                    [
                        'ja' => 'お金',
                        'img' => 'money',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'レジ係',
                    ],
                    [
                        'ja' => '列',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'レジ係',
                            'は',
                            'レジ',
                            'に',
                            'います',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cashier is at the checkout',
                                'correct' => [
                                    'the',
                                    'cashier',
                                    'is',
                                    'at',
                                    'the',
                                    'checkout',
                                ],
                                'extra' => [
                                    'queue',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El cajero está en la caja',
                                'correct' => [
                                    'el',
                                    'cajero',
                                    'está',
                                    'en',
                                    'la',
                                    'caja',
                                ],
                                'extra' => [
                                    'cola',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kassierer ist an der Kasse',
                                'correct' => [
                                    'der',
                                    'Kassierer',
                                    'ist',
                                    'an',
                                    'der',
                                    'Kasse',
                                ],
                                'extra' => [
                                    'Schlange',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le caissier est à la caisse',
                                'correct' => [
                                    'le',
                                    'caissier',
                                    'est',
                                    'à',
                                    'la',
                                    'caisse',
                                ],
                                'extra' => [
                                    'file',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산원은 계산대에 있습니다',
                                'correct' => [
                                    '계산원은',
                                    '계산대에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '줄',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '列',
                            'は',
                            'ここ',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the queue is here',
                                'correct' => [
                                    'the',
                                    'queue',
                                    'is',
                                    'here',
                                ],
                                'extra' => [
                                    'cashier',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La cola está aquí',
                                'correct' => [
                                    'la',
                                    'cola',
                                    'está',
                                    'aquí',
                                ],
                                'extra' => [
                                    'cajero',
                                    'dinero',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Schlange ist hier',
                                'correct' => [
                                    'die',
                                    'Schlange',
                                    'ist',
                                    'hier',
                                ],
                                'extra' => [
                                    'Kassierer',
                                    'Geld',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La file est ici',
                                'correct' => [
                                    'la',
                                    'file',
                                    'est',
                                    'ici',
                                ],
                                'extra' => [
                                    'caissier',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '줄은 여기 있습니다',
                                'correct' => [
                                    '줄은',
                                    '여기',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '계산원',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'レジ係',
                            'と',
                            '私の',
                            'お金',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cashier and my money',
                                'correct' => [
                                    'the',
                                    'cashier',
                                    'and',
                                    'my',
                                    'money',
                                ],
                                'extra' => [
                                    'queue',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El cajero y mi dinero',
                                'correct' => [
                                    'el',
                                    'cajero',
                                    'y',
                                    'mi',
                                    'dinero',
                                ],
                                'extra' => [
                                    'cola',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kassierer und mein Geld',
                                'correct' => [
                                    'der',
                                    'Kassierer',
                                    'und',
                                    'mein',
                                    'Geld',
                                ],
                                'extra' => [
                                    'Schlange',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le caissier et mon argent',
                                'correct' => [
                                    'le',
                                    'caissier',
                                    'et',
                                    'mon',
                                    'argent',
                                ],
                                'extra' => [
                                    'file',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산원과 제 돈',
                                'correct' => [
                                    '계산원과',
                                    '제',
                                    '돈',
                                ],
                                'extra' => [
                                    '줄',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: カート・レジ', 2,
                pictures: [
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                    [
                        'ja' => 'レジ',
                        'img' => 'checkout',
                    ],
                ],
                plain: [
                    [
                        'ja' => '待つ',
                    ],
                    [
                        'ja' => '前に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'レジ',
                            'で',
                            '待つ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'wait at the checkout',
                                'correct' => [
                                    'wait',
                                    'at',
                                    'the',
                                    'checkout',
                                ],
                                'extra' => [
                                    'before',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Esperar en la caja',
                                'correct' => [
                                    'esperar',
                                    'en',
                                    'la',
                                    'caja',
                                ],
                                'extra' => [
                                    'delante',
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'An der Kasse warten',
                                'correct' => [
                                    'an',
                                    'der',
                                    'Kasse',
                                    'warten',
                                ],
                                'extra' => [
                                    'vorne',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Attendre à la caisse',
                                'correct' => [
                                    'attendre',
                                    'à',
                                    'la',
                                    'caisse',
                                ],
                                'extra' => [
                                    'devant',
                                    'chariot',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산대에서 기다리다',
                                'correct' => [
                                    '계산대에서',
                                    '기다리다',
                                ],
                                'extra' => [
                                    '앞에',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'カート',
                            'は',
                            '前に',
                            'あります',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the trolley is in front',
                                'correct' => [
                                    'the',
                                    'trolley',
                                    'is',
                                    'in front',
                                ],
                                'extra' => [
                                    'wait',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El carrito está delante',
                                'correct' => [
                                    'el',
                                    'carrito',
                                    'está',
                                    'delante',
                                ],
                                'extra' => [
                                    'esperar',
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Einkaufswagen ist vorne',
                                'correct' => [
                                    'der',
                                    'Einkaufswagen',
                                    'ist',
                                    'vorne',
                                ],
                                'extra' => [
                                    'warten',
                                    'Kasse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chariot est devant',
                                'correct' => [
                                    'le',
                                    'chariot',
                                    'est',
                                    'devant',
                                ],
                                'extra' => [
                                    'attendre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트는 앞에 있습니다',
                                'correct' => [
                                    '카트는',
                                    '앞에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '기다리다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'レジ',
                            'の',
                            '前',
                            'で',
                            '待つ',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'wait in front of the checkout',
                                'correct' => [
                                    'wait',
                                    'in front',
                                    'of',
                                    'the',
                                    'checkout',
                                ],
                                'extra' => [
                                    'trolley',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Esperar delante de la caja',
                                'correct' => [
                                    'esperar',
                                    'delante',
                                    'de',
                                    'la',
                                    'caja',
                                ],
                                'extra' => [
                                    'carrito',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Vor der Kasse warten',
                                'correct' => [
                                    'warten',
                                    'vorne',
                                    'von',
                                    'der',
                                    'Kasse',
                                ],
                                'extra' => [
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Attendre devant la caisse',
                                'correct' => [
                                    'attendre',
                                    'devant',
                                    'de',
                                    'la',
                                    'caisse',
                                ],
                                'extra' => [
                                    'chariot',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산대 앞에서 기다리다',
                                'correct' => [
                                    '계산대',
                                    '앞에서',
                                    '기다리다',
                                ],
                                'extra' => [
                                    '카트',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: お金・かご', 3,
                pictures: [
                    [
                        'ja' => 'お金',
                        'img' => 'money',
                    ],
                    [
                        'ja' => 'かご',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'ja' => '現金で',
                    ],
                    [
                        'ja' => 'カード',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'お金',
                            'で',
                            '払います',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I pay with money',
                                'correct' => [
                                    'I pay',
                                    'with',
                                    'money',
                                ],
                                'extra' => [
                                    'card',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pago con dinero',
                                'correct' => [
                                    'pago',
                                    'con',
                                    'dinero',
                                ],
                                'extra' => [
                                    'tarjeta',
                                    'en efectivo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bezahle mit Geld',
                                'correct' => [
                                    'ich bezahle',
                                    'mit',
                                    'Geld',
                                ],
                                'extra' => [
                                    'Karte',
                                    'in bar',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je paie avec de l\'argent',
                                'correct' => [
                                    'je paie',
                                    'avec',
                                    'argent',
                                ],
                                'extra' => [
                                    'carte',
                                    'en espèces',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '돈으로 냅니다',
                                'correct' => [
                                    '돈으로',
                                    '냅니다',
                                ],
                                'extra' => [
                                    '카드',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'カード',
                            'で',
                            '払う',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay with the card',
                                'correct' => [
                                    'to pay',
                                    'with',
                                    'the',
                                    'card',
                                ],
                                'extra' => [
                                    'cash',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pagar con la tarjeta',
                                'correct' => [
                                    'pagar',
                                    'con',
                                    'la',
                                    'tarjeta',
                                ],
                                'extra' => [
                                    'en efectivo',
                                    'cesta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mit der Karte bezahlen',
                                'correct' => [
                                    'mit',
                                    'der',
                                    'Karte',
                                    'bezahlen',
                                ],
                                'extra' => [
                                    'in bar',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer avec la carte',
                                'correct' => [
                                    'payer',
                                    'avec',
                                    'la',
                                    'carte',
                                ],
                                'extra' => [
                                    'en espèces',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카드로 지불하다',
                                'correct' => [
                                    '카드로',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '현금으로',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'かご',
                            'を',
                            '現金で',
                            '払う',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay the basket in cash',
                                'correct' => [
                                    'to pay',
                                    'the',
                                    'basket',
                                    'in',
                                    'cash',
                                ],
                                'extra' => [
                                    'card',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pagar la cesta en efectivo',
                                'correct' => [
                                    'pagar',
                                    'la',
                                    'cesta',
                                    'en',
                                    'en efectivo',
                                ],
                                'extra' => [
                                    'tarjeta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Den Korb in bar bezahlen',
                                'correct' => [
                                    'bezahlen',
                                    'den',
                                    'Korb',
                                    'in',
                                    'in bar',
                                ],
                                'extra' => [
                                    'Karte',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer le panier en espèces',
                                'correct' => [
                                    'payer',
                                    'le',
                                    'panier',
                                    'dans',
                                    'en espèces',
                                ],
                                'extra' => [
                                    'carte',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바구니를 현금으로 지불하다',
                                'correct' => [
                                    '바구니를',
                                    '현금으로',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '카드',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: リスト・箱', 4,
                pictures: [
                    [
                        'ja' => 'リスト',
                        'img' => 'list',
                    ],
                    [
                        'ja' => '箱',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'レシート',
                    ],
                    [
                        'ja' => 'おつり',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'レシート',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the receipt please',
                                'correct' => [
                                    'the',
                                    'receipt',
                                    'please',
                                ],
                                'extra' => [
                                    'change',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El recibo, por favor',
                                'correct' => [
                                    'el',
                                    'recibo',
                                    'por favor',
                                ],
                                'extra' => [
                                    'cambio',
                                    'lista',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Quittung, bitte',
                                'correct' => [
                                    'die',
                                    'Quittung',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Wechselgeld',
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le reçu, s\'il vous plaît',
                                'correct' => [
                                    'le',
                                    'reçu',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'monnaie',
                                    'liste',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '영수증 부탁합니다',
                                'correct' => [
                                    '영수증',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '거스름돈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'おつり',
                            'と',
                            'レシート',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the change and the receipt',
                                'correct' => [
                                    'the',
                                    'change',
                                    'and',
                                    'the',
                                    'receipt',
                                ],
                                'extra' => [
                                    'list',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El cambio y el recibo',
                                'correct' => [
                                    'el',
                                    'cambio',
                                    'y',
                                    'el',
                                    'recibo',
                                ],
                                'extra' => [
                                    'lista',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Wechselgeld und die Quittung',
                                'correct' => [
                                    'das',
                                    'Wechselgeld',
                                    'und',
                                    'die',
                                    'Quittung',
                                ],
                                'extra' => [
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La monnaie et le reçu',
                                'correct' => [
                                    'la',
                                    'monnaie',
                                    'et',
                                    'le',
                                    'reçu',
                                ],
                                'extra' => [
                                    'liste',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거스름돈과 영수증',
                                'correct' => [
                                    '거스름돈과',
                                    '영수증',
                                ],
                                'extra' => [
                                    '목록',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '箱',
                            'の',
                            '中',
                            'の',
                            'リスト',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the list in the box',
                                'correct' => [
                                    'the',
                                    'list',
                                    'in',
                                    'the',
                                    'box',
                                ],
                                'extra' => [
                                    'receipt',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La lista en la caja',
                                'correct' => [
                                    'la',
                                    'lista',
                                    'en',
                                    'la',
                                    'caja',
                                ],
                                'extra' => [
                                    'recibo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Liste in der Schachtel',
                                'correct' => [
                                    'die',
                                    'Liste',
                                    'in',
                                    'der',
                                    'Schachtel',
                                ],
                                'extra' => [
                                    'Quittung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La liste dans la boîte',
                                'correct' => [
                                    'la',
                                    'liste',
                                    'dans',
                                    'la',
                                    'boîte',
                                ],
                                'extra' => [
                                    'reçu',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '상자 안의 목록',
                                'correct' => [
                                    '상자',
                                    '안의',
                                    '목록',
                                ],
                                'extra' => [
                                    '영수증',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: パン・卵', 5,
                pictures: [
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                    [
                        'ja' => '卵',
                        'img' => 'egg',
                    ],
                ],
                plain: [
                    [
                        'ja' => '袋',
                    ],
                    [
                        'ja' => '入れる',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'パン',
                            'を',
                            '袋',
                            'に',
                            '入れる',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put the bread in the bag',
                                'correct' => [
                                    'to put',
                                    'the',
                                    'bread',
                                    'in',
                                    'the',
                                    'bag',
                                ],
                                'extra' => [
                                    'egg',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Poner el pan en la bolsa',
                                'correct' => [
                                    'poner',
                                    'el',
                                    'pan',
                                    'en',
                                    'la',
                                    'bolsa',
                                ],
                                'extra' => [
                                    'huevo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Brot in die Tüte legen',
                                'correct' => [
                                    'das',
                                    'Brot',
                                    'in',
                                    'die',
                                    'Tüte',
                                    'legen',
                                ],
                                'extra' => [
                                    'Ei',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre le pain dans le sac',
                                'correct' => [
                                    'mettre',
                                    'le',
                                    'pain',
                                    'dans',
                                    'le',
                                    'sac',
                                ],
                                'extra' => [
                                    'œuf',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵을 봉투에 넣다',
                                'correct' => [
                                    '빵을',
                                    '봉투에',
                                    '넣다',
                                ],
                                'extra' => [
                                    '계란',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '袋',
                            'の',
                            '中',
                            'の',
                            '卵',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an egg in a bag',
                                'correct' => [
                                    'an',
                                    'egg',
                                    'in',
                                    'a',
                                    'bag',
                                ],
                                'extra' => [
                                    'to put',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un huevo en una bolsa',
                                'correct' => [
                                    'un',
                                    'huevo',
                                    'en',
                                    'una',
                                    'bolsa',
                                ],
                                'extra' => [
                                    'poner',
                                    'pan',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Ei in einer Tüte',
                                'correct' => [
                                    'ein',
                                    'Ei',
                                    'in',
                                    'einer',
                                    'Tüte',
                                ],
                                'extra' => [
                                    'legen',
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un œuf dans un sac',
                                'correct' => [
                                    'un',
                                    'œuf',
                                    'dans',
                                    'un',
                                    'sac',
                                ],
                                'extra' => [
                                    'mettre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '봉투 안의 계란',
                                'correct' => [
                                    '봉투',
                                    '안의',
                                    '계란',
                                ],
                                'extra' => [
                                    '넣다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'パン',
                            'を',
                            '袋',
                            'に',
                            '入れる',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put bread in the bag',
                                'correct' => [
                                    'to put',
                                    'bread',
                                    'in',
                                    'the',
                                    'bag',
                                ],
                                'extra' => [
                                    'egg',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Poner pan en la bolsa',
                                'correct' => [
                                    'poner',
                                    'pan',
                                    'en',
                                    'la',
                                    'bolsa',
                                ],
                                'extra' => [
                                    'huevo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Brot in die Tüte legen',
                                'correct' => [
                                    'Brot',
                                    'in',
                                    'die',
                                    'Tüte',
                                    'legen',
                                ],
                                'extra' => [
                                    'Ei',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre du pain dans le sac',
                                'correct' => [
                                    'mettre',
                                    'pain',
                                    'dans',
                                    'le',
                                    'sac',
                                ],
                                'extra' => [
                                    'œuf',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵을 봉투에 넣다',
                                'correct' => [
                                    '빵을',
                                    '봉투에',
                                    '넣다',
                                ],
                                'extra' => [
                                    '계란',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
