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
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['dinero', 'pagar']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Geld', 'bezahlen']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['돈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je voudrais', 'payer', 'avec', 'mon', 'argent'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to pay with my money', 'correct' => ['I would like', 'to pay', 'with', 'my', 'money'], 'extra' => ['the bill']],
                            'es' => ['sentence' => 'Quisiera pagar con mi dinero', 'correct' => ['quisiera', 'pagar', 'con', 'mi', 'dinero'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Ich möchte mit meinem Geld bezahlen', 'correct' => ['ich möchte', 'mit', 'meinem', 'Geld', 'bezahlen'], 'extra' => ['die Rechnung']],
                            'ja' => ['sentence' => '私のお金で払いたいです', 'correct' => ['私の', 'お金', 'で', '払い', 'たいです'], 'extra' => ['お会計']],
                            'ko' => ['sentence' => '제 돈으로 지불하고 싶습니다', 'correct' => ['제', '돈으로', '지불하고', '싶습니다'], 'extra' => ['계산서']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'menu', 'et', "l'addition"], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The menu and the bill', 'correct' => ['the', 'menu', 'and', 'the bill'], 'extra' => ['to pay', 'money']],
                            'es' => ['sentence' => 'El menú y la cuenta', 'correct' => ['el', 'menú', 'y', 'la cuenta'], 'extra' => ['pagar', 'dinero']],
                            'de' => ['sentence' => 'Das Menü und die Rechnung', 'correct' => ['das', 'Menü', 'und', 'die Rechnung'], 'extra' => ['bezahlen', 'Geld']],
                            'ja' => ['sentence' => 'メニューとお会計', 'correct' => ['メニュー', 'と', 'お会計'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '메뉴와 계산서', 'correct' => ['메뉴와', '계산서'], 'extra' => ['돈']],
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
                            'es' => ['sentence' => 'Pago en efectivo', 'correct' => ['pago', 'en efectivo'], 'extra' => ['cambio', 'vino']],
                            'de' => ['sentence' => 'Ich bezahle in bar', 'correct' => ['ich bezahle', 'in bar'], 'extra' => ['Wechselgeld', 'Wein']],
                            'ja' => ['sentence' => '私は現金で払います', 'correct' => ['私', 'は', '現金で', '払います'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '저는 현금으로 냅니다', 'correct' => ['저는', '현금으로', '냅니다'], 'extra' => ['거스름돈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'monnaie', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The change, please', 'correct' => ['the', 'change', 'please'], 'extra' => ['in cash', 'juice']],
                            'es' => ['sentence' => 'El cambio, por favor', 'correct' => ['el', 'cambio', 'por favor'], 'extra' => ['en efectivo', 'zumo']],
                            'de' => ['sentence' => 'Das Wechselgeld, bitte', 'correct' => ['das', 'Wechselgeld', 'bitte'], 'extra' => ['in bar', 'Saft']],
                            'ja' => ['sentence' => 'おつりをお願いします', 'correct' => ['おつり', 'を', 'お願いします'], 'extra' => ['現金で']],
                            'ko' => ['sentence' => '거스름돈 부탁합니다', 'correct' => ['거스름돈', '부탁합니다'], 'extra' => ['현금으로']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'vin', 'et', 'un', 'jus'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A wine and a juice', 'correct' => ['a', 'wine', 'and', 'a', 'juice'], 'extra' => ['change', 'in cash']],
                            'es' => ['sentence' => 'Un vino y un zumo', 'correct' => ['un', 'vino', 'y', 'un', 'zumo'], 'extra' => ['cambio', 'en efectivo']],
                            'de' => ['sentence' => 'Ein Wein und ein Saft', 'correct' => ['ein', 'Wein', 'und', 'ein', 'Saft'], 'extra' => ['Wechselgeld', 'in bar']],
                            'ja' => ['sentence' => 'ワインとジュース', 'correct' => ['ワイン', 'と', 'ジュース'], 'extra' => ['おつり']],
                            'ko' => ['sentence' => '와인과 주스', 'correct' => ['와인과', '주스'], 'extra' => ['거스름돈']],
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
                            'es' => ['sentence' => 'La propina está en la mesa', 'correct' => ['la', 'propina', 'está', 'en', 'la', 'mesa'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Das Trinkgeld ist auf dem Tisch', 'correct' => ['das', 'Trinkgeld', 'ist', 'auf', 'dem', 'Tisch'], 'extra' => ['Quittung']],
                            'ja' => ['sentence' => 'チップはテーブルの上にあります', 'correct' => ['チップ', 'は', 'テーブル', 'の上に', 'あります'], 'extra' => ['レシート']],
                            'ko' => ['sentence' => '팁은 테이블 위에 있습니다', 'correct' => ['팁은', '테이블', '위에', '있습니다'], 'extra' => ['영수증']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'reçu', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The receipt, please', 'correct' => ['the', 'receipt', 'please'], 'extra' => ['tip', 'coffee']],
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['propina', 'café']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Trinkgeld', 'Kaffee']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['チップ']],
                            'ko' => ['sentence' => '영수증 부탁합니다', 'correct' => ['영수증', '부탁합니다'], 'extra' => ['팁']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'café', 'avec', 'un', 'gâteau'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee with a cake', 'correct' => ['a', 'coffee', 'with', 'a', 'cake'], 'extra' => ['tip', 'receipt']],
                            'es' => ['sentence' => 'Un café con un pastel', 'correct' => ['un', 'café', 'con', 'un', 'pastel'], 'extra' => ['propina', 'recibo']],
                            'de' => ['sentence' => 'Ein Kaffee mit einem Kuchen', 'correct' => ['ein', 'Kaffee', 'mit', 'einem', 'Kuchen'], 'extra' => ['Trinkgeld', 'Quittung']],
                            'ja' => ['sentence' => 'ケーキと一緒にコーヒー', 'correct' => ['ケーキ', 'と一緒に', 'コーヒー'], 'extra' => ['チップ']],
                            'ko' => ['sentence' => '케이크와 함께 커피', 'correct' => ['케이크와', '함께', '커피'], 'extra' => ['팁']],
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
                            'es' => ['sentence' => 'Pagar juntos, por favor', 'correct' => ['pagar', 'juntos', 'por favor'], 'extra' => ['por separado', 'ensalada']],
                            'de' => ['sentence' => 'Zusammen bezahlen, bitte', 'correct' => ['zusammen', 'bezahlen', 'bitte'], 'extra' => ['getrennt', 'Salat']],
                            'ja' => ['sentence' => '一緒に払いたいです', 'correct' => ['一緒に', '払い', 'たいです'], 'extra' => ['別々に']],
                            'ko' => ['sentence' => '같이 계산해 주세요', 'correct' => ['같이', '계산해', '주세요'], 'extra' => ['따로']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je voudrais', 'payer', 'séparément'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to pay separately', 'correct' => ['I would like', 'to pay', 'separately'], 'extra' => ['together', 'sandwich']],
                            'es' => ['sentence' => 'Quisiera pagar por separado', 'correct' => ['quisiera', 'pagar', 'por separado'], 'extra' => ['juntos', 'sándwich']],
                            'de' => ['sentence' => 'Ich möchte getrennt bezahlen', 'correct' => ['ich möchte', 'getrennt', 'bezahlen'], 'extra' => ['zusammen', 'Sandwich']],
                            'ja' => ['sentence' => '別々に払いたいです', 'correct' => ['別々に', '払い', 'たいです'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '따로 계산하고 싶습니다', 'correct' => ['따로', '계산하고', '싶습니다'], 'extra' => ['같이']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'sandwich', 'et', 'une', 'salade'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A sandwich and a salad', 'correct' => ['a', 'sandwich', 'and', 'a', 'salad'], 'extra' => ['together', 'separately']],
                            'es' => ['sentence' => 'Un sándwich y una ensalada', 'correct' => ['un', 'sándwich', 'y', 'una', 'ensalada'], 'extra' => ['juntos', 'por separado']],
                            'de' => ['sentence' => 'Ein Sandwich und ein Salat', 'correct' => ['ein', 'Sandwich', 'und', 'ein', 'Salat'], 'extra' => ['zusammen', 'getrennt']],
                            'ja' => ['sentence' => 'サンドイッチとサラダ', 'correct' => ['サンドイッチ', 'と', 'サラダ'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '샌드위치와 샐러드', 'correct' => ['샌드위치와', '샐러드'], 'extra' => ['같이']],
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
                            'es' => ['sentence' => 'Disculpe, la cuenta por favor', 'correct' => ['disculpe', 'la cuenta', 'por favor'], 'extra' => ['pago', 'plato']],
                            'de' => ['sentence' => 'Entschuldigen Sie, die Rechnung bitte', 'correct' => ['entschuldigen Sie', 'die Rechnung', 'bitte'], 'extra' => ['ich bezahle', 'Teller']],
                            'ja' => ['sentence' => 'すみません、お会計をお願いします', 'correct' => ['すみません', 'お会計', 'を', 'お願いします'], 'extra' => ['私が払う']],
                            'ko' => ['sentence' => '실례합니다, 계산서 부탁합니다', 'correct' => ['실례합니다', '계산서', '부탁합니다'], 'extra' => ['제가 냅니다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je paie', 'maintenant'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I pay now', 'correct' => ['I pay', 'now'], 'extra' => ['excuse me', 'menu']],
                            'es' => ['sentence' => 'Pago ahora', 'correct' => ['pago', 'ahora'], 'extra' => ['disculpe', 'menú']],
                            'de' => ['sentence' => 'Ich bezahle jetzt', 'correct' => ['ich bezahle', 'jetzt'], 'extra' => ['entschuldigen Sie', 'Menü']],
                            'ja' => ['sentence' => '今払います', 'correct' => ['今', '払います'], 'extra' => ['すみません']],
                            'ko' => ['sentence' => '지금 냅니다', 'correct' => ['지금', '냅니다'], 'extra' => ['실례합니다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'assiette', 'et', 'un', 'menu'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A plate and a menu', 'correct' => ['a', 'plate', 'and', 'a', 'menu'], 'extra' => ['I pay', 'excuse me']],
                            'es' => ['sentence' => 'Un plato y un menú', 'correct' => ['un', 'plato', 'y', 'un', 'menú'], 'extra' => ['pago', 'disculpe']],
                            'de' => ['sentence' => 'Ein Teller und ein Menü', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Menü'], 'extra' => ['ich bezahle', 'entschuldigen Sie']],
                            'ja' => ['sentence' => 'お皿とメニュー', 'correct' => ['お皿', 'と', 'メニュー'], 'extra' => ['私が払う']],
                            'ko' => ['sentence' => '접시와 메뉴', 'correct' => ['접시와', '메뉴'], 'extra' => ['제가 냅니다']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
