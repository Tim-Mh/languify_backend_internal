<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket05Seeder extends Seeder
{
    private const PICTURES = [
        'Meat' => 'meat', 'Chicken' => 'chicken', 'Fish' => 'fish', 'Rice' => 'rice',
        'Basket' => 'basket', 'Box' => 'box', 'Cheese' => 'cheese', 'Bread' => 'bread',
    ];

    /**
     * English Chapter 4, Unit 5 — the meat and fish counter.
     *
     * The nouns are familiar from Chapter 3, so this unit spends its new-word
     * budget on the transaction around them — less/more, ask, carry — rather
     * than on more food.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Meat and Fish', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Fresh or Expensive', 1,
                pictures: [['en' => 'Meat', 'img' => 'meat'], ['en' => 'Chicken', 'img' => 'chicken']],
                plain: [['en' => 'Expensive'], ['en' => 'Cheap']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'chicken', 'is', 'expensive'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pollo es caro', 'correct' => ['el', 'pollo', 'es', 'caro'], 'extra' => ['barato', 'carne']],
                            'de' => ['sentence' => 'Das Hähnchen ist teuer', 'correct' => ['das', 'Hähnchen', 'ist', 'teuer'], 'extra' => ['billig', 'Fleisch']],
                            'ja' => ['sentence' => '鶏肉は高いです', 'correct' => ['鶏肉', 'は', '高い', 'です'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '닭고기는 비쌉니다', 'correct' => ['닭고기는', '비쌉니다'], 'extra' => ['싼']],
                            'fr' => ['sentence' => 'Le poulet est cher', 'correct' => ['le', 'poulet', 'est', 'cher'], 'extra' => ['bon marché', 'viande']],
                            'tr' => ['sentence' => 'tavuk pahalı', 'correct' => ['tavuk', 'pahalı'], 'extra' => []],
                        'ru' => ['sentence' => 'курица дорогой', 'correct' => ['курица', 'дорогой'], 'extra' => []],
                        'ar' => ['sentence' => 'دجاج غالي', 'correct' => ['دجاج', 'غالي'], 'extra' => []],
                        'az' => ['sentence' => 'toyuq bahalı', 'correct' => ['toyuq', 'bahalı'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'cheap', 'chicken'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un pollo barato', 'correct' => ['un', 'pollo', 'barato'], 'extra' => ['caro', 'carne']],
                            'de' => ['sentence' => 'Ein billiges Hähnchen', 'correct' => ['ein', 'billig', 'Hähnchen'], 'extra' => ['teuer', 'Fleisch']],
                            'ja' => ['sentence' => '安い鶏肉', 'correct' => ['安い', '鶏肉'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '싼 닭고기', 'correct' => ['싼', '닭고기'], 'extra' => ['비싼']],
                            'fr' => ['sentence' => 'Un poulet bon marché', 'correct' => ['un', 'poulet', 'bon marché'], 'extra' => ['cher']],
                            'tr' => ['sentence' => 'ucuz bir tavuk', 'correct' => ['ucuz', 'bir', 'tavuk'], 'extra' => []],
                        'ru' => ['sentence' => 'дешёвый курица', 'correct' => ['дешёвый', 'курица'], 'extra' => []],
                        'ar' => ['sentence' => 'رخيص دجاج', 'correct' => ['رخيص', 'دجاج'], 'extra' => []],
                        'az' => ['sentence' => 'bir ucuz toyuq', 'correct' => ['bir', 'ucuz', 'toyuq'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'meat', 'is', 'cheap'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La carne es barata', 'correct' => ['la', 'carne', 'es', 'barato'], 'extra' => ['caro', 'pollo']],
                            'de' => ['sentence' => 'Das Fleisch ist billig', 'correct' => ['das', 'Fleisch', 'ist', 'billig'], 'extra' => ['teuer', 'Hähnchen']],
                            'ja' => ['sentence' => '肉は安いです', 'correct' => ['肉', 'は', '安い', 'です'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '고기는 쌉니다', 'correct' => ['고기는', '쌉니다'], 'extra' => ['비싼']],
                            'fr' => ['sentence' => 'La viande est bon marché', 'correct' => ['la', 'viande', 'est', 'bon marché'], 'extra' => ['cher']],
                            'tr' => ['sentence' => 'et ucuz', 'correct' => ['et', 'ucuz'], 'extra' => []],
                        'ru' => ['sentence' => 'мясо дешёвый', 'correct' => ['мясо', 'дешёвый'], 'extra' => []],
                        'ar' => ['sentence' => 'لحم رخيص', 'correct' => ['لحم', 'رخيص'], 'extra' => []],
                        'az' => ['sentence' => 'ət ucuz', 'correct' => ['ət', 'ucuz'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Less and More', 2,
                pictures: [['en' => 'Fish', 'img' => 'fish'], ['en' => 'Meat', 'img' => 'meat']],
                plain: [['en' => 'Less'], ['en' => 'More']],
                phrases: [
                    'a' => [
                        'words' => ['less', 'meat'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Menos carne', 'correct' => ['menos', 'carne'], 'extra' => ['más', 'pescado']],
                            'de' => ['sentence' => 'Weniger Fleisch', 'correct' => ['weniger', 'Fleisch'], 'extra' => ['mehr', 'Fisch']],
                            'ja' => ['sentence' => '肉を少なく', 'correct' => ['肉', 'を', '少なく'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '고기 적게', 'correct' => ['고기', '적게'], 'extra' => ['더']],
                            'fr' => ['sentence' => 'Moins de viande', 'correct' => ['moins', 'viande'], 'extra' => ['plus', 'poisson']],
                            'tr' => ['sentence' => 'daha az et', 'correct' => ['daha', 'az', 'et'], 'extra' => []],
                        'ru' => ['sentence' => 'меньше мясо', 'correct' => ['меньше', 'мясо'], 'extra' => []],
                        'ar' => ['sentence' => 'أقل لحم', 'correct' => ['أقل', 'لحم'], 'extra' => []],
                        'az' => ['sentence' => 'daha az ət', 'correct' => ['daha az', 'ət'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['more', 'fish'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Más pescado', 'correct' => ['más', 'pescado'], 'extra' => ['menos', 'carne']],
                            'de' => ['sentence' => 'Mehr Fisch', 'correct' => ['mehr', 'Fisch'], 'extra' => ['weniger', 'Fleisch']],
                            'ja' => ['sentence' => '魚をもっと', 'correct' => ['魚', 'を', 'もっと'], 'extra' => ['より少ない']],
                            'ko' => ['sentence' => '생선 더', 'correct' => ['생선', '더'], 'extra' => ['덜']],
                            'fr' => ['sentence' => 'Plus de poisson', 'correct' => ['plus', 'poisson'], 'extra' => ['moins']],
                            'tr' => ['sentence' => 'daha çok balık', 'correct' => ['daha', 'çok', 'balık'], 'extra' => []],
                        'ru' => ['sentence' => 'больше рыба', 'correct' => ['больше', 'рыба'], 'extra' => []],
                        'ar' => ['sentence' => 'أكثر سمك', 'correct' => ['أكثر', 'سمك'], 'extra' => []],
                        'az' => ['sentence' => 'daha balıq', 'correct' => ['daha', 'balıq'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['less', 'meat', 'and', 'more', 'fish'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Menos carne y más pescado', 'correct' => ['menos', 'carne', 'y', 'más', 'pescado'], 'extra' => ['pollo']],
                            'de' => ['sentence' => 'Weniger Fleisch und mehr Fisch', 'correct' => ['weniger', 'Fleisch', 'und', 'mehr', 'Fisch'], 'extra' => ['Hähnchen']],
                            'ja' => ['sentence' => '肉を少なく魚をもっと', 'correct' => ['肉', 'を', '少なく', '魚', 'を', 'もっと'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '고기 적게 생선 더', 'correct' => ['고기', '적게', '생선', '더'], 'extra' => ['닭고기']],
                            'fr' => ['sentence' => 'Moins de viande et plus de poisson', 'correct' => ['moins', 'viande', 'et', 'plus', 'poisson'], 'extra' => ['poulet']],
                            'tr' => ['sentence' => 'daha az et ve daha çok balık', 'correct' => ['daha', 'az', 'et', 've', 'daha', 'çok', 'balık'], 'extra' => []],
                        'ru' => ['sentence' => 'меньше мясо и больше рыба', 'correct' => ['меньше', 'мясо', 'и', 'больше', 'рыба'], 'extra' => []],
                        'ar' => ['sentence' => 'أقل لحم و أكثر سمك', 'correct' => ['أقل', 'لحم', 'و', 'أكثر', 'سمك'], 'extra' => []],
                        'az' => ['sentence' => 'daha az ət və daha balıq', 'correct' => ['daha az', 'ət', 'və', 'daha', 'balıq'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Asking the Price', 3,
                pictures: [['en' => 'Chicken', 'img' => 'chicken'], ['en' => 'Fish', 'img' => 'fish']],
                plain: [['en' => 'Price'], ['en' => 'How many']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'price', 'of', 'the', 'fish'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El precio del pescado', 'correct' => ['el', 'precio', 'de', 'el', 'pescado'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Der Preis des Fisches', 'correct' => ['der', 'Preis', 'von', 'dem', 'Fisch'], 'extra' => ['wie viele']],
                            'ja' => ['sentence' => '魚の値段', 'correct' => ['魚', 'の', '値段'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '생선의 가격', 'correct' => ['생선의', '가격'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Le prix du poisson', 'correct' => ['le', 'prix', 'de', 'le', 'poisson'], 'extra' => ['combien']],
                            'tr' => ['sentence' => 'balığın fiyatı', 'correct' => ['balığın', 'fiyatı'], 'extra' => []],
                        'ru' => ['sentence' => 'цена рыба', 'correct' => ['цена', 'рыба'], 'extra' => []],
                        'ar' => ['sentence' => 'سعر سمك', 'correct' => ['سعر', 'سمك'], 'extra' => []],
                        'az' => ['sentence' => 'qiymət balıq', 'correct' => ['qiymət', 'balıq'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['how many', 'for', 'the', 'chicken'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Cuánto por el pollo', 'correct' => ['cuántos', 'para', 'el', 'pollo'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viel für das Hähnchen', 'correct' => ['wie viele', 'für', 'das', 'Hähnchen'], 'extra' => ['Preis']],
                            'ja' => ['sentence' => '鶏肉はいくつ', 'correct' => ['鶏肉', 'は', 'いくつ'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '닭고기는 몇 개', 'correct' => ['닭고기는', '몇', '개'], 'extra' => ['가격']],
                            'fr' => ['sentence' => 'Combien pour le poulet', 'correct' => ['combien', 'pour', 'le', 'poulet'], 'extra' => ['prix']],
                            'tr' => ['sentence' => 'tavuk kaç lira', 'correct' => ['tavuk', 'kaç', 'lira'], 'extra' => []],
                        'ru' => ['sentence' => 'сколько для курица', 'correct' => ['сколько', 'для', 'курица'], 'extra' => []],
                        'ar' => ['sentence' => 'كم لأجل دجاج', 'correct' => ['كم', 'لأجل', 'دجاج'], 'extra' => []],
                        'az' => ['sentence' => 'neçə üçün toyuq', 'correct' => ['neçə', 'üçün', 'toyuq'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'price', 'of', 'the', 'chicken'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El precio del pollo', 'correct' => ['el', 'precio', 'de', 'el', 'pollo'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Der Preis des Hähnchens', 'correct' => ['der', 'Preis', 'von', 'dem', 'Hähnchen'], 'extra' => ['wie viele']],
                            'ja' => ['sentence' => '鶏肉の値段', 'correct' => ['鶏肉', 'の', '値段'], 'extra' => ['いくつ']],
                            'ko' => ['sentence' => '닭고기의 가격', 'correct' => ['닭고기의', '가격'], 'extra' => ['몇 개']],
                            'fr' => ['sentence' => 'Le prix du poulet', 'correct' => ['le', 'prix', 'de', 'le', 'poulet'], 'extra' => ['combien']],
                            'tr' => ['sentence' => 'tavuğun fiyatı', 'correct' => ['tavuğun', 'fiyatı'], 'extra' => []],
                        'ru' => ['sentence' => 'цена курица', 'correct' => ['цена', 'курица'], 'extra' => []],
                        'ar' => ['sentence' => 'سعر دجاج', 'correct' => ['سعر', 'دجاج'], 'extra' => []],
                        'az' => ['sentence' => 'qiymət toyuq', 'correct' => ['qiymət', 'toyuq'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Carrying It Home', 4,
                pictures: [['en' => 'Meat', 'img' => 'meat'], ['en' => 'Basket', 'img' => 'basket']],
                plain: [['en' => 'To carry'], ['en' => 'Bag']],
                phrases: [
                    'a' => [
                        'words' => ['to carry', 'the', 'basket'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Llevar la cesta', 'correct' => ['llevar', 'la', 'cesta'], 'extra' => ['bolsa', 'carne']],
                            'de' => ['sentence' => 'Den Korb tragen', 'correct' => ['den', 'Korb', 'tragen'], 'extra' => ['Tüte', 'Fleisch']],
                            'ja' => ['sentence' => 'かごを運ぶ', 'correct' => ['かご', 'を', '運ぶ'], 'extra' => ['袋']],
                            'ko' => ['sentence' => '바구니를 나르다', 'correct' => ['바구니를', '나르다'], 'extra' => ['봉투']],
                            'fr' => ['sentence' => 'Porter le panier', 'correct' => ['porter', 'le', 'panier'], 'extra' => ['sac', 'viande']],
                            'tr' => ['sentence' => 'sepeti taşımak', 'correct' => ['sepeti', 'taşımak'], 'extra' => []],
                        'ru' => ['sentence' => 'нести корзина', 'correct' => ['нести', 'корзина'], 'extra' => []],
                        'ar' => ['sentence' => 'الحمل سلة', 'correct' => ['الحمل', 'سلة'], 'extra' => []],
                        'az' => ['sentence' => 'daşımaq səbət', 'correct' => ['daşımaq', 'səbət'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'meat', 'in', 'a', 'bag'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'La carne en una bolsa', 'correct' => ['la', 'carne', 'en', 'una', 'bolsa'], 'extra' => ['llevar']],
                            'de' => ['sentence' => 'Das Fleisch in einer Tüte', 'correct' => ['das', 'Fleisch', 'in', 'einer', 'Tüte'], 'extra' => ['tragen']],
                            'ja' => ['sentence' => '袋の中の肉', 'correct' => ['袋', 'の', '中', 'の', '肉'], 'extra' => ['運ぶ']],
                            'ko' => ['sentence' => '봉투 안의 고기', 'correct' => ['봉투', '안의', '고기'], 'extra' => ['나르다']],
                            'fr' => ['sentence' => 'La viande dans un sac', 'correct' => ['la', 'viande', 'dans', 'un', 'sac'], 'extra' => ['porter']],
                            'tr' => ['sentence' => 'poşette et', 'correct' => ['poşette', 'et'], 'extra' => []],
                        'ru' => ['sentence' => 'мясо в пакет', 'correct' => ['мясо', 'в', 'пакет'], 'extra' => []],
                        'ar' => ['sentence' => 'لحم في كيس', 'correct' => ['لحم', 'في', 'كيس'], 'extra' => []],
                        'az' => ['sentence' => 'ət içində bir torba', 'correct' => ['ət', 'içində', 'bir', 'torba'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to carry', 'a', 'heavy', 'bag'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Llevar una bolsa pesada', 'correct' => ['llevar', 'una', 'pesado', 'bolsa'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Eine schwere Tüte tragen', 'correct' => ['tragen', 'eine', 'schwer', 'Tüte'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => '重い袋を運ぶ', 'correct' => ['重い', '袋', 'を', '運ぶ'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '무거운 봉투를 나르다', 'correct' => ['무거운', '봉투를', '나르다'], 'extra' => ['바구니']],
                            'fr' => ['sentence' => 'Porter un sac lourd', 'correct' => ['porter', 'un', 'sac', 'lourd'], 'extra' => ['panier']],
                            'tr' => ['sentence' => 'ağır bir poşet taşımak', 'correct' => ['ağır', 'bir', 'poşet', 'taşımak'], 'extra' => []],
                        'ru' => ['sentence' => 'нести тяжёлый пакет', 'correct' => ['нести', 'тяжёлый', 'пакет'], 'extra' => []],
                        'ar' => ['sentence' => 'الحمل ثقيل كيس', 'correct' => ['الحمل', 'ثقيل', 'كيس'], 'extra' => []],
                        'az' => ['sentence' => 'daşımaq bir ağır torba', 'correct' => ['daşımaq', 'bir', 'ağır', 'torba'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Chicken With Rice', 5,
                pictures: [['en' => 'Chicken', 'img' => 'chicken'], ['en' => 'Rice', 'img' => 'rice']],
                plain: [['en' => 'Together'], ['en' => 'Also']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'chicken', 'and', 'the', 'rice', 'together'], 'blank' => 5,
                        'tr' => [
                            'es' => ['sentence' => 'El pollo y el arroz juntos', 'correct' => ['el', 'pollo', 'y', 'el', 'arroz', 'juntos'], 'extra' => ['también']],
                            'de' => ['sentence' => 'Das Hähnchen und der Reis zusammen', 'correct' => ['das', 'Hähnchen', 'und', 'der', 'Reis', 'zusammen'], 'extra' => ['auch']],
                            'ja' => ['sentence' => '鶏肉とご飯を一緒に', 'correct' => ['鶏肉', 'と', 'ご飯', 'を', '一緒に'], 'extra' => ['も']],
                            'ko' => ['sentence' => '닭고기와 밥 같이', 'correct' => ['닭고기와', '밥', '같이'], 'extra' => ['또한']],
                            'fr' => ['sentence' => 'Le poulet et le riz ensemble', 'correct' => ['le', 'poulet', 'et', 'le', 'riz', 'ensemble'], 'extra' => ['aussi']],
                            'tr' => ['sentence' => 'tavuk ve pirinç birlikte', 'correct' => ['tavuk', 've', 'pirinç', 'birlikte'], 'extra' => []],
                        'ru' => ['sentence' => 'курица и рис вместе', 'correct' => ['курица', 'и', 'рис', 'вместе'], 'extra' => []],
                        'ar' => ['sentence' => 'دجاج و أرز معا', 'correct' => ['دجاج', 'و', 'أرز', 'معا'], 'extra' => []],
                        'az' => ['sentence' => 'toyuq və düyü birlikdə', 'correct' => ['toyuq', 'və', 'düyü', 'birlikdə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['some', 'rice', 'also'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Arroz también', 'correct' => ['algo de', 'arroz', 'también'], 'extra' => ['juntos', 'pollo']],
                            'de' => ['sentence' => 'Auch etwas Reis', 'correct' => ['auch', 'etwas', 'Reis'], 'extra' => ['zusammen', 'Hähnchen']],
                            'ja' => ['sentence' => 'ご飯も', 'correct' => ['ご飯', 'も'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '밥도', 'correct' => ['밥도'], 'extra' => ['함께']],
                            'fr' => ['sentence' => 'Du riz aussi', 'correct' => ['du', 'riz', 'aussi'], 'extra' => ['ensemble']],
                            'tr' => ['sentence' => 'biraz pirinç de', 'correct' => ['biraz', 'pirinç', 'de'], 'extra' => []],
                        'ru' => ['sentence' => 'немного рис тоже', 'correct' => ['немного', 'рис', 'тоже'], 'extra' => []],
                        'ar' => ['sentence' => 'بعض أرز أيضا', 'correct' => ['بعض', 'أرز', 'أيضا'], 'extra' => []],
                        'az' => ['sentence' => 'bir az düyü həmçinin', 'correct' => ['bir az', 'düyü', 'həmçinin'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'chicken', 'with', 'the', 'rice'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El pollo con el arroz', 'correct' => ['el', 'pollo', 'con', 'el', 'arroz'], 'extra' => ['juntos']],
                            'de' => ['sentence' => 'Das Hähnchen mit dem Reis', 'correct' => ['das', 'Hähnchen', 'mit', 'dem', 'Reis'], 'extra' => ['zusammen']],
                            'ja' => ['sentence' => 'ご飯と一緒に鶏肉', 'correct' => ['ご飯', 'と一緒に', '鶏肉'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '밥과 함께 닭고기', 'correct' => ['밥과', '함께', '닭고기'], 'extra' => ['함께']],
                            'fr' => ['sentence' => 'Le poulet avec le riz', 'correct' => ['le', 'poulet', 'avec', 'le', 'riz'], 'extra' => ['ensemble']],
                            'tr' => ['sentence' => 'pirinçli tavuk', 'correct' => ['pirinçli', 'tavuk'], 'extra' => []],
                        'ru' => ['sentence' => 'курица с рис', 'correct' => ['курица', 'с', 'рис'], 'extra' => []],
                        'ar' => ['sentence' => 'دجاج مع أرز', 'correct' => ['دجاج', 'مع', 'أرز'], 'extra' => []],
                        'az' => ['sentence' => 'toyuq ilə düyü', 'correct' => ['toyuq', 'ilə', 'düyü'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
