<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant03Seeder extends Seeder
{
    private const PICTURES = [
        'Money' => 'money', 'Menu' => 'menu', 'Wine' => 'wine', 'Juice' => 'juice',
        'Coffee' => 'coffee', 'Cake' => 'cake', 'Sandwich' => 'sandwich', 'Salad' => 'salad',
        'Plate' => 'plate',
    ];

    /**
     * English Chapter 3, Unit 3 — paying.
     *
     * The end of a meal is where a learner freezes, so this unit drills the
     * four things they actually have to say: ask for the bill, say how they are
     * paying, ask for the change or the receipt, and settle together or apart.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Paying the Bill', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Bill', 1,
                pictures: [['en' => 'Money', 'img' => 'money'], ['en' => 'Menu', 'img' => 'menu']],
                plain: [['en' => 'The bill'], ['en' => 'To pay']],
                phrases: [
                    'a' => [
                        'words' => ['the bill', 'please'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['dinero', 'pagar']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Geld', 'bezahlen']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['돈']],
                            'fr' => ['sentence' => "L'addition, s'il vous plaît", 'correct' => ["l'addition", "s'il vous plaît"], 'extra' => ['argent', 'payer']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I would like', 'to pay', 'with', 'money'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera pagar con dinero', 'correct' => ['quisiera', 'pagar', 'con', 'dinero'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Ich möchte mit Geld bezahlen', 'correct' => ['ich möchte', 'mit', 'Geld', 'bezahlen'], 'extra' => ['die Rechnung']],
                            'ja' => ['sentence' => 'お金で払いたいです', 'correct' => ['お金', 'で', '払い', 'たいです'], 'extra' => ['お会計']],
                            'ko' => ['sentence' => '돈으로 지불하고 싶습니다', 'correct' => ['돈으로', '지불하고', '싶습니다'], 'extra' => ['계산서']],
                            'fr' => ['sentence' => "Je voudrais payer avec de l'argent", 'correct' => ['je voudrais', 'payer', 'avec', 'argent'], 'extra' => ["l'addition"]],
                            'tr' => ['sentence' => 'parayla ödemek istiyorum', 'correct' => ['parayla', 'ödemek', 'istiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я хочу платить с деньги', 'correct' => ['я', 'хочу', 'платить', 'с', 'деньги'], 'extra' => []],
                        'ar' => ['sentence' => 'أريد الدفع مع نقود', 'correct' => ['أريد', 'الدفع', 'مع', 'نقود'], 'extra' => []],
                        'az' => ['sentence' => 'istəyirəm ödəmək ilə pul', 'correct' => ['istəyirəm', 'ödəmək', 'ilə', 'pul'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'menu', 'and', 'the bill'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El menú y la cuenta', 'correct' => ['el', 'menú', 'y', 'la cuenta'], 'extra' => ['pagar']],
                            'de' => ['sentence' => 'Das Menü und die Rechnung', 'correct' => ['das', 'Menü', 'und', 'die Rechnung'], 'extra' => ['bezahlen']],
                            'ja' => ['sentence' => 'メニューとお会計', 'correct' => ['メニュー', 'と', 'お会計'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '메뉴와 계산서', 'correct' => ['메뉴와', '계산서'], 'extra' => ['돈']],
                            'fr' => ['sentence' => "Le menu et l'addition", 'correct' => ['le', 'menu', 'et', "l'addition"], 'extra' => ['payer']],
                            'tr' => ['sentence' => 'menü ve hesap', 'correct' => ['menü', 've', 'hesap'], 'extra' => []],
                        'ru' => ['sentence' => 'меню и счёт', 'correct' => ['меню', 'и', 'счёт'], 'extra' => []],
                        'ar' => ['sentence' => 'قائمة الطعام و الحساب', 'correct' => ['قائمة الطعام', 'و', 'الحساب'], 'extra' => []],
                        'az' => ['sentence' => 'menyu və hesab', 'correct' => ['menyu', 'və', 'hesab'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Cash and Change', 2,
                pictures: [['en' => 'Wine', 'img' => 'wine'], ['en' => 'Juice', 'img' => 'juice']],
                plain: [['en' => 'Cash'], ['en' => 'Change']],
                phrases: [
                    'a' => [
                        'words' => ['I pay', 'in', 'cash'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Pago en efectivo', 'correct' => ['pago', 'en', 'en efectivo'], 'extra' => ['cambio', 'vino']],
                            'de' => ['sentence' => 'Ich bezahle in bar', 'correct' => ['ich bezahle', 'in', 'in bar'], 'extra' => ['Wechselgeld', 'Wein']],
                            'ja' => ['sentence' => '私は現金で払います', 'correct' => ['私', 'は', '現金で', '払います'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '저는 현금으로 냅니다', 'correct' => ['저는', '현금으로', '냅니다'], 'extra' => ['거스름돈']],
                            'fr' => ['sentence' => 'Je paie en espèces', 'correct' => ['je paie', 'dans', 'en espèces'], 'extra' => ['monnaie', 'vin']],
                            'tr' => ['sentence' => 'nakit ödüyorum', 'correct' => ['nakit', 'ödüyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я плачу в наличные', 'correct' => ['я плачу', 'в', 'наличные'], 'extra' => []],
                        'ar' => ['sentence' => 'أدفع في كاش', 'correct' => ['أدفع', 'في', 'كاش'], 'extra' => []],
                        'az' => ['sentence' => 'ödəyirəm içində nağd', 'correct' => ['ödəyirəm', 'içində', 'nağd'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'change', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El cambio, por favor', 'correct' => ['el', 'cambio', 'por favor'], 'extra' => ['en efectivo', 'zumo']],
                            'de' => ['sentence' => 'Das Wechselgeld, bitte', 'correct' => ['das', 'Wechselgeld', 'bitte'], 'extra' => ['in bar', 'Saft']],
                            'ja' => ['sentence' => 'おつりをお願いします', 'correct' => ['おつり', 'を', 'お願いします'], 'extra' => ['現金で']],
                            'ko' => ['sentence' => '거스름돈 부탁합니다', 'correct' => ['거스름돈', '부탁합니다'], 'extra' => ['현금으로']],
                            'fr' => ['sentence' => 'La monnaie, s\'il vous plaît', 'correct' => ['la', 'monnaie', "s'il vous plaît"], 'extra' => ['en espèces']],
                            'tr' => ['sentence' => 'para üstü lütfen', 'correct' => ['para', 'üstü', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'сдача пожалуйста', 'correct' => ['сдача', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'الباقي من فضلك', 'correct' => ['الباقي', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'qalıq zəhmət olmasa', 'correct' => ['qalıq', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'wine', 'and', 'a', 'juice'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un vino y un zumo', 'correct' => ['un', 'vino', 'y', 'un', 'zumo'], 'extra' => ['cambio']],
                            'de' => ['sentence' => 'Ein Wein und ein Saft', 'correct' => ['ein', 'Wein', 'und', 'ein', 'Saft'], 'extra' => ['Wechselgeld']],
                            'ja' => ['sentence' => 'ワインとジュース', 'correct' => ['ワイン', 'と', 'ジュース'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '와인과 주스', 'correct' => ['와인과', '주스'], 'extra' => ['거스름돈']],
                            'fr' => ['sentence' => 'Un vin et un jus', 'correct' => ['un', 'vin', 'et', 'un', 'jus'], 'extra' => ['monnaie']],
                            'tr' => ['sentence' => 'bir şarap ve bir meyve suyu', 'correct' => ['bir', 'şarap', 've', 'bir', 'meyve', 'suyu'], 'extra' => []],
                        'ru' => ['sentence' => 'вино и сок', 'correct' => ['вино', 'и', 'сок'], 'extra' => []],
                        'ar' => ['sentence' => 'نبيذ و عصير', 'correct' => ['نبيذ', 'و', 'عصير'], 'extra' => []],
                        'az' => ['sentence' => 'bir şərab və bir şirə', 'correct' => ['bir', 'şərab', 'və', 'bir', 'şirə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: The Tip and The Receipt', 3,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Cake', 'img' => 'cake']],
                plain: [['en' => 'Tip'], ['en' => 'Receipt']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'tip', 'is', 'on', 'the', 'table'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La propina está en la mesa', 'correct' => ['la', 'propina', 'está', 'sobre', 'la', 'mesa'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Das Trinkgeld ist auf dem Tisch', 'correct' => ['das', 'Trinkgeld', 'ist', 'auf', 'dem', 'Tisch'], 'extra' => ['Quittung']],
                            'ja' => ['sentence' => 'チップはテーブルの上にあります', 'correct' => ['チップ', 'は', 'テーブル', 'の上に', 'あります'], 'extra' => ['レシート']],
                            'ko' => ['sentence' => '팁은 테이블 위에 있습니다', 'correct' => ['팁은', '테이블', '위에', '있습니다'], 'extra' => ['영수증']],
                            'fr' => ['sentence' => 'Le pourboire est sur la table', 'correct' => ['le', 'pourboire', 'est', 'sur', 'la', 'table'], 'extra' => ['reçu']],
                            'tr' => ['sentence' => 'bahşiş masada', 'correct' => ['bahşiş', 'masada'], 'extra' => []],
                        'ru' => ['sentence' => 'чаевые на стол', 'correct' => ['чаевые', 'на', 'стол'], 'extra' => []],
                        'ar' => ['sentence' => 'بقشيش على طاولة', 'correct' => ['بقشيش', 'على', 'طاولة'], 'extra' => []],
                        'az' => ['sentence' => 'çaypulu üzərində masa', 'correct' => ['çaypulu', 'üzərində', 'masa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'receipt', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['propina', 'café']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Trinkgeld', 'Kaffee']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['チップ']],
                            'ko' => ['sentence' => '영수증 부탁합니다', 'correct' => ['영수증', '부탁합니다'], 'extra' => ['팁']],
                            'fr' => ['sentence' => "Le reçu, s'il vous plaît", 'correct' => ['le', 'reçu', "s'il vous plaît"], 'extra' => ['pourboire']],
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'coffee', 'with', 'a', 'cake'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un café con un pastel', 'correct' => ['un', 'café', 'con', 'un', 'pastel'], 'extra' => ['propina']],
                            'de' => ['sentence' => 'Ein Kaffee mit einem Kuchen', 'correct' => ['ein', 'Kaffee', 'mit', 'einem', 'Kuchen'], 'extra' => ['Trinkgeld']],
                            'ja' => ['sentence' => 'ケーキと一緒にコーヒー', 'correct' => ['ケーキ', 'と一緒に', 'コーヒー'], 'extra' => ['チップ']],
                            'ko' => ['sentence' => '케이크와 함께 커피', 'correct' => ['케이크와', '함께', '커피'], 'extra' => ['팁']],
                            'fr' => ['sentence' => 'Un café avec un gâteau', 'correct' => ['un', 'café', 'avec', 'un', 'gâteau'], 'extra' => ['pourboire']],
                            'tr' => ['sentence' => 'pastalı bir kahve', 'correct' => ['pastalı', 'bir', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'кофе с торт', 'correct' => ['кофе', 'с', 'торт'], 'extra' => []],
                        'ar' => ['sentence' => 'قهوة مع كعكة', 'correct' => ['قهوة', 'مع', 'كعكة'], 'extra' => []],
                        'az' => ['sentence' => 'bir qəhvə ilə bir tort', 'correct' => ['bir', 'qəhvə', 'ilə', 'bir', 'tort'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Together or Separately', 4,
                pictures: [['en' => 'Sandwich', 'img' => 'sandwich'], ['en' => 'Salad', 'img' => 'salad']],
                plain: [['en' => 'Together'], ['en' => 'Separately']],
                phrases: [
                    'a' => [
                        'words' => ['to pay', 'together', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Pagar juntos, por favor', 'correct' => ['pagar', 'juntos', 'por favor'], 'extra' => ['por separado', 'ensalada']],
                            'de' => ['sentence' => 'Zusammen bezahlen, bitte', 'correct' => ['zusammen', 'bezahlen', 'bitte'], 'extra' => ['getrennt', 'Salat']],
                            'ja' => ['sentence' => '一緒に払いたいです', 'correct' => ['一緒に', '払い', 'たいです'], 'extra' => ['別々に']],
                            'ko' => ['sentence' => '같이 계산해 주세요', 'correct' => ['같이', '계산해', '주세요'], 'extra' => ['따로']],
                            'fr' => ['sentence' => 'Payer ensemble, s\'il vous plaît', 'correct' => ['payer', 'ensemble', "s'il vous plaît"], 'extra' => ['séparément']],
                            'tr' => ['sentence' => 'birlikte ödemek lütfen', 'correct' => ['birlikte', 'ödemek', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'платить вместе пожалуйста', 'correct' => ['платить', 'вместе', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'الدفع معا من فضلك', 'correct' => ['الدفع', 'معا', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'ödəmək birlikdə zəhmət olmasa', 'correct' => ['ödəmək', 'birlikdə', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I would like', 'to pay', 'separately'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera pagar por separado', 'correct' => ['quisiera', 'pagar', 'por separado'], 'extra' => ['juntos', 'sándwich']],
                            'de' => ['sentence' => 'Ich möchte getrennt bezahlen', 'correct' => ['ich möchte', 'getrennt', 'bezahlen'], 'extra' => ['zusammen', 'Sandwich']],
                            'ja' => ['sentence' => '別々に払いたいです', 'correct' => ['別々に', '払い', 'たいです'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '따로 계산하고 싶습니다', 'correct' => ['따로', '계산하고', '싶습니다'], 'extra' => ['함께']],
                            'fr' => ['sentence' => 'Je voudrais payer séparément', 'correct' => ['je voudrais', 'payer', 'séparément'], 'extra' => ['ensemble']],
                            'tr' => ['sentence' => 'ayrı ödemek istiyorum', 'correct' => ['ayrı', 'ödemek', 'istiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я хочу платить отдельно', 'correct' => ['я', 'хочу', 'платить', 'отдельно'], 'extra' => []],
                        'ar' => ['sentence' => 'أريد الدفع منفصل', 'correct' => ['أريد', 'الدفع', 'منفصل'], 'extra' => []],
                        'az' => ['sentence' => 'istəyirəm ödəmək ayrıca', 'correct' => ['istəyirəm', 'ödəmək', 'ayrıca'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'sandwich', 'and', 'a', 'salad'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un sándwich y una ensalada', 'correct' => ['un', 'sándwich', 'y', 'una', 'ensalada'], 'extra' => ['juntos']],
                            'de' => ['sentence' => 'Ein Sandwich und ein Salat', 'correct' => ['ein', 'Sandwich', 'und', 'ein', 'Salat'], 'extra' => ['zusammen']],
                            'ja' => ['sentence' => 'サンドイッチとサラダ', 'correct' => ['サンドイッチ', 'と', 'サラダ'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '샌드위치와 샐러드', 'correct' => ['샌드위치와', '샐러드'], 'extra' => ['함께']],
                            'fr' => ['sentence' => 'Un sandwich et une salade', 'correct' => ['un', 'sandwich', 'et', 'une', 'salade'], 'extra' => ['ensemble']],
                            'tr' => ['sentence' => 'bir sandviç ve bir salata', 'correct' => ['bir', 'sandviç', 've', 'bir', 'salata'], 'extra' => []],
                        'ru' => ['sentence' => 'сэндвич и салат', 'correct' => ['сэндвич', 'и', 'салат'], 'extra' => []],
                        'ar' => ['sentence' => 'شطيرة و سلطة', 'correct' => ['شطيرة', 'و', 'سلطة'], 'extra' => []],
                        'az' => ['sentence' => 'bir sendviç və bir salat', 'correct' => ['bir', 'sendviç', 'və', 'bir', 'salat'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Excuse Me, I Pay Now', 5,
                pictures: [['en' => 'Plate', 'img' => 'plate'], ['en' => 'Menu', 'img' => 'menu']],
                plain: [['en' => 'Excuse me'], ['en' => 'I pay']],
                phrases: [
                    'a' => [
                        'words' => ['excuse me', 'the bill', 'please'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Disculpe, la cuenta por favor', 'correct' => ['disculpe', 'la cuenta', 'por favor'], 'extra' => ['pago', 'plato']],
                            'de' => ['sentence' => 'Entschuldigen Sie, die Rechnung bitte', 'correct' => ['entschuldigen Sie', 'die Rechnung', 'bitte'], 'extra' => ['ich bezahle', 'Teller']],
                            'ja' => ['sentence' => 'すみません、お会計をお願いします', 'correct' => ['すみません', 'お会計', 'を', 'お願いします'], 'extra' => ['私が払う']],
                            'ko' => ['sentence' => '실례합니다, 계산서 부탁합니다', 'correct' => ['실례합니다', '계산서', '부탁합니다'], 'extra' => ['제가 냅니다']],
                            'fr' => ['sentence' => "Excusez-moi, l'addition s'il vous plaît", 'correct' => ['excusez-moi', "l'addition", "s'il vous plaît"], 'extra' => ['je paie']],
                            'tr' => ['sentence' => 'affedersiniz hesap lütfen', 'correct' => ['affedersiniz', 'hesap', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'извините счёт пожалуйста', 'correct' => ['извините', 'счёт', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'عفوا الحساب من فضلك', 'correct' => ['عفوا', 'الحساب', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'bağışlayın hesab zəhmət olmasa', 'correct' => ['bağışlayın', 'hesab', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I pay', 'now'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Pago ahora', 'correct' => ['pago', 'ahora'], 'extra' => ['disculpe', 'menú']],
                            'de' => ['sentence' => 'Ich bezahle jetzt', 'correct' => ['ich bezahle', 'jetzt'], 'extra' => ['entschuldigen Sie', 'Menü']],
                            'ja' => ['sentence' => '今払います', 'correct' => ['今', '払います'], 'extra' => ['すみません']],
                            'ko' => ['sentence' => '지금 냅니다', 'correct' => ['지금', '냅니다'], 'extra' => ['실례합니다']],
                            'fr' => ['sentence' => 'Je paie maintenant', 'correct' => ['je paie', 'maintenant'], 'extra' => ['excusez-moi']],
                            'tr' => ['sentence' => 'şimdi ödüyorum', 'correct' => ['şimdi', 'ödüyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я плачу сейчас', 'correct' => ['я плачу', 'сейчас'], 'extra' => []],
                        'ar' => ['sentence' => 'أدفع الآن', 'correct' => ['أدفع', 'الآن'], 'extra' => []],
                        'az' => ['sentence' => 'ödəyirəm indi', 'correct' => ['ödəyirəm', 'indi'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'plate', 'and', 'a', 'menu'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un plato y un menú', 'correct' => ['un', 'plato', 'y', 'un', 'menú'], 'extra' => ['pago']],
                            'de' => ['sentence' => 'Ein Teller und ein Menü', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Menü'], 'extra' => ['ich bezahle']],
                            'ja' => ['sentence' => 'お皿とメニュー', 'correct' => ['お皿', 'と', 'メニュー'], 'extra' => ['私が払う']],
                            'ko' => ['sentence' => '접시와 메뉴', 'correct' => ['접시와', '메뉴'], 'extra' => ['제가 냅니다']],
                            'fr' => ['sentence' => 'Une assiette et un menu', 'correct' => ['une', 'assiette', 'et', 'un', 'menu'], 'extra' => ['je paie']],
                            'tr' => ['sentence' => 'bir tabak ve bir menü', 'correct' => ['bir', 'tabak', 've', 'bir', 'menü'], 'extra' => []],
                        'ru' => ['sentence' => 'тарелка и меню', 'correct' => ['тарелка', 'и', 'меню'], 'extra' => []],
                        'ar' => ['sentence' => 'صحن و قائمة الطعام', 'correct' => ['صحن', 'و', 'قائمة الطعام'], 'extra' => []],
                        'az' => ['sentence' => 'bir boşqab və bir menyu', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'menyu'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
