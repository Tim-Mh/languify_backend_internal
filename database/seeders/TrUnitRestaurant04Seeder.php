<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitRestaurant04Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Masa' => 'table',
        'Menü' => 'menu',
        'Ev' => 'house',
        'Saat' => 'clock',
        'Arkadaş' => 'friend',
    ];

    /**
     * Turkish Restaurant Unit 4 - booking a table.
     *
     * THE RULE THIS UNIT TEACHES: `için` FOLLOWS WHAT IT GOVERNS.
     *
     * English puts "for" in front: for two people. Turkish puts `için` after:
     * `iki kişi için`. It is a postposition, and every one of them works this way,
     * so the pattern is worth meeting once and recognising forever.
     *
     * Numbers do not pluralise the noun they count. `iki kişi`, not `iki kişiler`:
     * the number already says there is more than one, so the plural would be saying
     * it twice. This is the single most common mistake an English speaker makes in
     * Turkish, which is why lesson 2 drills it directly.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Making Reservations', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Table for Two', 1,
                pictures: [['tr' => 'Masa', 'img' => 'table'], ['tr' => 'Menü', 'img' => 'menu']],
                plain: [['tr' => 'Rezervasyon'], ['tr' => 'Kişi']],
                phrases: [
                    'a' => [
                        'words' => ['iki', 'kişi', 'için'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'For two people', 'correct' => ['for', 'two', 'people'], 'extra' => ['table']],
                            'az' => ['sentence' => 'üçün iki insanlar', 'correct' => ['üçün', 'iki', 'insanlar'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'لأجل اثنان ناس', 'correct' => ['لأجل', 'اثنان', 'ناس'], 'extra' => ['طاولة']],
                            'ru' => ['sentence' => 'для два люди', 'correct' => ['для', 'два', 'люди'], 'extra' => ['стол']],
                            'fr' => ['sentence' => 'Pour deux personnes', 'correct' => ['pour', 'deux', 'personnes'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Para dos personas', 'correct' => ['para', 'dos', 'personas'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Für zwei Personen', 'correct' => ['für', 'zwei', 'Personen'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '二人のために', 'correct' => ['二人', 'のために'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '두 사람을 위해', 'correct' => ['두', '사람을', '위해'], 'extra' => ['테이블']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'masa', 'istiyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I would like a table', 'correct' => ['I would like', 'a', 'table'], 'extra' => ['menu']],
                            'az' => ['sentence' => 'istəyirəm bir masa', 'correct' => ['istəyirəm', 'bir', 'masa'], 'extra' => ['menyu']],
                            'ar' => ['sentence' => 'أريد طاولة', 'correct' => ['أريد', 'طاولة'], 'extra' => ['قائمة الطعام']],
                            'ru' => ['sentence' => 'я хочу стол', 'correct' => ['я', 'хочу', 'стол'], 'extra' => ['меню']],
                            'fr' => ['sentence' => 'Je voudrais une table', 'correct' => ['je voudrais', 'une', 'table'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Quisiera una mesa', 'correct' => ['quisiera', 'una', 'mesa'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Ich möchte einen Tisch', 'correct' => ['ich möchte', 'einen', 'Tisch'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'テーブルをください', 'correct' => ['テーブルを', 'ください'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '테이블 주세요', 'correct' => ['테이블', '주세요'], 'extra' => ['메뉴']],
                        ],
                    ],
                    'c' => [
                        'words' => ['rezervasyon', 'var'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is a reservation', 'correct' => ['there is', 'a', 'reservation'], 'extra' => ['table']],
                            'az' => ['sentence' => 'var bir rezervasiya', 'correct' => ['var', 'bir', 'rezervasiya'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'يوجد حجز', 'correct' => ['يوجد', 'حجز'], 'extra' => ['طاولة']],
                            'ru' => ['sentence' => 'есть бронь', 'correct' => ['есть', 'бронь'], 'extra' => ['стол']],
                            'fr' => ['sentence' => 'Il y a une réservation', 'correct' => ['il y a', 'une', 'réservation'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Hay una reserva', 'correct' => ['hay', 'una', 'reserva'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Es gibt eine Reservierung', 'correct' => ['es gibt', 'eine', 'Reservierung'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '予約があります', 'correct' => ['予約が', 'あります'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '예약이 있어요', 'correct' => ['예약이', '있어요'], 'extra' => ['테이블']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: How Many People', 2,
                pictures: [['tr' => 'Arkadaş', 'img' => 'friend'], ['tr' => 'Masa', 'img' => 'table']],
                plain: [['tr' => 'Kişi'], ['tr' => 'Kaç']],
                phrases: [
                    'a' => [
                        'words' => ['kaç', 'kişi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many people', 'correct' => ['how many', 'people'], 'extra' => ['table']],
                            'az' => ['sentence' => 'neçə insanlar', 'correct' => ['neçə', 'insanlar'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'كم ناس', 'correct' => ['كم', 'ناس'], 'extra' => ['طاولة']],
                            'ru' => ['sentence' => 'сколько люди', 'correct' => ['сколько', 'люди'], 'extra' => ['стол']],
                            'fr' => ['sentence' => 'Combien de personnes', 'correct' => ['combien de', 'personnes'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Cuántas personas', 'correct' => ['cuántas', 'personas'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Wie viele Personen', 'correct' => ['wie viele', 'Personen'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '何人ですか', 'correct' => ['何人', 'ですか'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '몇 사람이에요', 'correct' => ['몇', '사람이에요'], 'extra' => ['테이블']],
                        ],
                    ],
                    'b' => [
                        'words' => ['üç', 'kişi'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Three people', 'correct' => ['three', 'people'], 'extra' => ['two']],
                            'az' => ['sentence' => 'üç insanlar', 'correct' => ['üç', 'insanlar'], 'extra' => ['iki']],
                            'ar' => ['sentence' => 'ثلاثة ناس', 'correct' => ['ثلاثة', 'ناس'], 'extra' => ['اثنان']],
                            'ru' => ['sentence' => 'три люди', 'correct' => ['три', 'люди'], 'extra' => ['два']],
                            'fr' => ['sentence' => 'Trois personnes', 'correct' => ['trois', 'personnes'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Tres personas', 'correct' => ['tres', 'personas'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Drei Personen', 'correct' => ['drei', 'Personen'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => '三人', 'correct' => ['三人'], 'extra' => ['二人']],
                            'ko' => ['sentence' => '세 사람', 'correct' => ['세', '사람'], 'extra' => ['두']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kişi', 'için'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'For one person', 'correct' => ['for', 'one', 'person'], 'extra' => ['two']],
                            'az' => ['sentence' => 'üçün bir adam', 'correct' => ['üçün', 'bir', 'adam'], 'extra' => ['iki']],
                            'ar' => ['sentence' => 'لأجل واحد شخص', 'correct' => ['لأجل', 'واحد', 'شخص'], 'extra' => ['اثنان']],
                            'ru' => ['sentence' => 'для один человек', 'correct' => ['для', 'один', 'человек'], 'extra' => ['два']],
                            'fr' => ['sentence' => 'Pour une personne', 'correct' => ['pour', 'une', 'personne'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Para una persona', 'correct' => ['para', 'una', 'persona'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Für eine Person', 'correct' => ['für', 'eine', 'Person'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => '一人のために', 'correct' => ['一人', 'のために'], 'extra' => ['二人']],
                            'ko' => ['sentence' => '한 사람을 위해', 'correct' => ['한', '사람을', '위해'], 'extra' => ['두']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: What Time', 3,
                pictures: [['tr' => 'Saat', 'img' => 'clock'], ['tr' => 'Ev', 'img' => 'house']],
                plain: [['tr' => 'Saat'], ['tr' => 'Akşam']],
                phrases: [
                    'a' => [
                        'words' => ['saat', 'kaç'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What is the time', 'correct' => ['what', 'is', 'the time'], 'extra' => ['evening']],
                            'az' => ['sentence' => 'nə vaxt', 'correct' => ['nə', 'vaxt'], 'extra' => ['axşam']],
                            'ar' => ['sentence' => 'ماذا وقت', 'correct' => ['ماذا', 'وقت'], 'extra' => ['مساء']],
                            'ru' => ['sentence' => 'что время', 'correct' => ['что', 'время'], 'extra' => ['вечер']],
                            'fr' => ['sentence' => 'Quelle est l’heure', 'correct' => ['quelle', 'est', 'l’heure'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'Cuál es la hora', 'correct' => ['cuál', 'es', 'la hora'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Wie ist die Uhrzeit', 'correct' => ['wie', 'ist', 'die Uhrzeit'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '何時ですか', 'correct' => ['何時', 'ですか'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '몇 시예요', 'correct' => ['몇', '시예요'], 'extra' => ['저녁']],
                        ],
                    ],
                    'b' => [
                        'words' => ['akşam', 'için'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'For the evening', 'correct' => ['for', 'the evening'], 'extra' => ['morning']],
                            'az' => ['sentence' => 'üçün axşam', 'correct' => ['üçün', 'axşam'], 'extra' => ['səhər']],
                            'ar' => ['sentence' => 'لأجل مساء', 'correct' => ['لأجل', 'مساء'], 'extra' => ['صباح']],
                            'ru' => ['sentence' => 'для вечер', 'correct' => ['для', 'вечер'], 'extra' => ['утро']],
                            'fr' => ['sentence' => 'Pour le soir', 'correct' => ['pour', 'le soir'], 'extra' => ['matin']],
                            'es' => ['sentence' => 'Para la tarde', 'correct' => ['para', 'la tarde'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Für den Abend', 'correct' => ['für', 'den Abend'], 'extra' => ['Morgen']],
                            'ja' => ['sentence' => '夕方のために', 'correct' => ['夕方', 'のために'], 'extra' => ['朝']],
                            'ko' => ['sentence' => '저녁을 위해', 'correct' => ['저녁을', '위해'], 'extra' => ['아침']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bugün', 'akşam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This evening', 'correct' => ['this', 'evening'], 'extra' => ['tomorrow']],
                            'az' => ['sentence' => 'bu axşam', 'correct' => ['bu', 'axşam'], 'extra' => ['sabah']],
                            'ar' => ['sentence' => 'هذا مساء', 'correct' => ['هذا', 'مساء'], 'extra' => ['غدا']],
                            'ru' => ['sentence' => 'это вечер', 'correct' => ['это', 'вечер'], 'extra' => ['завтра']],
                            'fr' => ['sentence' => 'Ce soir', 'correct' => ['ce', 'soir'], 'extra' => ['demain']],
                            'es' => ['sentence' => 'Esta tarde', 'correct' => ['esta', 'tarde'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Diesen Abend', 'correct' => ['diesen', 'Abend'], 'extra' => ['morgen']],
                            'ja' => ['sentence' => '今日の夕方', 'correct' => ['今日の', '夕方'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '오늘 저녁', 'correct' => ['오늘', '저녁'], 'extra' => ['내일']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Confirming', 4,
                pictures: [['tr' => 'Masa', 'img' => 'table'], ['tr' => 'Saat', 'img' => 'clock']],
                plain: [['tr' => 'Rezervasyon'], ['tr' => 'Doğru']],
                phrases: [
                    'a' => [
                        'words' => ['rezervasyon', 'doğru'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The reservation is true', 'correct' => ['the reservation', 'is', 'true'], 'extra' => ['wrong']],
                            'az' => ['sentence' => 'rezervasiya düzgün', 'correct' => ['rezervasiya', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'حجز صحيح', 'correct' => ['حجز', 'صحيح'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'бронь правильно', 'correct' => ['бронь', 'правильно'], 'extra' => ['неправильно']],
                            'fr' => ['sentence' => 'La réservation est vraie', 'correct' => ['la réservation', 'est', 'vraie'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'La reserva es verdadera', 'correct' => ['la reserva', 'es', 'verdadera'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Die Reservierung ist richtig', 'correct' => ['die Reservierung', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => '予約は正しいです', 'correct' => ['予約は', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '예약은 맞아요', 'correct' => ['예약은', '맞아요'], 'extra' => ['틀린']],
                        ],
                    ],
                    'b' => [
                        'words' => ['masa', 'hazır'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The table is ready', 'correct' => ['the table', 'is', 'ready'], 'extra' => ['reservation']],
                            'az' => ['sentence' => 'masa hazır', 'correct' => ['masa', 'hazır'], 'extra' => ['rezervasiya']],
                            'ar' => ['sentence' => 'طاولة جاهز', 'correct' => ['طاولة', 'جاهز'], 'extra' => ['حجز']],
                            'ru' => ['sentence' => 'стол готов', 'correct' => ['стол', 'готов'], 'extra' => ['бронь']],
                            'fr' => ['sentence' => 'La table est prête', 'correct' => ['la table', 'est', 'prête'], 'extra' => ['réservation']],
                            'es' => ['sentence' => 'La mesa está lista', 'correct' => ['la mesa', 'está', 'lista'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Der Tisch ist fertig', 'correct' => ['der Tisch', 'ist', 'fertig'], 'extra' => ['Reservierung']],
                            'ja' => ['sentence' => 'テーブルは準備できています', 'correct' => ['テーブルは', '準備できています'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블은 준비됐어요', 'correct' => ['테이블은', '준비됐어요'], 'extra' => ['예약']],
                        ],
                    ],
                    'c' => [
                        'words' => ['teşekkürler'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you', 'correct' => ['thank you'], 'extra' => ['please']],
                            'az' => ['sentence' => 'təşəkkür', 'correct' => ['təşəkkür'], 'extra' => ['zəhmət olmasa']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['من فضلك']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['пожалуйста']],
                            'fr' => ['sentence' => 'Merci', 'correct' => ['merci'], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Gracias', 'correct' => ['gracias'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Danke', 'correct' => ['danke'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'ありがとう', 'correct' => ['ありがとう'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '고맙습니다', 'correct' => ['고맙습니다'], 'extra' => ['부탁합니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Whole Booking', 5,
                pictures: [['tr' => 'Masa', 'img' => 'table'], ['tr' => 'Arkadaş', 'img' => 'friend']],
                plain: [['tr' => 'Kişi'], ['tr' => 'Masa']],
                phrases: [
                    'a' => [
                        'words' => ['iki', 'kişi', 'için', 'bir', 'masa'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'A table for two people', 'correct' => ['a', 'table', 'for', 'two', 'people'], 'extra' => ['reservation']],
                            'az' => ['sentence' => 'bir masa üçün iki insanlar', 'correct' => ['bir', 'masa', 'üçün', 'iki', 'insanlar'], 'extra' => ['rezervasiya']],
                            'ar' => ['sentence' => 'طاولة لأجل اثنان ناس', 'correct' => ['طاولة', 'لأجل', 'اثنان', 'ناس'], 'extra' => ['حجز']],
                            'ru' => ['sentence' => 'стол для два люди', 'correct' => ['стол', 'для', 'два', 'люди'], 'extra' => ['бронь']],
                            'fr' => ['sentence' => 'Une table pour deux personnes', 'correct' => ['une', 'table', 'pour', 'deux', 'personnes'], 'extra' => ['réservation']],
                            'es' => ['sentence' => 'Una mesa para dos personas', 'correct' => ['una', 'mesa', 'para', 'dos', 'personas'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Ein Tisch für zwei Personen', 'correct' => ['ein', 'Tisch', 'für', 'zwei', 'Personen'], 'extra' => ['Reservierung']],
                            'ja' => ['sentence' => '二人のためのテーブル', 'correct' => ['二人', 'のための', 'テーブル'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '두 사람을 위한 테이블', 'correct' => ['두', '사람을', '위한', '테이블'], 'extra' => ['예약']],
                        ],
                    ],
                    'b' => [
                        'words' => ['akşam', 'için', 'rezervasyon'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A reservation for the evening', 'correct' => ['a', 'reservation', 'for', 'the evening'], 'extra' => ['table']],
                            'az' => ['sentence' => 'bir rezervasiya üçün axşam', 'correct' => ['bir', 'rezervasiya', 'üçün', 'axşam'], 'extra' => ['masa']],
                            'ar' => ['sentence' => 'حجز لأجل مساء', 'correct' => ['حجز', 'لأجل', 'مساء'], 'extra' => ['طاولة']],
                            'ru' => ['sentence' => 'бронь для вечер', 'correct' => ['бронь', 'для', 'вечер'], 'extra' => ['стол']],
                            'fr' => ['sentence' => 'Une réservation pour le soir', 'correct' => ['une', 'réservation', 'pour', 'le soir'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Una reserva para la tarde', 'correct' => ['una', 'reserva', 'para', 'la tarde'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Eine Reservierung für den Abend', 'correct' => ['eine', 'Reservierung', 'für', 'den Abend'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '夕方のための予約', 'correct' => ['夕方', 'のための', '予約'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '저녁을 위한 예약', 'correct' => ['저녁을', '위한', '예약'], 'extra' => ['테이블']],
                        ],
                    ],
                    'c' => [
                        'words' => ['masa', 'var', 'mı'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Is there a table', 'correct' => ['is there', 'a', 'table'], 'extra' => ['reservation']],
                            'az' => ['sentence' => 'mı bir masa', 'correct' => ['mı', 'bir', 'masa'], 'extra' => ['rezervasiya']],
                            'ar' => ['sentence' => 'هل طاولة', 'correct' => ['هل', 'طاولة'], 'extra' => ['حجز']],
                            'ru' => ['sentence' => 'ли стол', 'correct' => ['ли', 'стол'], 'extra' => ['бронь']],
                            'fr' => ['sentence' => 'Y a-t-il une table', 'correct' => ['y a-t-il', 'une', 'table'], 'extra' => ['réservation']],
                            'es' => ['sentence' => 'Hay una mesa', 'correct' => ['hay', 'una', 'mesa'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Gibt es einen Tisch', 'correct' => ['gibt es', 'einen', 'Tisch'], 'extra' => ['Reservierung']],
                            'ja' => ['sentence' => 'テーブルがありますか', 'correct' => ['テーブルが', 'ありますか'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블이 있어요', 'correct' => ['테이블이', '있어요'], 'extra' => ['예약']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
