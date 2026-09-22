<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitBeginner03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Ana' => 'mother', 'Ata' => 'father', 'Qardaş' => 'brother', 'Bacı' => 'sister',
        'Dost' => 'friend', 'Qonşu' => 'neighbor', 'Müəllim' => 'teacher', 'Həkim' => 'doctor',
    ];

    /**
     * Azerbaijani Beginner Unit 3.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Family', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Mother & Father', 1,
                pictures: [['az' => 'Ana', 'img' => 'mother'], ['az' => 'Ata', 'img' => 'father']],
                plain: [['az' => 'Bu'], ['az' => 'Mənim']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'mənim', 'ana'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is my mother', 'correct' => ['this is', 'my', 'mother'], 'extra' => ['father']],
                            'fr' => ['sentence' => 'Ceci est ma mère', 'correct' => ['ceci est', 'ma', 'mère'], 'extra' => ['père']],
                            'es' => ['sentence' => 'Esta es mi madre', 'correct' => ['esta es', 'mi', 'madre'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Das ist meine Mutter', 'correct' => ['das ist', 'meine', 'Mutter'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => 'これは私の母です', 'correct' => ['これは', '私の', '母', 'です'], 'extra' => ['父']],
                            'ko' => ['sentence' => '이것은 내 어머니입니다', 'correct' => ['이것은', '내', '어머니입니다'], 'extra' => ['아버지']],
                            'tr' => ['sentence' => 'bu benim annem', 'correct' => ['bu', 'benim', 'annem'], 'extra' => ['anne', 'baba']],
                            'ru' => ['sentence' => 'это мой мама', 'correct' => ['это', 'мой', 'мама'], 'extra' => ['папа']],
                            'ar' => ['sentence' => 'هذا أم', 'correct' => ['هذا', 'أم'], 'extra' => ['أب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'mənim', 'ata'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is my father', 'correct' => ['this is', 'my', 'father'], 'extra' => ['mother']],
                            'fr' => ['sentence' => 'Ceci est mon père', 'correct' => ['ceci est', 'mon', 'père'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Este es mi padre', 'correct' => ['este es', 'mi', 'padre'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Das ist mein Vater', 'correct' => ['das ist', 'mein', 'Vater'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => 'これは私の父です', 'correct' => ['これは', '私の', '父', 'です'], 'extra' => ['母']],
                            'ko' => ['sentence' => '이것은 내 아버지입니다', 'correct' => ['이것은', '내', '아버지입니다'], 'extra' => ['어머니']],
                            'tr' => ['sentence' => 'bu benim babam', 'correct' => ['bu', 'benim', 'babam'], 'extra' => ['anne', 'baba']],
                            'ru' => ['sentence' => 'это мой папа', 'correct' => ['это', 'мой', 'папа'], 'extra' => ['мама']],
                            'ar' => ['sentence' => 'هذا أب', 'correct' => ['هذا', 'أب'], 'extra' => ['أم']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mənim', 'ana', 'və', 'mənim', 'ata'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My mother and my father', 'correct' => ['my', 'mother', 'and', 'my', 'father'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Ma mère et mon père', 'correct' => ['ma', 'mère', 'et', 'mon', 'père'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の母と私の父', 'correct' => ['私の', '母', 'と', '私の', '父'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '내 어머니와 내 아버지', 'correct' => ['내', '어머니와', '내', '아버지'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'annem ve babam', 'correct' => ['annem', 've', 'babam'], 'extra' => ['bu', 'benim']],
                            'ru' => ['sentence' => 'мой мама и мой папа', 'correct' => ['мой', 'мама', 'и', 'мой', 'папа'], 'extra' => ['друг']],
                            'ar' => ['sentence' => 'أم و أب', 'correct' => ['أم', 'و', 'أب'], 'extra' => ['صديق']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Brother & Sister', 2,
                pictures: [['az' => 'Qardaş', 'img' => 'brother'], ['az' => 'Bacı', 'img' => 'sister']],
                plain: [['az' => 'Bir'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'qardaş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A brother', 'correct' => ['a', 'brother'], 'extra' => ['sister', 'and']],
                            'fr' => ['sentence' => 'Un frère', 'correct' => ['un', 'frère'], 'extra' => ['sœur', 'et']],
                            'es' => ['sentence' => 'Un hermano', 'correct' => ['un', 'hermano'], 'extra' => ['hermana', 'y']],
                            'de' => ['sentence' => 'Ein Bruder', 'correct' => ['ein', 'Bruder'], 'extra' => ['Schwester', 'und']],
                            'ja' => ['sentence' => '兄弟', 'correct' => ['兄弟'], 'extra' => ['姉妹', 'と']],
                            'ko' => ['sentence' => '남자 형제', 'correct' => ['남자', '형제'], 'extra' => ['여자 형제', '그리고']],
                            'tr' => ['sentence' => 'bir erkek kardeş', 'correct' => ['bir', 'erkek kardeş'], 'extra' => ['ve', 'kız kardeş']],
                            'ru' => ['sentence' => 'брат', 'correct' => ['брат'], 'extra' => ['сестра', 'и']],
                            'ar' => ['sentence' => 'أخ', 'correct' => ['أخ'], 'extra' => ['أخت', 'و']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'bacı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A sister', 'correct' => ['a', 'sister'], 'extra' => ['brother', 'and']],
                            'fr' => ['sentence' => 'Une sœur', 'correct' => ['une', 'sœur'], 'extra' => ['frère', 'et']],
                            'es' => ['sentence' => 'Una hermana', 'correct' => ['una', 'hermana'], 'extra' => ['hermano', 'y']],
                            'de' => ['sentence' => 'Eine Schwester', 'correct' => ['eine', 'Schwester'], 'extra' => ['Bruder', 'und']],
                            'ja' => ['sentence' => '姉妹', 'correct' => ['姉妹'], 'extra' => ['兄弟', 'と']],
                            'ko' => ['sentence' => '여자 형제', 'correct' => ['여자', '형제'], 'extra' => ['남자 형제', '그리고']],
                            'tr' => ['sentence' => 'bir kız kardeş', 'correct' => ['bir', 'kız kardeş'], 'extra' => ['ve', 'erkek kardeş']],
                            'ru' => ['sentence' => 'сестра', 'correct' => ['сестра'], 'extra' => ['брат', 'и']],
                            'ar' => ['sentence' => 'أخت', 'correct' => ['أخت'], 'extra' => ['أخ', 'و']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'qardaş', 'və', 'bir', 'bacı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A brother and a sister', 'correct' => ['a', 'brother', 'and', 'a', 'sister'], 'extra' => ['mother']],
                            'fr' => ['sentence' => 'Un frère et une sœur', 'correct' => ['un', 'frère', 'et', 'une', 'sœur'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Un hermano y una hermana', 'correct' => ['un', 'hermano', 'y', 'una', 'hermana'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Ein Bruder und eine Schwester', 'correct' => ['ein', 'Bruder', 'und', 'eine', 'Schwester'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '兄弟と姉妹', 'correct' => ['兄弟', 'と', '姉妹'], 'extra' => ['母']],
                            'ko' => ['sentence' => '남자 형제와 여자 형제', 'correct' => ['남자', '형제와', '여자', '형제'], 'extra' => ['어머니']],
                            'tr' => ['sentence' => 'bir erkek kardeş ve bir kız kardeş', 'correct' => ['bir', 'erkek kardeş', 've', 'bir', 'kız kardeş'], 'extra' => []],
                            'ru' => ['sentence' => 'брат и сестра', 'correct' => ['брат', 'и', 'сестра'], 'extra' => ['мама']],
                            'ar' => ['sentence' => 'أخ و أخت', 'correct' => ['أخ', 'و', 'أخت'], 'extra' => ['أم']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Friend & Neighbour', 3,
                pictures: [['az' => 'Dost', 'img' => 'friend'], ['az' => 'Qonşu', 'img' => 'neighbor']],
                plain: [['az' => 'Mənim'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['mənim', 'dost'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My friend', 'correct' => ['my', 'friend'], 'extra' => ['neighbour']],
                            'fr' => ['sentence' => 'Mon ami', 'correct' => ['mon', 'ami'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Mi amigo', 'correct' => ['mi', 'amigo'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Mein Freund', 'correct' => ['mein', 'Freund'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => '私の友達', 'correct' => ['私の', '友達'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '내 친구', 'correct' => ['내', '친구'], 'extra' => ['이웃']],
                            'tr' => ['sentence' => 'benim arkadaşım', 'correct' => ['benim', 'arkadaşım'], 'extra' => ['ve', 'arkadaş']],
                            'ru' => ['sentence' => 'мой друг', 'correct' => ['мой', 'друг'], 'extra' => ['сосед']],
                            'ar' => ['sentence' => 'صديق', 'correct' => ['صديق'], 'extra' => ['جار']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'qonşu'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A neighbour', 'correct' => ['a', 'neighbour'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Un voisin', 'correct' => ['un', 'voisin'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Un vecino', 'correct' => ['un', 'vecino'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ein Nachbar', 'correct' => ['ein', 'Nachbar'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '隣人', 'correct' => ['隣人'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '이웃', 'correct' => ['이웃'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'bir komşu', 'correct' => ['bir', 'komşu'], 'extra' => ['benim', 've']],
                            'ru' => ['sentence' => 'сосед', 'correct' => ['сосед'], 'extra' => ['друг']],
                            'ar' => ['sentence' => 'جار', 'correct' => ['جار'], 'extra' => ['صديق']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mənim', 'dost', 'və', 'bir', 'qonşu'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My friend and a neighbour', 'correct' => ['my', 'friend', 'and', 'a', 'neighbour'], 'extra' => ['father']],
                            'fr' => ['sentence' => 'Mon ami et un voisin', 'correct' => ['mon', 'ami', 'et', 'un', 'voisin'], 'extra' => ['père']],
                            'es' => ['sentence' => 'Mi amigo y un vecino', 'correct' => ['mi', 'amigo', 'y', 'un', 'vecino'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Mein Freund und ein Nachbar', 'correct' => ['mein', 'Freund', 'und', 'ein', 'Nachbar'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => '私の友達と隣人', 'correct' => ['私の', '友達', 'と', '隣人'], 'extra' => ['父']],
                            'ko' => ['sentence' => '내 친구와 이웃', 'correct' => ['내', '친구와', '이웃'], 'extra' => ['아버지']],
                            'tr' => ['sentence' => 'benim arkadaşım ve bir komşu', 'correct' => ['benim', 'arkadaşım', 've', 'bir', 'komşu'], 'extra' => ['arkadaş']],
                            'ru' => ['sentence' => 'мой друг и сосед', 'correct' => ['мой', 'друг', 'и', 'сосед'], 'extra' => ['папа']],
                            'ar' => ['sentence' => 'صديق و جار', 'correct' => ['صديق', 'و', 'جار'], 'extra' => ['أب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Teacher & Doctor', 4,
                pictures: [['az' => 'Müəllim', 'img' => 'teacher'], ['az' => 'Həkim', 'img' => 'doctor']],
                plain: [['az' => 'Bir'], ['az' => 'Bu']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'müəllim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A teacher', 'correct' => ['a', 'teacher'], 'extra' => ['doctor']],
                            'fr' => ['sentence' => 'Un professeur', 'correct' => ['un', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Un profesor', 'correct' => ['un', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Ein Lehrer', 'correct' => ['ein', 'Lehrer'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '先生', 'correct' => ['先生'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '선생님', 'correct' => ['선생님'], 'extra' => ['의사']],
                            'tr' => ['sentence' => 'bir öğretmen', 'correct' => ['bir', 'öğretmen'], 'extra' => ['bu', 'doktor']],
                            'ru' => ['sentence' => 'учитель', 'correct' => ['учитель'], 'extra' => ['врач']],
                            'ar' => ['sentence' => 'معلم', 'correct' => ['معلم'], 'extra' => ['طبيب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'bir', 'həkim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is a doctor', 'correct' => ['this is', 'a', 'doctor'], 'extra' => ['teacher']],
                            'fr' => ['sentence' => 'Ceci est un médecin', 'correct' => ['ceci est', 'un', 'médecin'], 'extra' => ['professeur']],
                            'es' => ['sentence' => 'Este es un médico', 'correct' => ['este es', 'un', 'médico'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Das ist ein Arzt', 'correct' => ['das ist', 'ein', 'Arzt'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => 'これは医者です', 'correct' => ['これは', '医者', 'です'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '이것은 의사입니다', 'correct' => ['이것은', '의사입니다'], 'extra' => ['선생님']],
                            'tr' => ['sentence' => 'bu bir doktor', 'correct' => ['bu', 'bir', 'doktor'], 'extra' => ['öğretmen']],
                            'ru' => ['sentence' => 'это врач', 'correct' => ['это', 'врач'], 'extra' => ['учитель']],
                            'ar' => ['sentence' => 'هذا طبيب', 'correct' => ['هذا', 'طبيب'], 'extra' => ['معلم']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'müəllim', 'və', 'bir', 'həkim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A teacher and a doctor', 'correct' => ['a', 'teacher', 'and', 'a', 'doctor'], 'extra' => ['friend']],
                            'fr' => ['sentence' => 'Un professeur et un médecin', 'correct' => ['un', 'professeur', 'et', 'un', 'médecin'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Un profesor y un médico', 'correct' => ['un', 'profesor', 'y', 'un', 'médico'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ein Lehrer und ein Arzt', 'correct' => ['ein', 'Lehrer', 'und', 'ein', 'Arzt'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '先生と医者', 'correct' => ['先生', 'と', '医者'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '선생님과 의사', 'correct' => ['선생님과', '의사'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'bir öğretmen ve bir doktor', 'correct' => ['bir', 'öğretmen', 've', 'bir', 'doktor'], 'extra' => ['bu']],
                            'ru' => ['sentence' => 'учитель и врач', 'correct' => ['учитель', 'и', 'врач'], 'extra' => ['друг']],
                            'ar' => ['sentence' => 'معلم و طبيب', 'correct' => ['معلم', 'و', 'طبيب'], 'extra' => ['صديق']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Family', 5,
                pictures: [['az' => 'Qardaş', 'img' => 'brother'], ['az' => 'Ana', 'img' => 'mother']],
                plain: [['az' => 'Mənim'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['mənim', 'qardaş'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My sibling', 'correct' => ['my', 'sibling'], 'extra' => ['mother']],
                            'fr' => ['sentence' => 'Mon frère', 'correct' => ['mon', 'frère'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Mi hermano', 'correct' => ['mi', 'hermano'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Mein Geschwister', 'correct' => ['mein', 'Geschwister'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '私の兄弟', 'correct' => ['私の', '兄弟'], 'extra' => ['母']],
                            'ko' => ['sentence' => '내 형제', 'correct' => ['내', '형제'], 'extra' => ['어머니']],
                            'tr' => ['sentence' => 'benim kardeşim', 'correct' => ['benim', 'kardeşim'], 'extra' => ['öğretmen', 'anne']],
                            'ru' => ['sentence' => 'мой брат', 'correct' => ['мой', 'брат'], 'extra' => ['мама']],
                            'ar' => ['sentence' => 'أخ', 'correct' => ['أخ'], 'extra' => ['أم']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mənim', 'ana', 'bir', 'müəllim'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'My mother is a teacher', 'correct' => ['my', 'mother is', 'a', 'teacher'], 'extra' => ['doctor']],
                            'fr' => ['sentence' => 'Ma mère est professeur', 'correct' => ['ma', 'mère est', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Mi madre es profesora', 'correct' => ['mi', 'madre es', 'profesora'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Meine Mutter ist Lehrerin', 'correct' => ['meine', 'Mutter ist', 'Lehrerin'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '私の母は先生です', 'correct' => ['私の', '母', 'は', '先生', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '내 어머니는 선생님입니다', 'correct' => ['내', '어머니는', '선생님입니다'], 'extra' => ['의사']],
                            'tr' => ['sentence' => 'annem bir öğretmen', 'correct' => ['annem', 'bir', 'öğretmen'], 'extra' => ['kardeşim', 'anne']],
                            'ru' => ['sentence' => 'мой мама учитель', 'correct' => ['мой', 'мама', 'учитель'], 'extra' => ['врач']],
                            'ar' => ['sentence' => 'أم معلم', 'correct' => ['أم', 'معلم'], 'extra' => ['طبيب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mənim', 'ana', 'mənim', 'ata', 'və', 'mənim', 'dost'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My mother my father and my friend', 'correct' => ['my', 'mother', 'my', 'father', 'and', 'my', 'friend'], 'extra' => ['neighbour']],
                            'fr' => ['sentence' => 'Ma mère mon père et mon ami', 'correct' => ['ma', 'mère', 'mon', 'père', 'et', 'mon', 'ami'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Mi madre mi padre y mi amigo', 'correct' => ['mi', 'madre', 'mi', 'padre', 'y', 'mi', 'amigo'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Meine Mutter mein Vater und mein Freund', 'correct' => ['meine', 'Mutter', 'mein', 'Vater', 'und', 'mein', 'Freund'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => '私の母、私の父と私の友達', 'correct' => ['私の', '母', '私の', '父', 'と', '私の', '友達'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '내 어머니 내 아버지와 내 친구', 'correct' => ['내', '어머니', '내', '아버지와', '내', '친구'], 'extra' => ['이웃']],
                            'tr' => ['sentence' => 'annem babam ve benim arkadaşım', 'correct' => ['annem', 'babam', 've', 'benim', 'arkadaşım'], 'extra' => ['kardeşim', 'öğretmen']],
                            'ru' => ['sentence' => 'мой мама мой папа и мой друг', 'correct' => ['мой', 'мама', 'мой', 'папа', 'и', 'мой', 'друг'], 'extra' => ['сосед']],
                            'ar' => ['sentence' => 'أم أب و صديق', 'correct' => ['أم', 'أب', 'و', 'صديق'], 'extra' => ['جار']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
