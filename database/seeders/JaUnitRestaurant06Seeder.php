<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant06Seeder extends Seeder
{
    private const PICTURES = [
        '肉' => 'meat',
        'サラダ' => 'salad',
        '牛乳' => 'milk',
        'チーズ' => 'cheese',
        'パン' => 'bread',
        'スープ' => 'soup',
        'ご飯' => 'rice',
        'ケーキ' => 'cake',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 6, the Japanese twin of the
     * English "Unit 6: Diet and Allergies" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'ユニット6: 食事とアレルギー', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 肉・サラダ', 1,
                pictures: [
                    [
                        'ja' => '肉',
                        'img' => 'meat',
                    ],
                    [
                        'ja' => 'サラダ',
                        'img' => 'salad',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'ベジタリアン',
                    ],
                    [
                        'ja' => '食べる',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'ベジタリアン',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am vegetarian',
                                'correct' => [
                                    'I am',
                                    'vegetarian',
                                ],
                                'extra' => [
                                    'eat',
                                ],
                            ],
                            'az' => ['sentence' => 'mən vegetarian', 'correct' => ['mən', 'vegetarian'], 'extra' => ['yeyirəm']],
                            'ar' => ['sentence' => 'أنا نباتي', 'correct' => ['أنا', 'نباتي'], 'extra' => ['آكل']],
                            'ru' => ['sentence' => 'я вегетарианец', 'correct' => ['я', 'вегетарианец'], 'extra' => ['ем']],
                            'es' => [
                                'sentence' => 'Soy vegetariano',
                                'correct' => [
                                    'soy',
                                    'vegetariano',
                                ],
                                'extra' => [
                                    'comer',
                                    'carne',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'ben vejetaryenim', 'correct' => ['ben', 'vejetaryenim'], 'extra' => ['ye']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'サラダ',
                            'を',
                            '食べる',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'yeyirəm bir salat', 'correct' => ['yeyirəm', 'bir', 'salat'], 'extra' => ['vegetarian']],
                            'ar' => ['sentence' => 'آكل سلطة', 'correct' => ['آكل', 'سلطة'], 'extra' => ['نباتي']],
                            'ru' => ['sentence' => 'ем салат', 'correct' => ['ем', 'салат'], 'extra' => ['вегетарианец']],
                            'es' => [
                                'sentence' => 'Comer una ensalada',
                                'correct' => [
                                    'comer',
                                    'una',
                                    'ensalada',
                                ],
                                'extra' => [
                                    'vegetariano',
                                    'carne',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'bir salata ye', 'correct' => ['bir', 'salata', 'ye'], 'extra' => ['vejetaryen']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '肉',
                            'なし',
                            'で',
                            '食べる',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'eat without meat',
                                'correct' => [
                                    'eat',
                                    'without',
                                    'meat',
                                ],
                                'extra' => [
                                    'salad',
                                ],
                            ],
                            'az' => ['sentence' => 'yeyirəm olmadan ət', 'correct' => ['yeyirəm', 'olmadan', 'ət'], 'extra' => ['salat']],
                            'ar' => ['sentence' => 'آكل بدون لحم', 'correct' => ['آكل', 'بدون', 'لحم'], 'extra' => ['سلطة']],
                            'ru' => ['sentence' => 'ем без мясо', 'correct' => ['ем', 'без', 'мясо'], 'extra' => ['салат']],
                            'es' => [
                                'sentence' => 'Comer sin carne',
                                'correct' => [
                                    'comer',
                                    'sin',
                                    'carne',
                                ],
                                'extra' => [
                                    'vegetariano',
                                    'ensalada',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'etsiz ye', 'correct' => ['etsiz', 'ye'], 'extra' => ['salata']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 牛乳・チーズ', 2,
                pictures: [
                    [
                        'ja' => '牛乳',
                        'img' => 'milk',
                    ],
                    [
                        'ja' => 'チーズ',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'アレルギーの',
                    ],
                    [
                        'ja' => 'アレルギー',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            '牛乳',
                            'アレルギー',
                            'です',
                        ],
                        'blank' => 4,
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
                                    'cheese',
                                ],
                            ],
                            'az' => ['sentence' => 'mən allergiya süd', 'correct' => ['mən', 'allergiya', 'süd'], 'extra' => ['pendir']],
                            'ar' => ['sentence' => 'أنا حساسية إلى حليب', 'correct' => ['أنا', 'حساسية', 'إلى', 'حليب'], 'extra' => ['جبن']],
                            'ru' => ['sentence' => 'я аллергия в молоко', 'correct' => ['я', 'аллергия', 'в', 'молоко'], 'extra' => ['сыр']],
                            'es' => [
                                'sentence' => 'Soy alérgico a la leche',
                                'correct' => [
                                    'soy',
                                    'alérgico',
                                    'a',
                                    'leche',
                                ],
                                'extra' => [
                                    'alergia',
                                    'queso',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'süte alerjim var', 'correct' => ['süte', 'alerjim', 'var'], 'extra' => ['peynir']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'チーズ',
                            'の',
                            'アレルギー',
                        ],
                        'blank' => 2,
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
                                    'milk',
                                ],
                            ],
                            'az' => ['sentence' => 'bir allergiya pendir', 'correct' => ['bir', 'allergiya', 'pendir'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'حساسية إلى جبن', 'correct' => ['حساسية', 'إلى', 'جبن'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'аллергия в сыр', 'correct' => ['аллергия', 'в', 'сыр'], 'extra' => ['молоко']],
                            'es' => [
                                'sentence' => 'Una alergia al queso',
                                'correct' => [
                                    'una',
                                    'alergia',
                                    'a',
                                    'queso',
                                ],
                                'extra' => [
                                    'alérgico',
                                    'leche',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'peynir alerjisi', 'correct' => ['peynir', 'alerjisi'], 'extra' => ['süt']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '牛乳',
                            'なし',
                            'で',
                            'チーズ',
                            'なし',
                            'で',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Sin leche y sin queso',
                                'correct' => [
                                    'sin',
                                    'leche',
                                    'y',
                                    'sin',
                                    'queso',
                                ],
                                'extra' => [
                                    'alergia',
                                ],
                            ],
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
            $builder->lesson('レッスン3: パン・チーズ', 3,
                pictures: [
                    [
                        'ja' => 'パン',
                        'img' => 'bread',
                    ],
                    [
                        'ja' => 'チーズ',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'グルテン',
                    ],
                    [
                        'ja' => 'ナッツ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'グルテン',
                            '入り',
                            'の',
                            'パン',
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
                            'es' => [
                                'sentence' => 'El pan con gluten',
                                'correct' => [
                                    'el',
                                    'pan',
                                    'con',
                                    'gluten',
                                ],
                                'extra' => [
                                    'nueces',
                                ],
                            ],
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
                            'ナッツ',
                            'の',
                            'アレルギー',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir allergiya qoz', 'correct' => ['bir', 'allergiya', 'qoz'], 'extra' => ['qlüten']],
                            'ar' => ['sentence' => 'حساسية إلى مكسرات', 'correct' => ['حساسية', 'إلى', 'مكسرات'], 'extra' => ['غلوتين']],
                            'ru' => ['sentence' => 'аллергия в орехи', 'correct' => ['аллергия', 'в', 'орехи'], 'extra' => ['глютен']],
                            'es' => [
                                'sentence' => 'Una alergia a las nueces',
                                'correct' => [
                                    'una',
                                    'alergia',
                                    'a',
                                    'nueces',
                                ],
                                'extra' => [
                                    'gluten',
                                    'pan',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'fındık alerjisi', 'correct' => ['fındık', 'alerjisi'], 'extra' => ['gluten']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ナッツ',
                            'なし',
                            'の',
                            'パン',
                            'と',
                            'チーズ',
                        ],
                        'blank' => 5,
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
                            'es' => [
                                'sentence' => 'Pan y queso sin nueces',
                                'correct' => [
                                    'pan',
                                    'y',
                                    'queso',
                                    'sin',
                                    'nueces',
                                ],
                                'extra' => [
                                    'gluten',
                                ],
                            ],
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
            $builder->lesson('レッスン4: スープ・ご飯', 4,
                pictures: [
                    [
                        'ja' => 'スープ',
                        'img' => 'soup',
                    ],
                    [
                        'ja' => 'ご飯',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'ja' => '材料',
                    ],
                    [
                        'ja' => '含む',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'スープ',
                            'は',
                            '塩',
                            'を',
                            '含む',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'La sopa contiene sal',
                                'correct' => [
                                    'la',
                                    'sopa',
                                    'contiene',
                                    'sal',
                                ],
                                'extra' => [
                                    'ingredientes',
                                ],
                            ],
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
                            'ご飯',
                            'の',
                            '材料',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Los ingredientes del arroz',
                                'correct' => [
                                    'los',
                                    'ingredientes',
                                    'de',
                                    'el',
                                    'arroz',
                                ],
                                'extra' => [
                                    'contiene',
                                ],
                            ],
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
                            'スープ',
                            'の',
                            '材料',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Los ingredientes de la sopa',
                                'correct' => [
                                    'los',
                                    'ingredientes',
                                    'de',
                                    'la',
                                    'sopa',
                                ],
                                'extra' => [
                                    'arroz',
                                ],
                            ],
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
            $builder->lesson('レッスン5: チーズ・肉', 5,
                pictures: [
                    [
                        'ja' => 'チーズ',
                        'img' => 'cheese',
                    ],
                    [
                        'ja' => '肉',
                        'img' => 'meat',
                    ],
                ],
                plain: [
                    [
                        'ja' => '避ける',
                    ],
                    [
                        'ja' => '食事制限',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'チーズ',
                            'を',
                            '避け',
                            'たいです',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Quisiera evitar el queso',
                                'correct' => [
                                    'quisiera',
                                    'evitar',
                                    'el',
                                    'queso',
                                ],
                                'extra' => [
                                    'dieta',
                                ],
                            ],
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
                            '肉',
                            'なし',
                            'の',
                            '食事制限',
                        ],
                        'blank' => 3,
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
                                ],
                            ],
                            'az' => ['sentence' => 'bir pəhriz olmadan ət', 'correct' => ['bir', 'pəhriz', 'olmadan', 'ət'], 'extra' => ['qaçınmaq']],
                            'ar' => ['sentence' => 'حمية بدون لحم', 'correct' => ['حمية', 'بدون', 'لحم'], 'extra' => ['التجنب']],
                            'ru' => ['sentence' => 'диета без мясо', 'correct' => ['диета', 'без', 'мясо'], 'extra' => ['избегать']],
                            'es' => [
                                'sentence' => 'Una dieta sin carne',
                                'correct' => [
                                    'una',
                                    'dieta',
                                    'sin',
                                    'carne',
                                ],
                                'extra' => [
                                    'evitar',
                                    'queso',
                                ],
                            ],
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
                            'tr' => ['sentence' => 'etsiz bir beslenme', 'correct' => ['etsiz', 'bir', 'beslenme'], 'extra' => ['kaçınmak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '肉',
                            'と',
                            'チーズ',
                            'を',
                            '避ける',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'Evitar la carne y el queso',
                                'correct' => [
                                    'evitar',
                                    'la',
                                    'carne',
                                    'y',
                                    'el',
                                    'queso',
                                ],
                                'extra' => [
                                    'dieta',
                                ],
                            ],
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
