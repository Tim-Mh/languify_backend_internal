<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitRestaurant01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Çorba' => 'soup', 'Salata' => 'salad', 'Balık' => 'fish',
        'Et' => 'meat', 'Ekmek' => 'bread', 'Su' => 'water',
    ];

    /**
     * Turkish Restaurant Unit 1 — ordering food.
     *
     * THE RULE THIS UNIT TEACHES: ORDER WITH `istiyorum`, AND IT GOES LAST.
     *
     * `istiyorum` is "I want" and, like every Turkish verb, it closes the
     * sentence. `Bir çorba istiyorum` is literally "one soup I-want". English
     * puts the verb second, so the word bank has to be rebuilt in a different
     * order, which is the same drill the Conversation chapter ran on.
     *
     * WHAT YOU ORDER STAYS BARE. A learner might expect the accusative here,
     * since Conversation 5 taught `elmayı yedim`. But that suffix marks a
     * DEFINITE object, one already known. Ordering introduces something new,
     * so the noun stays plain: `bir çorba istiyorum`, never `çorbayı`. Getting
     * this wrong is one of the most audible mistakes a beginner makes, which
     * is why the unit sticks to the bare form throughout.
     *
     * `lütfen` is optional and floats. It can open or close the sentence
     * without changing meaning, so lesson 5 uses it at the end where English
     * also puts "please".
     */
    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Ordering Food', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Soup & Salad', 1,
                pictures: [['tr' => 'Çorba', 'img' => 'soup'], ['tr' => 'Salata', 'img' => 'salad']],
                plain: [['tr' => 'Menü'], ['tr' => 'Garson']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'çorba', 'istiyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I would like a soup', 'correct' => ['I would like', 'a', 'soup'], 'extra' => ['salad']],
                            'az' => ['sentence' => 'istəyirəm bir şorba', 'correct' => ['istəyirəm', 'bir', 'şorba'], 'extra' => ['salat']],
                            'ar' => ['sentence' => 'أريد حساء', 'correct' => ['أريد', 'حساء'], 'extra' => ['سلطة']],
                            'ru' => ['sentence' => 'я хочу суп', 'correct' => ['я', 'хочу', 'суп'], 'extra' => ['салат']],
                            'fr' => ['sentence' => 'Je voudrais une soupe', 'correct' => ['je voudrais', 'une', 'soupe'], 'extra' => ['salade']],
                            'es' => ['sentence' => 'Quisiera una sopa', 'correct' => ['quisiera', 'una', 'sopa'], 'extra' => ['ensalada']],
                            'de' => ['sentence' => 'Ich möchte eine Suppe', 'correct' => ['ich möchte', 'eine', 'Suppe'], 'extra' => ['Salat']],
                            'ja' => ['sentence' => 'スープをください', 'correct' => ['スープを', 'ください'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '수프 주세요', 'correct' => ['수프', '주세요'], 'extra' => ['샐러드']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'salata', 'istiyorum'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I would like a salad', 'correct' => ['I would like', 'a', 'salad'], 'extra' => ['soup']],
                            'az' => ['sentence' => 'istəyirəm bir salat', 'correct' => ['istəyirəm', 'bir', 'salat'], 'extra' => ['şorba']],
                            'ar' => ['sentence' => 'أريد سلطة', 'correct' => ['أريد', 'سلطة'], 'extra' => ['حساء']],
                            'ru' => ['sentence' => 'я хочу салат', 'correct' => ['я', 'хочу', 'салат'], 'extra' => ['суп']],
                            'fr' => ['sentence' => 'Je voudrais une salade', 'correct' => ['je voudrais', 'une', 'salade'], 'extra' => ['soupe']],
                            'es' => ['sentence' => 'Quisiera una ensalada', 'correct' => ['quisiera', 'una', 'ensalada'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Ich möchte einen Salat', 'correct' => ['ich möchte', 'einen', 'Salat'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'サラダをください', 'correct' => ['サラダを', 'ください'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '샐러드 주세요', 'correct' => ['샐러드', '주세요'], 'extra' => ['수프']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çorba', 've', 'salata'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Soup and salad', 'correct' => ['soup', 'and', 'salad'], 'extra' => ['menu']],
                            'az' => ['sentence' => 'şorba və salat', 'correct' => ['şorba', 'və', 'salat'], 'extra' => ['menyu']],
                            'ar' => ['sentence' => 'حساء و سلطة', 'correct' => ['حساء', 'و', 'سلطة'], 'extra' => ['قائمة الطعام']],
                            'ru' => ['sentence' => 'суп и салат', 'correct' => ['суп', 'и', 'салат'], 'extra' => ['меню']],
                            'fr' => ['sentence' => 'Soupe et salade', 'correct' => ['soupe', 'et', 'salade'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Sopa y ensalada', 'correct' => ['sopa', 'y', 'ensalada'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Suppe und Salat', 'correct' => ['Suppe', 'und', 'Salat'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'スープとサラダ', 'correct' => ['スープ', 'と', 'サラダ'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '수프와 샐러드', 'correct' => ['수프와', '샐러드'], 'extra' => ['메뉴']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Fish & Meat', 2,
                pictures: [['tr' => 'Balık', 'img' => 'fish'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'İstiyorum'], ['tr' => 'Lütfen']],
                phrases: [
                    'a' => [
                        'words' => ['balık', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like fish', 'correct' => ['I would like', 'fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'istəyirəm balıq', 'correct' => ['istəyirəm', 'balıq'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'أريد سمك', 'correct' => ['أريد', 'سمك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'я хочу рыба', 'correct' => ['я', 'хочу', 'рыба'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Je voudrais du poisson', 'correct' => ['je voudrais', 'du poisson'], 'extra' => ['de la viande']],
                            'es' => ['sentence' => 'Quisiera pescado', 'correct' => ['quisiera', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich möchte Fisch', 'correct' => ['ich möchte', 'Fisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚をください', 'correct' => ['魚を', 'ください'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선 주세요', 'correct' => ['생선', '주세요'], 'extra' => ['고기']],
                        ],
                    ],
                    'b' => [
                        'words' => ['et', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like meat', 'correct' => ['I would like', 'meat'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'istəyirəm ət', 'correct' => ['istəyirəm', 'ət'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'أريد لحم', 'correct' => ['أريد', 'لحم'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'я хочу мясо', 'correct' => ['я', 'хочу', 'мясо'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Je voudrais de la viande', 'correct' => ['je voudrais', 'de la viande'], 'extra' => ['du poisson']],
                            'es' => ['sentence' => 'Quisiera carne', 'correct' => ['quisiera', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich möchte Fleisch', 'correct' => ['ich möchte', 'Fleisch'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '肉をください', 'correct' => ['肉を', 'ください'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '고기 주세요', 'correct' => ['고기', '주세요'], 'extra' => ['생선']],
                        ],
                    ],
                    'c' => [
                        'words' => ['balık', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Fish please', 'correct' => ['fish', 'please'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'balıq zəhmət olmasa', 'correct' => ['balıq', 'zəhmət olmasa'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'سمك من فضلك', 'correct' => ['سمك', 'من فضلك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'рыба пожалуйста', 'correct' => ['рыба', 'пожалуйста'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => "Du poisson s'il vous plaît", 'correct' => ['poisson', "s'il vous plaît"], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Pescado por favor', 'correct' => ['pescado', 'por favor'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Fisch bitte', 'correct' => ['Fisch', 'bitte'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚をお願いします', 'correct' => ['魚を', 'お願いします'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선 부탁합니다', 'correct' => ['생선', '부탁합니다'], 'extra' => ['고기']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: The Menu', 3,
                pictures: [['tr' => 'Ekmek', 'img' => 'bread'], ['tr' => 'Su', 'img' => 'water']],
                plain: [['tr' => 'Menü'], ['tr' => 'Porsiyon']],
                phrases: [
                    'a' => [
                        'words' => ['menü', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The menu please', 'correct' => ['the menu', 'please'], 'extra' => ['waiter']],
                            'az' => ['sentence' => 'menyu zəhmət olmasa', 'correct' => ['menyu', 'zəhmət olmasa'], 'extra' => ['ofisiant']],
                            'ar' => ['sentence' => 'قائمة الطعام من فضلك', 'correct' => ['قائمة الطعام', 'من فضلك'], 'extra' => ['نادل']],
                            'ru' => ['sentence' => 'меню пожалуйста', 'correct' => ['меню', 'пожалуйста'], 'extra' => ['официант']],
                            'fr' => ['sentence' => "Le menu s'il vous plaît", 'correct' => ['le menu', "s'il vous plaît"], 'extra' => ['serveur']],
                            'es' => ['sentence' => 'El menú por favor', 'correct' => ['el menú', 'por favor'], 'extra' => ['camarero']],
                            'de' => ['sentence' => 'Die Speisekarte bitte', 'correct' => ['die Speisekarte', 'bitte'], 'extra' => ['Kellner']],
                            'ja' => ['sentence' => 'メニューをお願いします', 'correct' => ['メニューを', 'お願いします'], 'extra' => ['ウェイター']],
                            'ko' => ['sentence' => '메뉴 부탁합니다', 'correct' => ['메뉴', '부탁합니다'], 'extra' => ['웨이터']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'porsiyon', 'balık'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'One portion of fish', 'correct' => ['one', 'portion', 'of fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'bir porsiya balığın', 'correct' => ['bir', 'porsiya', 'balığın'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'واحد حصة السمك', 'correct' => ['واحد', 'حصة', 'السمك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'один порция рыбы', 'correct' => ['один', 'порция', 'рыбы'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Une portion de poisson', 'correct' => ['une', 'portion', 'de poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Una ración de pescado', 'correct' => ['una', 'ración', 'de pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Eine Portion Fisch', 'correct' => ['eine', 'Portion', 'Fisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を一人前', 'correct' => ['魚を', '一人前'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선 일인분', 'correct' => ['생선', '일인분'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ekmek', 've', 'su'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Bread and water', 'correct' => ['bread', 'and', 'water'], 'extra' => ['menu']],
                            'az' => ['sentence' => 'çörək və su', 'correct' => ['çörək', 'və', 'su'], 'extra' => ['menyu']],
                            'ar' => ['sentence' => 'خبز و ماء', 'correct' => ['خبز', 'و', 'ماء'], 'extra' => ['قائمة الطعام']],
                            'ru' => ['sentence' => 'хлеб и вода', 'correct' => ['хлеб', 'и', 'вода'], 'extra' => ['меню']],
                            'fr' => ['sentence' => "Du pain et de l'eau", 'correct' => ['pain', 'et', 'eau'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Pan y agua', 'correct' => ['pan', 'y', 'agua'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Brot und Wasser', 'correct' => ['Brot', 'und', 'Wasser'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'パンと水', 'correct' => ['パン', 'と', '水'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '빵과 물', 'correct' => ['빵과', '물'], 'extra' => ['메뉴']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Calling the Waiter', 4,
                pictures: [['tr' => 'Çorba', 'img' => 'soup'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Garson'], ['tr' => 'Sipariş']],
                phrases: [
                    'a' => [
                        'words' => ['garson', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Waiter please', 'correct' => ['waiter', 'please'], 'extra' => ['menu']],
                            'az' => ['sentence' => 'ofisiant zəhmət olmasa', 'correct' => ['ofisiant', 'zəhmət olmasa'], 'extra' => ['menyu']],
                            'ar' => ['sentence' => 'نادل من فضلك', 'correct' => ['نادل', 'من فضلك'], 'extra' => ['قائمة الطعام']],
                            'ru' => ['sentence' => 'официант пожалуйста', 'correct' => ['официант', 'пожалуйста'], 'extra' => ['меню']],
                            'fr' => ['sentence' => "Serveur s'il vous plaît", 'correct' => ['serveur', "s'il vous plaît"], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Camarero por favor', 'correct' => ['camarero', 'por favor'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Kellner bitte', 'correct' => ['Kellner', 'bitte'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'ウェイターお願いします', 'correct' => ['ウェイター', 'お願いします'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '웨이터 부탁합니다', 'correct' => ['웨이터', '부탁합니다'], 'extra' => ['메뉴']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sipariş', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like to order', 'correct' => ['I would like', 'to order'], 'extra' => ['menu']],
                            'az' => ['sentence' => 'istəyirəm sifariş vermək', 'correct' => ['istəyirəm', 'sifariş vermək'], 'extra' => ['menyu']],
                            'ar' => ['sentence' => 'أريد الطلب', 'correct' => ['أريد', 'الطلب'], 'extra' => ['قائمة الطعام']],
                            'ru' => ['sentence' => 'я хочу заказать', 'correct' => ['я', 'хочу', 'заказать'], 'extra' => ['меню']],
                            'fr' => ['sentence' => 'Je voudrais commander', 'correct' => ['je voudrais', 'commander'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Quisiera pedir', 'correct' => ['quisiera', 'pedir'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Ich möchte bestellen', 'correct' => ['ich möchte', 'bestellen'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => '注文をお願いします', 'correct' => ['注文を', 'お願いします'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '주문 부탁합니다', 'correct' => ['주문', '부탁합니다'], 'extra' => ['메뉴']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'et', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'One meat please', 'correct' => ['one', 'meat', 'please'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'bir ət zəhmət olmasa', 'correct' => ['bir', 'ət', 'zəhmət olmasa'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'واحد لحم من فضلك', 'correct' => ['واحد', 'لحم', 'من فضلك'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'один мясо пожалуйста', 'correct' => ['один', 'мясо', 'пожалуйста'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => "Une viande s'il vous plaît", 'correct' => ['une', 'viande', "s'il vous plaît"], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Una carne por favor', 'correct' => ['una', 'carne', 'por favor'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ein Fleisch bitte', 'correct' => ['ein', 'Fleisch', 'bitte'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '肉を一つお願いします', 'correct' => ['肉を', '一つ', 'お願いします'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '고기 하나 부탁합니다', 'correct' => ['고기', '하나', '부탁합니다'], 'extra' => ['생선']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A Full Order', 5,
                pictures: [['tr' => 'Salata', 'img' => 'salad'], ['tr' => 'Balık', 'img' => 'fish']],
                plain: [['tr' => 'Sipariş'], ['tr' => 'Menü']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'çorba', 've', 'bir', 'salata', 'istiyorum'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'I would like a soup and a salad', 'correct' => ['I would like', 'a', 'soup', 'and', 'a', 'salad'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'istəyirəm bir şorba və bir salat', 'correct' => ['istəyirəm', 'bir', 'şorba', 'və', 'bir', 'salat'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'أريد حساء و سلطة', 'correct' => ['أريد', 'حساء', 'و', 'سلطة'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'я хочу суп и салат', 'correct' => ['я', 'хочу', 'суп', 'и', 'салат'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Je voudrais une soupe et une salade', 'correct' => ['je voudrais', 'une', 'soupe', 'et', 'une', 'salade'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Quisiera una sopa y una ensalada', 'correct' => ['quisiera', 'una', 'sopa', 'y', 'una', 'ensalada'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich möchte eine Suppe und einen Salat', 'correct' => ['ich möchte', 'eine', 'Suppe', 'und', 'einen', 'Salat'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => 'スープとサラダをください', 'correct' => ['スープ', 'と', 'サラダを', 'ください'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '수프와 샐러드 주세요', 'correct' => ['수프와', '샐러드', '주세요'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['balık', 've', 'ekmek', 'lütfen'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Fish and bread please', 'correct' => ['fish', 'and', 'bread', 'please'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'balıq və çörək zəhmət olmasa', 'correct' => ['balıq', 'və', 'çörək', 'zəhmət olmasa'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'سمك و خبز من فضلك', 'correct' => ['سمك', 'و', 'خبز', 'من فضلك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'рыба и хлеб пожалуйста', 'correct' => ['рыба', 'и', 'хлеб', 'пожалуйста'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => "Du poisson et du pain s'il vous plaît", 'correct' => ['poisson', 'et', 'pain', "s'il vous plaît"], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Pescado y pan por favor', 'correct' => ['pescado', 'y', 'pan', 'por favor'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Fisch und Brot bitte', 'correct' => ['Fisch', 'und', 'Brot', 'bitte'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚とパンをお願いします', 'correct' => ['魚', 'と', 'パンを', 'お願いします'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선과 빵 부탁합니다', 'correct' => ['생선과', '빵', '부탁합니다'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['su', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like water', 'correct' => ['I would like', 'water'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'istəyirəm su', 'correct' => ['istəyirəm', 'su'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'أريد ماء', 'correct' => ['أريد', 'ماء'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'я хочу вода', 'correct' => ['я', 'хочу', 'вода'], 'extra' => ['хлеб']],
                            'fr' => ['sentence' => "Je voudrais de l'eau", 'correct' => ['je voudrais', 'eau'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Quisiera agua', 'correct' => ['quisiera', 'agua'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ich möchte Wasser', 'correct' => ['ich möchte', 'Wasser'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '水をください', 'correct' => ['水を', 'ください'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '물 주세요', 'correct' => ['물', '주세요'], 'extra' => ['빵']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
