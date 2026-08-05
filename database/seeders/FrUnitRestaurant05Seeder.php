<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant05Seeder extends Seeder
{
    private const PICTURES = [
        'Gâteau' => 'cake', 'Café' => 'coffee', 'Riz' => 'rice', 'Poulet' => 'chicken',
        'Poisson' => 'fish', 'Assiette' => 'plate', 'Verre' => 'glass', 'Soupe' => 'soup',
    ];

    /**
     * French Chapter 3, Unit 5 — saying what you think of the food.
     *
     * Every adjective here is deliberately masculine-agreeing (délicieux, salé,
     * froid, propre, parfait) and paired with a masculine noun, so a beginner
     * never has to juggle agreement while they are still learning the word. The
     * long phrase in each lesson puts the adjective AFTER the noun on purpose:
     * that is the ordering that trips up English, Spanish and German speakers
     * reading French word by word.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Complaints and Compliments', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: It Is Delicious', 1,
                pictures: [['fr' => 'Gâteau', 'img' => 'cake'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Délicieux'], ['fr' => 'Excellent']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'gâteau', 'est', 'délicieux'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The cake is delicious', 'correct' => ['the', 'cake', 'is', 'delicious'], 'extra' => ['excellent', 'coffee']],
                            'es' => ['sentence' => 'El pastel es delicioso', 'correct' => ['el', 'pastel', 'es', 'delicioso'], 'extra' => ['excelente', 'café']],
                            'de' => ['sentence' => 'Der Kuchen ist köstlich', 'correct' => ['der', 'Kuchen', 'ist', 'köstlich'], 'extra' => ['ausgezeichnet', 'Kaffee']],
                            'ja' => ['sentence' => 'ケーキはおいしいです', 'correct' => ['ケーキ', 'は', 'おいしい', 'です'], 'extra' => ['素晴らしい']],
                            'ko' => ['sentence' => '케이크는 맛있습니다', 'correct' => ['케이크는', '맛있습니다'], 'extra' => ['훌륭한']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'café', 'est', 'excellent'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The coffee is excellent', 'correct' => ['the', 'coffee', 'is', 'excellent'], 'extra' => ['delicious', 'cake']],
                            'es' => ['sentence' => 'El café es excelente', 'correct' => ['el', 'café', 'es', 'excelente'], 'extra' => ['delicioso', 'pastel']],
                            'de' => ['sentence' => 'Der Kaffee ist ausgezeichnet', 'correct' => ['der', 'Kaffee', 'ist', 'ausgezeichnet'], 'extra' => ['köstlich', 'Kuchen']],
                            'ja' => ['sentence' => 'コーヒーは素晴らしいです', 'correct' => ['コーヒー', 'は', '素晴らしい', 'です'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '커피는 훌륭합니다', 'correct' => ['커피는', '훌륭합니다'], 'extra' => ['맛있는']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'gâteau', 'excellent', 'et', 'un', 'café', 'délicieux'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'An excellent cake and a delicious coffee', 'correct' => ['an', 'excellent', 'cake', 'and', 'a', 'delicious', 'coffee'], 'extra' => ['is']],
                            'es' => ['sentence' => 'Un pastel excelente y un café delicioso', 'correct' => ['un', 'pastel', 'excelente', 'y', 'un', 'café', 'delicioso'], 'extra' => ['es']],
                            'de' => ['sentence' => 'Ein ausgezeichneter Kuchen und ein köstlicher Kaffee', 'correct' => ['ein', 'ausgezeichnet', 'Kuchen', 'und', 'ein', 'köstlich', 'Kaffee'], 'extra' => ['ist']],
                            'ja' => ['sentence' => '素晴らしいケーキとおいしいコーヒー', 'correct' => ['素晴らしい', 'ケーキ', 'と', 'おいしい', 'コーヒー'], 'extra' => ['です']],
                            'ko' => ['sentence' => '훌륭한 케이크와 맛있는 커피', 'correct' => ['훌륭한', '케이크와', '맛있는', '커피'], 'extra' => ['입니다']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Too Salty', 2,
                pictures: [['fr' => 'Riz', 'img' => 'rice'], ['fr' => 'Poulet', 'img' => 'chicken']],
                plain: [['fr' => 'Salé'], ['fr' => 'Épicé']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'riz', 'est', 'trop', 'salé'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The rice is too salty', 'correct' => ['the', 'rice', 'is', 'too', 'salty'], 'extra' => ['spicy', 'chicken']],
                            'es' => ['sentence' => 'El arroz está demasiado salado', 'correct' => ['el', 'arroz', 'está', 'demasiado', 'salado'], 'extra' => ['picante', 'pollo']],
                            'de' => ['sentence' => 'Der Reis ist zu salzig', 'correct' => ['der', 'Reis', 'ist', 'zu', 'salzig'], 'extra' => ['scharf', 'Hähnchen']],
                            'ja' => ['sentence' => 'ご飯はしょっぱすぎます', 'correct' => ['ご飯', 'は', 'しょっぱすぎます'], 'extra' => ['辛い']],
                            'ko' => ['sentence' => '밥은 너무 짭니다', 'correct' => ['밥은', '너무', '짭니다'], 'extra' => ['매운']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'poulet', 'est', 'épicé'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The chicken is spicy', 'correct' => ['the', 'chicken', 'is', 'spicy'], 'extra' => ['salty', 'rice']],
                            'es' => ['sentence' => 'El pollo está picante', 'correct' => ['el', 'pollo', 'está', 'picante'], 'extra' => ['salado', 'arroz']],
                            'de' => ['sentence' => 'Das Hähnchen ist scharf', 'correct' => ['das', 'Hähnchen', 'ist', 'scharf'], 'extra' => ['salzig', 'Reis']],
                            'ja' => ['sentence' => '鶏肉は辛いです', 'correct' => ['鶏肉', 'は', '辛い', 'です'], 'extra' => ['しょっぱい']],
                            'ko' => ['sentence' => '닭고기는 맵습니다', 'correct' => ['닭고기는', '맵습니다'], 'extra' => ['짠']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'riz', 'salé', 'et', 'un', 'poulet', 'épicé'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A salty rice and a spicy chicken', 'correct' => ['a', 'salty', 'rice', 'and', 'a', 'spicy', 'chicken'], 'extra' => ['too']],
                            'es' => ['sentence' => 'Un arroz salado y un pollo picante', 'correct' => ['un', 'arroz', 'salado', 'y', 'un', 'pollo', 'picante'], 'extra' => ['demasiado']],
                            'de' => ['sentence' => 'Ein salziger Reis und ein scharfes Hähnchen', 'correct' => ['ein', 'salzig', 'Reis', 'und', 'ein', 'scharf', 'Hähnchen'], 'extra' => ['zu']],
                            'ja' => ['sentence' => 'しょっぱいご飯と辛い鶏肉', 'correct' => ['しょっぱい', 'ご飯', 'と', '辛い', '鶏肉'], 'extra' => ['すぎます']],
                            'ko' => ['sentence' => '짠 밥과 매운 닭고기', 'correct' => ['짠', '밥과', '매운', '닭고기'], 'extra' => ['너무']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: It Is Cold', 3,
                pictures: [['fr' => 'Poisson', 'img' => 'fish'], ['fr' => 'Assiette', 'img' => 'plate']],
                plain: [['fr' => 'Froid'], ['fr' => 'Problème']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'poisson', 'est', 'froid'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The fish is cold', 'correct' => ['the', 'fish', 'is', 'cold'], 'extra' => ['problem', 'plate']],
                            'es' => ['sentence' => 'El pescado está frío', 'correct' => ['el', 'pescado', 'está', 'frío'], 'extra' => ['problema', 'plato']],
                            'de' => ['sentence' => 'Der Fisch ist kalt', 'correct' => ['der', 'Fisch', 'ist', 'kalt'], 'extra' => ['Problem', 'Teller']],
                            'ja' => ['sentence' => '魚は冷たいです', 'correct' => ['魚', 'は', '冷たい', 'です'], 'extra' => ['問題']],
                            'ko' => ['sentence' => '생선은 차갑습니다', 'correct' => ['생선은', '차갑습니다'], 'extra' => ['문제']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'problème', 'avec', 'le', 'poisson'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A problem with the fish', 'correct' => ['a', 'problem', 'with', 'the', 'fish'], 'extra' => ['cold', 'plate']],
                            'es' => ['sentence' => 'Un problema con el pescado', 'correct' => ['un', 'problema', 'con', 'el', 'pescado'], 'extra' => ['frío', 'plato']],
                            'de' => ['sentence' => 'Ein Problem mit dem Fisch', 'correct' => ['ein', 'Problem', 'mit', 'dem', 'Fisch'], 'extra' => ['kalt', 'Teller']],
                            'ja' => ['sentence' => '魚に問題があります', 'correct' => ['魚', 'に', '問題', 'が', 'あります'], 'extra' => ['冷たい']],
                            'ko' => ['sentence' => '생선에 문제가 있습니다', 'correct' => ['생선에', '문제가', '있습니다'], 'extra' => ['차가운']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'assiette', 'et', 'un', 'problème'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A plate and a problem', 'correct' => ['a', 'plate', 'and', 'a', 'problem'], 'extra' => ['cold', 'fish']],
                            'es' => ['sentence' => 'Un plato y un problema', 'correct' => ['un', 'plato', 'y', 'un', 'problema'], 'extra' => ['frío', 'pescado']],
                            'de' => ['sentence' => 'Ein Teller und ein Problem', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Problem'], 'extra' => ['kalt', 'Fisch']],
                            'ja' => ['sentence' => 'お皿と問題', 'correct' => ['お皿', 'と', '問題'], 'extra' => ['冷たい']],
                            'ko' => ['sentence' => '접시와 문제', 'correct' => ['접시와', '문제'], 'extra' => ['차가운']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Clean or Dirty', 4,
                pictures: [['fr' => 'Verre', 'img' => 'glass'], ['fr' => 'Assiette', 'img' => 'plate']],
                plain: [['fr' => 'Propre'], ['fr' => 'Sale']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'verre', 'est', 'propre'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The glass is clean', 'correct' => ['the', 'glass', 'is', 'clean'], 'extra' => ['dirty', 'plate']],
                            'es' => ['sentence' => 'El vaso está limpio', 'correct' => ['el', 'vaso', 'está', 'limpio'], 'extra' => ['sucio', 'plato']],
                            'de' => ['sentence' => 'Das Glas ist sauber', 'correct' => ['das', 'Glas', 'ist', 'sauber'], 'extra' => ['schmutzig', 'Teller']],
                            'ja' => ['sentence' => 'グラスはきれいです', 'correct' => ['グラス', 'は', 'きれい', 'です'], 'extra' => ['汚い']],
                            'ko' => ['sentence' => '유리잔은 깨끗합니다', 'correct' => ['유리잔은', '깨끗합니다'], 'extra' => ['더러운']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'assiette', 'sale'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A dirty plate', 'correct' => ['a', 'dirty', 'plate'], 'extra' => ['clean', 'glass']],
                            'es' => ['sentence' => 'Un plato sucio', 'correct' => ['un', 'plato', 'sucio'], 'extra' => ['limpio', 'vaso']],
                            'de' => ['sentence' => 'Ein schmutziger Teller', 'correct' => ['ein', 'schmutzig', 'Teller'], 'extra' => ['sauber', 'Glas']],
                            'ja' => ['sentence' => '汚いお皿', 'correct' => ['汚い', 'お皿'], 'extra' => ['きれい']],
                            'ko' => ['sentence' => '더러운 접시', 'correct' => ['더러운', '접시'], 'extra' => ['깨끗한']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'verre', 'propre', 'et', 'une', 'assiette', 'sale'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A clean glass and a dirty plate', 'correct' => ['a', 'clean', 'glass', 'and', 'a', 'dirty', 'plate'], 'extra' => ['is']],
                            'es' => ['sentence' => 'Un vaso limpio y un plato sucio', 'correct' => ['un', 'vaso', 'limpio', 'y', 'un', 'plato', 'sucio'], 'extra' => ['es']],
                            'de' => ['sentence' => 'Ein sauberes Glas und ein schmutziger Teller', 'correct' => ['ein', 'sauber', 'Glas', 'und', 'ein', 'schmutzig', 'Teller'], 'extra' => ['ist']],
                            'ja' => ['sentence' => 'きれいなグラスと汚いお皿', 'correct' => ['きれいな', 'グラス', 'と', '汚い', 'お皿'], 'extra' => ['です']],
                            'ko' => ['sentence' => '깨끗한 유리잔과 더러운 접시', 'correct' => ['깨끗한', '유리잔과', '더러운', '접시'], 'extra' => ['입니다']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Perfect, Thank You', 5,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Gâteau', 'img' => 'cake']],
                plain: [['fr' => 'Parfait'], ['fr' => 'Goût']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'café', 'est', 'parfait'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The coffee is perfect', 'correct' => ['the', 'coffee', 'is', 'perfect'], 'extra' => ['taste', 'cake']],
                            'es' => ['sentence' => 'El café es perfecto', 'correct' => ['el', 'café', 'es', 'perfecto'], 'extra' => ['sabor', 'pastel']],
                            'de' => ['sentence' => 'Der Kaffee ist perfekt', 'correct' => ['der', 'Kaffee', 'ist', 'perfekt'], 'extra' => ['Geschmack', 'Kuchen']],
                            'ja' => ['sentence' => 'コーヒーは完璧です', 'correct' => ['コーヒー', 'は', '完璧', 'です'], 'extra' => ['味']],
                            'ko' => ['sentence' => '커피는 완벽합니다', 'correct' => ['커피는', '완벽합니다'], 'extra' => ['맛']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'goût', 'est', 'bon'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The taste is good', 'correct' => ['the', 'taste', 'is', 'good'], 'extra' => ['perfect', 'coffee']],
                            'es' => ['sentence' => 'El sabor es bueno', 'correct' => ['el', 'sabor', 'es', 'bueno'], 'extra' => ['perfecto', 'café']],
                            'de' => ['sentence' => 'Der Geschmack ist gut', 'correct' => ['der', 'Geschmack', 'ist', 'gut'], 'extra' => ['perfekt', 'Kaffee']],
                            'ja' => ['sentence' => '味は良いです', 'correct' => ['味', 'は', '良い', 'です'], 'extra' => ['完璧']],
                            'ko' => ['sentence' => '맛은 좋습니다', 'correct' => ['맛은', '좋습니다'], 'extra' => ['완벽한']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'goût', 'du', 'gâteau', 'est', 'parfait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The taste of the cake is perfect', 'correct' => ['the', 'taste', 'of the', 'cake', 'is', 'perfect'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'El sabor del pastel es perfecto', 'correct' => ['el', 'sabor', 'del', 'pastel', 'es', 'perfecto'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Der Geschmack des Kuchens ist perfekt', 'correct' => ['der', 'Geschmack', 'des', 'Kuchens', 'ist', 'perfekt'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'ケーキの味は完璧です', 'correct' => ['ケーキ', 'の', '味', 'は', '完璧', 'です'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '케이크의 맛은 완벽합니다', 'correct' => ['케이크의', '맛은', '완벽합니다'], 'extra' => ['커피']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
