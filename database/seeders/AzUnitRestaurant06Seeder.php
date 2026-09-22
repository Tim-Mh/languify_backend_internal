<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitRestaurant06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Ət' => 'meat', 'Balıq' => 'fish', 'Pendir' => 'cheese', 'Süd' => 'milk',
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water', 'Çörək' => 'bread',
    ];

    /**
     * Azerbaijani Restaurant Unit 6.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Diet and Allergies', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Cannot Eat', 1,
                pictures: [['az' => 'Ət', 'img' => 'meat'], ['az' => 'Balıq', 'img' => 'fish']],
                plain: [['az' => 'Yeyə bilmirəm'], ['az' => 'Məndə var']],
                phrases: [
                    'a' => [
                        'words' => ['yeyə bilmirəm', 'ət'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I cannot eat meat', 'correct' => ['I cannot eat', 'meat'], 'extra' => ['fish']],
                            'fr' => ['sentence' => 'Je ne peux pas manger de viande', 'correct' => ['je ne peux pas manger', 'de viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'No puedo comer carne', 'correct' => ['no puedo comer', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich kann kein Fleisch essen', 'correct' => ['ich kann', 'kein Fleisch', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '肉を食べられません', 'correct' => ['肉を', '食べられません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '고기를 먹을 수 없어요', 'correct' => ['고기를', '먹을 수 없어요'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'et yiyemem', 'correct' => ['et', 'yiyemem'], 'extra' => ['alerji', 'balık']],
                            'ru' => ['sentence' => 'не могу кушать мясо', 'correct' => ['не', 'могу', 'кушать', 'мясо'], 'extra' => ['рыба']],
                            'ar' => ['sentence' => 'لا أستطيع الأكل لحم', 'correct' => ['لا أستطيع الأكل', 'لحم'], 'extra' => ['سمك']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yeyə bilmirəm', 'balıq'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I cannot eat fish', 'correct' => ['I cannot eat', 'fish'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'Je ne peux pas manger de poisson', 'correct' => ['je ne peux pas manger', 'de poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'No puedo comer pescado', 'correct' => ['no puedo comer', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich kann keinen Fisch essen', 'correct' => ['ich kann', 'keinen Fisch', 'essen'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べられません', 'correct' => ['魚を', '食べられません'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹을 수 없어요', 'correct' => ['생선을', '먹을 수 없어요'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'balık yiyemem', 'correct' => ['balık', 'yiyemem'], 'extra' => ['alerji', 'et']],
                            'ru' => ['sentence' => 'не могу кушать рыба', 'correct' => ['не', 'могу', 'кушать', 'рыба'], 'extra' => ['мясо']],
                            'ar' => ['sentence' => 'لا أستطيع الأكل سمك', 'correct' => ['لا أستطيع الأكل', 'سمك'], 'extra' => ['لحم']],
                        ],
                    ],
                    'c' => [
                        'words' => ['məndə var', 'bir', 'allergiya'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I have an allergy', 'correct' => ['I have', 'an', 'allergy'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'J’ai une allergie', 'correct' => ['j’ai', 'une', 'allergie'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Tengo una alergia', 'correct' => ['tengo', 'una', 'alergia'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich habe eine Allergie', 'correct' => ['ich habe', 'eine', 'Allergie'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'アレルギーがあります', 'correct' => ['アレルギーが', 'あります'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '알레르기가 있어요', 'correct' => ['알레르기가', '있어요'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'alerjim var', 'correct' => ['alerjim', 'var'], 'extra' => ['yiyemem', 'alerji']],
                            'ru' => ['sentence' => 'у меня аллергия', 'correct' => ['у', 'меня', 'аллергия'], 'extra' => ['мясо']],
                            'ar' => ['sentence' => 'عندي حساسية', 'correct' => ['عندي', 'حساسية'], 'extra' => ['لحم']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Vegetarian', 2,
                pictures: [['az' => 'Ət', 'img' => 'meat'], ['az' => 'Pendir', 'img' => 'cheese']],
                plain: [['az' => 'Mən'], ['az' => 'Vegetarian']],
                phrases: [
                    'a' => [
                        'words' => ['mən', 'vegetarian'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am vegetarian', 'correct' => ['I am', 'vegetarian'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'Je suis végétarien', 'correct' => ['je suis', 'végétarien'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Soy vegetariano', 'correct' => ['soy', 'vegetariano'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich bin vegetarisch', 'correct' => ['ich bin', 'vegetarisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '私はベジタリアンです', 'correct' => ['私は', 'ベジタリアンです'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '저는 채식주의자예요', 'correct' => ['저는', '채식주의자예요'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'ben vejetaryenim', 'correct' => ['ben', 'vejetaryenim'], 'extra' => ['vejetaryen', 'et']],
                            'ru' => ['sentence' => 'я вегетарианец', 'correct' => ['я', 'вегетарианец'], 'extra' => ['мясо']],
                            'ar' => ['sentence' => 'أنا نباتي', 'correct' => ['أنا', 'نباتي'], 'extra' => ['لحم']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yemirəm', 'ət'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I do not eat meat', 'correct' => ['I do not eat', 'meat'], 'extra' => ['fish']],
                            'fr' => ['sentence' => 'Je ne mange pas de viande', 'correct' => ['je ne mange pas', 'de viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'No como carne', 'correct' => ['no como', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich esse kein Fleisch', 'correct' => ['ich esse', 'kein Fleisch'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '肉を食べません', 'correct' => ['肉を', '食べません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '고기를 먹지 않아요', 'correct' => ['고기를', '먹지 않아요'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'et yemiyorum', 'correct' => ['et', 'yemiyorum'], 'extra' => ['vejetaryen', 'peynir']],
                            'ru' => ['sentence' => 'не ем мясо', 'correct' => ['не', 'ем', 'мясо'], 'extra' => ['рыба']],
                            'ar' => ['sentence' => 'لا آكل لحم', 'correct' => ['لا آكل', 'لحم'], 'extra' => ['سمك']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yeyirəm', 'pendir'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I eat cheese', 'correct' => ['I eat', 'cheese'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'Je mange du fromage', 'correct' => ['je mange', 'du fromage'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Como queso', 'correct' => ['como', 'queso'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich esse Käse', 'correct' => ['ich esse', 'Käse'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'チーズを食べます', 'correct' => ['チーズを', '食べます'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '치즈를 먹어요', 'correct' => ['치즈를', '먹어요'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'peynir yiyorum', 'correct' => ['peynir', 'yiyorum'], 'extra' => ['vejetaryen', 'et']],
                            'ru' => ['sentence' => 'я ем сыр', 'correct' => ['я', 'ем', 'сыр'], 'extra' => ['мясо']],
                            'ar' => ['sentence' => 'آكل جبن', 'correct' => ['آكل', 'جبن'], 'extra' => ['لحم']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Milk & Cheese', 3,
                pictures: [['az' => 'Süd', 'img' => 'milk'], ['az' => 'Pendir', 'img' => 'cheese']],
                plain: [['az' => 'Məndə var'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['məndə var', 'bir', 'süd', 'allergiya'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I have a milk allergy', 'correct' => ['I have', 'a', 'milk', 'allergy'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'J’ai une allergie au lait', 'correct' => ['j’ai', 'une', 'allergie', 'au lait'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Tengo una alergia a la leche', 'correct' => ['tengo', 'una', 'alergia', 'a la leche'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ich habe eine Milchallergie', 'correct' => ['ich habe', 'eine', 'Milchallergie'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳アレルギーがあります', 'correct' => ['牛乳', 'アレルギーが', 'あります'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유 알레르기가 있어요', 'correct' => ['우유', '알레르기가', '있어요'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'süt alerjim var', 'correct' => ['süt', 'alerjim', 'var'], 'extra' => ['peynir', 'peynir']],
                            'ru' => ['sentence' => 'у меня молоко аллергия', 'correct' => ['у', 'меня', 'молоко', 'аллергия'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'عندي حليب حساسية', 'correct' => ['عندي', 'حليب', 'حساسية'], 'extra' => ['جبن']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yeyə bilmirəm', 'pendir'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I cannot eat cheese', 'correct' => ['I cannot eat', 'cheese'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Je ne peux pas manger de fromage', 'correct' => ['je ne peux pas manger', 'de fromage'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'No puedo comer queso', 'correct' => ['no puedo comer', 'queso'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich kann keinen Käse essen', 'correct' => ['ich kann', 'keinen Käse', 'essen'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'チーズを食べられません', 'correct' => ['チーズを', '食べられません'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '치즈를 먹을 수 없어요', 'correct' => ['치즈를', '먹을 수 없어요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'peynir yiyemem', 'correct' => ['peynir', 'yiyemem'], 'extra' => ['süt', 'süt']],
                            'ru' => ['sentence' => 'не могу кушать сыр', 'correct' => ['не', 'могу', 'кушать', 'сыр'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'لا أستطيع الأكل جبن', 'correct' => ['لا أستطيع الأكل', 'جبن'], 'extra' => ['حليب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['südsüz', 'zəhmət olmasa'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Without milk please', 'correct' => ['without milk', 'please'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Sans lait s’il vous plaît', 'correct' => ['sans lait', 's’il vous plaît'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Sin leche por favor', 'correct' => ['sin leche', 'por favor'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ohne Milch bitte', 'correct' => ['ohne Milch', 'bitte'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳なしでお願いします', 'correct' => ['牛乳なしで', 'お願いします'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유 없이 부탁합니다', 'correct' => ['우유 없이', '부탁합니다'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'sütsüz lütfen', 'correct' => ['sütsüz', 'lütfen'], 'extra' => ['süt', 'peynir']],
                            'ru' => ['sentence' => 'без молока пожалуйста', 'correct' => ['без', 'молока', 'пожалуйста'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'بدون حليب من فضلك', 'correct' => ['بدون حليب', 'من فضلك'], 'extra' => ['جبن']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Asking the Waiter', 4,
                pictures: [['az' => 'Ət', 'img' => 'meat'], ['az' => 'Süd', 'img' => 'milk']],
                plain: [['az' => 'Mı'], ['az' => 'Bunda']],
                phrases: [
                    'a' => [
                        'words' => ['mı', 'ət', 'bunda'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Is there meat in this', 'correct' => ['is there', 'meat', 'in this'], 'extra' => ['milk']],
                            'fr' => ['sentence' => 'Y a-t-il de la viande dedans', 'correct' => ['y a-t-il', 'de la viande', 'dedans'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Hay carne en esto', 'correct' => ['hay', 'carne', 'en esto'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Gibt es Fleisch darin', 'correct' => ['gibt es', 'Fleisch', 'darin'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'これに肉がありますか', 'correct' => ['これに', '肉が', 'ありますか'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '이것에 고기가 있어요', 'correct' => ['이것에', '고기가', '있어요'], 'extra' => ['우유']],
                            'tr' => ['sentence' => 'bunda et var mı', 'correct' => ['bunda', 'et', 'var', 'mı'], 'extra' => ['alerji', 'yiyemem']],
                            'ru' => ['sentence' => 'ли мясо в этом', 'correct' => ['ли', 'мясо', 'в', 'этом'], 'extra' => ['молоко']],
                            'ar' => ['sentence' => 'هل لحم في هذا', 'correct' => ['هل', 'لحم', 'في هذا'], 'extra' => ['حليب']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yoxdur', 'süd', 'bunda'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no milk in this', 'correct' => ['there is no', 'milk', 'in this'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'Il n’y a pas de lait dedans', 'correct' => ['il n’y a pas', 'de lait', 'dedans'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'No hay leche en esto', 'correct' => ['no hay', 'leche', 'en esto'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Es gibt keine Milch darin', 'correct' => ['es gibt keine', 'Milch', 'darin'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'これに牛乳がありません', 'correct' => ['これに', '牛乳が', 'ありません'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '이것에 우유가 없어요', 'correct' => ['이것에', '우유가', '없어요'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'bunda süt yok', 'correct' => ['bunda', 'süt', 'yok'], 'extra' => ['alerji', 'yiyemem']],
                            'ru' => ['sentence' => 'нету молоко в этом', 'correct' => ['нету', 'молоко', 'в', 'этом'], 'extra' => ['мясо']],
                            'ar' => ['sentence' => 'لا يوجد حليب في هذا', 'correct' => ['لا يوجد', 'حليب', 'في هذا'], 'extra' => ['لحم']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çox sağ ol'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you very much', 'correct' => ['thank you', 'very much'], 'extra' => ['please']],
                            'fr' => ['sentence' => 'Merci beaucoup', 'correct' => ['merci', 'beaucoup'], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Muchas gracias', 'correct' => ['muchas', 'gracias'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Vielen Dank', 'correct' => ['vielen', 'Dank'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'どうもありがとう', 'correct' => ['どうも', 'ありがとう'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '정말 감사합니다', 'correct' => ['정말', '감사합니다'], 'extra' => ['부탁합니다']],
                            'tr' => ['sentence' => 'teşekkürler', 'correct' => ['teşekkürler'], 'extra' => ['alerji', 'yiyemem']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['пожалуйста']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['من فضلك']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ordering Safely', 5,
                pictures: [['az' => 'Ət', 'img' => 'meat'], ['az' => 'Balıq', 'img' => 'fish']],
                plain: [['az' => 'Mən'], ['az' => 'Vegetarian']],
                phrases: [
                    'a' => [
                        'words' => ['mən', 'vegetarian', 'və', 'yeyə bilmirəm', 'ət'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'I am vegetarian and I cannot eat meat', 'correct' => ['I am', 'vegetarian', 'and', 'I cannot eat', 'meat'], 'extra' => ['fish']],
                            'fr' => ['sentence' => 'Je suis végétarien et je ne peux pas manger de viande', 'correct' => ['je suis', 'végétarien', 'et', 'je ne peux pas manger', 'de viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Soy vegetariano y no puedo comer carne', 'correct' => ['soy', 'vegetariano', 'y', 'no puedo comer', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich bin vegetarisch und ich kann kein Fleisch essen', 'correct' => ['ich bin', 'vegetarisch', 'und', 'ich kann', 'kein Fleisch', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '私はベジタリアンで肉を食べられません', 'correct' => ['私は', 'ベジタリアンで', '肉を', '食べられません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '저는 채식주의자이고 고기를 먹을 수 없어요', 'correct' => ['저는', '채식주의자이고', '고기를', '먹을 수 없어요'], 'extra' => ['생선']],
                            'tr' => ['sentence' => 'ben vejetaryenim ve et yiyemem', 'correct' => ['ben', 'vejetaryenim', 've', 'et', 'yiyemem'], 'extra' => ['vejetaryen', 'alerji']],
                            'ru' => ['sentence' => 'я вегетарианец и не могу кушать мясо', 'correct' => ['я', 'вегетарианец', 'и', 'не', 'могу', 'кушать', 'мясо'], 'extra' => ['рыба']],
                            'ar' => ['sentence' => 'أنا نباتي و لا أستطيع الأكل لحم', 'correct' => ['أنا', 'نباتي', 'و', 'لا أستطيع الأكل', 'لحم'], 'extra' => ['سمك']],
                        ],
                    ],
                    'b' => [
                        'words' => ['yeyirəm', 'balıq'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I eat fish', 'correct' => ['I eat', 'fish'], 'extra' => ['meat']],
                            'fr' => ['sentence' => 'Je mange du poisson', 'correct' => ['je mange', 'du poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Como pescado', 'correct' => ['como', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich esse Fisch', 'correct' => ['ich esse', 'Fisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べます', 'correct' => ['魚を', '食べます'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹어요', 'correct' => ['생선을', '먹어요'], 'extra' => ['고기']],
                            'tr' => ['sentence' => 'balık yiyorum', 'correct' => ['balık', 'yiyorum'], 'extra' => ['vejetaryen', 'alerji']],
                            'ru' => ['sentence' => 'я ем рыба', 'correct' => ['я', 'ем', 'рыба'], 'extra' => ['мясо']],
                            'ar' => ['sentence' => 'آكل سمك', 'correct' => ['آكل', 'سمك'], 'extra' => ['لحم']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'qəhvə', 'südsüz'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A coffee without milk', 'correct' => ['a', 'coffee', 'without milk'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Un café sans lait', 'correct' => ['un', 'café', 'sans lait'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Un café sin leche', 'correct' => ['un', 'café', 'sin leche'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ein Kaffee ohne Milch', 'correct' => ['ein', 'Kaffee', 'ohne Milch'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳なしのコーヒー', 'correct' => ['牛乳なしの', 'コーヒー'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유 없는 커피', 'correct' => ['우유 없는', '커피'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'sütsüz bir kahve', 'correct' => ['sütsüz', 'bir', 'kahve'], 'extra' => ['vejetaryen', 'alerji']],
                            'ru' => ['sentence' => 'кофе без молока', 'correct' => ['кофе', 'без', 'молока'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'قهوة بدون حليب', 'correct' => ['قهوة', 'بدون حليب'], 'extra' => ['جبن']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
