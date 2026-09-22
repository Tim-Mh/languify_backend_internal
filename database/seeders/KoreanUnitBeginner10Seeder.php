<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner10Seeder extends Seeder
{
    private const PICTURES = ['책' => 'book', '사과' => 'apple', '고양이' => 'cat', '개' => 'dog', '집' => 'house'];

    /**
     * Korean Chapter 1 (Beginner), Unit 10, the Korean twin of the English
     * "Unit 10: A, The, This & These" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, '유닛 10: 관사와 지시어', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 책 · 사과', 1,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '하나의'], ['ko' => '하나의']],
                phrases: [
                    'a' => [
                        'words' => ['책', '하나'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a book', 'correct' => ['a', 'book'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'bir kitab', 'correct' => ['bir', 'kitab'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'كتاب', 'correct' => ['كتاب'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'книга', 'correct' => ['книга'], 'extra' => ['яблоко']],
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['Apfel']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['pomme']],
                            'ja' => ['sentence' => '一冊の本', 'correct' => ['一冊', 'の', '本'], 'extra' => ['りんご']],
                            'tr' => ['sentence' => 'bir kitap', 'correct' => ['bir', 'kitap'], 'extra' => ['elma']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과', '하나'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'an apple', 'correct' => ['an', 'apple'], 'extra' => ['book']],
                            'az' => ['sentence' => 'bir alma', 'correct' => ['bir', 'alma'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'تفاحة', 'correct' => ['تفاحة'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'яблоко', 'correct' => ['яблоко'], 'extra' => ['книга']],
                            'es' => ['sentence' => 'Una manzana', 'correct' => ['un', 'manzana'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Ein Apfel', 'correct' => ['ein', 'Apfel'], 'extra' => ['Buch']],
                            'fr' => ['sentence' => 'Une pomme', 'correct' => ['un', 'pomme'], 'extra' => ['livre']],
                            'ja' => ['sentence' => '一つのりんご', 'correct' => ['一つの', 'りんご'], 'extra' => ['本']],
                            'tr' => ['sentence' => 'bir elma', 'correct' => ['bir', 'elma'], 'extra' => ['kitap']],
                        ],
                    ],
                    'c' => [
                        'words' => ['책과', '사과'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a book and an apple', 'correct' => ['a', 'book', 'and', 'an', 'apple'], 'extra' => ['cat']],
                            'az' => ['sentence' => 'bir kitab və bir alma', 'correct' => ['bir', 'kitab', 'və', 'bir', 'alma'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'كتاب و تفاحة', 'correct' => ['كتاب', 'و', 'تفاحة'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'книга и яблоко', 'correct' => ['книга', 'и', 'яблоко'], 'extra' => ['кот']],
                            'es' => ['sentence' => 'Un libro y una manzana', 'correct' => ['un', 'libro', 'y', 'un', 'manzana'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Ein Buch und ein Apfel', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Apfel'], 'extra' => ['Katze']],
                            'fr' => ['sentence' => 'Un livre et une pomme', 'correct' => ['un', 'livre', 'et', 'un', 'pomme'], 'extra' => ['chat']],
                            'ja' => ['sentence' => '本とりんご', 'correct' => ['本', 'と', 'りんご'], 'extra' => ['猫']],
                            'tr' => ['sentence' => 'bir kitap ve bir elma', 'correct' => ['bir', 'kitap', 've', 'bir', 'elma'], 'extra' => ['kedi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 고양이 · 개', 2,
                pictures: [['ko' => '고양이', 'img' => 'cat'], ['ko' => '개', 'img' => 'dog']],
                plain: [['ko' => '그'], ['ko' => '약간의']],
                phrases: [
                    'a' => [
                        'words' => ['그', '고양이'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the cat', 'correct' => ['the', 'cat'], 'extra' => ['dog']],
                            'az' => ['sentence' => 'pişik', 'correct' => ['pişik'], 'extra' => ['it']],
                            'ar' => ['sentence' => 'قط', 'correct' => ['قط'], 'extra' => ['كلب']],
                            'ru' => ['sentence' => 'кот', 'correct' => ['кот'], 'extra' => ['собака']],
                            'es' => ['sentence' => 'El gato', 'correct' => ['el', 'gato'], 'extra' => ['perro', 'algo de']],
                            'de' => ['sentence' => 'Die Katze', 'correct' => ['der', 'Katze'], 'extra' => ['Hund', 'etwas']],
                            'fr' => ['sentence' => 'Le chat', 'correct' => ['le', 'chat'], 'extra' => ['chien', 'du']],
                            'ja' => ['sentence' => 'その猫', 'correct' => ['その', '猫'], 'extra' => ['犬']],
                            'tr' => ['sentence' => 'kedi', 'correct' => ['kedi'], 'extra' => ['köpek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['약간의', '물'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'some water', 'correct' => ['some', 'water'], 'extra' => ['the']],
                            'az' => ['sentence' => 'bir az su', 'correct' => ['bir az', 'su'], 'extra' => []],
                            'ar' => ['sentence' => 'بعض ماء', 'correct' => ['بعض', 'ماء'], 'extra' => []],
                            'ru' => ['sentence' => 'немного вода', 'correct' => ['немного', 'вода'], 'extra' => []],
                            'es' => ['sentence' => 'Algo de agua', 'correct' => ['algo de', 'agua'], 'extra' => ['el', 'gato']],
                            'de' => ['sentence' => 'Etwas Wasser', 'correct' => ['etwas', 'Wasser'], 'extra' => ['der', 'Katze']],
                            'fr' => ['sentence' => 'De l\'eau', 'correct' => ['du', 'eau'], 'extra' => ['le', 'chat']],
                            'ja' => ['sentence' => '少しの水', 'correct' => ['少しの', '水'], 'extra' => ['その']],
                            'tr' => ['sentence' => 'biraz su', 'correct' => ['biraz', 'su'], 'extra' => ['o']],
                        ],
                    ],
                    'c' => [
                        'words' => ['개와', '고양이'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the dog and the cat', 'correct' => ['the', 'dog', 'and', 'the', 'cat'], 'extra' => ['some']],
                            'az' => ['sentence' => 'it və pişik', 'correct' => ['it', 'və', 'pişik'], 'extra' => ['bir az']],
                            'ar' => ['sentence' => 'كلب و قط', 'correct' => ['كلب', 'و', 'قط'], 'extra' => ['بعض']],
                            'ru' => ['sentence' => 'собака и кот', 'correct' => ['собака', 'и', 'кот'], 'extra' => ['немного']],
                            'es' => ['sentence' => 'El perro y el gato', 'correct' => ['el', 'perro', 'y', 'el', 'gato'], 'extra' => ['algo de']],
                            'de' => ['sentence' => 'Der Hund und die Katze', 'correct' => ['der', 'Hund', 'und', 'der', 'Katze'], 'extra' => ['etwas']],
                            'fr' => ['sentence' => 'Le chien et le chat', 'correct' => ['le', 'chien', 'et', 'le', 'chat'], 'extra' => ['du']],
                            'ja' => ['sentence' => '犬と猫', 'correct' => ['犬', 'と', '猫'], 'extra' => ['少しの']],
                            'tr' => ['sentence' => 'köpek ve kedi', 'correct' => ['köpek', 've', 'kedi'], 'extra' => ['biraz']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 고양이 · 책', 3,
                pictures: [['ko' => '고양이', 'img' => 'cat'], ['ko' => '책', 'img' => 'book']],
                plain: [['ko' => '고양이들'], ['ko' => '책들']],
                phrases: [
                    'a' => [
                        'words' => ['고양이', '두', '마리'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'two cats', 'correct' => ['two', 'cats'], 'extra' => ['books']],
                            'az' => ['sentence' => 'iki pişiklər', 'correct' => ['iki', 'pişiklər'], 'extra' => ['kitablar']],
                            'ar' => ['sentence' => 'اثنان قطط', 'correct' => ['اثنان', 'قطط'], 'extra' => ['كتب']],
                            'ru' => ['sentence' => 'два коты', 'correct' => ['два', 'коты'], 'extra' => ['книги']],
                            'es' => ['sentence' => 'Dos gatos', 'correct' => ['dos', 'gatos'], 'extra' => ['libros', 'uno']],
                            'de' => ['sentence' => 'Zwei Katzen', 'correct' => ['zwei', 'Katzen'], 'extra' => ['Bücher', 'eins']],
                            'fr' => ['sentence' => 'Deux chats', 'correct' => ['deux', 'chats'], 'extra' => ['livres', 'un']],
                            'ja' => ['sentence' => '猫二匹', 'correct' => ['猫', '二匹'], 'extra' => ['本']],
                            'tr' => ['sentence' => 'iki kedi', 'correct' => ['iki', 'kedi'], 'extra' => ['kitaplar']],
                        ],
                    ],
                    'b' => [
                        'words' => ['책', '세', '권'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'three books', 'correct' => ['three', 'books'], 'extra' => ['cats']],
                            'az' => ['sentence' => 'üç kitablar', 'correct' => ['üç', 'kitablar'], 'extra' => ['pişiklər']],
                            'ar' => ['sentence' => 'ثلاثة كتب', 'correct' => ['ثلاثة', 'كتب'], 'extra' => ['قطط']],
                            'ru' => ['sentence' => 'три книги', 'correct' => ['три', 'книги'], 'extra' => ['коты']],
                            'es' => ['sentence' => 'Tres libros', 'correct' => ['tres', 'libros'], 'extra' => ['gatos', 'dos']],
                            'de' => ['sentence' => 'Drei Bücher', 'correct' => ['drei', 'Bücher'], 'extra' => ['Katzen', 'zwei']],
                            'fr' => ['sentence' => 'Trois livres', 'correct' => ['trois', 'livres'], 'extra' => ['chats', 'deux']],
                            'ja' => ['sentence' => '本三冊', 'correct' => ['本', '三冊'], 'extra' => ['猫']],
                            'tr' => ['sentence' => 'üç kitap', 'correct' => ['üç', 'kitap'], 'extra' => ['kediler']],
                        ],
                    ],
                    'c' => [
                        'words' => ['고양이와', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a cat and a book', 'correct' => ['a', 'cat', 'and', 'a', 'book'], 'extra' => ['cats']],
                            'az' => ['sentence' => 'bir pişik və bir kitab', 'correct' => ['bir', 'pişik', 'və', 'bir', 'kitab'], 'extra' => ['pişiklər']],
                            'ar' => ['sentence' => 'قط و كتاب', 'correct' => ['قط', 'و', 'كتاب'], 'extra' => ['قطط']],
                            'ru' => ['sentence' => 'кот и книга', 'correct' => ['кот', 'и', 'книга'], 'extra' => ['коты']],
                            'es' => ['sentence' => 'Un gato y un libro', 'correct' => ['un', 'gato', 'y', 'un', 'libro'], 'extra' => ['gatos']],
                            'de' => ['sentence' => 'Eine Katze und ein Buch', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Buch'], 'extra' => ['Katzen']],
                            'fr' => ['sentence' => 'Un chat et un livre', 'correct' => ['un', 'chat', 'et', 'un', 'livre'], 'extra' => ['chats']],
                            'ja' => ['sentence' => '猫と本', 'correct' => ['猫', 'と', '本'], 'extra' => ['二']],
                            'tr' => ['sentence' => 'bir kedi ve bir kitap', 'correct' => ['bir', 'kedi', 've', 'bir', 'kitap'], 'extra' => ['kediler']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 책 · 집', 4,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '이'], ['ko' => '저']],
                phrases: [
                    'a' => [
                        'words' => ['이', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'this book', 'correct' => ['this', 'book'], 'extra' => ['me']],
                            'az' => ['sentence' => 'bu kitab', 'correct' => ['bu', 'kitab'], 'extra' => ['mənə']],
                            'ar' => ['sentence' => 'هذا كتاب', 'correct' => ['هذا', 'كتاب'], 'extra' => ['لي']],
                            'ru' => ['sentence' => 'это книга', 'correct' => ['это', 'книга'], 'extra' => ['меня']],
                            'es' => ['sentence' => 'Este libro', 'correct' => ['este', 'libro'], 'extra' => ['ese', 'casa']],
                            'de' => ['sentence' => 'Dieses Buch', 'correct' => ['dieser', 'Buch'], 'extra' => ['jener', 'Haus']],
                            'fr' => ['sentence' => 'Ce livre', 'correct' => ['ce', 'livre'], 'extra' => ['cette', 'maison']],
                            'ja' => ['sentence' => 'この本', 'correct' => ['この', '本'], 'extra' => ['あの']],
                            'tr' => ['sentence' => 'bu kitap', 'correct' => ['bu', 'kitap'], 'extra' => ['ben']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'that house', 'correct' => ['that', 'house'], 'extra' => ['this']],
                            'az' => ['sentence' => 'o ev', 'correct' => ['o', 'ev'], 'extra' => ['bu']],
                            'ar' => ['sentence' => 'ذلك بيت', 'correct' => ['ذلك', 'بيت'], 'extra' => ['هذا']],
                            'ru' => ['sentence' => 'тот дом', 'correct' => ['тот', 'дом'], 'extra' => ['это']],
                            'es' => ['sentence' => 'Esa casa', 'correct' => ['ese', 'casa'], 'extra' => ['este', 'libro']],
                            'de' => ['sentence' => 'Jenes Haus', 'correct' => ['jener', 'Haus'], 'extra' => ['dieser', 'Buch']],
                            'fr' => ['sentence' => 'Cette maison', 'correct' => ['cette', 'maison'], 'extra' => ['ce', 'livre']],
                            'ja' => ['sentence' => 'あの家', 'correct' => ['あの', '家'], 'extra' => ['この']],
                            'tr' => ['sentence' => 'o ev', 'correct' => ['o', 'ev'], 'extra' => ['bu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['이', '책과', '저', '집'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'this book and that house', 'correct' => ['this', 'book', 'and', 'that', 'house'], 'extra' => ['cat']],
                            'az' => ['sentence' => 'bu kitab və o ev', 'correct' => ['bu', 'kitab', 'və', 'o', 'ev'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'هذا كتاب و ذلك بيت', 'correct' => ['هذا', 'كتاب', 'و', 'ذلك', 'بيت'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'это книга и тот дом', 'correct' => ['это', 'книга', 'и', 'тот', 'дом'], 'extra' => ['кот']],
                            'es' => ['sentence' => 'Este libro y esa casa', 'correct' => ['este', 'libro', 'y', 'ese', 'casa'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Dieses Buch und jenes Haus', 'correct' => ['dieser', 'Buch', 'und', 'jener', 'Haus'], 'extra' => ['Katze']],
                            'fr' => ['sentence' => 'Ce livre et cette maison', 'correct' => ['ce', 'livre', 'et', 'cette', 'maison'], 'extra' => ['chat']],
                            'ja' => ['sentence' => 'この本とあの家', 'correct' => ['この', '本', 'と', 'あの', '家'], 'extra' => ['猫']],
                            'tr' => ['sentence' => 'bu kitap ve o ev', 'correct' => ['bu', 'kitap', 've', 'o', 'ev'], 'extra' => ['kedi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 고양이 · 개', 5,
                pictures: [['ko' => '고양이', 'img' => 'cat'], ['ko' => '개', 'img' => 'dog']],
                plain: [['ko' => '이것들'], ['ko' => '저것들']],
                phrases: [
                    'a' => [
                        'words' => ['이', '고양이들'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'these cats', 'correct' => ['these', 'cats'], 'extra' => ['those']],
                            'az' => ['sentence' => 'bunlar pişiklər', 'correct' => ['bunlar', 'pişiklər'], 'extra' => ['onlar']],
                            'ar' => ['sentence' => 'هذه قطط', 'correct' => ['هذه', 'قطط'], 'extra' => ['تلك']],
                            'ru' => ['sentence' => 'эти коты', 'correct' => ['эти', 'коты'], 'extra' => ['те']],
                            'es' => ['sentence' => 'Estos gatos', 'correct' => ['estos', 'gatos'], 'extra' => ['esos', 'perros']],
                            'de' => ['sentence' => 'Diese Katzen', 'correct' => ['diese', 'Katzen'], 'extra' => ['jene', 'Hunde']],
                            'fr' => ['sentence' => 'Ces chats', 'correct' => ['ces', 'chats'], 'extra' => ['chiens']],
                            'ja' => ['sentence' => 'これらの猫', 'correct' => ['これらの', '猫'], 'extra' => ['あれらの']],
                            'tr' => ['sentence' => 'bu kediler', 'correct' => ['bu', 'kediler'], 'extra' => ['onlar']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저', '개들'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'those dogs', 'correct' => ['those', 'dogs'], 'extra' => ['these']],
                            'az' => ['sentence' => 'onlar itlər', 'correct' => ['onlar', 'itlər'], 'extra' => ['bunlar']],
                            'ar' => ['sentence' => 'تلك كلاب', 'correct' => ['تلك', 'كلاب'], 'extra' => ['هذه']],
                            'ru' => ['sentence' => 'те собаки', 'correct' => ['те', 'собаки'], 'extra' => ['эти']],
                            'es' => ['sentence' => 'Esos perros', 'correct' => ['esos', 'perros'], 'extra' => ['estos', 'gatos']],
                            'de' => ['sentence' => 'Jene Hunde', 'correct' => ['jene', 'Hunde'], 'extra' => ['diese', 'Katzen']],
                            'fr' => ['sentence' => 'Ces chiens', 'correct' => ['ces', 'chiens'], 'extra' => ['chats']],
                            'ja' => ['sentence' => 'あれらの犬', 'correct' => ['あれらの', '犬'], 'extra' => ['これらの']],
                            'tr' => ['sentence' => 'o köpekler', 'correct' => ['o', 'köpekler'], 'extra' => ['bunlar']],
                        ],
                    ],
                    'c' => [
                        'words' => ['고양이와', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a cat and a dog', 'correct' => ['a', 'cat', 'and', 'a', 'dog'], 'extra' => ['these']],
                            'az' => ['sentence' => 'bir pişik və bir it', 'correct' => ['bir', 'pişik', 'və', 'bir', 'it'], 'extra' => ['bunlar']],
                            'ar' => ['sentence' => 'قط و كلب', 'correct' => ['قط', 'و', 'كلب'], 'extra' => ['هذه']],
                            'ru' => ['sentence' => 'кот и собака', 'correct' => ['кот', 'и', 'собака'], 'extra' => ['эти']],
                            'es' => ['sentence' => 'Un gato y un perro', 'correct' => ['un', 'gato', 'y', 'un', 'perro'], 'extra' => ['estos']],
                            'de' => ['sentence' => 'Eine Katze und ein Hund', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Hund'], 'extra' => ['diese']],
                            'fr' => ['sentence' => 'Un chat et un chien', 'correct' => ['un', 'chat', 'et', 'un', 'chien'], 'extra' => ['ces']],
                            'ja' => ['sentence' => '猫と犬', 'correct' => ['猫', 'と', '犬'], 'extra' => ['これらの']],
                            'tr' => ['sentence' => 'bir kedi ve bir köpek', 'correct' => ['bir', 'kedi', 've', 'bir', 'köpek'], 'extra' => ['bunlar']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
