<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant05Seeder extends Seeder
{
    private const PICTURES = ['케이크' => 'cake', '커피' => 'coffee', '밥' => 'rice', '닭고기' => 'chicken', '생선' => 'fish', '접시' => 'plate', '유리잔' => 'glass'];

    /**
     * Korean Restaurant, Unit 5, the Korean twin of the English "Complaints and Compliments" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, '유닛 5: 불만과 칭찬', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 케이크 · 커피', 1,
                pictures: [['ko' => '케이크', 'img' => 'cake'], ['ko' => '커피', 'img' => 'coffee']],
                plain: [['ko' => '맛있는'], ['ko' => '훌륭한']],
                phrases: [
                    'a' => [
                        'words' => ['케이크는', '맛있습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the cake is delicious', 'correct' => ['the', 'cake', 'is', 'delicious'], 'extra' => ['excellent']],
                            'es' => ['sentence' => 'El pastel está delicioso', 'correct' => ['el', 'pastel', 'está', 'delicioso'], 'extra' => ['excelente']],
                            'de' => ['sentence' => 'Der Kuchen ist köstlich', 'correct' => ['der', 'Kuchen', 'ist', 'köstlich'], 'extra' => ['ausgezeichnet']],
                            'fr' => ['sentence' => 'Le gâteau est délicieux', 'correct' => ['le', 'gâteau', 'est', 'délicieux'], 'extra' => ['excellent']],
                            'ja' => ['sentence' => 'ケーキはおいしいです', 'correct' => ['ケーキ', 'は', 'おいしい', 'です'], 'extra' => ['素晴らしい']],
                        ],
                    ],
                    'b' => [
                        'words' => ['커피는', '훌륭합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the coffee is excellent', 'correct' => ['the', 'coffee', 'is', 'excellent'], 'extra' => ['delicious']],
                            'es' => ['sentence' => 'El café es excelente', 'correct' => ['el', 'café', 'es', 'excelente'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Der Kaffee ist ausgezeichnet', 'correct' => ['der', 'Kaffee', 'ist', 'ausgezeichnet'], 'extra' => ['köstlich']],
                            'fr' => ['sentence' => 'Le café est excellent', 'correct' => ['le', 'café', 'est', 'excellent'], 'extra' => ['délicieux']],
                            'ja' => ['sentence' => 'コーヒーは素晴らしいです', 'correct' => ['コーヒー', 'は', '素晴らしい', 'です'], 'extra' => ['おいしい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['훌륭한', '케이크와', '맛있는', '커피'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'an excellent cake and a delicious coffee', 'correct' => ['an', 'excellent', 'cake', 'and', 'a', 'delicious', 'coffee'], 'extra' => ['is']],
                            'es' => ['sentence' => 'Un pastel excelente y un café delicioso', 'correct' => ['un', 'pastel', 'excelente', 'y', 'un', 'café', 'delicioso'], 'extra' => ['está']],
                            'de' => ['sentence' => 'Ein ausgezeichneter Kuchen und ein köstlicher Kaffee', 'correct' => ['ein', 'ausgezeichnet', 'Kuchen', 'und', 'ein', 'köstlich', 'Kaffee'], 'extra' => ['ist']],
                            'fr' => ['sentence' => 'Un gâteau excellent et un café délicieux', 'correct' => ['un', 'gâteau', 'excellent', 'et', 'un', 'café', 'délicieux'], 'extra' => ['est']],
                            'ja' => ['sentence' => '素晴らしいケーキとおいしいコーヒー', 'correct' => ['素晴らしい', 'ケーキ', 'と', 'おいしい', 'コーヒー'], 'extra' => ['です']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 밥 · 닭고기', 2,
                pictures: [['ko' => '밥', 'img' => 'rice'], ['ko' => '닭고기', 'img' => 'chicken']],
                plain: [['ko' => '짠'], ['ko' => '매운']],
                phrases: [
                    'a' => [
                        'words' => ['밥은', '너무', '짭니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the rice is too salty', 'correct' => ['the', 'rice', 'is', 'too much', 'salty'], 'extra' => ['spicy']],
                            'es' => ['sentence' => 'El arroz está demasiado salado', 'correct' => ['el', 'arroz', 'está', 'demasiado', 'salado'], 'extra' => ['picante']],
                            'de' => ['sentence' => 'Der Reis ist zu salzig', 'correct' => ['der', 'Reis', 'ist', 'zu viel', 'salzig'], 'extra' => ['scharf']],
                            'fr' => ['sentence' => 'Le riz est trop salé', 'correct' => ['le', 'riz', 'est', 'trop', 'salé'], 'extra' => ['épicé']],
                            'ja' => ['sentence' => 'ご飯はしょっぱすぎます', 'correct' => ['ご飯', 'は', 'しょっぱすぎます'], 'extra' => ['辛い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['닭고기는', '맵습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the chicken is spicy', 'correct' => ['the', 'chicken', 'is', 'spicy'], 'extra' => ['salty']],
                            'es' => ['sentence' => 'El pollo está picante', 'correct' => ['el', 'pollo', 'está', 'picante'], 'extra' => ['salado', 'arroz']],
                            'de' => ['sentence' => 'Das Hähnchen ist scharf', 'correct' => ['das', 'Hähnchen', 'ist', 'scharf'], 'extra' => ['salzig', 'Reis']],
                            'fr' => ['sentence' => 'Le poulet est épicé', 'correct' => ['le', 'poulet', 'est', 'épicé'], 'extra' => ['salé']],
                            'ja' => ['sentence' => '鶏肉は辛いです', 'correct' => ['鶏肉', 'は', '辛い', 'です'], 'extra' => ['しょっぱい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['짠', '밥과', '매운', '닭고기'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'a salty rice and a spicy chicken', 'correct' => ['a', 'salty', 'rice', 'and', 'a', 'spicy', 'chicken'], 'extra' => ['too much']],
                            'es' => ['sentence' => 'Un arroz salado y un pollo picante', 'correct' => ['un', 'arroz', 'salado', 'y', 'un', 'pollo', 'picante'], 'extra' => ['demasiado']],
                            'de' => ['sentence' => 'Ein salziger Reis und ein scharfes Hähnchen', 'correct' => ['ein', 'salzig', 'Reis', 'und', 'ein', 'scharf', 'Hähnchen'], 'extra' => ['zu viel']],
                            'fr' => ['sentence' => 'Un riz salé et un poulet épicé', 'correct' => ['un', 'riz', 'salé', 'et', 'un', 'poulet', 'épicé'], 'extra' => ['trop']],
                            'ja' => ['sentence' => 'しょっぱいご飯と辛い鶏肉', 'correct' => ['しょっぱい', 'ご飯', 'と', '辛い', '鶏肉'], 'extra' => ['すぎます']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 생선 · 접시', 3,
                pictures: [['ko' => '생선', 'img' => 'fish'], ['ko' => '접시', 'img' => 'plate']],
                plain: [['ko' => '차가운'], ['ko' => '문제']],
                phrases: [
                    'a' => [
                        'words' => ['생선은', '차갑습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the fish is cold', 'correct' => ['the', 'fish', 'is', 'cold'], 'extra' => ['problem']],
                            'es' => ['sentence' => 'El pescado está frío', 'correct' => ['el', 'pescado', 'está', 'frío'], 'extra' => ['problema']],
                            'de' => ['sentence' => 'Der Fisch ist kalt', 'correct' => ['der', 'Fisch', 'ist', 'kalt'], 'extra' => ['Problem']],
                            'fr' => ['sentence' => 'Le poisson est froid', 'correct' => ['le', 'poisson', 'est', 'froid'], 'extra' => ['problème']],
                            'ja' => ['sentence' => '魚は冷たいです', 'correct' => ['魚', 'は', '冷たい', 'です'], 'extra' => ['問題']],
                        ],
                    ],
                    'b' => [
                        'words' => ['생선에', '문제가', '있습니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a problem with the fish', 'correct' => ['a', 'problem', 'with', 'the', 'fish'], 'extra' => ['cold']],
                            'es' => ['sentence' => 'Un problema con el pescado', 'correct' => ['un', 'problema', 'con', 'el', 'pescado'], 'extra' => ['frío', 'plato']],
                            'de' => ['sentence' => 'Ein Problem mit dem Fisch', 'correct' => ['ein', 'Problem', 'mit', 'dem', 'Fisch'], 'extra' => ['kalt', 'Teller']],
                            'fr' => ['sentence' => 'Un problème avec le poisson', 'correct' => ['un', 'problème', 'avec', 'le', 'poisson'], 'extra' => ['froid']],
                            'ja' => ['sentence' => '魚に問題があります', 'correct' => ['魚', 'に', '問題', 'が', 'あります'], 'extra' => ['冷たい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['접시와', '문제'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a plate and a problem', 'correct' => ['a', 'plate', 'and', 'a', 'problem'], 'extra' => ['cold']],
                            'es' => ['sentence' => 'Un plato y un problema', 'correct' => ['un', 'plato', 'y', 'un', 'problema'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Ein Teller und ein Problem', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Problem'], 'extra' => ['kalt']],
                            'fr' => ['sentence' => 'Une assiette et un problème', 'correct' => ['une', 'assiette', 'et', 'un', 'problème'], 'extra' => ['froid']],
                            'ja' => ['sentence' => 'お皿と問題', 'correct' => ['お皿', 'と', '問題'], 'extra' => ['冷たい']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 유리잔 · 접시', 4,
                pictures: [['ko' => '유리잔', 'img' => 'glass'], ['ko' => '접시', 'img' => 'plate']],
                plain: [['ko' => '깨끗한'], ['ko' => '더러운']],
                phrases: [
                    'a' => [
                        'words' => ['유리잔은', '깨끗합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the glass is clean', 'correct' => ['the', 'glass', 'is', 'clean'], 'extra' => ['dirty']],
                            'es' => ['sentence' => 'El vaso está limpio', 'correct' => ['el', 'vaso', 'está', 'limpio'], 'extra' => ['sucio']],
                            'de' => ['sentence' => 'Das Glas ist sauber', 'correct' => ['das', 'Glas', 'ist', 'sauber'], 'extra' => ['schmutzig']],
                            'fr' => ['sentence' => 'Le verre est propre', 'correct' => ['le', 'verre', 'est', 'propre'], 'extra' => ['sale']],
                            'ja' => ['sentence' => 'グラスはきれいです', 'correct' => ['グラス', 'は', 'きれい', 'です'], 'extra' => ['汚い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['더러운', '접시'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a dirty plate', 'correct' => ['a', 'dirty', 'plate'], 'extra' => ['clean']],
                            'es' => ['sentence' => 'Un plato sucio', 'correct' => ['un', 'plato', 'sucio'], 'extra' => ['limpio', 'vaso']],
                            'de' => ['sentence' => 'Ein schmutziger Teller', 'correct' => ['ein', 'schmutzig', 'Teller'], 'extra' => ['sauber', 'Glas']],
                            'fr' => ['sentence' => 'Une assiette sale', 'correct' => ['une', 'assiette', 'sale'], 'extra' => ['propre']],
                            'ja' => ['sentence' => '汚いお皿', 'correct' => ['汚い', 'お皿'], 'extra' => ['きれい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['깨끗한', '유리잔과', '더러운', '접시'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'a clean glass and a dirty plate', 'correct' => ['a', 'clean', 'glass', 'and', 'a', 'dirty', 'plate'], 'extra' => ['is']],
                            'es' => ['sentence' => 'Un vaso limpio y un plato sucio', 'correct' => ['un', 'vaso', 'limpio', 'y', 'un', 'plato', 'sucio'], 'extra' => ['está']],
                            'de' => ['sentence' => 'Ein sauberes Glas und ein schmutziger Teller', 'correct' => ['ein', 'sauber', 'Glas', 'und', 'ein', 'schmutzig', 'Teller'], 'extra' => ['ist']],
                            'fr' => ['sentence' => 'Un verre propre et une assiette sale', 'correct' => ['un', 'verre', 'propre', 'et', 'une', 'assiette', 'sale'], 'extra' => ['est']],
                            'ja' => ['sentence' => 'きれいなグラスと汚いお皿', 'correct' => ['きれいな', 'グラス', 'と', '汚い', 'お皿'], 'extra' => ['です']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 커피 · 케이크', 5,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '케이크', 'img' => 'cake']],
                plain: [['ko' => '완벽한'], ['ko' => '맛']],
                phrases: [
                    'a' => [
                        'words' => ['커피는', '완벽합니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the coffee is perfect', 'correct' => ['the', 'coffee', 'is', 'perfect'], 'extra' => ['taste']],
                            'es' => ['sentence' => 'El café es perfecto', 'correct' => ['el', 'café', 'es', 'perfecto'], 'extra' => ['sabor']],
                            'de' => ['sentence' => 'Der Kaffee ist perfekt', 'correct' => ['der', 'Kaffee', 'ist', 'perfekt'], 'extra' => ['Geschmack']],
                            'fr' => ['sentence' => 'Le café est parfait', 'correct' => ['le', 'café', 'est', 'parfait'], 'extra' => ['goût']],
                            'ja' => ['sentence' => 'コーヒーは完璧です', 'correct' => ['コーヒー', 'は', '完璧', 'です'], 'extra' => ['味']],
                        ],
                    ],
                    'b' => [
                        'words' => ['맛은', '좋습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the taste is good', 'correct' => ['the', 'taste', 'is', 'good'], 'extra' => ['perfect']],
                            'es' => ['sentence' => 'El sabor es bueno', 'correct' => ['el', 'sabor', 'es', 'bueno'], 'extra' => ['perfecto', 'café']],
                            'de' => ['sentence' => 'Der Geschmack ist gut', 'correct' => ['der', 'Geschmack', 'ist', 'gut'], 'extra' => ['perfekt', 'Kaffee']],
                            'fr' => ['sentence' => 'Le goût est bon', 'correct' => ['le', 'goût', 'est', 'bon'], 'extra' => ['parfait']],
                            'ja' => ['sentence' => '味は良いです', 'correct' => ['味', 'は', '良い', 'です'], 'extra' => ['完璧']],
                        ],
                    ],
                    'c' => [
                        'words' => ['케이크의', '맛은', '완벽합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'the taste of the cake is perfect', 'correct' => ['the', 'taste', 'of', 'the', 'cake', 'is', 'perfect'], 'extra' => ['coffee']],
                            'es' => ['sentence' => 'El sabor del pastel es perfecto', 'correct' => ['el', 'sabor', 'de', 'el', 'pastel', 'es', 'perfecto'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Der Geschmack des Kuchens ist perfekt', 'correct' => ['der', 'Geschmack', 'von', 'dem', 'Kuchen', 'ist', 'perfekt'], 'extra' => ['Kaffee']],
                            'fr' => ['sentence' => 'Le goût du gâteau est parfait', 'correct' => ['le', 'goût', 'de', 'le', 'gâteau', 'est', 'parfait'], 'extra' => ['café']],
                            'ja' => ['sentence' => 'ケーキの味は完璧です', 'correct' => ['ケーキ', 'の', '味', 'は', '完璧', 'です'], 'extra' => ['コーヒー']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
