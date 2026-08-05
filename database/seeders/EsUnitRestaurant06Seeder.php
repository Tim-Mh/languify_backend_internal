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
                        ],
                    ],
                ],
            ),
        ];
    }
}
