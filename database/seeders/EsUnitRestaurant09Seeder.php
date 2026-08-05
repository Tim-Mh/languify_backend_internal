<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = [
        'tenedor' => 'fork',
        'cuchillo' => 'knife',
        'cuchara' => 'spoon',
        'plato' => 'plate',
        'vaso' => 'glass',
        'menú' => 'menu',
        'arroz' => 'rice',
        'sopa' => 'soup',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 9, the Spanish twin of the
     * English "Unit 9: At the Table" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unidad 9: En la mesa', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Tenedor y Cuchillo', 1,
                pictures: [
                    [
                        'es' => 'tenedor',
                        'img' => 'fork',
                    ],
                    [
                        'es' => 'cuchillo',
                        'img' => 'knife',
                    ],
                ],
                plain: [
                    [
                        'es' => 'tráigame',
                    ],
                    [
                        'es' => 'servilleta',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Tráigame',
                            'un',
                            'tenedor',
                        ],
                        'blank' => 0,
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
                                    'knife',
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
                            'ja' => [
                                'sentence' => 'フォークを持ってきてください',
                                'correct' => [
                                    'フォーク',
                                    'を',
                                    '持ってきてください',
                                ],
                                'extra' => [
                                    'ナプキン',
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
                            'Un',
                            'cuchillo',
                            'y',
                            'una',
                            'servilleta',
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
                            'ja' => [
                                'sentence' => 'ナイフとナプキン',
                                'correct' => [
                                    'ナイフ',
                                    'と',
                                    'ナプキン',
                                ],
                                'extra' => [
                                    '持ってきてください',
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
                            'Tráigame',
                            'un',
                            'cuchillo',
                            'limpio',
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
                            'ja' => [
                                'sentence' => 'きれいなナイフを持ってきてください',
                                'correct' => [
                                    'きれいな',
                                    'ナイフ',
                                    'を',
                                    '持ってきてください',
                                ],
                                'extra' => [
                                    'ナプキン',
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
            $builder->lesson('Lección 2: Cuchara y Plato', 2,
                pictures: [
                    [
                        'es' => 'cuchara',
                        'img' => 'spoon',
                    ],
                    [
                        'es' => 'plato',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'es' => 'puede usted',
                    ],
                    [
                        'es' => 'traer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Puede',
                            'traer',
                            'una',
                            'cuchara',
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
                            'ja' => [
                                'sentence' => 'スプーンを持ってきてもらえますか',
                                'correct' => [
                                    'スプーン',
                                    'を',
                                    '持ってきて',
                                    'もらえます',
                                    'か',
                                ],
                                'extra' => [
                                    'お皿',
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
                            'Un',
                            'plato',
                            'en',
                            'la',
                            'mesa',
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
                            'ja' => [
                                'sentence' => 'テーブルの上のお皿',
                                'correct' => [
                                    'テーブル',
                                    'の',
                                    '上',
                                    'の',
                                    'お皿',
                                ],
                                'extra' => [
                                    'スプーン',
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
                            'Puede',
                            'traer',
                            'un',
                            'plato',
                            'limpio',
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
                            'ja' => [
                                'sentence' => 'きれいなお皿を持ってきてもらえますか',
                                'correct' => [
                                    'きれいな',
                                    'お皿',
                                    'を',
                                    '持ってきて',
                                    'もらえます',
                                    'か',
                                ],
                                'extra' => [
                                    'スプーン',
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
            $builder->lesson('Lección 3: Vaso y Menú', 3,
                pictures: [
                    [
                        'es' => 'vaso',
                        'img' => 'glass',
                    ],
                    [
                        'es' => 'menú',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'es' => 'puedo',
                    ],
                    [
                        'es' => 'aquí está',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Puedo',
                            'pagar',
                            'el',
                            'vaso',
                        ],
                        'blank' => 1,
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
                                    'menu',
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
                            'ja' => [
                                'sentence' => 'グラスを払えます',
                                'correct' => [
                                    'グラス',
                                    'を',
                                    '払えます',
                                ],
                                'extra' => [
                                    'これが',
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
                            'Aquí',
                            'está',
                            'el',
                            'menú',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'here is the menu',
                                'correct' => [
                                    'here is',
                                    'the',
                                    'menu',
                                ],
                                'extra' => [
                                    'I can',
                                    'glass',
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
                            'ja' => [
                                'sentence' => 'これがメニューです',
                                'correct' => [
                                    'これが',
                                    'メニュー',
                                    'です',
                                ],
                                'extra' => [
                                    'グラス',
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
                            'Puedo',
                            'elegir',
                            'el',
                            'menú',
                        ],
                        'blank' => 3,
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
                                    'glass',
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
                            'ja' => [
                                'sentence' => 'メニューを選べます',
                                'correct' => [
                                    'メニュー',
                                    'を',
                                    '選べます',
                                ],
                                'extra' => [
                                    'これが',
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
            $builder->lesson('Lección 4: Cuchara y Arroz', 4,
                pictures: [
                    [
                        'es' => 'cuchara',
                        'img' => 'spoon',
                    ],
                    [
                        'es' => 'arroz',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'es' => 'un poco',
                    ],
                    [
                        'es' => 'más',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Un',
                            'poco',
                            'de',
                            'arroz',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a little rice',
                                'correct' => [
                                    'a little',
                                    'rice',
                                ],
                                'extra' => [
                                    'more',
                                    'spoon',
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
                            'ja' => [
                                'sentence' => '少しのご飯',
                                'correct' => [
                                    '少しの',
                                    'ご飯',
                                ],
                                'extra' => [
                                    'もっと',
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
                            'Más',
                            'con',
                            'la',
                            'cuchara',
                        ],
                        'blank' => 0,
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
                                    'rice',
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
                            'ja' => [
                                'sentence' => 'スプーンでもっと',
                                'correct' => [
                                    'スプーン',
                                    'で',
                                    'もっと',
                                ],
                                'extra' => [
                                    '少し',
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
                            'Un',
                            'poco',
                            'más',
                            'de',
                            'arroz',
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
                            'ja' => [
                                'sentence' => 'もう少しご飯',
                                'correct' => [
                                    'もう',
                                    '少し',
                                    'ご飯',
                                ],
                                'extra' => [
                                    'スプーン',
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
            $builder->lesson('Lección 5: Plato y Sopa', 5,
                pictures: [
                    [
                        'es' => 'plato',
                        'img' => 'plate',
                    ],
                    [
                        'es' => 'sopa',
                        'img' => 'soup',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pedido',
                    ],
                    [
                        'es' => 'listo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'plato',
                            'está',
                            'listo',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => '料理は準備できています',
                                'correct' => [
                                    '料理',
                                    'は',
                                    '準備',
                                    'で',
                                    'きて',
                                    'います',
                                ],
                                'extra' => [
                                    '注文',
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
                            'Mi',
                            'pedido',
                            'por',
                            'favor',
                        ],
                        'blank' => 1,
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
                                    'soup',
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
                            'ja' => [
                                'sentence' => '私の注文をお願いします',
                                'correct' => [
                                    '私の',
                                    '注文',
                                    'を',
                                    'お願いします',
                                ],
                                'extra' => [
                                    '準備ができた',
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
                            'Un',
                            'plato',
                            'y',
                            'una',
                            'sopa',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => 'お皿とスープ',
                                'correct' => [
                                    'お皿',
                                    'と',
                                    'スープ',
                                ],
                                'extra' => [
                                    '注文',
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
