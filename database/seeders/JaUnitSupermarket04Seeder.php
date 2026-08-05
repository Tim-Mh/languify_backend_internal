<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket04Seeder extends Seeder
{
    private const PICTURES = [
        '牛乳' => 'milk',
        'チーズ' => 'cheese',
        '卵' => 'egg',
        'パン' => 'bread',
        'ケーキ' => 'cake',
        'ボトル' => 'bottle',
        '箱' => 'box',
        'かご' => 'basket',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 4, the Japanese twin of the
     * English "Unit 4: Dairy and Bakery" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'ユニット4: 乳製品とパン', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 牛乳・チーズ', 1,
                pictures: [
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                    [
                        'ja' => 'チーズ',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'ja' => '商品',
                    ],
                    [
                        'ja' => '新鮮',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'チーズ',
                            'は',
                            '新鮮な',
                            '商品',
                            'です',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cheese is a fresh product',
                                'correct' => [
                                    'the',
                                    'cheese',
                                    'is',
                                    'a',
                                    'fresh',
                                    'product',
                                ],
                                'extra' => [
                                    'milk',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El queso es un producto fresco',
                                'correct' => [
                                    'el',
                                    'queso',
                                    'es',
                                    'un',
                                    'producto',
                                    'fresco',
                                ],
                                'extra' => [
                                    'leche',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Käse ist ein frisches Produkt',
                                'correct' => [
                                    'der',
                                    'Käse',
                                    'ist',
                                    'ein',
                                    'frisch',
                                    'Produkt',
                                ],
                                'extra' => [
                                    'Milch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le fromage est un produit frais',
                                'correct' => [
                                    'le',
                                    'fromage',
                                    'est',
                                    'un',
                                    'produit',
                                    'frais',
                                ],
                                'extra' => [
                                    'lait',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '치즈는 신선한 상품입니다',
                                'correct' => [
                                    '치즈는',
                                    '신선한',
                                    '상품입니다',
                                ],
                                'extra' => [
                                    '우유',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '新鮮な',
                            '牛乳',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some fresh milk',
                                'correct' => [
                                    'some',
                                    'fresh',
                                    'milk',
                                ],
                                'extra' => [
                                    'product',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Algo de leche fresca',
                                'correct' => [
                                    'algo de',
                                    'fresco',
                                    'leche',
                                ],
                                'extra' => [
                                    'producto',
                                    'queso',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Etwas frische Milch',
                                'correct' => [
                                    'etwas',
                                    'frisch',
                                    'Milch',
                                ],
                                'extra' => [
                                    'Produkt',
                                    'Käse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du lait frais',
                                'correct' => [
                                    'du',
                                    'lait',
                                    'frais',
                                ],
                                'extra' => [
                                    'produit',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '신선한 우유',
                                'correct' => [
                                    '신선한',
                                    '우유',
                                ],
                                'extra' => [
                                    '상품',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '牛乳',
                            '入り',
                            'の',
                            '商品',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a product with milk',
                                'correct' => [
                                    'a',
                                    'product',
                                    'with',
                                    'milk',
                                ],
                                'extra' => [
                                    'fresh',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un producto con leche',
                                'correct' => [
                                    'un',
                                    'producto',
                                    'con',
                                    'leche',
                                ],
                                'extra' => [
                                    'fresco',
                                    'queso',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Produkt mit Milch',
                                'correct' => [
                                    'ein',
                                    'Produkt',
                                    'mit',
                                    'Milch',
                                ],
                                'extra' => [
                                    'frisch',
                                    'Käse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un produit avec du lait',
                                'correct' => [
                                    'un',
                                    'produit',
                                    'avec',
                                    'lait',
                                ],
                                'extra' => [
                                    'frais',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유가 든 상품',
                                'correct' => [
                                    '우유가',
                                    '든',
                                    '상품',
                                ],
                                'extra' => [
                                    '신선한',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 卵・パン', 2,
                pictures: [
                    [
                        'ja' => '卵',
                        'img' => 'egg',
                    ],
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'バター',
                    ],
                    [
                        'ja' => '少しの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '卵',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some eggs',
                                'correct' => [
                                    'some',
                                    'eggs',
                                ],
                                'extra' => [
                                    'butter',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Unos huevos',
                                'correct' => [
                                    'algo de',
                                    'huevos',
                                ],
                                'extra' => [
                                    'mantequilla',
                                    'pan',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein paar Eier',
                                'correct' => [
                                    'etwas',
                                    'Eier',
                                ],
                                'extra' => [
                                    'Butter',
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Des œufs',
                                'correct' => [
                                    'du',
                                    'œufs',
                                ],
                                'extra' => [
                                    'beurre',
                                    'pain',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계란 몇 개',
                                'correct' => [
                                    '계란',
                                    '몇',
                                    '개',
                                ],
                                'extra' => [
                                    '버터',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'バター',
                            '付き',
                            'の',
                            'パン',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some bread with butter',
                                'correct' => [
                                    'some',
                                    'bread',
                                    'with',
                                    'butter',
                                ],
                                'extra' => [
                                    'egg',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Algo de pan con mantequilla',
                                'correct' => [
                                    'algo de',
                                    'pan',
                                    'con',
                                    'mantequilla',
                                ],
                                'extra' => [
                                    'huevos',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Etwas Brot mit Butter',
                                'correct' => [
                                    'etwas',
                                    'Brot',
                                    'mit',
                                    'Butter',
                                ],
                                'extra' => [
                                    'Eier',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain avec du beurre',
                                'correct' => [
                                    'du',
                                    'pain',
                                    'avec',
                                    'beurre',
                                ],
                                'extra' => [
                                    'œufs',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '버터를 바른 빵',
                                'correct' => [
                                    '버터를',
                                    '바른',
                                    '빵',
                                ],
                                'extra' => [
                                    '계란',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'パン',
                            'と',
                            '卵',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some bread and some eggs',
                                'correct' => [
                                    'some',
                                    'bread',
                                    'and',
                                    'some',
                                    'eggs',
                                ],
                                'extra' => [
                                    'butter',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Algo de pan y unos huevos',
                                'correct' => [
                                    'algo de',
                                    'pan',
                                    'y',
                                    'algo de',
                                    'huevos',
                                ],
                                'extra' => [
                                    'mantequilla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Etwas Brot und ein paar Eier',
                                'correct' => [
                                    'etwas',
                                    'Brot',
                                    'und',
                                    'etwas',
                                    'Eier',
                                ],
                                'extra' => [
                                    'Butter',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain et des œufs',
                                'correct' => [
                                    'du',
                                    'pain',
                                    'et',
                                    'du',
                                    'œufs',
                                ],
                                'extra' => [
                                    'beurre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵과 계란',
                                'correct' => [
                                    '빵과',
                                    '계란',
                                ],
                                'extra' => [
                                    '버터',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: パン・ケーキ', 3,
                pictures: [
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'パン屋',
                    ],
                    [
                        'ja' => '熱い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'パン屋',
                            'の',
                            'パン',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the bread from the bakery',
                                'correct' => [
                                    'the',
                                    'bread',
                                    'from',
                                    'the',
                                    'bakery',
                                ],
                                'extra' => [
                                    'hot',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El pan de la panadería',
                                'correct' => [
                                    'el',
                                    'pan',
                                    'de',
                                    'la',
                                    'panadería',
                                ],
                                'extra' => [
                                    'caliente',
                                    'pastel',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Brot aus der Bäckerei',
                                'correct' => [
                                    'das',
                                    'Brot',
                                    'von',
                                    'der',
                                    'Bäckerei',
                                ],
                                'extra' => [
                                    'heiß',
                                    'Kuchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le pain de la boulangerie',
                                'correct' => [
                                    'le',
                                    'pain',
                                    'de',
                                    'la',
                                    'boulangerie',
                                ],
                                'extra' => [
                                    'chaud',
                                    'gâteau',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵집의 빵',
                                'correct' => [
                                    '빵집의',
                                    '빵',
                                ],
                                'extra' => [
                                    '뜨거운',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '熱い',
                            'ケーキ',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a hot cake',
                                'correct' => [
                                    'a',
                                    'hot',
                                    'cake',
                                ],
                                'extra' => [
                                    'bakery',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un pastel caliente',
                                'correct' => [
                                    'un',
                                    'pastel',
                                    'caliente',
                                ],
                                'extra' => [
                                    'panadería',
                                    'pan',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein heißer Kuchen',
                                'correct' => [
                                    'ein',
                                    'heiß',
                                    'Kuchen',
                                ],
                                'extra' => [
                                    'Bäckerei',
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gâteau chaud',
                                'correct' => [
                                    'un',
                                    'gâteau',
                                    'chaud',
                                ],
                                'extra' => [
                                    'boulangerie',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '뜨거운 케이크',
                                'correct' => [
                                    '뜨거운',
                                    '케이크',
                                ],
                                'extra' => [
                                    '빵집',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'パン屋',
                            'の',
                            '熱い',
                            'ケーキ',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a hot cake from the bakery',
                                'correct' => [
                                    'a',
                                    'hot',
                                    'cake',
                                    'from',
                                    'the',
                                    'bakery',
                                ],
                                'extra' => [
                                    'bread',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un pastel caliente de la panadería',
                                'correct' => [
                                    'un',
                                    'pastel',
                                    'caliente',
                                    'de',
                                    'la',
                                    'panadería',
                                ],
                                'extra' => [
                                    'pan',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein heißer Kuchen aus der Bäckerei',
                                'correct' => [
                                    'ein',
                                    'heiß',
                                    'Kuchen',
                                    'von',
                                    'der',
                                    'Bäckerei',
                                ],
                                'extra' => [
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gâteau chaud de la boulangerie',
                                'correct' => [
                                    'un',
                                    'gâteau',
                                    'chaud',
                                    'de',
                                    'la',
                                    'boulangerie',
                                ],
                                'extra' => [
                                    'pain',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵집의 뜨거운 케이크',
                                'correct' => [
                                    '빵집의',
                                    '뜨거운',
                                    '케이크',
                                ],
                                'extra' => [
                                    '빵',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: ボトル・牛乳', 4,
                pictures: [
                    [
                        'ja' => 'ボトル',
                        'img' => 'bottle',
                    ],
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'ja' => '開いた',
                    ],
                    [
                        'ja' => '閉じた',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '牛乳',
                            'の',
                            'ボトル',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a bottle of milk',
                                'correct' => [
                                    'a',
                                    'bottle',
                                    'of',
                                    'milk',
                                ],
                                'extra' => [
                                    'open',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una botella de leche',
                                'correct' => [
                                    'una',
                                    'botella',
                                    'de',
                                    'leche',
                                ],
                                'extra' => [
                                    'abierto',
                                    'cerrado',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Flasche Milch',
                                'correct' => [
                                    'eine',
                                    'Flasche',
                                    'von',
                                    'Milch',
                                ],
                                'extra' => [
                                    'offen',
                                    'geschlossen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une bouteille de lait',
                                'correct' => [
                                    'une',
                                    'bouteille',
                                    'de',
                                    'lait',
                                ],
                                'extra' => [
                                    'ouvert',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유 한 병',
                                'correct' => [
                                    '우유',
                                    '한',
                                    '병',
                                ],
                                'extra' => [
                                    '열린',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'スーパー',
                            'は',
                            '開いています',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the supermarket is open',
                                'correct' => [
                                    'the',
                                    'supermarket',
                                    'is',
                                    'open',
                                ],
                                'extra' => [
                                    'closed',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El supermercado está abierto',
                                'correct' => [
                                    'el',
                                    'supermercado',
                                    'está',
                                    'abierto',
                                ],
                                'extra' => [
                                    'cerrado',
                                    'botella',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Supermarkt ist offen',
                                'correct' => [
                                    'der',
                                    'Supermarkt',
                                    'ist',
                                    'offen',
                                ],
                                'extra' => [
                                    'geschlossen',
                                    'Flasche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le supermarché est ouvert',
                                'correct' => [
                                    'le',
                                    'supermarché',
                                    'est',
                                    'ouvert',
                                ],
                                'extra' => [
                                    'fermé',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '슈퍼마켓은 열려 있습니다',
                                'correct' => [
                                    '슈퍼마켓은',
                                    '열려',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '닫힌',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'パン屋',
                            'は',
                            '閉じています',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the bakery is closed',
                                'correct' => [
                                    'the',
                                    'bakery',
                                    'is',
                                    'closed',
                                ],
                                'extra' => [
                                    'open',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La panadería está cerrada',
                                'correct' => [
                                    'la',
                                    'panadería',
                                    'está',
                                    'cerrado',
                                ],
                                'extra' => [
                                    'abierto',
                                    'leche',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Bäckerei ist geschlossen',
                                'correct' => [
                                    'die',
                                    'Bäckerei',
                                    'ist',
                                    'geschlossen',
                                ],
                                'extra' => [
                                    'offen',
                                    'Milch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La boulangerie est fermée',
                                'correct' => [
                                    'la',
                                    'boulangerie',
                                    'est',
                                    'fermé',
                                ],
                                'extra' => [
                                    'ouvert',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵집은 닫혔습니다',
                                'correct' => [
                                    '빵집은',
                                    '닫혔습니다',
                                ],
                                'extra' => [
                                    '열린',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: チーズ・卵', 5,
                pictures: [
                    [
                        'ja' => 'チーズ',
                        'img' => 'cheese',
                    ],
                    [
                        'ja' => '卵',
                        'img' => 'egg',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'キロ',
                    ],
                    [
                        'ja' => 'いくつ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'チーズ',
                            '一',
                            'キロ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a kilo of cheese',
                                'correct' => [
                                    'a',
                                    'kilo',
                                    'of',
                                    'cheese',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un kilo de queso',
                                'correct' => [
                                    'un',
                                    'kilo',
                                    'de',
                                    'queso',
                                ],
                                'extra' => [
                                    'cuántos',
                                    'huevos',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Kilo Käse',
                                'correct' => [
                                    'ein',
                                    'Kilo',
                                    'von',
                                    'Käse',
                                ],
                                'extra' => [
                                    'wie viele',
                                    'Eier',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un kilo de fromage',
                                'correct' => [
                                    'un',
                                    'kilo',
                                    'de',
                                    'fromage',
                                ],
                                'extra' => [
                                    'combien',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '치즈 일 킬로',
                                'correct' => [
                                    '치즈',
                                    '일',
                                    '킬로',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '卵',
                            'は',
                            'いくつ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how many eggs',
                                'correct' => [
                                    'how many',
                                    'eggs',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Cuántos huevos',
                                'correct' => [
                                    'cuántos',
                                    'huevos',
                                ],
                                'extra' => [
                                    'kilo',
                                    'queso',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wie viele Eier',
                                'correct' => [
                                    'wie viele',
                                    'Eier',
                                ],
                                'extra' => [
                                    'Kilo',
                                    'Käse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Combien d\'œufs',
                                'correct' => [
                                    'combien',
                                    'œufs',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계란 몇 개',
                                'correct' => [
                                    '계란',
                                    '몇',
                                    '개',
                                ],
                                'extra' => [
                                    '킬로',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '卵',
                            'と',
                            'チーズ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some eggs and some cheese',
                                'correct' => [
                                    'some',
                                    'eggs',
                                    'and',
                                    'some',
                                    'cheese',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Unos huevos y algo de queso',
                                'correct' => [
                                    'algo de',
                                    'huevos',
                                    'y',
                                    'algo de',
                                    'queso',
                                ],
                                'extra' => [
                                    'cuántos',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein paar Eier und etwas Käse',
                                'correct' => [
                                    'etwas',
                                    'Eier',
                                    'und',
                                    'etwas',
                                    'Käse',
                                ],
                                'extra' => [
                                    'wie viele',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Des œufs et du fromage',
                                'correct' => [
                                    'du',
                                    'œufs',
                                    'et',
                                    'du',
                                    'fromage',
                                ],
                                'extra' => [
                                    'combien',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계란과 치즈',
                                'correct' => [
                                    '계란과',
                                    '치즈',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
