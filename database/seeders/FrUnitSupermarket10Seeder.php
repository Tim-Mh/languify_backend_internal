<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket10Seeder extends Seeder
{
    private const PICTURES = [
        'Liste' => 'list', 'Chariot' => 'cart', 'Sucre' => 'sugar', 'Riz' => 'rice',
        'Lait' => 'milk', 'Pain' => 'bread', 'Pomme' => 'apple', 'Caisse' => 'checkout',
    ];

    /**
     * French Chapter 4, Unit 10 — the whole shop, start to finish.
     *
     * The closing unit of the last content chapter deliberately introduces
     * almost nothing new. It strings together what the learner already has —
     * a list, a trolley, quantities, a till — so the final lesson of the course
     * is a complete shopping trip they can say out loud, which is exactly what
     * the Chapter 5 paragraph then asks them to write.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: A Whole Shopping Trip', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: What I Need Today', 1,
                pictures: [['fr' => 'Liste', 'img' => 'list'], ['fr' => 'Lait', 'img' => 'milk']],
                plain: [['fr' => 'Besoin'], ['fr' => 'Acheter']],
                phrases: [
                    'a' => [
                        'words' => ["j'ai", 'besoin', 'de', 'lait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I need milk', 'correct' => ['I have', 'need', 'of', 'milk'], 'extra' => ['to buy', 'list']],
                            'es' => ['sentence' => 'Necesito leche', 'correct' => ['tengo', 'necesidad', 'de', 'leche'], 'extra' => ['comprar', 'lista']],
                            'de' => ['sentence' => 'Ich brauche Milch', 'correct' => ['ich habe', 'Bedarf', 'von', 'Milch'], 'extra' => ['kaufen', 'Liste']],
                            'ja' => ['sentence' => '牛乳が必要です', 'correct' => ['牛乳', 'が', '必要です'], 'extra' => ['買う']],
                            'ko' => ['sentence' => '우유가 필요합니다', 'correct' => ['우유가', '필요합니다'], 'extra' => ['사다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['acheter', 'avec', 'ma', 'liste'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To buy with my list', 'correct' => ['to buy', 'with', 'my', 'list'], 'extra' => ['need', 'milk']],
                            'es' => ['sentence' => 'Comprar con mi lista', 'correct' => ['comprar', 'con', 'mi', 'lista'], 'extra' => ['necesidad', 'leche']],
                            'de' => ['sentence' => 'Mit meiner Liste kaufen', 'correct' => ['mit', 'meiner', 'Liste', 'kaufen'], 'extra' => ['Bedarf', 'Milch']],
                            'ja' => ['sentence' => '私のリストで買う', 'correct' => ['私の', 'リスト', 'で', '買う'], 'extra' => ['必要']],
                            'ko' => ['sentence' => '제 목록으로 사다', 'correct' => ['제', '목록으로', '사다'], 'extra' => ['필요']],
                        ],
                    ],
                    'c' => [
                        'words' => ["j'ai", 'besoin', 'de', 'ma', 'liste', 'pour', 'acheter'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'I need my list to buy', 'correct' => ['I have', 'need', 'of', 'my', 'list', 'for', 'to buy'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'Necesito mi lista para comprar', 'correct' => ['tengo', 'necesidad', 'de', 'mi', 'lista', 'para', 'comprar'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich brauche meine Liste zum Kaufen', 'correct' => ['ich habe', 'Bedarf', 'von', 'meine', 'Liste', 'für', 'kaufen'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '買うために私のリストが必要です', 'correct' => ['買う', 'ため', 'に', '私の', 'リスト', 'が', '必要です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '사기 위해 제 목록이 필요합니다', 'correct' => ['사기', '위해', '제', '목록이', '필요합니다'], 'extra' => ['우유']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Filling the Trolley', 2,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Riz', 'img' => 'rice']],
                plain: [['fr' => 'Mettre'], ['fr' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['mettre', 'un', 'kilo', 'de', 'riz'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To put a kilo of rice', 'correct' => ['to put', 'a', 'kilo', 'of', 'rice'], 'extra' => ['trolley']],
                            'es' => ['sentence' => 'Poner un kilo de arroz', 'correct' => ['poner', 'un', 'kilo', 'de', 'arroz'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Ein Kilo Reis legen', 'correct' => ['legen', 'ein', 'Kilo', 'von', 'Reis'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => 'ご飯一キロを入れる', 'correct' => ['ご飯', '一', 'キロ', 'を', '入れる'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '밥 일 킬로를 넣다', 'correct' => ['밥', '일', '킬로를', '넣다'], 'extra' => ['카트']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'chariot', 'est', 'plein'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The trolley is full', 'correct' => ['the', 'trolley', 'is', 'full'], 'extra' => ['to put', 'kilo']],
                            'es' => ['sentence' => 'El carrito está lleno', 'correct' => ['el', 'carrito', 'está', 'lleno'], 'extra' => ['poner', 'kilo']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist voll', 'correct' => ['der', 'Einkaufswagen', 'ist', 'voll'], 'extra' => ['legen', 'Kilo']],
                            'ja' => ['sentence' => 'カートはいっぱいです', 'correct' => ['カート', 'は', 'いっぱい', 'です'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '카트는 가득합니다', 'correct' => ['카트는', '가득합니다'], 'extra' => ['넣다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mettre', 'le', 'riz', 'dans', 'le', 'chariot'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To put the rice in the trolley', 'correct' => ['to put', 'the', 'rice', 'in', 'the', 'trolley'], 'extra' => ['kilo']],
                            'es' => ['sentence' => 'Poner el arroz en el carrito', 'correct' => ['poner', 'el', 'arroz', 'en', 'el', 'carrito'], 'extra' => ['kilo']],
                            'de' => ['sentence' => 'Den Reis in den Einkaufswagen legen', 'correct' => ['den', 'Reis', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Kilo']],
                            'ja' => ['sentence' => 'ご飯をカートに入れる', 'correct' => ['ご飯', 'を', 'カート', 'に', '入れる'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '밥을 카트에 넣다', 'correct' => ['밥을', '카트에', '넣다'], 'extra' => ['킬로']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Sugar and Bread', 3,
                pictures: [['fr' => 'Sucre', 'img' => 'sugar'], ['fr' => 'Pain', 'img' => 'bread']],
                plain: [['fr' => 'Boulangerie'], ['fr' => 'Frais']],
                phrases: [
                    'a' => [
                        'words' => ['du', 'pain', 'frais'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Some fresh bread', 'correct' => ['some', 'fresh', 'bread'], 'extra' => ['bakery', 'sugar']],
                            'es' => ['sentence' => 'Algo de pan fresco', 'correct' => ['algo de', 'pan', 'fresco'], 'extra' => ['panadería', 'azúcar']],
                            'de' => ['sentence' => 'Etwas frisches Brot', 'correct' => ['etwas', 'frisch', 'Brot'], 'extra' => ['Bäckerei', 'Zucker']],
                            'ja' => ['sentence' => '新鮮なパン', 'correct' => ['新鮮な', 'パン'], 'extra' => ['パン屋']],
                            'ko' => ['sentence' => '신선한 빵', 'correct' => ['신선한', '빵'], 'extra' => ['빵집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['du', 'sucre', 'de', 'la', 'boulangerie'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Some sugar from the bakery', 'correct' => ['some', 'sugar', 'from', 'the', 'bakery'], 'extra' => ['fresh', 'bread']],
                            'es' => ['sentence' => 'Algo de azúcar de la panadería', 'correct' => ['algo de', 'azúcar', 'de', 'la', 'panadería'], 'extra' => ['fresco', 'pan']],
                            'de' => ['sentence' => 'Etwas Zucker aus der Bäckerei', 'correct' => ['etwas', 'Zucker', 'von', 'der', 'Bäckerei'], 'extra' => ['frisch', 'Brot']],
                            'ja' => ['sentence' => 'パン屋の砂糖', 'correct' => ['パン屋', 'の', '砂糖'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '빵집의 설탕', 'correct' => ['빵집의', '설탕'], 'extra' => ['신선한']],
                        ],
                    ],
                    'c' => [
                        'words' => ['du', 'pain', 'frais', 'de', 'la', 'boulangerie'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'Some fresh bread from the bakery', 'correct' => ['some', 'fresh', 'bread', 'from', 'the', 'bakery'], 'extra' => ['sugar']],
                            'es' => ['sentence' => 'Algo de pan fresco de la panadería', 'correct' => ['algo de', 'pan', 'fresco', 'de', 'la', 'panadería'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Etwas frisches Brot aus der Bäckerei', 'correct' => ['etwas', 'frisch', 'Brot', 'von', 'der', 'Bäckerei'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => 'パン屋の新鮮なパン', 'correct' => ['パン屋', 'の', '新鮮な', 'パン'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '빵집의 신선한 빵', 'correct' => ['빵집의', '신선한', '빵'], 'extra' => ['설탕']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Paying and Leaving', 4,
                pictures: [['fr' => 'Caisse', 'img' => 'checkout'], ['fr' => 'Pomme', 'img' => 'apple']],
                plain: [['fr' => 'Payer'], ['fr' => 'Reçu']],
                phrases: [
                    'a' => [
                        'words' => ['payer', 'à', 'la', 'caisse'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To pay at the checkout', 'correct' => ['to pay', 'at', 'the', 'checkout'], 'extra' => ['receipt', 'apple']],
                            'es' => ['sentence' => 'Pagar en la caja', 'correct' => ['pagar', 'a', 'la', 'caja'], 'extra' => ['recibo', 'manzana']],
                            'de' => ['sentence' => 'An der Kasse bezahlen', 'correct' => ['bezahlen', 'zu', 'der', 'Kasse'], 'extra' => ['Quittung', 'Apfel']],
                            'ja' => ['sentence' => 'レジで払う', 'correct' => ['レジ', 'で', '払う'], 'extra' => ['レシート']],
                            'ko' => ['sentence' => '계산대에서 지불하다', 'correct' => ['계산대에서', '지불하다'], 'extra' => ['영수증']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'reçu', 'pour', 'la', 'pomme'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The receipt for the apple', 'correct' => ['the', 'receipt', 'for', 'the', 'apple'], 'extra' => ['to pay', 'checkout']],
                            'es' => ['sentence' => 'El recibo para la manzana', 'correct' => ['el', 'recibo', 'para', 'la', 'manzana'], 'extra' => ['pagar', 'caja']],
                            'de' => ['sentence' => 'Die Quittung für den Apfel', 'correct' => ['die', 'Quittung', 'für', 'den', 'Apfel'], 'extra' => ['bezahlen', 'Kasse']],
                            'ja' => ['sentence' => 'りんごのレシート', 'correct' => ['りんご', 'の', 'レシート'], 'extra' => ['払う']],
                            'ko' => ['sentence' => '사과의 영수증', 'correct' => ['사과의', '영수증'], 'extra' => ['지불하다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['payer', 'et', 'prendre', 'le', 'reçu'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'To pay and take the receipt', 'correct' => ['to pay', 'and', 'to have', 'the', 'receipt'], 'extra' => ['checkout', 'apple']],
                            'es' => ['sentence' => 'Pagar y tomar el recibo', 'correct' => ['pagar', 'y', 'tomar', 'el', 'recibo'], 'extra' => ['caja', 'manzana']],
                            'de' => ['sentence' => 'Bezahlen und die Quittung nehmen', 'correct' => ['bezahlen', 'und', 'die', 'Quittung', 'nehmen'], 'extra' => ['Kasse', 'Apfel']],
                            'ja' => ['sentence' => '払ってレシートを取る', 'correct' => ['払って', 'レシート', 'を', '取る'], 'extra' => ['レジ']],
                            'ko' => ['sentence' => '지불하고 영수증을 받다', 'correct' => ['지불하고', '영수증을', '받다'], 'extra' => ['계산대']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Going Home', 5,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Lait', 'img' => 'milk']],
                plain: [['fr' => 'Porter'], ['fr' => 'Maison']],
                phrases: [
                    'a' => [
                        'words' => ['porter', 'le', 'lait', 'à', 'la', 'maison'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To carry the milk home', 'correct' => ['to carry', 'the', 'milk', 'at', 'the', 'house'], 'extra' => ['trolley']],
                            'es' => ['sentence' => 'Llevar la leche a la casa', 'correct' => ['llevar', 'la', 'leche', 'a', 'la', 'casa'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Die Milch nach Hause tragen', 'correct' => ['tragen', 'die', 'Milch', 'zu', 'dem', 'Haus'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => '牛乳を家に運ぶ', 'correct' => ['牛乳', 'を', '家', 'に', '運ぶ'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '우유를 집으로 나르다', 'correct' => ['우유를', '집으로', '나르다'], 'extra' => ['카트']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'chariot', 'est', 'à', 'la', 'maison'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'The trolley is at the house', 'correct' => ['the', 'trolley', 'is', 'at', 'the', 'house'], 'extra' => ['to carry', 'milk']],
                            'es' => ['sentence' => 'El carrito está en la casa', 'correct' => ['el', 'carrito', 'está', 'a', 'la', 'casa'], 'extra' => ['llevar', 'leche']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist beim Haus', 'correct' => ['der', 'Einkaufswagen', 'ist', 'zu', 'dem', 'Haus'], 'extra' => ['tragen', 'Milch']],
                            'ja' => ['sentence' => 'カートは家にあります', 'correct' => ['カート', 'は', '家', 'に', 'あります'], 'extra' => ['運ぶ']],
                            'ko' => ['sentence' => '카트는 집에 있습니다', 'correct' => ['카트는', '집에', '있습니다'], 'extra' => ['나르다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['porter', 'le', 'chariot', 'à', 'la', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To carry the trolley home', 'correct' => ['to carry', 'the', 'trolley', 'at', 'the', 'house'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'Llevar el carrito a la casa', 'correct' => ['llevar', 'el', 'carrito', 'a', 'la', 'casa'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Den Einkaufswagen nach Hause tragen', 'correct' => ['tragen', 'den', 'Einkaufswagen', 'zu', 'dem', 'Haus'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'カートを家に運ぶ', 'correct' => ['カート', 'を', '家', 'に', '運ぶ'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '카트를 집으로 나르다', 'correct' => ['카트를', '집으로', '나르다'], 'extra' => ['우유']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
