<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation04Seeder extends Seeder
{
    private const PICTURES = [
        'Friend' => 'friend', 'Mother' => 'mother', 'Brother' => 'brother', 'Sister' => 'sister',
        'Doctor' => 'doctor', 'House' => 'house',
    ];

    /**
     * English Chapter 2, Unit 4 — talking about feelings.
     *
     * Feelings are abstract, so each lesson pairs a pair of adjectives (happy,
     * sad, tired, sick, glad, calm) with a person from Chapter 1 to feel them,
     * and closes on "I feel ... because ..." so the learner can say why.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Talking About Feelings', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Happy & Sad', 1,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Mother', 'img' => 'mother']],
                plain: [['en' => 'Happy'], ['en' => 'Sad']],
                phrases: [
                    'a' => [
                        'words' => ['I am', 'happy'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Estoy feliz', 'correct' => ['soy', 'feliz'], 'extra' => ['triste', 'amigo']],
                            'de' => ['sentence' => 'Ich bin glücklich', 'correct' => ['ich bin', 'glücklich'], 'extra' => ['traurig', 'Freund']],
                            'ja' => ['sentence' => '私は幸せです', 'correct' => ['私', 'は', '幸せ', 'です'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '저는 행복합니다', 'correct' => ['저는', '행복합니다'], 'extra' => ['슬픈']],
                            'fr' => ['sentence' => 'Je suis heureux', 'correct' => ['je suis', 'heureux'], 'extra' => ['triste', 'ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'friend', 'is', 'sad'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo está triste', 'correct' => ['mi', 'amigo', 'está', 'triste'], 'extra' => ['feliz', 'madre']],
                            'de' => ['sentence' => 'Mein Freund ist traurig', 'correct' => ['mein', 'Freund', 'ist', 'traurig'], 'extra' => ['glücklich', 'Mutter']],
                            'ja' => ['sentence' => '私の友達は悲しいです', 'correct' => ['私の', '友達', 'は', '悲しい', 'です'], 'extra' => ['幸せ']],
                            'ko' => ['sentence' => '나의 친구는 슬픕니다', 'correct' => ['나의', '친구는', '슬픕니다'], 'extra' => ['행복한']],
                            'fr' => ['sentence' => 'Mon ami est triste', 'correct' => ['mon', 'ami', 'est', 'triste'], 'extra' => ['heureux', 'mère']],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'mother', 'is', 'happy'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi madre está feliz', 'correct' => ['mi', 'madre', 'está', 'feliz'], 'extra' => ['triste']],
                            'de' => ['sentence' => 'Meine Mutter ist glücklich', 'correct' => ['meine', 'Mutter', 'ist', 'glücklich'], 'extra' => ['traurig']],
                            'ja' => ['sentence' => '私の母は幸せです', 'correct' => ['私の', '母', 'は', '幸せ', 'です'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '나의 어머니는 행복합니다', 'correct' => ['나의', '어머니는', '행복합니다'], 'extra' => ['슬픈']],
                            'fr' => ['sentence' => 'Ma mère est heureuse', 'correct' => ['ma', 'mère', 'est', 'heureux'], 'extra' => ['triste']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Tired & Sick', 2,
                pictures: [['en' => 'Brother', 'img' => 'brother'], ['en' => 'Doctor', 'img' => 'doctor']],
                plain: [['en' => 'Tired'], ['en' => 'Sick']],
                phrases: [
                    'a' => [
                        'words' => ['I am', 'tired'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Estoy cansado', 'correct' => ['soy', 'cansado'], 'extra' => ['enfermo', 'hermano']],
                            'de' => ['sentence' => 'Ich bin müde', 'correct' => ['ich bin', 'müde'], 'extra' => ['krank', 'Bruder']],
                            'ja' => ['sentence' => '私は疲れています', 'correct' => ['私', 'は', '疲れて', 'います'], 'extra' => ['病気']],
                            'ko' => ['sentence' => '저는 피곤합니다', 'correct' => ['저는', '피곤합니다'], 'extra' => ['아픈']],
                            'fr' => ['sentence' => 'Je suis fatigué', 'correct' => ['je suis', 'fatigué'], 'extra' => ['malade', 'frère']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'brother', 'is', 'sick'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi hermano está enfermo', 'correct' => ['mi', 'hermano', 'está', 'enfermo'], 'extra' => ['cansado', 'médico']],
                            'de' => ['sentence' => 'Mein Bruder ist krank', 'correct' => ['mein', 'Bruder', 'ist', 'krank'], 'extra' => ['müde', 'Arzt']],
                            'ja' => ['sentence' => '私の兄弟は病気です', 'correct' => ['私の', '兄弟', 'は', '病気', 'です'], 'extra' => ['疲れた']],
                            'ko' => ['sentence' => '나의 형제는 아픕니다', 'correct' => ['나의', '형제는', '아픕니다'], 'extra' => ['피곤한']],
                            'fr' => ['sentence' => 'Mon frère est malade', 'correct' => ['mon', 'frère', 'est', 'malade'], 'extra' => ['fatigué', 'médecin']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'doctor', 'and', 'my', 'brother'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El médico y mi hermano', 'correct' => ['el', 'médico', 'y', 'mi', 'hermano'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Der Arzt und mein Bruder', 'correct' => ['der', 'Arzt', 'und', 'mein', 'Bruder'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '医者と私の兄弟', 'correct' => ['医者', 'と', '私の', '兄弟'], 'extra' => ['病気']],
                            'ko' => ['sentence' => '의사와 나의 형제', 'correct' => ['의사와', '나의', '형제'], 'extra' => ['아픈']],
                            'fr' => ['sentence' => 'Le médecin et mon frère', 'correct' => ['le', 'médecin', 'et', 'mon', 'frère'], 'extra' => ['malade']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Glad & Calm', 3,
                pictures: [['en' => 'Sister', 'img' => 'sister'], ['en' => 'Friend', 'img' => 'friend']],
                plain: [['en' => 'Glad'], ['en' => 'Calm']],
                phrases: [
                    'a' => [
                        'words' => ['I am', 'glad'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Estoy contento', 'correct' => ['soy', 'contento'], 'extra' => ['tranquilo', 'hermana']],
                            'de' => ['sentence' => 'Ich bin froh', 'correct' => ['ich bin', 'froh'], 'extra' => ['ruhig', 'Schwester']],
                            'ja' => ['sentence' => '私は嬉しいです', 'correct' => ['私', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いた']],
                            'ko' => ['sentence' => '저는 기쁩니다', 'correct' => ['저는', '기쁩니다'], 'extra' => ['차분한']],
                            'fr' => ['sentence' => 'Je suis content', 'correct' => ['je suis', 'content'], 'extra' => ['calme', 'sœur']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'sister', 'is', 'calm'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi hermana está tranquila', 'correct' => ['mi', 'hermana', 'está', 'tranquilo'], 'extra' => ['contento', 'amigo']],
                            'de' => ['sentence' => 'Meine Schwester ist ruhig', 'correct' => ['meine', 'Schwester', 'ist', 'ruhig'], 'extra' => ['froh', 'Freund']],
                            'ja' => ['sentence' => '私の姉妹は落ち着いています', 'correct' => ['私の', '姉妹', 'は', '落ち着いて', 'います'], 'extra' => ['嬉しい']],
                            'ko' => ['sentence' => '나의 자매는 차분합니다', 'correct' => ['나의', '자매는', '차분합니다'], 'extra' => ['기쁜']],
                            'fr' => ['sentence' => 'Ma sœur est calme', 'correct' => ['ma', 'sœur', 'est', 'calme'], 'extra' => ['content', 'ami']],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'friend', 'is', 'glad'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo está contento', 'correct' => ['mi', 'amigo', 'está', 'contento'], 'extra' => ['tranquilo']],
                            'de' => ['sentence' => 'Mein Freund ist froh', 'correct' => ['mein', 'Freund', 'ist', 'froh'], 'extra' => ['ruhig']],
                            'ja' => ['sentence' => '私の友達は嬉しいです', 'correct' => ['私の', '友達', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いた']],
                            'ko' => ['sentence' => '나의 친구는 기쁩니다', 'correct' => ['나의', '친구는', '기쁩니다'], 'extra' => ['차분한']],
                            'fr' => ['sentence' => 'Mon ami est content', 'correct' => ['mon', 'ami', 'est', 'content'], 'extra' => ['calme']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: A Little & Because', 4,
                pictures: [['en' => 'Mother', 'img' => 'mother'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'A little'], ['en' => 'Because']],
                phrases: [
                    'a' => [
                        'words' => ['I am', 'a little', 'tired'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Estoy un poco cansado', 'correct' => ['soy', 'un poco', 'cansado'], 'extra' => ['porque', 'madre']],
                            'de' => ['sentence' => 'Ich bin ein bisschen müde', 'correct' => ['ich bin', 'ein bisschen', 'müde'], 'extra' => ['weil', 'Mutter']],
                            'ja' => ['sentence' => '私は少し疲れています', 'correct' => ['私', 'は', '少し', '疲れて', 'います'], 'extra' => ['なぜなら']],
                            'ko' => ['sentence' => '저는 조금 피곤합니다', 'correct' => ['저는', '조금', '피곤합니다'], 'extra' => ['왜냐하면']],
                            'fr' => ['sentence' => 'Je suis un peu fatigué', 'correct' => ['je suis', 'un peu', 'fatigué'], 'extra' => ['parce que', 'mère']],
                        ],
                    ],
                    'b' => [
                        'words' => ['happy', 'because', 'my', 'mother'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Feliz porque mi madre', 'correct' => ['feliz', 'porque', 'mi', 'madre'], 'extra' => ['un poco']],
                            'de' => ['sentence' => 'Glücklich weil meine Mutter', 'correct' => ['glücklich', 'weil', 'meine', 'Mutter'], 'extra' => ['ein bisschen']],
                            'ja' => ['sentence' => '母がいるから幸せ', 'correct' => ['母', 'が', 'いる', 'から', '幸せ'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '어머니 때문에 행복한', 'correct' => ['어머니', '때문에', '행복한'], 'extra' => ['조금']],
                            'fr' => ['sentence' => 'Heureux parce que ma mère', 'correct' => ['heureux', 'parce que', 'ma', 'mère'], 'extra' => ['un peu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a little', 'sad', 'in', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Un poco triste en la casa', 'correct' => ['un poco', 'triste', 'en', 'la', 'casa'], 'extra' => ['porque']],
                            'de' => ['sentence' => 'Ein bisschen traurig im Haus', 'correct' => ['ein bisschen', 'traurig', 'in', 'dem', 'Haus'], 'extra' => ['weil']],
                            'ja' => ['sentence' => '家で少し悲しい', 'correct' => ['家', 'で', '少し', '悲しい'], 'extra' => ['なぜなら']],
                            'ko' => ['sentence' => '집에서 조금 슬픈', 'correct' => ['집에서', '조금', '슬픈'], 'extra' => ['왜냐하면']],
                            'fr' => ['sentence' => 'Un peu triste dans la maison', 'correct' => ['un peu', 'triste', 'dans', 'la', 'maison'], 'extra' => ['parce que']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: How I Feel Today', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Sister', 'img' => 'sister']],
                plain: [['en' => 'I feel'], ['en' => 'Today']],
                phrases: [
                    'a' => [
                        'words' => ['I feel', 'happy', 'today'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Hoy me siento feliz', 'correct' => ['hoy', 'me siento', 'feliz'], 'extra' => ['triste', 'amigo']],
                            'de' => ['sentence' => 'Ich fühle mich heute glücklich', 'correct' => ['ich fühle mich', 'heute', 'glücklich'], 'extra' => ['traurig', 'Freund']],
                            'ja' => ['sentence' => '今日は幸せに感じる', 'correct' => ['今日', 'は', '幸せ', 'に', '感じる'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '오늘 행복하게 느낍니다', 'correct' => ['오늘', '행복하게', '느낍니다'], 'extra' => ['슬픈']],
                            'fr' => ['sentence' => "Aujourd'hui je me sens heureux", 'correct' => ['je me sens', 'heureux', "aujourd'hui"], 'extra' => ['triste', 'ami']],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'sister', 'is', 'glad', 'today'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi hermana está contenta hoy', 'correct' => ['mi', 'hermana', 'está', 'contento', 'hoy'], 'extra' => ['me siento']],
                            'de' => ['sentence' => 'Meine Schwester ist heute froh', 'correct' => ['meine', 'Schwester', 'ist', 'heute', 'froh'], 'extra' => ['ich fühle mich']],
                            'ja' => ['sentence' => '私の姉妹は今日嬉しいです', 'correct' => ['私の', '姉妹', 'は', '今日', '嬉しい', 'です'], 'extra' => ['私は感じる']],
                            'ko' => ['sentence' => '나의 자매는 오늘 기쁩니다', 'correct' => ['나의', '자매는', '오늘', '기쁩니다'], 'extra' => ['나는 느낍니다']],
                            'fr' => ['sentence' => "Ma sœur est contente aujourd'hui", 'correct' => ['ma', 'sœur', 'est', 'content', "aujourd'hui"], 'extra' => ['je me sens']],
                        ],
                    ],
                    'c' => [
                        'words' => ['I feel', 'calm', 'with', 'my', 'friend'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Me siento tranquilo con mi amigo', 'correct' => ['me siento', 'tranquilo', 'con', 'mi', 'amigo'], 'extra' => ['hoy']],
                            'de' => ['sentence' => 'Ich fühle mich ruhig mit meinem Freund', 'correct' => ['ich fühle mich', 'ruhig', 'mit', 'mein', 'Freund'], 'extra' => ['heute']],
                            'ja' => ['sentence' => '友達といると落ち着いて感じる', 'correct' => ['友達', 'と', 'いる', 'と', '落ち着いて', '感じる'], 'extra' => ['今日']],
                            'ko' => ['sentence' => '친구와 있으면 차분하게 느낍니다', 'correct' => ['친구와', '있으면', '차분하게', '느낍니다'], 'extra' => ['오늘']],
                            'fr' => ['sentence' => 'Je me sens calme avec mon ami', 'correct' => ['je me sens', 'calme', 'avec', 'mon', 'ami'], 'extra' => ["aujourd'hui"]],
                        ],
                    ],
                ],
            ),
        ];
    }
}
