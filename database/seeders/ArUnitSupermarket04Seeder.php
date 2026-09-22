<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitSupermarket04Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'حليب' => 'milk', 'قهوة' => 'coffee', 'جبن' => 'cheese', 'خبز' => 'bread',
        'شاي' => 'tea', 'كعكة' => 'cake', 'ماء' => 'water', 'سكر' => 'sugar',
    ];

    /**
     * Arabic Supermarket Unit 4.
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
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Dairy and Bakery', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Milk & Yoghurt', 1,
                pictures: [['ar' => 'حليب', 'img' => 'milk'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'أشتري'], ['ar' => 'لبن']],
                phrases: [
                    'a' => [
                        'words' => ['أشتري', 'حليب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying milk', 'correct' => ['I am buying', 'milk'], 'extra' => ['yoghurt']],
                            'az' => ['sentence' => 'alıram süd', 'correct' => ['alıram', 'süd'], 'extra' => ['qatıq']],
                            'fr' => ['sentence' => 'J’achète du lait', 'correct' => ['j’achète', 'du lait'], 'extra' => ['yaourt']],
                            'es' => ['sentence' => 'Compro leche', 'correct' => ['compro', 'leche'], 'extra' => ['yogur']],
                            'de' => ['sentence' => 'Ich kaufe Milch', 'correct' => ['ich kaufe', 'Milch'], 'extra' => ['Joghurt']],
                            'ja' => ['sentence' => '牛乳を買います', 'correct' => ['牛乳を', '買います'], 'extra' => ['ヨーグルト']],
                            'ko' => ['sentence' => '우유를 삽니다', 'correct' => ['우유를', '삽니다'], 'extra' => ['요구르트']],
                            'tr' => ['sentence' => 'süt alıyorum', 'correct' => ['süt', 'alıyorum'], 'extra' => ['yoğurt', 'peynir']],
                            'ru' => ['sentence' => 'я покупаю молоко', 'correct' => ['я', 'покупаю', 'молоко'], 'extra' => ['йогурт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['لبن', 'طازج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The yoghurt is fresh', 'correct' => ['the yoghurt', 'is', 'fresh'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'qatıq təzə', 'correct' => ['qatıq', 'təzə'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Le yaourt est frais', 'correct' => ['le yaourt', 'est', 'frais'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'El yogur está fresco', 'correct' => ['el yogur', 'está', 'fresco'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Der Joghurt ist frisch', 'correct' => ['der Joghurt', 'ist', 'frisch'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'ヨーグルトは新鮮です', 'correct' => ['ヨーグルトは', '新鮮です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '요구르트는 신선해요', 'correct' => ['요구르트는', '신선해요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'yoğurt taze', 'correct' => ['yoğurt', 'taze'], 'extra' => ['süt', 'süt']],
                            'ru' => ['sentence' => 'йогурт свежий', 'correct' => ['йогурт', 'свежий'], 'extra' => ['молоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['حليب', 'و', 'لبن'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Milk and yoghurt', 'correct' => ['milk', 'and', 'yoghurt'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'süd və qatıq', 'correct' => ['süd', 'və', 'qatıq'], 'extra' => ['pendir']],
                            'fr' => ['sentence' => 'Du lait et du yaourt', 'correct' => ['du lait', 'et', 'du yaourt'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Leche y yogur', 'correct' => ['leche', 'y', 'yogur'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Milch und Joghurt', 'correct' => ['Milch', 'und', 'Joghurt'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳とヨーグルト', 'correct' => ['牛乳', 'と', 'ヨーグルト'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유와 요구르트', 'correct' => ['우유와', '요구르트'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'süt ve yoğurt', 'correct' => ['süt', 've', 'yoğurt'], 'extra' => ['peynir']],
                            'ru' => ['sentence' => 'молоко и йогурт', 'correct' => ['молоко', 'и', 'йогурт'], 'extra' => ['сыр']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Butter & Cheese', 2,
                pictures: [['ar' => 'جبن', 'img' => 'cheese'], ['ar' => 'خبز', 'img' => 'bread']],
                plain: [['ar' => 'أريد'], ['ar' => 'زبدة']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'زبدة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like butter', 'correct' => ['I would like', 'butter'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'istəyirəm kərə yağı', 'correct' => ['istəyirəm', 'kərə yağı'], 'extra' => ['pendir']],
                            'fr' => ['sentence' => 'Je voudrais du beurre', 'correct' => ['je voudrais', 'du beurre'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Quisiera mantequilla', 'correct' => ['quisiera', 'mantequilla'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ich möchte Butter', 'correct' => ['ich möchte', 'Butter'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'バターをください', 'correct' => ['バターを', 'ください'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '버터 주세요', 'correct' => ['버터', '주세요'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'tereyağı istiyorum', 'correct' => ['tereyağı', 'istiyorum'], 'extra' => ['peynir', 'peynir']],
                            'ru' => ['sentence' => 'я хочу масло', 'correct' => ['я', 'хочу', 'масло'], 'extra' => ['сыр']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أين', 'جبن'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the cheese', 'correct' => ['where', 'is', 'the cheese'], 'extra' => ['butter']],
                            'az' => ['sentence' => 'harada pendir', 'correct' => ['harada', 'pendir'], 'extra' => ['kərə yağı']],
                            'fr' => ['sentence' => 'Où est le fromage', 'correct' => ['où', 'est', 'le fromage'], 'extra' => ['beurre']],
                            'es' => ['sentence' => 'Dónde está el queso', 'correct' => ['dónde', 'está', 'el queso'], 'extra' => ['mantequilla']],
                            'de' => ['sentence' => 'Wo ist der Käse', 'correct' => ['wo', 'ist', 'der Käse'], 'extra' => ['Butter']],
                            'ja' => ['sentence' => 'チーズはどこですか', 'correct' => ['チーズは', 'どこですか'], 'extra' => ['バター']],
                            'ko' => ['sentence' => '치즈는 어디에 있어요', 'correct' => ['치즈는', '어디에', '있어요'], 'extra' => ['버터']],
                            'tr' => ['sentence' => 'peynir nerede', 'correct' => ['peynir', 'nerede'], 'extra' => ['tereyağı', 'ekmek']],
                            'ru' => ['sentence' => 'где сыр', 'correct' => ['где', 'сыр'], 'extra' => ['масло']],
                        ],
                    ],
                    'c' => [
                        'words' => ['خبز', 'مع الزبدة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Bread with butter', 'correct' => ['bread', 'with butter'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'çörək yağlı', 'correct' => ['çörək', 'yağlı'], 'extra' => ['pendir']],
                            'fr' => ['sentence' => 'Du pain avec du beurre', 'correct' => ['du pain', 'avec du beurre'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Pan con mantequilla', 'correct' => ['pan', 'con mantequilla'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Brot mit Butter', 'correct' => ['Brot', 'mit Butter'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'バター入りのパン', 'correct' => ['バター入りの', 'パン'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '버터 있는 빵', 'correct' => ['버터 있는', '빵'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'tereyağlı ekmek', 'correct' => ['tereyağlı', 'ekmek'], 'extra' => ['tereyağı', 'peynir']],
                            'ru' => ['sentence' => 'хлеб с маслом', 'correct' => ['хлеб', 'с', 'маслом'], 'extra' => ['сыр']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Eggs', 3,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'أشتري'], ['ar' => 'بيض']],
                phrases: [
                    'a' => [
                        'words' => ['أشتري', 'بيض'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying eggs', 'correct' => ['I am buying', 'eggs'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'alıram yumurtalar', 'correct' => ['alıram', 'yumurtalar'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'J’achète des oeufs', 'correct' => ['j’achète', 'des oeufs'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Compro huevos', 'correct' => ['compro', 'huevos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich kaufe Eier', 'correct' => ['ich kaufe', 'Eier'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵を買います', 'correct' => ['卵を', '買います'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀을 삽니다', 'correct' => ['달걀을', '삽니다'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'yumurta alıyorum', 'correct' => ['yumurta', 'alıyorum'], 'extra' => ['kutu', 'süt']],
                            'ru' => ['sentence' => 'я покупаю яйца', 'correct' => ['я', 'покупаю', 'яйца'], 'extra' => ['молоко']],
                        ],
                    ],
                    'b' => [
                        'words' => ['علبة', 'البيض'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A box of eggs', 'correct' => ['a', 'box', 'of eggs'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir qutu yumurtanın', 'correct' => ['bir', 'qutu', 'yumurtanın'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Une boîte d’oeufs', 'correct' => ['une', 'boîte', 'd’oeufs'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una caja de huevos', 'correct' => ['una', 'caja', 'de huevos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Schachtel Eier', 'correct' => ['eine', 'Schachtel', 'Eier'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵一箱', 'correct' => ['卵', '一箱'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀 한 상자', 'correct' => ['달걀', '한', '상자'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir kutu yumurta', 'correct' => ['bir', 'kutu', 'yumurta'], 'extra' => ['süt']],
                            'ru' => ['sentence' => 'коробка яиц', 'correct' => ['коробка', 'яиц'], 'extra' => ['молоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['بيض', 'طازج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The eggs are fresh', 'correct' => ['the eggs', 'are', 'fresh'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'yumurtalar təzə', 'correct' => ['yumurtalar', 'təzə'], 'extra' => ['süd']],
                            'fr' => ['sentence' => 'Les oeufs sont frais', 'correct' => ['les oeufs', 'sont', 'frais'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Los huevos están frescos', 'correct' => ['los huevos', 'están', 'frescos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Die Eier sind frisch', 'correct' => ['die Eier', 'sind', 'frisch'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵は新鮮です', 'correct' => ['卵は', '新鮮です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀은 신선해요', 'correct' => ['달걀은', '신선해요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'yumurta taze', 'correct' => ['yumurta', 'taze'], 'extra' => ['kutu', 'süt']],
                            'ru' => ['sentence' => 'яйца свежий', 'correct' => ['яйца', 'свежий'], 'extra' => ['молоко']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: The Bakery', 4,
                pictures: [['ar' => 'خبز', 'img' => 'bread'], ['ar' => 'كعكة', 'img' => 'cake']],
                plain: [['ar' => 'طازج'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['طازج', 'خبز'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Fresh bread', 'correct' => ['fresh', 'bread'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'təzə çörək', 'correct' => ['təzə', 'çörək'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Du pain frais', 'correct' => ['du pain', 'frais'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Pan fresco', 'correct' => ['pan', 'fresco'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Frisches Brot', 'correct' => ['frisches', 'Brot'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => '新鮮なパン', 'correct' => ['新鮮な', 'パン'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '신선한 빵', 'correct' => ['신선한', '빵'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'taze ekmek', 'correct' => ['taze', 'ekmek'], 'extra' => ['pasta', 'pasta']],
                            'ru' => ['sentence' => 'свежий хлеб', 'correct' => ['свежий', 'хлеб'], 'extra' => ['торт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['خبز', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A bread please', 'correct' => ['a', 'bread', 'please'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'bir çörək zəhmət olmasa', 'correct' => ['bir', 'çörək', 'zəhmət olmasa'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Un pain s’il vous plaît', 'correct' => ['un', 'pain', 's’il vous plaît'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Un pan por favor', 'correct' => ['un', 'pan', 'por favor'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ein Brot bitte', 'correct' => ['ein', 'Brot', 'bitte'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'パンを一つお願いします', 'correct' => ['パンを', '一つ', 'お願いします'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '빵 하나 부탁합니다', 'correct' => ['빵', '하나', '부탁합니다'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'bir ekmek lütfen', 'correct' => ['bir', 'ekmek', 'lütfen'], 'extra' => ['pasta', 'pasta']],
                            'ru' => ['sentence' => 'хлеб пожалуйста', 'correct' => ['хлеб', 'пожалуйста'], 'extra' => ['торт']],
                        ],
                    ],
                    'c' => [
                        'words' => ['كعكة', 'جدا', 'حلو'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The cake is very sweet', 'correct' => ['the cake', 'is', 'very', 'sweet'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'tort çox şirin', 'correct' => ['tort', 'çox', 'şirin'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Le gâteau est très sucré', 'correct' => ['le gâteau', 'est', 'très', 'sucré'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'El pastel es muy dulce', 'correct' => ['el pastel', 'es', 'muy', 'dulce'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Der Kuchen ist sehr süß', 'correct' => ['der Kuchen', 'ist', 'sehr', 'süß'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'ケーキはとても甘いです', 'correct' => ['ケーキは', 'とても', '甘いです'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '케이크는 아주 달아요', 'correct' => ['케이크는', '아주', '달아요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'pasta çok tatlı', 'correct' => ['pasta', 'çok', 'tatlı'], 'extra' => ['ekmek', 'ekmek']],
                            'ru' => ['sentence' => 'торт очень сладкий', 'correct' => ['торт', 'очень', 'сладкий'], 'extra' => ['хлеб']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Cold Shelf', 5,
                pictures: [['ar' => 'حليب', 'img' => 'milk'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'أشتري'], ['ar' => 'بيض']],
                phrases: [
                    'a' => [
                        'words' => ['أشتري', 'حليب', 'و', 'بيض'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying milk and eggs', 'correct' => ['I am buying', 'milk', 'and', 'eggs'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'alıram süd və yumurtalar', 'correct' => ['alıram', 'süd', 'və', 'yumurtalar'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'J’achète du lait et des oeufs', 'correct' => ['j’achète', 'du lait', 'et', 'des oeufs'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Compro leche y huevos', 'correct' => ['compro', 'leche', 'y', 'huevos'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ich kaufe Milch und Eier', 'correct' => ['ich kaufe', 'Milch', 'und', 'Eier'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳と卵を買います', 'correct' => ['牛乳', 'と', '卵を', '買います'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유와 달걀을 삽니다', 'correct' => ['우유와', '달걀을', '삽니다'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'süt ve yumurta alıyorum', 'correct' => ['süt', 've', 'yumurta', 'alıyorum'], 'extra' => ['yoğurt', 'tereyağı']],
                            'ru' => ['sentence' => 'я покупаю молоко и яйца', 'correct' => ['я', 'покупаю', 'молоко', 'и', 'яйца'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'b' => [
                        'words' => ['لبن', 'في القسم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The yoghurt is in the aisle', 'correct' => ['the yoghurt', 'is', 'in the aisle'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'qatıq şöbədə', 'correct' => ['qatıq', 'şöbədə'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Le yaourt est au rayon', 'correct' => ['le yaourt', 'est', 'au rayon'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'El yogur está en el pasillo', 'correct' => ['el yogur', 'está', 'en el pasillo'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Der Joghurt ist im Regal', 'correct' => ['der Joghurt', 'ist', 'im Regal'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'ヨーグルトは売り場にあります', 'correct' => ['ヨーグルトは', '売り場に', 'あります'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '요구르트는 코너에 있어요', 'correct' => ['요구르트는', '코너에', '있어요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'yoğurt reyonda', 'correct' => ['yoğurt', 'reyonda'], 'extra' => ['tereyağı', 'süt']],
                            'ru' => ['sentence' => 'йогурт в отделе', 'correct' => ['йогурт', 'в', 'отделе'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'c' => [
                        'words' => ['لا يوجد', 'زبدة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no butter', 'correct' => ['there is no', 'butter'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'yoxdur kərə yağı', 'correct' => ['yoxdur', 'kərə yağı'], 'extra' => ['pendir']],
                            'fr' => ['sentence' => 'Il n’y a pas de beurre', 'correct' => ['il n’y a pas', 'de beurre'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'No hay mantequilla', 'correct' => ['no hay', 'mantequilla'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Es gibt keine Butter', 'correct' => ['es gibt keine', 'Butter'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'バターがありません', 'correct' => ['バターが', 'ありません'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '버터가 없어요', 'correct' => ['버터가', '없어요'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'tereyağı yok', 'correct' => ['tereyağı', 'yok'], 'extra' => ['yoğurt', 'süt']],
                            'ru' => ['sentence' => 'нету масло', 'correct' => ['нету', 'масло'], 'extra' => ['сыр']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
