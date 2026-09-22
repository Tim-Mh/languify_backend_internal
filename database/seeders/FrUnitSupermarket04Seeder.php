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
                            'az' => ['sentence' => 'pendir bir təzə məhsul', 'correct' => ['pendir', 'bir', 'təzə', 'məhsul'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'جبن طازج منتج', 'correct' => ['جبن', 'طازج', 'منتج'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'сыр свежий продукт', 'correct' => ['сыр', 'свежий', 'продукт'], 'extra' => ['молоко']],
                            'es' => ['sentence' => 'El queso es un producto fresco', 'correct' => ['el', 'queso', 'es', 'un', 'producto', 'fresco'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Der Käse ist ein frisches Produkt', 'correct' => ['der', 'Käse', 'ist', 'ein', 'Produkt', 'frisch'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'チーズは新鮮な商品です', 'correct' => ['チーズ', 'は', '新鮮な', '商品', 'です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '치즈는 신선한 상품입니다', 'correct' => ['치즈는', '신선한', '상품입니다'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'peynir taze bir ürün', 'correct' => ['peynir', 'taze', 'bir', 'ürün'], 'extra' => ['süt']],
                        ],
                    ],
                    'b' => [
                        'words' => ['du', 'lait', 'frais'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Some fresh milk', 'correct' => ['some', 'fresh', 'milk'], 'extra' => ['product', 'cheese']],
                            'az' => ['sentence' => 'bir az təzə süd', 'correct' => ['bir az', 'təzə', 'süd'], 'extra' => ['məhsul', 'pendir']],
                            'ar' => ['sentence' => 'بعض طازج حليب', 'correct' => ['بعض', 'طازج', 'حليب'], 'extra' => ['منتج', 'جبن']],
                            'ru' => ['sentence' => 'немного свежий молоко', 'correct' => ['немного', 'свежий', 'молоко'], 'extra' => ['продукт', 'сыр']],
                            'es' => ['sentence' => 'Algo de leche fresca', 'correct' => ['algo de', 'fresco', 'leche'], 'extra' => ['producto', 'queso']],
                            'de' => ['sentence' => 'Etwas frische Milch', 'correct' => ['etwas', 'frisch', 'Milch'], 'extra' => ['Produkt', 'Käse']],
                            'ja' => ['sentence' => '新鮮な牛乳', 'correct' => ['新鮮な', '牛乳'], 'extra' => ['商品']],
                            'ko' => ['sentence' => '신선한 우유', 'correct' => ['신선한', '우유'], 'extra' => ['상품']],
                            'tr' => ['sentence' => 'biraz taze süt', 'correct' => ['biraz', 'taze', 'süt'], 'extra' => ['ürün', 'peynir']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'produit', 'avec', 'du', 'lait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A product with milk', 'correct' => ['a', 'product', 'with', 'some', 'milk'], 'extra' => ['fresh', 'cheese']],
                            'az' => ['sentence' => 'bir məhsul ilə bir az süd', 'correct' => ['bir', 'məhsul', 'ilə', 'bir az', 'süd'], 'extra' => ['təzə', 'pendir']],
                            'ar' => ['sentence' => 'منتج مع بعض حليب', 'correct' => ['منتج', 'مع', 'بعض', 'حليب'], 'extra' => ['طازج', 'جبن']],
                            'ru' => ['sentence' => 'продукт с немного молоко', 'correct' => ['продукт', 'с', 'немного', 'молоко'], 'extra' => ['свежий', 'сыр']],
                            'es' => ['sentence' => 'Un producto con leche', 'correct' => ['un', 'producto', 'con', 'algo de', 'leche'], 'extra' => ['fresco', 'queso']],
                            'de' => ['sentence' => 'Ein Produkt mit Milch', 'correct' => ['ein', 'Produkt', 'mit', 'etwas', 'Milch'], 'extra' => ['frisch', 'Käse']],
                            'ja' => ['sentence' => '牛乳入りの商品', 'correct' => ['牛乳', '入り', 'の', '商品'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '우유가 든 상품', 'correct' => ['우유가', '든', '상품'], 'extra' => ['신선한']],
                            'tr' => ['sentence' => 'sütlü bir ürün', 'correct' => ['sütlü', 'bir', 'ürün'], 'extra' => ['taze', 'peynir']],
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
                            'az' => ['sentence' => 'vermək bir az yumurtalar', 'correct' => ['vermək', 'bir az', 'yumurtalar'], 'extra' => ['kərə yağı', 'çörək']],
                            'ar' => ['sentence' => 'الإعطاء بعض بيض', 'correct' => ['الإعطاء', 'بعض', 'بيض'], 'extra' => ['زبدة', 'خبز']],
                            'ru' => ['sentence' => 'дать немного яйца', 'correct' => ['дать', 'немного', 'яйца'], 'extra' => ['масло', 'хлеб']],
                            'es' => ['sentence' => 'Dar unos huevos', 'correct' => ['dar', 'unos', 'huevos'], 'extra' => ['mantequilla', 'pan']],
                            'de' => ['sentence' => 'Eier geben', 'correct' => ['geben', 'einige', 'Eier'], 'extra' => ['Butter', 'Brot']],
                            'ja' => ['sentence' => '卵を与える', 'correct' => ['卵', 'を', '与える'], 'extra' => ['バター']],
                            'ko' => ['sentence' => '계란을 주다', 'correct' => ['계란을', '주다'], 'extra' => ['버터']],
                            'tr' => ['sentence' => 'biraz yumurta vermek', 'correct' => ['biraz', 'yumurta', 'vermek'], 'extra' => ['tereyağı', 'ekmek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['du', 'pain', 'avec', 'du', 'beurre'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Some bread with some butter', 'correct' => ['some', 'bread', 'with', 'some', 'butter'], 'extra' => ['to give', 'eggs']],
                            'az' => ['sentence' => 'bir az çörək ilə bir az kərə yağı', 'correct' => ['bir az', 'çörək', 'ilə', 'bir az', 'kərə yağı'], 'extra' => ['vermək', 'yumurtalar']],
                            'ar' => ['sentence' => 'بعض خبز مع بعض زبدة', 'correct' => ['بعض', 'خبز', 'مع', 'بعض', 'زبدة'], 'extra' => ['الإعطاء', 'بيض']],
                            'ru' => ['sentence' => 'немного хлеб с немного масло', 'correct' => ['немного', 'хлеб', 'с', 'немного', 'масло'], 'extra' => ['дать', 'яйца']],
                            'es' => ['sentence' => 'Algo de pan con mantequilla', 'correct' => ['algo de', 'pan', 'con', 'algo de', 'mantequilla'], 'extra' => ['dar', 'huevos']],
                            'de' => ['sentence' => 'Etwas Brot mit Butter', 'correct' => ['etwas', 'Brot', 'mit', 'etwas', 'Butter'], 'extra' => ['geben', 'Eier']],
                            'ja' => ['sentence' => 'バター付きのパン', 'correct' => ['バター', '付き', 'の', 'パン'], 'extra' => ['与える']],
                            'ko' => ['sentence' => '버터를 바른 빵', 'correct' => ['버터를', '바른', '빵'], 'extra' => ['주다']],
                            'tr' => ['sentence' => 'tereyağlı biraz ekmek', 'correct' => ['tereyağlı', 'biraz', 'ekmek'], 'extra' => ['vermek', 'yumurta']],
                        ],
                    ],
                    'c' => [
                        'words' => ['donner', 'du', 'pain', 'et', 'du', 'beurre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To give some bread and some butter', 'correct' => ['to give', 'some', 'bread', 'and', 'some', 'butter'], 'extra' => ['eggs']],
                            'az' => ['sentence' => 'vermək bir az çörək və bir az kərə yağı', 'correct' => ['vermək', 'bir az', 'çörək', 'və', 'bir az', 'kərə yağı'], 'extra' => ['yumurtalar']],
                            'ar' => ['sentence' => 'الإعطاء بعض خبز و بعض زبدة', 'correct' => ['الإعطاء', 'بعض', 'خبز', 'و', 'بعض', 'زبدة'], 'extra' => ['بيض']],
                            'ru' => ['sentence' => 'дать немного хлеб и немного масло', 'correct' => ['дать', 'немного', 'хлеб', 'и', 'немного', 'масло'], 'extra' => ['яйца']],
                            'es' => ['sentence' => 'Dar pan y mantequilla', 'correct' => ['dar', 'algo de', 'pan', 'y', 'algo de', 'mantequilla'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Brot und Butter geben', 'correct' => ['geben', 'etwas', 'Brot', 'und', 'etwas', 'Butter'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => 'パンとバターを与える', 'correct' => ['パン', 'と', 'バター', 'を', '与える'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '빵과 버터를 주다', 'correct' => ['빵과', '버터를', '주다'], 'extra' => ['계란']],
                            'tr' => ['sentence' => 'biraz ekmek ve biraz tereyağı vermek', 'correct' => ['biraz', 'ekmek', 've', 'biraz', 'tereyağı', 'vermek'], 'extra' => ['yumurta']],
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
                            'az' => ['sentence' => 'çörək dan çörəkxana', 'correct' => ['çörək', 'dan', 'çörəkxana'], 'extra' => ['isti', 'tort']],
                            'ar' => ['sentence' => 'خبز من مخبز', 'correct' => ['خبز', 'من', 'مخبز'], 'extra' => ['ساخن', 'كعكة']],
                            'ru' => ['sentence' => 'хлеб из пекарня', 'correct' => ['хлеб', 'из', 'пекарня'], 'extra' => ['горячий', 'торт']],
                            'es' => ['sentence' => 'El pan de la panadería', 'correct' => ['el', 'pan', 'de', 'la', 'panadería'], 'extra' => ['caliente', 'pastel']],
                            'de' => ['sentence' => 'Das Brot aus der Bäckerei', 'correct' => ['das', 'Brot', 'von', 'der', 'Bäckerei'], 'extra' => ['heiß', 'Kuchen']],
                            'ja' => ['sentence' => 'パン屋のパン', 'correct' => ['パン屋', 'の', 'パン'], 'extra' => ['熱い']],
                            'ko' => ['sentence' => '빵집의 빵', 'correct' => ['빵집의', '빵'], 'extra' => ['뜨거운']],
                            'tr' => ['sentence' => 'fırından ekmek', 'correct' => ['fırından', 'ekmek'], 'extra' => ['sıcak', 'pasta']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'gâteau', 'chaud'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A hot cake', 'correct' => ['a', 'hot', 'cake'], 'extra' => ['bakery', 'bread']],
                            'az' => ['sentence' => 'bir isti tort', 'correct' => ['bir', 'isti', 'tort'], 'extra' => ['çörəkxana', 'çörək']],
                            'ar' => ['sentence' => 'ساخن كعكة', 'correct' => ['ساخن', 'كعكة'], 'extra' => ['مخبز', 'خبز']],
                            'ru' => ['sentence' => 'горячий торт', 'correct' => ['горячий', 'торт'], 'extra' => ['пекарня', 'хлеб']],
                            'es' => ['sentence' => 'Un pastel caliente', 'correct' => ['un', 'pastel', 'caliente'], 'extra' => ['panadería', 'pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen', 'correct' => ['ein', 'heiß', 'Kuchen'], 'extra' => ['Bäckerei', 'Brot']],
                            'ja' => ['sentence' => '熱いケーキ', 'correct' => ['熱い', 'ケーキ'], 'extra' => ['パン屋']],
                            'ko' => ['sentence' => '뜨거운 케이크', 'correct' => ['뜨거운', '케이크'], 'extra' => ['빵집']],
                            'tr' => ['sentence' => 'sıcak bir pasta', 'correct' => ['sıcak', 'bir', 'pasta'], 'extra' => ['fırın', 'ekmek']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'gâteau', 'chaud', 'de', 'la', 'boulangerie'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A hot cake from the bakery', 'correct' => ['a', 'hot', 'cake', 'from', 'the', 'bakery'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'bir isti tort dan çörəkxana', 'correct' => ['bir', 'isti', 'tort', 'dan', 'çörəkxana'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'ساخن كعكة من مخبز', 'correct' => ['ساخن', 'كعكة', 'من', 'مخبز'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'горячий торт из пекарня', 'correct' => ['горячий', 'торт', 'из', 'пекарня'], 'extra' => ['хлеб']],
                            'es' => ['sentence' => 'Un pastel caliente de la panadería', 'correct' => ['un', 'pastel', 'caliente', 'de', 'la', 'panadería'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ein heißer Kuchen aus der Bäckerei', 'correct' => ['ein', 'heiß', 'Kuchen', 'von', 'der', 'Bäckerei'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'パン屋の熱いケーキ', 'correct' => ['パン屋', 'の', '熱い', 'ケーキ'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '빵집의 뜨거운 케이크', 'correct' => ['빵집의', '뜨거운', '케이크'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'fırından sıcak bir pasta', 'correct' => ['fırından', 'sıcak', 'bir', 'pasta'], 'extra' => ['ekmek']],
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
                            'az' => ['sentence' => 'bir şüşə süd', 'correct' => ['bir', 'şüşə', 'süd'], 'extra' => ['açıq', 'bağlı']],
                            'ar' => ['sentence' => 'زجاجة حليب', 'correct' => ['زجاجة', 'حليب'], 'extra' => ['مفتوح', 'مغلق']],
                            'ru' => ['sentence' => 'бутылка молоко', 'correct' => ['бутылка', 'молоко'], 'extra' => ['открыто', 'закрыто']],
                            'es' => ['sentence' => 'Una botella de leche', 'correct' => ['una', 'botella', 'de', 'leche'], 'extra' => ['abierto', 'cerrado']],
                            'de' => ['sentence' => 'Eine Flasche Milch', 'correct' => ['eine', 'Flasche', 'von', 'Milch'], 'extra' => ['offen', 'geschlossen']],
                            'ja' => ['sentence' => '牛乳のボトル', 'correct' => ['牛乳', 'の', 'ボトル'], 'extra' => ['開いた']],
                            'ko' => ['sentence' => '우유 한 병', 'correct' => ['우유', '한', '병'], 'extra' => ['열린']],
                            'tr' => ['sentence' => 'bir şişe süt', 'correct' => ['bir', 'şişe', 'süt'], 'extra' => ['açık', 'kapalı']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'magasin', 'est', 'ouvert'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The shop is open', 'correct' => ['the', 'shop', 'is', 'open'], 'extra' => ['closed', 'bottle']],
                            'az' => ['sentence' => 'mağaza açıq', 'correct' => ['mağaza', 'açıq'], 'extra' => ['bağlı', 'şüşə']],
                            'ar' => ['sentence' => 'متجر مفتوح', 'correct' => ['متجر', 'مفتوح'], 'extra' => ['مغلق', 'زجاجة']],
                            'ru' => ['sentence' => 'магазин открыто', 'correct' => ['магазин', 'открыто'], 'extra' => ['закрыто', 'бутылка']],
                            'es' => ['sentence' => 'La tienda está abierta', 'correct' => ['la', 'tienda', 'está', 'abierto'], 'extra' => ['cerrado', 'botella']],
                            'de' => ['sentence' => 'Das Geschäft ist offen', 'correct' => ['das', 'Geschäft', 'ist', 'offen'], 'extra' => ['geschlossen', 'Flasche']],
                            'ja' => ['sentence' => '店は開いています', 'correct' => ['店', 'は', '開いています'], 'extra' => ['閉じた']],
                            'ko' => ['sentence' => '가게는 열려 있습니다', 'correct' => ['가게는', '열려', '있습니다'], 'extra' => ['닫힌']],
                            'tr' => ['sentence' => 'dükkan açık', 'correct' => ['dükkan', 'açık'], 'extra' => ['kapalı', 'şişe']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'supermarché', 'est', 'fermé'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The supermarket is closed', 'correct' => ['the', 'supermarket', 'is', 'closed'], 'extra' => ['open', 'milk']],
                            'az' => ['sentence' => 'supermarket bağlı', 'correct' => ['supermarket', 'bağlı'], 'extra' => ['açıq', 'süd']],
                            'ar' => ['sentence' => 'سوبرماركت مغلق', 'correct' => ['سوبرماركت', 'مغلق'], 'extra' => ['مفتوح', 'حليب']],
                            'ru' => ['sentence' => 'супермаркет закрыто', 'correct' => ['супермаркет', 'закрыто'], 'extra' => ['открыто', 'молоко']],
                            'es' => ['sentence' => 'El supermercado está cerrado', 'correct' => ['el', 'supermercado', 'está', 'cerrado'], 'extra' => ['abierto', 'leche']],
                            'de' => ['sentence' => 'Der Supermarkt ist geschlossen', 'correct' => ['der', 'Supermarkt', 'ist', 'geschlossen'], 'extra' => ['offen', 'Milch']],
                            'ja' => ['sentence' => 'スーパーは閉じています', 'correct' => ['スーパー', 'は', '閉じています'], 'extra' => ['開いた']],
                            'ko' => ['sentence' => '슈퍼마켓은 닫혔습니다', 'correct' => ['슈퍼마켓은', '닫혔습니다'], 'extra' => ['열린']],
                            'tr' => ['sentence' => 'market kapalı', 'correct' => ['market', 'kapalı'], 'extra' => ['açık', 'süt']],
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
                            'az' => ['sentence' => 'bir kilo pendir', 'correct' => ['bir', 'kilo', 'pendir'], 'extra' => ['neçəyə', 'yumurtalar']],
                            'ar' => ['sentence' => 'كيلو جبن', 'correct' => ['كيلو', 'جبن'], 'extra' => ['كم', 'بيض']],
                            'ru' => ['sentence' => 'кило сыр', 'correct' => ['кило', 'сыр'], 'extra' => ['сколько', 'яйца']],
                            'es' => ['sentence' => 'Un kilo de queso', 'correct' => ['un', 'kilo', 'de', 'queso'], 'extra' => ['cuánto', 'huevos']],
                            'de' => ['sentence' => 'Ein Kilo Käse', 'correct' => ['ein', 'Kilo', 'von', 'Käse'], 'extra' => ['wie viel', 'Eier']],
                            'ja' => ['sentence' => 'チーズ一キロ', 'correct' => ['チーズ', '一', 'キロ'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '치즈 일 킬로', 'correct' => ['치즈', '일', '킬로'], 'extra' => ['계란']],
                            'tr' => ['sentence' => 'bir kilo peynir', 'correct' => ['bir', 'kilo', 'peynir'], 'extra' => ['kaç para', 'yumurta']],
                        ],
                    ],
                    'b' => [
                        'words' => ['des', 'œufs', 'et', 'du', 'fromage'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Some eggs and some cheese', 'correct' => ['some', 'eggs', 'and', 'some', 'cheese'], 'extra' => ['kilo', 'how much']],
                            'az' => ['sentence' => 'bir az yumurtalar və bir az pendir', 'correct' => ['bir az', 'yumurtalar', 'və', 'bir az', 'pendir'], 'extra' => ['kilo', 'neçəyə']],
                            'ar' => ['sentence' => 'بعض بيض و بعض جبن', 'correct' => ['بعض', 'بيض', 'و', 'بعض', 'جبن'], 'extra' => ['كيلو', 'كم']],
                            'ru' => ['sentence' => 'немного яйца и немного сыр', 'correct' => ['немного', 'яйца', 'и', 'немного', 'сыр'], 'extra' => ['кило', 'сколько']],
                            'es' => ['sentence' => 'Unos huevos y queso', 'correct' => ['unos', 'huevos', 'y', 'algo de', 'queso'], 'extra' => ['kilo', 'cuánto']],
                            'de' => ['sentence' => 'Eier und Käse', 'correct' => ['einige', 'Eier', 'und', 'etwas', 'Käse'], 'extra' => ['Kilo', 'wie viel']],
                            'ja' => ['sentence' => '卵とチーズ', 'correct' => ['卵', 'と', 'チーズ'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '계란과 치즈', 'correct' => ['계란과', '치즈'], 'extra' => ['킬로']],
                            'tr' => ['sentence' => 'biraz yumurta ve biraz peynir', 'correct' => ['biraz', 'yumurta', 've', 'biraz', 'peynir'], 'extra' => ['kilo', 'kaç para']],
                        ],
                    ],
                    'c' => [
                        'words' => ['combien', 'coûte', 'le', 'kilo'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'How much does the kilo cost', 'correct' => ['how much', 'costs', 'the', 'kilo'], 'extra' => ['cheese', 'eggs']],
                            'az' => ['sentence' => 'neçəyə qiyməti kilo', 'correct' => ['neçəyə', 'qiyməti', 'kilo'], 'extra' => ['pendir', 'yumurtalar']],
                            'ar' => ['sentence' => 'كم يكلف كيلو', 'correct' => ['كم', 'يكلف', 'كيلو'], 'extra' => ['جبن', 'بيض']],
                            'ru' => ['sentence' => 'сколько стоит кило', 'correct' => ['сколько', 'стоит', 'кило'], 'extra' => ['сыр', 'яйца']],
                            'es' => ['sentence' => 'Cuánto cuesta el kilo', 'correct' => ['cuánto', 'cuesta', 'el', 'kilo'], 'extra' => ['queso', 'huevos']],
                            'de' => ['sentence' => 'Wie viel kostet das Kilo', 'correct' => ['wie viel', 'kostet', 'das', 'Kilo'], 'extra' => ['Käse', 'Eier']],
                            'ja' => ['sentence' => '一キロはいくらですか', 'correct' => ['一', 'キロ', 'は', 'いくら', 'です', 'か'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '일 킬로는 얼마입니까', 'correct' => ['일', '킬로는', '얼마입니까'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'kilosu kaç lira', 'correct' => ['kilosu', 'kaç', 'lira'], 'extra' => ['peynir', 'yumurta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
