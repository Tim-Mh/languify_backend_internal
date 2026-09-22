<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitRestaurant02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Menü' => 'menu',
        'Çorba' => 'soup',
        'Balık' => 'fish',
        'Et' => 'meat',
        'Su' => 'water',
    ];

    /**
     * Turkish Restaurant Unit 2 - the menu and what things cost.
     *
     * THE RULE THIS UNIT TEACHES: A QUESTION WORD SITS WHERE THE ANSWER WOULD.
     *
     * Turkish does not move a question word to the front the way English does.
     * `Fiyat ne` is literally "price what", and the answer `Fiyat on lira` puts the
     * price in exactly the same slot. Nothing inverts and nothing is added:
     *
     *     Fiyat ne?      What is the price?
     *     Fiyat on lira. The price is ten lira.
     *
     * So the English word bank has to be rebuilt front-to-back, which is the drill.
     * `kaç` is the other question word here and means "how many", used only with
     * countable things, which is why it appears with `lira` and never with `su`.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Menu and Prices', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: What Is the Price', 1,
                pictures: [['tr' => 'Menü', 'img' => 'menu'], ['tr' => 'Çorba', 'img' => 'soup']],
                plain: [['tr' => 'Fiyat'], ['tr' => 'Lira']],
                phrases: [
                    'a' => [
                        'words' => ['fiyat', 'ne'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'What is the price', 'correct' => ['what', 'is', 'the price'], 'extra' => ['money']],
                            'az' => ['sentence' => 'nə qiymət', 'correct' => ['nə', 'qiymət'], 'extra' => ['pul']],
                            'ar' => ['sentence' => 'ماذا سعر', 'correct' => ['ماذا', 'سعر'], 'extra' => ['نقود']],
                            'ru' => ['sentence' => 'что цена', 'correct' => ['что', 'цена'], 'extra' => ['деньги']],
                            'fr' => ['sentence' => 'Quel est le prix', 'correct' => ['quel', 'est', 'le prix'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'Cuál es el precio', 'correct' => ['cuál', 'es', 'el precio'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Was ist der Preis', 'correct' => ['was', 'ist', 'der Preis'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => '値段は何ですか', 'correct' => ['値段は', '何ですか'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '가격이 얼마예요', 'correct' => ['가격이', '얼마예요'], 'extra' => ['돈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['fiyat', 'on', 'lira'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The price is ten lira', 'correct' => ['the price', 'is', 'ten', 'lira'], 'extra' => ['money']],
                            'az' => ['sentence' => 'qiymət on manat', 'correct' => ['qiymət', 'on', 'manat'], 'extra' => ['pul']],
                            'ar' => ['sentence' => 'سعر عشرة ريال', 'correct' => ['سعر', 'عشرة', 'ريال'], 'extra' => ['نقود']],
                            'ru' => ['sentence' => 'цена десять рубль', 'correct' => ['цена', 'десять', 'рубль'], 'extra' => ['деньги']],
                            'fr' => ['sentence' => 'Le prix est dix lires', 'correct' => ['le prix', 'est', 'dix', 'lires'], 'extra' => ['argent']],
                            'es' => ['sentence' => 'El precio es diez liras', 'correct' => ['el precio', 'es', 'diez', 'liras'], 'extra' => ['dinero']],
                            'de' => ['sentence' => 'Der Preis ist zehn Lira', 'correct' => ['der Preis', 'ist', 'zehn', 'Lira'], 'extra' => ['Geld']],
                            'ja' => ['sentence' => '値段は十リラです', 'correct' => ['値段は', '十', 'リラです'], 'extra' => ['お金']],
                            'ko' => ['sentence' => '가격은 십 리라예요', 'correct' => ['가격은', '십', '리라예요'], 'extra' => ['돈']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bu', 'pahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This is expensive', 'correct' => ['this', 'is', 'expensive'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'bu bahalı', 'correct' => ['bu', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'هذا غالي', 'correct' => ['هذا', 'غالي'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'это дорогой', 'correct' => ['это', 'дорогой'], 'extra' => ['дешёвый']],
                            'fr' => ['sentence' => 'Ceci est cher', 'correct' => ['ceci', 'est', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'Esto es caro', 'correct' => ['esto', 'es', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Das ist teuer', 'correct' => ['das', 'ist', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => 'これは高いです', 'correct' => ['これは', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '이것은 비싸요', 'correct' => ['이것은', '비싸요'], 'extra' => ['싼']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Cheap & Expensive', 2,
                pictures: [['tr' => 'Balık', 'img' => 'fish'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Pahalı'], ['tr' => 'Ucuz']],
                phrases: [
                    'a' => [
                        'words' => ['balık', 'pahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The fish is expensive', 'correct' => ['the fish', 'is', 'expensive'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'balığı bahalı', 'correct' => ['balığı', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'السمك غالي', 'correct' => ['السمك', 'غالي'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'рыбу дорогой', 'correct' => ['рыбу', 'дорогой'], 'extra' => ['дешёвый']],
                            'fr' => ['sentence' => 'Le poisson est cher', 'correct' => ['le poisson', 'est', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'El pescado es caro', 'correct' => ['el pescado', 'es', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Der Fisch ist teuer', 'correct' => ['der Fisch', 'ist', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '魚は高いです', 'correct' => ['魚は', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '생선은 비싸요', 'correct' => ['생선은', '비싸요'], 'extra' => ['싼']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çorba', 'ucuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The soup is cheap', 'correct' => ['the soup', 'is', 'cheap'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'şorba ucuz', 'correct' => ['şorba', 'ucuz'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'حساء رخيص', 'correct' => ['حساء', 'رخيص'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'суп дешёвый', 'correct' => ['суп', 'дешёвый'], 'extra' => ['дорогой']],
                            'fr' => ['sentence' => 'La soupe est bon marché', 'correct' => ['la soupe', 'est', 'bon marché'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'La sopa es barata', 'correct' => ['la sopa', 'es', 'barata'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Die Suppe ist billig', 'correct' => ['die Suppe', 'ist', 'billig'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'スープは安いです', 'correct' => ['スープは', '安いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '수프는 싸요', 'correct' => ['수프는', '싸요'], 'extra' => ['비싼']],
                        ],
                    ],
                    'c' => [
                        'words' => ['et', 'çok', 'pahalı'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The meat is very expensive', 'correct' => ['the meat', 'is', 'very', 'expensive'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'ət çox bahalı', 'correct' => ['ət', 'çox', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'لحم جدا غالي', 'correct' => ['لحم', 'جدا', 'غالي'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'мясо очень дорогой', 'correct' => ['мясо', 'очень', 'дорогой'], 'extra' => ['дешёвый']],
                            'fr' => ['sentence' => 'La viande est très chère', 'correct' => ['la viande', 'est', 'très', 'chère'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'La carne es muy cara', 'correct' => ['la carne', 'es', 'muy', 'cara'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Das Fleisch ist sehr teuer', 'correct' => ['das Fleisch', 'ist', 'sehr', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '肉はとても高いです', 'correct' => ['肉は', 'とても', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '고기는 아주 비싸요', 'correct' => ['고기는', '아주', '비싸요'], 'extra' => ['싼']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: How Many Lira', 3,
                pictures: [['tr' => 'Su', 'img' => 'water'], ['tr' => 'Menü', 'img' => 'menu']],
                plain: [['tr' => 'Kaç'], ['tr' => 'Para']],
                phrases: [
                    'a' => [
                        'words' => ['kaç', 'lira'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira', 'correct' => ['how many', 'lira'], 'extra' => ['price']],
                            'az' => ['sentence' => 'neçə manat', 'correct' => ['neçə', 'manat'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'كم ريال', 'correct' => ['كم', 'ريال'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'сколько рубль', 'correct' => ['сколько', 'рубль'], 'extra' => ['цена']],
                            'fr' => ['sentence' => 'Combien de lires', 'correct' => ['combien de', 'lires'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'Cuántas liras', 'correct' => ['cuántas', 'liras'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viele Lira', 'correct' => ['wie viele', 'Lira'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '何リラですか', 'correct' => ['何', 'リラですか'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '몇 리라예요', 'correct' => ['몇', '리라예요'], 'extra' => ['가격']],
                        ],
                    ],
                    'b' => [
                        'words' => ['su', 'kaç', 'lira'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the water', 'correct' => ['how many', 'lira', 'is', 'the water'], 'extra' => ['price']],
                            'az' => ['sentence' => 'neçə manat suyu', 'correct' => ['neçə', 'manat', 'suyu'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'كم ريال الماء', 'correct' => ['كم', 'ريال', 'الماء'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'сколько рубль воду', 'correct' => ['сколько', 'рубль', 'воду'], 'extra' => ['цена']],
                            'fr' => ['sentence' => 'Combien de lires est l’eau', 'correct' => ['combien de', 'lires', 'est', 'l’eau'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'Cuántas liras es el agua', 'correct' => ['cuántas', 'liras', 'es', 'el agua'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viele Lira ist das Wasser', 'correct' => ['wie viele', 'Lira', 'ist', 'das Wasser'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '水は何リラですか', 'correct' => ['水は', '何', 'リラですか'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '물은 몇 리라예요', 'correct' => ['물은', '몇', '리라예요'], 'extra' => ['가격']],
                        ],
                    ],
                    'c' => [
                        'words' => ['param', 'yok'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I do not have money', 'correct' => ['I do not have', 'money'], 'extra' => ['price']],
                            'az' => ['sentence' => 'məndə yoxdur pul', 'correct' => ['məndə yoxdur', 'pul'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'ليس عندي نقود', 'correct' => ['ليس عندي', 'نقود'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'у меня нету деньги', 'correct' => ['у', 'меня', 'нету', 'деньги'], 'extra' => ['цена']],
                            'fr' => ['sentence' => 'Je n’ai pas d’argent', 'correct' => ['je n’ai pas', 'd’argent'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'No tengo dinero', 'correct' => ['no tengo', 'dinero'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Ich habe kein Geld', 'correct' => ['ich habe', 'kein', 'Geld'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'お金がありません', 'correct' => ['お金が', 'ありません'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '돈이 없어요', 'correct' => ['돈이', '없어요'], 'extra' => ['가격']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Reading the Menu', 4,
                pictures: [['tr' => 'Çorba', 'img' => 'soup'], ['tr' => 'Balık', 'img' => 'fish']],
                plain: [['tr' => 'Menü'], ['tr' => 'Fiyat']],
                phrases: [
                    'a' => [
                        'words' => ['menüde', 'balık', 'var'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is fish on the menu', 'correct' => ['there is', 'fish', 'on the menu'], 'extra' => ['soup']],
                            'az' => ['sentence' => 'var balıq menyuda', 'correct' => ['var', 'balıq', 'menyuda'], 'extra' => ['şorba']],
                            'ar' => ['sentence' => 'يوجد سمك في قائمة الطعام', 'correct' => ['يوجد', 'سمك', 'في', 'قائمة الطعام'], 'extra' => ['حساء']],
                            'ru' => ['sentence' => 'есть рыба в меню', 'correct' => ['есть', 'рыба', 'в', 'меню'], 'extra' => ['суп']],
                            'fr' => ['sentence' => 'Il y a du poisson au menu', 'correct' => ['il y a', 'du poisson', 'au menu'], 'extra' => ['soupe']],
                            'es' => ['sentence' => 'Hay pescado en el menú', 'correct' => ['hay', 'pescado', 'en el menú'], 'extra' => ['sopa']],
                            'de' => ['sentence' => 'Es gibt Fisch auf der Speisekarte', 'correct' => ['es gibt', 'Fisch', 'auf der Speisekarte'], 'extra' => ['Suppe']],
                            'ja' => ['sentence' => 'メニューに魚があります', 'correct' => ['メニューに', '魚が', 'あります'], 'extra' => ['スープ']],
                            'ko' => ['sentence' => '메뉴에 생선이 있어요', 'correct' => ['메뉴에', '생선이', '있어요'], 'extra' => ['수프']],
                        ],
                    ],
                    'b' => [
                        'words' => ['menüde', 'et', 'yok'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is no meat on the menu', 'correct' => ['there is no', 'meat', 'on the menu'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'yoxdur ət menyuda', 'correct' => ['yoxdur', 'ət', 'menyuda'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'لا يوجد لحم في قائمة الطعام', 'correct' => ['لا يوجد', 'لحم', 'في', 'قائمة الطعام'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'нету мясо в меню', 'correct' => ['нету', 'мясо', 'в', 'меню'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Il n’y a pas de viande au menu', 'correct' => ['il n’y a pas', 'de viande', 'au menu'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'No hay carne en el menú', 'correct' => ['no hay', 'carne', 'en el menú'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Es gibt kein Fleisch auf der Speisekarte', 'correct' => ['es gibt kein', 'Fleisch', 'auf der Speisekarte'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => 'メニューに肉がありません', 'correct' => ['メニューに', '肉が', 'ありません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '메뉴에 고기가 없어요', 'correct' => ['메뉴에', '고기가', '없어요'], 'extra' => ['생선']],
                        ],
                    ],
                    'c' => [
                        'words' => ['menü', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The menu please', 'correct' => ['the menu', 'please'], 'extra' => ['price']],
                            'az' => ['sentence' => 'menyu zəhmət olmasa', 'correct' => ['menyu', 'zəhmət olmasa'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'قائمة الطعام من فضلك', 'correct' => ['قائمة الطعام', 'من فضلك'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'меню пожалуйста', 'correct' => ['меню', 'пожалуйста'], 'extra' => ['цена']],
                            'fr' => ['sentence' => 'Le menu s’il vous plaît', 'correct' => ['le menu', 's’il vous plaît'], 'extra' => ['prix']],
                            'es' => ['sentence' => 'El menú por favor', 'correct' => ['el menú', 'por favor'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Die Speisekarte bitte', 'correct' => ['die Speisekarte', 'bitte'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => 'メニューをお願いします', 'correct' => ['メニューを', 'お願いします'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '메뉴 부탁합니다', 'correct' => ['메뉴', '부탁합니다'], 'extra' => ['가격']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Asking About Everything', 5,
                pictures: [['tr' => 'Menü', 'img' => 'menu'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Lira'], ['tr' => 'Ucuz']],
                phrases: [
                    'a' => [
                        'words' => ['bu', 'çorba', 'kaç', 'lira'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is this soup', 'correct' => ['how many', 'lira', 'is', 'this', 'soup'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'neçə manat bu şorba', 'correct' => ['neçə', 'manat', 'bu', 'şorba'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'كم ريال هذا حساء', 'correct' => ['كم', 'ريال', 'هذا', 'حساء'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'сколько рубль это суп', 'correct' => ['сколько', 'рубль', 'это', 'суп'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Combien de lires est cette soupe', 'correct' => ['combien de', 'lires', 'est', 'cette', 'soupe'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Cuántas liras es esta sopa', 'correct' => ['cuántas', 'liras', 'es', 'esta', 'sopa'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Wie viele Lira ist diese Suppe', 'correct' => ['wie viele', 'Lira', 'ist', 'diese', 'Suppe'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => 'このスープは何リラですか', 'correct' => ['この', 'スープは', '何', 'リラですか'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '이 수프는 몇 리라예요', 'correct' => ['이', '수프는', '몇', '리라예요'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['balık', 'ucuz', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The fish is not cheap', 'correct' => ['the fish', 'is not', 'cheap'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'balığı deyil ucuz', 'correct' => ['balığı', 'deyil', 'ucuz'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'السمك ليس رخيص', 'correct' => ['السمك', 'ليس', 'رخيص'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'рыбу не дешёвый', 'correct' => ['рыбу', 'не', 'дешёвый'], 'extra' => ['дорогой']],
                            'fr' => ['sentence' => 'Le poisson n’est pas bon marché', 'correct' => ['le poisson', 'n’est pas', 'bon marché'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'El pescado no es barato', 'correct' => ['el pescado', 'no es', 'barato'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Fisch ist nicht billig', 'correct' => ['der Fisch', 'ist nicht', 'billig'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => '魚は安くありません', 'correct' => ['魚は', '安く', 'ありません'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '생선은 싸지 않아요', 'correct' => ['생선은', '싸지 않아요'], 'extra' => ['비싼']],
                        ],
                    ],
                    'c' => [
                        'words' => ['fiyat', 'çok', 'iyi'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The price is very good', 'correct' => ['the price', 'is', 'very', 'good'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'qiymət çox yaxşı', 'correct' => ['qiymət', 'çox', 'yaxşı'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'سعر جدا جيد', 'correct' => ['سعر', 'جدا', 'جيد'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'цена очень хороший', 'correct' => ['цена', 'очень', 'хороший'], 'extra' => ['дорогой']],
                            'fr' => ['sentence' => 'Le prix est très bon', 'correct' => ['le prix', 'est', 'très', 'bon'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'El precio es muy bueno', 'correct' => ['el precio', 'es', 'muy', 'bueno'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Preis ist sehr gut', 'correct' => ['der Preis', 'ist', 'sehr', 'gut'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => '値段はとても良いです', 'correct' => ['値段は', 'とても', '良いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '가격은 아주 좋아요', 'correct' => ['가격은', '아주', '좋아요'], 'extra' => ['비싼']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
