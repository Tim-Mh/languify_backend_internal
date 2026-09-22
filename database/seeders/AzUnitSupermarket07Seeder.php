<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitSupermarket07Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Alma' => 'apple', 'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese',
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water', 'Tort' => 'cake',
    ];

    /**
     * Azerbaijani Supermarket Unit 7.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Prices and Offers', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: How Much', 1,
                pictures: [['az' => 'Alma', 'img' => 'apple'], ['az' => 'Süd', 'img' => 'milk']],
                plain: [['az' => 'Neçə'], ['az' => 'Manat']],
                phrases: [
                    'a' => [
                        'words' => ['neçə', 'manat', 'alma'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the apple', 'correct' => ['how many', 'lira', 'is', 'the apple'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Combien de lires est la pomme', 'correct' => ['combien de', 'lires', 'est', 'la pomme'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Cuántas liras es la manzana', 'correct' => ['cuántas', 'liras', 'es', 'la manzana'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Wie viele Lira ist der Apfel', 'correct' => ['wie viele', 'Lira', 'ist', 'der Apfel'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'りんごは何リラですか', 'correct' => ['りんごは', '何', 'リラですか'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '사과는 몇 리라예요', 'correct' => ['사과는', '몇', '리라예요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'elma kaç lira', 'correct' => ['elma', 'kaç', 'lira'], 'extra' => ['fiyat', 'i̇ndirim']],
                            'ru' => ['sentence' => 'сколько рубль яблоко', 'correct' => ['сколько', 'рубль', 'яблоко'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'كم ريال تفاحة', 'correct' => ['كم', 'ريال', 'تفاحة'], 'extra' => ['حليب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['qiymət', 'yaxşı'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The price is good', 'correct' => ['the price', 'is', 'good'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'Le prix est bon', 'correct' => ['le prix', 'est', 'bon'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'El precio es bueno', 'correct' => ['el precio', 'es', 'bueno'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Preis ist gut', 'correct' => ['der Preis', 'ist', 'gut'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => '値段は良いです', 'correct' => ['値段は', '良いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '가격은 좋아요', 'correct' => ['가격은', '좋아요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'fiyat iyi', 'correct' => ['fiyat', 'iyi'], 'extra' => ['i̇ndirim', 'elma']],
                            'ru' => ['sentence' => 'цена хороший', 'correct' => ['цена', 'хороший'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'سعر جيد', 'correct' => ['سعر', 'جيد'], 'extra' => ['غالي']],
                        ],
                    ],
                    'c' => [
                        'words' => ['süd', 'ucuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The milk is cheap', 'correct' => ['the milk', 'is', 'cheap'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'Le lait est bon marché', 'correct' => ['le lait', 'est', 'bon marché'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'La leche es barata', 'correct' => ['la leche', 'es', 'barata'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Die Milch ist billig', 'correct' => ['die Milch', 'ist', 'billig'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => '牛乳は安いです', 'correct' => ['牛乳は', '安いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '우유는 싸요', 'correct' => ['우유는', '싸요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'süt ucuz', 'correct' => ['süt', 'ucuz'], 'extra' => ['fiyat', 'i̇ndirim']],
                            'ru' => ['sentence' => 'молоко дешёвый', 'correct' => ['молоко', 'дешёвый'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'حليب رخيص', 'correct' => ['حليب', 'رخيص'], 'extra' => ['غالي']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: On Offer', 2,
                pictures: [['az' => 'Çörək', 'img' => 'bread'], ['az' => 'Pendir', 'img' => 'cheese']],
                plain: [['az' => 'Endirimdə'], ['az' => 'Var']],
                phrases: [
                    'a' => [
                        'words' => ['çörək', 'endirimdə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bread is on discount', 'correct' => ['the bread', 'is', 'on discount'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'Le pain est en réduction', 'correct' => ['le pain', 'est', 'en réduction'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'El pan está en descuento', 'correct' => ['el pan', 'está', 'en descuento'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Das Brot ist im Rabatt', 'correct' => ['das Brot', 'ist', 'im Rabatt'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'パンは割引です', 'correct' => ['パンは', '割引です'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '빵은 할인이에요', 'correct' => ['빵은', '할인이에요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'ekmek indirimde', 'correct' => ['ekmek', 'indirimde'], 'extra' => ['i̇ndirim', 'fiyat']],
                            'ru' => ['sentence' => 'хлеб со скидкой', 'correct' => ['хлеб', 'со скидкой'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'خبز بخصم', 'correct' => ['خبز', 'بخصم'], 'extra' => ['غالي']],
                        ],
                    ],
                    'b' => [
                        'words' => ['var', 'bir', 'endirim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is a discount', 'correct' => ['there is', 'a', 'discount'], 'extra' => ['price']],
                            'fr' => ['sentence' => 'Il y a une réduction', 'correct' => ['il y a', 'une', 'réduction'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'Hay un descuento', 'correct' => ['hay', 'un', 'descuento'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Es gibt einen Rabatt', 'correct' => ['es gibt', 'einen', 'Rabatt'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '割引があります', 'correct' => ['割引が', 'あります'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '할인이 있어요', 'correct' => ['할인이', '있어요'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'indirim var', 'correct' => ['indirim', 'var'], 'extra' => ['i̇ndirim', 'fiyat']],
                            'ru' => ['sentence' => 'есть скидка', 'correct' => ['есть', 'скидка'], 'extra' => ['цена']],
                            'ar' => ['sentence' => 'يوجد خصم', 'correct' => ['يوجد', 'خصم'], 'extra' => ['سعر']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pendir', 'deyil', 'endirimdə'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is not on discount', 'correct' => ['the cheese', 'is not', 'on discount'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Le fromage n’est pas en réduction', 'correct' => ['le fromage', 'n’est pas', 'en réduction'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'El queso no está en descuento', 'correct' => ['el queso', 'no está', 'en descuento'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Der Käse ist nicht im Rabatt', 'correct' => ['der Käse', 'ist nicht', 'im Rabatt'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'チーズは割引ではありません', 'correct' => ['チーズは', '割引では', 'ありません'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '치즈는 할인이 아니에요', 'correct' => ['치즈는', '할인이', '아니에요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'peynir indirimde değil', 'correct' => ['peynir', 'indirimde', 'değil'], 'extra' => ['i̇ndirim', 'fiyat']],
                            'ru' => ['sentence' => 'сыр не со скидкой', 'correct' => ['сыр', 'не', 'со скидкой'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'جبن ليس بخصم', 'correct' => ['جبن', 'ليس', 'بخصم'], 'extra' => ['خبز']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Cheaper', 3,
                pictures: [['az' => 'Alma', 'img' => 'apple'], ['az' => 'Çörək', 'img' => 'bread']],
                plain: [['az' => 'Daha ucuz'], ['az' => 'Daha bahalı']],
                phrases: [
                    'a' => [
                        'words' => ['alma', 'daha ucuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The apple is cheaper', 'correct' => ['the apple', 'is', 'cheaper'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'La pomme est moins chère', 'correct' => ['la pomme', 'est', 'moins chère'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'La manzana es más barata', 'correct' => ['la manzana', 'es', 'más barata'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Apfel ist billiger', 'correct' => ['der Apfel', 'ist', 'billiger'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'りんごはもっと安いです', 'correct' => ['りんごは', 'もっと', '安いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '사과는 더 싸요', 'correct' => ['사과는', '더', '싸요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'elma daha ucuz', 'correct' => ['elma', 'daha', 'ucuz'], 'extra' => ['pahalı', 'ekmek']],
                            'ru' => ['sentence' => 'яблоко дешевле', 'correct' => ['яблоко', 'дешевле'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'تفاحة أرخص', 'correct' => ['تفاحة', 'أرخص'], 'extra' => ['غالي']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çörək', 'daha bahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bread is more expensive', 'correct' => ['the bread', 'is', 'more expensive'], 'extra' => ['cheap']],
                            'fr' => ['sentence' => 'Le pain est plus cher', 'correct' => ['le pain', 'est', 'plus cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'El pan es más caro', 'correct' => ['el pan', 'es', 'más caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Das Brot ist teurer', 'correct' => ['das Brot', 'ist', 'teurer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => 'パンはもっと高いです', 'correct' => ['パンは', 'もっと', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '빵은 더 비싸요', 'correct' => ['빵은', '더', '비싸요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'ekmek daha pahalı', 'correct' => ['ekmek', 'daha', 'pahalı'], 'extra' => ['ucuz', 'elma']],
                            'ru' => ['sentence' => 'хлеб дороже', 'correct' => ['хлеб', 'дороже'], 'extra' => ['дешёвый']],
                            'ar' => ['sentence' => 'خبز أغلى', 'correct' => ['خبز', 'أغلى'], 'extra' => ['رخيص']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'ən ucuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is The cheapest', 'correct' => ['this is', 'the cheapest'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => "C'est Le moins cher", 'correct' => ["c'est", 'le moins cher'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'Esto es El más barato', 'correct' => ['esto es', 'el más barato'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Das ist Am billigsten', 'correct' => ['das ist', 'am billigsten'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'これは最も安いですです', 'correct' => ['これは', '最も', '安いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '이것은 가장 싸요입니다', 'correct' => ['이것은', '가장', '싸요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'en ucuz', 'correct' => ['en', 'ucuz'], 'extra' => ['pahalı', 'elma']],
                            'ru' => ['sentence' => 'Это самый дешёвый', 'correct' => ['это', 'самый', 'дешёвый'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'هذا الأرخص', 'correct' => ['هذا', 'الأرخص'], 'extra' => ['غالي']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Comparing Two', 4,
                pictures: [['az' => 'Süd', 'img' => 'milk'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Daha bahalı'], ['az' => 'Sudan']],
                phrases: [
                    'a' => [
                        'words' => ['süd', 'daha bahalı', 'sudan'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The milk is more expensive than the water', 'correct' => ['the milk', 'is', 'more expensive', 'than the water'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Le lait est plus cher que l’eau', 'correct' => ['le lait', 'est', 'plus cher', 'que l’eau'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'La leche es más cara que el agua', 'correct' => ['la leche', 'es', 'más cara', 'que el agua'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Die Milch ist teurer als das Wasser', 'correct' => ['die Milch', 'ist', 'teurer', 'als das Wasser'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳は水より高いです', 'correct' => ['牛乳は', '水より', '高いです'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유는 물보다 비싸요', 'correct' => ['우유는', '물보다', '비싸요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'süt sudan pahalı', 'correct' => ['süt', 'sudan', 'pahalı'], 'extra' => ['fiyat', 'i̇ndirim']],
                            'ru' => ['sentence' => 'молоко дороже чем воды', 'correct' => ['молоко', 'дороже', 'чем', 'воды'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'حليب أغلى من الماء', 'correct' => ['حليب', 'أغلى', 'من', 'الماء'], 'extra' => ['خبز']],
                        ],
                    ],
                    'b' => [
                        'words' => ['suyu', 'ən ucuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The water is the cheapest', 'correct' => ['the water', 'is', 'the cheapest'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'L’eau est la moins chère', 'correct' => ['l’eau', 'est', 'la moins chère'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'El agua es la más barata', 'correct' => ['el agua', 'es', 'la más barata'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Das Wasser ist am billigsten', 'correct' => ['das Wasser', 'ist', 'am billigsten'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '水は最も安いです', 'correct' => ['水は', '最も', '安いです'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '물은 가장 싸요', 'correct' => ['물은', '가장', '싸요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'su en ucuz', 'correct' => ['su', 'en', 'ucuz'], 'extra' => ['fiyat', 'i̇ndirim']],
                            'ru' => ['sentence' => 'воду самый дешёвый', 'correct' => ['воду', 'самый', 'дешёвый'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'الماء الأرخص', 'correct' => ['الماء', 'الأرخص'], 'extra' => ['حليب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['qiymət', 'eyni'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The price is the same', 'correct' => ['the price', 'is', 'the same'], 'extra' => ['different']],
                            'fr' => ['sentence' => 'Le prix est le même', 'correct' => ['le prix', 'est', 'le même'], 'extra' => ['différent']],
                            'es' => ['sentence' => 'El precio es el mismo', 'correct' => ['el precio', 'es', 'el mismo'], 'extra' => ['diferente']],
                            'de' => ['sentence' => 'Der Preis ist derselbe', 'correct' => ['der Preis', 'ist', 'derselbe'], 'extra' => ['anders']],
                            'ja' => ['sentence' => '値段は同じです', 'correct' => ['値段は', '同じです'], 'extra' => ['違う']],
                            'ko' => ['sentence' => '가격은 같아요', 'correct' => ['가격은', '같아요'], 'extra' => ['다른']],
                            'tr' => ['sentence' => 'fiyat aynı', 'correct' => ['fiyat', 'aynı'], 'extra' => ['i̇ndirim', 'süt']],
                            'ru' => ['sentence' => 'цена такой же', 'correct' => ['цена', 'такой же'], 'extra' => []],
                            'ar' => ['sentence' => 'سعر نفسه', 'correct' => ['سعر', 'نفسه'], 'extra' => []],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A Good Deal', 5,
                pictures: [['az' => 'Alma', 'img' => 'apple'], ['az' => 'Pendir', 'img' => 'cheese']],
                plain: [['az' => 'Endirimdə'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['alma', 'endirimdə', 'və', 'çox', 'ucuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The apple is on discount and very cheap', 'correct' => ['the apple', 'is', 'on discount', 'and', 'very', 'cheap'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'La pomme est en réduction et très bon marché', 'correct' => ['la pomme', 'est', 'en réduction', 'et', 'très', 'bon marché'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'La manzana está en descuento y muy barata', 'correct' => ['la manzana', 'está', 'en descuento', 'y', 'muy', 'barata'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Apfel ist im Rabatt und sehr billig', 'correct' => ['der Apfel', 'ist', 'im Rabatt', 'und', 'sehr', 'billig'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'りんごは割引でとても安いです', 'correct' => ['りんごは', '割引で', 'とても', '安いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '사과는 할인이고 아주 싸요', 'correct' => ['사과는', '할인이고', '아주', '싸요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'elma indirimde ve çok ucuz', 'correct' => ['elma', 'indirimde', 've', 'çok', 'ucuz'], 'extra' => ['i̇ndirim', 'peynir']],
                            'ru' => ['sentence' => 'яблоко со скидкой и очень дешёвый', 'correct' => ['яблоко', 'со скидкой', 'и', 'очень', 'дешёвый'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'تفاحة بخصم و جدا رخيص', 'correct' => ['تفاحة', 'بخصم', 'و', 'جدا', 'رخيص'], 'extra' => ['غالي']],
                        ],
                    ],
                    'b' => [
                        'words' => ['neçə', 'manat', 'cəmi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the total', 'correct' => ['how many', 'lira', 'is', 'the total'], 'extra' => ['price']],
                            'fr' => ['sentence' => 'Combien de lires est le total', 'correct' => ['combien de', 'lires', 'est', 'le total'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'Cuántas liras es el total', 'correct' => ['cuántas', 'liras', 'es', 'el total'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viele Lira ist der Gesamt', 'correct' => ['wie viele', 'Lira', 'ist', 'der Gesamt'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '合計は何リラですか', 'correct' => ['合計は', '何', 'リラですか'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '합계는 몇 리라예요', 'correct' => ['합계는', '몇', '리라예요'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'toplam kaç lira', 'correct' => ['toplam', 'kaç', 'lira'], 'extra' => ['i̇ndirim', 'ucuz']],
                            'ru' => ['sentence' => 'сколько рубль итого', 'correct' => ['сколько', 'рубль', 'итого'], 'extra' => ['цена']],
                            'ar' => ['sentence' => 'كم ريال المجموع', 'correct' => ['كم', 'ريال', 'المجموع'], 'extra' => ['سعر']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pendir', 'deyil', 'bahalı'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is not expensive', 'correct' => ['the cheese', 'is not', 'expensive'], 'extra' => ['cheap']],
                            'fr' => ['sentence' => 'Le fromage n’est pas cher', 'correct' => ['le fromage', 'n’est pas', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'El queso no es caro', 'correct' => ['el queso', 'no es', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Der Käse ist nicht teuer', 'correct' => ['der Käse', 'ist nicht', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => 'チーズは高くありません', 'correct' => ['チーズは', '高く', 'ありません'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '치즈는 비싸지 않아요', 'correct' => ['치즈는', '비싸지 않아요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'peynir pahalı değil', 'correct' => ['peynir', 'pahalı', 'değil'], 'extra' => ['i̇ndirim', 'ucuz']],
                            'ru' => ['sentence' => 'сыр не дорогой', 'correct' => ['сыр', 'не', 'дорогой'], 'extra' => ['дешёвый']],
                            'ar' => ['sentence' => 'جبن ليس غالي', 'correct' => ['جبن', 'ليس', 'غالي'], 'extra' => ['رخيص']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
