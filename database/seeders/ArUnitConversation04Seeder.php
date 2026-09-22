<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitConversation04Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'صديق' => 'friend', 'أم' => 'mother', 'أخ' => 'brother', 'طبيب' => 'doctor',
        'أخت' => 'sister', 'بيت' => 'house', 'قهوة' => 'coffee', 'شاي' => 'tea',
    ];

    /**
     * Arabic Conversation Unit 4.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Talking About Feelings', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Happy & Sad', 1,
                pictures: [['ar' => 'صديق', 'img' => 'friend'], ['ar' => 'أم', 'img' => 'mother']],
                plain: [['ar' => 'أنا'], ['ar' => 'فرح']],
                phrases: [
                    'a' => [
                        'words' => ['أنا', 'فرح'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am happy', 'correct' => ['I am', 'happy'], 'extra' => ['sad', 'friend']],
                            'az' => ['sentence' => 'mən xoşbəxt', 'correct' => ['mən', 'xoşbəxt'], 'extra' => ['kədərli', 'dost']],
                            'fr' => ['sentence' => 'Je suis heureux', 'correct' => ['je suis', 'heureux'], 'extra' => ['triste', 'ami']],
                            'es' => ['sentence' => 'Estoy feliz', 'correct' => ['estoy', 'feliz'], 'extra' => ['triste', 'amigo']],
                            'de' => ['sentence' => 'Ich bin glücklich', 'correct' => ['ich bin', 'glücklich'], 'extra' => ['traurig', 'Freund']],
                            'ja' => ['sentence' => '私は幸せです', 'correct' => ['私', 'は', '幸せ', 'です'], 'extra' => ['悲しい', '友達']],
                            'ko' => ['sentence' => '저는 행복합니다', 'correct' => ['저는', '행복합니다'], 'extra' => ['슬픈', '친구']],
                            'tr' => ['sentence' => 'ben mutluyum', 'correct' => ['ben', 'mutluyum'], 'extra' => ['mutlu', 'üzgün']],
                            'ru' => ['sentence' => 'я счастливый', 'correct' => ['я', 'счастливый'], 'extra' => ['грустный', 'друг']],
                        ],
                    ],
                    'b' => [
                        'words' => ['صديق', 'حزين'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My friend is sad', 'correct' => ['my', 'friend', 'is', 'sad'], 'extra' => ['happy', 'mother']],
                            'az' => ['sentence' => 'mənim dost kədərli', 'correct' => ['mənim', 'dost', 'kədərli'], 'extra' => ['xoşbəxt', 'ana']],
                            'fr' => ['sentence' => 'Mon ami est triste', 'correct' => ['mon', 'ami', 'est', 'triste'], 'extra' => ['heureux', 'mère']],
                            'es' => ['sentence' => 'Mi amigo está triste', 'correct' => ['mi', 'amigo', 'está', 'triste'], 'extra' => ['feliz', 'madre']],
                            'de' => ['sentence' => 'Mein Freund ist traurig', 'correct' => ['mein', 'Freund', 'ist', 'traurig'], 'extra' => ['glücklich', 'Mutter']],
                            'ja' => ['sentence' => '私の友達は悲しいです', 'correct' => ['私の', '友達', 'は', '悲しい', 'です'], 'extra' => ['幸せ', '母']],
                            'ko' => ['sentence' => '제 친구는 슬픕니다', 'correct' => ['제', '친구는', '슬픕니다'], 'extra' => ['행복한', '어머니']],
                            'tr' => ['sentence' => 'arkadaşım üzgün', 'correct' => ['arkadaşım', 'üzgün'], 'extra' => ['mutlu', 'arkadaş']],
                            'ru' => ['sentence' => 'мой друг грустный', 'correct' => ['мой', 'друг', 'грустный'], 'extra' => ['счастливый', 'мама']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أم', 'فرح'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother is happy', 'correct' => ['my', 'mother', 'is', 'happy'], 'extra' => ['sad']],
                            'az' => ['sentence' => 'mənim ana xoşbəxt', 'correct' => ['mənim', 'ana', 'xoşbəxt'], 'extra' => ['kədərli']],
                            'fr' => ['sentence' => 'Ma mère est heureuse', 'correct' => ['ma', 'mère', 'est', 'heureuse'], 'extra' => ['triste']],
                            'es' => ['sentence' => 'Mi madre está feliz', 'correct' => ['mi', 'madre', 'está', 'feliz'], 'extra' => ['triste']],
                            'de' => ['sentence' => 'Meine Mutter ist glücklich', 'correct' => ['meine', 'Mutter', 'ist', 'glücklich'], 'extra' => ['traurig']],
                            'ja' => ['sentence' => '私の母は幸せです', 'correct' => ['私の', '母', 'は', '幸せ', 'です'], 'extra' => ['悲しい']],
                            'ko' => ['sentence' => '제 어머니는 행복합니다', 'correct' => ['제', '어머니는', '행복합니다'], 'extra' => ['슬픈']],
                            'tr' => ['sentence' => 'annem mutlu', 'correct' => ['annem', 'mutlu'], 'extra' => ['üzgün', 'arkadaş']],
                            'ru' => ['sentence' => 'мой мама счастливый', 'correct' => ['мой', 'мама', 'счастливый'], 'extra' => ['грустный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Tired & Sick', 2,
                pictures: [['ar' => 'أخ', 'img' => 'brother'], ['ar' => 'طبيب', 'img' => 'doctor']],
                plain: [['ar' => 'أنا'], ['ar' => 'متعب']],
                phrases: [
                    'a' => [
                        'words' => ['أنا', 'متعب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am tired', 'correct' => ['I am', 'tired'], 'extra' => ['sick', 'brother']],
                            'az' => ['sentence' => 'mən yorğun', 'correct' => ['mən', 'yorğun'], 'extra' => ['xəstə', 'qardaş']],
                            'fr' => ['sentence' => 'Je suis fatigué', 'correct' => ['je suis', 'fatigué'], 'extra' => ['malade', 'frère']],
                            'es' => ['sentence' => 'Estoy cansado', 'correct' => ['estoy', 'cansado'], 'extra' => ['enfermo', 'hermano']],
                            'de' => ['sentence' => 'Ich bin müde', 'correct' => ['ich bin', 'müde'], 'extra' => ['krank', 'Bruder']],
                            'ja' => ['sentence' => '私は疲れています', 'correct' => ['私', 'は', '疲れて', 'います'], 'extra' => ['病気', '兄弟']],
                            'ko' => ['sentence' => '저는 피곤합니다', 'correct' => ['저는', '피곤합니다'], 'extra' => ['아픈', '형제']],
                            'tr' => ['sentence' => 'ben yorgunum', 'correct' => ['ben', 'yorgunum'], 'extra' => ['yorgun', 'hasta']],
                            'ru' => ['sentence' => 'я усталый', 'correct' => ['я', 'усталый'], 'extra' => ['больной', 'брат']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أخ', 'مريض'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My brother is sick', 'correct' => ['my', 'brother', 'is', 'sick'], 'extra' => ['tired', 'doctor']],
                            'az' => ['sentence' => 'mənim qardaş xəstə', 'correct' => ['mənim', 'qardaş', 'xəstə'], 'extra' => ['yorğun', 'həkim']],
                            'fr' => ['sentence' => 'Mon frère est malade', 'correct' => ['mon', 'frère', 'est', 'malade'], 'extra' => ['fatigué', 'médecin']],
                            'es' => ['sentence' => 'Mi hermano está enfermo', 'correct' => ['mi', 'hermano', 'está', 'enfermo'], 'extra' => ['cansado', 'médico']],
                            'de' => ['sentence' => 'Mein Bruder ist krank', 'correct' => ['mein', 'Bruder', 'ist', 'krank'], 'extra' => ['müde', 'Arzt']],
                            'ja' => ['sentence' => '私の兄弟は病気です', 'correct' => ['私の', '兄弟', 'は', '病気', 'です'], 'extra' => ['疲れて', '医者']],
                            'ko' => ['sentence' => '제 형제는 아픕니다', 'correct' => ['제', '형제는', '아픕니다'], 'extra' => ['피곤한', '의사']],
                            'tr' => ['sentence' => 'kardeşim hasta', 'correct' => ['kardeşim', 'hasta'], 'extra' => ['yorgun', 'kardeş']],
                            'ru' => ['sentence' => 'мой брат больной', 'correct' => ['мой', 'брат', 'больной'], 'extra' => ['усталый', 'врач']],
                        ],
                    ],
                    'c' => [
                        'words' => ['طبيب', 'و', 'أخ'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The doctor and my brother', 'correct' => ['the', 'doctor', 'and', 'my', 'brother'], 'extra' => ['sick']],
                            'az' => ['sentence' => 'həkim və mənim qardaş', 'correct' => ['həkim', 'və', 'mənim', 'qardaş'], 'extra' => ['xəstə']],
                            'fr' => ['sentence' => 'Le médecin et mon frère', 'correct' => ['le', 'médecin', 'et', 'mon', 'frère'], 'extra' => ['malade']],
                            'es' => ['sentence' => 'El médico y mi hermano', 'correct' => ['el', 'médico', 'y', 'mi', 'hermano'], 'extra' => ['enfermo']],
                            'de' => ['sentence' => 'Der Arzt und mein Bruder', 'correct' => ['der', 'Arzt', 'und', 'mein', 'Bruder'], 'extra' => ['krank']],
                            'ja' => ['sentence' => '医者と私の兄弟', 'correct' => ['医者', 'と', '私の', '兄弟'], 'extra' => ['病気']],
                            'ko' => ['sentence' => '의사와 제 형제', 'correct' => ['의사와', '제', '형제'], 'extra' => ['아픈']],
                            'tr' => ['sentence' => 'doktor ve kardeşim', 'correct' => ['doktor', 've', 'kardeşim'], 'extra' => ['yorgun', 'hasta']],
                            'ru' => ['sentence' => 'врач и мой брат', 'correct' => ['врач', 'и', 'мой', 'брат'], 'extra' => ['больной']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Glad & Calm', 3,
                pictures: [['ar' => 'أخت', 'img' => 'sister'], ['ar' => 'صديق', 'img' => 'friend']],
                plain: [['ar' => 'أنا'], ['ar' => 'سعيد']],
                phrases: [
                    'a' => [
                        'words' => ['أنا', 'سعيد'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am glad', 'correct' => ['I am', 'glad'], 'extra' => ['calm', 'sister']],
                            'az' => ['sentence' => 'mən şad', 'correct' => ['mən', 'şad'], 'extra' => ['sakit', 'bacı']],
                            'fr' => ['sentence' => 'Je suis content', 'correct' => ['je suis', 'content'], 'extra' => ['calme', 'soeur']],
                            'es' => ['sentence' => 'Estoy contento', 'correct' => ['estoy', 'contento'], 'extra' => ['tranquilo', 'hermana']],
                            'de' => ['sentence' => 'Ich bin froh', 'correct' => ['ich bin', 'froh'], 'extra' => ['ruhig', 'Schwester']],
                            'ja' => ['sentence' => '私は嬉しいです', 'correct' => ['私', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いて', '姉妹']],
                            'ko' => ['sentence' => '저는 기쁩니다', 'correct' => ['저는', '기쁩니다'], 'extra' => ['차분한', '자매']],
                            'tr' => ['sentence' => 'ben memnunum', 'correct' => ['ben', 'memnunum'], 'extra' => ['memnun', 'sakin']],
                            'ru' => ['sentence' => 'я рада', 'correct' => ['я', 'рада'], 'extra' => ['спокойный', 'сестра']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أخت', 'هادئ'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My sister is calm', 'correct' => ['my', 'sister', 'is', 'calm'], 'extra' => ['glad', 'friend']],
                            'az' => ['sentence' => 'mənim bacı sakit', 'correct' => ['mənim', 'bacı', 'sakit'], 'extra' => ['şad', 'dost']],
                            'fr' => ['sentence' => 'Ma soeur est calme', 'correct' => ['ma', 'soeur', 'est', 'calme'], 'extra' => ['content', 'ami']],
                            'es' => ['sentence' => 'Mi hermana está tranquila', 'correct' => ['mi', 'hermana', 'está', 'tranquila'], 'extra' => ['contento', 'amigo']],
                            'de' => ['sentence' => 'Meine Schwester ist ruhig', 'correct' => ['meine', 'Schwester', 'ist', 'ruhig'], 'extra' => ['froh', 'Freund']],
                            'ja' => ['sentence' => '私の姉妹は落ち着いています', 'correct' => ['私の', '姉妹', 'は', '落ち着いて', 'います'], 'extra' => ['嬉しい', '友達']],
                            'ko' => ['sentence' => '제 자매는 차분합니다', 'correct' => ['제', '자매는', '차분합니다'], 'extra' => ['기쁜', '친구']],
                            'tr' => ['sentence' => 'kız kardeşim sakin', 'correct' => ['kız kardeşim', 'sakin'], 'extra' => ['memnun', 'kız kardeş']],
                            'ru' => ['sentence' => 'мой сестра спокойный', 'correct' => ['мой', 'сестра', 'спокойный'], 'extra' => ['рада', 'друг']],
                        ],
                    ],
                    'c' => [
                        'words' => ['صديق', 'سعيد'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My friend is glad', 'correct' => ['my', 'friend', 'is', 'glad'], 'extra' => ['calm']],
                            'az' => ['sentence' => 'mənim dost şad', 'correct' => ['mənim', 'dost', 'şad'], 'extra' => ['sakit']],
                            'fr' => ['sentence' => 'Mon ami est content', 'correct' => ['mon', 'ami', 'est', 'content'], 'extra' => ['calme']],
                            'es' => ['sentence' => 'Mi amigo está contento', 'correct' => ['mi', 'amigo', 'está', 'contento'], 'extra' => ['tranquilo']],
                            'de' => ['sentence' => 'Mein Freund ist froh', 'correct' => ['mein', 'Freund', 'ist', 'froh'], 'extra' => ['ruhig']],
                            'ja' => ['sentence' => '私の友達は嬉しいです', 'correct' => ['私の', '友達', 'は', '嬉しい', 'です'], 'extra' => ['落ち着いて']],
                            'ko' => ['sentence' => '제 친구는 기쁩니다', 'correct' => ['제', '친구는', '기쁩니다'], 'extra' => ['차분한']],
                            'tr' => ['sentence' => 'arkadaşım memnun', 'correct' => ['arkadaşım', 'memnun'], 'extra' => ['sakin', 'kız kardeş']],
                            'ru' => ['sentence' => 'мой друг рада', 'correct' => ['мой', 'друг', 'рада'], 'extra' => ['спокойный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: A Little & Because', 4,
                pictures: [['ar' => 'أم', 'img' => 'mother'], ['ar' => 'بيت', 'img' => 'house']],
                plain: [['ar' => 'أنا'], ['ar' => 'قليل']],
                phrases: [
                    'a' => [
                        'words' => ['أنا', 'قليل', 'متعب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am a little tired', 'correct' => ['I am', 'a little', 'tired'], 'extra' => ['because', 'mother']],
                            'az' => ['sentence' => 'mən az yorğun', 'correct' => ['mən', 'az', 'yorğun'], 'extra' => ['çünki', 'ana']],
                            'fr' => ['sentence' => 'Je suis un peu fatigué', 'correct' => ['je suis', 'un peu', 'fatigué'], 'extra' => ['parce que', 'mère']],
                            'es' => ['sentence' => 'Estoy un poco cansado', 'correct' => ['estoy', 'un poco', 'cansado'], 'extra' => ['porque', 'madre']],
                            'de' => ['sentence' => 'Ich bin ein bisschen müde', 'correct' => ['ich bin', 'ein bisschen', 'müde'], 'extra' => ['weil', 'Mutter']],
                            'ja' => ['sentence' => '私は少し疲れています', 'correct' => ['私', 'は', '少し', '疲れて', 'います'], 'extra' => ['なぜなら', '母']],
                            'ko' => ['sentence' => '저는 조금 피곤합니다', 'correct' => ['저는', '조금', '피곤합니다'], 'extra' => ['왜냐하면', '어머니']],
                            'tr' => ['sentence' => 'ben biraz yorgunum', 'correct' => ['ben', 'biraz', 'yorgunum'], 'extra' => ['çünkü', 'anne']],
                            'ru' => ['sentence' => 'я немного усталый', 'correct' => ['я', 'немного', 'усталый'], 'extra' => ['потому что', 'мама']],
                        ],
                    ],
                    'b' => [
                        'words' => ['فرح', 'لأن', 'أم'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Happy because my mother', 'correct' => ['happy', 'because', 'my', 'mother'], 'extra' => ['a little']],
                            'az' => ['sentence' => 'xoşbəxt çünki mənim ana', 'correct' => ['xoşbəxt', 'çünki', 'mənim', 'ana'], 'extra' => ['az']],
                            'fr' => ['sentence' => 'Heureux parce que ma mère', 'correct' => ['heureux', 'parce que', 'ma', 'mère'], 'extra' => ['un peu']],
                            'es' => ['sentence' => 'Feliz porque mi madre', 'correct' => ['feliz', 'porque', 'mi', 'madre'], 'extra' => ['un poco']],
                            'de' => ['sentence' => 'Glücklich weil meine Mutter', 'correct' => ['glücklich', 'weil', 'meine', 'Mutter'], 'extra' => ['ein bisschen']],
                            'ja' => ['sentence' => '幸せなぜなら私の母', 'correct' => ['幸せ', 'なぜなら', '私の', '母'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '행복한 왜냐하면 제 어머니', 'correct' => ['행복한', '왜냐하면', '제', '어머니'], 'extra' => ['조금']],
                            'tr' => ['sentence' => 'mutlu çünkü annem', 'correct' => ['mutlu', 'çünkü', 'annem'], 'extra' => ['biraz', 'anne']],
                            'ru' => ['sentence' => 'счастливый потому что мой мама', 'correct' => ['счастливый', 'потому что', 'мой', 'мама'], 'extra' => ['немного']],
                        ],
                    ],
                    'c' => [
                        'words' => ['قليل', 'حزين', 'في', 'بيت'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A little sad in the house', 'correct' => ['a little', 'sad', 'in', 'the', 'house'], 'extra' => ['because']],
                            'az' => ['sentence' => 'az kədərli içində ev', 'correct' => ['az', 'kədərli', 'içində', 'ev'], 'extra' => ['çünki']],
                            'fr' => ['sentence' => 'Un peu triste à la maison', 'correct' => ['un peu', 'triste', 'à la', 'maison'], 'extra' => ['parce que']],
                            'es' => ['sentence' => 'Un poco triste en la casa', 'correct' => ['un poco', 'triste', 'en', 'la', 'casa'], 'extra' => ['porque']],
                            'de' => ['sentence' => 'Ein bisschen traurig im Haus', 'correct' => ['ein bisschen', 'traurig', 'im', 'Haus'], 'extra' => ['weil']],
                            'ja' => ['sentence' => '家で少し悲しい', 'correct' => ['家', 'で', '少し', '悲しい'], 'extra' => ['なぜなら']],
                            'ko' => ['sentence' => '집에서 조금 슬픈', 'correct' => ['집에서', '조금', '슬픈'], 'extra' => ['왜냐하면']],
                            'tr' => ['sentence' => 'evde biraz üzgün', 'correct' => ['evde', 'biraz', 'üzgün'], 'extra' => ['çünkü', 'anne']],
                            'ru' => ['sentence' => 'немного грустный в дом', 'correct' => ['немного', 'грустный', 'в', 'дом'], 'extra' => ['потому что']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: I Feel & Today', 5,
                pictures: [['ar' => 'أخت', 'img' => 'sister'], ['ar' => 'صديق', 'img' => 'friend']],
                plain: [['ar' => 'أشعر'], ['ar' => 'فرح']],
                phrases: [
                    'a' => [
                        'words' => ['أشعر', 'فرح', 'اليوم'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I feel happy today', 'correct' => ['I feel', 'happy', 'today'], 'extra' => ['sad', 'friend']],
                            'az' => ['sentence' => 'hiss edirəm xoşbəxt bu gün', 'correct' => ['hiss edirəm', 'xoşbəxt', 'bu gün'], 'extra' => ['kədərli', 'dost']],
                            'fr' => ['sentence' => "Je me sens heureux aujourd'hui", 'correct' => ['je me sens', 'heureux', "aujourd'hui"], 'extra' => ['triste', 'ami']],
                            'es' => ['sentence' => 'Hoy me siento feliz', 'correct' => ['hoy', 'me siento', 'feliz'], 'extra' => ['triste', 'amigo']],
                            'de' => ['sentence' => 'Ich fühle mich heute glücklich', 'correct' => ['ich fühle mich', 'heute', 'glücklich'], 'extra' => ['traurig', 'Freund']],
                            'ja' => ['sentence' => '今日は幸せに感じます', 'correct' => ['今日', 'は', '幸せ', 'に', '感じます'], 'extra' => ['悲しい', '友達']],
                            'ko' => ['sentence' => '오늘 행복하게 느낍니다', 'correct' => ['오늘', '행복하게', '느낍니다'], 'extra' => ['슬픈', '친구']],
                            'tr' => ['sentence' => 'bugün mutlu hissediyorum', 'correct' => ['bugün', 'mutlu', 'hissediyorum'], 'extra' => ['arkadaş', 'kız kardeş']],
                            'ru' => ['sentence' => 'я чувствую счастливый сегодня', 'correct' => ['я', 'чувствую', 'счастливый', 'сегодня'], 'extra' => ['грустный', 'друг']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أخت', 'سعيد', 'اليوم'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My sister is glad today', 'correct' => ['my', 'sister', 'is', 'glad', 'today'], 'extra' => ['I feel']],
                            'az' => ['sentence' => 'mənim bacı şad bu gün', 'correct' => ['mənim', 'bacı', 'şad', 'bu gün'], 'extra' => ['hiss edirəm']],
                            'fr' => ['sentence' => "Ma soeur est contente aujourd'hui", 'correct' => ['ma', 'soeur', 'est', 'contente', "aujourd'hui"], 'extra' => ['je me sens']],
                            'es' => ['sentence' => 'Mi hermana está contenta hoy', 'correct' => ['mi', 'hermana', 'está', 'contenta', 'hoy'], 'extra' => ['me siento']],
                            'de' => ['sentence' => 'Meine Schwester ist heute froh', 'correct' => ['meine', 'Schwester', 'ist', 'heute', 'froh'], 'extra' => ['ich fühle mich']],
                            'ja' => ['sentence' => '私の姉妹は今日嬉しいです', 'correct' => ['私の', '姉妹', 'は', '今日', '嬉しい', 'です'], 'extra' => ['感じます']],
                            'ko' => ['sentence' => '제 자매는 오늘 기쁩니다', 'correct' => ['제', '자매는', '오늘', '기쁩니다'], 'extra' => ['느낍니다']],
                            'tr' => ['sentence' => 'kız kardeşim bugün memnun', 'correct' => ['kız kardeşim', 'bugün', 'memnun'], 'extra' => ['hissediyorum', 'arkadaş']],
                            'ru' => ['sentence' => 'мой сестра рада сегодня', 'correct' => ['мой', 'сестра', 'рада', 'сегодня'], 'extra' => ['я', 'чувствую']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أشعر', 'هادئ', 'مع', 'صديق'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I feel calm with my friend', 'correct' => ['I feel', 'calm', 'with', 'my', 'friend'], 'extra' => ['today']],
                            'az' => ['sentence' => 'hiss edirəm sakit ilə mənim dost', 'correct' => ['hiss edirəm', 'sakit', 'ilə', 'mənim', 'dost'], 'extra' => ['bu gün']],
                            'fr' => ['sentence' => 'Je me sens calme avec mon ami', 'correct' => ['je me sens', 'calme', 'avec', 'mon', 'ami'], 'extra' => ["aujourd'hui"]],
                            'es' => ['sentence' => 'Me siento tranquilo con mi amigo', 'correct' => ['me siento', 'tranquilo', 'con', 'mi', 'amigo'], 'extra' => ['hoy']],
                            'de' => ['sentence' => 'Ich fühle mich ruhig mit meinem Freund', 'correct' => ['ich fühle mich', 'ruhig', 'mit', 'meinem', 'Freund'], 'extra' => ['heute']],
                            'ja' => ['sentence' => '私は友達と落ち着いて感じます', 'correct' => ['私', 'は', '友達', 'と', '落ち着いて', '感じます'], 'extra' => ['今日']],
                            'ko' => ['sentence' => '저는 친구와 차분하게 느낍니다', 'correct' => ['저는', '친구와', '차분하게', '느낍니다'], 'extra' => ['오늘']],
                            'tr' => ['sentence' => 'arkadaşımla sakin hissediyorum', 'correct' => ['arkadaşımla', 'sakin', 'hissediyorum'], 'extra' => ['bugün', 'arkadaş']],
                            'ru' => ['sentence' => 'я чувствую спокойный с мой друг', 'correct' => ['я', 'чувствую', 'спокойный', 'с', 'мой', 'друг'], 'extra' => ['сегодня']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
