<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner10Seeder extends Seeder
{
    private const PICTURES = [
        'Livre' => 'book', 'Table' => 'table', 'Chat' => 'cat',
        'Maison' => 'house', 'Chien' => 'dog', 'Café' => 'coffee',
    ];

    /**
     * French Beginner Unit 10 — un/une, le/la/les, ce/cette, mes/ces.
     *
     * This is the FRENCH article system, not the English one: French marks
     * gender (un/une, le/la) and plural (les, des, ces). Every lesson therefore
     * pairs a masculine noun with a feminine one the learner already knows, so
     * the article is the only thing that changes between the two phrases — the
     * contrast IS the lesson.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: A, The & This', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Un & Une', 1,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'Table', 'img' => 'table']],
                plain: [['fr' => 'Un'], ['fr' => 'Une']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'livre'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'A book', 'correct' => ['a', 'book'], 'extra' => ['table', 'cat']],
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['masa', 'pişik']],
                            'ar' => ['sentence' => 'كتاب', 'correct' => ['كتاب'], 'extra' => ['طاولة', 'قط']],
                            'ru' => ['sentence' => 'книга', 'correct' => ['книга'], 'extra' => ['стол', 'кот']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['mesa', 'gato']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['Tisch', 'Katze']],
                            'ja' => ['sentence' => '本', 'correct' => ['本'], 'extra' => ['テーブル', '猫']],
                            'ko' => ['sentence' => '책', 'correct' => ['책'], 'extra' => ['탁자', '고양이']],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['masa', 'kedi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'table'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'A table', 'correct' => ['a', 'table'], 'extra' => ['book', 'dog']],
                            'az' => ['sentence' => 'bir masa', 'correct' => ['bir', 'masa'], 'extra' => ['kitab', 'it']],
                            'ar' => ['sentence' => 'طاولة', 'correct' => ['طاولة'], 'extra' => ['كتاب', 'كلب']],
                            'ru' => ['sentence' => 'стол', 'correct' => ['стол'], 'extra' => ['книга', 'собака']],
                            'es' => ['sentence' => 'Una mesa', 'correct' => ['una', 'mesa'], 'extra' => ['libro', 'perro']],
                            'de' => ['sentence' => 'Ein Tisch', 'correct' => ['ein', 'Tisch'], 'extra' => ['Buch', 'Hund']],
                            'ja' => ['sentence' => 'テーブル', 'correct' => ['テーブル'], 'extra' => ['本', '犬']],
                            'ko' => ['sentence' => '탁자', 'correct' => ['탁자'], 'extra' => ['책', '개']],
                            'tr' => ['sentence' => 'bir masa', 'correct' => ['bir', 'masa'], 'extra' => ['kitap', 'köpek']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'livre', 'et', 'une', 'table'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A book and a table', 'correct' => ['a', 'book', 'and', 'a', 'table'], 'extra' => ['cat']],
                            'az' => ['sentence' => 'bir kitab və bir masa', 'correct' => ['bir', 'kitab', 'və', 'bir', 'masa'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'كتاب و طاولة', 'correct' => ['كتاب', 'و', 'طاولة'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'книга и стол', 'correct' => ['книга', 'и', 'стол'], 'extra' => ['кот']],
                            'es' => ['sentence' => 'Un libro y una mesa', 'correct' => ['un', 'libro', 'y', 'una', 'mesa'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Ein Buch und ein Tisch', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Tisch'], 'extra' => ['Katze']],
                            'ja' => ['sentence' => '本とテーブル', 'correct' => ['本', 'と', 'テーブル'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '책과 탁자', 'correct' => ['책과', '탁자'], 'extra' => ['고양이']],
                            'tr' => ['sentence' => 'bir kitap ve bir masa', 'correct' => ['bir', 'kitap', 've', 'bir', 'masa'], 'extra' => ['kedi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Le & La', 2,
                pictures: [['fr' => 'Chat', 'img' => 'cat'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Le'], ['fr' => 'La']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'chat'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The cat', 'correct' => ['the', 'cat'], 'extra' => ['house', 'dog']],
                            'az' => ['sentence' => 'pişik', 'correct' => ['pişik'], 'extra' => ['ev', 'it']],
                            'ar' => ['sentence' => 'قط', 'correct' => ['قط'], 'extra' => ['بيت', 'كلب']],
                            'ru' => ['sentence' => 'кот', 'correct' => ['кот'], 'extra' => ['дом', 'собака']],
                            'es' => ['sentence' => 'El gato', 'correct' => ['el', 'gato'], 'extra' => ['casa', 'perro']],
                            'de' => ['sentence' => 'Die Katze', 'correct' => ['die', 'Katze'], 'extra' => ['Haus', 'Hund']],
                            'ja' => ['sentence' => '猫', 'correct' => ['猫'], 'extra' => ['家', '犬']],
                            'ko' => ['sentence' => '고양이', 'correct' => ['고양이'], 'extra' => ['집', '개']],
                            'tr' => ['sentence' => 'kedi', 'correct' => ['kedi'], 'extra' => ['ev', 'köpek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The house', 'correct' => ['the', 'house'], 'extra' => ['cat', 'book']],
                            'az' => ['sentence' => 'ev', 'correct' => ['ev'], 'extra' => ['pişik', 'kitab']],
                            'ar' => ['sentence' => 'بيت', 'correct' => ['بيت'], 'extra' => ['قط', 'كتاب']],
                            'ru' => ['sentence' => 'дом', 'correct' => ['дом'], 'extra' => ['кот', 'книга']],
                            'es' => ['sentence' => 'La casa', 'correct' => ['la', 'casa'], 'extra' => ['gato', 'libro']],
                            'de' => ['sentence' => 'Das Haus', 'correct' => ['das', 'Haus'], 'extra' => ['Katze', 'Buch']],
                            'ja' => ['sentence' => '家', 'correct' => ['家'], 'extra' => ['猫', '本']],
                            'ko' => ['sentence' => '집', 'correct' => ['집'], 'extra' => ['고양이', '책']],
                            'tr' => ['sentence' => 'ev', 'correct' => ['ev'], 'extra' => ['kedi', 'kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'chat', 'et', 'la', 'maison'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The cat and the house', 'correct' => ['the', 'cat', 'and', 'the', 'house'], 'extra' => ['dog']],
                            'az' => ['sentence' => 'pişik və ev', 'correct' => ['pişik', 'və', 'ev'], 'extra' => ['it']],
                            'ar' => ['sentence' => 'قط و بيت', 'correct' => ['قط', 'و', 'بيت'], 'extra' => ['كلب']],
                            'ru' => ['sentence' => 'кот и дом', 'correct' => ['кот', 'и', 'дом'], 'extra' => ['собака']],
                            'es' => ['sentence' => 'El gato y la casa', 'correct' => ['el', 'gato', 'y', 'la', 'casa'], 'extra' => ['perro']],
                            'de' => ['sentence' => 'Die Katze und das Haus', 'correct' => ['die', 'Katze', 'und', 'das', 'Haus'], 'extra' => ['Hund']],
                            'ja' => ['sentence' => '猫と家', 'correct' => ['猫', 'と', '家'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '고양이와 집', 'correct' => ['고양이와', '집'], 'extra' => ['개']],
                            'tr' => ['sentence' => 'kedi ve ev', 'correct' => ['kedi', 've', 'ev'], 'extra' => ['köpek']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Les & Des', 3,
                pictures: [['fr' => 'Chien', 'img' => 'dog'], ['fr' => 'Livre', 'img' => 'book']],
                plain: [['fr' => 'Les'], ['fr' => 'Des']],
                phrases: [
                    // Singular then plural in the same phrase: that contrast IS
                    // the lesson, and it keeps the singular picture word in use.
                    'a' => [
                        'words' => ['un', 'livre', 'et', 'les', 'livres'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A book and the books', 'correct' => ['a', 'book', 'and', 'the', 'books'], 'extra' => ['dogs']],
                            'az' => ['sentence' => 'bir kitab və kitablar', 'correct' => ['bir', 'kitab', 'və', 'kitablar'], 'extra' => ['itlər']],
                            'ar' => ['sentence' => 'كتاب و كتب', 'correct' => ['كتاب', 'و', 'كتب'], 'extra' => ['كلاب']],
                            'ru' => ['sentence' => 'книга и книги', 'correct' => ['книга', 'и', 'книги'], 'extra' => ['собаки']],
                            'es' => ['sentence' => 'Un libro y los libros', 'correct' => ['un', 'libro', 'y', 'los', 'libros'], 'extra' => ['perros']],
                            'de' => ['sentence' => 'Ein Buch und die Bücher', 'correct' => ['ein', 'Buch', 'und', 'die', 'Bücher'], 'extra' => ['Hunde']],
                            'ja' => ['sentence' => '一冊の本と複数の本', 'correct' => ['一冊', 'の', '本', 'と', '複数', 'の', '本'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '한 권의 책과 책들', 'correct' => ['한', '권의', '책과', '책들'], 'extra' => ['개들']],
                            'tr' => ['sentence' => 'bir kitap ve kitaplar', 'correct' => ['bir', 'kitap', 've', 'kitaplar'], 'extra' => ['köpekler']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'chien', 'et', 'des', 'chiens'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A dog and some dogs', 'correct' => ['a', 'dog', 'and', 'some', 'dogs'], 'extra' => ['books']],
                            'az' => ['sentence' => 'bir it və bir az itlər', 'correct' => ['bir', 'it', 'və', 'bir az', 'itlər'], 'extra' => ['kitablar']],
                            'ar' => ['sentence' => 'كلب و بعض كلاب', 'correct' => ['كلب', 'و', 'بعض', 'كلاب'], 'extra' => ['كتب']],
                            'ru' => ['sentence' => 'собака и немного собаки', 'correct' => ['собака', 'и', 'немного', 'собаки'], 'extra' => ['книги']],
                            'es' => ['sentence' => 'Un perro y unos perros', 'correct' => ['un', 'perro', 'y', 'unos', 'perros'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Ein Hund und einige Hunde', 'correct' => ['ein', 'Hund', 'und', 'einige', 'Hunde'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '一匹の犬と何匹かの犬', 'correct' => ['一匹', 'の', '犬', 'と', '何匹', 'か', 'の', '犬'], 'extra' => ['本']],
                            'ko' => ['sentence' => '한 마리의 개와 몇몇 개들', 'correct' => ['한', '마리의', '개와', '몇몇', '개들'], 'extra' => ['책들']],
                            'tr' => ['sentence' => 'bir köpek ve bazı köpekler', 'correct' => ['bir', 'köpek', 've', 'bazı', 'köpekler'], 'extra' => ['kitaplar']],
                        ],
                    ],
                    'c' => [
                        'words' => ['les', 'livres', 'et', 'des', 'chiens'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The books and some dogs', 'correct' => ['the', 'books', 'and', 'some', 'dogs'], 'extra' => ['cats']],
                            'az' => ['sentence' => 'kitablar və bir az itlər', 'correct' => ['kitablar', 'və', 'bir az', 'itlər'], 'extra' => ['pişiklər']],
                            'ar' => ['sentence' => 'كتب و بعض كلاب', 'correct' => ['كتب', 'و', 'بعض', 'كلاب'], 'extra' => ['قطط']],
                            'ru' => ['sentence' => 'книги и немного собаки', 'correct' => ['книги', 'и', 'немного', 'собаки'], 'extra' => ['коты']],
                            'es' => ['sentence' => 'Los libros y unos perros', 'correct' => ['los', 'libros', 'y', 'unos', 'perros'], 'extra' => ['gatos']],
                            'de' => ['sentence' => 'Die Bücher und einige Hunde', 'correct' => ['die', 'Bücher', 'und', 'einige', 'Hunde'], 'extra' => ['Katzen']],
                            'ja' => ['sentence' => '本といくつかの犬', 'correct' => ['本', 'と', 'いくつか', 'の', '犬'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '책들과 몇몇 개들', 'correct' => ['책들과', '몇몇', '개들'], 'extra' => ['고양이들']],
                            'tr' => ['sentence' => 'kitaplar ve bazı köpekler', 'correct' => ['kitaplar', 've', 'bazı', 'köpekler'], 'extra' => ['kediler']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Ce & Cette', 4,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Table', 'img' => 'table']],
                plain: [['fr' => 'Ce'], ['fr' => 'Cette']],
                phrases: [
                    'a' => [
                        'words' => ['ce', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'This coffee', 'correct' => ['this', 'coffee'], 'extra' => ['table', 'book']],
                            'az' => ['sentence' => 'bu qəhvə', 'correct' => ['bu', 'qəhvə'], 'extra' => ['masa', 'kitab']],
                            'ar' => ['sentence' => 'هذا قهوة', 'correct' => ['هذا', 'قهوة'], 'extra' => ['طاولة', 'كتاب']],
                            'ru' => ['sentence' => 'это кофе', 'correct' => ['это', 'кофе'], 'extra' => ['стол', 'книга']],
                            'es' => ['sentence' => 'Este café', 'correct' => ['este', 'café'], 'extra' => ['mesa', 'libro']],
                            'de' => ['sentence' => 'Dieser Kaffee', 'correct' => ['dieser', 'Kaffee'], 'extra' => ['Tisch', 'Buch']],
                            'ja' => ['sentence' => 'このコーヒー', 'correct' => ['この', 'コーヒー'], 'extra' => ['テーブル', '本']],
                            'ko' => ['sentence' => '이 커피', 'correct' => ['이', '커피'], 'extra' => ['탁자', '책']],
                            'tr' => ['sentence' => 'bu kahve', 'correct' => ['bu', 'kahve'], 'extra' => ['masa', 'kitap']],
                        ],
                    ],
                    'b' => [
                        'words' => ['cette', 'table'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'This table', 'correct' => ['this', 'table'], 'extra' => ['coffee', 'cat']],
                            'az' => ['sentence' => 'bu masa', 'correct' => ['bu', 'masa'], 'extra' => ['qəhvə', 'pişik']],
                            'ar' => ['sentence' => 'هذا طاولة', 'correct' => ['هذا', 'طاولة'], 'extra' => ['قهوة', 'قط']],
                            'ru' => ['sentence' => 'это стол', 'correct' => ['это', 'стол'], 'extra' => ['кофе', 'кот']],
                            'es' => ['sentence' => 'Esta mesa', 'correct' => ['esta', 'mesa'], 'extra' => ['café', 'gato']],
                            'de' => ['sentence' => 'Dieser Tisch', 'correct' => ['dieser', 'Tisch'], 'extra' => ['Kaffee', 'Katze']],
                            'ja' => ['sentence' => 'このテーブル', 'correct' => ['この', 'テーブル'], 'extra' => ['コーヒー', '猫']],
                            'ko' => ['sentence' => '이 탁자', 'correct' => ['이', '탁자'], 'extra' => ['커피', '고양이']],
                            'tr' => ['sentence' => 'bu masa', 'correct' => ['bu', 'masa'], 'extra' => ['kahve', 'kedi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ce', 'café', 'et', 'cette', 'table'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'This coffee and this table', 'correct' => ['this', 'coffee', 'and', 'this', 'table'], 'extra' => ['book']],
                            'az' => ['sentence' => 'bu qəhvə və bu masa', 'correct' => ['bu', 'qəhvə', 'və', 'bu', 'masa'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'هذا قهوة و هذا طاولة', 'correct' => ['هذا', 'قهوة', 'و', 'هذا', 'طاولة'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'это кофе и это стол', 'correct' => ['это', 'кофе', 'и', 'это', 'стол'], 'extra' => ['книга']],
                            'es' => ['sentence' => 'Este café y esta mesa', 'correct' => ['este', 'café', 'y', 'esta', 'mesa'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Dieser Kaffee und dieser Tisch', 'correct' => ['dieser', 'Kaffee', 'und', 'dieser', 'Tisch'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => 'このコーヒーとこのテーブル', 'correct' => ['この', 'コーヒー', 'と', 'この', 'テーブル'], 'extra' => ['本']],
                            'ko' => ['sentence' => '이 커피와 이 탁자', 'correct' => ['이', '커피와', '이', '탁자'], 'extra' => ['책']],
                            'tr' => ['sentence' => 'bu kahve ve bu masa', 'correct' => ['bu', 'kahve', 've', 'bu', 'masa'], 'extra' => ['kitap']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Mes & Ces', 5,
                pictures: [['fr' => 'Chat', 'img' => 'cat'], ['fr' => 'Livre', 'img' => 'book']],
                plain: [['fr' => 'Mes'], ['fr' => 'Ces']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'livre', 'et', 'mes', 'livres'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A book and my books', 'correct' => ['a', 'book', 'and', 'my', 'books'], 'extra' => ['cats']],
                            'az' => ['sentence' => 'bir kitab və mənim kitablar', 'correct' => ['bir', 'kitab', 'və', 'mənim', 'kitablar'], 'extra' => ['pişiklər']],
                            'ar' => ['sentence' => 'كتاب و كتب', 'correct' => ['كتاب', 'و', 'كتب'], 'extra' => ['قطط']],
                            'ru' => ['sentence' => 'книга и мой книги', 'correct' => ['книга', 'и', 'мой', 'книги'], 'extra' => ['коты']],
                            'es' => ['sentence' => 'Un libro y mis libros', 'correct' => ['un', 'libro', 'y', 'mis', 'libros'], 'extra' => ['gatos']],
                            'de' => ['sentence' => 'Ein Buch und meine Bücher', 'correct' => ['ein', 'Buch', 'und', 'meine', 'Bücher'], 'extra' => ['Katzen']],
                            'ja' => ['sentence' => '一冊の本と私の本', 'correct' => ['一冊', 'の', '本', 'と', '私の', '本'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '한 권의 책과 나의 책들', 'correct' => ['한', '권의', '책과', '나의', '책들'], 'extra' => ['고양이들']],
                            'tr' => ['sentence' => 'bir kitap ve kitaplarım', 'correct' => ['bir', 'kitap', 've', 'kitaplarım'], 'extra' => ['kediler']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'chat', 'et', 'ces', 'chats'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A cat and these cats', 'correct' => ['a', 'cat', 'and', 'these', 'cats'], 'extra' => ['books']],
                            'az' => ['sentence' => 'bir pişik və bunlar pişiklər', 'correct' => ['bir', 'pişik', 'və', 'bunlar', 'pişiklər'], 'extra' => ['kitablar']],
                            'ar' => ['sentence' => 'قط و هذه قطط', 'correct' => ['قط', 'و', 'هذه', 'قطط'], 'extra' => ['كتب']],
                            'ru' => ['sentence' => 'кот и эти коты', 'correct' => ['кот', 'и', 'эти', 'коты'], 'extra' => ['книги']],
                            'es' => ['sentence' => 'Un gato y estos gatos', 'correct' => ['un', 'gato', 'y', 'estos', 'gatos'], 'extra' => ['libros']],
                            'de' => ['sentence' => 'Eine Katze und diese Katzen', 'correct' => ['eine', 'Katze', 'und', 'diese', 'Katzen'], 'extra' => ['Bücher']],
                            'ja' => ['sentence' => '一匹の猫とこれらの猫', 'correct' => ['一匹', 'の', '猫', 'と', 'これらの', '猫'], 'extra' => ['本']],
                            'ko' => ['sentence' => '한 마리의 고양이와 이 고양이들', 'correct' => ['한', '마리의', '고양이와', '이', '고양이들'], 'extra' => ['책들']],
                            'tr' => ['sentence' => 'bir kedi ve bu kediler', 'correct' => ['bir', 'kedi', 've', 'bu', 'kediler'], 'extra' => ['kitaplar']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mes', 'livres', 'et', 'ces', 'chats'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My books and these cats', 'correct' => ['my', 'books', 'and', 'these', 'cats'], 'extra' => ['dogs']],
                            'az' => ['sentence' => 'mənim kitablar və bunlar pişiklər', 'correct' => ['mənim', 'kitablar', 'və', 'bunlar', 'pişiklər'], 'extra' => ['itlər']],
                            'ar' => ['sentence' => 'كتب و هذه قطط', 'correct' => ['كتب', 'و', 'هذه', 'قطط'], 'extra' => ['كلاب']],
                            'ru' => ['sentence' => 'мой книги и эти коты', 'correct' => ['мой', 'книги', 'и', 'эти', 'коты'], 'extra' => ['собаки']],
                            'es' => ['sentence' => 'Mis libros y estos gatos', 'correct' => ['mis', 'libros', 'y', 'estos', 'gatos'], 'extra' => ['perros']],
                            'de' => ['sentence' => 'Meine Bücher und diese Katzen', 'correct' => ['meine', 'Bücher', 'und', 'diese', 'Katzen'], 'extra' => ['Hunde']],
                            'ja' => ['sentence' => '私の本とこれらの猫', 'correct' => ['私の', '本', 'と', 'これらの', '猫'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '나의 책들과 이 고양이들', 'correct' => ['나의', '책들과', '이', '고양이들'], 'extra' => ['개들']],
                            'tr' => ['sentence' => 'kitaplarım ve bu kediler', 'correct' => ['kitaplarım', 've', 'bu', 'kediler'], 'extra' => ['köpekler']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
