<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation01Seeder extends Seeder
{
    private const PICTURES = ['선생님' => 'teacher', '친구' => 'friend', '집' => 'house', '학교' => 'school', '어머니' => 'mother', '아버지' => 'father', '형제' => 'brother', '자매' => 'sister'];

    /**
     * Korean Conversation, Unit 1, the Korean twin of the English "Introducing Yourself" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, '유닛 1: 자기소개', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 선생님 · 친구', 1,
                pictures: [['ko' => '선생님', 'img' => 'teacher'], ['ko' => '친구', 'img' => 'friend']],
                plain: [['ko' => '이름'], ['ko' => '입니다']],
                phrases: [
                    'a' => [
                        'words' => ['제', '이름'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my name', 'correct' => ['my', 'name'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Mi nombre', 'correct' => ['mi', 'nombre'], 'extra' => ['amigo', 'soy']],
                            'de' => ['sentence' => 'Mein Name', 'correct' => ['mein', 'Name'], 'extra' => ['Freund', 'ich bin']],
                            'fr' => ['sentence' => 'Mon nom', 'correct' => ['mon', 'nom'], 'extra' => ['ami', 'je suis']],
                            'ja' => ['sentence' => '私の名前', 'correct' => ['私の', '名前'], 'extra' => ['友達']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '선생님입니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I am a teacher', 'correct' => ['I am', 'a', 'teacher'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Soy profesor', 'correct' => ['soy', 'profesor'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Ich bin Lehrer', 'correct' => ['ich bin', 'Lehrer'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Je suis professeur', 'correct' => ['je suis', 'professeur'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '私は先生です', 'correct' => ['私', 'は', '先生', 'です'], 'extra' => ['友達']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '친구는', '선생님입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'my friend is a teacher', 'correct' => ['my', 'friend', 'is', 'a', 'teacher'], 'extra' => ['name']],
                            'es' => ['sentence' => 'Mi amigo es profesor', 'correct' => ['mi', 'amigo', 'es', 'profesor'], 'extra' => ['nombre']],
                            'de' => ['sentence' => 'Mein Freund ist Lehrer', 'correct' => ['mein', 'Freund', 'ist', 'Lehrer'], 'extra' => ['Name']],
                            'fr' => ['sentence' => 'Mon ami est professeur', 'correct' => ['mon', 'ami', 'est', 'professeur'], 'extra' => ['nom']],
                            'ja' => ['sentence' => '私の友達は先生です', 'correct' => ['私の', '友達', 'は', '先生', 'です'], 'extra' => ['名前']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 집 · 학교', 2,
                pictures: [['ko' => '집', 'img' => 'house'], ['ko' => '학교', 'img' => 'school']],
                plain: [['ko' => '나는 삽니다'], ['ko' => '도시']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '여기에', '삽니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I live here', 'correct' => ['I live', 'here'], 'extra' => ['town']],
                            'es' => ['sentence' => 'Vivo aquí', 'correct' => ['vivo', 'aquí'], 'extra' => ['ciudad', 'casa']],
                            'de' => ['sentence' => 'Ich wohne hier', 'correct' => ['ich wohne', 'hier'], 'extra' => ['Stadt', 'Haus']],
                            'fr' => ['sentence' => 'J\'habite ici', 'correct' => ['j\'habite', 'ici'], 'extra' => ['ville', 'maison']],
                            'ja' => ['sentence' => '私はここに住んでいる', 'correct' => ['私', 'は', 'ここ', 'に', '住んで', 'いる'], 'extra' => ['都市']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '도시에', '삽니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I live in a city', 'correct' => ['I live', 'in', 'a', 'city'], 'extra' => ['school']],
                            'es' => ['sentence' => 'Vivo en una ciudad', 'correct' => ['vivo', 'en', 'una', 'ciudad'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Ich wohne in einer Stadt', 'correct' => ['ich wohne', 'in', 'einer', 'Stadt'], 'extra' => ['Schule']],
                            'fr' => ['sentence' => 'J\'habite dans une ville', 'correct' => ['j\'habite', 'dans', 'une', 'ville'], 'extra' => ['école']],
                            'ja' => ['sentence' => '私は都市に住んでいる', 'correct' => ['私', 'は', '都市', 'に', '住んで', 'いる'], 'extra' => ['学校']],
                        ],
                    ],
                    'c' => [
                        'words' => ['집과', '학교'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a house and a school', 'correct' => ['a', 'house', 'and', 'a', 'school'], 'extra' => ['town']],
                            'es' => ['sentence' => 'Una casa y una escuela', 'correct' => ['una', 'casa', 'y', 'una', 'escuela'], 'extra' => ['ciudad']],
                            'de' => ['sentence' => 'Ein Haus und eine Schule', 'correct' => ['ein', 'Haus', 'und', 'eine', 'Schule'], 'extra' => ['Stadt']],
                            'fr' => ['sentence' => 'Une maison et une école', 'correct' => ['une', 'maison', 'et', 'une', 'école'], 'extra' => ['ville']],
                            'ja' => ['sentence' => '家と学校', 'correct' => ['家', 'と', '学校'], 'extra' => ['都市']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 어머니 · 아버지', 3,
                pictures: [['ko' => '어머니', 'img' => 'mother'], ['ko' => '아버지', 'img' => 'father']],
                plain: [['ko' => '나이'], ['ko' => '살']],
                phrases: [
                    'a' => [
                        'words' => ['제', '나이'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my age', 'correct' => ['my', 'age'], 'extra' => ['years old', 'mother']],
                            'es' => ['sentence' => 'Mi edad', 'correct' => ['mi', 'edad'], 'extra' => ['años', 'madre']],
                            'de' => ['sentence' => 'Mein Alter', 'correct' => ['mein', 'Alter'], 'extra' => ['Jahre alt', 'Mutter']],
                            'fr' => ['sentence' => 'Mon âge', 'correct' => ['mon', 'âge'], 'extra' => ['ans', 'mère']],
                            'ja' => ['sentence' => '私の年齢', 'correct' => ['私の', '年齢'], 'extra' => ['歳', '母']],
                        ],
                    ],
                    'b' => [
                        'words' => ['열', '살'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'ten years old', 'correct' => ['ten', 'years old'], 'extra' => ['age', 'father']],
                            'es' => ['sentence' => 'Diez años', 'correct' => ['diez', 'años'], 'extra' => ['edad', 'padre']],
                            'de' => ['sentence' => 'Zehn Jahre alt', 'correct' => ['zehn', 'Jahre alt'], 'extra' => ['Alter', 'Vater']],
                            'fr' => ['sentence' => 'Dix ans', 'correct' => ['dix', 'ans'], 'extra' => ['âge', 'père']],
                            'ja' => ['sentence' => '十歳', 'correct' => ['十歳'], 'extra' => ['年齢', '父']],
                        ],
                    ],
                    'c' => [
                        'words' => ['어머니와', '아버지'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'my mother and my father', 'correct' => ['my', 'mother', 'and', 'my', 'father'], 'extra' => ['age']],
                            'es' => ['sentence' => 'Mi madre y mi padre', 'correct' => ['mi', 'madre', 'y', 'mi', 'padre'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Meine Mutter und mein Vater', 'correct' => ['meine', 'Mutter', 'und', 'mein', 'Vater'], 'extra' => ['Alter']],
                            'fr' => ['sentence' => 'Ma mère et mon père', 'correct' => ['ma', 'mère', 'et', 'mon', 'père'], 'extra' => ['âge']],
                            'ja' => ['sentence' => '母と父', 'correct' => ['母', 'と', '父'], 'extra' => ['年齢']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 형제 · 자매', 4,
                pictures: [['ko' => '형제', 'img' => 'brother'], ['ko' => '자매', 'img' => 'sister']],
                plain: [['ko' => '입니다'], ['ko' => '당신의']],
                phrases: [
                    'a' => [
                        'words' => ['당신은', '제', '형제입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'you are my brother', 'correct' => ['you are', 'my', 'brother'], 'extra' => ['sister']],
                            'es' => ['sentence' => 'Eres mi hermano', 'correct' => ['eres', 'mi', 'hermano'], 'extra' => ['hermana']],
                            'de' => ['sentence' => 'Du bist mein Bruder', 'correct' => ['du bist', 'mein', 'Bruder'], 'extra' => ['Schwester']],
                            'fr' => ['sentence' => 'Tu es mon frère', 'correct' => ['tu es', 'mon', 'frère'], 'extra' => ['sœur']],
                            'ja' => ['sentence' => 'あなたは私の兄弟です', 'correct' => ['あなた', 'は', '私の', '兄弟', 'です'], 'extra' => ['姉妹']],
                        ],
                    ],
                    'b' => [
                        'words' => ['당신의', '이름'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'your name', 'correct' => ['your', 'name'], 'extra' => ['my']],
                            'es' => ['sentence' => 'Tu nombre', 'correct' => ['tu', 'nombre'], 'extra' => ['mi', 'edad']],
                            'de' => ['sentence' => 'Dein Name', 'correct' => ['dein', 'Name'], 'extra' => ['mein', 'Alter']],
                            'fr' => ['sentence' => 'Ton nom', 'correct' => ['ton', 'nom'], 'extra' => ['mon', 'âge']],
                            'ja' => ['sentence' => 'あなたの名前', 'correct' => ['あなたの', '名前'], 'extra' => ['私の']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '자매와', '당신의', '형제'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'my sister and your brother', 'correct' => ['my', 'sister', 'and', 'your', 'brother'], 'extra' => ['name']],
                            'es' => ['sentence' => 'Mi hermana y tu hermano', 'correct' => ['mi', 'hermana', 'y', 'tu', 'hermano'], 'extra' => ['nombre']],
                            'de' => ['sentence' => 'Meine Schwester und dein Bruder', 'correct' => ['meine', 'Schwester', 'und', 'dein', 'Bruder'], 'extra' => ['Name']],
                            'fr' => ['sentence' => 'Ma sœur et ton frère', 'correct' => ['ma', 'sœur', 'et', 'ton', 'frère'], 'extra' => ['nom']],
                            'ja' => ['sentence' => '私の姉妹とあなたの兄弟', 'correct' => ['私の', '姉妹', 'と', 'あなたの', '兄弟'], 'extra' => ['名前']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 친구 · 집', 5,
                pictures: [['ko' => '친구', 'img' => 'friend'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '반갑습니다'], ['ko' => '환영합니다']],
                phrases: [
                    'a' => [
                        'words' => ['반갑습니다', '제', '친구'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'nice to meet you my friend', 'correct' => ['nice to meet you', 'my', 'friend'], 'extra' => ['welcome']],
                            'es' => ['sentence' => 'Encantado, mi amigo', 'correct' => ['encantado', 'mi', 'amigo'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Freut mich, mein Freund', 'correct' => ['freut mich', 'mein', 'Freund'], 'extra' => ['willkommen']],
                            'fr' => ['sentence' => 'Enchanté, mon ami', 'correct' => ['enchanté', 'mon', 'ami'], 'extra' => ['bienvenue']],
                            'ja' => ['sentence' => 'はじめまして、私の友達', 'correct' => ['はじめまして', '私の', '友達'], 'extra' => ['ようこそ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '집에', '환영합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'welcome to my house', 'correct' => ['welcome', 'to', 'my', 'house'], 'extra' => ['friend']],
                            'es' => ['sentence' => 'Bienvenido a mi casa', 'correct' => ['bienvenido', 'a', 'mi', 'casa'], 'extra' => ['amigo']],
                            'de' => ['sentence' => 'Willkommen in meinem Haus', 'correct' => ['willkommen', 'in', 'meinem', 'Haus'], 'extra' => ['Freund']],
                            'fr' => ['sentence' => 'Bienvenue dans ma maison', 'correct' => ['bienvenue', 'à', 'ma', 'maison'], 'extra' => ['ami']],
                            'ja' => ['sentence' => '私の家へようこそ', 'correct' => ['私の', '家', 'へ', 'ようこそ'], 'extra' => ['友達']],
                        ],
                    ],
                    'c' => [
                        'words' => ['반갑습니다', '저는', '당신의', '친구입니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'nice to meet you I am your friend', 'correct' => ['nice to meet you', 'I am', 'your', 'friend'], 'extra' => ['welcome']],
                            'es' => ['sentence' => 'Encantado, soy tu amigo', 'correct' => ['encantado', 'soy', 'tu', 'amigo'], 'extra' => ['bienvenido']],
                            'de' => ['sentence' => 'Freut mich, ich bin dein Freund', 'correct' => ['freut mich', 'ich bin', 'dein', 'Freund'], 'extra' => ['willkommen']],
                            'fr' => ['sentence' => 'Enchanté, je suis ton ami', 'correct' => ['enchanté', 'je suis', 'ton', 'ami'], 'extra' => ['bienvenue']],
                            'ja' => ['sentence' => 'はじめまして、私はあなたの友達です', 'correct' => ['はじめまして', '私', 'は', 'あなたの', '友達', 'です'], 'extra' => ['ようこそ']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
