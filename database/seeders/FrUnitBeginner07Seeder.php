<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner07Seeder extends Seeder
{
    private const PICTURES = [
        'Grand' => 'big', 'Petit' => 'small', 'Chaud' => 'hot',
        'Froid' => 'cold', 'Livre' => 'book', 'Chat' => 'cat',
    ];

    /**
     * French Beginner Unit 7 — describing things.
     *
     * Every adjective is attached to a noun the learner already owns, which is
     * also how the noun/adjective ORDER gets taught: French says "un livre
     * rouge" (book red) but "un grand livre" (big book), and only seeing both
     * in real phrases makes that stick.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Describing Things', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Big & Small', 1,
                pictures: [['fr' => 'Grand', 'img' => 'big'], ['fr' => 'Petit', 'img' => 'small']],
                plain: [['fr' => 'Bon'], ['fr' => 'Mauvais']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'grand', 'livre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A big book', 'correct' => ['a', 'big', 'book'], 'extra' => ['small', 'cat']],
                            'es' => ['sentence' => 'Un libro grande', 'correct' => ['un', 'libro', 'grande'], 'extra' => ['pequeño', 'gato']],
                            'de' => ['sentence' => 'Ein großes Buch', 'correct' => ['ein', 'großes', 'Buch'], 'extra' => ['klein', 'Katze']],
                            'ja' => ['sentence' => '大きい本', 'correct' => ['大きい', '本'], 'extra' => ['小さい', '猫']],
                            'ko' => ['sentence' => '큰 책', 'correct' => ['큰', '책'], 'extra' => ['작은', '고양이']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'bon', 'café'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A good coffee', 'correct' => ['a', 'good', 'coffee'], 'extra' => ['bad', 'tea']],
                            'es' => ['sentence' => 'Un buen café', 'correct' => ['un', 'buen', 'café'], 'extra' => ['malo', 'té']],
                            'de' => ['sentence' => 'Ein guter Kaffee', 'correct' => ['ein', 'guter', 'Kaffee'], 'extra' => ['schlecht', 'Tee']],
                            'ja' => ['sentence' => '良いコーヒー', 'correct' => ['良い', 'コーヒー'], 'extra' => ['悪い', 'お茶']],
                            'ko' => ['sentence' => '좋은 커피', 'correct' => ['좋은', '커피'], 'extra' => ['나쁜', '차']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'petit', 'chat', 'et', 'un', 'mauvais', 'café'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A small cat and a bad coffee', 'correct' => ['a', 'small', 'cat', 'and', 'a', 'bad', 'coffee'], 'extra' => ['big']],
                            'es' => ['sentence' => 'Un gato pequeño y un café malo', 'correct' => ['un', 'gato', 'pequeño', 'y', 'un', 'café', 'malo'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Eine kleine Katze und ein schlechter Kaffee', 'correct' => ['eine', 'kleine', 'Katze', 'und', 'ein', 'schlechter', 'Kaffee'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '小さい猫と悪いコーヒー', 'correct' => ['小さい', '猫', 'と', '悪い', 'コーヒー'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 고양이와 나쁜 커피', 'correct' => ['작은', '고양이와', '나쁜', '커피'], 'extra' => ['큰']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Hot & Cold', 2,
                pictures: [['fr' => 'Chaud', 'img' => 'hot'], ['fr' => 'Froid', 'img' => 'cold']],
                plain: [['fr' => 'Nouveau'], ['fr' => 'Vieux']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'café', 'chaud'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A hot coffee', 'correct' => ['a', 'hot', 'coffee'], 'extra' => ['cold', 'tea']],
                            'es' => ['sentence' => 'Un café caliente', 'correct' => ['un', 'café', 'caliente'], 'extra' => ['frío', 'té']],
                            'de' => ['sentence' => 'Ein heißer Kaffee', 'correct' => ['ein', 'heißer', 'Kaffee'], 'extra' => ['kalt', 'Tee']],
                            'ja' => ['sentence' => '熱いコーヒー', 'correct' => ['熱い', 'コーヒー'], 'extra' => ['冷たい', 'お茶']],
                            'ko' => ['sentence' => '뜨거운 커피', 'correct' => ['뜨거운', '커피'], 'extra' => ['차가운', '차']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'nouveau', 'livre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A new book', 'correct' => ['a', 'new', 'book'], 'extra' => ['old', 'pen']],
                            'es' => ['sentence' => 'Un libro nuevo', 'correct' => ['un', 'libro', 'nuevo'], 'extra' => ['viejo', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein neues Buch', 'correct' => ['ein', 'neues', 'Buch'], 'extra' => ['alt', 'Kugelschreiber']],
                            'ja' => ['sentence' => '新しい本', 'correct' => ['新しい', '本'], 'extra' => ['古い', 'ペン']],
                            'ko' => ['sentence' => '새로운 책', 'correct' => ['새로운', '책'], 'extra' => ['오래된', '펜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'vieux', 'livre', 'et', 'un', 'thé', 'froid'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'An old book and a cold tea', 'correct' => ['an', 'old', 'book', 'and', 'a', 'cold', 'tea'], 'extra' => ['new']],
                            'es' => ['sentence' => 'Un libro viejo y un té frío', 'correct' => ['un', 'libro', 'viejo', 'y', 'un', 'té', 'frío'], 'extra' => ['nuevo']],
                            'de' => ['sentence' => 'Ein altes Buch und ein kalter Tee', 'correct' => ['ein', 'altes', 'Buch', 'und', 'ein', 'kalter', 'Tee'], 'extra' => ['neu']],
                            'ja' => ['sentence' => '古い本と冷たいお茶', 'correct' => ['古い', '本', 'と', '冷たい', 'お茶'], 'extra' => ['新しい']],
                            'ko' => ['sentence' => '오래된 책과 차가운 차', 'correct' => ['오래된', '책과', '차가운', '차'], 'extra' => ['새로운']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Beautiful & Pretty', 3,
                pictures: [['fr' => 'Grand', 'img' => 'big'], ['fr' => 'Chaud', 'img' => 'hot']],
                plain: [['fr' => 'Beau'], ['fr' => 'Joli']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'beau', 'jour'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A beautiful day', 'correct' => ['a', 'beautiful', 'day'], 'extra' => ['pretty', 'night']],
                            'es' => ['sentence' => 'Un día hermoso', 'correct' => ['un', 'día', 'hermoso'], 'extra' => ['bonito', 'noche']],
                            'de' => ['sentence' => 'Ein schöner Tag', 'correct' => ['ein', 'schöner', 'Tag'], 'extra' => ['hübsch', 'Nacht']],
                            'ja' => ['sentence' => '美しい日', 'correct' => ['美しい', '日'], 'extra' => ['かわいい', '夜']],
                            'ko' => ['sentence' => '아름다운 날', 'correct' => ['아름다운', '날'], 'extra' => ['예쁜', '밤']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'joli', 'livre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A pretty book', 'correct' => ['a', 'pretty', 'book'], 'extra' => ['beautiful', 'pen']],
                            'es' => ['sentence' => 'Un libro bonito', 'correct' => ['un', 'libro', 'bonito'], 'extra' => ['hermoso', 'bolígrafo']],
                            'de' => ['sentence' => 'Ein hübsches Buch', 'correct' => ['ein', 'hübsches', 'Buch'], 'extra' => ['schön', 'Kugelschreiber']],
                            'ja' => ['sentence' => 'かわいい本', 'correct' => ['かわいい', '本'], 'extra' => ['美しい', 'ペン']],
                            'ko' => ['sentence' => '예쁜 책', 'correct' => ['예쁜', '책'], 'extra' => ['아름다운', '펜']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'grand', 'chat', 'et', 'un', 'café', 'chaud'], 'blank' => 6,
                        'tr' => [
                            'en' => ['sentence' => 'A big cat and a hot coffee', 'correct' => ['a', 'big', 'cat', 'and', 'a', 'hot', 'coffee'], 'extra' => ['pretty']],
                            'es' => ['sentence' => 'Un gato grande y un café caliente', 'correct' => ['un', 'gato', 'grande', 'y', 'un', 'café', 'caliente'], 'extra' => ['bonito']],
                            'de' => ['sentence' => 'Eine große Katze und ein heißer Kaffee', 'correct' => ['eine', 'große', 'Katze', 'und', 'ein', 'heißer', 'Kaffee'], 'extra' => ['hübsch']],
                            'ja' => ['sentence' => '大きい猫と熱いコーヒー', 'correct' => ['大きい', '猫', 'と', '熱い', 'コーヒー'], 'extra' => ['かわいい']],
                            'ko' => ['sentence' => '큰 고양이와 뜨거운 커피', 'correct' => ['큰', '고양이와', '뜨거운', '커피'], 'extra' => ['예쁜']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Easy & Hard', 4,
                pictures: [['fr' => 'Petit', 'img' => 'small'], ['fr' => 'Froid', 'img' => 'cold']],
                plain: [['fr' => 'Facile'], ['fr' => 'Difficile']],
                phrases: [
                    'a' => [
                        'words' => ["c'est", 'facile'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'It is easy', 'correct' => ['it is', 'easy'], 'extra' => ['difficult', 'small']],
                            'es' => ['sentence' => 'Es fácil', 'correct' => ['es', 'fácil'], 'extra' => ['difícil', 'pequeño']],
                            'de' => ['sentence' => 'Das ist leicht', 'correct' => ['das ist', 'leicht'], 'extra' => ['schwierig', 'klein']],
                            'ja' => ['sentence' => 'これは簡単です', 'correct' => ['これは', '簡単', 'です'], 'extra' => ['難しい']],
                            'ko' => ['sentence' => '이것은 쉽다', 'correct' => ['이것은', '쉽다'], 'extra' => ['어려운', '작은']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'est", 'difficile'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'It is difficult', 'correct' => ['it is', 'difficult'], 'extra' => ['easy', 'cold']],
                            'es' => ['sentence' => 'Es difícil', 'correct' => ['es', 'difícil'], 'extra' => ['fácil', 'frío']],
                            'de' => ['sentence' => 'Das ist schwierig', 'correct' => ['das ist', 'schwierig'], 'extra' => ['leicht', 'kalt']],
                            'ja' => ['sentence' => 'これは難しいです', 'correct' => ['これは', '難しい', 'です'], 'extra' => ['簡単な']],
                            'ko' => ['sentence' => '이것은 어렵다', 'correct' => ['이것은', '어렵다'], 'extra' => ['쉬운', '차가운']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'petit', 'chat', 'et', 'un', 'thé', 'froid'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A small cat and a cold tea', 'correct' => ['a', 'small', 'cat', 'and', 'a', 'cold', 'tea'], 'extra' => ['easy']],
                            'es' => ['sentence' => 'Un gato pequeño y un té frío', 'correct' => ['un', 'gato', 'pequeño', 'y', 'un', 'té', 'frío'], 'extra' => ['fácil']],
                            'de' => ['sentence' => 'Eine kleine Katze und ein kalter Tee', 'correct' => ['eine', 'kleine', 'Katze', 'und', 'ein', 'kalter', 'Tee'], 'extra' => ['leicht']],
                            'ja' => ['sentence' => '小さい猫と冷たいお茶', 'correct' => ['小さい', '猫', 'と', '冷たい', 'お茶'], 'extra' => ['簡単な']],
                            'ko' => ['sentence' => '작은 고양이와 차가운 차', 'correct' => ['작은', '고양이와', '차가운', '차'], 'extra' => ['쉬운']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Good Book', 5,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'Chat', 'img' => 'cat']],
                plain: [['fr' => 'Bon'], ['fr' => 'Joli']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'bon', 'livre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A good book', 'correct' => ['a', 'good', 'book'], 'extra' => ['pretty', 'cat']],
                            'es' => ['sentence' => 'Un buen libro', 'correct' => ['un', 'buen', 'libro'], 'extra' => ['bonito', 'gato']],
                            'de' => ['sentence' => 'Ein gutes Buch', 'correct' => ['ein', 'gutes', 'Buch'], 'extra' => ['hübsch', 'Katze']],
                            'ja' => ['sentence' => '良い本', 'correct' => ['良い', '本'], 'extra' => ['かわいい', '猫']],
                            'ko' => ['sentence' => '좋은 책', 'correct' => ['좋은', '책'], 'extra' => ['예쁜', '고양이']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'joli', 'chat'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A pretty cat', 'correct' => ['a', 'pretty', 'cat'], 'extra' => ['good', 'book']],
                            'es' => ['sentence' => 'Un gato bonito', 'correct' => ['un', 'gato', 'bonito'], 'extra' => ['bueno', 'libro']],
                            'de' => ['sentence' => 'Eine hübsche Katze', 'correct' => ['eine', 'hübsche', 'Katze'], 'extra' => ['gut', 'Buch']],
                            'ja' => ['sentence' => 'かわいい猫', 'correct' => ['かわいい', '猫'], 'extra' => ['良い', '本']],
                            'ko' => ['sentence' => '예쁜 고양이', 'correct' => ['예쁜', '고양이'], 'extra' => ['좋은', '책']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'joli', 'chat', 'et', 'un', 'bon', 'livre'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A pretty cat and a good book', 'correct' => ['a', 'pretty', 'cat', 'and', 'a', 'good', 'book'], 'extra' => ['big']],
                            'es' => ['sentence' => 'Un gato bonito y un buen libro', 'correct' => ['un', 'gato', 'bonito', 'y', 'un', 'buen', 'libro'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Eine hübsche Katze und ein gutes Buch', 'correct' => ['eine', 'hübsche', 'Katze', 'und', 'ein', 'gutes', 'Buch'], 'extra' => ['groß']],
                            'ja' => ['sentence' => 'かわいい猫と良い本', 'correct' => ['かわいい', '猫', 'と', '良い', '本'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '예쁜 고양이와 좋은 책', 'correct' => ['예쁜', '고양이와', '좋은', '책'], 'extra' => ['큰']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
