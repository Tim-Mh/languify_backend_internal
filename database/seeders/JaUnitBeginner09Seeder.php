<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner09Seeder extends Seeder
{
    private const PICTURES = [
        '雨' => 'rain',
        '雪' => 'snow',
        '風' => 'wind',
        '太陽' => 'sun',
        '春' => 'spring',
        '夏' => 'summer',
        '秋' => 'autumn',
        '冬' => 'winter',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 9, the Japanese twin of the
     * English "Unit 9: Weather & Seasons" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'ユニット9: 天気と季節', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 雨・雪', 1,
                pictures: [
                    [
                        'ja' => '雨',
                        'img' => 'rain',
                    ],
                    [
                        'ja' => '雪',
                        'img' => 'snow',
                    ],
                ],
                plain: [
                    [
                        'ja' => '冷たい',
                    ],
                    [
                        'ja' => '今日',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '冷たい',
                            '雨',
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
                            '今日',
                            'の',
                            '雪',
                        ],
                        'blank' => 0,
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
                            '雨',
                            'と',
                            '雪',
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
            $builder->lesson('レッスン2: 風・太陽', 2,
                pictures: [
                    [
                        'ja' => '風',
                        'img' => 'wind',
                    ],
                    [
                        'ja' => '太陽',
                        'img' => 'sun',
                    ],
                ],
                plain: [
                    [
                        'ja' => '暖かい',
                    ],
                    [
                        'ja' => '空',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '暖かい',
                            '太陽',
                        ],
                        'blank' => 0,
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
                            '空',
                            'の',
                            '風',
                        ],
                        'blank' => 0,
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
                            '太陽',
                            'と',
                            '風',
                        ],
                        'blank' => 0,
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
            $builder->lesson('レッスン3: 春・夏', 3,
                pictures: [
                    [
                        'ja' => '春',
                        'img' => 'spring',
                    ],
                    [
                        'ja' => '夏',
                        'img' => 'summer',
                    ],
                ],
                plain: [
                    [
                        'ja' => '季節',
                    ],
                    [
                        'ja' => '暖かい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '春',
                            'は',
                            '季節',
                            'です',
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
                            '夏',
                            'は',
                            '暖かい',
                            'です',
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
                            '春',
                            'と',
                            '夏',
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
            $builder->lesson('レッスン4: 秋・冬', 4,
                pictures: [
                    [
                        'ja' => '秋',
                        'img' => 'autumn',
                    ],
                    [
                        'ja' => '冬',
                        'img' => 'winter',
                    ],
                ],
                plain: [
                    [
                        'ja' => '季節',
                    ],
                    [
                        'ja' => '冷たい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '秋',
                            'は',
                            '季節',
                            'です',
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
                            '冬',
                            'は',
                            '寒い',
                            'です',
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
                            '秋',
                            'と',
                            '冬',
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
            $builder->lesson('レッスン5: 雨・太陽', 5,
                pictures: [
                    [
                        'ja' => '雨',
                        'img' => 'rain',
                    ],
                    [
                        'ja' => '太陽',
                        'img' => 'sun',
                    ],
                ],
                plain: [
                    [
                        'ja' => '天気',
                    ],
                    [
                        'ja' => '今日',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '今日',
                            'の',
                            '天気',
                        ],
                        'blank' => 2,
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
                            '今日',
                            'は',
                            '雨',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'rain today',
                                'correct' => [
                                    'rain',
                                    'today',
                                ],
                                'extra' => [
                                    'sun',
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
                            '太陽',
                            'か',
                            '雨',
                        ],
                        'blank' => 0,
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
