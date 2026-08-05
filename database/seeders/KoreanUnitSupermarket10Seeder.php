<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket10Seeder extends Seeder
{
    private const PICTURES = ['목록' => 'list', '우유' => 'milk', '카트' => 'cart', '밥' => 'rice', '설탕' => 'sugar', '빵' => 'bread', '계산대' => 'checkout', '사과' => 'apple'];

    /**
     * Korean Supermarket, Unit 10, the Korean twin of the English "A Whole Shopping Trip" unit.
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

        $builder->seedUnit($chapter->id, 10, '유닛 10: 장보기 전체', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 목록 · 우유', 1,
                pictures: [['ko' => '목록', 'img' => 'list'], ['ko' => '우유', 'img' => 'milk']],
                plain: [['ko' => '필요합니다'], ['ko' => '사다']],
                phrases: [
                    'a' => [
                        'words' => ['우유가', '필요합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I need milk', 'correct' => ['I need', 'milk'], 'extra' => ['to buy']],
                            'es' => ['sentence' => 'Necesito leche', 'correct' => ['necesito', 'leche'], 'extra' => ['comprar', 'lista']],
                            'de' => ['sentence' => 'Ich brauche Milch', 'correct' => ['ich brauche', 'Milch'], 'extra' => ['kaufen', 'Liste']],
                            'fr' => ['sentence' => 'J\'ai besoin de lait', 'correct' => ['j\'ai besoin', 'lait'], 'extra' => ['acheter', 'liste']],
                            'ja' => ['sentence' => '牛乳が必要です', 'correct' => ['牛乳', 'が', '必要です'], 'extra' => ['買う']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '목록으로', '사세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'buy with my list', 'correct' => ['buy', 'with', 'my', 'list'], 'extra' => ['I need']],
                            'es' => ['sentence' => 'Comprar con mi lista', 'correct' => ['comprar', 'con', 'mi', 'lista'], 'extra' => ['necesito', 'leche']],
                            'de' => ['sentence' => 'Mit meiner Liste kaufen', 'correct' => ['kaufen', 'mit', 'meine', 'Liste'], 'extra' => ['ich brauche', 'Milch']],
                            'fr' => ['sentence' => 'Acheter avec ma liste', 'correct' => ['acheter', 'avec', 'ma', 'liste'], 'extra' => ['j\'ai besoin']],
                            'ja' => ['sentence' => '私のリストで買う', 'correct' => ['私の', 'リスト', 'で', '買う'], 'extra' => ['必要です']],
                        ],
                    ],
                    'c' => [
                        'words' => ['사기', '위해', '제', '목록이', '필요합니다'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'I need my list to buy', 'correct' => ['I need', 'my', 'list', 'to', 'buy'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'Necesito mi lista para comprar', 'correct' => ['necesito', 'mi', 'lista', 'para', 'comprar'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich brauche meine Liste zum Kaufen', 'correct' => ['ich brauche', 'meine', 'Liste', 'zu', 'kaufen'], 'extra' => ['Milch']],
                            'fr' => ['sentence' => 'J\'ai besoin de ma liste pour acheter', 'correct' => ['j\'ai besoin', 'ma', 'liste', 'à', 'acheter'], 'extra' => ['lait']],
                            'ja' => ['sentence' => '買うために私のリストが必要です', 'correct' => ['買う', 'ため', 'に', '私の', 'リスト', 'が', '必要です'], 'extra' => ['牛乳']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 카트 · 밥', 2,
                pictures: [['ko' => '카트', 'img' => 'cart'], ['ko' => '밥', 'img' => 'rice']],
                plain: [['ko' => '넣다'], ['ko' => '킬로']],
                phrases: [
                    'a' => [
                        'words' => ['밥', '일', '킬로를', '넣으세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'to put a kilo of rice', 'correct' => ['to put', 'a', 'kilo', 'of', 'rice'], 'extra' => ['trolley']],
                            'es' => ['sentence' => 'Poner un kilo de arroz', 'correct' => ['poner', 'un', 'kilo', 'de', 'arroz'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Ein Kilo Reis legen', 'correct' => ['legen', 'ein', 'Kilo', 'von', 'Reis'], 'extra' => ['Einkaufswagen']],
                            'fr' => ['sentence' => 'Mettre un kilo de riz', 'correct' => ['mettre', 'un', 'kilo', 'de', 'riz'], 'extra' => ['chariot']],
                            'ja' => ['sentence' => 'ご飯一キロを入れる', 'correct' => ['ご飯', '一', 'キロ', 'を', '入れる'], 'extra' => ['カート']],
                        ],
                    ],
                    'b' => [
                        'words' => ['카트는', '가득합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the trolley is full', 'correct' => ['the', 'trolley', 'is', 'full'], 'extra' => ['to put']],
                            'es' => ['sentence' => 'El carrito está lleno', 'correct' => ['el', 'carrito', 'está', 'lleno'], 'extra' => ['poner', 'kilo']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist voll', 'correct' => ['der', 'Einkaufswagen', 'ist', 'voll'], 'extra' => ['legen', 'Kilo']],
                            'fr' => ['sentence' => 'Le chariot est plein', 'correct' => ['le', 'chariot', 'est', 'plein'], 'extra' => ['mettre']],
                            'ja' => ['sentence' => 'カートはいっぱいです', 'correct' => ['カート', 'は', 'いっぱい', 'です'], 'extra' => ['入れる']],
                        ],
                    ],
                    'c' => [
                        'words' => ['밥을', '카트에', '넣으세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to put the rice in the trolley', 'correct' => ['to put', 'the', 'rice', 'in', 'the', 'trolley'], 'extra' => ['kilo']],
                            'es' => ['sentence' => 'Poner el arroz en el carrito', 'correct' => ['poner', 'el', 'arroz', 'en', 'el', 'carrito'], 'extra' => ['kilo']],
                            'de' => ['sentence' => 'Den Reis in den Einkaufswagen legen', 'correct' => ['den', 'Reis', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Kilo']],
                            'fr' => ['sentence' => 'Mettre le riz dans le chariot', 'correct' => ['mettre', 'le', 'riz', 'dans', 'le', 'chariot'], 'extra' => ['kilo']],
                            'ja' => ['sentence' => 'ご飯をカートに入れる', 'correct' => ['ご飯', 'を', 'カート', 'に', '入れる'], 'extra' => ['キロ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 설탕 · 빵', 3,
                pictures: [['ko' => '설탕', 'img' => 'sugar'], ['ko' => '빵', 'img' => 'bread']],
                plain: [['ko' => '빵집'], ['ko' => '신선한']],
                phrases: [
                    'a' => [
                        'words' => ['신선한', '빵'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'some fresh bread', 'correct' => ['some', 'fresh', 'bread'], 'extra' => ['bakery']],
                            'es' => ['sentence' => 'Algo de pan fresco', 'correct' => ['algo de', 'pan', 'fresco'], 'extra' => ['panadería', 'azúcar']],
                            'de' => ['sentence' => 'Etwas frisches Brot', 'correct' => ['etwas', 'frisch', 'Brot'], 'extra' => ['Bäckerei', 'Zucker']],
                            'fr' => ['sentence' => 'Du pain frais', 'correct' => ['du', 'pain', 'frais'], 'extra' => ['boulangerie', 'sucre']],
                            'ja' => ['sentence' => '新鮮なパン', 'correct' => ['新鮮な', 'パン'], 'extra' => ['パン屋']],
                        ],
                    ],
                    'b' => [
                        'words' => ['빵집의', '설탕'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'some sugar from the bakery', 'correct' => ['some', 'sugar', 'from', 'the', 'bakery'], 'extra' => ['fresh']],
                            'es' => ['sentence' => 'Algo de azúcar de la panadería', 'correct' => ['algo de', 'azúcar', 'de', 'la', 'panadería'], 'extra' => ['fresco', 'pan']],
                            'de' => ['sentence' => 'Etwas Zucker aus der Bäckerei', 'correct' => ['etwas', 'Zucker', 'von', 'der', 'Bäckerei'], 'extra' => ['frisch', 'Brot']],
                            'fr' => ['sentence' => 'Du sucre de la boulangerie', 'correct' => ['du', 'sucre', 'de', 'la', 'boulangerie'], 'extra' => ['frais']],
                            'ja' => ['sentence' => 'パン屋の砂糖', 'correct' => ['パン屋', 'の', '砂糖'], 'extra' => ['新鮮']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵집의', '신선한', '빵'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'fresh bread from the bakery', 'correct' => ['fresh', 'bread', 'from', 'the', 'bakery'], 'extra' => ['sugar']],
                            'es' => ['sentence' => 'Pan fresco de la panadería', 'correct' => ['pan', 'fresco', 'de', 'la', 'panadería'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Frisches Brot aus der Bäckerei', 'correct' => ['frisch', 'Brot', 'von', 'der', 'Bäckerei'], 'extra' => ['Zucker']],
                            'fr' => ['sentence' => 'Du pain frais de la boulangerie', 'correct' => ['frais', 'pain', 'de', 'la', 'boulangerie'], 'extra' => ['sucre']],
                            'ja' => ['sentence' => 'パン屋の新鮮なパン', 'correct' => ['パン屋', 'の', '新鮮な', 'パン'], 'extra' => ['砂糖']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 계산대 · 사과', 4,
                pictures: [['ko' => '계산대', 'img' => 'checkout'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '지불하다'], ['ko' => '영수증']],
                phrases: [
                    'a' => [
                        'words' => ['계산대에서', '지불하세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to pay at the checkout', 'correct' => ['to pay', 'at', 'the', 'checkout'], 'extra' => ['receipt']],
                            'es' => ['sentence' => 'Pagar en la caja', 'correct' => ['pagar', 'en', 'la', 'caja'], 'extra' => ['recibo', 'manzana']],
                            'de' => ['sentence' => 'An der Kasse bezahlen', 'correct' => ['an', 'der', 'Kasse', 'bezahlen'], 'extra' => ['Quittung', 'Apfel']],
                            'fr' => ['sentence' => 'Payer à la caisse', 'correct' => ['payer', 'à', 'la', 'caisse'], 'extra' => ['reçu', 'pomme']],
                            'ja' => ['sentence' => 'レジで払う', 'correct' => ['レジ', 'で', '払う'], 'extra' => ['レシート']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과의', '영수증'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the receipt for the apple', 'correct' => ['the', 'receipt', 'for', 'the', 'apple'], 'extra' => ['pay']],
                            'es' => ['sentence' => 'El recibo por la manzana', 'correct' => ['el', 'recibo', 'para', 'la', 'manzana'], 'extra' => ['pagar']],
                            'de' => ['sentence' => 'Die Quittung für den Apfel', 'correct' => ['die', 'Quittung', 'für', 'den', 'Apfel'], 'extra' => ['bezahlen']],
                            'fr' => ['sentence' => 'Le reçu pour la pomme', 'correct' => ['le', 'reçu', 'pour', 'la', 'pomme'], 'extra' => ['payer']],
                            'ja' => ['sentence' => 'りんごのレシート', 'correct' => ['りんご', 'の', 'レシート'], 'extra' => ['払う']],
                        ],
                    ],
                    'c' => [
                        'words' => ['사과', '값을', '지불하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to pay for the apple', 'correct' => ['to pay', 'for', 'the', 'apple'], 'extra' => ['receipt']],
                            'es' => ['sentence' => 'Pagar por la manzana', 'correct' => ['pagar', 'para', 'la', 'manzana'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Für den Apfel bezahlen', 'correct' => ['für', 'den', 'Apfel', 'bezahlen'], 'extra' => ['Quittung']],
                            'fr' => ['sentence' => 'Payer la pomme', 'correct' => ['payer', 'pour', 'la', 'pomme'], 'extra' => ['reçu']],
                            'ja' => ['sentence' => 'りんごの代金を払う', 'correct' => ['りんご', 'の', '代金', 'を', '払う'], 'extra' => ['レシート']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 카트 · 우유', 5,
                pictures: [['ko' => '카트', 'img' => 'cart'], ['ko' => '우유', 'img' => 'milk']],
                plain: [['ko' => '나르다'], ['ko' => '집']],
                phrases: [
                    'a' => [
                        'words' => ['우유를', '집으로', '나르세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to carry the milk to the house', 'correct' => ['to carry', 'the', 'milk', 'to', 'the', 'house'], 'extra' => ['trolley']],
                            'es' => ['sentence' => 'Llevar la leche a la casa', 'correct' => ['llevar', 'la', 'leche', 'a', 'la', 'casa'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Die Milch nach Hause tragen', 'correct' => ['tragen', 'die', 'Milch', 'zu', 'dem', 'Haus'], 'extra' => ['Einkaufswagen']],
                            'fr' => ['sentence' => 'Porter le lait à la maison', 'correct' => ['porter', 'le', 'lait', 'à', 'la', 'maison'], 'extra' => ['chariot']],
                            'ja' => ['sentence' => '牛乳を家に運ぶ', 'correct' => ['牛乳', 'を', '家', 'に', '運ぶ'], 'extra' => ['カート']],
                        ],
                    ],
                    'b' => [
                        'words' => ['카트는', '집에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the trolley is at the house', 'correct' => ['the', 'trolley', 'is', 'at', 'the', 'house'], 'extra' => ['to carry']],
                            'es' => ['sentence' => 'El carrito está en la casa', 'correct' => ['el', 'carrito', 'está', 'en', 'la', 'casa'], 'extra' => ['llevar']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist beim Haus', 'correct' => ['der', 'Einkaufswagen', 'ist', 'an', 'dem', 'Haus'], 'extra' => ['tragen']],
                            'fr' => ['sentence' => 'Le chariot est à la maison', 'correct' => ['le', 'chariot', 'est', 'à', 'la', 'maison'], 'extra' => ['porter']],
                            'ja' => ['sentence' => 'カートは家にあります', 'correct' => ['カート', 'は', '家', 'に', 'あります'], 'extra' => ['運ぶ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['카트를', '집으로', '나르세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to carry the trolley to the house', 'correct' => ['to carry', 'the', 'trolley', 'to', 'the', 'house'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'Llevar el carrito a la casa', 'correct' => ['llevar', 'el', 'carrito', 'a', 'la', 'casa'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Den Einkaufswagen nach Hause tragen', 'correct' => ['tragen', 'den', 'Einkaufswagen', 'zu', 'dem', 'Haus'], 'extra' => ['Milch']],
                            'fr' => ['sentence' => 'Porter le chariot à la maison', 'correct' => ['porter', 'le', 'chariot', 'à', 'la', 'maison'], 'extra' => ['lait']],
                            'ja' => ['sentence' => 'カートを家に運ぶ', 'correct' => ['カート', 'を', '家', 'に', '運ぶ'], 'extra' => ['牛乳']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
