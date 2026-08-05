<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket03Seeder extends Seeder
{
    private const PICTURES = ['당근' => 'carrot', '토마토' => 'tomato', '감자' => 'potato', '양파' => 'onion', '진열대' => 'shelf'];

    /**
     * Korean Supermarket, Unit 3, the Korean twin of the English "Vegetables" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, '유닛 3: 채소', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 당근 · 토마토', 1,
                pictures: [['ko' => '당근', 'img' => 'carrot'], ['ko' => '토마토', 'img' => 'tomato']],
                plain: [['ko' => '채소'], ['ko' => '먹다']],
                phrases: [
                    'a' => [
                        'words' => ['채소를', '드세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'eat some vegetables', 'correct' => ['eat', 'some', 'vegetables'], 'extra' => ['carrot']],
                            'es' => ['sentence' => 'Comer verduras', 'correct' => ['comer', 'algo de', 'verduras'], 'extra' => ['zanahoria', 'tomate']],
                            'de' => ['sentence' => 'Gemüse essen', 'correct' => ['essen', 'etwas', 'Gemüse'], 'extra' => ['Karotte', 'Tomate']],
                            'fr' => ['sentence' => 'Manger des légumes', 'correct' => ['manger', 'du', 'légumes'], 'extra' => ['carotte', 'tomate']],
                            'ja' => ['sentence' => '野菜を食べる', 'correct' => ['野菜', 'を', '食べる'], 'extra' => ['にんじん']],
                        ],
                    ],
                    'b' => [
                        'words' => ['당근과', '토마토'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a carrot and a tomato', 'correct' => ['a', 'carrot', 'and', 'a', 'tomato'], 'extra' => ['vegetables']],
                            'es' => ['sentence' => 'Una zanahoria y un tomate', 'correct' => ['una', 'zanahoria', 'y', 'un', 'tomate'], 'extra' => ['verduras']],
                            'de' => ['sentence' => 'Eine Karotte und eine Tomate', 'correct' => ['eine', 'Karotte', 'und', 'eine', 'Tomate'], 'extra' => ['Gemüse']],
                            'fr' => ['sentence' => 'Une carotte et une tomate', 'correct' => ['une', 'carotte', 'et', 'une', 'tomate'], 'extra' => ['légumes']],
                            'ja' => ['sentence' => 'にんじんとトマト', 'correct' => ['にんじん', 'と', 'トマト'], 'extra' => ['野菜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['토마토를', '드세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'eat a tomato', 'correct' => ['eat', 'a', 'tomato'], 'extra' => ['vegetables']],
                            'es' => ['sentence' => 'Comer un tomate', 'correct' => ['comer', 'un', 'tomate'], 'extra' => ['verduras', 'zanahoria']],
                            'de' => ['sentence' => 'Eine Tomate essen', 'correct' => ['eine', 'Tomate', 'essen'], 'extra' => ['Gemüse', 'Karotte']],
                            'fr' => ['sentence' => 'Manger une tomate', 'correct' => ['manger', 'une', 'tomate'], 'extra' => ['légumes']],
                            'ja' => ['sentence' => 'トマトを食べる', 'correct' => ['トマト', 'を', '食べる'], 'extra' => ['野菜']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 감자 · 양파', 2,
                pictures: [['ko' => '감자', 'img' => 'potato'], ['ko' => '양파', 'img' => 'onion']],
                plain: [['ko' => '무게를 재다'], ['ko' => '저울']],
                phrases: [
                    'a' => [
                        'words' => ['양파의', '무게를', '재세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to weigh an onion', 'correct' => ['to weigh', 'an', 'onion'], 'extra' => ['scales']],
                            'es' => ['sentence' => 'Pesar una cebolla', 'correct' => ['pesar', 'una', 'cebolla'], 'extra' => ['balanza', 'patata']],
                            'de' => ['sentence' => 'Eine Zwiebel wiegen', 'correct' => ['eine', 'Zwiebel', 'wiegen'], 'extra' => ['Waage', 'Kartoffel']],
                            'fr' => ['sentence' => 'Peser un oignon', 'correct' => ['peser', 'un', 'oignon'], 'extra' => ['balance', 'pomme de terre']],
                            'ja' => ['sentence' => '玉ねぎを量る', 'correct' => ['玉ねぎ', 'を', '量る'], 'extra' => ['はかり']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저울은', '여기', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the scales are here', 'correct' => ['the', 'scales', 'are', 'here'], 'extra' => ['to weigh']],
                            'es' => ['sentence' => 'La balanza está aquí', 'correct' => ['la', 'balanza', 'son', 'aquí'], 'extra' => ['pesar', 'cebolla']],
                            'de' => ['sentence' => 'Die Waage ist hier', 'correct' => ['die', 'Waage', 'sind', 'hier'], 'extra' => ['wiegen', 'Zwiebel']],
                            'fr' => ['sentence' => 'La balance est ici', 'correct' => ['la', 'balance', 'est', 'ici'], 'extra' => ['peser']],
                            'ja' => ['sentence' => 'はかりはここです', 'correct' => ['はかり', 'は', 'ここ', 'です'], 'extra' => ['量る']],
                        ],
                    ],
                    'c' => [
                        'words' => ['감자의', '무게를', '재세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to weigh a potato', 'correct' => ['to weigh', 'a', 'potato'], 'extra' => ['scales']],
                            'es' => ['sentence' => 'Pesar una patata', 'correct' => ['pesar', 'una', 'patata'], 'extra' => ['balanza', 'cebolla']],
                            'de' => ['sentence' => 'Eine Kartoffel wiegen', 'correct' => ['eine', 'Kartoffel', 'wiegen'], 'extra' => ['Waage', 'Zwiebel']],
                            'fr' => ['sentence' => 'Peser une pomme de terre', 'correct' => ['peser', 'une', 'pomme de terre'], 'extra' => ['balance']],
                            'ja' => ['sentence' => 'じゃがいもを量る', 'correct' => ['じゃがいも', 'を', '量る'], 'extra' => ['はかり']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 양파 · 진열대', 3,
                pictures: [['ko' => '양파', 'img' => 'onion'], ['ko' => '진열대', 'img' => 'shelf']],
                plain: [['ko' => '앞에'], ['ko' => '뒤에']],
                phrases: [
                    'a' => [
                        'words' => ['진열대는', '앞에', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the aisle is in front', 'correct' => ['the', 'aisle', 'is', 'in front'], 'extra' => ['behind']],
                            'es' => ['sentence' => 'El pasillo está delante', 'correct' => ['el', 'pasillo', 'está', 'delante'], 'extra' => ['detrás', 'cebolla']],
                            'de' => ['sentence' => 'Das Regal ist vorne', 'correct' => ['das', 'Regal', 'ist', 'vorne'], 'extra' => ['hinten', 'Zwiebel']],
                            'fr' => ['sentence' => 'Le rayon est devant', 'correct' => ['le', 'rayon', 'est', 'devant'], 'extra' => ['derrière', 'oignon']],
                            'ja' => ['sentence' => '売り場は前にあります', 'correct' => ['売り場', 'は', '前に', 'あります'], 'extra' => ['後ろに']],
                        ],
                    ],
                    'b' => [
                        'words' => ['진열대', '뒤의', '양파'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'an onion behind the aisle', 'correct' => ['an', 'onion', 'behind', 'the', 'aisle'], 'extra' => ['in front']],
                            'es' => ['sentence' => 'Una cebolla detrás del pasillo', 'correct' => ['una', 'cebolla', 'detrás', 'el', 'pasillo'], 'extra' => ['delante']],
                            'de' => ['sentence' => 'Eine Zwiebel hinter dem Regal', 'correct' => ['eine', 'Zwiebel', 'hinten', 'dem', 'Regal'], 'extra' => ['vorne']],
                            'fr' => ['sentence' => 'Un oignon derrière le rayon', 'correct' => ['un', 'oignon', 'derrière', 'le', 'rayon'], 'extra' => ['devant']],
                            'ja' => ['sentence' => '売り場の後ろの玉ねぎ', 'correct' => ['売り場', 'の', '後ろ', 'の', '玉ねぎ'], 'extra' => ['前に']],
                        ],
                    ],
                    'c' => [
                        'words' => ['앞에', '또는', '뒤에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'in front or behind', 'correct' => ['in front', 'or', 'behind'], 'extra' => ['onion']],
                            'es' => ['sentence' => 'Delante o detrás', 'correct' => ['delante', 'o', 'detrás'], 'extra' => ['cebolla']],
                            'de' => ['sentence' => 'Vorne oder hinten', 'correct' => ['vorne', 'oder', 'hinten'], 'extra' => ['Zwiebel']],
                            'fr' => ['sentence' => 'Devant ou derrière', 'correct' => ['devant', 'ou', 'derrière'], 'extra' => ['oignon']],
                            'ja' => ['sentence' => '前か後ろ', 'correct' => ['前', 'か', '後ろ'], 'extra' => ['玉ねぎ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 토마토 · 당근', 4,
                pictures: [['ko' => '토마토', 'img' => 'tomato'], ['ko' => '당근', 'img' => 'carrot']],
                plain: [['ko' => '충분히'], ['ko' => '너무']],
                phrases: [
                    'a' => [
                        'words' => ['충분한', '채소'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'enough vegetables', 'correct' => ['enough', 'vegetables'], 'extra' => ['too much']],
                            'es' => ['sentence' => 'Bastantes verduras', 'correct' => ['bastante', 'verduras'], 'extra' => ['demasiado', 'zanahoria']],
                            'de' => ['sentence' => 'Genug Gemüse', 'correct' => ['genug', 'Gemüse'], 'extra' => ['zu viel', 'Karotte']],
                            'fr' => ['sentence' => 'Assez de légumes', 'correct' => ['assez', 'légumes'], 'extra' => ['trop', 'carotte']],
                            'ja' => ['sentence' => '十分な野菜', 'correct' => ['十分な', '野菜'], 'extra' => ['すぎます']],
                        ],
                    ],
                    'b' => [
                        'words' => ['너무', '많은', '토마토'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'too much tomato', 'correct' => ['too much', 'tomato'], 'extra' => ['enough']],
                            'es' => ['sentence' => 'Demasiado tomate', 'correct' => ['demasiado', 'tomate'], 'extra' => ['bastante', 'zanahoria']],
                            'de' => ['sentence' => 'Zu viel Tomate', 'correct' => ['zu viel', 'Tomate'], 'extra' => ['genug', 'Karotte']],
                            'fr' => ['sentence' => 'Trop de tomate', 'correct' => ['trop', 'tomate'], 'extra' => ['assez']],
                            'ja' => ['sentence' => 'トマトが多すぎる', 'correct' => ['トマト', 'が', '多すぎる'], 'extra' => ['十分に']],
                        ],
                    ],
                    'c' => [
                        'words' => ['충분한', '당근과', '너무', '많은', '토마토'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'enough carrot and too much tomato', 'correct' => ['enough', 'carrot', 'and', 'too much', 'tomato'], 'extra' => ['vegetables']],
                            'es' => ['sentence' => 'Bastante zanahoria y demasiado tomate', 'correct' => ['bastante', 'zanahoria', 'y', 'demasiado', 'tomate'], 'extra' => ['verduras']],
                            'de' => ['sentence' => 'Genug Karotte und zu viel Tomate', 'correct' => ['genug', 'Karotte', 'und', 'zu viel', 'Tomate'], 'extra' => ['Gemüse']],
                            'fr' => ['sentence' => 'Assez de carotte et trop de tomate', 'correct' => ['assez', 'carotte', 'et', 'trop', 'tomate'], 'extra' => ['légumes']],
                            'ja' => ['sentence' => '十分なにんじんと多すぎるトマト', 'correct' => ['十分な', 'にんじん', 'と', '多すぎる', 'トマト'], 'extra' => ['野菜']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 양파 · 감자', 5,
                pictures: [['ko' => '양파', 'img' => 'onion'], ['ko' => '감자', 'img' => 'potato']],
                plain: [['ko' => '싼'], ['ko' => '지금']],
                phrases: [
                    'a' => [
                        'words' => ['싼', '양파'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a cheap onion', 'correct' => ['a', 'cheap', 'onion'], 'extra' => ['now']],
                            'es' => ['sentence' => 'Una cebolla barata', 'correct' => ['una', 'barato', 'cebolla'], 'extra' => ['ahora', 'patata']],
                            'de' => ['sentence' => 'Eine billige Zwiebel', 'correct' => ['eine', 'billig', 'Zwiebel'], 'extra' => ['jetzt', 'Kartoffel']],
                            'fr' => ['sentence' => 'Un oignon bon marché', 'correct' => ['un', 'oignon', 'bon marché'], 'extra' => ['maintenant', 'pomme de terre']],
                            'ja' => ['sentence' => '安い玉ねぎ', 'correct' => ['安い', '玉ねぎ'], 'extra' => ['今']],
                        ],
                    ],
                    'b' => [
                        'words' => ['지금', '사세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'buy now', 'correct' => ['buy', 'now'], 'extra' => ['cheap']],
                            'es' => ['sentence' => 'Comprar ahora', 'correct' => ['comprar', 'ahora'], 'extra' => ['barato', 'cebolla']],
                            'de' => ['sentence' => 'Jetzt kaufen', 'correct' => ['jetzt', 'kaufen'], 'extra' => ['billig', 'Zwiebel']],
                            'fr' => ['sentence' => 'Acheter maintenant', 'correct' => ['acheter', 'maintenant'], 'extra' => ['bon marché']],
                            'ja' => ['sentence' => '今買う', 'correct' => ['今', '買う'], 'extra' => ['安い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['지금', '감자를', '사세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'buy a potato now', 'correct' => ['buy', 'a', 'potato', 'now'], 'extra' => ['cheap']],
                            'es' => ['sentence' => 'Comprar una patata ahora', 'correct' => ['comprar', 'una', 'patata', 'ahora'], 'extra' => ['barato', 'cebolla']],
                            'de' => ['sentence' => 'Jetzt eine Kartoffel kaufen', 'correct' => ['jetzt', 'eine', 'Kartoffel', 'kaufen'], 'extra' => ['billig']],
                            'fr' => ['sentence' => 'Acheter une pomme de terre maintenant', 'correct' => ['acheter', 'une', 'pomme de terre', 'maintenant'], 'extra' => ['bon marché']],
                            'ja' => ['sentence' => '今じゃがいもを買う', 'correct' => ['今', 'じゃがいも', 'を', '買う'], 'extra' => ['安い']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
