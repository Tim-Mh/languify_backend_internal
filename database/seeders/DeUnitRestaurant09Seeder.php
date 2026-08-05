<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant09Seeder extends Seeder
{
    private const PICTURES = [
        'Gabel' => 'fork',
        'Messer' => 'knife',
        'Löffel' => 'spoon',
        'Teller' => 'plate',
        'Glas' => 'glass',
        'Menü' => 'menu',
        'Reis' => 'rice',
        'Suppe' => 'soup',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 9, the German twin of the
     * English "Unit 9: At the Table" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Einheit 9: Am Tisch', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Gabel & Messer', 1,
                pictures: [
                    [
                        'de' => 'Gabel',
                        'img' => 'fork',
                    ],
                    [
                        'de' => 'Messer',
                        'img' => 'knife',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bringen Sie mir',
                    ],
                    [
                        'de' => 'Serviette',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Bringen',
                            'Sie',
                            'mir',
                            'eine',
                            'Gabel',
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
                            'Ein',
                            'Messer',
                            'und',
                            'eine',
                            'Serviette',
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
                            'Bringen',
                            'Sie',
                            'mir',
                            'ein',
                            'sauberes',
                            'Messer',
                        ],
                        'blank' => 4,
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
            $builder->lesson('Lektion 2: Löffel & Teller', 2,
                pictures: [
                    [
                        'de' => 'Löffel',
                        'img' => 'spoon',
                    ],
                    [
                        'de' => 'Teller',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'de' => 'können Sie',
                    ],
                    [
                        'de' => 'bringen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Können',
                            'Sie',
                            'einen',
                            'Löffel',
                            'bringen',
                        ],
                        'blank' => 4,
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
                            'Ein',
                            'Teller',
                            'auf',
                            'dem',
                            'Tisch',
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
                            'Können',
                            'Sie',
                            'einen',
                            'sauberen',
                            'Teller',
                            'bringen',
                        ],
                        'blank' => 3,
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
            $builder->lesson('Lektion 3: Glas & Menü', 3,
                pictures: [
                    [
                        'de' => 'Glas',
                        'img' => 'glass',
                    ],
                    [
                        'de' => 'Menü',
                        'img' => 'menu',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich kann',
                    ],
                    [
                        'de' => 'hier ist',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'kann',
                            'das',
                            'Glas',
                            'bezahlen',
                        ],
                        'blank' => 4,
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
                            'Hier',
                            'ist',
                            'das',
                            'Menü',
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
                            'Ich',
                            'kann',
                            'das',
                            'Menü',
                            'wählen',
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
            $builder->lesson('Lektion 4: Löffel & Reis', 4,
                pictures: [
                    [
                        'de' => 'Löffel',
                        'img' => 'spoon',
                    ],
                    [
                        'de' => 'Reis',
                        'img' => 'rice',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ein bisschen',
                    ],
                    [
                        'de' => 'mehr',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'bisschen',
                            'Reis',
                        ],
                        'blank' => 2,
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
                            'Mehr',
                            'mit',
                            'dem',
                            'Löffel',
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
                            'Ein',
                            'bisschen',
                            'mehr',
                            'Reis',
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
            $builder->lesson('Lektion 5: Teller & Suppe', 5,
                pictures: [
                    [
                        'de' => 'Teller',
                        'img' => 'plate',
                    ],
                    [
                        'de' => 'Suppe',
                        'img' => 'soup',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Bestellung',
                    ],
                    [
                        'de' => 'bereit',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Gericht',
                            'ist',
                            'fertig',
                        ],
                        'blank' => 1,
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
                            'Meine',
                            'Bestellung',
                            'bitte',
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
                            'Ein',
                            'Teller',
                            'und',
                            'eine',
                            'Suppe',
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
