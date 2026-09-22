<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\ArabicLessonBuilder;
use Illuminate\Database\Seeder;

class ArUnitSupermarket02Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'تفاحة' => 'apple', 'موزة' => 'banana', 'برتقالة' => 'orange', 'قهوة' => 'coffee',
        'عنب' => 'grapes', 'شاي' => 'tea', 'ماء' => 'water', 'حليب' => 'milk',
    ];

    /**
     * Arabic Supermarket Unit 2.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Arabic sentences are built from the shared plan tile by tile, and
     * every tile is a ArabicVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ar')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new ArabicLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Fruit', $this->lessonsData($builder));
    }

    private function lessonsData(ArabicLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Apple & Banana', 1,
                pictures: [['ar' => 'تفاحة', 'img' => 'apple'], ['ar' => 'موزة', 'img' => 'banana']],
                plain: [['ar' => 'أريد'], ['ar' => 'طازج']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'تفاحة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like an apple', 'correct' => ['I would like', 'an', 'apple'], 'extra' => ['banana']],
                            'az' => ['sentence' => 'istəyirəm bir alma', 'correct' => ['istəyirəm', 'bir', 'alma'], 'extra' => ['banan']],
                            'fr' => ['sentence' => 'Je voudrais une pomme', 'correct' => ['je voudrais', 'une', 'pomme'], 'extra' => ['banane']],
                            'es' => ['sentence' => 'Quisiera una manzana', 'correct' => ['quisiera', 'una', 'manzana'], 'extra' => ['plátano']],
                            'de' => ['sentence' => 'Ich möchte einen Apfel', 'correct' => ['ich möchte', 'einen', 'Apfel'], 'extra' => ['Banane']],
                            'ja' => ['sentence' => 'りんごをください', 'correct' => ['りんごを', 'ください'], 'extra' => ['バナナ']],
                            'ko' => ['sentence' => '사과 주세요', 'correct' => ['사과', '주세요'], 'extra' => ['바나나']],
                            'tr' => ['sentence' => 'bir elma istiyorum', 'correct' => ['bir', 'elma', 'istiyorum'], 'extra' => ['meyve', 'muz']],
                            'ru' => ['sentence' => 'я хочу яблоко', 'correct' => ['я', 'хочу', 'яблоко'], 'extra' => ['банан']],
                        ],
                    ],
                    'b' => [
                        'words' => ['موزة', 'طازج'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The banana is fresh', 'correct' => ['the banana', 'is', 'fresh'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'banan təzə', 'correct' => ['banan', 'təzə'], 'extra' => ['alma']],
                            'fr' => ['sentence' => 'La banane est fraîche', 'correct' => ['la banane', 'est', 'fraîche'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'El plátano está fresco', 'correct' => ['el plátano', 'está', 'fresco'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Die Banane ist frisch', 'correct' => ['die Banane', 'ist', 'frisch'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'バナナは新鮮です', 'correct' => ['バナナは', '新鮮です'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '바나나는 신선해요', 'correct' => ['바나나는', '신선해요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'muz taze', 'correct' => ['muz', 'taze'], 'extra' => ['meyve', 'elma']],
                            'ru' => ['sentence' => 'банан свежий', 'correct' => ['банан', 'свежий'], 'extra' => ['яблоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['تفاحة', 'و', 'موزة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Apple and banana', 'correct' => ['apple', 'and', 'banana'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'alma və banan', 'correct' => ['alma', 'və', 'banan'], 'extra' => ['meyvə']],
                            'fr' => ['sentence' => 'Pomme et banane', 'correct' => ['pomme', 'et', 'banane'], 'extra' => ['fruit']],
                            'es' => ['sentence' => 'Manzana y plátano', 'correct' => ['manzana', 'y', 'plátano'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Apfel und Banane', 'correct' => ['Apfel', 'und', 'Banane'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => 'りんごとバナナ', 'correct' => ['りんご', 'と', 'バナナ'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '사과와 바나나', 'correct' => ['사과와', '바나나'], 'extra' => ['과일']],
                            'tr' => ['sentence' => 'elma ve muz', 'correct' => ['elma', 've', 'muz'], 'extra' => ['meyve']],
                            'ru' => ['sentence' => 'яблоко и банан', 'correct' => ['яблоко', 'и', 'банан'], 'extra' => ['фрукт']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Apples, Plural', 2,
                pictures: [['ar' => 'برتقالة', 'img' => 'orange'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'تفاح'], ['ar' => 'طازج']],
                phrases: [
                    'a' => [
                        'words' => ['تفاح', 'طازج'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The apples are fresh', 'correct' => ['the apples', 'are', 'fresh'], 'extra' => ['orange']],
                            'az' => ['sentence' => 'almalar təzə', 'correct' => ['almalar', 'təzə'], 'extra' => ['portağal']],
                            'fr' => ['sentence' => 'Les pommes sont fraîches', 'correct' => ['les pommes', 'sont', 'fraîches'], 'extra' => ['orange']],
                            'es' => ['sentence' => 'Las manzanas están frescas', 'correct' => ['las manzanas', 'están', 'frescas'], 'extra' => ['naranja']],
                            'de' => ['sentence' => 'Die Äpfel sind frisch', 'correct' => ['die Äpfel', 'sind', 'frisch'], 'extra' => ['Orange']],
                            'ja' => ['sentence' => 'りんごは新鮮です', 'correct' => ['りんごは', '新鮮です'], 'extra' => ['オレンジ']],
                            'ko' => ['sentence' => '사과는 신선해요', 'correct' => ['사과는', '신선해요'], 'extra' => ['오렌지']],
                            'tr' => ['sentence' => 'elmalar taze', 'correct' => ['elmalar', 'taze'], 'extra' => ['meyve', 'elma']],
                            'ru' => ['sentence' => 'яблоки свежий', 'correct' => ['яблоки', 'свежий'], 'extra' => ['апельсин']],
                        ],
                    ],
                    'b' => [
                        'words' => ['خمسة', 'تفاح'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Five apples', 'correct' => ['five', 'apples'], 'extra' => ['orange']],
                            'az' => ['sentence' => 'beş almalar', 'correct' => ['beş', 'almalar'], 'extra' => ['portağal']],
                            'fr' => ['sentence' => 'Cinq pommes', 'correct' => ['cinq', 'pommes'], 'extra' => ['orange']],
                            'es' => ['sentence' => 'Cinco manzanas', 'correct' => ['cinco', 'manzanas'], 'extra' => ['naranja']],
                            'de' => ['sentence' => 'Fünf Äpfel', 'correct' => ['fünf', 'Äpfel'], 'extra' => ['Orange']],
                            'ja' => ['sentence' => 'りんご五つ', 'correct' => ['りんご', '五つ'], 'extra' => ['オレンジ']],
                            'ko' => ['sentence' => '사과 다섯 개', 'correct' => ['사과', '다섯', '개'], 'extra' => ['오렌지']],
                            'tr' => ['sentence' => 'beş elma', 'correct' => ['beş', 'elma'], 'extra' => ['elmalar', 'meyve']],
                            'ru' => ['sentence' => 'пять яблоки', 'correct' => ['пять', 'яблоки'], 'extra' => ['апельсин']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أريد', 'برتقالة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'I would like an orange', 'correct' => ['I would like', 'an', 'orange'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'istəyirəm bir portağal', 'correct' => ['istəyirəm', 'bir', 'portağal'], 'extra' => ['alma']],
                            'fr' => ['sentence' => 'Je voudrais une orange', 'correct' => ['je voudrais', 'une', 'orange'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Quisiera una naranja', 'correct' => ['quisiera', 'una', 'naranja'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ich möchte eine Orange', 'correct' => ['ich möchte', 'eine', 'Orange'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'オレンジをください', 'correct' => ['オレンジを', 'ください'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '오렌지 주세요', 'correct' => ['오렌지', '주세요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'portakal istiyorum', 'correct' => ['portakal', 'istiyorum'], 'extra' => ['elmalar', 'meyve']],
                            'ru' => ['sentence' => 'я хочу апельсин', 'correct' => ['я', 'хочу', 'апельсин'], 'extra' => ['яблоко']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Grapes', 3,
                pictures: [['ar' => 'عنب', 'img' => 'grapes'], ['ar' => 'قهوة', 'img' => 'coffee']],
                plain: [['ar' => 'أريد'], ['ar' => 'ليس']],
                phrases: [
                    'a' => [
                        'words' => ['أريد', 'عنب'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I would like grapes', 'correct' => ['I would like', 'grapes'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'istəyirəm üzüm', 'correct' => ['istəyirəm', 'üzüm'], 'extra' => ['alma']],
                            'fr' => ['sentence' => 'Je voudrais du raisin', 'correct' => ['je voudrais', 'du raisin'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Quisiera uvas', 'correct' => ['quisiera', 'uvas'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ich möchte Trauben', 'correct' => ['ich möchte', 'Trauben'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ぶどうをください', 'correct' => ['ぶどうを', 'ください'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '포도 주세요', 'correct' => ['포도', '주세요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'üzüm istiyorum', 'correct' => ['üzüm', 'istiyorum'], 'extra' => ['taze', 'elma']],
                            'ru' => ['sentence' => 'я хочу виноград', 'correct' => ['я', 'хочу', 'виноград'], 'extra' => ['яблоко']],
                        ],
                    ],
                    'b' => [
                        'words' => ['عنب', 'ليس', 'طازج'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The grapes are not fresh', 'correct' => ['the grapes', 'are not', 'fresh'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'üzüm deyil təzə', 'correct' => ['üzüm', 'deyil', 'təzə'], 'extra' => ['alma']],
                            'fr' => ['sentence' => 'Le raisin n’est pas frais', 'correct' => ['le raisin', 'n’est pas', 'frais'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Las uvas no están frescas', 'correct' => ['las uvas', 'no están', 'frescas'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Die Trauben sind nicht frisch', 'correct' => ['die Trauben', 'sind nicht', 'frisch'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'ぶどうは新鮮ではありません', 'correct' => ['ぶどうは', '新鮮では', 'ありません'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '포도는 신선하지 않아요', 'correct' => ['포도는', '신선하지 않아요'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'üzüm taze değil', 'correct' => ['üzüm', 'taze', 'değil'], 'extra' => ['elma']],
                            'ru' => ['sentence' => 'виноград не свежий', 'correct' => ['виноград', 'не', 'свежий'], 'extra' => ['яблоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['أين', 'فاكهة'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'Where is the fruit', 'correct' => ['where', 'is', 'the fruit'], 'extra' => ['grapes']],
                            'az' => ['sentence' => 'harada meyvə', 'correct' => ['harada', 'meyvə'], 'extra' => ['üzüm']],
                            'fr' => ['sentence' => 'Où est le fruit', 'correct' => ['où', 'est', 'le fruit'], 'extra' => ['raisin']],
                            'es' => ['sentence' => 'Dónde está la fruta', 'correct' => ['dónde', 'está', 'la fruta'], 'extra' => ['uvas']],
                            'de' => ['sentence' => 'Wo ist das Obst', 'correct' => ['wo', 'ist', 'das Obst'], 'extra' => ['Trauben']],
                            'ja' => ['sentence' => '果物はどこですか', 'correct' => ['果物は', 'どこですか'], 'extra' => ['ぶどう']],
                            'ko' => ['sentence' => '과일은 어디에 있어요', 'correct' => ['과일은', '어디에', '있어요'], 'extra' => ['포도']],
                            'tr' => ['sentence' => 'meyve nerede', 'correct' => ['meyve', 'nerede'], 'extra' => ['üzüm', 'taze']],
                            'ru' => ['sentence' => 'где фрукт', 'correct' => ['где', 'фрукт'], 'extra' => ['виноград']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Buying Fruit', 4,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'أشتري'], ['ar' => 'فاكهة']],
                phrases: [
                    'a' => [
                        'words' => ['أشتري', 'فاكهة'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying fruit', 'correct' => ['I am buying', 'fruit'], 'extra' => ['vegetable']],
                            'az' => ['sentence' => 'alıram meyvə', 'correct' => ['alıram', 'meyvə'], 'extra' => ['tərəvəz']],
                            'fr' => ['sentence' => 'J’achète des fruits', 'correct' => ['j’achète', 'des fruits'], 'extra' => ['légume']],
                            'es' => ['sentence' => 'Compro fruta', 'correct' => ['compro', 'fruta'], 'extra' => ['verdura']],
                            'de' => ['sentence' => 'Ich kaufe Obst', 'correct' => ['ich kaufe', 'Obst'], 'extra' => ['Gemüse']],
                            'ja' => ['sentence' => '果物を買います', 'correct' => ['果物を', '買います'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '과일을 삽니다', 'correct' => ['과일을', '삽니다'], 'extra' => ['채소']],
                            'tr' => ['sentence' => 'meyve alıyorum', 'correct' => ['meyve', 'alıyorum'], 'extra' => ['muz', 'üzüm']],
                            'ru' => ['sentence' => 'я покупаю фрукт', 'correct' => ['я', 'покупаю', 'фрукт'], 'extra' => ['овощ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['أشتري', 'ثلاثة', 'موز'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'I am buying three bananas', 'correct' => ['I am buying', 'three', 'bananas'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'alıram üç bananlar', 'correct' => ['alıram', 'üç', 'bananlar'], 'extra' => ['alma']],
                            'fr' => ['sentence' => 'J’achète trois bananes', 'correct' => ['j’achète', 'trois', 'bananes'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Compro tres plátanos', 'correct' => ['compro', 'tres', 'plátanos'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Ich kaufe drei Bananen', 'correct' => ['ich kaufe', 'drei', 'Bananen'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'バナナを三つ買います', 'correct' => ['バナナを', '三つ', '買います'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '바나나 세 개를 삽니다', 'correct' => ['바나나', '세', '개를', '삽니다'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'üç muz alıyorum', 'correct' => ['üç', 'muz', 'alıyorum'], 'extra' => ['meyve', 'üzüm']],
                            'ru' => ['sentence' => 'я покупаю три бананы', 'correct' => ['я', 'покупаю', 'три', 'бананы'], 'extra' => ['яблоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['فاكهة', 'طازج'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The fruit is fresh', 'correct' => ['the fruit', 'is', 'fresh'], 'extra' => ['vegetable']],
                            'az' => ['sentence' => 'meyvə təzə', 'correct' => ['meyvə', 'təzə'], 'extra' => ['tərəvəz']],
                            'fr' => ['sentence' => 'Le fruit est frais', 'correct' => ['le fruit', 'est', 'frais'], 'extra' => ['légume']],
                            'es' => ['sentence' => 'La fruta está fresca', 'correct' => ['la fruta', 'está', 'fresca'], 'extra' => ['verdura']],
                            'de' => ['sentence' => 'Das Obst ist frisch', 'correct' => ['das Obst', 'ist', 'frisch'], 'extra' => ['Gemüse']],
                            'ja' => ['sentence' => '果物は新鮮です', 'correct' => ['果物は', '新鮮です'], 'extra' => ['野菜']],
                            'ko' => ['sentence' => '과일은 신선해요', 'correct' => ['과일은', '신선해요'], 'extra' => ['채소']],
                            'tr' => ['sentence' => 'meyve taze', 'correct' => ['meyve', 'taze'], 'extra' => ['alıyorum', 'muz']],
                            'ru' => ['sentence' => 'фрукт свежий', 'correct' => ['фрукт', 'свежий'], 'extra' => ['овощ']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: The Fruit Aisle', 5,
                pictures: [['ar' => 'قهوة', 'img' => 'coffee'], ['ar' => 'شاي', 'img' => 'tea']],
                plain: [['ar' => 'فاكهة'], ['ar' => 'في القسم']],
                phrases: [
                    'a' => [
                        'words' => ['فاكهة', 'في القسم'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'The fruit is in the aisle', 'correct' => ['the fruit', 'is', 'in the aisle'], 'extra' => ['supermarket']],
                            'az' => ['sentence' => 'meyvə şöbədə', 'correct' => ['meyvə', 'şöbədə'], 'extra' => ['supermarket']],
                            'fr' => ['sentence' => 'Le fruit est au rayon', 'correct' => ['le fruit', 'est', 'au rayon'], 'extra' => ['supermarché']],
                            'es' => ['sentence' => 'La fruta está en el pasillo', 'correct' => ['la fruta', 'está', 'en el pasillo'], 'extra' => ['supermercado']],
                            'de' => ['sentence' => 'Das Obst ist im Regal', 'correct' => ['das Obst', 'ist', 'im Regal'], 'extra' => ['Supermarkt']],
                            'ja' => ['sentence' => '果物は売り場にあります', 'correct' => ['果物は', '売り場に', 'あります'], 'extra' => ['スーパー']],
                            'ko' => ['sentence' => '과일은 코너에 있어요', 'correct' => ['과일은', '코너에', '있어요'], 'extra' => ['슈퍼마켓']],
                            'tr' => ['sentence' => 'meyve reyonda', 'correct' => ['meyve', 'reyonda'], 'extra' => ['reyon', 'portakal']],
                            'ru' => ['sentence' => 'фрукт в отделе', 'correct' => ['фрукт', 'в', 'отделе'], 'extra' => ['супермаркет']],
                        ],
                    ],
                    'b' => [
                        'words' => ['اثنان', 'برتقال', 'من فضلك'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Two oranges please', 'correct' => ['two', 'oranges', 'please'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'iki portağallar zəhmət olmasa', 'correct' => ['iki', 'portağallar', 'zəhmət olmasa'], 'extra' => ['alma']],
                            'fr' => ['sentence' => 'Deux oranges s’il vous plaît', 'correct' => ['deux', 'oranges', 's’il vous plaît'], 'extra' => ['pomme']],
                            'es' => ['sentence' => 'Dos naranjas por favor', 'correct' => ['dos', 'naranjas', 'por favor'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Zwei Orangen bitte', 'correct' => ['zwei', 'Orangen', 'bitte'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'オレンジを二つお願いします', 'correct' => ['オレンジを', '二つ', 'お願いします'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '오렌지 두 개 부탁합니다', 'correct' => ['오렌지', '두', '개', '부탁합니다'], 'extra' => ['사과']],
                            'tr' => ['sentence' => 'iki portakal lütfen', 'correct' => ['iki', 'portakal', 'lütfen'], 'extra' => ['meyve', 'reyon']],
                            'ru' => ['sentence' => 'два апельсины пожалуйста', 'correct' => ['два', 'апельсины', 'пожалуйста'], 'extra' => ['яблоко']],
                        ],
                    ],
                    'c' => [
                        'words' => ['تفاح', 'هنا'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The apples are here', 'correct' => ['the apples', 'are', 'here'], 'extra' => ['there']],
                            'az' => ['sentence' => 'almalar burada', 'correct' => ['almalar', 'burada'], 'extra' => ['orada']],
                            'fr' => ['sentence' => 'Les pommes sont ici', 'correct' => ['les pommes', 'sont', 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'Las manzanas están aquí', 'correct' => ['las manzanas', 'están', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Die Äpfel sind hier', 'correct' => ['die Äpfel', 'sind', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => 'りんごはここにあります', 'correct' => ['りんごは', 'ここに', 'あります'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '사과는 여기에 있어요', 'correct' => ['사과는', '여기에', '있어요'], 'extra' => ['거기에']],
                            'tr' => ['sentence' => 'elmalar burada', 'correct' => ['elmalar', 'burada'], 'extra' => ['meyve', 'reyon']],
                            'ru' => ['sentence' => 'яблоки здесь', 'correct' => ['яблоки', 'здесь'], 'extra' => ['там']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
