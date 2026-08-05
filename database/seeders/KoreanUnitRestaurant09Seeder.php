<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = ['포크' => 'fork', '나이프' => 'knife', '숟가락' => 'spoon', '접시' => 'plate', '유리잔' => 'glass', '메뉴' => 'menu', '밥' => 'rice', '수프' => 'soup'];

    /**
     * Korean Restaurant, Unit 9, the Korean twin of the English "At the Table" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, '유닛 9: 식탁에서', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 포크 · 나이프', 1,
                pictures: [['ko' => '포크', 'img' => 'fork'], ['ko' => '나이프', 'img' => 'knife']],
                plain: [['ko' => '가져다주세요'], ['ko' => '냅킨']],
                phrases: [
                    'a' => [
                        'words' => ['포크를', '가져다주세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'bring me a fork', 'correct' => ['bring me', 'a', 'fork'], 'extra' => ['napkin']],
                            'es' => ['sentence' => 'Tráigame un tenedor', 'correct' => ['tráigame', 'un', 'tenedor'], 'extra' => ['servilleta', 'cuchillo']],
                            'de' => ['sentence' => 'Bringen Sie mir eine Gabel', 'correct' => ['bringen Sie mir', 'eine', 'Gabel'], 'extra' => ['Serviette', 'Messer']],
                            'fr' => ['sentence' => 'Apportez-moi une fourchette', 'correct' => ['apportez-moi', 'une', 'fourchette'], 'extra' => ['serviette', 'couteau']],
                            'ja' => ['sentence' => 'フォークを持ってきてください', 'correct' => ['フォーク', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                        ],
                    ],
                    'b' => [
                        'words' => ['나이프와', '냅킨'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a knife and a napkin', 'correct' => ['a', 'knife', 'and', 'a', 'napkin'], 'extra' => ['bring me']],
                            'es' => ['sentence' => 'Un cuchillo y una servilleta', 'correct' => ['un', 'cuchillo', 'y', 'una', 'servilleta'], 'extra' => ['tráigame']],
                            'de' => ['sentence' => 'Ein Messer und eine Serviette', 'correct' => ['ein', 'Messer', 'und', 'eine', 'Serviette'], 'extra' => ['bringen Sie mir']],
                            'fr' => ['sentence' => 'Un couteau et une serviette', 'correct' => ['un', 'couteau', 'et', 'une', 'serviette'], 'extra' => ['apportez-moi']],
                            'ja' => ['sentence' => 'ナイフとナプキン', 'correct' => ['ナイフ', 'と', 'ナプキン'], 'extra' => ['持ってきてください']],
                        ],
                    ],
                    'c' => [
                        'words' => ['깨끗한', '나이프를', '가져다주세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'bring me a clean knife', 'correct' => ['bring me', 'a', 'clean', 'knife'], 'extra' => ['napkin']],
                            'es' => ['sentence' => 'Tráigame un cuchillo limpio', 'correct' => ['tráigame', 'un', 'cuchillo', 'limpio'], 'extra' => ['servilleta']],
                            'de' => ['sentence' => 'Bringen Sie mir ein sauberes Messer', 'correct' => ['bringen Sie mir', 'ein', 'sauber', 'Messer'], 'extra' => ['Serviette']],
                            'fr' => ['sentence' => 'Apportez-moi un couteau propre', 'correct' => ['apportez-moi', 'un', 'couteau', 'propre'], 'extra' => ['serviette']],
                            'ja' => ['sentence' => 'きれいなナイフを持ってきてください', 'correct' => ['きれいな', 'ナイフ', 'を', '持ってきてください'], 'extra' => ['ナプキン']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 숟가락 · 접시', 2,
                pictures: [['ko' => '숟가락', 'img' => 'spoon'], ['ko' => '접시', 'img' => 'plate']],
                plain: [['ko' => '주시겠어요'], ['ko' => '가져오다']],
                phrases: [
                    'a' => [
                        'words' => ['숟가락을', '가져올', '수', '있나요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'can you bring a spoon', 'correct' => ['can you', 'bring', 'a', 'spoon'], 'extra' => ['plate']],
                            'es' => ['sentence' => 'Puede traer una cuchara', 'correct' => ['puede usted', 'traer', 'una', 'cuchara'], 'extra' => ['plato']],
                            'de' => ['sentence' => 'Können Sie einen Löffel bringen', 'correct' => ['können Sie', 'einen', 'Löffel', 'bringen'], 'extra' => ['Teller']],
                            'fr' => ['sentence' => 'Pouvez-vous apporter une cuillère', 'correct' => ['pouvez-vous', 'apporter', 'une', 'cuillère'], 'extra' => ['assiette']],
                            'ja' => ['sentence' => 'スプーンを持ってきてもらえますか', 'correct' => ['スプーン', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['お皿']],
                        ],
                    ],
                    'b' => [
                        'words' => ['탁자', '위의', '접시'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a plate on the table', 'correct' => ['a', 'plate', 'on', 'the', 'table'], 'extra' => ['spoon']],
                            'es' => ['sentence' => 'Un plato en la mesa', 'correct' => ['un', 'plato', 'sobre', 'la', 'mesa'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Ein Teller auf dem Tisch', 'correct' => ['ein', 'Teller', 'auf', 'dem', 'Tisch'], 'extra' => ['Löffel']],
                            'fr' => ['sentence' => 'Une assiette sur la table', 'correct' => ['une', 'assiette', 'sur', 'la', 'table'], 'extra' => ['cuillère']],
                            'ja' => ['sentence' => 'テーブルの上のお皿', 'correct' => ['テーブル', 'の', '上', 'の', 'お皿'], 'extra' => ['スプーン']],
                        ],
                    ],
                    'c' => [
                        'words' => ['깨끗한', '접시를', '가져올', '수', '있나요'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'can you bring a clean plate', 'correct' => ['can you', 'bring', 'a', 'clean', 'plate'], 'extra' => ['spoon']],
                            'es' => ['sentence' => 'Puede traer un plato limpio', 'correct' => ['puede usted', 'traer', 'un', 'limpio', 'plato'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Können Sie einen sauberen Teller bringen', 'correct' => ['können Sie', 'bringen', 'einen', 'sauber', 'Teller'], 'extra' => ['Löffel']],
                            'fr' => ['sentence' => 'Pouvez-vous apporter une assiette propre', 'correct' => ['pouvez-vous', 'apporter', 'une', 'assiette', 'propre'], 'extra' => ['cuillère']],
                            'ja' => ['sentence' => 'きれいなお皿を持ってきてもらえますか', 'correct' => ['きれいな', 'お皿', 'を', '持ってきて', 'もらえます', 'か'], 'extra' => ['スプーン']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 유리잔 · 메뉴', 3,
                pictures: [['ko' => '유리잔', 'img' => 'glass'], ['ko' => '메뉴', 'img' => 'menu']],
                plain: [['ko' => '나는 할 수 있다'], ['ko' => '여기']],
                phrases: [
                    'a' => [
                        'words' => ['유리잔을', '낼', '수', '있습니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I can pay the glass', 'correct' => ['I can', 'pay', 'the', 'glass'], 'extra' => ['here is']],
                            'es' => ['sentence' => 'Puedo pagar el vaso', 'correct' => ['puedo', 'pagar', 'el', 'vaso'], 'extra' => ['aquí está', 'menú']],
                            'de' => ['sentence' => 'Ich kann das Glas bezahlen', 'correct' => ['ich kann', 'das', 'Glas', 'bezahlen'], 'extra' => ['hier ist', 'Menü']],
                            'fr' => ['sentence' => 'Je peux payer le verre', 'correct' => ['je peux', 'payer', 'le', 'verre'], 'extra' => ['voici', 'menu']],
                            'ja' => ['sentence' => 'グラスを払えます', 'correct' => ['グラス', 'を', '払えます'], 'extra' => ['これが']],
                        ],
                    ],
                    'b' => [
                        'words' => ['여기', '메뉴입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'here is the menu', 'correct' => ['here is', 'the', 'menu'], 'extra' => ['glass']],
                            'es' => ['sentence' => 'Aquí está el menú', 'correct' => ['aquí está', 'el', 'menú'], 'extra' => ['puedo', 'vaso']],
                            'de' => ['sentence' => 'Hier ist das Menü', 'correct' => ['hier ist', 'das', 'Menü'], 'extra' => ['ich kann', 'Glas']],
                            'fr' => ['sentence' => 'Voici le menu', 'correct' => ['voici', 'le', 'menu'], 'extra' => ['verre']],
                            'ja' => ['sentence' => 'これがメニューです', 'correct' => ['これが', 'メニュー', 'です'], 'extra' => ['グラス']],
                        ],
                    ],
                    'c' => [
                        'words' => ['메뉴를', '고를', '수', '있습니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I can choose the menu', 'correct' => ['I can', 'choose', 'the', 'menu'], 'extra' => ['here is']],
                            'es' => ['sentence' => 'Puedo elegir el menú', 'correct' => ['puedo', 'elegir', 'el', 'menú'], 'extra' => ['aquí está', 'vaso']],
                            'de' => ['sentence' => 'Ich kann das Menü wählen', 'correct' => ['ich kann', 'das', 'Menü', 'wählen'], 'extra' => ['hier ist', 'Glas']],
                            'fr' => ['sentence' => 'Je peux choisir le menu', 'correct' => ['je peux', 'choisir', 'le', 'menu'], 'extra' => ['voici']],
                            'ja' => ['sentence' => 'メニューを選べます', 'correct' => ['メニュー', 'を', '選べます'], 'extra' => ['これが']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 숟가락 · 밥', 4,
                pictures: [['ko' => '숟가락', 'img' => 'spoon'], ['ko' => '밥', 'img' => 'rice']],
                plain: [['ko' => '조금'], ['ko' => '더']],
                phrases: [
                    'a' => [
                        'words' => ['약간의', '밥'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a little rice', 'correct' => ['a little', 'rice'], 'extra' => ['more']],
                            'es' => ['sentence' => 'Un poco de arroz', 'correct' => ['un poco', 'arroz'], 'extra' => ['más', 'cuchara']],
                            'de' => ['sentence' => 'Ein bisschen Reis', 'correct' => ['ein bisschen', 'Reis'], 'extra' => ['mehr', 'Löffel']],
                            'fr' => ['sentence' => 'Un peu de riz', 'correct' => ['un peu', 'riz'], 'extra' => ['plus', 'cuillère']],
                            'ja' => ['sentence' => '少しのご飯', 'correct' => ['少しの', 'ご飯'], 'extra' => ['もっと']],
                        ],
                    ],
                    'b' => [
                        'words' => ['숟가락으로', '더'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'more with the spoon', 'correct' => ['more', 'with', 'the', 'spoon'], 'extra' => ['a little']],
                            'es' => ['sentence' => 'Más con la cuchara', 'correct' => ['más', 'con', 'la', 'cuchara'], 'extra' => ['un poco', 'arroz']],
                            'de' => ['sentence' => 'Mehr mit dem Löffel', 'correct' => ['mehr', 'mit', 'dem', 'Löffel'], 'extra' => ['ein bisschen', 'Reis']],
                            'fr' => ['sentence' => 'Plus avec la cuillère', 'correct' => ['plus', 'avec', 'la', 'cuillère'], 'extra' => ['un peu']],
                            'ja' => ['sentence' => 'スプーンでもっと', 'correct' => ['スプーン', 'で', 'もっと'], 'extra' => ['少し']],
                        ],
                    ],
                    'c' => [
                        'words' => ['밥', '조금', '더'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a little more rice', 'correct' => ['a little', 'more', 'rice'], 'extra' => ['spoon']],
                            'es' => ['sentence' => 'Un poco más de arroz', 'correct' => ['un poco', 'más', 'arroz'], 'extra' => ['cuchara']],
                            'de' => ['sentence' => 'Ein bisschen mehr Reis', 'correct' => ['ein bisschen', 'mehr', 'Reis'], 'extra' => ['Löffel']],
                            'fr' => ['sentence' => 'Un peu plus de riz', 'correct' => ['un peu', 'plus', 'riz'], 'extra' => ['cuillère']],
                            'ja' => ['sentence' => 'もう少しご飯', 'correct' => ['もう', '少し', 'ご飯'], 'extra' => ['スプーン']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 접시 · 수프', 5,
                pictures: [['ko' => '접시', 'img' => 'plate'], ['ko' => '수프', 'img' => 'soup']],
                plain: [['ko' => '주문'], ['ko' => '준비된']],
                phrases: [
                    'a' => [
                        'words' => ['요리는', '준비되었습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the dish is ready', 'correct' => ['the', 'dish', 'is', 'ready'], 'extra' => ['order']],
                            'es' => ['sentence' => 'El plato está listo', 'correct' => ['el', 'plato', 'está', 'listo'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Das Gericht ist fertig', 'correct' => ['das', 'Gericht', 'ist', 'bereit'], 'extra' => ['Bestellung']],
                            'fr' => ['sentence' => 'Le plat est prêt', 'correct' => ['le', 'plat', 'est', 'prêt'], 'extra' => ['commande']],
                            'ja' => ['sentence' => '料理は準備できています', 'correct' => ['料理', 'は', '準備', 'で', 'きて', 'います'], 'extra' => ['注文']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '주문', '부탁합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my order please', 'correct' => ['my', 'order', 'please'], 'extra' => ['ready']],
                            'es' => ['sentence' => 'Mi pedido, por favor', 'correct' => ['mi', 'pedido', 'por favor'], 'extra' => ['listo', 'sopa']],
                            'de' => ['sentence' => 'Meine Bestellung, bitte', 'correct' => ['meine', 'Bestellung', 'bitte'], 'extra' => ['bereit', 'Suppe']],
                            'fr' => ['sentence' => 'Ma commande, s\'il vous plaît', 'correct' => ['ma', 'commande', 's\'il vous plaît'], 'extra' => ['prêt']],
                            'ja' => ['sentence' => '私の注文をお願いします', 'correct' => ['私の', '注文', 'を', 'お願いします'], 'extra' => ['準備ができた']],
                        ],
                    ],
                    'c' => [
                        'words' => ['접시와', '수프'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a plate and a soup', 'correct' => ['a', 'plate', 'and', 'a', 'soup'], 'extra' => ['order']],
                            'es' => ['sentence' => 'Un plato y una sopa', 'correct' => ['un', 'plato', 'y', 'una', 'sopa'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Ein Teller und eine Suppe', 'correct' => ['ein', 'Teller', 'und', 'eine', 'Suppe'], 'extra' => ['Bestellung']],
                            'fr' => ['sentence' => 'Une assiette et une soupe', 'correct' => ['une', 'assiette', 'et', 'une', 'soupe'], 'extra' => ['commande']],
                            'ja' => ['sentence' => 'お皿とスープ', 'correct' => ['お皿', 'と', 'スープ'], 'extra' => ['注文']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
