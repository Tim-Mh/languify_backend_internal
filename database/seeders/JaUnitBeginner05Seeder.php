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
                            'az' => ['sentence' => 'səhər', 'correct' => ['səhər'], 'extra' => ['axşam']],
                            'ar' => ['sentence' => 'صباح', 'correct' => ['صباح'], 'extra' => ['مساء']],
                            'ru' => ['sentence' => 'утро', 'correct' => ['утро'], 'extra' => ['вечер']],
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
                            'tr' => ['sentence' => 'sabah', 'correct' => ['sabah'], 'extra' => ['akşam']],
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
                            'az' => ['sentence' => 'axşam', 'correct' => ['axşam'], 'extra' => ['səhər']],
                            'ar' => ['sentence' => 'مساء', 'correct' => ['مساء'], 'extra' => ['صباح']],
                            'ru' => ['sentence' => 'вечер', 'correct' => ['вечер'], 'extra' => ['утро']],
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
                            'tr' => ['sentence' => 'akşam', 'correct' => ['akşam'], 'extra' => ['sabah']],
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
                            'az' => ['sentence' => 'saat və təqvim', 'correct' => ['saat', 'və', 'təqvim'], 'extra' => ['səhər']],
                            'ar' => ['sentence' => 'ساعة و تقويم', 'correct' => ['ساعة', 'و', 'تقويم'], 'extra' => ['صباح']],
                            'ru' => ['sentence' => 'часы и календарь', 'correct' => ['часы', 'и', 'календарь'], 'extra' => ['утро']],
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
                            'tr' => ['sentence' => 'saat ve takvim', 'correct' => ['saat', 've', 'takvim'], 'extra' => ['sabah']],
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
                            'az' => ['sentence' => 'saat bu gün', 'correct' => ['saat', 'bu gün'], 'extra' => []],
                            'ar' => ['sentence' => 'ساعة اليوم', 'correct' => ['ساعة', 'اليوم'], 'extra' => []],
                            'ru' => ['sentence' => 'часы сегодня', 'correct' => ['часы', 'сегодня'], 'extra' => ['час']],
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
                            'tr' => ['sentence' => 'bugün saat', 'correct' => ['bugün', 'saat'], 'extra' => ['saat']],
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
                            'az' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['bu gün']],
                            'ar' => ['sentence' => 'واحد ساعة', 'correct' => ['واحد', 'ساعة'], 'extra' => ['اليوم']],
                            'ru' => ['sentence' => 'один час', 'correct' => ['один', 'час'], 'extra' => ['сегодня']],
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
                            'tr' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['bugün']],
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
                            'az' => ['sentence' => 'təqvim bu gün', 'correct' => ['təqvim', 'bu gün'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'تقويم اليوم', 'correct' => ['تقويم', 'اليوم'], 'extra' => ['ساعة']],
                            'ru' => ['sentence' => 'календарь сегодня', 'correct' => ['календарь', 'сегодня'], 'extra' => ['час']],
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
                            'tr' => ['sentence' => 'bugün takvim', 'correct' => ['bugün', 'takvim'], 'extra' => ['saat']],
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
                            'az' => ['sentence' => 'bu gün bazar ertəsi', 'correct' => ['bu gün', 'bazar ertəsi'], 'extra' => ['çərşənbə axşamı']],
                            'ar' => ['sentence' => 'اليوم الاثنين', 'correct' => ['اليوم', 'الاثنين'], 'extra' => ['الثلاثاء']],
                            'ru' => ['sentence' => 'сегодня понедельник', 'correct' => ['сегодня', 'понедельник'], 'extra' => ['вторник']],
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
                            'tr' => ['sentence' => 'bugün pazartesi', 'correct' => ['bugün', 'pazartesi'], 'extra' => ['salı']],
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
                            'az' => ['sentence' => 'çərşənbə axşamı bir gün', 'correct' => ['çərşənbə axşamı', 'bir', 'gün'], 'extra' => ['bazar ertəsi']],
                            'ar' => ['sentence' => 'الثلاثاء يوم', 'correct' => ['الثلاثاء', 'يوم'], 'extra' => ['الاثنين']],
                            'ru' => ['sentence' => 'вторник день', 'correct' => ['вторник', 'день'], 'extra' => ['понедельник']],
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
                            'tr' => ['sentence' => 'salı bir gün', 'correct' => ['salı', 'bir', 'gün'], 'extra' => ['pazartesi']],
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
                            'az' => ['sentence' => 'saat və təqvim', 'correct' => ['saat', 'və', 'təqvim'], 'extra' => ['bazar ertəsi']],
                            'ar' => ['sentence' => 'ساعة و تقويم', 'correct' => ['ساعة', 'و', 'تقويم'], 'extra' => ['الاثنين']],
                            'ru' => ['sentence' => 'часы и календарь', 'correct' => ['часы', 'и', 'календарь'], 'extra' => ['понедельник']],
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
                            'tr' => ['sentence' => 'saat ve takvim', 'correct' => ['saat', 've', 'takvim'], 'extra' => ['pazartesi']],
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
                            'az' => ['sentence' => 'bu gün və sabah', 'correct' => ['bu gün', 'və', 'sabah'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'اليوم و غدا', 'correct' => ['اليوم', 'و', 'غدا'], 'extra' => ['ساعة']],
                            'ru' => ['sentence' => 'сегодня и завтра', 'correct' => ['сегодня', 'и', 'завтра'], 'extra' => ['часы']],
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
                            'tr' => ['sentence' => 'bugün ve yarın', 'correct' => ['bugün', 've', 'yarın'], 'extra' => ['saat']],
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
                            'az' => ['sentence' => 'təqvim bu gün', 'correct' => ['təqvim', 'bu gün'], 'extra' => ['sabah']],
                            'ar' => ['sentence' => 'تقويم اليوم', 'correct' => ['تقويم', 'اليوم'], 'extra' => ['غدا']],
                            'ru' => ['sentence' => 'календарь сегодня', 'correct' => ['календарь', 'сегодня'], 'extra' => ['завтра']],
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
                            'tr' => ['sentence' => 'bugün takvim', 'correct' => ['bugün', 'takvim'], 'extra' => ['yarın']],
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
                            'az' => ['sentence' => 'saat və sabah', 'correct' => ['saat', 'və', 'sabah'], 'extra' => ['bu gün']],
                            'ar' => ['sentence' => 'ساعة و غدا', 'correct' => ['ساعة', 'و', 'غدا'], 'extra' => ['اليوم']],
                            'ru' => ['sentence' => 'часы и завтра', 'correct' => ['часы', 'и', 'завтра'], 'extra' => ['сегодня']],
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
                            'tr' => ['sentence' => 'saat ve yarın', 'correct' => ['saat', 've', 'yarın'], 'extra' => ['bugün']],
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
                            'az' => ['sentence' => 'həftə üzərində təqvim', 'correct' => ['həftə', 'üzərində', 'təqvim'], 'extra' => ['gecə']],
                            'ar' => ['sentence' => 'أسبوع على تقويم', 'correct' => ['أسبوع', 'على', 'تقويم'], 'extra' => ['ليل']],
                            'ru' => ['sentence' => 'неделя на календарь', 'correct' => ['неделя', 'на', 'календарь'], 'extra' => ['ночь']],
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
                            'tr' => ['sentence' => 'takvimde hafta', 'correct' => ['takvimde', 'hafta'], 'extra' => ['gece']],
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
                            'az' => ['sentence' => 'gecə', 'correct' => ['gecə'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'ليل', 'correct' => ['ليل'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'ночь', 'correct' => ['ночь'], 'extra' => ['неделя']],
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
                            'tr' => ['sentence' => 'gece', 'correct' => ['gece'], 'extra' => ['hafta']],
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
                            'az' => ['sentence' => 'saat və gecə', 'correct' => ['saat', 'və', 'gecə'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'ساعة و ليل', 'correct' => ['ساعة', 'و', 'ليل'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'часы и ночь', 'correct' => ['часы', 'и', 'ночь'], 'extra' => ['неделя']],
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
                            'tr' => ['sentence' => 'saat ve gece', 'correct' => ['saat', 've', 'gece'], 'extra' => ['hafta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
