<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant06Seeder extends Seeder
{
    private const PICTURES = [
        'Viande' => 'meat', 'Salade' => 'salad', 'Lait' => 'milk', 'Fromage' => 'cheese',
        'Pain' => 'bread', 'Pomme' => 'apple', 'Soupe' => 'soup', 'Riz' => 'rice',
    ];

    /**
     * French Chapter 3, Unit 6 — diets and allergies.
     *
     * This is the one unit in the chapter where getting a word wrong has real
     * consequences, so it drills the same handful of sentence frames over and
     * over rather than spreading thin: "je suis ...", "une allergie au ...",
     * "sans ...", "... contient ...". Two new linking words (au, aux) are
     * introduced here because you cannot say what you are allergic to without
     * them.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Diet and Allergies', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Am Vegetarian', 1,
                pictures: [['fr' => 'Viande', 'img' => 'meat'], ['fr' => 'Salade', 'img' => 'salad']],
                plain: [['fr' => 'Végétarien'], ['fr' => 'Manger']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'végétarien'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am vegetarian', 'correct' => ['I am', 'vegetarian'], 'extra' => ['to eat', 'meat']],
                            'es' => ['sentence' => 'Soy vegetariano', 'correct' => ['soy', 'vegetariano'], 'extra' => ['comer', 'carne']],
                            'de' => ['sentence' => 'Ich bin Vegetarier', 'correct' => ['ich bin', 'Vegetarier'], 'extra' => ['essen', 'Fleisch']],
                            'ja' => ['sentence' => '私はベジタリアンです', 'correct' => ['私', 'は', 'ベジタリアン', 'です'], 'extra' => ['食べる', '肉']],
                            'ko' => ['sentence' => '저는 채식주의자입니다', 'correct' => ['저는', '채식주의자입니다'], 'extra' => ['먹다', '고기']],
                        ],
                    ],
                    'b' => [
                        'words' => ['manger', 'une', 'salade'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To eat a salad', 'correct' => ['to eat', 'a', 'salad'], 'extra' => ['vegetarian', 'meat']],
                            'es' => ['sentence' => 'Comer una ensalada', 'correct' => ['comer', 'una', 'ensalada'], 'extra' => ['vegetariano', 'carne']],
                            'de' => ['sentence' => 'Einen Salat essen', 'correct' => ['einen', 'Salat', 'essen'], 'extra' => ['vegetarisch', 'Fleisch']],
                            'ja' => ['sentence' => 'サラダを食べる', 'correct' => ['サラダ', 'を', '食べる'], 'extra' => ['ベジタリアン']],
                            'ko' => ['sentence' => '샐러드를 먹다', 'correct' => ['샐러드를', '먹다'], 'extra' => ['채식주의자']],
                        ],
                    ],
                    'c' => [
                        'words' => ['manger', 'sans', 'viande'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To eat without meat', 'correct' => ['to eat', 'without', 'meat'], 'extra' => ['vegetarian', 'salad']],
                            'es' => ['sentence' => 'Comer sin carne', 'correct' => ['comer', 'sin', 'carne'], 'extra' => ['vegetariano', 'ensalada']],
                            'de' => ['sentence' => 'Ohne Fleisch essen', 'correct' => ['ohne', 'Fleisch', 'essen'], 'extra' => ['vegetarisch', 'Salat']],
                            'ja' => ['sentence' => '肉なしで食べる', 'correct' => ['肉', 'なし', 'で', '食べる'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '고기 없이 먹다', 'correct' => ['고기', '없이', '먹다'], 'extra' => ['샐러드']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: I Am Allergic', 2,
                pictures: [['fr' => 'Lait', 'img' => 'milk'], ['fr' => 'Fromage', 'img' => 'cheese']],
                plain: [['fr' => 'Allergique'], ['fr' => 'Allergie']],
                phrases: [
                    'a' => [
                        'words' => ['je suis', 'allergique', 'au', 'lait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am allergic to milk', 'correct' => ['I am', 'allergic', 'to the', 'milk'], 'extra' => ['allergy', 'cheese']],
                            'es' => ['sentence' => 'Soy alérgico a la leche', 'correct' => ['soy', 'alérgico', 'al', 'leche'], 'extra' => ['alergia', 'queso']],
                            'de' => ['sentence' => 'Ich bin allergisch gegen Milch', 'correct' => ['ich bin', 'allergisch', 'zum', 'Milch'], 'extra' => ['Allergie', 'Käse']],
                            'ja' => ['sentence' => '私は牛乳アレルギーです', 'correct' => ['私', 'は', '牛乳', 'アレルギー', 'です'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '저는 우유 알레르기가 있습니다', 'correct' => ['저는', '우유', '알레르기가', '있습니다'], 'extra' => ['치즈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'allergie', 'au', 'fromage'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'An allergy to cheese', 'correct' => ['an', 'allergy', 'to the', 'cheese'], 'extra' => ['allergic', 'milk']],
                            'es' => ['sentence' => 'Una alergia al queso', 'correct' => ['una', 'alergia', 'al', 'queso'], 'extra' => ['alérgico', 'leche']],
                            'de' => ['sentence' => 'Eine Allergie gegen Käse', 'correct' => ['eine', 'Allergie', 'zum', 'Käse'], 'extra' => ['allergisch', 'Milch']],
                            'ja' => ['sentence' => 'チーズのアレルギー', 'correct' => ['チーズ', 'の', 'アレルギー'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '치즈 알레르기', 'correct' => ['치즈', '알레르기'], 'extra' => ['우유']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sans', 'lait', 'et', 'sans', 'fromage'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Without milk and without cheese', 'correct' => ['without', 'milk', 'and', 'without', 'cheese'], 'extra' => ['allergy']],
                            'es' => ['sentence' => 'Sin leche y sin queso', 'correct' => ['sin', 'leche', 'y', 'sin', 'queso'], 'extra' => ['alergia']],
                            'de' => ['sentence' => 'Ohne Milch und ohne Käse', 'correct' => ['ohne', 'Milch', 'und', 'ohne', 'Käse'], 'extra' => ['Allergie']],
                            'ja' => ['sentence' => '牛乳なしでチーズなしで', 'correct' => ['牛乳', 'なし', 'で', 'チーズ', 'なし', 'で'], 'extra' => ['アレルギー']],
                            'ko' => ['sentence' => '우유 없이 그리고 치즈 없이', 'correct' => ['우유', '없이', '그리고', '치즈', '없이'], 'extra' => ['알레르기']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Gluten and Nuts', 3,
                pictures: [['fr' => 'Pain', 'img' => 'bread'], ['fr' => 'Pomme', 'img' => 'apple']],
                plain: [['fr' => 'Gluten'], ['fr' => 'Noix']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'pain', 'avec', 'du', 'gluten'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The bread with gluten', 'correct' => ['the', 'bread', 'with', 'some', 'gluten'], 'extra' => ['nuts', 'apple']],
                            'es' => ['sentence' => 'El pan con gluten', 'correct' => ['el', 'pan', 'con', 'algo de', 'gluten'], 'extra' => ['nueces', 'manzana']],
                            'de' => ['sentence' => 'Das Brot mit Gluten', 'correct' => ['das', 'Brot', 'mit', 'etwas', 'Gluten'], 'extra' => ['Nüsse', 'Apfel']],
                            'ja' => ['sentence' => 'グルテン入りのパン', 'correct' => ['グルテン', '入り', 'の', 'パン'], 'extra' => ['ナッツ']],
                            'ko' => ['sentence' => '글루텐이 든 빵', 'correct' => ['글루텐이', '든', '빵'], 'extra' => ['견과류']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'allergie', 'aux', 'noix'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'An allergy to nuts', 'correct' => ['an', 'allergy', 'to the', 'nuts'], 'extra' => ['gluten', 'bread']],
                            'es' => ['sentence' => 'Una alergia a las nueces', 'correct' => ['una', 'alergia', 'a los', 'nueces'], 'extra' => ['gluten', 'pan']],
                            'de' => ['sentence' => 'Eine Allergie gegen Nüsse', 'correct' => ['eine', 'Allergie', 'zu den', 'Nüsse'], 'extra' => ['Gluten', 'Brot']],
                            'ja' => ['sentence' => 'ナッツのアレルギー', 'correct' => ['ナッツ', 'の', 'アレルギー'], 'extra' => ['グルテン']],
                            'ko' => ['sentence' => '견과류 알레르기', 'correct' => ['견과류', '알레르기'], 'extra' => ['글루텐']],
                        ],
                    ],
                    'c' => [
                        'words' => ['du', 'pain', 'et', 'une', 'pomme'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Some bread and an apple', 'correct' => ['some', 'bread', 'and', 'an', 'apple'], 'extra' => ['gluten', 'nuts']],
                            'es' => ['sentence' => 'Algo de pan y una manzana', 'correct' => ['algo de', 'pan', 'y', 'una', 'manzana'], 'extra' => ['gluten', 'nueces']],
                            'de' => ['sentence' => 'Etwas Brot und ein Apfel', 'correct' => ['etwas', 'Brot', 'und', 'ein', 'Apfel'], 'extra' => ['Gluten', 'Nüsse']],
                            'ja' => ['sentence' => '少しのパンとりんご', 'correct' => ['少しの', 'パン', 'と', 'りんご'], 'extra' => ['グルテン']],
                            'ko' => ['sentence' => '약간의 빵과 사과', 'correct' => ['약간의', '빵과', '사과'], 'extra' => ['글루텐']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: What Is In It', 4,
                pictures: [['fr' => 'Soupe', 'img' => 'soup'], ['fr' => 'Riz', 'img' => 'rice']],
                plain: [['fr' => 'Ingrédients'], ['fr' => 'Contient']],
                phrases: [
                    'a' => [
                        'words' => ['la', 'soupe', 'contient', 'du', 'sel'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'The soup contains salt', 'correct' => ['the', 'soup', 'contains', 'some', 'salt'], 'extra' => ['ingredients', 'rice']],
                            'es' => ['sentence' => 'La sopa contiene sal', 'correct' => ['la', 'sopa', 'contiene', 'algo de', 'sal'], 'extra' => ['ingredientes', 'arroz']],
                            'de' => ['sentence' => 'Die Suppe enthält Salz', 'correct' => ['die', 'Suppe', 'enthält', 'etwas', 'Salz'], 'extra' => ['Zutaten', 'Reis']],
                            'ja' => ['sentence' => 'スープは塩を含む', 'correct' => ['スープ', 'は', '塩', 'を', '含む'], 'extra' => ['材料']],
                            'ko' => ['sentence' => '수프는 소금이 들어있습니다', 'correct' => ['수프는', '소금이', '들어있습니다'], 'extra' => ['재료']],
                        ],
                    ],
                    'b' => [
                        'words' => ['les', 'ingrédients', 'du', 'riz'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The ingredients of the rice', 'correct' => ['the', 'ingredients', 'of the', 'rice'], 'extra' => ['contains', 'soup']],
                            'es' => ['sentence' => 'Los ingredientes del arroz', 'correct' => ['los', 'ingredientes', 'del', 'arroz'], 'extra' => ['contiene', 'sopa']],
                            'de' => ['sentence' => 'Die Zutaten des Reises', 'correct' => ['die', 'Zutaten', 'des', 'Reises'], 'extra' => ['enthält', 'Suppe']],
                            'ja' => ['sentence' => 'ご飯の材料', 'correct' => ['ご飯', 'の', '材料'], 'extra' => ['含む']],
                            'ko' => ['sentence' => '밥의 재료', 'correct' => ['밥의', '재료'], 'extra' => ['들어있다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['les', 'ingrédients', 'de', 'la', 'soupe'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The ingredients of the soup', 'correct' => ['the', 'ingredients', 'of', 'the', 'soup'], 'extra' => ['contains', 'rice']],
                            'es' => ['sentence' => 'Los ingredientes de la sopa', 'correct' => ['los', 'ingredientes', 'de', 'la', 'sopa'], 'extra' => ['contiene', 'arroz']],
                            'de' => ['sentence' => 'Die Zutaten der Suppe', 'correct' => ['die', 'Zutaten', 'von', 'der', 'Suppe'], 'extra' => ['enthält', 'Reis']],
                            'ja' => ['sentence' => 'スープの材料', 'correct' => ['スープ', 'の', '材料'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '수프의 재료', 'correct' => ['수프의', '재료'], 'extra' => ['밥']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: I Avoid That', 5,
                pictures: [['fr' => 'Fromage', 'img' => 'cheese'], ['fr' => 'Viande', 'img' => 'meat']],
                plain: [['fr' => 'Éviter'], ['fr' => 'Régime']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'éviter', 'le', 'fromage'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to avoid the cheese', 'correct' => ['I would like', 'to avoid', 'the', 'cheese'], 'extra' => ['diet', 'meat']],
                            'es' => ['sentence' => 'Quisiera evitar el queso', 'correct' => ['quisiera', 'evitar', 'el', 'queso'], 'extra' => ['dieta', 'carne']],
                            'de' => ['sentence' => 'Ich möchte den Käse vermeiden', 'correct' => ['ich möchte', 'den', 'Käse', 'vermeiden'], 'extra' => ['Diät', 'Fleisch']],
                            'ja' => ['sentence' => 'チーズを避けたいです', 'correct' => ['チーズ', 'を', '避け', 'たいです'], 'extra' => ['食事制限']],
                            'ko' => ['sentence' => '치즈를 피하고 싶습니다', 'correct' => ['치즈를', '피하고', '싶습니다'], 'extra' => ['식단']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'régime', 'sans', 'viande'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A diet without meat', 'correct' => ['a', 'diet', 'without', 'meat'], 'extra' => ['to avoid', 'cheese']],
                            'es' => ['sentence' => 'Una dieta sin carne', 'correct' => ['una', 'dieta', 'sin', 'carne'], 'extra' => ['evitar', 'queso']],
                            'de' => ['sentence' => 'Eine Diät ohne Fleisch', 'correct' => ['eine', 'Diät', 'ohne', 'Fleisch'], 'extra' => ['vermeiden', 'Käse']],
                            'ja' => ['sentence' => '肉なしの食事制限', 'correct' => ['肉', 'なし', 'の', '食事制限'], 'extra' => ['避ける']],
                            'ko' => ['sentence' => '고기 없는 식단', 'correct' => ['고기', '없는', '식단'], 'extra' => ['피하다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['éviter', 'la', 'viande', 'et', 'le', 'fromage'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To avoid the meat and the cheese', 'correct' => ['to avoid', 'the', 'meat', 'and', 'the', 'cheese'], 'extra' => ['diet']],
                            'es' => ['sentence' => 'Evitar la carne y el queso', 'correct' => ['evitar', 'la', 'carne', 'y', 'el', 'queso'], 'extra' => ['dieta']],
                            'de' => ['sentence' => 'Das Fleisch und den Käse vermeiden', 'correct' => ['das', 'Fleisch', 'und', 'den', 'Käse', 'vermeiden'], 'extra' => ['Diät']],
                            'ja' => ['sentence' => '肉とチーズを避ける', 'correct' => ['肉', 'と', 'チーズ', 'を', '避ける'], 'extra' => ['食事制限']],
                            'ko' => ['sentence' => '고기와 치즈를 피하다', 'correct' => ['고기와', '치즈를', '피하다'], 'extra' => ['식단']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
