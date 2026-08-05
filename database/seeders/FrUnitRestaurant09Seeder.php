<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = [
        'Fourchette' => 'fork', 'Couteau' => 'knife', 'Cuillère' => 'spoon',
        'Assiette' => 'plate', 'Verre' => 'glass', 'Menu' => 'menu',
        'Riz' => 'rice', 'Soupe' => 'soup',
    ];

    /**
     * French Chapter 3, Unit 9 — asking for things at the table.
     *
     * Everything a learner might need to ask for mid-meal, wrapped in the two
     * polite frames that work for all of it: "apportez-moi ..." and
     * "pouvez-vous ...". The cutlery words are the only genuinely new nouns, so
     * most of the effort lands on the request itself.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: At the Table', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Fork and Knife', 1,
                pictures: [['fr' => 'Fourchette', 'img' => 'fork'], ['fr' => 'Couteau', 'img' => 'knife']],
                plain: [['fr' => 'Apportez-moi'], ['fr' => 'Serviette']],
                phrases: [
                    'a' => [
                        'words' => ['apportez-moi', 'une', 'fourchette'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Bring me a fork', 'correct' => ['bring me', 'a', 'fork'], 'extra' => ['napkin', 'knife']],
                            'es' => ['sentence' => 'Tráigame un tenedor', 'correct' => ['tráigame', 'un', 'tenedor'], 'extra' => ['servilleta', 'cuchillo']],
                            'de' => ['sentence' => 'Bringen Sie mir eine Gabel', 'correct' => ['bringen Sie mir', 'eine', 'Gabel'], 'extra' => ['Serviette', 'Messer']],
                            'ja' => ['sentence' => 'フォークを持ってきてください', 'correct' => ['フォーク', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '포크를 가져다주세요', 'correct' => ['포크를', '가져다주세요'], 'extra' => ['냅킨']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'couteau', 'et', 'une', 'serviette'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A knife and a napkin', 'correct' => ['a', 'knife', 'and', 'a', 'napkin'], 'extra' => ['bring me', 'fork']],
                            'es' => ['sentence' => 'Un cuchillo y una servilleta', 'correct' => ['un', 'cuchillo', 'y', 'una', 'servilleta'], 'extra' => ['tráigame', 'tenedor']],
                            'de' => ['sentence' => 'Ein Messer und eine Serviette', 'correct' => ['ein', 'Messer', 'und', 'eine', 'Serviette'], 'extra' => ['bringen Sie mir', 'Gabel']],
                            'ja' => ['sentence' => 'ナイフとナプキン', 'correct' => ['ナイフ', 'と', 'ナプキン'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '나이프와 냅킨', 'correct' => ['나이프와', '냅킨'], 'extra' => ['포크']],
                        ],
                    ],
                    'c' => [
                        'words' => ['apportez-moi', 'un', 'couteau', 'propre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Bring me a clean knife', 'correct' => ['bring me', 'a', 'clean', 'knife'], 'extra' => ['napkin', 'fork']],
                            'es' => ['sentence' => 'Tráigame un cuchillo limpio', 'correct' => ['tráigame', 'un', 'cuchillo', 'limpio'], 'extra' => ['servilleta', 'tenedor']],
                            'de' => ['sentence' => 'Bringen Sie mir ein sauberes Messer', 'correct' => ['bringen Sie mir', 'ein', 'sauber', 'Messer'], 'extra' => ['Serviette', 'Gabel']],
                            'ja' => ['sentence' => 'きれいなナイフを持ってきてください', 'correct' => ['きれいな', 'ナイフ', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '깨끗한 나이프를 가져다주세요', 'correct' => ['깨끗한', '나이프를', '가져다주세요'], 'extra' => ['냅킨']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Spoon and Plate', 2,
                pictures: [['fr' => 'Cuillère', 'img' => 'spoon'], ['fr' => 'Assiette', 'img' => 'plate']],
                plain: [['fr' => 'Pouvez-vous'], ['fr' => 'Nappe']],
                phrases: [
                    'a' => [
                        'words' => ['pouvez-vous', 'apporter', 'une', 'cuillère'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Can you bring a spoon', 'correct' => ['can you', 'bring', 'a', 'spoon'], 'extra' => ['tablecloth', 'plate']],
                            'es' => ['sentence' => 'Puede usted traer una cuchara', 'correct' => ['puede usted', 'traer', 'una', 'cuchara'], 'extra' => ['mantel', 'plato']],
                            'de' => ['sentence' => 'Können Sie einen Löffel bringen', 'correct' => ['können Sie', 'einen', 'Löffel', 'bringen'], 'extra' => ['Tischdecke', 'Teller']],
                            'ja' => ['sentence' => 'スプーンを持ってきてもらえますか', 'correct' => ['スプーン', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['テーブルクロス']],
                            'ko' => ['sentence' => '숟가락을 가져올 수 있나요', 'correct' => ['숟가락을', '가져올', '수', '있나요'], 'extra' => ['식탁보']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'assiette', 'sur', 'la', 'nappe'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A plate on the tablecloth', 'correct' => ['a', 'plate', 'on', 'the', 'tablecloth'], 'extra' => ['can you', 'spoon']],
                            'es' => ['sentence' => 'Un plato sobre el mantel', 'correct' => ['un', 'plato', 'sobre', 'el', 'mantel'], 'extra' => ['puede usted', 'cuchara']],
                            'de' => ['sentence' => 'Ein Teller auf der Tischdecke', 'correct' => ['ein', 'Teller', 'auf', 'der', 'Tischdecke'], 'extra' => ['können Sie', 'Löffel']],
                            'ja' => ['sentence' => 'テーブルクロスの上のお皿', 'correct' => ['テーブルクロス', 'の', '上', 'の', 'お皿'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '식탁보 위의 접시', 'correct' => ['식탁보', '위의', '접시'], 'extra' => ['숟가락']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pouvez-vous', 'apporter', 'une', 'assiette', 'propre'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Can you bring a clean plate', 'correct' => ['can you', 'bring', 'a', 'clean', 'plate'], 'extra' => ['tablecloth']],
                            'es' => ['sentence' => 'Puede usted traer un plato limpio', 'correct' => ['puede usted', 'traer', 'un', 'plato', 'limpio'], 'extra' => ['mantel']],
                            'de' => ['sentence' => 'Können Sie einen sauberen Teller bringen', 'correct' => ['können Sie', 'bringen', 'einen', 'sauber', 'Teller'], 'extra' => ['Tischdecke']],
                            'ja' => ['sentence' => 'きれいなお皿を持ってきてもらえますか', 'correct' => ['きれいな', 'お皿', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['テーブルクロス']],
                            'ko' => ['sentence' => '깨끗한 접시를 가져올 수 있나요', 'correct' => ['깨끗한', '접시를', '가져올', '수', '있나요'], 'extra' => ['식탁보']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Here It Is', 3,
                pictures: [['fr' => 'Verre', 'img' => 'glass'], ['fr' => 'Menu', 'img' => 'menu']],
                plain: [['fr' => 'Je peux'], ['fr' => 'Voici']],
                phrases: [
                    'a' => [
                        'words' => ['je peux', 'payer', 'le', 'verre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I can pay for the glass', 'correct' => ['I can', 'to pay', 'the', 'glass'], 'extra' => ['here is', 'menu']],
                            'es' => ['sentence' => 'Puedo pagar el vaso', 'correct' => ['puedo', 'pagar', 'el', 'vaso'], 'extra' => ['aquí está', 'menú']],
                            'de' => ['sentence' => 'Ich kann das Glas bezahlen', 'correct' => ['ich kann', 'das', 'Glas', 'bezahlen'], 'extra' => ['hier ist', 'Menü']],
                            'ja' => ['sentence' => 'グラスを払えます', 'correct' => ['グラス', 'を', '払えます'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '유리잔을 낼 수 있습니다', 'correct' => ['유리잔을', '낼', '수', '있습니다'], 'extra' => ['여기']],
                        ],
                    ],
                    'b' => [
                        'words' => ['voici', 'le', 'menu'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Here is the menu', 'correct' => ['here is', 'the', 'menu'], 'extra' => ['I can', 'glass']],
                            'es' => ['sentence' => 'Aquí está el menú', 'correct' => ['aquí está', 'el', 'menú'], 'extra' => ['puedo', 'vaso']],
                            'de' => ['sentence' => 'Hier ist das Menü', 'correct' => ['hier ist', 'das', 'Menü'], 'extra' => ['ich kann', 'Glas']],
                            'ja' => ['sentence' => 'これがメニューです', 'correct' => ['これが', 'メニュー', 'です'], 'extra' => ['グラス']],
                            'ko' => ['sentence' => '여기 메뉴입니다', 'correct' => ['여기', '메뉴입니다'], 'extra' => ['유리잔']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je peux', 'choisir', 'le', 'menu'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I can choose the menu', 'correct' => ['I can', 'to choose', 'the', 'menu'], 'extra' => ['here is', 'glass']],
                            'es' => ['sentence' => 'Puedo elegir el menú', 'correct' => ['puedo', 'elegir', 'el', 'menú'], 'extra' => ['aquí está', 'vaso']],
                            'de' => ['sentence' => 'Ich kann das Menü wählen', 'correct' => ['ich kann', 'das', 'Menü', 'wählen'], 'extra' => ['hier ist', 'Glas']],
                            'ja' => ['sentence' => 'メニューを選べます', 'correct' => ['メニュー', 'を', '選べます'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '메뉴를 고를 수 있습니다', 'correct' => ['메뉴를', '고를', '수', '있습니다'], 'extra' => ['여기']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: A Little More', 4,
                pictures: [['fr' => 'Cuillère', 'img' => 'spoon'], ['fr' => 'Fourchette', 'img' => 'fork']],
                plain: [['fr' => 'Un peu'], ['fr' => 'Prendre']],
                phrases: [
                    'a' => [
                        'words' => ['un peu', 'de', 'riz'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'A little rice', 'correct' => ['a little', 'of', 'rice'], 'extra' => ['to have', 'fork']],
                            'es' => ['sentence' => 'Un poco de arroz', 'correct' => ['un poco', 'de', 'arroz'], 'extra' => ['tomar', 'tenedor']],
                            'de' => ['sentence' => 'Ein bisschen Reis', 'correct' => ['ein bisschen', 'von', 'Reis'], 'extra' => ['nehmen', 'Gabel']],
                            'ja' => ['sentence' => '少しのご飯', 'correct' => ['少しの', 'ご飯'], 'extra' => ['取る']],
                            'ko' => ['sentence' => '약간의 밥', 'correct' => ['약간의', '밥'], 'extra' => ['먹다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['prendre', 'une', 'fourchette'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To take a fork', 'correct' => ['to have', 'a', 'fork'], 'extra' => ['a little', 'spoon']],
                            'es' => ['sentence' => 'Tomar un tenedor', 'correct' => ['tomar', 'un', 'tenedor'], 'extra' => ['un poco', 'cuchara']],
                            'de' => ['sentence' => 'Eine Gabel nehmen', 'correct' => ['eine', 'Gabel', 'nehmen'], 'extra' => ['ein bisschen', 'Löffel']],
                            'ja' => ['sentence' => 'フォークを取る', 'correct' => ['フォーク', 'を', '取る'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '포크를 잡다', 'correct' => ['포크를', '잡다'], 'extra' => ['조금']],
                        ],
                    ],
                    'c' => [
                        'words' => ['prendre', 'un peu', 'avec', 'la', 'cuillère'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To take a little with the spoon', 'correct' => ['to have', 'a little', 'with', 'the', 'spoon'], 'extra' => ['fork']],
                            'es' => ['sentence' => 'Tomar un poco con la cuchara', 'correct' => ['tomar', 'un poco', 'con', 'la', 'cuchara'], 'extra' => ['tenedor']],
                            'de' => ['sentence' => 'Ein bisschen mit dem Löffel nehmen', 'correct' => ['ein bisschen', 'mit', 'dem', 'Löffel', 'nehmen'], 'extra' => ['Gabel']],
                            'ja' => ['sentence' => 'スプーンで少し取る', 'correct' => ['スプーン', 'で', '少し', '取る'], 'extra' => ['フォーク']],
                            'ko' => ['sentence' => '숟가락으로 조금 먹다', 'correct' => ['숟가락으로', '조금', '먹다'], 'extra' => ['포크']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: My Order Is Ready', 5,
                pictures: [['fr' => 'Assiette', 'img' => 'plate'], ['fr' => 'Couteau', 'img' => 'knife']],
                plain: [['fr' => 'Commande'], ['fr' => 'Prêt']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'plat', 'est', 'prêt'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The dish is ready', 'correct' => ['the', 'dish', 'is', 'ready'], 'extra' => ['order', 'plate']],
                            'es' => ['sentence' => 'El plato está listo', 'correct' => ['el', 'plato', 'está', 'listo'], 'extra' => ['pedido', 'plato']],
                            'de' => ['sentence' => 'Das Gericht ist fertig', 'correct' => ['das', 'Gericht', 'ist', 'fertig'], 'extra' => ['Bestellung', 'Teller']],
                            'ja' => ['sentence' => '料理は準備できています', 'correct' => ['料理', 'は', '準備', 'で', 'きて', 'います'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '요리는 준비되었습니다', 'correct' => ['요리는', '준비되었습니다'], 'extra' => ['주문']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ma', 'commande', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My order, please', 'correct' => ['my', 'order', 'please'], 'extra' => ['ready', 'knife']],
                            'es' => ['sentence' => 'Mi pedido, por favor', 'correct' => ['mi', 'pedido', 'por favor'], 'extra' => ['listo', 'cuchillo']],
                            'de' => ['sentence' => 'Meine Bestellung, bitte', 'correct' => ['meine', 'Bestellung', 'bitte'], 'extra' => ['fertig', 'Messer']],
                            'ja' => ['sentence' => '私の注文をお願いします', 'correct' => ['私の', '注文', 'を', 'お願いします'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '제 주문 부탁합니다', 'correct' => ['제', '주문', '부탁합니다'], 'extra' => ['준비된']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'assiette', 'et', 'un', 'couteau'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A plate and a knife', 'correct' => ['a', 'plate', 'and', 'a', 'knife'], 'extra' => ['order', 'ready']],
                            'es' => ['sentence' => 'Un plato y un cuchillo', 'correct' => ['un', 'plato', 'y', 'un', 'cuchillo'], 'extra' => ['pedido', 'listo']],
                            'de' => ['sentence' => 'Ein Teller und ein Messer', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Messer'], 'extra' => ['Bestellung', 'fertig']],
                            'ja' => ['sentence' => 'お皿とナイフ', 'correct' => ['お皿', 'と', 'ナイフ'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '접시와 나이프', 'correct' => ['접시와', '나이프'], 'extra' => ['주문']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
