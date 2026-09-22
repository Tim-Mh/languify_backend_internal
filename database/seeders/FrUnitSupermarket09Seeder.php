<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitSupermarket09Seeder extends Seeder
{
    private const PICTURES = [
        'Rayon' => 'shelf', 'Liste' => 'list', 'Carotte' => 'carrot', 'Tomate' => 'tomato',
        'Orange' => 'orange', 'Raisin' => 'grapes', 'Panier' => 'basket', 'Magasin' => 'shop',
    ];

    /**
     * French Chapter 4, Unit 9 — asking where things are.
     *
     * The single most useful thing a beginner can do in a foreign shop is stop
     * someone and ask. Every lesson here is a variation on that one move, so
     * the learner leaves with a question they can actually say out loud rather
     * than a list of shop nouns.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Asking Where Things Are', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Excuse Me, Where Is It', 1,
                pictures: [['fr' => 'Rayon', 'img' => 'shelf'], ['fr' => 'Carotte', 'img' => 'carrot']],
                plain: [['fr' => 'Excusez-moi'], ['fr' => 'Chercher']],
                phrases: [
                    'a' => [
                        'words' => ['excusez-moi', 'où', 'est', 'le', 'rayon'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Excuse me, where is the aisle', 'correct' => ['excuse me', 'where', 'is', 'the', 'aisle'], 'extra' => ['to look for']],
                            'az' => ['sentence' => 'bağışlayın harada şöbə', 'correct' => ['bağışlayın', 'harada', 'şöbə'], 'extra' => ['axtarmaq']],
                            'ar' => ['sentence' => 'عفوا أين قسم', 'correct' => ['عفوا', 'أين', 'قسم'], 'extra' => ['البحث']],
                            'ru' => ['sentence' => 'извините где отдел', 'correct' => ['извините', 'где', 'отдел'], 'extra' => ['искать']],
                            'es' => ['sentence' => 'Disculpe, dónde está el pasillo', 'correct' => ['disculpe', 'dónde', 'está', 'el', 'pasillo'], 'extra' => ['buscar']],
                            'de' => ['sentence' => 'Entschuldigen Sie, wo ist das Regal', 'correct' => ['entschuldigen Sie', 'wo', 'ist', 'das', 'Regal'], 'extra' => ['suchen']],
                            'ja' => ['sentence' => 'すみません、売り場はどこですか', 'correct' => ['すみません', '売り場', 'は', 'どこですか'], 'extra' => ['探す']],
                            'ko' => ['sentence' => '실례합니다, 진열대는 어디입니까', 'correct' => ['실례합니다', '진열대는', '어디입니까'], 'extra' => ['찾다']],
                            'tr' => ['sentence' => 'affedersiniz reyon nerede', 'correct' => ['affedersiniz', 'reyon', 'nerede'], 'extra' => ['aramak']],
                        ],
                    ],
                    'b' => [
                        'words' => ['chercher', 'une', 'carotte'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To look for a carrot', 'correct' => ['to look for', 'a', 'carrot'], 'extra' => ['excuse me', 'aisle']],
                            'az' => ['sentence' => 'axtarmaq bir yerkökü', 'correct' => ['axtarmaq', 'bir', 'yerkökü'], 'extra' => ['bağışlayın', 'şöbə']],
                            'ar' => ['sentence' => 'البحث جزر', 'correct' => ['البحث', 'جزر'], 'extra' => ['عفوا', 'قسم']],
                            'ru' => ['sentence' => 'искать морковь', 'correct' => ['искать', 'морковь'], 'extra' => ['извините', 'отдел']],
                            'es' => ['sentence' => 'Buscar una zanahoria', 'correct' => ['buscar', 'una', 'zanahoria'], 'extra' => ['disculpe', 'pasillo']],
                            'de' => ['sentence' => 'Eine Karotte suchen', 'correct' => ['eine', 'Karotte', 'suchen'], 'extra' => ['entschuldigen Sie', 'Regal']],
                            'ja' => ['sentence' => 'にんじんを探す', 'correct' => ['にんじん', 'を', '探す'], 'extra' => ['すみません']],
                            'ko' => ['sentence' => '당근을 찾다', 'correct' => ['당근을', '찾다'], 'extra' => ['실례합니다']],
                            'tr' => ['sentence' => 'bir havuç aramak', 'correct' => ['bir', 'havuç', 'aramak'], 'extra' => ['affedersiniz', 'reyon']],
                        ],
                    ],
                    'c' => [
                        'words' => ['excusez-moi', 'je', 'chercher', 'une', 'carotte'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'Excuse me, I am looking for a carrot', 'correct' => ['excuse me', 'I', 'to look for', 'a', 'carrot'], 'extra' => ['aisle']],
                            'az' => ['sentence' => 'bağışlayın mən axtarmaq bir yerkökü', 'correct' => ['bağışlayın', 'mən', 'axtarmaq', 'bir', 'yerkökü'], 'extra' => ['şöbə']],
                            'ar' => ['sentence' => 'عفوا أنا البحث جزر', 'correct' => ['عفوا', 'أنا', 'البحث', 'جزر'], 'extra' => ['قسم']],
                            'ru' => ['sentence' => 'извините я искать морковь', 'correct' => ['извините', 'я', 'искать', 'морковь'], 'extra' => ['отдел']],
                            'es' => ['sentence' => 'Disculpe, busco una zanahoria', 'correct' => ['disculpe', 'yo', 'buscar', 'una', 'zanahoria'], 'extra' => ['pasillo']],
                            'de' => ['sentence' => 'Entschuldigen Sie, ich suche eine Karotte', 'correct' => ['entschuldigen Sie', 'ich', 'suchen', 'eine', 'Karotte'], 'extra' => ['Regal']],
                            'ja' => ['sentence' => 'すみません、にんじんを探しています', 'correct' => ['すみません', 'にんじん', 'を', '探しています'], 'extra' => ['売り場']],
                            'ko' => ['sentence' => '실례합니다, 당근을 찾고 있습니다', 'correct' => ['실례합니다', '당근을', '찾고', '있습니다'], 'extra' => ['진열대']],
                            'tr' => ['sentence' => 'affedersiniz bir havuç arıyorum', 'correct' => ['affedersiniz', 'bir', 'havuç', 'arıyorum'], 'extra' => ['reyon']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Can You Help', 2,
                pictures: [['fr' => 'Tomate', 'img' => 'tomato'], ['fr' => 'Liste', 'img' => 'list']],
                plain: [['fr' => 'Pouvez-vous'], ['fr' => 'Trouver']],
                phrases: [
                    'a' => [
                        'words' => ['pouvez-vous', 'trouver', 'une', 'tomate'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Can you find a tomato', 'correct' => ['can you', 'to find', 'a', 'tomato'], 'extra' => ['list']],
                            'az' => ['sentence' => 'bacarıram sən tapmaq bir pomidor', 'correct' => ['bacarıram', 'sən', 'tapmaq', 'bir', 'pomidor'], 'extra' => ['siyahı']],
                            'ar' => ['sentence' => 'أستطيع أنت العثور طماطم', 'correct' => ['أستطيع', 'أنت', 'العثور', 'طماطم'], 'extra' => ['قائمة']],
                            'ru' => ['sentence' => 'могу ты найти помидор', 'correct' => ['могу', 'ты', 'найти', 'помидор'], 'extra' => ['список']],
                            'es' => ['sentence' => 'Puede usted encontrar un tomate', 'correct' => ['puede usted', 'encontrar', 'un', 'tomate'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Können Sie eine Tomate finden', 'correct' => ['können Sie', 'eine', 'Tomate', 'finden'], 'extra' => ['Liste']],
                            'ja' => ['sentence' => 'トマトを見つけてもらえますか', 'correct' => ['トマト', 'を', '見つけて', 'もらえます', 'か'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '토마토를 찾을 수 있나요', 'correct' => ['토마토를', '찾을', '수', '있나요'], 'extra' => ['목록']],
                            'tr' => ['sentence' => 'bir domates bulabilir misiniz', 'correct' => ['bir', 'domates', 'bulabilir', 'misiniz'], 'extra' => ['liste']],
                        ],
                    ],
                    'b' => [
                        'words' => ['trouver', 'ma', 'liste'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To find my list', 'correct' => ['to find', 'my', 'list'], 'extra' => ['can you', 'tomato']],
                            'az' => ['sentence' => 'tapmaq mənim siyahı', 'correct' => ['tapmaq', 'mənim', 'siyahı'], 'extra' => ['bacarıram', 'sən', 'pomidor']],
                            'ar' => ['sentence' => 'العثور قائمة', 'correct' => ['العثور', 'قائمة'], 'extra' => ['أستطيع', 'أنت', 'طماطم']],
                            'ru' => ['sentence' => 'найти мой список', 'correct' => ['найти', 'мой', 'список'], 'extra' => ['могу', 'ты', 'помидор']],
                            'es' => ['sentence' => 'Encontrar mi lista', 'correct' => ['encontrar', 'mi', 'lista'], 'extra' => ['puede usted', 'tomate']],
                            'de' => ['sentence' => 'Meine Liste finden', 'correct' => ['meine', 'Liste', 'finden'], 'extra' => ['können Sie', 'Tomate']],
                            'ja' => ['sentence' => '私のリストを見つける', 'correct' => ['私の', 'リスト', 'を', '見つける'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '제 목록을 발견하다', 'correct' => ['제', '목록을', '발견하다'], 'extra' => ['토마토']],
                            'tr' => ['sentence' => 'listemi bulmak', 'correct' => ['listemi', 'bulmak'], 'extra' => ['yapabilir misiniz', 'domates']],
                        ],
                    ],
                    'c' => [
                        'words' => ['pouvez-vous', 'trouver', 'ma', 'liste'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Can you find my list', 'correct' => ['can you', 'to find', 'my', 'list'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'bacarıram sən tapmaq mənim siyahı', 'correct' => ['bacarıram', 'sən', 'tapmaq', 'mənim', 'siyahı'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'أستطيع أنت العثور قائمة', 'correct' => ['أستطيع', 'أنت', 'العثور', 'قائمة'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'могу ты найти мой список', 'correct' => ['могу', 'ты', 'найти', 'мой', 'список'], 'extra' => ['помидор']],
                            'es' => ['sentence' => 'Puede usted encontrar mi lista', 'correct' => ['puede usted', 'encontrar', 'mi', 'lista'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Können Sie meine Liste finden', 'correct' => ['können Sie', 'meine', 'Liste', 'finden'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => '私のリストを見つけてもらえますか', 'correct' => ['私の', 'リスト', 'を', '見つけて', 'もらえます', 'か'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '제 목록을 찾을 수 있나요', 'correct' => ['제', '목록을', '찾을', '수', '있나요'], 'extra' => ['토마토']],
                            'tr' => ['sentence' => 'listemi bulabilir misiniz', 'correct' => ['listemi', 'bulabilir', 'misiniz'], 'extra' => ['domates']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Near or Far', 3,
                pictures: [['fr' => 'Magasin', 'img' => 'shop'], ['fr' => 'Rayon', 'img' => 'shelf']],
                plain: [['fr' => 'Près'], ['fr' => 'Loin']],
                phrases: [
                    'a' => [
                        'words' => ['le', 'magasin', 'est', 'près'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The shop is near', 'correct' => ['the', 'shop', 'is', 'near'], 'extra' => ['far', 'aisle']],
                            'az' => ['sentence' => 'mağaza yaxın', 'correct' => ['mağaza', 'yaxın'], 'extra' => ['uzaq', 'şöbə']],
                            'ar' => ['sentence' => 'متجر قريب', 'correct' => ['متجر', 'قريب'], 'extra' => ['بعيد', 'قسم']],
                            'ru' => ['sentence' => 'магазин близко', 'correct' => ['магазин', 'близко'], 'extra' => ['далеко', 'отдел']],
                            'es' => ['sentence' => 'La tienda está cerca', 'correct' => ['la', 'tienda', 'está', 'cerca'], 'extra' => ['lejos', 'pasillo']],
                            'de' => ['sentence' => 'Das Geschäft ist nah', 'correct' => ['das', 'Geschäft', 'ist', 'nah'], 'extra' => ['weit', 'Regal']],
                            'ja' => ['sentence' => '店は近いです', 'correct' => ['店', 'は', '近い', 'です'], 'extra' => ['遠く']],
                            'ko' => ['sentence' => '가게는 가깝습니다', 'correct' => ['가게는', '가깝습니다'], 'extra' => ['멀리']],
                            'tr' => ['sentence' => 'dükkan yakın', 'correct' => ['dükkan', 'yakın'], 'extra' => ['uzak', 'reyon']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'rayon', 'est', 'loin'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'The aisle is far', 'correct' => ['the', 'aisle', 'is', 'far'], 'extra' => ['near', 'shop']],
                            'az' => ['sentence' => 'şöbə uzaq', 'correct' => ['şöbə', 'uzaq'], 'extra' => ['yaxın', 'mağaza']],
                            'ar' => ['sentence' => 'قسم بعيد', 'correct' => ['قسم', 'بعيد'], 'extra' => ['قريب', 'متجر']],
                            'ru' => ['sentence' => 'отдел далеко', 'correct' => ['отдел', 'далеко'], 'extra' => ['близко', 'магазин']],
                            'es' => ['sentence' => 'El pasillo está lejos', 'correct' => ['el', 'pasillo', 'está', 'lejos'], 'extra' => ['cerca', 'tienda']],
                            'de' => ['sentence' => 'Das Regal ist weit', 'correct' => ['das', 'Regal', 'ist', 'weit'], 'extra' => ['nah', 'Geschäft']],
                            'ja' => ['sentence' => '売り場は遠いです', 'correct' => ['売り場', 'は', '遠い', 'です'], 'extra' => ['近く']],
                            'ko' => ['sentence' => '진열대는 멉니다', 'correct' => ['진열대는', '멉니다'], 'extra' => ['가까이']],
                            'tr' => ['sentence' => 'reyon uzak', 'correct' => ['reyon', 'uzak'], 'extra' => ['yakın', 'dükkan']],
                        ],
                    ],
                    'c' => [
                        'words' => ['près', 'du', 'magasin', 'et', 'loin', 'du', 'rayon'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Near the shop and far from the aisle', 'correct' => ['near', 'of the', 'shop', 'and', 'far', 'of the', 'aisle'], 'extra' => ['is']],
                            'az' => ['sentence' => 'yaxın mağaza və uzaq şöbə', 'correct' => ['yaxın', 'mağaza', 'və', 'uzaq', 'şöbə'], 'extra' => []],
                            'ar' => ['sentence' => 'قريب متجر و بعيد قسم', 'correct' => ['قريب', 'متجر', 'و', 'بعيد', 'قسم'], 'extra' => []],
                            'ru' => ['sentence' => 'близко магазин и далеко отдел', 'correct' => ['близко', 'магазин', 'и', 'далеко', 'отдел'], 'extra' => []],
                            'es' => ['sentence' => 'Cerca de la tienda y lejos del pasillo', 'correct' => ['cerca', 'del', 'tienda', 'y', 'lejos', 'del', 'pasillo'], 'extra' => ['es']],
                            'de' => ['sentence' => 'Nah beim Geschäft und weit vom Regal', 'correct' => ['nah', 'des', 'Geschäft', 'und', 'weit', 'des', 'Regal'], 'extra' => ['ist']],
                            'ja' => ['sentence' => '店の近くで売り場から遠い', 'correct' => ['店', 'の', '近く', 'で', '売り場', 'から', '遠い'], 'extra' => ['です']],
                            'ko' => ['sentence' => '가게 가까이 그리고 진열대에서 멀리', 'correct' => ['가게', '가까이', '그리고', '진열대에서', '멀리'], 'extra' => ['입니다']],
                            'tr' => ['sentence' => 'dükkana yakın ve reyondan uzak', 'correct' => ['dükkana', 'yakın', 've', 'reyondan', 'uzak'], 'extra' => ['dır']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: On the Left', 4,
                pictures: [['fr' => 'Orange', 'img' => 'orange'], ['fr' => 'Raisin', 'img' => 'grapes']],
                plain: [['fr' => 'Gauche'], ['fr' => 'Droite']],
                phrases: [
                    'a' => [
                        'words' => ['une', 'orange', 'à', 'gauche'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'An orange on the left', 'correct' => ['an', 'orange', 'at', 'left'], 'extra' => ['right', 'grapes']],
                            'az' => ['sentence' => 'bir portağal yanında sol', 'correct' => ['bir', 'portağal', 'yanında', 'sol'], 'extra' => ['sağ', 'üzüm']],
                            'ar' => ['sentence' => 'برتقالة على يسار', 'correct' => ['برتقالة', 'على', 'يسار'], 'extra' => ['يمين', 'عنب']],
                            'ru' => ['sentence' => 'апельсин на левый', 'correct' => ['апельсин', 'на', 'левый'], 'extra' => ['правый', 'виноград']],
                            'es' => ['sentence' => 'Una naranja a la izquierda', 'correct' => ['una', 'naranja', 'a', 'izquierda'], 'extra' => ['derecha', 'uvas']],
                            'de' => ['sentence' => 'Eine Orange links', 'correct' => ['eine', 'Orange', 'zu', 'links'], 'extra' => ['rechts', 'Trauben']],
                            'ja' => ['sentence' => '左のオレンジ', 'correct' => ['左', 'の', 'オレンジ'], 'extra' => ['右']],
                            'ko' => ['sentence' => '왼쪽의 오렌지', 'correct' => ['왼쪽의', '오렌지'], 'extra' => ['오른쪽']],
                            'tr' => ['sentence' => 'solda bir portakal', 'correct' => ['solda', 'bir', 'portakal'], 'extra' => ['sağ', 'üzüm']],
                        ],
                    ],
                    'b' => [
                        'words' => ['le', 'raisin', 'est', 'à', 'droite'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'The grapes are on the right', 'correct' => ['the', 'grapes', 'is', 'at', 'right'], 'extra' => ['left', 'orange']],
                            'az' => ['sentence' => 'üzüm yanında sağ', 'correct' => ['üzüm', 'yanında', 'sağ'], 'extra' => ['sol', 'portağal']],
                            'ar' => ['sentence' => 'عنب على يمين', 'correct' => ['عنب', 'على', 'يمين'], 'extra' => ['يسار', 'برتقالة']],
                            'ru' => ['sentence' => 'виноград на правый', 'correct' => ['виноград', 'на', 'правый'], 'extra' => ['левый', 'апельсин']],
                            'es' => ['sentence' => 'Las uvas están a la derecha', 'correct' => ['las', 'uvas', 'está', 'a', 'derecha'], 'extra' => ['izquierda', 'naranja']],
                            'de' => ['sentence' => 'Die Trauben sind rechts', 'correct' => ['die', 'Trauben', 'ist', 'zu', 'rechts'], 'extra' => ['links', 'Orange']],
                            'ja' => ['sentence' => 'ぶどうは右にあります', 'correct' => ['ぶどう', 'は', '右', 'に', 'あります'], 'extra' => ['左']],
                            'ko' => ['sentence' => '포도는 오른쪽에 있습니다', 'correct' => ['포도는', '오른쪽에', '있습니다'], 'extra' => ['왼쪽']],
                            'tr' => ['sentence' => 'üzüm sağda', 'correct' => ['üzüm', 'sağda'], 'extra' => ['sol', 'portakal']],
                        ],
                    ],
                    'c' => [
                        'words' => ['à', 'gauche', 'ou', 'à', 'droite'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'On the left or on the right', 'correct' => ['at', 'left', 'or', 'at', 'right'], 'extra' => ['orange', 'grapes']],
                            'az' => ['sentence' => 'yanında sol və ya yanında sağ', 'correct' => ['yanında', 'sol', 'və ya', 'yanında', 'sağ'], 'extra' => ['portağal', 'üzüm']],
                            'ar' => ['sentence' => 'على يسار أو على يمين', 'correct' => ['على', 'يسار', 'أو', 'على', 'يمين'], 'extra' => ['برتقالة', 'عنب']],
                            'ru' => ['sentence' => 'на левый или на правый', 'correct' => ['на', 'левый', 'или', 'на', 'правый'], 'extra' => ['апельсин', 'виноград']],
                            'es' => ['sentence' => 'A la izquierda o a la derecha', 'correct' => ['a', 'izquierda', 'o', 'a', 'derecha'], 'extra' => ['naranja', 'uvas']],
                            'de' => ['sentence' => 'Links oder rechts', 'correct' => ['zu', 'links', 'oder', 'zu', 'rechts'], 'extra' => ['Orange', 'Trauben']],
                            'ja' => ['sentence' => '左か右', 'correct' => ['左', 'か', '右'], 'extra' => ['オレンジ']],
                            'ko' => ['sentence' => '왼쪽 또는 오른쪽', 'correct' => ['왼쪽', '또는', '오른쪽'], 'extra' => ['오렌지']],
                            'tr' => ['sentence' => 'solda veya sağda', 'correct' => ['solda', 'veya', 'sağda'], 'extra' => ['portakal', 'üzüm']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: I Found It', 5,
                pictures: [['fr' => 'Panier', 'img' => 'basket'], ['fr' => 'Tomate', 'img' => 'tomato']],
                plain: [['fr' => 'Voici'], ['fr' => 'Merci']],
                phrases: [
                    'a' => [
                        'words' => ['voici', 'ma', 'tomate'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Here is my tomato', 'correct' => ['here is', 'my', 'tomato'], 'extra' => ['thank you', 'basket']],
                            'az' => ['sentence' => 'burada mənim pomidor', 'correct' => ['burada', 'mənim', 'pomidor'], 'extra' => ['təşəkkür', 'səbət']],
                            'ar' => ['sentence' => 'هنا طماطم', 'correct' => ['هنا', 'طماطم'], 'extra' => ['شكرا', 'سلة']],
                            'ru' => ['sentence' => 'здесь мой помидор', 'correct' => ['здесь', 'мой', 'помидор'], 'extra' => ['спасибо', 'корзина']],
                            'es' => ['sentence' => 'Aquí está mi tomate', 'correct' => ['aquí está', 'mi', 'tomate'], 'extra' => ['gracias', 'cesta']],
                            'de' => ['sentence' => 'Hier ist meine Tomate', 'correct' => ['hier ist', 'meine', 'Tomate'], 'extra' => ['danke', 'Korb']],
                            'ja' => ['sentence' => 'これが私のトマトです', 'correct' => ['これが', '私の', 'トマト', 'です'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '여기 제 토마토입니다', 'correct' => ['여기', '제', '토마토입니다'], 'extra' => ['감사합니다']],
                            'tr' => ['sentence' => 'işte domatesim', 'correct' => ['işte', 'domatesim'], 'extra' => ['teşekkürler', 'sepet']],
                        ],
                    ],
                    'b' => [
                        'words' => ['merci', 'beaucoup'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Thank you very much', 'correct' => ['thank you', 'a lot'], 'extra' => ['here is', 'tomato']],
                            'az' => ['sentence' => 'təşəkkür çoxlu', 'correct' => ['təşəkkür', 'çoxlu'], 'extra' => ['burada', 'pomidor']],
                            'ar' => ['sentence' => 'شكرا كثير', 'correct' => ['شكرا', 'كثير'], 'extra' => ['هنا', 'طماطم']],
                            'ru' => ['sentence' => 'спасибо много', 'correct' => ['спасибо', 'много'], 'extra' => ['здесь', 'помидор']],
                            'es' => ['sentence' => 'Muchas gracias', 'correct' => ['gracias', 'mucho'], 'extra' => ['aquí está', 'tomate']],
                            'de' => ['sentence' => 'Vielen Dank', 'correct' => ['danke', 'viel'], 'extra' => ['hier ist', 'Tomate']],
                            'ja' => ['sentence' => 'どうもありがとう', 'correct' => ['どう', 'も', 'ありがとう'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '정말 감사합니다', 'correct' => ['정말', '감사합니다'], 'extra' => ['여기']],
                            'tr' => ['sentence' => 'çok teşekkürler', 'correct' => ['çok', 'teşekkürler'], 'extra' => ['işte', 'domates']],
                        ],
                    ],
                    'c' => [
                        'words' => ['voici', 'le', 'panier', 'merci'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'Here is the basket, thank you', 'correct' => ['here is', 'the', 'basket', 'thank you'], 'extra' => ['tomato']],
                            'az' => ['sentence' => 'burada səbət təşəkkür', 'correct' => ['burada', 'səbət', 'təşəkkür'], 'extra' => ['pomidor']],
                            'ar' => ['sentence' => 'هنا سلة شكرا', 'correct' => ['هنا', 'سلة', 'شكرا'], 'extra' => ['طماطم']],
                            'ru' => ['sentence' => 'здесь корзина спасибо', 'correct' => ['здесь', 'корзина', 'спасибо'], 'extra' => ['помидор']],
                            'es' => ['sentence' => 'Aquí está la cesta, gracias', 'correct' => ['aquí está', 'la', 'cesta', 'gracias'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Hier ist der Korb, danke', 'correct' => ['hier ist', 'der', 'Korb', 'danke'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => 'これがかごです、ありがとう', 'correct' => ['これが', 'かご', 'です', 'ありがとう'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '여기 바구니입니다, 감사합니다', 'correct' => ['여기', '바구니입니다', '감사합니다'], 'extra' => ['토마토']],
                            'tr' => ['sentence' => 'işte sepet teşekkürler', 'correct' => ['işte', 'sepet', 'teşekkürler'], 'extra' => ['domates']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
