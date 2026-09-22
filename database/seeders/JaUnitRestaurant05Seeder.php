<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\JapaneseLessonBuilder;
use Illuminate\Database\Seeder;

class JaUnitRestaurant05Seeder extends Seeder
{
    private const PICTURES = [
        'ケーキ' => 'cake',
        'コーヒー' => 'coffee',
        'ご飯' => 'rice',
        '鶏肉' => 'chicken',
        '魚' => 'fish',
        'お皿' => 'plate',
        'グラス' => 'glass',
        'スープ' => 'soup',
    ];

    /**
     * Japanese Chapter 3 (Restaurant), Unit 5, the Japanese twin of the
     * English "Unit 5: Complaints and Compliments" unit. Same 5-lesson shape and vocabulary, authored
     * in Japanese with hints in English, Spanish, German, French and Korean.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ja')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new JapaneseLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'ユニット5: 苦情と称賛', $this->lessonsData($builder));
    }

    private function lessonsData(JapaneseLessonBuilder $builder): array
    {
        return [
            $builder->lesson('レッスン1: ケーキ・コーヒー', 1,
                pictures: [
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'おいしい',
                    ],
                    [
                        'ja' => '素晴らしい',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ケーキ',
                            'は',
                            'おいしい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the cake is delicious',
                                'correct' => [
                                    'the',
                                    'cake',
                                    'is',
                                    'delicious',
                                ],
                                'extra' => [
                                    'excellent',
                                ],
                            ],
                            'az' => ['sentence' => 'tort dadlı', 'correct' => ['tort', 'dadlı'], 'extra' => ['əla']],
                            'ar' => ['sentence' => 'كعكة لذيذ', 'correct' => ['كعكة', 'لذيذ'], 'extra' => ['ممتاز']],
                            'ru' => ['sentence' => 'торт вкусный', 'correct' => ['торт', 'вкусный'], 'extra' => ['отлично']],
                            'es' => [
                                'sentence' => 'El pastel está delicioso',
                                'correct' => [
                                    'el',
                                    'pastel',
                                    'está',
                                    'delicioso',
                                ],
                                'extra' => [
                                    'excelente',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kuchen ist köstlich',
                                'correct' => [
                                    'der',
                                    'Kuchen',
                                    'ist',
                                    'köstlich',
                                ],
                                'extra' => [
                                    'ausgezeichnet',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le gâteau est délicieux',
                                'correct' => [
                                    'le',
                                    'gâteau',
                                    'est',
                                    'délicieux',
                                ],
                                'extra' => [
                                    'excellent',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크는 맛있습니다',
                                'correct' => [
                                    '케이크는',
                                    '맛있습니다',
                                ],
                                'extra' => [
                                    '훌륭한',
                                ],
                            ],
                            'tr' => ['sentence' => 'pasta lezzetli', 'correct' => ['pasta', 'lezzetli'], 'extra' => ['mükemmel']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            'コーヒー',
                            'は',
                            '素晴らしい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the coffee is excellent',
                                'correct' => [
                                    'the',
                                    'coffee',
                                    'is',
                                    'excellent',
                                ],
                                'extra' => [
                                    'delicious',
                                ],
                            ],
                            'az' => ['sentence' => 'qəhvə əla', 'correct' => ['qəhvə', 'əla'], 'extra' => ['dadlı']],
                            'ar' => ['sentence' => 'قهوة ممتاز', 'correct' => ['قهوة', 'ممتاز'], 'extra' => ['لذيذ']],
                            'ru' => ['sentence' => 'кофе отлично', 'correct' => ['кофе', 'отлично'], 'extra' => ['вкусный']],
                            'es' => [
                                'sentence' => 'El café es excelente',
                                'correct' => [
                                    'el',
                                    'café',
                                    'es',
                                    'excelente',
                                ],
                                'extra' => [
                                    'delicioso',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kaffee ist ausgezeichnet',
                                'correct' => [
                                    'der',
                                    'Kaffee',
                                    'ist',
                                    'ausgezeichnet',
                                ],
                                'extra' => [
                                    'köstlich',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le café est excellent',
                                'correct' => [
                                    'le',
                                    'café',
                                    'est',
                                    'excellent',
                                ],
                                'extra' => [
                                    'délicieux',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피는 훌륭합니다',
                                'correct' => [
                                    '커피는',
                                    '훌륭합니다',
                                ],
                                'extra' => [
                                    '맛있는',
                                ],
                            ],
                            'tr' => ['sentence' => 'kahve mükemmel', 'correct' => ['kahve', 'mükemmel'], 'extra' => ['lezzetli']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            '素晴らしい',
                            'ケーキ',
                            'と',
                            'おいしい',
                            'コーヒー',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'an excellent cake and a delicious coffee',
                                'correct' => [
                                    'an',
                                    'excellent',
                                    'cake',
                                    'and',
                                    'a',
                                    'delicious',
                                    'coffee',
                                ],
                                'extra' => [
                                    'is',
                                ],
                            ],
                            'az' => ['sentence' => 'bir əla tort və bir dadlı qəhvə', 'correct' => ['bir', 'əla', 'tort', 'və', 'bir', 'dadlı', 'qəhvə'], 'extra' => []],
                            'ar' => ['sentence' => 'ممتاز كعكة و لذيذ قهوة', 'correct' => ['ممتاز', 'كعكة', 'و', 'لذيذ', 'قهوة'], 'extra' => []],
                            'ru' => ['sentence' => 'отлично торт и вкусный кофе', 'correct' => ['отлично', 'торт', 'и', 'вкусный', 'кофе'], 'extra' => []],
                            'es' => [
                                'sentence' => 'Un pastel excelente y un café delicioso',
                                'correct' => [
                                    'un',
                                    'pastel',
                                    'excelente',
                                    'y',
                                    'un',
                                    'café',
                                    'delicioso',
                                ],
                                'extra' => [
                                    'está',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein ausgezeichneter Kuchen und ein köstlicher Kaffee',
                                'correct' => [
                                    'ein',
                                    'ausgezeichnet',
                                    'Kuchen',
                                    'und',
                                    'ein',
                                    'köstlich',
                                    'Kaffee',
                                ],
                                'extra' => [
                                    'ist',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un gâteau excellent et un café délicieux',
                                'correct' => [
                                    'un',
                                    'gâteau',
                                    'excellent',
                                    'et',
                                    'un',
                                    'café',
                                    'délicieux',
                                ],
                                'extra' => [
                                    'est',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '훌륭한 케이크와 맛있는 커피',
                                'correct' => [
                                    '훌륭한',
                                    '케이크와',
                                    '맛있는',
                                    '커피',
                                ],
                                'extra' => [
                                    '입니다',
                                ],
                            ],
                            'tr' => ['sentence' => 'mükemmel bir pasta ve lezzetli bir kahve', 'correct' => ['mükemmel', 'bir', 'pasta', 've', 'lezzetli', 'bir', 'kahve'], 'extra' => ['dır']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン2: ご飯・鶏肉', 2,
                pictures: [
                    [
                        'ja' => 'ご飯',
                        'img' => 'rice',
                    ],
                    [
                        'ja' => '鶏肉',
                        'img' => 'chicken',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'しょっぱい',
                    ],
                    [
                        'ja' => '辛い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'ご飯',
                            'は',
                            'しょっぱすぎる',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the rice is too salty',
                                'correct' => [
                                    'the',
                                    'rice',
                                    'is',
                                    'too much',
                                    'salty',
                                ],
                                'extra' => [
                                    'spicy',
                                ],
                            ],
                            'az' => ['sentence' => 'düyü çox artıq duzlu', 'correct' => ['düyü', 'çox artıq', 'duzlu'], 'extra' => ['acılı']],
                            'ar' => ['sentence' => 'أرز كثير جدا مالح', 'correct' => ['أرز', 'كثير جدا', 'مالح'], 'extra' => ['حار']],
                            'ru' => ['sentence' => 'рис слишком много солёный', 'correct' => ['рис', 'слишком много', 'солёный'], 'extra' => ['острый']],
                            'es' => [
                                'sentence' => 'El arroz está demasiado salado',
                                'correct' => [
                                    'el',
                                    'arroz',
                                    'está',
                                    'demasiado',
                                    'salado',
                                ],
                                'extra' => [
                                    'picante',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Reis ist zu salzig',
                                'correct' => [
                                    'der',
                                    'Reis',
                                    'ist',
                                    'zu viel',
                                    'salzig',
                                ],
                                'extra' => [
                                    'scharf',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le riz est trop salé',
                                'correct' => [
                                    'le',
                                    'riz',
                                    'est',
                                    'trop',
                                    'salé',
                                ],
                                'extra' => [
                                    'épicé',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '밥은 너무 짭니다',
                                'correct' => [
                                    '밥은',
                                    '너무',
                                    '짭니다',
                                ],
                                'extra' => [
                                    '매운',
                                ],
                            ],
                            'tr' => ['sentence' => 'pirinç çok tuzlu', 'correct' => ['pirinç', 'çok', 'tuzlu'], 'extra' => ['acılı']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '鶏肉',
                            'は',
                            '辛い',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the chicken is spicy',
                                'correct' => [
                                    'the',
                                    'chicken',
                                    'is',
                                    'spicy',
                                ],
                                'extra' => [
                                    'salty',
                                ],
                            ],
                            'az' => ['sentence' => 'toyuq acılı', 'correct' => ['toyuq', 'acılı'], 'extra' => ['duzlu']],
                            'ar' => ['sentence' => 'دجاج حار', 'correct' => ['دجاج', 'حار'], 'extra' => ['مالح']],
                            'ru' => ['sentence' => 'курица острый', 'correct' => ['курица', 'острый'], 'extra' => ['солёный']],
                            'es' => [
                                'sentence' => 'El pollo está picante',
                                'correct' => [
                                    'el',
                                    'pollo',
                                    'está',
                                    'picante',
                                ],
                                'extra' => [
                                    'salado',
                                    'arroz',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Hähnchen ist scharf',
                                'correct' => [
                                    'das',
                                    'Hähnchen',
                                    'ist',
                                    'scharf',
                                ],
                                'extra' => [
                                    'salzig',
                                    'Reis',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poulet est épicé',
                                'correct' => [
                                    'le',
                                    'poulet',
                                    'est',
                                    'épicé',
                                ],
                                'extra' => [
                                    'salé',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '닭고기는 맵습니다',
                                'correct' => [
                                    '닭고기는',
                                    '맵습니다',
                                ],
                                'extra' => [
                                    '짠',
                                ],
                            ],
                            'tr' => ['sentence' => 'tavuk acılı', 'correct' => ['tavuk', 'acılı'], 'extra' => ['tuzlu']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'しょっぱい',
                            'ご飯',
                            'と',
                            '辛い',
                            '鶏肉',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a salty rice and a spicy chicken',
                                'correct' => [
                                    'a',
                                    'salty',
                                    'rice',
                                    'and',
                                    'a',
                                    'spicy',
                                    'chicken',
                                ],
                                'extra' => [
                                    'too much',
                                ],
                            ],
                            'az' => ['sentence' => 'bir duzlu düyü və bir acılı toyuq', 'correct' => ['bir', 'duzlu', 'düyü', 'və', 'bir', 'acılı', 'toyuq'], 'extra' => ['çox artıq']],
                            'ar' => ['sentence' => 'مالح أرز و حار دجاج', 'correct' => ['مالح', 'أرز', 'و', 'حار', 'دجاج'], 'extra' => ['كثير جدا']],
                            'ru' => ['sentence' => 'солёный рис и острый курица', 'correct' => ['солёный', 'рис', 'и', 'острый', 'курица'], 'extra' => ['слишком много']],
                            'es' => [
                                'sentence' => 'Un arroz salado y un pollo picante',
                                'correct' => [
                                    'un',
                                    'arroz',
                                    'salado',
                                    'y',
                                    'un',
                                    'pollo',
                                    'picante',
                                ],
                                'extra' => [
                                    'demasiado',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein salziger Reis und ein scharfes Hähnchen',
                                'correct' => [
                                    'ein',
                                    'salzig',
                                    'Reis',
                                    'und',
                                    'ein',
                                    'scharf',
                                    'Hähnchen',
                                ],
                                'extra' => [
                                    'zu viel',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un riz salé et un poulet épicé',
                                'correct' => [
                                    'un',
                                    'riz',
                                    'salé',
                                    'et',
                                    'un',
                                    'poulet',
                                    'épicé',
                                ],
                                'extra' => [
                                    'trop',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '짠 밥과 매운 닭고기',
                                'correct' => [
                                    '짠',
                                    '밥과',
                                    '매운',
                                    '닭고기',
                                ],
                                'extra' => [
                                    '너무',
                                ],
                            ],
                            'tr' => ['sentence' => 'tuzlu bir pirinç ve acılı bir tavuk', 'correct' => ['tuzlu', 'bir', 'pirinç', 've', 'acılı', 'bir', 'tavuk'], 'extra' => ['çok fazla']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン3: 魚・お皿', 3,
                pictures: [
                    [
                        'ja' => '魚',
                        'img' => 'fish',
                    ],
                    [
                        'ja' => 'お皿',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'ja' => '冷たい',
                    ],
                    [
                        'ja' => '問題',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            '魚',
                            'は',
                            '冷たい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the fish is cold',
                                'correct' => [
                                    'the',
                                    'fish',
                                    'is',
                                    'cold',
                                ],
                                'extra' => [
                                    'problem',
                                ],
                            ],
                            'az' => ['sentence' => 'balıq soyuq', 'correct' => ['balıq', 'soyuq'], 'extra' => ['problem']],
                            'ar' => ['sentence' => 'سمك بارد', 'correct' => ['سمك', 'بارد'], 'extra' => ['مشكلة']],
                            'ru' => ['sentence' => 'рыба холодный', 'correct' => ['рыба', 'холодный'], 'extra' => ['проблема']],
                            'es' => [
                                'sentence' => 'El pescado está frío',
                                'correct' => [
                                    'el',
                                    'pescado',
                                    'está',
                                    'frío',
                                ],
                                'extra' => [
                                    'problema',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Fisch ist kalt',
                                'correct' => [
                                    'der',
                                    'Fisch',
                                    'ist',
                                    'kalt',
                                ],
                                'extra' => [
                                    'Problem',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le poisson est froid',
                                'correct' => [
                                    'le',
                                    'poisson',
                                    'est',
                                    'froid',
                                ],
                                'extra' => [
                                    'problème',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '생선은 차갑습니다',
                                'correct' => [
                                    '생선은',
                                    '차갑습니다',
                                ],
                                'extra' => [
                                    '문제',
                                ],
                            ],
                            'tr' => ['sentence' => 'balık soğuk', 'correct' => ['balık', 'soğuk'], 'extra' => ['sorun']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '魚',
                            'に',
                            '問題',
                            'が',
                            'あります',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a problem with the fish',
                                'correct' => [
                                    'a',
                                    'problem',
                                    'with',
                                    'the',
                                    'fish',
                                ],
                                'extra' => [
                                    'cold',
                                ],
                            ],
                            'az' => ['sentence' => 'bir problem ilə balıq', 'correct' => ['bir', 'problem', 'ilə', 'balıq'], 'extra' => ['soyuq']],
                            'ar' => ['sentence' => 'مشكلة مع سمك', 'correct' => ['مشكلة', 'مع', 'سمك'], 'extra' => ['بارد']],
                            'ru' => ['sentence' => 'проблема с рыба', 'correct' => ['проблема', 'с', 'рыба'], 'extra' => ['холодный']],
                            'es' => [
                                'sentence' => 'Un problema con el pescado',
                                'correct' => [
                                    'un',
                                    'problema',
                                    'con',
                                    'el',
                                    'pescado',
                                ],
                                'extra' => [
                                    'frío',
                                    'plato',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Problem mit dem Fisch',
                                'correct' => [
                                    'ein',
                                    'Problem',
                                    'mit',
                                    'dem',
                                    'Fisch',
                                ],
                                'extra' => [
                                    'kalt',
                                    'Teller',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un problème avec le poisson',
                                'correct' => [
                                    'un',
                                    'problème',
                                    'avec',
                                    'le',
                                    'poisson',
                                ],
                                'extra' => [
                                    'froid',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '생선에 문제가 있습니다',
                                'correct' => [
                                    '생선에',
                                    '문제가',
                                    '있습니다',
                                ],
                                'extra' => [
                                    '차가운',
                                ],
                            ],
                            'tr' => ['sentence' => 'balıkla bir sorun', 'correct' => ['balıkla', 'bir', 'sorun'], 'extra' => ['soğuk']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'お皿',
                            'と',
                            '問題',
                        ],
                        'blank' => 2,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a plate and a problem',
                                'correct' => [
                                    'a',
                                    'plate',
                                    'and',
                                    'a',
                                    'problem',
                                ],
                                'extra' => [
                                    'cold',
                                ],
                            ],
                            'az' => ['sentence' => 'bir boşqab və bir problem', 'correct' => ['bir', 'boşqab', 'və', 'bir', 'problem'], 'extra' => ['soyuq']],
                            'ar' => ['sentence' => 'صحن و مشكلة', 'correct' => ['صحن', 'و', 'مشكلة'], 'extra' => ['بارد']],
                            'ru' => ['sentence' => 'тарелка и проблема', 'correct' => ['тарелка', 'и', 'проблема'], 'extra' => ['холодный']],
                            'es' => [
                                'sentence' => 'Un plato y un problema',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'y',
                                    'un',
                                    'problema',
                                ],
                                'extra' => [
                                    'frío',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein Teller und ein Problem',
                                'correct' => [
                                    'ein',
                                    'Teller',
                                    'und',
                                    'ein',
                                    'Problem',
                                ],
                                'extra' => [
                                    'kalt',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette et un problème',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'et',
                                    'un',
                                    'problème',
                                ],
                                'extra' => [
                                    'froid',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '접시와 문제',
                                'correct' => [
                                    '접시와',
                                    '문제',
                                ],
                                'extra' => [
                                    '차가운',
                                ],
                            ],
                            'tr' => ['sentence' => 'bir tabak ve bir sorun', 'correct' => ['bir', 'tabak', 've', 'bir', 'sorun'], 'extra' => ['soğuk']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン4: グラス・お皿', 4,
                pictures: [
                    [
                        'ja' => 'グラス',
                        'img' => 'glass',
                    ],
                    [
                        'ja' => 'お皿',
                        'img' => 'plate',
                    ],
                ],
                plain: [
                    [
                        'ja' => 'きれい',
                    ],
                    [
                        'ja' => '汚い',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'グラス',
                            'は',
                            'きれい',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the glass is clean',
                                'correct' => [
                                    'the',
                                    'glass',
                                    'is',
                                    'clean',
                                ],
                                'extra' => [
                                    'dirty',
                                ],
                            ],
                            'az' => ['sentence' => 'stəkan təmiz', 'correct' => ['stəkan', 'təmiz'], 'extra' => ['çirkli']],
                            'ar' => ['sentence' => 'كوب نظيف', 'correct' => ['كوب', 'نظيف'], 'extra' => ['متسخ']],
                            'ru' => ['sentence' => 'стакан чистый', 'correct' => ['стакан', 'чистый'], 'extra' => ['грязный']],
                            'es' => [
                                'sentence' => 'El vaso está limpio',
                                'correct' => [
                                    'el',
                                    'vaso',
                                    'está',
                                    'limpio',
                                ],
                                'extra' => [
                                    'sucio',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Das Glas ist sauber',
                                'correct' => [
                                    'das',
                                    'Glas',
                                    'ist',
                                    'sauber',
                                ],
                                'extra' => [
                                    'schmutzig',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le verre est propre',
                                'correct' => [
                                    'le',
                                    'verre',
                                    'est',
                                    'propre',
                                ],
                                'extra' => [
                                    'sale',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '유리잔은 깨끗합니다',
                                'correct' => [
                                    '유리잔은',
                                    '깨끗합니다',
                                ],
                                'extra' => [
                                    '더러운',
                                ],
                            ],
                            'tr' => ['sentence' => 'bardak temiz', 'correct' => ['bardak', 'temiz'], 'extra' => ['kirli']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '汚い',
                            'お皿',
                        ],
                        'blank' => 1,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a dirty plate',
                                'correct' => [
                                    'a',
                                    'dirty',
                                    'plate',
                                ],
                                'extra' => [
                                    'clean',
                                ],
                            ],
                            'az' => ['sentence' => 'bir çirkli boşqab', 'correct' => ['bir', 'çirkli', 'boşqab'], 'extra' => ['təmiz']],
                            'ar' => ['sentence' => 'متسخ صحن', 'correct' => ['متسخ', 'صحن'], 'extra' => ['نظيف']],
                            'ru' => ['sentence' => 'грязный тарелка', 'correct' => ['грязный', 'тарелка'], 'extra' => ['чистый']],
                            'es' => [
                                'sentence' => 'Un plato sucio',
                                'correct' => [
                                    'un',
                                    'plato',
                                    'sucio',
                                ],
                                'extra' => [
                                    'limpio',
                                    'vaso',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein schmutziger Teller',
                                'correct' => [
                                    'ein',
                                    'schmutzig',
                                    'Teller',
                                ],
                                'extra' => [
                                    'sauber',
                                    'Glas',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Une assiette sale',
                                'correct' => [
                                    'une',
                                    'assiette',
                                    'sale',
                                ],
                                'extra' => [
                                    'propre',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '더러운 접시',
                                'correct' => [
                                    '더러운',
                                    '접시',
                                ],
                                'extra' => [
                                    '깨끗한',
                                ],
                            ],
                            'tr' => ['sentence' => 'kirli bir tabak', 'correct' => ['kirli', 'bir', 'tabak'], 'extra' => ['temiz']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'きれいな',
                            'グラス',
                            'と',
                            '汚い',
                            'お皿',
                        ],
                        'blank' => 4,
                        'tr' => [
                            'en' => [
                                'sentence' => 'a clean glass and a dirty plate',
                                'correct' => [
                                    'a',
                                    'clean',
                                    'glass',
                                    'and',
                                    'a',
                                    'dirty',
                                    'plate',
                                ],
                                'extra' => [
                                    'is',
                                ],
                            ],
                            'az' => ['sentence' => 'bir təmiz stəkan və bir çirkli boşqab', 'correct' => ['bir', 'təmiz', 'stəkan', 'və', 'bir', 'çirkli', 'boşqab'], 'extra' => []],
                            'ar' => ['sentence' => 'نظيف كوب و متسخ صحن', 'correct' => ['نظيف', 'كوب', 'و', 'متسخ', 'صحن'], 'extra' => []],
                            'ru' => ['sentence' => 'чистый стакан и грязный тарелка', 'correct' => ['чистый', 'стакан', 'и', 'грязный', 'тарелка'], 'extra' => []],
                            'es' => [
                                'sentence' => 'Un vaso limpio y un plato sucio',
                                'correct' => [
                                    'un',
                                    'vaso',
                                    'limpio',
                                    'y',
                                    'un',
                                    'plato',
                                    'sucio',
                                ],
                                'extra' => [
                                    'está',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Ein sauberes Glas und ein schmutziger Teller',
                                'correct' => [
                                    'ein',
                                    'sauber',
                                    'Glas',
                                    'und',
                                    'ein',
                                    'schmutzig',
                                    'Teller',
                                ],
                                'extra' => [
                                    'ist',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Un verre propre et une assiette sale',
                                'correct' => [
                                    'un',
                                    'verre',
                                    'propre',
                                    'et',
                                    'une',
                                    'assiette',
                                    'sale',
                                ],
                                'extra' => [
                                    'est',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '깨끗한 유리잔과 더러운 접시',
                                'correct' => [
                                    '깨끗한',
                                    '유리잔과',
                                    '더러운',
                                    '접시',
                                ],
                                'extra' => [
                                    '입니다',
                                ],
                            ],
                            'tr' => ['sentence' => 'temiz bir bardak ve kirli bir tabak', 'correct' => ['temiz', 'bir', 'bardak', 've', 'kirli', 'bir', 'tabak'], 'extra' => ['dır']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('レッスン5: コーヒー・ケーキ', 5,
                pictures: [
                    [
                        'ja' => 'コーヒー',
                        'img' => 'coffee',
                    ],
                    [
                        'ja' => 'ケーキ',
                        'img' => 'cake',
                    ],
                ],
                plain: [
                    [
                        'ja' => '完璧',
                    ],
                    [
                        'ja' => '味',
                    ],
                ],
                phrases: [
                    'a' => [
                        'words' => [
                            'コーヒー',
                            'は',
                            '完璧',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the coffee is perfect',
                                'correct' => [
                                    'the',
                                    'coffee',
                                    'is',
                                    'perfect',
                                ],
                                'extra' => [
                                    'taste',
                                ],
                            ],
                            'az' => ['sentence' => 'qəhvə mükəmməl', 'correct' => ['qəhvə', 'mükəmməl'], 'extra' => ['dad']],
                            'ar' => ['sentence' => 'قهوة مثالي', 'correct' => ['قهوة', 'مثالي'], 'extra' => ['مذاق']],
                            'ru' => ['sentence' => 'кофе идеально', 'correct' => ['кофе', 'идеально'], 'extra' => ['вкус']],
                            'es' => [
                                'sentence' => 'El café es perfecto',
                                'correct' => [
                                    'el',
                                    'café',
                                    'es',
                                    'perfecto',
                                ],
                                'extra' => [
                                    'sabor',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Kaffee ist perfekt',
                                'correct' => [
                                    'der',
                                    'Kaffee',
                                    'ist',
                                    'perfekt',
                                ],
                                'extra' => [
                                    'Geschmack',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le café est parfait',
                                'correct' => [
                                    'le',
                                    'café',
                                    'est',
                                    'parfait',
                                ],
                                'extra' => [
                                    'goût',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '커피는 완벽합니다',
                                'correct' => [
                                    '커피는',
                                    '완벽합니다',
                                ],
                                'extra' => [
                                    '맛',
                                ],
                            ],
                            'tr' => ['sentence' => 'kahve mükemmel', 'correct' => ['kahve', 'mükemmel'], 'extra' => ['tat']],
                        ],
                    ],
                    'b' => [
                        'words' => [
                            '味',
                            'は',
                            '良い',
                            'です',
                        ],
                        'blank' => 3,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the taste is good',
                                'correct' => [
                                    'the',
                                    'taste',
                                    'is',
                                    'good',
                                ],
                                'extra' => [
                                    'perfect',
                                ],
                            ],
                            'az' => ['sentence' => 'dad yaxşı', 'correct' => ['dad', 'yaxşı'], 'extra' => ['mükəmməl']],
                            'ar' => ['sentence' => 'مذاق جيد', 'correct' => ['مذاق', 'جيد'], 'extra' => ['مثالي']],
                            'ru' => ['sentence' => 'вкус хороший', 'correct' => ['вкус', 'хороший'], 'extra' => ['идеально']],
                            'es' => [
                                'sentence' => 'El sabor es bueno',
                                'correct' => [
                                    'el',
                                    'sabor',
                                    'es',
                                    'bueno',
                                ],
                                'extra' => [
                                    'perfecto',
                                    'café',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Geschmack ist gut',
                                'correct' => [
                                    'der',
                                    'Geschmack',
                                    'ist',
                                    'gut',
                                ],
                                'extra' => [
                                    'perfekt',
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le goût est bon',
                                'correct' => [
                                    'le',
                                    'goût',
                                    'est',
                                    'bon',
                                ],
                                'extra' => [
                                    'parfait',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '맛은 좋습니다',
                                'correct' => [
                                    '맛은',
                                    '좋습니다',
                                ],
                                'extra' => [
                                    '완벽한',
                                ],
                            ],
                            'tr' => ['sentence' => 'tadı iyi', 'correct' => ['tadı', 'iyi'], 'extra' => ['mükemmel']],
                        ],
                    ],
                    'c' => [
                        'words' => [
                            'ケーキ',
                            'の',
                            '味',
                            'は',
                            '完璧',
                            'です',
                        ],
                        'blank' => 5,
                        'tr' => [
                            'en' => [
                                'sentence' => 'the taste of the cake is perfect',
                                'correct' => [
                                    'the',
                                    'taste',
                                    'of',
                                    'the',
                                    'cake',
                                    'is',
                                    'perfect',
                                ],
                                'extra' => [
                                    'coffee',
                                ],
                            ],
                            'az' => ['sentence' => 'dad tort mükəmməl', 'correct' => ['dad', 'tort', 'mükəmməl'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'مذاق كعكة مثالي', 'correct' => ['مذاق', 'كعكة', 'مثالي'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'вкус торт идеально', 'correct' => ['вкус', 'торт', 'идеально'], 'extra' => ['кофе']],
                            'es' => [
                                'sentence' => 'El sabor del pastel es perfecto',
                                'correct' => [
                                    'el',
                                    'sabor',
                                    'de',
                                    'el',
                                    'pastel',
                                    'es',
                                    'perfecto',
                                ],
                                'extra' => [
                                    'café',
                                ],
                            ],
                            'de' => [
                                'sentence' => 'Der Geschmack des Kuchens ist perfekt',
                                'correct' => [
                                    'der',
                                    'Geschmack',
                                    'von',
                                    'dem',
                                    'Kuchen',
                                    'ist',
                                    'perfekt',
                                ],
                                'extra' => [
                                    'Kaffee',
                                ],
                            ],
                            'fr' => [
                                'sentence' => 'Le goût du gâteau est parfait',
                                'correct' => [
                                    'le',
                                    'goût',
                                    'de',
                                    'le',
                                    'gâteau',
                                    'est',
                                    'parfait',
                                ],
                                'extra' => [
                                    'café',
                                ],
                            ],
                            'ko' => [
                                'sentence' => '케이크의 맛은 완벽합니다',
                                'correct' => [
                                    '케이크의',
                                    '맛은',
                                    '완벽합니다',
                                ],
                                'extra' => [
                                    '커피',
                                ],
                            ],
                            'tr' => ['sentence' => 'pastanın tadı mükemmel', 'correct' => ['pastanın', 'tadı', 'mükemmel'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
