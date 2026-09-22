<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitRestaurant08Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'كعكة' => 'cake', 'شاي' => 'tea', 'قهوة' => 'coffee', 'ماء' => 'water',
        'حليب' => 'milk', 'خبز' => 'bread', 'جبن' => 'cheese', 'سكر' => 'sugar',
    ];

    /**
     * Arabic Restaurant Unit 8.
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
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Desserts and Sweets', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Dessert', 1,
                pictures: [['ar' => 'كعكة', 'img' => 'cake'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'أريد'], ['ar' => 'حلوى']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'حلوى'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like dessert', 'correct' => ['I would like', 'dessert'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'istəyirəm şirniyyat', 'correct' => ['istəyirəm', 'şirniyyat'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Je voudrais un dessert', 'correct' => ['je voudrais', 'un dessert'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Quisiera postre', 'correct' => ['quisiera', 'postre'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ich möchte Nachtisch', 'correct' => ['ich möchte', 'Nachtisch'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'デザートをください', 'correct' => ['デザートを', 'ください'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '디저트 주세요', 'correct' => ['디저트', '주세요'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'tatlı istiyorum', 'correct' => ['tatlı', 'istiyorum'], 'extra' => ['pasta', 'pasta']],
                            'ru' => ['sentence' => 'я хочу десерт', 'correct' => ['я', 'хочу', 'десерт'], 'extra' => ['торт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['كعكة', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A cake please', 'correct' => ['a', 'cake', 'please'], 'extra' => ['dessert']],
                            'az' => ['sentence' => 'bir tort zəhmət olmasa', 'correct' => ['bir', 'tort', 'zəhmət olmasa'], 'extra' => ['şirniyyat']],
                            'fr' => ['sentence' => 'Un gâteau s’il vous plaît', 'correct' => ['un', 'gâteau', 's’il vous plaît'], 'extra' => ['dessert']],
                            'es' => ['sentence' => 'Un pastel por favor', 'correct' => ['un', 'pastel', 'por favor'], 'extra' => ['postre']],
                            'de' => ['sentence' => 'Einen Kuchen bitte', 'correct' => ['einen', 'Kuchen', 'bitte'], 'extra' => ['Nachtisch']],
                            'ja' => ['sentence' => 'ケーキを一つお願いします', 'correct' => ['ケーキを', '一つ', 'お願いします'], 'extra' => ['デザート']],
                            'ko' => ['sentence' => '케이크 하나 부탁합니다', 'correct' => ['케이크', '하나', '부탁합니다'], 'extra' => ['디저트']],
                            'tr' => ['sentence' => 'bir pasta lütfen', 'correct' => ['bir', 'pasta', 'lütfen'], 'extra' => ['tatlı', 'çay']],
                            'ru' => ['sentence' => 'торт пожалуйста', 'correct' => ['торт', 'пожалуйста'], 'extra' => ['десерт']],
                        ],
                    ],
                    'c' => [
                        'words' => ['حلو', 'شاي'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A sweet tea', 'correct' => ['a', 'sweet', 'tea'], 'extra' => ['dessert']],
                            'az' => ['sentence' => 'bir şirin çay', 'correct' => ['bir', 'şirin', 'çay'], 'extra' => ['şirniyyat']],
                            'fr' => ['sentence' => 'Un thé sucré', 'correct' => ['un', 'thé', 'sucré'], 'extra' => ['dessert']],
                            'es' => ['sentence' => 'Un té dulce', 'correct' => ['un', 'té', 'dulce'], 'extra' => ['postre']],
                            'de' => ['sentence' => 'Ein süßer Tee', 'correct' => ['ein', 'süßer', 'Tee'], 'extra' => ['Nachtisch']],
                            'ja' => ['sentence' => '甘いお茶', 'correct' => ['甘い', 'お茶'], 'extra' => ['デザート']],
                            'ko' => ['sentence' => '달콤한 차', 'correct' => ['달콤한', '차'], 'extra' => ['디저트']],
                            'tr' => ['sentence' => 'tatlı bir çay', 'correct' => ['tatlı', 'bir', 'çay'], 'extra' => ['pasta', 'pasta']],
                            'ru' => ['sentence' => 'сладкий чай', 'correct' => ['сладкий', 'чай'], 'extra' => ['десерт']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Ice Cream', 2,
                pictures: [['ar' => 'كعكة', 'img' => 'cake'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'أريد'], ['ar' => 'آيس كريم']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'آيس كريم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like ice cream', 'correct' => ['I would like', 'ice cream'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'istəyirəm dondurma', 'correct' => ['istəyirəm', 'dondurma'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Je voudrais une glace', 'correct' => ['je voudrais', 'une glace'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Quisiera helado', 'correct' => ['quisiera', 'helado'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ich möchte Eiscreme', 'correct' => ['ich möchte', 'Eiscreme'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'アイスクリームをください', 'correct' => ['アイスクリームを', 'ください'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '아이스크림 주세요', 'correct' => ['아이스크림', '주세요'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'dondurma istiyorum', 'correct' => ['dondurma', 'istiyorum'], 'extra' => ['tatlı', 'pasta']],
                            'ru' => ['sentence' => 'я хочу мороженое', 'correct' => ['я', 'хочу', 'мороженое'], 'extra' => ['торт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['آيس كريم', 'بارد'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The ice cream is cold', 'correct' => ['the ice cream', 'is', 'cold'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'dondurma soyuq', 'correct' => ['dondurma', 'soyuq'], 'extra' => ['isti']],
                            'fr' => ['sentence' => 'La glace est froide', 'correct' => ['la glace', 'est', 'froide'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'El helado está frío', 'correct' => ['el helado', 'está', 'frío'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Die Eiscreme ist kalt', 'correct' => ['die Eiscreme', 'ist', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => 'アイスクリームは寒いです', 'correct' => ['アイスクリームは', '寒いです'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '아이스크림은 추워요', 'correct' => ['아이스크림은', '추워요'], 'extra' => ['더운']],
                            'tr' => ['sentence' => 'dondurma soğuk', 'correct' => ['dondurma', 'soğuk'], 'extra' => ['tatlı', 'pasta']],
                            'ru' => ['sentence' => 'мороженое холодный', 'correct' => ['мороженое', 'холодный'], 'extra' => ['горячий']],
                        ],
                    ],
                    'c' => [
                        'words' => ['كعكة', 'لذيذ'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The cake is delicious', 'correct' => ['the cake', 'is', 'delicious'], 'extra' => ['cold']],
                            'az' => ['sentence' => 'tort dadlı', 'correct' => ['tort', 'dadlı'], 'extra' => ['soyuq']],
                            'fr' => ['sentence' => 'Le gâteau est délicieux', 'correct' => ['le gâteau', 'est', 'délicieux'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'El pastel es delicioso', 'correct' => ['el pastel', 'es', 'delicioso'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Der Kuchen ist lecker', 'correct' => ['der Kuchen', 'ist', 'lecker'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => 'ケーキはおいしいです', 'correct' => ['ケーキは', 'おいしいです'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '케이크는 맛있어요', 'correct' => ['케이크는', '맛있어요'], 'extra' => ['추운']],
                            'tr' => ['sentence' => 'pasta lezzetli', 'correct' => ['pasta', 'lezzetli'], 'extra' => ['dondurma', 'tatlı']],
                            'ru' => ['sentence' => 'торт вкусный', 'correct' => ['торт', 'вкусный'], 'extra' => ['холодный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Chocolate', 3,
                pictures: [['ar' => 'كعكة', 'img' => 'cake'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'أريد'], ['ar' => 'شوكولاتة']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'شوكولاتة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like chocolate', 'correct' => ['I would like', 'chocolate'], 'extra' => ['ice cream']],
                            'az' => ['sentence' => 'istəyirəm şokolad', 'correct' => ['istəyirəm', 'şokolad'], 'extra' => ['dondurma']],
                            'fr' => ['sentence' => 'Je voudrais du chocolat', 'correct' => ['je voudrais', 'du chocolat'], 'extra' => ['glace']],
                            'es' => ['sentence' => 'Quisiera chocolate', 'correct' => ['quisiera', 'chocolate'], 'extra' => ['helado']],
                            'de' => ['sentence' => 'Ich möchte Schokolade', 'correct' => ['ich möchte', 'Schokolade'], 'extra' => ['Eiscreme']],
                            'ja' => ['sentence' => 'チョコレートをください', 'correct' => ['チョコレートを', 'ください'], 'extra' => ['アイスクリーム']],
                            'ko' => ['sentence' => '초콜릿 주세요', 'correct' => ['초콜릿', '주세요'], 'extra' => ['아이스크림']],
                            'tr' => ['sentence' => 'çikolata istiyorum', 'correct' => ['çikolata', 'istiyorum'], 'extra' => ['dondurma', 'pasta']],
                            'ru' => ['sentence' => 'я хочу шоколад', 'correct' => ['я', 'хочу', 'шоколад'], 'extra' => ['мороженое']],
                        ],
                    ],
                    'b' => [
                        'words' => ['كعكة', 'مع الشوكولاتة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Cake with chocolate', 'correct' => ['cake', 'with chocolate'], 'extra' => ['ice cream']],
                            'az' => ['sentence' => 'tort şokoladlı', 'correct' => ['tort', 'şokoladlı'], 'extra' => ['dondurma']],
                            'fr' => ['sentence' => 'Du gâteau avec du chocolat', 'correct' => ['du gâteau', 'avec du chocolat'], 'extra' => ['glace']],
                            'es' => ['sentence' => 'Pastel con chocolate', 'correct' => ['pastel', 'con chocolate'], 'extra' => ['helado']],
                            'de' => ['sentence' => 'Kuchen mit Schokolade', 'correct' => ['Kuchen', 'mit Schokolade'], 'extra' => ['Eiscreme']],
                            'ja' => ['sentence' => 'チョコレート入りのケーキ', 'correct' => ['チョコレート入りの', 'ケーキ'], 'extra' => ['アイスクリーム']],
                            'ko' => ['sentence' => '초콜릿 있는 케이크', 'correct' => ['초콜릿 있는', '케이크'], 'extra' => ['아이스크림']],
                            'tr' => ['sentence' => 'çikolatalı pasta', 'correct' => ['çikolatalı', 'pasta'], 'extra' => ['çikolata', 'dondurma']],
                            'ru' => ['sentence' => 'торт с шоколадом', 'correct' => ['торт', 'с', 'шоколадом'], 'extra' => ['мороженое']],
                        ],
                    ],
                    'c' => [
                        'words' => ['شوكولاتة', 'جدا', 'حلو'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The chocolate is very sweet', 'correct' => ['the chocolate', 'is', 'very', 'sweet'], 'extra' => ['cold']],
                            'az' => ['sentence' => 'şokolad çox şirin', 'correct' => ['şokolad', 'çox', 'şirin'], 'extra' => ['soyuq']],
                            'fr' => ['sentence' => 'Le chocolat est très sucré', 'correct' => ['le chocolat', 'est', 'très', 'sucré'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'El chocolate es muy dulce', 'correct' => ['el chocolate', 'es', 'muy', 'dulce'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Die Schokolade ist sehr süß', 'correct' => ['die Schokolade', 'ist', 'sehr', 'süß'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => 'チョコレートはとても甘いです', 'correct' => ['チョコレートは', 'とても', '甘いです'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '초콜릿은 아주 달아요', 'correct' => ['초콜릿은', '아주', '달아요'], 'extra' => ['추운']],
                            'tr' => ['sentence' => 'çikolata çok tatlı', 'correct' => ['çikolata', 'çok', 'tatlı'], 'extra' => ['dondurma', 'pasta']],
                            'ru' => ['sentence' => 'шоколад очень сладкий', 'correct' => ['шоколад', 'очень', 'сладкий'], 'extra' => ['холодный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Too Sweet', 4,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'هذا'], ['ar' => 'جدا']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'جدا', 'حلو'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is very sweet', 'correct' => ['this', 'is', 'very', 'sweet'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'bu çox şirin', 'correct' => ['bu', 'çox', 'şirin'], 'extra' => ['duzlu']],
                            'fr' => ['sentence' => 'Ceci est très sucré', 'correct' => ['ceci', 'est', 'très', 'sucré'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'Esto es muy dulce', 'correct' => ['esto', 'es', 'muy', 'dulce'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Das ist sehr süß', 'correct' => ['das', 'ist', 'sehr', 'süß'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => 'これはとても甘いです', 'correct' => ['これは', 'とても', '甘いです'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '이것은 아주 달아요', 'correct' => ['이것은', '아주', '달아요'], 'extra' => ['짠']],
                            'tr' => ['sentence' => 'bu çok tatlı', 'correct' => ['bu', 'çok', 'tatlı'], 'extra' => ['şeker', 'şeker']],
                            'ru' => ['sentence' => 'это очень сладкий', 'correct' => ['это', 'очень', 'сладкий'], 'extra' => ['солёный']],
                        ],
                    ],
                    'b' => [
                        'words' => ['هو', 'ليس', 'حلو'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'It is not sweet', 'correct' => ['it', 'is not', 'sweet'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'o deyil şirin', 'correct' => ['o', 'deyil', 'şirin'], 'extra' => ['duzlu']],
                            'fr' => ['sentence' => 'Ce n’est pas sucré', 'correct' => ['ce', 'n’est pas', 'sucré'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'No es dulce', 'correct' => ['no es', 'dulce'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Es ist nicht süß', 'correct' => ['es', 'ist nicht', 'süß'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => '甘くありません', 'correct' => ['甘く', 'ありません'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '달지 않아요', 'correct' => ['달지 않아요'], 'extra' => ['짠']],
                            'tr' => ['sentence' => 'tatlı değil', 'correct' => ['tatlı', 'değil'], 'extra' => ['şeker', 'şeker']],
                            'ru' => ['sentence' => 'оно не сладкий', 'correct' => ['оно', 'не', 'сладкий'], 'extra' => ['солёный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['حلوى', 'بدون سكر'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Dessert without sugar', 'correct' => ['dessert', 'without sugar'], 'extra' => ['with sugar']],
                            'az' => ['sentence' => 'şirniyyat şəkərsiz', 'correct' => ['şirniyyat', 'şəkərsiz'], 'extra' => ['şəkərli']],
                            'fr' => ['sentence' => 'Un dessert sans sucre', 'correct' => ['un dessert', 'sans sucre'], 'extra' => ['avec du sucre']],
                            'es' => ['sentence' => 'Postre sin azúcar', 'correct' => ['postre', 'sin azúcar'], 'extra' => ['con azúcar']],
                            'de' => ['sentence' => 'Nachtisch ohne Zucker', 'correct' => ['Nachtisch', 'ohne Zucker'], 'extra' => ['mit Zucker']],
                            'ja' => ['sentence' => '砂糖なしのデザート', 'correct' => ['砂糖なしの', 'デザート'], 'extra' => ['砂糖入りの']],
                            'ko' => ['sentence' => '설탕 없는 디저트', 'correct' => ['설탕 없는', '디저트'], 'extra' => ['설탕 있는']],
                            'tr' => ['sentence' => 'şekersiz tatlı', 'correct' => ['şekersiz', 'tatlı'], 'extra' => ['şeker', 'şeker']],
                            'ru' => ['sentence' => 'десерт без сахара', 'correct' => ['десерт', 'без', 'сахара'], 'extra' => ['с', 'сахаром']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ordering Dessert', 5,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'حلوى'], ['ar' => 'هل']],
                phrases: [
                    'a' => [
                        'words' => ['حلوى', 'و', 'قهوة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A dessert and a coffee', 'correct' => ['a', 'dessert', 'and', 'a', 'coffee'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'bir şirniyyat və bir qəhvə', 'correct' => ['bir', 'şirniyyat', 'və', 'bir', 'qəhvə'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Un dessert et un café', 'correct' => ['un', 'dessert', 'et', 'un', 'café'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Un postre y un café', 'correct' => ['un', 'postre', 'y', 'un', 'café'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Ein Nachtisch und ein Kaffee', 'correct' => ['ein', 'Nachtisch', 'und', 'ein', 'Kaffee'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'デザートとコーヒー', 'correct' => ['デザート', 'と', 'コーヒー'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '디저트와 커피', 'correct' => ['디저트와', '커피'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'bir tatlı ve bir kahve', 'correct' => ['bir', 'tatlı', 've', 'bir', 'kahve'], 'extra' => ['dondurma', 'çikolata']],
                            'ru' => ['sentence' => 'десерт и кофе', 'correct' => ['десерт', 'и', 'кофе'], 'extra' => ['торт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['هل', 'آيس كريم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Is there ice cream', 'correct' => ['is there', 'ice cream'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'mı dondurma', 'correct' => ['mı', 'dondurma'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Y a-t-il de la glace', 'correct' => ['y a-t-il', 'de la glace'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'Hay helado', 'correct' => ['hay', 'helado'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Gibt es Eiscreme', 'correct' => ['gibt es', 'Eiscreme'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'アイスクリームがありますか', 'correct' => ['アイスクリームが', 'ありますか'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '아이스크림이 있어요', 'correct' => ['아이스크림이', '있어요'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'dondurma var mı', 'correct' => ['dondurma', 'var', 'mı'], 'extra' => ['çikolata', 'pasta']],
                            'ru' => ['sentence' => 'ли мороженое', 'correct' => ['ли', 'мороженое'], 'extra' => ['торт']],
                        ],
                    ],
                    'c' => [
                        'words' => ['حلوى', 'جدا', 'لطيف'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The dessert is very nice', 'correct' => ['the dessert', 'is', 'very', 'nice'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'şirniyyat çox xoş', 'correct' => ['şirniyyat', 'çox', 'xoş'], 'extra' => ['tort']],
                            'fr' => ['sentence' => 'Le dessert est très beau', 'correct' => ['le dessert', 'est', 'très', 'beau'], 'extra' => ['gâteau']],
                            'es' => ['sentence' => 'El postre es muy bonito', 'correct' => ['el postre', 'es', 'muy', 'bonito'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Der Nachtisch ist sehr schön', 'correct' => ['der Nachtisch', 'ist', 'sehr', 'schön'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'デザートはとても素敵です', 'correct' => ['デザートは', 'とても', '素敵です'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '디저트는 아주 멋져요', 'correct' => ['디저트는', '아주', '멋져요'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'tatlı çok güzel', 'correct' => ['tatlı', 'çok', 'güzel'], 'extra' => ['dondurma', 'çikolata']],
                            'ru' => ['sentence' => 'десерт очень приятно', 'correct' => ['десерт', 'очень', 'приятно'], 'extra' => ['торт']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
