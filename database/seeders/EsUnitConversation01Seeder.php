<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitConversation01Seeder extends Seeder
{
    private const PICTURES = [
        'profesor' => 'teacher',
        'amigo' => 'friend',
        'casa' => 'house',
        'escuela' => 'school',
        'madre' => 'mother',
        'padre' => 'father',
        'hermano' => 'brother',
        'hermana' => 'sister',
    ];

    /**
     * Spanish Chapter 2 (Conversation), Unit 1, the Spanish twin of the
     * English "Unit 1: Introducing Yourself" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unidad 1: Presentarse', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Profesor y Amigo', 1,
                pictures: [
                    [
                        'es' => 'profesor',
                        'img' => 'teacher',
                    ],
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                ],
                plain: [
                    [
                        'es' => 'nombre',
                    ],
                    [
                        'es' => 'soy',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mi',
                            'nombre',
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
                            'Soy',
                            'profesor',
                        ],
                        'blank' => 0,
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
                            'Mi',
                            'amigo',
                            'es',
                            'profesor',
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
            $builder->lesson('Lección 2: Casa y Escuela', 2,
                pictures: [
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                    [
                        'es' => 'escuela',
                        'img' => 'school',
                    ],
                ],
                plain: [
                    [
                        'es' => 'vivo',
                    ],
                    [
                        'es' => 'ciudad',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Vivo',
                            'aquí',
                        ],
                        'blank' => 1,
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
                            'Vivo',
                            'en',
                            'una',
                            'ciudad',
                        ],
                        'blank' => 3,
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
                            'Una',
                            'casa',
                            'y',
                            'una',
                            'escuela',
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
            $builder->lesson('Lección 3: Madre y Padre', 3,
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
                        'es' => 'edad',
                    ],
                    [
                        'es' => 'años',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Mi',
                            'edad',
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
                            'Diez',
                            'años',
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
                            'Mi',
                            'madre',
                            'y',
                            'mi',
                            'padre',
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
            $builder->lesson('Lección 4: Hermano y Hermana', 4,
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
                        'es' => 'eres',
                    ],
                    [
                        'es' => 'tu',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Eres',
                            'mi',
                            'hermano',
                        ],
                        'blank' => 0,
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
                            'Tu',
                            'nombre',
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
                            'Mi',
                            'hermana',
                            'y',
                            'tu',
                            'hermano',
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
            $builder->lesson('Lección 5: Amigo y Casa', 5,
                pictures: [
                    [
                        'es' => 'amigo',
                        'img' => 'friend',
                    ],
                    [
                        'es' => 'casa',
                        'img' => 'house',
                    ],
                ],
                plain: [
                    [
                        'es' => 'encantado',
                    ],
                    [
                        'es' => 'bienvenido',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Encantado',
                            'mi',
                            'amigo',
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
                            'Bienvenido',
                            'a',
                            'mi',
                            'casa',
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
                            'Encantado',
                            'soy',
                            'tu',
                            'amigo',
                        ],
                        'blank' => 3,
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
