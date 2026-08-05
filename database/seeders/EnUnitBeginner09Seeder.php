<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner09Seeder extends Seeder
{
    private const PICTURES = [
        'Rain' => 'rain', 'Snow' => 'snow', 'Wind' => 'wind', 'Sun' => 'sun',
        'Spring' => 'spring', 'Summer' => 'summer', 'Autumn' => 'autumn', 'Winter' => 'winter',
    ];

    /**
     * English Chapter 1, Unit 9 — weather and the seasons.
     *
     * Every picture word here can be drawn, so the unit is the most visual in
     * the chapter. The abstract half adds the handful of words that turn a
     * noun into a weather report — warm, cold, sky, weather, today.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Weather & Seasons', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Rain & Snow', 1,
                pictures: [['en' => 'Rain', 'img' => 'rain'], ['en' => 'Snow', 'img' => 'snow']],
                plain: [['en' => 'Cold'], ['en' => 'Today']],
                phrases: [
                    'a' => [
                        'words' => ['cold', 'rain'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Lluvia fría', 'correct' => ['frío', 'lluvia'], 'extra' => ['nieve', 'hoy']],
                            'de' => ['sentence' => 'Kalter Regen', 'correct' => ['kalt', 'Regen'], 'extra' => ['Schnee', 'heute']],
                            'ja' => ['sentence' => '冷たい雨', 'correct' => ['冷たい', '雨'], 'extra' => ['雪']],
                            'ko' => ['sentence' => '차가운 비', 'correct' => ['차가운', '비'], 'extra' => ['눈']],
                            'fr' => ['sentence' => 'Une pluie froide', 'correct' => ['froid', 'pluie'], 'extra' => ['neige', "aujourd'hui"]],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'snow', 'today'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'La nieve hoy', 'correct' => ['la', 'nieve', 'hoy'], 'extra' => ['lluvia', 'frío']],
                            'de' => ['sentence' => 'Der Schnee heute', 'correct' => ['der', 'Schnee', 'heute'], 'extra' => ['Regen', 'kalt']],
                            'ja' => ['sentence' => '今日の雪', 'correct' => ['今日', 'の', '雪'], 'extra' => ['雨']],
                            'ko' => ['sentence' => '오늘의 눈', 'correct' => ['오늘의', '눈'], 'extra' => ['비']],
                            'fr' => ['sentence' => "La neige aujourd'hui", 'correct' => ['la', 'neige', "aujourd'hui"], 'extra' => ['pluie', 'froid']],
                        ],
                    ],
                    'c' => [
                        'words' => ['rain', 'and', 'snow'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Lluvia y nieve', 'correct' => ['lluvia', 'y', 'nieve'], 'extra' => ['hoy']],
                            'de' => ['sentence' => 'Regen und Schnee', 'correct' => ['Regen', 'und', 'Schnee'], 'extra' => ['heute']],
                            'ja' => ['sentence' => '雨と雪', 'correct' => ['雨', 'と', '雪'], 'extra' => ['今日']],
                            'ko' => ['sentence' => '비와 눈', 'correct' => ['비와', '눈'], 'extra' => ['오늘']],
                            'fr' => ['sentence' => 'Pluie et neige', 'correct' => ['pluie', 'et', 'neige'], 'extra' => ["aujourd'hui"]],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Wind & Sun', 2,
                pictures: [['en' => 'Wind', 'img' => 'wind'], ['en' => 'Sun', 'img' => 'sun']],
                plain: [['en' => 'Warm'], ['en' => 'Sky']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'warm', 'sun'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El sol cálido', 'correct' => ['el', 'sol', 'cálido'], 'extra' => ['cielo', 'viento']],
                            'de' => ['sentence' => 'Die warme Sonne', 'correct' => ['die', 'warm', 'Sonne'], 'extra' => ['Himmel', 'Wind']],
                            'ja' => ['sentence' => '暖かい太陽', 'correct' => ['暖かい', '太陽'], 'extra' => ['空']],
                            'ko' => ['sentence' => '따뜻한 해', 'correct' => ['따뜻한', '해'], 'extra' => ['하늘']],
                            'fr' => ['sentence' => 'Le soleil doux', 'correct' => ['le', 'soleil', 'doux'], 'extra' => ['ciel', 'vent']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'wind', 'in', 'the', 'sky'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El viento en el cielo', 'correct' => ['el', 'viento', 'en', 'el', 'cielo'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Der Wind im Himmel', 'correct' => ['der', 'Wind', 'in', 'dem', 'Himmel'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '空の風', 'correct' => ['空', 'の', '風'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '하늘의 바람', 'correct' => ['하늘의', '바람'], 'extra' => ['해']],
                            'fr' => ['sentence' => 'Le vent dans le ciel', 'correct' => ['le', 'vent', 'dans', 'le', 'ciel'], 'extra' => ['soleil']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'sun', 'and', 'the', 'wind'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El sol y el viento', 'correct' => ['el', 'sol', 'y', 'el', 'viento'], 'extra' => ['cielo']],
                            'de' => ['sentence' => 'Die Sonne und der Wind', 'correct' => ['die', 'Sonne', 'und', 'der', 'Wind'], 'extra' => ['Himmel']],
                            'ja' => ['sentence' => '太陽と風', 'correct' => ['太陽', 'と', '風'], 'extra' => ['空']],
                            'ko' => ['sentence' => '해와 바람', 'correct' => ['해와', '바람'], 'extra' => ['하늘']],
                            'fr' => ['sentence' => 'Le soleil et le vent', 'correct' => ['le', 'soleil', 'et', 'le', 'vent'], 'extra' => ['ciel']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Spring & Summer', 3,
                pictures: [['en' => 'Spring', 'img' => 'spring'], ['en' => 'Summer', 'img' => 'summer']],
                plain: [['en' => 'Season'], ['en' => 'Warm']],
                phrases: [
                    'a' => [
                        'words' => ['spring', 'is', 'a', 'season'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La primavera es una estación', 'correct' => ['primavera', 'es', 'una', 'estación'], 'extra' => ['verano', 'cálido']],
                            'de' => ['sentence' => 'Frühling ist eine Jahreszeit', 'correct' => ['Frühling', 'ist', 'eine', 'Jahreszeit'], 'extra' => ['Sommer', 'warm']],
                            'ja' => ['sentence' => '春は季節です', 'correct' => ['春', 'は', '季節', 'です'], 'extra' => ['夏']],
                            'ko' => ['sentence' => '봄은 계절입니다', 'correct' => ['봄은', '계절입니다'], 'extra' => ['여름']],
                            'fr' => ['sentence' => 'Le printemps est une saison', 'correct' => ['printemps', 'est', 'une', 'saison'], 'extra' => ['été', 'doux']],
                        ],
                    ],
                    'b' => [
                        'words' => ['summer', 'is', 'warm'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El verano es cálido', 'correct' => ['verano', 'es', 'cálido'], 'extra' => ['primavera', 'estación']],
                            'de' => ['sentence' => 'Sommer ist warm', 'correct' => ['Sommer', 'ist', 'warm'], 'extra' => ['Frühling', 'Jahreszeit']],
                            'ja' => ['sentence' => '夏は暖かいです', 'correct' => ['夏', 'は', '暖かい', 'です'], 'extra' => ['春']],
                            'ko' => ['sentence' => '여름은 따뜻합니다', 'correct' => ['여름은', '따뜻합니다'], 'extra' => ['봄']],
                            'fr' => ['sentence' => "L'été est doux", 'correct' => ['été', 'est', 'doux'], 'extra' => ['printemps', 'saison']],
                        ],
                    ],
                    'c' => [
                        'words' => ['spring', 'and', 'summer'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Primavera y verano', 'correct' => ['primavera', 'y', 'verano'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Frühling und Sommer', 'correct' => ['Frühling', 'und', 'Sommer'], 'extra' => ['Jahreszeit']],
                            'ja' => ['sentence' => '春と夏', 'correct' => ['春', 'と', '夏'], 'extra' => ['季節']],
                            'ko' => ['sentence' => '봄과 여름', 'correct' => ['봄과', '여름'], 'extra' => ['계절']],
                            'fr' => ['sentence' => 'Printemps et été', 'correct' => ['printemps', 'et', 'été'], 'extra' => ['saison']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Autumn & Winter', 4,
                pictures: [['en' => 'Autumn', 'img' => 'autumn'], ['en' => 'Winter', 'img' => 'winter']],
                plain: [['en' => 'Season'], ['en' => 'Cold']],
                phrases: [
                    'a' => [
                        'words' => ['autumn', 'is', 'a', 'season'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El otoño es una estación', 'correct' => ['otoño', 'es', 'una', 'estación'], 'extra' => ['invierno', 'frío']],
                            'de' => ['sentence' => 'Herbst ist eine Jahreszeit', 'correct' => ['Herbst', 'ist', 'eine', 'Jahreszeit'], 'extra' => ['Winter', 'kalt']],
                            'ja' => ['sentence' => '秋は季節です', 'correct' => ['秋', 'は', '季節', 'です'], 'extra' => ['冬']],
                            'ko' => ['sentence' => '가을은 계절입니다', 'correct' => ['가을은', '계절입니다'], 'extra' => ['겨울']],
                            'fr' => ['sentence' => "L'automne est une saison", 'correct' => ['automne', 'est', 'une', 'saison'], 'extra' => ['hiver', 'froid']],
                        ],
                    ],
                    'b' => [
                        'words' => ['winter', 'is', 'cold'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El invierno es frío', 'correct' => ['invierno', 'es', 'frío'], 'extra' => ['otoño', 'estación']],
                            'de' => ['sentence' => 'Winter ist kalt', 'correct' => ['Winter', 'ist', 'kalt'], 'extra' => ['Herbst', 'Jahreszeit']],
                            'ja' => ['sentence' => '冬は寒いです', 'correct' => ['冬', 'は', '寒い', 'です'], 'extra' => ['秋']],
                            'ko' => ['sentence' => '겨울은 춥습니다', 'correct' => ['겨울은', '춥습니다'], 'extra' => ['가을']],
                            'fr' => ['sentence' => "L'hiver est froid", 'correct' => ['hiver', 'est', 'froid'], 'extra' => ['automne', 'saison']],
                        ],
                    ],
                    'c' => [
                        'words' => ['autumn', 'and', 'winter'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Otoño e invierno', 'correct' => ['otoño', 'y', 'invierno'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Herbst und Winter', 'correct' => ['Herbst', 'und', 'Winter'], 'extra' => ['Jahreszeit']],
                            'ja' => ['sentence' => '秋と冬', 'correct' => ['秋', 'と', '冬'], 'extra' => ['季節']],
                            'ko' => ['sentence' => '가을과 겨울', 'correct' => ['가을과', '겨울'], 'extra' => ['계절']],
                            'fr' => ['sentence' => 'Automne et hiver', 'correct' => ['automne', 'et', 'hiver'], 'extra' => ['saison']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: The Weather Today', 5,
                pictures: [['en' => 'Rain', 'img' => 'rain'], ['en' => 'Sun', 'img' => 'sun']],
                plain: [['en' => 'Weather'], ['en' => 'Today']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'weather', 'today'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El tiempo hoy', 'correct' => ['el', 'tiempo', 'hoy'], 'extra' => ['lluvia', 'sol']],
                            'de' => ['sentence' => 'Das Wetter heute', 'correct' => ['das', 'Wetter', 'heute'], 'extra' => ['Regen', 'Sonne']],
                            'ja' => ['sentence' => '今日の天気', 'correct' => ['今日', 'の', '天気'], 'extra' => ['雨']],
                            'ko' => ['sentence' => '오늘의 날씨', 'correct' => ['오늘의', '날씨'], 'extra' => ['비']],
                            'fr' => ['sentence' => "Le temps aujourd'hui", 'correct' => ['le', 'temps', "aujourd'hui"], 'extra' => ['pluie', 'soleil']],
                        ],
                    ],
                    'b' => [
                        'words' => ['rain', 'today'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Lluvia hoy', 'correct' => ['lluvia', 'hoy'], 'extra' => ['sol', 'tiempo']],
                            'de' => ['sentence' => 'Regen heute', 'correct' => ['Regen', 'heute'], 'extra' => ['Sonne', 'Wetter']],
                            'ja' => ['sentence' => '今日は雨', 'correct' => ['今日', 'は', '雨'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '오늘은 비', 'correct' => ['오늘은', '비'], 'extra' => ['해']],
                            'fr' => ['sentence' => "De la pluie aujourd'hui", 'correct' => ['pluie', "aujourd'hui"], 'extra' => ['soleil', 'temps']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sun', 'or', 'rain'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Sol o lluvia', 'correct' => ['sol', 'o', 'lluvia'], 'extra' => ['tiempo']],
                            'de' => ['sentence' => 'Sonne oder Regen', 'correct' => ['Sonne', 'oder', 'Regen'], 'extra' => ['Wetter']],
                            'ja' => ['sentence' => '太陽か雨', 'correct' => ['太陽', 'か', '雨'], 'extra' => ['天気']],
                            'ko' => ['sentence' => '해 또는 비', 'correct' => ['해', '또는', '비'], 'extra' => ['날씨']],
                            'fr' => ['sentence' => 'Soleil ou pluie', 'correct' => ['soleil', 'ou', 'pluie'], 'extra' => ['temps']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
