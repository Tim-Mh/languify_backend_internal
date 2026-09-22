<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket08Seeder extends Seeder
{
    private const PICTURES = [
        'Kasse' => 'checkout',
        'Geld' => 'money',
        'Einkaufswagen' => 'cart',
        'Korb' => 'basket',
        'Liste' => 'list',
        'Schachtel' => 'box',
        'Brot' => 'bread',
        'Ei' => 'egg',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 8, the German twin of the
     * English "Unit 8: At the Checkout" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Einheit 8: An der Kasse', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Kasse & Geld', 1,
                pictures: [
                    [
                        'de' => 'Kasse',
                        'img' => 'checkout',
                    ],
                    [
                        'de' => 'Geld',
                        'img' => 'money',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Kassierer',
                    ],
                    [
                        'de' => 'Schlange',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Kassierer',
                            'ist',
                            'an',
                            'der',
                            'Kasse',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'kassir yanında kassa', 'correct' => ['kassir', 'yanında', 'kassa'], 'extra' => ['növbə']],
                            'ar' => ['sentence' => 'أمين الصندوق على صندوق الدفع', 'correct' => ['أمين الصندوق', 'على', 'صندوق الدفع'], 'extra' => ['طابور']],
                            'ru' => ['sentence' => 'кассир на касса', 'correct' => ['кассир', 'на', 'касса'], 'extra' => ['очередь']],
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
                            'ja' => [
                                'sentence' => 'レジ係はレジにいます',
                                'correct' => [
                                    'レジ係',
                                    'は',
                                    'レジ',
                                    'に',
                                    'います',
                                ],
                                'extra' => [
                                    '列',
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
                            'tr' => ['sentence' => 'kasiyer kasada', 'correct' => ['kasiyer', 'kasada'], 'extra' => ['sıra']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Die',
                            'Schlange',
                            'ist',
                            'hier',
                        ],
                        'blank' => 1,
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
                                    'money',
                                ],
                            ],
                            'az' => ['sentence' => 'növbə burada', 'correct' => ['növbə', 'burada'], 'extra' => ['kassir', 'pul']],
                            'ar' => ['sentence' => 'طابور هنا', 'correct' => ['طابور', 'هنا'], 'extra' => ['أمين الصندوق', 'نقود']],
                            'ru' => ['sentence' => 'очередь здесь', 'correct' => ['очередь', 'здесь'], 'extra' => ['кассир', 'деньги']],
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
                            'ja' => [
                                'sentence' => '列はここです',
                                'correct' => [
                                    '列',
                                    'は',
                                    'ここ',
                                    'です',
                                ],
                                'extra' => [
                                    'レジ係',
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
                            'tr' => ['sentence' => 'sıra burada', 'correct' => ['sıra', 'burada'], 'extra' => ['kasiyer', 'para']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'Kassierer',
                            'und',
                            'mein',
                            'Geld',
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
                            'az' => ['sentence' => 'kassir və mənim pul', 'correct' => ['kassir', 'və', 'mənim', 'pul'], 'extra' => ['növbə']],
                            'ar' => ['sentence' => 'أمين الصندوق و نقود', 'correct' => ['أمين الصندوق', 'و', 'نقود'], 'extra' => ['طابور']],
                            'ru' => ['sentence' => 'кассир и мой деньги', 'correct' => ['кассир', 'и', 'мой', 'деньги'], 'extra' => ['очередь']],
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
                            'ja' => [
                                'sentence' => 'レジ係と私のお金',
                                'correct' => [
                                    'レジ係',
                                    'と',
                                    '私の',
                                    'お金',
                                ],
                                'extra' => [
                                    '列',
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
                            'tr' => ['sentence' => 'kasiyer ve param', 'correct' => ['kasiyer', 've', 'param'], 'extra' => ['sıra']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Einkaufswagen & Kasse', 2,
                pictures: [
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                    [
                        'de' => 'Kasse',
                        'img' => 'checkout',
                    ],
                ],
                plain: [
                    [
                        'de' => 'warten',
                    ],
                    [
                        'de' => 'vorne',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'An',
                            'der',
                            'Kasse',
                            'warten',
                        ],
                        'blank' => 3,
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
                                    'in front',
                                    'trolley',
                                ],
                            ],
                            'az' => ['sentence' => 'gözlə yanında kassa', 'correct' => ['gözlə', 'yanında', 'kassa'], 'extra' => ['qarşıda', 'araba']],
                            'ar' => ['sentence' => 'انتظر على صندوق الدفع', 'correct' => ['انتظر', 'على', 'صندوق الدفع'], 'extra' => ['أمام', 'عربة']],
                            'ru' => ['sentence' => 'подожди на касса', 'correct' => ['подожди', 'на', 'касса'], 'extra' => ['впереди', 'тележка']],
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
                            'ja' => [
                                'sentence' => 'レジで待つ',
                                'correct' => [
                                    'レジ',
                                    'で',
                                    '待つ',
                                ],
                                'extra' => [
                                    '前に',
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
                            'tr' => ['sentence' => 'kasada bekle', 'correct' => ['kasada', 'bekle'], 'extra' => ['önde', 'araba']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Einkaufswagen',
                            'ist',
                            'vorne',
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
                                    'checkout',
                                ],
                            ],
                            'az' => ['sentence' => 'araba qarşıda', 'correct' => ['araba', 'qarşıda'], 'extra' => ['gözlə', 'kassa']],
                            'ar' => ['sentence' => 'عربة أمام', 'correct' => ['عربة', 'أمام'], 'extra' => ['انتظر', 'صندوق الدفع']],
                            'ru' => ['sentence' => 'тележка впереди', 'correct' => ['тележка', 'впереди'], 'extra' => ['подожди', 'касса']],
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
                            'ja' => [
                                'sentence' => 'カートは前にあります',
                                'correct' => [
                                    'カート',
                                    'は',
                                    '前に',
                                    'あります',
                                ],
                                'extra' => [
                                    '待つ',
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
                            'tr' => ['sentence' => 'araba önde', 'correct' => ['araba', 'önde'], 'extra' => ['bekle', 'kasa']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Vor',
                            'der',
                            'Kasse',
                            'warten',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'gözlə qarşıda kassa', 'correct' => ['gözlə', 'qarşıda', 'kassa'], 'extra' => ['araba']],
                            'ar' => ['sentence' => 'انتظر أمام صندوق الدفع', 'correct' => ['انتظر', 'أمام', 'صندوق الدفع'], 'extra' => ['عربة']],
                            'ru' => ['sentence' => 'подожди впереди касса', 'correct' => ['подожди', 'впереди', 'касса'], 'extra' => ['тележка']],
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
                            'ja' => [
                                'sentence' => 'レジの前で待つ',
                                'correct' => [
                                    'レジ',
                                    'の',
                                    '前',
                                    'で',
                                    '待つ',
                                ],
                                'extra' => [
                                    'カート',
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
                            'tr' => ['sentence' => 'kasanın önünde bekle', 'correct' => ['kasanın', 'önünde', 'bekle'], 'extra' => ['araba']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Geld & Korb', 3,
                pictures: [
                    [
                        'de' => 'Geld',
                        'img' => 'money',
                    ],
                    [
                        'de' => 'Korb',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'de' => 'in bar',
                    ],
                    [
                        'de' => 'Karte',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bezahle',
                            'mit',
                            'Geld',
                        ],
                        'blank' => 3,
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
                                    'cash',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəyirəm ilə pul', 'correct' => ['ödəyirəm', 'ilə', 'pul'], 'extra' => ['kart', 'nağd']],
                            'ar' => ['sentence' => 'أدفع مع نقود', 'correct' => ['أدفع', 'مع', 'نقود'], 'extra' => ['بطاقة', 'كاش']],
                            'ru' => ['sentence' => 'я плачу с деньги', 'correct' => ['я плачу', 'с', 'деньги'], 'extra' => ['карта', 'наличные']],
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
                            'ja' => [
                                'sentence' => 'お金で払います',
                                'correct' => [
                                    'お金',
                                    'で',
                                    '払います',
                                ],
                                'extra' => [
                                    'カード',
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
                            'tr' => ['sentence' => 'parayla ödüyorum', 'correct' => ['parayla', 'ödüyorum'], 'extra' => ['kart', 'nakit']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mit',
                            'der',
                            'Karte',
                            'bezahlen',
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
                                    'basket',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək ilə kart', 'correct' => ['ödəmək', 'ilə', 'kart'], 'extra' => ['nağd', 'səbət']],
                            'ar' => ['sentence' => 'الدفع مع بطاقة', 'correct' => ['الدفع', 'مع', 'بطاقة'], 'extra' => ['كاش', 'سلة']],
                            'ru' => ['sentence' => 'платить с карта', 'correct' => ['платить', 'с', 'карта'], 'extra' => ['наличные', 'корзина']],
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
                            'ja' => [
                                'sentence' => 'カードで払う',
                                'correct' => [
                                    'カード',
                                    'で',
                                    '払う',
                                ],
                                'extra' => [
                                    '現金で',
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
                            'tr' => ['sentence' => 'kartla ödemek', 'correct' => ['kartla', 'ödemek'], 'extra' => ['nakit', 'sepet']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Den',
                            'Korb',
                            'in',
                            'bar',
                            'bezahlen',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'ödəmək səbət içində nağd', 'correct' => ['ödəmək', 'səbət', 'içində', 'nağd'], 'extra' => ['kart']],
                            'ar' => ['sentence' => 'الدفع سلة في كاش', 'correct' => ['الدفع', 'سلة', 'في', 'كاش'], 'extra' => ['بطاقة']],
                            'ru' => ['sentence' => 'платить корзина в наличные', 'correct' => ['платить', 'корзина', 'в', 'наличные'], 'extra' => ['карта']],
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
                            'ja' => [
                                'sentence' => 'かごを現金で払う',
                                'correct' => [
                                    'かご',
                                    'を',
                                    '現金で',
                                    '払う',
                                ],
                                'extra' => [
                                    'カード',
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
                            'tr' => ['sentence' => 'sepeti nakit ödemek', 'correct' => ['sepeti', 'nakit', 'ödemek'], 'extra' => ['kart']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Liste & Schachtel', 4,
                pictures: [
                    [
                        'de' => 'Liste',
                        'img' => 'list',
                    ],
                    [
                        'de' => 'Schachtel',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Quittung',
                    ],
                    [
                        'de' => 'Wechselgeld',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Quittung',
                            'bitte',
                        ],
                        'blank' => 1,
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
                                    'list',
                                ],
                            ],
                            'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => ['qalıq', 'siyahı']],
                            'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => ['الباقي', 'قائمة']],
                            'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => ['сдача', 'список']],
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
                            'ja' => [
                                'sentence' => 'レシートをお願いします',
                                'correct' => [
                                    'レシート',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    'おつり',
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
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => ['para üstü', 'liste']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Das',
                            'Wechselgeld',
                            'und',
                            'die',
                            'Quittung',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'qalıq və qəbz', 'correct' => ['qalıq', 'və', 'qəbz'], 'extra' => ['siyahı']],
                            'ar' => ['sentence' => 'الباقي و إيصال', 'correct' => ['الباقي', 'و', 'إيصال'], 'extra' => ['قائمة']],
                            'ru' => ['sentence' => 'сдача и чек', 'correct' => ['сдача', 'и', 'чек'], 'extra' => ['список']],
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
                            'ja' => [
                                'sentence' => 'おつりとレシート',
                                'correct' => [
                                    'おつり',
                                    'と',
                                    'レシート',
                                ],
                                'extra' => [
                                    'リスト',
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
                            'tr' => ['sentence' => 'para üstü ve fiş', 'correct' => ['para', 'üstü', 've', 'fiş'], 'extra' => ['liste']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Liste',
                            'in',
                            'der',
                            'Schachtel',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'siyahı içində qutu', 'correct' => ['siyahı', 'içində', 'qutu'], 'extra' => ['qəbz']],
                            'ar' => ['sentence' => 'قائمة في علبة', 'correct' => ['قائمة', 'في', 'علبة'], 'extra' => ['إيصال']],
                            'ru' => ['sentence' => 'список в коробка', 'correct' => ['список', 'в', 'коробка'], 'extra' => ['чек']],
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
                            'ja' => [
                                'sentence' => '箱の中のリスト',
                                'correct' => [
                                    '箱',
                                    'の',
                                    '中',
                                    'の',
                                    'リスト',
                                ],
                                'extra' => [
                                    'レシート',
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
                            'tr' => ['sentence' => 'kutudaki liste', 'correct' => ['kutudaki', 'liste'], 'extra' => ['fiş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Brot & Ei', 5,
                pictures: [
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                    [
                        'de' => 'Ei',
                        'img' => 'egg',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Tüte',
                    ],
                    [
                        'de' => 'legen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Brot',
                            'in',
                            'die',
                            'Tüte',
                            'legen',
                        ],
                        'blank' => 5,
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
                            'az' => ['sentence' => 'qoymaq çörək içində torba', 'correct' => ['qoymaq', 'çörək', 'içində', 'torba'], 'extra' => ['yumurta']],
                            'ar' => ['sentence' => 'وضع خبز في كيس', 'correct' => ['وضع', 'خبز', 'في', 'كيس'], 'extra' => ['بيضة']],
                            'ru' => ['sentence' => 'положить хлеб в пакет', 'correct' => ['положить', 'хлеб', 'в', 'пакет'], 'extra' => ['яйцо']],
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
                            'ja' => [
                                'sentence' => 'パンを袋に入れる',
                                'correct' => [
                                    'パン',
                                    'を',
                                    '袋',
                                    'に',
                                    '入れる',
                                ],
                                'extra' => [
                                    '卵',
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
                            'tr' => ['sentence' => 'ekmeği poşete koymak', 'correct' => ['ekmeği', 'poşete', 'koymak'], 'extra' => ['yumurta']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'Ei',
                            'in',
                            'einer',
                            'Tüte',
                        ],
                        'blank' => 4,
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
                                    'bread',
                                ],
                            ],
                            'az' => ['sentence' => 'bir yumurta içində bir torba', 'correct' => ['bir', 'yumurta', 'içində', 'bir', 'torba'], 'extra' => ['qoymaq', 'çörək']],
                            'ar' => ['sentence' => 'بيضة في كيس', 'correct' => ['بيضة', 'في', 'كيس'], 'extra' => ['وضع', 'خبز']],
                            'ru' => ['sentence' => 'яйцо в пакет', 'correct' => ['яйцо', 'в', 'пакет'], 'extra' => ['положить', 'хлеб']],
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
                            'ja' => [
                                'sentence' => '袋の中の卵',
                                'correct' => [
                                    '袋',
                                    'の',
                                    '中',
                                    'の',
                                    '卵',
                                ],
                                'extra' => [
                                    '入れる',
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
                            'tr' => ['sentence' => 'poşette bir yumurta', 'correct' => ['poşette', 'bir', 'yumurta'], 'extra' => ['koymak', 'ekmek']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Brot',
                            'in',
                            'die',
                            'Tüte',
                            'legen',
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
                            'az' => ['sentence' => 'qoymaq çörək içində torba', 'correct' => ['qoymaq', 'çörək', 'içində', 'torba'], 'extra' => ['yumurta']],
                            'ar' => ['sentence' => 'وضع خبز في كيس', 'correct' => ['وضع', 'خبز', 'في', 'كيس'], 'extra' => ['بيضة']],
                            'ru' => ['sentence' => 'положить хлеб в пакет', 'correct' => ['положить', 'хлеб', 'в', 'пакет'], 'extra' => ['яйцо']],
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
                            'ja' => [
                                'sentence' => 'パンを袋に入れる',
                                'correct' => [
                                    'パン',
                                    'を',
                                    '袋',
                                    'に',
                                    '入れる',
                                ],
                                'extra' => [
                                    '卵',
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
                            'tr' => ['sentence' => 'poşete ekmek koymak', 'correct' => ['poşete', 'ekmek', 'koymak'], 'extra' => ['yumurta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
