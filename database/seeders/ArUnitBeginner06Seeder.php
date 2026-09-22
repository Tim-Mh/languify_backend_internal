<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitBeginner06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'حديقة' => 'park', 'متجر' => 'shop', 'كبير' => 'big', 'شارع' => 'street',
        'الذهاب' => 'park', 'قهوة' => 'coffee', 'صديق' => 'friend', 'شاي' => 'tea',
    ];

    /**
     * Arabic Beginner Unit 6.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Places', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Park & Shop', 1,
                pictures: [['ar' => 'حديقة', 'img' => 'park'], ['ar' => 'متجر', 'img' => 'shop']],
                plain: [['ar' => 'هذا'], ['ar' => 'مع السلامة']],
                phrases: [
                    'a' => [
                        'words' => ['هذا', 'حديقة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A park', 'correct' => ['this is', 'a', 'park'], 'extra' => ['shop', 'and']],
                            'az' => ['sentence' => 'bu bir park', 'correct' => ['bu', 'bir', 'park'], 'extra' => ['mağaza', 'və']],
                            'fr' => ['sentence' => "C'est Un parc", 'correct' => ["c'est", 'un', 'parc'], 'extra' => ['magasin', 'et']],
                            'es' => ['sentence' => 'Esto es Un parque', 'correct' => ['esto es', 'un', 'parque'], 'extra' => ['tienda', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Park', 'correct' => ['das ist', 'ein', 'Park'], 'extra' => ['Geschäft', 'und']],
                            'ja' => ['sentence' => 'これは公園です', 'correct' => ['これは', '公園'], 'extra' => ['店', 'と']],
                            'ko' => ['sentence' => '이것은 공원입니다', 'correct' => ['이것은', '공원'], 'extra' => ['가게', '그리고']],
                            'tr' => ['sentence' => 'bir park', 'correct' => ['bir', 'park'], 'extra' => ['ve', 'dükkân']],
                            'ru' => ['sentence' => 'Это парк', 'correct' => ['это', 'парк'], 'extra' => ['магазин', 'и']],
                        ],
                    ],
                    'b' => [
                        'words' => ['هذا', 'متجر'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is A shop', 'correct' => ['this is', 'a', 'shop'], 'extra' => ['park', 'and']],
                            'az' => ['sentence' => 'bu bir mağaza', 'correct' => ['bu', 'bir', 'mağaza'], 'extra' => ['park', 'və']],
                            'fr' => ['sentence' => "C'est Un magasin", 'correct' => ["c'est", 'un', 'magasin'], 'extra' => ['parc', 'et']],
                            'es' => ['sentence' => 'Esto es Una tienda', 'correct' => ['esto es', 'una', 'tienda'], 'extra' => ['parque', 'y']],
                            'de' => ['sentence' => 'Das ist Ein Geschäft', 'correct' => ['das ist', 'ein', 'Geschäft'], 'extra' => ['Park', 'und']],
                            'ja' => ['sentence' => 'これは店です', 'correct' => ['これは', '店'], 'extra' => ['公園', 'と']],
                            'ko' => ['sentence' => '이것은 가게입니다', 'correct' => ['이것은', '가게'], 'extra' => ['공원', '그리고']],
                            'tr' => ['sentence' => 'bir dükkân', 'correct' => ['bir', 'dükkân'], 'extra' => ['ve', 'park']],
                            'ru' => ['sentence' => 'Это магазин', 'correct' => ['это', 'магазин'], 'extra' => ['парк', 'и']],
                        ],
                    ],
                    'c' => [
                        'words' => ['حديقة', 'و', 'متجر'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A park and a shop', 'correct' => ['a', 'park', 'and', 'a', 'shop'], 'extra' => ['street']],
                            'az' => ['sentence' => 'bir park və bir mağaza', 'correct' => ['bir', 'park', 'və', 'bir', 'mağaza'], 'extra' => ['küçə']],
                            'fr' => ['sentence' => 'Un parc et un magasin', 'correct' => ['un', 'parc', 'et', 'un', 'magasin'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Un parque y una tienda', 'correct' => ['un', 'parque', 'y', 'una', 'tienda'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein Park und ein Geschäft', 'correct' => ['ein', 'Park', 'und', 'ein', 'Geschäft'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '公園と店', 'correct' => ['公園', 'と', '店'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '공원과 가게', 'correct' => ['공원과', '가게'], 'extra' => ['거리']],
                            'tr' => ['sentence' => 'bir park ve bir dükkân', 'correct' => ['bir', 'park', 've', 'bir', 'dükkân'], 'extra' => []],
                            'ru' => ['sentence' => 'парк и магазин', 'correct' => ['парк', 'и', 'магазин'], 'extra' => ['улица']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Street & Station', 2,
                pictures: [['ar' => 'كبير', 'img' => 'big'], ['ar' => 'شارع', 'img' => 'street']],
                plain: [['ar' => 'صغير'], ['ar' => 'محطة']],
                phrases: [
                    'a' => [
                        'words' => ['كبير', 'شارع'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big street', 'correct' => ['a', 'big', 'street'], 'extra' => ['station']],
                            'az' => ['sentence' => 'bir böyük küçə', 'correct' => ['bir', 'böyük', 'küçə'], 'extra' => ['stansiya']],
                            'fr' => ['sentence' => 'Une grande rue', 'correct' => ['une', 'grande', 'rue'], 'extra' => ['gare']],
                            'es' => ['sentence' => 'Una calle grande', 'correct' => ['una', 'calle', 'grande'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Eine große Straße', 'correct' => ['eine', 'große', 'Straße'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '大きい通り', 'correct' => ['大きい', '通り'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '큰 거리', 'correct' => ['큰', '거리'], 'extra' => ['역']],
                            'tr' => ['sentence' => 'büyük bir sokak', 'correct' => ['büyük', 'bir', 'sokak'], 'extra' => ['küçük', 'i̇stasyon']],
                            'ru' => ['sentence' => 'большой улица', 'correct' => ['большой', 'улица'], 'extra' => ['станция']],
                        ],
                    ],
                    'b' => [
                        'words' => ['صغير', 'محطة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A small station', 'correct' => ['a', 'small', 'station'], 'extra' => ['street']],
                            'az' => ['sentence' => 'bir kiçik stansiya', 'correct' => ['bir', 'kiçik', 'stansiya'], 'extra' => ['küçə']],
                            'fr' => ['sentence' => 'Une petite gare', 'correct' => ['une', 'petite', 'gare'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Una estación pequeña', 'correct' => ['una', 'estación', 'pequeña'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein kleiner Bahnhof', 'correct' => ['ein', 'kleiner', 'Bahnhof'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '小さい駅', 'correct' => ['小さい', '駅'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '작은 역', 'correct' => ['작은', '역'], 'extra' => ['거리']],
                            'tr' => ['sentence' => 'küçük bir istasyon', 'correct' => ['küçük', 'bir', 'istasyon'], 'extra' => ['büyük', 'sokak']],
                            'ru' => ['sentence' => 'маленький станция', 'correct' => ['маленький', 'станция'], 'extra' => ['улица']],
                        ],
                    ],
                    'c' => [
                        'words' => ['شارع', 'و', 'محطة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A street and a station', 'correct' => ['a', 'street', 'and', 'a', 'station'], 'extra' => ['park']],
                            'az' => ['sentence' => 'bir küçə və bir stansiya', 'correct' => ['bir', 'küçə', 'və', 'bir', 'stansiya'], 'extra' => ['park']],
                            'fr' => ['sentence' => 'Une rue et une gare', 'correct' => ['une', 'rue', 'et', 'une', 'gare'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Una calle y una estación', 'correct' => ['una', 'calle', 'y', 'una', 'estación'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Eine Straße und ein Bahnhof', 'correct' => ['eine', 'Straße', 'und', 'ein', 'Bahnhof'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '通りと駅', 'correct' => ['通り', 'と', '駅'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '거리와 역', 'correct' => ['거리와', '역'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'bir sokak ve bir istasyon', 'correct' => ['bir', 'sokak', 've', 'bir', 'istasyon'], 'extra' => ['büyük', 'küçük']],
                            'ru' => ['sentence' => 'улица и станция', 'correct' => ['улица', 'и', 'станция'], 'extra' => ['парк']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Going to the Park', 3,
                pictures: [['ar' => 'الذهاب', 'img' => 'park'], ['ar' => 'حديقة', 'img' => 'park']],
                plain: [['ar' => 'إلى'], ['ar' => 'الحديقة']],
                phrases: [
                    'a' => [
                        'words' => ['الذهاب', 'إلى', 'الحديقة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park', 'correct' => ['to go', 'to the park'], 'extra' => ['house']],
                            'az' => ['sentence' => 'getmək parka', 'correct' => ['getmək', 'parka'], 'extra' => ['ev']],
                            'fr' => ['sentence' => 'Aller au parc', 'correct' => ['aller', 'au parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Ir al parque', 'correct' => ['ir', 'al parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Zum Park gehen', 'correct' => ['zum Park', 'gehen'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '公園へ行く', 'correct' => ['公園', 'へ', '行く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '공원에 가다', 'correct' => ['공원에', '가다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'parka gitmek', 'correct' => ['parka', 'gitmek'], 'extra' => ['park', 'ev']],
                            'ru' => ['sentence' => 'идти в парк', 'correct' => ['идти', 'в', 'парк'], 'extra' => ['дом']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الذهاب', 'في البيت'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go home', 'correct' => ['to go', 'home'], 'extra' => ['park']],
                            'az' => ['sentence' => 'getmək evdəyəm', 'correct' => ['getmək', 'evdəyəm'], 'extra' => ['park']],
                            'fr' => ['sentence' => 'Aller à la maison', 'correct' => ['aller', 'à la maison'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Ir a casa', 'correct' => ['ir', 'a casa'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Nach Hause gehen', 'correct' => ['nach Hause', 'gehen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '家へ行く', 'correct' => ['家', 'へ', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '집에 가다', 'correct' => ['집에', '가다'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'eve gitmek', 'correct' => ['eve', 'gitmek'], 'extra' => ['parka', 'park']],
                            'ru' => ['sentence' => 'идти дома', 'correct' => ['идти', 'дома'], 'extra' => ['парк']],
                        ],
                    ],
                    'c' => [
                        'words' => ['الذهاب', 'إلى', 'حديقة', 'و', 'في البيت'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park and home', 'correct' => ['to go', 'to the', 'park and', 'home'], 'extra' => ['school']],
                            'az' => ['sentence' => 'getmək park və evdəyəm', 'correct' => ['getmək', 'park', 'və', 'evdəyəm'], 'extra' => ['məktəb']],
                            'fr' => ['sentence' => 'Aller au parc et à la maison', 'correct' => ['aller', 'au parc', 'et', 'à la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir al parque y a casa', 'correct' => ['ir', 'al parque', 'y', 'a casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Zum Park und nach Hause gehen', 'correct' => ['zum Park', 'und', 'nach Hause', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '公園と家へ行く', 'correct' => ['公園', 'と', '家', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '공원과 집에 가다', 'correct' => ['공원과', '집에', '가다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'parka ve eve gitmek', 'correct' => ['parka', 've', 'eve', 'gitmek'], 'extra' => ['park', 'ev']],
                            'ru' => ['sentence' => 'идти в парк и дома', 'correct' => ['идти', 'в', 'парк', 'и', 'дома'], 'extra' => ['школа']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Going to School', 4,
                pictures: [['ar' => 'الذهاب', 'img' => 'park'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'إلى المدرسة'], ['ar' => 'إلى']],
                phrases: [
                    'a' => [
                        'words' => ['الذهاب', 'إلى المدرسة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go to school', 'correct' => ['to go', 'to school'], 'extra' => ['shop']],
                            'az' => ['sentence' => 'getmək məktəbə', 'correct' => ['getmək', 'məktəbə'], 'extra' => ['mağaza']],
                            'fr' => ['sentence' => "Aller à l'école", 'correct' => ['aller', "à l'école"], 'extra' => ['magasin']],
                            'es' => ['sentence' => 'Ir a la escuela', 'correct' => ['ir', 'a la escuela'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Zur Schule gehen', 'correct' => ['zur Schule', 'gehen'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => '学校へ行く', 'correct' => ['学校', 'へ', '行く'], 'extra' => ['店']],
                            'ko' => ['sentence' => '학교에 가다', 'correct' => ['학교에', '가다'], 'extra' => ['가게']],
                            'tr' => ['sentence' => 'okula gitmek', 'correct' => ['okula', 'gitmek'], 'extra' => ['okul', 'dükkân']],
                            'ru' => ['sentence' => 'идти в школу', 'correct' => ['идти', 'в', 'школу'], 'extra' => ['магазин']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الذهاب', 'إلى', 'المتجر'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the shop', 'correct' => ['to go', 'to the shop'], 'extra' => ['school']],
                            'az' => ['sentence' => 'getmək mağazaya', 'correct' => ['getmək', 'mağazaya'], 'extra' => ['məktəb']],
                            'fr' => ['sentence' => 'Aller au magasin', 'correct' => ['aller', 'au magasin'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir a la tienda', 'correct' => ['ir', 'a la tienda'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Zum Geschäft gehen', 'correct' => ['zum Geschäft', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '店へ行く', 'correct' => ['店', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '가게에 가다', 'correct' => ['가게에', '가다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'dükkâna gitmek', 'correct' => ['dükkâna', 'gitmek'], 'extra' => ['okula', 'okul']],
                            'ru' => ['sentence' => 'идти в магазин', 'correct' => ['идти', 'в', 'магазин'], 'extra' => ['школа']],
                        ],
                    ],
                    'c' => [
                        'words' => ['الذهاب', 'إلى المدرسة', 'و', 'إلى', 'المتجر'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go to school and to the shop', 'correct' => ['to go', 'to school', 'and', 'to the shop'], 'extra' => ['park']],
                            'az' => ['sentence' => 'getmək məktəbə və mağazaya', 'correct' => ['getmək', 'məktəbə', 'və', 'mağazaya'], 'extra' => ['park']],
                            'fr' => ['sentence' => "Aller à l'école et au magasin", 'correct' => ['aller', "à l'école", 'et', 'au magasin'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Ir a la escuela y a la tienda', 'correct' => ['ir', 'a la escuela', 'y', 'a la tienda'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Zur Schule und zum Geschäft gehen', 'correct' => ['zur Schule', 'und', 'zum Geschäft', 'gehen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '学校と店へ行く', 'correct' => ['学校', 'と', '店', 'へ', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '학교와 가게에 가다', 'correct' => ['학교와', '가게에', '가다'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'okula ve dükkâna gitmek', 'correct' => ['okula', 've', 'dükkâna', 'gitmek'], 'extra' => ['okul', 'dükkân']],
                            'ru' => ['sentence' => 'идти в школу и в магазин', 'correct' => ['идти', 'в', 'школу', 'и', 'в', 'магазин'], 'extra' => ['парк']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Around Town', 5,
                pictures: [['ar' => 'كبير', 'img' => 'big'], ['ar' => 'صديق', 'img' => 'friend']],
                plain: [['ar' => 'محطة'], ['ar' => 'الذهاب']],
                phrases: [
                    'a' => [
                        'words' => ['كبير', 'محطة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A big station', 'correct' => ['a', 'big', 'station'], 'extra' => ['street']],
                            'az' => ['sentence' => 'bir böyük stansiya', 'correct' => ['bir', 'böyük', 'stansiya'], 'extra' => ['küçə']],
                            'fr' => ['sentence' => 'Une grande gare', 'correct' => ['une', 'grande', 'gare'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Una estación grande', 'correct' => ['una', 'estación', 'grande'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein großer Bahnhof', 'correct' => ['ein', 'großer', 'Bahnhof'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '大きい駅', 'correct' => ['大きい', '駅'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '큰 역', 'correct' => ['큰', '역'], 'extra' => ['거리']],
                            'tr' => ['sentence' => 'büyük bir istasyon', 'correct' => ['büyük', 'bir', 'istasyon'], 'extra' => ['gitmek', 'i̇stasyon']],
                            'ru' => ['sentence' => 'большой станция', 'correct' => ['большой', 'станция'], 'extra' => ['улица']],
                        ],
                    ],
                    'b' => [
                        'words' => ['صديق', 'الذهاب', 'إلى', 'الحديقة'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'My friend to go to the park', 'correct' => ['my', 'friend', 'to go', 'to the park'], 'extra' => ['station']],
                            'az' => ['sentence' => 'mənim dost getmək parka', 'correct' => ['mənim', 'dost', 'getmək', 'parka'], 'extra' => ['stansiya']],
                            'fr' => ['sentence' => 'Mon ami aller au parc', 'correct' => ['mon', 'ami', 'aller', 'au parc'], 'extra' => ['gare']],
                            'es' => ['sentence' => 'Mi amigo ir al parque', 'correct' => ['mi', 'amigo', 'ir', 'al parque'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Mein Freund zum Park gehen', 'correct' => ['mein', 'Freund', 'zum Park', 'gehen'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '私の友達が公園へ行く', 'correct' => ['私の', '友達', 'が', '公園', 'へ', '行く'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '내 친구가 공원에 가다', 'correct' => ['내', '친구가', '공원에', '가다'], 'extra' => ['역']],
                            'tr' => ['sentence' => 'benim arkadaşım parka gitmek', 'correct' => ['benim', 'arkadaşım', 'parka', 'gitmek'], 'extra' => ['büyük', 'i̇stasyon']],
                            'ru' => ['sentence' => 'мой друг идти в парк', 'correct' => ['мой', 'друг', 'идти', 'в', 'парк'], 'extra' => ['станция']],
                        ],
                    ],
                    'c' => [
                        'words' => ['شارع', 'و', 'محطة', 'كبير'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A street and a station are big', 'correct' => ['a', 'street', 'and', 'a', 'station are', 'big'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bir küçə və bir stansiya böyük', 'correct' => ['bir', 'küçə', 'və', 'bir', 'stansiya', 'böyük'], 'extra' => ['kiçik']],
                            'fr' => ['sentence' => 'Une rue et une gare sont grandes', 'correct' => ['une', 'rue', 'et', 'une', 'gare sont', 'grandes'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'Una calle y una estación son grandes', 'correct' => ['una', 'calle', 'y', 'una', 'estación son', 'grandes'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Eine Straße und ein Bahnhof sind groß', 'correct' => ['eine', 'Straße', 'und', 'ein', 'Bahnhof sind', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '通りと駅は大きい', 'correct' => ['通り', 'と', '駅', 'は', '大きい'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '거리와 역은 큽니다', 'correct' => ['거리와', '역은', '큽니다'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'bir sokak ve bir istasyon büyük', 'correct' => ['bir', 'sokak', 've', 'bir', 'istasyon', 'büyük'], 'extra' => ['gitmek', 'i̇stasyon']],
                            'ru' => ['sentence' => 'улица и станция большой', 'correct' => ['улица', 'и', 'станция', 'большой'], 'extra' => ['маленький']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
