<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = [
        'フォーク' => 'fork',
        'ナイフ' => 'knife',
        'スプーン' => 'spoon',
        'お皿' => 'plate',
        'グラス' => 'glass',
        'メニュー' => 'menu',
        'ご飯' => 'rice',
        'スープ' => 'soup',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 9, the Japanese twin of the
     * English "Unit 9: At the Table" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'ユニット9: 食卓で', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: フォーク・ナイフ', 1,
                pictures: [
                    [
                        'ja' => 'フォーク',
                        'img' => 'fork',
                    ],
                    [
                        'ja' => 'ナイフ',
                        'img' => 'knife',
                    ],
                ],
                plain: [
                    [
                        'ja' => '持ってきてください',
                    ],
                    [
                        'ja' => 'ナプキン',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'フォーク',
                            'を',
                            '持ってきてください',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'bring me a fork',
                                'correct' => [
                                    'bring me',
                                    'a',
                                    'fork',
                                ],
                                'extra' => [
                                    'napkin',
                                ],
                            ],
                            'az' => ['sentence' => 'mənə gətir bir çəngəl', 'correct' => ['mənə gətir', 'bir', 'çəngəl'], 'extra' => ['salfet']],
                            'ar' => ['sentence' => 'أحضر لي شوكة', 'correct' => ['أحضر لي', 'شوكة'], 'extra' => ['منديل']],
                            'ru' => ['sentence' => 'принесите мне вилка', 'correct' => ['принесите мне', 'вилка'], 'extra' => ['салфетка']],
                            'es' => [
                                'sentence' => 'Tráigame un tenedor',
                                'correct' => [
                                    'tráigame',
                                    'un',
                                    'tenedor',
                                ],
                                'extra' => [
                                    'servilleta',
                                    'cuchillo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Bringen Sie mir eine Gabel',
                                'correct' => [
                                    'bringen Sie mir',
                                    'eine',
                                    'Gabel',
                                ],
                                'extra' => [
                                    'Serviette',
                                    'Messer',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Apportez-moi une fourchette',
                                'correct' => [
                                    'apportez-moi',
                                    'une',
                                    'fourchette',
                                ],
                                'extra' => [
                                    'serviette',
                                    'couteau',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '포크를 가져다주세요',
                                'correct' => [
                                    '포크를',
                                    '가져다주세요',
                                ],
                                'extra' => [
                                    '냅킨',
                                ],
                            ],
                            'tr' => ['sentence' => 'bana bir çatal getirin', 'correct' => ['bana', 'bir', 'çatal', 'getirin'], 'extra' => ['peçete']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ナイフ',
                            'と',
                            'ナプキン',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a knife and a napkin',
                                'correct' => [
                                    'a',
                                    'knife',
                                    'and',
                                    'a',
                                    'napkin',
                                ],
                                'extra' => [
                                    'bring me',
                                ],
                            ],
                            'az' => ['sentence' => 'bir bıçaq və bir salfet', 'correct' => ['bir', 'bıçaq', 'və', 'bir', 'salfet'], 'extra' => ['mənə gətir']],
                            'ar' => ['sentence' => 'سكين و منديل', 'correct' => ['سكين', 'و', 'منديل'], 'extra' => ['أحضر لي']],
                            'ru' => ['sentence' => 'нож и салфетка', 'correct' => ['нож', 'и', 'салфетка'], 'extra' => ['принесите мне']],
                            'es' => [
                                'sentence' => 'Un cuchillo y una servilleta',
                                'correct' => [
                                    'un',
                                    'cuchillo',
                                    'y',
                                    'una',
                                    'servilleta',
                                ],
                                'extra' => [
                                    'tráigame',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Messer und eine Serviette',
                                'correct' => [
                                    'ein',
                                    'Messer',
                                    'und',
                                    'eine',
                                    'Serviette',
                                ],
                                'extra' => [
                                    'bringen Sie mir',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un couteau et une serviette',
                                'correct' => [
                                    'un',
                                    'couteau',
                                    'et',
                                    'une',
                                    'serviette',
                                ],
                                'extra' => [
                                    'apportez-moi',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나이프와 냅킨',
                                'correct' => [
                                    '나이프와',
                                    '냅킨',
                                ],
                                'extra' => [
                                    '가져다주세요',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir bıçak ve bir peçete', 'correct' => ['bir', 'bıçak', 've', 'bir', 'peçete'], 'extra' => ['bana getirin']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'きれいな',
                            'ナイフ',
                            'を',
                            '持ってきてください',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'bring me a clean knife',
                                'correct' => [
                                    'bring me',
                                    'a',
                                    'clean',
                                    'knife',
                                ],
                                'extra' => [
                                    'napkin',
                                ],
                            ],
                            'az' => ['sentence' => 'mənə gətir bir təmiz bıçaq', 'correct' => ['mənə gətir', 'bir', 'təmiz', 'bıçaq'], 'extra' => ['salfet']],
                            'ar' => ['sentence' => 'أحضر لي نظيف سكين', 'correct' => ['أحضر لي', 'نظيف', 'سكين'], 'extra' => ['منديل']],
                            'ru' => ['sentence' => 'принесите мне чистый нож', 'correct' => ['принесите мне', 'чистый', 'нож'], 'extra' => ['салфетка']],
                            'es' => [
                                'sentence' => 'Tráigame un cuchillo limpio',
                                'correct' => [
                                    'tráigame',
                                    'un',
                                    'cuchillo',
                                    'limpio',
                                ],
                                'extra' => [
                                    'servilleta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Bringen Sie mir ein sauberes Messer',
                                'correct' => [
                                    'bringen Sie mir',
                                    'ein',
                                    'sauber',
                                    'Messer',
                                ],
                                'extra' => [
                                    'Serviette',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Apportez-moi un couteau propre',
                                'correct' => [
                                    'apportez-moi',
                                    'un',
                                    'couteau',
                                    'propre',
                                ],
                                'extra' => [
                                    'serviette',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '깨끗한 나이프를 가져다주세요',
                                'correct' => [
                                    '깨끗한',
                                    '나이프를',
                                    '가져다주세요',
                                ],
                                'extra' => [
                                    '냅킨',
                                ],
                            ],
                            'tr' => ['sentence' => 'bana temiz bir bıçak getirin', 'correct' => ['bana', 'temiz', 'bir', 'bıçak', 'getirin'], 'extra' => ['peçete']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: スプーン・お皿', 2,
                pictures: [
                    [
                        'ja' => 'スプーン',
                        'img' => 'spoon',
                    ],
                    [
                        'ja' => 'お皿',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'できますか',
                    ],
                    [
                        'ja' => '持ってくる',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'スプーン',
                            'を',
                            '持ってきて',
                            'もらえます',
                            'か',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'can you bring a spoon',
                                'correct' => [
                                    'can you',
                                    'bring',
                                    'a',
                                    'spoon',
                                ],
                                'extra' => [
                                    'plate',
                                ],
                            ],
                            'az' => ['sentence' => 'bacarıram sən gətir bir qaşıq', 'correct' => ['bacarıram', 'sən', 'gətir', 'bir', 'qaşıq'], 'extra' => ['boşqab']],
                            'ar' => ['sentence' => 'أستطيع أنت أحضر ملعقة', 'correct' => ['أستطيع', 'أنت', 'أحضر', 'ملعقة'], 'extra' => ['صحن']],
                            'ru' => ['sentence' => 'могу ты принеси ложка', 'correct' => ['могу', 'ты', 'принеси', 'ложка'], 'extra' => ['тарелка']],
                            'es' => [
                                'sentence' => 'Puede traer una cuchara',
                                'correct' => [
                                    'puede usted',
                                    'traer',
                                    'una',
                                    'cuchara',
                                ],
                                'extra' => [
                                    'plato',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Können Sie einen Löffel bringen',
                                'correct' => [
                                    'können Sie',
                                    'einen',
                                    'Löffel',
                                    'bringen',
                                ],
                                'extra' => [
                                    'Teller',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pouvez-vous apporter une cuillère',
                                'correct' => [
                                    'pouvez-vous',
                                    'apporter',
                                    'une',
                                    'cuillère',
                                ],
                                'extra' => [
                                    'assiette',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '숟가락을 가져올 수 있나요',
                                'correct' => [
                                    '숟가락을',
                                    '가져올',
                                    '수',
                                    '있나요',
                                ],
                                'extra' => [
                                    '접시',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir kaşık getirebilir misiniz', 'correct' => ['bir', 'kaşık', 'getirebilir', 'misiniz'], 'extra' => ['tabak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'テーブル',
                            'の',
                            '上',
                            'の',
                            'お皿',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a plate on the table',
                                'correct' => [
                                    'a',
                                    'plate',
                                    'on',
                                    'the',
                                    'table',
                                ],
                                'extra' => [
                                    'spoon',
                                ],
                            ],
                            'az' => ['sentence' => 'bir boşqab üzərində masa', 'correct' => ['bir', 'boşqab', 'üzərində', 'masa'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'صحن على طاولة', 'correct' => ['صحن', 'على', 'طاولة'], 'extra' => ['ملعقة']],
                            'ru' => ['sentence' => 'тарелка на стол', 'correct' => ['тарелка', 'на', 'стол'], 'extra' => ['ложка']],
                            'es' => [
                                'sentence' => 'Un plato en la mesa',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'sobre',
                                    'la',
                                    'mesa',
                                ],
                                'extra' => [
                                    'cuchara',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Teller auf dem Tisch',
                                'correct' => [
                                    'ein',
                                    'Teller',
                                    'auf',
                                    'dem',
                                    'Tisch',
                                ],
                                'extra' => [
                                    'Löffel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette sur la table',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'sur',
                                    'la',
                                    'table',
                                ],
                                'extra' => [
                                    'cuillère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '탁자 위의 접시',
                                'correct' => [
                                    '탁자',
                                    '위의',
                                    '접시',
                                ],
                                'extra' => [
                                    '숟가락',
                                ],
                            ],
                            'tr' => ['sentence' => 'masada bir tabak', 'correct' => ['masada', 'bir', 'tabak'], 'extra' => ['kaşık']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'きれいな',
                            'お皿',
                            'を',
                            '持ってきて',
                            'もらえます',
                            'か',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'can you bring a clean plate',
                                'correct' => [
                                    'can you',
                                    'bring',
                                    'a',
                                    'clean',
                                    'plate',
                                ],
                                'extra' => [
                                    'spoon',
                                ],
                            ],
                            'az' => ['sentence' => 'bacarıram sən gətir bir təmiz boşqab', 'correct' => ['bacarıram', 'sən', 'gətir', 'bir', 'təmiz', 'boşqab'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'أستطيع أنت أحضر نظيف صحن', 'correct' => ['أستطيع', 'أنت', 'أحضر', 'نظيف', 'صحن'], 'extra' => ['ملعقة']],
                            'ru' => ['sentence' => 'могу ты принеси чистый тарелка', 'correct' => ['могу', 'ты', 'принеси', 'чистый', 'тарелка'], 'extra' => ['ложка']],
                            'es' => [
                                'sentence' => 'Puede traer un plato limpio',
                                'correct' => [
                                    'puede usted',
                                    'traer',
                                    'un',
                                    'limpio',
                                    'plato',
                                ],
                                'extra' => [
                                    'cuchara',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Können Sie einen sauberen Teller bringen',
                                'correct' => [
                                    'können Sie',
                                    'bringen',
                                    'einen',
                                    'sauber',
                                    'Teller',
                                ],
                                'extra' => [
                                    'Löffel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pouvez-vous apporter une assiette propre',
                                'correct' => [
                                    'pouvez-vous',
                                    'apporter',
                                    'une',
                                    'assiette',
                                    'propre',
                                ],
                                'extra' => [
                                    'cuillère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '깨끗한 접시를 가져올 수 있나요',
                                'correct' => [
                                    '깨끗한',
                                    '접시를',
                                    '가져올',
                                    '수',
                                    '있나요',
                                ],
                                'extra' => [
                                    '숟가락',
                                ],
                            ],
                            'tr' => ['sentence' => 'temiz bir tabak getirebilir misiniz', 'correct' => ['temiz', 'bir', 'tabak', 'getirebilir', 'misiniz'], 'extra' => ['kaşık']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: グラス・メニュー', 3,
                pictures: [
                    [
                        'ja' => 'グラス',
                        'img' => 'glass',
                    ],
                    [
                        'ja' => 'メニュー',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私はできる',
                    ],
                    [
                        'ja' => 'これが',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'グラス',
                            'を',
                            '払えます',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I can pay the glass',
                                'correct' => [
                                    'I can',
                                    'pay',
                                    'the',
                                    'glass',
                                ],
                                'extra' => [
                                    'here is',
                                ],
                            ],
                            'az' => ['sentence' => 'mən bacarıram ödə stəkan', 'correct' => ['mən', 'bacarıram', 'ödə', 'stəkan'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'أنا أستطيع ادفع كوب', 'correct' => ['أنا', 'أستطيع', 'ادفع', 'كوب'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'я могу плати стакан', 'correct' => ['я', 'могу', 'плати', 'стакан'], 'extra' => ['здесь']],
                            'es' => [
                                'sentence' => 'Puedo pagar el vaso',
                                'correct' => [
                                    'puedo',
                                    'pagar',
                                    'el',
                                    'vaso',
                                ],
                                'extra' => [
                                    'aquí está',
                                    'menú',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich kann das Glas bezahlen',
                                'correct' => [
                                    'ich kann',
                                    'das',
                                    'Glas',
                                    'bezahlen',
                                ],
                                'extra' => [
                                    'hier ist',
                                    'Menü',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je peux payer le verre',
                                'correct' => [
                                    'je peux',
                                    'payer',
                                    'le',
                                    'verre',
                                ],
                                'extra' => [
                                    'voici',
                                    'menu',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '유리잔을 낼 수 있습니다',
                                'correct' => [
                                    '유리잔을',
                                    '낼',
                                    '수',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '여기',
                                ],
                            ],
                            'tr' => ['sentence' => 'bardağı ödeyebilirim', 'correct' => ['bardağı', 'ödeyebilirim'], 'extra' => ['işte']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'これが',
                            'メニュー',
                            'です',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'here is the menu',
                                'correct' => [
                                    'here is',
                                    'the',
                                    'menu',
                                ],
                                'extra' => [
                                    'glass',
                                ],
                            ],
                            'az' => ['sentence' => 'burada menyu', 'correct' => ['burada', 'menyu'], 'extra' => ['stəkan']],
                            'ar' => ['sentence' => 'هنا قائمة الطعام', 'correct' => ['هنا', 'قائمة الطعام'], 'extra' => ['كوب']],
                            'ru' => ['sentence' => 'здесь меню', 'correct' => ['здесь', 'меню'], 'extra' => ['стакан']],
                            'es' => [
                                'sentence' => 'Aquí está el menú',
                                'correct' => [
                                    'aquí está',
                                    'el',
                                    'menú',
                                ],
                                'extra' => [
                                    'puedo',
                                    'vaso',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hier ist das Menü',
                                'correct' => [
                                    'hier ist',
                                    'das',
                                    'Menü',
                                ],
                                'extra' => [
                                    'ich kann',
                                    'Glas',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Voici le menu',
                                'correct' => [
                                    'voici',
                                    'le',
                                    'menu',
                                ],
                                'extra' => [
                                    'verre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여기 메뉴입니다',
                                'correct' => [
                                    '여기',
                                    '메뉴입니다',
                                ],
                                'extra' => [
                                    '유리잔',
                                ],
                            ],
                            'tr' => ['sentence' => 'işte menü', 'correct' => ['işte', 'menü'], 'extra' => ['bardak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'メニュー',
                            'を',
                            '選べます',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I can choose the menu',
                                'correct' => [
                                    'I can',
                                    'choose',
                                    'the',
                                    'menu',
                                ],
                                'extra' => [
                                    'here is',
                                ],
                            ],
                            'az' => ['sentence' => 'mən bacarıram seç menyu', 'correct' => ['mən', 'bacarıram', 'seç', 'menyu'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'أنا أستطيع اختر قائمة الطعام', 'correct' => ['أنا', 'أستطيع', 'اختر', 'قائمة الطعام'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'я могу выбери меню', 'correct' => ['я', 'могу', 'выбери', 'меню'], 'extra' => ['здесь']],
                            'es' => [
                                'sentence' => 'Puedo elegir el menú',
                                'correct' => [
                                    'puedo',
                                    'elegir',
                                    'el',
                                    'menú',
                                ],
                                'extra' => [
                                    'aquí está',
                                    'vaso',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich kann das Menü wählen',
                                'correct' => [
                                    'ich kann',
                                    'das',
                                    'Menü',
                                    'wählen',
                                ],
                                'extra' => [
                                    'hier ist',
                                    'Glas',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je peux choisir le menu',
                                'correct' => [
                                    'je peux',
                                    'choisir',
                                    'le',
                                    'menu',
                                ],
                                'extra' => [
                                    'voici',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '메뉴를 고를 수 있습니다',
                                'correct' => [
                                    '메뉴를',
                                    '고를',
                                    '수',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '여기',
                                ],
                            ],
                            'tr' => ['sentence' => 'menüyü seçebilirim', 'correct' => ['menüyü', 'seçebilirim'], 'extra' => ['işte']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: スプーン・ご飯', 4,
                pictures: [
                    [
                        'ja' => 'スプーン',
                        'img' => 'spoon',
                    ],
                    [
                        'ja' => 'ご飯',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'ja' => '少し',
                    ],
                    [
                        'ja' => 'もっと',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '少しの',
                            'ご飯',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a little rice',
                                'correct' => [
                                    'a little',
                                    'rice',
                                ],
                                'extra' => [
                                    'more',
                                ],
                            ],
                            'az' => ['sentence' => 'az düyü', 'correct' => ['az', 'düyü'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'قليل أرز', 'correct' => ['قليل', 'أرز'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'немного рис', 'correct' => ['немного', 'рис'], 'extra' => ['больше']],
                            'es' => [
                                'sentence' => 'Un poco de arroz',
                                'correct' => [
                                    'un poco',
                                    'arroz',
                                ],
                                'extra' => [
                                    'más',
                                    'cuchara',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein bisschen Reis',
                                'correct' => [
                                    'ein bisschen',
                                    'Reis',
                                ],
                                'extra' => [
                                    'mehr',
                                    'Löffel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un peu de riz',
                                'correct' => [
                                    'un peu',
                                    'riz',
                                ],
                                'extra' => [
                                    'plus',
                                    'cuillère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '약간의 밥',
                                'correct' => [
                                    '약간의',
                                    '밥',
                                ],
                                'extra' => [
                                    '더',
                                ],
                            ],
                            'tr' => ['sentence' => 'az pirinç', 'correct' => ['az', 'pirinç'], 'extra' => ['daha çok']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'スプーン',
                            'で',
                            'もっと',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'more with the spoon',
                                'correct' => [
                                    'more',
                                    'with',
                                    'the',
                                    'spoon',
                                ],
                                'extra' => [
                                    'a little',
                                ],
                            ],
                            'az' => ['sentence' => 'daha ilə qaşıq', 'correct' => ['daha', 'ilə', 'qaşıq'], 'extra' => ['az']],
                            'ar' => ['sentence' => 'أكثر مع ملعقة', 'correct' => ['أكثر', 'مع', 'ملعقة'], 'extra' => ['قليل']],
                            'ru' => ['sentence' => 'больше с ложка', 'correct' => ['больше', 'с', 'ложка'], 'extra' => ['немного']],
                            'es' => [
                                'sentence' => 'Más con la cuchara',
                                'correct' => [
                                    'más',
                                    'con',
                                    'la',
                                    'cuchara',
                                ],
                                'extra' => [
                                    'un poco',
                                    'arroz',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mehr mit dem Löffel',
                                'correct' => [
                                    'mehr',
                                    'mit',
                                    'dem',
                                    'Löffel',
                                ],
                                'extra' => [
                                    'ein bisschen',
                                    'Reis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Plus avec la cuillère',
                                'correct' => [
                                    'plus',
                                    'avec',
                                    'la',
                                    'cuillère',
                                ],
                                'extra' => [
                                    'un peu',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '숟가락으로 더',
                                'correct' => [
                                    '숟가락으로',
                                    '더',
                                ],
                                'extra' => [
                                    '조금',
                                ],
                            ],
                            'tr' => ['sentence' => 'kaşıkla daha çok', 'correct' => ['kaşıkla', 'daha', 'çok'], 'extra' => ['biraz']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'もう',
                            '少し',
                            'ご飯',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a little more rice',
                                'correct' => [
                                    'a little',
                                    'more',
                                    'rice',
                                ],
                                'extra' => [
                                    'spoon',
                                ],
                            ],
                            'az' => ['sentence' => 'az daha düyü', 'correct' => ['az', 'daha', 'düyü'], 'extra' => ['qaşıq']],
                            'ar' => ['sentence' => 'قليل أكثر أرز', 'correct' => ['قليل', 'أكثر', 'أرز'], 'extra' => ['ملعقة']],
                            'ru' => ['sentence' => 'немного больше рис', 'correct' => ['немного', 'больше', 'рис'], 'extra' => ['ложка']],
                            'es' => [
                                'sentence' => 'Un poco más de arroz',
                                'correct' => [
                                    'un poco',
                                    'más',
                                    'arroz',
                                ],
                                'extra' => [
                                    'cuchara',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein bisschen mehr Reis',
                                'correct' => [
                                    'ein bisschen',
                                    'mehr',
                                    'Reis',
                                ],
                                'extra' => [
                                    'Löffel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un peu plus de riz',
                                'correct' => [
                                    'un peu',
                                    'plus',
                                    'riz',
                                ],
                                'extra' => [
                                    'cuillère',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥 조금 더',
                                'correct' => [
                                    '밥',
                                    '조금',
                                    '더',
                                ],
                                'extra' => [
                                    '숟가락',
                                ],
                            ],
                            'tr' => ['sentence' => 'biraz daha pirinç', 'correct' => ['biraz', 'daha', 'pirinç'], 'extra' => ['kaşık']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: お皿・スープ', 5,
                pictures: [
                    [
                        'ja' => 'お皿',
                        'img' => 'plate',
                    ],
                    [
                        'ja' => 'スープ',
                        'img' => 'soup',
                    ],
                ],
                plain: [
                    [
                        'ja' => '注文',
                    ],
                    [
                        'ja' => '準備ができた',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '料理',
                            'は',
                            '準備',
                            'で',
                            'きて',
                            'います',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the dish is ready',
                                'correct' => [
                                    'the',
                                    'dish',
                                    'is',
                                    'ready',
                                ],
                                'extra' => [
                                    'order',
                                ],
                            ],
                            'az' => ['sentence' => 'yemək hazır', 'correct' => ['yemək', 'hazır'], 'extra' => ['sifariş']],
                            'ar' => ['sentence' => 'طبق جاهز', 'correct' => ['طبق', 'جاهز'], 'extra' => ['طلب']],
                            'ru' => ['sentence' => 'блюдо готов', 'correct' => ['блюдо', 'готов'], 'extra' => ['заказ']],
                            'es' => [
                                'sentence' => 'El plato está listo',
                                'correct' => [
                                    'el',
                                    'plato',
                                    'está',
                                    'listo',
                                ],
                                'extra' => [
                                    'pedido',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Gericht ist fertig',
                                'correct' => [
                                    'das',
                                    'Gericht',
                                    'ist',
                                    'bereit',
                                ],
                                'extra' => [
                                    'Bestellung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le plat est prêt',
                                'correct' => [
                                    'le',
                                    'plat',
                                    'est',
                                    'prêt',
                                ],
                                'extra' => [
                                    'commande',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '요리는 준비되었습니다',
                                'correct' => [
                                    '요리는',
                                    '준비되었습니다',
                                ],
                                'extra' => [
                                    '주문',
                                ],
                            ],
                            'tr' => ['sentence' => 'yemek hazır', 'correct' => ['yemek', 'hazır'], 'extra' => ['sipariş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            '注文',
                            'を',
                            'お願いします',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my order please',
                                'correct' => [
                                    'my',
                                    'order',
                                    'please',
                                ],
                                'extra' => [
                                    'ready',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim sifariş zəhmət olmasa', 'correct' => ['mənim', 'sifariş', 'zəhmət olmasa'], 'extra' => ['hazır']],
                            'ar' => ['sentence' => 'طلب من فضلك', 'correct' => ['طلب', 'من فضلك'], 'extra' => ['جاهز']],
                            'ru' => ['sentence' => 'мой заказ пожалуйста', 'correct' => ['мой', 'заказ', 'пожалуйста'], 'extra' => ['готов']],
                            'es' => [
                                'sentence' => 'Mi pedido, por favor',
                                'correct' => [
                                    'mi',
                                    'pedido',
                                    'por favor',
                                ],
                                'extra' => [
                                    'listo',
                                    'sopa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Bestellung, bitte',
                                'correct' => [
                                    'meine',
                                    'Bestellung',
                                    'bitte',
                                ],
                                'extra' => [
                                    'bereit',
                                    'Suppe',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma commande, s\'il vous plaît',
                                'correct' => [
                                    'ma',
                                    'commande',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'prêt',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 주문 부탁합니다',
                                'correct' => [
                                    '제',
                                    '주문',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '준비된',
                                ],
                            ],
                            'tr' => ['sentence' => 'siparişim lütfen', 'correct' => ['siparişim', 'lütfen'], 'extra' => ['hazır']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'お皿',
                            'と',
                            'スープ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a plate and a soup',
                                'correct' => [
                                    'a',
                                    'plate',
                                    'and',
                                    'a',
                                    'soup',
                                ],
                                'extra' => [
                                    'order',
                                ],
                            ],
                            'az' => ['sentence' => 'bir boşqab və bir şorba', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'şorba'], 'extra' => ['sifariş']],
                            'ar' => ['sentence' => 'صحن و حساء', 'correct' => ['صحن', 'و', 'حساء'], 'extra' => ['طلب']],
                            'ru' => ['sentence' => 'тарелка и суп', 'correct' => ['тарелка', 'и', 'суп'], 'extra' => ['заказ']],
                            'es' => [
                                'sentence' => 'Un plato y una sopa',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'y',
                                    'una',
                                    'sopa',
                                ],
                                'extra' => [
                                    'pedido',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Teller und eine Suppe',
                                'correct' => [
                                    'ein',
                                    'Teller',
                                    'und',
                                    'eine',
                                    'Suppe',
                                ],
                                'extra' => [
                                    'Bestellung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette et une soupe',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'et',
                                    'une',
                                    'soupe',
                                ],
                                'extra' => [
                                    'commande',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '접시와 수프',
                                'correct' => [
                                    '접시와',
                                    '수프',
                                ],
                                'extra' => [
                                    '주문',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir tabak ve bir çorba', 'correct' => ['bir', 'tabak', 've', 'bir', 'çorba'], 'extra' => ['sipariş']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
