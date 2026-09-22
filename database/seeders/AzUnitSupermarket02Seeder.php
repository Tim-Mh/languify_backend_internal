<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitSupermarket02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Alma' => 'apple', 'Banan' => 'banana', 'Portağal' => 'orange', 'Qəhvə' => 'coffee',
        'Üzüm' => 'grapes', 'Çay' => 'tea', 'Su' => 'water', 'Süd' => 'milk',
    ];

    /**
     * Azerbaijani Supermarket Unit 2.
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

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Fruit', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Apple & Banana', 1,
                pictures: [['az' => 'Alma', 'img' => 'apple'], ['az' => 'Banan', 'img' => 'banana']],
                plain: [['az' => 'İstəyirəm'], ['az' => 'Bir']],
                phrases: [
                    'a' => [
                        'words' => ['istəyirəm', 'bir', 'alma'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like an apple', 'correct' => ['I would like', 'an', 'apple'], 'extra' => ['banana']],
                            'fr' => ['sentence' => 'Je voudrais une pomme', 'correct' => ['je voudrais', 'une', 'pomme'], 'extra' => ['banane']],
                            'es' => ['sentence' => 'Quisiera una manzana', 'correct' => ['quisiera', 'una', 'manzana'], 'extra' => ['plátano']],
                            'de' => ['sentence' => 'Ich möchte einen Apfel', 'correct' => ['ich möchte', 'einen', 'Apfel'], 'extra' => ['Banane']],
                            'ja' => ['sentence' => 'りんごをください', 'correct' => ['りんごを', 'ください'], 'extra' => ['バナナ']],
                            'ko' => ['sentence' => '사과 주세요', 'correct' => ['사과', '주세요'], 'extra' => ['바나나']],
                            'tr' => ['sentence' => 'bir elma istiyorum', 'correct' => ['bir', 'elma', 'istiyorum'], 'extra' => ['meyve', 'muz']],
                            'ru' => ['sentence' => 'я хочу яблоко', 'correct' => ['я', 'хочу', 'яблоко'], 'extra' => ['банан']],
                            'ar' => ['sentence' => 'أريد تفاحة', 'correct' => ['أريد', 'تفاحة'], 'extra' => ['موزة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['banan', 'təzə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The banana is fresh', 'correct' => ['the banana', 'is', 'fresh'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'La banane est fraîche', 'correct' => ['la banane', 'est', 'fraîche'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'El plátano está fresco', 'correct' => ['el plátano', 'está', 'fresco'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Die Banane ist frisch', 'correct' => ['die Banane', 'ist', 'frisch'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'バナナは新鮮です', 'correct' => ['バナナは', '新鮮です'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '바나나는 신선해요', 'correct' => ['바나나는', '신선해요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'muz taze', 'correct' => ['muz', 'taze'], 'extra' => ['meyve', 'elma']],
                            'ru' => ['sentence' => 'банан свежий', 'correct' => ['банан', 'свежий'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'موزة طازج', 'correct' => ['موزة', 'طازج'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['alma', 'və', 'banan'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Apple and banana', 'correct' => ['apple', 'and', 'banana'], 'extra' => ['fruit']],
                            'fr' => ['sentence' => 'Pomme et banane', 'correct' => ['pomme', 'et', 'banane'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Manzana y plátano', 'correct' => ['manzana', 'y', 'plátano'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Apfel und Banane', 'correct' => ['Apfel', 'und', 'Banane'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => 'りんごとバナナ', 'correct' => ['りんご', 'と', 'バナナ'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '사과와 바나나', 'correct' => ['사과와', '바나나'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'elma ve muz', 'correct' => ['elma', 've', 'muz'], 'extra' => ['meyve']],
                            'ru' => ['sentence' => 'яблоко и банан', 'correct' => ['яблоко', 'и', 'банан'], 'extra' => ['фрукт']],
                            'ar' => ['sentence' => 'تفاحة و موزة', 'correct' => ['تفاحة', 'و', 'موزة'], 'extra' => ['فاكهة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Apples, Plural', 2,
                pictures: [['az' => 'Portağal', 'img' => 'orange'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Almalar'], ['az' => 'Təzə']],
                phrases: [
                    'a' => [
                        'words' => ['almalar', 'təzə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The apples are fresh', 'correct' => ['the apples', 'are', 'fresh'], 'extra' => ['orange']],
                            'fr' => ['sentence' => 'Les pommes sont fraîches', 'correct' => ['les pommes', 'sont', 'fraîches'], 'extra' => ['orange']],
                            'es' => ['sentence' => 'Las manzanas están frescas', 'correct' => ['las manzanas', 'están', 'frescas'], 'extra' => ['naranja']],
                            'de' => ['sentence' => 'Die Äpfel sind frisch', 'correct' => ['die Äpfel', 'sind', 'frisch'], 'extra' => ['Orange']],
                            'ja' => ['sentence' => 'りんごは新鮮です', 'correct' => ['りんごは', '新鮮です'], 'extra' => ['オレンジ']],
                            'ko' => ['sentence' => '사과는 신선해요', 'correct' => ['사과는', '신선해요'], 'extra' => ['오렌지']],
                            'tr' => ['sentence' => 'elmalar taze', 'correct' => ['elmalar', 'taze'], 'extra' => ['meyve', 'elma']],
                            'ru' => ['sentence' => 'яблоки свежий', 'correct' => ['яблоки', 'свежий'], 'extra' => ['апельсин']],
                            'ar' => ['sentence' => 'تفاح طازج', 'correct' => ['تفاح', 'طازج'], 'extra' => ['برتقالة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['beş', 'almalar'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Five apples', 'correct' => ['five', 'apples'], 'extra' => ['orange']],
                            'fr' => ['sentence' => 'Cinq pommes', 'correct' => ['cinq', 'pommes'], 'extra' => ['orange']],
                            'es' => ['sentence' => 'Cinco manzanas', 'correct' => ['cinco', 'manzanas'], 'extra' => ['naranja']],
                            'de' => ['sentence' => 'Fünf Äpfel', 'correct' => ['fünf', 'Äpfel'], 'extra' => ['Orange']],
                            'ja' => ['sentence' => 'りんご五つ', 'correct' => ['りんご', '五つ'], 'extra' => ['オレンジ']],
                            'ko' => ['sentence' => '사과 다섯 개', 'correct' => ['사과', '다섯', '개'], 'extra' => ['오렌지']],
                            'tr' => ['sentence' => 'beş elma', 'correct' => ['beş', 'elma'], 'extra' => ['elmalar', 'meyve']],
                            'ru' => ['sentence' => 'пять яблоки', 'correct' => ['пять', 'яблоки'], 'extra' => ['апельсин']],
                            'ar' => ['sentence' => 'خمسة تفاح', 'correct' => ['خمسة', 'تفاح'], 'extra' => ['برتقالة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['istəyirəm', 'bir', 'portağal'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like an orange', 'correct' => ['I would like', 'an', 'orange'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'Je voudrais une orange', 'correct' => ['je voudrais', 'une', 'orange'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Quisiera una naranja', 'correct' => ['quisiera', 'una', 'naranja'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ich möchte eine Orange', 'correct' => ['ich möchte', 'eine', 'Orange'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'オレンジをください', 'correct' => ['オレンジを', 'ください'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '오렌지 주세요', 'correct' => ['오렌지', '주세요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'portakal istiyorum', 'correct' => ['portakal', 'istiyorum'], 'extra' => ['elmalar', 'meyve']],
                            'ru' => ['sentence' => 'я хочу апельсин', 'correct' => ['я', 'хочу', 'апельсин'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'أريد برتقالة', 'correct' => ['أريد', 'برتقالة'], 'extra' => ['تفاحة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Grapes', 3,
                pictures: [['az' => 'Üzüm', 'img' => 'grapes'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'İstəyirəm'], ['az' => 'Deyil']],
                phrases: [
                    'a' => [
                        'words' => ['istəyirəm', 'üzüm'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like grapes', 'correct' => ['I would like', 'grapes'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'Je voudrais du raisin', 'correct' => ['je voudrais', 'du raisin'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Quisiera uvas', 'correct' => ['quisiera', 'uvas'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ich möchte Trauben', 'correct' => ['ich möchte', 'Trauben'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ぶどうをください', 'correct' => ['ぶどうを', 'ください'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '포도 주세요', 'correct' => ['포도', '주세요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'üzüm istiyorum', 'correct' => ['üzüm', 'istiyorum'], 'extra' => ['taze', 'elma']],
                            'ru' => ['sentence' => 'я хочу виноград', 'correct' => ['я', 'хочу', 'виноград'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'أريد عنب', 'correct' => ['أريد', 'عنب'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['üzüm', 'deyil', 'təzə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The grapes are not fresh', 'correct' => ['the grapes', 'are not', 'fresh'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'Le raisin n’est pas frais', 'correct' => ['le raisin', 'n’est pas', 'frais'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Las uvas no están frescas', 'correct' => ['las uvas', 'no están', 'frescas'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Die Trauben sind nicht frisch', 'correct' => ['die Trauben', 'sind nicht', 'frisch'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ぶどうは新鮮ではありません', 'correct' => ['ぶどうは', '新鮮では', 'ありません'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '포도는 신선하지 않아요', 'correct' => ['포도는', '신선하지 않아요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'üzüm taze değil', 'correct' => ['üzüm', 'taze', 'değil'], 'extra' => ['elma']],
                            'ru' => ['sentence' => 'виноград не свежий', 'correct' => ['виноград', 'не', 'свежий'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'عنب ليس طازج', 'correct' => ['عنب', 'ليس', 'طازج'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['harada', 'meyvə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the fruit', 'correct' => ['where', 'is', 'the fruit'], 'extra' => ['grapes']],
                            'fr' => ['sentence' => 'Où est le fruit', 'correct' => ['où', 'est', 'le fruit'], 'extra' => ['raisin']],
                            'es' => ['sentence' => 'Dónde está la fruta', 'correct' => ['dónde', 'está', 'la fruta'], 'extra' => ['uvas']],
                            'de' => ['sentence' => 'Wo ist das Obst', 'correct' => ['wo', 'ist', 'das Obst'], 'extra' => ['Trauben']],
                            'ja' => ['sentence' => '果物はどこですか', 'correct' => ['果物は', 'どこですか'], 'extra' => ['ぶどう']],
                            'ko' => ['sentence' => '과일은 어디에 있어요', 'correct' => ['과일은', '어디에', '있어요'], 'extra' => ['포도']],
                            'tr' => ['sentence' => 'meyve nerede', 'correct' => ['meyve', 'nerede'], 'extra' => ['üzüm', 'taze']],
                            'ru' => ['sentence' => 'где фрукт', 'correct' => ['где', 'фрукт'], 'extra' => ['виноград']],
                            'ar' => ['sentence' => 'أين فاكهة', 'correct' => ['أين', 'فاكهة'], 'extra' => ['عنب']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Buying Fruit', 4,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Alıram'], ['az' => 'Meyvə']],
                phrases: [
                    'a' => [
                        'words' => ['alıram', 'meyvə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying fruit', 'correct' => ['I am buying', 'fruit'], 'extra' => ['vegetable']],
                            'fr' => ['sentence' => 'J’achète des fruits', 'correct' => ['j’achète', 'des fruits'], 'extra' => ['légume']],
                            'es' => ['sentence' => 'Compro fruta', 'correct' => ['compro', 'fruta'], 'extra' => ['verdura']],
                            'de' => ['sentence' => 'Ich kaufe Obst', 'correct' => ['ich kaufe', 'Obst'], 'extra' => ['Gemüse']],
                            'ja' => ['sentence' => '果物を買います', 'correct' => ['果物を', '買います'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '과일을 삽니다', 'correct' => ['과일을', '삽니다'], 'extra' => ['채소']],
                            'tr' => ['sentence' => 'meyve alıyorum', 'correct' => ['meyve', 'alıyorum'], 'extra' => ['muz', 'üzüm']],
                            'ru' => ['sentence' => 'я покупаю фрукт', 'correct' => ['я', 'покупаю', 'фрукт'], 'extra' => ['овощ']],
                            'ar' => ['sentence' => 'أشتري فاكهة', 'correct' => ['أشتري', 'فاكهة'], 'extra' => ['خضار']],
                        ],
                    ],
                    'b' => [
                        'words' => ['alıram', 'üç', 'bananlar'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'I am buying three bananas', 'correct' => ['I am buying', 'three', 'bananas'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'J’achète trois bananes', 'correct' => ['j’achète', 'trois', 'bananes'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Compro tres plátanos', 'correct' => ['compro', 'tres', 'plátanos'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ich kaufe drei Bananen', 'correct' => ['ich kaufe', 'drei', 'Bananen'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'バナナを三つ買います', 'correct' => ['バナナを', '三つ', '買います'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '바나나 세 개를 삽니다', 'correct' => ['바나나', '세', '개를', '삽니다'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'üç muz alıyorum', 'correct' => ['üç', 'muz', 'alıyorum'], 'extra' => ['meyve', 'üzüm']],
                            'ru' => ['sentence' => 'я покупаю три бананы', 'correct' => ['я', 'покупаю', 'три', 'бананы'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'أشتري ثلاثة موز', 'correct' => ['أشتري', 'ثلاثة', 'موز'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['meyvə', 'təzə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The fruit is fresh', 'correct' => ['the fruit', 'is', 'fresh'], 'extra' => ['vegetable']],
                            'fr' => ['sentence' => 'Le fruit est frais', 'correct' => ['le fruit', 'est', 'frais'], 'extra' => ['légume']],
                            'es' => ['sentence' => 'La fruta está fresca', 'correct' => ['la fruta', 'está', 'fresca'], 'extra' => ['verdura']],
                            'de' => ['sentence' => 'Das Obst ist frisch', 'correct' => ['das Obst', 'ist', 'frisch'], 'extra' => ['Gemüse']],
                            'ja' => ['sentence' => '果物は新鮮です', 'correct' => ['果物は', '新鮮です'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '과일은 신선해요', 'correct' => ['과일은', '신선해요'], 'extra' => ['채소']],
                            'tr' => ['sentence' => 'meyve taze', 'correct' => ['meyve', 'taze'], 'extra' => ['alıyorum', 'muz']],
                            'ru' => ['sentence' => 'фрукт свежий', 'correct' => ['фрукт', 'свежий'], 'extra' => ['овощ']],
                            'ar' => ['sentence' => 'فاكهة طازج', 'correct' => ['فاكهة', 'طازج'], 'extra' => ['خضار']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Fruit Aisle', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Meyvə'], ['az' => 'Şöbədə']],
                phrases: [
                    'a' => [
                        'words' => ['meyvə', 'şöbədə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The fruit is in the aisle', 'correct' => ['the fruit', 'is', 'in the aisle'], 'extra' => ['supermarket']],
                            'fr' => ['sentence' => 'Le fruit est au rayon', 'correct' => ['le fruit', 'est', 'au rayon'], 'extra' => ['supermarché']],
                            'es' => ['sentence' => 'La fruta está en el pasillo', 'correct' => ['la fruta', 'está', 'en el pasillo'], 'extra' => ['supermercado']],
                            'de' => ['sentence' => 'Das Obst ist im Regal', 'correct' => ['das Obst', 'ist', 'im Regal'], 'extra' => ['Supermarkt']],
                            'ja' => ['sentence' => '果物は売り場にあります', 'correct' => ['果物は', '売り場に', 'あります'], 'extra' => ['スーパー']],
                            'ko' => ['sentence' => '과일은 코너에 있어요', 'correct' => ['과일은', '코너에', '있어요'], 'extra' => ['슈퍼마켓']],
                            'tr' => ['sentence' => 'meyve reyonda', 'correct' => ['meyve', 'reyonda'], 'extra' => ['reyon', 'portakal']],
                            'ru' => ['sentence' => 'фрукт в отделе', 'correct' => ['фрукт', 'в', 'отделе'], 'extra' => ['супермаркет']],
                            'ar' => ['sentence' => 'فاكهة في القسم', 'correct' => ['فاكهة', 'في القسم'], 'extra' => ['سوبرماركت']],
                        ],
                    ],
                    'b' => [
                        'words' => ['iki', 'portağallar', 'zəhmət olmasa'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Two oranges please', 'correct' => ['two', 'oranges', 'please'], 'extra' => ['apple']],
                            'fr' => ['sentence' => 'Deux oranges s’il vous plaît', 'correct' => ['deux', 'oranges', 's’il vous plaît'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Dos naranjas por favor', 'correct' => ['dos', 'naranjas', 'por favor'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Zwei Orangen bitte', 'correct' => ['zwei', 'Orangen', 'bitte'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'オレンジを二つお願いします', 'correct' => ['オレンジを', '二つ', 'お願いします'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '오렌지 두 개 부탁합니다', 'correct' => ['오렌지', '두', '개', '부탁합니다'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'iki portakal lütfen', 'correct' => ['iki', 'portakal', 'lütfen'], 'extra' => ['meyve', 'reyon']],
                            'ru' => ['sentence' => 'два апельсины пожалуйста', 'correct' => ['два', 'апельсины', 'пожалуйста'], 'extra' => ['яблоко']],
                            'ar' => ['sentence' => 'اثنان برتقال من فضلك', 'correct' => ['اثنان', 'برتقال', 'من فضلك'], 'extra' => ['تفاحة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['almalar', 'burada'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The apples are here', 'correct' => ['the apples', 'are', 'here'], 'extra' => ['there']],
                            'fr' => ['sentence' => 'Les pommes sont ici', 'correct' => ['les pommes', 'sont', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'Las manzanas están aquí', 'correct' => ['las manzanas', 'están', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Die Äpfel sind hier', 'correct' => ['die Äpfel', 'sind', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => 'りんごはここにあります', 'correct' => ['りんごは', 'ここに', 'あります'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '사과는 여기에 있어요', 'correct' => ['사과는', '여기에', '있어요'], 'extra' => ['거기에']],
                            'tr' => ['sentence' => 'elmalar burada', 'correct' => ['elmalar', 'burada'], 'extra' => ['meyve', 'reyon']],
                            'ru' => ['sentence' => 'яблоки здесь', 'correct' => ['яблоки', 'здесь'], 'extra' => ['там']],
                            'ar' => ['sentence' => 'تفاح هنا', 'correct' => ['تفاح', 'هنا'], 'extra' => ['هناك']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
