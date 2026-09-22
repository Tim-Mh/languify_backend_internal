<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitSupermarket03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'طماطم' => 'tomato', 'بصل' => 'onion', 'جزر' => 'carrot', 'بطاطا' => 'potato',
        'قهوة' => 'coffee', 'شاي' => 'tea', 'سلطة' => 'salad', 'ماء' => 'water',
    ];

    /**
     * Arabic Supermarket Unit 3.
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

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Vegetables', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Tomato & Onion', 1,
                pictures: [['ar' => 'طماطم', 'img' => 'tomato'], ['ar' => 'بصل', 'img' => 'onion']],
                plain: [['ar' => 'أريد'], ['ar' => 'طازج']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'طماطم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like a tomato', 'correct' => ['I would like', 'a', 'tomato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'istəyirəm bir pomidor', 'correct' => ['istəyirəm', 'bir', 'pomidor'], 'extra' => ['soğan']],
                            'fr' => ['sentence' => 'Je voudrais une tomate', 'correct' => ['je voudrais', 'une', 'tomate'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Quisiera un tomate', 'correct' => ['quisiera', 'un', 'tomate'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Ich möchte eine Tomate', 'correct' => ['ich möchte', 'eine', 'Tomate'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'トマトをください', 'correct' => ['トマトを', 'ください'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '토마토 주세요', 'correct' => ['토마토', '주세요'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'domates istiyorum', 'correct' => ['domates', 'istiyorum'], 'extra' => ['sebze', 'taze']],
                            'ru' => ['sentence' => 'я хочу помидор', 'correct' => ['я', 'хочу', 'помидор'], 'extra' => ['лук']],
                        ],
                    ],
                    'b' => [
                        'words' => ['طازج', 'طماطم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A fresh tomato', 'correct' => ['a', 'fresh', 'tomato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'bir təzə pomidor', 'correct' => ['bir', 'təzə', 'pomidor'], 'extra' => ['soğan']],
                            'fr' => ['sentence' => 'Une tomate fraîche', 'correct' => ['une', 'tomate', 'fraîche'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Un tomate fresco', 'correct' => ['un', 'tomate', 'fresco'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Eine frische Tomate', 'correct' => ['eine', 'frische', 'Tomate'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => '新鮮なトマト', 'correct' => ['新鮮な', 'トマト'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '신선한 토마토', 'correct' => ['신선한', '토마토'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'taze domates', 'correct' => ['taze', 'domates'], 'extra' => ['sebze', 'soğan']],
                            'ru' => ['sentence' => 'свежий помидор', 'correct' => ['свежий', 'помидор'], 'extra' => ['лук']],
                        ],
                    ],
                    'c' => [
                        'words' => ['طازج', 'بصل'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A fresh onion', 'correct' => ['a', 'fresh', 'onion'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'bir təzə soğan', 'correct' => ['bir', 'təzə', 'soğan'], 'extra' => ['pomidor']],
                            'fr' => ['sentence' => 'Un oignon frais', 'correct' => ['un', 'oignon', 'frais'], 'extra' => ['tomate']],
                            'es' => ['sentence' => 'Una cebolla fresca', 'correct' => ['una', 'cebolla', 'fresca'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Eine frische Zwiebel', 'correct' => ['eine', 'frische', 'Zwiebel'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => '新鮮なたまねぎ', 'correct' => ['新鮮な', 'たまねぎ'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '신선한 양파', 'correct' => ['신선한', '양파'], 'extra' => ['토마토']],
                            'tr' => ['sentence' => 'taze soğan', 'correct' => ['taze', 'soğan'], 'extra' => ['sebze', 'domates']],
                            'ru' => ['sentence' => 'свежий лук', 'correct' => ['свежий', 'лук'], 'extra' => ['помидор']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Carrot & Potato', 2,
                pictures: [['ar' => 'جزر', 'img' => 'carrot'], ['ar' => 'بطاطا', 'img' => 'potato']],
                plain: [['ar' => 'طازج'], ['ar' => 'أشتري']],
                phrases: [
                    'a' => [
                        'words' => ['جزر', 'طازج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The carrot is fresh', 'correct' => ['the carrot', 'is', 'fresh'], 'extra' => ['potato']],
                            'az' => ['sentence' => 'yerkökü təzə', 'correct' => ['yerkökü', 'təzə'], 'extra' => ['kartof']],
                            'fr' => ['sentence' => 'La carotte est fraîche', 'correct' => ['la carotte', 'est', 'fraîche'], 'extra' => ['pomme de terre']],
                            'es' => ['sentence' => 'La zanahoria está fresca', 'correct' => ['la zanahoria', 'está', 'fresca'], 'extra' => ['patata']],
                            'de' => ['sentence' => 'Die Karotte ist frisch', 'correct' => ['die Karotte', 'ist', 'frisch'], 'extra' => ['Kartoffel']],
                            'ja' => ['sentence' => 'にんじんは新鮮です', 'correct' => ['にんじんは', '新鮮です'], 'extra' => ['じゃがいも']],
                            'ko' => ['sentence' => '당근은 신선해요', 'correct' => ['당근은', '신선해요'], 'extra' => ['감자']],
                            'tr' => ['sentence' => 'havuç taze', 'correct' => ['havuç', 'taze'], 'extra' => ['patates', 'patates']],
                            'ru' => ['sentence' => 'морковь свежий', 'correct' => ['морковь', 'свежий'], 'extra' => ['картофель']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أشتري', 'بطاطا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying potatoes', 'correct' => ['I am buying', 'potatoes'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'alıram kartof', 'correct' => ['alıram', 'kartof'], 'extra' => ['yerkökü']],
                            'fr' => ['sentence' => 'J’achète des pommes de terre', 'correct' => ['j’achète', 'des pommes de terre'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'Compro patatas', 'correct' => ['compro', 'patatas'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Ich kaufe Kartoffeln', 'correct' => ['ich kaufe', 'Kartoffeln'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => 'じゃがいもを買います', 'correct' => ['じゃがいもを', '買います'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '감자를 삽니다', 'correct' => ['감자를', '삽니다'], 'extra' => ['당근']],
                            'tr' => ['sentence' => 'patates alıyorum', 'correct' => ['patates', 'alıyorum'], 'extra' => ['havuç', 'havuç']],
                            'ru' => ['sentence' => 'я покупаю картофель', 'correct' => ['я', 'покупаю', 'картофель'], 'extra' => ['морковь']],
                        ],
                    ],
                    'c' => [
                        'words' => ['جزر', 'و', 'بطاطا'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Carrot and potato', 'correct' => ['carrot', 'and', 'potato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'yerkökü və kartof', 'correct' => ['yerkökü', 'və', 'kartof'], 'extra' => ['soğan']],
                            'fr' => ['sentence' => 'Carotte et pomme de terre', 'correct' => ['carotte', 'et', 'pomme de terre'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Zanahoria y patata', 'correct' => ['zanahoria', 'y', 'patata'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Karotte und Kartoffel', 'correct' => ['Karotte', 'und', 'Kartoffel'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'にんじんとじゃがいも', 'correct' => ['にんじん', 'と', 'じゃがいも'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '당근과 감자', 'correct' => ['당근과', '감자'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'havuç ve patates', 'correct' => ['havuç', 've', 'patates'], 'extra' => []],
                            'ru' => ['sentence' => 'морковь и картофель', 'correct' => ['морковь', 'и', 'картофель'], 'extra' => ['лук']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Cucumber', 3,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'أريد'], ['ar' => 'خيار']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'خيار'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a cucumber', 'correct' => ['I would like', 'a', 'cucumber'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'istəyirəm bir xiyar', 'correct' => ['istəyirəm', 'bir', 'xiyar'], 'extra' => ['pomidor']],
                            'fr' => ['sentence' => 'Je voudrais un concombre', 'correct' => ['je voudrais', 'un', 'concombre'], 'extra' => ['tomate']],
                            'es' => ['sentence' => 'Quisiera un pepino', 'correct' => ['quisiera', 'un', 'pepino'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Ich möchte eine Gurke', 'correct' => ['ich möchte', 'eine', 'Gurke'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => 'きゅうりをください', 'correct' => ['きゅうりを', 'ください'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '오이 주세요', 'correct' => ['오이', '주세요'], 'extra' => ['토마토']],
                            'tr' => ['sentence' => 'salatalık istiyorum', 'correct' => ['salatalık', 'istiyorum'], 'extra' => ['sebze', 'domates']],
                            'ru' => ['sentence' => 'я хочу огурец', 'correct' => ['я', 'хочу', 'огурец'], 'extra' => ['помидор']],
                        ],
                    ],
                    'b' => [
                        'words' => ['طازج', 'خيار'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A fresh cucumber', 'correct' => ['a', 'fresh', 'cucumber'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'bir təzə xiyar', 'correct' => ['bir', 'təzə', 'xiyar'], 'extra' => ['yerkökü']],
                            'fr' => ['sentence' => 'Un concombre frais', 'correct' => ['un', 'concombre', 'frais'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'Un pepino fresco', 'correct' => ['un', 'pepino', 'fresco'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Eine frische Gurke', 'correct' => ['eine', 'frische', 'Gurke'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => '新鮮なきゅうり', 'correct' => ['新鮮な', 'きゅうり'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '신선한 오이', 'correct' => ['신선한', '오이'], 'extra' => ['당근']],
                            'tr' => ['sentence' => 'taze salatalık', 'correct' => ['taze', 'salatalık'], 'extra' => ['sebze', 'domates']],
                            'ru' => ['sentence' => 'свежий огурец', 'correct' => ['свежий', 'огурец'], 'extra' => ['морковь']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أين', 'خضار'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the vegetable', 'correct' => ['where', 'is', 'the vegetable'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'harada tərəvəz', 'correct' => ['harada', 'tərəvəz'], 'extra' => ['meyvə']],
                            'fr' => ['sentence' => 'Où est le légume', 'correct' => ['où', 'est', 'le légume'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Dónde está la verdura', 'correct' => ['dónde', 'está', 'la verdura'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Wo ist das Gemüse', 'correct' => ['wo', 'ist', 'das Gemüse'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜はどこですか', 'correct' => ['野菜は', 'どこですか'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소는 어디에 있어요', 'correct' => ['채소는', '어디에', '있어요'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'sebze nerede', 'correct' => ['sebze', 'nerede'], 'extra' => ['salatalık', 'domates']],
                            'ru' => ['sentence' => 'где овощ', 'correct' => ['где', 'овощ'], 'extra' => ['фрукт']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Vegetables & Salad', 4,
                pictures: [['ar' => 'طماطم', 'img' => 'tomato'], ['ar' => 'سلطة', 'img' => 'salad']],
                plain: [['ar' => 'أشتري'], ['ar' => 'خضروات']],
                phrases: [
                    'a' => [
                        'words' => ['أشتري', 'خضروات'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am buying vegetables', 'correct' => ['I am buying', 'vegetables'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'alıram tərəvəzlər', 'correct' => ['alıram', 'tərəvəzlər'], 'extra' => ['meyvə']],
                            'fr' => ['sentence' => 'J’achète des légumes', 'correct' => ['j’achète', 'des légumes'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Compro verduras', 'correct' => ['compro', 'verduras'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Ich kaufe Gemüse', 'correct' => ['ich kaufe', 'Gemüse'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜を買います', 'correct' => ['野菜を', '買います'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소를 삽니다', 'correct' => ['채소를', '삽니다'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'sebze alıyorum', 'correct' => ['sebze', 'alıyorum'], 'extra' => ['salatalık', 'soğan']],
                            'ru' => ['sentence' => 'я покупаю овощи', 'correct' => ['я', 'покупаю', 'овощи'], 'extra' => ['фрукт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['طماطم', 'لأجل', 'سلطة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Tomatoes for the salad', 'correct' => ['tomatoes', 'for', 'the salad'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'pomidorlar üçün salat', 'correct' => ['pomidorlar', 'üçün', 'salat'], 'extra' => ['soğan']],
                            'fr' => ['sentence' => 'Des tomates pour la salade', 'correct' => ['des tomates', 'pour', 'la salade'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Tomates para la ensalada', 'correct' => ['tomates', 'para', 'la ensalada'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Tomaten für den Salat', 'correct' => ['Tomaten', 'für', 'den Salat'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'サラダのためのトマト', 'correct' => ['サラダ', 'のための', 'トマト'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '샐러드를 위한 토마토', 'correct' => ['샐러드를', '위한', '토마토'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'salata için domates', 'correct' => ['salata', 'için', 'domates'], 'extra' => ['sebze', 'salatalık']],
                            'ru' => ['sentence' => 'помидоры для салат', 'correct' => ['помидоры', 'для', 'салат'], 'extra' => ['лук']],
                        ],
                    ],
                    'c' => [
                        'words' => ['خضار', 'طازج'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The vegetable is fresh', 'correct' => ['the vegetable', 'is', 'fresh'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'tərəvəz təzə', 'correct' => ['tərəvəz', 'təzə'], 'extra' => ['meyvə']],
                            'fr' => ['sentence' => 'Le légume est frais', 'correct' => ['le légume', 'est', 'frais'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'La verdura está fresca', 'correct' => ['la verdura', 'está', 'fresca'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Das Gemüse ist frisch', 'correct' => ['das Gemüse', 'ist', 'frisch'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜は新鮮です', 'correct' => ['野菜は', '新鮮です'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소는 신선해요', 'correct' => ['채소는', '신선해요'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'sebze taze', 'correct' => ['sebze', 'taze'], 'extra' => ['salatalık', 'soğan']],
                            'ru' => ['sentence' => 'овощ свежий', 'correct' => ['овощ', 'свежий'], 'extra' => ['фрукт']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Filling the Basket', 5,
                pictures: [['ar' => 'طماطم', 'img' => 'tomato'], ['ar' => 'بصل', 'img' => 'onion']],
                plain: [['ar' => 'أشتري'], ['ar' => 'اثنان']],
                phrases: [
                    'a' => [
                        'words' => ['أشتري', 'اثنان', 'طماطم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying two tomatoes', 'correct' => ['I am buying', 'two', 'tomatoes'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'alıram iki pomidorlar', 'correct' => ['alıram', 'iki', 'pomidorlar'], 'extra' => ['soğan']],
                            'fr' => ['sentence' => 'J’achète deux tomates', 'correct' => ['j’achète', 'deux', 'tomates'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Compro dos tomates', 'correct' => ['compro', 'dos', 'tomates'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Ich kaufe zwei Tomaten', 'correct' => ['ich kaufe', 'zwei', 'Tomaten'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'トマトを二つ買います', 'correct' => ['トマトを', '二つ', '買います'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '토마토 두 개를 삽니다', 'correct' => ['토마토', '두', '개를', '삽니다'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'iki domates alıyorum', 'correct' => ['iki', 'domates', 'alıyorum'], 'extra' => ['taze', 'sebze']],
                            'ru' => ['sentence' => 'я покупаю два помидоры', 'correct' => ['я', 'покупаю', 'два', 'помидоры'], 'extra' => ['лук']],
                        ],
                    ],
                    'b' => [
                        'words' => ['بصل', 'في القسم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The onion is in the aisle', 'correct' => ['the onion', 'is', 'in the aisle'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'soğan şöbədə', 'correct' => ['soğan', 'şöbədə'], 'extra' => ['yerkökü']],
                            'fr' => ['sentence' => 'L’oignon est au rayon', 'correct' => ['l’oignon', 'est', 'au rayon'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'La cebolla está en el pasillo', 'correct' => ['la cebolla', 'está', 'en el pasillo'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Die Zwiebel ist im Regal', 'correct' => ['die Zwiebel', 'ist', 'im Regal'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => 'たまねぎは売り場にあります', 'correct' => ['たまねぎは', '売り場に', 'あります'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '양파는 코너에 있어요', 'correct' => ['양파는', '코너에', '있어요'], 'extra' => ['당근']],
                            'tr' => ['sentence' => 'soğan reyonda', 'correct' => ['soğan', 'reyonda'], 'extra' => ['taze', 'sebze']],
                            'ru' => ['sentence' => 'лук в отделе', 'correct' => ['лук', 'в', 'отделе'], 'extra' => ['морковь']],
                        ],
                    ],
                    'c' => [
                        'words' => ['طازج', 'خضروات', 'من فضلك'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Fresh vegetables please', 'correct' => ['fresh', 'vegetables', 'please'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'təzə tərəvəzlər zəhmət olmasa', 'correct' => ['təzə', 'tərəvəzlər', 'zəhmət olmasa'], 'extra' => ['meyvə']],
                            'fr' => ['sentence' => 'Des légumes frais s’il vous plaît', 'correct' => ['des légumes', 'frais', 's’il vous plaît'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Verduras frescas por favor', 'correct' => ['verduras', 'frescas', 'por favor'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Frisches Gemüse bitte', 'correct' => ['frisches', 'Gemüse', 'bitte'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '新鮮な野菜をお願いします', 'correct' => ['新鮮な', '野菜を', 'お願いします'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '신선한 채소 부탁합니다', 'correct' => ['신선한', '채소', '부탁합니다'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'taze sebze lütfen', 'correct' => ['taze', 'sebze', 'lütfen'], 'extra' => ['havuç', 'patates']],
                            'ru' => ['sentence' => 'свежий овощи пожалуйста', 'correct' => ['свежий', 'овощи', 'пожалуйста'], 'extra' => ['фрукт']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
