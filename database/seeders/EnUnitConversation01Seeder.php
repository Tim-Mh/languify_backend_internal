<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation01Seeder extends Seeder
{
    private const PICTURES = [
        'Teacher' => 'teacher', 'Friend' => 'friend', 'House' => 'house', 'School' => 'school',
        'Mother' => 'mother', 'Father' => 'father', 'Brother' => 'brother', 'Sister' => 'sister',
    ];

    /**
     * English Chapter 2, Unit 1 — introducing yourself.
     *
     * Conversation vocabulary is abstract, so (like the French course) the
     * picture questions lean on the people and places the learner already met
     * in Chapter 1, while the new words — I am, I live, my age, you are, nice
     * to meet you — are carried by the phrases.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Introducing Yourself', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: My Name', 1,
                pictures: [['en' => 'Teacher', 'img' => 'teacher'], ['en' => 'Friend', 'img' => 'friend']],
                plain: [['en' => 'Name'], ['en' => 'I am']],
                phrases: [
                    'a' => [
                        'words' => ['my', 'name'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi nombre', 'correct' => ['mi', 'nombre'], 'extra' => ['amigo', 'soy']],
                            'de' => ['sentence' => 'Mein Name', 'correct' => ['mein', 'Name'], 'extra' => ['Freund', 'ich bin']],
                            'ja' => ['sentence' => '私の名前', 'correct' => ['私の', '名前'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '나의 이름', 'correct' => ['나의', '이름'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Mon nom', 'correct' => ['mon', 'nom'], 'extra' => ['ami', 'je suis']],
                            'tr' => ['sentence' => 'benim adım', 'correct' => ['benim', 'adım'], 'extra' => []],
                        'ru' => ['sentence' => 'мой имя', 'correct' => ['мой', 'имя'], 'extra' => []],
                        'ar' => ['sentence' => 'اسم', 'correct' => ['اسم'], 'extra' => []],
                        'az' => ['sentence' => 'mənim ad', 'correct' => ['mənim', 'ad'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I am', 'a', 'teacher'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Soy profesor', 'correct' => ['soy', 'profesor'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ich bin Lehrer', 'correct' => ['ich bin', 'Lehrer'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私は先生です', 'correct' => ['私', 'は', '先生', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '저는 선생님입니다', 'correct' => ['저는', '선생님입니다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Je suis professeur', 'correct' => ['je suis', 'professeur'], 'extra' => ['ami']],
                            'tr' => ['sentence' => 'ben bir öğretmenim', 'correct' => ['ben', 'bir', 'öğretmenim'], 'extra' => []],
                        'ru' => ['sentence' => 'я учитель', 'correct' => ['я', 'учитель'], 'extra' => []],
                        'ar' => ['sentence' => 'أنا معلم', 'correct' => ['أنا', 'معلم'], 'extra' => []],
                        'az' => ['sentence' => 'mən bir müəllim', 'correct' => ['mən', 'bir', 'müəllim'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'friend', 'is', 'a', 'teacher'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo es profesor', 'correct' => ['mi', 'amigo', 'es', 'profesor'], 'extra' => ['nombre']],
                            'de' => ['sentence' => 'Mein Freund ist Lehrer', 'correct' => ['mein', 'Freund', 'ist', 'Lehrer'], 'extra' => ['Name']],
                            'ja' => ['sentence' => '私の友達は先生です', 'correct' => ['私の', '友達', 'は', '先生', 'です'], 'extra' => ['名前']],
                            'ko' => ['sentence' => '나의 친구는 선생님입니다', 'correct' => ['나의', '친구는', '선생님입니다'], 'extra' => ['이름']],
                            'fr' => ['sentence' => 'Mon ami est professeur', 'correct' => ['mon', 'ami', 'est', 'professeur'], 'extra' => ['nom']],
                            'tr' => ['sentence' => 'arkadaşım bir öğretmen', 'correct' => ['arkadaşım', 'bir', 'öğretmen'], 'extra' => []],
                        'ru' => ['sentence' => 'мой друг учитель', 'correct' => ['мой', 'друг', 'учитель'], 'extra' => []],
                        'ar' => ['sentence' => 'صديق معلم', 'correct' => ['صديق', 'معلم'], 'extra' => []],
                        'az' => ['sentence' => 'mənim dost bir müəllim', 'correct' => ['mənim', 'dost', 'bir', 'müəllim'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Where I Live', 2,
                pictures: [['en' => 'House', 'img' => 'house'], ['en' => 'School', 'img' => 'school']],
                plain: [['en' => 'I live'], ['en' => 'City']],
                phrases: [
                    'a' => [
                        'words' => ['I live', 'here'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Vivo aquí', 'correct' => ['vivo', 'aquí'], 'extra' => ['ciudad', 'casa']],
                            'de' => ['sentence' => 'Ich wohne hier', 'correct' => ['ich wohne', 'hier'], 'extra' => ['Stadt', 'Haus']],
                            'ja' => ['sentence' => '私はここに住んでいる', 'correct' => ['私', 'は', 'ここ', 'に', '住んで', 'いる'], 'extra' => ['都市']],
                            'ko' => ['sentence' => '나는 여기에 삽니다', 'correct' => ['나는', '여기에', '삽니다'], 'extra' => ['도시']],
                            'fr' => ['sentence' => "J'habite ici", 'correct' => ["j'habite", 'ici'], 'extra' => ['ville', 'maison']],
                            'tr' => ['sentence' => 'burada yaşıyorum', 'correct' => ['burada', 'yaşıyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я живу здесь', 'correct' => ['я живу', 'здесь'], 'extra' => []],
                        'ar' => ['sentence' => 'أسكن هنا', 'correct' => ['أسكن', 'هنا'], 'extra' => []],
                        'az' => ['sentence' => 'yaşayıram burada', 'correct' => ['yaşayıram', 'burada'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I live', 'in', 'a', 'city'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Vivo en una ciudad', 'correct' => ['vivo', 'en', 'una', 'ciudad'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Ich wohne in einer Stadt', 'correct' => ['ich wohne', 'in', 'einer', 'Stadt'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '私は都市に住んでいる', 'correct' => ['私', 'は', '都市', 'に', '住んで', 'いる'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '나는 도시에 삽니다', 'correct' => ['나는', '도시에', '삽니다'], 'extra' => ['학교']],
                            'fr' => ['sentence' => "J'habite dans une ville", 'correct' => ["j'habite", 'dans', 'une', 'ville'], 'extra' => ['école']],
                            'tr' => ['sentence' => 'bir şehirde yaşıyorum', 'correct' => ['bir', 'şehirde', 'yaşıyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я живу в город', 'correct' => ['я живу', 'в', 'город'], 'extra' => []],
                        'ar' => ['sentence' => 'أسكن في مدينة', 'correct' => ['أسكن', 'في', 'مدينة'], 'extra' => []],
                        'az' => ['sentence' => 'yaşayıram içində bir şəhər', 'correct' => ['yaşayıram', 'içində', 'bir', 'şəhər'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'house', 'and', 'a', 'school'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Una casa y una escuela', 'correct' => ['una', 'casa', 'y', 'una', 'escuela'], 'extra' => ['ciudad']],
                            'de' => ['sentence' => 'Ein Haus und eine Schule', 'correct' => ['ein', 'Haus', 'und', 'eine', 'Schule'], 'extra' => ['Stadt']],
                            'ja' => ['sentence' => '家と学校', 'correct' => ['家', 'と', '学校'], 'extra' => ['都市']],
                            'ko' => ['sentence' => '집과 학교', 'correct' => ['집과', '학교'], 'extra' => ['도시']],
                            'fr' => ['sentence' => 'Une maison et une école', 'correct' => ['une', 'maison', 'et', 'une', 'école'], 'extra' => ['ville']],
                            'tr' => ['sentence' => 'bir ev ve bir okul', 'correct' => ['bir', 'ev', 've', 'bir', 'okul'], 'extra' => []],
                        'ru' => ['sentence' => 'дом и школа', 'correct' => ['дом', 'и', 'школа'], 'extra' => []],
                        'ar' => ['sentence' => 'بيت و مدرسة', 'correct' => ['بيت', 'و', 'مدرسة'], 'extra' => []],
                        'az' => ['sentence' => 'bir ev və bir məktəb', 'correct' => ['bir', 'ev', 'və', 'bir', 'məktəb'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: My Age', 3,
                pictures: [['en' => 'Mother', 'img' => 'mother'], ['en' => 'Father', 'img' => 'father']],
                plain: [['en' => 'Age'], ['en' => 'Years old']],
                phrases: [
                    'a' => [
                        'words' => ['my', 'age'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi edad', 'correct' => ['mi', 'edad'], 'extra' => ['años', 'madre']],
                            'de' => ['sentence' => 'Mein Alter', 'correct' => ['mein', 'Alter'], 'extra' => ['Jahre alt', 'Mutter']],
                            'ja' => ['sentence' => '私の年齢', 'correct' => ['私の', '年齢'], 'extra' => ['歳', '母']],
                            'ko' => ['sentence' => '나의 나이', 'correct' => ['나의', '나이'], 'extra' => ['살', '어머니']],
                            'fr' => ['sentence' => 'Mon âge', 'correct' => ['mon', 'âge'], 'extra' => ['ans', 'mère']],
                            'tr' => ['sentence' => 'benim yaşım', 'correct' => ['benim', 'yaşım'], 'extra' => []],
                        'ru' => ['sentence' => 'мой возраст', 'correct' => ['мой', 'возраст'], 'extra' => []],
                        'ar' => ['sentence' => 'عمر', 'correct' => ['عمر'], 'extra' => []],
                        'az' => ['sentence' => 'mənim yaş', 'correct' => ['mənim', 'yaş'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['ten', 'years old'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Diez años', 'correct' => ['diez', 'años'], 'extra' => ['edad', 'padre']],
                            'de' => ['sentence' => 'Zehn Jahre alt', 'correct' => ['zehn', 'Jahre alt'], 'extra' => ['Alter', 'Vater']],
                            'ja' => ['sentence' => '十歳', 'correct' => ['十歳'], 'extra' => ['年齢', '父']],
                            'ko' => ['sentence' => '열 살', 'correct' => ['열', '살'], 'extra' => ['나이', '아버지']],
                            'fr' => ['sentence' => 'Dix ans', 'correct' => ['dix', 'ans'], 'extra' => ['âge', 'père']],
                            'tr' => ['sentence' => 'on yaşında', 'correct' => ['on', 'yaşında'], 'extra' => []],
                        'ru' => ['sentence' => 'десять лет старый', 'correct' => ['десять', 'лет', 'старый'], 'extra' => []],
                        'ar' => ['sentence' => 'عشرة سنوات قديم', 'correct' => ['عشرة', 'سنوات', 'قديم'], 'extra' => []],
                        'az' => ['sentence' => 'on yaşında köhnə', 'correct' => ['on', 'yaşında', 'köhnə'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'mother', 'and', 'my', 'father'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '母と父', 'correct' => ['母', 'と', '父'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '어머니와 아버지', 'correct' => ['어머니와', '아버지'], 'extra' => ['나이']],
                            'fr' => ['sentence' => 'Ma mère et mon père', 'correct' => ['ma', 'mère', 'et', 'mon', 'père'], 'extra' => ['âge']],
                            'tr' => ['sentence' => 'annem ve babam', 'correct' => ['annem', 've', 'babam'], 'extra' => []],
                        'ru' => ['sentence' => 'мой мама и мой папа', 'correct' => ['мой', 'мама', 'и', 'мой', 'папа'], 'extra' => []],
                        'ar' => ['sentence' => 'أم و أب', 'correct' => ['أم', 'و', 'أب'], 'extra' => []],
                        'az' => ['sentence' => 'mənim ana və mənim ata', 'correct' => ['mənim', 'ana', 'və', 'mənim', 'ata'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: You Are', 4,
                pictures: [['en' => 'Brother', 'img' => 'brother'], ['en' => 'Sister', 'img' => 'sister']],
                plain: [['en' => 'You are'], ['en' => 'Your']],
                phrases: [
                    'a' => [
                        'words' => ['you are', 'my', 'brother'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Eres mi hermano', 'correct' => ['eres', 'mi', 'hermano'], 'extra' => ['hermana']],
                            'de' => ['sentence' => 'Du bist mein Bruder', 'correct' => ['du bist', 'mein', 'Bruder'], 'extra' => ['Schwester']],
                            'ja' => ['sentence' => 'あなたは私の兄弟です', 'correct' => ['あなた', 'は', '私の', '兄弟', 'です'], 'extra' => ['姉妹']],
                            'ko' => ['sentence' => '당신은 나의 형제입니다', 'correct' => ['당신은', '나의', '형제입니다'], 'extra' => ['자매']],
                            'fr' => ['sentence' => 'Tu es mon frère', 'correct' => ['tu es', 'mon', 'frère'], 'extra' => ['sœur']],
                            'tr' => ['sentence' => 'sen benim erkek kardeşimsin', 'correct' => ['sen', 'benim', 'erkek', 'kardeşimsin'], 'extra' => []],
                        'ru' => ['sentence' => 'ты мой брат', 'correct' => ['ты', 'мой', 'брат'], 'extra' => []],
                        'ar' => ['sentence' => 'أنت أخ', 'correct' => ['أنت', 'أخ'], 'extra' => []],
                        'az' => ['sentence' => 'sən mənim qardaş', 'correct' => ['sən', 'mənim', 'qardaş'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['your', 'name'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tu nombre', 'correct' => ['tu', 'nombre'], 'extra' => ['mi', 'edad']],
                            'de' => ['sentence' => 'Dein Name', 'correct' => ['dein', 'Name'], 'extra' => ['mein', 'Alter']],
                            'ja' => ['sentence' => 'あなたの名前', 'correct' => ['あなたの', '名前'], 'extra' => ['私の']],
                            'ko' => ['sentence' => '당신의 이름', 'correct' => ['당신의', '이름'], 'extra' => ['나의']],
                            'fr' => ['sentence' => 'Ton nom', 'correct' => ['ton', 'nom'], 'extra' => ['mon', 'âge']],
                            'tr' => ['sentence' => 'senin adın', 'correct' => ['senin', 'adın'], 'extra' => []],
                        'ru' => ['sentence' => 'твой имя', 'correct' => ['твой', 'имя'], 'extra' => []],
                        'ar' => ['sentence' => 'اسم', 'correct' => ['اسم'], 'extra' => []],
                        'az' => ['sentence' => 'sənin ad', 'correct' => ['sənin', 'ad'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'sister', 'and', 'your', 'brother'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi hermana y tu hermano', 'correct' => ['mi', 'hermana', 'y', 'tu', 'hermano'], 'extra' => ['nombre']],
                            'de' => ['sentence' => 'Meine Schwester und dein Bruder', 'correct' => ['meine', 'Schwester', 'und', 'dein', 'Bruder'], 'extra' => ['Name']],
                            'ja' => ['sentence' => '私の姉妹とあなたの兄弟', 'correct' => ['私の', '姉妹', 'と', 'あなたの', '兄弟'], 'extra' => ['名前']],
                            'ko' => ['sentence' => '나의 자매와 당신의 형제', 'correct' => ['나의', '자매와', '당신의', '형제'], 'extra' => ['이름']],
                            'fr' => ['sentence' => 'Ma sœur et ton frère', 'correct' => ['ma', 'sœur', 'et', 'ton', 'frère'], 'extra' => ['nom']],
                            'tr' => ['sentence' => 'kız kardeşim ve senin erkek kardeşin', 'correct' => ['kız', 'kardeşim', 've', 'senin', 'erkek', 'kardeşin'], 'extra' => []],
                        'ru' => ['sentence' => 'мой сестра и твой брат', 'correct' => ['мой', 'сестра', 'и', 'твой', 'брат'], 'extra' => []],
                        'ar' => ['sentence' => 'أخت و أخ', 'correct' => ['أخت', 'و', 'أخ'], 'extra' => []],
                        'az' => ['sentence' => 'mənim bacı və sənin qardaş', 'correct' => ['mənim', 'bacı', 'və', 'sənin', 'qardaş'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Nice To Meet You', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Nice to meet you'], ['en' => 'Welcome']],
                phrases: [
                    'a' => [
                        'words' => ['nice to meet you', 'my', 'friend'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Encantado, mi amigo', 'correct' => ['encantado', 'mi', 'amigo'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Freut mich, mein Freund', 'correct' => ['freut mich', 'mein', 'Freund'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => 'はじめまして、私の友達', 'correct' => ['はじめまして', '私の', '友達'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '반갑습니다, 나의 친구', 'correct' => ['반갑습니다', '나의', '친구'], 'extra' => ['환영합니다']],
                            'fr' => ['sentence' => 'Enchanté, mon ami', 'correct' => ['enchanté', 'mon', 'ami'], 'extra' => ['bienvenue']],
                            'tr' => ['sentence' => 'memnun oldum arkadaşım', 'correct' => ['memnun', 'oldum', 'arkadaşım'], 'extra' => []],
                        'ru' => ['sentence' => 'приятно познакомиться мой друг', 'correct' => ['приятно познакомиться', 'мой', 'друг'], 'extra' => []],
                        'ar' => ['sentence' => 'تشرفنا صديق', 'correct' => ['تشرفنا', 'صديق'], 'extra' => []],
                        'az' => ['sentence' => 'tanış olmağa şadam mənim dost', 'correct' => ['tanış olmağa şadam', 'mənim', 'dost'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['welcome', 'to', 'my', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Bienvenido a mi casa', 'correct' => ['bienvenido', 'a', 'mi', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Willkommen in meinem Haus', 'correct' => ['willkommen', 'in', 'meinem', 'Haus'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の家へようこそ', 'correct' => ['私の', '家', 'へ', 'ようこそ'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '나의 집에 환영합니다', 'correct' => ['나의', '집에', '환영합니다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => 'Bienvenue dans ma maison', 'correct' => ['bienvenue', 'à', 'ma', 'maison'], 'extra' => ['ami']],
                            'tr' => ['sentence' => 'hoş geldin evim', 'correct' => ['hoş', 'geldin', 'evim'], 'extra' => []],
                        'ru' => ['sentence' => 'добро пожаловать в мой дом', 'correct' => ['добро пожаловать', 'в', 'мой', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'أهلا وسهلا إلى بيت', 'correct' => ['أهلا وسهلا', 'إلى', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'xoş gəlmisiniz mənim ev', 'correct' => ['xoş gəlmisiniz', 'mənim', 'ev'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['nice to meet you', 'I am', 'your', 'friend'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Encantado, soy tu amigo', 'correct' => ['encantado', 'soy', 'tu', 'amigo'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Freut mich, ich bin dein Freund', 'correct' => ['freut mich', 'ich bin', 'dein', 'Freund'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => 'はじめまして、私はあなたの友達です', 'correct' => ['はじめまして', '私', 'は', 'あなたの', '友達', 'です'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '반갑습니다, 저는 당신의 친구입니다', 'correct' => ['반갑습니다', '저는', '당신의', '친구입니다'], 'extra' => ['환영합니다']],
                            'fr' => ['sentence' => 'Enchanté, je suis ton ami', 'correct' => ['enchanté', 'je suis', 'ton', 'ami'], 'extra' => ['bienvenue']],
                            'tr' => ['sentence' => 'memnun oldum ben senin arkadaşınım', 'correct' => ['memnun', 'oldum', 'ben', 'senin', 'arkadaşınım'], 'extra' => []],
                        'ru' => ['sentence' => 'приятно познакомиться я твой друг', 'correct' => ['приятно познакомиться', 'я', 'твой', 'друг'], 'extra' => []],
                        'ar' => ['sentence' => 'تشرفنا أنا صديق', 'correct' => ['تشرفنا', 'أنا', 'صديق'], 'extra' => []],
                        'az' => ['sentence' => 'tanış olmağa şadam mən sənin dost', 'correct' => ['tanış olmağa şadam', 'mən', 'sənin', 'dost'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
