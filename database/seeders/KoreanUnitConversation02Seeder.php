<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation02Seeder extends Seeder
{
    private const PICTURES = ['친구' => 'friend', '어머니' => 'mother', '가게' => 'shop', '공원' => 'park', '책' => 'book', '사과' => 'apple', '학교' => 'school', '집' => 'house'];

    /**
     * Korean Conversation, Unit 2, the Korean twin of the English "Asking Questions" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, '유닛 2: 질문하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 친구 · 어머니', 1,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '어머니', 'img' => 'mother']],
                plain: [['ko' => '어떻게 지내세요'], ['ko' => '잘']],
                phrases: [
                    'a' => [
                        'words' => ['어떻게', '지내세요', '친구'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'how are you friend', 'correct' => ['how are you', 'friend'], 'extra' => ['mother']],
                            'es' => ['sentence' => 'Cómo estás, amigo', 'correct' => ['cómo estás', 'amigo'], 'extra' => ['madre', 'bien']],
                            'de' => ['sentence' => 'Wie geht es dir, Freund', 'correct' => ['wie geht es dir', 'Freund'], 'extra' => ['Mutter', 'gut']],
                            'fr' => ['sentence' => 'Comment ça va, mon ami', 'correct' => ['comment ça va', 'ami'], 'extra' => ['mère', 'bien']],
                            'ja' => ['sentence' => 'お元気ですか、友達', 'correct' => ['お元気ですか', '友達'], 'extra' => ['母']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '잘', '지냅니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I am well', 'correct' => ['I am', 'well'], 'extra' => ['how are you']],
                            'es' => ['sentence' => 'Estoy bien', 'correct' => ['estoy', 'bien'], 'extra' => ['cómo estás', 'amigo']],
                            'de' => ['sentence' => 'Mir geht es gut', 'correct' => ['ich bin', 'gut'], 'extra' => ['wie geht es dir']],
                            'fr' => ['sentence' => 'Je vais bien', 'correct' => ['je suis', 'bien'], 'extra' => ['comment ça va']],
                            'ja' => ['sentence' => '私は元気です', 'correct' => ['私', 'は', '元気', 'です'], 'extra' => ['お元気ですか']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '어머니는', '잘', '지냅니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'my mother is well', 'correct' => ['my', 'mother', 'is', 'well'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Mi madre está bien', 'correct' => ['mi', 'madre', 'está', 'bien'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Meiner Mutter geht es gut', 'correct' => ['mein', 'Mutter', 'ist', 'gut'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Ma mère va bien', 'correct' => ['ma', 'mère', 'est', 'bien'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '私の母は元気です', 'correct' => ['私の', '母', 'は', '元気', 'です'], 'extra' => ['友達']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 가게 · 공원', 2,
                pictures: [['ko' => '가게', 'img' => 'shop'], ['ko' => '공원', 'img' => 'park']],
                plain: [['ko' => '어디'], ['ko' => '어느']],
                phrases: [
                    'a' => [
                        'words' => ['가게는', '어디입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'where is the shop', 'correct' => ['where', 'is', 'the', 'shop'], 'extra' => ['which']],
                            'es' => ['sentence' => 'Dónde está la tienda', 'correct' => ['dónde', 'está', 'la', 'tienda'], 'extra' => ['cuál', 'parque']],
                            'de' => ['sentence' => 'Wo ist das Geschäft', 'correct' => ['wo', 'ist', 'das', 'Geschäft'], 'extra' => ['welcher', 'Park']],
                            'fr' => ['sentence' => 'Où est le magasin', 'correct' => ['où', 'est', 'le', 'magasin'], 'extra' => ['quel', 'parc']],
                            'ja' => ['sentence' => '店はどこですか', 'correct' => ['店', 'は', 'どこですか'], 'extra' => ['どれ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['어느', '공원'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'which park', 'correct' => ['which', 'park'], 'extra' => ['where']],
                            'es' => ['sentence' => 'Qué parque', 'correct' => ['cuál', 'parque'], 'extra' => ['dónde', 'tienda']],
                            'de' => ['sentence' => 'Welcher Park', 'correct' => ['welcher', 'Park'], 'extra' => ['wo', 'Geschäft']],
                            'fr' => ['sentence' => 'Quel parc', 'correct' => ['quel', 'parc'], 'extra' => ['où', 'magasin']],
                            'ja' => ['sentence' => 'どの公園', 'correct' => ['どの', '公園'], 'extra' => ['どこ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['공원은', '어디입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'where is the park', 'correct' => ['where', 'is', 'the', 'park'], 'extra' => ['which']],
                            'es' => ['sentence' => 'Dónde está el parque', 'correct' => ['dónde', 'está', 'el', 'parque'], 'extra' => ['cuál']],
                            'de' => ['sentence' => 'Wo ist der Park', 'correct' => ['wo', 'ist', 'der', 'Park'], 'extra' => ['welcher']],
                            'fr' => ['sentence' => 'Où est le parc', 'correct' => ['où', 'est', 'le', 'parc'], 'extra' => ['quel']],
                            'ja' => ['sentence' => '公園はどこですか', 'correct' => ['公園', 'は', 'どこですか'], 'extra' => ['どれ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 책 · 사과', 3,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '몇 개'], ['ko' => '더']],
                phrases: [
                    'a' => [
                        'words' => ['책', '몇', '권'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'how many books', 'correct' => ['how many', 'books'], 'extra' => ['more']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libros'], 'extra' => ['más', 'manzana']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Bücher'], 'extra' => ['mehr', 'Apfel']],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien', 'livres'], 'extra' => ['plus', 'pomme']],
                            'ja' => ['sentence' => '本は何冊', 'correct' => ['本', 'は', '何', '冊'], 'extra' => ['もっと']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과와', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'an apple and a book', 'correct' => ['an', 'apple', 'and', 'a', 'book'], 'extra' => ['how many']],
                            'es' => ['sentence' => 'Una manzana y un libro', 'correct' => ['una', 'manzana', 'y', 'un', 'libro'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Ein Apfel und ein Buch', 'correct' => ['ein', 'Apfel', 'und', 'ein', 'Buch'], 'extra' => ['wie viele']],
                            'fr' => ['sentence' => 'Une pomme et un livre', 'correct' => ['une', 'pomme', 'et', 'un', 'livre'], 'extra' => ['combien']],
                            'ja' => ['sentence' => 'りんごと本', 'correct' => ['りんご', 'と', '本'], 'extra' => ['いくつ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['더', '많은', '책'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'more books', 'correct' => ['more', 'books'], 'extra' => ['how many']],
                            'es' => ['sentence' => 'Más libros', 'correct' => ['más', 'libros'], 'extra' => ['cuántos', 'manzana']],
                            'de' => ['sentence' => 'Mehr Bücher', 'correct' => ['mehr', 'Bücher'], 'extra' => ['wie viele', 'Apfel']],
                            'fr' => ['sentence' => 'Plus de livres', 'correct' => ['plus', 'livres'], 'extra' => ['combien', 'pomme']],
                            'ja' => ['sentence' => 'もっと本', 'correct' => ['もっと', '本'], 'extra' => ['いくつ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 학교 · 집', 4,
                pictures: [['ko' => '학교', 'img' => 'school'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '언제'], ['ko' => '왜']],
                phrases: [
                    'a' => [
                        'words' => ['학교는', '언제', '여나요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'when is the school open', 'correct' => ['when', 'is', 'the', 'school', 'open'], 'extra' => ['why']],
                            'es' => ['sentence' => 'Cuándo está abierta la escuela', 'correct' => ['cuándo', 'está', 'la', 'escuela', 'abierto'], 'extra' => ['por qué']],
                            'de' => ['sentence' => 'Wann ist die Schule offen', 'correct' => ['wann', 'ist', 'die', 'Schule', 'offen'], 'extra' => ['warum']],
                            'fr' => ['sentence' => 'Quand l\'école est ouverte', 'correct' => ['quand', 'est', 'le', 'école', 'ouvert'], 'extra' => ['pourquoi']],
                            'ja' => ['sentence' => '学校はいつ開いていますか', 'correct' => ['学校', 'は', 'いつ', '開いています', 'か'], 'extra' => ['なぜ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['왜', '여기에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'why here', 'correct' => ['why', 'here'], 'extra' => ['when']],
                            'es' => ['sentence' => 'Por qué aquí', 'correct' => ['por qué', 'aquí'], 'extra' => ['cuándo', 'escuela']],
                            'de' => ['sentence' => 'Warum hier', 'correct' => ['warum', 'hier'], 'extra' => ['wann', 'Schule']],
                            'fr' => ['sentence' => 'Pourquoi ici', 'correct' => ['pourquoi', 'ici'], 'extra' => ['quand', 'école']],
                            'ja' => ['sentence' => 'なぜここに', 'correct' => ['なぜ', 'ここ', 'に'], 'extra' => ['いつ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['학교와', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the school and the house', 'correct' => ['the', 'school', 'and', 'the', 'house'], 'extra' => ['why']],
                            'es' => ['sentence' => 'La escuela y la casa', 'correct' => ['la', 'escuela', 'y', 'la', 'casa'], 'extra' => ['cuándo']],
                            'de' => ['sentence' => 'Die Schule und das Haus', 'correct' => ['die', 'Schule', 'und', 'das', 'Haus'], 'extra' => ['wann']],
                            'fr' => ['sentence' => 'L\'école et la maison', 'correct' => ['école', 'et', 'la', 'maison'], 'extra' => ['quand']],
                            'ja' => ['sentence' => '学校と家', 'correct' => ['学校', 'と', '家'], 'extra' => ['なぜ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 친구 · 공원', 5,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '공원', 'img' => 'park']],
                plain: [['ko' => '아마도'], ['ko' => '물론']],
                phrases: [
                    'a' => [
                        'words' => ['아마도', '내일'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'maybe tomorrow', 'correct' => ['maybe', 'tomorrow'], 'extra' => ['of course']],
                            'es' => ['sentence' => 'Quizás mañana', 'correct' => ['quizás', 'mañana'], 'extra' => ['por supuesto', 'amigo']],
                            'de' => ['sentence' => 'Vielleicht morgen', 'correct' => ['vielleicht', 'morgen'], 'extra' => ['natürlich', 'Freund']],
                            'fr' => ['sentence' => 'Peut-être demain', 'correct' => ['peut-être', 'demain'], 'extra' => ['bien sûr', 'ami']],
                            'ja' => ['sentence' => 'たぶん明日', 'correct' => ['たぶん', '明日'], 'extra' => ['もちろん']],
                        ],
                    ],
                    'b' => [
                        'words' => ['물론', '제', '친구'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'of course my friend', 'correct' => ['of course', 'my', 'friend'], 'extra' => ['maybe']],
                            'es' => ['sentence' => 'Por supuesto, mi amigo', 'correct' => ['por supuesto', 'mi', 'amigo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Natürlich, mein Freund', 'correct' => ['natürlich', 'mein', 'Freund'], 'extra' => ['vielleicht']],
                            'fr' => ['sentence' => 'Bien sûr, mon ami', 'correct' => ['bien sûr', 'mon', 'ami'], 'extra' => ['peut-être']],
                            'ja' => ['sentence' => 'もちろん、私の友達', 'correct' => ['もちろん', '私の', '友達'], 'extra' => ['たぶん']],
                        ],
                    ],
                    'c' => [
                        'words' => ['아마도', '공원'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'maybe the park', 'correct' => ['maybe', 'the', 'park'], 'extra' => ['of course']],
                            'es' => ['sentence' => 'Quizás el parque', 'correct' => ['quizás', 'el', 'parque'], 'extra' => ['por supuesto']],
                            'de' => ['sentence' => 'Vielleicht der Park', 'correct' => ['vielleicht', 'der', 'Park'], 'extra' => ['natürlich']],
                            'fr' => ['sentence' => 'Peut-être le parc', 'correct' => ['peut-être', 'le', 'parc'], 'extra' => ['bien sûr']],
                            'ja' => ['sentence' => 'たぶん公園', 'correct' => ['たぶん', '公園'], 'extra' => ['もちろん']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
