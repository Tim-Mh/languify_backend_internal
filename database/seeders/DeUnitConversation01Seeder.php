<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitConversation01Seeder extends Seeder
{
    private const PICTURES = [
        'Lehrer' => 'teacher',
        'Freund' => 'friend',
        'Haus' => 'house',
        'Schule' => 'school',
        'Mutter' => 'mother',
        'Vater' => 'father',
        'Bruder' => 'brother',
        'Schwester' => 'sister',
    ];

    /**
     * German Chapter 2 (Conversation), Unit 1, the German twin of the
     * English "Unit 1: Introducing Yourself" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Einheit 1: Sich vorstellen', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Lehrer & Freund', 1,
                pictures: [
                    [
                        'de' => 'Lehrer',
                        'img' => 'teacher',
                    ],
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Name',
                    ],
                    [
                        'de' => 'ich bin',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mein',
                            'Name',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my name',
                                'correct' => [
                                    'my',
                                    'name',
                                ],
                                'extra' => [
                                    'friend',
                                    'I am',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi nombre',
                                'correct' => [
                                    'mi',
                                    'nombre',
                                ],
                                'extra' => [
                                    'amigo',
                                    'soy',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon nom',
                                'correct' => [
                                    'mon',
                                    'nom',
                                ],
                                'extra' => [
                                    'ami',
                                    'je suis',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の名前',
                                'correct' => [
                                    '私の',
                                    '名前',
                                ],
                                'extra' => [
                                    '友達',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 이름',
                                'correct' => [
                                    '나의',
                                    '이름',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'bin',
                            'Lehrer',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I am a teacher',
                                'correct' => [
                                    'I am',
                                    'a',
                                    'teacher',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Soy profesor',
                                'correct' => [
                                    'soy',
                                    'profesor',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je suis professeur',
                                'correct' => [
                                    'je suis',
                                    'professeur',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は先生です',
                                'correct' => [
                                    '私',
                                    'は',
                                    '先生',
                                    'です',
                                ],
                                'extra' => [
                                    '友達',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저는 선생님입니다',
                                'correct' => [
                                    '저는',
                                    '선생님입니다',
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
                            'ist',
                            'Lehrer',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my friend is a teacher',
                                'correct' => [
                                    'my',
                                    'friend',
                                    'is',
                                    'a',
                                    'teacher',
                                ],
                                'extra' => [
                                    'name',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi amigo es profesor',
                                'correct' => [
                                    'mi',
                                    'amigo',
                                    'es',
                                    'profesor',
                                ],
                                'extra' => [
                                    'nombre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon ami est professeur',
                                'correct' => [
                                    'mon',
                                    'ami',
                                    'est',
                                    'professeur',
                                ],
                                'extra' => [
                                    'nom',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の友達は先生です',
                                'correct' => [
                                    '私の',
                                    '友達',
                                    'は',
                                    '先生',
                                    'です',
                                ],
                                'extra' => [
                                    '名前',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 친구는 선생님입니다',
                                'correct' => [
                                    '나의',
                                    '친구는',
                                    '선생님입니다',
                                ],
                                'extra' => [
                                    '이름',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Haus & Schule', 2,
                pictures: [
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                    [
                        'de' => 'Schule',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'de' => 'ich wohne',
                    ],
                    [
                        'de' => 'Stadt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'wohne',
                            'hier',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I live here',
                                'correct' => [
                                    'I live',
                                    'here',
                                ],
                                'extra' => [
                                    'town',
                                    'house',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Vivo aquí',
                                'correct' => [
                                    'vivo',
                                    'aquí',
                                ],
                                'extra' => [
                                    'ciudad',
                                    'casa',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'habite ici',
                                'correct' => [
                                    'j\'habite',
                                    'ici',
                                ],
                                'extra' => [
                                    'ville',
                                    'maison',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私はここに住んでいる',
                                'correct' => [
                                    '私',
                                    'は',
                                    'ここ',
                                    'に',
                                    '住んで',
                                    'いる',
                                ],
                                'extra' => [
                                    '都市',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 여기에 삽니다',
                                'correct' => [
                                    '나는',
                                    '여기에',
                                    '삽니다',
                                ],
                                'extra' => [
                                    '도시',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ich',
                            'wohne',
                            'in',
                            'einer',
                            'Stadt',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I live in a city',
                                'correct' => [
                                    'I live',
                                    'in',
                                    'a',
                                    'city',
                                ],
                                'extra' => [
                                    'school',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Vivo en una ciudad',
                                'correct' => [
                                    'vivo',
                                    'en',
                                    'una',
                                    'ciudad',
                                ],
                                'extra' => [
                                    'escuela',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'J\'habite dans une ville',
                                'correct' => [
                                    'j\'habite',
                                    'dans',
                                    'une',
                                    'ville',
                                ],
                                'extra' => [
                                    'école',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私は都市に住んでいる',
                                'correct' => [
                                    '私',
                                    'は',
                                    '都市',
                                    'に',
                                    '住んで',
                                    'いる',
                                ],
                                'extra' => [
                                    '学校',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나는 도시에 삽니다',
                                'correct' => [
                                    '나는',
                                    '도시에',
                                    '삽니다',
                                ],
                                'extra' => [
                                    '학교',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Haus',
                            'und',
                            'eine',
                            'Schule',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a house and a school',
                                'correct' => [
                                    'a',
                                    'house',
                                    'and',
                                    'a',
                                    'school',
                                ],
                                'extra' => [
                                    'town',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Una casa y una escuela',
                                'correct' => [
                                    'una',
                                    'casa',
                                    'y',
                                    'una',
                                    'escuela',
                                ],
                                'extra' => [
                                    'ciudad',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une maison et une école',
                                'correct' => [
                                    'une',
                                    'maison',
                                    'et',
                                    'une',
                                    'école',
                                ],
                                'extra' => [
                                    'ville',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '家と学校',
                                'correct' => [
                                    '家',
                                    'と',
                                    '学校',
                                ],
                                'extra' => [
                                    '都市',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '집과 학교',
                                'correct' => [
                                    '집과',
                                    '학교',
                                ],
                                'extra' => [
                                    '도시',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Mutter & Vater', 3,
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
                        'de' => 'Alter',
                    ],
                    [
                        'de' => 'Jahre alt',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mein',
                            'Alter',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my age',
                                'correct' => [
                                    'my',
                                    'age',
                                ],
                                'extra' => [
                                    'years old',
                                    'mother',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi edad',
                                'correct' => [
                                    'mi',
                                    'edad',
                                ],
                                'extra' => [
                                    'años',
                                    'madre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Mon âge',
                                'correct' => [
                                    'mon',
                                    'âge',
                                ],
                                'extra' => [
                                    'ans',
                                    'mère',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の年齢',
                                'correct' => [
                                    '私の',
                                    '年齢',
                                ],
                                'extra' => [
                                    '歳',
                                    '母',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 나이',
                                'correct' => [
                                    '나의',
                                    '나이',
                                ],
                                'extra' => [
                                    '살',
                                    '어머니',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Zehn',
                            'Jahre',
                            'alt',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'ten years old',
                                'correct' => [
                                    'ten',
                                    'years old',
                                ],
                                'extra' => [
                                    'age',
                                    'father',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Diez años',
                                'correct' => [
                                    'diez',
                                    'años',
                                ],
                                'extra' => [
                                    'edad',
                                    'padre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Dix ans',
                                'correct' => [
                                    'dix',
                                    'ans',
                                ],
                                'extra' => [
                                    'âge',
                                    'père',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '十歳',
                                'correct' => [
                                    '十歳',
                                ],
                                'extra' => [
                                    '年齢',
                                    '父',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '열 살',
                                'correct' => [
                                    '열',
                                    '살',
                                ],
                                'extra' => [
                                    '나이',
                                    '아버지',
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
                        'blank' => 3,
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
                                    'age',
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
                                    'edad',
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
                                    'âge',
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
                                    '年齢',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '어머니와 아버지',
                                'correct' => [
                                    '어머니와',
                                    '아버지',
                                ],
                                'extra' => [
                                    '나이',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Bruder & Schwester', 4,
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
                        'de' => 'du bist',
                    ],
                    [
                        'de' => 'dein',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Du',
                            'bist',
                            'mein',
                            'Bruder',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'you are my brother',
                                'correct' => [
                                    'you are',
                                    'my',
                                    'brother',
                                ],
                                'extra' => [
                                    'sister',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Eres mi hermano',
                                'correct' => [
                                    'eres',
                                    'mi',
                                    'hermano',
                                ],
                                'extra' => [
                                    'hermana',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Tu es mon frère',
                                'correct' => [
                                    'tu es',
                                    'mon',
                                    'frère',
                                ],
                                'extra' => [
                                    'sœur',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'あなたは私の兄弟です',
                                'correct' => [
                                    'あなた',
                                    'は',
                                    '私の',
                                    '兄弟',
                                    'です',
                                ],
                                'extra' => [
                                    '姉妹',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '당신은 나의 형제입니다',
                                'correct' => [
                                    '당신은',
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
                            'Dein',
                            'Name',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'your name',
                                'correct' => [
                                    'your',
                                    'name',
                                ],
                                'extra' => [
                                    'my',
                                    'age',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Tu nombre',
                                'correct' => [
                                    'tu',
                                    'nombre',
                                ],
                                'extra' => [
                                    'mi',
                                    'edad',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ton nom',
                                'correct' => [
                                    'ton',
                                    'nom',
                                ],
                                'extra' => [
                                    'mon',
                                    'âge',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'あなたの名前',
                                'correct' => [
                                    'あなたの',
                                    '名前',
                                ],
                                'extra' => [
                                    '私の',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '당신의 이름',
                                'correct' => [
                                    '당신의',
                                    '이름',
                                ],
                                'extra' => [
                                    '나의',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Meine',
                            'Schwester',
                            'und',
                            'dein',
                            'Bruder',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'my sister and your brother',
                                'correct' => [
                                    'my',
                                    'sister',
                                    'and',
                                    'your',
                                    'brother',
                                ],
                                'extra' => [
                                    'name',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Mi hermana y tu hermano',
                                'correct' => [
                                    'mi',
                                    'hermana',
                                    'y',
                                    'tu',
                                    'hermano',
                                ],
                                'extra' => [
                                    'nombre',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Ma sœur et ton frère',
                                'correct' => [
                                    'ma',
                                    'sœur',
                                    'et',
                                    'ton',
                                    'frère',
                                ],
                                'extra' => [
                                    'nom',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の姉妹とあなたの兄弟',
                                'correct' => [
                                    '私の',
                                    '姉妹',
                                    'と',
                                    'あなたの',
                                    '兄弟',
                                ],
                                'extra' => [
                                    '名前',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 자매와 당신의 형제',
                                'correct' => [
                                    '나의',
                                    '자매와',
                                    '당신의',
                                    '형제',
                                ],
                                'extra' => [
                                    '이름',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Freund & Haus', 5,
                pictures: [
                    [
                        'de' => 'Freund',
                        'img' => 'friend',
                    ],
                    [
                        'de' => 'Haus',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'de' => 'freut mich',
                    ],
                    [
                        'de' => 'willkommen',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Freut',
                            'mich',
                            'mein',
                            'Freund',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'nice to meet you my friend',
                                'correct' => [
                                    'nice to meet you',
                                    'my',
                                    'friend',
                                ],
                                'extra' => [
                                    'welcome',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Encantado, mi amigo',
                                'correct' => [
                                    'encantado',
                                    'mi',
                                    'amigo',
                                ],
                                'extra' => [
                                    'bienvenido',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Enchanté, mon ami',
                                'correct' => [
                                    'enchanté',
                                    'mon',
                                    'ami',
                                ],
                                'extra' => [
                                    'bienvenue',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'はじめまして、私の友達',
                                'correct' => [
                                    'はじめまして',
                                    '私の',
                                    '友達',
                                ],
                                'extra' => [
                                    'ようこそ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '반갑습니다, 나의 친구',
                                'correct' => [
                                    '반갑습니다',
                                    '나의',
                                    '친구',
                                ],
                                'extra' => [
                                    '환영합니다',
                                ],
                            ],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Willkommen',
                            'in',
                            'meinem',
                            'Haus',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'welcome to my house',
                                'correct' => [
                                    'welcome',
                                    'to',
                                    'my',
                                    'house',
                                ],
                                'extra' => [
                                    'friend',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Bienvenido a mi casa',
                                'correct' => [
                                    'bienvenido',
                                    'a',
                                    'mi',
                                    'casa',
                                ],
                                'extra' => [
                                    'amigo',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Bienvenue dans ma maison',
                                'correct' => [
                                    'bienvenue',
                                    'à',
                                    'ma',
                                    'maison',
                                ],
                                'extra' => [
                                    'ami',
                                ],
                            ],
                            'ja' => [
                                'sentence' => '私の家へようこそ',
                                'correct' => [
                                    '私の',
                                    '家',
                                    'へ',
                                    'ようこそ',
                                ],
                                'extra' => [
                                    '友達',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '나의 집에 환영합니다',
                                'correct' => [
                                    '나의',
                                    '집에',
                                    '환영합니다',
                                ],
                                'extra' => [
                                    '친구',
                                ],
                            ],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Freut',
                            'mich',
                            'ich',
                            'bin',
                            'dein',
                            'Freund',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'nice to meet you I am your friend',
                                'correct' => [
                                    'nice to meet you',
                                    'I am',
                                    'your',
                                    'friend',
                                ],
                                'extra' => [
                                    'welcome',
                                ],
                            ],
                            'es' => [
                                'sentence' => 'Encantado, soy tu amigo',
                                'correct' => [
                                    'encantado',
                                    'soy',
                                    'tu',
                                    'amigo',
                                ],
                                'extra' => [
                                    'bienvenido',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Enchanté, je suis ton ami',
                                'correct' => [
                                    'enchanté',
                                    'je suis',
                                    'ton',
                                    'ami',
                                ],
                                'extra' => [
                                    'bienvenue',
                                ],
                            ],
                            'ja' => [
                                'sentence' => 'はじめまして、私はあなたの友達です',
                                'correct' => [
                                    'はじめまして',
                                    '私',
                                    'は',
                                    'あなたの',
                                    '友達',
                                    'です',
                                ],
                                'extra' => [
                                    'ようこそ',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '반갑습니다, 저는 당신의 친구입니다',
                                'correct' => [
                                    '반갑습니다',
                                    '저는',
                                    '당신의',
                                    '친구입니다',
                                ],
                                'extra' => [
                                    '환영합니다',
                                ],
                            ],
                        ],
                    ],
                ],
            ),
        ];
    }
}
