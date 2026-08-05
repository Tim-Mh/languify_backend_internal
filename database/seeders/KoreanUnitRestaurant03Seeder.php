<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant03Seeder extends Seeder
{
    private const PICTURES = ['돈' => 'money', '메뉴' => 'menu', '와인' => 'wine', '주스' => 'juice', '커피' => 'coffee', '케이크' => 'cake', '샌드위치' => 'sandwich', '샐러드' => 'salad', '접시' => 'plate'];

    /**
     * Korean Restaurant, Unit 3, the Korean twin of the English "Paying the Bill" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, '유닛 3: 계산하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 돈 · 메뉴', 1,
                pictures: [['ko' => '돈', 'img' => 'money'], ['ko' => '메뉴', 'img' => 'menu']],
                plain: [['ko' => '계산서'], ['ko' => '지불하다']],
                phrases: [
                    'a' => [
                        'words' => ['계산서', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the bill please', 'correct' => ['the bill', 'please'], 'extra' => ['money']],
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['dinero', 'pagar']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Geld', 'bezahlen']],
                            'fr' => ['sentence' => 'L\'addition, s\'il vous plaît', 'correct' => ['l\'addition', 's\'il vous plaît'], 'extra' => ['argent', 'payer']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['お金']],
                        ],
                    ],
                    'b' => [
                        'words' => ['돈으로', '지불하고', '싶습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to pay with money', 'correct' => ['I would like', 'to pay', 'with', 'money'], 'extra' => ['the bill']],
                            'es' => ['sentence' => 'Quisiera pagar con dinero', 'correct' => ['quisiera', 'pagar', 'con', 'dinero'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Ich möchte mit Geld bezahlen', 'correct' => ['ich möchte', 'mit', 'Geld', 'bezahlen'], 'extra' => ['die Rechnung']],
                            'fr' => ['sentence' => 'Je voudrais payer avec de l\'argent', 'correct' => ['je voudrais', 'payer', 'avec', 'argent'], 'extra' => ['l\'addition']],
                            'ja' => ['sentence' => 'お金で払いたいです', 'correct' => ['お金', 'で', '払い', 'たいです'], 'extra' => ['お会計']],
                        ],
                    ],
                    'c' => [
                        'words' => ['메뉴와', '계산서'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the menu and the bill', 'correct' => ['the', 'menu', 'and', 'the bill'], 'extra' => ['money']],
                            'es' => ['sentence' => 'El menú y la cuenta', 'correct' => ['el', 'menú', 'y', 'la cuenta'], 'extra' => ['pagar']],
                            'de' => ['sentence' => 'Das Menü und die Rechnung', 'correct' => ['das', 'Menü', 'und', 'die Rechnung'], 'extra' => ['bezahlen']],
                            'fr' => ['sentence' => 'Le menu et l\'addition', 'correct' => ['le', 'menu', 'et', 'l\'addition'], 'extra' => ['payer']],
                            'ja' => ['sentence' => 'メニューとお会計', 'correct' => ['メニュー', 'と', 'お会計'], 'extra' => ['お金']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 와인 · 주스', 2,
                pictures: [['ko' => '와인', 'img' => 'wine'], ['ko' => '주스', 'img' => 'juice']],
                plain: [['ko' => '현금으로'], ['ko' => '거스름돈']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '현금으로', '냅니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I pay in cash', 'correct' => ['I pay', 'in', 'cash'], 'extra' => ['change']],
                            'es' => ['sentence' => 'Pago en efectivo', 'correct' => ['pago', 'en', 'en efectivo'], 'extra' => ['cambio', 'vino']],
                            'de' => ['sentence' => 'Ich bezahle in bar', 'correct' => ['ich bezahle', 'in', 'in bar'], 'extra' => ['Wechselgeld', 'Wein']],
                            'fr' => ['sentence' => 'Je paie en espèces', 'correct' => ['je paie', 'dans', 'en espèces'], 'extra' => ['monnaie', 'vin']],
                            'ja' => ['sentence' => '私は現金で払います', 'correct' => ['私', 'は', '現金で', '払います'], 'extra' => ['おつり']],
                        ],
                    ],
                    'b' => [
                        'words' => ['거스름돈', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the change please', 'correct' => ['the', 'change', 'please'], 'extra' => ['cash']],
                            'es' => ['sentence' => 'El cambio, por favor', 'correct' => ['el', 'cambio', 'por favor'], 'extra' => ['en efectivo', 'zumo']],
                            'de' => ['sentence' => 'Das Wechselgeld, bitte', 'correct' => ['das', 'Wechselgeld', 'bitte'], 'extra' => ['in bar', 'Saft']],
                            'fr' => ['sentence' => 'La monnaie, s\'il vous plaît', 'correct' => ['la', 'monnaie', 's\'il vous plaît'], 'extra' => ['en espèces']],
                            'ja' => ['sentence' => 'おつりをお願いします', 'correct' => ['おつり', 'を', 'お願いします'], 'extra' => ['現金で']],
                        ],
                    ],
                    'c' => [
                        'words' => ['와인과', '주스'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a wine and a juice', 'correct' => ['a', 'wine', 'and', 'a', 'juice'], 'extra' => ['change']],
                            'es' => ['sentence' => 'Un vino y un zumo', 'correct' => ['un', 'vino', 'y', 'un', 'zumo'], 'extra' => ['cambio']],
                            'de' => ['sentence' => 'Ein Wein und ein Saft', 'correct' => ['ein', 'Wein', 'und', 'ein', 'Saft'], 'extra' => ['Wechselgeld']],
                            'fr' => ['sentence' => 'Un vin et un jus', 'correct' => ['un', 'vin', 'et', 'un', 'jus'], 'extra' => ['monnaie']],
                            'ja' => ['sentence' => 'ワインとジュース', 'correct' => ['ワイン', 'と', 'ジュース'], 'extra' => ['おつり']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 커피 · 케이크', 3,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '케이크', 'img' => 'cake']],
                plain: [['ko' => '팁'], ['ko' => '영수증']],
                phrases: [
                    'a' => [
                        'words' => ['팁은', '테이블', '위에', '있습니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'the tip is on the table', 'correct' => ['the', 'tip', 'is', 'on', 'the', 'table'], 'extra' => ['receipt']],
                            'es' => ['sentence' => 'La propina está en la mesa', 'correct' => ['la', 'propina', 'está', 'sobre', 'la', 'mesa'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Das Trinkgeld ist auf dem Tisch', 'correct' => ['das', 'Trinkgeld', 'ist', 'auf', 'dem', 'Tisch'], 'extra' => ['Quittung']],
                            'fr' => ['sentence' => 'Le pourboire est sur la table', 'correct' => ['le', 'pourboire', 'est', 'sur', 'la', 'table'], 'extra' => ['reçu']],
                            'ja' => ['sentence' => 'チップはテーブルの上にあります', 'correct' => ['チップ', 'は', 'テーブル', 'の上に', 'あります'], 'extra' => ['レシート']],
                        ],
                    ],
                    'b' => [
                        'words' => ['영수증', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the receipt please', 'correct' => ['the', 'receipt', 'please'], 'extra' => ['tip']],
                            'es' => ['sentence' => 'El recibo, por favor', 'correct' => ['el', 'recibo', 'por favor'], 'extra' => ['propina', 'café']],
                            'de' => ['sentence' => 'Die Quittung, bitte', 'correct' => ['die', 'Quittung', 'bitte'], 'extra' => ['Trinkgeld', 'Kaffee']],
                            'fr' => ['sentence' => 'Le reçu, s\'il vous plaît', 'correct' => ['le', 'reçu', 's\'il vous plaît'], 'extra' => ['pourboire']],
                            'ja' => ['sentence' => 'レシートをお願いします', 'correct' => ['レシート', 'を', 'お願いします'], 'extra' => ['チップ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['케이크와', '함께', '커피'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee with a cake', 'correct' => ['a', 'coffee', 'with', 'a', 'cake'], 'extra' => ['tip']],
                            'es' => ['sentence' => 'Un café con un pastel', 'correct' => ['un', 'café', 'con', 'un', 'pastel'], 'extra' => ['propina']],
                            'de' => ['sentence' => 'Ein Kaffee mit einem Kuchen', 'correct' => ['ein', 'Kaffee', 'mit', 'einem', 'Kuchen'], 'extra' => ['Trinkgeld']],
                            'fr' => ['sentence' => 'Un café avec un gâteau', 'correct' => ['un', 'café', 'avec', 'un', 'gâteau'], 'extra' => ['pourboire']],
                            'ja' => ['sentence' => 'ケーキと一緒にコーヒー', 'correct' => ['ケーキ', 'と一緒に', 'コーヒー'], 'extra' => ['チップ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 샌드위치 · 샐러드', 4,
                pictures: [['ko' => '샌드위치', 'img' => 'sandwich'], ['ko' => '샐러드', 'img' => 'salad']],
                plain: [['ko' => '함께'], ['ko' => '따로']],
                phrases: [
                    'a' => [
                        'words' => ['같이', '계산해', '주세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to pay together please', 'correct' => ['to pay', 'together', 'please'], 'extra' => ['separately']],
                            'es' => ['sentence' => 'Pagar juntos, por favor', 'correct' => ['pagar', 'juntos', 'por favor'], 'extra' => ['por separado', 'ensalada']],
                            'de' => ['sentence' => 'Zusammen bezahlen, bitte', 'correct' => ['zusammen', 'bezahlen', 'bitte'], 'extra' => ['getrennt', 'Salat']],
                            'fr' => ['sentence' => 'Payer ensemble, s\'il vous plaît', 'correct' => ['payer', 'ensemble', 's\'il vous plaît'], 'extra' => ['séparément']],
                            'ja' => ['sentence' => '一緒に払いたいです', 'correct' => ['一緒に', '払い', 'たいです'], 'extra' => ['別々に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['따로', '계산하고', '싶습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to pay separately', 'correct' => ['I would like', 'to pay', 'separately'], 'extra' => ['together']],
                            'es' => ['sentence' => 'Quisiera pagar por separado', 'correct' => ['quisiera', 'pagar', 'por separado'], 'extra' => ['juntos', 'sándwich']],
                            'de' => ['sentence' => 'Ich möchte getrennt bezahlen', 'correct' => ['ich möchte', 'getrennt', 'bezahlen'], 'extra' => ['zusammen', 'Sandwich']],
                            'fr' => ['sentence' => 'Je voudrais payer séparément', 'correct' => ['je voudrais', 'payer', 'séparément'], 'extra' => ['ensemble']],
                            'ja' => ['sentence' => '別々に払いたいです', 'correct' => ['別々に', '払い', 'たいです'], 'extra' => ['一緒に']],
                        ],
                    ],
                    'c' => [
                        'words' => ['샌드위치와', '샐러드'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a sandwich and a salad', 'correct' => ['a', 'sandwich', 'and', 'a', 'salad'], 'extra' => ['together']],
                            'es' => ['sentence' => 'Un sándwich y una ensalada', 'correct' => ['un', 'sándwich', 'y', 'una', 'ensalada'], 'extra' => ['juntos']],
                            'de' => ['sentence' => 'Ein Sandwich und ein Salat', 'correct' => ['ein', 'Sandwich', 'und', 'ein', 'Salat'], 'extra' => ['zusammen']],
                            'fr' => ['sentence' => 'Un sandwich et une salade', 'correct' => ['un', 'sandwich', 'et', 'une', 'salade'], 'extra' => ['ensemble']],
                            'ja' => ['sentence' => 'サンドイッチとサラダ', 'correct' => ['サンドイッチ', 'と', 'サラダ'], 'extra' => ['一緒に']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 접시 · 메뉴', 5,
                pictures: [['ko' => '접시', 'img' => 'plate'], ['ko' => '메뉴', 'img' => 'menu']],
                plain: [['ko' => '실례합니다'], ['ko' => '제가 냅니다']],
                phrases: [
                    'a' => [
                        'words' => ['실례합니다', '계산서', '부탁합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'excuse me the bill please', 'correct' => ['excuse me', 'the bill', 'please'], 'extra' => ['I pay']],
                            'es' => ['sentence' => 'Disculpe, la cuenta por favor', 'correct' => ['disculpe', 'la cuenta', 'por favor'], 'extra' => ['pago', 'plato']],
                            'de' => ['sentence' => 'Entschuldigen Sie, die Rechnung bitte', 'correct' => ['entschuldigen Sie', 'die Rechnung', 'bitte'], 'extra' => ['ich bezahle', 'Teller']],
                            'fr' => ['sentence' => 'Excusez-moi, l\'addition s\'il vous plaît', 'correct' => ['excusez-moi', 'l\'addition', 's\'il vous plaît'], 'extra' => ['je paie']],
                            'ja' => ['sentence' => 'すみません、お会計をお願いします', 'correct' => ['すみません', 'お会計', 'を', 'お願いします'], 'extra' => ['私が払う']],
                        ],
                    ],
                    'b' => [
                        'words' => ['지금', '냅니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I pay now', 'correct' => ['I pay', 'now'], 'extra' => ['excuse me']],
                            'es' => ['sentence' => 'Pago ahora', 'correct' => ['pago', 'ahora'], 'extra' => ['disculpe', 'menú']],
                            'de' => ['sentence' => 'Ich bezahle jetzt', 'correct' => ['ich bezahle', 'jetzt'], 'extra' => ['entschuldigen Sie', 'Menü']],
                            'fr' => ['sentence' => 'Je paie maintenant', 'correct' => ['je paie', 'maintenant'], 'extra' => ['excusez-moi']],
                            'ja' => ['sentence' => '今払います', 'correct' => ['今', '払います'], 'extra' => ['すみません']],
                        ],
                    ],
                    'c' => [
                        'words' => ['접시와', '메뉴'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a plate and a menu', 'correct' => ['a', 'plate', 'and', 'a', 'menu'], 'extra' => ['I pay']],
                            'es' => ['sentence' => 'Un plato y un menú', 'correct' => ['un', 'plato', 'y', 'un', 'menú'], 'extra' => ['pago']],
                            'de' => ['sentence' => 'Ein Teller und ein Menü', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Menü'], 'extra' => ['ich bezahle']],
                            'fr' => ['sentence' => 'Une assiette et un menu', 'correct' => ['une', 'assiette', 'et', 'un', 'menu'], 'extra' => ['je paie']],
                            'ja' => ['sentence' => 'お皿とメニュー', 'correct' => ['お皿', 'と', 'メニュー'], 'extra' => ['私が払う']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
