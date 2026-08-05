<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation07Seeder extends Seeder
{
    private const PICTURES = [
        'calle' => 'street',
        'estación' => 'station',
        'tienda' => 'shop',
        'parque' => 'park',
        'escuela' => 'school',
        'casa' => 'house',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 7, the Spanish twin of the
     * English "Unit 7: Giving Directions" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unidad 7: Dar direcciones', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Calle y Estación', 1,
                pictures: [
                    [
                        'es' => 'calle',
                        'img' => 'street',
                    ],
                    [
                        'es' => 'estación',
                        'img' => 'station',
                    ],
                ],
                plain: [
                    [
                        'es' => 'recto',
                    ],
                    [
                        'es' => 'girar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ve',
                            'recto',
                            'por',
                            'la',
                            'calle',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go straight on the street',
                                'correct' => [
                                    'go',
                                    'straight',
                                    'on',
                                    'the',
                                    'street',
                                ],
                                'extra' => [
                                    'turn',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Geh geradeaus auf der Straße',
                                'correct' => [
                                    'gehen',
                                    'geradeaus',
                                    'auf',
                                    'der',
                                    'Straße',
                                ],
                                'extra' => [
                                    'abbiegen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Va tout droit sur la rue',
                                'correct' => [
                                    'aller',
                                    'tout droit',
                                    'sur',
                                    'la',
                                    'rue',
                                ],
                                'extra' => [
                                    'tourner',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '通りをまっすぐ行く',
                                'correct' => [
                                    '通り',
                                    'を',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '曲がる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거리를 똑바로 가다',
                                'correct' => [
                                    '거리를',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '돌다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Gira',
                            'a',
                            'la',
                            'derecha',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'turn right',
                                'correct' => [
                                    'turn',
                                    'right',
                                ],
                                'extra' => [
                                    'straight',
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Biege rechts ab',
                                'correct' => [
                                    'abbiegen',
                                    'rechts',
                                ],
                                'extra' => [
                                    'geradeaus',
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Tourne à droite',
                                'correct' => [
                                    'tourner',
                                    'droite',
                                ],
                                'extra' => [
                                    'tout droit',
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '右に曲がる',
                                'correct' => [
                                    '右',
                                    'に',
                                    '曲がる',
                                ],
                                'extra' => [
                                    'まっすぐ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오른쪽으로 돌다',
                                'correct' => [
                                    '오른쪽으로',
                                    '돌다',
                                ],
                                'extra' => [
                                    '똑바로',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ve',
                            'recto',
                            'a',
                            'la',
                            'estación',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go straight to the station',
                                'correct' => [
                                    'go',
                                    'straight',
                                    'to',
                                    'the',
                                    'station',
                                ],
                                'extra' => [
                                    'street',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Geh geradeaus zum Bahnhof',
                                'correct' => [
                                    'gehen',
                                    'geradeaus',
                                    'zu',
                                    'dem',
                                    'Bahnhof',
                                ],
                                'extra' => [
                                    'Straße',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Va tout droit jusqu\'à la gare',
                                'correct' => [
                                    'aller',
                                    'tout droit',
                                    'à',
                                    'la',
                                    'gare',
                                ],
                                'extra' => [
                                    'rue',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅までまっすぐ行く',
                                'correct' => [
                                    '駅',
                                    'まで',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '通り',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역까지 똑바로 가다',
                                'correct' => [
                                    '역까지',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '거리',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Calle y Parque', 2,
                pictures: [
                    [
                        'es' => 'calle',
                        'img' => 'street',
                    ],
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cruzar',
                    ],
                    [
                        'es' => 'continuar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Cruza',
                            'la',
                            'calle',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'cross the street',
                                'correct' => [
                                    'cross',
                                    'the',
                                    'street',
                                ],
                                'extra' => [
                                    'continue',
                                    'park',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Überquere die Straße',
                                'correct' => [
                                    'überqueren',
                                    'die',
                                    'Straße',
                                ],
                                'extra' => [
                                    'weitergehen',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Traverse la rue',
                                'correct' => [
                                    'traverser',
                                    'la',
                                    'rue',
                                ],
                                'extra' => [
                                    'continuer',
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '通りを渡る',
                                'correct' => [
                                    '通り',
                                    'を',
                                    '渡る',
                                ],
                                'extra' => [
                                    '続ける',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거리를 건너다',
                                'correct' => [
                                    '거리를',
                                    '건너다',
                                ],
                                'extra' => [
                                    '계속하다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Continúa',
                            'al',
                            'parque',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'continue to the park',
                                'correct' => [
                                    'continue',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'cross',
                                    'street',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Geh weiter zum Park',
                                'correct' => [
                                    'weitergehen',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'überqueren',
                                    'Straße',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Continue au parc',
                                'correct' => [
                                    'continuer',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'traverser',
                                    'rue',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '公園まで続ける',
                                'correct' => [
                                    '公園',
                                    'まで',
                                    '続ける',
                                ],
                                'extra' => [
                                    '渡る',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '공원까지 계속하다',
                                'correct' => [
                                    '공원까지',
                                    '계속하다',
                                ],
                                'extra' => [
                                    '건너다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Cruza',
                            'y',
                            'continúa',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'cross and continue',
                                'correct' => [
                                    'cross',
                                    'and',
                                    'continue',
                                ],
                                'extra' => [
                                    'park',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Überquere und geh weiter',
                                'correct' => [
                                    'überqueren',
                                    'und',
                                    'weitergehen',
                                ],
                                'extra' => [
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Traverse et continue',
                                'correct' => [
                                    'traverser',
                                    'et',
                                    'continuer',
                                ],
                                'extra' => [
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '渡って続ける',
                                'correct' => [
                                    '渡って',
                                    '続ける',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '건너서 계속하다',
                                'correct' => [
                                    '건너서',
                                    '계속하다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Tienda y Casa', 3,
                pictures: [
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'delante',
                    ],
                    [
                        'es' => 'detrás',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Delante',
                            'de',
                            'la',
                            'tienda',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'in front of the shop',
                                'correct' => [
                                    'in front',
                                    'of',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'behind',
                                    'house',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Vor dem Geschäft',
                                'correct' => [
                                    'vorne',
                                    'von',
                                    'dem',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'hinten',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Devant le magasin',
                                'correct' => [
                                    'devant',
                                    'de',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'derrière',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店の前に',
                                'correct' => [
                                    '店',
                                    'の前に',
                                ],
                                'extra' => [
                                    '後ろに',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게 앞에',
                                'correct' => [
                                    '가게',
                                    '앞에',
                                ],
                                'extra' => [
                                    '뒤에',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Detrás',
                            'de',
                            'la',
                            'casa',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'behind the house',
                                'correct' => [
                                    'behind',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'in front',
                                    'shop',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Hinter dem Haus',
                                'correct' => [
                                    'hinten',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'vorne',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Derrière la maison',
                                'correct' => [
                                    'derrière',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'devant',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家の後ろに',
                                'correct' => [
                                    '家',
                                    'の後ろに',
                                ],
                                'extra' => [
                                    '前に',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집 뒤에',
                                'correct' => [
                                    '집',
                                    '뒤에',
                                ],
                                'extra' => [
                                    '앞에',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Delante',
                            'o',
                            'detrás',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'in front or behind',
                                'correct' => [
                                    'in front',
                                    'or',
                                    'behind',
                                ],
                                'extra' => [
                                    'shop',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Vorne oder hinten',
                                'correct' => [
                                    'vorne',
                                    'oder',
                                    'hinten',
                                ],
                                'extra' => [
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Devant ou derrière',
                                'correct' => [
                                    'devant',
                                    'ou',
                                    'derrière',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '前か後ろ',
                                'correct' => [
                                    '前',
                                    'か',
                                    '後ろ',
                                ],
                                'extra' => [
                                    '店',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '앞에 또는 뒤에',
                                'correct' => [
                                    '앞에',
                                    '또는',
                                    '뒤에',
                                ],
                                'extra' => [
                                    '가게',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Estación y Escuela', 4,
                pictures: [
                    [
                        'es' => 'estación',
                        'img' => 'station',
                    ],
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'es' => 'norte',
                    ],
                    [
                        'es' => 'sur',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'estación',
                            'está',
                            'al',
                            'norte',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the station is north',
                                'correct' => [
                                    'the',
                                    'station',
                                    'is',
                                    'north',
                                ],
                                'extra' => [
                                    'south',
                                    'school',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Bahnhof ist im Norden',
                                'correct' => [
                                    'der',
                                    'Bahnhof',
                                    'ist',
                                    'Norden',
                                ],
                                'extra' => [
                                    'Süden',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La gare est au nord',
                                'correct' => [
                                    'la',
                                    'gare',
                                    'est',
                                    'nord',
                                ],
                                'extra' => [
                                    'sud',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅は北にあります',
                                'correct' => [
                                    '駅',
                                    'は',
                                    '北',
                                    'に',
                                    'あります',
                                ],
                                'extra' => [
                                    '南',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역은 북쪽에 있습니다',
                                'correct' => [
                                    '역은',
                                    '북쪽에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '남쪽',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'escuela',
                            'está',
                            'al',
                            'sur',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school is south',
                                'correct' => [
                                    'the',
                                    'school',
                                    'is',
                                    'south',
                                ],
                                'extra' => [
                                    'north',
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Schule ist im Süden',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'ist',
                                    'Süden',
                                ],
                                'extra' => [
                                    'Norden',
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école est au sud',
                                'correct' => [
                                    'le',
                                    'école',
                                    'est',
                                    'sud',
                                ],
                                'extra' => [
                                    'nord',
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校は南にあります',
                                'correct' => [
                                    '学校',
                                    'は',
                                    '南',
                                    'に',
                                    'あります',
                                ],
                                'extra' => [
                                    '北',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교는 남쪽에 있습니다',
                                'correct' => [
                                    '학교는',
                                    '남쪽에',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '북쪽',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Norte',
                            'o',
                            'sur',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'north or south',
                                'correct' => [
                                    'north',
                                    'or',
                                    'south',
                                ],
                                'extra' => [
                                    'school',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Norden oder Süden',
                                'correct' => [
                                    'Norden',
                                    'oder',
                                    'Süden',
                                ],
                                'extra' => [
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Nord ou sud',
                                'correct' => [
                                    'nord',
                                    'ou',
                                    'sud',
                                ],
                                'extra' => [
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '北か南',
                                'correct' => [
                                    '北',
                                    'か',
                                    '南',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '북쪽 또는 남쪽',
                                'correct' => [
                                    '북쪽',
                                    '또는',
                                    '남쪽',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Estación y Calle', 5,
                pictures: [
                    [
                        'es' => 'estación',
                        'img' => 'station',
                    ],
                    [
                        'es' => 'calle',
                        'img' => 'street',
                    ],
                ],
                plain: [
                    [
                        'es' => 'girar',
                    ],
                    [
                        'es' => 'recto',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Gira',
                            'a',
                            'la',
                            'derecha',
                            'en',
                            'la',
                            'estación',
                        ],
                        'blank' => 6,
                        'tr' => [
                            'en' => [
                                'sentence' => 'turn right at the station',
                                'correct' => [
                                    'turn',
                                    'right',
                                    'at',
                                    'the',
                                    'station',
                                ],
                                'extra' => [
                                    'straight',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Biege am Bahnhof rechts ab',
                                'correct' => [
                                    'abbiegen',
                                    'rechts',
                                    'an',
                                    'dem',
                                    'Bahnhof',
                                ],
                                'extra' => [
                                    'geradeaus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Tourne à droite à la gare',
                                'correct' => [
                                    'tourner',
                                    'droite',
                                    'à',
                                    'la',
                                    'gare',
                                ],
                                'extra' => [
                                    'tout droit',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅で右に曲がる',
                                'correct' => [
                                    '駅',
                                    'で',
                                    '右',
                                    'に',
                                    '曲がる',
                                ],
                                'extra' => [
                                    'まっすぐ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역에서 오른쪽으로 돌다',
                                'correct' => [
                                    '역에서',
                                    '오른쪽으로',
                                    '돌다',
                                ],
                                'extra' => [
                                    '똑바로',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ve',
                            'recto',
                            'por',
                            'la',
                            'calle',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go straight on the street',
                                'correct' => [
                                    'go',
                                    'straight',
                                    'on',
                                    'the',
                                    'street',
                                ],
                                'extra' => [
                                    'turn',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Geh geradeaus auf der Straße',
                                'correct' => [
                                    'gehen',
                                    'geradeaus',
                                    'auf',
                                    'der',
                                    'Straße',
                                ],
                                'extra' => [
                                    'abbiegen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Va tout droit sur la rue',
                                'correct' => [
                                    'aller',
                                    'tout droit',
                                    'sur',
                                    'la',
                                    'rue',
                                ],
                                'extra' => [
                                    'tourner',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '通りをまっすぐ行く',
                                'correct' => [
                                    '通り',
                                    'を',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '曲がる',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '거리를 똑바로 가다',
                                'correct' => [
                                    '거리를',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '돌다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Gira',
                            'y',
                            've',
                            'recto',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'turn and go straight',
                                'correct' => [
                                    'turn',
                                    'and',
                                    'go',
                                    'straight',
                                ],
                                'extra' => [
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Bieg ab und geh geradeaus',
                                'correct' => [
                                    'abbiegen',
                                    'und',
                                    'gehen',
                                    'geradeaus',
                                ],
                                'extra' => [
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Tourne et va tout droit',
                                'correct' => [
                                    'tourner',
                                    'et',
                                    'aller',
                                    'tout droit',
                                ],
                                'extra' => [
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '曲がってまっすぐ行く',
                                'correct' => [
                                    '曲がって',
                                    'まっすぐ',
                                    '行く',
                                ],
                                'extra' => [
                                    '駅',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '돌아서 똑바로 가다',
                                'correct' => [
                                    '돌아서',
                                    '똑바로',
                                    '가다',
                                ],
                                'extra' => [
                                    '역',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
