<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitBeginner04Seeder extends Seeder
{
    private const PICTURES = [
        'Livre' => 'book', 'Table' => 'table', 'Maison' => 'house',
        'Chien' => 'dog', 'Chat' => 'cat', 'Chaise' => 'chair',
    ];

    /**
     * French Beginner Unit 4 — the home, and where things are.
     *
     * Lesson 1 deliberately pairs a masculine noun (livre) with a feminine one
     * (table) so that "le" and "la" can both be used and contrasted — teaching
     * them against two nouns of the same gender would hide the whole point.
     * The prepositions then let the learner describe a situation rather than
     * just name a thing.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Beginner)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 4, 'Unit 4: Home & Objects', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Book & The Table', 1,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'Table', 'img' => 'table']],
                plain: [['fr' => 'Le'], ['fr' => 'La']],
                phrases: [
                    'a' => [
                        'words' => ['la', 'table'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The table', 'correct' => ['the', 'table'], 'extra' => ['book', 'chair']],
                            'az' => ['sentence' => 'masa', 'correct' => ['masa'], 'extra' => ['kitab', 'stul']],
                            'ar' => ['sentence' => 'طاولة', 'correct' => ['طاولة'], 'extra' => ['كتاب', 'كرسي']],
                            'ru' => ['sentence' => 'стол', 'correct' => ['стол'], 'extra' => ['книга', 'стул']],
                            'es' => ['sentence' => 'La mesa', 'correct' => ['la', 'mesa'], 'extra' => ['libro', 'silla']],
                            'de' => ['sentence' => 'Der Tisch', 'correct' => ['der', 'Tisch'], 'extra' => ['Buch', 'Stuhl']],
                            'ja' => ['sentence' => 'テーブル', 'correct' => ['テーブル'], 'extra' => ['本', '椅子']],
                            'ko' => ['sentence' => '탁자', 'correct' => ['탁자'], 'extra' => ['책', '의자']],
                            'tr' => ['sentence' => 'masa', 'correct' => ['masa'], 'extra' => ['kitap', 'sandalye']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'livre'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'The book', 'correct' => ['the', 'book'], 'extra' => ['table', 'chair']],
                            'az' => ['sentence' => 'kitab', 'correct' => ['kitab'], 'extra' => ['masa', 'stul']],
                            'ar' => ['sentence' => 'كتاب', 'correct' => ['كتاب'], 'extra' => ['طاولة', 'كرسي']],
                            'ru' => ['sentence' => 'книга', 'correct' => ['книга'], 'extra' => ['стол', 'стул']],
                            'es' => ['sentence' => 'El libro', 'correct' => ['el', 'libro'], 'extra' => ['mesa', 'silla']],
                            'de' => ['sentence' => 'Das Buch', 'correct' => ['das', 'Buch'], 'extra' => ['Tisch', 'Stuhl']],
                            'ja' => ['sentence' => '本', 'correct' => ['本'], 'extra' => ['テーブル', '椅子']],
                            'ko' => ['sentence' => '책', 'correct' => ['책'], 'extra' => ['탁자', '의자']],
                            'tr' => ['sentence' => 'kitap', 'correct' => ['kitap'], 'extra' => ['masa', 'sandalye']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'livre', 'et', 'la', 'table'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The book and the table', 'correct' => ['the', 'book', 'and', 'the', 'table'], 'extra' => ['chair']],
                            'az' => ['sentence' => 'kitab və masa', 'correct' => ['kitab', 'və', 'masa'], 'extra' => ['stul']],
                            'ar' => ['sentence' => 'كتاب و طاولة', 'correct' => ['كتاب', 'و', 'طاولة'], 'extra' => ['كرسي']],
                            'ru' => ['sentence' => 'книга и стол', 'correct' => ['книга', 'и', 'стол'], 'extra' => ['стул']],
                            'es' => ['sentence' => 'El libro y la mesa', 'correct' => ['el', 'libro', 'y', 'la', 'mesa'], 'extra' => ['silla']],
                            'de' => ['sentence' => 'Das Buch und der Tisch', 'correct' => ['das', 'Buch', 'und', 'der', 'Tisch'], 'extra' => ['Stuhl']],
                            'ja' => ['sentence' => '本とテーブル', 'correct' => ['本', 'と', 'テーブル'], 'extra' => ['椅子']],
                            'ko' => ['sentence' => '책과 탁자', 'correct' => ['책과', '탁자'], 'extra' => ['의자']],
                            'tr' => ['sentence' => 'kitap ve masa', 'correct' => ['kitap', 've', 'masa'], 'extra' => ['sandalye']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: In & On', 2,
                pictures: [['fr' => 'Maison', 'img' => 'house'], ['fr' => 'Chien', 'img' => 'dog']],
                plain: [['fr' => 'Dans'], ['fr' => 'Sur']],
                phrases: [
                    'a' => [
                        'words' => ['dans', 'la', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'In the house', 'correct' => ['in', 'the', 'house'], 'extra' => ['on', 'dog']],
                            'az' => ['sentence' => 'içində ev', 'correct' => ['içində', 'ev'], 'extra' => ['üzərində', 'it']],
                            'ar' => ['sentence' => 'في بيت', 'correct' => ['في', 'بيت'], 'extra' => ['على', 'كلب']],
                            'ru' => ['sentence' => 'в дом', 'correct' => ['в', 'дом'], 'extra' => ['на', 'собака']],
                            'es' => ['sentence' => 'En la casa', 'correct' => ['en', 'la', 'casa'], 'extra' => ['sobre', 'perro']],
                            'de' => ['sentence' => 'Im Haus', 'correct' => ['im', 'Haus'], 'extra' => ['auf', 'Hund']],
                            'ja' => ['sentence' => '家の中に', 'correct' => ['家', 'の中に'], 'extra' => ['の上に', '犬']],
                            'ko' => ['sentence' => '집 안에', 'correct' => ['집', '안에'], 'extra' => ['위에', '개']],
                            'tr' => ['sentence' => 'evde', 'correct' => ['evde'], 'extra' => ['üzerinde', 'köpek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sur', 'la', 'table'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'On the table', 'correct' => ['on', 'the', 'table'], 'extra' => ['in', 'house']],
                            'az' => ['sentence' => 'üzərində masa', 'correct' => ['üzərində', 'masa'], 'extra' => ['içində', 'ev']],
                            'ar' => ['sentence' => 'على طاولة', 'correct' => ['على', 'طاولة'], 'extra' => ['في', 'بيت']],
                            'ru' => ['sentence' => 'на стол', 'correct' => ['на', 'стол'], 'extra' => ['в', 'дом']],
                            'es' => ['sentence' => 'Sobre la mesa', 'correct' => ['sobre', 'la', 'mesa'], 'extra' => ['en', 'casa']],
                            'de' => ['sentence' => 'Auf dem Tisch', 'correct' => ['auf', 'dem', 'Tisch'], 'extra' => ['im', 'Haus']],
                            'ja' => ['sentence' => 'テーブルの上に', 'correct' => ['テーブル', 'の上に'], 'extra' => ['の中に', '家']],
                            'ko' => ['sentence' => '탁자 위에', 'correct' => ['탁자', '위에'], 'extra' => ['안에', '집']],
                            'tr' => ['sentence' => 'masada', 'correct' => ['masada'], 'extra' => ['içinde', 'ev']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'chien', 'dans', 'la', 'maison'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The dog in the house', 'correct' => ['the', 'dog', 'in', 'the', 'house'], 'extra' => ['cat']],
                            'az' => ['sentence' => 'it içində ev', 'correct' => ['it', 'içində', 'ev'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'كلب في بيت', 'correct' => ['كلب', 'في', 'بيت'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'собака в дом', 'correct' => ['собака', 'в', 'дом'], 'extra' => ['кот']],
                            'es' => ['sentence' => 'El perro en la casa', 'correct' => ['el', 'perro', 'en', 'la', 'casa'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Der Hund im Haus', 'correct' => ['der', 'Hund', 'im', 'Haus'], 'extra' => ['Katze']],
                            'ja' => ['sentence' => '家の中の犬', 'correct' => ['家', 'の', '中', 'の', '犬'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '집 안의 개', 'correct' => ['집', '안의', '개'], 'extra' => ['고양이']],
                            'tr' => ['sentence' => 'evdeki köpek', 'correct' => ['evdeki', 'köpek'], 'extra' => ['kedi']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: I Have A Cat', 3,
                pictures: [['fr' => 'Chat', 'img' => 'cat'], ['fr' => 'Chaise', 'img' => 'chair']],
                plain: [['fr' => "J'ai"], ['fr' => 'Sous']],
                phrases: [
                    'a' => [
                        'words' => ["j'ai", 'un', 'chat'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I have a cat', 'correct' => ['I', 'have', 'a', 'cat'], 'extra' => ['dog']],
                            'az' => ['sentence' => 'mən var bir pişik', 'correct' => ['mən', 'var', 'bir', 'pişik'], 'extra' => ['it']],
                            'ar' => ['sentence' => 'أنا عند قط', 'correct' => ['أنا', 'عند', 'قط'], 'extra' => ['كلب']],
                            'ru' => ['sentence' => 'я есть кот', 'correct' => ['я', 'есть', 'кот'], 'extra' => ['собака']],
                            'es' => ['sentence' => 'Tengo un gato', 'correct' => ['tengo', 'un', 'gato'], 'extra' => ['perro']],
                            'de' => ['sentence' => 'Ich habe eine Katze', 'correct' => ['ich', 'habe', 'eine', 'Katze'], 'extra' => ['Hund']],
                            'ja' => ['sentence' => '猫を持っている', 'correct' => ['猫', 'を', '持って', 'いる'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '나는 고양이가 있다', 'correct' => ['나는', '고양이가', '있다'], 'extra' => ['개']],
                            'tr' => ['sentence' => 'bir kedim var', 'correct' => ['bir', 'kedim', 'var'], 'extra' => ['köpek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['sous', 'la', 'chaise'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Under the chair', 'correct' => ['under', 'the', 'chair'], 'extra' => ['table', 'cat']],
                            'az' => ['sentence' => 'altında stul', 'correct' => ['altında', 'stul'], 'extra' => ['masa', 'pişik']],
                            'ar' => ['sentence' => 'تحت كرسي', 'correct' => ['تحت', 'كرسي'], 'extra' => ['طاولة', 'قط']],
                            'ru' => ['sentence' => 'под стул', 'correct' => ['под', 'стул'], 'extra' => ['стол', 'кот']],
                            'es' => ['sentence' => 'Debajo de la silla', 'correct' => ['debajo', 'de', 'la', 'silla'], 'extra' => ['mesa']],
                            'de' => ['sentence' => 'Unter dem Stuhl', 'correct' => ['unter', 'dem', 'Stuhl'], 'extra' => ['Tisch', 'Katze']],
                            'ja' => ['sentence' => '椅子の下に', 'correct' => ['椅子', 'の下に'], 'extra' => ['テーブル', '猫']],
                            'ko' => ['sentence' => '의자 아래에', 'correct' => ['의자', '아래에'], 'extra' => ['탁자', '고양이']],
                            'tr' => ['sentence' => 'sandalyenin altında', 'correct' => ['sandalyenin', 'altında'], 'extra' => ['masa', 'kedi']],
                        ],
                    ],
                    'c' => [
                        'words' => ["j'ai", 'un', 'chat', 'sous', 'la', 'chaise'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I have a cat under the chair', 'correct' => ['I', 'have', 'a', 'cat', 'under', 'the', 'chair'], 'extra' => ['dog']],
                            'az' => ['sentence' => 'mən var bir pişik altında stul', 'correct' => ['mən', 'var', 'bir', 'pişik', 'altında', 'stul'], 'extra' => ['it']],
                            'ar' => ['sentence' => 'أنا عند قط تحت كرسي', 'correct' => ['أنا', 'عند', 'قط', 'تحت', 'كرسي'], 'extra' => ['كلب']],
                            'ru' => ['sentence' => 'я есть кот под стул', 'correct' => ['я', 'есть', 'кот', 'под', 'стул'], 'extra' => ['собака']],
                            'es' => ['sentence' => 'Tengo un gato debajo de la silla', 'correct' => ['tengo', 'un', 'gato', 'debajo', 'de', 'la', 'silla'], 'extra' => ['perro']],
                            'de' => ['sentence' => 'Ich habe eine Katze unter dem Stuhl', 'correct' => ['ich', 'habe', 'eine', 'Katze', 'unter', 'dem', 'Stuhl'], 'extra' => ['Hund']],
                            'ja' => ['sentence' => '椅子の下に猫を持っている', 'correct' => ['椅子', 'の下に', '猫', 'を', '持って', 'いる'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '의자 아래에 고양이가 있다', 'correct' => ['의자', '아래에', '고양이가', '있다'], 'extra' => ['개']],
                            'tr' => ['sentence' => 'sandalyenin altında bir kedim var', 'correct' => ['sandalyenin', 'altında', 'bir', 'kedim', 'var'], 'extra' => ['köpek']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Where Is It?', 4,
                pictures: [['fr' => 'Chien', 'img' => 'dog'], ['fr' => 'Table', 'img' => 'table']],
                plain: [['fr' => 'Où'], ['fr' => 'Ici']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'chien', 'est', 'ici'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The dog is here', 'correct' => ['the', 'dog', 'is', 'here'], 'extra' => ['where']],
                            'az' => ['sentence' => 'it burada', 'correct' => ['it', 'burada'], 'extra' => ['harada']],
                            'ar' => ['sentence' => 'كلب هنا', 'correct' => ['كلب', 'هنا'], 'extra' => ['أين']],
                            'ru' => ['sentence' => 'собака здесь', 'correct' => ['собака', 'здесь'], 'extra' => ['где']],
                            'es' => ['sentence' => 'El perro está aquí', 'correct' => ['el', 'perro', 'está', 'aquí'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Der Hund ist hier', 'correct' => ['der', 'Hund', 'ist', 'hier'], 'extra' => ['wo']],
                            'ja' => ['sentence' => '犬はここにいる', 'correct' => ['犬', 'は', 'ここ', 'に', 'いる'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '개는 여기에 있다', 'correct' => ['개는', '여기에', '있다'], 'extra' => ['어디']],
                            'tr' => ['sentence' => 'köpek burada', 'correct' => ['köpek', 'burada'], 'extra' => ['nerede']],
                        ],
                    ],
                    'b' => [
                        'words' => ['où', 'est', 'la', 'table'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Where is the table', 'correct' => ['where', 'is', 'the', 'table'], 'extra' => ['here']],
                            'az' => ['sentence' => 'harada masa', 'correct' => ['harada', 'masa'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'أين طاولة', 'correct' => ['أين', 'طاولة'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'где стол', 'correct' => ['где', 'стол'], 'extra' => ['здесь']],
                            'es' => ['sentence' => 'Dónde está la mesa', 'correct' => ['dónde', 'está', 'la', 'mesa'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Wo ist der Tisch', 'correct' => ['wo', 'ist', 'der', 'Tisch'], 'extra' => ['hier']],
                            'ja' => ['sentence' => 'テーブルはどこですか', 'correct' => ['テーブル', 'は', 'どこですか'], 'extra' => ['ここ']],
                            'ko' => ['sentence' => '탁자는 어디에 있습니까', 'correct' => ['탁자는', '어디에', '있습니까'], 'extra' => ['여기']],
                            'tr' => ['sentence' => 'masa nerede', 'correct' => ['masa', 'nerede'], 'extra' => ['burada']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'table', 'est', 'ici', 'et', 'le', 'chien', 'aussi'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The table is here and the dog too', 'correct' => ['the', 'table', 'is', 'here', 'and', 'the', 'dog', 'too'], 'extra' => ['where']],
                            'az' => ['sentence' => 'masa burada və it də', 'correct' => ['masa', 'burada', 'və', 'it', 'də'], 'extra' => ['harada']],
                            'ar' => ['sentence' => 'طاولة هنا و كلب أيضا', 'correct' => ['طاولة', 'هنا', 'و', 'كلب', 'أيضا'], 'extra' => ['أين']],
                            'ru' => ['sentence' => 'стол здесь и собака тоже', 'correct' => ['стол', 'здесь', 'и', 'собака', 'тоже'], 'extra' => ['где']],
                            'es' => ['sentence' => 'La mesa está aquí y el perro también', 'correct' => ['la', 'mesa', 'está', 'aquí', 'y', 'el', 'perro', 'también'], 'extra' => ['dónde']],
                            'de' => ['sentence' => 'Der Tisch ist hier und der Hund auch', 'correct' => ['der', 'Tisch', 'ist', 'hier', 'und', 'der', 'Hund', 'auch'], 'extra' => ['wo']],
                            'ja' => ['sentence' => 'テーブルはここにあり犬もいる', 'correct' => ['テーブル', 'は', 'ここ', 'に', 'あり', '犬', 'も', 'いる'], 'extra' => ['どこ']],
                            'ko' => ['sentence' => '탁자는 여기에 있고 개도 있다', 'correct' => ['탁자는', '여기에', '있고', '개도', '있다'], 'extra' => ['어디']],
                            'tr' => ['sentence' => 'masa burada ve köpek de', 'correct' => ['masa', 'burada', 've', 'köpek', 'de'], 'extra' => ['nerede']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Here Is The House', 5,
                pictures: [['fr' => 'Maison', 'img' => 'house'], ['fr' => 'Chat', 'img' => 'cat']],
                plain: [['fr' => 'Voici'], ['fr' => 'Là']],
                phrases: [
                    'a' => [
                        'words' => ['voici', 'la', 'maison'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Here is the house', 'correct' => ['here', 'is', 'the', 'house'], 'extra' => ['cat']],
                            'az' => ['sentence' => 'burada ev', 'correct' => ['burada', 'ev'], 'extra' => ['pişik']],
                            'ar' => ['sentence' => 'هنا بيت', 'correct' => ['هنا', 'بيت'], 'extra' => ['قط']],
                            'ru' => ['sentence' => 'здесь дом', 'correct' => ['здесь', 'дом'], 'extra' => ['кот']],
                            'es' => ['sentence' => 'Aquí está la casa', 'correct' => ['aquí', 'está', 'la', 'casa'], 'extra' => ['gato']],
                            'de' => ['sentence' => 'Hier ist das Haus', 'correct' => ['hier', 'ist', 'das', 'Haus'], 'extra' => ['Katze']],
                            'ja' => ['sentence' => 'これが家です', 'correct' => ['これが', '家', 'です'], 'extra' => ['猫']],
                            'ko' => ['sentence' => '여기 집이 있다', 'correct' => ['여기', '집이', '있다'], 'extra' => ['고양이']],
                            'tr' => ['sentence' => 'işte ev', 'correct' => ['işte', 'ev'], 'extra' => ['kedi']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'chat', 'est', 'là'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The cat is there', 'correct' => ['the', 'cat', 'is', 'there'], 'extra' => ['here']],
                            'az' => ['sentence' => 'pişik orada', 'correct' => ['pişik', 'orada'], 'extra' => ['burada']],
                            'ar' => ['sentence' => 'قط هناك', 'correct' => ['قط', 'هناك'], 'extra' => ['هنا']],
                            'ru' => ['sentence' => 'кот там', 'correct' => ['кот', 'там'], 'extra' => ['здесь']],
                            'es' => ['sentence' => 'El gato está allí', 'correct' => ['el', 'gato', 'está', 'allí'], 'extra' => ['aquí']],
                            'de' => ['sentence' => 'Die Katze ist dort', 'correct' => ['die', 'Katze', 'ist', 'dort'], 'extra' => ['hier']],
                            'ja' => ['sentence' => '猫はそこにいる', 'correct' => ['猫', 'は', 'そこ', 'に', 'いる'], 'extra' => ['ここ']],
                            'ko' => ['sentence' => '고양이는 거기에 있다', 'correct' => ['고양이는', '거기에', '있다'], 'extra' => ['여기']],
                            'tr' => ['sentence' => 'kedi orada', 'correct' => ['kedi', 'orada'], 'extra' => ['burada']],
                        ],
                    ],
                    'c' => [
                        'words' => ['voici', 'le', 'chat', 'et', 'la', 'maison'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Here is the cat and the house', 'correct' => ['here', 'is', 'the', 'cat', 'and', 'the', 'house'], 'extra' => ['dog']],
                            'az' => ['sentence' => 'burada pişik və ev', 'correct' => ['burada', 'pişik', 'və', 'ev'], 'extra' => ['it']],
                            'ar' => ['sentence' => 'هنا قط و بيت', 'correct' => ['هنا', 'قط', 'و', 'بيت'], 'extra' => ['كلب']],
                            'ru' => ['sentence' => 'здесь кот и дом', 'correct' => ['здесь', 'кот', 'и', 'дом'], 'extra' => ['собака']],
                            'es' => ['sentence' => 'Aquí está el gato y la casa', 'correct' => ['aquí', 'está', 'el', 'gato', 'y', 'la', 'casa'], 'extra' => ['perro']],
                            'de' => ['sentence' => 'Hier ist die Katze und das Haus', 'correct' => ['hier', 'ist', 'die', 'Katze', 'und', 'das', 'Haus'], 'extra' => ['Hund']],
                            'ja' => ['sentence' => 'これが猫と家です', 'correct' => ['これが', '猫', 'と', '家', 'です'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '여기 고양이와 집이 있다', 'correct' => ['여기', '고양이와', '집이', '있다'], 'extra' => ['개']],
                            'tr' => ['sentence' => 'işte kedi ve ev', 'correct' => ['işte', 'kedi', 've', 'ev'], 'extra' => ['köpek']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
