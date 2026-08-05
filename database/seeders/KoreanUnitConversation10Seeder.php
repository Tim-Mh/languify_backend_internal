<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitConversation10Seeder extends Seeder
{
    private const PICTURES = ['커피' => 'coffee', '차' => 'tea', '고양이' => 'cat', '개' => 'dog', '책' => 'book', '집' => 'house'];

    /**
     * Korean Conversation, Unit 10, the Korean twin of the English "Comparisons & Preferences" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 10, '유닛 10: 비교와 선호', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 커피 · 차', 1,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '차', 'img' => 'tea']],
                plain: [['ko' => '더'], ['ko' => '덜']],
                phrases: [
                    'a' => [
                        'words' => ['커피', '더'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'more coffee', 'correct' => ['more', 'coffee'], 'extra' => ['less']],
                            'es' => ['sentence' => 'Más café', 'correct' => ['más', 'café'], 'extra' => ['menos', 'té']],
                            'de' => ['sentence' => 'Mehr Kaffee', 'correct' => ['mehr', 'Kaffee'], 'extra' => ['weniger', 'Tee']],
                            'fr' => ['sentence' => 'Plus de café', 'correct' => ['plus', 'café'], 'extra' => ['moins', 'thé']],
                            'ja' => ['sentence' => 'もっとコーヒー', 'correct' => ['もっと', 'コーヒー'], 'extra' => ['より少ない']],
                        ],
                    ],
                    'b' => [
                        'words' => ['차', '덜'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'less tea', 'correct' => ['less', 'tea'], 'extra' => ['more']],
                            'es' => ['sentence' => 'Menos té', 'correct' => ['menos', 'té'], 'extra' => ['más', 'café']],
                            'de' => ['sentence' => 'Weniger Tee', 'correct' => ['weniger', 'Tee'], 'extra' => ['mehr', 'Kaffee']],
                            'fr' => ['sentence' => 'Moins de thé', 'correct' => ['moins', 'thé'], 'extra' => ['plus', 'café']],
                            'ja' => ['sentence' => 'お茶を少なく', 'correct' => ['お茶', 'を', '少なく'], 'extra' => ['もっと']],
                        ],
                    ],
                    'c' => [
                        'words' => ['커피', '더', '그리고', '차', '덜'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'more coffee and less tea', 'correct' => ['more', 'coffee', 'and', 'less', 'tea'], 'extra' => ['same']],
                            'es' => ['sentence' => 'Más café y menos té', 'correct' => ['más', 'café', 'y', 'menos', 'té'], 'extra' => ['mismo']],
                            'de' => ['sentence' => 'Mehr Kaffee und weniger Tee', 'correct' => ['mehr', 'Kaffee', 'und', 'weniger', 'Tee'], 'extra' => ['gleich']],
                            'fr' => ['sentence' => 'Plus de café et moins de thé', 'correct' => ['plus', 'café', 'et', 'moins', 'thé'], 'extra' => ['même']],
                            'ja' => ['sentence' => 'もっとコーヒーとお茶を少なく', 'correct' => ['もっと', 'コーヒー', 'と', 'お茶', 'を', '少なく'], 'extra' => ['同じ']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 고양이 · 개', 2,
                pictures: [['ko' => '고양이', 'img' => 'cat'], ['ko' => '개', 'img' => 'dog']],
                plain: [['ko' => '처럼'], ['ko' => '같은']],
                phrases: [
                    'a' => [
                        'words' => ['개', '같은', '고양이'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a cat like a dog', 'correct' => ['a', 'cat', 'like', 'a', 'dog'], 'extra' => ['same']],
                            'es' => ['sentence' => 'Un gato como un perro', 'correct' => ['un', 'gato', 'como', 'un', 'perro'], 'extra' => ['mismo']],
                            'de' => ['sentence' => 'Eine Katze wie ein Hund', 'correct' => ['eine', 'Katze', 'wie', 'ein', 'Hund'], 'extra' => ['gleich']],
                            'fr' => ['sentence' => 'Un chat comme un chien', 'correct' => ['un', 'chat', 'comme', 'un', 'chien'], 'extra' => ['même']],
                            'ja' => ['sentence' => '犬のような猫', 'correct' => ['犬', 'の', 'ような', '猫'], 'extra' => ['同じ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['같은', '고양이'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the same cat', 'correct' => ['the', 'same', 'cat'], 'extra' => ['like']],
                            'es' => ['sentence' => 'El mismo gato', 'correct' => ['el', 'mismo', 'gato'], 'extra' => ['como', 'perro']],
                            'de' => ['sentence' => 'Die gleiche Katze', 'correct' => ['die', 'gleich', 'Katze'], 'extra' => ['wie', 'Hund']],
                            'fr' => ['sentence' => 'Le même chat', 'correct' => ['le', 'même', 'chat'], 'extra' => ['comme', 'chien']],
                            'ja' => ['sentence' => '同じ猫', 'correct' => ['同じ', '猫'], 'extra' => ['のように']],
                        ],
                    ],
                    'c' => [
                        'words' => ['같은', '개'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'the same dog', 'correct' => ['the', 'same', 'dog'], 'extra' => ['like']],
                            'es' => ['sentence' => 'El mismo perro', 'correct' => ['el', 'mismo', 'perro'], 'extra' => ['como', 'gato']],
                            'de' => ['sentence' => 'Der gleiche Hund', 'correct' => ['der', 'gleich', 'Hund'], 'extra' => ['wie', 'Katze']],
                            'fr' => ['sentence' => 'Le même chien', 'correct' => ['le', 'même', 'chien'], 'extra' => ['comme', 'chat']],
                            'ja' => ['sentence' => '同じ犬', 'correct' => ['同じ', '犬'], 'extra' => ['のように']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 책 · 집', 3,
                pictures: [['ko' => '책', 'img' => 'book'], ['ko' => '집', 'img' => 'house']],
                plain: [['ko' => '더 좋은'], ['ko' => '더 나쁜']],
                phrases: [
                    'a' => [
                        'words' => ['이', '책이', '더', '좋다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'this book is better', 'correct' => ['this', 'book', 'is', 'better'], 'extra' => ['worse']],
                            'es' => ['sentence' => 'Este libro es mejor', 'correct' => ['este', 'libro', 'es', 'mejor'], 'extra' => ['peor', 'casa']],
                            'de' => ['sentence' => 'Dieses Buch ist besser', 'correct' => ['dieser', 'Buch', 'ist', 'besser'], 'extra' => ['schlechter', 'Haus']],
                            'fr' => ['sentence' => 'Ce livre est meilleur', 'correct' => ['ce', 'livre', 'est', 'meilleur'], 'extra' => ['pire', 'maison']],
                            'ja' => ['sentence' => 'この本の方が良い', 'correct' => ['この', '本', 'の', '方', 'が', '良い'], 'extra' => ['もっと悪い']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저', '집이', '더', '나쁘다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'that house is worse', 'correct' => ['that', 'house', 'is', 'worse'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Esa casa es peor', 'correct' => ['ese', 'casa', 'es', 'peor'], 'extra' => ['mejor', 'libro']],
                            'de' => ['sentence' => 'Jenes Haus ist schlechter', 'correct' => ['jener', 'Haus', 'ist', 'schlechter'], 'extra' => ['besser', 'Buch']],
                            'fr' => ['sentence' => 'Cette maison est pire', 'correct' => ['cette', 'maison', 'est', 'pire'], 'extra' => ['meilleur', 'livre']],
                            'ja' => ['sentence' => 'あの家の方が悪い', 'correct' => ['あの', '家', 'の', '方', 'が', '悪い'], 'extra' => ['もっと良い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['더', '좋거나', '더', '나쁜'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'better or worse', 'correct' => ['better', 'or', 'worse'], 'extra' => ['book']],
                            'es' => ['sentence' => 'Mejor o peor', 'correct' => ['mejor', 'o', 'peor'], 'extra' => ['libro']],
                            'de' => ['sentence' => 'Besser oder schlechter', 'correct' => ['besser', 'oder', 'schlechter'], 'extra' => ['Buch']],
                            'fr' => ['sentence' => 'Meilleur ou pire', 'correct' => ['meilleur', 'ou', 'pire'], 'extra' => ['livre']],
                            'ja' => ['sentence' => '良いか悪い', 'correct' => ['良い', 'か', '悪い'], 'extra' => ['本']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 커피 · 책', 4,
                pictures: [['ko' => '커피', 'img' => 'coffee'], ['ko' => '책', 'img' => 'book']],
                plain: [['ko' => '그만큼'], ['ko' => '특히']],
                phrases: [
                    'a' => [
                        'words' => ['그만큼의', '커피'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'as much coffee', 'correct' => ['as much', 'coffee'], 'extra' => ['especially']],
                            'es' => ['sentence' => 'Tanto café', 'correct' => ['tanto', 'café'], 'extra' => ['sobre todo', 'libro']],
                            'de' => ['sentence' => 'Genauso viel Kaffee', 'correct' => ['genauso viel', 'Kaffee'], 'extra' => ['besonders', 'Buch']],
                            'fr' => ['sentence' => 'Autant de café', 'correct' => ['autant', 'café'], 'extra' => ['surtout', 'livre']],
                            'ja' => ['sentence' => '同じくらいのコーヒー', 'correct' => ['同じくらい', 'の', 'コーヒー'], 'extra' => ['特に']],
                        ],
                    ],
                    'b' => [
                        'words' => ['특히', '그', '책'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'especially the book', 'correct' => ['especially', 'the', 'book'], 'extra' => ['as much']],
                            'es' => ['sentence' => 'Sobre todo el libro', 'correct' => ['sobre todo', 'el', 'libro'], 'extra' => ['tanto', 'café']],
                            'de' => ['sentence' => 'Besonders das Buch', 'correct' => ['besonders', 'das', 'Buch'], 'extra' => ['genauso viel', 'Kaffee']],
                            'fr' => ['sentence' => 'Surtout le livre', 'correct' => ['surtout', 'le', 'livre'], 'extra' => ['autant', 'café']],
                            'ja' => ['sentence' => '特にその本', 'correct' => ['特に', 'その', '本'], 'extra' => ['同じくらい']],
                        ],
                    ],
                    'c' => [
                        'words' => ['커피만큼'],
                        'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'as much as the coffee', 'correct' => ['as much', 'as', 'the', 'coffee'], 'extra' => ['especially']],
                            'es' => ['sentence' => 'Tanto como el café', 'correct' => ['tanto', 'como', 'el', 'café'], 'extra' => ['sobre todo']],
                            'de' => ['sentence' => 'Genauso viel wie der Kaffee', 'correct' => ['genauso viel', 'wie', 'der', 'Kaffee'], 'extra' => ['besonders']],
                            'fr' => ['sentence' => 'Autant que le café', 'correct' => ['autant', 'comme', 'le', 'café'], 'extra' => ['surtout']],
                            'ja' => ['sentence' => 'コーヒーと同じくらい', 'correct' => ['コーヒー', 'と', '同じくらい'], 'extra' => ['特に']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 고양이 · 개', 5,
                pictures: [['ko' => '고양이', 'img' => 'cat'], ['ko' => '개', 'img' => 'dog']],
                plain: [['ko' => '더 좋은'], ['ko' => '나는 선호한다']],
                phrases: [
                    'a' => [
                        'words' => ['고양이가', '더', '좋다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a cat is better', 'correct' => ['a', 'cat', 'is', 'better'], 'extra' => ['dog']],
                            'es' => ['sentence' => 'Un gato es mejor', 'correct' => ['un', 'gato', 'es', 'mejor'], 'extra' => ['perro', 'prefiero']],
                            'de' => ['sentence' => 'Eine Katze ist besser', 'correct' => ['eine', 'Katze', 'ist', 'besser'], 'extra' => ['Hund', 'ich bevorzuge']],
                            'fr' => ['sentence' => 'Un chat est meilleur', 'correct' => ['un', 'chat', 'est', 'meilleur'], 'extra' => ['chien', 'je préfère']],
                            'ja' => ['sentence' => '猫の方が良い', 'correct' => ['猫', 'の', '方', 'が', '良い'], 'extra' => ['犬']],
                        ],
                    ],
                    'b' => [
                        'words' => ['저는', '개를', '선호한다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I prefer the dog', 'correct' => ['I prefer', 'the', 'dog'], 'extra' => ['better']],
                            'es' => ['sentence' => 'Prefiero el perro', 'correct' => ['prefiero', 'el', 'perro'], 'extra' => ['mejor', 'gato']],
                            'de' => ['sentence' => 'Ich bevorzuge den Hund', 'correct' => ['ich bevorzuge', 'den', 'Hund'], 'extra' => ['besser', 'Katze']],
                            'fr' => ['sentence' => 'Je préfère le chien', 'correct' => ['je préfère', 'le', 'chien'], 'extra' => ['meilleur', 'chat']],
                            'ja' => ['sentence' => '私は犬を好む', 'correct' => ['私', 'は', '犬', 'を', '好む'], 'extra' => ['もっと良い']],
                        ],
                    ],
                    'c' => [
                        'words' => ['고양이가', '개보다', '더', '좋다'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'a cat is better than a dog', 'correct' => ['a', 'cat', 'is', 'better', 'than', 'a', 'dog'], 'extra' => ['I prefer']],
                            'es' => ['sentence' => 'Un gato es mejor que un perro', 'correct' => ['un', 'gato', 'es', 'mejor', 'que', 'un', 'perro'], 'extra' => ['prefiero']],
                            'de' => ['sentence' => 'Eine Katze ist besser als ein Hund', 'correct' => ['eine', 'Katze', 'ist', 'besser', 'als', 'ein', 'Hund'], 'extra' => ['ich bevorzuge']],
                            'fr' => ['sentence' => 'Un chat est meilleur qu\'un chien', 'correct' => ['un', 'chat', 'est', 'meilleur', 'que', 'un', 'chien'], 'extra' => ['je préfère']],
                            'ja' => ['sentence' => '猫は犬より良い', 'correct' => ['猫', 'は', '犬', 'より', '良い'], 'extra' => ['私は好む']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
