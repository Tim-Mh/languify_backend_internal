<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation03Seeder extends Seeder
{
    private const PICTURES = [
        '公園' => 'park',
        '友達' => 'friend',
        '店' => 'shop',
        '学校' => 'school',
        '家' => 'house',
        '本' => 'book',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 3, the Japanese twin of the
     * English "Unit 3: Making Plans" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'ユニット3: 計画を立てる', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 公園・友達', 1,
                pictures: [
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'ja' => '行きましょう',
                    ],
                    [
                        'ja' => '一緒に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '公園',
                            'へ',
                            '行きましょう',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'let\'s go to the park',
                                'correct' => [
                                    'let\'s go',
                                    'to',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'together',
                                ],
                            ],
                            'az' => ['sentence' => 'gedək park', 'correct' => ['gedək', 'park'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'هيا بنا إلى حديقة', 'correct' => ['هيا بنا', 'إلى', 'حديقة'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'пойдём в парк', 'correct' => ['пойдём', 'в', 'парк'], 'extra' => ['вместе']],
                            'es' => [
                                'sentence' => 'Vamos al parque',
                                'correct' => [
                                    'vamos',
                                    'a',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'juntos',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Lass uns zum Park gehen',
                                'correct' => [
                                    'lass uns gehen',
                                    'zu',
                                    'dem',
                                    'Park',
                                ],
                                'extra' => [
                                    'zusammen',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Allons au parc',
                                'correct' => [
                                    'allons-y',
                                    'à',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'ensemble',
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '공원에 갑시다',
                                'correct' => [
                                    '공원에',
                                    '갑시다',
                                ],
                                'extra' => [
                                    '함께',
                                ],
                            ],
                            'tr' => ['sentence' => 'parka gidelim', 'correct' => ['parka', 'gidelim'], 'extra' => ['birlikte']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '一緒に',
                            '私の',
                            '友達',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'together my friend',
                                'correct' => [
                                    'together',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'let\'s go',
                                ],
                            ],
                            'az' => ['sentence' => 'birlikdə mənim dost', 'correct' => ['birlikdə', 'mənim', 'dost'], 'extra' => ['gedək']],
                            'ar' => ['sentence' => 'معا صديق', 'correct' => ['معا', 'صديق'], 'extra' => ['هيا بنا']],
                            'ru' => ['sentence' => 'вместе мой друг', 'correct' => ['вместе', 'мой', 'друг'], 'extra' => ['пойдём']],
                            'es' => [
                                'sentence' => 'Juntos, mi amigo',
                                'correct' => [
                                    'juntos',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'vamos',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Zusammen, mein Freund',
                                'correct' => [
                                    'zusammen',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'lass uns gehen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ensemble, mon ami',
                                'correct' => [
                                    'ensemble',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'allons-y',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '함께, 나의 친구',
                                'correct' => [
                                    '함께',
                                    '나의',
                                    '친구',
                                ],
                                'extra' => [
                                    '갑시다',
                                ],
                            ],
                            'tr' => ['sentence' => 'birlikte arkadaşım', 'correct' => ['birlikte', 'arkadaşım'], 'extra' => ['gidelim']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '一緒に',
                            '行きましょう',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'let\'s go together',
                                'correct' => [
                                    'let\'s go',
                                    'together',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'gedək birlikdə', 'correct' => ['gedək', 'birlikdə'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'هيا بنا معا', 'correct' => ['هيا بنا', 'معا'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'пойдём вместе', 'correct' => ['пойдём', 'вместе'], 'extra' => ['друг']],
                            'es' => [
                                'sentence' => 'Vamos juntos',
                                'correct' => [
                                    'vamos',
                                    'juntos',
                                ],
                                'extra' => [
                                    'amigo',
                                    'parque',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Lass uns zusammen gehen',
                                'correct' => [
                                    'lass uns zusammen',
                                    'gehen',
                                ],
                                'extra' => [
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Allons-y ensemble',
                                'correct' => [
                                    'allons-y',
                                    'ensemble',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '함께 갑시다',
                                'correct' => [
                                    '함께',
                                    '갑시다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                            'tr' => ['sentence' => 'birlikte gidelim', 'correct' => ['birlikte', 'gidelim'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 店・家', 2,
                pictures: [
                    [
                        'ja' => '店',
                        'img' => 'shop',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'すぐに',
                    ],
                    [
                        'ja' => '今夜',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'すぐに',
                            '行きましょう',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'let\'s go soon',
                                'correct' => [
                                    'let\'s go',
                                    'soon',
                                ],
                                'extra' => [
                                    'tonight',
                                ],
                            ],
                            'az' => ['sentence' => 'gedək tezliklə', 'correct' => ['gedək', 'tezliklə'], 'extra' => ['bu axşam']],
                            'ar' => ['sentence' => 'هيا بنا قريبا', 'correct' => ['هيا بنا', 'قريبا'], 'extra' => ['الليلة']],
                            'ru' => ['sentence' => 'пойдём скоро', 'correct' => ['пойдём', 'скоро'], 'extra' => ['сегодня вечером']],
                            'es' => [
                                'sentence' => 'Vamos pronto',
                                'correct' => [
                                    'vamos',
                                    'pronto',
                                ],
                                'extra' => [
                                    'esta noche',
                                    'tienda',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Lass uns bald gehen',
                                'correct' => [
                                    'lass uns bald',
                                    'gehen',
                                ],
                                'extra' => [
                                    'heute Abend',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Allons-y bientôt',
                                'correct' => [
                                    'allons-y',
                                    'bientôt',
                                ],
                                'extra' => [
                                    'ce soir',
                                    'magasin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '곧 갑시다',
                                'correct' => [
                                    '곧',
                                    '갑시다',
                                ],
                                'extra' => [
                                    '오늘 밤',
                                ],
                            ],
                            'tr' => ['sentence' => 'yakında gidelim', 'correct' => ['yakında', 'gidelim'], 'extra' => ['bu akşam']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '今夜',
                            'の',
                            '店',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the shop tonight',
                                'correct' => [
                                    'the',
                                    'shop',
                                    'tonight',
                                ],
                                'extra' => [
                                    'soon',
                                ],
                            ],
                            'az' => ['sentence' => 'mağaza bu axşam', 'correct' => ['mağaza', 'bu axşam'], 'extra' => ['tezliklə']],
                            'ar' => ['sentence' => 'متجر الليلة', 'correct' => ['متجر', 'الليلة'], 'extra' => ['قريبا']],
                            'ru' => ['sentence' => 'магазин сегодня вечером', 'correct' => ['магазин', 'сегодня вечером'], 'extra' => ['скоро']],
                            'es' => [
                                'sentence' => 'La tienda esta noche',
                                'correct' => [
                                    'la',
                                    'tienda',
                                    'esta noche',
                                ],
                                'extra' => [
                                    'pronto',
                                    'casa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Geschäft heute Abend',
                                'correct' => [
                                    'das',
                                    'Geschäft',
                                    'heute Abend',
                                ],
                                'extra' => [
                                    'bald',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le magasin ce soir',
                                'correct' => [
                                    'le',
                                    'magasin',
                                    'ce soir',
                                ],
                                'extra' => [
                                    'bientôt',
                                    'maison',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘 밤 가게',
                                'correct' => [
                                    '오늘',
                                    '밤',
                                    '가게',
                                ],
                                'extra' => [
                                    '곧',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu akşam dükkan', 'correct' => ['bu', 'akşam', 'dükkan'], 'extra' => ['yakında']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '今夜',
                            '家',
                            'へ',
                            '行きましょう',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'let\'s go to the house tonight',
                                'correct' => [
                                    'let\'s go',
                                    'to',
                                    'the',
                                    'house',
                                    'tonight',
                                ],
                                'extra' => [
                                    'soon',
                                ],
                            ],
                            'az' => ['sentence' => 'gedək ev bu axşam', 'correct' => ['gedək', 'ev', 'bu axşam'], 'extra' => ['tezliklə']],
                            'ar' => ['sentence' => 'هيا بنا إلى بيت الليلة', 'correct' => ['هيا بنا', 'إلى', 'بيت', 'الليلة'], 'extra' => ['قريبا']],
                            'ru' => ['sentence' => 'пойдём в дом сегодня вечером', 'correct' => ['пойдём', 'в', 'дом', 'сегодня вечером'], 'extra' => ['скоро']],
                            'es' => [
                                'sentence' => 'Vamos a la casa esta noche',
                                'correct' => [
                                    'vamos',
                                    'a',
                                    'la',
                                    'casa',
                                    'esta noche',
                                ],
                                'extra' => [
                                    'pronto',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Lass uns heute Abend zum Haus gehen',
                                'correct' => [
                                    'lass uns gehen',
                                    'zu',
                                    'dem',
                                    'Haus',
                                    'heute Abend',
                                ],
                                'extra' => [
                                    'bald',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Allons à la maison ce soir',
                                'correct' => [
                                    'allons-y',
                                    'à',
                                    'la',
                                    'maison',
                                    'ce soir',
                                ],
                                'extra' => [
                                    'bientôt',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘 밤 집에 갑시다',
                                'correct' => [
                                    '오늘',
                                    '밤',
                                    '집에',
                                    '갑시다',
                                ],
                                'extra' => [
                                    '곧',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu akşam eve gidelim', 'correct' => ['bu', 'akşam', 'eve', 'gidelim'], 'extra' => ['yakında']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 学校・公園', 3,
                pictures: [
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'いいよ',
                    ],
                    [
                        'ja' => 'それから',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'いいよ',
                            '学校',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'okay the school',
                                'correct' => [
                                    'okay',
                                    'the',
                                    'school',
                                ],
                                'extra' => [
                                    'then',
                                ],
                            ],
                            'az' => ['sentence' => 'yaxşı məktəb', 'correct' => ['yaxşı', 'məktəb'], 'extra' => ['sonra']],
                            'ar' => ['sentence' => 'حسنا مدرسة', 'correct' => ['حسنا', 'مدرسة'], 'extra' => ['ثم']],
                            'ru' => ['sentence' => 'хорошо школа', 'correct' => ['хорошо', 'школа'], 'extra' => ['потом']],
                            'es' => [
                                'sentence' => 'Vale, la escuela',
                                'correct' => [
                                    'vale',
                                    'la',
                                    'escuela',
                                ],
                                'extra' => [
                                    'entonces',
                                    'parque',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Okay, die Schule',
                                'correct' => [
                                    'okay',
                                    'die',
                                    'Schule',
                                ],
                                'extra' => [
                                    'dann',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'D\'accord, l\'école',
                                'correct' => [
                                    'd\'accord',
                                    'école',
                                ],
                                'extra' => [
                                    'ensuite',
                                    'parc',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '좋아요, 학교',
                                'correct' => [
                                    '좋아요',
                                    '학교',
                                ],
                                'extra' => [
                                    '그러면',
                                ],
                            ],
                            'tr' => ['sentence' => 'tamam okul', 'correct' => ['tamam', 'okul'], 'extra' => ['sonra']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'それから',
                            '公園',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'then the park',
                                'correct' => [
                                    'then',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'okay',
                                ],
                            ],
                            'az' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => ['yaxşı']],
                            'ar' => ['sentence' => 'ثم حديقة', 'correct' => ['ثم', 'حديقة'], 'extra' => ['حسنا']],
                            'ru' => ['sentence' => 'потом парк', 'correct' => ['потом', 'парк'], 'extra' => ['хорошо']],
                            'es' => [
                                'sentence' => 'Entonces el parque',
                                'correct' => [
                                    'entonces',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'vale',
                                    'escuela',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Dann der Park',
                                'correct' => [
                                    'dann',
                                    'der',
                                    'Park',
                                ],
                                'extra' => [
                                    'okay',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ensuite le parc',
                                'correct' => [
                                    'ensuite',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'd\'accord',
                                    'école',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그러면 공원',
                                'correct' => [
                                    '그러면',
                                    '공원',
                                ],
                                'extra' => [
                                    '좋아요',
                                ],
                            ],
                            'tr' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => ['tamam']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'いいよ',
                            'それから',
                            '行きましょう',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'okay then let\'s go',
                                'correct' => [
                                    'okay',
                                    'then',
                                    'let\'s go',
                                ],
                                'extra' => [
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'yaxşı sonra gedək', 'correct' => ['yaxşı', 'sonra', 'gedək'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'حسنا ثم هيا بنا', 'correct' => ['حسنا', 'ثم', 'هيا بنا'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'хорошо потом пойдём', 'correct' => ['хорошо', 'потом', 'пойдём'], 'extra' => ['школа']],
                            'es' => [
                                'sentence' => 'Vale, entonces vamos',
                                'correct' => [
                                    'vale',
                                    'entonces',
                                    'vamos',
                                ],
                                'extra' => [
                                    'escuela',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Okay, dann lass uns gehen',
                                'correct' => [
                                    'okay',
                                    'dann',
                                    'lass uns gehen',
                                ],
                                'extra' => [
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'D\'accord, alors allons-y',
                                'correct' => [
                                    'd\'accord',
                                    'ensuite',
                                    'allons-y',
                                ],
                                'extra' => [
                                    'école',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '좋아요, 그러면 갑시다',
                                'correct' => [
                                    '좋아요',
                                    '그러면',
                                    '갑시다',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                            'tr' => ['sentence' => 'tamam o zaman gidelim', 'correct' => ['tamam', 'o', 'zaman', 'gidelim'], 'extra' => ['okul']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 友達・家', 4,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => '後で',
                    ],
                    [
                        'ja' => '本当に',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '後で',
                            '私の',
                            '友達',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'later my friend',
                                'correct' => [
                                    'later',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'really',
                                ],
                            ],
                            'az' => ['sentence' => 'sonradan mənim dost', 'correct' => ['sonradan', 'mənim', 'dost'], 'extra' => ['həqiqətən']],
                            'ar' => ['sentence' => 'لاحقا صديق', 'correct' => ['لاحقا', 'صديق'], 'extra' => ['حقا']],
                            'ru' => ['sentence' => 'позже мой друг', 'correct' => ['позже', 'мой', 'друг'], 'extra' => ['действительно']],
                            'es' => [
                                'sentence' => 'Más tarde, mi amigo',
                                'correct' => [
                                    'más tarde',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'de verdad',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Später, mein Freund',
                                'correct' => [
                                    'später',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'wirklich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Plus tard, mon ami',
                                'correct' => [
                                    'plus tard',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'vraiment',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나중에, 나의 친구',
                                'correct' => [
                                    '나중에',
                                    '나의',
                                    '친구',
                                ],
                                'extra' => [
                                    '정말',
                                ],
                            ],
                            'tr' => ['sentence' => 'sonra arkadaşım', 'correct' => ['sonra', 'arkadaşım'], 'extra' => ['gerçekten']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '本当に',
                            '家',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'really the house',
                                'correct' => [
                                    'really',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'later',
                                ],
                            ],
                            'az' => ['sentence' => 'həqiqətən ev', 'correct' => ['həqiqətən', 'ev'], 'extra' => ['sonradan']],
                            'ar' => ['sentence' => 'حقا بيت', 'correct' => ['حقا', 'بيت'], 'extra' => ['لاحقا']],
                            'ru' => ['sentence' => 'действительно дом', 'correct' => ['действительно', 'дом'], 'extra' => ['позже']],
                            'es' => [
                                'sentence' => 'De verdad, la casa',
                                'correct' => [
                                    'de verdad',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'más tarde',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wirklich, das Haus',
                                'correct' => [
                                    'wirklich',
                                    'das',
                                    'Haus',
                                ],
                                'extra' => [
                                    'später',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Vraiment, la maison',
                                'correct' => [
                                    'vraiment',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'plus tard',
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '정말, 그 집',
                                'correct' => [
                                    '정말',
                                    '그',
                                    '집',
                                ],
                                'extra' => [
                                    '나중에',
                                ],
                            ],
                            'tr' => ['sentence' => 'gerçekten ev', 'correct' => ['gerçekten', 'ev'], 'extra' => ['sonra']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '本当に',
                            '後で',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'really later',
                                'correct' => [
                                    'really',
                                    'later',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'həqiqətən sonradan', 'correct' => ['həqiqətən', 'sonradan'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'حقا لاحقا', 'correct' => ['حقا', 'لاحقا'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'действительно позже', 'correct' => ['действительно', 'позже'], 'extra' => ['дом']],
                            'es' => [
                                'sentence' => 'De verdad, más tarde',
                                'correct' => [
                                    'de verdad',
                                    'más tarde',
                                ],
                                'extra' => [
                                    'casa',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wirklich später',
                                'correct' => [
                                    'wirklich',
                                    'später',
                                ],
                                'extra' => [
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Vraiment plus tard',
                                'correct' => [
                                    'vraiment',
                                    'plus tard',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '정말 나중에',
                                'correct' => [
                                    '정말',
                                    '나중에',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                            'tr' => ['sentence' => 'gerçekten sonra', 'correct' => ['gerçekten', 'sonra'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 家・友達', 5,
                pictures: [
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'ja' => '見る',
                    ],
                    [
                        'ja' => '映画',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '映画',
                            'を',
                            '見る',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'watch a film',
                                'correct' => [
                                    'watch',
                                    'a',
                                    'film',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'izlə bir film', 'correct' => ['izlə', 'bir', 'film'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'شاهد فيلم', 'correct' => ['شاهد', 'فيلم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'смотри фильм', 'correct' => ['смотри', 'фильм'], 'extra' => ['друг']],
                            'es' => [
                                'sentence' => 'Ver una película',
                                'correct' => [
                                    'mirar',
                                    'una',
                                    'película',
                                ],
                                'extra' => [
                                    'amigo',
                                    'casa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Film schauen',
                                'correct' => [
                                    'einen',
                                    'Film',
                                    'schauen',
                                ],
                                'extra' => [
                                    'Freund',
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Regarder un film',
                                'correct' => [
                                    'regarder',
                                    'un',
                                    'film',
                                ],
                                'extra' => [
                                    'ami',
                                    'maison',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '영화를 보다',
                                'correct' => [
                                    '영화를',
                                    '보다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                            'tr' => ['sentence' => 'film izle', 'correct' => ['film', 'izle'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '家',
                            'で',
                            '映画',
                            'を',
                            '見る',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'watch a film in the house',
                                'correct' => [
                                    'watch',
                                    'a',
                                    'film',
                                    'in',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'izlə bir film içində ev', 'correct' => ['izlə', 'bir', 'film', 'içində', 'ev'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'شاهد فيلم في بيت', 'correct' => ['شاهد', 'فيلم', 'في', 'بيت'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'смотри фильм в дом', 'correct' => ['смотри', 'фильм', 'в', 'дом'], 'extra' => ['друг']],
                            'es' => [
                                'sentence' => 'Ver una película en la casa',
                                'correct' => [
                                    'mirar',
                                    'una',
                                    'película',
                                    'en',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Film im Haus schauen',
                                'correct' => [
                                    'schauen',
                                    'einen',
                                    'Film',
                                    'in',
                                    'dem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Regarder un film dans la maison',
                                'correct' => [
                                    'regarder',
                                    'un',
                                    'film',
                                    'dans',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집에서 영화를 보다',
                                'correct' => [
                                    '집에서',
                                    '영화를',
                                    '보다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                            'tr' => ['sentence' => 'evde film izle', 'correct' => ['evde', 'film', 'izle'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私の',
                            '友達',
                            'と',
                            '映画',
                            'を',
                            '見る',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'watch a film with my friend',
                                'correct' => [
                                    'watch',
                                    'a',
                                    'film',
                                    'with',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'izlə bir film ilə mənim dost', 'correct' => ['izlə', 'bir', 'film', 'ilə', 'mənim', 'dost'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'شاهد فيلم مع صديق', 'correct' => ['شاهد', 'فيلم', 'مع', 'صديق'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'смотри фильм с мой друг', 'correct' => ['смотри', 'фильм', 'с', 'мой', 'друг'], 'extra' => ['дом']],
                            'es' => [
                                'sentence' => 'Ver una película con mi amigo',
                                'correct' => [
                                    'mirar',
                                    'una',
                                    'película',
                                    'con',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'casa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Einen Film mit meinem Freund schauen',
                                'correct' => [
                                    'schauen',
                                    'einen',
                                    'Film',
                                    'mit',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'Haus',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Regarder un film avec mon ami',
                                'correct' => [
                                    'regarder',
                                    'un',
                                    'film',
                                    'avec',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'maison',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구와 영화를 보다',
                                'correct' => [
                                    '나의',
                                    '친구와',
                                    '영화를',
                                    '보다',
                                ],
                                'extra' => [
                                    '집',
                                ],
                            ],
                            'tr' => ['sentence' => 'arkadaşımla film izle', 'correct' => ['arkadaşımla', 'film', 'izle'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
