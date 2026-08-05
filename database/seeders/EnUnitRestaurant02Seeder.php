<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant02Seeder extends Seeder
{
    private const PICTURES = [
        'Menu' => 'menu', 'Cake' => 'cake', 'Wine' => 'wine', 'Juice' => 'juice',
        'Salad' => 'salad', 'Sandwich' => 'sandwich', 'Coffee' => 'coffee', 'Chicken' => 'chicken',
    ];

    /**
     * English Chapter 3, Unit 2 — reading the menu and asking prices.
     *
     * Prices reuse the numbers from Chapter 1, so the only new load is the money
     * language itself: price, how much, costs, expensive, cheap, total.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Menu and Prices', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: How Much Is It', 1,
                pictures: [['en' => 'Menu', 'img' => 'menu'], ['en' => 'Cake', 'img' => 'cake']],
                plain: [['en' => 'Price'], ['en' => 'How many']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'price', 'of', 'the', 'menu'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El precio del menú', 'correct' => ['el', 'precio', 'de', 'el', 'menú'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Der Preis des Menüs', 'correct' => ['der', 'Preis', 'von', 'dem', 'Menü'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'メニューの値段', 'correct' => ['メニュー', 'の', '値段'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '메뉴의 가격', 'correct' => ['메뉴의', '가격'], 'extra' => ['케이크']],
                            'fr' => ['sentence' => 'Le prix du menu', 'correct' => ['le', 'prix', 'de', 'le', 'menu'], 'extra' => ['gâteau']],
                        ],
                    ],
                    'b' => [
                        'words' => ['how many', 'for', 'the', 'cake'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cuánto por el pastel', 'correct' => ['cuántos', 'para', 'el', 'pastel'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viel für den Kuchen', 'correct' => ['wie viele', 'für', 'den', 'Kuchen'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'ケーキはいくつ', 'correct' => ['ケーキ', 'は', 'いくつ'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '케이크는 몇 개', 'correct' => ['케이크는', '몇', '개'], 'extra' => ['가격']],
                            'fr' => ['sentence' => 'Combien pour le gâteau', 'correct' => ['combien', 'pour', 'le', 'gâteau'], 'extra' => ['prix']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'price', 'of', 'the', 'cake'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El precio del pastel', 'correct' => ['el', 'precio', 'de', 'el', 'pastel'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Der Preis des Kuchens', 'correct' => ['der', 'Preis', 'von', 'dem', 'Kuchen'], 'extra' => ['Menü']],
                            'ja' => ['sentence' => 'ケーキの値段', 'correct' => ['ケーキ', 'の', '値段'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '케이크의 가격', 'correct' => ['케이크의', '가격'], 'extra' => ['메뉴']],
                            'fr' => ['sentence' => 'Le prix du gâteau', 'correct' => ['le', 'prix', 'de', 'le', 'gâteau'], 'extra' => ['menu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Expensive or Cheap', 2,
                pictures: [['en' => 'Wine', 'img' => 'wine'], ['en' => 'Juice', 'img' => 'juice']],
                plain: [['en' => 'Expensive'], ['en' => 'Cheap']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'wine', 'is', 'expensive'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El vino es caro', 'correct' => ['el', 'vino', 'es', 'caro'], 'extra' => ['barato', 'zumo']],
                            'de' => ['sentence' => 'Der Wein ist teuer', 'correct' => ['der', 'Wein', 'ist', 'teuer'], 'extra' => ['billig', 'Saft']],
                            'ja' => ['sentence' => 'ワインは高いです', 'correct' => ['ワイン', 'は', '高い', 'です'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '와인은 비쌉니다', 'correct' => ['와인은', '비쌉니다'], 'extra' => ['싼']],
                            'fr' => ['sentence' => 'Le vin est cher', 'correct' => ['le', 'vin', 'est', 'cher'], 'extra' => ['bon marché', 'jus']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'juice', 'is', 'cheap'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El zumo es barato', 'correct' => ['el', 'zumo', 'es', 'barato'], 'extra' => ['caro', 'vino']],
                            'de' => ['sentence' => 'Der Saft ist billig', 'correct' => ['der', 'Saft', 'ist', 'billig'], 'extra' => ['teuer', 'Wein']],
                            'ja' => ['sentence' => 'ジュースは安いです', 'correct' => ['ジュース', 'は', '安い', 'です'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '주스는 쌉니다', 'correct' => ['주스는', '쌉니다'], 'extra' => ['비싼']],
                            'fr' => ['sentence' => 'Le jus est bon marché', 'correct' => ['le', 'jus', 'est', 'bon marché'], 'extra' => ['cher', 'vin']],
                        ],
                    ],
                    'c' => [
                        'words' => ['expensive', 'or', 'cheap'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Caro o barato', 'correct' => ['caro', 'o', 'barato'], 'extra' => ['vino']],
                            'de' => ['sentence' => 'Teuer oder billig', 'correct' => ['teuer', 'oder', 'billig'], 'extra' => ['Wein']],
                            'ja' => ['sentence' => '高いか安い', 'correct' => ['高い', 'か', '安い'], 'extra' => ['ワイン']],
                            'ko' => ['sentence' => '비싸거나 싼', 'correct' => ['비싸거나', '싼'], 'extra' => ['와인']],
                            'fr' => ['sentence' => 'Cher ou bon marché', 'correct' => ['cher', 'ou', 'bon marché'], 'extra' => ['vin']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Starter and Dessert', 3,
                pictures: [['en' => 'Salad', 'img' => 'salad'], ['en' => 'Cake', 'img' => 'cake']],
                plain: [['en' => 'Starter'], ['en' => 'Dessert']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'starter', 'and', 'a', 'dessert'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un entrante y un postre', 'correct' => ['un', 'entrante', 'y', 'un', 'postre'], 'extra' => ['ensalada']],
                            'de' => ['sentence' => 'Eine Vorspeise und ein Nachtisch', 'correct' => ['eine', 'Vorspeise', 'und', 'ein', 'Nachtisch'], 'extra' => ['Salat']],
                            'ja' => ['sentence' => '前菜とデザート', 'correct' => ['前菜', 'と', 'デザート'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '전채와 디저트', 'correct' => ['전채와', '디저트'], 'extra' => ['샐러드']],
                            'fr' => ['sentence' => 'Une entrée et un dessert', 'correct' => ['une', 'entrée', 'et', 'un', 'dessert'], 'extra' => ['salade']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'cake', 'is', 'the', 'dessert'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El pastel es el postre', 'correct' => ['el', 'pastel', 'es', 'el', 'postre'], 'extra' => ['entrante']],
                            'de' => ['sentence' => 'Der Kuchen ist der Nachtisch', 'correct' => ['der', 'Kuchen', 'ist', 'der', 'Nachtisch'], 'extra' => ['Vorspeise']],
                            'ja' => ['sentence' => 'ケーキはデザートです', 'correct' => ['ケーキ', 'は', 'デザート', 'です'], 'extra' => ['前菜']],
                            'ko' => ['sentence' => '케이크는 디저트입니다', 'correct' => ['케이크는', '디저트입니다'], 'extra' => ['전채']],
                            'fr' => ['sentence' => 'Le gâteau est le dessert', 'correct' => ['le', 'gâteau', 'est', 'le', 'dessert'], 'extra' => ['entrée']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'salad', 'or', 'a', 'cake'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Una ensalada o un pastel', 'correct' => ['una', 'ensalada', 'o', 'un', 'pastel'], 'extra' => ['postre']],
                            'de' => ['sentence' => 'Ein Salat oder ein Kuchen', 'correct' => ['ein', 'Salat', 'oder', 'ein', 'Kuchen'], 'extra' => ['Nachtisch']],
                            'ja' => ['sentence' => 'サラダかケーキ', 'correct' => ['サラダ', 'か', 'ケーキ'], 'extra' => ['デザート']],
                            'ko' => ['sentence' => '샐러드 또는 케이크', 'correct' => ['샐러드', '또는', '케이크'], 'extra' => ['디저트']],
                            'fr' => ['sentence' => 'Une salade ou un gâteau', 'correct' => ['une', 'salade', 'ou', 'un', 'gâteau'], 'extra' => ['dessert']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: The Total', 4,
                pictures: [['en' => 'Sandwich', 'img' => 'sandwich'], ['en' => 'Coffee', 'img' => 'coffee']],
                plain: [['en' => 'Total'], ['en' => 'Each']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'total', 'is', 'ten', 'dollars'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El total es diez dólares', 'correct' => ['el', 'total', 'es', 'diez', 'dólares'], 'extra' => ['cada']],
                            'de' => ['sentence' => 'Die Summe ist zehn Dollar', 'correct' => ['die', 'Summe', 'ist', 'zehn', 'Dollar'], 'extra' => ['jeder']],
                            'ja' => ['sentence' => '合計は十ドルです', 'correct' => ['合計', 'は', '十', 'ドル', 'です'], 'extra' => ['それぞれの']],
                            'ko' => ['sentence' => '총액은 십 달러입니다', 'correct' => ['총액은', '십', '달러입니다'], 'extra' => ['각각의']],
                            'fr' => ['sentence' => 'Le total est dix dollars', 'correct' => ['le', 'total', 'est', 'dix', 'dollars'], 'extra' => ['chaque']],
                        ],
                    ],
                    'b' => [
                        'words' => ['each', 'sandwich', 'costs', 'three', 'dollars'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cada sándwich cuesta tres dólares', 'correct' => ['cada', 'sándwich', 'cuesta', 'tres', 'dólares'], 'extra' => ['total']],
                            'de' => ['sentence' => 'Jedes Sandwich kostet drei Dollar', 'correct' => ['jeder', 'Sandwich', 'kostet', 'drei', 'Dollar'], 'extra' => ['Gesamt']],
                            'ja' => ['sentence' => 'サンドイッチはそれぞれ三ドルです', 'correct' => ['サンドイッチ', 'は', 'それぞれ', '三', 'ドル', 'です'], 'extra' => ['合計']],
                            'ko' => ['sentence' => '각각의 샌드위치는 삼 달러입니다', 'correct' => ['각각의', '샌드위치는', '삼', '달러입니다'], 'extra' => ['총액']],
                            'fr' => ['sentence' => 'Chaque sandwich coûte trois dollars', 'correct' => ['chaque', 'sandwich', 'coûte', 'trois', 'dollars'], 'extra' => ['total']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'coffee', 'and', 'a', 'sandwich'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un café y un sándwich', 'correct' => ['un', 'café', 'y', 'un', 'sándwich'], 'extra' => ['total', 'cada']],
                            'de' => ['sentence' => 'Ein Kaffee und ein Sandwich', 'correct' => ['ein', 'Kaffee', 'und', 'ein', 'Sandwich'], 'extra' => ['Gesamt']],
                            'ja' => ['sentence' => 'コーヒーとサンドイッチ', 'correct' => ['コーヒー', 'と', 'サンドイッチ'], 'extra' => ['合計']],
                            'ko' => ['sentence' => '커피와 샌드위치', 'correct' => ['커피와', '샌드위치'], 'extra' => ['총액']],
                            'fr' => ['sentence' => 'Un café et un sandwich', 'correct' => ['un', 'café', 'et', 'un', 'sandwich'], 'extra' => ['total']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Choosing a Drink', 5,
                pictures: [['en' => 'Juice', 'img' => 'juice'], ['en' => 'Chicken', 'img' => 'chicken']],
                plain: [['en' => 'To choose'], ['en' => 'A drink']],
                phrases: [
                    'a' => [
                        'words' => ['I would like', 'to choose'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera elegir', 'correct' => ['quisiera', 'elegir'], 'extra' => ['bebida', 'zumo']],
                            'de' => ['sentence' => 'Ich möchte wählen', 'correct' => ['ich möchte', 'wählen'], 'extra' => ['Getränk', 'Saft']],
                            'ja' => ['sentence' => '選びたいです', 'correct' => ['選び', 'たいです'], 'extra' => ['飲み物']],
                            'ko' => ['sentence' => '고르고 싶습니다', 'correct' => ['고르고', '싶습니다'], 'extra' => ['음료']],
                            'fr' => ['sentence' => 'Je voudrais choisir', 'correct' => ['je voudrais', 'choisir'], 'extra' => ['une boisson', 'jus']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a drink', 'with', 'the', 'chicken'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Una bebida con el pollo', 'correct' => ['una bebida', 'con', 'el', 'pollo'], 'extra' => ['elegir']],
                            'de' => ['sentence' => 'Ein Getränk mit dem Hähnchen', 'correct' => ['ein Getränk', 'mit', 'dem', 'Hähnchen'], 'extra' => ['wählen']],
                            'ja' => ['sentence' => '鶏肉と一緒に飲み物', 'correct' => ['鶏肉', 'と一緒に', '飲み物'], 'extra' => ['選ぶ']],
                            'ko' => ['sentence' => '닭고기와 함께 음료', 'correct' => ['닭고기와', '함께', '음료'], 'extra' => ['고르다']],
                            'fr' => ['sentence' => 'Une boisson avec le poulet', 'correct' => ['une boisson', 'avec', 'le', 'poulet'], 'extra' => ['choisir']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to choose', 'the', 'juice'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Elegir el zumo', 'correct' => ['elegir', 'el', 'zumo'], 'extra' => ['bebida', 'pollo']],
                            'de' => ['sentence' => 'Den Saft wählen', 'correct' => ['den', 'Saft', 'wählen'], 'extra' => ['Getränk']],
                            'ja' => ['sentence' => 'ジュースを選ぶ', 'correct' => ['ジュース', 'を', '選ぶ'], 'extra' => ['飲み物']],
                            'ko' => ['sentence' => '주스를 고르다', 'correct' => ['주스를', '고르다'], 'extra' => ['음료']],
                            'fr' => ['sentence' => 'Choisir le jus', 'correct' => ['choisir', 'le', 'jus'], 'extra' => ['une boisson']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
