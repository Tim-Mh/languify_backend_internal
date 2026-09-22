<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket06Seeder extends Seeder
{
    private const PICTURES = [
        'Boîte' => 'box', 'Bouteille' => 'bottle', 'Balance' => 'scale', 'Jus' => 'juice',
        'Eau' => 'water', 'Sucre' => 'sugar', 'Chariot' => 'cart', 'Pomme' => 'apple',
    ];

    /**
     * French Chapter 4, Unit 6 — how much and in what.
     *
     * French forces a quantity word in front of almost everything you buy
     * ("un litre de", "une boîte de"), so this unit drills the container-plus-de
     * pattern until it is automatic, rather than teaching the units abstractly.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Quantities and Packaging', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Box and A Bottle', 1,
                pictures: [['fr' => 'Boîte', 'img' => 'box'], ['fr' => 'Bouteille', 'img' => 'bottle']],
                plain: [['fr' => 'Litre'], ['fr' => 'Jus']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'litre', 'de', 'jus'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A litre of juice', 'correct' => ['a', 'litre', 'of', 'juice'], 'extra' => ['box', 'bottle']],
                            'az' => ['sentence' => 'bir litr şirə', 'correct' => ['bir', 'litr', 'şirə'], 'extra' => ['qutu', 'şüşə']],
                            'ar' => ['sentence' => 'لتر عصير', 'correct' => ['لتر', 'عصير'], 'extra' => ['علبة', 'زجاجة']],
                            'ru' => ['sentence' => 'литр сок', 'correct' => ['литр', 'сок'], 'extra' => ['коробка', 'бутылка']],
                            'es' => ['sentence' => 'Un litro de zumo', 'correct' => ['un', 'litro', 'de', 'zumo'], 'extra' => ['caja', 'botella']],
                            'de' => ['sentence' => 'Ein Liter Saft', 'correct' => ['ein', 'Liter', 'von', 'Saft'], 'extra' => ['Schachtel', 'Flasche']],
                            'ja' => ['sentence' => 'ジュース一リットル', 'correct' => ['ジュース', '一', 'リットル'], 'extra' => ['箱', 'ボトル']],
                            'ko' => ['sentence' => '주스 일 리터', 'correct' => ['주스', '일', '리터'], 'extra' => ['상자', '병']],
                            'tr' => ['sentence' => 'bir litre meyve suyu', 'correct' => ['bir', 'litre', 'meyve', 'suyu'], 'extra' => ['kutu', 'şişe']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'boîte', 'et', 'une', 'bouteille'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A box and a bottle', 'correct' => ['a', 'box', 'and', 'a', 'bottle'], 'extra' => ['litre', 'juice']],
                            'az' => ['sentence' => 'bir qutu və bir şüşə', 'correct' => ['bir', 'qutu', 'və', 'bir', 'şüşə'], 'extra' => ['litr', 'şirə']],
                            'ar' => ['sentence' => 'علبة و زجاجة', 'correct' => ['علبة', 'و', 'زجاجة'], 'extra' => ['لتر', 'عصير']],
                            'ru' => ['sentence' => 'коробка и бутылка', 'correct' => ['коробка', 'и', 'бутылка'], 'extra' => ['литр', 'сок']],
                            'es' => ['sentence' => 'Una caja y una botella', 'correct' => ['una', 'caja', 'y', 'una', 'botella'], 'extra' => ['litro', 'zumo']],
                            'de' => ['sentence' => 'Eine Schachtel und eine Flasche', 'correct' => ['eine', 'Schachtel', 'und', 'eine', 'Flasche'], 'extra' => ['Liter', 'Saft']],
                            'ja' => ['sentence' => '箱とボトル', 'correct' => ['箱', 'と', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '상자와 병', 'correct' => ['상자와', '병'], 'extra' => ['리터']],
                            'tr' => ['sentence' => 'bir kutu ve bir şişe', 'correct' => ['bir', 'kutu', 've', 'bir', 'şişe'], 'extra' => ['litre', 'meyve suyu']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'bouteille', 'de', 'jus'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A bottle of juice', 'correct' => ['a', 'bottle', 'of', 'juice'], 'extra' => ['litre', 'box']],
                            'az' => ['sentence' => 'bir şüşə şirə', 'correct' => ['bir', 'şüşə', 'şirə'], 'extra' => ['litr', 'qutu']],
                            'ar' => ['sentence' => 'زجاجة عصير', 'correct' => ['زجاجة', 'عصير'], 'extra' => ['لتر', 'علبة']],
                            'ru' => ['sentence' => 'бутылка сок', 'correct' => ['бутылка', 'сок'], 'extra' => ['литр', 'коробка']],
                            'es' => ['sentence' => 'Una botella de zumo', 'correct' => ['una', 'botella', 'de', 'zumo'], 'extra' => ['litro', 'caja']],
                            'de' => ['sentence' => 'Eine Flasche Saft', 'correct' => ['eine', 'Flasche', 'von', 'Saft'], 'extra' => ['Liter', 'Schachtel']],
                            'ja' => ['sentence' => 'ジュースのボトル', 'correct' => ['ジュース', 'の', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '주스 한 병', 'correct' => ['주스', '한', '병'], 'extra' => ['리터']],
                            'tr' => ['sentence' => 'bir şişe meyve suyu', 'correct' => ['bir', 'şişe', 'meyve', 'suyu'], 'extra' => ['litre', 'kutu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: On the Scales', 2,
                pictures: [['fr' => 'Balance', 'img' => 'scale'], ['fr' => 'Pomme', 'img' => 'apple']],
                plain: [['fr' => 'Peser'], ['fr' => 'Gramme']],
                phrases: [
                    'a' => [
                        'words' => ['peser', 'une', 'pomme'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To weigh an apple', 'correct' => ['to weigh', 'an', 'apple'], 'extra' => ['gram', 'scales']],
                            'az' => ['sentence' => 'çəkmək bir alma', 'correct' => ['çəkmək', 'bir', 'alma'], 'extra' => ['qram', 'tərəzi']],
                            'ar' => ['sentence' => 'الوزن تفاحة', 'correct' => ['الوزن', 'تفاحة'], 'extra' => ['غرام', 'ميزان']],
                            'ru' => ['sentence' => 'взвесить яблоко', 'correct' => ['взвесить', 'яблоко'], 'extra' => ['грамм', 'весы']],
                            'es' => ['sentence' => 'Pesar una manzana', 'correct' => ['pesar', 'una', 'manzana'], 'extra' => ['gramo', 'balanza']],
                            'de' => ['sentence' => 'Einen Apfel wiegen', 'correct' => ['einen', 'Apfel', 'wiegen'], 'extra' => ['Gramm', 'Waage']],
                            'ja' => ['sentence' => 'りんごを量る', 'correct' => ['りんご', 'を', '量る'], 'extra' => ['グラム', 'はかり']],
                            'ko' => ['sentence' => '사과의 무게를 재다', 'correct' => ['사과의', '무게를', '재다'], 'extra' => ['그램', '저울']],
                            'tr' => ['sentence' => 'bir elma tartmak', 'correct' => ['bir', 'elma', 'tartmak'], 'extra' => ['gram', 'terazi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'balance', 'et', 'le', 'gramme'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The scales and the gram', 'correct' => ['the', 'scales', 'and', 'the', 'gram'], 'extra' => ['to weigh', 'apple']],
                            'az' => ['sentence' => 'tərəzi və qram', 'correct' => ['tərəzi', 'və', 'qram'], 'extra' => ['çəkmək', 'alma']],
                            'ar' => ['sentence' => 'ميزان و غرام', 'correct' => ['ميزان', 'و', 'غرام'], 'extra' => ['الوزن', 'تفاحة']],
                            'ru' => ['sentence' => 'весы и грамм', 'correct' => ['весы', 'и', 'грамм'], 'extra' => ['взвесить', 'яблоко']],
                            'es' => ['sentence' => 'La balanza y el gramo', 'correct' => ['la', 'balanza', 'y', 'el', 'gramo'], 'extra' => ['pesar', 'manzana']],
                            'de' => ['sentence' => 'Die Waage und das Gramm', 'correct' => ['die', 'Waage', 'und', 'das', 'Gramm'], 'extra' => ['wiegen', 'Apfel']],
                            'ja' => ['sentence' => 'はかりとグラム', 'correct' => ['はかり', 'と', 'グラム'], 'extra' => ['量る']],
                            'ko' => ['sentence' => '저울과 그램', 'correct' => ['저울과', '그램'], 'extra' => ['무게를 재다']],
                            'tr' => ['sentence' => 'terazi ve gram', 'correct' => ['terazi', 've', 'gram'], 'extra' => ['tartmak', 'elma']],
                        ],
                    ],
                    'c' => [
                        'words' => ['peser', 'sur', 'la', 'balance'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To weigh on the scales', 'correct' => ['to weigh', 'on', 'the', 'scales'], 'extra' => ['gram', 'apple']],
                            'az' => ['sentence' => 'çəkmək üzərində tərəzi', 'correct' => ['çəkmək', 'üzərində', 'tərəzi'], 'extra' => ['qram', 'alma']],
                            'ar' => ['sentence' => 'الوزن على ميزان', 'correct' => ['الوزن', 'على', 'ميزان'], 'extra' => ['غرام', 'تفاحة']],
                            'ru' => ['sentence' => 'взвесить на весы', 'correct' => ['взвесить', 'на', 'весы'], 'extra' => ['грамм', 'яблоко']],
                            'es' => ['sentence' => 'Pesar sobre la balanza', 'correct' => ['pesar', 'sobre', 'la', 'balanza'], 'extra' => ['gramo', 'manzana']],
                            'de' => ['sentence' => 'Auf der Waage wiegen', 'correct' => ['auf', 'der', 'Waage', 'wiegen'], 'extra' => ['Gramm', 'Apfel']],
                            'ja' => ['sentence' => 'はかりの上で量る', 'correct' => ['はかり', 'の', '上', 'で', '量る'], 'extra' => ['グラム']],
                            'ko' => ['sentence' => '저울 위에서 무게를 재다', 'correct' => ['저울', '위에서', '무게를', '재다'], 'extra' => ['그램']],
                            'tr' => ['sentence' => 'terazide tartmak', 'correct' => ['terazide', 'tartmak'], 'extra' => ['gram', 'elma']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: A Box of Sugar', 3,
                pictures: [['fr' => 'Sucre', 'img' => 'sugar'], ['fr' => 'Boîte', 'img' => 'box']],
                plain: [['fr' => 'Petit'], ['fr' => 'Grand']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'boîte', 'de', 'sucre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A box of sugar', 'correct' => ['a', 'box', 'of', 'sugar'], 'extra' => ['small', 'big']],
                            'az' => ['sentence' => 'bir qutu şəkər', 'correct' => ['bir', 'qutu', 'şəkər'], 'extra' => ['kiçik', 'böyük']],
                            'ar' => ['sentence' => 'علبة سكر', 'correct' => ['علبة', 'سكر'], 'extra' => ['صغير', 'كبير']],
                            'ru' => ['sentence' => 'коробка сахар', 'correct' => ['коробка', 'сахар'], 'extra' => ['маленький', 'большой']],
                            'es' => ['sentence' => 'Una caja de azúcar', 'correct' => ['una', 'caja', 'de', 'azúcar'], 'extra' => ['pequeño', 'grande']],
                            'de' => ['sentence' => 'Eine Schachtel Zucker', 'correct' => ['eine', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein', 'groß']],
                            'ja' => ['sentence' => '砂糖の箱', 'correct' => ['砂糖', 'の', '箱'], 'extra' => ['小さい', '大きい']],
                            'ko' => ['sentence' => '설탕 한 상자', 'correct' => ['설탕', '한', '상자'], 'extra' => ['작은', '큰']],
                            'tr' => ['sentence' => 'bir kutu şeker', 'correct' => ['bir', 'kutu', 'şeker'], 'extra' => ['küçük', 'büyük']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'petit', 'boîte'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A small box', 'correct' => ['a', 'small', 'box'], 'extra' => ['big', 'sugar']],
                            'az' => ['sentence' => 'bir kiçik qutu', 'correct' => ['bir', 'kiçik', 'qutu'], 'extra' => ['böyük', 'şəkər']],
                            'ar' => ['sentence' => 'صغير علبة', 'correct' => ['صغير', 'علبة'], 'extra' => ['كبير', 'سكر']],
                            'ru' => ['sentence' => 'маленький коробка', 'correct' => ['маленький', 'коробка'], 'extra' => ['большой', 'сахар']],
                            'es' => ['sentence' => 'Una caja pequeña', 'correct' => ['una', 'pequeño', 'caja'], 'extra' => ['grande', 'azúcar']],
                            'de' => ['sentence' => 'Eine kleine Schachtel', 'correct' => ['eine', 'klein', 'Schachtel'], 'extra' => ['groß', 'Zucker']],
                            'ja' => ['sentence' => '小さい箱', 'correct' => ['小さい', '箱'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 상자', 'correct' => ['작은', '상자'], 'extra' => ['큰']],
                            'tr' => ['sentence' => 'küçük bir kutu', 'correct' => ['küçük', 'bir', 'kutu'], 'extra' => ['büyük', 'şeker']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'grand', 'boîte', 'de', 'sucre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A big box of sugar', 'correct' => ['a', 'big', 'box', 'of', 'sugar'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bir böyük qutu şəkər', 'correct' => ['bir', 'böyük', 'qutu', 'şəkər'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'كبير علبة سكر', 'correct' => ['كبير', 'علبة', 'سكر'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'большой коробка сахар', 'correct' => ['большой', 'коробка', 'сахар'], 'extra' => ['маленький']],
                            'es' => ['sentence' => 'Una caja grande de azúcar', 'correct' => ['una', 'caja', 'grande', 'de', 'azúcar'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Eine große Schachtel Zucker', 'correct' => ['eine', 'groß', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '大きい砂糖の箱', 'correct' => ['大きい', '砂糖', 'の', '箱'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '큰 설탕 상자', 'correct' => ['큰', '설탕', '상자'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'büyük bir kutu şeker', 'correct' => ['büyük', 'bir', 'kutu', 'şeker'], 'extra' => ['küçük']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Water by the Litre', 4,
                pictures: [['fr' => 'Eau', 'img' => 'water'], ['fr' => 'Bouteille', 'img' => 'bottle']],
                plain: [['fr' => 'Litre'], ['fr' => 'Deux']],
                phrases: [
                    'a' => [
                        'words' => ['deux', 'litre', "d'eau"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Two litres of water', 'correct' => ['two', 'litre', 'of water'], 'extra' => ['bottle']],
                            'az' => ['sentence' => 'iki litr suyun', 'correct' => ['iki', 'litr', 'suyun'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'اثنان لتر الماء', 'correct' => ['اثنان', 'لتر', 'الماء'], 'extra' => ['زجاجة']],
                            'ru' => ['sentence' => 'два литр воды', 'correct' => ['два', 'литр', 'воды'], 'extra' => ['бутылка']],
                            'es' => ['sentence' => 'Dos litros de agua', 'correct' => ['dos', 'litro', 'de agua'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Zwei Liter Wasser', 'correct' => ['zwei', 'Liter', 'Wasser'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '水二リットル', 'correct' => ['水', '二', 'リットル'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '물 이 리터', 'correct' => ['물', '이', '리터'], 'extra' => ['병']],
                            'tr' => ['sentence' => 'iki litre su', 'correct' => ['iki', 'litre', 'su'], 'extra' => ['şişe']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'bouteille', "d'eau"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A bottle of water', 'correct' => ['a', 'bottle', 'of water'], 'extra' => ['two', 'litre']],
                            'az' => ['sentence' => 'bir şüşə suyun', 'correct' => ['bir', 'şüşə', 'suyun'], 'extra' => ['iki', 'litr']],
                            'ar' => ['sentence' => 'زجاجة الماء', 'correct' => ['زجاجة', 'الماء'], 'extra' => ['اثنان', 'لتر']],
                            'ru' => ['sentence' => 'бутылка воды', 'correct' => ['бутылка', 'воды'], 'extra' => ['два', 'литр']],
                            'es' => ['sentence' => 'Una botella de agua', 'correct' => ['una', 'botella', 'de agua'], 'extra' => ['dos', 'litro']],
                            'de' => ['sentence' => 'Eine Flasche Wasser', 'correct' => ['eine', 'Flasche', 'Wasser'], 'extra' => ['zwei', 'Liter']],
                            'ja' => ['sentence' => '水のボトル', 'correct' => ['水', 'の', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '물 한 병', 'correct' => ['물', '한', '병'], 'extra' => ['리터']],
                            'tr' => ['sentence' => 'bir şişe su', 'correct' => ['bir', 'şişe', 'su'], 'extra' => ['iki', 'litre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'eau', "s'il vous plaît"], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A water, please', 'correct' => ['a', 'water', 'please'], 'extra' => ['two', 'litre']],
                            'az' => ['sentence' => 'bir su zəhmət olmasa', 'correct' => ['bir', 'su', 'zəhmət olmasa'], 'extra' => ['iki', 'litr']],
                            'ar' => ['sentence' => 'ماء من فضلك', 'correct' => ['ماء', 'من فضلك'], 'extra' => ['اثنان', 'لتر']],
                            'ru' => ['sentence' => 'вода пожалуйста', 'correct' => ['вода', 'пожалуйста'], 'extra' => ['два', 'литр']],
                            'es' => ['sentence' => 'Un agua, por favor', 'correct' => ['un', 'agua', 'por favor'], 'extra' => ['dos', 'litro']],
                            'de' => ['sentence' => 'Ein Wasser, bitte', 'correct' => ['ein', 'Wasser', 'bitte'], 'extra' => ['zwei', 'Liter']],
                            'ja' => ['sentence' => '水をお願いします', 'correct' => ['水', 'を', 'お願いします'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '물 부탁합니다', 'correct' => ['물', '부탁합니다'], 'extra' => ['리터']],
                            'tr' => ['sentence' => 'bir su lütfen', 'correct' => ['bir', 'su', 'lütfen'], 'extra' => ['iki', 'litre']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Full Trolley', 5,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Jus', 'img' => 'juice']],
                plain: [['fr' => 'Mettre'], ['fr' => 'Boîte']],
                phrases: [
                    'a' => [
                        'words' => ['mettre', 'une', 'boîte', 'dans', 'le', 'chariot'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To put a box in the trolley', 'correct' => ['to put', 'a', 'box', 'in', 'the', 'trolley'], 'extra' => ['juice']],
                            'az' => ['sentence' => 'qoymaq bir qutu içində araba', 'correct' => ['qoymaq', 'bir', 'qutu', 'içində', 'araba'], 'extra' => ['şirə']],
                            'ar' => ['sentence' => 'وضع علبة في عربة', 'correct' => ['وضع', 'علبة', 'في', 'عربة'], 'extra' => ['عصير']],
                            'ru' => ['sentence' => 'положить коробка в тележка', 'correct' => ['положить', 'коробка', 'в', 'тележка'], 'extra' => ['сок']],
                            'es' => ['sentence' => 'Poner una caja en el carrito', 'correct' => ['poner', 'una', 'caja', 'en', 'el', 'carrito'], 'extra' => ['zumo']],
                            'de' => ['sentence' => 'Eine Schachtel in den Einkaufswagen legen', 'correct' => ['eine', 'Schachtel', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Saft']],
                            'ja' => ['sentence' => '箱をカートに入れる', 'correct' => ['箱', 'を', 'カート', 'に', '入れる'], 'extra' => ['ジュース']],
                            'ko' => ['sentence' => '상자를 카트에 넣다', 'correct' => ['상자를', '카트에', '넣다'], 'extra' => ['주스']],
                            'tr' => ['sentence' => 'arabaya bir kutu koymak', 'correct' => ['arabaya', 'bir', 'kutu', 'koymak'], 'extra' => ['meyve suyu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'boîte', 'de', 'jus'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A box of juice', 'correct' => ['a', 'box', 'of', 'juice'], 'extra' => ['to put', 'trolley']],
                            'az' => ['sentence' => 'bir qutu şirə', 'correct' => ['bir', 'qutu', 'şirə'], 'extra' => ['qoymaq', 'araba']],
                            'ar' => ['sentence' => 'علبة عصير', 'correct' => ['علبة', 'عصير'], 'extra' => ['وضع', 'عربة']],
                            'ru' => ['sentence' => 'коробка сок', 'correct' => ['коробка', 'сок'], 'extra' => ['положить', 'тележка']],
                            'es' => ['sentence' => 'Una caja de zumo', 'correct' => ['una', 'caja', 'de', 'zumo'], 'extra' => ['poner', 'carrito']],
                            'de' => ['sentence' => 'Eine Schachtel Saft', 'correct' => ['eine', 'Schachtel', 'von', 'Saft'], 'extra' => ['legen', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'ジュースの箱', 'correct' => ['ジュース', 'の', '箱'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '주스 한 상자', 'correct' => ['주스', '한', '상자'], 'extra' => ['넣다']],
                            'tr' => ['sentence' => 'bir kutu meyve suyu', 'correct' => ['bir', 'kutu', 'meyve', 'suyu'], 'extra' => ['koymak', 'araba']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mettre', 'du', 'jus', 'dans', 'le', 'chariot'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To put some juice in the trolley', 'correct' => ['to put', 'some', 'juice', 'in', 'the', 'trolley'], 'extra' => ['box']],
                            'az' => ['sentence' => 'qoymaq bir az şirə içində araba', 'correct' => ['qoymaq', 'bir az', 'şirə', 'içində', 'araba'], 'extra' => ['qutu']],
                            'ar' => ['sentence' => 'وضع بعض عصير في عربة', 'correct' => ['وضع', 'بعض', 'عصير', 'في', 'عربة'], 'extra' => ['علبة']],
                            'ru' => ['sentence' => 'положить немного сок в тележка', 'correct' => ['положить', 'немного', 'сок', 'в', 'тележка'], 'extra' => ['коробка']],
                            'es' => ['sentence' => 'Poner zumo en el carrito', 'correct' => ['poner', 'algo de', 'zumo', 'en', 'el', 'carrito'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Etwas Saft in den Einkaufswagen legen', 'correct' => ['etwas', 'Saft', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Schachtel']],
                            'ja' => ['sentence' => 'ジュースをカートに入れる', 'correct' => ['ジュース', 'を', 'カート', 'に', '入れる'], 'extra' => ['箱']],
                            'ko' => ['sentence' => '주스를 카트에 넣다', 'correct' => ['주스를', '카트에', '넣다'], 'extra' => ['상자']],
                            'tr' => ['sentence' => 'arabaya biraz meyve suyu koymak', 'correct' => ['arabaya', 'biraz', 'meyve', 'suyu', 'koymak'], 'extra' => ['kutu']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
