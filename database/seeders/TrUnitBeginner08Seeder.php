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
                            'en' => ['sentence' => 'The sun in the morning', 'correct' => ['morning', 'sun'], 'extra' => ['night']],
                            'fr' => ['sentence' => 'Le soleil le matin', 'correct' => ['matin', 'soleil'], 'extra' => ['nuit']],
                            'es' => ['sentence' => 'El sol por la mañana', 'correct' => ['mañana', 'sol'], 'extra' => ['noche']],
                            'de' => ['sentence' => 'Die Sonne am Morgen', 'correct' => ['Morgen', 'Sonne'], 'extra' => ['Nacht']],
                            'ja' => ['sentence' => '朝の太陽', 'correct' => ['朝', 'の', '太陽'], 'extra' => ['夜']],
                            'ko' => ['sentence' => '아침 태양', 'correct' => ['아침', '태양'], 'extra' => ['밤']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sabah', 'güneş', 've', 'gece', 'saat'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The sun in the morning and the clock at night', 'correct' => ['morning', 'sun', 'and', 'night', 'clock'], 'extra' => ['evening']],
                            'fr' => ['sentence' => 'Le soleil le matin et une horloge la nuit', 'correct' => ['matin', 'soleil', 'et', 'nuit', 'horloge'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'El sol por la mañana y el reloj por la noche', 'correct' => ['mañana', 'sol', 'y', 'noche', 'reloj'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Die Sonne am Morgen und die Uhr in der Nacht', 'correct' => ['Morgen', 'Sonne', 'und', 'Nacht', 'Uhr'], 'extra' => ['Abend']],
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
                            'en' => ['sentence' => 'Today is a day', 'correct' => ['today', 'a', 'day'], 'extra' => ['week']],
                            'fr' => ['sentence' => "Aujourd'hui est un jour", 'correct' => ["aujourd'hui", 'un', 'jour'], 'extra' => ['semaine']],
                            'es' => ['sentence' => 'Hoy es un día', 'correct' => ['hoy', 'un', 'día'], 'extra' => ['semana']],
                            'de' => ['sentence' => 'Heute ist ein Tag', 'correct' => ['heute', 'ein', 'Tag'], 'extra' => ['Woche']],
                            'ja' => ['sentence' => '今日は一日です', 'correct' => ['今日', 'は', '一', '日', 'です'], 'extra' => ['週']],
                            'ko' => ['sentence' => '오늘은 하루입니다', 'correct' => ['오늘은', '하루입니다'], 'extra' => ['주']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 've', 'yarın', 'bir', 'hafta'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Today and tomorrow a week', 'correct' => ['today', 'and', 'tomorrow', 'a', 'week'], 'extra' => ['clock']],
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
                            'fr' => ['sentence' => 'Une grande horloge', 'correct' => ['une', 'horloge', 'grand'], 'extra' => ['soleil']],
                            'es' => ['sentence' => 'Un reloj grande', 'correct' => ['un', 'reloj', 'grande'], 'extra' => ['sol']],
                            'de' => ['sentence' => 'Eine große Uhr', 'correct' => ['eine', 'groß', 'Uhr'], 'extra' => ['Sonne']],
                            'ja' => ['sentence' => '大きい時計', 'correct' => ['大きい', '時計'], 'extra' => ['太陽']],
                            'ko' => ['sentence' => '큰 시계', 'correct' => ['큰', '시계'], 'extra' => ['태양']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'bir', 'saat', 've', 'bir', 'hafta'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Today a clock and a week', 'correct' => ['today', 'a', 'clock', 'and', 'a', 'week'], 'extra' => ['day']],
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
                            'en' => ['sentence' => 'I read in the morning', 'correct' => ['morning', 'I', 'I read'], 'extra' => ['evening']],
                            'fr' => ['sentence' => 'Je lis le matin', 'correct' => ['matin', 'je', 'je lis'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'Leo por la mañana', 'correct' => ['mañana', 'yo', 'leo'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Ich lese am Morgen', 'correct' => ['Morgen', 'ich', 'ich lese'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '私は朝読む', 'correct' => ['私', 'は', '朝', '読む'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '나는 아침에 읽는다', 'correct' => ['나는', '아침에', '읽는다'], 'extra' => ['저녁']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'ben', 'eve', 'yürüyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Today I walk home', 'correct' => ['today', 'I', 'I walk', 'to the house'], 'extra' => ['school']],
                            'fr' => ['sentence' => "Aujourd'hui je marche à la maison", 'correct' => ["aujourd'hui", 'je', 'je marche', 'à la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Hoy camino a casa', 'correct' => ['hoy', 'yo', 'camino', 'a casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Heute gehe ich nach Hause', 'correct' => ['heute', 'ich', 'ich gehe', 'nach Hause'], 'extra' => ['Schule']],
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
                            'en' => ['sentence' => 'Today and tomorrow I read a lot', 'correct' => ['today', 'and', 'tomorrow', 'I', 'I read', 'a lot'], 'extra' => ['day']],
                            'fr' => ['sentence' => "Aujourd'hui et demain je lis beaucoup", 'correct' => ["aujourd'hui", 'et', 'demain', 'je', 'je lis', 'beaucoup'], 'extra' => ['jour']],
                            'es' => ['sentence' => 'Hoy y mañana leo mucho', 'correct' => ['hoy', 'y', 'mañana', 'yo', 'leo', 'mucho'], 'extra' => ['día']],
                            'de' => ['sentence' => 'Heute und morgen lese ich viel', 'correct' => ['heute', 'und', 'morgen', 'ich', 'ich lese', 'viel'], 'extra' => ['Tag']],
                            'ja' => ['sentence' => '今日と明日私はたくさん読む', 'correct' => ['今日', 'と', '明日', '私', 'は', 'たくさん', '読む'], 'extra' => ['日']],
                            'ko' => ['sentence' => '오늘과 내일 나는 많이 읽는다', 'correct' => ['오늘과', '내일', '나는', '많이', '읽는다'], 'extra' => ['날']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
