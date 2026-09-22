<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant03Seeder extends Seeder
{
    private const PICTURES = [
        'お金' => 'money',
        'メニュー' => 'menu',
        'ワイン' => 'wine',
        'ジュース' => 'juice',
        'コーヒー' => 'coffee',
        'ケーキ' => 'cake',
        'サンドイッチ' => 'sandwich',
        'サラダ' => 'salad',
        'お皿' => 'plate',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 3, the Japanese twin of the
     * English "Unit 3: Paying the Bill" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'ユニット3: 会計をする', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: お金・メニュー', 1,
                pictures: [
                    [
                        'ja' => 'お金',
                        'img' => 'money',
                    ],
                    [
                        'ja' => 'メニュー',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'お会計',
                    ],
                    [
                        'ja' => '払う',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'お会計',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the bill please',
                                'correct' => [
                                    'the bill',
                                    'please',
                                ],
                                'extra' => [
                                    'money',
                                ],
                            ],
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['pul']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['نقود']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['деньги']],
                            'es' => [
                                'sentence' => 'La cuenta, por favor',
                                'correct' => [
                                    'la cuenta',
                                    'por favor',
                                ],
                                'extra' => [
                                    'dinero',
                                    'pagar',
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
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['para']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'お金',
                            'で',
                            '払い',
                            'たいです',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'istəyirəm ödəmək ilə pul', 'correct' => ['istəyirəm', 'ödəmək', 'ilə', 'pul'], 'extra' => ['hesab']],
                            'ar' => ['sentence' => 'أريد الدفع مع نقود', 'correct' => ['أريد', 'الدفع', 'مع', 'نقود'], 'extra' => ['الحساب']],
                            'ru' => ['sentence' => 'я хочу платить с деньги', 'correct' => ['я', 'хочу', 'платить', 'с', 'деньги'], 'extra' => ['счёт']],
                            'es' => [
                                'sentence' => 'Quisiera pagar con dinero',
                                'correct' => [
                                    'quisiera',
                                    'pagar',
                                    'con',
                                    'dinero',
                                ],
                                'extra' => [
                                    'la cuenta',
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
                            'tr' => ['sentence' => 'parayla ödemek istiyorum', 'correct' => ['parayla', 'ödemek', 'istiyorum'], 'extra' => ['hesap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'メニュー',
                            'と',
                            'お会計',
                        ],
                        'blank' => 2,
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
                                    'money',
                                ],
                            ],
                            'az' => ['sentence' => 'menyu və hesab', 'correct' => ['menyu', 'və', 'hesab'], 'extra' => ['pul']],
                            'ar' => ['sentence' => 'قائمة الطعام و الحساب', 'correct' => ['قائمة الطعام', 'و', 'الحساب'], 'extra' => ['نقود']],
                            'ru' => ['sentence' => 'меню и счёт', 'correct' => ['меню', 'и', 'счёт'], 'extra' => ['деньги']],
                            'es' => [
                                'sentence' => 'El menú y la cuenta',
                                'correct' => [
                                    'el',
                                    'menú',
                                    'y',
                                    'la cuenta',
                                ],
                                'extra' => [
                                    'pagar',
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
                            'tr' => ['sentence' => 'menü ve hesap', 'correct' => ['menü', 've', 'hesap'], 'extra' => ['para']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: ワイン・ジュース', 2,
                pictures: [
                    [
                        'ja' => 'ワイン',
                        'img' => 'wine',
                    ],
                    [
                        'ja' => 'ジュース',
                        'img' => 'juice',
                    ],
                ],
                plain: [
                    [
                        'ja' => '現金で',
                    ],
                    [
                        'ja' => 'おつり',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '現金で',
                            '払います',
                        ],
                        'blank' => 3,
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
                                ],
                            ],
                            'az' => ['sentence' => 'ödəyirəm içində nağd', 'correct' => ['ödəyirəm', 'içində', 'nağd'], 'extra' => ['qalıq']],
                            'ar' => ['sentence' => 'أدفع في كاش', 'correct' => ['أدفع', 'في', 'كاش'], 'extra' => ['الباقي']],
                            'ru' => ['sentence' => 'я плачу в наличные', 'correct' => ['я плачу', 'в', 'наличные'], 'extra' => ['сдача']],
                            'es' => [
                                'sentence' => 'Pago en efectivo',
                                'correct' => [
                                    'pago',
                                    'en',
                                    'en efectivo',
                                ],
                                'extra' => [
                                    'cambio',
                                    'vino',
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
                            'tr' => ['sentence' => 'nakit ödüyorum', 'correct' => ['nakit', 'ödüyorum'], 'extra' => ['para üstü']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'おつり',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'qalıq zəhmət olmasa', 'correct' => ['qalıq', 'zəhmət olmasa'], 'extra' => ['nağd']],
                            'ar' => ['sentence' => 'الباقي من فضلك', 'correct' => ['الباقي', 'من فضلك'], 'extra' => ['كاش']],
                            'ru' => ['sentence' => 'сдача пожалуйста', 'correct' => ['сдача', 'пожалуйста'], 'extra' => ['наличные']],
                            'es' => [
                                'sentence' => 'El cambio, por favor',
                                'correct' => [
                                    'el',
                                    'cambio',
                                    'por favor',
                                ],
                                'extra' => [
                                    'en efectivo',
                                    'zumo',
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
                            'tr' => ['sentence' => 'para üstü lütfen', 'correct' => ['para', 'üstü', 'lütfen'], 'extra' => ['nakit']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ワイン',
                            'と',
                            'ジュース',
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
                            'az' => ['sentence' => 'bir şərab və bir şirə', 'correct' => ['bir', 'şərab', 'və', 'bir', 'şirə'], 'extra' => ['qalıq']],
                            'ar' => ['sentence' => 'نبيذ و عصير', 'correct' => ['نبيذ', 'و', 'عصير'], 'extra' => ['الباقي']],
                            'ru' => ['sentence' => 'вино и сок', 'correct' => ['вино', 'и', 'сок'], 'extra' => ['сдача']],
                            'es' => [
                                'sentence' => 'Un vino y un zumo',
                                'correct' => [
                                    'un',
                                    'vino',
                                    'y',
                                    'un',
                                    'zumo',
                                ],
                                'extra' => [
                                    'cambio',
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
                            'tr' => ['sentence' => 'bir şarap ve bir meyve suyu', 'correct' => ['bir', 'şarap', 've', 'bir', 'meyve', 'suyu'], 'extra' => ['para üstü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: コーヒー・ケーキ', 3,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'チップ',
                    ],
                    [
                        'ja' => 'レシート',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'チップ',
                            'は',
                            'テーブル',
                            'の上に',
                            'あります',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'çaypulu üzərində masa', 'correct' => ['çaypulu', 'üzərində', 'masa'], 'extra' => ['qəbz']],
                            'ar' => ['sentence' => 'بقشيش على طاولة', 'correct' => ['بقشيش', 'على', 'طاولة'], 'extra' => ['إيصال']],
                            'ru' => ['sentence' => 'чаевые на стол', 'correct' => ['чаевые', 'на', 'стол'], 'extra' => ['чек']],
                            'es' => [
                                'sentence' => 'La propina está en la mesa',
                                'correct' => [
                                    'la',
                                    'propina',
                                    'está',
                                    'sobre',
                                    'la',
                                    'mesa',
                                ],
                                'extra' => [
                                    'recibo',
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
                            'tr' => ['sentence' => 'bahşiş masada', 'correct' => ['bahşiş', 'masada'], 'extra' => ['fiş']],
                        ],
                    ],
                    'b' => [
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
                                    'tip',
                                ],
                            ],
                            'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => ['çaypulu']],
                            'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => ['بقشيش']],
                            'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => ['чаевые']],
                            'es' => [
                                'sentence' => 'El recibo, por favor',
                                'correct' => [
                                    'el',
                                    'recibo',
                                    'por favor',
                                ],
                                'extra' => [
                                    'propina',
                                    'café',
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
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => ['bahşiş']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ケーキ',
                            'と一緒に',
                            'コーヒー',
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
                            'az' => ['sentence' => 'bir qəhvə ilə bir tort', 'correct' => ['bir', 'qəhvə', 'ilə', 'bir', 'tort'], 'extra' => ['çaypulu']],
                            'ar' => ['sentence' => 'قهوة مع كعكة', 'correct' => ['قهوة', 'مع', 'كعكة'], 'extra' => ['بقشيش']],
                            'ru' => ['sentence' => 'кофе с торт', 'correct' => ['кофе', 'с', 'торт'], 'extra' => ['чаевые']],
                            'es' => [
                                'sentence' => 'Un café con un pastel',
                                'correct' => [
                                    'un',
                                    'café',
                                    'con',
                                    'un',
                                    'pastel',
                                ],
                                'extra' => [
                                    'propina',
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
                            'tr' => ['sentence' => 'pastalı bir kahve', 'correct' => ['pastalı', 'bir', 'kahve'], 'extra' => ['bahşiş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: サンドイッチ・サラダ', 4,
                pictures: [
                    [
                        'ja' => 'サンドイッチ',
                        'img' => 'sandwich',
                    ],
                    [
                        'ja' => 'サラダ',
                        'img' => 'salad',
                    ],
                ],
                plain: [
                    [
                        'ja' => '一緒に',
                    ],
                    [
                        'ja' => '別々に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '一緒に',
                            '払い',
                            'たいです',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək birlikdə zəhmət olmasa', 'correct' => ['ödəmək', 'birlikdə', 'zəhmət olmasa'], 'extra' => ['ayrıca']],
                            'ar' => ['sentence' => 'الدفع معا من فضلك', 'correct' => ['الدفع', 'معا', 'من فضلك'], 'extra' => ['منفصل']],
                            'ru' => ['sentence' => 'платить вместе пожалуйста', 'correct' => ['платить', 'вместе', 'пожалуйста'], 'extra' => ['отдельно']],
                            'es' => [
                                'sentence' => 'Pagar juntos, por favor',
                                'correct' => [
                                    'pagar',
                                    'juntos',
                                    'por favor',
                                ],
                                'extra' => [
                                    'por separado',
                                    'ensalada',
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
                            'tr' => ['sentence' => 'birlikte ödemek lütfen', 'correct' => ['birlikte', 'ödemek', 'lütfen'], 'extra' => ['ayrı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '別々に',
                            '払い',
                            'たいです',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm ödəmək ayrıca', 'correct' => ['istəyirəm', 'ödəmək', 'ayrıca'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'أريد الدفع منفصل', 'correct' => ['أريد', 'الدفع', 'منفصل'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'я хочу платить отдельно', 'correct' => ['я', 'хочу', 'платить', 'отдельно'], 'extra' => ['вместе']],
                            'es' => [
                                'sentence' => 'Quisiera pagar por separado',
                                'correct' => [
                                    'quisiera',
                                    'pagar',
                                    'por separado',
                                ],
                                'extra' => [
                                    'juntos',
                                    'sándwich',
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
                            'tr' => ['sentence' => 'ayrı ödemek istiyorum', 'correct' => ['ayrı', 'ödemek', 'istiyorum'], 'extra' => ['birlikte']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'サンドイッチ',
                            'と',
                            'サラダ',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'bir sendviç və bir salat', 'correct' => ['bir', 'sendviç', 'və', 'bir', 'salat'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'شطيرة و سلطة', 'correct' => ['شطيرة', 'و', 'سلطة'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'сэндвич и салат', 'correct' => ['сэндвич', 'и', 'салат'], 'extra' => ['вместе']],
                            'es' => [
                                'sentence' => 'Un sándwich y una ensalada',
                                'correct' => [
                                    'un',
                                    'sándwich',
                                    'y',
                                    'una',
                                    'ensalada',
                                ],
                                'extra' => [
                                    'juntos',
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
                            'tr' => ['sentence' => 'bir sandviç ve bir salata', 'correct' => ['bir', 'sandviç', 've', 'bir', 'salata'], 'extra' => ['birlikte']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: お皿・メニュー', 5,
                pictures: [
                    [
                        'ja' => 'お皿',
                        'img' => 'plate',
                    ],
                    [
                        'ja' => 'メニュー',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'すみません',
                    ],
                    [
                        'ja' => '私が払う',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'すみません',
                            'お会計',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 3,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bağışlayın hesab zəhmət olmasa', 'correct' => ['bağışlayın', 'hesab', 'zəhmət olmasa'], 'extra' => ['ödəyirəm']],
                            'ar' => ['sentence' => 'عفوا الحساب من فضلك', 'correct' => ['عفوا', 'الحساب', 'من فضلك'], 'extra' => ['أدفع']],
                            'ru' => ['sentence' => 'извините счёт пожалуйста', 'correct' => ['извините', 'счёт', 'пожалуйста'], 'extra' => ['я плачу']],
                            'es' => [
                                'sentence' => 'Disculpe, la cuenta por favor',
                                'correct' => [
                                    'disculpe',
                                    'la cuenta',
                                    'por favor',
                                ],
                                'extra' => [
                                    'pago',
                                    'plato',
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
                            'tr' => ['sentence' => 'affedersiniz hesap lütfen', 'correct' => ['affedersiniz', 'hesap', 'lütfen'], 'extra' => ['ödüyorum']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '今',
                            '払います',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I pay now',
                                'correct' => [
                                    'I pay',
                                    'now',
                                ],
                                'extra' => [
                                    'excuse me',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəyirəm indi', 'correct' => ['ödəyirəm', 'indi'], 'extra' => ['bağışlayın']],
                            'ar' => ['sentence' => 'أدفع الآن', 'correct' => ['أدفع', 'الآن'], 'extra' => ['عفوا']],
                            'ru' => ['sentence' => 'я плачу сейчас', 'correct' => ['я плачу', 'сейчас'], 'extra' => ['извините']],
                            'es' => [
                                'sentence' => 'Pago ahora',
                                'correct' => [
                                    'pago',
                                    'ahora',
                                ],
                                'extra' => [
                                    'disculpe',
                                    'menú',
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
                            'tr' => ['sentence' => 'şimdi ödüyorum', 'correct' => ['şimdi', 'ödüyorum'], 'extra' => ['affedersiniz']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'お皿',
                            'と',
                            'メニュー',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'bir boşqab və bir menyu', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'menyu'], 'extra' => ['ödəyirəm']],
                            'ar' => ['sentence' => 'صحن و قائمة الطعام', 'correct' => ['صحن', 'و', 'قائمة الطعام'], 'extra' => ['أدفع']],
                            'ru' => ['sentence' => 'тарелка и меню', 'correct' => ['тарелка', 'и', 'меню'], 'extra' => ['я плачу']],
                            'es' => [
                                'sentence' => 'Un plato y un menú',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'y',
                                    'un',
                                    'menú',
                                ],
                                'extra' => [
                                    'pago',
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
                            'tr' => ['sentence' => 'bir tabak ve bir menü', 'correct' => ['bir', 'tabak', 've', 'bir', 'menü'], 'extra' => ['ödüyorum']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
