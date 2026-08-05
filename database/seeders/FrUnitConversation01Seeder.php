<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation01Seeder extends Seeder
{
    private const PICTURES = [
        'Professeur' => 'teacher', 'Ami' => 'friend', 'Maison' => 'house', 'École' => 'school',
        'Mère' => 'mother', 'Père' => 'father', 'Frère' => 'brother', 'Sœur' => 'sister',
    ];

    /**
     * French Chapter 2, Unit 1 — introducing yourself.
     *
     * Conversation vocabulary is mostly abstract, so the picture questions lean
     * on the people and places the learner already met in Chapter 1 (professeur,
     * ami, maison, école) while the new words — je suis, tu es, mon nom, mon âge
     * — are carried by the phrases. Ages reuse the numbers from Chapter 1
     * Unit 2, so "dix ans" needs nothing new.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Introducing Yourself', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: My Name', 1,
                pictures: [['fr' => 'Professeur', 'img' => 'teacher'], ['fr' => 'Ami', 'img' => 'friend']],
                plain: [['fr' => 'Je suis'], ['fr' => 'Nom']],
                phrases: [
                    'a' => [
                        'words' => ['mon', 'nom'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My name', 'correct' => ['my', 'name'], 'extra' => ['friend', 'I am']],
                            'es' => ['sentence' => 'Mi nombre', 'correct' => ['mi', 'nombre'], 'extra' => ['amigo', 'soy']],
                            'de' => ['sentence' => 'Mein Name', 'correct' => ['mein', 'Name'], 'extra' => ['Freund', 'ich bin']],
                            'ja' => ['sentence' => '私の名前', 'correct' => ['私の', '名前'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '나의 이름', 'correct' => ['나의', '이름'], 'extra' => ['친구']],
                        ],
                    ],
                    'b' => [
                        'words' => ['je suis', 'professeur'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I am a teacher', 'correct' => ['I', 'am', 'a', 'teacher'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Soy profesor', 'correct' => ['soy', 'profesor'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ich bin Lehrer', 'correct' => ['ich', 'bin', 'Lehrer'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私は先生です', 'correct' => ['私', 'は', '先生', 'です'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '저는 선생님입니다', 'correct' => ['저는', '선생님입니다'], 'extra' => ['친구']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'ami', 'est', 'professeur'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My friend is a teacher', 'correct' => ['my', 'friend', 'is', 'a', 'teacher'], 'extra' => ['name']],
                            'es' => ['sentence' => 'Mi amigo es profesor', 'correct' => ['mi', 'amigo', 'es', 'profesor'], 'extra' => ['nombre']],
                            'de' => ['sentence' => 'Mein Freund ist Lehrer', 'correct' => ['mein', 'Freund', 'ist', 'Lehrer'], 'extra' => ['Name']],
                            'ja' => ['sentence' => '私の友達は先生です', 'correct' => ['私の', '友達', 'は', '先生', 'です'], 'extra' => ['名前']],
                            'ko' => ['sentence' => '나의 친구는 선생님입니다', 'correct' => ['나의', '친구는', '선생님입니다'], 'extra' => ['이름']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Where I Live', 2,
                pictures: [['fr' => 'Maison', 'img' => 'house'], ['fr' => 'École', 'img' => 'school']],
                plain: [['fr' => "J'habite"], ['fr' => 'Ville']],
                phrases: [
                    'a' => [
                        'words' => ["j'habite", 'ici'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I live here', 'correct' => ['I', 'live', 'here'], 'extra' => ['city', 'house']],
                            'es' => ['sentence' => 'Vivo aquí', 'correct' => ['vivo', 'aquí'], 'extra' => ['ciudad', 'casa']],
                            'de' => ['sentence' => 'Ich wohne hier', 'correct' => ['ich', 'wohne', 'hier'], 'extra' => ['Stadt', 'Haus']],
                            'ja' => ['sentence' => '私はここに住んでいる', 'correct' => ['私', 'は', 'ここ', 'に', '住んで', 'いる'], 'extra' => ['町']],
                            'ko' => ['sentence' => '나는 여기에 삽니다', 'correct' => ['나는', '여기에', '삽니다'], 'extra' => ['도시']],
                        ],
                    ],
                    'b' => [
                        'words' => ["j'habite", 'dans', 'une', 'ville'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I live in a city', 'correct' => ['I', 'live', 'in', 'a', 'city'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Vivo en una ciudad', 'correct' => ['vivo', 'en', 'una', 'ciudad'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Ich wohne in einer Stadt', 'correct' => ['ich', 'wohne', 'in', 'einer', 'Stadt'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '私は町に住んでいる', 'correct' => ['私', 'は', '町', 'に', '住んで', 'いる'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '나는 도시에 삽니다', 'correct' => ['나는', '도시에', '삽니다'], 'extra' => ['학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'maison', 'et', 'une', 'école'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A house and a school', 'correct' => ['a', 'house', 'and', 'a', 'school'], 'extra' => ['city']],
                            'es' => ['sentence' => 'Una casa y una escuela', 'correct' => ['una', 'casa', 'y', 'una', 'escuela'], 'extra' => ['ciudad']],
                            'de' => ['sentence' => 'Ein Haus und eine Schule', 'correct' => ['ein', 'Haus', 'und', 'eine', 'Schule'], 'extra' => ['Stadt']],
                            'ja' => ['sentence' => '家と学校', 'correct' => ['家', 'と', '学校'], 'extra' => ['町']],
                            'ko' => ['sentence' => '집과 학교', 'correct' => ['집과', '학교'], 'extra' => ['도시']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: My Age', 3,
                pictures: [['fr' => 'Mère', 'img' => 'mother'], ['fr' => 'Père', 'img' => 'father']],
                plain: [['fr' => 'Âge'], ['fr' => 'Ans']],
                phrases: [
                    'a' => [
                        'words' => ['mon', 'âge'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My age', 'correct' => ['my', 'age'], 'extra' => ['years old', 'mother']],
                            'es' => ['sentence' => 'Mi edad', 'correct' => ['mi', 'edad'], 'extra' => ['años', 'madre']],
                            'de' => ['sentence' => 'Mein Alter', 'correct' => ['mein', 'Alter'], 'extra' => ['Jahre alt', 'Mutter']],
                            'ja' => ['sentence' => '私の年齢', 'correct' => ['私の', '年齢'], 'extra' => ['歳', '母']],
                            'ko' => ['sentence' => '나의 나이', 'correct' => ['나의', '나이'], 'extra' => ['살', '어머니']],
                        ],
                    ],
                    'b' => [
                        'words' => ['dix', 'ans'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Ten years old', 'correct' => ['ten', 'years old'], 'extra' => ['age', 'father']],
                            'es' => ['sentence' => 'Diez años', 'correct' => ['diez', 'años'], 'extra' => ['edad', 'padre']],
                            'de' => ['sentence' => 'Zehn Jahre alt', 'correct' => ['zehn', 'Jahre alt'], 'extra' => ['Alter', 'Vater']],
                            'ja' => ['sentence' => '十歳', 'correct' => ['十歳'], 'extra' => ['年齢', '父']],
                            'ko' => ['sentence' => '열 살', 'correct' => ['열', '살'], 'extra' => ['나이', '아버지']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ma', 'mère', 'et', 'mon', 'père'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My mother and my father', 'correct' => ['my', 'mother', 'and', 'my', 'father'], 'extra' => ['age']],
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '母と父', 'correct' => ['母', 'と', '父'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '어머니와 아버지', 'correct' => ['어머니와', '아버지'], 'extra' => ['나이']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: You Are', 4,
                pictures: [['fr' => 'Frère', 'img' => 'brother'], ['fr' => 'Sœur', 'img' => 'sister']],
                plain: [['fr' => 'Tu es'], ['fr' => 'Ton']],
                phrases: [
                    'a' => [
                        'words' => ['tu es', 'mon', 'frère'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'You are my brother', 'correct' => ['you', 'are', 'my', 'brother'], 'extra' => ['sister']],
                            'es' => ['sentence' => 'Eres mi hermano', 'correct' => ['eres', 'mi', 'hermano'], 'extra' => ['hermana']],
                            'de' => ['sentence' => 'Du bist mein Bruder', 'correct' => ['du', 'bist', 'mein', 'Bruder'], 'extra' => ['Schwester']],
                            'ja' => ['sentence' => 'あなたは私の兄弟です', 'correct' => ['あなた', 'は', '私の', '兄弟', 'です'], 'extra' => ['姉妹']],
                            'ko' => ['sentence' => '당신은 나의 형제입니다', 'correct' => ['당신은', '나의', '형제입니다'], 'extra' => ['자매']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ton', 'nom'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Your name', 'correct' => ['your', 'name'], 'extra' => ['my', 'age']],
                            'es' => ['sentence' => 'Tu nombre', 'correct' => ['tu', 'nombre'], 'extra' => ['mi', 'edad']],
                            'de' => ['sentence' => 'Dein Name', 'correct' => ['dein', 'Name'], 'extra' => ['mein', 'Alter']],
                            'ja' => ['sentence' => 'あなたの名前', 'correct' => ['あなたの', '名前'], 'extra' => ['私の', '年齢']],
                            'ko' => ['sentence' => '당신의 이름', 'correct' => ['당신의', '이름'], 'extra' => ['나의', '나이']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ma', 'sœur', 'et', 'ton', 'frère'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My sister and your brother', 'correct' => ['my', 'sister', 'and', 'your', 'brother'], 'extra' => ['name']],
                            'es' => ['sentence' => 'Mi hermana y tu hermano', 'correct' => ['mi', 'hermana', 'y', 'tu', 'hermano'], 'extra' => ['nombre']],
                            'de' => ['sentence' => 'Meine Schwester und dein Bruder', 'correct' => ['meine', 'Schwester', 'und', 'dein', 'Bruder'], 'extra' => ['Name']],
                            'ja' => ['sentence' => '私の姉妹とあなたの兄弟', 'correct' => ['私の', '姉妹', 'と', 'あなたの', '兄弟'], 'extra' => ['名前']],
                            'ko' => ['sentence' => '나의 자매와 당신의 형제', 'correct' => ['나의', '자매와', '당신의', '형제'], 'extra' => ['이름']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Nice To Meet You', 5,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Enchanté'], ['fr' => 'Bienvenue']],
                phrases: [
                    'a' => [
                        'words' => ['enchanté', 'mon', 'ami'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Nice to meet you, my friend', 'correct' => ['nice to meet you', 'my', 'friend'], 'extra' => ['welcome']],
                            'es' => ['sentence' => 'Encantado, mi amigo', 'correct' => ['encantado', 'mi', 'amigo'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Freut mich, mein Freund', 'correct' => ['freut mich', 'mein', 'Freund'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => 'はじめまして、私の友達', 'correct' => ['はじめまして', '私の', '友達'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '반갑습니다, 나의 친구', 'correct' => ['반갑습니다', '나의', '친구'], 'extra' => ['환영합니다']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bienvenue', 'dans', 'ma', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Welcome to my house', 'correct' => ['welcome', 'to', 'my', 'house'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Bienvenido a mi casa', 'correct' => ['bienvenido', 'a', 'mi', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Willkommen in meinem Haus', 'correct' => ['willkommen', 'in', 'meinem', 'Haus'], 'extra' => ['Freund']],
                            'ja' => ['sentence' => '私の家へようこそ', 'correct' => ['私の', '家', 'へ', 'ようこそ'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '나의 집에 환영합니다', 'correct' => ['나의', '집에', '환영합니다'], 'extra' => ['친구']],
                        ],
                    ],
                    'c' => [
                        'words' => ['enchanté', 'je suis', 'ton', 'ami'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Nice to meet you, I am your friend', 'correct' => ['nice to meet you', 'I', 'am', 'your', 'friend'], 'extra' => ['welcome']],
                            'es' => ['sentence' => 'Encantado, soy tu amigo', 'correct' => ['encantado', 'soy', 'tu', 'amigo'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Freut mich, ich bin dein Freund', 'correct' => ['freut mich', 'ich', 'bin', 'dein', 'Freund'], 'extra' => ['willkommen']],
                            'ja' => ['sentence' => 'はじめまして、私はあなたの友達です', 'correct' => ['はじめまして', '私', 'は', 'あなたの', '友達', 'です'], 'extra' => ['ようこそ']],
                            'ko' => ['sentence' => '반갑습니다, 저는 당신의 친구입니다', 'correct' => ['반갑습니다', '저는', '당신의', '친구입니다'], 'extra' => ['환영합니다']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
