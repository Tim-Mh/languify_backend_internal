<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant08Seeder extends Seeder
{
    private const PICTURES = [
        'Gâteau' => 'cake', 'Glace' => 'icecream', 'Éclair' => 'eclair',
        'Croissant' => 'croissant', 'Pomme' => 'apple', 'Fromage' => 'cheese',
        'Café' => 'coffee', 'Pain' => 'bread',
    ];

    /**
     * French Chapter 3, Unit 8 — desserts.
     *
     * Desserts are where French flavour phrasing lives: "au chocolat", "à la
     * vanille", "à la fraise". The pattern is the whole point of the unit, so
     * each lesson repeats it with a different flavour rather than teaching the
     * preposition abstractly.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Desserts and Sweets', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Chocolate Cake', 1,
                pictures: [['fr' => 'Gâteau', 'img' => 'cake'], ['fr' => 'Glace', 'img' => 'icecream']],
                plain: [['fr' => 'Chocolat'], ['fr' => 'Part']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'gâteau', 'au', 'chocolat'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A chocolate cake', 'correct' => ['a', 'cake', 'with', 'chocolate'], 'extra' => ['slice', 'ice cream']],
                            'es' => ['sentence' => 'Un pastel de chocolate', 'correct' => ['un', 'pastel', 'al', 'chocolate'], 'extra' => ['trozo', 'helado']],
                            'de' => ['sentence' => 'Ein Schokoladenkuchen', 'correct' => ['ein', 'Kuchen', 'zum', 'Schokolade'], 'extra' => ['Stück', 'Eis']],
                            'ja' => ['sentence' => 'チョコレートケーキ', 'correct' => ['チョコレート', 'ケーキ'], 'extra' => ['一切れ']],
                            'ko' => ['sentence' => '초콜릿 케이크', 'correct' => ['초콜릿', '케이크'], 'extra' => ['한 조각']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'part', 'de', 'gâteau'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A slice of cake', 'correct' => ['a', 'slice', 'of', 'cake'], 'extra' => ['chocolate', 'ice cream']],
                            'es' => ['sentence' => 'Un trozo de pastel', 'correct' => ['un', 'trozo', 'de', 'pastel'], 'extra' => ['chocolate', 'helado']],
                            'de' => ['sentence' => 'Ein Stück Kuchen', 'correct' => ['ein', 'Stück', 'von', 'Kuchen'], 'extra' => ['Schokolade', 'Eis']],
                            'ja' => ['sentence' => 'ケーキ一切れ', 'correct' => ['ケーキ', '一切れ'], 'extra' => ['チョコレート']],
                            'ko' => ['sentence' => '케이크 한 조각', 'correct' => ['케이크', '한', '조각'], 'extra' => ['초콜릿']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'glace', 'au', 'chocolat'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A chocolate ice cream', 'correct' => ['an', 'ice cream', 'with', 'chocolate'], 'extra' => ['slice', 'cake']],
                            'es' => ['sentence' => 'Un helado de chocolate', 'correct' => ['un', 'helado', 'al', 'chocolate'], 'extra' => ['trozo', 'pastel']],
                            'de' => ['sentence' => 'Ein Schokoladeneis', 'correct' => ['ein', 'Eis', 'zum', 'Schokolade'], 'extra' => ['Stück', 'Kuchen']],
                            'ja' => ['sentence' => 'チョコレートアイスクリーム', 'correct' => ['チョコレート', 'アイスクリーム'], 'extra' => ['一切れ']],
                            'ko' => ['sentence' => '초콜릿 아이스크림', 'correct' => ['초콜릿', '아이스크림'], 'extra' => ['한 조각']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Sharing a Pastry', 2,
                pictures: [['fr' => 'Éclair', 'img' => 'eclair'], ['fr' => 'Croissant', 'img' => 'croissant']],
                plain: [['fr' => 'Partager'], ['fr' => 'Crème']],
                phrases: [
                    'a' => [
                        'words' => ['partager', 'un', 'éclair'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To share an eclair', 'correct' => ['to share', 'an', 'eclair'], 'extra' => ['cream', 'croissant']],
                            'es' => ['sentence' => 'Compartir un éclair', 'correct' => ['compartir', 'un', 'éclair'], 'extra' => ['nata', 'cruasán']],
                            'de' => ['sentence' => 'Ein Éclair teilen', 'correct' => ['ein', 'Éclair', 'teilen'], 'extra' => ['Sahne', 'Croissant']],
                            'ja' => ['sentence' => 'エクレアを分ける', 'correct' => ['エクレア', 'を', '分ける'], 'extra' => ['クリーム']],
                            'ko' => ['sentence' => '에클레어를 나누다', 'correct' => ['에클레어를', '나누다'], 'extra' => ['크림']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'croissant', 'avec', 'de', 'la', 'crème'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A croissant with cream', 'correct' => ['a', 'croissant', 'with', 'the', 'cream'], 'extra' => ['to share', 'eclair']],
                            'es' => ['sentence' => 'Un cruasán con nata', 'correct' => ['un', 'cruasán', 'con', 'la', 'nata'], 'extra' => ['compartir', 'éclair']],
                            'de' => ['sentence' => 'Ein Croissant mit Sahne', 'correct' => ['ein', 'Croissant', 'mit', 'der', 'Sahne'], 'extra' => ['teilen', 'Éclair']],
                            'ja' => ['sentence' => 'クリーム入りのクロワッサン', 'correct' => ['クリーム', '入り', 'の', 'クロワッサン'], 'extra' => ['分ける']],
                            'ko' => ['sentence' => '크림이 든 크루아상', 'correct' => ['크림이', '든', '크루아상'], 'extra' => ['나누다']],
                        ],
                    ],
                    'c' => [
                        'words' => ['partager', 'un', 'croissant', 'et', 'un', 'éclair'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'To share a croissant and an eclair', 'correct' => ['to share', 'a', 'croissant', 'and', 'an', 'eclair'], 'extra' => ['cream']],
                            'es' => ['sentence' => 'Compartir un cruasán y un éclair', 'correct' => ['compartir', 'un', 'cruasán', 'y', 'un', 'éclair'], 'extra' => ['nata']],
                            'de' => ['sentence' => 'Ein Croissant und ein Éclair teilen', 'correct' => ['ein', 'Croissant', 'und', 'ein', 'Éclair', 'teilen'], 'extra' => ['Sahne']],
                            'ja' => ['sentence' => 'クロワッサンとエクレアを分ける', 'correct' => ['クロワッサン', 'と', 'エクレア', 'を', '分ける'], 'extra' => ['クリーム']],
                            'ko' => ['sentence' => '크루아상과 에클레어를 나누다', 'correct' => ['크루아상과', '에클레어를', '나누다'], 'extra' => ['크림']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Vanilla or Strawberry', 3,
                pictures: [['fr' => 'Glace', 'img' => 'icecream'], ['fr' => 'Pomme', 'img' => 'apple']],
                plain: [['fr' => 'Vanille'], ['fr' => 'Fraise']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'glace', 'à', 'la', 'vanille'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A vanilla ice cream', 'correct' => ['an', 'ice cream', 'with', 'the', 'vanilla'], 'extra' => ['strawberry', 'apple']],
                            'es' => ['sentence' => 'Un helado de vainilla', 'correct' => ['un', 'helado', 'a', 'la', 'vainilla'], 'extra' => ['fresa', 'manzana']],
                            'de' => ['sentence' => 'Ein Vanilleeis', 'correct' => ['ein', 'Eis', 'zu', 'der', 'Vanille'], 'extra' => ['Erdbeere', 'Apfel']],
                            'ja' => ['sentence' => 'バニラアイスクリーム', 'correct' => ['バニラ', 'アイスクリーム'], 'extra' => ['いちご']],
                            'ko' => ['sentence' => '바닐라 아이스크림', 'correct' => ['바닐라', '아이스크림'], 'extra' => ['딸기']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'pomme', 'ou', 'une', 'fraise'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'An apple or a strawberry', 'correct' => ['an', 'apple', 'or', 'a', 'strawberry'], 'extra' => ['vanilla', 'ice cream']],
                            'es' => ['sentence' => 'Una manzana o una fresa', 'correct' => ['una', 'manzana', 'o', 'una', 'fresa'], 'extra' => ['vainilla', 'helado']],
                            'de' => ['sentence' => 'Ein Apfel oder eine Erdbeere', 'correct' => ['ein', 'Apfel', 'oder', 'eine', 'Erdbeere'], 'extra' => ['Vanille', 'Eis']],
                            'ja' => ['sentence' => 'りんごかいちご', 'correct' => ['りんご', 'か', 'いちご'], 'extra' => ['バニラ']],
                            'ko' => ['sentence' => '사과 또는 딸기', 'correct' => ['사과', '또는', '딸기'], 'extra' => ['바닐라']],
                        ],
                    ],
                    'c' => [
                        'words' => ['la', 'vanille', 'et', 'la', 'fraise'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The vanilla and the strawberry', 'correct' => ['the', 'vanilla', 'and', 'the', 'strawberry'], 'extra' => ['apple', 'ice cream']],
                            'es' => ['sentence' => 'La vainilla y la fresa', 'correct' => ['la', 'vainilla', 'y', 'la', 'fresa'], 'extra' => ['manzana', 'helado']],
                            'de' => ['sentence' => 'Die Vanille und die Erdbeere', 'correct' => ['die', 'Vanille', 'und', 'die', 'Erdbeere'], 'extra' => ['Apfel', 'Eis']],
                            'ja' => ['sentence' => 'バニラといちご', 'correct' => ['バニラ', 'と', 'いちご'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '바닐라와 딸기', 'correct' => ['바닐라와', '딸기'], 'extra' => ['사과']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: An Apple Tart', 4,
                pictures: [['fr' => 'Pomme', 'img' => 'apple'], ['fr' => 'Gâteau', 'img' => 'cake']],
                plain: [['fr' => 'Tarte'], ['fr' => 'Fruit']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'tarte', 'à', 'la', 'pomme'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'An apple tart', 'correct' => ['a', 'tart', 'with', 'the', 'apple'], 'extra' => ['fruit', 'cake']],
                            'es' => ['sentence' => 'Una tarta de manzana', 'correct' => ['una', 'tarta', 'a', 'la', 'manzana'], 'extra' => ['fruta', 'pastel']],
                            'de' => ['sentence' => 'Eine Apfeltorte', 'correct' => ['eine', 'Torte', 'zu', 'der', 'Apfel'], 'extra' => ['Obst', 'Kuchen']],
                            'ja' => ['sentence' => 'りんごタルト', 'correct' => ['りんご', 'タルト'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '사과 타르트', 'correct' => ['사과', '타르트'], 'extra' => ['과일']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'fruit', 'frais'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A fresh fruit', 'correct' => ['a', 'fresh', 'fruit'], 'extra' => ['tart', 'apple']],
                            'es' => ['sentence' => 'Una fruta fresca', 'correct' => ['una', 'fruta', 'fresco'], 'extra' => ['tarta', 'manzana']],
                            'de' => ['sentence' => 'Frisches Obst', 'correct' => ['ein', 'Obst', 'frisch'], 'extra' => ['Torte', 'Apfel']],
                            'ja' => ['sentence' => '新鮮な果物', 'correct' => ['新鮮な', '果物'], 'extra' => ['タルト']],
                            'ko' => ['sentence' => '신선한 과일', 'correct' => ['신선한', '과일'], 'extra' => ['타르트']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'tarte', 'et', 'un', 'gâteau'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A tart and a cake', 'correct' => ['a', 'tart', 'and', 'a', 'cake'], 'extra' => ['fruit', 'apple']],
                            'es' => ['sentence' => 'Una tarta y un pastel', 'correct' => ['una', 'tarta', 'y', 'un', 'pastel'], 'extra' => ['fruta', 'manzana']],
                            'de' => ['sentence' => 'Eine Torte und ein Kuchen', 'correct' => ['eine', 'Torte', 'und', 'ein', 'Kuchen'], 'extra' => ['Obst', 'Apfel']],
                            'ja' => ['sentence' => 'タルトとケーキ', 'correct' => ['タルト', 'と', 'ケーキ'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '타르트와 케이크', 'correct' => ['타르트와', '케이크'], 'extra' => ['과일']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Sweet Enough', 5,
                pictures: [['fr' => 'Croissant', 'img' => 'croissant'], ['fr' => 'Éclair', 'img' => 'eclair']],
                plain: [['fr' => 'Sucré'], ['fr' => 'Assez']],
                phrases: [
                    'a' => [
                        'words' => ['un', 'éclair', 'sucré'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A sweet eclair', 'correct' => ['a', 'sweet', 'eclair'], 'extra' => ['enough', 'croissant']],
                            'es' => ['sentence' => 'Un éclair dulce', 'correct' => ['un', 'éclair', 'dulce'], 'extra' => ['bastante', 'cruasán']],
                            'de' => ['sentence' => 'Ein süßes Éclair', 'correct' => ['ein', 'süß', 'Éclair'], 'extra' => ['genug', 'Croissant']],
                            'ja' => ['sentence' => '甘いエクレア', 'correct' => ['甘い', 'エクレア'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '단 에클레어', 'correct' => ['단', '에클레어'], 'extra' => ['충분히']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'croissant', 'assez', 'sucré'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A quite sweet croissant', 'correct' => ['a', 'croissant', 'enough', 'sweet'], 'extra' => ['eclair']],
                            'es' => ['sentence' => 'Un cruasán bastante dulce', 'correct' => ['un', 'cruasán', 'bastante', 'dulce'], 'extra' => ['éclair']],
                            'de' => ['sentence' => 'Ein ziemlich süßes Croissant', 'correct' => ['ein', 'Croissant', 'genug', 'süß'], 'extra' => ['Éclair']],
                            'ja' => ['sentence' => '十分に甘いクロワッサン', 'correct' => ['十分に', '甘い', 'クロワッサン'], 'extra' => ['エクレア']],
                            'ko' => ['sentence' => '충분히 단 크루아상', 'correct' => ['충분히', '단', '크루아상'], 'extra' => ['에클레어']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'croissant', 'et', 'un', 'éclair', 'sucré'], 'blank' => 5,
                        'tr' => [
                            'en' => ['sentence' => 'A croissant and a sweet eclair', 'correct' => ['a', 'croissant', 'and', 'a', 'sweet', 'eclair'], 'extra' => ['enough']],
                            'es' => ['sentence' => 'Un cruasán y un éclair dulce', 'correct' => ['un', 'cruasán', 'y', 'un', 'éclair', 'dulce'], 'extra' => ['bastante']],
                            'de' => ['sentence' => 'Ein Croissant und ein süßes Éclair', 'correct' => ['ein', 'Croissant', 'und', 'ein', 'süß', 'Éclair'], 'extra' => ['genug']],
                            'ja' => ['sentence' => 'クロワッサンと甘いエクレア', 'correct' => ['クロワッサン', 'と', '甘い', 'エクレア'], 'extra' => ['十分に']],
                            'ko' => ['sentence' => '크루아상과 단 에클레어', 'correct' => ['크루아상과', '단', '에클레어'], 'extra' => ['충분히']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
