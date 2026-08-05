<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation02Seeder extends Seeder
{
    private const PICTURES = [
        'Friend' => 'friend', 'Mother' => 'mother', 'Shop' => 'shop', 'Park' => 'park',
        'Book' => 'book', 'Apple' => 'apple', 'School' => 'school', 'House' => 'house',
    ];

    /**
     * English Chapter 2, Unit 2 — asking questions.
     *
     * The question words (how are you, where, which, how many, when, why) are
     * the whole point of the unit, so each lesson wraps one of them around the
     * familiar people and places from Chapter 1.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Asking Questions', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: How Are You?', 1,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Mother', 'img' => 'mother']],
                plain: [['en' => 'How are you'], ['en' => 'Well']],
                phrases: [
                    'a' => [
                        'words' => ['how are you', 'friend'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cómo estás, amigo', 'correct' => ['cómo estás', 'amigo'], 'extra' => ['madre', 'bien']],
                            'de' => ['sentence' => 'Wie geht es dir, Freund', 'correct' => ['wie geht es dir', 'Freund'], 'extra' => ['Mutter', 'gut']],
                            'ja' => ['sentence' => 'お元気ですか、友達', 'correct' => ['お元気ですか', '友達'], 'extra' => ['母']],
                            'ko' => ['sentence' => '어떻게 지내세요, 친구', 'correct' => ['어떻게', '지내세요', '친구'], 'extra' => ['어머니']],
                            'fr' => ['sentence' => 'Comment ça va, mon ami', 'correct' => ['comment ça va', 'ami'], 'extra' => ['mère', 'bien']],
                        ],
                    ],
                    'b' => [
                        'words' => ['I am', 'well'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Estoy bien', 'correct' => ['estoy', 'bien'], 'extra' => ['cómo estás', 'amigo']],
                            'de' => ['sentence' => 'Mir geht es gut', 'correct' => ['ich bin', 'gut'], 'extra' => ['wie geht es dir']],
                            'ja' => ['sentence' => '私は元気です', 'correct' => ['私', 'は', '元気', 'です'], 'extra' => ['お元気ですか']],
                            'ko' => ['sentence' => '저는 잘 지냅니다', 'correct' => ['저는', '잘', '지냅니다'], 'extra' => ['어떻게 지내세요']],
                            'fr' => ['sentence' => 'Je vais bien', 'correct' => ['je suis', 'bien'], 'extra' => ['comment ça va']],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'mother', 'is', 'well'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi madre está bien', 'correct' => ['mi', 'madre', 'está', 'bien'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Meiner Mutter geht es gut', 'correct' => ['mein', 'Mutter', 'ist', 'gut'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の母は元気です', 'correct' => ['私の', '母', 'は', '元気', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '나의 어머니는 잘 지냅니다', 'correct' => ['나의', '어머니는', '잘', '지냅니다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Ma mère va bien', 'correct' => ['ma', 'mère', 'est', 'bien'], 'extra' => ['ami']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Where & Which', 2,
                pictures: [['en' => 'Shop', 'img' => 'shop'], ['en' => 'Park', 'img' => 'park']],
                plain: [['en' => 'Where'], ['en' => 'Which']],
                phrases: [
                    'a' => [
                        'words' => ['where', 'is', 'the', 'shop'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dónde está la tienda', 'correct' => ['dónde', 'está', 'la', 'tienda'], 'extra' => ['cuál', 'parque']],
                            'de' => ['sentence' => 'Wo ist das Geschäft', 'correct' => ['wo', 'ist', 'das', 'Geschäft'], 'extra' => ['welcher', 'Park']],
                            'ja' => ['sentence' => '店はどこですか', 'correct' => ['店', 'は', 'どこですか'], 'extra' => ['どれ']],
                            'ko' => ['sentence' => '가게는 어디입니까', 'correct' => ['가게는', '어디입니까'], 'extra' => ['어느']],
                            'fr' => ['sentence' => 'Où est le magasin', 'correct' => ['où', 'est', 'le', 'magasin'], 'extra' => ['quel', 'parc']],
                        ],
                    ],
                    'b' => [
                        'words' => ['which', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Qué parque', 'correct' => ['cuál', 'parque'], 'extra' => ['dónde', 'tienda']],
                            'de' => ['sentence' => 'Welcher Park', 'correct' => ['welcher', 'Park'], 'extra' => ['wo', 'Geschäft']],
                            'ja' => ['sentence' => 'どの公園', 'correct' => ['どの', '公園'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '어느 공원', 'correct' => ['어느', '공원'], 'extra' => ['어디']],
                            'fr' => ['sentence' => 'Quel parc', 'correct' => ['quel', 'parc'], 'extra' => ['où', 'magasin']],
                        ],
                    ],
                    'c' => [
                        'words' => ['where', 'is', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dónde está el parque', 'correct' => ['dónde', 'está', 'el', 'parque'], 'extra' => ['cuál']],
                            'de' => ['sentence' => 'Wo ist der Park', 'correct' => ['wo', 'ist', 'der', 'Park'], 'extra' => ['welcher']],
                            'ja' => ['sentence' => '公園はどこですか', 'correct' => ['公園', 'は', 'どこですか'], 'extra' => ['どれ']],
                            'ko' => ['sentence' => '공원은 어디입니까', 'correct' => ['공원은', '어디입니까'], 'extra' => ['어느']],
                            'fr' => ['sentence' => 'Où est le parc', 'correct' => ['où', 'est', 'le', 'parc'], 'extra' => ['quel']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: How Many?', 3,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'How many'], ['en' => 'More']],
                phrases: [
                    'a' => [
                        'words' => ['how many', 'books'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libros'], 'extra' => ['más', 'manzana']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Bücher'], 'extra' => ['mehr', 'Apfel']],
                            'ja' => ['sentence' => '本は何冊', 'correct' => ['本', 'は', '何', '冊'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['더']],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien', 'livres'], 'extra' => ['plus', 'pomme']],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'apple', 'and', 'a', 'book'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una manzana y un libro', 'correct' => ['una', 'manzana', 'y', 'un', 'libro'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Ein Apfel und ein Buch', 'correct' => ['ein', 'Apfel', 'und', 'ein', 'Buch'], 'extra' => ['wie viele']],
                            'ja' => ['sentence' => 'りんごと本', 'correct' => ['りんご', 'と', '本'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '사과와 책', 'correct' => ['사과와', '책'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Une pomme et un livre', 'correct' => ['une', 'pomme', 'et', 'un', 'livre'], 'extra' => ['combien']],
                        ],
                    ],
                    'c' => [
                        'words' => ['more', 'books'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Más libros', 'correct' => ['más', 'libros'], 'extra' => ['cuántos', 'manzana']],
                            'de' => ['sentence' => 'Mehr Bücher', 'correct' => ['mehr', 'Bücher'], 'extra' => ['wie viele', 'Apfel']],
                            'ja' => ['sentence' => 'もっと本', 'correct' => ['もっと', '本'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '더 많은 책', 'correct' => ['더', '많은', '책'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Plus de livres', 'correct' => ['plus', 'livres'], 'extra' => ['combien', 'pomme']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: When & Why', 4,
                pictures: [['en' => 'School', 'img' => 'school'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'When'], ['en' => 'Why']],
                phrases: [
                    'a' => [
                        'words' => ['when', 'is', 'the', 'school', 'open'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cuándo está abierta la escuela', 'correct' => ['cuándo', 'está', 'la', 'escuela', 'abierto'], 'extra' => ['por qué']],
                            'de' => ['sentence' => 'Wann ist die Schule offen', 'correct' => ['wann', 'ist', 'die', 'Schule', 'offen'], 'extra' => ['warum']],
                            'ja' => ['sentence' => '学校はいつ開いていますか', 'correct' => ['学校', 'は', 'いつ', '開いています', 'か'], 'extra' => ['なぜ']],
                            'ko' => ['sentence' => '학교는 언제 여나요', 'correct' => ['학교는', '언제', '여나요'], 'extra' => ['왜']],
                            'fr' => ['sentence' => "Quand l'école est ouverte", 'correct' => ['quand', 'est', 'le', 'école', 'ouvert'], 'extra' => ['pourquoi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['why', 'here'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Por qué aquí', 'correct' => ['por qué', 'aquí'], 'extra' => ['cuándo', 'escuela']],
                            'de' => ['sentence' => 'Warum hier', 'correct' => ['warum', 'hier'], 'extra' => ['wann', 'Schule']],
                            'ja' => ['sentence' => 'なぜここに', 'correct' => ['なぜ', 'ここ', 'に'], 'extra' => ['いつ']],
                            'ko' => ['sentence' => '왜 여기에', 'correct' => ['왜', '여기에'], 'extra' => ['언제']],
                            'fr' => ['sentence' => 'Pourquoi ici', 'correct' => ['pourquoi', 'ici'], 'extra' => ['quand', 'école']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'school', 'and', 'the', 'house'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La escuela y la casa', 'correct' => ['la', 'escuela', 'y', 'la', 'casa'], 'extra' => ['cuándo']],
                            'de' => ['sentence' => 'Die Schule und das Haus', 'correct' => ['die', 'Schule', 'und', 'das', 'Haus'], 'extra' => ['wann']],
                            'ja' => ['sentence' => '学校と家', 'correct' => ['学校', 'と', '家'], 'extra' => ['なぜ']],
                            'ko' => ['sentence' => '학교와 집', 'correct' => ['학교와', '집'], 'extra' => ['왜']],
                            'fr' => ['sentence' => "L'école et la maison", 'correct' => ['école', 'et', 'la', 'maison'], 'extra' => ['quand']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Maybe & Of Course', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Park', 'img' => 'park']],
                plain: [['en' => 'Maybe'], ['en' => 'Of course']],
                phrases: [
                    'a' => [
                        'words' => ['maybe', 'tomorrow'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Quizás mañana', 'correct' => ['quizás', 'mañana'], 'extra' => ['por supuesto', 'amigo']],
                            'de' => ['sentence' => 'Vielleicht morgen', 'correct' => ['vielleicht', 'morgen'], 'extra' => ['natürlich', 'Freund']],
                            'ja' => ['sentence' => 'たぶん明日', 'correct' => ['たぶん', '明日'], 'extra' => ['もちろん']],
                            'ko' => ['sentence' => '아마도 내일', 'correct' => ['아마도', '내일'], 'extra' => ['물론']],
                            'fr' => ['sentence' => 'Peut-être demain', 'correct' => ['peut-être', 'demain'], 'extra' => ['bien sûr', 'ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['of course', 'my', 'friend'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Por supuesto, mi amigo', 'correct' => ['por supuesto', 'mi', 'amigo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Natürlich, mein Freund', 'correct' => ['natürlich', 'mein', 'Freund'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'もちろん、私の友達', 'correct' => ['もちろん', '私の', '友達'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '물론, 나의 친구', 'correct' => ['물론', '나의', '친구'], 'extra' => ['아마도']],
                            'fr' => ['sentence' => 'Bien sûr, mon ami', 'correct' => ['bien sûr', 'mon', 'ami'], 'extra' => ['peut-être']],
                        ],
                    ],
                    'c' => [
                        'words' => ['maybe', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Quizás el parque', 'correct' => ['quizás', 'el', 'parque'], 'extra' => ['por supuesto']],
                            'de' => ['sentence' => 'Vielleicht der Park', 'correct' => ['vielleicht', 'der', 'Park'], 'extra' => ['natürlich']],
                            'ja' => ['sentence' => 'たぶん公園', 'correct' => ['たぶん', '公園'], 'extra' => ['もちろん']],
                            'ko' => ['sentence' => '아마도 공원', 'correct' => ['아마도', '공원'], 'extra' => ['물론']],
                            'fr' => ['sentence' => 'Peut-être le parc', 'correct' => ['peut-être', 'le', 'parc'], 'extra' => ['bien sûr']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
