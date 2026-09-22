<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant10Seeder extends Seeder
{
    private const PICTURES = [
        'Sandwich' => 'sandwich', 'Fries' => 'fries', 'Burger' => 'burger', 'Juice' => 'juice',
        'Coffee' => 'coffee', 'Ice cream' => 'icecream', 'Salad' => 'salad', 'Bread' => 'bread',
    ];

    /**
     * English Chapter 3, Unit 10 — fast food and takeaway.
     *
     * The quickest exchange in the chapter: name the food, say whether it is to
     * take away or to eat in, and ask how long. It reuses ordering language
     * from Units 1-3 so the learner finishes running a whole transaction.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Fast Food and Takeaway', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Here or To Go', 1,
                pictures: [['en' => 'Sandwich', 'img' => 'sandwich'], ['en' => 'Fries', 'img' => 'fries']],
                plain: [['en' => 'Takeaway'], ['en' => 'Eat in']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'sandwich', 'takeaway'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un sándwich para llevar', 'correct' => ['un', 'sándwich', 'para llevar'], 'extra' => ['para tomar aquí', 'patatas fritas']],
                            'de' => ['sentence' => 'Ein Sandwich zum Mitnehmen', 'correct' => ['ein', 'Sandwich', 'zum Mitnehmen'], 'extra' => ['zum Hieressen', 'Pommes']],
                            'ja' => ['sentence' => '持ち帰りのサンドイッチ', 'correct' => ['持ち帰り', 'の', 'サンドイッチ'], 'extra' => ['店内で']],
                            'ko' => ['sentence' => '포장 샌드위치', 'correct' => ['포장', '샌드위치'], 'extra' => ['매장에서']],
                            'fr' => ['sentence' => 'Un sandwich à emporter', 'correct' => ['un', 'sandwich', 'à emporter'], 'extra' => ['sur place', 'frites']],
                            'tr' => ['sentence' => 'paket bir sandviç', 'correct' => ['paket', 'bir', 'sandviç'], 'extra' => []],
                        'ru' => ['sentence' => 'сэндвич с собой', 'correct' => ['сэндвич', 'с собой'], 'extra' => []],
                        'ar' => ['sentence' => 'شطيرة للخارج', 'correct' => ['شطيرة', 'للخارج'], 'extra' => []],
                        'az' => ['sentence' => 'bir sendviç özümlə', 'correct' => ['bir', 'sendviç', 'özümlə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['fries', 'eat in'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Patatas fritas para tomar aquí', 'correct' => ['patatas fritas', 'para tomar aquí'], 'extra' => ['para llevar', 'sándwich']],
                            'de' => ['sentence' => 'Pommes zum Hieressen', 'correct' => ['Pommes', 'zum Hieressen'], 'extra' => ['zum Mitnehmen', 'Sandwich']],
                            'ja' => ['sentence' => '店内でフライドポテト', 'correct' => ['店内で', 'フライドポテト'], 'extra' => ['持ち帰り']],
                            'ko' => ['sentence' => '매장에서 감자튀김', 'correct' => ['매장에서', '감자튀김'], 'extra' => ['포장']],
                            'fr' => ['sentence' => 'Des frites sur place', 'correct' => ['frites', 'sur place'], 'extra' => ['à emporter']],
                            'tr' => ['sentence' => 'burada patates kızartması', 'correct' => ['burada', 'patates', 'kızartması'], 'extra' => []],
                        'ru' => ['sentence' => 'картошка фри ем в', 'correct' => ['картошка фри', 'ем', 'в'], 'extra' => []],
                        'ar' => ['sentence' => 'بطاطا مقلية آكل في', 'correct' => ['بطاطا مقلية', 'آكل', 'في'], 'extra' => []],
                        'az' => ['sentence' => 'kartof fri yeyirəm içində', 'correct' => ['kartof fri', 'yeyirəm', 'içində'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'sandwich', 'and', 'fries', 'takeaway'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Un sándwich y patatas fritas para llevar', 'correct' => ['un', 'sándwich', 'y', 'patatas fritas', 'para llevar'], 'extra' => ['para tomar aquí']],
                            'de' => ['sentence' => 'Ein Sandwich und Pommes zum Mitnehmen', 'correct' => ['ein', 'Sandwich', 'und', 'Pommes', 'zum Mitnehmen'], 'extra' => ['zum Hieressen']],
                            'ja' => ['sentence' => '持ち帰りのサンドイッチとフライドポテト', 'correct' => ['持ち帰り', 'の', 'サンドイッチ', 'と', 'フライドポテト'], 'extra' => ['店内で']],
                            'ko' => ['sentence' => '샌드위치와 감자튀김 포장', 'correct' => ['샌드위치와', '감자튀김', '포장'], 'extra' => ['매장에서']],
                            'fr' => ['sentence' => 'Un sandwich et des frites à emporter', 'correct' => ['un', 'sandwich', 'et', 'frites', 'à emporter'], 'extra' => ['sur place']],
                            'tr' => ['sentence' => 'paket bir sandviç ve patates kızartması', 'correct' => ['paket', 'bir', 'sandviç', 've', 'patates', 'kızartması'], 'extra' => []],
                        'ru' => ['sentence' => 'сэндвич и картошка фри с собой', 'correct' => ['сэндвич', 'и', 'картошка фри', 'с собой'], 'extra' => []],
                        'ar' => ['sentence' => 'شطيرة و بطاطا مقلية للخارج', 'correct' => ['شطيرة', 'و', 'بطاطا مقلية', 'للخارج'], 'extra' => []],
                        'az' => ['sentence' => 'bir sendviç və kartof fri özümlə', 'correct' => ['bir', 'sendviç', 'və', 'kartof fri', 'özümlə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: A Burger and Fries', 2,
                pictures: [['en' => 'Burger', 'img' => 'burger'], ['en' => 'Fries', 'img' => 'fries']],
                plain: [['en' => 'Fast'], ['en' => 'Bag']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'burger', 'with', 'fries'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una hamburguesa con patatas fritas', 'correct' => ['una', 'hamburguesa', 'con', 'patatas fritas'], 'extra' => ['rápido', 'bolsa']],
                            'de' => ['sentence' => 'Ein Burger mit Pommes', 'correct' => ['ein', 'Burger', 'mit', 'Pommes'], 'extra' => ['schnell', 'Tüte']],
                            'ja' => ['sentence' => 'フライドポテト付きハンバーガー', 'correct' => ['フライドポテト', '付き', 'ハンバーガー'], 'extra' => ['速い']],
                            'ko' => ['sentence' => '감자튀김과 햄버거', 'correct' => ['감자튀김과', '햄버거'], 'extra' => ['빠른']],
                            'fr' => ['sentence' => 'Un hamburger avec des frites', 'correct' => ['un', 'hamburger', 'avec', 'frites'], 'extra' => ['rapide', 'sac']],
                            'tr' => ['sentence' => 'patates kızartmalı bir hamburger', 'correct' => ['patates', 'kızartmalı', 'bir', 'hamburger'], 'extra' => []],
                        'ru' => ['sentence' => 'бургер с картошка фри', 'correct' => ['бургер', 'с', 'картошка фри'], 'extra' => []],
                        'ar' => ['sentence' => 'برجر مع بطاطا مقلية', 'correct' => ['برجر', 'مع', 'بطاطا مقلية'], 'extra' => []],
                        'az' => ['sentence' => 'bir burger ilə kartof fri', 'correct' => ['bir', 'burger', 'ilə', 'kartof fri'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'fast', 'burger'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una hamburguesa rápida', 'correct' => ['una', 'rápido', 'hamburguesa'], 'extra' => ['bolsa', 'patatas fritas']],
                            'de' => ['sentence' => 'Ein schneller Burger', 'correct' => ['ein', 'schnell', 'Burger'], 'extra' => ['Tüte', 'Pommes']],
                            'ja' => ['sentence' => '速いハンバーガー', 'correct' => ['速い', 'ハンバーガー'], 'extra' => ['袋']],
                            'ko' => ['sentence' => '빠른 햄버거', 'correct' => ['빠른', '햄버거'], 'extra' => ['봉투']],
                            'fr' => ['sentence' => 'Un hamburger rapide', 'correct' => ['un', 'hamburger', 'rapide'], 'extra' => ['sac']],
                            'tr' => ['sentence' => 'hızlı bir hamburger', 'correct' => ['hızlı', 'bir', 'hamburger'], 'extra' => []],
                        'ru' => ['sentence' => 'быстро бургер', 'correct' => ['быстро', 'бургер'], 'extra' => []],
                        'ar' => ['sentence' => 'بسرعة برجر', 'correct' => ['بسرعة', 'برجر'], 'extra' => []],
                        'az' => ['sentence' => 'bir sürətli burger', 'correct' => ['bir', 'sürətli', 'burger'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['fries', 'in', 'a', 'bag'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Patatas fritas en una bolsa', 'correct' => ['patatas fritas', 'en', 'una', 'bolsa'], 'extra' => ['rápido']],
                            'de' => ['sentence' => 'Pommes in einer Tüte', 'correct' => ['Pommes', 'in', 'einer', 'Tüte'], 'extra' => ['schnell']],
                            'ja' => ['sentence' => '袋の中のフライドポテト', 'correct' => ['袋', 'の', '中', 'の', 'フライドポテト'], 'extra' => ['速い']],
                            'ko' => ['sentence' => '봉투 안의 감자튀김', 'correct' => ['봉투', '안의', '감자튀김'], 'extra' => ['빠른']],
                            'fr' => ['sentence' => 'Des frites dans un sac', 'correct' => ['frites', 'dans', 'un', 'sac'], 'extra' => ['rapide']],
                            'tr' => ['sentence' => 'poşette patates kızartması', 'correct' => ['poşette', 'patates', 'kızartması'], 'extra' => []],
                        'ru' => ['sentence' => 'картошка фри в пакет', 'correct' => ['картошка фри', 'в', 'пакет'], 'extra' => []],
                        'ar' => ['sentence' => 'بطاطا مقلية في كيس', 'correct' => ['بطاطا مقلية', 'في', 'كيس'], 'extra' => []],
                        'az' => ['sentence' => 'kartof fri içində bir torba', 'correct' => ['kartof fri', 'içində', 'bir', 'torba'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson("Lesson 3: The Children's Menu", 3,
                pictures: [['en' => 'Juice', 'img' => 'juice'], ['en' => 'Coffee', 'img' => 'coffee']],
                plain: [['en' => 'Child'], ['en' => 'Order']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'child', 'menu'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un menú infantil', 'correct' => ['un', 'menú', 'infantil'], 'extra' => ['pedido', 'zumo']],
                            'de' => ['sentence' => 'Ein Kindermenü', 'correct' => ['ein', 'Kind', 'Menü'], 'extra' => ['Bestellung', 'Saft']],
                            'ja' => ['sentence' => '子供メニュー', 'correct' => ['子供', 'メニュー'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '어린이 메뉴', 'correct' => ['어린이', '메뉴'], 'extra' => ['주문']],
                            'fr' => ['sentence' => 'Un menu enfant', 'correct' => ['un', 'menu', 'enfant'], 'extra' => ['commande', 'jus']],
                            'tr' => ['sentence' => 'bir çocuk menüsü', 'correct' => ['bir', 'çocuk', 'menüsü'], 'extra' => []],
                        'ru' => ['sentence' => 'ребёнок меню', 'correct' => ['ребёнок', 'меню'], 'extra' => []],
                        'ar' => ['sentence' => 'طفل قائمة الطعام', 'correct' => ['طفل', 'قائمة الطعام'], 'extra' => []],
                        'az' => ['sentence' => 'bir uşaq menyu', 'correct' => ['bir', 'uşaq', 'menyu'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'order', 'with', 'a', 'juice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mi pedido con un zumo', 'correct' => ['mi', 'pedido', 'con', 'un', 'zumo'], 'extra' => ['niño']],
                            'de' => ['sentence' => 'Meine Bestellung mit einem Saft', 'correct' => ['meine', 'Bestellung', 'mit', 'einem', 'Saft'], 'extra' => ['Kind']],
                            'ja' => ['sentence' => 'ジュース付きの私の注文', 'correct' => ['ジュース', '付き', 'の', '私の', '注文'], 'extra' => ['子供']],
                            'ko' => ['sentence' => '주스와 함께 제 주문', 'correct' => ['주스와', '함께', '제', '주문'], 'extra' => ['아이']],
                            'fr' => ['sentence' => 'Ma commande avec un jus', 'correct' => ['ma', 'commande', 'avec', 'un', 'jus'], 'extra' => ['enfant']],
                            'tr' => ['sentence' => 'meyve sulu siparişim', 'correct' => ['meyve', 'sulu', 'siparişim'], 'extra' => []],
                        'ru' => ['sentence' => 'мой заказ с сок', 'correct' => ['мой', 'заказ', 'с', 'сок'], 'extra' => []],
                        'ar' => ['sentence' => 'طلب مع عصير', 'correct' => ['طلب', 'مع', 'عصير'], 'extra' => []],
                        'az' => ['sentence' => 'mənim sifariş ilə bir şirə', 'correct' => ['mənim', 'sifariş', 'ilə', 'bir', 'şirə'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'coffee', 'and', 'a', 'juice'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un café y un zumo', 'correct' => ['un', 'café', 'y', 'un', 'zumo'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Ein Kaffee und ein Saft', 'correct' => ['ein', 'Kaffee', 'und', 'ein', 'Saft'], 'extra' => ['Bestellung']],
                            'ja' => ['sentence' => 'コーヒーとジュース', 'correct' => ['コーヒー', 'と', 'ジュース'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '커피와 주스', 'correct' => ['커피와', '주스'], 'extra' => ['주문']],
                            'fr' => ['sentence' => 'Un café et un jus', 'correct' => ['un', 'café', 'et', 'un', 'jus'], 'extra' => ['commande']],
                            'tr' => ['sentence' => 'bir kahve ve bir meyve suyu', 'correct' => ['bir', 'kahve', 've', 'bir', 'meyve', 'suyu'], 'extra' => []],
                        'ru' => ['sentence' => 'кофе и сок', 'correct' => ['кофе', 'и', 'сок'], 'extra' => []],
                        'ar' => ['sentence' => 'قهوة و عصير', 'correct' => ['قهوة', 'و', 'عصير'], 'extra' => []],
                        'az' => ['sentence' => 'bir qəhvə və bir şirə', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'şirə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Waiting for It', 4,
                pictures: [['en' => 'Sandwich', 'img' => 'sandwich'], ['en' => 'Burger', 'img' => 'burger']],
                plain: [['en' => 'Wait'], ['en' => 'Ready']],
                phrases: [
                    'a' => [
                        'words' => ['wait', 'for', 'a', 'burger'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Esperar una hamburguesa', 'correct' => ['esperar', 'para', 'una', 'hamburguesa'], 'extra' => ['listo']],
                            'de' => ['sentence' => 'Auf einen Burger warten', 'correct' => ['warten', 'für', 'einen', 'Burger'], 'extra' => ['bereit']],
                            'ja' => ['sentence' => 'ハンバーガーを待つ', 'correct' => ['ハンバーガー', 'を', '待つ'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '햄버거를 기다리다', 'correct' => ['햄버거를', '기다리다'], 'extra' => ['준비된']],
                            'fr' => ['sentence' => 'Attendre un hamburger', 'correct' => ['attendre', 'pour', 'un', 'hamburger'], 'extra' => ['prêt']],
                            'tr' => ['sentence' => 'bir hamburger bekle', 'correct' => ['bir', 'hamburger', 'bekle'], 'extra' => []],
                        'ru' => ['sentence' => 'подожди для бургер', 'correct' => ['подожди', 'для', 'бургер'], 'extra' => []],
                        'ar' => ['sentence' => 'انتظر لأجل برجر', 'correct' => ['انتظر', 'لأجل', 'برجر'], 'extra' => []],
                        'az' => ['sentence' => 'gözlə üçün bir burger', 'correct' => ['gözlə', 'üçün', 'bir', 'burger'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'sandwich', 'is', 'ready'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El sándwich está listo', 'correct' => ['el', 'sándwich', 'está', 'listo'], 'extra' => ['esperar', 'hamburguesa']],
                            'de' => ['sentence' => 'Das Sandwich ist fertig', 'correct' => ['das', 'Sandwich', 'ist', 'bereit'], 'extra' => ['warten', 'Burger']],
                            'ja' => ['sentence' => 'サンドイッチは準備ができています', 'correct' => ['サンドイッチ', 'は', '準備', 'が', 'で', 'きて', 'います'], 'extra' => ['待つ']],
                            'ko' => ['sentence' => '샌드위치는 준비되었습니다', 'correct' => ['샌드위치는', '준비되었습니다'], 'extra' => ['기다리다']],
                            'fr' => ['sentence' => 'Le sandwich est prêt', 'correct' => ['le', 'sandwich', 'est', 'prêt'], 'extra' => ['attendre']],
                            'tr' => ['sentence' => 'sandviç hazır', 'correct' => ['sandviç', 'hazır'], 'extra' => []],
                        'ru' => ['sentence' => 'сэндвич готов', 'correct' => ['сэндвич', 'готов'], 'extra' => []],
                        'ar' => ['sentence' => 'شطيرة جاهز', 'correct' => ['شطيرة', 'جاهز'], 'extra' => []],
                        'az' => ['sentence' => 'sendviç hazır', 'correct' => ['sendviç', 'hazır'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['wait', 'for', 'the', 'sandwich'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Esperar el sándwich', 'correct' => ['esperar', 'para', 'el', 'sándwich'], 'extra' => ['listo', 'hamburguesa']],
                            'de' => ['sentence' => 'Auf das Sandwich warten', 'correct' => ['warten', 'für', 'das', 'Sandwich'], 'extra' => ['bereit', 'Burger']],
                            'ja' => ['sentence' => 'サンドイッチを待つ', 'correct' => ['サンドイッチ', 'を', '待つ'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '샌드위치를 기다리다', 'correct' => ['샌드위치를', '기다리다'], 'extra' => ['준비된']],
                            'fr' => ['sentence' => 'Attendre le sandwich', 'correct' => ['attendre', 'pour', 'le', 'sandwich'], 'extra' => ['prêt']],
                            'tr' => ['sentence' => 'sandviçi bekle', 'correct' => ['sandviçi', 'bekle'], 'extra' => []],
                        'ru' => ['sentence' => 'подожди для сэндвич', 'correct' => ['подожди', 'для', 'сэндвич'], 'extra' => []],
                        'ar' => ['sentence' => 'انتظر لأجل شطيرة', 'correct' => ['انتظر', 'لأجل', 'شطيرة'], 'extra' => []],
                        'az' => ['sentence' => 'gözlə üçün sendviç', 'correct' => ['gözlə', 'üçün', 'sendviç'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: How Many Minutes', 5,
                pictures: [['en' => 'Fries', 'img' => 'fries'], ['en' => 'Burger', 'img' => 'burger']],
                plain: [['en' => 'Minutes'], ['en' => 'Fast']],
                phrases: [
                    'a' => [
                        'words' => ['five', 'minutes', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Cinco minutos, por favor', 'correct' => ['cinco', 'minutos', 'por favor'], 'extra' => ['rápido', 'patatas fritas']],
                            'de' => ['sentence' => 'Fünf Minuten, bitte', 'correct' => ['fünf', 'Minuten', 'bitte'], 'extra' => ['schnell', 'Pommes']],
                            'ja' => ['sentence' => '五分お願いします', 'correct' => ['五分', 'お願いします'], 'extra' => ['速い']],
                            'ko' => ['sentence' => '오 분 부탁합니다', 'correct' => ['오', '분', '부탁합니다'], 'extra' => ['빠른']],
                            'fr' => ['sentence' => 'Cinq minutes, s\'il vous plaît', 'correct' => ['cinq', 'minutes', "s'il vous plaît"], 'extra' => ['rapide', 'frites']],
                            'tr' => ['sentence' => 'beş dakika lütfen', 'correct' => ['beş', 'dakika', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'пять минут пожалуйста', 'correct' => ['пять', 'минут', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'خمسة دقائق من فضلك', 'correct' => ['خمسة', 'دقائق', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'beş dəqiqə zəhmət olmasa', 'correct' => ['beş', 'dəqiqə', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['fries', 'fast', 'please'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Patatas fritas rápido, por favor', 'correct' => ['patatas fritas', 'rápido', 'por favor'], 'extra' => ['minutos', 'hamburguesa']],
                            'de' => ['sentence' => 'Pommes schnell, bitte', 'correct' => ['Pommes', 'schnell', 'bitte'], 'extra' => ['Minuten', 'Burger']],
                            'ja' => ['sentence' => 'フライドポテトを速く', 'correct' => ['フライドポテト', 'を', '速く'], 'extra' => ['分']],
                            'ko' => ['sentence' => '감자튀김 빨리', 'correct' => ['감자튀김', '빨리'], 'extra' => ['분']],
                            'fr' => ['sentence' => 'Des frites vite, s\'il vous plaît', 'correct' => ['frites', 'rapide', "s'il vous plaît"], 'extra' => ['minutes']],
                            'tr' => ['sentence' => 'hızlı patates kızartması lütfen', 'correct' => ['hızlı', 'patates', 'kızartması', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'картошка фри быстро пожалуйста', 'correct' => ['картошка фри', 'быстро', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'بطاطا مقلية بسرعة من فضلك', 'correct' => ['بطاطا مقلية', 'بسرعة', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'kartof fri sürətli zəhmət olmasa', 'correct' => ['kartof fri', 'sürətli', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['five', 'minutes', 'for', 'a', 'burger'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cinco minutos por una hamburguesa', 'correct' => ['cinco', 'minutos', 'para', 'una', 'hamburguesa'], 'extra' => ['rápido']],
                            'de' => ['sentence' => 'Fünf Minuten für einen Burger', 'correct' => ['fünf', 'Minuten', 'für', 'einen', 'Burger'], 'extra' => ['schnell']],
                            'ja' => ['sentence' => 'ハンバーガーに五分', 'correct' => ['ハンバーガー', 'に', '五分'], 'extra' => ['速い']],
                            'ko' => ['sentence' => '햄버거를 위해 오 분', 'correct' => ['햄버거를', '위해', '오', '분'], 'extra' => ['빠른']],
                            'fr' => ['sentence' => 'Cinq minutes pour un hamburger', 'correct' => ['cinq', 'minutes', 'pour', 'un', 'hamburger'], 'extra' => ['rapide']],
                            'tr' => ['sentence' => 'bir hamburger için beş dakika', 'correct' => ['bir', 'hamburger', 'için', 'beş', 'dakika'], 'extra' => []],
                        'ru' => ['sentence' => 'пять минут для бургер', 'correct' => ['пять', 'минут', 'для', 'бургер'], 'extra' => []],
                        'ar' => ['sentence' => 'خمسة دقائق لأجل برجر', 'correct' => ['خمسة', 'دقائق', 'لأجل', 'برجر'], 'extra' => []],
                        'az' => ['sentence' => 'beş dəqiqə üçün bir burger', 'correct' => ['beş', 'dəqiqə', 'üçün', 'bir', 'burger'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
