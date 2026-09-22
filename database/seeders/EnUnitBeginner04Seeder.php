<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitBeginner04Seeder extends Seeder
{
    private const PICTURES = [
        'Table' => 'table', 'Chair' => 'chair', 'House' => 'house', 'Cat' => 'cat',
        'Dog' => 'dog', 'Book' => 'book',
    ];

    /**
     * English Chapter 1, Unit 4 — the home and where things are.
     *
     * The furniture and pets are all picturable, so the abstract half teaches
     * the small words that put them in space and possession — the, in, on,
     * I have, where is — which is where English word order (the cat is on the
     * table) starts to matter.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Home & Objects', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Table & The Chair', 1,
                pictures: [['en' => 'Table', 'img' => 'table'], ['en' => 'Chair', 'img' => 'chair']],
                plain: [['en' => 'The'], ['en' => 'And']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'table'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'La mesa', 'correct' => ['la', 'mesa'], 'extra' => ['silla']],
                            'de' => ['sentence' => 'Der Tisch', 'correct' => ['der', 'Tisch'], 'extra' => ['Stuhl']],
                            'ja' => ['sentence' => 'そのテーブル', 'correct' => ['その', 'テーブル'], 'extra' => ['椅子']],
                            'ko' => ['sentence' => '그 탁자', 'correct' => ['그', '탁자'], 'extra' => ['의자']],
                            'fr' => ['sentence' => 'La table', 'correct' => ['la', 'table'], 'extra' => ['chaise']],
                            'tr' => ['sentence' => 'masa', 'correct' => ['masa'], 'extra' => []],
                        'ru' => ['sentence' => 'стол', 'correct' => ['стол'], 'extra' => []],
                        'ar' => ['sentence' => 'طاولة', 'correct' => ['طاولة'], 'extra' => []],
                        'az' => ['sentence' => 'masa', 'correct' => ['masa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'chair'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'La silla', 'correct' => ['la', 'silla'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Der Stuhl', 'correct' => ['der', 'Stuhl'], 'extra' => ['Tisch']],
                            'ja' => ['sentence' => 'その椅子', 'correct' => ['その', '椅子'], 'extra' => ['テーブル']],
                            'ko' => ['sentence' => '그 의자', 'correct' => ['그', '의자'], 'extra' => ['탁자']],
                            'fr' => ['sentence' => 'La chaise', 'correct' => ['la', 'chaise'], 'extra' => ['table']],
                            'tr' => ['sentence' => 'sandalye', 'correct' => ['sandalye'], 'extra' => []],
                        'ru' => ['sentence' => 'стул', 'correct' => ['стул'], 'extra' => []],
                        'ar' => ['sentence' => 'كرسي', 'correct' => ['كرسي'], 'extra' => []],
                        'az' => ['sentence' => 'stul', 'correct' => ['stul'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'table', 'and', 'the', 'chair'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'La mesa y la silla', 'correct' => ['la', 'mesa', 'y', 'la', 'silla'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Der Tisch und der Stuhl', 'correct' => ['der', 'Tisch', 'und', 'der', 'Stuhl'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'テーブルと椅子', 'correct' => ['テーブル', 'と', '椅子'], 'extra' => ['家']],
                            'ko' => ['sentence' => '탁자와 의자', 'correct' => ['탁자와', '의자'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'La table et la chaise', 'correct' => ['la', 'table', 'et', 'la', 'chaise'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'masa ve sandalye', 'correct' => ['masa', 've', 'sandalye'], 'extra' => []],
                        'ru' => ['sentence' => 'стол и стул', 'correct' => ['стол', 'и', 'стул'], 'extra' => []],
                        'ar' => ['sentence' => 'طاولة و كرسي', 'correct' => ['طاولة', 'و', 'كرسي'], 'extra' => []],
                        'az' => ['sentence' => 'masa və stul', 'correct' => ['masa', 'və', 'stul'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: In & On', 2,
                pictures: [['en' => 'Cat', 'img' => 'cat'], ['en' => 'Table', 'img' => 'table']],
                plain: [['en' => 'In'], ['en' => 'On']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'cat', 'on', 'the', 'table'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El gato sobre la mesa', 'correct' => ['el', 'gato', 'sobre', 'la', 'mesa'], 'extra' => ['en']],
                            'de' => ['sentence' => 'Die Katze auf dem Tisch', 'correct' => ['die', 'Katze', 'auf', 'dem', 'Tisch'], 'extra' => ['in']],
                            'ja' => ['sentence' => 'テーブルの上の猫', 'correct' => ['テーブル', 'の', '上', 'の', '猫'], 'extra' => ['の中に']],
                            'ko' => ['sentence' => '탁자 위의 고양이', 'correct' => ['탁자', '위의', '고양이'], 'extra' => ['안에']],
                            'fr' => ['sentence' => 'Le chat sur la table', 'correct' => ['le', 'chat', 'sur', 'la', 'table'], 'extra' => ['dans']],
                            'tr' => ['sentence' => 'masadaki kedi', 'correct' => ['masadaki', 'kedi'], 'extra' => []],
                        'ru' => ['sentence' => 'кот на стол', 'correct' => ['кот', 'на', 'стол'], 'extra' => []],
                        'ar' => ['sentence' => 'قط على طاولة', 'correct' => ['قط', 'على', 'طاولة'], 'extra' => []],
                        'az' => ['sentence' => 'pişik üzərində masa', 'correct' => ['pişik', 'üzərində', 'masa'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'cat', 'in', 'the', 'house'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El gato en la casa', 'correct' => ['el', 'gato', 'en', 'la', 'casa'], 'extra' => ['sobre']],
                            'de' => ['sentence' => 'Die Katze im Haus', 'correct' => ['die', 'Katze', 'in', 'dem', 'Haus'], 'extra' => ['auf']],
                            'ja' => ['sentence' => '家の中の猫', 'correct' => ['家', 'の', '中', 'の', '猫'], 'extra' => ['の上に']],
                            'ko' => ['sentence' => '집 안의 고양이', 'correct' => ['집', '안의', '고양이'], 'extra' => ['위에']],
                            'fr' => ['sentence' => 'Le chat dans la maison', 'correct' => ['le', 'chat', 'dans', 'la', 'maison'], 'extra' => ['sur']],
                            'tr' => ['sentence' => 'evdeki kedi', 'correct' => ['evdeki', 'kedi'], 'extra' => []],
                        'ru' => ['sentence' => 'кот в дом', 'correct' => ['кот', 'в', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'قط في بيت', 'correct' => ['قط', 'في', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'pişik içində ev', 'correct' => ['pişik', 'içində', 'ev'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['on', 'the', 'table', 'or', 'in', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Sobre la mesa o en la casa', 'correct' => ['sobre', 'la', 'mesa', 'o', 'en', 'la', 'casa'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Auf dem Tisch oder im Haus', 'correct' => ['auf', 'dem', 'Tisch', 'oder', 'in', 'dem', 'Haus'], 'extra' => ['Katze']],
                            'ja' => ['sentence' => 'テーブルの上か家の中', 'correct' => ['テーブル', 'の', '上', 'か', '家', 'の', '中'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '탁자 위 또는 집 안', 'correct' => ['탁자', '위', '또는', '집', '안'], 'extra' => ['고양이']],
                            'fr' => ['sentence' => 'Sur la table ou dans la maison', 'correct' => ['sur', 'la', 'table', 'ou', 'dans', 'la', 'maison'], 'extra' => ['chat']],
                            'tr' => ['sentence' => 'masada veya evde', 'correct' => ['masada', 'veya', 'evde'], 'extra' => []],
                        'ru' => ['sentence' => 'на стол или в дом', 'correct' => ['на', 'стол', 'или', 'в', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'على طاولة أو في بيت', 'correct' => ['على', 'طاولة', 'أو', 'في', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'üzərində masa və ya içində ev', 'correct' => ['üzərində', 'masa', 'və ya', 'içində', 'ev'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: I Have A Dog', 3,
                pictures: [['en' => 'Dog', 'img' => 'dog'], ['en' => 'Cat', 'img' => 'cat']],
                plain: [['en' => 'I have'], ['en' => 'A']],
                phrases: [
                    'a' => [
                        'words' => ['I have', 'a', 'dog'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tengo un perro', 'correct' => ['tengo', 'un', 'perro'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Ich habe einen Hund', 'correct' => ['ich habe', 'einen', 'Hund'], 'extra' => ['Katze']],
                            'ja' => ['sentence' => '私は犬を飼っています', 'correct' => ['私', 'は', '犬', 'を', '飼っています'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '나는 개를 키웁니다', 'correct' => ['나는', '개를', '키웁니다'], 'extra' => ['고양이']],
                            'fr' => ['sentence' => "J'ai un chien", 'correct' => ["j'ai", 'un', 'chien'], 'extra' => ['chat']],
                            'tr' => ['sentence' => 'bir köpeğim var', 'correct' => ['bir', 'köpeğim', 'var'], 'extra' => []],
                        'ru' => ['sentence' => 'у меня собака', 'correct' => ['у', 'меня', 'собака'], 'extra' => []],
                        'ar' => ['sentence' => 'عندي كلب', 'correct' => ['عندي', 'كلب'], 'extra' => []],
                        'az' => ['sentence' => 'məndə var bir it', 'correct' => ['məndə var', 'bir', 'it'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I have', 'a', 'cat'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tengo un gato', 'correct' => ['tengo', 'un', 'gato'], 'extra' => ['perro']],
                            'de' => ['sentence' => 'Ich habe eine Katze', 'correct' => ['ich habe', 'eine', 'Katze'], 'extra' => ['Hund']],
                            'ja' => ['sentence' => '私は猫を飼っています', 'correct' => ['私', 'は', '猫', 'を', '飼っています'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '나는 고양이를 키웁니다', 'correct' => ['나는', '고양이를', '키웁니다'], 'extra' => ['개']],
                            'fr' => ['sentence' => "J'ai un chat", 'correct' => ["j'ai", 'un', 'chat'], 'extra' => ['chien']],
                            'tr' => ['sentence' => 'bir kedim var', 'correct' => ['bir', 'kedim', 'var'], 'extra' => []],
                        'ru' => ['sentence' => 'у меня кот', 'correct' => ['у', 'меня', 'кот'], 'extra' => []],
                        'ar' => ['sentence' => 'عندي قط', 'correct' => ['عندي', 'قط'], 'extra' => []],
                        'az' => ['sentence' => 'məndə var bir pişik', 'correct' => ['məndə var', 'bir', 'pişik'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['I have', 'a', 'cat', 'and', 'a', 'dog'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Tengo un gato y un perro', 'correct' => ['tengo', 'un', 'gato', 'y', 'un', 'perro'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Ich habe eine Katze und einen Hund', 'correct' => ['ich habe', 'eine', 'Katze', 'und', 'einen', 'Hund'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => '私は猫と犬を飼っています', 'correct' => ['私', 'は', '猫', 'と', '犬', 'を', '飼っています'], 'extra' => ['家']],
                            'ko' => ['sentence' => '나는 고양이와 개를 키웁니다', 'correct' => ['나는', '고양이와', '개를', '키웁니다'], 'extra' => ['집']],
                            'fr' => ['sentence' => "J'ai un chat et un chien", 'correct' => ["j'ai", 'un', 'chat', 'et', 'un', 'chien'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'bir kedim ve bir köpeğim var', 'correct' => ['bir', 'kedim', 've', 'bir', 'köpeğim', 'var'], 'extra' => []],
                        'ru' => ['sentence' => 'у меня кот и собака', 'correct' => ['у', 'меня', 'кот', 'и', 'собака'], 'extra' => []],
                        'ar' => ['sentence' => 'عندي قط و كلب', 'correct' => ['عندي', 'قط', 'و', 'كلب'], 'extra' => []],
                        'az' => ['sentence' => 'məndə var bir pişik və bir it', 'correct' => ['məndə var', 'bir', 'pişik', 'və', 'bir', 'it'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Where Is It?', 4,
                pictures: [['en' => 'House', 'img' => 'house'], ['en' => 'Dog', 'img' => 'dog']],
                plain: [['en' => 'Where is'], ['en' => 'Under']],
                phrases: [
                    'a' => [
                        'words' => ['where is', 'the', 'dog'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dónde está el perro', 'correct' => ['dónde está', 'el', 'perro'], 'extra' => ['casa', 'debajo']],
                            'de' => ['sentence' => 'Wo ist der Hund', 'correct' => ['wo ist', 'der', 'Hund'], 'extra' => ['Haus', 'unter']],
                            'ja' => ['sentence' => '犬はどこですか', 'correct' => ['犬', 'は', 'どこですか'], 'extra' => ['家']],
                            'ko' => ['sentence' => '개는 어디입니까', 'correct' => ['개는', '어디입니까'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'Où est le chien', 'correct' => ['où est', 'le', 'chien'], 'extra' => ['maison', 'sous']],
                            'tr' => ['sentence' => 'köpek nerede', 'correct' => ['köpek', 'nerede'], 'extra' => []],
                        'ru' => ['sentence' => 'где собака', 'correct' => ['где', 'собака'], 'extra' => []],
                        'ar' => ['sentence' => 'أين كلب', 'correct' => ['أين', 'كلب'], 'extra' => []],
                        'az' => ['sentence' => 'harada it', 'correct' => ['harada', 'it'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'dog', 'under', 'the', 'table'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'El perro debajo de la mesa', 'correct' => ['el', 'perro', 'debajo', 'la', 'mesa'], 'extra' => ['dónde está']],
                            'de' => ['sentence' => 'Der Hund unter dem Tisch', 'correct' => ['der', 'Hund', 'unter', 'dem', 'Tisch'], 'extra' => ['wo ist']],
                            'ja' => ['sentence' => 'テーブルの下の犬', 'correct' => ['テーブル', 'の', '下', 'の', '犬'], 'extra' => ['どこですか']],
                            'ko' => ['sentence' => '탁자 아래의 개', 'correct' => ['탁자', '아래의', '개'], 'extra' => ['어디입니까']],
                            'fr' => ['sentence' => 'Le chien sous la table', 'correct' => ['le', 'chien', 'sous', 'la', 'table'], 'extra' => ['où est']],
                            'tr' => ['sentence' => 'masanın altındaki köpek', 'correct' => ['masanın', 'altındaki', 'köpek'], 'extra' => []],
                        'ru' => ['sentence' => 'собака под стол', 'correct' => ['собака', 'под', 'стол'], 'extra' => []],
                        'ar' => ['sentence' => 'كلب تحت طاولة', 'correct' => ['كلب', 'تحت', 'طاولة'], 'extra' => []],
                        'az' => ['sentence' => 'it altında masa', 'correct' => ['it', 'altında', 'masa'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['where is', 'the', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Dónde está la casa', 'correct' => ['dónde está', 'la', 'casa'], 'extra' => ['perro', 'debajo']],
                            'de' => ['sentence' => 'Wo ist das Haus', 'correct' => ['wo ist', 'das', 'Haus'], 'extra' => ['Hund', 'unter']],
                            'ja' => ['sentence' => '家はどこですか', 'correct' => ['家', 'は', 'どこですか'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '집은 어디입니까', 'correct' => ['집은', '어디입니까'], 'extra' => ['개']],
                            'fr' => ['sentence' => 'Où est la maison', 'correct' => ['où est', 'la', 'maison'], 'extra' => ['chien', 'sous']],
                            'tr' => ['sentence' => 'ev nerede', 'correct' => ['ev', 'nerede'], 'extra' => []],
                        'ru' => ['sentence' => 'где дом', 'correct' => ['где', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'أين بيت', 'correct' => ['أين', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'harada ev', 'correct' => ['harada', 'ev'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Here Is The House', 5,
                pictures: [['en' => 'House', 'img' => 'house'], ['en' => 'Chair', 'img' => 'chair']],
                plain: [['en' => 'Here is'], ['en' => 'My']],
                phrases: [
                    'a' => [
                        'words' => ['here is', 'my', 'house'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Aquí está mi casa', 'correct' => ['aquí está', 'mi', 'casa'], 'extra' => ['silla']],
                            'de' => ['sentence' => 'Hier ist mein Haus', 'correct' => ['hier ist', 'mein', 'Haus'], 'extra' => ['Stuhl']],
                            'ja' => ['sentence' => 'これが私の家です', 'correct' => ['これが', '私の', '家', 'です'], 'extra' => ['椅子']],
                            'ko' => ['sentence' => '여기 나의 집입니다', 'correct' => ['여기', '나의', '집입니다'], 'extra' => ['의자']],
                            'fr' => ['sentence' => 'Voici ma maison', 'correct' => ['voici', 'ma', 'maison'], 'extra' => ['chaise']],
                            'tr' => ['sentence' => 'işte evim', 'correct' => ['işte', 'evim'], 'extra' => []],
                        'ru' => ['sentence' => 'здесь мой дом', 'correct' => ['здесь', 'мой', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'هنا بيت', 'correct' => ['هنا', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'burada mənim ev', 'correct' => ['burada', 'mənim', 'ev'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['here is', 'my', 'chair'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Aquí está mi silla', 'correct' => ['aquí está', 'mi', 'silla'], 'extra' => ['casa']],
                            'de' => ['sentence' => 'Hier ist mein Stuhl', 'correct' => ['hier ist', 'mein', 'Stuhl'], 'extra' => ['Haus']],
                            'ja' => ['sentence' => 'これが私の椅子です', 'correct' => ['これが', '私の', '椅子', 'です'], 'extra' => ['家']],
                            'ko' => ['sentence' => '여기 나의 의자입니다', 'correct' => ['여기', '나의', '의자입니다'], 'extra' => ['집']],
                            'fr' => ['sentence' => 'Voici ma chaise', 'correct' => ['voici', 'ma', 'chaise'], 'extra' => ['maison']],
                            'tr' => ['sentence' => 'işte sandalyem', 'correct' => ['işte', 'sandalyem'], 'extra' => []],
                        'ru' => ['sentence' => 'здесь мой стул', 'correct' => ['здесь', 'мой', 'стул'], 'extra' => []],
                        'ar' => ['sentence' => 'هنا كرسي', 'correct' => ['هنا', 'كرسي'], 'extra' => []],
                        'az' => ['sentence' => 'burada mənim stul', 'correct' => ['burada', 'mənim', 'stul'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['my', 'house', 'and', 'my', 'chair'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Mi casa y mi silla', 'correct' => ['mi', 'casa', 'y', 'mi', 'silla'], 'extra' => ['aquí está']],
                            'de' => ['sentence' => 'Mein Haus und mein Stuhl', 'correct' => ['mein', 'Haus', 'und', 'mein', 'Stuhl'], 'extra' => ['hier ist']],
                            'ja' => ['sentence' => '私の家と私の椅子', 'correct' => ['私の', '家', 'と', '私の', '椅子'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '나의 집과 나의 의자', 'correct' => ['나의', '집과', '나의', '의자'], 'extra' => ['여기']],
                            'fr' => ['sentence' => 'Ma maison et ma chaise', 'correct' => ['ma', 'maison', 'et', 'ma', 'chaise'], 'extra' => ['voici']],
                            'tr' => ['sentence' => 'evim ve sandalyem', 'correct' => ['evim', 've', 'sandalyem'], 'extra' => []],
                        'ru' => ['sentence' => 'мой дом и мой стул', 'correct' => ['мой', 'дом', 'и', 'мой', 'стул'], 'extra' => []],
                        'ar' => ['sentence' => 'بيت و كرسي', 'correct' => ['بيت', 'و', 'كرسي'], 'extra' => []],
                        'az' => ['sentence' => 'mənim ev və mənim stul', 'correct' => ['mənim', 'ev', 'və', 'mənim', 'stul'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
