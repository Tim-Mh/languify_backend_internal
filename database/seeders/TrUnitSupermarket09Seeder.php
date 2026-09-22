<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\TurkishLessonBuilder;
use Illuminate\Database\Seeder;

class TrUnitSupermarket09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Süt' => 'milk',
        'Ekmek' => 'bread',
        'Peynir' => 'cheese',
        'Elma' => 'apple',
        'Su' => 'water',
    ];

    /**
     * Turkish Supermarket Unit 9 - finding what you came for.
     *
     * THE RULE THIS UNIT TEACHES: `nerede` AND `-da/-de` ARE THE SAME SUFFIX.
     *
     * The question and its answer share a shape that English hides. `nerede` is
     * literally `ne` (what) plus the locative -re-de, and the reply carries the same
     * -da/-de on the place:
     *
     *     Süt nerede?      Milk where?
     *     Süt reyonda.     Milk in-the-aisle.
     *
     * Once seen, every location question in the chapter reads as one pattern rather
     * than a list of phrases, which is why this unit comes ninth rather than first.
     */

    public function run(): void
    {
        $language = Language::where('code', 'tr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new TurkishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Asking Where Things Are', $this->lessonsData($builder));
    }

    private function lessonsData(TurkishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Where Is It', 1,
                pictures: [['tr' => 'Süt', 'img' => 'milk'], ['tr' => 'Ekmek', 'img' => 'bread']],
                plain: [['tr' => 'Nerede'], ['tr' => 'Reyon']],
                phrases: [
                    'a' => [
                        'words' => ['süt', 'nerede'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the milk', 'correct' => ['where', 'is', 'the milk'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'harada süd', 'correct' => ['harada', 'süd'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'أين حليب', 'correct' => ['أين', 'حليب'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'где молоко', 'correct' => ['где', 'молоко'], 'extra' => ['хлеб']],
                            'fr' => ['sentence' => 'Où est le lait', 'correct' => ['où', 'est', 'le lait'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Dónde está la leche', 'correct' => ['dónde', 'está', 'la leche'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Wo ist die Milch', 'correct' => ['wo', 'ist', 'die Milch'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳はどこですか', 'correct' => ['牛乳は', 'どこですか'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유는 어디에 있어요', 'correct' => ['우유는', '어디에', '있어요'], 'extra' => ['빵']],
                        ],
                    ],
                    'b' => [
                        'words' => ['süt', 'reyonda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The milk is in the aisle', 'correct' => ['the milk', 'is', 'in the aisle'], 'extra' => ['bread']],
                            'az' => ['sentence' => 'süd şöbədə', 'correct' => ['süd', 'şöbədə'], 'extra' => ['çörək']],
                            'ar' => ['sentence' => 'حليب في القسم', 'correct' => ['حليب', 'في القسم'], 'extra' => ['خبز']],
                            'ru' => ['sentence' => 'молоко в отделе', 'correct' => ['молоко', 'в', 'отделе'], 'extra' => ['хлеб']],
                            'fr' => ['sentence' => 'Le lait est au rayon', 'correct' => ['le lait', 'est', 'au rayon'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'La leche está en el pasillo', 'correct' => ['la leche', 'está', 'en el pasillo'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Die Milch ist im Regal', 'correct' => ['die Milch', 'ist', 'im Regal'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳は売り場にあります', 'correct' => ['牛乳は', '売り場に', 'あります'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유는 코너에 있어요', 'correct' => ['우유는', '코너에', '있어요'], 'extra' => ['빵']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ekmek', 'orada'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The bread is there', 'correct' => ['the bread', 'is', 'there'], 'extra' => ['here']],
                            'az' => ['sentence' => 'çörək orada', 'correct' => ['çörək', 'orada'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'خبز هناك', 'correct' => ['خبز', 'هناك'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'хлеб там', 'correct' => ['хлеб', 'там'], 'extra' => ['здесь']],
                            'fr' => ['sentence' => 'Le pain est là-bas', 'correct' => ['le pain', 'est', 'là-bas'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'El pan está allí', 'correct' => ['el pan', 'está', 'allí'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Das Brot ist dort', 'correct' => ['das Brot', 'ist', 'dort'], 'extra' => ['hier']],
                            'ja' => ['sentence' => 'パンはそこにあります', 'correct' => ['パンは', 'そこに', 'あります'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '빵은 거기에 있어요', 'correct' => ['빵은', '거기에', '있어요'], 'extra' => ['여기에']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: On the Left', 2,
                pictures: [['tr' => 'Peynir', 'img' => 'cheese'], ['tr' => 'Elma', 'img' => 'apple']],
                plain: [['tr' => 'Sağda'], ['tr' => 'Solda']],
                phrases: [
                    'a' => [
                        'words' => ['peynir', 'sağda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is on the right', 'correct' => ['the cheese', 'is', 'on the right'], 'extra' => ['on the left']],
                            'az' => ['sentence' => 'pendir sağda', 'correct' => ['pendir', 'sağda'], 'extra' => ['solda']],
                            'ar' => ['sentence' => 'جبن على اليمين', 'correct' => ['جبن', 'على اليمين'], 'extra' => ['على اليسار']],
                            'ru' => ['sentence' => 'сыр справа', 'correct' => ['сыр', 'справа'], 'extra' => ['слева']],
                            'fr' => ['sentence' => 'Le fromage est à droite', 'correct' => ['le fromage', 'est', 'à droite'], 'extra' => ['à gauche']],
                            'es' => ['sentence' => 'El queso está a la derecha', 'correct' => ['el queso', 'está', 'a la derecha'], 'extra' => ['a la izquierda']],
                            'de' => ['sentence' => 'Der Käse ist rechts', 'correct' => ['der Käse', 'ist', 'rechts'], 'extra' => ['links']],
                            'ja' => ['sentence' => 'チーズは右にあります', 'correct' => ['チーズは', '右に', 'あります'], 'extra' => ['左に']],
                            'ko' => ['sentence' => '치즈는 오른쪽에 있어요', 'correct' => ['치즈는', '오른쪽에', '있어요'], 'extra' => ['왼쪽에']],
                        ],
                    ],
                    'b' => [
                        'words' => ['elma', 'solda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The apple is on the left', 'correct' => ['the apple', 'is', 'on the left'], 'extra' => ['on the right']],
                            'az' => ['sentence' => 'alma solda', 'correct' => ['alma', 'solda'], 'extra' => ['sağda']],
                            'ar' => ['sentence' => 'تفاحة على اليسار', 'correct' => ['تفاحة', 'على اليسار'], 'extra' => ['على اليمين']],
                            'ru' => ['sentence' => 'яблоко слева', 'correct' => ['яблоко', 'слева'], 'extra' => ['справа']],
                            'fr' => ['sentence' => 'La pomme est à gauche', 'correct' => ['la pomme', 'est', 'à gauche'], 'extra' => ['à droite']],
                            'es' => ['sentence' => 'La manzana está a la izquierda', 'correct' => ['la manzana', 'está', 'a la izquierda'], 'extra' => ['a la derecha']],
                            'de' => ['sentence' => 'Der Apfel ist links', 'correct' => ['der Apfel', 'ist', 'links'], 'extra' => ['rechts']],
                            'ja' => ['sentence' => 'りんごは左にあります', 'correct' => ['りんごは', '左に', 'あります'], 'extra' => ['右に']],
                            'ko' => ['sentence' => '사과는 왼쪽에 있어요', 'correct' => ['사과는', '왼쪽에', '있어요'], 'extra' => ['오른쪽에']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sağda', 've', 'solda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'On the right and on the left', 'correct' => ['on the right', 'and', 'on the left'], 'extra' => ['here']],
                            'az' => ['sentence' => 'sağda və solda', 'correct' => ['sağda', 'və', 'solda'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'على اليمين و على اليسار', 'correct' => ['على اليمين', 'و', 'على اليسار'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'справа и слева', 'correct' => ['справа', 'и', 'слева'], 'extra' => ['здесь']],
                            'fr' => ['sentence' => 'À droite et à gauche', 'correct' => ['à droite', 'et', 'à gauche'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'A la derecha y a la izquierda', 'correct' => ['a la derecha', 'y', 'a la izquierda'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Rechts und links', 'correct' => ['rechts', 'und', 'links'], 'extra' => ['hier']],
                            'ja' => ['sentence' => '右に左に', 'correct' => ['右に', '左に'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '오른쪽에 왼쪽에', 'correct' => ['오른쪽에', '왼쪽에'], 'extra' => ['여기에']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Not Here', 3,
                pictures: [['tr' => 'Su', 'img' => 'water'], ['tr' => 'Süt', 'img' => 'milk']],
                plain: [['tr' => 'Burada'], ['tr' => 'Orada']],
                phrases: [
                    'a' => [
                        'words' => ['su', 'burada', 'değil'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The water is not here', 'correct' => ['the water', 'is not', 'here'], 'extra' => ['there']],
                            'az' => ['sentence' => 'suyu deyil burada', 'correct' => ['suyu', 'deyil', 'burada'], 'extra' => ['orada']],
                            'ar' => ['sentence' => 'الماء ليس هنا', 'correct' => ['الماء', 'ليس', 'هنا'], 'extra' => ['هناك']],
                            'ru' => ['sentence' => 'воду не здесь', 'correct' => ['воду', 'не', 'здесь'], 'extra' => ['там']],
                            'fr' => ['sentence' => 'L’eau n’est pas ici', 'correct' => ['l’eau', 'n’est pas', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'El agua no está aquí', 'correct' => ['el agua', 'no está', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Das Wasser ist nicht hier', 'correct' => ['das Wasser', 'ist nicht', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => '水はここにありません', 'correct' => ['水は', 'ここに', 'ありません'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '물은 여기에 없어요', 'correct' => ['물은', '여기에', '없어요'], 'extra' => ['거기에']],
                        ],
                    ],
                    'b' => [
                        'words' => ['su', 'orada'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The water is there', 'correct' => ['the water', 'is', 'there'], 'extra' => ['here']],
                            'az' => ['sentence' => 'suyu orada', 'correct' => ['suyu', 'orada'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'الماء هناك', 'correct' => ['الماء', 'هناك'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'воду там', 'correct' => ['воду', 'там'], 'extra' => ['здесь']],
                            'fr' => ['sentence' => 'L’eau est là-bas', 'correct' => ['l’eau', 'est', 'là-bas'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'El agua está allí', 'correct' => ['el agua', 'está', 'allí'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Das Wasser ist dort', 'correct' => ['das Wasser', 'ist', 'dort'], 'extra' => ['hier']],
                            'ja' => ['sentence' => '水はそこにあります', 'correct' => ['水は', 'そこに', 'あります'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '물은 거기에 있어요', 'correct' => ['물은', '거기에', '있어요'], 'extra' => ['여기에']],
                        ],
                    ],
                    'c' => [
                        'words' => ['süt', 'yok'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'There is no milk', 'correct' => ['there is no', 'milk'], 'extra' => ['water']],
                            'az' => ['sentence' => 'yoxdur süd', 'correct' => ['yoxdur', 'süd'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'لا يوجد حليب', 'correct' => ['لا يوجد', 'حليب'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'нету молоко', 'correct' => ['нету', 'молоко'], 'extra' => ['вода']],
                            'fr' => ['sentence' => 'Il n’y a pas de lait', 'correct' => ['il n’y a pas', 'de lait'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'No hay leche', 'correct' => ['no hay', 'leche'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Es gibt keine Milch', 'correct' => ['es gibt keine', 'Milch'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳がありません', 'correct' => ['牛乳が', 'ありません'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유가 없어요', 'correct' => ['우유가', '없어요'], 'extra' => ['물']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Asking Someone', 4,
                pictures: [['tr' => 'Ekmek', 'img' => 'bread'], ['tr' => 'Peynir', 'img' => 'cheese']],
                plain: [['tr' => 'Affedersiniz'], ['tr' => 'Nerede']],
                phrases: [
                    'a' => [
                        'words' => ['affedersiniz', 'ekmek', 'nerede'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me where is the bread', 'correct' => ['excuse me', 'where', 'is', 'the bread'], 'extra' => ['cheese']],
                            'az' => ['sentence' => 'bağışlayın harada çörək', 'correct' => ['bağışlayın', 'harada', 'çörək'], 'extra' => ['pendir']],
                            'ar' => ['sentence' => 'عفوا أين خبز', 'correct' => ['عفوا', 'أين', 'خبز'], 'extra' => ['جبن']],
                            'ru' => ['sentence' => 'извините где хлеб', 'correct' => ['извините', 'где', 'хлеб'], 'extra' => ['сыр']],
                            'fr' => ['sentence' => 'Excusez-moi où est le pain', 'correct' => ['excusez-moi', 'où', 'est', 'le pain'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Perdón dónde está el pan', 'correct' => ['perdón', 'dónde', 'está', 'el pan'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Entschuldigung wo ist das Brot', 'correct' => ['Entschuldigung', 'wo', 'ist', 'das Brot'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'すみませんパンはどこですか', 'correct' => ['すみません', 'パンは', 'どこですか'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '실례합니다 빵은 어디에 있어요', 'correct' => ['실례합니다', '빵은', '어디에', '있어요'], 'extra' => ['치즈']],
                        ],
                    ],
                    'b' => [
                        'words' => ['teşekkürler'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you', 'correct' => ['thank you'], 'extra' => ['excuse me']],
                            'az' => ['sentence' => 'təşəkkür', 'correct' => ['təşəkkür'], 'extra' => ['bağışlayın']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['عفوا']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['извините']],
                            'fr' => ['sentence' => 'Merci', 'correct' => ['merci'], 'extra' => ['excusez-moi']],
                            'es' => ['sentence' => 'Gracias', 'correct' => ['gracias'], 'extra' => ['perdón']],
                            'de' => ['sentence' => 'Danke', 'correct' => ['danke'], 'extra' => ['Entschuldigung']],
                            'ja' => ['sentence' => 'ありがとう', 'correct' => ['ありがとう'], 'extra' => ['すみません']],
                            'ko' => ['sentence' => '고맙습니다', 'correct' => ['고맙습니다'], 'extra' => ['실례합니다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['peynir', 'markette'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is in the supermarket', 'correct' => ['the cheese', 'is', 'in the supermarket'], 'extra' => ['aisle']],
                            'az' => ['sentence' => 'pendir supermarketdə', 'correct' => ['pendir', 'supermarketdə'], 'extra' => ['şöbə']],
                            'ar' => ['sentence' => 'جبن في السوبرماركت', 'correct' => ['جبن', 'في السوبرماركت'], 'extra' => ['قسم']],
                            'ru' => ['sentence' => 'сыр в супермаркете', 'correct' => ['сыр', 'в', 'супермаркете'], 'extra' => ['отдел']],
                            'fr' => ['sentence' => 'Le fromage est au supermarché', 'correct' => ['le fromage', 'est', 'au supermarché'], 'extra' => ['rayon']],
                            'es' => ['sentence' => 'El queso está en el supermercado', 'correct' => ['el queso', 'está', 'en el supermercado'], 'extra' => ['pasillo']],
                            'de' => ['sentence' => 'Der Käse ist im Supermarkt', 'correct' => ['der Käse', 'ist', 'im Supermarkt'], 'extra' => ['Regal']],
                            'ja' => ['sentence' => 'チーズはスーパーにあります', 'correct' => ['チーズは', 'スーパーに', 'あります'], 'extra' => ['売り場']],
                            'ko' => ['sentence' => '치즈는 슈퍼마켓에 있어요', 'correct' => ['치즈는', '슈퍼마켓에', '있어요'], 'extra' => ['코너']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Finding Everything', 5,
                pictures: [['tr' => 'Elma', 'img' => 'apple'], ['tr' => 'Su', 'img' => 'water']],
                plain: [['tr' => 'Reyon'], ['tr' => 'Nerede']],
                phrases: [
                    'a' => [
                        'words' => ['elma', 'nerede'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the apple', 'correct' => ['where', 'is', 'the apple'], 'extra' => ['water']],
                            'az' => ['sentence' => 'harada alma', 'correct' => ['harada', 'alma'], 'extra' => ['su']],
                            'ar' => ['sentence' => 'أين تفاحة', 'correct' => ['أين', 'تفاحة'], 'extra' => ['ماء']],
                            'ru' => ['sentence' => 'где яблоко', 'correct' => ['где', 'яблоко'], 'extra' => ['вода']],
                            'fr' => ['sentence' => 'Où est la pomme', 'correct' => ['où', 'est', 'la pomme'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Dónde está la manzana', 'correct' => ['dónde', 'está', 'la manzana'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Wo ist der Apfel', 'correct' => ['wo', 'ist', 'der Apfel'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => 'りんごはどこですか', 'correct' => ['りんごは', 'どこですか'], 'extra' => ['水']],
                            'ko' => ['sentence' => '사과는 어디에 있어요', 'correct' => ['사과는', '어디에', '있어요'], 'extra' => ['물']],
                        ],
                    ],
                    'b' => [
                        'words' => ['elma', 'sağda', 've', 'su', 'solda'], 'blank' => 3,
                        'means' => [
                            'en' => ['sentence' => 'The apple is on the right and the water is on the left', 'correct' => ['the apple', 'is', 'on the right', 'and', 'the water', 'is', 'on the left'], 'extra' => ['here']],
                            'az' => ['sentence' => 'alma sağda və suyu solda', 'correct' => ['alma', 'sağda', 'və', 'suyu', 'solda'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'تفاحة على اليمين و الماء على اليسار', 'correct' => ['تفاحة', 'على اليمين', 'و', 'الماء', 'على اليسار'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'яблоко справа и воду слева', 'correct' => ['яблоко', 'справа', 'и', 'воду', 'слева'], 'extra' => ['здесь']],
                            'fr' => ['sentence' => 'La pomme est à droite et l’eau est à gauche', 'correct' => ['la pomme', 'est', 'à droite', 'et', 'l’eau', 'est', 'à gauche'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'La manzana está a la derecha y el agua está a la izquierda', 'correct' => ['la manzana', 'está', 'a la derecha', 'y', 'el agua', 'está', 'a la izquierda'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Der Apfel ist rechts und das Wasser ist links', 'correct' => ['der Apfel', 'ist', 'rechts', 'und', 'das Wasser', 'ist', 'links'], 'extra' => ['hier']],
                            'ja' => ['sentence' => 'りんごは右に水は左にあります', 'correct' => ['りんごは', '右に', '水は', '左に', 'あります'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '사과는 오른쪽에 물은 왼쪽에 있어요', 'correct' => ['사과는', '오른쪽에', '물은', '왼쪽에', '있어요'], 'extra' => ['여기에']],
                        ],
                    ],
                    'c' => [
                        'words' => ['her', 'şey', 'burada'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Everything is here', 'correct' => ['everything', 'is', 'here'], 'extra' => ['there']],
                            'az' => ['sentence' => 'hər şey burada', 'correct' => ['hər şey', 'burada'], 'extra' => ['orada']],
                            'ar' => ['sentence' => 'كل شيء هنا', 'correct' => ['كل شيء', 'هنا'], 'extra' => ['هناك']],
                            'ru' => ['sentence' => 'всё здесь', 'correct' => ['всё', 'здесь'], 'extra' => ['там']],
                            'fr' => ['sentence' => 'Tout est ici', 'correct' => ['tout', 'est', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'Todo está aquí', 'correct' => ['todo', 'está', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Alles ist hier', 'correct' => ['alles', 'ist', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => 'すべてここにあります', 'correct' => ['すべて', 'ここに', 'あります'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '모든 것이 여기에 있어요', 'correct' => ['모든 것이', '여기에', '있어요'], 'extra' => ['거기에']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
