<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket06Seeder extends Seeder
{
    private const PICTURES = [
        'Box' => 'box', 'Bottle' => 'bottle', 'Scales' => 'scale', 'Juice' => 'juice',
        'Water' => 'water', 'Sugar' => 'sugar', 'Trolley' => 'cart', 'Apple' => 'apple',
    ];

    /**
     * English Chapter 4, Unit 6 — how much and in what.
     *
     * English forces a quantity word in front of almost everything you buy
     * ("a litre of", "a box of"), so this unit drills the container-plus-of
     * pattern until it is automatic.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Quantities and Packaging', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Box and A Bottle', 1,
                pictures: [['en' => 'Box', 'img' => 'box'], ['en' => 'Bottle', 'img' => 'bottle']],
                plain: [['en' => 'Litre'], ['en' => 'Juice']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'litre', 'of', 'juice'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un litro de zumo', 'correct' => ['un', 'litro', 'de', 'zumo'], 'extra' => ['caja', 'botella']],
                            'de' => ['sentence' => 'Ein Liter Saft', 'correct' => ['ein', 'Liter', 'von', 'Saft'], 'extra' => ['Schachtel', 'Flasche']],
                            'ja' => ['sentence' => 'ジュース一リットル', 'correct' => ['ジュース', '一', 'リットル'], 'extra' => ['箱']],
                            'ko' => ['sentence' => '주스 일 리터', 'correct' => ['주스', '일', '리터'], 'extra' => ['상자']],
                            'fr' => ['sentence' => 'Un litre de jus', 'correct' => ['un', 'litre', 'de', 'jus'], 'extra' => ['boîte', 'bouteille']],
                            'tr' => ['sentence' => 'bir litre meyve suyu', 'correct' => ['bir', 'litre', 'meyve', 'suyu'], 'extra' => []],
                        'ru' => ['sentence' => 'литр сок', 'correct' => ['литр', 'сок'], 'extra' => []],
                        'ar' => ['sentence' => 'لتر عصير', 'correct' => ['لتر', 'عصير'], 'extra' => []],
                        'az' => ['sentence' => 'bir litr şirə', 'correct' => ['bir', 'litr', 'şirə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'box', 'and', 'a', 'bottle'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una caja y una botella', 'correct' => ['una', 'caja', 'y', 'una', 'botella'], 'extra' => ['litro']],
                            'de' => ['sentence' => 'Eine Schachtel und eine Flasche', 'correct' => ['eine', 'Schachtel', 'und', 'eine', 'Flasche'], 'extra' => ['Liter']],
                            'ja' => ['sentence' => '箱とボトル', 'correct' => ['箱', 'と', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '상자와 병', 'correct' => ['상자와', '병'], 'extra' => ['리터']],
                            'fr' => ['sentence' => 'Une boîte et une bouteille', 'correct' => ['une', 'boîte', 'et', 'une', 'bouteille'], 'extra' => ['litre']],
                            'tr' => ['sentence' => 'bir kutu ve bir şişe', 'correct' => ['bir', 'kutu', 've', 'bir', 'şişe'], 'extra' => []],
                        'ru' => ['sentence' => 'коробка и бутылка', 'correct' => ['коробка', 'и', 'бутылка'], 'extra' => []],
                        'ar' => ['sentence' => 'علبة و زجاجة', 'correct' => ['علبة', 'و', 'زجاجة'], 'extra' => []],
                        'az' => ['sentence' => 'bir qutu və bir şüşə', 'correct' => ['bir', 'qutu', 'və', 'bir', 'şüşə'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'bottle', 'of', 'juice'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una botella de zumo', 'correct' => ['una', 'botella', 'de', 'zumo'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Eine Flasche Saft', 'correct' => ['eine', 'Flasche', 'von', 'Saft'], 'extra' => ['Schachtel']],
                            'ja' => ['sentence' => 'ジュースのボトル', 'correct' => ['ジュース', 'の', 'ボトル'], 'extra' => ['箱']],
                            'ko' => ['sentence' => '주스 한 병', 'correct' => ['주스', '한', '병'], 'extra' => ['상자']],
                            'fr' => ['sentence' => 'Une bouteille de jus', 'correct' => ['une', 'bouteille', 'de', 'jus'], 'extra' => ['boîte']],
                            'tr' => ['sentence' => 'bir şişe meyve suyu', 'correct' => ['bir', 'şişe', 'meyve', 'suyu'], 'extra' => []],
                        'ru' => ['sentence' => 'бутылка сок', 'correct' => ['бутылка', 'сок'], 'extra' => []],
                        'ar' => ['sentence' => 'زجاجة عصير', 'correct' => ['زجاجة', 'عصير'], 'extra' => []],
                        'az' => ['sentence' => 'bir şüşə şirə', 'correct' => ['bir', 'şüşə', 'şirə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: On the Scales', 2,
                pictures: [['en' => 'Scales', 'img' => 'scale'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'To weigh'], ['en' => 'Gram']],
                phrases: [
                    'a' => [
                        'words' => ['to weigh', 'an', 'apple'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Pesar una manzana', 'correct' => ['pesar', 'una', 'manzana'], 'extra' => ['gramo', 'balanza']],
                            'de' => ['sentence' => 'Einen Apfel wiegen', 'correct' => ['einen', 'Apfel', 'wiegen'], 'extra' => ['Gramm', 'Waage']],
                            'ja' => ['sentence' => 'りんごを量る', 'correct' => ['りんご', 'を', '量る'], 'extra' => ['グラム']],
                            'ko' => ['sentence' => '사과의 무게를 재다', 'correct' => ['사과의', '무게를', '재다'], 'extra' => ['그램']],
                            'fr' => ['sentence' => 'Peser une pomme', 'correct' => ['peser', 'une', 'pomme'], 'extra' => ['gramme', 'balance']],
                            'tr' => ['sentence' => 'bir elma tartmak', 'correct' => ['bir', 'elma', 'tartmak'], 'extra' => []],
                        'ru' => ['sentence' => 'взвесить яблоко', 'correct' => ['взвесить', 'яблоко'], 'extra' => []],
                        'ar' => ['sentence' => 'الوزن تفاحة', 'correct' => ['الوزن', 'تفاحة'], 'extra' => []],
                        'az' => ['sentence' => 'çəkmək bir alma', 'correct' => ['çəkmək', 'bir', 'alma'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'scales', 'and', 'the', 'gram'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La balanza y el gramo', 'correct' => ['la', 'balanza', 'y', 'el', 'gramo'], 'extra' => ['pesar', 'manzana']],
                            'de' => ['sentence' => 'Die Waage und das Gramm', 'correct' => ['die', 'Waage', 'und', 'das', 'Gramm'], 'extra' => ['wiegen', 'Apfel']],
                            'ja' => ['sentence' => 'はかりとグラム', 'correct' => ['はかり', 'と', 'グラム'], 'extra' => ['量る']],
                            'ko' => ['sentence' => '저울과 그램', 'correct' => ['저울과', '그램'], 'extra' => ['무게를 재다']],
                            'fr' => ['sentence' => 'La balance et le gramme', 'correct' => ['la', 'balance', 'et', 'le', 'gramme'], 'extra' => ['peser']],
                            'tr' => ['sentence' => 'terazi ve gram', 'correct' => ['terazi', 've', 'gram'], 'extra' => []],
                        'ru' => ['sentence' => 'весы и грамм', 'correct' => ['весы', 'и', 'грамм'], 'extra' => []],
                        'ar' => ['sentence' => 'ميزان و غرام', 'correct' => ['ميزان', 'و', 'غرام'], 'extra' => []],
                        'az' => ['sentence' => 'tərəzi və qram', 'correct' => ['tərəzi', 'və', 'qram'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to weigh', 'on', 'the', 'scales'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Pesar en la balanza', 'correct' => ['pesar', 'sobre', 'la', 'balanza'], 'extra' => ['gramo', 'manzana']],
                            'de' => ['sentence' => 'Auf der Waage wiegen', 'correct' => ['auf', 'der', 'Waage', 'wiegen'], 'extra' => ['Gramm', 'Apfel']],
                            'ja' => ['sentence' => 'はかりの上で量る', 'correct' => ['はかり', 'の', '上', 'で', '量る'], 'extra' => ['グラム']],
                            'ko' => ['sentence' => '저울 위에서 무게를 재다', 'correct' => ['저울', '위에서', '무게를', '재다'], 'extra' => ['그램']],
                            'fr' => ['sentence' => 'Peser sur la balance', 'correct' => ['peser', 'sur', 'la', 'balance'], 'extra' => ['gramme']],
                            'tr' => ['sentence' => 'terazide tartmak', 'correct' => ['terazide', 'tartmak'], 'extra' => []],
                        'ru' => ['sentence' => 'взвесить на весы', 'correct' => ['взвесить', 'на', 'весы'], 'extra' => []],
                        'ar' => ['sentence' => 'الوزن على ميزان', 'correct' => ['الوزن', 'على', 'ميزان'], 'extra' => []],
                        'az' => ['sentence' => 'çəkmək üzərində tərəzi', 'correct' => ['çəkmək', 'üzərində', 'tərəzi'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: A Box of Sugar', 3,
                pictures: [['en' => 'Sugar', 'img' => 'sugar'], ['en' => 'Box', 'img' => 'box']],
                plain: [['en' => 'Small'], ['en' => 'Big']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'box', 'of', 'sugar'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una caja de azúcar', 'correct' => ['una', 'caja', 'de', 'azúcar'], 'extra' => ['pequeño', 'grande']],
                            'de' => ['sentence' => 'Eine Schachtel Zucker', 'correct' => ['eine', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein', 'groß']],
                            'ja' => ['sentence' => '砂糖の箱', 'correct' => ['砂糖', 'の', '箱'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '설탕 한 상자', 'correct' => ['설탕', '한', '상자'], 'extra' => ['작은']],
                            'fr' => ['sentence' => 'Une boîte de sucre', 'correct' => ['une', 'boîte', 'de', 'sucre'], 'extra' => ['petit', 'grand']],
                            'tr' => ['sentence' => 'bir kutu şeker', 'correct' => ['bir', 'kutu', 'şeker'], 'extra' => []],
                        'ru' => ['sentence' => 'коробка сахар', 'correct' => ['коробка', 'сахар'], 'extra' => []],
                        'ar' => ['sentence' => 'علبة سكر', 'correct' => ['علبة', 'سكر'], 'extra' => []],
                        'az' => ['sentence' => 'bir qutu şəkər', 'correct' => ['bir', 'qutu', 'şəkər'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'small', 'box'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una caja pequeña', 'correct' => ['una', 'pequeño', 'caja'], 'extra' => ['grande', 'azúcar']],
                            'de' => ['sentence' => 'Eine kleine Schachtel', 'correct' => ['eine', 'klein', 'Schachtel'], 'extra' => ['groß', 'Zucker']],
                            'ja' => ['sentence' => '小さい箱', 'correct' => ['小さい', '箱'], 'extra' => ['大きい']],
                            'ko' => ['sentence' => '작은 상자', 'correct' => ['작은', '상자'], 'extra' => ['큰']],
                            'fr' => ['sentence' => 'Une petite boîte', 'correct' => ['une', 'boîte', 'petit'], 'extra' => ['grand']],
                            'tr' => ['sentence' => 'küçük bir kutu', 'correct' => ['küçük', 'bir', 'kutu'], 'extra' => []],
                        'ru' => ['sentence' => 'маленький коробка', 'correct' => ['маленький', 'коробка'], 'extra' => []],
                        'ar' => ['sentence' => 'صغير علبة', 'correct' => ['صغير', 'علبة'], 'extra' => []],
                        'az' => ['sentence' => 'bir kiçik qutu', 'correct' => ['bir', 'kiçik', 'qutu'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'big', 'box', 'of', 'sugar'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una caja grande de azúcar', 'correct' => ['una', 'caja', 'grande', 'de', 'azúcar'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Eine große Schachtel Zucker', 'correct' => ['eine', 'groß', 'Schachtel', 'von', 'Zucker'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '大きい砂糖の箱', 'correct' => ['大きい', '砂糖', 'の', '箱'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '큰 설탕 상자', 'correct' => ['큰', '설탕', '상자'], 'extra' => ['작은']],
                            'fr' => ['sentence' => 'Une grande boîte de sucre', 'correct' => ['une', 'grand', 'boîte', 'de', 'sucre'], 'extra' => ['petit']],
                            'tr' => ['sentence' => 'büyük bir kutu şeker', 'correct' => ['büyük', 'bir', 'kutu', 'şeker'], 'extra' => []],
                        'ru' => ['sentence' => 'большой коробка сахар', 'correct' => ['большой', 'коробка', 'сахар'], 'extra' => []],
                        'ar' => ['sentence' => 'كبير علبة سكر', 'correct' => ['كبير', 'علبة', 'سكر'], 'extra' => []],
                        'az' => ['sentence' => 'bir böyük qutu şəkər', 'correct' => ['bir', 'böyük', 'qutu', 'şəkər'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Water by the Litre', 4,
                pictures: [['en' => 'Water', 'img' => 'water'], ['en' => 'Bottle', 'img' => 'bottle']],
                plain: [['en' => 'Litre'], ['en' => 'Two']],
                phrases: [
                    'a' => [
                        'words' => ['two', 'litres', 'of', 'water'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dos litros de agua', 'correct' => ['dos', 'litro', 'de', 'agua'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Zwei Liter Wasser', 'correct' => ['zwei', 'Liter', 'von', 'Wasser'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '水二リットル', 'correct' => ['水', '二', 'リットル'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '물 이 리터', 'correct' => ['물', '이', '리터'], 'extra' => ['병']],
                            'fr' => ['sentence' => "Deux litres d'eau", 'correct' => ['deux', 'litre', 'de', 'eau'], 'extra' => ['bouteille']],
                            'tr' => ['sentence' => 'iki litre su', 'correct' => ['iki', 'litre', 'su'], 'extra' => []],
                        'ru' => ['sentence' => 'два литров вода', 'correct' => ['два', 'литров', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'اثنان لترات ماء', 'correct' => ['اثنان', 'لترات', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'iki litr su', 'correct' => ['iki', 'litr', 'su'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'bottle', 'of', 'water'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una botella de agua', 'correct' => ['una', 'botella', 'de', 'agua'], 'extra' => ['dos', 'litro']],
                            'de' => ['sentence' => 'Eine Flasche Wasser', 'correct' => ['eine', 'Flasche', 'von', 'Wasser'], 'extra' => ['zwei', 'Liter']],
                            'ja' => ['sentence' => '水のボトル', 'correct' => ['水', 'の', 'ボトル'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '물 한 병', 'correct' => ['물', '한', '병'], 'extra' => ['리터']],
                            'fr' => ['sentence' => "Une bouteille d'eau", 'correct' => ['une', 'bouteille', 'de', 'eau'], 'extra' => ['litre']],
                            'tr' => ['sentence' => 'bir şişe su', 'correct' => ['bir', 'şişe', 'su'], 'extra' => []],
                        'ru' => ['sentence' => 'бутылка вода', 'correct' => ['бутылка', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'زجاجة ماء', 'correct' => ['زجاجة', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'bir şüşə su', 'correct' => ['bir', 'şüşə', 'su'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['two', 'bottles', 'of', 'water'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dos botellas de agua', 'correct' => ['dos', 'botella', 'de', 'agua'], 'extra' => ['litro']],
                            'de' => ['sentence' => 'Zwei Flaschen Wasser', 'correct' => ['zwei', 'Flasche', 'von', 'Wasser'], 'extra' => ['Liter']],
                            'ja' => ['sentence' => '水二本', 'correct' => ['水', '二本'], 'extra' => ['リットル']],
                            'ko' => ['sentence' => '물 두 병', 'correct' => ['물', '두', '병'], 'extra' => ['리터']],
                            'fr' => ['sentence' => "Deux bouteilles d'eau", 'correct' => ['deux', 'bouteille', 'de', 'eau'], 'extra' => ['litre']],
                            'tr' => ['sentence' => 'iki şişe su', 'correct' => ['iki', 'şişe', 'su'], 'extra' => []],
                        'ru' => ['sentence' => 'два бутылки вода', 'correct' => ['два', 'бутылки', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'اثنان زجاجات ماء', 'correct' => ['اثنان', 'زجاجات', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'iki şüşələr su', 'correct' => ['iki', 'şüşələr', 'su'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Full Trolley', 5,
                pictures: [['en' => 'Trolley', 'img' => 'cart'], ['en' => 'Juice', 'img' => 'juice']],
                plain: [['en' => 'To put'], ['en' => 'Box']],
                phrases: [
                    'a' => [
                        'words' => ['to put', 'a', 'box', 'in', 'the', 'trolley'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Poner una caja en el carrito', 'correct' => ['poner', 'una', 'caja', 'en', 'el', 'carrito'], 'extra' => ['zumo']],
                            'de' => ['sentence' => 'Eine Schachtel in den Einkaufswagen legen', 'correct' => ['eine', 'Schachtel', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Saft']],
                            'ja' => ['sentence' => '箱をカートに入れる', 'correct' => ['箱', 'を', 'カート', 'に', '入れる'], 'extra' => ['ジュース']],
                            'ko' => ['sentence' => '상자를 카트에 넣다', 'correct' => ['상자를', '카트에', '넣다'], 'extra' => ['주스']],
                            'fr' => ['sentence' => 'Mettre une boîte dans le chariot', 'correct' => ['mettre', 'une', 'boîte', 'dans', 'le', 'chariot'], 'extra' => ['jus']],
                            'tr' => ['sentence' => 'arabaya bir kutu koymak', 'correct' => ['arabaya', 'bir', 'kutu', 'koymak'], 'extra' => []],
                        'ru' => ['sentence' => 'положить коробка в тележка', 'correct' => ['положить', 'коробка', 'в', 'тележка'], 'extra' => []],
                        'ar' => ['sentence' => 'وضع علبة في عربة', 'correct' => ['وضع', 'علبة', 'في', 'عربة'], 'extra' => []],
                        'az' => ['sentence' => 'qoymaq bir qutu içində araba', 'correct' => ['qoymaq', 'bir', 'qutu', 'içində', 'araba'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'box', 'of', 'juice'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una caja de zumo', 'correct' => ['una', 'caja', 'de', 'zumo'], 'extra' => ['poner', 'carrito']],
                            'de' => ['sentence' => 'Eine Schachtel Saft', 'correct' => ['eine', 'Schachtel', 'von', 'Saft'], 'extra' => ['legen', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'ジュースの箱', 'correct' => ['ジュース', 'の', '箱'], 'extra' => ['入れる']],
                            'ko' => ['sentence' => '주스 한 상자', 'correct' => ['주스', '한', '상자'], 'extra' => ['넣다']],
                            'fr' => ['sentence' => 'Une boîte de jus', 'correct' => ['une', 'boîte', 'de', 'jus'], 'extra' => ['mettre']],
                            'tr' => ['sentence' => 'bir kutu meyve suyu', 'correct' => ['bir', 'kutu', 'meyve', 'suyu'], 'extra' => []],
                        'ru' => ['sentence' => 'коробка сок', 'correct' => ['коробка', 'сок'], 'extra' => []],
                        'ar' => ['sentence' => 'علبة عصير', 'correct' => ['علبة', 'عصير'], 'extra' => []],
                        'az' => ['sentence' => 'bir qutu şirə', 'correct' => ['bir', 'qutu', 'şirə'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to put', 'juice', 'in', 'the', 'trolley'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Poner zumo en el carrito', 'correct' => ['poner', 'zumo', 'en', 'el', 'carrito'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Saft in den Einkaufswagen legen', 'correct' => ['Saft', 'in', 'den', 'Einkaufswagen', 'legen'], 'extra' => ['Schachtel']],
                            'ja' => ['sentence' => 'ジュースをカートに入れる', 'correct' => ['ジュース', 'を', 'カート', 'に', '入れる'], 'extra' => ['箱']],
                            'ko' => ['sentence' => '주스를 카트에 넣다', 'correct' => ['주스를', '카트에', '넣다'], 'extra' => ['상자']],
                            'fr' => ['sentence' => 'Mettre du jus dans le chariot', 'correct' => ['mettre', 'jus', 'dans', 'le', 'chariot'], 'extra' => ['boîte']],
                            'tr' => ['sentence' => 'arabaya meyve suyu koymak', 'correct' => ['arabaya', 'meyve', 'suyu', 'koymak'], 'extra' => []],
                        'ru' => ['sentence' => 'положить сок в тележка', 'correct' => ['положить', 'сок', 'в', 'тележка'], 'extra' => []],
                        'ar' => ['sentence' => 'وضع عصير في عربة', 'correct' => ['وضع', 'عصير', 'في', 'عربة'], 'extra' => []],
                        'az' => ['sentence' => 'qoymaq şirə içində araba', 'correct' => ['qoymaq', 'şirə', 'içində', 'araba'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
