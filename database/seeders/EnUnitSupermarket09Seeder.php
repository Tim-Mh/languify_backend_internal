<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitSupermarket09Seeder extends Seeder
{
    private const PICTURES = [
        'Aisle' => 'shelf', 'Carrot' => 'carrot', 'Tomato' => 'tomato', 'List' => 'list',
        'Checkout' => 'checkout', 'Orange' => 'orange', 'Grapes' => 'grapes', 'Basket' => 'basket',
    ];

    /**
     * English Chapter 4, Unit 9 — asking where things are.
     *
     * The most useful thing a beginner can do in a foreign shop is stop someone
     * and ask, so every lesson is a variation on that one move.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Supermarket)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Asking Where Things Are', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Excuse Me, Where Is It', 1,
                pictures: [['en' => 'Aisle', 'img' => 'shelf'], ['en' => 'Carrot', 'img' => 'carrot']],
                plain: [['en' => 'Excuse me'], ['en' => 'To look for']],
                phrases: [
                    'a' => [
                        'words' => ['excuse me', 'where', 'is', 'the', 'aisle'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Disculpe, dónde está el pasillo', 'correct' => ['disculpe', 'dónde', 'está', 'el', 'pasillo'], 'extra' => ['buscar']],
                            'de' => ['sentence' => 'Entschuldigen Sie, wo ist das Regal', 'correct' => ['entschuldigen Sie', 'wo', 'ist', 'das', 'Regal'], 'extra' => ['suchen']],
                            'ja' => ['sentence' => 'すみません、売り場はどこですか', 'correct' => ['すみません', '売り場', 'は', 'どこですか'], 'extra' => ['探す']],
                            'ko' => ['sentence' => '실례합니다, 진열대는 어디입니까', 'correct' => ['실례합니다', '진열대는', '어디입니까'], 'extra' => ['찾다']],
                            'fr' => ['sentence' => 'Excusez-moi, où est le rayon', 'correct' => ['excusez-moi', 'où', 'est', 'le', 'rayon'], 'extra' => ['chercher']],
                        ],
                    ],
                    'b' => [
                        'words' => ['to look for', 'a', 'carrot'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Buscar una zanahoria', 'correct' => ['buscar', 'una', 'zanahoria'], 'extra' => ['disculpe', 'pasillo']],
                            'de' => ['sentence' => 'Eine Karotte suchen', 'correct' => ['eine', 'Karotte', 'suchen'], 'extra' => ['entschuldigen Sie', 'Regal']],
                            'ja' => ['sentence' => 'にんじんを探す', 'correct' => ['にんじん', 'を', '探す'], 'extra' => ['すみません']],
                            'ko' => ['sentence' => '당근을 찾다', 'correct' => ['당근을', '찾다'], 'extra' => ['실례합니다']],
                            'fr' => ['sentence' => 'Chercher une carotte', 'correct' => ['chercher', 'une', 'carotte'], 'extra' => ['excusez-moi']],
                        ],
                    ],
                    'c' => [
                        'words' => ['to look for', 'the', 'aisle'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Buscar el pasillo', 'correct' => ['buscar', 'el', 'pasillo'], 'extra' => ['zanahoria']],
                            'de' => ['sentence' => 'Das Regal suchen', 'correct' => ['das', 'Regal', 'suchen'], 'extra' => ['Karotte']],
                            'ja' => ['sentence' => '売り場を探す', 'correct' => ['売り場', 'を', '探す'], 'extra' => ['にんじん']],
                            'ko' => ['sentence' => '진열대를 찾다', 'correct' => ['진열대를', '찾다'], 'extra' => ['당근']],
                            'fr' => ['sentence' => 'Chercher le rayon', 'correct' => ['chercher', 'le', 'rayon'], 'extra' => ['carotte']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: Can You Help', 2,
                pictures: [['en' => 'Tomato', 'img' => 'tomato'], ['en' => 'List', 'img' => 'list']],
                plain: [['en' => 'Can you'], ['en' => 'Find']],
                phrases: [
                    'a' => [
                        'words' => ['can you', 'find', 'a', 'tomato'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Puede encontrar un tomate', 'correct' => ['puede usted', 'encontrar', 'un', 'tomate'], 'extra' => ['lista']],
                            'de' => ['sentence' => 'Können Sie eine Tomate finden', 'correct' => ['können Sie', 'eine', 'Tomate', 'finden'], 'extra' => ['Liste']],
                            'ja' => ['sentence' => 'トマトを見つけてもらえますか', 'correct' => ['トマト', 'を', '見つけて', 'もらえます', 'か'], 'extra' => ['リスト']],
                            'ko' => ['sentence' => '토마토를 찾을 수 있나요', 'correct' => ['토마토를', '찾을', '수', '있나요'], 'extra' => ['목록']],
                            'fr' => ['sentence' => 'Pouvez-vous trouver une tomate', 'correct' => ['pouvez-vous', 'trouver', 'une', 'tomate'], 'extra' => ['liste']],
                        ],
                    ],
                    'b' => [
                        'words' => ['find', 'my', 'list'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Encontrar mi lista', 'correct' => ['encontrar', 'mi', 'lista'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Meine Liste finden', 'correct' => ['meine', 'Liste', 'finden'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => '私のリストを見つける', 'correct' => ['私の', 'リスト', 'を', '見つける'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '제 목록을 발견하다', 'correct' => ['제', '목록을', '발견하다'], 'extra' => ['토마토']],
                            'fr' => ['sentence' => 'Trouver ma liste', 'correct' => ['trouver', 'ma', 'liste'], 'extra' => ['tomate']],
                        ],
                    ],
                    'c' => [
                        'words' => ['can you', 'find', 'my', 'list'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Puede encontrar mi lista', 'correct' => ['puede usted', 'encontrar', 'mi', 'lista'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Können Sie meine Liste finden', 'correct' => ['können Sie', 'meine', 'Liste', 'finden'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => '私のリストを見つけてもらえますか', 'correct' => ['私の', 'リスト', 'を', '見つけて', 'もらえます', 'か'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '제 목록을 찾을 수 있나요', 'correct' => ['제', '목록을', '찾을', '수', '있나요'], 'extra' => ['토마토']],
                            'fr' => ['sentence' => 'Pouvez-vous trouver ma liste', 'correct' => ['pouvez-vous', 'trouver', 'ma', 'liste'], 'extra' => ['tomate']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: Near or Far', 3,
                pictures: [['en' => 'Checkout', 'img' => 'checkout'], ['en' => 'Aisle', 'img' => 'shelf']],
                plain: [['en' => 'Near'], ['en' => 'Far']],
                phrases: [
                    'a' => [
                        'words' => ['the', 'checkout', 'is', 'near'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'La caja está cerca', 'correct' => ['la', 'caja', 'está', 'cerca'], 'extra' => ['lejos', 'pasillo']],
                            'de' => ['sentence' => 'Die Kasse ist nah', 'correct' => ['die', 'Kasse', 'ist', 'nah'], 'extra' => ['weit', 'Regal']],
                            'ja' => ['sentence' => 'レジは近いです', 'correct' => ['レジ', 'は', '近い', 'です'], 'extra' => ['遠く']],
                            'ko' => ['sentence' => '계산대는 가깝습니다', 'correct' => ['계산대는', '가깝습니다'], 'extra' => ['멀리']],
                            'fr' => ['sentence' => 'La caisse est près', 'correct' => ['la', 'caisse', 'est', 'près'], 'extra' => ['loin', 'rayon']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'aisle', 'is', 'far'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'El pasillo está lejos', 'correct' => ['el', 'pasillo', 'está', 'lejos'], 'extra' => ['cerca', 'caja']],
                            'de' => ['sentence' => 'Das Regal ist weit', 'correct' => ['das', 'Regal', 'ist', 'weit'], 'extra' => ['nah', 'Kasse']],
                            'ja' => ['sentence' => '売り場は遠いです', 'correct' => ['売り場', 'は', '遠い', 'です'], 'extra' => ['近く']],
                            'ko' => ['sentence' => '진열대는 멉니다', 'correct' => ['진열대는', '멉니다'], 'extra' => ['가까이']],
                            'fr' => ['sentence' => 'Le rayon est loin', 'correct' => ['le', 'rayon', 'est', 'loin'], 'extra' => ['près']],
                        ],
                    ],
                    'c' => [
                        'words' => ['near', 'or', 'far'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Cerca o lejos', 'correct' => ['cerca', 'o', 'lejos'], 'extra' => ['caja']],
                            'de' => ['sentence' => 'Nah oder weit', 'correct' => ['nah', 'oder', 'weit'], 'extra' => ['Kasse']],
                            'ja' => ['sentence' => '近くか遠く', 'correct' => ['近く', 'か', '遠く'], 'extra' => ['レジ']],
                            'ko' => ['sentence' => '가깝거나 멀리', 'correct' => ['가깝거나', '멀리'], 'extra' => ['계산대']],
                            'fr' => ['sentence' => 'Près ou loin', 'correct' => ['près', 'ou', 'loin'], 'extra' => ['caisse']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: On the Left', 4,
                pictures: [['en' => 'Orange', 'img' => 'orange'], ['en' => 'Grapes', 'img' => 'grapes']],
                plain: [['en' => 'Left'], ['en' => 'Right']],
                phrases: [
                    'a' => [
                        'words' => ['an', 'orange', 'on', 'the', 'left'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Una naranja a la izquierda', 'correct' => ['una', 'naranja', 'sobre', 'la', 'izquierda'], 'extra' => ['derecha', 'uvas']],
                            'de' => ['sentence' => 'Eine Orange links', 'correct' => ['eine', 'Orange', 'auf', 'der', 'links'], 'extra' => ['rechts', 'Trauben']],
                            'ja' => ['sentence' => '左のオレンジ', 'correct' => ['左', 'の', 'オレンジ'], 'extra' => ['右']],
                            'ko' => ['sentence' => '왼쪽의 오렌지', 'correct' => ['왼쪽의', '오렌지'], 'extra' => ['오른쪽']],
                            'fr' => ['sentence' => 'Une orange à gauche', 'correct' => ['une', 'orange', 'sur', 'la', 'gauche'], 'extra' => ['droite', 'raisin']],
                        ],
                    ],
                    'b' => [
                        'words' => ['the', 'grapes', 'on', 'the', 'right'], 'blank' => 4,
                        'tr' => [
                            'es' => ['sentence' => 'Las uvas a la derecha', 'correct' => ['las', 'uvas', 'sobre', 'la', 'derecha'], 'extra' => ['izquierda', 'naranja']],
                            'de' => ['sentence' => 'Die Trauben rechts', 'correct' => ['die', 'Trauben', 'auf', 'der', 'rechts'], 'extra' => ['links', 'Orange']],
                            'ja' => ['sentence' => '右のぶどう', 'correct' => ['右', 'の', 'ぶどう'], 'extra' => ['左']],
                            'ko' => ['sentence' => '오른쪽의 포도', 'correct' => ['오른쪽의', '포도'], 'extra' => ['왼쪽']],
                            'fr' => ['sentence' => 'Le raisin à droite', 'correct' => ['le', 'raisin', 'sur', 'la', 'droite'], 'extra' => ['gauche']],
                        ],
                    ],
                    'c' => [
                        'words' => ['left', 'or', 'right'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Izquierda o derecha', 'correct' => ['izquierda', 'o', 'derecha'], 'extra' => ['naranja']],
                            'de' => ['sentence' => 'Links oder rechts', 'correct' => ['links', 'oder', 'rechts'], 'extra' => ['Orange']],
                            'ja' => ['sentence' => '左か右', 'correct' => ['左', 'か', '右'], 'extra' => ['オレンジ']],
                            'ko' => ['sentence' => '왼쪽 또는 오른쪽', 'correct' => ['왼쪽', '또는', '오른쪽'], 'extra' => ['오렌지']],
                            'fr' => ['sentence' => 'Gauche ou droite', 'correct' => ['gauche', 'ou', 'droite'], 'extra' => ['orange']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: I Found It', 5,
                pictures: [['en' => 'Basket', 'img' => 'basket'], ['en' => 'Tomato', 'img' => 'tomato']],
                plain: [['en' => 'Here is'], ['en' => 'Thank you']],
                phrases: [
                    'a' => [
                        'words' => ['here is', 'my', 'tomato'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Aquí está mi tomate', 'correct' => ['aquí está', 'mi', 'tomate'], 'extra' => ['gracias', 'cesta']],
                            'de' => ['sentence' => 'Hier ist meine Tomate', 'correct' => ['hier ist', 'meine', 'Tomate'], 'extra' => ['danke', 'Korb']],
                            'ja' => ['sentence' => 'これが私のトマトです', 'correct' => ['これが', '私の', 'トマト', 'です'], 'extra' => ['ありがとう']],
                            'ko' => ['sentence' => '여기 제 토마토입니다', 'correct' => ['여기', '제', '토마토입니다'], 'extra' => ['감사합니다']],
                            'fr' => ['sentence' => 'Voici ma tomate', 'correct' => ['voici', 'ma', 'tomate'], 'extra' => ['merci']],
                        ],
                    ],
                    'b' => [
                        'words' => ['thank you', 'here'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Gracias, aquí', 'correct' => ['gracias', 'aquí'], 'extra' => ['aquí está', 'tomate']],
                            'de' => ['sentence' => 'Danke, hier', 'correct' => ['danke', 'hier'], 'extra' => ['hier ist', 'Tomate']],
                            'ja' => ['sentence' => 'ありがとう、ここ', 'correct' => ['ありがとう', 'ここ'], 'extra' => ['これが']],
                            'ko' => ['sentence' => '감사합니다, 여기', 'correct' => ['감사합니다', '여기'], 'extra' => ['여기']],
                            'fr' => ['sentence' => 'Merci, ici', 'correct' => ['merci', 'ici'], 'extra' => ['voici']],
                        ],
                    ],
                    'c' => [
                        'words' => ['here is', 'the', 'basket', 'thank you'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Aquí está la cesta, gracias', 'correct' => ['aquí está', 'la', 'cesta', 'gracias'], 'extra' => ['tomate']],
                            'de' => ['sentence' => 'Hier ist der Korb, danke', 'correct' => ['hier ist', 'der', 'Korb', 'danke'], 'extra' => ['Tomate']],
                            'ja' => ['sentence' => 'これがかごです、ありがとう', 'correct' => ['これが', 'かご', 'です', 'ありがとう'], 'extra' => ['トマト']],
                            'ko' => ['sentence' => '여기 바구니입니다, 감사합니다', 'correct' => ['여기', '바구니입니다', '감사합니다'], 'extra' => ['토마토']],
                            'fr' => ['sentence' => 'Voici le panier, merci', 'correct' => ['voici', 'le', 'panier', 'merci'], 'extra' => ['tomate']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
