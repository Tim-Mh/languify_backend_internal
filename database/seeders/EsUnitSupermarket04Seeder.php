<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket04Seeder extends Seeder
{
    private const PICTURES = [
        'leche' => 'milk',
        'queso' => 'cheese',
        'huevos' => 'egg',
        'pan' => 'bread',
        'pastel' => 'cake',
        'botella' => 'bottle',
        'caja' => 'box',
        'cesta' => 'basket',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 4, the Spanish twin of the
     * English "Unit 4: Dairy and Bakery" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unidad 4: Lácteos y panadería', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Leche y Queso', 1,
                pictures: [
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                    [
                        'es' => 'queso',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'es' => 'producto',
                    ],
                    [
                        'es' => 'fresco',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'queso',
                            'es',
                            'un',
                            'producto',
                            'fresco',
                        ],
                        'blank' => 5,
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
                            'ja' => [
                                'sentence' => 'チーズは新鮮な商品です',
                                'correct' => [
                                    'チーズ',
                                    'は',
                                    '新鮮な',
                                    '商品',
                                    'です',
                                ],
                                'extra' => [
                                    '牛乳',
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
                            'Algo',
                            'de',
                            'leche',
                            'fresca',
                        ],
                        'blank' => 3,
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
                                    'cheese',
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
                            'ja' => [
                                'sentence' => '新鮮な牛乳',
                                'correct' => [
                                    '新鮮な',
                                    '牛乳',
                                ],
                                'extra' => [
                                    '商品',
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
                            'Un',
                            'producto',
                            'con',
                            'leche',
                        ],
                        'blank' => 1,
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
                                    'cheese',
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
                            'ja' => [
                                'sentence' => '牛乳入りの商品',
                                'correct' => [
                                    '牛乳',
                                    '入り',
                                    'の',
                                    '商品',
                                ],
                                'extra' => [
                                    '新鮮',
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
            $builder->lesson('Lección 2: Huevos y Pan', 2,
                pictures: [
                    [
                        'es' => 'huevos',
                        'img' => 'egg',
                    ],
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'es' => 'mantequilla',
                    ],
                    [
                        'es' => 'algo de',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Unos',
                            'huevos',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some eggs',
                                'correct' => [
                                    'some',
                                    'eggs',
                                ],
                                'extra' => [
                                    'butter',
                                    'bread',
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
                            'ja' => [
                                'sentence' => '卵',
                                'correct' => [
                                    '卵',
                                ],
                                'extra' => [
                                    'バター',
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
                            'Algo',
                            'de',
                            'pan',
                            'con',
                            'mantequilla',
                        ],
                        'blank' => 4,
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
                                    'eggs',
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
                            'ja' => [
                                'sentence' => 'バター付きのパン',
                                'correct' => [
                                    'バター',
                                    '付き',
                                    'の',
                                    'パン',
                                ],
                                'extra' => [
                                    '卵',
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
                            'Algo',
                            'de',
                            'pan',
                            'y',
                            'unos',
                            'huevos',
                        ],
                        'blank' => 5,
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
                            'ja' => [
                                'sentence' => 'パンと卵',
                                'correct' => [
                                    'パン',
                                    'と',
                                    '卵',
                                ],
                                'extra' => [
                                    'バター',
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
            $builder->lesson('Lección 3: Pan y Pastel', 3,
                pictures: [
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                    [
                        'es' => 'pastel',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'es' => 'panadería',
                    ],
                    [
                        'es' => 'caliente',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pan',
                            'de',
                            'la',
                            'panadería',
                        ],
                        'blank' => 4,
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
                                    'cake',
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
                            'ja' => [
                                'sentence' => 'パン屋のパン',
                                'correct' => [
                                    'パン屋',
                                    'の',
                                    'パン',
                                ],
                                'extra' => [
                                    '熱い',
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
                            'Un',
                            'pastel',
                            'caliente',
                        ],
                        'blank' => 2,
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
                                    'bread',
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
                            'ja' => [
                                'sentence' => '熱いケーキ',
                                'correct' => [
                                    '熱い',
                                    'ケーキ',
                                ],
                                'extra' => [
                                    'パン屋',
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
                            'Un',
                            'pastel',
                            'caliente',
                            'de',
                            'la',
                            'panadería',
                        ],
                        'blank' => 5,
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
                            'ja' => [
                                'sentence' => 'パン屋の熱いケーキ',
                                'correct' => [
                                    'パン屋',
                                    'の',
                                    '熱い',
                                    'ケーキ',
                                ],
                                'extra' => [
                                    'パン',
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
            $builder->lesson('Lección 4: Botella y Leche', 4,
                pictures: [
                    [
                        'es' => 'botella',
                        'img' => 'bottle',
                    ],
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'es' => 'abierto',
                    ],
                    [
                        'es' => 'cerrado',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'botella',
                            'de',
                            'leche',
                        ],
                        'blank' => 1,
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
                                    'closed',
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
                            'ja' => [
                                'sentence' => '牛乳のボトル',
                                'correct' => [
                                    '牛乳',
                                    'の',
                                    'ボトル',
                                ],
                                'extra' => [
                                    '開いた',
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
                            'El',
                            'supermercado',
                            'está',
                            'abierto',
                        ],
                        'blank' => 3,
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
                                    'bottle',
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
                            'ja' => [
                                'sentence' => 'スーパーは開いています',
                                'correct' => [
                                    'スーパー',
                                    'は',
                                    '開いています',
                                ],
                                'extra' => [
                                    '閉じた',
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
                            'La',
                            'panadería',
                            'está',
                            'cerrada',
                        ],
                        'blank' => 1,
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
                                    'milk',
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
                            'ja' => [
                                'sentence' => 'パン屋は閉じています',
                                'correct' => [
                                    'パン屋',
                                    'は',
                                    '閉じています',
                                ],
                                'extra' => [
                                    '開いた',
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
            $builder->lesson('Lección 5: Queso y Huevos', 5,
                pictures: [
                    [
                        'es' => 'queso',
                        'img' => 'cheese',
                    ],
                    [
                        'es' => 'huevos',
                        'img' => 'egg',
                    ],
                ],
                plain: [
                    [
                        'es' => 'kilo',
                    ],
                    [
                        'es' => 'cuántos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'kilo',
                            'de',
                            'queso',
                        ],
                        'blank' => 1,
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
                                    'eggs',
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
                            'ja' => [
                                'sentence' => 'チーズ一キロ',
                                'correct' => [
                                    'チーズ',
                                    '一',
                                    'キロ',
                                ],
                                'extra' => [
                                    'いくつ',
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
                            'Cuántos',
                            'huevos',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how many eggs',
                                'correct' => [
                                    'how many',
                                    'eggs',
                                ],
                                'extra' => [
                                    'kilo',
                                    'cheese',
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
                            'ja' => [
                                'sentence' => '卵はいくつ',
                                'correct' => [
                                    '卵',
                                    'は',
                                    'いくつ',
                                ],
                                'extra' => [
                                    'キロ',
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
                            'Unos',
                            'huevos',
                            'y',
                            'algo',
                            'de',
                            'queso',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '卵とチーズ',
                                'correct' => [
                                    '卵',
                                    'と',
                                    'チーズ',
                                ],
                                'extra' => [
                                    'いくつ',
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
