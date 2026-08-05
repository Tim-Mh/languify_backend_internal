<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation03Seeder extends Seeder
{
    private const PICTURES = [
        'parque' => 'park',
        'amigo' => 'friend',
        'tienda' => 'shop',
        'escuela' => 'school',
        'casa' => 'house',
        'libro' => 'book',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 3, the Spanish twin of the
     * English "Unit 3: Making Plans" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unidad 3: Hacer planes', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Parque y Amigo', 1,
                pictures: [
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'es' => 'vamos',
                    ],
                    [
                        'es' => 'juntos',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vamos',
                            'al',
                            'parque',
                        ],
                        'blank' => 0,
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Juntos',
                            'mi',
                            'amigo',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Vamos',
                            'juntos',
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
                                    'park',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Lass uns zusammen gehen',
                                'correct' => [
                                    'lass uns gehen',
                                    'zusammen',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Tienda y Casa', 2,
                pictures: [
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'pronto',
                    ],
                    [
                        'es' => 'esta noche',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vamos',
                            'pronto',
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
                                    'shop',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Lass uns bald gehen',
                                'correct' => [
                                    'lass uns gehen',
                                    'bald',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'La',
                            'tienda',
                            'esta',
                            'noche',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Vamos',
                            'a',
                            'la',
                            'casa',
                            'esta',
                            'noche',
                        ],
                        'blank' => 0,
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Escuela y Parque', 3,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'es' => 'vale',
                    ],
                    [
                        'es' => 'entonces',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vale',
                            'la',
                            'escuela',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Entonces',
                            'el',
                            'parque',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Vale',
                            'entonces',
                            'vamos',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Amigo y Casa', 4,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'más tarde',
                    ],
                    [
                        'es' => 'de verdad',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Más',
                            'tarde',
                            'mi',
                            'amigo',
                        ],
                        'blank' => 1,
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'De',
                            'verdad',
                            'la',
                            'casa',
                        ],
                        'blank' => 1,
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'De',
                            'verdad',
                            'más',
                            'tarde',
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
                                    'friend',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Casa y Amigo', 5,
                pictures: [
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'es' => 'mirar',
                    ],
                    [
                        'es' => 'película',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ver',
                            'una',
                            'película',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ver',
                            'una',
                            'película',
                            'en',
                            'la',
                            'casa',
                        ],
                        'blank' => 3,
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ver',
                            'una',
                            'película',
                            'con',
                            'mi',
                            'amigo',
                        ],
                        'blank' => 4,
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
                        ],
                    ],
                ],
            ),
        ];
    }
}
