<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation03Seeder extends Seeder
{
    private const PICTURES = [
        'Park' => 'park',
        'Freund' => 'friend',
        'Geschäft' => 'shop',
        'Schule' => 'school',
        'Haus' => 'house',
        'Buch' => 'book',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 3, the German twin of the
     * English "Unit 3: Making Plans" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Einheit 3: Pläne machen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Park & Freund', 1,
                pictures: [
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'de' => 'lass uns gehen',
                    ],
                    [
                        'de' => 'zusammen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Lass',
                            'uns',
                            'zum',
                            'Park',
                            'gehen',
                        ],
                        'blank' => 4,
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
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'gedək park', 'correct' => ['gedək', 'park'], 'extra' => ['birlikdə', 'dost']],
                            'ar' => ['sentence' => 'هيا بنا إلى حديقة', 'correct' => ['هيا بنا', 'إلى', 'حديقة'], 'extra' => ['معا', 'صديق']],
                            'ru' => ['sentence' => 'пойдём в парк', 'correct' => ['пойдём', 'в', 'парк'], 'extra' => ['вместе', 'друг']],
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
                            'ja' => [
                                'sentence' => '公園へ行きましょう',
                                'correct' => [
                                    '公園',
                                    'へ',
                                    '行きましょう',
                                ],
                                'extra' => [
                                    '一緒に',
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
                            'tr' => ['sentence' => 'parka gidelim', 'correct' => ['parka', 'gidelim'], 'extra' => ['birlikte', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Zusammen',
                            'mein',
                            'Freund',
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
                            'ja' => [
                                'sentence' => '一緒に、私の友達',
                                'correct' => [
                                    '一緒に',
                                    '私の',
                                    '友達',
                                ],
                                'extra' => [
                                    '行きましょう',
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
                            'Lass',
                            'uns',
                            'zusammen',
                            'gehen',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => '一緒に行きましょう',
                                'correct' => [
                                    '一緒に',
                                    '行きましょう',
                                ],
                                'extra' => [
                                    '友達',
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
            $builder->lesson('Lektion 2: Geschäft & Haus', 2,
                pictures: [
                    [
                        'de' => 'Geschäft',
                        'img' => 'shop',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bald',
                    ],
                    [
                        'de' => 'heute Abend',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Lass',
                            'uns',
                            'bald',
                            'gehen',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'let\'s go soon',
                                'correct' => [
                                    'let\'s go',
                                    'soon',
                                ],
                                'extra' => [
                                    'tonight',
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'gedək tezliklə', 'correct' => ['gedək', 'tezliklə'], 'extra' => ['bu axşam', 'mağaza']],
                            'ar' => ['sentence' => 'هيا بنا قريبا', 'correct' => ['هيا بنا', 'قريبا'], 'extra' => ['الليلة', 'متجر']],
                            'ru' => ['sentence' => 'пойдём скоро', 'correct' => ['пойдём', 'скоро'], 'extra' => ['сегодня вечером', 'магазин']],
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
                            'ja' => [
                                'sentence' => 'すぐに行きましょう',
                                'correct' => [
                                    'すぐに',
                                    '行きましょう',
                                ],
                                'extra' => [
                                    '今夜',
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
                            'tr' => ['sentence' => 'yakında gidelim', 'correct' => ['yakında', 'gidelim'], 'extra' => ['bu akşam', 'dükkan']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Das',
                            'Geschäft',
                            'heute',
                            'Abend',
                        ],
                        'blank' => 1,
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
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'mağaza bu axşam', 'correct' => ['mağaza', 'bu axşam'], 'extra' => ['tezliklə', 'ev']],
                            'ar' => ['sentence' => 'متجر الليلة', 'correct' => ['متجر', 'الليلة'], 'extra' => ['قريبا', 'بيت']],
                            'ru' => ['sentence' => 'магазин сегодня вечером', 'correct' => ['магазин', 'сегодня вечером'], 'extra' => ['скоро', 'дом']],
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
                            'ja' => [
                                'sentence' => '今夜の店',
                                'correct' => [
                                    '今夜',
                                    'の',
                                    '店',
                                ],
                                'extra' => [
                                    'すぐに',
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
                            'tr' => ['sentence' => 'bu akşam dükkan', 'correct' => ['bu', 'akşam', 'dükkan'], 'extra' => ['yakında', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Lass',
                            'uns',
                            'heute',
                            'Abend',
                            'zum',
                            'Haus',
                            'gehen',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => '今夜家へ行きましょう',
                                'correct' => [
                                    '今夜',
                                    '家',
                                    'へ',
                                    '行きましょう',
                                ],
                                'extra' => [
                                    'すぐに',
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
            $builder->lesson('Lektion 3: Schule & Park', 3,
                pictures: [
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'de' => 'okay',
                    ],
                    [
                        'de' => 'dann',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Okay',
                            'die',
                            'Schule',
                        ],
                        'blank' => 0,
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
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'yaxşı məktəb', 'correct' => ['yaxşı', 'məktəb'], 'extra' => ['sonra', 'park']],
                            'ar' => ['sentence' => 'حسنا مدرسة', 'correct' => ['حسنا', 'مدرسة'], 'extra' => ['ثم', 'حديقة']],
                            'ru' => ['sentence' => 'хорошо школа', 'correct' => ['хорошо', 'школа'], 'extra' => ['потом', 'парк']],
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
                            'ja' => [
                                'sentence' => 'いいよ、学校',
                                'correct' => [
                                    'いいよ',
                                    '学校',
                                ],
                                'extra' => [
                                    'それから',
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
                            'tr' => ['sentence' => 'tamam okul', 'correct' => ['tamam', 'okul'], 'extra' => ['sonra', 'park']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Dann',
                            'der',
                            'Park',
                        ],
                        'blank' => 0,
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
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => ['yaxşı', 'məktəb']],
                            'ar' => ['sentence' => 'ثم حديقة', 'correct' => ['ثم', 'حديقة'], 'extra' => ['حسنا', 'مدرسة']],
                            'ru' => ['sentence' => 'потом парк', 'correct' => ['потом', 'парк'], 'extra' => ['хорошо', 'школа']],
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
                            'ja' => [
                                'sentence' => 'それから公園',
                                'correct' => [
                                    'それから',
                                    '公園',
                                ],
                                'extra' => [
                                    'いいよ',
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
                            'tr' => ['sentence' => 'sonra park', 'correct' => ['sonra', 'park'], 'extra' => ['tamam', 'okul']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Okay',
                            'dann',
                            'lass',
                            'uns',
                            'gehen',
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
                            'ja' => [
                                'sentence' => 'いいよ、それから行きましょう',
                                'correct' => [
                                    'いいよ',
                                    'それから',
                                    '行きましょう',
                                ],
                                'extra' => [
                                    '学校',
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
            $builder->lesson('Lektion 4: Freund & Haus', 4,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'später',
                    ],
                    [
                        'de' => 'wirklich',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Später',
                            'mein',
                            'Freund',
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
                            'ja' => [
                                'sentence' => '後で、私の友達',
                                'correct' => [
                                    '後で',
                                    '私の',
                                    '友達',
                                ],
                                'extra' => [
                                    '本当に',
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
                            'Wirklich',
                            'das',
                            'Haus',
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
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'həqiqətən ev', 'correct' => ['həqiqətən', 'ev'], 'extra' => ['sonradan', 'dost']],
                            'ar' => ['sentence' => 'حقا بيت', 'correct' => ['حقا', 'بيت'], 'extra' => ['لاحقا', 'صديق']],
                            'ru' => ['sentence' => 'действительно дом', 'correct' => ['действительно', 'дом'], 'extra' => ['позже', 'друг']],
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
                            'ja' => [
                                'sentence' => '本当に、家',
                                'correct' => [
                                    '本当に',
                                    '家',
                                ],
                                'extra' => [
                                    '後で',
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
                            'tr' => ['sentence' => 'gerçekten ev', 'correct' => ['gerçekten', 'ev'], 'extra' => ['sonra', 'arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Wirklich',
                            'später',
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
                            'ja' => [
                                'sentence' => '本当に後で',
                                'correct' => [
                                    '本当に',
                                    '後で',
                                ],
                                'extra' => [
                                    '家',
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
            $builder->lesson('Lektion 5: Haus & Freund', 5,
                pictures: [
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'de' => 'schauen',
                    ],
                    [
                        'de' => 'Film',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Einen',
                            'Film',
                            'schauen',
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
                                    'house',
                                ],
                            ],
                            'az' => ['sentence' => 'izlə bir film', 'correct' => ['izlə', 'bir', 'film'], 'extra' => ['dost', 'ev']],
                            'ar' => ['sentence' => 'شاهد فيلم', 'correct' => ['شاهد', 'فيلم'], 'extra' => ['صديق', 'بيت']],
                            'ru' => ['sentence' => 'смотри фильм', 'correct' => ['смотри', 'фильм'], 'extra' => ['друг', 'дом']],
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
                            'ja' => [
                                'sentence' => '映画を見る',
                                'correct' => [
                                    '映画',
                                    'を',
                                    '見る',
                                ],
                                'extra' => [
                                    '友達',
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
                            'tr' => ['sentence' => 'film izle', 'correct' => ['film', 'izle'], 'extra' => ['arkadaş', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Einen',
                            'Film',
                            'im',
                            'Haus',
                            'schauen',
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
                            'ja' => [
                                'sentence' => '家で映画を見る',
                                'correct' => [
                                    '家',
                                    'で',
                                    '映画',
                                    'を',
                                    '見る',
                                ],
                                'extra' => [
                                    '友達',
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
                            'Einen',
                            'Film',
                            'mit',
                            'meinem',
                            'Freund',
                            'schauen',
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
                            'ja' => [
                                'sentence' => '私の友達と映画を見る',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'と',
                                    '映画',
                                    'を',
                                    '見る',
                                ],
                                'extra' => [
                                    '家',
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
