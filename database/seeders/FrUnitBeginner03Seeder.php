<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner03Seeder extends Seeder
{
    private const PICTURES = [
        'Mère' => 'mother', 'Père' => 'father', 'Frère' => 'brother', 'Sœur' => 'sister',
        'Ami' => 'friend', 'Voisin' => 'neighbor', 'Professeur' => 'teacher', 'Médecin' => 'doctor',
    ];

    /**
     * French Beginner Unit 3 — family and the people around you.
     *
     * The grammar words are grouped with the nouns that make them usable:
     * mon/ma with parents (French "my" changes with the noun's gender),
     * il est/elle est with jobs, qui/ou with people you can ask about. The
     * previous version taught these in isolation and never used them.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Family & People', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Mother & Father', 1,
                pictures: [['fr' => 'Mère', 'img' => 'mother'], ['fr' => 'Père', 'img' => 'father']],
                plain: [['fr' => 'Mon'], ['fr' => 'Ma']],
                phrases: [
                    'a' => [
                        'words' => ['ma', 'mère'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'My mother', 'correct' => ['my', 'mother'], 'extra' => ['father', 'sister']],
                            'az' => ['sentence' => 'mənim ana', 'correct' => ['mənim', 'ana'], 'extra' => ['ata', 'bacı']],
                            'ar' => ['sentence' => 'أم', 'correct' => ['أم'], 'extra' => ['أب', 'أخت']],
                            'ru' => ['sentence' => 'мой мама', 'correct' => ['мой', 'мама'], 'extra' => ['папа', 'сестра']],
                            'es' => ['sentence' => 'Mi madre', 'correct' => ['mi', 'madre'], 'extra' => ['padre', 'hermana']],
                            'de' => ['sentence' => 'Meine Mutter', 'correct' => ['meine', 'Mutter'], 'extra' => ['Vater', 'Schwester']],
                            'ja' => ['sentence' => '私の母', 'correct' => ['私の', '母'], 'extra' => ['父', '姉妹']],
                            'ko' => ['sentence' => '나의 어머니', 'correct' => ['나의', '어머니'], 'extra' => ['아버지', '자매']],
                            'tr' => ['sentence' => 'annem', 'correct' => ['annem'], 'extra' => ['baba', 'kız kardeş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mon', 'père'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'My father', 'correct' => ['my', 'father'], 'extra' => ['mother', 'brother']],
                            'az' => ['sentence' => 'mənim ata', 'correct' => ['mənim', 'ata'], 'extra' => ['ana', 'qardaş']],
                            'ar' => ['sentence' => 'أب', 'correct' => ['أب'], 'extra' => ['أم', 'أخ']],
                            'ru' => ['sentence' => 'мой папа', 'correct' => ['мой', 'папа'], 'extra' => ['мама', 'брат']],
                            'es' => ['sentence' => 'Mi padre', 'correct' => ['mi', 'padre'], 'extra' => ['madre', 'hermano']],
                            'de' => ['sentence' => 'Mein Vater', 'correct' => ['mein', 'Vater'], 'extra' => ['Mutter', 'Bruder']],
                            'ja' => ['sentence' => '私の父', 'correct' => ['私の', '父'], 'extra' => ['母', '兄弟']],
                            'ko' => ['sentence' => '나의 아버지', 'correct' => ['나의', '아버지'], 'extra' => ['어머니', '형제']],
                            'tr' => ['sentence' => 'babam', 'correct' => ['babam'], 'extra' => ['anne', 'erkek kardeş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'père', 'et', 'ma', 'mère'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My father and my mother', 'correct' => ['my', 'father', 'and', 'my', 'mother'], 'extra' => ['sister']],
                            'az' => ['sentence' => 'mənim ata və mənim ana', 'correct' => ['mənim', 'ata', 'və', 'mənim', 'ana'], 'extra' => ['bacı']],
                            'ar' => ['sentence' => 'أب و أم', 'correct' => ['أب', 'و', 'أم'], 'extra' => ['أخت']],
                            'ru' => ['sentence' => 'мой папа и мой мама', 'correct' => ['мой', 'папа', 'и', 'мой', 'мама'], 'extra' => ['сестра']],
                            'es' => ['sentence' => 'Mi padre y mi madre', 'correct' => ['mi', 'padre', 'y', 'mi', 'madre'], 'extra' => ['hermana']],
                            'de' => ['sentence' => 'Mein Vater und meine Mutter', 'correct' => ['mein', 'Vater', 'und', 'meine', 'Mutter'], 'extra' => ['Schwester']],
                            'ja' => ['sentence' => '父と母', 'correct' => ['父', 'と', '母'], 'extra' => ['姉妹']],
                            'ko' => ['sentence' => '나의 아버지와 어머니', 'correct' => ['나의', '아버지와', '어머니'], 'extra' => ['자매']],
                            'tr' => ['sentence' => 'babam ve annem', 'correct' => ['babam', 've', 'annem'], 'extra' => ['kız kardeş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Brother & Sister', 2,
                pictures: [['fr' => 'Frère', 'img' => 'brother'], ['fr' => 'Sœur', 'img' => 'sister']],
                plain: [['fr' => "C'est"], ['fr' => 'Aussi']],
                phrases: [
                    'a' => [
                        'words' => ["c'est", 'mon', 'frère'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'This is my brother', 'correct' => ['this', 'is', 'my', 'brother'], 'extra' => ['sister']],
                            'az' => ['sentence' => 'bu mənim qardaş', 'correct' => ['bu', 'mənim', 'qardaş'], 'extra' => ['bacı']],
                            'ar' => ['sentence' => 'هذا أخ', 'correct' => ['هذا', 'أخ'], 'extra' => ['أخت']],
                            'ru' => ['sentence' => 'это мой брат', 'correct' => ['это', 'мой', 'брат'], 'extra' => ['сестра']],
                            'es' => ['sentence' => 'Este es mi hermano', 'correct' => ['este', 'es', 'mi', 'hermano'], 'extra' => ['hermana']],
                            'de' => ['sentence' => 'Das ist mein Bruder', 'correct' => ['das', 'ist', 'mein', 'Bruder'], 'extra' => ['Schwester']],
                            'ja' => ['sentence' => 'これは私の兄弟です', 'correct' => ['これは', '私の', '兄弟', 'です'], 'extra' => ['姉妹']],
                            'ko' => ['sentence' => '이분은 나의 형제입니다', 'correct' => ['이분은', '나의', '형제입니다'], 'extra' => ['자매']],
                            'tr' => ['sentence' => 'bu benim erkek kardeşim', 'correct' => ['bu', 'benim', 'erkek', 'kardeşim'], 'extra' => ['kız kardeş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ma', 'sœur', 'aussi'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'My sister too', 'correct' => ['my', 'sister', 'too'], 'extra' => ['brother']],
                            'az' => ['sentence' => 'mənim bacı də', 'correct' => ['mənim', 'bacı', 'də'], 'extra' => ['qardaş']],
                            'ar' => ['sentence' => 'أخت أيضا', 'correct' => ['أخت', 'أيضا'], 'extra' => ['أخ']],
                            'ru' => ['sentence' => 'мой сестра тоже', 'correct' => ['мой', 'сестра', 'тоже'], 'extra' => ['брат']],
                            'es' => ['sentence' => 'Mi hermana también', 'correct' => ['mi', 'hermana', 'también'], 'extra' => ['hermano']],
                            'de' => ['sentence' => 'Meine Schwester auch', 'correct' => ['meine', 'Schwester', 'auch'], 'extra' => ['Bruder']],
                            'ja' => ['sentence' => '私の姉妹も', 'correct' => ['私の', '姉妹', 'も'], 'extra' => ['兄弟']],
                            'ko' => ['sentence' => '나의 자매도', 'correct' => ['나의', '자매도'], 'extra' => ['형제']],
                            'tr' => ['sentence' => 'kız kardeşim de', 'correct' => ['kız', 'kardeşim', 'de'], 'extra' => ['erkek kardeş']],
                        ],
                    ],
                    'c' => [
                        'words' => ["c'est", 'mon', 'frère', 'et', 'ma', 'sœur'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'This is my brother and my sister', 'correct' => ['this', 'is', 'my', 'brother', 'and', 'my', 'sister'], 'extra' => ['father']],
                            'az' => ['sentence' => 'bu mənim qardaş və mənim bacı', 'correct' => ['bu', 'mənim', 'qardaş', 'və', 'mənim', 'bacı'], 'extra' => ['ata']],
                            'ar' => ['sentence' => 'هذا أخ و أخت', 'correct' => ['هذا', 'أخ', 'و', 'أخت'], 'extra' => ['أب']],
                            'ru' => ['sentence' => 'это мой брат и мой сестра', 'correct' => ['это', 'мой', 'брат', 'и', 'мой', 'сестра'], 'extra' => ['папа']],
                            'es' => ['sentence' => 'Este es mi hermano y mi hermana', 'correct' => ['este', 'es', 'mi', 'hermano', 'y', 'mi', 'hermana'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Das ist mein Bruder und meine Schwester', 'correct' => ['das', 'ist', 'mein', 'Bruder', 'und', 'meine', 'Schwester'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => 'これは私の兄弟と姉妹です', 'correct' => ['これは', '私の', '兄弟', 'と', '姉妹', 'です'], 'extra' => ['父']],
                            'ko' => ['sentence' => '이분은 나의 형제와 자매입니다', 'correct' => ['이분은', '나의', '형제와', '자매입니다'], 'extra' => ['아버지']],
                            'tr' => ['sentence' => 'bu benim erkek kardeşim ve kız kardeşim', 'correct' => ['bu', 'benim', 'erkek', 'kardeşim', 've', 'kız', 'kardeşim'], 'extra' => ['baba']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Teacher & Doctor', 3,
                pictures: [['fr' => 'Professeur', 'img' => 'teacher'], ['fr' => 'Médecin', 'img' => 'doctor']],
                plain: [['fr' => 'Il est'], ['fr' => 'Elle est']],
                phrases: [
                    'a' => [
                        'words' => ['il est', 'professeur'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'He is a teacher', 'correct' => ['he', 'is', 'a', 'teacher'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'o kişi bir müəllim', 'correct' => ['o kişi', 'bir', 'müəllim'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'هو معلم', 'correct' => ['هو', 'معلم'], 'extra' => ['طبيب']],
                            'ru' => ['sentence' => 'он учитель', 'correct' => ['он', 'учитель'], 'extra' => ['врач']],
                            'es' => ['sentence' => 'Él es profesor', 'correct' => ['él', 'es', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Er ist Lehrer', 'correct' => ['er', 'ist', 'Lehrer'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '彼は先生です', 'correct' => ['彼は', '先生', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '그는 선생님입니다', 'correct' => ['그는', '선생님입니다'], 'extra' => ['의사']],
                            'tr' => ['sentence' => 'o bir öğretmen', 'correct' => ['o', 'bir', 'öğretmen'], 'extra' => ['doktor']],
                        ],
                    ],
                    'b' => [
                        'words' => ['elle est', 'médecin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'She is a doctor', 'correct' => ['she', 'is', 'a', 'doctor'], 'extra' => ['teacher']],
                            'az' => ['sentence' => 'o qadın bir həkim', 'correct' => ['o qadın', 'bir', 'həkim'], 'extra' => ['müəllim']],
                            'ar' => ['sentence' => 'هي طبيب', 'correct' => ['هي', 'طبيب'], 'extra' => ['معلم']],
                            'ru' => ['sentence' => 'она врач', 'correct' => ['она', 'врач'], 'extra' => ['учитель']],
                            'es' => ['sentence' => 'Ella es médica', 'correct' => ['ella', 'es', 'médica'], 'extra' => ['profesora']],
                            'de' => ['sentence' => 'Sie ist Ärztin', 'correct' => ['sie', 'ist', 'Ärztin'], 'extra' => ['Lehrerin']],
                            'ja' => ['sentence' => '彼女は医者です', 'correct' => ['彼女は', '医者', 'です'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '그녀는 의사입니다', 'correct' => ['그녀는', '의사입니다'], 'extra' => ['선생님']],
                            'tr' => ['sentence' => 'o bir doktor', 'correct' => ['o', 'bir', 'doktor'], 'extra' => ['öğretmen']],
                        ],
                    ],
                    'c' => [
                        'words' => ['il est', 'médecin', 'et', 'elle est', 'professeur'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'He is a doctor and she is a teacher', 'correct' => ['he', 'is', 'a', 'doctor', 'and', 'she', 'is', 'a', 'teacher'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'o kişi bir həkim və o qadın bir müəllim', 'correct' => ['o kişi', 'bir', 'həkim', 'və', 'o qadın', 'bir', 'müəllim'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'هو طبيب و هي معلم', 'correct' => ['هو', 'طبيب', 'و', 'هي', 'معلم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'он врач и она учитель', 'correct' => ['он', 'врач', 'и', 'она', 'учитель'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Él es médico y ella es profesora', 'correct' => ['él', 'es', 'médico', 'y', 'ella', 'es', 'profesora'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Er ist Arzt und sie ist Lehrerin', 'correct' => ['er', 'ist', 'Arzt', 'und', 'sie', 'ist', 'Lehrerin'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '彼は医者で彼女は先生です', 'correct' => ['彼は', '医者', 'で', '彼女は', '先生', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '그는 의사이고 그녀는 선생님입니다', 'correct' => ['그는', '의사이고', '그녀는', '선생님입니다'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'o bir doktor ve o bir öğretmen', 'correct' => ['o', 'bir', 'doktor', 've', 'o', 'bir', 'öğretmen'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Friend & Neighbour', 4,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Voisin', 'img' => 'neighbor']],
                plain: [['fr' => 'Qui'], ['fr' => 'Ou']],
                phrases: [
                    'a' => [
                        'words' => ['mon', 'ami'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My friend', 'correct' => ['my', 'friend'], 'extra' => ['neighbour', 'who']],
                            'az' => ['sentence' => 'mənim dost', 'correct' => ['mənim', 'dost'], 'extra' => ['qonşu', 'kim']],
                            'ar' => ['sentence' => 'صديق', 'correct' => ['صديق'], 'extra' => ['جار', 'مَن']],
                            'ru' => ['sentence' => 'мой друг', 'correct' => ['мой', 'друг'], 'extra' => ['сосед', 'кто']],
                            'es' => ['sentence' => 'Mi amigo', 'correct' => ['mi', 'amigo'], 'extra' => ['vecino', 'quién']],
                            'de' => ['sentence' => 'Mein Freund', 'correct' => ['mein', 'Freund'], 'extra' => ['Nachbar', 'wer']],
                            'ja' => ['sentence' => '私の友達', 'correct' => ['私の', '友達'], 'extra' => ['隣人', '誰']],
                            'ko' => ['sentence' => '나의 친구', 'correct' => ['나의', '친구'], 'extra' => ['이웃', '누구']],
                            'tr' => ['sentence' => 'benim arkadaşım', 'correct' => ['benim', 'arkadaşım'], 'extra' => ['komşu', 'kim']],
                        ],
                    ],
                    'b' => [
                        'words' => ['qui', 'est', 'mon', 'voisin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Who is my neighbour', 'correct' => ['who', 'is', 'my', 'neighbour'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'kim mənim qonşu', 'correct' => ['kim', 'mənim', 'qonşu'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'مَن جار', 'correct' => ['مَن', 'جار'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'кто мой сосед', 'correct' => ['кто', 'мой', 'сосед'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Quién es mi vecino', 'correct' => ['quién', 'es', 'mi', 'vecino'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Wer ist mein Nachbar', 'correct' => ['wer', 'ist', 'mein', 'Nachbar'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '誰が私の隣人ですか', 'correct' => ['誰', 'が', '私の', '隣人', 'です', 'か'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '누가 나의 이웃입니까', 'correct' => ['누가', '나의', '이웃입니까'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'komşum kim', 'correct' => ['komşum', 'kim'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'ami', 'ou', 'mon', 'voisin'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'My friend or my neighbour', 'correct' => ['my', 'friend', 'or', 'my', 'neighbour'], 'extra' => ['who']],
                            'az' => ['sentence' => 'mənim dost və ya mənim qonşu', 'correct' => ['mənim', 'dost', 'və ya', 'mənim', 'qonşu'], 'extra' => ['kim']],
                            'ar' => ['sentence' => 'صديق أو جار', 'correct' => ['صديق', 'أو', 'جار'], 'extra' => ['مَن']],
                            'ru' => ['sentence' => 'мой друг или мой сосед', 'correct' => ['мой', 'друг', 'или', 'мой', 'сосед'], 'extra' => ['кто']],
                            'es' => ['sentence' => 'Mi amigo o mi vecino', 'correct' => ['mi', 'amigo', 'o', 'mi', 'vecino'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Mein Freund oder mein Nachbar', 'correct' => ['mein', 'Freund', 'oder', 'mein', 'Nachbar'], 'extra' => ['wer']],
                            'ja' => ['sentence' => '私の友達か隣人', 'correct' => ['私の', '友達', 'か', '隣人'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '나의 친구 또는 이웃', 'correct' => ['나의', '친구', '또는', '이웃'], 'extra' => ['누구']],
                            'tr' => ['sentence' => 'arkadaşım veya komşum', 'correct' => ['arkadaşım', 'veya', 'komşum'], 'extra' => ['kim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Very Well', 5,
                pictures: [['fr' => 'Mère', 'img' => 'mother'], ['fr' => 'Ami', 'img' => 'friend']],
                plain: [['fr' => 'Très'], ['fr' => 'Bien']],
                phrases: [
                    'a' => [
                        'words' => ['très', 'bien'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Very well', 'correct' => ['very', 'well'], 'extra' => ['my', 'mother']],
                            'az' => ['sentence' => 'çox yaxşıyam', 'correct' => ['çox', 'yaxşıyam'], 'extra' => ['mənim', 'ana']],
                            'ar' => ['sentence' => 'جدا بخير', 'correct' => ['جدا', 'بخير'], 'extra' => ['أم']],
                            'ru' => ['sentence' => 'очень хорошо', 'correct' => ['очень', 'хорошо'], 'extra' => ['мой', 'мама']],
                            'es' => ['sentence' => 'Muy bien', 'correct' => ['muy', 'bien'], 'extra' => ['mi', 'madre']],
                            'de' => ['sentence' => 'Sehr gut', 'correct' => ['sehr', 'gut'], 'extra' => ['mein', 'Mutter']],
                            'ja' => ['sentence' => 'とても良い', 'correct' => ['とても', '良い'], 'extra' => ['私の', '母']],
                            'ko' => ['sentence' => '매우 잘', 'correct' => ['매우', '잘'], 'extra' => ['나의', '어머니']],
                            'tr' => ['sentence' => 'çok iyi', 'correct' => ['çok', 'iyi'], 'extra' => ['benim', 'anne']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'est", 'ma', 'mère'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'This is my mother', 'correct' => ['this', 'is', 'my', 'mother'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'bu mənim ana', 'correct' => ['bu', 'mənim', 'ana'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'هذا أم', 'correct' => ['هذا', 'أم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'это мой мама', 'correct' => ['это', 'мой', 'мама'], 'extra' => ['друг']],
                            'es' => ['sentence' => 'Esta es mi madre', 'correct' => ['esta', 'es', 'mi', 'madre'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Das ist meine Mutter', 'correct' => ['das', 'ist', 'meine', 'Mutter'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => 'これは私の母です', 'correct' => ['これは', '私の', '母', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '이분은 나의 어머니입니다', 'correct' => ['이분은', '나의', '어머니입니다'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'bu benim annem', 'correct' => ['bu', 'benim', 'annem'], 'extra' => ['arkadaş']],
                        ],
                    ],
                    'c' => [
                        'words' => ["c'est", 'mon', 'ami', 'et', 'ma', 'mère'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'This is my friend and my mother', 'correct' => ['this', 'is', 'my', 'friend', 'and', 'my', 'mother'], 'extra' => ['father']],
                            'az' => ['sentence' => 'bu mənim dost və mənim ana', 'correct' => ['bu', 'mənim', 'dost', 'və', 'mənim', 'ana'], 'extra' => ['ata']],
                            'ar' => ['sentence' => 'هذا صديق و أم', 'correct' => ['هذا', 'صديق', 'و', 'أم'], 'extra' => ['أب']],
                            'ru' => ['sentence' => 'это мой друг и мой мама', 'correct' => ['это', 'мой', 'друг', 'и', 'мой', 'мама'], 'extra' => ['папа']],
                            'es' => ['sentence' => 'Este es mi amigo y mi madre', 'correct' => ['este', 'es', 'mi', 'amigo', 'y', 'mi', 'madre'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Das ist mein Freund und meine Mutter', 'correct' => ['das', 'ist', 'mein', 'Freund', 'und', 'meine', 'Mutter'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => 'これは私の友達と母です', 'correct' => ['これは', '私の', '友達', 'と', '母', 'です'], 'extra' => ['父']],
                            'ko' => ['sentence' => '이분은 나의 친구와 어머니입니다', 'correct' => ['이분은', '나의', '친구와', '어머니입니다'], 'extra' => ['아버지']],
                            'tr' => ['sentence' => 'bu benim arkadaşım ve annem', 'correct' => ['bu', 'benim', 'arkadaşım', 've', 'annem'], 'extra' => ['baba']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
