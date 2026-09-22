<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitSupermarket03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Помидор' => 'tomato', 'Лук' => 'onion', 'Морковь' => 'carrot', 'Картофель' => 'potato',
        'Кофе' => 'coffee', 'Чай' => 'tea', 'Салат' => 'salad', 'Вода' => 'water',
    ];

    /**
     * Russian Supermarket Unit 3.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Russian sentences are built from the shared plan tile by tile, and
     * every tile is a RussianVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ru')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Vegetables', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Tomato & Onion', 1,
                pictures: [['ru' => 'Помидор', 'img' => 'tomato'], ['ru' => 'Лук', 'img' => 'onion']],
                plain: [['ru' => 'Хочу'], ['ru' => 'Свежий']],
                phrases: [
                    'a' => [
                        'words' => ['я', 'хочу', 'помидор'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I would like a tomato', 'correct' => ['I would like', 'a', 'tomato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'istəyirəm bir pomidor', 'correct' => ['istəyirəm', 'bir', 'pomidor'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'أريد طماطم', 'correct' => ['أريد', 'طماطم'], 'extra' => ['بصل']],
                            'fr' => ['sentence' => 'Je voudrais une tomate', 'correct' => ['je voudrais', 'une', 'tomate'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Quisiera un tomate', 'correct' => ['quisiera', 'un', 'tomate'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Ich möchte eine Tomate', 'correct' => ['ich möchte', 'eine', 'Tomate'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'トマトをください', 'correct' => ['トマトを', 'ください'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '토마토 주세요', 'correct' => ['토마토', '주세요'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'domates istiyorum', 'correct' => ['domates', 'istiyorum'], 'extra' => ['sebze', 'taze']],
                        ],
                    ],
                    'b' => [
                        'words' => ['свежий', 'помидор'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A fresh tomato', 'correct' => ['a', 'fresh', 'tomato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'bir təzə pomidor', 'correct' => ['bir', 'təzə', 'pomidor'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'طازج طماطم', 'correct' => ['طازج', 'طماطم'], 'extra' => ['بصل']],
                            'fr' => ['sentence' => 'Une tomate fraîche', 'correct' => ['une', 'tomate', 'fraîche'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Un tomate fresco', 'correct' => ['un', 'tomate', 'fresco'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Eine frische Tomate', 'correct' => ['eine', 'frische', 'Tomate'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => '新鮮なトマト', 'correct' => ['新鮮な', 'トマト'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '신선한 토마토', 'correct' => ['신선한', '토마토'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'taze domates', 'correct' => ['taze', 'domates'], 'extra' => ['sebze', 'soğan']],
                        ],
                    ],
                    'c' => [
                        'words' => ['свежий', 'лук'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A fresh onion', 'correct' => ['a', 'fresh', 'onion'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'bir təzə soğan', 'correct' => ['bir', 'təzə', 'soğan'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'طازج بصل', 'correct' => ['طازج', 'بصل'], 'extra' => ['طماطم']],
                            'fr' => ['sentence' => 'Un oignon frais', 'correct' => ['un', 'oignon', 'frais'], 'extra' => ['tomate']],
                            'es' => ['sentence' => 'Una cebolla fresca', 'correct' => ['una', 'cebolla', 'fresca'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Eine frische Zwiebel', 'correct' => ['eine', 'frische', 'Zwiebel'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => '新鮮なたまねぎ', 'correct' => ['新鮮な', 'たまねぎ'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '신선한 양파', 'correct' => ['신선한', '양파'], 'extra' => ['토마토']],
                            'tr' => ['sentence' => 'taze soğan', 'correct' => ['taze', 'soğan'], 'extra' => ['sebze', 'domates']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Carrot & Potato', 2,
                pictures: [['ru' => 'Морковь', 'img' => 'carrot'], ['ru' => 'Картофель', 'img' => 'potato']],
                plain: [['ru' => 'Свежий'], ['ru' => 'Покупаю']],
                phrases: [
                    'a' => [
                        'words' => ['морковь', 'свежий'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The carrot is fresh', 'correct' => ['the carrot', 'is', 'fresh'], 'extra' => ['potato']],
                            'az' => ['sentence' => 'yerkökü təzə', 'correct' => ['yerkökü', 'təzə'], 'extra' => ['kartof']],
                            'ar' => ['sentence' => 'جزر طازج', 'correct' => ['جزر', 'طازج'], 'extra' => ['بطاطا']],
                            'fr' => ['sentence' => 'La carotte est fraîche', 'correct' => ['la carotte', 'est', 'fraîche'], 'extra' => ['pomme de terre']],
                            'es' => ['sentence' => 'La zanahoria está fresca', 'correct' => ['la zanahoria', 'está', 'fresca'], 'extra' => ['patata']],
                            'de' => ['sentence' => 'Die Karotte ist frisch', 'correct' => ['die Karotte', 'ist', 'frisch'], 'extra' => ['Kartoffel']],
                            'ja' => ['sentence' => 'にんじんは新鮮です', 'correct' => ['にんじんは', '新鮮です'], 'extra' => ['じゃがいも']],
                            'ko' => ['sentence' => '당근은 신선해요', 'correct' => ['당근은', '신선해요'], 'extra' => ['감자']],
                            'tr' => ['sentence' => 'havuç taze', 'correct' => ['havuç', 'taze'], 'extra' => ['patates', 'patates']],
                        ],
                    ],
                    'b' => [
                        'words' => ['я', 'покупаю', 'картофель'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am buying potatoes', 'correct' => ['I am buying', 'potatoes'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'alıram kartof', 'correct' => ['alıram', 'kartof'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'أشتري بطاطا', 'correct' => ['أشتري', 'بطاطا'], 'extra' => ['جزر']],
                            'fr' => ['sentence' => 'J’achète des pommes de terre', 'correct' => ['j’achète', 'des pommes de terre'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'Compro patatas', 'correct' => ['compro', 'patatas'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Ich kaufe Kartoffeln', 'correct' => ['ich kaufe', 'Kartoffeln'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => 'じゃがいもを買います', 'correct' => ['じゃがいもを', '買います'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '감자를 삽니다', 'correct' => ['감자를', '삽니다'], 'extra' => ['당근']],
                            'tr' => ['sentence' => 'patates alıyorum', 'correct' => ['patates', 'alıyorum'], 'extra' => ['havuç', 'havuç']],
                        ],
                    ],
                    'c' => [
                        'words' => ['морковь', 'и', 'картофель'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Carrot and potato', 'correct' => ['carrot', 'and', 'potato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'yerkökü və kartof', 'correct' => ['yerkökü', 'və', 'kartof'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'جزر و بطاطا', 'correct' => ['جزر', 'و', 'بطاطا'], 'extra' => ['بصل']],
                            'fr' => ['sentence' => 'Carotte et pomme de terre', 'correct' => ['carotte', 'et', 'pomme de terre'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Zanahoria y patata', 'correct' => ['zanahoria', 'y', 'patata'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Karotte und Kartoffel', 'correct' => ['Karotte', 'und', 'Kartoffel'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'にんじんとじゃがいも', 'correct' => ['にんじん', 'と', 'じゃがいも'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '당근과 감자', 'correct' => ['당근과', '감자'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'havuç ve patates', 'correct' => ['havuç', 've', 'patates'], 'extra' => []],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Cucumber', 3,
                pictures: [['ru' => 'Кофе', 'img' => 'coffee'], ['ru' => 'Чай', 'img' => 'tea']],
                plain: [['ru' => 'Хочу'], ['ru' => 'Огурец']],
                phrases: [
                    'a' => [
                        'words' => ['я', 'хочу', 'огурец'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I would like a cucumber', 'correct' => ['I would like', 'a', 'cucumber'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'istəyirəm bir xiyar', 'correct' => ['istəyirəm', 'bir', 'xiyar'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'أريد خيار', 'correct' => ['أريد', 'خيار'], 'extra' => ['طماطم']],
                            'fr' => ['sentence' => 'Je voudrais un concombre', 'correct' => ['je voudrais', 'un', 'concombre'], 'extra' => ['tomate']],
                            'es' => ['sentence' => 'Quisiera un pepino', 'correct' => ['quisiera', 'un', 'pepino'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Ich möchte eine Gurke', 'correct' => ['ich möchte', 'eine', 'Gurke'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => 'きゅうりをください', 'correct' => ['きゅうりを', 'ください'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '오이 주세요', 'correct' => ['오이', '주세요'], 'extra' => ['토마토']],
                            'tr' => ['sentence' => 'salatalık istiyorum', 'correct' => ['salatalık', 'istiyorum'], 'extra' => ['sebze', 'domates']],
                        ],
                    ],
                    'b' => [
                        'words' => ['свежий', 'огурец'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A fresh cucumber', 'correct' => ['a', 'fresh', 'cucumber'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'bir təzə xiyar', 'correct' => ['bir', 'təzə', 'xiyar'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'طازج خيار', 'correct' => ['طازج', 'خيار'], 'extra' => ['جزر']],
                            'fr' => ['sentence' => 'Un concombre frais', 'correct' => ['un', 'concombre', 'frais'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'Un pepino fresco', 'correct' => ['un', 'pepino', 'fresco'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Eine frische Gurke', 'correct' => ['eine', 'frische', 'Gurke'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => '新鮮なきゅうり', 'correct' => ['新鮮な', 'きゅうり'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '신선한 오이', 'correct' => ['신선한', '오이'], 'extra' => ['당근']],
                            'tr' => ['sentence' => 'taze salatalık', 'correct' => ['taze', 'salatalık'], 'extra' => ['sebze', 'domates']],
                        ],
                    ],
                    'c' => [
                        'words' => ['где', 'овощ'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the vegetable', 'correct' => ['where', 'is', 'the vegetable'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'harada tərəvəz', 'correct' => ['harada', 'tərəvəz'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'أين خضار', 'correct' => ['أين', 'خضار'], 'extra' => ['فاكهة']],
                            'fr' => ['sentence' => 'Où est le légume', 'correct' => ['où', 'est', 'le légume'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Dónde está la verdura', 'correct' => ['dónde', 'está', 'la verdura'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Wo ist das Gemüse', 'correct' => ['wo', 'ist', 'das Gemüse'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜はどこですか', 'correct' => ['野菜は', 'どこですか'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소는 어디에 있어요', 'correct' => ['채소는', '어디에', '있어요'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'sebze nerede', 'correct' => ['sebze', 'nerede'], 'extra' => ['salatalık', 'domates']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Vegetables & Salad', 4,
                pictures: [['ru' => 'Салат', 'img' => 'salad'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Покупаю'], ['ru' => 'Овощи']],
                phrases: [
                    'a' => [
                        'words' => ['я', 'покупаю', 'овощи'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am buying vegetables', 'correct' => ['I am buying', 'vegetables'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'alıram tərəvəzlər', 'correct' => ['alıram', 'tərəvəzlər'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'أشتري خضروات', 'correct' => ['أشتري', 'خضروات'], 'extra' => ['فاكهة']],
                            'fr' => ['sentence' => 'J’achète des légumes', 'correct' => ['j’achète', 'des légumes'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Compro verduras', 'correct' => ['compro', 'verduras'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Ich kaufe Gemüse', 'correct' => ['ich kaufe', 'Gemüse'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜を買います', 'correct' => ['野菜を', '買います'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소를 삽니다', 'correct' => ['채소를', '삽니다'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'sebze alıyorum', 'correct' => ['sebze', 'alıyorum'], 'extra' => ['salatalık', 'soğan']],
                        ],
                    ],
                    'b' => [
                        'words' => ['помидоры', 'для', 'салат'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Tomatoes for the salad', 'correct' => ['tomatoes', 'for', 'the salad'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'pomidorlar üçün salat', 'correct' => ['pomidorlar', 'üçün', 'salat'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'طماطم لأجل سلطة', 'correct' => ['طماطم', 'لأجل', 'سلطة'], 'extra' => ['بصل']],
                            'fr' => ['sentence' => 'Des tomates pour la salade', 'correct' => ['des tomates', 'pour', 'la salade'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Tomates para la ensalada', 'correct' => ['tomates', 'para', 'la ensalada'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Tomaten für den Salat', 'correct' => ['Tomaten', 'für', 'den Salat'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'サラダのためのトマト', 'correct' => ['サラダ', 'のための', 'トマト'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '샐러드를 위한 토마토', 'correct' => ['샐러드를', '위한', '토마토'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'salata için domates', 'correct' => ['salata', 'için', 'domates'], 'extra' => ['sebze', 'salatalık']],
                        ],
                    ],
                    'c' => [
                        'words' => ['овощ', 'свежий'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The vegetable is fresh', 'correct' => ['the vegetable', 'is', 'fresh'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'tərəvəz təzə', 'correct' => ['tərəvəz', 'təzə'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'خضار طازج', 'correct' => ['خضار', 'طازج'], 'extra' => ['فاكهة']],
                            'fr' => ['sentence' => 'Le légume est frais', 'correct' => ['le légume', 'est', 'frais'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'La verdura está fresca', 'correct' => ['la verdura', 'está', 'fresca'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Das Gemüse ist frisch', 'correct' => ['das Gemüse', 'ist', 'frisch'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜は新鮮です', 'correct' => ['野菜は', '新鮮です'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소는 신선해요', 'correct' => ['채소는', '신선해요'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'sebze taze', 'correct' => ['sebze', 'taze'], 'extra' => ['salatalık', 'soğan']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Filling the Basket', 5,
                pictures: [['ru' => 'Лук', 'img' => 'onion'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Покупаю'], ['ru' => 'Два']],
                phrases: [
                    'a' => [
                        'words' => ['я', 'покупаю', 'два', 'помидоры'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I am buying two tomatoes', 'correct' => ['I am buying', 'two', 'tomatoes'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'alıram iki pomidorlar', 'correct' => ['alıram', 'iki', 'pomidorlar'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'أشتري اثنان طماطم', 'correct' => ['أشتري', 'اثنان', 'طماطم'], 'extra' => ['بصل']],
                            'fr' => ['sentence' => 'J’achète deux tomates', 'correct' => ['j’achète', 'deux', 'tomates'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Compro dos tomates', 'correct' => ['compro', 'dos', 'tomates'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Ich kaufe zwei Tomaten', 'correct' => ['ich kaufe', 'zwei', 'Tomaten'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'トマトを二つ買います', 'correct' => ['トマトを', '二つ', '買います'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '토마토 두 개를 삽니다', 'correct' => ['토마토', '두', '개를', '삽니다'], 'extra' => ['양파']],
                            'tr' => ['sentence' => 'iki domates alıyorum', 'correct' => ['iki', 'domates', 'alıyorum'], 'extra' => ['taze', 'sebze']],
                        ],
                    ],
                    'b' => [
                        'words' => ['лук', 'в', 'отделе'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The onion is in the aisle', 'correct' => ['the onion', 'is', 'in the aisle'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'soğan şöbədə', 'correct' => ['soğan', 'şöbədə'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'بصل في القسم', 'correct' => ['بصل', 'في القسم'], 'extra' => ['جزر']],
                            'fr' => ['sentence' => 'L’oignon est au rayon', 'correct' => ['l’oignon', 'est', 'au rayon'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'La cebolla está en el pasillo', 'correct' => ['la cebolla', 'está', 'en el pasillo'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Die Zwiebel ist im Regal', 'correct' => ['die Zwiebel', 'ist', 'im Regal'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => 'たまねぎは売り場にあります', 'correct' => ['たまねぎは', '売り場に', 'あります'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '양파는 코너에 있어요', 'correct' => ['양파는', '코너에', '있어요'], 'extra' => ['당근']],
                            'tr' => ['sentence' => 'soğan reyonda', 'correct' => ['soğan', 'reyonda'], 'extra' => ['taze', 'sebze']],
                        ],
                    ],
                    'c' => [
                        'words' => ['свежий', 'овощи', 'пожалуйста'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Fresh vegetables please', 'correct' => ['fresh', 'vegetables', 'please'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'təzə tərəvəzlər zəhmət olmasa', 'correct' => ['təzə', 'tərəvəzlər', 'zəhmət olmasa'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'طازج خضروات من فضلك', 'correct' => ['طازج', 'خضروات', 'من فضلك'], 'extra' => ['فاكهة']],
                            'fr' => ['sentence' => 'Des légumes frais s’il vous plaît', 'correct' => ['des légumes', 'frais', 's’il vous plaît'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Verduras frescas por favor', 'correct' => ['verduras', 'frescas', 'por favor'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Frisches Gemüse bitte', 'correct' => ['frisches', 'Gemüse', 'bitte'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '新鮮な野菜をお願いします', 'correct' => ['新鮮な', '野菜を', 'お願いします'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '신선한 채소 부탁합니다', 'correct' => ['신선한', '채소', '부탁합니다'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'taze sebze lütfen', 'correct' => ['taze', 'sebze', 'lütfen'], 'extra' => ['havuç', 'patates']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
