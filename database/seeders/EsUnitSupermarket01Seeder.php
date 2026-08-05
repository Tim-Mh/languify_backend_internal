<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket01Seeder extends Seeder
{
    private const PICTURES = [
        'lista' => 'list',
        'carrito' => 'cart',
        'pasillo' => 'shelf',
        'cesta' => 'basket',
        'caja' => 'box',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 1, the Spanish twin of the
     * English "Unit 1: Finding Your Way" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unidad 1: Orientarse', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Lista y Carrito', 1,
                pictures: [
                    [
                        'es' => 'lista',
                        'img' => 'list',
                    ],
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                ],
                plain: [
                    [
                        'es' => 'supermercado',
                    ],
                    [
                        'es' => 'buscar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mi',
                            'lista',
                            'para',
                            'el',
                            'supermercado',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my list for the supermarket',
                                'correct' => [
                                    'my',
                                    'list',
                                    'for',
                                    'the',
                                    'supermarket',
                                ],
                                'extra' => [
                                    'trolley',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Liste für den Supermarkt',
                                'correct' => [
                                    'meine',
                                    'Liste',
                                    'für',
                                    'den',
                                    'Supermarkt',
                                ],
                                'extra' => [
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma liste pour le supermarché',
                                'correct' => [
                                    'ma',
                                    'liste',
                                    'pour',
                                    'le',
                                    'supermarché',
                                ],
                                'extra' => [
                                    'chariot',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'スーパーのための私のリスト',
                                'correct' => [
                                    'スーパー',
                                    'の',
                                    'ため',
                                    'の',
                                    '私の',
                                    'リスト',
                                ],
                                'extra' => [
                                    'カート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '슈퍼마켓을 위한 제 목록',
                                'correct' => [
                                    '슈퍼마켓을',
                                    '위한',
                                    '제',
                                    '목록',
                                ],
                                'extra' => [
                                    '카트',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Buscar',
                            'un',
                            'carrito',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to look for a trolley',
                                'correct' => [
                                    'to look for',
                                    'a',
                                    'trolley',
                                ],
                                'extra' => [
                                    'list',
                                    'supermarket',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Einkaufswagen suchen',
                                'correct' => [
                                    'einen',
                                    'Einkaufswagen',
                                    'suchen',
                                ],
                                'extra' => [
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Chercher un chariot',
                                'correct' => [
                                    'chercher',
                                    'un',
                                    'chariot',
                                ],
                                'extra' => [
                                    'liste',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートを探す',
                                'correct' => [
                                    'カート',
                                    'を',
                                    '探す',
                                ],
                                'extra' => [
                                    'リスト',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트를 찾다',
                                'correct' => [
                                    '카트를',
                                    '찾다',
                                ],
                                'extra' => [
                                    '목록',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'carrito',
                            'y',
                            'una',
                            'lista',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a trolley and a list',
                                'correct' => [
                                    'a',
                                    'trolley',
                                    'and',
                                    'a',
                                    'list',
                                ],
                                'extra' => [
                                    'supermarket',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Einkaufswagen und eine Liste',
                                'correct' => [
                                    'ein',
                                    'Einkaufswagen',
                                    'und',
                                    'eine',
                                    'Liste',
                                ],
                                'extra' => [
                                    'Supermarkt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chariot et une liste',
                                'correct' => [
                                    'un',
                                    'chariot',
                                    'et',
                                    'une',
                                    'liste',
                                ],
                                'extra' => [
                                    'supermarché',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートとリスト',
                                'correct' => [
                                    'カート',
                                    'と',
                                    'リスト',
                                ],
                                'extra' => [
                                    'スーパー',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트와 목록',
                                'correct' => [
                                    '카트와',
                                    '목록',
                                ],
                                'extra' => [
                                    '슈퍼마켓',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Pasillo y Cesta', 2,
                pictures: [
                    [
                        'es' => 'pasillo',
                        'img' => 'shelf',
                    ],
                    [
                        'es' => 'cesta',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'es' => 'encontrar',
                    ],
                    [
                        'es' => 'dónde',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Dónde',
                            'está',
                            'el',
                            'pasillo',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'where is the aisle',
                                'correct' => [
                                    'where',
                                    'is',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'to find',
                                    'basket',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wo ist das Regal',
                                'correct' => [
                                    'wo',
                                    'ist',
                                    'das',
                                    'Regal',
                                ],
                                'extra' => [
                                    'finden',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Où est le rayon',
                                'correct' => [
                                    'où',
                                    'est',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'trouver',
                                    'panier',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '売り場はどこですか',
                                'correct' => [
                                    '売り場',
                                    'は',
                                    'どこですか',
                                ],
                                'extra' => [
                                    '見つける',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대는 어디입니까',
                                'correct' => [
                                    '진열대는',
                                    '어디입니까',
                                ],
                                'extra' => [
                                    '발견하다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Encontrar',
                            'una',
                            'cesta',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to find a basket',
                                'correct' => [
                                    'to find',
                                    'a',
                                    'basket',
                                ],
                                'extra' => [
                                    'where',
                                    'aisle',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Korb finden',
                                'correct' => [
                                    'einen',
                                    'Korb',
                                    'finden',
                                ],
                                'extra' => [
                                    'wo',
                                    'Regal',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trouver un panier',
                                'correct' => [
                                    'trouver',
                                    'un',
                                    'panier',
                                ],
                                'extra' => [
                                    'rayon',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'かごを見つける',
                                'correct' => [
                                    'かご',
                                    'を',
                                    '見つける',
                                ],
                                'extra' => [
                                    '売り場',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바구니를 발견하다',
                                'correct' => [
                                    '바구니를',
                                    '발견하다',
                                ],
                                'extra' => [
                                    '진열대',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Encontrar',
                            'el',
                            'pasillo',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to find the aisle',
                                'correct' => [
                                    'to find',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'where',
                                    'basket',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Regal finden',
                                'correct' => [
                                    'das',
                                    'Regal',
                                    'finden',
                                ],
                                'extra' => [
                                    'wo',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trouver le rayon',
                                'correct' => [
                                    'trouver',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'panier',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '売り場を見つける',
                                'correct' => [
                                    '売り場',
                                    'を',
                                    '見つける',
                                ],
                                'extra' => [
                                    'かご',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대를 발견하다',
                                'correct' => [
                                    '진열대를',
                                    '발견하다',
                                ],
                                'extra' => [
                                    '바구니',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Carrito y Caja', 3,
                pictures: [
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                    [
                        'es' => 'caja',
                        'img' => 'checkout',
                    ],
                ],
                plain: [
                    [
                        'es' => 'comprar',
                    ],
                    [
                        'es' => 'aquí',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Comprar',
                            'aquí',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy here',
                                'correct' => [
                                    'buy',
                                    'here',
                                ],
                                'extra' => [
                                    'checkout',
                                    'trolley',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hier kaufen',
                                'correct' => [
                                    'hier',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'Kasse',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter ici',
                                'correct' => [
                                    'acheter',
                                    'ici',
                                ],
                                'extra' => [
                                    'caisse',
                                    'chariot',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ここで買う',
                                'correct' => [
                                    'ここ',
                                    'で',
                                    '買う',
                                ],
                                'extra' => [
                                    'レジ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여기서 사다',
                                'correct' => [
                                    '여기서',
                                    '사다',
                                ],
                                'extra' => [
                                    '계산대',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'caja',
                            'está',
                            'aquí',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the checkout is here',
                                'correct' => [
                                    'the',
                                    'checkout',
                                    'is',
                                    'here',
                                ],
                                'extra' => [
                                    'to buy',
                                    'trolley',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Kasse ist hier',
                                'correct' => [
                                    'die',
                                    'Kasse',
                                    'ist',
                                    'hier',
                                ],
                                'extra' => [
                                    'kaufen',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La caisse est ici',
                                'correct' => [
                                    'la',
                                    'caisse',
                                    'est',
                                    'ici',
                                ],
                                'extra' => [
                                    'acheter',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'レジはここです',
                                'correct' => [
                                    'レジ',
                                    'は',
                                    'ここ',
                                    'です',
                                ],
                                'extra' => [
                                    '買う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산대는 여기입니다',
                                'correct' => [
                                    '계산대는',
                                    '여기입니다',
                                ],
                                'extra' => [
                                    '사다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Comprar',
                            'con',
                            'un',
                            'carrito',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy with a trolley',
                                'correct' => [
                                    'buy',
                                    'with',
                                    'a',
                                    'trolley',
                                ],
                                'extra' => [
                                    'here',
                                    'checkout',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mit einem Einkaufswagen kaufen',
                                'correct' => [
                                    'mit',
                                    'einem',
                                    'Einkaufswagen',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'hier',
                                    'Kasse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter avec un chariot',
                                'correct' => [
                                    'acheter',
                                    'avec',
                                    'un',
                                    'chariot',
                                ],
                                'extra' => [
                                    'ici',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートで買う',
                                'correct' => [
                                    'カート',
                                    'で',
                                    '買う',
                                ],
                                'extra' => [
                                    'ここ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트로 사다',
                                'correct' => [
                                    '카트로',
                                    '사다',
                                ],
                                'extra' => [
                                    '여기',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Lista y Cesta', 4,
                pictures: [
                    [
                        'es' => 'lista',
                        'img' => 'list',
                    ],
                    [
                        'es' => 'cesta',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'es' => 'necesito',
                    ],
                    [
                        'es' => 'vacío',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Necesito',
                            'pan',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need bread',
                                'correct' => [
                                    'I need',
                                    'bread',
                                ],
                                'extra' => [
                                    'empty',
                                    'basket',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich brauche Brot',
                                'correct' => [
                                    'ich brauche',
                                    'Brot',
                                ],
                                'extra' => [
                                    'leer',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de pain',
                                'correct' => [
                                    'j\'ai besoin',
                                    'pain',
                                ],
                                'extra' => [
                                    'vide',
                                    'panier',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'パンが必要です',
                                'correct' => [
                                    'パン',
                                    'が',
                                    '必要です',
                                ],
                                'extra' => [
                                    '空',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵이 필요합니다',
                                'correct' => [
                                    '빵이',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '빈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'cesta',
                            'está',
                            'vacía',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my basket is empty',
                                'correct' => [
                                    'my',
                                    'basket',
                                    'is',
                                    'empty',
                                ],
                                'extra' => [
                                    'I need',
                                    'list',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mein Korb ist leer',
                                'correct' => [
                                    'mein',
                                    'Korb',
                                    'ist',
                                    'leer',
                                ],
                                'extra' => [
                                    'ich brauche',
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon panier est vide',
                                'correct' => [
                                    'mon',
                                    'panier',
                                    'est',
                                    'vide',
                                ],
                                'extra' => [
                                    'liste',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私のかごは空です',
                                'correct' => [
                                    '私の',
                                    'かご',
                                    'は',
                                    '空',
                                    'です',
                                ],
                                'extra' => [
                                    '必要',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 바구니는 비었습니다',
                                'correct' => [
                                    '제',
                                    '바구니는',
                                    '비었습니다',
                                ],
                                'extra' => [
                                    '목록',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Necesito',
                            'mi',
                            'lista',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need my list',
                                'correct' => [
                                    'I need',
                                    'my',
                                    'list',
                                ],
                                'extra' => [
                                    'empty',
                                    'basket',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich brauche meine Liste',
                                'correct' => [
                                    'ich brauche',
                                    'meine',
                                    'Liste',
                                ],
                                'extra' => [
                                    'leer',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de ma liste',
                                'correct' => [
                                    'j\'ai besoin',
                                    'ma',
                                    'liste',
                                ],
                                'extra' => [
                                    'vide',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私のリストが必要です',
                                'correct' => [
                                    '私の',
                                    'リスト',
                                    'が',
                                    '必要です',
                                ],
                                'extra' => [
                                    '空',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 목록이 필요합니다',
                                'correct' => [
                                    '제',
                                    '목록이',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '빈',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Carrito y Cesta', 5,
                pictures: [
                    [
                        'es' => 'carrito',
                        'img' => 'cart',
                    ],
                    [
                        'es' => 'cesta',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'es' => 'lleno',
                    ],
                    [
                        'es' => 'pesado',
                    ],
                ],
                phrases: [
                    'a' => [
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
                                    'heavy',
                                    'basket',
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
                                    'schwer',
                                    'Korb',
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
                                    'lourd',
                                    'panier',
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
                                    '重い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트는 가득합니다',
                                'correct' => [
                                    '카트는',
                                    '가득합니다',
                                ],
                                'extra' => [
                                    '무거운',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'cesta',
                            'está',
                            'pesada',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the basket is heavy',
                                'correct' => [
                                    'the',
                                    'basket',
                                    'is',
                                    'heavy',
                                ],
                                'extra' => [
                                    'full',
                                    'trolley',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Korb ist schwer',
                                'correct' => [
                                    'der',
                                    'Korb',
                                    'ist',
                                    'schwer',
                                ],
                                'extra' => [
                                    'voll',
                                    'Einkaufswagen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le panier est lourd',
                                'correct' => [
                                    'le',
                                    'panier',
                                    'est',
                                    'lourd',
                                ],
                                'extra' => [
                                    'plein',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'かごは重いです',
                                'correct' => [
                                    'かご',
                                    'は',
                                    '重い',
                                    'です',
                                ],
                                'extra' => [
                                    'いっぱい',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바구니는 무겁습니다',
                                'correct' => [
                                    '바구니는',
                                    '무겁습니다',
                                ],
                                'extra' => [
                                    '가득한',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'carrito',
                            'lleno',
                            'y',
                            'una',
                            'cesta',
                            'pesada',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a full trolley and a heavy basket',
                                'correct' => [
                                    'a',
                                    'full',
                                    'trolley',
                                    'and',
                                    'a',
                                    'heavy',
                                    'basket',
                                ],
                                'extra' => [],
                            ],
                            'de' => [
                                'sentence' => 'Ein voller Einkaufswagen und ein schwerer Korb',
                                'correct' => [
                                    'ein',
                                    'voll',
                                    'Einkaufswagen',
                                    'und',
                                    'ein',
                                    'schwer',
                                    'Korb',
                                ],
                                'extra' => [
                                    'ist',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un chariot plein et un panier lourd',
                                'correct' => [
                                    'un',
                                    'chariot',
                                    'plein',
                                    'et',
                                    'un',
                                    'panier',
                                    'lourd',
                                ],
                                'extra' => [
                                    'est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'いっぱいのカートと重いかご',
                                'correct' => [
                                    'いっぱい',
                                    'の',
                                    'カート',
                                    'と',
                                    '重い',
                                    'かご',
                                ],
                                'extra' => [
                                    'です',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가득한 카트와 무거운 바구니',
                                'correct' => [
                                    '가득한',
                                    '카트와',
                                    '무거운',
                                    '바구니',
                                ],
                                'extra' => [
                                    '입니다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
