<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket05Seeder extends Seeder
{
    private const PICTURES = [
        'Viande' => 'meat', 'Poulet' => 'chicken', 'Poisson' => 'fish', 'Riz' => 'rice',
        'Panier' => 'basket', 'Boîte' => 'box', 'Fromage' => 'cheese', 'Pain' => 'bread',
    ];

    /**
     * French Chapter 4, Unit 5 — the meat and fish counter.
     *
     * The nouns are all familiar from Chapter 3, which is the point: this unit
     * is about the transaction around them, so it spends its new-word budget on
     * moins/plus, demander and porter rather than on more food.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Meat and Fish', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Fresh or Expensive', 1,
                pictures: [['fr' => 'Viande', 'img' => 'meat'], ['fr' => 'Poulet', 'img' => 'chicken']],
                plain: [['fr' => 'Cher'], ['fr' => 'Bon marché']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'poulet', 'est', 'cher'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The chicken is expensive', 'correct' => ['the', 'chicken', 'is', 'expensive'], 'extra' => ['cheap', 'meat']],
                            'az' => ['sentence' => 'toyuq bahalı', 'correct' => ['toyuq', 'bahalı'], 'extra' => ['ucuz', 'ət']],
                            'ar' => ['sentence' => 'دجاج غالي', 'correct' => ['دجاج', 'غالي'], 'extra' => ['رخيص', 'لحم']],
                            'ru' => ['sentence' => 'курица дорогой', 'correct' => ['курица', 'дорогой'], 'extra' => ['дешёвый', 'мясо']],
                            'es' => ['sentence' => 'El pollo es caro', 'correct' => ['el', 'pollo', 'es', 'caro'], 'extra' => ['barato', 'carne']],
                            'de' => ['sentence' => 'Das Hähnchen ist teuer', 'correct' => ['das', 'Hähnchen', 'ist', 'teuer'], 'extra' => ['billig', 'Fleisch']],
                            'ja' => ['sentence' => '鶏肉は高いです', 'correct' => ['鶏肉', 'は', '高い', 'です'], 'extra' => ['安い', '肉']],
                            'ko' => ['sentence' => '닭고기는 비쌉니다', 'correct' => ['닭고기는', '비쌉니다'], 'extra' => ['싼', '고기']],
                            'tr' => ['sentence' => 'tavuk pahalı', 'correct' => ['tavuk', 'pahalı'], 'extra' => ['ucuz', 'et']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'poulet', 'bon marché'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A cheap chicken', 'correct' => ['a', 'cheap', 'chicken'], 'extra' => ['expensive', 'meat']],
                            'az' => ['sentence' => 'bir ucuz toyuq', 'correct' => ['bir', 'ucuz', 'toyuq'], 'extra' => ['bahalı', 'ət']],
                            'ar' => ['sentence' => 'رخيص دجاج', 'correct' => ['رخيص', 'دجاج'], 'extra' => ['غالي', 'لحم']],
                            'ru' => ['sentence' => 'дешёвый курица', 'correct' => ['дешёвый', 'курица'], 'extra' => ['дорогой', 'мясо']],
                            'es' => ['sentence' => 'Un pollo barato', 'correct' => ['un', 'pollo', 'barato'], 'extra' => ['caro', 'carne']],
                            'de' => ['sentence' => 'Ein billiges Hähnchen', 'correct' => ['ein', 'billig', 'Hähnchen'], 'extra' => ['teuer', 'Fleisch']],
                            'ja' => ['sentence' => '安い鶏肉', 'correct' => ['安い', '鶏肉'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '싼 닭고기', 'correct' => ['싼', '닭고기'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'ucuz bir tavuk', 'correct' => ['ucuz', 'bir', 'tavuk'], 'extra' => ['pahalı', 'et']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'viande', 'est', 'bon marché'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The meat is cheap', 'correct' => ['the', 'meat', 'is', 'cheap'], 'extra' => ['expensive', 'chicken']],
                            'az' => ['sentence' => 'ət ucuz', 'correct' => ['ət', 'ucuz'], 'extra' => ['bahalı', 'toyuq']],
                            'ar' => ['sentence' => 'لحم رخيص', 'correct' => ['لحم', 'رخيص'], 'extra' => ['غالي', 'دجاج']],
                            'ru' => ['sentence' => 'мясо дешёвый', 'correct' => ['мясо', 'дешёвый'], 'extra' => ['дорогой', 'курица']],
                            'es' => ['sentence' => 'La carne es barata', 'correct' => ['la', 'carne', 'es', 'barato'], 'extra' => ['caro', 'pollo']],
                            'de' => ['sentence' => 'Das Fleisch ist billig', 'correct' => ['das', 'Fleisch', 'ist', 'billig'], 'extra' => ['teuer', 'Hähnchen']],
                            'ja' => ['sentence' => '肉は安いです', 'correct' => ['肉', 'は', '安い', 'です'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '고기는 쌉니다', 'correct' => ['고기는', '쌉니다'], 'extra' => ['비싼']],
                            'tr' => ['sentence' => 'et ucuz', 'correct' => ['et', 'ucuz'], 'extra' => ['pahalı', 'tavuk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Less and More', 2,
                pictures: [['fr' => 'Poisson', 'img' => 'fish'], ['fr' => 'Viande', 'img' => 'meat']],
                plain: [['fr' => 'Moins'], ['fr' => 'Plus']],
                phrases: [
                    'a' => [
                        'words' => ['moins', 'de', 'viande'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Less meat', 'correct' => ['less', 'of', 'meat'], 'extra' => ['more', 'fish']],
                            'az' => ['sentence' => 'daha az ət', 'correct' => ['daha az', 'ət'], 'extra' => ['daha', 'balıq']],
                            'ar' => ['sentence' => 'أقل لحم', 'correct' => ['أقل', 'لحم'], 'extra' => ['أكثر', 'سمك']],
                            'ru' => ['sentence' => 'меньше мясо', 'correct' => ['меньше', 'мясо'], 'extra' => ['больше', 'рыба']],
                            'es' => ['sentence' => 'Menos carne', 'correct' => ['menos', 'de', 'carne'], 'extra' => ['más', 'pescado']],
                            'de' => ['sentence' => 'Weniger Fleisch', 'correct' => ['weniger', 'von', 'Fleisch'], 'extra' => ['mehr', 'Fisch']],
                            'ja' => ['sentence' => '肉を少なく', 'correct' => ['肉', 'を', '少なく'], 'extra' => ['もっと', '魚']],
                            'ko' => ['sentence' => '고기 적게', 'correct' => ['고기', '적게'], 'extra' => ['더', '생선']],
                            'tr' => ['sentence' => 'daha az et', 'correct' => ['daha', 'az', 'et'], 'extra' => ['daha çok', 'balık']],
                        ],
                    ],
                    'b' => [
                        'words' => ['plus', 'de', 'poisson'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'More fish', 'correct' => ['more', 'of', 'fish'], 'extra' => ['less', 'meat']],
                            'az' => ['sentence' => 'daha balıq', 'correct' => ['daha', 'balıq'], 'extra' => ['daha az', 'ət']],
                            'ar' => ['sentence' => 'أكثر سمك', 'correct' => ['أكثر', 'سمك'], 'extra' => ['أقل', 'لحم']],
                            'ru' => ['sentence' => 'больше рыба', 'correct' => ['больше', 'рыба'], 'extra' => ['меньше', 'мясо']],
                            'es' => ['sentence' => 'Más pescado', 'correct' => ['más', 'de', 'pescado'], 'extra' => ['menos', 'carne']],
                            'de' => ['sentence' => 'Mehr Fisch', 'correct' => ['mehr', 'von', 'Fisch'], 'extra' => ['weniger', 'Fleisch']],
                            'ja' => ['sentence' => '魚をもっと', 'correct' => ['魚', 'を', 'もっと'], 'extra' => ['もっと少ない']],
                            'ko' => ['sentence' => '생선 더', 'correct' => ['생선', '더'], 'extra' => ['더 적게']],
                            'tr' => ['sentence' => 'daha çok balık', 'correct' => ['daha', 'çok', 'balık'], 'extra' => ['daha az', 'et']],
                        ],
                    ],
                    'c' => [
                        'words' => ['moins', 'de', 'viande', 'et', 'plus', 'de', 'poisson'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Less meat and more fish', 'correct' => ['less', 'of', 'meat', 'and', 'more', 'of', 'fish'], 'extra' => ['chicken']],
                            'az' => ['sentence' => 'daha az ət və daha balıq', 'correct' => ['daha az', 'ət', 'və', 'daha', 'balıq'], 'extra' => ['toyuq']],
                            'ar' => ['sentence' => 'أقل لحم و أكثر سمك', 'correct' => ['أقل', 'لحم', 'و', 'أكثر', 'سمك'], 'extra' => ['دجاج']],
                            'ru' => ['sentence' => 'меньше мясо и больше рыба', 'correct' => ['меньше', 'мясо', 'и', 'больше', 'рыба'], 'extra' => ['курица']],
                            'es' => ['sentence' => 'Menos carne y más pescado', 'correct' => ['menos', 'de', 'carne', 'y', 'más', 'de', 'pescado'], 'extra' => ['pollo']],
                            'de' => ['sentence' => 'Weniger Fleisch und mehr Fisch', 'correct' => ['weniger', 'von', 'Fleisch', 'und', 'mehr', 'von', 'Fisch'], 'extra' => ['Hähnchen']],
                            'ja' => ['sentence' => '肉を少なく魚をもっと', 'correct' => ['肉', 'を', '少なく', '魚', 'を', 'もっと'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '고기 적게 생선 더', 'correct' => ['고기', '적게', '생선', '더'], 'extra' => ['닭고기']],
                            'tr' => ['sentence' => 'daha az et ve daha çok balık', 'correct' => ['daha', 'az', 'et', 've', 'daha', 'çok', 'balık'], 'extra' => ['tavuk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Asking the Price', 3,
                pictures: [['fr' => 'Poulet', 'img' => 'chicken'], ['fr' => 'Poisson', 'img' => 'fish']],
                plain: [['fr' => 'Demander'], ['fr' => 'Prix']],
                phrases: [
                    'a' => [
                        'words' => ['demander', 'le', 'prix'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To ask the price', 'correct' => ['to ask', 'the', 'price'], 'extra' => ['chicken', 'fish']],
                            'az' => ['sentence' => 'soruşmaq qiymət', 'correct' => ['soruşmaq', 'qiymət'], 'extra' => ['toyuq', 'balıq']],
                            'ar' => ['sentence' => 'السؤال سعر', 'correct' => ['السؤال', 'سعر'], 'extra' => ['دجاج', 'سمك']],
                            'ru' => ['sentence' => 'спросить цена', 'correct' => ['спросить', 'цена'], 'extra' => ['курица', 'рыба']],
                            'es' => ['sentence' => 'Preguntar el precio', 'correct' => ['preguntar', 'el', 'precio'], 'extra' => ['pollo', 'pescado']],
                            'de' => ['sentence' => 'Den Preis fragen', 'correct' => ['den', 'Preis', 'fragen'], 'extra' => ['Hähnchen', 'Fisch']],
                            'ja' => ['sentence' => '値段を尋ねる', 'correct' => ['値段', 'を', '尋ねる'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '가격을 묻다', 'correct' => ['가격을', '묻다'], 'extra' => ['닭고기']],
                            'tr' => ['sentence' => 'fiyatı sormak', 'correct' => ['fiyatı', 'sormak'], 'extra' => ['tavuk', 'balık']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'prix', 'du', 'poisson'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The price of the fish', 'correct' => ['the', 'price', 'of the', 'fish'], 'extra' => ['to ask', 'chicken']],
                            'az' => ['sentence' => 'qiymət balıq', 'correct' => ['qiymət', 'balıq'], 'extra' => ['soruşmaq', 'toyuq']],
                            'ar' => ['sentence' => 'سعر سمك', 'correct' => ['سعر', 'سمك'], 'extra' => ['السؤال', 'دجاج']],
                            'ru' => ['sentence' => 'цена рыба', 'correct' => ['цена', 'рыба'], 'extra' => ['спросить', 'курица']],
                            'es' => ['sentence' => 'El precio del pescado', 'correct' => ['el', 'precio', 'del', 'pescado'], 'extra' => ['preguntar', 'pollo']],
                            'de' => ['sentence' => 'Der Preis des Fisches', 'correct' => ['der', 'Preis', 'des', 'Fisch'], 'extra' => ['fragen', 'Hähnchen']],
                            'ja' => ['sentence' => '魚の値段', 'correct' => ['魚', 'の', '値段'], 'extra' => ['尋ねる']],
                            'ko' => ['sentence' => '생선의 가격', 'correct' => ['생선의', '가격'], 'extra' => ['묻다']],
                            'tr' => ['sentence' => 'balığın fiyatı', 'correct' => ['balığın', 'fiyatı'], 'extra' => ['sormak', 'tavuk']],
                        ],
                    ],
                    'c' => [
                        'words' => ['demander', 'le', 'prix', 'du', 'poulet'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'To ask the price of the chicken', 'correct' => ['to ask', 'the', 'price', 'of the', 'chicken'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'soruşmaq qiymət toyuq', 'correct' => ['soruşmaq', 'qiymət', 'toyuq'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'السؤال سعر دجاج', 'correct' => ['السؤال', 'سعر', 'دجاج'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'спросить цена курица', 'correct' => ['спросить', 'цена', 'курица'], 'extra' => ['рыба']],
                            'es' => ['sentence' => 'Preguntar el precio del pollo', 'correct' => ['preguntar', 'el', 'precio', 'del', 'pollo'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Den Preis des Hähnchens fragen', 'correct' => ['fragen', 'den', 'Preis', 'des', 'Hähnchen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '鶏肉の値段を尋ねる', 'correct' => ['鶏肉', 'の', '値段', 'を', '尋ねる'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기의 가격을 묻다', 'correct' => ['닭고기의', '가격을', '묻다'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'tavuğun fiyatını sormak', 'correct' => ['tavuğun', 'fiyatını', 'sormak'], 'extra' => ['balık']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Carrying It Home', 4,
                pictures: [['fr' => 'Viande', 'img' => 'meat'], ['fr' => 'Panier', 'img' => 'basket']],
                plain: [['fr' => 'Porter'], ['fr' => 'Sac']],
                phrases: [
                    'a' => [
                        'words' => ['porter', 'le', 'panier'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To carry the basket', 'correct' => ['to carry', 'the', 'basket'], 'extra' => ['bag', 'meat']],
                            'az' => ['sentence' => 'daşımaq səbət', 'correct' => ['daşımaq', 'səbət'], 'extra' => ['torba', 'ət']],
                            'ar' => ['sentence' => 'الحمل سلة', 'correct' => ['الحمل', 'سلة'], 'extra' => ['كيس', 'لحم']],
                            'ru' => ['sentence' => 'нести корзина', 'correct' => ['нести', 'корзина'], 'extra' => ['пакет', 'мясо']],
                            'es' => ['sentence' => 'Llevar la cesta', 'correct' => ['llevar', 'la', 'cesta'], 'extra' => ['bolsa', 'carne']],
                            'de' => ['sentence' => 'Den Korb tragen', 'correct' => ['den', 'Korb', 'tragen'], 'extra' => ['Tüte', 'Fleisch']],
                            'ja' => ['sentence' => 'かごを運ぶ', 'correct' => ['かご', 'を', '運ぶ'], 'extra' => ['袋']],
                            'ko' => ['sentence' => '바구니를 나르다', 'correct' => ['바구니를', '나르다'], 'extra' => ['봉투']],
                            'tr' => ['sentence' => 'sepeti taşımak', 'correct' => ['sepeti', 'taşımak'], 'extra' => ['poşet', 'et']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'viande', 'dans', 'un', 'sac'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The meat in a bag', 'correct' => ['the', 'meat', 'in', 'a', 'bag'], 'extra' => ['to carry', 'basket']],
                            'az' => ['sentence' => 'ət içində bir torba', 'correct' => ['ət', 'içində', 'bir', 'torba'], 'extra' => ['daşımaq', 'səbət']],
                            'ar' => ['sentence' => 'لحم في كيس', 'correct' => ['لحم', 'في', 'كيس'], 'extra' => ['الحمل', 'سلة']],
                            'ru' => ['sentence' => 'мясо в пакет', 'correct' => ['мясо', 'в', 'пакет'], 'extra' => ['нести', 'корзина']],
                            'es' => ['sentence' => 'La carne en una bolsa', 'correct' => ['la', 'carne', 'en', 'una', 'bolsa'], 'extra' => ['llevar', 'cesta']],
                            'de' => ['sentence' => 'Das Fleisch in einer Tüte', 'correct' => ['das', 'Fleisch', 'in', 'einer', 'Tüte'], 'extra' => ['tragen', 'Korb']],
                            'ja' => ['sentence' => '袋の中の肉', 'correct' => ['袋', 'の', '中', 'の', '肉'], 'extra' => ['運ぶ']],
                            'ko' => ['sentence' => '봉투 안의 고기', 'correct' => ['봉투', '안의', '고기'], 'extra' => ['나르다']],
                            'tr' => ['sentence' => 'poşette et', 'correct' => ['poşette', 'et'], 'extra' => ['taşımak', 'sepet']],
                        ],
                    ],
                    'c' => [
                        'words' => ['porter', 'un', 'sac', 'lourd'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To carry a heavy bag', 'correct' => ['to carry', 'a', 'heavy', 'bag'], 'extra' => ['basket', 'meat']],
                            'az' => ['sentence' => 'daşımaq bir ağır torba', 'correct' => ['daşımaq', 'bir', 'ağır', 'torba'], 'extra' => ['səbət', 'ət']],
                            'ar' => ['sentence' => 'الحمل ثقيل كيس', 'correct' => ['الحمل', 'ثقيل', 'كيس'], 'extra' => ['سلة', 'لحم']],
                            'ru' => ['sentence' => 'нести тяжёлый пакет', 'correct' => ['нести', 'тяжёлый', 'пакет'], 'extra' => ['корзина', 'мясо']],
                            'es' => ['sentence' => 'Llevar una bolsa pesada', 'correct' => ['llevar', 'una', 'pesado', 'bolsa'], 'extra' => ['cesta', 'carne']],
                            'de' => ['sentence' => 'Eine schwere Tüte tragen', 'correct' => ['tragen', 'eine', 'schwer', 'Tüte'], 'extra' => ['Korb', 'Fleisch']],
                            'ja' => ['sentence' => '重い袋を運ぶ', 'correct' => ['重い', '袋', 'を', '運ぶ'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '무거운 봉투를 나르다', 'correct' => ['무거운', '봉투를', '나르다'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'ağır bir poşet taşımak', 'correct' => ['ağır', 'bir', 'poşet', 'taşımak'], 'extra' => ['sepet', 'et']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Chicken With Rice', 5,
                pictures: [['fr' => 'Poulet', 'img' => 'chicken'], ['fr' => 'Riz', 'img' => 'rice']],
                plain: [['fr' => 'Ensemble'], ['fr' => 'Aussi']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'poulet', 'et', 'le', 'riz', 'ensemble'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'The chicken and the rice together', 'correct' => ['the', 'chicken', 'and', 'the', 'rice', 'together'], 'extra' => ['also']],
                            'az' => ['sentence' => 'toyuq və düyü birlikdə', 'correct' => ['toyuq', 'və', 'düyü', 'birlikdə'], 'extra' => ['həmçinin']],
                            'ar' => ['sentence' => 'دجاج و أرز معا', 'correct' => ['دجاج', 'و', 'أرز', 'معا'], 'extra' => ['أيضا']],
                            'ru' => ['sentence' => 'курица и рис вместе', 'correct' => ['курица', 'и', 'рис', 'вместе'], 'extra' => ['тоже']],
                            'es' => ['sentence' => 'El pollo y el arroz juntos', 'correct' => ['el', 'pollo', 'y', 'el', 'arroz', 'juntos'], 'extra' => ['también']],
                            'de' => ['sentence' => 'Das Hähnchen und der Reis zusammen', 'correct' => ['das', 'Hähnchen', 'und', 'der', 'Reis', 'zusammen'], 'extra' => ['auch']],
                            'ja' => ['sentence' => '鶏肉とご飯を一緒に', 'correct' => ['鶏肉', 'と', 'ご飯', 'を', '一緒に'], 'extra' => ['も']],
                            'ko' => ['sentence' => '닭고기와 밥 같이', 'correct' => ['닭고기와', '밥', '같이'], 'extra' => ['또한']],
                            'tr' => ['sentence' => 'tavuk ve pirinç birlikte', 'correct' => ['tavuk', 've', 'pirinç', 'birlikte'], 'extra' => ['de']],
                        ],
                    ],
                    'b' => [
                        'words' => ['du', 'riz', 'aussi'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Some rice too', 'correct' => ['some', 'rice', 'also'], 'extra' => ['together', 'chicken']],
                            'az' => ['sentence' => 'bir az düyü həmçinin', 'correct' => ['bir az', 'düyü', 'həmçinin'], 'extra' => ['birlikdə', 'toyuq']],
                            'ar' => ['sentence' => 'بعض أرز أيضا', 'correct' => ['بعض', 'أرز', 'أيضا'], 'extra' => ['معا', 'دجاج']],
                            'ru' => ['sentence' => 'немного рис тоже', 'correct' => ['немного', 'рис', 'тоже'], 'extra' => ['вместе', 'курица']],
                            'es' => ['sentence' => 'Arroz también', 'correct' => ['algo de', 'arroz', 'también'], 'extra' => ['juntos', 'pollo']],
                            'de' => ['sentence' => 'Auch etwas Reis', 'correct' => ['auch', 'etwas', 'Reis'], 'extra' => ['zusammen', 'Hähnchen']],
                            'ja' => ['sentence' => 'ご飯も', 'correct' => ['ご飯', 'も'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '밥도', 'correct' => ['밥도'], 'extra' => ['같이']],
                            'tr' => ['sentence' => 'biraz pirinç de', 'correct' => ['biraz', 'pirinç', 'de'], 'extra' => ['birlikte', 'tavuk']],
                        ],
                    ],
                    'c' => [
                        'words' => ['manger', 'le', 'poulet', 'avec', 'le', 'riz'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To eat the chicken with the rice', 'correct' => ['to eat', 'the', 'chicken', 'with', 'the', 'rice'], 'extra' => ['together', 'also']],
                            'az' => ['sentence' => 'yemək yemək toyuq ilə düyü', 'correct' => ['yemək yemək', 'toyuq', 'ilə', 'düyü'], 'extra' => ['birlikdə', 'həmçinin']],
                            'ar' => ['sentence' => 'الأكل دجاج مع أرز', 'correct' => ['الأكل', 'دجاج', 'مع', 'أرز'], 'extra' => ['معا', 'أيضا']],
                            'ru' => ['sentence' => 'кушать курица с рис', 'correct' => ['кушать', 'курица', 'с', 'рис'], 'extra' => ['вместе', 'тоже']],
                            'es' => ['sentence' => 'Comer el pollo con el arroz', 'correct' => ['comer', 'el', 'pollo', 'con', 'el', 'arroz'], 'extra' => ['juntos', 'también']],
                            'de' => ['sentence' => 'Das Hähnchen mit dem Reis essen', 'correct' => ['das', 'Hähnchen', 'mit', 'dem', 'Reis', 'essen'], 'extra' => ['zusammen', 'auch']],
                            'ja' => ['sentence' => 'ご飯と一緒に鶏肉を食べる', 'correct' => ['ご飯', 'と一緒に', '鶏肉', 'を', '食べる'], 'extra' => ['一緒に']],
                            'ko' => ['sentence' => '밥과 함께 닭고기를 먹다', 'correct' => ['밥과', '함께', '닭고기를', '먹다'], 'extra' => ['같이']],
                            'tr' => ['sentence' => 'tavuğu pirinçle yemek', 'correct' => ['tavuğu', 'pirinçle', 'yemek'], 'extra' => ['birlikte', 'de']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
