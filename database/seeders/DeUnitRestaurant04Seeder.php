<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\GermanLessonBuilder;
use Illuminate\Database\Seeder;

class DeUnitRestaurant04Seeder extends Seeder
{
    private const PICTURES = [
        'Tisch' => 'table',
        'Stuhl' => 'chair',
        'Uhr' => 'clock',
        'Kalender' => 'calendar',
        'Menü' => 'menu',
        'Teller' => 'plate',
        'Kaffee' => 'coffee',
        'Kuchen' => 'cake',
    ];

    /**
     * German Chapter 3 (Restaurant), Unit 4, the German twin of the
     * English "Unit 4: Making Reservations" unit. Same 5-lesson shape and vocabulary, authored
     * in German with hints in English, Spanish, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'de')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new GermanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Einheit 4: Reservieren', $this->lessonsData($builder));
    }

    private function lessonsData(GermanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lektion 1: Tisch & Stuhl', 1,
                pictures: [
                    [
                        'de' => 'Tisch',
                        'img' => 'table',
                    ],
                    [
                        'de' => 'Stuhl',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'de' => 'reservieren',
                    ],
                    [
                        'de' => 'Reservierung',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'einen',
                            'Tisch',
                            'reservieren',
                        ],
                        'blank' => 4,
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
                                    'chair',
                                ],
                            ],
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
                            'ja' => [
                                'sentence' => 'テーブルを予約したいです',
                                'correct' => [
                                    'テーブル',
                                    'を',
                                    '予約し',
                                    'たいです',
                                ],
                                'extra' => [
                                    '予約',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Eine',
                            'Reservierung',
                            'für',
                            'heute',
                            'Abend',
                        ],
                        'blank' => 1,
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
                                    'to book',
                                    'table',
                                ],
                            ],
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
                            'ja' => [
                                'sentence' => '今夜の予約',
                                'correct' => [
                                    '今夜',
                                    'の',
                                    '予約',
                                ],
                                'extra' => [
                                    'テーブル',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Tisch',
                            'und',
                            'ein',
                            'Stuhl',
                        ],
                        'blank' => 0,
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
                            'ja' => [
                                'sentence' => 'テーブルと椅子',
                                'correct' => [
                                    'テーブル',
                                    'と',
                                    '椅子',
                                ],
                                'extra' => [
                                    '予約',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 2: Uhr & Kalender', 2,
                pictures: [
                    [
                        'de' => 'Uhr',
                        'img' => 'clock',
                    ],
                    [
                        'de' => 'Kalender',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Uhr',
                    ],
                    [
                        'de' => 'Mittag',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Um',
                            'acht',
                            'Uhr',
                        ],
                        'blank' => 2,
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
                            'ja' => [
                                'sentence' => '八時に',
                                'correct' => [
                                    '八',
                                    '時',
                                    'に',
                                ],
                                'extra' => [
                                    '正午',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Um',
                            'Mittag',
                            'bitte',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'at noon please',
                                'correct' => [
                                    'at',
                                    'noon',
                                    'please',
                                ],
                                'extra' => [
                                    'clock',
                                    'calendar',
                                ],
                            ],
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
                            'ja' => [
                                'sentence' => '正午にお願いします',
                                'correct' => [
                                    '正午',
                                    'に',
                                    'お願いします',
                                ],
                                'extra' => [
                                    '時',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Eine',
                            'Uhr',
                            'und',
                            'ein',
                            'Kalender',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => '時計とカレンダー',
                                'correct' => [
                                    '時計',
                                    'と',
                                    'カレンダー',
                                ],
                                'extra' => [
                                    '正午',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 3: Tisch & Stuhl', 3,
                pictures: [
                    [
                        'de' => 'Tisch',
                        'img' => 'table',
                    ],
                    [
                        'de' => 'Stuhl',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Personen',
                    ],
                    [
                        'de' => 'Platz',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ein',
                            'Tisch',
                            'für',
                            'zwei',
                            'Personen',
                        ],
                        'blank' => 4,
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
                            'ja' => [
                                'sentence' => '二人のテーブル',
                                'correct' => [
                                    '二人',
                                    'の',
                                    'テーブル',
                                ],
                                'extra' => [
                                    '席',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Ein',
                            'Platz',
                            'für',
                            'mich',
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
                                    'table',
                                ],
                            ],
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
                            'ja' => [
                                'sentence' => '私のための席',
                                'correct' => [
                                    '私の',
                                    'ため',
                                    'の',
                                    '席',
                                ],
                                'extra' => [
                                    '人',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Stuhl',
                            'und',
                            'ein',
                            'Platz',
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
                            'ja' => [
                                'sentence' => '椅子と席',
                                'correct' => [
                                    '椅子',
                                    'と',
                                    '席',
                                ],
                                'extra' => [
                                    '人',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 4: Kalender & Uhr', 4,
                pictures: [
                    [
                        'de' => 'Kalender',
                        'img' => 'calendar',
                    ],
                    [
                        'de' => 'Uhr',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'de' => 'bestätigen',
                    ],
                    [
                        'de' => 'stornieren',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Ich',
                            'möchte',
                            'die',
                            'Reservierung',
                            'bestätigen',
                        ],
                        'blank' => 4,
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
                            'ja' => [
                                'sentence' => '予約を確認したいです',
                                'correct' => [
                                    '予約',
                                    'を',
                                    '確認し',
                                    'たいです',
                                ],
                                'extra' => [
                                    'キャンセルする',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Den',
                            'Tisch',
                            'stornieren',
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
                                    'clock',
                                ],
                            ],
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
                            'ja' => [
                                'sentence' => 'テーブルをキャンセルする',
                                'correct' => [
                                    'テーブル',
                                    'を',
                                    'キャンセルする',
                                ],
                                'extra' => [
                                    '確認する',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Kalender',
                            'und',
                            'eine',
                            'Uhr',
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
                                    'to cancel',
                                ],
                            ],
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
                            'ja' => [
                                'sentence' => 'カレンダーと時計',
                                'correct' => [
                                    'カレンダー',
                                    'と',
                                    '時計',
                                ],
                                'extra' => [
                                    '確認する',
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
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lektion 5: Menü & Teller', 5,
                pictures: [
                    [
                        'de' => 'Menü',
                        'img' => 'menu',
                    ],
                    [
                        'de' => 'Teller',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'de' => 'Restaurant',
                    ],
                    [
                        'de' => 'Küche',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Das',
                            'Restaurant',
                            'ist',
                            'morgen',
                            'frei',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => 'レストランは明日空いています',
                                'correct' => [
                                    'レストラン',
                                    'は',
                                    '明日',
                                    '空いています',
                                ],
                                'extra' => [
                                    '厨房',
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
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'Das',
                            'Menü',
                            'aus',
                            'der',
                            'Küche',
                        ],
                        'blank' => 4,
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
                            'ja' => [
                                'sentence' => '厨房のメニュー',
                                'correct' => [
                                    '厨房',
                                    'の',
                                    'メニュー',
                                ],
                                'extra' => [
                                    'レストラン',
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
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'Ein',
                            'Teller',
                            'aus',
                            'dem',
                            'Restaurant',
                        ],
                        'blank' => 1,
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
                            'ja' => [
                                'sentence' => 'レストランのお皿',
                                'correct' => [
                                    'レストラン',
                                    'の',
                                    'お皿',
                                ],
                                'extra' => [
                                    '厨房',
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
                        ],
                    ],
                ],
            ),
        ];
    }
}
