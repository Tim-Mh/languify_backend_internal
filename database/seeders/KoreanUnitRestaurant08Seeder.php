<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitRestaurant08Seeder extends Seeder
{
    private const PICTURES = ['케이크' => 'cake', '아이스크림' => 'icecream', '빵' => 'bread', '사과' => 'apple'];

    /**
     * Korean Restaurant, Unit 8, the Korean twin of the English "Desserts and Sweets" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 8, '유닛 8: 디저트와 단것', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 케이크 · 아이스크림', 1,
                pictures: [['ko' => '케이크', 'img' => 'cake'], ['ko' => '아이스크림', 'img' => 'icecream']],
                plain: [['ko' => '초콜릿'], ['ko' => '한 조각']],
                phrases: [
                    'a' => [
                        'words' => ['초콜릿', '케이크'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a chocolate cake', 'correct' => ['a', 'chocolate', 'cake'], 'extra' => ['slice']],
                            'az' => ['sentence' => 'bir şokolad tort', 'correct' => ['bir', 'şokolad', 'tort'], 'extra' => ['dilim']],
                            'ar' => ['sentence' => 'شوكولاتة كعكة', 'correct' => ['شوكولاتة', 'كعكة'], 'extra' => ['شريحة']],
                            'ru' => ['sentence' => 'шоколад торт', 'correct' => ['шоколад', 'торт'], 'extra' => ['кусок']],
                            'es' => ['sentence' => 'Un pastel de chocolate', 'correct' => ['un', 'chocolate', 'pastel'], 'extra' => ['trozo', 'helado']],
                            'de' => ['sentence' => 'Ein Schokoladenkuchen', 'correct' => ['ein', 'Schokolade', 'Kuchen'], 'extra' => ['Stück', 'Eis']],
                            'fr' => ['sentence' => 'Un gâteau au chocolat', 'correct' => ['un', 'chocolat', 'gâteau'], 'extra' => ['part', 'glace']],
                            'ja' => ['sentence' => 'チョコレートケーキ', 'correct' => ['チョコレート', 'ケーキ'], 'extra' => ['一切れ']],
                            'tr' => ['sentence' => 'çikolatalı bir pasta', 'correct' => ['çikolatalı', 'bir', 'pasta'], 'extra' => ['dilim']],
                        ],
                    ],
                    'b' => [
                        'words' => ['케이크', '한', '조각'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'a slice of cake', 'correct' => ['a', 'slice', 'of', 'cake'], 'extra' => ['chocolate']],
                            'az' => ['sentence' => 'bir dilim tort', 'correct' => ['bir', 'dilim', 'tort'], 'extra' => ['şokolad']],
                            'ar' => ['sentence' => 'شريحة كعكة', 'correct' => ['شريحة', 'كعكة'], 'extra' => ['شوكولاتة']],
                            'ru' => ['sentence' => 'кусок торт', 'correct' => ['кусок', 'торт'], 'extra' => ['шоколад']],
                            'es' => ['sentence' => 'Un trozo de pastel', 'correct' => ['un', 'trozo', 'de', 'pastel'], 'extra' => ['chocolate', 'helado']],
                            'de' => ['sentence' => 'Ein Stück Kuchen', 'correct' => ['ein', 'Stück', 'von', 'Kuchen'], 'extra' => ['Schokolade', 'Eis']],
                            'fr' => ['sentence' => 'Une part de gâteau', 'correct' => ['une', 'part', 'de', 'gâteau'], 'extra' => ['chocolat']],
                            'ja' => ['sentence' => 'ケーキ一切れ', 'correct' => ['ケーキ', '一切れ'], 'extra' => ['チョコレート']],
                            'tr' => ['sentence' => 'bir dilim pasta', 'correct' => ['bir', 'dilim', 'pasta'], 'extra' => ['çikolata']],
                        ],
                    ],
                    'c' => [
                        'words' => ['초콜릿', '아이스크림'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a chocolate ice cream', 'correct' => ['a', 'chocolate', 'ice cream'], 'extra' => ['slice']],
                            'az' => ['sentence' => 'bir şokolad dondurma', 'correct' => ['bir', 'şokolad', 'dondurma'], 'extra' => ['dilim']],
                            'ar' => ['sentence' => 'شوكولاتة آيس كريم', 'correct' => ['شوكولاتة', 'آيس كريم'], 'extra' => ['شريحة']],
                            'ru' => ['sentence' => 'шоколад мороженое', 'correct' => ['шоколад', 'мороженое'], 'extra' => ['кусок']],
                            'es' => ['sentence' => 'Un helado de chocolate', 'correct' => ['un', 'chocolate', 'helado'], 'extra' => ['trozo', 'pastel']],
                            'de' => ['sentence' => 'Ein Schokoladeneis', 'correct' => ['ein', 'Schokolade', 'Eis'], 'extra' => ['Stück', 'Kuchen']],
                            'fr' => ['sentence' => 'Une glace au chocolat', 'correct' => ['une', 'chocolat', 'glace'], 'extra' => ['part']],
                            'ja' => ['sentence' => 'チョコレートアイスクリーム', 'correct' => ['チョコレート', 'アイスクリーム'], 'extra' => ['一切れ']],
                            'tr' => ['sentence' => 'çikolatalı bir dondurma', 'correct' => ['çikolatalı', 'bir', 'dondurma'], 'extra' => ['dilim']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 케이크 · 빵', 2,
                pictures: [['ko' => '케이크', 'img' => 'cake'], ['ko' => '빵', 'img' => 'bread']],
                plain: [['ko' => '나누다'], ['ko' => '크림']],
                phrases: [
                    'a' => [
                        'words' => ['케이크를', '나누세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to share a cake', 'correct' => ['to share', 'a', 'cake'], 'extra' => ['cream']],
                            'az' => ['sentence' => 'bölüşmək bir tort', 'correct' => ['bölüşmək', 'bir', 'tort'], 'extra' => ['qaymaq']],
                            'ar' => ['sentence' => 'المشاركة كعكة', 'correct' => ['المشاركة', 'كعكة'], 'extra' => ['كريمة']],
                            'ru' => ['sentence' => 'разделить торт', 'correct' => ['разделить', 'торт'], 'extra' => ['сливки']],
                            'es' => ['sentence' => 'Compartir un pastel', 'correct' => ['compartir', 'un', 'pastel'], 'extra' => ['nata', 'pan']],
                            'de' => ['sentence' => 'Einen Kuchen teilen', 'correct' => ['einen', 'Kuchen', 'teilen'], 'extra' => ['Sahne', 'Brot']],
                            'fr' => ['sentence' => 'Partager un gâteau', 'correct' => ['partager', 'un', 'gâteau'], 'extra' => ['crème', 'pain']],
                            'ja' => ['sentence' => 'ケーキを分ける', 'correct' => ['ケーキ', 'を', '分ける'], 'extra' => ['クリーム']],
                            'tr' => ['sentence' => 'bir pasta paylaşmak', 'correct' => ['bir', 'pasta', 'paylaşmak'], 'extra' => ['krema']],
                        ],
                    ],
                    'b' => [
                        'words' => ['크림을', '바른', '빵'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'bread with cream', 'correct' => ['bread', 'with', 'cream'], 'extra' => ['to share']],
                            'az' => ['sentence' => 'çörək ilə qaymaq', 'correct' => ['çörək', 'ilə', 'qaymaq'], 'extra' => ['bölüşmək']],
                            'ar' => ['sentence' => 'خبز مع كريمة', 'correct' => ['خبز', 'مع', 'كريمة'], 'extra' => ['المشاركة']],
                            'ru' => ['sentence' => 'хлеб с сливки', 'correct' => ['хлеб', 'с', 'сливки'], 'extra' => ['разделить']],
                            'es' => ['sentence' => 'Pan con nata', 'correct' => ['pan', 'con', 'nata'], 'extra' => ['compartir', 'pastel']],
                            'de' => ['sentence' => 'Brot mit Sahne', 'correct' => ['Brot', 'mit', 'Sahne'], 'extra' => ['teilen', 'Kuchen']],
                            'fr' => ['sentence' => 'Du pain avec de la crème', 'correct' => ['pain', 'avec', 'crème'], 'extra' => ['partager']],
                            'ja' => ['sentence' => 'クリーム付きのパン', 'correct' => ['クリーム', '付き', 'の', 'パン'], 'extra' => ['分ける']],
                            'tr' => ['sentence' => 'kremalı ekmek', 'correct' => ['kremalı', 'ekmek'], 'extra' => ['paylaşmak']],
                        ],
                    ],
                    'c' => [
                        'words' => ['케이크와', '약간의', '빵을', '나누세요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'to share a cake and some bread', 'correct' => ['to share', 'a', 'cake', 'and', 'some', 'bread'], 'extra' => ['cream']],
                            'az' => ['sentence' => 'bölüşmək bir tort və bir az çörək', 'correct' => ['bölüşmək', 'bir', 'tort', 'və', 'bir az', 'çörək'], 'extra' => ['qaymaq']],
                            'ar' => ['sentence' => 'المشاركة كعكة و بعض خبز', 'correct' => ['المشاركة', 'كعكة', 'و', 'بعض', 'خبز'], 'extra' => ['كريمة']],
                            'ru' => ['sentence' => 'разделить торт и немного хлеб', 'correct' => ['разделить', 'торт', 'и', 'немного', 'хлеб'], 'extra' => ['сливки']],
                            'es' => ['sentence' => 'Compartir un pastel y algo de pan', 'correct' => ['compartir', 'un', 'pastel', 'y', 'algo de', 'pan'], 'extra' => ['nata']],
                            'de' => ['sentence' => 'Einen Kuchen und etwas Brot teilen', 'correct' => ['einen', 'Kuchen', 'und', 'etwas', 'Brot', 'teilen'], 'extra' => ['Sahne']],
                            'fr' => ['sentence' => 'Partager un gâteau et du pain', 'correct' => ['partager', 'un', 'gâteau', 'et', 'du', 'pain'], 'extra' => ['crème']],
                            'ja' => ['sentence' => 'ケーキと少しのパンを分ける', 'correct' => ['ケーキ', 'と', '少しの', 'パン', 'を', '分ける'], 'extra' => ['クリーム']],
                            'tr' => ['sentence' => 'bir pasta ve biraz ekmek paylaşmak', 'correct' => ['bir', 'pasta', 've', 'biraz', 'ekmek', 'paylaşmak'], 'extra' => ['krema']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 아이스크림 · 사과', 3,
                pictures: [['ko' => '아이스크림', 'img' => 'icecream'], ['ko' => '사과', 'img' => 'apple']],
                plain: [['ko' => '바닐라'], ['ko' => '딸기']],
                phrases: [
                    'a' => [
                        'words' => ['바닐라', '아이스크림'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a vanilla ice cream', 'correct' => ['a', 'vanilla', 'ice cream'], 'extra' => ['strawberry']],
                            'az' => ['sentence' => 'bir vanil dondurma', 'correct' => ['bir', 'vanil', 'dondurma'], 'extra' => ['çiyələk']],
                            'ar' => ['sentence' => 'فانيليا آيس كريم', 'correct' => ['فانيليا', 'آيس كريم'], 'extra' => ['فراولة']],
                            'ru' => ['sentence' => 'ванильный мороженое', 'correct' => ['ванильный', 'мороженое'], 'extra' => ['клубничный']],
                            'es' => ['sentence' => 'Un helado de vainilla', 'correct' => ['un', 'vainilla', 'helado'], 'extra' => ['fresa', 'manzana']],
                            'de' => ['sentence' => 'Ein Vanilleeis', 'correct' => ['ein', 'Vanille', 'Eis'], 'extra' => ['Erdbeere', 'Apfel']],
                            'fr' => ['sentence' => 'Une glace à la vanille', 'correct' => ['une', 'vanille', 'glace'], 'extra' => ['fraise', 'pomme']],
                            'ja' => ['sentence' => 'バニラアイスクリーム', 'correct' => ['バニラ', 'アイスクリーム'], 'extra' => ['いちご']],
                            'tr' => ['sentence' => 'vanilyalı bir dondurma', 'correct' => ['vanilyalı', 'bir', 'dondurma'], 'extra' => ['çilek']],
                        ],
                    ],
                    'b' => [
                        'words' => ['사과', '또는', '딸기'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'an apple or a strawberry', 'correct' => ['an', 'apple', 'or', 'a', 'strawberry'], 'extra' => ['vanilla']],
                            'az' => ['sentence' => 'bir alma və ya bir çiyələk', 'correct' => ['bir', 'alma', 'və ya', 'bir', 'çiyələk'], 'extra' => ['vanil']],
                            'ar' => ['sentence' => 'تفاحة أو فراولة', 'correct' => ['تفاحة', 'أو', 'فراولة'], 'extra' => ['فانيليا']],
                            'ru' => ['sentence' => 'яблоко или клубничный', 'correct' => ['яблоко', 'или', 'клубничный'], 'extra' => ['ванильный']],
                            'es' => ['sentence' => 'Una manzana o una fresa', 'correct' => ['una', 'manzana', 'o', 'una', 'fresa'], 'extra' => ['vainilla']],
                            'de' => ['sentence' => 'Ein Apfel oder eine Erdbeere', 'correct' => ['ein', 'Apfel', 'oder', 'eine', 'Erdbeere'], 'extra' => ['Vanille']],
                            'fr' => ['sentence' => 'Une pomme ou une fraise', 'correct' => ['une', 'pomme', 'ou', 'une', 'fraise'], 'extra' => ['vanille']],
                            'ja' => ['sentence' => 'りんごかいちご', 'correct' => ['りんご', 'か', 'いちご'], 'extra' => ['バニラ']],
                            'tr' => ['sentence' => 'bir elma veya bir çilek', 'correct' => ['bir', 'elma', 'veya', 'bir', 'çilek'], 'extra' => ['vanilya']],
                        ],
                    ],
                    'c' => [
                        'words' => ['바닐라와', '딸기'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the vanilla and the strawberry', 'correct' => ['the', 'vanilla', 'and', 'the', 'strawberry'], 'extra' => ['apple']],
                            'az' => ['sentence' => 'vanil və çiyələk', 'correct' => ['vanil', 'və', 'çiyələk'], 'extra' => ['alma']],
                            'ar' => ['sentence' => 'فانيليا و فراولة', 'correct' => ['فانيليا', 'و', 'فراولة'], 'extra' => ['تفاحة']],
                            'ru' => ['sentence' => 'ванильный и клубничный', 'correct' => ['ванильный', 'и', 'клубничный'], 'extra' => ['яблоко']],
                            'es' => ['sentence' => 'La vainilla y la fresa', 'correct' => ['la', 'vainilla', 'y', 'la', 'fresa'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Die Vanille und die Erdbeere', 'correct' => ['die', 'Vanille', 'und', 'die', 'Erdbeere'], 'extra' => ['Apfel']],
                            'fr' => ['sentence' => 'La vanille et la fraise', 'correct' => ['la', 'vanille', 'et', 'la', 'fraise'], 'extra' => ['pomme']],
                            'ja' => ['sentence' => 'バニラといちご', 'correct' => ['バニラ', 'と', 'いちご'], 'extra' => ['りんご']],
                            'tr' => ['sentence' => 'vanilya ve çilek', 'correct' => ['vanilya', 've', 'çilek'], 'extra' => ['elma']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 사과 · 케이크', 4,
                pictures: [['ko' => '사과', 'img' => 'apple'], ['ko' => '케이크', 'img' => 'cake']],
                plain: [['ko' => '타르트'], ['ko' => '과일']],
                phrases: [
                    'a' => [
                        'words' => ['사과', '타르트'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'an apple tart', 'correct' => ['an', 'apple', 'tart'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'bir alma tart', 'correct' => ['bir', 'alma', 'tart'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'تفاحة فطيرة', 'correct' => ['تفاحة', 'فطيرة'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'яблоко тарт', 'correct' => ['яблоко', 'тарт'], 'extra' => ['фрукт']],
                            'es' => ['sentence' => 'Una tarta de manzana', 'correct' => ['una', 'manzana', 'tarta'], 'extra' => ['fruta', 'pastel']],
                            'de' => ['sentence' => 'Eine Apfeltorte', 'correct' => ['eine', 'Apfel', 'Torte'], 'extra' => ['Obst', 'Kuchen']],
                            'fr' => ['sentence' => 'Une tarte à la pomme', 'correct' => ['une', 'pomme', 'tarte'], 'extra' => ['fruit', 'gâteau']],
                            'ja' => ['sentence' => 'りんごタルト', 'correct' => ['りんご', 'タルト'], 'extra' => ['果物']],
                            'tr' => ['sentence' => 'elmalı bir turta', 'correct' => ['elmalı', 'bir', 'turta'], 'extra' => ['meyve']],
                        ],
                    ],
                    'b' => [
                        'words' => ['신선한', '과일'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a fresh fruit', 'correct' => ['a', 'fresh', 'fruit'], 'extra' => ['tart']],
                            'az' => ['sentence' => 'bir təzə meyvə', 'correct' => ['bir', 'təzə', 'meyvə'], 'extra' => ['tart']],
                            'ar' => ['sentence' => 'طازج فاكهة', 'correct' => ['طازج', 'فاكهة'], 'extra' => ['فطيرة']],
                            'ru' => ['sentence' => 'свежий фрукт', 'correct' => ['свежий', 'фрукт'], 'extra' => ['тарт']],
                            'es' => ['sentence' => 'Una fruta fresca', 'correct' => ['una', 'fresco', 'fruta'], 'extra' => ['tarta', 'manzana']],
                            'de' => ['sentence' => 'Frisches Obst', 'correct' => ['frisches', 'Obst'], 'extra' => ['Torte', 'Apfel']],
                            'fr' => ['sentence' => 'Un fruit frais', 'correct' => ['un', 'fruit', 'frais'], 'extra' => ['tarte']],
                            'ja' => ['sentence' => '新鮮な果物', 'correct' => ['新鮮な', '果物'], 'extra' => ['タルト']],
                            'tr' => ['sentence' => 'taze bir meyve', 'correct' => ['taze', 'bir', 'meyve'], 'extra' => ['turta']],
                        ],
                    ],
                    'c' => [
                        'words' => ['타르트와', '케이크'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a tart and a cake', 'correct' => ['a', 'tart', 'and', 'a', 'cake'], 'extra' => ['fruit']],
                            'az' => ['sentence' => 'bir tart və bir tort', 'correct' => ['bir', 'tart', 'və', 'bir', 'tort'], 'extra' => ['meyvə']],
                            'ar' => ['sentence' => 'فطيرة و كعكة', 'correct' => ['فطيرة', 'و', 'كعكة'], 'extra' => ['فاكهة']],
                            'ru' => ['sentence' => 'тарт и торт', 'correct' => ['тарт', 'и', 'торт'], 'extra' => ['фрукт']],
                            'es' => ['sentence' => 'Una tarta y un pastel', 'correct' => ['una', 'tarta', 'y', 'un', 'pastel'], 'extra' => ['fruta']],
                            'de' => ['sentence' => 'Eine Torte und ein Kuchen', 'correct' => ['eine', 'Torte', 'und', 'ein', 'Kuchen'], 'extra' => ['Obst']],
                            'fr' => ['sentence' => 'Une tarte et un gâteau', 'correct' => ['une', 'tarte', 'et', 'un', 'gâteau'], 'extra' => ['fruit']],
                            'ja' => ['sentence' => 'タルトとケーキ', 'correct' => ['タルト', 'と', 'ケーキ'], 'extra' => ['果物']],
                            'tr' => ['sentence' => 'bir turta ve bir pasta', 'correct' => ['bir', 'turta', 've', 'bir', 'pasta'], 'extra' => ['meyve']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 케이크 · 아이스크림', 5,
                pictures: [['ko' => '케이크', 'img' => 'cake'], ['ko' => '아이스크림', 'img' => 'icecream']],
                plain: [['ko' => '단'], ['ko' => '너무']],
                phrases: [
                    'a' => [
                        'words' => ['단', '케이크'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'a sweet cake', 'correct' => ['a', 'sweet', 'cake'], 'extra' => ['too much']],
                            'az' => ['sentence' => 'bir şirin tort', 'correct' => ['bir', 'şirin', 'tort'], 'extra' => ['çox artıq']],
                            'ar' => ['sentence' => 'حلو كعكة', 'correct' => ['حلو', 'كعكة'], 'extra' => ['كثير جدا']],
                            'ru' => ['sentence' => 'сладкий торт', 'correct' => ['сладкий', 'торт'], 'extra' => ['слишком много']],
                            'es' => ['sentence' => 'Un pastel dulce', 'correct' => ['un', 'pastel', 'dulce'], 'extra' => ['demasiado', 'helado']],
                            'de' => ['sentence' => 'Ein süßer Kuchen', 'correct' => ['ein', 'süß', 'Kuchen'], 'extra' => ['zu viel', 'Eis']],
                            'fr' => ['sentence' => 'Un gâteau sucré', 'correct' => ['un', 'gâteau', 'sucré'], 'extra' => ['trop', 'glace']],
                            'ja' => ['sentence' => '甘いケーキ', 'correct' => ['甘い', 'ケーキ'], 'extra' => ['すぎます']],
                            'tr' => ['sentence' => 'tatlı bir pasta', 'correct' => ['tatlı', 'bir', 'pasta'], 'extra' => ['çok fazla']],
                        ],
                    ],
                    'b' => [
                        'words' => ['그', '아이스크림', '입니다', '너무', '단'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the ice cream is too sweet', 'correct' => ['the', 'ice cream', 'is', 'too much', 'sweet'], 'extra' => ['cake']],
                            'az' => ['sentence' => 'dondurma çox artıq şirin', 'correct' => ['dondurma', 'çox artıq', 'şirin'], 'extra' => ['tort']],
                            'ar' => ['sentence' => 'آيس كريم كثير جدا حلو', 'correct' => ['آيس كريم', 'كثير جدا', 'حلو'], 'extra' => ['كعكة']],
                            'ru' => ['sentence' => 'мороженое слишком много сладкий', 'correct' => ['мороженое', 'слишком много', 'сладкий'], 'extra' => ['торт']],
                            'es' => ['sentence' => 'El helado es demasiado dulce', 'correct' => ['el', 'helado', 'es', 'demasiado', 'dulce'], 'extra' => ['pastel']],
                            'de' => ['sentence' => 'Das Eis ist zu süß', 'correct' => ['das', 'Eis', 'ist', 'zu viel', 'süß'], 'extra' => ['Kuchen']],
                            'fr' => ['sentence' => 'La glace est trop sucrée', 'correct' => ['la', 'glace', 'est', 'trop', 'sucré'], 'extra' => ['gâteau']],
                            'ja' => ['sentence' => 'アイスクリームは甘すぎます', 'correct' => ['アイスクリーム', 'は', '甘すぎます'], 'extra' => ['ケーキ']],
                            'tr' => ['sentence' => 'dondurma çok tatlı', 'correct' => ['dondurma', 'çok', 'tatlı'], 'extra' => ['pasta']],
                        ],
                    ],
                    'c' => [
                        'words' => ['단', '케이크와', '단', '아이스크림'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'a sweet cake and a sweet ice cream', 'correct' => ['a', 'sweet', 'cake', 'and', 'a', 'sweet', 'ice cream'], 'extra' => ['too much']],
                            'az' => ['sentence' => 'bir şirin tort və bir şirin dondurma', 'correct' => ['bir', 'şirin', 'tort', 'və', 'bir', 'şirin', 'dondurma'], 'extra' => ['çox artıq']],
                            'ar' => ['sentence' => 'حلو كعكة و حلو آيس كريم', 'correct' => ['حلو', 'كعكة', 'و', 'حلو', 'آيس كريم'], 'extra' => ['كثير جدا']],
                            'ru' => ['sentence' => 'сладкий торт и сладкий мороженое', 'correct' => ['сладкий', 'торт', 'и', 'сладкий', 'мороженое'], 'extra' => ['слишком много']],
                            'es' => ['sentence' => 'Un pastel dulce y un helado dulce', 'correct' => ['un', 'pastel', 'dulce', 'y', 'un', 'helado', 'dulce'], 'extra' => ['demasiado']],
                            'de' => ['sentence' => 'Ein süßer Kuchen und ein süßes Eis', 'correct' => ['ein', 'süß', 'Kuchen', 'und', 'ein', 'süß', 'Eis'], 'extra' => ['zu viel']],
                            'fr' => ['sentence' => 'Un gâteau sucré et une glace sucrée', 'correct' => ['un', 'sucré', 'gâteau', 'et', 'un', 'sucré', 'glace'], 'extra' => ['trop']],
                            'ja' => ['sentence' => '甘いケーキと甘いアイスクリーム', 'correct' => ['甘い', 'ケーキ', 'と', '甘い', 'アイスクリーム'], 'extra' => ['すぎます']],
                            'tr' => ['sentence' => 'tatlı bir pasta ve tatlı bir dondurma', 'correct' => ['tatlı', 'bir', 'pasta', 've', 'tatlı', 'bir', 'dondurma'], 'extra' => ['çok fazla']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
