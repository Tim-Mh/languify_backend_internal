<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant01Seeder extends Seeder
{
    private const PICTURES = [
        'menú' => 'menu',
        'plato' => 'plate',
        'sopa' => 'soup',
        'ensalada' => 'salad',
        'pollo' => 'chicken',
        'pescado' => 'fish',
        'carne' => 'meat',
        'arroz' => 'rice',
        'pan' => 'bread',
        'queso' => 'cheese',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 1, the Spanish twin of the
     * English "Unit 1: Ordering Food" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unidad 1: Pedir comida', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Menú y Plato', 1,
                pictures: [
                    [
                        'es' => 'menú',
                        'img' => 'menu',
                    ],
                    [
                        'es' => 'plato',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pedir',
                    ],
                    [
                        'es' => 'por favor',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'menú',
                            'por',
                            'favor',
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
                            'az' => ['sentence' => 'menyu zəhmət olmasa', 'correct' => ['menyu', 'zəhmət olmasa'], 'extra' => ['boşqab', 'sifariş vermək']],
                            'ar' => ['sentence' => 'قائمة الطعام من فضلك', 'correct' => ['قائمة الطعام', 'من فضلك'], 'extra' => ['صحن', 'الطلب']],
                            'ru' => ['sentence' => 'меню пожалуйста', 'correct' => ['меню', 'пожалуйста'], 'extra' => ['тарелка', 'заказать']],
                            'de' => [
                                'sentence' => 'Das Menü, bitte',
                                'correct' => [
                                    'das',
                                    'Menü',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Teller',
                                    'bestellen',
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
                            'tr' => ['sentence' => 'menü lütfen', 'correct' => ['menü', 'lütfen'], 'extra' => ['tabak', 'sipariş vermek']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Quisiera',
                            'pedir',
                        ],
                        'blank' => 1,
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
                            'az' => ['sentence' => 'istəyirəm sifariş vermək', 'correct' => ['istəyirəm', 'sifariş vermək'], 'extra' => ['menyu', 'boşqab']],
                            'ar' => ['sentence' => 'أريد الطلب', 'correct' => ['أريد', 'الطلب'], 'extra' => ['قائمة الطعام', 'صحن']],
                            'ru' => ['sentence' => 'я хочу заказать', 'correct' => ['я', 'хочу', 'заказать'], 'extra' => ['меню', 'тарелка']],
                            'de' => [
                                'sentence' => 'Ich möchte bestellen',
                                'correct' => [
                                    'ich möchte',
                                    'bestellen',
                                ],
                                'extra' => [
                                    'Menü',
                                    'Teller',
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
                            'tr' => ['sentence' => 'sipariş istiyorum', 'correct' => ['sipariş', 'istiyorum'], 'extra' => ['menü', 'tabak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'menú',
                            'y',
                            'un',
                            'plato',
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
                            'az' => ['sentence' => 'menyu və bir boşqab', 'correct' => ['menyu', 'və', 'bir', 'boşqab'], 'extra' => ['sifariş vermək']],
                            'ar' => ['sentence' => 'قائمة الطعام و صحن', 'correct' => ['قائمة الطعام', 'و', 'صحن'], 'extra' => ['الطلب']],
                            'ru' => ['sentence' => 'меню и тарелка', 'correct' => ['меню', 'и', 'тарелка'], 'extra' => ['заказать']],
                            'de' => [
                                'sentence' => 'Das Menü und ein Teller',
                                'correct' => [
                                    'das',
                                    'Menü',
                                    'und',
                                    'ein',
                                    'Teller',
                                ],
                                'extra' => [
                                    'bestellen',
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
                            'tr' => ['sentence' => 'menü ve bir tabak', 'correct' => ['menü', 've', 'bir', 'tabak'], 'extra' => ['sipariş vermek']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Sopa y Ensalada', 2,
                pictures: [
                    [
                        'es' => 'sopa',
                        'img' => 'soup',
                    ],
                    [
                        'es' => 'ensalada',
                        'img' => 'salad',
                    ],
                ],
                plain: [
                    [
                        'es' => 'tomo',
                    ],
                    [
                        'es' => 'plato',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Tomo',
                            'la',
                            'sopa',
                        ],
                        'blank' => 0,
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
                                    'plate',
                                ],
                            ],
                            'az' => ['sentence' => 'götürəcəyəm şorba', 'correct' => ['götürəcəyəm', 'şorba'], 'extra' => ['salat', 'boşqab']],
                            'ar' => ['sentence' => 'سآخذ حساء', 'correct' => ['سآخذ', 'حساء'], 'extra' => ['سلطة', 'صحن']],
                            'ru' => ['sentence' => 'я возьму суп', 'correct' => ['я возьму', 'суп'], 'extra' => ['салат', 'тарелка']],
                            'de' => [
                                'sentence' => 'Ich nehme die Suppe',
                                'correct' => [
                                    'ich nehme',
                                    'die',
                                    'Suppe',
                                ],
                                'extra' => [
                                    'Salat',
                                    'Gericht',
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
                            'tr' => ['sentence' => 'çorbayı alayım', 'correct' => ['çorbayı', 'alayım'], 'extra' => ['salata', 'tabak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'ensalada',
                            'por',
                            'favor',
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
                                    'plate',
                                ],
                            ],
                            'az' => ['sentence' => 'bir salat zəhmət olmasa', 'correct' => ['bir', 'salat', 'zəhmət olmasa'], 'extra' => ['şorba', 'boşqab']],
                            'ar' => ['sentence' => 'سلطة من فضلك', 'correct' => ['سلطة', 'من فضلك'], 'extra' => ['حساء', 'صحن']],
                            'ru' => ['sentence' => 'салат пожалуйста', 'correct' => ['салат', 'пожалуйста'], 'extra' => ['суп', 'тарелка']],
                            'de' => [
                                'sentence' => 'Einen Salat, bitte',
                                'correct' => [
                                    'einen',
                                    'Salat',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Suppe',
                                    'Gericht',
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
                            'tr' => ['sentence' => 'bir salata lütfen', 'correct' => ['bir', 'salata', 'lütfen'], 'extra' => ['çorba', 'tabak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'plato',
                            'del',
                            'día',
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
                            'az' => ['sentence' => 'yemək gün', 'correct' => ['yemək', 'gün'], 'extra' => ['şorba']],
                            'ar' => ['sentence' => 'طبق يوم', 'correct' => ['طبق', 'يوم'], 'extra' => ['حساء']],
                            'ru' => ['sentence' => 'блюдо день', 'correct' => ['блюдо', 'день'], 'extra' => ['суп']],
                            'de' => [
                                'sentence' => 'Das Gericht des Tages',
                                'correct' => [
                                    'das',
                                    'Gericht',
                                    'von',
                                    'dem',
                                    'Tag',
                                ],
                                'extra' => [
                                    'Suppe',
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
                            'tr' => ['sentence' => 'günün yemeği', 'correct' => ['günün', 'yemeği'], 'extra' => ['çorba']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Pollo y Pescado', 3,
                pictures: [
                    [
                        'es' => 'pollo',
                        'img' => 'chicken',
                    ],
                    [
                        'es' => 'pescado',
                        'img' => 'fish',
                    ],
                ],
                plain: [
                    [
                        'es' => 'caliente',
                    ],
                    [
                        'es' => 'para',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'pollo',
                            'está',
                            'caliente',
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
                            'az' => ['sentence' => 'toyuq isti', 'correct' => ['toyuq', 'isti'], 'extra' => ['balıq', 'üçün']],
                            'ar' => ['sentence' => 'دجاج ساخن', 'correct' => ['دجاج', 'ساخن'], 'extra' => ['سمك', 'لأجل']],
                            'ru' => ['sentence' => 'курица горячий', 'correct' => ['курица', 'горячий'], 'extra' => ['рыба', 'для']],
                            'de' => [
                                'sentence' => 'Das Hähnchen ist heiß',
                                'correct' => [
                                    'das',
                                    'Hähnchen',
                                    'ist',
                                    'heiß',
                                ],
                                'extra' => [
                                    'Fisch',
                                    'für',
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
                            'tr' => ['sentence' => 'tavuk sıcak', 'correct' => ['tavuk', 'sıcak'], 'extra' => ['balık', 'için']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'pescado',
                            'para',
                            'mí',
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
                            'az' => ['sentence' => 'balıq üçün mənə', 'correct' => ['balıq', 'üçün', 'mənə'], 'extra' => ['toyuq', 'isti']],
                            'ar' => ['sentence' => 'سمك لأجل لي', 'correct' => ['سمك', 'لأجل', 'لي'], 'extra' => ['دجاج', 'ساخن']],
                            'ru' => ['sentence' => 'рыба для меня', 'correct' => ['рыба', 'для', 'меня'], 'extra' => ['курица', 'горячий']],
                            'de' => [
                                'sentence' => 'Der Fisch für mich',
                                'correct' => [
                                    'der',
                                    'Fisch',
                                    'für',
                                    'mich',
                                ],
                                'extra' => [
                                    'Hähnchen',
                                    'heiß',
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
                            'tr' => ['sentence' => 'benim için balık', 'correct' => ['benim', 'için', 'balık'], 'extra' => ['tavuk', 'sıcak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'pollo',
                            'o',
                            'el',
                            'pescado',
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
                            'az' => ['sentence' => 'toyuq və ya balıq', 'correct' => ['toyuq', 'və ya', 'balıq'], 'extra' => ['isti']],
                            'ar' => ['sentence' => 'دجاج أو سمك', 'correct' => ['دجاج', 'أو', 'سمك'], 'extra' => ['ساخن']],
                            'ru' => ['sentence' => 'курица или рыба', 'correct' => ['курица', 'или', 'рыба'], 'extra' => ['горячий']],
                            'de' => [
                                'sentence' => 'Das Hähnchen oder der Fisch',
                                'correct' => [
                                    'das',
                                    'Hähnchen',
                                    'oder',
                                    'der',
                                    'Fisch',
                                ],
                                'extra' => [
                                    'heiß',
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
                            'tr' => ['sentence' => 'tavuk veya balık', 'correct' => ['tavuk', 'veya', 'balık'], 'extra' => ['sıcak']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Carne y Arroz', 4,
                pictures: [
                    [
                        'es' => 'carne',
                        'img' => 'meat',
                    ],
                    [
                        'es' => 'arroz',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'es' => 'camarero',
                    ],
                    [
                        'es' => 'mesa',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'carne',
                            'y',
                            'el',
                            'arroz',
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
                            'az' => ['sentence' => 'ət və düyü', 'correct' => ['ət', 'və', 'düyü'], 'extra' => ['ofisiant', 'masa']],
                            'ar' => ['sentence' => 'لحم و أرز', 'correct' => ['لحم', 'و', 'أرز'], 'extra' => ['نادل', 'طاولة']],
                            'ru' => ['sentence' => 'мясо и рис', 'correct' => ['мясо', 'и', 'рис'], 'extra' => ['официант', 'стол']],
                            'de' => [
                                'sentence' => 'Das Fleisch und der Reis',
                                'correct' => [
                                    'das',
                                    'Fleisch',
                                    'und',
                                    'der',
                                    'Reis',
                                ],
                                'extra' => [
                                    'Kellner',
                                    'Tisch',
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
                            'tr' => ['sentence' => 'et ve pirinç', 'correct' => ['et', 've', 'pirinç'], 'extra' => ['garson', 'masa']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'camarero',
                            'está',
                            'aquí',
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
                            'az' => ['sentence' => 'ofisiant burada', 'correct' => ['ofisiant', 'burada'], 'extra' => ['ət', 'masa']],
                            'ar' => ['sentence' => 'نادل هنا', 'correct' => ['نادل', 'هنا'], 'extra' => ['لحم', 'طاولة']],
                            'ru' => ['sentence' => 'официант здесь', 'correct' => ['официант', 'здесь'], 'extra' => ['мясо', 'стол']],
                            'de' => [
                                'sentence' => 'Der Kellner ist hier',
                                'correct' => [
                                    'der',
                                    'Kellner',
                                    'ist',
                                    'hier',
                                ],
                                'extra' => [
                                    'Fleisch',
                                    'Tisch',
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
                            'tr' => ['sentence' => 'garson burada', 'correct' => ['garson', 'burada'], 'extra' => ['et', 'masa']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'La',
                            'mesa',
                            'está',
                            'libre',
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
                            'az' => ['sentence' => 'masa pulsuz', 'correct' => ['masa', 'pulsuz'], 'extra' => ['ofisiant', 'düyü']],
                            'ar' => ['sentence' => 'طاولة مجاني', 'correct' => ['طاولة', 'مجاني'], 'extra' => ['نادل', 'أرز']],
                            'ru' => ['sentence' => 'стол бесплатно', 'correct' => ['стол', 'бесплатно'], 'extra' => ['официант', 'рис']],
                            'de' => [
                                'sentence' => 'Der Tisch ist frei',
                                'correct' => [
                                    'der',
                                    'Tisch',
                                    'ist',
                                    'frei',
                                ],
                                'extra' => [
                                    'Kellner',
                                    'Reis',
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
                            'tr' => ['sentence' => 'masa boş', 'correct' => ['masa', 'boş'], 'extra' => ['garson', 'pirinç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Pan y Queso', 5,
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
                        'es' => 'algo de',
                    ],
                    [
                        'es' => 'sin',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Algo',
                            'de',
                            'pan',
                            'y',
                            'algo',
                            'de',
                            'queso',
                        ],
                        'blank' => 6,
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
                            'az' => ['sentence' => 'bir az çörək və bir az pendir', 'correct' => ['bir az', 'çörək', 'və', 'bir az', 'pendir'], 'extra' => ['olmadan']],
                            'ar' => ['sentence' => 'بعض خبز و بعض جبن', 'correct' => ['بعض', 'خبز', 'و', 'بعض', 'جبن'], 'extra' => ['بدون']],
                            'ru' => ['sentence' => 'немного хлеб и немного сыр', 'correct' => ['немного', 'хлеб', 'и', 'немного', 'сыр'], 'extra' => ['без']],
                            'de' => [
                                'sentence' => 'Etwas Brot und etwas Käse',
                                'correct' => [
                                    'etwas',
                                    'Brot',
                                    'und',
                                    'etwas',
                                    'Käse',
                                ],
                                'extra' => [
                                    'ohne',
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
                            'tr' => ['sentence' => 'biraz ekmek ve biraz peynir', 'correct' => ['biraz', 'ekmek', 've', 'biraz', 'peynir'], 'extra' => ['sız']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'sopa',
                            'sin',
                            'sal',
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
                            'az' => ['sentence' => 'şorba olmadan duz', 'correct' => ['şorba', 'olmadan', 'duz'], 'extra' => ['çörək', 'pendir']],
                            'ar' => ['sentence' => 'حساء بدون ملح', 'correct' => ['حساء', 'بدون', 'ملح'], 'extra' => ['خبز', 'جبن']],
                            'ru' => ['sentence' => 'суп без соль', 'correct' => ['суп', 'без', 'соль'], 'extra' => ['хлеб', 'сыр']],
                            'de' => [
                                'sentence' => 'Die Suppe ohne Salz',
                                'correct' => [
                                    'die',
                                    'Suppe',
                                    'ohne',
                                    'Salz',
                                ],
                                'extra' => [
                                    'Brot',
                                    'Käse',
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
                            'tr' => ['sentence' => 'tuzsuz çorba', 'correct' => ['tuzsuz', 'çorba'], 'extra' => ['ekmek', 'peynir']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Quisiera',
                            'queso',
                            'sin',
                            'pan',
                        ],
                        'blank' => 2,
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
                            'az' => ['sentence' => 'istəyirəm pendir olmadan çörək', 'correct' => ['istəyirəm', 'pendir', 'olmadan', 'çörək'], 'extra' => ['şorba']],
                            'ar' => ['sentence' => 'أريد جبن بدون خبز', 'correct' => ['أريد', 'جبن', 'بدون', 'خبز'], 'extra' => ['حساء']],
                            'ru' => ['sentence' => 'я хочу сыр без хлеб', 'correct' => ['я', 'хочу', 'сыр', 'без', 'хлеб'], 'extra' => ['суп']],
                            'de' => [
                                'sentence' => 'Ich möchte Käse ohne Brot',
                                'correct' => [
                                    'ich möchte',
                                    'Käse',
                                    'ohne',
                                    'Brot',
                                ],
                                'extra' => [
                                    'Suppe',
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
                            'tr' => ['sentence' => 'ekmeksiz peynir istiyorum', 'correct' => ['ekmeksiz', 'peynir', 'istiyorum'], 'extra' => ['çorba']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
