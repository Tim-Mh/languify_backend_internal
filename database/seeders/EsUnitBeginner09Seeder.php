<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner09Seeder extends Seeder
{
    private const PICTURES = [
        'lluvia' => 'rain',
        'nieve' => 'snow',
        'viento' => 'wind',
        'sol' => 'sun',
        'primavera' => 'spring',
        'verano' => 'summer',
        'otoño' => 'autumn',
        'invierno' => 'winter',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 9, the Spanish twin of the
     * English "Unit 9: Weather & Seasons" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unidad 9: El tiempo y las estaciones', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Lluvia y Nieve', 1,
                pictures: [
                    [
                        'es' => 'lluvia',
                        'img' => 'rain',
                    ],
                    [
                        'es' => 'nieve',
                        'img' => 'snow',
                    ],
                ],
                plain: [
                    [
                        'es' => 'frío',
                    ],
                    [
                        'es' => 'hoy',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Lluvia',
                            'fría',
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
                            'de' => [
                                'sentence' => 'Kalter Regen',
                                'correct' => [
                                    'kalt',
                                    'Regen',
                                ],
                                'extra' => [
                                    'Schnee',
                                    'heute',
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
                            'La',
                            'nieve',
                            'hoy',
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
                            'de' => [
                                'sentence' => 'Der Schnee heute',
                                'correct' => [
                                    'der',
                                    'Schnee',
                                    'heute',
                                ],
                                'extra' => [
                                    'Regen',
                                    'kalt',
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
                            'Lluvia',
                            'y',
                            'nieve',
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
                            'de' => [
                                'sentence' => 'Regen und Schnee',
                                'correct' => [
                                    'Regen',
                                    'und',
                                    'Schnee',
                                ],
                                'extra' => [
                                    'heute',
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
            $builder->lesson('Lección 2: Viento y Sol', 2,
                pictures: [
                    [
                        'es' => 'viento',
                        'img' => 'wind',
                    ],
                    [
                        'es' => 'sol',
                        'img' => 'sun',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cálido',
                    ],
                    [
                        'es' => 'cielo',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'sol',
                            'cálido',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Die warme Sonne',
                                'correct' => [
                                    'die',
                                    'warm',
                                    'Sonne',
                                ],
                                'extra' => [
                                    'Himmel',
                                    'Wind',
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
                            'El',
                            'viento',
                            'en',
                            'el',
                            'cielo',
                        ],
                        'blank' => 2,
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
                            'de' => [
                                'sentence' => 'Der Wind im Himmel',
                                'correct' => [
                                    'der',
                                    'Wind',
                                    'in',
                                    'dem',
                                    'Himmel',
                                ],
                                'extra' => [
                                    'Sonne',
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
                            'El',
                            'sol',
                            'y',
                            'el',
                            'viento',
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
                            'de' => [
                                'sentence' => 'Die Sonne und der Wind',
                                'correct' => [
                                    'die',
                                    'Sonne',
                                    'und',
                                    'der',
                                    'Wind',
                                ],
                                'extra' => [
                                    'Himmel',
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
            $builder->lesson('Lección 3: Primavera y Verano', 3,
                pictures: [
                    [
                        'es' => 'primavera',
                        'img' => 'spring',
                    ],
                    [
                        'es' => 'verano',
                        'img' => 'summer',
                    ],
                ],
                plain: [
                    [
                        'es' => 'estación',
                    ],
                    [
                        'es' => 'cálido',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'primavera',
                            'es',
                            'una',
                            'estación',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Frühling ist eine Jahreszeit',
                                'correct' => [
                                    'Frühling',
                                    'ist',
                                    'eine',
                                    'Jahreszeit',
                                ],
                                'extra' => [
                                    'Sommer',
                                    'warm',
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
                            'El',
                            'verano',
                            'es',
                            'cálido',
                        ],
                        'blank' => 3,
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
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Sommer ist warm',
                                'correct' => [
                                    'Sommer',
                                    'ist',
                                    'warm',
                                ],
                                'extra' => [
                                    'Frühling',
                                    'Jahreszeit',
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
                            'Primavera',
                            'y',
                            'verano',
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
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Frühling und Sommer',
                                'correct' => [
                                    'Frühling',
                                    'und',
                                    'Sommer',
                                ],
                                'extra' => [
                                    'Jahreszeit',
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
            $builder->lesson('Lección 4: Otoño y Invierno', 4,
                pictures: [
                    [
                        'es' => 'otoño',
                        'img' => 'autumn',
                    ],
                    [
                        'es' => 'invierno',
                        'img' => 'winter',
                    ],
                ],
                plain: [
                    [
                        'es' => 'estación',
                    ],
                    [
                        'es' => 'frío',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'otoño',
                            'es',
                            'una',
                            'estación',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Herbst ist eine Jahreszeit',
                                'correct' => [
                                    'Herbst',
                                    'ist',
                                    'eine',
                                    'Jahreszeit',
                                ],
                                'extra' => [
                                    'Winter',
                                    'kalt',
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
                            'El',
                            'invierno',
                            'es',
                            'frío',
                        ],
                        'blank' => 3,
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
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Winter ist kalt',
                                'correct' => [
                                    'Winter',
                                    'ist',
                                    'kalt',
                                ],
                                'extra' => [
                                    'Herbst',
                                    'Jahreszeit',
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
                            'Otoño',
                            'e',
                            'invierno',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'autumn and winter',
                                'correct' => [
                                    'autumn',
                                    'and',
                                    'winter',
                                ],
                                'extra' => [
                                    'station',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Herbst und Winter',
                                'correct' => [
                                    'Herbst',
                                    'und',
                                    'Winter',
                                ],
                                'extra' => [
                                    'Jahreszeit',
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
            $builder->lesson('Lección 5: Lluvia y Sol', 5,
                pictures: [
                    [
                        'es' => 'lluvia',
                        'img' => 'rain',
                    ],
                    [
                        'es' => 'sol',
                        'img' => 'sun',
                    ],
                ],
                plain: [
                    [
                        'es' => 'tiempo',
                    ],
                    [
                        'es' => 'hoy',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'tiempo',
                            'hoy',
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
                            'de' => [
                                'sentence' => 'Das Wetter heute',
                                'correct' => [
                                    'das',
                                    'Wetter',
                                    'heute',
                                ],
                                'extra' => [
                                    'Regen',
                                    'Sonne',
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
                            'Lluvia',
                            'hoy',
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
                            'de' => [
                                'sentence' => 'Regen heute',
                                'correct' => [
                                    'Regen',
                                    'heute',
                                ],
                                'extra' => [
                                    'Sonne',
                                    'Wetter',
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
                            'Sol',
                            'o',
                            'lluvia',
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
                            'de' => [
                                'sentence' => 'Sonne oder Regen',
                                'correct' => [
                                    'Sonne',
                                    'oder',
                                    'Regen',
                                ],
                                'extra' => [
                                    'Wetter',
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
