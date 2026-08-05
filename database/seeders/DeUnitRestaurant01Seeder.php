<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant01Seeder extends Seeder
{
    private const PICTURES = [
        'Menü' => 'menu',
        'Teller' => 'plate',
        'Suppe' => 'soup',
        'Salat' => 'salad',
        'Hähnchen' => 'chicken',
        'Fisch' => 'fish',
        'Fleisch' => 'meat',
        'Reis' => 'rice',
        'Brot' => 'bread',
        'Käse' => 'cheese',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 1, the German twin of the
     * English "Unit 1: Ordering Food" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Einheit 1: Essen bestellen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Menü & Teller', 1,
                pictures: [
                    [
                        'de' => 'Menü',
                        'img' => 'menu',
                    ],
                    [
                        'de' => 'Teller',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bestellen',
                    ],
                    [
                        'de' => 'bitte',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Menü',
                            'bitte',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the menu please',
                                'correct' => [
                                    'the',
                                    'menu',
                                    'please',
                                ],
                                'extra' => [
                                    'plate',
                                    'to order',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El menú, por favor',
                                'correct' => [
                                    'el',
                                    'menú',
                                    'por favor',
                                ],
                                'extra' => [
                                    'plato',
                                    'pedir',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le menu, s\'il vous plaît',
                                'correct' => [
                                    'le',
                                    'menu',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'assiette',
                                    'commander',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'メニューをお願いします',
                                'correct' => [
                                    'メニュー',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    'お皿',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '메뉴 부탁합니다',
                                'correct' => [
                                    '메뉴',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '접시',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'bestellen',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to order',
                                'correct' => [
                                    'I would like',
                                    'to order',
                                ],
                                'extra' => [
                                    'menu',
                                    'plate',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera pedir',
                                'correct' => [
                                    'quisiera',
                                    'pedir',
                                ],
                                'extra' => [
                                    'menú',
                                    'plato',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais commander',
                                'correct' => [
                                    'je voudrais',
                                    'commander',
                                ],
                                'extra' => [
                                    'menu',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '注文したいです',
                                'correct' => [
                                    '注文し',
                                    'たいです',
                                ],
                                'extra' => [
                                    'メニュー',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주문하고 싶습니다',
                                'correct' => [
                                    '주문하고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '메뉴',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Das',
                            'Menü',
                            'und',
                            'ein',
                            'Teller',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the menu and a plate',
                                'correct' => [
                                    'the',
                                    'menu',
                                    'and',
                                    'a',
                                    'plate',
                                ],
                                'extra' => [
                                    'to order',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El menú y un plato',
                                'correct' => [
                                    'el',
                                    'menú',
                                    'y',
                                    'un',
                                    'plato',
                                ],
                                'extra' => [
                                    'pedir',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le menu et une assiette',
                                'correct' => [
                                    'le',
                                    'menu',
                                    'et',
                                    'une',
                                    'assiette',
                                ],
                                'extra' => [
                                    'commander',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'メニューとお皿',
                                'correct' => [
                                    'メニュー',
                                    'と',
                                    'お皿',
                                ],
                                'extra' => [
                                    '注文する',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '메뉴와 접시',
                                'correct' => [
                                    '메뉴와',
                                    '접시',
                                ],
                                'extra' => [
                                    '주문하다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Suppe & Salat', 2,
                pictures: [
                    [
                        'de' => 'Suppe',
                        'img' => 'soup',
                    ],
                    [
                        'de' => 'Salat',
                        'img' => 'salad',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich nehme',
                    ],
                    [
                        'de' => 'Gericht',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'nehme',
                            'die',
                            'Suppe',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I\'ll have the soup',
                                'correct' => [
                                    'I\'ll have',
                                    'the',
                                    'soup',
                                ],
                                'extra' => [
                                    'salad',
                                    'dish',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Tomo la sopa',
                                'correct' => [
                                    'tomo',
                                    'la',
                                    'sopa',
                                ],
                                'extra' => [
                                    'ensalada',
                                    'plato',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je prends la soupe',
                                'correct' => [
                                    'je prends',
                                    'la',
                                    'soupe',
                                ],
                                'extra' => [
                                    'salade',
                                    'plat',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はスープにします',
                                'correct' => [
                                    '私',
                                    'は',
                                    'スープ',
                                    'にします',
                                ],
                                'extra' => [
                                    'サラダ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 수프로 하겠습니다',
                                'correct' => [
                                    '저는',
                                    '수프로',
                                    '하겠습니다',
                                ],
                                'extra' => [
                                    '샐러드',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Einen',
                            'Salat',
                            'bitte',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a salad please',
                                'correct' => [
                                    'a',
                                    'salad',
                                    'please',
                                ],
                                'extra' => [
                                    'soup',
                                    'dish',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una ensalada, por favor',
                                'correct' => [
                                    'una',
                                    'ensalada',
                                    'por favor',
                                ],
                                'extra' => [
                                    'sopa',
                                    'plato',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une salade, s\'il vous plaît',
                                'correct' => [
                                    'une',
                                    'salade',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'soupe',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'サラダをお願いします',
                                'correct' => [
                                    'サラダ',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    'スープ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '샐러드 부탁합니다',
                                'correct' => [
                                    '샐러드',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '수프',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Das',
                            'Gericht',
                            'des',
                            'Tages',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the dish of the day',
                                'correct' => [
                                    'the',
                                    'dish',
                                    'of',
                                    'the',
                                    'day',
                                ],
                                'extra' => [
                                    'soup',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El plato del día',
                                'correct' => [
                                    'el',
                                    'plato',
                                    'de',
                                    'el',
                                    'día',
                                ],
                                'extra' => [
                                    'sopa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le plat du jour',
                                'correct' => [
                                    'le',
                                    'plat',
                                    'de',
                                    'le',
                                    'jour',
                                ],
                                'extra' => [
                                    'soupe',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '本日の料理',
                                'correct' => [
                                    '本',
                                    '日',
                                    'の',
                                    '料理',
                                ],
                                'extra' => [
                                    'スープ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘의 요리',
                                'correct' => [
                                    '오늘의',
                                    '요리',
                                ],
                                'extra' => [
                                    '수프',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Hähnchen & Fisch', 3,
                pictures: [
                    [
                        'de' => 'Hähnchen',
                        'img' => 'chicken',
                    ],
                    [
                        'de' => 'Fisch',
                        'img' => 'fish',
                    ],
                ],
                plain: [
                    [
                        'de' => 'heiß',
                    ],
                    [
                        'de' => 'für',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Hähnchen',
                            'ist',
                            'heiß',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chicken is hot',
                                'correct' => [
                                    'the',
                                    'chicken',
                                    'is',
                                    'hot',
                                ],
                                'extra' => [
                                    'fish',
                                    'for',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El pollo está caliente',
                                'correct' => [
                                    'el',
                                    'pollo',
                                    'está',
                                    'caliente',
                                ],
                                'extra' => [
                                    'pescado',
                                    'para',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poulet est chaud',
                                'correct' => [
                                    'le',
                                    'poulet',
                                    'est',
                                    'chaud',
                                ],
                                'extra' => [
                                    'poisson',
                                    'pour',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '鶏肉は熱いです',
                                'correct' => [
                                    '鶏肉',
                                    'は',
                                    '熱い',
                                    'です',
                                ],
                                'extra' => [
                                    '魚',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기는 뜨겁습니다',
                                'correct' => [
                                    '닭고기는',
                                    '뜨겁습니다',
                                ],
                                'extra' => [
                                    '생선',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Fisch',
                            'für',
                            'mich',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the fish for me',
                                'correct' => [
                                    'the',
                                    'fish',
                                    'for',
                                    'me',
                                ],
                                'extra' => [
                                    'chicken',
                                    'hot',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El pescado para mí',
                                'correct' => [
                                    'el',
                                    'pescado',
                                    'para',
                                    'me',
                                ],
                                'extra' => [
                                    'pollo',
                                    'caliente',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poisson pour moi',
                                'correct' => [
                                    'le',
                                    'poisson',
                                    'pour',
                                    'moi',
                                ],
                                'extra' => [
                                    'poulet',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私に魚を',
                                'correct' => [
                                    '私',
                                    'に',
                                    '魚',
                                    'を',
                                ],
                                'extra' => [
                                    '鶏肉',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저에게 생선을',
                                'correct' => [
                                    '저에게',
                                    '생선을',
                                ],
                                'extra' => [
                                    '닭고기',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Das',
                            'Hähnchen',
                            'oder',
                            'der',
                            'Fisch',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chicken or the fish',
                                'correct' => [
                                    'the',
                                    'chicken',
                                    'or',
                                    'the',
                                    'fish',
                                ],
                                'extra' => [
                                    'hot',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El pollo o el pescado',
                                'correct' => [
                                    'el',
                                    'pollo',
                                    'o',
                                    'el',
                                    'pescado',
                                ],
                                'extra' => [
                                    'caliente',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poulet ou le poisson',
                                'correct' => [
                                    'le',
                                    'poulet',
                                    'ou',
                                    'le',
                                    'poisson',
                                ],
                                'extra' => [
                                    'chaud',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '鶏肉か魚',
                                'correct' => [
                                    '鶏肉',
                                    'か',
                                    '魚',
                                ],
                                'extra' => [
                                    '熱い',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기 또는 생선',
                                'correct' => [
                                    '닭고기',
                                    '또는',
                                    '생선',
                                ],
                                'extra' => [
                                    '뜨거운',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Fleisch & Reis', 4,
                pictures: [
                    [
                        'de' => 'Fleisch',
                        'img' => 'meat',
                    ],
                    [
                        'de' => 'Reis',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Kellner',
                    ],
                    [
                        'de' => 'Tisch',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Fleisch',
                            'und',
                            'der',
                            'Reis',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the meat and the rice',
                                'correct' => [
                                    'the',
                                    'meat',
                                    'and',
                                    'the',
                                    'rice',
                                ],
                                'extra' => [
                                    'waiter',
                                    'table',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La carne y el arroz',
                                'correct' => [
                                    'la',
                                    'carne',
                                    'y',
                                    'el',
                                    'arroz',
                                ],
                                'extra' => [
                                    'camarero',
                                    'mesa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La viande et le riz',
                                'correct' => [
                                    'la',
                                    'viande',
                                    'et',
                                    'le',
                                    'riz',
                                ],
                                'extra' => [
                                    'serveur',
                                    'table',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '肉とご飯',
                                'correct' => [
                                    '肉',
                                    'と',
                                    'ご飯',
                                ],
                                'extra' => [
                                    'ウェイター',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '고기와 밥',
                                'correct' => [
                                    '고기와',
                                    '밥',
                                ],
                                'extra' => [
                                    '웨이터',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Kellner',
                            'ist',
                            'hier',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the waiter is here',
                                'correct' => [
                                    'the',
                                    'waiter',
                                    'is',
                                    'here',
                                ],
                                'extra' => [
                                    'meat',
                                    'table',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El camarero está aquí',
                                'correct' => [
                                    'el',
                                    'camarero',
                                    'está',
                                    'aquí',
                                ],
                                'extra' => [
                                    'carne',
                                    'mesa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le serveur est ici',
                                'correct' => [
                                    'le',
                                    'serveur',
                                    'est',
                                    'ici',
                                ],
                                'extra' => [
                                    'viande',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'ウェイターはここにいます',
                                'correct' => [
                                    'ウェイター',
                                    'は',
                                    'ここ',
                                    'に',
                                    'います',
                                ],
                                'extra' => [
                                    '肉',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '웨이터는 여기 있습니다',
                                'correct' => [
                                    '웨이터는',
                                    '여기',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '고기',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'Tisch',
                            'ist',
                            'frei',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the table is free',
                                'correct' => [
                                    'the',
                                    'table',
                                    'is',
                                    'free',
                                ],
                                'extra' => [
                                    'waiter',
                                    'rice',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La mesa está libre',
                                'correct' => [
                                    'la',
                                    'mesa',
                                    'está',
                                    'libre',
                                ],
                                'extra' => [
                                    'camarero',
                                    'arroz',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La table est libre',
                                'correct' => [
                                    'la',
                                    'table',
                                    'est',
                                    'libre',
                                ],
                                'extra' => [
                                    'serveur',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'テーブルは空いています',
                                'correct' => [
                                    'テーブル',
                                    'は',
                                    '空いています',
                                ],
                                'extra' => [
                                    'ウェイター',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '테이블은 비어 있습니다',
                                'correct' => [
                                    '테이블은',
                                    '비어',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '웨이터',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Brot & Käse', 5,
                pictures: [
                    [
                        'de' => 'Brot',
                        'img' => 'bread',
                    ],
                    [
                        'de' => 'Käse',
                        'img' => 'cheese',
                    ],
                ],
                plain: [
                    [
                        'de' => 'etwas',
                    ],
                    [
                        'de' => 'ohne',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Etwas',
                            'Brot',
                            'und',
                            'etwas',
                            'Käse',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'some bread and some cheese',
                                'correct' => [
                                    'some',
                                    'bread',
                                    'and',
                                    'some',
                                    'cheese',
                                ],
                                'extra' => [
                                    'without',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Algo de pan y algo de queso',
                                'correct' => [
                                    'algo de',
                                    'pan',
                                    'y',
                                    'algo de',
                                    'queso',
                                ],
                                'extra' => [
                                    'sin',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Du pain et du fromage',
                                'correct' => [
                                    'du',
                                    'pain',
                                    'et',
                                    'du',
                                    'fromage',
                                ],
                                'extra' => [
                                    'sans',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '少しのパンと少しのチーズ',
                                'correct' => [
                                    '少しの',
                                    'パン',
                                    'と',
                                    '少しの',
                                    'チーズ',
                                ],
                                'extra' => [
                                    'なし',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '약간의 빵과 약간의 치즈',
                                'correct' => [
                                    '약간의',
                                    '빵과',
                                    '약간의',
                                    '치즈',
                                ],
                                'extra' => [
                                    '없이',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Die',
                            'Suppe',
                            'ohne',
                            'Salz',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the soup without salt',
                                'correct' => [
                                    'the',
                                    'soup',
                                    'without',
                                    'salt',
                                ],
                                'extra' => [
                                    'bread',
                                    'cheese',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La sopa sin sal',
                                'correct' => [
                                    'la',
                                    'sopa',
                                    'sin',
                                    'sal',
                                ],
                                'extra' => [
                                    'pan',
                                    'queso',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La soupe sans sel',
                                'correct' => [
                                    'la',
                                    'soupe',
                                    'sans',
                                    'sel',
                                ],
                                'extra' => [
                                    'pain',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '塩なしのスープ',
                                'correct' => [
                                    '塩',
                                    'なし',
                                    'の',
                                    'スープ',
                                ],
                                'extra' => [
                                    'パン',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '소금 없이 수프',
                                'correct' => [
                                    '소금',
                                    '없이',
                                    '수프',
                                ],
                                'extra' => [
                                    '빵',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'Käse',
                            'ohne',
                            'Brot',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like cheese without bread',
                                'correct' => [
                                    'I would like',
                                    'cheese',
                                    'without',
                                    'bread',
                                ],
                                'extra' => [
                                    'soup',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quisiera queso sin pan',
                                'correct' => [
                                    'quisiera',
                                    'queso',
                                    'sin',
                                    'pan',
                                ],
                                'extra' => [
                                    'sopa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais du fromage sans pain',
                                'correct' => [
                                    'je voudrais',
                                    'fromage',
                                    'sans',
                                    'pain',
                                ],
                                'extra' => [
                                    'soupe',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'パンなしでチーズをください',
                                'correct' => [
                                    'パン',
                                    'なし',
                                    'で',
                                    'チーズ',
                                    'を',
                                    'ください',
                                ],
                                'extra' => [
                                    'スープ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '빵 없이 치즈를 주세요',
                                'correct' => [
                                    '빵',
                                    '없이',
                                    '치즈를',
                                    '주세요',
                                ],
                                'extra' => [
                                    '수프',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
