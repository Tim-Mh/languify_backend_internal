<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation10Seeder extends Seeder
{
    private const PICTURES = [
        'Cat' => 'cat', 'Dog' => 'dog', 'Coffee' => 'coffee', 'Tea' => 'tea',
        'Book' => 'book', 'House' => 'house',
    ];

    /**
     * English Chapter 2, Unit 10 — comparisons and preferences.
     *
     * The comparison words (more, less, like, same, better, worse) finally get
     * a reason to exist: two familiar things side by side, closing the chapter
     * on a full "a cat is better than a dog".
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, 'Unit 10: Comparisons & Preferences', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: More & Less', 1,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Tea', 'img' => 'tea']],
                plain: [['en' => 'More'], ['en' => 'Less']],
                phrases: [
                    'a' => [
                        'words' => ['more', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Más café', 'correct' => ['más', 'café'], 'extra' => ['menos', 'té']],
                            'de' => ['sentence' => 'Mehr Kaffee', 'correct' => ['mehr', 'Kaffee'], 'extra' => ['weniger', 'Tee']],
                            'ja' => ['sentence' => 'もっとコーヒー', 'correct' => ['もっと', 'コーヒー'], 'extra' => ['より少ない']],
                            'ko' => ['sentence' => '커피 더', 'correct' => ['커피', '더'], 'extra' => ['덜']],
                            'fr' => ['sentence' => 'Plus de café', 'correct' => ['plus', 'café'], 'extra' => ['moins', 'thé']],
                            'tr' => ['sentence' => 'daha çok kahve', 'correct' => ['daha', 'çok', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'больше кофе', 'correct' => ['больше', 'кофе'], 'extra' => []],
                        'ar' => ['sentence' => 'أكثر قهوة', 'correct' => ['أكثر', 'قهوة'], 'extra' => []],
                        'az' => ['sentence' => 'daha qəhvə', 'correct' => ['daha', 'qəhvə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['less', 'tea'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Menos té', 'correct' => ['menos', 'té'], 'extra' => ['más', 'café']],
                            'de' => ['sentence' => 'Weniger Tee', 'correct' => ['weniger', 'Tee'], 'extra' => ['mehr', 'Kaffee']],
                            'ja' => ['sentence' => 'お茶を少なく', 'correct' => ['お茶', 'を', '少なく'], 'extra' => ['もっと']],
                            'ko' => ['sentence' => '차 덜', 'correct' => ['차', '덜'], 'extra' => ['더']],
                            'fr' => ['sentence' => 'Moins de thé', 'correct' => ['moins', 'thé'], 'extra' => ['plus', 'café']],
                            'tr' => ['sentence' => 'daha az çay', 'correct' => ['daha', 'az', 'çay'], 'extra' => []],
                        'ru' => ['sentence' => 'меньше чай', 'correct' => ['меньше', 'чай'], 'extra' => []],
                        'ar' => ['sentence' => 'أقل شاي', 'correct' => ['أقل', 'شاي'], 'extra' => []],
                        'az' => ['sentence' => 'daha az çay', 'correct' => ['daha az', 'çay'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['more', 'coffee', 'and', 'less', 'tea'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Más café y menos té', 'correct' => ['más', 'café', 'y', 'menos', 'té'], 'extra' => ['mismo']],
                            'de' => ['sentence' => 'Mehr Kaffee und weniger Tee', 'correct' => ['mehr', 'Kaffee', 'und', 'weniger', 'Tee'], 'extra' => ['gleich']],
                            'ja' => ['sentence' => 'もっとコーヒーとお茶を少なく', 'correct' => ['もっと', 'コーヒー', 'と', 'お茶', 'を', '少なく'], 'extra' => ['同じ']],
                            'ko' => ['sentence' => '커피 더 그리고 차 덜', 'correct' => ['커피', '더', '그리고', '차', '덜'], 'extra' => ['같은']],
                            'fr' => ['sentence' => 'Plus de café et moins de thé', 'correct' => ['plus', 'café', 'et', 'moins', 'thé'], 'extra' => ['même']],
                            'tr' => ['sentence' => 'daha çok kahve ve daha az çay', 'correct' => ['daha', 'çok', 'kahve', 've', 'daha', 'az', 'çay'], 'extra' => []],
                        'ru' => ['sentence' => 'больше кофе и меньше чай', 'correct' => ['больше', 'кофе', 'и', 'меньше', 'чай'], 'extra' => []],
                        'ar' => ['sentence' => 'أكثر قهوة و أقل شاي', 'correct' => ['أكثر', 'قهوة', 'و', 'أقل', 'شاي'], 'extra' => []],
                        'az' => ['sentence' => 'daha qəhvə və daha az çay', 'correct' => ['daha', 'qəhvə', 'və', 'daha az', 'çay'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Like & Same', 2,
                pictures: [['en' => 'Cat', 'img' => 'cat'], ['en' => 'Dog', 'img' => 'dog']],
                plain: [['en' => 'Like'], ['en' => 'Same']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'cat', 'like', 'a', 'dog'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Un gato como un perro', 'correct' => ['un', 'gato', 'como', 'un', 'perro'], 'extra' => ['mismo']],
                            'de' => ['sentence' => 'Eine Katze wie ein Hund', 'correct' => ['eine', 'Katze', 'wie', 'ein', 'Hund'], 'extra' => ['gleich']],
                            'ja' => ['sentence' => '犬のような猫', 'correct' => ['犬', 'の', 'ような', '猫'], 'extra' => ['同じ']],
                            'ko' => ['sentence' => '개 같은 고양이', 'correct' => ['개', '같은', '고양이'], 'extra' => ['같은']],
                            'fr' => ['sentence' => 'Un chat comme un chien', 'correct' => ['un', 'chat', 'comme', 'un', 'chien'], 'extra' => ['même']],
                            'tr' => ['sentence' => 'bir köpek gibi bir kedi', 'correct' => ['bir', 'köpek', 'gibi', 'bir', 'kedi'], 'extra' => []],
                        'ru' => ['sentence' => 'кот нравится собака', 'correct' => ['кот', 'нравится', 'собака'], 'extra' => []],
                        'ar' => ['sentence' => 'قط يعجبني كلب', 'correct' => ['قط', 'يعجبني', 'كلب'], 'extra' => []],
                        'az' => ['sentence' => 'bir pişik xoşuma gəlir bir it', 'correct' => ['bir', 'pişik', 'xoşuma gəlir', 'bir', 'it'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'same', 'cat'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El mismo gato', 'correct' => ['el', 'mismo', 'gato'], 'extra' => ['como', 'perro']],
                            'de' => ['sentence' => 'Die gleiche Katze', 'correct' => ['die', 'gleich', 'Katze'], 'extra' => ['wie', 'Hund']],
                            'ja' => ['sentence' => '同じ猫', 'correct' => ['同じ', '猫'], 'extra' => ['のように']],
                            'ko' => ['sentence' => '같은 고양이', 'correct' => ['같은', '고양이'], 'extra' => ['처럼']],
                            'fr' => ['sentence' => 'Le même chat', 'correct' => ['le', 'même', 'chat'], 'extra' => ['comme', 'chien']],
                            'tr' => ['sentence' => 'aynı kedi', 'correct' => ['aynı', 'kedi'], 'extra' => []],
                        'ru' => ['sentence' => 'такой же кот', 'correct' => ['такой же', 'кот'], 'extra' => []],
                        'ar' => ['sentence' => 'نفسه قط', 'correct' => ['نفسه', 'قط'], 'extra' => []],
                        'az' => ['sentence' => 'eyni pişik', 'correct' => ['eyni', 'pişik'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'same', 'dog'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'El mismo perro', 'correct' => ['el', 'mismo', 'perro'], 'extra' => ['como', 'gato']],
                            'de' => ['sentence' => 'Der gleiche Hund', 'correct' => ['der', 'gleich', 'Hund'], 'extra' => ['wie', 'Katze']],
                            'ja' => ['sentence' => '同じ犬', 'correct' => ['同じ', '犬'], 'extra' => ['のように']],
                            'ko' => ['sentence' => '같은 개', 'correct' => ['같은', '개'], 'extra' => ['처럼']],
                            'fr' => ['sentence' => 'Le même chien', 'correct' => ['le', 'même', 'chien'], 'extra' => ['comme', 'chat']],
                            'tr' => ['sentence' => 'aynı köpek', 'correct' => ['aynı', 'köpek'], 'extra' => []],
                        'ru' => ['sentence' => 'такой же собака', 'correct' => ['такой же', 'собака'], 'extra' => []],
                        'ar' => ['sentence' => 'نفسه كلب', 'correct' => ['نفسه', 'كلب'], 'extra' => []],
                        'az' => ['sentence' => 'eyni it', 'correct' => ['eyni', 'it'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Better & Worse', 3,
                pictures: [['en' => 'Book', 'img' => 'book'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Better'], ['en' => 'Worse']],
                phrases: [
                    'a' => [
                        'words' => ['this', 'book', 'is', 'better'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Este libro es mejor', 'correct' => ['este', 'libro', 'es', 'mejor'], 'extra' => ['peor', 'casa']],
                            'de' => ['sentence' => 'Dieses Buch ist besser', 'correct' => ['dieser', 'Buch', 'ist', 'besser'], 'extra' => ['schlechter', 'Haus']],
                            'ja' => ['sentence' => 'この本の方が良い', 'correct' => ['この', '本', 'の', '方', 'が', '良い'], 'extra' => ['もっと悪い']],
                            'ko' => ['sentence' => '이 책이 더 좋다', 'correct' => ['이', '책이', '더', '좋다'], 'extra' => ['더 나쁜']],
                            'fr' => ['sentence' => 'Ce livre est meilleur', 'correct' => ['ce', 'livre', 'est', 'meilleur'], 'extra' => ['pire', 'maison']],
                            'tr' => ['sentence' => 'bu kitap daha iyi', 'correct' => ['bu', 'kitap', 'daha', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'это книга лучше', 'correct' => ['это', 'книга', 'лучше'], 'extra' => []],
                        'ar' => ['sentence' => 'هذا كتاب أحسن', 'correct' => ['هذا', 'كتاب', 'أحسن'], 'extra' => []],
                        'az' => ['sentence' => 'bu kitab daha yaxşı', 'correct' => ['bu', 'kitab', 'daha yaxşı'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['that', 'house', 'is', 'worse'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Esa casa es peor', 'correct' => ['ese', 'casa', 'es', 'peor'], 'extra' => ['mejor', 'libro']],
                            'de' => ['sentence' => 'Jenes Haus ist schlechter', 'correct' => ['jener', 'Haus', 'ist', 'schlechter'], 'extra' => ['besser', 'Buch']],
                            'ja' => ['sentence' => 'あの家の方が悪い', 'correct' => ['あの', '家', 'の', '方', 'が', '悪い'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '저 집이 더 나쁘다', 'correct' => ['저', '집이', '더', '나쁘다'], 'extra' => ['더 좋은']],
                            'fr' => ['sentence' => 'Cette maison est pire', 'correct' => ['cette', 'maison', 'est', 'pire'], 'extra' => ['meilleur', 'livre']],
                            'tr' => ['sentence' => 'o ev daha kötü', 'correct' => ['o', 'ev', 'daha', 'kötü'], 'extra' => []],
                        'ru' => ['sentence' => 'тот дом хуже', 'correct' => ['тот', 'дом', 'хуже'], 'extra' => []],
                        'ar' => ['sentence' => 'ذلك بيت أسوأ', 'correct' => ['ذلك', 'بيت', 'أسوأ'], 'extra' => []],
                        'az' => ['sentence' => 'o ev daha pis', 'correct' => ['o', 'ev', 'daha pis'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['better', 'or', 'worse'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Mejor o peor', 'correct' => ['mejor', 'o', 'peor'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Besser oder schlechter', 'correct' => ['besser', 'oder', 'schlechter'], 'extra' => ['Buch']],
                            'ja' => ['sentence' => '良いか悪い', 'correct' => ['良い', 'か', '悪い'], 'extra' => ['本']],
                            'ko' => ['sentence' => '더 좋거나 더 나쁜', 'correct' => ['더', '좋거나', '더', '나쁜'], 'extra' => ['책']],
                            'fr' => ['sentence' => 'Meilleur ou pire', 'correct' => ['meilleur', 'ou', 'pire'], 'extra' => ['livre']],
                            'tr' => ['sentence' => 'daha iyi veya daha kötü', 'correct' => ['daha', 'iyi', 'veya', 'daha', 'kötü'], 'extra' => []],
                        'ru' => ['sentence' => 'лучше или хуже', 'correct' => ['лучше', 'или', 'хуже'], 'extra' => []],
                        'ar' => ['sentence' => 'أحسن أو أسوأ', 'correct' => ['أحسن', 'أو', 'أسوأ'], 'extra' => []],
                        'az' => ['sentence' => 'daha yaxşı və ya daha pis', 'correct' => ['daha yaxşı', 'və ya', 'daha pis'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: As Much & Especially', 4,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Book', 'img' => 'book']],
                plain: [['en' => 'As much'], ['en' => 'Especially']],
                phrases: [
                    'a' => [
                        'words' => ['as much', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tanto café', 'correct' => ['tanto', 'café'], 'extra' => ['sobre todo', 'libro']],
                            'de' => ['sentence' => 'Genauso viel Kaffee', 'correct' => ['genauso viel', 'Kaffee'], 'extra' => ['besonders', 'Buch']],
                            'ja' => ['sentence' => '同じくらいのコーヒー', 'correct' => ['同じくらい', 'の', 'コーヒー'], 'extra' => ['特に']],
                            'ko' => ['sentence' => '그만큼의 커피', 'correct' => ['그만큼의', '커피'], 'extra' => ['특히']],
                            'fr' => ['sentence' => 'Autant de café', 'correct' => ['autant', 'café'], 'extra' => ['surtout', 'livre']],
                            'tr' => ['sentence' => 'bu kadar kahve', 'correct' => ['bu', 'kadar', 'kahve'], 'extra' => []],
                        'ru' => ['sentence' => 'столько же кофе', 'correct' => ['столько же', 'кофе'], 'extra' => []],
                        'ar' => ['sentence' => 'بقدر قهوة', 'correct' => ['بقدر', 'قهوة'], 'extra' => []],
                        'az' => ['sentence' => 'qədər qəhvə', 'correct' => ['qədər', 'qəhvə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['especially', 'the', 'book'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Sobre todo el libro', 'correct' => ['sobre todo', 'el', 'libro'], 'extra' => ['tanto', 'café']],
                            'de' => ['sentence' => 'Besonders das Buch', 'correct' => ['besonders', 'das', 'Buch'], 'extra' => ['genauso viel', 'Kaffee']],
                            'ja' => ['sentence' => '特にその本', 'correct' => ['特に', 'その', '本'], 'extra' => ['同じくらい']],
                            'ko' => ['sentence' => '특히 그 책', 'correct' => ['특히', '그', '책'], 'extra' => ['그만큼']],
                            'fr' => ['sentence' => 'Surtout le livre', 'correct' => ['surtout', 'le', 'livre'], 'extra' => ['autant', 'café']],
                            'tr' => ['sentence' => 'özellikle kitap', 'correct' => ['özellikle', 'kitap'], 'extra' => []],
                        'ru' => ['sentence' => 'особенно книга', 'correct' => ['особенно', 'книга'], 'extra' => []],
                        'ar' => ['sentence' => 'خاصة كتاب', 'correct' => ['خاصة', 'كتاب'], 'extra' => []],
                        'az' => ['sentence' => 'xüsusilə kitab', 'correct' => ['xüsusilə', 'kitab'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['as much', 'as', 'the', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Tanto como el café', 'correct' => ['tanto', 'como', 'el', 'café'], 'extra' => ['sobre todo']],
                            'de' => ['sentence' => 'Genauso viel wie der Kaffee', 'correct' => ['genauso viel', 'wie', 'der', 'Kaffee'], 'extra' => ['besonders']],
                            'ja' => ['sentence' => 'コーヒーと同じくらい', 'correct' => ['コーヒー', 'と', '同じくらい'], 'extra' => ['特に']],
                            'ko' => ['sentence' => '커피만큼', 'correct' => ['커피만큼'], 'extra' => ['특히']],
                            'fr' => ['sentence' => 'Autant que le café', 'correct' => ['autant', 'comme', 'le', 'café'], 'extra' => ['surtout']],
                            'tr' => ['sentence' => 'kahve kadar', 'correct' => ['kahve', 'kadar'], 'extra' => []],
                        'ru' => ['sentence' => 'столько же как кофе', 'correct' => ['столько же', 'как', 'кофе'], 'extra' => []],
                        'ar' => ['sentence' => 'بقدر كما قهوة', 'correct' => ['بقدر', 'كما', 'قهوة'], 'extra' => []],
                        'az' => ['sentence' => 'qədər kimi qəhvə', 'correct' => ['qədər', 'kimi', 'qəhvə'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: A Cat Is Better', 5,
                pictures: [['en' => 'Cat', 'img' => 'cat'], ['en' => 'Dog', 'img' => 'dog']],
                plain: [['en' => 'Better'], ['en' => 'I prefer']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'cat', 'is', 'better'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un gato es mejor', 'correct' => ['un', 'gato', 'es', 'mejor'], 'extra' => ['perro', 'prefiero']],
                            'de' => ['sentence' => 'Eine Katze ist besser', 'correct' => ['eine', 'Katze', 'ist', 'besser'], 'extra' => ['Hund', 'ich bevorzuge']],
                            'ja' => ['sentence' => '猫の方が良い', 'correct' => ['猫', 'の', '方', 'が', '良い'], 'extra' => ['犬']],
                            'ko' => ['sentence' => '고양이가 더 좋다', 'correct' => ['고양이가', '더', '좋다'], 'extra' => ['개']],
                            'fr' => ['sentence' => 'Un chat est meilleur', 'correct' => ['un', 'chat', 'est', 'meilleur'], 'extra' => ['chien', 'je préfère']],
                            'tr' => ['sentence' => 'bir kedi daha iyi', 'correct' => ['bir', 'kedi', 'daha', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'кот лучше', 'correct' => ['кот', 'лучше'], 'extra' => []],
                        'ar' => ['sentence' => 'قط أحسن', 'correct' => ['قط', 'أحسن'], 'extra' => []],
                        'az' => ['sentence' => 'bir pişik daha yaxşı', 'correct' => ['bir', 'pişik', 'daha yaxşı'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I prefer', 'the', 'dog'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Prefiero el perro', 'correct' => ['prefiero', 'el', 'perro'], 'extra' => ['mejor', 'gato']],
                            'de' => ['sentence' => 'Ich bevorzuge den Hund', 'correct' => ['ich bevorzuge', 'den', 'Hund'], 'extra' => ['besser', 'Katze']],
                            'ja' => ['sentence' => '私は犬を好む', 'correct' => ['私', 'は', '犬', 'を', '好む'], 'extra' => ['もっと良い']],
                            'ko' => ['sentence' => '나는 개를 선호한다', 'correct' => ['나는', '개를', '선호한다'], 'extra' => ['더 좋은']],
                            'fr' => ['sentence' => 'Je préfère le chien', 'correct' => ['je préfère', 'le', 'chien'], 'extra' => ['meilleur', 'chat']],
                            'tr' => ['sentence' => 'köpeği tercih ederim', 'correct' => ['köpeği', 'tercih', 'ederim'], 'extra' => []],
                        'ru' => ['sentence' => 'я предпочитаю собака', 'correct' => ['я', 'предпочитаю', 'собака'], 'extra' => []],
                        'ar' => ['sentence' => 'أفضل كلب', 'correct' => ['أفضل', 'كلب'], 'extra' => []],
                        'az' => ['sentence' => 'üstünlük verirəm it', 'correct' => ['üstünlük verirəm', 'it'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'cat', 'is', 'better', 'than', 'a', 'dog'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Un gato es mejor que un perro', 'correct' => ['un', 'gato', 'es', 'mejor', 'que', 'un', 'perro'], 'extra' => ['prefiero']],
                            'de' => ['sentence' => 'Eine Katze ist besser als ein Hund', 'correct' => ['eine', 'Katze', 'ist', 'besser', 'als', 'ein', 'Hund'], 'extra' => ['ich bevorzuge']],
                            'ja' => ['sentence' => '猫は犬より良い', 'correct' => ['猫', 'は', '犬', 'より', '良い'], 'extra' => ['私は好む']],
                            'ko' => ['sentence' => '고양이가 개보다 더 좋다', 'correct' => ['고양이가', '개보다', '더', '좋다'], 'extra' => ['나는 선호한다']],
                            'fr' => ['sentence' => "Un chat est meilleur qu'un chien", 'correct' => ['un', 'chat', 'est', 'meilleur', 'que', 'un', 'chien'], 'extra' => ['je préfère']],
                            'tr' => ['sentence' => 'bir kedi bir köpekten daha iyi', 'correct' => ['bir', 'kedi', 'bir', 'köpekten', 'daha', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'кот лучше чем собака', 'correct' => ['кот', 'лучше', 'чем', 'собака'], 'extra' => []],
                        'ar' => ['sentence' => 'قط أحسن من كلب', 'correct' => ['قط', 'أحسن', 'من', 'كلب'], 'extra' => []],
                        'az' => ['sentence' => 'bir pişik daha yaxşı dan bir it', 'correct' => ['bir', 'pişik', 'daha yaxşı', 'dan', 'bir', 'it'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
