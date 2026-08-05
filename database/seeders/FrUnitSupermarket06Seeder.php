<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket06Seeder extends Seeder
{
    private const PICTURES = [
        'Boîte' => 'box', 'Bouteille' => 'bottle', 'Balance' => 'scale', 'Jus' => 'juice',
        'Eau' => 'water', 'Sucre' => 'sugar', 'Chariot' => 'cart', 'Pomme' => 'apple',
    ];

    /**
     * French Chapter 4, Unit 6 — how much and in what.
     *
     * French forces a quantity word in front of almost everything you buy
     * ("un litre de", "une boîte de"), so this unit drills the container-plus-de
     * pattern until it is automatic, rather than teaching the units abstractly.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Quantities and Packaging', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Box and A Bottle', 1,
                pictures: [['fr' => 'Boîte', 'img' => 'box'], ['fr' => 'Bouteille', 'img' => 'bottle']],
                plain: [['fr' => 'Litre'], ['fr' => 'Jus']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'litre', 'de', 'jus'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A litre of juice', 'correct' => ['a', 'litre', 'of', 'juice'], 'extra' => ['box', 'bottle']],
                            'es' => ['sentence' => 'Un litro de zumo', 'correct' => ['un', 'litro', 'de', 'zumo'], 'extra' => ['caja', 'botella']],
                            'de' => ['sentence' => 'Ein Liter Saft', 'correct' => ['ein', 'Liter', 'von', 'Saft'], 'extra' => ['Schachtel', 'Flasche']],
                            'ja' => ['sentence' => 'ジュース一リットル', 'correct' => ['ジュース', '一', 'リットル'], 'extra' => ['箱', 'ボトル']],
                            'ko' => ['sentence' => '주스 일 리터', 'correct' => ['주스', '일', '리터'], 'extra' => ['상자', '병']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'boîte', 'et', 'une', 'bouteille'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A box and a bottle', 'correct' => ['a', 'box', 'and', 'a', 'bottle'], 'extra' => ['litre', 'juice']],
                            'es' => ['sentence' => 'Una caja y una botella', 'correct' => ['una', 'caja', 'y', 'una', 'botella'], 'extra' => ['litro', 'zumo']],
                            'de' => ['sentence' => 'Eine Schachtel und eine Flasche', 'correct' => ['eine', 'Schachtel', 'und', 'eine', 'Flasche'], 'extra' => ['Liter', 'Saft']],
                            'ja' => ['sentence' => '箱とボトル', 'correct' => ['箱', 'と', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '상자와 병', 'correct' => ['상자와', '병'], 'extra' => ['리터']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'bouteille', 'de', 'jus'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A bottle of juice', 'correct' => ['a', 'bottle', 'of', 'juice'], 'extra' => ['litre', 'box']],
                            'es' => ['sentence' => 'Una botella de zumo', 'correct' => ['una', 'botella', 'de', 'zumo'], 'extra' => ['litro', 'caja']],
                            'de' => ['sentence' => 'Eine Flasche Saft', 'correct' => ['eine', 'Flasche', 'von', 'Saft'], 'extra' => ['Liter', 'Schachtel']],
                            'ja' => ['sentence' => 'ジュースのボトル', 'correct' => ['ジュース', 'の', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '주스 한 병', 'correct' => ['주스', '한', '병'], 'extra' => ['리터']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: On the Scales', 2,
                pictures: [['fr' => 'Balance', 'img' => 'scale'], ['fr' => 'Pomme', 'img' => 'apple']],
                plain: [['fr' => 'Peser'], ['fr' => 'Gramme']],
                phrases: [
                    'a' => [
                        'words' => ['peser', 'une', 'pomme'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To weigh an apple', 'correct' => ['to weigh', 'an', 'apple'], 'extra' => ['gram', 'scales']],
                            'es' => ['sentence' => 'Pesar una manzana', 'correct' => ['pesar', 'una', 'manzana'], 'extra' => ['gramo', 'balanza']],
                            'de' => ['sentence' => 'Einen Apfel wiegen', 'correct' => ['einen', 'Apfel', 'wiegen'], 'extra' => ['Gramm', 'Waage']],
                            'ja' => ['sentence' => 'りんごを量る', 'correct' => ['りんご', 'を', '量る'], 'extra' => ['グラム', 'はかり']],
                            'ko' => ['sentence' => '사과의 무게를 재다', 'correct' => ['사과의', '무게를', '재다'], 'extra' => ['그램', '저울']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'balance', 'et', 'le', 'gramme'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The scales and the gram', 'correct' => ['the', 'scales', 'and', 'the', 'gram'], 'extra' => ['to weigh', 'apple']],
                            'es' => ['sentence' => 'La balanza y el gramo', 'correct' => ['la', 'balanza', 'y', 'el', 'gramo'], 'extra' => ['pesar', 'manzana']],
                            'de' => ['sentence' => 'Die Waage und das Gramm', 'correct' => ['die', 'Waage', 'und', 'das', 'Gramm'], 'extra' => ['wiegen', 'Apfel']],
                            'ja' => ['sentence' => 'はかりとグラム', 'correct' => ['はかり', 'と', 'グラム'], 'extra' => ['量る']],
                            'ko' => ['sentence' => '저울과 그램', 'correct' => ['저울과', '그램'], 'extra' => ['무게를 재다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['peser', 'sur', 'la', 'balance'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To weigh on the scales', 'correct' => ['to weigh', 'on', 'the', 'scales'], 'extra' => ['gram', 'apple']],
                            'es' => ['sentence' => 'Pesar sobre la balanza', 'correct' => ['pesar', 'sobre', 'la', 'balanza'], 'extra' => ['gramo', 'manzana']],
                            'de' => ['sentence' => 'Auf der Waage wiegen', 'correct' => ['auf', 'der', 'Waage', 'wiegen'], 'extra' => ['Gramm', 'Apfel']],
                            'ja' => ['sentence' => 'はかりの上で量る', 'correct' => ['はかり', 'の', '上', 'で', '量る'], 'extra' => ['グラム']],
                            'ko' => ['sentence' => '저울 위에서 무게를 재다', 'correct' => ['저울', '위에서', '무게를', '재다'], 'extra' => ['그램']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: A Box of Sugar', 3,
                pictures: [['fr' => 'Sucre', 'img' => 'sugar'], ['fr' => 'Boîte', 'img' => 'box']],
                plain: [['fr' => 'Petit'], ['fr' => 'Grand']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'boîte', 'de', 'sucre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A box of sugar', 'correct' => ['a', 'box', 'of', 'sugar'], 'extra' => ['small', 'big']],
                            'es' => ['sentence' => 'Una caja de azúcar', 'correct' => ['una', 'caja', 'de', 'azúcar'], 'extra' => ['pequeño', 'grande']],
                            'de' => ['sentence' => 'Eine Schachtel Zucker', 'correct' => ['eine', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein', 'groß']],
                            'ja' => ['sentence' => '砂糖の箱', 'correct' => ['砂糖', 'の', '箱'], 'extra' => ['小さい', '大きい']],
                            'ko' => ['sentence' => '설탕 한 상자', 'correct' => ['설탕', '한', '상자'], 'extra' => ['작은', '큰']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'petit', 'boîte'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A small box', 'correct' => ['a', 'small', 'box'], 'extra' => ['big', 'sugar']],
                            'es' => ['sentence' => 'Una caja pequeña', 'correct' => ['una', 'pequeño', 'caja'], 'extra' => ['grande', 'azúcar']],
                            'de' => ['sentence' => 'Eine kleine Schachtel', 'correct' => ['eine', 'klein', 'Schachtel'], 'extra' => ['groß', 'Zucker']],
                            'ja' => ['sentence' => '小さい箱', 'correct' => ['小さい', '箱'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 상자', 'correct' => ['작은', '상자'], 'extra' => ['큰']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'grand', 'boîte', 'de', 'sucre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A big box of sugar', 'correct' => ['a', 'big', 'box', 'of', 'sugar'], 'extra' => ['small']],
                            'es' => ['sentence' => 'Una caja grande de azúcar', 'correct' => ['una', 'caja', 'grande', 'de', 'azúcar'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Eine große Schachtel Zucker', 'correct' => ['eine', 'groß', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '大きい砂糖の箱', 'correct' => ['大きい', '砂糖', 'の', '箱'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '큰 설탕 상자', 'correct' => ['큰', '설탕', '상자'], 'extra' => ['작은']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Water by the Litre', 4,
                pictures: [['fr' => 'Eau', 'img' => 'water'], ['fr' => 'Bouteille', 'img' => 'bottle']],
                plain: [['fr' => 'Litre'], ['fr' => 'Deux']],
                phrases: [
                    'a' => [
                        'words' => ['deux', 'litre', "d'eau"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Two litres of water', 'correct' => ['two', 'litre', 'of water'], 'extra' => ['bottle']],
                            'es' => ['sentence' => 'Dos litros de agua', 'correct' => ['dos', 'litro', 'de agua'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Zwei Liter Wasser', 'correct' => ['zwei', 'Liter', 'Wasser'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '水二リットル', 'correct' => ['水', '二', 'リットル'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '물 이 리터', 'correct' => ['물', '이', '리터'], 'extra' => ['병']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'bouteille', "d'eau"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A bottle of water', 'correct' => ['a', 'bottle', 'of water'], 'extra' => ['two', 'litre']],
                            'es' => ['sentence' => 'Una botella de agua', 'correct' => ['una', 'botella', 'de agua'], 'extra' => ['dos', 'litro']],
                            'de' => ['sentence' => 'Eine Flasche Wasser', 'correct' => ['eine', 'Flasche', 'Wasser'], 'extra' => ['zwei', 'Liter']],
                            'ja' => ['sentence' => '水のボトル', 'correct' => ['水', 'の', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '물 한 병', 'correct' => ['물', '한', '병'], 'extra' => ['리터']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'eau', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A water, please', 'correct' => ['a', 'water', 'please'], 'extra' => ['two', 'litre']],
                            'es' => ['sentence' => 'Un agua, por favor', 'correct' => ['un', 'agua', 'por favor'], 'extra' => ['dos', 'litro']],
                            'de' => ['sentence' => 'Ein Wasser, bitte', 'correct' => ['ein', 'Wasser', 'bitte'], 'extra' => ['zwei', 'Liter']],
                            'ja' => ['sentence' => '水をお願いします', 'correct' => ['水', 'を', 'お願いします'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '물 부탁합니다', 'correct' => ['물', '부탁합니다'], 'extra' => ['리터']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Full Trolley', 5,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Jus', 'img' => 'juice']],
                plain: [['fr' => 'Mettre'], ['fr' => 'Boîte']],
                phrases: [
                    'a' => [
                        'words' => ['mettre', 'une', 'boîte', 'dans', 'le', 'chariot'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To put a box in the trolley', 'correct' => ['to put', 'a', 'box', 'in', 'the', 'trolley'], 'extra' => ['juice']],
                            'es' => ['sentence' => 'Poner una caja en el carrito', 'correct' => ['poner', 'una', 'caja', 'en', 'el', 'carrito'], 'extra' => ['zumo']],
                            'de' => ['sentence' => 'Eine Schachtel in den Einkaufswagen legen', 'correct' => ['eine', 'Schachtel', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Saft']],
                            'ja' => ['sentence' => '箱をカートに入れる', 'correct' => ['箱', 'を', 'カート', 'に', '入れる'], 'extra' => ['ジュース']],
                            'ko' => ['sentence' => '상자를 카트에 넣다', 'correct' => ['상자를', '카트에', '넣다'], 'extra' => ['주스']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'boîte', 'de', 'jus'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A box of juice', 'correct' => ['a', 'box', 'of', 'juice'], 'extra' => ['to put', 'trolley']],
                            'es' => ['sentence' => 'Una caja de zumo', 'correct' => ['una', 'caja', 'de', 'zumo'], 'extra' => ['poner', 'carrito']],
                            'de' => ['sentence' => 'Eine Schachtel Saft', 'correct' => ['eine', 'Schachtel', 'von', 'Saft'], 'extra' => ['legen', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'ジュースの箱', 'correct' => ['ジュース', 'の', '箱'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '주스 한 상자', 'correct' => ['주스', '한', '상자'], 'extra' => ['넣다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mettre', 'du', 'jus', 'dans', 'le', 'chariot'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To put some juice in the trolley', 'correct' => ['to put', 'some', 'juice', 'in', 'the', 'trolley'], 'extra' => ['box']],
                            'es' => ['sentence' => 'Poner zumo en el carrito', 'correct' => ['poner', 'algo de', 'zumo', 'en', 'el', 'carrito'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Etwas Saft in den Einkaufswagen legen', 'correct' => ['etwas', 'Saft', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Schachtel']],
                            'ja' => ['sentence' => 'ジュースをカートに入れる', 'correct' => ['ジュース', 'を', 'カート', 'に', '入れる'], 'extra' => ['箱']],
                            'ko' => ['sentence' => '주스를 카트에 넣다', 'correct' => ['주스를', '카트에', '넣다'], 'extra' => ['상자']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
