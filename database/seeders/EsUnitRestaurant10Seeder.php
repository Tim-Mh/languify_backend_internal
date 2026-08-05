<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant10Seeder extends Seeder
{
    private const PICTURES = [
        'sándwich' => 'sandwich',
        'patatas fritas' => 'fries',
        'hamburguesa' => 'burger',
        'zumo' => 'juice',
        'café' => 'coffee',
        'helado' => 'icecream',
        'ensalada' => 'salad',
        'pan' => 'bread',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 10, the Spanish twin of the
     * English "Unit 10: Fast Food and Takeaway" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unidad 10: Comida rápida y para llevar', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Sándwich y Patatas fritas', 1,
                pictures: [
                    [
                        'es' => 'sándwich',
                        'img' => 'sandwich',
                    ],
                    [
                        'es' => 'patatas fritas',
                        'img' => 'fries',
                    ],
                ],
                plain: [
                    [
                        'es' => 'para llevar',
                    ],
                    [
                        'es' => 'para tomar aquí',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'sándwich',
                            'para',
                            'llevar',
                        ],
                        'blank' => 1,
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
                                    'fries',
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
                            'ja' => [
                                'sentence' => '持ち帰りのサンドイッチ',
                                'correct' => [
                                    '持ち帰り',
                                    'の',
                                    'サンドイッチ',
                                ],
                                'extra' => [
                                    '店内で',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Patatas',
                            'fritas',
                            'para',
                            'tomar',
                            'aquí',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'fries eat in',
                                'correct' => [
                                    'fries',
                                    'eat in',
                                ],
                                'extra' => [
                                    'takeaway',
                                    'sandwich',
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
                            'ja' => [
                                'sentence' => '店内でフライドポテト',
                                'correct' => [
                                    '店内で',
                                    'フライドポテト',
                                ],
                                'extra' => [
                                    '持ち帰り',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'sándwich',
                            'y',
                            'patatas',
                            'fritas',
                            'para',
                            'llevar',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '持ち帰りのサンドイッチとフライドポテト',
                                'correct' => [
                                    '持ち帰り',
                                    'の',
                                    'サンドイッチ',
                                    'と',
                                    'フライドポテト',
                                ],
                                'extra' => [
                                    '店内で',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Hamburguesa y Patatas fritas', 2,
                pictures: [
                    [
                        'es' => 'hamburguesa',
                        'img' => 'burger',
                    ],
                    [
                        'es' => 'patatas fritas',
                        'img' => 'fries',
                    ],
                ],
                plain: [
                    [
                        'es' => 'rápido',
                    ],
                    [
                        'es' => 'bolsa',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'hamburguesa',
                            'con',
                            'patatas',
                            'fritas',
                        ],
                        'blank' => 1,
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
                                    'bag',
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
                            'ja' => [
                                'sentence' => 'フライドポテト付きハンバーガー',
                                'correct' => [
                                    'フライドポテト',
                                    '付き',
                                    'ハンバーガー',
                                ],
                                'extra' => [
                                    '速い',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'hamburguesa',
                            'rápida',
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
                                    'fries',
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
                            'ja' => [
                                'sentence' => '速いハンバーガー',
                                'correct' => [
                                    '速い',
                                    'ハンバーガー',
                                ],
                                'extra' => [
                                    '袋',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Patatas',
                            'fritas',
                            'en',
                            'una',
                            'bolsa',
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
                            'ja' => [
                                'sentence' => '袋の中のフライドポテト',
                                'correct' => [
                                    '袋',
                                    'の',
                                    '中',
                                    'の',
                                    'フライドポテト',
                                ],
                                'extra' => [
                                    '速い',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Zumo y Café', 3,
                pictures: [
                    [
                        'es' => 'zumo',
                        'img' => 'juice',
                    ],
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'es' => 'niño',
                    ],
                    [
                        'es' => 'pedido',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'menú',
                            'de',
                            'niño',
                        ],
                        'blank' => 3,
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
                                    'juice',
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
                            'ja' => [
                                'sentence' => '子供メニュー',
                                'correct' => [
                                    '子供',
                                    'メニュー',
                                ],
                                'extra' => [
                                    '注文',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'pedido',
                            'con',
                            'un',
                            'zumo',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => 'ジュース付きの私の注文',
                                'correct' => [
                                    'ジュース',
                                    '付き',
                                    'の',
                                    '私の',
                                    '注文',
                                ],
                                'extra' => [
                                    '子供',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'café',
                            'y',
                            'un',
                            'zumo',
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
                            'ja' => [
                                'sentence' => 'コーヒーとジュース',
                                'correct' => [
                                    'コーヒー',
                                    'と',
                                    'ジュース',
                                ],
                                'extra' => [
                                    '注文',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Sándwich y Hamburguesa', 4,
                pictures: [
                    [
                        'es' => 'sándwich',
                        'img' => 'sandwich',
                    ],
                    [
                        'es' => 'hamburguesa',
                        'img' => 'burger',
                    ],
                ],
                plain: [
                    [
                        'es' => 'esperar',
                    ],
                    [
                        'es' => 'listo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Esperar',
                            'una',
                            'hamburguesa',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'ハンバーガーを待つ',
                                'correct' => [
                                    'ハンバーガー',
                                    'を',
                                    '待つ',
                                ],
                                'extra' => [
                                    '準備ができた',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'sándwich',
                            'está',
                            'listo',
                        ],
                        'blank' => 3,
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
                                    'burger',
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
                            'ja' => [
                                'sentence' => 'サンドイッチは準備ができています',
                                'correct' => [
                                    'サンドイッチ',
                                    'は',
                                    '準備',
                                    'が',
                                    'で',
                                    'きて',
                                    'います',
                                ],
                                'extra' => [
                                    '待つ',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Esperar',
                            'el',
                            'sándwich',
                        ],
                        'blank' => 0,
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
                                    'burger',
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
                            'ja' => [
                                'sentence' => 'サンドイッチを待つ',
                                'correct' => [
                                    'サンドイッチ',
                                    'を',
                                    '待つ',
                                ],
                                'extra' => [
                                    '準備ができた',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Patatas fritas y Hamburguesa', 5,
                pictures: [
                    [
                        'es' => 'patatas fritas',
                        'img' => 'fries',
                    ],
                    [
                        'es' => 'hamburguesa',
                        'img' => 'burger',
                    ],
                ],
                plain: [
                    [
                        'es' => 'minutos',
                    ],
                    [
                        'es' => 'rápido',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Cinco',
                            'minutos',
                            'por',
                            'favor',
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
                                    'fries',
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
                            'ja' => [
                                'sentence' => '五分お願いします',
                                'correct' => [
                                    '五分',
                                    'お願いします',
                                ],
                                'extra' => [
                                    '速い',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Patatas',
                            'fritas',
                            'rápido',
                            'por',
                            'favor',
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
                                    'burger',
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
                            'ja' => [
                                'sentence' => 'フライドポテトを速く',
                                'correct' => [
                                    'フライドポテト',
                                    'を',
                                    '速く',
                                ],
                                'extra' => [
                                    '分',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Cinco',
                            'minutos',
                            'por',
                            'una',
                            'hamburguesa',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'ハンバーガーに五分',
                                'correct' => [
                                    'ハンバーガー',
                                    'に',
                                    '五分',
                                ],
                                'extra' => [
                                    '速い',
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
                        ],
                    ],
                ],
            ),
        ];
    }
}
