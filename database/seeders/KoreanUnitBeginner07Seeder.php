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
                            'az' => ['sentence' => 'bir böyük ev', 'correct' => ['bir', 'böyük', 'ev'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'كبير بيت', 'correct' => ['كبير', 'بيت'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'большой дом', 'correct' => ['большой', 'дом'], 'extra' => ['маленький']],
                            'es' => ['sentence' => 'Una casa grande', 'correct' => ['una', 'casa', 'grande'], 'extra' => ['pequeño', 'gato']],
                            'de' => ['sentence' => 'Ein großes Haus', 'correct' => ['ein', 'groß', 'Haus'], 'extra' => ['klein', 'Katze']],
                            'fr' => ['sentence' => 'Une grande maison', 'correct' => ['une', 'maison', 'grand'], 'extra' => ['petit', 'chat']],
                            'ja' => ['sentence' => '大きい家', 'correct' => ['大きい', '家'], 'extra' => ['小さい']],
                            'tr' => ['sentence' => 'büyük bir ev', 'correct' => ['büyük', 'bir', 'ev'], 'extra' => ['küçük']],
                        ],
                    ],
                    'b' => [
                        'words' => ['작은', '고양이'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a small cat', 'correct' => ['a', 'small', 'cat'], 'extra' => ['big']],
                            'az' => ['sentence' => 'bir kiçik pişik', 'correct' => ['bir', 'kiçik', 'pişik'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'صغير قط', 'correct' => ['صغير', 'قط'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'маленький кот', 'correct' => ['маленький', 'кот'], 'extra' => ['большой']],
                            'es' => ['sentence' => 'Un gato pequeño', 'correct' => ['un', 'gato', 'pequeño'], 'extra' => ['grande', 'casa']],
                            'de' => ['sentence' => 'Eine kleine Katze', 'correct' => ['eine', 'klein', 'Katze'], 'extra' => ['groß', 'Haus']],
                            'fr' => ['sentence' => 'Un petit chat', 'correct' => ['un', 'petit', 'chat'], 'extra' => ['grand', 'maison']],
                            'ja' => ['sentence' => '小さい猫', 'correct' => ['小さい', '猫'], 'extra' => ['大きい']],
                            'tr' => ['sentence' => 'küçük bir kedi', 'correct' => ['küçük', 'bir', 'kedi'], 'extra' => ['büyük']],
                        ],
                    ],
                    'c' => [
                        'words' => ['큰', '집과', '작은', '고양이'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'a big house and a small cat', 'correct' => ['a', 'big', 'house', 'and', 'a', 'small', 'cat'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'bir böyük ev və bir kiçik pişik', 'correct' => ['bir', 'böyük', 'ev', 'və', 'bir', 'kiçik', 'pişik'], 'extra' => ['isti']],
                            'ar' => ['sentence' => 'كبير بيت و صغير قط', 'correct' => ['كبير', 'بيت', 'و', 'صغير', 'قط'], 'extra' => ['ساخن']],
                            'ru' => ['sentence' => 'большой дом и маленький кот', 'correct' => ['большой', 'дом', 'и', 'маленький', 'кот'], 'extra' => ['горячий']],
                            'es' => ['sentence' => 'Una casa grande y un gato pequeño', 'correct' => ['una', 'casa', 'grande', 'y', 'un', 'gato', 'pequeño'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Ein großes Haus und eine kleine Katze', 'correct' => ['ein', 'groß', 'Haus', 'und', 'eine', 'klein', 'Katze'], 'extra' => ['heiß']],
                            'fr' => ['sentence' => 'Une grande maison et un petit chat', 'correct' => ['une', 'maison', 'grand', 'et', 'un', 'chat', 'petit'], 'extra' => ['chaud']],
                            'ja' => ['sentence' => '大きい家と小さい猫', 'correct' => ['大きい', '家', 'と', '小さい', '猫'], 'extra' => ['熱い']],
                            'tr' => ['sentence' => 'büyük bir ev ve küçük bir kedi', 'correct' => ['büyük', 'bir', 'ev', 've', 'küçük', 'bir', 'kedi'], 'extra' => ['sıcak']],
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
                            'az' => ['sentence' => 'isti qəhvə', 'correct' => ['isti', 'qəhvə'], 'extra' => ['soyuq']],
                            'ar' => ['sentence' => 'ساخن قهوة', 'correct' => ['ساخن', 'قهوة'], 'extra' => ['بارد']],
                            'ru' => ['sentence' => 'горячий кофе', 'correct' => ['горячий', 'кофе'], 'extra' => ['холодный']],
                            'es' => ['sentence' => 'Café caliente', 'correct' => ['café', 'caliente'], 'extra' => ['frío', 'agua']],
                            'de' => ['sentence' => 'Heißer Kaffee', 'correct' => ['heiß', 'Kaffee'], 'extra' => ['kalt', 'Wasser']],
                            'fr' => ['sentence' => 'Un café chaud', 'correct' => ['chaud', 'café'], 'extra' => ['froid', 'eau']],
                            'ja' => ['sentence' => '熱いコーヒー', 'correct' => ['熱い', 'コーヒー'], 'extra' => ['冷たい']],
                            'tr' => ['sentence' => 'sıcak kahve', 'correct' => ['sıcak', 'kahve'], 'extra' => ['soğuk']],
                        ],
                    ],
                    'b' => [
                        'words' => ['차가운', '물'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'cold water', 'correct' => ['cold', 'water'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'soyuq su', 'correct' => ['soyuq', 'su'], 'extra' => ['isti']],
                            'ar' => ['sentence' => 'بارد ماء', 'correct' => ['بارد', 'ماء'], 'extra' => ['ساخن']],
                            'ru' => ['sentence' => 'холодный вода', 'correct' => ['холодный', 'вода'], 'extra' => ['горячий']],
                            'es' => ['sentence' => 'Agua fría', 'correct' => ['frío', 'agua'], 'extra' => ['caliente', 'café']],
                            'de' => ['sentence' => 'Kaltes Wasser', 'correct' => ['kalt', 'Wasser'], 'extra' => ['heiß', 'Kaffee']],
                            'fr' => ['sentence' => 'De l\'eau froide', 'correct' => ['froid', 'eau'], 'extra' => ['chaud', 'café']],
                            'ja' => ['sentence' => '冷たい水', 'correct' => ['冷たい', '水'], 'extra' => ['熱い']],
                            'tr' => ['sentence' => 'soğuk su', 'correct' => ['soğuk', 'su'], 'extra' => ['sıcak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['뜨거운', '커피와', '차가운', '물'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'hot coffee and cold water', 'correct' => ['hot', 'coffee', 'and', 'cold', 'water'], 'extra' => ['big']],
                            'az' => ['sentence' => 'isti qəhvə və soyuq su', 'correct' => ['isti', 'qəhvə', 'və', 'soyuq', 'su'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'ساخن قهوة و بارد ماء', 'correct' => ['ساخن', 'قهوة', 'و', 'بارد', 'ماء'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'горячий кофе и холодный вода', 'correct' => ['горячий', 'кофе', 'и', 'холодный', 'вода'], 'extra' => ['большой']],
                            'es' => ['sentence' => 'Café caliente y agua fría', 'correct' => ['caliente', 'café', 'y', 'frío', 'agua'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Heißer Kaffee und kaltes Wasser', 'correct' => ['heiß', 'Kaffee', 'und', 'kalt', 'Wasser'], 'extra' => ['groß']],
                            'fr' => ['sentence' => 'Un café chaud et de l\'eau froide', 'correct' => ['chaud', 'café', 'et', 'froid', 'eau'], 'extra' => ['grand']],
                            'ja' => ['sentence' => '熱いコーヒーと冷たい水', 'correct' => ['熱い', 'コーヒー', 'と', '冷たい', '水'], 'extra' => ['大きい']],
                            'tr' => ['sentence' => 'sıcak kahve ve soğuk su', 'correct' => ['sıcak', 'kahve', 've', 'soğuk', 'su'], 'extra' => ['büyük']],
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
                            'az' => ['sentence' => 'bir gözəl ev', 'correct' => ['bir', 'gözəl', 'ev'], 'extra' => []],
                            'ar' => ['sentence' => 'جميل بيت', 'correct' => ['جميل', 'بيت'], 'extra' => []],
                            'ru' => ['sentence' => 'красивый дом', 'correct' => ['красивый', 'дом'], 'extra' => []],
                            'es' => ['sentence' => 'Una casa hermosa', 'correct' => ['una', 'hermoso', 'casa'], 'extra' => ['bonito', 'parque']],
                            'de' => ['sentence' => 'Ein schönes Haus', 'correct' => ['ein', 'schön', 'Haus'], 'extra' => ['hübsch', 'Park']],
                            'fr' => ['sentence' => 'Une belle maison', 'correct' => ['une', 'maison', 'beau'], 'extra' => ['joli', 'parc']],
                            'ja' => ['sentence' => '美しい家', 'correct' => ['美しい', '家'], 'extra' => ['かわいい']],
                            'tr' => ['sentence' => 'güzel bir ev', 'correct' => ['güzel', 'bir', 'ev'], 'extra' => ['güzel']],
                        ],
                    ],
                    'b' => [
                        'words' => ['예쁜', '공원'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a pretty park', 'correct' => ['a', 'pretty', 'park'], 'extra' => ['beautiful']],
                            'az' => ['sentence' => 'bir gözəl park', 'correct' => ['bir', 'gözəl', 'park'], 'extra' => []],
                            'ar' => ['sentence' => 'جميل حديقة', 'correct' => ['جميل', 'حديقة'], 'extra' => []],
                            'ru' => ['sentence' => 'красивый парк', 'correct' => ['красивый', 'парк'], 'extra' => []],
                            'es' => ['sentence' => 'Un parque bonito', 'correct' => ['un', 'parque', 'bonito'], 'extra' => ['hermoso', 'casa']],
                            'de' => ['sentence' => 'Ein hübscher Park', 'correct' => ['ein', 'hübsch', 'Park'], 'extra' => ['schön', 'Haus']],
                            'fr' => ['sentence' => 'Un joli parc', 'correct' => ['un', 'joli', 'parc'], 'extra' => ['beau', 'maison']],
                            'ja' => ['sentence' => 'かわいい公園', 'correct' => ['かわいい', '公園'], 'extra' => ['美しい']],
                            'tr' => ['sentence' => 'güzel bir park', 'correct' => ['güzel', 'bir', 'park'], 'extra' => ['güzel']],
                        ],
                    ],
                    'c' => [
                        'words' => ['아름답고', '예쁜', '공원'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a beautiful and pretty park', 'correct' => ['a', 'beautiful', 'and', 'pretty', 'park'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bir gözəl və gözəl park', 'correct' => ['bir', 'gözəl', 'və', 'gözəl', 'park'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'جميل و جميل حديقة', 'correct' => ['جميل', 'و', 'جميل', 'حديقة'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'красивый и красивый парк', 'correct' => ['красивый', 'и', 'красивый', 'парк'], 'extra' => ['дом']],
                            'es' => ['sentence' => 'Un parque hermoso y bonito', 'correct' => ['un', 'parque', 'hermoso', 'y', 'bonito'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein schöner und hübscher Park', 'correct' => ['ein', 'schön', 'und', 'hübsch', 'Park'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Un parc beau et joli', 'correct' => ['un', 'parc', 'beau', 'et', 'joli'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '美しくてかわいい公園', 'correct' => ['美しくて', 'かわいい', '公園'], 'extra' => ['家']],
                            'tr' => ['sentence' => 'güzel ve hoş bir park', 'correct' => ['güzel', 've', 'hoş', 'bir', 'park'], 'extra' => ['ev']],
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
                            'az' => ['sentence' => 'bir asan kitab', 'correct' => ['bir', 'asan', 'kitab'], 'extra' => ['çətin']],
                            'ar' => ['sentence' => 'سهل كتاب', 'correct' => ['سهل', 'كتاب'], 'extra' => ['صعب']],
                            'ru' => ['sentence' => 'легко книга', 'correct' => ['легко', 'книга'], 'extra' => ['трудно']],
                            'es' => ['sentence' => 'Un libro fácil', 'correct' => ['un', 'libro', 'fácil'], 'extra' => ['difícil', 'mesa']],
                            'de' => ['sentence' => 'Ein einfaches Buch', 'correct' => ['ein', 'einfach', 'Buch'], 'extra' => ['schwer', 'Tisch']],
                            'fr' => ['sentence' => 'Un livre facile', 'correct' => ['un', 'livre', 'facile'], 'extra' => ['difficile', 'table']],
                            'ja' => ['sentence' => '簡単な本', 'correct' => ['簡単な', '本'], 'extra' => ['難しい']],
                            'tr' => ['sentence' => 'kolay bir kitap', 'correct' => ['kolay', 'bir', 'kitap'], 'extra' => ['zor']],
                        ],
                    ],
                    'b' => [
                        'words' => ['단단한', '탁자'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a hard table', 'correct' => ['a', 'hard', 'table'], 'extra' => ['easy']],
                            'az' => ['sentence' => 'bir çətin masa', 'correct' => ['bir', 'çətin', 'masa'], 'extra' => ['asan']],
                            'ar' => ['sentence' => 'صعب طاولة', 'correct' => ['صعب', 'طاولة'], 'extra' => ['سهل']],
                            'ru' => ['sentence' => 'трудно стол', 'correct' => ['трудно', 'стол'], 'extra' => ['легко']],
                            'es' => ['sentence' => 'Una mesa dura', 'correct' => ['una', 'difícil', 'mesa'], 'extra' => ['fácil', 'libro']],
                            'de' => ['sentence' => 'Ein harter Tisch', 'correct' => ['ein', 'schwer', 'Tisch'], 'extra' => ['einfach', 'Buch']],
                            'fr' => ['sentence' => 'Une table dure', 'correct' => ['une', 'table', 'difficile'], 'extra' => ['facile', 'livre']],
                            'ja' => ['sentence' => '硬いテーブル', 'correct' => ['硬い', 'テーブル'], 'extra' => ['簡単']],
                            'tr' => ['sentence' => 'sert bir masa', 'correct' => ['sert', 'bir', 'masa'], 'extra' => ['kolay']],
                        ],
                    ],
                    'c' => [
                        'words' => ['쉽거나', '어려운'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'easy or hard', 'correct' => ['easy', 'or', 'hard'], 'extra' => ['book']],
                            'az' => ['sentence' => 'asan və ya çətin', 'correct' => ['asan', 'və ya', 'çətin'], 'extra' => ['kitab']],
                            'ar' => ['sentence' => 'سهل أو صعب', 'correct' => ['سهل', 'أو', 'صعب'], 'extra' => ['كتاب']],
                            'ru' => ['sentence' => 'легко или трудно', 'correct' => ['легко', 'или', 'трудно'], 'extra' => ['книга']],
                            'es' => ['sentence' => 'Fácil o difícil', 'correct' => ['fácil', 'o', 'difícil'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Einfach oder schwer', 'correct' => ['einfach', 'oder', 'schwer'], 'extra' => ['Buch']],
                            'fr' => ['sentence' => 'Facile ou difficile', 'correct' => ['facile', 'ou', 'difficile'], 'extra' => ['livre']],
                            'ja' => ['sentence' => '簡単か難しい', 'correct' => ['簡単', 'か', '難しい'], 'extra' => ['本']],
                            'tr' => ['sentence' => 'kolay veya zor', 'correct' => ['kolay', 'veya', 'zor'], 'extra' => ['kitap']],
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
                            'az' => ['sentence' => 'bir yaxşı kitab', 'correct' => ['bir', 'yaxşı', 'kitab'], 'extra' => ['yeni']],
                            'ar' => ['sentence' => 'جيد كتاب', 'correct' => ['جيد', 'كتاب'], 'extra' => ['جديد']],
                            'ru' => ['sentence' => 'хороший книга', 'correct' => ['хороший', 'книга'], 'extra' => ['новый']],
                            'es' => ['sentence' => 'Un buen libro', 'correct' => ['un', 'bueno', 'libro'], 'extra' => ['nuevo', 'casa']],
                            'de' => ['sentence' => 'Ein gutes Buch', 'correct' => ['ein', 'gut', 'Buch'], 'extra' => ['neu', 'Haus']],
                            'fr' => ['sentence' => 'Un bon livre', 'correct' => ['un', 'bon', 'livre'], 'extra' => ['nouveau', 'maison']],
                            'ja' => ['sentence' => '良い本', 'correct' => ['良い', '本'], 'extra' => ['新しい']],
                            'tr' => ['sentence' => 'iyi bir kitap', 'correct' => ['iyi', 'bir', 'kitap'], 'extra' => ['yeni']],
                        ],
                    ],
                    'b' => [
                        'words' => ['새', '집'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a new house', 'correct' => ['a', 'new', 'house'], 'extra' => ['good']],
                            'az' => ['sentence' => 'bir yeni ev', 'correct' => ['bir', 'yeni', 'ev'], 'extra' => ['yaxşı']],
                            'ar' => ['sentence' => 'جديد بيت', 'correct' => ['جديد', 'بيت'], 'extra' => ['جيد']],
                            'ru' => ['sentence' => 'новый дом', 'correct' => ['новый', 'дом'], 'extra' => ['хороший']],
                            'es' => ['sentence' => 'Una casa nueva', 'correct' => ['una', 'nuevo', 'casa'], 'extra' => ['bueno', 'libro']],
                            'de' => ['sentence' => 'Ein neues Haus', 'correct' => ['ein', 'neu', 'Haus'], 'extra' => ['gut', 'Buch']],
                            'fr' => ['sentence' => 'Une nouvelle maison', 'correct' => ['une', 'maison', 'nouveau'], 'extra' => ['bon', 'livre']],
                            'ja' => ['sentence' => '新しい家', 'correct' => ['新しい', '家'], 'extra' => ['良い']],
                            'tr' => ['sentence' => 'yeni bir ev', 'correct' => ['yeni', 'bir', 'ev'], 'extra' => ['iyi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['좋고', '새로운', '책'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a good and new book', 'correct' => ['a', 'good', 'and', 'new', 'book'], 'extra' => ['house']],
                            'az' => ['sentence' => 'bir yaxşı və yeni kitab', 'correct' => ['bir', 'yaxşı', 'və', 'yeni', 'kitab'], 'extra' => ['ev']],
                            'ar' => ['sentence' => 'جيد و جديد كتاب', 'correct' => ['جيد', 'و', 'جديد', 'كتاب'], 'extra' => ['بيت']],
                            'ru' => ['sentence' => 'хороший и новый книга', 'correct' => ['хороший', 'и', 'новый', 'книга'], 'extra' => ['дом']],
                            'es' => ['sentence' => 'Un libro bueno y nuevo', 'correct' => ['un', 'libro', 'bueno', 'y', 'nuevo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein gutes und neues Buch', 'correct' => ['ein', 'gut', 'und', 'neu', 'Buch'], 'extra' => ['Haus']],
                            'fr' => ['sentence' => 'Un bon et nouveau livre', 'correct' => ['un', 'bon', 'et', 'nouveau', 'livre'], 'extra' => ['maison']],
                            'ja' => ['sentence' => '良くて新しい本', 'correct' => ['良くて', '新しい', '本'], 'extra' => ['家']],
                            'tr' => ['sentence' => 'iyi ve yeni bir kitap', 'correct' => ['iyi', 've', 'yeni', 'bir', 'kitap'], 'extra' => ['ev']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
