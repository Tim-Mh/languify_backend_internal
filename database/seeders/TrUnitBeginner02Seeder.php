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
                            'en' => ['sentence' => 'This is my house', 'correct' => ['this', 'my', 'house'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Ceci est ma maison', 'correct' => ['ceci', 'ma', 'maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Esta es mi casa', 'correct' => ['esta', 'mi', 'casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Das ist mein Haus', 'correct' => ['das', 'mein', 'Haus'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => 'これは私の家です', 'correct' => ['これは', '私の', '家', 'です'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '이것은 내 집입니다', 'correct' => ['이것은', '내', '집입니다'], 'extra' => ['학교']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'benim', 'okulum', 've', 'bir', 'ev'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is my school and a house', 'correct' => ['this', 'my', 'school', 'and', 'a', 'house'], 'extra' => ['book']],
                            'fr' => ['sentence' => 'Ceci est mon école et une maison', 'correct' => ['ceci', 'mon', 'école', 'et', 'une', 'maison'], 'extra' => ['livre']],
                            'es' => ['sentence' => 'Esta es mi escuela y una casa', 'correct' => ['esta', 'mi', 'escuela', 'y', 'una', 'casa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Das ist meine Schule und ein Haus', 'correct' => ['das', 'meine', 'Schule', 'und', 'ein', 'Haus'], 'extra' => ['Buch']],
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
                            'en' => ['sentence' => 'This is a chair', 'correct' => ['this', 'a', 'chair'], 'extra' => ['table']],
                            'fr' => ['sentence' => 'Ceci est une chaise', 'correct' => ['ceci', 'une', 'chaise'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Esta es una silla', 'correct' => ['esta', 'una', 'silla'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Das ist ein Stuhl', 'correct' => ['das', 'ein', 'Stuhl'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => 'これは椅子です', 'correct' => ['これは', '椅子', 'です'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '이것은 의자입니다', 'correct' => ['이것은', '의자입니다'], 'extra' => ['탁자']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'masa', 've', 'bir', 'sandalye'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A table and a chair', 'correct' => ['a', 'table', 'and', 'a', 'chair'], 'extra' => ['book']],
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
                            'en' => ['sentence' => 'This is my book', 'correct' => ['this', 'my', 'book'], 'extra' => ['house']],
                            'fr' => ['sentence' => 'Ceci est mon livre', 'correct' => ['ceci', 'mon', 'livre'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Este es mi libro', 'correct' => ['este', 'mi', 'libro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Das ist mein Buch', 'correct' => ['das', 'mein', 'Buch'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'これは私の本です', 'correct' => ['これは', '私の', '本', 'です'], 'extra' => ['家']],
                            'ko' => ['sentence' => '이것은 내 책입니다', 'correct' => ['이것은', '내', '책입니다'], 'extra' => ['집']],
                        ],
                    ],
                    'b' => [
                        'words' => ['benim', 'evim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'My house', 'correct' => ['my', 'house'], 'extra' => ['book']],
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
