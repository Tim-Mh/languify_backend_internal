<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket02Seeder extends Seeder
{
    private const PICTURES = [
        'manzana' => 'apple',
        'plátano' => 'banana',
        'naranja' => 'orange',
        'uvas' => 'grapes',
        'cesta' => 'basket',
        'caja' => 'box',
        'tomate' => 'tomato',
        'zanahoria' => 'carrot',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 2, the Spanish twin of the
     * English "Unit 2: Fruit" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unidad 2: Fruta', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Manzana y Plátano', 1,
                pictures: [
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                    [
                        'es' => 'plátano',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'es' => 'frutas',
                    ],
                    [
                        'es' => 'kilo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'kilo',
                            'de',
                            'frutas',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a kilo of fruits',
                                'correct' => [
                                    'a',
                                    'kilo',
                                    'of',
                                    'fruits',
                                ],
                                'extra' => [
                                    'apple',
                                    'banana',
                                ],
                            ],
                            'az' => ['sentence' => 'bir kilo meyvələr', 'correct' => ['bir', 'kilo', 'meyvələr'], 'extra' => ['alma', 'banan']],
                            'ar' => ['sentence' => 'كيلو فواكه', 'correct' => ['كيلو', 'فواكه'], 'extra' => ['تفاحة', 'موزة']],
                            'ru' => ['sentence' => 'кило фрукты', 'correct' => ['кило', 'фрукты'], 'extra' => ['яблоко', 'банан']],
                            'de' => [
                                'sentence' => 'Ein Kilo Früchte',
                                'correct' => [
                                    'ein',
                                    'Kilo',
                                    'von',
                                    'Früchte',
                                ],
                                'extra' => [
                                    'Apfel',
                                    'Banane',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un kilo de fruits',
                                'correct' => [
                                    'un',
                                    'kilo',
                                    'de',
                                    'fruits',
                                ],
                                'extra' => [
                                    'pomme',
                                    'banane',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '果物一キロ',
                                'correct' => [
                                    '果物',
                                    '一',
                                    'キロ',
                                ],
                                'extra' => [
                                    'りんご',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '과일 일 킬로',
                                'correct' => [
                                    '과일',
                                    '일',
                                    '킬로',
                                ],
                                'extra' => [
                                    '사과',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kilo meyve', 'correct' => ['bir', 'kilo', 'meyve'], 'extra' => ['elma', 'muz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'manzana',
                            'y',
                            'un',
                            'plátano',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an apple and a banana',
                                'correct' => [
                                    'an',
                                    'apple',
                                    'and',
                                    'a',
                                    'banana',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'az' => ['sentence' => 'bir alma və bir banan', 'correct' => ['bir', 'alma', 'və', 'bir', 'banan'], 'extra' => ['kilo']],
                            'ar' => ['sentence' => 'تفاحة و موزة', 'correct' => ['تفاحة', 'و', 'موزة'], 'extra' => ['كيلو']],
                            'ru' => ['sentence' => 'яблоко и банан', 'correct' => ['яблоко', 'и', 'банан'], 'extra' => ['кило']],
                            'de' => [
                                'sentence' => 'Ein Apfel und eine Banane',
                                'correct' => [
                                    'ein',
                                    'Apfel',
                                    'und',
                                    'eine',
                                    'Banane',
                                ],
                                'extra' => [
                                    'Kilo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une pomme et une banane',
                                'correct' => [
                                    'une',
                                    'pomme',
                                    'et',
                                    'une',
                                    'banane',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごとバナナ',
                                'correct' => [
                                    'りんご',
                                    'と',
                                    'バナナ',
                                ],
                                'extra' => [
                                    'キロ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과와 바나나',
                                'correct' => [
                                    '사과와',
                                    '바나나',
                                ],
                                'extra' => [
                                    '킬로',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir elma ve bir muz', 'correct' => ['bir', 'elma', 've', 'bir', 'muz'], 'extra' => ['kilo']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Algo',
                            'de',
                            'frutas',
                            'en',
                            'la',
                            'cesta',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some fruits in the basket',
                                'correct' => [
                                    'some',
                                    'fruits',
                                    'in',
                                    'the',
                                    'basket',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'az' => ['sentence' => 'bir az meyvələr içində səbət', 'correct' => ['bir az', 'meyvələr', 'içində', 'səbət'], 'extra' => ['kilo']],
                            'ar' => ['sentence' => 'بعض فواكه في سلة', 'correct' => ['بعض', 'فواكه', 'في', 'سلة'], 'extra' => ['كيلو']],
                            'ru' => ['sentence' => 'немного фрукты в корзина', 'correct' => ['немного', 'фрукты', 'в', 'корзина'], 'extra' => ['кило']],
                            'de' => [
                                'sentence' => 'Etwas Früchte im Korb',
                                'correct' => [
                                    'etwas',
                                    'Früchte',
                                    'in',
                                    'dem',
                                    'Korb',
                                ],
                                'extra' => [
                                    'Kilo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Des fruits dans le panier',
                                'correct' => [
                                    'du',
                                    'fruits',
                                    'dans',
                                    'le',
                                    'panier',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'かごの中の果物',
                                'correct' => [
                                    'かご',
                                    'の',
                                    '中',
                                    'の',
                                    '果物',
                                ],
                                'extra' => [
                                    'キロ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바구니 안의 과일',
                                'correct' => [
                                    '바구니',
                                    '안의',
                                    '과일',
                                ],
                                'extra' => [
                                    '킬로',
                                ],
                            ],
                            'tr' => ['sentence' => 'sepette biraz meyve', 'correct' => ['sepette', 'biraz', 'meyve'], 'extra' => ['kilo']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Naranja y Uvas', 2,
                pictures: [
                    [
                        'es' => 'naranja',
                        'img' => 'orange',
                    ],
                    [
                        'es' => 'uvas',
                        'img' => 'grapes',
                    ],
                ],
                plain: [
                    [
                        'es' => 'elegir',
                    ],
                    [
                        'es' => 'comprar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Elegir',
                            'una',
                            'naranja',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to choose an orange',
                                'correct' => [
                                    'to choose',
                                    'an',
                                    'orange',
                                ],
                                'extra' => [
                                    'to buy',
                                    'grapes',
                                ],
                            ],
                            'az' => ['sentence' => 'seçmək bir portağal', 'correct' => ['seçmək', 'bir', 'portağal'], 'extra' => ['almaq', 'üzüm']],
                            'ar' => ['sentence' => 'الاختيار برتقالة', 'correct' => ['الاختيار', 'برتقالة'], 'extra' => ['الشراء', 'عنب']],
                            'ru' => ['sentence' => 'выбрать апельсин', 'correct' => ['выбрать', 'апельсин'], 'extra' => ['купить', 'виноград']],
                            'de' => [
                                'sentence' => 'Eine Orange wählen',
                                'correct' => [
                                    'eine',
                                    'Orange',
                                    'wählen',
                                ],
                                'extra' => [
                                    'kaufen',
                                    'Trauben',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Choisir une orange',
                                'correct' => [
                                    'choisir',
                                    'une',
                                    'orange',
                                ],
                                'extra' => [
                                    'acheter',
                                    'raisin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'オレンジを選ぶ',
                                'correct' => [
                                    'オレンジ',
                                    'を',
                                    '選ぶ',
                                ],
                                'extra' => [
                                    '買う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오렌지를 고르다',
                                'correct' => [
                                    '오렌지를',
                                    '고르다',
                                ],
                                'extra' => [
                                    '사다',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir portakal seçmek', 'correct' => ['bir', 'portakal', 'seçmek'], 'extra' => ['almak', 'üzüm']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Comprar',
                            'las',
                            'uvas',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to buy the grapes',
                                'correct' => [
                                    'to buy',
                                    'the',
                                    'grapes',
                                ],
                                'extra' => [
                                    'to choose',
                                    'orange',
                                ],
                            ],
                            'az' => ['sentence' => 'almaq üzüm', 'correct' => ['almaq', 'üzüm'], 'extra' => ['seçmək', 'portağal']],
                            'ar' => ['sentence' => 'الشراء عنب', 'correct' => ['الشراء', 'عنب'], 'extra' => ['الاختيار', 'برتقالة']],
                            'ru' => ['sentence' => 'купить виноград', 'correct' => ['купить', 'виноград'], 'extra' => ['выбрать', 'апельсин']],
                            'de' => [
                                'sentence' => 'Die Trauben kaufen',
                                'correct' => [
                                    'die',
                                    'Trauben',
                                    'kaufen',
                                ],
                                'extra' => [
                                    'wählen',
                                    'Orange',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter le raisin',
                                'correct' => [
                                    'acheter',
                                    'le',
                                    'raisin',
                                ],
                                'extra' => [
                                    'choisir',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ぶどうを買う',
                                'correct' => [
                                    'ぶどう',
                                    'を',
                                    '買う',
                                ],
                                'extra' => [
                                    '選ぶ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '포도를 사다',
                                'correct' => [
                                    '포도를',
                                    '사다',
                                ],
                                'extra' => [
                                    '고르다',
                                ],
                            ],
                            'tr' => ['sentence' => 'üzümü almak', 'correct' => ['üzümü', 'almak'], 'extra' => ['seçmek', 'portakal']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Una',
                            'naranja',
                            'o',
                            'uvas',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an orange or grapes',
                                'correct' => [
                                    'an',
                                    'orange',
                                    'or',
                                    'grapes',
                                ],
                                'extra' => [
                                    'to buy',
                                ],
                            ],
                            'az' => ['sentence' => 'bir portağal və ya üzüm', 'correct' => ['bir', 'portağal', 'və ya', 'üzüm'], 'extra' => ['almaq']],
                            'ar' => ['sentence' => 'برتقالة أو عنب', 'correct' => ['برتقالة', 'أو', 'عنب'], 'extra' => ['الشراء']],
                            'ru' => ['sentence' => 'апельсин или виноград', 'correct' => ['апельсин', 'или', 'виноград'], 'extra' => ['купить']],
                            'de' => [
                                'sentence' => 'Eine Orange oder Trauben',
                                'correct' => [
                                    'eine',
                                    'Orange',
                                    'oder',
                                    'Trauben',
                                ],
                                'extra' => [
                                    'kaufen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une orange ou du raisin',
                                'correct' => [
                                    'une',
                                    'orange',
                                    'ou',
                                    'raisin',
                                ],
                                'extra' => [
                                    'acheter',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'オレンジかぶどう',
                                'correct' => [
                                    'オレンジ',
                                    'か',
                                    'ぶどう',
                                ],
                                'extra' => [
                                    '買う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오렌지 또는 포도',
                                'correct' => [
                                    '오렌지',
                                    '또는',
                                    '포도',
                                ],
                                'extra' => [
                                    '사다',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir portakal veya üzüm', 'correct' => ['bir', 'portakal', 'veya', 'üzüm'], 'extra' => ['almak']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Manzana y Naranja', 3,
                pictures: [
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                    [
                        'es' => 'naranja',
                        'img' => 'orange',
                    ],
                ],
                plain: [
                    [
                        'es' => 'comparar',
                    ],
                    [
                        'es' => 'mejor',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Comparar',
                            'las',
                            'frutas',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to compare the fruits',
                                'correct' => [
                                    'to compare',
                                    'the',
                                    'fruits',
                                ],
                                'extra' => [
                                    'better',
                                    'apple',
                                ],
                            ],
                            'az' => ['sentence' => 'müqayisə etmək meyvələr', 'correct' => ['müqayisə etmək', 'meyvələr'], 'extra' => ['daha yaxşı', 'alma']],
                            'ar' => ['sentence' => 'المقارنة فواكه', 'correct' => ['المقارنة', 'فواكه'], 'extra' => ['أحسن', 'تفاحة']],
                            'ru' => ['sentence' => 'сравнить фрукты', 'correct' => ['сравнить', 'фрукты'], 'extra' => ['лучше', 'яблоко']],
                            'de' => [
                                'sentence' => 'Die Früchte vergleichen',
                                'correct' => [
                                    'die',
                                    'Früchte',
                                    'vergleichen',
                                ],
                                'extra' => [
                                    'besser',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Comparer les fruits',
                                'correct' => [
                                    'comparer',
                                    'les',
                                    'fruits',
                                ],
                                'extra' => [
                                    'meilleur',
                                    'pomme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '果物を比べる',
                                'correct' => [
                                    '果物',
                                    'を',
                                    '比べる',
                                ],
                                'extra' => [
                                    'もっと良い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '과일을 비교하다',
                                'correct' => [
                                    '과일을',
                                    '비교하다',
                                ],
                                'extra' => [
                                    '더 좋은',
                                ],
                            ],
                            'tr' => ['sentence' => 'meyveleri karşılaştırmak', 'correct' => ['meyveleri', 'karşılaştırmak'], 'extra' => ['daha iyi', 'elma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'manzana',
                            'es',
                            'mejor',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the apple is better',
                                'correct' => [
                                    'the',
                                    'apple',
                                    'is',
                                    'better',
                                ],
                                'extra' => [
                                    'to compare',
                                    'orange',
                                ],
                            ],
                            'az' => ['sentence' => 'alma daha yaxşı', 'correct' => ['alma', 'daha yaxşı'], 'extra' => ['müqayisə etmək', 'portağal']],
                            'ar' => ['sentence' => 'تفاحة أحسن', 'correct' => ['تفاحة', 'أحسن'], 'extra' => ['المقارنة', 'برتقالة']],
                            'ru' => ['sentence' => 'яблоко лучше', 'correct' => ['яблоко', 'лучше'], 'extra' => ['сравнить', 'апельсин']],
                            'de' => [
                                'sentence' => 'Der Apfel ist besser',
                                'correct' => [
                                    'der',
                                    'Apfel',
                                    'ist',
                                    'besser',
                                ],
                                'extra' => [
                                    'vergleichen',
                                    'Orange',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La pomme est meilleure',
                                'correct' => [
                                    'la',
                                    'pomme',
                                    'est',
                                    'meilleur',
                                ],
                                'extra' => [
                                    'comparer',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごの方が良い',
                                'correct' => [
                                    'りんご',
                                    'の',
                                    '方',
                                    'が',
                                    '良い',
                                ],
                                'extra' => [
                                    '比べる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과가 더 좋다',
                                'correct' => [
                                    '사과가',
                                    '더',
                                    '좋다',
                                ],
                                'extra' => [
                                    '비교하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'elma daha iyi', 'correct' => ['elma', 'daha', 'iyi'], 'extra' => ['karşılaştırmak', 'portakal']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Comparar',
                            'una',
                            'manzana',
                            'y',
                            'una',
                            'naranja',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to compare an apple and an orange',
                                'correct' => [
                                    'to compare',
                                    'an',
                                    'apple',
                                    'and',
                                    'an',
                                    'orange',
                                ],
                                'extra' => [
                                    'better',
                                ],
                            ],
                            'az' => ['sentence' => 'müqayisə etmək bir alma və bir portağal', 'correct' => ['müqayisə etmək', 'bir', 'alma', 'və', 'bir', 'portağal'], 'extra' => ['daha yaxşı']],
                            'ar' => ['sentence' => 'المقارنة تفاحة و برتقالة', 'correct' => ['المقارنة', 'تفاحة', 'و', 'برتقالة'], 'extra' => ['أحسن']],
                            'ru' => ['sentence' => 'сравнить яблоко и апельсин', 'correct' => ['сравнить', 'яблоко', 'и', 'апельсин'], 'extra' => ['лучше']],
                            'de' => [
                                'sentence' => 'Einen Apfel und eine Orange vergleichen',
                                'correct' => [
                                    'einen',
                                    'Apfel',
                                    'und',
                                    'eine',
                                    'Orange',
                                    'vergleichen',
                                ],
                                'extra' => [
                                    'besser',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Comparer une pomme et une orange',
                                'correct' => [
                                    'comparer',
                                    'une',
                                    'pomme',
                                    'et',
                                    'une',
                                    'orange',
                                ],
                                'extra' => [
                                    'meilleur',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごとオレンジを比べる',
                                'correct' => [
                                    'りんご',
                                    'と',
                                    'オレンジ',
                                    'を',
                                    '比べる',
                                ],
                                'extra' => [
                                    'もっと良い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과와 오렌지를 비교하다',
                                'correct' => [
                                    '사과와',
                                    '오렌지를',
                                    '비교하다',
                                ],
                                'extra' => [
                                    '더 좋은',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir elma ve bir portakal karşılaştırmak', 'correct' => ['bir', 'elma', 've', 'bir', 'portakal', 'karşılaştırmak'], 'extra' => ['daha iyi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Uvas y Plátano', 4,
                pictures: [
                    [
                        'es' => 'uvas',
                        'img' => 'grapes',
                    ],
                    [
                        'es' => 'plátano',
                        'img' => 'banana',
                    ],
                ],
                plain: [
                    [
                        'es' => 'gramo',
                    ],
                    [
                        'es' => 'ligero',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Las',
                            'uvas',
                            'son',
                            'ligeras',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the grapes are light',
                                'correct' => [
                                    'the',
                                    'grapes',
                                    'are',
                                    'light',
                                ],
                                'extra' => [
                                    'gram',
                                    'banana',
                                ],
                            ],
                            'az' => ['sentence' => 'üzüm yüngül', 'correct' => ['üzüm', 'yüngül'], 'extra' => ['qram', 'banan']],
                            'ar' => ['sentence' => 'عنب خفيف', 'correct' => ['عنب', 'خفيف'], 'extra' => ['غرام', 'موزة']],
                            'ru' => ['sentence' => 'виноград лёгкий', 'correct' => ['виноград', 'лёгкий'], 'extra' => ['грамм', 'банан']],
                            'de' => [
                                'sentence' => 'Die Trauben sind leicht',
                                'correct' => [
                                    'die',
                                    'Trauben',
                                    'sind',
                                    'leicht',
                                ],
                                'extra' => [
                                    'Gramm',
                                    'Banane',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le raisin est léger',
                                'correct' => [
                                    'le',
                                    'raisin',
                                    'est',
                                    'léger',
                                ],
                                'extra' => [
                                    'gramme',
                                    'banane',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ぶどうは軽いです',
                                'correct' => [
                                    'ぶどう',
                                    'は',
                                    '軽い',
                                    'です',
                                ],
                                'extra' => [
                                    'グラム',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '포도는 가볍습니다',
                                'correct' => [
                                    '포도는',
                                    '가볍습니다',
                                ],
                                'extra' => [
                                    '그램',
                                ],
                            ],
                            'tr' => ['sentence' => 'üzüm hafif', 'correct' => ['üzüm', 'hafif'], 'extra' => ['gram', 'muz']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Un',
                            'gramo',
                            'de',
                            'frutas',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a gram of fruits',
                                'correct' => [
                                    'a',
                                    'gram',
                                    'of',
                                    'fruits',
                                ],
                                'extra' => [
                                    'light',
                                    'grapes',
                                ],
                            ],
                            'az' => ['sentence' => 'bir qram meyvələr', 'correct' => ['bir', 'qram', 'meyvələr'], 'extra' => ['yüngül', 'üzüm']],
                            'ar' => ['sentence' => 'غرام فواكه', 'correct' => ['غرام', 'فواكه'], 'extra' => ['خفيف', 'عنب']],
                            'ru' => ['sentence' => 'грамм фрукты', 'correct' => ['грамм', 'фрукты'], 'extra' => ['лёгкий', 'виноград']],
                            'de' => [
                                'sentence' => 'Ein Gramm Früchte',
                                'correct' => [
                                    'ein',
                                    'Gramm',
                                    'von',
                                    'Früchte',
                                ],
                                'extra' => [
                                    'leicht',
                                    'Trauben',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gramme de fruits',
                                'correct' => [
                                    'un',
                                    'gramme',
                                    'de',
                                    'fruits',
                                ],
                                'extra' => [
                                    'léger',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '果物一グラム',
                                'correct' => [
                                    '果物',
                                    '一',
                                    'グラム',
                                ],
                                'extra' => [
                                    '軽い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '과일 일 그램',
                                'correct' => [
                                    '과일',
                                    '일',
                                    '그램',
                                ],
                                'extra' => [
                                    '가벼운',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir gram meyve', 'correct' => ['bir', 'gram', 'meyve'], 'extra' => ['hafif', 'üzüm']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Un',
                            'gramo',
                            'de',
                            'plátano',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a gram of banana',
                                'correct' => [
                                    'a',
                                    'gram',
                                    'of',
                                    'banana',
                                ],
                                'extra' => [
                                    'light',
                                    'grapes',
                                ],
                            ],
                            'az' => ['sentence' => 'bir qram banan', 'correct' => ['bir', 'qram', 'banan'], 'extra' => ['yüngül', 'üzüm']],
                            'ar' => ['sentence' => 'غرام موزة', 'correct' => ['غرام', 'موزة'], 'extra' => ['خفيف', 'عنب']],
                            'ru' => ['sentence' => 'грамм банан', 'correct' => ['грамм', 'банан'], 'extra' => ['лёгкий', 'виноград']],
                            'de' => [
                                'sentence' => 'Ein Gramm Banane',
                                'correct' => [
                                    'ein',
                                    'Gramm',
                                    'von',
                                    'Banane',
                                ],
                                'extra' => [
                                    'leicht',
                                    'Trauben',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gramme de banane',
                                'correct' => [
                                    'un',
                                    'gramme',
                                    'de',
                                    'banane',
                                ],
                                'extra' => [
                                    'léger',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'バナナ一グラム',
                                'correct' => [
                                    'バナナ',
                                    '一',
                                    'グラム',
                                ],
                                'extra' => [
                                    '軽い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '바나나 일 그램',
                                'correct' => [
                                    '바나나',
                                    '일',
                                    '그램',
                                ],
                                'extra' => [
                                    '가벼운',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir gram muz', 'correct' => ['bir', 'gram', 'muz'], 'extra' => ['hafif', 'üzüm']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Cesta y Manzana', 5,
                pictures: [
                    [
                        'es' => 'cesta',
                        'img' => 'basket',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'poner',
                    ],
                    [
                        'es' => 'más',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Poner',
                            'una',
                            'manzana',
                            'en',
                            'la',
                            'cesta',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put an apple in the basket',
                                'correct' => [
                                    'to put',
                                    'an',
                                    'apple',
                                    'in',
                                    'the',
                                    'basket',
                                ],
                                'extra' => [
                                    'more',
                                ],
                            ],
                            'az' => ['sentence' => 'qoymaq bir alma içində səbət', 'correct' => ['qoymaq', 'bir', 'alma', 'içində', 'səbət'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'وضع تفاحة في سلة', 'correct' => ['وضع', 'تفاحة', 'في', 'سلة'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'положить яблоко в корзина', 'correct' => ['положить', 'яблоко', 'в', 'корзина'], 'extra' => ['больше']],
                            'de' => [
                                'sentence' => 'Einen Apfel in den Korb legen',
                                'correct' => [
                                    'einen',
                                    'Apfel',
                                    'in',
                                    'den',
                                    'Korb',
                                    'legen',
                                ],
                                'extra' => [
                                    'mehr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre une pomme dans le panier',
                                'correct' => [
                                    'mettre',
                                    'une',
                                    'pomme',
                                    'dans',
                                    'le',
                                    'panier',
                                ],
                                'extra' => [
                                    'plus',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごをかごに入れる',
                                'correct' => [
                                    'りんご',
                                    'を',
                                    'かご',
                                    'に',
                                    '入れる',
                                ],
                                'extra' => [
                                    'もっと',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과를 바구니에 넣다',
                                'correct' => [
                                    '사과를',
                                    '바구니에',
                                    '넣다',
                                ],
                                'extra' => [
                                    '더',
                                ],
                            ],
                            'tr' => ['sentence' => 'sepete bir elma koymak', 'correct' => ['sepete', 'bir', 'elma', 'koymak'], 'extra' => ['daha çok']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Más',
                            'frutas',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'more fruits',
                                'correct' => [
                                    'more',
                                    'fruits',
                                ],
                                'extra' => [
                                    'to put',
                                    'basket',
                                ],
                            ],
                            'az' => ['sentence' => 'daha meyvələr', 'correct' => ['daha', 'meyvələr'], 'extra' => ['qoymaq', 'səbət']],
                            'ar' => ['sentence' => 'أكثر فواكه', 'correct' => ['أكثر', 'فواكه'], 'extra' => ['وضع', 'سلة']],
                            'ru' => ['sentence' => 'больше фрукты', 'correct' => ['больше', 'фрукты'], 'extra' => ['положить', 'корзина']],
                            'de' => [
                                'sentence' => 'Mehr Früchte',
                                'correct' => [
                                    'mehr',
                                    'Früchte',
                                ],
                                'extra' => [
                                    'legen',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Plus de fruits',
                                'correct' => [
                                    'plus',
                                    'fruits',
                                ],
                                'extra' => [
                                    'mettre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'もっと果物',
                                'correct' => [
                                    'もっと',
                                    '果物',
                                ],
                                'extra' => [
                                    '入れる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '더 많은 과일',
                                'correct' => [
                                    '더',
                                    '많은',
                                    '과일',
                                ],
                                'extra' => [
                                    '넣다',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha çok meyve', 'correct' => ['daha', 'çok', 'meyve'], 'extra' => ['koymak', 'sepet']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Poner',
                            'más',
                            'frutas',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put more fruits',
                                'correct' => [
                                    'to put',
                                    'more',
                                    'fruits',
                                ],
                                'extra' => [
                                    'apple',
                                    'basket',
                                ],
                            ],
                            'az' => ['sentence' => 'qoymaq daha meyvələr', 'correct' => ['qoymaq', 'daha', 'meyvələr'], 'extra' => ['alma', 'səbət']],
                            'ar' => ['sentence' => 'وضع أكثر فواكه', 'correct' => ['وضع', 'أكثر', 'فواكه'], 'extra' => ['تفاحة', 'سلة']],
                            'ru' => ['sentence' => 'положить больше фрукты', 'correct' => ['положить', 'больше', 'фрукты'], 'extra' => ['яблоко', 'корзина']],
                            'de' => [
                                'sentence' => 'Mehr Früchte legen',
                                'correct' => [
                                    'mehr',
                                    'Früchte',
                                    'legen',
                                ],
                                'extra' => [
                                    'Apfel',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre plus de fruits',
                                'correct' => [
                                    'mettre',
                                    'plus',
                                    'fruits',
                                ],
                                'extra' => [
                                    'pomme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'もっと果物を入れる',
                                'correct' => [
                                    'もっと',
                                    '果物',
                                    'を',
                                    '入れる',
                                ],
                                'extra' => [
                                    'りんご',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '더 많은 과일을 넣다',
                                'correct' => [
                                    '더',
                                    '많은',
                                    '과일을',
                                    '넣다',
                                ],
                                'extra' => [
                                    '사과',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha çok meyve koymak', 'correct' => ['daha', 'çok', 'meyve', 'koymak'], 'extra' => ['elma', 'sepet']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
