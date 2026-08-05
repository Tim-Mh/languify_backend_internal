<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant01Seeder extends Seeder
{
    private const PICTURES = [
        'Menu' => 'menu', 'Assiette' => 'plate', 'Soupe' => 'soup', 'Salade' => 'salad',
        'Poulet' => 'chicken', 'Poisson' => 'fish', 'Viande' => 'meat', 'Riz' => 'rice',
        'Pain' => 'bread', 'Fromage' => 'cheese',
    ];

    /**
     * French Chapter 3, Unit 1 — ordering food.
     *
     * This is the first unit whose picture words are all genuinely new: the
     * learner meets the dishes themselves (soupe, salade, poulet, poisson,
     * viande, riz) rather than recycling Chapter 1's people and places. The
     * abstract half of each lesson carries the ordering language — commander,
     * je prends, pour moi, sans — so by Lesson 5 a learner can name a dish and
     * ask for it with or without something.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Ordering Food', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Menu', 1,
                pictures: [['fr' => 'Menu', 'img' => 'menu'], ['fr' => 'Assiette', 'img' => 'plate']],
                plain: [['fr' => 'Carte'], ['fr' => 'Commander']],
                phrases: [
                    'a' => [
                        'words' => ['la', 'carte', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The menu card, please', 'correct' => ['the', 'menu card', 'please'], 'extra' => ['plate', 'to order']],
                            'es' => ['sentence' => 'La carta, por favor', 'correct' => ['la', 'carta', 'por favor'], 'extra' => ['plato', 'pedir']],
                            'de' => ['sentence' => 'Die Speisekarte, bitte', 'correct' => ['die', 'Speisekarte', 'bitte'], 'extra' => ['Teller', 'bestellen']],
                            'ja' => ['sentence' => 'メニュー表をお願いします', 'correct' => ['メニュー', '表', 'を', 'お願いします'], 'extra' => ['お皿']],
                            'ko' => ['sentence' => '메뉴판 부탁합니다', 'correct' => ['메뉴판', '부탁합니다'], 'extra' => ['접시']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je voudrais', 'commander'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to order', 'correct' => ['I would like', 'to order'], 'extra' => ['menu card', 'plate']],
                            'es' => ['sentence' => 'Quisiera pedir', 'correct' => ['quisiera', 'pedir'], 'extra' => ['carta', 'plato']],
                            'de' => ['sentence' => 'Ich möchte bestellen', 'correct' => ['ich möchte', 'bestellen'], 'extra' => ['Speisekarte', 'Teller']],
                            'ja' => ['sentence' => '注文したいです', 'correct' => ['注文し', 'たいです'], 'extra' => ['メニュー表']],
                            'ko' => ['sentence' => '주문하고 싶습니다', 'correct' => ['주문하고', '싶습니다'], 'extra' => ['메뉴판']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'menu', 'et', 'une', 'assiette'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The menu and a plate', 'correct' => ['the', 'menu', 'and', 'a', 'plate'], 'extra' => ['to order']],
                            'es' => ['sentence' => 'El menú y un plato', 'correct' => ['el', 'menú', 'y', 'un', 'plato'], 'extra' => ['pedir']],
                            'de' => ['sentence' => 'Das Menü und ein Teller', 'correct' => ['das', 'Menü', 'und', 'ein', 'Teller'], 'extra' => ['bestellen']],
                            'ja' => ['sentence' => 'メニューとお皿', 'correct' => ['メニュー', 'と', 'お皿'], 'extra' => ['注文する']],
                            'ko' => ['sentence' => '메뉴와 접시', 'correct' => ['메뉴와', '접시'], 'extra' => ['주문하다']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Soup and Salad', 2,
                pictures: [['fr' => 'Soupe', 'img' => 'soup'], ['fr' => 'Salade', 'img' => 'salad']],
                plain: [['fr' => 'Je prends'], ['fr' => 'Plat']],
                phrases: [
                    'a' => [
                        'words' => ['je prends', 'la', 'soupe'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => "I'll have the soup", 'correct' => ["I'll have", 'the', 'soup'], 'extra' => ['salad', 'dish']],
                            'es' => ['sentence' => 'Tomo la sopa', 'correct' => ['tomo', 'la', 'sopa'], 'extra' => ['ensalada', 'plato']],
                            'de' => ['sentence' => 'Ich nehme die Suppe', 'correct' => ['ich nehme', 'die', 'Suppe'], 'extra' => ['Salat', 'Gericht']],
                            'ja' => ['sentence' => '私はスープにします', 'correct' => ['私', 'は', 'スープ', 'にします'], 'extra' => ['サラダ', '料理']],
                            'ko' => ['sentence' => '저는 수프로 하겠습니다', 'correct' => ['저는', '수프로', '하겠습니다'], 'extra' => ['샐러드', '요리']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'salade', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A salad, please', 'correct' => ['a', 'salad', 'please'], 'extra' => ['soup', 'dish']],
                            'es' => ['sentence' => 'Una ensalada, por favor', 'correct' => ['una', 'ensalada', 'por favor'], 'extra' => ['sopa', 'plato']],
                            'de' => ['sentence' => 'Einen Salat, bitte', 'correct' => ['einen', 'Salat', 'bitte'], 'extra' => ['Suppe', 'Gericht']],
                            'ja' => ['sentence' => 'サラダをお願いします', 'correct' => ['サラダ', 'を', 'お願いします'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '샐러드 부탁합니다', 'correct' => ['샐러드', '부탁합니다'], 'extra' => ['수프']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'plat', 'du', 'jour'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The dish of the day', 'correct' => ['the', 'dish', 'of the', 'day'], 'extra' => ['soup', 'salad']],
                            'es' => ['sentence' => 'El plato del día', 'correct' => ['el', 'plato', 'del', 'día'], 'extra' => ['sopa', 'ensalada']],
                            'de' => ['sentence' => 'Das Gericht des Tages', 'correct' => ['das', 'Gericht', 'des', 'Tages'], 'extra' => ['Suppe', 'Salat']],
                            'ja' => ['sentence' => '本日の料理', 'correct' => ['本', '日', 'の', '料理'], 'extra' => ['スープ', 'サラダ']],
                            'ko' => ['sentence' => '오늘의 요리', 'correct' => ['오늘의', '요리'], 'extra' => ['수프', '샐러드']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Chicken or Fish', 3,
                pictures: [['fr' => 'Poulet', 'img' => 'chicken'], ['fr' => 'Poisson', 'img' => 'fish']],
                plain: [['fr' => 'Chaud'], ['fr' => 'Pour moi']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'poulet', 'est', 'chaud'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The chicken is hot', 'correct' => ['the', 'chicken', 'is', 'hot'], 'extra' => ['fish', 'for me']],
                            'es' => ['sentence' => 'El pollo está caliente', 'correct' => ['el', 'pollo', 'está', 'caliente'], 'extra' => ['pescado', 'para mí']],
                            'de' => ['sentence' => 'Das Hähnchen ist heiß', 'correct' => ['das', 'Hähnchen', 'ist', 'heiß'], 'extra' => ['Fisch', 'für mich']],
                            'ja' => ['sentence' => '鶏肉は熱いです', 'correct' => ['鶏肉', 'は', '熱い', 'です'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기는 뜨겁습니다', 'correct' => ['닭고기는', '뜨겁습니다'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'poisson', 'pour moi'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'The fish for me', 'correct' => ['the', 'fish', 'for me'], 'extra' => ['chicken', 'hot']],
                            'es' => ['sentence' => 'El pescado para mí', 'correct' => ['el', 'pescado', 'para mí'], 'extra' => ['pollo', 'caliente']],
                            'de' => ['sentence' => 'Der Fisch für mich', 'correct' => ['der', 'Fisch', 'für mich'], 'extra' => ['Hähnchen', 'heiß']],
                            'ja' => ['sentence' => '私に魚を', 'correct' => ['私', 'に', '魚', 'を'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '저에게 생선을', 'correct' => ['저에게', '생선을'], 'extra' => ['닭고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'poulet', 'ou', 'le', 'poisson'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'The chicken or the fish', 'correct' => ['the', 'chicken', 'or', 'the', 'fish'], 'extra' => ['hot', 'for me']],
                            'es' => ['sentence' => 'El pollo o el pescado', 'correct' => ['el', 'pollo', 'o', 'el', 'pescado'], 'extra' => ['caliente', 'para mí']],
                            'de' => ['sentence' => 'Das Hähnchen oder der Fisch', 'correct' => ['das', 'Hähnchen', 'oder', 'der', 'Fisch'], 'extra' => ['heiß', 'für mich']],
                            'ja' => ['sentence' => '鶏肉か魚', 'correct' => ['鶏肉', 'か', '魚'], 'extra' => ['熱い']],
                            'ko' => ['sentence' => '닭고기 또는 생선', 'correct' => ['닭고기', '또는', '생선'], 'extra' => ['뜨거운']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Meat and Rice', 4,
                pictures: [['fr' => 'Viande', 'img' => 'meat'], ['fr' => 'Riz', 'img' => 'rice']],
                plain: [['fr' => 'Serveur'], ['fr' => 'Table']],
                phrases: [
                    'a' => [
                        'words' => ['la', 'viande', 'et', 'le', 'riz'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The meat and the rice', 'correct' => ['the', 'meat', 'and', 'the', 'rice'], 'extra' => ['waiter', 'table']],
                            'es' => ['sentence' => 'La carne y el arroz', 'correct' => ['la', 'carne', 'y', 'el', 'arroz'], 'extra' => ['camarero', 'mesa']],
                            'de' => ['sentence' => 'Das Fleisch und der Reis', 'correct' => ['das', 'Fleisch', 'und', 'der', 'Reis'], 'extra' => ['Kellner', 'Tisch']],
                            'ja' => ['sentence' => '肉とご飯', 'correct' => ['肉', 'と', 'ご飯'], 'extra' => ['ウェイター']],
                            'ko' => ['sentence' => '고기와 밥', 'correct' => ['고기와', '밥'], 'extra' => ['웨이터']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'serveur', 'est', 'ici'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The waiter is here', 'correct' => ['the', 'waiter', 'is', 'here'], 'extra' => ['meat', 'rice']],
                            'es' => ['sentence' => 'El camarero está aquí', 'correct' => ['el', 'camarero', 'está', 'aquí'], 'extra' => ['carne', 'arroz']],
                            'de' => ['sentence' => 'Der Kellner ist hier', 'correct' => ['der', 'Kellner', 'ist', 'hier'], 'extra' => ['Fleisch', 'Reis']],
                            'ja' => ['sentence' => 'ウェイターはここにいます', 'correct' => ['ウェイター', 'は', 'ここ', 'に', 'います'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '웨이터는 여기에 있습니다', 'correct' => ['웨이터는', '여기에', '있습니다'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'table', 'est', 'libre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The table is free', 'correct' => ['the', 'table', 'is', 'free'], 'extra' => ['waiter', 'rice']],
                            'es' => ['sentence' => 'La mesa está libre', 'correct' => ['la', 'mesa', 'está', 'libre'], 'extra' => ['camarero', 'arroz']],
                            'de' => ['sentence' => 'Der Tisch ist frei', 'correct' => ['der', 'Tisch', 'ist', 'frei'], 'extra' => ['Kellner', 'Reis']],
                            'ja' => ['sentence' => 'テーブルは空いています', 'correct' => ['テーブル', 'は', '空いています'], 'extra' => ['ウェイター']],
                            'ko' => ['sentence' => '테이블은 비어 있습니다', 'correct' => ['테이블은', '비어', '있습니다'], 'extra' => ['웨이터']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: With and Without', 5,
                pictures: [['fr' => 'Pain', 'img' => 'bread'], ['fr' => 'Fromage', 'img' => 'cheese']],
                plain: [['fr' => 'Du'], ['fr' => 'Sans']],
                phrases: [
                    'a' => [
                        'words' => ['du', 'pain', 'et', 'du', 'fromage'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Some bread and some cheese', 'correct' => ['some', 'bread', 'and', 'some', 'cheese'], 'extra' => ['without']],
                            'es' => ['sentence' => 'Algo de pan y algo de queso', 'correct' => ['algo de', 'pan', 'y', 'algo de', 'queso'], 'extra' => ['sin']],
                            'de' => ['sentence' => 'Etwas Brot und etwas Käse', 'correct' => ['etwas', 'Brot', 'und', 'etwas', 'Käse'], 'extra' => ['ohne']],
                            'ja' => ['sentence' => '少しのパンと少しのチーズ', 'correct' => ['少しの', 'パン', 'と', '少しの', 'チーズ'], 'extra' => ['なし']],
                            'ko' => ['sentence' => '약간의 빵과 약간의 치즈', 'correct' => ['약간의', '빵과', '약간의', '치즈'], 'extra' => ['없이']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'soupe', 'sans', 'sel'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'The soup without salt', 'correct' => ['the', 'soup', 'without', 'salt'], 'extra' => ['bread', 'cheese']],
                            'es' => ['sentence' => 'La sopa sin sal', 'correct' => ['la', 'sopa', 'sin', 'sal'], 'extra' => ['pan', 'queso']],
                            'de' => ['sentence' => 'Die Suppe ohne Salz', 'correct' => ['die', 'Suppe', 'ohne', 'Salz'], 'extra' => ['Brot', 'Käse']],
                            'ja' => ['sentence' => '塩なしのスープ', 'correct' => ['塩', 'なし', 'の', 'スープ'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '소금 없이 수프', 'correct' => ['소금', '없이', '수프'], 'extra' => ['빵']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je voudrais', 'du', 'fromage', 'sans', 'pain'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I would like some cheese without bread', 'correct' => ['I would like', 'some', 'cheese', 'without', 'bread'], 'extra' => ['soup']],
                            'es' => ['sentence' => 'Quisiera algo de queso sin pan', 'correct' => ['quisiera', 'algo de', 'queso', 'sin', 'pan'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Ich möchte etwas Käse ohne Brot', 'correct' => ['ich möchte', 'etwas', 'Käse', 'ohne', 'Brot'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'パンなしでチーズをください', 'correct' => ['パン', 'なし', 'で', 'チーズ', 'を', 'ください'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '빵 없이 치즈를 주세요', 'correct' => ['빵', '없이', '치즈를', '주세요'], 'extra' => ['수프']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
