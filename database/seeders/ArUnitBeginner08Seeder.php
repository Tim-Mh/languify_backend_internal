<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitBeginner08Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'شمس' => 'sun', 'ساعة' => 'clock', 'أسبوع' => 'calendar', 'قهوة' => 'coffee',
        'كبير' => 'big', 'الذهاب' => 'park', 'شاي' => 'tea', 'ماء' => 'water',
    ];

    /**
     * Arabic Beginner Unit 8.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Time & Days', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Morning & Evening', 1,
                pictures: [['ar' => 'شمس', 'img' => 'sun'], ['ar' => 'ساعة', 'img' => 'clock']],
                plain: [['ar' => 'صباح'], ['ar' => 'مساء']],
                phrases: [
                    'a' => [
                        'words' => ['صباح', 'و', 'مساء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Morning and evening', 'correct' => ['morning', 'and', 'evening'], 'extra' => ['night']],
                            'az' => ['sentence' => 'səhər və axşam', 'correct' => ['səhər', 'və', 'axşam'], 'extra' => ['gecə']],
                            'fr' => ['sentence' => 'Matin et soir', 'correct' => ['matin', 'et', 'soir'], 'extra' => ['nuit']],
                            'es' => ['sentence' => 'Mañana y tarde', 'correct' => ['mañana', 'y', 'tarde'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Morgen und Abend', 'correct' => ['Morgen', 'und', 'Abend'], 'extra' => ['Nacht']],
                            'ja' => ['sentence' => '朝と夕方', 'correct' => ['朝', 'と', '夕方'], 'extra' => ['夜']],
                            'ko' => ['sentence' => '아침과 저녁', 'correct' => ['아침과', '저녁'], 'extra' => ['밤']],
                            'tr' => ['sentence' => 'sabah ve akşam', 'correct' => ['sabah', 've', 'akşam'], 'extra' => ['güneş', 'gece']],
                            'ru' => ['sentence' => 'утро и вечер', 'correct' => ['утро', 'и', 'вечер'], 'extra' => ['ночь']],
                        ],
                    ],
                    'b' => [
                        'words' => ['شمس', 'في', 'صباح'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The sun in the morning', 'correct' => ['the sun in', 'the morning'], 'extra' => ['night']],
                            'az' => ['sentence' => 'günəş içində səhər', 'correct' => ['günəş', 'içində', 'səhər'], 'extra' => ['gecə']],
                            'fr' => ['sentence' => 'Le soleil le matin', 'correct' => ['le soleil', 'le matin'], 'extra' => ['nuit']],
                            'es' => ['sentence' => 'El sol por la mañana', 'correct' => ['el sol por', 'la mañana'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Die Sonne am Morgen', 'correct' => ['Die Sonne', 'am Morgen'], 'extra' => ['Nacht']],
                            'ja' => ['sentence' => '朝の太陽', 'correct' => ['朝', 'の', '太陽'], 'extra' => ['夜']],
                            'ko' => ['sentence' => '아침 태양', 'correct' => ['아침', '태양'], 'extra' => ['밤']],
                            'tr' => ['sentence' => 'sabah güneş', 'correct' => ['sabah', 'güneş'], 'extra' => ['akşam', 'gece']],
                            'ru' => ['sentence' => 'солнце в утро', 'correct' => ['солнце', 'в', 'утро'], 'extra' => ['ночь']],
                        ],
                    ],
                    'c' => [
                        'words' => ['شمس', 'في', 'صباح', 'و', 'ساعة', 'ليلا'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The sun in the morning and the clock at night', 'correct' => ['the sun', 'in the', 'morning and', 'the clock', 'at night'], 'extra' => ['evening']],
                            'az' => ['sentence' => 'günəş səhər və saat gecələr', 'correct' => ['günəş', 'səhər', 'və', 'saat', 'gecələr'], 'extra' => ['axşam']],
                            'fr' => ['sentence' => 'Le soleil le matin et une horloge la nuit', 'correct' => ['le soleil', 'le matin', 'et une', 'horloge la', 'nuit'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'El sol por la mañana y el reloj por la noche', 'correct' => ['el sol por', 'la mañana', 'y el', 'reloj por', 'la noche'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Die Sonne am Morgen und die Uhr in der Nacht', 'correct' => ['Die Sonne', 'am Morgen', 'und die', 'Uhr in', 'der Nacht'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '朝の太陽と夜の時計', 'correct' => ['朝', 'の', '太陽', 'と', '夜', 'の', '時計'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '아침 태양과 밤 시계', 'correct' => ['아침', '태양과', '밤', '시계'], 'extra' => ['저녁']],
                            'tr' => ['sentence' => 'sabah güneş ve gece saat', 'correct' => ['sabah', 'güneş', 've', 'gece', 'saat'], 'extra' => ['akşam']],
                            'ru' => ['sentence' => 'солнце в утро и часы ночью', 'correct' => ['солнце', 'в', 'утро', 'и', 'часы', 'ночью'], 'extra' => ['вечер']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Today & Tomorrow', 2,
                pictures: [['ar' => 'أسبوع', 'img' => 'calendar'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'اليوم'], ['ar' => 'غدا']],
                phrases: [
                    'a' => [
                        'words' => ['اليوم', 'و', 'غدا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today and tomorrow', 'correct' => ['today', 'and', 'tomorrow'], 'extra' => ['week']],
                            'az' => ['sentence' => 'bu gün və sabah', 'correct' => ['bu gün', 'və', 'sabah'], 'extra' => ['həftə']],
                            'fr' => ['sentence' => "Aujourd'hui et demain", 'correct' => ["aujourd'hui", 'et', 'demain'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Hoy y mañana', 'correct' => ['hoy', 'y', 'mañana'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Heute und morgen', 'correct' => ['heute', 'und', 'morgen'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '今日と明日', 'correct' => ['今日', 'と', '明日'], 'extra' => ['週']],
                            'ko' => ['sentence' => '오늘과 내일', 'correct' => ['오늘과', '내일'], 'extra' => ['주']],
                            'tr' => ['sentence' => 'bugün ve yarın', 'correct' => ['bugün', 've', 'yarın'], 'extra' => ['saat', 'hafta']],
                            'ru' => ['sentence' => 'сегодня и завтра', 'correct' => ['сегодня', 'и', 'завтра'], 'extra' => ['неделя']],
                        ],
                    ],
                    'b' => [
                        'words' => ['اليوم', 'يوم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today is a day', 'correct' => ['today is', 'a', 'day'], 'extra' => ['week']],
                            'az' => ['sentence' => 'bu gün bir gün', 'correct' => ['bu gün', 'bir', 'gün'], 'extra' => ['həftə']],
                            'fr' => ['sentence' => "Aujourd'hui est un jour", 'correct' => ["aujourd'hui", 'un', 'jour'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Hoy es un día', 'correct' => ['hoy es', 'un', 'día'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Heute ist ein Tag', 'correct' => ['heute ist', 'ein', 'Tag'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '今日は一日です', 'correct' => ['今日', 'は', '一', '日', 'です'], 'extra' => ['週']],
                            'ko' => ['sentence' => '오늘은 하루입니다', 'correct' => ['오늘은', '하루입니다'], 'extra' => ['주']],
                            'tr' => ['sentence' => 'bugün bir gün', 'correct' => ['bugün', 'bir', 'gün'], 'extra' => ['yarın', 'saat']],
                            'ru' => ['sentence' => 'сегодня день', 'correct' => ['сегодня', 'день'], 'extra' => ['неделя']],
                        ],
                    ],
                    'c' => [
                        'words' => ['اليوم', 'و', 'غدا', 'أسبوع'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today and tomorrow a week', 'correct' => ['today', 'and', 'tomorrow', 'a', 'week'], 'extra' => ['clock']],
                            'az' => ['sentence' => 'bu gün və sabah bir həftə', 'correct' => ['bu gün', 'və', 'sabah', 'bir', 'həftə'], 'extra' => ['saat']],
                            'fr' => ['sentence' => "Aujourd'hui et demain une semaine", 'correct' => ["aujourd'hui", 'et', 'demain', 'une', 'semaine'], 'extra' => ['horloge']],
                            'es' => ['sentence' => 'Hoy y mañana una semana', 'correct' => ['hoy', 'y', 'mañana', 'una', 'semana'], 'extra' => ['reloj']],
                            'de' => ['sentence' => 'Heute und morgen eine Woche', 'correct' => ['heute', 'und', 'morgen', 'eine', 'Woche'], 'extra' => ['Uhr']],
                            'ja' => ['sentence' => '今日と明日、一週間', 'correct' => ['今日', 'と', '明日', '一', '週', '間'], 'extra' => ['時計']],
                            'ko' => ['sentence' => '오늘과 내일 한 주', 'correct' => ['오늘과', '내일', '한', '주'], 'extra' => ['시계']],
                            'tr' => ['sentence' => 'bugün ve yarın bir hafta', 'correct' => ['bugün', 've', 'yarın', 'bir', 'hafta'], 'extra' => ['saat']],
                            'ru' => ['sentence' => 'сегодня и завтра неделя', 'correct' => ['сегодня', 'и', 'завтра', 'неделя'], 'extra' => ['часы']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: The Clock', 3,
                pictures: [['ar' => 'ساعة', 'img' => 'clock'], ['ar' => 'كبير', 'img' => 'big']],
                plain: [['ar' => 'هذا'], ['ar' => 'اليوم']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'ساعة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A clock', 'correct' => ['this is', 'a', 'clock'], 'extra' => ['sun']],
                            'az' => ['sentence' => 'bu bir saat', 'correct' => ['bu', 'bir', 'saat'], 'extra' => ['günəş']],
                            'fr' => ['sentence' => "C'est Une horloge", 'correct' => ["c'est", 'une', 'horloge'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Esto es Un reloj', 'correct' => ['esto es', 'un', 'reloj'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Das ist Eine Uhr', 'correct' => ['das ist', 'eine', 'Uhr'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => 'これは時計です', 'correct' => ['これは', '時計'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '이것은 시계입니다', 'correct' => ['이것은', '시계'], 'extra' => ['태양']],
                            'tr' => ['sentence' => 'bir saat', 'correct' => ['bir', 'saat'], 'extra' => ['büyük', 'güneş']],
                            'ru' => ['sentence' => 'Это часы', 'correct' => ['это', 'часы'], 'extra' => ['солнце']],
                        ],
                    ],
                    'b' => [
                        'words' => ['كبير', 'ساعة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big clock', 'correct' => ['a', 'big', 'clock'], 'extra' => ['sun']],
                            'az' => ['sentence' => 'bir böyük saat', 'correct' => ['bir', 'böyük', 'saat'], 'extra' => ['günəş']],
                            'fr' => ['sentence' => 'Une grande horloge', 'correct' => ['une', 'grande', 'horloge'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Un reloj grande', 'correct' => ['un', 'reloj', 'grande'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Eine große Uhr', 'correct' => ['eine', 'große', 'Uhr'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '大きい時計', 'correct' => ['大きい', '時計'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '큰 시계', 'correct' => ['큰', '시계'], 'extra' => ['태양']],
                            'tr' => ['sentence' => 'büyük bir saat', 'correct' => ['büyük', 'bir', 'saat'], 'extra' => ['güneş']],
                            'ru' => ['sentence' => 'большой часы', 'correct' => ['большой', 'часы'], 'extra' => ['солнце']],
                        ],
                    ],
                    'c' => [
                        'words' => ['اليوم', 'ساعة', 'و', 'أسبوع'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today a clock and a week', 'correct' => ['today', 'a', 'clock', 'and', 'a', 'week'], 'extra' => ['day']],
                            'az' => ['sentence' => 'bu gün bir saat və bir həftə', 'correct' => ['bu gün', 'bir', 'saat', 'və', 'bir', 'həftə'], 'extra' => ['gün']],
                            'fr' => ['sentence' => "Aujourd'hui une horloge et une semaine", 'correct' => ["aujourd'hui", 'une', 'horloge', 'et', 'une', 'semaine'], 'extra' => ['jour']],
                            'es' => ['sentence' => 'Hoy un reloj y una semana', 'correct' => ['hoy', 'un', 'reloj', 'y', 'una', 'semana'], 'extra' => ['día']],
                            'de' => ['sentence' => 'Heute eine Uhr und eine Woche', 'correct' => ['heute', 'eine', 'Uhr', 'und', 'eine', 'Woche'], 'extra' => ['Tag']],
                            'ja' => ['sentence' => '今日、時計と一週間', 'correct' => ['今日', '時計', 'と', '一', '週', '間'], 'extra' => ['日']],
                            'ko' => ['sentence' => '오늘 시계와 한 주', 'correct' => ['오늘', '시계와', '한', '주'], 'extra' => ['날']],
                            'tr' => ['sentence' => 'bugün bir saat ve bir hafta', 'correct' => ['bugün', 'bir', 'saat', 've', 'bir', 'hafta'], 'extra' => ['büyük', 'güneş']],
                            'ru' => ['sentence' => 'сегодня часы и неделя', 'correct' => ['сегодня', 'часы', 'и', 'неделя'], 'extra' => ['день']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: My Day', 4,
                pictures: [['ar' => 'الذهاب', 'img' => 'park'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'إلى المدرسة'], ['ar' => 'اليوم']],
                phrases: [
                    'a' => [
                        'words' => ['الذهاب', 'إلى المدرسة', 'اليوم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go to school today', 'correct' => ['to go', 'to school', 'today'], 'extra' => ['house']],
                            'az' => ['sentence' => 'getmək məktəbə bu gün', 'correct' => ['getmək', 'məktəbə', 'bu gün'], 'extra' => ['ev']],
                            'fr' => ['sentence' => "Aller à l'école aujourd'hui", 'correct' => ["aujourd'hui", 'aller', "à l'école"], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Ir a la escuela hoy', 'correct' => ['ir', 'a la escuela', 'hoy'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Heute zur Schule gehen', 'correct' => ['heute', 'zur Schule', 'gehen'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '今日学校へ行く', 'correct' => ['今日', '学校', 'へ', '行く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '오늘 학교에 가다', 'correct' => ['오늘', '학교에', '가다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bugün okula gitmek', 'correct' => ['bugün', 'okula', 'gitmek'], 'extra' => ['sabah', 'okul']],
                            'ru' => ['sentence' => 'идти в школу сегодня', 'correct' => ['идти', 'в', 'школу', 'сегодня'], 'extra' => ['дом']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أقرأ', 'في', 'صباح'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I read in the morning', 'correct' => ['i read', 'in the', 'morning'], 'extra' => ['evening']],
                            'az' => ['sentence' => 'oxuyuram səhər', 'correct' => ['oxuyuram', 'səhər'], 'extra' => ['axşam']],
                            'fr' => ['sentence' => 'Je lis le matin', 'correct' => ['je lis', 'le', 'matin'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'Leo por la mañana', 'correct' => ['leo por', 'la', 'mañana'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Ich lese am Morgen', 'correct' => ['Ich lese', 'am', 'Morgen'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '私は朝読む', 'correct' => ['私', 'は', '朝', '読む'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '나는 아침에 읽는다', 'correct' => ['나는', '아침에', '읽는다'], 'extra' => ['저녁']],
                            'tr' => ['sentence' => 'sabah ben okuyorum', 'correct' => ['sabah', 'ben', 'okuyorum'], 'extra' => ['bugün', 'okul']],
                            'ru' => ['sentence' => 'я читаю в утро', 'correct' => ['я', 'читаю', 'в', 'утро'], 'extra' => ['вечер']],
                        ],
                    ],
                    'c' => [
                        'words' => ['اليوم', 'أنا', 'أتمشى', 'في البيت'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Today I walk home', 'correct' => ['today', 'I', 'walk', 'home'], 'extra' => ['school']],
                            'az' => ['sentence' => 'bu gün mən gəzirəm evdəyəm', 'correct' => ['bu gün', 'mən', 'gəzirəm', 'evdəyəm'], 'extra' => ['məktəb']],
                            'fr' => ['sentence' => "Aujourd'hui je marche à la maison", 'correct' => ["aujourd'hui", 'je', 'je marche', 'à la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Hoy camino a casa', 'correct' => ['hoy', 'camino', 'a', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Heute gehe ich nach Hause', 'correct' => ['heute gehe', 'ich', 'nach', 'Hause'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '今日私は家へ歩く', 'correct' => ['今日', '私', 'は', '家', 'へ', '歩く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '오늘 나는 집에 걷는다', 'correct' => ['오늘', '나는', '집에', '걷는다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'bugün ben eve yürüyorum', 'correct' => ['bugün', 'ben', 'eve', 'yürüyorum'], 'extra' => ['sabah', 'okul']],
                            'ru' => ['sentence' => 'сегодня я гуляю дома', 'correct' => ['сегодня', 'я', 'гуляю', 'дома'], 'extra' => ['школа']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: This Week', 5,
                pictures: [['ar' => 'أسبوع', 'img' => 'calendar'], ['ar' => 'الذهاب', 'img' => 'park']],
                plain: [['ar' => 'يوم'], ['ar' => 'إلى']],
                phrases: [
                    'a' => [
                        'words' => ['أسبوع', 'و', 'يوم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A week and a day', 'correct' => ['a', 'week', 'and', 'a', 'day'], 'extra' => ['clock']],
                            'az' => ['sentence' => 'bir həftə və bir gün', 'correct' => ['bir', 'həftə', 'və', 'bir', 'gün'], 'extra' => ['saat']],
                            'fr' => ['sentence' => 'Une semaine et un jour', 'correct' => ['une', 'semaine', 'et', 'un', 'jour'], 'extra' => ['horloge']],
                            'es' => ['sentence' => 'Una semana y un día', 'correct' => ['una', 'semana', 'y', 'un', 'día'], 'extra' => ['reloj']],
                            'de' => ['sentence' => 'Eine Woche und ein Tag', 'correct' => ['eine', 'Woche', 'und', 'ein', 'Tag'], 'extra' => ['Uhr']],
                            'ja' => ['sentence' => '一週間と一日', 'correct' => ['一', '週', '間', 'と', '一', '日'], 'extra' => ['時計']],
                            'ko' => ['sentence' => '한 주와 하루', 'correct' => ['한', '주와', '하루'], 'extra' => ['시계']],
                            'tr' => ['sentence' => 'bir hafta ve bir gün', 'correct' => ['bir', 'hafta', 've', 'bir', 'gün'], 'extra' => ['yarın', 'saat']],
                            'ru' => ['sentence' => 'неделя и день', 'correct' => ['неделя', 'и', 'день'], 'extra' => ['часы']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الذهاب', 'إلى', 'الحديقة', 'غدا'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park tomorrow', 'correct' => ['to go', 'to the park', 'tomorrow'], 'extra' => ['week']],
                            'az' => ['sentence' => 'getmək parka sabah', 'correct' => ['getmək', 'parka', 'sabah'], 'extra' => ['həftə']],
                            'fr' => ['sentence' => 'Aller au parc demain', 'correct' => ['aller', 'au parc', 'demain'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Ir al parque mañana', 'correct' => ['ir', 'al parque', 'mañana'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Morgen zum Park gehen', 'correct' => ['morgen', 'zum Park', 'gehen'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '明日公園へ行く', 'correct' => ['明日', '公園', 'へ', '行く'], 'extra' => ['週']],
                            'ko' => ['sentence' => '내일 공원에 가다', 'correct' => ['내일', '공원에', '가다'], 'extra' => ['주']],
                            'tr' => ['sentence' => 'yarın parka gitmek', 'correct' => ['yarın', 'parka', 'gitmek'], 'extra' => ['gün', 'hafta']],
                            'ru' => ['sentence' => 'идти в парк завтра', 'correct' => ['идти', 'в', 'парк', 'завтра'], 'extra' => ['неделя']],
                        ],
                    ],
                    'c' => [
                        'words' => ['اليوم', 'و', 'غدا', 'أنا', 'أقرأ', 'كثير'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Today and tomorrow I read a lot', 'correct' => ['today and', 'tomorrow', 'I', 'read', 'a', 'lot'], 'extra' => ['day']],
                            'az' => ['sentence' => 'bu gün və sabah mən oxuyuram bir çoxlu', 'correct' => ['bu gün', 'və', 'sabah', 'mən', 'oxuyuram', 'bir', 'çoxlu'], 'extra' => ['gün']],
                            'fr' => ['sentence' => "Aujourd'hui et demain je lis beaucoup", 'correct' => ["aujourd'hui", 'et', 'demain', 'je', 'je lis', 'beaucoup'], 'extra' => ['jour']],
                            'es' => ['sentence' => 'Hoy y mañana leo mucho', 'correct' => ['hoy', 'y', 'mañana', 'leo', 'mucho'], 'extra' => ['día']],
                            'de' => ['sentence' => 'Heute und morgen lese ich viel', 'correct' => ['heute', 'und', 'morgen', 'lese', 'ich', 'viel'], 'extra' => ['Tag']],
                            'ja' => ['sentence' => '今日と明日私はたくさん読む', 'correct' => ['今日', 'と', '明日', '私', 'は', 'たくさん', '読む'], 'extra' => ['日']],
                            'ko' => ['sentence' => '오늘과 내일 나는 많이 읽는다', 'correct' => ['오늘과', '내일', '나는', '많이', '읽는다'], 'extra' => ['날']],
                            'tr' => ['sentence' => 'bugün ve yarın ben çok okuyorum', 'correct' => ['bugün', 've', 'yarın', 'ben', 'çok', 'okuyorum'], 'extra' => ['gün', 'hafta']],
                            'ru' => ['sentence' => 'сегодня и завтра я читаю много', 'correct' => ['сегодня', 'и', 'завтра', 'я', 'читаю', 'много'], 'extra' => ['день']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
