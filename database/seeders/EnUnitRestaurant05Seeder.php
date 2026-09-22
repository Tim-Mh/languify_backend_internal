<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant05Seeder extends Seeder
{
    private const PICTURES = [
        'Cake' => 'cake', 'Coffee' => 'coffee', 'Rice' => 'rice', 'Chicken' => 'chicken',
        'Fish' => 'fish', 'Plate' => 'plate', 'Glass' => 'glass', 'Soup' => 'soup',
    ];

    /**
     * English Chapter 3, Unit 5 — saying what you think of the food.
     *
     * Compliments and complaints, one adjective pair per lesson (delicious,
     * salty, cold, clean, perfect), always after the noun so the learner hears
     * natural English word order rather than word-by-word.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Complaints and Compliments', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: It Is Delicious', 1,
                pictures: [['en' => 'Cake', 'img' => 'cake'], ['en' => 'Coffee', 'img' => 'coffee']],
                plain: [['en' => 'Delicious'], ['en' => 'Excellent']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'cake', 'is', 'delicious'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pastel está delicioso', 'correct' => ['el', 'pastel', 'está', 'delicioso'], 'extra' => ['excelente']],
                            'de' => ['sentence' => 'Der Kuchen ist köstlich', 'correct' => ['der', 'Kuchen', 'ist', 'köstlich'], 'extra' => ['ausgezeichnet']],
                            'ja' => ['sentence' => 'ケーキはおいしいです', 'correct' => ['ケーキ', 'は', 'おいしい', 'です'], 'extra' => ['素晴らしい']],
                            'ko' => ['sentence' => '케이크는 맛있습니다', 'correct' => ['케이크는', '맛있습니다'], 'extra' => ['훌륭한']],
                            'fr' => ['sentence' => 'Le gâteau est délicieux', 'correct' => ['le', 'gâteau', 'est', 'délicieux'], 'extra' => ['excellent']],
                            'tr' => ['sentence' => 'pasta lezzetli', 'correct' => ['pasta', 'lezzetli'], 'extra' => []],
                        'ru' => ['sentence' => 'торт вкусный', 'correct' => ['торт', 'вкусный'], 'extra' => []],
                        'ar' => ['sentence' => 'كعكة لذيذ', 'correct' => ['كعكة', 'لذيذ'], 'extra' => []],
                        'az' => ['sentence' => 'tort dadlı', 'correct' => ['tort', 'dadlı'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'coffee', 'is', 'excellent'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El café es excelente', 'correct' => ['el', 'café', 'es', 'excelente'], 'extra' => ['delicioso']],
                            'de' => ['sentence' => 'Der Kaffee ist ausgezeichnet', 'correct' => ['der', 'Kaffee', 'ist', 'ausgezeichnet'], 'extra' => ['köstlich']],
                            'ja' => ['sentence' => 'コーヒーは素晴らしいです', 'correct' => ['コーヒー', 'は', '素晴らしい', 'です'], 'extra' => ['おいしい']],
                            'ko' => ['sentence' => '커피는 훌륭합니다', 'correct' => ['커피는', '훌륭합니다'], 'extra' => ['맛있는']],
                            'fr' => ['sentence' => 'Le café est excellent', 'correct' => ['le', 'café', 'est', 'excellent'], 'extra' => ['délicieux']],
                            'tr' => ['sentence' => 'kahve mükemmel', 'correct' => ['kahve', 'mükemmel'], 'extra' => []],
                        'ru' => ['sentence' => 'кофе отлично', 'correct' => ['кофе', 'отлично'], 'extra' => []],
                        'ar' => ['sentence' => 'قهوة ممتاز', 'correct' => ['قهوة', 'ممتاز'], 'extra' => []],
                        'az' => ['sentence' => 'qəhvə əla', 'correct' => ['qəhvə', 'əla'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['an', 'excellent', 'cake', 'and', 'a', 'delicious', 'coffee'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un pastel excelente y un café delicioso', 'correct' => ['un', 'pastel', 'excelente', 'y', 'un', 'café', 'delicioso'], 'extra' => ['está']],
                            'de' => ['sentence' => 'Ein ausgezeichneter Kuchen und ein köstlicher Kaffee', 'correct' => ['ein', 'ausgezeichnet', 'Kuchen', 'und', 'ein', 'köstlich', 'Kaffee'], 'extra' => ['ist']],
                            'ja' => ['sentence' => '素晴らしいケーキとおいしいコーヒー', 'correct' => ['素晴らしい', 'ケーキ', 'と', 'おいしい', 'コーヒー'], 'extra' => ['です']],
                            'ko' => ['sentence' => '훌륭한 케이크와 맛있는 커피', 'correct' => ['훌륭한', '케이크와', '맛있는', '커피'], 'extra' => ['입니다']],
                            'fr' => ['sentence' => 'Un gâteau excellent et un café délicieux', 'correct' => ['un', 'gâteau', 'excellent', 'et', 'un', 'café', 'délicieux'], 'extra' => ['est']],
                            'tr' => ['sentence' => 'mükemmel bir pasta ve lezzetli bir kahve', 'correct' => ['mükemmel', 'bir', 'pasta', 've', 'lezzetli', 'bir', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'отлично торт и вкусный кофе', 'correct' => ['отлично', 'торт', 'и', 'вкусный', 'кофе'], 'extra' => []],
                        'ar' => ['sentence' => 'ممتاز كعكة و لذيذ قهوة', 'correct' => ['ممتاز', 'كعكة', 'و', 'لذيذ', 'قهوة'], 'extra' => []],
                        'az' => ['sentence' => 'bir əla tort və bir dadlı qəhvə', 'correct' => ['bir', 'əla', 'tort', 'və', 'bir', 'dadlı', 'qəhvə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Too Salty', 2,
                pictures: [['en' => 'Rice', 'img' => 'rice'], ['en' => 'Chicken', 'img' => 'chicken']],
                plain: [['en' => 'Salty'], ['en' => 'Spicy']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'rice', 'is', 'too much', 'salty'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El arroz está demasiado salado', 'correct' => ['el', 'arroz', 'está', 'demasiado', 'salado'], 'extra' => ['picante']],
                            'de' => ['sentence' => 'Der Reis ist zu salzig', 'correct' => ['der', 'Reis', 'ist', 'zu viel', 'salzig'], 'extra' => ['scharf']],
                            'ja' => ['sentence' => 'ご飯はしょっぱすぎます', 'correct' => ['ご飯', 'は', 'しょっぱすぎます'], 'extra' => ['辛い']],
                            'ko' => ['sentence' => '밥은 너무 짭니다', 'correct' => ['밥은', '너무', '짭니다'], 'extra' => ['매운']],
                            'fr' => ['sentence' => 'Le riz est trop salé', 'correct' => ['le', 'riz', 'est', 'trop', 'salé'], 'extra' => ['épicé']],
                            'tr' => ['sentence' => 'pirinç çok fazla tuzlu', 'correct' => ['pirinç', 'çok', 'fazla', 'tuzlu'], 'extra' => []],
                        'ru' => ['sentence' => 'рис слишком много солёный', 'correct' => ['рис', 'слишком много', 'солёный'], 'extra' => []],
                        'ar' => ['sentence' => 'أرز كثير جدا مالح', 'correct' => ['أرز', 'كثير جدا', 'مالح'], 'extra' => []],
                        'az' => ['sentence' => 'düyü çox artıq duzlu', 'correct' => ['düyü', 'çox artıq', 'duzlu'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'chicken', 'is', 'spicy'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pollo está picante', 'correct' => ['el', 'pollo', 'está', 'picante'], 'extra' => ['salado', 'arroz']],
                            'de' => ['sentence' => 'Das Hähnchen ist scharf', 'correct' => ['das', 'Hähnchen', 'ist', 'scharf'], 'extra' => ['salzig', 'Reis']],
                            'ja' => ['sentence' => '鶏肉は辛いです', 'correct' => ['鶏肉', 'は', '辛い', 'です'], 'extra' => ['しょっぱい']],
                            'ko' => ['sentence' => '닭고기는 맵습니다', 'correct' => ['닭고기는', '맵습니다'], 'extra' => ['짠']],
                            'fr' => ['sentence' => 'Le poulet est épicé', 'correct' => ['le', 'poulet', 'est', 'épicé'], 'extra' => ['salé']],
                            'tr' => ['sentence' => 'tavuk acılı', 'correct' => ['tavuk', 'acılı'], 'extra' => []],
                        'ru' => ['sentence' => 'курица острый', 'correct' => ['курица', 'острый'], 'extra' => []],
                        'ar' => ['sentence' => 'دجاج حار', 'correct' => ['دجاج', 'حار'], 'extra' => []],
                        'az' => ['sentence' => 'toyuq acılı', 'correct' => ['toyuq', 'acılı'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'salty', 'rice', 'and', 'a', 'spicy', 'chicken'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un arroz salado y un pollo picante', 'correct' => ['un', 'arroz', 'salado', 'y', 'un', 'pollo', 'picante'], 'extra' => ['demasiado']],
                            'de' => ['sentence' => 'Ein salziger Reis und ein scharfes Hähnchen', 'correct' => ['ein', 'salzig', 'Reis', 'und', 'ein', 'scharf', 'Hähnchen'], 'extra' => ['zu viel']],
                            'ja' => ['sentence' => 'しょっぱいご飯と辛い鶏肉', 'correct' => ['しょっぱい', 'ご飯', 'と', '辛い', '鶏肉'], 'extra' => ['すぎます']],
                            'ko' => ['sentence' => '짠 밥과 매운 닭고기', 'correct' => ['짠', '밥과', '매운', '닭고기'], 'extra' => ['너무']],
                            'fr' => ['sentence' => 'Un riz salé et un poulet épicé', 'correct' => ['un', 'riz', 'salé', 'et', 'un', 'poulet', 'épicé'], 'extra' => ['trop']],
                            'tr' => ['sentence' => 'tuzlu bir pirinç ve acılı bir tavuk', 'correct' => ['tuzlu', 'bir', 'pirinç', 've', 'acılı', 'bir', 'tavuk'], 'extra' => []],
                        'ru' => ['sentence' => 'солёный рис и острый курица', 'correct' => ['солёный', 'рис', 'и', 'острый', 'курица'], 'extra' => []],
                        'ar' => ['sentence' => 'مالح أرز و حار دجاج', 'correct' => ['مالح', 'أرز', 'و', 'حار', 'دجاج'], 'extra' => []],
                        'az' => ['sentence' => 'bir duzlu düyü və bir acılı toyuq', 'correct' => ['bir', 'duzlu', 'düyü', 'və', 'bir', 'acılı', 'toyuq'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: It Is Cold', 3,
                pictures: [['en' => 'Fish', 'img' => 'fish'], ['en' => 'Plate', 'img' => 'plate']],
                plain: [['en' => 'Cold'], ['en' => 'Problem']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'fish', 'is', 'cold'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pescado está frío', 'correct' => ['el', 'pescado', 'está', 'frío'], 'extra' => ['problema']],
                            'de' => ['sentence' => 'Der Fisch ist kalt', 'correct' => ['der', 'Fisch', 'ist', 'kalt'], 'extra' => ['Problem']],
                            'ja' => ['sentence' => '魚は冷たいです', 'correct' => ['魚', 'は', '冷たい', 'です'], 'extra' => ['問題']],
                            'ko' => ['sentence' => '생선은 차갑습니다', 'correct' => ['생선은', '차갑습니다'], 'extra' => ['문제']],
                            'fr' => ['sentence' => 'Le poisson est froid', 'correct' => ['le', 'poisson', 'est', 'froid'], 'extra' => ['problème']],
                            'tr' => ['sentence' => 'balık soğuk', 'correct' => ['balık', 'soğuk'], 'extra' => []],
                        'ru' => ['sentence' => 'рыба холодный', 'correct' => ['рыба', 'холодный'], 'extra' => []],
                        'ar' => ['sentence' => 'سمك بارد', 'correct' => ['سمك', 'بارد'], 'extra' => []],
                        'az' => ['sentence' => 'balıq soyuq', 'correct' => ['balıq', 'soyuq'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'problem', 'with', 'the', 'fish'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un problema con el pescado', 'correct' => ['un', 'problema', 'con', 'el', 'pescado'], 'extra' => ['frío', 'plato']],
                            'de' => ['sentence' => 'Ein Problem mit dem Fisch', 'correct' => ['ein', 'Problem', 'mit', 'dem', 'Fisch'], 'extra' => ['kalt', 'Teller']],
                            'ja' => ['sentence' => '魚に問題があります', 'correct' => ['魚', 'に', '問題', 'が', 'あります'], 'extra' => ['冷たい']],
                            'ko' => ['sentence' => '생선에 문제가 있습니다', 'correct' => ['생선에', '문제가', '있습니다'], 'extra' => ['차가운']],
                            'fr' => ['sentence' => 'Un problème avec le poisson', 'correct' => ['un', 'problème', 'avec', 'le', 'poisson'], 'extra' => ['froid']],
                            'tr' => ['sentence' => 'balıkla bir sorun', 'correct' => ['balıkla', 'bir', 'sorun'], 'extra' => []],
                        'ru' => ['sentence' => 'проблема с рыба', 'correct' => ['проблема', 'с', 'рыба'], 'extra' => []],
                        'ar' => ['sentence' => 'مشكلة مع سمك', 'correct' => ['مشكلة', 'مع', 'سمك'], 'extra' => []],
                        'az' => ['sentence' => 'bir problem ilə balıq', 'correct' => ['bir', 'problem', 'ilə', 'balıq'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'plate', 'and', 'a', 'problem'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un plato y un problema', 'correct' => ['un', 'plato', 'y', 'un', 'problema'], 'extra' => ['frío']],
                            'de' => ['sentence' => 'Ein Teller und ein Problem', 'correct' => ['ein', 'Teller', 'und', 'ein', 'Problem'], 'extra' => ['kalt']],
                            'ja' => ['sentence' => 'お皿と問題', 'correct' => ['お皿', 'と', '問題'], 'extra' => ['冷たい']],
                            'ko' => ['sentence' => '접시와 문제', 'correct' => ['접시와', '문제'], 'extra' => ['차가운']],
                            'fr' => ['sentence' => 'Une assiette et un problème', 'correct' => ['une', 'assiette', 'et', 'un', 'problème'], 'extra' => ['froid']],
                            'tr' => ['sentence' => 'bir tabak ve bir sorun', 'correct' => ['bir', 'tabak', 've', 'bir', 'sorun'], 'extra' => []],
                        'ru' => ['sentence' => 'тарелка и проблема', 'correct' => ['тарелка', 'и', 'проблема'], 'extra' => []],
                        'ar' => ['sentence' => 'صحن و مشكلة', 'correct' => ['صحن', 'و', 'مشكلة'], 'extra' => []],
                        'az' => ['sentence' => 'bir boşqab və bir problem', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'problem'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Clean or Dirty', 4,
                pictures: [['en' => 'Glass', 'img' => 'glass'], ['en' => 'Plate', 'img' => 'plate']],
                plain: [['en' => 'Clean'], ['en' => 'Dirty']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'glass', 'is', 'clean'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El vaso está limpio', 'correct' => ['el', 'vaso', 'está', 'limpio'], 'extra' => ['sucio']],
                            'de' => ['sentence' => 'Das Glas ist sauber', 'correct' => ['das', 'Glas', 'ist', 'sauber'], 'extra' => ['schmutzig']],
                            'ja' => ['sentence' => 'グラスはきれいです', 'correct' => ['グラス', 'は', 'きれい', 'です'], 'extra' => ['汚い']],
                            'ko' => ['sentence' => '유리잔은 깨끗합니다', 'correct' => ['유리잔은', '깨끗합니다'], 'extra' => ['더러운']],
                            'fr' => ['sentence' => 'Le verre est propre', 'correct' => ['le', 'verre', 'est', 'propre'], 'extra' => ['sale']],
                            'tr' => ['sentence' => 'bardak temiz', 'correct' => ['bardak', 'temiz'], 'extra' => []],
                        'ru' => ['sentence' => 'стакан чистый', 'correct' => ['стакан', 'чистый'], 'extra' => []],
                        'ar' => ['sentence' => 'كوب نظيف', 'correct' => ['كوب', 'نظيف'], 'extra' => []],
                        'az' => ['sentence' => 'stəkan təmiz', 'correct' => ['stəkan', 'təmiz'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'dirty', 'plate'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un plato sucio', 'correct' => ['un', 'plato', 'sucio'], 'extra' => ['limpio', 'vaso']],
                            'de' => ['sentence' => 'Ein schmutziger Teller', 'correct' => ['ein', 'schmutzig', 'Teller'], 'extra' => ['sauber', 'Glas']],
                            'ja' => ['sentence' => '汚いお皿', 'correct' => ['汚い', 'お皿'], 'extra' => ['きれい']],
                            'ko' => ['sentence' => '더러운 접시', 'correct' => ['더러운', '접시'], 'extra' => ['깨끗한']],
                            'fr' => ['sentence' => 'Une assiette sale', 'correct' => ['une', 'assiette', 'sale'], 'extra' => ['propre']],
                            'tr' => ['sentence' => 'kirli bir tabak', 'correct' => ['kirli', 'bir', 'tabak'], 'extra' => []],
                        'ru' => ['sentence' => 'грязный тарелка', 'correct' => ['грязный', 'тарелка'], 'extra' => []],
                        'ar' => ['sentence' => 'متسخ صحن', 'correct' => ['متسخ', 'صحن'], 'extra' => []],
                        'az' => ['sentence' => 'bir çirkli boşqab', 'correct' => ['bir', 'çirkli', 'boşqab'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'clean', 'glass', 'and', 'a', 'dirty', 'plate'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un vaso limpio y un plato sucio', 'correct' => ['un', 'vaso', 'limpio', 'y', 'un', 'plato', 'sucio'], 'extra' => ['está']],
                            'de' => ['sentence' => 'Ein sauberes Glas und ein schmutziger Teller', 'correct' => ['ein', 'sauber', 'Glas', 'und', 'ein', 'schmutzig', 'Teller'], 'extra' => ['ist']],
                            'ja' => ['sentence' => 'きれいなグラスと汚いお皿', 'correct' => ['きれいな', 'グラス', 'と', '汚い', 'お皿'], 'extra' => ['です']],
                            'ko' => ['sentence' => '깨끗한 유리잔과 더러운 접시', 'correct' => ['깨끗한', '유리잔과', '더러운', '접시'], 'extra' => ['입니다']],
                            'fr' => ['sentence' => 'Un verre propre et une assiette sale', 'correct' => ['un', 'verre', 'propre', 'et', 'une', 'assiette', 'sale'], 'extra' => ['est']],
                            'tr' => ['sentence' => 'temiz bir bardak ve kirli bir tabak', 'correct' => ['temiz', 'bir', 'bardak', 've', 'kirli', 'bir', 'tabak'], 'extra' => []],
                        'ru' => ['sentence' => 'чистый стакан и грязный тарелка', 'correct' => ['чистый', 'стакан', 'и', 'грязный', 'тарелка'], 'extra' => []],
                        'ar' => ['sentence' => 'نظيف كوب و متسخ صحن', 'correct' => ['نظيف', 'كوب', 'و', 'متسخ', 'صحن'], 'extra' => []],
                        'az' => ['sentence' => 'bir təmiz stəkan və bir çirkli boşqab', 'correct' => ['bir', 'təmiz', 'stəkan', 'və', 'bir', 'çirkli', 'boşqab'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Perfect, Thank You', 5,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Cake', 'img' => 'cake']],
                plain: [['en' => 'Perfect'], ['en' => 'Taste']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'coffee', 'is', 'perfect'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El café es perfecto', 'correct' => ['el', 'café', 'es', 'perfecto'], 'extra' => ['sabor']],
                            'de' => ['sentence' => 'Der Kaffee ist perfekt', 'correct' => ['der', 'Kaffee', 'ist', 'perfekt'], 'extra' => ['Geschmack']],
                            'ja' => ['sentence' => 'コーヒーは完璧です', 'correct' => ['コーヒー', 'は', '完璧', 'です'], 'extra' => ['味']],
                            'ko' => ['sentence' => '커피는 완벽합니다', 'correct' => ['커피는', '완벽합니다'], 'extra' => ['맛']],
                            'fr' => ['sentence' => 'Le café est parfait', 'correct' => ['le', 'café', 'est', 'parfait'], 'extra' => ['goût']],
                            'tr' => ['sentence' => 'kahve mükemmel', 'correct' => ['kahve', 'mükemmel'], 'extra' => []],
                        'ru' => ['sentence' => 'кофе идеально', 'correct' => ['кофе', 'идеально'], 'extra' => []],
                        'ar' => ['sentence' => 'قهوة مثالي', 'correct' => ['قهوة', 'مثالي'], 'extra' => []],
                        'az' => ['sentence' => 'qəhvə mükəmməl', 'correct' => ['qəhvə', 'mükəmməl'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'taste', 'is', 'good'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El sabor es bueno', 'correct' => ['el', 'sabor', 'es', 'bueno'], 'extra' => ['perfecto', 'café']],
                            'de' => ['sentence' => 'Der Geschmack ist gut', 'correct' => ['der', 'Geschmack', 'ist', 'gut'], 'extra' => ['perfekt', 'Kaffee']],
                            'ja' => ['sentence' => '味は良いです', 'correct' => ['味', 'は', '良い', 'です'], 'extra' => ['完璧']],
                            'ko' => ['sentence' => '맛은 좋습니다', 'correct' => ['맛은', '좋습니다'], 'extra' => ['완벽한']],
                            'fr' => ['sentence' => 'Le goût est bon', 'correct' => ['le', 'goût', 'est', 'bon'], 'extra' => ['parfait']],
                            'tr' => ['sentence' => 'tadı iyi', 'correct' => ['tadı', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'вкус хороший', 'correct' => ['вкус', 'хороший'], 'extra' => []],
                        'ar' => ['sentence' => 'مذاق جيد', 'correct' => ['مذاق', 'جيد'], 'extra' => []],
                        'az' => ['sentence' => 'dad yaxşı', 'correct' => ['dad', 'yaxşı'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'taste', 'of', 'the', 'cake', 'is', 'perfect'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El sabor del pastel es perfecto', 'correct' => ['el', 'sabor', 'de', 'el', 'pastel', 'es', 'perfecto'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Der Geschmack des Kuchens ist perfekt', 'correct' => ['der', 'Geschmack', 'von', 'dem', 'Kuchen', 'ist', 'perfekt'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'ケーキの味は完璧です', 'correct' => ['ケーキ', 'の', '味', 'は', '完璧', 'です'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '케이크의 맛은 완벽합니다', 'correct' => ['케이크의', '맛은', '완벽합니다'], 'extra' => ['커피']],
                            'fr' => ['sentence' => 'Le goût du gâteau est parfait', 'correct' => ['le', 'goût', 'de', 'le', 'gâteau', 'est', 'parfait'], 'extra' => ['café']],
                            'tr' => ['sentence' => 'pastanın tadı mükemmel', 'correct' => ['pastanın', 'tadı', 'mükemmel'], 'extra' => []],
                        'ru' => ['sentence' => 'вкус торт идеально', 'correct' => ['вкус', 'торт', 'идеально'], 'extra' => []],
                        'ar' => ['sentence' => 'مذاق كعكة مثالي', 'correct' => ['مذاق', 'كعكة', 'مثالي'], 'extra' => []],
                        'az' => ['sentence' => 'dad tort mükəmməl', 'correct' => ['dad', 'tort', 'mükəmməl'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
