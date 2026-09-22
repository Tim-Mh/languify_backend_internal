<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation02Seeder extends Seeder
{
    private const PICTURES = [
        'amigo' => 'friend',
        'madre' => 'mother',
        'tienda' => 'shop',
        'parque' => 'park',
        'libro' => 'book',
        'manzana' => 'apple',
        'escuela' => 'school',
        'casa' => 'house',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 2, the Spanish twin of the
     * English "Unit 2: Asking Questions" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unidad 2: Hacer preguntas', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Amigo y Madre', 1,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'madre',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cómo estás',
                    ],
                    [
                        'es' => 'bien',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Cómo',
                            'estás',
                            'amigo',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'how are you friend',
                                'correct' => [
                                    'how are you',
                                    'friend',
                                ],
                                'extra' => [
                                    'mother',
                                    'well',
                                ],
                            ],
                            'az' => ['sentence' => 'necəsən dost', 'correct' => ['necəsən', 'dost'], 'extra' => ['ana', 'yaxşıyam']],
                            'ar' => ['sentence' => 'كيف حالك صديق', 'correct' => ['كيف حالك', 'صديق'], 'extra' => ['أم', 'بخير']],
                            'ru' => ['sentence' => 'как дела друг', 'correct' => ['как дела', 'друг'], 'extra' => ['мама', 'хорошо']],
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
                            'ja' => [
                                'sentence' => 'お元気ですか、友達',
                                'correct' => [
                                    'お元気ですか',
                                    '友達',
                                ],
                                'extra' => [
                                    '母',
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
                            'tr' => ['sentence' => 'nasılsın arkadaşım', 'correct' => ['nasılsın', 'arkadaşım'], 'extra' => ['anne', 'iyi']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Estoy',
                            'bien',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am well',
                                'correct' => [
                                    'I am',
                                    'well',
                                ],
                                'extra' => [
                                    'how are you',
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'mən yaxşıyam', 'correct' => ['mən', 'yaxşıyam'], 'extra' => ['necəsən', 'dost']],
                            'ar' => ['sentence' => 'أنا بخير', 'correct' => ['أنا', 'بخير'], 'extra' => ['كيف حالك', 'صديق']],
                            'ru' => ['sentence' => 'я хорошо', 'correct' => ['я', 'хорошо'], 'extra' => ['как дела', 'друг']],
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
                            'ja' => [
                                'sentence' => '私は元気です',
                                'correct' => [
                                    '私',
                                    'は',
                                    '元気',
                                    'です',
                                ],
                                'extra' => [
                                    'お元気ですか',
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
                            'tr' => ['sentence' => 'ben iyiyim', 'correct' => ['ben', 'iyiyim'], 'extra' => ['nasılsın', 'arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'madre',
                            'está',
                            'bien',
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
                            'ja' => [
                                'sentence' => '私の母は元気です',
                                'correct' => [
                                    '私の',
                                    '母',
                                    'は',
                                    '元気',
                                    'です',
                                ],
                                'extra' => [
                                    '友達',
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
            $builder->lesson('Lección 2: Tienda y Parque', 2,
                pictures: [
                    [
                        'es' => 'tienda',
                        'img' => 'shop',
                    ],
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'es' => 'dónde',
                    ],
                    [
                        'es' => 'cuál',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Dónde',
                            'está',
                            'la',
                            'tienda',
                        ],
                        'blank' => 0,
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
                                    'park',
                                ],
                            ],
                            'az' => ['sentence' => 'harada mağaza', 'correct' => ['harada', 'mağaza'], 'extra' => ['hansı', 'park']],
                            'ar' => ['sentence' => 'أين متجر', 'correct' => ['أين', 'متجر'], 'extra' => ['أي', 'حديقة']],
                            'ru' => ['sentence' => 'где магазин', 'correct' => ['где', 'магазин'], 'extra' => ['какой', 'парк']],
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
                            'ja' => [
                                'sentence' => '店はどこですか',
                                'correct' => [
                                    '店',
                                    'は',
                                    'どこですか',
                                ],
                                'extra' => [
                                    'どれ',
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
                            'tr' => ['sentence' => 'dükkan nerede', 'correct' => ['dükkan', 'nerede'], 'extra' => ['hangi', 'park']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Qué',
                            'parque',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'which park',
                                'correct' => [
                                    'which',
                                    'park',
                                ],
                                'extra' => [
                                    'where',
                                    'shop',
                                ],
                            ],
                            'az' => ['sentence' => 'hansı park', 'correct' => ['hansı', 'park'], 'extra' => ['harada', 'mağaza']],
                            'ar' => ['sentence' => 'أي حديقة', 'correct' => ['أي', 'حديقة'], 'extra' => ['أين', 'متجر']],
                            'ru' => ['sentence' => 'какой парк', 'correct' => ['какой', 'парк'], 'extra' => ['где', 'магазин']],
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
                            'ja' => [
                                'sentence' => 'どの公園',
                                'correct' => [
                                    'どの',
                                    '公園',
                                ],
                                'extra' => [
                                    'どこ',
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
                            'tr' => ['sentence' => 'hangi park', 'correct' => ['hangi', 'park'], 'extra' => ['nerede', 'dükkan']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Dónde',
                            'está',
                            'el',
                            'parque',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => '公園はどこですか',
                                'correct' => [
                                    '公園',
                                    'は',
                                    'どこですか',
                                ],
                                'extra' => [
                                    'どれ',
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
            $builder->lesson('Lección 3: Libro y Manzana', 3,
                pictures: [
                    [
                        'es' => 'libro',
                        'img' => 'book',
                    ],
                    [
                        'es' => 'manzana',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cuántos',
                    ],
                    [
                        'es' => 'más',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Cuántos',
                            'libros',
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
                                    'apple',
                                ],
                            ],
                            'az' => ['sentence' => 'neçə kitablar', 'correct' => ['neçə', 'kitablar'], 'extra' => ['daha', 'alma']],
                            'ar' => ['sentence' => 'كم كتب', 'correct' => ['كم', 'كتب'], 'extra' => ['أكثر', 'تفاحة']],
                            'ru' => ['sentence' => 'сколько книги', 'correct' => ['сколько', 'книги'], 'extra' => ['больше', 'яблоко']],
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
                            'ja' => [
                                'sentence' => '本は何冊',
                                'correct' => [
                                    '本',
                                    'は',
                                    '何',
                                    '冊',
                                ],
                                'extra' => [
                                    'もっと',
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
                            'tr' => ['sentence' => 'kaç kitap', 'correct' => ['kaç', 'kitap'], 'extra' => ['daha çok', 'elma']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Una',
                            'manzana',
                            'y',
                            'un',
                            'libro',
                        ],
                        'blank' => 3,
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
                            'ja' => [
                                'sentence' => 'りんごと本',
                                'correct' => [
                                    'りんご',
                                    'と',
                                    '本',
                                ],
                                'extra' => [
                                    'いくつ',
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
                            'Más',
                            'libros',
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
                                    'apple',
                                ],
                            ],
                            'az' => ['sentence' => 'daha kitablar', 'correct' => ['daha', 'kitablar'], 'extra' => ['neçə', 'alma']],
                            'ar' => ['sentence' => 'أكثر كتب', 'correct' => ['أكثر', 'كتب'], 'extra' => ['كم', 'تفاحة']],
                            'ru' => ['sentence' => 'больше книги', 'correct' => ['больше', 'книги'], 'extra' => ['сколько', 'яблоко']],
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
                            'ja' => [
                                'sentence' => 'もっと本',
                                'correct' => [
                                    'もっと',
                                    '本',
                                ],
                                'extra' => [
                                    'いくつ',
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
                            'tr' => ['sentence' => 'daha çok kitap', 'correct' => ['daha', 'çok', 'kitap'], 'extra' => ['kaç', 'elma']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Escuela y Casa', 4,
                pictures: [
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'cuándo',
                    ],
                    [
                        'es' => 'por qué',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Cuándo',
                            'está',
                            'abierta',
                            'la',
                            'escuela',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => '学校はいつ開いていますか',
                                'correct' => [
                                    '学校',
                                    'は',
                                    'いつ',
                                    '開いています',
                                    'か',
                                ],
                                'extra' => [
                                    'なぜ',
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
                            'Por',
                            'qué',
                            'aquí',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'why here',
                                'correct' => [
                                    'why',
                                    'here',
                                ],
                                'extra' => [
                                    'when',
                                    'school',
                                ],
                            ],
                            'az' => ['sentence' => 'niyə burada', 'correct' => ['niyə', 'burada'], 'extra' => ['nə vaxt', 'məktəb']],
                            'ar' => ['sentence' => 'لماذا هنا', 'correct' => ['لماذا', 'هنا'], 'extra' => ['متى', 'مدرسة']],
                            'ru' => ['sentence' => 'почему здесь', 'correct' => ['почему', 'здесь'], 'extra' => ['когда', 'школа']],
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
                            'ja' => [
                                'sentence' => 'なぜここに',
                                'correct' => [
                                    'なぜ',
                                    'ここ',
                                    'に',
                                ],
                                'extra' => [
                                    'いつ',
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
                            'tr' => ['sentence' => 'neden burada', 'correct' => ['neden', 'burada'], 'extra' => ['ne zaman', 'okul']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'La',
                            'escuela',
                            'y',
                            'la',
                            'casa',
                        ],
                        'blank' => 1,
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
                                    'when',
                                ],
                            ],
                            'az' => ['sentence' => 'məktəb və ev', 'correct' => ['məktəb', 'və', 'ev'], 'extra' => ['nə vaxt']],
                            'ar' => ['sentence' => 'مدرسة و بيت', 'correct' => ['مدرسة', 'و', 'بيت'], 'extra' => ['متى']],
                            'ru' => ['sentence' => 'школа и дом', 'correct' => ['школа', 'и', 'дом'], 'extra' => ['когда']],
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
                            'ja' => [
                                'sentence' => '学校と家',
                                'correct' => [
                                    '学校',
                                    'と',
                                    '家',
                                ],
                                'extra' => [
                                    'なぜ',
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
                            'tr' => ['sentence' => 'okul ve ev', 'correct' => ['okul', 've', 'ev'], 'extra' => ['ne zaman']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Amigo y Parque', 5,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'parque',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'es' => 'quizás',
                    ],
                    [
                        'es' => 'por supuesto',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quizás',
                            'mañana',
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
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'bəlkə sabah', 'correct' => ['bəlkə', 'sabah'], 'extra' => ['əlbəttə', 'dost']],
                            'ar' => ['sentence' => 'ربما غدا', 'correct' => ['ربما', 'غدا'], 'extra' => ['بالطبع', 'صديق']],
                            'ru' => ['sentence' => 'может быть завтра', 'correct' => ['может быть', 'завтра'], 'extra' => ['конечно', 'друг']],
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
                            'ja' => [
                                'sentence' => 'たぶん明日',
                                'correct' => [
                                    'たぶん',
                                    '明日',
                                ],
                                'extra' => [
                                    'もちろん',
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
                            'tr' => ['sentence' => 'belki yarın', 'correct' => ['belki', 'yarın'], 'extra' => ['elbette', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Por',
                            'supuesto',
                            'mi',
                            'amigo',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => 'もちろん、私の友達',
                                'correct' => [
                                    'もちろん',
                                    '私の',
                                    '友達',
                                ],
                                'extra' => [
                                    'たぶん',
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
                            'Quizás',
                            'el',
                            'parque',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'たぶん公園',
                                'correct' => [
                                    'たぶん',
                                    '公園',
                                ],
                                'extra' => [
                                    'もちろん',
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
