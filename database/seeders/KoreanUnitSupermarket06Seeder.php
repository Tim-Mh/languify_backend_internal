<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket06Seeder extends Seeder
{
    private const PICTURES = ['상자' => 'box', '병' => 'bottle', '저울' => 'scale', '사과' => 'apple', '설탕' => 'sugar', '물' => 'water', '카트' => 'cart', '주스' => 'juice'];

    /**
     * Korean Supermarket, Unit 6, the Korean twin of the English "Quantities and Packaging" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, '유닛 6: 수량과 포장', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 상자 · 병', 1,
                pictures: [['ko' => '상자', 'img' => 'box'], ['ko' => '병', 'img' => 'bottle']],
                plain: [['ko' => '리터'], ['ko' => '주스']],
                phrases: [
                    'a' => [
                        'words' => ['주스', '일', '리터'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a litre of juice', 'correct' => ['a', 'litre', 'of', 'juice'], 'extra' => ['box']],
                            'az' => ['sentence' => 'bir litr şirə', 'correct' => ['bir', 'litr', 'şirə'], 'extra' => ['qutu']],
                            'ar' => ['sentence' => 'لتر عصير', 'correct' => ['لتر', 'عصير'], 'extra' => ['علبة']],
                            'ru' => ['sentence' => 'литр сок', 'correct' => ['литр', 'сок'], 'extra' => ['коробка']],
                            'es' => ['sentence' => 'Un litro de zumo', 'correct' => ['un', 'litro', 'de', 'zumo'], 'extra' => ['caja', 'botella']],
                            'de' => ['sentence' => 'Ein Liter Saft', 'correct' => ['ein', 'Liter', 'von', 'Saft'], 'extra' => ['Schachtel', 'Flasche']],
                            'fr' => ['sentence' => 'Un litre de jus', 'correct' => ['un', 'litre', 'de', 'jus'], 'extra' => ['boîte', 'bouteille']],
                            'ja' => ['sentence' => 'ジュース一リットル', 'correct' => ['ジュース', '一', 'リットル'], 'extra' => ['箱']],
                            'tr' => ['sentence' => 'bir litre meyve suyu', 'correct' => ['bir', 'litre', 'meyve', 'suyu'], 'extra' => ['kutu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['상자와', '병'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a box and a bottle', 'correct' => ['a', 'box', 'and', 'a', 'bottle'], 'extra' => ['litre']],
                            'az' => ['sentence' => 'bir qutu və bir şüşə', 'correct' => ['bir', 'qutu', 'və', 'bir', 'şüşə'], 'extra' => ['litr']],
                            'ar' => ['sentence' => 'علبة و زجاجة', 'correct' => ['علبة', 'و', 'زجاجة'], 'extra' => ['لتر']],
                            'ru' => ['sentence' => 'коробка и бутылка', 'correct' => ['коробка', 'и', 'бутылка'], 'extra' => ['литр']],
                            'es' => ['sentence' => 'Una caja y una botella', 'correct' => ['una', 'caja', 'y', 'una', 'botella'], 'extra' => ['litro']],
                            'de' => ['sentence' => 'Eine Schachtel und eine Flasche', 'correct' => ['eine', 'Schachtel', 'und', 'eine', 'Flasche'], 'extra' => ['Liter']],
                            'fr' => ['sentence' => 'Une boîte et une bouteille', 'correct' => ['une', 'boîte', 'et', 'une', 'bouteille'], 'extra' => ['litre']],
                            'ja' => ['sentence' => '箱とボトル', 'correct' => ['箱', 'と', 'ボトル'], 'extra' => ['リットル']],
                            'tr' => ['sentence' => 'bir kutu ve bir şişe', 'correct' => ['bir', 'kutu', 've', 'bir', 'şişe'], 'extra' => ['litre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['주스', '한', '병'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a bottle of juice', 'correct' => ['a', 'bottle', 'of', 'juice'], 'extra' => ['box']],
                            'az' => ['sentence' => 'bir şüşə şirə', 'correct' => ['bir', 'şüşə', 'şirə'], 'extra' => ['qutu']],
                            'ar' => ['sentence' => 'زجاجة عصير', 'correct' => ['زجاجة', 'عصير'], 'extra' => ['علبة']],
                            'ru' => ['sentence' => 'бутылка сок', 'correct' => ['бутылка', 'сок'], 'extra' => ['коробка']],
                            'es' => ['sentence' => 'Una botella de zumo', 'correct' => ['una', 'botella', 'de', 'zumo'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Eine Flasche Saft', 'correct' => ['eine', 'Flasche', 'von', 'Saft'], 'extra' => ['Schachtel']],
                            'fr' => ['sentence' => 'Une bouteille de jus', 'correct' => ['une', 'bouteille', 'de', 'jus'], 'extra' => ['boîte']],
                            'ja' => ['sentence' => 'ジュースのボトル', 'correct' => ['ジュース', 'の', 'ボトル'], 'extra' => ['箱']],
                            'tr' => ['sentence' => 'bir şişe meyve suyu', 'correct' => ['bir', 'şişe', 'meyve', 'suyu'], 'extra' => ['kutu']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 저울 · 사과', 2,
                pictures: [['ko' => '저울', 'img' => 'scale'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '무게를 재다'], ['ko' => '그램']],
                phrases: [
                    'a' => [
                        'words' => ['사과의', '무게를', '재세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to weigh an apple', 'correct' => ['to weigh', 'an', 'apple'], 'extra' => ['gram']],
                            'az' => ['sentence' => 'çəkmək bir alma', 'correct' => ['çəkmək', 'bir', 'alma'], 'extra' => ['qram']],
                            'ar' => ['sentence' => 'الوزن تفاحة', 'correct' => ['الوزن', 'تفاحة'], 'extra' => ['غرام']],
                            'ru' => ['sentence' => 'взвесить яблоко', 'correct' => ['взвесить', 'яблоко'], 'extra' => ['грамм']],
                            'es' => ['sentence' => 'Pesar una manzana', 'correct' => ['pesar', 'una', 'manzana'], 'extra' => ['gramo', 'balanza']],
                            'de' => ['sentence' => 'Einen Apfel wiegen', 'correct' => ['einen', 'Apfel', 'wiegen'], 'extra' => ['Gramm', 'Waage']],
                            'fr' => ['sentence' => 'Peser une pomme', 'correct' => ['peser', 'une', 'pomme'], 'extra' => ['gramme', 'balance']],
                            'ja' => ['sentence' => 'りんごを量る', 'correct' => ['りんご', 'を', '量る'], 'extra' => ['グラム']],
                            'tr' => ['sentence' => 'bir elma tartmak', 'correct' => ['bir', 'elma', 'tartmak'], 'extra' => ['gram']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저울과', '그램'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the scales and the gram', 'correct' => ['the', 'scales', 'and', 'the', 'gram'], 'extra' => ['to weigh']],
                            'az' => ['sentence' => 'tərəzi və qram', 'correct' => ['tərəzi', 'və', 'qram'], 'extra' => ['çəkmək']],
                            'ar' => ['sentence' => 'ميزان و غرام', 'correct' => ['ميزان', 'و', 'غرام'], 'extra' => ['الوزن']],
                            'ru' => ['sentence' => 'весы и грамм', 'correct' => ['весы', 'и', 'грамм'], 'extra' => ['взвесить']],
                            'es' => ['sentence' => 'La balanza y el gramo', 'correct' => ['la', 'balanza', 'y', 'el', 'gramo'], 'extra' => ['pesar', 'manzana']],
                            'de' => ['sentence' => 'Die Waage und das Gramm', 'correct' => ['die', 'Waage', 'und', 'das', 'Gramm'], 'extra' => ['wiegen', 'Apfel']],
                            'fr' => ['sentence' => 'La balance et le gramme', 'correct' => ['la', 'balance', 'et', 'le', 'gramme'], 'extra' => ['peser']],
                            'ja' => ['sentence' => 'はかりとグラム', 'correct' => ['はかり', 'と', 'グラム'], 'extra' => ['量る']],
                            'tr' => ['sentence' => 'terazi ve gram', 'correct' => ['terazi', 've', 'gram'], 'extra' => ['tartmak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['저울', '위에서', '무게를', '재세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'to weigh on the scales', 'correct' => ['to weigh', 'on', 'the', 'scales'], 'extra' => ['gram']],
                            'az' => ['sentence' => 'çəkmək üzərində tərəzi', 'correct' => ['çəkmək', 'üzərində', 'tərəzi'], 'extra' => ['qram']],
                            'ar' => ['sentence' => 'الوزن على ميزان', 'correct' => ['الوزن', 'على', 'ميزان'], 'extra' => ['غرام']],
                            'ru' => ['sentence' => 'взвесить на весы', 'correct' => ['взвесить', 'на', 'весы'], 'extra' => ['грамм']],
                            'es' => ['sentence' => 'Pesar en la balanza', 'correct' => ['pesar', 'sobre', 'la', 'balanza'], 'extra' => ['gramo', 'manzana']],
                            'de' => ['sentence' => 'Auf der Waage wiegen', 'correct' => ['auf', 'der', 'Waage', 'wiegen'], 'extra' => ['Gramm', 'Apfel']],
                            'fr' => ['sentence' => 'Peser sur la balance', 'correct' => ['peser', 'sur', 'la', 'balance'], 'extra' => ['gramme']],
                            'ja' => ['sentence' => 'はかりの上で量る', 'correct' => ['はかり', 'の', '上', 'で', '量る'], 'extra' => ['グラム']],
                            'tr' => ['sentence' => 'terazide tartmak', 'correct' => ['terazide', 'tartmak'], 'extra' => ['gram']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 설탕 · 상자', 3,
                pictures: [['ko' => '설탕', 'img' => 'sugar'], ['ko' => '상자', 'img' => 'box']],
                plain: [['ko' => '작은'], ['ko' => '큰']],
                phrases: [
                    'a' => [
                        'words' => ['설탕', '한', '상자'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a box of sugar', 'correct' => ['a', 'box', 'of', 'sugar'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bir qutu şəkər', 'correct' => ['bir', 'qutu', 'şəkər'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'علبة سكر', 'correct' => ['علبة', 'سكر'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'коробка сахар', 'correct' => ['коробка', 'сахар'], 'extra' => ['маленький']],
                            'es' => ['sentence' => 'Una caja de azúcar', 'correct' => ['una', 'caja', 'de', 'azúcar'], 'extra' => ['pequeño', 'grande']],
                            'de' => ['sentence' => 'Eine Schachtel Zucker', 'correct' => ['eine', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein', 'groß']],
                            'fr' => ['sentence' => 'Une boîte de sucre', 'correct' => ['une', 'boîte', 'de', 'sucre'], 'extra' => ['petit', 'grand']],
                            'ja' => ['sentence' => '砂糖の箱', 'correct' => ['砂糖', 'の', '箱'], 'extra' => ['小さい']],
                            'tr' => ['sentence' => 'bir kutu şeker', 'correct' => ['bir', 'kutu', 'şeker'], 'extra' => ['küçük']],
                        ],
                    ],
                    'b' => [
                        'words' => ['작은', '상자'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a small box', 'correct' => ['a', 'small', 'box'], 'extra' => ['big']],
                            'az' => ['sentence' => 'bir kiçik qutu', 'correct' => ['bir', 'kiçik', 'qutu'], 'extra' => ['böyük']],
                            'ar' => ['sentence' => 'صغير علبة', 'correct' => ['صغير', 'علبة'], 'extra' => ['كبير']],
                            'ru' => ['sentence' => 'маленький коробка', 'correct' => ['маленький', 'коробка'], 'extra' => ['большой']],
                            'es' => ['sentence' => 'Una caja pequeña', 'correct' => ['una', 'pequeño', 'caja'], 'extra' => ['grande', 'azúcar']],
                            'de' => ['sentence' => 'Eine kleine Schachtel', 'correct' => ['eine', 'klein', 'Schachtel'], 'extra' => ['groß', 'Zucker']],
                            'fr' => ['sentence' => 'Une petite boîte', 'correct' => ['une', 'boîte', 'petit'], 'extra' => ['grand']],
                            'ja' => ['sentence' => '小さい箱', 'correct' => ['小さい', '箱'], 'extra' => ['大きい']],
                            'tr' => ['sentence' => 'küçük bir kutu', 'correct' => ['küçük', 'bir', 'kutu'], 'extra' => ['büyük']],
                        ],
                    ],
                    'c' => [
                        'words' => ['큰', '설탕', '상자'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a big box of sugar', 'correct' => ['a', 'big', 'box', 'of', 'sugar'], 'extra' => ['small']],
                            'az' => ['sentence' => 'bir böyük qutu şəkər', 'correct' => ['bir', 'böyük', 'qutu', 'şəkər'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'كبير علبة سكر', 'correct' => ['كبير', 'علبة', 'سكر'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'большой коробка сахар', 'correct' => ['большой', 'коробка', 'сахар'], 'extra' => ['маленький']],
                            'es' => ['sentence' => 'Una caja grande de azúcar', 'correct' => ['una', 'caja', 'grande', 'de', 'azúcar'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Eine große Schachtel Zucker', 'correct' => ['eine', 'groß', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein']],
                            'fr' => ['sentence' => 'Une grande boîte de sucre', 'correct' => ['une', 'grand', 'boîte', 'de', 'sucre'], 'extra' => ['petit']],
                            'ja' => ['sentence' => '大きい砂糖の箱', 'correct' => ['大きい', '砂糖', 'の', '箱'], 'extra' => ['小さい']],
                            'tr' => ['sentence' => 'büyük bir kutu şeker', 'correct' => ['büyük', 'bir', 'kutu', 'şeker'], 'extra' => ['küçük']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 물 · 병', 4,
                pictures: [['ko' => '물', 'img' => 'water'], ['ko' => '병', 'img' => 'bottle']],
                plain: [['ko' => '리터'], ['ko' => '둘']],
                phrases: [
                    'a' => [
                        'words' => ['물', '이', '리터'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'two litres of water', 'correct' => ['two', 'litre', 'of', 'water'], 'extra' => ['bottle']],
                            'az' => ['sentence' => 'iki litr su', 'correct' => ['iki', 'litr', 'su'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'اثنان لتر ماء', 'correct' => ['اثنان', 'لتر', 'ماء'], 'extra' => ['زجاجة']],
                            'ru' => ['sentence' => 'два литр вода', 'correct' => ['два', 'литр', 'вода'], 'extra' => ['бутылка']],
                            'es' => ['sentence' => 'Dos litros de agua', 'correct' => ['dos', 'litro', 'de', 'agua'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Zwei Liter Wasser', 'correct' => ['zwei', 'Liter', 'von', 'Wasser'], 'extra' => ['Flasche']],
                            'fr' => ['sentence' => 'Deux litres d\'eau', 'correct' => ['deux', 'litre', 'de', 'eau'], 'extra' => ['bouteille']],
                            'ja' => ['sentence' => '水二リットル', 'correct' => ['水', '二', 'リットル'], 'extra' => ['ボトル']],
                            'tr' => ['sentence' => 'iki litre su', 'correct' => ['iki', 'litre', 'su'], 'extra' => ['şişe']],
                        ],
                    ],
                    'b' => [
                        'words' => ['물', '한', '병'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'a bottle of water', 'correct' => ['a', 'bottle', 'of', 'water'], 'extra' => ['litre']],
                            'az' => ['sentence' => 'bir şüşə su', 'correct' => ['bir', 'şüşə', 'su'], 'extra' => ['litr']],
                            'ar' => ['sentence' => 'زجاجة ماء', 'correct' => ['زجاجة', 'ماء'], 'extra' => ['لتر']],
                            'ru' => ['sentence' => 'бутылка вода', 'correct' => ['бутылка', 'вода'], 'extra' => ['литр']],
                            'es' => ['sentence' => 'Una botella de agua', 'correct' => ['una', 'botella', 'de', 'agua'], 'extra' => ['dos', 'litro']],
                            'de' => ['sentence' => 'Eine Flasche Wasser', 'correct' => ['eine', 'Flasche', 'von', 'Wasser'], 'extra' => ['zwei', 'Liter']],
                            'fr' => ['sentence' => 'Une bouteille d\'eau', 'correct' => ['une', 'bouteille', 'de', 'eau'], 'extra' => ['litre']],
                            'ja' => ['sentence' => '水のボトル', 'correct' => ['水', 'の', 'ボトル'], 'extra' => ['リットル']],
                            'tr' => ['sentence' => 'bir şişe su', 'correct' => ['bir', 'şişe', 'su'], 'extra' => ['litre']],
                        ],
                    ],
                    'c' => [
                        'words' => ['물', '두', '병'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'two bottles of water', 'correct' => ['two', 'bottle', 'of', 'water'], 'extra' => ['litre']],
                            'az' => ['sentence' => 'iki şüşə su', 'correct' => ['iki', 'şüşə', 'su'], 'extra' => ['litr']],
                            'ar' => ['sentence' => 'اثنان زجاجة ماء', 'correct' => ['اثنان', 'زجاجة', 'ماء'], 'extra' => ['لتر']],
                            'ru' => ['sentence' => 'два бутылка вода', 'correct' => ['два', 'бутылка', 'вода'], 'extra' => ['литр']],
                            'es' => ['sentence' => 'Dos botellas de agua', 'correct' => ['dos', 'botella', 'de', 'agua'], 'extra' => ['litro']],
                            'de' => ['sentence' => 'Zwei Flaschen Wasser', 'correct' => ['zwei', 'Flasche', 'von', 'Wasser'], 'extra' => ['Liter']],
                            'fr' => ['sentence' => 'Deux bouteilles d\'eau', 'correct' => ['deux', 'bouteille', 'de', 'eau'], 'extra' => ['litre']],
                            'ja' => ['sentence' => '水二本', 'correct' => ['水', '二本'], 'extra' => ['リットル']],
                            'tr' => ['sentence' => 'iki şişe su', 'correct' => ['iki', 'şişe', 'su'], 'extra' => ['litre']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 카트 · 주스', 5,
                pictures: [['ko' => '카트', 'img' => 'cart'], ['ko' => '주스', 'img' => 'juice']],
                plain: [['ko' => '넣다'], ['ko' => '상자']],
                phrases: [
                    'a' => [
                        'words' => ['상자를', '카트에', '넣으세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to put a box in the trolley', 'correct' => ['to put', 'a', 'box', 'in', 'the', 'trolley'], 'extra' => ['juice']],
                            'az' => ['sentence' => 'qoymaq bir qutu içində araba', 'correct' => ['qoymaq', 'bir', 'qutu', 'içində', 'araba'], 'extra' => ['şirə']],
                            'ar' => ['sentence' => 'وضع علبة في عربة', 'correct' => ['وضع', 'علبة', 'في', 'عربة'], 'extra' => ['عصير']],
                            'ru' => ['sentence' => 'положить коробка в тележка', 'correct' => ['положить', 'коробка', 'в', 'тележка'], 'extra' => ['сок']],
                            'es' => ['sentence' => 'Poner una caja en el carrito', 'correct' => ['poner', 'una', 'caja', 'en', 'el', 'carrito'], 'extra' => ['zumo']],
                            'de' => ['sentence' => 'Eine Schachtel in den Einkaufswagen legen', 'correct' => ['eine', 'Schachtel', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Saft']],
                            'fr' => ['sentence' => 'Mettre une boîte dans le chariot', 'correct' => ['mettre', 'une', 'boîte', 'dans', 'le', 'chariot'], 'extra' => ['jus']],
                            'ja' => ['sentence' => '箱をカートに入れる', 'correct' => ['箱', 'を', 'カート', 'に', '入れる'], 'extra' => ['ジュース']],
                            'tr' => ['sentence' => 'arabaya bir kutu koymak', 'correct' => ['arabaya', 'bir', 'kutu', 'koymak'], 'extra' => ['meyve suyu']],
                        ],
                    ],
                    'b' => [
                        'words' => ['주스', '한', '상자'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a box of juice', 'correct' => ['a', 'box', 'of', 'juice'], 'extra' => ['to put']],
                            'az' => ['sentence' => 'bir qutu şirə', 'correct' => ['bir', 'qutu', 'şirə'], 'extra' => ['qoymaq']],
                            'ar' => ['sentence' => 'علبة عصير', 'correct' => ['علبة', 'عصير'], 'extra' => ['وضع']],
                            'ru' => ['sentence' => 'коробка сок', 'correct' => ['коробка', 'сок'], 'extra' => ['положить']],
                            'es' => ['sentence' => 'Una caja de zumo', 'correct' => ['una', 'caja', 'de', 'zumo'], 'extra' => ['poner', 'carrito']],
                            'de' => ['sentence' => 'Eine Schachtel Saft', 'correct' => ['eine', 'Schachtel', 'von', 'Saft'], 'extra' => ['legen', 'Einkaufswagen']],
                            'fr' => ['sentence' => 'Une boîte de jus', 'correct' => ['une', 'boîte', 'de', 'jus'], 'extra' => ['mettre']],
                            'ja' => ['sentence' => 'ジュースの箱', 'correct' => ['ジュース', 'の', '箱'], 'extra' => ['入れる']],
                            'tr' => ['sentence' => 'bir kutu meyve suyu', 'correct' => ['bir', 'kutu', 'meyve', 'suyu'], 'extra' => ['koymak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['주스를', '카트에', '넣으세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to put juice in the trolley', 'correct' => ['to put', 'juice', 'in', 'the', 'trolley'], 'extra' => ['box']],
                            'az' => ['sentence' => 'qoymaq şirə içində araba', 'correct' => ['qoymaq', 'şirə', 'içində', 'araba'], 'extra' => ['qutu']],
                            'ar' => ['sentence' => 'وضع عصير في عربة', 'correct' => ['وضع', 'عصير', 'في', 'عربة'], 'extra' => ['علبة']],
                            'ru' => ['sentence' => 'положить сок в тележка', 'correct' => ['положить', 'сок', 'в', 'тележка'], 'extra' => ['коробка']],
                            'es' => ['sentence' => 'Poner zumo en el carrito', 'correct' => ['poner', 'zumo', 'en', 'el', 'carrito'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Saft in den Einkaufswagen legen', 'correct' => ['Saft', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Schachtel']],
                            'fr' => ['sentence' => 'Mettre du jus dans le chariot', 'correct' => ['mettre', 'jus', 'dans', 'le', 'chariot'], 'extra' => ['boîte']],
                            'ja' => ['sentence' => 'ジュースをカートに入れる', 'correct' => ['ジュース', 'を', 'カート', 'に', '入れる'], 'extra' => ['箱']],
                            'tr' => ['sentence' => 'arabaya meyve suyu koymak', 'correct' => ['arabaya', 'meyve', 'suyu', 'koymak'], 'extra' => ['kutu']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
