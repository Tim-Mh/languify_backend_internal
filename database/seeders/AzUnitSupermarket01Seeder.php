<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitSupermarket01Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Səbət' => 'basket', 'Supermarket' => 'shop', 'Çörək' => 'bread', 'Pendir' => 'cheese',
        'Süd' => 'milk', 'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water',
    ];

    /**
     * Azerbaijani Supermarket Unit 1.
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
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Finding Your Way', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Supermarket', 1,
                pictures: [['az' => 'Səbət', 'img' => 'basket'], ['az' => 'Supermarket', 'img' => 'shop']],
                plain: [['az' => 'Gedirəm'], ['az' => 'Supermarketə']],
                phrases: [
                    'a' => [
                        'words' => ['gedirəm', 'supermarketə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I am going to the supermarket', 'correct' => ['I am going', 'to the supermarket'], 'extra' => ['basket']],
                            'fr' => ['sentence' => 'Je vais au supermarché', 'correct' => ['je vais', 'au supermarché'], 'extra' => ['panier']],
                            'es' => ['sentence' => 'Voy al supermercado', 'correct' => ['voy', 'al supermercado'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Ich gehe zum Supermarkt', 'correct' => ['ich gehe', 'zum Supermarkt'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => 'スーパーへ行きます', 'correct' => ['スーパーへ', '行きます'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '슈퍼마켓에 가요', 'correct' => ['슈퍼마켓에', '가요'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'markete gidiyorum', 'correct' => ['markete', 'gidiyorum'], 'extra' => ['market', 'sepet']],
                            'ru' => ['sentence' => 'я иду в супермаркет', 'correct' => ['я', 'иду', 'в', 'супермаркет'], 'extra' => ['корзина']],
                            'ar' => ['sentence' => 'أذهب إلى السوبرماركت', 'correct' => ['أذهب', 'إلى', 'السوبرماركت'], 'extra' => ['سلة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bir', 'səbət', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'A basket please', 'correct' => ['a', 'basket', 'please'], 'extra' => ['supermarket']],
                            'fr' => ['sentence' => 'Un panier s’il vous plaît', 'correct' => ['un', 'panier', 's’il vous plaît'], 'extra' => ['supermarché']],
                            'es' => ['sentence' => 'Una cesta por favor', 'correct' => ['una', 'cesta', 'por favor'], 'extra' => ['supermercado']],
                            'de' => ['sentence' => 'Einen Korb bitte', 'correct' => ['einen', 'Korb', 'bitte'], 'extra' => ['Supermarkt']],
                            'ja' => ['sentence' => 'かごを一つお願いします', 'correct' => ['かごを', '一つ', 'お願いします'], 'extra' => ['スーパー']],
                            'ko' => ['sentence' => '바구니 하나 부탁합니다', 'correct' => ['바구니', '하나', '부탁합니다'], 'extra' => ['슈퍼마켓']],
                            'tr' => ['sentence' => 'bir sepet lütfen', 'correct' => ['bir', 'sepet', 'lütfen'], 'extra' => ['market', 'ekmek']],
                            'ru' => ['sentence' => 'корзина пожалуйста', 'correct' => ['корзина', 'пожалуйста'], 'extra' => ['супермаркет']],
                            'ar' => ['sentence' => 'سلة من فضلك', 'correct' => ['سلة', 'من فضلك'], 'extra' => ['سوبرماركت']],
                        ],
                    ],
                    'c' => [
                        'words' => ['supermarket', 'böyük'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The supermarket is big', 'correct' => ['the supermarket', 'is', 'big'], 'extra' => ['small']],
                            'fr' => ['sentence' => 'Le supermarché est grand', 'correct' => ['le supermarché', 'est', 'grand'], 'extra' => ['petit']],
                            'es' => ['sentence' => 'El supermercado es grande', 'correct' => ['el supermercado', 'es', 'grande'], 'extra' => ['pequeño']],
                            'de' => ['sentence' => 'Der Supermarkt ist groß', 'correct' => ['der Supermarkt', 'ist', 'groß'], 'extra' => ['klein']],
                            'ja' => ['sentence' => 'スーパーは大きいです', 'correct' => ['スーパーは', '大きいです'], 'extra' => ['小さい']],
                            'ko' => ['sentence' => '슈퍼마켓은 커요', 'correct' => ['슈퍼마켓은', '커요'], 'extra' => ['작은']],
                            'tr' => ['sentence' => 'market büyük', 'correct' => ['market', 'büyük'], 'extra' => ['sepet', 'ekmek']],
                            'ru' => ['sentence' => 'супермаркет большой', 'correct' => ['супермаркет', 'большой'], 'extra' => ['маленький']],
                            'ar' => ['sentence' => 'السوبرماركت كبير', 'correct' => ['السوبرماركت', 'كبير'], 'extra' => ['صغير']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Where Is the Bread', 2,
                pictures: [['az' => 'Çörək', 'img' => 'bread'], ['az' => 'Pendir', 'img' => 'cheese']],
                plain: [['az' => 'Harada'], ['az' => 'Burada']],
                phrases: [
                    'a' => [
                        'words' => ['harada', 'çörək'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the bread', 'correct' => ['where', 'is', 'the bread'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Où est le pain', 'correct' => ['où', 'est', 'le pain'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Dónde está el pan', 'correct' => ['dónde', 'está', 'el pan'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Wo ist das Brot', 'correct' => ['wo', 'ist', 'das Brot'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'パンはどこですか', 'correct' => ['パンは', 'どこですか'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '빵은 어디에 있어요', 'correct' => ['빵은', '어디에', '있어요'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'ekmek nerede', 'correct' => ['ekmek', 'nerede'], 'extra' => ['reyon', 'peynir']],
                            'ru' => ['sentence' => 'где хлеб', 'correct' => ['где', 'хлеб'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'أين خبز', 'correct' => ['أين', 'خبز'], 'extra' => ['جبن']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çörək', 'burada'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bread is here', 'correct' => ['the bread', 'is', 'here'], 'extra' => ['there']],
                            'fr' => ['sentence' => 'Le pain est ici', 'correct' => ['le pain', 'est', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'El pan está aquí', 'correct' => ['el pan', 'está', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Das Brot ist hier', 'correct' => ['das Brot', 'ist', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => 'パンはここにあります', 'correct' => ['パンは', 'ここに', 'あります'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '빵은 여기에 있어요', 'correct' => ['빵은', '여기에', '있어요'], 'extra' => ['거기에']],
                            'tr' => ['sentence' => 'ekmek burada', 'correct' => ['ekmek', 'burada'], 'extra' => ['nerede', 'reyon']],
                            'ru' => ['sentence' => 'хлеб здесь', 'correct' => ['хлеб', 'здесь'], 'extra' => ['там']],
                            'ar' => ['sentence' => 'خبز هنا', 'correct' => ['خبز', 'هنا'], 'extra' => ['هناك']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pendir', 'orada'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is there', 'correct' => ['the cheese', 'is', 'there'], 'extra' => ['here']],
                            'fr' => ['sentence' => 'Le fromage est là-bas', 'correct' => ['le fromage', 'est', 'là-bas'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'El queso está allí', 'correct' => ['el queso', 'está', 'allí'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Der Käse ist dort', 'correct' => ['der Käse', 'ist', 'dort'], 'extra' => ['hier']],
                            'ja' => ['sentence' => 'チーズはそこにあります', 'correct' => ['チーズは', 'そこに', 'あります'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '치즈는 거기에 있어요', 'correct' => ['치즈는', '거기에', '있어요'], 'extra' => ['여기에']],
                            'tr' => ['sentence' => 'peynir orada', 'correct' => ['peynir', 'orada'], 'extra' => ['nerede', 'reyon']],
                            'ru' => ['sentence' => 'сыр там', 'correct' => ['сыр', 'там'], 'extra' => ['здесь']],
                            'ar' => ['sentence' => 'جبن هناك', 'correct' => ['جبن', 'هناك'], 'extra' => ['هنا']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: In the Aisle', 3,
                pictures: [['az' => 'Süd', 'img' => 'milk'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Şöbədə'], ['az' => 'Suyu']],
                phrases: [
                    'a' => [
                        'words' => ['süd', 'şöbədə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The milk is in the aisle', 'correct' => ['the milk', 'is', 'in the aisle'], 'extra' => ['water']],
                            'fr' => ['sentence' => 'Le lait est au rayon', 'correct' => ['le lait', 'est', 'au rayon'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'La leche está en el pasillo', 'correct' => ['la leche', 'está', 'en el pasillo'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Die Milch ist im Regal', 'correct' => ['die Milch', 'ist', 'im Regal'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳は売り場にあります', 'correct' => ['牛乳は', '売り場に', 'あります'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유는 코너에 있어요', 'correct' => ['우유는', '코너에', '있어요'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'süt reyonda', 'correct' => ['süt', 'reyonda'], 'extra' => ['reyon', 'market']],
                            'ru' => ['sentence' => 'молоко в отделе', 'correct' => ['молоко', 'в', 'отделе'], 'extra' => ['вода']],
                            'ar' => ['sentence' => 'حليب في القسم', 'correct' => ['حليب', 'في القسم'], 'extra' => ['ماء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['suyu', 'supermarketdə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The water is in the supermarket', 'correct' => ['the water', 'is', 'in the supermarket'], 'extra' => ['aisle']],
                            'fr' => ['sentence' => 'L’eau est au supermarché', 'correct' => ['l’eau', 'est', 'au supermarché'], 'extra' => ['rayon']],
                            'es' => ['sentence' => 'El agua está en el supermercado', 'correct' => ['el agua', 'está', 'en el supermercado'], 'extra' => ['pasillo']],
                            'de' => ['sentence' => 'Das Wasser ist im Supermarkt', 'correct' => ['das Wasser', 'ist', 'im Supermarkt'], 'extra' => ['Regal']],
                            'ja' => ['sentence' => '水はスーパーにあります', 'correct' => ['水は', 'スーパーに', 'あります'], 'extra' => ['売り場']],
                            'ko' => ['sentence' => '물은 슈퍼마켓에 있어요', 'correct' => ['물은', '슈퍼마켓에', '있어요'], 'extra' => ['코너']],
                            'tr' => ['sentence' => 'su markette', 'correct' => ['su', 'markette'], 'extra' => ['reyon', 'market']],
                            'ru' => ['sentence' => 'воду в супермаркете', 'correct' => ['воду', 'в', 'супермаркете'], 'extra' => ['отдел']],
                            'ar' => ['sentence' => 'الماء في السوبرماركت', 'correct' => ['الماء', 'في السوبرماركت'], 'extra' => ['قسم']],
                        ],
                    ],
                    'c' => [
                        'words' => ['harada', 'şöbə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the aisle', 'correct' => ['where', 'is', 'the aisle'], 'extra' => ['supermarket']],
                            'fr' => ['sentence' => 'Où est le rayon', 'correct' => ['où', 'est', 'le rayon'], 'extra' => ['supermarché']],
                            'es' => ['sentence' => 'Dónde está el pasillo', 'correct' => ['dónde', 'está', 'el pasillo'], 'extra' => ['supermercado']],
                            'de' => ['sentence' => 'Wo ist das Regal', 'correct' => ['wo', 'ist', 'das Regal'], 'extra' => ['Supermarkt']],
                            'ja' => ['sentence' => '売り場はどこですか', 'correct' => ['売り場は', 'どこですか'], 'extra' => ['スーパー']],
                            'ko' => ['sentence' => '코너는 어디에 있어요', 'correct' => ['코너는', '어디에', '있어요'], 'extra' => ['슈퍼마켓']],
                            'tr' => ['sentence' => 'reyon nerede', 'correct' => ['reyon', 'nerede'], 'extra' => ['market', 'süt']],
                            'ru' => ['sentence' => 'где отдел', 'correct' => ['где', 'отдел'], 'extra' => ['супермаркет']],
                            'ar' => ['sentence' => 'أين قسم', 'correct' => ['أين', 'قسم'], 'extra' => ['سوبرماركت']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: A Shopping List', 4,
                pictures: [['az' => 'Çörək', 'img' => 'bread'], ['az' => 'Süd', 'img' => 'milk']],
                plain: [['az' => 'Var'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['var', 'bir', 'siyahı'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is a list', 'correct' => ['there is', 'a', 'list'], 'extra' => ['basket']],
                            'fr' => ['sentence' => 'Il y a une liste', 'correct' => ['il y a', 'une', 'liste'], 'extra' => ['panier']],
                            'es' => ['sentence' => 'Hay una lista', 'correct' => ['hay', 'una', 'lista'], 'extra' => ['cesta']],
                            'de' => ['sentence' => 'Es gibt eine Liste', 'correct' => ['es gibt', 'eine', 'Liste'], 'extra' => ['Korb']],
                            'ja' => ['sentence' => 'リストがあります', 'correct' => ['リストが', 'あります'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '목록이 있어요', 'correct' => ['목록이', '있어요'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'bir liste var', 'correct' => ['bir', 'liste', 'var'], 'extra' => ['sepet', 'elma']],
                            'ru' => ['sentence' => 'есть список', 'correct' => ['есть', 'список'], 'extra' => ['корзина']],
                            'ar' => ['sentence' => 'يوجد قائمة', 'correct' => ['يوجد', 'قائمة'], 'extra' => ['سلة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['var', 'çörək', 'siyahıda'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is bread on the list', 'correct' => ['there is', 'bread', 'on the list'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'Il y a du pain sur la liste', 'correct' => ['il y a', 'du pain', 'sur la liste'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Hay pan en la lista', 'correct' => ['hay', 'pan', 'en la lista'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Es gibt Brot auf der Liste', 'correct' => ['es gibt', 'Brot', 'auf der Liste'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'リストにパンがあります', 'correct' => ['リストに', 'パンが', 'あります'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '목록에 빵이 있어요', 'correct' => ['목록에', '빵이', '있어요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'listede ekmek var', 'correct' => ['listede', 'ekmek', 'var'], 'extra' => ['liste', 'sepet']],
                            'ru' => ['sentence' => 'есть хлеб в списке', 'correct' => ['есть', 'хлеб', 'в', 'списке'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'يوجد خبز في القائمة', 'correct' => ['يوجد', 'خبز', 'في القائمة'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yoxdur', 'süd', 'siyahıda'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'There is no milk on the list', 'correct' => ['there is no', 'milk', 'on the list'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Il n’y a pas de lait sur la liste', 'correct' => ['il n’y a pas', 'de lait', 'sur la liste'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'No hay leche en la lista', 'correct' => ['no hay', 'leche', 'en la lista'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Es gibt keine Milch auf der Liste', 'correct' => ['es gibt keine', 'Milch', 'auf der Liste'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => 'リストに牛乳がありません', 'correct' => ['リストに', '牛乳が', 'ありません'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '목록에 우유가 없어요', 'correct' => ['목록에', '우유가', '없어요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'listede süt yok', 'correct' => ['listede', 'süt', 'yok'], 'extra' => ['liste', 'sepet']],
                            'ru' => ['sentence' => 'нету молоко в списке', 'correct' => ['нету', 'молоко', 'в', 'списке'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'لا يوجد حليب في القائمة', 'correct' => ['لا يوجد', 'حليب', 'في القائمة'], 'extra' => ['خبز']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Around the Shop', 5,
                pictures: [['az' => 'Pendir', 'img' => 'cheese'], ['az' => 'Səbət', 'img' => 'basket']],
                plain: [['az' => 'Harada'], ['az' => 'Şöbədə']],
                phrases: [
                    'a' => [
                        'words' => ['harada', 'pendir'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the cheese', 'correct' => ['where', 'is', 'the cheese'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'Où est le fromage', 'correct' => ['où', 'est', 'le fromage'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Dónde está el queso', 'correct' => ['dónde', 'está', 'el queso'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Wo ist der Käse', 'correct' => ['wo', 'ist', 'der Käse'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'チーズはどこですか', 'correct' => ['チーズは', 'どこですか'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '치즈는 어디에 있어요', 'correct' => ['치즈는', '어디에', '있어요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'peynir nerede', 'correct' => ['peynir', 'nerede'], 'extra' => ['market', 'elma']],
                            'ru' => ['sentence' => 'где сыр', 'correct' => ['где', 'сыр'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'أين جبن', 'correct' => ['أين', 'جبن'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['pendir', 'şöbədə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is in the aisle', 'correct' => ['the cheese', 'is', 'in the aisle'], 'extra' => ['list']],
                            'fr' => ['sentence' => 'Le fromage est au rayon', 'correct' => ['le fromage', 'est', 'au rayon'], 'extra' => ['liste']],
                            'es' => ['sentence' => 'El queso está en el pasillo', 'correct' => ['el queso', 'está', 'en el pasillo'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Der Käse ist im Regal', 'correct' => ['der Käse', 'ist', 'im Regal'], 'extra' => ['Liste']],
                            'ja' => ['sentence' => 'チーズは売り場にあります', 'correct' => ['チーズは', '売り場に', 'あります'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '치즈는 코너에 있어요', 'correct' => ['치즈는', '코너에', '있어요'], 'extra' => ['목록']],
                            'tr' => ['sentence' => 'peynir reyonda', 'correct' => ['peynir', 'reyonda'], 'extra' => ['market', 'nerede']],
                            'ru' => ['sentence' => 'сыр в отделе', 'correct' => ['сыр', 'в', 'отделе'], 'extra' => ['список']],
                            'ar' => ['sentence' => 'جبن في القسم', 'correct' => ['جبن', 'في القسم'], 'extra' => ['قائمة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['bir', 'səbət', 'və', 'bir', 'siyahı'], 'blank' => 4,
                        'means' => [
                            'en' => ['sentence' => 'A basket and a list', 'correct' => ['a', 'basket', 'and', 'a', 'list'], 'extra' => ['supermarket']],
                            'fr' => ['sentence' => 'Un panier et une liste', 'correct' => ['un', 'panier', 'et', 'une', 'liste'], 'extra' => ['supermarché']],
                            'es' => ['sentence' => 'Una cesta y una lista', 'correct' => ['una', 'cesta', 'y', 'una', 'lista'], 'extra' => ['supermercado']],
                            'de' => ['sentence' => 'Ein Korb und eine Liste', 'correct' => ['ein', 'Korb', 'und', 'eine', 'Liste'], 'extra' => ['Supermarkt']],
                            'ja' => ['sentence' => 'かごとリスト', 'correct' => ['かご', 'と', 'リスト'], 'extra' => ['スーパー']],
                            'ko' => ['sentence' => '바구니와 목록', 'correct' => ['바구니와', '목록'], 'extra' => ['슈퍼마켓']],
                            'tr' => ['sentence' => 'sepet ve liste', 'correct' => ['sepet', 've', 'liste'], 'extra' => ['market', 'nerede']],
                            'ru' => ['sentence' => 'корзина и список', 'correct' => ['корзина', 'и', 'список'], 'extra' => ['супермаркет']],
                            'ar' => ['sentence' => 'سلة و قائمة', 'correct' => ['سلة', 'و', 'قائمة'], 'extra' => ['سوبرماركت']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
