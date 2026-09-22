<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket08Seeder extends Seeder
{
    private const PICTURES = [
        'caja' => 'box',
        'dinero' => 'money',
        'carrito' => 'cart',
        'cesta' => 'basket',
        'lista' => 'list',
        'pan' => 'bread',
        'huevo' => 'egg',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 8, the Spanish twin of the
     * English "Unit 8: At the Checkout" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unidad 8: En la caja', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Caja y Dinero', 1,
                pictures: [
                    [
                        'es' => 'caja',
                        'img' => 'checkout',
                    ],
                    [
                        'es' => 'dinero',
                        'img' => 'money',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cajero',
                    ],
                    [
                        'es' => 'cola',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'cajero',
                            'está',
                            'en',
                            'la',
                            'caja',
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
                            'La',
                            'cola',
                            'está',
                            'aquí',
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
                            'El',
                            'cajero',
                            'y',
                            'mi',
                            'dinero',
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
            $builder->lesson('Lección 2: Carrito y Caja', 2,
                pictures: [
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                    [
                        'es' => 'caja',
                        'img' => 'checkout',
                    ],
                ],
                plain: [
                    [
                        'es' => 'esperar',
                    ],
                    [
                        'es' => 'delante',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Esperar',
                            'en',
                            'la',
                            'caja',
                        ],
                        'blank' => 0,
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
                            'El',
                            'carrito',
                            'está',
                            'delante',
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
                            'Esperar',
                            'delante',
                            'de',
                            'la',
                            'caja',
                        ],
                        'blank' => 0,
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
            $builder->lesson('Lección 3: Dinero y Cesta', 3,
                pictures: [
                    [
                        'es' => 'dinero',
                        'img' => 'money',
                    ],
                    [
                        'es' => 'cesta',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'es' => 'en efectivo',
                    ],
                    [
                        'es' => 'tarjeta',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Pago',
                            'con',
                            'dinero',
                        ],
                        'blank' => 2,
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
                            'Pagar',
                            'con',
                            'la',
                            'tarjeta',
                        ],
                        'blank' => 3,
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
                            'Pagar',
                            'la',
                            'cesta',
                            'en',
                            'efectivo',
                        ],
                        'blank' => 2,
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
            $builder->lesson('Lección 4: Lista y Caja', 4,
                pictures: [
                    [
                        'es' => 'lista',
                        'img' => 'list',
                    ],
                    [
                        'es' => 'caja',
                        'img' => 'box',
                    ],
                ],
                plain: [
                    [
                        'es' => 'recibo',
                    ],
                    [
                        'es' => 'cambio',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'recibo',
                            'por',
                            'favor',
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
                            'El',
                            'cambio',
                            'y',
                            'el',
                            'recibo',
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
                            'La',
                            'lista',
                            'en',
                            'la',
                            'caja',
                        ],
                        'blank' => 1,
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
            $builder->lesson('Lección 5: Pan y Huevo', 5,
                pictures: [
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                    [
                        'es' => 'huevo',
                        'img' => 'egg',
                    ],
                ],
                plain: [
                    [
                        'es' => 'bolsa',
                    ],
                    [
                        'es' => 'poner',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Poner',
                            'el',
                            'pan',
                            'en',
                            'la',
                            'bolsa',
                        ],
                        'blank' => 0,
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
                            'Un',
                            'huevo',
                            'en',
                            'una',
                            'bolsa',
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
                            'Poner',
                            'pan',
                            'en',
                            'la',
                            'bolsa',
                        ],
                        'blank' => 0,
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
