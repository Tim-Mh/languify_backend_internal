<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner04Seeder extends Seeder
{
    private const PICTURES = ['탁자' => 'table', '의자' => 'chair', '고양이' => 'cat', '개' => 'dog', '집' => 'house'];

    /**
     * Korean Chapter 1 (Beginner), Unit 4, the Korean twin of the English
     * "Unit 4: Home & Objects" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, '유닛 4: 집과 물건', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 탁자 · 의자', 1,
                pictures: [['ko' => '탁자', 'img' => 'table'], ['ko' => '의자', 'img' => 'chair']],
                plain: [['ko' => '그'], ['ko' => '그리고']],
                phrases: [
                    'a' => [
                        'words' => ['그', '탁자'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the table', 'correct' => ['the', 'table'], 'extra' => ['chair']],
                            'es' => ['sentence' => 'La mesa', 'correct' => ['la', 'mesa'], 'extra' => ['silla']],
                            'de' => ['sentence' => 'Der Tisch', 'correct' => ['der', 'Tisch'], 'extra' => ['Stuhl']],
                            'fr' => ['sentence' => 'La table', 'correct' => ['la', 'table'], 'extra' => ['chaise']],
                            'ja' => ['sentence' => 'そのテーブル', 'correct' => ['その', 'テーブル'], 'extra' => ['椅子']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그', '의자'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the chair', 'correct' => ['the', 'chair'], 'extra' => ['table']],
                            'es' => ['sentence' => 'La silla', 'correct' => ['la', 'silla'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Der Stuhl', 'correct' => ['der', 'Stuhl'], 'extra' => ['Tisch']],
                            'fr' => ['sentence' => 'La chaise', 'correct' => ['la', 'chaise'], 'extra' => ['table']],
                            'ja' => ['sentence' => 'その椅子', 'correct' => ['その', '椅子'], 'extra' => ['テーブル']],
                        ],
                    ],
                    'c' => [
                        'words' => ['탁자와', '의자'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the table and the chair', 'correct' => ['the', 'table', 'and', 'the', 'chair'], 'extra' => ['house']],
                            'es' => ['sentence' => 'La mesa y la silla', 'correct' => ['la', 'mesa', 'y', 'la', 'silla'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Der Tisch und der Stuhl', 'correct' => ['der', 'Tisch', 'und', 'der', 'Stuhl'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'La table et la chaise', 'correct' => ['la', 'table', 'et', 'la', 'chaise'], 'extra' => ['maison']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['家']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 고양이 · 탁자', 2,
                pictures: [['ko' => '고양이', 'img' => 'cat'], ['ko' => '탁자', 'img' => 'table']],
                plain: [['ko' => '안에'], ['ko' => '위에']],
                phrases: [
                    'a' => [
                        'words' => ['탁자', '위의', '고양이'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the cat on the table', 'correct' => ['the', 'cat', 'on', 'the', 'table'], 'extra' => ['in']],
                            'es' => ['sentence' => 'El gato sobre la mesa', 'correct' => ['el', 'gato', 'sobre', 'la', 'mesa'], 'extra' => ['en']],
                            'de' => ['sentence' => 'Die Katze auf dem Tisch', 'correct' => ['die', 'Katze', 'auf', 'dem', 'Tisch'], 'extra' => ['in']],
                            'fr' => ['sentence' => 'Le chat sur la table', 'correct' => ['le', 'chat', 'sur', 'la', 'table'], 'extra' => ['dans']],
                            'ja' => ['sentence' => 'テーブルの上の猫', 'correct' => ['テーブル', 'の', '上', 'の', '猫'], 'extra' => ['の中に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['집', '안의', '고양이'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the cat in the house', 'correct' => ['the', 'cat', 'in', 'the', 'house'], 'extra' => ['on']],
                            'es' => ['sentence' => 'El gato en la casa', 'correct' => ['el', 'gato', 'en', 'la', 'casa'], 'extra' => ['sobre']],
                            'de' => ['sentence' => 'Die Katze im Haus', 'correct' => ['die', 'Katze', 'in', 'dem', 'Haus'], 'extra' => ['auf']],
                            'fr' => ['sentence' => 'Le chat dans la maison', 'correct' => ['le', 'chat', 'dans', 'la', 'maison'], 'extra' => ['sur']],
                            'ja' => ['sentence' => '家の中の猫', 'correct' => ['家', 'の', '中', 'の', '猫'], 'extra' => ['の上に']],
                        ],
                    ],
                    'c' => [
                        'words' => ['탁자', '위', '또는', '집', '안'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'on the table or in the house', 'correct' => ['on', 'the', 'table', 'or', 'in', 'the', 'house'], 'extra' => ['cat']],
                            'es' => ['sentence' => 'Sobre la mesa o en la casa', 'correct' => ['sobre', 'la', 'mesa', 'o', 'en', 'la', 'casa'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Auf dem Tisch oder im Haus', 'correct' => ['auf', 'dem', 'Tisch', 'oder', 'in', 'dem', 'Haus'], 'extra' => ['Katze']],
                            'fr' => ['sentence' => 'Sur la table ou dans la maison', 'correct' => ['sur', 'la', 'table', 'ou', 'dans', 'la', 'maison'], 'extra' => ['chat']],
                            'ja' => ['sentence' => 'テーブルの上か家の中', 'correct' => ['テーブル', 'の', '上', 'か', '家', 'の', '中'], 'extra' => ['猫']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 개 · 고양이', 3,
                pictures: [['ko' => '개', 'img' => 'dog'], ['ko' => '고양이', 'img' => 'cat']],
                plain: [['ko' => '나는 가지고 있다'], ['ko' => '하나의']],
                phrases: [
                    'a' => [
                        'words' => ['저는', '개를', '키웁니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I have a dog', 'correct' => ['I have', 'a', 'dog'], 'extra' => ['cat']],
                            'es' => ['sentence' => 'Tengo un perro', 'correct' => ['tengo', 'un', 'perro'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Ich habe einen Hund', 'correct' => ['ich habe', 'einen', 'Hund'], 'extra' => ['Katze']],
                            'fr' => ['sentence' => 'J\'ai un chien', 'correct' => ['j\'ai', 'un', 'chien'], 'extra' => ['chat']],
                            'ja' => ['sentence' => '私は犬を飼っています', 'correct' => ['私', 'は', '犬', 'を', '飼っています'], 'extra' => ['猫']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '고양이를', '키웁니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I have a cat', 'correct' => ['I have', 'a', 'cat'], 'extra' => ['dog']],
                            'es' => ['sentence' => 'Tengo un gato', 'correct' => ['tengo', 'un', 'gato'], 'extra' => ['perro']],
                            'de' => ['sentence' => 'Ich habe eine Katze', 'correct' => ['ich habe', 'eine', 'Katze'], 'extra' => ['Hund']],
                            'fr' => ['sentence' => 'J\'ai un chat', 'correct' => ['j\'ai', 'un', 'chat'], 'extra' => ['chien']],
                            'ja' => ['sentence' => '私は猫を飼っています', 'correct' => ['私', 'は', '猫', 'を', '飼っています'], 'extra' => ['犬']],
                        ],
                    ],
                    'c' => [
                        'words' => ['저는', '고양이와', '개를', '키웁니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I have a cat and a dog', 'correct' => ['I have', 'a', 'cat', 'and', 'a', 'dog'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Tengo un gato y un perro', 'correct' => ['tengo', 'un', 'gato', 'y', 'un', 'perro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ich habe eine Katze und einen Hund', 'correct' => ['ich habe', 'eine', 'Katze', 'und', 'einen', 'Hund'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'J\'ai un chat et un chien', 'correct' => ['j\'ai', 'un', 'chat', 'et', 'un', 'chien'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '私は猫と犬を飼っています', 'correct' => ['私', 'は', '猫', 'と', '犬', 'を', '飼っています'], 'extra' => ['家']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 집 · 개', 4,
                pictures: [['ko' => '집', 'img' => 'house'], ['ko' => '개', 'img' => 'dog']],
                plain: [['ko' => '어디입니까'], ['ko' => '아래에']],
                phrases: [
                    'a' => [
                        'words' => ['개는', '어디입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'where is the dog', 'correct' => ['where is', 'the', 'dog'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Dónde está el perro', 'correct' => ['dónde está', 'el', 'perro'], 'extra' => ['casa', 'debajo']],
                            'de' => ['sentence' => 'Wo ist der Hund', 'correct' => ['wo ist', 'der', 'Hund'], 'extra' => ['Haus', 'unter']],
                            'fr' => ['sentence' => 'Où est le chien', 'correct' => ['où est', 'le', 'chien'], 'extra' => ['maison', 'sous']],
                            'ja' => ['sentence' => '犬はどこですか', 'correct' => ['犬', 'は', 'どこですか'], 'extra' => ['家']],
                        ],
                    ],
                    'b' => [
                        'words' => ['탁자', '아래의', '개'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the dog under the table', 'correct' => ['the', 'dog', 'under', 'the', 'table'], 'extra' => ['where is']],
                            'es' => ['sentence' => 'El perro debajo de la mesa', 'correct' => ['el', 'perro', 'debajo', 'la', 'mesa'], 'extra' => ['dónde está']],
                            'de' => ['sentence' => 'Der Hund unter dem Tisch', 'correct' => ['der', 'Hund', 'unter', 'dem', 'Tisch'], 'extra' => ['wo ist']],
                            'fr' => ['sentence' => 'Le chien sous la table', 'correct' => ['le', 'chien', 'sous', 'la', 'table'], 'extra' => ['où est']],
                            'ja' => ['sentence' => 'テーブルの下の犬', 'correct' => ['テーブル', 'の', '下', 'の', '犬'], 'extra' => ['どこですか']],
                        ],
                    ],
                    'c' => [
                        'words' => ['집은', '어디입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'where is the house', 'correct' => ['where is', 'the', 'house'], 'extra' => ['dog']],
                            'es' => ['sentence' => 'Dónde está la casa', 'correct' => ['dónde está', 'la', 'casa'], 'extra' => ['perro', 'debajo']],
                            'de' => ['sentence' => 'Wo ist das Haus', 'correct' => ['wo ist', 'das', 'Haus'], 'extra' => ['Hund', 'unter']],
                            'fr' => ['sentence' => 'Où est la maison', 'correct' => ['où est', 'la', 'maison'], 'extra' => ['chien', 'sous']],
                            'ja' => ['sentence' => '家はどこですか', 'correct' => ['家', 'は', 'どこですか'], 'extra' => ['犬']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 집 · 의자', 5,
                pictures: [['ko' => '집', 'img' => 'house'], ['ko' => '의자', 'img' => 'chair']],
                plain: [['ko' => '여기'], ['ko' => '나의']],
                phrases: [
                    'a' => [
                        'words' => ['여기', '제', '집입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'here is my house', 'correct' => ['here is', 'my', 'house'], 'extra' => ['chair']],
                            'es' => ['sentence' => 'Aquí está mi casa', 'correct' => ['aquí está', 'mi', 'casa'], 'extra' => ['silla']],
                            'de' => ['sentence' => 'Hier ist mein Haus', 'correct' => ['hier ist', 'mein', 'Haus'], 'extra' => ['Stuhl']],
                            'fr' => ['sentence' => 'Voici ma maison', 'correct' => ['voici', 'ma', 'maison'], 'extra' => ['chaise']],
                            'ja' => ['sentence' => 'これが私の家です', 'correct' => ['これが', '私の', '家', 'です'], 'extra' => ['椅子']],
                        ],
                    ],
                    'b' => [
                        'words' => ['여기', '제', '의자입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'here is my chair', 'correct' => ['here is', 'my', 'chair'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Aquí está mi silla', 'correct' => ['aquí está', 'mi', 'silla'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Hier ist mein Stuhl', 'correct' => ['hier ist', 'mein', 'Stuhl'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Voici ma chaise', 'correct' => ['voici', 'ma', 'chaise'], 'extra' => ['maison']],
                            'ja' => ['sentence' => 'これが私の椅子です', 'correct' => ['これが', '私の', '椅子', 'です'], 'extra' => ['家']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '집과', '제', '의자'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'my house and my chair', 'correct' => ['my', 'house', 'and', 'my', 'chair'], 'extra' => ['here is']],
                            'es' => ['sentence' => 'Mi casa y mi silla', 'correct' => ['mi', 'casa', 'y', 'mi', 'silla'], 'extra' => ['aquí está']],
                            'de' => ['sentence' => 'Mein Haus und mein Stuhl', 'correct' => ['mein', 'Haus', 'und', 'mein', 'Stuhl'], 'extra' => ['hier ist']],
                            'fr' => ['sentence' => 'Ma maison et ma chaise', 'correct' => ['ma', 'maison', 'et', 'ma', 'chaise'], 'extra' => ['voici']],
                            'ja' => ['sentence' => '私の家と私の椅子', 'correct' => ['私の', '家', 'と', '私の', '椅子'], 'extra' => ['これが']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
