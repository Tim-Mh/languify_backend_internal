<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant04Seeder extends Seeder
{
    private const PICTURES = [
        'Table' => 'table', 'Chaise' => 'chair', 'Horloge' => 'clock',
        'Calendrier' => 'calendar', 'Menu' => 'menu', 'Assiette' => 'plate',
        'Café' => 'coffee', 'Gâteau' => 'cake',
    ];

    /**
     * French Chapter 3, Unit 4 — booking a table.
     *
     * A reservation is really four facts said in a row: what you want, when,
     * for how many, and whether it still stands. Each lesson takes one of them,
     * and the clock and calendar words come straight back from Chapter 1 Unit 6
     * so the learner is only holding the booking language as new.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Making Reservations', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Booking a Table', 1,
                pictures: [['fr' => 'Table', 'img' => 'table'], ['fr' => 'Chaise', 'img' => 'chair']],
                plain: [['fr' => 'Réserver'], ['fr' => 'Réservation']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'réserver', 'une', 'table'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to book a table', 'correct' => ['I would like', 'to book', 'a', 'table'], 'extra' => ['booking', 'chair']],
                            'az' => ['sentence' => 'istəyirəm kitab bir masa', 'correct' => ['istəyirəm', 'kitab', 'bir', 'masa'], 'extra' => ['rezervasiya', 'stul']],
                            'ar' => ['sentence' => 'أريد إلى كتاب طاولة', 'correct' => ['أريد', 'إلى', 'كتاب', 'طاولة'], 'extra' => ['حجز', 'كرسي']],
                            'ru' => ['sentence' => 'я хочу в книга стол', 'correct' => ['я', 'хочу', 'в', 'книга', 'стол'], 'extra' => ['бронь', 'стул']],
                            'es' => ['sentence' => 'Quisiera reservar una mesa', 'correct' => ['quisiera', 'reservar', 'una', 'mesa'], 'extra' => ['reserva', 'silla']],
                            'de' => ['sentence' => 'Ich möchte einen Tisch reservieren', 'correct' => ['ich möchte', 'einen', 'Tisch', 'reservieren'], 'extra' => ['Reservierung', 'Stuhl']],
                            'ja' => ['sentence' => 'テーブルを予約したいです', 'correct' => ['テーブル', 'を', '予約し', 'たいです'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블을 예약하고 싶습니다', 'correct' => ['테이블을', '예약하고', '싶습니다'], 'extra' => ['예약']],
                            'tr' => ['sentence' => 'bir masa ayırtmak istiyorum', 'correct' => ['bir', 'masa', 'ayırtmak', 'istiyorum'], 'extra' => ['rezervasyon', 'sandalye']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'réservation', 'pour', 'ce soir'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A booking for tonight', 'correct' => ['a', 'booking', 'for', 'tonight'], 'extra' => ['to book', 'table']],
                            'az' => ['sentence' => 'bir rezervasiya üçün bu axşam', 'correct' => ['bir', 'rezervasiya', 'üçün', 'bu axşam'], 'extra' => ['kitab', 'masa']],
                            'ar' => ['sentence' => 'حجز لأجل الليلة', 'correct' => ['حجز', 'لأجل', 'الليلة'], 'extra' => ['إلى', 'كتاب', 'طاولة']],
                            'ru' => ['sentence' => 'бронь для сегодня вечером', 'correct' => ['бронь', 'для', 'сегодня вечером'], 'extra' => ['в', 'книга', 'стол']],
                            'es' => ['sentence' => 'Una reserva para esta noche', 'correct' => ['una', 'reserva', 'para', 'esta noche'], 'extra' => ['reservar', 'mesa']],
                            'de' => ['sentence' => 'Eine Reservierung für heute Abend', 'correct' => ['eine', 'Reservierung', 'für', 'heute Abend'], 'extra' => ['reservieren', 'Tisch']],
                            'ja' => ['sentence' => '今夜の予約', 'correct' => ['今夜', 'の', '予約'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '오늘 저녁 예약', 'correct' => ['오늘', '저녁', '예약'], 'extra' => ['테이블']],
                            'tr' => ['sentence' => 'bu akşam için bir rezervasyon', 'correct' => ['bu', 'akşam', 'için', 'bir', 'rezervasyon'], 'extra' => ['ayırtmak', 'masa']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'table', 'et', 'une', 'chaise'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A table and a chair', 'correct' => ['a', 'table', 'and', 'a', 'chair'], 'extra' => ['booking', 'to book']],
                            'az' => ['sentence' => 'bir masa və bir stul', 'correct' => ['bir', 'masa', 'və', 'bir', 'stul'], 'extra' => ['rezervasiya', 'kitab']],
                            'ar' => ['sentence' => 'طاولة و كرسي', 'correct' => ['طاولة', 'و', 'كرسي'], 'extra' => ['حجز', 'إلى', 'كتاب']],
                            'ru' => ['sentence' => 'стол и стул', 'correct' => ['стол', 'и', 'стул'], 'extra' => ['бронь', 'в', 'книга']],
                            'es' => ['sentence' => 'Una mesa y una silla', 'correct' => ['una', 'mesa', 'y', 'una', 'silla'], 'extra' => ['reserva', 'reservar']],
                            'de' => ['sentence' => 'Ein Tisch und ein Stuhl', 'correct' => ['ein', 'Tisch', 'und', 'ein', 'Stuhl'], 'extra' => ['Reservierung', 'reservieren']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블과 의자', 'correct' => ['테이블과', '의자'], 'extra' => ['예약']],
                            'tr' => ['sentence' => 'bir masa ve bir sandalye', 'correct' => ['bir', 'masa', 've', 'bir', 'sandalye'], 'extra' => ['rezervasyon', 'ayırtmak']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: What Time', 2,
                pictures: [['fr' => 'Horloge', 'img' => 'clock'], ['fr' => 'Calendrier', 'img' => 'calendar']],
                plain: [['fr' => 'Heures'], ['fr' => 'Midi']],
                phrases: [
                    'a' => [
                        'words' => ['à', 'huit', 'heures'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => "At eight o'clock", 'correct' => ['at', 'eight', "o'clock"], 'extra' => ['noon', 'clock']],
                            'az' => ['sentence' => 'yanında səkkiz saat', 'correct' => ['yanında', 'səkkiz', 'saat'], 'extra' => ['günorta']],
                            'ar' => ['sentence' => 'على ثمانية الساعة', 'correct' => ['على', 'ثمانية', 'الساعة'], 'extra' => ['ظهرا', 'ساعة']],
                            'ru' => ['sentence' => 'на восемь часов', 'correct' => ['на', 'восемь', 'часов'], 'extra' => ['полдень', 'часы']],
                            'es' => ['sentence' => 'A las ocho en punto', 'correct' => ['a las', 'ocho', 'en punto'], 'extra' => ['mediodía', 'reloj']],
                            'de' => ['sentence' => 'Um acht Uhr', 'correct' => ['um', 'acht', 'Uhr'], 'extra' => ['Mittag', 'Uhr']],
                            'ja' => ['sentence' => '八時に', 'correct' => ['八', '時', 'に'], 'extra' => ['正午']],
                            'ko' => ['sentence' => '여덟 시에', 'correct' => ['여덟', '시에'], 'extra' => ['정오']],
                            'tr' => ['sentence' => 'saat sekizde', 'correct' => ['saat', 'sekizde'], 'extra' => ['öğlen', 'saat']],
                        ],
                    ],
                    'b' => [
                        'words' => ['à', 'midi', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'At noon, please', 'correct' => ['at', 'noon', 'please'], 'extra' => ["o'clock", 'calendar']],
                            'az' => ['sentence' => 'yanında günorta zəhmət olmasa', 'correct' => ['yanında', 'günorta', 'zəhmət olmasa'], 'extra' => ['saat', 'təqvim']],
                            'ar' => ['sentence' => 'على ظهرا من فضلك', 'correct' => ['على', 'ظهرا', 'من فضلك'], 'extra' => ['الساعة', 'تقويم']],
                            'ru' => ['sentence' => 'на полдень пожалуйста', 'correct' => ['на', 'полдень', 'пожалуйста'], 'extra' => ['часов', 'календарь']],
                            'es' => ['sentence' => 'A mediodía, por favor', 'correct' => ['a', 'mediodía', 'por favor'], 'extra' => ['en punto', 'calendario']],
                            'de' => ['sentence' => 'Um Mittag, bitte', 'correct' => ['um', 'Mittag', 'bitte'], 'extra' => ['Uhr', 'Kalender']],
                            'ja' => ['sentence' => '正午にお願いします', 'correct' => ['正午', 'に', 'お願いします'], 'extra' => ['カレンダー']],
                            'ko' => ['sentence' => '정오에 부탁합니다', 'correct' => ['정오에', '부탁합니다'], 'extra' => ['달력']],
                            'tr' => ['sentence' => 'öğlen lütfen', 'correct' => ['öğlen', 'lütfen'], 'extra' => ['saat', 'takvim']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'horloge', 'et', 'un', 'calendrier'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A clock and a calendar', 'correct' => ['a', 'clock', 'and', 'a', 'calendar'], 'extra' => ['noon', "o'clock"]],
                            'az' => ['sentence' => 'bir saat və bir təqvim', 'correct' => ['bir', 'saat', 'və', 'bir', 'təqvim'], 'extra' => ['günorta']],
                            'ar' => ['sentence' => 'ساعة و تقويم', 'correct' => ['ساعة', 'و', 'تقويم'], 'extra' => ['ظهرا', 'الساعة']],
                            'ru' => ['sentence' => 'часы и календарь', 'correct' => ['часы', 'и', 'календарь'], 'extra' => ['полдень', 'часов']],
                            'es' => ['sentence' => 'Un reloj y un calendario', 'correct' => ['un', 'reloj', 'y', 'un', 'calendario'], 'extra' => ['mediodía', 'en punto']],
                            'de' => ['sentence' => 'Eine Uhr und ein Kalender', 'correct' => ['eine', 'Uhr', 'und', 'ein', 'Kalender'], 'extra' => ['Mittag']],
                            'ja' => ['sentence' => '時計とカレンダー', 'correct' => ['時計', 'と', 'カレンダー'], 'extra' => ['正午']],
                            'ko' => ['sentence' => '시계와 달력', 'correct' => ['시계와', '달력'], 'extra' => ['정오']],
                            'tr' => ['sentence' => 'bir saat ve bir takvim', 'correct' => ['bir', 'saat', 've', 'bir', 'takvim'], 'extra' => ['öğlen', 'saat']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: For How Many People', 3,
                pictures: [['fr' => 'Table', 'img' => 'table'], ['fr' => 'Chaise', 'img' => 'chair']],
                plain: [['fr' => 'Personnes'], ['fr' => 'Place']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'table', 'pour', 'deux', 'personnes'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A table for two people', 'correct' => ['a', 'table', 'for', 'two', 'people'], 'extra' => ['seat', 'chair']],
                            'az' => ['sentence' => 'bir masa üçün iki insanlar', 'correct' => ['bir', 'masa', 'üçün', 'iki', 'insanlar'], 'extra' => ['yer', 'stul']],
                            'ar' => ['sentence' => 'طاولة لأجل اثنان ناس', 'correct' => ['طاولة', 'لأجل', 'اثنان', 'ناس'], 'extra' => ['مقعد', 'كرسي']],
                            'ru' => ['sentence' => 'стол для два люди', 'correct' => ['стол', 'для', 'два', 'люди'], 'extra' => ['место', 'стул']],
                            'es' => ['sentence' => 'Una mesa para dos personas', 'correct' => ['una', 'mesa', 'para', 'dos', 'personas'], 'extra' => ['sitio', 'silla']],
                            'de' => ['sentence' => 'Ein Tisch für zwei Personen', 'correct' => ['ein', 'Tisch', 'für', 'zwei', 'Personen'], 'extra' => ['Platz', 'Stuhl']],
                            'ja' => ['sentence' => '二人のテーブル', 'correct' => ['二人', 'の', 'テーブル'], 'extra' => ['席']],
                            'ko' => ['sentence' => '두 명 테이블', 'correct' => ['두', '명', '테이블'], 'extra' => ['자리']],
                            'tr' => ['sentence' => 'iki kişi için bir masa', 'correct' => ['iki', 'kişi', 'için', 'bir', 'masa'], 'extra' => ['koltuk', 'sandalye']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'place', 'pour', 'moi'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A seat for me', 'correct' => ['a', 'seat', 'for', 'me'], 'extra' => ['people', 'table']],
                            'az' => ['sentence' => 'bir yer üçün mənə', 'correct' => ['bir', 'yer', 'üçün', 'mənə'], 'extra' => ['insanlar', 'masa']],
                            'ar' => ['sentence' => 'مقعد لأجل لي', 'correct' => ['مقعد', 'لأجل', 'لي'], 'extra' => ['ناس', 'طاولة']],
                            'ru' => ['sentence' => 'место для меня', 'correct' => ['место', 'для', 'меня'], 'extra' => ['люди', 'стол']],
                            'es' => ['sentence' => 'Un sitio para mí', 'correct' => ['un', 'sitio', 'para', 'mí'], 'extra' => ['personas', 'mesa']],
                            'de' => ['sentence' => 'Ein Platz für mich', 'correct' => ['ein', 'Platz', 'für', 'mich'], 'extra' => ['Personen', 'Tisch']],
                            'ja' => ['sentence' => '私のための席', 'correct' => ['私の', 'ため', 'の', '席'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '저를 위한 자리', 'correct' => ['저를', '위한', '자리'], 'extra' => ['테이블']],
                            'tr' => ['sentence' => 'benim için bir koltuk', 'correct' => ['benim', 'için', 'bir', 'koltuk'], 'extra' => ['kişi', 'masa']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'chaise', 'et', 'une', 'place'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'A chair and a seat', 'correct' => ['a', 'chair', 'and', 'a', 'seat'], 'extra' => ['people', 'table']],
                            'az' => ['sentence' => 'bir stul və bir yer', 'correct' => ['bir', 'stul', 'və', 'bir', 'yer'], 'extra' => ['insanlar', 'masa']],
                            'ar' => ['sentence' => 'كرسي و مقعد', 'correct' => ['كرسي', 'و', 'مقعد'], 'extra' => ['ناس', 'طاولة']],
                            'ru' => ['sentence' => 'стул и место', 'correct' => ['стул', 'и', 'место'], 'extra' => ['люди', 'стол']],
                            'es' => ['sentence' => 'Una silla y un sitio', 'correct' => ['una', 'silla', 'y', 'un', 'sitio'], 'extra' => ['personas', 'mesa']],
                            'de' => ['sentence' => 'Ein Stuhl und ein Platz', 'correct' => ['ein', 'Stuhl', 'und', 'ein', 'Platz'], 'extra' => ['Personen', 'Tisch']],
                            'ja' => ['sentence' => '椅子と席', 'correct' => ['椅子', 'と', '席'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '의자와 자리', 'correct' => ['의자와', '자리'], 'extra' => ['테이블']],
                            'tr' => ['sentence' => 'bir sandalye ve bir koltuk', 'correct' => ['bir', 'sandalye', 've', 'bir', 'koltuk'], 'extra' => ['kişi', 'masa']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Confirm or Cancel', 4,
                pictures: [['fr' => 'Calendrier', 'img' => 'calendar'], ['fr' => 'Horloge', 'img' => 'clock']],
                plain: [['fr' => 'Confirmer'], ['fr' => 'Annuler']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'confirmer', 'la', 'réservation'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to confirm the booking', 'correct' => ['I would like', 'to confirm', 'the', 'booking'], 'extra' => ['to cancel']],
                            'az' => ['sentence' => 'istəyirəm təsdiqləmək rezervasiya', 'correct' => ['istəyirəm', 'təsdiqləmək', 'rezervasiya'], 'extra' => ['ləğv etmək']],
                            'ar' => ['sentence' => 'أريد التأكيد حجز', 'correct' => ['أريد', 'التأكيد', 'حجز'], 'extra' => ['الإلغاء']],
                            'ru' => ['sentence' => 'я хочу подтвердить бронь', 'correct' => ['я', 'хочу', 'подтвердить', 'бронь'], 'extra' => ['отменить']],
                            'es' => ['sentence' => 'Quisiera confirmar la reserva', 'correct' => ['quisiera', 'confirmar', 'la', 'reserva'], 'extra' => ['cancelar']],
                            'de' => ['sentence' => 'Ich möchte die Reservierung bestätigen', 'correct' => ['ich möchte', 'die', 'Reservierung', 'bestätigen'], 'extra' => ['stornieren']],
                            'ja' => ['sentence' => '予約を確認したいです', 'correct' => ['予約', 'を', '確認し', 'たいです'], 'extra' => ['キャンセルする']],
                            'ko' => ['sentence' => '예약을 확인하고 싶습니다', 'correct' => ['예약을', '확인하고', '싶습니다'], 'extra' => ['취소하다']],
                            'tr' => ['sentence' => 'rezervasyonu onaylamak istiyorum', 'correct' => ['rezervasyonu', 'onaylamak', 'istiyorum'], 'extra' => ['iptal etmek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['annuler', 'la', 'table'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To cancel the table', 'correct' => ['to cancel', 'the', 'table'], 'extra' => ['to confirm', 'clock']],
                            'az' => ['sentence' => 'ləğv etmək masa', 'correct' => ['ləğv etmək', 'masa'], 'extra' => ['təsdiqləmək', 'saat']],
                            'ar' => ['sentence' => 'الإلغاء طاولة', 'correct' => ['الإلغاء', 'طاولة'], 'extra' => ['التأكيد', 'ساعة']],
                            'ru' => ['sentence' => 'отменить стол', 'correct' => ['отменить', 'стол'], 'extra' => ['подтвердить', 'часы']],
                            'es' => ['sentence' => 'Cancelar la mesa', 'correct' => ['cancelar', 'la', 'mesa'], 'extra' => ['confirmar', 'reloj']],
                            'de' => ['sentence' => 'Den Tisch stornieren', 'correct' => ['den', 'Tisch', 'stornieren'], 'extra' => ['bestätigen', 'Uhr']],
                            'ja' => ['sentence' => 'テーブルをキャンセルする', 'correct' => ['テーブル', 'を', 'キャンセルする'], 'extra' => ['確認する']],
                            'ko' => ['sentence' => '테이블을 취소하다', 'correct' => ['테이블을', '취소하다'], 'extra' => ['확인하다']],
                            'tr' => ['sentence' => 'masayı iptal etmek', 'correct' => ['masayı', 'iptal', 'etmek'], 'extra' => ['onaylamak', 'saat']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'calendrier', 'et', 'une', 'horloge'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A calendar and a clock', 'correct' => ['a', 'calendar', 'and', 'a', 'clock'], 'extra' => ['to cancel', 'to confirm']],
                            'az' => ['sentence' => 'bir təqvim və bir saat', 'correct' => ['bir', 'təqvim', 'və', 'bir', 'saat'], 'extra' => ['ləğv etmək', 'təsdiqləmək']],
                            'ar' => ['sentence' => 'تقويم و ساعة', 'correct' => ['تقويم', 'و', 'ساعة'], 'extra' => ['الإلغاء', 'التأكيد']],
                            'ru' => ['sentence' => 'календарь и часы', 'correct' => ['календарь', 'и', 'часы'], 'extra' => ['отменить', 'подтвердить']],
                            'es' => ['sentence' => 'Un calendario y un reloj', 'correct' => ['un', 'calendario', 'y', 'un', 'reloj'], 'extra' => ['cancelar', 'confirmar']],
                            'de' => ['sentence' => 'Ein Kalender und eine Uhr', 'correct' => ['ein', 'Kalender', 'und', 'eine', 'Uhr'], 'extra' => ['stornieren', 'bestätigen']],
                            'ja' => ['sentence' => 'カレンダーと時計', 'correct' => ['カレンダー', 'と', '時計'], 'extra' => ['確認する']],
                            'ko' => ['sentence' => '달력과 시계', 'correct' => ['달력과', '시계'], 'extra' => ['확인하다']],
                            'tr' => ['sentence' => 'bir takvim ve bir saat', 'correct' => ['bir', 'takvim', 've', 'bir', 'saat'], 'extra' => ['iptal etmek', 'onaylamak']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: The Restaurant and The Kitchen', 5,
                pictures: [['fr' => 'Menu', 'img' => 'menu'], ['fr' => 'Assiette', 'img' => 'plate']],
                plain: [['fr' => 'Restaurant'], ['fr' => 'Cuisine']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'restaurant', 'est', 'libre', 'demain'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The restaurant is free tomorrow', 'correct' => ['the', 'restaurant', 'is', 'free', 'tomorrow'], 'extra' => ['kitchen']],
                            'az' => ['sentence' => 'restoran pulsuz sabah', 'correct' => ['restoran', 'pulsuz', 'sabah'], 'extra' => ['mətbəx']],
                            'ar' => ['sentence' => 'مطعم مجاني غدا', 'correct' => ['مطعم', 'مجاني', 'غدا'], 'extra' => ['مطبخ']],
                            'ru' => ['sentence' => 'ресторан бесплатно завтра', 'correct' => ['ресторан', 'бесплатно', 'завтра'], 'extra' => ['кухня']],
                            'es' => ['sentence' => 'El restaurante está libre mañana', 'correct' => ['el', 'restaurante', 'está', 'libre', 'mañana'], 'extra' => ['cocina']],
                            'de' => ['sentence' => 'Das Restaurant ist morgen frei', 'correct' => ['das', 'Restaurant', 'ist', 'morgen', 'frei'], 'extra' => ['Küche']],
                            'ja' => ['sentence' => 'レストランは明日空いています', 'correct' => ['レストラン', 'は', '明日', '空いています'], 'extra' => ['厨房']],
                            'ko' => ['sentence' => '식당은 내일 비어 있습니다', 'correct' => ['식당은', '내일', '비어', '있습니다'], 'extra' => ['주방']],
                            'tr' => ['sentence' => 'restoran yarın müsait', 'correct' => ['restoran', 'yarın', 'müsait'], 'extra' => ['mutfak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'menu', 'de', 'la', 'cuisine'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The menu from the kitchen', 'correct' => ['the', 'menu', 'from', 'the', 'kitchen'], 'extra' => ['restaurant', 'plate']],
                            'az' => ['sentence' => 'menyu dan mətbəx', 'correct' => ['menyu', 'dan', 'mətbəx'], 'extra' => ['restoran', 'boşqab']],
                            'ar' => ['sentence' => 'قائمة الطعام من مطبخ', 'correct' => ['قائمة الطعام', 'من', 'مطبخ'], 'extra' => ['مطعم', 'صحن']],
                            'ru' => ['sentence' => 'меню из кухня', 'correct' => ['меню', 'из', 'кухня'], 'extra' => ['ресторан', 'тарелка']],
                            'es' => ['sentence' => 'El menú de la cocina', 'correct' => ['el', 'menú', 'de', 'la', 'cocina'], 'extra' => ['restaurante', 'plato']],
                            'de' => ['sentence' => 'Das Menü aus der Küche', 'correct' => ['das', 'Menü', 'aus', 'der', 'Küche'], 'extra' => ['Restaurant', 'Teller']],
                            'ja' => ['sentence' => '厨房のメニュー', 'correct' => ['厨房', 'の', 'メニュー'], 'extra' => ['レストラン']],
                            'ko' => ['sentence' => '주방의 메뉴', 'correct' => ['주방의', '메뉴'], 'extra' => ['식당']],
                            'tr' => ['sentence' => 'mutfaktan menü', 'correct' => ['mutfaktan', 'menü'], 'extra' => ['restoran', 'tabak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'assiette', 'du', 'restaurant'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A plate from the restaurant', 'correct' => ['a', 'plate', 'from the', 'restaurant'], 'extra' => ['kitchen', 'menu']],
                            'az' => ['sentence' => 'bir boşqab dan restoran', 'correct' => ['bir', 'boşqab', 'dan', 'restoran'], 'extra' => ['mətbəx', 'menyu']],
                            'ar' => ['sentence' => 'صحن من مطعم', 'correct' => ['صحن', 'من', 'مطعم'], 'extra' => ['مطبخ', 'قائمة الطعام']],
                            'ru' => ['sentence' => 'тарелка из ресторан', 'correct' => ['тарелка', 'из', 'ресторан'], 'extra' => ['кухня', 'меню']],
                            'es' => ['sentence' => 'Un plato del restaurante', 'correct' => ['un', 'plato', 'del', 'restaurante'], 'extra' => ['cocina', 'menú']],
                            'de' => ['sentence' => 'Ein Teller aus dem Restaurant', 'correct' => ['ein', 'Teller', 'aus dem', 'Restaurant'], 'extra' => ['Küche', 'Menü']],
                            'ja' => ['sentence' => 'レストランのお皿', 'correct' => ['レストラン', 'の', 'お皿'], 'extra' => ['厨房']],
                            'ko' => ['sentence' => '식당의 접시', 'correct' => ['식당의', '접시'], 'extra' => ['주방']],
                            'tr' => ['sentence' => 'restorandan bir tabak', 'correct' => ['restorandan', 'bir', 'tabak'], 'extra' => ['mutfak', 'menü']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
