<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitSupermarket10Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'تفاحة' => 'apple', 'سلة' => 'basket', 'حليب' => 'milk', 'خبز' => 'bread',
        'قهوة' => 'coffee', 'صندوق الدفع' => 'checkout', 'بطاقة' => 'card', 'شاي' => 'tea',
    ];

    /**
     * Arabic Supermarket Unit 10.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: A Whole Shopping Trip', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Going to the Shop', 1,
                pictures: [['ar' => 'تفاحة', 'img' => 'apple'], ['ar' => 'سلة', 'img' => 'basket']],
                plain: [['ar' => 'أذهب'], ['ar' => 'إلى']],
                phrases: [
                    'a' => [
                        'words' => ['أذهب', 'إلى', 'السوبرماركت'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am going to the supermarket', 'correct' => ['I am going', 'to the supermarket'], 'extra' => ['list']],
                            'az' => ['sentence' => 'gedirəm supermarketə', 'correct' => ['gedirəm', 'supermarketə'], 'extra' => ['siyahı']],
                            'fr' => ['sentence' => 'Je vais au supermarché', 'correct' => ['je vais', 'au supermarché'], 'extra' => ['liste']],
                            'es' => ['sentence' => 'Voy al supermercado', 'correct' => ['voy', 'al supermercado'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Ich gehe zum Supermarkt', 'correct' => ['ich gehe', 'zum Supermarkt'], 'extra' => ['Liste']],
                            'ja' => ['sentence' => 'スーパーへ行きます', 'correct' => ['スーパーへ', '行きます'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '슈퍼마켓에 가요', 'correct' => ['슈퍼마켓에', '가요'], 'extra' => ['목록']],
                            'tr' => ['sentence' => 'markete gidiyorum', 'correct' => ['markete', 'gidiyorum'], 'extra' => ['market', 'liste']],
                            'ru' => ['sentence' => 'я иду в супермаркет', 'correct' => ['я', 'иду', 'в', 'супермаркет'], 'extra' => ['список']],
                        ],
                    ],
                    'b' => [
                        'words' => ['يوجد', 'تفاحة', 'في القائمة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is an apple on the list', 'correct' => ['there is', 'an', 'apple', 'on the list'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'var bir alma siyahıda', 'correct' => ['var', 'bir', 'alma', 'siyahıda'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Il y a une pomme sur la liste', 'correct' => ['il y a', 'une', 'pomme', 'sur la liste'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Hay una manzana en la lista', 'correct' => ['hay', 'una', 'manzana', 'en la lista'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Es gibt einen Apfel auf der Liste', 'correct' => ['es gibt', 'einen', 'Apfel', 'auf der Liste'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'リストにりんごがあります', 'correct' => ['リストに', 'りんごが', 'あります'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '목록에 사과가 있어요', 'correct' => ['목록에', '사과가', '있어요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'listede elma var', 'correct' => ['listede', 'elma', 'var'], 'extra' => ['market', 'liste']],
                            'ru' => ['sentence' => 'есть яблоко в списке', 'correct' => ['есть', 'яблоко', 'в', 'списке'], 'extra' => ['молоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أشتري', 'سلة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying a basket', 'correct' => ['I am buying', 'a', 'basket'], 'extra' => ['list']],
                            'az' => ['sentence' => 'alıram bir səbət', 'correct' => ['alıram', 'bir', 'səbət'], 'extra' => ['siyahı']],
                            'fr' => ['sentence' => 'J’achète un panier', 'correct' => ['j’achète', 'un', 'panier'], 'extra' => ['liste']],
                            'es' => ['sentence' => 'Compro una cesta', 'correct' => ['compro', 'una', 'cesta'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Ich kaufe einen Korb', 'correct' => ['ich kaufe', 'einen', 'Korb'], 'extra' => ['Liste']],
                            'ja' => ['sentence' => 'かごを買います', 'correct' => ['かごを', '買います'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '바구니를 삽니다', 'correct' => ['바구니를', '삽니다'], 'extra' => ['목록']],
                            'tr' => ['sentence' => 'bir sepet alıyorum', 'correct' => ['bir', 'sepet', 'alıyorum'], 'extra' => ['market', 'liste']],
                            'ru' => ['sentence' => 'я покупаю корзина', 'correct' => ['я', 'покупаю', 'корзина'], 'extra' => ['список']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Finding Things', 2,
                pictures: [['ar' => 'حليب', 'img' => 'milk'], ['ar' => 'خبز', 'img' => 'bread']],
                plain: [['ar' => 'أين'], ['ar' => 'في القسم']],
                phrases: [
                    'a' => [
                        'words' => ['أين', 'حليب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the milk', 'correct' => ['where', 'is', 'the milk'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'harada süd', 'correct' => ['harada', 'süd'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Où est le lait', 'correct' => ['où', 'est', 'le lait'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Dónde está la leche', 'correct' => ['dónde', 'está', 'la leche'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Wo ist die Milch', 'correct' => ['wo', 'ist', 'die Milch'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳はどこですか', 'correct' => ['牛乳は', 'どこですか'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유는 어디에 있어요', 'correct' => ['우유는', '어디에', '있어요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'süt nerede', 'correct' => ['süt', 'nerede'], 'extra' => ['reyon', 'ekmek']],
                            'ru' => ['sentence' => 'где молоко', 'correct' => ['где', 'молоко'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'b' => [
                        'words' => ['حليب', 'في القسم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The milk is in the aisle', 'correct' => ['the milk', 'is', 'in the aisle'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'süd şöbədə', 'correct' => ['süd', 'şöbədə'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Le lait est au rayon', 'correct' => ['le lait', 'est', 'au rayon'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'La leche está en el pasillo', 'correct' => ['la leche', 'está', 'en el pasillo'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Die Milch ist im Regal', 'correct' => ['die Milch', 'ist', 'im Regal'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳は売り場にあります', 'correct' => ['牛乳は', '売り場に', 'あります'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유는 코너에 있어요', 'correct' => ['우유는', '코너에', '있어요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'süt reyonda', 'correct' => ['süt', 'reyonda'], 'extra' => ['nerede', 'reyon']],
                            'ru' => ['sentence' => 'молоко в отделе', 'correct' => ['молоко', 'в', 'отделе'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أشتري', 'طازج', 'خبز'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying fresh bread', 'correct' => ['I am buying', 'fresh', 'bread'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'alıram təzə çörək', 'correct' => ['alıram', 'təzə', 'çörək'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'J’achète du pain frais', 'correct' => ['j’achète', 'du pain', 'frais'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Compro pan fresco', 'correct' => ['compro', 'pan', 'fresco'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich kaufe frisches Brot', 'correct' => ['ich kaufe', 'frisches', 'Brot'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '新鮮なパンを買います', 'correct' => ['新鮮な', 'パンを', '買います'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '신선한 빵을 삽니다', 'correct' => ['신선한', '빵을', '삽니다'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'taze ekmek alıyorum', 'correct' => ['taze', 'ekmek', 'alıyorum'], 'extra' => ['nerede', 'reyon']],
                            'ru' => ['sentence' => 'я покупаю свежий хлеб', 'correct' => ['я', 'покупаю', 'свежий', 'хлеб'], 'extra' => ['молоко']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Weighing', 3,
                pictures: [['ar' => 'حليب', 'img' => 'milk'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'اثنان'], ['ar' => 'كيلو']],
                phrases: [
                    'a' => [
                        'words' => ['اثنان', 'كيلو', 'تفاح'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Two kilos of apples', 'correct' => ['two', 'kilos', 'of', 'apples'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'iki kilo almalar', 'correct' => ['iki', 'kilo', 'almalar'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Deux kilos de pommes', 'correct' => ['deux', 'kilos', 'de', 'pommes'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Dos kilos de manzanas', 'correct' => ['dos', 'kilos', 'de', 'manzanas'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Zwei Kilo Äpfel', 'correct' => ['zwei', 'Kilo', 'Äpfel'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'りんご二キロ', 'correct' => ['りんご', '二キロ'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '사과 이 킬로', 'correct' => ['사과', '이', '킬로'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'iki kilo elma', 'correct' => ['iki', 'kilo', 'elma'], 'extra' => ['şişe', 'süt']],
                            'ru' => ['sentence' => 'два кило яблоки', 'correct' => ['два', 'кило', 'яблоки'], 'extra' => ['молоко']],
                        ],
                    ],
                    'b' => [
                        'words' => ['زجاجة', 'حليب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A bottle of milk', 'correct' => ['a', 'bottle', 'of', 'milk'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'bir şüşə süd', 'correct' => ['bir', 'şüşə', 'süd'], 'extra' => ['alma']],
                            'fr' => ['sentence' => 'Une bouteille de lait', 'correct' => ['une', 'bouteille', 'de', 'lait'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Una botella de leche', 'correct' => ['una', 'botella', 'de', 'leche'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Eine Flasche Milch', 'correct' => ['eine', 'Flasche', 'Milch'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => '牛乳一本', 'correct' => ['牛乳', '一本'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '우유 한 병', 'correct' => ['우유', '한', '병'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'bir şişe süt', 'correct' => ['bir', 'şişe', 'süt'], 'extra' => ['kilo', 'elma']],
                            'ru' => ['sentence' => 'бутылка молоко', 'correct' => ['бутылка', 'молоко'], 'extra' => ['яблоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['تفاح', 'طازج'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The apples are fresh', 'correct' => ['the apples', 'are', 'fresh'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'almalar təzə', 'correct' => ['almalar', 'təzə'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Les pommes sont fraîches', 'correct' => ['les pommes', 'sont', 'fraîches'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Las manzanas están frescas', 'correct' => ['las manzanas', 'están', 'frescas'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Die Äpfel sind frisch', 'correct' => ['die Äpfel', 'sind', 'frisch'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'りんごは新鮮です', 'correct' => ['りんごは', '新鮮です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '사과는 신선해요', 'correct' => ['사과는', '신선해요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'elmalar taze', 'correct' => ['elmalar', 'taze'], 'extra' => ['kilo', 'şişe']],
                            'ru' => ['sentence' => 'яблоки свежий', 'correct' => ['яблоки', 'свежий'], 'extra' => ['молоко']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Checking the Price', 4,
                pictures: [['ar' => 'تفاحة', 'img' => 'apple'], ['ar' => 'حليب', 'img' => 'milk']],
                plain: [['ar' => 'كم'], ['ar' => 'ريال']],
                phrases: [
                    'a' => [
                        'words' => ['كم', 'ريال', 'تفاحة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the apple', 'correct' => ['how many', 'lira', 'is', 'the apple'], 'extra' => ['total']],
                            'az' => ['sentence' => 'neçə manat alma', 'correct' => ['neçə', 'manat', 'alma'], 'extra' => ['cəmi']],
                            'fr' => ['sentence' => 'Combien de lires est la pomme', 'correct' => ['combien de', 'lires', 'est', 'la pomme'], 'extra' => ['total']],
                            'es' => ['sentence' => 'Cuántas liras es la manzana', 'correct' => ['cuántas', 'liras', 'es', 'la manzana'], 'extra' => ['total']],
                            'de' => ['sentence' => 'Wie viele Lira ist der Apfel', 'correct' => ['wie viele', 'Lira', 'ist', 'der Apfel'], 'extra' => ['Gesamt']],
                            'ja' => ['sentence' => 'りんごは何リラですか', 'correct' => ['りんごは', '何', 'リラですか'], 'extra' => ['合計']],
                            'ko' => ['sentence' => '사과는 몇 리라예요', 'correct' => ['사과는', '몇', '리라예요'], 'extra' => ['합계']],
                            'tr' => ['sentence' => 'elma kaç lira', 'correct' => ['elma', 'kaç', 'lira'], 'extra' => ['fiyat', 'i̇ndirim']],
                            'ru' => ['sentence' => 'сколько рубль яблоко', 'correct' => ['сколько', 'рубль', 'яблоко'], 'extra' => ['итого']],
                        ],
                    ],
                    'b' => [
                        'words' => ['تفاحة', 'بخصم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The apple is on discount', 'correct' => ['the apple', 'is', 'on discount'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'alma endirimdə', 'correct' => ['alma', 'endirimdə'], 'extra' => ['bahalı']],
                            'fr' => ['sentence' => 'La pomme est en réduction', 'correct' => ['la pomme', 'est', 'en réduction'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'La manzana está en descuento', 'correct' => ['la manzana', 'está', 'en descuento'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Apfel ist im Rabatt', 'correct' => ['der Apfel', 'ist', 'im Rabatt'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'りんごは割引です', 'correct' => ['りんごは', '割引です'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '사과는 할인이에요', 'correct' => ['사과는', '할인이에요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'elma indirimde', 'correct' => ['elma', 'indirimde'], 'extra' => ['fiyat', 'i̇ndirim']],
                            'ru' => ['sentence' => 'яблоко со скидкой', 'correct' => ['яблоко', 'со скидкой'], 'extra' => ['дорогой']],
                        ],
                    ],
                    'c' => [
                        'words' => ['حليب', 'أغلى', 'من', 'الماء'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'The milk is more expensive than the water', 'correct' => ['the milk', 'is', 'more expensive', 'than the water'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'süd daha bahalı sudan', 'correct' => ['süd', 'daha bahalı', 'sudan'], 'extra' => ['ucuz']],
                            'fr' => ['sentence' => 'Le lait est plus cher que l’eau', 'correct' => ['le lait', 'est', 'plus cher', 'que l’eau'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'La leche es más cara que el agua', 'correct' => ['la leche', 'es', 'más cara', 'que el agua'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Die Milch ist teurer als das Wasser', 'correct' => ['die Milch', 'ist', 'teurer', 'als das Wasser'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '牛乳は水より高いです', 'correct' => ['牛乳は', '水より', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '우유는 물보다 비싸요', 'correct' => ['우유는', '물보다', '비싸요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'süt sudan pahalı', 'correct' => ['süt', 'sudan', 'pahalı'], 'extra' => ['fiyat', 'i̇ndirim']],
                            'ru' => ['sentence' => 'молоко дороже чем воды', 'correct' => ['молоко', 'дороже', 'чем', 'воды'], 'extra' => ['дешёвый']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Paying and Leaving', 5,
                pictures: [['ar' => 'صندوق الدفع', 'img' => 'checkout'], ['ar' => 'بطاقة', 'img' => 'card']],
                plain: [['ar' => 'أين'], ['ar' => 'أدفع']],
                phrases: [
                    'a' => [
                        'words' => ['أين', 'صندوق الدفع'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the checkout', 'correct' => ['where', 'is', 'the checkout'], 'extra' => ['aisle']],
                            'az' => ['sentence' => 'harada kassa', 'correct' => ['harada', 'kassa'], 'extra' => ['şöbə']],
                            'fr' => ['sentence' => 'Où est la caisse', 'correct' => ['où', 'est', 'la caisse'], 'extra' => ['rayon']],
                            'es' => ['sentence' => 'Dónde está la caja', 'correct' => ['dónde', 'está', 'la caja'], 'extra' => ['pasillo']],
                            'de' => ['sentence' => 'Wo ist die Kasse', 'correct' => ['wo', 'ist', 'die Kasse'], 'extra' => ['Regal']],
                            'ja' => ['sentence' => 'レジはどこですか', 'correct' => ['レジは', 'どこですか'], 'extra' => ['売り場']],
                            'ko' => ['sentence' => '계산대는 어디에 있어요', 'correct' => ['계산대는', '어디에', '있어요'], 'extra' => ['코너']],
                            'tr' => ['sentence' => 'kasa nerede', 'correct' => ['kasa', 'nerede'], 'extra' => ['toplam', 'ekmek']],
                            'ru' => ['sentence' => 'где касса', 'correct' => ['где', 'касса'], 'extra' => ['отдел']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أدفع', 'مع', 'بطاقة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am paying with a card', 'correct' => ['I am paying', 'with', 'a', 'card'], 'extra' => ['cash']],
                            'az' => ['sentence' => 'ödəyirəm ilə bir kart', 'correct' => ['ödəyirəm', 'ilə', 'bir', 'kart'], 'extra' => ['nağd']],
                            'fr' => ['sentence' => 'Je paie avec une carte', 'correct' => ['je paie', 'avec', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Pago con una tarjeta', 'correct' => ['pago', 'con', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Ich zahle mit einer Karte', 'correct' => ['ich zahle', 'mit', 'einer', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードで払います', 'correct' => ['カードで', '払います'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로 계산해요', 'correct' => ['카드로', '계산해요'], 'extra' => ['현금']],
                            'tr' => ['sentence' => 'kart ile ödüyorum', 'correct' => ['kart', 'ile', 'ödüyorum'], 'extra' => ['kasa', 'toplam']],
                            'ru' => ['sentence' => 'я плачу с карта', 'correct' => ['я', 'плачу', 'с', 'карта'], 'extra' => ['наличные']],
                        ],
                    ],
                    'c' => [
                        'words' => ['شكرا', 'و', 'مع السلامة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Thank you and goodbye', 'correct' => ['thank you', 'and', 'goodbye'], 'extra' => ['hello']],
                            'az' => ['sentence' => 'təşəkkür və sağ ol', 'correct' => ['təşəkkür', 'və', 'sağ ol'], 'extra' => ['salam']],
                            'fr' => ['sentence' => 'Merci et au revoir', 'correct' => ['merci', 'et', 'au revoir'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Gracias y adiós', 'correct' => ['gracias', 'y', 'adiós'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Danke und auf Wiedersehen', 'correct' => ['danke', 'und', 'auf Wiedersehen'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'ありがとうさようなら', 'correct' => ['ありがとう', 'さようなら'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '고맙습니다 안녕히 계세요', 'correct' => ['고맙습니다', '안녕히 계세요'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'teşekkürler ve hoşça kal', 'correct' => ['teşekkürler', 've', 'hoşça kal'], 'extra' => ['kasa', 'toplam']],
                            'ru' => ['sentence' => 'спасибо и до свидания', 'correct' => ['спасибо', 'и', 'до свидания'], 'extra' => ['привет']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
