<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitSupermarket09Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Süd' => 'milk', 'Çörək' => 'bread', 'Pendir' => 'cheese', 'Alma' => 'apple',
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Su' => 'water', 'Tort' => 'cake',
    ];

    /**
     * Azerbaijani Supermarket Unit 9.
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

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Asking Where Things Are', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Where Is It', 1,
                pictures: [['az' => 'Süd', 'img' => 'milk'], ['az' => 'Çörək', 'img' => 'bread']],
                plain: [['az' => 'Harada'], ['az' => 'Şöbədə']],
                phrases: [
                    'a' => [
                        'words' => ['harada', 'süd'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the milk', 'correct' => ['where', 'is', 'the milk'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Où est le lait', 'correct' => ['où', 'est', 'le lait'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'Dónde está la leche', 'correct' => ['dónde', 'está', 'la leche'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Wo ist die Milch', 'correct' => ['wo', 'ist', 'die Milch'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳はどこですか', 'correct' => ['牛乳は', 'どこですか'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유는 어디에 있어요', 'correct' => ['우유는', '어디에', '있어요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'süt nerede', 'correct' => ['süt', 'nerede'], 'extra' => ['reyon', 'ekmek']],
                            'ru' => ['sentence' => 'где молоко', 'correct' => ['где', 'молоко'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'أين حليب', 'correct' => ['أين', 'حليب'], 'extra' => ['خبز']],
                        ],
                    ],
                    'b' => [
                        'words' => ['süd', 'şöbədə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The milk is in the aisle', 'correct' => ['the milk', 'is', 'in the aisle'], 'extra' => ['bread']],
                            'fr' => ['sentence' => 'Le lait est au rayon', 'correct' => ['le lait', 'est', 'au rayon'], 'extra' => ['pain']],
                            'es' => ['sentence' => 'La leche está en el pasillo', 'correct' => ['la leche', 'está', 'en el pasillo'], 'extra' => ['pan']],
                            'de' => ['sentence' => 'Die Milch ist im Regal', 'correct' => ['die Milch', 'ist', 'im Regal'], 'extra' => ['Brot']],
                            'ja' => ['sentence' => '牛乳は売り場にあります', 'correct' => ['牛乳は', '売り場に', 'あります'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '우유는 코너에 있어요', 'correct' => ['우유는', '코너에', '있어요'], 'extra' => ['빵']],
                            'tr' => ['sentence' => 'süt reyonda', 'correct' => ['süt', 'reyonda'], 'extra' => ['nerede', 'reyon']],
                            'ru' => ['sentence' => 'молоко в отделе', 'correct' => ['молоко', 'в', 'отделе'], 'extra' => ['хлеб']],
                            'ar' => ['sentence' => 'حليب في القسم', 'correct' => ['حليب', 'في القسم'], 'extra' => ['خبز']],
                        ],
                    ],
                    'c' => [
                        'words' => ['çörək', 'orada'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The bread is there', 'correct' => ['the bread', 'is', 'there'], 'extra' => ['here']],
                            'fr' => ['sentence' => 'Le pain est là-bas', 'correct' => ['le pain', 'est', 'là-bas'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'El pan está allí', 'correct' => ['el pan', 'está', 'allí'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Das Brot ist dort', 'correct' => ['das Brot', 'ist', 'dort'], 'extra' => ['hier']],
                            'ja' => ['sentence' => 'パンはそこにあります', 'correct' => ['パンは', 'そこに', 'あります'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '빵은 거기에 있어요', 'correct' => ['빵은', '거기에', '있어요'], 'extra' => ['여기에']],
                            'tr' => ['sentence' => 'ekmek orada', 'correct' => ['ekmek', 'orada'], 'extra' => ['nerede', 'reyon']],
                            'ru' => ['sentence' => 'хлеб там', 'correct' => ['хлеб', 'там'], 'extra' => ['здесь']],
                            'ar' => ['sentence' => 'خبز هناك', 'correct' => ['خبز', 'هناك'], 'extra' => ['هنا']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: On the Left', 2,
                pictures: [['az' => 'Pendir', 'img' => 'cheese'], ['az' => 'Alma', 'img' => 'apple']],
                plain: [['az' => 'Sağda'], ['az' => 'Solda']],
                phrases: [
                    'a' => [
                        'words' => ['pendir', 'sağda'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is on the right', 'correct' => ['the cheese', 'is', 'on the right'], 'extra' => ['on the left']],
                            'fr' => ['sentence' => 'Le fromage est à droite', 'correct' => ['le fromage', 'est', 'à droite'], 'extra' => ['à gauche']],
                            'es' => ['sentence' => 'El queso está a la derecha', 'correct' => ['el queso', 'está', 'a la derecha'], 'extra' => ['a la izquierda']],
                            'de' => ['sentence' => 'Der Käse ist rechts', 'correct' => ['der Käse', 'ist', 'rechts'], 'extra' => ['links']],
                            'ja' => ['sentence' => 'チーズは右にあります', 'correct' => ['チーズは', '右に', 'あります'], 'extra' => ['左に']],
                            'ko' => ['sentence' => '치즈는 오른쪽에 있어요', 'correct' => ['치즈는', '오른쪽에', '있어요'], 'extra' => ['왼쪽에']],
                            'tr' => ['sentence' => 'peynir sağda', 'correct' => ['peynir', 'sağda'], 'extra' => ['solda', 'elma']],
                            'ru' => ['sentence' => 'сыр справа', 'correct' => ['сыр', 'справа'], 'extra' => ['слева']],
                            'ar' => ['sentence' => 'جبن على اليمين', 'correct' => ['جبن', 'على اليمين'], 'extra' => ['على اليسار']],
                        ],
                    ],
                    'b' => [
                        'words' => ['alma', 'solda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The apple is on the left', 'correct' => ['the apple', 'is', 'on the left'], 'extra' => ['on the right']],
                            'fr' => ['sentence' => 'La pomme est à gauche', 'correct' => ['la pomme', 'est', 'à gauche'], 'extra' => ['à droite']],
                            'es' => ['sentence' => 'La manzana está a la izquierda', 'correct' => ['la manzana', 'está', 'a la izquierda'], 'extra' => ['a la derecha']],
                            'de' => ['sentence' => 'Der Apfel ist links', 'correct' => ['der Apfel', 'ist', 'links'], 'extra' => ['rechts']],
                            'ja' => ['sentence' => 'りんごは左にあります', 'correct' => ['りんごは', '左に', 'あります'], 'extra' => ['右に']],
                            'ko' => ['sentence' => '사과는 왼쪽에 있어요', 'correct' => ['사과는', '왼쪽에', '있어요'], 'extra' => ['오른쪽에']],
                            'tr' => ['sentence' => 'elma solda', 'correct' => ['elma', 'solda'], 'extra' => ['sağda', 'peynir']],
                            'ru' => ['sentence' => 'яблоко слева', 'correct' => ['яблоко', 'слева'], 'extra' => ['справа']],
                            'ar' => ['sentence' => 'تفاحة على اليسار', 'correct' => ['تفاحة', 'على اليسار'], 'extra' => ['على اليمين']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sağda', 'və', 'solda'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'On the right and on the left', 'correct' => ['on the right', 'and', 'on the left'], 'extra' => ['here']],
                            'fr' => ['sentence' => 'À droite et à gauche', 'correct' => ['à droite', 'et', 'à gauche'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'A la derecha y a la izquierda', 'correct' => ['a la derecha', 'y', 'a la izquierda'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Rechts und links', 'correct' => ['rechts', 'und', 'links'], 'extra' => ['hier']],
                            'ja' => ['sentence' => '右に左に', 'correct' => ['右に', '左に'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '오른쪽에 왼쪽에', 'correct' => ['오른쪽에', '왼쪽에'], 'extra' => ['여기에']],
                            'tr' => ['sentence' => 'sağda ve solda', 'correct' => ['sağda', 've', 'solda'], 'extra' => ['peynir', 'elma']],
                            'ru' => ['sentence' => 'справа и слева', 'correct' => ['справа', 'и', 'слева'], 'extra' => ['здесь']],
                            'ar' => ['sentence' => 'على اليمين و على اليسار', 'correct' => ['على اليمين', 'و', 'على اليسار'], 'extra' => ['هنا']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Not Here', 3,
                pictures: [['az' => 'Süd', 'img' => 'milk'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Suyu'], ['az' => 'Deyil']],
                phrases: [
                    'a' => [
                        'words' => ['suyu', 'deyil', 'burada'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The water is not here', 'correct' => ['the water', 'is not', 'here'], 'extra' => ['there']],
                            'fr' => ['sentence' => 'L’eau n’est pas ici', 'correct' => ['l’eau', 'n’est pas', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'El agua no está aquí', 'correct' => ['el agua', 'no está', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Das Wasser ist nicht hier', 'correct' => ['das Wasser', 'ist nicht', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => '水はここにありません', 'correct' => ['水は', 'ここに', 'ありません'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '물은 여기에 없어요', 'correct' => ['물은', '여기에', '없어요'], 'extra' => ['거기에']],
                            'tr' => ['sentence' => 'su burada değil', 'correct' => ['su', 'burada', 'değil'], 'extra' => ['orada', 'süt']],
                            'ru' => ['sentence' => 'воду не здесь', 'correct' => ['воду', 'не', 'здесь'], 'extra' => ['там']],
                            'ar' => ['sentence' => 'الماء ليس هنا', 'correct' => ['الماء', 'ليس', 'هنا'], 'extra' => ['هناك']],
                        ],
                    ],
                    'b' => [
                        'words' => ['suyu', 'orada'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The water is there', 'correct' => ['the water', 'is', 'there'], 'extra' => ['here']],
                            'fr' => ['sentence' => 'L’eau est là-bas', 'correct' => ['l’eau', 'est', 'là-bas'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'El agua está allí', 'correct' => ['el agua', 'está', 'allí'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Das Wasser ist dort', 'correct' => ['das Wasser', 'ist', 'dort'], 'extra' => ['hier']],
                            'ja' => ['sentence' => '水はそこにあります', 'correct' => ['水は', 'そこに', 'あります'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '물은 거기에 있어요', 'correct' => ['물은', '거기에', '있어요'], 'extra' => ['여기에']],
                            'tr' => ['sentence' => 'su orada', 'correct' => ['su', 'orada'], 'extra' => ['burada', 'süt']],
                            'ru' => ['sentence' => 'воду там', 'correct' => ['воду', 'там'], 'extra' => ['здесь']],
                            'ar' => ['sentence' => 'الماء هناك', 'correct' => ['الماء', 'هناك'], 'extra' => ['هنا']],
                        ],
                    ],
                    'c' => [
                        'words' => ['yoxdur', 'süd'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'There is no milk', 'correct' => ['there is no', 'milk'], 'extra' => ['water']],
                            'fr' => ['sentence' => 'Il n’y a pas de lait', 'correct' => ['il n’y a pas', 'de lait'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'No hay leche', 'correct' => ['no hay', 'leche'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Es gibt keine Milch', 'correct' => ['es gibt keine', 'Milch'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => '牛乳がありません', 'correct' => ['牛乳が', 'ありません'], 'extra' => ['水']],
                            'ko' => ['sentence' => '우유가 없어요', 'correct' => ['우유가', '없어요'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'süt yok', 'correct' => ['süt', 'yok'], 'extra' => ['burada', 'orada']],
                            'ru' => ['sentence' => 'нету молоко', 'correct' => ['нету', 'молоко'], 'extra' => ['вода']],
                            'ar' => ['sentence' => 'لا يوجد حليب', 'correct' => ['لا يوجد', 'حليب'], 'extra' => ['ماء']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Asking Someone', 4,
                pictures: [['az' => 'Çörək', 'img' => 'bread'], ['az' => 'Pendir', 'img' => 'cheese']],
                plain: [['az' => 'Bağışlayın'], ['az' => 'Harada']],
                phrases: [
                    'a' => [
                        'words' => ['bağışlayın', 'harada', 'çörək'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Excuse me where is the bread', 'correct' => ['excuse me', 'where', 'is', 'the bread'], 'extra' => ['cheese']],
                            'fr' => ['sentence' => 'Excusez-moi où est le pain', 'correct' => ['excusez-moi', 'où', 'est', 'le pain'], 'extra' => ['fromage']],
                            'es' => ['sentence' => 'Perdón dónde está el pan', 'correct' => ['perdón', 'dónde', 'está', 'el pan'], 'extra' => ['queso']],
                            'de' => ['sentence' => 'Entschuldigung wo ist das Brot', 'correct' => ['Entschuldigung', 'wo', 'ist', 'das Brot'], 'extra' => ['Käse']],
                            'ja' => ['sentence' => 'すみませんパンはどこですか', 'correct' => ['すみません', 'パンは', 'どこですか'], 'extra' => ['チーズ']],
                            'ko' => ['sentence' => '실례합니다 빵은 어디에 있어요', 'correct' => ['실례합니다', '빵은', '어디에', '있어요'], 'extra' => ['치즈']],
                            'tr' => ['sentence' => 'affedersiniz ekmek nerede', 'correct' => ['affedersiniz', 'ekmek', 'nerede'], 'extra' => ['peynir']],
                            'ru' => ['sentence' => 'извините где хлеб', 'correct' => ['извините', 'где', 'хлеб'], 'extra' => ['сыр']],
                            'ar' => ['sentence' => 'عفوا أين خبز', 'correct' => ['عفوا', 'أين', 'خبز'], 'extra' => ['جبن']],
                        ],
                    ],
                    'b' => [
                        'words' => ['çox sağ ol'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Thank you very much', 'correct' => ['thank you', 'very much'], 'extra' => ['excuse me']],
                            'fr' => ['sentence' => 'Merci beaucoup', 'correct' => ['merci', 'beaucoup'], 'extra' => ['excusez-moi']],
                            'es' => ['sentence' => 'Muchas gracias', 'correct' => ['muchas', 'gracias'], 'extra' => ['perdón']],
                            'de' => ['sentence' => 'Vielen Dank', 'correct' => ['vielen', 'Dank'], 'extra' => ['Entschuldigung']],
                            'ja' => ['sentence' => 'どうもありがとう', 'correct' => ['どうも', 'ありがとう'], 'extra' => ['すみません']],
                            'ko' => ['sentence' => '정말 감사합니다', 'correct' => ['정말', '감사합니다'], 'extra' => ['실례합니다']],
                            'tr' => ['sentence' => 'teşekkürler', 'correct' => ['teşekkürler'], 'extra' => ['affedersiniz', 'nerede']],
                            'ru' => ['sentence' => 'спасибо', 'correct' => ['спасибо'], 'extra' => ['извините']],
                            'ar' => ['sentence' => 'شكرا', 'correct' => ['شكرا'], 'extra' => ['عفوا']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pendir', 'supermarketdə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The cheese is in the supermarket', 'correct' => ['the cheese', 'is', 'in the supermarket'], 'extra' => ['aisle']],
                            'fr' => ['sentence' => 'Le fromage est au supermarché', 'correct' => ['le fromage', 'est', 'au supermarché'], 'extra' => ['rayon']],
                            'es' => ['sentence' => 'El queso está en el supermercado', 'correct' => ['el queso', 'está', 'en el supermercado'], 'extra' => ['pasillo']],
                            'de' => ['sentence' => 'Der Käse ist im Supermarkt', 'correct' => ['der Käse', 'ist', 'im Supermarkt'], 'extra' => ['Regal']],
                            'ja' => ['sentence' => 'チーズはスーパーにあります', 'correct' => ['チーズは', 'スーパーに', 'あります'], 'extra' => ['売り場']],
                            'ko' => ['sentence' => '치즈는 슈퍼마켓에 있어요', 'correct' => ['치즈는', '슈퍼마켓에', '있어요'], 'extra' => ['코너']],
                            'tr' => ['sentence' => 'peynir markette', 'correct' => ['peynir', 'markette'], 'extra' => ['affedersiniz', 'nerede']],
                            'ru' => ['sentence' => 'сыр в супермаркете', 'correct' => ['сыр', 'в', 'супермаркете'], 'extra' => ['отдел']],
                            'ar' => ['sentence' => 'جبن في السوبرماركت', 'correct' => ['جبن', 'في السوبرماركت'], 'extra' => ['قسم']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Finding Everything', 5,
                pictures: [['az' => 'Alma', 'img' => 'apple'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Harada'], ['az' => 'Sağda']],
                phrases: [
                    'a' => [
                        'words' => ['harada', 'alma'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the apple', 'correct' => ['where', 'is', 'the apple'], 'extra' => ['water']],
                            'fr' => ['sentence' => 'Où est la pomme', 'correct' => ['où', 'est', 'la pomme'], 'extra' => ['eau']],
                            'es' => ['sentence' => 'Dónde está la manzana', 'correct' => ['dónde', 'está', 'la manzana'], 'extra' => ['agua']],
                            'de' => ['sentence' => 'Wo ist der Apfel', 'correct' => ['wo', 'ist', 'der Apfel'], 'extra' => ['Wasser']],
                            'ja' => ['sentence' => 'りんごはどこですか', 'correct' => ['りんごは', 'どこですか'], 'extra' => ['水']],
                            'ko' => ['sentence' => '사과는 어디에 있어요', 'correct' => ['사과는', '어디에', '있어요'], 'extra' => ['물']],
                            'tr' => ['sentence' => 'elma nerede', 'correct' => ['elma', 'nerede'], 'extra' => ['reyon', 'su']],
                            'ru' => ['sentence' => 'где яблоко', 'correct' => ['где', 'яблоко'], 'extra' => ['вода']],
                            'ar' => ['sentence' => 'أين تفاحة', 'correct' => ['أين', 'تفاحة'], 'extra' => ['ماء']],
                        ],
                    ],
                    'b' => [
                        'words' => ['alma', 'sağda', 'və', 'suyu', 'solda'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The apple is on the right and the water is on the left', 'correct' => ['the apple', 'is', 'on the right', 'and', 'the water', 'is', 'on the left'], 'extra' => ['here']],
                            'fr' => ['sentence' => 'La pomme est à droite et l’eau est à gauche', 'correct' => ['la pomme', 'est', 'à droite', 'et', 'l’eau', 'est', 'à gauche'], 'extra' => ['ici']],
                            'es' => ['sentence' => 'La manzana está a la derecha y el agua está a la izquierda', 'correct' => ['la manzana', 'está', 'a la derecha', 'y', 'el agua', 'está', 'a la izquierda'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Der Apfel ist rechts und das Wasser ist links', 'correct' => ['der Apfel', 'ist', 'rechts', 'und', 'das Wasser', 'ist', 'links'], 'extra' => ['hier']],
                            'ja' => ['sentence' => 'りんごは右に水は左にあります', 'correct' => ['りんごは', '右に', '水は', '左に', 'あります'], 'extra' => ['ここに']],
                            'ko' => ['sentence' => '사과는 오른쪽에 물은 왼쪽에 있어요', 'correct' => ['사과는', '오른쪽에', '물은', '왼쪽에', '있어요'], 'extra' => ['여기에']],
                            'tr' => ['sentence' => 'elma sağda ve su solda', 'correct' => ['elma', 'sağda', 've', 'su', 'solda'], 'extra' => ['reyon', 'nerede']],
                            'ru' => ['sentence' => 'яблоко справа и воду слева', 'correct' => ['яблоко', 'справа', 'и', 'воду', 'слева'], 'extra' => ['здесь']],
                            'ar' => ['sentence' => 'تفاحة على اليمين و الماء على اليسار', 'correct' => ['تفاحة', 'على اليمين', 'و', 'الماء', 'على اليسار'], 'extra' => ['هنا']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hər şey', 'burada'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Everything is here', 'correct' => ['everything', 'is', 'here'], 'extra' => ['there']],
                            'fr' => ['sentence' => 'Tout est ici', 'correct' => ['tout', 'est', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'Todo está aquí', 'correct' => ['todo', 'está', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Alles ist hier', 'correct' => ['alles', 'ist', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => 'すべてここにあります', 'correct' => ['すべて', 'ここに', 'あります'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '모든 것이 여기에 있어요', 'correct' => ['모든 것이', '여기에', '있어요'], 'extra' => ['거기에']],
                            'tr' => ['sentence' => 'her şey burada', 'correct' => ['her', 'şey', 'burada'], 'extra' => ['reyon', 'nerede']],
                            'ru' => ['sentence' => 'всё здесь', 'correct' => ['всё', 'здесь'], 'extra' => ['там']],
                            'ar' => ['sentence' => 'كل شيء هنا', 'correct' => ['كل شيء', 'هنا'], 'extra' => ['هناك']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
