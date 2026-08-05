<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket03Seeder extends Seeder
{
    private const PICTURES = [
        'にんじん' => 'carrot',
        'トマト' => 'tomato',
        'じゃがいも' => 'potato',
        '玉ねぎ' => 'onion',
        '売り場' => 'shelf',
        'かご' => 'basket',
        'サラダ' => 'salad',
        'りんご' => 'apple',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 3, the Japanese twin of the
     * English "Unit 3: Vegetables" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'ユニット3: 野菜', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: にんじん・トマト', 1,
                pictures: [
                    [
                        'ja' => 'にんじん',
                        'img' => 'carrot',
                    ],
                    [
                        'ja' => 'トマト',
                        'img' => 'tomato',
                    ],
                ],
                plain: [
                    [
                        'ja' => '野菜',
                    ],
                    [
                        'ja' => '食べる',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '野菜',
                            'を',
                            '食べる',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'eat some vegetables',
                                'correct' => [
                                    'eat',
                                    'some',
                                    'vegetables',
                                ],
                                'extra' => [
                                    'carrot',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Comer verduras',
                                'correct' => [
                                    'comer',
                                    'algo de',
                                    'verduras',
                                ],
                                'extra' => [
                                    'zanahoria',
                                    'tomate',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Gemüse essen',
                                'correct' => [
                                    'essen',
                                    'etwas',
                                    'Gemüse',
                                ],
                                'extra' => [
                                    'Karotte',
                                    'Tomate',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Manger des légumes',
                                'correct' => [
                                    'manger',
                                    'du',
                                    'légumes',
                                ],
                                'extra' => [
                                    'carotte',
                                    'tomate',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '채소를 먹다',
                                'correct' => [
                                    '채소를',
                                    '먹다',
                                ],
                                'extra' => [
                                    '당근',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'にんじん',
                            'と',
                            'トマト',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a carrot and a tomato',
                                'correct' => [
                                    'a',
                                    'carrot',
                                    'and',
                                    'a',
                                    'tomato',
                                ],
                                'extra' => [
                                    'vegetables',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una zanahoria y un tomate',
                                'correct' => [
                                    'una',
                                    'zanahoria',
                                    'y',
                                    'un',
                                    'tomate',
                                ],
                                'extra' => [
                                    'verduras',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Karotte und eine Tomate',
                                'correct' => [
                                    'eine',
                                    'Karotte',
                                    'und',
                                    'eine',
                                    'Tomate',
                                ],
                                'extra' => [
                                    'Gemüse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une carotte et une tomate',
                                'correct' => [
                                    'une',
                                    'carotte',
                                    'et',
                                    'une',
                                    'tomate',
                                ],
                                'extra' => [
                                    'légumes',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '당근과 토마토',
                                'correct' => [
                                    '당근과',
                                    '토마토',
                                ],
                                'extra' => [
                                    '채소',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'トマト',
                            'を',
                            '食べる',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'eat a tomato',
                                'correct' => [
                                    'eat',
                                    'a',
                                    'tomato',
                                ],
                                'extra' => [
                                    'vegetables',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Comer un tomate',
                                'correct' => [
                                    'comer',
                                    'un',
                                    'tomate',
                                ],
                                'extra' => [
                                    'verduras',
                                    'zanahoria',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Tomate essen',
                                'correct' => [
                                    'eine',
                                    'Tomate',
                                    'essen',
                                ],
                                'extra' => [
                                    'Gemüse',
                                    'Karotte',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Manger une tomate',
                                'correct' => [
                                    'manger',
                                    'une',
                                    'tomate',
                                ],
                                'extra' => [
                                    'légumes',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '토마토를 먹다',
                                'correct' => [
                                    '토마토를',
                                    '먹다',
                                ],
                                'extra' => [
                                    '채소',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: じゃがいも・玉ねぎ', 2,
                pictures: [
                    [
                        'ja' => 'じゃがいも',
                        'img' => 'potato',
                    ],
                    [
                        'ja' => '玉ねぎ',
                        'img' => 'onion',
                    ],
                ],
                plain: [
                    [
                        'ja' => '量る',
                    ],
                    [
                        'ja' => 'はかり',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '玉ねぎ',
                            'を',
                            '量る',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to weigh an onion',
                                'correct' => [
                                    'to weigh',
                                    'an',
                                    'onion',
                                ],
                                'extra' => [
                                    'scales',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pesar una cebolla',
                                'correct' => [
                                    'pesar',
                                    'una',
                                    'cebolla',
                                ],
                                'extra' => [
                                    'balanza',
                                    'patata',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Zwiebel wiegen',
                                'correct' => [
                                    'eine',
                                    'Zwiebel',
                                    'wiegen',
                                ],
                                'extra' => [
                                    'Waage',
                                    'Kartoffel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Peser un oignon',
                                'correct' => [
                                    'peser',
                                    'un',
                                    'oignon',
                                ],
                                'extra' => [
                                    'balance',
                                    'pomme de terre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '양파의 무게를 재다',
                                'correct' => [
                                    '양파의',
                                    '무게를',
                                    '재다',
                                ],
                                'extra' => [
                                    '저울',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'はかり',
                            'は',
                            'ここ',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the scales are here',
                                'correct' => [
                                    'the',
                                    'scales',
                                    'are',
                                    'here',
                                ],
                                'extra' => [
                                    'to weigh',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La balanza está aquí',
                                'correct' => [
                                    'la',
                                    'balanza',
                                    'son',
                                    'aquí',
                                ],
                                'extra' => [
                                    'pesar',
                                    'cebolla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Waage ist hier',
                                'correct' => [
                                    'die',
                                    'Waage',
                                    'sind',
                                    'hier',
                                ],
                                'extra' => [
                                    'wiegen',
                                    'Zwiebel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La balance est ici',
                                'correct' => [
                                    'la',
                                    'balance',
                                    'est',
                                    'ici',
                                ],
                                'extra' => [
                                    'peser',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저울은 여기 있습니다',
                                'correct' => [
                                    '저울은',
                                    '여기',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '무게를 재다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'じゃがいも',
                            'を',
                            '量る',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to weigh a potato',
                                'correct' => [
                                    'to weigh',
                                    'a',
                                    'potato',
                                ],
                                'extra' => [
                                    'scales',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Pesar una patata',
                                'correct' => [
                                    'pesar',
                                    'una',
                                    'patata',
                                ],
                                'extra' => [
                                    'balanza',
                                    'cebolla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Kartoffel wiegen',
                                'correct' => [
                                    'eine',
                                    'Kartoffel',
                                    'wiegen',
                                ],
                                'extra' => [
                                    'Waage',
                                    'Zwiebel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Peser une pomme de terre',
                                'correct' => [
                                    'peser',
                                    'une',
                                    'pomme de terre',
                                ],
                                'extra' => [
                                    'balance',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '감자의 무게를 재다',
                                'correct' => [
                                    '감자의',
                                    '무게를',
                                    '재다',
                                ],
                                'extra' => [
                                    '저울',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 玉ねぎ・売り場', 3,
                pictures: [
                    [
                        'ja' => '玉ねぎ',
                        'img' => 'onion',
                    ],
                    [
                        'ja' => '売り場',
                        'img' => 'shelf',
                    ],
                ],
                plain: [
                    [
                        'ja' => '前に',
                    ],
                    [
                        'ja' => '後ろに',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '売り場',
                            'は',
                            '前に',
                            'あります',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the aisle is in front',
                                'correct' => [
                                    'the',
                                    'aisle',
                                    'is',
                                    'in front',
                                ],
                                'extra' => [
                                    'behind',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El pasillo está delante',
                                'correct' => [
                                    'el',
                                    'pasillo',
                                    'está',
                                    'delante',
                                ],
                                'extra' => [
                                    'detrás',
                                    'cebolla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Regal ist vorne',
                                'correct' => [
                                    'das',
                                    'Regal',
                                    'ist',
                                    'vorne',
                                ],
                                'extra' => [
                                    'hinten',
                                    'Zwiebel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le rayon est devant',
                                'correct' => [
                                    'le',
                                    'rayon',
                                    'est',
                                    'devant',
                                ],
                                'extra' => [
                                    'derrière',
                                    'oignon',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대는 앞에 있습니다',
                                'correct' => [
                                    '진열대는',
                                    '앞에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '뒤에',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '売り場',
                            'の',
                            '後ろ',
                            'の',
                            '玉ねぎ',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an onion behind the aisle',
                                'correct' => [
                                    'an',
                                    'onion',
                                    'behind',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'before',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una cebolla detrás del pasillo',
                                'correct' => [
                                    'una',
                                    'cebolla',
                                    'detrás',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'delante',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Zwiebel hinter dem Regal',
                                'correct' => [
                                    'eine',
                                    'Zwiebel',
                                    'hinten',
                                    'dem',
                                    'Regal',
                                ],
                                'extra' => [
                                    'vorne',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un oignon derrière le rayon',
                                'correct' => [
                                    'un',
                                    'oignon',
                                    'derrière',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'devant',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대 뒤의 양파',
                                'correct' => [
                                    '진열대',
                                    '뒤의',
                                    '양파',
                                ],
                                'extra' => [
                                    '앞에',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '前',
                            'か',
                            '後ろ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'in front or behind',
                                'correct' => [
                                    'in front',
                                    'or',
                                    'behind',
                                ],
                                'extra' => [
                                    'onion',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Delante o detrás',
                                'correct' => [
                                    'delante',
                                    'o',
                                    'detrás',
                                ],
                                'extra' => [
                                    'cebolla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Vorne oder hinten',
                                'correct' => [
                                    'vorne',
                                    'oder',
                                    'hinten',
                                ],
                                'extra' => [
                                    'Zwiebel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Devant ou derrière',
                                'correct' => [
                                    'devant',
                                    'ou',
                                    'derrière',
                                ],
                                'extra' => [
                                    'oignon',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '앞에 또는 뒤에',
                                'correct' => [
                                    '앞에',
                                    '또는',
                                    '뒤에',
                                ],
                                'extra' => [
                                    '양파',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: トマト・にんじん', 4,
                pictures: [
                    [
                        'ja' => 'トマト',
                        'img' => 'tomato',
                    ],
                    [
                        'ja' => 'にんじん',
                        'img' => 'carrot',
                    ],
                ],
                plain: [
                    [
                        'ja' => '十分に',
                    ],
                    [
                        'ja' => 'すぎます',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '十分な',
                            '野菜',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'enough vegetables',
                                'correct' => [
                                    'enough',
                                    'vegetables',
                                ],
                                'extra' => [
                                    'too much',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Bastantes verduras',
                                'correct' => [
                                    'bastante',
                                    'verduras',
                                ],
                                'extra' => [
                                    'demasiado',
                                    'zanahoria',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Genug Gemüse',
                                'correct' => [
                                    'genug',
                                    'Gemüse',
                                ],
                                'extra' => [
                                    'zu viel',
                                    'Karotte',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Assez de légumes',
                                'correct' => [
                                    'assez',
                                    'légumes',
                                ],
                                'extra' => [
                                    'trop',
                                    'carotte',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '충분한 채소',
                                'correct' => [
                                    '충분한',
                                    '채소',
                                ],
                                'extra' => [
                                    '너무',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'トマト',
                            'が',
                            '多すぎる',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'too much tomato',
                                'correct' => [
                                    'too much',
                                    'tomato',
                                ],
                                'extra' => [
                                    'enough',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Demasiado tomate',
                                'correct' => [
                                    'demasiado',
                                    'tomate',
                                ],
                                'extra' => [
                                    'bastante',
                                    'zanahoria',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Zu viel Tomate',
                                'correct' => [
                                    'zu viel',
                                    'Tomate',
                                ],
                                'extra' => [
                                    'genug',
                                    'Karotte',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trop de tomate',
                                'correct' => [
                                    'trop',
                                    'tomate',
                                ],
                                'extra' => [
                                    'assez',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '너무 많은 토마토',
                                'correct' => [
                                    '너무',
                                    '많은',
                                    '토마토',
                                ],
                                'extra' => [
                                    '충분히',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '十分な',
                            'にんじん',
                            'と',
                            '多すぎる',
                            'トマト',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'enough carrot and too much tomato',
                                'correct' => [
                                    'enough',
                                    'carrot',
                                    'and',
                                    'too much',
                                    'tomato',
                                ],
                                'extra' => [
                                    'vegetables',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Bastante zanahoria y demasiado tomate',
                                'correct' => [
                                    'bastante',
                                    'zanahoria',
                                    'y',
                                    'demasiado',
                                    'tomate',
                                ],
                                'extra' => [
                                    'verduras',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Genug Karotte und zu viel Tomate',
                                'correct' => [
                                    'genug',
                                    'Karotte',
                                    'und',
                                    'zu viel',
                                    'Tomate',
                                ],
                                'extra' => [
                                    'Gemüse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Assez de carotte et trop de tomate',
                                'correct' => [
                                    'assez',
                                    'carotte',
                                    'et',
                                    'trop',
                                    'tomate',
                                ],
                                'extra' => [
                                    'légumes',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '충분한 당근과 너무 많은 토마토',
                                'correct' => [
                                    '충분한',
                                    '당근과',
                                    '너무',
                                    '많은',
                                    '토마토',
                                ],
                                'extra' => [
                                    '채소',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 玉ねぎ・じゃがいも', 5,
                pictures: [
                    [
                        'ja' => '玉ねぎ',
                        'img' => 'onion',
                    ],
                    [
                        'ja' => 'じゃがいも',
                        'img' => 'potato',
                    ],
                ],
                plain: [
                    [
                        'ja' => '安い',
                    ],
                    [
                        'ja' => '今',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '安い',
                            '玉ねぎ',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a cheap onion',
                                'correct' => [
                                    'a',
                                    'cheap',
                                    'onion',
                                ],
                                'extra' => [
                                    'now',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una cebolla barata',
                                'correct' => [
                                    'una',
                                    'barato',
                                    'cebolla',
                                ],
                                'extra' => [
                                    'ahora',
                                    'patata',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine billige Zwiebel',
                                'correct' => [
                                    'eine',
                                    'billig',
                                    'Zwiebel',
                                ],
                                'extra' => [
                                    'jetzt',
                                    'Kartoffel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un oignon bon marché',
                                'correct' => [
                                    'un',
                                    'oignon',
                                    'bon marché',
                                ],
                                'extra' => [
                                    'maintenant',
                                    'pomme de terre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '싼 양파',
                                'correct' => [
                                    '싼',
                                    '양파',
                                ],
                                'extra' => [
                                    '지금',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '今',
                            '買う',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy now',
                                'correct' => [
                                    'buy',
                                    'now',
                                ],
                                'extra' => [
                                    'cheap',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Comprar ahora',
                                'correct' => [
                                    'comprar',
                                    'ahora',
                                ],
                                'extra' => [
                                    'barato',
                                    'cebolla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Jetzt kaufen',
                                'correct' => [
                                    'jetzt',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'billig',
                                    'Zwiebel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter maintenant',
                                'correct' => [
                                    'acheter',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'bon marché',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '지금 사다',
                                'correct' => [
                                    '지금',
                                    '사다',
                                ],
                                'extra' => [
                                    '싼',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '今',
                            'じゃがいも',
                            'を',
                            '買う',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy a potato now',
                                'correct' => [
                                    'buy',
                                    'a',
                                    'potato',
                                    'now',
                                ],
                                'extra' => [
                                    'cheap',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Comprar una patata ahora',
                                'correct' => [
                                    'comprar',
                                    'una',
                                    'patata',
                                    'ahora',
                                ],
                                'extra' => [
                                    'barato',
                                    'cebolla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Jetzt eine Kartoffel kaufen',
                                'correct' => [
                                    'jetzt',
                                    'eine',
                                    'Kartoffel',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'billig',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter une pomme de terre maintenant',
                                'correct' => [
                                    'acheter',
                                    'une',
                                    'pomme de terre',
                                    'maintenant',
                                ],
                                'extra' => [
                                    'bon marché',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '지금 감자를 사다',
                                'correct' => [
                                    '지금',
                                    '감자를',
                                    '사다',
                                ],
                                'extra' => [
                                    '싼',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
