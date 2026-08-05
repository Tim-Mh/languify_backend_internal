<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket07Seeder extends Seeder
{
    private const PICTURES = [
        'Money' => 'money', 'Aisle' => 'shelf', 'Apple' => 'apple', 'Banana' => 'banana',
        'Cheese' => 'cheese', 'Rice' => 'rice', 'Box' => 'box', 'Trolley' => 'cart',
    ];

    /**
     * English Chapter 4, Unit 7 — comparing prices.
     *
     * Comparison is the grammar Chapter 2 introduced abstractly (more, less,
     * better) and never gave a reason to use. A shelf with two prices on it is
     * that reason.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Prices and Offers', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Comparing Two Prices', 1,
                pictures: [['en' => 'Apple', 'img' => 'apple'], ['en' => 'Banana', 'img' => 'banana']],
                plain: [['en' => 'To compare'], ['en' => 'Price']],
                phrases: [
                    'a' => [
                        'words' => ['to compare', 'the', 'prices'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comparar los precios', 'correct' => ['comparar', 'los', 'precio'], 'extra' => ['manzana', 'plátano']],
                            'de' => ['sentence' => 'Die Preise vergleichen', 'correct' => ['vergleichen', 'die', 'Preis'], 'extra' => ['Apfel', 'Banane']],
                            'ja' => ['sentence' => '値段を比べる', 'correct' => ['値段', 'を', '比べる'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '가격을 비교하다', 'correct' => ['가격을', '비교하다'], 'extra' => ['사과']],
                            'fr' => ['sentence' => 'Comparer les prix', 'correct' => ['comparer', 'les', 'prix'], 'extra' => ['pomme', 'banane']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'price', 'of', 'the', 'apple'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El precio de la manzana', 'correct' => ['el', 'precio', 'de', 'la', 'manzana'], 'extra' => ['comparar']],
                            'de' => ['sentence' => 'Der Preis des Apfels', 'correct' => ['der', 'Preis', 'von', 'dem', 'Apfel'], 'extra' => ['vergleichen']],
                            'ja' => ['sentence' => 'りんごの値段', 'correct' => ['りんご', 'の', '値段'], 'extra' => ['比べる']],
                            'ko' => ['sentence' => '사과의 가격', 'correct' => ['사과의', '가격'], 'extra' => ['비교하다']],
                            'fr' => ['sentence' => 'Le prix de la pomme', 'correct' => ['le', 'prix', 'de', 'la', 'pomme'], 'extra' => ['comparer']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to compare', 'the', 'apple', 'and', 'the', 'banana'], 'blank' => 5,
                        'tr' => [
                            'es' => ['sentence' => 'Comparar la manzana y el plátano', 'correct' => ['comparar', 'la', 'manzana', 'y', 'el', 'plátano'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Den Apfel und die Banane vergleichen', 'correct' => ['den', 'Apfel', 'und', 'die', 'Banane', 'vergleichen'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'りんごとバナナを比べる', 'correct' => ['りんご', 'と', 'バナナ', 'を', '比べる'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '사과와 바나나를 비교하다', 'correct' => ['사과와', '바나나를', '비교하다'], 'extra' => ['가격']],
                            'fr' => ['sentence' => 'Comparer la pomme et la banane', 'correct' => ['comparer', 'la', 'pomme', 'et', 'la', 'banane'], 'extra' => ['prix']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: The Discount', 2,
                pictures: [['en' => 'Aisle', 'img' => 'shelf'], ['en' => 'Cheese', 'img' => 'cheese']],
                plain: [['en' => 'Discount'], ['en' => 'Cheap']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'discount', 'on', 'the', 'cheese'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un descuento en el queso', 'correct' => ['un', 'descuento', 'sobre', 'el', 'queso'], 'extra' => ['barato', 'pasillo']],
                            'de' => ['sentence' => 'Ein Rabatt auf den Käse', 'correct' => ['ein', 'Rabatt', 'auf', 'den', 'Käse'], 'extra' => ['billig', 'Regal']],
                            'ja' => ['sentence' => 'チーズの割引', 'correct' => ['チーズ', 'の', '割引'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '치즈 할인', 'correct' => ['치즈', '할인'], 'extra' => ['싼']],
                            'fr' => ['sentence' => 'Une réduction sur le fromage', 'correct' => ['une', 'réduction', 'sur', 'le', 'fromage'], 'extra' => ['bon marché', 'rayon']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'cheap', 'cheese'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un queso barato', 'correct' => ['un', 'queso', 'barato'], 'extra' => ['descuento', 'pasillo']],
                            'de' => ['sentence' => 'Ein billiger Käse', 'correct' => ['ein', 'billig', 'Käse'], 'extra' => ['Rabatt', 'Regal']],
                            'ja' => ['sentence' => '安いチーズ', 'correct' => ['安い', 'チーズ'], 'extra' => ['割引']],
                            'ko' => ['sentence' => '싼 치즈', 'correct' => ['싼', '치즈'], 'extra' => ['할인']],
                            'fr' => ['sentence' => 'Un fromage bon marché', 'correct' => ['un', 'fromage', 'bon marché'], 'extra' => ['réduction']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'discount', 'in', 'the', 'aisle'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Un descuento en el pasillo', 'correct' => ['un', 'descuento', 'en', 'el', 'pasillo'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Ein Rabatt im Regal', 'correct' => ['ein', 'Rabatt', 'in', 'dem', 'Regal'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '売り場の割引', 'correct' => ['売り場', 'の', '割引'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '진열대의 할인', 'correct' => ['진열대의', '할인'], 'extra' => ['싼']],
                            'fr' => ['sentence' => 'Une réduction dans le rayon', 'correct' => ['une', 'réduction', 'dans', 'le', 'rayon'], 'extra' => ['bon marché']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Cheaper Than That', 3,
                pictures: [['en' => 'Rice', 'img' => 'rice'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'Less'], ['en' => 'Better']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'rice', 'is', 'less', 'expensive'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El arroz es menos caro', 'correct' => ['el', 'arroz', 'es', 'menos', 'caro'], 'extra' => ['mejor']],
                            'de' => ['sentence' => 'Der Reis ist weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'weniger', 'teuer'], 'extra' => ['besser']],
                            'ja' => ['sentence' => 'ご飯は高くないです', 'correct' => ['ご飯', 'は', '高くない', 'です'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '밥은 덜 비쌉니다', 'correct' => ['밥은', '덜', '비쌉니다'], 'extra' => ['더 좋은']],
                            'fr' => ['sentence' => 'Le riz est moins cher', 'correct' => ['le', 'riz', 'est', 'moins', 'cher'], 'extra' => ['meilleur']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'apple', 'is', 'better'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La manzana es mejor', 'correct' => ['la', 'manzana', 'es', 'mejor'], 'extra' => ['menos', 'arroz']],
                            'de' => ['sentence' => 'Der Apfel ist besser', 'correct' => ['der', 'Apfel', 'ist', 'besser'], 'extra' => ['weniger', 'Reis']],
                            'ja' => ['sentence' => 'りんごの方が良いです', 'correct' => ['りんご', 'の', '方', 'が', '良い', 'です'], 'extra' => ['より少ない']],
                            'ko' => ['sentence' => '사과가 더 좋습니다', 'correct' => ['사과가', '더', '좋습니다'], 'extra' => ['덜']],
                            'fr' => ['sentence' => 'La pomme est meilleure', 'correct' => ['la', 'pomme', 'est', 'meilleur'], 'extra' => ['moins']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'rice', 'is', 'better', 'and', 'less', 'expensive'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El arroz es mejor y menos caro', 'correct' => ['el', 'arroz', 'es', 'mejor', 'y', 'menos', 'caro'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Der Reis ist besser und weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'besser', 'und', 'weniger', 'teuer'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ご飯はもっと良くて高くない', 'correct' => ['ご飯', 'は', 'もっと', '良くて', '高くない'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '밥은 더 좋고 덜 비쌉니다', 'correct' => ['밥은', '더', '좋고', '덜', '비쌉니다'], 'extra' => ['사과']],
                            'fr' => ['sentence' => 'Le riz est meilleur et moins cher', 'correct' => ['le', 'riz', 'est', 'meilleur', 'et', 'moins', 'cher'], 'extra' => ['pomme']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Paying With Money', 4,
                pictures: [['en' => 'Money', 'img' => 'money'], ['en' => 'Box', 'img' => 'box']],
                plain: [['en' => 'To pay'], ['en' => 'Enough']],
                phrases: [
                    'a' => [
                        'words' => ['to pay', 'with', 'my', 'money'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Pagar con mi dinero', 'correct' => ['pagar', 'con', 'mi', 'dinero'], 'extra' => ['bastante', 'caja']],
                            'de' => ['sentence' => 'Mit meinem Geld bezahlen', 'correct' => ['bezahlen', 'mit', 'mein', 'Geld'], 'extra' => ['genug', 'Schachtel']],
                            'ja' => ['sentence' => '私のお金で払う', 'correct' => ['私の', 'お金', 'で', '払う'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '제 돈으로 지불하다', 'correct' => ['제', '돈으로', '지불하다'], 'extra' => ['충분히']],
                            'fr' => ['sentence' => 'Payer avec mon argent', 'correct' => ['payer', 'avec', 'mon', 'argent'], 'extra' => ['assez', 'boîte']],
                        ],
                    ],
                    'b' => [
                        'words' => ['enough', 'money'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Bastante dinero', 'correct' => ['bastante', 'dinero'], 'extra' => ['pagar', 'caja']],
                            'de' => ['sentence' => 'Genug Geld', 'correct' => ['genug', 'Geld'], 'extra' => ['bezahlen', 'Schachtel']],
                            'ja' => ['sentence' => '十分なお金', 'correct' => ['十分な', 'お金'], 'extra' => ['払う']],
                            'ko' => ['sentence' => '충분한 돈', 'correct' => ['충분한', '돈'], 'extra' => ['지불하다']],
                            'fr' => ['sentence' => "Assez d'argent", 'correct' => ['assez', 'argent'], 'extra' => ['payer']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to pay', 'the', 'box', 'with', 'money'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Pagar la caja con dinero', 'correct' => ['pagar', 'la', 'caja', 'con', 'dinero'], 'extra' => ['bastante']],
                            'de' => ['sentence' => 'Die Schachtel mit Geld bezahlen', 'correct' => ['die', 'Schachtel', 'mit', 'Geld', 'bezahlen'], 'extra' => ['genug']],
                            'ja' => ['sentence' => 'お金で箱を払う', 'correct' => ['お金', 'で', '箱', 'を', '払う'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '돈으로 상자를 지불하다', 'correct' => ['돈으로', '상자를', '지불하다'], 'extra' => ['충분히']],
                            'fr' => ['sentence' => 'Payer la boîte avec de l\'argent', 'correct' => ['payer', 'la', 'boîte', 'avec', 'argent'], 'extra' => ['assez']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Good Price', 5,
                pictures: [['en' => 'Trolley', 'img' => 'cart'], ['en' => 'Banana', 'img' => 'banana']],
                plain: [['en' => 'Good'], ['en' => 'How many']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'good', 'price'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un buen precio', 'correct' => ['un', 'bueno', 'precio'], 'extra' => ['cuántos', 'carrito']],
                            'de' => ['sentence' => 'Ein guter Preis', 'correct' => ['ein', 'gut', 'Preis'], 'extra' => ['wie viele', 'Einkaufswagen']],
                            'ja' => ['sentence' => '良い値段', 'correct' => ['良い', '値段'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '좋은 가격', 'correct' => ['좋은', '가격'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Un bon prix', 'correct' => ['un', 'bon', 'prix'], 'extra' => ['combien', 'chariot']],
                        ],
                    ],
                    'b' => [
                        'words' => ['how many', 'for', 'the', 'banana'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cuánto por el plátano', 'correct' => ['cuántos', 'para', 'el', 'plátano'], 'extra' => ['bueno', 'carrito']],
                            'de' => ['sentence' => 'Wie viel für die Banane', 'correct' => ['wie viele', 'für', 'die', 'Banane'], 'extra' => ['gut', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'バナナはいくつ', 'correct' => ['バナナ', 'は', 'いくつ'], 'extra' => ['良い']],
                            'ko' => ['sentence' => '바나나는 몇 개', 'correct' => ['바나나는', '몇', '개'], 'extra' => ['좋은']],
                            'fr' => ['sentence' => 'Combien pour la banane', 'correct' => ['combien', 'pour', 'la', 'banane'], 'extra' => ['bon']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'good', 'price', 'for', 'the', 'trolley'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un buen precio por el carrito', 'correct' => ['un', 'bueno', 'precio', 'para', 'el', 'carrito'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Ein guter Preis für den Einkaufswagen', 'correct' => ['ein', 'gut', 'Preis', 'für', 'den', 'Einkaufswagen'], 'extra' => ['wie viele']],
                            'ja' => ['sentence' => 'カートのための良い値段', 'correct' => ['カート', 'の', 'ため', 'の', '良い', '値段'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '카트를 위한 좋은 가격', 'correct' => ['카트를', '위한', '좋은', '가격'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Un bon prix pour le chariot', 'correct' => ['un', 'bon', 'prix', 'pour', 'le', 'chariot'], 'extra' => ['combien']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
