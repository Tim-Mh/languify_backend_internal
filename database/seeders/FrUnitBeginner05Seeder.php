<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner05Seeder extends Seeder
{
    private const PICTURES = [
        'Soleil' => 'sun', 'Lune' => 'moon', 'Horloge' => 'clock',
        'Calendrier' => 'calendar', 'Table' => 'table', 'Maison' => 'house',
    ];

    /**
     * French Beginner Unit 5 — the day, the week, and saying when.
     *
     * Time words are only useful attached to something, so every one of them
     * lands in a phrase: "lundi matin", "aujourd'hui et demain", "le soleil le
     * jour et la lune la nuit". The previous version drilled heure, semaine,
     * aujourd'hui and demain in isolation and never used them.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Days & Time', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Morning & Evening', 1,
                pictures: [['fr' => 'Soleil', 'img' => 'sun'], ['fr' => 'Lune', 'img' => 'moon']],
                plain: [['fr' => 'Matin'], ['fr' => 'Soir']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'matin'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The morning', 'correct' => ['the', 'morning'], 'extra' => ['evening', 'sun']],
                            'az' => ['sentence' => 'səhər', 'correct' => ['səhər'], 'extra' => ['axşam', 'günəş']],
                            'ar' => ['sentence' => 'صباح', 'correct' => ['صباح'], 'extra' => ['مساء', 'شمس']],
                            'ru' => ['sentence' => 'утро', 'correct' => ['утро'], 'extra' => ['вечер', 'солнце']],
                            'es' => ['sentence' => 'La mañana', 'correct' => ['la', 'mañana'], 'extra' => ['tarde', 'sol']],
                            'de' => ['sentence' => 'Der Morgen', 'correct' => ['der', 'Morgen'], 'extra' => ['Abend', 'Sonne']],
                            'ja' => ['sentence' => '朝', 'correct' => ['朝'], 'extra' => ['夕方', '太陽']],
                            'ko' => ['sentence' => '아침', 'correct' => ['아침'], 'extra' => ['저녁', '태양']],
                            'tr' => ['sentence' => 'sabah', 'correct' => ['sabah'], 'extra' => ['akşam', 'güneş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'soir'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The evening', 'correct' => ['the', 'evening'], 'extra' => ['morning', 'moon']],
                            'az' => ['sentence' => 'axşam', 'correct' => ['axşam'], 'extra' => ['səhər', 'ay']],
                            'ar' => ['sentence' => 'مساء', 'correct' => ['مساء'], 'extra' => ['صباح', 'قمر']],
                            'ru' => ['sentence' => 'вечер', 'correct' => ['вечер'], 'extra' => ['утро', 'луна']],
                            'es' => ['sentence' => 'La tarde', 'correct' => ['la', 'tarde'], 'extra' => ['mañana', 'luna']],
                            'de' => ['sentence' => 'Der Abend', 'correct' => ['der', 'Abend'], 'extra' => ['Morgen', 'Mond']],
                            'ja' => ['sentence' => '夕方', 'correct' => ['夕方'], 'extra' => ['朝', '月']],
                            'ko' => ['sentence' => '저녁', 'correct' => ['저녁'], 'extra' => ['아침', '달']],
                            'tr' => ['sentence' => 'akşam', 'correct' => ['akşam'], 'extra' => ['sabah', 'ay']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'soleil', 'le', 'matin', 'et', 'la', 'lune', 'le', 'soir'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The sun in the morning and the moon in the evening', 'correct' => ['the', 'sun', 'in', 'the', 'morning', 'and', 'the', 'moon', 'in', 'the', 'evening'], 'extra' => ['night']],
                            'az' => ['sentence' => 'günəş içində səhər və ay içində axşam', 'correct' => ['günəş', 'içində', 'səhər', 'və', 'ay', 'içində', 'axşam'], 'extra' => ['gecə']],
                            'ar' => ['sentence' => 'شمس في صباح و قمر في مساء', 'correct' => ['شمس', 'في', 'صباح', 'و', 'قمر', 'في', 'مساء'], 'extra' => ['ليل']],
                            'ru' => ['sentence' => 'солнце в утро и луна в вечер', 'correct' => ['солнце', 'в', 'утро', 'и', 'луна', 'в', 'вечер'], 'extra' => ['ночь']],
                            'es' => ['sentence' => 'El sol por la mañana y la luna por la tarde', 'correct' => ['el', 'sol', 'por', 'la', 'mañana', 'y', 'la', 'luna', 'por', 'la', 'tarde'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Die Sonne am Morgen und der Mond am Abend', 'correct' => ['die', 'Sonne', 'am', 'Morgen', 'und', 'der', 'Mond', 'am', 'Abend'], 'extra' => ['Nacht']],
                            'ja' => ['sentence' => '朝の太陽と夕方の月', 'correct' => ['朝', 'の', '太陽', 'と', '夕方', 'の', '月'], 'extra' => ['夜']],
                            'ko' => ['sentence' => '아침의 태양과 저녁의 달', 'correct' => ['아침의', '태양과', '저녁의', '달'], 'extra' => ['밤']],
                            'tr' => ['sentence' => 'sabah güneş ve akşam ay', 'correct' => ['sabah', 'güneş', 've', 'akşam', 'ay'], 'extra' => ['gece']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Clock & Calendar', 2,
                pictures: [['fr' => 'Horloge', 'img' => 'clock'], ['fr' => 'Calendrier', 'img' => 'calendar']],
                plain: [['fr' => 'Heure'], ['fr' => 'Jour']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'heure'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'An hour', 'correct' => ['an', 'hour'], 'extra' => ['day', 'clock']],
                            'az' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['gün']],
                            'ar' => ['sentence' => 'ساعة', 'correct' => ['ساعة'], 'extra' => ['يوم']],
                            'ru' => ['sentence' => 'час', 'correct' => ['час'], 'extra' => ['день', 'часы']],
                            'es' => ['sentence' => 'Una hora', 'correct' => ['una', 'hora'], 'extra' => ['día', 'reloj']],
                            'de' => ['sentence' => 'Eine Stunde', 'correct' => ['eine', 'Stunde'], 'extra' => ['Tag', 'Uhr']],
                            'ja' => ['sentence' => '一時間', 'correct' => ['一時間'], 'extra' => ['日', '時計']],
                            'ko' => ['sentence' => '한 시간', 'correct' => ['한', '시간'], 'extra' => ['날', '시계']],
                            'tr' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['gün', 'saat']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'jour'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The day', 'correct' => ['the', 'day'], 'extra' => ['hour', 'calendar']],
                            'az' => ['sentence' => 'gün', 'correct' => ['gün'], 'extra' => ['saat', 'təqvim']],
                            'ar' => ['sentence' => 'يوم', 'correct' => ['يوم'], 'extra' => ['ساعة', 'تقويم']],
                            'ru' => ['sentence' => 'день', 'correct' => ['день'], 'extra' => ['час', 'календарь']],
                            'es' => ['sentence' => 'El día', 'correct' => ['el', 'día'], 'extra' => ['hora', 'calendario']],
                            'de' => ['sentence' => 'Der Tag', 'correct' => ['der', 'Tag'], 'extra' => ['Stunde', 'Kalender']],
                            'ja' => ['sentence' => '日', 'correct' => ['日'], 'extra' => ['時間', 'カレンダー']],
                            'ko' => ['sentence' => '날', 'correct' => ['날'], 'extra' => ['시간', '달력']],
                            'tr' => ['sentence' => 'gün', 'correct' => ['gün'], 'extra' => ['saat', 'takvim']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'horloge', 'et', 'un', 'calendrier'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A clock and a calendar', 'correct' => ['a', 'clock', 'and', 'a', 'calendar'], 'extra' => ['hour']],
                            'az' => ['sentence' => 'bir saat və bir təqvim', 'correct' => ['bir', 'saat', 'və', 'bir', 'təqvim'], 'extra' => []],
                            'ar' => ['sentence' => 'ساعة و تقويم', 'correct' => ['ساعة', 'و', 'تقويم'], 'extra' => []],
                            'ru' => ['sentence' => 'часы и календарь', 'correct' => ['часы', 'и', 'календарь'], 'extra' => ['час']],
                            'es' => ['sentence' => 'Un reloj y un calendario', 'correct' => ['un', 'reloj', 'y', 'un', 'calendario'], 'extra' => ['hora']],
                            'de' => ['sentence' => 'Eine Uhr und ein Kalender', 'correct' => ['eine', 'Uhr', 'und', 'ein', 'Kalender'], 'extra' => ['Stunde']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['時間']],
                            'ko' => ['sentence' => '시계와 달력', 'correct' => ['시계와', '달력'], 'extra' => ['시간']],
                            'tr' => ['sentence' => 'bir saat ve bir takvim', 'correct' => ['bir', 'saat', 've', 'bir', 'takvim'], 'extra' => ['saat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Monday & Tuesday', 3,
                pictures: [['fr' => 'Soleil', 'img' => 'sun'], ['fr' => 'Horloge', 'img' => 'clock']],
                plain: [['fr' => 'Lundi'], ['fr' => 'Mardi']],
                phrases: [
                    'a' => [
                        'words' => ['lundi', 'matin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Monday morning', 'correct' => ['Monday', 'morning'], 'extra' => ['Tuesday', 'evening']],
                            'az' => ['sentence' => 'bazar ertəsi səhər', 'correct' => ['bazar ertəsi', 'səhər'], 'extra' => ['çərşənbə axşamı', 'axşam']],
                            'ar' => ['sentence' => 'الاثنين صباح', 'correct' => ['الاثنين', 'صباح'], 'extra' => ['الثلاثاء', 'مساء']],
                            'ru' => ['sentence' => 'понедельник утро', 'correct' => ['понедельник', 'утро'], 'extra' => ['вторник', 'вечер']],
                            'es' => ['sentence' => 'Lunes por la mañana', 'correct' => ['lunes', 'por', 'la', 'mañana'], 'extra' => ['martes']],
                            'de' => ['sentence' => 'Montag Morgen', 'correct' => ['Montag', 'Morgen'], 'extra' => ['Dienstag', 'Abend']],
                            'ja' => ['sentence' => '月曜日の朝', 'correct' => ['月曜日', 'の', '朝'], 'extra' => ['火曜日']],
                            'ko' => ['sentence' => '월요일 아침', 'correct' => ['월요일', '아침'], 'extra' => ['화요일', '저녁']],
                            'tr' => ['sentence' => 'pazartesi sabahı', 'correct' => ['pazartesi', 'sabahı'], 'extra' => ['salı', 'akşam']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mardi', 'soir'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Tuesday evening', 'correct' => ['Tuesday', 'evening'], 'extra' => ['Monday', 'morning']],
                            'az' => ['sentence' => 'çərşənbə axşamı axşam', 'correct' => ['çərşənbə axşamı', 'axşam'], 'extra' => ['bazar ertəsi', 'səhər']],
                            'ar' => ['sentence' => 'الثلاثاء مساء', 'correct' => ['الثلاثاء', 'مساء'], 'extra' => ['الاثنين', 'صباح']],
                            'ru' => ['sentence' => 'вторник вечер', 'correct' => ['вторник', 'вечер'], 'extra' => ['понедельник', 'утро']],
                            'es' => ['sentence' => 'Martes por la tarde', 'correct' => ['martes', 'por', 'la', 'tarde'], 'extra' => ['lunes']],
                            'de' => ['sentence' => 'Dienstag Abend', 'correct' => ['Dienstag', 'Abend'], 'extra' => ['Montag', 'Morgen']],
                            'ja' => ['sentence' => '火曜日の夕方', 'correct' => ['火曜日', 'の', '夕方'], 'extra' => ['月曜日']],
                            'ko' => ['sentence' => '화요일 저녁', 'correct' => ['화요일', '저녁'], 'extra' => ['월요일', '아침']],
                            'tr' => ['sentence' => 'salı akşamı', 'correct' => ['salı', 'akşamı'], 'extra' => ['pazartesi', 'sabah']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'horloge', 'et', 'le', 'soleil'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A clock and the sun', 'correct' => ['a', 'clock', 'and', 'the', 'sun'], 'extra' => ['moon']],
                            'az' => ['sentence' => 'bir saat və günəş', 'correct' => ['bir', 'saat', 'və', 'günəş'], 'extra' => ['ay']],
                            'ar' => ['sentence' => 'ساعة و شمس', 'correct' => ['ساعة', 'و', 'شمس'], 'extra' => ['قمر']],
                            'ru' => ['sentence' => 'часы и солнце', 'correct' => ['часы', 'и', 'солнце'], 'extra' => ['луна']],
                            'es' => ['sentence' => 'Un reloj y el sol', 'correct' => ['un', 'reloj', 'y', 'el', 'sol'], 'extra' => ['luna']],
                            'de' => ['sentence' => 'Eine Uhr und die Sonne', 'correct' => ['eine', 'Uhr', 'und', 'die', 'Sonne'], 'extra' => ['Mond']],
                            'ja' => ['sentence' => '時計と太陽', 'correct' => ['時計', 'と', '太陽'], 'extra' => ['月']],
                            'ko' => ['sentence' => '시계와 태양', 'correct' => ['시계와', '태양'], 'extra' => ['달']],
                            'tr' => ['sentence' => 'bir saat ve güneş', 'correct' => ['bir', 'saat', 've', 'güneş'], 'extra' => ['ay']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Today & Tomorrow', 4,
                pictures: [['fr' => 'Calendrier', 'img' => 'calendar'], ['fr' => 'Lune', 'img' => 'moon']],
                plain: [['fr' => "Aujourd'hui"], ['fr' => 'Demain']],
                phrases: [
                    'a' => [
                        'words' => ["aujourd'hui", 'et', 'demain'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Today and tomorrow', 'correct' => ['today', 'and', 'tomorrow'], 'extra' => ['evening']],
                            'az' => ['sentence' => 'bu gün və sabah', 'correct' => ['bu gün', 'və', 'sabah'], 'extra' => ['axşam']],
                            'ar' => ['sentence' => 'اليوم و غدا', 'correct' => ['اليوم', 'و', 'غدا'], 'extra' => ['مساء']],
                            'ru' => ['sentence' => 'сегодня и завтра', 'correct' => ['сегодня', 'и', 'завтра'], 'extra' => ['вечер']],
                            'es' => ['sentence' => 'Hoy y mañana', 'correct' => ['hoy', 'y', 'mañana'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Heute und morgen', 'correct' => ['heute', 'und', 'morgen'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '今日と明日', 'correct' => ['今日', 'と', '明日'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '오늘과 내일', 'correct' => ['오늘과', '내일'], 'extra' => ['저녁']],
                            'tr' => ['sentence' => 'bugün ve yarın', 'correct' => ['bugün', 've', 'yarın'], 'extra' => ['akşam']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'calendrier'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A calendar', 'correct' => ['a', 'calendar'], 'extra' => ['moon', 'today']],
                            'az' => ['sentence' => 'bir təqvim', 'correct' => ['bir', 'təqvim'], 'extra' => ['ay', 'bu gün']],
                            'ar' => ['sentence' => 'تقويم', 'correct' => ['تقويم'], 'extra' => ['قمر', 'اليوم']],
                            'ru' => ['sentence' => 'календарь', 'correct' => ['календарь'], 'extra' => ['луна', 'сегодня']],
                            'es' => ['sentence' => 'Un calendario', 'correct' => ['un', 'calendario'], 'extra' => ['luna', 'hoy']],
                            'de' => ['sentence' => 'Ein Kalender', 'correct' => ['ein', 'Kalender'], 'extra' => ['Mond', 'heute']],
                            'ja' => ['sentence' => 'カレンダー', 'correct' => ['カレンダー'], 'extra' => ['月', '今日']],
                            'ko' => ['sentence' => '달력', 'correct' => ['달력'], 'extra' => ['달', '오늘']],
                            'tr' => ['sentence' => 'bir takvim', 'correct' => ['bir', 'takvim'], 'extra' => ['ay', 'bugün']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'lune', 'et', 'un', 'calendrier'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The moon and a calendar', 'correct' => ['the', 'moon', 'and', 'a', 'calendar'], 'extra' => ['tomorrow']],
                            'az' => ['sentence' => 'ay və bir təqvim', 'correct' => ['ay', 'və', 'bir', 'təqvim'], 'extra' => ['sabah']],
                            'ar' => ['sentence' => 'قمر و تقويم', 'correct' => ['قمر', 'و', 'تقويم'], 'extra' => ['غدا']],
                            'ru' => ['sentence' => 'луна и календарь', 'correct' => ['луна', 'и', 'календарь'], 'extra' => ['завтра']],
                            'es' => ['sentence' => 'La luna y un calendario', 'correct' => ['la', 'luna', 'y', 'un', 'calendario'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Der Mond und ein Kalender', 'correct' => ['der', 'Mond', 'und', 'ein', 'Kalender'], 'extra' => ['morgen']],
                            'ja' => ['sentence' => '月とカレンダー', 'correct' => ['月', 'と', 'カレンダー'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '달과 달력', 'correct' => ['달과', '달력'], 'extra' => ['내일']],
                            'tr' => ['sentence' => 'ay ve bir takvim', 'correct' => ['ay', 've', 'bir', 'takvim'], 'extra' => ['yarın']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Week & Night', 5,
                pictures: [['fr' => 'Soleil', 'img' => 'sun'], ['fr' => 'Lune', 'img' => 'moon']],
                plain: [['fr' => 'Semaine'], ['fr' => 'Nuit']],
                phrases: [
                    'a' => [
                        'words' => ['la', 'nuit'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The night', 'correct' => ['the', 'night'], 'extra' => ['week', 'day']],
                            'az' => ['sentence' => 'gecə', 'correct' => ['gecə'], 'extra' => ['həftə', 'gün']],
                            'ar' => ['sentence' => 'ليل', 'correct' => ['ليل'], 'extra' => ['أسبوع', 'يوم']],
                            'ru' => ['sentence' => 'ночь', 'correct' => ['ночь'], 'extra' => ['неделя', 'день']],
                            'es' => ['sentence' => 'La noche', 'correct' => ['la', 'noche'], 'extra' => ['semana', 'día']],
                            'de' => ['sentence' => 'Die Nacht', 'correct' => ['die', 'Nacht'], 'extra' => ['Woche', 'Tag']],
                            'ja' => ['sentence' => '夜', 'correct' => ['夜'], 'extra' => ['週', '日']],
                            'ko' => ['sentence' => '밤', 'correct' => ['밤'], 'extra' => ['주', '날']],
                            'tr' => ['sentence' => 'gece', 'correct' => ['gece'], 'extra' => ['hafta', 'gün']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'semaine'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A week', 'correct' => ['a', 'week'], 'extra' => ['night', 'hour']],
                            'az' => ['sentence' => 'bir həftə', 'correct' => ['bir', 'həftə'], 'extra' => ['gecə', 'saat']],
                            'ar' => ['sentence' => 'أسبوع', 'correct' => ['أسبوع'], 'extra' => ['ليل', 'ساعة']],
                            'ru' => ['sentence' => 'неделя', 'correct' => ['неделя'], 'extra' => ['ночь', 'час']],
                            'es' => ['sentence' => 'Una semana', 'correct' => ['una', 'semana'], 'extra' => ['noche', 'hora']],
                            'de' => ['sentence' => 'Eine Woche', 'correct' => ['eine', 'Woche'], 'extra' => ['Nacht', 'Stunde']],
                            'ja' => ['sentence' => '一週間', 'correct' => ['一', '週', '間'], 'extra' => ['夜', '時間']],
                            'ko' => ['sentence' => '일주일', 'correct' => ['일주일'], 'extra' => ['밤', '시간']],
                            'tr' => ['sentence' => 'bir hafta', 'correct' => ['bir', 'hafta'], 'extra' => ['gece', 'saat']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'soleil', 'le', 'jour', 'et', 'la', 'lune', 'la', 'nuit'], 'blank' => 6,
                        'tr' => [
                            'en' => ['sentence' => 'The sun in the day and the moon at night', 'correct' => ['the', 'sun', 'in', 'the', 'day', 'and', 'the', 'moon', 'at', 'night'], 'extra' => ['week']],
                            'az' => ['sentence' => 'günəş içində gün və ay yanında gecə', 'correct' => ['günəş', 'içində', 'gün', 'və', 'ay', 'yanında', 'gecə'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'شمس في يوم و قمر على ليل', 'correct' => ['شمس', 'في', 'يوم', 'و', 'قمر', 'على', 'ليل'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'солнце в день и луна на ночь', 'correct' => ['солнце', 'в', 'день', 'и', 'луна', 'на', 'ночь'], 'extra' => ['неделя']],
                            'es' => ['sentence' => 'El sol de día y la luna de noche', 'correct' => ['el', 'sol', 'de', 'día', 'y', 'la', 'luna', 'de', 'noche'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Die Sonne am Tag und der Mond in der Nacht', 'correct' => ['die', 'Sonne', 'am', 'Tag', 'und', 'der', 'Mond', 'in', 'der', 'Nacht'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '昼の太陽と夜の月', 'correct' => ['昼', 'の', '太陽', 'と', '夜', 'の', '月'], 'extra' => ['週']],
                            'ko' => ['sentence' => '낮의 태양과 밤의 달', 'correct' => ['낮의', '태양과', '밤의', '달'], 'extra' => ['주']],
                            'tr' => ['sentence' => 'gündüz güneş ve gece ay', 'correct' => ['gündüz', 'güneş', 've', 'gece', 'ay'], 'extra' => ['hafta']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
