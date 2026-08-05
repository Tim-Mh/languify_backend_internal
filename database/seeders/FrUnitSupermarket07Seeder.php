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
                            'es' => ['sentence' => 'Comparar los precios', 'correct' => ['comparar', 'los', 'precio'], 'extra' => ['manzana', 'plátano']],
                            'de' => ['sentence' => 'Die Preise vergleichen', 'correct' => ['vergleichen', 'die', 'Preis'], 'extra' => ['Apfel', 'Banane']],
                            'ja' => ['sentence' => '値段を比べる', 'correct' => ['値段', 'を', '比べる'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '가격을 비교하다', 'correct' => ['가격을', '비교하다'], 'extra' => ['사과']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'prix', 'de', 'la', 'pomme'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The price of the apple', 'correct' => ['the', 'price', 'of', 'the', 'apple'], 'extra' => ['to compare', 'banana']],
                            'es' => ['sentence' => 'El precio de la manzana', 'correct' => ['el', 'precio', 'de', 'la', 'manzana'], 'extra' => ['comparar', 'plátano']],
                            'de' => ['sentence' => 'Der Preis des Apfels', 'correct' => ['der', 'Preis', 'von', 'der', 'Apfel'], 'extra' => ['vergleichen', 'Banane']],
                            'ja' => ['sentence' => 'りんごの値段', 'correct' => ['りんご', 'の', '値段'], 'extra' => ['比べる']],
                            'ko' => ['sentence' => '사과의 가격', 'correct' => ['사과의', '가격'], 'extra' => ['비교하다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['comparer', 'la', 'pomme', 'et', 'la', 'banane'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'To compare the apple and the banana', 'correct' => ['to compare', 'the', 'apple', 'and', 'the', 'banana'], 'extra' => ['price']],
                            'es' => ['sentence' => 'Comparar la manzana y el plátano', 'correct' => ['comparar', 'la', 'manzana', 'y', 'el', 'plátano'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Den Apfel und die Banane vergleichen', 'correct' => ['den', 'Apfel', 'und', 'die', 'Banane', 'vergleichen'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'りんごとバナナを比べる', 'correct' => ['りんご', 'と', 'バナナ', 'を', '比べる'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '사과와 바나나를 비교하다', 'correct' => ['사과와', '바나나를', '비교하다'], 'extra' => ['가격']],
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
                            'es' => ['sentence' => 'Un descuento sobre el queso', 'correct' => ['un', 'descuento', 'sobre', 'el', 'queso'], 'extra' => ['gratis', 'pasillo']],
                            'de' => ['sentence' => 'Ein Rabatt auf den Käse', 'correct' => ['ein', 'Rabatt', 'auf', 'den', 'Käse'], 'extra' => ['kostenlos', 'Regal']],
                            'ja' => ['sentence' => 'チーズの割引', 'correct' => ['チーズ', 'の', '割引'], 'extra' => ['無料']],
                            'ko' => ['sentence' => '치즈 할인', 'correct' => ['치즈', '할인'], 'extra' => ['무료']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'fromage', 'gratuit'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A free cheese', 'correct' => ['a', 'free', 'cheese'], 'extra' => ['discount', 'aisle']],
                            'es' => ['sentence' => 'Un queso gratis', 'correct' => ['un', 'queso', 'gratis'], 'extra' => ['descuento', 'pasillo']],
                            'de' => ['sentence' => 'Ein kostenloser Käse', 'correct' => ['ein', 'kostenlos', 'Käse'], 'extra' => ['Rabatt', 'Regal']],
                            'ja' => ['sentence' => '無料のチーズ', 'correct' => ['無料', 'の', 'チーズ'], 'extra' => ['割引']],
                            'ko' => ['sentence' => '무료 치즈', 'correct' => ['무료', '치즈'], 'extra' => ['할인']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'réduction', 'dans', 'le', 'rayon'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A discount in the aisle', 'correct' => ['a', 'discount', 'in', 'the', 'aisle'], 'extra' => ['free', 'cheese']],
                            'es' => ['sentence' => 'Un descuento en el pasillo', 'correct' => ['un', 'descuento', 'en', 'el', 'pasillo'], 'extra' => ['gratis', 'queso']],
                            'de' => ['sentence' => 'Ein Rabatt im Regal', 'correct' => ['ein', 'Rabatt', 'in', 'dem', 'Regal'], 'extra' => ['kostenlos', 'Käse']],
                            'ja' => ['sentence' => '売り場の割引', 'correct' => ['売り場', 'の', '割引'], 'extra' => ['無料']],
                            'ko' => ['sentence' => '진열대의 할인', 'correct' => ['진열대의', '할인'], 'extra' => ['무료']],
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
                            'es' => ['sentence' => 'El arroz es menos caro', 'correct' => ['el', 'arroz', 'es', 'menos', 'caro'], 'extra' => ['mejor', 'manzana']],
                            'de' => ['sentence' => 'Der Reis ist weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'weniger', 'teuer'], 'extra' => ['besser', 'Apfel']],
                            'ja' => ['sentence' => 'ご飯は高くないです', 'correct' => ['ご飯', 'は', '高くない', 'です'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '밥은 덜 비쌉니다', 'correct' => ['밥은', '덜', '비쌉니다'], 'extra' => ['더 잘']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'pomme', 'est', 'meilleur'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The apple is better', 'correct' => ['the', 'apple', 'is', 'better'], 'extra' => ['less', 'rice']],
                            'es' => ['sentence' => 'La manzana es mejor', 'correct' => ['la', 'manzana', 'es', 'mejor'], 'extra' => ['menos', 'arroz']],
                            'de' => ['sentence' => 'Der Apfel ist besser', 'correct' => ['der', 'Apfel', 'ist', 'besser'], 'extra' => ['weniger', 'Reis']],
                            'ja' => ['sentence' => 'りんごはもっと良いです', 'correct' => ['りんご', 'は', 'もっと良い', 'です'], 'extra' => ['もっと少ない']],
                            'ko' => ['sentence' => '사과는 더 좋습니다', 'correct' => ['사과는', '더', '좋습니다'], 'extra' => ['더 적게']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'riz', 'est', 'meilleur', 'et', 'moins', 'cher'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'The rice is better and less expensive', 'correct' => ['the', 'rice', 'is', 'better', 'and', 'less', 'expensive'], 'extra' => ['apple']],
                            'es' => ['sentence' => 'El arroz es mejor y menos caro', 'correct' => ['el', 'arroz', 'es', 'mejor', 'y', 'menos', 'caro'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Der Reis ist besser und weniger teuer', 'correct' => ['der', 'Reis', 'ist', 'besser', 'und', 'weniger', 'teuer'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ご飯はもっと良くて高くない', 'correct' => ['ご飯', 'は', 'もっと', '良くて', '高くない'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '밥은 더 좋고 덜 비쌉니다', 'correct' => ['밥은', '더', '좋고', '덜', '비쌉니다'], 'extra' => ['사과']],
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
                            'es' => ['sentence' => 'Pagar con mi dinero', 'correct' => ['pagar', 'con', 'mi', 'dinero'], 'extra' => ['bastante', 'caja']],
                            'de' => ['sentence' => 'Mit meinem Geld bezahlen', 'correct' => ['mit', 'meinem', 'Geld', 'bezahlen'], 'extra' => ['genug', 'Schachtel']],
                            'ja' => ['sentence' => '私のお金で払う', 'correct' => ['私の', 'お金', 'で', '払う'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '제 돈으로 지불하다', 'correct' => ['제', '돈으로', '지불하다'], 'extra' => ['충분히']],
                        ],
                    ],
                    'b' => [
                        'words' => ['assez', "d'argent"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Enough money', 'correct' => ['enough', 'of money'], 'extra' => ['to pay', 'box']],
                            'es' => ['sentence' => 'Bastante dinero', 'correct' => ['bastante', 'de dinero'], 'extra' => ['pagar', 'caja']],
                            'de' => ['sentence' => 'Genug Geld', 'correct' => ['genug', 'Geld'], 'extra' => ['bezahlen', 'Schachtel']],
                            'ja' => ['sentence' => '十分なお金', 'correct' => ['十分な', 'お金'], 'extra' => ['払う']],
                            'ko' => ['sentence' => '충분한 돈', 'correct' => ['충분한', '돈'], 'extra' => ['지불하다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['payer', 'la', 'boîte', 'avec', 'mon', 'argent'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To pay for the box with my money', 'correct' => ['to pay', 'the', 'box', 'with', 'my', 'money'], 'extra' => ['enough']],
                            'es' => ['sentence' => 'Pagar la caja con mi dinero', 'correct' => ['pagar', 'la', 'caja', 'con', 'mi', 'dinero'], 'extra' => ['bastante']],
                            'de' => ['sentence' => 'Die Schachtel mit meinem Geld bezahlen', 'correct' => ['die', 'Schachtel', 'mit', 'meinem', 'Geld', 'bezahlen'], 'extra' => ['genug']],
                            'ja' => ['sentence' => '私のお金で箱を払う', 'correct' => ['私の', 'お金', 'で', '箱', 'を', '払う'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '제 돈으로 상자를 지불하다', 'correct' => ['제', '돈으로', '상자를', '지불하다'], 'extra' => ['충분히']],
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
                            'es' => ['sentence' => 'Un buen precio', 'correct' => ['un', 'bueno', 'precio'], 'extra' => ['cuánto', 'carrito']],
                            'de' => ['sentence' => 'Ein guter Preis', 'correct' => ['ein', 'gut', 'Preis'], 'extra' => ['wie viel', 'Einkaufswagen']],
                            'ja' => ['sentence' => '良い値段', 'correct' => ['良い', '値段'], 'extra' => ['いくら']],
                            'ko' => ['sentence' => '좋은 가격', 'correct' => ['좋은', '가격'], 'extra' => ['얼마']],
                        ],
                    ],
                    'b' => [
                        'words' => ['combien', 'coûte', 'la', 'banane'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'How much does the banana cost', 'correct' => ['how much', 'costs', 'the', 'banana'], 'extra' => ['good', 'trolley']],
                            'es' => ['sentence' => 'Cuánto cuesta el plátano', 'correct' => ['cuánto', 'cuesta', 'el', 'plátano'], 'extra' => ['bueno', 'carrito']],
                            'de' => ['sentence' => 'Wie viel kostet die Banane', 'correct' => ['wie viel', 'kostet', 'die', 'Banane'], 'extra' => ['gut', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'バナナはいくらですか', 'correct' => ['バナナ', 'は', 'いくら', 'です', 'か'], 'extra' => ['良い']],
                            'ko' => ['sentence' => '바나나는 얼마입니까', 'correct' => ['바나나는', '얼마입니까'], 'extra' => ['좋은']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'bon', 'prix', 'pour', 'le', 'chariot'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A good price for the trolley', 'correct' => ['a', 'good', 'price', 'for', 'the', 'trolley'], 'extra' => ['how much']],
                            'es' => ['sentence' => 'Un buen precio para el carrito', 'correct' => ['un', 'bueno', 'precio', 'para', 'el', 'carrito'], 'extra' => ['cuánto']],
                            'de' => ['sentence' => 'Ein guter Preis für den Einkaufswagen', 'correct' => ['ein', 'gut', 'Preis', 'für', 'den', 'Einkaufswagen'], 'extra' => ['wie viel']],
                            'ja' => ['sentence' => 'カートのための良い値段', 'correct' => ['カート', 'の', 'ため', 'の', '良い', '値段'], 'extra' => ['いくら']],
                            'ko' => ['sentence' => '카트를 위한 좋은 가격', 'correct' => ['카트를', '위한', '좋은', '가격'], 'extra' => ['얼마']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
