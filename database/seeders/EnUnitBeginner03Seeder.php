<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner03Seeder extends Seeder
{
    private const PICTURES = [
        'Mother' => 'mother', 'Father' => 'father', 'Brother' => 'brother', 'Sister' => 'sister',
        'Friend' => 'friend', 'Neighbour' => 'neighbor', 'Teacher' => 'teacher', 'Doctor' => 'doctor',
    ];

    /**
     * English Chapter 1, Unit 3 — family and the people around you.
     *
     * All eight picture words are people the learner can point at, so the unit
     * spends its abstract half on the words that connect them — my, this is,
     * he is, she is, who — until the learner can introduce a whole family.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Family & People', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Mother & Father', 1,
                pictures: [['en' => 'Mother', 'img' => 'mother'], ['en' => 'Father', 'img' => 'father']],
                plain: [['en' => 'My'], ['en' => 'This is']],
                phrases: [
                    'a' => [
                        'words' => ['my', 'mother'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Mi madre', 'correct' => ['mi', 'madre'], 'extra' => ['padre', 'este es']],
                            'de' => ['sentence' => 'Meine Mutter', 'correct' => ['meine', 'Mutter'], 'extra' => ['Vater', 'das ist']],
                            'ja' => ['sentence' => '私の母', 'correct' => ['私の', '母'], 'extra' => ['父']],
                            'ko' => ['sentence' => '나의 어머니', 'correct' => ['나의', '어머니'], 'extra' => ['아버지']],
                            'fr' => ['sentence' => 'Ma mère', 'correct' => ['ma', 'mère'], 'extra' => ['père', "c'est"]],
                            'tr' => ['sentence' => 'annem', 'correct' => ['annem'], 'extra' => []],
                        'ru' => ['sentence' => 'мой мама', 'correct' => ['мой', 'мама'], 'extra' => []],
                        'ar' => ['sentence' => 'أم', 'correct' => ['أم'], 'extra' => []],
                        'az' => ['sentence' => 'mənim ana', 'correct' => ['mənim', 'ana'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['this is', 'my', 'father'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Este es mi padre', 'correct' => ['este es', 'mi', 'padre'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Das ist mein Vater', 'correct' => ['das ist', 'mein', 'Vater'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => 'これは私の父です', 'correct' => ['これは', '私の', '父', 'です'], 'extra' => ['母']],
                            'ko' => ['sentence' => '이분은 나의 아버지입니다', 'correct' => ['이분은', '나의', '아버지입니다'], 'extra' => ['어머니']],
                            'fr' => ['sentence' => "C'est mon père", 'correct' => ["c'est", 'mon', 'père'], 'extra' => ['mère']],
                            'tr' => ['sentence' => 'bu benim babam', 'correct' => ['bu', 'benim', 'babam'], 'extra' => []],
                        'ru' => ['sentence' => 'это мой папа', 'correct' => ['это', 'мой', 'папа'], 'extra' => []],
                        'ar' => ['sentence' => 'هذا أب', 'correct' => ['هذا', 'أب'], 'extra' => []],
                        'az' => ['sentence' => 'bu mənim ata', 'correct' => ['bu', 'mənim', 'ata'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'mother', 'and', 'my', 'father'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['este es']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['das ist']],
                            'ja' => ['sentence' => '母と父', 'correct' => ['母', 'と', '父'], 'extra' => ['これは']],
                            'ko' => ['sentence' => '어머니와 아버지', 'correct' => ['어머니와', '아버지'], 'extra' => ['이분은']],
                            'fr' => ['sentence' => 'Ma mère et mon père', 'correct' => ['ma', 'mère', 'et', 'mon', 'père'], 'extra' => ["c'est"]],
                            'tr' => ['sentence' => 'annem ve babam', 'correct' => ['annem', 've', 'babam'], 'extra' => []],
                        'ru' => ['sentence' => 'мой мама и мой папа', 'correct' => ['мой', 'мама', 'и', 'мой', 'папа'], 'extra' => []],
                        'ar' => ['sentence' => 'أم و أب', 'correct' => ['أم', 'و', 'أب'], 'extra' => []],
                        'az' => ['sentence' => 'mənim ana və mənim ata', 'correct' => ['mənim', 'ana', 'və', 'mənim', 'ata'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Brother & Sister', 2,
                pictures: [['en' => 'Brother', 'img' => 'brother'], ['en' => 'Sister', 'img' => 'sister']],
                plain: [['en' => 'He is'], ['en' => 'She is']],
                phrases: [
                    'a' => [
                        'words' => ['he is', 'my', 'brother'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Él es mi hermano', 'correct' => ['él es', 'mi', 'hermano'], 'extra' => ['hermana', 'ella es']],
                            'de' => ['sentence' => 'Er ist mein Bruder', 'correct' => ['er ist', 'mein', 'Bruder'], 'extra' => ['Schwester', 'sie ist']],
                            'ja' => ['sentence' => '彼は私の兄弟です', 'correct' => ['彼は', '私の', '兄弟', 'です'], 'extra' => ['姉妹']],
                            'ko' => ['sentence' => '그는 나의 형제입니다', 'correct' => ['그는', '나의', '형제입니다'], 'extra' => ['자매']],
                            'fr' => ['sentence' => "C'est mon frère", 'correct' => ['il est', 'mon', 'frère'], 'extra' => ['sœur', 'elle est']],
                            'tr' => ['sentence' => 'o benim erkek kardeşim', 'correct' => ['o', 'benim', 'erkek', 'kardeşim'], 'extra' => []],
                        'ru' => ['sentence' => 'он мой брат', 'correct' => ['он', 'мой', 'брат'], 'extra' => []],
                        'ar' => ['sentence' => 'هو أخ', 'correct' => ['هو', 'أخ'], 'extra' => []],
                        'az' => ['sentence' => 'o mənim qardaş', 'correct' => ['o', 'mənim', 'qardaş'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['she is', 'my', 'sister'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ella es mi hermana', 'correct' => ['ella es', 'mi', 'hermana'], 'extra' => ['hermano', 'él es']],
                            'de' => ['sentence' => 'Sie ist meine Schwester', 'correct' => ['sie ist', 'meine', 'Schwester'], 'extra' => ['Bruder', 'er ist']],
                            'ja' => ['sentence' => '彼女は私の姉妹です', 'correct' => ['彼女は', '私の', '姉妹', 'です'], 'extra' => ['兄弟']],
                            'ko' => ['sentence' => '그녀는 나의 자매입니다', 'correct' => ['그녀는', '나의', '자매입니다'], 'extra' => ['형제']],
                            'fr' => ['sentence' => 'Elle est ma sœur', 'correct' => ['elle est', 'ma', 'sœur'], 'extra' => ['frère', 'il est']],
                            'tr' => ['sentence' => 'o benim kız kardeşim', 'correct' => ['o', 'benim', 'kız', 'kardeşim'], 'extra' => []],
                        'ru' => ['sentence' => 'она мой сестра', 'correct' => ['она', 'мой', 'сестра'], 'extra' => []],
                        'ar' => ['sentence' => 'هي أخت', 'correct' => ['هي', 'أخت'], 'extra' => []],
                        'az' => ['sentence' => 'o qadın mənim bacı', 'correct' => ['o qadın', 'mənim', 'bacı'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'brother', 'and', 'my', 'sister'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Mi hermano y mi hermana', 'correct' => ['mi', 'hermano', 'y', 'mi', 'hermana'], 'extra' => ['ella es']],
                            'de' => ['sentence' => 'Mein Bruder und meine Schwester', 'correct' => ['mein', 'Bruder', 'und', 'meine', 'Schwester'], 'extra' => ['sie ist']],
                            'ja' => ['sentence' => '兄弟と姉妹', 'correct' => ['兄弟', 'と', '姉妹'], 'extra' => ['彼は']],
                            'ko' => ['sentence' => '형제와 자매', 'correct' => ['형제와', '자매'], 'extra' => ['그는']],
                            'fr' => ['sentence' => 'Mon frère et ma sœur', 'correct' => ['mon', 'frère', 'et', 'ma', 'sœur'], 'extra' => ['elle est']],
                            'tr' => ['sentence' => 'erkek kardeşim ve kız kardeşim', 'correct' => ['erkek', 'kardeşim', 've', 'kız', 'kardeşim'], 'extra' => []],
                        'ru' => ['sentence' => 'мой брат и мой сестра', 'correct' => ['мой', 'брат', 'и', 'мой', 'сестра'], 'extra' => []],
                        'ar' => ['sentence' => 'أخ و أخت', 'correct' => ['أخ', 'و', 'أخت'], 'extra' => []],
                        'az' => ['sentence' => 'mənim qardaş və mənim bacı', 'correct' => ['mənim', 'qardaş', 'və', 'mənim', 'bacı'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Teacher & Doctor', 3,
                pictures: [['en' => 'Teacher', 'img' => 'teacher'], ['en' => 'Doctor', 'img' => 'doctor']],
                plain: [['en' => 'Is'], ['en' => 'Who']],
                phrases: [
                    'a' => [
                        'words' => ['who', 'is', 'the', 'teacher'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Quién es el profesor', 'correct' => ['quién', 'es', 'el', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Wer ist der Lehrer', 'correct' => ['wer', 'ist', 'der', 'Lehrer'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '先生は誰ですか', 'correct' => ['先生', 'は', '誰', 'です', 'か'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '누가 선생님입니까', 'correct' => ['누가', '선생님입니까'], 'extra' => ['의사']],
                            'fr' => ['sentence' => 'Qui est le professeur', 'correct' => ['qui', 'est', 'le', 'professeur'], 'extra' => ['médecin']],
                            'tr' => ['sentence' => 'öğretmen kim', 'correct' => ['öğretmen', 'kim'], 'extra' => []],
                        'ru' => ['sentence' => 'кто учитель', 'correct' => ['кто', 'учитель'], 'extra' => []],
                        'ar' => ['sentence' => 'مَن معلم', 'correct' => ['مَن', 'معلم'], 'extra' => []],
                        'az' => ['sentence' => 'kim müəllim', 'correct' => ['kim', 'müəllim'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'doctor', 'is', 'here'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El médico está aquí', 'correct' => ['el', 'médico', 'es', 'aquí'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Der Arzt ist hier', 'correct' => ['der', 'Arzt', 'ist', 'hier'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => '医者はここにいます', 'correct' => ['医者', 'は', 'ここ', 'に', 'います'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '의사는 여기 있습니다', 'correct' => ['의사는', '여기', '있습니다'], 'extra' => ['선생님']],
                            'fr' => ['sentence' => 'Le médecin est ici', 'correct' => ['le', 'médecin', 'est', 'ici'], 'extra' => ['professeur']],
                            'tr' => ['sentence' => 'doktor burada', 'correct' => ['doktor', 'burada'], 'extra' => []],
                        'ru' => ['sentence' => 'врач здесь', 'correct' => ['врач', 'здесь'], 'extra' => []],
                        'ar' => ['sentence' => 'طبيب هنا', 'correct' => ['طبيب', 'هنا'], 'extra' => []],
                        'az' => ['sentence' => 'həkim burada', 'correct' => ['həkim', 'burada'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'teacher', 'and', 'the', 'doctor'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El profesor y el médico', 'correct' => ['el', 'profesor', 'y', 'el', 'médico'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Der Lehrer und der Arzt', 'correct' => ['der', 'Lehrer', 'und', 'der', 'Arzt'], 'extra' => ['wer']],
                            'ja' => ['sentence' => '先生と医者', 'correct' => ['先生', 'と', '医者'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '선생님과 의사', 'correct' => ['선생님과', '의사'], 'extra' => ['누구']],
                            'fr' => ['sentence' => 'Le professeur et le médecin', 'correct' => ['le', 'professeur', 'et', 'le', 'médecin'], 'extra' => ['qui']],
                            'tr' => ['sentence' => 'öğretmen ve doktor', 'correct' => ['öğretmen', 've', 'doktor'], 'extra' => []],
                        'ru' => ['sentence' => 'учитель и врач', 'correct' => ['учитель', 'и', 'врач'], 'extra' => []],
                        'ar' => ['sentence' => 'معلم و طبيب', 'correct' => ['معلم', 'و', 'طبيب'], 'extra' => []],
                        'az' => ['sentence' => 'müəllim və həkim', 'correct' => ['müəllim', 'və', 'həkim'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Friend & Neighbour', 4,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Neighbour', 'img' => 'neighbor']],
                plain: [['en' => 'Also'], ['en' => 'Good']],
                phrases: [
                    'a' => [
                        'words' => ['my', 'friend', 'is', 'good'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo es bueno', 'correct' => ['mi', 'amigo', 'es', 'bueno'], 'extra' => ['vecino', 'también']],
                            'de' => ['sentence' => 'Mein Freund ist gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['Nachbar', 'auch']],
                            'ja' => ['sentence' => '私の友達は良いです', 'correct' => ['私の', '友達', 'は', '良い', 'です'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '나의 친구는 좋습니다', 'correct' => ['나의', '친구는', '좋습니다'], 'extra' => ['이웃']],
                            'fr' => ['sentence' => 'Mon ami est bon', 'correct' => ['mon', 'ami', 'est', 'bon'], 'extra' => ['voisin', 'aussi']],
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'мой друг хороший', 'correct' => ['мой', 'друг', 'хороший'], 'extra' => []],
                        'ar' => ['sentence' => 'صديق جيد', 'correct' => ['صديق', 'جيد'], 'extra' => []],
                        'az' => ['sentence' => 'mənim dost yaxşı', 'correct' => ['mənim', 'dost', 'yaxşı'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'neighbour', 'also'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Mi vecino también', 'correct' => ['mi', 'vecino', 'también'], 'extra' => ['amigo', 'bueno']],
                            'de' => ['sentence' => 'Mein Nachbar auch', 'correct' => ['mein', 'Nachbar', 'auch'], 'extra' => ['Freund', 'gut']],
                            'ja' => ['sentence' => '私の隣人も', 'correct' => ['私の', '隣人', 'も'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '나의 이웃도', 'correct' => ['나의', '이웃도'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Mon voisin aussi', 'correct' => ['mon', 'voisin', 'aussi'], 'extra' => ['ami', 'bon']],
                            'tr' => ['sentence' => 'komşum da', 'correct' => ['komşum', 'da'], 'extra' => []],
                        'ru' => ['sentence' => 'мой сосед тоже', 'correct' => ['мой', 'сосед', 'тоже'], 'extra' => []],
                        'ar' => ['sentence' => 'جار أيضا', 'correct' => ['جار', 'أيضا'], 'extra' => []],
                        'az' => ['sentence' => 'mənim qonşu həmçinin', 'correct' => ['mənim', 'qonşu', 'həmçinin'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'friend', 'and', 'my', 'neighbour'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo y mi vecino', 'correct' => ['mi', 'amigo', 'y', 'mi', 'vecino'], 'extra' => ['también']],
                            'de' => ['sentence' => 'Mein Freund und mein Nachbar', 'correct' => ['mein', 'Freund', 'und', 'mein', 'Nachbar'], 'extra' => ['auch']],
                            'ja' => ['sentence' => '友達と隣人', 'correct' => ['友達', 'と', '隣人'], 'extra' => ['も']],
                            'ko' => ['sentence' => '친구와 이웃', 'correct' => ['친구와', '이웃'], 'extra' => ['또한']],
                            'fr' => ['sentence' => 'Mon ami et mon voisin', 'correct' => ['mon', 'ami', 'et', 'mon', 'voisin'], 'extra' => ['aussi']],
                            'tr' => ['sentence' => 'arkadaşım ve komşum', 'correct' => ['arkadaşım', 've', 'komşum'], 'extra' => []],
                        'ru' => ['sentence' => 'мой друг и мой сосед', 'correct' => ['мой', 'друг', 'и', 'мой', 'сосед'], 'extra' => []],
                        'ar' => ['sentence' => 'صديق و جار', 'correct' => ['صديق', 'و', 'جار'], 'extra' => []],
                        'az' => ['sentence' => 'mənim dost və mənim qonşu', 'correct' => ['mənim', 'dost', 'və', 'mənim', 'qonşu'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Very Well', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'Mother', 'img' => 'mother']],
                plain: [['en' => 'Well'], ['en' => 'Very']],
                phrases: [
                    'a' => [
                        'words' => ['I', 'am', 'very', 'well'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Estoy muy bien', 'correct' => ['estoy', 'muy', 'bien'], 'extra' => ['madre', 'amigo']],
                            'de' => ['sentence' => 'Mir geht es sehr gut', 'correct' => ['ich', 'bin', 'sehr', 'gut'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '私はとても元気です', 'correct' => ['私', 'は', 'とても', '元気', 'です'], 'extra' => ['母']],
                            'ko' => ['sentence' => '저는 매우 잘 지냅니다', 'correct' => ['저는', '매우', '잘', '지냅니다'], 'extra' => ['어머니']],
                            'fr' => ['sentence' => 'Je vais très bien', 'correct' => ['je', 'suis', 'très', 'bien'], 'extra' => ['mère', 'ami']],
                            'tr' => ['sentence' => 'çok iyiyim', 'correct' => ['çok', 'iyiyim'], 'extra' => []],
                        'ru' => ['sentence' => 'я очень хорошо', 'correct' => ['я', 'очень', 'хорошо'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا جدا بخير', 'correct' => ['أنا', 'جدا', 'بخير'], 'extra' => []],
                        'az' => ['sentence' => 'mən çox yaxşıyam', 'correct' => ['mən', 'çox', 'yaxşıyam'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'friend', 'is', 'well'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo está bien', 'correct' => ['mi', 'amigo', 'es', 'bien'], 'extra' => ['muy', 'madre']],
                            'de' => ['sentence' => 'Meinem Freund geht es gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['sehr']],
                            'ja' => ['sentence' => '私の友達は元気です', 'correct' => ['私の', '友達', 'は', '元気', 'です'], 'extra' => ['とても']],
                            'ko' => ['sentence' => '나의 친구는 잘 지냅니다', 'correct' => ['나의', '친구는', '잘', '지냅니다'], 'extra' => ['매우']],
                            'fr' => ['sentence' => 'Mon ami va bien', 'correct' => ['mon', 'ami', 'est', 'bien'], 'extra' => ['très']],
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'мой друг хорошо', 'correct' => ['мой', 'друг', 'хорошо'], 'extra' => []],
                        'ar' => ['sentence' => 'صديق بخير', 'correct' => ['صديق', 'بخير'], 'extra' => []],
                        'az' => ['sentence' => 'mənim dost yaxşıyam', 'correct' => ['mənim', 'dost', 'yaxşıyam'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'mother', 'is', 'very', 'well'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi madre está muy bien', 'correct' => ['mi', 'madre', 'es', 'muy', 'bien'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Meiner Mutter geht es sehr gut', 'correct' => ['meine', 'Mutter', 'ist', 'sehr', 'gut'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の母はとても元気です', 'correct' => ['私の', '母', 'は', 'とても', '元気', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '나의 어머니는 매우 잘 지냅니다', 'correct' => ['나의', '어머니는', '매우', '잘', '지냅니다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Ma mère va très bien', 'correct' => ['ma', 'mère', 'est', 'très', 'bien'], 'extra' => ['ami']],
                            'tr' => ['sentence' => 'annem çok iyi', 'correct' => ['annem', 'çok', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'мой мама очень хорошо', 'correct' => ['мой', 'мама', 'очень', 'хорошо'], 'extra' => []],
                        'ar' => ['sentence' => 'أم جدا بخير', 'correct' => ['أم', 'جدا', 'بخير'], 'extra' => []],
                        'az' => ['sentence' => 'mənim ana çox yaxşıyam', 'correct' => ['mənim', 'ana', 'çox', 'yaxşıyam'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
