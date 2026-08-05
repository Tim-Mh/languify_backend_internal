<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant06Seeder extends Seeder
{
    private const PICTURES = ['고기' => 'meat', '샐러드' => 'salad', '우유' => 'milk', '치즈' => 'cheese', '빵' => 'bread', '수프' => 'soup', '밥' => 'rice'];

    /**
     * Korean Restaurant, Unit 6, the Korean twin of the English "Diet and Allergies" unit.
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

        $builder->seedUnit($chapter->id, 6, '유닛 6: 식단과 알레르기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 고기 · 샐러드', 1,
                pictures: [['ko' => '고기', 'img' => 'meat'], ['ko' => '샐러드', 'img' => 'salad']],
                plain: [['ko' => '채식주의자'], ['ko' => '먹다']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '채식주의자입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am vegetarian', 'correct' => ['I am', 'vegetarian'], 'extra' => ['eat']],
                            'es' => ['sentence' => 'Soy vegetariano', 'correct' => ['soy', 'vegetariano'], 'extra' => ['comer', 'carne']],
                            'de' => ['sentence' => 'Ich bin Vegetarier', 'correct' => ['ich bin', 'Vegetarier'], 'extra' => ['essen', 'Fleisch']],
                            'fr' => ['sentence' => 'Je suis végétarien', 'correct' => ['je suis', 'végétarien'], 'extra' => ['manger', 'viande']],
                            'ja' => ['sentence' => '私はベジタリアンです', 'correct' => ['私', 'は', 'ベジタリアン', 'です'], 'extra' => ['食べる']],
                        ],
                    ],
                    'b' => [
                        'words' => ['샐러드를', '드세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'eat a salad', 'correct' => ['eat', 'a', 'salad'], 'extra' => ['vegetarian']],
                            'es' => ['sentence' => 'Comer una ensalada', 'correct' => ['comer', 'una', 'ensalada'], 'extra' => ['vegetariano', 'carne']],
                            'de' => ['sentence' => 'Einen Salat essen', 'correct' => ['einen', 'Salat', 'essen'], 'extra' => ['vegetarisch', 'Fleisch']],
                            'fr' => ['sentence' => 'Manger une salade', 'correct' => ['manger', 'une', 'salade'], 'extra' => ['végétarien']],
                            'ja' => ['sentence' => 'サラダを食べる', 'correct' => ['サラダ', 'を', '食べる'], 'extra' => ['ベジタリアン']],
                        ],
                    ],
                    'c' => [
                        'words' => ['고기', '없이', '드세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'eat without meat', 'correct' => ['eat', 'without', 'meat'], 'extra' => ['salad']],
                            'es' => ['sentence' => 'Comer sin carne', 'correct' => ['comer', 'sin', 'carne'], 'extra' => ['vegetariano', 'ensalada']],
                            'de' => ['sentence' => 'Ohne Fleisch essen', 'correct' => ['ohne', 'Fleisch', 'essen'], 'extra' => ['vegetarisch', 'Salat']],
                            'fr' => ['sentence' => 'Manger sans viande', 'correct' => ['manger', 'sans', 'viande'], 'extra' => ['salade']],
                            'ja' => ['sentence' => '肉なしで食べる', 'correct' => ['肉', 'なし', 'で', '食べる'], 'extra' => ['サラダ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 우유 · 치즈', 2,
                pictures: [['ko' => '우유', 'img' => 'milk'], ['ko' => '치즈', 'img' => 'cheese']],
                plain: [['ko' => '알레르기가 있는'], ['ko' => '알레르기']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '우유', '알레르기가', '있습니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am allergic to milk', 'correct' => ['I am', 'allergic', 'to', 'milk'], 'extra' => ['cheese']],
                            'es' => ['sentence' => 'Soy alérgico a la leche', 'correct' => ['soy', 'alérgico', 'a', 'leche'], 'extra' => ['alergia', 'queso']],
                            'de' => ['sentence' => 'Ich bin allergisch gegen Milch', 'correct' => ['ich bin', 'allergisch', 'zu', 'Milch'], 'extra' => ['Allergie', 'Käse']],
                            'fr' => ['sentence' => 'Je suis allergique au lait', 'correct' => ['je suis', 'allergique', 'à', 'lait'], 'extra' => ['allergie', 'fromage']],
                            'ja' => ['sentence' => '私は牛乳アレルギーです', 'correct' => ['私', 'は', '牛乳', 'アレルギー', 'です'], 'extra' => ['チーズ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['치즈', '알레르기'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'an allergy to cheese', 'correct' => ['an', 'allergy', 'to', 'cheese'], 'extra' => ['milk']],
                            'es' => ['sentence' => 'Una alergia al queso', 'correct' => ['una', 'alergia', 'a', 'queso'], 'extra' => ['alérgico', 'leche']],
                            'de' => ['sentence' => 'Eine Allergie gegen Käse', 'correct' => ['eine', 'Allergie', 'zu', 'Käse'], 'extra' => ['allergisch', 'Milch']],
                            'fr' => ['sentence' => 'Une allergie au fromage', 'correct' => ['une', 'allergie', 'à', 'fromage'], 'extra' => ['allergique']],
                            'ja' => ['sentence' => 'チーズのアレルギー', 'correct' => ['チーズ', 'の', 'アレルギー'], 'extra' => ['牛乳']],
                        ],
                    ],
                    'c' => [
                        'words' => ['우유', '없이', '그리고', '치즈', '없이'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'without milk and without cheese', 'correct' => ['without', 'milk', 'and', 'without', 'cheese'], 'extra' => ['allergy']],
                            'es' => ['sentence' => 'Sin leche y sin queso', 'correct' => ['sin', 'leche', 'y', 'sin', 'queso'], 'extra' => ['alergia']],
                            'de' => ['sentence' => 'Ohne Milch und ohne Käse', 'correct' => ['ohne', 'Milch', 'und', 'ohne', 'Käse'], 'extra' => ['Allergie']],
                            'fr' => ['sentence' => 'Sans lait et sans fromage', 'correct' => ['sans', 'lait', 'et', 'sans', 'fromage'], 'extra' => ['allergie']],
                            'ja' => ['sentence' => '牛乳なしでチーズなしで', 'correct' => ['牛乳', 'なし', 'で', 'チーズ', 'なし', 'で'], 'extra' => ['アレルギー']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 빵 · 치즈', 3,
                pictures: [['ko' => '빵', 'img' => 'bread'], ['ko' => '치즈', 'img' => 'cheese']],
                plain: [['ko' => '글루텐'], ['ko' => '견과류']],
                phrases: [
                    'a' => [
                        'words' => ['글루텐이', '든', '빵'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the bread with gluten', 'correct' => ['the', 'bread', 'with', 'gluten'], 'extra' => ['nuts']],
                            'es' => ['sentence' => 'El pan con gluten', 'correct' => ['el', 'pan', 'con', 'gluten'], 'extra' => ['nueces']],
                            'de' => ['sentence' => 'Das Brot mit Gluten', 'correct' => ['das', 'Brot', 'mit', 'Gluten'], 'extra' => ['Nüsse']],
                            'fr' => ['sentence' => 'Le pain avec du gluten', 'correct' => ['le', 'pain', 'avec', 'gluten'], 'extra' => ['noix']],
                            'ja' => ['sentence' => 'グルテン入りのパン', 'correct' => ['グルテン', '入り', 'の', 'パン'], 'extra' => ['ナッツ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['견과류', '알레르기'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'an allergy to nuts', 'correct' => ['an', 'allergy', 'to', 'nuts'], 'extra' => ['gluten']],
                            'es' => ['sentence' => 'Una alergia a las nueces', 'correct' => ['una', 'alergia', 'a', 'nueces'], 'extra' => ['gluten', 'pan']],
                            'de' => ['sentence' => 'Eine Allergie gegen Nüsse', 'correct' => ['eine', 'Allergie', 'zu', 'Nüsse'], 'extra' => ['Gluten', 'Brot']],
                            'fr' => ['sentence' => 'Une allergie aux noix', 'correct' => ['une', 'allergie', 'à', 'noix'], 'extra' => ['gluten']],
                            'ja' => ['sentence' => 'ナッツのアレルギー', 'correct' => ['ナッツ', 'の', 'アレルギー'], 'extra' => ['グルテン']],
                        ],
                    ],
                    'c' => [
                        'words' => ['견과류', '없는', '빵과', '치즈'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'bread and cheese without nuts', 'correct' => ['bread', 'and', 'cheese', 'without', 'nuts'], 'extra' => ['gluten']],
                            'es' => ['sentence' => 'Pan y queso sin nueces', 'correct' => ['pan', 'y', 'queso', 'sin', 'nueces'], 'extra' => ['gluten']],
                            'de' => ['sentence' => 'Brot und Käse ohne Nüsse', 'correct' => ['Brot', 'und', 'Käse', 'ohne', 'Nüsse'], 'extra' => ['Gluten']],
                            'fr' => ['sentence' => 'Pain et fromage sans noix', 'correct' => ['pain', 'et', 'fromage', 'sans', 'noix'], 'extra' => ['gluten']],
                            'ja' => ['sentence' => 'ナッツなしのパンとチーズ', 'correct' => ['ナッツ', 'なし', 'の', 'パン', 'と', 'チーズ'], 'extra' => ['グルテン']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 수프 · 밥', 4,
                pictures: [['ko' => '수프', 'img' => 'soup'], ['ko' => '밥', 'img' => 'rice']],
                plain: [['ko' => '재료'], ['ko' => '들어있다']],
                phrases: [
                    'a' => [
                        'words' => ['수프는', '소금이', '들어있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the soup contains salt', 'correct' => ['the', 'soup', 'contains', 'salt'], 'extra' => ['ingredients']],
                            'es' => ['sentence' => 'La sopa contiene sal', 'correct' => ['la', 'sopa', 'contiene', 'sal'], 'extra' => ['ingredientes']],
                            'de' => ['sentence' => 'Die Suppe enthält Salz', 'correct' => ['die', 'Suppe', 'enthält', 'Salz'], 'extra' => ['Zutaten']],
                            'fr' => ['sentence' => 'La soupe contient du sel', 'correct' => ['la', 'soupe', 'contient', 'sel'], 'extra' => ['ingrédients']],
                            'ja' => ['sentence' => 'スープは塩を含む', 'correct' => ['スープ', 'は', '塩', 'を', '含む'], 'extra' => ['材料']],
                        ],
                    ],
                    'b' => [
                        'words' => ['밥의', '재료'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the ingredients of the rice', 'correct' => ['the', 'ingredients', 'of', 'the', 'rice'], 'extra' => ['contains']],
                            'es' => ['sentence' => 'Los ingredientes del arroz', 'correct' => ['los', 'ingredientes', 'de', 'el', 'arroz'], 'extra' => ['contiene']],
                            'de' => ['sentence' => 'Die Zutaten des Reises', 'correct' => ['die', 'Zutaten', 'von', 'dem', 'Reis'], 'extra' => ['enthält']],
                            'fr' => ['sentence' => 'Les ingrédients du riz', 'correct' => ['les', 'ingrédients', 'de', 'le', 'riz'], 'extra' => ['contient']],
                            'ja' => ['sentence' => 'ご飯の材料', 'correct' => ['ご飯', 'の', '材料'], 'extra' => ['含む']],
                        ],
                    ],
                    'c' => [
                        'words' => ['수프의', '재료'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the ingredients of the soup', 'correct' => ['the', 'ingredients', 'of', 'the', 'soup'], 'extra' => ['rice']],
                            'es' => ['sentence' => 'Los ingredientes de la sopa', 'correct' => ['los', 'ingredientes', 'de', 'la', 'sopa'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Die Zutaten der Suppe', 'correct' => ['die', 'Zutaten', 'von', 'der', 'Suppe'], 'extra' => ['Reis']],
                            'fr' => ['sentence' => 'Les ingrédients de la soupe', 'correct' => ['les', 'ingrédients', 'de', 'la', 'soupe'], 'extra' => ['riz']],
                            'ja' => ['sentence' => 'スープの材料', 'correct' => ['スープ', 'の', '材料'], 'extra' => ['ご飯']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 치즈 · 고기', 5,
                pictures: [['ko' => '치즈', 'img' => 'cheese'], ['ko' => '고기', 'img' => 'meat']],
                plain: [['ko' => '피하다'], ['ko' => '식단']],
                phrases: [
                    'a' => [
                        'words' => ['치즈를', '피하고', '싶습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to avoid the cheese', 'correct' => ['I would like', 'to avoid', 'the', 'cheese'], 'extra' => ['diet']],
                            'es' => ['sentence' => 'Quisiera evitar el queso', 'correct' => ['quisiera', 'evitar', 'el', 'queso'], 'extra' => ['dieta']],
                            'de' => ['sentence' => 'Ich möchte den Käse vermeiden', 'correct' => ['ich möchte', 'den', 'Käse', 'vermeiden'], 'extra' => ['Diät']],
                            'fr' => ['sentence' => 'Je voudrais éviter le fromage', 'correct' => ['je voudrais', 'éviter', 'le', 'fromage'], 'extra' => ['régime']],
                            'ja' => ['sentence' => 'チーズを避けたいです', 'correct' => ['チーズ', 'を', '避け', 'たいです'], 'extra' => ['食事制限']],
                        ],
                    ],
                    'b' => [
                        'words' => ['고기', '없는', '식단'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a diet without meat', 'correct' => ['a', 'diet', 'without', 'meat'], 'extra' => ['to avoid']],
                            'es' => ['sentence' => 'Una dieta sin carne', 'correct' => ['una', 'dieta', 'sin', 'carne'], 'extra' => ['evitar', 'queso']],
                            'de' => ['sentence' => 'Eine Diät ohne Fleisch', 'correct' => ['eine', 'Diät', 'ohne', 'Fleisch'], 'extra' => ['vermeiden', 'Käse']],
                            'fr' => ['sentence' => 'Un régime sans viande', 'correct' => ['un', 'régime', 'sans', 'viande'], 'extra' => ['éviter']],
                            'ja' => ['sentence' => '肉なしの食事制限', 'correct' => ['肉', 'なし', 'の', '食事制限'], 'extra' => ['避ける']],
                        ],
                    ],
                    'c' => [
                        'words' => ['고기와', '치즈를', '피하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to avoid the meat and the cheese', 'correct' => ['to avoid', 'the', 'meat', 'and', 'the', 'cheese'], 'extra' => ['diet']],
                            'es' => ['sentence' => 'Evitar la carne y el queso', 'correct' => ['evitar', 'la', 'carne', 'y', 'el', 'queso'], 'extra' => ['dieta']],
                            'de' => ['sentence' => 'Das Fleisch und den Käse vermeiden', 'correct' => ['das', 'Fleisch', 'und', 'den', 'Käse', 'vermeiden'], 'extra' => ['Diät']],
                            'fr' => ['sentence' => 'Éviter la viande et le fromage', 'correct' => ['éviter', 'la', 'viande', 'et', 'le', 'fromage'], 'extra' => ['régime']],
                            'ja' => ['sentence' => '肉とチーズを避ける', 'correct' => ['肉', 'と', 'チーズ', 'を', '避ける'], 'extra' => ['食事制限']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
