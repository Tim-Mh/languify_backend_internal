<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitBeginner07Seeder extends Seeder
{
    private const PICTURES = ['큰' => 'big', '작은' => 'small', '뜨거운' => 'hot', '차가운' => 'cold', '집' => 'house', '공원' => 'park', '책' => 'book', '탁자' => 'table'];

    /**
     * Korean Chapter 1 (Beginner), Unit 7, the Korean twin of the English
     * "Unit 7: Describing Things" unit. Authored in Korean with hints in English, Spanish, German,
     * French and Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, '유닛 7: 사물 묘사하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 큰 · 작은', 1,
                pictures: [['ko' => '큰', 'img' => 'big'], ['ko' => '작은', 'img' => 'small']],
                plain: [['ko' => '집'], ['ko' => '고양이']],
                phrases: [
                    'a' => [
                        'words' => ['큰', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a big house', 'correct' => ['a', 'big', 'house'], 'extra' => ['small']],
                            'es' => ['sentence' => 'Una casa grande', 'correct' => ['una', 'casa', 'grande'], 'extra' => ['pequeño', 'gato']],
                            'de' => ['sentence' => 'Ein großes Haus', 'correct' => ['ein', 'groß', 'Haus'], 'extra' => ['klein', 'Katze']],
                            'fr' => ['sentence' => 'Une grande maison', 'correct' => ['une', 'maison', 'grand'], 'extra' => ['petit', 'chat']],
                            'ja' => ['sentence' => '大きい家', 'correct' => ['大きい', '家'], 'extra' => ['小さい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['작은', '고양이'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a small cat', 'correct' => ['a', 'small', 'cat'], 'extra' => ['big']],
                            'es' => ['sentence' => 'Un gato pequeño', 'correct' => ['un', 'gato', 'pequeño'], 'extra' => ['grande', 'casa']],
                            'de' => ['sentence' => 'Eine kleine Katze', 'correct' => ['eine', 'klein', 'Katze'], 'extra' => ['groß', 'Haus']],
                            'fr' => ['sentence' => 'Un petit chat', 'correct' => ['un', 'petit', 'chat'], 'extra' => ['grand', 'maison']],
                            'ja' => ['sentence' => '小さい猫', 'correct' => ['小さい', '猫'], 'extra' => ['大きい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['큰', '집과', '작은', '고양이'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'a big house and a small cat', 'correct' => ['a', 'big', 'house', 'and', 'a', 'small', 'cat'], 'extra' => ['hot']],
                            'es' => ['sentence' => 'Una casa grande y un gato pequeño', 'correct' => ['una', 'casa', 'grande', 'y', 'un', 'gato', 'pequeño'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Ein großes Haus und eine kleine Katze', 'correct' => ['ein', 'groß', 'Haus', 'und', 'eine', 'klein', 'Katze'], 'extra' => ['heiß']],
                            'fr' => ['sentence' => 'Une grande maison et un petit chat', 'correct' => ['une', 'maison', 'grand', 'et', 'un', 'chat', 'petit'], 'extra' => ['chaud']],
                            'ja' => ['sentence' => '大きい家と小さい猫', 'correct' => ['大きい', '家', 'と', '小さい', '猫'], 'extra' => ['熱い']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 뜨거운 · 차가운', 2,
                pictures: [['ko' => '뜨거운', 'img' => 'hot'], ['ko' => '차가운', 'img' => 'cold']],
                plain: [['ko' => '커피'], ['ko' => '물']],
                phrases: [
                    'a' => [
                        'words' => ['뜨거운', '커피'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'hot coffee', 'correct' => ['hot', 'coffee'], 'extra' => ['cold']],
                            'es' => ['sentence' => 'Café caliente', 'correct' => ['café', 'caliente'], 'extra' => ['frío', 'agua']],
                            'de' => ['sentence' => 'Heißer Kaffee', 'correct' => ['heiß', 'Kaffee'], 'extra' => ['kalt', 'Wasser']],
                            'fr' => ['sentence' => 'Un café chaud', 'correct' => ['chaud', 'café'], 'extra' => ['froid', 'eau']],
                            'ja' => ['sentence' => '熱いコーヒー', 'correct' => ['熱い', 'コーヒー'], 'extra' => ['冷たい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['차가운', '물'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'cold water', 'correct' => ['cold', 'water'], 'extra' => ['hot']],
                            'es' => ['sentence' => 'Agua fría', 'correct' => ['frío', 'agua'], 'extra' => ['caliente', 'café']],
                            'de' => ['sentence' => 'Kaltes Wasser', 'correct' => ['kalt', 'Wasser'], 'extra' => ['heiß', 'Kaffee']],
                            'fr' => ['sentence' => 'De l\'eau froide', 'correct' => ['froid', 'eau'], 'extra' => ['chaud', 'café']],
                            'ja' => ['sentence' => '冷たい水', 'correct' => ['冷たい', '水'], 'extra' => ['熱い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['뜨거운', '커피와', '차가운', '물'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'hot coffee and cold water', 'correct' => ['hot', 'coffee', 'and', 'cold', 'water'], 'extra' => ['big']],
                            'es' => ['sentence' => 'Café caliente y agua fría', 'correct' => ['caliente', 'café', 'y', 'frío', 'agua'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Heißer Kaffee und kaltes Wasser', 'correct' => ['heiß', 'Kaffee', 'und', 'kalt', 'Wasser'], 'extra' => ['groß']],
                            'fr' => ['sentence' => 'Un café chaud et de l\'eau froide', 'correct' => ['chaud', 'café', 'et', 'froid', 'eau'], 'extra' => ['grand']],
                            'ja' => ['sentence' => '熱いコーヒーと冷たい水', 'correct' => ['熱い', 'コーヒー', 'と', '冷たい', '水'], 'extra' => ['大きい']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 집 · 공원', 3,
                pictures: [['ko' => '집', 'img' => 'house'], ['ko' => '공원', 'img' => 'park']],
                plain: [['ko' => '아름다운'], ['ko' => '예쁜']],
                phrases: [
                    'a' => [
                        'words' => ['아름다운', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a beautiful house', 'correct' => ['a', 'beautiful', 'house'], 'extra' => ['pretty']],
                            'es' => ['sentence' => 'Una casa hermosa', 'correct' => ['una', 'hermoso', 'casa'], 'extra' => ['bonito', 'parque']],
                            'de' => ['sentence' => 'Ein schönes Haus', 'correct' => ['ein', 'schön', 'Haus'], 'extra' => ['hübsch', 'Park']],
                            'fr' => ['sentence' => 'Une belle maison', 'correct' => ['une', 'maison', 'beau'], 'extra' => ['joli', 'parc']],
                            'ja' => ['sentence' => '美しい家', 'correct' => ['美しい', '家'], 'extra' => ['かわいい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['예쁜', '공원'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a pretty park', 'correct' => ['a', 'pretty', 'park'], 'extra' => ['beautiful']],
                            'es' => ['sentence' => 'Un parque bonito', 'correct' => ['un', 'parque', 'bonito'], 'extra' => ['hermoso', 'casa']],
                            'de' => ['sentence' => 'Ein hübscher Park', 'correct' => ['ein', 'hübsch', 'Park'], 'extra' => ['schön', 'Haus']],
                            'fr' => ['sentence' => 'Un joli parc', 'correct' => ['un', 'joli', 'parc'], 'extra' => ['beau', 'maison']],
                            'ja' => ['sentence' => 'かわいい公園', 'correct' => ['かわいい', '公園'], 'extra' => ['美しい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['아름답고', '예쁜', '공원'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a beautiful and pretty park', 'correct' => ['a', 'beautiful', 'and', 'pretty', 'park'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Un parque hermoso y bonito', 'correct' => ['un', 'parque', 'hermoso', 'y', 'bonito'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein schöner und hübscher Park', 'correct' => ['ein', 'schön', 'und', 'hübsch', 'Park'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Un parc beau et joli', 'correct' => ['un', 'parc', 'beau', 'et', 'joli'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '美しくてかわいい公園', 'correct' => ['美しくて', 'かわいい', '公園'], 'extra' => ['家']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 책 · 탁자', 4,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '탁자', 'img' => 'table']],
                plain: [['ko' => '쉬운'], ['ko' => '어려운']],
                phrases: [
                    'a' => [
                        'words' => ['쉬운', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'an easy book', 'correct' => ['an', 'easy', 'book'], 'extra' => ['hard']],
                            'es' => ['sentence' => 'Un libro fácil', 'correct' => ['un', 'libro', 'fácil'], 'extra' => ['difícil', 'mesa']],
                            'de' => ['sentence' => 'Ein einfaches Buch', 'correct' => ['ein', 'einfach', 'Buch'], 'extra' => ['schwer', 'Tisch']],
                            'fr' => ['sentence' => 'Un livre facile', 'correct' => ['un', 'livre', 'facile'], 'extra' => ['difficile', 'table']],
                            'ja' => ['sentence' => '簡単な本', 'correct' => ['簡単な', '本'], 'extra' => ['難しい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['단단한', '탁자'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a hard table', 'correct' => ['a', 'hard', 'table'], 'extra' => ['easy']],
                            'es' => ['sentence' => 'Una mesa dura', 'correct' => ['una', 'difícil', 'mesa'], 'extra' => ['fácil', 'libro']],
                            'de' => ['sentence' => 'Ein harter Tisch', 'correct' => ['ein', 'schwer', 'Tisch'], 'extra' => ['einfach', 'Buch']],
                            'fr' => ['sentence' => 'Une table dure', 'correct' => ['une', 'table', 'difficile'], 'extra' => ['facile', 'livre']],
                            'ja' => ['sentence' => '硬いテーブル', 'correct' => ['硬い', 'テーブル'], 'extra' => ['簡単']],
                        ],
                    ],
                    'c' => [
                        'words' => ['쉽거나', '어려운'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'easy or hard', 'correct' => ['easy', 'or', 'hard'], 'extra' => ['book']],
                            'es' => ['sentence' => 'Fácil o difícil', 'correct' => ['fácil', 'o', 'difícil'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Einfach oder schwer', 'correct' => ['einfach', 'oder', 'schwer'], 'extra' => ['Buch']],
                            'fr' => ['sentence' => 'Facile ou difficile', 'correct' => ['facile', 'ou', 'difficile'], 'extra' => ['livre']],
                            'ja' => ['sentence' => '簡単か難しい', 'correct' => ['簡単', 'か', '難しい'], 'extra' => ['本']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 책 · 집', 5,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '좋은'], ['ko' => '새로운']],
                phrases: [
                    'a' => [
                        'words' => ['좋은', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a good book', 'correct' => ['a', 'good', 'book'], 'extra' => ['new']],
                            'es' => ['sentence' => 'Un buen libro', 'correct' => ['un', 'bueno', 'libro'], 'extra' => ['nuevo', 'casa']],
                            'de' => ['sentence' => 'Ein gutes Buch', 'correct' => ['ein', 'gut', 'Buch'], 'extra' => ['neu', 'Haus']],
                            'fr' => ['sentence' => 'Un bon livre', 'correct' => ['un', 'bon', 'livre'], 'extra' => ['nouveau', 'maison']],
                            'ja' => ['sentence' => '良い本', 'correct' => ['良い', '本'], 'extra' => ['新しい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['새', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a new house', 'correct' => ['a', 'new', 'house'], 'extra' => ['good']],
                            'es' => ['sentence' => 'Una casa nueva', 'correct' => ['una', 'nuevo', 'casa'], 'extra' => ['bueno', 'libro']],
                            'de' => ['sentence' => 'Ein neues Haus', 'correct' => ['ein', 'neu', 'Haus'], 'extra' => ['gut', 'Buch']],
                            'fr' => ['sentence' => 'Une nouvelle maison', 'correct' => ['une', 'maison', 'nouveau'], 'extra' => ['bon', 'livre']],
                            'ja' => ['sentence' => '新しい家', 'correct' => ['新しい', '家'], 'extra' => ['良い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['좋고', '새로운', '책'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a good and new book', 'correct' => ['a', 'good', 'and', 'new', 'book'], 'extra' => ['house']],
                            'es' => ['sentence' => 'Un libro bueno y nuevo', 'correct' => ['un', 'libro', 'bueno', 'y', 'nuevo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein gutes und neues Buch', 'correct' => ['ein', 'gut', 'und', 'neu', 'Buch'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Un bon et nouveau livre', 'correct' => ['un', 'bon', 'et', 'nouveau', 'livre'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '良くて新しい本', 'correct' => ['良くて', '新しい', '本'], 'extra' => ['家']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
