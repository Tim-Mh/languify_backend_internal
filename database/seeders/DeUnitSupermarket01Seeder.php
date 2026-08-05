<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket01Seeder extends Seeder
{
    private const PICTURES = [
        'Liste' => 'list',
        'Einkaufswagen' => 'cart',
        'Regal' => 'shelf',
        'Korb' => 'basket',
        'Kasse' => 'checkout',
        'Schachtel' => 'box',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 1, the German twin of the
     * English "Unit 1: Finding Your Way" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Einheit 1: Sich zurechtfinden', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Liste & Einkaufswagen', 1,
                pictures: [
                    [
                        'de' => 'Liste',
                        'img' => 'list',
                    ],
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Supermarkt',
                    ],
                    [
                        'de' => 'suchen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Meine',
                            'Liste',
                            'für',
                            'den',
                            'Supermarkt',
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
                            'es' => [
                                'sentence' => 'Mi lista para el supermercado',
                                'correct' => [
                                    'mi',
                                    'lista',
                                    'para',
                                    'el',
                                    'supermercado',
                                ],
                                'extra' => [
                                    'carrito',
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
                            'Einen',
                            'Einkaufswagen',
                            'suchen',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Buscar un carrito',
                                'correct' => [
                                    'buscar',
                                    'un',
                                    'carrito',
                                ],
                                'extra' => [
                                    'lista',
                                    'supermercado',
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
                            'Ein',
                            'Einkaufswagen',
                            'und',
                            'eine',
                            'Liste',
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
                            'es' => [
                                'sentence' => 'Un carrito y una lista',
                                'correct' => [
                                    'un',
                                    'carrito',
                                    'y',
                                    'una',
                                    'lista',
                                ],
                                'extra' => [
                                    'supermercado',
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
            $builder->lesson('Lektion 2: Regal & Korb', 2,
                pictures: [
                    [
                        'de' => 'Regal',
                        'img' => 'shelf',
                    ],
                    [
                        'de' => 'Korb',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'de' => 'finden',
                    ],
                    [
                        'de' => 'wo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Wo',
                            'ist',
                            'das',
                            'Regal',
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
                            'es' => [
                                'sentence' => 'Dónde está el pasillo',
                                'correct' => [
                                    'dónde',
                                    'está',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'encontrar',
                                    'cesta',
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
                            'Einen',
                            'Korb',
                            'finden',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Encontrar una cesta',
                                'correct' => [
                                    'encontrar',
                                    'una',
                                    'cesta',
                                ],
                                'extra' => [
                                    'dónde',
                                    'pasillo',
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
                            'Das',
                            'Regal',
                            'finden',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Encontrar el pasillo',
                                'correct' => [
                                    'encontrar',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'dónde',
                                    'cesta',
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
            $builder->lesson('Lektion 3: Einkaufswagen & Kasse', 3,
                pictures: [
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                    [
                        'de' => 'Kasse',
                        'img' => 'checkout',
                    ],
                ],
                plain: [
                    [
                        'de' => 'kaufen',
                    ],
                    [
                        'de' => 'hier',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hier',
                            'kaufen',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Comprar aquí',
                                'correct' => [
                                    'comprar',
                                    'aquí',
                                ],
                                'extra' => [
                                    'caja',
                                    'carrito',
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
                            'Die',
                            'Kasse',
                            'ist',
                            'hier',
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
                            'es' => [
                                'sentence' => 'La caja está aquí',
                                'correct' => [
                                    'la',
                                    'caja',
                                    'está',
                                    'aquí',
                                ],
                                'extra' => [
                                    'comprar',
                                    'carrito',
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
                            'Mit',
                            'einem',
                            'Einkaufswagen',
                            'kaufen',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Comprar con un carrito',
                                'correct' => [
                                    'comprar',
                                    'con',
                                    'un',
                                    'carrito',
                                ],
                                'extra' => [
                                    'aquí',
                                    'caja',
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
            $builder->lesson('Lektion 4: Liste & Korb', 4,
                pictures: [
                    [
                        'de' => 'Liste',
                        'img' => 'list',
                    ],
                    [
                        'de' => 'Korb',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich brauche',
                    ],
                    [
                        'de' => 'leer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'brauche',
                            'Brot',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Necesito pan',
                                'correct' => [
                                    'necesito',
                                    'pan',
                                ],
                                'extra' => [
                                    'vacío',
                                    'cesta',
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
                            'Mein',
                            'Korb',
                            'ist',
                            'leer',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Mi cesta está vacía',
                                'correct' => [
                                    'mi',
                                    'cesta',
                                    'está',
                                    'vacío',
                                ],
                                'extra' => [
                                    'necesito',
                                    'lista',
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
                            'Ich',
                            'brauche',
                            'meine',
                            'Liste',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Necesito mi lista',
                                'correct' => [
                                    'necesito',
                                    'mi',
                                    'lista',
                                ],
                                'extra' => [
                                    'vacío',
                                    'cesta',
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
            $builder->lesson('Lektion 5: Einkaufswagen & Korb', 5,
                pictures: [
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                    [
                        'de' => 'Korb',
                        'img' => 'basket',
                    ],
                ],
                plain: [
                    [
                        'de' => 'voll',
                    ],
                    [
                        'de' => 'schwer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Einkaufswagen',
                            'ist',
                            'voll',
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
                                    'hard',
                                    'basket',
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
                                    'pesado',
                                    'cesta',
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
                            'Der',
                            'Korb',
                            'ist',
                            'schwer',
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
                            'es' => [
                                'sentence' => 'La cesta está pesada',
                                'correct' => [
                                    'la',
                                    'cesta',
                                    'está',
                                    'pesado',
                                ],
                                'extra' => [
                                    'lleno',
                                    'carrito',
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
                            'Ein',
                            'voller',
                            'Einkaufswagen',
                            'und',
                            'ein',
                            'schwerer',
                            'Korb',
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
                                'extra' => [
                                    'is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Un carrito lleno y una cesta pesada',
                                'correct' => [
                                    'un',
                                    'lleno',
                                    'carrito',
                                    'y',
                                    'una',
                                    'pesado',
                                    'cesta',
                                ],
                                'extra' => [
                                    'está',
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
