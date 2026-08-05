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
                        ],
                    ],
                ],
            ),
        ];
    }
}
