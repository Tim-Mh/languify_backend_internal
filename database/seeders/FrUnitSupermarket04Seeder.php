<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket04Seeder extends Seeder
{
    private const PICTURES = [
        'Lait' => 'milk', 'Fromage' => 'cheese', 'Œufs' => 'egg', 'Pain' => 'bread',
        'Gâteau' => 'cake', 'Bouteille' => 'bottle', 'Boîte' => 'box', 'Panier' => 'basket',
    ];

    /**
     * French Chapter 4, Unit 4 — dairy and the bakery counter.
     *
     * Lesson 4 is where "ouvert" and "fermé" from Chapter 2 finally get the
     * context that makes them stick: a shop you can or cannot walk into.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Dairy and Bakery', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Milk and Cheese', 1,
                pictures: [['fr' => 'Lait', 'img' => 'milk'], ['fr' => 'Fromage', 'img' => 'cheese']],
                plain: [['fr' => 'Produit'], ['fr' => 'Frais']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'fromage', 'est', 'un', 'produit', 'frais'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The cheese is a fresh product', 'correct' => ['the', 'cheese', 'is', 'a', 'fresh', 'product'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'El queso es un producto fresco', 'correct' => ['el', 'queso', 'es', 'un', 'producto', 'fresco'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Der Käse ist ein frisches Produkt', 'correct' => ['der', 'Käse', 'ist', 'ein', 'Produkt', 'frisch'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'チーズは新鮮な商品です', 'correct' => ['チーズ', 'は', '新鮮な', '商品', 'です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '치즈는 신선한 상품입니다', 'correct' => ['치즈는', '신선한', '상품입니다'], 'extra' => ['우유']],
                        ],
                    ],
                    'b' => [
                        'words' => ['du', 'lait', 'frais'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Some fresh milk', 'correct' => ['some', 'fresh', 'milk'], 'extra' => ['product', 'cheese']],
                            'es' => ['sentence' => 'Algo de leche fresca', 'correct' => ['algo de', 'fresco', 'leche'], 'extra' => ['producto', 'queso']],
                            'de' => ['sentence' => 'Etwas frische Milch', 'correct' => ['etwas', 'frisch', 'Milch'], 'extra' => ['Produkt', 'Käse']],
                            'ja' => ['sentence' => '新鮮な牛乳', 'correct' => ['新鮮な', '牛乳'], 'extra' => ['商品']],
                            'ko' => ['sentence' => '신선한 우유', 'correct' => ['신선한', '우유'], 'extra' => ['상품']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'produit', 'avec', 'du', 'lait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A product with milk', 'correct' => ['a', 'product', 'with', 'some', 'milk'], 'extra' => ['fresh', 'cheese']],
                            'es' => ['sentence' => 'Un producto con leche', 'correct' => ['un', 'producto', 'con', 'algo de', 'leche'], 'extra' => ['fresco', 'queso']],
                            'de' => ['sentence' => 'Ein Produkt mit Milch', 'correct' => ['ein', 'Produkt', 'mit', 'etwas', 'Milch'], 'extra' => ['frisch', 'Käse']],
                            'ja' => ['sentence' => '牛乳入りの商品', 'correct' => ['牛乳', '入り', 'の', '商品'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '우유가 든 상품', 'correct' => ['우유가', '든', '상품'], 'extra' => ['신선한']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Eggs and Butter', 2,
                pictures: [['fr' => 'Œufs', 'img' => 'egg'], ['fr' => 'Pain', 'img' => 'bread']],
                plain: [['fr' => 'Beurre'], ['fr' => 'Donner']],
                phrases: [
                    'a' => [
                        'words' => ['donner', 'des', 'œufs'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To give some eggs', 'correct' => ['to give', 'some', 'eggs'], 'extra' => ['butter', 'bread']],
                            'es' => ['sentence' => 'Dar unos huevos', 'correct' => ['dar', 'unos', 'huevos'], 'extra' => ['mantequilla', 'pan']],
                            'de' => ['sentence' => 'Eier geben', 'correct' => ['geben', 'einige', 'Eier'], 'extra' => ['Butter', 'Brot']],
                            'ja' => ['sentence' => '卵を与える', 'correct' => ['卵', 'を', '与える'], 'extra' => ['バター']],
                            'ko' => ['sentence' => '계란을 주다', 'correct' => ['계란을', '주다'], 'extra' => ['버터']],
                        ],
                    ],
                    'b' => [
                        'words' => ['du', 'pain', 'avec', 'du', 'beurre'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Some bread with some butter', 'correct' => ['some', 'bread', 'with', 'some', 'butter'], 'extra' => ['to give', 'eggs']],
                            'es' => ['sentence' => 'Algo de pan con mantequilla', 'correct' => ['algo de', 'pan', 'con', 'algo de', 'mantequilla'], 'extra' => ['dar', 'huevos']],
                            'de' => ['sentence' => 'Etwas Brot mit Butter', 'correct' => ['etwas', 'Brot', 'mit', 'etwas', 'Butter'], 'extra' => ['geben', 'Eier']],
                            'ja' => ['sentence' => 'バター付きのパン', 'correct' => ['バター', '付き', 'の', 'パン'], 'extra' => ['与える']],
                            'ko' => ['sentence' => '버터를 바른 빵', 'correct' => ['버터를', '바른', '빵'], 'extra' => ['주다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['donner', 'du', 'pain', 'et', 'du', 'beurre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To give some bread and some butter', 'correct' => ['to give', 'some', 'bread', 'and', 'some', 'butter'], 'extra' => ['eggs']],
                            'es' => ['sentence' => 'Dar pan y mantequilla', 'correct' => ['dar', 'algo de', 'pan', 'y', 'algo de', 'mantequilla'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Brot und Butter geben', 'correct' => ['geben', 'etwas', 'Brot', 'und', 'etwas', 'Butter'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => 'パンとバターを与える', 'correct' => ['パン', 'と', 'バター', 'を', '与える'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '빵과 버터를 주다', 'correct' => ['빵과', '버터를', '주다'], 'extra' => ['계란']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: From the Bakery', 3,
                pictures: [['fr' => 'Pain', 'img' => 'bread'], ['fr' => 'Gâteau', 'img' => 'cake']],
                plain: [['fr' => 'Boulangerie'], ['fr' => 'Chaud']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'pain', 'de', 'la', 'boulangerie'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The bread from the bakery', 'correct' => ['the', 'bread', 'from', 'the', 'bakery'], 'extra' => ['hot', 'cake']],
                            'es' => ['sentence' => 'El pan de la panadería', 'correct' => ['el', 'pan', 'de', 'la', 'panadería'], 'extra' => ['caliente', 'pastel']],
                            'de' => ['sentence' => 'Das Brot aus der Bäckerei', 'correct' => ['das', 'Brot', 'von', 'der', 'Bäckerei'], 'extra' => ['heiß', 'Kuchen']],
                            'ja' => ['sentence' => 'パン屋のパン', 'correct' => ['パン屋', 'の', 'パン'], 'extra' => ['熱い']],
                            'ko' => ['sentence' => '빵집의 빵', 'correct' => ['빵집의', '빵'], 'extra' => ['뜨거운']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'gâteau', 'chaud'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A hot cake', 'correct' => ['a', 'hot', 'cake'], 'extra' => ['bakery', 'bread']],
                            'es' => ['sentence' => 'Un pastel caliente', 'correct' => ['un', 'pastel', 'caliente'], 'extra' => ['panadería', 'pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen', 'correct' => ['ein', 'heiß', 'Kuchen'], 'extra' => ['Bäckerei', 'Brot']],
                            'ja' => ['sentence' => '熱いケーキ', 'correct' => ['熱い', 'ケーキ'], 'extra' => ['パン屋']],
                            'ko' => ['sentence' => '뜨거운 케이크', 'correct' => ['뜨거운', '케이크'], 'extra' => ['빵집']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'gâteau', 'chaud', 'de', 'la', 'boulangerie'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A hot cake from the bakery', 'correct' => ['a', 'hot', 'cake', 'from', 'the', 'bakery'], 'extra' => ['bread']],
                            'es' => ['sentence' => 'Un pastel caliente de la panadería', 'correct' => ['un', 'pastel', 'caliente', 'de', 'la', 'panadería'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen aus der Bäckerei', 'correct' => ['ein', 'heiß', 'Kuchen', 'von', 'der', 'Bäckerei'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'パン屋の熱いケーキ', 'correct' => ['パン屋', 'の', '熱い', 'ケーキ'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '빵집의 뜨거운 케이크', 'correct' => ['빵집의', '뜨거운', '케이크'], 'extra' => ['빵']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Open or Closed', 4,
                pictures: [['fr' => 'Bouteille', 'img' => 'bottle'], ['fr' => 'Lait', 'img' => 'milk']],
                plain: [['fr' => 'Ouvert'], ['fr' => 'Fermé']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'bouteille', 'de', 'lait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A bottle of milk', 'correct' => ['a', 'bottle', 'of', 'milk'], 'extra' => ['open', 'closed']],
                            'es' => ['sentence' => 'Una botella de leche', 'correct' => ['una', 'botella', 'de', 'leche'], 'extra' => ['abierto', 'cerrado']],
                            'de' => ['sentence' => 'Eine Flasche Milch', 'correct' => ['eine', 'Flasche', 'von', 'Milch'], 'extra' => ['offen', 'geschlossen']],
                            'ja' => ['sentence' => '牛乳のボトル', 'correct' => ['牛乳', 'の', 'ボトル'], 'extra' => ['開いた']],
                            'ko' => ['sentence' => '우유 한 병', 'correct' => ['우유', '한', '병'], 'extra' => ['열린']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'magasin', 'est', 'ouvert'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The shop is open', 'correct' => ['the', 'shop', 'is', 'open'], 'extra' => ['closed', 'bottle']],
                            'es' => ['sentence' => 'La tienda está abierta', 'correct' => ['la', 'tienda', 'está', 'abierto'], 'extra' => ['cerrado', 'botella']],
                            'de' => ['sentence' => 'Das Geschäft ist offen', 'correct' => ['das', 'Geschäft', 'ist', 'offen'], 'extra' => ['geschlossen', 'Flasche']],
                            'ja' => ['sentence' => '店は開いています', 'correct' => ['店', 'は', '開いています'], 'extra' => ['閉じた']],
                            'ko' => ['sentence' => '가게는 열려 있습니다', 'correct' => ['가게는', '열려', '있습니다'], 'extra' => ['닫힌']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'supermarché', 'est', 'fermé'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The supermarket is closed', 'correct' => ['the', 'supermarket', 'is', 'closed'], 'extra' => ['open', 'milk']],
                            'es' => ['sentence' => 'El supermercado está cerrado', 'correct' => ['el', 'supermercado', 'está', 'cerrado'], 'extra' => ['abierto', 'leche']],
                            'de' => ['sentence' => 'Der Supermarkt ist geschlossen', 'correct' => ['der', 'Supermarkt', 'ist', 'geschlossen'], 'extra' => ['offen', 'Milch']],
                            'ja' => ['sentence' => 'スーパーは閉じています', 'correct' => ['スーパー', 'は', '閉じています'], 'extra' => ['開いた']],
                            'ko' => ['sentence' => '슈퍼마켓은 닫혔습니다', 'correct' => ['슈퍼마켓은', '닫혔습니다'], 'extra' => ['열린']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: How Much Cheese', 5,
                pictures: [['fr' => 'Fromage', 'img' => 'cheese'], ['fr' => 'Œufs', 'img' => 'egg']],
                plain: [['fr' => 'Kilo'], ['fr' => 'Combien']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'kilo', 'de', 'fromage'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A kilo of cheese', 'correct' => ['a', 'kilo', 'of', 'cheese'], 'extra' => ['how much', 'eggs']],
                            'es' => ['sentence' => 'Un kilo de queso', 'correct' => ['un', 'kilo', 'de', 'queso'], 'extra' => ['cuánto', 'huevos']],
                            'de' => ['sentence' => 'Ein Kilo Käse', 'correct' => ['ein', 'Kilo', 'von', 'Käse'], 'extra' => ['wie viel', 'Eier']],
                            'ja' => ['sentence' => 'チーズ一キロ', 'correct' => ['チーズ', '一', 'キロ'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '치즈 일 킬로', 'correct' => ['치즈', '일', '킬로'], 'extra' => ['계란']],
                        ],
                    ],
                    'b' => [
                        'words' => ['des', 'œufs', 'et', 'du', 'fromage'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Some eggs and some cheese', 'correct' => ['some', 'eggs', 'and', 'some', 'cheese'], 'extra' => ['kilo', 'how much']],
                            'es' => ['sentence' => 'Unos huevos y queso', 'correct' => ['unos', 'huevos', 'y', 'algo de', 'queso'], 'extra' => ['kilo', 'cuánto']],
                            'de' => ['sentence' => 'Eier und Käse', 'correct' => ['einige', 'Eier', 'und', 'etwas', 'Käse'], 'extra' => ['Kilo', 'wie viel']],
                            'ja' => ['sentence' => '卵とチーズ', 'correct' => ['卵', 'と', 'チーズ'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '계란과 치즈', 'correct' => ['계란과', '치즈'], 'extra' => ['킬로']],
                        ],
                    ],
                    'c' => [
                        'words' => ['combien', 'coûte', 'le', 'kilo'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'How much does the kilo cost', 'correct' => ['how much', 'costs', 'the', 'kilo'], 'extra' => ['cheese', 'eggs']],
                            'es' => ['sentence' => 'Cuánto cuesta el kilo', 'correct' => ['cuánto', 'cuesta', 'el', 'kilo'], 'extra' => ['queso', 'huevos']],
                            'de' => ['sentence' => 'Wie viel kostet das Kilo', 'correct' => ['wie viel', 'kostet', 'das', 'Kilo'], 'extra' => ['Käse', 'Eier']],
                            'ja' => ['sentence' => '一キロはいくらですか', 'correct' => ['一', 'キロ', 'は', 'いくら', 'です', 'か'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '일 킬로는 얼마입니까', 'correct' => ['일', '킬로는', '얼마입니까'], 'extra' => ['치즈']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
