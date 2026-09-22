<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitRestaurant02Seeder extends Seeder
{
    private const PICTURES = [
        'Menu' => 'menu', 'Gâteau' => 'cake', 'Vin' => 'wine', 'Jus' => 'juice',
        'Salade' => 'salad', 'Glace' => 'icecream', 'Sandwich' => 'sandwich',
        'Café' => 'coffee', 'Poulet' => 'chicken', 'Riz' => 'rice',
    ];

    /**
     * French Chapter 3, Unit 2 — reading the menu and asking prices.
     *
     * Prices reuse the numbers from Chapter 1 Unit 2 (dix, trois), so the only
     * new load here is the money language itself: prix, combien, coûte, cher,
     * euros, total. The dishes stay familiar on purpose — a learner should be
     * spending their attention on the number, not on decoding the food.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Restaurant)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 2, 'Unit 2: Menu and Prices', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: How Much Is It', 1,
                pictures: [['fr' => 'Menu', 'img' => 'menu'], ['fr' => 'Gâteau', 'img' => 'cake']],
                plain: [['fr' => 'Prix'], ['fr' => 'Combien']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'prix', 'du', 'menu'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The price of the menu', 'correct' => ['the', 'price', 'of the', 'menu'], 'extra' => ['cake', 'how much']],
                            'az' => ['sentence' => 'qiymət menyu', 'correct' => ['qiymət', 'menyu'], 'extra' => ['tort', 'neçəyə']],
                            'ar' => ['sentence' => 'سعر قائمة الطعام', 'correct' => ['سعر', 'قائمة الطعام'], 'extra' => ['كعكة', 'كم']],
                            'ru' => ['sentence' => 'цена меню', 'correct' => ['цена', 'меню'], 'extra' => ['торт', 'сколько']],
                            'es' => ['sentence' => 'El precio del menú', 'correct' => ['el', 'precio', 'del', 'menú'], 'extra' => ['pastel', 'cuánto']],
                            'de' => ['sentence' => 'Der Preis des Menüs', 'correct' => ['der', 'Preis', 'des', 'Menüs'], 'extra' => ['Kuchen', 'wie viel']],
                            'ja' => ['sentence' => 'メニューの値段', 'correct' => ['メニュー', 'の', '値段'], 'extra' => ['ケーキ']],
                            'ko' => ['sentence' => '메뉴의 가격', 'correct' => ['메뉴의', '가격'], 'extra' => ['케이크']],
                            'tr' => ['sentence' => 'menünün fiyatı', 'correct' => ['menünün', 'fiyatı'], 'extra' => ['pasta', 'kaç para']],
                        ],
                    ],
                    'b' => [
                        'words' => ['combien', 'coûte', 'le', 'gâteau'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'How much does the cake cost', 'correct' => ['how much', 'costs', 'the', 'cake'], 'extra' => ['price', 'menu']],
                            'az' => ['sentence' => 'neçəyə qiyməti tort', 'correct' => ['neçəyə', 'qiyməti', 'tort'], 'extra' => ['qiymət', 'menyu']],
                            'ar' => ['sentence' => 'كم يكلف كعكة', 'correct' => ['كم', 'يكلف', 'كعكة'], 'extra' => ['سعر', 'قائمة الطعام']],
                            'ru' => ['sentence' => 'сколько стоит торт', 'correct' => ['сколько', 'стоит', 'торт'], 'extra' => ['цена', 'меню']],
                            'es' => ['sentence' => 'Cuánto cuesta el pastel', 'correct' => ['cuánto', 'cuesta', 'el', 'pastel'], 'extra' => ['precio', 'menú']],
                            'de' => ['sentence' => 'Wie viel kostet der Kuchen', 'correct' => ['wie viel', 'kostet', 'der', 'Kuchen'], 'extra' => ['Preis', 'Menü']],
                            'ja' => ['sentence' => 'ケーキはいくらかかりますか', 'correct' => ['ケーキ', 'は', 'いくら', 'かかりますか'], 'extra' => ['値段']],
                            'ko' => ['sentence' => '케이크는 얼마입니까', 'correct' => ['케이크는', '얼마입니까'], 'extra' => ['가격']],
                            'tr' => ['sentence' => 'pasta kaç lira', 'correct' => ['pasta', 'kaç', 'lira'], 'extra' => ['fiyat', 'menü']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'prix', 'du', 'gâteau'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The price of the cake', 'correct' => ['the', 'price', 'of the', 'cake'], 'extra' => ['menu', 'how much']],
                            'az' => ['sentence' => 'qiymət tort', 'correct' => ['qiymət', 'tort'], 'extra' => ['menyu', 'neçəyə']],
                            'ar' => ['sentence' => 'سعر كعكة', 'correct' => ['سعر', 'كعكة'], 'extra' => ['قائمة الطعام', 'كم']],
                            'ru' => ['sentence' => 'цена торт', 'correct' => ['цена', 'торт'], 'extra' => ['меню', 'сколько']],
                            'es' => ['sentence' => 'El precio del pastel', 'correct' => ['el', 'precio', 'del', 'pastel'], 'extra' => ['menú', 'cuánto']],
                            'de' => ['sentence' => 'Der Preis des Kuchens', 'correct' => ['der', 'Preis', 'des', 'Kuchens'], 'extra' => ['Menü', 'wie viel']],
                            'ja' => ['sentence' => 'ケーキの値段', 'correct' => ['ケーキ', 'の', '値段'], 'extra' => ['メニュー']],
                            'ko' => ['sentence' => '케이크의 가격', 'correct' => ['케이크의', '가격'], 'extra' => ['메뉴']],
                            'tr' => ['sentence' => 'pastanın fiyatı', 'correct' => ['pastanın', 'fiyatı'], 'extra' => ['menü', 'kaç para']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Expensive or Cheap', 2,
                pictures: [['fr' => 'Vin', 'img' => 'wine'], ['fr' => 'Jus', 'img' => 'juice']],
                plain: [['fr' => 'Cher'], ['fr' => 'Euros']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'vin', 'est', 'cher'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The wine is expensive', 'correct' => ['the', 'wine', 'is', 'expensive'], 'extra' => ['juice', 'euros']],
                            'az' => ['sentence' => 'şərab bahalı', 'correct' => ['şərab', 'bahalı'], 'extra' => ['şirə', 'avro']],
                            'ar' => ['sentence' => 'نبيذ غالي', 'correct' => ['نبيذ', 'غالي'], 'extra' => ['عصير', 'يورو']],
                            'ru' => ['sentence' => 'вино дорогой', 'correct' => ['вино', 'дорогой'], 'extra' => ['сок', 'евро']],
                            'es' => ['sentence' => 'El vino es caro', 'correct' => ['el', 'vino', 'es', 'caro'], 'extra' => ['zumo', 'euros']],
                            'de' => ['sentence' => 'Der Wein ist teuer', 'correct' => ['der', 'Wein', 'ist', 'teuer'], 'extra' => ['Saft', 'Euro']],
                            'ja' => ['sentence' => 'ワインは高いです', 'correct' => ['ワイン', 'は', '高い', 'です'], 'extra' => ['ジュース']],
                            'ko' => ['sentence' => '와인은 비쌉니다', 'correct' => ['와인은', '비쌉니다'], 'extra' => ['주스']],
                            'tr' => ['sentence' => 'şarap pahalı', 'correct' => ['şarap', 'pahalı'], 'extra' => ['meyve suyu', 'euro']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'jus', 'coûte', 'dix', 'euros'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The juice costs ten euros', 'correct' => ['the', 'juice', 'costs', 'ten', 'euros'], 'extra' => ['wine', 'expensive']],
                            'az' => ['sentence' => 'şirə qiyməti on avro', 'correct' => ['şirə', 'qiyməti', 'on', 'avro'], 'extra' => ['şərab', 'bahalı']],
                            'ar' => ['sentence' => 'عصير يكلف عشرة يورو', 'correct' => ['عصير', 'يكلف', 'عشرة', 'يورو'], 'extra' => ['نبيذ', 'غالي']],
                            'ru' => ['sentence' => 'сок стоит десять евро', 'correct' => ['сок', 'стоит', 'десять', 'евро'], 'extra' => ['вино', 'дорогой']],
                            'es' => ['sentence' => 'El zumo cuesta diez euros', 'correct' => ['el', 'zumo', 'cuesta', 'diez', 'euros'], 'extra' => ['vino', 'caro']],
                            'de' => ['sentence' => 'Der Saft kostet zehn Euro', 'correct' => ['der', 'Saft', 'kostet', 'zehn', 'Euro'], 'extra' => ['Wein', 'teuer']],
                            'ja' => ['sentence' => 'ジュースは十ユーロかかります', 'correct' => ['ジュース', 'は', '十', 'ユーロ', 'かかります'], 'extra' => ['ワイン']],
                            'ko' => ['sentence' => '주스는 십 유로입니다', 'correct' => ['주스는', '십', '유로입니다'], 'extra' => ['와인']],
                            'tr' => ['sentence' => 'meyve suyu on euro', 'correct' => ['meyve', 'suyu', 'on', 'euro'], 'extra' => ['şarap', 'pahalı']],
                        ],
                    ],
                    'c' => [
                        'words' => ['le', 'vin', 'coûte', 'trop', 'cher'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'The wine costs too much', 'correct' => ['the', 'wine', 'costs', 'too', 'expensive'], 'extra' => ['juice', 'euros']],
                            'az' => ['sentence' => 'şərab qiyməti də bahalı', 'correct' => ['şərab', 'qiyməti', 'də', 'bahalı'], 'extra' => ['şirə', 'avro']],
                            'ar' => ['sentence' => 'نبيذ يكلف أيضا غالي', 'correct' => ['نبيذ', 'يكلف', 'أيضا', 'غالي'], 'extra' => ['عصير', 'يورو']],
                            'ru' => ['sentence' => 'вино стоит тоже дорогой', 'correct' => ['вино', 'стоит', 'тоже', 'дорогой'], 'extra' => ['сок', 'евро']],
                            'es' => ['sentence' => 'El vino cuesta demasiado caro', 'correct' => ['el', 'vino', 'cuesta', 'demasiado', 'caro'], 'extra' => ['zumo', 'euros']],
                            'de' => ['sentence' => 'Der Wein kostet zu viel', 'correct' => ['der', 'Wein', 'kostet', 'zu', 'teuer'], 'extra' => ['Saft', 'Euro']],
                            'ja' => ['sentence' => 'ワインは高すぎます', 'correct' => ['ワイン', 'は', '高', 'すぎます'], 'extra' => ['ジュース']],
                            'ko' => ['sentence' => '와인은 너무 비쌉니다', 'correct' => ['와인은', '너무', '비쌉니다'], 'extra' => ['주스']],
                            'tr' => ['sentence' => 'şarap çok pahalı', 'correct' => ['şarap', 'çok', 'pahalı'], 'extra' => ['meyve suyu', 'euro']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Starter and Dessert', 3,
                pictures: [['fr' => 'Salade', 'img' => 'salad'], ['fr' => 'Glace', 'img' => 'icecream']],
                plain: [['fr' => 'Entrée'], ['fr' => 'Dessert']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'entrée', 'et', 'un', 'dessert'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A starter and a dessert', 'correct' => ['a', 'starter', 'and', 'a', 'dessert'], 'extra' => ['salad', 'ice cream']],
                            'az' => ['sentence' => 'bir qəlyanaltı və bir şirniyyat', 'correct' => ['bir', 'qəlyanaltı', 'və', 'bir', 'şirniyyat'], 'extra' => ['salat', 'dondurma']],
                            'ar' => ['sentence' => 'مقبلات و حلوى', 'correct' => ['مقبلات', 'و', 'حلوى'], 'extra' => ['سلطة', 'آيس كريم']],
                            'ru' => ['sentence' => 'закуска и десерт', 'correct' => ['закуска', 'и', 'десерт'], 'extra' => ['салат', 'мороженое']],
                            'es' => ['sentence' => 'Un entrante y un postre', 'correct' => ['un', 'entrante', 'y', 'un', 'postre'], 'extra' => ['ensalada', 'helado']],
                            'de' => ['sentence' => 'Eine Vorspeise und ein Nachtisch', 'correct' => ['eine', 'Vorspeise', 'und', 'ein', 'Nachtisch'], 'extra' => ['Salat', 'Eis']],
                            'ja' => ['sentence' => '前菜とデザート', 'correct' => ['前菜', 'と', 'デザート'], 'extra' => ['サラダ']],
                            'ko' => ['sentence' => '전채와 디저트', 'correct' => ['전채와', '디저트'], 'extra' => ['샐러드']],
                            'tr' => ['sentence' => 'bir başlangıç ve bir tatlı', 'correct' => ['bir', 'başlangıç', 've', 'bir', 'tatlı'], 'extra' => ['salata', 'dondurma']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'glace', 'est', 'le', 'dessert'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The ice cream is the dessert', 'correct' => ['the', 'ice cream', 'is', 'the', 'dessert'], 'extra' => ['starter', 'salad']],
                            'az' => ['sentence' => 'dondurma şirniyyat', 'correct' => ['dondurma', 'şirniyyat'], 'extra' => ['qəlyanaltı', 'salat']],
                            'ar' => ['sentence' => 'آيس كريم حلوى', 'correct' => ['آيس كريم', 'حلوى'], 'extra' => ['مقبلات', 'سلطة']],
                            'ru' => ['sentence' => 'мороженое десерт', 'correct' => ['мороженое', 'десерт'], 'extra' => ['закуска', 'салат']],
                            'es' => ['sentence' => 'El helado es el postre', 'correct' => ['el', 'helado', 'es', 'el', 'postre'], 'extra' => ['entrante', 'ensalada']],
                            'de' => ['sentence' => 'Das Eis ist der Nachtisch', 'correct' => ['das', 'Eis', 'ist', 'der', 'Nachtisch'], 'extra' => ['Vorspeise', 'Salat']],
                            'ja' => ['sentence' => 'アイスクリームはデザートです', 'correct' => ['アイスクリーム', 'は', 'デザート', 'です'], 'extra' => ['前菜']],
                            'ko' => ['sentence' => '아이스크림은 디저트입니다', 'correct' => ['아이스크림은', '디저트입니다'], 'extra' => ['전채']],
                            'tr' => ['sentence' => 'dondurma tatlıdır', 'correct' => ['dondurma', 'tatlıdır'], 'extra' => ['başlangıç', 'salata']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'salade', 'ou', 'une', 'glace'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A salad or an ice cream', 'correct' => ['a', 'salad', 'or', 'an', 'ice cream'], 'extra' => ['starter', 'dessert']],
                            'az' => ['sentence' => 'bir salat və ya bir dondurma', 'correct' => ['bir', 'salat', 'və ya', 'bir', 'dondurma'], 'extra' => ['qəlyanaltı', 'şirniyyat']],
                            'ar' => ['sentence' => 'سلطة أو آيس كريم', 'correct' => ['سلطة', 'أو', 'آيس كريم'], 'extra' => ['مقبلات', 'حلوى']],
                            'ru' => ['sentence' => 'салат или мороженое', 'correct' => ['салат', 'или', 'мороженое'], 'extra' => ['закуска', 'десерт']],
                            'es' => ['sentence' => 'Una ensalada o un helado', 'correct' => ['una', 'ensalada', 'o', 'un', 'helado'], 'extra' => ['entrante', 'postre']],
                            'de' => ['sentence' => 'Ein Salat oder ein Eis', 'correct' => ['ein', 'Salat', 'oder', 'ein', 'Eis'], 'extra' => ['Vorspeise', 'Nachtisch']],
                            'ja' => ['sentence' => 'サラダかアイスクリーム', 'correct' => ['サラダ', 'か', 'アイスクリーム'], 'extra' => ['デザート']],
                            'ko' => ['sentence' => '샐러드 또는 아이스크림', 'correct' => ['샐러드', '또는', '아이스크림'], 'extra' => ['디저트']],
                            'tr' => ['sentence' => 'bir salata veya bir dondurma', 'correct' => ['bir', 'salata', 'veya', 'bir', 'dondurma'], 'extra' => ['başlangıç', 'tatlı']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: The Total', 4,
                pictures: [['fr' => 'Sandwich', 'img' => 'sandwich'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Total'], ['fr' => 'Chaque']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'total', 'est', 'dix', 'euros'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The total is ten euros', 'correct' => ['the', 'total', 'is', 'ten', 'euros'], 'extra' => ['each', 'sandwich']],
                            'az' => ['sentence' => 'cəmi on avro', 'correct' => ['cəmi', 'on', 'avro'], 'extra' => ['hər biri', 'sendviç']],
                            'ar' => ['sentence' => 'المجموع عشرة يورو', 'correct' => ['المجموع', 'عشرة', 'يورو'], 'extra' => ['كل', 'شطيرة']],
                            'ru' => ['sentence' => 'итого десять евро', 'correct' => ['итого', 'десять', 'евро'], 'extra' => ['каждый', 'сэндвич']],
                            'es' => ['sentence' => 'El total es diez euros', 'correct' => ['el', 'total', 'es', 'diez', 'euros'], 'extra' => ['cada', 'sándwich']],
                            'de' => ['sentence' => 'Das Gesamt ist zehn Euro', 'correct' => ['das', 'Gesamt', 'ist', 'zehn', 'Euro'], 'extra' => ['jeder', 'Sandwich']],
                            'ja' => ['sentence' => '合計は十ユーロです', 'correct' => ['合計', 'は', '十', 'ユーロ', 'です'], 'extra' => ['サンドイッチ']],
                            'ko' => ['sentence' => '총액은 십 유로입니다', 'correct' => ['총액은', '십', '유로입니다'], 'extra' => ['샌드위치']],
                            'tr' => ['sentence' => 'toplam on euro', 'correct' => ['toplam', 'on', 'euro'], 'extra' => ['her', 'sandviç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['chaque', 'sandwich', 'coûte', 'trois', 'euros'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Each sandwich costs three euros', 'correct' => ['each', 'sandwich', 'costs', 'three', 'euros'], 'extra' => ['total', 'coffee']],
                            'az' => ['sentence' => 'hər biri sendviç qiyməti üç avro', 'correct' => ['hər biri', 'sendviç', 'qiyməti', 'üç', 'avro'], 'extra' => ['cəmi', 'qəhvə']],
                            'ar' => ['sentence' => 'كل شطيرة يكلف ثلاثة يورو', 'correct' => ['كل', 'شطيرة', 'يكلف', 'ثلاثة', 'يورو'], 'extra' => ['المجموع', 'قهوة']],
                            'ru' => ['sentence' => 'каждый сэндвич стоит три евро', 'correct' => ['каждый', 'сэндвич', 'стоит', 'три', 'евро'], 'extra' => ['итого', 'кофе']],
                            'es' => ['sentence' => 'Cada sándwich cuesta tres euros', 'correct' => ['cada', 'sándwich', 'cuesta', 'tres', 'euros'], 'extra' => ['total', 'café']],
                            'de' => ['sentence' => 'Jedes Sandwich kostet drei Euro', 'correct' => ['jeder', 'Sandwich', 'kostet', 'drei', 'Euro'], 'extra' => ['Gesamt', 'Kaffee']],
                            'ja' => ['sentence' => 'サンドイッチはそれぞれ三ユーロです', 'correct' => ['サンドイッチ', 'は', 'それぞれ', '三', 'ユーロ', 'です'], 'extra' => ['合計']],
                            'ko' => ['sentence' => '각각의 샌드위치는 삼 유로입니다', 'correct' => ['각각의', '샌드위치는', '삼', '유로입니다'], 'extra' => ['총액']],
                            'tr' => ['sentence' => 'her sandviç üç euro', 'correct' => ['her', 'sandviç', 'üç', 'euro'], 'extra' => ['toplam', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'café', 'et', 'un', 'sandwich'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee and a sandwich', 'correct' => ['a', 'coffee', 'and', 'a', 'sandwich'], 'extra' => ['total', 'each']],
                            'az' => ['sentence' => 'bir qəhvə və bir sendviç', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'sendviç'], 'extra' => ['cəmi', 'hər biri']],
                            'ar' => ['sentence' => 'قهوة و شطيرة', 'correct' => ['قهوة', 'و', 'شطيرة'], 'extra' => ['المجموع', 'كل']],
                            'ru' => ['sentence' => 'кофе и сэндвич', 'correct' => ['кофе', 'и', 'сэндвич'], 'extra' => ['итого', 'каждый']],
                            'es' => ['sentence' => 'Un café y un sándwich', 'correct' => ['un', 'café', 'y', 'un', 'sándwich'], 'extra' => ['total', 'cada']],
                            'de' => ['sentence' => 'Ein Kaffee und ein Sandwich', 'correct' => ['ein', 'Kaffee', 'und', 'ein', 'Sandwich'], 'extra' => ['Gesamt', 'jeder']],
                            'ja' => ['sentence' => 'コーヒーとサンドイッチ', 'correct' => ['コーヒー', 'と', 'サンドイッチ'], 'extra' => ['合計']],
                            'ko' => ['sentence' => '커피와 샌드위치', 'correct' => ['커피와', '샌드위치'], 'extra' => ['총액']],
                            'tr' => ['sentence' => 'bir kahve ve bir sandviç', 'correct' => ['bir', 'kahve', 've', 'bir', 'sandviç'], 'extra' => ['toplam', 'her']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Choosing a Drink', 5,
                pictures: [['fr' => 'Poulet', 'img' => 'chicken'], ['fr' => 'Riz', 'img' => 'rice']],
                plain: [['fr' => 'Choisir'], ['fr' => 'Boisson']],
                phrases: [
                    'a' => [
                        'words' => ['je voudrais', 'choisir'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I would like to choose', 'correct' => ['I would like', 'to choose'], 'extra' => ['drink', 'rice']],
                            'az' => ['sentence' => 'istəyirəm seçmək', 'correct' => ['istəyirəm', 'seçmək'], 'extra' => ['içki', 'düyü']],
                            'ar' => ['sentence' => 'أريد الاختيار', 'correct' => ['أريد', 'الاختيار'], 'extra' => ['مشروب', 'أرز']],
                            'ru' => ['sentence' => 'я хочу выбрать', 'correct' => ['я', 'хочу', 'выбрать'], 'extra' => ['напиток', 'рис']],
                            'es' => ['sentence' => 'Quisiera elegir', 'correct' => ['quisiera', 'elegir'], 'extra' => ['bebida', 'arroz']],
                            'de' => ['sentence' => 'Ich möchte wählen', 'correct' => ['ich möchte', 'wählen'], 'extra' => ['Getränk', 'Reis']],
                            'ja' => ['sentence' => '選びたいです', 'correct' => ['選び', 'たいです'], 'extra' => ['飲み物']],
                            'ko' => ['sentence' => '고르고 싶습니다', 'correct' => ['고르고', '싶습니다'], 'extra' => ['음료']],
                            'tr' => ['sentence' => 'seçmek istiyorum', 'correct' => ['seçmek', 'istiyorum'], 'extra' => ['iç', 'pirinç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'boisson', 'avec', 'le', 'poulet'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A drink with the chicken', 'correct' => ['a', 'drink', 'with', 'the', 'chicken'], 'extra' => ['to choose', 'rice']],
                            'az' => ['sentence' => 'bir içki ilə toyuq', 'correct' => ['bir', 'içki', 'ilə', 'toyuq'], 'extra' => ['seçmək', 'düyü']],
                            'ar' => ['sentence' => 'مشروب مع دجاج', 'correct' => ['مشروب', 'مع', 'دجاج'], 'extra' => ['الاختيار', 'أرز']],
                            'ru' => ['sentence' => 'напиток с курица', 'correct' => ['напиток', 'с', 'курица'], 'extra' => ['выбрать', 'рис']],
                            'es' => ['sentence' => 'Una bebida con el pollo', 'correct' => ['una', 'bebida', 'con', 'el', 'pollo'], 'extra' => ['elegir', 'arroz']],
                            'de' => ['sentence' => 'Ein Getränk mit dem Hähnchen', 'correct' => ['ein', 'Getränk', 'mit', 'dem', 'Hähnchen'], 'extra' => ['wählen', 'Reis']],
                            'ja' => ['sentence' => '鶏肉と一緒に飲み物', 'correct' => ['鶏肉', 'と一緒に', '飲み物'], 'extra' => ['選ぶ']],
                            'ko' => ['sentence' => '닭고기와 함께 음료', 'correct' => ['닭고기와', '함께', '음료'], 'extra' => ['고르다']],
                            'tr' => ['sentence' => 'tavukla bir içecek', 'correct' => ['tavukla', 'bir', 'içecek'], 'extra' => ['seçmek', 'pirinç']],
                        ],
                    ],
                    'c' => [
                        'words' => ['choisir', 'le', 'riz'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To choose the rice', 'correct' => ['to choose', 'the', 'rice'], 'extra' => ['drink', 'chicken']],
                            'az' => ['sentence' => 'seçmək düyü', 'correct' => ['seçmək', 'düyü'], 'extra' => ['içki', 'toyuq']],
                            'ar' => ['sentence' => 'الاختيار أرز', 'correct' => ['الاختيار', 'أرز'], 'extra' => ['مشروب', 'دجاج']],
                            'ru' => ['sentence' => 'выбрать рис', 'correct' => ['выбрать', 'рис'], 'extra' => ['напиток', 'курица']],
                            'es' => ['sentence' => 'Elegir el arroz', 'correct' => ['elegir', 'el', 'arroz'], 'extra' => ['bebida', 'pollo']],
                            'de' => ['sentence' => 'Den Reis wählen', 'correct' => ['den', 'Reis', 'wählen'], 'extra' => ['Getränk', 'Hähnchen']],
                            'ja' => ['sentence' => 'ご飯を選ぶ', 'correct' => ['ご飯', 'を', '選ぶ'], 'extra' => ['飲み物']],
                            'ko' => ['sentence' => '밥을 고르다', 'correct' => ['밥을', '고르다'], 'extra' => ['음료']],
                            'tr' => ['sentence' => 'pirinci seçmek', 'correct' => ['pirinci', 'seçmek'], 'extra' => ['iç', 'tavuk']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
