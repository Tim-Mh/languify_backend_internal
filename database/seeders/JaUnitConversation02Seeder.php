<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation02Seeder extends Seeder
{
    private const PICTURES = [
        '友達' => 'friend',
        '母' => 'mother',
        '店' => 'shop',
        '公園' => 'park',
        '本' => 'book',
        'りんご' => 'apple',
        '学校' => 'school',
        '家' => 'house',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 2, the Japanese twin of the
     * English "Unit 2: Asking Questions" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'ユニット2: 質問する', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 友達・母', 1,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '母',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'お元気ですか',
                    ],
                    [
                        'ja' => '元気',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'お元気ですか',
                            '友達',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how are you friend',
                                'correct' => [
                                    'how are you',
                                    'friend',
                                ],
                                'extra' => [
                                    'mother',
                                ],
                            ],
                            'az' => ['sentence' => 'necəsən dost', 'correct' => ['necəsən', 'dost'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'كيف حالك صديق', 'correct' => ['كيف حالك', 'صديق'], 'extra' => ['أم']],
                            'ru' => ['sentence' => 'как дела друг', 'correct' => ['как дела', 'друг'], 'extra' => ['мама']],
                            'es' => [
                                'sentence' => 'Cómo estás, amigo',
                                'correct' => [
                                    'cómo estás',
                                    'amigo',
                                ],
                                'extra' => [
                                    'madre',
                                    'bien',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wie geht es dir, Freund',
                                'correct' => [
                                    'wie geht es dir',
                                    'Freund',
                                ],
                                'extra' => [
                                    'Mutter',
                                    'gut',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Comment ça va, mon ami',
                                'correct' => [
                                    'comment ça va',
                                    'ami',
                                ],
                                'extra' => [
                                    'mère',
                                    'bien',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어떻게 지내세요, 친구',
                                'correct' => [
                                    '어떻게',
                                    '지내세요',
                                    '친구',
                                ],
                                'extra' => [
                                    '어머니',
                                ],
                            ],
                            'tr' => ['sentence' => 'nasılsın arkadaşım', 'correct' => ['nasılsın', 'arkadaşım'], 'extra' => ['anne']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私',
                            'は',
                            '元気',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am well',
                                'correct' => [
                                    'I am',
                                    'well',
                                ],
                                'extra' => [
                                    'how are you',
                                ],
                            ],
                            'az' => ['sentence' => 'mən yaxşıyam', 'correct' => ['mən', 'yaxşıyam'], 'extra' => ['necəsən']],
                            'ar' => ['sentence' => 'أنا بخير', 'correct' => ['أنا', 'بخير'], 'extra' => ['كيف حالك']],
                            'ru' => ['sentence' => 'я хорошо', 'correct' => ['я', 'хорошо'], 'extra' => ['как дела']],
                            'es' => [
                                'sentence' => 'Estoy bien',
                                'correct' => [
                                    'estoy',
                                    'bien',
                                ],
                                'extra' => [
                                    'cómo estás',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mir geht es gut',
                                'correct' => [
                                    'ich bin',
                                    'gut',
                                ],
                                'extra' => [
                                    'wie geht es dir',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais bien',
                                'correct' => [
                                    'je suis',
                                    'bien',
                                ],
                                'extra' => [
                                    'comment ça va',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 잘 지냅니다',
                                'correct' => [
                                    '저는',
                                    '잘',
                                    '지냅니다',
                                ],
                                'extra' => [
                                    '어떻게 지내세요',
                                ],
                            ],
                            'tr' => ['sentence' => 'ben iyiyim', 'correct' => ['ben', 'iyiyim'], 'extra' => ['nasılsın']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '私の',
                            '母',
                            'は',
                            '元気',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my mother is well',
                                'correct' => [
                                    'my',
                                    'mother',
                                    'is',
                                    'well',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim ana yaxşıyam', 'correct' => ['mənim', 'ana', 'yaxşıyam'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أم بخير', 'correct' => ['أم', 'بخير'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'мой мама хорошо', 'correct' => ['мой', 'мама', 'хорошо'], 'extra' => ['друг']],
                            'es' => [
                                'sentence' => 'Mi madre está bien',
                                'correct' => [
                                    'mi',
                                    'madre',
                                    'está',
                                    'bien',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Meiner Mutter geht es gut',
                                'correct' => [
                                    'mein',
                                    'Mutter',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma mère va bien',
                                'correct' => [
                                    'ma',
                                    'mère',
                                    'est',
                                    'bien',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 어머니는 잘 지냅니다',
                                'correct' => [
                                    '나의',
                                    '어머니는',
                                    '잘',
                                    '지냅니다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                            'tr' => ['sentence' => 'annem iyi', 'correct' => ['annem', 'iyi'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 店・公園', 2,
                pictures: [
                    [
                        'ja' => '店',
                        'img' => 'shop',
                    ],
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'どこ',
                    ],
                    [
                        'ja' => 'どれ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '店',
                            'は',
                            'どこですか',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'where is the shop',
                                'correct' => [
                                    'where',
                                    'is',
                                    'the',
                                    'shop',
                                ],
                                'extra' => [
                                    'which',
                                ],
                            ],
                            'az' => ['sentence' => 'harada mağaza', 'correct' => ['harada', 'mağaza'], 'extra' => ['hansı']],
                            'ar' => ['sentence' => 'أين متجر', 'correct' => ['أين', 'متجر'], 'extra' => ['أي']],
                            'ru' => ['sentence' => 'где магазин', 'correct' => ['где', 'магазин'], 'extra' => ['какой']],
                            'es' => [
                                'sentence' => 'Dónde está la tienda',
                                'correct' => [
                                    'dónde',
                                    'está',
                                    'la',
                                    'tienda',
                                ],
                                'extra' => [
                                    'cuál',
                                    'parque',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wo ist das Geschäft',
                                'correct' => [
                                    'wo',
                                    'ist',
                                    'das',
                                    'Geschäft',
                                ],
                                'extra' => [
                                    'welcher',
                                    'Park',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Où est le magasin',
                                'correct' => [
                                    'où',
                                    'est',
                                    'le',
                                    'magasin',
                                ],
                                'extra' => [
                                    'quel',
                                    'parc',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '가게는 어디입니까',
                                'correct' => [
                                    '가게는',
                                    '어디입니까',
                                ],
                                'extra' => [
                                    '어느',
                                ],
                            ],
                            'tr' => ['sentence' => 'dükkan nerede', 'correct' => ['dükkan', 'nerede'], 'extra' => ['hangi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'どれ',
                            '公園',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'which park',
                                'correct' => [
                                    'which',
                                    'park',
                                ],
                                'extra' => [
                                    'where',
                                ],
                            ],
                            'az' => ['sentence' => 'hansı park', 'correct' => ['hansı', 'park'], 'extra' => ['harada']],
                            'ar' => ['sentence' => 'أي حديقة', 'correct' => ['أي', 'حديقة'], 'extra' => ['أين']],
                            'ru' => ['sentence' => 'какой парк', 'correct' => ['какой', 'парк'], 'extra' => ['где']],
                            'es' => [
                                'sentence' => 'Qué parque',
                                'correct' => [
                                    'cuál',
                                    'parque',
                                ],
                                'extra' => [
                                    'dónde',
                                    'tienda',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Welcher Park',
                                'correct' => [
                                    'welcher',
                                    'Park',
                                ],
                                'extra' => [
                                    'wo',
                                    'Geschäft',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Quel parc',
                                'correct' => [
                                    'quel',
                                    'parc',
                                ],
                                'extra' => [
                                    'où',
                                    'magasin',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어느 공원',
                                'correct' => [
                                    '어느',
                                    '공원',
                                ],
                                'extra' => [
                                    '어디',
                                ],
                            ],
                            'tr' => ['sentence' => 'hangi park', 'correct' => ['hangi', 'park'], 'extra' => ['nerede']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '公園',
                            'は',
                            'どこですか',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'where is the park',
                                'correct' => [
                                    'where',
                                    'is',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'which',
                                ],
                            ],
                            'az' => ['sentence' => 'harada park', 'correct' => ['harada', 'park'], 'extra' => ['hansı']],
                            'ar' => ['sentence' => 'أين حديقة', 'correct' => ['أين', 'حديقة'], 'extra' => ['أي']],
                            'ru' => ['sentence' => 'где парк', 'correct' => ['где', 'парк'], 'extra' => ['какой']],
                            'es' => [
                                'sentence' => 'Dónde está el parque',
                                'correct' => [
                                    'dónde',
                                    'está',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'cuál',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wo ist der Park',
                                'correct' => [
                                    'wo',
                                    'ist',
                                    'der',
                                    'Park',
                                ],
                                'extra' => [
                                    'welcher',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Où est le parc',
                                'correct' => [
                                    'où',
                                    'est',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'quel',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '공원은 어디입니까',
                                'correct' => [
                                    '공원은',
                                    '어디입니까',
                                ],
                                'extra' => [
                                    '어느',
                                ],
                            ],
                            'tr' => ['sentence' => 'park nerede', 'correct' => ['park', 'nerede'], 'extra' => ['hangi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 本・りんご', 3,
                pictures: [
                    [
                        'ja' => '本',
                        'img' => 'book',
                    ],
                    [
                        'ja' => 'りんご',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'いくつ',
                    ],
                    [
                        'ja' => 'もっと',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '本',
                            'は',
                            '何',
                            '冊',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how many books',
                                'correct' => [
                                    'how many',
                                    'books',
                                ],
                                'extra' => [
                                    'more',
                                ],
                            ],
                            'az' => ['sentence' => 'neçə kitablar', 'correct' => ['neçə', 'kitablar'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'كم كتب', 'correct' => ['كم', 'كتب'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'сколько книги', 'correct' => ['сколько', 'книги'], 'extra' => ['больше']],
                            'es' => [
                                'sentence' => 'Cuántos libros',
                                'correct' => [
                                    'cuántos',
                                    'libros',
                                ],
                                'extra' => [
                                    'más',
                                    'manzana',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wie viele Bücher',
                                'correct' => [
                                    'wie viele',
                                    'Bücher',
                                ],
                                'extra' => [
                                    'mehr',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Combien de livres',
                                'correct' => [
                                    'combien',
                                    'livres',
                                ],
                                'extra' => [
                                    'plus',
                                    'pomme',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '책 몇 권',
                                'correct' => [
                                    '책',
                                    '몇',
                                    '권',
                                ],
                                'extra' => [
                                    '더',
                                ],
                            ],
                            'tr' => ['sentence' => 'kaç kitap', 'correct' => ['kaç', 'kitap'], 'extra' => ['daha çok']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'りんご',
                            'と',
                            '本',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an apple and a book',
                                'correct' => [
                                    'an',
                                    'apple',
                                    'and',
                                    'a',
                                    'book',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'az' => ['sentence' => 'bir alma və bir kitab', 'correct' => ['bir', 'alma', 'və', 'bir', 'kitab'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'تفاحة و كتاب', 'correct' => ['تفاحة', 'و', 'كتاب'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'яблоко и книга', 'correct' => ['яблоко', 'и', 'книга'], 'extra' => ['сколько']],
                            'es' => [
                                'sentence' => 'Una manzana y un libro',
                                'correct' => [
                                    'una',
                                    'manzana',
                                    'y',
                                    'un',
                                    'libro',
                                ],
                                'extra' => [
                                    'cuántos',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Apfel und ein Buch',
                                'correct' => [
                                    'ein',
                                    'Apfel',
                                    'und',
                                    'ein',
                                    'Buch',
                                ],
                                'extra' => [
                                    'wie viele',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une pomme et un livre',
                                'correct' => [
                                    'une',
                                    'pomme',
                                    'et',
                                    'un',
                                    'livre',
                                ],
                                'extra' => [
                                    'combien',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '사과와 책',
                                'correct' => [
                                    '사과와',
                                    '책',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir elma ve bir kitap', 'correct' => ['bir', 'elma', 've', 'bir', 'kitap'], 'extra' => ['kaç']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'もっと',
                            '本',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'more books',
                                'correct' => [
                                    'more',
                                    'books',
                                ],
                                'extra' => [
                                    'how many',
                                ],
                            ],
                            'az' => ['sentence' => 'daha kitablar', 'correct' => ['daha', 'kitablar'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'أكثر كتب', 'correct' => ['أكثر', 'كتب'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'больше книги', 'correct' => ['больше', 'книги'], 'extra' => ['сколько']],
                            'es' => [
                                'sentence' => 'Más libros',
                                'correct' => [
                                    'más',
                                    'libros',
                                ],
                                'extra' => [
                                    'cuántos',
                                    'manzana',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Mehr Bücher',
                                'correct' => [
                                    'mehr',
                                    'Bücher',
                                ],
                                'extra' => [
                                    'wie viele',
                                    'Apfel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Plus de livres',
                                'correct' => [
                                    'plus',
                                    'livres',
                                ],
                                'extra' => [
                                    'combien',
                                    'pomme',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '더 많은 책',
                                'correct' => [
                                    '더',
                                    '많은',
                                    '책',
                                ],
                                'extra' => [
                                    '몇 개',
                                ],
                            ],
                            'tr' => ['sentence' => 'daha çok kitap', 'correct' => ['daha', 'çok', 'kitap'], 'extra' => ['kaç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: 学校・家', 4,
                pictures: [
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'いつ',
                    ],
                    [
                        'ja' => 'なぜ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '学校',
                            'は',
                            'いつ',
                            '開いています',
                            'か',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'when is the school open',
                                'correct' => [
                                    'when',
                                    'is',
                                    'the',
                                    'school',
                                    'open',
                                ],
                                'extra' => [
                                    'why',
                                ],
                            ],
                            'az' => ['sentence' => 'nə vaxt məktəb açıq', 'correct' => ['nə vaxt', 'məktəb', 'açıq'], 'extra' => ['niyə']],
                            'ar' => ['sentence' => 'متى مدرسة مفتوح', 'correct' => ['متى', 'مدرسة', 'مفتوح'], 'extra' => ['لماذا']],
                            'ru' => ['sentence' => 'когда школа открыто', 'correct' => ['когда', 'школа', 'открыто'], 'extra' => ['почему']],
                            'es' => [
                                'sentence' => 'Cuándo está abierta la escuela',
                                'correct' => [
                                    'cuándo',
                                    'está',
                                    'la',
                                    'escuela',
                                    'abierto',
                                ],
                                'extra' => [
                                    'por qué',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Wann ist die Schule offen',
                                'correct' => [
                                    'wann',
                                    'ist',
                                    'die',
                                    'Schule',
                                    'offen',
                                ],
                                'extra' => [
                                    'warum',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Quand l\'école est ouverte',
                                'correct' => [
                                    'quand',
                                    'est',
                                    'le',
                                    'école',
                                    'ouvert',
                                ],
                                'extra' => [
                                    'pourquoi',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교는 언제 여나요',
                                'correct' => [
                                    '학교는',
                                    '언제',
                                    '여나요',
                                ],
                                'extra' => [
                                    '왜',
                                ],
                            ],
                            'tr' => ['sentence' => 'okul ne zaman açık', 'correct' => ['okul', 'ne', 'zaman', 'açık'], 'extra' => ['neden']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'なぜ',
                            'ここ',
                            'に',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'why here',
                                'correct' => [
                                    'why',
                                    'here',
                                ],
                                'extra' => [
                                    'when',
                                ],
                            ],
                            'az' => ['sentence' => 'niyə burada', 'correct' => ['niyə', 'burada'], 'extra' => ['nə vaxt']],
                            'ar' => ['sentence' => 'لماذا هنا', 'correct' => ['لماذا', 'هنا'], 'extra' => ['متى']],
                            'ru' => ['sentence' => 'почему здесь', 'correct' => ['почему', 'здесь'], 'extra' => ['когда']],
                            'es' => [
                                'sentence' => 'Por qué aquí',
                                'correct' => [
                                    'por qué',
                                    'aquí',
                                ],
                                'extra' => [
                                    'cuándo',
                                    'escuela',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Warum hier',
                                'correct' => [
                                    'warum',
                                    'hier',
                                ],
                                'extra' => [
                                    'wann',
                                    'Schule',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Pourquoi ici',
                                'correct' => [
                                    'pourquoi',
                                    'ici',
                                ],
                                'extra' => [
                                    'quand',
                                    'école',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '왜 여기에',
                                'correct' => [
                                    '왜',
                                    '여기에',
                                ],
                                'extra' => [
                                    '언제',
                                ],
                            ],
                            'tr' => ['sentence' => 'neden burada', 'correct' => ['neden', 'burada'], 'extra' => ['ne zaman']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '学校',
                            'と',
                            '家',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the school and the house',
                                'correct' => [
                                    'the',
                                    'school',
                                    'and',
                                    'the',
                                    'house',
                                ],
                                'extra' => [
                                    'why',
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb və ev', 'correct' => ['məktəb', 'və', 'ev'], 'extra' => ['niyə']],
                            'ar' => ['sentence' => 'مدرسة و بيت', 'correct' => ['مدرسة', 'و', 'بيت'], 'extra' => ['لماذا']],
                            'ru' => ['sentence' => 'школа и дом', 'correct' => ['школа', 'и', 'дом'], 'extra' => ['почему']],
                            'es' => [
                                'sentence' => 'La escuela y la casa',
                                'correct' => [
                                    'la',
                                    'escuela',
                                    'y',
                                    'la',
                                    'casa',
                                ],
                                'extra' => [
                                    'cuándo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Die Schule und das Haus',
                                'correct' => [
                                    'die',
                                    'Schule',
                                    'und',
                                    'das',
                                    'Haus',
                                ],
                                'extra' => [
                                    'wann',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'L\'école et la maison',
                                'correct' => [
                                    'école',
                                    'et',
                                    'la',
                                    'maison',
                                ],
                                'extra' => [
                                    'quand',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '학교와 집',
                                'correct' => [
                                    '학교와',
                                    '집',
                                ],
                                'extra' => [
                                    '왜',
                                ],
                            ],
                            'tr' => ['sentence' => 'okul ve ev', 'correct' => ['okul', 've', 'ev'], 'extra' => ['neden']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: 友達・公園', 5,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '公園',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'たぶん',
                    ],
                    [
                        'ja' => 'もちろん',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'たぶん',
                            '明日',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'maybe tomorrow',
                                'correct' => [
                                    'maybe',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'of course',
                                ],
                            ],
                            'az' => ['sentence' => 'bəlkə sabah', 'correct' => ['bəlkə', 'sabah'], 'extra' => ['əlbəttə']],
                            'ar' => ['sentence' => 'ربما غدا', 'correct' => ['ربما', 'غدا'], 'extra' => ['بالطبع']],
                            'ru' => ['sentence' => 'может быть завтра', 'correct' => ['может быть', 'завтра'], 'extra' => ['конечно']],
                            'es' => [
                                'sentence' => 'Quizás mañana',
                                'correct' => [
                                    'quizás',
                                    'mañana',
                                ],
                                'extra' => [
                                    'por supuesto',
                                    'amigo',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Vielleicht morgen',
                                'correct' => [
                                    'vielleicht',
                                    'morgen',
                                ],
                                'extra' => [
                                    'natürlich',
                                    'Freund',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Peut-être demain',
                                'correct' => [
                                    'peut-être',
                                    'demain',
                                ],
                                'extra' => [
                                    'bien sûr',
                                    'ami',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '아마도 내일',
                                'correct' => [
                                    '아마도',
                                    '내일',
                                ],
                                'extra' => [
                                    '물론',
                                ],
                            ],
                            'tr' => ['sentence' => 'belki yarın', 'correct' => ['belki', 'yarın'], 'extra' => ['elbette']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'もちろん',
                            '私の',
                            '友達',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'of course my friend',
                                'correct' => [
                                    'of course',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'maybe',
                                ],
                            ],
                            'az' => ['sentence' => 'əlbəttə mənim dost', 'correct' => ['əlbəttə', 'mənim', 'dost'], 'extra' => ['bəlkə']],
                            'ar' => ['sentence' => 'بالطبع صديق', 'correct' => ['بالطبع', 'صديق'], 'extra' => ['ربما']],
                            'ru' => ['sentence' => 'конечно мой друг', 'correct' => ['конечно', 'мой', 'друг'], 'extra' => ['может быть']],
                            'es' => [
                                'sentence' => 'Por supuesto, mi amigo',
                                'correct' => [
                                    'por supuesto',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'quizás',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Natürlich, mein Freund',
                                'correct' => [
                                    'natürlich',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'vielleicht',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Bien sûr, mon ami',
                                'correct' => [
                                    'bien sûr',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'peut-être',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '물론, 나의 친구',
                                'correct' => [
                                    '물론',
                                    '나의',
                                    '친구',
                                ],
                                'extra' => [
                                    '아마도',
                                ],
                            ],
                            'tr' => ['sentence' => 'elbette arkadaşım', 'correct' => ['elbette', 'arkadaşım'], 'extra' => ['belki']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'たぶん',
                            '公園',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'maybe the park',
                                'correct' => [
                                    'maybe',
                                    'the',
                                    'park',
                                ],
                                'extra' => [
                                    'of course',
                                ],
                            ],
                            'az' => ['sentence' => 'bəlkə park', 'correct' => ['bəlkə', 'park'], 'extra' => ['əlbəttə']],
                            'ar' => ['sentence' => 'ربما حديقة', 'correct' => ['ربما', 'حديقة'], 'extra' => ['بالطبع']],
                            'ru' => ['sentence' => 'может быть парк', 'correct' => ['может быть', 'парк'], 'extra' => ['конечно']],
                            'es' => [
                                'sentence' => 'Quizás el parque',
                                'correct' => [
                                    'quizás',
                                    'el',
                                    'parque',
                                ],
                                'extra' => [
                                    'por supuesto',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Vielleicht der Park',
                                'correct' => [
                                    'vielleicht',
                                    'der',
                                    'Park',
                                ],
                                'extra' => [
                                    'natürlich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Peut-être le parc',
                                'correct' => [
                                    'peut-être',
                                    'le',
                                    'parc',
                                ],
                                'extra' => [
                                    'bien sûr',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '아마도 공원',
                                'correct' => [
                                    '아마도',
                                    '공원',
                                ],
                                'extra' => [
                                    '물론',
                                ],
                            ],
                            'tr' => ['sentence' => 'belki park', 'correct' => ['belki', 'park'], 'extra' => ['elbette']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
