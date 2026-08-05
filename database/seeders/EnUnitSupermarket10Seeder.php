<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket10Seeder extends Seeder
{
    private const PICTURES = [
        'List' => 'list', 'Trolley' => 'cart', 'Sugar' => 'sugar', 'Rice' => 'rice',
        'Milk' => 'milk', 'Bread' => 'bread', 'Apple' => 'apple', 'Checkout' => 'checkout',
    ];

    /**
     * English Chapter 4, Unit 10 — the whole shop, start to finish.
     *
     * The closing unit of the last content chapter introduces almost nothing
     * new: it strings together what the learner already has — a list, a trolley,
     * quantities, a till — so they finish on a complete shopping trip.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: A Whole Shopping Trip', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: What I Need Today', 1,
                pictures: [['en' => 'List', 'img' => 'list'], ['en' => 'Milk', 'img' => 'milk']],
                plain: [['en' => 'I need'], ['en' => 'Buy']],
                phrases: [
                    'a' => [
                        'words' => ['I need', 'milk'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Necesito leche', 'correct' => ['necesito', 'leche'], 'extra' => ['comprar', 'lista']],
                            'de' => ['sentence' => 'Ich brauche Milch', 'correct' => ['ich brauche', 'Milch'], 'extra' => ['kaufen', 'Liste']],
                            'ja' => ['sentence' => '牛乳が必要です', 'correct' => ['牛乳', 'が', '必要です'], 'extra' => ['買う']],
                            'ko' => ['sentence' => '우유가 필요합니다', 'correct' => ['우유가', '필요합니다'], 'extra' => ['사다']],
                            'fr' => ['sentence' => "J'ai besoin de lait", 'correct' => ["j'ai besoin", 'lait'], 'extra' => ['acheter', 'liste']],
                        ],
                    ],
                    'b' => [
                        'words' => ['buy', 'with', 'my', 'list'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comprar con mi lista', 'correct' => ['comprar', 'con', 'mi', 'lista'], 'extra' => ['necesito', 'leche']],
                            'de' => ['sentence' => 'Mit meiner Liste kaufen', 'correct' => ['kaufen', 'mit', 'meine', 'Liste'], 'extra' => ['ich brauche', 'Milch']],
                            'ja' => ['sentence' => '私のリストで買う', 'correct' => ['私の', 'リスト', 'で', '買う'], 'extra' => ['必要です']],
                            'ko' => ['sentence' => '제 목록으로 사다', 'correct' => ['제', '목록으로', '사다'], 'extra' => ['필요합니다']],
                            'fr' => ['sentence' => 'Acheter avec ma liste', 'correct' => ['acheter', 'avec', 'ma', 'liste'], 'extra' => ["j'ai besoin"]],
                        ],
                    ],
                    'c' => [
                        'words' => ['I need', 'my', 'list', 'to', 'buy'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Necesito mi lista para comprar', 'correct' => ['necesito', 'mi', 'lista', 'para', 'comprar'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich brauche meine Liste zum Kaufen', 'correct' => ['ich brauche', 'meine', 'Liste', 'zu', 'kaufen'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '買うために私のリストが必要です', 'correct' => ['買う', 'ため', 'に', '私の', 'リスト', 'が', '必要です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '사기 위해 제 목록이 필요합니다', 'correct' => ['사기', '위해', '제', '목록이', '필요합니다'], 'extra' => ['우유']],
                            'fr' => ['sentence' => "J'ai besoin de ma liste pour acheter", 'correct' => ["j'ai besoin", 'ma', 'liste', 'à', 'acheter'], 'extra' => ['lait']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Filling the Trolley', 2,
                pictures: [['en' => 'Trolley', 'img' => 'cart'], ['en' => 'Rice', 'img' => 'rice']],
                plain: [['en' => 'To put'], ['en' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['to put', 'a', 'kilo', 'of', 'rice'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Poner un kilo de arroz', 'correct' => ['poner', 'un', 'kilo', 'de', 'arroz'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Ein Kilo Reis legen', 'correct' => ['legen', 'ein', 'Kilo', 'von', 'Reis'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => 'ご飯一キロを入れる', 'correct' => ['ご飯', '一', 'キロ', 'を', '入れる'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '밥 일 킬로를 넣다', 'correct' => ['밥', '일', '킬로를', '넣다'], 'extra' => ['카트']],
                            'fr' => ['sentence' => 'Mettre un kilo de riz', 'correct' => ['mettre', 'un', 'kilo', 'de', 'riz'], 'extra' => ['chariot']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'trolley', 'is', 'full'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El carrito está lleno', 'correct' => ['el', 'carrito', 'está', 'lleno'], 'extra' => ['poner', 'kilo']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist voll', 'correct' => ['der', 'Einkaufswagen', 'ist', 'voll'], 'extra' => ['legen', 'Kilo']],
                            'ja' => ['sentence' => 'カートはいっぱいです', 'correct' => ['カート', 'は', 'いっぱい', 'です'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '카트는 가득합니다', 'correct' => ['카트는', '가득합니다'], 'extra' => ['넣다']],
                            'fr' => ['sentence' => 'Le chariot est plein', 'correct' => ['le', 'chariot', 'est', 'plein'], 'extra' => ['mettre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to put', 'the', 'rice', 'in', 'the', 'trolley'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Poner el arroz en el carrito', 'correct' => ['poner', 'el', 'arroz', 'en', 'el', 'carrito'], 'extra' => ['kilo']],
                            'de' => ['sentence' => 'Den Reis in den Einkaufswagen legen', 'correct' => ['den', 'Reis', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Kilo']],
                            'ja' => ['sentence' => 'ご飯をカートに入れる', 'correct' => ['ご飯', 'を', 'カート', 'に', '入れる'], 'extra' => ['キロ']],
                            'ko' => ['sentence' => '밥을 카트에 넣다', 'correct' => ['밥을', '카트에', '넣다'], 'extra' => ['킬로']],
                            'fr' => ['sentence' => 'Mettre le riz dans le chariot', 'correct' => ['mettre', 'le', 'riz', 'dans', 'le', 'chariot'], 'extra' => ['kilo']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Sugar and Bread', 3,
                pictures: [['en' => 'Sugar', 'img' => 'sugar'], ['en' => 'Bread', 'img' => 'bread']],
                plain: [['en' => 'Bakery'], ['en' => 'Fresh']],
                phrases: [
                    'a' => [
                        'words' => ['some', 'fresh', 'bread'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de pan fresco', 'correct' => ['algo de', 'pan', 'fresco'], 'extra' => ['panadería', 'azúcar']],
                            'de' => ['sentence' => 'Etwas frisches Brot', 'correct' => ['etwas', 'frisch', 'Brot'], 'extra' => ['Bäckerei', 'Zucker']],
                            'ja' => ['sentence' => '新鮮なパン', 'correct' => ['新鮮な', 'パン'], 'extra' => ['パン屋']],
                            'ko' => ['sentence' => '신선한 빵', 'correct' => ['신선한', '빵'], 'extra' => ['빵집']],
                            'fr' => ['sentence' => 'Du pain frais', 'correct' => ['du', 'pain', 'frais'], 'extra' => ['boulangerie', 'sucre']],
                        ],
                    ],
                    'b' => [
                        'words' => ['some', 'sugar', 'from', 'the', 'bakery'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de azúcar de la panadería', 'correct' => ['algo de', 'azúcar', 'de', 'la', 'panadería'], 'extra' => ['fresco', 'pan']],
                            'de' => ['sentence' => 'Etwas Zucker aus der Bäckerei', 'correct' => ['etwas', 'Zucker', 'von', 'der', 'Bäckerei'], 'extra' => ['frisch', 'Brot']],
                            'ja' => ['sentence' => 'パン屋の砂糖', 'correct' => ['パン屋', 'の', '砂糖'], 'extra' => ['新鮮']],
                            'ko' => ['sentence' => '빵집의 설탕', 'correct' => ['빵집의', '설탕'], 'extra' => ['신선한']],
                            'fr' => ['sentence' => 'Du sucre de la boulangerie', 'correct' => ['du', 'sucre', 'de', 'la', 'boulangerie'], 'extra' => ['frais']],
                        ],
                    ],
                    'c' => [
                        'words' => ['fresh', 'bread', 'from', 'the', 'bakery'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Pan fresco de la panadería', 'correct' => ['pan', 'fresco', 'de', 'la', 'panadería'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Frisches Brot aus der Bäckerei', 'correct' => ['frisch', 'Brot', 'von', 'der', 'Bäckerei'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => 'パン屋の新鮮なパン', 'correct' => ['パン屋', 'の', '新鮮な', 'パン'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '빵집의 신선한 빵', 'correct' => ['빵집의', '신선한', '빵'], 'extra' => ['설탕']],
                            'fr' => ['sentence' => 'Du pain frais de la boulangerie', 'correct' => ['frais', 'pain', 'de', 'la', 'boulangerie'], 'extra' => ['sucre']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Paying and Leaving', 4,
                pictures: [['en' => 'Checkout', 'img' => 'checkout'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'To pay'], ['en' => 'Receipt']],
                phrases: [
                    'a' => [
                        'words' => ['to pay', 'at', 'the', 'checkout'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Pagar en la caja', 'correct' => ['pagar', 'en', 'la', 'caja'], 'extra' => ['recibo', 'manzana']],
                            'de' => ['sentence' => 'An der Kasse bezahlen', 'correct' => ['an', 'der', 'Kasse', 'bezahlen'], 'extra' => ['Quittung', 'Apfel']],
                            'ja' => ['sentence' => 'レジで払う', 'correct' => ['レジ', 'で', '払う'], 'extra' => ['レシート']],
                            'ko' => ['sentence' => '계산대에서 지불하다', 'correct' => ['계산대에서', '지불하다'], 'extra' => ['영수증']],
                            'fr' => ['sentence' => 'Payer à la caisse', 'correct' => ['payer', 'à', 'la', 'caisse'], 'extra' => ['reçu', 'pomme']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'receipt', 'for', 'the', 'apple'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El recibo por la manzana', 'correct' => ['el', 'recibo', 'para', 'la', 'manzana'], 'extra' => ['pagar']],
                            'de' => ['sentence' => 'Die Quittung für den Apfel', 'correct' => ['die', 'Quittung', 'für', 'den', 'Apfel'], 'extra' => ['bezahlen']],
                            'ja' => ['sentence' => 'りんごのレシート', 'correct' => ['りんご', 'の', 'レシート'], 'extra' => ['払う']],
                            'ko' => ['sentence' => '사과의 영수증', 'correct' => ['사과의', '영수증'], 'extra' => ['지불하다']],
                            'fr' => ['sentence' => 'Le reçu pour la pomme', 'correct' => ['le', 'reçu', 'pour', 'la', 'pomme'], 'extra' => ['payer']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to pay', 'for', 'the', 'apple'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Pagar por la manzana', 'correct' => ['pagar', 'para', 'la', 'manzana'], 'extra' => ['recibo']],
                            'de' => ['sentence' => 'Für den Apfel bezahlen', 'correct' => ['für', 'den', 'Apfel', 'bezahlen'], 'extra' => ['Quittung']],
                            'ja' => ['sentence' => 'りんごの代金を払う', 'correct' => ['りんご', 'の', '代金', 'を', '払う'], 'extra' => ['レシート']],
                            'ko' => ['sentence' => '사과 값을 지불하다', 'correct' => ['사과', '값을', '지불하다'], 'extra' => ['영수증']],
                            'fr' => ['sentence' => 'Payer la pomme', 'correct' => ['payer', 'pour', 'la', 'pomme'], 'extra' => ['reçu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Going Home', 5,
                pictures: [['en' => 'Trolley', 'img' => 'cart'], ['en' => 'Milk', 'img' => 'milk']],
                plain: [['en' => 'To carry'], ['en' => 'House']],
                phrases: [
                    'a' => [
                        'words' => ['to carry', 'the', 'milk', 'to', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Llevar la leche a la casa', 'correct' => ['llevar', 'la', 'leche', 'a', 'la', 'casa'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Die Milch nach Hause tragen', 'correct' => ['tragen', 'die', 'Milch', 'zu', 'dem', 'Haus'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => '牛乳を家に運ぶ', 'correct' => ['牛乳', 'を', '家', 'に', '運ぶ'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '우유를 집으로 나르다', 'correct' => ['우유를', '집으로', '나르다'], 'extra' => ['카트']],
                            'fr' => ['sentence' => 'Porter le lait à la maison', 'correct' => ['porter', 'le', 'lait', 'à', 'la', 'maison'], 'extra' => ['chariot']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'trolley', 'is', 'at', 'the', 'house'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El carrito está en la casa', 'correct' => ['el', 'carrito', 'está', 'en', 'la', 'casa'], 'extra' => ['llevar']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist beim Haus', 'correct' => ['der', 'Einkaufswagen', 'ist', 'an', 'dem', 'Haus'], 'extra' => ['tragen']],
                            'ja' => ['sentence' => 'カートは家にあります', 'correct' => ['カート', 'は', '家', 'に', 'あります'], 'extra' => ['運ぶ']],
                            'ko' => ['sentence' => '카트는 집에 있습니다', 'correct' => ['카트는', '집에', '있습니다'], 'extra' => ['나르다']],
                            'fr' => ['sentence' => 'Le chariot est à la maison', 'correct' => ['le', 'chariot', 'est', 'à', 'la', 'maison'], 'extra' => ['porter']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to carry', 'the', 'trolley', 'to', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Llevar el carrito a la casa', 'correct' => ['llevar', 'el', 'carrito', 'a', 'la', 'casa'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Den Einkaufswagen nach Hause tragen', 'correct' => ['tragen', 'den', 'Einkaufswagen', 'zu', 'dem', 'Haus'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'カートを家に運ぶ', 'correct' => ['カート', 'を', '家', 'に', '運ぶ'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '카트를 집으로 나르다', 'correct' => ['카트를', '집으로', '나르다'], 'extra' => ['우유']],
                            'fr' => ['sentence' => 'Porter le chariot à la maison', 'correct' => ['porter', 'le', 'chariot', 'à', 'la', 'maison'], 'extra' => ['lait']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
