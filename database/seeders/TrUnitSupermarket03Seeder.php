<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitSupermarket03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Domates' => 'tomato',
        'Soğan' => 'onion',
        'Havuç' => 'carrot',
        'Patates' => 'potato',
        'Elma' => 'apple',
    ];

    /**
     * Turkish Supermarket Unit 3 - vegetables.
     *
     * THE RULE THIS UNIT TEACHES: AN ADJECTIVE NEVER AGREES WITH ITS NOUN.
     *
     * `taze domates`, `taze soğan`, `taze havuç`. The adjective is identical in
     * every case: no gender, no number, no case ending, ever. Turkish adjectives
     * simply do not inflect.
     *
     * That is worth a unit of its own because four of the six native languages here
     * DO agree. A Spanish speaker writing `frescos` for a plural, or a German
     * speaker reaching for `frische`, is applying a rule Turkish has never had. The
     * word bank shows the agreement in their own language and a single unchanging
     * form in Turkish, side by side.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Vegetables', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Tomato & Onion', 1,
                pictures: [['tr' => 'Domates', 'img' => 'tomato'], ['tr' => 'Soğan', 'img' => 'onion']],
                plain: [['tr' => 'Sebze'], ['tr' => 'Taze']],
                phrases: [
                    'a' => [
                        'words' => ['domates', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like a tomato', 'correct' => ['I would like', 'a', 'tomato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'istəyirəm bir pomidor', 'correct' => ['istəyirəm', 'bir', 'pomidor'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'أريد طماطم', 'correct' => ['أريد', 'طماطم'], 'extra' => ['بصل']],
                            'ru' => ['sentence' => 'я хочу помидор', 'correct' => ['я', 'хочу', 'помидор'], 'extra' => ['лук']],
                            'fr' => ['sentence' => 'Je voudrais une tomate', 'correct' => ['je voudrais', 'une', 'tomate'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Quisiera un tomate', 'correct' => ['quisiera', 'un', 'tomate'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Ich möchte eine Tomate', 'correct' => ['ich möchte', 'eine', 'Tomate'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'トマトをください', 'correct' => ['トマトを', 'ください'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '토마토 주세요', 'correct' => ['토마토', '주세요'], 'extra' => ['양파']],
                        ],
                    ],
                    'b' => [
                        'words' => ['taze', 'domates'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A fresh tomato', 'correct' => ['a', 'fresh', 'tomato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'bir təzə pomidor', 'correct' => ['bir', 'təzə', 'pomidor'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'طازج طماطم', 'correct' => ['طازج', 'طماطم'], 'extra' => ['بصل']],
                            'ru' => ['sentence' => 'свежий помидор', 'correct' => ['свежий', 'помидор'], 'extra' => ['лук']],
                            'fr' => ['sentence' => 'Une tomate fraîche', 'correct' => ['une', 'tomate', 'fraîche'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Un tomate fresco', 'correct' => ['un', 'tomate', 'fresco'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Eine frische Tomate', 'correct' => ['eine', 'frische', 'Tomate'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => '新鮮なトマト', 'correct' => ['新鮮な', 'トマト'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '신선한 토마토', 'correct' => ['신선한', '토마토'], 'extra' => ['양파']],
                        ],
                    ],
                    'c' => [
                        'words' => ['taze', 'soğan'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A fresh onion', 'correct' => ['a', 'fresh', 'onion'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'bir təzə soğan', 'correct' => ['bir', 'təzə', 'soğan'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'طازج بصل', 'correct' => ['طازج', 'بصل'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'свежий лук', 'correct' => ['свежий', 'лук'], 'extra' => ['помидор']],
                            'fr' => ['sentence' => 'Un oignon frais', 'correct' => ['un', 'oignon', 'frais'], 'extra' => ['tomate']],
                            'es' => ['sentence' => 'Una cebolla fresca', 'correct' => ['una', 'cebolla', 'fresca'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Eine frische Zwiebel', 'correct' => ['eine', 'frische', 'Zwiebel'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => '新鮮なたまねぎ', 'correct' => ['新鮮な', 'たまねぎ'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '신선한 양파', 'correct' => ['신선한', '양파'], 'extra' => ['토마토']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Carrot & Potato', 2,
                pictures: [['tr' => 'Havuç', 'img' => 'carrot'], ['tr' => 'Patates', 'img' => 'potato']],
                plain: [['tr' => 'Havuç'], ['tr' => 'Patates']],
                phrases: [
                    'a' => [
                        'words' => ['havuç', 'taze'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The carrot is fresh', 'correct' => ['the carrot', 'is', 'fresh'], 'extra' => ['potato']],
                            'az' => ['sentence' => 'yerkökü təzə', 'correct' => ['yerkökü', 'təzə'], 'extra' => ['kartof']],
                            'ar' => ['sentence' => 'جزر طازج', 'correct' => ['جزر', 'طازج'], 'extra' => ['بطاطا']],
                            'ru' => ['sentence' => 'морковь свежий', 'correct' => ['морковь', 'свежий'], 'extra' => ['картофель']],
                            'fr' => ['sentence' => 'La carotte est fraîche', 'correct' => ['la carotte', 'est', 'fraîche'], 'extra' => ['pomme de terre']],
                            'es' => ['sentence' => 'La zanahoria está fresca', 'correct' => ['la zanahoria', 'está', 'fresca'], 'extra' => ['patata']],
                            'de' => ['sentence' => 'Die Karotte ist frisch', 'correct' => ['die Karotte', 'ist', 'frisch'], 'extra' => ['Kartoffel']],
                            'ja' => ['sentence' => 'にんじんは新鮮です', 'correct' => ['にんじんは', '新鮮です'], 'extra' => ['じゃがいも']],
                            'ko' => ['sentence' => '당근은 신선해요', 'correct' => ['당근은', '신선해요'], 'extra' => ['감자']],
                        ],
                    ],
                    'b' => [
                        'words' => ['patates', 'alıyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am buying potatoes', 'correct' => ['I am buying', 'potatoes'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'alıram kartof', 'correct' => ['alıram', 'kartof'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'أشتري بطاطا', 'correct' => ['أشتري', 'بطاطا'], 'extra' => ['جزر']],
                            'ru' => ['sentence' => 'я покупаю картофель', 'correct' => ['я', 'покупаю', 'картофель'], 'extra' => ['морковь']],
                            'fr' => ['sentence' => 'J’achète des pommes de terre', 'correct' => ['j’achète', 'des pommes de terre'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'Compro patatas', 'correct' => ['compro', 'patatas'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Ich kaufe Kartoffeln', 'correct' => ['ich kaufe', 'Kartoffeln'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => 'じゃがいもを買います', 'correct' => ['じゃがいもを', '買います'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '감자를 삽니다', 'correct' => ['감자를', '삽니다'], 'extra' => ['당근']],
                        ],
                    ],
                    'c' => [
                        'words' => ['havuç', 've', 'patates'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Carrot and potato', 'correct' => ['carrot', 'and', 'potato'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'yerkökü və kartof', 'correct' => ['yerkökü', 'və', 'kartof'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'جزر و بطاطا', 'correct' => ['جزر', 'و', 'بطاطا'], 'extra' => ['بصل']],
                            'ru' => ['sentence' => 'морковь и картофель', 'correct' => ['морковь', 'и', 'картофель'], 'extra' => ['лук']],
                            'fr' => ['sentence' => 'Carotte et pomme de terre', 'correct' => ['carotte', 'et', 'pomme de terre'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Zanahoria y patata', 'correct' => ['zanahoria', 'y', 'patata'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Karotte und Kartoffel', 'correct' => ['Karotte', 'und', 'Kartoffel'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'にんじんとじゃがいも', 'correct' => ['にんじん', 'と', 'じゃがいも'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '당근과 감자', 'correct' => ['당근과', '감자'], 'extra' => ['양파']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Cucumber', 3,
                pictures: [['tr' => 'Domates', 'img' => 'tomato'], ['tr' => 'Havuç', 'img' => 'carrot']],
                plain: [['tr' => 'Salatalık'], ['tr' => 'Sebze']],
                phrases: [
                    'a' => [
                        'words' => ['salatalık', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like a cucumber', 'correct' => ['I would like', 'a', 'cucumber'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'istəyirəm bir xiyar', 'correct' => ['istəyirəm', 'bir', 'xiyar'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'أريد خيار', 'correct' => ['أريد', 'خيار'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'я хочу огурец', 'correct' => ['я', 'хочу', 'огурец'], 'extra' => ['помидор']],
                            'fr' => ['sentence' => 'Je voudrais un concombre', 'correct' => ['je voudrais', 'un', 'concombre'], 'extra' => ['tomate']],
                            'es' => ['sentence' => 'Quisiera un pepino', 'correct' => ['quisiera', 'un', 'pepino'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Ich möchte eine Gurke', 'correct' => ['ich möchte', 'eine', 'Gurke'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => 'きゅうりをください', 'correct' => ['きゅうりを', 'ください'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '오이 주세요', 'correct' => ['오이', '주세요'], 'extra' => ['토마토']],
                        ],
                    ],
                    'b' => [
                        'words' => ['taze', 'salatalık'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A fresh cucumber', 'correct' => ['a', 'fresh', 'cucumber'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'bir təzə xiyar', 'correct' => ['bir', 'təzə', 'xiyar'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'طازج خيار', 'correct' => ['طازج', 'خيار'], 'extra' => ['جزر']],
                            'ru' => ['sentence' => 'свежий огурец', 'correct' => ['свежий', 'огурец'], 'extra' => ['морковь']],
                            'fr' => ['sentence' => 'Un concombre frais', 'correct' => ['un', 'concombre', 'frais'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'Un pepino fresco', 'correct' => ['un', 'pepino', 'fresco'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Eine frische Gurke', 'correct' => ['eine', 'frische', 'Gurke'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => '新鮮なきゅうり', 'correct' => ['新鮮な', 'きゅうり'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '신선한 오이', 'correct' => ['신선한', '오이'], 'extra' => ['당근']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sebze', 'nerede'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the vegetable', 'correct' => ['where', 'is', 'the vegetable'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'harada tərəvəz', 'correct' => ['harada', 'tərəvəz'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'أين خضار', 'correct' => ['أين', 'خضار'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'где овощ', 'correct' => ['где', 'овощ'], 'extra' => ['фрукт']],
                            'fr' => ['sentence' => 'Où est le légume', 'correct' => ['où', 'est', 'le légume'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Dónde está la verdura', 'correct' => ['dónde', 'está', 'la verdura'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Wo ist das Gemüse', 'correct' => ['wo', 'ist', 'das Gemüse'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜はどこですか', 'correct' => ['野菜は', 'どこですか'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소는 어디에 있어요', 'correct' => ['채소는', '어디에', '있어요'], 'extra' => ['과일']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Vegetables & Salad', 4,
                pictures: [['tr' => 'Soğan', 'img' => 'onion'], ['tr' => 'Domates', 'img' => 'tomato']],
                plain: [['tr' => 'Sebze'], ['tr' => 'Salatalık']],
                phrases: [
                    'a' => [
                        'words' => ['sebze', 'alıyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am buying vegetables', 'correct' => ['I am buying', 'vegetables'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'alıram tərəvəzlər', 'correct' => ['alıram', 'tərəvəzlər'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'أشتري خضروات', 'correct' => ['أشتري', 'خضروات'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'я покупаю овощи', 'correct' => ['я', 'покупаю', 'овощи'], 'extra' => ['фрукт']],
                            'fr' => ['sentence' => 'J’achète des légumes', 'correct' => ['j’achète', 'des légumes'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Compro verduras', 'correct' => ['compro', 'verduras'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Ich kaufe Gemüse', 'correct' => ['ich kaufe', 'Gemüse'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜を買います', 'correct' => ['野菜を', '買います'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소를 삽니다', 'correct' => ['채소를', '삽니다'], 'extra' => ['과일']],
                        ],
                    ],
                    'b' => [
                        'words' => ['salata', 'için', 'domates'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Tomatoes for the salad', 'correct' => ['tomatoes', 'for', 'the salad'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'pomidorlar üçün salat', 'correct' => ['pomidorlar', 'üçün', 'salat'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'طماطم لأجل سلطة', 'correct' => ['طماطم', 'لأجل', 'سلطة'], 'extra' => ['بصل']],
                            'ru' => ['sentence' => 'помидоры для салат', 'correct' => ['помидоры', 'для', 'салат'], 'extra' => ['лук']],
                            'fr' => ['sentence' => 'Des tomates pour la salade', 'correct' => ['des tomates', 'pour', 'la salade'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Tomates para la ensalada', 'correct' => ['tomates', 'para', 'la ensalada'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Tomaten für den Salat', 'correct' => ['Tomaten', 'für', 'den Salat'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'サラダのためのトマト', 'correct' => ['サラダ', 'のための', 'トマト'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '샐러드를 위한 토마토', 'correct' => ['샐러드를', '위한', '토마토'], 'extra' => ['양파']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sebze', 'taze'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The vegetable is fresh', 'correct' => ['the vegetable', 'is', 'fresh'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'tərəvəz təzə', 'correct' => ['tərəvəz', 'təzə'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'خضار طازج', 'correct' => ['خضار', 'طازج'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'овощ свежий', 'correct' => ['овощ', 'свежий'], 'extra' => ['фрукт']],
                            'fr' => ['sentence' => 'Le légume est frais', 'correct' => ['le légume', 'est', 'frais'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'La verdura está fresca', 'correct' => ['la verdura', 'está', 'fresca'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Das Gemüse ist frisch', 'correct' => ['das Gemüse', 'ist', 'frisch'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '野菜は新鮮です', 'correct' => ['野菜は', '新鮮です'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '채소는 신선해요', 'correct' => ['채소는', '신선해요'], 'extra' => ['과일']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Filling the Basket', 5,
                pictures: [['tr' => 'Havuç', 'img' => 'carrot'], ['tr' => 'Patates', 'img' => 'potato']],
                plain: [['tr' => 'Taze'], ['tr' => 'Sebze']],
                phrases: [
                    'a' => [
                        'words' => ['iki', 'domates', 'alıyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am buying two tomatoes', 'correct' => ['I am buying', 'two', 'tomatoes'], 'extra' => ['onion']],
                            'az' => ['sentence' => 'alıram iki pomidorlar', 'correct' => ['alıram', 'iki', 'pomidorlar'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'أشتري اثنان طماطم', 'correct' => ['أشتري', 'اثنان', 'طماطم'], 'extra' => ['بصل']],
                            'ru' => ['sentence' => 'я покупаю два помидоры', 'correct' => ['я', 'покупаю', 'два', 'помидоры'], 'extra' => ['лук']],
                            'fr' => ['sentence' => 'J’achète deux tomates', 'correct' => ['j’achète', 'deux', 'tomates'], 'extra' => ['oignon']],
                            'es' => ['sentence' => 'Compro dos tomates', 'correct' => ['compro', 'dos', 'tomates'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Ich kaufe zwei Tomaten', 'correct' => ['ich kaufe', 'zwei', 'Tomaten'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => 'トマトを二つ買います', 'correct' => ['トマトを', '二つ', '買います'], 'extra' => ['たまねぎ']],
                            'ko' => ['sentence' => '토마토 두 개를 삽니다', 'correct' => ['토마토', '두', '개를', '삽니다'], 'extra' => ['양파']],
                        ],
                    ],
                    'b' => [
                        'words' => ['soğan', 'reyonda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The onion is in the aisle', 'correct' => ['the onion', 'is', 'in the aisle'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'soğan şöbədə', 'correct' => ['soğan', 'şöbədə'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'بصل في القسم', 'correct' => ['بصل', 'في القسم'], 'extra' => ['جزر']],
                            'ru' => ['sentence' => 'лук в отделе', 'correct' => ['лук', 'в', 'отделе'], 'extra' => ['морковь']],
                            'fr' => ['sentence' => 'L’oignon est au rayon', 'correct' => ['l’oignon', 'est', 'au rayon'], 'extra' => ['carotte']],
                            'es' => ['sentence' => 'La cebolla está en el pasillo', 'correct' => ['la cebolla', 'está', 'en el pasillo'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Die Zwiebel ist im Regal', 'correct' => ['die Zwiebel', 'ist', 'im Regal'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => 'たまねぎは売り場にあります', 'correct' => ['たまねぎは', '売り場に', 'あります'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '양파는 코너에 있어요', 'correct' => ['양파는', '코너에', '있어요'], 'extra' => ['당근']],
                        ],
                    ],
                    'c' => [
                        'words' => ['taze', 'sebze', 'lütfen'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Fresh vegetables please', 'correct' => ['fresh', 'vegetables', 'please'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'təzə tərəvəzlər zəhmət olmasa', 'correct' => ['təzə', 'tərəvəzlər', 'zəhmət olmasa'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'طازج خضروات من فضلك', 'correct' => ['طازج', 'خضروات', 'من فضلك'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'свежий овощи пожалуйста', 'correct' => ['свежий', 'овощи', 'пожалуйста'], 'extra' => ['фрукт']],
                            'fr' => ['sentence' => 'Des légumes frais s’il vous plaît', 'correct' => ['des légumes', 'frais', 's’il vous plaît'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Verduras frescas por favor', 'correct' => ['verduras', 'frescas', 'por favor'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Frisches Gemüse bitte', 'correct' => ['frisches', 'Gemüse', 'bitte'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => '新鮮な野菜をお願いします', 'correct' => ['新鮮な', '野菜を', 'お願いします'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '신선한 채소 부탁합니다', 'correct' => ['신선한', '채소', '부탁합니다'], 'extra' => ['과일']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
