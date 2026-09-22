<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitBeginner06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Park' => 'park', 'Mağaza' => 'shop', 'Böyük' => 'big', 'Küçə' => 'street',
        'Getmək' => 'park', 'Qəhvə' => 'coffee', 'Dost' => 'friend', 'Çay' => 'tea',
    ];

    /**
     * Azerbaijani Beginner Unit 6.
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
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Places', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Park & Shop', 1,
                pictures: [['az' => 'Park', 'img' => 'park'], ['az' => 'Mağaza', 'img' => 'shop']],
                plain: [['az' => 'Bir'], ['az' => 'Və']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'park'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A park', 'correct' => ['a', 'park'], 'extra' => ['shop', 'and']],
                            'fr' => ['sentence' => 'Un parc', 'correct' => ['un', 'parc'], 'extra' => ['magasin', 'et']],
                            'es' => ['sentence' => 'Un parque', 'correct' => ['un', 'parque'], 'extra' => ['tienda', 'y']],
                            'de' => ['sentence' => 'Ein Park', 'correct' => ['ein', 'Park'], 'extra' => ['Geschäft', 'und']],
                            'ja' => ['sentence' => '公園', 'correct' => ['公園'], 'extra' => ['店', 'と']],
                            'ko' => ['sentence' => '공원', 'correct' => ['공원'], 'extra' => ['가게', '그리고']],
                            'tr' => ['sentence' => 'bir park', 'correct' => ['bir', 'park'], 'extra' => ['ve', 'dükkân']],
                            'ru' => ['sentence' => 'парк', 'correct' => ['парк'], 'extra' => ['магазин', 'и']],
                            'ar' => ['sentence' => 'حديقة', 'correct' => ['حديقة'], 'extra' => ['متجر', 'و']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'mağaza'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A shop', 'correct' => ['a', 'shop'], 'extra' => ['park', 'and']],
                            'fr' => ['sentence' => 'Un magasin', 'correct' => ['un', 'magasin'], 'extra' => ['parc', 'et']],
                            'es' => ['sentence' => 'Una tienda', 'correct' => ['una', 'tienda'], 'extra' => ['parque', 'y']],
                            'de' => ['sentence' => 'Ein Geschäft', 'correct' => ['ein', 'Geschäft'], 'extra' => ['Park', 'und']],
                            'ja' => ['sentence' => '店', 'correct' => ['店'], 'extra' => ['公園', 'と']],
                            'ko' => ['sentence' => '가게', 'correct' => ['가게'], 'extra' => ['공원', '그리고']],
                            'tr' => ['sentence' => 'bir dükkân', 'correct' => ['bir', 'dükkân'], 'extra' => ['ve', 'park']],
                            'ru' => ['sentence' => 'магазин', 'correct' => ['магазин'], 'extra' => ['парк', 'и']],
                            'ar' => ['sentence' => 'متجر', 'correct' => ['متجر'], 'extra' => ['حديقة', 'و']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'park', 'və', 'bir', 'mağaza'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A park and a shop', 'correct' => ['a', 'park', 'and', 'a', 'shop'], 'extra' => ['street']],
                            'fr' => ['sentence' => 'Un parc et un magasin', 'correct' => ['un', 'parc', 'et', 'un', 'magasin'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Un parque y una tienda', 'correct' => ['un', 'parque', 'y', 'una', 'tienda'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein Park und ein Geschäft', 'correct' => ['ein', 'Park', 'und', 'ein', 'Geschäft'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '公園と店', 'correct' => ['公園', 'と', '店'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '공원과 가게', 'correct' => ['공원과', '가게'], 'extra' => ['거리']],
                            'tr' => ['sentence' => 'bir park ve bir dükkân', 'correct' => ['bir', 'park', 've', 'bir', 'dükkân'], 'extra' => []],
                            'ru' => ['sentence' => 'парк и магазин', 'correct' => ['парк', 'и', 'магазин'], 'extra' => ['улица']],
                            'ar' => ['sentence' => 'حديقة و متجر', 'correct' => ['حديقة', 'و', 'متجر'], 'extra' => ['شارع']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Street & Station', 2,
                pictures: [['az' => 'Böyük', 'img' => 'big'], ['az' => 'Küçə', 'img' => 'street']],
                plain: [['az' => 'Bir'], ['az' => 'Kiçik']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'böyük', 'küçə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A big street', 'correct' => ['a', 'big', 'street'], 'extra' => ['station']],
                            'fr' => ['sentence' => 'Une grande rue', 'correct' => ['une', 'grande', 'rue'], 'extra' => ['gare']],
                            'es' => ['sentence' => 'Una calle grande', 'correct' => ['una', 'calle', 'grande'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Eine große Straße', 'correct' => ['eine', 'große', 'Straße'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '大きい通り', 'correct' => ['大きい', '通り'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '큰 거리', 'correct' => ['큰', '거리'], 'extra' => ['역']],
                            'tr' => ['sentence' => 'büyük bir sokak', 'correct' => ['büyük', 'bir', 'sokak'], 'extra' => ['küçük', 'i̇stasyon']],
                            'ru' => ['sentence' => 'большой улица', 'correct' => ['большой', 'улица'], 'extra' => ['станция']],
                            'ar' => ['sentence' => 'كبير شارع', 'correct' => ['كبير', 'شارع'], 'extra' => ['محطة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'kiçik', 'stansiya'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A small station', 'correct' => ['a', 'small', 'station'], 'extra' => ['street']],
                            'fr' => ['sentence' => 'Une petite gare', 'correct' => ['une', 'petite', 'gare'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Una estación pequeña', 'correct' => ['una', 'estación', 'pequeña'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein kleiner Bahnhof', 'correct' => ['ein', 'kleiner', 'Bahnhof'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '小さい駅', 'correct' => ['小さい', '駅'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '작은 역', 'correct' => ['작은', '역'], 'extra' => ['거리']],
                            'tr' => ['sentence' => 'küçük bir istasyon', 'correct' => ['küçük', 'bir', 'istasyon'], 'extra' => ['büyük', 'sokak']],
                            'ru' => ['sentence' => 'маленький станция', 'correct' => ['маленький', 'станция'], 'extra' => ['улица']],
                            'ar' => ['sentence' => 'صغير محطة', 'correct' => ['صغير', 'محطة'], 'extra' => ['شارع']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'küçə', 'və', 'bir', 'stansiya'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A street and a station', 'correct' => ['a', 'street', 'and', 'a', 'station'], 'extra' => ['park']],
                            'fr' => ['sentence' => 'Une rue et une gare', 'correct' => ['une', 'rue', 'et', 'une', 'gare'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Una calle y una estación', 'correct' => ['una', 'calle', 'y', 'una', 'estación'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Eine Straße und ein Bahnhof', 'correct' => ['eine', 'Straße', 'und', 'ein', 'Bahnhof'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '通りと駅', 'correct' => ['通り', 'と', '駅'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '거리와 역', 'correct' => ['거리와', '역'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'bir sokak ve bir istasyon', 'correct' => ['bir', 'sokak', 've', 'bir', 'istasyon'], 'extra' => ['büyük', 'küçük']],
                            'ru' => ['sentence' => 'улица и станция', 'correct' => ['улица', 'и', 'станция'], 'extra' => ['парк']],
                            'ar' => ['sentence' => 'شارع و محطة', 'correct' => ['شارع', 'و', 'محطة'], 'extra' => ['حديقة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Going to the Park', 3,
                pictures: [['az' => 'Getmək', 'img' => 'park'], ['az' => 'Park', 'img' => 'park']],
                plain: [['az' => 'Parka'], ['az' => 'Evdəyəm']],
                phrases: [
                    'a' => [
                        'words' => ['getmək', 'parka'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park', 'correct' => ['to go', 'to the park'], 'extra' => ['house']],
                            'fr' => ['sentence' => 'Aller au parc', 'correct' => ['aller', 'au parc'], 'extra' => ['maison']],
                            'es' => ['sentence' => 'Ir al parque', 'correct' => ['ir', 'al parque'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Zum Park gehen', 'correct' => ['zum Park', 'gehen'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '公園へ行く', 'correct' => ['公園', 'へ', '行く'], 'extra' => ['家']],
                            'ko' => ['sentence' => '공원에 가다', 'correct' => ['공원에', '가다'], 'extra' => ['집']],
                            'tr' => ['sentence' => 'parka gitmek', 'correct' => ['parka', 'gitmek'], 'extra' => ['park', 'ev']],
                            'ru' => ['sentence' => 'идти в парк', 'correct' => ['идти', 'в', 'парк'], 'extra' => ['дом']],
                            'ar' => ['sentence' => 'الذهاب إلى الحديقة', 'correct' => ['الذهاب', 'إلى', 'الحديقة'], 'extra' => ['بيت']],
                        ],
                    ],
                    'b' => [
                        'words' => ['getmək', 'evdəyəm'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go home', 'correct' => ['to go', 'home'], 'extra' => ['park']],
                            'fr' => ['sentence' => 'Aller à la maison', 'correct' => ['aller', 'à la maison'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Ir a casa', 'correct' => ['ir', 'a casa'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Nach Hause gehen', 'correct' => ['nach Hause', 'gehen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '家へ行く', 'correct' => ['家', 'へ', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '집에 가다', 'correct' => ['집에', '가다'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'eve gitmek', 'correct' => ['eve', 'gitmek'], 'extra' => ['parka', 'park']],
                            'ru' => ['sentence' => 'идти дома', 'correct' => ['идти', 'дома'], 'extra' => ['парк']],
                            'ar' => ['sentence' => 'الذهاب في البيت', 'correct' => ['الذهاب', 'في البيت'], 'extra' => ['حديقة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['getmək', 'park', 'və', 'evdəyəm'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'To go to the park and home', 'correct' => ['to go', 'to the', 'park and', 'home'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Aller au parc et à la maison', 'correct' => ['aller', 'au parc', 'et', 'à la maison'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir al parque y a casa', 'correct' => ['ir', 'al parque', 'y', 'a casa'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Zum Park und nach Hause gehen', 'correct' => ['zum Park', 'und', 'nach Hause', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '公園と家へ行く', 'correct' => ['公園', 'と', '家', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '공원과 집에 가다', 'correct' => ['공원과', '집에', '가다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'parka ve eve gitmek', 'correct' => ['parka', 've', 'eve', 'gitmek'], 'extra' => ['park', 'ev']],
                            'ru' => ['sentence' => 'идти в парк и дома', 'correct' => ['идти', 'в', 'парк', 'и', 'дома'], 'extra' => ['школа']],
                            'ar' => ['sentence' => 'الذهاب إلى حديقة و في البيت', 'correct' => ['الذهاب', 'إلى', 'حديقة', 'و', 'في البيت'], 'extra' => ['مدرسة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Going to School', 4,
                pictures: [['az' => 'Getmək', 'img' => 'park'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Məktəbə'], ['az' => 'Mağazaya']],
                phrases: [
                    'a' => [
                        'words' => ['getmək', 'məktəbə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go to school', 'correct' => ['to go', 'to school'], 'extra' => ['shop']],
                            'fr' => ['sentence' => "Aller à l'école", 'correct' => ['aller', "à l'école"], 'extra' => ['magasin']],
                            'es' => ['sentence' => 'Ir a la escuela', 'correct' => ['ir', 'a la escuela'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Zur Schule gehen', 'correct' => ['zur Schule', 'gehen'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => '学校へ行く', 'correct' => ['学校', 'へ', '行く'], 'extra' => ['店']],
                            'ko' => ['sentence' => '학교에 가다', 'correct' => ['학교에', '가다'], 'extra' => ['가게']],
                            'tr' => ['sentence' => 'okula gitmek', 'correct' => ['okula', 'gitmek'], 'extra' => ['okul', 'dükkân']],
                            'ru' => ['sentence' => 'идти в школу', 'correct' => ['идти', 'в', 'школу'], 'extra' => ['магазин']],
                            'ar' => ['sentence' => 'الذهاب إلى المدرسة', 'correct' => ['الذهاب', 'إلى المدرسة'], 'extra' => ['متجر']],
                        ],
                    ],
                    'b' => [
                        'words' => ['getmək', 'mağazaya'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To go to the shop', 'correct' => ['to go', 'to the shop'], 'extra' => ['school']],
                            'fr' => ['sentence' => 'Aller au magasin', 'correct' => ['aller', 'au magasin'], 'extra' => ['école']],
                            'es' => ['sentence' => 'Ir a la tienda', 'correct' => ['ir', 'a la tienda'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Zum Geschäft gehen', 'correct' => ['zum Geschäft', 'gehen'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '店へ行く', 'correct' => ['店', 'へ', '行く'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '가게에 가다', 'correct' => ['가게에', '가다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'dükkâna gitmek', 'correct' => ['dükkâna', 'gitmek'], 'extra' => ['okula', 'okul']],
                            'ru' => ['sentence' => 'идти в магазин', 'correct' => ['идти', 'в', 'магазин'], 'extra' => ['школа']],
                            'ar' => ['sentence' => 'الذهاب إلى المتجر', 'correct' => ['الذهاب', 'إلى', 'المتجر'], 'extra' => ['مدرسة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['getmək', 'məktəbə', 'və', 'mağazaya'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'To go to school and to the shop', 'correct' => ['to go', 'to school', 'and', 'to the shop'], 'extra' => ['park']],
                            'fr' => ['sentence' => "Aller à l'école et au magasin", 'correct' => ['aller', "à l'école", 'et', 'au magasin'], 'extra' => ['parc']],
                            'es' => ['sentence' => 'Ir a la escuela y a la tienda', 'correct' => ['ir', 'a la escuela', 'y', 'a la tienda'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Zur Schule und zum Geschäft gehen', 'correct' => ['zur Schule', 'und', 'zum Geschäft', 'gehen'], 'extra' => ['Park']],
                            'ja' => ['sentence' => '学校と店へ行く', 'correct' => ['学校', 'と', '店', 'へ', '行く'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '학교와 가게에 가다', 'correct' => ['학교와', '가게에', '가다'], 'extra' => ['공원']],
                            'tr' => ['sentence' => 'okula ve dükkâna gitmek', 'correct' => ['okula', 've', 'dükkâna', 'gitmek'], 'extra' => ['okul', 'dükkân']],
                            'ru' => ['sentence' => 'идти в школу и в магазин', 'correct' => ['идти', 'в', 'школу', 'и', 'в', 'магазин'], 'extra' => ['парк']],
                            'ar' => ['sentence' => 'الذهاب إلى المدرسة و إلى المتجر', 'correct' => ['الذهاب', 'إلى المدرسة', 'و', 'إلى', 'المتجر'], 'extra' => ['حديقة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Around Town', 5,
                pictures: [['az' => 'Böyük', 'img' => 'big'], ['az' => 'Dost', 'img' => 'friend']],
                plain: [['az' => 'Bir'], ['az' => 'Stansiya']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'böyük', 'stansiya'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A big station', 'correct' => ['a', 'big', 'station'], 'extra' => ['street']],
                            'fr' => ['sentence' => 'Une grande gare', 'correct' => ['une', 'grande', 'gare'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Una estación grande', 'correct' => ['una', 'estación', 'grande'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Ein großer Bahnhof', 'correct' => ['ein', 'großer', 'Bahnhof'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '大きい駅', 'correct' => ['大きい', '駅'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '큰 역', 'correct' => ['큰', '역'], 'extra' => ['거리']],
                            'tr' => ['sentence' => 'büyük bir istasyon', 'correct' => ['büyük', 'bir', 'istasyon'], 'extra' => ['gitmek', 'i̇stasyon']],
                            'ru' => ['sentence' => 'большой станция', 'correct' => ['большой', 'станция'], 'extra' => ['улица']],
                            'ar' => ['sentence' => 'كبير محطة', 'correct' => ['كبير', 'محطة'], 'extra' => ['شارع']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mənim', 'dost', 'getmək', 'parka'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'My friend to go to the park', 'correct' => ['my', 'friend', 'to go', 'to the park'], 'extra' => ['station']],
                            'fr' => ['sentence' => 'Mon ami aller au parc', 'correct' => ['mon', 'ami', 'aller', 'au parc'], 'extra' => ['gare']],
                            'es' => ['sentence' => 'Mi amigo ir al parque', 'correct' => ['mi', 'amigo', 'ir', 'al parque'], 'extra' => ['estación']],
                            'de' => ['sentence' => 'Mein Freund zum Park gehen', 'correct' => ['mein', 'Freund', 'zum Park', 'gehen'], 'extra' => ['Bahnhof']],
                            'ja' => ['sentence' => '私の友達が公園へ行く', 'correct' => ['私の', '友達', 'が', '公園', 'へ', '行く'], 'extra' => ['駅']],
                            'ko' => ['sentence' => '내 친구가 공원에 가다', 'correct' => ['내', '친구가', '공원에', '가다'], 'extra' => ['역']],
                            'tr' => ['sentence' => 'benim arkadaşım parka gitmek', 'correct' => ['benim', 'arkadaşım', 'parka', 'gitmek'], 'extra' => ['büyük', 'i̇stasyon']],
                            'ru' => ['sentence' => 'мой друг идти в парк', 'correct' => ['мой', 'друг', 'идти', 'в', 'парк'], 'extra' => ['станция']],
                            'ar' => ['sentence' => 'صديق الذهاب إلى الحديقة', 'correct' => ['صديق', 'الذهاب', 'إلى', 'الحديقة'], 'extra' => ['محطة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'küçə', 'və', 'bir', 'stansiya', 'böyük'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A street and a station are big', 'correct' => ['a', 'street', 'and', 'a', 'station are', 'big'], 'extra' => ['small']],
                            'fr' => ['sentence' => 'Une rue et une gare sont grandes', 'correct' => ['une', 'rue', 'et', 'une', 'gare sont', 'grandes'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'Una calle y una estación son grandes', 'correct' => ['una', 'calle', 'y', 'una', 'estación son', 'grandes'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Eine Straße und ein Bahnhof sind groß', 'correct' => ['eine', 'Straße', 'und', 'ein', 'Bahnhof sind', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '通りと駅は大きい', 'correct' => ['通り', 'と', '駅', 'は', '大きい'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '거리와 역은 큽니다', 'correct' => ['거리와', '역은', '큽니다'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'bir sokak ve bir istasyon büyük', 'correct' => ['bir', 'sokak', 've', 'bir', 'istasyon', 'büyük'], 'extra' => ['gitmek', 'i̇stasyon']],
                            'ru' => ['sentence' => 'улица и станция большой', 'correct' => ['улица', 'и', 'станция', 'большой'], 'extra' => ['маленький']],
                            'ar' => ['sentence' => 'شارع و محطة كبير', 'correct' => ['شارع', 'و', 'محطة', 'كبير'], 'extra' => ['صغير']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
