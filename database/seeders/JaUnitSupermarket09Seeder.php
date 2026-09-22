<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitSupermarket09Seeder extends Seeder
{
    private const PICTURES = [
        '売り場' => 'shelf',
        'にんじん' => 'carrot',
        'トマト' => 'tomato',
        'リスト' => 'list',
        'レジ' => 'checkout',
        'オレンジ' => 'orange',
        'ぶどう' => 'grapes',
        'かご' => 'basket',
    ];

    /**
     * Japanese Chapter 4 (Supermarket), Unit 9, the Japanese twin of the
     * English "Unit 9: Asking Where Things Are" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'ユニット9: 物の場所を尋ねる', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 売り場・にんじん', 1,
                pictures: [
                    [
                        'ja' => '売り場',
                        'img' => 'shelf',
                    ],
                    [
                        'ja' => 'にんじん',
                        'img' => 'carrot',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'すみません',
                    ],
                    [
                        'ja' => '探す',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'すみません',
                            '売り場',
                            'は',
                            'どこですか',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'excuse me where is the aisle',
                                'correct' => [
                                    'excuse me',
                                    'where',
                                    'is',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'to look for',
                                ],
                            ],
                            'az' => ['sentence' => 'bağışlayın harada şöbə', 'correct' => ['bağışlayın', 'harada', 'şöbə'], 'extra' => ['axtarmaq']],
                            'ar' => ['sentence' => 'عفوا أين قسم', 'correct' => ['عفوا', 'أين', 'قسم'], 'extra' => ['البحث']],
                            'ru' => ['sentence' => 'извините где отдел', 'correct' => ['извините', 'где', 'отдел'], 'extra' => ['искать']],
                            'es' => [
                                'sentence' => 'Disculpe, dónde está el pasillo',
                                'correct' => [
                                    'disculpe',
                                    'dónde',
                                    'está',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'buscar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Entschuldigen Sie, wo ist das Regal',
                                'correct' => [
                                    'entschuldigen Sie',
                                    'wo',
                                    'ist',
                                    'das',
                                    'Regal',
                                ],
                                'extra' => [
                                    'suchen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Excusez-moi, où est le rayon',
                                'correct' => [
                                    'excusez-moi',
                                    'où',
                                    'est',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'chercher',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '실례합니다, 진열대는 어디입니까',
                                'correct' => [
                                    '실례합니다',
                                    '진열대는',
                                    '어디입니까',
                                ],
                                'extra' => [
                                    '찾다',
                                ],
                            ],
                            'tr' => ['sentence' => 'affedersiniz reyon nerede', 'correct' => ['affedersiniz', 'reyon', 'nerede'], 'extra' => ['aramak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'にんじん',
                            'を',
                            '探す',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to look for a carrot',
                                'correct' => [
                                    'to look for',
                                    'a',
                                    'carrot',
                                ],
                                'extra' => [
                                    'excuse me',
                                ],
                            ],
                            'az' => ['sentence' => 'axtarmaq bir yerkökü', 'correct' => ['axtarmaq', 'bir', 'yerkökü'], 'extra' => ['bağışlayın']],
                            'ar' => ['sentence' => 'البحث جزر', 'correct' => ['البحث', 'جزر'], 'extra' => ['عفوا']],
                            'ru' => ['sentence' => 'искать морковь', 'correct' => ['искать', 'морковь'], 'extra' => ['извините']],
                            'es' => [
                                'sentence' => 'Buscar una zanahoria',
                                'correct' => [
                                    'buscar',
                                    'una',
                                    'zanahoria',
                                ],
                                'extra' => [
                                    'disculpe',
                                    'pasillo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Karotte suchen',
                                'correct' => [
                                    'eine',
                                    'Karotte',
                                    'suchen',
                                ],
                                'extra' => [
                                    'entschuldigen Sie',
                                    'Regal',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Chercher une carotte',
                                'correct' => [
                                    'chercher',
                                    'une',
                                    'carotte',
                                ],
                                'extra' => [
                                    'excusez-moi',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '당근을 찾다',
                                'correct' => [
                                    '당근을',
                                    '찾다',
                                ],
                                'extra' => [
                                    '실례합니다',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir havuç aramak', 'correct' => ['bir', 'havuç', 'aramak'], 'extra' => ['affedersiniz']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '売り場',
                            'を',
                            '探す',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to look for the aisle',
                                'correct' => [
                                    'to look for',
                                    'the',
                                    'aisle',
                                ],
                                'extra' => [
                                    'carrot',
                                ],
                            ],
                            'az' => ['sentence' => 'axtarmaq şöbə', 'correct' => ['axtarmaq', 'şöbə'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'البحث قسم', 'correct' => ['البحث', 'قسم'], 'extra' => ['جزر']],
                            'ru' => ['sentence' => 'искать отдел', 'correct' => ['искать', 'отдел'], 'extra' => ['морковь']],
                            'es' => [
                                'sentence' => 'Buscar el pasillo',
                                'correct' => [
                                    'buscar',
                                    'el',
                                    'pasillo',
                                ],
                                'extra' => [
                                    'zanahoria',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Regal suchen',
                                'correct' => [
                                    'das',
                                    'Regal',
                                    'suchen',
                                ],
                                'extra' => [
                                    'Karotte',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Chercher le rayon',
                                'correct' => [
                                    'chercher',
                                    'le',
                                    'rayon',
                                ],
                                'extra' => [
                                    'carotte',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대를 찾다',
                                'correct' => [
                                    '진열대를',
                                    '찾다',
                                ],
                                'extra' => [
                                    '당근',
                                ],
                            ],
                            'tr' => ['sentence' => 'reyonu aramak', 'correct' => ['reyonu', 'aramak'], 'extra' => ['havuç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: トマト・リスト', 2,
                pictures: [
                    [
                        'ja' => 'トマト',
                        'img' => 'tomato',
                    ],
                    [
                        'ja' => 'リスト',
                        'img' => 'list',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'できますか',
                    ],
                    [
                        'ja' => '見つける',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'トマト',
                            'を',
                            '見つけて',
                            'もらえます',
                            'か',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'can you find a tomato',
                                'correct' => [
                                    'can you',
                                    'find',
                                    'a',
                                    'tomato',
                                ],
                                'extra' => [
                                    'list',
                                ],
                            ],
                            'az' => ['sentence' => 'bacarıram sən tap bir pomidor', 'correct' => ['bacarıram', 'sən', 'tap', 'bir', 'pomidor'], 'extra' => ['siyahı']],
                            'ar' => ['sentence' => 'أستطيع أنت ابحث طماطم', 'correct' => ['أستطيع', 'أنت', 'ابحث', 'طماطم'], 'extra' => ['قائمة']],
                            'ru' => ['sentence' => 'могу ты найди помидор', 'correct' => ['могу', 'ты', 'найди', 'помидор'], 'extra' => ['список']],
                            'es' => [
                                'sentence' => 'Puede encontrar un tomate',
                                'correct' => [
                                    'puede usted',
                                    'encontrar',
                                    'un',
                                    'tomate',
                                ],
                                'extra' => [
                                    'lista',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Können Sie eine Tomate finden',
                                'correct' => [
                                    'können Sie',
                                    'eine',
                                    'Tomate',
                                    'finden',
                                ],
                                'extra' => [
                                    'Liste',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pouvez-vous trouver une tomate',
                                'correct' => [
                                    'pouvez-vous',
                                    'trouver',
                                    'une',
                                    'tomate',
                                ],
                                'extra' => [
                                    'liste',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '토마토를 찾을 수 있나요',
                                'correct' => [
                                    '토마토를',
                                    '찾을',
                                    '수',
                                    '있나요',
                                ],
                                'extra' => [
                                    '목록',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir domates bulabilir misiniz', 'correct' => ['bir', 'domates', 'bulabilir', 'misiniz'], 'extra' => ['liste']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            'リスト',
                            'を',
                            '見つける',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'find my list',
                                'correct' => [
                                    'find',
                                    'my',
                                    'list',
                                ],
                                'extra' => [
                                    'tomato',
                                ],
                            ],
                            'az' => ['sentence' => 'tap mənim siyahı', 'correct' => ['tap', 'mənim', 'siyahı'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'ابحث قائمة', 'correct' => ['ابحث', 'قائمة'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'найди мой список', 'correct' => ['найди', 'мой', 'список'], 'extra' => ['помидор']],
                            'es' => [
                                'sentence' => 'Encontrar mi lista',
                                'correct' => [
                                    'encontrar',
                                    'mi',
                                    'lista',
                                ],
                                'extra' => [
                                    'tomate',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meine Liste finden',
                                'correct' => [
                                    'meine',
                                    'Liste',
                                    'finden',
                                ],
                                'extra' => [
                                    'Tomate',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Trouver ma liste',
                                'correct' => [
                                    'trouver',
                                    'ma',
                                    'liste',
                                ],
                                'extra' => [
                                    'tomate',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 목록을 발견하다',
                                'correct' => [
                                    '제',
                                    '목록을',
                                    '발견하다',
                                ],
                                'extra' => [
                                    '토마토',
                                ],
                            ],
                            'tr' => ['sentence' => 'listemi bul', 'correct' => ['listemi', 'bul'], 'extra' => ['domates']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私の',
                            'リスト',
                            'を',
                            '見つけて',
                            'もらえます',
                            'か',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'can you find my list',
                                'correct' => [
                                    'can you',
                                    'find',
                                    'my',
                                    'list',
                                ],
                                'extra' => [
                                    'tomato',
                                ],
                            ],
                            'az' => ['sentence' => 'bacarıram sən tap mənim siyahı', 'correct' => ['bacarıram', 'sən', 'tap', 'mənim', 'siyahı'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'أستطيع أنت ابحث قائمة', 'correct' => ['أستطيع', 'أنت', 'ابحث', 'قائمة'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'могу ты найди мой список', 'correct' => ['могу', 'ты', 'найди', 'мой', 'список'], 'extra' => ['помидор']],
                            'es' => [
                                'sentence' => 'Puede encontrar mi lista',
                                'correct' => [
                                    'puede usted',
                                    'encontrar',
                                    'mi',
                                    'lista',
                                ],
                                'extra' => [
                                    'tomate',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Können Sie meine Liste finden',
                                'correct' => [
                                    'können Sie',
                                    'meine',
                                    'Liste',
                                    'finden',
                                ],
                                'extra' => [
                                    'Tomate',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pouvez-vous trouver ma liste',
                                'correct' => [
                                    'pouvez-vous',
                                    'trouver',
                                    'ma',
                                    'liste',
                                ],
                                'extra' => [
                                    'tomate',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '제 목록을 찾을 수 있나요',
                                'correct' => [
                                    '제',
                                    '목록을',
                                    '찾을',
                                    '수',
                                    '있나요',
                                ],
                                'extra' => [
                                    '토마토',
                                ],
                            ],
                            'tr' => ['sentence' => 'listemi bulabilir misiniz', 'correct' => ['listemi', 'bulabilir', 'misiniz'], 'extra' => ['domates']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: レジ・売り場', 3,
                pictures: [
                    [
                        'ja' => 'レジ',
                        'img' => 'checkout',
                    ],
                    [
                        'ja' => '売り場',
                        'img' => 'shelf',
                    ],
                ],
                plain: [
                    [
                        'ja' => '近く',
                    ],
                    [
                        'ja' => '遠く',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'レジ',
                            'は',
                            '近い',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the checkout is near',
                                'correct' => [
                                    'the',
                                    'checkout',
                                    'is',
                                    'near',
                                ],
                                'extra' => [
                                    'far',
                                ],
                            ],
                            'az' => ['sentence' => 'kassa yaxın', 'correct' => ['kassa', 'yaxın'], 'extra' => ['uzaq']],
                            'ar' => ['sentence' => 'صندوق الدفع قريب', 'correct' => ['صندوق الدفع', 'قريب'], 'extra' => ['بعيد']],
                            'ru' => ['sentence' => 'касса близко', 'correct' => ['касса', 'близко'], 'extra' => ['далеко']],
                            'es' => [
                                'sentence' => 'La caja está cerca',
                                'correct' => [
                                    'la',
                                    'caja',
                                    'está',
                                    'cerca',
                                ],
                                'extra' => [
                                    'lejos',
                                    'pasillo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Kasse ist nah',
                                'correct' => [
                                    'die',
                                    'Kasse',
                                    'ist',
                                    'nah',
                                ],
                                'extra' => [
                                    'weit',
                                    'Regal',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La caisse est près',
                                'correct' => [
                                    'la',
                                    'caisse',
                                    'est',
                                    'près',
                                ],
                                'extra' => [
                                    'loin',
                                    'rayon',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '계산대는 가깝습니다',
                                'correct' => [
                                    '계산대는',
                                    '가깝습니다',
                                ],
                                'extra' => [
                                    '멀리',
                                ],
                            ],
                            'tr' => ['sentence' => 'kasa yakın', 'correct' => ['kasa', 'yakın'], 'extra' => ['uzak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '売り場',
                            'は',
                            '遠い',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the aisle is far',
                                'correct' => [
                                    'the',
                                    'aisle',
                                    'is',
                                    'far',
                                ],
                                'extra' => [
                                    'near',
                                ],
                            ],
                            'az' => ['sentence' => 'şöbə uzaq', 'correct' => ['şöbə', 'uzaq'], 'extra' => ['yaxın']],
                            'ar' => ['sentence' => 'قسم بعيد', 'correct' => ['قسم', 'بعيد'], 'extra' => ['قريب']],
                            'ru' => ['sentence' => 'отдел далеко', 'correct' => ['отдел', 'далеко'], 'extra' => ['близко']],
                            'es' => [
                                'sentence' => 'El pasillo está lejos',
                                'correct' => [
                                    'el',
                                    'pasillo',
                                    'está',
                                    'lejos',
                                ],
                                'extra' => [
                                    'cerca',
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Regal ist weit',
                                'correct' => [
                                    'das',
                                    'Regal',
                                    'ist',
                                    'weit',
                                ],
                                'extra' => [
                                    'nah',
                                    'Kasse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le rayon est loin',
                                'correct' => [
                                    'le',
                                    'rayon',
                                    'est',
                                    'loin',
                                ],
                                'extra' => [
                                    'près',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '진열대는 멉니다',
                                'correct' => [
                                    '진열대는',
                                    '멉니다',
                                ],
                                'extra' => [
                                    '가까이',
                                ],
                            ],
                            'tr' => ['sentence' => 'reyon uzak', 'correct' => ['reyon', 'uzak'], 'extra' => ['yakın']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '近く',
                            'か',
                            '遠く',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'near or far',
                                'correct' => [
                                    'near',
                                    'or',
                                    'far',
                                ],
                                'extra' => [
                                    'checkout',
                                ],
                            ],
                            'az' => ['sentence' => 'yaxın və ya uzaq', 'correct' => ['yaxın', 'və ya', 'uzaq'], 'extra' => ['kassa']],
                            'ar' => ['sentence' => 'قريب أو بعيد', 'correct' => ['قريب', 'أو', 'بعيد'], 'extra' => ['صندوق الدفع']],
                            'ru' => ['sentence' => 'близко или далеко', 'correct' => ['близко', 'или', 'далеко'], 'extra' => ['касса']],
                            'es' => [
                                'sentence' => 'Cerca o lejos',
                                'correct' => [
                                    'cerca',
                                    'o',
                                    'lejos',
                                ],
                                'extra' => [
                                    'caja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Nah oder weit',
                                'correct' => [
                                    'nah',
                                    'oder',
                                    'weit',
                                ],
                                'extra' => [
                                    'Kasse',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Près ou loin',
                                'correct' => [
                                    'près',
                                    'ou',
                                    'loin',
                                ],
                                'extra' => [
                                    'caisse',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가깝거나 멀리',
                                'correct' => [
                                    '가깝거나',
                                    '멀리',
                                ],
                                'extra' => [
                                    '계산대',
                                ],
                            ],
                            'tr' => ['sentence' => 'yakın veya uzak', 'correct' => ['yakın', 'veya', 'uzak'], 'extra' => ['kasa']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: オレンジ・ぶどう', 4,
                pictures: [
                    [
                        'ja' => 'オレンジ',
                        'img' => 'orange',
                    ],
                    [
                        'ja' => 'ぶどう',
                        'img' => 'grapes',
                    ],
                ],
                plain: [
                    [
                        'ja' => '左',
                    ],
                    [
                        'ja' => '右',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '左',
                            'の',
                            'オレンジ',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an orange on the left',
                                'correct' => [
                                    'an',
                                    'orange',
                                    'on',
                                    'the',
                                    'left',
                                ],
                                'extra' => [
                                    'right',
                                ],
                            ],
                            'az' => ['sentence' => 'bir portağal üzərində sol', 'correct' => ['bir', 'portağal', 'üzərində', 'sol'], 'extra' => ['sağ']],
                            'ar' => ['sentence' => 'برتقالة على يسار', 'correct' => ['برتقالة', 'على', 'يسار'], 'extra' => ['يمين']],
                            'ru' => ['sentence' => 'апельсин на левый', 'correct' => ['апельсин', 'на', 'левый'], 'extra' => ['правый']],
                            'es' => [
                                'sentence' => 'Una naranja a la izquierda',
                                'correct' => [
                                    'una',
                                    'naranja',
                                    'sobre',
                                    'la',
                                    'izquierda',
                                ],
                                'extra' => [
                                    'derecha',
                                    'uvas',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Orange links',
                                'correct' => [
                                    'eine',
                                    'Orange',
                                    'auf',
                                    'der',
                                    'links',
                                ],
                                'extra' => [
                                    'rechts',
                                    'Trauben',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une orange à gauche',
                                'correct' => [
                                    'une',
                                    'orange',
                                    'sur',
                                    'la',
                                    'gauche',
                                ],
                                'extra' => [
                                    'droite',
                                    'raisin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '왼쪽의 오렌지',
                                'correct' => [
                                    '왼쪽의',
                                    '오렌지',
                                ],
                                'extra' => [
                                    '오른쪽',
                                ],
                            ],
                            'tr' => ['sentence' => 'solda bir portakal', 'correct' => ['solda', 'bir', 'portakal'], 'extra' => ['sağ']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '右',
                            'の',
                            'ぶどう',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the grapes on the right',
                                'correct' => [
                                    'the',
                                    'grapes',
                                    'on',
                                    'the',
                                    'right',
                                ],
                                'extra' => [
                                    'left',
                                ],
                            ],
                            'az' => ['sentence' => 'üzüm üzərində sağ', 'correct' => ['üzüm', 'üzərində', 'sağ'], 'extra' => ['sol']],
                            'ar' => ['sentence' => 'عنب على يمين', 'correct' => ['عنب', 'على', 'يمين'], 'extra' => ['يسار']],
                            'ru' => ['sentence' => 'виноград на правый', 'correct' => ['виноград', 'на', 'правый'], 'extra' => ['левый']],
                            'es' => [
                                'sentence' => 'Las uvas a la derecha',
                                'correct' => [
                                    'las',
                                    'uvas',
                                    'sobre',
                                    'la',
                                    'derecha',
                                ],
                                'extra' => [
                                    'izquierda',
                                    'naranja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Trauben rechts',
                                'correct' => [
                                    'die',
                                    'Trauben',
                                    'auf',
                                    'der',
                                    'rechts',
                                ],
                                'extra' => [
                                    'links',
                                    'Orange',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le raisin à droite',
                                'correct' => [
                                    'le',
                                    'raisin',
                                    'sur',
                                    'la',
                                    'droite',
                                ],
                                'extra' => [
                                    'gauche',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오른쪽의 포도',
                                'correct' => [
                                    '오른쪽의',
                                    '포도',
                                ],
                                'extra' => [
                                    '왼쪽',
                                ],
                            ],
                            'tr' => ['sentence' => 'sağda üzüm', 'correct' => ['sağda', 'üzüm'], 'extra' => ['sol']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '左',
                            'か',
                            '右',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'left or right',
                                'correct' => [
                                    'left',
                                    'or',
                                    'right',
                                ],
                                'extra' => [
                                    'orange',
                                ],
                            ],
                            'az' => ['sentence' => 'sol və ya sağ', 'correct' => ['sol', 'və ya', 'sağ'], 'extra' => ['portağal']],
                            'ar' => ['sentence' => 'يسار أو يمين', 'correct' => ['يسار', 'أو', 'يمين'], 'extra' => ['برتقالة']],
                            'ru' => ['sentence' => 'левый или правый', 'correct' => ['левый', 'или', 'правый'], 'extra' => ['апельсин']],
                            'es' => [
                                'sentence' => 'Izquierda o derecha',
                                'correct' => [
                                    'izquierda',
                                    'o',
                                    'derecha',
                                ],
                                'extra' => [
                                    'naranja',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Links oder rechts',
                                'correct' => [
                                    'links',
                                    'oder',
                                    'rechts',
                                ],
                                'extra' => [
                                    'Orange',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Gauche ou droite',
                                'correct' => [
                                    'gauche',
                                    'ou',
                                    'droite',
                                ],
                                'extra' => [
                                    'orange',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '왼쪽 또는 오른쪽',
                                'correct' => [
                                    '왼쪽',
                                    '또는',
                                    '오른쪽',
                                ],
                                'extra' => [
                                    '오렌지',
                                ],
                            ],
                            'tr' => ['sentence' => 'sol veya sağ', 'correct' => ['sol', 'veya', 'sağ'], 'extra' => ['portakal']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: かご・トマト', 5,
                pictures: [
                    [
                        'ja' => 'かご',
                        'img' => 'basket',
                    ],
                    [
                        'ja' => 'トマト',
                        'img' => 'tomato',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'これが',
                    ],
                    [
                        'ja' => 'ありがとう',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'これが',
                            '私の',
                            'トマト',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'here is my tomato',
                                'correct' => [
                                    'here is',
                                    'my',
                                    'tomato',
                                ],
                                'extra' => [
                                    'thank you',
                                ],
                            ],
                            'az' => ['sentence' => 'burada mənim pomidor', 'correct' => ['burada', 'mənim', 'pomidor'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'هنا طماطم', 'correct' => ['هنا', 'طماطم'], 'extra' => ['شكرا']],
                            'ru' => ['sentence' => 'здесь мой помидор', 'correct' => ['здесь', 'мой', 'помидор'], 'extra' => ['спасибо']],
                            'es' => [
                                'sentence' => 'Aquí está mi tomate',
                                'correct' => [
                                    'aquí está',
                                    'mi',
                                    'tomate',
                                ],
                                'extra' => [
                                    'gracias',
                                    'cesta',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hier ist meine Tomate',
                                'correct' => [
                                    'hier ist',
                                    'meine',
                                    'Tomate',
                                ],
                                'extra' => [
                                    'danke',
                                    'Korb',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Voici ma tomate',
                                'correct' => [
                                    'voici',
                                    'ma',
                                    'tomate',
                                ],
                                'extra' => [
                                    'merci',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여기 제 토마토입니다',
                                'correct' => [
                                    '여기',
                                    '제',
                                    '토마토입니다',
                                ],
                                'extra' => [
                                    '감사합니다',
                                ],
                            ],
                            'tr' => ['sentence' => 'işte domatesim', 'correct' => ['işte', 'domatesim'], 'extra' => ['teşekkürler']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'ありがとう',
                            'ここ',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'thank you here',
                                'correct' => [
                                    'thank you',
                                    'here',
                                ],
                                'extra' => [
                                    'here is',
                                ],
                            ],
                            'az' => ['sentence' => 'təşəkkür burada', 'correct' => ['təşəkkür', 'burada'], 'extra' => []],
                            'ar' => ['sentence' => 'شكرا هنا', 'correct' => ['شكرا', 'هنا'], 'extra' => []],
                            'ru' => ['sentence' => 'спасибо здесь', 'correct' => ['спасибо', 'здесь'], 'extra' => []],
                            'es' => [
                                'sentence' => 'Gracias, aquí',
                                'correct' => [
                                    'gracias',
                                    'aquí',
                                ],
                                'extra' => [
                                    'aquí está',
                                    'tomate',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Danke, hier',
                                'correct' => [
                                    'danke',
                                    'hier',
                                ],
                                'extra' => [
                                    'hier ist',
                                    'Tomate',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Merci, ici',
                                'correct' => [
                                    'merci',
                                    'ici',
                                ],
                                'extra' => [
                                    'voici',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '감사합니다, 여기',
                                'correct' => [
                                    '감사합니다',
                                    '여기',
                                ],
                                'extra' => [
                                    '여기',
                                ],
                            ],
                            'tr' => ['sentence' => 'teşekkürler burada', 'correct' => ['teşekkürler', 'burada'], 'extra' => ['işte']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'これが',
                            'かご',
                            'です',
                            'ありがとう',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'here is the basket thank you',
                                'correct' => [
                                    'here is',
                                    'the',
                                    'basket',
                                    'thank you',
                                ],
                                'extra' => [
                                    'tomato',
                                ],
                            ],
                            'az' => ['sentence' => 'burada səbət təşəkkür', 'correct' => ['burada', 'səbət', 'təşəkkür'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'هنا سلة شكرا', 'correct' => ['هنا', 'سلة', 'شكرا'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'здесь корзина спасибо', 'correct' => ['здесь', 'корзина', 'спасибо'], 'extra' => ['помидор']],
                            'es' => [
                                'sentence' => 'Aquí está la cesta, gracias',
                                'correct' => [
                                    'aquí está',
                                    'la',
                                    'cesta',
                                    'gracias',
                                ],
                                'extra' => [
                                    'tomate',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hier ist der Korb, danke',
                                'correct' => [
                                    'hier ist',
                                    'der',
                                    'Korb',
                                    'danke',
                                ],
                                'extra' => [
                                    'Tomate',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Voici le panier, merci',
                                'correct' => [
                                    'voici',
                                    'le',
                                    'panier',
                                    'merci',
                                ],
                                'extra' => [
                                    'tomate',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여기 바구니입니다, 감사합니다',
                                'correct' => [
                                    '여기',
                                    '바구니입니다',
                                    '감사합니다',
                                ],
                                'extra' => [
                                    '토마토',
                                ],
                            ],
                            'tr' => ['sentence' => 'işte sepet teşekkürler', 'correct' => ['işte', 'sepet', 'teşekkürler'], 'extra' => ['domates']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
