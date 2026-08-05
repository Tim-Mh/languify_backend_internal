<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket04Seeder extends Seeder
{
    private const PICTURES = ['우유' => 'milk', '치즈' => 'cheese', '계란' => 'egg', '빵' => 'bread', '케이크' => 'cake', '병' => 'bottle'];

    /**
     * Korean Supermarket, Unit 4, the Korean twin of the English "Dairy and Bakery" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, '유닛 4: 유제품과 빵', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 우유 · 치즈', 1,
                pictures: [['ko' => '우유', 'img' => 'milk'], ['ko' => '치즈', 'img' => 'cheese']],
                plain: [['ko' => '상품'], ['ko' => '신선한']],
                phrases: [
                    'a' => [
                        'words' => ['치즈는', '신선한', '상품입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the cheese is a fresh product', 'correct' => ['the', 'cheese', 'is', 'a', 'fresh', 'product'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'El queso es un producto fresco', 'correct' => ['el', 'queso', 'es', 'un', 'producto', 'fresco'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Der Käse ist ein frisches Produkt', 'correct' => ['der', 'Käse', 'ist', 'ein', 'frisch', 'Produkt'], 'extra' => ['Milch']],
                            'fr' => ['sentence' => 'Le fromage est un produit frais', 'correct' => ['le', 'fromage', 'est', 'un', 'produit', 'frais'], 'extra' => ['lait']],
                            'ja' => ['sentence' => 'チーズは新鮮な商品です', 'correct' => ['チーズ', 'は', '新鮮な', '商品', 'です'], 'extra' => ['牛乳']],
                        ],
                    ],
                    'b' => [
                        'words' => ['신선한', '우유'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'some fresh milk', 'correct' => ['some', 'fresh', 'milk'], 'extra' => ['product']],
                            'es' => ['sentence' => 'Algo de leche fresca', 'correct' => ['algo de', 'fresco', 'leche'], 'extra' => ['producto', 'queso']],
                            'de' => ['sentence' => 'Etwas frische Milch', 'correct' => ['etwas', 'frisch', 'Milch'], 'extra' => ['Produkt', 'Käse']],
                            'fr' => ['sentence' => 'Du lait frais', 'correct' => ['du', 'lait', 'frais'], 'extra' => ['produit']],
                            'ja' => ['sentence' => '新鮮な牛乳', 'correct' => ['新鮮な', '牛乳'], 'extra' => ['商品']],
                        ],
                    ],
                    'c' => [
                        'words' => ['우유가', '든', '상품'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a product with milk', 'correct' => ['a', 'product', 'with', 'milk'], 'extra' => ['fresh']],
                            'es' => ['sentence' => 'Un producto con leche', 'correct' => ['un', 'producto', 'con', 'leche'], 'extra' => ['fresco', 'queso']],
                            'de' => ['sentence' => 'Ein Produkt mit Milch', 'correct' => ['ein', 'Produkt', 'mit', 'Milch'], 'extra' => ['frisch', 'Käse']],
                            'fr' => ['sentence' => 'Un produit avec du lait', 'correct' => ['un', 'produit', 'avec', 'lait'], 'extra' => ['frais']],
                            'ja' => ['sentence' => '牛乳入りの商品', 'correct' => ['牛乳', '入り', 'の', '商品'], 'extra' => ['新鮮']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 계란 · 빵', 2,
                pictures: [['ko' => '계란', 'img' => 'egg'], ['ko' => '빵', 'img' => 'bread']],
                plain: [['ko' => '버터'], ['ko' => '약간의']],
                phrases: [
                    'a' => [
                        'words' => ['계란', '몇', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'some eggs', 'correct' => ['some', 'eggs'], 'extra' => ['butter']],
                            'es' => ['sentence' => 'Unos huevos', 'correct' => ['algo de', 'huevos'], 'extra' => ['mantequilla', 'pan']],
                            'de' => ['sentence' => 'Ein paar Eier', 'correct' => ['ein paar', 'Eier'], 'extra' => ['Butter', 'Brot']],
                            'fr' => ['sentence' => 'Des œufs', 'correct' => ['du', 'œufs'], 'extra' => ['beurre', 'pain']],
                            'ja' => ['sentence' => '卵', 'correct' => ['卵'], 'extra' => ['バター']],
                        ],
                    ],
                    'b' => [
                        'words' => ['버터를', '바른', '빵'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'some bread with butter', 'correct' => ['some', 'bread', 'with', 'butter'], 'extra' => ['egg']],
                            'es' => ['sentence' => 'Algo de pan con mantequilla', 'correct' => ['algo de', 'pan', 'con', 'mantequilla'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Etwas Brot mit Butter', 'correct' => ['etwas', 'Brot', 'mit', 'Butter'], 'extra' => ['Eier']],
                            'fr' => ['sentence' => 'Du pain avec du beurre', 'correct' => ['du', 'pain', 'avec', 'beurre'], 'extra' => ['œufs']],
                            'ja' => ['sentence' => 'バター付きのパン', 'correct' => ['バター', '付き', 'の', 'パン'], 'extra' => ['卵']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵과', '계란'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'some bread and some eggs', 'correct' => ['some', 'bread', 'and', 'some', 'eggs'], 'extra' => ['butter']],
                            'es' => ['sentence' => 'Algo de pan y unos huevos', 'correct' => ['algo de', 'pan', 'y', 'algo de', 'huevos'], 'extra' => ['mantequilla']],
                            'de' => ['sentence' => 'Etwas Brot und ein paar Eier', 'correct' => ['etwas', 'Brot', 'und', 'ein paar', 'Eier'], 'extra' => ['Butter']],
                            'fr' => ['sentence' => 'Du pain et des œufs', 'correct' => ['du', 'pain', 'et', 'du', 'œufs'], 'extra' => ['beurre']],
                            'ja' => ['sentence' => 'パンと卵', 'correct' => ['パン', 'と', '卵'], 'extra' => ['バター']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 빵 · 케이크', 3,
                pictures: [['ko' => '빵', 'img' => 'bread'], ['ko' => '케이크', 'img' => 'cake']],
                plain: [['ko' => '빵집'], ['ko' => '뜨거운']],
                phrases: [
                    'a' => [
                        'words' => ['빵집의', '빵'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the bread from the bakery', 'correct' => ['the', 'bread', 'from', 'the', 'bakery'], 'extra' => ['hot']],
                            'es' => ['sentence' => 'El pan de la panadería', 'correct' => ['el', 'pan', 'de', 'la', 'panadería'], 'extra' => ['caliente', 'pastel']],
                            'de' => ['sentence' => 'Das Brot aus der Bäckerei', 'correct' => ['das', 'Brot', 'von', 'der', 'Bäckerei'], 'extra' => ['heiß', 'Kuchen']],
                            'fr' => ['sentence' => 'Le pain de la boulangerie', 'correct' => ['le', 'pain', 'de', 'la', 'boulangerie'], 'extra' => ['chaud', 'gâteau']],
                            'ja' => ['sentence' => 'パン屋のパン', 'correct' => ['パン屋', 'の', 'パン'], 'extra' => ['熱い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['뜨거운', '케이크'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a hot cake', 'correct' => ['a', 'hot', 'cake'], 'extra' => ['bakery']],
                            'es' => ['sentence' => 'Un pastel caliente', 'correct' => ['un', 'pastel', 'caliente'], 'extra' => ['panadería', 'pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen', 'correct' => ['ein', 'heiß', 'Kuchen'], 'extra' => ['Bäckerei', 'Brot']],
                            'fr' => ['sentence' => 'Un gâteau chaud', 'correct' => ['un', 'gâteau', 'chaud'], 'extra' => ['boulangerie']],
                            'ja' => ['sentence' => '熱いケーキ', 'correct' => ['熱い', 'ケーキ'], 'extra' => ['パン屋']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵집의', '뜨거운', '케이크'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a hot cake from the bakery', 'correct' => ['a', 'hot', 'cake', 'from', 'the', 'bakery'], 'extra' => ['bread']],
                            'es' => ['sentence' => 'Un pastel caliente de la panadería', 'correct' => ['un', 'pastel', 'caliente', 'de', 'la', 'panadería'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen aus der Bäckerei', 'correct' => ['ein', 'heiß', 'Kuchen', 'von', 'der', 'Bäckerei'], 'extra' => ['Brot']],
                            'fr' => ['sentence' => 'Un gâteau chaud de la boulangerie', 'correct' => ['un', 'gâteau', 'chaud', 'de', 'la', 'boulangerie'], 'extra' => ['pain']],
                            'ja' => ['sentence' => 'パン屋の熱いケーキ', 'correct' => ['パン屋', 'の', '熱い', 'ケーキ'], 'extra' => ['パン']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 병 · 우유', 4,
                pictures: [['ko' => '병', 'img' => 'bottle'], ['ko' => '우유', 'img' => 'milk']],
                plain: [['ko' => '열린'], ['ko' => '닫힌']],
                phrases: [
                    'a' => [
                        'words' => ['우유', '한', '병'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a bottle of milk', 'correct' => ['a', 'bottle', 'of', 'milk'], 'extra' => ['open']],
                            'es' => ['sentence' => 'Una botella de leche', 'correct' => ['una', 'botella', 'de', 'leche'], 'extra' => ['abierto', 'cerrado']],
                            'de' => ['sentence' => 'Eine Flasche Milch', 'correct' => ['eine', 'Flasche', 'von', 'Milch'], 'extra' => ['offen', 'geschlossen']],
                            'fr' => ['sentence' => 'Une bouteille de lait', 'correct' => ['une', 'bouteille', 'de', 'lait'], 'extra' => ['ouvert']],
                            'ja' => ['sentence' => '牛乳のボトル', 'correct' => ['牛乳', 'の', 'ボトル'], 'extra' => ['開いた']],
                        ],
                    ],
                    'b' => [
                        'words' => ['슈퍼마켓은', '열려', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the supermarket is open', 'correct' => ['the', 'supermarket', 'is', 'open'], 'extra' => ['closed']],
                            'es' => ['sentence' => 'El supermercado está abierto', 'correct' => ['el', 'supermercado', 'está', 'abierto'], 'extra' => ['cerrado', 'botella']],
                            'de' => ['sentence' => 'Der Supermarkt ist offen', 'correct' => ['der', 'Supermarkt', 'ist', 'offen'], 'extra' => ['geschlossen', 'Flasche']],
                            'fr' => ['sentence' => 'Le supermarché est ouvert', 'correct' => ['le', 'supermarché', 'est', 'ouvert'], 'extra' => ['fermé']],
                            'ja' => ['sentence' => 'スーパーは開いています', 'correct' => ['スーパー', 'は', '開いています'], 'extra' => ['閉じた']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵집은', '닫혔습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the bakery is closed', 'correct' => ['the', 'bakery', 'is', 'closed'], 'extra' => ['open']],
                            'es' => ['sentence' => 'La panadería está cerrada', 'correct' => ['la', 'panadería', 'está', 'cerrado'], 'extra' => ['abierto', 'leche']],
                            'de' => ['sentence' => 'Die Bäckerei ist geschlossen', 'correct' => ['die', 'Bäckerei', 'ist', 'geschlossen'], 'extra' => ['offen', 'Milch']],
                            'fr' => ['sentence' => 'La boulangerie est fermée', 'correct' => ['la', 'boulangerie', 'est', 'fermé'], 'extra' => ['ouvert']],
                            'ja' => ['sentence' => 'パン屋は閉じています', 'correct' => ['パン屋', 'は', '閉じています'], 'extra' => ['開いた']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 치즈 · 계란', 5,
                pictures: [['ko' => '치즈', 'img' => 'cheese'], ['ko' => '계란', 'img' => 'egg']],
                plain: [['ko' => '킬로'], ['ko' => '몇 개']],
                phrases: [
                    'a' => [
                        'words' => ['치즈', '일', '킬로'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a kilo of cheese', 'correct' => ['a', 'kilo', 'of', 'cheese'], 'extra' => ['how many']],
                            'es' => ['sentence' => 'Un kilo de queso', 'correct' => ['un', 'kilo', 'de', 'queso'], 'extra' => ['cuántos', 'huevos']],
                            'de' => ['sentence' => 'Ein Kilo Käse', 'correct' => ['ein', 'Kilo', 'von', 'Käse'], 'extra' => ['wie viele', 'Eier']],
                            'fr' => ['sentence' => 'Un kilo de fromage', 'correct' => ['un', 'kilo', 'de', 'fromage'], 'extra' => ['combien']],
                            'ja' => ['sentence' => 'チーズ一キロ', 'correct' => ['チーズ', '一', 'キロ'], 'extra' => ['いくつ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['계란', '몇', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'how many eggs', 'correct' => ['how many', 'eggs'], 'extra' => ['kilo']],
                            'es' => ['sentence' => 'Cuántos huevos', 'correct' => ['cuántos', 'huevos'], 'extra' => ['kilo', 'queso']],
                            'de' => ['sentence' => 'Wie viele Eier', 'correct' => ['wie viele', 'Eier'], 'extra' => ['Kilo', 'Käse']],
                            'fr' => ['sentence' => 'Combien d\'œufs', 'correct' => ['combien', 'œufs'], 'extra' => ['kilo']],
                            'ja' => ['sentence' => '卵はいくつ', 'correct' => ['卵', 'は', 'いくつ'], 'extra' => ['キロ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['계란과', '치즈'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'some eggs and some cheese', 'correct' => ['some', 'eggs', 'and', 'some', 'cheese'], 'extra' => ['how many']],
                            'es' => ['sentence' => 'Unos huevos y algo de queso', 'correct' => ['algo de', 'huevos', 'y', 'algo de', 'queso'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Ein paar Eier und etwas Käse', 'correct' => ['ein paar', 'Eier', 'und', 'etwas', 'Käse'], 'extra' => ['wie viele']],
                            'fr' => ['sentence' => 'Des œufs et du fromage', 'correct' => ['du', 'œufs', 'et', 'du', 'fromage'], 'extra' => ['combien']],
                            'ja' => ['sentence' => '卵とチーズ', 'correct' => ['卵', 'と', 'チーズ'], 'extra' => ['いくつ']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
