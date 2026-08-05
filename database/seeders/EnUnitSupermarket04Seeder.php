<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket04Seeder extends Seeder
{
    private const PICTURES = [
        'Milk' => 'milk', 'Cheese' => 'cheese', 'Eggs' => 'egg', 'Bread' => 'bread',
        'Cake' => 'cake', 'Bottle' => 'bottle', 'Box' => 'box', 'Basket' => 'basket',
    ];

    /**
     * English Chapter 4, Unit 4 — dairy and the bakery counter.
     *
     * Lesson 4 is where open and closed from Chapter 1 finally get the context
     * that makes them stick: a shop you can or cannot walk into.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Dairy and Bakery', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Milk and Cheese', 1,
                pictures: [['en' => 'Milk', 'img' => 'milk'], ['en' => 'Cheese', 'img' => 'cheese']],
                plain: [['en' => 'Product'], ['en' => 'Fresh']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'cheese', 'is', 'a', 'fresh', 'product'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El queso es un producto fresco', 'correct' => ['el', 'queso', 'es', 'un', 'producto', 'fresco'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Der Käse ist ein frisches Produkt', 'correct' => ['der', 'Käse', 'ist', 'ein', 'frisch', 'Produkt'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'チーズは新鮮な商品です', 'correct' => ['チーズ', 'は', '新鮮な', '商品', 'です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '치즈는 신선한 상품입니다', 'correct' => ['치즈는', '신선한', '상품입니다'], 'extra' => ['우유']],
                            'fr' => ['sentence' => 'Le fromage est un produit frais', 'correct' => ['le', 'fromage', 'est', 'un', 'produit', 'frais'], 'extra' => ['lait']],
                        ],
                    ],
                    'b' => [
                        'words' => ['some', 'fresh', 'milk'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de leche fresca', 'correct' => ['algo de', 'fresco', 'leche'], 'extra' => ['producto', 'queso']],
                            'de' => ['sentence' => 'Etwas frische Milch', 'correct' => ['etwas', 'frisch', 'Milch'], 'extra' => ['Produkt', 'Käse']],
                            'ja' => ['sentence' => '新鮮な牛乳', 'correct' => ['新鮮な', '牛乳'], 'extra' => ['商品']],
                            'ko' => ['sentence' => '신선한 우유', 'correct' => ['신선한', '우유'], 'extra' => ['상품']],
                            'fr' => ['sentence' => 'Du lait frais', 'correct' => ['du', 'lait', 'frais'], 'extra' => ['produit']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'product', 'with', 'milk'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un producto con leche', 'correct' => ['un', 'producto', 'con', 'leche'], 'extra' => ['fresco', 'queso']],
                            'de' => ['sentence' => 'Ein Produkt mit Milch', 'correct' => ['ein', 'Produkt', 'mit', 'Milch'], 'extra' => ['frisch', 'Käse']],
                            'ja' => ['sentence' => '牛乳入りの商品', 'correct' => ['牛乳', '入り', 'の', '商品'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '우유가 든 상품', 'correct' => ['우유가', '든', '상품'], 'extra' => ['신선한']],
                            'fr' => ['sentence' => 'Un produit avec du lait', 'correct' => ['un', 'produit', 'avec', 'lait'], 'extra' => ['frais']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Eggs and Butter', 2,
                pictures: [['en' => 'Eggs', 'img' => 'egg'], ['en' => 'Bread', 'img' => 'bread']],
                plain: [['en' => 'Butter'], ['en' => 'Some']],
                phrases: [
                    'a' => [
                        'words' => ['some', 'eggs'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Unos huevos', 'correct' => ['algo de', 'huevos'], 'extra' => ['mantequilla', 'pan']],
                            'de' => ['sentence' => 'Ein paar Eier', 'correct' => ['ein paar', 'Eier'], 'extra' => ['Butter', 'Brot']],
                            'ja' => ['sentence' => '卵', 'correct' => ['卵'], 'extra' => ['バター']],
                            'ko' => ['sentence' => '계란 몇 개', 'correct' => ['계란', '몇', '개'], 'extra' => ['버터']],
                            'fr' => ['sentence' => 'Des œufs', 'correct' => ['du', 'œufs'], 'extra' => ['beurre', 'pain']],
                        ],
                    ],
                    'b' => [
                        'words' => ['some', 'bread', 'with', 'butter'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de pan con mantequilla', 'correct' => ['algo de', 'pan', 'con', 'mantequilla'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Etwas Brot mit Butter', 'correct' => ['etwas', 'Brot', 'mit', 'Butter'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => 'バター付きのパン', 'correct' => ['バター', '付き', 'の', 'パン'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '버터를 바른 빵', 'correct' => ['버터를', '바른', '빵'], 'extra' => ['계란']],
                            'fr' => ['sentence' => 'Du pain avec du beurre', 'correct' => ['du', 'pain', 'avec', 'beurre'], 'extra' => ['œufs']],
                        ],
                    ],
                    'c' => [
                        'words' => ['some', 'bread', 'and', 'some', 'eggs'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de pan y unos huevos', 'correct' => ['algo de', 'pan', 'y', 'algo de', 'huevos'], 'extra' => ['mantequilla']],
                            'de' => ['sentence' => 'Etwas Brot und ein paar Eier', 'correct' => ['etwas', 'Brot', 'und', 'ein paar', 'Eier'], 'extra' => ['Butter']],
                            'ja' => ['sentence' => 'パンと卵', 'correct' => ['パン', 'と', '卵'], 'extra' => ['バター']],
                            'ko' => ['sentence' => '빵과 계란', 'correct' => ['빵과', '계란'], 'extra' => ['버터']],
                            'fr' => ['sentence' => 'Du pain et des œufs', 'correct' => ['du', 'pain', 'et', 'du', 'œufs'], 'extra' => ['beurre']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: From the Bakery', 3,
                pictures: [['en' => 'Bread', 'img' => 'bread'], ['en' => 'Cake', 'img' => 'cake']],
                plain: [['en' => 'Bakery'], ['en' => 'Hot']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'bread', 'from', 'the', 'bakery'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El pan de la panadería', 'correct' => ['el', 'pan', 'de', 'la', 'panadería'], 'extra' => ['caliente', 'pastel']],
                            'de' => ['sentence' => 'Das Brot aus der Bäckerei', 'correct' => ['das', 'Brot', 'von', 'der', 'Bäckerei'], 'extra' => ['heiß', 'Kuchen']],
                            'ja' => ['sentence' => 'パン屋のパン', 'correct' => ['パン屋', 'の', 'パン'], 'extra' => ['熱い']],
                            'ko' => ['sentence' => '빵집의 빵', 'correct' => ['빵집의', '빵'], 'extra' => ['뜨거운']],
                            'fr' => ['sentence' => 'Le pain de la boulangerie', 'correct' => ['le', 'pain', 'de', 'la', 'boulangerie'], 'extra' => ['chaud', 'gâteau']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'hot', 'cake'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un pastel caliente', 'correct' => ['un', 'pastel', 'caliente'], 'extra' => ['panadería', 'pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen', 'correct' => ['ein', 'heiß', 'Kuchen'], 'extra' => ['Bäckerei', 'Brot']],
                            'ja' => ['sentence' => '熱いケーキ', 'correct' => ['熱い', 'ケーキ'], 'extra' => ['パン屋']],
                            'ko' => ['sentence' => '뜨거운 케이크', 'correct' => ['뜨거운', '케이크'], 'extra' => ['빵집']],
                            'fr' => ['sentence' => 'Un gâteau chaud', 'correct' => ['un', 'gâteau', 'chaud'], 'extra' => ['boulangerie']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'hot', 'cake', 'from', 'the', 'bakery'], 'blank' => 5,
                        'tr' => [
                            'es' => ['sentence' => 'Un pastel caliente de la panadería', 'correct' => ['un', 'pastel', 'caliente', 'de', 'la', 'panadería'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen aus der Bäckerei', 'correct' => ['ein', 'heiß', 'Kuchen', 'von', 'der', 'Bäckerei'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'パン屋の熱いケーキ', 'correct' => ['パン屋', 'の', '熱い', 'ケーキ'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '빵집의 뜨거운 케이크', 'correct' => ['빵집의', '뜨거운', '케이크'], 'extra' => ['빵']],
                            'fr' => ['sentence' => 'Un gâteau chaud de la boulangerie', 'correct' => ['un', 'gâteau', 'chaud', 'de', 'la', 'boulangerie'], 'extra' => ['pain']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Open or Closed', 4,
                pictures: [['en' => 'Bottle', 'img' => 'bottle'], ['en' => 'Milk', 'img' => 'milk']],
                plain: [['en' => 'Open'], ['en' => 'Closed']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'bottle', 'of', 'milk'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una botella de leche', 'correct' => ['una', 'botella', 'de', 'leche'], 'extra' => ['abierto', 'cerrado']],
                            'de' => ['sentence' => 'Eine Flasche Milch', 'correct' => ['eine', 'Flasche', 'von', 'Milch'], 'extra' => ['offen', 'geschlossen']],
                            'ja' => ['sentence' => '牛乳のボトル', 'correct' => ['牛乳', 'の', 'ボトル'], 'extra' => ['開いた']],
                            'ko' => ['sentence' => '우유 한 병', 'correct' => ['우유', '한', '병'], 'extra' => ['열린']],
                            'fr' => ['sentence' => 'Une bouteille de lait', 'correct' => ['une', 'bouteille', 'de', 'lait'], 'extra' => ['ouvert']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'supermarket', 'is', 'open'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El supermercado está abierto', 'correct' => ['el', 'supermercado', 'está', 'abierto'], 'extra' => ['cerrado', 'botella']],
                            'de' => ['sentence' => 'Der Supermarkt ist offen', 'correct' => ['der', 'Supermarkt', 'ist', 'offen'], 'extra' => ['geschlossen', 'Flasche']],
                            'ja' => ['sentence' => 'スーパーは開いています', 'correct' => ['スーパー', 'は', '開いています'], 'extra' => ['閉じた']],
                            'ko' => ['sentence' => '슈퍼마켓은 열려 있습니다', 'correct' => ['슈퍼마켓은', '열려', '있습니다'], 'extra' => ['닫힌']],
                            'fr' => ['sentence' => 'Le supermarché est ouvert', 'correct' => ['le', 'supermarché', 'est', 'ouvert'], 'extra' => ['fermé']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'bakery', 'is', 'closed'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La panadería está cerrada', 'correct' => ['la', 'panadería', 'está', 'cerrado'], 'extra' => ['abierto', 'leche']],
                            'de' => ['sentence' => 'Die Bäckerei ist geschlossen', 'correct' => ['die', 'Bäckerei', 'ist', 'geschlossen'], 'extra' => ['offen', 'Milch']],
                            'ja' => ['sentence' => 'パン屋は閉じています', 'correct' => ['パン屋', 'は', '閉じています'], 'extra' => ['開いた']],
                            'ko' => ['sentence' => '빵집은 닫혔습니다', 'correct' => ['빵집은', '닫혔습니다'], 'extra' => ['열린']],
                            'fr' => ['sentence' => 'La boulangerie est fermée', 'correct' => ['la', 'boulangerie', 'est', 'fermé'], 'extra' => ['ouvert']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: How Much Cheese', 5,
                pictures: [['en' => 'Cheese', 'img' => 'cheese'], ['en' => 'Eggs', 'img' => 'egg']],
                plain: [['en' => 'Kilo'], ['en' => 'How many']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'kilo', 'of', 'cheese'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un kilo de queso', 'correct' => ['un', 'kilo', 'de', 'queso'], 'extra' => ['cuántos', 'huevos']],
                            'de' => ['sentence' => 'Ein Kilo Käse', 'correct' => ['ein', 'Kilo', 'von', 'Käse'], 'extra' => ['wie viele', 'Eier']],
                            'ja' => ['sentence' => 'チーズ一キロ', 'correct' => ['チーズ', '一', 'キロ'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '치즈 일 킬로', 'correct' => ['치즈', '일', '킬로'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Un kilo de fromage', 'correct' => ['un', 'kilo', 'de', 'fromage'], 'extra' => ['combien']],
                        ],
                    ],
                    'b' => [
                        'words' => ['how many', 'eggs'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cuántos huevos', 'correct' => ['cuántos', 'huevos'], 'extra' => ['kilo', 'queso']],
                            'de' => ['sentence' => 'Wie viele Eier', 'correct' => ['wie viele', 'Eier'], 'extra' => ['Kilo', 'Käse']],
                            'ja' => ['sentence' => '卵はいくつ', 'correct' => ['卵', 'は', 'いくつ'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '계란 몇 개', 'correct' => ['계란', '몇', '개'], 'extra' => ['킬로']],
                            'fr' => ['sentence' => "Combien d'œufs", 'correct' => ['combien', 'œufs'], 'extra' => ['kilo']],
                        ],
                    ],
                    'c' => [
                        'words' => ['some', 'eggs', 'and', 'some', 'cheese'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Unos huevos y algo de queso', 'correct' => ['algo de', 'huevos', 'y', 'algo de', 'queso'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Ein paar Eier und etwas Käse', 'correct' => ['ein paar', 'Eier', 'und', 'etwas', 'Käse'], 'extra' => ['wie viele']],
                            'ja' => ['sentence' => '卵とチーズ', 'correct' => ['卵', 'と', 'チーズ'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '계란과 치즈', 'correct' => ['계란과', '치즈'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Des œufs et du fromage', 'correct' => ['du', 'œufs', 'et', 'du', 'fromage'], 'extra' => ['combien']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
