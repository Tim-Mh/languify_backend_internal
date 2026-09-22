<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitBeginner02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Книга' => 'book', 'Ручка' => 'pen', 'Дом' => 'house', 'Школа' => 'school',
        'Кот' => 'cat', 'Собака' => 'dog', 'Стол' => 'table', 'Стул' => 'chair',
    ];

    /**
     * Russian Beginner Unit 2.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Russian sentences are built from the shared plan tile by tile, and
     * every tile is a RussianVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ru')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: People & Home', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Book & Pen', 1,
                pictures: [['ru' => 'Книга', 'img' => 'book'], ['ru' => 'Ручка', 'img' => 'pen']],
                plain: [['ru' => 'Это'], ['ru' => 'Может быть']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'книга'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A book', 'correct' => ['this is', 'a', 'book'], 'extra' => ['pen', 'and']],
                            'az' => ['sentence' => 'bu bir kitab', 'correct' => ['bu', 'bir', 'kitab'], 'extra' => ['qələm', 'və']],
                            'ar' => ['sentence' => 'هذا كتاب', 'correct' => ['هذا', 'كتاب'], 'extra' => ['قلم', 'و']],
                            'fr' => ['sentence' => "C'est Un livre", 'correct' => ["c'est", 'un', 'livre'], 'extra' => ['stylo', 'et']],
                            'es' => ['sentence' => 'Esto es Un libro', 'correct' => ['esto es', 'un', 'libro'], 'extra' => ['bolígrafo', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Buch', 'correct' => ['das ist', 'ein', 'Buch'], 'extra' => ['Stift', 'und']],
                            'ja' => ['sentence' => 'これは本です', 'correct' => ['これは', '本'], 'extra' => ['ペン', 'と']],
                            'ko' => ['sentence' => '이것은 책입니다', 'correct' => ['이것은', '책'], 'extra' => ['펜', '그리고']],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['ve', 'kalem']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'ручка'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A pen', 'correct' => ['this is', 'a', 'pen'], 'extra' => ['book', 'and']],
                            'az' => ['sentence' => 'bu bir qələm', 'correct' => ['bu', 'bir', 'qələm'], 'extra' => ['kitab', 'və']],
                            'ar' => ['sentence' => 'هذا قلم', 'correct' => ['هذا', 'قلم'], 'extra' => ['كتاب', 'و']],
                            'fr' => ['sentence' => "C'est Un stylo", 'correct' => ["c'est", 'un', 'stylo'], 'extra' => ['livre', 'et']],
                            'es' => ['sentence' => 'Esto es Un bolígrafo', 'correct' => ['esto es', 'un', 'bolígrafo'], 'extra' => ['libro', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Stift', 'correct' => ['das ist', 'ein', 'Stift'], 'extra' => ['Buch', 'und']],
                            'ja' => ['sentence' => 'これはペンです', 'correct' => ['これは', 'ペン'], 'extra' => ['本', 'と']],
                            'ko' => ['sentence' => '이것은 펜입니다', 'correct' => ['이것은', '펜'], 'extra' => ['책', '그리고']],
                            'tr' => ['sentence' => 'bir kalem', 'correct' => ['bir', 'kalem'], 'extra' => ['ve', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['книга', 'и', 'ручка'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['بيت']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein Buch und ein Stift', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Stift'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['家']],
                            'ko' => ['sentence' => '책과 펜', 'correct' => ['책과', '펜'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => []],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: House & School', 2,
                pictures: [['ru' => 'Дом', 'img' => 'house'], ['ru' => 'Школа', 'img' => 'school']],
                plain: [['ru' => 'Это'], ['ru' => 'Мой']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'дом'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is A house', 'correct' => ['this is', 'a', 'house'], 'extra' => ['school', 'this']],
                            'az' => ['sentence' => 'bu bir ev', 'correct' => ['bu', 'bir', 'ev'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'هذا بيت', 'correct' => ['هذا', 'بيت'], 'extra' => ['مدرسة']],
                            'fr' => ['sentence' => "C'est Une maison", 'correct' => ["c'est", 'une', 'maison'], 'extra' => ['école', 'ce']],
                            'es' => ['sentence' => 'Esto es Una casa', 'correct' => ['esto es', 'una', 'casa'], 'extra' => ['escuela', 'este']],
                            'de' => ['sentence' => 'Das ist Ein Haus', 'correct' => ['das ist', 'ein', 'Haus'], 'extra' => ['Schule', 'dies']],
                            'ja' => ['sentence' => 'これは家です', 'correct' => ['これは', '家'], 'extra' => ['学校', 'これ']],
                            'ko' => ['sentence' => '이것은 집입니다', 'correct' => ['이것은', '집'], 'extra' => ['학교', '이것']],
                            'tr' => ['sentence' => 'bir ev', 'correct' => ['bir', 'ev'], 'extra' => ['bu', 'benim']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'мой', 'дом'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is my house', 'correct' => ['this is', 'my', 'house'], 'extra' => ['school']],
                            'az' => ['sentence' => 'bu mənim ev', 'correct' => ['bu', 'mənim', 'ev'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'هذا بيت', 'correct' => ['هذا', 'بيت'], 'extra' => ['مدرسة']],
                            'fr' => ['sentence' => 'Ceci est ma maison', 'correct' => ['ceci est', 'ma', 'maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Esta es mi casa', 'correct' => ['esta es', 'mi', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Das ist mein Haus', 'correct' => ['das ist', 'mein', 'Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => 'これは私の家です', 'correct' => ['これは', '私の', '家', 'です'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '이것은 내 집입니다', 'correct' => ['이것은', '내', '집입니다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'bu benim evim', 'correct' => ['bu', 'benim', 'evim'], 'extra' => ['ev', 'okul']],
                        ],
                    ],
                    'c' => [
                        'words' => ['это', 'мой', 'школа', 'и', 'дом'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my school and a house', 'correct' => ['this is', 'my', 'school', 'and', 'a', 'house'], 'extra' => ['book']],
                            'az' => ['sentence' => 'bu mənim məktəb və bir ev', 'correct' => ['bu', 'mənim', 'məktəb', 'və', 'bir', 'ev'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'هذا مدرسة و بيت', 'correct' => ['هذا', 'مدرسة', 'و', 'بيت'], 'extra' => ['كتاب']],
                            'fr' => ['sentence' => 'Ceci est mon école et une maison', 'correct' => ['ceci est', 'mon', 'école', 'et', 'une', 'maison'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Esta es mi escuela y una casa', 'correct' => ['esta es', 'mi', 'escuela', 'y', 'una', 'casa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Das ist meine Schule und ein Haus', 'correct' => ['das ist', 'meine', 'Schule', 'und', 'ein', 'Haus'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'これは私の学校と家です', 'correct' => ['これは', '私の', '学校', 'と', '家', 'です'], 'extra' => ['本']],
                            'ko' => ['sentence' => '이것은 내 학교와 집입니다', 'correct' => ['이것은', '내', '학교와', '집입니다'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'bu benim okulum ve bir ev', 'correct' => ['bu', 'benim', 'okulum', 've', 'bir', 'ev'], 'extra' => ['okul']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Cat & Dog', 3,
                pictures: [['ru' => 'Кот', 'img' => 'cat'], ['ru' => 'Собака', 'img' => 'dog']],
                plain: [['ru' => 'Это'], ['ru' => 'Может быть']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'кот'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'This is A cat', 'correct' => ['this is', 'a', 'cat'], 'extra' => ['dog', 'and']],
                            'az' => ['sentence' => 'bu bir pişik', 'correct' => ['bu', 'bir', 'pişik'], 'extra' => ['it', 'və']],
                            'ar' => ['sentence' => 'هذا قط', 'correct' => ['هذا', 'قط'], 'extra' => ['كلب', 'و']],
                            'fr' => ['sentence' => "C'est Un chat", 'correct' => ["c'est", 'un', 'chat'], 'extra' => ['chien', 'et']],
                            'es' => ['sentence' => 'Esto es Un gato', 'correct' => ['esto es', 'un', 'gato'], 'extra' => ['perro', 'y']],
                            'de' => ['sentence' => 'Das ist Eine Katze', 'correct' => ['das ist', 'eine', 'Katze'], 'extra' => ['Hund', 'und']],
                            'ja' => ['sentence' => 'これは猫です', 'correct' => ['これは', '猫'], 'extra' => ['犬', 'と']],
                            'ko' => ['sentence' => '이것은 고양이입니다', 'correct' => ['이것은', '고양이'], 'extra' => ['개', '그리고']],
                            'tr' => ['sentence' => 'bir kedi', 'correct' => ['bir', 'kedi'], 'extra' => ['ve', 'köpek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'собака'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A dog', 'correct' => ['this is', 'a', 'dog'], 'extra' => ['cat', 'and']],
                            'az' => ['sentence' => 'bu bir it', 'correct' => ['bu', 'bir', 'it'], 'extra' => ['pişik', 'və']],
                            'ar' => ['sentence' => 'هذا كلب', 'correct' => ['هذا', 'كلب'], 'extra' => ['قط', 'و']],
                            'fr' => ['sentence' => "C'est Un chien", 'correct' => ["c'est", 'un', 'chien'], 'extra' => ['chat', 'et']],
                            'es' => ['sentence' => 'Esto es Un perro', 'correct' => ['esto es', 'un', 'perro'], 'extra' => ['gato', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Hund', 'correct' => ['das ist', 'ein', 'Hund'], 'extra' => ['Katze', 'und']],
                            'ja' => ['sentence' => 'これは犬です', 'correct' => ['これは', '犬'], 'extra' => ['猫', 'と']],
                            'ko' => ['sentence' => '이것은 개입니다', 'correct' => ['이것은', '개'], 'extra' => ['고양이', '그리고']],
                            'tr' => ['sentence' => 'bir köpek', 'correct' => ['bir', 'köpek'], 'extra' => ['ve', 'kedi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['кот', 'и', 'собака'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A cat and a dog', 'correct' => ['a', 'cat', 'and', 'a', 'dog'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bir pişik və bir it', 'correct' => ['bir', 'pişik', 'və', 'bir', 'it'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'قط و كلب', 'correct' => ['قط', 'و', 'كلب'], 'extra' => ['بيت']],
                            'fr' => ['sentence' => 'Un chat et un chien', 'correct' => ['un', 'chat', 'et', 'un', 'chien'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Un gato y un perro', 'correct' => ['un', 'gato', 'y', 'un', 'perro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Eine Katze und ein Hund', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Hund'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '猫と犬', 'correct' => ['猫', 'と', '犬'], 'extra' => ['家']],
                            'ko' => ['sentence' => '고양이와 개', 'correct' => ['고양이와', '개'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bir kedi ve bir köpek', 'correct' => ['bir', 'kedi', 've', 'bir', 'köpek'], 'extra' => []],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Table & Chair', 4,
                pictures: [['ru' => 'Стол', 'img' => 'table'], ['ru' => 'Стул', 'img' => 'chair']],
                plain: [['ru' => 'Это'], ['ru' => 'Может быть']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'стол'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A table', 'correct' => ['this is', 'a', 'table'], 'extra' => ['chair', 'and']],
                            'az' => ['sentence' => 'bu bir masa', 'correct' => ['bu', 'bir', 'masa'], 'extra' => ['stul', 'və']],
                            'ar' => ['sentence' => 'هذا طاولة', 'correct' => ['هذا', 'طاولة'], 'extra' => ['كرسي', 'و']],
                            'fr' => ['sentence' => "C'est Une table", 'correct' => ["c'est", 'une', 'table'], 'extra' => ['chaise', 'et']],
                            'es' => ['sentence' => 'Esto es Una mesa', 'correct' => ['esto es', 'una', 'mesa'], 'extra' => ['silla', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Tisch', 'correct' => ['das ist', 'ein', 'Tisch'], 'extra' => ['Stuhl', 'und']],
                            'ja' => ['sentence' => 'これはテーブルです', 'correct' => ['これは', 'テーブル'], 'extra' => ['椅子', 'と']],
                            'ko' => ['sentence' => '이것은 탁자입니다', 'correct' => ['이것은', '탁자'], 'extra' => ['의자', '그리고']],
                            'tr' => ['sentence' => 'bir masa', 'correct' => ['bir', 'masa'], 'extra' => ['bu', 've']],
                        ],
                    ],
                    'b' => [
                        'words' => ['это', 'стул'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is a chair', 'correct' => ['this is', 'a', 'chair'], 'extra' => ['table']],
                            'az' => ['sentence' => 'bu bir stul', 'correct' => ['bu', 'bir', 'stul'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'هذا كرسي', 'correct' => ['هذا', 'كرسي'], 'extra' => ['طاولة']],
                            'fr' => ['sentence' => 'Ceci est une chaise', 'correct' => ['ceci est', 'une', 'chaise'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Esta es una silla', 'correct' => ['esta es', 'una', 'silla'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Das ist ein Stuhl', 'correct' => ['das ist', 'ein', 'Stuhl'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => 'これは椅子です', 'correct' => ['これは', '椅子', 'です'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '이것은 의자입니다', 'correct' => ['이것은', '의자입니다'], 'extra' => ['탁자']],
                            'tr' => ['sentence' => 'bu bir sandalye', 'correct' => ['bu', 'bir', 'sandalye'], 'extra' => ['ve', 'masa']],
                        ],
                    ],
                    'c' => [
                        'words' => ['стол', 'и', 'стул'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A table and a chair', 'correct' => ['a', 'table', 'and', 'a', 'chair'], 'extra' => ['book']],
                            'az' => ['sentence' => 'bir masa və bir stul', 'correct' => ['bir', 'masa', 'və', 'bir', 'stul'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'طاولة و كرسي', 'correct' => ['طاولة', 'و', 'كرسي'], 'extra' => ['كتاب']],
                            'fr' => ['sentence' => 'Une table et une chaise', 'correct' => ['une', 'table', 'et', 'une', 'chaise'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Una mesa y una silla', 'correct' => ['una', 'mesa', 'y', 'una', 'silla'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Ein Tisch und ein Stuhl', 'correct' => ['ein', 'Tisch', 'und', 'ein', 'Stuhl'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['本']],
                            'ko' => ['sentence' => '탁자와 의자', 'correct' => ['탁자와', '의자'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'bir masa ve bir sandalye', 'correct' => ['bir', 'masa', 've', 'bir', 'sandalye'], 'extra' => ['bu']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Things', 5,
                pictures: [['ru' => 'Книга', 'img' => 'book'], ['ru' => 'Дом', 'img' => 'house']],
                plain: [['ru' => 'Это'], ['ru' => 'Мой']],
                phrases: [
                    'a' => [
                        'words' => ['это', 'мой', 'книга'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my book', 'correct' => ['this is', 'my', 'book'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bu mənim kitab', 'correct' => ['bu', 'mənim', 'kitab'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'هذا كتاب', 'correct' => ['هذا', 'كتاب'], 'extra' => ['بيت']],
                            'fr' => ['sentence' => 'Ceci est mon livre', 'correct' => ['ceci est', 'mon', 'livre'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Este es mi libro', 'correct' => ['este es', 'mi', 'libro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Das ist mein Buch', 'correct' => ['das ist', 'mein', 'Buch'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'これは私の本です', 'correct' => ['これは', '私の', '本', 'です'], 'extra' => ['家']],
                            'ko' => ['sentence' => '이것은 내 책입니다', 'correct' => ['이것은', '내', '책입니다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bu benim kitabım', 'correct' => ['bu', 'benim', 'kitabım'], 'extra' => ['kitap', 'ev']],
                        ],
                    ],
                    'b' => [
                        'words' => ['мой', 'дом'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My house', 'correct' => ['my', 'house'], 'extra' => ['book']],
                            'az' => ['sentence' => 'mənim ev', 'correct' => ['mənim', 'ev'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'بيت', 'correct' => ['بيت'], 'extra' => ['كتاب']],
                            'fr' => ['sentence' => 'Ma maison', 'correct' => ['ma', 'maison'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Mi casa', 'correct' => ['mi', 'casa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Mein Haus', 'correct' => ['mein', 'Haus'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '私の家', 'correct' => ['私の', '家'], 'extra' => ['本']],
                            'ko' => ['sentence' => '내 집', 'correct' => ['내', '집'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'benim evim', 'correct' => ['benim', 'evim'], 'extra' => ['kitabım', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['мой', 'книга', 'и', 'мой', 'дом'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My book and my house', 'correct' => ['my', 'book', 'and', 'my', 'house'], 'extra' => ['pen']],
                            'az' => ['sentence' => 'mənim kitab və mənim ev', 'correct' => ['mənim', 'kitab', 'və', 'mənim', 'ev'], 'extra' => ['qələm']],
                            'ar' => ['sentence' => 'كتاب و بيت', 'correct' => ['كتاب', 'و', 'بيت'], 'extra' => ['قلم']],
                            'fr' => ['sentence' => 'Mon livre et ma maison', 'correct' => ['mon', 'livre', 'et', 'ma', 'maison'], 'extra' => ['stylo']],
                            'es' => ['sentence' => 'Mi libro y mi casa', 'correct' => ['mi', 'libro', 'y', 'mi', 'casa'], 'extra' => ['bolígrafo']],
                            'de' => ['sentence' => 'Mein Buch und mein Haus', 'correct' => ['mein', 'Buch', 'und', 'mein', 'Haus'], 'extra' => ['Stift']],
                            'ja' => ['sentence' => '私の本と私の家', 'correct' => ['私の', '本', 'と', '私の', '家'], 'extra' => ['ペン']],
                            'ko' => ['sentence' => '내 책과 내 집', 'correct' => ['내', '책과', '내', '집'], 'extra' => ['펜']],
                            'tr' => ['sentence' => 'benim kitabım ve benim evim', 'correct' => ['benim', 'kitabım', 've', 'benim', 'evim'], 'extra' => ['kitap', 'ev']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
