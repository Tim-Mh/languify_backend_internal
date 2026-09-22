<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant02Seeder extends Seeder
{
    private const PICTURES = [
        'menú' => 'menu',
        'pastel' => 'cake',
        'vino' => 'wine',
        'zumo' => 'juice',
        'ensalada' => 'salad',
        'sándwich' => 'sandwich',
        'café' => 'coffee',
        'pollo' => 'chicken',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 2, the Spanish twin of the
     * English "Unit 2: Menu and Prices" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unidad 2: Menú y precios', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Menú y Pastel', 1,
                pictures: [
                    [
                        'es' => 'menú',
                        'img' => 'menu',
                    ],
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'es' => 'precio',
                    ],
                    [
                        'es' => 'cuántos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'precio',
                            'del',
                            'menú',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'qiymət menyu', 'correct' => ['qiymət', 'menyu'], 'extra' => ['tort']],
                            'ar' => ['sentence' => 'سعر قائمة الطعام', 'correct' => ['سعر', 'قائمة الطعام'], 'extra' => ['كعكة']],
                            'ru' => ['sentence' => 'цена меню', 'correct' => ['цена', 'меню'], 'extra' => ['торт']],
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
                            'ja' => [
                                'sentence' => 'メニューの値段',
                                'correct' => [
                                    'メニュー',
                                    'の',
                                    '値段',
                                ],
                                'extra' => [
                                    'ケーキ',
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
                            'tr' => ['sentence' => 'menünün fiyatı', 'correct' => ['menünün', 'fiyatı'], 'extra' => ['pasta']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Cuánto',
                            'por',
                            'el',
                            'pastel',
                        ],
                        'blank' => 0,
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
                            'az' => ['sentence' => 'neçə üçün tort', 'correct' => ['neçə', 'üçün', 'tort'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'كم لأجل كعكة', 'correct' => ['كم', 'لأجل', 'كعكة'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'сколько для торт', 'correct' => ['сколько', 'для', 'торт'], 'extra' => ['цена']],
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
                            'ja' => [
                                'sentence' => 'ケーキはいくつ',
                                'correct' => [
                                    'ケーキ',
                                    'は',
                                    'いくつ',
                                ],
                                'extra' => [
                                    '値段',
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
                            'tr' => ['sentence' => 'pasta kaç lira', 'correct' => ['pasta', 'kaç', 'lira'], 'extra' => ['fiyat']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'precio',
                            'del',
                            'pastel',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'qiymət tort', 'correct' => ['qiymət', 'tort'], 'extra' => ['menyu']],
                            'ar' => ['sentence' => 'سعر كعكة', 'correct' => ['سعر', 'كعكة'], 'extra' => ['قائمة الطعام']],
                            'ru' => ['sentence' => 'цена торт', 'correct' => ['цена', 'торт'], 'extra' => ['меню']],
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
                            'ja' => [
                                'sentence' => 'ケーキの値段',
                                'correct' => [
                                    'ケーキ',
                                    'の',
                                    '値段',
                                ],
                                'extra' => [
                                    'メニュー',
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
                            'tr' => ['sentence' => 'pastanın fiyatı', 'correct' => ['pastanın', 'fiyatı'], 'extra' => ['menü']],
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
                        'es' => 'caro',
                    ],
                    [
                        'es' => 'barato',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'vino',
                            'es',
                            'caro',
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
                                    'juice',
                                ],
                            ],
                            'az' => ['sentence' => 'şərab bahalı', 'correct' => ['şərab', 'bahalı'], 'extra' => ['ucuz', 'şirə']],
                            'ar' => ['sentence' => 'نبيذ غالي', 'correct' => ['نبيذ', 'غالي'], 'extra' => ['رخيص', 'عصير']],
                            'ru' => ['sentence' => 'вино дорогой', 'correct' => ['вино', 'дорогой'], 'extra' => ['дешёвый', 'сок']],
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
                            'ja' => [
                                'sentence' => 'ワインは高いです',
                                'correct' => [
                                    'ワイン',
                                    'は',
                                    '高い',
                                    'です',
                                ],
                                'extra' => [
                                    '安い',
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
                            'tr' => ['sentence' => 'şarap pahalı', 'correct' => ['şarap', 'pahalı'], 'extra' => ['ucuz', 'meyve suyu']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'zumo',
                            'es',
                            'barato',
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
                                    'wine',
                                ],
                            ],
                            'az' => ['sentence' => 'şirə ucuz', 'correct' => ['şirə', 'ucuz'], 'extra' => ['bahalı', 'şərab']],
                            'ar' => ['sentence' => 'عصير رخيص', 'correct' => ['عصير', 'رخيص'], 'extra' => ['غالي', 'نبيذ']],
                            'ru' => ['sentence' => 'сок дешёвый', 'correct' => ['сок', 'дешёвый'], 'extra' => ['дорогой', 'вино']],
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
                            'ja' => [
                                'sentence' => 'ジュースは安いです',
                                'correct' => [
                                    'ジュース',
                                    'は',
                                    '安い',
                                    'です',
                                ],
                                'extra' => [
                                    '高い',
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
                            'tr' => ['sentence' => 'meyve suyu ucuz', 'correct' => ['meyve', 'suyu', 'ucuz'], 'extra' => ['pahalı', 'şarap']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Caro',
                            'o',
                            'barato',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bahalı və ya ucuz', 'correct' => ['bahalı', 'və ya', 'ucuz'], 'extra' => ['şərab']],
                            'ar' => ['sentence' => 'غالي أو رخيص', 'correct' => ['غالي', 'أو', 'رخيص'], 'extra' => ['نبيذ']],
                            'ru' => ['sentence' => 'дорогой или дешёвый', 'correct' => ['дорогой', 'или', 'дешёвый'], 'extra' => ['вино']],
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
                            'ja' => [
                                'sentence' => '高いか安い',
                                'correct' => [
                                    '高い',
                                    'か',
                                    '安い',
                                ],
                                'extra' => [
                                    'ワイン',
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
                            'tr' => ['sentence' => 'pahalı veya ucuz', 'correct' => ['pahalı', 'veya', 'ucuz'], 'extra' => ['şarap']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Ensalada y Pastel', 3,
                pictures: [
                    [
                        'es' => 'ensalada',
                        'img' => 'salad',
                    ],
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'es' => 'entrante',
                    ],
                    [
                        'es' => 'postre',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'entrante',
                            'y',
                            'un',
                            'postre',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'bir qəlyanaltı və bir şirniyyat', 'correct' => ['bir', 'qəlyanaltı', 'və', 'bir', 'şirniyyat'], 'extra' => ['salat']],
                            'ar' => ['sentence' => 'مقبلات و حلوى', 'correct' => ['مقبلات', 'و', 'حلوى'], 'extra' => ['سلطة']],
                            'ru' => ['sentence' => 'закуска и десерт', 'correct' => ['закуска', 'и', 'десерт'], 'extra' => ['салат']],
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
                            'ja' => [
                                'sentence' => '前菜とデザート',
                                'correct' => [
                                    '前菜',
                                    'と',
                                    'デザート',
                                ],
                                'extra' => [
                                    'サラダ',
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
                            'tr' => ['sentence' => 'bir başlangıç ve bir tatlı', 'correct' => ['bir', 'başlangıç', 've', 'bir', 'tatlı'], 'extra' => ['salata']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'pastel',
                            'es',
                            'el',
                            'postre',
                        ],
                        'blank' => 4,
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
                            'az' => ['sentence' => 'tort şirniyyat', 'correct' => ['tort', 'şirniyyat'], 'extra' => ['qəlyanaltı']],
                            'ar' => ['sentence' => 'كعكة حلوى', 'correct' => ['كعكة', 'حلوى'], 'extra' => ['مقبلات']],
                            'ru' => ['sentence' => 'торт десерт', 'correct' => ['торт', 'десерт'], 'extra' => ['закуска']],
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
                            'ja' => [
                                'sentence' => 'ケーキはデザートです',
                                'correct' => [
                                    'ケーキ',
                                    'は',
                                    'デザート',
                                    'です',
                                ],
                                'extra' => [
                                    '前菜',
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
                            'tr' => ['sentence' => 'pasta tatlıdır', 'correct' => ['pasta', 'tatlıdır'], 'extra' => ['başlangıç']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Una',
                            'ensalada',
                            'o',
                            'un',
                            'pastel',
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
                            'az' => ['sentence' => 'bir salat və ya bir tort', 'correct' => ['bir', 'salat', 'və ya', 'bir', 'tort'], 'extra' => ['şirniyyat']],
                            'ar' => ['sentence' => 'سلطة أو كعكة', 'correct' => ['سلطة', 'أو', 'كعكة'], 'extra' => ['حلوى']],
                            'ru' => ['sentence' => 'салат или торт', 'correct' => ['салат', 'или', 'торт'], 'extra' => ['десерт']],
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
                            'ja' => [
                                'sentence' => 'サラダかケーキ',
                                'correct' => [
                                    'サラダ',
                                    'か',
                                    'ケーキ',
                                ],
                                'extra' => [
                                    'デザート',
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
                            'tr' => ['sentence' => 'bir salata veya bir pasta', 'correct' => ['bir', 'salata', 'veya', 'bir', 'pasta'], 'extra' => ['tatlı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Sándwich y Café', 4,
                pictures: [
                    [
                        'es' => 'sándwich',
                        'img' => 'sandwich',
                    ],
                    [
                        'es' => 'café',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'es' => 'total',
                    ],
                    [
                        'es' => 'cada',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'total',
                            'es',
                            'diez',
                            'dólares',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'cəmi on dollar', 'correct' => ['cəmi', 'on', 'dollar'], 'extra' => ['hər biri']],
                            'ar' => ['sentence' => 'المجموع عشرة دولارات', 'correct' => ['المجموع', 'عشرة', 'دولارات'], 'extra' => ['كل']],
                            'ru' => ['sentence' => 'итого десять долларов', 'correct' => ['итого', 'десять', 'долларов'], 'extra' => ['каждый']],
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
                            'ja' => [
                                'sentence' => '合計は十ドルです',
                                'correct' => [
                                    '合計',
                                    'は',
                                    '十',
                                    'ドル',
                                    'です',
                                ],
                                'extra' => [
                                    'それぞれの',
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
                            'tr' => ['sentence' => 'toplam on dolar', 'correct' => ['toplam', 'on', 'dolar'], 'extra' => ['her']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Cada',
                            'sándwich',
                            'cuesta',
                            'tres',
                            'dólares',
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
                            'az' => ['sentence' => 'hər biri sendviç qiyməti üç dollar', 'correct' => ['hər biri', 'sendviç', 'qiyməti', 'üç', 'dollar'], 'extra' => ['cəmi']],
                            'ar' => ['sentence' => 'كل شطيرة يكلف ثلاثة دولارات', 'correct' => ['كل', 'شطيرة', 'يكلف', 'ثلاثة', 'دولارات'], 'extra' => ['المجموع']],
                            'ru' => ['sentence' => 'каждый сэндвич стоит три долларов', 'correct' => ['каждый', 'сэндвич', 'стоит', 'три', 'долларов'], 'extra' => ['итого']],
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
                            'ja' => [
                                'sentence' => 'サンドイッチはそれぞれ三ドルです',
                                'correct' => [
                                    'サンドイッチ',
                                    'は',
                                    'それぞれ',
                                    '三',
                                    'ドル',
                                    'です',
                                ],
                                'extra' => [
                                    '合計',
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
                            'tr' => ['sentence' => 'her sandviç üç dolar', 'correct' => ['her', 'sandviç', 'üç', 'dolar'], 'extra' => ['toplam']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'café',
                            'y',
                            'un',
                            'sándwich',
                        ],
                        'blank' => 0,
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
                                    'each',
                                ],
                            ],
                            'az' => ['sentence' => 'bir qəhvə və bir sendviç', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'sendviç'], 'extra' => ['cəmi', 'hər biri']],
                            'ar' => ['sentence' => 'قهوة و شطيرة', 'correct' => ['قهوة', 'و', 'شطيرة'], 'extra' => ['المجموع', 'كل']],
                            'ru' => ['sentence' => 'кофе и сэндвич', 'correct' => ['кофе', 'и', 'сэндвич'], 'extra' => ['итого', 'каждый']],
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
                            'ja' => [
                                'sentence' => 'コーヒーとサンドイッチ',
                                'correct' => [
                                    'コーヒー',
                                    'と',
                                    'サンドイッチ',
                                ],
                                'extra' => [
                                    '合計',
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
                            'tr' => ['sentence' => 'bir kahve ve bir sandviç', 'correct' => ['bir', 'kahve', 've', 'bir', 'sandviç'], 'extra' => ['toplam', 'her']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Zumo y Pollo', 5,
                pictures: [
                    [
                        'es' => 'zumo',
                        'img' => 'juice',
                    ],
                    [
                        'es' => 'pollo',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'es' => 'elegir',
                    ],
                    [
                        'es' => 'una bebida',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quisiera',
                            'elegir',
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
                                    'juice',
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm seçmək', 'correct' => ['istəyirəm', 'seçmək'], 'extra' => ['şirə']],
                            'ar' => ['sentence' => 'أريد الاختيار', 'correct' => ['أريد', 'الاختيار'], 'extra' => ['عصير']],
                            'ru' => ['sentence' => 'я хочу выбрать', 'correct' => ['я', 'хочу', 'выбрать'], 'extra' => ['сок']],
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
                            'ja' => [
                                'sentence' => '選びたいです',
                                'correct' => [
                                    '選び',
                                    'たいです',
                                ],
                                'extra' => [
                                    '飲み物',
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
                            'tr' => ['sentence' => 'seçmek istiyorum', 'correct' => ['seçmek', 'istiyorum'], 'extra' => ['meyve suyu']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'bebida',
                            'con',
                            'el',
                            'pollo',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'içki ilə toyuq', 'correct' => ['içki', 'ilə', 'toyuq'], 'extra' => ['seçmək']],
                            'ar' => ['sentence' => 'مشروب مع دجاج', 'correct' => ['مشروب', 'مع', 'دجاج'], 'extra' => ['الاختيار']],
                            'ru' => ['sentence' => 'напиток с курица', 'correct' => ['напиток', 'с', 'курица'], 'extra' => ['выбрать']],
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
                            'ja' => [
                                'sentence' => '鶏肉と一緒に飲み物',
                                'correct' => [
                                    '鶏肉',
                                    'と一緒に',
                                    '飲み物',
                                ],
                                'extra' => [
                                    '選ぶ',
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
                            'tr' => ['sentence' => 'tavukla bir içecek', 'correct' => ['tavukla', 'bir', 'içecek'], 'extra' => ['seçmek']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Elegir',
                            'el',
                            'zumo',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to choose the juice',
                                'correct' => [
                                    'to choose',
                                    'the',
                                    'juice',
                                ],
                                'extra' => [
                                    'chicken',
                                ],
                            ],
                            'az' => ['sentence' => 'seçmək şirə', 'correct' => ['seçmək', 'şirə'], 'extra' => ['toyuq']],
                            'ar' => ['sentence' => 'الاختيار عصير', 'correct' => ['الاختيار', 'عصير'], 'extra' => ['دجاج']],
                            'ru' => ['sentence' => 'выбрать сок', 'correct' => ['выбрать', 'сок'], 'extra' => ['курица']],
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
                            'ja' => [
                                'sentence' => 'ジュースを選ぶ',
                                'correct' => [
                                    'ジュース',
                                    'を',
                                    '選ぶ',
                                ],
                                'extra' => [
                                    '飲み物',
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
                            'tr' => ['sentence' => 'meyve suyunu seçmek', 'correct' => ['meyve', 'suyunu', 'seçmek'], 'extra' => ['tavuk']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
