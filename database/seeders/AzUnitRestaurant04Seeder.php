<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitRestaurant04Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Masa' => 'table', 'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water',
        'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese', 'Tort' => 'cake',
    ];

    /**
     * Azerbaijani Restaurant Unit 4.
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
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Making Reservations', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Table for Two', 1,
                pictures: [['az' => 'Masa', 'img' => 'table'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Üçün'], ['az' => 'İki']],
                phrases: [
                    'a' => [
                        'words' => ['üçün', 'iki', 'insanlar'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'For two people', 'correct' => ['for', 'two', 'people'], 'extra' => ['table']],
                            'fr' => ['sentence' => 'Pour deux personnes', 'correct' => ['pour', 'deux', 'personnes'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Para dos personas', 'correct' => ['para', 'dos', 'personas'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Für zwei Personen', 'correct' => ['für', 'zwei', 'Personen'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '二人のために', 'correct' => ['二人', 'のために'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '두 사람을 위해', 'correct' => ['두', '사람을', '위해'], 'extra' => ['테이블']],
                            'tr' => ['sentence' => 'iki kişi için', 'correct' => ['iki', 'kişi', 'için'], 'extra' => ['rezervasyon', 'masa']],
                            'ru' => ['sentence' => 'для два люди', 'correct' => ['для', 'два', 'люди'], 'extra' => ['стол']],
                            'ar' => ['sentence' => 'لأجل اثنان ناس', 'correct' => ['لأجل', 'اثنان', 'ناس'], 'extra' => ['طاولة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['istəyirəm', 'bir', 'masa'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a table', 'correct' => ['I would like', 'a', 'table'], 'extra' => ['menu']],
                            'fr' => ['sentence' => 'Je voudrais une table', 'correct' => ['je voudrais', 'une', 'table'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Quisiera una mesa', 'correct' => ['quisiera', 'una', 'mesa'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Ich möchte einen Tisch', 'correct' => ['ich möchte', 'einen', 'Tisch'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'テーブルをください', 'correct' => ['テーブルを', 'ください'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '테이블 주세요', 'correct' => ['테이블', '주세요'], 'extra' => ['메뉴']],
                            'tr' => ['sentence' => 'bir masa istiyorum', 'correct' => ['bir', 'masa', 'istiyorum'], 'extra' => ['rezervasyon', 'kişi']],
                            'ru' => ['sentence' => 'я хочу стол', 'correct' => ['я', 'хочу', 'стол'], 'extra' => ['меню']],
                            'ar' => ['sentence' => 'أريد طاولة', 'correct' => ['أريد', 'طاولة'], 'extra' => ['قائمة الطعام']],
                        ],
                    ],
                    'c' => [
                        'words' => ['var', 'bir', 'rezervasiya'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is a reservation', 'correct' => ['there is', 'a', 'reservation'], 'extra' => ['table']],
                            'fr' => ['sentence' => 'Il y a une réservation', 'correct' => ['il y a', 'une', 'réservation'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Hay una reserva', 'correct' => ['hay', 'una', 'reserva'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Es gibt eine Reservierung', 'correct' => ['es gibt', 'eine', 'Reservierung'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '予約があります', 'correct' => ['予約が', 'あります'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '예약이 있어요', 'correct' => ['예약이', '있어요'], 'extra' => ['테이블']],
                            'tr' => ['sentence' => 'rezervasyon var', 'correct' => ['rezervasyon', 'var'], 'extra' => ['kişi', 'masa']],
                            'ru' => ['sentence' => 'есть бронь', 'correct' => ['есть', 'бронь'], 'extra' => ['стол']],
                            'ar' => ['sentence' => 'يوجد حجز', 'correct' => ['يوجد', 'حجز'], 'extra' => ['طاولة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: How Many People', 2,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Neçə'], ['az' => 'İnsanlar']],
                phrases: [
                    'a' => [
                        'words' => ['neçə', 'insanlar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many people', 'correct' => ['how many', 'people'], 'extra' => ['table']],
                            'fr' => ['sentence' => 'Combien de personnes', 'correct' => ['combien de', 'personnes'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Cuántas personas', 'correct' => ['cuántas', 'personas'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Wie viele Personen', 'correct' => ['wie viele', 'Personen'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '何人ですか', 'correct' => ['何人', 'ですか'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '몇 사람이에요', 'correct' => ['몇', '사람이에요'], 'extra' => ['테이블']],
                            'tr' => ['sentence' => 'kaç kişi', 'correct' => ['kaç', 'kişi'], 'extra' => ['arkadaş', 'masa']],
                            'ru' => ['sentence' => 'сколько люди', 'correct' => ['сколько', 'люди'], 'extra' => ['стол']],
                            'ar' => ['sentence' => 'كم ناس', 'correct' => ['كم', 'ناس'], 'extra' => ['طاولة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['üç', 'insanlar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Three people', 'correct' => ['three', 'people'], 'extra' => ['two']],
                            'fr' => ['sentence' => 'Trois personnes', 'correct' => ['trois', 'personnes'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Tres personas', 'correct' => ['tres', 'personas'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Drei Personen', 'correct' => ['drei', 'Personen'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => '三人', 'correct' => ['三人'], 'extra' => ['二人']],
                            'ko' => ['sentence' => '세 사람', 'correct' => ['세', '사람'], 'extra' => ['두']],
                            'tr' => ['sentence' => 'üç kişi', 'correct' => ['üç', 'kişi'], 'extra' => ['kaç', 'arkadaş']],
                            'ru' => ['sentence' => 'три люди', 'correct' => ['три', 'люди'], 'extra' => ['два']],
                            'ar' => ['sentence' => 'ثلاثة ناس', 'correct' => ['ثلاثة', 'ناس'], 'extra' => ['اثنان']],
                        ],
                    ],
                    'c' => [
                        'words' => ['üçün', 'bir', 'adam'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'For one person', 'correct' => ['for', 'one', 'person'], 'extra' => ['two']],
                            'fr' => ['sentence' => 'Pour une personne', 'correct' => ['pour', 'une', 'personne'], 'extra' => ['deux']],
                            'es' => ['sentence' => 'Para una persona', 'correct' => ['para', 'una', 'persona'], 'extra' => ['dos']],
                            'de' => ['sentence' => 'Für eine Person', 'correct' => ['für', 'eine', 'Person'], 'extra' => ['zwei']],
                            'ja' => ['sentence' => '一人のために', 'correct' => ['一人', 'のために'], 'extra' => ['二人']],
                            'ko' => ['sentence' => '한 사람을 위해', 'correct' => ['한', '사람을', '위해'], 'extra' => ['두']],
                            'tr' => ['sentence' => 'bir kişi için', 'correct' => ['bir', 'kişi', 'için'], 'extra' => ['kaç', 'arkadaş']],
                            'ru' => ['sentence' => 'для один человек', 'correct' => ['для', 'один', 'человек'], 'extra' => ['два']],
                            'ar' => ['sentence' => 'لأجل واحد شخص', 'correct' => ['لأجل', 'واحد', 'شخص'], 'extra' => ['اثنان']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: What Time', 3,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Nə'], ['az' => 'Vaxt']],
                phrases: [
                    'a' => [
                        'words' => ['nə', 'vaxt'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What is the time', 'correct' => ['what', 'is', 'the time'], 'extra' => ['evening']],
                            'fr' => ['sentence' => 'Quelle est l’heure', 'correct' => ['quelle', 'est', 'l’heure'], 'extra' => ['soir']],
                            'es' => ['sentence' => 'Cuál es la hora', 'correct' => ['cuál', 'es', 'la hora'], 'extra' => ['tarde']],
                            'de' => ['sentence' => 'Wie ist die Uhrzeit', 'correct' => ['wie', 'ist', 'die Uhrzeit'], 'extra' => ['Abend']],
                            'ja' => ['sentence' => '何時ですか', 'correct' => ['何時', 'ですか'], 'extra' => ['夕方']],
                            'ko' => ['sentence' => '몇 시예요', 'correct' => ['몇', '시예요'], 'extra' => ['저녁']],
                            'tr' => ['sentence' => 'saat kaç', 'correct' => ['saat', 'kaç'], 'extra' => ['akşam', 'ev']],
                            'ru' => ['sentence' => 'что время', 'correct' => ['что', 'время'], 'extra' => ['вечер']],
                            'ar' => ['sentence' => 'ماذا وقت', 'correct' => ['ماذا', 'وقت'], 'extra' => ['مساء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['üçün', 'axşam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'For the evening', 'correct' => ['for', 'the evening'], 'extra' => ['morning']],
                            'fr' => ['sentence' => 'Pour le soir', 'correct' => ['pour', 'le soir'], 'extra' => ['matin']],
                            'es' => ['sentence' => 'Para la tarde', 'correct' => ['para', 'la tarde'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Für den Abend', 'correct' => ['für', 'den Abend'], 'extra' => ['Morgen']],
                            'ja' => ['sentence' => '夕方のために', 'correct' => ['夕方', 'のために'], 'extra' => ['朝']],
                            'ko' => ['sentence' => '저녁을 위해', 'correct' => ['저녁을', '위해'], 'extra' => ['아침']],
                            'tr' => ['sentence' => 'akşam için', 'correct' => ['akşam', 'için'], 'extra' => ['saat', 'saat']],
                            'ru' => ['sentence' => 'для вечер', 'correct' => ['для', 'вечер'], 'extra' => ['утро']],
                            'ar' => ['sentence' => 'لأجل مساء', 'correct' => ['لأجل', 'مساء'], 'extra' => ['صباح']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'axşam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This evening', 'correct' => ['this', 'evening'], 'extra' => ['tomorrow']],
                            'fr' => ['sentence' => 'Ce soir', 'correct' => ['ce', 'soir'], 'extra' => ['demain']],
                            'es' => ['sentence' => 'Esta tarde', 'correct' => ['esta', 'tarde'], 'extra' => ['mañana']],
                            'de' => ['sentence' => 'Diesen Abend', 'correct' => ['diesen', 'Abend'], 'extra' => ['morgen']],
                            'ja' => ['sentence' => '今日の夕方', 'correct' => ['今日の', '夕方'], 'extra' => ['明日']],
                            'ko' => ['sentence' => '오늘 저녁', 'correct' => ['오늘', '저녁'], 'extra' => ['내일']],
                            'tr' => ['sentence' => 'bugün akşam', 'correct' => ['bugün', 'akşam'], 'extra' => ['saat', 'saat']],
                            'ru' => ['sentence' => 'это вечер', 'correct' => ['это', 'вечер'], 'extra' => ['завтра']],
                            'ar' => ['sentence' => 'هذا مساء', 'correct' => ['هذا', 'مساء'], 'extra' => ['غدا']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Confirming', 4,
                pictures: [['az' => 'Masa', 'img' => 'table'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Rezervasiya'], ['az' => 'Düzgün']],
                phrases: [
                    'a' => [
                        'words' => ['rezervasiya', 'düzgün'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The reservation is true', 'correct' => ['the reservation', 'is', 'true'], 'extra' => ['wrong']],
                            'fr' => ['sentence' => 'La réservation est vraie', 'correct' => ['la réservation', 'est', 'vraie'], 'extra' => ['faux']],
                            'es' => ['sentence' => 'La reserva es verdadera', 'correct' => ['la reserva', 'es', 'verdadera'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Die Reservierung ist richtig', 'correct' => ['die Reservierung', 'ist', 'richtig'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => '予約は正しいです', 'correct' => ['予約は', '正しいです'], 'extra' => ['間違い']],
                            'ko' => ['sentence' => '예약은 맞아요', 'correct' => ['예약은', '맞아요'], 'extra' => ['틀린']],
                            'tr' => ['sentence' => 'rezervasyon doğru', 'correct' => ['rezervasyon', 'doğru'], 'extra' => ['masa', 'saat']],
                            'ru' => ['sentence' => 'бронь правильно', 'correct' => ['бронь', 'правильно'], 'extra' => ['неправильно']],
                            'ar' => ['sentence' => 'حجز صحيح', 'correct' => ['حجز', 'صحيح'], 'extra' => ['خطأ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['masa', 'hazır'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The table is ready', 'correct' => ['the table', 'is', 'ready'], 'extra' => ['reservation']],
                            'fr' => ['sentence' => 'La table est prête', 'correct' => ['la table', 'est', 'prête'], 'extra' => ['réservation']],
                            'es' => ['sentence' => 'La mesa está lista', 'correct' => ['la mesa', 'está', 'lista'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Der Tisch ist fertig', 'correct' => ['der Tisch', 'ist', 'fertig'], 'extra' => ['Reservierung']],
                            'ja' => ['sentence' => 'テーブルは準備できています', 'correct' => ['テーブルは', '準備できています'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블은 준비됐어요', 'correct' => ['테이블은', '준비됐어요'], 'extra' => ['예약']],
                            'tr' => ['sentence' => 'masa hazır', 'correct' => ['masa', 'hazır'], 'extra' => ['rezervasyon', 'doğru']],
                            'ru' => ['sentence' => 'стол готов', 'correct' => ['стол', 'готов'], 'extra' => ['бронь']],
                            'ar' => ['sentence' => 'طاولة جاهز', 'correct' => ['طاولة', 'جاهز'], 'extra' => ['حجز']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çox sağ ol'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you very much', 'correct' => ['thank you', 'very much'], 'extra' => ['please']],
                            'fr' => ['sentence' => 'Merci beaucoup', 'correct' => ['merci', 'beaucoup'], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Muchas gracias', 'correct' => ['muchas', 'gracias'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Vielen Dank', 'correct' => ['vielen', 'Dank'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'どうもありがとう', 'correct' => ['どうも', 'ありがとう'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '정말 감사합니다', 'correct' => ['정말', '감사합니다'], 'extra' => ['부탁합니다']],
                            'tr' => ['sentence' => 'teşekkürler', 'correct' => ['teşekkürler'], 'extra' => ['rezervasyon', 'doğru']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['пожалуйста']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['من فضلك']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Whole Booking', 5,
                pictures: [['az' => 'Masa', 'img' => 'table'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Bir'], ['az' => 'Üçün']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'masa', 'üçün', 'iki', 'insanlar'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A table for two people', 'correct' => ['a', 'table', 'for', 'two', 'people'], 'extra' => ['reservation']],
                            'fr' => ['sentence' => 'Une table pour deux personnes', 'correct' => ['une', 'table', 'pour', 'deux', 'personnes'], 'extra' => ['réservation']],
                            'es' => ['sentence' => 'Una mesa para dos personas', 'correct' => ['una', 'mesa', 'para', 'dos', 'personas'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Ein Tisch für zwei Personen', 'correct' => ['ein', 'Tisch', 'für', 'zwei', 'Personen'], 'extra' => ['Reservierung']],
                            'ja' => ['sentence' => '二人のためのテーブル', 'correct' => ['二人', 'のための', 'テーブル'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '두 사람을 위한 테이블', 'correct' => ['두', '사람을', '위한', '테이블'], 'extra' => ['예약']],
                            'tr' => ['sentence' => 'iki kişi için bir masa', 'correct' => ['iki', 'kişi', 'için', 'bir', 'masa'], 'extra' => ['arkadaş']],
                            'ru' => ['sentence' => 'стол для два люди', 'correct' => ['стол', 'для', 'два', 'люди'], 'extra' => ['бронь']],
                            'ar' => ['sentence' => 'طاولة لأجل اثنان ناس', 'correct' => ['طاولة', 'لأجل', 'اثنان', 'ناس'], 'extra' => ['حجز']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'rezervasiya', 'üçün', 'axşam'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A reservation for the evening', 'correct' => ['a', 'reservation', 'for', 'the evening'], 'extra' => ['table']],
                            'fr' => ['sentence' => 'Une réservation pour le soir', 'correct' => ['une', 'réservation', 'pour', 'le soir'], 'extra' => ['table']],
                            'es' => ['sentence' => 'Una reserva para la tarde', 'correct' => ['una', 'reserva', 'para', 'la tarde'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Eine Reservierung für den Abend', 'correct' => ['eine', 'Reservierung', 'für', 'den Abend'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => '夕方のための予約', 'correct' => ['夕方', 'のための', '予約'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '저녁을 위한 예약', 'correct' => ['저녁을', '위한', '예약'], 'extra' => ['테이블']],
                            'tr' => ['sentence' => 'akşam için rezervasyon', 'correct' => ['akşam', 'için', 'rezervasyon'], 'extra' => ['kişi', 'masa']],
                            'ru' => ['sentence' => 'бронь для вечер', 'correct' => ['бронь', 'для', 'вечер'], 'extra' => ['стол']],
                            'ar' => ['sentence' => 'حجز لأجل مساء', 'correct' => ['حجز', 'لأجل', 'مساء'], 'extra' => ['طاولة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mı', 'bir', 'masa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Is there a table', 'correct' => ['is there', 'a', 'table'], 'extra' => ['reservation']],
                            'fr' => ['sentence' => 'Y a-t-il une table', 'correct' => ['y a-t-il', 'une', 'table'], 'extra' => ['réservation']],
                            'es' => ['sentence' => 'Hay una mesa', 'correct' => ['hay', 'una', 'mesa'], 'extra' => ['reserva']],
                            'de' => ['sentence' => 'Gibt es einen Tisch', 'correct' => ['gibt es', 'einen', 'Tisch'], 'extra' => ['Reservierung']],
                            'ja' => ['sentence' => 'テーブルがありますか', 'correct' => ['テーブルが', 'ありますか'], 'extra' => ['予約']],
                            'ko' => ['sentence' => '테이블이 있어요', 'correct' => ['테이블이', '있어요'], 'extra' => ['예약']],
                            'tr' => ['sentence' => 'masa var mı', 'correct' => ['masa', 'var', 'mı'], 'extra' => ['kişi', 'arkadaş']],
                            'ru' => ['sentence' => 'ли стол', 'correct' => ['ли', 'стол'], 'extra' => ['бронь']],
                            'ar' => ['sentence' => 'هل طاولة', 'correct' => ['هل', 'طاولة'], 'extra' => ['حجز']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
