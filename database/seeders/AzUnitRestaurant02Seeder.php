<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitRestaurant02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Şorba' => 'soup', 'Ət' => 'meat',
        'Pul' => 'money', 'Balıq' => 'fish', 'Su' => 'water', 'Süd' => 'milk',
    ];

    /**
     * Azerbaijani Restaurant Unit 2.
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

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Menu and Prices', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: What Is the Price', 1,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Nə'], ['az' => 'Qiymət']],
                phrases: [
                    'a' => [
                        'words' => ['nə', 'qiymət'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What is the price', 'correct' => ['what', 'is', 'the price'], 'extra' => ['money']],
                            'fr' => ['sentence' => 'Quel est le prix', 'correct' => ['quel', 'est', 'le prix'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'Cuál es el precio', 'correct' => ['cuál', 'es', 'el precio'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Was ist der Preis', 'correct' => ['was', 'ist', 'der Preis'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => '値段は何ですか', 'correct' => ['値段は', '何ですか'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '가격이 얼마예요', 'correct' => ['가격이', '얼마예요'], 'extra' => ['돈']],
                            'tr' => ['sentence' => 'fiyat ne', 'correct' => ['fiyat', 'ne'], 'extra' => ['lira', 'menü']],
                            'ru' => ['sentence' => 'что цена', 'correct' => ['что', 'цена'], 'extra' => ['деньги']],
                            'ar' => ['sentence' => 'ماذا سعر', 'correct' => ['ماذا', 'سعر'], 'extra' => ['نقود']],
                        ],
                    ],
                    'b' => [
                        'words' => ['qiymət', 'on', 'manat'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The price is ten lira', 'correct' => ['the price', 'is', 'ten', 'lira'], 'extra' => ['money']],
                            'fr' => ['sentence' => 'Le prix est dix lires', 'correct' => ['le prix', 'est', 'dix', 'lires'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'El precio es diez liras', 'correct' => ['el precio', 'es', 'diez', 'liras'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Der Preis ist zehn Lira', 'correct' => ['der Preis', 'ist', 'zehn', 'Lira'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => '値段は十リラです', 'correct' => ['値段は', '十', 'リラです'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '가격은 십 리라예요', 'correct' => ['가격은', '십', '리라예요'], 'extra' => ['돈']],
                            'tr' => ['sentence' => 'fiyat on lira', 'correct' => ['fiyat', 'on', 'lira'], 'extra' => ['menü', 'çorba']],
                            'ru' => ['sentence' => 'цена десять рубль', 'correct' => ['цена', 'десять', 'рубль'], 'extra' => ['деньги']],
                            'ar' => ['sentence' => 'سعر عشرة ريال', 'correct' => ['سعر', 'عشرة', 'ريال'], 'extra' => ['نقود']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'bahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is expensive', 'correct' => ['this', 'is', 'expensive'], 'extra' => ['cheap']],
                            'fr' => ['sentence' => 'Ceci est cher', 'correct' => ['ceci', 'est', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'Esto es caro', 'correct' => ['esto', 'es', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Das ist teuer', 'correct' => ['das', 'ist', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => 'これは高いです', 'correct' => ['これは', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '이것은 비싸요', 'correct' => ['이것은', '비싸요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'bu pahalı', 'correct' => ['bu', 'pahalı'], 'extra' => ['fiyat', 'lira']],
                            'ru' => ['sentence' => 'это дорогой', 'correct' => ['это', 'дорогой'], 'extra' => ['дешёвый']],
                            'ar' => ['sentence' => 'هذا غالي', 'correct' => ['هذا', 'غالي'], 'extra' => ['رخيص']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Cheap & Expensive', 2,
                pictures: [['az' => 'Şorba', 'img' => 'soup'], ['az' => 'Ət', 'img' => 'meat']],
                plain: [['az' => 'Balığı'], ['az' => 'Bahalı']],
                phrases: [
                    'a' => [
                        'words' => ['balığı', 'bahalı'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The fish is expensive', 'correct' => ['the fish', 'is', 'expensive'], 'extra' => ['cheap']],
                            'fr' => ['sentence' => 'Le poisson est cher', 'correct' => ['le poisson', 'est', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'El pescado es caro', 'correct' => ['el pescado', 'es', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Der Fisch ist teuer', 'correct' => ['der Fisch', 'ist', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '魚は高いです', 'correct' => ['魚は', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '생선은 비싸요', 'correct' => ['생선은', '비싸요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'balık pahalı', 'correct' => ['balık', 'pahalı'], 'extra' => ['ucuz', 'et']],
                            'ru' => ['sentence' => 'рыбу дорогой', 'correct' => ['рыбу', 'дорогой'], 'extra' => ['дешёвый']],
                            'ar' => ['sentence' => 'السمك غالي', 'correct' => ['السمك', 'غالي'], 'extra' => ['رخيص']],
                        ],
                    ],
                    'b' => [
                        'words' => ['şorba', 'ucuz'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The soup is cheap', 'correct' => ['the soup', 'is', 'cheap'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'La soupe est bon marché', 'correct' => ['la soupe', 'est', 'bon marché'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'La sopa es barata', 'correct' => ['la sopa', 'es', 'barata'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Die Suppe ist billig', 'correct' => ['die Suppe', 'ist', 'billig'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'スープは安いです', 'correct' => ['スープは', '安いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '수프는 싸요', 'correct' => ['수프는', '싸요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'çorba ucuz', 'correct' => ['çorba', 'ucuz'], 'extra' => ['pahalı', 'balık']],
                            'ru' => ['sentence' => 'суп дешёвый', 'correct' => ['суп', 'дешёвый'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'حساء رخيص', 'correct' => ['حساء', 'رخيص'], 'extra' => ['غالي']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ət', 'çox', 'bahalı'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The meat is very expensive', 'correct' => ['the meat', 'is', 'very', 'expensive'], 'extra' => ['cheap']],
                            'fr' => ['sentence' => 'La viande est très chère', 'correct' => ['la viande', 'est', 'très', 'chère'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'La carne es muy cara', 'correct' => ['la carne', 'es', 'muy', 'cara'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Das Fleisch ist sehr teuer', 'correct' => ['das Fleisch', 'ist', 'sehr', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '肉はとても高いです', 'correct' => ['肉は', 'とても', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '고기는 아주 비싸요', 'correct' => ['고기는', '아주', '비싸요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'et çok pahalı', 'correct' => ['et', 'çok', 'pahalı'], 'extra' => ['ucuz', 'balık']],
                            'ru' => ['sentence' => 'мясо очень дорогой', 'correct' => ['мясо', 'очень', 'дорогой'], 'extra' => ['дешёвый']],
                            'ar' => ['sentence' => 'لحم جدا غالي', 'correct' => ['لحم', 'جدا', 'غالي'], 'extra' => ['رخيص']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: How Many Lira', 3,
                pictures: [['az' => 'Pul', 'img' => 'money'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Neçə'], ['az' => 'Manat']],
                phrases: [
                    'a' => [
                        'words' => ['neçə', 'manat'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira', 'correct' => ['how many', 'lira'], 'extra' => ['price']],
                            'fr' => ['sentence' => 'Combien de lires', 'correct' => ['combien de', 'lires'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'Cuántas liras', 'correct' => ['cuántas', 'liras'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viele Lira', 'correct' => ['wie viele', 'Lira'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '何リラですか', 'correct' => ['何', 'リラですか'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '몇 리라예요', 'correct' => ['몇', '리라예요'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'kaç lira', 'correct' => ['kaç', 'lira'], 'extra' => ['para', 'su']],
                            'ru' => ['sentence' => 'сколько рубль', 'correct' => ['сколько', 'рубль'], 'extra' => ['цена']],
                            'ar' => ['sentence' => 'كم ريال', 'correct' => ['كم', 'ريال'], 'extra' => ['سعر']],
                        ],
                    ],
                    'b' => [
                        'words' => ['neçə', 'manat', 'suyu'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the water', 'correct' => ['how many', 'lira', 'is', 'the water'], 'extra' => ['price']],
                            'fr' => ['sentence' => 'Combien de lires est l’eau', 'correct' => ['combien de', 'lires', 'est', 'l’eau'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'Cuántas liras es el agua', 'correct' => ['cuántas', 'liras', 'es', 'el agua'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viele Lira ist das Wasser', 'correct' => ['wie viele', 'Lira', 'ist', 'das Wasser'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '水は何リラですか', 'correct' => ['水は', '何', 'リラですか'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '물은 몇 리라예요', 'correct' => ['물은', '몇', '리라예요'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'su kaç lira', 'correct' => ['su', 'kaç', 'lira'], 'extra' => ['para', 'menü']],
                            'ru' => ['sentence' => 'сколько рубль воду', 'correct' => ['сколько', 'рубль', 'воду'], 'extra' => ['цена']],
                            'ar' => ['sentence' => 'كم ريال الماء', 'correct' => ['كم', 'ريال', 'الماء'], 'extra' => ['سعر']],
                        ],
                    ],
                    'c' => [
                        'words' => ['məndə yoxdur', 'pul'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I do not have money', 'correct' => ['I do not have', 'money'], 'extra' => ['price']],
                            'fr' => ['sentence' => 'Je n’ai pas d’argent', 'correct' => ['je n’ai pas', 'd’argent'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'No tengo dinero', 'correct' => ['no tengo', 'dinero'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Ich habe kein Geld', 'correct' => ['ich habe', 'kein', 'Geld'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'お金がありません', 'correct' => ['お金が', 'ありません'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '돈이 없어요', 'correct' => ['돈이', '없어요'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'param yok', 'correct' => ['param', 'yok'], 'extra' => ['kaç', 'para']],
                            'ru' => ['sentence' => 'у меня нету деньги', 'correct' => ['у', 'меня', 'нету', 'деньги'], 'extra' => ['цена']],
                            'ar' => ['sentence' => 'ليس عندي نقود', 'correct' => ['ليس عندي', 'نقود'], 'extra' => ['سعر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Reading the Menu', 4,
                pictures: [['az' => 'Balıq', 'img' => 'fish'], ['az' => 'Ət', 'img' => 'meat']],
                plain: [['az' => 'Var'], ['az' => 'Menyuda']],
                phrases: [
                    'a' => [
                        'words' => ['var', 'balıq', 'menyuda'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is fish on the menu', 'correct' => ['there is', 'fish', 'on the menu'], 'extra' => ['soup']],
                            'fr' => ['sentence' => 'Il y a du poisson au menu', 'correct' => ['il y a', 'du poisson', 'au menu'], 'extra' => ['soupe']],
                            'es' => ['sentence' => 'Hay pescado en el menú', 'correct' => ['hay', 'pescado', 'en el menú'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Es gibt Fisch auf der Speisekarte', 'correct' => ['es gibt', 'Fisch', 'auf der Speisekarte'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'メニューに魚があります', 'correct' => ['メニューに', '魚が', 'あります'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '메뉴에 생선이 있어요', 'correct' => ['메뉴에', '생선이', '있어요'], 'extra' => ['수프']],
                            'tr' => ['sentence' => 'menüde balık var', 'correct' => ['menüde', 'balık', 'var'], 'extra' => ['menü', 'fiyat']],
                            'ru' => ['sentence' => 'есть рыба в меню', 'correct' => ['есть', 'рыба', 'в', 'меню'], 'extra' => ['суп']],
                            'ar' => ['sentence' => 'يوجد سمك في قائمة الطعام', 'correct' => ['يوجد', 'سمك', 'في', 'قائمة الطعام'], 'extra' => ['حساء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yoxdur', 'ət', 'menyuda'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is no meat on the menu', 'correct' => ['there is no', 'meat', 'on the menu'], 'extra' => ['fish']],
                            'fr' => ['sentence' => 'Il n’y a pas de viande au menu', 'correct' => ['il n’y a pas', 'de viande', 'au menu'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'No hay carne en el menú', 'correct' => ['no hay', 'carne', 'en el menú'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Es gibt kein Fleisch auf der Speisekarte', 'correct' => ['es gibt kein', 'Fleisch', 'auf der Speisekarte'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => 'メニューに肉がありません', 'correct' => ['メニューに', '肉が', 'ありません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '메뉴에 고기가 없어요', 'correct' => ['메뉴에', '고기가', '없어요'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'menüde et yok', 'correct' => ['menüde', 'et', 'yok'], 'extra' => ['menü', 'fiyat']],
                            'ru' => ['sentence' => 'нету мясо в меню', 'correct' => ['нету', 'мясо', 'в', 'меню'], 'extra' => ['рыба']],
                            'ar' => ['sentence' => 'لا يوجد لحم في قائمة الطعام', 'correct' => ['لا يوجد', 'لحم', 'في', 'قائمة الطعام'], 'extra' => ['سمك']],
                        ],
                    ],
                    'c' => [
                        'words' => ['menyu', 'zəhmət olmasa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The menu please', 'correct' => ['the menu', 'please'], 'extra' => ['price']],
                            'fr' => ['sentence' => 'Le menu s’il vous plaît', 'correct' => ['le menu', 's’il vous plaît'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'El menú por favor', 'correct' => ['el menú', 'por favor'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Die Speisekarte bitte', 'correct' => ['die Speisekarte', 'bitte'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'メニューをお願いします', 'correct' => ['メニューを', 'お願いします'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '메뉴 부탁합니다', 'correct' => ['메뉴', '부탁합니다'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'menü lütfen', 'correct' => ['menü', 'lütfen'], 'extra' => ['fiyat', 'çorba']],
                            'ru' => ['sentence' => 'меню пожалуйста', 'correct' => ['меню', 'пожалуйста'], 'extra' => ['цена']],
                            'ar' => ['sentence' => 'قائمة الطعام من فضلك', 'correct' => ['قائمة الطعام', 'من فضلك'], 'extra' => ['سعر']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Asking About Everything', 5,
                pictures: [['az' => 'Şorba', 'img' => 'soup'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Neçə'], ['az' => 'Manat']],
                phrases: [
                    'a' => [
                        'words' => ['neçə', 'manat', 'bu', 'şorba'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is this soup', 'correct' => ['how many', 'lira', 'is', 'this', 'soup'], 'extra' => ['fish']],
                            'fr' => ['sentence' => 'Combien de lires est cette soupe', 'correct' => ['combien de', 'lires', 'est', 'cette', 'soupe'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Cuántas liras es esta sopa', 'correct' => ['cuántas', 'liras', 'es', 'esta', 'sopa'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Wie viele Lira ist diese Suppe', 'correct' => ['wie viele', 'Lira', 'ist', 'diese', 'Suppe'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => 'このスープは何リラですか', 'correct' => ['この', 'スープは', '何', 'リラですか'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '이 수프는 몇 리라예요', 'correct' => ['이', '수프는', '몇', '리라예요'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'bu çorba kaç lira', 'correct' => ['bu', 'çorba', 'kaç', 'lira'], 'extra' => ['ucuz', 'menü']],
                            'ru' => ['sentence' => 'сколько рубль это суп', 'correct' => ['сколько', 'рубль', 'это', 'суп'], 'extra' => ['рыба']],
                            'ar' => ['sentence' => 'كم ريال هذا حساء', 'correct' => ['كم', 'ريال', 'هذا', 'حساء'], 'extra' => ['سمك']],
                        ],
                    ],
                    'b' => [
                        'words' => ['balığı', 'deyil', 'ucuz'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The fish is not cheap', 'correct' => ['the fish', 'is not', 'cheap'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'Le poisson n’est pas bon marché', 'correct' => ['le poisson', 'n’est pas', 'bon marché'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'El pescado no es barato', 'correct' => ['el pescado', 'no es', 'barato'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Fisch ist nicht billig', 'correct' => ['der Fisch', 'ist nicht', 'billig'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => '魚は安くありません', 'correct' => ['魚は', '安く', 'ありません'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '생선은 싸지 않아요', 'correct' => ['생선은', '싸지 않아요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'balık ucuz değil', 'correct' => ['balık', 'ucuz', 'değil'], 'extra' => ['lira', 'menü']],
                            'ru' => ['sentence' => 'рыбу не дешёвый', 'correct' => ['рыбу', 'не', 'дешёвый'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'السمك ليس رخيص', 'correct' => ['السمك', 'ليس', 'رخيص'], 'extra' => ['غالي']],
                        ],
                    ],
                    'c' => [
                        'words' => ['qiymət', 'çox', 'yaxşı'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The price is very good', 'correct' => ['the price', 'is', 'very', 'good'], 'extra' => ['expensive']],
                            'fr' => ['sentence' => 'Le prix est très bon', 'correct' => ['le prix', 'est', 'très', 'bon'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'El precio es muy bueno', 'correct' => ['el precio', 'es', 'muy', 'bueno'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Preis ist sehr gut', 'correct' => ['der Preis', 'ist', 'sehr', 'gut'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => '値段はとても良いです', 'correct' => ['値段は', 'とても', '良いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '가격은 아주 좋아요', 'correct' => ['가격은', '아주', '좋아요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'fiyat çok iyi', 'correct' => ['fiyat', 'çok', 'iyi'], 'extra' => ['lira', 'ucuz']],
                            'ru' => ['sentence' => 'цена очень хороший', 'correct' => ['цена', 'очень', 'хороший'], 'extra' => ['дорогой']],
                            'ar' => ['sentence' => 'سعر جدا جيد', 'correct' => ['سعر', 'جدا', 'جيد'], 'extra' => ['غالي']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
