<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitSupermarket04Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Süd' => 'milk', 'Qəhvə' => 'coffee', 'Pendir' => 'cheese', 'Çörək' => 'bread',
        'Çay' => 'tea', 'Tort' => 'cake', 'Su' => 'water', 'Şəkər' => 'sugar',
    ];

    /**
     * Azerbaijani Supermarket Unit 4.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Dairy and Bakery', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Milk & Yoghurt', 1,
                pictures: [['az' => 'Süd', 'img' => 'milk'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Alıram'], ['az' => 'Qatıq']],
                phrases: [
                    'a' => [
                        'words' => ['alıram', 'süd'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying milk', 'correct' => ['I am buying', 'milk'], 'extra' => ['yoghurt']],
                            'fr' => ['sentence' => 'J’achète du lait', 'correct' => ['j’achète', 'du lait'], 'extra' => ['yaourt']],
                            'es' => ['sentence' => 'Compro leche', 'correct' => ['compro', 'leche'], 'extra' => ['yogur']],
                            'de' => ['sentence' => 'Ich kaufe Milch', 'correct' => ['ich kaufe', 'Milch'], 'extra' => ['Joghurt']],
                            'ja' => ['sentence' => '牛乳を買います', 'correct' => ['牛乳を', '買います'], 'extra' => ['ヨーグルト']],
                            'ko' => ['sentence' => '우유를 삽니다', 'correct' => ['우유를', '삽니다'], 'extra' => ['요구르트']],
                            'tr' => ['sentence' => 'süt alıyorum', 'correct' => ['süt', 'alıyorum'], 'extra' => ['yoğurt', 'peynir']],
                            'ru' => ['sentence' => 'я покупаю молоко', 'correct' => ['я', 'покупаю', 'молоко'], 'extra' => ['йогурт']],
                            'ar' => ['sentence' => 'أشتري حليب', 'correct' => ['أشتري', 'حليب'], 'extra' => ['لبن']],
                        ],
                    ],
                    'b' => [
                        'words' => ['qatıq', 'təzə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The yoghurt is fresh', 'correct' => ['the yoghurt', 'is', 'fresh'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Le yaourt est frais', 'correct' => ['le yaourt', 'est', 'frais'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'El yogur está fresco', 'correct' => ['el yogur', 'está', 'fresco'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Der Joghurt ist frisch', 'correct' => ['der Joghurt', 'ist', 'frisch'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'ヨーグルトは新鮮です', 'correct' => ['ヨーグルトは', '新鮮です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '요구르트는 신선해요', 'correct' => ['요구르트는', '신선해요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'yoğurt taze', 'correct' => ['yoğurt', 'taze'], 'extra' => ['süt', 'süt']],
                            'ru' => ['sentence' => 'йогурт свежий', 'correct' => ['йогурт', 'свежий'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'لبن طازج', 'correct' => ['لبن', 'طازج'], 'extra' => ['حليب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['süd', 'və', 'qatıq'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Milk and yoghurt', 'correct' => ['milk', 'and', 'yoghurt'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Du lait et du yaourt', 'correct' => ['du lait', 'et', 'du yaourt'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Leche y yogur', 'correct' => ['leche', 'y', 'yogur'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Milch und Joghurt', 'correct' => ['Milch', 'und', 'Joghurt'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳とヨーグルト', 'correct' => ['牛乳', 'と', 'ヨーグルト'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유와 요구르트', 'correct' => ['우유와', '요구르트'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'süt ve yoğurt', 'correct' => ['süt', 've', 'yoğurt'], 'extra' => ['peynir']],
                            'ru' => ['sentence' => 'молоко и йогурт', 'correct' => ['молоко', 'и', 'йогурт'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'حليب و لبن', 'correct' => ['حليب', 'و', 'لبن'], 'extra' => ['جبن']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Butter & Cheese', 2,
                pictures: [['az' => 'Pendir', 'img' => 'cheese'], ['az' => 'Çörək', 'img' => 'bread']],
                plain: [['az' => 'İstəyirəm'], ['az' => 'Kərə yağı']],
                phrases: [
                    'a' => [
                        'words' => ['istəyirəm', 'kərə yağı'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like butter', 'correct' => ['I would like', 'butter'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Je voudrais du beurre', 'correct' => ['je voudrais', 'du beurre'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Quisiera mantequilla', 'correct' => ['quisiera', 'mantequilla'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ich möchte Butter', 'correct' => ['ich möchte', 'Butter'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'バターをください', 'correct' => ['バターを', 'ください'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '버터 주세요', 'correct' => ['버터', '주세요'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'tereyağı istiyorum', 'correct' => ['tereyağı', 'istiyorum'], 'extra' => ['peynir', 'peynir']],
                            'ru' => ['sentence' => 'я хочу масло', 'correct' => ['я', 'хочу', 'масло'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'أريد زبدة', 'correct' => ['أريد', 'زبدة'], 'extra' => ['جبن']],
                        ],
                    ],
                    'b' => [
                        'words' => ['harada', 'pendir'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the cheese', 'correct' => ['where', 'is', 'the cheese'], 'extra' => ['butter']],
                            'fr' => ['sentence' => 'Où est le fromage', 'correct' => ['où', 'est', 'le fromage'], 'extra' => ['beurre']],
                            'es' => ['sentence' => 'Dónde está el queso', 'correct' => ['dónde', 'está', 'el queso'], 'extra' => ['mantequilla']],
                            'de' => ['sentence' => 'Wo ist der Käse', 'correct' => ['wo', 'ist', 'der Käse'], 'extra' => ['Butter']],
                            'ja' => ['sentence' => 'チーズはどこですか', 'correct' => ['チーズは', 'どこですか'], 'extra' => ['バター']],
                            'ko' => ['sentence' => '치즈는 어디에 있어요', 'correct' => ['치즈는', '어디에', '있어요'], 'extra' => ['버터']],
                            'tr' => ['sentence' => 'peynir nerede', 'correct' => ['peynir', 'nerede'], 'extra' => ['tereyağı', 'ekmek']],
                            'ru' => ['sentence' => 'где сыр', 'correct' => ['где', 'сыр'], 'extra' => ['масло']],
                            'ar' => ['sentence' => 'أين جبن', 'correct' => ['أين', 'جبن'], 'extra' => ['زبدة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çörək', 'yağlı'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Bread with butter', 'correct' => ['bread', 'with butter'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Du pain avec du beurre', 'correct' => ['du pain', 'avec du beurre'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Pan con mantequilla', 'correct' => ['pan', 'con mantequilla'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Brot mit Butter', 'correct' => ['Brot', 'mit Butter'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'バター入りのパン', 'correct' => ['バター入りの', 'パン'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '버터 있는 빵', 'correct' => ['버터 있는', '빵'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'tereyağlı ekmek', 'correct' => ['tereyağlı', 'ekmek'], 'extra' => ['tereyağı', 'peynir']],
                            'ru' => ['sentence' => 'хлеб с маслом', 'correct' => ['хлеб', 'с', 'маслом'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'خبز مع الزبدة', 'correct' => ['خبز', 'مع الزبدة'], 'extra' => ['جبن']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Eggs', 3,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Alıram'], ['az' => 'Yumurtalar']],
                phrases: [
                    'a' => [
                        'words' => ['alıram', 'yumurtalar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am buying eggs', 'correct' => ['I am buying', 'eggs'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'J’achète des oeufs', 'correct' => ['j’achète', 'des oeufs'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Compro huevos', 'correct' => ['compro', 'huevos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich kaufe Eier', 'correct' => ['ich kaufe', 'Eier'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵を買います', 'correct' => ['卵を', '買います'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀을 삽니다', 'correct' => ['달걀을', '삽니다'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'yumurta alıyorum', 'correct' => ['yumurta', 'alıyorum'], 'extra' => ['kutu', 'süt']],
                            'ru' => ['sentence' => 'я покупаю яйца', 'correct' => ['я', 'покупаю', 'яйца'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'أشتري بيض', 'correct' => ['أشتري', 'بيض'], 'extra' => ['حليب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'qutu', 'yumurtanın'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A box of eggs', 'correct' => ['a', 'box', 'of eggs'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Une boîte d’oeufs', 'correct' => ['une', 'boîte', 'd’oeufs'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una caja de huevos', 'correct' => ['una', 'caja', 'de huevos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Schachtel Eier', 'correct' => ['eine', 'Schachtel', 'Eier'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵一箱', 'correct' => ['卵', '一箱'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀 한 상자', 'correct' => ['달걀', '한', '상자'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir kutu yumurta', 'correct' => ['bir', 'kutu', 'yumurta'], 'extra' => ['süt']],
                            'ru' => ['sentence' => 'коробка яиц', 'correct' => ['коробка', 'яиц'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'علبة البيض', 'correct' => ['علبة', 'البيض'], 'extra' => ['حليب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yumurtalar', 'təzə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The eggs are fresh', 'correct' => ['the eggs', 'are', 'fresh'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Les oeufs sont frais', 'correct' => ['les oeufs', 'sont', 'frais'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Los huevos están frescos', 'correct' => ['los huevos', 'están', 'frescos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Die Eier sind frisch', 'correct' => ['die Eier', 'sind', 'frisch'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵は新鮮です', 'correct' => ['卵は', '新鮮です'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀은 신선해요', 'correct' => ['달걀은', '신선해요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'yumurta taze', 'correct' => ['yumurta', 'taze'], 'extra' => ['kutu', 'süt']],
                            'ru' => ['sentence' => 'яйца свежий', 'correct' => ['яйца', 'свежий'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'بيض طازج', 'correct' => ['بيض', 'طازج'], 'extra' => ['حليب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: The Bakery', 4,
                pictures: [['az' => 'Çörək', 'img' => 'bread'], ['az' => 'Tort', 'img' => 'cake']],
                plain: [['az' => 'Təzə'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['təzə', 'çörək'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Fresh bread', 'correct' => ['fresh', 'bread'], 'extra' => ['cake']],
                            'fr' => ['sentence' => 'Du pain frais', 'correct' => ['du pain', 'frais'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Pan fresco', 'correct' => ['pan', 'fresco'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Frisches Brot', 'correct' => ['frisches', 'Brot'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => '新鮮なパン', 'correct' => ['新鮮な', 'パン'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '신선한 빵', 'correct' => ['신선한', '빵'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'taze ekmek', 'correct' => ['taze', 'ekmek'], 'extra' => ['pasta', 'pasta']],
                            'ru' => ['sentence' => 'свежий хлеб', 'correct' => ['свежий', 'хлеб'], 'extra' => ['торт']],
                            'ar' => ['sentence' => 'طازج خبز', 'correct' => ['طازج', 'خبز'], 'extra' => ['كعكة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'çörək', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A bread please', 'correct' => ['a', 'bread', 'please'], 'extra' => ['cake']],
                            'fr' => ['sentence' => 'Un pain s’il vous plaît', 'correct' => ['un', 'pain', 's’il vous plaît'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Un pan por favor', 'correct' => ['un', 'pan', 'por favor'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ein Brot bitte', 'correct' => ['ein', 'Brot', 'bitte'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'パンを一つお願いします', 'correct' => ['パンを', '一つ', 'お願いします'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '빵 하나 부탁합니다', 'correct' => ['빵', '하나', '부탁합니다'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'bir ekmek lütfen', 'correct' => ['bir', 'ekmek', 'lütfen'], 'extra' => ['pasta', 'pasta']],
                            'ru' => ['sentence' => 'хлеб пожалуйста', 'correct' => ['хлеб', 'пожалуйста'], 'extra' => ['торт']],
                            'ar' => ['sentence' => 'خبز من فضلك', 'correct' => ['خبز', 'من فضلك'], 'extra' => ['كعكة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['tort', 'çox', 'şirin'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The cake is very sweet', 'correct' => ['the cake', 'is', 'very', 'sweet'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Le gâteau est très sucré', 'correct' => ['le gâteau', 'est', 'très', 'sucré'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'El pastel es muy dulce', 'correct' => ['el pastel', 'es', 'muy', 'dulce'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Der Kuchen ist sehr süß', 'correct' => ['der Kuchen', 'ist', 'sehr', 'süß'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'ケーキはとても甘いです', 'correct' => ['ケーキは', 'とても', '甘いです'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '케이크는 아주 달아요', 'correct' => ['케이크는', '아주', '달아요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'pasta çok tatlı', 'correct' => ['pasta', 'çok', 'tatlı'], 'extra' => ['ekmek', 'ekmek']],
                            'ru' => ['sentence' => 'торт очень сладкий', 'correct' => ['торт', 'очень', 'сладкий'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'كعكة جدا حلو', 'correct' => ['كعكة', 'جدا', 'حلو'], 'extra' => ['خبز']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Cold Shelf', 5,
                pictures: [['az' => 'Süd', 'img' => 'milk'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Alıram'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['alıram', 'süd', 'və', 'yumurtalar'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I am buying milk and eggs', 'correct' => ['I am buying', 'milk', 'and', 'eggs'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'J’achète du lait et des oeufs', 'correct' => ['j’achète', 'du lait', 'et', 'des oeufs'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Compro leche y huevos', 'correct' => ['compro', 'leche', 'y', 'huevos'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ich kaufe Milch und Eier', 'correct' => ['ich kaufe', 'Milch', 'und', 'Eier'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳と卵を買います', 'correct' => ['牛乳', 'と', '卵を', '買います'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유와 달걀을 삽니다', 'correct' => ['우유와', '달걀을', '삽니다'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'süt ve yumurta alıyorum', 'correct' => ['süt', 've', 'yumurta', 'alıyorum'], 'extra' => ['yoğurt', 'tereyağı']],
                            'ru' => ['sentence' => 'я покупаю молоко и яйца', 'correct' => ['я', 'покупаю', 'молоко', 'и', 'яйца'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'أشتري حليب و بيض', 'correct' => ['أشتري', 'حليب', 'و', 'بيض'], 'extra' => ['خبز']],
                        ],
                    ],
                    'b' => [
                        'words' => ['qatıq', 'şöbədə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The yoghurt is in the aisle', 'correct' => ['the yoghurt', 'is', 'in the aisle'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Le yaourt est au rayon', 'correct' => ['le yaourt', 'est', 'au rayon'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'El yogur está en el pasillo', 'correct' => ['el yogur', 'está', 'en el pasillo'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Der Joghurt ist im Regal', 'correct' => ['der Joghurt', 'ist', 'im Regal'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'ヨーグルトは売り場にあります', 'correct' => ['ヨーグルトは', '売り場に', 'あります'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '요구르트는 코너에 있어요', 'correct' => ['요구르트는', '코너에', '있어요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'yoğurt reyonda', 'correct' => ['yoğurt', 'reyonda'], 'extra' => ['tereyağı', 'süt']],
                            'ru' => ['sentence' => 'йогурт в отделе', 'correct' => ['йогурт', 'в', 'отделе'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'لبن في القسم', 'correct' => ['لبن', 'في القسم'], 'extra' => ['خبز']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yoxdur', 'kərə yağı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is no butter', 'correct' => ['there is no', 'butter'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Il n’y a pas de beurre', 'correct' => ['il n’y a pas', 'de beurre'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'No hay mantequilla', 'correct' => ['no hay', 'mantequilla'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Es gibt keine Butter', 'correct' => ['es gibt keine', 'Butter'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'バターがありません', 'correct' => ['バターが', 'ありません'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '버터가 없어요', 'correct' => ['버터가', '없어요'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'tereyağı yok', 'correct' => ['tereyağı', 'yok'], 'extra' => ['yoğurt', 'süt']],
                            'ru' => ['sentence' => 'нету масло', 'correct' => ['нету', 'масло'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'لا يوجد زبدة', 'correct' => ['لا يوجد', 'زبدة'], 'extra' => ['جبن']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
