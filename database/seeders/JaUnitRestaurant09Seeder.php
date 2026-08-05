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
                        ],
                    ],
                ],
            ),
        ];
    }
}
