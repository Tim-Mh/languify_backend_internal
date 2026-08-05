<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant01Seeder extends Seeder
{
    private const PICTURES = ['메뉴' => 'menu', '접시' => 'plate', '수프' => 'soup', '샐러드' => 'salad', '닭고기' => 'chicken', '생선' => 'fish', '고기' => 'meat', '밥' => 'rice', '빵' => 'bread', '치즈' => 'cheese'];

    /**
     * Korean Restaurant, Unit 1, the Korean twin of the English "Ordering Food" unit.
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

        $builder->seedUnit($chapter->id, 1, '유닛 1: 음식 주문하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 메뉴 · 접시', 1,
                pictures: [['ko' => '메뉴', 'img' => 'menu'], ['ko' => '접시', 'img' => 'plate']],
                plain: [['ko' => '주문하다'], ['ko' => '부탁합니다']],
                phrases: [
                    'a' => [
                        'words' => ['메뉴', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the menu please', 'correct' => ['the', 'menu', 'please'], 'extra' => ['plate']],
                            'es' => ['sentence' => 'El menú, por favor', 'correct' => ['el', 'menú', 'por favor'], 'extra' => ['plato', 'pedir']],
                            'de' => ['sentence' => 'Das Menü, bitte', 'correct' => ['das', 'Menü', 'bitte'], 'extra' => ['Teller', 'bestellen']],
                            'fr' => ['sentence' => 'Le menu, s\'il vous plaît', 'correct' => ['le', 'menu', 's\'il vous plaît'], 'extra' => ['assiette', 'commander']],
                            'ja' => ['sentence' => 'メニューをお願いします', 'correct' => ['メニュー', 'を', 'お願いします'], 'extra' => ['お皿']],
                        ],
                    ],
                    'b' => [
                        'words' => ['주문하고', '싶습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to order', 'correct' => ['I would like', 'to order'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Quisiera pedir', 'correct' => ['quisiera', 'pedir'], 'extra' => ['menú', 'plato']],
                            'de' => ['sentence' => 'Ich möchte bestellen', 'correct' => ['ich möchte', 'bestellen'], 'extra' => ['Menü', 'Teller']],
                            'fr' => ['sentence' => 'Je voudrais commander', 'correct' => ['je voudrais', 'commander'], 'extra' => ['menu']],
                            'ja' => ['sentence' => '注文したいです', 'correct' => ['注文し', 'たいです'], 'extra' => ['メニュー']],
                        ],
                    ],
                    'c' => [
                        'words' => ['메뉴와', '접시'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the menu and a plate', 'correct' => ['the', 'menu', 'and', 'a', 'plate'], 'extra' => ['to order']],
                            'es' => ['sentence' => 'El menú y un plato', 'correct' => ['el', 'menú', 'y', 'un', 'plato'], 'extra' => ['pedir']],
                            'de' => ['sentence' => 'Das Menü und ein Teller', 'correct' => ['das', 'Menü', 'und', 'ein', 'Teller'], 'extra' => ['bestellen']],
                            'fr' => ['sentence' => 'Le menu et une assiette', 'correct' => ['le', 'menu', 'et', 'une', 'assiette'], 'extra' => ['commander']],
                            'ja' => ['sentence' => 'メニューとお皿', 'correct' => ['メニュー', 'と', 'お皿'], 'extra' => ['注文する']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 수프 · 샐러드', 2,
                pictures: [['ko' => '수프', 'img' => 'soup'], ['ko' => '샐러드', 'img' => 'salad']],
                plain: [['ko' => '하겠습니다'], ['ko' => '요리']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '수프로', '하겠습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I\'ll have the soup', 'correct' => ['I\'ll have', 'the', 'soup'], 'extra' => ['salad']],
                            'es' => ['sentence' => 'Tomo la sopa', 'correct' => ['tomo', 'la', 'sopa'], 'extra' => ['ensalada', 'plato']],
                            'de' => ['sentence' => 'Ich nehme die Suppe', 'correct' => ['ich nehme', 'die', 'Suppe'], 'extra' => ['Salat', 'Gericht']],
                            'fr' => ['sentence' => 'Je prends la soupe', 'correct' => ['je prends', 'la', 'soupe'], 'extra' => ['salade', 'plat']],
                            'ja' => ['sentence' => '私はスープにします', 'correct' => ['私', 'は', 'スープ', 'にします'], 'extra' => ['サラダ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['샐러드', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a salad please', 'correct' => ['a', 'salad', 'please'], 'extra' => ['soup']],
                            'es' => ['sentence' => 'Una ensalada, por favor', 'correct' => ['una', 'ensalada', 'por favor'], 'extra' => ['sopa', 'plato']],
                            'de' => ['sentence' => 'Einen Salat, bitte', 'correct' => ['einen', 'Salat', 'bitte'], 'extra' => ['Suppe', 'Gericht']],
                            'fr' => ['sentence' => 'Une salade, s\'il vous plaît', 'correct' => ['une', 'salade', 's\'il vous plaît'], 'extra' => ['soupe']],
                            'ja' => ['sentence' => 'サラダをお願いします', 'correct' => ['サラダ', 'を', 'お願いします'], 'extra' => ['スープ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['오늘의', '요리'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the dish of the day', 'correct' => ['the', 'dish', 'of', 'the', 'day'], 'extra' => ['soup']],
                            'es' => ['sentence' => 'El plato del día', 'correct' => ['el', 'plato', 'de', 'el', 'día'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Das Gericht des Tages', 'correct' => ['das', 'Gericht', 'von', 'dem', 'Tag'], 'extra' => ['Suppe']],
                            'fr' => ['sentence' => 'Le plat du jour', 'correct' => ['le', 'plat', 'de', 'le', 'jour'], 'extra' => ['soupe']],
                            'ja' => ['sentence' => '本日の料理', 'correct' => ['本', '日', 'の', '料理'], 'extra' => ['スープ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 닭고기 · 생선', 3,
                pictures: [['ko' => '닭고기', 'img' => 'chicken'], ['ko' => '생선', 'img' => 'fish']],
                plain: [['ko' => '뜨거운'], ['ko' => '위해']],
                phrases: [
                    'a' => [
                        'words' => ['닭고기는', '뜨겁습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the chicken is hot', 'correct' => ['the', 'chicken', 'is', 'hot'], 'extra' => ['fish']],
                            'es' => ['sentence' => 'El pollo está caliente', 'correct' => ['el', 'pollo', 'está', 'caliente'], 'extra' => ['pescado', 'para']],
                            'de' => ['sentence' => 'Das Hähnchen ist heiß', 'correct' => ['das', 'Hähnchen', 'ist', 'heiß'], 'extra' => ['Fisch', 'für']],
                            'fr' => ['sentence' => 'Le poulet est chaud', 'correct' => ['le', 'poulet', 'est', 'chaud'], 'extra' => ['poisson', 'pour']],
                            'ja' => ['sentence' => '鶏肉は熱いです', 'correct' => ['鶏肉', 'は', '熱い', 'です'], 'extra' => ['魚']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저에게', '생선을'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the fish for me', 'correct' => ['the', 'fish', 'for', 'me'], 'extra' => ['chicken']],
                            'es' => ['sentence' => 'El pescado para mí', 'correct' => ['el', 'pescado', 'para', 'me'], 'extra' => ['pollo', 'caliente']],
                            'de' => ['sentence' => 'Der Fisch für mich', 'correct' => ['der', 'Fisch', 'für', 'mich'], 'extra' => ['Hähnchen', 'heiß']],
                            'fr' => ['sentence' => 'Le poisson pour moi', 'correct' => ['le', 'poisson', 'pour', 'moi'], 'extra' => ['poulet']],
                            'ja' => ['sentence' => '私に魚を', 'correct' => ['私', 'に', '魚', 'を'], 'extra' => ['鶏肉']],
                        ],
                    ],
                    'c' => [
                        'words' => ['닭고기', '또는', '생선'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the chicken or the fish', 'correct' => ['the', 'chicken', 'or', 'the', 'fish'], 'extra' => ['hot']],
                            'es' => ['sentence' => 'El pollo o el pescado', 'correct' => ['el', 'pollo', 'o', 'el', 'pescado'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Das Hähnchen oder der Fisch', 'correct' => ['das', 'Hähnchen', 'oder', 'der', 'Fisch'], 'extra' => ['heiß']],
                            'fr' => ['sentence' => 'Le poulet ou le poisson', 'correct' => ['le', 'poulet', 'ou', 'le', 'poisson'], 'extra' => ['chaud']],
                            'ja' => ['sentence' => '鶏肉か魚', 'correct' => ['鶏肉', 'か', '魚'], 'extra' => ['熱い']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 고기 · 밥', 4,
                pictures: [['ko' => '고기', 'img' => 'meat'], ['ko' => '밥', 'img' => 'rice']],
                plain: [['ko' => '웨이터'], ['ko' => '탁자']],
                phrases: [
                    'a' => [
                        'words' => ['고기와', '밥'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the meat and the rice', 'correct' => ['the', 'meat', 'and', 'the', 'rice'], 'extra' => ['waiter']],
                            'es' => ['sentence' => 'La carne y el arroz', 'correct' => ['la', 'carne', 'y', 'el', 'arroz'], 'extra' => ['camarero', 'mesa']],
                            'de' => ['sentence' => 'Das Fleisch und der Reis', 'correct' => ['das', 'Fleisch', 'und', 'der', 'Reis'], 'extra' => ['Kellner', 'Tisch']],
                            'fr' => ['sentence' => 'La viande et le riz', 'correct' => ['la', 'viande', 'et', 'le', 'riz'], 'extra' => ['serveur', 'table']],
                            'ja' => ['sentence' => '肉とご飯', 'correct' => ['肉', 'と', 'ご飯'], 'extra' => ['ウェイター']],
                        ],
                    ],
                    'b' => [
                        'words' => ['웨이터는', '여기', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the waiter is here', 'correct' => ['the', 'waiter', 'is', 'here'], 'extra' => ['meat']],
                            'es' => ['sentence' => 'El camarero está aquí', 'correct' => ['el', 'camarero', 'está', 'aquí'], 'extra' => ['carne', 'mesa']],
                            'de' => ['sentence' => 'Der Kellner ist hier', 'correct' => ['der', 'Kellner', 'ist', 'hier'], 'extra' => ['Fleisch', 'Tisch']],
                            'fr' => ['sentence' => 'Le serveur est ici', 'correct' => ['le', 'serveur', 'est', 'ici'], 'extra' => ['viande']],
                            'ja' => ['sentence' => 'ウェイターはここにいます', 'correct' => ['ウェイター', 'は', 'ここ', 'に', 'います'], 'extra' => ['肉']],
                        ],
                    ],
                    'c' => [
                        'words' => ['테이블은', '비어', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the table is free', 'correct' => ['the', 'table', 'is', 'free'], 'extra' => ['waiter']],
                            'es' => ['sentence' => 'La mesa está libre', 'correct' => ['la', 'mesa', 'está', 'libre'], 'extra' => ['camarero', 'arroz']],
                            'de' => ['sentence' => 'Der Tisch ist frei', 'correct' => ['der', 'Tisch', 'ist', 'frei'], 'extra' => ['Kellner', 'Reis']],
                            'fr' => ['sentence' => 'La table est libre', 'correct' => ['la', 'table', 'est', 'libre'], 'extra' => ['serveur']],
                            'ja' => ['sentence' => 'テーブルは空いています', 'correct' => ['テーブル', 'は', '空いています'], 'extra' => ['ウェイター']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 빵 · 치즈', 5,
                pictures: [['ko' => '빵', 'img' => 'bread'], ['ko' => '치즈', 'img' => 'cheese']],
                plain: [['ko' => '약간의'], ['ko' => '없이']],
                phrases: [
                    'a' => [
                        'words' => ['약간의', '빵과', '약간의', '치즈'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'some bread and some cheese', 'correct' => ['some', 'bread', 'and', 'some', 'cheese'], 'extra' => ['without']],
                            'es' => ['sentence' => 'Algo de pan y algo de queso', 'correct' => ['algo de', 'pan', 'y', 'algo de', 'queso'], 'extra' => ['sin']],
                            'de' => ['sentence' => 'Etwas Brot und etwas Käse', 'correct' => ['etwas', 'Brot', 'und', 'etwas', 'Käse'], 'extra' => ['ohne']],
                            'fr' => ['sentence' => 'Du pain et du fromage', 'correct' => ['du', 'pain', 'et', 'du', 'fromage'], 'extra' => ['sans']],
                            'ja' => ['sentence' => '少しのパンと少しのチーズ', 'correct' => ['少しの', 'パン', 'と', '少しの', 'チーズ'], 'extra' => ['なし']],
                        ],
                    ],
                    'b' => [
                        'words' => ['소금', '없이', '수프'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the soup without salt', 'correct' => ['the', 'soup', 'without', 'salt'], 'extra' => ['bread']],
                            'es' => ['sentence' => 'La sopa sin sal', 'correct' => ['la', 'sopa', 'sin', 'sal'], 'extra' => ['pan', 'queso']],
                            'de' => ['sentence' => 'Die Suppe ohne Salz', 'correct' => ['die', 'Suppe', 'ohne', 'Salz'], 'extra' => ['Brot', 'Käse']],
                            'fr' => ['sentence' => 'La soupe sans sel', 'correct' => ['la', 'soupe', 'sans', 'sel'], 'extra' => ['pain']],
                            'ja' => ['sentence' => '塩なしのスープ', 'correct' => ['塩', 'なし', 'の', 'スープ'], 'extra' => ['パン']],
                        ],
                    ],
                    'c' => [
                        'words' => ['빵', '없이', '치즈를', '주세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I would like cheese without bread', 'correct' => ['I would like', 'cheese', 'without', 'bread'], 'extra' => ['soup']],
                            'es' => ['sentence' => 'Quisiera queso sin pan', 'correct' => ['quisiera', 'queso', 'sin', 'pan'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Ich möchte Käse ohne Brot', 'correct' => ['ich möchte', 'Käse', 'ohne', 'Brot'], 'extra' => ['Suppe']],
                            'fr' => ['sentence' => 'Je voudrais du fromage sans pain', 'correct' => ['je voudrais', 'fromage', 'sans', 'pain'], 'extra' => ['soupe']],
                            'ja' => ['sentence' => 'パンなしでチーズをください', 'correct' => ['パン', 'なし', 'で', 'チーズ', 'を', 'ください'], 'extra' => ['スープ']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
