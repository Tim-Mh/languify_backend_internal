<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitBeginner03Seeder extends Seeder
{
    private const PICTURES = [
        'madre' => 'mother',
        'padre' => 'father',
        'hermano' => 'brother',
        'hermana' => 'sister',
        'amigo' => 'friend',
        'vecino' => 'neighbor',
        'profesor' => 'teacher',
        'médico' => 'doctor',
    ];

    /**
     * Spanish Chapter 1 (Beginner), Unit 3, the Spanish twin of the
     * English "Unit 3: Family & People" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unidad 3: Familia y gente', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Madre y Padre', 1,
                pictures: [
                    [
                        'es' => 'madre',
                        'img' => 'mother',
                    ],
                    [
                        'es' => 'padre',
                        'img' => 'father',
                    ],
                ],
                plain: [
                    [
                        'es' => 'mi',
                    ],
                    [
                        'es' => 'este es',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mi',
                            'madre',
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
                                    'this is',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim ana', 'correct' => ['mənim', 'ana'], 'extra' => ['ata', 'bu']],
                            'ar' => ['sentence' => 'أم', 'correct' => ['أم'], 'extra' => ['أب', 'هذا']],
                            'ru' => ['sentence' => 'мой мама', 'correct' => ['мой', 'мама'], 'extra' => ['папа', 'это']],
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
                            'tr' => ['sentence' => 'annem', 'correct' => ['annem'], 'extra' => ['baba', 'bu']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Este',
                            'es',
                            'mi',
                            'padre',
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
                            'az' => ['sentence' => 'bu mənim ata', 'correct' => ['bu', 'mənim', 'ata'], 'extra' => ['ana']],
                            'ar' => ['sentence' => 'هذا أب', 'correct' => ['هذا', 'أب'], 'extra' => ['أم']],
                            'ru' => ['sentence' => 'это мой папа', 'correct' => ['это', 'мой', 'папа'], 'extra' => ['мама']],
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
                            'tr' => ['sentence' => 'bu benim babam', 'correct' => ['bu', 'benim', 'babam'], 'extra' => ['anne']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'madre',
                            'y',
                            'mi',
                            'padre',
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
                            'az' => ['sentence' => 'mənim ana və mənim ata', 'correct' => ['mənim', 'ana', 'və', 'mənim', 'ata'], 'extra' => ['bu']],
                            'ar' => ['sentence' => 'أم و أب', 'correct' => ['أم', 'و', 'أب'], 'extra' => ['هذا']],
                            'ru' => ['sentence' => 'мой мама и мой папа', 'correct' => ['мой', 'мама', 'и', 'мой', 'папа'], 'extra' => ['это']],
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
                            'tr' => ['sentence' => 'annem ve babam', 'correct' => ['annem', 've', 'babam'], 'extra' => ['bu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 2: Hermano y Hermana', 2,
                pictures: [
                    [
                        'es' => 'hermano',
                        'img' => 'brother',
                    ],
                    [
                        'es' => 'hermana',
                        'img' => 'sister',
                    ],
                ],
                plain: [
                    [
                        'es' => 'él es',
                    ],
                    [
                        'es' => 'ella es',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Él',
                            'es',
                            'mi',
                            'hermano',
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
                            'az' => ['sentence' => 'o mənim qardaş', 'correct' => ['o', 'mənim', 'qardaş'], 'extra' => ['bacı', 'o qadın']],
                            'ar' => ['sentence' => 'هو أخ', 'correct' => ['هو', 'أخ'], 'extra' => ['أخت', 'هي']],
                            'ru' => ['sentence' => 'он мой брат', 'correct' => ['он', 'мой', 'брат'], 'extra' => ['сестра', 'она']],
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
                            'tr' => ['sentence' => 'o benim erkek kardeşim', 'correct' => ['o', 'benim', 'erkek', 'kardeşim'], 'extra' => ['kız kardeş', 'o']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ella',
                            'es',
                            'mi',
                            'hermana',
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
                            'az' => ['sentence' => 'o qadın mənim bacı', 'correct' => ['o qadın', 'mənim', 'bacı'], 'extra' => ['qardaş', 'o']],
                            'ar' => ['sentence' => 'هي أخت', 'correct' => ['هي', 'أخت'], 'extra' => ['أخ', 'هو']],
                            'ru' => ['sentence' => 'она мой сестра', 'correct' => ['она', 'мой', 'сестра'], 'extra' => ['брат', 'он']],
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
                            'tr' => ['sentence' => 'o benim kız kardeşim', 'correct' => ['o', 'benim', 'kız', 'kardeşim'], 'extra' => ['erkek kardeş', 'o']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'hermano',
                            'y',
                            'mi',
                            'hermana',
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
                            'az' => ['sentence' => 'mənim qardaş və mənim bacı', 'correct' => ['mənim', 'qardaş', 'və', 'mənim', 'bacı'], 'extra' => ['o qadın']],
                            'ar' => ['sentence' => 'أخ و أخت', 'correct' => ['أخ', 'و', 'أخت'], 'extra' => ['هي']],
                            'ru' => ['sentence' => 'мой брат и мой сестра', 'correct' => ['мой', 'брат', 'и', 'мой', 'сестра'], 'extra' => ['она']],
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
                            'tr' => ['sentence' => 'erkek kardeşim ve kız kardeşim', 'correct' => ['erkek', 'kardeşim', 've', 'kız', 'kardeşim'], 'extra' => ['o']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 3: Profesor y Médico', 3,
                pictures: [
                    [
                        'es' => 'profesor',
                        'img' => 'teacher',
                    ],
                    [
                        'es' => 'médico',
                        'img' => 'doctor',
                    ],
                ],
                plain: [
                    [
                        'es' => 'es',
                    ],
                    [
                        'es' => 'quién',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quién',
                            'es',
                            'el',
                            'profesor',
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
                            'az' => ['sentence' => 'kim müəllim', 'correct' => ['kim', 'müəllim'], 'extra' => ['həkim']],
                            'ar' => ['sentence' => 'مَن معلم', 'correct' => ['مَن', 'معلم'], 'extra' => ['طبيب']],
                            'ru' => ['sentence' => 'кто учитель', 'correct' => ['кто', 'учитель'], 'extra' => ['врач']],
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
                            'tr' => ['sentence' => 'öğretmen kim', 'correct' => ['öğretmen', 'kim'], 'extra' => ['doktor']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'El',
                            'médico',
                            'está',
                            'aquí',
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
                            'az' => ['sentence' => 'həkim burada', 'correct' => ['həkim', 'burada'], 'extra' => ['müəllim']],
                            'ar' => ['sentence' => 'طبيب هنا', 'correct' => ['طبيب', 'هنا'], 'extra' => ['معلم']],
                            'ru' => ['sentence' => 'врач здесь', 'correct' => ['врач', 'здесь'], 'extra' => ['учитель']],
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
                            'tr' => ['sentence' => 'doktor burada', 'correct' => ['doktor', 'burada'], 'extra' => ['öğretmen']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'El',
                            'profesor',
                            'y',
                            'el',
                            'médico',
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
                            'az' => ['sentence' => 'müəllim və həkim', 'correct' => ['müəllim', 'və', 'həkim'], 'extra' => ['kim']],
                            'ar' => ['sentence' => 'معلم و طبيب', 'correct' => ['معلم', 'و', 'طبيب'], 'extra' => ['مَن']],
                            'ru' => ['sentence' => 'учитель и врач', 'correct' => ['учитель', 'и', 'врач'], 'extra' => ['кто']],
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
                            'tr' => ['sentence' => 'öğretmen ve doktor', 'correct' => ['öğretmen', 've', 'doktor'], 'extra' => ['kim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 4: Amigo y Vecino', 4,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'vecino',
                        'img' => 'neighbor',
                    ],
                ],
                plain: [
                    [
                        'es' => 'también',
                    ],
                    [
                        'es' => 'bueno',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'es',
                            'bueno',
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
                            'az' => ['sentence' => 'mənim dost yaxşı', 'correct' => ['mənim', 'dost', 'yaxşı'], 'extra' => ['qonşu', 'həmçinin']],
                            'ar' => ['sentence' => 'صديق جيد', 'correct' => ['صديق', 'جيد'], 'extra' => ['جار', 'أيضا']],
                            'ru' => ['sentence' => 'мой друг хороший', 'correct' => ['мой', 'друг', 'хороший'], 'extra' => ['сосед', 'тоже']],
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
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => ['komşu', 'de']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'vecino',
                            'también',
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
                                    'good',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim qonşu həmçinin', 'correct' => ['mənim', 'qonşu', 'həmçinin'], 'extra' => ['dost', 'yaxşı']],
                            'ar' => ['sentence' => 'جار أيضا', 'correct' => ['جار', 'أيضا'], 'extra' => ['صديق', 'جيد']],
                            'ru' => ['sentence' => 'мой сосед тоже', 'correct' => ['мой', 'сосед', 'тоже'], 'extra' => ['друг', 'хороший']],
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
                            'tr' => ['sentence' => 'komşum da', 'correct' => ['komşum', 'da'], 'extra' => ['arkadaş', 'iyi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'y',
                            'mi',
                            'vecino',
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
                            'az' => ['sentence' => 'mənim dost və mənim qonşu', 'correct' => ['mənim', 'dost', 'və', 'mənim', 'qonşu'], 'extra' => ['həmçinin']],
                            'ar' => ['sentence' => 'صديق و جار', 'correct' => ['صديق', 'و', 'جار'], 'extra' => ['أيضا']],
                            'ru' => ['sentence' => 'мой друг и мой сосед', 'correct' => ['мой', 'друг', 'и', 'мой', 'сосед'], 'extra' => ['тоже']],
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
                            'tr' => ['sentence' => 'arkadaşım ve komşum', 'correct' => ['arkadaşım', 've', 'komşum'], 'extra' => ['de']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lección 5: Amigo y Madre', 5,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'madre',
                        'img' => 'mother',
                    ],
                ],
                plain: [
                    [
                        'es' => 'bien',
                    ],
                    [
                        'es' => 'muy',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Estoy',
                            'muy',
                            'bien',
                        ],
                        'blank' => 1,
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
                                    'friend',
                                ],
                            ],
                            'az' => ['sentence' => 'mən çox yaxşıyam', 'correct' => ['mən', 'çox', 'yaxşıyam'], 'extra' => ['ana', 'dost']],
                            'ar' => ['sentence' => 'أنا جدا بخير', 'correct' => ['أنا', 'جدا', 'بخير'], 'extra' => ['أم', 'صديق']],
                            'ru' => ['sentence' => 'я очень хорошо', 'correct' => ['я', 'очень', 'хорошо'], 'extra' => ['мама', 'друг']],
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
                            'tr' => ['sentence' => 'çok iyiyim', 'correct' => ['çok', 'iyiyim'], 'extra' => ['anne', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Mi',
                            'amigo',
                            'está',
                            'bien',
                        ],
                        'blank' => 3,
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
                                    'mother',
                                ],
                            ],
                            'az' => ['sentence' => 'mənim dost yaxşıyam', 'correct' => ['mənim', 'dost', 'yaxşıyam'], 'extra' => ['çox', 'ana']],
                            'ar' => ['sentence' => 'صديق بخير', 'correct' => ['صديق', 'بخير'], 'extra' => ['جدا', 'أم']],
                            'ru' => ['sentence' => 'мой друг хорошо', 'correct' => ['мой', 'друг', 'хорошо'], 'extra' => ['очень', 'мама']],
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
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => ['çok', 'anne']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Mi',
                            'madre',
                            'está',
                            'muy',
                            'bien',
                        ],
                        'blank' => 3,
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
                            'az' => ['sentence' => 'mənim ana çox yaxşıyam', 'correct' => ['mənim', 'ana', 'çox', 'yaxşıyam'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أم جدا بخير', 'correct' => ['أم', 'جدا', 'بخير'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'мой мама очень хорошо', 'correct' => ['мой', 'мама', 'очень', 'хорошо'], 'extra' => ['друг']],
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
                            'tr' => ['sentence' => 'annem çok iyi', 'correct' => ['annem', 'çok', 'iyi'], 'extra' => ['arkadaş']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
