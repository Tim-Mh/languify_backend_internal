<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket01Seeder extends Seeder
{
    private const PICTURES = [
        'Liste' => 'list', 'Chariot' => 'cart', 'Rayon' => 'shelf', 'Panier' => 'basket',
        'Caisse' => 'checkout', 'Boîte' => 'box', 'Magasin' => 'shop', 'Argent' => 'money',
    ];

    /**
     * French Chapter 4, Unit 1 — walking into the shop.
     *
     * Chapter 4 is the last content chapter, so it is deliberately a
     * consolidation chapter: it adds the shopping vocabulary a learner still
     * needs (chariot, panier, rayon, caisse) while putting Chapters 1-3 words
     * back to work in a new setting. This first unit is the physical stuff you
     * pick up before you buy anything.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 1, 'Unit 1: Finding Your Way', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: The Shopping List', 1,
                pictures: [['fr' => 'Liste', 'img' => 'list'], ['fr' => 'Chariot', 'img' => 'cart']],
                plain: [['fr' => 'Supermarché'], ['fr' => 'Chercher']],
                phrases: [
                    'a' => [
                        'words' => ['ma', 'liste', 'pour', 'le', 'supermarché'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My list for the supermarket', 'correct' => ['my', 'list', 'for', 'the', 'supermarket'], 'extra' => ['trolley', 'to look for']],
                            'az' => ['sentence' => 'mənim siyahı üçün supermarket', 'correct' => ['mənim', 'siyahı', 'üçün', 'supermarket'], 'extra' => ['araba', 'axtarmaq']],
                            'ar' => ['sentence' => 'قائمة لأجل سوبرماركت', 'correct' => ['قائمة', 'لأجل', 'سوبرماركت'], 'extra' => ['عربة', 'البحث']],
                            'ru' => ['sentence' => 'мой список для супермаркет', 'correct' => ['мой', 'список', 'для', 'супермаркет'], 'extra' => ['тележка', 'искать']],
                            'es' => ['sentence' => 'Mi lista para el supermercado', 'correct' => ['mi', 'lista', 'para', 'el', 'supermercado'], 'extra' => ['carrito', 'buscar']],
                            'de' => ['sentence' => 'Meine Liste für den Supermarkt', 'correct' => ['meine', 'Liste', 'für', 'den', 'Supermarkt'], 'extra' => ['Einkaufswagen', 'suchen']],
                            'ja' => ['sentence' => 'スーパーのための私のリスト', 'correct' => ['スーパー', 'の', 'ため', 'の', '私の', 'リスト'], 'extra' => ['カート']],
                            'ko' => ['sentence' => '슈퍼마켓을 위한 제 목록', 'correct' => ['슈퍼마켓을', '위한', '제', '목록'], 'extra' => ['카트']],
                            'tr' => ['sentence' => 'market için listem', 'correct' => ['market', 'için', 'listem'], 'extra' => ['araba', 'aramak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['chercher', 'un', 'chariot'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To look for a trolley', 'correct' => ['to look for', 'a', 'trolley'], 'extra' => ['list', 'supermarket']],
                            'az' => ['sentence' => 'axtarmaq bir araba', 'correct' => ['axtarmaq', 'bir', 'araba'], 'extra' => ['siyahı', 'supermarket']],
                            'ar' => ['sentence' => 'البحث عربة', 'correct' => ['البحث', 'عربة'], 'extra' => ['قائمة', 'سوبرماركت']],
                            'ru' => ['sentence' => 'искать тележка', 'correct' => ['искать', 'тележка'], 'extra' => ['список', 'супермаркет']],
                            'es' => ['sentence' => 'Buscar un carrito', 'correct' => ['buscar', 'un', 'carrito'], 'extra' => ['lista', 'supermercado']],
                            'de' => ['sentence' => 'Einen Einkaufswagen suchen', 'correct' => ['einen', 'Einkaufswagen', 'suchen'], 'extra' => ['Liste', 'Supermarkt']],
                            'ja' => ['sentence' => 'カートを探す', 'correct' => ['カート', 'を', '探す'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '카트를 찾다', 'correct' => ['카트를', '찾다'], 'extra' => ['목록']],
                            'tr' => ['sentence' => 'bir araba aramak', 'correct' => ['bir', 'araba', 'aramak'], 'extra' => ['liste', 'market']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'chariot', 'et', 'une', 'liste'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'A trolley and a list', 'correct' => ['a', 'trolley', 'and', 'a', 'list'], 'extra' => ['to look for', 'supermarket']],
                            'az' => ['sentence' => 'bir araba və bir siyahı', 'correct' => ['bir', 'araba', 'və', 'bir', 'siyahı'], 'extra' => ['axtarmaq', 'supermarket']],
                            'ar' => ['sentence' => 'عربة و قائمة', 'correct' => ['عربة', 'و', 'قائمة'], 'extra' => ['البحث', 'سوبرماركت']],
                            'ru' => ['sentence' => 'тележка и список', 'correct' => ['тележка', 'и', 'список'], 'extra' => ['искать', 'супермаркет']],
                            'es' => ['sentence' => 'Un carrito y una lista', 'correct' => ['un', 'carrito', 'y', 'una', 'lista'], 'extra' => ['buscar', 'supermercado']],
                            'de' => ['sentence' => 'Ein Einkaufswagen und eine Liste', 'correct' => ['ein', 'Einkaufswagen', 'und', 'eine', 'Liste'], 'extra' => ['suchen', 'Supermarkt']],
                            'ja' => ['sentence' => 'カートとリスト', 'correct' => ['カート', 'と', 'リスト'], 'extra' => ['探す']],
                            'ko' => ['sentence' => '카트와 목록', 'correct' => ['카트와', '목록'], 'extra' => ['찾다']],
                            'tr' => ['sentence' => 'bir araba ve bir liste', 'correct' => ['bir', 'araba', 've', 'bir', 'liste'], 'extra' => ['aramak', 'market']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Which Aisle', 2,
                pictures: [['fr' => 'Rayon', 'img' => 'shelf'], ['fr' => 'Panier', 'img' => 'basket']],
                plain: [['fr' => 'Trouver'], ['fr' => 'Où']],
                phrases: [
                    'a' => [
                        'words' => ['où', 'est', 'le', 'rayon'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Where is the aisle', 'correct' => ['where', 'is', 'the', 'aisle'], 'extra' => ['to find', 'basket']],
                            'az' => ['sentence' => 'harada şöbə', 'correct' => ['harada', 'şöbə'], 'extra' => ['tapmaq', 'səbət']],
                            'ar' => ['sentence' => 'أين قسم', 'correct' => ['أين', 'قسم'], 'extra' => ['العثور', 'سلة']],
                            'ru' => ['sentence' => 'где отдел', 'correct' => ['где', 'отдел'], 'extra' => ['найти', 'корзина']],
                            'es' => ['sentence' => 'Dónde está el pasillo', 'correct' => ['dónde', 'está', 'el', 'pasillo'], 'extra' => ['encontrar', 'cesta']],
                            'de' => ['sentence' => 'Wo ist das Regal', 'correct' => ['wo', 'ist', 'das', 'Regal'], 'extra' => ['finden', 'Korb']],
                            'ja' => ['sentence' => '売り場はどこですか', 'correct' => ['売り場', 'は', 'どこですか'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '진열대는 어디입니까', 'correct' => ['진열대는', '어디입니까'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'reyon nerede', 'correct' => ['reyon', 'nerede'], 'extra' => ['bulmak', 'sepet']],
                        ],
                    ],
                    'b' => [
                        'words' => ['trouver', 'un', 'panier'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To find a basket', 'correct' => ['to find', 'a', 'basket'], 'extra' => ['where', 'aisle']],
                            'az' => ['sentence' => 'tapmaq bir səbət', 'correct' => ['tapmaq', 'bir', 'səbət'], 'extra' => ['harada', 'şöbə']],
                            'ar' => ['sentence' => 'العثور سلة', 'correct' => ['العثور', 'سلة'], 'extra' => ['أين', 'قسم']],
                            'ru' => ['sentence' => 'найти корзина', 'correct' => ['найти', 'корзина'], 'extra' => ['где', 'отдел']],
                            'es' => ['sentence' => 'Encontrar una cesta', 'correct' => ['encontrar', 'una', 'cesta'], 'extra' => ['dónde', 'pasillo']],
                            'de' => ['sentence' => 'Einen Korb finden', 'correct' => ['einen', 'Korb', 'finden'], 'extra' => ['wo', 'Regal']],
                            'ja' => ['sentence' => 'かごを見つける', 'correct' => ['かご', 'を', '見つける'], 'extra' => ['売り場']],
                            'ko' => ['sentence' => '바구니를 발견하다', 'correct' => ['바구니를', '발견하다'], 'extra' => ['진열대']],
                            'tr' => ['sentence' => 'bir sepet bulmak', 'correct' => ['bir', 'sepet', 'bulmak'], 'extra' => ['nerede', 'reyon']],
                        ],
                    ],
                    'c' => [
                        'words' => ['trouver', 'le', 'rayon'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To find the aisle', 'correct' => ['to find', 'the', 'aisle'], 'extra' => ['where', 'basket']],
                            'az' => ['sentence' => 'tapmaq şöbə', 'correct' => ['tapmaq', 'şöbə'], 'extra' => ['harada', 'səbət']],
                            'ar' => ['sentence' => 'العثور قسم', 'correct' => ['العثور', 'قسم'], 'extra' => ['أين', 'سلة']],
                            'ru' => ['sentence' => 'найти отдел', 'correct' => ['найти', 'отдел'], 'extra' => ['где', 'корзина']],
                            'es' => ['sentence' => 'Encontrar el pasillo', 'correct' => ['encontrar', 'el', 'pasillo'], 'extra' => ['dónde', 'cesta']],
                            'de' => ['sentence' => 'Das Regal finden', 'correct' => ['das', 'Regal', 'finden'], 'extra' => ['wo', 'Korb']],
                            'ja' => ['sentence' => '売り場を見つける', 'correct' => ['売り場', 'を', '見つける'], 'extra' => ['かご']],
                            'ko' => ['sentence' => '진열대를 발견하다', 'correct' => ['진열대를', '발견하다'], 'extra' => ['바구니']],
                            'tr' => ['sentence' => 'reyonu bulmak', 'correct' => ['reyonu', 'bulmak'], 'extra' => ['nerede', 'sepet']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Buying Here', 3,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Caisse', 'img' => 'checkout']],
                plain: [['fr' => 'Acheter'], ['fr' => 'Ici']],
                phrases: [
                    'a' => [
                        'words' => ['acheter', 'ici'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'To buy here', 'correct' => ['to buy', 'here'], 'extra' => ['checkout', 'trolley']],
                            'az' => ['sentence' => 'almaq burada', 'correct' => ['almaq', 'burada'], 'extra' => ['kassa', 'araba']],
                            'ar' => ['sentence' => 'الشراء هنا', 'correct' => ['الشراء', 'هنا'], 'extra' => ['صندوق الدفع', 'عربة']],
                            'ru' => ['sentence' => 'купить здесь', 'correct' => ['купить', 'здесь'], 'extra' => ['касса', 'тележка']],
                            'es' => ['sentence' => 'Comprar aquí', 'correct' => ['comprar', 'aquí'], 'extra' => ['caja', 'carrito']],
                            'de' => ['sentence' => 'Hier kaufen', 'correct' => ['hier', 'kaufen'], 'extra' => ['Kasse', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'ここで買う', 'correct' => ['ここ', 'で', '買う'], 'extra' => ['レジ']],
                            'ko' => ['sentence' => '여기서 사다', 'correct' => ['여기서', '사다'], 'extra' => ['계산대']],
                            'tr' => ['sentence' => 'burada almak', 'correct' => ['burada', 'almak'], 'extra' => ['kasa', 'araba']],
                        ],
                    ],
                    'b' => [
                        'words' => ['la', 'caisse', 'est', 'ici'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'The checkout is here', 'correct' => ['the', 'checkout', 'is', 'here'], 'extra' => ['to buy', 'trolley']],
                            'az' => ['sentence' => 'kassa burada', 'correct' => ['kassa', 'burada'], 'extra' => ['almaq', 'araba']],
                            'ar' => ['sentence' => 'صندوق الدفع هنا', 'correct' => ['صندوق الدفع', 'هنا'], 'extra' => ['الشراء', 'عربة']],
                            'ru' => ['sentence' => 'касса здесь', 'correct' => ['касса', 'здесь'], 'extra' => ['купить', 'тележка']],
                            'es' => ['sentence' => 'La caja está aquí', 'correct' => ['la', 'caja', 'está', 'aquí'], 'extra' => ['comprar', 'carrito']],
                            'de' => ['sentence' => 'Die Kasse ist hier', 'correct' => ['die', 'Kasse', 'ist', 'hier'], 'extra' => ['kaufen', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'レジはここです', 'correct' => ['レジ', 'は', 'ここ', 'です'], 'extra' => ['買う']],
                            'ko' => ['sentence' => '계산대는 여기입니다', 'correct' => ['계산대는', '여기입니다'], 'extra' => ['사다']],
                            'tr' => ['sentence' => 'kasa burada', 'correct' => ['kasa', 'burada'], 'extra' => ['almak', 'araba']],
                        ],
                    ],
                    'c' => [
                        'words' => ['acheter', 'avec', 'un', 'chariot'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To buy with a trolley', 'correct' => ['to buy', 'with', 'a', 'trolley'], 'extra' => ['here', 'checkout']],
                            'az' => ['sentence' => 'almaq ilə bir araba', 'correct' => ['almaq', 'ilə', 'bir', 'araba'], 'extra' => ['burada', 'kassa']],
                            'ar' => ['sentence' => 'الشراء مع عربة', 'correct' => ['الشراء', 'مع', 'عربة'], 'extra' => ['هنا', 'صندوق الدفع']],
                            'ru' => ['sentence' => 'купить с тележка', 'correct' => ['купить', 'с', 'тележка'], 'extra' => ['здесь', 'касса']],
                            'es' => ['sentence' => 'Comprar con un carrito', 'correct' => ['comprar', 'con', 'un', 'carrito'], 'extra' => ['aquí', 'caja']],
                            'de' => ['sentence' => 'Mit einem Einkaufswagen kaufen', 'correct' => ['mit', 'einem', 'Einkaufswagen', 'kaufen'], 'extra' => ['hier', 'Kasse']],
                            'ja' => ['sentence' => 'カートで買う', 'correct' => ['カート', 'で', '買う'], 'extra' => ['ここ']],
                            'ko' => ['sentence' => '카트로 사다', 'correct' => ['카트로', '사다'], 'extra' => ['여기']],
                            'tr' => ['sentence' => 'arabayla almak', 'correct' => ['arabayla', 'almak'], 'extra' => ['burada', 'kasa']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: I Need That', 4,
                pictures: [['fr' => 'Liste', 'img' => 'list'], ['fr' => 'Panier', 'img' => 'basket']],
                plain: [['fr' => 'Besoin'], ['fr' => 'Vide']],
                phrases: [
                    'a' => [
                        'words' => ["j'ai", 'besoin', 'de', 'pain'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I need bread', 'correct' => ['I have', 'need', 'of', 'bread'], 'extra' => ['empty', 'basket']],
                            'az' => ['sentence' => 'məndə var ehtiyac çörək', 'correct' => ['məndə var', 'ehtiyac', 'çörək'], 'extra' => ['boş', 'səbət']],
                            'ar' => ['sentence' => 'عندي حاجة خبز', 'correct' => ['عندي', 'حاجة', 'خبز'], 'extra' => ['فارغ', 'سلة']],
                            'ru' => ['sentence' => 'у меня нужно хлеб', 'correct' => ['у', 'меня', 'нужно', 'хлеб'], 'extra' => ['пустой', 'корзина']],
                            'es' => ['sentence' => 'Necesito pan', 'correct' => ['tengo', 'necesidad', 'de', 'pan'], 'extra' => ['vacío', 'cesta']],
                            'de' => ['sentence' => 'Ich brauche Brot', 'correct' => ['ich habe', 'Bedarf', 'von', 'Brot'], 'extra' => ['leer', 'Korb']],
                            'ja' => ['sentence' => 'パンが必要です', 'correct' => ['パン', 'が', '必要です'], 'extra' => ['空']],
                            'ko' => ['sentence' => '빵이 필요합니다', 'correct' => ['빵이', '필요합니다'], 'extra' => ['빈']],
                            'tr' => ['sentence' => 'ekmeğe ihtiyacım var', 'correct' => ['ekmeğe', 'ihtiyacım', 'var'], 'extra' => ['boş', 'sepet']],
                        ],
                    ],
                    'b' => [
                        'words' => ['mon', 'panier', 'est', 'vide'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'My basket is empty', 'correct' => ['my', 'basket', 'is', 'empty'], 'extra' => ['need', 'list']],
                            'az' => ['sentence' => 'mənim səbət boş', 'correct' => ['mənim', 'səbət', 'boş'], 'extra' => ['ehtiyac', 'siyahı']],
                            'ar' => ['sentence' => 'سلة فارغ', 'correct' => ['سلة', 'فارغ'], 'extra' => ['حاجة', 'قائمة']],
                            'ru' => ['sentence' => 'мой корзина пустой', 'correct' => ['мой', 'корзина', 'пустой'], 'extra' => ['нужно', 'список']],
                            'es' => ['sentence' => 'Mi cesta está vacía', 'correct' => ['mi', 'cesta', 'está', 'vacío'], 'extra' => ['necesidad', 'lista']],
                            'de' => ['sentence' => 'Mein Korb ist leer', 'correct' => ['mein', 'Korb', 'ist', 'leer'], 'extra' => ['Bedarf', 'Liste']],
                            'ja' => ['sentence' => '私のかごは空です', 'correct' => ['私の', 'かご', 'は', '空', 'です'], 'extra' => ['必要']],
                            'ko' => ['sentence' => '제 바구니는 비었습니다', 'correct' => ['제', '바구니는', '비었습니다'], 'extra' => ['필요']],
                            'tr' => ['sentence' => 'sepetim boş', 'correct' => ['sepetim', 'boş'], 'extra' => ['ihtiyaç', 'liste']],
                        ],
                    ],
                    'c' => [
                        'words' => ["j'ai", 'besoin', 'de', 'ma', 'liste'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I need my list', 'correct' => ['I have', 'need', 'of', 'my', 'list'], 'extra' => ['empty', 'basket']],
                            'az' => ['sentence' => 'məndə var ehtiyac mənim siyahı', 'correct' => ['məndə var', 'ehtiyac', 'mənim', 'siyahı'], 'extra' => ['boş', 'səbət']],
                            'ar' => ['sentence' => 'عندي حاجة قائمة', 'correct' => ['عندي', 'حاجة', 'قائمة'], 'extra' => ['فارغ', 'سلة']],
                            'ru' => ['sentence' => 'у меня нужно мой список', 'correct' => ['у', 'меня', 'нужно', 'мой', 'список'], 'extra' => ['пустой', 'корзина']],
                            'es' => ['sentence' => 'Necesito mi lista', 'correct' => ['tengo', 'necesidad', 'de', 'mi', 'lista'], 'extra' => ['vacío', 'cesta']],
                            'de' => ['sentence' => 'Ich brauche meine Liste', 'correct' => ['ich habe', 'Bedarf', 'von', 'meine', 'Liste'], 'extra' => ['leer', 'Korb']],
                            'ja' => ['sentence' => '私のリストが必要です', 'correct' => ['私の', 'リスト', 'が', '必要です'], 'extra' => ['空']],
                            'ko' => ['sentence' => '제 목록이 필요합니다', 'correct' => ['제', '목록이', '필요합니다'], 'extra' => ['빈']],
                            'tr' => ['sentence' => 'listeme ihtiyacım var', 'correct' => ['listeme', 'ihtiyacım', 'var'], 'extra' => ['boş', 'sepet']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Full and Heavy', 5,
                pictures: [['fr' => 'Chariot', 'img' => 'cart'], ['fr' => 'Panier', 'img' => 'basket']],
                plain: [['fr' => 'Plein'], ['fr' => 'Lourd']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'chariot', 'est', 'plein'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The trolley is full', 'correct' => ['the', 'trolley', 'is', 'full'], 'extra' => ['heavy', 'basket']],
                            'az' => ['sentence' => 'araba dolu', 'correct' => ['araba', 'dolu'], 'extra' => ['ağır', 'səbət']],
                            'ar' => ['sentence' => 'عربة ممتلئ', 'correct' => ['عربة', 'ممتلئ'], 'extra' => ['ثقيل', 'سلة']],
                            'ru' => ['sentence' => 'тележка полный', 'correct' => ['тележка', 'полный'], 'extra' => ['тяжёлый', 'корзина']],
                            'es' => ['sentence' => 'El carrito está lleno', 'correct' => ['el', 'carrito', 'está', 'lleno'], 'extra' => ['pesado', 'cesta']],
                            'de' => ['sentence' => 'Der Einkaufswagen ist voll', 'correct' => ['der', 'Einkaufswagen', 'ist', 'voll'], 'extra' => ['schwer', 'Korb']],
                            'ja' => ['sentence' => 'カートはいっぱいです', 'correct' => ['カート', 'は', 'いっぱい', 'です'], 'extra' => ['重い']],
                            'ko' => ['sentence' => '카트는 가득합니다', 'correct' => ['카트는', '가득합니다'], 'extra' => ['무거운']],
                            'tr' => ['sentence' => 'araba dolu', 'correct' => ['araba', 'dolu'], 'extra' => ['ağır', 'sepet']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'panier', 'est', 'lourd'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The basket is heavy', 'correct' => ['the', 'basket', 'is', 'heavy'], 'extra' => ['full', 'trolley']],
                            'az' => ['sentence' => 'səbət ağır', 'correct' => ['səbət', 'ağır'], 'extra' => ['dolu', 'araba']],
                            'ar' => ['sentence' => 'سلة ثقيل', 'correct' => ['سلة', 'ثقيل'], 'extra' => ['ممتلئ', 'عربة']],
                            'ru' => ['sentence' => 'корзина тяжёлый', 'correct' => ['корзина', 'тяжёлый'], 'extra' => ['полный', 'тележка']],
                            'es' => ['sentence' => 'La cesta está pesada', 'correct' => ['la', 'cesta', 'está', 'pesado'], 'extra' => ['lleno', 'carrito']],
                            'de' => ['sentence' => 'Der Korb ist schwer', 'correct' => ['der', 'Korb', 'ist', 'schwer'], 'extra' => ['voll', 'Einkaufswagen']],
                            'ja' => ['sentence' => 'かごは重いです', 'correct' => ['かご', 'は', '重い', 'です'], 'extra' => ['いっぱい']],
                            'ko' => ['sentence' => '바구니는 무겁습니다', 'correct' => ['바구니는', '무겁습니다'], 'extra' => ['가득한']],
                            'tr' => ['sentence' => 'sepet ağır', 'correct' => ['sepet', 'ağır'], 'extra' => ['dolu', 'araba']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'chariot', 'plein', 'et', 'un', 'panier', 'lourd'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'A full trolley and a heavy basket', 'correct' => ['a', 'full', 'trolley', 'and', 'a', 'heavy', 'basket'], 'extra' => ['is']],
                            'az' => ['sentence' => 'bir dolu araba və bir ağır səbət', 'correct' => ['bir', 'dolu', 'araba', 'və', 'bir', 'ağır', 'səbət'], 'extra' => []],
                            'ar' => ['sentence' => 'ممتلئ عربة و ثقيل سلة', 'correct' => ['ممتلئ', 'عربة', 'و', 'ثقيل', 'سلة'], 'extra' => []],
                            'ru' => ['sentence' => 'полный тележка и тяжёлый корзина', 'correct' => ['полный', 'тележка', 'и', 'тяжёлый', 'корзина'], 'extra' => []],
                            'es' => ['sentence' => 'Un carrito lleno y una cesta pesada', 'correct' => ['un', 'lleno', 'carrito', 'y', 'una', 'pesado', 'cesta'], 'extra' => ['es']],
                            'de' => ['sentence' => 'Ein voller Einkaufswagen und ein schwerer Korb', 'correct' => ['ein', 'voll', 'Einkaufswagen', 'und', 'ein', 'schwer', 'Korb'], 'extra' => ['ist']],
                            'ja' => ['sentence' => 'いっぱいのカートと重いかご', 'correct' => ['いっぱい', 'の', 'カート', 'と', '重い', 'かご'], 'extra' => ['です']],
                            'ko' => ['sentence' => '가득한 카트와 무거운 바구니', 'correct' => ['가득한', '카트와', '무거운', '바구니'], 'extra' => ['입니다']],
                            'tr' => ['sentence' => 'dolu bir araba ve ağır bir sepet', 'correct' => ['dolu', 'bir', 'araba', 've', 'ağır', 'bir', 'sepet'], 'extra' => ['dır']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
