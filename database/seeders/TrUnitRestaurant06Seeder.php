<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitRestaurant06Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Et' => 'meat',
        'Balık' => 'fish',
        'Süt' => 'milk',
        'Peynir' => 'cheese',
        'Ekmek' => 'bread',
    ];

    /**
     * Turkish Restaurant Unit 6 - what you cannot eat.
     *
     * THE RULE THIS UNIT TEACHES: INABILITY IS BUILT INTO THE VERB.
     *
     * English needs a separate word, "cannot". Turkish folds it into the verb with
     * -eme-/-ama-, sitting between the stem and the ending:
     *
     *     ye- + -eme- + -m   ->  yiyemem    I cannot eat
     *
     * There is no tile meaning "cannot" anywhere in this unit, because there is no
     * such word in the Turkish. `yiyemem` is one piece, and the English word bank
     * offers "I cannot eat" as one tile against it.
     *
     * `alerjim var` reuses the possession frame from Conversation 8: "my-allergy
     * exists". Still no verb "to have".
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 6, 'Unit 6: Diet and Allergies', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Cannot Eat', 1,
                pictures: [['tr' => 'Et', 'img' => 'meat'], ['tr' => 'Balık', 'img' => 'fish']],
                plain: [['tr' => 'Yiyemem'], ['tr' => 'Alerji']],
                phrases: [
                    'a' => [
                        'words' => ['et', 'yiyemem'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I cannot eat meat', 'correct' => ['I cannot eat', 'meat'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'yeyə bilmirəm ət', 'correct' => ['yeyə bilmirəm', 'ət'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'لا أستطيع الأكل لحم', 'correct' => ['لا أستطيع الأكل', 'لحم'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'не могу кушать мясо', 'correct' => ['не', 'могу', 'кушать', 'мясо'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Je ne peux pas manger de viande', 'correct' => ['je ne peux pas manger', 'de viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'No puedo comer carne', 'correct' => ['no puedo comer', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich kann kein Fleisch essen', 'correct' => ['ich kann', 'kein Fleisch', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '肉を食べられません', 'correct' => ['肉を', '食べられません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '고기를 먹을 수 없어요', 'correct' => ['고기를', '먹을 수 없어요'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['balık', 'yiyemem'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I cannot eat fish', 'correct' => ['I cannot eat', 'fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'yeyə bilmirəm balıq', 'correct' => ['yeyə bilmirəm', 'balıq'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'لا أستطيع الأكل سمك', 'correct' => ['لا أستطيع الأكل', 'سمك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'не могу кушать рыба', 'correct' => ['не', 'могу', 'кушать', 'рыба'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Je ne peux pas manger de poisson', 'correct' => ['je ne peux pas manger', 'de poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'No puedo comer pescado', 'correct' => ['no puedo comer', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich kann keinen Fisch essen', 'correct' => ['ich kann', 'keinen Fisch', 'essen'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べられません', 'correct' => ['魚を', '食べられません'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹을 수 없어요', 'correct' => ['생선을', '먹을 수 없어요'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['alerjim', 'var'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I have an allergy', 'correct' => ['I have', 'an', 'allergy'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'məndə var bir allergiya', 'correct' => ['məndə var', 'bir', 'allergiya'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'عندي حساسية', 'correct' => ['عندي', 'حساسية'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'у меня аллергия', 'correct' => ['у', 'меня', 'аллергия'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'J’ai une allergie', 'correct' => ['j’ai', 'une', 'allergie'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Tengo una alergia', 'correct' => ['tengo', 'una', 'alergia'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich habe eine Allergie', 'correct' => ['ich habe', 'eine', 'Allergie'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'アレルギーがあります', 'correct' => ['アレルギーが', 'あります'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '알레르기가 있어요', 'correct' => ['알레르기가', '있어요'], 'extra' => ['고기']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Vegetarian', 2,
                pictures: [['tr' => 'Peynir', 'img' => 'cheese'], ['tr' => 'Ekmek', 'img' => 'bread']],
                plain: [['tr' => 'Vejetaryen'], ['tr' => 'Et']],
                phrases: [
                    'a' => [
                        'words' => ['ben', 'vejetaryenim'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am vegetarian', 'correct' => ['I am', 'vegetarian'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'mən vegetarian', 'correct' => ['mən', 'vegetarian'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'أنا نباتي', 'correct' => ['أنا', 'نباتي'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'я вегетарианец', 'correct' => ['я', 'вегетарианец'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Je suis végétarien', 'correct' => ['je suis', 'végétarien'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Soy vegetariano', 'correct' => ['soy', 'vegetariano'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich bin vegetarisch', 'correct' => ['ich bin', 'vegetarisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '私はベジタリアンです', 'correct' => ['私は', 'ベジタリアンです'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '저는 채식주의자예요', 'correct' => ['저는', '채식주의자예요'], 'extra' => ['고기']],
                        ],
                    ],
                    'b' => [
                        'words' => ['et', 'yemiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I do not eat meat', 'correct' => ['I do not eat', 'meat'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'yemirəm ət', 'correct' => ['yemirəm', 'ət'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'لا آكل لحم', 'correct' => ['لا آكل', 'لحم'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'не ем мясо', 'correct' => ['не', 'ем', 'мясо'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Je ne mange pas de viande', 'correct' => ['je ne mange pas', 'de viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'No como carne', 'correct' => ['no como', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich esse kein Fleisch', 'correct' => ['ich esse', 'kein Fleisch'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '肉を食べません', 'correct' => ['肉を', '食べません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '고기를 먹지 않아요', 'correct' => ['고기를', '먹지 않아요'], 'extra' => ['생선']],
                        ],
                    ],
                    'c' => [
                        'words' => ['peynir', 'yiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I eat cheese', 'correct' => ['I eat', 'cheese'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'yeyirəm pendir', 'correct' => ['yeyirəm', 'pendir'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'آكل جبن', 'correct' => ['آكل', 'جبن'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'я ем сыр', 'correct' => ['я', 'ем', 'сыр'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Je mange du fromage', 'correct' => ['je mange', 'du fromage'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Como queso', 'correct' => ['como', 'queso'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich esse Käse', 'correct' => ['ich esse', 'Käse'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'チーズを食べます', 'correct' => ['チーズを', '食べます'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '치즈를 먹어요', 'correct' => ['치즈를', '먹어요'], 'extra' => ['고기']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Milk & Cheese', 3,
                pictures: [['tr' => 'Süt', 'img' => 'milk'], ['tr' => 'Peynir', 'img' => 'cheese']],
                plain: [['tr' => 'Süt'], ['tr' => 'Peynir']],
                phrases: [
                    'a' => [
                        'words' => ['süt', 'alerjim', 'var'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I have a milk allergy', 'correct' => ['I have', 'a', 'milk', 'allergy'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'məndə var bir süd allergiya', 'correct' => ['məndə var', 'bir', 'süd', 'allergiya'], 'extra' => ['pendir']],
                            'ar' => ['sentence' => 'عندي حليب حساسية', 'correct' => ['عندي', 'حليب', 'حساسية'], 'extra' => ['جبن']],
                            'ru' => ['sentence' => 'у меня молоко аллергия', 'correct' => ['у', 'меня', 'молоко', 'аллергия'], 'extra' => ['сыр']],
                            'fr' => ['sentence' => 'J’ai une allergie au lait', 'correct' => ['j’ai', 'une', 'allergie', 'au lait'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Tengo una alergia a la leche', 'correct' => ['tengo', 'una', 'alergia', 'a la leche'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ich habe eine Milchallergie', 'correct' => ['ich habe', 'eine', 'Milchallergie'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳アレルギーがあります', 'correct' => ['牛乳', 'アレルギーが', 'あります'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유 알레르기가 있어요', 'correct' => ['우유', '알레르기가', '있어요'], 'extra' => ['치즈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['peynir', 'yiyemem'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I cannot eat cheese', 'correct' => ['I cannot eat', 'cheese'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'yeyə bilmirəm pendir', 'correct' => ['yeyə bilmirəm', 'pendir'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'لا أستطيع الأكل جبن', 'correct' => ['لا أستطيع الأكل', 'جبن'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'не могу кушать сыр', 'correct' => ['не', 'могу', 'кушать', 'сыр'], 'extra' => ['молоко']],
                            'fr' => ['sentence' => 'Je ne peux pas manger de fromage', 'correct' => ['je ne peux pas manger', 'de fromage'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'No puedo comer queso', 'correct' => ['no puedo comer', 'queso'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Ich kann keinen Käse essen', 'correct' => ['ich kann', 'keinen Käse', 'essen'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'チーズを食べられません', 'correct' => ['チーズを', '食べられません'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '치즈를 먹을 수 없어요', 'correct' => ['치즈를', '먹을 수 없어요'], 'extra' => ['우유']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sütsüz', 'lütfen'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Without milk please', 'correct' => ['without milk', 'please'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'südsüz zəhmət olmasa', 'correct' => ['südsüz', 'zəhmət olmasa'], 'extra' => ['pendir']],
                            'ar' => ['sentence' => 'بدون حليب من فضلك', 'correct' => ['بدون حليب', 'من فضلك'], 'extra' => ['جبن']],
                            'ru' => ['sentence' => 'без молока пожалуйста', 'correct' => ['без', 'молока', 'пожалуйста'], 'extra' => ['сыр']],
                            'fr' => ['sentence' => 'Sans lait s’il vous plaît', 'correct' => ['sans lait', 's’il vous plaît'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Sin leche por favor', 'correct' => ['sin leche', 'por favor'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ohne Milch bitte', 'correct' => ['ohne Milch', 'bitte'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳なしでお願いします', 'correct' => ['牛乳なしで', 'お願いします'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유 없이 부탁합니다', 'correct' => ['우유 없이', '부탁합니다'], 'extra' => ['치즈']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Asking the Waiter', 4,
                pictures: [['tr' => 'Et', 'img' => 'meat'], ['tr' => 'Süt', 'img' => 'milk']],
                plain: [['tr' => 'Alerji'], ['tr' => 'Yiyemem']],
                phrases: [
                    'a' => [
                        'words' => ['bunda', 'et', 'var', 'mı'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'Is there meat in this', 'correct' => ['is there', 'meat', 'in this'], 'extra' => ['milk']],
                            'az' => ['sentence' => 'mı ət bunda', 'correct' => ['mı', 'ət', 'bunda'], 'extra' => ['süd']],
                            'ar' => ['sentence' => 'هل لحم في هذا', 'correct' => ['هل', 'لحم', 'في هذا'], 'extra' => ['حليب']],
                            'ru' => ['sentence' => 'ли мясо в этом', 'correct' => ['ли', 'мясо', 'в', 'этом'], 'extra' => ['молоко']],
                            'fr' => ['sentence' => 'Y a-t-il de la viande dedans', 'correct' => ['y a-t-il', 'de la viande', 'dedans'], 'extra' => ['lait']],
                            'es' => ['sentence' => 'Hay carne en esto', 'correct' => ['hay', 'carne', 'en esto'], 'extra' => ['leche']],
                            'de' => ['sentence' => 'Gibt es Fleisch darin', 'correct' => ['gibt es', 'Fleisch', 'darin'], 'extra' => ['Milch']],
                            'ja' => ['sentence' => 'これに肉がありますか', 'correct' => ['これに', '肉が', 'ありますか'], 'extra' => ['牛乳']],
                            'ko' => ['sentence' => '이것에 고기가 있어요', 'correct' => ['이것에', '고기가', '있어요'], 'extra' => ['우유']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bunda', 'süt', 'yok'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is no milk in this', 'correct' => ['there is no', 'milk', 'in this'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'yoxdur süd bunda', 'correct' => ['yoxdur', 'süd', 'bunda'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'لا يوجد حليب في هذا', 'correct' => ['لا يوجد', 'حليب', 'في هذا'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'нету молоко в этом', 'correct' => ['нету', 'молоко', 'в', 'этом'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Il n’y a pas de lait dedans', 'correct' => ['il n’y a pas', 'de lait', 'dedans'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'No hay leche en esto', 'correct' => ['no hay', 'leche', 'en esto'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Es gibt keine Milch darin', 'correct' => ['es gibt keine', 'Milch', 'darin'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => 'これに牛乳がありません', 'correct' => ['これに', '牛乳が', 'ありません'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '이것에 우유가 없어요', 'correct' => ['이것에', '우유가', '없어요'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['teşekkürler'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you', 'correct' => ['thank you'], 'extra' => ['please']],
                            'az' => ['sentence' => 'təşəkkür', 'correct' => ['təşəkkür'], 'extra' => ['zəhmət olmasa']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['من فضلك']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['пожалуйста']],
                            'fr' => ['sentence' => 'Merci', 'correct' => ['merci'], 'extra' => ['s’il vous plaît']],
                            'es' => ['sentence' => 'Gracias', 'correct' => ['gracias'], 'extra' => ['por favor']],
                            'de' => ['sentence' => 'Danke', 'correct' => ['danke'], 'extra' => ['bitte']],
                            'ja' => ['sentence' => 'ありがとう', 'correct' => ['ありがとう'], 'extra' => ['お願いします']],
                            'ko' => ['sentence' => '고맙습니다', 'correct' => ['고맙습니다'], 'extra' => ['부탁합니다']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Ordering Safely', 5,
                pictures: [['tr' => 'Balık', 'img' => 'fish'], ['tr' => 'Peynir', 'img' => 'cheese']],
                plain: [['tr' => 'Vejetaryen'], ['tr' => 'Alerji']],
                phrases: [
                    'a' => [
                        'words' => ['ben', 'vejetaryenim', 've', 'et', 'yiyemem'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'I am vegetarian and I cannot eat meat', 'correct' => ['I am', 'vegetarian', 'and', 'I cannot eat', 'meat'], 'extra' => ['fish']],
                            'az' => ['sentence' => 'mən vegetarian və yeyə bilmirəm ət', 'correct' => ['mən', 'vegetarian', 'və', 'yeyə bilmirəm', 'ət'], 'extra' => ['balıq']],
                            'ar' => ['sentence' => 'أنا نباتي و لا أستطيع الأكل لحم', 'correct' => ['أنا', 'نباتي', 'و', 'لا أستطيع الأكل', 'لحم'], 'extra' => ['سمك']],
                            'ru' => ['sentence' => 'я вегетарианец и не могу кушать мясо', 'correct' => ['я', 'вегетарианец', 'и', 'не', 'могу', 'кушать', 'мясо'], 'extra' => ['рыба']],
                            'fr' => ['sentence' => 'Je suis végétarien et je ne peux pas manger de viande', 'correct' => ['je suis', 'végétarien', 'et', 'je ne peux pas manger', 'de viande'], 'extra' => ['poisson']],
                            'es' => ['sentence' => 'Soy vegetariano y no puedo comer carne', 'correct' => ['soy', 'vegetariano', 'y', 'no puedo comer', 'carne'], 'extra' => ['pescado']],
                            'de' => ['sentence' => 'Ich bin vegetarisch und ich kann kein Fleisch essen', 'correct' => ['ich bin', 'vegetarisch', 'und', 'ich kann', 'kein Fleisch', 'essen'], 'extra' => ['Fisch']],
                            'ja' => ['sentence' => '私はベジタリアンで肉を食べられません', 'correct' => ['私は', 'ベジタリアンで', '肉を', '食べられません'], 'extra' => ['魚']],
                            'ko' => ['sentence' => '저는 채식주의자이고 고기를 먹을 수 없어요', 'correct' => ['저는', '채식주의자이고', '고기를', '먹을 수 없어요'], 'extra' => ['생선']],
                        ],
                    ],
                    'b' => [
                        'words' => ['balık', 'yiyorum'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I eat fish', 'correct' => ['I eat', 'fish'], 'extra' => ['meat']],
                            'az' => ['sentence' => 'yeyirəm balıq', 'correct' => ['yeyirəm', 'balıq'], 'extra' => ['ət']],
                            'ar' => ['sentence' => 'آكل سمك', 'correct' => ['آكل', 'سمك'], 'extra' => ['لحم']],
                            'ru' => ['sentence' => 'я ем рыба', 'correct' => ['я', 'ем', 'рыба'], 'extra' => ['мясо']],
                            'fr' => ['sentence' => 'Je mange du poisson', 'correct' => ['je mange', 'du poisson'], 'extra' => ['viande']],
                            'es' => ['sentence' => 'Como pescado', 'correct' => ['como', 'pescado'], 'extra' => ['carne']],
                            'de' => ['sentence' => 'Ich esse Fisch', 'correct' => ['ich esse', 'Fisch'], 'extra' => ['Fleisch']],
                            'ja' => ['sentence' => '魚を食べます', 'correct' => ['魚を', '食べます'], 'extra' => ['肉']],
                            'ko' => ['sentence' => '생선을 먹어요', 'correct' => ['생선을', '먹어요'], 'extra' => ['고기']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sütsüz', 'bir', 'kahve'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A coffee without milk', 'correct' => ['a', 'coffee', 'without milk'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'bir qəhvə südsüz', 'correct' => ['bir', 'qəhvə', 'südsüz'], 'extra' => ['pendir']],
                            'ar' => ['sentence' => 'قهوة بدون حليب', 'correct' => ['قهوة', 'بدون حليب'], 'extra' => ['جبن']],
                            'ru' => ['sentence' => 'кофе без молока', 'correct' => ['кофе', 'без', 'молока'], 'extra' => ['сыр']],
                            'fr' => ['sentence' => 'Un café sans lait', 'correct' => ['un', 'café', 'sans lait'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Un café sin leche', 'correct' => ['un', 'café', 'sin leche'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Ein Kaffee ohne Milch', 'correct' => ['ein', 'Kaffee', 'ohne Milch'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => '牛乳なしのコーヒー', 'correct' => ['牛乳なしの', 'コーヒー'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '우유 없는 커피', 'correct' => ['우유 없는', '커피'], 'extra' => ['치즈']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
