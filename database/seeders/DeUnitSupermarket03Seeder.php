<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket03Seeder extends Seeder
{
    private const PICTURES = [
        'Karotte' => 'carrot',
        'Tomate' => 'tomato',
        'Kartoffel' => 'potato',
        'Zwiebel' => 'onion',
        'Regal' => 'shelf',
        'Korb' => 'basket',
        'Salat' => 'salad',
        'Apfel' => 'apple',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 3, the German twin of the
     * English "Unit 3: Vegetables" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Einheit 3: Gemüse', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Karotte & Tomate', 1,
                pictures: [
                    [
                        'de' => 'Karotte',
                        'img' => 'carrot',
                    ],
                    [
                        'de' => 'Tomate',
                        'img' => 'tomato',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Gemüse',
                    ],
                    [
                        'de' => 'essen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Gemüse',
                            'essen',
                        ],
                        'blank' => 1,
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
                            'Eine',
                            'Karotte',
                            'und',
                            'eine',
                            'Tomate',
                        ],
                        'blank' => 1,
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
                            'Eine',
                            'Tomate',
                            'essen',
                        ],
                        'blank' => 1,
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
            $builder->lesson('Lektion 2: Kartoffel & Zwiebel', 2,
                pictures: [
                    [
                        'de' => 'Kartoffel',
                        'img' => 'potato',
                    ],
                    [
                        'de' => 'Zwiebel',
                        'img' => 'onion',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wiegen',
                    ],
                    [
                        'de' => 'Waage',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Zwiebel',
                            'wiegen',
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
                                    'potato',
                                ],
                            ],
                            'az' => ['sentence' => 'çəkmək bir soğan', 'correct' => ['çəkmək', 'bir', 'soğan'], 'extra' => ['tərəzi', 'kartof']],
                            'ar' => ['sentence' => 'الوزن بصل', 'correct' => ['الوزن', 'بصل'], 'extra' => ['ميزان', 'بطاطا']],
                            'ru' => ['sentence' => 'взвесить лук', 'correct' => ['взвесить', 'лук'], 'extra' => ['весы', 'картофель']],
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
                            'Die',
                            'Waage',
                            'ist',
                            'hier',
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
                            'Eine',
                            'Kartoffel',
                            'wiegen',
                        ],
                        'blank' => 1,
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
            $builder->lesson('Lektion 3: Zwiebel & Regal', 3,
                pictures: [
                    [
                        'de' => 'Zwiebel',
                        'img' => 'onion',
                    ],
                    [
                        'de' => 'Regal',
                        'img' => 'shelf',
                    ],
                ],
                plain: [
                    [
                        'de' => 'vorne',
                    ],
                    [
                        'de' => 'hinten',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Regal',
                            'ist',
                            'vorne',
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
                            'Eine',
                            'Zwiebel',
                            'hinter',
                            'dem',
                            'Regal',
                        ],
                        'blank' => 1,
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
                            'Vorne',
                            'oder',
                            'hinten',
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
            $builder->lesson('Lektion 4: Tomate & Karotte', 4,
                pictures: [
                    [
                        'de' => 'Tomate',
                        'img' => 'tomato',
                    ],
                    [
                        'de' => 'Karotte',
                        'img' => 'carrot',
                    ],
                ],
                plain: [
                    [
                        'de' => 'genug',
                    ],
                    [
                        'de' => 'zu viel',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Genug',
                            'Gemüse',
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
                            'Zu',
                            'viel',
                            'Tomate',
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
                                    'carrot',
                                ],
                            ],
                            'az' => ['sentence' => 'çox artıq pomidor', 'correct' => ['çox artıq', 'pomidor'], 'extra' => ['kifayət', 'yerkökü']],
                            'ar' => ['sentence' => 'كثير جدا طماطم', 'correct' => ['كثير جدا', 'طماطم'], 'extra' => ['كفى', 'جزر']],
                            'ru' => ['sentence' => 'слишком много помидор', 'correct' => ['слишком много', 'помидор'], 'extra' => ['достаточно', 'морковь']],
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
                            'Genug',
                            'Karotte',
                            'und',
                            'zu',
                            'viel',
                            'Tomate',
                        ],
                        'blank' => 1,
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
            $builder->lesson('Lektion 5: Zwiebel & Kartoffel', 5,
                pictures: [
                    [
                        'de' => 'Zwiebel',
                        'img' => 'onion',
                    ],
                    [
                        'de' => 'Kartoffel',
                        'img' => 'potato',
                    ],
                ],
                plain: [
                    [
                        'de' => 'billig',
                    ],
                    [
                        'de' => 'jetzt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'billige',
                            'Zwiebel',
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
                            'Jetzt',
                            'kaufen',
                        ],
                        'blank' => 0,
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
                            'Jetzt',
                            'eine',
                            'Kartoffel',
                            'kaufen',
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
                                ],
                            ],
                            'az' => ['sentence' => 'al bir kartof indi', 'correct' => ['al', 'bir', 'kartof', 'indi'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'اشتر بطاطا الآن', 'correct' => ['اشتر', 'بطاطا', 'الآن'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'купи картофель сейчас', 'correct' => ['купи', 'картофель', 'сейчас'], 'extra' => ['дешёвый']],
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
                            'tr' => ['sentence' => 'şimdi bir patates al', 'correct' => ['şimdi', 'bir', 'patates', 'al'], 'extra' => ['ucuz']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
