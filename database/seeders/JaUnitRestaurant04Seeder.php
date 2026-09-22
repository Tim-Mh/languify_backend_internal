<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant04Seeder extends Seeder
{
    private const PICTURES = [
        'テーブル' => 'table',
        '椅子' => 'chair',
        '時計' => 'clock',
        'カレンダー' => 'calendar',
        'メニュー' => 'menu',
        'お皿' => 'plate',
        'コーヒー' => 'coffee',
        'ケーキ' => 'cake',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 4, the Japanese twin of the
     * English "Unit 4: Making Reservations" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'ユニット4: 予約する', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: テーブル・椅子', 1,
                pictures: [
                    [
                        'ja' => 'テーブル',
                        'img' => 'table',
                    ],
                    [
                        'ja' => '椅子',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'ja' => '予約する',
                    ],
                    [
                        'ja' => '予約',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'テーブル',
                            'を',
                            '予約し',
                            'たいです',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to book a table',
                                'correct' => [
                                    'I would like',
                                    'to book',
                                    'a',
                                    'table',
                                ],
                                'extra' => [
                                    'booking',
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm kitab bir masa', 'correct' => ['istəyirəm', 'kitab', 'bir', 'masa'], 'extra' => ['rezervasiya']],
                            'ar' => ['sentence' => 'أريد إلى كتاب طاولة', 'correct' => ['أريد', 'إلى', 'كتاب', 'طاولة'], 'extra' => ['حجز']],
                            'ru' => ['sentence' => 'я хочу в книга стол', 'correct' => ['я', 'хочу', 'в', 'книга', 'стол'], 'extra' => ['бронь']],
                            'es' => [
                                'sentence' => 'Quisiera reservar una mesa',
                                'correct' => [
                                    'quisiera',
                                    'reservar',
                                    'una',
                                    'mesa',
                                ],
                                'extra' => [
                                    'reserva',
                                    'silla',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte einen Tisch reservieren',
                                'correct' => [
                                    'ich möchte',
                                    'einen',
                                    'Tisch',
                                    'reservieren',
                                ],
                                'extra' => [
                                    'Reservierung',
                                    'Stuhl',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais réserver une table',
                                'correct' => [
                                    'je voudrais',
                                    'réserver',
                                    'une',
                                    'table',
                                ],
                                'extra' => [
                                    'réservation',
                                    'chaise',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '테이블을 예약하고 싶습니다',
                                'correct' => [
                                    '테이블을',
                                    '예약하고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '예약',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir masa ayırtmak istiyorum', 'correct' => ['bir', 'masa', 'ayırtmak', 'istiyorum'], 'extra' => ['rezervasyon']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '今夜',
                            'の',
                            '予約',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a booking for tonight',
                                'correct' => [
                                    'a',
                                    'booking',
                                    'for',
                                    'tonight',
                                ],
                                'extra' => [
                                    'table',
                                ],
                            ],
                            'az' => ['sentence' => 'bir rezervasiya üçün bu axşam', 'correct' => ['bir', 'rezervasiya', 'üçün', 'bu axşam'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'حجز لأجل الليلة', 'correct' => ['حجز', 'لأجل', 'الليلة'], 'extra' => ['طاولة']],
                            'ru' => ['sentence' => 'бронь для сегодня вечером', 'correct' => ['бронь', 'для', 'сегодня вечером'], 'extra' => ['стол']],
                            'es' => [
                                'sentence' => 'Una reserva para esta noche',
                                'correct' => [
                                    'una',
                                    'reserva',
                                    'para',
                                    'esta noche',
                                ],
                                'extra' => [
                                    'reservar',
                                    'mesa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Reservierung für heute Abend',
                                'correct' => [
                                    'eine',
                                    'Reservierung',
                                    'für',
                                    'heute Abend',
                                ],
                                'extra' => [
                                    'reservieren',
                                    'Tisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une réservation pour ce soir',
                                'correct' => [
                                    'une',
                                    'réservation',
                                    'pour',
                                    'ce soir',
                                ],
                                'extra' => [
                                    'table',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '오늘 밤 예약',
                                'correct' => [
                                    '오늘',
                                    '밤',
                                    '예약',
                                ],
                                'extra' => [
                                    '테이블',
                                ],
                            ],
                            'tr' => ['sentence' => 'bu akşam için bir rezervasyon', 'correct' => ['bu', 'akşam', 'için', 'bir', 'rezervasyon'], 'extra' => ['masa']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'テーブル',
                            'と',
                            '椅子',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a table and a chair',
                                'correct' => [
                                    'a',
                                    'table',
                                    'and',
                                    'a',
                                    'chair',
                                ],
                                'extra' => [
                                    'booking',
                                ],
                            ],
                            'az' => ['sentence' => 'bir masa və bir stul', 'correct' => ['bir', 'masa', 'və', 'bir', 'stul'], 'extra' => ['rezervasiya']],
                            'ar' => ['sentence' => 'طاولة و كرسي', 'correct' => ['طاولة', 'و', 'كرسي'], 'extra' => ['حجز']],
                            'ru' => ['sentence' => 'стол и стул', 'correct' => ['стол', 'и', 'стул'], 'extra' => ['бронь']],
                            'es' => [
                                'sentence' => 'Una mesa y una silla',
                                'correct' => [
                                    'una',
                                    'mesa',
                                    'y',
                                    'una',
                                    'silla',
                                ],
                                'extra' => [
                                    'reserva',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Tisch und ein Stuhl',
                                'correct' => [
                                    'ein',
                                    'Tisch',
                                    'und',
                                    'ein',
                                    'Stuhl',
                                ],
                                'extra' => [
                                    'Reservierung',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une table et une chaise',
                                'correct' => [
                                    'une',
                                    'table',
                                    'et',
                                    'une',
                                    'chaise',
                                ],
                                'extra' => [
                                    'réservation',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '테이블과 의자',
                                'correct' => [
                                    '테이블과',
                                    '의자',
                                ],
                                'extra' => [
                                    '예약',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir masa ve bir sandalye', 'correct' => ['bir', 'masa', 've', 'bir', 'sandalye'], 'extra' => ['rezervasyon']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: 時計・カレンダー', 2,
                pictures: [
                    [
                        'ja' => '時計',
                        'img' => 'clock',
                    ],
                    [
                        'ja' => 'カレンダー',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'ja' => '時',
                    ],
                    [
                        'ja' => '正午',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '八',
                            '時',
                            'に',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'at eight o\'clock',
                                'correct' => [
                                    'at',
                                    'eight',
                                    'o\'clock',
                                ],
                                'extra' => [
                                    'noon',
                                ],
                            ],
                            'az' => ['sentence' => 'yanında səkkiz saat', 'correct' => ['yanında', 'səkkiz', 'saat'], 'extra' => ['günorta']],
                            'ar' => ['sentence' => 'على ثمانية الساعة', 'correct' => ['على', 'ثمانية', 'الساعة'], 'extra' => ['ظهرا']],
                            'ru' => ['sentence' => 'на восемь часов', 'correct' => ['на', 'восемь', 'часов'], 'extra' => ['полдень']],
                            'es' => [
                                'sentence' => 'A las ocho en punto',
                                'correct' => [
                                    'en',
                                    'ocho',
                                    'en punto',
                                ],
                                'extra' => [
                                    'mediodía',
                                    'reloj',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Um acht Uhr',
                                'correct' => [
                                    'an',
                                    'acht',
                                    'Uhr',
                                ],
                                'extra' => [
                                    'Mittag',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'À huit heures',
                                'correct' => [
                                    'à',
                                    'huit',
                                    'heures',
                                ],
                                'extra' => [
                                    'midi',
                                    'horloge',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '여덟 시에',
                                'correct' => [
                                    '여덟',
                                    '시에',
                                ],
                                'extra' => [
                                    '정오',
                                ],
                            ],
                            'tr' => ['sentence' => 'saat sekizde', 'correct' => ['saat', 'sekizde'], 'extra' => ['öğlen']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '正午',
                            'に',
                            'お願いします',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'at noon please',
                                'correct' => [
                                    'at',
                                    'noon',
                                    'please',
                                ],
                                'extra' => [
                                    'o\'clock',
                                ],
                            ],
                            'az' => ['sentence' => 'yanında günorta zəhmət olmasa', 'correct' => ['yanında', 'günorta', 'zəhmət olmasa'], 'extra' => ['saat']],
                            'ar' => ['sentence' => 'على ظهرا من فضلك', 'correct' => ['على', 'ظهرا', 'من فضلك'], 'extra' => ['الساعة']],
                            'ru' => ['sentence' => 'на полдень пожалуйста', 'correct' => ['на', 'полдень', 'пожалуйста'], 'extra' => ['часов']],
                            'es' => [
                                'sentence' => 'A mediodía, por favor',
                                'correct' => [
                                    'en',
                                    'mediodía',
                                    'por favor',
                                ],
                                'extra' => [
                                    'en punto',
                                    'calendario',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Um Mittag, bitte',
                                'correct' => [
                                    'an',
                                    'Mittag',
                                    'bitte',
                                ],
                                'extra' => [
                                    'Uhr',
                                    'Kalender',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'À midi, s\'il vous plaît',
                                'correct' => [
                                    'à',
                                    'midi',
                                    's\'il vous plaît',
                                ],
                                'extra' => [
                                    'heures',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '정오에 부탁합니다',
                                'correct' => [
                                    '정오에',
                                    '부탁합니다',
                                ],
                                'extra' => [
                                    '시',
                                ],
                            ],
                            'tr' => ['sentence' => 'öğlen lütfen', 'correct' => ['öğlen', 'lütfen'], 'extra' => ['saat']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '時計',
                            'と',
                            'カレンダー',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a clock and a calendar',
                                'correct' => [
                                    'a',
                                    'clock',
                                    'and',
                                    'a',
                                    'calendar',
                                ],
                                'extra' => [
                                    'noon',
                                ],
                            ],
                            'az' => ['sentence' => 'bir saat və bir təqvim', 'correct' => ['bir', 'saat', 'və', 'bir', 'təqvim'], 'extra' => ['günorta']],
                            'ar' => ['sentence' => 'ساعة و تقويم', 'correct' => ['ساعة', 'و', 'تقويم'], 'extra' => ['ظهرا']],
                            'ru' => ['sentence' => 'часы и календарь', 'correct' => ['часы', 'и', 'календарь'], 'extra' => ['полдень']],
                            'es' => [
                                'sentence' => 'Un reloj y un calendario',
                                'correct' => [
                                    'un',
                                    'reloj',
                                    'y',
                                    'un',
                                    'calendario',
                                ],
                                'extra' => [
                                    'mediodía',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Eine Uhr und ein Kalender',
                                'correct' => [
                                    'eine',
                                    'Uhr',
                                    'und',
                                    'ein',
                                    'Kalender',
                                ],
                                'extra' => [
                                    'Mittag',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une horloge et un calendrier',
                                'correct' => [
                                    'une',
                                    'horloge',
                                    'et',
                                    'un',
                                    'calendrier',
                                ],
                                'extra' => [
                                    'midi',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '시계와 달력',
                                'correct' => [
                                    '시계와',
                                    '달력',
                                ],
                                'extra' => [
                                    '정오',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir saat ve bir takvim', 'correct' => ['bir', 'saat', 've', 'bir', 'takvim'], 'extra' => ['öğlen']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: テーブル・椅子', 3,
                pictures: [
                    [
                        'ja' => 'テーブル',
                        'img' => 'table',
                    ],
                    [
                        'ja' => '椅子',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'ja' => '人',
                    ],
                    [
                        'ja' => '席',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '二人',
                            'の',
                            'テーブル',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a table for two people',
                                'correct' => [
                                    'a',
                                    'table',
                                    'for',
                                    'two',
                                    'people',
                                ],
                                'extra' => [
                                    'seat',
                                ],
                            ],
                            'az' => ['sentence' => 'bir masa üçün iki insanlar', 'correct' => ['bir', 'masa', 'üçün', 'iki', 'insanlar'], 'extra' => ['yer']],
                            'ar' => ['sentence' => 'طاولة لأجل اثنان ناس', 'correct' => ['طاولة', 'لأجل', 'اثنان', 'ناس'], 'extra' => ['مقعد']],
                            'ru' => ['sentence' => 'стол для два люди', 'correct' => ['стол', 'для', 'два', 'люди'], 'extra' => ['место']],
                            'es' => [
                                'sentence' => 'Una mesa para dos personas',
                                'correct' => [
                                    'una',
                                    'mesa',
                                    'para',
                                    'dos',
                                    'personas',
                                ],
                                'extra' => [
                                    'sitio',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Tisch für zwei Personen',
                                'correct' => [
                                    'ein',
                                    'Tisch',
                                    'für',
                                    'zwei',
                                    'Personen',
                                ],
                                'extra' => [
                                    'Platz',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une table pour deux personnes',
                                'correct' => [
                                    'une',
                                    'table',
                                    'pour',
                                    'deux',
                                    'personnes',
                                ],
                                'extra' => [
                                    'place',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '두 명 테이블',
                                'correct' => [
                                    '두',
                                    '명',
                                    '테이블',
                                ],
                                'extra' => [
                                    '자리',
                                ],
                            ],
                            'tr' => ['sentence' => 'iki kişi için bir masa', 'correct' => ['iki', 'kişi', 'için', 'bir', 'masa'], 'extra' => ['koltuk']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '私の',
                            'ため',
                            'の',
                            '席',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a seat for me',
                                'correct' => [
                                    'a',
                                    'seat',
                                    'for',
                                    'me',
                                ],
                                'extra' => [
                                    'people',
                                ],
                            ],
                            'az' => ['sentence' => 'bir yer üçün mənə', 'correct' => ['bir', 'yer', 'üçün', 'mənə'], 'extra' => ['insanlar']],
                            'ar' => ['sentence' => 'مقعد لأجل لي', 'correct' => ['مقعد', 'لأجل', 'لي'], 'extra' => ['ناس']],
                            'ru' => ['sentence' => 'место для меня', 'correct' => ['место', 'для', 'меня'], 'extra' => ['люди']],
                            'es' => [
                                'sentence' => 'Un sitio para mí',
                                'correct' => [
                                    'un',
                                    'sitio',
                                    'para',
                                    'me',
                                ],
                                'extra' => [
                                    'personas',
                                    'mesa',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Platz für mich',
                                'correct' => [
                                    'ein',
                                    'Platz',
                                    'für',
                                    'mich',
                                ],
                                'extra' => [
                                    'Personen',
                                    'Tisch',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une place pour moi',
                                'correct' => [
                                    'une',
                                    'place',
                                    'pour',
                                    'moi',
                                ],
                                'extra' => [
                                    'personnes',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '저를 위한 자리',
                                'correct' => [
                                    '저를',
                                    '위한',
                                    '자리',
                                ],
                                'extra' => [
                                    '명',
                                ],
                            ],
                            'tr' => ['sentence' => 'benim için bir koltuk', 'correct' => ['benim', 'için', 'bir', 'koltuk'], 'extra' => ['kişi']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '椅子',
                            'と',
                            '席',
                        ],
                        'blank' => 0,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a chair and a seat',
                                'correct' => [
                                    'a',
                                    'chair',
                                    'and',
                                    'a',
                                    'seat',
                                ],
                                'extra' => [
                                    'people',
                                ],
                            ],
                            'az' => ['sentence' => 'bir stul və bir yer', 'correct' => ['bir', 'stul', 'və', 'bir', 'yer'], 'extra' => ['insanlar']],
                            'ar' => ['sentence' => 'كرسي و مقعد', 'correct' => ['كرسي', 'و', 'مقعد'], 'extra' => ['ناس']],
                            'ru' => ['sentence' => 'стул и место', 'correct' => ['стул', 'и', 'место'], 'extra' => ['люди']],
                            'es' => [
                                'sentence' => 'Una silla y un sitio',
                                'correct' => [
                                    'una',
                                    'silla',
                                    'y',
                                    'un',
                                    'sitio',
                                ],
                                'extra' => [
                                    'personas',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Stuhl und ein Platz',
                                'correct' => [
                                    'ein',
                                    'Stuhl',
                                    'und',
                                    'ein',
                                    'Platz',
                                ],
                                'extra' => [
                                    'Personen',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une chaise et une place',
                                'correct' => [
                                    'une',
                                    'chaise',
                                    'et',
                                    'une',
                                    'place',
                                ],
                                'extra' => [
                                    'personnes',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '의자와 자리',
                                'correct' => [
                                    '의자와',
                                    '자리',
                                ],
                                'extra' => [
                                    '명',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir sandalye ve bir koltuk', 'correct' => ['bir', 'sandalye', 've', 'bir', 'koltuk'], 'extra' => ['kişi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: カレンダー・時計', 4,
                pictures: [
                    [
                        'ja' => 'カレンダー',
                        'img' => 'calendar',
                    ],
                    [
                        'ja' => '時計',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'ja' => '確認する',
                    ],
                    [
                        'ja' => 'キャンセルする',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '予約',
                            'を',
                            '確認し',
                            'たいです',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'I would like to confirm the booking',
                                'correct' => [
                                    'I would like',
                                    'to confirm',
                                    'the',
                                    'booking',
                                ],
                                'extra' => [
                                    'to cancel',
                                ],
                            ],
                            'az' => ['sentence' => 'istəyirəm təsdiqləmək rezervasiya', 'correct' => ['istəyirəm', 'təsdiqləmək', 'rezervasiya'], 'extra' => ['ləğv etmək']],
                            'ar' => ['sentence' => 'أريد التأكيد حجز', 'correct' => ['أريد', 'التأكيد', 'حجز'], 'extra' => ['الإلغاء']],
                            'ru' => ['sentence' => 'я хочу подтвердить бронь', 'correct' => ['я', 'хочу', 'подтвердить', 'бронь'], 'extra' => ['отменить']],
                            'es' => [
                                'sentence' => 'Quisiera confirmar la reserva',
                                'correct' => [
                                    'quisiera',
                                    'confirmar',
                                    'la',
                                    'reserva',
                                ],
                                'extra' => [
                                    'cancelar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ich möchte die Reservierung bestätigen',
                                'correct' => [
                                    'ich möchte',
                                    'die',
                                    'Reservierung',
                                    'bestätigen',
                                ],
                                'extra' => [
                                    'stornieren',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Je voudrais confirmer la réservation',
                                'correct' => [
                                    'je voudrais',
                                    'confirmer',
                                    'la',
                                    'réservation',
                                ],
                                'extra' => [
                                    'annuler',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '예약을 확인하고 싶습니다',
                                'correct' => [
                                    '예약을',
                                    '확인하고',
                                    '싶습니다',
                                ],
                                'extra' => [
                                    '취소하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'rezervasyonu onaylamak istiyorum', 'correct' => ['rezervasyonu', 'onaylamak', 'istiyorum'], 'extra' => ['iptal etmek']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'テーブル',
                            'を',
                            'キャンセルする',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'to cancel the table',
                                'correct' => [
                                    'to cancel',
                                    'the',
                                    'table',
                                ],
                                'extra' => [
                                    'to confirm',
                                ],
                            ],
                            'az' => ['sentence' => 'ləğv etmək masa', 'correct' => ['ləğv etmək', 'masa'], 'extra' => ['təsdiqləmək']],
                            'ar' => ['sentence' => 'الإلغاء طاولة', 'correct' => ['الإلغاء', 'طاولة'], 'extra' => ['التأكيد']],
                            'ru' => ['sentence' => 'отменить стол', 'correct' => ['отменить', 'стол'], 'extra' => ['подтвердить']],
                            'es' => [
                                'sentence' => 'Cancelar la mesa',
                                'correct' => [
                                    'cancelar',
                                    'la',
                                    'mesa',
                                ],
                                'extra' => [
                                    'confirmar',
                                    'reloj',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Den Tisch stornieren',
                                'correct' => [
                                    'den',
                                    'Tisch',
                                    'stornieren',
                                ],
                                'extra' => [
                                    'bestätigen',
                                    'Uhr',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Annuler la table',
                                'correct' => [
                                    'annuler',
                                    'la',
                                    'table',
                                ],
                                'extra' => [
                                    'confirmer',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '테이블을 취소하다',
                                'correct' => [
                                    '테이블을',
                                    '취소하다',
                                ],
                                'extra' => [
                                    '확인하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'masayı iptal etmek', 'correct' => ['masayı', 'iptal', 'etmek'], 'extra' => ['onaylamak']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'カレンダー',
                            'と',
                            '時計',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a calendar and a clock',
                                'correct' => [
                                    'a',
                                    'calendar',
                                    'and',
                                    'a',
                                    'clock',
                                ],
                                'extra' => [
                                    'to confirm',
                                ],
                            ],
                            'az' => ['sentence' => 'bir təqvim və bir saat', 'correct' => ['bir', 'təqvim', 'və', 'bir', 'saat'], 'extra' => ['təsdiqləmək']],
                            'ar' => ['sentence' => 'تقويم و ساعة', 'correct' => ['تقويم', 'و', 'ساعة'], 'extra' => ['التأكيد']],
                            'ru' => ['sentence' => 'календарь и часы', 'correct' => ['календарь', 'и', 'часы'], 'extra' => ['подтвердить']],
                            'es' => [
                                'sentence' => 'Un calendario y un reloj',
                                'correct' => [
                                    'un',
                                    'calendario',
                                    'y',
                                    'un',
                                    'reloj',
                                ],
                                'extra' => [
                                    'cancelar',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Kalender und eine Uhr',
                                'correct' => [
                                    'ein',
                                    'Kalender',
                                    'und',
                                    'eine',
                                    'Uhr',
                                ],
                                'extra' => [
                                    'stornieren',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un calendrier et une horloge',
                                'correct' => [
                                    'un',
                                    'calendrier',
                                    'et',
                                    'une',
                                    'horloge',
                                ],
                                'extra' => [
                                    'annuler',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '달력과 시계',
                                'correct' => [
                                    '달력과',
                                    '시계',
                                ],
                                'extra' => [
                                    '확인하다',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir takvim ve bir saat', 'correct' => ['bir', 'takvim', 've', 'bir', 'saat'], 'extra' => ['onaylamak']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: メニュー・お皿', 5,
                pictures: [
                    [
                        'ja' => 'メニュー',
                        'img' => 'menu',
                    ],
                    [
                        'ja' => 'お皿',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'レストラン',
                    ],
                    [
                        'ja' => '厨房',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'レストラン',
                            'は',
                            '明日',
                            '暇',
                            'です',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the restaurant is free tomorrow',
                                'correct' => [
                                    'the',
                                    'restaurant',
                                    'is',
                                    'free',
                                    'tomorrow',
                                ],
                                'extra' => [
                                    'kitchen',
                                ],
                            ],
                            'az' => ['sentence' => 'restoran pulsuz sabah', 'correct' => ['restoran', 'pulsuz', 'sabah'], 'extra' => ['mətbəx']],
                            'ar' => ['sentence' => 'مطعم مجاني غدا', 'correct' => ['مطعم', 'مجاني', 'غدا'], 'extra' => ['مطبخ']],
                            'ru' => ['sentence' => 'ресторан бесплатно завтра', 'correct' => ['ресторан', 'бесплатно', 'завтра'], 'extra' => ['кухня']],
                            'es' => [
                                'sentence' => 'El restaurante está libre mañana',
                                'correct' => [
                                    'el',
                                    'restaurante',
                                    'está',
                                    'libre',
                                    'mañana',
                                ],
                                'extra' => [
                                    'cocina',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Restaurant ist morgen frei',
                                'correct' => [
                                    'das',
                                    'Restaurant',
                                    'ist',
                                    'morgen',
                                    'frei',
                                ],
                                'extra' => [
                                    'Küche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le restaurant est libre demain',
                                'correct' => [
                                    'le',
                                    'restaurant',
                                    'est',
                                    'libre',
                                    'demain',
                                ],
                                'extra' => [
                                    'cuisine',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '식당은 내일 비어 있습니다',
                                'correct' => [
                                    '식당은',
                                    '내일',
                                    '비어',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '주방',
                                ],
                            ],
                            'tr' => ['sentence' => 'restoran yarın müsait', 'correct' => ['restoran', 'yarın', 'müsait'], 'extra' => ['mutfak']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '厨房',
                            'の',
                            'メニュー',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the menu from the kitchen',
                                'correct' => [
                                    'the',
                                    'menu',
                                    'from',
                                    'the',
                                    'kitchen',
                                ],
                                'extra' => [
                                    'restaurant',
                                ],
                            ],
                            'az' => ['sentence' => 'menyu dan mətbəx', 'correct' => ['menyu', 'dan', 'mətbəx'], 'extra' => ['restoran']],
                            'ar' => ['sentence' => 'قائمة الطعام من مطبخ', 'correct' => ['قائمة الطعام', 'من', 'مطبخ'], 'extra' => ['مطعم']],
                            'ru' => ['sentence' => 'меню из кухня', 'correct' => ['меню', 'из', 'кухня'], 'extra' => ['ресторан']],
                            'es' => [
                                'sentence' => 'El menú de la cocina',
                                'correct' => [
                                    'el',
                                    'menú',
                                    'de',
                                    'la',
                                    'cocina',
                                ],
                                'extra' => [
                                    'restaurante',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Menü aus der Küche',
                                'correct' => [
                                    'das',
                                    'Menü',
                                    'von',
                                    'der',
                                    'Küche',
                                ],
                                'extra' => [
                                    'Restaurant',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le menu de la cuisine',
                                'correct' => [
                                    'le',
                                    'menu',
                                    'de',
                                    'la',
                                    'cuisine',
                                ],
                                'extra' => [
                                    'restaurant',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '주방의 메뉴',
                                'correct' => [
                                    '주방의',
                                    '메뉴',
                                ],
                                'extra' => [
                                    '식당',
                                ],
                            ],
                            'tr' => ['sentence' => 'mutfaktan menü', 'correct' => ['mutfaktan', 'menü'], 'extra' => ['restoran']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'レストラン',
                            'の',
                            'お皿',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a plate from the restaurant',
                                'correct' => [
                                    'a',
                                    'plate',
                                    'from',
                                    'the',
                                    'restaurant',
                                ],
                                'extra' => [
                                    'kitchen',
                                ],
                            ],
                            'az' => ['sentence' => 'bir boşqab dan restoran', 'correct' => ['bir', 'boşqab', 'dan', 'restoran'], 'extra' => ['mətbəx']],
                            'ar' => ['sentence' => 'صحن من مطعم', 'correct' => ['صحن', 'من', 'مطعم'], 'extra' => ['مطبخ']],
                            'ru' => ['sentence' => 'тарелка из ресторан', 'correct' => ['тарелка', 'из', 'ресторан'], 'extra' => ['кухня']],
                            'es' => [
                                'sentence' => 'Un plato del restaurante',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'de',
                                    'el',
                                    'restaurante',
                                ],
                                'extra' => [
                                    'cocina',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Teller aus dem Restaurant',
                                'correct' => [
                                    'ein',
                                    'Teller',
                                    'von',
                                    'dem',
                                    'Restaurant',
                                ],
                                'extra' => [
                                    'Küche',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette du restaurant',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'de',
                                    'le',
                                    'restaurant',
                                ],
                                'extra' => [
                                    'cuisine',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '식당의 접시',
                                'correct' => [
                                    '식당의',
                                    '접시',
                                ],
                                'extra' => [
                                    '주방',
                                ],
                            ],
                            'tr' => ['sentence' => 'restorandan bir tabak', 'correct' => ['restorandan', 'bir', 'tabak'], 'extra' => ['mutfak']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
