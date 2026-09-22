<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\EnglishLessonBuilder;
use Illuminate\Database\Seeder;

class EnUnitConversation05Seeder extends Seeder
{
    private const PICTURES = [
        'Bread' => 'bread', 'Apple' => 'apple', 'Coffee' => 'coffee', 'Water' => 'water',
        'Park' => 'park', 'House' => 'house', 'School' => 'school', 'Shop' => 'shop',
        'Friend' => 'friend',
    ];

    /**
     * English Chapter 2, Unit 5 — talking about the past.
     *
     * The first irregular past forms (I ate, I drank, I saw, I was, it was)
     * come in one at a time, always attached to a familiar noun so only the
     * verb form is new.
     */
    public function run(): void
    {
        $language = Language::where('code', 'en')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new EnglishLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Talking About The Past', $this->lessonsData($builder));
    }

    private function lessonsData(EnglishLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Yesterday I Ate', 1,
                pictures: [['en' => 'Bread', 'img' => 'bread'], ['en' => 'Apple', 'img' => 'apple']],
                plain: [['en' => 'Yesterday'], ['en' => 'I ate']],
                phrases: [
                    'a' => [
                        'words' => ['yesterday', 'I ate', 'bread'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ayer comí pan', 'correct' => ['ayer', 'comí', 'pan'], 'extra' => ['manzana']],
                            'de' => ['sentence' => 'Gestern aß ich Brot', 'correct' => ['gestern', 'aß ich', 'Brot'], 'extra' => ['Apfel']],
                            'ja' => ['sentence' => '昨日パンを食べた', 'correct' => ['昨日', 'パン', 'を', '食べた'], 'extra' => ['りんご']],
                            'ko' => ['sentence' => '어제 빵을 먹었다', 'correct' => ['어제', '빵을', '먹었다'], 'extra' => ['사과']],
                            'fr' => ['sentence' => "Hier j'ai mangé du pain", 'correct' => ['hier', "j'ai mangé", 'pain'], 'extra' => ['pomme']],
                            'tr' => ['sentence' => 'dün ekmek yedim', 'correct' => ['dün', 'ekmek', 'yedim'], 'extra' => []],
                        'ru' => ['sentence' => 'вчера я ел хлеб', 'correct' => ['вчера', 'я', 'ел', 'хлеб'], 'extra' => []],
                        'ar' => ['sentence' => 'أمس أكلت خبز', 'correct' => ['أمس', 'أكلت', 'خبز'], 'extra' => []],
                        'az' => ['sentence' => 'dünən yedim çörək', 'correct' => ['dünən', 'yedim', 'çörək'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['I ate', 'an', 'apple'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Comí una manzana', 'correct' => ['comí', 'una', 'manzana'], 'extra' => ['pan', 'ayer']],
                            'de' => ['sentence' => 'Ich aß einen Apfel', 'correct' => ['ich aß', 'einen', 'Apfel'], 'extra' => ['Brot', 'gestern']],
                            'ja' => ['sentence' => 'りんごを食べた', 'correct' => ['りんご', 'を', '食べた'], 'extra' => ['パン']],
                            'ko' => ['sentence' => '사과를 먹었다', 'correct' => ['사과를', '먹었다'], 'extra' => ['빵']],
                            'fr' => ['sentence' => "J'ai mangé une pomme", 'correct' => ["j'ai mangé", 'une', 'pomme'], 'extra' => ['pain']],
                            'tr' => ['sentence' => 'bir elma yedim', 'correct' => ['bir', 'elma', 'yedim'], 'extra' => []],
                        'ru' => ['sentence' => 'я ел яблоко', 'correct' => ['я', 'ел', 'яблоко'], 'extra' => []],
                        'ar' => ['sentence' => 'أكلت تفاحة', 'correct' => ['أكلت', 'تفاحة'], 'extra' => []],
                        'az' => ['sentence' => 'yedim bir alma', 'correct' => ['yedim', 'bir', 'alma'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['bread', 'and', 'an', 'apple'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Pan y una manzana', 'correct' => ['pan', 'y', 'una', 'manzana'], 'extra' => ['ayer']],
                            'de' => ['sentence' => 'Brot und ein Apfel', 'correct' => ['Brot', 'und', 'ein', 'Apfel'], 'extra' => ['gestern']],
                            'ja' => ['sentence' => 'パンとりんご', 'correct' => ['パン', 'と', 'りんご'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '빵과 사과', 'correct' => ['빵과', '사과'], 'extra' => ['어제']],
                            'fr' => ['sentence' => 'Du pain et une pomme', 'correct' => ['pain', 'et', 'une', 'pomme'], 'extra' => ['hier']],
                            'tr' => ['sentence' => 'ekmek ve elma', 'correct' => ['ekmek', 've', 'elma'], 'extra' => []],
                        'ru' => ['sentence' => 'хлеб и яблоко', 'correct' => ['хлеб', 'и', 'яблоко'], 'extra' => []],
                        'ar' => ['sentence' => 'خبز و تفاحة', 'correct' => ['خبز', 'و', 'تفاحة'], 'extra' => []],
                        'az' => ['sentence' => 'çörək və bir alma', 'correct' => ['çörək', 'və', 'bir', 'alma'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: I Drank & It Was', 2,
                pictures: [['en' => 'Coffee', 'img' => 'coffee'], ['en' => 'Water', 'img' => 'water']],
                plain: [['en' => 'I drank'], ['en' => 'It was']],
                phrases: [
                    'a' => [
                        'words' => ['I drank', 'coffee'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Bebí café', 'correct' => ['bebí', 'café'], 'extra' => ['agua', 'fue']],
                            'de' => ['sentence' => 'Ich trank Kaffee', 'correct' => ['ich trank', 'Kaffee'], 'extra' => ['Wasser', 'es war']],
                            'ja' => ['sentence' => 'コーヒーを飲んだ', 'correct' => ['コーヒー', 'を', '飲んだ'], 'extra' => ['水']],
                            'ko' => ['sentence' => '커피를 마셨다', 'correct' => ['커피를', '마셨다'], 'extra' => ['물']],
                            'fr' => ['sentence' => "J'ai bu du café", 'correct' => ["j'ai bu", 'café'], 'extra' => ['eau', "c'était"]],
                            'tr' => ['sentence' => 'kahve içtim', 'correct' => ['kahve', 'içtim'], 'extra' => []],
                        'ru' => ['sentence' => 'я пил кофе', 'correct' => ['я', 'пил', 'кофе'], 'extra' => []],
                        'ar' => ['sentence' => 'شربت قهوة', 'correct' => ['شربت', 'قهوة'], 'extra' => []],
                        'az' => ['sentence' => 'içdim qəhvə', 'correct' => ['içdim', 'qəhvə'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['it was', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Fue bueno', 'correct' => ['fue', 'bueno'], 'extra' => ['bebí', 'agua']],
                            'de' => ['sentence' => 'Es war gut', 'correct' => ['es war', 'gut'], 'extra' => ['ich trank', 'Wasser']],
                            'ja' => ['sentence' => 'それは良かった', 'correct' => ['それ', 'は', '良かった'], 'extra' => ['私は飲んだ']],
                            'ko' => ['sentence' => '그것은 좋았다', 'correct' => ['그것은', '좋았다'], 'extra' => ['나는 마셨다']],
                            'fr' => ['sentence' => "C'était bon", 'correct' => ["c'était", 'bon'], 'extra' => ["j'ai bu", 'eau']],
                            'tr' => ['sentence' => 'o iyiydi', 'correct' => ['o', 'iyiydi'], 'extra' => []],
                        'ru' => ['sentence' => 'было хороший', 'correct' => ['было', 'хороший'], 'extra' => []],
                        'ar' => ['sentence' => 'كان جيد', 'correct' => ['كان', 'جيد'], 'extra' => []],
                        'az' => ['sentence' => 'idi yaxşı', 'correct' => ['idi', 'yaxşı'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['I drank', 'water'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Bebí agua', 'correct' => ['bebí', 'agua'], 'extra' => ['café', 'fue']],
                            'de' => ['sentence' => 'Ich trank Wasser', 'correct' => ['ich trank', 'Wasser'], 'extra' => ['Kaffee', 'es war']],
                            'ja' => ['sentence' => '水を飲んだ', 'correct' => ['水', 'を', '飲んだ'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '물을 마셨다', 'correct' => ['물을', '마셨다'], 'extra' => ['커피']],
                            'fr' => ['sentence' => "J'ai bu de l'eau", 'correct' => ["j'ai bu", 'eau'], 'extra' => ['café']],
                            'tr' => ['sentence' => 'su içtim', 'correct' => ['su', 'içtim'], 'extra' => []],
                        'ru' => ['sentence' => 'я пил вода', 'correct' => ['я', 'пил', 'вода'], 'extra' => []],
                        'ar' => ['sentence' => 'شربت ماء', 'correct' => ['شربت', 'ماء'], 'extra' => []],
                        'az' => ['sentence' => 'içdim su', 'correct' => ['içdim', 'su'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: I Saw & Already', 3,
                pictures: [['en' => 'Park', 'img' => 'park'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'I saw'], ['en' => 'Already']],
                phrases: [
                    'a' => [
                        'words' => ['I saw', 'the', 'park'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Vi el parque', 'correct' => ['vi', 'el', 'parque'], 'extra' => ['ya', 'casa']],
                            'de' => ['sentence' => 'Ich sah den Park', 'correct' => ['ich sah', 'den', 'Park'], 'extra' => ['schon', 'Haus']],
                            'ja' => ['sentence' => '公園を見た', 'correct' => ['公園', 'を', '見た'], 'extra' => ['もう']],
                            'ko' => ['sentence' => '공원을 보았다', 'correct' => ['공원을', '보았다'], 'extra' => ['이미']],
                            'fr' => ['sentence' => "J'ai vu le parc", 'correct' => ["j'ai vu", 'le', 'parc'], 'extra' => ['déjà', 'maison']],
                            'tr' => ['sentence' => 'parkı gördüm', 'correct' => ['parkı', 'gördüm'], 'extra' => []],
                        'ru' => ['sentence' => 'я видел парк', 'correct' => ['я', 'видел', 'парк'], 'extra' => []],
                        'ar' => ['sentence' => 'رأيت حديقة', 'correct' => ['رأيت', 'حديقة'], 'extra' => []],
                        'az' => ['sentence' => 'gördüm park', 'correct' => ['gördüm', 'park'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['already', 'here'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ya aquí', 'correct' => ['ya', 'aquí'], 'extra' => ['vi', 'parque']],
                            'de' => ['sentence' => 'Schon hier', 'correct' => ['schon', 'hier'], 'extra' => ['ich sah', 'Park']],
                            'ja' => ['sentence' => 'もうここに', 'correct' => ['もう', 'ここ', 'に'], 'extra' => ['私は見た']],
                            'ko' => ['sentence' => '이미 여기에', 'correct' => ['이미', '여기에'], 'extra' => ['나는 보았다']],
                            'fr' => ['sentence' => 'Déjà ici', 'correct' => ['déjà', 'ici'], 'extra' => ["j'ai vu", 'parc']],
                            'tr' => ['sentence' => 'zaten burada', 'correct' => ['zaten', 'burada'], 'extra' => []],
                        'ru' => ['sentence' => 'уже здесь', 'correct' => ['уже', 'здесь'], 'extra' => []],
                        'ar' => ['sentence' => 'بالفعل هنا', 'correct' => ['بالفعل', 'هنا'], 'extra' => []],
                        'az' => ['sentence' => 'artıq burada', 'correct' => ['artıq', 'burada'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['I saw', 'the', 'house', 'already'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Ya vi la casa', 'correct' => ['ya', 'vi', 'la', 'casa'], 'extra' => ['parque']],
                            'de' => ['sentence' => 'Ich sah das Haus schon', 'correct' => ['ich sah', 'das', 'Haus', 'schon'], 'extra' => ['Park']],
                            'ja' => ['sentence' => 'もう家を見た', 'correct' => ['もう', '家', 'を', '見た'], 'extra' => ['公園']],
                            'ko' => ['sentence' => '이미 집을 보았다', 'correct' => ['이미', '집을', '보았다'], 'extra' => ['공원']],
                            'fr' => ['sentence' => "J'ai déjà vu la maison", 'correct' => ["j'ai vu", 'la', 'maison', 'déjà'], 'extra' => ['parc']],
                            'tr' => ['sentence' => 'evi zaten gördüm', 'correct' => ['evi', 'zaten', 'gördüm'], 'extra' => []],
                        'ru' => ['sentence' => 'я видел дом уже', 'correct' => ['я', 'видел', 'дом', 'уже'], 'extra' => []],
                        'ar' => ['sentence' => 'رأيت بيت بالفعل', 'correct' => ['رأيت', 'بيت', 'بالفعل'], 'extra' => []],
                        'az' => ['sentence' => 'gördüm ev artıq', 'correct' => ['gördüm', 'ev', 'artıq'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: I Was & Then', 4,
                pictures: [['en' => 'School', 'img' => 'school'], ['en' => 'Shop', 'img' => 'shop']],
                plain: [['en' => 'I was'], ['en' => 'Then']],
                phrases: [
                    'a' => [
                        'words' => ['I was', 'in', 'the', 'school'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Estaba en la escuela', 'correct' => ['estaba', 'en', 'la', 'escuela'], 'extra' => ['entonces', 'tienda']],
                            'de' => ['sentence' => 'Ich war in der Schule', 'correct' => ['ich war', 'in', 'der', 'Schule'], 'extra' => ['dann', 'Geschäft']],
                            'ja' => ['sentence' => '私は学校にいた', 'correct' => ['私', 'は', '学校', 'に', 'いた'], 'extra' => ['それから']],
                            'ko' => ['sentence' => '나는 학교에 있었다', 'correct' => ['나는', '학교에', '있었다'], 'extra' => ['그러면']],
                            'fr' => ['sentence' => "J'étais à l'école", 'correct' => ["j'étais", 'dans', 'le', 'école'], 'extra' => ['ensuite', 'magasin']],
                            'tr' => ['sentence' => 'ben okuldaydım', 'correct' => ['ben', 'okuldaydım'], 'extra' => []],
                        'ru' => ['sentence' => 'я был в школа', 'correct' => ['я', 'был', 'в', 'школа'], 'extra' => []],
                        'ar' => ['sentence' => 'كنت في مدرسة', 'correct' => ['كنت', 'في', 'مدرسة'], 'extra' => []],
                        'az' => ['sentence' => 'idim içində məktəb', 'correct' => ['idim', 'içində', 'məktəb'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['then', 'the', 'shop'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Entonces la tienda', 'correct' => ['entonces', 'la', 'tienda'], 'extra' => ['estaba', 'escuela']],
                            'de' => ['sentence' => 'Dann das Geschäft', 'correct' => ['dann', 'das', 'Geschäft'], 'extra' => ['ich war', 'Schule']],
                            'ja' => ['sentence' => 'それから店', 'correct' => ['それから', '店'], 'extra' => ['でした']],
                            'ko' => ['sentence' => '그러면 가게', 'correct' => ['그러면', '가게'], 'extra' => ['였습니다']],
                            'fr' => ['sentence' => 'Ensuite le magasin', 'correct' => ['ensuite', 'le', 'magasin'], 'extra' => ["j'étais", 'école']],
                            'tr' => ['sentence' => 'sonra dükkan', 'correct' => ['sonra', 'dükkan'], 'extra' => []],
                        'ru' => ['sentence' => 'потом магазин', 'correct' => ['потом', 'магазин'], 'extra' => []],
                        'ar' => ['sentence' => 'ثم متجر', 'correct' => ['ثم', 'متجر'], 'extra' => []],
                        'az' => ['sentence' => 'sonra mağaza', 'correct' => ['sonra', 'mağaza'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['I was', 'here', 'then'], 'blank' => 2,
                        'tr' => [
                            'es' => ['sentence' => 'Estaba aquí entonces', 'correct' => ['estaba', 'aquí', 'entonces'], 'extra' => ['tienda']],
                            'de' => ['sentence' => 'Ich war dann hier', 'correct' => ['ich war', 'dann', 'hier'], 'extra' => ['Geschäft']],
                            'ja' => ['sentence' => 'その時私はここにいた', 'correct' => ['その時', '私', 'は', 'ここ', 'に', 'いた'], 'extra' => ['店']],
                            'ko' => ['sentence' => '그때 나는 여기 있었다', 'correct' => ['그때', '나는', '여기', '있었다'], 'extra' => ['가게']],
                            'fr' => ['sentence' => "J'étais ici ensuite", 'correct' => ["j'étais", 'ici', 'ensuite'], 'extra' => ['magasin']],
                            'tr' => ['sentence' => 'sonra buradaydım', 'correct' => ['sonra', 'buradaydım'], 'extra' => []],
                        'ru' => ['sentence' => 'я был здесь потом', 'correct' => ['я', 'был', 'здесь', 'потом'], 'extra' => []],
                        'ar' => ['sentence' => 'كنت هنا ثم', 'correct' => ['كنت', 'هنا', 'ثم'], 'extra' => []],
                        'az' => ['sentence' => 'idim burada sonra', 'correct' => ['idim', 'burada', 'sonra'], 'extra' => []],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Yesterday Was Good', 5,
                pictures: [['en' => 'Friend', 'img' => 'friend'], ['en' => 'House', 'img' => 'house']],
                plain: [['en' => 'Yesterday'], ['en' => 'Good']],
                phrases: [
                    'a' => [
                        'words' => ['yesterday', 'it was', 'good'], 'blank' => 0,
                        'tr' => [
                            'es' => ['sentence' => 'Ayer fue bueno', 'correct' => ['ayer', 'fue', 'bueno'], 'extra' => ['amigo', 'casa']],
                            'de' => ['sentence' => 'Gestern war es gut', 'correct' => ['gestern', 'war es', 'gut'], 'extra' => ['Freund', 'Haus']],
                            'ja' => ['sentence' => '昨日は良かった', 'correct' => ['昨日', 'は', '良かった'], 'extra' => ['友達']],
                            'ko' => ['sentence' => '어제는 좋았다', 'correct' => ['어제는', '좋았다'], 'extra' => ['친구']],
                            'fr' => ['sentence' => "Hier c'était bon", 'correct' => ['hier', "c'était", 'bon'], 'extra' => ['ami', 'maison']],
                            'tr' => ['sentence' => 'dün iyiydi', 'correct' => ['dün', 'iyiydi'], 'extra' => []],
                        'ru' => ['sentence' => 'вчера было хороший', 'correct' => ['вчера', 'было', 'хороший'], 'extra' => []],
                        'ar' => ['sentence' => 'أمس كان جيد', 'correct' => ['أمس', 'كان', 'جيد'], 'extra' => []],
                        'az' => ['sentence' => 'dünən idi yaxşı', 'correct' => ['dünən', 'idi', 'yaxşı'], 'extra' => []],
                        ],
                    ],
                    'b' => [
                        'words' => ['my', 'friend', 'is', 'good'], 'blank' => 3,
                        'tr' => [
                            'es' => ['sentence' => 'Mi amigo es bueno', 'correct' => ['mi', 'amigo', 'es', 'bueno'], 'extra' => ['ayer', 'casa']],
                            'de' => ['sentence' => 'Mein Freund ist gut', 'correct' => ['mein', 'Freund', 'ist', 'gut'], 'extra' => ['gestern', 'Haus']],
                            'ja' => ['sentence' => '私の友達は良い', 'correct' => ['私の', '友達', 'は', '良い'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '나의 친구는 좋다', 'correct' => ['나의', '친구는', '좋다'], 'extra' => ['어제']],
                            'fr' => ['sentence' => 'Mon ami est bon', 'correct' => ['mon', 'ami', 'est', 'bon'], 'extra' => ['hier']],
                            'tr' => ['sentence' => 'arkadaşım iyi', 'correct' => ['arkadaşım', 'iyi'], 'extra' => []],
                        'ru' => ['sentence' => 'мой друг хороший', 'correct' => ['мой', 'друг', 'хороший'], 'extra' => []],
                        'ar' => ['sentence' => 'صديق جيد', 'correct' => ['صديق', 'جيد'], 'extra' => []],
                        'az' => ['sentence' => 'mənim dost yaxşı', 'correct' => ['mənim', 'dost', 'yaxşı'], 'extra' => []],
                        ],
                    ],
                    'c' => [
                        'words' => ['a', 'good', 'house'], 'blank' => 1,
                        'tr' => [
                            'es' => ['sentence' => 'Una casa buena', 'correct' => ['una', 'bueno', 'casa'], 'extra' => ['ayer', 'amigo']],
                            'de' => ['sentence' => 'Ein gutes Haus', 'correct' => ['ein', 'gut', 'Haus'], 'extra' => ['gestern', 'Freund']],
                            'ja' => ['sentence' => '良い家', 'correct' => ['良い', '家'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '좋은 집', 'correct' => ['좋은', '집'], 'extra' => ['어제']],
                            'fr' => ['sentence' => 'Une bonne maison', 'correct' => ['une', 'maison', 'bon'], 'extra' => ['hier']],
                            'tr' => ['sentence' => 'iyi bir ev', 'correct' => ['iyi', 'bir', 'ev'], 'extra' => []],
                        'ru' => ['sentence' => 'хороший дом', 'correct' => ['хороший', 'дом'], 'extra' => []],
                        'ar' => ['sentence' => 'جيد بيت', 'correct' => ['جيد', 'بيت'], 'extra' => []],
                        'az' => ['sentence' => 'bir yaxşı ev', 'correct' => ['bir', 'yaxşı', 'ev'], 'extra' => []],
                        ],
                    ],
                ],
            ),
        ];
    }
}
