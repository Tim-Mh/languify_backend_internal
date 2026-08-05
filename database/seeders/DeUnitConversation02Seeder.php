<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation02Seeder extends Seeder
{
    private const PICTURES = [
        'Freund' => 'friend',
        'Mutter' => 'mother',
        'Geschäft' => 'shop',
        'Park' => 'park',
        'Buch' => 'book',
        'Apfel' => 'apple',
        'Schule' => 'school',
        'Haus' => 'house',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 2, the German twin of the
     * English "Unit 2: Asking Questions" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Einheit 2: Fragen stellen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Freund & Mutter', 1,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Mutter',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wie geht es dir',
                    ],
                    [
                        'de' => 'gut',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Wie',
                            'geht',
                            'es',
                            'dir',
                            'Freund',
                        ],
                        'blank' => 4,
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
                            'Mir',
                            'geht',
                            'es',
                            'gut',
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
                            'Meiner',
                            'Mutter',
                            'geht',
                            'es',
                            'gut',
                        ],
                        'blank' => 4,
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
            $builder->lesson('Lektion 2: Geschäft & Park', 2,
                pictures: [
                    [
                        'de' => 'Geschäft',
                        'img' => 'shop',
                    ],
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wo',
                    ],
                    [
                        'de' => 'welcher',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Wo',
                            'ist',
                            'das',
                            'Geschäft',
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
                            'Welcher',
                            'Park',
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
                                    'shop',
                                ],
                            ],
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
                            'Wo',
                            'ist',
                            'der',
                            'Park',
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
            $builder->lesson('Lektion 3: Buch & Apfel', 3,
                pictures: [
                    [
                        'de' => 'Buch',
                        'img' => 'book',
                    ],
                    [
                        'de' => 'Apfel',
                        'img' => 'apple',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wie viele',
                    ],
                    [
                        'de' => 'mehr',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Wie',
                            'viele',
                            'Bücher',
                        ],
                        'blank' => 2,
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
                            'Ein',
                            'Apfel',
                            'und',
                            'ein',
                            'Buch',
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
                            'Mehr',
                            'Bücher',
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
            $builder->lesson('Lektion 4: Schule & Haus', 4,
                pictures: [
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'wann',
                    ],
                    [
                        'de' => 'warum',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Wann',
                            'ist',
                            'die',
                            'Schule',
                            'offen',
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
                            'Warum',
                            'hier',
                        ],
                        'blank' => 0,
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
                            'Die',
                            'Schule',
                            'und',
                            'das',
                            'Haus',
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
            $builder->lesson('Lektion 5: Freund & Park', 5,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Park',
                        'img' => 'park',
                    ],
                ],
                plain: [
                    [
                        'de' => 'vielleicht',
                    ],
                    [
                        'de' => 'natürlich',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vielleicht',
                            'morgen',
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
                            'Natürlich',
                            'mein',
                            'Freund',
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
                            'Vielleicht',
                            'der',
                            'Park',
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
