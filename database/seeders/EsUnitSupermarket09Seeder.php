<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitSupermarket09Seeder extends Seeder
{
    private const PICTURES = [
        'pasillo' => 'shelf',
        'zanahoria' => 'carrot',
        'tomate' => 'tomato',
        'lista' => 'list',
        'caja' => 'checkout',
        'naranja' => 'orange',
        'uvas' => 'grapes',
        'cesta' => 'basket',
    ];

    /**
     * Spanish Chapter 4 (Supermarket), Unit 9, the Spanish twin of the
     * English "Unit 9: Asking Where Things Are" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unidad 9: Preguntar dónde están las cosas', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Pasillo y Zanahoria', 1,
                pictures: [
                    [
                        'es' => 'pasillo',
                        'img' => 'shelf',
                    ],
                    [
                        'es' => 'zanahoria',
                        'img' => 'carrot',
                    ],
                ],
                plain: [
                    [
                        'es' => 'disculpe',
                    ],
                    [
                        'es' => 'buscar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Disculpe',
                            'dónde',
                            'está',
                            'el',
                            'pasillo',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'すみません、売り場はどこですか',
                                'correct' => [
                                    'すみません',
                                    '売り場',
                                    'は',
                                    'どこですか',
                                ],
                                'extra' => [
                                    '探す',
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
                            'Buscar',
                            'una',
                            'zanahoria',
                        ],
                        'blank' => 0,
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
                                    'aisle',
                                ],
                            ],
                            'az' => ['sentence' => 'axtarmaq bir yerkökü', 'correct' => ['axtarmaq', 'bir', 'yerkökü'], 'extra' => ['bağışlayın', 'şöbə']],
                            'ar' => ['sentence' => 'البحث جزر', 'correct' => ['البحث', 'جزر'], 'extra' => ['عفوا', 'قسم']],
                            'ru' => ['sentence' => 'искать морковь', 'correct' => ['искать', 'морковь'], 'extra' => ['извините', 'отдел']],
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
                            'ja' => [
                                'sentence' => 'にんじんを探す',
                                'correct' => [
                                    'にんじん',
                                    'を',
                                    '探す',
                                ],
                                'extra' => [
                                    'すみません',
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
                            'tr' => ['sentence' => 'bir havuç aramak', 'correct' => ['bir', 'havuç', 'aramak'], 'extra' => ['affedersiniz', 'reyon']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Buscar',
                            'el',
                            'pasillo',
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
                            'ja' => [
                                'sentence' => '売り場を探す',
                                'correct' => [
                                    '売り場',
                                    'を',
                                    '探す',
                                ],
                                'extra' => [
                                    'にんじん',
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
            $builder->lesson('Lección 2: Tomate y Lista', 2,
                pictures: [
                    [
                        'es' => 'tomate',
                        'img' => 'tomato',
                    ],
                    [
                        'es' => 'lista',
                        'img' => 'list',
                    ],
                ],
                plain: [
                    [
                        'es' => 'puede usted',
                    ],
                    [
                        'es' => 'encontrar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Puede',
                            'encontrar',
                            'un',
                            'tomate',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => 'トマトを見つけてもらえますか',
                                'correct' => [
                                    'トマト',
                                    'を',
                                    '見つけて',
                                    'もらえます',
                                    'か',
                                ],
                                'extra' => [
                                    'リスト',
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
                            'Encontrar',
                            'mi',
                            'lista',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => '私のリストを見つける',
                                'correct' => [
                                    '私の',
                                    'リスト',
                                    'を',
                                    '見つける',
                                ],
                                'extra' => [
                                    'トマト',
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
                            'Puede',
                            'encontrar',
                            'mi',
                            'lista',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '私のリストを見つけてもらえますか',
                                'correct' => [
                                    '私の',
                                    'リスト',
                                    'を',
                                    '見つけて',
                                    'もらえます',
                                    'か',
                                ],
                                'extra' => [
                                    'トマト',
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
            $builder->lesson('Lección 3: Caja y Pasillo', 3,
                pictures: [
                    [
                        'es' => 'caja',
                        'img' => 'checkout',
                    ],
                    [
                        'es' => 'pasillo',
                        'img' => 'shelf',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cerca',
                    ],
                    [
                        'es' => 'lejos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'caja',
                            'está',
                            'cerca',
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
                                    'aisle',
                                ],
                            ],
                            'az' => ['sentence' => 'kassa yaxın', 'correct' => ['kassa', 'yaxın'], 'extra' => ['uzaq', 'şöbə']],
                            'ar' => ['sentence' => 'صندوق الدفع قريب', 'correct' => ['صندوق الدفع', 'قريب'], 'extra' => ['بعيد', 'قسم']],
                            'ru' => ['sentence' => 'касса близко', 'correct' => ['касса', 'близко'], 'extra' => ['далеко', 'отдел']],
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
                            'ja' => [
                                'sentence' => 'レジは近いです',
                                'correct' => [
                                    'レジ',
                                    'は',
                                    '近い',
                                    'です',
                                ],
                                'extra' => [
                                    '遠く',
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
                            'tr' => ['sentence' => 'kasa yakın', 'correct' => ['kasa', 'yakın'], 'extra' => ['uzak', 'reyon']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'pasillo',
                            'está',
                            'lejos',
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
                                    'checkout',
                                ],
                            ],
                            'az' => ['sentence' => 'şöbə uzaq', 'correct' => ['şöbə', 'uzaq'], 'extra' => ['yaxın', 'kassa']],
                            'ar' => ['sentence' => 'قسم بعيد', 'correct' => ['قسم', 'بعيد'], 'extra' => ['قريب', 'صندوق الدفع']],
                            'ru' => ['sentence' => 'отдел далеко', 'correct' => ['отдел', 'далеко'], 'extra' => ['близко', 'касса']],
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
                            'ja' => [
                                'sentence' => '売り場は遠いです',
                                'correct' => [
                                    '売り場',
                                    'は',
                                    '遠い',
                                    'です',
                                ],
                                'extra' => [
                                    '近く',
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
                            'tr' => ['sentence' => 'reyon uzak', 'correct' => ['reyon', 'uzak'], 'extra' => ['yakın', 'kasa']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Cerca',
                            'o',
                            'lejos',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '近くか遠く',
                                'correct' => [
                                    '近く',
                                    'か',
                                    '遠く',
                                ],
                                'extra' => [
                                    'レジ',
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
            $builder->lesson('Lección 4: Naranja y Uvas', 4,
                pictures: [
                    [
                        'es' => 'naranja',
                        'img' => 'orange',
                    ],
                    [
                        'es' => 'uvas',
                        'img' => 'grapes',
                    ],
                ],
                plain: [
                    [
                        'es' => 'izquierda',
                    ],
                    [
                        'es' => 'derecha',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'naranja',
                            'a',
                            'la',
                            'izquierda',
                        ],
                        'blank' => 4,
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
                                    'grapes',
                                ],
                            ],
                            'az' => ['sentence' => 'bir portağal üzərində sol', 'correct' => ['bir', 'portağal', 'üzərində', 'sol'], 'extra' => ['sağ', 'üzüm']],
                            'ar' => ['sentence' => 'برتقالة على يسار', 'correct' => ['برتقالة', 'على', 'يسار'], 'extra' => ['يمين', 'عنب']],
                            'ru' => ['sentence' => 'апельсин на левый', 'correct' => ['апельсин', 'на', 'левый'], 'extra' => ['правый', 'виноград']],
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
                            'ja' => [
                                'sentence' => '左のオレンジ',
                                'correct' => [
                                    '左',
                                    'の',
                                    'オレンジ',
                                ],
                                'extra' => [
                                    '右',
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
                            'tr' => ['sentence' => 'solda bir portakal', 'correct' => ['solda', 'bir', 'portakal'], 'extra' => ['sağ', 'üzüm']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Las',
                            'uvas',
                            'a',
                            'la',
                            'derecha',
                        ],
                        'blank' => 4,
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
                                    'orange',
                                ],
                            ],
                            'az' => ['sentence' => 'üzüm üzərində sağ', 'correct' => ['üzüm', 'üzərində', 'sağ'], 'extra' => ['sol', 'portağal']],
                            'ar' => ['sentence' => 'عنب على يمين', 'correct' => ['عنب', 'على', 'يمين'], 'extra' => ['يسار', 'برتقالة']],
                            'ru' => ['sentence' => 'виноград на правый', 'correct' => ['виноград', 'на', 'правый'], 'extra' => ['левый', 'апельсин']],
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
                            'ja' => [
                                'sentence' => '右のぶどう',
                                'correct' => [
                                    '右',
                                    'の',
                                    'ぶどう',
                                ],
                                'extra' => [
                                    '左',
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
                            'tr' => ['sentence' => 'sağda üzüm', 'correct' => ['sağda', 'üzüm'], 'extra' => ['sol', 'portakal']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Izquierda',
                            'o',
                            'derecha',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '左か右',
                                'correct' => [
                                    '左',
                                    'か',
                                    '右',
                                ],
                                'extra' => [
                                    'オレンジ',
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
            $builder->lesson('Lección 5: Cesta y Tomate', 5,
                pictures: [
                    [
                        'es' => 'cesta',
                        'img' => 'basket',
                    ],
                    [
                        'es' => 'tomate',
                        'img' => 'tomato',
                    ],
                ],
                plain: [
                    [
                        'es' => 'aquí está',
                    ],
                    [
                        'es' => 'gracias',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Aquí',
                            'está',
                            'mi',
                            'tomate',
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
                                    'basket',
                                ],
                            ],
                            'az' => ['sentence' => 'burada mənim pomidor', 'correct' => ['burada', 'mənim', 'pomidor'], 'extra' => ['təşəkkür', 'səbət']],
                            'ar' => ['sentence' => 'هنا طماطم', 'correct' => ['هنا', 'طماطم'], 'extra' => ['شكرا', 'سلة']],
                            'ru' => ['sentence' => 'здесь мой помидор', 'correct' => ['здесь', 'мой', 'помидор'], 'extra' => ['спасибо', 'корзина']],
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
                            'ja' => [
                                'sentence' => 'これが私のトマトです',
                                'correct' => [
                                    'これが',
                                    '私の',
                                    'トマト',
                                    'です',
                                ],
                                'extra' => [
                                    'ありがとう',
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
                            'tr' => ['sentence' => 'işte domatesim', 'correct' => ['işte', 'domatesim'], 'extra' => ['teşekkürler', 'sepet']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Gracias',
                            'aquí',
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
                                    'tomato',
                                ],
                            ],
                            'az' => ['sentence' => 'təşəkkür burada', 'correct' => ['təşəkkür', 'burada'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'شكرا هنا', 'correct' => ['شكرا', 'هنا'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'спасибо здесь', 'correct' => ['спасибо', 'здесь'], 'extra' => ['помидор']],
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
                            'ja' => [
                                'sentence' => 'ありがとう、ここ',
                                'correct' => [
                                    'ありがとう',
                                    'ここ',
                                ],
                                'extra' => [
                                    'これが',
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
                            'tr' => ['sentence' => 'teşekkürler burada', 'correct' => ['teşekkürler', 'burada'], 'extra' => ['işte', 'domates']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Aquí',
                            'está',
                            'la',
                            'cesta',
                            'gracias',
                        ],
                        'blank' => 4,
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
                            'ja' => [
                                'sentence' => 'これがかごです、ありがとう',
                                'correct' => [
                                    'これが',
                                    'かご',
                                    'です',
                                    'ありがとう',
                                ],
                                'extra' => [
                                    'トマト',
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
