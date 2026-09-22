<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant03Seeder extends Seeder
{
    private const PICTURES = [
        'Argent' => 'money', 'Menu' => 'menu', 'Vin' => 'wine', 'Jus' => 'juice',
        'Café' => 'coffee', 'Gâteau' => 'cake', 'Sandwich' => 'sandwich',
        'Salade' => 'salad', 'Assiette' => 'plate',
    ];

    /**
     * French Chapter 3, Unit 3 — paying.
     *
     * The end of a meal is where a learner is most likely to freeze, so this
     * unit drills the four things they actually have to say out loud: ask for
     * the bill, say how they are paying, ask for the change or the receipt, and
     * say whether the table is paying together or separately.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Paying the Bill', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Bill', 1,
                pictures: [['fr' => 'Argent', 'img' => 'money'], ['fr' => 'Menu', 'img' => 'menu']],
                plain: [['fr' => "L'addition"], ['fr' => 'Payer']],
                phrases: [
                    'a' => [
                        'words' => ["l'addition", "s'il vous plaît"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The bill, please', 'correct' => ['the bill', 'please'], 'extra' => ['money', 'to pay']],
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['pul', 'ödəmək']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['نقود', 'الدفع']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['деньги', 'платить']],
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['dinero', 'pagar']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Geld', 'bezahlen']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['돈']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['para', 'ödemek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je voudrais', 'payer', 'avec', 'mon', 'argent'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to pay with my money', 'correct' => ['I would like', 'to pay', 'with', 'my', 'money'], 'extra' => ['the bill']],
                            'az' => ['sentence' => 'istəyirəm ödəmək ilə mənim pul', 'correct' => ['istəyirəm', 'ödəmək', 'ilə', 'mənim', 'pul'], 'extra' => ['hesab']],
                            'ar' => ['sentence' => 'أريد الدفع مع نقود', 'correct' => ['أريد', 'الدفع', 'مع', 'نقود'], 'extra' => ['الحساب']],
                            'ru' => ['sentence' => 'я хочу платить с мой деньги', 'correct' => ['я', 'хочу', 'платить', 'с', 'мой', 'деньги'], 'extra' => ['счёт']],
                            'es' => ['sentence' => 'Quisiera pagar con mi dinero', 'correct' => ['quisiera', 'pagar', 'con', 'mi', 'dinero'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Ich möchte mit meinem Geld bezahlen', 'correct' => ['ich möchte', 'mit', 'meinem', 'Geld', 'bezahlen'], 'extra' => ['die Rechnung']],
                            'ja' => ['sentence' => '私のお金で払いたいです', 'correct' => ['私の', 'お金', 'で', '払い', 'たいです'], 'extra' => ['お会計']],
                            'ko' => ['sentence' => '제 돈으로 지불하고 싶습니다', 'correct' => ['제', '돈으로', '지불하고', '싶습니다'], 'extra' => ['계산서']],
                            'tr' => ['sentence' => 'paramla ödemek istiyorum', 'correct' => ['paramla', 'ödemek', 'istiyorum'], 'extra' => ['hesap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'menu', 'et', "l'addition"], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The menu and the bill', 'correct' => ['the', 'menu', 'and', 'the bill'], 'extra' => ['to pay', 'money']],
                            'az' => ['sentence' => 'menyu və hesab', 'correct' => ['menyu', 'və', 'hesab'], 'extra' => ['ödəmək', 'pul']],
                            'ar' => ['sentence' => 'قائمة الطعام و الحساب', 'correct' => ['قائمة الطعام', 'و', 'الحساب'], 'extra' => ['الدفع', 'نقود']],
                            'ru' => ['sentence' => 'меню и счёт', 'correct' => ['меню', 'и', 'счёт'], 'extra' => ['платить', 'деньги']],
                            'es' => ['sentence' => 'El menú y la cuenta', 'correct' => ['el', 'menú', 'y', 'la cuenta'], 'extra' => ['pagar', 'dinero']],
                            'de' => ['sentence' => 'Das Menü und die Rechnung', 'correct' => ['das', 'Menü', 'und', 'die Rechnung'], 'extra' => ['bezahlen', 'Geld']],
                            'ja' => ['sentence' => 'メニューとお会計', 'correct' => ['メニュー', 'と', 'お会計'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '메뉴와 계산서', 'correct' => ['메뉴와', '계산서'], 'extra' => ['돈']],
                            'tr' => ['sentence' => 'menü ve hesap', 'correct' => ['menü', 've', 'hesap'], 'extra' => ['ödemek', 'para']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Cash and Change', 2,
                pictures: [['fr' => 'Vin', 'img' => 'wine'], ['fr' => 'Jus', 'img' => 'juice']],
                plain: [['fr' => 'En espèces'], ['fr' => 'Monnaie']],
                phrases: [
                    'a' => [
                        'words' => ['je paie', 'en espèces'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I pay in cash', 'correct' => ['I pay', 'in cash'], 'extra' => ['change', 'wine']],
                            'az' => ['sentence' => 'ödəyirəm içində nağd', 'correct' => ['ödəyirəm', 'içində', 'nağd'], 'extra' => ['qalıq', 'şərab']],
                            'ar' => ['sentence' => 'أدفع في كاش', 'correct' => ['أدفع', 'في', 'كاش'], 'extra' => ['الباقي', 'نبيذ']],
                            'ru' => ['sentence' => 'я плачу в наличные', 'correct' => ['я плачу', 'в', 'наличные'], 'extra' => ['сдача', 'вино']],
                            'es' => ['sentence' => 'Pago en efectivo', 'correct' => ['pago', 'en efectivo'], 'extra' => ['cambio', 'vino']],
                            'de' => ['sentence' => 'Ich bezahle in bar', 'correct' => ['ich bezahle', 'in bar'], 'extra' => ['Wechselgeld', 'Wein']],
                            'ja' => ['sentence' => '私は現金で払います', 'correct' => ['私', 'は', '現金で', '払います'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '저는 현금으로 냅니다', 'correct' => ['저는', '현금으로', '냅니다'], 'extra' => ['거스름돈']],
                            'tr' => ['sentence' => 'nakit ödüyorum', 'correct' => ['nakit', 'ödüyorum'], 'extra' => ['para üstü', 'şarap']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'monnaie', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The change, please', 'correct' => ['the', 'change', 'please'], 'extra' => ['in cash', 'juice']],
                            'az' => ['sentence' => 'qalıq zəhmət olmasa', 'correct' => ['qalıq', 'zəhmət olmasa'], 'extra' => ['içində', 'nağd', 'şirə']],
                            'ar' => ['sentence' => 'الباقي من فضلك', 'correct' => ['الباقي', 'من فضلك'], 'extra' => ['في', 'كاش', 'عصير']],
                            'ru' => ['sentence' => 'сдача пожалуйста', 'correct' => ['сдача', 'пожалуйста'], 'extra' => ['в', 'наличные', 'сок']],
                            'es' => ['sentence' => 'El cambio, por favor', 'correct' => ['el', 'cambio', 'por favor'], 'extra' => ['en efectivo', 'zumo']],
                            'de' => ['sentence' => 'Das Wechselgeld, bitte', 'correct' => ['das', 'Wechselgeld', 'bitte'], 'extra' => ['in bar', 'Saft']],
                            'ja' => ['sentence' => 'おつりをお願いします', 'correct' => ['おつり', 'を', 'お願いします'], 'extra' => ['現金で']],
                            'ko' => ['sentence' => '거스름돈 부탁합니다', 'correct' => ['거스름돈', '부탁합니다'], 'extra' => ['현금으로']],
                            'tr' => ['sentence' => 'para üstü lütfen', 'correct' => ['para', 'üstü', 'lütfen'], 'extra' => ['nakit', 'meyve suyu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'vin', 'et', 'un', 'jus'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A wine and a juice', 'correct' => ['a', 'wine', 'and', 'a', 'juice'], 'extra' => ['change', 'in cash']],
                            'az' => ['sentence' => 'bir şərab və bir şirə', 'correct' => ['bir', 'şərab', 'və', 'bir', 'şirə'], 'extra' => ['qalıq', 'içində', 'nağd']],
                            'ar' => ['sentence' => 'نبيذ و عصير', 'correct' => ['نبيذ', 'و', 'عصير'], 'extra' => ['الباقي', 'في', 'كاش']],
                            'ru' => ['sentence' => 'вино и сок', 'correct' => ['вино', 'и', 'сок'], 'extra' => ['сдача', 'в', 'наличные']],
                            'es' => ['sentence' => 'Un vino y un zumo', 'correct' => ['un', 'vino', 'y', 'un', 'zumo'], 'extra' => ['cambio', 'en efectivo']],
                            'de' => ['sentence' => 'Ein Wein und ein Saft', 'correct' => ['ein', 'Wein', 'und', 'ein', 'Saft'], 'extra' => ['Wechselgeld', 'in bar']],
                            'ja' => ['sentence' => 'ワインとジュース', 'correct' => ['ワイン', 'と', 'ジュース'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '와인과 주스', 'correct' => ['와인과', '주스'], 'extra' => ['거스름돈']],
                            'tr' => ['sentence' => 'bir şarap ve bir meyve suyu', 'correct' => ['bir', 'şarap', 've', 'bir', 'meyve', 'suyu'], 'extra' => ['para üstü', 'nakit']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: The Tip and The Receipt', 3,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Gâteau', 'img' => 'cake']],
                plain: [['fr' => 'Pourboire'], ['fr' => 'Reçu']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'pourboire', 'est', 'sur', 'la', 'table'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The tip is on the table', 'correct' => ['the', 'tip', 'is', 'on', 'the', 'table'], 'extra' => ['receipt']],
                            'az' => ['sentence' => 'çaypulu üzərində masa', 'correct' => ['çaypulu', 'üzərində', 'masa'], 'extra' => ['qəbz']],
                            'ar' => ['sentence' => 'بقشيش على طاولة', 'correct' => ['بقشيش', 'على', 'طاولة'], 'extra' => ['إيصال']],
                            'ru' => ['sentence' => 'чаевые на стол', 'correct' => ['чаевые', 'на', 'стол'], 'extra' => ['чек']],
                            'es' => ['sentence' => 'La propina está en la mesa', 'correct' => ['la', 'propina', 'está', 'en', 'la', 'mesa'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Das Trinkgeld ist auf dem Tisch', 'correct' => ['das', 'Trinkgeld', 'ist', 'auf', 'dem', 'Tisch'], 'extra' => ['Quittung']],
                            'ja' => ['sentence' => 'チップはテーブルの上にあります', 'correct' => ['チップ', 'は', 'テーブル', 'の上に', 'あります'], 'extra' => ['レシート']],
                            'ko' => ['sentence' => '팁은 테이블 위에 있습니다', 'correct' => ['팁은', '테이블', '위에', '있습니다'], 'extra' => ['영수증']],
                            'tr' => ['sentence' => 'bahşiş masada', 'correct' => ['bahşiş', 'masada'], 'extra' => ['fiş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'reçu', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The receipt, please', 'correct' => ['the', 'receipt', 'please'], 'extra' => ['tip', 'coffee']],
                            'az' => ['sentence' => 'qəbz zəhmət olmasa', 'correct' => ['qəbz', 'zəhmət olmasa'], 'extra' => ['çaypulu', 'qəhvə']],
                            'ar' => ['sentence' => 'إيصال من فضلك', 'correct' => ['إيصال', 'من فضلك'], 'extra' => ['بقشيش', 'قهوة']],
                            'ru' => ['sentence' => 'чек пожалуйста', 'correct' => ['чек', 'пожалуйста'], 'extra' => ['чаевые', 'кофе']],
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['propina', 'café']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Trinkgeld', 'Kaffee']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['チップ']],
                            'ko' => ['sentence' => '영수증 부탁합니다', 'correct' => ['영수증', '부탁합니다'], 'extra' => ['팁']],
                            'tr' => ['sentence' => 'fiş lütfen', 'correct' => ['fiş', 'lütfen'], 'extra' => ['bahşiş', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'café', 'avec', 'un', 'gâteau'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee with a cake', 'correct' => ['a', 'coffee', 'with', 'a', 'cake'], 'extra' => ['tip', 'receipt']],
                            'az' => ['sentence' => 'bir qəhvə ilə bir tort', 'correct' => ['bir', 'qəhvə', 'ilə', 'bir', 'tort'], 'extra' => ['çaypulu', 'qəbz']],
                            'ar' => ['sentence' => 'قهوة مع كعكة', 'correct' => ['قهوة', 'مع', 'كعكة'], 'extra' => ['بقشيش', 'إيصال']],
                            'ru' => ['sentence' => 'кофе с торт', 'correct' => ['кофе', 'с', 'торт'], 'extra' => ['чаевые', 'чек']],
                            'es' => ['sentence' => 'Un café con un pastel', 'correct' => ['un', 'café', 'con', 'un', 'pastel'], 'extra' => ['propina', 'recibo']],
                            'de' => ['sentence' => 'Ein Kaffee mit einem Kuchen', 'correct' => ['ein', 'Kaffee', 'mit', 'einem', 'Kuchen'], 'extra' => ['Trinkgeld', 'Quittung']],
                            'ja' => ['sentence' => 'ケーキと一緒にコーヒー', 'correct' => ['ケーキ', 'と一緒に', 'コーヒー'], 'extra' => ['チップ']],
                            'ko' => ['sentence' => '케이크와 함께 커피', 'correct' => ['케이크와', '함께', '커피'], 'extra' => ['팁']],
                            'tr' => ['sentence' => 'pastalı bir kahve', 'correct' => ['pastalı', 'bir', 'kahve'], 'extra' => ['bahşiş', 'fiş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Together or Separately', 4,
                pictures: [['fr' => 'Sandwich', 'img' => 'sandwich'], ['fr' => 'Salade', 'img' => 'salad']],
                plain: [['fr' => 'Ensemble'], ['fr' => 'Séparément']],
                phrases: [
                    'a' => [
                        'words' => ['payer', 'ensemble', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To pay together, please', 'correct' => ['to pay', 'together', 'please'], 'extra' => ['separately', 'salad']],
                            'az' => ['sentence' => 'ödəmək birlikdə zəhmət olmasa', 'correct' => ['ödəmək', 'birlikdə', 'zəhmət olmasa'], 'extra' => ['ayrıca', 'salat']],
                            'ar' => ['sentence' => 'الدفع معا من فضلك', 'correct' => ['الدفع', 'معا', 'من فضلك'], 'extra' => ['منفصل', 'سلطة']],
                            'ru' => ['sentence' => 'платить вместе пожалуйста', 'correct' => ['платить', 'вместе', 'пожалуйста'], 'extra' => ['отдельно', 'салат']],
                            'es' => ['sentence' => 'Pagar juntos, por favor', 'correct' => ['pagar', 'juntos', 'por favor'], 'extra' => ['por separado', 'ensalada']],
                            'de' => ['sentence' => 'Zusammen bezahlen, bitte', 'correct' => ['zusammen', 'bezahlen', 'bitte'], 'extra' => ['getrennt', 'Salat']],
                            'ja' => ['sentence' => '一緒に払いたいです', 'correct' => ['一緒に', '払い', 'たいです'], 'extra' => ['別々に']],
                            'ko' => ['sentence' => '같이 계산해 주세요', 'correct' => ['같이', '계산해', '주세요'], 'extra' => ['따로']],
                            'tr' => ['sentence' => 'birlikte ödemek lütfen', 'correct' => ['birlikte', 'ödemek', 'lütfen'], 'extra' => ['ayrı', 'salata']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je voudrais', 'payer', 'séparément'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to pay separately', 'correct' => ['I would like', 'to pay', 'separately'], 'extra' => ['together', 'sandwich']],
                            'az' => ['sentence' => 'istəyirəm ödəmək ayrıca', 'correct' => ['istəyirəm', 'ödəmək', 'ayrıca'], 'extra' => ['birlikdə', 'sendviç']],
                            'ar' => ['sentence' => 'أريد الدفع منفصل', 'correct' => ['أريد', 'الدفع', 'منفصل'], 'extra' => ['معا', 'شطيرة']],
                            'ru' => ['sentence' => 'я хочу платить отдельно', 'correct' => ['я', 'хочу', 'платить', 'отдельно'], 'extra' => ['вместе', 'сэндвич']],
                            'es' => ['sentence' => 'Quisiera pagar por separado', 'correct' => ['quisiera', 'pagar', 'por separado'], 'extra' => ['juntos', 'sándwich']],
                            'de' => ['sentence' => 'Ich möchte getrennt bezahlen', 'correct' => ['ich möchte', 'getrennt', 'bezahlen'], 'extra' => ['zusammen', 'Sandwich']],
                            'ja' => ['sentence' => '別々に払いたいです', 'correct' => ['別々に', '払い', 'たいです'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '따로 계산하고 싶습니다', 'correct' => ['따로', '계산하고', '싶습니다'], 'extra' => ['같이']],
                            'tr' => ['sentence' => 'ayrı ödemek istiyorum', 'correct' => ['ayrı', 'ödemek', 'istiyorum'], 'extra' => ['birlikte', 'sandviç']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'sandwich', 'et', 'une', 'salade'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A sandwich and a salad', 'correct' => ['a', 'sandwich', 'and', 'a', 'salad'], 'extra' => ['together', 'separately']],
                            'az' => ['sentence' => 'bir sendviç və bir salat', 'correct' => ['bir', 'sendviç', 'və', 'bir', 'salat'], 'extra' => ['birlikdə', 'ayrıca']],
                            'ar' => ['sentence' => 'شطيرة و سلطة', 'correct' => ['شطيرة', 'و', 'سلطة'], 'extra' => ['معا', 'منفصل']],
                            'ru' => ['sentence' => 'сэндвич и салат', 'correct' => ['сэндвич', 'и', 'салат'], 'extra' => ['вместе', 'отдельно']],
                            'es' => ['sentence' => 'Un sándwich y una ensalada', 'correct' => ['un', 'sándwich', 'y', 'una', 'ensalada'], 'extra' => ['juntos', 'por separado']],
                            'de' => ['sentence' => 'Ein Sandwich und ein Salat', 'correct' => ['ein', 'Sandwich', 'und', 'ein', 'Salat'], 'extra' => ['zusammen', 'getrennt']],
                            'ja' => ['sentence' => 'サンドイッチとサラダ', 'correct' => ['サンドイッチ', 'と', 'サラダ'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '샌드위치와 샐러드', 'correct' => ['샌드위치와', '샐러드'], 'extra' => ['같이']],
                            'tr' => ['sentence' => 'bir sandviç ve bir salata', 'correct' => ['bir', 'sandviç', 've', 'bir', 'salata'], 'extra' => ['birlikte', 'ayrı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Excuse Me, I Pay Now', 5,
                pictures: [['fr' => 'Assiette', 'img' => 'plate'], ['fr' => 'Menu', 'img' => 'menu']],
                plain: [['fr' => 'Excusez-moi'], ['fr' => 'Je paie']],
                phrases: [
                    'a' => [
                        'words' => ['excusez-moi', "l'addition", "s'il vous plaît"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Excuse me, the bill please', 'correct' => ['excuse me', 'the bill', 'please'], 'extra' => ['I pay', 'plate']],
                            'az' => ['sentence' => 'bağışlayın hesab zəhmət olmasa', 'correct' => ['bağışlayın', 'hesab', 'zəhmət olmasa'], 'extra' => ['ödəyirəm', 'boşqab']],
                            'ar' => ['sentence' => 'عفوا الحساب من فضلك', 'correct' => ['عفوا', 'الحساب', 'من فضلك'], 'extra' => ['أدفع', 'صحن']],
                            'ru' => ['sentence' => 'извините счёт пожалуйста', 'correct' => ['извините', 'счёт', 'пожалуйста'], 'extra' => ['я плачу', 'тарелка']],
                            'es' => ['sentence' => 'Disculpe, la cuenta por favor', 'correct' => ['disculpe', 'la cuenta', 'por favor'], 'extra' => ['pago', 'plato']],
                            'de' => ['sentence' => 'Entschuldigen Sie, die Rechnung bitte', 'correct' => ['entschuldigen Sie', 'die Rechnung', 'bitte'], 'extra' => ['ich bezahle', 'Teller']],
                            'ja' => ['sentence' => 'すみません、お会計をお願いします', 'correct' => ['すみません', 'お会計', 'を', 'お願いします'], 'extra' => ['私が払う']],
                            'ko' => ['sentence' => '실례합니다, 계산서 부탁합니다', 'correct' => ['실례합니다', '계산서', '부탁합니다'], 'extra' => ['제가 냅니다']],
                            'tr' => ['sentence' => 'affedersiniz hesap lütfen', 'correct' => ['affedersiniz', 'hesap', 'lütfen'], 'extra' => ['ödüyorum', 'tabak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je paie', 'maintenant'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I pay now', 'correct' => ['I pay', 'now'], 'extra' => ['excuse me', 'menu']],
                            'az' => ['sentence' => 'ödəyirəm indi', 'correct' => ['ödəyirəm', 'indi'], 'extra' => ['bağışlayın', 'menyu']],
                            'ar' => ['sentence' => 'أدفع الآن', 'correct' => ['أدفع', 'الآن'], 'extra' => ['عفوا', 'قائمة الطعام']],
                            'ru' => ['sentence' => 'я плачу сейчас', 'correct' => ['я плачу', 'сейчас'], 'extra' => ['извините', 'меню']],
                            'es' => ['sentence' => 'Pago ahora', 'correct' => ['pago', 'ahora'], 'extra' => ['disculpe', 'menú']],
                            'de' => ['sentence' => 'Ich bezahle jetzt', 'correct' => ['ich bezahle', 'jetzt'], 'extra' => ['entschuldigen Sie', 'Menü']],
                            'ja' => ['sentence' => '今払います', 'correct' => ['今', '払います'], 'extra' => ['すみません']],
                            'ko' => ['sentence' => '지금 냅니다', 'correct' => ['지금', '냅니다'], 'extra' => ['실례합니다']],
                            'tr' => ['sentence' => 'şimdi ödüyorum', 'correct' => ['şimdi', 'ödüyorum'], 'extra' => ['affedersiniz', 'menü']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'assiette', 'et', 'un', 'menu'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A plate and a menu', 'correct' => ['a', 'plate', 'and', 'a', 'menu'], 'extra' => ['I pay', 'excuse me']],
                            'az' => ['sentence' => 'bir boşqab və bir menyu', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'menyu'], 'extra' => ['ödəyirəm', 'bağışlayın']],
                            'ar' => ['sentence' => 'صحن و قائمة الطعام', 'correct' => ['صحن', 'و', 'قائمة الطعام'], 'extra' => ['أدفع', 'عفوا']],
                            'ru' => ['sentence' => 'тарелка и меню', 'correct' => ['тарелка', 'и', 'меню'], 'extra' => ['я плачу', 'извините']],
                            'es' => ['sentence' => 'Un plato y un menú', 'correct' => ['un', 'plato', 'y', 'un', 'menú'], 'extra' => ['pago', 'disculpe']],
                            'de' => ['sentence' => 'Ein Teller und ein Menü', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Menü'], 'extra' => ['ich bezahle', 'entschuldigen Sie']],
                            'ja' => ['sentence' => 'お皿とメニュー', 'correct' => ['お皿', 'と', 'メニュー'], 'extra' => ['私が払う']],
                            'ko' => ['sentence' => '접시와 메뉴', 'correct' => ['접시와', '메뉴'], 'extra' => ['제가 냅니다']],
                            'tr' => ['sentence' => 'bir tabak ve bir menü', 'correct' => ['bir', 'tabak', 've', 'bir', 'menü'], 'extra' => ['ödüyorum', 'affedersiniz']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
