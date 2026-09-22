<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Café' => 'coffee', 'Thé' => 'tea', 'Eau' => 'water', 'Lait' => 'milk',
        'Pain' => 'bread', 'Croissant' => 'croissant', 'Éclair' => 'eclair', 'Sucre' => 'sugar',
    ];

    /**
     * French Beginner Unit 1 — ordering at a café.
     *
     * Content rule this unit follows (and the audit enforces): every one of a
     * lesson's four words must appear in at least one of its three phrases.
     * Words drilled only in isolation don't stick, so nothing is taught that
     * the learner never gets to use.
     *
     * Three phrases per lesson also mean the five sessions never repeat the
     * same set — see FrenchLessonBuilder::SESSION_PLAN.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: At the Café', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Coffee & Tea', 1,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Thé', 'img' => 'tea']],
                plain: [['fr' => 'Un'], ['fr' => 'Et']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'café'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee', 'correct' => ['a', 'coffee'], 'extra' => ['tea', 'and']],
                            'az' => ['sentence' => 'bir qəhvə', 'correct' => ['bir', 'qəhvə'], 'extra' => ['çay', 'və']],
                            'ar' => ['sentence' => 'قهوة', 'correct' => ['قهوة'], 'extra' => ['شاي', 'و']],
                            'ru' => ['sentence' => 'кофе', 'correct' => ['кофе'], 'extra' => ['чай', 'и']],
                            'es' => ['sentence' => 'Un café', 'correct' => ['un', 'café'], 'extra' => ['té', 'y']],
                            'de' => ['sentence' => 'Einen Kaffee', 'correct' => ['einen', 'Kaffee'], 'extra' => ['Tee', 'und']],
                            'ja' => ['sentence' => 'コーヒー', 'correct' => ['コーヒー'], 'extra' => ['お茶', 'と']],
                            'ko' => ['sentence' => '커피', 'correct' => ['커피'], 'extra' => ['차', '그리고']],
                            'tr' => ['sentence' => 'bir kahve', 'correct' => ['bir', 'kahve'], 'extra' => ['çay', 've']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'thé'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A tea', 'correct' => ['a', 'tea'], 'extra' => ['coffee', 'and']],
                            'az' => ['sentence' => 'bir çay', 'correct' => ['bir', 'çay'], 'extra' => ['qəhvə', 'və']],
                            'ar' => ['sentence' => 'شاي', 'correct' => ['شاي'], 'extra' => ['قهوة', 'و']],
                            'ru' => ['sentence' => 'чай', 'correct' => ['чай'], 'extra' => ['кофе', 'и']],
                            'es' => ['sentence' => 'Un té', 'correct' => ['un', 'té'], 'extra' => ['café', 'y']],
                            'de' => ['sentence' => 'Einen Tee', 'correct' => ['einen', 'Tee'], 'extra' => ['Kaffee', 'und']],
                            'ja' => ['sentence' => 'お茶', 'correct' => ['お茶'], 'extra' => ['コーヒー', 'と']],
                            'ko' => ['sentence' => '차', 'correct' => ['차'], 'extra' => ['커피', '그리고']],
                            'tr' => ['sentence' => 'bir çay', 'correct' => ['bir', 'çay'], 'extra' => ['kahve', 've']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'café', 'et', 'un', 'thé'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee and a tea', 'correct' => ['a', 'coffee', 'and', 'a', 'tea'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir qəhvə və bir çay', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'çay'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'قهوة و شاي', 'correct' => ['قهوة', 'و', 'شاي'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'кофе и чай', 'correct' => ['кофе', 'и', 'чай'], 'extra' => ['молоко']],
                            'es' => ['sentence' => 'Un café y un té', 'correct' => ['un', 'café', 'y', 'un', 'té'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee und einen Tee', 'correct' => ['einen', 'Kaffee', 'und', 'einen', 'Tee'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'コーヒーとお茶', 'correct' => ['コーヒー', 'と', 'お茶'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '커피와 차', 'correct' => ['커피와', '차'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bir kahve ve bir çay', 'correct' => ['bir', 'kahve', 've', 'bir', 'çay'], 'extra' => ['süt']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Bread & Please', 2,
                pictures: [['fr' => 'Croissant', 'img' => 'croissant'], ['fr' => 'Pain', 'img' => 'bread']],
                plain: [['fr' => 'Bonjour'], ['fr' => "S'il vous plaît"]],
                phrases: [
                    'a' => [
                        'words' => ['un', 'croissant'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A croissant', 'correct' => ['a', 'croissant'], 'extra' => ['bread', 'hello']],
                            'az' => ['sentence' => 'bir kruassan', 'correct' => ['bir', 'kruassan'], 'extra' => ['çörək', 'salam']],
                            'ar' => ['sentence' => 'كرواسون', 'correct' => ['كرواسون'], 'extra' => ['خبز', 'مرحبا']],
                            'ru' => ['sentence' => 'круассан', 'correct' => ['круассан'], 'extra' => ['хлеб', 'привет']],
                            'es' => ['sentence' => 'Un cruasán', 'correct' => ['un', 'cruasán'], 'extra' => ['pan', 'hola']],
                            'de' => ['sentence' => 'Ein Croissant', 'correct' => ['ein', 'Croissant'], 'extra' => ['Brot', 'hallo']],
                            'ja' => ['sentence' => 'クロワッサン', 'correct' => ['クロワッサン'], 'extra' => ['パン', 'こんにちは']],
                            'ko' => ['sentence' => '크루아상', 'correct' => ['크루아상'], 'extra' => ['빵', '안녕하세요']],
                            'tr' => ['sentence' => 'bir kruvasan', 'correct' => ['bir', 'kruvasan'], 'extra' => ['ekmek', 'merhaba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bonjour', 'un', 'pain'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Hello, a bread', 'correct' => ['hello', 'a', 'bread'], 'extra' => ['croissant']],
                            'az' => ['sentence' => 'salam bir çörək', 'correct' => ['salam', 'bir', 'çörək'], 'extra' => ['kruassan']],
                            'ar' => ['sentence' => 'مرحبا خبز', 'correct' => ['مرحبا', 'خبز'], 'extra' => ['كرواسون']],
                            'ru' => ['sentence' => 'привет хлеб', 'correct' => ['привет', 'хлеб'], 'extra' => ['круассан']],
                            'es' => ['sentence' => 'Hola, un pan', 'correct' => ['hola', 'un', 'pan'], 'extra' => ['cruasán']],
                            'de' => ['sentence' => 'Hallo, ein Brot', 'correct' => ['hallo', 'ein', 'Brot'], 'extra' => ['Croissant']],
                            'ja' => ['sentence' => 'こんにちは、パン', 'correct' => ['こんにちは', 'パン'], 'extra' => ['クロワッサン']],
                            'ko' => ['sentence' => '안녕하세요, 빵', 'correct' => ['안녕하세요', '빵'], 'extra' => ['크루아상']],
                            'tr' => ['sentence' => 'merhaba bir ekmek', 'correct' => ['merhaba', 'bir', 'ekmek'], 'extra' => ['kruvasan']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'croissant', "s'il vous plaît"], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A croissant, please', 'correct' => ['a', 'croissant', 'please'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'bir kruassan zəhmət olmasa', 'correct' => ['bir', 'kruassan', 'zəhmət olmasa'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'كرواسون من فضلك', 'correct' => ['كرواسون', 'من فضلك'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'круассан пожалуйста', 'correct' => ['круассан', 'пожалуйста'], 'extra' => ['хлеб']],
                            'es' => ['sentence' => 'Un cruasán, por favor', 'correct' => ['un', 'cruasán', 'por favor'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Ein Croissant, bitte', 'correct' => ['ein', 'Croissant', 'bitte'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'クロワッサンをお願いします', 'correct' => ['クロワッサン', 'を', 'お願いします'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '크루아상 부탁합니다', 'correct' => ['크루아상', '부탁합니다'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'bir kruvasan lütfen', 'correct' => ['bir', 'kruvasan', 'lütfen'], 'extra' => ['ekmek']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Milk & Sugar', 3,
                pictures: [['fr' => 'Lait', 'img' => 'milk'], ['fr' => 'Sucre', 'img' => 'sugar']],
                plain: [['fr' => 'Merci'], ['fr' => 'Avec']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'lait'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A milk', 'correct' => ['a', 'milk'], 'extra' => ['sugar', 'thank you']],
                            'az' => ['sentence' => 'bir süd', 'correct' => ['bir', 'süd'], 'extra' => ['şəkər', 'təşəkkür']],
                            'ar' => ['sentence' => 'حليب', 'correct' => ['حليب'], 'extra' => ['سكر', 'شكرا']],
                            'ru' => ['sentence' => 'молоко', 'correct' => ['молоко'], 'extra' => ['сахар', 'спасибо']],
                            'es' => ['sentence' => 'Una leche', 'correct' => ['una', 'leche'], 'extra' => ['azúcar', 'gracias']],
                            'de' => ['sentence' => 'Eine Milch', 'correct' => ['eine', 'Milch'], 'extra' => ['Zucker', 'danke']],
                            'ja' => ['sentence' => '牛乳', 'correct' => ['牛乳'], 'extra' => ['砂糖', 'ありがとう']],
                            'ko' => ['sentence' => '우유', 'correct' => ['우유'], 'extra' => ['설탕', '감사합니다']],
                            'tr' => ['sentence' => 'bir süt', 'correct' => ['bir', 'süt'], 'extra' => ['şeker', 'teşekkürler']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'café', 'avec', 'un', 'sucre'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee with a sugar', 'correct' => ['a', 'coffee', 'with', 'a', 'sugar'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'bir qəhvə ilə bir şəkər', 'correct' => ['bir', 'qəhvə', 'ilə', 'bir', 'şəkər'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'قهوة مع سكر', 'correct' => ['قهوة', 'مع', 'سكر'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'кофе с сахар', 'correct' => ['кофе', 'с', 'сахар'], 'extra' => ['молоко']],
                            'es' => ['sentence' => 'Un café con un azúcar', 'correct' => ['un', 'café', 'con', 'un', 'azúcar'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Einen Kaffee mit einem Zucker', 'correct' => ['einen', 'Kaffee', 'mit', 'einem', 'Zucker'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => '砂糖入りのコーヒー', 'correct' => ['砂糖', '入り', 'の', 'コーヒー'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '설탕을 넣은 커피', 'correct' => ['설탕을', '넣은', '커피'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'şekerli bir kahve', 'correct' => ['şekerli', 'bir', 'kahve'], 'extra' => ['süt']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'lait', 'avec', 'un', 'sucre', 'merci'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A milk with a sugar, thank you', 'correct' => ['a', 'milk', 'with', 'a', 'sugar', 'thank you'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'bir süd ilə bir şəkər təşəkkür', 'correct' => ['bir', 'süd', 'ilə', 'bir', 'şəkər', 'təşəkkür'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'حليب مع سكر شكرا', 'correct' => ['حليب', 'مع', 'سكر', 'شكرا'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'молоко с сахар спасибо', 'correct' => ['молоко', 'с', 'сахар', 'спасибо'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'Una leche con un azúcar, gracias', 'correct' => ['una', 'leche', 'con', 'un', 'azúcar', 'gracias'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Eine Milch mit einem Zucker, danke', 'correct' => ['eine', 'Milch', 'mit', 'einem', 'Zucker', 'danke'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '砂糖入りの牛乳、ありがとう', 'correct' => ['砂糖', '入り', 'の', '牛乳', 'ありがとう'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '설탕을 넣은 우유, 감사합니다', 'correct' => ['설탕을', '넣은', '우유', '감사합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'şekerli bir süt teşekkürler', 'correct' => ['şekerli', 'bir', 'süt', 'teşekkürler'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Madam & Sir', 4,
                pictures: [['fr' => 'Éclair', 'img' => 'eclair'], ['fr' => 'Eau', 'img' => 'water']],
                plain: [['fr' => 'Madame'], ['fr' => 'Monsieur']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'éclair'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'An eclair', 'correct' => ['an', 'eclair'], 'extra' => ['water', 'madam']],
                            'az' => ['sentence' => 'bir ekler', 'correct' => ['bir', 'ekler'], 'extra' => ['su', 'xanım']],
                            'ar' => ['sentence' => 'إكلير', 'correct' => ['إكلير'], 'extra' => ['ماء', 'سيدتي']],
                            'ru' => ['sentence' => 'эклер', 'correct' => ['эклер'], 'extra' => ['вода', 'госпожа']],
                            'es' => ['sentence' => 'Un éclair', 'correct' => ['un', 'éclair'], 'extra' => ['agua', 'señora']],
                            'de' => ['sentence' => 'Ein Éclair', 'correct' => ['ein', 'Éclair'], 'extra' => ['Wasser', 'gnädige Frau']],
                            'ja' => ['sentence' => 'エクレア', 'correct' => ['エクレア'], 'extra' => ['水', 'マダム']],
                            'ko' => ['sentence' => '에클레어', 'correct' => ['에클레어'], 'extra' => ['물', '부인']],
                            'tr' => ['sentence' => 'bir ekler', 'correct' => ['bir', 'ekler'], 'extra' => ['su', 'hanımefendi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bonjour', 'madame'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'Hello madam', 'correct' => ['hello', 'madam'], 'extra' => ['sir', 'eclair']],
                            'az' => ['sentence' => 'salam xanım', 'correct' => ['salam', 'xanım'], 'extra' => ['cənab', 'ekler']],
                            'ar' => ['sentence' => 'مرحبا سيدتي', 'correct' => ['مرحبا', 'سيدتي'], 'extra' => ['سيدي', 'إكلير']],
                            'ru' => ['sentence' => 'привет госпожа', 'correct' => ['привет', 'госпожа'], 'extra' => ['господин', 'эклер']],
                            'es' => ['sentence' => 'Hola señora', 'correct' => ['hola', 'señora'], 'extra' => ['señor', 'éclair']],
                            'de' => ['sentence' => 'Hallo gnädige Frau', 'correct' => ['hallo', 'gnädige Frau'], 'extra' => ['mein Herr', 'Éclair']],
                            'ja' => ['sentence' => 'こんにちはマダム', 'correct' => ['こんにちは', 'マダム'], 'extra' => ['ムッシュ', 'エクレア']],
                            'ko' => ['sentence' => '안녕하세요 부인', 'correct' => ['안녕하세요', '부인'], 'extra' => ['선생님', '에클레어']],
                            'tr' => ['sentence' => 'merhaba hanımefendi', 'correct' => ['merhaba', 'hanımefendi'], 'extra' => ['beyefendi', 'ekler']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'éclair', 'et', 'une', 'eau', 'monsieur'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'An eclair and a water, sir', 'correct' => ['an', 'eclair', 'and', 'a', 'water', 'sir'], 'extra' => ['madam']],
                            'az' => ['sentence' => 'bir ekler və bir su cənab', 'correct' => ['bir', 'ekler', 'və', 'bir', 'su', 'cənab'], 'extra' => ['xanım']],
                            'ar' => ['sentence' => 'إكلير و ماء سيدي', 'correct' => ['إكلير', 'و', 'ماء', 'سيدي'], 'extra' => ['سيدتي']],
                            'ru' => ['sentence' => 'эклер и вода господин', 'correct' => ['эклер', 'и', 'вода', 'господин'], 'extra' => ['госпожа']],
                            'es' => ['sentence' => 'Un éclair y un agua, señor', 'correct' => ['un', 'éclair', 'y', 'un', 'agua', 'señor'], 'extra' => ['señora']],
                            'de' => ['sentence' => 'Ein Éclair und ein Wasser, mein Herr', 'correct' => ['ein', 'Éclair', 'und', 'ein', 'Wasser', 'mein Herr'], 'extra' => ['gnädige Frau']],
                            'ja' => ['sentence' => 'エクレアと水、ムッシュ', 'correct' => ['エクレア', 'と', '水', 'ムッシュ'], 'extra' => ['マダム']],
                            'ko' => ['sentence' => '에클레어와 물, 선생님', 'correct' => ['에클레어와', '물', '선생님'], 'extra' => ['부인']],
                            'tr' => ['sentence' => 'bir ekler ve bir su beyefendi', 'correct' => ['bir', 'ekler', 've', 'bir', 'su', 'beyefendi'], 'extra' => ['hanımefendi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Ordering', 5,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Croissant', 'img' => 'croissant']],
                plain: [['fr' => 'Je voudrais'], ['fr' => "L'addition"]],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I would like a coffee', 'correct' => ['I', 'would', 'like', 'a', 'coffee'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'mən idi xoşuma gəlir bir qəhvə', 'correct' => ['mən', 'idi', 'xoşuma gəlir', 'bir', 'qəhvə'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أنا سوف يعجبني قهوة', 'correct' => ['أنا', 'سوف', 'يعجبني', 'قهوة'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'я бы нравится кофе', 'correct' => ['я', 'бы', 'нравится', 'кофе'], 'extra' => ['чай']],
                            'es' => ['sentence' => 'Quisiera un café', 'correct' => ['quisiera', 'un', 'café'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Ich möchte einen Kaffee', 'correct' => ['ich', 'möchte', 'einen', 'Kaffee'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => 'コーヒーをください', 'correct' => ['コーヒー', 'を', 'ください'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '커피를 주세요', 'correct' => ['커피를', '주세요'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'bir kahve istiyorum', 'correct' => ['bir', 'kahve', 'istiyorum'], 'extra' => ['çay']],
                        ],
                    ],
                    'b' => [
                        'words' => ["l'addition", "s'il vous plaît"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The bill, please', 'correct' => ['the', 'bill', 'please'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'hesab zəhmət olmasa', 'correct' => ['hesab', 'zəhmət olmasa'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'الحساب من فضلك', 'correct' => ['الحساب', 'من فضلك'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'счёт пожалуйста', 'correct' => ['счёт', 'пожалуйста'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'La cuenta, por favor', 'correct' => ['la', 'cuenta', 'por favor'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Die Rechnung, bitte', 'correct' => ['die', 'Rechnung', 'bitte'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'お会計をお願いします', 'correct' => ['お会計', 'を', 'お願いします'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '계산서 부탁합니다', 'correct' => ['계산서', '부탁합니다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'hesap lütfen', 'correct' => ['hesap', 'lütfen'], 'extra' => ['kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['je voudrais', 'un', 'croissant', 'et', 'un', 'thé'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I would like a croissant and a tea', 'correct' => ['I', 'would', 'like', 'a', 'croissant', 'and', 'a', 'tea'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'mən idi xoşuma gəlir bir kruassan və bir çay', 'correct' => ['mən', 'idi', 'xoşuma gəlir', 'bir', 'kruassan', 'və', 'bir', 'çay'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'أنا سوف يعجبني كرواسون و شاي', 'correct' => ['أنا', 'سوف', 'يعجبني', 'كرواسون', 'و', 'شاي'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'я бы нравится круассан и чай', 'correct' => ['я', 'бы', 'нравится', 'круассан', 'и', 'чай'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'Quisiera un cruasán y un té', 'correct' => ['quisiera', 'un', 'cruasán', 'y', 'un', 'té'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ich möchte ein Croissant und einen Tee', 'correct' => ['ich', 'möchte', 'ein', 'Croissant', 'und', 'einen', 'Tee'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'クロワッサンとお茶をください', 'correct' => ['クロワッサン', 'と', 'お茶', 'を', 'ください'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '크루아상과 차를 주세요', 'correct' => ['크루아상과', '차를', '주세요'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bir kruvasan ve bir çay istiyorum', 'correct' => ['bir', 'kruvasan', 've', 'bir', 'çay', 'istiyorum'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
