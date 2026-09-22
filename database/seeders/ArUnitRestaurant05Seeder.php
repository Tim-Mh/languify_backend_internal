<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitRestaurant05Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'طعام' => 'eat', 'حساء' => 'soup', 'قهوة' => 'coffee', 'لحم' => 'meat',
        'شاي' => 'tea', 'ماء' => 'water', 'حليب' => 'milk', 'خبز' => 'bread',
    ];

    /**
     * Arabic Restaurant Unit 5.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Complaints and Compliments', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: It Is Delicious', 1,
                pictures: [['ar' => 'طعام', 'img' => 'eat'], ['ar' => 'حساء', 'img' => 'soup']],
                plain: [['ar' => 'لذيذ'], ['ar' => 'جدا']],
                phrases: [
                    'a' => [
                        'words' => ['طعام', 'لذيذ'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The food is delicious', 'correct' => ['the food', 'is', 'delicious'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'yemək dadlı', 'correct' => ['yemək', 'dadlı'], 'extra' => ['duzlu']],
                            'fr' => ['sentence' => 'La nourriture est délicieuse', 'correct' => ['la nourriture', 'est', 'délicieuse'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La comida es deliciosa', 'correct' => ['la comida', 'es', 'deliciosa'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Das Essen ist lecker', 'correct' => ['das Essen', 'ist', 'lecker'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => '食べ物はおいしいです', 'correct' => ['食べ物は', 'おいしいです'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '음식은 맛있어요', 'correct' => ['음식은', '맛있어요'], 'extra' => ['짠']],
                            'tr' => ['sentence' => 'yemek lezzetli', 'correct' => ['yemek', 'lezzetli'], 'extra' => ['çorba', 'et']],
                            'ru' => ['sentence' => 'еда вкусный', 'correct' => ['еда', 'вкусный'], 'extra' => ['солёный']],
                        ],
                    ],
                    'b' => [
                        'words' => ['حساء', 'جدا', 'لذيذ'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The soup is very delicious', 'correct' => ['the soup', 'is', 'very', 'delicious'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'şorba çox dadlı', 'correct' => ['şorba', 'çox', 'dadlı'], 'extra' => ['duzlu']],
                            'fr' => ['sentence' => 'La soupe est très délicieuse', 'correct' => ['la soupe', 'est', 'très', 'délicieuse'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La sopa es muy deliciosa', 'correct' => ['la sopa', 'es', 'muy', 'deliciosa'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Die Suppe ist sehr lecker', 'correct' => ['die Suppe', 'ist', 'sehr', 'lecker'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => 'スープはとてもおいしいです', 'correct' => ['スープは', 'とても', 'おいしいです'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '수프는 아주 맛있어요', 'correct' => ['수프는', '아주', '맛있어요'], 'extra' => ['짠']],
                            'tr' => ['sentence' => 'çorba çok lezzetli', 'correct' => ['çorba', 'çok', 'lezzetli'], 'extra' => ['yemek', 'et']],
                            'ru' => ['sentence' => 'суп очень вкусный', 'correct' => ['суп', 'очень', 'вкусный'], 'extra' => ['солёный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['شكرا جزيلا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you very much', 'correct' => ['thank you', 'very much'], 'extra' => ['delicious']],
                            'az' => ['sentence' => 'təşəkkür çox sağ ol', 'correct' => ['təşəkkür', 'çox sağ ol'], 'extra' => ['dadlı']],
                            'fr' => ['sentence' => 'Merci beaucoup', 'correct' => ['merci', 'beaucoup'], 'extra' => ['délicieux']],
                            'es' => ['sentence' => 'Muchas gracias', 'correct' => ['muchas', 'gracias'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Vielen Dank', 'correct' => ['vielen', 'Dank'], 'extra' => ['lecker']],
                            'ja' => ['sentence' => 'どうもありがとう', 'correct' => ['どうも', 'ありがとう'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '정말 감사합니다', 'correct' => ['정말', '감사합니다'], 'extra' => ['맛있는']],
                            'tr' => ['sentence' => 'teşekkürler', 'correct' => ['teşekkürler'], 'extra' => ['lezzetli', 'yemek']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['вкусный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: It Is Cold', 2,
                pictures: [['ar' => 'طعام', 'img' => 'eat'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'بارد'], ['ar' => 'السمك']],
                phrases: [
                    'a' => [
                        'words' => ['طعام', 'بارد'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The food is cold', 'correct' => ['the food', 'is', 'cold'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'yemək soyuq', 'correct' => ['yemək', 'soyuq'], 'extra' => ['isti']],
                            'fr' => ['sentence' => 'La nourriture est froide', 'correct' => ['la nourriture', 'est', 'froide'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'La comida está fría', 'correct' => ['la comida', 'está', 'fría'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Das Essen ist kalt', 'correct' => ['das Essen', 'ist', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '食べ物は寒いです', 'correct' => ['食べ物は', '寒いです'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '음식은 추워요', 'correct' => ['음식은', '추워요'], 'extra' => ['더운']],
                            'tr' => ['sentence' => 'yemek soğuk', 'correct' => ['yemek', 'soğuk'], 'extra' => ['sıcak', 'balık']],
                            'ru' => ['sentence' => 'еда холодный', 'correct' => ['еда', 'холодный'], 'extra' => ['горячий']],
                        ],
                    ],
                    'b' => [
                        'words' => ['السمك', 'بارد'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The fish is cold', 'correct' => ['the fish', 'is', 'cold'], 'extra' => ['hot']],
                            'az' => ['sentence' => 'balığı soyuq', 'correct' => ['balığı', 'soyuq'], 'extra' => ['isti']],
                            'fr' => ['sentence' => 'Le poisson est froid', 'correct' => ['le poisson', 'est', 'froid'], 'extra' => ['chaud']],
                            'es' => ['sentence' => 'El pescado está frío', 'correct' => ['el pescado', 'está', 'frío'], 'extra' => ['caliente']],
                            'de' => ['sentence' => 'Der Fisch ist kalt', 'correct' => ['der Fisch', 'ist', 'kalt'], 'extra' => ['heiß']],
                            'ja' => ['sentence' => '魚は寒いです', 'correct' => ['魚は', '寒いです'], 'extra' => ['暑い']],
                            'ko' => ['sentence' => '생선은 추워요', 'correct' => ['생선은', '추워요'], 'extra' => ['더운']],
                            'tr' => ['sentence' => 'balık soğuk', 'correct' => ['balık', 'soğuk'], 'extra' => ['sıcak', 'su']],
                            'ru' => ['sentence' => 'рыбу холодный', 'correct' => ['рыбу', 'холодный'], 'extra' => ['горячий']],
                        ],
                    ],
                    'c' => [
                        'words' => ['الماء', 'ساخن'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The water is hot', 'correct' => ['the water', 'is', 'hot'], 'extra' => ['cold']],
                            'az' => ['sentence' => 'suyu isti', 'correct' => ['suyu', 'isti'], 'extra' => ['soyuq']],
                            'fr' => ['sentence' => 'L’eau est chaude', 'correct' => ['l’eau', 'est', 'chaude'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'El agua está caliente', 'correct' => ['el agua', 'está', 'caliente'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Das Wasser ist heiß', 'correct' => ['das Wasser', 'ist', 'heiß'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => '水は暑いです', 'correct' => ['水は', '暑いです'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '물은 더워요', 'correct' => ['물은', '더워요'], 'extra' => ['추운']],
                            'tr' => ['sentence' => 'su sıcak', 'correct' => ['su', 'sıcak'], 'extra' => ['soğuk', 'balık']],
                            'ru' => ['sentence' => 'воду горячий', 'correct' => ['воду', 'горячий'], 'extra' => ['холодный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Too Salty', 3,
                pictures: [['ar' => 'حساء', 'img' => 'soup'], ['ar' => 'لحم', 'img' => 'meat']],
                plain: [['ar' => 'مالح'], ['ar' => 'جدا']],
                phrases: [
                    'a' => [
                        'words' => ['حساء', 'مالح'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The soup is salty', 'correct' => ['the soup', 'is', 'salty'], 'extra' => ['delicious']],
                            'az' => ['sentence' => 'şorba duzlu', 'correct' => ['şorba', 'duzlu'], 'extra' => ['dadlı']],
                            'fr' => ['sentence' => 'La soupe est salée', 'correct' => ['la soupe', 'est', 'salée'], 'extra' => ['délicieux']],
                            'es' => ['sentence' => 'La sopa está salada', 'correct' => ['la sopa', 'está', 'salada'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Die Suppe ist salzig', 'correct' => ['die Suppe', 'ist', 'salzig'], 'extra' => ['lecker']],
                            'ja' => ['sentence' => 'スープは塩辛いです', 'correct' => ['スープは', '塩辛いです'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '수프는 짜요', 'correct' => ['수프는', '짜요'], 'extra' => ['맛있는']],
                            'tr' => ['sentence' => 'çorba tuzlu', 'correct' => ['çorba', 'tuzlu'], 'extra' => ['lezzetli', 'et']],
                            'ru' => ['sentence' => 'суп солёный', 'correct' => ['суп', 'солёный'], 'extra' => ['вкусный']],
                        ],
                    ],
                    'b' => [
                        'words' => ['لحم', 'جدا', 'مالح'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The meat is very salty', 'correct' => ['the meat', 'is', 'very', 'salty'], 'extra' => ['delicious']],
                            'az' => ['sentence' => 'ət çox duzlu', 'correct' => ['ət', 'çox', 'duzlu'], 'extra' => ['dadlı']],
                            'fr' => ['sentence' => 'La viande est très salée', 'correct' => ['la viande', 'est', 'très', 'salée'], 'extra' => ['délicieux']],
                            'es' => ['sentence' => 'La carne está muy salada', 'correct' => ['la carne', 'está', 'muy', 'salada'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Das Fleisch ist sehr salzig', 'correct' => ['das Fleisch', 'ist', 'sehr', 'salzig'], 'extra' => ['lecker']],
                            'ja' => ['sentence' => '肉はとても塩辛いです', 'correct' => ['肉は', 'とても', '塩辛いです'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '고기는 아주 짜요', 'correct' => ['고기는', '아주', '짜요'], 'extra' => ['맛있는']],
                            'tr' => ['sentence' => 'et çok tuzlu', 'correct' => ['et', 'çok', 'tuzlu'], 'extra' => ['lezzetli', 'çorba']],
                            'ru' => ['sentence' => 'мясо очень солёный', 'correct' => ['мясо', 'очень', 'солёный'], 'extra' => ['вкусный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['طعام', 'ليس', 'لذيذ'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The food is not delicious', 'correct' => ['the food', 'is not', 'delicious'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'yemək deyil dadlı', 'correct' => ['yemək', 'deyil', 'dadlı'], 'extra' => ['duzlu']],
                            'fr' => ['sentence' => 'La nourriture n’est pas délicieuse', 'correct' => ['la nourriture', 'n’est pas', 'délicieuse'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La comida no es deliciosa', 'correct' => ['la comida', 'no es', 'deliciosa'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Das Essen ist nicht lecker', 'correct' => ['das Essen', 'ist nicht', 'lecker'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => '食べ物はおいしくありません', 'correct' => ['食べ物は', 'おいしく', 'ありません'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '음식은 맛있지 않아요', 'correct' => ['음식은', '맛있지 않아요'], 'extra' => ['짠']],
                            'tr' => ['sentence' => 'yemek lezzetli değil', 'correct' => ['yemek', 'lezzetli', 'değil'], 'extra' => ['tuzlu', 'et']],
                            'ru' => ['sentence' => 'еда не вкусный', 'correct' => ['еда', 'не', 'вкусный'], 'extra' => ['солёный']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Making a Complaint', 4,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'يوجد'], ['ar' => 'شكوى']],
                phrases: [
                    'a' => [
                        'words' => ['يوجد', 'شكوى'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is a complaint', 'correct' => ['there is', 'a', 'complaint'], 'extra' => ['food']],
                            'az' => ['sentence' => 'var bir şikayət', 'correct' => ['var', 'bir', 'şikayət'], 'extra' => ['yemək']],
                            'fr' => ['sentence' => 'Il y a une plainte', 'correct' => ['il y a', 'une', 'plainte'], 'extra' => ['nourriture']],
                            'es' => ['sentence' => 'Hay una queja', 'correct' => ['hay', 'una', 'queja'], 'extra' => ['comida']],
                            'de' => ['sentence' => 'Es gibt eine Beschwerde', 'correct' => ['es gibt', 'eine', 'Beschwerde'], 'extra' => ['Essen']],
                            'ja' => ['sentence' => '苦情があります', 'correct' => ['苦情が', 'あります'], 'extra' => ['食べ物']],
                            'ko' => ['sentence' => '불만이 있어요', 'correct' => ['불만이', '있어요'], 'extra' => ['음식']],
                            'tr' => ['sentence' => 'bir şikayet var', 'correct' => ['bir', 'şikayet', 'var'], 'extra' => ['soğuk', 'menü']],
                            'ru' => ['sentence' => 'есть жалоба', 'correct' => ['есть', 'жалоба'], 'extra' => ['еда']],
                        ],
                    ],
                    'b' => [
                        'words' => ['هذا', 'ليس', 'صحيح'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'This is not true', 'correct' => ['this', 'is not', 'true'], 'extra' => ['complaint']],
                            'az' => ['sentence' => 'bu deyil düzgün', 'correct' => ['bu', 'deyil', 'düzgün'], 'extra' => ['şikayət']],
                            'fr' => ['sentence' => 'Ceci n’est pas vrai', 'correct' => ['ceci', 'n’est pas', 'vrai'], 'extra' => ['plainte']],
                            'es' => ['sentence' => 'Esto no es verdadero', 'correct' => ['esto', 'no es', 'verdadero'], 'extra' => ['queja']],
                            'de' => ['sentence' => 'Das ist nicht richtig', 'correct' => ['das', 'ist nicht', 'richtig'], 'extra' => ['Beschwerde']],
                            'ja' => ['sentence' => 'これは正しくありません', 'correct' => ['これは', '正しく', 'ありません'], 'extra' => ['苦情']],
                            'ko' => ['sentence' => '이것은 맞지 않아요', 'correct' => ['이것은', '맞지 않아요'], 'extra' => ['불만']],
                            'tr' => ['sentence' => 'bu doğru değil', 'correct' => ['bu', 'doğru', 'değil'], 'extra' => ['şikayet', 'soğuk']],
                            'ru' => ['sentence' => 'это не правильно', 'correct' => ['это', 'не', 'правильно'], 'extra' => ['жалоба']],
                        ],
                    ],
                    'c' => [
                        'words' => ['عفوا', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me please', 'correct' => ['excuse me', 'please'], 'extra' => ['thank you']],
                            'az' => ['sentence' => 'bağışlayın zəhmət olmasa', 'correct' => ['bağışlayın', 'zəhmət olmasa'], 'extra' => ['təşəkkür']],
                            'fr' => ['sentence' => "Excusez-moi s'il vous plaît", 'correct' => ['excusez-moi', "s'il vous plaît"], 'extra' => ['merci']],
                            'es' => ['sentence' => 'Perdón por favor', 'correct' => ['perdón', 'por favor'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Entschuldigung bitte', 'correct' => ['Entschuldigung', 'bitte'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'すみませんお願いします', 'correct' => ['すみません', 'お願いします'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '실례합니다 부탁합니다', 'correct' => ['실례합니다', '부탁합니다'], 'extra' => ['고맙습니다']],
                            'tr' => ['sentence' => 'affedersiniz', 'correct' => ['affedersiniz'], 'extra' => ['şikayet', 'soğuk']],
                            'ru' => ['sentence' => 'извините', 'correct' => ['извините'], 'extra' => ['спасибо']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Saying It Politely', 5,
                pictures: [['ar' => 'طعام', 'img' => 'eat'], ['ar' => 'حساء', 'img' => 'soup']],
                plain: [['ar' => 'جدا'], ['ar' => 'لطيف']],
                phrases: [
                    'a' => [
                        'words' => ['طعام', 'جدا', 'لطيف'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The food is very nice', 'correct' => ['the food', 'is', 'very', 'nice'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'yemək çox xoş', 'correct' => ['yemək', 'çox', 'xoş'], 'extra' => ['duzlu']],
                            'fr' => ['sentence' => 'La nourriture est très belle', 'correct' => ['la nourriture', 'est', 'très', 'belle'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La comida es muy bonita', 'correct' => ['la comida', 'es', 'muy', 'bonita'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Das Essen ist sehr schön', 'correct' => ['das Essen', 'ist', 'sehr', 'schön'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => '食べ物はとても素敵です', 'correct' => ['食べ物は', 'とても', '素敵です'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '음식은 아주 멋져요', 'correct' => ['음식은', '아주', '멋져요'], 'extra' => ['짠']],
                            'tr' => ['sentence' => 'yemek çok güzel', 'correct' => ['yemek', 'çok', 'güzel'], 'extra' => ['lezzetli', 'tuzlu']],
                            'ru' => ['sentence' => 'еда очень приятно', 'correct' => ['еда', 'очень', 'приятно'], 'extra' => ['солёный']],
                        ],
                    ],
                    'b' => [
                        'words' => ['حساء', 'ليس', 'بارد'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The soup is not cold', 'correct' => ['the soup', 'is not', 'cold'], 'extra' => ['salty']],
                            'az' => ['sentence' => 'şorba deyil soyuq', 'correct' => ['şorba', 'deyil', 'soyuq'], 'extra' => ['duzlu']],
                            'fr' => ['sentence' => 'La soupe n’est pas froide', 'correct' => ['la soupe', 'n’est pas', 'froide'], 'extra' => ['salé']],
                            'es' => ['sentence' => 'La sopa no está fría', 'correct' => ['la sopa', 'no está', 'fría'], 'extra' => ['salado']],
                            'de' => ['sentence' => 'Die Suppe ist nicht kalt', 'correct' => ['die Suppe', 'ist nicht', 'kalt'], 'extra' => ['salzig']],
                            'ja' => ['sentence' => 'スープは寒くありません', 'correct' => ['スープは', '寒く', 'ありません'], 'extra' => ['塩辛い']],
                            'ko' => ['sentence' => '수프는 춥지 않아요', 'correct' => ['수프는', '춥지 않아요'], 'extra' => ['짠']],
                            'tr' => ['sentence' => 'çorba soğuk değil', 'correct' => ['çorba', 'soğuk', 'değil'], 'extra' => ['lezzetli', 'tuzlu']],
                            'ru' => ['sentence' => 'суп не холодный', 'correct' => ['суп', 'не', 'холодный'], 'extra' => ['солёный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['لحم', 'لذيذ'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The meat is delicious', 'correct' => ['the meat', 'is', 'delicious'], 'extra' => ['cold']],
                            'az' => ['sentence' => 'ət dadlı', 'correct' => ['ət', 'dadlı'], 'extra' => ['soyuq']],
                            'fr' => ['sentence' => 'La viande est délicieuse', 'correct' => ['la viande', 'est', 'délicieuse'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'La carne es deliciosa', 'correct' => ['la carne', 'es', 'deliciosa'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Das Fleisch ist lecker', 'correct' => ['das Fleisch', 'ist', 'lecker'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => '肉はおいしいです', 'correct' => ['肉は', 'おいしいです'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '고기는 맛있어요', 'correct' => ['고기는', '맛있어요'], 'extra' => ['추운']],
                            'tr' => ['sentence' => 'et lezzetli', 'correct' => ['et', 'lezzetli'], 'extra' => ['tuzlu', 'çorba']],
                            'ru' => ['sentence' => 'мясо вкусный', 'correct' => ['мясо', 'вкусный'], 'extra' => ['холодный']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
