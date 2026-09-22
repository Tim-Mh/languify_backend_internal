<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket10Seeder extends Seeder
{
    private const PICTURES = [
        'Liste' => 'list',
        'Einkaufswagen' => 'cart',
        'Zucker' => 'sugar',
        'Reis' => 'rice',
        'Milch' => 'milk',
        'Brot' => 'bread',
        'Apfel' => 'apple',
        'Kasse' => 'checkout',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 10, the German twin of the
     * English "Unit 10: A Whole Shopping Trip" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Einheit 10: Ein ganzer Einkauf', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Liste & Milch', 1,
                pictures: [
                    [
                        'de' => 'Liste',
                        'img' => 'list',
                    ],
                    [
                        'de' => 'Milch',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich brauche',
                    ],
                    [
                        'de' => 'kaufen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'brauche',
                            'Milch',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need milk',
                                'correct' => [
                                    'I need',
                                    'milk',
                                ],
                                'extra' => [
                                    'to buy',
                                    'list',
                                ],
                            ],
                            'az' => ['sentence' => 'lazımdır süd', 'correct' => ['lazımdır', 'süd'], 'extra' => ['almaq', 'siyahı']],
                            'ar' => ['sentence' => 'أحتاج حليب', 'correct' => ['أحتاج', 'حليب'], 'extra' => ['الشراء', 'قائمة']],
                            'ru' => ['sentence' => 'мне нужно молоко', 'correct' => ['мне нужно', 'молоко'], 'extra' => ['купить', 'список']],
                            'es' => [
                                'sentence' => 'Necesito leche',
                                'correct' => [
                                    'necesito',
                                    'leche',
                                ],
                                'extra' => [
                                    'comprar',
                                    'lista',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de lait',
                                'correct' => [
                                    'j\'ai besoin',
                                    'lait',
                                ],
                                'extra' => [
                                    'acheter',
                                    'liste',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '牛乳が必要です',
                                'correct' => [
                                    '牛乳',
                                    'が',
                                    '必要です',
                                ],
                                'extra' => [
                                    '買う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유가 필요합니다',
                                'correct' => [
                                    '우유가',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '사다',
                                ],
                            ],
                            'tr' => ['sentence' => 'süte ihtiyacım var', 'correct' => ['süte', 'ihtiyacım', 'var'], 'extra' => ['almak', 'liste']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mit',
                            'meiner',
                            'Liste',
                            'kaufen',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'buy with my list',
                                'correct' => [
                                    'buy',
                                    'with',
                                    'my',
                                    'list',
                                ],
                                'extra' => [
                                    'I need',
                                    'milk',
                                ],
                            ],
                            'az' => ['sentence' => 'al ilə mənim siyahı', 'correct' => ['al', 'ilə', 'mənim', 'siyahı'], 'extra' => ['lazımdır', 'süd']],
                            'ar' => ['sentence' => 'اشتر مع قائمة', 'correct' => ['اشتر', 'مع', 'قائمة'], 'extra' => ['أحتاج', 'حليب']],
                            'ru' => ['sentence' => 'купи с мой список', 'correct' => ['купи', 'с', 'мой', 'список'], 'extra' => ['мне нужно', 'молоко']],
                            'es' => [
                                'sentence' => 'Comprar con mi lista',
                                'correct' => [
                                    'comprar',
                                    'con',
                                    'mi',
                                    'lista',
                                ],
                                'extra' => [
                                    'necesito',
                                    'leche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Acheter avec ma liste',
                                'correct' => [
                                    'acheter',
                                    'avec',
                                    'ma',
                                    'liste',
                                ],
                                'extra' => [
                                    'j\'ai besoin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私のリストで買う',
                                'correct' => [
                                    '私の',
                                    'リスト',
                                    'で',
                                    '買う',
                                ],
                                'extra' => [
                                    '必要です',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 목록으로 사다',
                                'correct' => [
                                    '제',
                                    '목록으로',
                                    '사다',
                                ],
                                'extra' => [
                                    '필요합니다',
                                ],
                            ],
                            'tr' => ['sentence' => 'listemle al', 'correct' => ['listemle', 'al'], 'extra' => ['ihtiyacım var', 'süt']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ich',
                            'brauche',
                            'meine',
                            'Liste',
                            'zum',
                            'Kaufen',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I need my list to buy',
                                'correct' => [
                                    'I need',
                                    'my',
                                    'list',
                                    'to',
                                    'buy',
                                ],
                                'extra' => [
                                    'milk',
                                ],
                            ],
                            'az' => ['sentence' => 'lazımdır mənim siyahı al', 'correct' => ['lazımdır', 'mənim', 'siyahı', 'al'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'أحتاج قائمة إلى اشتر', 'correct' => ['أحتاج', 'قائمة', 'إلى', 'اشتر'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'мне нужно мой список в купи', 'correct' => ['мне нужно', 'мой', 'список', 'в', 'купи'], 'extra' => ['молоко']],
                            'es' => [
                                'sentence' => 'Necesito mi lista para comprar',
                                'correct' => [
                                    'necesito',
                                    'mi',
                                    'lista',
                                    'para',
                                    'comprar',
                                ],
                                'extra' => [
                                    'leche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'ai besoin de ma liste pour acheter',
                                'correct' => [
                                    'j\'ai besoin',
                                    'ma',
                                    'liste',
                                    'à',
                                    'acheter',
                                ],
                                'extra' => [
                                    'lait',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '買うために私のリストが必要です',
                                'correct' => [
                                    '買う',
                                    'ため',
                                    'に',
                                    '私の',
                                    'リスト',
                                    'が',
                                    '必要です',
                                ],
                                'extra' => [
                                    '牛乳',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사기 위해 제 목록이 필요합니다',
                                'correct' => [
                                    '사기',
                                    '위해',
                                    '제',
                                    '목록이',
                                    '필요합니다',
                                ],
                                'extra' => [
                                    '우유',
                                ],
                            ],
                            'tr' => ['sentence' => 'almak için listeme ihtiyacım var', 'correct' => ['almak', 'için', 'listeme', 'ihtiyacım', 'var'], 'extra' => ['süt']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Einkaufswagen & Reis', 2,
                pictures: [
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                    [
                        'de' => 'Reis',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'de' => 'legen',
                    ],
                    [
                        'de' => 'Kilo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Kilo',
                            'Reis',
                            'legen',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put a kilo of rice',
                                'correct' => [
                                    'to put',
                                    'a',
                                    'kilo',
                                    'of',
                                    'rice',
                                ],
                                'extra' => [
                                    'trolley',
                                ],
                            ],
                            'az' => ['sentence' => 'qoymaq bir kilo düyü', 'correct' => ['qoymaq', 'bir', 'kilo', 'düyü'], 'extra' => ['araba']],
                            'ar' => ['sentence' => 'وضع كيلو أرز', 'correct' => ['وضع', 'كيلو', 'أرز'], 'extra' => ['عربة']],
                            'ru' => ['sentence' => 'положить кило рис', 'correct' => ['положить', 'кило', 'рис'], 'extra' => ['тележка']],
                            'es' => [
                                'sentence' => 'Poner un kilo de arroz',
                                'correct' => [
                                    'poner',
                                    'un',
                                    'kilo',
                                    'de',
                                    'arroz',
                                ],
                                'extra' => [
                                    'carrito',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre un kilo de riz',
                                'correct' => [
                                    'mettre',
                                    'un',
                                    'kilo',
                                    'de',
                                    'riz',
                                ],
                                'extra' => [
                                    'chariot',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯一キロを入れる',
                                'correct' => [
                                    'ご飯',
                                    '一',
                                    'キロ',
                                    'を',
                                    '入れる',
                                ],
                                'extra' => [
                                    'カート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥 일 킬로를 넣다',
                                'correct' => [
                                    '밥',
                                    '일',
                                    '킬로를',
                                    '넣다',
                                ],
                                'extra' => [
                                    '카트',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kilo pirinç koymak', 'correct' => ['bir', 'kilo', 'pirinç', 'koymak'], 'extra' => ['araba']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Einkaufswagen',
                            'ist',
                            'voll',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the trolley is full',
                                'correct' => [
                                    'the',
                                    'trolley',
                                    'is',
                                    'full',
                                ],
                                'extra' => [
                                    'to put',
                                    'kilo',
                                ],
                            ],
                            'az' => ['sentence' => 'araba dolu', 'correct' => ['araba', 'dolu'], 'extra' => ['qoymaq', 'kilo']],
                            'ar' => ['sentence' => 'عربة ممتلئ', 'correct' => ['عربة', 'ممتلئ'], 'extra' => ['وضع', 'كيلو']],
                            'ru' => ['sentence' => 'тележка полный', 'correct' => ['тележка', 'полный'], 'extra' => ['положить', 'кило']],
                            'es' => [
                                'sentence' => 'El carrito está lleno',
                                'correct' => [
                                    'el',
                                    'carrito',
                                    'está',
                                    'lleno',
                                ],
                                'extra' => [
                                    'poner',
                                    'kilo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chariot est plein',
                                'correct' => [
                                    'le',
                                    'chariot',
                                    'est',
                                    'plein',
                                ],
                                'extra' => [
                                    'mettre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートはいっぱいです',
                                'correct' => [
                                    'カート',
                                    'は',
                                    'いっぱい',
                                    'です',
                                ],
                                'extra' => [
                                    '入れる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트는 가득합니다',
                                'correct' => [
                                    '카트는',
                                    '가득합니다',
                                ],
                                'extra' => [
                                    '넣다',
                                ],
                            ],
                            'tr' => ['sentence' => 'araba dolu', 'correct' => ['araba', 'dolu'], 'extra' => ['koymak', 'kilo']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Den',
                            'Reis',
                            'in',
                            'den',
                            'Einkaufswagen',
                            'legen',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to put the rice in the trolley',
                                'correct' => [
                                    'to put',
                                    'the',
                                    'rice',
                                    'in',
                                    'the',
                                    'trolley',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'az' => ['sentence' => 'qoymaq düyü içində araba', 'correct' => ['qoymaq', 'düyü', 'içində', 'araba'], 'extra' => ['kilo']],
                            'ar' => ['sentence' => 'وضع أرز في عربة', 'correct' => ['وضع', 'أرز', 'في', 'عربة'], 'extra' => ['كيلو']],
                            'ru' => ['sentence' => 'положить рис в тележка', 'correct' => ['положить', 'рис', 'в', 'тележка'], 'extra' => ['кило']],
                            'es' => [
                                'sentence' => 'Poner el arroz en el carrito',
                                'correct' => [
                                    'poner',
                                    'el',
                                    'arroz',
                                    'en',
                                    'el',
                                    'carrito',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mettre le riz dans le chariot',
                                'correct' => [
                                    'mettre',
                                    'le',
                                    'riz',
                                    'dans',
                                    'le',
                                    'chariot',
                                ],
                                'extra' => [
                                    'kilo',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯をカートに入れる',
                                'correct' => [
                                    'ご飯',
                                    'を',
                                    'カート',
                                    'に',
                                    '入れる',
                                ],
                                'extra' => [
                                    'キロ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥을 카트에 넣다',
                                'correct' => [
                                    '밥을',
                                    '카트에',
                                    '넣다',
                                ],
                                'extra' => [
                                    '킬로',
                                ],
                            ],
                            'tr' => ['sentence' => 'pirinci arabaya koymak', 'correct' => ['pirinci', 'arabaya', 'koymak'], 'extra' => ['kilo']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Zucker & Brot', 3,
                pictures: [
                    [
                        'de' => 'Zucker',
                        'img' => 'sugar',
                    ],
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Bäckerei',
                    ],
                    [
                        'de' => 'frisch',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Etwas',
                            'frisches',
                            'Brot',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some fresh bread',
                                'correct' => [
                                    'some',
                                    'fresh',
                                    'bread',
                                ],
                                'extra' => [
                                    'bakery',
                                    'sugar',
                                ],
                            ],
                            'az' => ['sentence' => 'bir az təzə çörək', 'correct' => ['bir az', 'təzə', 'çörək'], 'extra' => ['çörəkxana', 'şəkər']],
                            'ar' => ['sentence' => 'بعض طازج خبز', 'correct' => ['بعض', 'طازج', 'خبز'], 'extra' => ['مخبز', 'سكر']],
                            'ru' => ['sentence' => 'немного свежий хлеб', 'correct' => ['немного', 'свежий', 'хлеб'], 'extra' => ['пекарня', 'сахар']],
                            'es' => [
                                'sentence' => 'Algo de pan fresco',
                                'correct' => [
                                    'algo de',
                                    'pan',
                                    'fresco',
                                ],
                                'extra' => [
                                    'panadería',
                                    'azúcar',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain frais',
                                'correct' => [
                                    'du',
                                    'pain',
                                    'frais',
                                ],
                                'extra' => [
                                    'boulangerie',
                                    'sucre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '新鮮なパン',
                                'correct' => [
                                    '新鮮な',
                                    'パン',
                                ],
                                'extra' => [
                                    'パン屋',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '신선한 빵',
                                'correct' => [
                                    '신선한',
                                    '빵',
                                ],
                                'extra' => [
                                    '빵집',
                                ],
                            ],
                            'tr' => ['sentence' => 'biraz taze ekmek', 'correct' => ['biraz', 'taze', 'ekmek'], 'extra' => ['fırın', 'şeker']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Etwas',
                            'Zucker',
                            'aus',
                            'der',
                            'Bäckerei',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some sugar from the bakery',
                                'correct' => [
                                    'some',
                                    'sugar',
                                    'from',
                                    'the',
                                    'bakery',
                                ],
                                'extra' => [
                                    'fresh',
                                    'bread',
                                ],
                            ],
                            'az' => ['sentence' => 'bir az şəkər dan çörəkxana', 'correct' => ['bir az', 'şəkər', 'dan', 'çörəkxana'], 'extra' => ['təzə', 'çörək']],
                            'ar' => ['sentence' => 'بعض سكر من مخبز', 'correct' => ['بعض', 'سكر', 'من', 'مخبز'], 'extra' => ['طازج', 'خبز']],
                            'ru' => ['sentence' => 'немного сахар из пекарня', 'correct' => ['немного', 'сахар', 'из', 'пекарня'], 'extra' => ['свежий', 'хлеб']],
                            'es' => [
                                'sentence' => 'Algo de azúcar de la panadería',
                                'correct' => [
                                    'algo de',
                                    'azúcar',
                                    'de',
                                    'la',
                                    'panadería',
                                ],
                                'extra' => [
                                    'fresco',
                                    'pan',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du sucre de la boulangerie',
                                'correct' => [
                                    'du',
                                    'sucre',
                                    'de',
                                    'la',
                                    'boulangerie',
                                ],
                                'extra' => [
                                    'frais',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'パン屋の砂糖',
                                'correct' => [
                                    'パン屋',
                                    'の',
                                    '砂糖',
                                ],
                                'extra' => [
                                    '新鮮',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵집의 설탕',
                                'correct' => [
                                    '빵집의',
                                    '설탕',
                                ],
                                'extra' => [
                                    '신선한',
                                ],
                            ],
                            'tr' => ['sentence' => 'fırından biraz şeker', 'correct' => ['fırından', 'biraz', 'şeker'], 'extra' => ['taze', 'ekmek']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Frisches',
                            'Brot',
                            'aus',
                            'der',
                            'Bäckerei',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'fresh bread from the bakery',
                                'correct' => [
                                    'fresh',
                                    'bread',
                                    'from',
                                    'the',
                                    'bakery',
                                ],
                                'extra' => [
                                    'sugar',
                                ],
                            ],
                            'az' => ['sentence' => 'təzə çörək dan çörəkxana', 'correct' => ['təzə', 'çörək', 'dan', 'çörəkxana'], 'extra' => ['şəkər']],
                            'ar' => ['sentence' => 'طازج خبز من مخبز', 'correct' => ['طازج', 'خبز', 'من', 'مخبز'], 'extra' => ['سكر']],
                            'ru' => ['sentence' => 'свежий хлеб из пекарня', 'correct' => ['свежий', 'хлеб', 'из', 'пекарня'], 'extra' => ['сахар']],
                            'es' => [
                                'sentence' => 'Pan fresco de la panadería',
                                'correct' => [
                                    'pan',
                                    'fresco',
                                    'de',
                                    'la',
                                    'panadería',
                                ],
                                'extra' => [
                                    'azúcar',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain frais de la boulangerie',
                                'correct' => [
                                    'frais',
                                    'pain',
                                    'de',
                                    'la',
                                    'boulangerie',
                                ],
                                'extra' => [
                                    'sucre',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'パン屋の新鮮なパン',
                                'correct' => [
                                    'パン屋',
                                    'の',
                                    '新鮮な',
                                    'パン',
                                ],
                                'extra' => [
                                    '砂糖',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵집의 신선한 빵',
                                'correct' => [
                                    '빵집의',
                                    '신선한',
                                    '빵',
                                ],
                                'extra' => [
                                    '설탕',
                                ],
                            ],
                            'tr' => ['sentence' => 'fırından taze ekmek', 'correct' => ['fırından', 'taze', 'ekmek'], 'extra' => ['şeker']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Kasse & Apfel', 4,
                pictures: [
                    [
                        'de' => 'Kasse',
                        'img' => 'checkout',
                    ],
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bezahlen',
                    ],
                    [
                        'de' => 'Quittung',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'An',
                            'der',
                            'Kasse',
                            'bezahlen',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay at the checkout',
                                'correct' => [
                                    'to pay',
                                    'at',
                                    'the',
                                    'checkout',
                                ],
                                'extra' => [
                                    'receipt',
                                    'apple',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək yanında kassa', 'correct' => ['ödəmək', 'yanında', 'kassa'], 'extra' => ['qəbz', 'alma']],
                            'ar' => ['sentence' => 'الدفع على صندوق الدفع', 'correct' => ['الدفع', 'على', 'صندوق الدفع'], 'extra' => ['إيصال', 'تفاحة']],
                            'ru' => ['sentence' => 'платить на касса', 'correct' => ['платить', 'на', 'касса'], 'extra' => ['чек', 'яблоко']],
                            'es' => [
                                'sentence' => 'Pagar en la caja',
                                'correct' => [
                                    'pagar',
                                    'en',
                                    'la',
                                    'caja',
                                ],
                                'extra' => [
                                    'recibo',
                                    'manzana',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer à la caisse',
                                'correct' => [
                                    'payer',
                                    'à',
                                    'la',
                                    'caisse',
                                ],
                                'extra' => [
                                    'reçu',
                                    'pomme',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'レジで払う',
                                'correct' => [
                                    'レジ',
                                    'で',
                                    '払う',
                                ],
                                'extra' => [
                                    'レシート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산대에서 지불하다',
                                'correct' => [
                                    '계산대에서',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '영수증',
                                ],
                            ],
                            'tr' => ['sentence' => 'kasada ödemek', 'correct' => ['kasada', 'ödemek'], 'extra' => ['fiş', 'elma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Die',
                            'Quittung',
                            'für',
                            'den',
                            'Apfel',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the receipt for the apple',
                                'correct' => [
                                    'the',
                                    'receipt',
                                    'for',
                                    'the',
                                    'apple',
                                ],
                                'extra' => [
                                    'pay',
                                ],
                            ],
                            'az' => ['sentence' => 'qəbz üçün alma', 'correct' => ['qəbz', 'üçün', 'alma'], 'extra' => ['ödə']],
                            'ar' => ['sentence' => 'إيصال لأجل تفاحة', 'correct' => ['إيصال', 'لأجل', 'تفاحة'], 'extra' => ['ادفع']],
                            'ru' => ['sentence' => 'чек для яблоко', 'correct' => ['чек', 'для', 'яблоко'], 'extra' => ['плати']],
                            'es' => [
                                'sentence' => 'El recibo por la manzana',
                                'correct' => [
                                    'el',
                                    'recibo',
                                    'para',
                                    'la',
                                    'manzana',
                                ],
                                'extra' => [
                                    'pagar',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le reçu pour la pomme',
                                'correct' => [
                                    'le',
                                    'reçu',
                                    'pour',
                                    'la',
                                    'pomme',
                                ],
                                'extra' => [
                                    'payer',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごのレシート',
                                'correct' => [
                                    'りんご',
                                    'の',
                                    'レシート',
                                ],
                                'extra' => [
                                    '払う',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과의 영수증',
                                'correct' => [
                                    '사과의',
                                    '영수증',
                                ],
                                'extra' => [
                                    '지불하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'elma için fiş', 'correct' => ['elma', 'için', 'fiş'], 'extra' => ['öde']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Für',
                            'den',
                            'Apfel',
                            'bezahlen',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to pay for the apple',
                                'correct' => [
                                    'to pay',
                                    'for',
                                    'the',
                                    'apple',
                                ],
                                'extra' => [
                                    'receipt',
                                ],
                            ],
                            'az' => ['sentence' => 'ödəmək üçün alma', 'correct' => ['ödəmək', 'üçün', 'alma'], 'extra' => ['qəbz']],
                            'ar' => ['sentence' => 'الدفع لأجل تفاحة', 'correct' => ['الدفع', 'لأجل', 'تفاحة'], 'extra' => ['إيصال']],
                            'ru' => ['sentence' => 'платить для яблоко', 'correct' => ['платить', 'для', 'яблоко'], 'extra' => ['чек']],
                            'es' => [
                                'sentence' => 'Pagar por la manzana',
                                'correct' => [
                                    'pagar',
                                    'para',
                                    'la',
                                    'manzana',
                                ],
                                'extra' => [
                                    'recibo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Payer la pomme',
                                'correct' => [
                                    'payer',
                                    'pour',
                                    'la',
                                    'pomme',
                                ],
                                'extra' => [
                                    'reçu',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'りんごの代金を払う',
                                'correct' => [
                                    'りんご',
                                    'の',
                                    '代金',
                                    'を',
                                    '払う',
                                ],
                                'extra' => [
                                    'レシート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과 값을 지불하다',
                                'correct' => [
                                    '사과',
                                    '값을',
                                    '지불하다',
                                ],
                                'extra' => [
                                    '영수증',
                                ],
                            ],
                            'tr' => ['sentence' => 'elmayı ödemek', 'correct' => ['elmayı', 'ödemek'], 'extra' => ['fiş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Einkaufswagen & Milch', 5,
                pictures: [
                    [
                        'de' => 'Einkaufswagen',
                        'img' => 'cart',
                    ],
                    [
                        'de' => 'Milch',
                        'img' => 'milk',
                    ],
                ],
                plain: [
                    [
                        'de' => 'tragen',
                    ],
                    [
                        'de' => 'Haus',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Milch',
                            'nach',
                            'Hause',
                            'tragen',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to carry the milk to the house',
                                'correct' => [
                                    'to carry',
                                    'the',
                                    'milk',
                                    'to',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'trolley',
                                ],
                            ],
                            'az' => ['sentence' => 'daşımaq süd ev', 'correct' => ['daşımaq', 'süd', 'ev'], 'extra' => ['araba']],
                            'ar' => ['sentence' => 'الحمل حليب إلى بيت', 'correct' => ['الحمل', 'حليب', 'إلى', 'بيت'], 'extra' => ['عربة']],
                            'ru' => ['sentence' => 'нести молоко в дом', 'correct' => ['нести', 'молоко', 'в', 'дом'], 'extra' => ['тележка']],
                            'es' => [
                                'sentence' => 'Llevar la leche a la casa',
                                'correct' => [
                                    'llevar',
                                    'la',
                                    'leche',
                                    'a',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'carrito',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Porter le lait à la maison',
                                'correct' => [
                                    'porter',
                                    'le',
                                    'lait',
                                    'à',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'chariot',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '牛乳を家に運ぶ',
                                'correct' => [
                                    '牛乳',
                                    'を',
                                    '家',
                                    'に',
                                    '運ぶ',
                                ],
                                'extra' => [
                                    'カート',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유를 집으로 나르다',
                                'correct' => [
                                    '우유를',
                                    '집으로',
                                    '나르다',
                                ],
                                'extra' => [
                                    '카트',
                                ],
                            ],
                            'tr' => ['sentence' => 'sütü eve taşımak', 'correct' => ['sütü', 'eve', 'taşımak'], 'extra' => ['araba']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Einkaufswagen',
                            'ist',
                            'beim',
                            'Haus',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the trolley is at the house',
                                'correct' => [
                                    'the',
                                    'trolley',
                                    'is',
                                    'at',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'to carry',
                                ],
                            ],
                            'az' => ['sentence' => 'araba yanında ev', 'correct' => ['araba', 'yanında', 'ev'], 'extra' => ['daşımaq']],
                            'ar' => ['sentence' => 'عربة على بيت', 'correct' => ['عربة', 'على', 'بيت'], 'extra' => ['الحمل']],
                            'ru' => ['sentence' => 'тележка на дом', 'correct' => ['тележка', 'на', 'дом'], 'extra' => ['нести']],
                            'es' => [
                                'sentence' => 'El carrito está en la casa',
                                'correct' => [
                                    'el',
                                    'carrito',
                                    'está',
                                    'en',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'llevar',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le chariot est à la maison',
                                'correct' => [
                                    'le',
                                    'chariot',
                                    'est',
                                    'à',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'porter',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートは家にあります',
                                'correct' => [
                                    'カート',
                                    'は',
                                    '家',
                                    'に',
                                    'あります',
                                ],
                                'extra' => [
                                    '運ぶ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트는 집에 있습니다',
                                'correct' => [
                                    '카트는',
                                    '집에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '나르다',
                                ],
                            ],
                            'tr' => ['sentence' => 'araba evde', 'correct' => ['araba', 'evde'], 'extra' => ['taşımak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Den',
                            'Einkaufswagen',
                            'nach',
                            'Hause',
                            'tragen',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to carry the trolley to the house',
                                'correct' => [
                                    'to carry',
                                    'the',
                                    'trolley',
                                    'to',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'milk',
                                ],
                            ],
                            'az' => ['sentence' => 'daşımaq araba ev', 'correct' => ['daşımaq', 'araba', 'ev'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'الحمل عربة إلى بيت', 'correct' => ['الحمل', 'عربة', 'إلى', 'بيت'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'нести тележка в дом', 'correct' => ['нести', 'тележка', 'в', 'дом'], 'extra' => ['молоко']],
                            'es' => [
                                'sentence' => 'Llevar el carrito a la casa',
                                'correct' => [
                                    'llevar',
                                    'el',
                                    'carrito',
                                    'a',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'leche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Porter le chariot à la maison',
                                'correct' => [
                                    'porter',
                                    'le',
                                    'chariot',
                                    'à',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'lait',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カートを家に運ぶ',
                                'correct' => [
                                    'カート',
                                    'を',
                                    '家',
                                    'に',
                                    '運ぶ',
                                ],
                                'extra' => [
                                    '牛乳',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '카트를 집으로 나르다',
                                'correct' => [
                                    '카트를',
                                    '집으로',
                                    '나르다',
                                ],
                                'extra' => [
                                    '우유',
                                ],
                            ],
                            'tr' => ['sentence' => 'arabayı eve taşımak', 'correct' => ['arabayı', 'eve', 'taşımak'], 'extra' => ['süt']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
