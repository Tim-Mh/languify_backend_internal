<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner03Seeder extends Seeder
{
    private const PICTURES = ['어머니' => 'mother', '아버지' => 'father', '형제' => 'brother', '자매' => 'sister', '선생님' => 'teacher', '의사' => 'doctor', '친구' => 'friend', '이웃' => 'neighbor'];

    /**
     * Korean Chapter 1 (Beginner), Unit 3, the Korean twin of the English
     * "Unit 3: Family & People" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, '유닛 3: 가족과 사람', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 어머니 · 아버지', 1,
                pictures: [['ko' => '어머니', 'img' => 'mother'], ['ko' => '아버지', 'img' => 'father']],
                plain: [['ko' => '나의'], ['ko' => '이분은']],
                phrases: [
                    'a' => [
                        'words' => ['제', '어머니'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my mother', 'correct' => ['my', 'mother'], 'extra' => ['father']],
                            'az' => ['sentence' => 'mənim ana', 'correct' => ['mənim', 'ana'], 'extra' => ['ata']],
                            'ar' => ['sentence' => 'أم', 'correct' => ['أم'], 'extra' => ['أب']],
                            'ru' => ['sentence' => 'мой мама', 'correct' => ['мой', 'мама'], 'extra' => ['папа']],
                            'es' => ['sentence' => 'Mi madre', 'correct' => ['mi', 'madre'], 'extra' => ['padre', 'este es']],
                            'de' => ['sentence' => 'Meine Mutter', 'correct' => ['meine', 'Mutter'], 'extra' => ['Vater', 'das ist']],
                            'fr' => ['sentence' => 'Ma mère', 'correct' => ['ma', 'mère'], 'extra' => ['père', 'c\'est']],
                            'ja' => ['sentence' => '私の母', 'correct' => ['私の', '母'], 'extra' => ['父']],
                            'tr' => ['sentence' => 'annem', 'correct' => ['annem'], 'extra' => ['baba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['이분은', '제', '아버지입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'this is my father', 'correct' => ['this is', 'my', 'father'], 'extra' => ['mother']],
                            'az' => ['sentence' => 'bu mənim ata', 'correct' => ['bu', 'mənim', 'ata'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'هذا أب', 'correct' => ['هذا', 'أب'], 'extra' => ['أم']],
                            'ru' => ['sentence' => 'это мой папа', 'correct' => ['это', 'мой', 'папа'], 'extra' => ['мама']],
                            'es' => ['sentence' => 'Este es mi padre', 'correct' => ['este es', 'mi', 'padre'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Das ist mein Vater', 'correct' => ['das ist', 'mein', 'Vater'], 'extra' => ['Mutter']],
                            'fr' => ['sentence' => 'C\'est mon père', 'correct' => ['c\'est', 'mon', 'père'], 'extra' => ['mère']],
                            'ja' => ['sentence' => 'これは私の父です', 'correct' => ['これは', '私の', '父', 'です'], 'extra' => ['母']],
                            'tr' => ['sentence' => 'bu benim babam', 'correct' => ['bu', 'benim', 'babam'], 'extra' => ['anne']],
                        ],
                    ],
                    'c' => [
                        'words' => ['어머니와', '아버지'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my mother and my father', 'correct' => ['my', 'mother', 'and', 'my', 'father'], 'extra' => ['this is']],
                            'az' => ['sentence' => 'mənim ana və mənim ata', 'correct' => ['mənim', 'ana', 'və', 'mənim', 'ata'], 'extra' => ['bu']],
                            'ar' => ['sentence' => 'أم و أب', 'correct' => ['أم', 'و', 'أب'], 'extra' => ['هذا']],
                            'ru' => ['sentence' => 'мой мама и мой папа', 'correct' => ['мой', 'мама', 'и', 'мой', 'папа'], 'extra' => ['это']],
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['este es']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['das ist']],
                            'fr' => ['sentence' => 'Ma mère et mon père', 'correct' => ['ma', 'mère', 'et', 'mon', 'père'], 'extra' => ['c\'est']],
                            'ja' => ['sentence' => '母と父', 'correct' => ['母', 'と', '父'], 'extra' => ['これは']],
                            'tr' => ['sentence' => 'annem ve babam', 'correct' => ['annem', 've', 'babam'], 'extra' => ['bu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 형제 · 자매', 2,
                pictures: [['ko' => '형제', 'img' => 'brother'], ['ko' => '자매', 'img' => 'sister']],
                plain: [['ko' => '그는'], ['ko' => '그녀는']],
                phrases: [
                    'a' => [
                        'words' => ['그는', '제', '형제입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'he is my brother', 'correct' => ['he is', 'my', 'brother'], 'extra' => ['sister']],
                            'az' => ['sentence' => 'o mənim qardaş', 'correct' => ['o', 'mənim', 'qardaş'], 'extra' => ['bacı']],
                            'ar' => ['sentence' => 'هو أخ', 'correct' => ['هو', 'أخ'], 'extra' => ['أخت']],
                            'ru' => ['sentence' => 'он мой брат', 'correct' => ['он', 'мой', 'брат'], 'extra' => ['сестра']],
                            'es' => ['sentence' => 'Él es mi hermano', 'correct' => ['él es', 'mi', 'hermano'], 'extra' => ['hermana', 'ella es']],
                            'de' => ['sentence' => 'Er ist mein Bruder', 'correct' => ['er ist', 'mein', 'Bruder'], 'extra' => ['Schwester', 'sie ist']],
                            'fr' => ['sentence' => 'C\'est mon frère', 'correct' => ['il est', 'mon', 'frère'], 'extra' => ['sœur', 'elle est']],
                            'ja' => ['sentence' => '彼は私の兄弟です', 'correct' => ['彼は', '私の', '兄弟', 'です'], 'extra' => ['姉妹']],
                            'tr' => ['sentence' => 'o benim erkek kardeşim', 'correct' => ['o', 'benim', 'erkek', 'kardeşim'], 'extra' => ['kız kardeş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그녀는', '제', '자매입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'she is my sister', 'correct' => ['she is', 'my', 'sister'], 'extra' => ['brother']],
                            'az' => ['sentence' => 'o qadın mənim bacı', 'correct' => ['o qadın', 'mənim', 'bacı'], 'extra' => ['qardaş']],
                            'ar' => ['sentence' => 'هي أخت', 'correct' => ['هي', 'أخت'], 'extra' => ['أخ']],
                            'ru' => ['sentence' => 'она мой сестра', 'correct' => ['она', 'мой', 'сестра'], 'extra' => ['брат']],
                            'es' => ['sentence' => 'Ella es mi hermana', 'correct' => ['ella es', 'mi', 'hermana'], 'extra' => ['hermano', 'él es']],
                            'de' => ['sentence' => 'Sie ist meine Schwester', 'correct' => ['sie ist', 'meine', 'Schwester'], 'extra' => ['Bruder', 'er ist']],
                            'fr' => ['sentence' => 'Elle est ma sœur', 'correct' => ['elle est', 'ma', 'sœur'], 'extra' => ['frère', 'il est']],
                            'ja' => ['sentence' => '彼女は私の姉妹です', 'correct' => ['彼女は', '私の', '姉妹', 'です'], 'extra' => ['兄弟']],
                            'tr' => ['sentence' => 'o benim kız kardeşim', 'correct' => ['o', 'benim', 'kız', 'kardeşim'], 'extra' => ['erkek kardeş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['형제와', '자매'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my brother and my sister', 'correct' => ['my', 'brother', 'and', 'my', 'sister'], 'extra' => ['he is']],
                            'az' => ['sentence' => 'mənim qardaş və mənim bacı', 'correct' => ['mənim', 'qardaş', 'və', 'mənim', 'bacı'], 'extra' => ['o']],
                            'ar' => ['sentence' => 'أخ و أخت', 'correct' => ['أخ', 'و', 'أخت'], 'extra' => ['هو']],
                            'ru' => ['sentence' => 'мой брат и мой сестра', 'correct' => ['мой', 'брат', 'и', 'мой', 'сестра'], 'extra' => ['он']],
                            'es' => ['sentence' => 'Mi hermano y mi hermana', 'correct' => ['mi', 'hermano', 'y', 'mi', 'hermana'], 'extra' => ['ella es']],
                            'de' => ['sentence' => 'Mein Bruder und meine Schwester', 'correct' => ['mein', 'Bruder', 'und', 'meine', 'Schwester'], 'extra' => ['sie ist']],
                            'fr' => ['sentence' => 'Mon frère et ma sœur', 'correct' => ['mon', 'frère', 'et', 'ma', 'sœur'], 'extra' => ['elle est']],
                            'ja' => ['sentence' => '兄弟と姉妹', 'correct' => ['兄弟', 'と', '姉妹'], 'extra' => ['彼は']],
                            'tr' => ['sentence' => 'erkek kardeşim ve kız kardeşim', 'correct' => ['erkek', 'kardeşim', 've', 'kız', 'kardeşim'], 'extra' => ['o']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 선생님 · 의사', 3,
                pictures: [['ko' => '선생님', 'img' => 'teacher'], ['ko' => '의사', 'img' => 'doctor']],
                plain: [['ko' => '입니다'], ['ko' => '누구']],
                phrases: [
                    'a' => [
                        'words' => ['누가', '선생님입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'who is the teacher', 'correct' => ['who', 'is', 'the', 'teacher'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'kim müəllim', 'correct' => ['kim', 'müəllim'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'مَن معلم', 'correct' => ['مَن', 'معلم'], 'extra' => ['طبيب']],
                            'ru' => ['sentence' => 'кто учитель', 'correct' => ['кто', 'учитель'], 'extra' => ['врач']],
                            'es' => ['sentence' => 'Quién es el profesor', 'correct' => ['quién', 'es', 'el', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Wer ist der Lehrer', 'correct' => ['wer', 'ist', 'der', 'Lehrer'], 'extra' => ['Arzt']],
                            'fr' => ['sentence' => 'Qui est le professeur', 'correct' => ['qui', 'est', 'le', 'professeur'], 'extra' => ['médecin']],
                            'ja' => ['sentence' => '先生は誰ですか', 'correct' => ['先生', 'は', '誰', 'です', 'か'], 'extra' => ['医者']],
                            'tr' => ['sentence' => 'öğretmen kim', 'correct' => ['öğretmen', 'kim'], 'extra' => ['doktor']],
                        ],
                    ],
                    'b' => [
                        'words' => ['의사는', '여기', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the doctor is here', 'correct' => ['the', 'doctor', 'is', 'here'], 'extra' => ['sir']],
                            'az' => ['sentence' => 'həkim burada', 'correct' => ['həkim', 'burada'], 'extra' => ['cənab']],
                            'ar' => ['sentence' => 'طبيب هنا', 'correct' => ['طبيب', 'هنا'], 'extra' => ['سيدي']],
                            'ru' => ['sentence' => 'врач здесь', 'correct' => ['врач', 'здесь'], 'extra' => ['господин']],
                            'es' => ['sentence' => 'El médico está aquí', 'correct' => ['el', 'médico', 'es', 'aquí'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Der Arzt ist hier', 'correct' => ['der', 'Arzt', 'ist', 'hier'], 'extra' => ['Lehrer']],
                            'fr' => ['sentence' => 'Le médecin est ici', 'correct' => ['le', 'médecin', 'est', 'ici'], 'extra' => ['professeur']],
                            'ja' => ['sentence' => '医者はここにいます', 'correct' => ['医者', 'は', 'ここ', 'に', 'います'], 'extra' => ['先生']],
                            'tr' => ['sentence' => 'doktor burada', 'correct' => ['doktor', 'burada'], 'extra' => ['beyefendi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['선생님과', '의사'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the teacher and the doctor', 'correct' => ['the', 'teacher', 'and', 'the', 'doctor'], 'extra' => ['who']],
                            'az' => ['sentence' => 'müəllim və həkim', 'correct' => ['müəllim', 'və', 'həkim'], 'extra' => ['kim']],
                            'ar' => ['sentence' => 'معلم و طبيب', 'correct' => ['معلم', 'و', 'طبيب'], 'extra' => ['مَن']],
                            'ru' => ['sentence' => 'учитель и врач', 'correct' => ['учитель', 'и', 'врач'], 'extra' => ['кто']],
                            'es' => ['sentence' => 'El profesor y el médico', 'correct' => ['el', 'profesor', 'y', 'el', 'médico'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Der Lehrer und der Arzt', 'correct' => ['der', 'Lehrer', 'und', 'der', 'Arzt'], 'extra' => ['wer']],
                            'fr' => ['sentence' => 'Le professeur et le médecin', 'correct' => ['le', 'professeur', 'et', 'le', 'médecin'], 'extra' => ['qui']],
                            'ja' => ['sentence' => '先生と医者', 'correct' => ['先生', 'と', '医者'], 'extra' => ['誰']],
                            'tr' => ['sentence' => 'öğretmen ve doktor', 'correct' => ['öğretmen', 've', 'doktor'], 'extra' => ['kim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 친구 · 이웃', 4,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '이웃', 'img' => 'neighbor']],
                plain: [['ko' => '또한'], ['ko' => '좋은']],
                phrases: [
                    'a' => [
                        'words' => ['제', '친구는', '좋습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend is good', 'correct' => ['my', 'friend', 'is', 'good'], 'extra' => ['neighbour']],
                            'az' => ['sentence' => 'mənim dost yaxşı', 'correct' => ['mənim', 'dost', 'yaxşı'], 'extra' => ['qonşu']],
                            'ar' => ['sentence' => 'صديق جيد', 'correct' => ['صديق', 'جيد'], 'extra' => ['جار']],
                            'ru' => ['sentence' => 'мой друг хороший', 'correct' => ['мой', 'друг', 'хороший'], 'extra' => ['сосед']],
                            'es' => ['sentence' => 'Mi amigo es bueno', 'correct' => ['mi', 'amigo', 'es', 'bueno'], 'extra' => ['vecino', 'también']],
                            'de' => ['sentence' => 'Mein Freund ist gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['Nachbar', 'auch']],
                            'fr' => ['sentence' => 'Mon ami est bon', 'correct' => ['mon', 'ami', 'est', 'bon'], 'extra' => ['voisin', 'aussi']],
                            'ja' => ['sentence' => '私の友達は良いです', 'correct' => ['私の', '友達', 'は', '良い', 'です'], 'extra' => ['隣人']],
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => ['komşu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '이웃도'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my neighbour also', 'correct' => ['my', 'neighbour', 'also'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'mənim qonşu həmçinin', 'correct' => ['mənim', 'qonşu', 'həmçinin'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'جار أيضا', 'correct' => ['جار', 'أيضا'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'мой сосед тоже', 'correct' => ['мой', 'сосед', 'тоже'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Mi vecino también', 'correct' => ['mi', 'vecino', 'también'], 'extra' => ['amigo', 'bueno']],
                            'de' => ['sentence' => 'Mein Nachbar auch', 'correct' => ['mein', 'Nachbar', 'auch'], 'extra' => ['Freund', 'gut']],
                            'fr' => ['sentence' => 'Mon voisin aussi', 'correct' => ['mon', 'voisin', 'aussi'], 'extra' => ['ami', 'bon']],
                            'ja' => ['sentence' => '私の隣人も', 'correct' => ['私の', '隣人', 'も'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'komşum da', 'correct' => ['komşum', 'da'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['친구와', '이웃'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my friend and my neighbour', 'correct' => ['my', 'friend', 'and', 'my', 'neighbour'], 'extra' => ['also']],
                            'az' => ['sentence' => 'mənim dost və mənim qonşu', 'correct' => ['mənim', 'dost', 'və', 'mənim', 'qonşu'], 'extra' => ['həmçinin']],
                            'ar' => ['sentence' => 'صديق و جار', 'correct' => ['صديق', 'و', 'جار'], 'extra' => ['أيضا']],
                            'ru' => ['sentence' => 'мой друг и мой сосед', 'correct' => ['мой', 'друг', 'и', 'мой', 'сосед'], 'extra' => ['тоже']],
                            'es' => ['sentence' => 'Mi amigo y mi vecino', 'correct' => ['mi', 'amigo', 'y', 'mi', 'vecino'], 'extra' => ['también']],
                            'de' => ['sentence' => 'Mein Freund und mein Nachbar', 'correct' => ['mein', 'Freund', 'und', 'mein', 'Nachbar'], 'extra' => ['auch']],
                            'fr' => ['sentence' => 'Mon ami et mon voisin', 'correct' => ['mon', 'ami', 'et', 'mon', 'voisin'], 'extra' => ['aussi']],
                            'ja' => ['sentence' => '友達と隣人', 'correct' => ['友達', 'と', '隣人'], 'extra' => ['も']],
                            'tr' => ['sentence' => 'arkadaşım ve komşum', 'correct' => ['arkadaşım', 've', 'komşum'], 'extra' => ['de']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 친구 · 어머니', 5,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '어머니', 'img' => 'mother']],
                plain: [['ko' => '잘'], ['ko' => '매우']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '매우', '잘', '지냅니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I am very well', 'correct' => ['I', 'am', 'very', 'well'], 'extra' => ['mother']],
                            'az' => ['sentence' => 'mən çox yaxşıyam', 'correct' => ['mən', 'çox', 'yaxşıyam'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'أنا جدا بخير', 'correct' => ['أنا', 'جدا', 'بخير'], 'extra' => ['أم']],
                            'ru' => ['sentence' => 'я очень хорошо', 'correct' => ['я', 'очень', 'хорошо'], 'extra' => ['мама']],
                            'es' => ['sentence' => 'Estoy muy bien', 'correct' => ['estoy', 'muy', 'bien'], 'extra' => ['madre', 'amigo']],
                            'de' => ['sentence' => 'Mir geht es sehr gut', 'correct' => ['ich', 'bin', 'sehr', 'gut'], 'extra' => ['Mutter']],
                            'fr' => ['sentence' => 'Je vais très bien', 'correct' => ['je', 'suis', 'très', 'bien'], 'extra' => ['mère', 'ami']],
                            'ja' => ['sentence' => '私はとても元気です', 'correct' => ['私', 'は', 'とても', '元気', 'です'], 'extra' => ['母']],
                            'tr' => ['sentence' => 'çok iyiyim', 'correct' => ['çok', 'iyiyim'], 'extra' => ['anne']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '친구는', '잘', '지냅니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'my friend is well', 'correct' => ['my', 'friend', 'is', 'well'], 'extra' => ['very']],
                            'az' => ['sentence' => 'mənim dost yaxşıyam', 'correct' => ['mənim', 'dost', 'yaxşıyam'], 'extra' => ['çox']],
                            'ar' => ['sentence' => 'صديق بخير', 'correct' => ['صديق', 'بخير'], 'extra' => ['جدا']],
                            'ru' => ['sentence' => 'мой друг хорошо', 'correct' => ['мой', 'друг', 'хорошо'], 'extra' => ['очень']],
                            'es' => ['sentence' => 'Mi amigo está bien', 'correct' => ['mi', 'amigo', 'es', 'bien'], 'extra' => ['muy', 'madre']],
                            'de' => ['sentence' => 'Meinem Freund geht es gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['sehr']],
                            'fr' => ['sentence' => 'Mon ami va bien', 'correct' => ['mon', 'ami', 'est', 'bien'], 'extra' => ['très']],
                            'ja' => ['sentence' => '私の友達は元気です', 'correct' => ['私の', '友達', 'は', '元気', 'です'], 'extra' => ['とても']],
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => ['çok']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '어머니는', '매우', '잘', '지냅니다'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'my mother is very well', 'correct' => ['my', 'mother', 'is', 'very', 'well'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'mənim ana çox yaxşıyam', 'correct' => ['mənim', 'ana', 'çox', 'yaxşıyam'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أم جدا بخير', 'correct' => ['أم', 'جدا', 'بخير'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'мой мама очень хорошо', 'correct' => ['мой', 'мама', 'очень', 'хорошо'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Mi madre está muy bien', 'correct' => ['mi', 'madre', 'es', 'muy', 'bien'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Meiner Mutter geht es sehr gut', 'correct' => ['meine', 'Mutter', 'ist', 'sehr', 'gut'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Ma mère va très bien', 'correct' => ['ma', 'mère', 'est', 'très', 'bien'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '私の母はとても元気です', 'correct' => ['私の', '母', 'は', 'とても', '元気', 'です'], 'extra' => ['友達']],
                            'tr' => ['sentence' => 'annem çok iyi', 'correct' => ['annem', 'çok', 'iyi'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
