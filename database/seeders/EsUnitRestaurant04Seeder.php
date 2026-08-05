<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\SpanishLessonBuilder;
use Illuminate\Database\Seeder;

class EsUnitRestaurant04Seeder extends Seeder
{
    private const PICTURES = [
        'mesa' => 'table',
        'silla' => 'chair',
        'reloj' => 'clock',
        'calendario' => 'calendar',
        'menú' => 'menu',
        'plato' => 'plate',
        'café' => 'coffee',
        'pastel' => 'cake',
    ];

    /**
     * Spanish Chapter 3 (Restaurant), Unit 4, the Spanish twin of the
     * English "Unit 4: Making Reservations" unit. Same 5-lesson shape and vocabulary, authored
     * in Spanish with hints in English, German, French, Japanese and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'es')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new SpanishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unidad 4: Hacer reservas', $this->lessonsData($builder));
    }

    private function lessonsData(SpanishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lección 1: Mesa y Silla', 1,
                pictures: [
                    [
                        'es' => 'mesa',
                        'img' => 'table',
                    ],
                    [
                        'es' => 'silla',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'es' => 'reservar',
                    ],
                    [
                        'es' => 'reserva',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quisiera',
                            'reservar',
                            'una',
                            'mesa',
                        ],
                        'blank' => 1,
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
                            'Una',
                            'reserva',
                            'para',
                            'esta',
                            'noche',
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
                            'Una',
                            'mesa',
                            'y',
                            'una',
                            'silla',
                        ],
                        'blank' => 4,
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
            $builder->lesson('Lección 2: Reloj y Calendario', 2,
                pictures: [
                    [
                        'es' => 'reloj',
                        'img' => 'clock',
                    ],
                    [
                        'es' => 'calendario',
                        'img' => 'calendar',
                    ],
                ],
                plain: [
                    [
                        'es' => 'en punto',
                    ],
                    [
                        'es' => 'mediodía',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'A',
                            'las',
                            'ocho',
                            'en',
                            'punto',
                        ],
                        'blank' => 4,
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
                                    'clock',
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
                            'A',
                            'mediodía',
                            'por',
                            'favor',
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
                                    'o\'clock',
                                    'calendar',
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
                            'Un',
                            'reloj',
                            'y',
                            'un',
                            'calendario',
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
            $builder->lesson('Lección 3: Mesa y Silla', 3,
                pictures: [
                    [
                        'es' => 'mesa',
                        'img' => 'table',
                    ],
                    [
                        'es' => 'silla',
                        'img' => 'chair',
                    ],
                ],
                plain: [
                    [
                        'es' => 'personas',
                    ],
                    [
                        'es' => 'sitio',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Una',
                            'mesa',
                            'para',
                            'dos',
                            'personas',
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
                            'Un',
                            'sitio',
                            'para',
                            'mí',
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
                            'Una',
                            'silla',
                            'y',
                            'un',
                            'sitio',
                        ],
                        'blank' => 3,
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
            $builder->lesson('Lección 4: Calendario y Reloj', 4,
                pictures: [
                    [
                        'es' => 'calendario',
                        'img' => 'calendar',
                    ],
                    [
                        'es' => 'reloj',
                        'img' => 'clock',
                    ],
                ],
                plain: [
                    [
                        'es' => 'confirmar',
                    ],
                    [
                        'es' => 'cancelar',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'Quisiera',
                            'confirmar',
                            'la',
                            'reserva',
                        ],
                        'blank' => 1,
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
                            'Cancelar',
                            'la',
                            'mesa',
                        ],
                        'blank' => 0,
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
                            'Un',
                            'calendario',
                            'y',
                            'un',
                            'reloj',
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
            $builder->lesson('Lección 5: Menú y Plato', 5,
                pictures: [
                    [
                        'es' => 'menú',
                        'img' => 'menu',
                    ],
                    [
                        'es' => 'plato',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'es' => 'restaurante',
                    ],
                    [
                        'es' => 'cocina',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'El',
                            'restaurante',
                            'está',
                            'libre',
                            'mañana',
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
                            'El',
                            'menú',
                            'de',
                            'la',
                            'cocina',
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
                            'Un',
                            'plato',
                            'del',
                            'restaurante',
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
