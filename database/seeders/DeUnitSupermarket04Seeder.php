<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket04Seeder extends Seeder
{
    private const PICTURES = [
        'Milch' => 'milk',
        'Käse' => 'cheese',
        'Eier' => 'egg',
        'Brot' => 'bread',
        'Kuchen' => 'cake',
        'Flasche' => 'bottle',
        'Schachtel' => 'box',
        'Korb' => 'basket',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 4, the German twin of the
     * English "Unit 4: Dairy and Bakery" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Einheit 4: Milchprodukte & Backwaren', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Milch & Käse', 1,
                pictures: [
                    [
                        'de' => 'Milch',
                        'img' => 'milk',
                    ],
                    [
                        'de' => 'Käse',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Produkt',
                    ],
                    [
                        'de' => 'frisch',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Käse',
                            'ist',
                            'ein',
                            'frisches',
                            'Produkt',
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
                            'Etwas',
                            'frische',
                            'Milch',
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
                                    'cheese',
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
                            'Ein',
                            'Produkt',
                            'mit',
                            'Milch',
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
            $builder->lesson('Lektion 2: Eier & Brot', 2,
                pictures: [
                    [
                        'de' => 'Eier',
                        'img' => 'egg',
                    ],
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Butter',
                    ],
                    [
                        'de' => 'etwas',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Etwas',
                            'Eier',
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
                            'Etwas',
                            'Brot',
                            'mit',
                            'Butter',
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
                                    'eggs',
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
                            'Etwas',
                            'Brot',
                            'und',
                            'etwas',
                            'Eier',
                        ],
                        'blank' => 4,
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
            $builder->lesson('Lektion 3: Brot & Kuchen', 3,
                pictures: [
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                    [
                        'de' => 'Kuchen',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Bäckerei',
                    ],
                    [
                        'de' => 'heiß',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Brot',
                            'aus',
                            'der',
                            'Bäckerei',
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
                            'Ein',
                            'heißer',
                            'Kuchen',
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
                                    'bread',
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
                            'Ein',
                            'heißer',
                            'Kuchen',
                            'aus',
                            'der',
                            'Bäckerei',
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
            $builder->lesson('Lektion 4: Flasche & Milch', 4,
                pictures: [
                    [
                        'de' => 'Flasche',
                        'img' => 'bottle',
                    ],
                    [
                        'de' => 'Milch',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'de' => 'offen',
                    ],
                    [
                        'de' => 'geschlossen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Flasche',
                            'Milch',
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
                            'Der',
                            'Supermarkt',
                            'ist',
                            'offen',
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
                            'Die',
                            'Bäckerei',
                            'ist',
                            'geschlossen',
                        ],
                        'blank' => 3,
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
            $builder->lesson('Lektion 5: Käse & Eier', 5,
                pictures: [
                    [
                        'de' => 'Käse',
                        'img' => 'cheese',
                    ],
                    [
                        'de' => 'Eier',
                        'img' => 'egg',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Kilo',
                    ],
                    [
                        'de' => 'wie viele',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Kilo',
                            'Käse',
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
                            'Wie',
                            'viele',
                            'Eier',
                        ],
                        'blank' => 1,
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
                            'Etwas',
                            'Eier',
                            'und',
                            'etwas',
                            'Käse',
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
