<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitConversation03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kitab' => 'book', 'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water',
        'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese', 'Tort' => 'cake',
    ];

    /**
     * Azerbaijani Conversation Unit 3.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Numbers & Age', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: One & Two', 1,
                pictures: [['az' => 'Kitab', 'img' => 'book'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Bir'], ['az' => 'İki']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kitab'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'One book', 'correct' => ['one', 'book'], 'extra' => ['two', 'pen']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['deux', 'stylo']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['dos', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['zwei', 'Stift']],
                            'ja' => ['sentence' => '本一冊', 'correct' => ['本', '一冊'], 'extra' => ['二', 'ペン']],
                            'ko' => ['sentence' => '책 한 권', 'correct' => ['책', '한', '권'], 'extra' => ['둘', '펜']],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['i̇ki', 'kalem']],
                            'ru' => ['sentence' => 'один книга', 'correct' => ['один', 'книга'], 'extra' => ['два', 'ручка']],
                            'ar' => ['sentence' => 'واحد كتاب', 'correct' => ['واحد', 'كتاب'], 'extra' => ['اثنان', 'قلم']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'qələmlər'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Two pens', 'correct' => ['two', 'pens'], 'extra' => ['one', 'book']],
                            'fr' => ['sentence' => 'Deux stylos', 'correct' => ['deux', 'stylos'], 'extra' => ['un', 'livre']],
                            'es' => ['sentence' => 'Dos bolígrafos', 'correct' => ['dos', 'bolígrafos'], 'extra' => ['un', 'libro']],
                            'de' => ['sentence' => 'Zwei Stifte', 'correct' => ['zwei', 'Stifte'], 'extra' => ['ein', 'Buch']],
                            'ja' => ['sentence' => 'ペン二本', 'correct' => ['ペン', '二本'], 'extra' => ['一つの', '本']],
                            'ko' => ['sentence' => '펜 두 자루', 'correct' => ['펜', '두', '자루'], 'extra' => ['하나의', '책']],
                            'tr' => ['sentence' => 'iki kalem', 'correct' => ['iki', 'kalem'], 'extra' => ['bir', 'i̇ki']],
                            'ru' => ['sentence' => 'два ручки', 'correct' => ['два', 'ручки'], 'extra' => ['один', 'книга']],
                            'ar' => ['sentence' => 'اثنان أقلام', 'correct' => ['اثنان', 'أقلام'], 'extra' => ['واحد', 'كتاب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kitab', 'və', 'iki', 'qələmlər'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'One book and two pens', 'correct' => ['one', 'book', 'and', 'two', 'pens'], 'extra' => ['three']],
                            'fr' => ['sentence' => 'Un livre et deux stylos', 'correct' => ['un', 'livre', 'et', 'deux', 'stylos'], 'extra' => ['trois']],
                            'es' => ['sentence' => 'Un libro y dos bolígrafos', 'correct' => ['un', 'libro', 'y', 'dos', 'bolígrafos'], 'extra' => ['tres']],
                            'de' => ['sentence' => 'Ein Buch und zwei Stifte', 'correct' => ['ein', 'Buch', 'und', 'zwei', 'Stifte'], 'extra' => ['drei']],
                            'ja' => ['sentence' => '本一冊とペン二本', 'correct' => ['本', '一冊', 'と', 'ペン', '二本'], 'extra' => ['三']],
                            'ko' => ['sentence' => '책 한 권과 펜 두 자루', 'correct' => ['책', '한', '권과', '펜', '두', '자루'], 'extra' => ['셋']],
                            'tr' => ['sentence' => 'bir kitap ve iki kalem', 'correct' => ['bir', 'kitap', 've', 'iki', 'kalem'], 'extra' => ['i̇ki']],
                            'ru' => ['sentence' => 'один книга и два ручки', 'correct' => ['один', 'книга', 'и', 'два', 'ручки'], 'extra' => ['три']],
                            'ar' => ['sentence' => 'واحد كتاب و اثنان أقلام', 'correct' => ['واحد', 'كتاب', 'و', 'اثنان', 'أقلام'], 'extra' => ['ثلاثة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Three & Four', 2,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Üç'], ['az' => 'Pişiklər']],
                phrases: [
                    'a' => [
                        'words' => ['üç', 'pişiklər'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Three cats', 'correct' => ['three', 'cats'], 'extra' => ['four', 'dog']],
                            'fr' => ['sentence' => 'Trois chats', 'correct' => ['trois', 'chats'], 'extra' => ['quatre', 'chien']],
                            'es' => ['sentence' => 'Tres gatos', 'correct' => ['tres', 'gatos'], 'extra' => ['cuatro', 'perro']],
                            'de' => ['sentence' => 'Drei Katzen', 'correct' => ['drei', 'Katzen'], 'extra' => ['vier', 'Hund']],
                            'ja' => ['sentence' => '猫三匹', 'correct' => ['猫', '三', '匹'], 'extra' => ['四', '犬']],
                            'ko' => ['sentence' => '고양이 세 마리', 'correct' => ['고양이', '세', '마리'], 'extra' => ['넷', '개']],
                            'tr' => ['sentence' => 'üç kedi', 'correct' => ['üç', 'kedi'], 'extra' => ['dört', 'köpek']],
                            'ru' => ['sentence' => 'три коты', 'correct' => ['три', 'коты'], 'extra' => ['четыре', 'собака']],
                            'ar' => ['sentence' => 'ثلاثة قطط', 'correct' => ['ثلاثة', 'قطط'], 'extra' => ['أربعة', 'كلب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['dörd', 'itlər'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Four dogs', 'correct' => ['four', 'dogs'], 'extra' => ['three', 'cat']],
                            'fr' => ['sentence' => 'Quatre chiens', 'correct' => ['quatre', 'chiens'], 'extra' => ['trois', 'chat']],
                            'es' => ['sentence' => 'Cuatro perros', 'correct' => ['cuatro', 'perros'], 'extra' => ['tres', 'gato']],
                            'de' => ['sentence' => 'Vier Hunde', 'correct' => ['vier', 'Hunde'], 'extra' => ['drei', 'Katze']],
                            'ja' => ['sentence' => '犬四匹', 'correct' => ['犬', '四', '匹'], 'extra' => ['三', '猫']],
                            'ko' => ['sentence' => '개 네 마리', 'correct' => ['개', '네', '마리'], 'extra' => ['셋', '고양이']],
                            'tr' => ['sentence' => 'dört köpek', 'correct' => ['dört', 'köpek'], 'extra' => ['üç', 'kedi']],
                            'ru' => ['sentence' => 'четыре собаки', 'correct' => ['четыре', 'собаки'], 'extra' => ['три', 'кот']],
                            'ar' => ['sentence' => 'أربعة كلاب', 'correct' => ['أربعة', 'كلاب'], 'extra' => ['ثلاثة', 'قط']],
                        ],
                    ],
                    'c' => [
                        'words' => ['üç', 'pişiklər', 'və', 'dörd', 'itlər'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Three cats and four dogs', 'correct' => ['three', 'cats', 'and', 'four', 'dogs'], 'extra' => ['five']],
                            'fr' => ['sentence' => 'Trois chats et quatre chiens', 'correct' => ['trois', 'chats', 'et', 'quatre', 'chiens'], 'extra' => ['cinq']],
                            'es' => ['sentence' => 'Tres gatos y cuatro perros', 'correct' => ['tres', 'gatos', 'y', 'cuatro', 'perros'], 'extra' => ['cinco']],
                            'de' => ['sentence' => 'Drei Katzen und vier Hunde', 'correct' => ['drei', 'Katzen', 'und', 'vier', 'Hunde'], 'extra' => ['fünf']],
                            'ja' => ['sentence' => '猫三匹と犬四匹', 'correct' => ['猫', '三', '匹', 'と', '犬', '四', '匹'], 'extra' => ['五']],
                            'ko' => ['sentence' => '고양이 세 마리와 개 네 마리', 'correct' => ['고양이', '세', '마리와', '개', '네', '마리'], 'extra' => ['다섯']],
                            'tr' => ['sentence' => 'üç kedi ve dört köpek', 'correct' => ['üç', 'kedi', 've', 'dört', 'köpek'], 'extra' => []],
                            'ru' => ['sentence' => 'три коты и четыре собаки', 'correct' => ['три', 'коты', 'и', 'четыре', 'собаки'], 'extra' => ['пять']],
                            'ar' => ['sentence' => 'ثلاثة قطط و أربعة كلاب', 'correct' => ['ثلاثة', 'قطط', 'و', 'أربعة', 'كلاب'], 'extra' => ['خمسة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Five & Ten', 3,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Beş'], ['az' => 'Almalar']],
                phrases: [
                    'a' => [
                        'words' => ['beş', 'almalar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Five apples', 'correct' => ['five', 'apples'], 'extra' => ['ten', 'book']],
                            'fr' => ['sentence' => 'Cinq pommes', 'correct' => ['cinq', 'pommes'], 'extra' => ['dix', 'livre']],
                            'es' => ['sentence' => 'Cinco manzanas', 'correct' => ['cinco', 'manzanas'], 'extra' => ['diez', 'libro']],
                            'de' => ['sentence' => 'Fünf Äpfel', 'correct' => ['fünf', 'Äpfel'], 'extra' => ['zehn', 'Bücher']],
                            'ja' => ['sentence' => 'りんご五個', 'correct' => ['りんご', '五', '個'], 'extra' => ['十', '本']],
                            'ko' => ['sentence' => '사과 다섯 개', 'correct' => ['사과', '다섯', '개'], 'extra' => ['열', '책']],
                            'tr' => ['sentence' => 'beş elma', 'correct' => ['beş', 'elma'], 'extra' => ['on', 'kitap']],
                            'ru' => ['sentence' => 'пять яблоки', 'correct' => ['пять', 'яблоки'], 'extra' => ['десять', 'книга']],
                            'ar' => ['sentence' => 'خمسة تفاح', 'correct' => ['خمسة', 'تفاح'], 'extra' => ['عشرة', 'كتاب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['on', 'kitablar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Ten books', 'correct' => ['ten', 'books'], 'extra' => ['five', 'apple']],
                            'fr' => ['sentence' => 'Dix livres', 'correct' => ['dix', 'livres'], 'extra' => ['cinq', 'pomme']],
                            'es' => ['sentence' => 'Diez libros', 'correct' => ['diez', 'libros'], 'extra' => ['cinco', 'manzana']],
                            'de' => ['sentence' => 'Zehn Bücher', 'correct' => ['zehn', 'Bücher'], 'extra' => ['fünf', 'Apfel']],
                            'ja' => ['sentence' => '本十冊', 'correct' => ['本', '十', '冊'], 'extra' => ['五', 'りんご']],
                            'ko' => ['sentence' => '책 열 권', 'correct' => ['책', '열', '권'], 'extra' => ['다섯', '사과']],
                            'tr' => ['sentence' => 'on kitap', 'correct' => ['on', 'kitap'], 'extra' => ['beş', 'elma']],
                            'ru' => ['sentence' => 'десять книги', 'correct' => ['десять', 'книги'], 'extra' => ['пять', 'яблоко']],
                            'ar' => ['sentence' => 'عشرة كتب', 'correct' => ['عشرة', 'كتب'], 'extra' => ['خمسة', 'تفاحة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['beş', 'almalar', 'və', 'on', 'kitablar'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'Five apples and ten books', 'correct' => ['five', 'apples', 'and', 'ten', 'books'], 'extra' => ['two']],
                            'fr' => ['sentence' => 'Cinq pommes et dix livres', 'correct' => ['cinq', 'pommes', 'et', 'dix', 'livres'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Cinco manzanas y diez libros', 'correct' => ['cinco', 'manzanas', 'y', 'diez', 'libros'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Fünf Äpfel und zehn Bücher', 'correct' => ['fünf', 'Äpfel', 'und', 'zehn', 'Bücher'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => 'りんご五個と本十冊', 'correct' => ['りんご', '五', '個', 'と', '本', '十', '冊'], 'extra' => ['二']],
                            'ko' => ['sentence' => '사과 다섯 개와 책 열 권', 'correct' => ['사과', '다섯', '개와', '책', '열', '권'], 'extra' => ['둘']],
                            'tr' => ['sentence' => 'beş elma ve on kitap', 'correct' => ['beş', 'elma', 've', 'on', 'kitap'], 'extra' => []],
                            'ru' => ['sentence' => 'пять яблоки и десять книги', 'correct' => ['пять', 'яблоки', 'и', 'десять', 'книги'], 'extra' => ['два']],
                            'ar' => ['sentence' => 'خمسة تفاح و عشرة كتب', 'correct' => ['خمسة', 'تفاح', 'و', 'عشرة', 'كتب'], 'extra' => ['اثنان']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: My Age', 4,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Mənim'], ['az' => 'Yaş']],
                phrases: [
                    'a' => [
                        'words' => ['mənim', 'yaş'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My age', 'correct' => ['my', 'age'], 'extra' => ['ten']],
                            'fr' => ['sentence' => 'Mon âge', 'correct' => ['mon', 'âge'], 'extra' => ['dix']],
                            'es' => ['sentence' => 'Mi edad', 'correct' => ['mi', 'edad'], 'extra' => ['diez']],
                            'de' => ['sentence' => 'Mein Alter', 'correct' => ['mein', 'Alter'], 'extra' => ['zehn']],
                            'ja' => ['sentence' => '私の年齢', 'correct' => ['私の', '年齢'], 'extra' => ['十']],
                            'ko' => ['sentence' => '내 나이', 'correct' => ['내', '나이'], 'extra' => ['열']],
                            'tr' => ['sentence' => 'benim yaşım', 'correct' => ['benim', 'yaşım'], 'extra' => ['yaş', 'yaşındayım']],
                            'ru' => ['sentence' => 'мой возраст', 'correct' => ['мой', 'возраст'], 'extra' => ['десять']],
                            'ar' => ['sentence' => 'عمر', 'correct' => ['عمر'], 'extra' => ['عشرة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mən', 'on yaşındayam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['I', 'am ten years old'], 'extra' => ['age']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['tengo', 'diez años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['ich', 'bin zehn Jahre alt'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '私は十歳です', 'correct' => ['私', 'は', '十歳', 'です'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '나는 열 살입니다', 'correct' => ['나는', '열', '살입니다'], 'extra' => ['나이']],
                            'tr' => ['sentence' => 'on yaşındayım', 'correct' => ['on', 'yaşındayım'], 'extra' => ['yaş', 'arkadaş']],
                            'ru' => ['sentence' => 'я мне десять лет', 'correct' => ['я', 'мне', 'десять лет'], 'extra' => ['возраст']],
                            'ar' => ['sentence' => 'أنا عمري عشر سنوات', 'correct' => ['أنا', 'عمري', 'عشر سنوات'], 'extra' => ['عمر']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mən', 'on yaşında', 'köhnə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['I am', 'ten years', 'old'], 'extra' => ['age']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['je', 'dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['tengo', 'diez', 'años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['ich bin', 'zehn Jahre', 'alt'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '私は十歳です', 'correct' => ['私', 'は', '十歳', 'です'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '나는 열 살입니다', 'correct' => ['나는', '열', '살입니다'], 'extra' => ['나이']],
                            'tr' => ['sentence' => 'ben on yaşındayım', 'correct' => ['ben', 'on', 'yaşındayım'], 'extra' => ['yaş', 'arkadaş']],
                            'ru' => ['sentence' => 'я десять лет старый', 'correct' => ['я', 'десять лет', 'старый'], 'extra' => ['возраст']],
                            'ar' => ['sentence' => 'أنا عشر سنوات قديم', 'correct' => ['أنا', 'عشر سنوات', 'قديم'], 'extra' => ['عمر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Counting Things', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Neçə'], ['az' => 'Kitablar']],
                phrases: [
                    'a' => [
                        'words' => ['neçə', 'kitablar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many books', 'correct' => ['how many', 'books'], 'extra' => ['books']],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien de', 'livres'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libros'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Bücher'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '本はいくつですか', 'correct' => ['本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['本']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['책들']],
                            'tr' => ['sentence' => 'kaç kitap', 'correct' => ['kaç', 'kitap'], 'extra' => ['kitaplar', 'kedi']],
                            'ru' => ['sentence' => 'сколько книги', 'correct' => ['сколько', 'книги'], 'extra' => []],
                            'ar' => ['sentence' => 'كم كتب', 'correct' => ['كم', 'كتب'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['mənim', 'kitablar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My books', 'correct' => ['my', 'books'], 'extra' => ['book']],
                            'fr' => ['sentence' => 'Mes livres', 'correct' => ['mes', 'livres'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Mis libros', 'correct' => ['mis', 'libros'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Meine Bücher', 'correct' => ['meine', 'Bücher'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '私の本', 'correct' => ['私の', '本'], 'extra' => ['本']],
                            'ko' => ['sentence' => '내 책들', 'correct' => ['내', '책들'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'benim kitaplar', 'correct' => ['benim', 'kitaplar'], 'extra' => ['kaç', 'kitap']],
                            'ru' => ['sentence' => 'мой книги', 'correct' => ['мой', 'книги'], 'extra' => ['книга']],
                            'ar' => ['sentence' => 'كتب', 'correct' => ['كتب'], 'extra' => ['كتاب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['iki', 'pişiklər', 'və', 'üç', 'kitablar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Two cats and three books', 'correct' => ['two', 'cats', 'and', 'three', 'books'], 'extra' => ['books']],
                            'fr' => ['sentence' => 'Deux chats et trois livres', 'correct' => ['deux', 'chats', 'et', 'trois', 'livres'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Dos gatos y tres libros', 'correct' => ['dos', 'gatos', 'y', 'tres', 'libros'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Zwei Katzen und drei Bücher', 'correct' => ['zwei', 'Katzen', 'und', 'drei', 'Bücher'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '猫二匹と本三冊', 'correct' => ['猫', '二匹', 'と', '本', '三冊'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 두 마리와 책 세 권', 'correct' => ['고양이', '두', '마리와', '책', '세', '권'], 'extra' => ['책들']],
                            'tr' => ['sentence' => 'iki kedi ve üç kitap', 'correct' => ['iki', 'kedi', 've', 'üç', 'kitap'], 'extra' => ['kaç', 'kitaplar']],
                            'ru' => ['sentence' => 'два коты и три книги', 'correct' => ['два', 'коты', 'и', 'три', 'книги'], 'extra' => []],
                            'ar' => ['sentence' => 'اثنان قطط و ثلاثة كتب', 'correct' => ['اثنان', 'قطط', 'و', 'ثلاثة', 'كتب'], 'extra' => []],
                        ],
                    ],
                ],
            ),

        ];
    }
}
