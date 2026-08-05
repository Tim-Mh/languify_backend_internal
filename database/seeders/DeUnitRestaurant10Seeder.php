<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant10Seeder extends Seeder
{
    private const PICTURES = [
        'Sandwich' => 'sandwich',
        'Pommes' => 'fries',
        'Burger' => 'burger',
        'Saft' => 'juice',
        'Kaffee' => 'coffee',
        'Eis' => 'icecream',
        'Salat' => 'salad',
        'Brot' => 'bread',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 10, the German twin of the
     * English "Unit 10: Fast Food and Takeaway" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Einheit 10: Fast Food & zum Mitnehmen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Sandwich & Pommes', 1,
                pictures: [
                    [
                        'de' => 'Sandwich',
                        'img' => 'sandwich',
                    ],
                    [
                        'de' => 'Pommes',
                        'img' => 'fries',
                    ],
                ],
                plain: [
                    [
                        'de' => 'zum Mitnehmen',
                    ],
                    [
                        'de' => 'zum Hieressen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Sandwich',
                            'zum',
                            'Mitnehmen',
                        ],
                        'blank' => 3,
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
                            'Pommes',
                            'zum',
                            'Hieressen',
                        ],
                        'blank' => 2,
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
                            'Ein',
                            'Sandwich',
                            'und',
                            'Pommes',
                            'zum',
                            'Mitnehmen',
                        ],
                        'blank' => 5,
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
            $builder->lesson('Lektion 2: Burger & Pommes', 2,
                pictures: [
                    [
                        'de' => 'Burger',
                        'img' => 'burger',
                    ],
                    [
                        'de' => 'Pommes',
                        'img' => 'fries',
                    ],
                ],
                plain: [
                    [
                        'de' => 'schnell',
                    ],
                    [
                        'de' => 'Tüte',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Burger',
                            'mit',
                            'Pommes',
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
                            'Ein',
                            'schneller',
                            'Burger',
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
                            'Pommes',
                            'in',
                            'einer',
                            'Tüte',
                        ],
                        'blank' => 3,
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
            $builder->lesson('Lektion 3: Saft & Kaffee', 3,
                pictures: [
                    [
                        'de' => 'Saft',
                        'img' => 'juice',
                    ],
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Kind',
                    ],
                    [
                        'de' => 'Bestellung',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Kindermenü',
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
                                    'juice',
                                ],
                            ],
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
                            'Meine',
                            'Bestellung',
                            'mit',
                            'einem',
                            'Saft',
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
                            'Ein',
                            'Kaffee',
                            'und',
                            'ein',
                            'Saft',
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
            $builder->lesson('Lektion 4: Sandwich & Burger', 4,
                pictures: [
                    [
                        'de' => 'Sandwich',
                        'img' => 'sandwich',
                    ],
                    [
                        'de' => 'Burger',
                        'img' => 'burger',
                    ],
                ],
                plain: [
                    [
                        'de' => 'warten',
                    ],
                    [
                        'de' => 'bereit',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Auf',
                            'einen',
                            'Burger',
                            'warten',
                        ],
                        'blank' => 3,
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
                            'Das',
                            'Sandwich',
                            'ist',
                            'fertig',
                        ],
                        'blank' => 1,
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
                            'Auf',
                            'das',
                            'Sandwich',
                            'warten',
                        ],
                        'blank' => 3,
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
            $builder->lesson('Lektion 5: Pommes & Burger', 5,
                pictures: [
                    [
                        'de' => 'Pommes',
                        'img' => 'fries',
                    ],
                    [
                        'de' => 'Burger',
                        'img' => 'burger',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Minuten',
                    ],
                    [
                        'de' => 'schnell',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Fünf',
                            'Minuten',
                            'bitte',
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
                            'Pommes',
                            'schnell',
                            'bitte',
                        ],
                        'blank' => 1,
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
                            'Fünf',
                            'Minuten',
                            'für',
                            'einen',
                            'Burger',
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
