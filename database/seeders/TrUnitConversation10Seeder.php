<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitConversation10Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Ev' => 'house', 'Kitap' => 'book', 'Kahve' => 'coffee',
        'Çay' => 'tea', 'Araba' => 'car',
    ];

    /**
     * Turkish Conversation Unit 10 — comparing and preferring.
     *
     * THE RULE THIS UNIT TEACHES: NOTHING ATTACHES WHEN YOU COMPARE.
     *
     * After nine units of suffixes gluing onto everything, comparison is the
     * exception worth ending the chapter on. Turkish puts a separate word in
     * FRONT of the adjective and leaves the adjective alone:
     *
     *     büyük        big
     *     daha büyük   bigger      (not büyükrek, not büyükçe)
     *     en büyük     biggest
     *
     * English changes the adjective itself (big, bigger, biggest); Turkish
     * never does. So `daha` and `büyük` are two tiles, and the English word
     * bank offers one tile "bigger" against them. The counts deliberately do
     * not line up, because that mismatch is the lesson.
     *
     * `tercih ederim` is a two-word verb kept as ONE tile: `tercih` alone is a
     * noun meaning "preference" and `ederim` is a light verb that means almost
     * nothing by itself. Splitting them would hand the learner two pieces
     * neither of which is usable.
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Comparisons & Preferences', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Bigger & Smaller', 1,
                pictures: [['tr' => 'Ev', 'img' => 'house'], ['tr' => 'Araba', 'img' => 'car']],
                plain: [['tr' => 'Daha'], ['tr' => 'Büyük']],
                phrases: [
                    'a' => [
                        // Two Turkish tiles against one English word: `bigger`.
                        'words' => ['ev', 'daha', 'büyük'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The house is bigger', 'correct' => ['the house', 'is', 'bigger'], 'extra' => ['smaller']],
                            'az' => ['sentence' => 'evdə daha böyük', 'correct' => ['evdə', 'daha böyük'], 'extra' => ['daha kiçik']],
                            'ar' => ['sentence' => 'البيت أكبر', 'correct' => ['البيت', 'أكبر'], 'extra' => ['أصغر']],
                            'ru' => ['sentence' => 'доме больше', 'correct' => ['доме', 'больше'], 'extra' => ['меньше']],
                            'fr' => ['sentence' => 'La maison est plus grande', 'correct' => ['la maison', 'est', 'plus grande'], 'extra' => ['plus petite']],
                            'es' => ['sentence' => 'La casa es más grande', 'correct' => ['la casa', 'es', 'más grande'], 'extra' => ['más pequeña']],
                            'de' => ['sentence' => 'Das Haus ist größer', 'correct' => ['das Haus', 'ist', 'größer'], 'extra' => ['kleiner']],
                            'ja' => ['sentence' => '家はもっと大きいです', 'correct' => ['家は', 'もっと', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '집은 더 커요', 'correct' => ['집은', '더', '커요'], 'extra' => ['작은']],
                        ],
                    ],
                    'b' => [
                        'words' => ['araba', 'daha', 'küçük'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The car is smaller', 'correct' => ['the car', 'is', 'smaller'], 'extra' => ['bigger']],
                            'az' => ['sentence' => 'maşın daha kiçik', 'correct' => ['maşın', 'daha kiçik'], 'extra' => ['daha böyük']],
                            'ar' => ['sentence' => 'سيارة أصغر', 'correct' => ['سيارة', 'أصغر'], 'extra' => ['أكبر']],
                            'ru' => ['sentence' => 'машина меньше', 'correct' => ['машина', 'меньше'], 'extra' => ['больше']],
                            'fr' => ['sentence' => 'La voiture est plus petite', 'correct' => ['la voiture', 'est', 'plus petite'], 'extra' => ['plus grande']],
                            'es' => ['sentence' => 'El coche es más pequeño', 'correct' => ['el coche', 'es', 'más pequeño'], 'extra' => ['más grande']],
                            'de' => ['sentence' => 'Das Auto ist kleiner', 'correct' => ['das Auto', 'ist', 'kleiner'], 'extra' => ['größer']],
                            'ja' => ['sentence' => '車はもっと小さいです', 'correct' => ['車は', 'もっと', '小さいです'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '자동차는 더 작아요', 'correct' => ['자동차는', '더', '작아요'], 'extra' => ['큰']],
                        ],
                    ],
                    'c' => [
                        // The bare adjective, so `daha` is visibly separate.
                        'words' => ['büyük', 've', 'küçük'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Big and small', 'correct' => ['big', 'and', 'small'], 'extra' => ['more']],
                            'az' => ['sentence' => 'böyük və kiçik', 'correct' => ['böyük', 'və', 'kiçik'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'كبير و صغير', 'correct' => ['كبير', 'و', 'صغير'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'большой и маленький', 'correct' => ['большой', 'и', 'маленький'], 'extra' => ['больше']],
                            'fr' => ['sentence' => 'Grand et petit', 'correct' => ['grand', 'et', 'petit'], 'extra' => ['plus']],
                            'es' => ['sentence' => 'Grande y pequeño', 'correct' => ['grande', 'y', 'pequeño'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Groß und klein', 'correct' => ['groß', 'und', 'klein'], 'extra' => ['mehr']],
                            'ja' => ['sentence' => '大きいと小さい', 'correct' => ['大きい', 'と', '小さい'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '큰 것과 작은 것', 'correct' => ['큰 것과', '작은 것'], 'extra' => ['더']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: The Best One', 2,
                pictures: [['tr' => 'Kitap', 'img' => 'book'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'En'], ['tr' => 'İyi']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'en', 'iyi'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is the best', 'correct' => ['this', 'is', 'the best'], 'extra' => ['better']],
                            'az' => ['sentence' => 'bu ən yaxşı', 'correct' => ['bu', 'ən yaxşı'], 'extra' => ['daha yaxşı']],
                            'ar' => ['sentence' => 'هذا الأفضل', 'correct' => ['هذا', 'الأفضل'], 'extra' => ['أحسن']],
                            'ru' => ['sentence' => 'это самый лучший', 'correct' => ['это', 'самый', 'лучший'], 'extra' => ['лучше']],
                            'fr' => ['sentence' => 'Ceci est le meilleur', 'correct' => ['ceci', 'est', 'le meilleur'], 'extra' => ['plus']],
                            'es' => ['sentence' => 'Esto es el mejor', 'correct' => ['esto', 'es', 'el mejor'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Das ist am besten', 'correct' => ['das', 'ist', 'am besten'], 'extra' => ['besser']],
                            'ja' => ['sentence' => 'これは最も良いです', 'correct' => ['これは', '最も', '良いです'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '이것은 가장 좋아요', 'correct' => ['이것은', '가장', '좋아요'], 'extra' => ['더']],
                        ],
                    ],
                    'b' => [
                        'words' => ['en', 'büyük', 'ev'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The biggest house', 'correct' => ['the biggest', 'house'], 'extra' => ['smallest']],
                            'az' => ['sentence' => 'ən böyük ev', 'correct' => ['ən böyük', 'ev'], 'extra' => []],
                            'ar' => ['sentence' => 'الأكبر بيت', 'correct' => ['الأكبر', 'بيت'], 'extra' => []],
                            'ru' => ['sentence' => 'самый большой дом', 'correct' => ['самый', 'большой', 'дом'], 'extra' => []],
                            'fr' => ['sentence' => 'La plus grande maison', 'correct' => ['la plus grande', 'maison'], 'extra' => ['plus petite']],
                            'es' => ['sentence' => 'La casa más grande', 'correct' => ['la casa', 'más grande'], 'extra' => ['más pequeña']],
                            'de' => ['sentence' => 'Das größte Haus', 'correct' => ['das größte', 'Haus'], 'extra' => ['kleinste']],
                            'ja' => ['sentence' => '最も大きい家', 'correct' => ['最も', '大きい', '家'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '가장 큰 집', 'correct' => ['가장', '큰', '집'], 'extra' => ['작은']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'kitap', 'daha', 'iyi'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'This book is better', 'correct' => ['this', 'book', 'is', 'better'], 'extra' => ['the best']],
                            'az' => ['sentence' => 'bu kitab daha yaxşı', 'correct' => ['bu', 'kitab', 'daha yaxşı'], 'extra' => ['ən yaxşı']],
                            'ar' => ['sentence' => 'هذا كتاب أحسن', 'correct' => ['هذا', 'كتاب', 'أحسن'], 'extra' => ['الأفضل']],
                            'ru' => ['sentence' => 'это книга лучше', 'correct' => ['это', 'книга', 'лучше'], 'extra' => ['самый', 'лучший']],
                            'fr' => ['sentence' => 'Ce livre est meilleur', 'correct' => ['ce', 'livre', 'est', 'meilleur'], 'extra' => ['le meilleur']],
                            'es' => ['sentence' => 'Este libro es mejor', 'correct' => ['este', 'libro', 'es', 'mejor'], 'extra' => ['el mejor']],
                            'de' => ['sentence' => 'Dieses Buch ist besser', 'correct' => ['dieses', 'Buch', 'ist', 'besser'], 'extra' => ['am besten']],
                            'ja' => ['sentence' => 'この本はもっと良いです', 'correct' => ['この', '本は', 'もっと', '良いです'], 'extra' => ['最も']],
                            'ko' => ['sentence' => '이 책은 더 좋아요', 'correct' => ['이', '책은', '더', '좋아요'], 'extra' => ['가장']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: New & Old', 3,
                pictures: [['tr' => 'Araba', 'img' => 'car'], ['tr' => 'Kitap', 'img' => 'book']],
                plain: [['tr' => 'Yeni'], ['tr' => 'Eski']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'araba', 'yeni'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This car is new', 'correct' => ['this', 'car', 'is', 'new'], 'extra' => ['old']],
                            'az' => ['sentence' => 'bu maşın yeni', 'correct' => ['bu', 'maşın', 'yeni'], 'extra' => ['köhnə']],
                            'ar' => ['sentence' => 'هذا سيارة جديد', 'correct' => ['هذا', 'سيارة', 'جديد'], 'extra' => ['قديم']],
                            'ru' => ['sentence' => 'это машина новый', 'correct' => ['это', 'машина', 'новый'], 'extra' => ['старый']],
                            'fr' => ['sentence' => 'Cette voiture est nouvelle', 'correct' => ['cette', 'voiture', 'est', 'nouvelle'], 'extra' => ['vieille']],
                            'es' => ['sentence' => 'Este coche es nuevo', 'correct' => ['este', 'coche', 'es', 'nuevo'], 'extra' => ['viejo']],
                            'de' => ['sentence' => 'Dieses Auto ist neu', 'correct' => ['dieses', 'Auto', 'ist', 'neu'], 'extra' => ['alt']],
                            'ja' => ['sentence' => 'この車は新しいです', 'correct' => ['この', '車は', '新しいです'], 'extra' => ['古い']],
                            'ko' => ['sentence' => '이 자동차는 새로워요', 'correct' => ['이', '자동차는', '새로워요'], 'extra' => ['오래된']],
                        ],
                    ],
                    'b' => [
                        'words' => ['kitap', 'daha', 'eski'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The book is older', 'correct' => ['the book', 'is', 'older'], 'extra' => ['newer']],
                            'az' => ['sentence' => 'kitab daha yaşlı', 'correct' => ['kitab', 'daha yaşlı'], 'extra' => []],
                            'ar' => ['sentence' => 'كتاب أكبر سنا', 'correct' => ['كتاب', 'أكبر سنا'], 'extra' => []],
                            'ru' => ['sentence' => 'книга старше', 'correct' => ['книга', 'старше'], 'extra' => []],
                            'fr' => ['sentence' => 'Le livre est plus vieux', 'correct' => ['le livre', 'est', 'plus vieux'], 'extra' => ['plus nouveau']],
                            'es' => ['sentence' => 'El libro es más viejo', 'correct' => ['el libro', 'es', 'más viejo'], 'extra' => ['más nuevo']],
                            'de' => ['sentence' => 'Das Buch ist älter', 'correct' => ['das Buch', 'ist', 'älter'], 'extra' => ['neuer']],
                            'ja' => ['sentence' => '本はもっと古いです', 'correct' => ['本は', 'もっと', '古いです'], 'extra' => ['新しい']],
                            'ko' => ['sentence' => '책은 더 오래됐어요', 'correct' => ['책은', '더', '오래됐어요'], 'extra' => ['새로운']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yeni', 've', 'eski'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'New and old', 'correct' => ['new', 'and', 'old'], 'extra' => ['more']],
                            'az' => ['sentence' => 'yeni və köhnə', 'correct' => ['yeni', 'və', 'köhnə'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'جديد و قديم', 'correct' => ['جديد', 'و', 'قديم'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'новый и старый', 'correct' => ['новый', 'и', 'старый'], 'extra' => ['больше']],
                            'fr' => ['sentence' => 'Nouveau et vieux', 'correct' => ['nouveau', 'et', 'vieux'], 'extra' => ['plus']],
                            'es' => ['sentence' => 'Nuevo y viejo', 'correct' => ['nuevo', 'y', 'viejo'], 'extra' => ['más']],
                            'de' => ['sentence' => 'Neu und alt', 'correct' => ['neu', 'und', 'alt'], 'extra' => ['mehr']],
                            'ja' => ['sentence' => '新しいと古い', 'correct' => ['新しい', 'と', '古い'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '새로운 것과 오래된 것', 'correct' => ['새로운 것과', '오래된 것'], 'extra' => ['더']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: I Prefer', 4,
                pictures: [['tr' => 'Kahve', 'img' => 'coffee'], ['tr' => 'Çay', 'img' => 'tea']],
                plain: [['tr' => 'Kahve'], ['tr' => 'Çay']],
                phrases: [
                    'a' => [
                        // `tercih ederim` is one tile: neither half stands alone.
                        'words' => ['kahve', 'tercih ederim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I prefer coffee', 'correct' => ['I prefer', 'coffee'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'üstünlük verirəm qəhvə', 'correct' => ['üstünlük verirəm', 'qəhvə'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أفضل قهوة', 'correct' => ['أفضل', 'قهوة'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'я предпочитаю кофе', 'correct' => ['я', 'предпочитаю', 'кофе'], 'extra' => ['чай']],
                            'fr' => ['sentence' => 'Je préfère le café', 'correct' => ['je préfère', 'le café'], 'extra' => ['le thé']],
                            'es' => ['sentence' => 'Prefiero el café', 'correct' => ['prefiero', 'el café'], 'extra' => ['el té']],
                            'de' => ['sentence' => 'Ich bevorzuge Kaffee', 'correct' => ['ich bevorzuge', 'Kaffee'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'コーヒーを好みます', 'correct' => ['コーヒーを', '好みます'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피를 선호해요', 'correct' => ['커피를', '선호해요'], 'extra' => ['차']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çay', 'tercih ederim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I prefer tea', 'correct' => ['I prefer', 'tea'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'üstünlük verirəm çay', 'correct' => ['üstünlük verirəm', 'çay'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'أفضل شاي', 'correct' => ['أفضل', 'شاي'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'я предпочитаю чай', 'correct' => ['я', 'предпочитаю', 'чай'], 'extra' => ['кофе']],
                            'fr' => ['sentence' => 'Je préfère le thé', 'correct' => ['je préfère', 'le thé'], 'extra' => ['le café']],
                            'es' => ['sentence' => 'Prefiero el té', 'correct' => ['prefiero', 'el té'], 'extra' => ['el café']],
                            'de' => ['sentence' => 'Ich bevorzuge Tee', 'correct' => ['ich bevorzuge', 'Tee'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お茶を好みます', 'correct' => ['お茶を', '好みます'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '차를 선호해요', 'correct' => ['차를', '선호해요'], 'extra' => ['커피']],
                        ],
                    ],
                    'c' => [
                        'words' => ['kahve', 'daha', 'iyi'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Coffee is better', 'correct' => ['coffee', 'is', 'better'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'qəhvə daha yaxşı', 'correct' => ['qəhvə', 'daha yaxşı'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'قهوة أحسن', 'correct' => ['قهوة', 'أحسن'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'кофе лучше', 'correct' => ['кофе', 'лучше'], 'extra' => ['чай']],
                            'fr' => ['sentence' => 'Le café est meilleur', 'correct' => ['le café', 'est', 'meilleur'], 'extra' => ['le thé']],
                            'es' => ['sentence' => 'El café es mejor', 'correct' => ['el café', 'es', 'mejor'], 'extra' => ['el té']],
                            'de' => ['sentence' => 'Kaffee ist besser', 'correct' => ['Kaffee', 'ist', 'besser'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'コーヒーはもっと良いです', 'correct' => ['コーヒーは', 'もっと', '良いです'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피는 더 좋아요', 'correct' => ['커피는', '더', '좋아요'], 'extra' => ['차']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Putting It Together', 5,
                pictures: [['tr' => 'Ev', 'img' => 'house'], ['tr' => 'Kahve', 'img' => 'coffee']],
                plain: [['tr' => 'Tercih ederim'], ['tr' => 'Küçük']],
                phrases: [
                    'a' => [
                        'words' => ['bence', 'çay', 'daha', 'güzel'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'In my opinion tea is nicer', 'correct' => ['in my opinion', 'tea', 'is', 'nicer'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'məncə çay daha yaxşı', 'correct' => ['məncə', 'çay', 'daha yaxşı'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'برأيي شاي أحسن', 'correct' => ['برأيي', 'شاي', 'أحسن'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'по-моему чай лучше', 'correct' => ['по-моему', 'чай', 'лучше'], 'extra' => ['кофе']],
                            'fr' => ['sentence' => 'À mon avis le thé est plus beau', 'correct' => ['à mon avis', 'le thé', 'est', 'plus beau'], 'extra' => ['le café']],
                            'es' => ['sentence' => 'En mi opinión el té es más bonito', 'correct' => ['en mi opinión', 'el té', 'es', 'más bonito'], 'extra' => ['el café']],
                            'de' => ['sentence' => 'Meiner Meinung nach ist Tee schöner', 'correct' => ['meiner Meinung nach', 'ist', 'Tee', 'schöner'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '私の意見ではお茶はもっと素敵です', 'correct' => ['私の意見では', 'お茶は', 'もっと', '素敵です'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '제 생각에는 차가 더 멋져요', 'correct' => ['제 생각에는', '차가', '더', '멋져요'], 'extra' => ['커피']],
                        ],
                    ],
                    'b' => [
                        'words' => ['en', 'küçük', 'araba'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The smallest car', 'correct' => ['the smallest', 'car'], 'extra' => ['biggest']],
                            'az' => ['sentence' => 'ən kiçik maşın', 'correct' => ['ən kiçik', 'maşın'], 'extra' => []],
                            'ar' => ['sentence' => 'الأصغر سيارة', 'correct' => ['الأصغر', 'سيارة'], 'extra' => []],
                            'ru' => ['sentence' => 'самый маленький машина', 'correct' => ['самый', 'маленький', 'машина'], 'extra' => []],
                            'fr' => ['sentence' => 'La plus petite voiture', 'correct' => ['la plus petite', 'voiture'], 'extra' => ['plus grande']],
                            'es' => ['sentence' => 'El coche más pequeño', 'correct' => ['el coche', 'más pequeño'], 'extra' => ['más grande']],
                            'de' => ['sentence' => 'Das kleinste Auto', 'correct' => ['das kleinste', 'Auto'], 'extra' => ['größte']],
                            'ja' => ['sentence' => '最も小さい車', 'correct' => ['最も', '小さい', '車'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '가장 작은 자동차', 'correct' => ['가장', '작은', '자동차'], 'extra' => ['큰']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ben', 'kahve', 'tercih ederim'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I prefer coffee', 'correct' => ['I', 'prefer', 'coffee'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'mən üstünlük verirəm qəhvə', 'correct' => ['mən', 'üstünlük verirəm', 'qəhvə'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أنا أفضل قهوة', 'correct' => ['أنا', 'أفضل', 'قهوة'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'я предпочитаю кофе', 'correct' => ['я', 'предпочитаю', 'кофе'], 'extra' => ['чай']],
                            'fr' => ['sentence' => 'Moi je préfère le café', 'correct' => ['moi', 'je préfère', 'le café'], 'extra' => ['le thé']],
                            'es' => ['sentence' => 'Yo prefiero el café', 'correct' => ['yo', 'prefiero', 'el café'], 'extra' => ['el té']],
                            'de' => ['sentence' => 'Ich bevorzuge Kaffee', 'correct' => ['ich', 'bevorzuge', 'Kaffee'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '私はコーヒーを好みます', 'correct' => ['私は', 'コーヒーを', '好みます'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '저는 커피를 선호해요', 'correct' => ['저는', '커피를', '선호해요'], 'extra' => ['차']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
