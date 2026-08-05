<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitBeginner03Seeder extends Seeder
{
    private const PICTURES = [
        '母' => 'mother',
        '父' => 'father',
        '兄弟' => 'brother',
        '姉妹' => 'sister',
        '友達' => 'friend',
        '隣人' => 'neighbor',
        '先生' => 'teacher',
        '医者' => 'doctor',
    ];

    /**
     * Japanese Chapter 1 (Beginner), Unit 3, the Japanese twin of the
     * English "Unit 3: Family & People" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'ユニット3: 家族と人々', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 母・父', 1,
                pictures: [
                    [
                        'ja' => '母',
                        'img' => 'mother',
                    ],
                    [
                        'ja' => '父',
                        'img' => 'father',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私の',
                    ],
                    [
                        'ja' => 'これは',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私の',
                            '母',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my mother',
                                'correct' => [
                                    'my',
                                    'mother',
                                ],
                                'extra' => [
                                    'father',
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
                            'de' => [
                                'sentence' => 'Meine Mutter',
                                'correct' => [
                                    'meine',
                                    'Mutter',
                                ],
                                'extra' => [
                                    'Vater',
                                    'das ist',
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
                            'これは',
                            '私の',
                            '父',
                            'です',
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
                            'de' => [
                                'sentence' => 'Das ist mein Vater',
                                'correct' => [
                                    'das ist',
                                    'mein',
                                    'Vater',
                                ],
                                'extra' => [
                                    'Mutter',
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
                            '母',
                            'と',
                            '父',
                        ],
                        'blank' => 1,
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
                            'de' => [
                                'sentence' => 'Meine Mutter und mein Vater',
                                'correct' => [
                                    'meine',
                                    'Mutter',
                                    'und',
                                    'mein',
                                    'Vater',
                                ],
                                'extra' => [
                                    'das ist',
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
            $builder->lesson('レッスン2: 兄弟・姉妹', 2,
                pictures: [
                    [
                        'ja' => '兄弟',
                        'img' => 'brother',
                    ],
                    [
                        'ja' => '姉妹',
                        'img' => 'sister',
                    ],
                ],
                plain: [
                    [
                        'ja' => '彼は',
                    ],
                    [
                        'ja' => '彼女は',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '彼は',
                            '私の',
                            '兄弟',
                            'です',
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
                            'de' => [
                                'sentence' => 'Er ist mein Bruder',
                                'correct' => [
                                    'er ist',
                                    'mein',
                                    'Bruder',
                                ],
                                'extra' => [
                                    'Schwester',
                                    'sie ist',
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
                            '彼女は',
                            '私の',
                            '姉妹',
                            'です',
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
                            'de' => [
                                'sentence' => 'Sie ist meine Schwester',
                                'correct' => [
                                    'sie ist',
                                    'meine',
                                    'Schwester',
                                ],
                                'extra' => [
                                    'Bruder',
                                    'er ist',
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
                            '兄弟',
                            'と',
                            '姉妹',
                        ],
                        'blank' => 1,
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
                                    'he is',
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
                            'de' => [
                                'sentence' => 'Mein Bruder und meine Schwester',
                                'correct' => [
                                    'mein',
                                    'Bruder',
                                    'und',
                                    'meine',
                                    'Schwester',
                                ],
                                'extra' => [
                                    'sie ist',
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
            $builder->lesson('レッスン3: 先生・医者', 3,
                pictures: [
                    [
                        'ja' => '先生',
                        'img' => 'teacher',
                    ],
                    [
                        'ja' => '医者',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'です',
                    ],
                    [
                        'ja' => '誰',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '先生',
                            'は',
                            '誰',
                            'です',
                            'か',
                        ],
                        'blank' => 3,
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
                            'de' => [
                                'sentence' => 'Wer ist der Lehrer',
                                'correct' => [
                                    'wer',
                                    'ist',
                                    'der',
                                    'Lehrer',
                                ],
                                'extra' => [
                                    'Arzt',
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
                            '医者',
                            'は',
                            'ここ',
                            'に',
                            'います',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Der Arzt ist hier',
                                'correct' => [
                                    'der',
                                    'Arzt',
                                    'ist',
                                    'hier',
                                ],
                                'extra' => [
                                    'Lehrer',
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
                            '先生',
                            'と',
                            '医者',
                        ],
                        'blank' => 0,
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
                            'de' => [
                                'sentence' => 'Der Lehrer und der Arzt',
                                'correct' => [
                                    'der',
                                    'Lehrer',
                                    'und',
                                    'der',
                                    'Arzt',
                                ],
                                'extra' => [
                                    'wer',
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
            $builder->lesson('レッスン4: 友達・隣人', 4,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '隣人',
                        'img' => 'neighbor',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'も',
                    ],
                    [
                        'ja' => '良い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私の',
                            '友達',
                            'は',
                            '良い',
                            'です',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Mein Freund ist gut',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'Nachbar',
                                    'auch',
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
                            '私の',
                            '隣人',
                            'も',
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
                            'de' => [
                                'sentence' => 'Mein Nachbar auch',
                                'correct' => [
                                    'mein',
                                    'Nachbar',
                                    'auch',
                                ],
                                'extra' => [
                                    'Freund',
                                    'gut',
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
                            '友達',
                            'と',
                            '隣人',
                        ],
                        'blank' => 1,
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
                            'de' => [
                                'sentence' => 'Mein Freund und mein Nachbar',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'und',
                                    'mein',
                                    'Nachbar',
                                ],
                                'extra' => [
                                    'auch',
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
            $builder->lesson('レッスン5: 友達・母', 5,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '母',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'ja' => '元気',
                    ],
                    [
                        'ja' => 'とても',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'とても',
                            '元気',
                            'です',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Mir geht es sehr gut',
                                'correct' => [
                                    'ich',
                                    'bin',
                                    'sehr',
                                    'gut',
                                ],
                                'extra' => [
                                    'Mutter',
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
                            '私の',
                            '友達',
                            'は',
                            '元気',
                            'です',
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
                            'de' => [
                                'sentence' => 'Meinem Freund geht es gut',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'sehr',
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
                            '私の',
                            '母',
                            'は',
                            'とても',
                            '元気',
                            'です',
                        ],
                        'blank' => 5,
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
                            'de' => [
                                'sentence' => 'Meiner Mutter geht es sehr gut',
                                'correct' => [
                                    'meine',
                                    'Mutter',
                                    'ist',
                                    'sehr',
                                    'gut',
                                ],
                                'extra' => [
                                    'Freund',
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
