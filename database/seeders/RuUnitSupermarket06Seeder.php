<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\RussianLessonBuilder;
use Illuminate\Database\Seeder;

class RuUnitSupermarket06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Вода' => 'water', 'Молоко' => 'milk', 'Рис' => 'rice', 'Кофе' => 'coffee',
        'Большой' => 'big', 'Чай' => 'tea', 'Хлеб' => 'bread', 'Сыр' => 'cheese',
    ];

    /**
     * Russian Supermarket Unit 6.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Russian sentences are built from the shared plan tile by tile, and
     * every tile is a RussianVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ru')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new RussianLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Quantities and Packaging', $this->lessonsData($builder));
    }

    private function lessonsData(RussianLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Bottle', 1,
                pictures: [['ru' => 'Вода', 'img' => 'water'], ['ru' => 'Молоко', 'img' => 'milk']],
                plain: [['ru' => 'Бутылка'], ['ru' => 'Два']],
                phrases: [
                    'a' => [
                        'words' => ['бутылка', 'вода'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A bottle of water', 'correct' => ['a', 'bottle', 'of', 'water'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir şüşə su', 'correct' => ['bir', 'şüşə', 'su'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'زجاجة ماء', 'correct' => ['زجاجة', 'ماء'], 'extra' => ['حليب']],
                            'fr' => ['sentence' => 'Une bouteille d’eau', 'correct' => ['une', 'bouteille', 'd’eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una botella de agua', 'correct' => ['una', 'botella', 'de', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Flasche Wasser', 'correct' => ['eine', 'Flasche', 'Wasser'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '水一本', 'correct' => ['水', '一本'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '물 한 병', 'correct' => ['물', '한', '병'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir şişe su', 'correct' => ['bir', 'şişe', 'su'], 'extra' => ['kutu', 'süt']],
                        ],
                    ],
                    'b' => [
                        'words' => ['два', 'бутылки', 'вода'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Two bottles of water', 'correct' => ['two', 'bottles', 'of', 'water'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'iki şüşələr su', 'correct' => ['iki', 'şüşələr', 'su'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'اثنان زجاجات ماء', 'correct' => ['اثنان', 'زجاجات', 'ماء'], 'extra' => ['حليب']],
                            'fr' => ['sentence' => 'Deux bouteilles d’eau', 'correct' => ['deux', 'bouteilles', 'd’eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Dos botellas de agua', 'correct' => ['dos', 'botellas', 'de', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Zwei Flaschen Wasser', 'correct' => ['zwei', 'Flaschen', 'Wasser'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '水二本', 'correct' => ['水', '二本'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '물 두 병', 'correct' => ['물', '두', '병'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'iki şişe su', 'correct' => ['iki', 'şişe', 'su'], 'extra' => ['kutu', 'süt']],
                        ],
                    ],
                    'c' => [
                        'words' => ['коробка', 'молоко'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A box of milk', 'correct' => ['a', 'box', 'of', 'milk'], 'extra' => ['water']],
                            'az' => ['sentence' => 'bir qutu süd', 'correct' => ['bir', 'qutu', 'süd'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'علبة حليب', 'correct' => ['علبة', 'حليب'], 'extra' => ['ماء']],
                            'fr' => ['sentence' => 'Une boîte de lait', 'correct' => ['une', 'boîte', 'de', 'lait'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Una caja de leche', 'correct' => ['una', 'caja', 'de', 'leche'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Eine Schachtel Milch', 'correct' => ['eine', 'Schachtel', 'Milch'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳一箱', 'correct' => ['牛乳', '一箱'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유 한 상자', 'correct' => ['우유', '한', '상자'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'bir kutu süt', 'correct' => ['bir', 'kutu', 'süt'], 'extra' => ['şişe', 'su']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: A Kilo', 2,
                pictures: [['ru' => 'Рис', 'img' => 'rice'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Кило'], ['ru' => 'Яблоки']],
                phrases: [
                    'a' => [
                        'words' => ['кило', 'яблоки'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A kilo of apples', 'correct' => ['a', 'kilo', 'of', 'apples'], 'extra' => ['rice']],
                            'az' => ['sentence' => 'bir kilo almalar', 'correct' => ['bir', 'kilo', 'almalar'], 'extra' => ['düyü']],
                            'ar' => ['sentence' => 'كيلو تفاح', 'correct' => ['كيلو', 'تفاح'], 'extra' => ['أرز']],
                            'fr' => ['sentence' => 'Un kilo de pommes', 'correct' => ['un', 'kilo', 'de', 'pommes'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Un kilo de manzanas', 'correct' => ['un', 'kilo', 'de', 'manzanas'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Ein Kilo Äpfel', 'correct' => ['ein', 'Kilo', 'Äpfel'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'りんご一キロ', 'correct' => ['りんご', '一キロ'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '사과 일 킬로', 'correct' => ['사과', '일', '킬로'], 'extra' => ['쌀']],
                            'tr' => ['sentence' => 'bir kilo elma', 'correct' => ['bir', 'kilo', 'elma'], 'extra' => ['şişe', 'pirinç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['половина', 'кило', 'рис'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Half a kilo of rice', 'correct' => ['half', 'a', 'kilo', 'of', 'rice'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'yarım bir kilo düyü', 'correct' => ['yarım', 'bir', 'kilo', 'düyü'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'نصف كيلو أرز', 'correct' => ['نصف', 'كيلو', 'أرز'], 'extra' => ['تفاحة']],
                            'fr' => ['sentence' => 'Un demi-kilo de riz', 'correct' => ['un demi', 'kilo', 'de', 'riz'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Medio kilo de arroz', 'correct' => ['medio', 'kilo', 'de', 'arroz'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ein halbes Kilo Reis', 'correct' => ['ein', 'halbes', 'Kilo', 'Reis'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ご飯半キロ', 'correct' => ['ご飯', '半キロ'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '쌀 반 킬로', 'correct' => ['쌀', '반', '킬로'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'yarım kilo pirinç', 'correct' => ['yarım', 'kilo', 'pirinç'], 'extra' => ['şişe', 'elma']],
                        ],
                    ],
                    'c' => [
                        'words' => ['сколько', 'кило'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'How many kilos', 'correct' => ['how many', 'kilos'], 'extra' => ['bottle']],
                            'az' => ['sentence' => 'neçə kilo', 'correct' => ['neçə', 'kilo'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'كم كيلو', 'correct' => ['كم', 'كيلو'], 'extra' => ['زجاجة']],
                            'fr' => ['sentence' => 'Combien de kilos', 'correct' => ['combien de', 'kilos'], 'extra' => ['bouteille']],
                            'es' => ['sentence' => 'Cuántos kilos', 'correct' => ['cuántos', 'kilos'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Wie viele Kilo', 'correct' => ['wie viele', 'Kilo'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '何キロですか', 'correct' => ['何キロ', 'ですか'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '몇 킬로예요', 'correct' => ['몇', '킬로예요'], 'extra' => ['병']],
                            'tr' => ['sentence' => 'kaç kilo', 'correct' => ['kaç', 'kilo'], 'extra' => ['şişe', 'elma']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: A Box', 3,
                pictures: [['ru' => 'Большой', 'img' => 'big'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Коробка'], ['ru' => 'Яйца']],
                phrases: [
                    'a' => [
                        'words' => ['коробка', 'яйца'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A box of eggs', 'correct' => ['a', 'box', 'of', 'eggs'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir qutu yumurtalar', 'correct' => ['bir', 'qutu', 'yumurtalar'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'علبة بيض', 'correct' => ['علبة', 'بيض'], 'extra' => ['حليب']],
                            'fr' => ['sentence' => 'Une boîte d’oeufs', 'correct' => ['une', 'boîte', 'd’oeufs'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una caja de huevos', 'correct' => ['una', 'caja', 'de', 'huevos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Schachtel Eier', 'correct' => ['eine', 'Schachtel', 'Eier'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵一箱', 'correct' => ['卵', '一箱'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀 한 상자', 'correct' => ['달걀', '한', '상자'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir kutu yumurta', 'correct' => ['bir', 'kutu', 'yumurta'], 'extra' => ['süt']],
                        ],
                    ],
                    'b' => [
                        'words' => ['два', 'коробки', 'пожалуйста'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Two boxes please', 'correct' => ['two', 'boxes', 'please'], 'extra' => ['bottle']],
                            'az' => ['sentence' => 'iki qutular zəhmət olmasa', 'correct' => ['iki', 'qutular', 'zəhmət olmasa'], 'extra' => ['şüşə']],
                            'ar' => ['sentence' => 'اثنان علب من فضلك', 'correct' => ['اثنان', 'علب', 'من فضلك'], 'extra' => ['زجاجة']],
                            'fr' => ['sentence' => 'Deux boîtes s’il vous plaît', 'correct' => ['deux', 'boîtes', 's’il vous plaît'], 'extra' => ['bouteille']],
                            'es' => ['sentence' => 'Dos cajas por favor', 'correct' => ['dos', 'cajas', 'por favor'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Zwei Schachteln bitte', 'correct' => ['zwei', 'Schachteln', 'bitte'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '二箱お願いします', 'correct' => ['二箱', 'お願いします'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '두 상자 부탁합니다', 'correct' => ['두', '상자', '부탁합니다'], 'extra' => ['병']],
                            'tr' => ['sentence' => 'iki kutu lütfen', 'correct' => ['iki', 'kutu', 'lütfen'], 'extra' => ['yumurta', 'yumurta']],
                        ],
                    ],
                    'c' => [
                        'words' => ['коробка', 'большой'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The box is big', 'correct' => ['the box', 'is', 'big'], 'extra' => ['small']],
                            'az' => ['sentence' => 'qutu böyük', 'correct' => ['qutu', 'böyük'], 'extra' => ['kiçik']],
                            'ar' => ['sentence' => 'علبة كبير', 'correct' => ['علبة', 'كبير'], 'extra' => ['صغير']],
                            'fr' => ['sentence' => 'La boîte est grande', 'correct' => ['la boîte', 'est', 'grande'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'La caja es grande', 'correct' => ['la caja', 'es', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Die Schachtel ist groß', 'correct' => ['die Schachtel', 'ist', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '箱は大きいです', 'correct' => ['箱は', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '상자는 커요', 'correct' => ['상자는', '커요'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'kutu büyük', 'correct' => ['kutu', 'büyük'], 'extra' => ['yumurta', 'yumurta']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Much & Little', 4,
                pictures: [['ru' => 'Вода', 'img' => 'water'], ['ru' => 'Кофе', 'img' => 'coffee']],
                plain: [['ru' => 'Много'], ['ru' => 'Яблоки']],
                phrases: [
                    'a' => [
                        'words' => ['много', 'яблоки'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A lot of apples', 'correct' => ['a lot of', 'apples'], 'extra' => ['little']],
                            'az' => ['sentence' => 'çoxlu almalar', 'correct' => ['çoxlu', 'almalar'], 'extra' => []],
                            'ar' => ['sentence' => 'كثير تفاح', 'correct' => ['كثير', 'تفاح'], 'extra' => []],
                            'fr' => ['sentence' => 'Beaucoup de pommes', 'correct' => ['beaucoup de', 'pommes'], 'extra' => ['peu']],
                            'es' => ['sentence' => 'Muchas manzanas', 'correct' => ['muchas', 'manzanas'], 'extra' => ['poco']],
                            'de' => ['sentence' => 'Viele Äpfel', 'correct' => ['viele', 'Äpfel'], 'extra' => ['wenig']],
                            'ja' => ['sentence' => 'たくさんのりんご', 'correct' => ['たくさんの', 'りんご'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '많은 사과', 'correct' => ['많은', '사과'], 'extra' => ['조금']],
                            'tr' => ['sentence' => 'çok elma', 'correct' => ['çok', 'elma'], 'extra' => ['az', 'su']],
                        ],
                    ],
                    'b' => [
                        'words' => ['немного', 'вода'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A little water', 'correct' => ['a little', 'water'], 'extra' => ['a lot of']],
                            'az' => ['sentence' => 'az su', 'correct' => ['az', 'su'], 'extra' => ['çoxlu']],
                            'ar' => ['sentence' => 'قليل ماء', 'correct' => ['قليل', 'ماء'], 'extra' => ['كثير']],
                            'fr' => ['sentence' => 'Peu d’eau', 'correct' => ['peu d’', 'eau'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Poca agua', 'correct' => ['poca', 'agua'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Wenig Wasser', 'correct' => ['wenig', 'Wasser'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '少しの水', 'correct' => ['少しの', '水'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '조금의 물', 'correct' => ['조금의', '물'], 'extra' => ['많은']],
                            'tr' => ['sentence' => 'az su', 'correct' => ['az', 'su'], 'extra' => ['çok', 'elma']],
                        ],
                    ],
                    'c' => [
                        'words' => ['очень', 'дорогой'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Very expensive', 'correct' => ['very', 'expensive'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'çox bahalı', 'correct' => ['çox', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'جدا غالي', 'correct' => ['جدا', 'غالي'], 'extra' => ['رخيص']],
                            'fr' => ['sentence' => 'Très cher', 'correct' => ['très', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'Muy caro', 'correct' => ['muy', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Sehr teuer', 'correct' => ['sehr', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => 'とても高いです', 'correct' => ['とても', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '아주 비싸요', 'correct' => ['아주', '비싸요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'çok pahalı', 'correct' => ['çok', 'pahalı'], 'extra' => ['az', 'elma']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Filling the Cart', 5,
                pictures: [['ru' => 'Вода', 'img' => 'water'], ['ru' => 'Молоко', 'img' => 'milk']],
                plain: [['ru' => 'Бутылка'], ['ru' => 'Коробка']],
                phrases: [
                    'a' => [
                        'words' => ['бутылка', 'вода', 'и', 'коробка', 'молоко'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A bottle of water and a box of milk', 'correct' => ['a', 'bottle', 'of', 'water', 'and', 'a', 'box', 'of', 'milk'], 'extra' => ['eggs']],
                            'az' => ['sentence' => 'bir şüşə su və bir qutu süd', 'correct' => ['bir', 'şüşə', 'su', 'və', 'bir', 'qutu', 'süd'], 'extra' => ['yumurtalar']],
                            'ar' => ['sentence' => 'زجاجة ماء و علبة حليب', 'correct' => ['زجاجة', 'ماء', 'و', 'علبة', 'حليب'], 'extra' => ['بيض']],
                            'fr' => ['sentence' => 'Une bouteille d’eau et une boîte de lait', 'correct' => ['une', 'bouteille', 'd’eau', 'et', 'une', 'boîte', 'de', 'lait'], 'extra' => ['oeufs']],
                            'es' => ['sentence' => 'Una botella de agua y una caja de leche', 'correct' => ['una', 'botella', 'de', 'agua', 'y', 'una', 'caja', 'de', 'leche'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Eine Flasche Wasser und eine Schachtel Milch', 'correct' => ['eine', 'Flasche', 'Wasser', 'und', 'eine', 'Schachtel', 'Milch'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => '水一本と牛乳一箱', 'correct' => ['水', '一本', 'と', '牛乳', '一箱'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '물 한 병과 우유 한 상자', 'correct' => ['물', '한', '병과', '우유', '한', '상자'], 'extra' => ['달걀']],
                            'tr' => ['sentence' => 'bir şişe su ve bir kutu süt', 'correct' => ['bir', 'şişe', 'su', 've', 'bir', 'kutu', 'süt'], 'extra' => ['kilo', 'yumurta']],
                        ],
                    ],
                    'b' => [
                        'words' => ['два', 'кило', 'яблоки', 'пожалуйста'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Two kilos of apples please', 'correct' => ['two', 'kilos', 'of', 'apples', 'please'], 'extra' => ['rice']],
                            'az' => ['sentence' => 'iki kilo almalar zəhmət olmasa', 'correct' => ['iki', 'kilo', 'almalar', 'zəhmət olmasa'], 'extra' => ['düyü']],
                            'ar' => ['sentence' => 'اثنان كيلو تفاح من فضلك', 'correct' => ['اثنان', 'كيلو', 'تفاح', 'من فضلك'], 'extra' => ['أرز']],
                            'fr' => ['sentence' => 'Deux kilos de pommes s’il vous plaît', 'correct' => ['deux', 'kilos', 'de', 'pommes', 's’il vous plaît'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Dos kilos de manzanas por favor', 'correct' => ['dos', 'kilos', 'de', 'manzanas', 'por favor'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Zwei Kilo Äpfel bitte', 'correct' => ['zwei', 'Kilo', 'Äpfel', 'bitte'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'りんご二キロをお願いします', 'correct' => ['りんご', '二キロを', 'お願いします'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '사과 이 킬로 부탁합니다', 'correct' => ['사과', '이', '킬로', '부탁합니다'], 'extra' => ['쌀']],
                            'tr' => ['sentence' => 'iki kilo elma lütfen', 'correct' => ['iki', 'kilo', 'elma', 'lütfen'], 'extra' => ['şişe', 'su']],
                        ],
                    ],
                    'c' => [
                        'words' => ['немного', 'сахар'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A little sugar', 'correct' => ['a little', 'sugar'], 'extra' => ['a lot of']],
                            'az' => ['sentence' => 'az şəkər', 'correct' => ['az', 'şəkər'], 'extra' => ['çoxlu']],
                            'ar' => ['sentence' => 'قليل سكر', 'correct' => ['قليل', 'سكر'], 'extra' => ['كثير']],
                            'fr' => ['sentence' => 'Peu de sucre', 'correct' => ['peu de', 'sucre'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Poca azúcar', 'correct' => ['poca', 'azúcar'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Wenig Zucker', 'correct' => ['wenig', 'Zucker'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '少しの砂糖', 'correct' => ['少しの', '砂糖'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '조금의 설탕', 'correct' => ['조금의', '설탕'], 'extra' => ['많은']],
                            'tr' => ['sentence' => 'az şeker', 'correct' => ['az', 'şeker'], 'extra' => ['şişe', 'kilo']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
