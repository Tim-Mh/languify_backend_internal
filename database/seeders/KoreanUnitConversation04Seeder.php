<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation04Seeder extends Seeder
{
    private const PICTURES = ['친구' => 'friend', '어머니' => 'mother', '형제' => 'brother', '의사' => 'doctor', '자매' => 'sister', '집' => 'house'];

    /**
     * Korean Conversation, Unit 4, the Korean twin of the English "Talking About Feelings" unit.
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

        $builder->seedUnit($chapter->id, 4, '유닛 4: 감정 이야기하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 친구 · 어머니', 1,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '어머니', 'img' => 'mother']],
                plain: [['ko' => '행복한'], ['ko' => '슬픈']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '행복합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am happy', 'correct' => ['I am', 'happy'], 'extra' => ['sad']],
                            'es' => ['sentence' => 'Estoy feliz', 'correct' => ['soy', 'feliz'], 'extra' => ['triste', 'amigo']],
                            'de' => ['sentence' => 'Ich bin glücklich', 'correct' => ['ich bin', 'glücklich'], 'extra' => ['traurig', 'Freund']],
                            'fr' => ['sentence' => 'Je suis heureux', 'correct' => ['je suis', 'heureux'], 'extra' => ['triste', 'ami']],
                            'ja' => ['sentence' => '私は幸せです', 'correct' => ['私', 'は', '幸せ', 'です'], 'extra' => ['悲しい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '친구는', '슬픕니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend is sad', 'correct' => ['my', 'friend', 'is', 'sad'], 'extra' => ['happy']],
                            'es' => ['sentence' => 'Mi amigo está triste', 'correct' => ['mi', 'amigo', 'está', 'triste'], 'extra' => ['feliz', 'madre']],
                            'de' => ['sentence' => 'Mein Freund ist traurig', 'correct' => ['mein', 'Freund', 'ist', 'traurig'], 'extra' => ['glücklich', 'Mutter']],
                            'fr' => ['sentence' => 'Mon ami est triste', 'correct' => ['mon', 'ami', 'est', 'triste'], 'extra' => ['heureux', 'mère']],
                            'ja' => ['sentence' => '私の友達は悲しいです', 'correct' => ['私の', '友達', 'は', '悲しい', 'です'], 'extra' => ['幸せ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '어머니는', '행복합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my mother is happy', 'correct' => ['my', 'mother', 'is', 'happy'], 'extra' => ['sad']],
                            'es' => ['sentence' => 'Mi madre está feliz', 'correct' => ['mi', 'madre', 'está', 'feliz'], 'extra' => ['triste']],
                            'de' => ['sentence' => 'Meine Mutter ist glücklich', 'correct' => ['meine', 'Mutter', 'ist', 'glücklich'], 'extra' => ['traurig']],
                            'fr' => ['sentence' => 'Ma mère est heureuse', 'correct' => ['ma', 'mère', 'est', 'heureux'], 'extra' => ['triste']],
                            'ja' => ['sentence' => '私の母は幸せです', 'correct' => ['私の', '母', 'は', '幸せ', 'です'], 'extra' => ['悲しい']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 형제 · 의사', 2,
                pictures: [['ko' => '형제', 'img' => 'brother'], ['ko' => '의사', 'img' => 'doctor']],
                plain: [['ko' => '피곤한'], ['ko' => '아픈']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '피곤합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am tired', 'correct' => ['I am', 'tired'], 'extra' => ['sick']],
                            'es' => ['sentence' => 'Estoy cansado', 'correct' => ['soy', 'cansado'], 'extra' => ['enfermo', 'hermano']],
                            'de' => ['sentence' => 'Ich bin müde', 'correct' => ['ich bin', 'müde'], 'extra' => ['krank', 'Bruder']],
                            'fr' => ['sentence' => 'Je suis fatigué', 'correct' => ['je suis', 'fatigué'], 'extra' => ['malade', 'frère']],
                            'ja' => ['sentence' => '私は疲れています', 'correct' => ['私', 'は', '疲れて', 'います'], 'extra' => ['病気']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '형제는', '아픕니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my brother is sick', 'correct' => ['my', 'brother', 'is', 'sick'], 'extra' => ['tired']],
                            'es' => ['sentence' => 'Mi hermano está enfermo', 'correct' => ['mi', 'hermano', 'está', 'enfermo'], 'extra' => ['cansado', 'médico']],
                            'de' => ['sentence' => 'Mein Bruder ist krank', 'correct' => ['mein', 'Bruder', 'ist', 'krank'], 'extra' => ['müde', 'Arzt']],
                            'fr' => ['sentence' => 'Mon frère est malade', 'correct' => ['mon', 'frère', 'est', 'malade'], 'extra' => ['fatigué', 'médecin']],
                            'ja' => ['sentence' => '私の兄弟は病気です', 'correct' => ['私の', '兄弟', 'は', '病気', 'です'], 'extra' => ['疲れた']],
                        ],
                    ],
                    'c' => [
                        'words' => ['의사와', '제', '형제'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the doctor and my brother', 'correct' => ['the', 'doctor', 'and', 'my', 'brother'], 'extra' => ['sick']],
                            'es' => ['sentence' => 'El médico y mi hermano', 'correct' => ['el', 'médico', 'y', 'mi', 'hermano'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Der Arzt und mein Bruder', 'correct' => ['der', 'Arzt', 'und', 'mein', 'Bruder'], 'extra' => ['krank']],
                            'fr' => ['sentence' => 'Le médecin et mon frère', 'correct' => ['le', 'médecin', 'et', 'mon', 'frère'], 'extra' => ['malade']],
                            'ja' => ['sentence' => '医者と私の兄弟', 'correct' => ['医者', 'と', '私の', '兄弟'], 'extra' => ['病気']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 자매 · 친구', 3,
                pictures: [['ko' => '자매', 'img' => 'sister'], ['ko' => '친구', 'img' => 'friend']],
                plain: [['ko' => '기쁜'], ['ko' => '차분한']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '기쁩니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am glad', 'correct' => ['I am', 'glad'], 'extra' => ['calm']],
                            'es' => ['sentence' => 'Estoy contento', 'correct' => ['soy', 'contento'], 'extra' => ['tranquilo', 'hermana']],
                            'de' => ['sentence' => 'Ich bin froh', 'correct' => ['ich bin', 'froh'], 'extra' => ['ruhig', 'Schwester']],
                            'fr' => ['sentence' => 'Je suis content', 'correct' => ['je suis', 'content'], 'extra' => ['calme', 'sœur']],
                            'ja' => ['sentence' => '私は嬉しいです', 'correct' => ['私', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いた']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '자매는', '차분합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my sister is calm', 'correct' => ['my', 'sister', 'is', 'calm'], 'extra' => ['glad']],
                            'es' => ['sentence' => 'Mi hermana está tranquila', 'correct' => ['mi', 'hermana', 'está', 'tranquilo'], 'extra' => ['contento', 'amigo']],
                            'de' => ['sentence' => 'Meine Schwester ist ruhig', 'correct' => ['meine', 'Schwester', 'ist', 'ruhig'], 'extra' => ['froh', 'Freund']],
                            'fr' => ['sentence' => 'Ma sœur est calme', 'correct' => ['ma', 'sœur', 'est', 'calme'], 'extra' => ['content', 'ami']],
                            'ja' => ['sentence' => '私の姉妹は落ち着いています', 'correct' => ['私の', '姉妹', 'は', '落ち着いて', 'います'], 'extra' => ['嬉しい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '친구는', '기쁩니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend is glad', 'correct' => ['my', 'friend', 'is', 'glad'], 'extra' => ['calm']],
                            'es' => ['sentence' => 'Mi amigo está contento', 'correct' => ['mi', 'amigo', 'está', 'contento'], 'extra' => ['tranquilo']],
                            'de' => ['sentence' => 'Mein Freund ist froh', 'correct' => ['mein', 'Freund', 'ist', 'froh'], 'extra' => ['ruhig']],
                            'fr' => ['sentence' => 'Mon ami est content', 'correct' => ['mon', 'ami', 'est', 'content'], 'extra' => ['calme']],
                            'ja' => ['sentence' => '私の友達は嬉しいです', 'correct' => ['私の', '友達', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いた']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 어머니 · 집', 4,
                pictures: [['ko' => '어머니', 'img' => 'mother'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '조금'], ['ko' => '왜냐하면']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '조금', '피곤합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I am a little tired', 'correct' => ['I am', 'a little', 'tired'], 'extra' => ['because']],
                            'es' => ['sentence' => 'Estoy un poco cansado', 'correct' => ['soy', 'un poco', 'cansado'], 'extra' => ['porque', 'madre']],
                            'de' => ['sentence' => 'Ich bin ein bisschen müde', 'correct' => ['ich bin', 'ein bisschen', 'müde'], 'extra' => ['weil', 'Mutter']],
                            'fr' => ['sentence' => 'Je suis un peu fatigué', 'correct' => ['je suis', 'un peu', 'fatigué'], 'extra' => ['parce que', 'mère']],
                            'ja' => ['sentence' => '私は少し疲れています', 'correct' => ['私', 'は', '少し', '疲れて', 'います'], 'extra' => ['なぜなら']],
                        ],
                    ],
                    'b' => [
                        'words' => ['어머니', '때문에', '행복한'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'happy because my mother', 'correct' => ['happy', 'because', 'my', 'mother'], 'extra' => ['a little']],
                            'es' => ['sentence' => 'Feliz porque mi madre', 'correct' => ['feliz', 'porque', 'mi', 'madre'], 'extra' => ['un poco']],
                            'de' => ['sentence' => 'Glücklich weil meine Mutter', 'correct' => ['glücklich', 'weil', 'meine', 'Mutter'], 'extra' => ['ein bisschen']],
                            'fr' => ['sentence' => 'Heureux parce que ma mère', 'correct' => ['heureux', 'parce que', 'ma', 'mère'], 'extra' => ['un peu']],
                            'ja' => ['sentence' => '母がいるから幸せ', 'correct' => ['母', 'が', 'いる', 'から', '幸せ'], 'extra' => ['少し']],
                        ],
                    ],
                    'c' => [
                        'words' => ['집에서', '조금', '슬픈'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a little sad in the house', 'correct' => ['a little', 'sad', 'in', 'the', 'house'], 'extra' => ['because']],
                            'es' => ['sentence' => 'Un poco triste en la casa', 'correct' => ['un poco', 'triste', 'en', 'la', 'casa'], 'extra' => ['porque']],
                            'de' => ['sentence' => 'Ein bisschen traurig im Haus', 'correct' => ['ein bisschen', 'traurig', 'in', 'dem', 'Haus'], 'extra' => ['weil']],
                            'fr' => ['sentence' => 'Un peu triste dans la maison', 'correct' => ['un peu', 'triste', 'dans', 'la', 'maison'], 'extra' => ['parce que']],
                            'ja' => ['sentence' => '家で少し悲しい', 'correct' => ['家', 'で', '少し', '悲しい'], 'extra' => ['なぜなら']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 친구 · 자매', 5,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '자매', 'img' => 'sister']],
                plain: [['ko' => '나는 느낍니다'], ['ko' => '오늘']],
                phrases: [
                    'a' => [
                        'words' => ['오늘', '행복하게', '느낍니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I feel happy today', 'correct' => ['I feel', 'happy', 'today'], 'extra' => ['sad']],
                            'es' => ['sentence' => 'Hoy me siento feliz', 'correct' => ['hoy', 'me siento', 'feliz'], 'extra' => ['triste', 'amigo']],
                            'de' => ['sentence' => 'Ich fühle mich heute glücklich', 'correct' => ['ich fühle mich', 'heute', 'glücklich'], 'extra' => ['traurig', 'Freund']],
                            'fr' => ['sentence' => 'Aujourd\'hui je me sens heureux', 'correct' => ['aujourd\'hui', 'je me sens', 'heureux'], 'extra' => ['triste', 'ami']],
                            'ja' => ['sentence' => '今日は幸せに感じる', 'correct' => ['今日', 'は', '幸せ', 'に', '感じる'], 'extra' => ['悲しい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '자매는', '오늘', '기쁩니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'my sister is glad today', 'correct' => ['my', 'sister', 'is', 'glad', 'today'], 'extra' => ['I feel']],
                            'es' => ['sentence' => 'Mi hermana está contenta hoy', 'correct' => ['mi', 'hermana', 'está', 'contento', 'hoy'], 'extra' => ['me siento']],
                            'de' => ['sentence' => 'Meine Schwester ist heute froh', 'correct' => ['meine', 'Schwester', 'ist', 'heute', 'froh'], 'extra' => ['ich fühle mich']],
                            'fr' => ['sentence' => 'Ma sœur est contente aujourd\'hui', 'correct' => ['ma', 'sœur', 'est', 'content', 'aujourd\'hui'], 'extra' => ['je me sens']],
                            'ja' => ['sentence' => '私の姉妹は今日嬉しいです', 'correct' => ['私の', '姉妹', 'は', '今日', '嬉しい', 'です'], 'extra' => ['私は感じる']],
                        ],
                    ],
                    'c' => [
                        'words' => ['친구와', '있으면', '차분하게', '느낍니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I feel calm with my friend', 'correct' => ['I feel', 'calm', 'with', 'my', 'friend'], 'extra' => ['today']],
                            'es' => ['sentence' => 'Me siento tranquilo con mi amigo', 'correct' => ['me siento', 'tranquilo', 'con', 'mi', 'amigo'], 'extra' => ['hoy']],
                            'de' => ['sentence' => 'Ich fühle mich ruhig mit meinem Freund', 'correct' => ['ich fühle mich', 'ruhig', 'mit', 'mein', 'Freund'], 'extra' => ['heute']],
                            'fr' => ['sentence' => 'Je me sens calme avec mon ami', 'correct' => ['je me sens', 'calme', 'avec', 'mon', 'ami'], 'extra' => ['aujourd\'hui']],
                            'ja' => ['sentence' => '友達といると落ち着いて感じる', 'correct' => ['友達', 'と', 'いる', 'と', '落ち着いて', '感じる'], 'extra' => ['今日']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
