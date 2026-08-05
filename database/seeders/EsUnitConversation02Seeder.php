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
                        ],
                    ],
                ],
            ),
        ];
    }
}
