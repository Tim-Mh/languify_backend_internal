<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitRestaurant05Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Çorba' => 'soup',
        'Et' => 'meat',
        'Balık' => 'fish',
        'Su' => 'water',
        'Menü' => 'menu',
    ];

    /**
     * Turkish Restaurant Unit 5 - saying the food is good, or is not.
     *
     * THE RULE THIS UNIT TEACHES: PRAISE AND COMPLAINT USE THE SAME FRAME.
     *
     * `Yemek lezzetli` and `Yemek soğuk` are built identically: subject, adjective,
     * nothing in between. Turkish has no copula in the present, so there is no "is"
     * to place and nothing changes between a compliment and a complaint except the
     * adjective itself.
     *
     * Negating one still needs the separate `değil`, as Conversation 9 established:
     * `lezzetli değil`, never a suffix. So this unit is mostly consolidation, which
     * is what a fifth unit should be.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Complaints and Compliments', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: It Is Delicious', 1,
                pictures: [['tr' => 'Çorba', 'img' => 'soup'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Lezzetli'], ['tr' => 'Yemek']],
                phrases: [
                    'a' => [
                        'words' => ['yemek', 'lezzetli'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The food is delicious', 'correct' => ['the food', 'is', 'delicious'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'yemək dadlı', 'correct' => ['yemək', 'dadlı'], 'extra' => ['duzlu']],
                            'ar' => ['sentence' => 'طعام لذيذ', 'correct' => ['طعام', 'لذيذ'], 'extra' => ['مالح']],
                            'ru' => ['sentence' => 'еда вкусный', 'correct' => ['еда', 'вкусный'], 'extra' => ['солёный']],
                            'fr' => ['sentence' => 'La nourriture est délicieuse', 'correct' => ['la nourriture', 'est', 'délicieuse'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La comida es deliciosa', 'correct' => ['la comida', 'es', 'deliciosa'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Das Essen ist lecker', 'correct' => ['das Essen', 'ist', 'lecker'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => '食べ物はおいしいです', 'correct' => ['食べ物は', 'おいしいです'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '음식은 맛있어요', 'correct' => ['음식은', '맛있어요'], 'extra' => ['짠']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çorba', 'çok', 'lezzetli'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The soup is very delicious', 'correct' => ['the soup', 'is', 'very', 'delicious'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'şorba çox dadlı', 'correct' => ['şorba', 'çox', 'dadlı'], 'extra' => ['duzlu']],
                            'ar' => ['sentence' => 'حساء جدا لذيذ', 'correct' => ['حساء', 'جدا', 'لذيذ'], 'extra' => ['مالح']],
                            'ru' => ['sentence' => 'суп очень вкусный', 'correct' => ['суп', 'очень', 'вкусный'], 'extra' => ['солёный']],
                            'fr' => ['sentence' => 'La soupe est très délicieuse', 'correct' => ['la soupe', 'est', 'très', 'délicieuse'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La sopa es muy deliciosa', 'correct' => ['la sopa', 'es', 'muy', 'deliciosa'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Die Suppe ist sehr lecker', 'correct' => ['die Suppe', 'ist', 'sehr', 'lecker'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => 'スープはとてもおいしいです', 'correct' => ['スープは', 'とても', 'おいしいです'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '수프는 아주 맛있어요', 'correct' => ['수프는', '아주', '맛있어요'], 'extra' => ['짠']],
                        ],
                    ],
                    'c' => [
                        'words' => ['teşekkürler'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you', 'correct' => ['thank you'], 'extra' => ['delicious']],
                            'az' => ['sentence' => 'təşəkkür', 'correct' => ['təşəkkür'], 'extra' => ['dadlı']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['لذيذ']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['вкусный']],
                            'fr' => ['sentence' => 'Merci', 'correct' => ['merci'], 'extra' => ['délicieux']],
                            'es' => ['sentence' => 'Gracias', 'correct' => ['gracias'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Danke', 'correct' => ['danke'], 'extra' => ['lecker']],
                            'ja' => ['sentence' => 'ありがとう', 'correct' => ['ありがとう'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '고맙습니다', 'correct' => ['고맙습니다'], 'extra' => ['맛있는']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: It Is Cold', 2,
                pictures: [['tr' => 'Balık', 'img' => 'fish'], ['tr' => 'Su', 'img' => 'water']],
                plain: [['tr' => 'Soğuk'], ['tr' => 'Sıcak']],
                phrases: [
                    'a' => [
                        'words' => ['yemek', 'soğuk'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The food is cold', 'correct' => ['the food', 'is', 'cold'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'yemək soyuq', 'correct' => ['yemək', 'soyuq'], 'extra' => ['isti']],
                            'ar' => ['sentence' => 'طعام بارد', 'correct' => ['طعام', 'بارد'], 'extra' => ['ساخن']],
                            'ru' => ['sentence' => 'еда холодный', 'correct' => ['еда', 'холодный'], 'extra' => ['горячий']],
                            'fr' => ['sentence' => 'La nourriture est froide', 'correct' => ['la nourriture', 'est', 'froide'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'La comida está fría', 'correct' => ['la comida', 'está', 'fría'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Das Essen ist kalt', 'correct' => ['das Essen', 'ist', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '食べ物は寒いです', 'correct' => ['食べ物は', '寒いです'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '음식은 추워요', 'correct' => ['음식은', '추워요'], 'extra' => ['더운']],
                        ],
                    ],
                    'b' => [
                        'words' => ['balık', 'soğuk'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The fish is cold', 'correct' => ['the fish', 'is', 'cold'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'balığı soyuq', 'correct' => ['balığı', 'soyuq'], 'extra' => ['isti']],
                            'ar' => ['sentence' => 'السمك بارد', 'correct' => ['السمك', 'بارد'], 'extra' => ['ساخن']],
                            'ru' => ['sentence' => 'рыбу холодный', 'correct' => ['рыбу', 'холодный'], 'extra' => ['горячий']],
                            'fr' => ['sentence' => 'Le poisson est froid', 'correct' => ['le poisson', 'est', 'froid'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'El pescado está frío', 'correct' => ['el pescado', 'está', 'frío'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Der Fisch ist kalt', 'correct' => ['der Fisch', 'ist', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '魚は寒いです', 'correct' => ['魚は', '寒いです'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '생선은 추워요', 'correct' => ['생선은', '추워요'], 'extra' => ['더운']],
                        ],
                    ],
                    'c' => [
                        'words' => ['su', 'sıcak'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The water is hot', 'correct' => ['the water', 'is', 'hot'], 'extra' => ['cold']],
                            'az' => ['sentence' => 'suyu isti', 'correct' => ['suyu', 'isti'], 'extra' => ['soyuq']],
                            'ar' => ['sentence' => 'الماء ساخن', 'correct' => ['الماء', 'ساخن'], 'extra' => ['بارد']],
                            'ru' => ['sentence' => 'воду горячий', 'correct' => ['воду', 'горячий'], 'extra' => ['холодный']],
                            'fr' => ['sentence' => 'L’eau est chaude', 'correct' => ['l’eau', 'est', 'chaude'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'El agua está caliente', 'correct' => ['el agua', 'está', 'caliente'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Das Wasser ist heiß', 'correct' => ['das Wasser', 'ist', 'heiß'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => '水は暑いです', 'correct' => ['水は', '暑いです'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '물은 더워요', 'correct' => ['물은', '더워요'], 'extra' => ['추운']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Too Salty', 3,
                pictures: [['tr' => 'Et', 'img' => 'meat'], ['tr' => 'Çorba', 'img' => 'soup']],
                plain: [['tr' => 'Tuzlu'], ['tr' => 'Lezzetli']],
                phrases: [
                    'a' => [
                        'words' => ['çorba', 'tuzlu'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The soup is salty', 'correct' => ['the soup', 'is', 'salty'], 'extra' => ['delicious']],
                            'az' => ['sentence' => 'şorba duzlu', 'correct' => ['şorba', 'duzlu'], 'extra' => ['dadlı']],
                            'ar' => ['sentence' => 'حساء مالح', 'correct' => ['حساء', 'مالح'], 'extra' => ['لذيذ']],
                            'ru' => ['sentence' => 'суп солёный', 'correct' => ['суп', 'солёный'], 'extra' => ['вкусный']],
                            'fr' => ['sentence' => 'La soupe est salée', 'correct' => ['la soupe', 'est', 'salée'], 'extra' => ['délicieux']],
                            'es' => ['sentence' => 'La sopa está salada', 'correct' => ['la sopa', 'está', 'salada'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Die Suppe ist salzig', 'correct' => ['die Suppe', 'ist', 'salzig'], 'extra' => ['lecker']],
                            'ja' => ['sentence' => 'スープは塩辛いです', 'correct' => ['スープは', '塩辛いです'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '수프는 짜요', 'correct' => ['수프는', '짜요'], 'extra' => ['맛있는']],
                        ],
                    ],
                    'b' => [
                        'words' => ['et', 'çok', 'tuzlu'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The meat is very salty', 'correct' => ['the meat', 'is', 'very', 'salty'], 'extra' => ['delicious']],
                            'az' => ['sentence' => 'ət çox duzlu', 'correct' => ['ət', 'çox', 'duzlu'], 'extra' => ['dadlı']],
                            'ar' => ['sentence' => 'لحم جدا مالح', 'correct' => ['لحم', 'جدا', 'مالح'], 'extra' => ['لذيذ']],
                            'ru' => ['sentence' => 'мясо очень солёный', 'correct' => ['мясо', 'очень', 'солёный'], 'extra' => ['вкусный']],
                            'fr' => ['sentence' => 'La viande est très salée', 'correct' => ['la viande', 'est', 'très', 'salée'], 'extra' => ['délicieux']],
                            'es' => ['sentence' => 'La carne está muy salada', 'correct' => ['la carne', 'está', 'muy', 'salada'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Das Fleisch ist sehr salzig', 'correct' => ['das Fleisch', 'ist', 'sehr', 'salzig'], 'extra' => ['lecker']],
                            'ja' => ['sentence' => '肉はとても塩辛いです', 'correct' => ['肉は', 'とても', '塩辛いです'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '고기는 아주 짜요', 'correct' => ['고기는', '아주', '짜요'], 'extra' => ['맛있는']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yemek', 'lezzetli', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The food is not delicious', 'correct' => ['the food', 'is not', 'delicious'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'yemək deyil dadlı', 'correct' => ['yemək', 'deyil', 'dadlı'], 'extra' => ['duzlu']],
                            'ar' => ['sentence' => 'طعام ليس لذيذ', 'correct' => ['طعام', 'ليس', 'لذيذ'], 'extra' => ['مالح']],
                            'ru' => ['sentence' => 'еда не вкусный', 'correct' => ['еда', 'не', 'вкусный'], 'extra' => ['солёный']],
                            'fr' => ['sentence' => 'La nourriture n’est pas délicieuse', 'correct' => ['la nourriture', 'n’est pas', 'délicieuse'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La comida no es deliciosa', 'correct' => ['la comida', 'no es', 'deliciosa'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Das Essen ist nicht lecker', 'correct' => ['das Essen', 'ist nicht', 'lecker'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => '食べ物はおいしくありません', 'correct' => ['食べ物は', 'おいしく', 'ありません'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '음식은 맛있지 않아요', 'correct' => ['음식은', '맛있지 않아요'], 'extra' => ['짠']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Making a Complaint', 4,
                pictures: [['tr' => 'Menü', 'img' => 'menu'], ['tr' => 'Balık', 'img' => 'fish']],
                plain: [['tr' => 'Şikayet'], ['tr' => 'Soğuk']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'şikayet', 'var'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is a complaint', 'correct' => ['there is', 'a', 'complaint'], 'extra' => ['food']],
                            'az' => ['sentence' => 'var bir şikayət', 'correct' => ['var', 'bir', 'şikayət'], 'extra' => ['yemək']],
                            'ar' => ['sentence' => 'يوجد شكوى', 'correct' => ['يوجد', 'شكوى'], 'extra' => ['طعام']],
                            'ru' => ['sentence' => 'есть жалоба', 'correct' => ['есть', 'жалоба'], 'extra' => ['еда']],
                            'fr' => ['sentence' => 'Il y a une plainte', 'correct' => ['il y a', 'une', 'plainte'], 'extra' => ['nourriture']],
                            'es' => ['sentence' => 'Hay una queja', 'correct' => ['hay', 'una', 'queja'], 'extra' => ['comida']],
                            'de' => ['sentence' => 'Es gibt eine Beschwerde', 'correct' => ['es gibt', 'eine', 'Beschwerde'], 'extra' => ['Essen']],
                            'ja' => ['sentence' => '苦情があります', 'correct' => ['苦情が', 'あります'], 'extra' => ['食べ物']],
                            'ko' => ['sentence' => '불만이 있어요', 'correct' => ['불만이', '있어요'], 'extra' => ['음식']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'doğru', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is not true', 'correct' => ['this', 'is not', 'true'], 'extra' => ['complaint']],
                            'az' => ['sentence' => 'bu deyil düzgün', 'correct' => ['bu', 'deyil', 'düzgün'], 'extra' => ['şikayət']],
                            'ar' => ['sentence' => 'هذا ليس صحيح', 'correct' => ['هذا', 'ليس', 'صحيح'], 'extra' => ['شكوى']],
                            'ru' => ['sentence' => 'это не правильно', 'correct' => ['это', 'не', 'правильно'], 'extra' => ['жалоба']],
                            'fr' => ['sentence' => 'Ceci n’est pas vrai', 'correct' => ['ceci', 'n’est pas', 'vrai'], 'extra' => ['plainte']],
                            'es' => ['sentence' => 'Esto no es verdadero', 'correct' => ['esto', 'no es', 'verdadero'], 'extra' => ['queja']],
                            'de' => ['sentence' => 'Das ist nicht richtig', 'correct' => ['das', 'ist nicht', 'richtig'], 'extra' => ['Beschwerde']],
                            'ja' => ['sentence' => 'これは正しくありません', 'correct' => ['これは', '正しく', 'ありません'], 'extra' => ['苦情']],
                            'ko' => ['sentence' => '이것은 맞지 않아요', 'correct' => ['이것은', '맞지 않아요'], 'extra' => ['불만']],
                        ],
                    ],
                    'c' => [
                        'words' => ['affedersiniz'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me', 'correct' => ['excuse me'], 'extra' => ['thank you']],
                            'az' => ['sentence' => 'bağışlayın', 'correct' => ['bağışlayın'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'عفوا', 'correct' => ['عفوا'], 'extra' => ['شكرا']],
                            'ru' => ['sentence' => 'извините', 'correct' => ['извините'], 'extra' => ['спасибо']],
                            'fr' => ['sentence' => 'Excusez-moi', 'correct' => ['excusez-moi'], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Perdón', 'correct' => ['perdón'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Entschuldigung', 'correct' => ['Entschuldigung'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'すみません', 'correct' => ['すみません'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '실례합니다', 'correct' => ['실례합니다'], 'extra' => ['고맙습니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Saying It Politely', 5,
                pictures: [['tr' => 'Çorba', 'img' => 'soup'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Lezzetli'], ['tr' => 'Tuzlu']],
                phrases: [
                    'a' => [
                        'words' => ['yemek', 'çok', 'güzel'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The food is very nice', 'correct' => ['the food', 'is', 'very', 'nice'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'yemək çox xoş', 'correct' => ['yemək', 'çox', 'xoş'], 'extra' => ['duzlu']],
                            'ar' => ['sentence' => 'طعام جدا لطيف', 'correct' => ['طعام', 'جدا', 'لطيف'], 'extra' => ['مالح']],
                            'ru' => ['sentence' => 'еда очень приятно', 'correct' => ['еда', 'очень', 'приятно'], 'extra' => ['солёный']],
                            'fr' => ['sentence' => 'La nourriture est très belle', 'correct' => ['la nourriture', 'est', 'très', 'belle'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La comida es muy bonita', 'correct' => ['la comida', 'es', 'muy', 'bonita'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Das Essen ist sehr schön', 'correct' => ['das Essen', 'ist', 'sehr', 'schön'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => '食べ物はとても素敵です', 'correct' => ['食べ物は', 'とても', '素敵です'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '음식은 아주 멋져요', 'correct' => ['음식은', '아주', '멋져요'], 'extra' => ['짠']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çorba', 'soğuk', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The soup is not cold', 'correct' => ['the soup', 'is not', 'cold'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'şorba deyil soyuq', 'correct' => ['şorba', 'deyil', 'soyuq'], 'extra' => ['duzlu']],
                            'ar' => ['sentence' => 'حساء ليس بارد', 'correct' => ['حساء', 'ليس', 'بارد'], 'extra' => ['مالح']],
                            'ru' => ['sentence' => 'суп не холодный', 'correct' => ['суп', 'не', 'холодный'], 'extra' => ['солёный']],
                            'fr' => ['sentence' => 'La soupe n’est pas froide', 'correct' => ['la soupe', 'n’est pas', 'froide'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La sopa no está fría', 'correct' => ['la sopa', 'no está', 'fría'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Die Suppe ist nicht kalt', 'correct' => ['die Suppe', 'ist nicht', 'kalt'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => 'スープは寒くありません', 'correct' => ['スープは', '寒く', 'ありません'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '수프는 춥지 않아요', 'correct' => ['수프는', '춥지 않아요'], 'extra' => ['짠']],
                        ],
                    ],
                    'c' => [
                        'words' => ['et', 'lezzetli'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The meat is delicious', 'correct' => ['the meat', 'is', 'delicious'], 'extra' => ['cold']],
                            'az' => ['sentence' => 'ət dadlı', 'correct' => ['ət', 'dadlı'], 'extra' => ['soyuq']],
                            'ar' => ['sentence' => 'لحم لذيذ', 'correct' => ['لحم', 'لذيذ'], 'extra' => ['بارد']],
                            'ru' => ['sentence' => 'мясо вкусный', 'correct' => ['мясо', 'вкусный'], 'extra' => ['холодный']],
                            'fr' => ['sentence' => 'La viande est délicieuse', 'correct' => ['la viande', 'est', 'délicieuse'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'La carne es deliciosa', 'correct' => ['la carne', 'es', 'deliciosa'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Das Fleisch ist lecker', 'correct' => ['das Fleisch', 'ist', 'lecker'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => '肉はおいしいです', 'correct' => ['肉は', 'おいしいです'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '고기는 맛있어요', 'correct' => ['고기는', '맛있어요'], 'extra' => ['추운']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
