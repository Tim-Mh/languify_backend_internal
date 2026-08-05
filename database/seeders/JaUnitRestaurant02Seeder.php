<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant02Seeder extends Seeder
{
    private const PICTURES = [
        'メニュー' => 'menu',
        'ケーキ' => 'cake',
        'ワイン' => 'wine',
        'ジュース' => 'juice',
        'サラダ' => 'salad',
        'サンドイッチ' => 'sandwich',
        'コーヒー' => 'coffee',
        '鶏肉' => 'chicken',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 2, the Japanese twin of the
     * English "Unit 2: Menu and Prices" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'ユニット2: メニューと値段', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: メニュー・ケーキ', 1,
                pictures: [
                    [
                        'ja' => 'メニュー',
                        'img' => 'menu',
                    ],
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'ja' => '値段',
                    ],
                    [
                        'ja' => 'いくつ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'メニュー',
                            'の',
                            '値段',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the price of the menu',
                                'correct' => [
                                    'the',
                                    'price',
                                    'of',
                                    'the',
                                    'menu',
                                ],
                                'extra' => [
                                    'cake',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El precio del menú',
                                'correct' => [
                                    'el',
                                    'precio',
                                    'de',
                                    'el',
                                    'menú',
                                ],
                                'extra' => [
                                    'pastel',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Preis des Menüs',
                                'correct' => [
                                    'der',
                                    'Preis',
                                    'von',
                                    'dem',
                                    'Menü',
                                ],
                                'extra' => [
                                    'Kuchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le prix du menu',
                                'correct' => [
                                    'le',
                                    'prix',
                                    'de',
                                    'le',
                                    'menu',
                                ],
                                'extra' => [
                                    'gâteau',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '메뉴의 가격',
                                'correct' => [
                                    '메뉴의',
                                    '가격',
                                ],
                                'extra' => [
                                    '케이크',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ケーキ',
                            'は',
                            'いくら',
                            'です',
                            'か',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how much for the cake',
                                'correct' => [
                                    'how many',
                                    'for',
                                    'the',
                                    'cake',
                                ],
                                'extra' => [
                                    'price',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Cuánto por el pastel',
                                'correct' => [
                                    'cuántos',
                                    'para',
                                    'el',
                                    'pastel',
                                ],
                                'extra' => [
                                    'precio',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wie viel für den Kuchen',
                                'correct' => [
                                    'wie viele',
                                    'für',
                                    'den',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Preis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Combien pour le gâteau',
                                'correct' => [
                                    'combien',
                                    'pour',
                                    'le',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'prix',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크는 몇 개',
                                'correct' => [
                                    '케이크는',
                                    '몇',
                                    '개',
                                ],
                                'extra' => [
                                    '가격',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ケーキ',
                            'の',
                            '値段',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the price of the cake',
                                'correct' => [
                                    'the',
                                    'price',
                                    'of',
                                    'the',
                                    'cake',
                                ],
                                'extra' => [
                                    'menu',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El precio del pastel',
                                'correct' => [
                                    'el',
                                    'precio',
                                    'de',
                                    'el',
                                    'pastel',
                                ],
                                'extra' => [
                                    'menú',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Preis des Kuchens',
                                'correct' => [
                                    'der',
                                    'Preis',
                                    'von',
                                    'dem',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Menü',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le prix du gâteau',
                                'correct' => [
                                    'le',
                                    'prix',
                                    'de',
                                    'le',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'menu',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크의 가격',
                                'correct' => [
                                    '케이크의',
                                    '가격',
                                ],
                                'extra' => [
                                    '메뉴',
                                ],
                            ],
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
                        'ja' => '高い',
                    ],
                    [
                        'ja' => '安い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ワイン',
                            'は',
                            '高い',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the wine is expensive',
                                'correct' => [
                                    'the',
                                    'wine',
                                    'is',
                                    'expensive',
                                ],
                                'extra' => [
                                    'cheap',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El vino es caro',
                                'correct' => [
                                    'el',
                                    'vino',
                                    'es',
                                    'caro',
                                ],
                                'extra' => [
                                    'barato',
                                    'zumo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Wein ist teuer',
                                'correct' => [
                                    'der',
                                    'Wein',
                                    'ist',
                                    'teuer',
                                ],
                                'extra' => [
                                    'billig',
                                    'Saft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le vin est cher',
                                'correct' => [
                                    'le',
                                    'vin',
                                    'est',
                                    'cher',
                                ],
                                'extra' => [
                                    'bon marché',
                                    'jus',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '와인은 비쌉니다',
                                'correct' => [
                                    '와인은',
                                    '비쌉니다',
                                ],
                                'extra' => [
                                    '싼',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ジュース',
                            'は',
                            '安い',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the juice is cheap',
                                'correct' => [
                                    'the',
                                    'juice',
                                    'is',
                                    'cheap',
                                ],
                                'extra' => [
                                    'expensive',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El zumo es barato',
                                'correct' => [
                                    'el',
                                    'zumo',
                                    'es',
                                    'barato',
                                ],
                                'extra' => [
                                    'caro',
                                    'vino',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Saft ist billig',
                                'correct' => [
                                    'der',
                                    'Saft',
                                    'ist',
                                    'billig',
                                ],
                                'extra' => [
                                    'teuer',
                                    'Wein',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le jus est bon marché',
                                'correct' => [
                                    'le',
                                    'jus',
                                    'est',
                                    'bon marché',
                                ],
                                'extra' => [
                                    'cher',
                                    'vin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스는 쌉니다',
                                'correct' => [
                                    '주스는',
                                    '쌉니다',
                                ],
                                'extra' => [
                                    '비싼',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '高い',
                            'か',
                            '安い',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'expensive or cheap',
                                'correct' => [
                                    'expensive',
                                    'or',
                                    'cheap',
                                ],
                                'extra' => [
                                    'wine',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Caro o barato',
                                'correct' => [
                                    'caro',
                                    'o',
                                    'barato',
                                ],
                                'extra' => [
                                    'vino',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Teuer oder billig',
                                'correct' => [
                                    'teuer',
                                    'oder',
                                    'billig',
                                ],
                                'extra' => [
                                    'Wein',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Cher ou bon marché',
                                'correct' => [
                                    'cher',
                                    'ou',
                                    'bon marché',
                                ],
                                'extra' => [
                                    'vin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '비싸거나 싼',
                                'correct' => [
                                    '비싸거나',
                                    '싼',
                                ],
                                'extra' => [
                                    '와인',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: サラダ・ケーキ', 3,
                pictures: [
                    [
                        'ja' => 'サラダ',
                        'img' => 'salad',
                    ],
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'ja' => '前菜',
                    ],
                    [
                        'ja' => 'デザート',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '前菜',
                            'と',
                            'デザート',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a starter and a dessert',
                                'correct' => [
                                    'a',
                                    'starter',
                                    'and',
                                    'a',
                                    'dessert',
                                ],
                                'extra' => [
                                    'salad',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un entrante y un postre',
                                'correct' => [
                                    'un',
                                    'entrante',
                                    'y',
                                    'un',
                                    'postre',
                                ],
                                'extra' => [
                                    'ensalada',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Vorspeise und ein Nachtisch',
                                'correct' => [
                                    'eine',
                                    'Vorspeise',
                                    'und',
                                    'ein',
                                    'Nachtisch',
                                ],
                                'extra' => [
                                    'Salat',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une entrée et un dessert',
                                'correct' => [
                                    'une',
                                    'entrée',
                                    'et',
                                    'un',
                                    'dessert',
                                ],
                                'extra' => [
                                    'salade',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '전채와 디저트',
                                'correct' => [
                                    '전채와',
                                    '디저트',
                                ],
                                'extra' => [
                                    '샐러드',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ケーキ',
                            'は',
                            'デザート',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cake is the dessert',
                                'correct' => [
                                    'the',
                                    'cake',
                                    'is',
                                    'the',
                                    'dessert',
                                ],
                                'extra' => [
                                    'starter',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El pastel es el postre',
                                'correct' => [
                                    'el',
                                    'pastel',
                                    'es',
                                    'el',
                                    'postre',
                                ],
                                'extra' => [
                                    'entrante',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kuchen ist der Nachtisch',
                                'correct' => [
                                    'der',
                                    'Kuchen',
                                    'ist',
                                    'der',
                                    'Nachtisch',
                                ],
                                'extra' => [
                                    'Vorspeise',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le gâteau est le dessert',
                                'correct' => [
                                    'le',
                                    'gâteau',
                                    'est',
                                    'le',
                                    'dessert',
                                ],
                                'extra' => [
                                    'entrée',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크는 디저트입니다',
                                'correct' => [
                                    '케이크는',
                                    '디저트입니다',
                                ],
                                'extra' => [
                                    '전채',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'サラダ',
                            'か',
                            'ケーキ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a salad or a cake',
                                'correct' => [
                                    'a',
                                    'salad',
                                    'or',
                                    'a',
                                    'cake',
                                ],
                                'extra' => [
                                    'dessert',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una ensalada o un pastel',
                                'correct' => [
                                    'una',
                                    'ensalada',
                                    'o',
                                    'un',
                                    'pastel',
                                ],
                                'extra' => [
                                    'postre',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Salat oder ein Kuchen',
                                'correct' => [
                                    'ein',
                                    'Salat',
                                    'oder',
                                    'ein',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Nachtisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une salade ou un gâteau',
                                'correct' => [
                                    'une',
                                    'salade',
                                    'ou',
                                    'un',
                                    'gâteau',
                                ],
                                'extra' => [
                                    'dessert',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '샐러드 또는 케이크',
                                'correct' => [
                                    '샐러드',
                                    '또는',
                                    '케이크',
                                ],
                                'extra' => [
                                    '디저트',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: サンドイッチ・コーヒー', 4,
                pictures: [
                    [
                        'ja' => 'サンドイッチ',
                        'img' => 'sandwich',
                    ],
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'ja' => '合計',
                    ],
                    [
                        'ja' => 'それぞれの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '合計',
                            'は',
                            '十',
                            'ドル',
                            'です',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the total is ten dollars',
                                'correct' => [
                                    'the',
                                    'total',
                                    'is',
                                    'ten',
                                    'dollars',
                                ],
                                'extra' => [
                                    'each',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El total es diez dólares',
                                'correct' => [
                                    'el',
                                    'total',
                                    'es',
                                    'diez',
                                    'dólares',
                                ],
                                'extra' => [
                                    'cada',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Summe ist zehn Dollar',
                                'correct' => [
                                    'das',
                                    'Gesamt',
                                    'ist',
                                    'zehn',
                                    'Dollar',
                                ],
                                'extra' => [
                                    'jeder',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le total est dix dollars',
                                'correct' => [
                                    'le',
                                    'total',
                                    'est',
                                    'dix',
                                    'dollars',
                                ],
                                'extra' => [
                                    'chaque',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '총액은 십 달러입니다',
                                'correct' => [
                                    '총액은',
                                    '십',
                                    '달러입니다',
                                ],
                                'extra' => [
                                    '각각의',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'それぞれの',
                            'サンドイッチ',
                            'かかる',
                            '三',
                            'ドル',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'each sandwich costs three dollars',
                                'correct' => [
                                    'each',
                                    'sandwich',
                                    'costs',
                                    'three',
                                    'dollars',
                                ],
                                'extra' => [
                                    'total',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Cada sándwich cuesta tres dólares',
                                'correct' => [
                                    'cada',
                                    'sándwich',
                                    'cuesta',
                                    'tres',
                                    'dólares',
                                ],
                                'extra' => [
                                    'total',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Jedes Sandwich kostet drei Dollar',
                                'correct' => [
                                    'jeder',
                                    'Sandwich',
                                    'kostet',
                                    'drei',
                                    'Dollar',
                                ],
                                'extra' => [
                                    'Gesamt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Chaque sandwich coûte trois dollars',
                                'correct' => [
                                    'chaque',
                                    'sandwich',
                                    'coûte',
                                    'trois',
                                    'dollars',
                                ],
                                'extra' => [
                                    'total',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '각각의 샌드위치는 삼 달러입니다',
                                'correct' => [
                                    '각각의',
                                    '샌드위치는',
                                    '삼',
                                    '달러입니다',
                                ],
                                'extra' => [
                                    '총액',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'コーヒー',
                            'と',
                            'サンドイッチ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a coffee and a sandwich',
                                'correct' => [
                                    'a',
                                    'coffee',
                                    'and',
                                    'a',
                                    'sandwich',
                                ],
                                'extra' => [
                                    'total',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un café y un sándwich',
                                'correct' => [
                                    'un',
                                    'café',
                                    'y',
                                    'un',
                                    'sándwich',
                                ],
                                'extra' => [
                                    'total',
                                    'cada',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Kaffee und ein Sandwich',
                                'correct' => [
                                    'ein',
                                    'Kaffee',
                                    'und',
                                    'ein',
                                    'Sandwich',
                                ],
                                'extra' => [
                                    'Gesamt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un café et un sandwich',
                                'correct' => [
                                    'un',
                                    'café',
                                    'et',
                                    'un',
                                    'sandwich',
                                ],
                                'extra' => [
                                    'total',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피와 샌드위치',
                                'correct' => [
                                    '커피와',
                                    '샌드위치',
                                ],
                                'extra' => [
                                    '총액',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: ジュース・鶏肉', 5,
                pictures: [
                    [
                        'ja' => 'ジュース',
                        'img' => 'juice',
                    ],
                    [
                        'ja' => '鶏肉',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'ja' => '選ぶ',
                    ],
                    [
                        'ja' => '飲み物',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '選び',
                            'たいです',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to choose',
                                'correct' => [
                                    'I would like',
                                    'to choose',
                                ],
                                'extra' => [
                                    'a drink',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera elegir',
                                'correct' => [
                                    'quisiera',
                                    'elegir',
                                ],
                                'extra' => [
                                    'bebida',
                                    'zumo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte wählen',
                                'correct' => [
                                    'ich möchte',
                                    'wählen',
                                ],
                                'extra' => [
                                    'Getränk',
                                    'Saft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais choisir',
                                'correct' => [
                                    'je voudrais',
                                    'choisir',
                                ],
                                'extra' => [
                                    'une boisson',
                                    'jus',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고르고 싶습니다',
                                'correct' => [
                                    '고르고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '음료',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '鶏肉',
                            'と一緒に',
                            '飲み物',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a drink with the chicken',
                                'correct' => [
                                    'a drink',
                                    'with',
                                    'the',
                                    'chicken',
                                ],
                                'extra' => [
                                    'to choose',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una bebida con el pollo',
                                'correct' => [
                                    'una bebida',
                                    'con',
                                    'el',
                                    'pollo',
                                ],
                                'extra' => [
                                    'elegir',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Getränk mit dem Hähnchen',
                                'correct' => [
                                    'ein Getränk',
                                    'mit',
                                    'dem',
                                    'Hähnchen',
                                ],
                                'extra' => [
                                    'wählen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une boisson avec le poulet',
                                'correct' => [
                                    'une boisson',
                                    'avec',
                                    'le',
                                    'poulet',
                                ],
                                'extra' => [
                                    'choisir',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기와 함께 음료',
                                'correct' => [
                                    '닭고기와',
                                    '함께',
                                    '음료',
                                ],
                                'extra' => [
                                    '고르다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ジュース',
                            'を',
                            '選ぶ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to choose the juice',
                                'correct' => [
                                    'to choose',
                                    'the',
                                    'juice',
                                ],
                                'extra' => [
                                    'a drink',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Elegir el zumo',
                                'correct' => [
                                    'elegir',
                                    'el',
                                    'zumo',
                                ],
                                'extra' => [
                                    'bebida',
                                    'pollo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Den Saft wählen',
                                'correct' => [
                                    'den',
                                    'Saft',
                                    'wählen',
                                ],
                                'extra' => [
                                    'Getränk',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Choisir le jus',
                                'correct' => [
                                    'choisir',
                                    'le',
                                    'jus',
                                ],
                                'extra' => [
                                    'une boisson',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주스를 고르다',
                                'correct' => [
                                    '주스를',
                                    '고르다',
                                ],
                                'extra' => [
                                    '음료',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
