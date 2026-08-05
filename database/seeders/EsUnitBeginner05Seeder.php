<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner05Seeder extends Seeder
{
    private const PICTURES = [
        'reloj' => 'clock',
        'calendario' => 'calendar',
        'casa' => 'house',
        'libro' => 'book',
        'mesa' => 'table',
        'silla' => 'chair',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 5, the Spanish twin of the
     * English "Unit 5: Days & Time" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unidad 5: Días y tiempo', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Reloj y Calendario', 1,
                pictures: [
                    [
                        'es' => 'reloj',
                        'img' => 'clock',
                    ],
                    [
                        'es' => 'calendario',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'es' => 'mañana',
                    ],
                    [
                        'es' => 'tarde',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'mañana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the morning',
                                'correct' => [
                                    'the',
                                    'morning',
                                ],
                                'extra' => [
                                    'evening',
                                    'clock',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Morgen',
                                'correct' => [
                                    'der',
                                    'Morgen',
                                ],
                                'extra' => [
                                    'Abend',
                                    'Uhr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le matin',
                                'correct' => [
                                    'le',
                                    'matin',
                                ],
                                'extra' => [
                                    'soir',
                                    'horloge',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '朝',
                                'correct' => [
                                    '朝',
                                ],
                                'extra' => [
                                    '夕方',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '아침',
                                'correct' => [
                                    '아침',
                                ],
                                'extra' => [
                                    '저녁',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'tarde',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the evening',
                                'correct' => [
                                    'the',
                                    'evening',
                                ],
                                'extra' => [
                                    'morning',
                                    'calendar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Abend',
                                'correct' => [
                                    'der',
                                    'Abend',
                                ],
                                'extra' => [
                                    'Morgen',
                                    'Kalender',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le soir',
                                'correct' => [
                                    'le',
                                    'soir',
                                ],
                                'extra' => [
                                    'matin',
                                    'calendrier',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '夕方',
                                'correct' => [
                                    '夕方',
                                ],
                                'extra' => [
                                    '朝',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저녁',
                                'correct' => [
                                    '저녁',
                                ],
                                'extra' => [
                                    '아침',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'reloj',
                            'y',
                            'el',
                            'calendario',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the clock and the calendar',
                                'correct' => [
                                    'the',
                                    'clock',
                                    'and',
                                    'the',
                                    'calendar',
                                ],
                                'extra' => [
                                    'morning',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Uhr und der Kalender',
                                'correct' => [
                                    'die',
                                    'Uhr',
                                    'und',
                                    'der',
                                    'Kalender',
                                ],
                                'extra' => [
                                    'Morgen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'horloge et le calendrier',
                                'correct' => [
                                    'horloge',
                                    'et',
                                    'le',
                                    'calendrier',
                                ],
                                'extra' => [
                                    'matin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '時計とカレンダー',
                                'correct' => [
                                    '時計',
                                    'と',
                                    'カレンダー',
                                ],
                                'extra' => [
                                    '朝',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '시계와 달력',
                                'correct' => [
                                    '시계와',
                                    '달력',
                                ],
                                'extra' => [
                                    '아침',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Reloj y Calendario', 2,
                pictures: [
                    [
                        'es' => 'reloj',
                        'img' => 'clock',
                    ],
                    [
                        'es' => 'calendario',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'es' => 'hoy',
                    ],
                    [
                        'es' => 'hora',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'reloj',
                            'hoy',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the clock today',
                                'correct' => [
                                    'the',
                                    'clock',
                                    'today',
                                ],
                                'extra' => [
                                    'hour',
                                    'calendar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Uhr heute',
                                'correct' => [
                                    'die',
                                    'Uhr',
                                    'heute',
                                ],
                                'extra' => [
                                    'Stunde',
                                    'Kalender',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'horloge aujourd\'hui',
                                'correct' => [
                                    'horloge',
                                    'aujourd\'hui',
                                ],
                                'extra' => [
                                    'heure',
                                    'calendrier',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日の時計',
                                'correct' => [
                                    '今日',
                                    'の',
                                    '時計',
                                ],
                                'extra' => [
                                    '時間',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘의 시계',
                                'correct' => [
                                    '오늘의',
                                    '시계',
                                ],
                                'extra' => [
                                    '시간',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'hora',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'one hour',
                                'correct' => [
                                    'one',
                                    'hour',
                                ],
                                'extra' => [
                                    'today',
                                    'clock',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Stunde',
                                'correct' => [
                                    'eins',
                                    'Stunde',
                                ],
                                'extra' => [
                                    'heute',
                                    'Uhr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une heure',
                                'correct' => [
                                    'un',
                                    'heure',
                                ],
                                'extra' => [
                                    'aujourd\'hui',
                                    'horloge',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '一時間',
                                'correct' => [
                                    '一時間',
                                ],
                                'extra' => [
                                    '今日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '한 시간',
                                'correct' => [
                                    '한',
                                    '시간',
                                ],
                                'extra' => [
                                    '오늘',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'calendario',
                            'hoy',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the calendar today',
                                'correct' => [
                                    'the',
                                    'calendar',
                                    'today',
                                ],
                                'extra' => [
                                    'hour',
                                    'clock',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kalender heute',
                                'correct' => [
                                    'der',
                                    'Kalender',
                                    'heute',
                                ],
                                'extra' => [
                                    'Stunde',
                                    'Uhr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le calendrier aujourd\'hui',
                                'correct' => [
                                    'le',
                                    'calendrier',
                                    'aujourd\'hui',
                                ],
                                'extra' => [
                                    'heure',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日のカレンダー',
                                'correct' => [
                                    '今日',
                                    'の',
                                    'カレンダー',
                                ],
                                'extra' => [
                                    '時間',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘의 달력',
                                'correct' => [
                                    '오늘의',
                                    '달력',
                                ],
                                'extra' => [
                                    '시간',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Calendario y Reloj', 3,
                pictures: [
                    [
                        'es' => 'calendario',
                        'img' => 'calendar',
                    ],
                    [
                        'es' => 'reloj',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'es' => 'lunes',
                    ],
                    [
                        'es' => 'martes',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hoy',
                            'es',
                            'lunes',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'today is Monday',
                                'correct' => [
                                    'today',
                                    'is',
                                    'Monday',
                                ],
                                'extra' => [
                                    'Tuesday',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Heute ist Montag',
                                'correct' => [
                                    'heute',
                                    'ist',
                                    'Montag',
                                ],
                                'extra' => [
                                    'Dienstag',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Aujourd\'hui c\'est lundi',
                                'correct' => [
                                    'aujourd\'hui',
                                    'est',
                                    'lundi',
                                ],
                                'extra' => [
                                    'mardi',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日は月曜日です',
                                'correct' => [
                                    '今日',
                                    'は',
                                    '月曜日',
                                    'です',
                                ],
                                'extra' => [
                                    '火曜日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘은 월요일입니다',
                                'correct' => [
                                    '오늘은',
                                    '월요일입니다',
                                ],
                                'extra' => [
                                    '화요일',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'martes',
                            'es',
                            'un',
                            'día',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'Tuesday is a day',
                                'correct' => [
                                    'Tuesday',
                                    'is',
                                    'a',
                                    'day',
                                ],
                                'extra' => [
                                    'Monday',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Dienstag ist ein Tag',
                                'correct' => [
                                    'Dienstag',
                                    'ist',
                                    'ein',
                                    'Tag',
                                ],
                                'extra' => [
                                    'Montag',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mardi est un jour',
                                'correct' => [
                                    'mardi',
                                    'est',
                                    'un',
                                    'jour',
                                ],
                                'extra' => [
                                    'lundi',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '火曜日は一日です',
                                'correct' => [
                                    '火曜日',
                                    'は',
                                    '一',
                                    '日',
                                    'です',
                                ],
                                'extra' => [
                                    '月曜日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '화요일은 하루입니다',
                                'correct' => [
                                    '화요일은',
                                    '하루입니다',
                                ],
                                'extra' => [
                                    '월요일',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'reloj',
                            'y',
                            'el',
                            'calendario',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the clock and the calendar',
                                'correct' => [
                                    'the',
                                    'clock',
                                    'and',
                                    'the',
                                    'calendar',
                                ],
                                'extra' => [
                                    'Monday',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Uhr und der Kalender',
                                'correct' => [
                                    'die',
                                    'Uhr',
                                    'und',
                                    'der',
                                    'Kalender',
                                ],
                                'extra' => [
                                    'Montag',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'horloge et le calendrier',
                                'correct' => [
                                    'horloge',
                                    'et',
                                    'le',
                                    'calendrier',
                                ],
                                'extra' => [
                                    'lundi',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '時計とカレンダー',
                                'correct' => [
                                    '時計',
                                    'と',
                                    'カレンダー',
                                ],
                                'extra' => [
                                    '月曜日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '시계와 달력',
                                'correct' => [
                                    '시계와',
                                    '달력',
                                ],
                                'extra' => [
                                    '월요일',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Calendario y Reloj', 4,
                pictures: [
                    [
                        'es' => 'calendario',
                        'img' => 'calendar',
                    ],
                    [
                        'es' => 'reloj',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'es' => 'hoy',
                    ],
                    [
                        'es' => 'mañana',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Hoy',
                            'y',
                            'mañana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'today and tomorrow',
                                'correct' => [
                                    'today',
                                    'and',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'clock',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Heute und morgen',
                                'correct' => [
                                    'heute',
                                    'und',
                                    'morgen',
                                ],
                                'extra' => [
                                    'Uhr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Aujourd\'hui et demain',
                                'correct' => [
                                    'aujourd\'hui',
                                    'et',
                                    'demain',
                                ],
                                'extra' => [
                                    'horloge',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日と明日',
                                'correct' => [
                                    '今日',
                                    'と',
                                    '明日',
                                ],
                                'extra' => [
                                    '時計',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘과 내일',
                                'correct' => [
                                    '오늘과',
                                    '내일',
                                ],
                                'extra' => [
                                    '시계',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'calendario',
                            'hoy',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the calendar today',
                                'correct' => [
                                    'the',
                                    'calendar',
                                    'today',
                                ],
                                'extra' => [
                                    'morning',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kalender heute',
                                'correct' => [
                                    'der',
                                    'Kalender',
                                    'heute',
                                ],
                                'extra' => [
                                    'morgen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le calendrier aujourd\'hui',
                                'correct' => [
                                    'le',
                                    'calendrier',
                                    'aujourd\'hui',
                                ],
                                'extra' => [
                                    'demain',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '今日のカレンダー',
                                'correct' => [
                                    '今日',
                                    'の',
                                    'カレンダー',
                                ],
                                'extra' => [
                                    '明日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘의 달력',
                                'correct' => [
                                    '오늘의',
                                    '달력',
                                ],
                                'extra' => [
                                    '내일',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'reloj',
                            'y',
                            'mañana',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the clock and tomorrow',
                                'correct' => [
                                    'the',
                                    'clock',
                                    'and',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'today',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Uhr und morgen',
                                'correct' => [
                                    'die',
                                    'Uhr',
                                    'und',
                                    'morgen',
                                ],
                                'extra' => [
                                    'heute',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'horloge et demain',
                                'correct' => [
                                    'horloge',
                                    'et',
                                    'demain',
                                ],
                                'extra' => [
                                    'aujourd\'hui',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '時計と明日',
                                'correct' => [
                                    '時計',
                                    'と',
                                    '明日',
                                ],
                                'extra' => [
                                    '今日',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '시계와 내일',
                                'correct' => [
                                    '시계와',
                                    '내일',
                                ],
                                'extra' => [
                                    '오늘',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Calendario y Reloj', 5,
                pictures: [
                    [
                        'es' => 'calendario',
                        'img' => 'calendar',
                    ],
                    [
                        'es' => 'reloj',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'es' => 'semana',
                    ],
                    [
                        'es' => 'noche',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'La',
                            'semana',
                            'en',
                            'el',
                            'calendario',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the week on the calendar',
                                'correct' => [
                                    'the',
                                    'week',
                                    'on',
                                    'the',
                                    'calendar',
                                ],
                                'extra' => [
                                    'night',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Woche im Kalender',
                                'correct' => [
                                    'die',
                                    'Woche',
                                    'in',
                                    'dem',
                                    'Kalender',
                                ],
                                'extra' => [
                                    'Nacht',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La semaine sur le calendrier',
                                'correct' => [
                                    'la',
                                    'semaine',
                                    'sur',
                                    'le',
                                    'calendrier',
                                ],
                                'extra' => [
                                    'nuit',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'カレンダーの週',
                                'correct' => [
                                    'カレンダー',
                                    'の',
                                    '週',
                                ],
                                'extra' => [
                                    '夜',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '달력의 주',
                                'correct' => [
                                    '달력의',
                                    '주',
                                ],
                                'extra' => [
                                    '밤',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'noche',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the night',
                                'correct' => [
                                    'the',
                                    'night',
                                ],
                                'extra' => [
                                    'week',
                                    'clock',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Nacht',
                                'correct' => [
                                    'die',
                                    'Nacht',
                                ],
                                'extra' => [
                                    'Woche',
                                    'Uhr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'La nuit',
                                'correct' => [
                                    'la',
                                    'nuit',
                                ],
                                'extra' => [
                                    'semaine',
                                    'horloge',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '夜',
                                'correct' => [
                                    '夜',
                                ],
                                'extra' => [
                                    '週',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밤',
                                'correct' => [
                                    '밤',
                                ],
                                'extra' => [
                                    '주',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'reloj',
                            'y',
                            'la',
                            'noche',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the clock and the night',
                                'correct' => [
                                    'the',
                                    'clock',
                                    'and',
                                    'the',
                                    'night',
                                ],
                                'extra' => [
                                    'week',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Uhr und die Nacht',
                                'correct' => [
                                    'die',
                                    'Uhr',
                                    'und',
                                    'die',
                                    'Nacht',
                                ],
                                'extra' => [
                                    'Woche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'horloge et la nuit',
                                'correct' => [
                                    'horloge',
                                    'et',
                                    'la',
                                    'nuit',
                                ],
                                'extra' => [
                                    'semaine',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '時計と夜',
                                'correct' => [
                                    '時計',
                                    'と',
                                    '夜',
                                ],
                                'extra' => [
                                    '週',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '시계와 밤',
                                'correct' => [
                                    '시계와',
                                    '밤',
                                ],
                                'extra' => [
                                    '주',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
