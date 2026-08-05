<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant10Seeder extends Seeder
{
    private const PICTURES = ['샌드위치' => 'sandwich', '감자튀김' => 'fries', '햄버거' => 'burger', '주스' => 'juice', '커피' => 'coffee'];

    /**
     * Korean Restaurant, Unit 10, the Korean twin of the English "Fast Food and Takeaway" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, '유닛 10: 패스트푸드와 포장', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 샌드위치 · 감자튀김', 1,
                pictures: [['ko' => '샌드위치', 'img' => 'sandwich'], ['ko' => '감자튀김', 'img' => 'fries']],
                plain: [['ko' => '포장'], ['ko' => '매장에서']],
                phrases: [
                    'a' => [
                        'words' => ['포장', '샌드위치'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a sandwich takeaway', 'correct' => ['a', 'sandwich', 'takeaway'], 'extra' => ['eat in']],
                            'es' => ['sentence' => 'Un sándwich para llevar', 'correct' => ['un', 'sándwich', 'para llevar'], 'extra' => ['para tomar aquí', 'patatas fritas']],
                            'de' => ['sentence' => 'Ein Sandwich zum Mitnehmen', 'correct' => ['ein', 'Sandwich', 'zum Mitnehmen'], 'extra' => ['zum Hieressen', 'Pommes']],
                            'fr' => ['sentence' => 'Un sandwich à emporter', 'correct' => ['un', 'sandwich', 'à emporter'], 'extra' => ['sur place', 'frites']],
                            'ja' => ['sentence' => '持ち帰りのサンドイッチ', 'correct' => ['持ち帰り', 'の', 'サンドイッチ'], 'extra' => ['店内で']],
                        ],
                    ],
                    'b' => [
                        'words' => ['매장에서', '감자튀김'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'fries eat in', 'correct' => ['fries', 'eat in'], 'extra' => ['takeaway']],
                            'es' => ['sentence' => 'Patatas fritas para tomar aquí', 'correct' => ['patatas fritas', 'para tomar aquí'], 'extra' => ['para llevar', 'sándwich']],
                            'de' => ['sentence' => 'Pommes zum Hieressen', 'correct' => ['Pommes', 'zum Hieressen'], 'extra' => ['zum Mitnehmen', 'Sandwich']],
                            'fr' => ['sentence' => 'Des frites sur place', 'correct' => ['frites', 'sur place'], 'extra' => ['à emporter']],
                            'ja' => ['sentence' => '店内でフライドポテト', 'correct' => ['店内で', 'フライドポテト'], 'extra' => ['持ち帰り']],
                        ],
                    ],
                    'c' => [
                        'words' => ['샌드위치와', '감자튀김', '포장'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a sandwich and fries takeaway', 'correct' => ['a', 'sandwich', 'and', 'fries', 'takeaway'], 'extra' => ['eat in']],
                            'es' => ['sentence' => 'Un sándwich y patatas fritas para llevar', 'correct' => ['un', 'sándwich', 'y', 'patatas fritas', 'para llevar'], 'extra' => ['para tomar aquí']],
                            'de' => ['sentence' => 'Ein Sandwich und Pommes zum Mitnehmen', 'correct' => ['ein', 'Sandwich', 'und', 'Pommes', 'zum Mitnehmen'], 'extra' => ['zum Hieressen']],
                            'fr' => ['sentence' => 'Un sandwich et des frites à emporter', 'correct' => ['un', 'sandwich', 'et', 'frites', 'à emporter'], 'extra' => ['sur place']],
                            'ja' => ['sentence' => '持ち帰りのサンドイッチとフライドポテト', 'correct' => ['持ち帰り', 'の', 'サンドイッチ', 'と', 'フライドポテト'], 'extra' => ['店内で']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 햄버거 · 감자튀김', 2,
                pictures: [['ko' => '햄버거', 'img' => 'burger'], ['ko' => '감자튀김', 'img' => 'fries']],
                plain: [['ko' => '빠른'], ['ko' => '봉투']],
                phrases: [
                    'a' => [
                        'words' => ['감자튀김과', '햄버거'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a burger with fries', 'correct' => ['a', 'burger', 'with', 'fries'], 'extra' => ['fast']],
                            'es' => ['sentence' => 'Una hamburguesa con patatas fritas', 'correct' => ['una', 'hamburguesa', 'con', 'patatas fritas'], 'extra' => ['rápido', 'bolsa']],
                            'de' => ['sentence' => 'Ein Burger mit Pommes', 'correct' => ['ein', 'Burger', 'mit', 'Pommes'], 'extra' => ['schnell', 'Tüte']],
                            'fr' => ['sentence' => 'Un hamburger avec des frites', 'correct' => ['un', 'hamburger', 'avec', 'frites'], 'extra' => ['rapide', 'sac']],
                            'ja' => ['sentence' => 'フライドポテト付きハンバーガー', 'correct' => ['フライドポテト', '付き', 'ハンバーガー'], 'extra' => ['速い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['빠른', '햄버거'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a fast burger', 'correct' => ['a', 'fast', 'burger'], 'extra' => ['bag']],
                            'es' => ['sentence' => 'Una hamburguesa rápida', 'correct' => ['una', 'rápido', 'hamburguesa'], 'extra' => ['bolsa', 'patatas fritas']],
                            'de' => ['sentence' => 'Ein schneller Burger', 'correct' => ['ein', 'schnell', 'Burger'], 'extra' => ['Tüte', 'Pommes']],
                            'fr' => ['sentence' => 'Un hamburger rapide', 'correct' => ['un', 'hamburger', 'rapide'], 'extra' => ['sac']],
                            'ja' => ['sentence' => '速いハンバーガー', 'correct' => ['速い', 'ハンバーガー'], 'extra' => ['袋']],
                        ],
                    ],
                    'c' => [
                        'words' => ['봉투', '안의', '감자튀김'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'fries in a bag', 'correct' => ['fries', 'in', 'a', 'bag'], 'extra' => ['fast']],
                            'es' => ['sentence' => 'Patatas fritas en una bolsa', 'correct' => ['patatas fritas', 'en', 'una', 'bolsa'], 'extra' => ['rápido']],
                            'de' => ['sentence' => 'Pommes in einer Tüte', 'correct' => ['Pommes', 'in', 'einer', 'Tüte'], 'extra' => ['schnell']],
                            'fr' => ['sentence' => 'Des frites dans un sac', 'correct' => ['frites', 'dans', 'un', 'sac'], 'extra' => ['rapide']],
                            'ja' => ['sentence' => '袋の中のフライドポテト', 'correct' => ['袋', 'の', '中', 'の', 'フライドポテト'], 'extra' => ['速い']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 주스 · 커피', 3,
                pictures: [['ko' => '주스', 'img' => 'juice'], ['ko' => '커피', 'img' => 'coffee']],
                plain: [['ko' => '아이'], ['ko' => '주문']],
                phrases: [
                    'a' => [
                        'words' => ['어린이', '메뉴'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a child menu', 'correct' => ['a', 'child', 'menu'], 'extra' => ['order']],
                            'es' => ['sentence' => 'Un menú infantil', 'correct' => ['un', 'menú', 'infantil'], 'extra' => ['pedido', 'zumo']],
                            'de' => ['sentence' => 'Ein Kindermenü', 'correct' => ['ein', 'Kind', 'Menü'], 'extra' => ['Bestellung', 'Saft']],
                            'fr' => ['sentence' => 'Un menu enfant', 'correct' => ['un', 'menu', 'enfant'], 'extra' => ['commande', 'jus']],
                            'ja' => ['sentence' => '子供メニュー', 'correct' => ['子供', 'メニュー'], 'extra' => ['注文']],
                        ],
                    ],
                    'b' => [
                        'words' => ['주스와', '함께', '제', '주문'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'my order with a juice', 'correct' => ['my', 'order', 'with', 'a', 'juice'], 'extra' => ['child']],
                            'es' => ['sentence' => 'Mi pedido con un zumo', 'correct' => ['mi', 'pedido', 'con', 'un', 'zumo'], 'extra' => ['niño']],
                            'de' => ['sentence' => 'Meine Bestellung mit einem Saft', 'correct' => ['meine', 'Bestellung', 'mit', 'einem', 'Saft'], 'extra' => ['Kind']],
                            'fr' => ['sentence' => 'Ma commande avec un jus', 'correct' => ['ma', 'commande', 'avec', 'un', 'jus'], 'extra' => ['enfant']],
                            'ja' => ['sentence' => 'ジュース付きの私の注文', 'correct' => ['ジュース', '付き', 'の', '私の', '注文'], 'extra' => ['子供']],
                        ],
                    ],
                    'c' => [
                        'words' => ['커피와', '주스'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a coffee and a juice', 'correct' => ['a', 'coffee', 'and', 'a', 'juice'], 'extra' => ['order']],
                            'es' => ['sentence' => 'Un café y un zumo', 'correct' => ['un', 'café', 'y', 'un', 'zumo'], 'extra' => ['pedido']],
                            'de' => ['sentence' => 'Ein Kaffee und ein Saft', 'correct' => ['ein', 'Kaffee', 'und', 'ein', 'Saft'], 'extra' => ['Bestellung']],
                            'fr' => ['sentence' => 'Un café et un jus', 'correct' => ['un', 'café', 'et', 'un', 'jus'], 'extra' => ['commande']],
                            'ja' => ['sentence' => 'コーヒーとジュース', 'correct' => ['コーヒー', 'と', 'ジュース'], 'extra' => ['注文']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 샌드위치 · 햄버거', 4,
                pictures: [['ko' => '샌드위치', 'img' => 'sandwich'], ['ko' => '햄버거', 'img' => 'burger']],
                plain: [['ko' => '기다리다'], ['ko' => '준비된']],
                phrases: [
                    'a' => [
                        'words' => ['햄버거를', '기다리세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'wait for a burger', 'correct' => ['wait', 'for', 'a', 'burger'], 'extra' => ['ready']],
                            'es' => ['sentence' => 'Esperar una hamburguesa', 'correct' => ['esperar', 'para', 'una', 'hamburguesa'], 'extra' => ['listo']],
                            'de' => ['sentence' => 'Auf einen Burger warten', 'correct' => ['warten', 'für', 'einen', 'Burger'], 'extra' => ['bereit']],
                            'fr' => ['sentence' => 'Attendre un hamburger', 'correct' => ['attendre', 'pour', 'un', 'hamburger'], 'extra' => ['prêt']],
                            'ja' => ['sentence' => 'ハンバーガーを待つ', 'correct' => ['ハンバーガー', 'を', '待つ'], 'extra' => ['準備ができた']],
                        ],
                    ],
                    'b' => [
                        'words' => ['샌드위치는', '준비되었습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the sandwich is ready', 'correct' => ['the', 'sandwich', 'is', 'ready'], 'extra' => ['wait']],
                            'es' => ['sentence' => 'El sándwich está listo', 'correct' => ['el', 'sándwich', 'está', 'listo'], 'extra' => ['esperar', 'hamburguesa']],
                            'de' => ['sentence' => 'Das Sandwich ist fertig', 'correct' => ['das', 'Sandwich', 'ist', 'bereit'], 'extra' => ['warten', 'Burger']],
                            'fr' => ['sentence' => 'Le sandwich est prêt', 'correct' => ['le', 'sandwich', 'est', 'prêt'], 'extra' => ['attendre']],
                            'ja' => ['sentence' => 'サンドイッチは準備ができています', 'correct' => ['サンドイッチ', 'は', '準備', 'が', 'で', 'きて', 'います'], 'extra' => ['待つ']],
                        ],
                    ],
                    'c' => [
                        'words' => ['샌드위치를', '기다리세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'wait for the sandwich', 'correct' => ['wait', 'for', 'the', 'sandwich'], 'extra' => ['ready']],
                            'es' => ['sentence' => 'Esperar el sándwich', 'correct' => ['esperar', 'para', 'el', 'sándwich'], 'extra' => ['listo', 'hamburguesa']],
                            'de' => ['sentence' => 'Auf das Sandwich warten', 'correct' => ['warten', 'für', 'das', 'Sandwich'], 'extra' => ['bereit', 'Burger']],
                            'fr' => ['sentence' => 'Attendre le sandwich', 'correct' => ['attendre', 'pour', 'le', 'sandwich'], 'extra' => ['prêt']],
                            'ja' => ['sentence' => 'サンドイッチを待つ', 'correct' => ['サンドイッチ', 'を', '待つ'], 'extra' => ['準備ができた']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 감자튀김 · 햄버거', 5,
                pictures: [['ko' => '감자튀김', 'img' => 'fries'], ['ko' => '햄버거', 'img' => 'burger']],
                plain: [['ko' => '분'], ['ko' => '빠른']],
                phrases: [
                    'a' => [
                        'words' => ['오', '분', '부탁합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'five minutes please', 'correct' => ['five', 'minutes', 'please'], 'extra' => ['fast']],
                            'es' => ['sentence' => 'Cinco minutos, por favor', 'correct' => ['cinco', 'minutos', 'por favor'], 'extra' => ['rápido', 'patatas fritas']],
                            'de' => ['sentence' => 'Fünf Minuten, bitte', 'correct' => ['fünf', 'Minuten', 'bitte'], 'extra' => ['schnell', 'Pommes']],
                            'fr' => ['sentence' => 'Cinq minutes, s\'il vous plaît', 'correct' => ['cinq', 'minutes', 's\'il vous plaît'], 'extra' => ['rapide', 'frites']],
                            'ja' => ['sentence' => '五分お願いします', 'correct' => ['五分', 'お願いします'], 'extra' => ['速い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['감자튀김', '빨리'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'fries fast please', 'correct' => ['fries', 'fast', 'please'], 'extra' => ['minutes']],
                            'es' => ['sentence' => 'Patatas fritas rápido, por favor', 'correct' => ['patatas fritas', 'rápido', 'por favor'], 'extra' => ['minutos', 'hamburguesa']],
                            'de' => ['sentence' => 'Pommes schnell, bitte', 'correct' => ['Pommes', 'schnell', 'bitte'], 'extra' => ['Minuten', 'Burger']],
                            'fr' => ['sentence' => 'Des frites vite, s\'il vous plaît', 'correct' => ['frites', 'rapide', 's\'il vous plaît'], 'extra' => ['minutes']],
                            'ja' => ['sentence' => 'フライドポテトを速く', 'correct' => ['フライドポテト', 'を', '速く'], 'extra' => ['分']],
                        ],
                    ],
                    'c' => [
                        'words' => ['햄버거를', '위해', '오', '분'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'five minutes for a burger', 'correct' => ['five', 'minutes', 'for', 'a', 'burger'], 'extra' => ['fast']],
                            'es' => ['sentence' => 'Cinco minutos por una hamburguesa', 'correct' => ['cinco', 'minutos', 'para', 'una', 'hamburguesa'], 'extra' => ['rápido']],
                            'de' => ['sentence' => 'Fünf Minuten für einen Burger', 'correct' => ['fünf', 'Minuten', 'für', 'einen', 'Burger'], 'extra' => ['schnell']],
                            'fr' => ['sentence' => 'Cinq minutes pour un hamburger', 'correct' => ['cinq', 'minutes', 'pour', 'un', 'hamburger'], 'extra' => ['rapide']],
                            'ja' => ['sentence' => 'ハンバーガーに五分', 'correct' => ['ハンバーガー', 'に', '五分'], 'extra' => ['速い']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
