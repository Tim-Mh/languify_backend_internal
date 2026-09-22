<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner08Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Saat' => 'clock', 'Güneş' => 'sun', 'Gece' => 'moon', 'Hafta' => 'calendar',
        'Kitap' => 'book', 'Ev' => 'house', 'Okul' => 'school', 'Masa' => 'table',
    ];

    /**
     * Turkish Beginner Unit 8 — time, days and when things happen.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * NO NEW GRAMMAR, ON PURPOSE. Unit 7 introduced conjugation, which is the
     * heaviest idea so far. This unit is nouns and time words, so the learner
     * spends five lessons using `yürüyorum` and `okuyorum` in new sentences
     * rather than meeting another ending. Time words in Turkish sit at the
     * front of the sentence and need no marking at all: `bugün okula gitmek`
     * is simply "today to-school to-go".
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Time & Days', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Morning & Evening', 1,
                pictures: [['tr' => 'Güneş', 'img' => 'sun'], ['tr' => 'Gece', 'img' => 'moon']],
                plain: [['tr' => 'Sabah'], ['tr' => 'Akşam']],
                phrases: [
                    'a' => [
                        'words' => ['sabah', 've', 'akşam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Morning and evening', 'correct' => ['morning', 'and', 'evening'], 'extra' => ['night']],
                            'az' => ['sentence' => 'səhər və axşam', 'correct' => ['səhər', 'və', 'axşam'], 'extra' => ['gecə']],
                            'ar' => ['sentence' => 'صباح و مساء', 'correct' => ['صباح', 'و', 'مساء'], 'extra' => ['ليل']],
                            'ru' => ['sentence' => 'утро и вечер', 'correct' => ['утро', 'и', 'вечер'], 'extra' => ['ночь']],
                            'fr' => ['sentence' => 'Matin et soir', 'correct' => ['matin', 'et', 'soir'], 'extra' => ['nuit']],
                            'es' => ['sentence' => 'Mañana y tarde', 'correct' => ['mañana', 'y', 'tarde'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Morgen und Abend', 'correct' => ['Morgen', 'und', 'Abend'], 'extra' => ['Nacht']],
                            'ja' => ['sentence' => '朝と夕方', 'correct' => ['朝', 'と', '夕方'], 'extra' => ['夜']],
                            'ko' => ['sentence' => '아침과 저녁', 'correct' => ['아침과', '저녁'], 'extra' => ['밤']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sabah', 'güneş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The sun in the morning', 'correct' => ['the sun in', 'the morning'], 'extra' => ['night']],
                            'az' => ['sentence' => 'günəş içində səhər', 'correct' => ['günəş', 'içində', 'səhər'], 'extra' => ['gecə']],
                            'ar' => ['sentence' => 'شمس في صباح', 'correct' => ['شمس', 'في', 'صباح'], 'extra' => ['ليل']],
                            'ru' => ['sentence' => 'солнце в утро', 'correct' => ['солнце', 'в', 'утро'], 'extra' => ['ночь']],
                            'fr' => ['sentence' => 'Le soleil le matin', 'correct' => ['le soleil', 'le matin'], 'extra' => ['nuit']],
                            'es' => ['sentence' => 'El sol por la mañana', 'correct' => ['el sol por', 'la mañana'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Die Sonne am Morgen', 'correct' => ['Die Sonne', 'am Morgen'], 'extra' => ['Nacht']],
                            'ja' => ['sentence' => '朝の太陽', 'correct' => ['朝', 'の', '太陽'], 'extra' => ['夜']],
                            'ko' => ['sentence' => '아침 태양', 'correct' => ['아침', '태양'], 'extra' => ['밤']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sabah', 'güneş', 've', 'gece', 'saat'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The sun in the morning and the clock at night', 'correct' => ['the sun', 'in the', 'morning and', 'the clock', 'at night'], 'extra' => ['evening']],
                            'az' => ['sentence' => 'günəş səhər və saat gecələr', 'correct' => ['günəş', 'səhər', 'və', 'saat', 'gecələr'], 'extra' => ['axşam']],
                            'ar' => ['sentence' => 'شمس في صباح و ساعة ليلا', 'correct' => ['شمس', 'في', 'صباح', 'و', 'ساعة', 'ليلا'], 'extra' => ['مساء']],
                            'ru' => ['sentence' => 'солнце в утро и часы ночью', 'correct' => ['солнце', 'в', 'утро', 'и', 'часы', 'ночью'], 'extra' => ['вечер']],
                            'fr' => ['sentence' => 'Le soleil le matin et une horloge la nuit', 'correct' => ['le soleil', 'le matin', 'et une', 'horloge la', 'nuit'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'El sol por la mañana y el reloj por la noche', 'correct' => ['el sol por', 'la mañana', 'y el', 'reloj por', 'la noche'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Die Sonne am Morgen und die Uhr in der Nacht', 'correct' => ['Die Sonne', 'am Morgen', 'und die', 'Uhr in', 'der Nacht'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '朝の太陽と夜の時計', 'correct' => ['朝', 'の', '太陽', 'と', '夜', 'の', '時計'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '아침 태양과 밤 시계', 'correct' => ['아침', '태양과', '밤', '시계'], 'extra' => ['저녁']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Today & Tomorrow', 2,
                pictures: [['tr' => 'Saat', 'img' => 'clock'], ['tr' => 'Hafta', 'img' => 'calendar']],
                plain: [['tr' => 'Bugün'], ['tr' => 'Yarın']],
                phrases: [
                    'a' => [
                        'words' => ['bugün', 've', 'yarın'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Today and tomorrow', 'correct' => ['today', 'and', 'tomorrow'], 'extra' => ['week']],
                            'az' => ['sentence' => 'bu gün və sabah', 'correct' => ['bu gün', 'və', 'sabah'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'اليوم و غدا', 'correct' => ['اليوم', 'و', 'غدا'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'сегодня и завтра', 'correct' => ['сегодня', 'и', 'завтра'], 'extra' => ['неделя']],
                            'fr' => ['sentence' => "Aujourd'hui et demain", 'correct' => ["aujourd'hui", 'et', 'demain'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Hoy y mañana', 'correct' => ['hoy', 'y', 'mañana'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Heute und morgen', 'correct' => ['heute', 'und', 'morgen'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '今日と明日', 'correct' => ['今日', 'と', '明日'], 'extra' => ['週']],
                            'ko' => ['sentence' => '오늘과 내일', 'correct' => ['오늘과', '내일'], 'extra' => ['주']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bugün', 'bir', 'gün'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Today is a day', 'correct' => ['today is', 'a', 'day'], 'extra' => ['week']],
                            'az' => ['sentence' => 'bu gün bir gün', 'correct' => ['bu gün', 'bir', 'gün'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'اليوم يوم', 'correct' => ['اليوم', 'يوم'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'сегодня день', 'correct' => ['сегодня', 'день'], 'extra' => ['неделя']],
                            'fr' => ['sentence' => "Aujourd'hui est un jour", 'correct' => ["aujourd'hui", 'un', 'jour'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Hoy es un día', 'correct' => ['hoy es', 'un', 'día'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Heute ist ein Tag', 'correct' => ['heute ist', 'ein', 'Tag'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '今日は一日です', 'correct' => ['今日', 'は', '一', '日', 'です'], 'extra' => ['週']],
                            'ko' => ['sentence' => '오늘은 하루입니다', 'correct' => ['오늘은', '하루입니다'], 'extra' => ['주']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 've', 'yarın', 'bir', 'hafta'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Today and tomorrow a week', 'correct' => ['today', 'and', 'tomorrow', 'a', 'week'], 'extra' => ['clock']],
                            'az' => ['sentence' => 'bu gün və sabah bir həftə', 'correct' => ['bu gün', 'və', 'sabah', 'bir', 'həftə'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'اليوم و غدا أسبوع', 'correct' => ['اليوم', 'و', 'غدا', 'أسبوع'], 'extra' => ['ساعة']],
                            'ru' => ['sentence' => 'сегодня и завтра неделя', 'correct' => ['сегодня', 'и', 'завтра', 'неделя'], 'extra' => ['часы']],
                            'fr' => ['sentence' => "Aujourd'hui et demain une semaine", 'correct' => ["aujourd'hui", 'et', 'demain', 'une', 'semaine'], 'extra' => ['horloge']],
                            'es' => ['sentence' => 'Hoy y mañana una semana', 'correct' => ['hoy', 'y', 'mañana', 'una', 'semana'], 'extra' => ['reloj']],
                            'de' => ['sentence' => 'Heute und morgen eine Woche', 'correct' => ['heute', 'und', 'morgen', 'eine', 'Woche'], 'extra' => ['Uhr']],
                            'ja' => ['sentence' => '今日と明日、一週間', 'correct' => ['今日', 'と', '明日', '一', '週', '間'], 'extra' => ['時計']],
                            'ko' => ['sentence' => '오늘과 내일 한 주', 'correct' => ['오늘과', '내일', '한', '주'], 'extra' => ['시계']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: The Clock', 3,
                pictures: [['tr' => 'Saat', 'img' => 'clock'], ['tr' => 'Güneş', 'img' => 'sun']],
                plain: [['tr' => 'Bir'], ['tr' => 'Büyük']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'saat'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A clock', 'correct' => ['a', 'clock'], 'extra' => ['sun']],
                            'az' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['günəş']],
                            'ar' => ['sentence' => 'ساعة', 'correct' => ['ساعة'], 'extra' => ['شمس']],
                            'ru' => ['sentence' => 'часы', 'correct' => ['часы'], 'extra' => ['солнце']],
                            'fr' => ['sentence' => 'Une horloge', 'correct' => ['une', 'horloge'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Un reloj', 'correct' => ['un', 'reloj'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Eine Uhr', 'correct' => ['eine', 'Uhr'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '時計', 'correct' => ['時計'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '시계', 'correct' => ['시계'], 'extra' => ['태양']],
                        ],
                    ],
                    'b' => [
                        'words' => ['büyük', 'bir', 'saat'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big clock', 'correct' => ['a', 'big', 'clock'], 'extra' => ['sun']],
                            'az' => ['sentence' => 'bir böyük saat', 'correct' => ['bir', 'böyük', 'saat'], 'extra' => ['günəş']],
                            'ar' => ['sentence' => 'كبير ساعة', 'correct' => ['كبير', 'ساعة'], 'extra' => ['شمس']],
                            'ru' => ['sentence' => 'большой часы', 'correct' => ['большой', 'часы'], 'extra' => ['солнце']],
                            'fr' => ['sentence' => 'Une grande horloge', 'correct' => ['une', 'grande', 'horloge'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Un reloj grande', 'correct' => ['un', 'reloj', 'grande'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Eine große Uhr', 'correct' => ['eine', 'große', 'Uhr'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '大きい時計', 'correct' => ['大きい', '時計'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '큰 시계', 'correct' => ['큰', '시계'], 'extra' => ['태양']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'bir', 'saat', 've', 'bir', 'hafta'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Today a clock and a week', 'correct' => ['today', 'a', 'clock', 'and', 'a', 'week'], 'extra' => ['day']],
                            'az' => ['sentence' => 'bu gün bir saat və bir həftə', 'correct' => ['bu gün', 'bir', 'saat', 'və', 'bir', 'həftə'], 'extra' => ['gün']],
                            'ar' => ['sentence' => 'اليوم ساعة و أسبوع', 'correct' => ['اليوم', 'ساعة', 'و', 'أسبوع'], 'extra' => ['يوم']],
                            'ru' => ['sentence' => 'сегодня часы и неделя', 'correct' => ['сегодня', 'часы', 'и', 'неделя'], 'extra' => ['день']],
                            'fr' => ['sentence' => "Aujourd'hui une horloge et une semaine", 'correct' => ["aujourd'hui", 'une', 'horloge', 'et', 'une', 'semaine'], 'extra' => ['jour']],
                            'es' => ['sentence' => 'Hoy un reloj y una semana', 'correct' => ['hoy', 'un', 'reloj', 'y', 'una', 'semana'], 'extra' => ['día']],
                            'de' => ['sentence' => 'Heute eine Uhr und eine Woche', 'correct' => ['heute', 'eine', 'Uhr', 'und', 'eine', 'Woche'], 'extra' => ['Tag']],
                            'ja' => ['sentence' => '今日、時計と一週間', 'correct' => ['今日', '時計', 'と', '一', '週', '間'], 'extra' => ['日']],
                            'ko' => ['sentence' => '오늘 시계와 한 주', 'correct' => ['오늘', '시계와', '한', '주'], 'extra' => ['날']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: My Day', 4,
                pictures: [['tr' => 'Okul', 'img' => 'school'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Bugün'], ['tr' => 'Sabah']],
                phrases: [
                    'a' => [
                        'words' => ['bugün', 'okula', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to school today', 'correct' => ['to go', 'to school', 'today'], 'extra' => ['house']],
                            'az' => ['sentence' => 'getmək məktəbə bu gün', 'correct' => ['getmək', 'məktəbə', 'bu gün'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'الذهاب إلى المدرسة اليوم', 'correct' => ['الذهاب', 'إلى المدرسة', 'اليوم'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'идти в школу сегодня', 'correct' => ['идти', 'в', 'школу', 'сегодня'], 'extra' => ['дом']],
                            'fr' => ['sentence' => "Aller à l'école aujourd'hui", 'correct' => ["aujourd'hui", 'aller', "à l'école"], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Ir a la escuela hoy', 'correct' => ['ir', 'a la escuela', 'hoy'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Heute zur Schule gehen', 'correct' => ['heute', 'zur Schule', 'gehen'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '今日学校へ行く', 'correct' => ['今日', '学校', 'へ', '行く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '오늘 학교에 가다', 'correct' => ['오늘', '학교에', '가다'], 'extra' => ['집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sabah', 'ben', 'okuyorum'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I read in the morning', 'correct' => ['i read', 'in the', 'morning'], 'extra' => ['evening']],
                            'az' => ['sentence' => 'oxuyuram səhər', 'correct' => ['oxuyuram', 'səhər'], 'extra' => ['axşam']],
                            'ar' => ['sentence' => 'أقرأ في صباح', 'correct' => ['أقرأ', 'في', 'صباح'], 'extra' => ['مساء']],
                            'ru' => ['sentence' => 'я читаю в утро', 'correct' => ['я', 'читаю', 'в', 'утро'], 'extra' => ['вечер']],
                            'fr' => ['sentence' => 'Je lis le matin', 'correct' => ['je lis', 'le', 'matin'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'Leo por la mañana', 'correct' => ['leo por', 'la', 'mañana'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Ich lese am Morgen', 'correct' => ['Ich lese', 'am', 'Morgen'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '私は朝読む', 'correct' => ['私', 'は', '朝', '読む'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '나는 아침에 읽는다', 'correct' => ['나는', '아침에', '읽는다'], 'extra' => ['저녁']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'ben', 'eve', 'yürüyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Today I walk home', 'correct' => ['today', 'I', 'walk', 'home'], 'extra' => ['school']],
                            'az' => ['sentence' => 'bu gün mən gəzirəm evdəyəm', 'correct' => ['bu gün', 'mən', 'gəzirəm', 'evdəyəm'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'اليوم أنا أتمشى في البيت', 'correct' => ['اليوم', 'أنا', 'أتمشى', 'في البيت'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'сегодня я гуляю дома', 'correct' => ['сегодня', 'я', 'гуляю', 'дома'], 'extra' => ['школа']],
                            'fr' => ['sentence' => "Aujourd'hui je marche à la maison", 'correct' => ["aujourd'hui", 'je', 'je marche', 'à la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Hoy camino a casa', 'correct' => ['hoy', 'camino', 'a', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Heute gehe ich nach Hause', 'correct' => ['heute gehe', 'ich', 'nach', 'Hause'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '今日私は家へ歩く', 'correct' => ['今日', '私', 'は', '家', 'へ', '歩く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '오늘 나는 집에 걷는다', 'correct' => ['오늘', '나는', '집에', '걷는다'], 'extra' => ['학교']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: This Week', 5,
                pictures: [['tr' => 'Hafta', 'img' => 'calendar'], ['tr' => 'Saat', 'img' => 'clock']],
                plain: [['tr' => 'Yarın'], ['tr' => 'Gün']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'hafta', 've', 'bir', 'gün'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A week and a day', 'correct' => ['a', 'week', 'and', 'a', 'day'], 'extra' => ['clock']],
                            'az' => ['sentence' => 'bir həftə və bir gün', 'correct' => ['bir', 'həftə', 'və', 'bir', 'gün'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'أسبوع و يوم', 'correct' => ['أسبوع', 'و', 'يوم'], 'extra' => ['ساعة']],
                            'ru' => ['sentence' => 'неделя и день', 'correct' => ['неделя', 'и', 'день'], 'extra' => ['часы']],
                            'fr' => ['sentence' => 'Une semaine et un jour', 'correct' => ['une', 'semaine', 'et', 'un', 'jour'], 'extra' => ['horloge']],
                            'es' => ['sentence' => 'Una semana y un día', 'correct' => ['una', 'semana', 'y', 'un', 'día'], 'extra' => ['reloj']],
                            'de' => ['sentence' => 'Eine Woche und ein Tag', 'correct' => ['eine', 'Woche', 'und', 'ein', 'Tag'], 'extra' => ['Uhr']],
                            'ja' => ['sentence' => '一週間と一日', 'correct' => ['一', '週', '間', 'と', '一', '日'], 'extra' => ['時計']],
                            'ko' => ['sentence' => '한 주와 하루', 'correct' => ['한', '주와', '하루'], 'extra' => ['시계']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yarın', 'parka', 'gitmek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park tomorrow', 'correct' => ['to go', 'to the park', 'tomorrow'], 'extra' => ['week']],
                            'az' => ['sentence' => 'getmək parka sabah', 'correct' => ['getmək', 'parka', 'sabah'], 'extra' => ['həftə']],
                            'ar' => ['sentence' => 'الذهاب إلى الحديقة غدا', 'correct' => ['الذهاب', 'إلى', 'الحديقة', 'غدا'], 'extra' => ['أسبوع']],
                            'ru' => ['sentence' => 'идти в парк завтра', 'correct' => ['идти', 'в', 'парк', 'завтра'], 'extra' => ['неделя']],
                            'fr' => ['sentence' => 'Aller au parc demain', 'correct' => ['aller', 'au parc', 'demain'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Ir al parque mañana', 'correct' => ['ir', 'al parque', 'mañana'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Morgen zum Park gehen', 'correct' => ['morgen', 'zum Park', 'gehen'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '明日公園へ行く', 'correct' => ['明日', '公園', 'へ', '行く'], 'extra' => ['週']],
                            'ko' => ['sentence' => '내일 공원에 가다', 'correct' => ['내일', '공원에', '가다'], 'extra' => ['주']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 've', 'yarın', 'ben', 'çok', 'okuyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Today and tomorrow I read a lot', 'correct' => ['today and', 'tomorrow', 'I', 'read', 'a', 'lot'], 'extra' => ['day']],
                            'az' => ['sentence' => 'bu gün və sabah mən oxuyuram bir çoxlu', 'correct' => ['bu gün', 'və', 'sabah', 'mən', 'oxuyuram', 'bir', 'çoxlu'], 'extra' => ['gün']],
                            'ar' => ['sentence' => 'اليوم و غدا أنا أقرأ كثير', 'correct' => ['اليوم', 'و', 'غدا', 'أنا', 'أقرأ', 'كثير'], 'extra' => ['يوم']],
                            'ru' => ['sentence' => 'сегодня и завтра я читаю много', 'correct' => ['сегодня', 'и', 'завтра', 'я', 'читаю', 'много'], 'extra' => ['день']],
                            'fr' => ['sentence' => "Aujourd'hui et demain je lis beaucoup", 'correct' => ["aujourd'hui", 'et', 'demain', 'je', 'je lis', 'beaucoup'], 'extra' => ['jour']],
                            'es' => ['sentence' => 'Hoy y mañana leo mucho', 'correct' => ['hoy', 'y', 'mañana', 'leo', 'mucho'], 'extra' => ['día']],
                            'de' => ['sentence' => 'Heute und morgen lese ich viel', 'correct' => ['heute', 'und', 'morgen', 'lese', 'ich', 'viel'], 'extra' => ['Tag']],
                            'ja' => ['sentence' => '今日と明日私はたくさん読む', 'correct' => ['今日', 'と', '明日', '私', 'は', 'たくさん', '読む'], 'extra' => ['日']],
                            'ko' => ['sentence' => '오늘과 내일 나는 많이 읽는다', 'correct' => ['오늘과', '내일', '나는', '많이', '읽는다'], 'extra' => ['날']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
