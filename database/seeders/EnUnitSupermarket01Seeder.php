<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket01Seeder extends Seeder
{
    private const PICTURES = [
        'List' => 'list', 'Trolley' => 'cart', 'Aisle' => 'shelf', 'Basket' => 'basket',
        'Checkout' => 'checkout', 'Box' => 'box',
    ];

    /**
     * English Chapter 4, Unit 1 — walking into the shop.
     *
     * The last content chapter is deliberately a consolidation chapter: it adds
     * the shopping words a learner still needs (trolley, basket, aisle,
     * checkout) while putting Chapters 1-3 words back to work in a new setting.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Finding Your Way', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Shopping List', 1,
                pictures: [['en' => 'List', 'img' => 'list'], ['en' => 'Trolley', 'img' => 'cart']],
                plain: [['en' => 'Supermarket'], ['en' => 'To look for']],
                phrases: [
                    'a' => [
                        'words' => ['my', 'list', 'for', 'the', 'supermarket'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi lista para el supermercado', 'correct' => ['mi', 'lista', 'para', 'el', 'supermercado'], 'extra' => ['carrito']],
                            'de' => ['sentence' => 'Meine Liste für den Supermarkt', 'correct' => ['meine', 'Liste', 'für', 'den', 'Supermarkt'], 'extra' => ['Einkaufswagen']],
                            'ja' => ['sentence' => 'スーパーのための私のリスト', 'correct' => ['スーパー', 'の', 'ため', 'の', '私の', 'リスト'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '슈퍼마켓을 위한 제 목록', 'correct' => ['슈퍼마켓을', '위한', '제', '목록'], 'extra' => ['카트']],
                            'fr' => ['sentence' => 'Ma liste pour le supermarché', 'correct' => ['ma', 'liste', 'pour', 'le', 'supermarché'], 'extra' => ['chariot']],
                        ],
                    ],
                    'b' => [
                        'words' => ['to look for', 'a', 'trolley'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Buscar un carrito', 'correct' => ['buscar', 'un', 'carrito'], 'extra' => ['lista', 'supermercado']],
                            'de' => ['sentence' => 'Einen Einkaufswagen suchen', 'correct' => ['einen', 'Einkaufswagen', 'suchen'], 'extra' => ['Liste']],
                            'ja' => ['sentence' => 'カートを探す', 'correct' => ['カート', 'を', '探す'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '카트를 찾다', 'correct' => ['카트를', '찾다'], 'extra' => ['목록']],
                            'fr' => ['sentence' => 'Chercher un chariot', 'correct' => ['chercher', 'un', 'chariot'], 'extra' => ['liste']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'trolley', 'and', 'a', 'list'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un carrito y una lista', 'correct' => ['un', 'carrito', 'y', 'una', 'lista'], 'extra' => ['supermercado']],
                            'de' => ['sentence' => 'Ein Einkaufswagen und eine Liste', 'correct' => ['ein', 'Einkaufswagen', 'und', 'eine', 'Liste'], 'extra' => ['Supermarkt']],
                            'ja' => ['sentence' => 'カートとリスト', 'correct' => ['カート', 'と', 'リスト'], 'extra' => ['スーパー']],
                            'ko' => ['sentence' => '카트와 목록', 'correct' => ['카트와', '목록'], 'extra' => ['슈퍼마켓']],
                            'fr' => ['sentence' => 'Un chariot et une liste', 'correct' => ['un', 'chariot', 'et', 'une', 'liste'], 'extra' => ['supermarché']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Which Aisle', 2,
                pictures: [['en' => 'Aisle', 'img' => 'shelf'], ['en' => 'Basket', 'img' => 'basket']],
                plain: [['en' => 'To find'], ['en' => 'Where']],
                phrases: [
                    'a' => [
                        'words' => ['where', 'is', 'the', 'aisle'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dónde está el pasillo', 'correct' => ['dónde', 'está', 'el', 'pasillo'], 'extra' => ['encontrar', 'cesta']],
                            'de' => ['sentence' => 'Wo ist das Regal', 'correct' => ['wo', 'ist', 'das', 'Regal'], 'extra' => ['finden', 'Korb']],
                            'ja' => ['sentence' => '売り場はどこですか', 'correct' => ['売り場', 'は', 'どこですか'], 'extra' => ['見つける']],
                            'ko' => ['sentence' => '진열대는 어디입니까', 'correct' => ['진열대는', '어디입니까'], 'extra' => ['발견하다']],
                            'fr' => ['sentence' => 'Où est le rayon', 'correct' => ['où', 'est', 'le', 'rayon'], 'extra' => ['trouver', 'panier']],
                        ],
                    ],
                    'b' => [
                        'words' => ['to find', 'a', 'basket'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Encontrar una cesta', 'correct' => ['encontrar', 'una', 'cesta'], 'extra' => ['dónde', 'pasillo']],
                            'de' => ['sentence' => 'Einen Korb finden', 'correct' => ['einen', 'Korb', 'finden'], 'extra' => ['wo', 'Regal']],
                            'ja' => ['sentence' => 'かごを見つける', 'correct' => ['かご', 'を', '見つける'], 'extra' => ['売り場']],
                            'ko' => ['sentence' => '바구니를 발견하다', 'correct' => ['바구니를', '발견하다'], 'extra' => ['진열대']],
                            'fr' => ['sentence' => 'Trouver un panier', 'correct' => ['trouver', 'un', 'panier'], 'extra' => ['rayon']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to find', 'the', 'aisle'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Encontrar el pasillo', 'correct' => ['encontrar', 'el', 'pasillo'], 'extra' => ['dónde', 'cesta']],
                            'de' => ['sentence' => 'Das Regal finden', 'correct' => ['das', 'Regal', 'finden'], 'extra' => ['wo', 'Korb']],
                            'ja' => ['sentence' => '売り場を見つける', 'correct' => ['売り場', 'を', '見つける'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '진열대를 발견하다', 'correct' => ['진열대를', '발견하다'], 'extra' => ['바구니']],
                            'fr' => ['sentence' => 'Trouver le rayon', 'correct' => ['trouver', 'le', 'rayon'], 'extra' => ['panier']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Buying Here', 3,
                pictures: [['en' => 'Trolley', 'img' => 'cart'], ['en' => 'Checkout', 'img' => 'checkout']],
                plain: [['en' => 'Buy'], ['en' => 'Here']],
                phrases: [
                    'a' => [
                        'words' => ['buy', 'here'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comprar aquí', 'correct' => ['comprar', 'aquí'], 'extra' => ['caja', 'carrito']],
                            'de' => ['sentence' => 'Hier kaufen', 'correct' => ['hier', 'kaufen'], 'extra' => ['Kasse', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'ここで買う', 'correct' => ['ここ', 'で', '買う'], 'extra' => ['レジ']],
                            'ko' => ['sentence' => '여기서 사다', 'correct' => ['여기서', '사다'], 'extra' => ['계산대']],
                            'fr' => ['sentence' => 'Acheter ici', 'correct' => ['acheter', 'ici'], 'extra' => ['caisse', 'chariot']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'checkout', 'is', 'here'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La caja está aquí', 'correct' => ['la', 'caja', 'está', 'aquí'], 'extra' => ['comprar', 'carrito']],
                            'de' => ['sentence' => 'Die Kasse ist hier', 'correct' => ['die', 'Kasse', 'ist', 'hier'], 'extra' => ['kaufen', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'レジはここです', 'correct' => ['レジ', 'は', 'ここ', 'です'], 'extra' => ['買う']],
                            'ko' => ['sentence' => '계산대는 여기입니다', 'correct' => ['계산대는', '여기입니다'], 'extra' => ['사다']],
                            'fr' => ['sentence' => 'La caisse est ici', 'correct' => ['la', 'caisse', 'est', 'ici'], 'extra' => ['acheter']],
                        ],
                    ],
                    'c' => [
                        'words' => ['buy', 'with', 'a', 'trolley'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comprar con un carrito', 'correct' => ['comprar', 'con', 'un', 'carrito'], 'extra' => ['aquí', 'caja']],
                            'de' => ['sentence' => 'Mit einem Einkaufswagen kaufen', 'correct' => ['mit', 'einem', 'Einkaufswagen', 'kaufen'], 'extra' => ['hier', 'Kasse']],
                            'ja' => ['sentence' => 'カートで買う', 'correct' => ['カート', 'で', '買う'], 'extra' => ['ここ']],
                            'ko' => ['sentence' => '카트로 사다', 'correct' => ['카트로', '사다'], 'extra' => ['여기']],
                            'fr' => ['sentence' => 'Acheter avec un chariot', 'correct' => ['acheter', 'avec', 'un', 'chariot'], 'extra' => ['ici']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: I Need That', 4,
                pictures: [['en' => 'List', 'img' => 'list'], ['en' => 'Basket', 'img' => 'basket']],
                plain: [['en' => 'I need'], ['en' => 'Empty']],
                phrases: [
                    'a' => [
                        'words' => ['I need', 'bread'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Necesito pan', 'correct' => ['necesito', 'pan'], 'extra' => ['vacío', 'cesta']],
                            'de' => ['sentence' => 'Ich brauche Brot', 'correct' => ['ich brauche', 'Brot'], 'extra' => ['leer', 'Korb']],
                            'ja' => ['sentence' => 'パンが必要です', 'correct' => ['パン', 'が', '必要です'], 'extra' => ['空']],
                            'ko' => ['sentence' => '빵이 필요합니다', 'correct' => ['빵이', '필요합니다'], 'extra' => ['빈']],
                            'fr' => ['sentence' => "J'ai besoin de pain", 'correct' => ["j'ai besoin", 'pain'], 'extra' => ['vide', 'panier']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'basket', 'is', 'empty'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi cesta está vacía', 'correct' => ['mi', 'cesta', 'está', 'vacío'], 'extra' => ['necesito', 'lista']],
                            'de' => ['sentence' => 'Mein Korb ist leer', 'correct' => ['mein', 'Korb', 'ist', 'leer'], 'extra' => ['ich brauche', 'Liste']],
                            'ja' => ['sentence' => '私のかごは空です', 'correct' => ['私の', 'かご', 'は', '空', 'です'], 'extra' => ['必要']],
                            'ko' => ['sentence' => '제 바구니는 비었습니다', 'correct' => ['제', '바구니는', '비었습니다'], 'extra' => ['목록']],
                            'fr' => ['sentence' => 'Mon panier est vide', 'correct' => ['mon', 'panier', 'est', 'vide'], 'extra' => ['liste']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I need', 'my', 'list'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Necesito mi lista', 'correct' => ['necesito', 'mi', 'lista'], 'extra' => ['vacío', 'cesta']],
                            'de' => ['sentence' => 'Ich brauche meine Liste', 'correct' => ['ich brauche', 'meine', 'Liste'], 'extra' => ['leer', 'Korb']],
                            'ja' => ['sentence' => '私のリストが必要です', 'correct' => ['私の', 'リスト', 'が', '必要です'], 'extra' => ['空']],
                            'ko' => ['sentence' => '제 목록이 필요합니다', 'correct' => ['제', '목록이', '필요합니다'], 'extra' => ['빈']],
                            'fr' => ['sentence' => "J'ai besoin de ma liste", 'correct' => ["j'ai besoin", 'ma', 'liste'], 'extra' => ['vide']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Full and Heavy', 5,
                pictures: [['en' => 'Trolley', 'img' => 'cart'], ['en' => 'Basket', 'img' => 'basket']],
                plain: [['en' => 'Full'], ['en' => 'Heavy']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'trolley', 'is', 'full'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El carrito está lleno', 'correct' => ['el', 'carrito', 'está', 'lleno'], 'extra' => ['pesado', 'cesta']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist voll', 'correct' => ['der', 'Einkaufswagen', 'ist', 'voll'], 'extra' => ['schwer', 'Korb']],
                            'ja' => ['sentence' => 'カートはいっぱいです', 'correct' => ['カート', 'は', 'いっぱい', 'です'], 'extra' => ['重い']],
                            'ko' => ['sentence' => '카트는 가득합니다', 'correct' => ['카트는', '가득합니다'], 'extra' => ['무거운']],
                            'fr' => ['sentence' => 'Le chariot est plein', 'correct' => ['le', 'chariot', 'est', 'plein'], 'extra' => ['lourd', 'panier']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'basket', 'is', 'heavy'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La cesta está pesada', 'correct' => ['la', 'cesta', 'está', 'pesado'], 'extra' => ['lleno', 'carrito']],
                            'de' => ['sentence' => 'Der Korb ist schwer', 'correct' => ['der', 'Korb', 'ist', 'schwer'], 'extra' => ['voll', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'かごは重いです', 'correct' => ['かご', 'は', '重い', 'です'], 'extra' => ['いっぱい']],
                            'ko' => ['sentence' => '바구니는 무겁습니다', 'correct' => ['바구니는', '무겁습니다'], 'extra' => ['가득한']],
                            'fr' => ['sentence' => 'Le panier est lourd', 'correct' => ['le', 'panier', 'est', 'lourd'], 'extra' => ['plein']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'full', 'trolley', 'and', 'a', 'heavy', 'basket'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un carrito lleno y una cesta pesada', 'correct' => ['un', 'lleno', 'carrito', 'y', 'una', 'pesado', 'cesta'], 'extra' => ['está']],
                            'de' => ['sentence' => 'Ein voller Einkaufswagen und ein schwerer Korb', 'correct' => ['ein', 'voll', 'Einkaufswagen', 'und', 'ein', 'schwer', 'Korb'], 'extra' => ['ist']],
                            'ja' => ['sentence' => 'いっぱいのカートと重いかご', 'correct' => ['いっぱい', 'の', 'カート', 'と', '重い', 'かご'], 'extra' => ['です']],
                            'ko' => ['sentence' => '가득한 카트와 무거운 바구니', 'correct' => ['가득한', '카트와', '무거운', '바구니'], 'extra' => ['입니다']],
                            'fr' => ['sentence' => 'Un chariot plein et un panier lourd', 'correct' => ['un', 'chariot', 'plein', 'et', 'un', 'panier', 'lourd'], 'extra' => ['est']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
