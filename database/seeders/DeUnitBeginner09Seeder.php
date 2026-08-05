<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner09Seeder extends Seeder
{
    private const PICTURES = [
        'Regen' => 'rain',
        'Schnee' => 'snow',
        'Wind' => 'wind',
        'Sonne' => 'sun',
        'Frühling' => 'spring',
        'Sommer' => 'summer',
        'Herbst' => 'autumn',
        'Winter' => 'winter',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 9, the German twin of the
     * English "Unit 9: Weather & Seasons" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Einheit 9: Wetter & Jahreszeiten', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Regen & Schnee', 1,
                pictures: [
                    [
                        'de' => 'Regen',
                        'img' => 'rain',
                    ],
                    [
                        'de' => 'Schnee',
                        'img' => 'snow',
                    ],
                ],
                plain: [
                    [
                        'de' => 'kalt',
                    ],
                    [
                        'de' => 'heute',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Kalter',
                            'Regen',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'cold rain',
                                'correct' => [
                                    'cold',
                                    'rain',
                                ],
                                'extra' => [
                                    'snow',
                                    'today',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Lluvia fría',
                                'correct' => [
                                    'frío',
                                    'lluvia',
                                ],
                                'extra' => [
                                    'nieve',
                                    'hoy',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une pluie froide',
                                'correct' => [
                                    'froid',
                                    'pluie',
                                ],
                                'extra' => [
                                    'neige',
                                    'aujourd\'hui',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '冷たい雨',
                                'correct' => [
                                    '冷たい',
                                    '雨',
                                ],
                                'extra' => [
                                    '雪',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '차가운 비',
                                'correct' => [
                                    '차가운',
                                    '비',
                                ],
                                'extra' => [
                                    '눈',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Schnee',
                            'heute',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the snow today',
                                'correct' => [
                                    'the',
                                    'snow',
                                    'today',
                                ],
                                'extra' => [
                                    'rain',
                                    'cold',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La nieve hoy',
                                'correct' => [
                                    'la',
                                    'nieve',
                                    'hoy',
                                ],
                                'extra' => [
                                    'lluvia',
                                    'frío',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La neige aujourd\'hui',
                                'correct' => [
                                    'la',
                                    'neige',
                                    'aujourd\'hui',
                                ],
                                'extra' => [
                                    'pluie',
                                    'froid',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日の雪',
                                'correct' => [
                                    '今日',
                                    'の',
                                    '雪',
                                ],
                                'extra' => [
                                    '雨',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘의 눈',
                                'correct' => [
                                    '오늘의',
                                    '눈',
                                ],
                                'extra' => [
                                    '비',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Regen',
                            'und',
                            'Schnee',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'rain and snow',
                                'correct' => [
                                    'rain',
                                    'and',
                                    'snow',
                                ],
                                'extra' => [
                                    'today',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Lluvia y nieve',
                                'correct' => [
                                    'lluvia',
                                    'y',
                                    'nieve',
                                ],
                                'extra' => [
                                    'hoy',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pluie et neige',
                                'correct' => [
                                    'pluie',
                                    'et',
                                    'neige',
                                ],
                                'extra' => [
                                    'aujourd\'hui',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '雨と雪',
                                'correct' => [
                                    '雨',
                                    'と',
                                    '雪',
                                ],
                                'extra' => [
                                    '今日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '비와 눈',
                                'correct' => [
                                    '비와',
                                    '눈',
                                ],
                                'extra' => [
                                    '오늘',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Wind & Sonne', 2,
                pictures: [
                    [
                        'de' => 'Wind',
                        'img' => 'wind',
                    ],
                    [
                        'de' => 'Sonne',
                        'img' => 'sun',
                    ],
                ],
                plain: [
                    [
                        'de' => 'warm',
                    ],
                    [
                        'de' => 'Himmel',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'warme',
                            'Sonne',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the warm sun',
                                'correct' => [
                                    'the',
                                    'warm',
                                    'sun',
                                ],
                                'extra' => [
                                    'sky',
                                    'wind',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El sol cálido',
                                'correct' => [
                                    'el',
                                    'sol',
                                    'cálido',
                                ],
                                'extra' => [
                                    'cielo',
                                    'viento',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le soleil doux',
                                'correct' => [
                                    'le',
                                    'soleil',
                                    'doux',
                                ],
                                'extra' => [
                                    'ciel',
                                    'vent',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '暖かい太陽',
                                'correct' => [
                                    '暖かい',
                                    '太陽',
                                ],
                                'extra' => [
                                    '空',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '따뜻한 해',
                                'correct' => [
                                    '따뜻한',
                                    '해',
                                ],
                                'extra' => [
                                    '하늘',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Wind',
                            'im',
                            'Himmel',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the wind in the sky',
                                'correct' => [
                                    'the',
                                    'wind',
                                    'in',
                                    'the',
                                    'sky',
                                ],
                                'extra' => [
                                    'sun',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El viento en el cielo',
                                'correct' => [
                                    'el',
                                    'viento',
                                    'en',
                                    'el',
                                    'cielo',
                                ],
                                'extra' => [
                                    'sol',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le vent dans le ciel',
                                'correct' => [
                                    'le',
                                    'vent',
                                    'dans',
                                    'le',
                                    'ciel',
                                ],
                                'extra' => [
                                    'soleil',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '空の風',
                                'correct' => [
                                    '空',
                                    'の',
                                    '風',
                                ],
                                'extra' => [
                                    '太陽',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '하늘의 바람',
                                'correct' => [
                                    '하늘의',
                                    '바람',
                                ],
                                'extra' => [
                                    '해',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Sonne',
                            'und',
                            'der',
                            'Wind',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the sun and the wind',
                                'correct' => [
                                    'the',
                                    'sun',
                                    'and',
                                    'the',
                                    'wind',
                                ],
                                'extra' => [
                                    'sky',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El sol y el viento',
                                'correct' => [
                                    'el',
                                    'sol',
                                    'y',
                                    'el',
                                    'viento',
                                ],
                                'extra' => [
                                    'cielo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le soleil et le vent',
                                'correct' => [
                                    'le',
                                    'soleil',
                                    'et',
                                    'le',
                                    'vent',
                                ],
                                'extra' => [
                                    'ciel',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '太陽と風',
                                'correct' => [
                                    '太陽',
                                    'と',
                                    '風',
                                ],
                                'extra' => [
                                    '空',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '해와 바람',
                                'correct' => [
                                    '해와',
                                    '바람',
                                ],
                                'extra' => [
                                    '하늘',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Frühling & Sommer', 3,
                pictures: [
                    [
                        'de' => 'Frühling',
                        'img' => 'spring',
                    ],
                    [
                        'de' => 'Sommer',
                        'img' => 'summer',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Jahreszeit',
                    ],
                    [
                        'de' => 'warm',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Frühling',
                            'ist',
                            'eine',
                            'Jahreszeit',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'spring is a season',
                                'correct' => [
                                    'spring',
                                    'is',
                                    'a',
                                    'season',
                                ],
                                'extra' => [
                                    'summer',
                                    'warm',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La primavera es una estación',
                                'correct' => [
                                    'primavera',
                                    'es',
                                    'una',
                                    'estación',
                                ],
                                'extra' => [
                                    'verano',
                                    'cálido',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le printemps est une saison',
                                'correct' => [
                                    'printemps',
                                    'est',
                                    'une',
                                    'saison',
                                ],
                                'extra' => [
                                    'été',
                                    'doux',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '春は季節です',
                                'correct' => [
                                    '春',
                                    'は',
                                    '季節',
                                    'です',
                                ],
                                'extra' => [
                                    '夏',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '봄은 계절입니다',
                                'correct' => [
                                    '봄은',
                                    '계절입니다',
                                ],
                                'extra' => [
                                    '여름',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Sommer',
                            'ist',
                            'warm',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'summer is warm',
                                'correct' => [
                                    'summer',
                                    'is',
                                    'warm',
                                ],
                                'extra' => [
                                    'spring',
                                    'season',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El verano es cálido',
                                'correct' => [
                                    'verano',
                                    'es',
                                    'cálido',
                                ],
                                'extra' => [
                                    'primavera',
                                    'estación',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'été est doux',
                                'correct' => [
                                    'été',
                                    'est',
                                    'doux',
                                ],
                                'extra' => [
                                    'printemps',
                                    'saison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '夏は暖かいです',
                                'correct' => [
                                    '夏',
                                    'は',
                                    '暖かい',
                                    'です',
                                ],
                                'extra' => [
                                    '春',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여름은 따뜻합니다',
                                'correct' => [
                                    '여름은',
                                    '따뜻합니다',
                                ],
                                'extra' => [
                                    '봄',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Frühling',
                            'und',
                            'Sommer',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'spring and summer',
                                'correct' => [
                                    'spring',
                                    'and',
                                    'summer',
                                ],
                                'extra' => [
                                    'season',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Primavera y verano',
                                'correct' => [
                                    'primavera',
                                    'y',
                                    'verano',
                                ],
                                'extra' => [
                                    'estación',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Printemps et été',
                                'correct' => [
                                    'printemps',
                                    'et',
                                    'été',
                                ],
                                'extra' => [
                                    'saison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '春と夏',
                                'correct' => [
                                    '春',
                                    'と',
                                    '夏',
                                ],
                                'extra' => [
                                    '季節',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '봄과 여름',
                                'correct' => [
                                    '봄과',
                                    '여름',
                                ],
                                'extra' => [
                                    '계절',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Herbst & Winter', 4,
                pictures: [
                    [
                        'de' => 'Herbst',
                        'img' => 'autumn',
                    ],
                    [
                        'de' => 'Winter',
                        'img' => 'winter',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Jahreszeit',
                    ],
                    [
                        'de' => 'kalt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Herbst',
                            'ist',
                            'eine',
                            'Jahreszeit',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'autumn is a season',
                                'correct' => [
                                    'autumn',
                                    'is',
                                    'a',
                                    'season',
                                ],
                                'extra' => [
                                    'winter',
                                    'cold',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El otoño es una estación',
                                'correct' => [
                                    'otoño',
                                    'es',
                                    'una',
                                    'estación',
                                ],
                                'extra' => [
                                    'invierno',
                                    'frío',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'automne est une saison',
                                'correct' => [
                                    'automne',
                                    'est',
                                    'une',
                                    'saison',
                                ],
                                'extra' => [
                                    'hiver',
                                    'froid',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '秋は季節です',
                                'correct' => [
                                    '秋',
                                    'は',
                                    '季節',
                                    'です',
                                ],
                                'extra' => [
                                    '冬',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가을은 계절입니다',
                                'correct' => [
                                    '가을은',
                                    '계절입니다',
                                ],
                                'extra' => [
                                    '겨울',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Winter',
                            'ist',
                            'kalt',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'winter is cold',
                                'correct' => [
                                    'winter',
                                    'is',
                                    'cold',
                                ],
                                'extra' => [
                                    'autumn',
                                    'season',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El invierno es frío',
                                'correct' => [
                                    'invierno',
                                    'es',
                                    'frío',
                                ],
                                'extra' => [
                                    'otoño',
                                    'estación',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'hiver est froid',
                                'correct' => [
                                    'hiver',
                                    'est',
                                    'froid',
                                ],
                                'extra' => [
                                    'automne',
                                    'saison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '冬は寒いです',
                                'correct' => [
                                    '冬',
                                    'は',
                                    '寒い',
                                    'です',
                                ],
                                'extra' => [
                                    '秋',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '겨울은 춥습니다',
                                'correct' => [
                                    '겨울은',
                                    '춥습니다',
                                ],
                                'extra' => [
                                    '가을',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Herbst',
                            'und',
                            'Winter',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'autumn and winter',
                                'correct' => [
                                    'autumn',
                                    'and',
                                    'winter',
                                ],
                                'extra' => [
                                    'season',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Otoño e invierno',
                                'correct' => [
                                    'otoño',
                                    'y',
                                    'invierno',
                                ],
                                'extra' => [
                                    'estación',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Automne et hiver',
                                'correct' => [
                                    'automne',
                                    'et',
                                    'hiver',
                                ],
                                'extra' => [
                                    'saison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '秋と冬',
                                'correct' => [
                                    '秋',
                                    'と',
                                    '冬',
                                ],
                                'extra' => [
                                    '季節',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가을과 겨울',
                                'correct' => [
                                    '가을과',
                                    '겨울',
                                ],
                                'extra' => [
                                    '계절',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Regen & Sonne', 5,
                pictures: [
                    [
                        'de' => 'Regen',
                        'img' => 'rain',
                    ],
                    [
                        'de' => 'Sonne',
                        'img' => 'sun',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Wetter',
                    ],
                    [
                        'de' => 'heute',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Wetter',
                            'heute',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the weather today',
                                'correct' => [
                                    'the',
                                    'weather',
                                    'today',
                                ],
                                'extra' => [
                                    'rain',
                                    'sun',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El tiempo hoy',
                                'correct' => [
                                    'el',
                                    'tiempo',
                                    'hoy',
                                ],
                                'extra' => [
                                    'lluvia',
                                    'sol',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le temps aujourd\'hui',
                                'correct' => [
                                    'le',
                                    'temps',
                                    'aujourd\'hui',
                                ],
                                'extra' => [
                                    'pluie',
                                    'soleil',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日の天気',
                                'correct' => [
                                    '今日',
                                    'の',
                                    '天気',
                                ],
                                'extra' => [
                                    '雨',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘의 날씨',
                                'correct' => [
                                    '오늘의',
                                    '날씨',
                                ],
                                'extra' => [
                                    '비',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Regen',
                            'heute',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'rain today',
                                'correct' => [
                                    'rain',
                                    'today',
                                ],
                                'extra' => [
                                    'sun',
                                    'weather',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Lluvia hoy',
                                'correct' => [
                                    'lluvia',
                                    'hoy',
                                ],
                                'extra' => [
                                    'sol',
                                    'tiempo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'De la pluie aujourd\'hui',
                                'correct' => [
                                    'pluie',
                                    'aujourd\'hui',
                                ],
                                'extra' => [
                                    'soleil',
                                    'temps',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日は雨',
                                'correct' => [
                                    '今日',
                                    'は',
                                    '雨',
                                ],
                                'extra' => [
                                    '太陽',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘은 비',
                                'correct' => [
                                    '오늘은',
                                    '비',
                                ],
                                'extra' => [
                                    '해',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Sonne',
                            'oder',
                            'Regen',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'sun or rain',
                                'correct' => [
                                    'sun',
                                    'or',
                                    'rain',
                                ],
                                'extra' => [
                                    'weather',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Sol o lluvia',
                                'correct' => [
                                    'sol',
                                    'o',
                                    'lluvia',
                                ],
                                'extra' => [
                                    'tiempo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Soleil ou pluie',
                                'correct' => [
                                    'soleil',
                                    'ou',
                                    'pluie',
                                ],
                                'extra' => [
                                    'temps',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '太陽か雨',
                                'correct' => [
                                    '太陽',
                                    'か',
                                    '雨',
                                ],
                                'extra' => [
                                    '天気',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '해 또는 비',
                                'correct' => [
                                    '해',
                                    '또는',
                                    '비',
                                ],
                                'extra' => [
                                    '날씨',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
