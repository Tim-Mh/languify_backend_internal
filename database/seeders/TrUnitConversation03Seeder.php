<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitConversation03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kitap' => 'book', 'Kalem' => 'pen', 'Kedi' => 'cat', 'Köpek' => 'dog',
        'Ev' => 'house', 'Elma' => 'apple', 'Masa' => 'table', 'Sandalye' => 'chair',
    ];

    /**
     * Turkish Conversation Unit 3 — numbers and age.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * THE RULE THIS UNIT ACTUALLY TEACHES: NO PLURAL AFTER A NUMBER.
     *
     * Turkish counts with a singular noun. "Two books" is `iki kitap` —
     * literally "two book". `iki kitaplar` is wrong, and it is the single most
     * common mistake an English, French, Spanish or German speaker makes,
     * because all four of those languages pluralise.
     *
     * So every counting phrase here is deliberately numeral + singular, and the
     * plural `kitaplar` appears only in Lesson 5, on its own with no number in
     * front of it, so the contrast is visible:
     *
     *     kitaplar        books        (plural, no number)
     *     iki kitap       two books    (number, singular)
     *
     * The learner is never asked to build `iki kitaplar`, and never sees it
     * offered as a correct answer.
     *
     * `Yaşındayım` ("I am ... years old") is one tile. It is a stack of four
     * suffixes on `yaş`, and no learner at this level should be assembling it.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Numbers & Age', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: One & Two', 1,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Kalem', 'img' => 'pen']],
                plain: [['tr' => 'Bir'], ['tr' => 'İki']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kitap'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'One book', 'correct' => ['one', 'book'], 'extra' => ['two', 'pen']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['deux', 'stylo']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['dos', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['zwei', 'Stift']],
                            'ja' => ['sentence' => '本一冊', 'correct' => ['本', '一冊'], 'extra' => ['二', 'ペン']],
                            'ko' => ['sentence' => '책 한 권', 'correct' => ['책', '한', '권'], 'extra' => ['둘', '펜']],
                        ],
                    ],
                    'b' => [
                        // Singular noun after the numeral. This is the lesson.
                        'words' => ['iki', 'kalem'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Two pens', 'correct' => ['two', 'pen'], 'extra' => ['one', 'book']],
                            'fr' => ['sentence' => 'Deux stylos', 'correct' => ['deux', 'stylo'], 'extra' => ['un', 'livre']],
                            'es' => ['sentence' => 'Dos bolígrafos', 'correct' => ['dos', 'bolígrafo'], 'extra' => ['un', 'libro']],
                            'de' => ['sentence' => 'Zwei Stifte', 'correct' => ['zwei', 'Stift'], 'extra' => ['ein', 'Buch']],
                            'ja' => ['sentence' => 'ペン二本', 'correct' => ['ペン', '二本'], 'extra' => ['一つの', '本']],
                            'ko' => ['sentence' => '펜 두 자루', 'correct' => ['펜', '두', '자루'], 'extra' => ['하나의', '책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kitap', 've', 'iki', 'kalem'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'One book and two pens', 'correct' => ['one', 'book', 'and', 'two', 'pen'], 'extra' => ['three']],
                            'fr' => ['sentence' => 'Un livre et deux stylos', 'correct' => ['un', 'livre', 'et', 'deux', 'stylo'], 'extra' => ['trois']],
                            'es' => ['sentence' => 'Un libro y dos bolígrafos', 'correct' => ['un', 'libro', 'y', 'dos', 'bolígrafo'], 'extra' => ['tres']],
                            'de' => ['sentence' => 'Ein Buch und zwei Stifte', 'correct' => ['ein', 'Buch', 'und', 'zwei', 'Stift'], 'extra' => ['drei']],
                            'ja' => ['sentence' => '本一冊とペン二本', 'correct' => ['本', '一冊', 'と', 'ペン', '二本'], 'extra' => ['三']],
                            'ko' => ['sentence' => '책 한 권과 펜 두 자루', 'correct' => ['책', '한', '권과', '펜', '두', '자루'], 'extra' => ['셋']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Three & Four', 2,
                pictures: [['tr' => 'Kedi', 'img' => 'cat'], ['tr' => 'Köpek', 'img' => 'dog']],
                plain: [['tr' => 'Üç'], ['tr' => 'Dört']],
                phrases: [
                    'a' => [
                        'words' => ['üç', 'kedi'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Three cats', 'correct' => ['three', 'cat'], 'extra' => ['four', 'dog']],
                            'fr' => ['sentence' => 'Trois chats', 'correct' => ['trois', 'chat'], 'extra' => ['quatre', 'chien']],
                            'es' => ['sentence' => 'Tres gatos', 'correct' => ['tres', 'gato'], 'extra' => ['cuatro', 'perro']],
                            'de' => ['sentence' => 'Drei Katzen', 'correct' => ['drei', 'Katze'], 'extra' => ['vier', 'Hund']],
                            'ja' => ['sentence' => '猫三匹', 'correct' => ['猫', '三', '匹'], 'extra' => ['四', '犬']],
                            'ko' => ['sentence' => '고양이 세 마리', 'correct' => ['고양이', '세', '마리'], 'extra' => ['넷', '개']],
                        ],
                    ],
                    'b' => [
                        'words' => ['dört', 'köpek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Four dogs', 'correct' => ['four', 'dog'], 'extra' => ['three', 'cat']],
                            'fr' => ['sentence' => 'Quatre chiens', 'correct' => ['quatre', 'chien'], 'extra' => ['trois', 'chat']],
                            'es' => ['sentence' => 'Cuatro perros', 'correct' => ['cuatro', 'perro'], 'extra' => ['tres', 'gato']],
                            'de' => ['sentence' => 'Vier Hunde', 'correct' => ['vier', 'Hund'], 'extra' => ['drei', 'Katze']],
                            'ja' => ['sentence' => '犬四匹', 'correct' => ['犬', '四', '匹'], 'extra' => ['三', '猫']],
                            'ko' => ['sentence' => '개 네 마리', 'correct' => ['개', '네', '마리'], 'extra' => ['셋', '고양이']],
                        ],
                    ],
                    'c' => [
                        'words' => ['üç', 'kedi', 've', 'dört', 'köpek'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Three cats and four dogs', 'correct' => ['three', 'cat', 'and', 'four', 'dog'], 'extra' => ['five']],
                            'fr' => ['sentence' => 'Trois chats et quatre chiens', 'correct' => ['trois', 'chat', 'et', 'quatre', 'chien'], 'extra' => ['cinq']],
                            'es' => ['sentence' => 'Tres gatos y cuatro perros', 'correct' => ['tres', 'gato', 'y', 'cuatro', 'perro'], 'extra' => ['cinco']],
                            'de' => ['sentence' => 'Drei Katzen und vier Hunde', 'correct' => ['drei', 'Katze', 'und', 'vier', 'Hund'], 'extra' => ['fünf']],
                            'ja' => ['sentence' => '猫三匹と犬四匹', 'correct' => ['猫', '三', '匹', 'と', '犬', '四', '匹'], 'extra' => ['五']],
                            'ko' => ['sentence' => '고양이 세 마리와 개 네 마리', 'correct' => ['고양이', '세', '마리와', '개', '네', '마리'], 'extra' => ['다섯']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Five & Ten', 3,
                pictures: [['tr' => 'Elma', 'img' => 'apple'], ['tr' => 'Kitap', 'img' => 'book']],
                plain: [['tr' => 'Beş'], ['tr' => 'On']],
                phrases: [
                    'a' => [
                        'words' => ['beş', 'elma'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Five apples', 'correct' => ['five', 'apple'], 'extra' => ['ten', 'book']],
                            'fr' => ['sentence' => 'Cinq pommes', 'correct' => ['cinq', 'pomme'], 'extra' => ['dix', 'livre']],
                            'es' => ['sentence' => 'Cinco manzanas', 'correct' => ['cinco', 'manzana'], 'extra' => ['diez', 'libro']],
                            'de' => ['sentence' => 'Fünf Äpfel', 'correct' => ['fünf', 'Apfel'], 'extra' => ['zehn', 'Buch']],
                            'ja' => ['sentence' => 'りんご五個', 'correct' => ['りんご', '五', '個'], 'extra' => ['十', '本']],
                            'ko' => ['sentence' => '사과 다섯 개', 'correct' => ['사과', '다섯', '개'], 'extra' => ['열', '책']],
                        ],
                    ],
                    'b' => [
                        'words' => ['on', 'kitap'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Ten books', 'correct' => ['ten', 'book'], 'extra' => ['five', 'apple']],
                            'fr' => ['sentence' => 'Dix livres', 'correct' => ['dix', 'livre'], 'extra' => ['cinq', 'pomme']],
                            'es' => ['sentence' => 'Diez libros', 'correct' => ['diez', 'libro'], 'extra' => ['cinco', 'manzana']],
                            'de' => ['sentence' => 'Zehn Bücher', 'correct' => ['zehn', 'Buch'], 'extra' => ['fünf', 'Apfel']],
                            'ja' => ['sentence' => '本十冊', 'correct' => ['本', '十', '冊'], 'extra' => ['五', 'りんご']],
                            'ko' => ['sentence' => '책 열 권', 'correct' => ['책', '열', '권'], 'extra' => ['다섯', '사과']],
                        ],
                    ],
                    'c' => [
                        'words' => ['beş', 'elma', 've', 'on', 'kitap'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Five apples and ten books', 'correct' => ['five', 'apple', 'and', 'ten', 'book'], 'extra' => ['two']],
                            'fr' => ['sentence' => 'Cinq pommes et dix livres', 'correct' => ['cinq', 'pomme', 'et', 'dix', 'livre'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Cinco manzanas y diez libros', 'correct' => ['cinco', 'manzana', 'y', 'diez', 'libro'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Fünf Äpfel und zehn Bücher', 'correct' => ['fünf', 'Apfel', 'und', 'zehn', 'Buch'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => 'りんご五個と本十冊', 'correct' => ['りんご', '五', '個', 'と', '本', '十', '冊'], 'extra' => ['二']],
                            'ko' => ['sentence' => '사과 다섯 개와 책 열 권', 'correct' => ['사과', '다섯', '개와', '책', '열', '권'], 'extra' => ['둘']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: My Age', 4,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Anne', 'img' => 'mother']],
                plain: [['tr' => 'Yaş'], ['tr' => 'Yaşındayım']],
                phrases: [
                    'a' => [
                        'words' => ['benim', 'yaşım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My age', 'correct' => ['my', 'age'], 'extra' => ['ten']],
                            'fr' => ['sentence' => 'Mon âge', 'correct' => ['mon', 'âge'], 'extra' => ['dix']],
                            'es' => ['sentence' => 'Mi edad', 'correct' => ['mi', 'edad'], 'extra' => ['diez']],
                            'de' => ['sentence' => 'Mein Alter', 'correct' => ['mein', 'Alter'], 'extra' => ['zehn']],
                            'ja' => ['sentence' => '私の年齢', 'correct' => ['私の', '年齢'], 'extra' => ['十']],
                            'ko' => ['sentence' => '내 나이', 'correct' => ['내', '나이'], 'extra' => ['열']],
                        ],
                    ],
                    'b' => [
                        // One tile: four suffixes stacked on `yaş`.
                        'words' => ['on', 'yaşındayım'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['ten', 'I am years old'], 'extra' => ['age']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['diez', 'tengo años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['zehn', 'ich bin Jahre alt'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '私は十歳です', 'correct' => ['私', 'は', '十歳', 'です'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '나는 열 살입니다', 'correct' => ['나는', '열', '살입니다'], 'extra' => ['나이']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'on', 'yaşındayım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['I', 'ten', 'I am years old'], 'extra' => ['age']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['je', 'dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['yo', 'diez', 'tengo años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['ich', 'zehn', 'ich bin Jahre alt'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '私は十歳です', 'correct' => ['私', 'は', '十歳', 'です'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '나는 열 살입니다', 'correct' => ['나는', '열', '살입니다'], 'extra' => ['나이']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Counting Things', 5,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Kedi', 'img' => 'cat']],
                plain: [['tr' => 'Kaç'], ['tr' => 'Kitaplar']],
                phrases: [
                    'a' => [
                        'words' => ['kaç', 'kitap'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'How many books', 'correct' => ['how many', 'book'], 'extra' => ['books']],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien', 'livre'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libro'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Buch'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '本はいくつですか', 'correct' => ['本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['本']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['책들']],
                        ],
                    ],
                    'b' => [
                        // Plural with NO number in front — the contrast case.
                        'words' => ['benim', 'kitaplar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My books', 'correct' => ['my', 'books'], 'extra' => ['book']],
                            'fr' => ['sentence' => 'Mes livres', 'correct' => ['mon', 'livres'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Mis libros', 'correct' => ['mi', 'libros'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Meine Bücher', 'correct' => ['mein', 'Bücher'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '私の本', 'correct' => ['私の', '本'], 'extra' => ['本']],
                            'ko' => ['sentence' => '내 책들', 'correct' => ['내', '책들'], 'extra' => ['책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['iki', 'kedi', 've', 'üç', 'kitap'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Two cats and three books', 'correct' => ['two', 'cat', 'and', 'three', 'book'], 'extra' => ['books']],
                            'fr' => ['sentence' => 'Deux chats et trois livres', 'correct' => ['deux', 'chat', 'et', 'trois', 'livre'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Dos gatos y tres libros', 'correct' => ['dos', 'gato', 'y', 'tres', 'libro'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Zwei Katzen und drei Bücher', 'correct' => ['zwei', 'Katze', 'und', 'drei', 'Buch'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '猫二匹と本三冊', 'correct' => ['猫', '二匹', 'と', '本', '三冊'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 두 마리와 책 세 권', 'correct' => ['고양이', '두', '마리와', '책', '세', '권'], 'extra' => ['책들']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
