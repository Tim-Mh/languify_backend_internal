<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitBeginner02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kitab' => 'book', 'Qələm' => 'pen', 'Ev' => 'house', 'Məktəb' => 'school',
        'Pişik' => 'cat', 'İt' => 'dog', 'Masa' => 'table', 'Stul' => 'chair',
    ];

    /**
     * Azerbaijani Beginner Unit 2.
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
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: People & Home', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Book & Pen', 1,
                pictures: [['az' => 'Kitab', 'img' => 'book'], ['az' => 'Qələm', 'img' => 'pen']],
                plain: [['az' => 'Bir'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kitab'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A book', 'correct' => ['a', 'book'], 'extra' => ['pen', 'and']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['stylo', 'et']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['bolígrafo', 'y']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['Stift', 'und']],
                            'ja' => ['sentence' => '本', 'correct' => ['本'], 'extra' => ['ペン', 'と']],
                            'ko' => ['sentence' => '책', 'correct' => ['책'], 'extra' => ['펜', '그리고']],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['ve', 'kalem']],
                            'ru' => ['sentence' => 'книга', 'correct' => ['книга'], 'extra' => ['ручка', 'и']],
                            'ar' => ['sentence' => 'كتاب', 'correct' => ['كتاب'], 'extra' => ['قلم', 'و']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'qələm'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A pen', 'correct' => ['a', 'pen'], 'extra' => ['book', 'and']],
                            'fr' => ['sentence' => 'Un stylo', 'correct' => ['un', 'stylo'], 'extra' => ['livre', 'et']],
                            'es' => ['sentence' => 'Un bolígrafo', 'correct' => ['un', 'bolígrafo'], 'extra' => ['libro', 'y']],
                            'de' => ['sentence' => 'Ein Stift', 'correct' => ['ein', 'Stift'], 'extra' => ['Buch', 'und']],
                            'ja' => ['sentence' => 'ペン', 'correct' => ['ペン'], 'extra' => ['本', 'と']],
                            'ko' => ['sentence' => '펜', 'correct' => ['펜'], 'extra' => ['책', '그리고']],
                            'tr' => ['sentence' => 'bir kalem', 'correct' => ['bir', 'kalem'], 'extra' => ['ve', 'kitap']],
                            'ru' => ['sentence' => 'ручка', 'correct' => ['ручка'], 'extra' => ['книга', 'и']],
                            'ar' => ['sentence' => 'قلم', 'correct' => ['قلم'], 'extra' => ['كتاب', 'و']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['house']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein Buch und ein Stift', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Stift'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['家']],
                            'ko' => ['sentence' => '책과 펜', 'correct' => ['책과', '펜'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bir kitap ve bir kalem', 'correct' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'extra' => []],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['дом']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['بيت']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: House & School', 2,
                pictures: [['az' => 'Ev', 'img' => 'house'], ['az' => 'Məktəb', 'img' => 'school']],
                plain: [['az' => 'Bir'], ['az' => 'Bu']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A house', 'correct' => ['a', 'house'], 'extra' => ['school', 'this']],
                            'fr' => ['sentence' => 'Une maison', 'correct' => ['une', 'maison'], 'extra' => ['école', 'ce']],
                            'es' => ['sentence' => 'Una casa', 'correct' => ['una', 'casa'], 'extra' => ['escuela', 'este']],
                            'de' => ['sentence' => 'Ein Haus', 'correct' => ['ein', 'Haus'], 'extra' => ['Schule', 'dies']],
                            'ja' => ['sentence' => '家', 'correct' => ['家'], 'extra' => ['学校', 'これ']],
                            'ko' => ['sentence' => '집', 'correct' => ['집'], 'extra' => ['학교', '이것']],
                            'tr' => ['sentence' => 'bir ev', 'correct' => ['bir', 'ev'], 'extra' => ['bu', 'benim']],
                            'ru' => ['sentence' => 'дом', 'correct' => ['дом'], 'extra' => ['школа', 'это']],
                            'ar' => ['sentence' => 'بيت', 'correct' => ['بيت'], 'extra' => ['مدرسة', 'هذا']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'mənim', 'ev'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is my house', 'correct' => ['this is', 'my', 'house'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Ceci est ma maison', 'correct' => ['ceci est', 'ma', 'maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Esta es mi casa', 'correct' => ['esta es', 'mi', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Das ist mein Haus', 'correct' => ['das ist', 'mein', 'Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => 'これは私の家です', 'correct' => ['これは', '私の', '家', 'です'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '이것은 내 집입니다', 'correct' => ['이것은', '내', '집입니다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'bu benim evim', 'correct' => ['bu', 'benim', 'evim'], 'extra' => ['ev', 'okul']],
                            'ru' => ['sentence' => 'это мой дом', 'correct' => ['это', 'мой', 'дом'], 'extra' => ['школа']],
                            'ar' => ['sentence' => 'هذا بيت', 'correct' => ['هذا', 'بيت'], 'extra' => ['مدرسة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'mənim', 'məktəb', 'və', 'bir', 'ev'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my school and a house', 'correct' => ['this is', 'my', 'school', 'and', 'a', 'house'], 'extra' => ['book']],
                            'fr' => ['sentence' => 'Ceci est mon école et une maison', 'correct' => ['ceci est', 'mon', 'école', 'et', 'une', 'maison'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Esta es mi escuela y una casa', 'correct' => ['esta es', 'mi', 'escuela', 'y', 'una', 'casa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Das ist meine Schule und ein Haus', 'correct' => ['das ist', 'meine', 'Schule', 'und', 'ein', 'Haus'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'これは私の学校と家です', 'correct' => ['これは', '私の', '学校', 'と', '家', 'です'], 'extra' => ['本']],
                            'ko' => ['sentence' => '이것은 내 학교와 집입니다', 'correct' => ['이것은', '내', '학교와', '집입니다'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'bu benim okulum ve bir ev', 'correct' => ['bu', 'benim', 'okulum', 've', 'bir', 'ev'], 'extra' => ['okul']],
                            'ru' => ['sentence' => 'это мой школа и дом', 'correct' => ['это', 'мой', 'школа', 'и', 'дом'], 'extra' => ['книга']],
                            'ar' => ['sentence' => 'هذا مدرسة و بيت', 'correct' => ['هذا', 'مدرسة', 'و', 'بيت'], 'extra' => ['كتاب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Cat & Dog', 3,
                pictures: [['az' => 'Pişik', 'img' => 'cat'], ['az' => 'İt', 'img' => 'dog']],
                plain: [['az' => 'Bir'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'pişik'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A cat', 'correct' => ['a', 'cat'], 'extra' => ['dog', 'and']],
                            'fr' => ['sentence' => 'Un chat', 'correct' => ['un', 'chat'], 'extra' => ['chien', 'et']],
                            'es' => ['sentence' => 'Un gato', 'correct' => ['un', 'gato'], 'extra' => ['perro', 'y']],
                            'de' => ['sentence' => 'Eine Katze', 'correct' => ['eine', 'Katze'], 'extra' => ['Hund', 'und']],
                            'ja' => ['sentence' => '猫', 'correct' => ['猫'], 'extra' => ['犬', 'と']],
                            'ko' => ['sentence' => '고양이', 'correct' => ['고양이'], 'extra' => ['개', '그리고']],
                            'tr' => ['sentence' => 'bir kedi', 'correct' => ['bir', 'kedi'], 'extra' => ['ve', 'köpek']],
                            'ru' => ['sentence' => 'кот', 'correct' => ['кот'], 'extra' => ['собака', 'и']],
                            'ar' => ['sentence' => 'قط', 'correct' => ['قط'], 'extra' => ['كلب', 'و']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'it'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A dog', 'correct' => ['a', 'dog'], 'extra' => ['cat', 'and']],
                            'fr' => ['sentence' => 'Un chien', 'correct' => ['un', 'chien'], 'extra' => ['chat', 'et']],
                            'es' => ['sentence' => 'Un perro', 'correct' => ['un', 'perro'], 'extra' => ['gato', 'y']],
                            'de' => ['sentence' => 'Ein Hund', 'correct' => ['ein', 'Hund'], 'extra' => ['Katze', 'und']],
                            'ja' => ['sentence' => '犬', 'correct' => ['犬'], 'extra' => ['猫', 'と']],
                            'ko' => ['sentence' => '개', 'correct' => ['개'], 'extra' => ['고양이', '그리고']],
                            'tr' => ['sentence' => 'bir köpek', 'correct' => ['bir', 'köpek'], 'extra' => ['ve', 'kedi']],
                            'ru' => ['sentence' => 'собака', 'correct' => ['собака'], 'extra' => ['кот', 'и']],
                            'ar' => ['sentence' => 'كلب', 'correct' => ['كلب'], 'extra' => ['قط', 'و']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'pişik', 'və', 'bir', 'it'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A cat and a dog', 'correct' => ['a', 'cat', 'and', 'a', 'dog'], 'extra' => ['house']],
                            'fr' => ['sentence' => 'Un chat et un chien', 'correct' => ['un', 'chat', 'et', 'un', 'chien'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Un gato y un perro', 'correct' => ['un', 'gato', 'y', 'un', 'perro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Eine Katze und ein Hund', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Hund'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '猫と犬', 'correct' => ['猫', 'と', '犬'], 'extra' => ['家']],
                            'ko' => ['sentence' => '고양이와 개', 'correct' => ['고양이와', '개'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bir kedi ve bir köpek', 'correct' => ['bir', 'kedi', 've', 'bir', 'köpek'], 'extra' => []],
                            'ru' => ['sentence' => 'кот и собака', 'correct' => ['кот', 'и', 'собака'], 'extra' => ['дом']],
                            'ar' => ['sentence' => 'قط و كلب', 'correct' => ['قط', 'و', 'كلب'], 'extra' => ['بيت']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Table & Chair', 4,
                pictures: [['az' => 'Masa', 'img' => 'table'], ['az' => 'Stul', 'img' => 'chair']],
                plain: [['az' => 'Bir'], ['az' => 'Bu']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'masa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A table', 'correct' => ['a', 'table'], 'extra' => ['chair', 'and']],
                            'fr' => ['sentence' => 'Une table', 'correct' => ['une', 'table'], 'extra' => ['chaise', 'et']],
                            'es' => ['sentence' => 'Una mesa', 'correct' => ['una', 'mesa'], 'extra' => ['silla', 'y']],
                            'de' => ['sentence' => 'Ein Tisch', 'correct' => ['ein', 'Tisch'], 'extra' => ['Stuhl', 'und']],
                            'ja' => ['sentence' => 'テーブル', 'correct' => ['テーブル'], 'extra' => ['椅子', 'と']],
                            'ko' => ['sentence' => '탁자', 'correct' => ['탁자'], 'extra' => ['의자', '그리고']],
                            'tr' => ['sentence' => 'bir masa', 'correct' => ['bir', 'masa'], 'extra' => ['bu', 've']],
                            'ru' => ['sentence' => 'стол', 'correct' => ['стол'], 'extra' => ['стул', 'и']],
                            'ar' => ['sentence' => 'طاولة', 'correct' => ['طاولة'], 'extra' => ['كرسي', 'و']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'bir', 'stul'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is a chair', 'correct' => ['this is', 'a', 'chair'], 'extra' => ['table']],
                            'fr' => ['sentence' => 'Ceci est une chaise', 'correct' => ['ceci est', 'une', 'chaise'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Esta es una silla', 'correct' => ['esta es', 'una', 'silla'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Das ist ein Stuhl', 'correct' => ['das ist', 'ein', 'Stuhl'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => 'これは椅子です', 'correct' => ['これは', '椅子', 'です'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '이것은 의자입니다', 'correct' => ['이것은', '의자입니다'], 'extra' => ['탁자']],
                            'tr' => ['sentence' => 'bu bir sandalye', 'correct' => ['bu', 'bir', 'sandalye'], 'extra' => ['ve', 'masa']],
                            'ru' => ['sentence' => 'это стул', 'correct' => ['это', 'стул'], 'extra' => ['стол']],
                            'ar' => ['sentence' => 'هذا كرسي', 'correct' => ['هذا', 'كرسي'], 'extra' => ['طاولة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'masa', 'və', 'bir', 'stul'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A table and a chair', 'correct' => ['a', 'table', 'and', 'a', 'chair'], 'extra' => ['book']],
                            'fr' => ['sentence' => 'Une table et une chaise', 'correct' => ['une', 'table', 'et', 'une', 'chaise'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Una mesa y una silla', 'correct' => ['una', 'mesa', 'y', 'una', 'silla'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Ein Tisch und ein Stuhl', 'correct' => ['ein', 'Tisch', 'und', 'ein', 'Stuhl'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['本']],
                            'ko' => ['sentence' => '탁자와 의자', 'correct' => ['탁자와', '의자'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'bir masa ve bir sandalye', 'correct' => ['bir', 'masa', 've', 'bir', 'sandalye'], 'extra' => ['bu']],
                            'ru' => ['sentence' => 'стол и стул', 'correct' => ['стол', 'и', 'стул'], 'extra' => ['книга']],
                            'ar' => ['sentence' => 'طاولة و كرسي', 'correct' => ['طاولة', 'و', 'كرسي'], 'extra' => ['كتاب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Things', 5,
                pictures: [['az' => 'Kitab', 'img' => 'book'], ['az' => 'Ev', 'img' => 'house']],
                plain: [['az' => 'Bu'], ['az' => 'Mənim']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'mənim', 'kitab'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is my book', 'correct' => ['this is', 'my', 'book'], 'extra' => ['house']],
                            'fr' => ['sentence' => 'Ceci est mon livre', 'correct' => ['ceci est', 'mon', 'livre'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Este es mi libro', 'correct' => ['este es', 'mi', 'libro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Das ist mein Buch', 'correct' => ['das ist', 'mein', 'Buch'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'これは私の本です', 'correct' => ['これは', '私の', '本', 'です'], 'extra' => ['家']],
                            'ko' => ['sentence' => '이것은 내 책입니다', 'correct' => ['이것은', '내', '책입니다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'bu benim kitabım', 'correct' => ['bu', 'benim', 'kitabım'], 'extra' => ['kitap', 'ev']],
                            'ru' => ['sentence' => 'это мой книга', 'correct' => ['это', 'мой', 'книга'], 'extra' => ['дом']],
                            'ar' => ['sentence' => 'هذا كتاب', 'correct' => ['هذا', 'كتاب'], 'extra' => ['بيت']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mənim', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My house', 'correct' => ['my', 'house'], 'extra' => ['book']],
                            'fr' => ['sentence' => 'Ma maison', 'correct' => ['ma', 'maison'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Mi casa', 'correct' => ['mi', 'casa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Mein Haus', 'correct' => ['mein', 'Haus'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '私の家', 'correct' => ['私の', '家'], 'extra' => ['本']],
                            'ko' => ['sentence' => '내 집', 'correct' => ['내', '집'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'benim evim', 'correct' => ['benim', 'evim'], 'extra' => ['kitabım', 'kitap']],
                            'ru' => ['sentence' => 'мой дом', 'correct' => ['мой', 'дом'], 'extra' => ['книга']],
                            'ar' => ['sentence' => 'بيت', 'correct' => ['بيت'], 'extra' => ['كتاب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mənim', 'kitab', 'və', 'mənim', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'My book and my house', 'correct' => ['my', 'book', 'and', 'my', 'house'], 'extra' => ['pen']],
                            'fr' => ['sentence' => 'Mon livre et ma maison', 'correct' => ['mon', 'livre', 'et', 'ma', 'maison'], 'extra' => ['stylo']],
                            'es' => ['sentence' => 'Mi libro y mi casa', 'correct' => ['mi', 'libro', 'y', 'mi', 'casa'], 'extra' => ['bolígrafo']],
                            'de' => ['sentence' => 'Mein Buch und mein Haus', 'correct' => ['mein', 'Buch', 'und', 'mein', 'Haus'], 'extra' => ['Stift']],
                            'ja' => ['sentence' => '私の本と私の家', 'correct' => ['私の', '本', 'と', '私の', '家'], 'extra' => ['ペン']],
                            'ko' => ['sentence' => '내 책과 내 집', 'correct' => ['내', '책과', '내', '집'], 'extra' => ['펜']],
                            'tr' => ['sentence' => 'benim kitabım ve benim evim', 'correct' => ['benim', 'kitabım', 've', 'benim', 'evim'], 'extra' => ['kitap', 'ev']],
                            'ru' => ['sentence' => 'мой книга и мой дом', 'correct' => ['мой', 'книга', 'и', 'мой', 'дом'], 'extra' => ['ручка']],
                            'ar' => ['sentence' => 'كتاب و بيت', 'correct' => ['كتاب', 'و', 'بيت'], 'extra' => ['قلم']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
