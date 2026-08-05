<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Anne' => 'mother', 'Baba' => 'father', 'Arkadaş' => 'friend', 'Komşu' => 'neighbor',
        'Öğretmen' => 'teacher', 'Doktor' => 'doctor', 'Kız kardeş' => 'sister', 'Erkek kardeş' => 'brother',
    ];

    /**
     * Turkish Beginner Unit 3 — family and the people around you.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * TURKISH-SPECIFIC CHOICES IN THIS UNIT
     *
     * 1. Siblings are gendered. Turkish has no bare word for "brother" or
     *    "sister" — it has `erkek kardeş` (male sibling) and `kız kardeş`
     *    (female sibling). Both are single vocabulary entries and single tiles,
     *    because splitting them would ask the learner to build a compound whose
     *    halves mean "man" and "girl".
     *
     * 2. Possessive `-m` versus `-ım`. `anne` and `baba` end in vowels and take
     *    a bare `-m` (`annem`, `babam`); `arkadaş` ends in a consonant and needs
     *    a harmony vowel first (`arkadaşım`). One suffix tile could not serve
     *    both, which is exactly why possessed forms are whole entries.
     *
     * 3. Still no copula. `Bu benim annem` is a complete sentence — "this my
     *    mother" — and the translations say "This is my mother" only because
     *    the learner's own language needs a verb there.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Family', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Mother & Father', 1,
                pictures: [['tr' => 'Anne', 'img' => 'mother'], ['tr' => 'Baba', 'img' => 'father']],
                plain: [['tr' => 'Bu'], ['tr' => 'Benim']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'benim', 'annem'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my mother', 'correct' => ['this', 'my', 'mother'], 'extra' => ['father']],
                            'fr' => ['sentence' => 'Ceci est ma mère', 'correct' => ['ceci', 'ma', 'mère'], 'extra' => ['père']],
                            'es' => ['sentence' => 'Esta es mi madre', 'correct' => ['esta', 'mi', 'madre'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Das ist meine Mutter', 'correct' => ['das', 'meine', 'Mutter'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => 'これは私の母です', 'correct' => ['これは', '私の', '母', 'です'], 'extra' => ['父']],
                            'ko' => ['sentence' => '이것은 내 어머니입니다', 'correct' => ['이것은', '내', '어머니입니다'], 'extra' => ['아버지']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'benim', 'babam'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my father', 'correct' => ['this', 'my', 'father'], 'extra' => ['mother']],
                            'fr' => ['sentence' => 'Ceci est mon père', 'correct' => ['ceci', 'mon', 'père'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Este es mi padre', 'correct' => ['este', 'mi', 'padre'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Das ist mein Vater', 'correct' => ['das', 'mein', 'Vater'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => 'これは私の父です', 'correct' => ['これは', '私の', '父', 'です'], 'extra' => ['母']],
                            'ko' => ['sentence' => '이것은 내 아버지입니다', 'correct' => ['이것은', '내', '아버지입니다'], 'extra' => ['어머니']],
                        ],
                    ],
                    'c' => [
                        'words' => ['annem', 've', 'babam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother and my father', 'correct' => ['my', 'mother', 'and', 'my', 'father'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Ma mère et mon père', 'correct' => ['ma', 'mère', 'et', 'mon', 'père'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の母と私の父', 'correct' => ['私の', '母', 'と', '私の', '父'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '내 어머니와 내 아버지', 'correct' => ['내', '어머니와', '내', '아버지'], 'extra' => ['친구']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Brother & Sister', 2,
                pictures: [['tr' => 'Erkek kardeş', 'img' => 'brother'], ['tr' => 'Kız kardeş', 'img' => 'sister']],
                plain: [['tr' => 'Ve'], ['tr' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'erkek kardeş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A brother', 'correct' => ['a', 'brother'], 'extra' => ['sister', 'and']],
                            'fr' => ['sentence' => 'Un frère', 'correct' => ['un', 'frère'], 'extra' => ['sœur', 'et']],
                            'es' => ['sentence' => 'Un hermano', 'correct' => ['un', 'hermano'], 'extra' => ['hermana', 'y']],
                            'de' => ['sentence' => 'Ein Bruder', 'correct' => ['ein', 'Bruder'], 'extra' => ['Schwester', 'und']],
                            'ja' => ['sentence' => '兄弟', 'correct' => ['兄弟'], 'extra' => ['姉妹', 'と']],
                            'ko' => ['sentence' => '남자 형제', 'correct' => ['남자', '형제'], 'extra' => ['여자 형제', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'kız kardeş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A sister', 'correct' => ['a', 'sister'], 'extra' => ['brother', 'and']],
                            'fr' => ['sentence' => 'Une sœur', 'correct' => ['une', 'sœur'], 'extra' => ['frère', 'et']],
                            'es' => ['sentence' => 'Una hermana', 'correct' => ['una', 'hermana'], 'extra' => ['hermano', 'y']],
                            'de' => ['sentence' => 'Eine Schwester', 'correct' => ['eine', 'Schwester'], 'extra' => ['Bruder', 'und']],
                            'ja' => ['sentence' => '姉妹', 'correct' => ['姉妹'], 'extra' => ['兄弟', 'と']],
                            'ko' => ['sentence' => '여자 형제', 'correct' => ['여자', '형제'], 'extra' => ['남자 형제', '그리고']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'erkek kardeş', 've', 'bir', 'kız kardeş'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A brother and a sister', 'correct' => ['a', 'brother', 'and', 'a', 'sister'], 'extra' => ['mother']],
                            'fr' => ['sentence' => 'Un frère et une sœur', 'correct' => ['un', 'frère', 'et', 'une', 'sœur'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Un hermano y una hermana', 'correct' => ['un', 'hermano', 'y', 'una', 'hermana'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Ein Bruder und eine Schwester', 'correct' => ['ein', 'Bruder', 'und', 'eine', 'Schwester'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '兄弟と姉妹', 'correct' => ['兄弟', 'と', '姉妹'], 'extra' => ['母']],
                            'ko' => ['sentence' => '남자 형제와 여자 형제', 'correct' => ['남자', '형제와', '여자', '형제'], 'extra' => ['어머니']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Friend & Neighbour', 3,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Komşu', 'img' => 'neighbor']],
                plain: [['tr' => 'Benim'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['benim', 'arkadaşım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My friend', 'correct' => ['my', 'friend'], 'extra' => ['neighbour']],
                            'fr' => ['sentence' => 'Mon ami', 'correct' => ['mon', 'ami'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Mi amigo', 'correct' => ['mi', 'amigo'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Mein Freund', 'correct' => ['mein', 'Freund'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => '私の友達', 'correct' => ['私の', '友達'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '내 친구', 'correct' => ['내', '친구'], 'extra' => ['이웃']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'komşu'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A neighbour', 'correct' => ['a', 'neighbour'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Un voisin', 'correct' => ['un', 'voisin'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Un vecino', 'correct' => ['un', 'vecino'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ein Nachbar', 'correct' => ['ein', 'Nachbar'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '隣人', 'correct' => ['隣人'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '이웃', 'correct' => ['이웃'], 'extra' => ['친구']],
                        ],
                    ],
                    'c' => [
                        'words' => ['benim', 'arkadaşım', 've', 'bir', 'komşu'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My friend and a neighbour', 'correct' => ['my', 'friend', 'and', 'a', 'neighbour'], 'extra' => ['father']],
                            'fr' => ['sentence' => 'Mon ami et un voisin', 'correct' => ['mon', 'ami', 'et', 'un', 'voisin'], 'extra' => ['père']],
                            'es' => ['sentence' => 'Mi amigo y un vecino', 'correct' => ['mi', 'amigo', 'y', 'un', 'vecino'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Mein Freund und ein Nachbar', 'correct' => ['mein', 'Freund', 'und', 'ein', 'Nachbar'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => '私の友達と隣人', 'correct' => ['私の', '友達', 'と', '隣人'], 'extra' => ['父']],
                            'ko' => ['sentence' => '내 친구와 이웃', 'correct' => ['내', '친구와', '이웃'], 'extra' => ['아버지']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Teacher & Doctor', 4,
                pictures: [['tr' => 'Öğretmen', 'img' => 'teacher'], ['tr' => 'Doktor', 'img' => 'doctor']],
                plain: [['tr' => 'Bu'], ['tr' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'öğretmen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A teacher', 'correct' => ['a', 'teacher'], 'extra' => ['doctor']],
                            'fr' => ['sentence' => 'Un professeur', 'correct' => ['un', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Un profesor', 'correct' => ['un', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Ein Lehrer', 'correct' => ['ein', 'Lehrer'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '先生', 'correct' => ['先生'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '선생님', 'correct' => ['선생님'], 'extra' => ['의사']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'bir', 'doktor'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is a doctor', 'correct' => ['this', 'a', 'doctor'], 'extra' => ['teacher']],
                            'fr' => ['sentence' => 'Ceci est un médecin', 'correct' => ['ceci', 'un', 'médecin'], 'extra' => ['professeur']],
                            'es' => ['sentence' => 'Este es un médico', 'correct' => ['este', 'un', 'médico'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Das ist ein Arzt', 'correct' => ['das', 'ein', 'Arzt'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => 'これは医者です', 'correct' => ['これは', '医者', 'です'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '이것은 의사입니다', 'correct' => ['이것은', '의사입니다'], 'extra' => ['선생님']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'öğretmen', 've', 'bir', 'doktor'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A teacher and a doctor', 'correct' => ['a', 'teacher', 'and', 'a', 'doctor'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Un professeur et un médecin', 'correct' => ['un', 'professeur', 'et', 'un', 'médecin'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Un profesor y un médico', 'correct' => ['un', 'profesor', 'y', 'un', 'médico'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ein Lehrer und ein Arzt', 'correct' => ['ein', 'Lehrer', 'und', 'ein', 'Arzt'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '先生と医者', 'correct' => ['先生', 'と', '医者'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '선생님과 의사', 'correct' => ['선생님과', '의사'], 'extra' => ['친구']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Family', 5,
                pictures: [['tr' => 'Anne', 'img' => 'mother'], ['tr' => 'Arkadaş', 'img' => 'friend']],
                plain: [['tr' => 'Kardeşim'], ['tr' => 'Öğretmen']],
                phrases: [
                    'a' => [
                        'words' => ['benim', 'kardeşim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My sibling', 'correct' => ['my', 'sibling'], 'extra' => ['mother']],
                            'fr' => ['sentence' => 'Mon frère', 'correct' => ['mon', 'frère'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Mi hermano', 'correct' => ['mi', 'hermano'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Mein Geschwister', 'correct' => ['mein', 'Geschwister'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '私の兄弟', 'correct' => ['私の', '兄弟'], 'extra' => ['母']],
                            'ko' => ['sentence' => '내 형제', 'correct' => ['내', '형제'], 'extra' => ['어머니']],
                        ],
                    ],
                    'b' => [
                        'words' => ['annem', 'bir', 'öğretmen'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My mother is a teacher', 'correct' => ['my', 'mother', 'a', 'teacher'], 'extra' => ['doctor']],
                            'fr' => ['sentence' => 'Ma mère est professeur', 'correct' => ['ma', 'mère', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Mi madre es profesora', 'correct' => ['mi', 'madre', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Meine Mutter ist Lehrerin', 'correct' => ['meine', 'Mutter', 'Lehrer'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '私の母は先生です', 'correct' => ['私の', '母', 'は', '先生', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '내 어머니는 선생님입니다', 'correct' => ['내', '어머니는', '선생님입니다'], 'extra' => ['의사']],
                        ],
                    ],
                    'c' => [
                        'words' => ['annem', 'babam', 've', 'benim', 'arkadaşım'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My mother my father and my friend', 'correct' => ['my', 'mother', 'my', 'father', 'and', 'my', 'friend'], 'extra' => ['neighbour']],
                            'fr' => ['sentence' => 'Ma mère mon père et mon ami', 'correct' => ['ma', 'mère', 'mon', 'père', 'et', 'mon', 'ami'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Mi madre mi padre y mi amigo', 'correct' => ['mi', 'madre', 'mi', 'padre', 'y', 'mi', 'amigo'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Meine Mutter mein Vater und mein Freund', 'correct' => ['meine', 'Mutter', 'mein', 'Vater', 'und', 'mein', 'Freund'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => '私の母、私の父と私の友達', 'correct' => ['私の', '母', '私の', '父', 'と', '私の', '友達'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '내 어머니 내 아버지와 내 친구', 'correct' => ['내', '어머니', '내', '아버지와', '내', '친구'], 'extra' => ['이웃']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
