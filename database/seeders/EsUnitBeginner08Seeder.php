<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner08Seeder extends Seeder
{
    private const PICTURES = [
        'escuela' => 'school',
        'parque' => 'park',
        'tienda' => 'shop',
        'calle' => 'street',
        'estación' => 'station',
        'casa' => 'house',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 8, the Spanish twin of the
     * English "Unit 8: Places in Town" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unidad 8: Lugares en la ciudad', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Escuela y Tienda', 1,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ciudad',
                    ],
                    [
                        'es' => 'pueblo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'ciudad',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the town',
                                'correct' => [
                                    'the',
                                    'town',
                                ],
                                'extra' => [
                                    'village',
                                    'school',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Stadt',
                                'correct' => [
                                    'die',
                                    'Stadt',
                                ],
                                'extra' => [
                                    'Dorf',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La ville',
                                'correct' => [
                                    'la',
                                    'ville',
                                ],
                                'extra' => [
                                    'village',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '町',
                                'correct' => [
                                    '町',
                                ],
                                'extra' => [
                                    '村',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '도시',
                                'correct' => [
                                    '도시',
                                ],
                                'extra' => [
                                    '마을',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'pueblo',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the village',
                                'correct' => [
                                    'the',
                                    'village',
                                ],
                                'extra' => [
                                    'town',
                                    'shop',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Dorf',
                                'correct' => [
                                    'das',
                                    'Dorf',
                                ],
                                'extra' => [
                                    'Stadt',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le village',
                                'correct' => [
                                    'le',
                                    'village',
                                ],
                                'extra' => [
                                    'ville',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '村',
                                'correct' => [
                                    '村',
                                ],
                                'extra' => [
                                    '町',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '마을',
                                'correct' => [
                                    '마을',
                                ],
                                'extra' => [
                                    '도시',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'La',
                            'escuela',
                            'y',
                            'la',
                            'tienda',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school and the shop',
                                'correct' => [
                                    'the',
                                    'school',
                                    'and',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'town',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Schule und das Geschäft',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'und',
                                    'das',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'Stadt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école et le magasin',
                                'correct' => [
                                    'école',
                                    'et',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'ville',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校と店',
                                'correct' => [
                                    '学校',
                                    'と',
                                    '店',
                                ],
                                'extra' => [
                                    '町',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교와 가게',
                                'correct' => [
                                    '학교와',
                                    '가게',
                                ],
                                'extra' => [
                                    '도시',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Escuela y Estación', 2,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'estación',
                        'img' => 'station',
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
                            'escuela',
                            'está',
                            'cerca',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school is near',
                                'correct' => [
                                    'the',
                                    'school',
                                    'is',
                                    'near',
                                ],
                                'extra' => [
                                    'far',
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Schule ist nah',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'ist',
                                    'nah',
                                ],
                                'extra' => [
                                    'weit',
                                    'Bahnhof',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école est près',
                                'correct' => [
                                    'école',
                                    'est',
                                    'près',
                                ],
                                'extra' => [
                                    'loin',
                                    'gare',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校は近いです',
                                'correct' => [
                                    '学校',
                                    'は',
                                    '近い',
                                    'です',
                                ],
                                'extra' => [
                                    '遠く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교는 가깝습니다',
                                'correct' => [
                                    '학교는',
                                    '가깝습니다',
                                ],
                                'extra' => [
                                    '멀리',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'estación',
                            'está',
                            'lejos',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the station is far',
                                'correct' => [
                                    'the',
                                    'station',
                                    'is',
                                    'far',
                                ],
                                'extra' => [
                                    'near',
                                    'school',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Bahnhof ist weit',
                                'correct' => [
                                    'der',
                                    'Bahnhof',
                                    'ist',
                                    'weit',
                                ],
                                'extra' => [
                                    'nah',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La gare est loin',
                                'correct' => [
                                    'la',
                                    'gare',
                                    'est',
                                    'loin',
                                ],
                                'extra' => [
                                    'près',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '駅は遠いです',
                                'correct' => [
                                    '駅',
                                    'は',
                                    '遠い',
                                    'です',
                                ],
                                'extra' => [
                                    '近く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '역은 멉니다',
                                'correct' => [
                                    '역은',
                                    '멉니다',
                                ],
                                'extra' => [
                                    '가까이',
                                ],
                            ],
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
                                    'school',
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
                                    'Schule',
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
                                    'école',
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
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가깝거나 멀리',
                                'correct' => [
                                    '가깝거나',
                                    '멀리',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Parque y Tienda', 3,
                pictures: [
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                ],
                plain: [
                    [
                        'es' => 'ir',
                    ],
                    [
                        'es' => 'venir',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ir',
                            'al',
                            'parque',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go to the park',
                                'correct' => [
                                    'go',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'come',
                                    'shop',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Zum Park gehen',
                                'correct' => [
                                    'gehen',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'kommen',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Aller au parc',
                                'correct' => [
                                    'aller',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'venir',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '公園へ行く',
                                'correct' => [
                                    '公園',
                                    'へ',
                                    '行く',
                                ],
                                'extra' => [
                                    '来る',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '공원으로 가다',
                                'correct' => [
                                    '공원으로',
                                    '가다',
                                ],
                                'extra' => [
                                    '오다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Venir',
                            'a',
                            'la',
                            'tienda',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'come to the shop',
                                'correct' => [
                                    'come',
                                    'to',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'go',
                                    'park',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Zum Geschäft kommen',
                                'correct' => [
                                    'kommen',
                                    'zu',
                                    'dem',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'gehen',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Venir au magasin',
                                'correct' => [
                                    'venir',
                                    'à',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'aller',
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店へ来る',
                                'correct' => [
                                    '店',
                                    'へ',
                                    '来る',
                                ],
                                'extra' => [
                                    '行く',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게로 오다',
                                'correct' => [
                                    '가게로',
                                    '오다',
                                ],
                                'extra' => [
                                    '가다',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ir',
                            'y',
                            'venir',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'go and come',
                                'correct' => [
                                    'go',
                                    'and',
                                    'come',
                                ],
                                'extra' => [
                                    'park',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Gehen und kommen',
                                'correct' => [
                                    'gehen',
                                    'und',
                                    'kommen',
                                ],
                                'extra' => [
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Aller et venir',
                                'correct' => [
                                    'aller',
                                    'et',
                                    'venir',
                                ],
                                'extra' => [
                                    'parc',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '行って来る',
                                'correct' => [
                                    '行って',
                                    '来る',
                                ],
                                'extra' => [
                                    '公園',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가고 오다',
                                'correct' => [
                                    '가고',
                                    '오다',
                                ],
                                'extra' => [
                                    '공원',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Calle y Estación', 4,
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
                        'es' => 'izquierda',
                    ],
                    [
                        'es' => 'derecha',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'calle',
                            'a',
                            'la',
                            'izquierda',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the street on the left',
                                'correct' => [
                                    'the',
                                    'street',
                                    'on',
                                    'the',
                                    'left',
                                ],
                                'extra' => [
                                    'right',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Straße links',
                                'correct' => [
                                    'die',
                                    'Straße',
                                    'auf',
                                    'der',
                                    'links',
                                ],
                                'extra' => [
                                    'rechts',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La rue à gauche',
                                'correct' => [
                                    'la',
                                    'rue',
                                    'sur',
                                    'la',
                                    'gauche',
                                ],
                                'extra' => [
                                    'droite',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '左の通り',
                                'correct' => [
                                    '左',
                                    'の',
                                    '通り',
                                ],
                                'extra' => [
                                    '右',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '왼쪽의 거리',
                                'correct' => [
                                    '왼쪽의',
                                    '거리',
                                ],
                                'extra' => [
                                    '오른쪽',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'estación',
                            'a',
                            'la',
                            'derecha',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the station on the right',
                                'correct' => [
                                    'the',
                                    'station',
                                    'on',
                                    'the',
                                    'right',
                                ],
                                'extra' => [
                                    'left',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Bahnhof rechts',
                                'correct' => [
                                    'der',
                                    'Bahnhof',
                                    'auf',
                                    'der',
                                    'rechts',
                                ],
                                'extra' => [
                                    'links',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La gare à droite',
                                'correct' => [
                                    'la',
                                    'gare',
                                    'sur',
                                    'la',
                                    'droite',
                                ],
                                'extra' => [
                                    'gauche',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '右の駅',
                                'correct' => [
                                    '右',
                                    'の',
                                    '駅',
                                ],
                                'extra' => [
                                    '左',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오른쪽의 역',
                                'correct' => [
                                    '오른쪽의',
                                    '역',
                                ],
                                'extra' => [
                                    '왼쪽',
                                ],
                            ],
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
                                    'street',
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
                                    'Straße',
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
                                    'rue',
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
                                    '通り',
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
                                    '거리',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Tienda y Escuela', 5,
                pictures: [
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'es' => 'abierto',
                    ],
                    [
                        'es' => 'cerrado',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'tienda',
                            'está',
                            'abierta',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the shop is open',
                                'correct' => [
                                    'the',
                                    'shop',
                                    'is',
                                    'open',
                                ],
                                'extra' => [
                                    'closed',
                                    'school',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Geschäft ist offen',
                                'correct' => [
                                    'das',
                                    'Geschäft',
                                    'ist',
                                    'offen',
                                ],
                                'extra' => [
                                    'geschlossen',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le magasin est ouvert',
                                'correct' => [
                                    'le',
                                    'magasin',
                                    'est',
                                    'ouvert',
                                ],
                                'extra' => [
                                    'fermé',
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '店は開いています',
                                'correct' => [
                                    '店',
                                    'は',
                                    '開いています',
                                ],
                                'extra' => [
                                    '閉じた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게는 열려 있습니다',
                                'correct' => [
                                    '가게는',
                                    '열려',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '닫힌',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'escuela',
                            'está',
                            'cerrada',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school is closed',
                                'correct' => [
                                    'the',
                                    'school',
                                    'is',
                                    'closed',
                                ],
                                'extra' => [
                                    'open',
                                    'shop',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Schule ist geschlossen',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'ist',
                                    'geschlossen',
                                ],
                                'extra' => [
                                    'offen',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école est fermée',
                                'correct' => [
                                    'école',
                                    'est',
                                    'fermé',
                                ],
                                'extra' => [
                                    'ouvert',
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '学校は閉まっています',
                                'correct' => [
                                    '学校',
                                    'は',
                                    '閉まっています',
                                ],
                                'extra' => [
                                    '開いた',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교는 닫혔습니다',
                                'correct' => [
                                    '학교는',
                                    '닫혔습니다',
                                ],
                                'extra' => [
                                    '열린',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Abierto',
                            'o',
                            'cerrado',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'open or closed',
                                'correct' => [
                                    'open',
                                    'or',
                                    'closed',
                                ],
                                'extra' => [
                                    'shop',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Offen oder geschlossen',
                                'correct' => [
                                    'offen',
                                    'oder',
                                    'geschlossen',
                                ],
                                'extra' => [
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ouvert ou fermé',
                                'correct' => [
                                    'ouvert',
                                    'ou',
                                    'fermé',
                                ],
                                'extra' => [
                                    'magasin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '開いているか閉じている',
                                'correct' => [
                                    '開いて',
                                    'いる',
                                    'か',
                                    '閉じて',
                                    'いる',
                                ],
                                'extra' => [
                                    '店',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '열렸거나 닫힌',
                                'correct' => [
                                    '열렸거나',
                                    '닫힌',
                                ],
                                'extra' => [
                                    '가게',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
