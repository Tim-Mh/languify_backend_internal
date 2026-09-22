<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitBeginner04Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'تفاحة' => 'apple', 'خبز' => 'bread', 'سمك' => 'fish', 'لحم' => 'meat',
        'حساء' => 'soup', 'سلطة' => 'salad', 'ماء' => 'water', 'شاي' => 'tea',
        'أرز' => 'rice',
    ];

    /**
     * Arabic Beginner Unit 4.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Eating & Drinking', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Apple & Bread', 1,
                pictures: [['ar' => 'تفاحة', 'img' => 'apple'], ['ar' => 'خبز', 'img' => 'bread']],
                plain: [['ar' => 'الأكل'], ['ar' => 'مع السلامة']],
                phrases: [
                    'a' => [
                        'words' => ['الأكل', 'تفاحة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat an apple', 'correct' => ['to eat', 'an', 'apple'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'yemək yemək bir alma', 'correct' => ['yemək yemək', 'bir', 'alma'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Manger une pomme', 'correct' => ['manger', 'une', 'pomme'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Comer una manzana', 'correct' => ['comer', 'una', 'manzana'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Einen Apfel essen', 'correct' => ['einen', 'Apfel', 'essen'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'りんごを食べる', 'correct' => ['りんご', 'を', '食べる'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '사과를 먹다', 'correct' => ['사과를', '먹다'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'bir elma yemek', 'correct' => ['bir', 'elma', 'yemek'], 'extra' => ['ekmek']],
                            'ru' => ['sentence' => 'кушать яблоко', 'correct' => ['кушать', 'яблоко'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الأكل', 'تفاحة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat the apple', 'correct' => ['to eat', 'the apple'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'yemək yemək alma', 'correct' => ['yemək yemək', 'alma'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Manger la pomme', 'correct' => ['manger', 'la pomme'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Comer la manzana', 'correct' => ['comer', 'la manzana'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Den Apfel essen', 'correct' => ['den Apfel', 'essen'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'りんごを食べる', 'correct' => ['りんご', 'を', '食べる'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '사과를 먹다', 'correct' => ['사과를', '먹다'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'elmayı yemek', 'correct' => ['elmayı', 'yemek'], 'extra' => ['bir', 'elma']],
                            'ru' => ['sentence' => 'кушать яблоко', 'correct' => ['кушать', 'яблоко'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'c' => [
                        'words' => ['الأكل', 'تفاحة', 'و', 'خبز'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat an apple and a bread', 'correct' => ['to eat', 'an', 'apple', 'and', 'a', 'bread'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'yemək yemək bir alma və bir çörək', 'correct' => ['yemək yemək', 'bir', 'alma', 'və', 'bir', 'çörək'], 'extra' => ['balıq']],
                            'fr' => ['sentence' => 'Manger une pomme et un pain', 'correct' => ['manger', 'une', 'pomme', 'et', 'un', 'pain'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Comer una manzana y un pan', 'correct' => ['comer', 'una', 'manzana', 'y', 'un', 'pan'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Einen Apfel und ein Brot essen', 'correct' => ['einen', 'Apfel', 'und', 'ein', 'Brot', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => 'りんごとパンを食べる', 'correct' => ['りんご', 'と', 'パン', 'を', '食べる'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '사과와 빵을 먹다', 'correct' => ['사과와', '빵을', '먹다'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'bir elma ve bir ekmek yemek', 'correct' => ['bir', 'elma', 've', 'bir', 'ekmek', 'yemek'], 'extra' => []],
                            'ru' => ['sentence' => 'кушать яблоко и хлеб', 'correct' => ['кушать', 'яблоко', 'и', 'хлеб'], 'extra' => ['рыба']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Fish & Meat', 2,
                pictures: [['ar' => 'سمك', 'img' => 'fish'], ['ar' => 'لحم', 'img' => 'meat']],
                plain: [['ar' => 'الأكل'], ['ar' => 'السمك']],
                phrases: [
                    'a' => [
                        'words' => ['الأكل', 'سمك'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat a fish', 'correct' => ['to eat', 'a', 'fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'yemək yemək bir balıq', 'correct' => ['yemək yemək', 'bir', 'balıq'], 'extra' => ['ət']],
                            'fr' => ['sentence' => 'Manger un poisson', 'correct' => ['manger', 'un', 'poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Comer un pescado', 'correct' => ['comer', 'un', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Einen Fisch essen', 'correct' => ['einen', 'Fisch', 'essen'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べる', 'correct' => ['魚', 'を', '食べる'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹다', 'correct' => ['생선을', '먹다'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'bir balık yemek', 'correct' => ['bir', 'balık', 'yemek'], 'extra' => ['ve', 'et']],
                            'ru' => ['sentence' => 'кушать рыба', 'correct' => ['кушать', 'рыба'], 'extra' => ['мясо']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الأكل', 'السمك'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat the fish', 'correct' => ['to eat', 'the fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'yemək yemək balığı', 'correct' => ['yemək yemək', 'balığı'], 'extra' => ['ət']],
                            'fr' => ['sentence' => 'Manger le poisson', 'correct' => ['manger', 'le poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Comer el pescado', 'correct' => ['comer', 'el pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Den Fisch essen', 'correct' => ['den Fisch', 'essen'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べる', 'correct' => ['魚', 'を', '食べる'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹다', 'correct' => ['생선을', '먹다'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'balığı yemek', 'correct' => ['balığı', 'yemek'], 'extra' => ['ve', 'balık']],
                            'ru' => ['sentence' => 'кушать рыбу', 'correct' => ['кушать', 'рыбу'], 'extra' => ['мясо']],
                        ],
                    ],
                    'c' => [
                        'words' => ['الأكل', 'سمك', 'و', 'لحم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat fish and meat', 'correct' => ['to eat', 'fish', 'and', 'meat'], 'extra' => ['rice']],
                            'az' => ['sentence' => 'yemək yemək balıq və ət', 'correct' => ['yemək yemək', 'balıq', 'və', 'ət'], 'extra' => ['düyü']],
                            'fr' => ['sentence' => 'Manger du poisson et de la viande', 'correct' => ['manger du', 'poisson', 'et de la', 'viande'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Comer pescado y carne', 'correct' => ['comer', 'pescado', 'y', 'carne'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Fisch und Fleisch essen', 'correct' => ['Fisch', 'und', 'Fleisch', 'essen'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => '魚と肉を食べる', 'correct' => ['魚', 'と', '肉', 'を', '食べる'], 'extra' => ['米']],
                            'ko' => ['sentence' => '생선과 고기를 먹다', 'correct' => ['생선과', '고기를', '먹다'], 'extra' => ['쌀']],
                            'tr' => ['sentence' => 'balık ve et yemek', 'correct' => ['balık', 've', 'et', 'yemek'], 'extra' => []],
                            'ru' => ['sentence' => 'кушать рыба и мясо', 'correct' => ['кушать', 'рыба', 'и', 'мясо'], 'extra' => ['рис']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Soup & Salad', 3,
                pictures: [['ar' => 'حساء', 'img' => 'soup'], ['ar' => 'سلطة', 'img' => 'salad']],
                plain: [['ar' => 'الأكل'], ['ar' => 'مع السلامة']],
                phrases: [
                    'a' => [
                        'words' => ['الأكل', 'حساء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat a soup', 'correct' => ['to eat', 'a', 'soup'], 'extra' => ['salad']],
                            'az' => ['sentence' => 'yemək yemək bir şorba', 'correct' => ['yemək yemək', 'bir', 'şorba'], 'extra' => ['salat']],
                            'fr' => ['sentence' => 'Manger une soupe', 'correct' => ['manger', 'une', 'soupe'], 'extra' => ['salade']],
                            'es' => ['sentence' => 'Comer una sopa', 'correct' => ['comer', 'una', 'sopa'], 'extra' => ['ensalada']],
                            'de' => ['sentence' => 'Eine Suppe essen', 'correct' => ['eine', 'Suppe', 'essen'], 'extra' => ['Salat']],
                            'ja' => ['sentence' => 'スープを食べる', 'correct' => ['スープ', 'を', '食べる'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '수프를 먹다', 'correct' => ['수프를', '먹다'], 'extra' => ['샐러드']],
                            'tr' => ['sentence' => 'bir çorba yemek', 'correct' => ['bir', 'çorba', 'yemek'], 'extra' => ['salata']],
                            'ru' => ['sentence' => 'кушать суп', 'correct' => ['кушать', 'суп'], 'extra' => ['салат']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الأكل', 'حساء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat the soup', 'correct' => ['to eat', 'the soup'], 'extra' => ['salad']],
                            'az' => ['sentence' => 'yemək yemək şorba', 'correct' => ['yemək yemək', 'şorba'], 'extra' => ['salat']],
                            'fr' => ['sentence' => 'Manger la soupe', 'correct' => ['manger', 'la soupe'], 'extra' => ['salade']],
                            'es' => ['sentence' => 'Comer la sopa', 'correct' => ['comer', 'la sopa'], 'extra' => ['ensalada']],
                            'de' => ['sentence' => 'Die Suppe essen', 'correct' => ['die Suppe', 'essen'], 'extra' => ['Salat']],
                            'ja' => ['sentence' => 'スープを食べる', 'correct' => ['スープ', 'を', '食べる'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '수프를 먹다', 'correct' => ['수프를', '먹다'], 'extra' => ['샐러드']],
                            'tr' => ['sentence' => 'çorbayı yemek', 'correct' => ['çorbayı', 'yemek'], 'extra' => ['bir', 'çorba']],
                            'ru' => ['sentence' => 'кушать суп', 'correct' => ['кушать', 'суп'], 'extra' => ['салат']],
                        ],
                    ],
                    'c' => [
                        'words' => ['حساء', 'و', 'سلطة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A soup and a salad', 'correct' => ['a', 'soup', 'and', 'a', 'salad'], 'extra' => ['rice']],
                            'az' => ['sentence' => 'bir şorba və bir salat', 'correct' => ['bir', 'şorba', 'və', 'bir', 'salat'], 'extra' => ['düyü']],
                            'fr' => ['sentence' => 'Une soupe et une salade', 'correct' => ['une', 'soupe', 'et', 'une', 'salade'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Una sopa y una ensalada', 'correct' => ['una', 'sopa', 'y', 'una', 'ensalada'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Eine Suppe und ein Salat', 'correct' => ['eine', 'Suppe', 'und', 'ein', 'Salat'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'スープとサラダ', 'correct' => ['スープ', 'と', 'サラダ'], 'extra' => ['米']],
                            'ko' => ['sentence' => '수프와 샐러드', 'correct' => ['수프와', '샐러드'], 'extra' => ['쌀']],
                            'tr' => ['sentence' => 'bir çorba ve bir salata', 'correct' => ['bir', 'çorba', 've', 'bir', 'salata'], 'extra' => ['yemek']],
                            'ru' => ['sentence' => 'суп и салат', 'correct' => ['суп', 'и', 'салат'], 'extra' => ['рис']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Drinking', 4,
                pictures: [['ar' => 'ماء', 'img' => 'water'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'الشرب'], ['ar' => 'الماء']],
                phrases: [
                    'a' => [
                        'words' => ['الشرب', 'ماء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To drink a water', 'correct' => ['to drink', 'a', 'water'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'içmək bir su', 'correct' => ['içmək', 'bir', 'su'], 'extra' => ['çay']],
                            'fr' => ['sentence' => 'Boire une eau', 'correct' => ['boire', 'une', 'eau'], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Beber un agua', 'correct' => ['beber', 'un', 'agua'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ein Wasser trinken', 'correct' => ['ein', 'Wasser', 'trinken'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '水を飲む', 'correct' => ['水', 'を', '飲む'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '물을 마시다', 'correct' => ['물을', '마시다'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'bir su içmek', 'correct' => ['bir', 'su', 'içmek'], 'extra' => ['i̇çmek', 've']],
                            'ru' => ['sentence' => 'пить вода', 'correct' => ['пить', 'вода'], 'extra' => ['чай']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الشرب', 'الماء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To drink the water', 'correct' => ['to drink', 'the water'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'içmək suyu', 'correct' => ['içmək', 'suyu'], 'extra' => ['çay']],
                            'fr' => ['sentence' => "Boire l'eau", 'correct' => ['boire', "l'eau"], 'extra' => ['thé']],
                            'es' => ['sentence' => 'Beber el agua', 'correct' => ['beber', 'el agua'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Das Wasser trinken', 'correct' => ['das Wasser', 'trinken'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '水を飲む', 'correct' => ['水', 'を', '飲む'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '물을 마시다', 'correct' => ['물을', '마시다'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'suyu içmek', 'correct' => ['suyu', 'içmek'], 'extra' => ['i̇çmek', 've']],
                            'ru' => ['sentence' => 'пить воду', 'correct' => ['пить', 'воду'], 'extra' => ['чай']],
                        ],
                    ],
                    'c' => [
                        'words' => ['الشرب', 'شاي', 'و', 'ماء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To drink a tea and a water', 'correct' => ['to drink', 'a', 'tea', 'and', 'a', 'water'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'içmək bir çay və bir su', 'correct' => ['içmək', 'bir', 'çay', 'və', 'bir', 'su'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Boire un thé et une eau', 'correct' => ['boire', 'un', 'thé', 'et', 'une', 'eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Beber un té y un agua', 'correct' => ['beber', 'un', 'té', 'y', 'un', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Tee und ein Wasser trinken', 'correct' => ['einen', 'Tee', 'und', 'ein', 'Wasser', 'trinken'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'お茶と水を飲む', 'correct' => ['お茶', 'と', '水', 'を', '飲む'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '차와 물을 마시다', 'correct' => ['차와', '물을', '마시다'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir çay ve bir su içmek', 'correct' => ['bir', 'çay', 've', 'bir', 'su', 'içmek'], 'extra' => ['i̇çmek']],
                            'ru' => ['sentence' => 'пить чай и вода', 'correct' => ['пить', 'чай', 'и', 'вода'], 'extra' => ['молоко']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A Meal', 5,
                pictures: [['ar' => 'أرز', 'img' => 'rice'], ['ar' => 'لحم', 'img' => 'meat']],
                plain: [['ar' => 'الأكل'], ['ar' => 'أريد']],
                phrases: [
                    'a' => [
                        'words' => ['الأكل', 'أرز', 'و', 'لحم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To eat rice and meat', 'correct' => ['to eat', 'rice', 'and', 'meat'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'yemək yemək düyü və ət', 'correct' => ['yemək yemək', 'düyü', 'və', 'ət'], 'extra' => ['balıq']],
                            'fr' => ['sentence' => 'Manger du riz et de la viande', 'correct' => ['manger du', 'riz', 'et de la', 'viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Comer arroz y carne', 'correct' => ['comer', 'arroz', 'y', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Reis und Fleisch essen', 'correct' => ['Reis', 'und', 'Fleisch', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '米と肉を食べる', 'correct' => ['米', 'と', '肉', 'を', '食べる'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '쌀과 고기를 먹다', 'correct' => ['쌀과', '고기를', '먹다'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'pirinç ve et yemek', 'correct' => ['pirinç', 've', 'et', 'yemek'], 'extra' => ['i̇çmek']],
                            'ru' => ['sentence' => 'кушать рис и мясо', 'correct' => ['кушать', 'рис', 'и', 'мясо'], 'extra' => ['рыба']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أريد', 'سلطة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a salad', 'correct' => ['I would like', 'a', 'salad'], 'extra' => ['soup']],
                            'az' => ['sentence' => 'istəyirəm bir salat', 'correct' => ['istəyirəm', 'bir', 'salat'], 'extra' => ['şorba']],
                            'fr' => ['sentence' => 'Je voudrais une salade', 'correct' => ['je voudrais', 'une', 'salade'], 'extra' => ['soupe']],
                            'es' => ['sentence' => 'Quisiera una ensalada', 'correct' => ['quisiera', 'una', 'ensalada'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Ich möchte einen Salat', 'correct' => ['ich möchte', 'einen', 'Salat'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'サラダをください', 'correct' => ['サラダ', 'を', 'ください'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '샐러드를 주세요', 'correct' => ['샐러드를', '주세요'], 'extra' => ['수프']],
                            'tr' => ['sentence' => 'bir salata istiyorum', 'correct' => ['bir', 'salata', 'istiyorum'], 'extra' => ['yemek', 'i̇çmek']],
                            'ru' => ['sentence' => 'я хочу салат', 'correct' => ['я', 'хочу', 'салат'], 'extra' => ['суп']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أريد', 'حساء', 'و', 'الشرب', 'ماء'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I would like a soup and to drink water', 'correct' => ['I would like', 'a', 'soup', 'and', 'to drink', 'water'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'istəyirəm bir şorba və içmək su', 'correct' => ['istəyirəm', 'bir', 'şorba', 'və', 'içmək', 'su'], 'extra' => ['ət']],
                            'fr' => ['sentence' => "Je voudrais une soupe et boire de l'eau", 'correct' => ['je voudrais', 'une', 'soupe', 'et', 'boire', 'eau'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Quisiera una sopa y beber agua', 'correct' => ['quisiera', 'una', 'sopa', 'y', 'beber', 'agua'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich möchte eine Suppe und Wasser trinken', 'correct' => ['ich möchte', 'eine', 'Suppe', 'und', 'Wasser', 'trinken'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'スープをください、そして水を飲む', 'correct' => ['スープ', 'を', 'ください', 'そして', '水', 'を', '飲む'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '수프를 주세요 그리고 물을 마시다', 'correct' => ['수프를', '주세요', '그리고', '물을', '마시다'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'bir çorba istiyorum ve su içmek', 'correct' => ['bir', 'çorba', 'istiyorum', 've', 'su', 'içmek'], 'extra' => ['yemek', 'i̇çmek']],
                            'ru' => ['sentence' => 'я хочу суп и пить вода', 'correct' => ['я', 'хочу', 'суп', 'и', 'пить', 'вода'], 'extra' => ['мясо']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
