<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation05Seeder extends Seeder
{
    private const PICTURES = [
        'Café' => 'coffee', 'Croissant' => 'croissant', 'Maison' => 'house',
        'Parc' => 'park', 'École' => 'school', 'Ami' => 'friend',
    ];

    /**
     * French Chapter 2, Unit 5 — talking about the past.
     *
     * The past forms are taught as WHOLE PHRASES ("j'ai mangé", "j'ai bu",
     * "c'était") rather than as a conjugation rule. A beginner needs to be able
     * to say "I ate a croissant yesterday" long before they can analyse the
     * passé composé, and every form here is anchored to food and places they
     * already know from Chapter 1.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 5, 'Unit 5: Talking About The Past', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Yesterday I Ate', 1,
                pictures: [['fr' => 'Croissant', 'img' => 'croissant'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Hier'], ['fr' => "J'ai mangé"]],
                phrases: [
                    'a' => [
                        'words' => ['hier', "j'ai mangé"], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Yesterday I ate', 'correct' => ['yesterday', 'I ate'], 'extra' => ['I drank', 'coffee']],
                            'az' => ['sentence' => 'dünən yedim', 'correct' => ['dünən', 'yedim'], 'extra' => ['içdim', 'qəhvə']],
                            'ar' => ['sentence' => 'أمس أكلت', 'correct' => ['أمس', 'أكلت'], 'extra' => ['شربت', 'قهوة']],
                            'ru' => ['sentence' => 'вчера я ел', 'correct' => ['вчера', 'я', 'ел'], 'extra' => ['пил', 'кофе']],
                            'es' => ['sentence' => 'Ayer comí', 'correct' => ['ayer', 'comí'], 'extra' => ['bebí', 'café']],
                            'de' => ['sentence' => 'Gestern habe ich gegessen', 'correct' => ['gestern', 'habe ich gegessen'], 'extra' => ['ich habe getrunken']],
                            'ja' => ['sentence' => '昨日私は食べた', 'correct' => ['昨日', '私は食べた'], 'extra' => ['私は飲んだ']],
                            'ko' => ['sentence' => '어제 나는 먹었다', 'correct' => ['어제', '나는', '먹었다'], 'extra' => ['나는 마셨다']],
                            'tr' => ['sentence' => 'dün yedim', 'correct' => ['dün', 'yedim'], 'extra' => ['içtim', 'kahve']],
                        ],
                    ],
                    'b' => [
                        'words' => ["j'ai mangé", 'un', 'croissant'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I ate a croissant', 'correct' => ['I ate', 'a', 'croissant'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'yedim bir kruassan', 'correct' => ['yedim', 'bir', 'kruassan'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'أكلت كرواسون', 'correct' => ['أكلت', 'كرواسون'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'я ел круассан', 'correct' => ['я', 'ел', 'круассан'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'Comí un cruasán', 'correct' => ['comí', 'un', 'cruasán'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ich habe ein Croissant gegessen', 'correct' => ['ich habe ein', 'Croissant', 'gegessen'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => '私はクロワッサンを食べた', 'correct' => ['私', 'は', 'クロワッサン', 'を', '食べた'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '나는 크루아상을 먹었다', 'correct' => ['나는', '크루아상을', '먹었다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'bir kruvasan yedim', 'correct' => ['bir', 'kruvasan', 'yedim'], 'extra' => ['kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hier', "j'ai mangé", 'un', 'croissant', 'et', 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Yesterday I ate a croissant and a coffee', 'correct' => ['yesterday', 'I ate', 'a', 'croissant', 'and', 'a', 'coffee'], 'extra' => ['tea']],
                            'az' => ['sentence' => 'dünən yedim bir kruassan və bir qəhvə', 'correct' => ['dünən', 'yedim', 'bir', 'kruassan', 'və', 'bir', 'qəhvə'], 'extra' => ['çay']],
                            'ar' => ['sentence' => 'أمس أكلت كرواسون و قهوة', 'correct' => ['أمس', 'أكلت', 'كرواسون', 'و', 'قهوة'], 'extra' => ['شاي']],
                            'ru' => ['sentence' => 'вчера я ел круассан и кофе', 'correct' => ['вчера', 'я', 'ел', 'круассан', 'и', 'кофе'], 'extra' => ['чай']],
                            'es' => ['sentence' => 'Ayer comí un cruasán y un café', 'correct' => ['ayer', 'comí', 'un', 'cruasán', 'y', 'un', 'café'], 'extra' => ['té']],
                            'de' => ['sentence' => 'Gestern habe ich ein Croissant und einen Kaffee gegessen', 'correct' => ['gestern', 'habe ich ein', 'Croissant', 'und', 'einen', 'Kaffee', 'gegessen'], 'extra' => ['Tee']],
                            'ja' => ['sentence' => '昨日私はクロワッサンとコーヒーを食べた', 'correct' => ['昨日', '私', 'は', 'クロワッサン', 'と', 'コーヒー', 'を', '食べた'], 'extra' => ['お茶']],
                            'ko' => ['sentence' => '어제 나는 크루아상과 커피를 먹었다', 'correct' => ['어제', '나는', '크루아상과', '커피를', '먹었다'], 'extra' => ['차']],
                            'tr' => ['sentence' => 'dün bir kruvasan ve bir kahve aldım', 'correct' => ['dün', 'bir', 'kruvasan', 've', 'bir', 'kahve', 'aldım'], 'extra' => ['çay']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: I Drank & It Was', 2,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => "J'ai bu"], ['fr' => "C'était"]],
                phrases: [
                    'a' => [
                        'words' => ["j'ai bu", 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I drank a coffee', 'correct' => ['I drank', 'a', 'coffee'], 'extra' => ['it was']],
                            'az' => ['sentence' => 'içdim bir qəhvə', 'correct' => ['içdim', 'bir', 'qəhvə'], 'extra' => ['idi']],
                            'ar' => ['sentence' => 'شربت قهوة', 'correct' => ['شربت', 'قهوة'], 'extra' => ['كان']],
                            'ru' => ['sentence' => 'я пил кофе', 'correct' => ['я', 'пил', 'кофе'], 'extra' => ['было']],
                            'es' => ['sentence' => 'Bebí un café', 'correct' => ['bebí', 'un', 'café'], 'extra' => ['era']],
                            'de' => ['sentence' => 'Ich habe einen Kaffee getrunken', 'correct' => ['ich habe einen', 'Kaffee', 'getrunken'], 'extra' => ['es war']],
                            'ja' => ['sentence' => '私はコーヒーを飲んだ', 'correct' => ['私', 'は', 'コーヒー', 'を', '飲んだ'], 'extra' => ['でした']],
                            'ko' => ['sentence' => '나는 커피를 마셨다', 'correct' => ['나는', '커피를', '마셨다'], 'extra' => ['였습니다']],
                            'tr' => ['sentence' => 'bir kahve içtim', 'correct' => ['bir', 'kahve', 'içtim'], 'extra' => ['idi']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'était", 'bien'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'It was good', 'correct' => ['it was', 'well'], 'extra' => ['I drank']],
                            'az' => ['sentence' => 'idi yaxşıyam', 'correct' => ['idi', 'yaxşıyam'], 'extra' => ['içdim']],
                            'ar' => ['sentence' => 'كان بخير', 'correct' => ['كان', 'بخير'], 'extra' => ['شربت']],
                            'ru' => ['sentence' => 'было хорошо', 'correct' => ['было', 'хорошо'], 'extra' => ['я', 'пил']],
                            'es' => ['sentence' => 'Era bien', 'correct' => ['era', 'bien'], 'extra' => ['bebí']],
                            'de' => ['sentence' => 'Es war gut', 'correct' => ['es war', 'gut'], 'extra' => ['ich habe getrunken']],
                            'ja' => ['sentence' => 'それはよかった', 'correct' => ['それ', 'は', 'よかった'], 'extra' => ['私は飲んだ']],
                            'ko' => ['sentence' => '그것은 좋았다', 'correct' => ['그것은', '좋았다'], 'extra' => ['나는 마셨다']],
                            'tr' => ['sentence' => 'o iyiydi', 'correct' => ['o', 'iyiydi'], 'extra' => ['içtim']],
                        ],
                    ],
                    'c' => [
                        'words' => ["c'était", 'dans', 'ma', 'maison'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'It was in my house', 'correct' => ['it was', 'in', 'my', 'house'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'idi içində mənim ev', 'correct' => ['idi', 'içində', 'mənim', 'ev'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'كان في بيت', 'correct' => ['كان', 'في', 'بيت'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'было в мой дом', 'correct' => ['было', 'в', 'мой', 'дом'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'Era en mi casa', 'correct' => ['era', 'en', 'mi', 'casa'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Es war in meinem Haus', 'correct' => ['es war', 'in', 'meinem', 'Haus'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'それは私の家だった', 'correct' => ['それ', 'は', '私の', '家', 'だった'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '그것은 나의 집에서였다', 'correct' => ['그것은', '나의', '집에서였다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'evimdeydi', 'correct' => ['evimdeydi'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: I Saw & Already', 3,
                pictures: [['fr' => 'Parc', 'img' => 'park'], ['fr' => 'École', 'img' => 'school']],
                plain: [['fr' => "J'ai vu"], ['fr' => 'Déjà']],
                phrases: [
                    'a' => [
                        'words' => ["j'ai vu", 'un', 'parc'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I saw a park', 'correct' => ['I saw', 'a', 'park'], 'extra' => ['already', 'school']],
                            'az' => ['sentence' => 'gördüm bir park', 'correct' => ['gördüm', 'bir', 'park'], 'extra' => ['artıq', 'məktəb']],
                            'ar' => ['sentence' => 'رأيت حديقة', 'correct' => ['رأيت', 'حديقة'], 'extra' => ['بالفعل', 'مدرسة']],
                            'ru' => ['sentence' => 'я видел парк', 'correct' => ['я', 'видел', 'парк'], 'extra' => ['уже', 'школа']],
                            'es' => ['sentence' => 'Vi un parque', 'correct' => ['vi', 'un', 'parque'], 'extra' => ['ya', 'escuela']],
                            'de' => ['sentence' => 'Ich habe einen Park gesehen', 'correct' => ['ich habe einen', 'Park', 'gesehen'], 'extra' => ['schon']],
                            'ja' => ['sentence' => '私は公園を見た', 'correct' => ['私', 'は', '公園', 'を', '見た'], 'extra' => ['すでに']],
                            'ko' => ['sentence' => '나는 공원을 보았다', 'correct' => ['나는', '공원을', '보았다'], 'extra' => ['이미']],
                            'tr' => ['sentence' => 'bir park gördüm', 'correct' => ['bir', 'park', 'gördüm'], 'extra' => ['zaten', 'okul']],
                        ],
                    ],
                    'b' => [
                        'words' => ['déjà', 'une', 'école'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Already a school', 'correct' => ['already', 'a', 'school'], 'extra' => ['I saw', 'park']],
                            'az' => ['sentence' => 'artıq bir məktəb', 'correct' => ['artıq', 'bir', 'məktəb'], 'extra' => ['gördüm', 'park']],
                            'ar' => ['sentence' => 'بالفعل مدرسة', 'correct' => ['بالفعل', 'مدرسة'], 'extra' => ['رأيت', 'حديقة']],
                            'ru' => ['sentence' => 'уже школа', 'correct' => ['уже', 'школа'], 'extra' => ['я', 'видел', 'парк']],
                            'es' => ['sentence' => 'Ya una escuela', 'correct' => ['ya', 'una', 'escuela'], 'extra' => ['vi', 'parque']],
                            'de' => ['sentence' => 'Schon eine Schule', 'correct' => ['schon', 'eine', 'Schule'], 'extra' => ['ich habe gesehen']],
                            'ja' => ['sentence' => 'すでに学校', 'correct' => ['すでに', '学校'], 'extra' => ['私は見た', '公園']],
                            'ko' => ['sentence' => '이미 학교', 'correct' => ['이미', '학교'], 'extra' => ['나는 보았다', '공원']],
                            'tr' => ['sentence' => 'zaten bir okul', 'correct' => ['zaten', 'bir', 'okul'], 'extra' => ['gördüm', 'park']],
                        ],
                    ],
                    'c' => [
                        'words' => ["j'ai vu", 'une', 'école', 'et', 'un', 'parc'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'I saw a school and a park', 'correct' => ['I saw', 'a', 'school', 'and', 'a', 'park'], 'extra' => ['already']],
                            'az' => ['sentence' => 'gördüm bir məktəb və bir park', 'correct' => ['gördüm', 'bir', 'məktəb', 'və', 'bir', 'park'], 'extra' => ['artıq']],
                            'ar' => ['sentence' => 'رأيت مدرسة و حديقة', 'correct' => ['رأيت', 'مدرسة', 'و', 'حديقة'], 'extra' => ['بالفعل']],
                            'ru' => ['sentence' => 'я видел школа и парк', 'correct' => ['я', 'видел', 'школа', 'и', 'парк'], 'extra' => ['уже']],
                            'es' => ['sentence' => 'Vi una escuela y un parque', 'correct' => ['vi', 'una', 'escuela', 'y', 'un', 'parque'], 'extra' => ['ya']],
                            'de' => ['sentence' => 'Ich habe eine Schule und einen Park gesehen', 'correct' => ['ich habe eine', 'Schule', 'und', 'einen', 'Park', 'gesehen'], 'extra' => ['schon']],
                            'ja' => ['sentence' => '私は学校と公園を見た', 'correct' => ['私', 'は', '学校', 'と', '公園', 'を', '見た'], 'extra' => ['すでに']],
                            'ko' => ['sentence' => '나는 학교와 공원을 보았다', 'correct' => ['나는', '학교와', '공원을', '보았다'], 'extra' => ['이미']],
                            'tr' => ['sentence' => 'bir okul ve bir park gördüm', 'correct' => ['bir', 'okul', 've', 'bir', 'park', 'gördüm'], 'extra' => ['zaten']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: I Was & Then', 4,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => "J'étais"], ['fr' => 'Puis']],
                phrases: [
                    'a' => [
                        'words' => ["j'étais", 'content'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I was happy', 'correct' => ['I was', 'happy'], 'extra' => ['then', 'friend']],
                            'az' => ['sentence' => 'idim xoşbəxt', 'correct' => ['idim', 'xoşbəxt'], 'extra' => ['sonra', 'dost']],
                            'ar' => ['sentence' => 'كنت فرح', 'correct' => ['كنت', 'فرح'], 'extra' => ['ثم', 'صديق']],
                            'ru' => ['sentence' => 'я был счастливый', 'correct' => ['я', 'был', 'счастливый'], 'extra' => ['потом', 'друг']],
                            'es' => ['sentence' => 'Estaba contento', 'correct' => ['estaba', 'contento'], 'extra' => ['después', 'amigo']],
                            'de' => ['sentence' => 'Ich war zufrieden', 'correct' => ['ich war', 'zufrieden'], 'extra' => ['danach', 'Freund']],
                            'ja' => ['sentence' => '私は満足だった', 'correct' => ['私', 'は', '満足', 'だった'], 'extra' => ['それから', '友達']],
                            'ko' => ['sentence' => '나는 만족했다', 'correct' => ['나는', '만족했다'], 'extra' => ['그러고 나서', '친구']],
                            'tr' => ['sentence' => 'mutluydum', 'correct' => ['mutluydum'], 'extra' => ['sonra', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ['puis', "j'ai bu", 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Then I drank a coffee', 'correct' => ['then', 'I drank', 'a', 'coffee'], 'extra' => ['I was']],
                            'az' => ['sentence' => 'sonra içdim bir qəhvə', 'correct' => ['sonra', 'içdim', 'bir', 'qəhvə'], 'extra' => ['idim']],
                            'ar' => ['sentence' => 'ثم شربت قهوة', 'correct' => ['ثم', 'شربت', 'قهوة'], 'extra' => ['كنت']],
                            'ru' => ['sentence' => 'потом я пил кофе', 'correct' => ['потом', 'я', 'пил', 'кофе'], 'extra' => ['был']],
                            'es' => ['sentence' => 'Después bebí un café', 'correct' => ['después', 'bebí', 'un', 'café'], 'extra' => ['estaba']],
                            'de' => ['sentence' => 'Danach habe ich einen Kaffee getrunken', 'correct' => ['danach', 'habe ich einen', 'Kaffee', 'getrunken'], 'extra' => ['ich war']],
                            'ja' => ['sentence' => 'それから私はコーヒーを飲んだ', 'correct' => ['それから', '私', 'は', 'コーヒー', 'を', '飲んだ'], 'extra' => ['でした']],
                            'ko' => ['sentence' => '그러고 나서 나는 커피를 마셨다', 'correct' => ['그러고', '나서', '나는', '커피를', '마셨다'], 'extra' => ['였습니다']],
                            'tr' => ['sentence' => 'sonra bir kahve içtim', 'correct' => ['sonra', 'bir', 'kahve', 'içtim'], 'extra' => ['idim']],
                        ],
                    ],
                    'c' => [
                        'words' => ["j'étais", 'avec', 'mon', 'ami'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'I was with my friend', 'correct' => ['I was', 'with', 'my', 'friend'], 'extra' => ['then']],
                            'az' => ['sentence' => 'idim ilə mənim dost', 'correct' => ['idim', 'ilə', 'mənim', 'dost'], 'extra' => ['sonra']],
                            'ar' => ['sentence' => 'كنت مع صديق', 'correct' => ['كنت', 'مع', 'صديق'], 'extra' => ['ثم']],
                            'ru' => ['sentence' => 'я был с мой друг', 'correct' => ['я', 'был', 'с', 'мой', 'друг'], 'extra' => ['потом']],
                            'es' => ['sentence' => 'Estaba con mi amigo', 'correct' => ['estaba', 'con', 'mi', 'amigo'], 'extra' => ['después']],
                            'de' => ['sentence' => 'Ich war mit meinem Freund', 'correct' => ['ich war', 'mit', 'meinem', 'Freund'], 'extra' => ['danach']],
                            'ja' => ['sentence' => '私は友達と一緒だった', 'correct' => ['私', 'は', '友達', 'と', '一緒', 'だった'], 'extra' => ['それから']],
                            'ko' => ['sentence' => '나는 나의 친구와 함께 있었다', 'correct' => ['나는', '나의', '친구와', '함께', '있었다'], 'extra' => ['그러고 나서']],
                            'tr' => ['sentence' => 'arkadaşımlaydım', 'correct' => ['arkadaşımlaydım'], 'extra' => ['sonra']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: Yesterday Was Good', 5,
                pictures: [['fr' => 'Croissant', 'img' => 'croissant'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Hier'], ['fr' => "C'était"]],
                phrases: [
                    'a' => [
                        'words' => ['hier', "j'ai bu", 'un', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'Yesterday I drank a coffee', 'correct' => ['yesterday', 'I drank', 'a', 'coffee'], 'extra' => ['it was']],
                            'az' => ['sentence' => 'dünən içdim bir qəhvə', 'correct' => ['dünən', 'içdim', 'bir', 'qəhvə'], 'extra' => ['idi']],
                            'ar' => ['sentence' => 'أمس شربت قهوة', 'correct' => ['أمس', 'شربت', 'قهوة'], 'extra' => ['كان']],
                            'ru' => ['sentence' => 'вчера я пил кофе', 'correct' => ['вчера', 'я', 'пил', 'кофе'], 'extra' => ['было']],
                            'es' => ['sentence' => 'Ayer bebí un café', 'correct' => ['ayer', 'bebí', 'un', 'café'], 'extra' => ['era']],
                            'de' => ['sentence' => 'Gestern habe ich einen Kaffee getrunken', 'correct' => ['gestern', 'habe ich einen', 'Kaffee', 'getrunken'], 'extra' => ['es war']],
                            'ja' => ['sentence' => '昨日私はコーヒーを飲んだ', 'correct' => ['昨日', '私', 'は', 'コーヒー', 'を', '飲んだ'], 'extra' => ['でした']],
                            'ko' => ['sentence' => '어제 나는 커피를 마셨다', 'correct' => ['어제', '나는', '커피를', '마셨다'], 'extra' => ['였습니다']],
                            'tr' => ['sentence' => 'dün bir kahve içtim', 'correct' => ['dün', 'bir', 'kahve', 'içtim'], 'extra' => ['idi']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'était", 'un', 'bon', 'croissant'], 'blank' => 3,
                        'tr' => [
                            'en' => ['sentence' => 'It was a good croissant', 'correct' => ['it was', 'a', 'good', 'croissant'], 'extra' => ['yesterday']],
                            'az' => ['sentence' => 'idi bir yaxşı kruassan', 'correct' => ['idi', 'bir', 'yaxşı', 'kruassan'], 'extra' => ['dünən']],
                            'ar' => ['sentence' => 'كان جيد كرواسون', 'correct' => ['كان', 'جيد', 'كرواسون'], 'extra' => ['أمس']],
                            'ru' => ['sentence' => 'было хороший круассан', 'correct' => ['было', 'хороший', 'круассан'], 'extra' => ['вчера']],
                            'es' => ['sentence' => 'Era un buen cruasán', 'correct' => ['era', 'un', 'buen', 'cruasán'], 'extra' => ['ayer']],
                            'de' => ['sentence' => 'Es war ein gutes Croissant', 'correct' => ['es war', 'ein', 'gutes', 'Croissant'], 'extra' => ['gestern']],
                            'ja' => ['sentence' => 'それは良いクロワッサンだった', 'correct' => ['それ', 'は', '良い', 'クロワッサン', 'だった'], 'extra' => ['昨日']],
                            'ko' => ['sentence' => '그것은 좋은 크루아상이었다', 'correct' => ['그것은', '좋은', '크루아상이었다'], 'extra' => ['어제']],
                            'tr' => ['sentence' => 'iyi bir kruvasandı', 'correct' => ['iyi', 'bir', 'kruvasandı'], 'extra' => ['dün']],
                        ],
                    ],
                    'c' => [
                        'words' => ['hier', "c'était", 'dans', 'ma', 'maison'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'Yesterday it was in my house', 'correct' => ['yesterday', 'it was', 'in', 'my', 'house'], 'extra' => ['croissant']],
                            'az' => ['sentence' => 'dünən idi içində mənim ev', 'correct' => ['dünən', 'idi', 'içində', 'mənim', 'ev'], 'extra' => ['kruassan']],
                            'ar' => ['sentence' => 'أمس كان في بيت', 'correct' => ['أمس', 'كان', 'في', 'بيت'], 'extra' => ['كرواسون']],
                            'ru' => ['sentence' => 'вчера было в мой дом', 'correct' => ['вчера', 'было', 'в', 'мой', 'дом'], 'extra' => ['круассан']],
                            'es' => ['sentence' => 'Ayer era en mi casa', 'correct' => ['ayer', 'era', 'en', 'mi', 'casa'], 'extra' => ['cruasán']],
                            'de' => ['sentence' => 'Gestern war es in meinem Haus', 'correct' => ['gestern', 'war es', 'in', 'meinem', 'Haus'], 'extra' => ['Croissant']],
                            'ja' => ['sentence' => '昨日それは私の家だった', 'correct' => ['昨日', 'それ', 'は', '私の', '家', 'だった'], 'extra' => ['クロワッサン']],
                            'ko' => ['sentence' => '어제 그것은 나의 집에서였다', 'correct' => ['어제', '그것은', '나의', '집에서였다'], 'extra' => ['크루아상']],
                            'tr' => ['sentence' => 'dün evimdeydi', 'correct' => ['dün', 'evimdeydi'], 'extra' => ['kruvasan']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
