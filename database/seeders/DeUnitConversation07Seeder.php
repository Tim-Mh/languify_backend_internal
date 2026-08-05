<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation07Seeder extends Seeder
{
    private const PICTURES = [
        'Straße' => 'street',
        'Bahnhof' => 'station',
        'Geschäft' => 'shop',
        'Park' => 'park',
        'Schule' => 'school',
        'Haus' => 'house',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 7, the German twin of the
     * English "Unit 7: Giving Directions" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Einheit 7: Den Weg beschreiben', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Straße & Bahnhof', 1,
                pictures: [
                    [
                        'de' => 'Straße',
                        'img' => 'street',
                    ],
                    [
                        'de' => 'Bahnhof',
                        'img' => 'station',
                    ],
                ],
                plain: [
                    [
                        'de' => 'geradeaus',
                    ],
                    [
                        'de' => 'abbiegen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Geh',
                            'geradeaus',
                            'auf',
                            'der',
                            'Straße',
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
                            'es' => [
                                'sentence' => 'Ve recto por la calle',
                                'correct' => [
                                    'ir',
                                    'recto',
                                    'sobre',
                                    'la',
                                    'calle',
                                ],
                                'extra' => [
                                    'girar',
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
                            'Biege',
                            'rechts',
                            'ab',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Gira a la derecha',
                                'correct' => [
                                    'girar',
                                    'derecha',
                                ],
                                'extra' => [
                                    'recto',
                                    'estación',
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
                            'Geh',
                            'geradeaus',
                            'zum',
                            'Bahnhof',
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
                            'es' => [
                                'sentence' => 'Ve recto a la estación',
                                'correct' => [
                                    'ir',
                                    'recto',
                                    'a',
                                    'la',
                                    'estación',
                                ],
                                'extra' => [
                                    'calle',
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
            $builder->lesson('Lektion 2: Straße & Park', 2,
                pictures: [
                    [
                        'de' => 'Straße',
                        'img' => 'street',
                    ],
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'de' => 'überqueren',
                    ],
                    [
                        'de' => 'weitergehen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Überquere',
                            'die',
                            'Straße',
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
                            'es' => [
                                'sentence' => 'Cruza la calle',
                                'correct' => [
                                    'cruzar',
                                    'la',
                                    'calle',
                                ],
                                'extra' => [
                                    'continuar',
                                    'parque',
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
                            'Geh',
                            'weiter',
                            'zum',
                            'Park',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'Continúa al parque',
                                'correct' => [
                                    'continuar',
                                    'a',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'cruzar',
                                    'calle',
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
                            'Überquere',
                            'und',
                            'geh',
                            'weiter',
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
                            'es' => [
                                'sentence' => 'Cruza y continúa',
                                'correct' => [
                                    'cruzar',
                                    'y',
                                    'continuar',
                                ],
                                'extra' => [
                                    'parque',
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
            $builder->lesson('Lektion 3: Geschäft & Haus', 3,
                pictures: [
                    [
                        'de' => 'Geschäft',
                        'img' => 'shop',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'vorne',
                    ],
                    [
                        'de' => 'hinten',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vor',
                            'dem',
                            'Geschäft',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Delante de la tienda',
                                'correct' => [
                                    'delante',
                                    'de',
                                    'la',
                                    'tienda',
                                ],
                                'extra' => [
                                    'detrás',
                                    'casa',
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
                            'Hinter',
                            'dem',
                            'Haus',
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
                            'es' => [
                                'sentence' => 'Detrás de la casa',
                                'correct' => [
                                    'detrás',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'delante',
                                    'tienda',
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
                            'Vorne',
                            'oder',
                            'hinten',
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
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Delante o detrás',
                                'correct' => [
                                    'delante',
                                    'o',
                                    'detrás',
                                ],
                                'extra' => [
                                    'tienda',
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
            $builder->lesson('Lektion 4: Bahnhof & Schule', 4,
                pictures: [
                    [
                        'de' => 'Bahnhof',
                        'img' => 'station',
                    ],
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Norden',
                    ],
                    [
                        'de' => 'Süden',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Bahnhof',
                            'ist',
                            'im',
                            'Norden',
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
                            'es' => [
                                'sentence' => 'La estación está al norte',
                                'correct' => [
                                    'la',
                                    'estación',
                                    'está',
                                    'norte',
                                ],
                                'extra' => [
                                    'sur',
                                    'escuela',
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
                            'Die',
                            'Schule',
                            'ist',
                            'im',
                            'Süden',
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
                            'es' => [
                                'sentence' => 'La escuela está al sur',
                                'correct' => [
                                    'la',
                                    'escuela',
                                    'está',
                                    'sur',
                                ],
                                'extra' => [
                                    'norte',
                                    'estación',
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
                            'Norden',
                            'oder',
                            'Süden',
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
                            'es' => [
                                'sentence' => 'Norte o sur',
                                'correct' => [
                                    'norte',
                                    'o',
                                    'sur',
                                ],
                                'extra' => [
                                    'escuela',
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
            $builder->lesson('Lektion 5: Bahnhof & Straße', 5,
                pictures: [
                    [
                        'de' => 'Bahnhof',
                        'img' => 'station',
                    ],
                    [
                        'de' => 'Straße',
                        'img' => 'street',
                    ],
                ],
                plain: [
                    [
                        'de' => 'abbiegen',
                    ],
                    [
                        'de' => 'geradeaus',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Biege',
                            'am',
                            'Bahnhof',
                            'rechts',
                            'ab',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Gira a la derecha en la estación',
                                'correct' => [
                                    'girar',
                                    'derecha',
                                    'en',
                                    'la',
                                    'estación',
                                ],
                                'extra' => [
                                    'recto',
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
                            'Geh',
                            'geradeaus',
                            'auf',
                            'der',
                            'Straße',
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
                            'es' => [
                                'sentence' => 'Ve recto por la calle',
                                'correct' => [
                                    'ir',
                                    'recto',
                                    'sobre',
                                    'la',
                                    'calle',
                                ],
                                'extra' => [
                                    'girar',
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
                            'Bieg',
                            'ab',
                            'und',
                            'geh',
                            'geradeaus',
                        ],
                        'blank' => 2,
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
                            'es' => [
                                'sentence' => 'Gira y ve recto',
                                'correct' => [
                                    'girar',
                                    'y',
                                    'ir',
                                    'recto',
                                ],
                                'extra' => [
                                    'estación',
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
