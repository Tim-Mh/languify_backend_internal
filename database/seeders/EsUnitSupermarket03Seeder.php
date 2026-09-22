<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket03Seeder extends Seeder
{
    private const PICTURES = [
        'zanahoria' => 'carrot',
        'tomate' => 'tomato',
        'patata' => 'potato',
        'cebolla' => 'onion',
        'pasillo' => 'shelf',
        'cesta' => 'basket',
        'ensalada' => 'salad',
        'manzana' => 'apple',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 3, the Spanish twin of the
     * English "Unit 3: Vegetables" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unidad 3: Verduras', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Zanahoria y Tomate', 1,
                pictures: [
                    [
                        'es' => 'zanahoria',
                        'img' => 'carrot',
                    ],
                    [
                        'es' => 'tomate',
                        'img' => 'tomato',
                    ],
                ],
                plain: [
                    [
                        'es' => 'verduras',
                    ],
                    [
                        'es' => 'comer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Comer',
                            'verduras',
                        ],
                        'blank' => 0,
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
                                    'tomato',
                                ],
                            ],
                            'az' => ['sentence' => 'yeyirəm bir az tərəvəzlər', 'correct' => ['yeyirəm', 'bir az', 'tərəvəzlər'], 'extra' => ['yerkökü', 'pomidor']],
                            'ar' => ['sentence' => 'آكل بعض خضروات', 'correct' => ['آكل', 'بعض', 'خضروات'], 'extra' => ['جزر', 'طماطم']],
                            'ru' => ['sentence' => 'ем немного овощи', 'correct' => ['ем', 'немного', 'овощи'], 'extra' => ['морковь', 'помидор']],
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
                            'ja' => [
                                'sentence' => '野菜を食べる',
                                'correct' => [
                                    '野菜',
                                    'を',
                                    '食べる',
                                ],
                                'extra' => [
                                    'にんじん',
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
                            'tr' => ['sentence' => 'biraz sebze ye', 'correct' => ['biraz', 'sebze', 'ye'], 'extra' => ['havuç', 'domates']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'zanahoria',
                            'y',
                            'un',
                            'tomate',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'bir yerkökü və bir pomidor', 'correct' => ['bir', 'yerkökü', 'və', 'bir', 'pomidor'], 'extra' => ['tərəvəzlər']],
                            'ar' => ['sentence' => 'جزر و طماطم', 'correct' => ['جزر', 'و', 'طماطم'], 'extra' => ['خضروات']],
                            'ru' => ['sentence' => 'морковь и помидор', 'correct' => ['морковь', 'и', 'помидор'], 'extra' => ['овощи']],
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
                            'ja' => [
                                'sentence' => 'にんじんとトマト',
                                'correct' => [
                                    'にんじん',
                                    'と',
                                    'トマト',
                                ],
                                'extra' => [
                                    '野菜',
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
                            'tr' => ['sentence' => 'bir havuç ve bir domates', 'correct' => ['bir', 'havuç', 've', 'bir', 'domates'], 'extra' => ['sebze']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Comer',
                            'un',
                            'tomate',
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
                                    'carrot',
                                ],
                            ],
                            'az' => ['sentence' => 'yeyirəm bir pomidor', 'correct' => ['yeyirəm', 'bir', 'pomidor'], 'extra' => ['tərəvəzlər', 'yerkökü']],
                            'ar' => ['sentence' => 'آكل طماطم', 'correct' => ['آكل', 'طماطم'], 'extra' => ['خضروات', 'جزر']],
                            'ru' => ['sentence' => 'ем помидор', 'correct' => ['ем', 'помидор'], 'extra' => ['овощи', 'морковь']],
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
                            'ja' => [
                                'sentence' => 'トマトを食べる',
                                'correct' => [
                                    'トマト',
                                    'を',
                                    '食べる',
                                ],
                                'extra' => [
                                    '野菜',
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
                            'tr' => ['sentence' => 'bir domates ye', 'correct' => ['bir', 'domates', 'ye'], 'extra' => ['sebze', 'havuç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Patata y Cebolla', 2,
                pictures: [
                    [
                        'es' => 'patata',
                        'img' => 'potato',
                    ],
                    [
                        'es' => 'cebolla',
                        'img' => 'onion',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pesar',
                    ],
                    [
                        'es' => 'balanza',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Pesar',
                            'una',
                            'cebolla',
                        ],
                        'blank' => 0,
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
                                    'potato',
                                ],
                            ],
                            'az' => ['sentence' => 'çəkmək bir soğan', 'correct' => ['çəkmək', 'bir', 'soğan'], 'extra' => ['tərəzi', 'kartof']],
                            'ar' => ['sentence' => 'الوزن بصل', 'correct' => ['الوزن', 'بصل'], 'extra' => ['ميزان', 'بطاطا']],
                            'ru' => ['sentence' => 'взвесить лук', 'correct' => ['взвесить', 'лук'], 'extra' => ['весы', 'картофель']],
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
                            'ja' => [
                                'sentence' => '玉ねぎを量る',
                                'correct' => [
                                    '玉ねぎ',
                                    'を',
                                    '量る',
                                ],
                                'extra' => [
                                    'はかり',
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
                            'tr' => ['sentence' => 'bir soğan tartmak', 'correct' => ['bir', 'soğan', 'tartmak'], 'extra' => ['terazi', 'patates']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'balanza',
                            'está',
                            'aquí',
                        ],
                        'blank' => 1,
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
                                    'onion',
                                ],
                            ],
                            'az' => ['sentence' => 'tərəzi burada', 'correct' => ['tərəzi', 'burada'], 'extra' => ['çəkmək', 'soğan']],
                            'ar' => ['sentence' => 'ميزان هنا', 'correct' => ['ميزان', 'هنا'], 'extra' => ['الوزن', 'بصل']],
                            'ru' => ['sentence' => 'весы здесь', 'correct' => ['весы', 'здесь'], 'extra' => ['взвесить', 'лук']],
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
                            'ja' => [
                                'sentence' => 'はかりはここです',
                                'correct' => [
                                    'はかり',
                                    'は',
                                    'ここ',
                                    'です',
                                ],
                                'extra' => [
                                    '量る',
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
                            'tr' => ['sentence' => 'terazi burada', 'correct' => ['terazi', 'burada'], 'extra' => ['tartmak', 'soğan']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Pesar',
                            'una',
                            'patata',
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
                                    'onion',
                                ],
                            ],
                            'az' => ['sentence' => 'çəkmək bir kartof', 'correct' => ['çəkmək', 'bir', 'kartof'], 'extra' => ['tərəzi', 'soğan']],
                            'ar' => ['sentence' => 'الوزن بطاطا', 'correct' => ['الوزن', 'بطاطا'], 'extra' => ['ميزان', 'بصل']],
                            'ru' => ['sentence' => 'взвесить картофель', 'correct' => ['взвесить', 'картофель'], 'extra' => ['весы', 'лук']],
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
                            'ja' => [
                                'sentence' => 'じゃがいもを量る',
                                'correct' => [
                                    'じゃがいも',
                                    'を',
                                    '量る',
                                ],
                                'extra' => [
                                    'はかり',
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
                            'tr' => ['sentence' => 'bir patates tartmak', 'correct' => ['bir', 'patates', 'tartmak'], 'extra' => ['terazi', 'soğan']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Cebolla y Pasillo', 3,
                pictures: [
                    [
                        'es' => 'cebolla',
                        'img' => 'onion',
                    ],
                    [
                        'es' => 'pasillo',
                        'img' => 'shelf',
                    ],
                ],
                plain: [
                    [
                        'es' => 'delante',
                    ],
                    [
                        'es' => 'detrás',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pasillo',
                            'está',
                            'delante',
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
                                    'onion',
                                ],
                            ],
                            'az' => ['sentence' => 'şöbə qarşıda', 'correct' => ['şöbə', 'qarşıda'], 'extra' => ['arxada', 'soğan']],
                            'ar' => ['sentence' => 'قسم أمام', 'correct' => ['قسم', 'أمام'], 'extra' => ['خلف', 'بصل']],
                            'ru' => ['sentence' => 'отдел впереди', 'correct' => ['отдел', 'впереди'], 'extra' => ['сзади', 'лук']],
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
                            'ja' => [
                                'sentence' => '売り場は前にあります',
                                'correct' => [
                                    '売り場',
                                    'は',
                                    '前に',
                                    'あります',
                                ],
                                'extra' => [
                                    '後ろに',
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
                            'tr' => ['sentence' => 'reyon önde', 'correct' => ['reyon', 'önde'], 'extra' => ['arkasında', 'soğan']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'cebolla',
                            'detrás',
                            'del',
                            'pasillo',
                        ],
                        'blank' => 2,
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
                                    'in front',
                                ],
                            ],
                            'az' => ['sentence' => 'bir soğan arxada şöbə', 'correct' => ['bir', 'soğan', 'arxada', 'şöbə'], 'extra' => ['qarşıda']],
                            'ar' => ['sentence' => 'بصل خلف قسم', 'correct' => ['بصل', 'خلف', 'قسم'], 'extra' => ['أمام']],
                            'ru' => ['sentence' => 'лук сзади отдел', 'correct' => ['лук', 'сзади', 'отдел'], 'extra' => ['впереди']],
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
                            'ja' => [
                                'sentence' => '売り場の後ろの玉ねぎ',
                                'correct' => [
                                    '売り場',
                                    'の',
                                    '後ろ',
                                    'の',
                                    '玉ねぎ',
                                ],
                                'extra' => [
                                    '前に',
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
                            'tr' => ['sentence' => 'reyonun arkasında bir soğan', 'correct' => ['reyonun', 'arkasında', 'bir', 'soğan'], 'extra' => ['önde']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Delante',
                            'o',
                            'detrás',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'qarşıda və ya arxada', 'correct' => ['qarşıda', 'və ya', 'arxada'], 'extra' => ['soğan']],
                            'ar' => ['sentence' => 'أمام أو خلف', 'correct' => ['أمام', 'أو', 'خلف'], 'extra' => ['بصل']],
                            'ru' => ['sentence' => 'впереди или сзади', 'correct' => ['впереди', 'или', 'сзади'], 'extra' => ['лук']],
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
                            'ja' => [
                                'sentence' => '前か後ろ',
                                'correct' => [
                                    '前',
                                    'か',
                                    '後ろ',
                                ],
                                'extra' => [
                                    '玉ねぎ',
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
                            'tr' => ['sentence' => 'önde veya arkada', 'correct' => ['önde', 'veya', 'arkada'], 'extra' => ['soğan']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Tomate y Zanahoria', 4,
                pictures: [
                    [
                        'es' => 'tomate',
                        'img' => 'tomato',
                    ],
                    [
                        'es' => 'zanahoria',
                        'img' => 'carrot',
                    ],
                ],
                plain: [
                    [
                        'es' => 'bastante',
                    ],
                    [
                        'es' => 'demasiado',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Bastantes',
                            'verduras',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'enough vegetables',
                                'correct' => [
                                    'enough',
                                    'vegetables',
                                ],
                                'extra' => [
                                    'too much',
                                    'carrot',
                                ],
                            ],
                            'az' => ['sentence' => 'kifayət tərəvəzlər', 'correct' => ['kifayət', 'tərəvəzlər'], 'extra' => ['çox artıq', 'yerkökü']],
                            'ar' => ['sentence' => 'كفى خضروات', 'correct' => ['كفى', 'خضروات'], 'extra' => ['كثير جدا', 'جزر']],
                            'ru' => ['sentence' => 'достаточно овощи', 'correct' => ['достаточно', 'овощи'], 'extra' => ['слишком много', 'морковь']],
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
                            'ja' => [
                                'sentence' => '十分な野菜',
                                'correct' => [
                                    '十分な',
                                    '野菜',
                                ],
                                'extra' => [
                                    'すぎます',
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
                            'tr' => ['sentence' => 'yeterli sebze', 'correct' => ['yeterli', 'sebze'], 'extra' => ['çok fazla', 'havuç']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Demasiado',
                            'tomate',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'too much tomato',
                                'correct' => [
                                    'too much',
                                    'tomato',
                                ],
                                'extra' => [
                                    'enough',
                                    'carrot',
                                ],
                            ],
                            'az' => ['sentence' => 'çox artıq pomidor', 'correct' => ['çox artıq', 'pomidor'], 'extra' => ['kifayət', 'yerkökü']],
                            'ar' => ['sentence' => 'كثير جدا طماطم', 'correct' => ['كثير جدا', 'طماطم'], 'extra' => ['كفى', 'جزر']],
                            'ru' => ['sentence' => 'слишком много помидор', 'correct' => ['слишком много', 'помидор'], 'extra' => ['достаточно', 'морковь']],
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
                            'ja' => [
                                'sentence' => 'トマトが多すぎる',
                                'correct' => [
                                    'トマト',
                                    'が',
                                    '多すぎる',
                                ],
                                'extra' => [
                                    '十分に',
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
                            'tr' => ['sentence' => 'çok fazla domates', 'correct' => ['çok', 'fazla', 'domates'], 'extra' => ['yeterli', 'havuç']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Bastante',
                            'zanahoria',
                            'y',
                            'demasiado',
                            'tomate',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'kifayət yerkökü və çox artıq pomidor', 'correct' => ['kifayət', 'yerkökü', 'və', 'çox artıq', 'pomidor'], 'extra' => ['tərəvəzlər']],
                            'ar' => ['sentence' => 'كفى جزر و كثير جدا طماطم', 'correct' => ['كفى', 'جزر', 'و', 'كثير جدا', 'طماطم'], 'extra' => ['خضروات']],
                            'ru' => ['sentence' => 'достаточно морковь и слишком много помидор', 'correct' => ['достаточно', 'морковь', 'и', 'слишком много', 'помидор'], 'extra' => ['овощи']],
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
                            'ja' => [
                                'sentence' => '十分なにんじんと多すぎるトマト',
                                'correct' => [
                                    '十分な',
                                    'にんじん',
                                    'と',
                                    '多すぎる',
                                    'トマト',
                                ],
                                'extra' => [
                                    '野菜',
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
                            'tr' => ['sentence' => 'yeterli havuç ve çok fazla domates', 'correct' => ['yeterli', 'havuç', 've', 'çok', 'fazla', 'domates'], 'extra' => ['sebze']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Cebolla y Patata', 5,
                pictures: [
                    [
                        'es' => 'cebolla',
                        'img' => 'onion',
                    ],
                    [
                        'es' => 'patata',
                        'img' => 'potato',
                    ],
                ],
                plain: [
                    [
                        'es' => 'barato',
                    ],
                    [
                        'es' => 'ahora',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'cebolla',
                            'barata',
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
                                    'potato',
                                ],
                            ],
                            'az' => ['sentence' => 'bir ucuz soğan', 'correct' => ['bir', 'ucuz', 'soğan'], 'extra' => ['indi', 'kartof']],
                            'ar' => ['sentence' => 'رخيص بصل', 'correct' => ['رخيص', 'بصل'], 'extra' => ['الآن', 'بطاطا']],
                            'ru' => ['sentence' => 'дешёвый лук', 'correct' => ['дешёвый', 'лук'], 'extra' => ['сейчас', 'картофель']],
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
                            'ja' => [
                                'sentence' => '安い玉ねぎ',
                                'correct' => [
                                    '安い',
                                    '玉ねぎ',
                                ],
                                'extra' => [
                                    '今',
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
                            'tr' => ['sentence' => 'ucuz bir soğan', 'correct' => ['ucuz', 'bir', 'soğan'], 'extra' => ['şimdi', 'patates']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Comprar',
                            'ahora',
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
                                    'onion',
                                ],
                            ],
                            'az' => ['sentence' => 'al indi', 'correct' => ['al', 'indi'], 'extra' => ['ucuz', 'soğan']],
                            'ar' => ['sentence' => 'اشتر الآن', 'correct' => ['اشتر', 'الآن'], 'extra' => ['رخيص', 'بصل']],
                            'ru' => ['sentence' => 'купи сейчас', 'correct' => ['купи', 'сейчас'], 'extra' => ['дешёвый', 'лук']],
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
                            'ja' => [
                                'sentence' => '今買う',
                                'correct' => [
                                    '今',
                                    '買う',
                                ],
                                'extra' => [
                                    '安い',
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
                            'tr' => ['sentence' => 'şimdi al', 'correct' => ['şimdi', 'al'], 'extra' => ['ucuz', 'soğan']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Comprar',
                            'una',
                            'patata',
                            'ahora',
                        ],
                        'blank' => 2,
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
                                    'onion',
                                ],
                            ],
                            'az' => ['sentence' => 'al bir kartof indi', 'correct' => ['al', 'bir', 'kartof', 'indi'], 'extra' => ['ucuz', 'soğan']],
                            'ar' => ['sentence' => 'اشتر بطاطا الآن', 'correct' => ['اشتر', 'بطاطا', 'الآن'], 'extra' => ['رخيص', 'بصل']],
                            'ru' => ['sentence' => 'купи картофель сейчас', 'correct' => ['купи', 'картофель', 'сейчас'], 'extra' => ['дешёвый', 'лук']],
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
                            'ja' => [
                                'sentence' => '今じゃがいもを買う',
                                'correct' => [
                                    '今',
                                    'じゃがいも',
                                    'を',
                                    '買う',
                                ],
                                'extra' => [
                                    '安い',
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
                            'tr' => ['sentence' => 'şimdi bir patates al', 'correct' => ['şimdi', 'bir', 'patates', 'al'], 'extra' => ['ucuz', 'soğan']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
