<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitSupermarket09Seeder extends Seeder
{
    private const PICTURES = [
        'Regal' => 'shelf',
        'Karotte' => 'carrot',
        'Tomate' => 'tomato',
        'Liste' => 'list',
        'Kasse' => 'checkout',
        'Orange' => 'orange',
        'Trauben' => 'grapes',
        'Korb' => 'basket',
    ];

    /**
     * German Chapter 4 (Supermarket), Unit 9, the German twin of the
     * English "Unit 9: Asking Where Things Are" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Einheit 9: Nach dem Weg fragen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Regal & Karotte', 1,
                pictures: [
                    [
                        'de' => 'Regal',
                        'img' => 'shelf',
                    ],
                    [
                        'de' => 'Karotte',
                        'img' => 'carrot',
                    ],
                ],
                plain: [
                    [
                        'de' => 'entschuldigen Sie',
                    ],
                    [
                        'de' => 'suchen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Entschuldigen',
                            'Sie',
                            'wo',
                            'ist',
                            'das',
                            'Regal',
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
                            'Eine',
                            'Karotte',
                            'suchen',
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
                                    'aisle',
                                ],
                            ],
                            'az' => ['sentence' => 'axtarmaq bir yerkökü', 'correct' => ['axtarmaq', 'bir', 'yerkökü'], 'extra' => ['bağışlayın', 'şöbə']],
                            'ar' => ['sentence' => 'البحث جزر', 'correct' => ['البحث', 'جزر'], 'extra' => ['عفوا', 'قسم']],
                            'ru' => ['sentence' => 'искать морковь', 'correct' => ['искать', 'морковь'], 'extra' => ['извините', 'отдел']],
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
                            'Das',
                            'Regal',
                            'suchen',
                        ],
                        'blank' => 1,
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
            $builder->lesson('Lektion 2: Tomate & Liste', 2,
                pictures: [
                    [
                        'de' => 'Tomate',
                        'img' => 'tomato',
                    ],
                    [
                        'de' => 'Liste',
                        'img' => 'list',
                    ],
                ],
                plain: [
                    [
                        'de' => 'können Sie',
                    ],
                    [
                        'de' => 'finden',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Können',
                            'Sie',
                            'eine',
                            'Tomate',
                            'finden',
                        ],
                        'blank' => 0,
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
                            'Meine',
                            'Liste',
                            'finden',
                        ],
                        'blank' => 1,
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
                            'Können',
                            'Sie',
                            'meine',
                            'Liste',
                            'finden',
                        ],
                        'blank' => 0,
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
            $builder->lesson('Lektion 3: Kasse & Regal', 3,
                pictures: [
                    [
                        'de' => 'Kasse',
                        'img' => 'checkout',
                    ],
                    [
                        'de' => 'Regal',
                        'img' => 'shelf',
                    ],
                ],
                plain: [
                    [
                        'de' => 'nah',
                    ],
                    [
                        'de' => 'weit',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Kasse',
                            'ist',
                            'nah',
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
                            'Das',
                            'Regal',
                            'ist',
                            'weit',
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
                            'Nah',
                            'oder',
                            'weit',
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
            $builder->lesson('Lektion 4: Orange & Trauben', 4,
                pictures: [
                    [
                        'de' => 'Orange',
                        'img' => 'orange',
                    ],
                    [
                        'de' => 'Trauben',
                        'img' => 'grapes',
                    ],
                ],
                plain: [
                    [
                        'de' => 'links',
                    ],
                    [
                        'de' => 'rechts',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eine',
                            'Orange',
                            'links',
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
                                    'grapes',
                                ],
                            ],
                            'az' => ['sentence' => 'bir portağal üzərində sol', 'correct' => ['bir', 'portağal', 'üzərində', 'sol'], 'extra' => ['sağ', 'üzüm']],
                            'ar' => ['sentence' => 'برتقالة على يسار', 'correct' => ['برتقالة', 'على', 'يسار'], 'extra' => ['يمين', 'عنب']],
                            'ru' => ['sentence' => 'апельсин на левый', 'correct' => ['апельсин', 'на', 'левый'], 'extra' => ['правый', 'виноград']],
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
                            'Die',
                            'Trauben',
                            'rechts',
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
                                    'orange',
                                ],
                            ],
                            'az' => ['sentence' => 'üzüm üzərində sağ', 'correct' => ['üzüm', 'üzərində', 'sağ'], 'extra' => ['sol', 'portağal']],
                            'ar' => ['sentence' => 'عنب على يمين', 'correct' => ['عنب', 'على', 'يمين'], 'extra' => ['يسار', 'برتقالة']],
                            'ru' => ['sentence' => 'виноград на правый', 'correct' => ['виноград', 'на', 'правый'], 'extra' => ['левый', 'апельсин']],
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
                            'Links',
                            'oder',
                            'rechts',
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
            $builder->lesson('Lektion 5: Korb & Tomate', 5,
                pictures: [
                    [
                        'de' => 'Korb',
                        'img' => 'basket',
                    ],
                    [
                        'de' => 'Tomate',
                        'img' => 'tomato',
                    ],
                ],
                plain: [
                    [
                        'de' => 'hier ist',
                    ],
                    [
                        'de' => 'danke',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hier',
                            'ist',
                            'meine',
                            'Tomate',
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
                            'Danke',
                            'hier',
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
                            'Hier',
                            'ist',
                            'der',
                            'Korb',
                            'danke',
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
