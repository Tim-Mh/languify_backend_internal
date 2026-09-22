<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant03Seeder extends Seeder
{
    private const PICTURES = [
        'Geld' => 'money',
        'Menü' => 'menu',
        'Wein' => 'wine',
        'Saft' => 'juice',
        'Kaffee' => 'coffee',
        'Kuchen' => 'cake',
        'Sandwich' => 'sandwich',
        'Salat' => 'salad',
        'Teller' => 'plate',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 3, the German twin of the
     * English "Unit 3: Paying the Bill" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Einheit 3: Die Rechnung bezahlen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Geld & Menü', 1,
                pictures: [
                    [
                        'de' => 'Geld',
                        'img' => 'money',
                    ],
                    [
                        'de' => 'Menü',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'de' => 'die Rechnung',
                    ],
                    [
                        'de' => 'bezahlen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Rechnung',
                            'bitte',
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
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['pul', 'ödə']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['نقود', 'ادفع']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['деньги', 'плати']],
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
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['para', 'öde']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'mit',
                            'Geld',
                            'bezahlen',
                        ],
                        'blank' => 4,
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
                            'tr' => ['sentence' => 'parayla ödemek istiyorum', 'correct' => ['parayla', 'ödemek', 'istiyorum'], 'extra' => ['hesap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Das',
                            'Menü',
                            'und',
                            'die',
                            'Rechnung',
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
                            'az' => ['sentence' => 'menyu və hesab', 'correct' => ['menyu', 'və', 'hesab'], 'extra' => ['ödə']],
                            'ar' => ['sentence' => 'قائمة الطعام و الحساب', 'correct' => ['قائمة الطعام', 'و', 'الحساب'], 'extra' => ['ادفع']],
                            'ru' => ['sentence' => 'меню и счёт', 'correct' => ['меню', 'и', 'счёт'], 'extra' => ['плати']],
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
                            'tr' => ['sentence' => 'menü ve hesap', 'correct' => ['menü', 've', 'hesap'], 'extra' => ['öde']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Wein & Saft', 2,
                pictures: [
                    [
                        'de' => 'Wein',
                        'img' => 'wine',
                    ],
                    [
                        'de' => 'Saft',
                        'img' => 'juice',
                    ],
                ],
                plain: [
                    [
                        'de' => 'in bar',
                    ],
                    [
                        'de' => 'Wechselgeld',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'bezahle',
                            'in',
                            'bar',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'ödəyirəm içində nağd', 'correct' => ['ödəyirəm', 'içində', 'nağd'], 'extra' => ['qalıq', 'şərab']],
                            'ar' => ['sentence' => 'أدفع في كاش', 'correct' => ['أدفع', 'في', 'كاش'], 'extra' => ['الباقي', 'نبيذ']],
                            'ru' => ['sentence' => 'я плачу в наличные', 'correct' => ['я плачу', 'в', 'наличные'], 'extra' => ['сдача', 'вино']],
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
                            'tr' => ['sentence' => 'nakit ödüyorum', 'correct' => ['nakit', 'ödüyorum'], 'extra' => ['para üstü', 'şarap']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Das',
                            'Wechselgeld',
                            'bitte',
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
                            'az' => ['sentence' => 'qalıq zəhmət olmasa', 'correct' => ['qalıq', 'zəhmət olmasa'], 'extra' => ['nağd', 'şirə']],
                            'ar' => ['sentence' => 'الباقي من فضلك', 'correct' => ['الباقي', 'من فضلك'], 'extra' => ['كاش', 'عصير']],
                            'ru' => ['sentence' => 'сдача пожалуйста', 'correct' => ['сдача', 'пожалуйста'], 'extra' => ['наличные', 'сок']],
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
                            'tr' => ['sentence' => 'para üstü lütfen', 'correct' => ['para', 'üstü', 'lütfen'], 'extra' => ['nakit', 'meyve suyu']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Wein',
                            'und',
                            'ein',
                            'Saft',
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
                            'tr' => ['sentence' => 'bir şarap ve bir meyve suyu', 'correct' => ['bir', 'şarap', 've', 'bir', 'meyve', 'suyu'], 'extra' => ['para üstü']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Kaffee & Kuchen', 3,
                pictures: [
                    [
                        'de' => 'Kaffee',
                        'img' => 'coffee',
                    ],
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Trinkgeld',
                    ],
                    [
                        'de' => 'Quittung',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Trinkgeld',
                            'ist',
                            'auf',
                            'dem',
                            'Tisch',
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
                            'tr' => ['sentence' => 'bahşiş masada', 'correct' => ['bahşiş', 'masada'], 'extra' => ['fiş']],
                        ],
                    ],
                    'b' => [
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
                                    'tip',
                                    'coffee',
                                ],
                            ],
                            'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => ['çaypulu', 'qəhvə']],
                            'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => ['بقشيش', 'قهوة']],
                            'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => ['чаевые', 'кофе']],
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
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => ['bahşiş', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Kaffee',
                            'mit',
                            'einem',
                            'Kuchen',
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
                            'tr' => ['sentence' => 'pastalı bir kahve', 'correct' => ['pastalı', 'bir', 'kahve'], 'extra' => ['bahşiş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Sandwich & Salat', 4,
                pictures: [
                    [
                        'de' => 'Sandwich',
                        'img' => 'sandwich',
                    ],
                    [
                        'de' => 'Salat',
                        'img' => 'salad',
                    ],
                ],
                plain: [
                    [
                        'de' => 'zusammen',
                    ],
                    [
                        'de' => 'getrennt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Zusammen',
                            'bezahlen',
                            'bitte',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'ödəmək birlikdə zəhmət olmasa', 'correct' => ['ödəmək', 'birlikdə', 'zəhmət olmasa'], 'extra' => ['ayrıca', 'salat']],
                            'ar' => ['sentence' => 'الدفع معا من فضلك', 'correct' => ['الدفع', 'معا', 'من فضلك'], 'extra' => ['منفصل', 'سلطة']],
                            'ru' => ['sentence' => 'платить вместе пожалуйста', 'correct' => ['платить', 'вместе', 'пожалуйста'], 'extra' => ['отдельно', 'салат']],
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
                            'tr' => ['sentence' => 'birlikte ödemek lütfen', 'correct' => ['birlikte', 'ödemek', 'lütfen'], 'extra' => ['ayrı', 'salata']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'getrennt',
                            'bezahlen',
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
                                    'sandwich',
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm ödəmək ayrıca', 'correct' => ['istəyirəm', 'ödəmək', 'ayrıca'], 'extra' => ['birlikdə', 'sendviç']],
                            'ar' => ['sentence' => 'أريد الدفع منفصل', 'correct' => ['أريد', 'الدفع', 'منفصل'], 'extra' => ['معا', 'شطيرة']],
                            'ru' => ['sentence' => 'я хочу платить отдельно', 'correct' => ['я', 'хочу', 'платить', 'отдельно'], 'extra' => ['вместе', 'сэндвич']],
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
                            'tr' => ['sentence' => 'ayrı ödemek istiyorum', 'correct' => ['ayrı', 'ödemek', 'istiyorum'], 'extra' => ['birlikte', 'sandviç']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Sandwich',
                            'und',
                            'ein',
                            'Salat',
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
                            'tr' => ['sentence' => 'bir sandviç ve bir salata', 'correct' => ['bir', 'sandviç', 've', 'bir', 'salata'], 'extra' => ['birlikte']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Teller & Menü', 5,
                pictures: [
                    [
                        'de' => 'Teller',
                        'img' => 'plate',
                    ],
                    [
                        'de' => 'Menü',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'de' => 'entschuldigen Sie',
                    ],
                    [
                        'de' => 'ich bezahle',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Entschuldigen',
                            'Sie',
                            'die',
                            'Rechnung',
                            'bitte',
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
                            'az' => ['sentence' => 'bağışlayın hesab zəhmət olmasa', 'correct' => ['bağışlayın', 'hesab', 'zəhmət olmasa'], 'extra' => ['ödəyirəm', 'boşqab']],
                            'ar' => ['sentence' => 'عفوا الحساب من فضلك', 'correct' => ['عفوا', 'الحساب', 'من فضلك'], 'extra' => ['أدفع', 'صحن']],
                            'ru' => ['sentence' => 'извините счёт пожалуйста', 'correct' => ['извините', 'счёт', 'пожалуйста'], 'extra' => ['я плачу', 'тарелка']],
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
                            'tr' => ['sentence' => 'affedersiniz hesap lütfen', 'correct' => ['affedersiniz', 'hesap', 'lütfen'], 'extra' => ['ödüyorum', 'tabak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'bezahle',
                            'jetzt',
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
                                    'menu',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəyirəm indi', 'correct' => ['ödəyirəm', 'indi'], 'extra' => ['bağışlayın', 'menyu']],
                            'ar' => ['sentence' => 'أدفع الآن', 'correct' => ['أدفع', 'الآن'], 'extra' => ['عفوا', 'قائمة الطعام']],
                            'ru' => ['sentence' => 'я плачу сейчас', 'correct' => ['я плачу', 'сейчас'], 'extra' => ['извините', 'меню']],
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
                            'tr' => ['sentence' => 'şimdi ödüyorum', 'correct' => ['şimdi', 'ödüyorum'], 'extra' => ['affedersiniz', 'menü']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Teller',
                            'und',
                            'ein',
                            'Menü',
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
                            'tr' => ['sentence' => 'bir tabak ve bir menü', 'correct' => ['bir', 'tabak', 've', 'bir', 'menü'], 'extra' => ['ödüyorum']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
