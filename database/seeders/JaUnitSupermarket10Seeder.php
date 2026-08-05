<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket10Seeder extends Seeder
{
    private const PICTURES = [
        'リスト' => 'list',
        'カート' => 'cart',
        '砂糖' => 'sugar',
        'ご飯' => 'rice',
        '牛乳' => 'milk',
        'パン' => 'bread',
        'りんご' => 'apple',
        'レジ' => 'checkout',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 10, the Japanese twin of the
     * English "Unit 10: A Whole Shopping Trip" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'ユニット10: 買い物全体', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: リスト・牛乳', 1,
                pictures: [
                    [
                        'ja' => 'リスト',
                        'img' => 'list',
                    ],
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'ja' => '必要です',
                    ],
                    [
                        'ja' => '買う',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '牛乳',
                            'が',
                            '必要です',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need milk',
                                'correct' => [
                                    'I need',
                                    'milk',
                                ],
                                'extra' => [
                                    'to buy',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Necesito leche',
                                'correct' => [
                                    'necesito',
                                    'leche',
                                ],
                                'extra' => [
                                    'comprar',
                                    'lista',
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
                            '私の',
                            'リスト',
                            'で',
                            '買う',
                        ],
                        'blank' => 3,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Comprar con mi lista',
                                'correct' => [
                                    'comprar',
                                    'con',
                                    'mi',
                                    'lista',
                                ],
                                'extra' => [
                                    'necesito',
                                    'leche',
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
                            '買う',
                            'ため',
                            'に',
                            '私の',
                            'リスト',
                            'が',
                            '必要です',
                        ],
                        'blank' => 6,
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
                            'es' => [
                                'sentence' => 'Necesito mi lista para comprar',
                                'correct' => [
                                    'necesito',
                                    'mi',
                                    'lista',
                                    'para',
                                    'comprar',
                                ],
                                'extra' => [
                                    'leche',
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
            $builder->lesson('レッスン2: カート・ご飯', 2,
                pictures: [
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                    [
                        'ja' => 'ご飯',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'ja' => '入れる',
                    ],
                    [
                        'ja' => 'キロ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ご飯',
                            '一',
                            'キロ',
                            'を',
                            '入れる',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Poner un kilo de arroz',
                                'correct' => [
                                    'poner',
                                    'un',
                                    'kilo',
                                    'de',
                                    'arroz',
                                ],
                                'extra' => [
                                    'carrito',
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
                            'カート',
                            'は',
                            'いっぱい',
                            'です',
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El carrito está lleno',
                                'correct' => [
                                    'el',
                                    'carrito',
                                    'está',
                                    'lleno',
                                ],
                                'extra' => [
                                    'poner',
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
                            'ご飯',
                            'を',
                            'カート',
                            'に',
                            '入れる',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Poner el arroz en el carrito',
                                'correct' => [
                                    'poner',
                                    'el',
                                    'arroz',
                                    'en',
                                    'el',
                                    'carrito',
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
            $builder->lesson('レッスン3: 砂糖・パン', 3,
                pictures: [
                    [
                        'ja' => '砂糖',
                        'img' => 'sugar',
                    ],
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'パン屋',
                    ],
                    [
                        'ja' => '新鮮',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '新鮮な',
                            'パン',
                        ],
                        'blank' => 1,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Algo de pan fresco',
                                'correct' => [
                                    'algo de',
                                    'pan',
                                    'fresco',
                                ],
                                'extra' => [
                                    'panadería',
                                    'azúcar',
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
                            'パン屋',
                            'の',
                            '砂糖',
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Algo de azúcar de la panadería',
                                'correct' => [
                                    'algo de',
                                    'azúcar',
                                    'de',
                                    'la',
                                    'panadería',
                                ],
                                'extra' => [
                                    'fresco',
                                    'pan',
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
                            'パン屋',
                            'の',
                            '新鮮な',
                            'パン',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Pan fresco de la panadería',
                                'correct' => [
                                    'pan',
                                    'fresco',
                                    'de',
                                    'la',
                                    'panadería',
                                ],
                                'extra' => [
                                    'azúcar',
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
            $builder->lesson('レッスン4: レジ・りんご', 4,
                pictures: [
                    [
                        'ja' => 'レジ',
                        'img' => 'checkout',
                    ],
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'ja' => '払う',
                    ],
                    [
                        'ja' => 'レシート',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'レジ',
                            'で',
                            '払う',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pagar en la caja',
                                'correct' => [
                                    'pagar',
                                    'en',
                                    'la',
                                    'caja',
                                ],
                                'extra' => [
                                    'recibo',
                                    'manzana',
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
                            'りんご',
                            'の',
                            'レシート',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'El recibo por la manzana',
                                'correct' => [
                                    'el',
                                    'recibo',
                                    'para',
                                    'la',
                                    'manzana',
                                ],
                                'extra' => [
                                    'pagar',
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
                            'りんご',
                            'の',
                            '代金',
                            'を',
                            '払う',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Pagar por la manzana',
                                'correct' => [
                                    'pagar',
                                    'para',
                                    'la',
                                    'manzana',
                                ],
                                'extra' => [
                                    'recibo',
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
            $builder->lesson('レッスン5: カート・牛乳', 5,
                pictures: [
                    [
                        'ja' => 'カート',
                        'img' => 'cart',
                    ],
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'ja' => '運ぶ',
                    ],
                    [
                        'ja' => '家',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '牛乳',
                            'を',
                            '家',
                            'に',
                            '運ぶ',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Llevar la leche a la casa',
                                'correct' => [
                                    'llevar',
                                    'la',
                                    'leche',
                                    'a',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'carrito',
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
                            'カート',
                            'は',
                            '家',
                            'に',
                            'あります',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'El carrito está en la casa',
                                'correct' => [
                                    'el',
                                    'carrito',
                                    'está',
                                    'en',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'llevar',
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
                            'カート',
                            'を',
                            '家',
                            'に',
                            '運ぶ',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Llevar el carrito a la casa',
                                'correct' => [
                                    'llevar',
                                    'el',
                                    'carrito',
                                    'a',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'leche',
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
