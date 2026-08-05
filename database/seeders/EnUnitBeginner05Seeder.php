<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner05Seeder extends Seeder
{
    private const PICTURES = [
        'Clock' => 'clock', 'Calendar' => 'calendar', 'House' => 'house', 'Book' => 'book',
        'Table' => 'table', 'Chair' => 'chair',
    ];

    /**
     * English Chapter 1, Unit 5 — days and telling the time.
     *
     * Most time words cannot be drawn, so every lesson keeps a clock and a
     * calendar as its visual anchor and teaches the day/part-of-day words
     * through short phrases attached to them.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Days & Time', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Morning & Evening', 1,
                pictures: [['en' => 'Clock', 'img' => 'clock'], ['en' => 'Calendar', 'img' => 'calendar']],
                plain: [['en' => 'Morning'], ['en' => 'Evening']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'morning'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La mañana', 'correct' => ['la', 'mañana'], 'extra' => ['tarde', 'reloj']],
                            'de' => ['sentence' => 'Der Morgen', 'correct' => ['der', 'Morgen'], 'extra' => ['Abend', 'Uhr']],
                            'ja' => ['sentence' => '朝', 'correct' => ['朝'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '아침', 'correct' => ['아침'], 'extra' => ['저녁']],
                            'fr' => ['sentence' => 'Le matin', 'correct' => ['le', 'matin'], 'extra' => ['soir', 'horloge']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'evening'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La tarde', 'correct' => ['la', 'tarde'], 'extra' => ['mañana', 'calendario']],
                            'de' => ['sentence' => 'Der Abend', 'correct' => ['der', 'Abend'], 'extra' => ['Morgen', 'Kalender']],
                            'ja' => ['sentence' => '夕方', 'correct' => ['夕方'], 'extra' => ['朝']],
                            'ko' => ['sentence' => '저녁', 'correct' => ['저녁'], 'extra' => ['아침']],
                            'fr' => ['sentence' => 'Le soir', 'correct' => ['le', 'soir'], 'extra' => ['matin', 'calendrier']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'clock', 'and', 'the', 'calendar'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El reloj y el calendario', 'correct' => ['el', 'reloj', 'y', 'el', 'calendario'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Die Uhr und der Kalender', 'correct' => ['die', 'Uhr', 'und', 'der', 'Kalender'], 'extra' => ['Morgen']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['朝']],
                            'ko' => ['sentence' => '시계와 달력', 'correct' => ['시계와', '달력'], 'extra' => ['아침']],
                            'fr' => ['sentence' => "L'horloge et le calendrier", 'correct' => ['horloge', 'et', 'le', 'calendrier'], 'extra' => ['matin']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Clock & Calendar', 2,
                pictures: [['en' => 'Clock', 'img' => 'clock'], ['en' => 'Calendar', 'img' => 'calendar']],
                plain: [['en' => 'Today'], ['en' => 'Hour']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'clock', 'today'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El reloj hoy', 'correct' => ['el', 'reloj', 'hoy'], 'extra' => ['hora', 'calendario']],
                            'de' => ['sentence' => 'Die Uhr heute', 'correct' => ['die', 'Uhr', 'heute'], 'extra' => ['Stunde', 'Kalender']],
                            'ja' => ['sentence' => '今日の時計', 'correct' => ['今日', 'の', '時計'], 'extra' => ['時間']],
                            'ko' => ['sentence' => '오늘의 시계', 'correct' => ['오늘의', '시계'], 'extra' => ['시간']],
                            'fr' => ['sentence' => "L'horloge aujourd'hui", 'correct' => ['horloge', "aujourd'hui"], 'extra' => ['heure', 'calendrier']],
                        ],
                    ],
                    'b' => [
                        'words' => ['one', 'hour'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una hora', 'correct' => ['uno', 'hora'], 'extra' => ['hoy', 'reloj']],
                            'de' => ['sentence' => 'Eine Stunde', 'correct' => ['eins', 'Stunde'], 'extra' => ['heute', 'Uhr']],
                            'ja' => ['sentence' => '一時間', 'correct' => ['一時間'], 'extra' => ['今日']],
                            'ko' => ['sentence' => '한 시간', 'correct' => ['한', '시간'], 'extra' => ['오늘']],
                            'fr' => ['sentence' => 'Une heure', 'correct' => ['un', 'heure'], 'extra' => ["aujourd'hui", 'horloge']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'calendar', 'today'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El calendario hoy', 'correct' => ['el', 'calendario', 'hoy'], 'extra' => ['hora', 'reloj']],
                            'de' => ['sentence' => 'Der Kalender heute', 'correct' => ['der', 'Kalender', 'heute'], 'extra' => ['Stunde', 'Uhr']],
                            'ja' => ['sentence' => '今日のカレンダー', 'correct' => ['今日', 'の', 'カレンダー'], 'extra' => ['時間']],
                            'ko' => ['sentence' => '오늘의 달력', 'correct' => ['오늘의', '달력'], 'extra' => ['시간']],
                            'fr' => ['sentence' => "Le calendrier aujourd'hui", 'correct' => ['le', 'calendrier', "aujourd'hui"], 'extra' => ['heure']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Monday & Tuesday', 3,
                pictures: [['en' => 'Calendar', 'img' => 'calendar'], ['en' => 'Clock', 'img' => 'clock']],
                plain: [['en' => 'Monday'], ['en' => 'Tuesday']],
                phrases: [
                    'a' => [
                        'words' => ['today', 'is', 'Monday'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Hoy es lunes', 'correct' => ['hoy', 'es', 'lunes'], 'extra' => ['martes']],
                            'de' => ['sentence' => 'Heute ist Montag', 'correct' => ['heute', 'ist', 'Montag'], 'extra' => ['Dienstag']],
                            'ja' => ['sentence' => '今日は月曜日です', 'correct' => ['今日', 'は', '月曜日', 'です'], 'extra' => ['火曜日']],
                            'ko' => ['sentence' => '오늘은 월요일입니다', 'correct' => ['오늘은', '월요일입니다'], 'extra' => ['화요일']],
                            'fr' => ['sentence' => "Aujourd'hui c'est lundi", 'correct' => ["aujourd'hui", 'est', 'lundi'], 'extra' => ['mardi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['Tuesday', 'is', 'a', 'day'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El martes es un día', 'correct' => ['martes', 'es', 'un', 'día'], 'extra' => ['lunes']],
                            'de' => ['sentence' => 'Dienstag ist ein Tag', 'correct' => ['Dienstag', 'ist', 'ein', 'Tag'], 'extra' => ['Montag']],
                            'ja' => ['sentence' => '火曜日は一日です', 'correct' => ['火曜日', 'は', '一', '日', 'です'], 'extra' => ['月曜日']],
                            'ko' => ['sentence' => '화요일은 하루입니다', 'correct' => ['화요일은', '하루입니다'], 'extra' => ['월요일']],
                            'fr' => ['sentence' => 'Mardi est un jour', 'correct' => ['mardi', 'est', 'un', 'jour'], 'extra' => ['lundi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'clock', 'and', 'the', 'calendar'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El reloj y el calendario', 'correct' => ['el', 'reloj', 'y', 'el', 'calendario'], 'extra' => ['lunes']],
                            'de' => ['sentence' => 'Die Uhr und der Kalender', 'correct' => ['die', 'Uhr', 'und', 'der', 'Kalender'], 'extra' => ['Montag']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['月曜日']],
                            'ko' => ['sentence' => '시계와 달력', 'correct' => ['시계와', '달력'], 'extra' => ['월요일']],
                            'fr' => ['sentence' => "L'horloge et le calendrier", 'correct' => ['horloge', 'et', 'le', 'calendrier'], 'extra' => ['lundi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Today & Tomorrow', 4,
                pictures: [['en' => 'Calendar', 'img' => 'calendar'], ['en' => 'Clock', 'img' => 'clock']],
                plain: [['en' => 'Today'], ['en' => 'Tomorrow']],
                phrases: [
                    'a' => [
                        'words' => ['today', 'and', 'tomorrow'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Hoy y mañana', 'correct' => ['hoy', 'y', 'mañana'], 'extra' => ['reloj']],
                            'de' => ['sentence' => 'Heute und morgen', 'correct' => ['heute', 'und', 'morgen'], 'extra' => ['Uhr']],
                            'ja' => ['sentence' => '今日と明日', 'correct' => ['今日', 'と', '明日'], 'extra' => ['時計']],
                            'ko' => ['sentence' => '오늘과 내일', 'correct' => ['오늘과', '내일'], 'extra' => ['시계']],
                            'fr' => ['sentence' => "Aujourd'hui et demain", 'correct' => ["aujourd'hui", 'et', 'demain'], 'extra' => ['horloge']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'calendar', 'today'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El calendario hoy', 'correct' => ['el', 'calendario', 'hoy'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Der Kalender heute', 'correct' => ['der', 'Kalender', 'heute'], 'extra' => ['morgen']],
                            'ja' => ['sentence' => '今日のカレンダー', 'correct' => ['今日', 'の', 'カレンダー'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '오늘의 달력', 'correct' => ['오늘의', '달력'], 'extra' => ['내일']],
                            'fr' => ['sentence' => "Le calendrier aujourd'hui", 'correct' => ['le', 'calendrier', "aujourd'hui"], 'extra' => ['demain']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'clock', 'and', 'tomorrow'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El reloj y mañana', 'correct' => ['el', 'reloj', 'y', 'mañana'], 'extra' => ['hoy']],
                            'de' => ['sentence' => 'Die Uhr und morgen', 'correct' => ['die', 'Uhr', 'und', 'morgen'], 'extra' => ['heute']],
                            'ja' => ['sentence' => '時計と明日', 'correct' => ['時計', 'と', '明日'], 'extra' => ['今日']],
                            'ko' => ['sentence' => '시계와 내일', 'correct' => ['시계와', '내일'], 'extra' => ['오늘']],
                            'fr' => ['sentence' => "L'horloge et demain", 'correct' => ['horloge', 'et', 'demain'], 'extra' => ["aujourd'hui"]],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Week & Night', 5,
                pictures: [['en' => 'Calendar', 'img' => 'calendar'], ['en' => 'Clock', 'img' => 'clock']],
                plain: [['en' => 'Week'], ['en' => 'Night']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'week', 'on', 'the', 'calendar'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La semana en el calendario', 'correct' => ['la', 'semana', 'en', 'el', 'calendario'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Die Woche im Kalender', 'correct' => ['die', 'Woche', 'in', 'dem', 'Kalender'], 'extra' => ['Nacht']],
                            'ja' => ['sentence' => 'カレンダーの週', 'correct' => ['カレンダー', 'の', '週'], 'extra' => ['夜']],
                            'ko' => ['sentence' => '달력의 주', 'correct' => ['달력의', '주'], 'extra' => ['밤']],
                            'fr' => ['sentence' => 'La semaine sur le calendrier', 'correct' => ['la', 'semaine', 'sur', 'le', 'calendrier'], 'extra' => ['nuit']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'night'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La noche', 'correct' => ['la', 'noche'], 'extra' => ['semana', 'reloj']],
                            'de' => ['sentence' => 'Die Nacht', 'correct' => ['die', 'Nacht'], 'extra' => ['Woche', 'Uhr']],
                            'ja' => ['sentence' => '夜', 'correct' => ['夜'], 'extra' => ['週']],
                            'ko' => ['sentence' => '밤', 'correct' => ['밤'], 'extra' => ['주']],
                            'fr' => ['sentence' => 'La nuit', 'correct' => ['la', 'nuit'], 'extra' => ['semaine', 'horloge']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'clock', 'and', 'the', 'night'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El reloj y la noche', 'correct' => ['el', 'reloj', 'y', 'la', 'noche'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Die Uhr und die Nacht', 'correct' => ['die', 'Uhr', 'und', 'die', 'Nacht'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '時計と夜', 'correct' => ['時計', 'と', '夜'], 'extra' => ['週']],
                            'ko' => ['sentence' => '시계와 밤', 'correct' => ['시계와', '밤'], 'extra' => ['주']],
                            'fr' => ['sentence' => "L'horloge et la nuit", 'correct' => ['horloge', 'et', 'la', 'nuit'], 'extra' => ['semaine']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
