<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitRestaurant08Seeder extends Seeder
{
    private const PICTURES = [
        'Cake' => 'cake', 'Ice cream' => 'icecream', 'Cheese' => 'cheese', 'Apple' => 'apple',
        'Coffee' => 'coffee', 'Bread' => 'bread',
    ];

    /**
     * English Chapter 3, Unit 8 — desserts.
     *
     * Flavours are the theme: chocolate, vanilla, strawberry, all attached to
     * cake and ice cream, with slice and share so the learner can order and
     * split a pudding.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, 'Unit 8: Desserts and Sweets', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Chocolate Cake', 1,
                pictures: [['en' => 'Cake', 'img' => 'cake'], ['en' => 'Ice cream', 'img' => 'icecream']],
                plain: [['en' => 'Chocolate'], ['en' => 'Slice']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'chocolate', 'cake'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un pastel de chocolate', 'correct' => ['un', 'chocolate', 'pastel'], 'extra' => ['trozo', 'helado']],
                            'de' => ['sentence' => 'Ein Schokoladenkuchen', 'correct' => ['ein', 'Schokolade', 'Kuchen'], 'extra' => ['Stück', 'Eis']],
                            'ja' => ['sentence' => 'チョコレートケーキ', 'correct' => ['チョコレート', 'ケーキ'], 'extra' => ['一切れ']],
                            'ko' => ['sentence' => '초콜릿 케이크', 'correct' => ['초콜릿', '케이크'], 'extra' => ['한 조각']],
                            'fr' => ['sentence' => 'Un gâteau au chocolat', 'correct' => ['un', 'chocolat', 'gâteau'], 'extra' => ['part', 'glace']],
                            'tr' => ['sentence' => 'çikolatalı bir pasta', 'correct' => ['çikolatalı', 'bir', 'pasta'], 'extra' => []],
                        'ru' => ['sentence' => 'шоколад торт', 'correct' => ['шоколад', 'торт'], 'extra' => []],
                        'ar' => ['sentence' => 'شوكولاتة كعكة', 'correct' => ['شوكولاتة', 'كعكة'], 'extra' => []],
                        'az' => ['sentence' => 'bir şokolad tort', 'correct' => ['bir', 'şokolad', 'tort'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'slice', 'of', 'cake'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un trozo de pastel', 'correct' => ['un', 'trozo', 'de', 'pastel'], 'extra' => ['chocolate', 'helado']],
                            'de' => ['sentence' => 'Ein Stück Kuchen', 'correct' => ['ein', 'Stück', 'von', 'Kuchen'], 'extra' => ['Schokolade', 'Eis']],
                            'ja' => ['sentence' => 'ケーキ一切れ', 'correct' => ['ケーキ', '一切れ'], 'extra' => ['チョコレート']],
                            'ko' => ['sentence' => '케이크 한 조각', 'correct' => ['케이크', '한', '조각'], 'extra' => ['초콜릿']],
                            'fr' => ['sentence' => 'Une part de gâteau', 'correct' => ['une', 'part', 'de', 'gâteau'], 'extra' => ['chocolat']],
                            'tr' => ['sentence' => 'bir dilim pasta', 'correct' => ['bir', 'dilim', 'pasta'], 'extra' => []],
                        'ru' => ['sentence' => 'кусок торт', 'correct' => ['кусок', 'торт'], 'extra' => []],
                        'ar' => ['sentence' => 'شريحة كعكة', 'correct' => ['شريحة', 'كعكة'], 'extra' => []],
                        'az' => ['sentence' => 'bir dilim tort', 'correct' => ['bir', 'dilim', 'tort'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'chocolate', 'ice cream'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un helado de chocolate', 'correct' => ['un', 'chocolate', 'helado'], 'extra' => ['trozo', 'pastel']],
                            'de' => ['sentence' => 'Ein Schokoladeneis', 'correct' => ['ein', 'Schokolade', 'Eis'], 'extra' => ['Stück', 'Kuchen']],
                            'ja' => ['sentence' => 'チョコレートアイスクリーム', 'correct' => ['チョコレート', 'アイスクリーム'], 'extra' => ['一切れ']],
                            'ko' => ['sentence' => '초콜릿 아이스크림', 'correct' => ['초콜릿', '아이스크림'], 'extra' => ['한 조각']],
                            'fr' => ['sentence' => 'Une glace au chocolat', 'correct' => ['une', 'chocolat', 'glace'], 'extra' => ['part']],
                            'tr' => ['sentence' => 'çikolatalı bir dondurma', 'correct' => ['çikolatalı', 'bir', 'dondurma'], 'extra' => []],
                        'ru' => ['sentence' => 'шоколад мороженое', 'correct' => ['шоколад', 'мороженое'], 'extra' => []],
                        'ar' => ['sentence' => 'شوكولاتة آيس كريم', 'correct' => ['شوكولاتة', 'آيس كريم'], 'extra' => []],
                        'az' => ['sentence' => 'bir şokolad dondurma', 'correct' => ['bir', 'şokolad', 'dondurma'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Sharing a Cake', 2,
                pictures: [['en' => 'Cake', 'img' => 'cake'], ['en' => 'Bread', 'img' => 'bread']],
                plain: [['en' => 'To share'], ['en' => 'Cream']],
                phrases: [
                    'a' => [
                        'words' => ['to share', 'a', 'cake'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Compartir un pastel', 'correct' => ['compartir', 'un', 'pastel'], 'extra' => ['nata', 'pan']],
                            'de' => ['sentence' => 'Einen Kuchen teilen', 'correct' => ['einen', 'Kuchen', 'teilen'], 'extra' => ['Sahne', 'Brot']],
                            'ja' => ['sentence' => 'ケーキを分ける', 'correct' => ['ケーキ', 'を', '分ける'], 'extra' => ['クリーム']],
                            'ko' => ['sentence' => '케이크를 나누다', 'correct' => ['케이크를', '나누다'], 'extra' => ['크림']],
                            'fr' => ['sentence' => 'Partager un gâteau', 'correct' => ['partager', 'un', 'gâteau'], 'extra' => ['crème', 'pain']],
                            'tr' => ['sentence' => 'bir pasta paylaşmak', 'correct' => ['bir', 'pasta', 'paylaşmak'], 'extra' => []],
                        'ru' => ['sentence' => 'разделить торт', 'correct' => ['разделить', 'торт'], 'extra' => []],
                        'ar' => ['sentence' => 'المشاركة كعكة', 'correct' => ['المشاركة', 'كعكة'], 'extra' => []],
                        'az' => ['sentence' => 'bölüşmək bir tort', 'correct' => ['bölüşmək', 'bir', 'tort'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['bread', 'with', 'cream'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Pan con nata', 'correct' => ['pan', 'con', 'nata'], 'extra' => ['compartir', 'pastel']],
                            'de' => ['sentence' => 'Brot mit Sahne', 'correct' => ['Brot', 'mit', 'Sahne'], 'extra' => ['teilen', 'Kuchen']],
                            'ja' => ['sentence' => 'クリーム付きのパン', 'correct' => ['クリーム', '付き', 'の', 'パン'], 'extra' => ['分ける']],
                            'ko' => ['sentence' => '크림을 바른 빵', 'correct' => ['크림을', '바른', '빵'], 'extra' => ['나누다']],
                            'fr' => ['sentence' => 'Du pain avec de la crème', 'correct' => ['pain', 'avec', 'crème'], 'extra' => ['partager']],
                            'tr' => ['sentence' => 'kremalı ekmek', 'correct' => ['kremalı', 'ekmek'], 'extra' => []],
                        'ru' => ['sentence' => 'хлеб с сливки', 'correct' => ['хлеб', 'с', 'сливки'], 'extra' => []],
                        'ar' => ['sentence' => 'خبز مع كريمة', 'correct' => ['خبز', 'مع', 'كريمة'], 'extra' => []],
                        'az' => ['sentence' => 'çörək ilə qaymaq', 'correct' => ['çörək', 'ilə', 'qaymaq'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['to share', 'a', 'cake', 'and', 'some', 'bread'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Compartir un pastel y algo de pan', 'correct' => ['compartir', 'un', 'pastel', 'y', 'algo de', 'pan'], 'extra' => ['nata']],
                            'de' => ['sentence' => 'Einen Kuchen und etwas Brot teilen', 'correct' => ['einen', 'Kuchen', 'und', 'etwas', 'Brot', 'teilen'], 'extra' => ['Sahne']],
                            'ja' => ['sentence' => 'ケーキと少しのパンを分ける', 'correct' => ['ケーキ', 'と', '少しの', 'パン', 'を', '分ける'], 'extra' => ['クリーム']],
                            'ko' => ['sentence' => '케이크와 약간의 빵을 나누다', 'correct' => ['케이크와', '약간의', '빵을', '나누다'], 'extra' => ['크림']],
                            'fr' => ['sentence' => 'Partager un gâteau et du pain', 'correct' => ['partager', 'un', 'gâteau', 'et', 'du', 'pain'], 'extra' => ['crème']],
                            'tr' => ['sentence' => 'bir pasta ve biraz ekmek paylaşmak', 'correct' => ['bir', 'pasta', 've', 'biraz', 'ekmek', 'paylaşmak'], 'extra' => []],
                        'ru' => ['sentence' => 'разделить торт и немного хлеб', 'correct' => ['разделить', 'торт', 'и', 'немного', 'хлеб'], 'extra' => []],
                        'ar' => ['sentence' => 'المشاركة كعكة و بعض خبز', 'correct' => ['المشاركة', 'كعكة', 'و', 'بعض', 'خبز'], 'extra' => []],
                        'az' => ['sentence' => 'bölüşmək bir tort və bir az çörək', 'correct' => ['bölüşmək', 'bir', 'tort', 'və', 'bir az', 'çörək'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Vanilla or Strawberry', 3,
                pictures: [['en' => 'Ice cream', 'img' => 'icecream'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'Vanilla'], ['en' => 'Strawberry']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'vanilla', 'ice cream'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un helado de vainilla', 'correct' => ['un', 'vainilla', 'helado'], 'extra' => ['fresa', 'manzana']],
                            'de' => ['sentence' => 'Ein Vanilleeis', 'correct' => ['ein', 'Vanille', 'Eis'], 'extra' => ['Erdbeere', 'Apfel']],
                            'ja' => ['sentence' => 'バニラアイスクリーム', 'correct' => ['バニラ', 'アイスクリーム'], 'extra' => ['いちご']],
                            'ko' => ['sentence' => '바닐라 아이스크림', 'correct' => ['바닐라', '아이스크림'], 'extra' => ['딸기']],
                            'fr' => ['sentence' => 'Une glace à la vanille', 'correct' => ['une', 'vanille', 'glace'], 'extra' => ['fraise', 'pomme']],
                            'tr' => ['sentence' => 'vanilyalı bir dondurma', 'correct' => ['vanilyalı', 'bir', 'dondurma'], 'extra' => []],
                        'ru' => ['sentence' => 'ванильный мороженое', 'correct' => ['ванильный', 'мороженое'], 'extra' => []],
                        'ar' => ['sentence' => 'فانيليا آيس كريم', 'correct' => ['فانيليا', 'آيس كريم'], 'extra' => []],
                        'az' => ['sentence' => 'bir vanil dondurma', 'correct' => ['bir', 'vanil', 'dondurma'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['an', 'apple', 'or', 'a', 'strawberry'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Una manzana o una fresa', 'correct' => ['una', 'manzana', 'o', 'una', 'fresa'], 'extra' => ['vainilla']],
                            'de' => ['sentence' => 'Ein Apfel oder eine Erdbeere', 'correct' => ['ein', 'Apfel', 'oder', 'eine', 'Erdbeere'], 'extra' => ['Vanille']],
                            'ja' => ['sentence' => 'りんごかいちご', 'correct' => ['りんご', 'か', 'いちご'], 'extra' => ['バニラ']],
                            'ko' => ['sentence' => '사과 또는 딸기', 'correct' => ['사과', '또는', '딸기'], 'extra' => ['바닐라']],
                            'fr' => ['sentence' => 'Une pomme ou une fraise', 'correct' => ['une', 'pomme', 'ou', 'une', 'fraise'], 'extra' => ['vanille']],
                            'tr' => ['sentence' => 'bir elma veya bir çilek', 'correct' => ['bir', 'elma', 'veya', 'bir', 'çilek'], 'extra' => []],
                        'ru' => ['sentence' => 'яблоко или клубничный', 'correct' => ['яблоко', 'или', 'клубничный'], 'extra' => []],
                        'ar' => ['sentence' => 'تفاحة أو فراولة', 'correct' => ['تفاحة', 'أو', 'فراولة'], 'extra' => []],
                        'az' => ['sentence' => 'bir alma və ya bir çiyələk', 'correct' => ['bir', 'alma', 'və ya', 'bir', 'çiyələk'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['the', 'vanilla', 'and', 'the', 'strawberry'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'La vainilla y la fresa', 'correct' => ['la', 'vainilla', 'y', 'la', 'fresa'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Die Vanille und die Erdbeere', 'correct' => ['die', 'Vanille', 'und', 'die', 'Erdbeere'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => 'バニラといちご', 'correct' => ['バニラ', 'と', 'いちご'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '바닐라와 딸기', 'correct' => ['바닐라와', '딸기'], 'extra' => ['사과']],
                            'fr' => ['sentence' => 'La vanille et la fraise', 'correct' => ['la', 'vanille', 'et', 'la', 'fraise'], 'extra' => ['pomme']],
                            'tr' => ['sentence' => 'vanilya ve çilek', 'correct' => ['vanilya', 've', 'çilek'], 'extra' => []],
                        'ru' => ['sentence' => 'ванильный и клубничный', 'correct' => ['ванильный', 'и', 'клубничный'], 'extra' => []],
                        'ar' => ['sentence' => 'فانيليا و فراولة', 'correct' => ['فانيليا', 'و', 'فراولة'], 'extra' => []],
                        'az' => ['sentence' => 'vanil və çiyələk', 'correct' => ['vanil', 'və', 'çiyələk'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: An Apple Tart', 4,
                pictures: [['en' => 'Apple', 'img' => 'apple'], ['en' => 'Cake', 'img' => 'cake']],
                plain: [['en' => 'Tart'], ['en' => 'Fruit']],
                phrases: [
                    'a' => [
                        'words' => ['an', 'apple', 'tart'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Una tarta de manzana', 'correct' => ['una', 'manzana', 'tarta'], 'extra' => ['fruta', 'pastel']],
                            'de' => ['sentence' => 'Eine Apfeltorte', 'correct' => ['eine', 'Apfel', 'Torte'], 'extra' => ['Obst', 'Kuchen']],
                            'ja' => ['sentence' => 'りんごタルト', 'correct' => ['りんご', 'タルト'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '사과 타르트', 'correct' => ['사과', '타르트'], 'extra' => ['과일']],
                            'fr' => ['sentence' => 'Une tarte à la pomme', 'correct' => ['une', 'pomme', 'tarte'], 'extra' => ['fruit', 'gâteau']],
                            'tr' => ['sentence' => 'elmalı bir turta', 'correct' => ['elmalı', 'bir', 'turta'], 'extra' => []],
                        'ru' => ['sentence' => 'яблоко тарт', 'correct' => ['яблоко', 'тарт'], 'extra' => []],
                        'ar' => ['sentence' => 'تفاحة فطيرة', 'correct' => ['تفاحة', 'فطيرة'], 'extra' => []],
                        'az' => ['sentence' => 'bir alma tart', 'correct' => ['bir', 'alma', 'tart'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['a', 'fresh', 'fruit'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una fruta fresca', 'correct' => ['una', 'fresco', 'fruta'], 'extra' => ['tarta', 'manzana']],
                            'de' => ['sentence' => 'Frisches Obst', 'correct' => ['frisches', 'Obst'], 'extra' => ['Torte', 'Apfel']],
                            'ja' => ['sentence' => '新鮮な果物', 'correct' => ['新鮮な', '果物'], 'extra' => ['タルト']],
                            'ko' => ['sentence' => '신선한 과일', 'correct' => ['신선한', '과일'], 'extra' => ['타르트']],
                            'fr' => ['sentence' => 'Un fruit frais', 'correct' => ['un', 'fruit', 'frais'], 'extra' => ['tarte']],
                            'tr' => ['sentence' => 'taze bir meyve', 'correct' => ['taze', 'bir', 'meyve'], 'extra' => []],
                        'ru' => ['sentence' => 'свежий фрукт', 'correct' => ['свежий', 'фрукт'], 'extra' => []],
                        'ar' => ['sentence' => 'طازج فاكهة', 'correct' => ['طازج', 'فاكهة'], 'extra' => []],
                        'az' => ['sentence' => 'bir təzə meyvə', 'correct' => ['bir', 'təzə', 'meyvə'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'tart', 'and', 'a', 'cake'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Una tarta y un pastel', 'correct' => ['una', 'tarta', 'y', 'un', 'pastel'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Eine Torte und ein Kuchen', 'correct' => ['eine', 'Torte', 'und', 'ein', 'Kuchen'], 'extra' => ['Obst']],
                            'ja' => ['sentence' => 'タルトとケーキ', 'correct' => ['タルト', 'と', 'ケーキ'], 'extra' => ['果物']],
                            'ko' => ['sentence' => '타르트와 케이크', 'correct' => ['타르트와', '케이크'], 'extra' => ['과일']],
                            'fr' => ['sentence' => 'Une tarte et un gâteau', 'correct' => ['une', 'tarte', 'et', 'un', 'gâteau'], 'extra' => ['fruit']],
                            'tr' => ['sentence' => 'bir turta ve bir pasta', 'correct' => ['bir', 'turta', 've', 'bir', 'pasta'], 'extra' => []],
                        'ru' => ['sentence' => 'тарт и торт', 'correct' => ['тарт', 'и', 'торт'], 'extra' => []],
                        'ar' => ['sentence' => 'فطيرة و كعكة', 'correct' => ['فطيرة', 'و', 'كعكة'], 'extra' => []],
                        'az' => ['sentence' => 'bir tart və bir tort', 'correct' => ['bir', 'tart', 'və', 'bir', 'tort'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Sweet Enough', 5,
                pictures: [['en' => 'Cake', 'img' => 'cake'], ['en' => 'Ice cream', 'img' => 'icecream']],
                plain: [['en' => 'Sweet'], ['en' => 'Too much']],
                phrases: [
                    'a' => [
                        'words' => ['a', 'sweet', 'cake'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un pastel dulce', 'correct' => ['un', 'pastel', 'dulce'], 'extra' => ['demasiado', 'helado']],
                            'de' => ['sentence' => 'Ein süßer Kuchen', 'correct' => ['ein', 'süß', 'Kuchen'], 'extra' => ['zu viel', 'Eis']],
                            'ja' => ['sentence' => '甘いケーキ', 'correct' => ['甘い', 'ケーキ'], 'extra' => ['すぎます']],
                            'ko' => ['sentence' => '단 케이크', 'correct' => ['단', '케이크'], 'extra' => ['너무']],
                            'fr' => ['sentence' => 'Un gâteau sucré', 'correct' => ['un', 'gâteau', 'sucré'], 'extra' => ['trop', 'glace']],
                            'tr' => ['sentence' => 'tatlı bir pasta', 'correct' => ['tatlı', 'bir', 'pasta'], 'extra' => []],
                        'ru' => ['sentence' => 'сладкий торт', 'correct' => ['сладкий', 'торт'], 'extra' => []],
                        'ar' => ['sentence' => 'حلو كعكة', 'correct' => ['حلو', 'كعكة'], 'extra' => []],
                        'az' => ['sentence' => 'bir şirin tort', 'correct' => ['bir', 'şirin', 'tort'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'ice cream', 'is', 'too much', 'sweet'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'El helado es demasiado dulce', 'correct' => ['el', 'helado', 'es', 'demasiado', 'dulce'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Das Eis ist zu süß', 'correct' => ['das', 'Eis', 'ist', 'zu viel', 'süß'], 'extra' => ['Kuchen']],
                            'ja' => ['sentence' => 'アイスクリームは甘すぎます', 'correct' => ['アイスクリーム', 'は', '甘すぎます'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '아이스크림은 너무 답니다', 'correct' => ['아이스크림은', '너무', '답니다'], 'extra' => ['케이크']],
                            'fr' => ['sentence' => 'La glace est trop sucrée', 'correct' => ['la', 'glace', 'est', 'trop', 'sucré'], 'extra' => ['gâteau']],
                            'tr' => ['sentence' => 'dondurma çok fazla tatlı', 'correct' => ['dondurma', 'çok', 'fazla', 'tatlı'], 'extra' => []],
                        'ru' => ['sentence' => 'мороженое слишком много сладкий', 'correct' => ['мороженое', 'слишком много', 'сладкий'], 'extra' => []],
                        'ar' => ['sentence' => 'آيس كريم كثير جدا حلو', 'correct' => ['آيس كريم', 'كثير جدا', 'حلو'], 'extra' => []],
                        'az' => ['sentence' => 'dondurma çox artıq şirin', 'correct' => ['dondurma', 'çox artıq', 'şirin'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'sweet', 'cake', 'and', 'a', 'sweet', 'ice cream'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Un pastel dulce y un helado dulce', 'correct' => ['un', 'pastel', 'dulce', 'y', 'un', 'helado', 'dulce'], 'extra' => ['demasiado']],
                            'de' => ['sentence' => 'Ein süßer Kuchen und ein süßes Eis', 'correct' => ['ein', 'süß', 'Kuchen', 'und', 'ein', 'süß', 'Eis'], 'extra' => ['zu viel']],
                            'ja' => ['sentence' => '甘いケーキと甘いアイスクリーム', 'correct' => ['甘い', 'ケーキ', 'と', '甘い', 'アイスクリーム'], 'extra' => ['すぎます']],
                            'ko' => ['sentence' => '단 케이크와 단 아이스크림', 'correct' => ['단', '케이크와', '단', '아이스크림'], 'extra' => ['너무']],
                            'fr' => ['sentence' => 'Un gâteau sucré et une glace sucrée', 'correct' => ['un', 'sucré', 'gâteau', 'et', 'un', 'sucré', 'glace'], 'extra' => ['trop']],
                            'tr' => ['sentence' => 'tatlı bir pasta ve tatlı bir dondurma', 'correct' => ['tatlı', 'bir', 'pasta', 've', 'tatlı', 'bir', 'dondurma'], 'extra' => []],
                        'ru' => ['sentence' => 'сладкий торт и сладкий мороженое', 'correct' => ['сладкий', 'торт', 'и', 'сладкий', 'мороженое'], 'extra' => []],
                        'ar' => ['sentence' => 'حلو كعكة و حلو آيس كريم', 'correct' => ['حلو', 'كعكة', 'و', 'حلو', 'آيس كريم'], 'extra' => []],
                        'az' => ['sentence' => 'bir şirin tort və bir şirin dondurma', 'correct' => ['bir', 'şirin', 'tort', 'və', 'bir', 'şirin', 'dondurma'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
