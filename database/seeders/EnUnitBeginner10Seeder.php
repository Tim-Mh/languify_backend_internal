<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner10Seeder extends Seeder
{
    private const PICTURES = [
        'Book' => 'book', 'Apple' => 'apple', 'Cat' => 'cat', 'Dog' => 'dog',
        'House' => 'house', 'Table' => 'table',
    ];

    /**
     * English Chapter 1, Unit 10 — the small grammar words.
     *
     * The chapter closes on the articles and demonstratives that English hangs
     * on every noun: a/an, the, some, this/that, these/those, and the regular
     * plural -s. Each is taught on the concrete nouns the learner already owns
     * from earlier units, so only the grammar is new.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: A, The, This & These', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A & An', 1,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'A'], ['en' => 'An']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'book'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro', 'correct' => ['un', 'libro'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ein Buch', 'correct' => ['ein', 'Buch'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => '一冊の本', 'correct' => ['一冊', 'の', '本'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '책 하나', 'correct' => ['책', '하나'], 'extra' => ['사과']],
                            'fr' => ['sentence' => 'Un livre', 'correct' => ['un', 'livre'], 'extra' => ['pomme']],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'apple'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Una manzana', 'correct' => ['un', 'manzana'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Ein Apfel', 'correct' => ['ein', 'Apfel'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '一つのりんご', 'correct' => ['一つの', 'りんご'], 'extra' => ['本']],
                            'ko' => ['sentence' => '사과 하나', 'correct' => ['사과', '하나'], 'extra' => ['책']],
                            'fr' => ['sentence' => 'Une pomme', 'correct' => ['un', 'pomme'], 'extra' => ['livre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'book', 'and', 'an', 'apple'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro y una manzana', 'correct' => ['un', 'libro', 'y', 'un', 'manzana'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Ein Buch und ein Apfel', 'correct' => ['ein', 'Buch', 'und', 'ein', 'Apfel'], 'extra' => ['Katze']],
                            'ja' => ['sentence' => '本とりんご', 'correct' => ['本', 'と', 'りんご'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '책과 사과', 'correct' => ['책과', '사과'], 'extra' => ['고양이']],
                            'fr' => ['sentence' => 'Un livre et une pomme', 'correct' => ['un', 'livre', 'et', 'un', 'pomme'], 'extra' => ['chat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: The & Some', 2,
                pictures: [['en' => 'Cat', 'img' => 'cat'], ['en' => 'Dog', 'img' => 'dog']],
                plain: [['en' => 'The'], ['en' => 'Some']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'cat'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'El gato', 'correct' => ['el', 'gato'], 'extra' => ['perro', 'algo de']],
                            'de' => ['sentence' => 'Die Katze', 'correct' => ['der', 'Katze'], 'extra' => ['Hund', 'etwas']],
                            'ja' => ['sentence' => 'その猫', 'correct' => ['その', '猫'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '그 고양이', 'correct' => ['그', '고양이'], 'extra' => ['개']],
                            'fr' => ['sentence' => 'Le chat', 'correct' => ['le', 'chat'], 'extra' => ['chien', 'du']],
                        ],
                    ],
                    'b' => [
                        'words' => ['some', 'water'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Algo de agua', 'correct' => ['algo de', 'agua'], 'extra' => ['el', 'gato']],
                            'de' => ['sentence' => 'Etwas Wasser', 'correct' => ['etwas', 'Wasser'], 'extra' => ['der', 'Katze']],
                            'ja' => ['sentence' => '少しの水', 'correct' => ['少しの', '水'], 'extra' => ['その']],
                            'ko' => ['sentence' => '약간의 물', 'correct' => ['약간의', '물'], 'extra' => ['그']],
                            'fr' => ['sentence' => "De l'eau", 'correct' => ['du', 'eau'], 'extra' => ['le', 'chat']],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'dog', 'and', 'the', 'cat'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El perro y el gato', 'correct' => ['el', 'perro', 'y', 'el', 'gato'], 'extra' => ['algo de']],
                            'de' => ['sentence' => 'Der Hund und die Katze', 'correct' => ['der', 'Hund', 'und', 'der', 'Katze'], 'extra' => ['etwas']],
                            'ja' => ['sentence' => '犬と猫', 'correct' => ['犬', 'と', '猫'], 'extra' => ['少しの']],
                            'ko' => ['sentence' => '개와 고양이', 'correct' => ['개와', '고양이'], 'extra' => ['약간의']],
                            'fr' => ['sentence' => 'Le chien et le chat', 'correct' => ['le', 'chien', 'et', 'le', 'chat'], 'extra' => ['du']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: One Cat, Two Cats', 3,
                pictures: [['en' => 'Cat', 'img' => 'cat'], ['en' => 'Book', 'img' => 'book']],
                plain: [['en' => 'Cats'], ['en' => 'Books']],
                phrases: [
                    'a' => [
                        'words' => ['two', 'cats'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dos gatos', 'correct' => ['dos', 'gatos'], 'extra' => ['libros', 'uno']],
                            'de' => ['sentence' => 'Zwei Katzen', 'correct' => ['zwei', 'Katzen'], 'extra' => ['Bücher', 'eins']],
                            'ja' => ['sentence' => '猫二匹', 'correct' => ['猫', '二匹'], 'extra' => ['本']],
                            'ko' => ['sentence' => '고양이 두 마리', 'correct' => ['고양이', '두', '마리'], 'extra' => ['책들']],
                            'fr' => ['sentence' => 'Deux chats', 'correct' => ['deux', 'chats'], 'extra' => ['livres', 'un']],
                        ],
                    ],
                    'b' => [
                        'words' => ['three', 'books'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tres libros', 'correct' => ['tres', 'libros'], 'extra' => ['gatos', 'dos']],
                            'de' => ['sentence' => 'Drei Bücher', 'correct' => ['drei', 'Bücher'], 'extra' => ['Katzen', 'zwei']],
                            'ja' => ['sentence' => '本三冊', 'correct' => ['本', '三冊'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '책 세 권', 'correct' => ['책', '세', '권'], 'extra' => ['고양이들']],
                            'fr' => ['sentence' => 'Trois livres', 'correct' => ['trois', 'livres'], 'extra' => ['chats', 'deux']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'cat', 'and', 'a', 'book'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un gato y un libro', 'correct' => ['un', 'gato', 'y', 'un', 'libro'], 'extra' => ['gatos']],
                            'de' => ['sentence' => 'Eine Katze und ein Buch', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Buch'], 'extra' => ['Katzen']],
                            'ja' => ['sentence' => '猫と本', 'correct' => ['猫', 'と', '本'], 'extra' => ['二']],
                            'ko' => ['sentence' => '고양이와 책', 'correct' => ['고양이와', '책'], 'extra' => ['고양이들']],
                            'fr' => ['sentence' => 'Un chat et un livre', 'correct' => ['un', 'chat', 'et', 'un', 'livre'], 'extra' => ['chats']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: This & That', 4,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'This'], ['en' => 'That']],
                phrases: [
                    'a' => [
                        'words' => ['this', 'book'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Este libro', 'correct' => ['este', 'libro'], 'extra' => ['ese', 'casa']],
                            'de' => ['sentence' => 'Dieses Buch', 'correct' => ['dieser', 'Buch'], 'extra' => ['jener', 'Haus']],
                            'ja' => ['sentence' => 'この本', 'correct' => ['この', '本'], 'extra' => ['あの']],
                            'ko' => ['sentence' => '이 책', 'correct' => ['이', '책'], 'extra' => ['저']],
                            'fr' => ['sentence' => 'Ce livre', 'correct' => ['ce', 'livre'], 'extra' => ['cette', 'maison']],
                        ],
                    ],
                    'b' => [
                        'words' => ['that', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Esa casa', 'correct' => ['ese', 'casa'], 'extra' => ['este', 'libro']],
                            'de' => ['sentence' => 'Jenes Haus', 'correct' => ['jener', 'Haus'], 'extra' => ['dieser', 'Buch']],
                            'ja' => ['sentence' => 'あの家', 'correct' => ['あの', '家'], 'extra' => ['この']],
                            'ko' => ['sentence' => '저 집', 'correct' => ['저', '집'], 'extra' => ['이']],
                            'fr' => ['sentence' => 'Cette maison', 'correct' => ['cette', 'maison'], 'extra' => ['ce', 'livre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['this', 'book', 'and', 'that', 'house'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Este libro y esa casa', 'correct' => ['este', 'libro', 'y', 'ese', 'casa'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Dieses Buch und jenes Haus', 'correct' => ['dieser', 'Buch', 'und', 'jener', 'Haus'], 'extra' => ['Katze']],
                            'ja' => ['sentence' => 'この本とあの家', 'correct' => ['この', '本', 'と', 'あの', '家'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '이 책과 저 집', 'correct' => ['이', '책과', '저', '집'], 'extra' => ['고양이']],
                            'fr' => ['sentence' => 'Ce livre et cette maison', 'correct' => ['ce', 'livre', 'et', 'cette', 'maison'], 'extra' => ['chat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: These & Those', 5,
                pictures: [['en' => 'Cat', 'img' => 'cat'], ['en' => 'Dog', 'img' => 'dog']],
                plain: [['en' => 'These'], ['en' => 'Those']],
                phrases: [
                    'a' => [
                        'words' => ['these', 'cats'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Estos gatos', 'correct' => ['estos', 'gatos'], 'extra' => ['esos', 'perros']],
                            'de' => ['sentence' => 'Diese Katzen', 'correct' => ['diese', 'Katzen'], 'extra' => ['jene', 'Hunde']],
                            'ja' => ['sentence' => 'これらの猫', 'correct' => ['これらの', '猫'], 'extra' => ['あれらの']],
                            'ko' => ['sentence' => '이 고양이들', 'correct' => ['이', '고양이들'], 'extra' => ['저것들']],
                            'fr' => ['sentence' => 'Ces chats', 'correct' => ['ces', 'chats'], 'extra' => ['chiens']],
                        ],
                    ],
                    'b' => [
                        'words' => ['those', 'dogs'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Esos perros', 'correct' => ['esos', 'perros'], 'extra' => ['estos', 'gatos']],
                            'de' => ['sentence' => 'Jene Hunde', 'correct' => ['jene', 'Hunde'], 'extra' => ['diese', 'Katzen']],
                            'ja' => ['sentence' => 'あれらの犬', 'correct' => ['あれらの', '犬'], 'extra' => ['これらの']],
                            'ko' => ['sentence' => '저 개들', 'correct' => ['저', '개들'], 'extra' => ['이것들']],
                            'fr' => ['sentence' => 'Ces chiens', 'correct' => ['ces', 'chiens'], 'extra' => ['chats']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'cat', 'and', 'a', 'dog'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un gato y un perro', 'correct' => ['un', 'gato', 'y', 'un', 'perro'], 'extra' => ['estos']],
                            'de' => ['sentence' => 'Eine Katze und ein Hund', 'correct' => ['eine', 'Katze', 'und', 'ein', 'Hund'], 'extra' => ['diese']],
                            'ja' => ['sentence' => '猫と犬', 'correct' => ['猫', 'と', '犬'], 'extra' => ['これらの']],
                            'ko' => ['sentence' => '고양이와 개', 'correct' => ['고양이와', '개'], 'extra' => ['이것들']],
                            'fr' => ['sentence' => 'Un chat et un chien', 'correct' => ['un', 'chat', 'et', 'un', 'chien'], 'extra' => ['ces']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
