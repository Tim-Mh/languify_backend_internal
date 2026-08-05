<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket07Seeder extends Seeder
{
    private const PICTURES = ['사과' => 'apple', '바나나' => 'banana', '진열대' => 'shelf', '치즈' => 'cheese', '밥' => 'rice', '돈' => 'money', '상자' => 'box', '카트' => 'cart'];

    /**
     * Korean Supermarket, Unit 7, the Korean twin of the English "Prices and Offers" unit.
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

        $builder->seedUnit($chapter->id, 7, '유닛 7: 가격과 할인', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 사과 · 바나나', 1,
                pictures: [['ko' => '사과', 'img' => 'apple'], ['ko' => '바나나', 'img' => 'banana']],
                plain: [['ko' => '비교하다'], ['ko' => '가격']],
                phrases: [
                    'a' => [
                        'words' => ['가격을', '비교하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to compare the prices', 'correct' => ['to compare', 'the', 'prices'], 'extra' => ['apple']],
                            'es' => ['sentence' => 'Comparar los precios', 'correct' => ['comparar', 'los', 'precio'], 'extra' => ['manzana', 'plátano']],
                            'de' => ['sentence' => 'Die Preise vergleichen', 'correct' => ['vergleichen', 'die', 'Preis'], 'extra' => ['Apfel', 'Banane']],
                            'fr' => ['sentence' => 'Comparer les prix', 'correct' => ['comparer', 'les', 'prix'], 'extra' => ['pomme', 'banane']],
                            'ja' => ['sentence' => '値段を比べる', 'correct' => ['値段', 'を', '比べる'], 'extra' => ['りんご']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과의', '가격'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the price of the apple', 'correct' => ['the', 'price', 'of', 'the', 'apple'], 'extra' => ['to compare']],
                            'es' => ['sentence' => 'El precio de la manzana', 'correct' => ['el', 'precio', 'de', 'la', 'manzana'], 'extra' => ['comparar']],
                            'de' => ['sentence' => 'Der Preis des Apfels', 'correct' => ['der', 'Preis', 'von', 'dem', 'Apfel'], 'extra' => ['vergleichen']],
                            'fr' => ['sentence' => 'Le prix de la pomme', 'correct' => ['le', 'prix', 'de', 'la', 'pomme'], 'extra' => ['comparer']],
                            'ja' => ['sentence' => 'りんごの値段', 'correct' => ['りんご', 'の', '値段'], 'extra' => ['比べる']],
                        ],
                    ],
                    'c' => [
                        'words' => ['사과와', '바나나를', '비교하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to compare the apple and the banana', 'correct' => ['to compare', 'the', 'apple', 'and', 'the', 'banana'], 'extra' => ['price']],
                            'es' => ['sentence' => 'Comparar la manzana y el plátano', 'correct' => ['comparar', 'la', 'manzana', 'y', 'el', 'plátano'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Den Apfel und die Banane vergleichen', 'correct' => ['den', 'Apfel', 'und', 'die', 'Banane', 'vergleichen'], 'extra' => ['Preis']],
                            'fr' => ['sentence' => 'Comparer la pomme et la banane', 'correct' => ['comparer', 'la', 'pomme', 'et', 'la', 'banane'], 'extra' => ['prix']],
                            'ja' => ['sentence' => 'りんごとバナナを比べる', 'correct' => ['りんご', 'と', 'バナナ', 'を', '比べる'], 'extra' => ['値段']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 진열대 · 치즈', 2,
                pictures: [['ko' => '진열대', 'img' => 'shelf'], ['ko' => '치즈', 'img' => 'cheese']],
                plain: [['ko' => '할인'], ['ko' => '싼']],
                phrases: [
                    'a' => [
                        'words' => ['치즈', '할인'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a discount on the cheese', 'correct' => ['a', 'discount', 'on', 'the', 'cheese'], 'extra' => ['cheap']],
                            'es' => ['sentence' => 'Un descuento en el queso', 'correct' => ['un', 'descuento', 'sobre', 'el', 'queso'], 'extra' => ['barato', 'pasillo']],
                            'de' => ['sentence' => 'Ein Rabatt auf den Käse', 'correct' => ['ein', 'Rabatt', 'auf', 'den', 'Käse'], 'extra' => ['billig', 'Regal']],
                            'fr' => ['sentence' => 'Une réduction sur le fromage', 'correct' => ['une', 'réduction', 'sur', 'le', 'fromage'], 'extra' => ['bon marché', 'rayon']],
                            'ja' => ['sentence' => 'チーズの割引', 'correct' => ['チーズ', 'の', '割引'], 'extra' => ['安い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['싼', '치즈'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a cheap cheese', 'correct' => ['a', 'cheap', 'cheese'], 'extra' => ['discount']],
                            'es' => ['sentence' => 'Un queso barato', 'correct' => ['un', 'queso', 'barato'], 'extra' => ['descuento', 'pasillo']],
                            'de' => ['sentence' => 'Ein billiger Käse', 'correct' => ['ein', 'billig', 'Käse'], 'extra' => ['Rabatt', 'Regal']],
                            'fr' => ['sentence' => 'Un fromage bon marché', 'correct' => ['un', 'fromage', 'bon marché'], 'extra' => ['réduction']],
                            'ja' => ['sentence' => '安いチーズ', 'correct' => ['安い', 'チーズ'], 'extra' => ['割引']],
                        ],
                    ],
                    'c' => [
                        'words' => ['진열대의', '할인'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a discount in the aisle', 'correct' => ['a', 'discount', 'in', 'the', 'aisle'], 'extra' => ['cheap']],
                            'es' => ['sentence' => 'Un descuento en el pasillo', 'correct' => ['un', 'descuento', 'en', 'el', 'pasillo'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Ein Rabatt im Regal', 'correct' => ['ein', 'Rabatt', 'in', 'dem', 'Regal'], 'extra' => ['billig']],
                            'fr' => ['sentence' => 'Une réduction dans le rayon', 'correct' => ['une', 'réduction', 'dans', 'le', 'rayon'], 'extra' => ['bon marché']],
                            'ja' => ['sentence' => '売り場の割引', 'correct' => ['売り場', 'の', '割引'], 'extra' => ['安い']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 밥 · 사과', 3,
                pictures: [['ko' => '밥', 'img' => 'rice'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '덜'], ['ko' => '더 좋은']],
                phrases: [
                    'a' => [
                        'words' => ['밥은', '덜', '비쌉니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the rice is less expensive', 'correct' => ['the', 'rice', 'is', 'less', 'expensive'], 'extra' => ['better']],
                            'es' => ['sentence' => 'El arroz es menos caro', 'correct' => ['el', 'arroz', 'es', 'menos', 'caro'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Der Reis ist weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'weniger', 'teuer'], 'extra' => ['besser']],
                            'fr' => ['sentence' => 'Le riz est moins cher', 'correct' => ['le', 'riz', 'est', 'moins', 'cher'], 'extra' => ['meilleur']],
                            'ja' => ['sentence' => 'ご飯は高くないです', 'correct' => ['ご飯', 'は', '高くない', 'です'], 'extra' => ['もっと良い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과가', '더', '좋다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the apple is better', 'correct' => ['the', 'apple', 'is', 'better'], 'extra' => ['less']],
                            'es' => ['sentence' => 'La manzana es mejor', 'correct' => ['la', 'manzana', 'es', 'mejor'], 'extra' => ['menos', 'arroz']],
                            'de' => ['sentence' => 'Der Apfel ist besser', 'correct' => ['der', 'Apfel', 'ist', 'besser'], 'extra' => ['weniger', 'Reis']],
                            'fr' => ['sentence' => 'La pomme est meilleure', 'correct' => ['la', 'pomme', 'est', 'meilleur'], 'extra' => ['moins']],
                            'ja' => ['sentence' => 'りんごの方が良いです', 'correct' => ['りんご', 'の', '方', 'が', '良い', 'です'], 'extra' => ['より少ない']],
                        ],
                    ],
                    'c' => [
                        'words' => ['밥은', '더', '좋고', '덜', '비쌉니다'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'the rice is better and less expensive', 'correct' => ['the', 'rice', 'is', 'better', 'and', 'less', 'expensive'], 'extra' => ['apple']],
                            'es' => ['sentence' => 'El arroz es mejor y menos caro', 'correct' => ['el', 'arroz', 'es', 'mejor', 'y', 'menos', 'caro'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Der Reis ist besser und weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'besser', 'und', 'weniger', 'teuer'], 'extra' => ['Apfel']],
                            'fr' => ['sentence' => 'Le riz est meilleur et moins cher', 'correct' => ['le', 'riz', 'est', 'meilleur', 'et', 'moins', 'cher'], 'extra' => ['pomme']],
                            'ja' => ['sentence' => 'ご飯はもっと良くて高くない', 'correct' => ['ご飯', 'は', 'もっと', '良くて', '高くない'], 'extra' => ['りんご']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 돈 · 상자', 4,
                pictures: [['ko' => '돈', 'img' => 'money'], ['ko' => '상자', 'img' => 'box']],
                plain: [['ko' => '지불하다'], ['ko' => '충분히']],
                phrases: [
                    'a' => [
                        'words' => ['제', '돈으로', '지불하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to pay with my money', 'correct' => ['to pay', 'with', 'my', 'money'], 'extra' => ['enough']],
                            'es' => ['sentence' => 'Pagar con mi dinero', 'correct' => ['pagar', 'con', 'mi', 'dinero'], 'extra' => ['bastante', 'caja']],
                            'de' => ['sentence' => 'Mit meinem Geld bezahlen', 'correct' => ['bezahlen', 'mit', 'mein', 'Geld'], 'extra' => ['genug', 'Schachtel']],
                            'fr' => ['sentence' => 'Payer avec mon argent', 'correct' => ['payer', 'avec', 'mon', 'argent'], 'extra' => ['assez', 'boîte']],
                            'ja' => ['sentence' => '私のお金で払う', 'correct' => ['私の', 'お金', 'で', '払う'], 'extra' => ['十分に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['충분한', '돈'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'enough money', 'correct' => ['enough', 'money'], 'extra' => ['pay']],
                            'es' => ['sentence' => 'Bastante dinero', 'correct' => ['bastante', 'dinero'], 'extra' => ['pagar', 'caja']],
                            'de' => ['sentence' => 'Genug Geld', 'correct' => ['genug', 'Geld'], 'extra' => ['bezahlen', 'Schachtel']],
                            'fr' => ['sentence' => 'Assez d\'argent', 'correct' => ['assez', 'argent'], 'extra' => ['payer']],
                            'ja' => ['sentence' => '十分なお金', 'correct' => ['十分な', 'お金'], 'extra' => ['払う']],
                        ],
                    ],
                    'c' => [
                        'words' => ['돈으로', '상자를', '지불하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to pay the box with money', 'correct' => ['to pay', 'the', 'box', 'with', 'money'], 'extra' => ['enough']],
                            'es' => ['sentence' => 'Pagar la caja con dinero', 'correct' => ['pagar', 'la', 'caja', 'con', 'dinero'], 'extra' => ['bastante']],
                            'de' => ['sentence' => 'Die Schachtel mit Geld bezahlen', 'correct' => ['die', 'Schachtel', 'mit', 'Geld', 'bezahlen'], 'extra' => ['genug']],
                            'fr' => ['sentence' => 'Payer la boîte avec de l\'argent', 'correct' => ['payer', 'la', 'boîte', 'avec', 'argent'], 'extra' => ['assez']],
                            'ja' => ['sentence' => 'お金で箱を払う', 'correct' => ['お金', 'で', '箱', 'を', '払う'], 'extra' => ['十分に']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 카트 · 바나나', 5,
                pictures: [['ko' => '카트', 'img' => 'cart'], ['ko' => '바나나', 'img' => 'banana']],
                plain: [['ko' => '좋은'], ['ko' => '몇 개']],
                phrases: [
                    'a' => [
                        'words' => ['좋은', '가격'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a good price', 'correct' => ['a', 'good', 'price'], 'extra' => ['how many']],
                            'es' => ['sentence' => 'Un buen precio', 'correct' => ['un', 'bueno', 'precio'], 'extra' => ['cuántos', 'carrito']],
                            'de' => ['sentence' => 'Ein guter Preis', 'correct' => ['ein', 'gut', 'Preis'], 'extra' => ['wie viele', 'Einkaufswagen']],
                            'fr' => ['sentence' => 'Un bon prix', 'correct' => ['un', 'bon', 'prix'], 'extra' => ['combien', 'chariot']],
                            'ja' => ['sentence' => '良い値段', 'correct' => ['良い', '値段'], 'extra' => ['いくつ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['바나나는', '얼마입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'how much for the banana', 'correct' => ['how many', 'for', 'the', 'banana'], 'extra' => ['good']],
                            'es' => ['sentence' => 'Cuánto por el plátano', 'correct' => ['cuántos', 'para', 'el', 'plátano'], 'extra' => ['bueno', 'carrito']],
                            'de' => ['sentence' => 'Wie viel für die Banane', 'correct' => ['wie viele', 'für', 'die', 'Banane'], 'extra' => ['gut', 'Einkaufswagen']],
                            'fr' => ['sentence' => 'Combien pour la banane', 'correct' => ['combien', 'pour', 'la', 'banane'], 'extra' => ['bon']],
                            'ja' => ['sentence' => 'バナナはいくつ', 'correct' => ['バナナ', 'は', 'いくつ'], 'extra' => ['良い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['카트를', '위한', '좋은', '가격'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'a good price for the trolley', 'correct' => ['a', 'good', 'price', 'for', 'the', 'trolley'], 'extra' => ['how many']],
                            'es' => ['sentence' => 'Un buen precio por el carrito', 'correct' => ['un', 'bueno', 'precio', 'para', 'el', 'carrito'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Ein guter Preis für den Einkaufswagen', 'correct' => ['ein', 'gut', 'Preis', 'für', 'den', 'Einkaufswagen'], 'extra' => ['wie viele']],
                            'fr' => ['sentence' => 'Un bon prix pour le chariot', 'correct' => ['un', 'bon', 'prix', 'pour', 'le', 'chariot'], 'extra' => ['combien']],
                            'ja' => ['sentence' => 'カートのための良い値段', 'correct' => ['カート', 'の', 'ため', 'の', '良い', '値段'], 'extra' => ['いくつ']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
