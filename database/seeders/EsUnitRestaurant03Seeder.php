<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant03Seeder extends Seeder
{
    private const PICTURES = [
        'dinero' => 'money',
        'menú' => 'menu',
        'vino' => 'wine',
        'zumo' => 'juice',
        'café' => 'coffee',
        'pastel' => 'cake',
        'sándwich' => 'sandwich',
        'ensalada' => 'salad',
        'plato' => 'plate',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 3, the Spanish twin of the
     * English "Unit 3: Paying the Bill" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unidad 3: Pagar la cuenta', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Dinero y Menú', 1,
                pictures: [
                    [
                        'es' => 'dinero',
                        'img' => 'money',
                    ],
                    [
                        'es' => 'menú',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'es' => 'la cuenta',
                    ],
                    [
                        'es' => 'pagar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'cuenta',
                            'por',
                            'favor',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the bill please',
                                'correct' => [
                                    'the bill',
                                    'please',
                                ],
                                'extra' => [
                                    'money',
                                    'pay',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Rechnung, bitte',
                                'correct' => [
                                    'die Rechnung',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Geld',
                                    'bezahlen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'addition, s\'il vous plaît',
                                'correct' => [
                                    'l\'addition',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'argent',
                                    'payer',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'お会計をお願いします',
                                'correct' => [
                                    'お会計',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    'お金',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산서 부탁합니다',
                                'correct' => [
                                    '계산서',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '돈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Quisiera',
                            'pagar',
                            'con',
                            'dinero',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to pay with money',
                                'correct' => [
                                    'I would like',
                                    'to pay',
                                    'with',
                                    'money',
                                ],
                                'extra' => [
                                    'the bill',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte mit Geld bezahlen',
                                'correct' => [
                                    'ich möchte',
                                    'mit',
                                    'Geld',
                                    'bezahlen',
                                ],
                                'extra' => [
                                    'die Rechnung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais payer avec de l\'argent',
                                'correct' => [
                                    'je voudrais',
                                    'payer',
                                    'avec',
                                    'argent',
                                ],
                                'extra' => [
                                    'l\'addition',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'お金で払いたいです',
                                'correct' => [
                                    'お金',
                                    'で',
                                    '払い',
                                    'たいです',
                                ],
                                'extra' => [
                                    'お会計',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '돈으로 지불하고 싶습니다',
                                'correct' => [
                                    '돈으로',
                                    '지불하고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '계산서',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'menú',
                            'y',
                            'la',
                            'cuenta',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the menu and the bill',
                                'correct' => [
                                    'the',
                                    'menu',
                                    'and',
                                    'the bill',
                                ],
                                'extra' => [
                                    'pay',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Menü und die Rechnung',
                                'correct' => [
                                    'das',
                                    'Menü',
                                    'und',
                                    'die Rechnung',
                                ],
                                'extra' => [
                                    'bezahlen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le menu et l\'addition',
                                'correct' => [
                                    'le',
                                    'menu',
                                    'et',
                                    'l\'addition',
                                ],
                                'extra' => [
                                    'payer',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'メニューとお会計',
                                'correct' => [
                                    'メニュー',
                                    'と',
                                    'お会計',
                                ],
                                'extra' => [
                                    'お金',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '메뉴와 계산서',
                                'correct' => [
                                    '메뉴와',
                                    '계산서',
                                ],
                                'extra' => [
                                    '돈',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Vino y Zumo', 2,
                pictures: [
                    [
                        'es' => 'vino',
                        'img' => 'wine',
                    ],
                    [
                        'es' => 'zumo',
                        'img' => 'juice',
                    ],
                ],
                plain: [
                    [
                        'es' => 'en efectivo',
                    ],
                    [
                        'es' => 'cambio',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Pago',
                            'en',
                            'efectivo',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I pay in cash',
                                'correct' => [
                                    'I pay',
                                    'in',
                                    'cash',
                                ],
                                'extra' => [
                                    'change',
                                    'wine',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bezahle in bar',
                                'correct' => [
                                    'ich bezahle',
                                    'in',
                                    'in bar',
                                ],
                                'extra' => [
                                    'Wechselgeld',
                                    'Wein',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je paie en espèces',
                                'correct' => [
                                    'je paie',
                                    'dans',
                                    'en espèces',
                                ],
                                'extra' => [
                                    'monnaie',
                                    'vin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は現金で払います',
                                'correct' => [
                                    '私',
                                    'は',
                                    '現金で',
                                    '払います',
                                ],
                                'extra' => [
                                    'おつり',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 현금으로 냅니다',
                                'correct' => [
                                    '저는',
                                    '현금으로',
                                    '냅니다',
                                ],
                                'extra' => [
                                    '거스름돈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'cambio',
                            'por',
                            'favor',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the change please',
                                'correct' => [
                                    'the',
                                    'change',
                                    'please',
                                ],
                                'extra' => [
                                    'cash',
                                    'juice',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Wechselgeld, bitte',
                                'correct' => [
                                    'das',
                                    'Wechselgeld',
                                    'bitte',
                                ],
                                'extra' => [
                                    'in bar',
                                    'Saft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La monnaie, s\'il vous plaît',
                                'correct' => [
                                    'la',
                                    'monnaie',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'en espèces',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'おつりをお願いします',
                                'correct' => [
                                    'おつり',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    '現金で',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거스름돈 부탁합니다',
                                'correct' => [
                                    '거스름돈',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '현금으로',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'vino',
                            'y',
                            'un',
                            'zumo',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a wine and a juice',
                                'correct' => [
                                    'a',
                                    'wine',
                                    'and',
                                    'a',
                                    'juice',
                                ],
                                'extra' => [
                                    'change',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Wein und ein Saft',
                                'correct' => [
                                    'ein',
                                    'Wein',
                                    'und',
                                    'ein',
                                    'Saft',
                                ],
                                'extra' => [
                                    'Wechselgeld',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un vin et un jus',
                                'correct' => [
                                    'un',
                                    'vin',
                                    'et',
                                    'un',
                                    'jus',
                                ],
                                'extra' => [
                                    'monnaie',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ワインとジュース',
                                'correct' => [
                                    'ワイン',
                                    'と',
                                    'ジュース',
                                ],
                                'extra' => [
                                    'おつり',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '와인과 주스',
                                'correct' => [
                                    '와인과',
                                    '주스',
                                ],
                                'extra' => [
                                    '거스름돈',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Café y Pastel', 3,
                pictures: [
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'es' => 'propina',
                    ],
                    [
                        'es' => 'recibo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'propina',
                            'está',
                            'en',
                            'la',
                            'mesa',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the tip is on the table',
                                'correct' => [
                                    'the',
                                    'tip',
                                    'is',
                                    'on',
                                    'the',
                                    'table',
                                ],
                                'extra' => [
                                    'receipt',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Trinkgeld ist auf dem Tisch',
                                'correct' => [
                                    'das',
                                    'Trinkgeld',
                                    'ist',
                                    'auf',
                                    'dem',
                                    'Tisch',
                                ],
                                'extra' => [
                                    'Quittung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le pourboire est sur la table',
                                'correct' => [
                                    'le',
                                    'pourboire',
                                    'est',
                                    'sur',
                                    'la',
                                    'table',
                                ],
                                'extra' => [
                                    'reçu',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'チップはテーブルの上にあります',
                                'correct' => [
                                    'チップ',
                                    'は',
                                    'テーブル',
                                    'の上に',
                                    'あります',
                                ],
                                'extra' => [
                                    'レシート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '팁은 테이블 위에 있습니다',
                                'correct' => [
                                    '팁은',
                                    '테이블',
                                    '위에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '영수증',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
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
                                    'tip',
                                    'coffee',
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
                                    'Trinkgeld',
                                    'Kaffee',
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
                                    'pourboire',
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
                                    'チップ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '영수증 부탁합니다',
                                'correct' => [
                                    '영수증',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '팁',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'café',
                            'con',
                            'un',
                            'pastel',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee with a cake',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'with',
                                    'a',
                                    'cake',
                                ],
                                'extra' => [
                                    'tip',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Kaffee mit einem Kuchen',
                                'correct' => [
                                    'ein',
                                    'Kaffee',
                                    'mit',
                                    'einem',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Trinkgeld',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café avec un gâteau',
                                'correct' => [
                                    'un',
                                    'café',
                                    'avec',
                                    'un',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'pourboire',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ケーキと一緒にコーヒー',
                                'correct' => [
                                    'ケーキ',
                                    'と一緒に',
                                    'コーヒー',
                                ],
                                'extra' => [
                                    'チップ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크와 함께 커피',
                                'correct' => [
                                    '케이크와',
                                    '함께',
                                    '커피',
                                ],
                                'extra' => [
                                    '팁',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Sándwich y Ensalada', 4,
                pictures: [
                    [
                        'es' => 'sándwich',
                        'img' => 'sandwich',
                    ],
                    [
                        'es' => 'ensalada',
                        'img' => 'salad',
                    ],
                ],
                plain: [
                    [
                        'es' => 'juntos',
                    ],
                    [
                        'es' => 'por separado',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Pagar',
                            'juntos',
                            'por',
                            'favor',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay together please',
                                'correct' => [
                                    'to pay',
                                    'together',
                                    'please',
                                ],
                                'extra' => [
                                    'separately',
                                    'salad',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Zusammen bezahlen, bitte',
                                'correct' => [
                                    'zusammen',
                                    'bezahlen',
                                    'bitte',
                                ],
                                'extra' => [
                                    'getrennt',
                                    'Salat',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer ensemble, s\'il vous plaît',
                                'correct' => [
                                    'payer',
                                    'ensemble',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'séparément',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '一緒に払いたいです',
                                'correct' => [
                                    '一緒に',
                                    '払い',
                                    'たいです',
                                ],
                                'extra' => [
                                    '別々に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '같이 계산해 주세요',
                                'correct' => [
                                    '같이',
                                    '계산해',
                                    '주세요',
                                ],
                                'extra' => [
                                    '따로',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Quisiera',
                            'pagar',
                            'por',
                            'separado',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to pay separately',
                                'correct' => [
                                    'I would like',
                                    'to pay',
                                    'separately',
                                ],
                                'extra' => [
                                    'together',
                                    'sandwich',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte getrennt bezahlen',
                                'correct' => [
                                    'ich möchte',
                                    'getrennt',
                                    'bezahlen',
                                ],
                                'extra' => [
                                    'zusammen',
                                    'Sandwich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais payer séparément',
                                'correct' => [
                                    'je voudrais',
                                    'payer',
                                    'séparément',
                                ],
                                'extra' => [
                                    'ensemble',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '別々に払いたいです',
                                'correct' => [
                                    '別々に',
                                    '払い',
                                    'たいです',
                                ],
                                'extra' => [
                                    '一緒に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '따로 계산하고 싶습니다',
                                'correct' => [
                                    '따로',
                                    '계산하고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '함께',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'sándwich',
                            'y',
                            'una',
                            'ensalada',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a sandwich and a salad',
                                'correct' => [
                                    'a',
                                    'sandwich',
                                    'and',
                                    'a',
                                    'salad',
                                ],
                                'extra' => [
                                    'together',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Sandwich und ein Salat',
                                'correct' => [
                                    'ein',
                                    'Sandwich',
                                    'und',
                                    'ein',
                                    'Salat',
                                ],
                                'extra' => [
                                    'zusammen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un sandwich et une salade',
                                'correct' => [
                                    'un',
                                    'sandwich',
                                    'et',
                                    'une',
                                    'salade',
                                ],
                                'extra' => [
                                    'ensemble',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'サンドイッチとサラダ',
                                'correct' => [
                                    'サンドイッチ',
                                    'と',
                                    'サラダ',
                                ],
                                'extra' => [
                                    '一緒に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '샌드위치와 샐러드',
                                'correct' => [
                                    '샌드위치와',
                                    '샐러드',
                                ],
                                'extra' => [
                                    '함께',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Plato y Menú', 5,
                pictures: [
                    [
                        'es' => 'plato',
                        'img' => 'plate',
                    ],
                    [
                        'es' => 'menú',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'es' => 'disculpe',
                    ],
                    [
                        'es' => 'pago',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Disculpe',
                            'la',
                            'cuenta',
                            'por',
                            'favor',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'excuse me the bill please',
                                'correct' => [
                                    'excuse me',
                                    'the bill',
                                    'please',
                                ],
                                'extra' => [
                                    'I pay',
                                    'plate',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Entschuldigen Sie, die Rechnung bitte',
                                'correct' => [
                                    'entschuldigen Sie',
                                    'die Rechnung',
                                    'bitte',
                                ],
                                'extra' => [
                                    'ich bezahle',
                                    'Teller',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Excusez-moi, l\'addition s\'il vous plaît',
                                'correct' => [
                                    'excusez-moi',
                                    'l\'addition',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'je paie',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'すみません、お会計をお願いします',
                                'correct' => [
                                    'すみません',
                                    'お会計',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    '私が払う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '실례합니다, 계산서 부탁합니다',
                                'correct' => [
                                    '실례합니다',
                                    '계산서',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '제가 냅니다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Pago',
                            'ahora',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I pay now',
                                'correct' => [
                                    'I pay',
                                    'now',
                                ],
                                'extra' => [
                                    'excuse me',
                                    'menu',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich bezahle jetzt',
                                'correct' => [
                                    'ich bezahle',
                                    'jetzt',
                                ],
                                'extra' => [
                                    'entschuldigen Sie',
                                    'Menü',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je paie maintenant',
                                'correct' => [
                                    'je paie',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'excusez-moi',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今払います',
                                'correct' => [
                                    '今',
                                    '払います',
                                ],
                                'extra' => [
                                    'すみません',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '지금 냅니다',
                                'correct' => [
                                    '지금',
                                    '냅니다',
                                ],
                                'extra' => [
                                    '실례합니다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'plato',
                            'y',
                            'un',
                            'menú',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a plate and a menu',
                                'correct' => [
                                    'a',
                                    'plate',
                                    'and',
                                    'a',
                                    'menu',
                                ],
                                'extra' => [
                                    'I pay',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Teller und ein Menü',
                                'correct' => [
                                    'ein',
                                    'Teller',
                                    'und',
                                    'ein',
                                    'Menü',
                                ],
                                'extra' => [
                                    'ich bezahle',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette et un menu',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'et',
                                    'un',
                                    'menu',
                                ],
                                'extra' => [
                                    'je paie',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'お皿とメニュー',
                                'correct' => [
                                    'お皿',
                                    'と',
                                    'メニュー',
                                ],
                                'extra' => [
                                    '私が払う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '접시와 메뉴',
                                'correct' => [
                                    '접시와',
                                    '메뉴',
                                ],
                                'extra' => [
                                    '제가 냅니다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
