<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitSupermarket06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Su' => 'water', 'Süd' => 'milk', 'Düyü' => 'rice', 'Qəhvə' => 'coffee',
        'Böyük' => 'big', 'Çay' => 'tea', 'Çörək' => 'bread', 'Pendir' => 'cheese',
    ];

    /**
     * Azerbaijani Supermarket Unit 6.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Quantities and Packaging', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: A Bottle', 1,
                pictures: [['az' => 'Su', 'img' => 'water'], ['az' => 'Süd', 'img' => 'milk']],
                plain: [['az' => 'Bir'], ['az' => 'Şüşə']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'şüşə', 'su'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A bottle of water', 'correct' => ['a', 'bottle', 'of', 'water'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Une bouteille d’eau', 'correct' => ['une', 'bouteille', 'd’eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una botella de agua', 'correct' => ['una', 'botella', 'de', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Flasche Wasser', 'correct' => ['eine', 'Flasche', 'Wasser'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '水一本', 'correct' => ['水', '一本'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '물 한 병', 'correct' => ['물', '한', '병'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir şişe su', 'correct' => ['bir', 'şişe', 'su'], 'extra' => ['kutu', 'süt']],
                            'ru' => ['sentence' => 'бутылка вода', 'correct' => ['бутылка', 'вода'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'زجاجة ماء', 'correct' => ['زجاجة', 'ماء'], 'extra' => ['حليب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'şüşələr', 'su'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Two bottles of water', 'correct' => ['two', 'bottles', 'of', 'water'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Deux bouteilles d’eau', 'correct' => ['deux', 'bouteilles', 'd’eau'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Dos botellas de agua', 'correct' => ['dos', 'botellas', 'de', 'agua'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Zwei Flaschen Wasser', 'correct' => ['zwei', 'Flaschen', 'Wasser'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '水二本', 'correct' => ['水', '二本'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '물 두 병', 'correct' => ['물', '두', '병'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'iki şişe su', 'correct' => ['iki', 'şişe', 'su'], 'extra' => ['kutu', 'süt']],
                            'ru' => ['sentence' => 'два бутылки вода', 'correct' => ['два', 'бутылки', 'вода'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'اثنان زجاجات ماء', 'correct' => ['اثنان', 'زجاجات', 'ماء'], 'extra' => ['حليب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'qutu', 'süd'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A box of milk', 'correct' => ['a', 'box', 'of', 'milk'], 'extra' => ['water']],
                            'fr' => ['sentence' => 'Une boîte de lait', 'correct' => ['une', 'boîte', 'de', 'lait'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Una caja de leche', 'correct' => ['una', 'caja', 'de', 'leche'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Eine Schachtel Milch', 'correct' => ['eine', 'Schachtel', 'Milch'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳一箱', 'correct' => ['牛乳', '一箱'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유 한 상자', 'correct' => ['우유', '한', '상자'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'bir kutu süt', 'correct' => ['bir', 'kutu', 'süt'], 'extra' => ['şişe', 'su']],
                            'ru' => ['sentence' => 'коробка молоко', 'correct' => ['коробка', 'молоко'], 'extra' => ['вода']],
                            'ar' => ['sentence' => 'علبة حليب', 'correct' => ['علبة', 'حليب'], 'extra' => ['ماء']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: A Kilo', 2,
                pictures: [['az' => 'Düyü', 'img' => 'rice'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Bir'], ['az' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kilo', 'almalar'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A kilo of apples', 'correct' => ['a', 'kilo', 'of', 'apples'], 'extra' => ['rice']],
                            'fr' => ['sentence' => 'Un kilo de pommes', 'correct' => ['un', 'kilo', 'de', 'pommes'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Un kilo de manzanas', 'correct' => ['un', 'kilo', 'de', 'manzanas'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Ein Kilo Äpfel', 'correct' => ['ein', 'Kilo', 'Äpfel'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'りんご一キロ', 'correct' => ['りんご', '一キロ'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '사과 일 킬로', 'correct' => ['사과', '일', '킬로'], 'extra' => ['쌀']],
                            'tr' => ['sentence' => 'bir kilo elma', 'correct' => ['bir', 'kilo', 'elma'], 'extra' => ['şişe', 'pirinç']],
                            'ru' => ['sentence' => 'кило яблоки', 'correct' => ['кило', 'яблоки'], 'extra' => ['рис']],
                            'ar' => ['sentence' => 'كيلو تفاح', 'correct' => ['كيلو', 'تفاح'], 'extra' => ['أرز']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yarım', 'bir', 'kilo', 'düyü'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Half a kilo of rice', 'correct' => ['half', 'a', 'kilo', 'of', 'rice'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'Un demi-kilo de riz', 'correct' => ['un demi', 'kilo', 'de', 'riz'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Medio kilo de arroz', 'correct' => ['medio', 'kilo', 'de', 'arroz'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ein halbes Kilo Reis', 'correct' => ['ein', 'halbes', 'Kilo', 'Reis'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ご飯半キロ', 'correct' => ['ご飯', '半キロ'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '쌀 반 킬로', 'correct' => ['쌀', '반', '킬로'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'yarım kilo pirinç', 'correct' => ['yarım', 'kilo', 'pirinç'], 'extra' => ['şişe', 'elma']],
                            'ru' => ['sentence' => 'половина кило рис', 'correct' => ['половина', 'кило', 'рис'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'نصف كيلو أرز', 'correct' => ['نصف', 'كيلو', 'أرز'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['neçə', 'kilo'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'How many kilos', 'correct' => ['how many', 'kilos'], 'extra' => ['bottle']],
                            'fr' => ['sentence' => 'Combien de kilos', 'correct' => ['combien de', 'kilos'], 'extra' => ['bouteille']],
                            'es' => ['sentence' => 'Cuántos kilos', 'correct' => ['cuántos', 'kilos'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Wie viele Kilo', 'correct' => ['wie viele', 'Kilo'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '何キロですか', 'correct' => ['何キロ', 'ですか'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '몇 킬로예요', 'correct' => ['몇', '킬로예요'], 'extra' => ['병']],
                            'tr' => ['sentence' => 'kaç kilo', 'correct' => ['kaç', 'kilo'], 'extra' => ['şişe', 'elma']],
                            'ru' => ['sentence' => 'сколько кило', 'correct' => ['сколько', 'кило'], 'extra' => ['бутылка']],
                            'ar' => ['sentence' => 'كم كيلو', 'correct' => ['كم', 'كيلو'], 'extra' => ['زجاجة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: A Box', 3,
                pictures: [['az' => 'Böyük', 'img' => 'big'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Bir'], ['az' => 'Qutu']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'qutu', 'yumurtalar'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A box of eggs', 'correct' => ['a', 'box', 'of', 'eggs'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Une boîte d’oeufs', 'correct' => ['une', 'boîte', 'd’oeufs'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Una caja de huevos', 'correct' => ['una', 'caja', 'de', 'huevos'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Eine Schachtel Eier', 'correct' => ['eine', 'Schachtel', 'Eier'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '卵一箱', 'correct' => ['卵', '一箱'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '달걀 한 상자', 'correct' => ['달걀', '한', '상자'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir kutu yumurta', 'correct' => ['bir', 'kutu', 'yumurta'], 'extra' => ['süt']],
                            'ru' => ['sentence' => 'коробка яйца', 'correct' => ['коробка', 'яйца'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'علبة بيض', 'correct' => ['علبة', 'بيض'], 'extra' => ['حليب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'qutular', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Two boxes please', 'correct' => ['two', 'boxes', 'please'], 'extra' => ['bottle']],
                            'fr' => ['sentence' => 'Deux boîtes s’il vous plaît', 'correct' => ['deux', 'boîtes', 's’il vous plaît'], 'extra' => ['bouteille']],
                            'es' => ['sentence' => 'Dos cajas por favor', 'correct' => ['dos', 'cajas', 'por favor'], 'extra' => ['botella']],
                            'de' => ['sentence' => 'Zwei Schachteln bitte', 'correct' => ['zwei', 'Schachteln', 'bitte'], 'extra' => ['Flasche']],
                            'ja' => ['sentence' => '二箱お願いします', 'correct' => ['二箱', 'お願いします'], 'extra' => ['ボトル']],
                            'ko' => ['sentence' => '두 상자 부탁합니다', 'correct' => ['두', '상자', '부탁합니다'], 'extra' => ['병']],
                            'tr' => ['sentence' => 'iki kutu lütfen', 'correct' => ['iki', 'kutu', 'lütfen'], 'extra' => ['yumurta', 'yumurta']],
                            'ru' => ['sentence' => 'два коробки пожалуйста', 'correct' => ['два', 'коробки', 'пожалуйста'], 'extra' => ['бутылка']],
                            'ar' => ['sentence' => 'اثنان علب من فضلك', 'correct' => ['اثنان', 'علب', 'من فضلك'], 'extra' => ['زجاجة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['qutu', 'böyük'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The box is big', 'correct' => ['the box', 'is', 'big'], 'extra' => ['small']],
                            'fr' => ['sentence' => 'La boîte est grande', 'correct' => ['la boîte', 'est', 'grande'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'La caja es grande', 'correct' => ['la caja', 'es', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Die Schachtel ist groß', 'correct' => ['die Schachtel', 'ist', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => '箱は大きいです', 'correct' => ['箱は', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '상자는 커요', 'correct' => ['상자는', '커요'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'kutu büyük', 'correct' => ['kutu', 'büyük'], 'extra' => ['yumurta', 'yumurta']],
                            'ru' => ['sentence' => 'коробка большой', 'correct' => ['коробка', 'большой'], 'extra' => ['маленький']],
                            'ar' => ['sentence' => 'علبة كبير', 'correct' => ['علبة', 'كبير'], 'extra' => ['صغير']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Much & Little', 4,
                pictures: [['az' => 'Su', 'img' => 'water'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Çoxlu'], ['az' => 'Almalar']],
                phrases: [
                    'a' => [
                        'words' => ['çoxlu', 'almalar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A lot of apples', 'correct' => ['a lot of', 'apples'], 'extra' => ['little']],
                            'fr' => ['sentence' => 'Beaucoup de pommes', 'correct' => ['beaucoup de', 'pommes'], 'extra' => ['peu']],
                            'es' => ['sentence' => 'Muchas manzanas', 'correct' => ['muchas', 'manzanas'], 'extra' => ['poco']],
                            'de' => ['sentence' => 'Viele Äpfel', 'correct' => ['viele', 'Äpfel'], 'extra' => ['wenig']],
                            'ja' => ['sentence' => 'たくさんのりんご', 'correct' => ['たくさんの', 'りんご'], 'extra' => ['少し']],
                            'ko' => ['sentence' => '많은 사과', 'correct' => ['많은', '사과'], 'extra' => ['조금']],
                            'tr' => ['sentence' => 'çok elma', 'correct' => ['çok', 'elma'], 'extra' => ['az', 'su']],
                            'ru' => ['sentence' => 'много яблоки', 'correct' => ['много', 'яблоки'], 'extra' => []],
                            'ar' => ['sentence' => 'كثير تفاح', 'correct' => ['كثير', 'تفاح'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['az', 'su'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'A little water', 'correct' => ['a little', 'water'], 'extra' => ['a lot of']],
                            'fr' => ['sentence' => 'Peu d’eau', 'correct' => ['peu d’', 'eau'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Poca agua', 'correct' => ['poca', 'agua'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Wenig Wasser', 'correct' => ['wenig', 'Wasser'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '少しの水', 'correct' => ['少しの', '水'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '조금의 물', 'correct' => ['조금의', '물'], 'extra' => ['많은']],
                            'tr' => ['sentence' => 'az su', 'correct' => ['az', 'su'], 'extra' => ['çok', 'elma']],
                            'ru' => ['sentence' => 'немного вода', 'correct' => ['немного', 'вода'], 'extra' => ['много']],
                            'ar' => ['sentence' => 'قليل ماء', 'correct' => ['قليل', 'ماء'], 'extra' => ['كثير']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çox', 'bahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Very expensive', 'correct' => ['very', 'expensive'], 'extra' => ['cheap']],
                            'fr' => ['sentence' => 'Très cher', 'correct' => ['très', 'cher'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'Muy caro', 'correct' => ['muy', 'caro'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Sehr teuer', 'correct' => ['sehr', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => 'とても高いです', 'correct' => ['とても', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '아주 비싸요', 'correct' => ['아주', '비싸요'], 'extra' => ['싼']],
                            'tr' => ['sentence' => 'çok pahalı', 'correct' => ['çok', 'pahalı'], 'extra' => ['az', 'elma']],
                            'ru' => ['sentence' => 'очень дорогой', 'correct' => ['очень', 'дорогой'], 'extra' => ['дешёвый']],
                            'ar' => ['sentence' => 'جدا غالي', 'correct' => ['جدا', 'غالي'], 'extra' => ['رخيص']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Filling the Cart', 5,
                pictures: [['az' => 'Su', 'img' => 'water'], ['az' => 'Süd', 'img' => 'milk']],
                plain: [['az' => 'Bir'], ['az' => 'Şüşə']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'şüşə', 'su', 'və', 'bir', 'qutu', 'süd'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A bottle of water and a box of milk', 'correct' => ['a', 'bottle', 'of', 'water', 'and', 'a', 'box', 'of', 'milk'], 'extra' => ['eggs']],
                            'fr' => ['sentence' => 'Une bouteille d’eau et une boîte de lait', 'correct' => ['une', 'bouteille', 'd’eau', 'et', 'une', 'boîte', 'de', 'lait'], 'extra' => ['oeufs']],
                            'es' => ['sentence' => 'Una botella de agua y una caja de leche', 'correct' => ['una', 'botella', 'de', 'agua', 'y', 'una', 'caja', 'de', 'leche'], 'extra' => ['huevos']],
                            'de' => ['sentence' => 'Eine Flasche Wasser und eine Schachtel Milch', 'correct' => ['eine', 'Flasche', 'Wasser', 'und', 'eine', 'Schachtel', 'Milch'], 'extra' => ['Eier']],
                            'ja' => ['sentence' => '水一本と牛乳一箱', 'correct' => ['水', '一本', 'と', '牛乳', '一箱'], 'extra' => ['卵']],
                            'ko' => ['sentence' => '물 한 병과 우유 한 상자', 'correct' => ['물', '한', '병과', '우유', '한', '상자'], 'extra' => ['달걀']],
                            'tr' => ['sentence' => 'bir şişe su ve bir kutu süt', 'correct' => ['bir', 'şişe', 'su', 've', 'bir', 'kutu', 'süt'], 'extra' => ['kilo', 'yumurta']],
                            'ru' => ['sentence' => 'бутылка вода и коробка молоко', 'correct' => ['бутылка', 'вода', 'и', 'коробка', 'молоко'], 'extra' => ['яйца']],
                            'ar' => ['sentence' => 'زجاجة ماء و علبة حليب', 'correct' => ['زجاجة', 'ماء', 'و', 'علبة', 'حليب'], 'extra' => ['بيض']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'kilo', 'almalar', 'zəhmət olmasa'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Two kilos of apples please', 'correct' => ['two', 'kilos', 'of', 'apples', 'please'], 'extra' => ['rice']],
                            'fr' => ['sentence' => 'Deux kilos de pommes s’il vous plaît', 'correct' => ['deux', 'kilos', 'de', 'pommes', 's’il vous plaît'], 'extra' => ['riz']],
                            'es' => ['sentence' => 'Dos kilos de manzanas por favor', 'correct' => ['dos', 'kilos', 'de', 'manzanas', 'por favor'], 'extra' => ['arroz']],
                            'de' => ['sentence' => 'Zwei Kilo Äpfel bitte', 'correct' => ['zwei', 'Kilo', 'Äpfel', 'bitte'], 'extra' => ['Reis']],
                            'ja' => ['sentence' => 'りんご二キロをお願いします', 'correct' => ['りんご', '二キロを', 'お願いします'], 'extra' => ['ご飯']],
                            'ko' => ['sentence' => '사과 이 킬로 부탁합니다', 'correct' => ['사과', '이', '킬로', '부탁합니다'], 'extra' => ['쌀']],
                            'tr' => ['sentence' => 'iki kilo elma lütfen', 'correct' => ['iki', 'kilo', 'elma', 'lütfen'], 'extra' => ['şişe', 'su']],
                            'ru' => ['sentence' => 'два кило яблоки пожалуйста', 'correct' => ['два', 'кило', 'яблоки', 'пожалуйста'], 'extra' => ['рис']],
                            'ar' => ['sentence' => 'اثنان كيلو تفاح من فضلك', 'correct' => ['اثنان', 'كيلو', 'تفاح', 'من فضلك'], 'extra' => ['أرز']],
                        ],
                    ],
                    'c' => [
                        'words' => ['az', 'şəkər'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A little sugar', 'correct' => ['a little', 'sugar'], 'extra' => ['a lot of']],
                            'fr' => ['sentence' => 'Peu de sucre', 'correct' => ['peu de', 'sucre'], 'extra' => ['beaucoup']],
                            'es' => ['sentence' => 'Poca azúcar', 'correct' => ['poca', 'azúcar'], 'extra' => ['mucho']],
                            'de' => ['sentence' => 'Wenig Zucker', 'correct' => ['wenig', 'Zucker'], 'extra' => ['viel']],
                            'ja' => ['sentence' => '少しの砂糖', 'correct' => ['少しの', '砂糖'], 'extra' => ['たくさん']],
                            'ko' => ['sentence' => '조금의 설탕', 'correct' => ['조금의', '설탕'], 'extra' => ['많은']],
                            'tr' => ['sentence' => 'az şeker', 'correct' => ['az', 'şeker'], 'extra' => ['şişe', 'kilo']],
                            'ru' => ['sentence' => 'немного сахар', 'correct' => ['немного', 'сахар'], 'extra' => ['много']],
                            'ar' => ['sentence' => 'قليل سكر', 'correct' => ['قليل', 'سكر'], 'extra' => ['كثير']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
