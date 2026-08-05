<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant04Seeder extends Seeder
{
    private const PICTURES = ['탁자' => 'table', '의자' => 'chair', '시계' => 'clock', '달력' => 'calendar', '메뉴' => 'menu', '접시' => 'plate'];

    /**
     * Korean Restaurant, Unit 4, the Korean twin of the English "Making Reservations" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, '유닛 4: 예약하기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 탁자 · 의자', 1,
                pictures: [['ko' => '탁자', 'img' => 'table'], ['ko' => '의자', 'img' => 'chair']],
                plain: [['ko' => '예약하다'], ['ko' => '예약']],
                phrases: [
                    'a' => [
                        'words' => ['테이블을', '예약하고', '싶습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to book a table', 'correct' => ['I would like', 'to book', 'a', 'table'], 'extra' => ['booking']],
                            'es' => ['sentence' => 'Quisiera reservar una mesa', 'correct' => ['quisiera', 'reservar', 'una', 'mesa'], 'extra' => ['reserva', 'silla']],
                            'de' => ['sentence' => 'Ich möchte einen Tisch reservieren', 'correct' => ['ich möchte', 'einen', 'Tisch', 'reservieren'], 'extra' => ['Reservierung', 'Stuhl']],
                            'fr' => ['sentence' => 'Je voudrais réserver une table', 'correct' => ['je voudrais', 'réserver', 'une', 'table'], 'extra' => ['réservation', 'chaise']],
                            'ja' => ['sentence' => 'テーブルを予約したいです', 'correct' => ['テーブル', 'を', '予約し', 'たいです'], 'extra' => ['予約']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오늘', '밤', '예약'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a booking for tonight', 'correct' => ['a', 'booking', 'for', 'tonight'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Una reserva para esta noche', 'correct' => ['una', 'reserva', 'para', 'esta noche'], 'extra' => ['reservar', 'mesa']],
                            'de' => ['sentence' => 'Eine Reservierung für heute Abend', 'correct' => ['eine', 'Reservierung', 'für', 'heute Abend'], 'extra' => ['reservieren', 'Tisch']],
                            'fr' => ['sentence' => 'Une réservation pour ce soir', 'correct' => ['une', 'réservation', 'pour', 'ce soir'], 'extra' => ['table']],
                            'ja' => ['sentence' => '今夜の予約', 'correct' => ['今夜', 'の', '予約'], 'extra' => ['テーブル']],
                        ],
                    ],
                    'c' => [
                        'words' => ['테이블과', '의자'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a table and a chair', 'correct' => ['a', 'table', 'and', 'a', 'chair'], 'extra' => ['booking']],
                            'es' => ['sentence' => 'Una mesa y una silla', 'correct' => ['una', 'mesa', 'y', 'una', 'silla'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Ein Tisch und ein Stuhl', 'correct' => ['ein', 'Tisch', 'und', 'ein', 'Stuhl'], 'extra' => ['Reservierung']],
                            'fr' => ['sentence' => 'Une table et une chaise', 'correct' => ['une', 'table', 'et', 'une', 'chaise'], 'extra' => ['réservation']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['予約']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 시계 · 달력', 2,
                pictures: [['ko' => '시계', 'img' => 'clock'], ['ko' => '달력', 'img' => 'calendar']],
                plain: [['ko' => '시'], ['ko' => '정오']],
                phrases: [
                    'a' => [
                        'words' => ['여덟', '시에'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'at eight o\'clock', 'correct' => ['at', 'eight', 'o\'clock'], 'extra' => ['noon']],
                            'es' => ['sentence' => 'A las ocho en punto', 'correct' => ['en', 'ocho', 'en punto'], 'extra' => ['mediodía', 'reloj']],
                            'de' => ['sentence' => 'Um acht Uhr', 'correct' => ['an', 'acht', 'Uhr'], 'extra' => ['Mittag']],
                            'fr' => ['sentence' => 'À huit heures', 'correct' => ['à', 'huit', 'heures'], 'extra' => ['midi', 'horloge']],
                            'ja' => ['sentence' => '八時に', 'correct' => ['八', '時', 'に'], 'extra' => ['正午']],
                        ],
                    ],
                    'b' => [
                        'words' => ['정오에', '부탁합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'at noon please', 'correct' => ['at', 'noon', 'please'], 'extra' => ['o\'clock']],
                            'es' => ['sentence' => 'A mediodía, por favor', 'correct' => ['en', 'mediodía', 'por favor'], 'extra' => ['en punto', 'calendario']],
                            'de' => ['sentence' => 'Um Mittag, bitte', 'correct' => ['an', 'Mittag', 'bitte'], 'extra' => ['Uhr', 'Kalender']],
                            'fr' => ['sentence' => 'À midi, s\'il vous plaît', 'correct' => ['à', 'midi', 's\'il vous plaît'], 'extra' => ['heures']],
                            'ja' => ['sentence' => '正午にお願いします', 'correct' => ['正午', 'に', 'お願いします'], 'extra' => ['時']],
                        ],
                    ],
                    'c' => [
                        'words' => ['시계와', '달력'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a clock and a calendar', 'correct' => ['a', 'clock', 'and', 'a', 'calendar'], 'extra' => ['noon']],
                            'es' => ['sentence' => 'Un reloj y un calendario', 'correct' => ['un', 'reloj', 'y', 'un', 'calendario'], 'extra' => ['mediodía']],
                            'de' => ['sentence' => 'Eine Uhr und ein Kalender', 'correct' => ['eine', 'Uhr', 'und', 'ein', 'Kalender'], 'extra' => ['Mittag']],
                            'fr' => ['sentence' => 'Une horloge et un calendrier', 'correct' => ['une', 'horloge', 'et', 'un', 'calendrier'], 'extra' => ['midi']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['正午']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 탁자 · 의자', 3,
                pictures: [['ko' => '탁자', 'img' => 'table'], ['ko' => '의자', 'img' => 'chair']],
                plain: [['ko' => '명'], ['ko' => '자리']],
                phrases: [
                    'a' => [
                        'words' => ['두', '명', '테이블'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a table for two people', 'correct' => ['a', 'table', 'for', 'two', 'people'], 'extra' => ['seat']],
                            'es' => ['sentence' => 'Una mesa para dos personas', 'correct' => ['una', 'mesa', 'para', 'dos', 'personas'], 'extra' => ['sitio']],
                            'de' => ['sentence' => 'Ein Tisch für zwei Personen', 'correct' => ['ein', 'Tisch', 'für', 'zwei', 'Personen'], 'extra' => ['Platz']],
                            'fr' => ['sentence' => 'Une table pour deux personnes', 'correct' => ['une', 'table', 'pour', 'deux', 'personnes'], 'extra' => ['place']],
                            'ja' => ['sentence' => '二人のテーブル', 'correct' => ['二人', 'の', 'テーブル'], 'extra' => ['席']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저를', '위한', '자리'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a seat for me', 'correct' => ['a', 'seat', 'for', 'me'], 'extra' => ['people']],
                            'es' => ['sentence' => 'Un sitio para mí', 'correct' => ['un', 'sitio', 'para', 'me'], 'extra' => ['personas', 'mesa']],
                            'de' => ['sentence' => 'Ein Platz für mich', 'correct' => ['ein', 'Platz', 'für', 'mich'], 'extra' => ['Personen', 'Tisch']],
                            'fr' => ['sentence' => 'Une place pour moi', 'correct' => ['une', 'place', 'pour', 'moi'], 'extra' => ['personnes']],
                            'ja' => ['sentence' => '私のための席', 'correct' => ['私の', 'ため', 'の', '席'], 'extra' => ['人']],
                        ],
                    ],
                    'c' => [
                        'words' => ['의자와', '자리'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a chair and a seat', 'correct' => ['a', 'chair', 'and', 'a', 'seat'], 'extra' => ['people']],
                            'es' => ['sentence' => 'Una silla y un sitio', 'correct' => ['una', 'silla', 'y', 'un', 'sitio'], 'extra' => ['personas']],
                            'de' => ['sentence' => 'Ein Stuhl und ein Platz', 'correct' => ['ein', 'Stuhl', 'und', 'ein', 'Platz'], 'extra' => ['Personen']],
                            'fr' => ['sentence' => 'Une chaise et une place', 'correct' => ['une', 'chaise', 'et', 'une', 'place'], 'extra' => ['personnes']],
                            'ja' => ['sentence' => '椅子と席', 'correct' => ['椅子', 'と', '席'], 'extra' => ['人']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 달력 · 시계', 4,
                pictures: [['ko' => '달력', 'img' => 'calendar'], ['ko' => '시계', 'img' => 'clock']],
                plain: [['ko' => '확인하다'], ['ko' => '취소하다']],
                phrases: [
                    'a' => [
                        'words' => ['예약을', '확인하고', '싶습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to confirm the booking', 'correct' => ['I would like', 'to confirm', 'the', 'booking'], 'extra' => ['to cancel']],
                            'es' => ['sentence' => 'Quisiera confirmar la reserva', 'correct' => ['quisiera', 'confirmar', 'la', 'reserva'], 'extra' => ['cancelar']],
                            'de' => ['sentence' => 'Ich möchte die Reservierung bestätigen', 'correct' => ['ich möchte', 'die', 'Reservierung', 'bestätigen'], 'extra' => ['stornieren']],
                            'fr' => ['sentence' => 'Je voudrais confirmer la réservation', 'correct' => ['je voudrais', 'confirmer', 'la', 'réservation'], 'extra' => ['annuler']],
                            'ja' => ['sentence' => '予約を確認したいです', 'correct' => ['予約', 'を', '確認し', 'たいです'], 'extra' => ['キャンセルする']],
                        ],
                    ],
                    'b' => [
                        'words' => ['테이블을', '취소하다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to cancel the table', 'correct' => ['to cancel', 'the', 'table'], 'extra' => ['to confirm']],
                            'es' => ['sentence' => 'Cancelar la mesa', 'correct' => ['cancelar', 'la', 'mesa'], 'extra' => ['confirmar', 'reloj']],
                            'de' => ['sentence' => 'Den Tisch stornieren', 'correct' => ['den', 'Tisch', 'stornieren'], 'extra' => ['bestätigen', 'Uhr']],
                            'fr' => ['sentence' => 'Annuler la table', 'correct' => ['annuler', 'la', 'table'], 'extra' => ['confirmer']],
                            'ja' => ['sentence' => 'テーブルをキャンセルする', 'correct' => ['テーブル', 'を', 'キャンセルする'], 'extra' => ['確認する']],
                        ],
                    ],
                    'c' => [
                        'words' => ['달력과', '시계'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a calendar and a clock', 'correct' => ['a', 'calendar', 'and', 'a', 'clock'], 'extra' => ['to confirm']],
                            'es' => ['sentence' => 'Un calendario y un reloj', 'correct' => ['un', 'calendario', 'y', 'un', 'reloj'], 'extra' => ['cancelar']],
                            'de' => ['sentence' => 'Ein Kalender und eine Uhr', 'correct' => ['ein', 'Kalender', 'und', 'eine', 'Uhr'], 'extra' => ['stornieren']],
                            'fr' => ['sentence' => 'Un calendrier et une horloge', 'correct' => ['un', 'calendrier', 'et', 'une', 'horloge'], 'extra' => ['annuler']],
                            'ja' => ['sentence' => 'カレンダーと時計', 'correct' => ['カレンダー', 'と', '時計'], 'extra' => ['確認する']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 메뉴 · 접시', 5,
                pictures: [['ko' => '메뉴', 'img' => 'menu'], ['ko' => '접시', 'img' => 'plate']],
                plain: [['ko' => '식당'], ['ko' => '주방']],
                phrases: [
                    'a' => [
                        'words' => ['식당은', '내일', '비어', '있습니다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'the restaurant is free tomorrow', 'correct' => ['the', 'restaurant', 'is', 'free', 'tomorrow'], 'extra' => ['kitchen']],
                            'es' => ['sentence' => 'El restaurante está libre mañana', 'correct' => ['el', 'restaurante', 'está', 'libre', 'mañana'], 'extra' => ['cocina']],
                            'de' => ['sentence' => 'Das Restaurant ist morgen frei', 'correct' => ['das', 'Restaurant', 'ist', 'morgen', 'frei'], 'extra' => ['Küche']],
                            'fr' => ['sentence' => 'Le restaurant est libre demain', 'correct' => ['le', 'restaurant', 'est', 'libre', 'demain'], 'extra' => ['cuisine']],
                            'ja' => ['sentence' => 'レストランは明日空いています', 'correct' => ['レストラン', 'は', '明日', '空いています'], 'extra' => ['厨房']],
                        ],
                    ],
                    'b' => [
                        'words' => ['주방의', '메뉴'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the menu from the kitchen', 'correct' => ['the', 'menu', 'from', 'the', 'kitchen'], 'extra' => ['restaurant']],
                            'es' => ['sentence' => 'El menú de la cocina', 'correct' => ['el', 'menú', 'de', 'la', 'cocina'], 'extra' => ['restaurante']],
                            'de' => ['sentence' => 'Das Menü aus der Küche', 'correct' => ['das', 'Menü', 'von', 'der', 'Küche'], 'extra' => ['Restaurant']],
                            'fr' => ['sentence' => 'Le menu de la cuisine', 'correct' => ['le', 'menu', 'de', 'la', 'cuisine'], 'extra' => ['restaurant']],
                            'ja' => ['sentence' => '厨房のメニュー', 'correct' => ['厨房', 'の', 'メニュー'], 'extra' => ['レストラン']],
                        ],
                    ],
                    'c' => [
                        'words' => ['식당의', '접시'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a plate from the restaurant', 'correct' => ['a', 'plate', 'from', 'the', 'restaurant'], 'extra' => ['kitchen']],
                            'es' => ['sentence' => 'Un plato del restaurante', 'correct' => ['un', 'plato', 'de', 'el', 'restaurante'], 'extra' => ['cocina']],
                            'de' => ['sentence' => 'Ein Teller aus dem Restaurant', 'correct' => ['ein', 'Teller', 'von', 'dem', 'Restaurant'], 'extra' => ['Küche']],
                            'fr' => ['sentence' => 'Une assiette du restaurant', 'correct' => ['une', 'assiette', 'de', 'le', 'restaurant'], 'extra' => ['cuisine']],
                            'ja' => ['sentence' => 'レストランのお皿', 'correct' => ['レストラン', 'の', 'お皿'], 'extra' => ['厨房']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
