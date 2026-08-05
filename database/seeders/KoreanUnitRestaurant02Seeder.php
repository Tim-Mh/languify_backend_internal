<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant02Seeder extends Seeder
{
    private const PICTURES = ['메뉴' => 'menu', '케이크' => 'cake', '와인' => 'wine', '주스' => 'juice', '샐러드' => 'salad', '샌드위치' => 'sandwich', '커피' => 'coffee', '닭고기' => 'chicken'];

    /**
     * Korean Restaurant, Unit 2, the Korean twin of the English "Menu and Prices" unit.
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

        $builder->seedUnit($chapter->id, 2, '유닛 2: 메뉴와 가격', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 메뉴 · 케이크', 1,
                pictures: [['ko' => '메뉴', 'img' => 'menu'], ['ko' => '케이크', 'img' => 'cake']],
                plain: [['ko' => '가격'], ['ko' => '몇 개']],
                phrases: [
                    'a' => [
                        'words' => ['메뉴의', '가격'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the price of the menu', 'correct' => ['the', 'price', 'of', 'the', 'menu'], 'extra' => ['cake']],
                            'es' => ['sentence' => 'El precio del menú', 'correct' => ['el', 'precio', 'de', 'el', 'menú'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Der Preis des Menüs', 'correct' => ['der', 'Preis', 'von', 'dem', 'Menü'], 'extra' => ['Kuchen']],
                            'fr' => ['sentence' => 'Le prix du menu', 'correct' => ['le', 'prix', 'de', 'le', 'menu'], 'extra' => ['gâteau']],
                            'ja' => ['sentence' => 'メニューの値段', 'correct' => ['メニュー', 'の', '値段'], 'extra' => ['ケーキ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['케이크는', '얼마입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'how much for the cake', 'correct' => ['how many', 'for', 'the', 'cake'], 'extra' => ['price']],
                            'es' => ['sentence' => 'Cuánto por el pastel', 'correct' => ['cuántos', 'para', 'el', 'pastel'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viel für den Kuchen', 'correct' => ['wie viele', 'für', 'den', 'Kuchen'], 'extra' => ['Preis']],
                            'fr' => ['sentence' => 'Combien pour le gâteau', 'correct' => ['combien', 'pour', 'le', 'gâteau'], 'extra' => ['prix']],
                            'ja' => ['sentence' => 'ケーキはいくつ', 'correct' => ['ケーキ', 'は', 'いくつ'], 'extra' => ['値段']],
                        ],
                    ],
                    'c' => [
                        'words' => ['케이크의', '가격'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the price of the cake', 'correct' => ['the', 'price', 'of', 'the', 'cake'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'El precio del pastel', 'correct' => ['el', 'precio', 'de', 'el', 'pastel'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Der Preis des Kuchens', 'correct' => ['der', 'Preis', 'von', 'dem', 'Kuchen'], 'extra' => ['Menü']],
                            'fr' => ['sentence' => 'Le prix du gâteau', 'correct' => ['le', 'prix', 'de', 'le', 'gâteau'], 'extra' => ['menu']],
                            'ja' => ['sentence' => 'ケーキの値段', 'correct' => ['ケーキ', 'の', '値段'], 'extra' => ['メニュー']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 와인 · 주스', 2,
                pictures: [['ko' => '와인', 'img' => 'wine'], ['ko' => '주스', 'img' => 'juice']],
                plain: [['ko' => '비싼'], ['ko' => '싼']],
                phrases: [
                    'a' => [
                        'words' => ['와인은', '비쌉니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the wine is expensive', 'correct' => ['the', 'wine', 'is', 'expensive'], 'extra' => ['cheap']],
                            'es' => ['sentence' => 'El vino es caro', 'correct' => ['el', 'vino', 'es', 'caro'], 'extra' => ['barato', 'zumo']],
                            'de' => ['sentence' => 'Der Wein ist teuer', 'correct' => ['der', 'Wein', 'ist', 'teuer'], 'extra' => ['billig', 'Saft']],
                            'fr' => ['sentence' => 'Le vin est cher', 'correct' => ['le', 'vin', 'est', 'cher'], 'extra' => ['bon marché', 'jus']],
                            'ja' => ['sentence' => 'ワインは高いです', 'correct' => ['ワイン', 'は', '高い', 'です'], 'extra' => ['安い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['주스는', '쌉니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the juice is cheap', 'correct' => ['the', 'juice', 'is', 'cheap'], 'extra' => ['expensive']],
                            'es' => ['sentence' => 'El zumo es barato', 'correct' => ['el', 'zumo', 'es', 'barato'], 'extra' => ['caro', 'vino']],
                            'de' => ['sentence' => 'Der Saft ist billig', 'correct' => ['der', 'Saft', 'ist', 'billig'], 'extra' => ['teuer', 'Wein']],
                            'fr' => ['sentence' => 'Le jus est bon marché', 'correct' => ['le', 'jus', 'est', 'bon marché'], 'extra' => ['cher', 'vin']],
                            'ja' => ['sentence' => 'ジュースは安いです', 'correct' => ['ジュース', 'は', '安い', 'です'], 'extra' => ['高い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['비싸거나', '싼'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'expensive or cheap', 'correct' => ['expensive', 'or', 'cheap'], 'extra' => ['wine']],
                            'es' => ['sentence' => 'Caro o barato', 'correct' => ['caro', 'o', 'barato'], 'extra' => ['vino']],
                            'de' => ['sentence' => 'Teuer oder billig', 'correct' => ['teuer', 'oder', 'billig'], 'extra' => ['Wein']],
                            'fr' => ['sentence' => 'Cher ou bon marché', 'correct' => ['cher', 'ou', 'bon marché'], 'extra' => ['vin']],
                            'ja' => ['sentence' => '高いか安い', 'correct' => ['高い', 'か', '安い'], 'extra' => ['ワイン']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 샐러드 · 케이크', 3,
                pictures: [['ko' => '샐러드', 'img' => 'salad'], ['ko' => '케이크', 'img' => 'cake']],
                plain: [['ko' => '전채'], ['ko' => '디저트']],
                phrases: [
                    'a' => [
                        'words' => ['전채와', '디저트'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a starter and a dessert', 'correct' => ['a', 'starter', 'and', 'a', 'dessert'], 'extra' => ['salad']],
                            'es' => ['sentence' => 'Un entrante y un postre', 'correct' => ['un', 'entrante', 'y', 'un', 'postre'], 'extra' => ['ensalada']],
                            'de' => ['sentence' => 'Eine Vorspeise und ein Nachtisch', 'correct' => ['eine', 'Vorspeise', 'und', 'ein', 'Nachtisch'], 'extra' => ['Salat']],
                            'fr' => ['sentence' => 'Une entrée et un dessert', 'correct' => ['une', 'entrée', 'et', 'un', 'dessert'], 'extra' => ['salade']],
                            'ja' => ['sentence' => '前菜とデザート', 'correct' => ['前菜', 'と', 'デザート'], 'extra' => ['サラダ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['케이크는', '디저트입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the cake is the dessert', 'correct' => ['the', 'cake', 'is', 'the', 'dessert'], 'extra' => ['starter']],
                            'es' => ['sentence' => 'El pastel es el postre', 'correct' => ['el', 'pastel', 'es', 'el', 'postre'], 'extra' => ['entrante']],
                            'de' => ['sentence' => 'Der Kuchen ist der Nachtisch', 'correct' => ['der', 'Kuchen', 'ist', 'der', 'Nachtisch'], 'extra' => ['Vorspeise']],
                            'fr' => ['sentence' => 'Le gâteau est le dessert', 'correct' => ['le', 'gâteau', 'est', 'le', 'dessert'], 'extra' => ['entrée']],
                            'ja' => ['sentence' => 'ケーキはデザートです', 'correct' => ['ケーキ', 'は', 'デザート', 'です'], 'extra' => ['前菜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['샐러드', '또는', '케이크'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a salad or a cake', 'correct' => ['a', 'salad', 'or', 'a', 'cake'], 'extra' => ['dessert']],
                            'es' => ['sentence' => 'Una ensalada o un pastel', 'correct' => ['una', 'ensalada', 'o', 'un', 'pastel'], 'extra' => ['postre']],
                            'de' => ['sentence' => 'Ein Salat oder ein Kuchen', 'correct' => ['ein', 'Salat', 'oder', 'ein', 'Kuchen'], 'extra' => ['Nachtisch']],
                            'fr' => ['sentence' => 'Une salade ou un gâteau', 'correct' => ['une', 'salade', 'ou', 'un', 'gâteau'], 'extra' => ['dessert']],
                            'ja' => ['sentence' => 'サラダかケーキ', 'correct' => ['サラダ', 'か', 'ケーキ'], 'extra' => ['デザート']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 샌드위치 · 커피', 4,
                pictures: [['ko' => '샌드위치', 'img' => 'sandwich'], ['ko' => '커피', 'img' => 'coffee']],
                plain: [['ko' => '총액'], ['ko' => '각각의']],
                phrases: [
                    'a' => [
                        'words' => ['총액은', '십', '달러입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the total is ten dollars', 'correct' => ['the', 'total', 'is', 'ten', 'dollars'], 'extra' => ['each']],
                            'es' => ['sentence' => 'El total es diez dólares', 'correct' => ['el', 'total', 'es', 'diez', 'dólares'], 'extra' => ['cada']],
                            'de' => ['sentence' => 'Die Summe ist zehn Dollar', 'correct' => ['die', 'Summe', 'ist', 'zehn', 'Dollar'], 'extra' => ['jeder']],
                            'fr' => ['sentence' => 'Le total est dix dollars', 'correct' => ['le', 'total', 'est', 'dix', 'dollars'], 'extra' => ['chaque']],
                            'ja' => ['sentence' => '合計は十ドルです', 'correct' => ['合計', 'は', '十', 'ドル', 'です'], 'extra' => ['それぞれの']],
                        ],
                    ],
                    'b' => [
                        'words' => ['각각의', '샌드위치는', '삼', '달러입니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'each sandwich costs three dollars', 'correct' => ['each', 'sandwich', 'costs', 'three', 'dollars'], 'extra' => ['total']],
                            'es' => ['sentence' => 'Cada sándwich cuesta tres dólares', 'correct' => ['cada', 'sándwich', 'cuesta', 'tres', 'dólares'], 'extra' => ['total']],
                            'de' => ['sentence' => 'Jedes Sandwich kostet drei Dollar', 'correct' => ['jeder', 'Sandwich', 'kostet', 'drei', 'Dollar'], 'extra' => ['Gesamt']],
                            'fr' => ['sentence' => 'Chaque sandwich coûte trois dollars', 'correct' => ['chaque', 'sandwich', 'coûte', 'trois', 'dollars'], 'extra' => ['total']],
                            'ja' => ['sentence' => 'サンドイッチはそれぞれ三ドルです', 'correct' => ['サンドイッチ', 'は', 'それぞれ', '三', 'ドル', 'です'], 'extra' => ['合計']],
                        ],
                    ],
                    'c' => [
                        'words' => ['커피와', '샌드위치'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee and a sandwich', 'correct' => ['a', 'coffee', 'and', 'a', 'sandwich'], 'extra' => ['total']],
                            'es' => ['sentence' => 'Un café y un sándwich', 'correct' => ['un', 'café', 'y', 'un', 'sándwich'], 'extra' => ['total', 'cada']],
                            'de' => ['sentence' => 'Ein Kaffee und ein Sandwich', 'correct' => ['ein', 'Kaffee', 'und', 'ein', 'Sandwich'], 'extra' => ['Gesamt']],
                            'fr' => ['sentence' => 'Un café et un sandwich', 'correct' => ['un', 'café', 'et', 'un', 'sandwich'], 'extra' => ['total']],
                            'ja' => ['sentence' => 'コーヒーとサンドイッチ', 'correct' => ['コーヒー', 'と', 'サンドイッチ'], 'extra' => ['合計']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 주스 · 닭고기', 5,
                pictures: [['ko' => '주스', 'img' => 'juice'], ['ko' => '닭고기', 'img' => 'chicken']],
                plain: [['ko' => '고르다'], ['ko' => '음료']],
                phrases: [
                    'a' => [
                        'words' => ['고르고', '싶습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to choose', 'correct' => ['I would like', 'to choose'], 'extra' => ['a drink']],
                            'es' => ['sentence' => 'Quisiera elegir', 'correct' => ['quisiera', 'elegir'], 'extra' => ['bebida', 'zumo']],
                            'de' => ['sentence' => 'Ich möchte wählen', 'correct' => ['ich möchte', 'wählen'], 'extra' => ['Getränk', 'Saft']],
                            'fr' => ['sentence' => 'Je voudrais choisir', 'correct' => ['je voudrais', 'choisir'], 'extra' => ['une boisson', 'jus']],
                            'ja' => ['sentence' => '選びたいです', 'correct' => ['選び', 'たいです'], 'extra' => ['飲み物']],
                        ],
                    ],
                    'b' => [
                        'words' => ['닭고기와', '함께', '음료'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a drink with the chicken', 'correct' => ['a drink', 'with', 'the', 'chicken'], 'extra' => ['to choose']],
                            'es' => ['sentence' => 'Una bebida con el pollo', 'correct' => ['una bebida', 'con', 'el', 'pollo'], 'extra' => ['elegir']],
                            'de' => ['sentence' => 'Ein Getränk mit dem Hähnchen', 'correct' => ['ein Getränk', 'mit', 'dem', 'Hähnchen'], 'extra' => ['wählen']],
                            'fr' => ['sentence' => 'Une boisson avec le poulet', 'correct' => ['une boisson', 'avec', 'le', 'poulet'], 'extra' => ['choisir']],
                            'ja' => ['sentence' => '鶏肉と一緒に飲み物', 'correct' => ['鶏肉', 'と一緒に', '飲み物'], 'extra' => ['選ぶ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['주스를', '고르세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to choose the juice', 'correct' => ['to choose', 'the', 'juice'], 'extra' => ['a drink']],
                            'es' => ['sentence' => 'Elegir el zumo', 'correct' => ['elegir', 'el', 'zumo'], 'extra' => ['bebida', 'pollo']],
                            'de' => ['sentence' => 'Den Saft wählen', 'correct' => ['den', 'Saft', 'wählen'], 'extra' => ['Getränk']],
                            'fr' => ['sentence' => 'Choisir le jus', 'correct' => ['choisir', 'le', 'jus'], 'extra' => ['une boisson']],
                            'ja' => ['sentence' => 'ジュースを選ぶ', 'correct' => ['ジュース', 'を', '選ぶ'], 'extra' => ['飲み物']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
