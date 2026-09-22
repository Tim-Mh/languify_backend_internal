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
                            'az' => ['sentence' => 'mənim ad', 'correct' => ['mənim', 'ad'], 'extra' => ['dost', 'mən']],
                            'ar' => ['sentence' => 'اسم', 'correct' => ['اسم'], 'extra' => ['صديق', 'أنا']],
                            'ru' => ['sentence' => 'мой имя', 'correct' => ['мой', 'имя'], 'extra' => ['друг', 'я']],
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
                            'tr' => ['sentence' => 'benim adım', 'correct' => ['benim', 'adım'], 'extra' => ['arkadaş', 'ben']],
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
                            'az' => ['sentence' => 'mən bir müəllim', 'correct' => ['mən', 'bir', 'müəllim'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أنا معلم', 'correct' => ['أنا', 'معلم'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'я учитель', 'correct' => ['я', 'учитель'], 'extra' => ['друг']],
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
                            'tr' => ['sentence' => 'ben bir öğretmenim', 'correct' => ['ben', 'bir', 'öğretmenim'], 'extra' => ['arkadaş']],
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
                            'az' => ['sentence' => 'mənim dost bir müəllim', 'correct' => ['mənim', 'dost', 'bir', 'müəllim'], 'extra' => ['ad']],
                            'ar' => ['sentence' => 'صديق معلم', 'correct' => ['صديق', 'معلم'], 'extra' => ['اسم']],
                            'ru' => ['sentence' => 'мой друг учитель', 'correct' => ['мой', 'друг', 'учитель'], 'extra' => ['имя']],
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
                            'tr' => ['sentence' => 'arkadaşım bir öğretmen', 'correct' => ['arkadaşım', 'bir', 'öğretmen'], 'extra' => ['ad']],
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
                            'az' => ['sentence' => 'yaşayıram burada', 'correct' => ['yaşayıram', 'burada'], 'extra' => ['qəsəbə', 'ev']],
                            'ar' => ['sentence' => 'أسكن هنا', 'correct' => ['أسكن', 'هنا'], 'extra' => ['بلدة', 'بيت']],
                            'ru' => ['sentence' => 'я живу здесь', 'correct' => ['я живу', 'здесь'], 'extra' => ['город', 'дом']],
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
                            'tr' => ['sentence' => 'burada yaşıyorum', 'correct' => ['burada', 'yaşıyorum'], 'extra' => ['şehir', 'ev']],
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
                            'az' => ['sentence' => 'yaşayıram içində bir şəhər', 'correct' => ['yaşayıram', 'içində', 'bir', 'şəhər'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'أسكن في مدينة', 'correct' => ['أسكن', 'في', 'مدينة'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'я живу в город', 'correct' => ['я живу', 'в', 'город'], 'extra' => ['школа']],
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
                            'tr' => ['sentence' => 'bir şehirde yaşıyorum', 'correct' => ['bir', 'şehirde', 'yaşıyorum'], 'extra' => ['okul']],
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
                            'az' => ['sentence' => 'bir ev və bir məktəb', 'correct' => ['bir', 'ev', 'və', 'bir', 'məktəb'], 'extra' => ['qəsəbə']],
                            'ar' => ['sentence' => 'بيت و مدرسة', 'correct' => ['بيت', 'و', 'مدرسة'], 'extra' => ['بلدة']],
                            'ru' => ['sentence' => 'дом и школа', 'correct' => ['дом', 'и', 'школа'], 'extra' => ['город']],
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
                            'tr' => ['sentence' => 'bir ev ve bir okul', 'correct' => ['bir', 'ev', 've', 'bir', 'okul'], 'extra' => ['şehir']],
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
                            'az' => ['sentence' => 'mənim yaş', 'correct' => ['mənim', 'yaş'], 'extra' => ['yaşında', 'köhnə', 'ana']],
                            'ar' => ['sentence' => 'عمر', 'correct' => ['عمر'], 'extra' => ['سنوات', 'قديم', 'أم']],
                            'ru' => ['sentence' => 'мой возраст', 'correct' => ['мой', 'возраст'], 'extra' => ['лет', 'старый', 'мама']],
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
                            'tr' => ['sentence' => 'benim yaşım', 'correct' => ['benim', 'yaşım'], 'extra' => ['yaşında', 'anne']],
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
                            'az' => ['sentence' => 'on yaşında köhnə', 'correct' => ['on', 'yaşında', 'köhnə'], 'extra' => ['yaş', 'ata']],
                            'ar' => ['sentence' => 'عشرة سنوات قديم', 'correct' => ['عشرة', 'سنوات', 'قديم'], 'extra' => ['عمر', 'أب']],
                            'ru' => ['sentence' => 'десять лет старый', 'correct' => ['десять', 'лет', 'старый'], 'extra' => ['возраст', 'папа']],
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
                            'tr' => ['sentence' => 'on yaşında', 'correct' => ['on', 'yaşında'], 'extra' => ['yaş', 'baba']],
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
                            'az' => ['sentence' => 'mənim ana və mənim ata', 'correct' => ['mənim', 'ana', 'və', 'mənim', 'ata'], 'extra' => ['yaş']],
                            'ar' => ['sentence' => 'أم و أب', 'correct' => ['أم', 'و', 'أب'], 'extra' => ['عمر']],
                            'ru' => ['sentence' => 'мой мама и мой папа', 'correct' => ['мой', 'мама', 'и', 'мой', 'папа'], 'extra' => ['возраст']],
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
                            'tr' => ['sentence' => 'annem ve babam', 'correct' => ['annem', 've', 'babam'], 'extra' => ['yaş']],
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
                            'az' => ['sentence' => 'sən mənim qardaş', 'correct' => ['sən', 'mənim', 'qardaş'], 'extra' => ['bacı']],
                            'ar' => ['sentence' => 'أنت أخ', 'correct' => ['أنت', 'أخ'], 'extra' => ['أخت']],
                            'ru' => ['sentence' => 'ты мой брат', 'correct' => ['ты', 'мой', 'брат'], 'extra' => ['сестра']],
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
                            'tr' => ['sentence' => 'sen benim erkek kardeşimsin', 'correct' => ['sen', 'benim', 'erkek', 'kardeşimsin'], 'extra' => ['kız kardeş']],
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
                            'az' => ['sentence' => 'sənin ad', 'correct' => ['sənin', 'ad'], 'extra' => ['mənim', 'yaş']],
                            'ar' => ['sentence' => 'اسم', 'correct' => ['اسم'], 'extra' => ['عمر']],
                            'ru' => ['sentence' => 'твой имя', 'correct' => ['твой', 'имя'], 'extra' => ['мой', 'возраст']],
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
                            'tr' => ['sentence' => 'senin adın', 'correct' => ['senin', 'adın'], 'extra' => ['benim', 'yaş']],
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
                            'az' => ['sentence' => 'mənim bacı və sənin qardaş', 'correct' => ['mənim', 'bacı', 'və', 'sənin', 'qardaş'], 'extra' => ['ad']],
                            'ar' => ['sentence' => 'أخت و أخ', 'correct' => ['أخت', 'و', 'أخ'], 'extra' => ['اسم']],
                            'ru' => ['sentence' => 'мой сестра и твой брат', 'correct' => ['мой', 'сестра', 'и', 'твой', 'брат'], 'extra' => ['имя']],
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
                            'tr' => ['sentence' => 'kız kardeşim ve senin erkek kardeşin', 'correct' => ['kız', 'kardeşim', 've', 'senin', 'erkek', 'kardeşin'], 'extra' => ['ad']],
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
                            'az' => ['sentence' => 'tanış olmağa şadam mənim dost', 'correct' => ['tanış olmağa şadam', 'mənim', 'dost'], 'extra' => ['xoş gəlmisiniz']],
                            'ar' => ['sentence' => 'تشرفنا صديق', 'correct' => ['تشرفنا', 'صديق'], 'extra' => ['أهلا وسهلا']],
                            'ru' => ['sentence' => 'приятно познакомиться мой друг', 'correct' => ['приятно познакомиться', 'мой', 'друг'], 'extra' => ['добро пожаловать']],
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
                            'tr' => ['sentence' => 'memnun oldum arkadaşım', 'correct' => ['memnun', 'oldum', 'arkadaşım'], 'extra' => ['hoş geldin']],
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
                            'az' => ['sentence' => 'xoş gəlmisiniz mənim ev', 'correct' => ['xoş gəlmisiniz', 'mənim', 'ev'], 'extra' => ['dost']],
                            'ar' => ['sentence' => 'أهلا وسهلا إلى بيت', 'correct' => ['أهلا وسهلا', 'إلى', 'بيت'], 'extra' => ['صديق']],
                            'ru' => ['sentence' => 'добро пожаловать в мой дом', 'correct' => ['добро пожаловать', 'в', 'мой', 'дом'], 'extra' => ['друг']],
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
                            'tr' => ['sentence' => 'hoş geldin evim', 'correct' => ['hoş', 'geldin', 'evim'], 'extra' => ['arkadaş']],
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
                            'az' => ['sentence' => 'tanış olmağa şadam mən sənin dost', 'correct' => ['tanış olmağa şadam', 'mən', 'sənin', 'dost'], 'extra' => ['xoş gəlmisiniz']],
                            'ar' => ['sentence' => 'تشرفنا أنا صديق', 'correct' => ['تشرفنا', 'أنا', 'صديق'], 'extra' => ['أهلا وسهلا']],
                            'ru' => ['sentence' => 'приятно познакомиться я твой друг', 'correct' => ['приятно познакомиться', 'я', 'твой', 'друг'], 'extra' => ['добро пожаловать']],
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
                            'tr' => ['sentence' => 'memnun oldum ben senin arkadaşınım', 'correct' => ['memnun', 'oldum', 'ben', 'senin', 'arkadaşınım'], 'extra' => ['hoş geldin']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
