<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation02Seeder extends Seeder
{
    private const PICTURES = [
        'Ami' => 'friend', 'Livre' => 'book', 'Maison' => 'house', 'École' => 'school',
        'Chat' => 'cat', 'Chien' => 'dog', 'Gare' => 'station', 'Parc' => 'park',
    ];

    /**
     * French Chapter 2, Unit 2 — asking questions.
     *
     * Question words are useless on their own, so each one is taught inside a
     * question the learner can actually ask: "comment ça va", "où est la
     * maison", "combien de chats", "quand à la gare". The nouns being asked
     * about are all Chapter 1 vocabulary, which doubles as spaced review.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Asking Questions', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: How Are You?', 1,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Livre', 'img' => 'book']],
                plain: [['fr' => 'Comment'], ['fr' => 'Ça va']],
                phrases: [
                    'a' => [
                        'words' => ['comment', 'ça va'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'How is it going', 'correct' => ['how', 'is it going'], 'extra' => ['friend', 'book']],
                            'es' => ['sentence' => 'Cómo qué tal', 'correct' => ['cómo', 'qué tal'], 'extra' => ['amigo', 'libro']],
                            'de' => ['sentence' => 'Wie geht es', 'correct' => ['wie', 'geht es'], 'extra' => ['Freund', 'Buch']],
                            'ja' => ['sentence' => 'どう元気ですか', 'correct' => ['どう', '元気', 'です', 'か'], 'extra' => ['友達', '本']],
                            'ko' => ['sentence' => '어떻게 잘 지내요', 'correct' => ['어떻게', '잘', '지내요'], 'extra' => ['친구', '책']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ça va', 'bien', 'mon', 'ami'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'It is going well, my friend', 'correct' => ['it is going', 'well', 'my', 'friend'], 'extra' => ['book']],
                            'es' => ['sentence' => 'Qué tal bien, mi amigo', 'correct' => ['qué tal', 'bien', 'mi', 'amigo'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Es geht gut, mein Freund', 'correct' => ['geht es', 'gut', 'mein', 'Freund'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '元気です、私の友達', 'correct' => ['元気', 'です', '私の', '友達'], 'extra' => ['本']],
                            'ko' => ['sentence' => '잘 지내요, 나의 친구', 'correct' => ['잘', '지내요', '나의', '친구'], 'extra' => ['책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['comment', 'est', 'ton', 'livre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'How is your book', 'correct' => ['how', 'is', 'your', 'book'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Cómo es tu libro', 'correct' => ['cómo', 'es', 'tu', 'libro'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Wie ist dein Buch', 'correct' => ['wie', 'ist', 'dein', 'Buch'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => 'あなたの本はどうですか', 'correct' => ['あなたの', '本', 'は', 'どう', 'です', 'か'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '당신의 책은 어떻게', 'correct' => ['당신의', '책은', '어떻게'], 'extra' => ['친구']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Where & Which', 2,
                pictures: [['fr' => 'Maison', 'img' => 'house'], ['fr' => 'École', 'img' => 'school']],
                plain: [['fr' => 'Où'], ['fr' => 'Quel']],
                phrases: [
                    'a' => [
                        'words' => ['où', 'est', 'la', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Where is the house', 'correct' => ['where', 'is', 'the', 'house'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Dónde está la casa', 'correct' => ['dónde', 'está', 'la', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Wo ist das Haus', 'correct' => ['wo', 'ist', 'das', 'Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '家はどこですか', 'correct' => ['家', 'は', 'どこですか'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '집은 어디에 있습니까', 'correct' => ['집은', '어디에', '있습니까'], 'extra' => ['학교']],
                        ],
                    ],
                    'b' => [
                        'words' => ['quel', 'est', 'ton', 'nom'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Which is your name', 'correct' => ['which', 'is', 'your', 'name'], 'extra' => ['where']],
                            'es' => ['sentence' => 'Cuál es tu nombre', 'correct' => ['cuál', 'es', 'tu', 'nombre'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Welcher ist dein Name', 'correct' => ['welcher', 'ist', 'dein', 'Name'], 'extra' => ['wo']],
                            'ja' => ['sentence' => 'あなたの名前はどのですか', 'correct' => ['あなたの', '名前', 'は', 'どの', 'です', 'か'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '당신의 이름은 어떤', 'correct' => ['당신의', '이름은', '어떤'], 'extra' => ['어디']],
                        ],
                    ],
                    'c' => [
                        'words' => ['où', 'est', 'une', 'école'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Where is a school', 'correct' => ['where', 'is', 'a', 'school'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Dónde está una escuela', 'correct' => ['dónde', 'está', 'una', 'escuela'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Wo ist eine Schule', 'correct' => ['wo', 'ist', 'eine', 'Schule'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '学校はどこですか', 'correct' => ['学校', 'は', 'どこですか'], 'extra' => ['家']],
                            'ko' => ['sentence' => '학교는 어디에 있습니까', 'correct' => ['학교는', '어디에', '있습니까'], 'extra' => ['집']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: How Many?', 3,
                pictures: [['fr' => 'Chat', 'img' => 'cat'], ['fr' => 'Chien', 'img' => 'dog']],
                plain: [['fr' => 'Combien'], ['fr' => 'De']],
                phrases: [
                    'a' => [
                        'words' => ['combien', 'de', 'chats'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'How many cats', 'correct' => ['how many', 'cats'], 'extra' => ['dogs', 'why']],
                            'es' => ['sentence' => 'Cuántos gatos', 'correct' => ['cuántos', 'gatos'], 'extra' => ['perros', 'por qué']],
                            'de' => ['sentence' => 'Wie viele Katzen', 'correct' => ['wie viele', 'Katzen'], 'extra' => ['Hunde', 'warum']],
                            'ja' => ['sentence' => 'いくつの猫', 'correct' => ['いくつ', 'の', '猫'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '얼마나 많은 고양이들', 'correct' => ['얼마나', '많은', '고양이들'], 'extra' => ['개들', '왜']],
                        ],
                    ],
                    // Singular here so the picture words (chat, chien) are used,
                    // and the plural in a/c reads as a contrast.
                    'b' => [
                        'words' => ['un', 'chien', 'et', 'un', 'chat'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A dog and a cat', 'correct' => ['a', 'dog', 'and', 'a', 'cat'], 'extra' => ['how many']],
                            'es' => ['sentence' => 'Un perro y un gato', 'correct' => ['un', 'perro', 'y', 'un', 'gato'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Ein Hund und eine Katze', 'correct' => ['ein', 'Hund', 'und', 'eine', 'Katze'], 'extra' => ['wie viele']],
                            'ja' => ['sentence' => '犬と猫', 'correct' => ['犬', 'と', '猫'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '개와 고양이', 'correct' => ['개와', '고양이'], 'extra' => ['얼마나']],
                        ],
                    ],
                    'c' => [
                        'words' => ['combien', 'de', 'chiens', 'et', 'de', 'chats'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'How many dogs and cats', 'correct' => ['how many', 'dogs', 'and', 'cats'], 'extra' => ['books']],
                            'es' => ['sentence' => 'Cuántos perros y gatos', 'correct' => ['cuántos', 'perros', 'y', 'gatos'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Wie viele Hunde und Katzen', 'correct' => ['wie viele', 'Hunde', 'und', 'Katzen'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => 'いくつの犬と猫', 'correct' => ['いくつ', 'の', '犬', 'と', '猫'], 'extra' => ['本']],
                            'ko' => ['sentence' => '얼마나 많은 개들과 고양이들', 'correct' => ['얼마나', '많은', '개들과', '고양이들'], 'extra' => ['책들']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: When & Why', 4,
                pictures: [['fr' => 'Gare', 'img' => 'station'], ['fr' => 'Parc', 'img' => 'park']],
                plain: [['fr' => 'Quand'], ['fr' => 'Pourquoi']],
                phrases: [
                    'a' => [
                        'words' => ['quand', 'à', 'la', 'gare'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'When to the station', 'correct' => ['when', 'to the', 'station'], 'extra' => ['why', 'park']],
                            'es' => ['sentence' => 'Cuándo a la estación', 'correct' => ['cuándo', 'a la', 'estación'], 'extra' => ['por qué', 'parque']],
                            'de' => ['sentence' => 'Wann zum Bahnhof', 'correct' => ['wann', 'zu', 'Bahnhof'], 'extra' => ['warum', 'Park']],
                            'ja' => ['sentence' => 'いつ駅へ', 'correct' => ['いつ', '駅', 'へ'], 'extra' => ['なぜ', '公園']],
                            'ko' => ['sentence' => '언제 역에', 'correct' => ['언제', '역에'], 'extra' => ['왜', '공원']],
                        ],
                    ],
                    'b' => [
                        'words' => ['pourquoi', 'le', 'parc'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Why the park', 'correct' => ['why', 'the', 'park'], 'extra' => ['when', 'station']],
                            'es' => ['sentence' => 'Por qué el parque', 'correct' => ['por qué', 'el', 'parque'], 'extra' => ['cuándo', 'estación']],
                            'de' => ['sentence' => 'Warum der Park', 'correct' => ['warum', 'der', 'Park'], 'extra' => ['wann', 'Bahnhof']],
                            'ja' => ['sentence' => 'なぜ公園', 'correct' => ['なぜ', '公園'], 'extra' => ['いつ', '駅']],
                            'ko' => ['sentence' => '왜 공원', 'correct' => ['왜', '공원'], 'extra' => ['언제', '역']],
                        ],
                    ],
                    'c' => [
                        'words' => ['quand', 'et', 'pourquoi', 'à', 'la', 'gare'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'When and why to the station', 'correct' => ['when', 'and', 'why', 'to the', 'station'], 'extra' => ['park']],
                            'es' => ['sentence' => 'Cuándo y por qué a la estación', 'correct' => ['cuándo', 'y', 'por qué', 'a la', 'estación'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Wann und warum zum Bahnhof', 'correct' => ['wann', 'und', 'warum', 'zu', 'Bahnhof'], 'extra' => ['Park']],
                            'ja' => ['sentence' => 'いつなぜ駅へ', 'correct' => ['いつ', 'なぜ', '駅', 'へ'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '언제 그리고 왜 역에', 'correct' => ['언제', '그리고', '왜', '역에'], 'extra' => ['공원']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Maybe & Of Course', 5,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Peut-être'], ['fr' => 'Bien sûr']],
                phrases: [
                    'a' => [
                        'words' => ['peut-être', 'demain'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Maybe tomorrow', 'correct' => ['maybe', 'tomorrow'], 'extra' => ['of course', 'friend']],
                            'es' => ['sentence' => 'Quizás mañana', 'correct' => ['quizás', 'mañana'], 'extra' => ['por supuesto', 'amigo']],
                            'de' => ['sentence' => 'Vielleicht morgen', 'correct' => ['vielleicht', 'morgen'], 'extra' => ['natürlich', 'Freund']],
                            'ja' => ['sentence' => 'たぶん明日', 'correct' => ['たぶん', '明日'], 'extra' => ['もちろん', '友達']],
                            'ko' => ['sentence' => '아마도 내일', 'correct' => ['아마도', '내일'], 'extra' => ['물론', '친구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bien sûr', 'mon', 'ami'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Of course, my friend', 'correct' => ['of course', 'my', 'friend'], 'extra' => ['maybe']],
                            'es' => ['sentence' => 'Por supuesto, mi amigo', 'correct' => ['por supuesto', 'mi', 'amigo'], 'extra' => ['quizás']],
                            'de' => ['sentence' => 'Natürlich, mein Freund', 'correct' => ['natürlich', 'mein', 'Freund'], 'extra' => ['vielleicht']],
                            'ja' => ['sentence' => 'もちろん、私の友達', 'correct' => ['もちろん', '私の', '友達'], 'extra' => ['たぶん']],
                            'ko' => ['sentence' => '물론, 나의 친구', 'correct' => ['물론', '나의', '친구'], 'extra' => ['아마도']],
                        ],
                    ],
                    'c' => [
                        'words' => ['peut-être', 'dans', 'ma', 'maison'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Maybe in my house', 'correct' => ['maybe', 'in', 'my', 'house'], 'extra' => ['of course']],
                            'es' => ['sentence' => 'Quizás en mi casa', 'correct' => ['quizás', 'en', 'mi', 'casa'], 'extra' => ['por supuesto']],
                            'de' => ['sentence' => 'Vielleicht in meinem Haus', 'correct' => ['vielleicht', 'in', 'meinem', 'Haus'], 'extra' => ['natürlich']],
                            'ja' => ['sentence' => 'たぶん私の家で', 'correct' => ['たぶん', '私の', '家', 'で'], 'extra' => ['もちろん']],
                            'ko' => ['sentence' => '아마도 나의 집에서', 'correct' => ['아마도', '나의', '집에서'], 'extra' => ['물론']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
