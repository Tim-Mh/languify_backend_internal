<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket03Seeder extends Seeder
{
    private const PICTURES = [
        'Carrot' => 'carrot', 'Tomato' => 'tomato', 'Potato' => 'potato', 'Onion' => 'onion',
        'Aisle' => 'shelf', 'Basket' => 'basket', 'Salad' => 'salad', 'Apple' => 'apple',
    ];

    /**
     * English Chapter 4, Unit 3 — vegetables.
     *
     * Lesson 3 reuses in front / behind from Chapter 2 (an aisle is the most
     * natural place a beginner needs them), and Lesson 4 does the same for
     * enough / too much, which only click once you are deciding how much to buy.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Vegetables', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Carrot and Tomato', 1,
                pictures: [['en' => 'Carrot', 'img' => 'carrot'], ['en' => 'Tomato', 'img' => 'tomato']],
                plain: [['en' => 'Vegetables'], ['en' => 'Eat']],
                phrases: [
                    'a' => [
                        'words' => ['eat', 'some', 'vegetables'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Comer verduras', 'correct' => ['comer', 'algo de', 'verduras'], 'extra' => ['zanahoria', 'tomate']],
                            'de' => ['sentence' => 'Gemüse essen', 'correct' => ['essen', 'etwas', 'Gemüse'], 'extra' => ['Karotte', 'Tomate']],
                            'ja' => ['sentence' => '野菜を食べる', 'correct' => ['野菜', 'を', '食べる'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '채소를 먹다', 'correct' => ['채소를', '먹다'], 'extra' => ['당근']],
                            'fr' => ['sentence' => 'Manger des légumes', 'correct' => ['manger', 'du', 'légumes'], 'extra' => ['carotte', 'tomate']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'carrot', 'and', 'a', 'tomato'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una zanahoria y un tomate', 'correct' => ['una', 'zanahoria', 'y', 'un', 'tomate'], 'extra' => ['verduras']],
                            'de' => ['sentence' => 'Eine Karotte und eine Tomate', 'correct' => ['eine', 'Karotte', 'und', 'eine', 'Tomate'], 'extra' => ['Gemüse']],
                            'ja' => ['sentence' => 'にんじんとトマト', 'correct' => ['にんじん', 'と', 'トマト'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '당근과 토마토', 'correct' => ['당근과', '토마토'], 'extra' => ['채소']],
                            'fr' => ['sentence' => 'Une carotte et une tomate', 'correct' => ['une', 'carotte', 'et', 'une', 'tomate'], 'extra' => ['légumes']],
                        ],
                    ],
                    'c' => [
                        'words' => ['eat', 'a', 'tomato'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Comer un tomate', 'correct' => ['comer', 'un', 'tomate'], 'extra' => ['verduras', 'zanahoria']],
                            'de' => ['sentence' => 'Eine Tomate essen', 'correct' => ['eine', 'Tomate', 'essen'], 'extra' => ['Gemüse', 'Karotte']],
                            'ja' => ['sentence' => 'トマトを食べる', 'correct' => ['トマト', 'を', '食べる'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '토마토를 먹다', 'correct' => ['토마토를', '먹다'], 'extra' => ['채소']],
                            'fr' => ['sentence' => 'Manger une tomate', 'correct' => ['manger', 'une', 'tomate'], 'extra' => ['légumes']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Potato and Onion', 2,
                pictures: [['en' => 'Potato', 'img' => 'potato'], ['en' => 'Onion', 'img' => 'onion']],
                plain: [['en' => 'To weigh'], ['en' => 'Scales']],
                phrases: [
                    'a' => [
                        'words' => ['to weigh', 'an', 'onion'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Pesar una cebolla', 'correct' => ['pesar', 'una', 'cebolla'], 'extra' => ['balanza', 'patata']],
                            'de' => ['sentence' => 'Eine Zwiebel wiegen', 'correct' => ['eine', 'Zwiebel', 'wiegen'], 'extra' => ['Waage', 'Kartoffel']],
                            'ja' => ['sentence' => '玉ねぎを量る', 'correct' => ['玉ねぎ', 'を', '量る'], 'extra' => ['はかり']],
                            'ko' => ['sentence' => '양파의 무게를 재다', 'correct' => ['양파의', '무게를', '재다'], 'extra' => ['저울']],
                            'fr' => ['sentence' => 'Peser un oignon', 'correct' => ['peser', 'un', 'oignon'], 'extra' => ['balance', 'pomme de terre']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'scales', 'are', 'here'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La balanza está aquí', 'correct' => ['la', 'balanza', 'son', 'aquí'], 'extra' => ['pesar', 'cebolla']],
                            'de' => ['sentence' => 'Die Waage ist hier', 'correct' => ['die', 'Waage', 'sind', 'hier'], 'extra' => ['wiegen', 'Zwiebel']],
                            'ja' => ['sentence' => 'はかりはここです', 'correct' => ['はかり', 'は', 'ここ', 'です'], 'extra' => ['量る']],
                            'ko' => ['sentence' => '저울은 여기 있습니다', 'correct' => ['저울은', '여기', '있습니다'], 'extra' => ['무게를 재다']],
                            'fr' => ['sentence' => 'La balance est ici', 'correct' => ['la', 'balance', 'est', 'ici'], 'extra' => ['peser']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to weigh', 'a', 'potato'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Pesar una patata', 'correct' => ['pesar', 'una', 'patata'], 'extra' => ['balanza', 'cebolla']],
                            'de' => ['sentence' => 'Eine Kartoffel wiegen', 'correct' => ['eine', 'Kartoffel', 'wiegen'], 'extra' => ['Waage', 'Zwiebel']],
                            'ja' => ['sentence' => 'じゃがいもを量る', 'correct' => ['じゃがいも', 'を', '量る'], 'extra' => ['はかり']],
                            'ko' => ['sentence' => '감자의 무게를 재다', 'correct' => ['감자의', '무게를', '재다'], 'extra' => ['저울']],
                            'fr' => ['sentence' => 'Peser une pomme de terre', 'correct' => ['peser', 'une', 'pomme de terre'], 'extra' => ['balance']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: In Front or Behind', 3,
                pictures: [['en' => 'Onion', 'img' => 'onion'], ['en' => 'Aisle', 'img' => 'shelf']],
                plain: [['en' => 'In front'], ['en' => 'Behind']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'aisle', 'is', 'in front'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pasillo está delante', 'correct' => ['el', 'pasillo', 'está', 'delante'], 'extra' => ['detrás', 'cebolla']],
                            'de' => ['sentence' => 'Das Regal ist vorne', 'correct' => ['das', 'Regal', 'ist', 'vorne'], 'extra' => ['hinten', 'Zwiebel']],
                            'ja' => ['sentence' => '売り場は前にあります', 'correct' => ['売り場', 'は', '前に', 'あります'], 'extra' => ['後ろに']],
                            'ko' => ['sentence' => '진열대는 앞에 있습니다', 'correct' => ['진열대는', '앞에', '있습니다'], 'extra' => ['뒤에']],
                            'fr' => ['sentence' => 'Le rayon est devant', 'correct' => ['le', 'rayon', 'est', 'devant'], 'extra' => ['derrière', 'oignon']],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'onion', 'behind', 'the', 'aisle'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Una cebolla detrás del pasillo', 'correct' => ['una', 'cebolla', 'detrás', 'el', 'pasillo'], 'extra' => ['delante']],
                            'de' => ['sentence' => 'Eine Zwiebel hinter dem Regal', 'correct' => ['eine', 'Zwiebel', 'hinten', 'dem', 'Regal'], 'extra' => ['vorne']],
                            'ja' => ['sentence' => '売り場の後ろの玉ねぎ', 'correct' => ['売り場', 'の', '後ろ', 'の', '玉ねぎ'], 'extra' => ['前に']],
                            'ko' => ['sentence' => '진열대 뒤의 양파', 'correct' => ['진열대', '뒤의', '양파'], 'extra' => ['앞에']],
                            'fr' => ['sentence' => 'Un oignon derrière le rayon', 'correct' => ['un', 'oignon', 'derrière', 'le', 'rayon'], 'extra' => ['devant']],
                        ],
                    ],
                    'c' => [
                        'words' => ['in front', 'or', 'behind'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Delante o detrás', 'correct' => ['delante', 'o', 'detrás'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Vorne oder hinten', 'correct' => ['vorne', 'oder', 'hinten'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => '前か後ろ', 'correct' => ['前', 'か', '後ろ'], 'extra' => ['玉ねぎ']],
                            'ko' => ['sentence' => '앞에 또는 뒤에', 'correct' => ['앞에', '또는', '뒤에'], 'extra' => ['양파']],
                            'fr' => ['sentence' => 'Devant ou derrière', 'correct' => ['devant', 'ou', 'derrière'], 'extra' => ['oignon']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Enough or Too Much', 4,
                pictures: [['en' => 'Tomato', 'img' => 'tomato'], ['en' => 'Carrot', 'img' => 'carrot']],
                plain: [['en' => 'Enough'], ['en' => 'Too much']],
                phrases: [
                    'a' => [
                        'words' => ['enough', 'vegetables'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Bastantes verduras', 'correct' => ['bastante', 'verduras'], 'extra' => ['demasiado', 'zanahoria']],
                            'de' => ['sentence' => 'Genug Gemüse', 'correct' => ['genug', 'Gemüse'], 'extra' => ['zu viel', 'Karotte']],
                            'ja' => ['sentence' => '十分な野菜', 'correct' => ['十分な', '野菜'], 'extra' => ['すぎます']],
                            'ko' => ['sentence' => '충분한 채소', 'correct' => ['충분한', '채소'], 'extra' => ['너무']],
                            'fr' => ['sentence' => 'Assez de légumes', 'correct' => ['assez', 'légumes'], 'extra' => ['trop', 'carotte']],
                        ],
                    ],
                    'b' => [
                        'words' => ['too much', 'tomato'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Demasiado tomate', 'correct' => ['demasiado', 'tomate'], 'extra' => ['bastante', 'zanahoria']],
                            'de' => ['sentence' => 'Zu viel Tomate', 'correct' => ['zu viel', 'Tomate'], 'extra' => ['genug', 'Karotte']],
                            'ja' => ['sentence' => 'トマトが多すぎる', 'correct' => ['トマト', 'が', '多すぎる'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '너무 많은 토마토', 'correct' => ['너무', '많은', '토마토'], 'extra' => ['충분히']],
                            'fr' => ['sentence' => 'Trop de tomate', 'correct' => ['trop', 'tomate'], 'extra' => ['assez']],
                        ],
                    ],
                    'c' => [
                        'words' => ['enough', 'carrot', 'and', 'too much', 'tomato'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Bastante zanahoria y demasiado tomate', 'correct' => ['bastante', 'zanahoria', 'y', 'demasiado', 'tomate'], 'extra' => ['verduras']],
                            'de' => ['sentence' => 'Genug Karotte und zu viel Tomate', 'correct' => ['genug', 'Karotte', 'und', 'zu viel', 'Tomate'], 'extra' => ['Gemüse']],
                            'ja' => ['sentence' => '十分なにんじんと多すぎるトマト', 'correct' => ['十分な', 'にんじん', 'と', '多すぎる', 'トマト'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '충분한 당근과 너무 많은 토마토', 'correct' => ['충분한', '당근과', '너무', '많은', '토마토'], 'extra' => ['채소']],
                            'fr' => ['sentence' => 'Assez de carotte et trop de tomate', 'correct' => ['assez', 'carotte', 'et', 'trop', 'tomate'], 'extra' => ['légumes']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Cheap Today', 5,
                pictures: [['en' => 'Onion', 'img' => 'onion'], ['en' => 'Potato', 'img' => 'potato']],
                plain: [['en' => 'Cheap'], ['en' => 'Now']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'cheap', 'onion'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una cebolla barata', 'correct' => ['una', 'barato', 'cebolla'], 'extra' => ['ahora', 'patata']],
                            'de' => ['sentence' => 'Eine billige Zwiebel', 'correct' => ['eine', 'billig', 'Zwiebel'], 'extra' => ['jetzt', 'Kartoffel']],
                            'ja' => ['sentence' => '安い玉ねぎ', 'correct' => ['安い', '玉ねぎ'], 'extra' => ['今']],
                            'ko' => ['sentence' => '싼 양파', 'correct' => ['싼', '양파'], 'extra' => ['지금']],
                            'fr' => ['sentence' => 'Un oignon bon marché', 'correct' => ['un', 'oignon', 'bon marché'], 'extra' => ['maintenant', 'pomme de terre']],
                        ],
                    ],
                    'b' => [
                        'words' => ['buy', 'now'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Comprar ahora', 'correct' => ['comprar', 'ahora'], 'extra' => ['barato', 'cebolla']],
                            'de' => ['sentence' => 'Jetzt kaufen', 'correct' => ['jetzt', 'kaufen'], 'extra' => ['billig', 'Zwiebel']],
                            'ja' => ['sentence' => '今買う', 'correct' => ['今', '買う'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '지금 사다', 'correct' => ['지금', '사다'], 'extra' => ['싼']],
                            'fr' => ['sentence' => 'Acheter maintenant', 'correct' => ['acheter', 'maintenant'], 'extra' => ['bon marché']],
                        ],
                    ],
                    'c' => [
                        'words' => ['buy', 'a', 'potato', 'now'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Comprar una patata ahora', 'correct' => ['comprar', 'una', 'patata', 'ahora'], 'extra' => ['barato', 'cebolla']],
                            'de' => ['sentence' => 'Jetzt eine Kartoffel kaufen', 'correct' => ['jetzt', 'eine', 'Kartoffel', 'kaufen'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '今じゃがいもを買う', 'correct' => ['今', 'じゃがいも', 'を', '買う'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '지금 감자를 사다', 'correct' => ['지금', '감자를', '사다'], 'extra' => ['싼']],
                            'fr' => ['sentence' => 'Acheter une pomme de terre maintenant', 'correct' => ['acheter', 'une', 'pomme de terre', 'maintenant'], 'extra' => ['bon marché']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
