<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant10Seeder extends Seeder
{
    private const PICTURES = [
        'サンドイッチ' => 'sandwich',
        'フライドポテト' => 'fries',
        'ハンバーガー' => 'burger',
        'ジュース' => 'juice',
        'コーヒー' => 'coffee',
        'アイスクリーム' => 'icecream',
        'サラダ' => 'salad',
        'パン' => 'bread',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 10, the Japanese twin of the
     * English "Unit 10: Fast Food and Takeaway" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'ユニット10: ファストフードと持ち帰り', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: サンドイッチ・フライドポテト', 1,
                pictures: [
                    [
                        'ja' => 'サンドイッチ',
                        'img' => 'sandwich',
                    ],
                    [
                        'ja' => 'フライドポテト',
                        'img' => 'fries',
                    ],
                ],
                plain: [
                    [
                        'ja' => '持ち帰り',
                    ],
                    [
                        'ja' => '店内で',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '持ち帰り',
                            'の',
                            'サンドイッチ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a sandwich takeaway',
                                'correct' => [
                                    'a',
                                    'sandwich',
                                    'takeaway',
                                ],
                                'extra' => [
                                    'eat in',
                                ],
                            ],
                            'az' => ['sentence' => 'bir sendviç özümlə', 'correct' => ['bir', 'sendviç', 'özümlə'], 'extra' => ['yeyirəm', 'içində']],
                            'ar' => ['sentence' => 'شطيرة للخارج', 'correct' => ['شطيرة', 'للخارج'], 'extra' => ['آكل', 'في']],
                            'ru' => ['sentence' => 'сэндвич с собой', 'correct' => ['сэндвич', 'с собой'], 'extra' => ['ем', 'в']],
                            'es' => [
                                'sentence' => 'Un sándwich para llevar',
                                'correct' => [
                                    'un',
                                    'sándwich',
                                    'para llevar',
                                ],
                                'extra' => [
                                    'para tomar aquí',
                                    'patatas fritas',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Sandwich zum Mitnehmen',
                                'correct' => [
                                    'ein',
                                    'Sandwich',
                                    'zum Mitnehmen',
                                ],
                                'extra' => [
                                    'zum Hieressen',
                                    'Pommes',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un sandwich à emporter',
                                'correct' => [
                                    'un',
                                    'sandwich',
                                    'à emporter',
                                ],
                                'extra' => [
                                    'sur place',
                                    'frites',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '포장 샌드위치',
                                'correct' => [
                                    '포장',
                                    '샌드위치',
                                ],
                                'extra' => [
                                    '매장에서',
                                ],
                            ],
                            'tr' => ['sentence' => 'paket bir sandviç', 'correct' => ['paket', 'bir', 'sandviç'], 'extra' => ['burada ye']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '店内で',
                            'フライドポテト',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'fries eat in',
                                'correct' => [
                                    'fries',
                                    'eat in',
                                ],
                                'extra' => [
                                    'takeaway',
                                ],
                            ],
                            'az' => ['sentence' => 'kartof fri yeyirəm içində', 'correct' => ['kartof fri', 'yeyirəm', 'içində'], 'extra' => ['özümlə']],
                            'ar' => ['sentence' => 'بطاطا مقلية آكل في', 'correct' => ['بطاطا مقلية', 'آكل', 'في'], 'extra' => ['للخارج']],
                            'ru' => ['sentence' => 'картошка фри ем в', 'correct' => ['картошка фри', 'ем', 'в'], 'extra' => ['с собой']],
                            'es' => [
                                'sentence' => 'Patatas fritas para tomar aquí',
                                'correct' => [
                                    'patatas fritas',
                                    'para tomar aquí',
                                ],
                                'extra' => [
                                    'para llevar',
                                    'sándwich',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Pommes zum Hieressen',
                                'correct' => [
                                    'Pommes',
                                    'zum Hieressen',
                                ],
                                'extra' => [
                                    'zum Mitnehmen',
                                    'Sandwich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Des frites sur place',
                                'correct' => [
                                    'frites',
                                    'sur place',
                                ],
                                'extra' => [
                                    'à emporter',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '매장에서 감자튀김',
                                'correct' => [
                                    '매장에서',
                                    '감자튀김',
                                ],
                                'extra' => [
                                    '포장',
                                ],
                            ],
                            'tr' => ['sentence' => 'burada patates kızartması', 'correct' => ['burada', 'patates', 'kızartması'], 'extra' => ['paket']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '持ち帰り',
                            'の',
                            'サンドイッチ',
                            'と',
                            'フライドポテト',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a sandwich and fries takeaway',
                                'correct' => [
                                    'a',
                                    'sandwich',
                                    'and',
                                    'fries',
                                    'takeaway',
                                ],
                                'extra' => [
                                    'eat in',
                                ],
                            ],
                            'az' => ['sentence' => 'bir sendviç və kartof fri özümlə', 'correct' => ['bir', 'sendviç', 'və', 'kartof fri', 'özümlə'], 'extra' => ['yeyirəm', 'içində']],
                            'ar' => ['sentence' => 'شطيرة و بطاطا مقلية للخارج', 'correct' => ['شطيرة', 'و', 'بطاطا مقلية', 'للخارج'], 'extra' => ['آكل', 'في']],
                            'ru' => ['sentence' => 'сэндвич и картошка фри с собой', 'correct' => ['сэндвич', 'и', 'картошка фри', 'с собой'], 'extra' => ['ем', 'в']],
                            'es' => [
                                'sentence' => 'Un sándwich y patatas fritas para llevar',
                                'correct' => [
                                    'un',
                                    'sándwich',
                                    'y',
                                    'patatas fritas',
                                    'para llevar',
                                ],
                                'extra' => [
                                    'para tomar aquí',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Sandwich und Pommes zum Mitnehmen',
                                'correct' => [
                                    'ein',
                                    'Sandwich',
                                    'und',
                                    'Pommes',
                                    'zum Mitnehmen',
                                ],
                                'extra' => [
                                    'zum Hieressen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un sandwich et des frites à emporter',
                                'correct' => [
                                    'un',
                                    'sandwich',
                                    'et',
                                    'frites',
                                    'à emporter',
                                ],
                                'extra' => [
                                    'sur place',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '샌드위치와 감자튀김 포장',
                                'correct' => [
                                    '샌드위치와',
                                    '감자튀김',
                                    '포장',
                                ],
                                'extra' => [
                                    '매장에서',
                                ],
                            ],
                            'tr' => ['sentence' => 'paket bir sandviç ve patates kızartması', 'correct' => ['paket', 'bir', 'sandviç', 've', 'patates', 'kızartması'], 'extra' => ['burada ye']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: ハンバーガー・フライドポテト', 2,
                pictures: [
                    [
                        'ja' => 'ハンバーガー',
                        'img' => 'burger',
                    ],
                    [
                        'ja' => 'フライドポテト',
                        'img' => 'fries',
                    ],
                ],
                plain: [
                    [
                        'ja' => '速い',
                    ],
                    [
                        'ja' => '袋',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'フライドポテト',
                            '付き',
                            'ハンバーガー',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a burger with fries',
                                'correct' => [
                                    'a',
                                    'burger',
                                    'with',
                                    'fries',
                                ],
                                'extra' => [
                                    'fast',
                                ],
                            ],
                            'az' => ['sentence' => 'bir burger ilə kartof fri', 'correct' => ['bir', 'burger', 'ilə', 'kartof fri'], 'extra' => ['sürətli']],
                            'ar' => ['sentence' => 'برجر مع بطاطا مقلية', 'correct' => ['برجر', 'مع', 'بطاطا مقلية'], 'extra' => ['بسرعة']],
                            'ru' => ['sentence' => 'бургер с картошка фри', 'correct' => ['бургер', 'с', 'картошка фри'], 'extra' => ['быстро']],
                            'es' => [
                                'sentence' => 'Una hamburguesa con patatas fritas',
                                'correct' => [
                                    'una',
                                    'hamburguesa',
                                    'con',
                                    'patatas fritas',
                                ],
                                'extra' => [
                                    'rápido',
                                    'bolsa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Burger mit Pommes',
                                'correct' => [
                                    'ein',
                                    'Burger',
                                    'mit',
                                    'Pommes',
                                ],
                                'extra' => [
                                    'schnell',
                                    'Tüte',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un hamburger avec des frites',
                                'correct' => [
                                    'un',
                                    'hamburger',
                                    'avec',
                                    'frites',
                                ],
                                'extra' => [
                                    'rapide',
                                    'sac',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '감자튀김과 햄버거',
                                'correct' => [
                                    '감자튀김과',
                                    '햄버거',
                                ],
                                'extra' => [
                                    '빠른',
                                ],
                            ],
                            'tr' => ['sentence' => 'patates kızartmalı bir hamburger', 'correct' => ['patates', 'kızartmalı', 'bir', 'hamburger'], 'extra' => ['hızlı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '速い',
                            'ハンバーガー',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a fast burger',
                                'correct' => [
                                    'a',
                                    'fast',
                                    'burger',
                                ],
                                'extra' => [
                                    'bag',
                                ],
                            ],
                            'az' => ['sentence' => 'bir sürətli burger', 'correct' => ['bir', 'sürətli', 'burger'], 'extra' => ['torba']],
                            'ar' => ['sentence' => 'بسرعة برجر', 'correct' => ['بسرعة', 'برجر'], 'extra' => ['كيس']],
                            'ru' => ['sentence' => 'быстро бургер', 'correct' => ['быстро', 'бургер'], 'extra' => ['пакет']],
                            'es' => [
                                'sentence' => 'Una hamburguesa rápida',
                                'correct' => [
                                    'una',
                                    'rápido',
                                    'hamburguesa',
                                ],
                                'extra' => [
                                    'bolsa',
                                    'patatas fritas',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein schneller Burger',
                                'correct' => [
                                    'ein',
                                    'schnell',
                                    'Burger',
                                ],
                                'extra' => [
                                    'Tüte',
                                    'Pommes',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un hamburger rapide',
                                'correct' => [
                                    'un',
                                    'hamburger',
                                    'rapide',
                                ],
                                'extra' => [
                                    'sac',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빠른 햄버거',
                                'correct' => [
                                    '빠른',
                                    '햄버거',
                                ],
                                'extra' => [
                                    '봉투',
                                ],
                            ],
                            'tr' => ['sentence' => 'hızlı bir hamburger', 'correct' => ['hızlı', 'bir', 'hamburger'], 'extra' => ['poşet']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '袋',
                            'の',
                            '中',
                            'の',
                            'フライドポテト',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'fries in a bag',
                                'correct' => [
                                    'fries',
                                    'in',
                                    'a',
                                    'bag',
                                ],
                                'extra' => [
                                    'fast',
                                ],
                            ],
                            'az' => ['sentence' => 'kartof fri içində bir torba', 'correct' => ['kartof fri', 'içində', 'bir', 'torba'], 'extra' => ['sürətli']],
                            'ar' => ['sentence' => 'بطاطا مقلية في كيس', 'correct' => ['بطاطا مقلية', 'في', 'كيس'], 'extra' => ['بسرعة']],
                            'ru' => ['sentence' => 'картошка фри в пакет', 'correct' => ['картошка фри', 'в', 'пакет'], 'extra' => ['быстро']],
                            'es' => [
                                'sentence' => 'Patatas fritas en una bolsa',
                                'correct' => [
                                    'patatas fritas',
                                    'en',
                                    'una',
                                    'bolsa',
                                ],
                                'extra' => [
                                    'rápido',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Pommes in einer Tüte',
                                'correct' => [
                                    'Pommes',
                                    'in',
                                    'einer',
                                    'Tüte',
                                ],
                                'extra' => [
                                    'schnell',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Des frites dans un sac',
                                'correct' => [
                                    'frites',
                                    'dans',
                                    'un',
                                    'sac',
                                ],
                                'extra' => [
                                    'rapide',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '봉투 안의 감자튀김',
                                'correct' => [
                                    '봉투',
                                    '안의',
                                    '감자튀김',
                                ],
                                'extra' => [
                                    '빠른',
                                ],
                            ],
                            'tr' => ['sentence' => 'poşette patates kızartması', 'correct' => ['poşette', 'patates', 'kızartması'], 'extra' => ['hızlı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: ジュース・コーヒー', 3,
                pictures: [
                    [
                        'ja' => 'ジュース',
                        'img' => 'juice',
                    ],
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'ja' => '子供',
                    ],
                    [
                        'ja' => '注文',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '子供',
                            'メニュー',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a child menu',
                                'correct' => [
                                    'a',
                                    'child',
                                    'menu',
                                ],
                                'extra' => [
                                    'order',
                                ],
                            ],
                            'az' => ['sentence' => 'bir uşaq menyu', 'correct' => ['bir', 'uşaq', 'menyu'], 'extra' => ['sifariş']],
                            'ar' => ['sentence' => 'طفل قائمة الطعام', 'correct' => ['طفل', 'قائمة الطعام'], 'extra' => ['طلب']],
                            'ru' => ['sentence' => 'ребёнок меню', 'correct' => ['ребёнок', 'меню'], 'extra' => ['заказ']],
                            'es' => [
                                'sentence' => 'Un menú infantil',
                                'correct' => [
                                    'un',
                                    'niño',
                                    'menú',
                                ],
                                'extra' => [
                                    'pedido',
                                    'zumo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Kindermenü',
                                'correct' => [
                                    'ein',
                                    'Kind',
                                    'Menü',
                                ],
                                'extra' => [
                                    'Bestellung',
                                    'Saft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un menu enfant',
                                'correct' => [
                                    'un',
                                    'menu',
                                    'enfant',
                                ],
                                'extra' => [
                                    'commande',
                                    'jus',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어린이 메뉴',
                                'correct' => [
                                    '어린이',
                                    '메뉴',
                                ],
                                'extra' => [
                                    '주문',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir çocuk menüsü', 'correct' => ['bir', 'çocuk', 'menüsü'], 'extra' => ['sipariş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ジュース',
                            '付き',
                            'の',
                            '私の',
                            '注文',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my order with a juice',
                                'correct' => [
                                    'my',
                                    'order',
                                    'with',
                                    'a',
                                    'juice',
                                ],
                                'extra' => [
                                    'child',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim sifariş ilə bir şirə', 'correct' => ['mənim', 'sifariş', 'ilə', 'bir', 'şirə'], 'extra' => ['uşaq']],
                            'ar' => ['sentence' => 'طلب مع عصير', 'correct' => ['طلب', 'مع', 'عصير'], 'extra' => ['طفل']],
                            'ru' => ['sentence' => 'мой заказ с сок', 'correct' => ['мой', 'заказ', 'с', 'сок'], 'extra' => ['ребёнок']],
                            'es' => [
                                'sentence' => 'Mi pedido con un zumo',
                                'correct' => [
                                    'mi',
                                    'pedido',
                                    'con',
                                    'un',
                                    'zumo',
                                ],
                                'extra' => [
                                    'niño',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Bestellung mit einem Saft',
                                'correct' => [
                                    'meine',
                                    'Bestellung',
                                    'mit',
                                    'einem',
                                    'Saft',
                                ],
                                'extra' => [
                                    'Kind',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma commande avec un jus',
                                'correct' => [
                                    'ma',
                                    'commande',
                                    'avec',
                                    'un',
                                    'jus',
                                ],
                                'extra' => [
                                    'enfant',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스와 함께 제 주문',
                                'correct' => [
                                    '주스와',
                                    '함께',
                                    '제',
                                    '주문',
                                ],
                                'extra' => [
                                    '아이',
                                ],
                            ],
                            'tr' => ['sentence' => 'meyve sulu siparişim', 'correct' => ['meyve', 'sulu', 'siparişim'], 'extra' => ['çocuk']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'コーヒー',
                            'と',
                            'ジュース',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee and a juice',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'and',
                                    'a',
                                    'juice',
                                ],
                                'extra' => [
                                    'order',
                                ],
                            ],
                            'az' => ['sentence' => 'bir qəhvə və bir şirə', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'şirə'], 'extra' => ['sifariş']],
                            'ar' => ['sentence' => 'قهوة و عصير', 'correct' => ['قهوة', 'و', 'عصير'], 'extra' => ['طلب']],
                            'ru' => ['sentence' => 'кофе и сок', 'correct' => ['кофе', 'и', 'сок'], 'extra' => ['заказ']],
                            'es' => [
                                'sentence' => 'Un café y un zumo',
                                'correct' => [
                                    'un',
                                    'café',
                                    'y',
                                    'un',
                                    'zumo',
                                ],
                                'extra' => [
                                    'pedido',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Kaffee und ein Saft',
                                'correct' => [
                                    'ein',
                                    'Kaffee',
                                    'und',
                                    'ein',
                                    'Saft',
                                ],
                                'extra' => [
                                    'Bestellung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café et un jus',
                                'correct' => [
                                    'un',
                                    'café',
                                    'et',
                                    'un',
                                    'jus',
                                ],
                                'extra' => [
                                    'commande',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피와 주스',
                                'correct' => [
                                    '커피와',
                                    '주스',
                                ],
                                'extra' => [
                                    '주문',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kahve ve bir meyve suyu', 'correct' => ['bir', 'kahve', 've', 'bir', 'meyve', 'suyu'], 'extra' => ['sipariş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: サンドイッチ・ハンバーガー', 4,
                pictures: [
                    [
                        'ja' => 'サンドイッチ',
                        'img' => 'sandwich',
                    ],
                    [
                        'ja' => 'ハンバーガー',
                        'img' => 'burger',
                    ],
                ],
                plain: [
                    [
                        'ja' => '待つ',
                    ],
                    [
                        'ja' => '準備ができた',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ハンバーガー',
                            'を',
                            '待つ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'wait for a burger',
                                'correct' => [
                                    'wait',
                                    'for',
                                    'a',
                                    'burger',
                                ],
                                'extra' => [
                                    'ready',
                                ],
                            ],
                            'az' => ['sentence' => 'gözlə üçün bir burger', 'correct' => ['gözlə', 'üçün', 'bir', 'burger'], 'extra' => ['hazır']],
                            'ar' => ['sentence' => 'انتظر لأجل برجر', 'correct' => ['انتظر', 'لأجل', 'برجر'], 'extra' => ['جاهز']],
                            'ru' => ['sentence' => 'подожди для бургер', 'correct' => ['подожди', 'для', 'бургер'], 'extra' => ['готов']],
                            'es' => [
                                'sentence' => 'Esperar una hamburguesa',
                                'correct' => [
                                    'esperar',
                                    'para',
                                    'una',
                                    'hamburguesa',
                                ],
                                'extra' => [
                                    'listo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Auf einen Burger warten',
                                'correct' => [
                                    'warten',
                                    'für',
                                    'einen',
                                    'Burger',
                                ],
                                'extra' => [
                                    'bereit',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Attendre un hamburger',
                                'correct' => [
                                    'attendre',
                                    'pour',
                                    'un',
                                    'hamburger',
                                ],
                                'extra' => [
                                    'prêt',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '햄버거를 기다리다',
                                'correct' => [
                                    '햄버거를',
                                    '기다리다',
                                ],
                                'extra' => [
                                    '준비된',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir hamburger bekle', 'correct' => ['bir', 'hamburger', 'bekle'], 'extra' => ['hazır']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'サンドイッチ',
                            'は',
                            '準備',
                            'が',
                            'で',
                            'きて',
                            'います',
                        ],
                        'blank' => 6,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the sandwich is ready',
                                'correct' => [
                                    'the',
                                    'sandwich',
                                    'is',
                                    'ready',
                                ],
                                'extra' => [
                                    'wait',
                                ],
                            ],
                            'az' => ['sentence' => 'sendviç hazır', 'correct' => ['sendviç', 'hazır'], 'extra' => ['gözlə']],
                            'ar' => ['sentence' => 'شطيرة جاهز', 'correct' => ['شطيرة', 'جاهز'], 'extra' => ['انتظر']],
                            'ru' => ['sentence' => 'сэндвич готов', 'correct' => ['сэндвич', 'готов'], 'extra' => ['подожди']],
                            'es' => [
                                'sentence' => 'El sándwich está listo',
                                'correct' => [
                                    'el',
                                    'sándwich',
                                    'está',
                                    'listo',
                                ],
                                'extra' => [
                                    'esperar',
                                    'hamburguesa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Sandwich ist fertig',
                                'correct' => [
                                    'das',
                                    'Sandwich',
                                    'ist',
                                    'bereit',
                                ],
                                'extra' => [
                                    'warten',
                                    'Burger',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le sandwich est prêt',
                                'correct' => [
                                    'le',
                                    'sandwich',
                                    'est',
                                    'prêt',
                                ],
                                'extra' => [
                                    'attendre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '샌드위치는 준비되었습니다',
                                'correct' => [
                                    '샌드위치는',
                                    '준비되었습니다',
                                ],
                                'extra' => [
                                    '기다리다',
                                ],
                            ],
                            'tr' => ['sentence' => 'sandviç hazır', 'correct' => ['sandviç', 'hazır'], 'extra' => ['bekle']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'サンドイッチ',
                            'を',
                            '待つ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'wait for the sandwich',
                                'correct' => [
                                    'wait',
                                    'for',
                                    'the',
                                    'sandwich',
                                ],
                                'extra' => [
                                    'ready',
                                ],
                            ],
                            'az' => ['sentence' => 'gözlə üçün sendviç', 'correct' => ['gözlə', 'üçün', 'sendviç'], 'extra' => ['hazır']],
                            'ar' => ['sentence' => 'انتظر لأجل شطيرة', 'correct' => ['انتظر', 'لأجل', 'شطيرة'], 'extra' => ['جاهز']],
                            'ru' => ['sentence' => 'подожди для сэндвич', 'correct' => ['подожди', 'для', 'сэндвич'], 'extra' => ['готов']],
                            'es' => [
                                'sentence' => 'Esperar el sándwich',
                                'correct' => [
                                    'esperar',
                                    'para',
                                    'el',
                                    'sándwich',
                                ],
                                'extra' => [
                                    'listo',
                                    'hamburguesa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Auf das Sandwich warten',
                                'correct' => [
                                    'warten',
                                    'für',
                                    'das',
                                    'Sandwich',
                                ],
                                'extra' => [
                                    'bereit',
                                    'Burger',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Attendre le sandwich',
                                'correct' => [
                                    'attendre',
                                    'pour',
                                    'le',
                                    'sandwich',
                                ],
                                'extra' => [
                                    'prêt',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '샌드위치를 기다리다',
                                'correct' => [
                                    '샌드위치를',
                                    '기다리다',
                                ],
                                'extra' => [
                                    '준비된',
                                ],
                            ],
                            'tr' => ['sentence' => 'sandviçi bekle', 'correct' => ['sandviçi', 'bekle'], 'extra' => ['hazır']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: フライドポテト・ハンバーガー', 5,
                pictures: [
                    [
                        'ja' => 'フライドポテト',
                        'img' => 'fries',
                    ],
                    [
                        'ja' => 'ハンバーガー',
                        'img' => 'burger',
                    ],
                ],
                plain: [
                    [
                        'ja' => '分',
                    ],
                    [
                        'ja' => '速い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '五分',
                            'お願いします',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'five minutes please',
                                'correct' => [
                                    'five',
                                    'minutes',
                                    'please',
                                ],
                                'extra' => [
                                    'fast',
                                ],
                            ],
                            'az' => ['sentence' => 'beş dəqiqə zəhmət olmasa', 'correct' => ['beş', 'dəqiqə', 'zəhmət olmasa'], 'extra' => ['sürətli']],
                            'ar' => ['sentence' => 'خمسة دقائق من فضلك', 'correct' => ['خمسة', 'دقائق', 'من فضلك'], 'extra' => ['بسرعة']],
                            'ru' => ['sentence' => 'пять минут пожалуйста', 'correct' => ['пять', 'минут', 'пожалуйста'], 'extra' => ['быстро']],
                            'es' => [
                                'sentence' => 'Cinco minutos, por favor',
                                'correct' => [
                                    'cinco',
                                    'minutos',
                                    'por favor',
                                ],
                                'extra' => [
                                    'rápido',
                                    'patatas fritas',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Fünf Minuten, bitte',
                                'correct' => [
                                    'fünf',
                                    'Minuten',
                                    'bitte',
                                ],
                                'extra' => [
                                    'schnell',
                                    'Pommes',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Cinq minutes, s\'il vous plaît',
                                'correct' => [
                                    'cinq',
                                    'minutes',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'rapide',
                                    'frites',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오 분 부탁합니다',
                                'correct' => [
                                    '오',
                                    '분',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '빠른',
                                ],
                            ],
                            'tr' => ['sentence' => 'beş dakika lütfen', 'correct' => ['beş', 'dakika', 'lütfen'], 'extra' => ['hızlı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'フライドポテト',
                            'を',
                            '速く',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'fries fast please',
                                'correct' => [
                                    'fries',
                                    'fast',
                                    'please',
                                ],
                                'extra' => [
                                    'minutes',
                                ],
                            ],
                            'az' => ['sentence' => 'kartof fri sürətli zəhmət olmasa', 'correct' => ['kartof fri', 'sürətli', 'zəhmət olmasa'], 'extra' => ['dəqiqə']],
                            'ar' => ['sentence' => 'بطاطا مقلية بسرعة من فضلك', 'correct' => ['بطاطا مقلية', 'بسرعة', 'من فضلك'], 'extra' => ['دقائق']],
                            'ru' => ['sentence' => 'картошка фри быстро пожалуйста', 'correct' => ['картошка фри', 'быстро', 'пожалуйста'], 'extra' => ['минут']],
                            'es' => [
                                'sentence' => 'Patatas fritas rápido, por favor',
                                'correct' => [
                                    'patatas fritas',
                                    'rápido',
                                    'por favor',
                                ],
                                'extra' => [
                                    'minutos',
                                    'hamburguesa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Pommes schnell, bitte',
                                'correct' => [
                                    'Pommes',
                                    'schnell',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Minuten',
                                    'Burger',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Des frites vite, s\'il vous plaît',
                                'correct' => [
                                    'frites',
                                    'rapide',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'minutes',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '감자튀김 빨리',
                                'correct' => [
                                    '감자튀김',
                                    '빨리',
                                ],
                                'extra' => [
                                    '분',
                                ],
                            ],
                            'tr' => ['sentence' => 'hızlı patates kızartması lütfen', 'correct' => ['hızlı', 'patates', 'kızartması', 'lütfen'], 'extra' => ['dakika']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ハンバーガー',
                            'に',
                            '五分',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'five minutes for a burger',
                                'correct' => [
                                    'five',
                                    'minutes',
                                    'for',
                                    'a',
                                    'burger',
                                ],
                                'extra' => [
                                    'fast',
                                ],
                            ],
                            'az' => ['sentence' => 'beş dəqiqə üçün bir burger', 'correct' => ['beş', 'dəqiqə', 'üçün', 'bir', 'burger'], 'extra' => ['sürətli']],
                            'ar' => ['sentence' => 'خمسة دقائق لأجل برجر', 'correct' => ['خمسة', 'دقائق', 'لأجل', 'برجر'], 'extra' => ['بسرعة']],
                            'ru' => ['sentence' => 'пять минут для бургер', 'correct' => ['пять', 'минут', 'для', 'бургер'], 'extra' => ['быстро']],
                            'es' => [
                                'sentence' => 'Cinco minutos por una hamburguesa',
                                'correct' => [
                                    'cinco',
                                    'minutos',
                                    'para',
                                    'una',
                                    'hamburguesa',
                                ],
                                'extra' => [
                                    'rápido',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Fünf Minuten für einen Burger',
                                'correct' => [
                                    'fünf',
                                    'Minuten',
                                    'für',
                                    'einen',
                                    'Burger',
                                ],
                                'extra' => [
                                    'schnell',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Cinq minutes pour un hamburger',
                                'correct' => [
                                    'cinq',
                                    'minutes',
                                    'pour',
                                    'un',
                                    'hamburger',
                                ],
                                'extra' => [
                                    'rapide',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '햄버거를 위해 오 분',
                                'correct' => [
                                    '햄버거를',
                                    '위해',
                                    '오',
                                    '분',
                                ],
                                'extra' => [
                                    '빠른',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir hamburger için beş dakika', 'correct' => ['bir', 'hamburger', 'için', 'beş', 'dakika'], 'extra' => ['hızlı']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
