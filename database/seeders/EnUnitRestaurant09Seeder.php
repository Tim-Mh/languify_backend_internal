<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = [
        'Fork' => 'fork', 'Knife' => 'knife', 'Spoon' => 'spoon', 'Plate' => 'plate',
        'Glass' => 'glass', 'Menu' => 'menu', 'Rice' => 'rice', 'Soup' => 'soup',
    ];

    /**
     * English Chapter 3, Unit 9 — asking for things at the table.
     *
     * Everything you might need mid-meal, wrapped in the two polite frames that
     * cover all of it: "bring me ..." and "can you ...". The cutlery is the
     * only genuinely new vocabulary.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: At the Table', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Fork and Knife', 1,
                pictures: [['en' => 'Fork', 'img' => 'fork'], ['en' => 'Knife', 'img' => 'knife']],
                plain: [['en' => 'Bring me'], ['en' => 'Napkin']],
                phrases: [
                    'a' => [
                        'words' => ['bring me', 'a', 'fork'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tráigame un tenedor', 'correct' => ['tráigame', 'un', 'tenedor'], 'extra' => ['servilleta', 'cuchillo']],
                            'de' => ['sentence' => 'Bringen Sie mir eine Gabel', 'correct' => ['bringen Sie mir', 'eine', 'Gabel'], 'extra' => ['Serviette', 'Messer']],
                            'ja' => ['sentence' => 'フォークを持ってきてください', 'correct' => ['フォーク', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '포크를 가져다주세요', 'correct' => ['포크를', '가져다주세요'], 'extra' => ['냅킨']],
                            'fr' => ['sentence' => 'Apportez-moi une fourchette', 'correct' => ['apportez-moi', 'une', 'fourchette'], 'extra' => ['serviette', 'couteau']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'knife', 'and', 'a', 'napkin'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un cuchillo y una servilleta', 'correct' => ['un', 'cuchillo', 'y', 'una', 'servilleta'], 'extra' => ['tráigame']],
                            'de' => ['sentence' => 'Ein Messer und eine Serviette', 'correct' => ['ein', 'Messer', 'und', 'eine', 'Serviette'], 'extra' => ['bringen Sie mir']],
                            'ja' => ['sentence' => 'ナイフとナプキン', 'correct' => ['ナイフ', 'と', 'ナプキン'], 'extra' => ['持ってきてください']],
                            'ko' => ['sentence' => '나이프와 냅킨', 'correct' => ['나이프와', '냅킨'], 'extra' => ['가져다주세요']],
                            'fr' => ['sentence' => 'Un couteau et une serviette', 'correct' => ['un', 'couteau', 'et', 'une', 'serviette'], 'extra' => ['apportez-moi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bring me', 'a', 'clean', 'knife'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Tráigame un cuchillo limpio', 'correct' => ['tráigame', 'un', 'cuchillo', 'limpio'], 'extra' => ['servilleta']],
                            'de' => ['sentence' => 'Bringen Sie mir ein sauberes Messer', 'correct' => ['bringen Sie mir', 'ein', 'sauber', 'Messer'], 'extra' => ['Serviette']],
                            'ja' => ['sentence' => 'きれいなナイフを持ってきてください', 'correct' => ['きれいな', 'ナイフ', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                            'ko' => ['sentence' => '깨끗한 나이프를 가져다주세요', 'correct' => ['깨끗한', '나이프를', '가져다주세요'], 'extra' => ['냅킨']],
                            'fr' => ['sentence' => 'Apportez-moi un couteau propre', 'correct' => ['apportez-moi', 'un', 'couteau', 'propre'], 'extra' => ['serviette']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Spoon and Plate', 2,
                pictures: [['en' => 'Spoon', 'img' => 'spoon'], ['en' => 'Plate', 'img' => 'plate']],
                plain: [['en' => 'Can you'], ['en' => 'Bring']],
                phrases: [
                    'a' => [
                        'words' => ['can you', 'bring', 'a', 'spoon'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Puede traer una cuchara', 'correct' => ['puede usted', 'traer', 'una', 'cuchara'], 'extra' => ['plato']],
                            'de' => ['sentence' => 'Können Sie einen Löffel bringen', 'correct' => ['können Sie', 'einen', 'Löffel', 'bringen'], 'extra' => ['Teller']],
                            'ja' => ['sentence' => 'スプーンを持ってきてもらえますか', 'correct' => ['スプーン', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['お皿']],
                            'ko' => ['sentence' => '숟가락을 가져올 수 있나요', 'correct' => ['숟가락을', '가져올', '수', '있나요'], 'extra' => ['접시']],
                            'fr' => ['sentence' => 'Pouvez-vous apporter une cuillère', 'correct' => ['pouvez-vous', 'apporter', 'une', 'cuillère'], 'extra' => ['assiette']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'plate', 'on', 'the', 'table'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Un plato en la mesa', 'correct' => ['un', 'plato', 'sobre', 'la', 'mesa'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Ein Teller auf dem Tisch', 'correct' => ['ein', 'Teller', 'auf', 'dem', 'Tisch'], 'extra' => ['Löffel']],
                            'ja' => ['sentence' => 'テーブルの上のお皿', 'correct' => ['テーブル', 'の', '上', 'の', 'お皿'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '탁자 위의 접시', 'correct' => ['탁자', '위의', '접시'], 'extra' => ['숟가락']],
                            'fr' => ['sentence' => 'Une assiette sur la table', 'correct' => ['une', 'assiette', 'sur', 'la', 'table'], 'extra' => ['cuillère']],
                        ],
                    ],
                    'c' => [
                        'words' => ['can you', 'bring', 'a', 'clean', 'plate'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Puede traer un plato limpio', 'correct' => ['puede usted', 'traer', 'un', 'limpio', 'plato'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Können Sie einen sauberen Teller bringen', 'correct' => ['können Sie', 'bringen', 'einen', 'sauber', 'Teller'], 'extra' => ['Löffel']],
                            'ja' => ['sentence' => 'きれいなお皿を持ってきてもらえますか', 'correct' => ['きれいな', 'お皿', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '깨끗한 접시를 가져올 수 있나요', 'correct' => ['깨끗한', '접시를', '가져올', '수', '있나요'], 'extra' => ['숟가락']],
                            'fr' => ['sentence' => 'Pouvez-vous apporter une assiette propre', 'correct' => ['pouvez-vous', 'apporter', 'une', 'assiette', 'propre'], 'extra' => ['cuillère']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Here It Is', 3,
                pictures: [['en' => 'Glass', 'img' => 'glass'], ['en' => 'Menu', 'img' => 'menu']],
                plain: [['en' => 'I can'], ['en' => 'Here is']],
                phrases: [
                    'a' => [
                        'words' => ['I can', 'pay', 'the', 'glass'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Puedo pagar el vaso', 'correct' => ['puedo', 'pagar', 'el', 'vaso'], 'extra' => ['aquí está', 'menú']],
                            'de' => ['sentence' => 'Ich kann das Glas bezahlen', 'correct' => ['ich kann', 'das', 'Glas', 'bezahlen'], 'extra' => ['hier ist', 'Menü']],
                            'ja' => ['sentence' => 'グラスを払えます', 'correct' => ['グラス', 'を', '払えます'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '유리잔을 낼 수 있습니다', 'correct' => ['유리잔을', '낼', '수', '있습니다'], 'extra' => ['여기']],
                            'fr' => ['sentence' => 'Je peux payer le verre', 'correct' => ['je peux', 'payer', 'le', 'verre'], 'extra' => ['voici', 'menu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['here is', 'the', 'menu'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Aquí está el menú', 'correct' => ['aquí está', 'el', 'menú'], 'extra' => ['puedo', 'vaso']],
                            'de' => ['sentence' => 'Hier ist das Menü', 'correct' => ['hier ist', 'das', 'Menü'], 'extra' => ['ich kann', 'Glas']],
                            'ja' => ['sentence' => 'これがメニューです', 'correct' => ['これが', 'メニュー', 'です'], 'extra' => ['グラス']],
                            'ko' => ['sentence' => '여기 메뉴입니다', 'correct' => ['여기', '메뉴입니다'], 'extra' => ['유리잔']],
                            'fr' => ['sentence' => 'Voici le menu', 'correct' => ['voici', 'le', 'menu'], 'extra' => ['verre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I can', 'choose', 'the', 'menu'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Puedo elegir el menú', 'correct' => ['puedo', 'elegir', 'el', 'menú'], 'extra' => ['aquí está', 'vaso']],
                            'de' => ['sentence' => 'Ich kann das Menü wählen', 'correct' => ['ich kann', 'das', 'Menü', 'wählen'], 'extra' => ['hier ist', 'Glas']],
                            'ja' => ['sentence' => 'メニューを選べます', 'correct' => ['メニュー', 'を', '選べます'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '메뉴를 고를 수 있습니다', 'correct' => ['메뉴를', '고를', '수', '있습니다'], 'extra' => ['여기']],
                            'fr' => ['sentence' => 'Je peux choisir le menu', 'correct' => ['je peux', 'choisir', 'le', 'menu'], 'extra' => ['voici']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: A Little More', 4,
                pictures: [['en' => 'Spoon', 'img' => 'spoon'], ['en' => 'Rice', 'img' => 'rice']],
                plain: [['en' => 'A little'], ['en' => 'More']],
                phrases: [
                    'a' => [
                        'words' => ['a little', 'rice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un poco de arroz', 'correct' => ['un poco', 'arroz'], 'extra' => ['más', 'cuchara']],
                            'de' => ['sentence' => 'Ein bisschen Reis', 'correct' => ['ein bisschen', 'Reis'], 'extra' => ['mehr', 'Löffel']],
                            'ja' => ['sentence' => '少しのご飯', 'correct' => ['少しの', 'ご飯'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '약간의 밥', 'correct' => ['약간의', '밥'], 'extra' => ['더']],
                            'fr' => ['sentence' => 'Un peu de riz', 'correct' => ['un peu', 'riz'], 'extra' => ['plus', 'cuillère']],
                        ],
                    ],
                    'b' => [
                        'words' => ['more', 'with', 'the', 'spoon'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Más con la cuchara', 'correct' => ['más', 'con', 'la', 'cuchara'], 'extra' => ['un poco', 'arroz']],
                            'de' => ['sentence' => 'Mehr mit dem Löffel', 'correct' => ['mehr', 'mit', 'dem', 'Löffel'], 'extra' => ['ein bisschen', 'Reis']],
                            'ja' => ['sentence' => 'スプーンでもっと', 'correct' => ['スプーン', 'で', 'もっと'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '숟가락으로 더', 'correct' => ['숟가락으로', '더'], 'extra' => ['조금']],
                            'fr' => ['sentence' => 'Plus avec la cuillère', 'correct' => ['plus', 'avec', 'la', 'cuillère'], 'extra' => ['un peu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a little', 'more', 'rice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un poco más de arroz', 'correct' => ['un poco', 'más', 'arroz'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Ein bisschen mehr Reis', 'correct' => ['ein bisschen', 'mehr', 'Reis'], 'extra' => ['Löffel']],
                            'ja' => ['sentence' => 'もう少しご飯', 'correct' => ['もう', '少し', 'ご飯'], 'extra' => ['スプーン']],
                            'ko' => ['sentence' => '밥 조금 더', 'correct' => ['밥', '조금', '더'], 'extra' => ['숟가락']],
                            'fr' => ['sentence' => 'Un peu plus de riz', 'correct' => ['un peu', 'plus', 'riz'], 'extra' => ['cuillère']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: My Order Is Ready', 5,
                pictures: [['en' => 'Plate', 'img' => 'plate'], ['en' => 'Soup', 'img' => 'soup']],
                plain: [['en' => 'Order'], ['en' => 'Ready']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'dish', 'is', 'ready'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El plato está listo', 'correct' => ['el', 'plato', 'está', 'listo'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Das Gericht ist fertig', 'correct' => ['das', 'Gericht', 'ist', 'bereit'], 'extra' => ['Bestellung']],
                            'ja' => ['sentence' => '料理は準備できています', 'correct' => ['料理', 'は', '準備', 'で', 'きて', 'います'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '요리는 준비되었습니다', 'correct' => ['요리는', '준비되었습니다'], 'extra' => ['주문']],
                            'fr' => ['sentence' => 'Le plat est prêt', 'correct' => ['le', 'plat', 'est', 'prêt'], 'extra' => ['commande']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'order', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi pedido, por favor', 'correct' => ['mi', 'pedido', 'por favor'], 'extra' => ['listo', 'sopa']],
                            'de' => ['sentence' => 'Meine Bestellung, bitte', 'correct' => ['meine', 'Bestellung', 'bitte'], 'extra' => ['bereit', 'Suppe']],
                            'ja' => ['sentence' => '私の注文をお願いします', 'correct' => ['私の', '注文', 'を', 'お願いします'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '제 주문 부탁합니다', 'correct' => ['제', '주문', '부탁합니다'], 'extra' => ['준비된']],
                            'fr' => ['sentence' => 'Ma commande, s\'il vous plaît', 'correct' => ['ma', 'commande', "s'il vous plaît"], 'extra' => ['prêt']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'plate', 'and', 'a', 'soup'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un plato y una sopa', 'correct' => ['un', 'plato', 'y', 'una', 'sopa'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Ein Teller und eine Suppe', 'correct' => ['ein', 'Teller', 'und', 'eine', 'Suppe'], 'extra' => ['Bestellung']],
                            'ja' => ['sentence' => 'お皿とスープ', 'correct' => ['お皿', 'と', 'スープ'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '접시와 수프', 'correct' => ['접시와', '수프'], 'extra' => ['주문']],
                            'fr' => ['sentence' => 'Une assiette et une soupe', 'correct' => ['une', 'assiette', 'et', 'une', 'soupe'], 'extra' => ['commande']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
