<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant04Seeder extends Seeder
{
    private const PICTURES = [
        'Table' => 'table', 'Chair' => 'chair', 'Clock' => 'clock', 'Calendar' => 'calendar',
        'Menu' => 'menu', 'Plate' => 'plate', 'Coffee' => 'coffee', 'Cake' => 'cake',
    ];

    /**
     * English Chapter 3, Unit 4 — booking a table.
     *
     * A reservation is four facts in a row: what you want, when, for how many,
     * and whether it still stands. The clock and calendar come straight back
     * from Chapter 1 so the learner only holds the booking language as new.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Making Reservations', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Booking a Table', 1,
                pictures: [['en' => 'Table', 'img' => 'table'], ['en' => 'Chair', 'img' => 'chair']],
                plain: [['en' => 'To book'], ['en' => 'Booking']],
                phrases: [
                    'a' => [
                        'words' => ['I would like', 'to book', 'a', 'table'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera reservar una mesa', 'correct' => ['quisiera', 'reservar', 'una', 'mesa'], 'extra' => ['reserva', 'silla']],
                            'de' => ['sentence' => 'Ich möchte einen Tisch reservieren', 'correct' => ['ich möchte', 'einen', 'Tisch', 'reservieren'], 'extra' => ['Reservierung', 'Stuhl']],
                            'ja' => ['sentence' => 'テーブルを予約したいです', 'correct' => ['テーブル', 'を', '予約し', 'たいです'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블을 예약하고 싶습니다', 'correct' => ['테이블을', '예약하고', '싶습니다'], 'extra' => ['예약']],
                            'fr' => ['sentence' => 'Je voudrais réserver une table', 'correct' => ['je voudrais', 'réserver', 'une', 'table'], 'extra' => ['réservation', 'chaise']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'booking', 'for', 'tonight'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una reserva para esta noche', 'correct' => ['una', 'reserva', 'para', 'esta noche'], 'extra' => ['reservar', 'mesa']],
                            'de' => ['sentence' => 'Eine Reservierung für heute Abend', 'correct' => ['eine', 'Reservierung', 'für', 'heute Abend'], 'extra' => ['reservieren', 'Tisch']],
                            'ja' => ['sentence' => '今夜の予約', 'correct' => ['今夜', 'の', '予約'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '오늘 밤 예약', 'correct' => ['오늘', '밤', '예약'], 'extra' => ['테이블']],
                            'fr' => ['sentence' => 'Une réservation pour ce soir', 'correct' => ['une', 'réservation', 'pour', 'ce soir'], 'extra' => ['table']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'table', 'and', 'a', 'chair'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una mesa y una silla', 'correct' => ['una', 'mesa', 'y', 'una', 'silla'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Ein Tisch und ein Stuhl', 'correct' => ['ein', 'Tisch', 'und', 'ein', 'Stuhl'], 'extra' => ['Reservierung']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블과 의자', 'correct' => ['테이블과', '의자'], 'extra' => ['예약']],
                            'fr' => ['sentence' => 'Une table et une chaise', 'correct' => ['une', 'table', 'et', 'une', 'chaise'], 'extra' => ['réservation']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: What Time', 2,
                pictures: [['en' => 'Clock', 'img' => 'clock'], ['en' => 'Calendar', 'img' => 'calendar']],
                plain: [['en' => "O'clock"], ['en' => 'Noon']],
                phrases: [
                    'a' => [
                        'words' => ['at', 'eight', "o'clock"], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'A las ocho en punto', 'correct' => ['en', 'ocho', 'en punto'], 'extra' => ['mediodía', 'reloj']],
                            'de' => ['sentence' => 'Um acht Uhr', 'correct' => ['an', 'acht', 'Uhr'], 'extra' => ['Mittag']],
                            'ja' => ['sentence' => '八時に', 'correct' => ['八', '時', 'に'], 'extra' => ['正午']],
                            'ko' => ['sentence' => '여덟 시에', 'correct' => ['여덟', '시에'], 'extra' => ['정오']],
                            'fr' => ['sentence' => 'À huit heures', 'correct' => ['à', 'huit', 'heures'], 'extra' => ['midi', 'horloge']],
                        ],
                    ],
                    'b' => [
                        'words' => ['at', 'noon', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'A mediodía, por favor', 'correct' => ['en', 'mediodía', 'por favor'], 'extra' => ['en punto', 'calendario']],
                            'de' => ['sentence' => 'Um Mittag, bitte', 'correct' => ['an', 'Mittag', 'bitte'], 'extra' => ['Uhr', 'Kalender']],
                            'ja' => ['sentence' => '正午にお願いします', 'correct' => ['正午', 'に', 'お願いします'], 'extra' => ['時']],
                            'ko' => ['sentence' => '정오에 부탁합니다', 'correct' => ['정오에', '부탁합니다'], 'extra' => ['시']],
                            'fr' => ['sentence' => 'À midi, s\'il vous plaît', 'correct' => ['à', 'midi', "s'il vous plaît"], 'extra' => ['heures']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'clock', 'and', 'a', 'calendar'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un reloj y un calendario', 'correct' => ['un', 'reloj', 'y', 'un', 'calendario'], 'extra' => ['mediodía']],
                            'de' => ['sentence' => 'Eine Uhr und ein Kalender', 'correct' => ['eine', 'Uhr', 'und', 'ein', 'Kalender'], 'extra' => ['Mittag']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['正午']],
                            'ko' => ['sentence' => '시계와 달력', 'correct' => ['시계와', '달력'], 'extra' => ['정오']],
                            'fr' => ['sentence' => 'Une horloge et un calendrier', 'correct' => ['une', 'horloge', 'et', 'un', 'calendrier'], 'extra' => ['midi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: For How Many People', 3,
                pictures: [['en' => 'Table', 'img' => 'table'], ['en' => 'Chair', 'img' => 'chair']],
                plain: [['en' => 'People'], ['en' => 'Seat']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'table', 'for', 'two', 'people'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Una mesa para dos personas', 'correct' => ['una', 'mesa', 'para', 'dos', 'personas'], 'extra' => ['sitio']],
                            'de' => ['sentence' => 'Ein Tisch für zwei Personen', 'correct' => ['ein', 'Tisch', 'für', 'zwei', 'Personen'], 'extra' => ['Platz']],
                            'ja' => ['sentence' => '二人のテーブル', 'correct' => ['二人', 'の', 'テーブル'], 'extra' => ['席']],
                            'ko' => ['sentence' => '두 명 테이블', 'correct' => ['두', '명', '테이블'], 'extra' => ['자리']],
                            'fr' => ['sentence' => 'Une table pour deux personnes', 'correct' => ['une', 'table', 'pour', 'deux', 'personnes'], 'extra' => ['place']],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'seat', 'for', 'me'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un sitio para mí', 'correct' => ['un', 'sitio', 'para', 'me'], 'extra' => ['personas', 'mesa']],
                            'de' => ['sentence' => 'Ein Platz für mich', 'correct' => ['ein', 'Platz', 'für', 'mich'], 'extra' => ['Personen', 'Tisch']],
                            'ja' => ['sentence' => '私のための席', 'correct' => ['私の', 'ため', 'の', '席'], 'extra' => ['人']],
                            'ko' => ['sentence' => '저를 위한 자리', 'correct' => ['저를', '위한', '자리'], 'extra' => ['명']],
                            'fr' => ['sentence' => 'Une place pour moi', 'correct' => ['une', 'place', 'pour', 'moi'], 'extra' => ['personnes']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'chair', 'and', 'a', 'seat'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Una silla y un sitio', 'correct' => ['una', 'silla', 'y', 'un', 'sitio'], 'extra' => ['personas']],
                            'de' => ['sentence' => 'Ein Stuhl und ein Platz', 'correct' => ['ein', 'Stuhl', 'und', 'ein', 'Platz'], 'extra' => ['Personen']],
                            'ja' => ['sentence' => '椅子と席', 'correct' => ['椅子', 'と', '席'], 'extra' => ['人']],
                            'ko' => ['sentence' => '의자와 자리', 'correct' => ['의자와', '자리'], 'extra' => ['명']],
                            'fr' => ['sentence' => 'Une chaise et une place', 'correct' => ['une', 'chaise', 'et', 'une', 'place'], 'extra' => ['personnes']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Confirm or Cancel', 4,
                pictures: [['en' => 'Calendar', 'img' => 'calendar'], ['en' => 'Clock', 'img' => 'clock']],
                plain: [['en' => 'To confirm'], ['en' => 'To cancel']],
                phrases: [
                    'a' => [
                        'words' => ['I would like', 'to confirm', 'the', 'booking'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera confirmar la reserva', 'correct' => ['quisiera', 'confirmar', 'la', 'reserva'], 'extra' => ['cancelar']],
                            'de' => ['sentence' => 'Ich möchte die Reservierung bestätigen', 'correct' => ['ich möchte', 'die', 'Reservierung', 'bestätigen'], 'extra' => ['stornieren']],
                            'ja' => ['sentence' => '予約を確認したいです', 'correct' => ['予約', 'を', '確認し', 'たいです'], 'extra' => ['キャンセルする']],
                            'ko' => ['sentence' => '예약을 확인하고 싶습니다', 'correct' => ['예약을', '확인하고', '싶습니다'], 'extra' => ['취소하다']],
                            'fr' => ['sentence' => 'Je voudrais confirmer la réservation', 'correct' => ['je voudrais', 'confirmer', 'la', 'réservation'], 'extra' => ['annuler']],
                        ],
                    ],
                    'b' => [
                        'words' => ['to cancel', 'the', 'table'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cancelar la mesa', 'correct' => ['cancelar', 'la', 'mesa'], 'extra' => ['confirmar', 'reloj']],
                            'de' => ['sentence' => 'Den Tisch stornieren', 'correct' => ['den', 'Tisch', 'stornieren'], 'extra' => ['bestätigen', 'Uhr']],
                            'ja' => ['sentence' => 'テーブルをキャンセルする', 'correct' => ['テーブル', 'を', 'キャンセルする'], 'extra' => ['確認する']],
                            'ko' => ['sentence' => '테이블을 취소하다', 'correct' => ['테이블을', '취소하다'], 'extra' => ['확인하다']],
                            'fr' => ['sentence' => 'Annuler la table', 'correct' => ['annuler', 'la', 'table'], 'extra' => ['confirmer']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'calendar', 'and', 'a', 'clock'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un calendario y un reloj', 'correct' => ['un', 'calendario', 'y', 'un', 'reloj'], 'extra' => ['cancelar']],
                            'de' => ['sentence' => 'Ein Kalender und eine Uhr', 'correct' => ['ein', 'Kalender', 'und', 'eine', 'Uhr'], 'extra' => ['stornieren']],
                            'ja' => ['sentence' => 'カレンダーと時計', 'correct' => ['カレンダー', 'と', '時計'], 'extra' => ['確認する']],
                            'ko' => ['sentence' => '달력과 시계', 'correct' => ['달력과', '시계'], 'extra' => ['확인하다']],
                            'fr' => ['sentence' => 'Un calendrier et une horloge', 'correct' => ['un', 'calendrier', 'et', 'une', 'horloge'], 'extra' => ['annuler']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: The Restaurant and The Kitchen', 5,
                pictures: [['en' => 'Menu', 'img' => 'menu'], ['en' => 'Plate', 'img' => 'plate']],
                plain: [['en' => 'Restaurant'], ['en' => 'Kitchen']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'restaurant', 'is', 'free', 'tomorrow'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El restaurante está libre mañana', 'correct' => ['el', 'restaurante', 'está', 'libre', 'mañana'], 'extra' => ['cocina']],
                            'de' => ['sentence' => 'Das Restaurant ist morgen frei', 'correct' => ['das', 'Restaurant', 'ist', 'morgen', 'frei'], 'extra' => ['Küche']],
                            'ja' => ['sentence' => 'レストランは明日空いています', 'correct' => ['レストラン', 'は', '明日', '空いています'], 'extra' => ['厨房']],
                            'ko' => ['sentence' => '식당은 내일 비어 있습니다', 'correct' => ['식당은', '내일', '비어', '있습니다'], 'extra' => ['주방']],
                            'fr' => ['sentence' => 'Le restaurant est libre demain', 'correct' => ['le', 'restaurant', 'est', 'libre', 'demain'], 'extra' => ['cuisine']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'menu', 'from', 'the', 'kitchen'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El menú de la cocina', 'correct' => ['el', 'menú', 'de', 'la', 'cocina'], 'extra' => ['restaurante']],
                            'de' => ['sentence' => 'Das Menü aus der Küche', 'correct' => ['das', 'Menü', 'von', 'der', 'Küche'], 'extra' => ['Restaurant']],
                            'ja' => ['sentence' => '厨房のメニュー', 'correct' => ['厨房', 'の', 'メニュー'], 'extra' => ['レストラン']],
                            'ko' => ['sentence' => '주방의 메뉴', 'correct' => ['주방의', '메뉴'], 'extra' => ['식당']],
                            'fr' => ['sentence' => 'Le menu de la cuisine', 'correct' => ['le', 'menu', 'de', 'la', 'cuisine'], 'extra' => ['restaurant']],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'plate', 'from', 'the', 'restaurant'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un plato del restaurante', 'correct' => ['un', 'plato', 'de', 'el', 'restaurante'], 'extra' => ['cocina']],
                            'de' => ['sentence' => 'Ein Teller aus dem Restaurant', 'correct' => ['ein', 'Teller', 'von', 'dem', 'Restaurant'], 'extra' => ['Küche']],
                            'ja' => ['sentence' => 'レストランのお皿', 'correct' => ['レストラン', 'の', 'お皿'], 'extra' => ['厨房']],
                            'ko' => ['sentence' => '식당의 접시', 'correct' => ['식당의', '접시'], 'extra' => ['주방']],
                            'fr' => ['sentence' => 'Une assiette du restaurant', 'correct' => ['une', 'assiette', 'de', 'le', 'restaurant'], 'extra' => ['cuisine']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
