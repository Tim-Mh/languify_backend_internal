<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant06Seeder extends Seeder
{
    private const PICTURES = [
        'carne' => 'meat',
        'ensalada' => 'salad',
        'leche' => 'milk',
        'queso' => 'cheese',
        'pan' => 'bread',
        'sopa' => 'soup',
        'arroz' => 'rice',
        'pastel' => 'cake',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 6, the Spanish twin of the
     * English "Unit 6: Diet and Allergies" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unidad 6: Dieta y alergias', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Carne y Ensalada', 1,
                pictures: [
                    [
                        'es' => 'carne',
                        'img' => 'meat',
                    ],
                    [
                        'es' => 'ensalada',
                        'img' => 'salad',
                    ],
                ],
                plain: [
                    [
                        'es' => 'vegetariano',
                    ],
                    [
                        'es' => 'comer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Soy',
                            'vegetariano',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am vegetarian',
                                'correct' => [
                                    'I am',
                                    'vegetarian',
                                ],
                                'extra' => [
                                    'eat',
                                    'meat',
                                ],
                            ],
                            'az' => ['sentence' => 'mən vegetarian', 'correct' => ['mən', 'vegetarian'], 'extra' => ['yeyirəm', 'ət']],
                            'ar' => ['sentence' => 'أنا نباتي', 'correct' => ['أنا', 'نباتي'], 'extra' => ['آكل', 'لحم']],
                            'ru' => ['sentence' => 'я вегетарианец', 'correct' => ['я', 'вегетарианец'], 'extra' => ['ем', 'мясо']],
                            'de' => [
                                'sentence' => 'Ich bin Vegetarier',
                                'correct' => [
                                    'ich bin',
                                    'vegetarisch',
                                ],
                                'extra' => [
                                    'essen',
                                    'Fleisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis végétarien',
                                'correct' => [
                                    'je suis',
                                    'végétarien',
                                ],
                                'extra' => [
                                    'manger',
                                    'viande',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はベジタリアンです',
                                'correct' => [
                                    '私',
                                    'は',
                                    'ベジタリアン',
                                    'です',
                                ],
                                'extra' => [
                                    '食べる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 채식주의자입니다',
                                'correct' => [
                                    '저는',
                                    '채식주의자입니다',
                                ],
                                'extra' => [
                                    '먹다',
                                ],
                            ],
                            'tr' => ['sentence' => 'ben vejetaryenim', 'correct' => ['ben', 'vejetaryenim'], 'extra' => ['ye', 'et']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Comer',
                            'una',
                            'ensalada',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'eat a salad',
                                'correct' => [
                                    'eat',
                                    'a',
                                    'salad',
                                ],
                                'extra' => [
                                    'vegetarian',
                                    'meat',
                                ],
                            ],
                            'az' => ['sentence' => 'yeyirəm bir salat', 'correct' => ['yeyirəm', 'bir', 'salat'], 'extra' => ['vegetarian', 'ət']],
                            'ar' => ['sentence' => 'آكل سلطة', 'correct' => ['آكل', 'سلطة'], 'extra' => ['نباتي', 'لحم']],
                            'ru' => ['sentence' => 'ем салат', 'correct' => ['ем', 'салат'], 'extra' => ['вегетарианец', 'мясо']],
                            'de' => [
                                'sentence' => 'Einen Salat essen',
                                'correct' => [
                                    'einen',
                                    'Salat',
                                    'essen',
                                ],
                                'extra' => [
                                    'vegetarisch',
                                    'Fleisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Manger une salade',
                                'correct' => [
                                    'manger',
                                    'une',
                                    'salade',
                                ],
                                'extra' => [
                                    'végétarien',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'サラダを食べる',
                                'correct' => [
                                    'サラダ',
                                    'を',
                                    '食べる',
                                ],
                                'extra' => [
                                    'ベジタリアン',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '샐러드를 먹다',
                                'correct' => [
                                    '샐러드를',
                                    '먹다',
                                ],
                                'extra' => [
                                    '채식주의자',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir salata ye', 'correct' => ['bir', 'salata', 'ye'], 'extra' => ['vejetaryen', 'et']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Comer',
                            'sin',
                            'carne',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'eat without meat',
                                'correct' => [
                                    'eat',
                                    'without',
                                    'meat',
                                ],
                                'extra' => [
                                    'vegetarian',
                                    'salad',
                                ],
                            ],
                            'az' => ['sentence' => 'yeyirəm olmadan ət', 'correct' => ['yeyirəm', 'olmadan', 'ət'], 'extra' => ['vegetarian', 'salat']],
                            'ar' => ['sentence' => 'آكل بدون لحم', 'correct' => ['آكل', 'بدون', 'لحم'], 'extra' => ['نباتي', 'سلطة']],
                            'ru' => ['sentence' => 'ем без мясо', 'correct' => ['ем', 'без', 'мясо'], 'extra' => ['вегетарианец', 'салат']],
                            'de' => [
                                'sentence' => 'Ohne Fleisch essen',
                                'correct' => [
                                    'ohne',
                                    'Fleisch',
                                    'essen',
                                ],
                                'extra' => [
                                    'vegetarisch',
                                    'Salat',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Manger sans viande',
                                'correct' => [
                                    'manger',
                                    'sans',
                                    'viande',
                                ],
                                'extra' => [
                                    'salade',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '肉なしで食べる',
                                'correct' => [
                                    '肉',
                                    'なし',
                                    'で',
                                    '食べる',
                                ],
                                'extra' => [
                                    'サラダ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고기 없이 먹다',
                                'correct' => [
                                    '고기',
                                    '없이',
                                    '먹다',
                                ],
                                'extra' => [
                                    '샐러드',
                                ],
                            ],
                            'tr' => ['sentence' => 'etsiz ye', 'correct' => ['etsiz', 'ye'], 'extra' => ['vejetaryen', 'salata']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Leche y Queso', 2,
                pictures: [
                    [
                        'es' => 'leche',
                        'img' => 'milk',
                    ],
                    [
                        'es' => 'queso',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'es' => 'alérgico',
                    ],
                    [
                        'es' => 'alergia',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Soy',
                            'alérgico',
                            'a',
                            'la',
                            'leche',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am allergic to milk',
                                'correct' => [
                                    'I am',
                                    'allergic',
                                    'to',
                                    'milk',
                                ],
                                'extra' => [
                                    'allergy',
                                    'cheese',
                                ],
                            ],
                            'az' => ['sentence' => 'mən allergiya süd', 'correct' => ['mən', 'allergiya', 'süd'], 'extra' => ['pendir']],
                            'ar' => ['sentence' => 'أنا حساسية إلى حليب', 'correct' => ['أنا', 'حساسية', 'إلى', 'حليب'], 'extra' => ['جبن']],
                            'ru' => ['sentence' => 'я аллергия в молоко', 'correct' => ['я', 'аллергия', 'в', 'молоко'], 'extra' => ['сыр']],
                            'de' => [
                                'sentence' => 'Ich bin allergisch gegen Milch',
                                'correct' => [
                                    'ich bin',
                                    'allergisch',
                                    'zu',
                                    'Milch',
                                ],
                                'extra' => [
                                    'Allergie',
                                    'Käse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis allergique au lait',
                                'correct' => [
                                    'je suis',
                                    'allergique',
                                    'à',
                                    'lait',
                                ],
                                'extra' => [
                                    'allergie',
                                    'fromage',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は牛乳アレルギーです',
                                'correct' => [
                                    '私',
                                    'は',
                                    '牛乳',
                                    'アレルギー',
                                    'です',
                                ],
                                'extra' => [
                                    'チーズ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 우유 알레르기가 있습니다',
                                'correct' => [
                                    '저는',
                                    '우유',
                                    '알레르기가',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '치즈',
                                ],
                            ],
                            'tr' => ['sentence' => 'süte alerjim var', 'correct' => ['süte', 'alerjim', 'var'], 'extra' => ['alerji', 'peynir']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'alergia',
                            'al',
                            'queso',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an allergy to cheese',
                                'correct' => [
                                    'an',
                                    'allergy',
                                    'to',
                                    'cheese',
                                ],
                                'extra' => [
                                    'allergic',
                                    'milk',
                                ],
                            ],
                            'az' => ['sentence' => 'bir allergiya pendir', 'correct' => ['bir', 'allergiya', 'pendir'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'حساسية إلى جبن', 'correct' => ['حساسية', 'إلى', 'جبن'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'аллергия в сыр', 'correct' => ['аллергия', 'в', 'сыр'], 'extra' => ['молоко']],
                            'de' => [
                                'sentence' => 'Eine Allergie gegen Käse',
                                'correct' => [
                                    'eine',
                                    'Allergie',
                                    'zu',
                                    'Käse',
                                ],
                                'extra' => [
                                    'allergisch',
                                    'Milch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une allergie au fromage',
                                'correct' => [
                                    'une',
                                    'allergie',
                                    'à',
                                    'fromage',
                                ],
                                'extra' => [
                                    'allergique',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'チーズのアレルギー',
                                'correct' => [
                                    'チーズ',
                                    'の',
                                    'アレルギー',
                                ],
                                'extra' => [
                                    '牛乳',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '치즈 알레르기',
                                'correct' => [
                                    '치즈',
                                    '알레르기',
                                ],
                                'extra' => [
                                    '우유',
                                ],
                            ],
                            'tr' => ['sentence' => 'peynir alerjisi', 'correct' => ['peynir', 'alerjisi'], 'extra' => ['alerjik', 'süt']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Sin',
                            'leche',
                            'y',
                            'sin',
                            'queso',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'without milk and without cheese',
                                'correct' => [
                                    'without',
                                    'milk',
                                    'and',
                                    'without',
                                    'cheese',
                                ],
                                'extra' => [
                                    'allergy',
                                ],
                            ],
                            'az' => ['sentence' => 'olmadan süd və olmadan pendir', 'correct' => ['olmadan', 'süd', 'və', 'olmadan', 'pendir'], 'extra' => ['allergiya']],
                            'ar' => ['sentence' => 'بدون حليب و بدون جبن', 'correct' => ['بدون', 'حليب', 'و', 'بدون', 'جبن'], 'extra' => ['حساسية']],
                            'ru' => ['sentence' => 'без молоко и без сыр', 'correct' => ['без', 'молоко', 'и', 'без', 'сыр'], 'extra' => ['аллергия']],
                            'de' => [
                                'sentence' => 'Ohne Milch und ohne Käse',
                                'correct' => [
                                    'ohne',
                                    'Milch',
                                    'und',
                                    'ohne',
                                    'Käse',
                                ],
                                'extra' => [
                                    'Allergie',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Sans lait et sans fromage',
                                'correct' => [
                                    'sans',
                                    'lait',
                                    'et',
                                    'sans',
                                    'fromage',
                                ],
                                'extra' => [
                                    'allergie',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '牛乳なしでチーズなしで',
                                'correct' => [
                                    '牛乳',
                                    'なし',
                                    'で',
                                    'チーズ',
                                    'なし',
                                    'で',
                                ],
                                'extra' => [
                                    'アレルギー',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '우유 없이 그리고 치즈 없이',
                                'correct' => [
                                    '우유',
                                    '없이',
                                    '그리고',
                                    '치즈',
                                    '없이',
                                ],
                                'extra' => [
                                    '알레르기',
                                ],
                            ],
                            'tr' => ['sentence' => 'sütsüz ve peynirsiz', 'correct' => ['sütsüz', 've', 'peynirsiz'], 'extra' => ['alerji']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Pan y Queso', 3,
                pictures: [
                    [
                        'es' => 'pan',
                        'img' => 'bread',
                    ],
                    [
                        'es' => 'queso',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'es' => 'gluten',
                    ],
                    [
                        'es' => 'nueces',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pan',
                            'con',
                            'gluten',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the bread with gluten',
                                'correct' => [
                                    'the',
                                    'bread',
                                    'with',
                                    'gluten',
                                ],
                                'extra' => [
                                    'nuts',
                                ],
                            ],
                            'az' => ['sentence' => 'çörək ilə qlüten', 'correct' => ['çörək', 'ilə', 'qlüten'], 'extra' => ['qoz']],
                            'ar' => ['sentence' => 'خبز مع غلوتين', 'correct' => ['خبز', 'مع', 'غلوتين'], 'extra' => ['مكسرات']],
                            'ru' => ['sentence' => 'хлеб с глютен', 'correct' => ['хлеб', 'с', 'глютен'], 'extra' => ['орехи']],
                            'de' => [
                                'sentence' => 'Das Brot mit Gluten',
                                'correct' => [
                                    'das',
                                    'Brot',
                                    'mit',
                                    'Gluten',
                                ],
                                'extra' => [
                                    'Nüsse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le pain avec du gluten',
                                'correct' => [
                                    'le',
                                    'pain',
                                    'avec',
                                    'gluten',
                                ],
                                'extra' => [
                                    'noix',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'グルテン入りのパン',
                                'correct' => [
                                    'グルテン',
                                    '入り',
                                    'の',
                                    'パン',
                                ],
                                'extra' => [
                                    'ナッツ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '글루텐이 든 빵',
                                'correct' => [
                                    '글루텐이',
                                    '든',
                                    '빵',
                                ],
                                'extra' => [
                                    '견과류',
                                ],
                            ],
                            'tr' => ['sentence' => 'glutenli ekmek', 'correct' => ['glutenli', 'ekmek'], 'extra' => ['fındık']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'alergia',
                            'a',
                            'las',
                            'nueces',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an allergy to nuts',
                                'correct' => [
                                    'an',
                                    'allergy',
                                    'to',
                                    'nuts',
                                ],
                                'extra' => [
                                    'gluten',
                                    'bread',
                                ],
                            ],
                            'az' => ['sentence' => 'bir allergiya qoz', 'correct' => ['bir', 'allergiya', 'qoz'], 'extra' => ['qlüten', 'çörək']],
                            'ar' => ['sentence' => 'حساسية إلى مكسرات', 'correct' => ['حساسية', 'إلى', 'مكسرات'], 'extra' => ['غلوتين', 'خبز']],
                            'ru' => ['sentence' => 'аллергия в орехи', 'correct' => ['аллергия', 'в', 'орехи'], 'extra' => ['глютен', 'хлеб']],
                            'de' => [
                                'sentence' => 'Eine Allergie gegen Nüsse',
                                'correct' => [
                                    'eine',
                                    'Allergie',
                                    'zu',
                                    'Nüsse',
                                ],
                                'extra' => [
                                    'Gluten',
                                    'Brot',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une allergie aux noix',
                                'correct' => [
                                    'une',
                                    'allergie',
                                    'à',
                                    'noix',
                                ],
                                'extra' => [
                                    'gluten',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ナッツのアレルギー',
                                'correct' => [
                                    'ナッツ',
                                    'の',
                                    'アレルギー',
                                ],
                                'extra' => [
                                    'グルテン',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '견과류 알레르기',
                                'correct' => [
                                    '견과류',
                                    '알레르기',
                                ],
                                'extra' => [
                                    '글루텐',
                                ],
                            ],
                            'tr' => ['sentence' => 'fındık alerjisi', 'correct' => ['fındık', 'alerjisi'], 'extra' => ['gluten', 'ekmek']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Pan',
                            'y',
                            'queso',
                            'sin',
                            'nueces',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'bread and cheese without nuts',
                                'correct' => [
                                    'bread',
                                    'and',
                                    'cheese',
                                    'without',
                                    'nuts',
                                ],
                                'extra' => [
                                    'gluten',
                                ],
                            ],
                            'az' => ['sentence' => 'çörək və pendir olmadan qoz', 'correct' => ['çörək', 'və', 'pendir', 'olmadan', 'qoz'], 'extra' => ['qlüten']],
                            'ar' => ['sentence' => 'خبز و جبن بدون مكسرات', 'correct' => ['خبز', 'و', 'جبن', 'بدون', 'مكسرات'], 'extra' => ['غلوتين']],
                            'ru' => ['sentence' => 'хлеб и сыр без орехи', 'correct' => ['хлеб', 'и', 'сыр', 'без', 'орехи'], 'extra' => ['глютен']],
                            'de' => [
                                'sentence' => 'Brot und Käse ohne Nüsse',
                                'correct' => [
                                    'Brot',
                                    'und',
                                    'Käse',
                                    'ohne',
                                    'Nüsse',
                                ],
                                'extra' => [
                                    'Gluten',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pain et fromage sans noix',
                                'correct' => [
                                    'pain',
                                    'et',
                                    'fromage',
                                    'sans',
                                    'noix',
                                ],
                                'extra' => [
                                    'gluten',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ナッツなしのパンとチーズ',
                                'correct' => [
                                    'ナッツ',
                                    'なし',
                                    'の',
                                    'パン',
                                    'と',
                                    'チーズ',
                                ],
                                'extra' => [
                                    'グルテン',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '견과류 없는 빵과 치즈',
                                'correct' => [
                                    '견과류',
                                    '없는',
                                    '빵과',
                                    '치즈',
                                ],
                                'extra' => [
                                    '글루텐',
                                ],
                            ],
                            'tr' => ['sentence' => 'fındıksız ekmek ve peynir', 'correct' => ['fındıksız', 'ekmek', 've', 'peynir'], 'extra' => ['gluten']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Sopa y Arroz', 4,
                pictures: [
                    [
                        'es' => 'sopa',
                        'img' => 'soup',
                    ],
                    [
                        'es' => 'arroz',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ingredientes',
                    ],
                    [
                        'es' => 'contiene',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'sopa',
                            'contiene',
                            'sal',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the soup contains salt',
                                'correct' => [
                                    'the',
                                    'soup',
                                    'contains',
                                    'salt',
                                ],
                                'extra' => [
                                    'ingredients',
                                ],
                            ],
                            'az' => ['sentence' => 'şorba tərkibində var duz', 'correct' => ['şorba', 'tərkibində var', 'duz'], 'extra' => ['tərkib']],
                            'ar' => ['sentence' => 'حساء يحتوي ملح', 'correct' => ['حساء', 'يحتوي', 'ملح'], 'extra' => ['مكونات']],
                            'ru' => ['sentence' => 'суп содержит соль', 'correct' => ['суп', 'содержит', 'соль'], 'extra' => ['ингредиенты']],
                            'de' => [
                                'sentence' => 'Die Suppe enthält Salz',
                                'correct' => [
                                    'die',
                                    'Suppe',
                                    'enthält',
                                    'Salz',
                                ],
                                'extra' => [
                                    'Zutaten',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La soupe contient du sel',
                                'correct' => [
                                    'la',
                                    'soupe',
                                    'contient',
                                    'sel',
                                ],
                                'extra' => [
                                    'ingrédients',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'スープは塩を含む',
                                'correct' => [
                                    'スープ',
                                    'は',
                                    '塩',
                                    'を',
                                    '含む',
                                ],
                                'extra' => [
                                    '材料',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '수프는 소금이 들어있습니다',
                                'correct' => [
                                    '수프는',
                                    '소금이',
                                    '들어있습니다',
                                ],
                                'extra' => [
                                    '재료',
                                ],
                            ],
                            'tr' => ['sentence' => 'çorbada tuz var', 'correct' => ['çorbada', 'tuz', 'var'], 'extra' => ['içindekiler']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Los',
                            'ingredientes',
                            'del',
                            'arroz',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the ingredients of the rice',
                                'correct' => [
                                    'the',
                                    'ingredients',
                                    'of',
                                    'the',
                                    'rice',
                                ],
                                'extra' => [
                                    'contains',
                                ],
                            ],
                            'az' => ['sentence' => 'tərkib düyü', 'correct' => ['tərkib', 'düyü'], 'extra' => ['tərkibində var']],
                            'ar' => ['sentence' => 'مكونات أرز', 'correct' => ['مكونات', 'أرز'], 'extra' => ['يحتوي']],
                            'ru' => ['sentence' => 'ингредиенты рис', 'correct' => ['ингредиенты', 'рис'], 'extra' => ['содержит']],
                            'de' => [
                                'sentence' => 'Die Zutaten des Reises',
                                'correct' => [
                                    'die',
                                    'Zutaten',
                                    'von',
                                    'dem',
                                    'Reis',
                                ],
                                'extra' => [
                                    'enthält',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Les ingrédients du riz',
                                'correct' => [
                                    'les',
                                    'ingrédients',
                                    'de',
                                    'le',
                                    'riz',
                                ],
                                'extra' => [
                                    'contient',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ご飯の材料',
                                'correct' => [
                                    'ご飯',
                                    'の',
                                    '材料',
                                ],
                                'extra' => [
                                    '含む',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥의 재료',
                                'correct' => [
                                    '밥의',
                                    '재료',
                                ],
                                'extra' => [
                                    '들어있다',
                                ],
                            ],
                            'tr' => ['sentence' => 'pirincin içindekiler', 'correct' => ['pirincin', 'içindekiler'], 'extra' => ['içerir']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Los',
                            'ingredientes',
                            'de',
                            'la',
                            'sopa',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the ingredients of the soup',
                                'correct' => [
                                    'the',
                                    'ingredients',
                                    'of',
                                    'the',
                                    'soup',
                                ],
                                'extra' => [
                                    'rice',
                                ],
                            ],
                            'az' => ['sentence' => 'tərkib şorba', 'correct' => ['tərkib', 'şorba'], 'extra' => ['düyü']],
                            'ar' => ['sentence' => 'مكونات حساء', 'correct' => ['مكونات', 'حساء'], 'extra' => ['أرز']],
                            'ru' => ['sentence' => 'ингредиенты суп', 'correct' => ['ингредиенты', 'суп'], 'extra' => ['рис']],
                            'de' => [
                                'sentence' => 'Die Zutaten der Suppe',
                                'correct' => [
                                    'die',
                                    'Zutaten',
                                    'von',
                                    'der',
                                    'Suppe',
                                ],
                                'extra' => [
                                    'Reis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Les ingrédients de la soupe',
                                'correct' => [
                                    'les',
                                    'ingrédients',
                                    'de',
                                    'la',
                                    'soupe',
                                ],
                                'extra' => [
                                    'riz',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'スープの材料',
                                'correct' => [
                                    'スープ',
                                    'の',
                                    '材料',
                                ],
                                'extra' => [
                                    'ご飯',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '수프의 재료',
                                'correct' => [
                                    '수프의',
                                    '재료',
                                ],
                                'extra' => [
                                    '밥',
                                ],
                            ],
                            'tr' => ['sentence' => 'çorbanın içindekiler', 'correct' => ['çorbanın', 'içindekiler'], 'extra' => ['pirinç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Queso y Carne', 5,
                pictures: [
                    [
                        'es' => 'queso',
                        'img' => 'cheese',
                    ],
                    [
                        'es' => 'carne',
                        'img' => 'meat',
                    ],
                ],
                plain: [
                    [
                        'es' => 'evitar',
                    ],
                    [
                        'es' => 'dieta',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quisiera',
                            'evitar',
                            'el',
                            'queso',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to avoid the cheese',
                                'correct' => [
                                    'I would like',
                                    'to avoid',
                                    'the',
                                    'cheese',
                                ],
                                'extra' => [
                                    'diet',
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm qaçınmaq pendir', 'correct' => ['istəyirəm', 'qaçınmaq', 'pendir'], 'extra' => ['pəhriz']],
                            'ar' => ['sentence' => 'أريد التجنب جبن', 'correct' => ['أريد', 'التجنب', 'جبن'], 'extra' => ['حمية']],
                            'ru' => ['sentence' => 'я хочу избегать сыр', 'correct' => ['я', 'хочу', 'избегать', 'сыр'], 'extra' => ['диета']],
                            'de' => [
                                'sentence' => 'Ich möchte den Käse vermeiden',
                                'correct' => [
                                    'ich möchte',
                                    'den',
                                    'Käse',
                                    'vermeiden',
                                ],
                                'extra' => [
                                    'Diät',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais éviter le fromage',
                                'correct' => [
                                    'je voudrais',
                                    'éviter',
                                    'le',
                                    'fromage',
                                ],
                                'extra' => [
                                    'régime',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'チーズを避けたいです',
                                'correct' => [
                                    'チーズ',
                                    'を',
                                    '避け',
                                    'たいです',
                                ],
                                'extra' => [
                                    '食事制限',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '치즈를 피하고 싶습니다',
                                'correct' => [
                                    '치즈를',
                                    '피하고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '식단',
                                ],
                            ],
                            'tr' => ['sentence' => 'peynirden kaçınmak istiyorum', 'correct' => ['peynirden', 'kaçınmak', 'istiyorum'], 'extra' => ['beslenme']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'dieta',
                            'sin',
                            'carne',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a diet without meat',
                                'correct' => [
                                    'a',
                                    'diet',
                                    'without',
                                    'meat',
                                ],
                                'extra' => [
                                    'to avoid',
                                    'cheese',
                                ],
                            ],
                            'az' => ['sentence' => 'bir pəhriz olmadan ət', 'correct' => ['bir', 'pəhriz', 'olmadan', 'ət'], 'extra' => ['qaçınmaq', 'pendir']],
                            'ar' => ['sentence' => 'حمية بدون لحم', 'correct' => ['حمية', 'بدون', 'لحم'], 'extra' => ['التجنب', 'جبن']],
                            'ru' => ['sentence' => 'диета без мясо', 'correct' => ['диета', 'без', 'мясо'], 'extra' => ['избегать', 'сыр']],
                            'de' => [
                                'sentence' => 'Eine Diät ohne Fleisch',
                                'correct' => [
                                    'eine',
                                    'Diät',
                                    'ohne',
                                    'Fleisch',
                                ],
                                'extra' => [
                                    'vermeiden',
                                    'Käse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un régime sans viande',
                                'correct' => [
                                    'un',
                                    'régime',
                                    'sans',
                                    'viande',
                                ],
                                'extra' => [
                                    'éviter',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '肉なしの食事制限',
                                'correct' => [
                                    '肉',
                                    'なし',
                                    'の',
                                    '食事制限',
                                ],
                                'extra' => [
                                    '避ける',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고기 없는 식단',
                                'correct' => [
                                    '고기',
                                    '없는',
                                    '식단',
                                ],
                                'extra' => [
                                    '피하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'etsiz bir beslenme', 'correct' => ['etsiz', 'bir', 'beslenme'], 'extra' => ['kaçınmak', 'peynir']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Evitar',
                            'la',
                            'carne',
                            'y',
                            'el',
                            'queso',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to avoid the meat and the cheese',
                                'correct' => [
                                    'to avoid',
                                    'the',
                                    'meat',
                                    'and',
                                    'the',
                                    'cheese',
                                ],
                                'extra' => [
                                    'diet',
                                ],
                            ],
                            'az' => ['sentence' => 'qaçınmaq ət və pendir', 'correct' => ['qaçınmaq', 'ət', 'və', 'pendir'], 'extra' => ['pəhriz']],
                            'ar' => ['sentence' => 'التجنب لحم و جبن', 'correct' => ['التجنب', 'لحم', 'و', 'جبن'], 'extra' => ['حمية']],
                            'ru' => ['sentence' => 'избегать мясо и сыр', 'correct' => ['избегать', 'мясо', 'и', 'сыр'], 'extra' => ['диета']],
                            'de' => [
                                'sentence' => 'Das Fleisch und den Käse vermeiden',
                                'correct' => [
                                    'das',
                                    'Fleisch',
                                    'und',
                                    'den',
                                    'Käse',
                                    'vermeiden',
                                ],
                                'extra' => [
                                    'Diät',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Éviter la viande et le fromage',
                                'correct' => [
                                    'éviter',
                                    'la',
                                    'viande',
                                    'et',
                                    'le',
                                    'fromage',
                                ],
                                'extra' => [
                                    'régime',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '肉とチーズを避ける',
                                'correct' => [
                                    '肉',
                                    'と',
                                    'チーズ',
                                    'を',
                                    '避ける',
                                ],
                                'extra' => [
                                    '食事制限',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고기와 치즈를 피하다',
                                'correct' => [
                                    '고기와',
                                    '치즈를',
                                    '피하다',
                                ],
                                'extra' => [
                                    '식단',
                                ],
                            ],
                            'tr' => ['sentence' => 'etten ve peynirden kaçınmak', 'correct' => ['etten', 've', 'peynirden', 'kaçınmak'], 'extra' => ['beslenme']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
