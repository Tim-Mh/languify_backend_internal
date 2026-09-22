<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket05Seeder extends Seeder
{
    private const PICTURES = ['고기' => 'meat', '닭고기' => 'chicken', '생선' => 'fish', '바구니' => 'basket', '밥' => 'rice'];

    /**
     * Korean Supermarket, Unit 5, the Korean twin of the English "Meat and Fish" unit.
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

        $builder->seedUnit($chapter->id, 5, '유닛 5: 고기와 생선', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 고기 · 닭고기', 1,
                pictures: [['ko' => '고기', 'img' => 'meat'], ['ko' => '닭고기', 'img' => 'chicken']],
                plain: [['ko' => '비싼'], ['ko' => '싼']],
                phrases: [
                    'a' => [
                        'words' => ['닭고기는', '비쌉니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the chicken is expensive', 'correct' => ['the', 'chicken', 'is', 'expensive'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'toyuq bahalı', 'correct' => ['toyuq', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'دجاج غالي', 'correct' => ['دجاج', 'غالي'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'курица дорогой', 'correct' => ['курица', 'дорогой'], 'extra' => ['дешёвый']],
                            'es' => ['sentence' => 'El pollo es caro', 'correct' => ['el', 'pollo', 'es', 'caro'], 'extra' => ['barato', 'carne']],
                            'de' => ['sentence' => 'Das Hähnchen ist teuer', 'correct' => ['das', 'Hähnchen', 'ist', 'teuer'], 'extra' => ['billig', 'Fleisch']],
                            'fr' => ['sentence' => 'Le poulet est cher', 'correct' => ['le', 'poulet', 'est', 'cher'], 'extra' => ['bon marché', 'viande']],
                            'ja' => ['sentence' => '鶏肉は高いです', 'correct' => ['鶏肉', 'は', '高い', 'です'], 'extra' => ['安い']],
                            'tr' => ['sentence' => 'tavuk pahalı', 'correct' => ['tavuk', 'pahalı'], 'extra' => ['ucuz']],
                        ],
                    ],
                    'b' => [
                        'words' => ['싼', '닭고기'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a cheap chicken', 'correct' => ['a', 'cheap', 'chicken'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'bir ucuz toyuq', 'correct' => ['bir', 'ucuz', 'toyuq'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'رخيص دجاج', 'correct' => ['رخيص', 'دجاج'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'дешёвый курица', 'correct' => ['дешёвый', 'курица'], 'extra' => ['дорогой']],
                            'es' => ['sentence' => 'Un pollo barato', 'correct' => ['un', 'pollo', 'barato'], 'extra' => ['caro', 'carne']],
                            'de' => ['sentence' => 'Ein billiges Hähnchen', 'correct' => ['ein', 'billig', 'Hähnchen'], 'extra' => ['teuer', 'Fleisch']],
                            'fr' => ['sentence' => 'Un poulet bon marché', 'correct' => ['un', 'poulet', 'bon marché'], 'extra' => ['cher']],
                            'ja' => ['sentence' => '安い鶏肉', 'correct' => ['安い', '鶏肉'], 'extra' => ['高い']],
                            'tr' => ['sentence' => 'ucuz bir tavuk', 'correct' => ['ucuz', 'bir', 'tavuk'], 'extra' => ['pahalı']],
                        ],
                    ],
                    'c' => [
                        'words' => ['고기는', '쌉니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the meat is cheap', 'correct' => ['the', 'meat', 'is', 'cheap'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'ət ucuz', 'correct' => ['ət', 'ucuz'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'لحم رخيص', 'correct' => ['لحم', 'رخيص'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'мясо дешёвый', 'correct' => ['мясо', 'дешёвый'], 'extra' => ['дорогой']],
                            'es' => ['sentence' => 'La carne es barata', 'correct' => ['la', 'carne', 'es', 'barato'], 'extra' => ['caro', 'pollo']],
                            'de' => ['sentence' => 'Das Fleisch ist billig', 'correct' => ['das', 'Fleisch', 'ist', 'billig'], 'extra' => ['teuer', 'Hähnchen']],
                            'fr' => ['sentence' => 'La viande est bon marché', 'correct' => ['la', 'viande', 'est', 'bon marché'], 'extra' => ['cher']],
                            'ja' => ['sentence' => '肉は安いです', 'correct' => ['肉', 'は', '安い', 'です'], 'extra' => ['高い']],
                            'tr' => ['sentence' => 'et ucuz', 'correct' => ['et', 'ucuz'], 'extra' => ['pahalı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 생선 · 고기', 2,
                pictures: [['ko' => '생선', 'img' => 'fish'], ['ko' => '고기', 'img' => 'meat']],
                plain: [['ko' => '덜'], ['ko' => '더']],
                phrases: [
                    'a' => [
                        'words' => ['고기', '적게'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'less meat', 'correct' => ['less', 'meat'], 'extra' => ['more']],
                            'az' => ['sentence' => 'daha az ət', 'correct' => ['daha az', 'ət'], 'extra' => ['daha']],
                            'ar' => ['sentence' => 'أقل لحم', 'correct' => ['أقل', 'لحم'], 'extra' => ['أكثر']],
                            'ru' => ['sentence' => 'меньше мясо', 'correct' => ['меньше', 'мясо'], 'extra' => ['больше']],
                            'es' => ['sentence' => 'Menos carne', 'correct' => ['menos', 'carne'], 'extra' => ['más', 'pescado']],
                            'de' => ['sentence' => 'Weniger Fleisch', 'correct' => ['weniger', 'Fleisch'], 'extra' => ['mehr', 'Fisch']],
                            'fr' => ['sentence' => 'Moins de viande', 'correct' => ['moins', 'viande'], 'extra' => ['plus', 'poisson']],
                            'ja' => ['sentence' => '肉を少なく', 'correct' => ['肉', 'を', '少なく'], 'extra' => ['もっと']],
                            'tr' => ['sentence' => 'daha az et', 'correct' => ['daha', 'az', 'et'], 'extra' => ['daha çok']],
                        ],
                    ],
                    'b' => [
                        'words' => ['생선', '더'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'more fish', 'correct' => ['more', 'fish'], 'extra' => ['less']],
                            'az' => ['sentence' => 'daha balıq', 'correct' => ['daha', 'balıq'], 'extra' => ['daha az']],
                            'ar' => ['sentence' => 'أكثر سمك', 'correct' => ['أكثر', 'سمك'], 'extra' => ['أقل']],
                            'ru' => ['sentence' => 'больше рыба', 'correct' => ['больше', 'рыба'], 'extra' => ['меньше']],
                            'es' => ['sentence' => 'Más pescado', 'correct' => ['más', 'pescado'], 'extra' => ['menos', 'carne']],
                            'de' => ['sentence' => 'Mehr Fisch', 'correct' => ['mehr', 'Fisch'], 'extra' => ['weniger', 'Fleisch']],
                            'fr' => ['sentence' => 'Plus de poisson', 'correct' => ['plus', 'poisson'], 'extra' => ['moins']],
                            'ja' => ['sentence' => '魚をもっと', 'correct' => ['魚', 'を', 'もっと'], 'extra' => ['より少ない']],
                            'tr' => ['sentence' => 'daha çok balık', 'correct' => ['daha', 'çok', 'balık'], 'extra' => ['daha az']],
                        ],
                    ],
                    'c' => [
                        'words' => ['고기', '적게', '생선', '더'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'less meat and more fish', 'correct' => ['less', 'meat', 'and', 'more', 'fish'], 'extra' => ['chicken']],
                            'az' => ['sentence' => 'daha az ət və daha balıq', 'correct' => ['daha az', 'ət', 'və', 'daha', 'balıq'], 'extra' => ['toyuq']],
                            'ar' => ['sentence' => 'أقل لحم و أكثر سمك', 'correct' => ['أقل', 'لحم', 'و', 'أكثر', 'سمك'], 'extra' => ['دجاج']],
                            'ru' => ['sentence' => 'меньше мясо и больше рыба', 'correct' => ['меньше', 'мясо', 'и', 'больше', 'рыба'], 'extra' => ['курица']],
                            'es' => ['sentence' => 'Menos carne y más pescado', 'correct' => ['menos', 'carne', 'y', 'más', 'pescado'], 'extra' => ['pollo']],
                            'de' => ['sentence' => 'Weniger Fleisch und mehr Fisch', 'correct' => ['weniger', 'Fleisch', 'und', 'mehr', 'Fisch'], 'extra' => ['Hähnchen']],
                            'fr' => ['sentence' => 'Moins de viande et plus de poisson', 'correct' => ['moins', 'viande', 'et', 'plus', 'poisson'], 'extra' => ['poulet']],
                            'ja' => ['sentence' => '肉を少なく魚をもっと', 'correct' => ['肉', 'を', '少なく', '魚', 'を', 'もっと'], 'extra' => ['鶏肉']],
                            'tr' => ['sentence' => 'daha az et ve daha çok balık', 'correct' => ['daha', 'az', 'et', 've', 'daha', 'çok', 'balık'], 'extra' => ['tavuk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 닭고기 · 생선', 3,
                pictures: [['ko' => '닭고기', 'img' => 'chicken'], ['ko' => '생선', 'img' => 'fish']],
                plain: [['ko' => '가격'], ['ko' => '몇 개']],
                phrases: [
                    'a' => [
                        'words' => ['생선의', '가격'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the price of the fish', 'correct' => ['the', 'price', 'of', 'the', 'fish'], 'extra' => ['how many']],
                            'az' => ['sentence' => 'qiymət balıq', 'correct' => ['qiymət', 'balıq'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'سعر سمك', 'correct' => ['سعر', 'سمك'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'цена рыба', 'correct' => ['цена', 'рыба'], 'extra' => ['сколько']],
                            'es' => ['sentence' => 'El precio del pescado', 'correct' => ['el', 'precio', 'de', 'el', 'pescado'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Der Preis des Fisches', 'correct' => ['der', 'Preis', 'von', 'dem', 'Fisch'], 'extra' => ['wie viele']],
                            'fr' => ['sentence' => 'Le prix du poisson', 'correct' => ['le', 'prix', 'de', 'le', 'poisson'], 'extra' => ['combien']],
                            'ja' => ['sentence' => '魚の値段', 'correct' => ['魚', 'の', '値段'], 'extra' => ['いくつ']],
                            'tr' => ['sentence' => 'balığın fiyatı', 'correct' => ['balığın', 'fiyatı'], 'extra' => ['kaç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['닭고기는', '얼마입니까'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'how much for the chicken', 'correct' => ['how many', 'for', 'the', 'chicken'], 'extra' => ['price']],
                            'az' => ['sentence' => 'neçə üçün toyuq', 'correct' => ['neçə', 'üçün', 'toyuq'], 'extra' => ['qiymət']],
                            'ar' => ['sentence' => 'كم لأجل دجاج', 'correct' => ['كم', 'لأجل', 'دجاج'], 'extra' => ['سعر']],
                            'ru' => ['sentence' => 'сколько для курица', 'correct' => ['сколько', 'для', 'курица'], 'extra' => ['цена']],
                            'es' => ['sentence' => 'Cuánto por el pollo', 'correct' => ['cuántos', 'para', 'el', 'pollo'], 'extra' => ['precio']],
                            'de' => ['sentence' => 'Wie viel für das Hähnchen', 'correct' => ['wie viele', 'für', 'das', 'Hähnchen'], 'extra' => ['Preis']],
                            'fr' => ['sentence' => 'Combien pour le poulet', 'correct' => ['combien', 'pour', 'le', 'poulet'], 'extra' => ['prix']],
                            'ja' => ['sentence' => '鶏肉はいくつ', 'correct' => ['鶏肉', 'は', 'いくつ'], 'extra' => ['値段']],
                            'tr' => ['sentence' => 'tavuk kaç lira', 'correct' => ['tavuk', 'kaç', 'lira'], 'extra' => ['fiyat']],
                        ],
                    ],
                    'c' => [
                        'words' => ['닭고기의', '가격'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the price of the chicken', 'correct' => ['the', 'price', 'of', 'the', 'chicken'], 'extra' => ['how many']],
                            'az' => ['sentence' => 'qiymət toyuq', 'correct' => ['qiymət', 'toyuq'], 'extra' => ['neçə']],
                            'ar' => ['sentence' => 'سعر دجاج', 'correct' => ['سعر', 'دجاج'], 'extra' => ['كم']],
                            'ru' => ['sentence' => 'цена курица', 'correct' => ['цена', 'курица'], 'extra' => ['сколько']],
                            'es' => ['sentence' => 'El precio del pollo', 'correct' => ['el', 'precio', 'de', 'el', 'pollo'], 'extra' => ['cuántos']],
                            'de' => ['sentence' => 'Der Preis des Hähnchens', 'correct' => ['der', 'Preis', 'von', 'dem', 'Hähnchen'], 'extra' => ['wie viele']],
                            'fr' => ['sentence' => 'Le prix du poulet', 'correct' => ['le', 'prix', 'de', 'le', 'poulet'], 'extra' => ['combien']],
                            'ja' => ['sentence' => '鶏肉の値段', 'correct' => ['鶏肉', 'の', '値段'], 'extra' => ['いくつ']],
                            'tr' => ['sentence' => 'tavuğun fiyatı', 'correct' => ['tavuğun', 'fiyatı'], 'extra' => ['kaç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 고기 · 바구니', 4,
                pictures: [['ko' => '고기', 'img' => 'meat'], ['ko' => '바구니', 'img' => 'basket']],
                plain: [['ko' => '나르다'], ['ko' => '봉투']],
                phrases: [
                    'a' => [
                        'words' => ['바구니를', '나르세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to carry the basket', 'correct' => ['to carry', 'the', 'basket'], 'extra' => ['bag']],
                            'az' => ['sentence' => 'daşımaq səbət', 'correct' => ['daşımaq', 'səbət'], 'extra' => ['torba']],
                            'ar' => ['sentence' => 'الحمل سلة', 'correct' => ['الحمل', 'سلة'], 'extra' => ['كيس']],
                            'ru' => ['sentence' => 'нести корзина', 'correct' => ['нести', 'корзина'], 'extra' => ['пакет']],
                            'es' => ['sentence' => 'Llevar la cesta', 'correct' => ['llevar', 'la', 'cesta'], 'extra' => ['bolsa', 'carne']],
                            'de' => ['sentence' => 'Den Korb tragen', 'correct' => ['den', 'Korb', 'tragen'], 'extra' => ['Tüte', 'Fleisch']],
                            'fr' => ['sentence' => 'Porter le panier', 'correct' => ['porter', 'le', 'panier'], 'extra' => ['sac', 'viande']],
                            'ja' => ['sentence' => 'かごを運ぶ', 'correct' => ['かご', 'を', '運ぶ'], 'extra' => ['袋']],
                            'tr' => ['sentence' => 'sepeti taşımak', 'correct' => ['sepeti', 'taşımak'], 'extra' => ['poşet']],
                        ],
                    ],
                    'b' => [
                        'words' => ['봉투', '안의', '고기'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the meat in a bag', 'correct' => ['the', 'meat', 'in', 'a', 'bag'], 'extra' => ['to carry']],
                            'az' => ['sentence' => 'ət içində bir torba', 'correct' => ['ət', 'içində', 'bir', 'torba'], 'extra' => ['daşımaq']],
                            'ar' => ['sentence' => 'لحم في كيس', 'correct' => ['لحم', 'في', 'كيس'], 'extra' => ['الحمل']],
                            'ru' => ['sentence' => 'мясо в пакет', 'correct' => ['мясо', 'в', 'пакет'], 'extra' => ['нести']],
                            'es' => ['sentence' => 'La carne en una bolsa', 'correct' => ['la', 'carne', 'en', 'una', 'bolsa'], 'extra' => ['llevar']],
                            'de' => ['sentence' => 'Das Fleisch in einer Tüte', 'correct' => ['das', 'Fleisch', 'in', 'einer', 'Tüte'], 'extra' => ['tragen']],
                            'fr' => ['sentence' => 'La viande dans un sac', 'correct' => ['la', 'viande', 'dans', 'un', 'sac'], 'extra' => ['porter']],
                            'ja' => ['sentence' => '袋の中の肉', 'correct' => ['袋', 'の', '中', 'の', '肉'], 'extra' => ['運ぶ']],
                            'tr' => ['sentence' => 'poşette et', 'correct' => ['poşette', 'et'], 'extra' => ['taşımak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['무거운', '봉투를', '나르세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'to carry a heavy bag', 'correct' => ['to carry', 'a', 'heavy', 'bag'], 'extra' => ['basket']],
                            'az' => ['sentence' => 'daşımaq bir ağır torba', 'correct' => ['daşımaq', 'bir', 'ağır', 'torba'], 'extra' => ['səbət']],
                            'ar' => ['sentence' => 'الحمل ثقيل كيس', 'correct' => ['الحمل', 'ثقيل', 'كيس'], 'extra' => ['سلة']],
                            'ru' => ['sentence' => 'нести тяжёлый пакет', 'correct' => ['нести', 'тяжёлый', 'пакет'], 'extra' => ['корзина']],
                            'es' => ['sentence' => 'Llevar una bolsa pesada', 'correct' => ['llevar', 'una', 'pesado', 'bolsa'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Eine schwere Tüte tragen', 'correct' => ['tragen', 'eine', 'schwer', 'Tüte'], 'extra' => ['Korb']],
                            'fr' => ['sentence' => 'Porter un sac lourd', 'correct' => ['porter', 'un', 'sac', 'lourd'], 'extra' => ['panier']],
                            'ja' => ['sentence' => '重い袋を運ぶ', 'correct' => ['重い', '袋', 'を', '運ぶ'], 'extra' => ['かご']],
                            'tr' => ['sentence' => 'ağır bir poşet taşımak', 'correct' => ['ağır', 'bir', 'poşet', 'taşımak'], 'extra' => ['sepet']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 닭고기 · 밥', 5,
                pictures: [['ko' => '닭고기', 'img' => 'chicken'], ['ko' => '밥', 'img' => 'rice']],
                plain: [['ko' => '함께'], ['ko' => '또한']],
                phrases: [
                    'a' => [
                        'words' => ['닭고기와', '밥', '같이'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the chicken and the rice together', 'correct' => ['the', 'chicken', 'and', 'the', 'rice', 'together'], 'extra' => ['also']],
                            'az' => ['sentence' => 'toyuq və düyü birlikdə', 'correct' => ['toyuq', 'və', 'düyü', 'birlikdə'], 'extra' => ['həmçinin']],
                            'ar' => ['sentence' => 'دجاج و أرز معا', 'correct' => ['دجاج', 'و', 'أرز', 'معا'], 'extra' => ['أيضا']],
                            'ru' => ['sentence' => 'курица и рис вместе', 'correct' => ['курица', 'и', 'рис', 'вместе'], 'extra' => ['тоже']],
                            'es' => ['sentence' => 'El pollo y el arroz juntos', 'correct' => ['el', 'pollo', 'y', 'el', 'arroz', 'juntos'], 'extra' => ['también']],
                            'de' => ['sentence' => 'Das Hähnchen und der Reis zusammen', 'correct' => ['das', 'Hähnchen', 'und', 'der', 'Reis', 'zusammen'], 'extra' => ['auch']],
                            'fr' => ['sentence' => 'Le poulet et le riz ensemble', 'correct' => ['le', 'poulet', 'et', 'le', 'riz', 'ensemble'], 'extra' => ['aussi']],
                            'ja' => ['sentence' => '鶏肉とご飯を一緒に', 'correct' => ['鶏肉', 'と', 'ご飯', 'を', '一緒に'], 'extra' => ['も']],
                            'tr' => ['sentence' => 'tavuk ve pirinç birlikte', 'correct' => ['tavuk', 've', 'pirinç', 'birlikte'], 'extra' => ['de']],
                        ],
                    ],
                    'b' => [
                        'words' => ['밥도'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'some rice also', 'correct' => ['some', 'rice', 'also'], 'extra' => ['together']],
                            'az' => ['sentence' => 'bir az düyü həmçinin', 'correct' => ['bir az', 'düyü', 'həmçinin'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'بعض أرز أيضا', 'correct' => ['بعض', 'أرز', 'أيضا'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'немного рис тоже', 'correct' => ['немного', 'рис', 'тоже'], 'extra' => ['вместе']],
                            'es' => ['sentence' => 'Arroz también', 'correct' => ['algo de', 'arroz', 'también'], 'extra' => ['juntos', 'pollo']],
                            'de' => ['sentence' => 'Auch etwas Reis', 'correct' => ['auch', 'etwas', 'Reis'], 'extra' => ['zusammen', 'Hähnchen']],
                            'fr' => ['sentence' => 'Du riz aussi', 'correct' => ['du', 'riz', 'aussi'], 'extra' => ['ensemble']],
                            'ja' => ['sentence' => 'ご飯も', 'correct' => ['ご飯', 'も'], 'extra' => ['一緒に']],
                            'tr' => ['sentence' => 'biraz pirinç de', 'correct' => ['biraz', 'pirinç', 'de'], 'extra' => ['birlikte']],
                        ],
                    ],
                    'c' => [
                        'words' => ['밥과', '함께', '닭고기'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the chicken with the rice', 'correct' => ['the', 'chicken', 'with', 'the', 'rice'], 'extra' => ['together']],
                            'az' => ['sentence' => 'toyuq ilə düyü', 'correct' => ['toyuq', 'ilə', 'düyü'], 'extra' => ['birlikdə']],
                            'ar' => ['sentence' => 'دجاج مع أرز', 'correct' => ['دجاج', 'مع', 'أرز'], 'extra' => ['معا']],
                            'ru' => ['sentence' => 'курица с рис', 'correct' => ['курица', 'с', 'рис'], 'extra' => ['вместе']],
                            'es' => ['sentence' => 'El pollo con el arroz', 'correct' => ['el', 'pollo', 'con', 'el', 'arroz'], 'extra' => ['juntos']],
                            'de' => ['sentence' => 'Das Hähnchen mit dem Reis', 'correct' => ['das', 'Hähnchen', 'mit', 'dem', 'Reis'], 'extra' => ['zusammen']],
                            'fr' => ['sentence' => 'Le poulet avec le riz', 'correct' => ['le', 'poulet', 'avec', 'le', 'riz'], 'extra' => ['ensemble']],
                            'ja' => ['sentence' => 'ご飯と一緒に鶏肉', 'correct' => ['ご飯', 'と一緒に', '鶏肉'], 'extra' => ['一緒に']],
                            'tr' => ['sentence' => 'pirinçli tavuk', 'correct' => ['pirinçli', 'tavuk'], 'extra' => ['birlikte']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
