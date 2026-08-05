<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitBeginner03Seeder extends Seeder
{
    private const PICTURES = [
        'Mutter' => 'mother',
        'Vater' => 'father',
        'Bruder' => 'brother',
        'Schwester' => 'sister',
        'Freund' => 'friend',
        'Nachbar' => 'neighbor',
        'Lehrer' => 'teacher',
        'Arzt' => 'doctor',
    ];

    /**
     * German Chapter 1 (Beginner), Unit 3, the German twin of the
     * English "Unit 3: Family & People" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Einheit 3: Familie & Leute', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Mutter & Vater', 1,
                pictures: [
                    [
                        'de' => 'Mutter',
                        'img' => 'mother',
                    ],
                    [
                        'de' => 'Vater',
                        'img' => 'father',
                    ],
                ],
                plain: [
                    [
                        'de' => 'mein',
                    ],
                    [
                        'de' => 'das ist',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Meine',
                            'Mutter',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my mother',
                                'correct' => [
                                    'my',
                                    'mother',
                                ],
                                'extra' => [
                                    'father',
                                    'this is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi madre',
                                'correct' => [
                                    'mi',
                                    'madre',
                                ],
                                'extra' => [
                                    'padre',
                                    'este es',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma mère',
                                'correct' => [
                                    'ma',
                                    'mère',
                                ],
                                'extra' => [
                                    'père',
                                    'c\'est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の母',
                                'correct' => [
                                    '私の',
                                    '母',
                                ],
                                'extra' => [
                                    '父',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 어머니',
                                'correct' => [
                                    '나의',
                                    '어머니',
                                ],
                                'extra' => [
                                    '아버지',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Das',
                            'ist',
                            'mein',
                            'Vater',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'this is my father',
                                'correct' => [
                                    'this is',
                                    'my',
                                    'father',
                                ],
                                'extra' => [
                                    'mother',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Este es mi padre',
                                'correct' => [
                                    'este es',
                                    'mi',
                                    'padre',
                                ],
                                'extra' => [
                                    'madre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'C\'est mon père',
                                'correct' => [
                                    'c\'est',
                                    'mon',
                                    'père',
                                ],
                                'extra' => [
                                    'mère',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'これは私の父です',
                                'correct' => [
                                    'これは',
                                    '私の',
                                    '父',
                                    'です',
                                ],
                                'extra' => [
                                    '母',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '이분은 나의 아버지입니다',
                                'correct' => [
                                    '이분은',
                                    '나의',
                                    '아버지입니다',
                                ],
                                'extra' => [
                                    '어머니',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Meine',
                            'Mutter',
                            'und',
                            'mein',
                            'Vater',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my mother and my father',
                                'correct' => [
                                    'my',
                                    'mother',
                                    'and',
                                    'my',
                                    'father',
                                ],
                                'extra' => [
                                    'this is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi madre y mi padre',
                                'correct' => [
                                    'mi',
                                    'madre',
                                    'y',
                                    'mi',
                                    'padre',
                                ],
                                'extra' => [
                                    'este es',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma mère et mon père',
                                'correct' => [
                                    'ma',
                                    'mère',
                                    'et',
                                    'mon',
                                    'père',
                                ],
                                'extra' => [
                                    'c\'est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '母と父',
                                'correct' => [
                                    '母',
                                    'と',
                                    '父',
                                ],
                                'extra' => [
                                    'これは',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어머니와 아버지',
                                'correct' => [
                                    '어머니와',
                                    '아버지',
                                ],
                                'extra' => [
                                    '이분은',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Bruder & Schwester', 2,
                pictures: [
                    [
                        'de' => 'Bruder',
                        'img' => 'brother',
                    ],
                    [
                        'de' => 'Schwester',
                        'img' => 'sister',
                    ],
                ],
                plain: [
                    [
                        'de' => 'er ist',
                    ],
                    [
                        'de' => 'sie ist',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Er',
                            'ist',
                            'mein',
                            'Bruder',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'he is my brother',
                                'correct' => [
                                    'he is',
                                    'my',
                                    'brother',
                                ],
                                'extra' => [
                                    'sister',
                                    'she is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Él es mi hermano',
                                'correct' => [
                                    'él es',
                                    'mi',
                                    'hermano',
                                ],
                                'extra' => [
                                    'hermana',
                                    'ella es',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'C\'est mon frère',
                                'correct' => [
                                    'il est',
                                    'mon',
                                    'frère',
                                ],
                                'extra' => [
                                    'sœur',
                                    'elle est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '彼は私の兄弟です',
                                'correct' => [
                                    '彼は',
                                    '私の',
                                    '兄弟',
                                    'です',
                                ],
                                'extra' => [
                                    '姉妹',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그는 나의 형제입니다',
                                'correct' => [
                                    '그는',
                                    '나의',
                                    '형제입니다',
                                ],
                                'extra' => [
                                    '자매',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Sie',
                            'ist',
                            'meine',
                            'Schwester',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'she is my sister',
                                'correct' => [
                                    'she is',
                                    'my',
                                    'sister',
                                ],
                                'extra' => [
                                    'brother',
                                    'he is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Ella es mi hermana',
                                'correct' => [
                                    'ella es',
                                    'mi',
                                    'hermana',
                                ],
                                'extra' => [
                                    'hermano',
                                    'él es',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Elle est ma sœur',
                                'correct' => [
                                    'elle est',
                                    'ma',
                                    'sœur',
                                ],
                                'extra' => [
                                    'frère',
                                    'il est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '彼女は私の姉妹です',
                                'correct' => [
                                    '彼女は',
                                    '私の',
                                    '姉妹',
                                    'です',
                                ],
                                'extra' => [
                                    '兄弟',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '그녀는 나의 자매입니다',
                                'correct' => [
                                    '그녀는',
                                    '나의',
                                    '자매입니다',
                                ],
                                'extra' => [
                                    '형제',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mein',
                            'Bruder',
                            'und',
                            'meine',
                            'Schwester',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my brother and my sister',
                                'correct' => [
                                    'my',
                                    'brother',
                                    'and',
                                    'my',
                                    'sister',
                                ],
                                'extra' => [
                                    'she is',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi hermano y mi hermana',
                                'correct' => [
                                    'mi',
                                    'hermano',
                                    'y',
                                    'mi',
                                    'hermana',
                                ],
                                'extra' => [
                                    'ella es',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon frère et ma sœur',
                                'correct' => [
                                    'mon',
                                    'frère',
                                    'et',
                                    'ma',
                                    'sœur',
                                ],
                                'extra' => [
                                    'elle est',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '兄弟と姉妹',
                                'correct' => [
                                    '兄弟',
                                    'と',
                                    '姉妹',
                                ],
                                'extra' => [
                                    '彼は',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '형제와 자매',
                                'correct' => [
                                    '형제와',
                                    '자매',
                                ],
                                'extra' => [
                                    '그는',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Lehrer & Arzt', 3,
                pictures: [
                    [
                        'de' => 'Lehrer',
                        'img' => 'teacher',
                    ],
                    [
                        'de' => 'Arzt',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ist',
                    ],
                    [
                        'de' => 'wer',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Wer',
                            'ist',
                            'der',
                            'Lehrer',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'who is the teacher',
                                'correct' => [
                                    'who',
                                    'is',
                                    'the',
                                    'teacher',
                                ],
                                'extra' => [
                                    'doctor',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Quién es el profesor',
                                'correct' => [
                                    'quién',
                                    'es',
                                    'el',
                                    'profesor',
                                ],
                                'extra' => [
                                    'médico',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Qui est le professeur',
                                'correct' => [
                                    'qui',
                                    'est',
                                    'le',
                                    'professeur',
                                ],
                                'extra' => [
                                    'médecin',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '先生は誰ですか',
                                'correct' => [
                                    '先生',
                                    'は',
                                    '誰',
                                    'です',
                                    'か',
                                ],
                                'extra' => [
                                    '医者',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '누가 선생님입니까',
                                'correct' => [
                                    '누가',
                                    '선생님입니까',
                                ],
                                'extra' => [
                                    '의사',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Der',
                            'Arzt',
                            'ist',
                            'hier',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the doctor is here',
                                'correct' => [
                                    'the',
                                    'doctor',
                                    'is',
                                    'here',
                                ],
                                'extra' => [
                                    'teacher',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El médico está aquí',
                                'correct' => [
                                    'el',
                                    'médico',
                                    'es',
                                    'aquí',
                                ],
                                'extra' => [
                                    'profesor',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le médecin est ici',
                                'correct' => [
                                    'le',
                                    'médecin',
                                    'est',
                                    'ici',
                                ],
                                'extra' => [
                                    'professeur',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '医者はここにいます',
                                'correct' => [
                                    '医者',
                                    'は',
                                    'ここ',
                                    'に',
                                    'います',
                                ],
                                'extra' => [
                                    '先生',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '의사는 여기 있습니다',
                                'correct' => [
                                    '의사는',
                                    '여기',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '선생님',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Der',
                            'Lehrer',
                            'und',
                            'der',
                            'Arzt',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the teacher and the doctor',
                                'correct' => [
                                    'the',
                                    'teacher',
                                    'and',
                                    'the',
                                    'doctor',
                                ],
                                'extra' => [
                                    'who',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'El profesor y el médico',
                                'correct' => [
                                    'el',
                                    'profesor',
                                    'y',
                                    'el',
                                    'médico',
                                ],
                                'extra' => [
                                    'quién',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le professeur et le médecin',
                                'correct' => [
                                    'le',
                                    'professeur',
                                    'et',
                                    'le',
                                    'médecin',
                                ],
                                'extra' => [
                                    'qui',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '先生と医者',
                                'correct' => [
                                    '先生',
                                    'と',
                                    '医者',
                                ],
                                'extra' => [
                                    '誰',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '선생님과 의사',
                                'correct' => [
                                    '선생님과',
                                    '의사',
                                ],
                                'extra' => [
                                    '누구',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Freund & Nachbar', 4,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Nachbar',
                        'img' => 'neighbor',
                    ],
                ],
                plain: [
                    [
                        'de' => 'auch',
                    ],
                    [
                        'de' => 'gut',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mein',
                            'Freund',
                            'ist',
                            'gut',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is good',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'neighbour',
                                    'also',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi amigo es bueno',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'vecino',
                                    'también',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami est bon',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'voisin',
                                    'aussi',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達は良いです',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '良い',
                                    'です',
                                ],
                                'extra' => [
                                    '隣人',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 좋습니다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '좋습니다',
                                ],
                                'extra' => [
                                    '이웃',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mein',
                            'Nachbar',
                            'auch',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my neighbour also',
                                'correct' => [
                                    'my',
                                    'neighbour',
                                    'also',
                                ],
                                'extra' => [
                                    'friend',
                                    'well',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi vecino también',
                                'correct' => [
                                    'mi',
                                    'vecino',
                                    'también',
                                ],
                                'extra' => [
                                    'amigo',
                                    'bueno',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon voisin aussi',
                                'correct' => [
                                    'mon',
                                    'voisin',
                                    'aussi',
                                ],
                                'extra' => [
                                    'ami',
                                    'bon',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の隣人も',
                                'correct' => [
                                    '私の',
                                    '隣人',
                                    'も',
                                ],
                                'extra' => [
                                    '友達',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 이웃도',
                                'correct' => [
                                    '나의',
                                    '이웃도',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mein',
                            'Freund',
                            'und',
                            'mein',
                            'Nachbar',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend and my neighbour',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'and',
                                    'my',
                                    'neighbour',
                                ],
                                'extra' => [
                                    'also',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi amigo y mi vecino',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'y',
                                    'mi',
                                    'vecino',
                                ],
                                'extra' => [
                                    'también',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami et mon voisin',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'et',
                                    'mon',
                                    'voisin',
                                ],
                                'extra' => [
                                    'aussi',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '友達と隣人',
                                'correct' => [
                                    '友達',
                                    'と',
                                    '隣人',
                                ],
                                'extra' => [
                                    'も',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '친구와 이웃',
                                'correct' => [
                                    '친구와',
                                    '이웃',
                                ],
                                'extra' => [
                                    '또한',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Freund & Mutter', 5,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Mutter',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'de' => 'gut',
                    ],
                    [
                        'de' => 'sehr',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mir',
                            'geht',
                            'es',
                            'sehr',
                            'gut',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am very well',
                                'correct' => [
                                    'I',
                                    'am',
                                    'very',
                                    'well',
                                ],
                                'extra' => [
                                    'mother',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Estoy muy bien',
                                'correct' => [
                                    'estoy',
                                    'muy',
                                    'bien',
                                ],
                                'extra' => [
                                    'madre',
                                    'amigo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je vais très bien',
                                'correct' => [
                                    'je',
                                    'suis',
                                    'très',
                                    'bien',
                                ],
                                'extra' => [
                                    'mère',
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はとても元気です',
                                'correct' => [
                                    '私',
                                    'は',
                                    'とても',
                                    '元気',
                                    'です',
                                ],
                                'extra' => [
                                    '母',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 매우 잘 지냅니다',
                                'correct' => [
                                    '저는',
                                    '매우',
                                    '잘',
                                    '지냅니다',
                                ],
                                'extra' => [
                                    '어머니',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Meinem',
                            'Freund',
                            'geht',
                            'es',
                            'gut',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is well',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'well',
                                ],
                                'extra' => [
                                    'very',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi amigo está bien',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'es',
                                    'bien',
                                ],
                                'extra' => [
                                    'muy',
                                    'madre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami va bien',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'bien',
                                ],
                                'extra' => [
                                    'très',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達は元気です',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '元気',
                                    'です',
                                ],
                                'extra' => [
                                    'とても',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 잘 지냅니다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '잘',
                                    '지냅니다',
                                ],
                                'extra' => [
                                    '매우',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Meiner',
                            'Mutter',
                            'geht',
                            'es',
                            'sehr',
                            'gut',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my mother is very well',
                                'correct' => [
                                    'my',
                                    'mother',
                                    'is',
                                    'very',
                                    'well',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi madre está muy bien',
                                'correct' => [
                                    'mi',
                                    'madre',
                                    'es',
                                    'muy',
                                    'bien',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma mère va très bien',
                                'correct' => [
                                    'ma',
                                    'mère',
                                    'est',
                                    'très',
                                    'bien',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の母はとても元気です',
                                'correct' => [
                                    '私の',
                                    '母',
                                    'は',
                                    'とても',
                                    '元気',
                                    'です',
                                ],
                                'extra' => [
                                    '友達',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 어머니는 매우 잘 지냅니다',
                                'correct' => [
                                    '나의',
                                    '어머니는',
                                    '매우',
                                    '잘',
                                    '지냅니다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
