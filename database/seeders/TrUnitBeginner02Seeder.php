<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitBeginner02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Kitap' => 'book', 'Kalem' => 'pen', 'Ev' => 'house', 'Okul' => 'school',
        'Masa' => 'table', 'Sandalye' => 'chair', 'Kedi' => 'cat', 'Köpek' => 'dog',
    ];

    /**
     * Turkish Beginner Unit 2 — people, home and the first real sentences.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     *
     * TURKISH-SPECIFIC CHOICES IN THIS UNIT
     *
     * 1. `benim` + possessive suffix. "My friend" is `arkadaşım`, and the `benim`
     *    is optional emphasis. Both forms are taught as whole tiles — the
     *    learner is never asked to bolt `-ım` onto `arkadaş` themselves, because
     *    the suffix changes shape with vowel harmony (`evim`, `kitabım`) and a
     *    tile that only works on one stem teaches a rule that does not exist.
     *
     * 2. No copula. Turkish says `Bu benim kitabım` — "this my book" — with no
     *    verb at all. That is why the phrases here have no equivalent of "is":
     *    adding one would be teaching English grammar in Turkish words.
     *
     * 3. `kitabım`, not `kitapım`. Turkish softens a final `p` to `b` before a
     *    vowel-initial suffix. The inflected form is listed in the vocabulary in
     *    its own right precisely so this is never assembled incorrectly.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: People & Home', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Book & Pen', 1,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Kalem', 'img' => 'pen']],
                plain: [['tr' => 'Bir'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kitap'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A book', 'correct' => ['a', 'book'], 'extra' => ['pen', 'and']],
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['qələm', 'və']],
                            'ar' => ['sentence' => 'كتاب', 'correct' => ['كتاب'], 'extra' => ['قلم', 'و']],
                            'ru' => ['sentence' => 'книга', 'correct' => ['книга'], 'extra' => ['ручка', 'и']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['stylo', 'et']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['bolígrafo', 'y']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['Stift', 'und']],
                            'ja' => ['sentence' => '本', 'correct' => ['本'], 'extra' => ['ペン', 'と']],
                            'ko' => ['sentence' => '책', 'correct' => ['책'], 'extra' => ['펜', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'kalem'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A pen', 'correct' => ['a', 'pen'], 'extra' => ['book', 'and']],
                            'az' => ['sentence' => 'bir qələm', 'correct' => ['bir', 'qələm'], 'extra' => ['kitab', 'və']],
                            'ar' => ['sentence' => 'قلم', 'correct' => ['قلم'], 'extra' => ['كتاب', 'و']],
                            'ru' => ['sentence' => 'ручка', 'correct' => ['ручка'], 'extra' => ['книга', 'и']],
                            'fr' => ['sentence' => 'Un stylo', 'correct' => ['un', 'stylo'], 'extra' => ['livre', 'et']],
                            'es' => ['sentence' => 'Un bolígrafo', 'correct' => ['un', 'bolígrafo'], 'extra' => ['libro', 'y']],
                            'de' => ['sentence' => 'Ein Stift', 'correct' => ['ein', 'Stift'], 'extra' => ['Buch', 'und']],
                            'ja' => ['sentence' => 'ペン', 'correct' => ['ペン'], 'extra' => ['本', 'と']],
                            'ko' => ['sentence' => '펜', 'correct' => ['펜'], 'extra' => ['책', '그리고']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kitap', 've', 'bir', 'kalem'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A book and a pen', 'correct' => ['a', 'book', 'and', 'a', 'pen'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bir kitab və bir qələm', 'correct' => ['bir', 'kitab', 'və', 'bir', 'qələm'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'كتاب و قلم', 'correct' => ['كتاب', 'و', 'قلم'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'книга и ручка', 'correct' => ['книга', 'и', 'ручка'], 'extra' => ['дом']],
                            'fr' => ['sentence' => 'Un livre et un stylo', 'correct' => ['un', 'livre', 'et', 'un', 'stylo'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Un libro y un bolígrafo', 'correct' => ['un', 'libro', 'y', 'un', 'bolígrafo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein Buch und ein Stift', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Stift'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '本とペン', 'correct' => ['本', 'と', 'ペン'], 'extra' => ['家']],
                            'ko' => ['sentence' => '책과 펜', 'correct' => ['책과', '펜'], 'extra' => ['집']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: House & School', 2,
                pictures: [['tr' => 'Ev', 'img' => 'house'], ['tr' => 'Okul', 'img' => 'school']],
                plain: [['tr' => 'Bu'], ['tr' => 'Benim']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'ev'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A house', 'correct' => ['a', 'house'], 'extra' => ['school', 'this']],
                            'az' => ['sentence' => 'bir ev', 'correct' => ['bir', 'ev'], 'extra' => ['məktəb', 'bu']],
                            'ar' => ['sentence' => 'بيت', 'correct' => ['بيت'], 'extra' => ['مدرسة', 'هذا']],
                            'ru' => ['sentence' => 'дом', 'correct' => ['дом'], 'extra' => ['школа', 'это']],
                            'fr' => ['sentence' => 'Une maison', 'correct' => ['une', 'maison'], 'extra' => ['école', 'ce']],
                            'es' => ['sentence' => 'Una casa', 'correct' => ['una', 'casa'], 'extra' => ['escuela', 'este']],
                            'de' => ['sentence' => 'Ein Haus', 'correct' => ['ein', 'Haus'], 'extra' => ['Schule', 'dies']],
                            'ja' => ['sentence' => '家', 'correct' => ['家'], 'extra' => ['学校', 'これ']],
                            'ko' => ['sentence' => '집', 'correct' => ['집'], 'extra' => ['학교', '이것']],
                        ],
                    ],
                    'b' => [
                        // No copula: Turkish states this with no verb at all.
                        'words' => ['bu', 'benim', 'evim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my house', 'correct' => ['this is', 'my', 'house'], 'extra' => ['school']],
                            'az' => ['sentence' => 'bu mənim ev', 'correct' => ['bu', 'mənim', 'ev'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'هذا بيت', 'correct' => ['هذا', 'بيت'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'это мой дом', 'correct' => ['это', 'мой', 'дом'], 'extra' => ['школа']],
                            'fr' => ['sentence' => 'Ceci est ma maison', 'correct' => ['ceci est', 'ma', 'maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Esta es mi casa', 'correct' => ['esta es', 'mi', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Das ist mein Haus', 'correct' => ['das ist', 'mein', 'Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => 'これは私の家です', 'correct' => ['これは', '私の', '家', 'です'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '이것은 내 집입니다', 'correct' => ['이것은', '내', '집입니다'], 'extra' => ['학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'benim', 'okulum', 've', 'bir', 'ev'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my school and a house', 'correct' => ['this is', 'my', 'school', 'and', 'a', 'house'], 'extra' => ['book']],
                            'az' => ['sentence' => 'bu mənim məktəb və bir ev', 'correct' => ['bu', 'mənim', 'məktəb', 'və', 'bir', 'ev'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'هذا مدرسة و بيت', 'correct' => ['هذا', 'مدرسة', 'و', 'بيت'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'это мой школа и дом', 'correct' => ['это', 'мой', 'школа', 'и', 'дом'], 'extra' => ['книга']],
                            'fr' => ['sentence' => 'Ceci est mon école et une maison', 'correct' => ['ceci est', 'mon', 'école', 'et', 'une', 'maison'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Esta es mi escuela y una casa', 'correct' => ['esta es', 'mi', 'escuela', 'y', 'una', 'casa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Das ist meine Schule und ein Haus', 'correct' => ['das ist', 'meine', 'Schule', 'und', 'ein', 'Haus'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'これは私の学校と家です', 'correct' => ['これは', '私の', '学校', 'と', '家', 'です'], 'extra' => ['本']],
                            'ko' => ['sentence' => '이것은 내 학교와 집입니다', 'correct' => ['이것은', '내', '학교와', '집입니다'], 'extra' => ['책']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Cat & Dog', 3,
                pictures: [['tr' => 'Kedi', 'img' => 'cat'], ['tr' => 'Köpek', 'img' => 'dog']],
                plain: [['tr' => 'Ve'], ['tr' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kedi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A cat', 'correct' => ['a', 'cat'], 'extra' => ['dog', 'and']],
                            'az' => ['sentence' => 'bir pişik', 'correct' => ['bir', 'pişik'], 'extra' => ['it', 'və']],
                            'ar' => ['sentence' => 'قط', 'correct' => ['قط'], 'extra' => ['كلب', 'و']],
                            'ru' => ['sentence' => 'кот', 'correct' => ['кот'], 'extra' => ['собака', 'и']],
                            'fr' => ['sentence' => 'Un chat', 'correct' => ['un', 'chat'], 'extra' => ['chien', 'et']],
                            'es' => ['sentence' => 'Un gato', 'correct' => ['un', 'gato'], 'extra' => ['perro', 'y']],
                            'de' => ['sentence' => 'Eine Katze', 'correct' => ['eine', 'Katze'], 'extra' => ['Hund', 'und']],
                            'ja' => ['sentence' => '猫', 'correct' => ['猫'], 'extra' => ['犬', 'と']],
                            'ko' => ['sentence' => '고양이', 'correct' => ['고양이'], 'extra' => ['개', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'köpek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A dog', 'correct' => ['a', 'dog'], 'extra' => ['cat', 'and']],
                            'az' => ['sentence' => 'bir it', 'correct' => ['bir', 'it'], 'extra' => ['pişik', 'və']],
                            'ar' => ['sentence' => 'كلب', 'correct' => ['كلب'], 'extra' => ['قط', 'و']],
                            'ru' => ['sentence' => 'собака', 'correct' => ['собака'], 'extra' => ['кот', 'и']],
                            'fr' => ['sentence' => 'Un chien', 'correct' => ['un', 'chien'], 'extra' => ['chat', 'et']],
                            'es' => ['sentence' => 'Un perro', 'correct' => ['un', 'perro'], 'extra' => ['gato', 'y']],
                            'de' => ['sentence' => 'Ein Hund', 'correct' => ['ein', 'Hund'], 'extra' => ['Katze', 'und']],
                            'ja' => ['sentence' => '犬', 'correct' => ['犬'], 'extra' => ['猫', 'と']],
                            'ko' => ['sentence' => '개', 'correct' => ['개'], 'extra' => ['고양이', '그리고']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kedi', 've', 'bir', 'köpek'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A cat and a dog', 'correct' => ['a', 'cat', 'and', 'a', 'dog'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bir pişik və bir it', 'correct' => ['bir', 'pişik', 'və', 'bir', 'it'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'قط و كلب', 'correct' => ['قط', 'و', 'كلب'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'кот и собака', 'correct' => ['кот', 'и', 'собака'], 'extra' => ['дом']],
                            'fr' => ['sentence' => 'Un chat et un chien', 'correct' => ['un', 'chat', 'et', 'un', 'chien'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Un gato y un perro', 'correct' => ['un', 'gato', 'y', 'un', 'perro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Eine Katze und ein Hund', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Hund'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '猫と犬', 'correct' => ['猫', 'と', '犬'], 'extra' => ['家']],
                            'ko' => ['sentence' => '고양이와 개', 'correct' => ['고양이와', '개'], 'extra' => ['집']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Table & Chair', 4,
                pictures: [['tr' => 'Masa', 'img' => 'table'], ['tr' => 'Sandalye', 'img' => 'chair']],
                plain: [['tr' => 'Bu'], ['tr' => 'Ve']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'masa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A table', 'correct' => ['a', 'table'], 'extra' => ['chair', 'and']],
                            'az' => ['sentence' => 'bir masa', 'correct' => ['bir', 'masa'], 'extra' => ['stul', 'və']],
                            'ar' => ['sentence' => 'طاولة', 'correct' => ['طاولة'], 'extra' => ['كرسي', 'و']],
                            'ru' => ['sentence' => 'стол', 'correct' => ['стол'], 'extra' => ['стул', 'и']],
                            'fr' => ['sentence' => 'Une table', 'correct' => ['une', 'table'], 'extra' => ['chaise', 'et']],
                            'es' => ['sentence' => 'Una mesa', 'correct' => ['una', 'mesa'], 'extra' => ['silla', 'y']],
                            'de' => ['sentence' => 'Ein Tisch', 'correct' => ['ein', 'Tisch'], 'extra' => ['Stuhl', 'und']],
                            'ja' => ['sentence' => 'テーブル', 'correct' => ['テーブル'], 'extra' => ['椅子', 'と']],
                            'ko' => ['sentence' => '탁자', 'correct' => ['탁자'], 'extra' => ['의자', '그리고']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'bir', 'sandalye'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is a chair', 'correct' => ['this is', 'a', 'chair'], 'extra' => ['table']],
                            'az' => ['sentence' => 'bu bir stul', 'correct' => ['bu', 'bir', 'stul'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'هذا كرسي', 'correct' => ['هذا', 'كرسي'], 'extra' => ['طاولة']],
                            'ru' => ['sentence' => 'это стул', 'correct' => ['это', 'стул'], 'extra' => ['стол']],
                            'fr' => ['sentence' => 'Ceci est une chaise', 'correct' => ['ceci est', 'une', 'chaise'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Esta es una silla', 'correct' => ['esta es', 'una', 'silla'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Das ist ein Stuhl', 'correct' => ['das ist', 'ein', 'Stuhl'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => 'これは椅子です', 'correct' => ['これは', '椅子', 'です'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '이것은 의자입니다', 'correct' => ['이것은', '의자입니다'], 'extra' => ['탁자']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'masa', 've', 'bir', 'sandalye'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A table and a chair', 'correct' => ['a', 'table', 'and', 'a', 'chair'], 'extra' => ['book']],
                            'az' => ['sentence' => 'bir masa və bir stul', 'correct' => ['bir', 'masa', 'və', 'bir', 'stul'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'طاولة و كرسي', 'correct' => ['طاولة', 'و', 'كرسي'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'стол и стул', 'correct' => ['стол', 'и', 'стул'], 'extra' => ['книга']],
                            'fr' => ['sentence' => 'Une table et une chaise', 'correct' => ['une', 'table', 'et', 'une', 'chaise'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Una mesa y una silla', 'correct' => ['una', 'mesa', 'y', 'una', 'silla'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Ein Tisch und ein Stuhl', 'correct' => ['ein', 'Tisch', 'und', 'ein', 'Stuhl'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['本']],
                            'ko' => ['sentence' => '탁자와 의자', 'correct' => ['탁자와', '의자'], 'extra' => ['책']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: My Things', 5,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Benim'], ['tr' => 'Kitabım']],
                phrases: [
                    'a' => [
                        // kitabım, not kitapım: final p softens to b before a
                        // vowel-initial suffix, so the whole form is one tile.
                        'words' => ['bu', 'benim', 'kitabım'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my book', 'correct' => ['this is', 'my', 'book'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bu mənim kitab', 'correct' => ['bu', 'mənim', 'kitab'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'هذا كتاب', 'correct' => ['هذا', 'كتاب'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'это мой книга', 'correct' => ['это', 'мой', 'книга'], 'extra' => ['дом']],
                            'fr' => ['sentence' => 'Ceci est mon livre', 'correct' => ['ceci est', 'mon', 'livre'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Este es mi libro', 'correct' => ['este es', 'mi', 'libro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Das ist mein Buch', 'correct' => ['das ist', 'mein', 'Buch'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'これは私の本です', 'correct' => ['これは', '私の', '本', 'です'], 'extra' => ['家']],
                            'ko' => ['sentence' => '이것은 내 책입니다', 'correct' => ['이것은', '내', '책입니다'], 'extra' => ['집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['benim', 'evim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My house', 'correct' => ['my', 'house'], 'extra' => ['book']],
                            'az' => ['sentence' => 'mənim ev', 'correct' => ['mənim', 'ev'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'بيت', 'correct' => ['بيت'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'мой дом', 'correct' => ['мой', 'дом'], 'extra' => ['книга']],
                            'fr' => ['sentence' => 'Ma maison', 'correct' => ['ma', 'maison'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Mi casa', 'correct' => ['mi', 'casa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Mein Haus', 'correct' => ['mein', 'Haus'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '私の家', 'correct' => ['私の', '家'], 'extra' => ['本']],
                            'ko' => ['sentence' => '내 집', 'correct' => ['내', '집'], 'extra' => ['책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['benim', 'kitabım', 've', 'benim', 'evim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My book and my house', 'correct' => ['my', 'book', 'and', 'my', 'house'], 'extra' => ['pen']],
                            'az' => ['sentence' => 'mənim kitab və mənim ev', 'correct' => ['mənim', 'kitab', 'və', 'mənim', 'ev'], 'extra' => ['qələm']],
                            'ar' => ['sentence' => 'كتاب و بيت', 'correct' => ['كتاب', 'و', 'بيت'], 'extra' => ['قلم']],
                            'ru' => ['sentence' => 'мой книга и мой дом', 'correct' => ['мой', 'книга', 'и', 'мой', 'дом'], 'extra' => ['ручка']],
                            'fr' => ['sentence' => 'Mon livre et ma maison', 'correct' => ['mon', 'livre', 'et', 'ma', 'maison'], 'extra' => ['stylo']],
                            'es' => ['sentence' => 'Mi libro y mi casa', 'correct' => ['mi', 'libro', 'y', 'mi', 'casa'], 'extra' => ['bolígrafo']],
                            'de' => ['sentence' => 'Mein Buch und mein Haus', 'correct' => ['mein', 'Buch', 'und', 'mein', 'Haus'], 'extra' => ['Stift']],
                            'ja' => ['sentence' => '私の本と私の家', 'correct' => ['私の', '本', 'と', '私の', '家'], 'extra' => ['ペン']],
                            'ko' => ['sentence' => '내 책과 내 집', 'correct' => ['내', '책과', '내', '집'], 'extra' => ['펜']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
