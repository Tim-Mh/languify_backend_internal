<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitSupermarket05Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Tavuk' => 'chicken',
        'Balık' => 'fish',
        'Et' => 'meat',
        'Pirinç' => 'rice',
        'Ekmek' => 'bread',
    ];

    /**
     * Turkish Supermarket Unit 5 - the counter.
     *
     * THE RULE THIS UNIT TEACHES: A MEASURE WORD NEEDS NOTHING BETWEEN IT AND THE NOUN.
     *
     * English needs "of": a kilo OF chicken. Turkish simply puts the two nouns next
     * to each other: `bir kilo tavuk`. There is no linking word to place, and adding
     * one is the mistake an English speaker makes first.
     *
     *     bir kilo tavuk     a kilo of chicken
     *     bir kilo balık     a kilo of fish
     *
     * So the Turkish is three tiles and the English is four, with the extra one
     * being a word Turkish has no equivalent for. That mismatch is the exercise.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Meat and Fish', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Chicken', 1,
                pictures: [['tr' => 'Tavuk', 'img' => 'chicken'], ['tr' => 'Balık', 'img' => 'fish']],
                plain: [['tr' => 'Tavuk'], ['tr' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['tavuk', 'istiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like chicken', 'correct' => ['I would like', 'chicken'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'istəyirəm toyuq', 'correct' => ['istəyirəm', 'toyuq'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'أريد دجاج', 'correct' => ['أريد', 'دجاج'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'я хочу курица', 'correct' => ['я', 'хочу', 'курица'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Je voudrais du poulet', 'correct' => ['je voudrais', 'du poulet'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Quisiera pollo', 'correct' => ['quisiera', 'pollo'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich möchte Hähnchen', 'correct' => ['ich möchte', 'Hähnchen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '鶏肉をください', 'correct' => ['鶏肉を', 'ください'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기 주세요', 'correct' => ['닭고기', '주세요'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'kilo', 'tavuk'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A kilo of chicken', 'correct' => ['a', 'kilo', 'of', 'chicken'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'bir kilo toyuq', 'correct' => ['bir', 'kilo', 'toyuq'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'كيلو دجاج', 'correct' => ['كيلو', 'دجاج'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'кило курица', 'correct' => ['кило', 'курица'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Un kilo de poulet', 'correct' => ['un', 'kilo', 'de', 'poulet'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Un kilo de pollo', 'correct' => ['un', 'kilo', 'de', 'pollo'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ein Kilo Hähnchen', 'correct' => ['ein', 'Kilo', 'Hähnchen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '鶏肉一キロ', 'correct' => ['鶏肉', '一キロ'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기 일 킬로', 'correct' => ['닭고기', '일', '킬로'], 'extra' => ['생선']],
                        ],
                    ],
                    'c' => [
                        'words' => ['tavuk', 'taze'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The chicken is fresh', 'correct' => ['the chicken', 'is', 'fresh'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'toyuq təzə', 'correct' => ['toyuq', 'təzə'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'دجاج طازج', 'correct' => ['دجاج', 'طازج'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'курица свежий', 'correct' => ['курица', 'свежий'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Le poulet est frais', 'correct' => ['le poulet', 'est', 'frais'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'El pollo está fresco', 'correct' => ['el pollo', 'está', 'fresco'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Das Hähnchen ist frisch', 'correct' => ['das Hähnchen', 'ist', 'frisch'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '鶏肉は新鮮です', 'correct' => ['鶏肉は', '新鮮です'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기는 신선해요', 'correct' => ['닭고기는', '신선해요'], 'extra' => ['생선']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Fish', 2,
                pictures: [['tr' => 'Balık', 'img' => 'fish'], ['tr' => 'Et', 'img' => 'meat']],
                plain: [['tr' => 'Balık'], ['tr' => 'Taze']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kilo', 'balık'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A kilo of fish', 'correct' => ['a', 'kilo', 'of', 'fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'bir kilo balıq', 'correct' => ['bir', 'kilo', 'balıq'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'كيلو سمك', 'correct' => ['كيلو', 'سمك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'кило рыба', 'correct' => ['кило', 'рыба'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Un kilo de poisson', 'correct' => ['un', 'kilo', 'de', 'poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Un kilo de pescado', 'correct' => ['un', 'kilo', 'de', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ein Kilo Fisch', 'correct' => ['ein', 'Kilo', 'Fisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚一キロ', 'correct' => ['魚', '一キロ'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선 일 킬로', 'correct' => ['생선', '일', '킬로'], 'extra' => ['고기']],
                        ],
                    ],
                    'b' => [
                        'words' => ['balık', 'taze', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The fish is not fresh', 'correct' => ['the fish', 'is not', 'fresh'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'balığı deyil təzə', 'correct' => ['balığı', 'deyil', 'təzə'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'السمك ليس طازج', 'correct' => ['السمك', 'ليس', 'طازج'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'рыбу не свежий', 'correct' => ['рыбу', 'не', 'свежий'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Le poisson n’est pas frais', 'correct' => ['le poisson', 'n’est pas', 'frais'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'El pescado no está fresco', 'correct' => ['el pescado', 'no está', 'fresco'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Der Fisch ist nicht frisch', 'correct' => ['der Fisch', 'ist nicht', 'frisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚は新鮮ではありません', 'correct' => ['魚は', '新鮮では', 'ありません'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선은 신선하지 않아요', 'correct' => ['생선은', '신선하지 않아요'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['balık', 'nerede'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the fish', 'correct' => ['where', 'is', 'the fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'harada balığı', 'correct' => ['harada', 'balığı'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'أين السمك', 'correct' => ['أين', 'السمك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'где рыбу', 'correct' => ['где', 'рыбу'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Où est le poisson', 'correct' => ['où', 'est', 'le poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Dónde está el pescado', 'correct' => ['dónde', 'está', 'el pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Wo ist der Fisch', 'correct' => ['wo', 'ist', 'der Fisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚はどこですか', 'correct' => ['魚は', 'どこですか'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선은 어디에 있어요', 'correct' => ['생선은', '어디에', '있어요'], 'extra' => ['고기']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Meat', 3,
                pictures: [['tr' => 'Et', 'img' => 'meat'], ['tr' => 'Tavuk', 'img' => 'chicken']],
                plain: [['tr' => 'Et'], ['tr' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['et', 'alıyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am buying meat', 'correct' => ['I am buying', 'meat'], 'extra' => ['chicken']],
                            'az' => ['sentence' => 'alıram ət', 'correct' => ['alıram', 'ət'], 'extra' => ['toyuq']],
                            'ar' => ['sentence' => 'أشتري لحم', 'correct' => ['أشتري', 'لحم'], 'extra' => ['دجاج']],
                            'ru' => ['sentence' => 'я покупаю мясо', 'correct' => ['я', 'покупаю', 'мясо'], 'extra' => ['курица']],
                            'fr' => ['sentence' => 'J’achète de la viande', 'correct' => ['j’achète', 'de la viande'], 'extra' => ['poulet']],
                            'es' => ['sentence' => 'Compro carne', 'correct' => ['compro', 'carne'], 'extra' => ['pollo']],
                            'de' => ['sentence' => 'Ich kaufe Fleisch', 'correct' => ['ich kaufe', 'Fleisch'], 'extra' => ['Hähnchen']],
                            'ja' => ['sentence' => '肉を買います', 'correct' => ['肉を', '買います'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '고기를 삽니다', 'correct' => ['고기를', '삽니다'], 'extra' => ['닭고기']],
                        ],
                    ],
                    'b' => [
                        'words' => ['et', 'pahalı'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The meat is expensive', 'correct' => ['the meat', 'is', 'expensive'], 'extra' => ['cheap']],
                            'az' => ['sentence' => 'ət bahalı', 'correct' => ['ət', 'bahalı'], 'extra' => ['ucuz']],
                            'ar' => ['sentence' => 'لحم غالي', 'correct' => ['لحم', 'غالي'], 'extra' => ['رخيص']],
                            'ru' => ['sentence' => 'мясо дорогой', 'correct' => ['мясо', 'дорогой'], 'extra' => ['дешёвый']],
                            'fr' => ['sentence' => 'La viande est chère', 'correct' => ['la viande', 'est', 'chère'], 'extra' => ['bon marché']],
                            'es' => ['sentence' => 'La carne es cara', 'correct' => ['la carne', 'es', 'cara'], 'extra' => ['barato']],
                            'de' => ['sentence' => 'Das Fleisch ist teuer', 'correct' => ['das Fleisch', 'ist', 'teuer'], 'extra' => ['billig']],
                            'ja' => ['sentence' => '肉は高いです', 'correct' => ['肉は', '高いです'], 'extra' => ['安い']],
                            'ko' => ['sentence' => '고기는 비싸요', 'correct' => ['고기는', '비싸요'], 'extra' => ['싼']],
                        ],
                    ],
                    'c' => [
                        'words' => ['iki', 'kilo', 'et'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Two kilos of meat', 'correct' => ['two', 'kilos', 'of', 'meat'], 'extra' => ['chicken']],
                            'az' => ['sentence' => 'iki kilo ət', 'correct' => ['iki', 'kilo', 'ət'], 'extra' => ['toyuq']],
                            'ar' => ['sentence' => 'اثنان كيلو لحم', 'correct' => ['اثنان', 'كيلو', 'لحم'], 'extra' => ['دجاج']],
                            'ru' => ['sentence' => 'два кило мясо', 'correct' => ['два', 'кило', 'мясо'], 'extra' => ['курица']],
                            'fr' => ['sentence' => 'Deux kilos de viande', 'correct' => ['deux', 'kilos', 'de', 'viande'], 'extra' => ['poulet']],
                            'es' => ['sentence' => 'Dos kilos de carne', 'correct' => ['dos', 'kilos', 'de', 'carne'], 'extra' => ['pollo']],
                            'de' => ['sentence' => 'Zwei Kilo Fleisch', 'correct' => ['zwei', 'Kilo', 'Fleisch'], 'extra' => ['Hähnchen']],
                            'ja' => ['sentence' => '肉二キロ', 'correct' => ['肉', '二キロ'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '고기 이 킬로', 'correct' => ['고기', '이', '킬로'], 'extra' => ['닭고기']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Rice & Staples', 4,
                pictures: [['tr' => 'Pirinç', 'img' => 'rice'], ['tr' => 'Ekmek', 'img' => 'bread']],
                plain: [['tr' => 'Pirinç'], ['tr' => 'Kilo']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kilo', 'pirinç'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'A kilo of rice', 'correct' => ['a', 'kilo', 'of', 'rice'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'bir kilo düyü', 'correct' => ['bir', 'kilo', 'düyü'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'كيلو أرز', 'correct' => ['كيلو', 'أرز'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'кило рис', 'correct' => ['кило', 'рис'], 'extra' => ['хлеб']],
                            'fr' => ['sentence' => 'Un kilo de riz', 'correct' => ['un', 'kilo', 'de', 'riz'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Un kilo de arroz', 'correct' => ['un', 'kilo', 'de', 'arroz'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ein Kilo Reis', 'correct' => ['ein', 'Kilo', 'Reis'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'ご飯一キロ', 'correct' => ['ご飯', '一キロ'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '쌀 일 킬로', 'correct' => ['쌀', '일', '킬로'], 'extra' => ['빵']],
                        ],
                    ],
                    'b' => [
                        'words' => ['pirinç', 'ucuz'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The rice is cheap', 'correct' => ['the rice', 'is', 'cheap'], 'extra' => ['expensive']],
                            'az' => ['sentence' => 'düyü ucuz', 'correct' => ['düyü', 'ucuz'], 'extra' => ['bahalı']],
                            'ar' => ['sentence' => 'أرز رخيص', 'correct' => ['أرز', 'رخيص'], 'extra' => ['غالي']],
                            'ru' => ['sentence' => 'рис дешёвый', 'correct' => ['рис', 'дешёвый'], 'extra' => ['дорогой']],
                            'fr' => ['sentence' => 'Le riz est bon marché', 'correct' => ['le riz', 'est', 'bon marché'], 'extra' => ['cher']],
                            'es' => ['sentence' => 'El arroz es barato', 'correct' => ['el arroz', 'es', 'barato'], 'extra' => ['caro']],
                            'de' => ['sentence' => 'Der Reis ist billig', 'correct' => ['der Reis', 'ist', 'billig'], 'extra' => ['teuer']],
                            'ja' => ['sentence' => 'ご飯は安いです', 'correct' => ['ご飯は', '安いです'], 'extra' => ['高い']],
                            'ko' => ['sentence' => '쌀은 싸요', 'correct' => ['쌀은', '싸요'], 'extra' => ['비싼']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pirinç', 've', 'ekmek'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Rice and bread', 'correct' => ['rice', 'and', 'bread'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'düyü və çörək', 'correct' => ['düyü', 'və', 'çörək'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'أرز و خبز', 'correct' => ['أرز', 'و', 'خبز'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'рис и хлеб', 'correct' => ['рис', 'и', 'хлеб'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Du riz et du pain', 'correct' => ['du riz', 'et', 'du pain'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Arroz y pan', 'correct' => ['arroz', 'y', 'pan'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Reis und Brot', 'correct' => ['Reis', 'und', 'Brot'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'ご飯とパン', 'correct' => ['ご飯', 'と', 'パン'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '쌀과 빵', 'correct' => ['쌀과', '빵'], 'extra' => ['고기']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: At the Counter', 5,
                pictures: [['tr' => 'Tavuk', 'img' => 'chicken'], ['tr' => 'Balık', 'img' => 'fish']],
                plain: [['tr' => 'Kilo'], ['tr' => 'Taze']],
                phrases: [
                    'a' => [
                        'words' => ['bir', 'kilo', 'tavuk', 'lütfen'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A kilo of chicken please', 'correct' => ['a', 'kilo', 'of', 'chicken', 'please'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'bir kilo toyuq zəhmət olmasa', 'correct' => ['bir', 'kilo', 'toyuq', 'zəhmət olmasa'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'كيلو دجاج من فضلك', 'correct' => ['كيلو', 'دجاج', 'من فضلك'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'кило курица пожалуйста', 'correct' => ['кило', 'курица', 'пожалуйста'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Un kilo de poulet s’il vous plaît', 'correct' => ['un', 'kilo', 'de', 'poulet', 's’il vous plaît'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Un kilo de pollo por favor', 'correct' => ['un', 'kilo', 'de', 'pollo', 'por favor'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ein Kilo Hähnchen bitte', 'correct' => ['ein', 'Kilo', 'Hähnchen', 'bitte'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '鶏肉一キロをお願いします', 'correct' => ['鶏肉', '一キロを', 'お願いします'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기 일 킬로 부탁합니다', 'correct' => ['닭고기', '일', '킬로', '부탁합니다'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['tavuk', 'kaç', 'lira'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'How many lira is the chicken', 'correct' => ['how many', 'lira', 'is', 'the chicken'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'neçə manat toyuq', 'correct' => ['neçə', 'manat', 'toyuq'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'كم ريال دجاج', 'correct' => ['كم', 'ريال', 'دجاج'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'сколько рубль курица', 'correct' => ['сколько', 'рубль', 'курица'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Combien de lires est le poulet', 'correct' => ['combien de', 'lires', 'est', 'le poulet'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Cuántas liras es el pollo', 'correct' => ['cuántas', 'liras', 'es', 'el pollo'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Wie viele Lira ist das Hähnchen', 'correct' => ['wie viele', 'Lira', 'ist', 'das Hähnchen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '鶏肉は何リラですか', 'correct' => ['鶏肉は', '何', 'リラですか'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '닭고기는 몇 리라예요', 'correct' => ['닭고기는', '몇', '리라예요'], 'extra' => ['생선']],
                        ],
                    ],
                    'c' => [
                        'words' => ['balık', 'reyonda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The fish is in the aisle', 'correct' => ['the fish', 'is', 'in the aisle'], 'extra' => ['chicken']],
                            'az' => ['sentence' => 'balığı şöbədə', 'correct' => ['balığı', 'şöbədə'], 'extra' => ['toyuq']],
                            'ar' => ['sentence' => 'السمك في القسم', 'correct' => ['السمك', 'في القسم'], 'extra' => ['دجاج']],
                            'ru' => ['sentence' => 'рыбу в отделе', 'correct' => ['рыбу', 'в', 'отделе'], 'extra' => ['курица']],
                            'fr' => ['sentence' => 'Le poisson est au rayon', 'correct' => ['le poisson', 'est', 'au rayon'], 'extra' => ['poulet']],
                            'es' => ['sentence' => 'El pescado está en el pasillo', 'correct' => ['el pescado', 'está', 'en el pasillo'], 'extra' => ['pollo']],
                            'de' => ['sentence' => 'Der Fisch ist im Regal', 'correct' => ['der Fisch', 'ist', 'im Regal'], 'extra' => ['Hähnchen']],
                            'ja' => ['sentence' => '魚は売り場にあります', 'correct' => ['魚は', '売り場に', 'あります'], 'extra' => ['鶏肉']],
                            'ko' => ['sentence' => '생선은 코너에 있어요', 'correct' => ['생선은', '코너에', '있어요'], 'extra' => ['닭고기']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
