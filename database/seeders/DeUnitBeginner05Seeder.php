<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner05Seeder extends Seeder
{
    private const PICTURES = [
        'Uhr' => 'clock',
        'Kalender' => 'calendar',
        'Haus' => 'house',
        'Buch' => 'book',
        'Tisch' => 'table',
        'Stuhl' => 'chair',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 5, the German twin of the
     * English "Unit 5: Days & Time" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Einheit 5: Tage & Zeit', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Uhr & Kalender', 1,
                pictures: [
                    [
                        'de' => 'Uhr',
                        'img' => 'clock',
                    ],
                    [
                        'de' => 'Kalender',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Morgen',
                    ],
                    [
                        'de' => 'Abend',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Der',
                            'Morgen',
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
                            'az' => ['sentence' => 'səhər', 'correct' => ['səhər'], 'extra' => ['axşam', 'saat']],
                            'ar' => ['sentence' => 'صباح', 'correct' => ['صباح'], 'extra' => ['مساء', 'ساعة']],
                            'ru' => ['sentence' => 'утро', 'correct' => ['утро'], 'extra' => ['вечер', 'часы']],
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
                            'tr' => ['sentence' => 'sabah', 'correct' => ['sabah'], 'extra' => ['akşam', 'saat']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Abend',
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
                            'az' => ['sentence' => 'axşam', 'correct' => ['axşam'], 'extra' => ['səhər', 'təqvim']],
                            'ar' => ['sentence' => 'مساء', 'correct' => ['مساء'], 'extra' => ['صباح', 'تقويم']],
                            'ru' => ['sentence' => 'вечер', 'correct' => ['вечер'], 'extra' => ['утро', 'календарь']],
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
                            'tr' => ['sentence' => 'akşam', 'correct' => ['akşam'], 'extra' => ['sabah', 'takvim']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Uhr',
                            'und',
                            'der',
                            'Kalender',
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
                            'tr' => ['sentence' => 'saat ve takvim', 'correct' => ['saat', 've', 'takvim'], 'extra' => ['sabah']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Uhr & Kalender', 2,
                pictures: [
                    [
                        'de' => 'Uhr',
                        'img' => 'clock',
                    ],
                    [
                        'de' => 'Kalender',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'de' => 'heute',
                    ],
                    [
                        'de' => 'Stunde',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Uhr',
                            'heute',
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
                            'az' => ['sentence' => 'saat bu gün', 'correct' => ['saat', 'bu gün'], 'extra' => ['təqvim']],
                            'ar' => ['sentence' => 'ساعة اليوم', 'correct' => ['ساعة', 'اليوم'], 'extra' => ['تقويم']],
                            'ru' => ['sentence' => 'часы сегодня', 'correct' => ['часы', 'сегодня'], 'extra' => ['час', 'календарь']],
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
                            'tr' => ['sentence' => 'bugün saat', 'correct' => ['bugün', 'saat'], 'extra' => ['saat', 'takvim']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'Stunde',
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
                            'az' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['bu gün']],
                            'ar' => ['sentence' => 'واحد ساعة', 'correct' => ['واحد', 'ساعة'], 'extra' => ['اليوم']],
                            'ru' => ['sentence' => 'один час', 'correct' => ['один', 'час'], 'extra' => ['сегодня', 'часы']],
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
                            'tr' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['bugün', 'saat']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'Kalender',
                            'heute',
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
                            'az' => ['sentence' => 'təqvim bu gün', 'correct' => ['təqvim', 'bu gün'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'تقويم اليوم', 'correct' => ['تقويم', 'اليوم'], 'extra' => ['ساعة']],
                            'ru' => ['sentence' => 'календарь сегодня', 'correct' => ['календарь', 'сегодня'], 'extra' => ['час', 'часы']],
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
                            'tr' => ['sentence' => 'bugün takvim', 'correct' => ['bugün', 'takvim'], 'extra' => ['saat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Kalender & Uhr', 3,
                pictures: [
                    [
                        'de' => 'Kalender',
                        'img' => 'calendar',
                    ],
                    [
                        'de' => 'Uhr',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Montag',
                    ],
                    [
                        'de' => 'Dienstag',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Heute',
                            'ist',
                            'Montag',
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
                            'tr' => ['sentence' => 'bugün pazartesi', 'correct' => ['bugün', 'pazartesi'], 'extra' => ['salı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Dienstag',
                            'ist',
                            'ein',
                            'Tag',
                        ],
                        'blank' => 1,
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
                            'tr' => ['sentence' => 'salı bir gün', 'correct' => ['salı', 'bir', 'gün'], 'extra' => ['pazartesi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Uhr',
                            'und',
                            'der',
                            'Kalender',
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
                            'tr' => ['sentence' => 'saat ve takvim', 'correct' => ['saat', 've', 'takvim'], 'extra' => ['pazartesi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Kalender & Uhr', 4,
                pictures: [
                    [
                        'de' => 'Kalender',
                        'img' => 'calendar',
                    ],
                    [
                        'de' => 'Uhr',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'de' => 'heute',
                    ],
                    [
                        'de' => 'morgen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Heute',
                            'und',
                            'morgen',
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
                            'tr' => ['sentence' => 'bugün ve yarın', 'correct' => ['bugün', 've', 'yarın'], 'extra' => ['saat']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Kalender',
                            'heute',
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
                            'tr' => ['sentence' => 'bugün takvim', 'correct' => ['bugün', 'takvim'], 'extra' => ['yarın']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Uhr',
                            'und',
                            'morgen',
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
                            'tr' => ['sentence' => 'saat ve yarın', 'correct' => ['saat', 've', 'yarın'], 'extra' => ['bugün']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Kalender & Uhr', 5,
                pictures: [
                    [
                        'de' => 'Kalender',
                        'img' => 'calendar',
                    ],
                    [
                        'de' => 'Uhr',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Woche',
                    ],
                    [
                        'de' => 'Nacht',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Die',
                            'Woche',
                            'im',
                            'Kalender',
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
                            'tr' => ['sentence' => 'takvimde hafta', 'correct' => ['takvimde', 'hafta'], 'extra' => ['gece']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Die',
                            'Nacht',
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
                            'az' => ['sentence' => 'gecə', 'correct' => ['gecə'], 'extra' => ['həftə', 'saat']],
                            'ar' => ['sentence' => 'ليل', 'correct' => ['ليل'], 'extra' => ['أسبوع', 'ساعة']],
                            'ru' => ['sentence' => 'ночь', 'correct' => ['ночь'], 'extra' => ['неделя', 'часы']],
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
                            'tr' => ['sentence' => 'gece', 'correct' => ['gece'], 'extra' => ['hafta', 'saat']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Die',
                            'Uhr',
                            'und',
                            'die',
                            'Nacht',
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
                            'tr' => ['sentence' => 'saat ve gece', 'correct' => ['saat', 've', 'gece'], 'extra' => ['hafta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
