<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitConversation10Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Maşın' => 'car', 'Böyük' => 'big', 'Ev' => 'house', 'Kitab' => 'book',
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water', 'Süd' => 'milk',
    ];

    /**
     * Azerbaijani Conversation Unit 10.
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
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Comparisons & Preferences', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Bigger & Smaller', 1,
                pictures: [['az' => 'Maşın', 'img' => 'car'], ['az' => 'Böyük', 'img' => 'big']],
                plain: [['az' => 'Evdə'], ['az' => 'Daha böyük']],
                phrases: [
                    'a' => [
                        'words' => ['evdə', 'daha böyük'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The house is bigger', 'correct' => ['the house', 'is', 'bigger'], 'extra' => ['smaller']],
                            'fr' => ['sentence' => 'La maison est plus grande', 'correct' => ['la maison', 'est', 'plus grande'], 'extra' => ['plus petite']],
                            'es' => ['sentence' => 'La casa es más grande', 'correct' => ['la casa', 'es', 'más grande'], 'extra' => ['más pequeña']],
                            'de' => ['sentence' => 'Das Haus ist größer', 'correct' => ['das Haus', 'ist', 'größer'], 'extra' => ['kleiner']],
                            'ja' => ['sentence' => '家はもっと大きいです', 'correct' => ['家は', 'もっと', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '집은 더 커요', 'correct' => ['집은', '더', '커요'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'ev daha büyük', 'correct' => ['ev', 'daha', 'büyük'], 'extra' => ['araba']],
                            'ru' => ['sentence' => 'доме больше', 'correct' => ['доме', 'больше'], 'extra' => ['меньше']],
                            'ar' => ['sentence' => 'البيت أكبر', 'correct' => ['البيت', 'أكبر'], 'extra' => ['أصغر']],
                        ],
                    ],
                    'b' => [
                        'words' => ['maşın', 'daha kiçik'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The car is smaller', 'correct' => ['the car', 'is', 'smaller'], 'extra' => ['bigger']],
                            'fr' => ['sentence' => 'La voiture est plus petite', 'correct' => ['la voiture', 'est', 'plus petite'], 'extra' => ['plus grande']],
                            'es' => ['sentence' => 'El coche es más pequeño', 'correct' => ['el coche', 'es', 'más pequeño'], 'extra' => ['más grande']],
                            'de' => ['sentence' => 'Das Auto ist kleiner', 'correct' => ['das Auto', 'ist', 'kleiner'], 'extra' => ['größer']],
                            'ja' => ['sentence' => '車はもっと小さいです', 'correct' => ['車は', 'もっと', '小さいです'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '자동차는 더 작아요', 'correct' => ['자동차는', '더', '작아요'], 'extra' => ['큰']],
                            'tr' => ['sentence' => 'araba daha küçük', 'correct' => ['araba', 'daha', 'küçük'], 'extra' => ['büyük', 'ev']],
                            'ru' => ['sentence' => 'машина меньше', 'correct' => ['машина', 'меньше'], 'extra' => ['больше']],
                            'ar' => ['sentence' => 'سيارة أصغر', 'correct' => ['سيارة', 'أصغر'], 'extra' => ['أكبر']],
                        ],
                    ],
                    'c' => [
                        'words' => ['böyük', 'və', 'kiçik'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Big and small', 'correct' => ['big', 'and', 'small'], 'extra' => ['more']],
                            'fr' => ['sentence' => 'Grand et petit', 'correct' => ['grand', 'et', 'petit'], 'extra' => ['plus']],
                            'es' => ['sentence' => 'Grande y pequeño', 'correct' => ['grande', 'y', 'pequeño'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Groß und klein', 'correct' => ['groß', 'und', 'klein'], 'extra' => ['mehr']],
                            'ja' => ['sentence' => '大きいと小さい', 'correct' => ['大きい', 'と', '小さい'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '큰 것과 작은 것', 'correct' => ['큰 것과', '작은 것'], 'extra' => ['더']],
                            'tr' => ['sentence' => 'büyük ve küçük', 'correct' => ['büyük', 've', 'küçük'], 'extra' => ['daha', 'ev']],
                            'ru' => ['sentence' => 'большой и маленький', 'correct' => ['большой', 'и', 'маленький'], 'extra' => ['больше']],
                            'ar' => ['sentence' => 'كبير و صغير', 'correct' => ['كبير', 'و', 'صغير'], 'extra' => ['أكثر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: The Best One', 2,
                pictures: [['az' => 'Ev', 'img' => 'house'], ['az' => 'Kitab', 'img' => 'book']],
                plain: [['az' => 'Bu'], ['az' => 'Ən yaxşı']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'ən yaxşı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is the best', 'correct' => ['this', 'is', 'the best'], 'extra' => ['better']],
                            'fr' => ['sentence' => 'Ceci est le meilleur', 'correct' => ['ceci', 'est', 'le meilleur'], 'extra' => ['plus']],
                            'es' => ['sentence' => 'Esto es el mejor', 'correct' => ['esto', 'es', 'el mejor'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Das ist am besten', 'correct' => ['das', 'ist', 'am besten'], 'extra' => ['besser']],
                            'ja' => ['sentence' => 'これは最も良いです', 'correct' => ['これは', '最も', '良いです'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '이것은 가장 좋아요', 'correct' => ['이것은', '가장', '좋아요'], 'extra' => ['더']],
                            'tr' => ['sentence' => 'bu en iyi', 'correct' => ['bu', 'en', 'iyi'], 'extra' => ['i̇yi', 'kitap']],
                            'ru' => ['sentence' => 'это самый лучший', 'correct' => ['это', 'самый', 'лучший'], 'extra' => ['лучше']],
                            'ar' => ['sentence' => 'هذا الأفضل', 'correct' => ['هذا', 'الأفضل'], 'extra' => ['أحسن']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ən böyük', 'ev'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The biggest house', 'correct' => ['the biggest', 'house'], 'extra' => ['smallest']],
                            'fr' => ['sentence' => 'La plus grande maison', 'correct' => ['la plus grande', 'maison'], 'extra' => ['plus petite']],
                            'es' => ['sentence' => 'La casa más grande', 'correct' => ['la casa', 'más grande'], 'extra' => ['más pequeña']],
                            'de' => ['sentence' => 'Das größte Haus', 'correct' => ['das größte', 'Haus'], 'extra' => ['kleinste']],
                            'ja' => ['sentence' => '最も大きい家', 'correct' => ['最も', '大きい', '家'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '가장 큰 집', 'correct' => ['가장', '큰', '집'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'en büyük ev', 'correct' => ['en', 'büyük', 'ev'], 'extra' => ['i̇yi', 'kitap']],
                            'ru' => ['sentence' => 'самый большой дом', 'correct' => ['самый', 'большой', 'дом'], 'extra' => []],
                            'ar' => ['sentence' => 'الأكبر بيت', 'correct' => ['الأكبر', 'بيت'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'kitab', 'daha yaxşı'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This book is better', 'correct' => ['this', 'book', 'is', 'better'], 'extra' => ['the best']],
                            'fr' => ['sentence' => 'Ce livre est meilleur', 'correct' => ['ce', 'livre', 'est', 'meilleur'], 'extra' => ['le meilleur']],
                            'es' => ['sentence' => 'Este libro es mejor', 'correct' => ['este', 'libro', 'es', 'mejor'], 'extra' => ['el mejor']],
                            'de' => ['sentence' => 'Dieses Buch ist besser', 'correct' => ['dieses', 'Buch', 'ist', 'besser'], 'extra' => ['am besten']],
                            'ja' => ['sentence' => 'この本はもっと良いです', 'correct' => ['この', '本は', 'もっと', '良いです'], 'extra' => ['最も']],
                            'ko' => ['sentence' => '이 책은 더 좋아요', 'correct' => ['이', '책은', '더', '좋아요'], 'extra' => ['가장']],
                            'tr' => ['sentence' => 'bu kitap daha iyi', 'correct' => ['bu', 'kitap', 'daha', 'iyi'], 'extra' => ['en', 'i̇yi']],
                            'ru' => ['sentence' => 'это книга лучше', 'correct' => ['это', 'книга', 'лучше'], 'extra' => ['самый', 'лучший']],
                            'ar' => ['sentence' => 'هذا كتاب أحسن', 'correct' => ['هذا', 'كتاب', 'أحسن'], 'extra' => ['الأفضل']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: New & Old', 3,
                pictures: [['az' => 'Maşın', 'img' => 'car'], ['az' => 'Kitab', 'img' => 'book']],
                plain: [['az' => 'Bu'], ['az' => 'Yeni']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'maşın', 'yeni'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This car is new', 'correct' => ['this', 'car', 'is', 'new'], 'extra' => ['old']],
                            'fr' => ['sentence' => 'Cette voiture est nouvelle', 'correct' => ['cette', 'voiture', 'est', 'nouvelle'], 'extra' => ['vieille']],
                            'es' => ['sentence' => 'Este coche es nuevo', 'correct' => ['este', 'coche', 'es', 'nuevo'], 'extra' => ['viejo']],
                            'de' => ['sentence' => 'Dieses Auto ist neu', 'correct' => ['dieses', 'Auto', 'ist', 'neu'], 'extra' => ['alt']],
                            'ja' => ['sentence' => 'この車は新しいです', 'correct' => ['この', '車は', '新しいです'], 'extra' => ['古い']],
                            'ko' => ['sentence' => '이 자동차는 새로워요', 'correct' => ['이', '자동차는', '새로워요'], 'extra' => ['오래된']],
                            'tr' => ['sentence' => 'bu araba yeni', 'correct' => ['bu', 'araba', 'yeni'], 'extra' => ['eski', 'kitap']],
                            'ru' => ['sentence' => 'это машина новый', 'correct' => ['это', 'машина', 'новый'], 'extra' => ['старый']],
                            'ar' => ['sentence' => 'هذا سيارة جديد', 'correct' => ['هذا', 'سيارة', 'جديد'], 'extra' => ['قديم']],
                        ],
                    ],
                    'b' => [
                        'words' => ['kitab', 'daha yaşlı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The book is older', 'correct' => ['the book', 'is', 'older'], 'extra' => ['newer']],
                            'fr' => ['sentence' => 'Le livre est plus vieux', 'correct' => ['le livre', 'est', 'plus vieux'], 'extra' => ['plus nouveau']],
                            'es' => ['sentence' => 'El libro es más viejo', 'correct' => ['el libro', 'es', 'más viejo'], 'extra' => ['más nuevo']],
                            'de' => ['sentence' => 'Das Buch ist älter', 'correct' => ['das Buch', 'ist', 'älter'], 'extra' => ['neuer']],
                            'ja' => ['sentence' => '本はもっと古いです', 'correct' => ['本は', 'もっと', '古いです'], 'extra' => ['新しい']],
                            'ko' => ['sentence' => '책은 더 오래됐어요', 'correct' => ['책은', '더', '오래됐어요'], 'extra' => ['새로운']],
                            'tr' => ['sentence' => 'kitap daha eski', 'correct' => ['kitap', 'daha', 'eski'], 'extra' => ['yeni', 'araba']],
                            'ru' => ['sentence' => 'книга старше', 'correct' => ['книга', 'старше'], 'extra' => []],
                            'ar' => ['sentence' => 'كتاب أكبر سنا', 'correct' => ['كتاب', 'أكبر سنا'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['yeni', 'və', 'köhnə'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'New and old', 'correct' => ['new', 'and', 'old'], 'extra' => ['more']],
                            'fr' => ['sentence' => 'Nouveau et vieux', 'correct' => ['nouveau', 'et', 'vieux'], 'extra' => ['plus']],
                            'es' => ['sentence' => 'Nuevo y viejo', 'correct' => ['nuevo', 'y', 'viejo'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Neu und alt', 'correct' => ['neu', 'und', 'alt'], 'extra' => ['mehr']],
                            'ja' => ['sentence' => '新しいと古い', 'correct' => ['新しい', 'と', '古い'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '새로운 것과 오래된 것', 'correct' => ['새로운 것과', '오래된 것'], 'extra' => ['더']],
                            'tr' => ['sentence' => 'yeni ve eski', 'correct' => ['yeni', 've', 'eski'], 'extra' => ['araba', 'kitap']],
                            'ru' => ['sentence' => 'новый и старый', 'correct' => ['новый', 'и', 'старый'], 'extra' => ['больше']],
                            'ar' => ['sentence' => 'جديد و قديم', 'correct' => ['جديد', 'و', 'قديم'], 'extra' => ['أكثر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: I Prefer', 4,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Üstünlük verirəm'], ['az' => 'Daha yaxşı']],
                phrases: [
                    'a' => [
                        'words' => ['üstünlük verirəm', 'qəhvə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I prefer coffee', 'correct' => ['I prefer', 'coffee'], 'extra' => ['tea']],
                            'fr' => ['sentence' => 'Je préfère le café', 'correct' => ['je préfère', 'le café'], 'extra' => ['le thé']],
                            'es' => ['sentence' => 'Prefiero el café', 'correct' => ['prefiero', 'el café'], 'extra' => ['el té']],
                            'de' => ['sentence' => 'Ich bevorzuge Kaffee', 'correct' => ['ich bevorzuge', 'Kaffee'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'コーヒーを好みます', 'correct' => ['コーヒーを', '好みます'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피를 선호해요', 'correct' => ['커피를', '선호해요'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'kahve tercih ederim', 'correct' => ['kahve', 'tercih ederim'], 'extra' => ['çay', 'çay']],
                            'ru' => ['sentence' => 'я предпочитаю кофе', 'correct' => ['я', 'предпочитаю', 'кофе'], 'extra' => ['чай']],
                            'ar' => ['sentence' => 'أفضل قهوة', 'correct' => ['أفضل', 'قهوة'], 'extra' => ['شاي']],
                        ],
                    ],
                    'b' => [
                        'words' => ['üstünlük verirəm', 'çay'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I prefer tea', 'correct' => ['I prefer', 'tea'], 'extra' => ['coffee']],
                            'fr' => ['sentence' => 'Je préfère le thé', 'correct' => ['je préfère', 'le thé'], 'extra' => ['le café']],
                            'es' => ['sentence' => 'Prefiero el té', 'correct' => ['prefiero', 'el té'], 'extra' => ['el café']],
                            'de' => ['sentence' => 'Ich bevorzuge Tee', 'correct' => ['ich bevorzuge', 'Tee'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お茶を好みます', 'correct' => ['お茶を', '好みます'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '차를 선호해요', 'correct' => ['차를', '선호해요'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'çay tercih ederim', 'correct' => ['çay', 'tercih ederim'], 'extra' => ['kahve', 'kahve']],
                            'ru' => ['sentence' => 'я предпочитаю чай', 'correct' => ['я', 'предпочитаю', 'чай'], 'extra' => ['кофе']],
                            'ar' => ['sentence' => 'أفضل شاي', 'correct' => ['أفضل', 'شاي'], 'extra' => ['قهوة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['qəhvə', 'daha yaxşı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Coffee is better', 'correct' => ['coffee', 'is', 'better'], 'extra' => ['tea']],
                            'fr' => ['sentence' => 'Le café est meilleur', 'correct' => ['le café', 'est', 'meilleur'], 'extra' => ['le thé']],
                            'es' => ['sentence' => 'El café es mejor', 'correct' => ['el café', 'es', 'mejor'], 'extra' => ['el té']],
                            'de' => ['sentence' => 'Kaffee ist besser', 'correct' => ['Kaffee', 'ist', 'besser'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'コーヒーはもっと良いです', 'correct' => ['コーヒーは', 'もっと', '良いです'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피는 더 좋아요', 'correct' => ['커피는', '더', '좋아요'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'kahve daha iyi', 'correct' => ['kahve', 'daha', 'iyi'], 'extra' => ['çay', 'çay']],
                            'ru' => ['sentence' => 'кофе лучше', 'correct' => ['кофе', 'лучше'], 'extra' => ['чай']],
                            'ar' => ['sentence' => 'قهوة أحسن', 'correct' => ['قهوة', 'أحسن'], 'extra' => ['شاي']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Putting It Together', 5,
                pictures: [['az' => 'Çay', 'img' => 'tea'], ['az' => 'Maşın', 'img' => 'car']],
                plain: [['az' => 'Məncə'], ['az' => 'Daha yaxşı']],
                phrases: [
                    'a' => [
                        'words' => ['məncə', 'çay', 'daha yaxşı'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion tea is nicer', 'correct' => ['in my opinion', 'tea', 'is', 'nicer'], 'extra' => ['coffee']],
                            'fr' => ['sentence' => 'À mon avis le thé est plus beau', 'correct' => ['à mon avis', 'le thé', 'est', 'plus beau'], 'extra' => ['le café']],
                            'es' => ['sentence' => 'En mi opinión el té es más bonito', 'correct' => ['en mi opinión', 'el té', 'es', 'más bonito'], 'extra' => ['el café']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist Tee schöner', 'correct' => ['meiner Meinung nach', 'ist', 'Tee', 'schöner'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '私の意見ではお茶はもっと素敵です', 'correct' => ['私の意見では', 'お茶は', 'もっと', '素敵です'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '제 생각에는 차가 더 멋져요', 'correct' => ['제 생각에는', '차가', '더', '멋져요'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bence çay daha güzel', 'correct' => ['bence', 'çay', 'daha', 'güzel'], 'extra' => ['tercih ederim', 'küçük']],
                            'ru' => ['sentence' => 'по-моему чай лучше', 'correct' => ['по-моему', 'чай', 'лучше'], 'extra' => ['кофе']],
                            'ar' => ['sentence' => 'برأيي شاي أحسن', 'correct' => ['برأيي', 'شاي', 'أحسن'], 'extra' => ['قهوة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ən kiçik', 'maşın'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The smallest car', 'correct' => ['the smallest', 'car'], 'extra' => ['biggest']],
                            'fr' => ['sentence' => 'La plus petite voiture', 'correct' => ['la plus petite', 'voiture'], 'extra' => ['plus grande']],
                            'es' => ['sentence' => 'El coche más pequeño', 'correct' => ['el coche', 'más pequeño'], 'extra' => ['más grande']],
                            'de' => ['sentence' => 'Das kleinste Auto', 'correct' => ['das kleinste', 'Auto'], 'extra' => ['größte']],
                            'ja' => ['sentence' => '最も小さい車', 'correct' => ['最も', '小さい', '車'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '가장 작은 자동차', 'correct' => ['가장', '작은', '자동차'], 'extra' => ['큰']],
                            'tr' => ['sentence' => 'en küçük araba', 'correct' => ['en', 'küçük', 'araba'], 'extra' => ['tercih ederim', 'ev']],
                            'ru' => ['sentence' => 'самый маленький машина', 'correct' => ['самый', 'маленький', 'машина'], 'extra' => []],
                            'ar' => ['sentence' => 'الأصغر سيارة', 'correct' => ['الأصغر', 'سيارة'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['mən', 'üstünlük verirəm', 'qəhvə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I prefer coffee', 'correct' => ['I', 'prefer', 'coffee'], 'extra' => ['tea']],
                            'fr' => ['sentence' => 'Moi je préfère le café', 'correct' => ['moi', 'je préfère', 'le café'], 'extra' => ['le thé']],
                            'es' => ['sentence' => 'Yo prefiero el café', 'correct' => ['yo', 'prefiero', 'el café'], 'extra' => ['el té']],
                            'de' => ['sentence' => 'Ich bevorzuge Kaffee', 'correct' => ['ich', 'bevorzuge', 'Kaffee'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '私はコーヒーを好みます', 'correct' => ['私は', 'コーヒーを', '好みます'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '저는 커피를 선호해요', 'correct' => ['저는', '커피를', '선호해요'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'ben kahve tercih ederim', 'correct' => ['ben', 'kahve', 'tercih ederim'], 'extra' => ['küçük', 'ev']],
                            'ru' => ['sentence' => 'я предпочитаю кофе', 'correct' => ['я', 'предпочитаю', 'кофе'], 'extra' => ['чай']],
                            'ar' => ['sentence' => 'أنا أفضل قهوة', 'correct' => ['أنا', 'أفضل', 'قهوة'], 'extra' => ['شاي']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
