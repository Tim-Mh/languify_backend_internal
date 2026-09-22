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
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['iki', 'qələm']],
                            'ar' => ['sentence' => 'واحد كتاب', 'correct' => ['واحد', 'كتاب'], 'extra' => ['اثنان', 'قلم']],
                            'ru' => ['sentence' => 'один книга', 'correct' => ['один', 'книга'], 'extra' => ['два', 'ручка']],
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
                            'en' => ['sentence' => 'Two pens', 'correct' => ['two', 'pens'], 'extra' => ['one', 'book']],
                            'az' => ['sentence' => 'iki qələmlər', 'correct' => ['iki', 'qələmlər'], 'extra' => ['bir', 'kitab']],
                            'ar' => ['sentence' => 'اثنان أقلام', 'correct' => ['اثنان', 'أقلام'], 'extra' => ['واحد', 'كتاب']],
                            'ru' => ['sentence' => 'два ручки', 'correct' => ['два', 'ручки'], 'extra' => ['один', 'книга']],
                            'fr' => ['sentence' => 'Deux stylos', 'correct' => ['deux', 'stylos'], 'extra' => ['un', 'livre']],
                            'es' => ['sentence' => 'Dos bolígrafos', 'correct' => ['dos', 'bolígrafos'], 'extra' => ['un', 'libro']],
                            'de' => ['sentence' => 'Zwei Stifte', 'correct' => ['zwei', 'Stifte'], 'extra' => ['ein', 'Buch']],
                            'ja' => ['sentence' => 'ペン二本', 'correct' => ['ペン', '二本'], 'extra' => ['一つの', '本']],
                            'ko' => ['sentence' => '펜 두 자루', 'correct' => ['펜', '두', '자루'], 'extra' => ['하나의', '책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kitap', 've', 'iki', 'kalem'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'One book and two pens', 'correct' => ['one', 'book', 'and', 'two', 'pens'], 'extra' => ['three']],
                            'az' => ['sentence' => 'bir kitab və iki qələmlər', 'correct' => ['bir', 'kitab', 'və', 'iki', 'qələmlər'], 'extra' => ['üç']],
                            'ar' => ['sentence' => 'واحد كتاب و اثنان أقلام', 'correct' => ['واحد', 'كتاب', 'و', 'اثنان', 'أقلام'], 'extra' => ['ثلاثة']],
                            'ru' => ['sentence' => 'один книга и два ручки', 'correct' => ['один', 'книга', 'и', 'два', 'ручки'], 'extra' => ['три']],
                            'fr' => ['sentence' => 'Un livre et deux stylos', 'correct' => ['un', 'livre', 'et', 'deux', 'stylos'], 'extra' => ['trois']],
                            'es' => ['sentence' => 'Un libro y dos bolígrafos', 'correct' => ['un', 'libro', 'y', 'dos', 'bolígrafos'], 'extra' => ['tres']],
                            'de' => ['sentence' => 'Ein Buch und zwei Stifte', 'correct' => ['ein', 'Buch', 'und', 'zwei', 'Stifte'], 'extra' => ['drei']],
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
                            'en' => ['sentence' => 'Three cats', 'correct' => ['three', 'cats'], 'extra' => ['four', 'dog']],
                            'az' => ['sentence' => 'üç pişiklər', 'correct' => ['üç', 'pişiklər'], 'extra' => ['dörd', 'it']],
                            'ar' => ['sentence' => 'ثلاثة قطط', 'correct' => ['ثلاثة', 'قطط'], 'extra' => ['أربعة', 'كلب']],
                            'ru' => ['sentence' => 'три коты', 'correct' => ['три', 'коты'], 'extra' => ['четыре', 'собака']],
                            'fr' => ['sentence' => 'Trois chats', 'correct' => ['trois', 'chats'], 'extra' => ['quatre', 'chien']],
                            'es' => ['sentence' => 'Tres gatos', 'correct' => ['tres', 'gatos'], 'extra' => ['cuatro', 'perro']],
                            'de' => ['sentence' => 'Drei Katzen', 'correct' => ['drei', 'Katzen'], 'extra' => ['vier', 'Hund']],
                            'ja' => ['sentence' => '猫三匹', 'correct' => ['猫', '三', '匹'], 'extra' => ['四', '犬']],
                            'ko' => ['sentence' => '고양이 세 마리', 'correct' => ['고양이', '세', '마리'], 'extra' => ['넷', '개']],
                        ],
                    ],
                    'b' => [
                        'words' => ['dört', 'köpek'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Four dogs', 'correct' => ['four', 'dogs'], 'extra' => ['three', 'cat']],
                            'az' => ['sentence' => 'dörd itlər', 'correct' => ['dörd', 'itlər'], 'extra' => ['üç', 'pişik']],
                            'ar' => ['sentence' => 'أربعة كلاب', 'correct' => ['أربعة', 'كلاب'], 'extra' => ['ثلاثة', 'قط']],
                            'ru' => ['sentence' => 'четыре собаки', 'correct' => ['четыре', 'собаки'], 'extra' => ['три', 'кот']],
                            'fr' => ['sentence' => 'Quatre chiens', 'correct' => ['quatre', 'chiens'], 'extra' => ['trois', 'chat']],
                            'es' => ['sentence' => 'Cuatro perros', 'correct' => ['cuatro', 'perros'], 'extra' => ['tres', 'gato']],
                            'de' => ['sentence' => 'Vier Hunde', 'correct' => ['vier', 'Hunde'], 'extra' => ['drei', 'Katze']],
                            'ja' => ['sentence' => '犬四匹', 'correct' => ['犬', '四', '匹'], 'extra' => ['三', '猫']],
                            'ko' => ['sentence' => '개 네 마리', 'correct' => ['개', '네', '마리'], 'extra' => ['셋', '고양이']],
                        ],
                    ],
                    'c' => [
                        'words' => ['üç', 'kedi', 've', 'dört', 'köpek'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Three cats and four dogs', 'correct' => ['three', 'cats', 'and', 'four', 'dogs'], 'extra' => ['five']],
                            'az' => ['sentence' => 'üç pişiklər və dörd itlər', 'correct' => ['üç', 'pişiklər', 'və', 'dörd', 'itlər'], 'extra' => ['beş']],
                            'ar' => ['sentence' => 'ثلاثة قطط و أربعة كلاب', 'correct' => ['ثلاثة', 'قطط', 'و', 'أربعة', 'كلاب'], 'extra' => ['خمسة']],
                            'ru' => ['sentence' => 'три коты и четыре собаки', 'correct' => ['три', 'коты', 'и', 'четыре', 'собаки'], 'extra' => ['пять']],
                            'fr' => ['sentence' => 'Trois chats et quatre chiens', 'correct' => ['trois', 'chats', 'et', 'quatre', 'chiens'], 'extra' => ['cinq']],
                            'es' => ['sentence' => 'Tres gatos y cuatro perros', 'correct' => ['tres', 'gatos', 'y', 'cuatro', 'perros'], 'extra' => ['cinco']],
                            'de' => ['sentence' => 'Drei Katzen und vier Hunde', 'correct' => ['drei', 'Katzen', 'und', 'vier', 'Hunde'], 'extra' => ['fünf']],
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
                            'en' => ['sentence' => 'Five apples', 'correct' => ['five', 'apples'], 'extra' => ['ten', 'book']],
                            'az' => ['sentence' => 'beş almalar', 'correct' => ['beş', 'almalar'], 'extra' => ['on', 'kitab']],
                            'ar' => ['sentence' => 'خمسة تفاح', 'correct' => ['خمسة', 'تفاح'], 'extra' => ['عشرة', 'كتاب']],
                            'ru' => ['sentence' => 'пять яблоки', 'correct' => ['пять', 'яблоки'], 'extra' => ['десять', 'книга']],
                            'fr' => ['sentence' => 'Cinq pommes', 'correct' => ['cinq', 'pommes'], 'extra' => ['dix', 'livre']],
                            'es' => ['sentence' => 'Cinco manzanas', 'correct' => ['cinco', 'manzanas'], 'extra' => ['diez', 'libro']],
                            'de' => ['sentence' => 'Fünf Äpfel', 'correct' => ['fünf', 'Äpfel'], 'extra' => ['zehn', 'Bücher']],
                            'ja' => ['sentence' => 'りんご五個', 'correct' => ['りんご', '五', '個'], 'extra' => ['十', '本']],
                            'ko' => ['sentence' => '사과 다섯 개', 'correct' => ['사과', '다섯', '개'], 'extra' => ['열', '책']],
                        ],
                    ],
                    'b' => [
                        'words' => ['on', 'kitap'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Ten books', 'correct' => ['ten', 'books'], 'extra' => ['five', 'apple']],
                            'az' => ['sentence' => 'on kitablar', 'correct' => ['on', 'kitablar'], 'extra' => ['beş', 'alma']],
                            'ar' => ['sentence' => 'عشرة كتب', 'correct' => ['عشرة', 'كتب'], 'extra' => ['خمسة', 'تفاحة']],
                            'ru' => ['sentence' => 'десять книги', 'correct' => ['десять', 'книги'], 'extra' => ['пять', 'яблоко']],
                            'fr' => ['sentence' => 'Dix livres', 'correct' => ['dix', 'livres'], 'extra' => ['cinq', 'pomme']],
                            'es' => ['sentence' => 'Diez libros', 'correct' => ['diez', 'libros'], 'extra' => ['cinco', 'manzana']],
                            'de' => ['sentence' => 'Zehn Bücher', 'correct' => ['zehn', 'Bücher'], 'extra' => ['fünf', 'Apfel']],
                            'ja' => ['sentence' => '本十冊', 'correct' => ['本', '十', '冊'], 'extra' => ['五', 'りんご']],
                            'ko' => ['sentence' => '책 열 권', 'correct' => ['책', '열', '권'], 'extra' => ['다섯', '사과']],
                        ],
                    ],
                    'c' => [
                        'words' => ['beş', 'elma', 've', 'on', 'kitap'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Five apples and ten books', 'correct' => ['five', 'apples', 'and', 'ten', 'books'], 'extra' => ['two']],
                            'az' => ['sentence' => 'beş almalar və on kitablar', 'correct' => ['beş', 'almalar', 'və', 'on', 'kitablar'], 'extra' => ['iki']],
                            'ar' => ['sentence' => 'خمسة تفاح و عشرة كتب', 'correct' => ['خمسة', 'تفاح', 'و', 'عشرة', 'كتب'], 'extra' => ['اثنان']],
                            'ru' => ['sentence' => 'пять яблоки и десять книги', 'correct' => ['пять', 'яблоки', 'и', 'десять', 'книги'], 'extra' => ['два']],
                            'fr' => ['sentence' => 'Cinq pommes et dix livres', 'correct' => ['cinq', 'pommes', 'et', 'dix', 'livres'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Cinco manzanas y diez libros', 'correct' => ['cinco', 'manzanas', 'y', 'diez', 'libros'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Fünf Äpfel und zehn Bücher', 'correct' => ['fünf', 'Äpfel', 'und', 'zehn', 'Bücher'], 'extra' => ['zwei']],
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
                            'az' => ['sentence' => 'mənim yaş', 'correct' => ['mənim', 'yaş'], 'extra' => ['on']],
                            'ar' => ['sentence' => 'عمر', 'correct' => ['عمر'], 'extra' => ['عشرة']],
                            'ru' => ['sentence' => 'мой возраст', 'correct' => ['мой', 'возраст'], 'extra' => ['десять']],
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
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['I', 'am ten years old'], 'extra' => ['age']],
                            'az' => ['sentence' => 'mən on yaşındayam', 'correct' => ['mən', 'on yaşındayam'], 'extra' => ['yaş']],
                            'ar' => ['sentence' => 'أنا عمري عشر سنوات', 'correct' => ['أنا', 'عمري', 'عشر سنوات'], 'extra' => ['عمر']],
                            'ru' => ['sentence' => 'я мне десять лет', 'correct' => ['я', 'мне', 'десять лет'], 'extra' => ['возраст']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['tengo', 'diez años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['ich', 'bin zehn Jahre alt'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '私は十歳です', 'correct' => ['私', 'は', '十歳', 'です'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '나는 열 살입니다', 'correct' => ['나는', '열', '살입니다'], 'extra' => ['나이']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'on', 'yaşındayım'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['I am', 'ten years', 'old'], 'extra' => ['age']],
                            'az' => ['sentence' => 'mən on yaşında köhnə', 'correct' => ['mən', 'on yaşında', 'köhnə'], 'extra' => ['yaş']],
                            'ar' => ['sentence' => 'أنا عشر سنوات قديم', 'correct' => ['أنا', 'عشر سنوات', 'قديم'], 'extra' => ['عمر']],
                            'ru' => ['sentence' => 'я десять лет старый', 'correct' => ['я', 'десять лет', 'старый'], 'extra' => ['возраст']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['je', 'dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['tengo', 'diez', 'años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['ich bin', 'zehn Jahre', 'alt'], 'extra' => ['Alter']],
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
                            'en' => ['sentence' => 'How many books', 'correct' => ['how many', 'books'], 'extra' => ['books']],
                            'az' => ['sentence' => 'neçə kitablar', 'correct' => ['neçə', 'kitablar'], 'extra' => []],
                            'ar' => ['sentence' => 'كم كتب', 'correct' => ['كم', 'كتب'], 'extra' => []],
                            'ru' => ['sentence' => 'сколько книги', 'correct' => ['сколько', 'книги'], 'extra' => []],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien de', 'livres'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libros'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Bücher'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '本はいくつですか', 'correct' => ['本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['本']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['책들']],
                        ],
                    ],
                    'b' => [
                        // Plural with NO number in front — the contrast case.
                        'words' => ['benim', 'kitaplar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My books', 'correct' => ['my', 'books'], 'extra' => ['book']],
                            'az' => ['sentence' => 'mənim kitablar', 'correct' => ['mənim', 'kitablar'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'كتب', 'correct' => ['كتب'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'мой книги', 'correct' => ['мой', 'книги'], 'extra' => ['книга']],
                            'fr' => ['sentence' => 'Mes livres', 'correct' => ['mes', 'livres'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Mis libros', 'correct' => ['mis', 'libros'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Meine Bücher', 'correct' => ['meine', 'Bücher'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '私の本', 'correct' => ['私の', '本'], 'extra' => ['本']],
                            'ko' => ['sentence' => '내 책들', 'correct' => ['내', '책들'], 'extra' => ['책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['iki', 'kedi', 've', 'üç', 'kitap'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Two cats and three books', 'correct' => ['two', 'cats', 'and', 'three', 'books'], 'extra' => ['books']],
                            'az' => ['sentence' => 'iki pişiklər və üç kitablar', 'correct' => ['iki', 'pişiklər', 'və', 'üç', 'kitablar'], 'extra' => []],
                            'ar' => ['sentence' => 'اثنان قطط و ثلاثة كتب', 'correct' => ['اثنان', 'قطط', 'و', 'ثلاثة', 'كتب'], 'extra' => []],
                            'ru' => ['sentence' => 'два коты и три книги', 'correct' => ['два', 'коты', 'и', 'три', 'книги'], 'extra' => []],
                            'fr' => ['sentence' => 'Deux chats et trois livres', 'correct' => ['deux', 'chats', 'et', 'trois', 'livres'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Dos gatos y tres libros', 'correct' => ['dos', 'gatos', 'y', 'tres', 'libros'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Zwei Katzen und drei Bücher', 'correct' => ['zwei', 'Katzen', 'und', 'drei', 'Bücher'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '猫二匹と本三冊', 'correct' => ['猫', '二匹', 'と', '本', '三冊'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 두 마리와 책 세 권', 'correct' => ['고양이', '두', '마리와', '책', '세', '권'], 'extra' => ['책들']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
