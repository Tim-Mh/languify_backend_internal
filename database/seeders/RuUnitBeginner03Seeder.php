<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitBeginner03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Мама' => 'mother', 'Папа' => 'father', 'Брат' => 'brother', 'Сестра' => 'sister',
        'Друг' => 'friend', 'Сосед' => 'neighbor', 'Учитель' => 'teacher', 'Врач' => 'doctor',
    ];

    /**
     * Russian Beginner Unit 3.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Russian sentences are built from the shared plan tile by tile, and
     * every tile is a RussianVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ru')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Family', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Mother & Father', 1,
                pictures: [['ru' => 'Мама', 'img' => 'mother'], ['ru' => 'Папа', 'img' => 'father']],
                plain: [['ru' => 'Это'], ['ru' => 'Мой']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'мой', 'мама'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my mother', 'correct' => ['this is', 'my', 'mother'], 'extra' => ['father']],
                            'az' => ['sentence' => 'bu mənim ana', 'correct' => ['bu', 'mənim', 'ana'], 'extra' => ['ata']],
                            'ar' => ['sentence' => 'هذا أم', 'correct' => ['هذا', 'أم'], 'extra' => ['أب']],
                            'fr' => ['sentence' => 'Ceci est ma mère', 'correct' => ['ceci est', 'ma', 'mère'], 'extra' => ['père']],
                            'es' => ['sentence' => 'Esta es mi madre', 'correct' => ['esta es', 'mi', 'madre'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Das ist meine Mutter', 'correct' => ['das ist', 'meine', 'Mutter'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => 'これは私の母です', 'correct' => ['これは', '私の', '母', 'です'], 'extra' => ['父']],
                            'ko' => ['sentence' => '이것은 내 어머니입니다', 'correct' => ['이것은', '내', '어머니입니다'], 'extra' => ['아버지']],
                            'tr' => ['sentence' => 'bu benim annem', 'correct' => ['bu', 'benim', 'annem'], 'extra' => ['anne', 'baba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'мой', 'папа'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my father', 'correct' => ['this is', 'my', 'father'], 'extra' => ['mother']],
                            'az' => ['sentence' => 'bu mənim ata', 'correct' => ['bu', 'mənim', 'ata'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'هذا أب', 'correct' => ['هذا', 'أب'], 'extra' => ['أم']],
                            'fr' => ['sentence' => 'Ceci est mon père', 'correct' => ['ceci est', 'mon', 'père'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Este es mi padre', 'correct' => ['este es', 'mi', 'padre'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Das ist mein Vater', 'correct' => ['das ist', 'mein', 'Vater'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => 'これは私の父です', 'correct' => ['これは', '私の', '父', 'です'], 'extra' => ['母']],
                            'ko' => ['sentence' => '이것은 내 아버지입니다', 'correct' => ['이것은', '내', '아버지입니다'], 'extra' => ['어머니']],
                            'tr' => ['sentence' => 'bu benim babam', 'correct' => ['bu', 'benim', 'babam'], 'extra' => ['anne', 'baba']],
                        ],
                    ],
                    'c' => [
                        'words' => ['мой', 'мама', 'и', 'мой', 'папа'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother and my father', 'correct' => ['my', 'mother', 'and', 'my', 'father'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'mənim ana və mənim ata', 'correct' => ['mənim', 'ana', 'və', 'mənim', 'ata'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أم و أب', 'correct' => ['أم', 'و', 'أب'], 'extra' => ['صديق']],
                            'fr' => ['sentence' => 'Ma mère et mon père', 'correct' => ['ma', 'mère', 'et', 'mon', 'père'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の母と私の父', 'correct' => ['私の', '母', 'と', '私の', '父'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '내 어머니와 내 아버지', 'correct' => ['내', '어머니와', '내', '아버지'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'annem ve babam', 'correct' => ['annem', 've', 'babam'], 'extra' => ['bu', 'benim']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Brother & Sister', 2,
                pictures: [['ru' => 'Брат', 'img' => 'brother'], ['ru' => 'Сестра', 'img' => 'sister']],
                plain: [['ru' => 'Это'], ['ru' => 'Может быть']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'брат'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A brother', 'correct' => ['this is', 'a', 'brother'], 'extra' => ['sister', 'and']],
                            'az' => ['sentence' => 'bu bir qardaş', 'correct' => ['bu', 'bir', 'qardaş'], 'extra' => ['bacı', 'və']],
                            'ar' => ['sentence' => 'هذا أخ', 'correct' => ['هذا', 'أخ'], 'extra' => ['أخت', 'و']],
                            'fr' => ['sentence' => "C'est Un frère", 'correct' => ["c'est", 'un', 'frère'], 'extra' => ['sœur', 'et']],
                            'es' => ['sentence' => 'Esto es Un hermano', 'correct' => ['esto es', 'un', 'hermano'], 'extra' => ['hermana', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Bruder', 'correct' => ['das ist', 'ein', 'Bruder'], 'extra' => ['Schwester', 'und']],
                            'ja' => ['sentence' => 'これは兄弟です', 'correct' => ['これは', '兄弟'], 'extra' => ['姉妹', 'と']],
                            'ko' => ['sentence' => '이것은 남자 형제입니다', 'correct' => ['이것은', '남자', '형제'], 'extra' => ['여자 형제', '그리고']],
                            'tr' => ['sentence' => 'bir erkek kardeş', 'correct' => ['bir', 'erkek kardeş'], 'extra' => ['ve', 'kız kardeş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'сестра'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A sister', 'correct' => ['this is', 'a', 'sister'], 'extra' => ['brother', 'and']],
                            'az' => ['sentence' => 'bu bir bacı', 'correct' => ['bu', 'bir', 'bacı'], 'extra' => ['qardaş', 'və']],
                            'ar' => ['sentence' => 'هذا أخت', 'correct' => ['هذا', 'أخت'], 'extra' => ['أخ', 'و']],
                            'fr' => ['sentence' => "C'est Une sœur", 'correct' => ["c'est", 'une', 'sœur'], 'extra' => ['frère', 'et']],
                            'es' => ['sentence' => 'Esto es Una hermana', 'correct' => ['esto es', 'una', 'hermana'], 'extra' => ['hermano', 'y']],
                            'de' => ['sentence' => 'Das ist Eine Schwester', 'correct' => ['das ist', 'eine', 'Schwester'], 'extra' => ['Bruder', 'und']],
                            'ja' => ['sentence' => 'これは姉妹です', 'correct' => ['これは', '姉妹'], 'extra' => ['兄弟', 'と']],
                            'ko' => ['sentence' => '이것은 여자 형제입니다', 'correct' => ['이것은', '여자', '형제'], 'extra' => ['남자 형제', '그리고']],
                            'tr' => ['sentence' => 'bir kız kardeş', 'correct' => ['bir', 'kız kardeş'], 'extra' => ['ve', 'erkek kardeş']],
                        ],
                    ],
                    'c' => [
                        'words' => ['брат', 'и', 'сестра'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A brother and a sister', 'correct' => ['a', 'brother', 'and', 'a', 'sister'], 'extra' => ['mother']],
                            'az' => ['sentence' => 'bir qardaş və bir bacı', 'correct' => ['bir', 'qardaş', 'və', 'bir', 'bacı'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'أخ و أخت', 'correct' => ['أخ', 'و', 'أخت'], 'extra' => ['أم']],
                            'fr' => ['sentence' => 'Un frère et une sœur', 'correct' => ['un', 'frère', 'et', 'une', 'sœur'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Un hermano y una hermana', 'correct' => ['un', 'hermano', 'y', 'una', 'hermana'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Ein Bruder und eine Schwester', 'correct' => ['ein', 'Bruder', 'und', 'eine', 'Schwester'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '兄弟と姉妹', 'correct' => ['兄弟', 'と', '姉妹'], 'extra' => ['母']],
                            'ko' => ['sentence' => '남자 형제와 여자 형제', 'correct' => ['남자', '형제와', '여자', '형제'], 'extra' => ['어머니']],
                            'tr' => ['sentence' => 'bir erkek kardeş ve bir kız kardeş', 'correct' => ['bir', 'erkek kardeş', 've', 'bir', 'kız kardeş'], 'extra' => []],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Friend & Neighbour', 3,
                pictures: [['ru' => 'Друг', 'img' => 'friend'], ['ru' => 'Сосед', 'img' => 'neighbor']],
                plain: [['ru' => 'Мой'], ['ru' => 'Это']],
                phrases: [
                    'a' => [
                        'words' => ['мой', 'друг'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My friend', 'correct' => ['my', 'friend'], 'extra' => ['neighbour']],
                            'az' => ['sentence' => 'mənim dost', 'correct' => ['mənim', 'dost'], 'extra' => ['qonşu']],
                            'ar' => ['sentence' => 'صديق', 'correct' => ['صديق'], 'extra' => ['جار']],
                            'fr' => ['sentence' => 'Mon ami', 'correct' => ['mon', 'ami'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Mi amigo', 'correct' => ['mi', 'amigo'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Mein Freund', 'correct' => ['mein', 'Freund'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => '私の友達', 'correct' => ['私の', '友達'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '내 친구', 'correct' => ['내', '친구'], 'extra' => ['이웃']],
                            'tr' => ['sentence' => 'benim arkadaşım', 'correct' => ['benim', 'arkadaşım'], 'extra' => ['ve', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'сосед'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A neighbour', 'correct' => ['this is', 'a', 'neighbour'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'bu bir qonşu', 'correct' => ['bu', 'bir', 'qonşu'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'هذا جار', 'correct' => ['هذا', 'جار'], 'extra' => ['صديق']],
                            'fr' => ['sentence' => "C'est Un voisin", 'correct' => ["c'est", 'un', 'voisin'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Esto es Un vecino', 'correct' => ['esto es', 'un', 'vecino'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Das ist Ein Nachbar', 'correct' => ['das ist', 'ein', 'Nachbar'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => 'これは隣人です', 'correct' => ['これは', '隣人'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '이것은 이웃입니다', 'correct' => ['이것은', '이웃'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'bir komşu', 'correct' => ['bir', 'komşu'], 'extra' => ['benim', 've']],
                        ],
                    ],
                    'c' => [
                        'words' => ['мой', 'друг', 'и', 'сосед'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'My friend and a neighbour', 'correct' => ['my', 'friend', 'and', 'a', 'neighbour'], 'extra' => ['father']],
                            'az' => ['sentence' => 'mənim dost və bir qonşu', 'correct' => ['mənim', 'dost', 'və', 'bir', 'qonşu'], 'extra' => ['ata']],
                            'ar' => ['sentence' => 'صديق و جار', 'correct' => ['صديق', 'و', 'جار'], 'extra' => ['أب']],
                            'fr' => ['sentence' => 'Mon ami et un voisin', 'correct' => ['mon', 'ami', 'et', 'un', 'voisin'], 'extra' => ['père']],
                            'es' => ['sentence' => 'Mi amigo y un vecino', 'correct' => ['mi', 'amigo', 'y', 'un', 'vecino'], 'extra' => ['padre']],
                            'de' => ['sentence' => 'Mein Freund und ein Nachbar', 'correct' => ['mein', 'Freund', 'und', 'ein', 'Nachbar'], 'extra' => ['Vater']],
                            'ja' => ['sentence' => '私の友達と隣人', 'correct' => ['私の', '友達', 'と', '隣人'], 'extra' => ['父']],
                            'ko' => ['sentence' => '내 친구와 이웃', 'correct' => ['내', '친구와', '이웃'], 'extra' => ['아버지']],
                            'tr' => ['sentence' => 'benim arkadaşım ve bir komşu', 'correct' => ['benim', 'arkadaşım', 've', 'bir', 'komşu'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Teacher & Doctor', 4,
                pictures: [['ru' => 'Учитель', 'img' => 'teacher'], ['ru' => 'Врач', 'img' => 'doctor']],
                plain: [['ru' => 'Это'], ['ru' => 'Может быть']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'учитель'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A teacher', 'correct' => ['this is', 'a', 'teacher'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'bu bir müəllim', 'correct' => ['bu', 'bir', 'müəllim'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'هذا معلم', 'correct' => ['هذا', 'معلم'], 'extra' => ['طبيب']],
                            'fr' => ['sentence' => "C'est Un professeur", 'correct' => ["c'est", 'un', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Esto es Un profesor', 'correct' => ['esto es', 'un', 'profesor'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Das ist Ein Lehrer', 'correct' => ['das ist', 'ein', 'Lehrer'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => 'これは先生です', 'correct' => ['これは', '先生'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '이것은 선생님입니다', 'correct' => ['이것은', '선생님'], 'extra' => ['의사']],
                            'tr' => ['sentence' => 'bir öğretmen', 'correct' => ['bir', 'öğretmen'], 'extra' => ['bu', 'doktor']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'врач'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is a doctor', 'correct' => ['this is', 'a', 'doctor'], 'extra' => ['teacher']],
                            'az' => ['sentence' => 'bu bir həkim', 'correct' => ['bu', 'bir', 'həkim'], 'extra' => ['müəllim']],
                            'ar' => ['sentence' => 'هذا طبيب', 'correct' => ['هذا', 'طبيب'], 'extra' => ['معلم']],
                            'fr' => ['sentence' => 'Ceci est un médecin', 'correct' => ['ceci est', 'un', 'médecin'], 'extra' => ['professeur']],
                            'es' => ['sentence' => 'Este es un médico', 'correct' => ['este es', 'un', 'médico'], 'extra' => ['profesor']],
                            'de' => ['sentence' => 'Das ist ein Arzt', 'correct' => ['das ist', 'ein', 'Arzt'], 'extra' => ['Lehrer']],
                            'ja' => ['sentence' => 'これは医者です', 'correct' => ['これは', '医者', 'です'], 'extra' => ['先生']],
                            'ko' => ['sentence' => '이것은 의사입니다', 'correct' => ['이것은', '의사입니다'], 'extra' => ['선생님']],
                            'tr' => ['sentence' => 'bu bir doktor', 'correct' => ['bu', 'bir', 'doktor'], 'extra' => ['öğretmen']],
                        ],
                    ],
                    'c' => [
                        'words' => ['учитель', 'и', 'врач'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A teacher and a doctor', 'correct' => ['a', 'teacher', 'and', 'a', 'doctor'], 'extra' => ['friend']],
                            'az' => ['sentence' => 'bir müəllim və bir həkim', 'correct' => ['bir', 'müəllim', 'və', 'bir', 'həkim'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'معلم و طبيب', 'correct' => ['معلم', 'و', 'طبيب'], 'extra' => ['صديق']],
                            'fr' => ['sentence' => 'Un professeur et un médecin', 'correct' => ['un', 'professeur', 'et', 'un', 'médecin'], 'extra' => ['ami']],
                            'es' => ['sentence' => 'Un profesor y un médico', 'correct' => ['un', 'profesor', 'y', 'un', 'médico'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ein Lehrer und ein Arzt', 'correct' => ['ein', 'Lehrer', 'und', 'ein', 'Arzt'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '先生と医者', 'correct' => ['先生', 'と', '医者'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '선생님과 의사', 'correct' => ['선생님과', '의사'], 'extra' => ['친구']],
                            'tr' => ['sentence' => 'bir öğretmen ve bir doktor', 'correct' => ['bir', 'öğretmen', 've', 'bir', 'doktor'], 'extra' => ['bu']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Family', 5,
                pictures: [['ru' => 'Брат', 'img' => 'brother'], ['ru' => 'Мама', 'img' => 'mother']],
                plain: [['ru' => 'Мой'], ['ru' => 'Учитель']],
                phrases: [
                    'a' => [
                        'words' => ['мой', 'брат'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My sibling', 'correct' => ['my', 'sibling'], 'extra' => ['mother']],
                            'az' => ['sentence' => 'mənim qardaş', 'correct' => ['mənim', 'qardaş'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'أخ', 'correct' => ['أخ'], 'extra' => ['أم']],
                            'fr' => ['sentence' => 'Mon frère', 'correct' => ['mon', 'frère'], 'extra' => ['mère']],
                            'es' => ['sentence' => 'Mi hermano', 'correct' => ['mi', 'hermano'], 'extra' => ['madre']],
                            'de' => ['sentence' => 'Mein Geschwister', 'correct' => ['mein', 'Geschwister'], 'extra' => ['Mutter']],
                            'ja' => ['sentence' => '私の兄弟', 'correct' => ['私の', '兄弟'], 'extra' => ['母']],
                            'ko' => ['sentence' => '내 형제', 'correct' => ['내', '형제'], 'extra' => ['어머니']],
                            'tr' => ['sentence' => 'benim kardeşim', 'correct' => ['benim', 'kardeşim'], 'extra' => ['öğretmen', 'anne']],
                        ],
                    ],
                    'b' => [
                        'words' => ['мой', 'мама', 'учитель'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My mother is a teacher', 'correct' => ['my', 'mother is', 'a', 'teacher'], 'extra' => ['doctor']],
                            'az' => ['sentence' => 'mənim ana bir müəllim', 'correct' => ['mənim', 'ana', 'bir', 'müəllim'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'أم معلم', 'correct' => ['أم', 'معلم'], 'extra' => ['طبيب']],
                            'fr' => ['sentence' => 'Ma mère est professeur', 'correct' => ['ma', 'mère est', 'professeur'], 'extra' => ['médecin']],
                            'es' => ['sentence' => 'Mi madre es profesora', 'correct' => ['mi', 'madre es', 'profesora'], 'extra' => ['médico']],
                            'de' => ['sentence' => 'Meine Mutter ist Lehrerin', 'correct' => ['meine', 'Mutter ist', 'Lehrerin'], 'extra' => ['Arzt']],
                            'ja' => ['sentence' => '私の母は先生です', 'correct' => ['私の', '母', 'は', '先生', 'です'], 'extra' => ['医者']],
                            'ko' => ['sentence' => '내 어머니는 선생님입니다', 'correct' => ['내', '어머니는', '선생님입니다'], 'extra' => ['의사']],
                            'tr' => ['sentence' => 'annem bir öğretmen', 'correct' => ['annem', 'bir', 'öğretmen'], 'extra' => ['kardeşim', 'anne']],
                        ],
                    ],
                    'c' => [
                        'words' => ['мой', 'мама', 'мой', 'папа', 'и', 'мой', 'друг'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My mother my father and my friend', 'correct' => ['my', 'mother', 'my', 'father', 'and', 'my', 'friend'], 'extra' => ['neighbour']],
                            'az' => ['sentence' => 'mənim ana mənim ata və mənim dost', 'correct' => ['mənim', 'ana', 'mənim', 'ata', 'və', 'mənim', 'dost'], 'extra' => ['qonşu']],
                            'ar' => ['sentence' => 'أم أب و صديق', 'correct' => ['أم', 'أب', 'و', 'صديق'], 'extra' => ['جار']],
                            'fr' => ['sentence' => 'Ma mère mon père et mon ami', 'correct' => ['ma', 'mère', 'mon', 'père', 'et', 'mon', 'ami'], 'extra' => ['voisin']],
                            'es' => ['sentence' => 'Mi madre mi padre y mi amigo', 'correct' => ['mi', 'madre', 'mi', 'padre', 'y', 'mi', 'amigo'], 'extra' => ['vecino']],
                            'de' => ['sentence' => 'Meine Mutter mein Vater und mein Freund', 'correct' => ['meine', 'Mutter', 'mein', 'Vater', 'und', 'mein', 'Freund'], 'extra' => ['Nachbar']],
                            'ja' => ['sentence' => '私の母、私の父と私の友達', 'correct' => ['私の', '母', '私の', '父', 'と', '私の', '友達'], 'extra' => ['隣人']],
                            'ko' => ['sentence' => '내 어머니 내 아버지와 내 친구', 'correct' => ['내', '어머니', '내', '아버지와', '내', '친구'], 'extra' => ['이웃']],
                            'tr' => ['sentence' => 'annem babam ve benim arkadaşım', 'correct' => ['annem', 'babam', 've', 'benim', 'arkadaşım'], 'extra' => ['kardeşim', 'öğretmen']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
