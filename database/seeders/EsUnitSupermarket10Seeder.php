<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket10Seeder extends Seeder
{
    private const PICTURES = [
        'lista' => 'list',
        'carrito' => 'cart',
        'azúcar' => 'sugar',
        'arroz' => 'rice',
        'leche' => 'milk',
        'pan' => 'bread',
        'manzana' => 'apple',
        'caja' => 'checkout',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 10, the Spanish twin of the
     * English "Unit 10: A Whole Shopping Trip" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unidad 10: Una compra completa', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Lista y Leche', 1,
                pictures: [
                    [
                        'es' => 'lista',
                        'img' => 'list',
                    ],
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'es' => 'necesito',
                    ],
                    [
                        'es' => 'comprar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Necesito',
                            'leche',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need milk',
                                'correct' => [
                                    'I need',
                                    'milk',
                                ],
                                'extra' => [
                                    'to buy',
                                    'list',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich brauche Milch',
                                'correct' => [
                                    'ich brauche',
                                    'Milch',
                                ],
                                'extra' => [
                                    'kaufen',
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de lait',
                                'correct' => [
                                    'j\'ai besoin',
                                    'lait',
                                ],
                                'extra' => [
                                    'acheter',
                                    'liste',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '牛乳が必要です',
                                'correct' => [
                                    '牛乳',
                                    'が',
                                    '必要です',
                                ],
                                'extra' => [
                                    '買う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유가 필요합니다',
                                'correct' => [
                                    '우유가',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '사다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Comprar',
                            'con',
                            'mi',
                            'lista',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy with my list',
                                'correct' => [
                                    'buy',
                                    'with',
                                    'my',
                                    'list',
                                ],
                                'extra' => [
                                    'I need',
                                    'milk',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mit meiner Liste kaufen',
                                'correct' => [
                                    'kaufen',
                                    'mit',
                                    'meine',
                                    'Liste',
                                ],
                                'extra' => [
                                    'ich brauche',
                                    'Milch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter avec ma liste',
                                'correct' => [
                                    'acheter',
                                    'avec',
                                    'ma',
                                    'liste',
                                ],
                                'extra' => [
                                    'j\'ai besoin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私のリストで買う',
                                'correct' => [
                                    '私の',
                                    'リスト',
                                    'で',
                                    '買う',
                                ],
                                'extra' => [
                                    '必要です',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 목록으로 사다',
                                'correct' => [
                                    '제',
                                    '목록으로',
                                    '사다',
                                ],
                                'extra' => [
                                    '필요합니다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Necesito',
                            'mi',
                            'lista',
                            'para',
                            'comprar',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need my list to buy',
                                'correct' => [
                                    'I need',
                                    'my',
                                    'list',
                                    'to',
                                    'buy',
                                ],
                                'extra' => [
                                    'milk',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich brauche meine Liste zum Kaufen',
                                'correct' => [
                                    'ich brauche',
                                    'meine',
                                    'Liste',
                                    'zu',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'Milch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de ma liste pour acheter',
                                'correct' => [
                                    'j\'ai besoin',
                                    'ma',
                                    'liste',
                                    'à',
                                    'acheter',
                                ],
                                'extra' => [
                                    'lait',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '買うために私のリストが必要です',
                                'correct' => [
                                    '買う',
                                    'ため',
                                    'に',
                                    '私の',
                                    'リスト',
                                    'が',
                                    '必要です',
                                ],
                                'extra' => [
                                    '牛乳',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사기 위해 제 목록이 필요합니다',
                                'correct' => [
                                    '사기',
                                    '위해',
                                    '제',
                                    '목록이',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '우유',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Carrito y Arroz', 2,
                pictures: [
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                    [
                        'es' => 'arroz',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'es' => 'poner',
                    ],
                    [
                        'es' => 'kilo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Poner',
                            'un',
                            'kilo',
                            'de',
                            'arroz',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put a kilo of rice',
                                'correct' => [
                                    'to put',
                                    'a',
                                    'kilo',
                                    'of',
                                    'rice',
                                ],
                                'extra' => [
                                    'trolley',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Kilo Reis legen',
                                'correct' => [
                                    'legen',
                                    'ein',
                                    'Kilo',
                                    'von',
                                    'Reis',
                                ],
                                'extra' => [
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre un kilo de riz',
                                'correct' => [
                                    'mettre',
                                    'un',
                                    'kilo',
                                    'de',
                                    'riz',
                                ],
                                'extra' => [
                                    'chariot',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯一キロを入れる',
                                'correct' => [
                                    'ご飯',
                                    '一',
                                    'キロ',
                                    'を',
                                    '入れる',
                                ],
                                'extra' => [
                                    'カート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥 일 킬로를 넣다',
                                'correct' => [
                                    '밥',
                                    '일',
                                    '킬로를',
                                    '넣다',
                                ],
                                'extra' => [
                                    '카트',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'carrito',
                            'está',
                            'lleno',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the trolley is full',
                                'correct' => [
                                    'the',
                                    'trolley',
                                    'is',
                                    'full',
                                ],
                                'extra' => [
                                    'to put',
                                    'kilo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Einkaufswagen ist voll',
                                'correct' => [
                                    'der',
                                    'Einkaufswagen',
                                    'ist',
                                    'voll',
                                ],
                                'extra' => [
                                    'legen',
                                    'Kilo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chariot est plein',
                                'correct' => [
                                    'le',
                                    'chariot',
                                    'est',
                                    'plein',
                                ],
                                'extra' => [
                                    'mettre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートはいっぱいです',
                                'correct' => [
                                    'カート',
                                    'は',
                                    'いっぱい',
                                    'です',
                                ],
                                'extra' => [
                                    '入れる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트는 가득합니다',
                                'correct' => [
                                    '카트는',
                                    '가득합니다',
                                ],
                                'extra' => [
                                    '넣다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Poner',
                            'el',
                            'arroz',
                            'en',
                            'el',
                            'carrito',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put the rice in the trolley',
                                'correct' => [
                                    'to put',
                                    'the',
                                    'rice',
                                    'in',
                                    'the',
                                    'trolley',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Den Reis in den Einkaufswagen legen',
                                'correct' => [
                                    'den',
                                    'Reis',
                                    'in',
                                    'den',
                                    'Einkaufswagen',
                                    'legen',
                                ],
                                'extra' => [
                                    'Kilo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre le riz dans le chariot',
                                'correct' => [
                                    'mettre',
                                    'le',
                                    'riz',
                                    'dans',
                                    'le',
                                    'chariot',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯をカートに入れる',
                                'correct' => [
                                    'ご飯',
                                    'を',
                                    'カート',
                                    'に',
                                    '入れる',
                                ],
                                'extra' => [
                                    'キロ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥을 카트에 넣다',
                                'correct' => [
                                    '밥을',
                                    '카트에',
                                    '넣다',
                                ],
                                'extra' => [
                                    '킬로',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Azúcar y Pan', 3,
                pictures: [
                    [
                        'es' => 'azúcar',
                        'img' => 'sugar',
                    ],
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'es' => 'panadería',
                    ],
                    [
                        'es' => 'fresco',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Algo',
                            'de',
                            'pan',
                            'fresco',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some fresh bread',
                                'correct' => [
                                    'some',
                                    'fresh',
                                    'bread',
                                ],
                                'extra' => [
                                    'bakery',
                                    'sugar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Etwas frisches Brot',
                                'correct' => [
                                    'etwas',
                                    'frisch',
                                    'Brot',
                                ],
                                'extra' => [
                                    'Bäckerei',
                                    'Zucker',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain frais',
                                'correct' => [
                                    'du',
                                    'pain',
                                    'frais',
                                ],
                                'extra' => [
                                    'boulangerie',
                                    'sucre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '新鮮なパン',
                                'correct' => [
                                    '新鮮な',
                                    'パン',
                                ],
                                'extra' => [
                                    'パン屋',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '신선한 빵',
                                'correct' => [
                                    '신선한',
                                    '빵',
                                ],
                                'extra' => [
                                    '빵집',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Algo',
                            'de',
                            'azúcar',
                            'de',
                            'la',
                            'panadería',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some sugar from the bakery',
                                'correct' => [
                                    'some',
                                    'sugar',
                                    'from',
                                    'the',
                                    'bakery',
                                ],
                                'extra' => [
                                    'fresh',
                                    'bread',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Etwas Zucker aus der Bäckerei',
                                'correct' => [
                                    'etwas',
                                    'Zucker',
                                    'von',
                                    'der',
                                    'Bäckerei',
                                ],
                                'extra' => [
                                    'frisch',
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du sucre de la boulangerie',
                                'correct' => [
                                    'du',
                                    'sucre',
                                    'de',
                                    'la',
                                    'boulangerie',
                                ],
                                'extra' => [
                                    'frais',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'パン屋の砂糖',
                                'correct' => [
                                    'パン屋',
                                    'の',
                                    '砂糖',
                                ],
                                'extra' => [
                                    '新鮮',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵집의 설탕',
                                'correct' => [
                                    '빵집의',
                                    '설탕',
                                ],
                                'extra' => [
                                    '신선한',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Pan',
                            'fresco',
                            'de',
                            'la',
                            'panadería',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'fresh bread from the bakery',
                                'correct' => [
                                    'fresh',
                                    'bread',
                                    'from',
                                    'the',
                                    'bakery',
                                ],
                                'extra' => [
                                    'sugar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Frisches Brot aus der Bäckerei',
                                'correct' => [
                                    'frisch',
                                    'Brot',
                                    'von',
                                    'der',
                                    'Bäckerei',
                                ],
                                'extra' => [
                                    'Zucker',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain frais de la boulangerie',
                                'correct' => [
                                    'frais',
                                    'pain',
                                    'de',
                                    'la',
                                    'boulangerie',
                                ],
                                'extra' => [
                                    'sucre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'パン屋の新鮮なパン',
                                'correct' => [
                                    'パン屋',
                                    'の',
                                    '新鮮な',
                                    'パン',
                                ],
                                'extra' => [
                                    '砂糖',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵집의 신선한 빵',
                                'correct' => [
                                    '빵집의',
                                    '신선한',
                                    '빵',
                                ],
                                'extra' => [
                                    '설탕',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Caja y Manzana', 4,
                pictures: [
                    [
                        'es' => 'caja',
                        'img' => 'checkout',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pagar',
                    ],
                    [
                        'es' => 'recibo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Pagar',
                            'en',
                            'la',
                            'caja',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay at the checkout',
                                'correct' => [
                                    'to pay',
                                    'at',
                                    'the',
                                    'checkout',
                                ],
                                'extra' => [
                                    'receipt',
                                    'apple',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'An der Kasse bezahlen',
                                'correct' => [
                                    'an',
                                    'der',
                                    'Kasse',
                                    'bezahlen',
                                ],
                                'extra' => [
                                    'Quittung',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer à la caisse',
                                'correct' => [
                                    'payer',
                                    'à',
                                    'la',
                                    'caisse',
                                ],
                                'extra' => [
                                    'reçu',
                                    'pomme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'レジで払う',
                                'correct' => [
                                    'レジ',
                                    'で',
                                    '払う',
                                ],
                                'extra' => [
                                    'レシート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산대에서 지불하다',
                                'correct' => [
                                    '계산대에서',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '영수증',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'recibo',
                            'por',
                            'la',
                            'manzana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the receipt for the apple',
                                'correct' => [
                                    'the',
                                    'receipt',
                                    'for',
                                    'the',
                                    'apple',
                                ],
                                'extra' => [
                                    'pay',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Quittung für den Apfel',
                                'correct' => [
                                    'die',
                                    'Quittung',
                                    'für',
                                    'den',
                                    'Apfel',
                                ],
                                'extra' => [
                                    'bezahlen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le reçu pour la pomme',
                                'correct' => [
                                    'le',
                                    'reçu',
                                    'pour',
                                    'la',
                                    'pomme',
                                ],
                                'extra' => [
                                    'payer',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごのレシート',
                                'correct' => [
                                    'りんご',
                                    'の',
                                    'レシート',
                                ],
                                'extra' => [
                                    '払う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과의 영수증',
                                'correct' => [
                                    '사과의',
                                    '영수증',
                                ],
                                'extra' => [
                                    '지불하다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Pagar',
                            'por',
                            'la',
                            'manzana',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay for the apple',
                                'correct' => [
                                    'to pay',
                                    'for',
                                    'the',
                                    'apple',
                                ],
                                'extra' => [
                                    'receipt',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Für den Apfel bezahlen',
                                'correct' => [
                                    'für',
                                    'den',
                                    'Apfel',
                                    'bezahlen',
                                ],
                                'extra' => [
                                    'Quittung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer la pomme',
                                'correct' => [
                                    'payer',
                                    'pour',
                                    'la',
                                    'pomme',
                                ],
                                'extra' => [
                                    'reçu',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごの代金を払う',
                                'correct' => [
                                    'りんご',
                                    'の',
                                    '代金',
                                    'を',
                                    '払う',
                                ],
                                'extra' => [
                                    'レシート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과 값을 지불하다',
                                'correct' => [
                                    '사과',
                                    '값을',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '영수증',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Carrito y Leche', 5,
                pictures: [
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'es' => 'llevar',
                    ],
                    [
                        'es' => 'casa',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Llevar',
                            'la',
                            'leche',
                            'a',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to carry the milk to the house',
                                'correct' => [
                                    'to carry',
                                    'the',
                                    'milk',
                                    'to',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'trolley',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Milch nach Hause tragen',
                                'correct' => [
                                    'tragen',
                                    'die',
                                    'Milch',
                                    'zu',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Porter le lait à la maison',
                                'correct' => [
                                    'porter',
                                    'le',
                                    'lait',
                                    'à',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'chariot',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '牛乳を家に運ぶ',
                                'correct' => [
                                    '牛乳',
                                    'を',
                                    '家',
                                    'に',
                                    '運ぶ',
                                ],
                                'extra' => [
                                    'カート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유를 집으로 나르다',
                                'correct' => [
                                    '우유를',
                                    '집으로',
                                    '나르다',
                                ],
                                'extra' => [
                                    '카트',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'carrito',
                            'está',
                            'en',
                            'la',
                            'casa',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the trolley is at the house',
                                'correct' => [
                                    'the',
                                    'trolley',
                                    'is',
                                    'at',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'to carry',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Einkaufswagen ist beim Haus',
                                'correct' => [
                                    'der',
                                    'Einkaufswagen',
                                    'ist',
                                    'an',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'tragen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chariot est à la maison',
                                'correct' => [
                                    'le',
                                    'chariot',
                                    'est',
                                    'à',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'porter',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートは家にあります',
                                'correct' => [
                                    'カート',
                                    'は',
                                    '家',
                                    'に',
                                    'あります',
                                ],
                                'extra' => [
                                    '運ぶ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트는 집에 있습니다',
                                'correct' => [
                                    '카트는',
                                    '집에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '나르다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Llevar',
                            'el',
                            'carrito',
                            'a',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to carry the trolley to the house',
                                'correct' => [
                                    'to carry',
                                    'the',
                                    'trolley',
                                    'to',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'milk',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Den Einkaufswagen nach Hause tragen',
                                'correct' => [
                                    'tragen',
                                    'den',
                                    'Einkaufswagen',
                                    'zu',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Milch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Porter le chariot à la maison',
                                'correct' => [
                                    'porter',
                                    'le',
                                    'chariot',
                                    'à',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'lait',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートを家に運ぶ',
                                'correct' => [
                                    'カート',
                                    'を',
                                    '家',
                                    'に',
                                    '運ぶ',
                                ],
                                'extra' => [
                                    '牛乳',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트를 집으로 나르다',
                                'correct' => [
                                    '카트를',
                                    '집으로',
                                    '나르다',
                                ],
                                'extra' => [
                                    '우유',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
