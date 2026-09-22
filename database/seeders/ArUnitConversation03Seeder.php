<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitConversation03Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'كتاب' => 'book', 'قهوة' => 'coffee', 'شاي' => 'tea', 'ماء' => 'water',
        'حليب' => 'milk', 'خبز' => 'bread', 'جبن' => 'cheese', 'كعكة' => 'cake',
    ];

    /**
     * Arabic Conversation Unit 3.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 3, 'Unit 3: Numbers & Age', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: One & Two', 1,
                pictures: [['ar' => 'كتاب', 'img' => 'book'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'واحد'], ['ar' => 'اثنان']],
                phrases: [
                    'a' => [
                        'words' => ['واحد', 'كتاب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'One book', 'correct' => ['one', 'book'], 'extra' => ['two', 'pen']],
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['iki', 'qələm']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['deux', 'stylo']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['dos', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['zwei', 'Stift']],
                            'ja' => ['sentence' => '本一冊', 'correct' => ['本', '一冊'], 'extra' => ['二', 'ペン']],
                            'ko' => ['sentence' => '책 한 권', 'correct' => ['책', '한', '권'], 'extra' => ['둘', '펜']],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['i̇ki', 'kalem']],
                            'ru' => ['sentence' => 'один книга', 'correct' => ['один', 'книга'], 'extra' => ['два', 'ручка']],
                        ],
                    ],
                    'b' => [
                        'words' => ['اثنان', 'أقلام'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Two pens', 'correct' => ['two', 'pens'], 'extra' => ['one', 'book']],
                            'az' => ['sentence' => 'iki qələmlər', 'correct' => ['iki', 'qələmlər'], 'extra' => ['bir', 'kitab']],
                            'fr' => ['sentence' => 'Deux stylos', 'correct' => ['deux', 'stylos'], 'extra' => ['un', 'livre']],
                            'es' => ['sentence' => 'Dos bolígrafos', 'correct' => ['dos', 'bolígrafos'], 'extra' => ['un', 'libro']],
                            'de' => ['sentence' => 'Zwei Stifte', 'correct' => ['zwei', 'Stifte'], 'extra' => ['ein', 'Buch']],
                            'ja' => ['sentence' => 'ペン二本', 'correct' => ['ペン', '二本'], 'extra' => ['一つの', '本']],
                            'ko' => ['sentence' => '펜 두 자루', 'correct' => ['펜', '두', '자루'], 'extra' => ['하나의', '책']],
                            'tr' => ['sentence' => 'iki kalem', 'correct' => ['iki', 'kalem'], 'extra' => ['bir', 'i̇ki']],
                            'ru' => ['sentence' => 'два ручки', 'correct' => ['два', 'ручки'], 'extra' => ['один', 'книга']],
                        ],
                    ],
                    'c' => [
                        'words' => ['واحد', 'كتاب', 'و', 'اثنان', 'أقلام'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'One book and two pens', 'correct' => ['one', 'book', 'and', 'two', 'pens'], 'extra' => ['three']],
                            'az' => ['sentence' => 'bir kitab və iki qələmlər', 'correct' => ['bir', 'kitab', 'və', 'iki', 'qələmlər'], 'extra' => ['üç']],
                            'fr' => ['sentence' => 'Un livre et deux stylos', 'correct' => ['un', 'livre', 'et', 'deux', 'stylos'], 'extra' => ['trois']],
                            'es' => ['sentence' => 'Un libro y dos bolígrafos', 'correct' => ['un', 'libro', 'y', 'dos', 'bolígrafos'], 'extra' => ['tres']],
                            'de' => ['sentence' => 'Ein Buch und zwei Stifte', 'correct' => ['ein', 'Buch', 'und', 'zwei', 'Stifte'], 'extra' => ['drei']],
                            'ja' => ['sentence' => '本一冊とペン二本', 'correct' => ['本', '一冊', 'と', 'ペン', '二本'], 'extra' => ['三']],
                            'ko' => ['sentence' => '책 한 권과 펜 두 자루', 'correct' => ['책', '한', '권과', '펜', '두', '자루'], 'extra' => ['셋']],
                            'tr' => ['sentence' => 'bir kitap ve iki kalem', 'correct' => ['bir', 'kitap', 've', 'iki', 'kalem'], 'extra' => ['i̇ki']],
                            'ru' => ['sentence' => 'один книга и два ручки', 'correct' => ['один', 'книга', 'и', 'два', 'ручки'], 'extra' => ['три']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Three & Four', 2,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'ثلاثة'], ['ar' => 'قطط']],
                phrases: [
                    'a' => [
                        'words' => ['ثلاثة', 'قطط'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Three cats', 'correct' => ['three', 'cats'], 'extra' => ['four', 'dog']],
                            'az' => ['sentence' => 'üç pişiklər', 'correct' => ['üç', 'pişiklər'], 'extra' => ['dörd', 'it']],
                            'fr' => ['sentence' => 'Trois chats', 'correct' => ['trois', 'chats'], 'extra' => ['quatre', 'chien']],
                            'es' => ['sentence' => 'Tres gatos', 'correct' => ['tres', 'gatos'], 'extra' => ['cuatro', 'perro']],
                            'de' => ['sentence' => 'Drei Katzen', 'correct' => ['drei', 'Katzen'], 'extra' => ['vier', 'Hund']],
                            'ja' => ['sentence' => '猫三匹', 'correct' => ['猫', '三', '匹'], 'extra' => ['四', '犬']],
                            'ko' => ['sentence' => '고양이 세 마리', 'correct' => ['고양이', '세', '마리'], 'extra' => ['넷', '개']],
                            'tr' => ['sentence' => 'üç kedi', 'correct' => ['üç', 'kedi'], 'extra' => ['dört', 'köpek']],
                            'ru' => ['sentence' => 'три коты', 'correct' => ['три', 'коты'], 'extra' => ['четыре', 'собака']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أربعة', 'كلاب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Four dogs', 'correct' => ['four', 'dogs'], 'extra' => ['three', 'cat']],
                            'az' => ['sentence' => 'dörd itlər', 'correct' => ['dörd', 'itlər'], 'extra' => ['üç', 'pişik']],
                            'fr' => ['sentence' => 'Quatre chiens', 'correct' => ['quatre', 'chiens'], 'extra' => ['trois', 'chat']],
                            'es' => ['sentence' => 'Cuatro perros', 'correct' => ['cuatro', 'perros'], 'extra' => ['tres', 'gato']],
                            'de' => ['sentence' => 'Vier Hunde', 'correct' => ['vier', 'Hunde'], 'extra' => ['drei', 'Katze']],
                            'ja' => ['sentence' => '犬四匹', 'correct' => ['犬', '四', '匹'], 'extra' => ['三', '猫']],
                            'ko' => ['sentence' => '개 네 마리', 'correct' => ['개', '네', '마리'], 'extra' => ['셋', '고양이']],
                            'tr' => ['sentence' => 'dört köpek', 'correct' => ['dört', 'köpek'], 'extra' => ['üç', 'kedi']],
                            'ru' => ['sentence' => 'четыре собаки', 'correct' => ['четыре', 'собаки'], 'extra' => ['три', 'кот']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ثلاثة', 'قطط', 'و', 'أربعة', 'كلاب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Three cats and four dogs', 'correct' => ['three', 'cats', 'and', 'four', 'dogs'], 'extra' => ['five']],
                            'az' => ['sentence' => 'üç pişiklər və dörd itlər', 'correct' => ['üç', 'pişiklər', 'və', 'dörd', 'itlər'], 'extra' => ['beş']],
                            'fr' => ['sentence' => 'Trois chats et quatre chiens', 'correct' => ['trois', 'chats', 'et', 'quatre', 'chiens'], 'extra' => ['cinq']],
                            'es' => ['sentence' => 'Tres gatos y cuatro perros', 'correct' => ['tres', 'gatos', 'y', 'cuatro', 'perros'], 'extra' => ['cinco']],
                            'de' => ['sentence' => 'Drei Katzen und vier Hunde', 'correct' => ['drei', 'Katzen', 'und', 'vier', 'Hunde'], 'extra' => ['fünf']],
                            'ja' => ['sentence' => '猫三匹と犬四匹', 'correct' => ['猫', '三', '匹', 'と', '犬', '四', '匹'], 'extra' => ['五']],
                            'ko' => ['sentence' => '고양이 세 마리와 개 네 마리', 'correct' => ['고양이', '세', '마리와', '개', '네', '마리'], 'extra' => ['다섯']],
                            'tr' => ['sentence' => 'üç kedi ve dört köpek', 'correct' => ['üç', 'kedi', 've', 'dört', 'köpek'], 'extra' => []],
                            'ru' => ['sentence' => 'три коты и четыре собаки', 'correct' => ['три', 'коты', 'и', 'четыре', 'собаки'], 'extra' => ['пять']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Five & Ten', 3,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'خمسة'], ['ar' => 'تفاح']],
                phrases: [
                    'a' => [
                        'words' => ['خمسة', 'تفاح'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Five apples', 'correct' => ['five', 'apples'], 'extra' => ['ten', 'book']],
                            'az' => ['sentence' => 'beş almalar', 'correct' => ['beş', 'almalar'], 'extra' => ['on', 'kitab']],
                            'fr' => ['sentence' => 'Cinq pommes', 'correct' => ['cinq', 'pommes'], 'extra' => ['dix', 'livre']],
                            'es' => ['sentence' => 'Cinco manzanas', 'correct' => ['cinco', 'manzanas'], 'extra' => ['diez', 'libro']],
                            'de' => ['sentence' => 'Fünf Äpfel', 'correct' => ['fünf', 'Äpfel'], 'extra' => ['zehn', 'Bücher']],
                            'ja' => ['sentence' => 'りんご五個', 'correct' => ['りんご', '五', '個'], 'extra' => ['十', '本']],
                            'ko' => ['sentence' => '사과 다섯 개', 'correct' => ['사과', '다섯', '개'], 'extra' => ['열', '책']],
                            'tr' => ['sentence' => 'beş elma', 'correct' => ['beş', 'elma'], 'extra' => ['on', 'kitap']],
                            'ru' => ['sentence' => 'пять яблоки', 'correct' => ['пять', 'яблоки'], 'extra' => ['десять', 'книга']],
                        ],
                    ],
                    'b' => [
                        'words' => ['عشرة', 'كتب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Ten books', 'correct' => ['ten', 'books'], 'extra' => ['five', 'apple']],
                            'az' => ['sentence' => 'on kitablar', 'correct' => ['on', 'kitablar'], 'extra' => ['beş', 'alma']],
                            'fr' => ['sentence' => 'Dix livres', 'correct' => ['dix', 'livres'], 'extra' => ['cinq', 'pomme']],
                            'es' => ['sentence' => 'Diez libros', 'correct' => ['diez', 'libros'], 'extra' => ['cinco', 'manzana']],
                            'de' => ['sentence' => 'Zehn Bücher', 'correct' => ['zehn', 'Bücher'], 'extra' => ['fünf', 'Apfel']],
                            'ja' => ['sentence' => '本十冊', 'correct' => ['本', '十', '冊'], 'extra' => ['五', 'りんご']],
                            'ko' => ['sentence' => '책 열 권', 'correct' => ['책', '열', '권'], 'extra' => ['다섯', '사과']],
                            'tr' => ['sentence' => 'on kitap', 'correct' => ['on', 'kitap'], 'extra' => ['beş', 'elma']],
                            'ru' => ['sentence' => 'десять книги', 'correct' => ['десять', 'книги'], 'extra' => ['пять', 'яблоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['خمسة', 'تفاح', 'و', 'عشرة', 'كتب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Five apples and ten books', 'correct' => ['five', 'apples', 'and', 'ten', 'books'], 'extra' => ['two']],
                            'az' => ['sentence' => 'beş almalar və on kitablar', 'correct' => ['beş', 'almalar', 'və', 'on', 'kitablar'], 'extra' => ['iki']],
                            'fr' => ['sentence' => 'Cinq pommes et dix livres', 'correct' => ['cinq', 'pommes', 'et', 'dix', 'livres'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Cinco manzanas y diez libros', 'correct' => ['cinco', 'manzanas', 'y', 'diez', 'libros'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Fünf Äpfel und zehn Bücher', 'correct' => ['fünf', 'Äpfel', 'und', 'zehn', 'Bücher'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => 'りんご五個と本十冊', 'correct' => ['りんご', '五', '個', 'と', '本', '十', '冊'], 'extra' => ['二']],
                            'ko' => ['sentence' => '사과 다섯 개와 책 열 권', 'correct' => ['사과', '다섯', '개와', '책', '열', '권'], 'extra' => ['둘']],
                            'tr' => ['sentence' => 'beş elma ve on kitap', 'correct' => ['beş', 'elma', 've', 'on', 'kitap'], 'extra' => []],
                            'ru' => ['sentence' => 'пять яблоки и десять книги', 'correct' => ['пять', 'яблоки', 'и', 'десять', 'книги'], 'extra' => ['два']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: My Age', 4,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'هذا'], ['ar' => 'عمر']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'عمر'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is My age', 'correct' => ['this is', 'my', 'age'], 'extra' => ['ten']],
                            'az' => ['sentence' => 'bu mənim yaş', 'correct' => ['bu', 'mənim', 'yaş'], 'extra' => ['on']],
                            'fr' => ['sentence' => "C'est Mon âge", 'correct' => ["c'est", 'mon', 'âge'], 'extra' => ['dix']],
                            'es' => ['sentence' => 'Esto es Mi edad', 'correct' => ['esto es', 'mi', 'edad'], 'extra' => ['diez']],
                            'de' => ['sentence' => 'Das ist Mein Alter', 'correct' => ['das ist', 'mein', 'Alter'], 'extra' => ['zehn']],
                            'ja' => ['sentence' => 'これは私の年齢です', 'correct' => ['これは', '私の', '年齢'], 'extra' => ['十']],
                            'ko' => ['sentence' => '이것은 내 나이입니다', 'correct' => ['이것은', '내', '나이'], 'extra' => ['열']],
                            'tr' => ['sentence' => 'benim yaşım', 'correct' => ['benim', 'yaşım'], 'extra' => ['yaş', 'yaşındayım']],
                            'ru' => ['sentence' => 'Это мой возраст', 'correct' => ['это', 'мой', 'возраст'], 'extra' => ['десять']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أنا', 'عمري', 'عشر سنوات'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['I', 'am ten years old'], 'extra' => ['age']],
                            'az' => ['sentence' => 'mən on yaşındayam', 'correct' => ['mən', 'on yaşındayam'], 'extra' => ['yaş']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['tengo', 'diez años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['ich', 'bin zehn Jahre alt'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '私は十歳です', 'correct' => ['私', 'は', '十歳', 'です'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '나는 열 살입니다', 'correct' => ['나는', '열', '살입니다'], 'extra' => ['나이']],
                            'tr' => ['sentence' => 'on yaşındayım', 'correct' => ['on', 'yaşındayım'], 'extra' => ['yaş', 'arkadaş']],
                            'ru' => ['sentence' => 'я мне десять лет', 'correct' => ['я', 'мне', 'десять лет'], 'extra' => ['возраст']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أنا', 'عشر سنوات', 'قديم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am ten years old', 'correct' => ['I am', 'ten years', 'old'], 'extra' => ['age']],
                            'az' => ['sentence' => 'mən on yaşında köhnə', 'correct' => ['mən', 'on yaşında', 'köhnə'], 'extra' => ['yaş']],
                            'fr' => ['sentence' => "J'ai dix ans", 'correct' => ['je', 'dix', "j'ai ans"], 'extra' => ['âge']],
                            'es' => ['sentence' => 'Tengo diez años', 'correct' => ['tengo', 'diez', 'años'], 'extra' => ['edad']],
                            'de' => ['sentence' => 'Ich bin zehn Jahre alt', 'correct' => ['ich bin', 'zehn Jahre', 'alt'], 'extra' => ['Alter']],
                            'ja' => ['sentence' => '私は十歳です', 'correct' => ['私', 'は', '十歳', 'です'], 'extra' => ['年齢']],
                            'ko' => ['sentence' => '나는 열 살입니다', 'correct' => ['나는', '열', '살입니다'], 'extra' => ['나이']],
                            'tr' => ['sentence' => 'ben on yaşındayım', 'correct' => ['ben', 'on', 'yaşındayım'], 'extra' => ['yaş', 'arkadaş']],
                            'ru' => ['sentence' => 'я десять лет старый', 'correct' => ['я', 'десять лет', 'старый'], 'extra' => ['возраст']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Counting Things', 5,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'كم'], ['ar' => 'كتب']],
                phrases: [
                    'a' => [
                        'words' => ['كم', 'كتب'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many books', 'correct' => ['how many', 'books'], 'extra' => ['books']],
                            'az' => ['sentence' => 'neçə kitablar', 'correct' => ['neçə', 'kitablar'], 'extra' => []],
                            'fr' => ['sentence' => 'Combien de livres', 'correct' => ['combien de', 'livres'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Cuántos libros', 'correct' => ['cuántos', 'libros'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Wie viele Bücher', 'correct' => ['wie viele', 'Bücher'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '本はいくつですか', 'correct' => ['本', 'は', 'いくつ', 'です', 'か'], 'extra' => ['本']],
                            'ko' => ['sentence' => '책 몇 권', 'correct' => ['책', '몇', '권'], 'extra' => ['책들']],
                            'tr' => ['sentence' => 'kaç kitap', 'correct' => ['kaç', 'kitap'], 'extra' => ['kitaplar', 'kedi']],
                            'ru' => ['sentence' => 'сколько книги', 'correct' => ['сколько', 'книги'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['هذا', 'كتب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is My books', 'correct' => ['this is', 'my', 'books'], 'extra' => ['book']],
                            'az' => ['sentence' => 'bu mənim kitablar', 'correct' => ['bu', 'mənim', 'kitablar'], 'extra' => ['kitab']],
                            'fr' => ['sentence' => "C'est Mes livres", 'correct' => ["c'est", 'mes', 'livres'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Esto es Mis libros', 'correct' => ['esto es', 'mis', 'libros'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Das ist Meine Bücher', 'correct' => ['das ist', 'meine', 'Bücher'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'これは私の本です', 'correct' => ['これは', '私の', '本'], 'extra' => ['本']],
                            'ko' => ['sentence' => '이것은 내 책들입니다', 'correct' => ['이것은', '내', '책들'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'benim kitaplar', 'correct' => ['benim', 'kitaplar'], 'extra' => ['kaç', 'kitap']],
                            'ru' => ['sentence' => 'Это мой книги', 'correct' => ['это', 'мой', 'книги'], 'extra' => ['книга']],
                        ],
                    ],
                    'c' => [
                        'words' => ['اثنان', 'قطط', 'و', 'ثلاثة', 'كتب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Two cats and three books', 'correct' => ['two', 'cats', 'and', 'three', 'books'], 'extra' => ['books']],
                            'az' => ['sentence' => 'iki pişiklər və üç kitablar', 'correct' => ['iki', 'pişiklər', 'və', 'üç', 'kitablar'], 'extra' => []],
                            'fr' => ['sentence' => 'Deux chats et trois livres', 'correct' => ['deux', 'chats', 'et', 'trois', 'livres'], 'extra' => ['livres']],
                            'es' => ['sentence' => 'Dos gatos y tres libros', 'correct' => ['dos', 'gatos', 'y', 'tres', 'libros'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Zwei Katzen und drei Bücher', 'correct' => ['zwei', 'Katzen', 'und', 'drei', 'Bücher'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '猫二匹と本三冊', 'correct' => ['猫', '二匹', 'と', '本', '三冊'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 두 마리와 책 세 권', 'correct' => ['고양이', '두', '마리와', '책', '세', '권'], 'extra' => ['책들']],
                            'tr' => ['sentence' => 'iki kedi ve üç kitap', 'correct' => ['iki', 'kedi', 've', 'üç', 'kitap'], 'extra' => ['kaç', 'kitaplar']],
                            'ru' => ['sentence' => 'два коты и три книги', 'correct' => ['два', 'коты', 'и', 'три', 'книги'], 'extra' => []],
                        ],
                    ],
                ],
            ),

        ];
    }
}
