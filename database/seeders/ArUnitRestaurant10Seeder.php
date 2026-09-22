<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitRestaurant10Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'قهوة' => 'coffee', 'شاي' => 'tea', 'بطاطا' => 'potato', 'لحم' => 'meat',
        'ماء' => 'water', 'الحساب' => 'bill', 'قائمة الطعام' => 'menu', 'حساء' => 'soup',
    ];

    /**
     * Arabic Restaurant Unit 10.
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

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Fast Food and Takeaway', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: To Take Away', 1,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'للخارج'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['قهوة', 'للخارج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A coffee to take away', 'correct' => ['a', 'coffee', 'to take away'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'bir qəhvə özümlə', 'correct' => ['bir', 'qəhvə', 'özümlə'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Un café à emporter', 'correct' => ['un', 'café', 'à emporter'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Un café para llevar', 'correct' => ['un', 'café', 'para llevar'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Einen Kaffee zum Mitnehmen', 'correct' => ['einen', 'Kaffee', 'zum Mitnehmen'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'コーヒーを持ち帰りで', 'correct' => ['コーヒーを', '持ち帰りで'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '커피 포장이요', 'correct' => ['커피', '포장이요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'bir kahve paket', 'correct' => ['bir', 'kahve', 'paket'], 'extra' => ['hızlı', 'ekmek']],
                            'ru' => ['sentence' => 'кофе с собой', 'correct' => ['кофе', 'с собой'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'b' => [
                        'words' => ['للخارج', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'To take away please', 'correct' => ['to take away', 'please'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'özümlə zəhmət olmasa', 'correct' => ['özümlə', 'zəhmət olmasa'], 'extra' => ['qəhvə']],
                            'fr' => ['sentence' => 'À emporter s’il vous plaît', 'correct' => ['à emporter', 's’il vous plaît'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Para llevar por favor', 'correct' => ['para llevar', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Zum Mitnehmen bitte', 'correct' => ['zum Mitnehmen', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '持ち帰りでお願いします', 'correct' => ['持ち帰りで', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '포장 부탁합니다', 'correct' => ['포장', '부탁합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'paket lütfen', 'correct' => ['paket', 'lütfen'], 'extra' => ['hızlı', 'kahve']],
                            'ru' => ['sentence' => 'с собой пожалуйста', 'correct' => ['с собой', 'пожалуйста'], 'extra' => ['кофе']],
                        ],
                    ],
                    'c' => [
                        'words' => ['آكل', 'هنا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I eat here', 'correct' => ['I eat', 'here'], 'extra' => ['to take away']],
                            'az' => ['sentence' => 'yeyirəm burada', 'correct' => ['yeyirəm', 'burada'], 'extra' => ['özümlə']],
                            'fr' => ['sentence' => 'Je mange ici', 'correct' => ['je mange', 'ici'], 'extra' => ['à emporter']],
                            'es' => ['sentence' => 'Como aquí', 'correct' => ['como', 'aquí'], 'extra' => ['para llevar']],
                            'de' => ['sentence' => 'Ich esse hier', 'correct' => ['ich esse', 'hier'], 'extra' => ['zum Mitnehmen']],
                            'ja' => ['sentence' => 'ここで食べます', 'correct' => ['ここで', '食べます'], 'extra' => ['持ち帰り']],
                            'ko' => ['sentence' => '여기에서 먹어요', 'correct' => ['여기에서', '먹어요'], 'extra' => ['포장']],
                            'tr' => ['sentence' => 'burada yiyorum', 'correct' => ['burada', 'yiyorum'], 'extra' => ['paket', 'hızlı']],
                            'ru' => ['sentence' => 'я ем здесь', 'correct' => ['я', 'ем', 'здесь'], 'extra' => ['с собой']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Potatoes', 2,
                pictures: [['ar' => 'بطاطا', 'img' => 'potato'], ['ar' => 'لحم', 'img' => 'meat']],
                plain: [['ar' => 'أريد'], ['ar' => 'ساخن']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'بطاطا'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like potatoes', 'correct' => ['I would like', 'potatoes'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'istəyirəm kartof', 'correct' => ['istəyirəm', 'kartof'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Je voudrais des pommes de terre', 'correct' => ['je voudrais', 'des pommes de terre'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Quisiera patatas', 'correct' => ['quisiera', 'patatas'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ich möchte Kartoffeln', 'correct' => ['ich möchte', 'Kartoffeln'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'じゃがいもをください', 'correct' => ['じゃがいもを', 'ください'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '감자 주세요', 'correct' => ['감자', '주세요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'patates istiyorum', 'correct' => ['patates', 'istiyorum'], 'extra' => ['paket', 'et']],
                            'ru' => ['sentence' => 'я хочу картофель', 'correct' => ['я', 'хочу', 'картофель'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'b' => [
                        'words' => ['بطاطا', 'ساخن'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The potatoes are hot', 'correct' => ['the potatoes', 'are', 'hot'], 'extra' => ['cold']],
                            'az' => ['sentence' => 'kartof isti', 'correct' => ['kartof', 'isti'], 'extra' => ['soyuq']],
                            'fr' => ['sentence' => 'Les pommes de terre sont chaudes', 'correct' => ['les pommes de terre', 'sont', 'chaudes'], 'extra' => ['froid']],
                            'es' => ['sentence' => 'Las patatas están calientes', 'correct' => ['las patatas', 'están', 'calientes'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Die Kartoffeln sind heiß', 'correct' => ['die Kartoffeln', 'sind', 'heiß'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => 'じゃがいもは暑いです', 'correct' => ['じゃがいもは', '暑いです'], 'extra' => ['寒い']],
                            'ko' => ['sentence' => '감자는 더워요', 'correct' => ['감자는', '더워요'], 'extra' => ['추운']],
                            'tr' => ['sentence' => 'patates sıcak', 'correct' => ['patates', 'sıcak'], 'extra' => ['paket', 'et']],
                            'ru' => ['sentence' => 'картофель горячий', 'correct' => ['картофель', 'горячий'], 'extra' => ['холодный']],
                        ],
                    ],
                    'c' => [
                        'words' => ['لحم', 'و', 'بطاطا'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Meat and potatoes', 'correct' => ['meat', 'and', 'potatoes'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'ət və kartof', 'correct' => ['ət', 'və', 'kartof'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'De la viande et des pommes de terre', 'correct' => ['de la viande', 'et', 'des pommes de terre'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Carne y patatas', 'correct' => ['carne', 'y', 'patatas'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Fleisch und Kartoffeln', 'correct' => ['Fleisch', 'und', 'Kartoffeln'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '肉とじゃがいも', 'correct' => ['肉', 'と', 'じゃがいも'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '고기와 감자', 'correct' => ['고기와', '감자'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'et ve patates', 'correct' => ['et', 've', 'patates'], 'extra' => ['paket', 'ekmek']],
                            'ru' => ['sentence' => 'мясо и картофель', 'correct' => ['мясо', 'и', 'картофель'], 'extra' => ['хлеб']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Quick Order', 3,
                pictures: [['ar' => 'ماء', 'img' => 'water'], ['ar' => 'الحساب', 'img' => 'bill']],
                plain: [['ar' => 'للخارج'], ['ar' => 'من فضلك']],
                phrases: [
                    'a' => [
                        'words' => ['ماء', 'للخارج'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A water to take away', 'correct' => ['a', 'water', 'to take away'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'bir su özümlə', 'correct' => ['bir', 'su', 'özümlə'], 'extra' => ['qəhvə']],
                            'fr' => ['sentence' => 'Une eau à emporter', 'correct' => ['une', 'eau', 'à emporter'], 'extra' => ['café']],
                            'es' => ['sentence' => 'Un agua para llevar', 'correct' => ['un', 'agua', 'para llevar'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ein Wasser zum Mitnehmen', 'correct' => ['ein', 'Wasser', 'zum Mitnehmen'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '水を持ち帰りで', 'correct' => ['水を', '持ち帰りで'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '물 포장이요', 'correct' => ['물', '포장이요'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bir su paket', 'correct' => ['bir', 'su', 'paket'], 'extra' => ['hızlı', 'kahve']],
                            'ru' => ['sentence' => 'вода с собой', 'correct' => ['вода', 'с собой'], 'extra' => ['кофе']],
                        ],
                    ],
                    'b' => [
                        'words' => ['الحساب', 'من فضلك'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bill please', 'correct' => ['the bill', 'please'], 'extra' => ['menu']],
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['menyu']],
                            'fr' => ['sentence' => 'L’addition s’il vous plaît', 'correct' => ['l’addition', 's’il vous plaît'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'La cuenta por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Die Rechnung bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計を', 'お願いします'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['메뉴']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['hızlı', 'paket']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['меню']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أدفع', 'مع', 'بطاقة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am paying with a card', 'correct' => ['I am paying', 'with', 'a', 'card'], 'extra' => ['cash']],
                            'az' => ['sentence' => 'ödəyirəm ilə bir kart', 'correct' => ['ödəyirəm', 'ilə', 'bir', 'kart'], 'extra' => ['nağd']],
                            'fr' => ['sentence' => 'Je paie avec une carte', 'correct' => ['je paie', 'avec', 'une', 'carte'], 'extra' => ['espèces']],
                            'es' => ['sentence' => 'Pago con una tarjeta', 'correct' => ['pago', 'con', 'una', 'tarjeta'], 'extra' => ['efectivo']],
                            'de' => ['sentence' => 'Ich zahle mit einer Karte', 'correct' => ['ich zahle', 'mit', 'einer', 'Karte'], 'extra' => ['Bargeld']],
                            'ja' => ['sentence' => 'カードで払います', 'correct' => ['カードで', '払います'], 'extra' => ['現金']],
                            'ko' => ['sentence' => '카드로 계산해요', 'correct' => ['카드로', '계산해요'], 'extra' => ['현금']],
                            'tr' => ['sentence' => 'kart ile ödüyorum', 'correct' => ['kart', 'ile', 'ödüyorum'], 'extra' => ['hızlı', 'paket']],
                            'ru' => ['sentence' => 'я плачу с карта', 'correct' => ['я', 'плачу', 'с', 'карта'], 'extra' => ['наличные']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Chapter Review', 4,
                pictures: [['ar' => 'قائمة الطعام', 'img' => 'menu'], ['ar' => 'حساء', 'img' => 'soup']],
                plain: [['ar' => 'من فضلك'], ['ar' => 'أريد']],
                phrases: [
                    'a' => [
                        'words' => ['قائمة الطعام', 'من فضلك'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The menu please', 'correct' => ['the menu', 'please'], 'extra' => ['bill']],
                            'az' => ['sentence' => 'menyu zəhmət olmasa', 'correct' => ['menyu', 'zəhmət olmasa'], 'extra' => ['hesab']],
                            'fr' => ['sentence' => 'Le menu s’il vous plaît', 'correct' => ['le menu', 's’il vous plaît'], 'extra' => ['addition']],
                            'es' => ['sentence' => 'El menú por favor', 'correct' => ['el menú', 'por favor'], 'extra' => ['cuenta']],
                            'de' => ['sentence' => 'Die Speisekarte bitte', 'correct' => ['die Speisekarte', 'bitte'], 'extra' => ['Rechnung']],
                            'ja' => ['sentence' => 'メニューをお願いします', 'correct' => ['メニューを', 'お願いします'], 'extra' => ['お会計']],
                            'ko' => ['sentence' => '메뉴 부탁합니다', 'correct' => ['메뉴', '부탁합니다'], 'extra' => ['계산서']],
                            'tr' => ['sentence' => 'menü lütfen', 'correct' => ['menü', 'lütfen'], 'extra' => ['hesap', 'çorba']],
                            'ru' => ['sentence' => 'меню пожалуйста', 'correct' => ['меню', 'пожалуйста'], 'extra' => ['счёт']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أريد', 'حساء'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like a soup', 'correct' => ['I would like', 'a', 'soup'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'istəyirəm bir şorba', 'correct' => ['istəyirəm', 'bir', 'şorba'], 'extra' => ['ət']],
                            'fr' => ['sentence' => 'Je voudrais une soupe', 'correct' => ['je voudrais', 'une', 'soupe'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Quisiera una sopa', 'correct' => ['quisiera', 'una', 'sopa'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich möchte eine Suppe', 'correct' => ['ich möchte', 'eine', 'Suppe'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'スープをください', 'correct' => ['スープを', 'ください'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '수프 주세요', 'correct' => ['수프', '주세요'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'bir çorba istiyorum', 'correct' => ['bir', 'çorba', 'istiyorum'], 'extra' => ['menü', 'hesap']],
                            'ru' => ['sentence' => 'я хочу суп', 'correct' => ['я', 'хочу', 'суп'], 'extra' => ['мясо']],
                        ],
                    ],
                    'c' => [
                        'words' => ['طعام', 'لذيذ'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The food is delicious', 'correct' => ['the food', 'is', 'delicious'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'yemək dadlı', 'correct' => ['yemək', 'dadlı'], 'extra' => ['bahalı']],
                            'fr' => ['sentence' => 'La nourriture est délicieuse', 'correct' => ['la nourriture', 'est', 'délicieuse'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'La comida es deliciosa', 'correct' => ['la comida', 'es', 'deliciosa'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Das Essen ist lecker', 'correct' => ['das Essen', 'ist', 'lecker'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => '食べ物はおいしいです', 'correct' => ['食べ物は', 'おいしいです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '음식은 맛있어요', 'correct' => ['음식은', '맛있어요'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'yemek lezzetli', 'correct' => ['yemek', 'lezzetli'], 'extra' => ['menü', 'hesap']],
                            'ru' => ['sentence' => 'еда вкусный', 'correct' => ['еда', 'вкусный'], 'extra' => ['дорогой']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: A Whole Meal Out', 5,
                pictures: [['ar' => 'حساء', 'img' => 'soup'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'للخارج'], ['ar' => 'كم']],
                phrases: [
                    'a' => [
                        'words' => ['حساء', 'و', 'قهوة', 'للخارج'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'A soup and a coffee to take away', 'correct' => ['a', 'soup', 'and', 'a', 'coffee', 'to take away'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'bir şorba və bir qəhvə özümlə', 'correct' => ['bir', 'şorba', 'və', 'bir', 'qəhvə', 'özümlə'], 'extra' => ['çörək']],
                            'fr' => ['sentence' => 'Une soupe et un café à emporter', 'correct' => ['une', 'soupe', 'et', 'un', 'café', 'à emporter'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Una sopa y un café para llevar', 'correct' => ['una', 'sopa', 'y', 'un', 'café', 'para llevar'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Eine Suppe und ein Kaffee zum Mitnehmen', 'correct' => ['eine', 'Suppe', 'und', 'ein', 'Kaffee', 'zum Mitnehmen'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'スープとコーヒーを持ち帰りで', 'correct' => ['スープ', 'と', 'コーヒーを', '持ち帰りで'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '수프와 커피 포장이요', 'correct' => ['수프와', '커피', '포장이요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'bir çorba ve bir kahve paket', 'correct' => ['bir', 'çorba', 've', 'bir', 'kahve', 'paket'], 'extra' => ['hesap']],
                            'ru' => ['sentence' => 'суп и кофе с собой', 'correct' => ['суп', 'и', 'кофе', 'с собой'], 'extra' => ['хлеб']],
                        ],
                    ],
                    'b' => [
                        'words' => ['كم', 'ريال', 'الحساب'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the bill', 'correct' => ['how many', 'lira', 'is', 'the bill'], 'extra' => ['menu']],
                            'az' => ['sentence' => 'neçə manat hesab', 'correct' => ['neçə', 'manat', 'hesab'], 'extra' => ['menyu']],
                            'fr' => ['sentence' => 'Combien de lires est l’addition', 'correct' => ['combien de', 'lires', 'est', 'l’addition'], 'extra' => ['menu']],
                            'es' => ['sentence' => 'Cuántas liras es la cuenta', 'correct' => ['cuántas', 'liras', 'es', 'la cuenta'], 'extra' => ['menú']],
                            'de' => ['sentence' => 'Wie viele Lira ist die Rechnung', 'correct' => ['wie viele', 'Lira', 'ist', 'die Rechnung'], 'extra' => ['Speisekarte']],
                            'ja' => ['sentence' => 'お会計は何リラですか', 'correct' => ['お会計は', '何', 'リラですか'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '계산서는 몇 리라예요', 'correct' => ['계산서는', '몇', '리라예요'], 'extra' => ['메뉴']],
                            'tr' => ['sentence' => 'hesap kaç lira', 'correct' => ['hesap', 'kaç', 'lira'], 'extra' => ['paket', 'kahve']],
                            'ru' => ['sentence' => 'сколько рубль счёт', 'correct' => ['сколько', 'рубль', 'счёт'], 'extra' => ['меню']],
                        ],
                    ],
                    'c' => [
                        'words' => ['شكرا', 'و', 'مع السلامة'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Thank you and goodbye', 'correct' => ['thank you', 'and', 'goodbye'], 'extra' => ['hello']],
                            'az' => ['sentence' => 'təşəkkür və sağ ol', 'correct' => ['təşəkkür', 'və', 'sağ ol'], 'extra' => ['salam']],
                            'fr' => ['sentence' => 'Merci et au revoir', 'correct' => ['merci', 'et', 'au revoir'], 'extra' => ['bonjour']],
                            'es' => ['sentence' => 'Gracias y adiós', 'correct' => ['gracias', 'y', 'adiós'], 'extra' => ['hola']],
                            'de' => ['sentence' => 'Danke und auf Wiedersehen', 'correct' => ['danke', 'und', 'auf Wiedersehen'], 'extra' => ['hallo']],
                            'ja' => ['sentence' => 'ありがとうさようなら', 'correct' => ['ありがとう', 'さようなら'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '고맙습니다 안녕히 계세요', 'correct' => ['고맙습니다', '안녕히 계세요'], 'extra' => ['안녕하세요']],
                            'tr' => ['sentence' => 'teşekkürler ve hoşça kal', 'correct' => ['teşekkürler', 've', 'hoşça kal'], 'extra' => ['paket', 'hesap']],
                            'ru' => ['sentence' => 'спасибо и до свидания', 'correct' => ['спасибо', 'и', 'до свидания'], 'extra' => ['привет']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
