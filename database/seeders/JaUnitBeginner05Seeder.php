<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner05Seeder extends Seeder
{
    private const PICTURES = [
        '時計' => 'clock',
        'カレンダー' => 'calendar',
        '家' => 'house',
        '本' => 'book',
        'テーブル' => 'table',
        '椅子' => 'chair',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 5, the Japanese twin of the
     * English "Unit 5: Days & Time" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'ユニット5: 曜日と時間', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 時計・カレンダー', 1,
                pictures: [
                    [
                        'ja' => '時計',
                        'img' => 'clock',
                    ],
                    [
                        'ja' => 'カレンダー',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'ja' => '朝',
                    ],
                    [
                        'ja' => '夕方',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '朝',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the morning',
                                'correct' => [
                                    'the',
                                    'morning',
                                ],
                                'extra' => [
                                    'evening',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La mañana',
                                'correct' => [
                                    'la',
                                    'mañana',
                                ],
                                'extra' => [
                                    'tarde',
                                    'reloj',
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
                            '夕方',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the evening',
                                'correct' => [
                                    'the',
                                    'evening',
                                ],
                                'extra' => [
                                    'morning',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La tarde',
                                'correct' => [
                                    'la',
                                    'tarde',
                                ],
                                'extra' => [
                                    'mañana',
                                    'calendario',
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
                            '時計',
                            'と',
                            'カレンダー',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'El reloj y el calendario',
                                'correct' => [
                                    'el',
                                    'reloj',
                                    'y',
                                    'el',
                                    'calendario',
                                ],
                                'extra' => [
                                    'mañana',
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
            $builder->lesson('レッスン2: 時計・カレンダー', 2,
                pictures: [
                    [
                        'ja' => '時計',
                        'img' => 'clock',
                    ],
                    [
                        'ja' => 'カレンダー',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'ja' => '今日',
                    ],
                    [
                        'ja' => '時間',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '今日',
                            'の',
                            '時計',
                        ],
                        'blank' => 2,
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
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El reloj hoy',
                                'correct' => [
                                    'el',
                                    'reloj',
                                    'hoy',
                                ],
                                'extra' => [
                                    'hora',
                                    'calendario',
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
                            '一時間',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'one hour',
                                'correct' => [
                                    'one',
                                    'hour',
                                ],
                                'extra' => [
                                    'today',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una hora',
                                'correct' => [
                                    'uno',
                                    'hora',
                                ],
                                'extra' => [
                                    'hoy',
                                    'reloj',
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
                            '今日',
                            'の',
                            'カレンダー',
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
                                    'hour',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El calendario hoy',
                                'correct' => [
                                    'el',
                                    'calendario',
                                    'hoy',
                                ],
                                'extra' => [
                                    'hora',
                                    'reloj',
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
            $builder->lesson('レッスン3: カレンダー・時計', 3,
                pictures: [
                    [
                        'ja' => 'カレンダー',
                        'img' => 'calendar',
                    ],
                    [
                        'ja' => '時計',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'ja' => '月曜日',
                    ],
                    [
                        'ja' => '火曜日',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '今日',
                            'は',
                            '月曜日',
                            'です',
                        ],
                        'blank' => 3,
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
                            'es' => [
                                'sentence' => 'Hoy es lunes',
                                'correct' => [
                                    'hoy',
                                    'es',
                                    'lunes',
                                ],
                                'extra' => [
                                    'martes',
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
                            '火曜日',
                            'は',
                            '一',
                            '日',
                            'です',
                        ],
                        'blank' => 4,
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
                            'es' => [
                                'sentence' => 'El martes es un día',
                                'correct' => [
                                    'martes',
                                    'es',
                                    'un',
                                    'día',
                                ],
                                'extra' => [
                                    'lunes',
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
                            '時計',
                            'と',
                            'カレンダー',
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
                                    'Monday',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El reloj y el calendario',
                                'correct' => [
                                    'el',
                                    'reloj',
                                    'y',
                                    'el',
                                    'calendario',
                                ],
                                'extra' => [
                                    'lunes',
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
            $builder->lesson('レッスン4: カレンダー・時計', 4,
                pictures: [
                    [
                        'ja' => 'カレンダー',
                        'img' => 'calendar',
                    ],
                    [
                        'ja' => '時計',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'ja' => '今日',
                    ],
                    [
                        'ja' => '明日',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '今日',
                            'と',
                            '明日',
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
                            'es' => [
                                'sentence' => 'Hoy y mañana',
                                'correct' => [
                                    'hoy',
                                    'y',
                                    'mañana',
                                ],
                                'extra' => [
                                    'reloj',
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
                            '今日',
                            'の',
                            'カレンダー',
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
                                    'tomorrow',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El calendario hoy',
                                'correct' => [
                                    'el',
                                    'calendario',
                                    'hoy',
                                ],
                                'extra' => [
                                    'mañana',
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
                            '時計',
                            'と',
                            '明日',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'El reloj y mañana',
                                'correct' => [
                                    'el',
                                    'reloj',
                                    'y',
                                    'mañana',
                                ],
                                'extra' => [
                                    'hoy',
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
            $builder->lesson('レッスン5: カレンダー・時計', 5,
                pictures: [
                    [
                        'ja' => 'カレンダー',
                        'img' => 'calendar',
                    ],
                    [
                        'ja' => '時計',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'ja' => '週',
                    ],
                    [
                        'ja' => '夜',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'カレンダー',
                            'の',
                            '週',
                        ],
                        'blank' => 0,
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
                            'es' => [
                                'sentence' => 'La semana en el calendario',
                                'correct' => [
                                    'la',
                                    'semana',
                                    'en',
                                    'el',
                                    'calendario',
                                ],
                                'extra' => [
                                    'noche',
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
                            '夜',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the night',
                                'correct' => [
                                    'the',
                                    'night',
                                ],
                                'extra' => [
                                    'week',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'La noche',
                                'correct' => [
                                    'la',
                                    'noche',
                                ],
                                'extra' => [
                                    'semana',
                                    'reloj',
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
                            '時計',
                            'と',
                            '夜',
                        ],
                        'blank' => 1,
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
                            'es' => [
                                'sentence' => 'El reloj y la noche',
                                'correct' => [
                                    'el',
                                    'reloj',
                                    'y',
                                    'la',
                                    'noche',
                                ],
                                'extra' => [
                                    'semana',
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
