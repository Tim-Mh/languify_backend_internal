<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitConversation01Seeder extends Seeder
{
    private const PICTURES = [
        '先生' => 'teacher',
        '友達' => 'friend',
        '家' => 'house',
        '学校' => 'school',
        '母' => 'mother',
        '父' => 'father',
        '兄弟' => 'brother',
        '姉妹' => 'sister',
    ];

    /**
     * Japanese Chapter 2 (Conversation), Unit 1, the Japanese twin of the
     * English "Unit 1: Introducing Yourself" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'ユニット1: 自己紹介', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: 先生・友達', 1,
                pictures: [
                    [
                        'ja' => '先生',
                        'img' => 'teacher',
                    ],
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'ja' => '名前',
                    ],
                    [
                        'ja' => 'です',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私の',
                            '名前',
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
                            'de' => [
                                'sentence' => 'Mein Name',
                                'correct' => [
                                    'mein',
                                    'Name',
                                ],
                                'extra' => [
                                    'Freund',
                                    'ich bin',
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
                            '私',
                            'は',
                            '先生',
                            'です',
                        ],
                        'blank' => 3,
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
                            'de' => [
                                'sentence' => 'Ich bin Lehrer',
                                'correct' => [
                                    'ich bin',
                                    'Lehrer',
                                ],
                                'extra' => [
                                    'Freund',
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
                            '私の',
                            '友達',
                            'は',
                            '先生',
                            'です',
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
                            'de' => [
                                'sentence' => 'Mein Freund ist Lehrer',
                                'correct' => [
                                    'mein',
                                    'Freund',
                                    'ist',
                                    'Lehrer',
                                ],
                                'extra' => [
                                    'Name',
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
            $builder->lesson('レッスン2: 家・学校', 2,
                pictures: [
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                    [
                        'ja' => '学校',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'ja' => '私は住んでいる',
                    ],
                    [
                        'ja' => '都市',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私',
                            'は',
                            'ここ',
                            'に',
                            '住んで',
                            'いる',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I live here',
                                'correct' => [
                                    'I live',
                                    'here',
                                ],
                                'extra' => [
                                    'city',
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
                            'de' => [
                                'sentence' => 'Ich wohne hier',
                                'correct' => [
                                    'ich wohne',
                                    'hier',
                                ],
                                'extra' => [
                                    'Stadt',
                                    'Haus',
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
                            '私',
                            'は',
                            '都市',
                            'に',
                            '住んで',
                            'いる',
                        ],
                        'blank' => 5,
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
                            'de' => [
                                'sentence' => 'Ich wohne in einer Stadt',
                                'correct' => [
                                    'ich wohne',
                                    'in',
                                    'einer',
                                    'Stadt',
                                ],
                                'extra' => [
                                    'Schule',
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
                            '家',
                            'と',
                            '学校',
                        ],
                        'blank' => 2,
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
                                    'city',
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
                            'de' => [
                                'sentence' => 'Ein Haus und eine Schule',
                                'correct' => [
                                    'ein',
                                    'Haus',
                                    'und',
                                    'eine',
                                    'Schule',
                                ],
                                'extra' => [
                                    'Stadt',
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
            $builder->lesson('レッスン3: 母・父', 3,
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
                        'ja' => '年齢',
                    ],
                    [
                        'ja' => '歳',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '私の',
                            '年齢',
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
                            'de' => [
                                'sentence' => 'Mein Alter',
                                'correct' => [
                                    'mein',
                                    'Alter',
                                ],
                                'extra' => [
                                    'Jahre alt',
                                    'Mutter',
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
                            '十歳',
                        ],
                        'blank' => 0,
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
                            'de' => [
                                'sentence' => 'Zehn Jahre alt',
                                'correct' => [
                                    'zehn',
                                    'Jahre alt',
                                ],
                                'extra' => [
                                    'Alter',
                                    'Vater',
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
                            '母',
                            'と',
                            '父',
                        ],
                        'blank' => 0,
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
                                    'Alter',
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
            $builder->lesson('レッスン4: 兄弟・姉妹', 4,
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
                        'ja' => 'です',
                    ],
                    [
                        'ja' => 'あなたの',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'あなた',
                            'は',
                            '私の',
                            '兄弟',
                            'です',
                        ],
                        'blank' => 4,
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
                            'de' => [
                                'sentence' => 'Du bist mein Bruder',
                                'correct' => [
                                    'du bist',
                                    'mein',
                                    'Bruder',
                                ],
                                'extra' => [
                                    'Schwester',
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
                            'あなたの',
                            '名前',
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
                            'de' => [
                                'sentence' => 'Dein Name',
                                'correct' => [
                                    'dein',
                                    'Name',
                                ],
                                'extra' => [
                                    'mein',
                                    'Alter',
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
                            '私の',
                            '姉妹',
                            'と',
                            'あなたの',
                            '兄弟',
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
                            'de' => [
                                'sentence' => 'Meine Schwester und dein Bruder',
                                'correct' => [
                                    'meine',
                                    'Schwester',
                                    'und',
                                    'dein',
                                    'Bruder',
                                ],
                                'extra' => [
                                    'Name',
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
            $builder->lesson('レッスン5: 友達・家', 5,
                pictures: [
                    [
                        'ja' => '友達',
                        'img' => 'friend',
                    ],
                    [
                        'ja' => '家',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'はじめまして',
                    ],
                    [
                        'ja' => 'ようこそ',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'はじめまして',
                            '私の',
                            '友達',
                        ],
                        'blank' => 0,
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
                            'de' => [
                                'sentence' => 'Freut mich, mein Freund',
                                'correct' => [
                                    'freut mich',
                                    'mein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'willkommen',
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
                            '私の',
                            '家',
                            'へ',
                            'ようこそ',
                        ],
                        'blank' => 3,
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
                            'de' => [
                                'sentence' => 'Willkommen in meinem Haus',
                                'correct' => [
                                    'willkommen',
                                    'in',
                                    'meinem',
                                    'Haus',
                                ],
                                'extra' => [
                                    'Freund',
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
                            'はじめまして',
                            '私',
                            'は',
                            'あなたの',
                            '友達',
                            'です',
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
                            'de' => [
                                'sentence' => 'Freut mich, ich bin dein Freund',
                                'correct' => [
                                    'freut mich',
                                    'ich bin',
                                    'dein',
                                    'Freund',
                                ],
                                'extra' => [
                                    'willkommen',
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
