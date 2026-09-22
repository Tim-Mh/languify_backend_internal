<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant10Seeder extends Seeder
{
    private const PICTURES = [
        'Sandwich' => 'sandwich', 'Frites' => 'fries', 'Hamburger' => 'burger',
        'Jus' => 'juice', 'Café' => 'coffee', 'Glace' => 'icecream',
        'Salade' => 'salad', 'Pain' => 'bread',
    ];

    /**
     * French Chapter 3, Unit 10 — fast food and takeaway.
     *
     * The closing unit of the chapter is deliberately the quickest exchange in
     * it: name the food, say whether it is "à emporter" or "sur place", and ask
     * how long. It reuses ordering language from Units 1-3 so the learner
     * finishes the chapter running a whole transaction rather than meeting yet
     * more vocabulary.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Fast Food and Takeaway', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Here or To Go', 1,
                pictures: [['fr' => 'Sandwich', 'img' => 'sandwich'], ['fr' => 'Frites', 'img' => 'fries']],
                plain: [['fr' => 'Emporter'], ['fr' => 'Sur place']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'sandwich', 'à', 'emporter'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A sandwich to take away', 'correct' => ['a', 'sandwich', 'to', 'take away'], 'extra' => ['eat in', 'fries']],
                            'az' => ['sentence' => 'bir sendviç özümlə', 'correct' => ['bir', 'sendviç', 'özümlə'], 'extra' => ['yeyirəm', 'içində', 'kartof fri']],
                            'ar' => ['sentence' => 'شطيرة إلى للخارج', 'correct' => ['شطيرة', 'إلى', 'للخارج'], 'extra' => ['آكل', 'في', 'بطاطا مقلية']],
                            'ru' => ['sentence' => 'сэндвич в с собой', 'correct' => ['сэндвич', 'в', 'с собой'], 'extra' => ['ем', 'картошка фри']],
                            'es' => ['sentence' => 'Un sándwich para llevar', 'correct' => ['un', 'sándwich', 'a', 'para llevar'], 'extra' => ['para tomar aquí', 'patatas fritas']],
                            'de' => ['sentence' => 'Ein Sandwich zum Mitnehmen', 'correct' => ['ein', 'Sandwich', 'zu', 'zum Mitnehmen'], 'extra' => ['zum Hieressen', 'Pommes']],
                            'ja' => ['sentence' => '持ち帰りのサンドイッチ', 'correct' => ['持ち帰り', 'の', 'サンドイッチ'], 'extra' => ['店内で']],
                            'ko' => ['sentence' => '포장 샌드위치', 'correct' => ['포장', '샌드위치'], 'extra' => ['매장에서']],
                            'tr' => ['sentence' => 'paket bir sandviç', 'correct' => ['paket', 'bir', 'sandviç'], 'extra' => ['burada ye', 'patates kızartması']],
                        ],
                    ],
                    'b' => [
                        'words' => ['des', 'frites', 'sur place'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Fries to eat in', 'correct' => ['some', 'fries', 'eat in'], 'extra' => ['take away', 'sandwich']],
                            'az' => ['sentence' => 'bir az kartof fri yeyirəm içində', 'correct' => ['bir az', 'kartof fri', 'yeyirəm', 'içində'], 'extra' => ['özümlə', 'sendviç']],
                            'ar' => ['sentence' => 'بعض بطاطا مقلية آكل في', 'correct' => ['بعض', 'بطاطا مقلية', 'آكل', 'في'], 'extra' => ['للخارج', 'شطيرة']],
                            'ru' => ['sentence' => 'немного картошка фри ем в', 'correct' => ['немного', 'картошка фри', 'ем', 'в'], 'extra' => ['с собой', 'сэндвич']],
                            'es' => ['sentence' => 'Patatas fritas para tomar aquí', 'correct' => ['unas', 'patatas fritas', 'para tomar aquí'], 'extra' => ['para llevar', 'sándwich']],
                            'de' => ['sentence' => 'Pommes zum Hieressen', 'correct' => ['einige', 'Pommes', 'zum Hieressen'], 'extra' => ['zum Mitnehmen', 'Sandwich']],
                            'ja' => ['sentence' => '店内でフライドポテト', 'correct' => ['店内で', 'フライドポテト'], 'extra' => ['持ち帰り']],
                            'ko' => ['sentence' => '매장에서 감자튀김', 'correct' => ['매장에서', '감자튀김'], 'extra' => ['포장']],
                            'tr' => ['sentence' => 'burada yemek için patates kızartması', 'correct' => ['burada', 'yemek', 'için', 'patates', 'kızartması'], 'extra' => ['paket', 'sandviç']],
                        ],
                    ],
                    'c' => [
                        'words' => ['emporter', 'un', 'sandwich', 'et', 'des', 'frites'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To take away a sandwich and fries', 'correct' => ['take away', 'a', 'sandwich', 'and', 'some', 'fries'], 'extra' => ['eat in']],
                            'az' => ['sentence' => 'özümlə bir sendviç və bir az kartof fri', 'correct' => ['özümlə', 'bir', 'sendviç', 'və', 'bir az', 'kartof fri'], 'extra' => ['yeyirəm', 'içində']],
                            'ar' => ['sentence' => 'للخارج شطيرة و بعض بطاطا مقلية', 'correct' => ['للخارج', 'شطيرة', 'و', 'بعض', 'بطاطا مقلية'], 'extra' => ['آكل', 'في']],
                            'ru' => ['sentence' => 'с собой сэндвич и немного картошка фри', 'correct' => ['с собой', 'сэндвич', 'и', 'немного', 'картошка фри'], 'extra' => ['ем', 'в']],
                            'es' => ['sentence' => 'Llevar un sándwich y patatas fritas', 'correct' => ['para llevar', 'un', 'sándwich', 'y', 'unas', 'patatas fritas'], 'extra' => ['para tomar aquí']],
                            'de' => ['sentence' => 'Ein Sandwich und Pommes mitnehmen', 'correct' => ['zum Mitnehmen', 'ein', 'Sandwich', 'und', 'einige', 'Pommes'], 'extra' => ['zum Hieressen']],
                            'ja' => ['sentence' => 'サンドイッチとフライドポテトを持ち帰り', 'correct' => ['サンドイッチ', 'と', 'フライドポテト', 'を', '持ち帰り'], 'extra' => ['店内で']],
                            'ko' => ['sentence' => '샌드위치와 감자튀김 포장', 'correct' => ['샌드위치와', '감자튀김', '포장'], 'extra' => ['매장에서']],
                            'tr' => ['sentence' => 'bir sandviç ve patates kızartması paket almak', 'correct' => ['bir', 'sandviç', 've', 'patates', 'kızartması', 'paket', 'almak'], 'extra' => ['burada ye']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: A Burger and Fries', 2,
                pictures: [['fr' => 'Hamburger', 'img' => 'burger'], ['fr' => 'Frites', 'img' => 'fries']],
                plain: [['fr' => 'Rapide'], ['fr' => 'Sac']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'hamburger', 'avec', 'des', 'frites'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A burger with fries', 'correct' => ['a', 'burger', 'with', 'some', 'fries'], 'extra' => ['fast', 'bag']],
                            'az' => ['sentence' => 'bir burger ilə bir az kartof fri', 'correct' => ['bir', 'burger', 'ilə', 'bir az', 'kartof fri'], 'extra' => ['sürətli', 'torba']],
                            'ar' => ['sentence' => 'برجر مع بعض بطاطا مقلية', 'correct' => ['برجر', 'مع', 'بعض', 'بطاطا مقلية'], 'extra' => ['بسرعة', 'كيس']],
                            'ru' => ['sentence' => 'бургер с немного картошка фри', 'correct' => ['бургер', 'с', 'немного', 'картошка фри'], 'extra' => ['быстро', 'пакет']],
                            'es' => ['sentence' => 'Una hamburguesa con patatas fritas', 'correct' => ['una', 'hamburguesa', 'con', 'unas', 'patatas fritas'], 'extra' => ['rápido', 'bolsa']],
                            'de' => ['sentence' => 'Ein Burger mit Pommes', 'correct' => ['ein', 'Burger', 'mit', 'einigen', 'Pommes'], 'extra' => ['schnell', 'Tüte']],
                            'ja' => ['sentence' => 'フライドポテト付きハンバーガー', 'correct' => ['フライドポテト', '付き', 'ハンバーガー'], 'extra' => ['速い']],
                            'ko' => ['sentence' => '감자튀김과 햄버거', 'correct' => ['감자튀김과', '햄버거'], 'extra' => ['빠른']],
                            'tr' => ['sentence' => 'patates kızartmalı bir hamburger', 'correct' => ['patates', 'kızartmalı', 'bir', 'hamburger'], 'extra' => ['hızlı', 'poşet']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'hamburger', 'rapide'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A fast burger', 'correct' => ['a', 'fast', 'burger'], 'extra' => ['bag', 'fries']],
                            'az' => ['sentence' => 'bir sürətli burger', 'correct' => ['bir', 'sürətli', 'burger'], 'extra' => ['torba', 'kartof fri']],
                            'ar' => ['sentence' => 'بسرعة برجر', 'correct' => ['بسرعة', 'برجر'], 'extra' => ['كيس', 'بطاطا مقلية']],
                            'ru' => ['sentence' => 'быстро бургер', 'correct' => ['быстро', 'бургер'], 'extra' => ['пакет', 'картошка фри']],
                            'es' => ['sentence' => 'Una hamburguesa rápida', 'correct' => ['una', 'rápido', 'hamburguesa'], 'extra' => ['bolsa', 'patatas fritas']],
                            'de' => ['sentence' => 'Ein schneller Burger', 'correct' => ['ein', 'schnell', 'Burger'], 'extra' => ['Tüte', 'Pommes']],
                            'ja' => ['sentence' => '速いハンバーガー', 'correct' => ['速い', 'ハンバーガー'], 'extra' => ['袋']],
                            'ko' => ['sentence' => '빠른 햄버거', 'correct' => ['빠른', '햄버거'], 'extra' => ['봉투']],
                            'tr' => ['sentence' => 'hızlı bir hamburger', 'correct' => ['hızlı', 'bir', 'hamburger'], 'extra' => ['poşet', 'patates kızartması']],
                        ],
                    ],
                    'c' => [
                        'words' => ['des', 'frites', 'dans', 'un', 'sac'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Fries in a bag', 'correct' => ['some', 'fries', 'in', 'a', 'bag'], 'extra' => ['fast', 'burger']],
                            'az' => ['sentence' => 'bir az kartof fri içində bir torba', 'correct' => ['bir az', 'kartof fri', 'içində', 'bir', 'torba'], 'extra' => ['sürətli', 'burger']],
                            'ar' => ['sentence' => 'بعض بطاطا مقلية في كيس', 'correct' => ['بعض', 'بطاطا مقلية', 'في', 'كيس'], 'extra' => ['بسرعة', 'برجر']],
                            'ru' => ['sentence' => 'немного картошка фри в пакет', 'correct' => ['немного', 'картошка фри', 'в', 'пакет'], 'extra' => ['быстро', 'бургер']],
                            'es' => ['sentence' => 'Patatas fritas en una bolsa', 'correct' => ['unas', 'patatas fritas', 'en', 'una', 'bolsa'], 'extra' => ['rápido', 'hamburguesa']],
                            'de' => ['sentence' => 'Pommes in einer Tüte', 'correct' => ['einige', 'Pommes', 'in', 'einer', 'Tüte'], 'extra' => ['schnell', 'Burger']],
                            'ja' => ['sentence' => '袋の中のフライドポテト', 'correct' => ['袋', 'の', '中', 'の', 'フライドポテト'], 'extra' => ['速い']],
                            'ko' => ['sentence' => '봉투 안의 감자튀김', 'correct' => ['봉투', '안의', '감자튀김'], 'extra' => ['빠른']],
                            'tr' => ['sentence' => 'poşette patates kızartması', 'correct' => ['poşette', 'patates', 'kızartması'], 'extra' => ['hızlı', 'hamburger']],
                        ],
                    ],
                ],
            ),
            $builder->lesson("Lesson 3: The Children's Menu", 3,
                pictures: [['fr' => 'Jus', 'img' => 'juice'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Enfant'], ['fr' => 'Commande']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'menu', 'enfant'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => "A children's menu", 'correct' => ['a', 'menu', 'child'], 'extra' => ['order', 'juice']],
                            'az' => ['sentence' => 'bir menyu uşaq', 'correct' => ['bir', 'menyu', 'uşaq'], 'extra' => ['sifariş', 'şirə']],
                            'ar' => ['sentence' => 'قائمة الطعام طفل', 'correct' => ['قائمة الطعام', 'طفل'], 'extra' => ['طلب', 'عصير']],
                            'ru' => ['sentence' => 'меню ребёнок', 'correct' => ['меню', 'ребёнок'], 'extra' => ['заказ', 'сок']],
                            'es' => ['sentence' => 'Un menú infantil', 'correct' => ['un', 'menú', 'infantil'], 'extra' => ['pedido', 'zumo']],
                            'de' => ['sentence' => 'Ein Kindermenü', 'correct' => ['ein', 'Menü', 'Kind'], 'extra' => ['Bestellung', 'Saft']],
                            'ja' => ['sentence' => '子供メニュー', 'correct' => ['子供', 'メニュー'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '어린이 메뉴', 'correct' => ['어린이', '메뉴'], 'extra' => ['주문']],
                            'tr' => ['sentence' => 'bir çocuk menüsü', 'correct' => ['bir', 'çocuk', 'menüsü'], 'extra' => ['sipariş', 'meyve suyu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['ma', 'commande', 'avec', 'un', 'jus'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My order with a juice', 'correct' => ['my', 'order', 'with', 'a', 'juice'], 'extra' => ['child', 'coffee']],
                            'az' => ['sentence' => 'mənim sifariş ilə bir şirə', 'correct' => ['mənim', 'sifariş', 'ilə', 'bir', 'şirə'], 'extra' => ['uşaq', 'qəhvə']],
                            'ar' => ['sentence' => 'طلب مع عصير', 'correct' => ['طلب', 'مع', 'عصير'], 'extra' => ['طفل', 'قهوة']],
                            'ru' => ['sentence' => 'мой заказ с сок', 'correct' => ['мой', 'заказ', 'с', 'сок'], 'extra' => ['ребёнок', 'кофе']],
                            'es' => ['sentence' => 'Mi pedido con un zumo', 'correct' => ['mi', 'pedido', 'con', 'un', 'zumo'], 'extra' => ['niño', 'café']],
                            'de' => ['sentence' => 'Meine Bestellung mit einem Saft', 'correct' => ['meine', 'Bestellung', 'mit', 'einem', 'Saft'], 'extra' => ['Kind', 'Kaffee']],
                            'ja' => ['sentence' => 'ジュース付きの私の注文', 'correct' => ['ジュース', '付き', 'の', '私の', '注文'], 'extra' => ['子供']],
                            'ko' => ['sentence' => '주스와 함께 제 주문', 'correct' => ['주스와', '함께', '제', '주문'], 'extra' => ['아이']],
                            'tr' => ['sentence' => 'meyve sulu siparişim', 'correct' => ['meyve', 'sulu', 'siparişim'], 'extra' => ['çocuk', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'café', 'et', 'un', 'jus'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee and a juice', 'correct' => ['a', 'coffee', 'and', 'a', 'juice'], 'extra' => ['order', 'child']],
                            'az' => ['sentence' => 'bir qəhvə və bir şirə', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'şirə'], 'extra' => ['sifariş', 'uşaq']],
                            'ar' => ['sentence' => 'قهوة و عصير', 'correct' => ['قهوة', 'و', 'عصير'], 'extra' => ['طلب', 'طفل']],
                            'ru' => ['sentence' => 'кофе и сок', 'correct' => ['кофе', 'и', 'сок'], 'extra' => ['заказ', 'ребёнок']],
                            'es' => ['sentence' => 'Un café y un zumo', 'correct' => ['un', 'café', 'y', 'un', 'zumo'], 'extra' => ['pedido', 'niño']],
                            'de' => ['sentence' => 'Ein Kaffee und ein Saft', 'correct' => ['ein', 'Kaffee', 'und', 'ein', 'Saft'], 'extra' => ['Bestellung', 'Kind']],
                            'ja' => ['sentence' => 'コーヒーとジュース', 'correct' => ['コーヒー', 'と', 'ジュース'], 'extra' => ['注文']],
                            'ko' => ['sentence' => '커피와 주스', 'correct' => ['커피와', '주스'], 'extra' => ['주문']],
                            'tr' => ['sentence' => 'bir kahve ve bir meyve suyu', 'correct' => ['bir', 'kahve', 've', 'bir', 'meyve', 'suyu'], 'extra' => ['sipariş', 'çocuk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Waiting for It', 4,
                pictures: [['fr' => 'Sandwich', 'img' => 'sandwich'], ['fr' => 'Hamburger', 'img' => 'burger']],
                plain: [['fr' => 'Attendre'], ['fr' => 'Prêt']],
                phrases: [
                    'a' => [
                        'words' => ['attendre', 'un', 'hamburger'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To wait for a burger', 'correct' => ['to wait', 'a', 'burger'], 'extra' => ['ready', 'sandwich']],
                            'az' => ['sentence' => 'gözləmək bir burger', 'correct' => ['gözləmək', 'bir', 'burger'], 'extra' => ['hazır', 'sendviç']],
                            'ar' => ['sentence' => 'الانتظار برجر', 'correct' => ['الانتظار', 'برجر'], 'extra' => ['جاهز', 'شطيرة']],
                            'ru' => ['sentence' => 'ждать бургер', 'correct' => ['ждать', 'бургер'], 'extra' => ['готов', 'сэндвич']],
                            'es' => ['sentence' => 'Esperar una hamburguesa', 'correct' => ['esperar', 'una', 'hamburguesa'], 'extra' => ['listo', 'sándwich']],
                            'de' => ['sentence' => 'Auf einen Burger warten', 'correct' => ['warten', 'einen', 'Burger'], 'extra' => ['fertig', 'Sandwich']],
                            'ja' => ['sentence' => 'ハンバーガーを待つ', 'correct' => ['ハンバーガー', 'を', '待つ'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '햄버거를 기다리다', 'correct' => ['햄버거를', '기다리다'], 'extra' => ['준비된']],
                            'tr' => ['sentence' => 'bir hamburger beklemek', 'correct' => ['bir', 'hamburger', 'beklemek'], 'extra' => ['hazır', 'sandviç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'sandwich', 'est', 'prêt'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The sandwich is ready', 'correct' => ['the', 'sandwich', 'is', 'ready'], 'extra' => ['to wait', 'burger']],
                            'az' => ['sentence' => 'sendviç hazır', 'correct' => ['sendviç', 'hazır'], 'extra' => ['gözləmək', 'burger']],
                            'ar' => ['sentence' => 'شطيرة جاهز', 'correct' => ['شطيرة', 'جاهز'], 'extra' => ['الانتظار', 'برجر']],
                            'ru' => ['sentence' => 'сэндвич готов', 'correct' => ['сэндвич', 'готов'], 'extra' => ['ждать', 'бургер']],
                            'es' => ['sentence' => 'El sándwich está listo', 'correct' => ['el', 'sándwich', 'está', 'listo'], 'extra' => ['esperar', 'hamburguesa']],
                            'de' => ['sentence' => 'Das Sandwich ist fertig', 'correct' => ['das', 'Sandwich', 'ist', 'fertig'], 'extra' => ['warten', 'Burger']],
                            'ja' => ['sentence' => 'サンドイッチは準備ができています', 'correct' => ['サンドイッチ', 'は', '準備', 'が', 'で', 'きて', 'います'], 'extra' => ['待つ']],
                            'ko' => ['sentence' => '샌드위치는 준비되었습니다', 'correct' => ['샌드위치는', '준비되었습니다'], 'extra' => ['기다리다']],
                            'tr' => ['sentence' => 'sandviç hazır', 'correct' => ['sandviç', 'hazır'], 'extra' => ['beklemek', 'hamburger']],
                        ],
                    ],
                    'c' => [
                        'words' => ['attendre', 'le', 'sandwich', 'et', 'le', 'hamburger'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To wait for the sandwich and the burger', 'correct' => ['to wait', 'the', 'sandwich', 'and', 'the', 'burger'], 'extra' => ['ready']],
                            'az' => ['sentence' => 'gözləmək sendviç və burger', 'correct' => ['gözləmək', 'sendviç', 'və', 'burger'], 'extra' => ['hazır']],
                            'ar' => ['sentence' => 'الانتظار شطيرة و برجر', 'correct' => ['الانتظار', 'شطيرة', 'و', 'برجر'], 'extra' => ['جاهز']],
                            'ru' => ['sentence' => 'ждать сэндвич и бургер', 'correct' => ['ждать', 'сэндвич', 'и', 'бургер'], 'extra' => ['готов']],
                            'es' => ['sentence' => 'Esperar el sándwich y la hamburguesa', 'correct' => ['esperar', 'el', 'sándwich', 'y', 'la', 'hamburguesa'], 'extra' => ['listo']],
                            'de' => ['sentence' => 'Auf das Sandwich und den Burger warten', 'correct' => ['warten', 'das', 'Sandwich', 'und', 'den', 'Burger'], 'extra' => ['fertig']],
                            'ja' => ['sentence' => 'サンドイッチとハンバーガーを待つ', 'correct' => ['サンドイッチ', 'と', 'ハンバーガー', 'を', '待つ'], 'extra' => ['準備ができた']],
                            'ko' => ['sentence' => '샌드위치와 햄버거를 기다리다', 'correct' => ['샌드위치와', '햄버거를', '기다리다'], 'extra' => ['준비된']],
                            'tr' => ['sentence' => 'sandviçi ve hamburgeri beklemek', 'correct' => ['sandviçi', 've', 'hamburgeri', 'beklemek'], 'extra' => ['hazır']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: How Many Minutes', 5,
                pictures: [['fr' => 'Frites', 'img' => 'fries'], ['fr' => 'Hamburger', 'img' => 'burger']],
                plain: [['fr' => 'Minutes'], ['fr' => 'Vite']],
                phrases: [
                    'a' => [
                        'words' => ['cinq', 'minutes', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Five minutes, please', 'correct' => ['five', 'minutes', 'please'], 'extra' => ['quickly', 'fries']],
                            'az' => ['sentence' => 'beş dəqiqə zəhmət olmasa', 'correct' => ['beş', 'dəqiqə', 'zəhmət olmasa'], 'extra' => ['tez', 'kartof fri']],
                            'ar' => ['sentence' => 'خمسة دقائق من فضلك', 'correct' => ['خمسة', 'دقائق', 'من فضلك'], 'extra' => ['بسرعة', 'بطاطا مقلية']],
                            'ru' => ['sentence' => 'пять минут пожалуйста', 'correct' => ['пять', 'минут', 'пожалуйста'], 'extra' => ['быстро', 'картошка фри']],
                            'es' => ['sentence' => 'Cinco minutos, por favor', 'correct' => ['cinco', 'minutos', 'por favor'], 'extra' => ['rápidamente', 'patatas fritas']],
                            'de' => ['sentence' => 'Fünf Minuten, bitte', 'correct' => ['fünf', 'Minuten', 'bitte'], 'extra' => ['schnell', 'Pommes']],
                            'ja' => ['sentence' => '五分お願いします', 'correct' => ['五分', 'お願いします'], 'extra' => ['速く']],
                            'ko' => ['sentence' => '오 분 부탁합니다', 'correct' => ['오', '분', '부탁합니다'], 'extra' => ['빨리']],
                            'tr' => ['sentence' => 'beş dakika lütfen', 'correct' => ['beş', 'dakika', 'lütfen'], 'extra' => ['hızlıca', 'patates kızartması']],
                        ],
                    ],
                    'b' => [
                        'words' => ['des', 'frites', 'vite'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Fries quickly', 'correct' => ['some', 'fries', 'quickly'], 'extra' => ['minutes', 'burger']],
                            'az' => ['sentence' => 'bir az kartof fri tez', 'correct' => ['bir az', 'kartof fri', 'tez'], 'extra' => ['dəqiqə', 'burger']],
                            'ar' => ['sentence' => 'بعض بطاطا مقلية بسرعة', 'correct' => ['بعض', 'بطاطا مقلية', 'بسرعة'], 'extra' => ['دقائق', 'برجر']],
                            'ru' => ['sentence' => 'немного картошка фри быстро', 'correct' => ['немного', 'картошка фри', 'быстро'], 'extra' => ['минут', 'бургер']],
                            'es' => ['sentence' => 'Patatas fritas rápidamente', 'correct' => ['unas', 'patatas fritas', 'rápidamente'], 'extra' => ['minutos', 'hamburguesa']],
                            'de' => ['sentence' => 'Pommes schnell', 'correct' => ['einige', 'Pommes', 'schnell'], 'extra' => ['Minuten', 'Burger']],
                            'ja' => ['sentence' => 'フライドポテトを速く', 'correct' => ['フライドポテト', 'を', '速く'], 'extra' => ['分']],
                            'ko' => ['sentence' => '감자튀김 빨리', 'correct' => ['감자튀김', '빨리'], 'extra' => ['분']],
                            'tr' => ['sentence' => 'hızlıca patates kızartması', 'correct' => ['hızlıca', 'patates', 'kızartması'], 'extra' => ['dakika', 'hamburger']],
                        ],
                    ],
                    'c' => [
                        'words' => ['attendre', 'cinq', 'minutes', 'pour', 'un', 'hamburger'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To wait five minutes for a burger', 'correct' => ['to wait', 'five', 'minutes', 'for', 'a', 'burger'], 'extra' => ['quickly']],
                            'az' => ['sentence' => 'gözləmək beş dəqiqə üçün bir burger', 'correct' => ['gözləmək', 'beş', 'dəqiqə', 'üçün', 'bir', 'burger'], 'extra' => ['tez']],
                            'ar' => ['sentence' => 'الانتظار خمسة دقائق لأجل برجر', 'correct' => ['الانتظار', 'خمسة', 'دقائق', 'لأجل', 'برجر'], 'extra' => ['بسرعة']],
                            'ru' => ['sentence' => 'ждать пять минут для бургер', 'correct' => ['ждать', 'пять', 'минут', 'для', 'бургер'], 'extra' => ['быстро']],
                            'es' => ['sentence' => 'Esperar cinco minutos por una hamburguesa', 'correct' => ['esperar', 'cinco', 'minutos', 'para', 'una', 'hamburguesa'], 'extra' => ['rápidamente']],
                            'de' => ['sentence' => 'Fünf Minuten auf einen Burger warten', 'correct' => ['warten', 'fünf', 'Minuten', 'für', 'einen', 'Burger'], 'extra' => ['schnell']],
                            'ja' => ['sentence' => 'ハンバーガーを五分待つ', 'correct' => ['ハンバーガー', 'を', '五分', '待つ'], 'extra' => ['速く']],
                            'ko' => ['sentence' => '햄버거를 위해 오 분 기다리다', 'correct' => ['햄버거를', '위해', '오', '분', '기다리다'], 'extra' => ['빨리']],
                            'tr' => ['sentence' => 'bir hamburger için beş dakika beklemek', 'correct' => ['bir', 'hamburger', 'için', 'beş', 'dakika', 'beklemek'], 'extra' => ['hızlıca']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
