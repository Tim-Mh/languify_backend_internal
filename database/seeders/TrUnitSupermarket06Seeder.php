<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitSupermarket06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Su' => 'water',
        'Süt' => 'milk',
        'Yumurta' => 'egg',
        'Elma' => 'apple',
        'Pirinç' => 'rice',
    ];

    /**
     * Turkish Supermarket Unit 6 - how much, and in what.
     *
     * THE RULE THIS UNIT TEACHES: THE CONTAINER IS A MEASURE WORD TOO.
     *
     * Unit 5 established `bir kilo tavuk` with nothing between the measure and the
     * noun. Containers behave identically:
     *
     *     bir şişe su      a bottle of water
     *     bir kutu süt     a box of milk
     *
     * Same shape, different word, and still no "of". Meeting it twice in two units
     * is deliberate: the pattern is more useful than either word.
     *
     * `çok` and `az` close the unit as the pair that answers "how much" without any
     * number at all.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Quantities and Packaging', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Bottle', 1,
                pictures: [['tr' => 'Su', 'img' => 'water'], ['tr' => 'Süt', 'img' => 'milk']],
                plain: [['tr' => 'Şişe'], ['tr' => 'Kutu']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'şişe', 'su'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A bottle of water', 'correct' => ['a', 'bottle', 'of', 'water'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir şüşə su', 'correct' => ['bir', 'şüşə', 'su'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'زجاجة ماء', 'correct' => ['زجاجة', 'ماء'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'бутылка вода', 'correct' => ['бутылка', 'вода'], 'extra' => ['молоко']],
                            'fr' => ['sentence' => 'Une bouteille d’eau', 'correct' => ['une', 'bouteille', 'd’eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una botella de agua', 'correct' => ['una', 'botella', 'de', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Flasche Wasser', 'correct' => ['eine', 'Flasche', 'Wasser'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '水一本', 'correct' => ['水', '一本'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '물 한 병', 'correct' => ['물', '한', '병'], 'extra' => ['우유']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'şişe', 'su'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Two bottles of water', 'correct' => ['two', 'bottles', 'of', 'water'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'iki şüşələr su', 'correct' => ['iki', 'şüşələr', 'su'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'اثنان زجاجات ماء', 'correct' => ['اثنان', 'زجاجات', 'ماء'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'два бутылки вода', 'correct' => ['два', 'бутылки', 'вода'], 'extra' => ['молоко']],
                            'fr' => ['sentence' => 'Deux bouteilles d’eau', 'correct' => ['deux', 'bouteilles', 'd’eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Dos botellas de agua', 'correct' => ['dos', 'botellas', 'de', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Zwei Flaschen Wasser', 'correct' => ['zwei', 'Flaschen', 'Wasser'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '水二本', 'correct' => ['水', '二本'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '물 두 병', 'correct' => ['물', '두', '병'], 'extra' => ['우유']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'kutu', 'süt'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A box of milk', 'correct' => ['a', 'box', 'of', 'milk'], 'extra' => ['water']],
                            'az' => ['sentence' => 'bir qutu süd', 'correct' => ['bir', 'qutu', 'süd'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'علبة حليب', 'correct' => ['علبة', 'حليب'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'коробка молоко', 'correct' => ['коробка', 'молоко'], 'extra' => ['вода']],
                            'fr' => ['sentence' => 'Une boîte de lait', 'correct' => ['une', 'boîte', 'de', 'lait'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Una caja de leche', 'correct' => ['una', 'caja', 'de', 'leche'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Eine Schachtel Milch', 'correct' => ['eine', 'Schachtel', 'Milch'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳一箱', 'correct' => ['牛乳', '一箱'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유 한 상자', 'correct' => ['우유', '한', '상자'], 'extra' => ['물']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: A Kilo', 2,
                pictures: [['tr' => 'Elma', 'img' => 'apple'], ['tr' => 'Pirinç', 'img' => 'rice']],
                plain: [['tr' => 'Kilo'], ['tr' => 'Şişe']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kilo', 'elma'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A kilo of apples', 'correct' => ['a', 'kilo', 'of', 'apples'], 'extra' => ['rice']],
                            'az' => ['sentence' => 'bir kilo almalar', 'correct' => ['bir', 'kilo', 'almalar'], 'extra' => ['düyü']],
                            'ar' => ['sentence' => 'كيلو تفاح', 'correct' => ['كيلو', 'تفاح'], 'extra' => ['أرز']],
                            'ru' => ['sentence' => 'кило яблоки', 'correct' => ['кило', 'яблоки'], 'extra' => ['рис']],
                            'fr' => ['sentence' => 'Un kilo de pommes', 'correct' => ['un', 'kilo', 'de', 'pommes'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Un kilo de manzanas', 'correct' => ['un', 'kilo', 'de', 'manzanas'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Ein Kilo Äpfel', 'correct' => ['ein', 'Kilo', 'Äpfel'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'りんご一キロ', 'correct' => ['りんご', '一キロ'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '사과 일 킬로', 'correct' => ['사과', '일', '킬로'], 'extra' => ['쌀']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yarım', 'kilo', 'pirinç'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Half a kilo of rice', 'correct' => ['half', 'a', 'kilo', 'of', 'rice'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'yarım bir kilo düyü', 'correct' => ['yarım', 'bir', 'kilo', 'düyü'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'نصف كيلو أرز', 'correct' => ['نصف', 'كيلو', 'أرز'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'половина кило рис', 'correct' => ['половина', 'кило', 'рис'], 'extra' => ['яблоко']],
                            'fr' => ['sentence' => 'Un demi-kilo de riz', 'correct' => ['un demi', 'kilo', 'de', 'riz'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Medio kilo de arroz', 'correct' => ['medio', 'kilo', 'de', 'arroz'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ein halbes Kilo Reis', 'correct' => ['ein', 'halbes', 'Kilo', 'Reis'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ご飯半キロ', 'correct' => ['ご飯', '半キロ'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '쌀 반 킬로', 'correct' => ['쌀', '반', '킬로'], 'extra' => ['사과']],
                        ],
                    ],
                    'c' => [
                        'words' => ['kaç', 'kilo'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many kilos', 'correct' => ['how many', 'kilos'], 'extra' => ['bottle']],
                            'az' => ['sentence' => 'neçə kilo', 'correct' => ['neçə', 'kilo'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'كم كيلو', 'correct' => ['كم', 'كيلو'], 'extra' => ['زجاجة']],
                            'ru' => ['sentence' => 'сколько кило', 'correct' => ['сколько', 'кило'], 'extra' => ['бутылка']],
                            'fr' => ['sentence' => 'Combien de kilos', 'correct' => ['combien de', 'kilos'], 'extra' => ['bouteille']],
                            'es' => ['sentence' => 'Cuántos kilos', 'correct' => ['cuántos', 'kilos'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Wie viele Kilo', 'correct' => ['wie viele', 'Kilo'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '何キロですか', 'correct' => ['何キロ', 'ですか'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '몇 킬로예요', 'correct' => ['몇', '킬로예요'], 'extra' => ['병']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: A Box', 3,
                pictures: [['tr' => 'Yumurta', 'img' => 'egg'], ['tr' => 'Süt', 'img' => 'milk']],
                plain: [['tr' => 'Kutu'], ['tr' => 'Yumurta']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kutu', 'yumurta'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A box of eggs', 'correct' => ['a', 'box', 'of', 'eggs'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir qutu yumurtalar', 'correct' => ['bir', 'qutu', 'yumurtalar'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'علبة بيض', 'correct' => ['علبة', 'بيض'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'коробка яйца', 'correct' => ['коробка', 'яйца'], 'extra' => ['молоко']],
                            'fr' => ['sentence' => 'Une boîte d’oeufs', 'correct' => ['une', 'boîte', 'd’oeufs'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una caja de huevos', 'correct' => ['una', 'caja', 'de', 'huevos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Schachtel Eier', 'correct' => ['eine', 'Schachtel', 'Eier'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵一箱', 'correct' => ['卵', '一箱'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀 한 상자', 'correct' => ['달걀', '한', '상자'], 'extra' => ['우유']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'kutu', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Two boxes please', 'correct' => ['two', 'boxes', 'please'], 'extra' => ['bottle']],
                            'az' => ['sentence' => 'iki qutular zəhmət olmasa', 'correct' => ['iki', 'qutular', 'zəhmət olmasa'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'اثنان علب من فضلك', 'correct' => ['اثنان', 'علب', 'من فضلك'], 'extra' => ['زجاجة']],
                            'ru' => ['sentence' => 'два коробки пожалуйста', 'correct' => ['два', 'коробки', 'пожалуйста'], 'extra' => ['бутылка']],
                            'fr' => ['sentence' => 'Deux boîtes s’il vous plaît', 'correct' => ['deux', 'boîtes', 's’il vous plaît'], 'extra' => ['bouteille']],
                            'es' => ['sentence' => 'Dos cajas por favor', 'correct' => ['dos', 'cajas', 'por favor'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Zwei Schachteln bitte', 'correct' => ['zwei', 'Schachteln', 'bitte'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '二箱お願いします', 'correct' => ['二箱', 'お願いします'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '두 상자 부탁합니다', 'correct' => ['두', '상자', '부탁합니다'], 'extra' => ['병']],
                        ],
                    ],
                    'c' => [
                        'words' => ['kutu', 'büyük'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The box is big', 'correct' => ['the box', 'is', 'big'], 'extra' => ['small']],
                            'az' => ['sentence' => 'qutu böyük', 'correct' => ['qutu', 'böyük'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'علبة كبير', 'correct' => ['علبة', 'كبير'], 'extra' => ['صغير']],
                            'ru' => ['sentence' => 'коробка большой', 'correct' => ['коробка', 'большой'], 'extra' => ['маленький']],
                            'fr' => ['sentence' => 'La boîte est grande', 'correct' => ['la boîte', 'est', 'grande'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'La caja es grande', 'correct' => ['la caja', 'es', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Die Schachtel ist groß', 'correct' => ['die Schachtel', 'ist', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '箱は大きいです', 'correct' => ['箱は', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '상자는 커요', 'correct' => ['상자는', '커요'], 'extra' => ['작은']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Much & Little', 4,
                pictures: [['tr' => 'Elma', 'img' => 'apple'], ['tr' => 'Su', 'img' => 'water']],
                plain: [['tr' => 'Çok'], ['tr' => 'Az']],
                phrases: [
                    'a' => [
                        'words' => ['çok', 'elma'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A lot of apples', 'correct' => ['a lot of', 'apples'], 'extra' => ['little']],
                            'az' => ['sentence' => 'çoxlu almalar', 'correct' => ['çoxlu', 'almalar'], 'extra' => []],
                            'ar' => ['sentence' => 'كثير تفاح', 'correct' => ['كثير', 'تفاح'], 'extra' => []],
                            'ru' => ['sentence' => 'много яблоки', 'correct' => ['много', 'яблоки'], 'extra' => []],
                            'fr' => ['sentence' => 'Beaucoup de pommes', 'correct' => ['beaucoup de', 'pommes'], 'extra' => ['peu']],
                            'es' => ['sentence' => 'Muchas manzanas', 'correct' => ['muchas', 'manzanas'], 'extra' => ['poco']],
                            'de' => ['sentence' => 'Viele Äpfel', 'correct' => ['viele', 'Äpfel'], 'extra' => ['wenig']],
                            'ja' => ['sentence' => 'たくさんのりんご', 'correct' => ['たくさんの', 'りんご'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '많은 사과', 'correct' => ['많은', '사과'], 'extra' => ['조금']],
                        ],
                    ],
                    'b' => [
                        'words' => ['az', 'su'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A little water', 'correct' => ['a little', 'water'], 'extra' => ['a lot of']],
                            'az' => ['sentence' => 'az su', 'correct' => ['az', 'su'], 'extra' => ['çoxlu']],
                            'ar' => ['sentence' => 'قليل ماء', 'correct' => ['قليل', 'ماء'], 'extra' => ['كثير']],
                            'ru' => ['sentence' => 'немного вода', 'correct' => ['немного', 'вода'], 'extra' => ['много']],
                            'fr' => ['sentence' => 'Peu d’eau', 'correct' => ['peu d’', 'eau'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Poca agua', 'correct' => ['poca', 'agua'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Wenig Wasser', 'correct' => ['wenig', 'Wasser'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '少しの水', 'correct' => ['少しの', '水'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '조금의 물', 'correct' => ['조금의', '물'], 'extra' => ['많은']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çok', 'pahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Very expensive', 'correct' => ['very', 'expensive'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'çox bahalı', 'correct' => ['çox', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'جدا غالي', 'correct' => ['جدا', 'غالي'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'очень дорогой', 'correct' => ['очень', 'дорогой'], 'extra' => ['дешёвый']],
                            'fr' => ['sentence' => 'Très cher', 'correct' => ['très', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'Muy caro', 'correct' => ['muy', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Sehr teuer', 'correct' => ['sehr', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => 'とても高いです', 'correct' => ['とても', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '아주 비싸요', 'correct' => ['아주', '비싸요'], 'extra' => ['싼']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Filling the Cart', 5,
                pictures: [['tr' => 'Su', 'img' => 'water'], ['tr' => 'Yumurta', 'img' => 'egg']],
                plain: [['tr' => 'Şişe'], ['tr' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'şişe', 'su', 've', 'bir', 'kutu', 'süt'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A bottle of water and a box of milk', 'correct' => ['a', 'bottle', 'of', 'water', 'and', 'a', 'box', 'of', 'milk'], 'extra' => ['eggs']],
                            'az' => ['sentence' => 'bir şüşə su və bir qutu süd', 'correct' => ['bir', 'şüşə', 'su', 'və', 'bir', 'qutu', 'süd'], 'extra' => ['yumurtalar']],
                            'ar' => ['sentence' => 'زجاجة ماء و علبة حليب', 'correct' => ['زجاجة', 'ماء', 'و', 'علبة', 'حليب'], 'extra' => ['بيض']],
                            'ru' => ['sentence' => 'бутылка вода и коробка молоко', 'correct' => ['бутылка', 'вода', 'и', 'коробка', 'молоко'], 'extra' => ['яйца']],
                            'fr' => ['sentence' => 'Une bouteille d’eau et une boîte de lait', 'correct' => ['une', 'bouteille', 'd’eau', 'et', 'une', 'boîte', 'de', 'lait'], 'extra' => ['oeufs']],
                            'es' => ['sentence' => 'Una botella de agua y una caja de leche', 'correct' => ['una', 'botella', 'de', 'agua', 'y', 'una', 'caja', 'de', 'leche'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Eine Flasche Wasser und eine Schachtel Milch', 'correct' => ['eine', 'Flasche', 'Wasser', 'und', 'eine', 'Schachtel', 'Milch'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => '水一本と牛乳一箱', 'correct' => ['水', '一本', 'と', '牛乳', '一箱'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '물 한 병과 우유 한 상자', 'correct' => ['물', '한', '병과', '우유', '한', '상자'], 'extra' => ['달걀']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'kilo', 'elma', 'lütfen'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Two kilos of apples please', 'correct' => ['two', 'kilos', 'of', 'apples', 'please'], 'extra' => ['rice']],
                            'az' => ['sentence' => 'iki kilo almalar zəhmət olmasa', 'correct' => ['iki', 'kilo', 'almalar', 'zəhmət olmasa'], 'extra' => ['düyü']],
                            'ar' => ['sentence' => 'اثنان كيلو تفاح من فضلك', 'correct' => ['اثنان', 'كيلو', 'تفاح', 'من فضلك'], 'extra' => ['أرز']],
                            'ru' => ['sentence' => 'два кило яблоки пожалуйста', 'correct' => ['два', 'кило', 'яблоки', 'пожалуйста'], 'extra' => ['рис']],
                            'fr' => ['sentence' => 'Deux kilos de pommes s’il vous plaît', 'correct' => ['deux', 'kilos', 'de', 'pommes', 's’il vous plaît'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Dos kilos de manzanas por favor', 'correct' => ['dos', 'kilos', 'de', 'manzanas', 'por favor'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Zwei Kilo Äpfel bitte', 'correct' => ['zwei', 'Kilo', 'Äpfel', 'bitte'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'りんご二キロをお願いします', 'correct' => ['りんご', '二キロを', 'お願いします'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '사과 이 킬로 부탁합니다', 'correct' => ['사과', '이', '킬로', '부탁합니다'], 'extra' => ['쌀']],
                        ],
                    ],
                    'c' => [
                        'words' => ['az', 'şeker'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A little sugar', 'correct' => ['a little', 'sugar'], 'extra' => ['a lot of']],
                            'az' => ['sentence' => 'az şəkər', 'correct' => ['az', 'şəkər'], 'extra' => ['çoxlu']],
                            'ar' => ['sentence' => 'قليل سكر', 'correct' => ['قليل', 'سكر'], 'extra' => ['كثير']],
                            'ru' => ['sentence' => 'немного сахар', 'correct' => ['немного', 'сахар'], 'extra' => ['много']],
                            'fr' => ['sentence' => 'Peu de sucre', 'correct' => ['peu de', 'sucre'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Poca azúcar', 'correct' => ['poca', 'azúcar'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Wenig Zucker', 'correct' => ['wenig', 'Zucker'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '少しの砂糖', 'correct' => ['少しの', '砂糖'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '조금의 설탕', 'correct' => ['조금의', '설탕'], 'extra' => ['많은']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
