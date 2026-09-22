<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner05Seeder extends Seeder
{
    private const PICTURES = ['시계' => 'clock', '달력' => 'calendar'];

    /**
     * Korean Chapter 1 (Beginner), Unit 5, the Korean twin of the English
     * "Unit 5: Days & Time" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, '유닛 5: 요일과 시간', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 시계 · 달력', 1,
                pictures: [['ko' => '시계', 'img' => 'clock'], ['ko' => '달력', 'img' => 'calendar']],
                plain: [['ko' => '아침'], ['ko' => '저녁']],
                phrases: [
                    'a' => [
                        'words' => ['아침'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the morning', 'correct' => ['the', 'morning'], 'extra' => ['evening']],
                            'az' => ['sentence' => 'səhər', 'correct' => ['səhər'], 'extra' => ['axşam']],
                            'ar' => ['sentence' => 'صباح', 'correct' => ['صباح'], 'extra' => ['مساء']],
                            'ru' => ['sentence' => 'утро', 'correct' => ['утро'], 'extra' => ['вечер']],
                            'es' => ['sentence' => 'La mañana', 'correct' => ['la', 'mañana'], 'extra' => ['tarde', 'reloj']],
                            'de' => ['sentence' => 'Der Morgen', 'correct' => ['der', 'Morgen'], 'extra' => ['Abend', 'Uhr']],
                            'fr' => ['sentence' => 'Le matin', 'correct' => ['le', 'matin'], 'extra' => ['soir', 'horloge']],
                            'ja' => ['sentence' => '朝', 'correct' => ['朝'], 'extra' => ['夕方']],
                            'tr' => ['sentence' => 'sabah', 'correct' => ['sabah'], 'extra' => ['akşam']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저녁'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the evening', 'correct' => ['the', 'evening'], 'extra' => ['morning']],
                            'az' => ['sentence' => 'axşam', 'correct' => ['axşam'], 'extra' => ['səhər']],
                            'ar' => ['sentence' => 'مساء', 'correct' => ['مساء'], 'extra' => ['صباح']],
                            'ru' => ['sentence' => 'вечер', 'correct' => ['вечер'], 'extra' => ['утро']],
                            'es' => ['sentence' => 'La tarde', 'correct' => ['la', 'tarde'], 'extra' => ['mañana', 'calendario']],
                            'de' => ['sentence' => 'Der Abend', 'correct' => ['der', 'Abend'], 'extra' => ['Morgen', 'Kalender']],
                            'fr' => ['sentence' => 'Le soir', 'correct' => ['le', 'soir'], 'extra' => ['matin', 'calendrier']],
                            'ja' => ['sentence' => '夕方', 'correct' => ['夕方'], 'extra' => ['朝']],
                            'tr' => ['sentence' => 'akşam', 'correct' => ['akşam'], 'extra' => ['sabah']],
                        ],
                    ],
                    'c' => [
                        'words' => ['시계와', '달력'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the clock and the calendar', 'correct' => ['the', 'clock', 'and', 'the', 'calendar'], 'extra' => ['morning']],
                            'az' => ['sentence' => 'saat və təqvim', 'correct' => ['saat', 'və', 'təqvim'], 'extra' => ['səhər']],
                            'ar' => ['sentence' => 'ساعة و تقويم', 'correct' => ['ساعة', 'و', 'تقويم'], 'extra' => ['صباح']],
                            'ru' => ['sentence' => 'часы и календарь', 'correct' => ['часы', 'и', 'календарь'], 'extra' => ['утро']],
                            'es' => ['sentence' => 'El reloj y el calendario', 'correct' => ['el', 'reloj', 'y', 'el', 'calendario'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Die Uhr und der Kalender', 'correct' => ['die', 'Uhr', 'und', 'der', 'Kalender'], 'extra' => ['Morgen']],
                            'fr' => ['sentence' => 'L\'horloge et le calendrier', 'correct' => ['horloge', 'et', 'le', 'calendrier'], 'extra' => ['matin']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['朝']],
                            'tr' => ['sentence' => 'saat ve takvim', 'correct' => ['saat', 've', 'takvim'], 'extra' => ['sabah']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 시계 · 달력', 2,
                pictures: [['ko' => '시계', 'img' => 'clock'], ['ko' => '달력', 'img' => 'calendar']],
                plain: [['ko' => '오늘'], ['ko' => '시간']],
                phrases: [
                    'a' => [
                        'words' => ['오늘의', '시계'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the clock today', 'correct' => ['the', 'clock', 'today'], 'extra' => ['hour']],
                            'az' => ['sentence' => 'saat bu gün', 'correct' => ['saat', 'bu gün'], 'extra' => []],
                            'ar' => ['sentence' => 'ساعة اليوم', 'correct' => ['ساعة', 'اليوم'], 'extra' => []],
                            'ru' => ['sentence' => 'часы сегодня', 'correct' => ['часы', 'сегодня'], 'extra' => ['час']],
                            'es' => ['sentence' => 'El reloj hoy', 'correct' => ['el', 'reloj', 'hoy'], 'extra' => ['hora', 'calendario']],
                            'de' => ['sentence' => 'Die Uhr heute', 'correct' => ['die', 'Uhr', 'heute'], 'extra' => ['Stunde', 'Kalender']],
                            'fr' => ['sentence' => 'L\'horloge aujourd\'hui', 'correct' => ['horloge', 'aujourd\'hui'], 'extra' => ['heure', 'calendrier']],
                            'ja' => ['sentence' => '今日の時計', 'correct' => ['今日', 'の', '時計'], 'extra' => ['時間']],
                            'tr' => ['sentence' => 'bugün saat', 'correct' => ['bugün', 'saat'], 'extra' => ['saat']],
                        ],
                    ],
                    'b' => [
                        'words' => ['한', '시간'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'one hour', 'correct' => ['one', 'hour'], 'extra' => ['today']],
                            'az' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['bu gün']],
                            'ar' => ['sentence' => 'واحد ساعة', 'correct' => ['واحد', 'ساعة'], 'extra' => ['اليوم']],
                            'ru' => ['sentence' => 'один час', 'correct' => ['один', 'час'], 'extra' => ['сегодня']],
                            'es' => ['sentence' => 'Una hora', 'correct' => ['uno', 'hora'], 'extra' => ['hoy', 'reloj']],
                            'de' => ['sentence' => 'Eine Stunde', 'correct' => ['eins', 'Stunde'], 'extra' => ['heute', 'Uhr']],
                            'fr' => ['sentence' => 'Une heure', 'correct' => ['un', 'heure'], 'extra' => ['aujourd\'hui', 'horloge']],
                            'ja' => ['sentence' => '一時間', 'correct' => ['一時間'], 'extra' => ['今日']],
                            'tr' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['bugün']],
                        ],
                    ],
                    'c' => [
                        'words' => ['오늘의', '달력'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the calendar today', 'correct' => ['the', 'calendar', 'today'], 'extra' => ['hour']],
                            'az' => ['sentence' => 'təqvim bu gün', 'correct' => ['təqvim', 'bu gün'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'تقويم اليوم', 'correct' => ['تقويم', 'اليوم'], 'extra' => ['ساعة']],
                            'ru' => ['sentence' => 'календарь сегодня', 'correct' => ['календарь', 'сегодня'], 'extra' => ['час']],
                            'es' => ['sentence' => 'El calendario hoy', 'correct' => ['el', 'calendario', 'hoy'], 'extra' => ['hora', 'reloj']],
                            'de' => ['sentence' => 'Der Kalender heute', 'correct' => ['der', 'Kalender', 'heute'], 'extra' => ['Stunde', 'Uhr']],
                            'fr' => ['sentence' => 'Le calendrier aujourd\'hui', 'correct' => ['le', 'calendrier', 'aujourd\'hui'], 'extra' => ['heure']],
                            'ja' => ['sentence' => '今日のカレンダー', 'correct' => ['今日', 'の', 'カレンダー'], 'extra' => ['時間']],
                            'tr' => ['sentence' => 'bugün takvim', 'correct' => ['bugün', 'takvim'], 'extra' => ['saat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 달력 · 시계', 3,
                pictures: [['ko' => '달력', 'img' => 'calendar'], ['ko' => '시계', 'img' => 'clock']],
                plain: [['ko' => '월요일'], ['ko' => '화요일']],
                phrases: [
                    'a' => [
                        'words' => ['오늘은', '월요일입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'today is Monday', 'correct' => ['today', 'is', 'Monday'], 'extra' => ['Tuesday']],
                            'az' => ['sentence' => 'bu gün bazar ertəsi', 'correct' => ['bu gün', 'bazar ertəsi'], 'extra' => ['çərşənbə axşamı']],
                            'ar' => ['sentence' => 'اليوم الاثنين', 'correct' => ['اليوم', 'الاثنين'], 'extra' => ['الثلاثاء']],
                            'ru' => ['sentence' => 'сегодня понедельник', 'correct' => ['сегодня', 'понедельник'], 'extra' => ['вторник']],
                            'es' => ['sentence' => 'Hoy es lunes', 'correct' => ['hoy', 'es', 'lunes'], 'extra' => ['martes']],
                            'de' => ['sentence' => 'Heute ist Montag', 'correct' => ['heute', 'ist', 'Montag'], 'extra' => ['Dienstag']],
                            'fr' => ['sentence' => 'Aujourd\'hui c\'est lundi', 'correct' => ['aujourd\'hui', 'est', 'lundi'], 'extra' => ['mardi']],
                            'ja' => ['sentence' => '今日は月曜日です', 'correct' => ['今日', 'は', '月曜日', 'です'], 'extra' => ['火曜日']],
                            'tr' => ['sentence' => 'bugün pazartesi', 'correct' => ['bugün', 'pazartesi'], 'extra' => ['salı']],
                        ],
                    ],
                    'b' => [
                        'words' => ['화요일은', '하루입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Tuesday is a day', 'correct' => ['Tuesday', 'is', 'a', 'day'], 'extra' => ['Monday']],
                            'az' => ['sentence' => 'çərşənbə axşamı bir gün', 'correct' => ['çərşənbə axşamı', 'bir', 'gün'], 'extra' => ['bazar ertəsi']],
                            'ar' => ['sentence' => 'الثلاثاء يوم', 'correct' => ['الثلاثاء', 'يوم'], 'extra' => ['الاثنين']],
                            'ru' => ['sentence' => 'вторник день', 'correct' => ['вторник', 'день'], 'extra' => ['понедельник']],
                            'es' => ['sentence' => 'El martes es un día', 'correct' => ['martes', 'es', 'un', 'día'], 'extra' => ['lunes']],
                            'de' => ['sentence' => 'Dienstag ist ein Tag', 'correct' => ['Dienstag', 'ist', 'ein', 'Tag'], 'extra' => ['Montag']],
                            'fr' => ['sentence' => 'Mardi est un jour', 'correct' => ['mardi', 'est', 'un', 'jour'], 'extra' => ['lundi']],
                            'ja' => ['sentence' => '火曜日は一日です', 'correct' => ['火曜日', 'は', '一', '日', 'です'], 'extra' => ['月曜日']],
                            'tr' => ['sentence' => 'salı bir gün', 'correct' => ['salı', 'bir', 'gün'], 'extra' => ['pazartesi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['시계와', '달력'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the clock and the calendar', 'correct' => ['the', 'clock', 'and', 'the', 'calendar'], 'extra' => ['Monday']],
                            'az' => ['sentence' => 'saat və təqvim', 'correct' => ['saat', 'və', 'təqvim'], 'extra' => ['bazar ertəsi']],
                            'ar' => ['sentence' => 'ساعة و تقويم', 'correct' => ['ساعة', 'و', 'تقويم'], 'extra' => ['الاثنين']],
                            'ru' => ['sentence' => 'часы и календарь', 'correct' => ['часы', 'и', 'календарь'], 'extra' => ['понедельник']],
                            'es' => ['sentence' => 'El reloj y el calendario', 'correct' => ['el', 'reloj', 'y', 'el', 'calendario'], 'extra' => ['lunes']],
                            'de' => ['sentence' => 'Die Uhr und der Kalender', 'correct' => ['die', 'Uhr', 'und', 'der', 'Kalender'], 'extra' => ['Montag']],
                            'fr' => ['sentence' => 'L\'horloge et le calendrier', 'correct' => ['horloge', 'et', 'le', 'calendrier'], 'extra' => ['lundi']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['月曜日']],
                            'tr' => ['sentence' => 'saat ve takvim', 'correct' => ['saat', 've', 'takvim'], 'extra' => ['pazartesi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 달력 · 시계', 4,
                pictures: [['ko' => '달력', 'img' => 'calendar'], ['ko' => '시계', 'img' => 'clock']],
                plain: [['ko' => '오늘'], ['ko' => '내일']],
                phrases: [
                    'a' => [
                        'words' => ['오늘과', '내일'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'today and tomorrow', 'correct' => ['today', 'and', 'tomorrow'], 'extra' => ['clock']],
                            'az' => ['sentence' => 'bu gün və sabah', 'correct' => ['bu gün', 'və', 'sabah'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'اليوم و غدا', 'correct' => ['اليوم', 'و', 'غدا'], 'extra' => ['ساعة']],
                            'ru' => ['sentence' => 'сегодня и завтра', 'correct' => ['сегодня', 'и', 'завтра'], 'extra' => ['часы']],
                            'es' => ['sentence' => 'Hoy y mañana', 'correct' => ['hoy', 'y', 'mañana'], 'extra' => ['reloj']],
                            'de' => ['sentence' => 'Heute und morgen', 'correct' => ['heute', 'und', 'morgen'], 'extra' => ['Uhr']],
                            'fr' => ['sentence' => 'Aujourd\'hui et demain', 'correct' => ['aujourd\'hui', 'et', 'demain'], 'extra' => ['horloge']],
                            'ja' => ['sentence' => '今日と明日', 'correct' => ['今日', 'と', '明日'], 'extra' => ['時計']],
                            'tr' => ['sentence' => 'bugün ve yarın', 'correct' => ['bugün', 've', 'yarın'], 'extra' => ['saat']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오늘의', '달력'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the calendar today', 'correct' => ['the', 'calendar', 'today'], 'extra' => ['tomorrow']],
                            'az' => ['sentence' => 'təqvim bu gün', 'correct' => ['təqvim', 'bu gün'], 'extra' => ['sabah']],
                            'ar' => ['sentence' => 'تقويم اليوم', 'correct' => ['تقويم', 'اليوم'], 'extra' => ['غدا']],
                            'ru' => ['sentence' => 'календарь сегодня', 'correct' => ['календарь', 'сегодня'], 'extra' => ['завтра']],
                            'es' => ['sentence' => 'El calendario hoy', 'correct' => ['el', 'calendario', 'hoy'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Der Kalender heute', 'correct' => ['der', 'Kalender', 'heute'], 'extra' => ['morgen']],
                            'fr' => ['sentence' => 'Le calendrier aujourd\'hui', 'correct' => ['le', 'calendrier', 'aujourd\'hui'], 'extra' => ['demain']],
                            'ja' => ['sentence' => '今日のカレンダー', 'correct' => ['今日', 'の', 'カレンダー'], 'extra' => ['明日']],
                            'tr' => ['sentence' => 'bugün takvim', 'correct' => ['bugün', 'takvim'], 'extra' => ['yarın']],
                        ],
                    ],
                    'c' => [
                        'words' => ['시계와', '내일'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the clock and tomorrow', 'correct' => ['the', 'clock', 'and', 'tomorrow'], 'extra' => ['today']],
                            'az' => ['sentence' => 'saat və sabah', 'correct' => ['saat', 'və', 'sabah'], 'extra' => ['bu gün']],
                            'ar' => ['sentence' => 'ساعة و غدا', 'correct' => ['ساعة', 'و', 'غدا'], 'extra' => ['اليوم']],
                            'ru' => ['sentence' => 'часы и завтра', 'correct' => ['часы', 'и', 'завтра'], 'extra' => ['сегодня']],
                            'es' => ['sentence' => 'El reloj y mañana', 'correct' => ['el', 'reloj', 'y', 'mañana'], 'extra' => ['hoy']],
                            'de' => ['sentence' => 'Die Uhr und morgen', 'correct' => ['die', 'Uhr', 'und', 'morgen'], 'extra' => ['heute']],
                            'fr' => ['sentence' => 'L\'horloge et demain', 'correct' => ['horloge', 'et', 'demain'], 'extra' => ['aujourd\'hui']],
                            'ja' => ['sentence' => '時計と明日', 'correct' => ['時計', 'と', '明日'], 'extra' => ['今日']],
                            'tr' => ['sentence' => 'saat ve yarın', 'correct' => ['saat', 've', 'yarın'], 'extra' => ['bugün']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 달력 · 시계', 5,
                pictures: [['ko' => '달력', 'img' => 'calendar'], ['ko' => '시계', 'img' => 'clock']],
                plain: [['ko' => '주'], ['ko' => '밤']],
                phrases: [
                    'a' => [
                        'words' => ['달력의', '주'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the week on the calendar', 'correct' => ['the', 'week', 'on', 'the', 'calendar'], 'extra' => ['night']],
                            'az' => ['sentence' => 'həftə üzərində təqvim', 'correct' => ['həftə', 'üzərində', 'təqvim'], 'extra' => ['gecə']],
                            'ar' => ['sentence' => 'أسبوع على تقويم', 'correct' => ['أسبوع', 'على', 'تقويم'], 'extra' => ['ليل']],
                            'ru' => ['sentence' => 'неделя на календарь', 'correct' => ['неделя', 'на', 'календарь'], 'extra' => ['ночь']],
                            'es' => ['sentence' => 'La semana en el calendario', 'correct' => ['la', 'semana', 'en', 'el', 'calendario'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Die Woche im Kalender', 'correct' => ['die', 'Woche', 'in', 'dem', 'Kalender'], 'extra' => ['Nacht']],
                            'fr' => ['sentence' => 'La semaine sur le calendrier', 'correct' => ['la', 'semaine', 'sur', 'le', 'calendrier'], 'extra' => ['nuit']],
                            'ja' => ['sentence' => 'カレンダーの週', 'correct' => ['カレンダー', 'の', '週'], 'extra' => ['夜']],
                            'tr' => ['sentence' => 'takvimde hafta', 'correct' => ['takvimde', 'hafta'], 'extra' => ['gece']],
                        ],
                    ],
                    'b' => [
                        'words' => ['밤'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the night', 'correct' => ['the', 'night'], 'extra' => ['week']],
                            'az' => ['sentence' => 'gecə', 'correct' => ['gecə'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'ليل', 'correct' => ['ليل'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'ночь', 'correct' => ['ночь'], 'extra' => ['неделя']],
                            'es' => ['sentence' => 'La noche', 'correct' => ['la', 'noche'], 'extra' => ['semana', 'reloj']],
                            'de' => ['sentence' => 'Die Nacht', 'correct' => ['die', 'Nacht'], 'extra' => ['Woche', 'Uhr']],
                            'fr' => ['sentence' => 'La nuit', 'correct' => ['la', 'nuit'], 'extra' => ['semaine', 'horloge']],
                            'ja' => ['sentence' => '夜', 'correct' => ['夜'], 'extra' => ['週']],
                            'tr' => ['sentence' => 'gece', 'correct' => ['gece'], 'extra' => ['hafta']],
                        ],
                    ],
                    'c' => [
                        'words' => ['시계와', '밤'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the clock and the night', 'correct' => ['the', 'clock', 'and', 'the', 'night'], 'extra' => ['week']],
                            'az' => ['sentence' => 'saat və gecə', 'correct' => ['saat', 'və', 'gecə'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'ساعة و ليل', 'correct' => ['ساعة', 'و', 'ليل'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'часы и ночь', 'correct' => ['часы', 'и', 'ночь'], 'extra' => ['неделя']],
                            'es' => ['sentence' => 'El reloj y la noche', 'correct' => ['el', 'reloj', 'y', 'la', 'noche'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Die Uhr und die Nacht', 'correct' => ['die', 'Uhr', 'und', 'die', 'Nacht'], 'extra' => ['Woche']],
                            'fr' => ['sentence' => 'L\'horloge et la nuit', 'correct' => ['horloge', 'et', 'la', 'nuit'], 'extra' => ['semaine']],
                            'ja' => ['sentence' => '時計と夜', 'correct' => ['時計', 'と', '夜'], 'extra' => ['週']],
                            'tr' => ['sentence' => 'saat ve gece', 'correct' => ['saat', 've', 'gece'], 'extra' => ['hafta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
