<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner01Seeder extends Seeder
{
    private const PICTURES = [
        'Coffee' => 'coffee', 'Tea' => 'tea', 'Milk' => 'milk', 'Sugar' => 'sugar',
        'Bread' => 'bread', 'Water' => 'water',
    ];

    /**
     * English Chapter 1, Unit 1 — greetings and a first drink.
     *
     * The first thing a learner can do in English is walk into a café and ask
     * for something politely, so this unit pairs the two everyday drinks with
     * please/thank you/hello and the two words that glue an order together
     * (a, and). By Lesson 5 the learner can order two things and ask for the
     * bill.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: At the Café', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Coffee & Tea', 1,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Tea', 'img' => 'tea']],
                plain: [['en' => 'Please'], ['en' => 'Thank you']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'coffee', 'please'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un café, por favor', 'correct' => ['un', 'café', 'por favor'], 'extra' => ['té', 'gracias']],
                            'de' => ['sentence' => 'Einen Kaffee, bitte', 'correct' => ['einen', 'Kaffee', 'bitte'], 'extra' => ['Tee', 'danke']],
                            'ja' => ['sentence' => 'コーヒーをお願いします', 'correct' => ['コーヒー', 'を', 'お願いします'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피 부탁합니다', 'correct' => ['커피', '부탁합니다'], 'extra' => ['차']],
                            'fr' => ['sentence' => "Un café, s'il vous plaît", 'correct' => ['un', 'café', "s'il vous plaît"], 'extra' => ['thé', 'merci']],
                            'tr' => ['sentence' => 'bir kahve lütfen', 'correct' => ['bir', 'kahve', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'кофе пожалуйста', 'correct' => ['кофе', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'قهوة من فضلك', 'correct' => ['قهوة', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'bir qəhvə zəhmət olmasa', 'correct' => ['bir', 'qəhvə', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'tea', 'thank you'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un té, gracias', 'correct' => ['un', 'té', 'gracias'], 'extra' => ['café', 'por favor']],
                            'de' => ['sentence' => 'Einen Tee, danke', 'correct' => ['einen', 'Tee', 'danke'], 'extra' => ['Kaffee', 'bitte']],
                            'ja' => ['sentence' => 'お茶をありがとう', 'correct' => ['お茶', 'を', 'ありがとう'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '차 감사합니다', 'correct' => ['차', '감사합니다'], 'extra' => ['커피']],
                            'fr' => ['sentence' => 'Un thé, merci', 'correct' => ['un', 'thé', 'merci'], 'extra' => ['café', "s'il vous plaît"]],
                            'tr' => ['sentence' => 'bir çay teşekkürler', 'correct' => ['bir', 'çay', 'teşekkürler'], 'extra' => []],
                        'ru' => ['sentence' => 'чай спасибо', 'correct' => ['чай', 'спасибо'], 'extra' => []],
                        'ar' => ['sentence' => 'شاي شكرا', 'correct' => ['شاي', 'شكرا'], 'extra' => []],
                        'az' => ['sentence' => 'bir çay təşəkkür', 'correct' => ['bir', 'çay', 'təşəkkür'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'coffee', 'and', 'a', 'tea'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un café y un té', 'correct' => ['un', 'café', 'y', 'un', 'té'], 'extra' => ['gracias']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Tee'], 'extra' => ['danke']],
                            'ja' => ['sentence' => 'コーヒーとお茶', 'correct' => ['コーヒー', 'と', 'お茶'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '커피와 차', 'correct' => ['커피와', '차'], 'extra' => ['감사합니다']],
                            'fr' => ['sentence' => 'Un café et un thé', 'correct' => ['un', 'café', 'et', 'un', 'thé'], 'extra' => ['merci']],
                            'tr' => ['sentence' => 'bir kahve ve bir çay', 'correct' => ['bir', 'kahve', 've', 'bir', 'çay'], 'extra' => []],
                        'ru' => ['sentence' => 'кофе и чай', 'correct' => ['кофе', 'и', 'чай'], 'extra' => []],
                        'ar' => ['sentence' => 'قهوة و شاي', 'correct' => ['قهوة', 'و', 'شاي'], 'extra' => []],
                        'az' => ['sentence' => 'bir qəhvə və bir çay', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'çay'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Bread & Water', 2,
                pictures: [['en' => 'Bread', 'img' => 'bread'], ['en' => 'Water', 'img' => 'water']],
                plain: [['en' => 'Hello'], ['en' => 'And']],
                phrases: [
                    'a' => [
                        'words' => ['hello', 'a', 'water', 'please'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Hola, un agua por favor', 'correct' => ['hola', 'un', 'agua', 'por favor'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Hallo, ein Wasser bitte', 'correct' => ['hallo', 'ein', 'Wasser', 'bitte'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'こんにちは、水をお願いします', 'correct' => ['こんにちは', '水', 'を', 'お願いします'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '안녕하세요, 물 부탁합니다', 'correct' => ['안녕하세요', '물', '부탁합니다'], 'extra' => ['빵']],
                            'fr' => ['sentence' => "Bonjour, une eau s'il vous plaît", 'correct' => ['bonjour', 'une', 'eau', "s'il vous plaît"], 'extra' => ['pain']],
                            'tr' => ['sentence' => 'merhaba bir su lütfen', 'correct' => ['merhaba', 'bir', 'su', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'привет вода пожалуйста', 'correct' => ['привет', 'вода', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'مرحبا ماء من فضلك', 'correct' => ['مرحبا', 'ماء', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'salam bir su zəhmət olmasa', 'correct' => ['salam', 'bir', 'su', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['bread', 'and', 'water'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Pan y agua', 'correct' => ['pan', 'y', 'agua'], 'extra' => ['hola', 'gracias']],
                            'de' => ['sentence' => 'Brot und Wasser', 'correct' => ['Brot', 'und', 'Wasser'], 'extra' => ['hallo', 'danke']],
                            'ja' => ['sentence' => 'パンと水', 'correct' => ['パン', 'と', '水'], 'extra' => ['こんにちは']],
                            'ko' => ['sentence' => '빵과 물', 'correct' => ['빵과', '물'], 'extra' => ['안녕하세요']],
                            'fr' => ['sentence' => 'Du pain et de l\'eau', 'correct' => ['pain', 'et', 'eau'], 'extra' => ['bonjour', 'merci']],
                            'tr' => ['sentence' => 'ekmek ve su', 'correct' => ['ekmek', 've', 'su'], 'extra' => []],
                        'ru' => ['sentence' => 'хлеб и вода', 'correct' => ['хлеб', 'и', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'خبز و ماء', 'correct' => ['خبز', 'و', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'çörək və su', 'correct' => ['çörək', 'və', 'su'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['hello', 'bread', 'and', 'a', 'coffee'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Hola, pan y un café', 'correct' => ['hola', 'pan', 'y', 'un', 'café'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Hallo, Brot und einen Kaffee', 'correct' => ['hallo', 'Brot', 'und', 'einen', 'Kaffee'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => 'こんにちは、パンとコーヒー', 'correct' => ['こんにちは', 'パン', 'と', 'コーヒー'], 'extra' => ['水']],
                            'ko' => ['sentence' => '안녕하세요, 빵과 커피', 'correct' => ['안녕하세요', '빵과', '커피'], 'extra' => ['물']],
                            'fr' => ['sentence' => 'Bonjour, du pain et un café', 'correct' => ['bonjour', 'pain', 'et', 'un', 'café'], 'extra' => ['eau']],
                            'tr' => ['sentence' => 'merhaba ekmek ve bir kahve', 'correct' => ['merhaba', 'ekmek', 've', 'bir', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'привет хлеб и кофе', 'correct' => ['привет', 'хлеб', 'и', 'кофе'], 'extra' => []],
                        'ar' => ['sentence' => 'مرحبا خبز و قهوة', 'correct' => ['مرحبا', 'خبز', 'و', 'قهوة'], 'extra' => []],
                        'az' => ['sentence' => 'salam çörək və bir qəhvə', 'correct' => ['salam', 'çörək', 'və', 'bir', 'qəhvə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Milk & Sugar', 3,
                pictures: [['en' => 'Milk', 'img' => 'milk'], ['en' => 'Sugar', 'img' => 'sugar']],
                plain: [['en' => 'With'], ['en' => 'I would like']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'coffee', 'with', 'milk'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un café con leche', 'correct' => ['un', 'café', 'con', 'leche'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Einen Kaffee mit Milch', 'correct' => ['einen', 'Kaffee', 'mit', 'Milch'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => '牛乳を入れたコーヒー', 'correct' => ['牛乳', 'を', '入れた', 'コーヒー'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '우유를 넣은 커피', 'correct' => ['우유를', '넣은', '커피'], 'extra' => ['설탕']],
                            'fr' => ['sentence' => 'Un café avec du lait', 'correct' => ['un', 'café', 'avec', 'lait'], 'extra' => ['sucre']],
                            'tr' => ['sentence' => 'sütlü bir kahve', 'correct' => ['sütlü', 'bir', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'кофе с молоко', 'correct' => ['кофе', 'с', 'молоко'], 'extra' => []],
                        'ar' => ['sentence' => 'قهوة مع حليب', 'correct' => ['قهوة', 'مع', 'حليب'], 'extra' => []],
                        'az' => ['sentence' => 'bir qəhvə ilə süd', 'correct' => ['bir', 'qəhvə', 'ilə', 'süd'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I would like', 'sugar'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera azúcar', 'correct' => ['quisiera', 'azúcar'], 'extra' => ['leche', 'con']],
                            'de' => ['sentence' => 'Ich möchte Zucker', 'correct' => ['ich möchte', 'Zucker'], 'extra' => ['Milch', 'mit']],
                            'ja' => ['sentence' => '砂糖をください', 'correct' => ['砂糖', 'を', 'ください'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '설탕을 주세요', 'correct' => ['설탕을', '주세요'], 'extra' => ['우유']],
                            'fr' => ['sentence' => 'Je voudrais du sucre', 'correct' => ['je voudrais', 'sucre'], 'extra' => ['lait', 'avec']],
                            'tr' => ['sentence' => 'şeker istiyorum', 'correct' => ['şeker', 'istiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я хочу сахар', 'correct' => ['я', 'хочу', 'сахар'], 'extra' => []],
                        'ar' => ['sentence' => 'أريد سكر', 'correct' => ['أريد', 'سكر'], 'extra' => []],
                        'az' => ['sentence' => 'istəyirəm şəkər', 'correct' => ['istəyirəm', 'şəkər'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['I would like', 'a', 'tea', 'with', 'milk'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera un té con leche', 'correct' => ['quisiera', 'un', 'té', 'con', 'leche'], 'extra' => ['azúcar']],
                            'de' => ['sentence' => 'Ich möchte einen Tee mit Milch', 'correct' => ['ich möchte', 'einen', 'Tee', 'mit', 'Milch'], 'extra' => ['Zucker']],
                            'ja' => ['sentence' => '牛乳を入れたお茶をください', 'correct' => ['牛乳', 'を', '入れた', 'お茶', 'を', 'ください'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '우유를 넣은 차를 주세요', 'correct' => ['우유를', '넣은', '차를', '주세요'], 'extra' => ['설탕']],
                            'fr' => ['sentence' => 'Je voudrais un thé avec du lait', 'correct' => ['je voudrais', 'un', 'thé', 'avec', 'lait'], 'extra' => ['sucre']],
                            'tr' => ['sentence' => 'sütlü bir çay istiyorum', 'correct' => ['sütlü', 'bir', 'çay', 'istiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я хочу чай с молоко', 'correct' => ['я', 'хочу', 'чай', 'с', 'молоко'], 'extra' => []],
                        'ar' => ['sentence' => 'أريد شاي مع حليب', 'correct' => ['أريد', 'شاي', 'مع', 'حليب'], 'extra' => []],
                        'az' => ['sentence' => 'istəyirəm bir çay ilə süd', 'correct' => ['istəyirəm', 'bir', 'çay', 'ilə', 'süd'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Yes & No', 4,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Milk', 'img' => 'milk']],
                plain: [['en' => 'Yes'], ['en' => 'No']],
                phrases: [
                    'a' => [
                        'words' => ['yes', 'a', 'coffee', 'please'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Sí, un café por favor', 'correct' => ['sí', 'un', 'café', 'por favor'], 'extra' => ['no']],
                            'de' => ['sentence' => 'Ja, einen Kaffee bitte', 'correct' => ['ja', 'einen', 'Kaffee', 'bitte'], 'extra' => ['nein']],
                            'ja' => ['sentence' => 'はい、コーヒーをお願いします', 'correct' => ['はい', 'コーヒー', 'を', 'お願いします'], 'extra' => ['いいえ']],
                            'ko' => ['sentence' => '네, 커피 부탁합니다', 'correct' => ['네', '커피', '부탁합니다'], 'extra' => ['아니요']],
                            'fr' => ['sentence' => "Oui, un café s'il vous plaît", 'correct' => ['oui', 'un', 'café', "s'il vous plaît"], 'extra' => ['non']],
                            'tr' => ['sentence' => 'evet bir kahve lütfen', 'correct' => ['evet', 'bir', 'kahve', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'да кофе пожалуйста', 'correct' => ['да', 'кофе', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'نعم قهوة من فضلك', 'correct' => ['نعم', 'قهوة', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'bəli bir qəhvə zəhmət olmasa', 'correct' => ['bəli', 'bir', 'qəhvə', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['no', 'milk'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Sin leche', 'correct' => ['no', 'leche'], 'extra' => ['sí', 'café']],
                            'de' => ['sentence' => 'Keine Milch', 'correct' => ['nein', 'Milch'], 'extra' => ['ja', 'Kaffee']],
                            'ja' => ['sentence' => '牛乳はいりません', 'correct' => ['牛乳', 'は', 'いりません'], 'extra' => ['はい']],
                            'ko' => ['sentence' => '우유는 아니요', 'correct' => ['우유는', '아니요'], 'extra' => ['네']],
                            'fr' => ['sentence' => 'Pas de lait', 'correct' => ['non', 'lait'], 'extra' => ['oui', 'café']],
                            'tr' => ['sentence' => 'süt yok', 'correct' => ['süt', 'yok'], 'extra' => []],
                        'ru' => ['sentence' => 'нет молоко', 'correct' => ['нет', 'молоко'], 'extra' => []],
                        'ar' => ['sentence' => 'لا حليب', 'correct' => ['لا', 'حليب'], 'extra' => []],
                        'az' => ['sentence' => 'xeyr süd', 'correct' => ['xeyr', 'süd'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['yes', 'a', 'coffee', 'with', 'milk'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Sí, un café con leche', 'correct' => ['sí', 'un', 'café', 'con', 'leche'], 'extra' => ['no']],
                            'de' => ['sentence' => 'Ja, einen Kaffee mit Milch', 'correct' => ['ja', 'einen', 'Kaffee', 'mit', 'Milch'], 'extra' => ['nein']],
                            'ja' => ['sentence' => 'はい、牛乳を入れたコーヒー', 'correct' => ['はい', '牛乳', 'を', '入れた', 'コーヒー'], 'extra' => ['いいえ']],
                            'ko' => ['sentence' => '네, 우유를 넣은 커피', 'correct' => ['네', '우유를', '넣은', '커피'], 'extra' => ['아니요']],
                            'fr' => ['sentence' => 'Oui, un café avec du lait', 'correct' => ['oui', 'un', 'café', 'avec', 'lait'], 'extra' => ['non']],
                            'tr' => ['sentence' => 'evet sütlü bir kahve', 'correct' => ['evet', 'sütlü', 'bir', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'да кофе с молоко', 'correct' => ['да', 'кофе', 'с', 'молоко'], 'extra' => []],
                        'ar' => ['sentence' => 'نعم قهوة مع حليب', 'correct' => ['نعم', 'قهوة', 'مع', 'حليب'], 'extra' => []],
                        'az' => ['sentence' => 'bəli bir qəhvə ilə süd', 'correct' => ['bəli', 'bir', 'qəhvə', 'ilə', 'süd'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Ordering', 5,
                pictures: [['en' => 'Tea', 'img' => 'tea'], ['en' => 'Sugar', 'img' => 'sugar']],
                plain: [['en' => 'I would like'], ['en' => 'The bill']],
                phrases: [
                    'a' => [
                        'words' => ['I would like', 'a', 'tea'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera un té', 'correct' => ['quisiera', 'un', 'té'], 'extra' => ['café', 'azúcar']],
                            'de' => ['sentence' => 'Ich möchte einen Tee', 'correct' => ['ich möchte', 'einen', 'Tee'], 'extra' => ['Kaffee', 'Zucker']],
                            'ja' => ['sentence' => 'お茶をください', 'correct' => ['お茶', 'を', 'ください'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '차를 주세요', 'correct' => ['차를', '주세요'], 'extra' => ['커피']],
                            'fr' => ['sentence' => 'Je voudrais un thé', 'correct' => ['je voudrais', 'un', 'thé'], 'extra' => ['café', 'sucre']],
                            'tr' => ['sentence' => 'bir çay istiyorum', 'correct' => ['bir', 'çay', 'istiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я хочу чай', 'correct' => ['я', 'хочу', 'чай'], 'extra' => []],
                        'ar' => ['sentence' => 'أريد شاي', 'correct' => ['أريد', 'شاي'], 'extra' => []],
                        'az' => ['sentence' => 'istəyirəm bir çay', 'correct' => ['istəyirəm', 'bir', 'çay'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the bill', 'please'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la cuenta', 'por favor'], 'extra' => ['gracias', 'azúcar']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die Rechnung', 'bitte'], 'extra' => ['danke', 'Zucker']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['砂糖']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['설탕']],
                            'fr' => ['sentence' => "L'addition, s'il vous plaît", 'correct' => ["l'addition", "s'il vous plaît"], 'extra' => ['merci', 'sucre']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => []],
                        'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => []],
                        'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => []],
                        'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['I would like', 'a', 'tea', 'with', 'sugar'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Quisiera un té con azúcar', 'correct' => ['quisiera', 'un', 'té', 'con', 'azúcar'], 'extra' => ['la cuenta']],
                            'de' => ['sentence' => 'Ich möchte einen Tee mit Zucker', 'correct' => ['ich möchte', 'einen', 'Tee', 'mit', 'Zucker'], 'extra' => ['die Rechnung']],
                            'ja' => ['sentence' => '砂糖を入れたお茶をください', 'correct' => ['砂糖', 'を', '入れた', 'お茶', 'を', 'ください'], 'extra' => ['お会計']],
                            'ko' => ['sentence' => '설탕을 넣은 차를 주세요', 'correct' => ['설탕을', '넣은', '차를', '주세요'], 'extra' => ['계산서']],
                            'fr' => ['sentence' => 'Je voudrais un thé avec du sucre', 'correct' => ['je voudrais', 'un', 'thé', 'avec', 'sucre'], 'extra' => ["l'addition"]],
                            'tr' => ['sentence' => 'şekerli bir çay istiyorum', 'correct' => ['şekerli', 'bir', 'çay', 'istiyorum'], 'extra' => []],
                        'ru' => ['sentence' => 'я хочу чай с сахар', 'correct' => ['я', 'хочу', 'чай', 'с', 'сахар'], 'extra' => []],
                        'ar' => ['sentence' => 'أريد شاي مع سكر', 'correct' => ['أريد', 'شاي', 'مع', 'سكر'], 'extra' => []],
                        'az' => ['sentence' => 'istəyirəm bir çay ilə şəkər', 'correct' => ['istəyirəm', 'bir', 'çay', 'ilə', 'şəkər'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
