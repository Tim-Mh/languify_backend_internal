<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant06Seeder extends Seeder
{
    private const PICTURES = [
        'Meat' => 'meat', 'Salad' => 'salad', 'Milk' => 'milk', 'Cheese' => 'cheese',
        'Bread' => 'bread', 'Soup' => 'soup', 'Rice' => 'rice', 'Cake' => 'cake',
    ];

    /**
     * English Chapter 3, Unit 6 — diets and allergies.
     *
     * The one unit where a wrong word has real consequences, so it drills the
     * same handful of frames — "I am ...", "allergic to ...", "without ...",
     * "... contains ..." — over and over rather than spreading thin.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Diet and Allergies', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Am Vegetarian', 1,
                pictures: [['en' => 'Meat', 'img' => 'meat'], ['en' => 'Salad', 'img' => 'salad']],
                plain: [['en' => 'Vegetarian'], ['en' => 'Eat']],
                phrases: [
                    'a' => [
                        'words' => ['I am', 'vegetarian'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Soy vegetariano', 'correct' => ['soy', 'vegetariano'], 'extra' => ['comer', 'carne']],
                            'de' => ['sentence' => 'Ich bin Vegetarier', 'correct' => ['ich bin', 'Vegetarier'], 'extra' => ['essen', 'Fleisch']],
                            'ja' => ['sentence' => '私はベジタリアンです', 'correct' => ['私', 'は', 'ベジタリアン', 'です'], 'extra' => ['食べる']],
                            'ko' => ['sentence' => '저는 채식주의자입니다', 'correct' => ['저는', '채식주의자입니다'], 'extra' => ['먹다']],
                            'fr' => ['sentence' => 'Je suis végétarien', 'correct' => ['je suis', 'végétarien'], 'extra' => ['manger', 'viande']],
                            'tr' => ['sentence' => 'ben vejetaryenim', 'correct' => ['ben', 'vejetaryenim'], 'extra' => []],
                        'ru' => ['sentence' => 'я вегетарианец', 'correct' => ['я', 'вегетарианец'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا نباتي', 'correct' => ['أنا', 'نباتي'], 'extra' => []],
                        'az' => ['sentence' => 'mən vegetarian', 'correct' => ['mən', 'vegetarian'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['eat', 'a', 'salad'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comer una ensalada', 'correct' => ['comer', 'una', 'ensalada'], 'extra' => ['vegetariano', 'carne']],
                            'de' => ['sentence' => 'Einen Salat essen', 'correct' => ['einen', 'Salat', 'essen'], 'extra' => ['vegetarisch', 'Fleisch']],
                            'ja' => ['sentence' => 'サラダを食べる', 'correct' => ['サラダ', 'を', '食べる'], 'extra' => ['ベジタリアン']],
                            'ko' => ['sentence' => '샐러드를 먹다', 'correct' => ['샐러드를', '먹다'], 'extra' => ['채식주의자']],
                            'fr' => ['sentence' => 'Manger une salade', 'correct' => ['manger', 'une', 'salade'], 'extra' => ['végétarien']],
                            'tr' => ['sentence' => 'bir salata ye', 'correct' => ['bir', 'salata', 'ye'], 'extra' => []],
                        'ru' => ['sentence' => 'ем салат', 'correct' => ['ем', 'салат'], 'extra' => []],
                        'ar' => ['sentence' => 'آكل سلطة', 'correct' => ['آكل', 'سلطة'], 'extra' => []],
                        'az' => ['sentence' => 'yeyirəm bir salat', 'correct' => ['yeyirəm', 'bir', 'salat'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['eat', 'without', 'meat'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Comer sin carne', 'correct' => ['comer', 'sin', 'carne'], 'extra' => ['vegetariano', 'ensalada']],
                            'de' => ['sentence' => 'Ohne Fleisch essen', 'correct' => ['ohne', 'Fleisch', 'essen'], 'extra' => ['vegetarisch', 'Salat']],
                            'ja' => ['sentence' => '肉なしで食べる', 'correct' => ['肉', 'なし', 'で', '食べる'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '고기 없이 먹다', 'correct' => ['고기', '없이', '먹다'], 'extra' => ['샐러드']],
                            'fr' => ['sentence' => 'Manger sans viande', 'correct' => ['manger', 'sans', 'viande'], 'extra' => ['salade']],
                            'tr' => ['sentence' => 'etsiz ye', 'correct' => ['etsiz', 'ye'], 'extra' => []],
                        'ru' => ['sentence' => 'ем без мясо', 'correct' => ['ем', 'без', 'мясо'], 'extra' => []],
                        'ar' => ['sentence' => 'آكل بدون لحم', 'correct' => ['آكل', 'بدون', 'لحم'], 'extra' => []],
                        'az' => ['sentence' => 'yeyirəm olmadan ət', 'correct' => ['yeyirəm', 'olmadan', 'ət'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: I Am Allergic', 2,
                pictures: [['en' => 'Milk', 'img' => 'milk'], ['en' => 'Cheese', 'img' => 'cheese']],
                plain: [['en' => 'Allergic'], ['en' => 'Allergy']],
                phrases: [
                    'a' => [
                        'words' => ['I am', 'allergic', 'to', 'milk'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Soy alérgico a la leche', 'correct' => ['soy', 'alérgico', 'a', 'leche'], 'extra' => ['alergia', 'queso']],
                            'de' => ['sentence' => 'Ich bin allergisch gegen Milch', 'correct' => ['ich bin', 'allergisch', 'zu', 'Milch'], 'extra' => ['Allergie', 'Käse']],
                            'ja' => ['sentence' => '私は牛乳アレルギーです', 'correct' => ['私', 'は', '牛乳', 'アレルギー', 'です'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '저는 우유 알레르기가 있습니다', 'correct' => ['저는', '우유', '알레르기가', '있습니다'], 'extra' => ['치즈']],
                            'fr' => ['sentence' => 'Je suis allergique au lait', 'correct' => ['je suis', 'allergique', 'à', 'lait'], 'extra' => ['allergie', 'fromage']],
                            'tr' => ['sentence' => 'süte alerjim var', 'correct' => ['süte', 'alerjim', 'var'], 'extra' => []],
                        'ru' => ['sentence' => 'я аллергия в молоко', 'correct' => ['я', 'аллергия', 'в', 'молоко'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا حساسية إلى حليب', 'correct' => ['أنا', 'حساسية', 'إلى', 'حليب'], 'extra' => []],
                        'az' => ['sentence' => 'mən allergiya süd', 'correct' => ['mən', 'allergiya', 'süd'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'allergy', 'to', 'cheese'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una alergia al queso', 'correct' => ['una', 'alergia', 'a', 'queso'], 'extra' => ['alérgico', 'leche']],
                            'de' => ['sentence' => 'Eine Allergie gegen Käse', 'correct' => ['eine', 'Allergie', 'zu', 'Käse'], 'extra' => ['allergisch', 'Milch']],
                            'ja' => ['sentence' => 'チーズのアレルギー', 'correct' => ['チーズ', 'の', 'アレルギー'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '치즈 알레르기', 'correct' => ['치즈', '알레르기'], 'extra' => ['우유']],
                            'fr' => ['sentence' => 'Une allergie au fromage', 'correct' => ['une', 'allergie', 'à', 'fromage'], 'extra' => ['allergique']],
                            'tr' => ['sentence' => 'peynir alerjisi', 'correct' => ['peynir', 'alerjisi'], 'extra' => []],
                        'ru' => ['sentence' => 'аллергия в сыр', 'correct' => ['аллергия', 'в', 'сыр'], 'extra' => []],
                        'ar' => ['sentence' => 'حساسية إلى جبن', 'correct' => ['حساسية', 'إلى', 'جبن'], 'extra' => []],
                        'az' => ['sentence' => 'bir allergiya pendir', 'correct' => ['bir', 'allergiya', 'pendir'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['without', 'milk', 'and', 'without', 'cheese'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Sin leche y sin queso', 'correct' => ['sin', 'leche', 'y', 'sin', 'queso'], 'extra' => ['alergia']],
                            'de' => ['sentence' => 'Ohne Milch und ohne Käse', 'correct' => ['ohne', 'Milch', 'und', 'ohne', 'Käse'], 'extra' => ['Allergie']],
                            'ja' => ['sentence' => '牛乳なしでチーズなしで', 'correct' => ['牛乳', 'なし', 'で', 'チーズ', 'なし', 'で'], 'extra' => ['アレルギー']],
                            'ko' => ['sentence' => '우유 없이 그리고 치즈 없이', 'correct' => ['우유', '없이', '그리고', '치즈', '없이'], 'extra' => ['알레르기']],
                            'fr' => ['sentence' => 'Sans lait et sans fromage', 'correct' => ['sans', 'lait', 'et', 'sans', 'fromage'], 'extra' => ['allergie']],
                            'tr' => ['sentence' => 'sütsüz ve peynirsiz', 'correct' => ['sütsüz', 've', 'peynirsiz'], 'extra' => []],
                        'ru' => ['sentence' => 'без молоко и без сыр', 'correct' => ['без', 'молоко', 'и', 'без', 'сыр'], 'extra' => []],
                        'ar' => ['sentence' => 'بدون حليب و بدون جبن', 'correct' => ['بدون', 'حليب', 'و', 'بدون', 'جبن'], 'extra' => []],
                        'az' => ['sentence' => 'olmadan süd və olmadan pendir', 'correct' => ['olmadan', 'süd', 'və', 'olmadan', 'pendir'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Gluten and Nuts', 3,
                pictures: [['en' => 'Bread', 'img' => 'bread'], ['en' => 'Cheese', 'img' => 'cheese']],
                plain: [['en' => 'Gluten'], ['en' => 'Nuts']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'bread', 'with', 'gluten'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pan con gluten', 'correct' => ['el', 'pan', 'con', 'gluten'], 'extra' => ['nueces']],
                            'de' => ['sentence' => 'Das Brot mit Gluten', 'correct' => ['das', 'Brot', 'mit', 'Gluten'], 'extra' => ['Nüsse']],
                            'ja' => ['sentence' => 'グルテン入りのパン', 'correct' => ['グルテン', '入り', 'の', 'パン'], 'extra' => ['ナッツ']],
                            'ko' => ['sentence' => '글루텐이 든 빵', 'correct' => ['글루텐이', '든', '빵'], 'extra' => ['견과류']],
                            'fr' => ['sentence' => 'Le pain avec du gluten', 'correct' => ['le', 'pain', 'avec', 'gluten'], 'extra' => ['noix']],
                            'tr' => ['sentence' => 'glutenli ekmek', 'correct' => ['glutenli', 'ekmek'], 'extra' => []],
                        'ru' => ['sentence' => 'хлеб с глютен', 'correct' => ['хлеб', 'с', 'глютен'], 'extra' => []],
                        'ar' => ['sentence' => 'خبز مع غلوتين', 'correct' => ['خبز', 'مع', 'غلوتين'], 'extra' => []],
                        'az' => ['sentence' => 'çörək ilə qlüten', 'correct' => ['çörək', 'ilə', 'qlüten'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'allergy', 'to', 'nuts'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una alergia a las nueces', 'correct' => ['una', 'alergia', 'a', 'nueces'], 'extra' => ['gluten', 'pan']],
                            'de' => ['sentence' => 'Eine Allergie gegen Nüsse', 'correct' => ['eine', 'Allergie', 'zu', 'Nüsse'], 'extra' => ['Gluten', 'Brot']],
                            'ja' => ['sentence' => 'ナッツのアレルギー', 'correct' => ['ナッツ', 'の', 'アレルギー'], 'extra' => ['グルテン']],
                            'ko' => ['sentence' => '견과류 알레르기', 'correct' => ['견과류', '알레르기'], 'extra' => ['글루텐']],
                            'fr' => ['sentence' => 'Une allergie aux noix', 'correct' => ['une', 'allergie', 'à', 'noix'], 'extra' => ['gluten']],
                            'tr' => ['sentence' => 'fındık alerjisi', 'correct' => ['fındık', 'alerjisi'], 'extra' => []],
                        'ru' => ['sentence' => 'аллергия в орехи', 'correct' => ['аллергия', 'в', 'орехи'], 'extra' => []],
                        'ar' => ['sentence' => 'حساسية إلى مكسرات', 'correct' => ['حساسية', 'إلى', 'مكسرات'], 'extra' => []],
                        'az' => ['sentence' => 'bir allergiya qoz', 'correct' => ['bir', 'allergiya', 'qoz'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['bread', 'and', 'cheese', 'without', 'nuts'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Pan y queso sin nueces', 'correct' => ['pan', 'y', 'queso', 'sin', 'nueces'], 'extra' => ['gluten']],
                            'de' => ['sentence' => 'Brot und Käse ohne Nüsse', 'correct' => ['Brot', 'und', 'Käse', 'ohne', 'Nüsse'], 'extra' => ['Gluten']],
                            'ja' => ['sentence' => 'ナッツなしのパンとチーズ', 'correct' => ['ナッツ', 'なし', 'の', 'パン', 'と', 'チーズ'], 'extra' => ['グルテン']],
                            'ko' => ['sentence' => '견과류 없는 빵과 치즈', 'correct' => ['견과류', '없는', '빵과', '치즈'], 'extra' => ['글루텐']],
                            'fr' => ['sentence' => 'Pain et fromage sans noix', 'correct' => ['pain', 'et', 'fromage', 'sans', 'noix'], 'extra' => ['gluten']],
                            'tr' => ['sentence' => 'fındıksız ekmek ve peynir', 'correct' => ['fındıksız', 'ekmek', 've', 'peynir'], 'extra' => []],
                        'ru' => ['sentence' => 'хлеб и сыр без орехи', 'correct' => ['хлеб', 'и', 'сыр', 'без', 'орехи'], 'extra' => []],
                        'ar' => ['sentence' => 'خبز و جبن بدون مكسرات', 'correct' => ['خبز', 'و', 'جبن', 'بدون', 'مكسرات'], 'extra' => []],
                        'az' => ['sentence' => 'çörək və pendir olmadan qoz', 'correct' => ['çörək', 'və', 'pendir', 'olmadan', 'qoz'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: What Is In It', 4,
                pictures: [['en' => 'Soup', 'img' => 'soup'], ['en' => 'Rice', 'img' => 'rice']],
                plain: [['en' => 'Ingredients'], ['en' => 'Contains']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'soup', 'contains', 'salt'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'La sopa contiene sal', 'correct' => ['la', 'sopa', 'contiene', 'sal'], 'extra' => ['ingredientes']],
                            'de' => ['sentence' => 'Die Suppe enthält Salz', 'correct' => ['die', 'Suppe', 'enthält', 'Salz'], 'extra' => ['Zutaten']],
                            'ja' => ['sentence' => 'スープは塩を含む', 'correct' => ['スープ', 'は', '塩', 'を', '含む'], 'extra' => ['材料']],
                            'ko' => ['sentence' => '수프는 소금이 들어있습니다', 'correct' => ['수프는', '소금이', '들어있습니다'], 'extra' => ['재료']],
                            'fr' => ['sentence' => 'La soupe contient du sel', 'correct' => ['la', 'soupe', 'contient', 'sel'], 'extra' => ['ingrédients']],
                            'tr' => ['sentence' => 'çorbada tuz var', 'correct' => ['çorbada', 'tuz', 'var'], 'extra' => []],
                        'ru' => ['sentence' => 'суп содержит соль', 'correct' => ['суп', 'содержит', 'соль'], 'extra' => []],
                        'ar' => ['sentence' => 'حساء يحتوي ملح', 'correct' => ['حساء', 'يحتوي', 'ملح'], 'extra' => []],
                        'az' => ['sentence' => 'şorba tərkibində var duz', 'correct' => ['şorba', 'tərkibində var', 'duz'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'ingredients', 'of', 'the', 'rice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Los ingredientes del arroz', 'correct' => ['los', 'ingredientes', 'de', 'el', 'arroz'], 'extra' => ['contiene']],
                            'de' => ['sentence' => 'Die Zutaten des Reises', 'correct' => ['die', 'Zutaten', 'von', 'dem', 'Reis'], 'extra' => ['enthält']],
                            'ja' => ['sentence' => 'ご飯の材料', 'correct' => ['ご飯', 'の', '材料'], 'extra' => ['含む']],
                            'ko' => ['sentence' => '밥의 재료', 'correct' => ['밥의', '재료'], 'extra' => ['들어있다']],
                            'fr' => ['sentence' => 'Les ingrédients du riz', 'correct' => ['les', 'ingrédients', 'de', 'le', 'riz'], 'extra' => ['contient']],
                            'tr' => ['sentence' => 'pirincin içindekiler', 'correct' => ['pirincin', 'içindekiler'], 'extra' => []],
                        'ru' => ['sentence' => 'ингредиенты рис', 'correct' => ['ингредиенты', 'рис'], 'extra' => []],
                        'ar' => ['sentence' => 'مكونات أرز', 'correct' => ['مكونات', 'أرز'], 'extra' => []],
                        'az' => ['sentence' => 'tərkib düyü', 'correct' => ['tərkib', 'düyü'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'ingredients', 'of', 'the', 'soup'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Los ingredientes de la sopa', 'correct' => ['los', 'ingredientes', 'de', 'la', 'sopa'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Die Zutaten der Suppe', 'correct' => ['die', 'Zutaten', 'von', 'der', 'Suppe'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'スープの材料', 'correct' => ['スープ', 'の', '材料'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '수프의 재료', 'correct' => ['수프의', '재료'], 'extra' => ['밥']],
                            'fr' => ['sentence' => 'Les ingrédients de la soupe', 'correct' => ['les', 'ingrédients', 'de', 'la', 'soupe'], 'extra' => ['riz']],
                            'tr' => ['sentence' => 'çorbanın içindekiler', 'correct' => ['çorbanın', 'içindekiler'], 'extra' => []],
                        'ru' => ['sentence' => 'ингредиенты суп', 'correct' => ['ингредиенты', 'суп'], 'extra' => []],
                        'ar' => ['sentence' => 'مكونات حساء', 'correct' => ['مكونات', 'حساء'], 'extra' => []],
                        'az' => ['sentence' => 'tərkib şorba', 'correct' => ['tərkib', 'şorba'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: I Avoid That', 5,
                pictures: [['en' => 'Cheese', 'img' => 'cheese'], ['en' => 'Meat', 'img' => 'meat']],
                plain: [['en' => 'To avoid'], ['en' => 'Diet']],
                phrases: [
                    'a' => [
                        'words' => ['I would like', 'to avoid', 'the', 'cheese'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera evitar el queso', 'correct' => ['quisiera', 'evitar', 'el', 'queso'], 'extra' => ['dieta']],
                            'de' => ['sentence' => 'Ich möchte den Käse vermeiden', 'correct' => ['ich möchte', 'den', 'Käse', 'vermeiden'], 'extra' => ['Diät']],
                            'ja' => ['sentence' => 'チーズを避けたいです', 'correct' => ['チーズ', 'を', '避け', 'たいです'], 'extra' => ['食事制限']],
                            'ko' => ['sentence' => '치즈를 피하고 싶습니다', 'correct' => ['치즈를', '피하고', '싶습니다'], 'extra' => ['식단']],
                            'fr' => ['sentence' => 'Je voudrais éviter le fromage', 'correct' => ['je voudrais', 'éviter', 'le', 'fromage'], 'extra' => ['régime']],
                            'tr' => ['sentence' => 'peynirden kaçınmak istiyorum', 'correct' => ['peynirden', 'kaçınmak', 'istiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я хочу избегать сыр', 'correct' => ['я', 'хочу', 'избегать', 'сыр'], 'extra' => []],
                        'ar' => ['sentence' => 'أريد التجنب جبن', 'correct' => ['أريد', 'التجنب', 'جبن'], 'extra' => []],
                        'az' => ['sentence' => 'istəyirəm qaçınmaq pendir', 'correct' => ['istəyirəm', 'qaçınmaq', 'pendir'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'diet', 'without', 'meat'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una dieta sin carne', 'correct' => ['una', 'dieta', 'sin', 'carne'], 'extra' => ['evitar', 'queso']],
                            'de' => ['sentence' => 'Eine Diät ohne Fleisch', 'correct' => ['eine', 'Diät', 'ohne', 'Fleisch'], 'extra' => ['vermeiden', 'Käse']],
                            'ja' => ['sentence' => '肉なしの食事制限', 'correct' => ['肉', 'なし', 'の', '食事制限'], 'extra' => ['避ける']],
                            'ko' => ['sentence' => '고기 없는 식단', 'correct' => ['고기', '없는', '식단'], 'extra' => ['피하다']],
                            'fr' => ['sentence' => 'Un régime sans viande', 'correct' => ['un', 'régime', 'sans', 'viande'], 'extra' => ['éviter']],
                            'tr' => ['sentence' => 'etsiz bir beslenme', 'correct' => ['etsiz', 'bir', 'beslenme'], 'extra' => []],
                        'ru' => ['sentence' => 'диета без мясо', 'correct' => ['диета', 'без', 'мясо'], 'extra' => []],
                        'ar' => ['sentence' => 'حمية بدون لحم', 'correct' => ['حمية', 'بدون', 'لحم'], 'extra' => []],
                        'az' => ['sentence' => 'bir pəhriz olmadan ət', 'correct' => ['bir', 'pəhriz', 'olmadan', 'ət'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to avoid', 'the', 'meat', 'and', 'the', 'cheese'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Evitar la carne y el queso', 'correct' => ['evitar', 'la', 'carne', 'y', 'el', 'queso'], 'extra' => ['dieta']],
                            'de' => ['sentence' => 'Das Fleisch und den Käse vermeiden', 'correct' => ['das', 'Fleisch', 'und', 'den', 'Käse', 'vermeiden'], 'extra' => ['Diät']],
                            'ja' => ['sentence' => '肉とチーズを避ける', 'correct' => ['肉', 'と', 'チーズ', 'を', '避ける'], 'extra' => ['食事制限']],
                            'ko' => ['sentence' => '고기와 치즈를 피하다', 'correct' => ['고기와', '치즈를', '피하다'], 'extra' => ['식단']],
                            'fr' => ['sentence' => 'Éviter la viande et le fromage', 'correct' => ['éviter', 'la', 'viande', 'et', 'le', 'fromage'], 'extra' => ['régime']],
                            'tr' => ['sentence' => 'etten ve peynirden kaçınmak', 'correct' => ['etten', 've', 'peynirden', 'kaçınmak'], 'extra' => []],
                        'ru' => ['sentence' => 'избегать мясо и сыр', 'correct' => ['избегать', 'мясо', 'и', 'сыр'], 'extra' => []],
                        'ar' => ['sentence' => 'التجنب لحم و جبن', 'correct' => ['التجنب', 'لحم', 'و', 'جبن'], 'extra' => []],
                        'az' => ['sentence' => 'qaçınmaq ət və pendir', 'correct' => ['qaçınmaq', 'ət', 'və', 'pendir'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
