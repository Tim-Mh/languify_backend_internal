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
                            'es' => ['sentence' => 'Mi madre', 'correct' => ['mi', 'madre'], 'extra' => ['padre', 'hermana']],
                            'de' => ['sentence' => 'Meine Mutter', 'correct' => ['meine', 'Mutter'], 'extra' => ['Vater', 'Schwester']],
                            'ja' => ['sentence' => '私の母', 'correct' => ['私の', '母'], 'extra' => ['父', '姉妹']],
                            'ko' => ['sentence' => '나의 어머니', 'correct' => ['나의', '어머니'], 'extra' => ['아버지', '자매']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mon', 'père'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'My father', 'correct' => ['my', 'father'], 'extra' => ['mother', 'brother']],
                            'es' => ['sentence' => 'Mi padre', 'correct' => ['mi', 'padre'], 'extra' => ['madre', 'hermano']],
                            'de' => ['sentence' => 'Mein Vater', 'correct' => ['mein', 'Vater'], 'extra' => ['Mutter', 'Bruder']],
                            'ja' => ['sentence' => '私の父', 'correct' => ['私の', '父'], 'extra' => ['母', '兄弟']],
                            'ko' => ['sentence' => '나의 아버지', 'correct' => ['나의', '아버지'], 'extra' => ['어머니', '형제']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'père', 'et', 'ma', 'mère'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My father and my mother', 'correct' => ['my', 'father', 'and', 'my', 'mother'], 'extra' => ['sister']],
                            'es' => ['sentence' => 'Mi padre y mi madre', 'correct' => ['mi', 'padre', 'y', 'mi', 'madre'], 'extra' => ['hermana']],
                            'de' => ['sentence' => 'Mein Vater und meine Mutter', 'correct' => ['mein', 'Vater', 'und', 'meine', 'Mutter'], 'extra' => ['Schwester']],
                            'ja' => ['sentence' => '父と母', 'correct' => ['父', 'と', '母'], 'extra' => ['姉妹']],
                            'ko' => ['sentence' => '나의 아버지와 어머니', 'correct' => ['나의', '아버지와', '어머니'], 'extra' => ['자매']],
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
                            'es' => ['sentence' => 'Este es mi hermano', 'correct' => ['este', 'es', 'mi', 'hermano'], 'extra' => ['hermana']],
                            'de' => ['sentence' => 'Das ist mein Bruder', 'correct' => ['das', 'ist', 'mein', 'Bruder'], 'extra' => ['Schwester']],
                            'ja' => ['sentence' => 'これは私の兄弟です', 'correct' => ['これは', '私の', '兄弟', 'です'], 'extra' => ['姉妹']],
                            'ko' => ['sentence' => '이분은 나의 형제입니다', 'correct' => ['이분은', '나의', '형제입니다'], 'extra' => ['자매']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ma', 'sœur', 'aussi'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'My sister too', 'correct' => ['my', 'sister', 'too'], 'extra' => ['brother']],
                            'es' => ['sentence' => 'Mi hermana también', 'correct' => ['mi', 'hermana', 'también'], 'extra' => ['hermano']],
                            'de' => ['sentence' => 'Meine Schwester auch', 'correct' => ['meine', 'Schwester', 'auch'], 'extra' => ['Bruder']],
                            'ja' => ['sentence' => '私の姉妹も', 'correct' => ['私の', '姉妹', 'も'], 'extra' => ['兄弟']],
                            'ko' => ['sentence' => '나의 자매도', 'correct' => ['나의', '자매도'], 'extra' => ['형제']],
                        ],
                    ],
                    'c' => [
                        'words' => ["c'est", 'mon', 'frère', 'et', 'ma', 'sœur'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'This is my brother and my sister', 'correct' => ['this', 'is', 'my', 'brother', 'and', 'my', 'sister'], 'extra' => ['father']],
                            'es' => ['sentence' => 'Este es mi hermano y mi hermana', 'correct' => ['este', 'es', 'mi', 'hermano', 'y', 'mi', 'hermana'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Das ist mein Bruder und meine Schwester', 'correct' => ['das', 'ist', 'mein', 'Bruder', 'und', 'meine', 'Schwester'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => 'これは私の兄弟と姉妹です', 'correct' => ['これは', '私の', '兄弟', 'と', '姉妹', 'です'], 'extra' => ['父']],
                            'ko' => ['sentence' => '이분은 나의 형제와 자매입니다', 'correct' => ['이분은', '나의', '형제와', '자매입니다'], 'extra' => ['아버지']],
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
                            'es' => ['sentence' => 'Él es profesor', 'correct' => ['él', 'es', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Er ist Lehrer', 'correct' => ['er', 'ist', 'Lehrer'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '彼は先生です', 'correct' => ['彼は', '先生', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '그는 선생님입니다', 'correct' => ['그는', '선생님입니다'], 'extra' => ['의사']],
                        ],
                    ],
                    'b' => [
                        'words' => ['elle est', 'médecin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'She is a doctor', 'correct' => ['she', 'is', 'a', 'doctor'], 'extra' => ['teacher']],
                            'es' => ['sentence' => 'Ella es médica', 'correct' => ['ella', 'es', 'médica'], 'extra' => ['profesora']],
                            'de' => ['sentence' => 'Sie ist Ärztin', 'correct' => ['sie', 'ist', 'Ärztin'], 'extra' => ['Lehrerin']],
                            'ja' => ['sentence' => '彼女は医者です', 'correct' => ['彼女は', '医者', 'です'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '그녀는 의사입니다', 'correct' => ['그녀는', '의사입니다'], 'extra' => ['선생님']],
                        ],
                    ],
                    'c' => [
                        'words' => ['il est', 'médecin', 'et', 'elle est', 'professeur'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'He is a doctor and she is a teacher', 'correct' => ['he', 'is', 'a', 'doctor', 'and', 'she', 'is', 'a', 'teacher'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Él es médico y ella es profesora', 'correct' => ['él', 'es', 'médico', 'y', 'ella', 'es', 'profesora'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Er ist Arzt und sie ist Lehrerin', 'correct' => ['er', 'ist', 'Arzt', 'und', 'sie', 'ist', 'Lehrerin'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '彼は医者で彼女は先生です', 'correct' => ['彼は', '医者', 'で', '彼女は', '先生', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '그는 의사이고 그녀는 선생님입니다', 'correct' => ['그는', '의사이고', '그녀는', '선생님입니다'], 'extra' => ['친구']],
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
                            'es' => ['sentence' => 'Mi amigo', 'correct' => ['mi', 'amigo'], 'extra' => ['vecino', 'quién']],
                            'de' => ['sentence' => 'Mein Freund', 'correct' => ['mein', 'Freund'], 'extra' => ['Nachbar', 'wer']],
                            'ja' => ['sentence' => '私の友達', 'correct' => ['私の', '友達'], 'extra' => ['隣人', '誰']],
                            'ko' => ['sentence' => '나의 친구', 'correct' => ['나의', '친구'], 'extra' => ['이웃', '누구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['qui', 'est', 'mon', 'voisin'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Who is my neighbour', 'correct' => ['who', 'is', 'my', 'neighbour'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Quién es mi vecino', 'correct' => ['quién', 'es', 'mi', 'vecino'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Wer ist mein Nachbar', 'correct' => ['wer', 'ist', 'mein', 'Nachbar'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '誰が私の隣人ですか', 'correct' => ['誰', 'が', '私の', '隣人', 'です', 'か'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '누가 나의 이웃입니까', 'correct' => ['누가', '나의', '이웃입니까'], 'extra' => ['친구']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'ami', 'ou', 'mon', 'voisin'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'My friend or my neighbour', 'correct' => ['my', 'friend', 'or', 'my', 'neighbour'], 'extra' => ['who']],
                            'es' => ['sentence' => 'Mi amigo o mi vecino', 'correct' => ['mi', 'amigo', 'o', 'mi', 'vecino'], 'extra' => ['quién']],
                            'de' => ['sentence' => 'Mein Freund oder mein Nachbar', 'correct' => ['mein', 'Freund', 'oder', 'mein', 'Nachbar'], 'extra' => ['wer']],
                            'ja' => ['sentence' => '私の友達か隣人', 'correct' => ['私の', '友達', 'か', '隣人'], 'extra' => ['誰']],
                            'ko' => ['sentence' => '나의 친구 또는 이웃', 'correct' => ['나의', '친구', '또는', '이웃'], 'extra' => ['누구']],
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
                            'es' => ['sentence' => 'Muy bien', 'correct' => ['muy', 'bien'], 'extra' => ['mi', 'madre']],
                            'de' => ['sentence' => 'Sehr gut', 'correct' => ['sehr', 'gut'], 'extra' => ['mein', 'Mutter']],
                            'ja' => ['sentence' => 'とても良い', 'correct' => ['とても', '良い'], 'extra' => ['私の', '母']],
                            'ko' => ['sentence' => '매우 잘', 'correct' => ['매우', '잘'], 'extra' => ['나의', '어머니']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'est", 'ma', 'mère'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'This is my mother', 'correct' => ['this', 'is', 'my', 'mother'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Esta es mi madre', 'correct' => ['esta', 'es', 'mi', 'madre'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Das ist meine Mutter', 'correct' => ['das', 'ist', 'meine', 'Mutter'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => 'これは私の母です', 'correct' => ['これは', '私の', '母', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '이분은 나의 어머니입니다', 'correct' => ['이분은', '나의', '어머니입니다'], 'extra' => ['친구']],
                        ],
                    ],
                    'c' => [
                        'words' => ["c'est", 'mon', 'ami', 'et', 'ma', 'mère'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'This is my friend and my mother', 'correct' => ['this', 'is', 'my', 'friend', 'and', 'my', 'mother'], 'extra' => ['father']],
                            'es' => ['sentence' => 'Este es mi amigo y mi madre', 'correct' => ['este', 'es', 'mi', 'amigo', 'y', 'mi', 'madre'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Das ist mein Freund und meine Mutter', 'correct' => ['das', 'ist', 'mein', 'Freund', 'und', 'meine', 'Mutter'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => 'これは私の友達と母です', 'correct' => ['これは', '私の', '友達', 'と', '母', 'です'], 'extra' => ['父']],
                            'ko' => ['sentence' => '이분은 나의 친구와 어머니입니다', 'correct' => ['이분은', '나의', '친구와', '어머니입니다'], 'extra' => ['아버지']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
