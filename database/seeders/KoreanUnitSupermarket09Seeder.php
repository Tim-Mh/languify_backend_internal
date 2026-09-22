<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\KoreanLessonBuilder;
use Illuminate\Database\Seeder;

class KoreanUnitSupermarket09Seeder extends Seeder
{
    private const PICTURES = ['진열대' => 'shelf', '당근' => 'carrot', '토마토' => 'tomato', '목록' => 'list', '계산대' => 'checkout', '오렌지' => 'orange', '포도' => 'grapes', '바구니' => 'basket'];

    /**
     * Korean Supermarket, Unit 9, the Korean twin of the English "Asking Where Things Are" unit.
     * Authored in Korean with hints in English, Spanish, German, French and
     * Japanese, from the shared curriculum.
     */
    public function run(): void
    {
        $language = Language::where('code', 'ko')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new KoreanLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, '유닛 9: 물건 위치 묻기', $this->lessonsData($builder));
    }

    private function lessonsData(KoreanLessonBuilder $builder): array
    {
        return [
            $builder->lesson('레슨 1: 진열대 · 당근', 1,
                pictures: [['ko' => '진열대', 'img' => 'shelf'], ['ko' => '당근', 'img' => 'carrot']],
                plain: [['ko' => '실례합니다'], ['ko' => '찾다']],
                phrases: [
                    'a' => [
                        'words' => ['실례합니다', '진열대는', '어디입니까'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'excuse me where is the aisle', 'correct' => ['excuse me', 'where', 'is', 'the', 'aisle'], 'extra' => ['to look for']],
                            'az' => ['sentence' => 'bağışlayın harada şöbə', 'correct' => ['bağışlayın', 'harada', 'şöbə'], 'extra' => ['axtarmaq']],
                            'ar' => ['sentence' => 'عفوا أين قسم', 'correct' => ['عفوا', 'أين', 'قسم'], 'extra' => ['البحث']],
                            'ru' => ['sentence' => 'извините где отдел', 'correct' => ['извините', 'где', 'отдел'], 'extra' => ['искать']],
                            'es' => ['sentence' => 'Disculpe, dónde está el pasillo', 'correct' => ['disculpe', 'dónde', 'está', 'el', 'pasillo'], 'extra' => ['buscar']],
                            'de' => ['sentence' => 'Entschuldigen Sie, wo ist das Regal', 'correct' => ['entschuldigen Sie', 'wo', 'ist', 'das', 'Regal'], 'extra' => ['suchen']],
                            'fr' => ['sentence' => 'Excusez-moi, où est le rayon', 'correct' => ['excusez-moi', 'où', 'est', 'le', 'rayon'], 'extra' => ['chercher']],
                            'ja' => ['sentence' => 'すみません、売り場はどこですか', 'correct' => ['すみません', '売り場', 'は', 'どこですか'], 'extra' => ['探す']],
                            'tr' => ['sentence' => 'affedersiniz reyon nerede', 'correct' => ['affedersiniz', 'reyon', 'nerede'], 'extra' => ['aramak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['당근을', '찾으세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to look for a carrot', 'correct' => ['to look for', 'a', 'carrot'], 'extra' => ['excuse me']],
                            'az' => ['sentence' => 'axtarmaq bir yerkökü', 'correct' => ['axtarmaq', 'bir', 'yerkökü'], 'extra' => ['bağışlayın']],
                            'ar' => ['sentence' => 'البحث جزر', 'correct' => ['البحث', 'جزر'], 'extra' => ['عفوا']],
                            'ru' => ['sentence' => 'искать морковь', 'correct' => ['искать', 'морковь'], 'extra' => ['извините']],
                            'es' => ['sentence' => 'Buscar una zanahoria', 'correct' => ['buscar', 'una', 'zanahoria'], 'extra' => ['disculpe', 'pasillo']],
                            'de' => ['sentence' => 'Eine Karotte suchen', 'correct' => ['eine', 'Karotte', 'suchen'], 'extra' => ['entschuldigen Sie', 'Regal']],
                            'fr' => ['sentence' => 'Chercher une carotte', 'correct' => ['chercher', 'une', 'carotte'], 'extra' => ['excusez-moi']],
                            'ja' => ['sentence' => 'にんじんを探す', 'correct' => ['にんじん', 'を', '探す'], 'extra' => ['すみません']],
                            'tr' => ['sentence' => 'bir havuç aramak', 'correct' => ['bir', 'havuç', 'aramak'], 'extra' => ['affedersiniz']],
                        ],
                    ],
                    'c' => [
                        'words' => ['진열대를', '찾으세요'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'to look for the aisle', 'correct' => ['to look for', 'the', 'aisle'], 'extra' => ['carrot']],
                            'az' => ['sentence' => 'axtarmaq şöbə', 'correct' => ['axtarmaq', 'şöbə'], 'extra' => ['yerkökü']],
                            'ar' => ['sentence' => 'البحث قسم', 'correct' => ['البحث', 'قسم'], 'extra' => ['جزر']],
                            'ru' => ['sentence' => 'искать отдел', 'correct' => ['искать', 'отдел'], 'extra' => ['морковь']],
                            'es' => ['sentence' => 'Buscar el pasillo', 'correct' => ['buscar', 'el', 'pasillo'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Das Regal suchen', 'correct' => ['das', 'Regal', 'suchen'], 'extra' => ['Karotte']],
                            'fr' => ['sentence' => 'Chercher le rayon', 'correct' => ['chercher', 'le', 'rayon'], 'extra' => ['carotte']],
                            'ja' => ['sentence' => '売り場を探す', 'correct' => ['売り場', 'を', '探す'], 'extra' => ['にんじん']],
                            'tr' => ['sentence' => 'reyonu aramak', 'correct' => ['reyonu', 'aramak'], 'extra' => ['havuç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 2: 토마토 · 목록', 2,
                pictures: [['ko' => '토마토', 'img' => 'tomato'], ['ko' => '목록', 'img' => 'list']],
                plain: [['ko' => '주시겠어요'], ['ko' => '발견하다']],
                phrases: [
                    'a' => [
                        'words' => ['토마토를', '찾을', '수', '있나요'],
                        'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'can you find a tomato', 'correct' => ['can you', 'find', 'a', 'tomato'], 'extra' => ['list']],
                            'az' => ['sentence' => 'bacarıram sən tap bir pomidor', 'correct' => ['bacarıram', 'sən', 'tap', 'bir', 'pomidor'], 'extra' => ['siyahı']],
                            'ar' => ['sentence' => 'أستطيع أنت ابحث طماطم', 'correct' => ['أستطيع', 'أنت', 'ابحث', 'طماطم'], 'extra' => ['قائمة']],
                            'ru' => ['sentence' => 'могу ты найди помидор', 'correct' => ['могу', 'ты', 'найди', 'помидор'], 'extra' => ['список']],
                            'es' => ['sentence' => 'Puede encontrar un tomate', 'correct' => ['puede usted', 'encontrar', 'un', 'tomate'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Können Sie eine Tomate finden', 'correct' => ['können Sie', 'eine', 'Tomate', 'finden'], 'extra' => ['Liste']],
                            'fr' => ['sentence' => 'Pouvez-vous trouver une tomate', 'correct' => ['pouvez-vous', 'trouver', 'une', 'tomate'], 'extra' => ['liste']],
                            'ja' => ['sentence' => 'トマトを見つけてもらえますか', 'correct' => ['トマト', 'を', '見つけて', 'もらえます', 'か'], 'extra' => ['リスト']],
                            'tr' => ['sentence' => 'bir domates bulabilir misiniz', 'correct' => ['bir', 'domates', 'bulabilir', 'misiniz'], 'extra' => ['liste']],
                        ],
                    ],
                    'b' => [
                        'words' => ['제', '목록을', '발견하세요'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'find my list', 'correct' => ['find', 'my', 'list'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'tap mənim siyahı', 'correct' => ['tap', 'mənim', 'siyahı'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'ابحث قائمة', 'correct' => ['ابحث', 'قائمة'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'найди мой список', 'correct' => ['найди', 'мой', 'список'], 'extra' => ['помидор']],
                            'es' => ['sentence' => 'Encontrar mi lista', 'correct' => ['encontrar', 'mi', 'lista'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Meine Liste finden', 'correct' => ['meine', 'Liste', 'finden'], 'extra' => ['Tomate']],
                            'fr' => ['sentence' => 'Trouver ma liste', 'correct' => ['trouver', 'ma', 'liste'], 'extra' => ['tomate']],
                            'ja' => ['sentence' => '私のリストを見つける', 'correct' => ['私の', 'リスト', 'を', '見つける'], 'extra' => ['トマト']],
                            'tr' => ['sentence' => 'listemi bul', 'correct' => ['listemi', 'bul'], 'extra' => ['domates']],
                        ],
                    ],
                    'c' => [
                        'words' => ['제', '목록을', '찾을', '수', '있나요'],
                        'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'can you find my list', 'correct' => ['can you', 'find', 'my', 'list'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'bacarıram sən tap mənim siyahı', 'correct' => ['bacarıram', 'sən', 'tap', 'mənim', 'siyahı'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'أستطيع أنت ابحث قائمة', 'correct' => ['أستطيع', 'أنت', 'ابحث', 'قائمة'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'могу ты найди мой список', 'correct' => ['могу', 'ты', 'найди', 'мой', 'список'], 'extra' => ['помидор']],
                            'es' => ['sentence' => 'Puede encontrar mi lista', 'correct' => ['puede usted', 'encontrar', 'mi', 'lista'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Können Sie meine Liste finden', 'correct' => ['können Sie', 'meine', 'Liste', 'finden'], 'extra' => ['Tomate']],
                            'fr' => ['sentence' => 'Pouvez-vous trouver ma liste', 'correct' => ['pouvez-vous', 'trouver', 'ma', 'liste'], 'extra' => ['tomate']],
                            'ja' => ['sentence' => '私のリストを見つけてもらえますか', 'correct' => ['私の', 'リスト', 'を', '見つけて', 'もらえます', 'か'], 'extra' => ['トマト']],
                            'tr' => ['sentence' => 'listemi bulabilir misiniz', 'correct' => ['listemi', 'bulabilir', 'misiniz'], 'extra' => ['domates']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 3: 계산대 · 진열대', 3,
                pictures: [['ko' => '계산대', 'img' => 'checkout'], ['ko' => '진열대', 'img' => 'shelf']],
                plain: [['ko' => '가까이'], ['ko' => '멀리']],
                phrases: [
                    'a' => [
                        'words' => ['계산대는', '가깝습니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the checkout is near', 'correct' => ['the', 'checkout', 'is', 'near'], 'extra' => ['far']],
                            'az' => ['sentence' => 'kassa yaxın', 'correct' => ['kassa', 'yaxın'], 'extra' => ['uzaq']],
                            'ar' => ['sentence' => 'صندوق الدفع قريب', 'correct' => ['صندوق الدفع', 'قريب'], 'extra' => ['بعيد']],
                            'ru' => ['sentence' => 'касса близко', 'correct' => ['касса', 'близко'], 'extra' => ['далеко']],
                            'es' => ['sentence' => 'La caja está cerca', 'correct' => ['la', 'caja', 'está', 'cerca'], 'extra' => ['lejos', 'pasillo']],
                            'de' => ['sentence' => 'Die Kasse ist nah', 'correct' => ['die', 'Kasse', 'ist', 'nah'], 'extra' => ['weit', 'Regal']],
                            'fr' => ['sentence' => 'La caisse est près', 'correct' => ['la', 'caisse', 'est', 'près'], 'extra' => ['loin', 'rayon']],
                            'ja' => ['sentence' => 'レジは近いです', 'correct' => ['レジ', 'は', '近い', 'です'], 'extra' => ['遠く']],
                            'tr' => ['sentence' => 'kasa yakın', 'correct' => ['kasa', 'yakın'], 'extra' => ['uzak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['진열대는', '멉니다'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the aisle is far', 'correct' => ['the', 'aisle', 'is', 'far'], 'extra' => ['near']],
                            'az' => ['sentence' => 'şöbə uzaq', 'correct' => ['şöbə', 'uzaq'], 'extra' => ['yaxın']],
                            'ar' => ['sentence' => 'قسم بعيد', 'correct' => ['قسم', 'بعيد'], 'extra' => ['قريب']],
                            'ru' => ['sentence' => 'отдел далеко', 'correct' => ['отдел', 'далеко'], 'extra' => ['близко']],
                            'es' => ['sentence' => 'El pasillo está lejos', 'correct' => ['el', 'pasillo', 'está', 'lejos'], 'extra' => ['cerca', 'caja']],
                            'de' => ['sentence' => 'Das Regal ist weit', 'correct' => ['das', 'Regal', 'ist', 'weit'], 'extra' => ['nah', 'Kasse']],
                            'fr' => ['sentence' => 'Le rayon est loin', 'correct' => ['le', 'rayon', 'est', 'loin'], 'extra' => ['près']],
                            'ja' => ['sentence' => '売り場は遠いです', 'correct' => ['売り場', 'は', '遠い', 'です'], 'extra' => ['近く']],
                            'tr' => ['sentence' => 'reyon uzak', 'correct' => ['reyon', 'uzak'], 'extra' => ['yakın']],
                        ],
                    ],
                    'c' => [
                        'words' => ['가깝거나', '멀리'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'near or far', 'correct' => ['near', 'or', 'far'], 'extra' => ['checkout']],
                            'az' => ['sentence' => 'yaxın və ya uzaq', 'correct' => ['yaxın', 'və ya', 'uzaq'], 'extra' => ['kassa']],
                            'ar' => ['sentence' => 'قريب أو بعيد', 'correct' => ['قريب', 'أو', 'بعيد'], 'extra' => ['صندوق الدفع']],
                            'ru' => ['sentence' => 'близко или далеко', 'correct' => ['близко', 'или', 'далеко'], 'extra' => ['касса']],
                            'es' => ['sentence' => 'Cerca o lejos', 'correct' => ['cerca', 'o', 'lejos'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Nah oder weit', 'correct' => ['nah', 'oder', 'weit'], 'extra' => ['Kasse']],
                            'fr' => ['sentence' => 'Près ou loin', 'correct' => ['près', 'ou', 'loin'], 'extra' => ['caisse']],
                            'ja' => ['sentence' => '近くか遠く', 'correct' => ['近く', 'か', '遠く'], 'extra' => ['レジ']],
                            'tr' => ['sentence' => 'yakın veya uzak', 'correct' => ['yakın', 'veya', 'uzak'], 'extra' => ['kasa']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 4: 오렌지 · 포도', 4,
                pictures: [['ko' => '오렌지', 'img' => 'orange'], ['ko' => '포도', 'img' => 'grapes']],
                plain: [['ko' => '왼쪽'], ['ko' => '오른쪽']],
                phrases: [
                    'a' => [
                        'words' => ['왼쪽의', '오렌지'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'an orange on the left', 'correct' => ['an', 'orange', 'on', 'the', 'left'], 'extra' => ['right']],
                            'az' => ['sentence' => 'bir portağal üzərində sol', 'correct' => ['bir', 'portağal', 'üzərində', 'sol'], 'extra' => ['sağ']],
                            'ar' => ['sentence' => 'برتقالة على يسار', 'correct' => ['برتقالة', 'على', 'يسار'], 'extra' => ['يمين']],
                            'ru' => ['sentence' => 'апельсин на левый', 'correct' => ['апельсин', 'на', 'левый'], 'extra' => ['правый']],
                            'es' => ['sentence' => 'Una naranja a la izquierda', 'correct' => ['una', 'naranja', 'sobre', 'la', 'izquierda'], 'extra' => ['derecha', 'uvas']],
                            'de' => ['sentence' => 'Eine Orange links', 'correct' => ['eine', 'Orange', 'auf', 'der', 'links'], 'extra' => ['rechts', 'Trauben']],
                            'fr' => ['sentence' => 'Une orange à gauche', 'correct' => ['une', 'orange', 'sur', 'la', 'gauche'], 'extra' => ['droite', 'raisin']],
                            'ja' => ['sentence' => '左のオレンジ', 'correct' => ['左', 'の', 'オレンジ'], 'extra' => ['右']],
                            'tr' => ['sentence' => 'solda bir portakal', 'correct' => ['solda', 'bir', 'portakal'], 'extra' => ['sağ']],
                        ],
                    ],
                    'b' => [
                        'words' => ['오른쪽의', '포도'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'the grapes on the right', 'correct' => ['the', 'grapes', 'on', 'the', 'right'], 'extra' => ['left']],
                            'az' => ['sentence' => 'üzüm üzərində sağ', 'correct' => ['üzüm', 'üzərində', 'sağ'], 'extra' => ['sol']],
                            'ar' => ['sentence' => 'عنب على يمين', 'correct' => ['عنب', 'على', 'يمين'], 'extra' => ['يسار']],
                            'ru' => ['sentence' => 'виноград на правый', 'correct' => ['виноград', 'на', 'правый'], 'extra' => ['левый']],
                            'es' => ['sentence' => 'Las uvas a la derecha', 'correct' => ['las', 'uvas', 'sobre', 'la', 'derecha'], 'extra' => ['izquierda', 'naranja']],
                            'de' => ['sentence' => 'Die Trauben rechts', 'correct' => ['die', 'Trauben', 'auf', 'der', 'rechts'], 'extra' => ['links', 'Orange']],
                            'fr' => ['sentence' => 'Le raisin à droite', 'correct' => ['le', 'raisin', 'sur', 'la', 'droite'], 'extra' => ['gauche']],
                            'ja' => ['sentence' => '右のぶどう', 'correct' => ['右', 'の', 'ぶどう'], 'extra' => ['左']],
                            'tr' => ['sentence' => 'sağda üzüm', 'correct' => ['sağda', 'üzüm'], 'extra' => ['sol']],
                        ],
                    ],
                    'c' => [
                        'words' => ['왼쪽', '또는', '오른쪽'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'left or right', 'correct' => ['left', 'or', 'right'], 'extra' => ['orange']],
                            'az' => ['sentence' => 'sol və ya sağ', 'correct' => ['sol', 'və ya', 'sağ'], 'extra' => ['portağal']],
                            'ar' => ['sentence' => 'يسار أو يمين', 'correct' => ['يسار', 'أو', 'يمين'], 'extra' => ['برتقالة']],
                            'ru' => ['sentence' => 'левый или правый', 'correct' => ['левый', 'или', 'правый'], 'extra' => ['апельсин']],
                            'es' => ['sentence' => 'Izquierda o derecha', 'correct' => ['izquierda', 'o', 'derecha'], 'extra' => ['naranja']],
                            'de' => ['sentence' => 'Links oder rechts', 'correct' => ['links', 'oder', 'rechts'], 'extra' => ['Orange']],
                            'fr' => ['sentence' => 'Gauche ou droite', 'correct' => ['gauche', 'ou', 'droite'], 'extra' => ['orange']],
                            'ja' => ['sentence' => '左か右', 'correct' => ['左', 'か', '右'], 'extra' => ['オレンジ']],
                            'tr' => ['sentence' => 'sol veya sağ', 'correct' => ['sol', 'veya', 'sağ'], 'extra' => ['portakal']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('레슨 5: 바구니 · 토마토', 5,
                pictures: [['ko' => '바구니', 'img' => 'basket'], ['ko' => '토마토', 'img' => 'tomato']],
                plain: [['ko' => '여기'], ['ko' => '감사합니다']],
                phrases: [
                    'a' => [
                        'words' => ['여기', '제', '토마토입니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'here is my tomato', 'correct' => ['here is', 'my', 'tomato'], 'extra' => ['thank you']],
                            'az' => ['sentence' => 'burada mənim pomidor', 'correct' => ['burada', 'mənim', 'pomidor'], 'extra' => ['təşəkkür']],
                            'ar' => ['sentence' => 'هنا طماطم', 'correct' => ['هنا', 'طماطم'], 'extra' => ['شكرا']],
                            'ru' => ['sentence' => 'здесь мой помидор', 'correct' => ['здесь', 'мой', 'помидор'], 'extra' => ['спасибо']],
                            'es' => ['sentence' => 'Aquí está mi tomate', 'correct' => ['aquí está', 'mi', 'tomate'], 'extra' => ['gracias', 'cesta']],
                            'de' => ['sentence' => 'Hier ist meine Tomate', 'correct' => ['hier ist', 'meine', 'Tomate'], 'extra' => ['danke', 'Korb']],
                            'fr' => ['sentence' => 'Voici ma tomate', 'correct' => ['voici', 'ma', 'tomate'], 'extra' => ['merci']],
                            'ja' => ['sentence' => 'これが私のトマトです', 'correct' => ['これが', '私の', 'トマト', 'です'], 'extra' => ['ありがとう']],
                            'tr' => ['sentence' => 'işte domatesim', 'correct' => ['işte', 'domatesim'], 'extra' => ['teşekkürler']],
                        ],
                    ],
                    'b' => [
                        'words' => ['감사합니다', '여기'],
                        'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'thank you here', 'correct' => ['thank you', 'here'], 'extra' => ['here is']],
                            'az' => ['sentence' => 'təşəkkür burada', 'correct' => ['təşəkkür', 'burada'], 'extra' => []],
                            'ar' => ['sentence' => 'شكرا هنا', 'correct' => ['شكرا', 'هنا'], 'extra' => []],
                            'ru' => ['sentence' => 'спасибо здесь', 'correct' => ['спасибо', 'здесь'], 'extra' => []],
                            'es' => ['sentence' => 'Gracias, aquí', 'correct' => ['gracias', 'aquí'], 'extra' => ['aquí está', 'tomate']],
                            'de' => ['sentence' => 'Danke, hier', 'correct' => ['danke', 'hier'], 'extra' => ['hier ist', 'Tomate']],
                            'fr' => ['sentence' => 'Merci, ici', 'correct' => ['merci', 'ici'], 'extra' => ['voici']],
                            'ja' => ['sentence' => 'ありがとう、ここ', 'correct' => ['ありがとう', 'ここ'], 'extra' => ['これが']],
                            'tr' => ['sentence' => 'teşekkürler burada', 'correct' => ['teşekkürler', 'burada'], 'extra' => ['işte']],
                        ],
                    ],
                    'c' => [
                        'words' => ['여기', '바구니입니다', '감사합니다'],
                        'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'here is the basket thank you', 'correct' => ['here is', 'the', 'basket', 'thank you'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'burada səbət təşəkkür', 'correct' => ['burada', 'səbət', 'təşəkkür'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'هنا سلة شكرا', 'correct' => ['هنا', 'سلة', 'شكرا'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'здесь корзина спасибо', 'correct' => ['здесь', 'корзина', 'спасибо'], 'extra' => ['помидор']],
                            'es' => ['sentence' => 'Aquí está la cesta, gracias', 'correct' => ['aquí está', 'la', 'cesta', 'gracias'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Hier ist der Korb, danke', 'correct' => ['hier ist', 'der', 'Korb', 'danke'], 'extra' => ['Tomate']],
                            'fr' => ['sentence' => 'Voici le panier, merci', 'correct' => ['voici', 'le', 'panier', 'merci'], 'extra' => ['tomate']],
                            'ja' => ['sentence' => 'これがかごです、ありがとう', 'correct' => ['これが', 'かご', 'です', 'ありがとう'], 'extra' => ['トマト']],
                            'tr' => ['sentence' => 'işte sepet teşekkürler', 'correct' => ['işte', 'sepet', 'teşekkürler'], 'extra' => ['domates']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
