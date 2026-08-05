<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket03Seeder extends Seeder
{
    private const PICTURES = [
        'Carotte' => 'carrot', 'Tomate' => 'tomato', 'Pomme de terre' => 'potato',
        'Oignon' => 'onion', 'Rayon' => 'shelf', 'Panier' => 'basket',
        'Salade' => 'salad', 'Pomme' => 'apple',
    ];

    /**
     * French Chapter 4, Unit 3 — vegetables.
     *
     * Lesson 3 reuses the position words from Chapter 2 (devant, derrière)
     * because an aisle is the most natural place a beginner will ever need
     * them, and Lesson 4 does the same for assez and trop, which only really
     * click once you are deciding how much of something to buy.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Vegetables', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Carrot and Tomato', 1,
                pictures: [['fr' => 'Carotte', 'img' => 'carrot'], ['fr' => 'Tomate', 'img' => 'tomato']],
                plain: [['fr' => 'Légumes'], ['fr' => 'Manger']],
                phrases: [
                    'a' => [
                        'words' => ['manger', 'des', 'légumes'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To eat some vegetables', 'correct' => ['to eat', 'some', 'vegetables'], 'extra' => ['carrot', 'tomato']],
                            'es' => ['sentence' => 'Comer verduras', 'correct' => ['comer', 'unas', 'verduras'], 'extra' => ['zanahoria', 'tomate']],
                            'de' => ['sentence' => 'Gemüse essen', 'correct' => ['essen', 'einige', 'Gemüse'], 'extra' => ['Karotte', 'Tomate']],
                            'ja' => ['sentence' => '野菜を食べる', 'correct' => ['野菜', 'を', '食べる'], 'extra' => ['にんじん', 'トマト']],
                            'ko' => ['sentence' => '채소를 먹다', 'correct' => ['채소를', '먹다'], 'extra' => ['당근', '토마토']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'carotte', 'et', 'une', 'tomate'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A carrot and a tomato', 'correct' => ['a', 'carrot', 'and', 'a', 'tomato'], 'extra' => ['vegetables', 'to eat']],
                            'es' => ['sentence' => 'Una zanahoria y un tomate', 'correct' => ['una', 'zanahoria', 'y', 'un', 'tomate'], 'extra' => ['verduras', 'comer']],
                            'de' => ['sentence' => 'Eine Karotte und eine Tomate', 'correct' => ['eine', 'Karotte', 'und', 'eine', 'Tomate'], 'extra' => ['Gemüse', 'essen']],
                            'ja' => ['sentence' => 'にんじんとトマト', 'correct' => ['にんじん', 'と', 'トマト'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '당근과 토마토', 'correct' => ['당근과', '토마토'], 'extra' => ['채소']],
                        ],
                    ],
                    'c' => [
                        'words' => ['manger', 'une', 'tomate'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To eat a tomato', 'correct' => ['to eat', 'a', 'tomato'], 'extra' => ['vegetables', 'carrot']],
                            'es' => ['sentence' => 'Comer un tomate', 'correct' => ['comer', 'un', 'tomate'], 'extra' => ['verduras', 'zanahoria']],
                            'de' => ['sentence' => 'Eine Tomate essen', 'correct' => ['eine', 'Tomate', 'essen'], 'extra' => ['Gemüse', 'Karotte']],
                            'ja' => ['sentence' => 'トマトを食べる', 'correct' => ['トマト', 'を', '食べる'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '토마토를 먹다', 'correct' => ['토마토를', '먹다'], 'extra' => ['채소']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Potato and Onion', 2,
                pictures: [['fr' => 'Pomme de terre', 'img' => 'potato'], ['fr' => 'Oignon', 'img' => 'onion']],
                plain: [['fr' => 'Peser'], ['fr' => 'Balance']],
                phrases: [
                    'a' => [
                        'words' => ['peser', 'un', 'oignon'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To weigh an onion', 'correct' => ['to weigh', 'an', 'onion'], 'extra' => ['scales', 'potato']],
                            'es' => ['sentence' => 'Pesar una cebolla', 'correct' => ['pesar', 'una', 'cebolla'], 'extra' => ['balanza', 'patata']],
                            'de' => ['sentence' => 'Eine Zwiebel wiegen', 'correct' => ['eine', 'Zwiebel', 'wiegen'], 'extra' => ['Waage', 'Kartoffel']],
                            'ja' => ['sentence' => '玉ねぎを量る', 'correct' => ['玉ねぎ', 'を', '量る'], 'extra' => ['はかり']],
                            'ko' => ['sentence' => '양파의 무게를 재다', 'correct' => ['양파의', '무게를', '재다'], 'extra' => ['저울']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'balance', 'est', 'ici'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The scales are here', 'correct' => ['the', 'scales', 'is', 'here'], 'extra' => ['to weigh', 'onion']],
                            'es' => ['sentence' => 'La balanza está aquí', 'correct' => ['la', 'balanza', 'está', 'aquí'], 'extra' => ['pesar', 'cebolla']],
                            'de' => ['sentence' => 'Die Waage ist hier', 'correct' => ['die', 'Waage', 'ist', 'hier'], 'extra' => ['wiegen', 'Zwiebel']],
                            'ja' => ['sentence' => 'はかりはここです', 'correct' => ['はかり', 'は', 'ここ', 'です'], 'extra' => ['量る']],
                            'ko' => ['sentence' => '저울은 여기 있습니다', 'correct' => ['저울은', '여기', '있습니다'], 'extra' => ['무게를 재다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['peser', 'une', 'pomme de terre'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To weigh a potato', 'correct' => ['to weigh', 'a', 'potato'], 'extra' => ['scales', 'onion']],
                            'es' => ['sentence' => 'Pesar una patata', 'correct' => ['pesar', 'una', 'patata'], 'extra' => ['balanza', 'cebolla']],
                            'de' => ['sentence' => 'Eine Kartoffel wiegen', 'correct' => ['eine', 'Kartoffel', 'wiegen'], 'extra' => ['Waage', 'Zwiebel']],
                            'ja' => ['sentence' => 'じゃがいもを量る', 'correct' => ['じゃがいも', 'を', '量る'], 'extra' => ['はかり']],
                            'ko' => ['sentence' => '감자의 무게를 재다', 'correct' => ['감자의', '무게를', '재다'], 'extra' => ['저울']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: In Front or Behind', 3,
                pictures: [['fr' => 'Oignon', 'img' => 'onion'], ['fr' => 'Rayon', 'img' => 'shelf']],
                plain: [['fr' => 'Devant'], ['fr' => 'Derrière']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'rayon', 'est', 'devant'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The aisle is in front', 'correct' => ['the', 'aisle', 'is', 'in front'], 'extra' => ['behind', 'onion']],
                            'es' => ['sentence' => 'El pasillo está delante', 'correct' => ['el', 'pasillo', 'está', 'delante'], 'extra' => ['detrás', 'cebolla']],
                            'de' => ['sentence' => 'Das Regal ist vorne', 'correct' => ['das', 'Regal', 'ist', 'vor'], 'extra' => ['hinter', 'Zwiebel']],
                            'ja' => ['sentence' => '売り場は前にあります', 'correct' => ['売り場', 'は', '前に', 'あります'], 'extra' => ['の後ろに']],
                            'ko' => ['sentence' => '진열대는 앞에 있습니다', 'correct' => ['진열대는', '앞에', '있습니다'], 'extra' => ['뒤에']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'oignon', 'derrière', 'le', 'rayon'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'An onion behind the aisle', 'correct' => ['an', 'onion', 'behind', 'the', 'aisle'], 'extra' => ['in front']],
                            'es' => ['sentence' => 'Una cebolla detrás del pasillo', 'correct' => ['una', 'cebolla', 'detrás', 'el', 'pasillo'], 'extra' => ['delante']],
                            'de' => ['sentence' => 'Eine Zwiebel hinter dem Regal', 'correct' => ['eine', 'Zwiebel', 'hinter', 'dem', 'Regal'], 'extra' => ['vor']],
                            'ja' => ['sentence' => '売り場の後ろの玉ねぎ', 'correct' => ['売り場', 'の', '後ろ', 'の', '玉ねぎ'], 'extra' => ['の前に']],
                            'ko' => ['sentence' => '진열대 뒤의 양파', 'correct' => ['진열대', '뒤의', '양파'], 'extra' => ['앞에']],
                        ],
                    ],
                    'c' => [
                        'words' => ['devant', 'ou', 'derrière', 'le', 'rayon'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'In front of or behind the aisle', 'correct' => ['in front', 'or', 'behind', 'the', 'aisle'], 'extra' => ['onion']],
                            'es' => ['sentence' => 'Delante o detrás del pasillo', 'correct' => ['delante', 'o', 'detrás', 'el', 'pasillo'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Vor oder hinter dem Regal', 'correct' => ['vor', 'oder', 'hinter', 'dem', 'Regal'], 'extra' => ['Zwiebel']],
                            'ja' => ['sentence' => '売り場の前か後ろ', 'correct' => ['売り場', 'の', '前', 'か', '後ろ'], 'extra' => ['玉ねぎ']],
                            'ko' => ['sentence' => '진열대 앞 또는 뒤', 'correct' => ['진열대', '앞', '또는', '뒤'], 'extra' => ['양파']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Enough or Too Much', 4,
                pictures: [['fr' => 'Tomate', 'img' => 'tomato'], ['fr' => 'Carotte', 'img' => 'carrot']],
                plain: [['fr' => 'Assez'], ['fr' => 'Trop']],
                phrases: [
                    'a' => [
                        'words' => ['assez', 'de', 'légumes'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Enough vegetables', 'correct' => ['enough', 'of', 'vegetables'], 'extra' => ['too much', 'carrot']],
                            'es' => ['sentence' => 'Bastantes verduras', 'correct' => ['bastante', 'de', 'verduras'], 'extra' => ['demasiado', 'zanahoria']],
                            'de' => ['sentence' => 'Genug Gemüse', 'correct' => ['genug', 'von', 'Gemüse'], 'extra' => ['zu viel', 'Karotte']],
                            'ja' => ['sentence' => '十分な野菜', 'correct' => ['十分な', '野菜'], 'extra' => ['すぎます']],
                            'ko' => ['sentence' => '충분한 채소', 'correct' => ['충분한', '채소'], 'extra' => ['너무']],
                        ],
                    ],
                    'b' => [
                        'words' => ['trop', 'de', 'tomate'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Too much tomato', 'correct' => ['too much', 'of', 'tomato'], 'extra' => ['enough', 'carrot']],
                            'es' => ['sentence' => 'Demasiado tomate', 'correct' => ['demasiado', 'de', 'tomate'], 'extra' => ['bastante', 'zanahoria']],
                            'de' => ['sentence' => 'Zu viel Tomate', 'correct' => ['zu viel', 'von', 'Tomate'], 'extra' => ['genug', 'Karotte']],
                            'ja' => ['sentence' => 'トマトが多すぎる', 'correct' => ['トマト', 'が', '多すぎる'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '너무 많은 토마토', 'correct' => ['너무', '많은', '토마토'], 'extra' => ['충분히']],
                        ],
                    ],
                    'c' => [
                        'words' => ['assez', 'de', 'carotte', 'et', 'trop', 'de', 'tomate'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Enough carrot and too much tomato', 'correct' => ['enough', 'of', 'carrot', 'and', 'too much', 'of', 'tomato'], 'extra' => ['vegetables']],
                            'es' => ['sentence' => 'Bastante zanahoria y demasiado tomate', 'correct' => ['bastante', 'de', 'zanahoria', 'y', 'demasiado', 'de', 'tomate'], 'extra' => ['verduras']],
                            'de' => ['sentence' => 'Genug Karotte und zu viel Tomate', 'correct' => ['genug', 'von', 'Karotte', 'und', 'zu viel', 'von', 'Tomate'], 'extra' => ['Gemüse']],
                            'ja' => ['sentence' => '十分なにんじんと多すぎるトマト', 'correct' => ['十分な', 'にんじん', 'と', '多すぎる', 'トマト'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '충분한 당근과 너무 많은 토마토', 'correct' => ['충분한', '당근과', '너무', '많은', '토마토'], 'extra' => ['채소']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Free Today', 5,
                pictures: [['fr' => 'Oignon', 'img' => 'onion'], ['fr' => 'Pomme de terre', 'img' => 'potato']],
                plain: [['fr' => 'Gratuit'], ['fr' => 'Maintenant']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'oignon', 'gratuit'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A free onion', 'correct' => ['a', 'free', 'onion'], 'extra' => ['now', 'potato']],
                            'es' => ['sentence' => 'Una cebolla gratis', 'correct' => ['una', 'cebolla', 'gratis'], 'extra' => ['ahora', 'patata']],
                            'de' => ['sentence' => 'Eine kostenlose Zwiebel', 'correct' => ['eine', 'kostenlos', 'Zwiebel'], 'extra' => ['jetzt', 'Kartoffel']],
                            'ja' => ['sentence' => '無料の玉ねぎ', 'correct' => ['無料', 'の', '玉ねぎ'], 'extra' => ['今']],
                            'ko' => ['sentence' => '무료 양파', 'correct' => ['무료', '양파'], 'extra' => ['지금']],
                        ],
                    ],
                    'b' => [
                        'words' => ['acheter', 'maintenant'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To buy now', 'correct' => ['to buy', 'now'], 'extra' => ['free', 'onion']],
                            'es' => ['sentence' => 'Comprar ahora', 'correct' => ['comprar', 'ahora'], 'extra' => ['gratis', 'cebolla']],
                            'de' => ['sentence' => 'Jetzt kaufen', 'correct' => ['jetzt', 'kaufen'], 'extra' => ['kostenlos', 'Zwiebel']],
                            'ja' => ['sentence' => '今買う', 'correct' => ['今', '買う'], 'extra' => ['無料']],
                            'ko' => ['sentence' => '지금 사다', 'correct' => ['지금', '사다'], 'extra' => ['무료']],
                        ],
                    ],
                    'c' => [
                        'words' => ['acheter', 'une', 'pomme de terre', 'maintenant'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To buy a potato now', 'correct' => ['to buy', 'a', 'potato', 'now'], 'extra' => ['free', 'onion']],
                            'es' => ['sentence' => 'Comprar una patata ahora', 'correct' => ['comprar', 'una', 'patata', 'ahora'], 'extra' => ['gratis', 'cebolla']],
                            'de' => ['sentence' => 'Jetzt eine Kartoffel kaufen', 'correct' => ['jetzt', 'eine', 'Kartoffel', 'kaufen'], 'extra' => ['kostenlos', 'Zwiebel']],
                            'ja' => ['sentence' => '今じゃがいもを買う', 'correct' => ['今', 'じゃがいも', 'を', '買う'], 'extra' => ['無料']],
                            'ko' => ['sentence' => '지금 감자를 사다', 'correct' => ['지금', '감자를', '사다'], 'extra' => ['무료']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
