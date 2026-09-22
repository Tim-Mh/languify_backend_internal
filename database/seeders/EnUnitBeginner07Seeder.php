<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner07Seeder extends Seeder
{
    private const PICTURES = [
        'Big' => 'big', 'Small' => 'small', 'Hot' => 'hot', 'Cold' => 'cold',
        'House' => 'house', 'Book' => 'book', 'Park' => 'park', 'Table' => 'table',
    ];

    /**
     * English Chapter 1, Unit 7 — describing things.
     *
     * The four size/temperature words are picturable icons, so they anchor the
     * lessons directly; the softer adjectives (beautiful, pretty, easy, hard,
     * good, new) ride in on the objects the learner already knows.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Describing Things', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Big & Small', 1,
                pictures: [['en' => 'Big', 'img' => 'big'], ['en' => 'Small', 'img' => 'small']],
                plain: [['en' => 'House'], ['en' => 'Cat']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'big', 'house'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una casa grande', 'correct' => ['una', 'casa', 'grande'], 'extra' => ['pequeño', 'gato']],
                            'de' => ['sentence' => 'Ein großes Haus', 'correct' => ['ein', 'groß', 'Haus'], 'extra' => ['klein', 'Katze']],
                            'ja' => ['sentence' => '大きい家', 'correct' => ['大きい', '家'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '큰 집', 'correct' => ['큰', '집'], 'extra' => ['작은']],
                            'fr' => ['sentence' => 'Une grande maison', 'correct' => ['une', 'maison', 'grand'], 'extra' => ['petit', 'chat']],
                            'tr' => ['sentence' => 'büyük bir ev', 'correct' => ['büyük', 'bir', 'ev'], 'extra' => []],
                        'ru' => ['sentence' => 'большой дом', 'correct' => ['большой', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'كبير بيت', 'correct' => ['كبير', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'bir böyük ev', 'correct' => ['bir', 'böyük', 'ev'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'small', 'cat'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un gato pequeño', 'correct' => ['un', 'gato', 'pequeño'], 'extra' => ['grande', 'casa']],
                            'de' => ['sentence' => 'Eine kleine Katze', 'correct' => ['eine', 'klein', 'Katze'], 'extra' => ['groß', 'Haus']],
                            'ja' => ['sentence' => '小さい猫', 'correct' => ['小さい', '猫'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 고양이', 'correct' => ['작은', '고양이'], 'extra' => ['큰']],
                            'fr' => ['sentence' => 'Un petit chat', 'correct' => ['un', 'petit', 'chat'], 'extra' => ['grand', 'maison']],
                            'tr' => ['sentence' => 'küçük bir kedi', 'correct' => ['küçük', 'bir', 'kedi'], 'extra' => []],
                        'ru' => ['sentence' => 'маленький кот', 'correct' => ['маленький', 'кот'], 'extra' => []],
                        'ar' => ['sentence' => 'صغير قط', 'correct' => ['صغير', 'قط'], 'extra' => []],
                        'az' => ['sentence' => 'bir kiçik pişik', 'correct' => ['bir', 'kiçik', 'pişik'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'big', 'house', 'and', 'a', 'small', 'cat'], 'blank' => 5,
                        'tr' => [
                            'es' => ['sentence' => 'Una casa grande y un gato pequeño', 'correct' => ['una', 'casa', 'grande', 'y', 'un', 'gato', 'pequeño'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Ein großes Haus und eine kleine Katze', 'correct' => ['ein', 'groß', 'Haus', 'und', 'eine', 'klein', 'Katze'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '大きい家と小さい猫', 'correct' => ['大きい', '家', 'と', '小さい', '猫'], 'extra' => ['熱い']],
                            'ko' => ['sentence' => '큰 집과 작은 고양이', 'correct' => ['큰', '집과', '작은', '고양이'], 'extra' => ['뜨거운']],
                            'fr' => ['sentence' => 'Une grande maison et un petit chat', 'correct' => ['une', 'maison', 'grand', 'et', 'un', 'chat', 'petit'], 'extra' => ['chaud']],
                            'tr' => ['sentence' => 'büyük bir ev ve küçük bir kedi', 'correct' => ['büyük', 'bir', 'ev', 've', 'küçük', 'bir', 'kedi'], 'extra' => []],
                        'ru' => ['sentence' => 'большой дом и маленький кот', 'correct' => ['большой', 'дом', 'и', 'маленький', 'кот'], 'extra' => []],
                        'ar' => ['sentence' => 'كبير بيت و صغير قط', 'correct' => ['كبير', 'بيت', 'و', 'صغير', 'قط'], 'extra' => []],
                        'az' => ['sentence' => 'bir böyük ev və bir kiçik pişik', 'correct' => ['bir', 'böyük', 'ev', 'və', 'bir', 'kiçik', 'pişik'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Hot & Cold', 2,
                pictures: [['en' => 'Hot', 'img' => 'hot'], ['en' => 'Cold', 'img' => 'cold']],
                plain: [['en' => 'Coffee'], ['en' => 'Water']],
                phrases: [
                    'a' => [
                        'words' => ['hot', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Café caliente', 'correct' => ['café', 'caliente'], 'extra' => ['frío', 'agua']],
                            'de' => ['sentence' => 'Heißer Kaffee', 'correct' => ['heiß', 'Kaffee'], 'extra' => ['kalt', 'Wasser']],
                            'ja' => ['sentence' => '熱いコーヒー', 'correct' => ['熱い', 'コーヒー'], 'extra' => ['冷たい']],
                            'ko' => ['sentence' => '뜨거운 커피', 'correct' => ['뜨거운', '커피'], 'extra' => ['차가운']],
                            'fr' => ['sentence' => 'Un café chaud', 'correct' => ['chaud', 'café'], 'extra' => ['froid', 'eau']],
                            'tr' => ['sentence' => 'sıcak kahve', 'correct' => ['sıcak', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'горячий кофе', 'correct' => ['горячий', 'кофе'], 'extra' => []],
                        'ar' => ['sentence' => 'ساخن قهوة', 'correct' => ['ساخن', 'قهوة'], 'extra' => []],
                        'az' => ['sentence' => 'isti qəhvə', 'correct' => ['isti', 'qəhvə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['cold', 'water'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Agua fría', 'correct' => ['frío', 'agua'], 'extra' => ['caliente', 'café']],
                            'de' => ['sentence' => 'Kaltes Wasser', 'correct' => ['kalt', 'Wasser'], 'extra' => ['heiß', 'Kaffee']],
                            'ja' => ['sentence' => '冷たい水', 'correct' => ['冷たい', '水'], 'extra' => ['熱い']],
                            'ko' => ['sentence' => '차가운 물', 'correct' => ['차가운', '물'], 'extra' => ['뜨거운']],
                            'fr' => ['sentence' => "De l'eau froide", 'correct' => ['froid', 'eau'], 'extra' => ['chaud', 'café']],
                            'tr' => ['sentence' => 'soğuk su', 'correct' => ['soğuk', 'su'], 'extra' => []],
                        'ru' => ['sentence' => 'холодный вода', 'correct' => ['холодный', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'بارد ماء', 'correct' => ['بارد', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'soyuq su', 'correct' => ['soyuq', 'su'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['hot', 'coffee', 'and', 'cold', 'water'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Café caliente y agua fría', 'correct' => ['caliente', 'café', 'y', 'frío', 'agua'], 'extra' => ['grande']],
                            'de' => ['sentence' => 'Heißer Kaffee und kaltes Wasser', 'correct' => ['heiß', 'Kaffee', 'und', 'kalt', 'Wasser'], 'extra' => ['groß']],
                            'ja' => ['sentence' => '熱いコーヒーと冷たい水', 'correct' => ['熱い', 'コーヒー', 'と', '冷たい', '水'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '뜨거운 커피와 차가운 물', 'correct' => ['뜨거운', '커피와', '차가운', '물'], 'extra' => ['큰']],
                            'fr' => ['sentence' => "Un café chaud et de l'eau froide", 'correct' => ['chaud', 'café', 'et', 'froid', 'eau'], 'extra' => ['grand']],
                            'tr' => ['sentence' => 'sıcak kahve ve soğuk su', 'correct' => ['sıcak', 'kahve', 've', 'soğuk', 'su'], 'extra' => []],
                        'ru' => ['sentence' => 'горячий кофе и холодный вода', 'correct' => ['горячий', 'кофе', 'и', 'холодный', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'ساخن قهوة و بارد ماء', 'correct' => ['ساخن', 'قهوة', 'و', 'بارد', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'isti qəhvə və soyuq su', 'correct' => ['isti', 'qəhvə', 'və', 'soyuq', 'su'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Beautiful & Pretty', 3,
                pictures: [['en' => 'House', 'img' => 'house'], ['en' => 'Park', 'img' => 'park']],
                plain: [['en' => 'Beautiful'], ['en' => 'Pretty']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'beautiful', 'house'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una casa hermosa', 'correct' => ['una', 'hermoso', 'casa'], 'extra' => ['bonito', 'parque']],
                            'de' => ['sentence' => 'Ein schönes Haus', 'correct' => ['ein', 'schön', 'Haus'], 'extra' => ['hübsch', 'Park']],
                            'ja' => ['sentence' => '美しい家', 'correct' => ['美しい', '家'], 'extra' => ['かわいい']],
                            'ko' => ['sentence' => '아름다운 집', 'correct' => ['아름다운', '집'], 'extra' => ['예쁜']],
                            'fr' => ['sentence' => 'Une belle maison', 'correct' => ['une', 'maison', 'beau'], 'extra' => ['joli', 'parc']],
                            'tr' => ['sentence' => 'güzel bir ev', 'correct' => ['güzel', 'bir', 'ev'], 'extra' => []],
                        'ru' => ['sentence' => 'красивый дом', 'correct' => ['красивый', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'جميل بيت', 'correct' => ['جميل', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'bir gözəl ev', 'correct' => ['bir', 'gözəl', 'ev'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'pretty', 'park'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un parque bonito', 'correct' => ['un', 'parque', 'bonito'], 'extra' => ['hermoso', 'casa']],
                            'de' => ['sentence' => 'Ein hübscher Park', 'correct' => ['ein', 'hübsch', 'Park'], 'extra' => ['schön', 'Haus']],
                            'ja' => ['sentence' => 'かわいい公園', 'correct' => ['かわいい', '公園'], 'extra' => ['美しい']],
                            'ko' => ['sentence' => '예쁜 공원', 'correct' => ['예쁜', '공원'], 'extra' => ['아름다운']],
                            'fr' => ['sentence' => 'Un joli parc', 'correct' => ['un', 'joli', 'parc'], 'extra' => ['beau', 'maison']],
                            'tr' => ['sentence' => 'güzel bir park', 'correct' => ['güzel', 'bir', 'park'], 'extra' => []],
                        'ru' => ['sentence' => 'красивый парк', 'correct' => ['красивый', 'парк'], 'extra' => []],
                        'ar' => ['sentence' => 'جميل حديقة', 'correct' => ['جميل', 'حديقة'], 'extra' => []],
                        'az' => ['sentence' => 'bir gözəl park', 'correct' => ['bir', 'gözəl', 'park'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'beautiful', 'and', 'pretty', 'park'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un parque hermoso y bonito', 'correct' => ['un', 'parque', 'hermoso', 'y', 'bonito'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein schöner und hübscher Park', 'correct' => ['ein', 'schön', 'und', 'hübsch', 'Park'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '美しくてかわいい公園', 'correct' => ['美しくて', 'かわいい', '公園'], 'extra' => ['家']],
                            'ko' => ['sentence' => '아름답고 예쁜 공원', 'correct' => ['아름답고', '예쁜', '공원'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'Un parc beau et joli', 'correct' => ['un', 'parc', 'beau', 'et', 'joli'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'güzel ve hoş bir park', 'correct' => ['güzel', 've', 'hoş', 'bir', 'park'], 'extra' => []],
                        'ru' => ['sentence' => 'красивый и красивый парк', 'correct' => ['красивый', 'и', 'красивый', 'парк'], 'extra' => []],
                        'ar' => ['sentence' => 'جميل و جميل حديقة', 'correct' => ['جميل', 'و', 'جميل', 'حديقة'], 'extra' => []],
                        'az' => ['sentence' => 'bir gözəl və gözəl park', 'correct' => ['bir', 'gözəl', 'və', 'gözəl', 'park'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Easy & Hard', 4,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'Table', 'img' => 'table']],
                plain: [['en' => 'Easy'], ['en' => 'Hard']],
                phrases: [
                    'a' => [
                        'words' => ['an', 'easy', 'book'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro fácil', 'correct' => ['un', 'libro', 'fácil'], 'extra' => ['difícil', 'mesa']],
                            'de' => ['sentence' => 'Ein einfaches Buch', 'correct' => ['ein', 'einfach', 'Buch'], 'extra' => ['schwer', 'Tisch']],
                            'ja' => ['sentence' => '簡単な本', 'correct' => ['簡単な', '本'], 'extra' => ['難しい']],
                            'ko' => ['sentence' => '쉬운 책', 'correct' => ['쉬운', '책'], 'extra' => ['어려운']],
                            'fr' => ['sentence' => 'Un livre facile', 'correct' => ['un', 'livre', 'facile'], 'extra' => ['difficile', 'table']],
                            'tr' => ['sentence' => 'kolay bir kitap', 'correct' => ['kolay', 'bir', 'kitap'], 'extra' => []],
                        'ru' => ['sentence' => 'легко книга', 'correct' => ['легко', 'книга'], 'extra' => []],
                        'ar' => ['sentence' => 'سهل كتاب', 'correct' => ['سهل', 'كتاب'], 'extra' => []],
                        'az' => ['sentence' => 'bir asan kitab', 'correct' => ['bir', 'asan', 'kitab'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'hard', 'table'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una mesa dura', 'correct' => ['una', 'difícil', 'mesa'], 'extra' => ['fácil', 'libro']],
                            'de' => ['sentence' => 'Ein harter Tisch', 'correct' => ['ein', 'schwer', 'Tisch'], 'extra' => ['einfach', 'Buch']],
                            'ja' => ['sentence' => '硬いテーブル', 'correct' => ['硬い', 'テーブル'], 'extra' => ['簡単']],
                            'ko' => ['sentence' => '단단한 탁자', 'correct' => ['단단한', '탁자'], 'extra' => ['쉬운']],
                            'fr' => ['sentence' => 'Une table dure', 'correct' => ['une', 'table', 'difficile'], 'extra' => ['facile', 'livre']],
                            'tr' => ['sentence' => 'sert bir masa', 'correct' => ['sert', 'bir', 'masa'], 'extra' => []],
                        'ru' => ['sentence' => 'трудно стол', 'correct' => ['трудно', 'стол'], 'extra' => []],
                        'ar' => ['sentence' => 'صعب طاولة', 'correct' => ['صعب', 'طاولة'], 'extra' => []],
                        'az' => ['sentence' => 'bir çətin masa', 'correct' => ['bir', 'çətin', 'masa'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['easy', 'or', 'hard'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Fácil o difícil', 'correct' => ['fácil', 'o', 'difícil'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Einfach oder schwer', 'correct' => ['einfach', 'oder', 'schwer'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '簡単か難しい', 'correct' => ['簡単', 'か', '難しい'], 'extra' => ['本']],
                            'ko' => ['sentence' => '쉽거나 어려운', 'correct' => ['쉽거나', '어려운'], 'extra' => ['책']],
                            'fr' => ['sentence' => 'Facile ou difficile', 'correct' => ['facile', 'ou', 'difficile'], 'extra' => ['livre']],
                            'tr' => ['sentence' => 'kolay veya zor', 'correct' => ['kolay', 'veya', 'zor'], 'extra' => []],
                        'ru' => ['sentence' => 'легко или трудно', 'correct' => ['легко', 'или', 'трудно'], 'extra' => []],
                        'ar' => ['sentence' => 'سهل أو صعب', 'correct' => ['سهل', 'أو', 'صعب'], 'extra' => []],
                        'az' => ['sentence' => 'asan və ya çətin', 'correct' => ['asan', 'və ya', 'çətin'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Good Book', 5,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Good'], ['en' => 'New']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'good', 'book'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un buen libro', 'correct' => ['un', 'bueno', 'libro'], 'extra' => ['nuevo', 'casa']],
                            'de' => ['sentence' => 'Ein gutes Buch', 'correct' => ['ein', 'gut', 'Buch'], 'extra' => ['neu', 'Haus']],
                            'ja' => ['sentence' => '良い本', 'correct' => ['良い', '本'], 'extra' => ['新しい']],
                            'ko' => ['sentence' => '좋은 책', 'correct' => ['좋은', '책'], 'extra' => ['새로운']],
                            'fr' => ['sentence' => 'Un bon livre', 'correct' => ['un', 'bon', 'livre'], 'extra' => ['nouveau', 'maison']],
                            'tr' => ['sentence' => 'iyi bir kitap', 'correct' => ['iyi', 'bir', 'kitap'], 'extra' => []],
                        'ru' => ['sentence' => 'хороший книга', 'correct' => ['хороший', 'книга'], 'extra' => []],
                        'ar' => ['sentence' => 'جيد كتاب', 'correct' => ['جيد', 'كتاب'], 'extra' => []],
                        'az' => ['sentence' => 'bir yaxşı kitab', 'correct' => ['bir', 'yaxşı', 'kitab'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'new', 'house'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una casa nueva', 'correct' => ['una', 'nuevo', 'casa'], 'extra' => ['bueno', 'libro']],
                            'de' => ['sentence' => 'Ein neues Haus', 'correct' => ['ein', 'neu', 'Haus'], 'extra' => ['gut', 'Buch']],
                            'ja' => ['sentence' => '新しい家', 'correct' => ['新しい', '家'], 'extra' => ['良い']],
                            'ko' => ['sentence' => '새 집', 'correct' => ['새', '집'], 'extra' => ['좋은']],
                            'fr' => ['sentence' => 'Une nouvelle maison', 'correct' => ['une', 'maison', 'nouveau'], 'extra' => ['bon', 'livre']],
                            'tr' => ['sentence' => 'yeni bir ev', 'correct' => ['yeni', 'bir', 'ev'], 'extra' => []],
                        'ru' => ['sentence' => 'новый дом', 'correct' => ['новый', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'جديد بيت', 'correct' => ['جديد', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'bir yeni ev', 'correct' => ['bir', 'yeni', 'ev'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'good', 'and', 'new', 'book'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un libro bueno y nuevo', 'correct' => ['un', 'libro', 'bueno', 'y', 'nuevo'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ein gutes und neues Buch', 'correct' => ['ein', 'gut', 'und', 'neu', 'Buch'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '良くて新しい本', 'correct' => ['良くて', '新しい', '本'], 'extra' => ['家']],
                            'ko' => ['sentence' => '좋고 새로운 책', 'correct' => ['좋고', '새로운', '책'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'Un bon et nouveau livre', 'correct' => ['un', 'bon', 'et', 'nouveau', 'livre'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'iyi ve yeni bir kitap', 'correct' => ['iyi', 've', 'yeni', 'bir', 'kitap'], 'extra' => []],
                        'ru' => ['sentence' => 'хороший и новый книга', 'correct' => ['хороший', 'и', 'новый', 'книга'], 'extra' => []],
                        'ar' => ['sentence' => 'جيد و جديد كتاب', 'correct' => ['جيد', 'و', 'جديد', 'كتاب'], 'extra' => []],
                        'az' => ['sentence' => 'bir yaxşı və yeni kitab', 'correct' => ['bir', 'yaxşı', 'və', 'yeni', 'kitab'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
