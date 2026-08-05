<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant01Seeder extends Seeder
{
    private const PICTURES = [
        'Menu' => 'menu', 'Plate' => 'plate', 'Soup' => 'soup', 'Salad' => 'salad',
        'Chicken' => 'chicken', 'Fish' => 'fish', 'Meat' => 'meat', 'Rice' => 'rice',
        'Bread' => 'bread', 'Cheese' => 'cheese',
    ];

    /**
     * English Chapter 3, Unit 1 — ordering food.
     *
     * The first genuinely picturable chapter: the learner meets the dishes
     * themselves (soup, salad, chicken, fish, meat, rice) while the abstract
     * half carries the ordering language — to order, I'll have, for me, without
     * — so by Lesson 5 they can name a dish and ask for it with or without
     * something.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Ordering Food', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Menu', 1,
                pictures: [['en' => 'Menu', 'img' => 'menu'], ['en' => 'Plate', 'img' => 'plate']],
                plain: [['en' => 'To order'], ['en' => 'Please']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'menu', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El menú, por favor', 'correct' => ['el', 'menú', 'por favor'], 'extra' => ['plato', 'pedir']],
                            'de' => ['sentence' => 'Das Menü, bitte', 'correct' => ['das', 'Menü', 'bitte'], 'extra' => ['Teller', 'bestellen']],
                            'ja' => ['sentence' => 'メニューをお願いします', 'correct' => ['メニュー', 'を', 'お願いします'], 'extra' => ['お皿']],
                            'ko' => ['sentence' => '메뉴 부탁합니다', 'correct' => ['메뉴', '부탁합니다'], 'extra' => ['접시']],
                            'fr' => ['sentence' => "Le menu, s'il vous plaît", 'correct' => ['le', 'menu', "s'il vous plaît"], 'extra' => ['assiette', 'commander']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I would like', 'to order'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera pedir', 'correct' => ['quisiera', 'pedir'], 'extra' => ['menú', 'plato']],
                            'de' => ['sentence' => 'Ich möchte bestellen', 'correct' => ['ich möchte', 'bestellen'], 'extra' => ['Menü', 'Teller']],
                            'ja' => ['sentence' => '注文したいです', 'correct' => ['注文し', 'たいです'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '주문하고 싶습니다', 'correct' => ['주문하고', '싶습니다'], 'extra' => ['메뉴']],
                            'fr' => ['sentence' => 'Je voudrais commander', 'correct' => ['je voudrais', 'commander'], 'extra' => ['menu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'menu', 'and', 'a', 'plate'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El menú y un plato', 'correct' => ['el', 'menú', 'y', 'un', 'plato'], 'extra' => ['pedir']],
                            'de' => ['sentence' => 'Das Menü und ein Teller', 'correct' => ['das', 'Menü', 'und', 'ein', 'Teller'], 'extra' => ['bestellen']],
                            'ja' => ['sentence' => 'メニューとお皿', 'correct' => ['メニュー', 'と', 'お皿'], 'extra' => ['注文する']],
                            'ko' => ['sentence' => '메뉴와 접시', 'correct' => ['메뉴와', '접시'], 'extra' => ['주문하다']],
                            'fr' => ['sentence' => 'Le menu et une assiette', 'correct' => ['le', 'menu', 'et', 'une', 'assiette'], 'extra' => ['commander']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Soup and Salad', 2,
                pictures: [['en' => 'Soup', 'img' => 'soup'], ['en' => 'Salad', 'img' => 'salad']],
                plain: [['en' => "I'll have"], ['en' => 'Dish']],
                phrases: [
                    'a' => [
                        'words' => ["I'll have", 'the', 'soup'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tomo la sopa', 'correct' => ['tomo', 'la', 'sopa'], 'extra' => ['ensalada', 'plato']],
                            'de' => ['sentence' => 'Ich nehme die Suppe', 'correct' => ['ich nehme', 'die', 'Suppe'], 'extra' => ['Salat', 'Gericht']],
                            'ja' => ['sentence' => '私はスープにします', 'correct' => ['私', 'は', 'スープ', 'にします'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '저는 수프로 하겠습니다', 'correct' => ['저는', '수프로', '하겠습니다'], 'extra' => ['샐러드']],
                            'fr' => ['sentence' => 'Je prends la soupe', 'correct' => ['je prends', 'la', 'soupe'], 'extra' => ['salade', 'plat']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'salad', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una ensalada, por favor', 'correct' => ['una', 'ensalada', 'por favor'], 'extra' => ['sopa', 'plato']],
                            'de' => ['sentence' => 'Einen Salat, bitte', 'correct' => ['einen', 'Salat', 'bitte'], 'extra' => ['Suppe', 'Gericht']],
                            'ja' => ['sentence' => 'サラダをお願いします', 'correct' => ['サラダ', 'を', 'お願いします'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '샐러드 부탁합니다', 'correct' => ['샐러드', '부탁합니다'], 'extra' => ['수프']],
                            'fr' => ['sentence' => "Une salade, s'il vous plaît", 'correct' => ['une', 'salade', "s'il vous plaît"], 'extra' => ['soupe']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'dish', 'of', 'the', 'day'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El plato del día', 'correct' => ['el', 'plato', 'de', 'el', 'día'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Das Gericht des Tages', 'correct' => ['das', 'Gericht', 'von', 'dem', 'Tag'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => '本日の料理', 'correct' => ['本', '日', 'の', '料理'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '오늘의 요리', 'correct' => ['오늘의', '요리'], 'extra' => ['수프']],
                            'fr' => ['sentence' => 'Le plat du jour', 'correct' => ['le', 'plat', 'de', 'le', 'jour'], 'extra' => ['soupe']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Chicken or Fish', 3,
                pictures: [['en' => 'Chicken', 'img' => 'chicken'], ['en' => 'Fish', 'img' => 'fish']],
                plain: [['en' => 'Hot'], ['en' => 'For']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'chicken', 'is', 'hot'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pollo está caliente', 'correct' => ['el', 'pollo', 'está', 'caliente'], 'extra' => ['pescado', 'para']],
                            'de' => ['sentence' => 'Das Hähnchen ist heiß', 'correct' => ['das', 'Hähnchen', 'ist', 'heiß'], 'extra' => ['Fisch', 'für']],
                            'ja' => ['sentence' => '鶏肉は熱いです', 'correct' => ['鶏肉', 'は', '熱い', 'です'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기는 뜨겁습니다', 'correct' => ['닭고기는', '뜨겁습니다'], 'extra' => ['생선']],
                            'fr' => ['sentence' => 'Le poulet est chaud', 'correct' => ['le', 'poulet', 'est', 'chaud'], 'extra' => ['poisson', 'pour']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'fish', 'for', 'me'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El pescado para mí', 'correct' => ['el', 'pescado', 'para', 'me'], 'extra' => ['pollo', 'caliente']],
                            'de' => ['sentence' => 'Der Fisch für mich', 'correct' => ['der', 'Fisch', 'für', 'mich'], 'extra' => ['Hähnchen', 'heiß']],
                            'ja' => ['sentence' => '私に魚を', 'correct' => ['私', 'に', '魚', 'を'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '저에게 생선을', 'correct' => ['저에게', '생선을'], 'extra' => ['닭고기']],
                            'fr' => ['sentence' => 'Le poisson pour moi', 'correct' => ['le', 'poisson', 'pour', 'moi'], 'extra' => ['poulet']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'chicken', 'or', 'the', 'fish'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El pollo o el pescado', 'correct' => ['el', 'pollo', 'o', 'el', 'pescado'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Das Hähnchen oder der Fisch', 'correct' => ['das', 'Hähnchen', 'oder', 'der', 'Fisch'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '鶏肉か魚', 'correct' => ['鶏肉', 'か', '魚'], 'extra' => ['熱い']],
                            'ko' => ['sentence' => '닭고기 또는 생선', 'correct' => ['닭고기', '또는', '생선'], 'extra' => ['뜨거운']],
                            'fr' => ['sentence' => 'Le poulet ou le poisson', 'correct' => ['le', 'poulet', 'ou', 'le', 'poisson'], 'extra' => ['chaud']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Meat and Rice', 4,
                pictures: [['en' => 'Meat', 'img' => 'meat'], ['en' => 'Rice', 'img' => 'rice']],
                plain: [['en' => 'Waiter'], ['en' => 'Table']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'meat', 'and', 'the', 'rice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La carne y el arroz', 'correct' => ['la', 'carne', 'y', 'el', 'arroz'], 'extra' => ['camarero', 'mesa']],
                            'de' => ['sentence' => 'Das Fleisch und der Reis', 'correct' => ['das', 'Fleisch', 'und', 'der', 'Reis'], 'extra' => ['Kellner', 'Tisch']],
                            'ja' => ['sentence' => '肉とご飯', 'correct' => ['肉', 'と', 'ご飯'], 'extra' => ['ウェイター']],
                            'ko' => ['sentence' => '고기와 밥', 'correct' => ['고기와', '밥'], 'extra' => ['웨이터']],
                            'fr' => ['sentence' => 'La viande et le riz', 'correct' => ['la', 'viande', 'et', 'le', 'riz'], 'extra' => ['serveur', 'table']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'waiter', 'is', 'here'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El camarero está aquí', 'correct' => ['el', 'camarero', 'está', 'aquí'], 'extra' => ['carne', 'mesa']],
                            'de' => ['sentence' => 'Der Kellner ist hier', 'correct' => ['der', 'Kellner', 'ist', 'hier'], 'extra' => ['Fleisch', 'Tisch']],
                            'ja' => ['sentence' => 'ウェイターはここにいます', 'correct' => ['ウェイター', 'は', 'ここ', 'に', 'います'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '웨이터는 여기 있습니다', 'correct' => ['웨이터는', '여기', '있습니다'], 'extra' => ['고기']],
                            'fr' => ['sentence' => 'Le serveur est ici', 'correct' => ['le', 'serveur', 'est', 'ici'], 'extra' => ['viande']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'table', 'is', 'free'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La mesa está libre', 'correct' => ['la', 'mesa', 'está', 'libre'], 'extra' => ['camarero', 'arroz']],
                            'de' => ['sentence' => 'Der Tisch ist frei', 'correct' => ['der', 'Tisch', 'ist', 'frei'], 'extra' => ['Kellner', 'Reis']],
                            'ja' => ['sentence' => 'テーブルは空いています', 'correct' => ['テーブル', 'は', '空いています'], 'extra' => ['ウェイター']],
                            'ko' => ['sentence' => '테이블은 비어 있습니다', 'correct' => ['테이블은', '비어', '있습니다'], 'extra' => ['웨이터']],
                            'fr' => ['sentence' => 'La table est libre', 'correct' => ['la', 'table', 'est', 'libre'], 'extra' => ['serveur']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: With and Without', 5,
                pictures: [['en' => 'Bread', 'img' => 'bread'], ['en' => 'Cheese', 'img' => 'cheese']],
                plain: [['en' => 'Some'], ['en' => 'Without']],
                phrases: [
                    'a' => [
                        'words' => ['some', 'bread', 'and', 'some', 'cheese'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de pan y algo de queso', 'correct' => ['algo de', 'pan', 'y', 'algo de', 'queso'], 'extra' => ['sin']],
                            'de' => ['sentence' => 'Etwas Brot und etwas Käse', 'correct' => ['etwas', 'Brot', 'und', 'etwas', 'Käse'], 'extra' => ['ohne']],
                            'ja' => ['sentence' => '少しのパンと少しのチーズ', 'correct' => ['少しの', 'パン', 'と', '少しの', 'チーズ'], 'extra' => ['なし']],
                            'ko' => ['sentence' => '약간의 빵과 약간의 치즈', 'correct' => ['약간의', '빵과', '약간의', '치즈'], 'extra' => ['없이']],
                            'fr' => ['sentence' => 'Du pain et du fromage', 'correct' => ['du', 'pain', 'et', 'du', 'fromage'], 'extra' => ['sans']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'soup', 'without', 'salt'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'La sopa sin sal', 'correct' => ['la', 'sopa', 'sin', 'sal'], 'extra' => ['pan', 'queso']],
                            'de' => ['sentence' => 'Die Suppe ohne Salz', 'correct' => ['die', 'Suppe', 'ohne', 'Salz'], 'extra' => ['Brot', 'Käse']],
                            'ja' => ['sentence' => '塩なしのスープ', 'correct' => ['塩', 'なし', 'の', 'スープ'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '소금 없이 수프', 'correct' => ['소금', '없이', '수프'], 'extra' => ['빵']],
                            'fr' => ['sentence' => 'La soupe sans sel', 'correct' => ['la', 'soupe', 'sans', 'sel'], 'extra' => ['pain']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I would like', 'cheese', 'without', 'bread'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera queso sin pan', 'correct' => ['quisiera', 'queso', 'sin', 'pan'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Ich möchte Käse ohne Brot', 'correct' => ['ich möchte', 'Käse', 'ohne', 'Brot'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'パンなしでチーズをください', 'correct' => ['パン', 'なし', 'で', 'チーズ', 'を', 'ください'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '빵 없이 치즈를 주세요', 'correct' => ['빵', '없이', '치즈를', '주세요'], 'extra' => ['수프']],
                            'fr' => ['sentence' => 'Je voudrais du fromage sans pain', 'correct' => ['je voudrais', 'fromage', 'sans', 'pain'], 'extra' => ['soupe']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
