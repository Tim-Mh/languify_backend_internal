<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket07Seeder extends Seeder
{
    private const PICTURES = [
        'Argent' => 'money', 'Rayon' => 'shelf', 'Pomme' => 'apple', 'Banane' => 'banana',
        'Fromage' => 'cheese', 'Riz' => 'rice', 'Boîte' => 'box', 'Chariot' => 'cart',
    ];

    /**
     * French Chapter 4, Unit 7 — comparing prices.
     *
     * Comparison is the one grammar idea Chapter 2 introduced abstractly
     * (plus, moins, meilleur) and never gave a reason to use. A shelf with two
     * prices on it is that reason, so this unit is where those words finally
     * get put to work.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Prices and Offers', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Comparing Two Prices', 1,
                pictures: [['fr' => 'Pomme', 'img' => 'apple'], ['fr' => 'Banane', 'img' => 'banana']],
                plain: [['fr' => 'Comparer'], ['fr' => 'Prix']],
                phrases: [
                    'a' => [
                        'words' => ['comparer', 'les', 'prix'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To compare the prices', 'correct' => ['to compare', 'the', 'price'], 'extra' => ['apple', 'banana']],
                            'az' => ['sentence' => 'müqayisə etmək qiymət', 'correct' => ['müqayisə etmək', 'qiymət'], 'extra' => ['alma', 'banan']],
                            'ar' => ['sentence' => 'المقارنة سعر', 'correct' => ['المقارنة', 'سعر'], 'extra' => ['تفاحة', 'موزة']],
                            'ru' => ['sentence' => 'сравнить цена', 'correct' => ['сравнить', 'цена'], 'extra' => ['яблоко', 'банан']],
                            'es' => ['sentence' => 'Comparar los precios', 'correct' => ['comparar', 'los', 'precio'], 'extra' => ['manzana', 'plátano']],
                            'de' => ['sentence' => 'Die Preise vergleichen', 'correct' => ['vergleichen', 'die', 'Preis'], 'extra' => ['Apfel', 'Banane']],
                            'ja' => ['sentence' => '値段を比べる', 'correct' => ['値段', 'を', '比べる'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '가격을 비교하다', 'correct' => ['가격을', '비교하다'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'fiyatları karşılaştırmak', 'correct' => ['fiyatları', 'karşılaştırmak'], 'extra' => ['elma', 'muz']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'prix', 'de', 'la', 'pomme'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The price of the apple', 'correct' => ['the', 'price', 'of', 'the', 'apple'], 'extra' => ['to compare', 'banana']],
                            'az' => ['sentence' => 'qiymət alma', 'correct' => ['qiymət', 'alma'], 'extra' => ['müqayisə etmək', 'banan']],
                            'ar' => ['sentence' => 'سعر تفاحة', 'correct' => ['سعر', 'تفاحة'], 'extra' => ['المقارنة', 'موزة']],
                            'ru' => ['sentence' => 'цена яблоко', 'correct' => ['цена', 'яблоко'], 'extra' => ['сравнить', 'банан']],
                            'es' => ['sentence' => 'El precio de la manzana', 'correct' => ['el', 'precio', 'de', 'la', 'manzana'], 'extra' => ['comparar', 'plátano']],
                            'de' => ['sentence' => 'Der Preis des Apfels', 'correct' => ['der', 'Preis', 'von', 'der', 'Apfel'], 'extra' => ['vergleichen', 'Banane']],
                            'ja' => ['sentence' => 'りんごの値段', 'correct' => ['りんご', 'の', '値段'], 'extra' => ['比べる']],
                            'ko' => ['sentence' => '사과의 가격', 'correct' => ['사과의', '가격'], 'extra' => ['비교하다']],
                            'tr' => ['sentence' => 'elmanın fiyatı', 'correct' => ['elmanın', 'fiyatı'], 'extra' => ['karşılaştırmak', 'muz']],
                        ],
                    ],
                    'c' => [
                        'words' => ['comparer', 'la', 'pomme', 'et', 'la', 'banane'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'To compare the apple and the banana', 'correct' => ['to compare', 'the', 'apple', 'and', 'the', 'banana'], 'extra' => ['price']],
                            'az' => ['sentence' => 'müqayisə etmək alma və banan', 'correct' => ['müqayisə etmək', 'alma', 'və', 'banan'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'المقارنة تفاحة و موزة', 'correct' => ['المقارنة', 'تفاحة', 'و', 'موزة'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'сравнить яблоко и банан', 'correct' => ['сравнить', 'яблоко', 'и', 'банан'], 'extra' => ['цена']],
                            'es' => ['sentence' => 'Comparar la manzana y el plátano', 'correct' => ['comparar', 'la', 'manzana', 'y', 'el', 'plátano'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Den Apfel und die Banane vergleichen', 'correct' => ['den', 'Apfel', 'und', 'die', 'Banane', 'vergleichen'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'りんごとバナナを比べる', 'correct' => ['りんご', 'と', 'バナナ', 'を', '比べる'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '사과와 바나나를 비교하다', 'correct' => ['사과와', '바나나를', '비교하다'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'elmayı ve muzu karşılaştırmak', 'correct' => ['elmayı', 've', 'muzu', 'karşılaştırmak'], 'extra' => ['fiyat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: The Discount', 2,
                pictures: [['fr' => 'Rayon', 'img' => 'shelf'], ['fr' => 'Fromage', 'img' => 'cheese']],
                plain: [['fr' => 'Réduction'], ['fr' => 'Gratuit']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'réduction', 'sur', 'le', 'fromage'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A discount on the cheese', 'correct' => ['a', 'discount', 'on', 'the', 'cheese'], 'extra' => ['free', 'aisle']],
                            'az' => ['sentence' => 'bir endirim üzərində pendir', 'correct' => ['bir', 'endirim', 'üzərində', 'pendir'], 'extra' => ['pulsuz', 'şöbə']],
                            'ar' => ['sentence' => 'خصم على جبن', 'correct' => ['خصم', 'على', 'جبن'], 'extra' => ['مجاني', 'قسم']],
                            'ru' => ['sentence' => 'скидка на сыр', 'correct' => ['скидка', 'на', 'сыр'], 'extra' => ['бесплатно', 'отдел']],
                            'es' => ['sentence' => 'Un descuento sobre el queso', 'correct' => ['un', 'descuento', 'sobre', 'el', 'queso'], 'extra' => ['gratis', 'pasillo']],
                            'de' => ['sentence' => 'Ein Rabatt auf den Käse', 'correct' => ['ein', 'Rabatt', 'auf', 'den', 'Käse'], 'extra' => ['kostenlos', 'Regal']],
                            'ja' => ['sentence' => 'チーズの割引', 'correct' => ['チーズ', 'の', '割引'], 'extra' => ['無料']],
                            'ko' => ['sentence' => '치즈 할인', 'correct' => ['치즈', '할인'], 'extra' => ['무료']],
                            'tr' => ['sentence' => 'peynirde bir indirim', 'correct' => ['peynirde', 'bir', 'indirim'], 'extra' => ['boş', 'reyon']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'fromage', 'gratuit'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A free cheese', 'correct' => ['a', 'free', 'cheese'], 'extra' => ['discount', 'aisle']],
                            'az' => ['sentence' => 'bir pulsuz pendir', 'correct' => ['bir', 'pulsuz', 'pendir'], 'extra' => ['endirim', 'şöbə']],
                            'ar' => ['sentence' => 'مجاني جبن', 'correct' => ['مجاني', 'جبن'], 'extra' => ['خصم', 'قسم']],
                            'ru' => ['sentence' => 'бесплатно сыр', 'correct' => ['бесплатно', 'сыр'], 'extra' => ['скидка', 'отдел']],
                            'es' => ['sentence' => 'Un queso gratis', 'correct' => ['un', 'queso', 'gratis'], 'extra' => ['descuento', 'pasillo']],
                            'de' => ['sentence' => 'Ein kostenloser Käse', 'correct' => ['ein', 'kostenlos', 'Käse'], 'extra' => ['Rabatt', 'Regal']],
                            'ja' => ['sentence' => '無料のチーズ', 'correct' => ['無料', 'の', 'チーズ'], 'extra' => ['割引']],
                            'ko' => ['sentence' => '무료 치즈', 'correct' => ['무료', '치즈'], 'extra' => ['할인']],
                            'tr' => ['sentence' => 'ücretsiz bir peynir', 'correct' => ['ücretsiz', 'bir', 'peynir'], 'extra' => ['indirim', 'reyon']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'réduction', 'dans', 'le', 'rayon'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A discount in the aisle', 'correct' => ['a', 'discount', 'in', 'the', 'aisle'], 'extra' => ['free', 'cheese']],
                            'az' => ['sentence' => 'bir endirim içində şöbə', 'correct' => ['bir', 'endirim', 'içində', 'şöbə'], 'extra' => ['pulsuz', 'pendir']],
                            'ar' => ['sentence' => 'خصم في قسم', 'correct' => ['خصم', 'في', 'قسم'], 'extra' => ['مجاني', 'جبن']],
                            'ru' => ['sentence' => 'скидка в отдел', 'correct' => ['скидка', 'в', 'отдел'], 'extra' => ['бесплатно', 'сыр']],
                            'es' => ['sentence' => 'Un descuento en el pasillo', 'correct' => ['un', 'descuento', 'en', 'el', 'pasillo'], 'extra' => ['gratis', 'queso']],
                            'de' => ['sentence' => 'Ein Rabatt im Regal', 'correct' => ['ein', 'Rabatt', 'in', 'dem', 'Regal'], 'extra' => ['kostenlos', 'Käse']],
                            'ja' => ['sentence' => '売り場の割引', 'correct' => ['売り場', 'の', '割引'], 'extra' => ['無料']],
                            'ko' => ['sentence' => '진열대의 할인', 'correct' => ['진열대의', '할인'], 'extra' => ['무료']],
                            'tr' => ['sentence' => 'reyonda bir indirim', 'correct' => ['reyonda', 'bir', 'indirim'], 'extra' => ['boş', 'peynir']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Cheaper Than That', 3,
                pictures: [['fr' => 'Riz', 'img' => 'rice'], ['fr' => 'Pomme', 'img' => 'apple']],
                plain: [['fr' => 'Moins'], ['fr' => 'Meilleur']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'riz', 'est', 'moins', 'cher'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The rice is less expensive', 'correct' => ['the', 'rice', 'is', 'less', 'expensive'], 'extra' => ['better', 'apple']],
                            'az' => ['sentence' => 'düyü daha az bahalı', 'correct' => ['düyü', 'daha az', 'bahalı'], 'extra' => ['daha yaxşı', 'alma']],
                            'ar' => ['sentence' => 'أرز أقل غالي', 'correct' => ['أرز', 'أقل', 'غالي'], 'extra' => ['أحسن', 'تفاحة']],
                            'ru' => ['sentence' => 'рис меньше дорогой', 'correct' => ['рис', 'меньше', 'дорогой'], 'extra' => ['лучше', 'яблоко']],
                            'es' => ['sentence' => 'El arroz es menos caro', 'correct' => ['el', 'arroz', 'es', 'menos', 'caro'], 'extra' => ['mejor', 'manzana']],
                            'de' => ['sentence' => 'Der Reis ist weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'weniger', 'teuer'], 'extra' => ['besser', 'Apfel']],
                            'ja' => ['sentence' => 'ご飯は高くないです', 'correct' => ['ご飯', 'は', '高くない', 'です'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '밥은 덜 비쌉니다', 'correct' => ['밥은', '덜', '비쌉니다'], 'extra' => ['더 잘']],
                            'tr' => ['sentence' => 'pirinç daha ucuz', 'correct' => ['pirinç', 'daha', 'ucuz'], 'extra' => ['daha iyi', 'elma']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'pomme', 'est', 'meilleur'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The apple is better', 'correct' => ['the', 'apple', 'is', 'better'], 'extra' => ['less', 'rice']],
                            'az' => ['sentence' => 'alma daha yaxşı', 'correct' => ['alma', 'daha yaxşı'], 'extra' => ['daha az', 'düyü']],
                            'ar' => ['sentence' => 'تفاحة أحسن', 'correct' => ['تفاحة', 'أحسن'], 'extra' => ['أقل', 'أرز']],
                            'ru' => ['sentence' => 'яблоко лучше', 'correct' => ['яблоко', 'лучше'], 'extra' => ['меньше', 'рис']],
                            'es' => ['sentence' => 'La manzana es mejor', 'correct' => ['la', 'manzana', 'es', 'mejor'], 'extra' => ['menos', 'arroz']],
                            'de' => ['sentence' => 'Der Apfel ist besser', 'correct' => ['der', 'Apfel', 'ist', 'besser'], 'extra' => ['weniger', 'Reis']],
                            'ja' => ['sentence' => 'りんごはもっと良いです', 'correct' => ['りんご', 'は', 'もっと良い', 'です'], 'extra' => ['もっと少ない']],
                            'ko' => ['sentence' => '사과는 더 좋습니다', 'correct' => ['사과는', '더', '좋습니다'], 'extra' => ['더 적게']],
                            'tr' => ['sentence' => 'elma daha iyi', 'correct' => ['elma', 'daha', 'iyi'], 'extra' => ['daha az', 'pirinç']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'riz', 'est', 'meilleur', 'et', 'moins', 'cher'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'The rice is better and less expensive', 'correct' => ['the', 'rice', 'is', 'better', 'and', 'less', 'expensive'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'düyü daha yaxşı və daha az bahalı', 'correct' => ['düyü', 'daha yaxşı', 'və', 'daha az', 'bahalı'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'أرز أحسن و أقل غالي', 'correct' => ['أرز', 'أحسن', 'و', 'أقل', 'غالي'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'рис лучше и меньше дорогой', 'correct' => ['рис', 'лучше', 'и', 'меньше', 'дорогой'], 'extra' => ['яблоко']],
                            'es' => ['sentence' => 'El arroz es mejor y menos caro', 'correct' => ['el', 'arroz', 'es', 'mejor', 'y', 'menos', 'caro'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Der Reis ist besser und weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'besser', 'und', 'weniger', 'teuer'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ご飯はもっと良くて高くない', 'correct' => ['ご飯', 'は', 'もっと', '良くて', '高くない'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '밥은 더 좋고 덜 비쌉니다', 'correct' => ['밥은', '더', '좋고', '덜', '비쌉니다'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'pirinç daha iyi ve daha ucuz', 'correct' => ['pirinç', 'daha', 'iyi', 've', 'daha', 'ucuz'], 'extra' => ['elma']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Paying With Money', 4,
                pictures: [['fr' => 'Argent', 'img' => 'money'], ['fr' => 'Boîte', 'img' => 'box']],
                plain: [['fr' => 'Payer'], ['fr' => 'Assez']],
                phrases: [
                    'a' => [
                        'words' => ['payer', 'avec', 'mon', 'argent'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To pay with my money', 'correct' => ['to pay', 'with', 'my', 'money'], 'extra' => ['enough', 'box']],
                            'az' => ['sentence' => 'ödəmək ilə mənim pul', 'correct' => ['ödəmək', 'ilə', 'mənim', 'pul'], 'extra' => ['kifayət', 'qutu']],
                            'ar' => ['sentence' => 'الدفع مع نقود', 'correct' => ['الدفع', 'مع', 'نقود'], 'extra' => ['كفى', 'علبة']],
                            'ru' => ['sentence' => 'платить с мой деньги', 'correct' => ['платить', 'с', 'мой', 'деньги'], 'extra' => ['достаточно', 'коробка']],
                            'es' => ['sentence' => 'Pagar con mi dinero', 'correct' => ['pagar', 'con', 'mi', 'dinero'], 'extra' => ['bastante', 'caja']],
                            'de' => ['sentence' => 'Mit meinem Geld bezahlen', 'correct' => ['mit', 'meinem', 'Geld', 'bezahlen'], 'extra' => ['genug', 'Schachtel']],
                            'ja' => ['sentence' => '私のお金で払う', 'correct' => ['私の', 'お金', 'で', '払う'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '제 돈으로 지불하다', 'correct' => ['제', '돈으로', '지불하다'], 'extra' => ['충분히']],
                            'tr' => ['sentence' => 'paramla ödemek', 'correct' => ['paramla', 'ödemek'], 'extra' => ['yeterli', 'kutu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['assez', "d'argent"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Enough money', 'correct' => ['enough', 'of money'], 'extra' => ['to pay', 'box']],
                            'az' => ['sentence' => 'kifayət pul', 'correct' => ['kifayət', 'pul'], 'extra' => ['ödəmək', 'qutu']],
                            'ar' => ['sentence' => 'كفى نقود', 'correct' => ['كفى', 'نقود'], 'extra' => ['الدفع', 'علبة']],
                            'ru' => ['sentence' => 'достаточно деньги', 'correct' => ['достаточно', 'деньги'], 'extra' => ['платить', 'коробка']],
                            'es' => ['sentence' => 'Bastante dinero', 'correct' => ['bastante', 'de dinero'], 'extra' => ['pagar', 'caja']],
                            'de' => ['sentence' => 'Genug Geld', 'correct' => ['genug', 'Geld'], 'extra' => ['bezahlen', 'Schachtel']],
                            'ja' => ['sentence' => '十分なお金', 'correct' => ['十分な', 'お金'], 'extra' => ['払う']],
                            'ko' => ['sentence' => '충분한 돈', 'correct' => ['충분한', '돈'], 'extra' => ['지불하다']],
                            'tr' => ['sentence' => 'yeterli para', 'correct' => ['yeterli', 'para'], 'extra' => ['ödemek', 'kutu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['payer', 'la', 'boîte', 'avec', 'mon', 'argent'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To pay for the box with my money', 'correct' => ['to pay', 'the', 'box', 'with', 'my', 'money'], 'extra' => ['enough']],
                            'az' => ['sentence' => 'ödəmək qutu ilə mənim pul', 'correct' => ['ödəmək', 'qutu', 'ilə', 'mənim', 'pul'], 'extra' => ['kifayət']],
                            'ar' => ['sentence' => 'الدفع علبة مع نقود', 'correct' => ['الدفع', 'علبة', 'مع', 'نقود'], 'extra' => ['كفى']],
                            'ru' => ['sentence' => 'платить коробка с мой деньги', 'correct' => ['платить', 'коробка', 'с', 'мой', 'деньги'], 'extra' => ['достаточно']],
                            'es' => ['sentence' => 'Pagar la caja con mi dinero', 'correct' => ['pagar', 'la', 'caja', 'con', 'mi', 'dinero'], 'extra' => ['bastante']],
                            'de' => ['sentence' => 'Die Schachtel mit meinem Geld bezahlen', 'correct' => ['die', 'Schachtel', 'mit', 'meinem', 'Geld', 'bezahlen'], 'extra' => ['genug']],
                            'ja' => ['sentence' => '私のお金で箱を払う', 'correct' => ['私の', 'お金', 'で', '箱', 'を', '払う'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '제 돈으로 상자를 지불하다', 'correct' => ['제', '돈으로', '상자를', '지불하다'], 'extra' => ['충분히']],
                            'tr' => ['sentence' => 'kutuyu paramla ödemek', 'correct' => ['kutuyu', 'paramla', 'ödemek'], 'extra' => ['yeterli']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Good Price', 5,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Banane', 'img' => 'banana']],
                plain: [['fr' => 'Bon'], ['fr' => 'Combien']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'bon', 'prix'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A good price', 'correct' => ['a', 'good', 'price'], 'extra' => ['how much', 'trolley']],
                            'az' => ['sentence' => 'bir yaxşı qiymət', 'correct' => ['bir', 'yaxşı', 'qiymət'], 'extra' => ['neçəyə', 'araba']],
                            'ar' => ['sentence' => 'جيد سعر', 'correct' => ['جيد', 'سعر'], 'extra' => ['كم', 'عربة']],
                            'ru' => ['sentence' => 'хороший цена', 'correct' => ['хороший', 'цена'], 'extra' => ['сколько', 'тележка']],
                            'es' => ['sentence' => 'Un buen precio', 'correct' => ['un', 'bueno', 'precio'], 'extra' => ['cuánto', 'carrito']],
                            'de' => ['sentence' => 'Ein guter Preis', 'correct' => ['ein', 'gut', 'Preis'], 'extra' => ['wie viel', 'Einkaufswagen']],
                            'ja' => ['sentence' => '良い値段', 'correct' => ['良い', '値段'], 'extra' => ['いくら']],
                            'ko' => ['sentence' => '좋은 가격', 'correct' => ['좋은', '가격'], 'extra' => ['얼마']],
                            'tr' => ['sentence' => 'iyi bir fiyat', 'correct' => ['iyi', 'bir', 'fiyat'], 'extra' => ['kaç para', 'araba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['combien', 'coûte', 'la', 'banane'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'How much does the banana cost', 'correct' => ['how much', 'costs', 'the', 'banana'], 'extra' => ['good', 'trolley']],
                            'az' => ['sentence' => 'neçəyə qiyməti banan', 'correct' => ['neçəyə', 'qiyməti', 'banan'], 'extra' => ['yaxşı', 'araba']],
                            'ar' => ['sentence' => 'كم يكلف موزة', 'correct' => ['كم', 'يكلف', 'موزة'], 'extra' => ['جيد', 'عربة']],
                            'ru' => ['sentence' => 'сколько стоит банан', 'correct' => ['сколько', 'стоит', 'банан'], 'extra' => ['хороший', 'тележка']],
                            'es' => ['sentence' => 'Cuánto cuesta el plátano', 'correct' => ['cuánto', 'cuesta', 'el', 'plátano'], 'extra' => ['bueno', 'carrito']],
                            'de' => ['sentence' => 'Wie viel kostet die Banane', 'correct' => ['wie viel', 'kostet', 'die', 'Banane'], 'extra' => ['gut', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'バナナはいくらですか', 'correct' => ['バナナ', 'は', 'いくら', 'です', 'か'], 'extra' => ['良い']],
                            'ko' => ['sentence' => '바나나는 얼마입니까', 'correct' => ['바나나는', '얼마입니까'], 'extra' => ['좋은']],
                            'tr' => ['sentence' => 'muz kaç lira', 'correct' => ['muz', 'kaç', 'lira'], 'extra' => ['iyi', 'araba']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'bon', 'prix', 'pour', 'le', 'chariot'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A good price for the trolley', 'correct' => ['a', 'good', 'price', 'for', 'the', 'trolley'], 'extra' => ['how much']],
                            'az' => ['sentence' => 'bir yaxşı qiymət üçün araba', 'correct' => ['bir', 'yaxşı', 'qiymət', 'üçün', 'araba'], 'extra' => ['neçəyə']],
                            'ar' => ['sentence' => 'جيد سعر لأجل عربة', 'correct' => ['جيد', 'سعر', 'لأجل', 'عربة'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'хороший цена для тележка', 'correct' => ['хороший', 'цена', 'для', 'тележка'], 'extra' => ['сколько']],
                            'es' => ['sentence' => 'Un buen precio para el carrito', 'correct' => ['un', 'bueno', 'precio', 'para', 'el', 'carrito'], 'extra' => ['cuánto']],
                            'de' => ['sentence' => 'Ein guter Preis für den Einkaufswagen', 'correct' => ['ein', 'gut', 'Preis', 'für', 'den', 'Einkaufswagen'], 'extra' => ['wie viel']],
                            'ja' => ['sentence' => 'カートのための良い値段', 'correct' => ['カート', 'の', 'ため', 'の', '良い', '値段'], 'extra' => ['いくら']],
                            'ko' => ['sentence' => '카트를 위한 좋은 가격', 'correct' => ['카트를', '위한', '좋은', '가격'], 'extra' => ['얼마']],
                            'tr' => ['sentence' => 'araba için iyi bir fiyat', 'correct' => ['araba', 'için', 'iyi', 'bir', 'fiyat'], 'extra' => ['kaç para']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
