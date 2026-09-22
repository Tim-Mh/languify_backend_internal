<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\AzerbaijaniLessonBuilder;
use Illuminate\Database\Seeder;

class AzUnitConversation07Seeder extends Seeder
{
    /** Pictures this unit can offer as wrong answers. */
    private const PICTURES = [
        'Qəhvə' => 'coffee', 'Çay' => 'tea', 'Küçə' => 'street', 'Məktəb' => 'school',
        'Mağaza' => 'shop', 'Kinoteatr' => 'cinema', 'Su' => 'water', 'Süd' => 'milk',
    ];

    /**
     * Azerbaijani Conversation Unit 7.
     *
     * Follows the same lesson plan as the other courses, so a learner who
     * has taken one of them meets the same ideas in the same order. The
     * Azerbaijani sentences are built from the shared plan tile by tile, and
     * every tile is a AzerbaijaniVocabulary headword — a phrase that needed a
     * word the dictionary does not have would have failed to generate
     * rather than reaching a learner unglossed.
     */
    public function run(): void
    {
        $language = Language::where('code', 'az')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new AzerbaijaniLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 7, 'Unit 7: Giving Directions', $this->lessonsData($builder));
    }

    private function lessonsData(AzerbaijaniLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: Right & Left', 1,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Dönüş'], ['az' => 'Sağa']],
                phrases: [
                    'a' => [
                        'words' => ['dönüş', 'sağa'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Turn to the right', 'correct' => ['turn', 'to the right'], 'extra' => ['to the left', 'straight']],
                            'fr' => ['sentence' => 'Tournez à droite', 'correct' => ['tournez', 'à droite'], 'extra' => ['à gauche', 'tout droit']],
                            'es' => ['sentence' => 'Gire a la derecha', 'correct' => ['gire', 'a la derecha'], 'extra' => ['a la izquierda', 'recto']],
                            'de' => ['sentence' => 'Biegen Sie nach rechts ab', 'correct' => ['biegen Sie', 'nach rechts', 'ab'], 'extra' => ['nach links', 'geradeaus']],
                            'ja' => ['sentence' => '右へ曲がってください', 'correct' => ['右へ', '曲がってください'], 'extra' => ['左へ', 'まっすぐ']],
                            'ko' => ['sentence' => '오른쪽으로 도세요', 'correct' => ['오른쪽으로', '도세요'], 'extra' => ['왼쪽으로', '직진']],
                            'tr' => ['sentence' => 'sağa dönün', 'correct' => ['sağa', 'dönün'], 'extra' => ['sağ', 'sol']],
                            'ru' => ['sentence' => 'поворот направо', 'correct' => ['поворот', 'направо'], 'extra' => ['налево', 'прямо']],
                            'ar' => ['sentence' => 'منعطف يمينا', 'correct' => ['منعطف', 'يمينا'], 'extra' => ['يسارا', 'مباشرة']],
                        ],
                    ],
                    'b' => [
                        'words' => ['dönüş', 'sola'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Turn to the left', 'correct' => ['turn', 'to the left'], 'extra' => ['to the right', 'straight']],
                            'fr' => ['sentence' => 'Tournez à gauche', 'correct' => ['tournez', 'à gauche'], 'extra' => ['à droite', 'tout droit']],
                            'es' => ['sentence' => 'Gire a la izquierda', 'correct' => ['gire', 'a la izquierda'], 'extra' => ['a la derecha', 'recto']],
                            'de' => ['sentence' => 'Biegen Sie nach links ab', 'correct' => ['biegen Sie', 'nach links', 'ab'], 'extra' => ['nach rechts', 'geradeaus']],
                            'ja' => ['sentence' => '左へ曲がってください', 'correct' => ['左へ', '曲がってください'], 'extra' => ['右へ', 'まっすぐ']],
                            'ko' => ['sentence' => '왼쪽으로 도세요', 'correct' => ['왼쪽으로', '도세요'], 'extra' => ['오른쪽으로', '직진']],
                            'tr' => ['sentence' => 'sola dönün', 'correct' => ['sola', 'dönün'], 'extra' => ['sağ', 'sol']],
                            'ru' => ['sentence' => 'поворот налево', 'correct' => ['поворот', 'налево'], 'extra' => ['направо', 'прямо']],
                            'ar' => ['sentence' => 'منعطف يسارا', 'correct' => ['منعطف', 'يسارا'], 'extra' => ['يمينا', 'مباشرة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['sağ', 'və', 'sol'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Right and left', 'correct' => ['right', 'and', 'left'], 'extra' => ['straight']],
                            'fr' => ['sentence' => 'Droite et gauche', 'correct' => ['droite', 'et', 'gauche'], 'extra' => ['tout droit']],
                            'es' => ['sentence' => 'Derecha e izquierda', 'correct' => ['derecha', 'e', 'izquierda'], 'extra' => ['recto']],
                            'de' => ['sentence' => 'Rechts und links', 'correct' => ['rechts', 'und', 'links'], 'extra' => ['geradeaus']],
                            'ja' => ['sentence' => '右と左', 'correct' => ['右', 'と', '左'], 'extra' => ['まっすぐ']],
                            'ko' => ['sentence' => '오른쪽과 왼쪽', 'correct' => ['오른쪽과', '왼쪽'], 'extra' => ['직진']],
                            'tr' => ['sentence' => 'sağ ve sol', 'correct' => ['sağ', 've', 'sol'], 'extra' => ['okul', 'park']],
                            'ru' => ['sentence' => 'правый и левый', 'correct' => ['правый', 'и', 'левый'], 'extra' => ['прямо']],
                            'ar' => ['sentence' => 'يمين و يسار', 'correct' => ['يمين', 'و', 'يسار'], 'extra' => ['مباشرة']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 2: Straight On', 2,
                pictures: [['az' => 'Küçə', 'img' => 'street'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Gedirəm'], ['az' => 'Düz']],
                phrases: [
                    'a' => [
                        'words' => ['gedirəm', 'düz'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Go straight', 'correct' => ['go', 'straight'], 'extra' => ['to the right', 'street']],
                            'fr' => ['sentence' => 'Allez tout droit', 'correct' => ['allez', 'tout droit'], 'extra' => ['à droite', 'rue']],
                            'es' => ['sentence' => 'Vaya recto', 'correct' => ['vaya', 'recto'], 'extra' => ['a la derecha', 'calle']],
                            'de' => ['sentence' => 'Gehen Sie geradeaus', 'correct' => ['gehen Sie', 'geradeaus'], 'extra' => ['nach rechts', 'Straße']],
                            'ja' => ['sentence' => 'まっすぐ行ってください', 'correct' => ['まっすぐ', '行ってください'], 'extra' => ['右へ', '通り']],
                            'ko' => ['sentence' => '직진 가세요', 'correct' => ['직진', '가세요'], 'extra' => ['오른쪽으로', '거리']],
                            'tr' => ['sentence' => 'düz gidin', 'correct' => ['düz', 'gidin'], 'extra' => ['cadde', 'dükkan']],
                            'ru' => ['sentence' => 'иду прямо', 'correct' => ['иду', 'прямо'], 'extra' => ['направо', 'улица']],
                            'ar' => ['sentence' => 'أذهب مباشرة', 'correct' => ['أذهب', 'مباشرة'], 'extra' => ['يمينا', 'شارع']],
                        ],
                    ],
                    'b' => [
                        'words' => ['bu', 'küçə'], 'blank' => 1,
                        'means' => [
                            'en' => ['sentence' => 'This street', 'correct' => ['this', 'street'], 'extra' => ['corner', 'straight']],
                            'fr' => ['sentence' => 'Cette rue', 'correct' => ['cette', 'rue'], 'extra' => ['coin', 'tout droit']],
                            'es' => ['sentence' => 'Esta calle', 'correct' => ['esta', 'calle'], 'extra' => ['esquina', 'recto']],
                            'de' => ['sentence' => 'Diese Straße', 'correct' => ['diese', 'Straße'], 'extra' => ['Ecke', 'geradeaus']],
                            'ja' => ['sentence' => 'この通り', 'correct' => ['この', '通り'], 'extra' => ['角', 'まっすぐ']],
                            'ko' => ['sentence' => '이 거리', 'correct' => ['이', '거리'], 'extra' => ['모퉁이', '직진']],
                            'tr' => ['sentence' => 'bu cadde', 'correct' => ['bu', 'cadde'], 'extra' => ['düz', 'dükkan']],
                            'ru' => ['sentence' => 'это улица', 'correct' => ['это', 'улица'], 'extra' => ['угол', 'прямо']],
                            'ar' => ['sentence' => 'هذا شارع', 'correct' => ['هذا', 'شارع'], 'extra' => ['زاوية', 'مباشرة']],
                        ],
                    ],
                    'c' => [
                        'words' => ['dönüş', 'sağ', 'küncdə'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'Turn right at the corner', 'correct' => ['turn', 'right', 'at the corner'], 'extra' => ['street']],
                            'fr' => ['sentence' => 'Tournez à droite au coin', 'correct' => ['tournez', 'à droite', 'au coin'], 'extra' => ['rue']],
                            'es' => ['sentence' => 'Gire a la derecha en la esquina', 'correct' => ['gire', 'a la derecha', 'en la esquina'], 'extra' => ['calle']],
                            'de' => ['sentence' => 'Biegen Sie an der Ecke nach rechts ab', 'correct' => ['biegen Sie', 'an der Ecke', 'nach rechts', 'ab'], 'extra' => ['Straße']],
                            'ja' => ['sentence' => '角で右へ曲がってください', 'correct' => ['角で', '右へ', '曲がってください'], 'extra' => ['通り']],
                            'ko' => ['sentence' => '모퉁이에서 오른쪽으로 도세요', 'correct' => ['모퉁이에서', '오른쪽으로', '도세요'], 'extra' => ['거리']],
                            'tr' => ['sentence' => 'köşede sağa dönün', 'correct' => ['köşede', 'sağa', 'dönün'], 'extra' => ['düz', 'cadde']],
                            'ru' => ['sentence' => 'поворот правый на углу', 'correct' => ['поворот', 'правый', 'на', 'углу'], 'extra' => ['улица']],
                            'ar' => ['sentence' => 'منعطف يمين في الزاوية', 'correct' => ['منعطف', 'يمين', 'في الزاوية'], 'extra' => ['شارع']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 3: Near & Far', 3,
                pictures: [['az' => 'Məktəb', 'img' => 'school'], ['az' => 'Qəhvə', 'img' => 'coffee']],
                plain: [['az' => 'Yaxın'], ['az' => 'Parkda']],
                phrases: [
                    'a' => [
                        'words' => ['məktəb', 'yaxın'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The school is near', 'correct' => ['the school', 'is', 'near'], 'extra' => ['far']],
                            'fr' => ['sentence' => "L'école est près", 'correct' => ["l'école", 'est', 'près'], 'extra' => ['loin']],
                            'es' => ['sentence' => 'La escuela está cerca', 'correct' => ['la escuela', 'está', 'cerca'], 'extra' => ['lejos']],
                            'de' => ['sentence' => 'Die Schule ist nah', 'correct' => ['die Schule', 'ist', 'nah'], 'extra' => ['weit']],
                            'ja' => ['sentence' => '学校は近いです', 'correct' => ['学校は', '近いです'], 'extra' => ['遠い']],
                            'ko' => ['sentence' => '학교는 가까워요', 'correct' => ['학교는', '가까워요'], 'extra' => ['먼']],
                            'tr' => ['sentence' => 'okul yakın', 'correct' => ['okul', 'yakın'], 'extra' => ['uzak', 'park']],
                            'ru' => ['sentence' => 'школа близко', 'correct' => ['школа', 'близко'], 'extra' => ['далеко']],
                            'ar' => ['sentence' => 'مدرسة قريب', 'correct' => ['مدرسة', 'قريب'], 'extra' => ['بعيد']],
                        ],
                    ],
                    'b' => [
                        'words' => ['parkda', 'uzaq'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The park is far', 'correct' => ['the park', 'is', 'far'], 'extra' => ['near']],
                            'fr' => ['sentence' => 'Le parc est loin', 'correct' => ['le parc', 'est', 'loin'], 'extra' => ['près']],
                            'es' => ['sentence' => 'El parque está lejos', 'correct' => ['el parque', 'está', 'lejos'], 'extra' => ['cerca']],
                            'de' => ['sentence' => 'Der Park ist weit', 'correct' => ['der Park', 'ist', 'weit'], 'extra' => ['nah']],
                            'ja' => ['sentence' => '公園は遠いです', 'correct' => ['公園は', '遠いです'], 'extra' => ['近い']],
                            'ko' => ['sentence' => '공원은 멀어요', 'correct' => ['공원은', '멀어요'], 'extra' => ['가까운']],
                            'tr' => ['sentence' => 'park uzak', 'correct' => ['park', 'uzak'], 'extra' => ['yakın', 'okul']],
                            'ru' => ['sentence' => 'парк далеко', 'correct' => ['парк', 'далеко'], 'extra' => ['близко']],
                            'ar' => ['sentence' => 'الحديقة بعيد', 'correct' => ['الحديقة', 'بعيد'], 'extra' => ['قريب']],
                        ],
                    ],
                    'c' => [
                        'words' => ['məktəb', 'orada'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The school is there', 'correct' => ['the school', 'is', 'there'], 'extra' => ['here', 'far']],
                            'fr' => ['sentence' => "L'école est là-bas", 'correct' => ["l'école", 'est', 'là-bas'], 'extra' => ['ici', 'loin']],
                            'es' => ['sentence' => 'La escuela está allí', 'correct' => ['la escuela', 'está', 'allí'], 'extra' => ['aquí', 'lejos']],
                            'de' => ['sentence' => 'Die Schule ist dort', 'correct' => ['die Schule', 'ist', 'dort'], 'extra' => ['hier', 'weit']],
                            'ja' => ['sentence' => '学校はそこにあります', 'correct' => ['学校は', 'そこに', 'あります'], 'extra' => ['ここに', '遠い']],
                            'ko' => ['sentence' => '학교는 거기에 있어요', 'correct' => ['학교는', '거기에', '있어요'], 'extra' => ['여기에', '먼']],
                            'tr' => ['sentence' => 'okul orada', 'correct' => ['okul', 'orada'], 'extra' => ['yakın', 'uzak']],
                            'ru' => ['sentence' => 'школа там', 'correct' => ['школа', 'там'], 'extra' => ['здесь', 'далеко']],
                            'ar' => ['sentence' => 'مدرسة هناك', 'correct' => ['مدرسة', 'هناك'], 'extra' => ['هنا', 'بعيد']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 4: Where Is It?', 4,
                pictures: [['az' => 'Mağaza', 'img' => 'shop'], ['az' => 'Kinoteatr', 'img' => 'cinema']],
                plain: [['az' => 'Harada'], ['az' => 'Küncdə']],
                phrases: [
                    'a' => [
                        'words' => ['harada', 'mağaza'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Where is the shop', 'correct' => ['where', 'is', 'the shop'], 'extra' => ['the cinema']],
                            'fr' => ['sentence' => 'Où est le magasin', 'correct' => ['où', 'est', 'le magasin'], 'extra' => ['le cinéma']],
                            'es' => ['sentence' => 'Dónde está la tienda', 'correct' => ['dónde', 'está', 'la tienda'], 'extra' => ['el cine']],
                            'de' => ['sentence' => 'Wo ist das Geschäft', 'correct' => ['wo', 'ist', 'das Geschäft'], 'extra' => ['das Kino']],
                            'ja' => ['sentence' => '店はどこですか', 'correct' => ['店は', 'どこですか'], 'extra' => ['映画館']],
                            'ko' => ['sentence' => '가게는 어디예요', 'correct' => ['가게는', '어디예요'], 'extra' => ['영화관']],
                            'tr' => ['sentence' => 'dükkan nerede', 'correct' => ['dükkan', 'nerede'], 'extra' => ['köşe', 'sinema']],
                            'ru' => ['sentence' => 'где магазин', 'correct' => ['где', 'магазин'], 'extra' => ['кино']],
                            'ar' => ['sentence' => 'أين المتجر', 'correct' => ['أين', 'المتجر'], 'extra' => ['السينما']],
                        ],
                    ],
                    'b' => [
                        'words' => ['kinoteatr', 'küncdə'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The cinema is at the corner', 'correct' => ['the cinema', 'is', 'at the corner'], 'extra' => ['the shop']],
                            'fr' => ['sentence' => 'Le cinéma est au coin', 'correct' => ['le cinéma', 'est', 'au coin'], 'extra' => ['le magasin']],
                            'es' => ['sentence' => 'El cine está en la esquina', 'correct' => ['el cine', 'está', 'en la esquina'], 'extra' => ['la tienda']],
                            'de' => ['sentence' => 'Das Kino ist an der Ecke', 'correct' => ['das Kino', 'ist', 'an der Ecke'], 'extra' => ['das Geschäft']],
                            'ja' => ['sentence' => '映画館は角にあります', 'correct' => ['映画館は', '角に', 'あります'], 'extra' => ['店']],
                            'ko' => ['sentence' => '영화관은 모퉁이에 있어요', 'correct' => ['영화관은', '모퉁이에', '있어요'], 'extra' => ['가게']],
                            'tr' => ['sentence' => 'sinema köşede', 'correct' => ['sinema', 'köşede'], 'extra' => ['nerede', 'köşe']],
                            'ru' => ['sentence' => 'кино на углу', 'correct' => ['кино', 'на', 'углу'], 'extra' => ['магазин']],
                            'ar' => ['sentence' => 'السينما في الزاوية', 'correct' => ['السينما', 'في الزاوية'], 'extra' => ['المتجر']],
                        ],
                    ],
                    'c' => [
                        'words' => ['o', 'deyil', 'burada'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'It is not here', 'correct' => ['it', 'is not', 'here'], 'extra' => ['there']],
                            'fr' => ['sentence' => "Ce n'est pas ici", 'correct' => ['ce', "n'est pas", 'ici'], 'extra' => ['là-bas']],
                            'es' => ['sentence' => 'No está aquí', 'correct' => ['no está', 'aquí'], 'extra' => ['allí']],
                            'de' => ['sentence' => 'Es ist nicht hier', 'correct' => ['es', 'ist nicht', 'hier'], 'extra' => ['dort']],
                            'ja' => ['sentence' => 'ここにありません', 'correct' => ['ここに', 'ありません'], 'extra' => ['そこに']],
                            'ko' => ['sentence' => '여기에 없어요', 'correct' => ['여기에', '없어요'], 'extra' => ['거기에']],
                            'tr' => ['sentence' => 'burada değil', 'correct' => ['burada', 'değil'], 'extra' => ['nerede', 'köşe']],
                            'ru' => ['sentence' => 'оно не здесь', 'correct' => ['оно', 'не', 'здесь'], 'extra' => ['там']],
                            'ar' => ['sentence' => 'هو ليس هنا', 'correct' => ['هو', 'ليس', 'هنا'], 'extra' => ['هناك']],
                        ],
                    ],
                ],
            ),

            $builder->lesson('Lesson 5: Full Directions', 5,
                pictures: [['az' => 'Qəhvə', 'img' => 'coffee'], ['az' => 'Çay', 'img' => 'tea']],
                plain: [['az' => 'Gedirəm'], ['az' => 'Düz']],
                phrases: [
                    'a' => [
                        'words' => ['gedirəm', 'düz', 'və', 'dönüş', 'sola'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'Go straight and turn to the left', 'correct' => ['go', 'straight', 'and', 'turn', 'to the left'], 'extra' => ['to the right']],
                            'fr' => ['sentence' => 'Allez tout droit et tournez à gauche', 'correct' => ['allez', 'tout droit', 'et', 'tournez', 'à gauche'], 'extra' => ['à droite']],
                            'es' => ['sentence' => 'Vaya recto y gire a la izquierda', 'correct' => ['vaya', 'recto', 'y', 'gire', 'a la izquierda'], 'extra' => ['a la derecha']],
                            'de' => ['sentence' => 'Gehen Sie geradeaus und biegen Sie nach links ab', 'correct' => ['gehen Sie', 'geradeaus', 'und', 'biegen Sie', 'nach links', 'ab'], 'extra' => ['nach rechts']],
                            'ja' => ['sentence' => 'まっすぐ行って左へ曲がってください', 'correct' => ['まっすぐ', '行って', '左へ', '曲がってください'], 'extra' => ['右へ']],
                            'ko' => ['sentence' => '직진 가고 왼쪽으로 도세요', 'correct' => ['직진', '가고', '왼쪽으로', '도세요'], 'extra' => ['오른쪽으로']],
                            'tr' => ['sentence' => 'düz gidin ve sola dönün', 'correct' => ['düz', 'gidin', 've', 'sola', 'dönün'], 'extra' => ['ev', 'park']],
                            'ru' => ['sentence' => 'иду прямо и поворот налево', 'correct' => ['иду', 'прямо', 'и', 'поворот', 'налево'], 'extra' => ['направо']],
                            'ar' => ['sentence' => 'أذهب مباشرة و منعطف يسارا', 'correct' => ['أذهب', 'مباشرة', 'و', 'منعطف', 'يسارا'], 'extra' => ['يمينا']],
                        ],
                    ],
                    'b' => [
                        'words' => ['evdə', 'çox', 'yaxın'], 'blank' => 2,
                        'means' => [
                            'en' => ['sentence' => 'The house is very near', 'correct' => ['the house', 'is', 'very', 'near'], 'extra' => ['far']],
                            'fr' => ['sentence' => 'La maison est très près', 'correct' => ['la maison', 'est', 'très', 'près'], 'extra' => ['loin']],
                            'es' => ['sentence' => 'La casa está muy cerca', 'correct' => ['la casa', 'está', 'muy', 'cerca'], 'extra' => ['lejos']],
                            'de' => ['sentence' => 'Das Haus ist sehr nah', 'correct' => ['das Haus', 'ist', 'sehr', 'nah'], 'extra' => ['weit']],
                            'ja' => ['sentence' => '家はとても近いです', 'correct' => ['家は', 'とても', '近いです'], 'extra' => ['遠い']],
                            'ko' => ['sentence' => '집은 아주 가까워요', 'correct' => ['집은', '아주', '가까워요'], 'extra' => ['먼']],
                            'tr' => ['sentence' => 'ev çok yakın', 'correct' => ['ev', 'çok', 'yakın'], 'extra' => ['gidin', 'dönün']],
                            'ru' => ['sentence' => 'доме очень близко', 'correct' => ['доме', 'очень', 'близко'], 'extra' => ['далеко']],
                            'ar' => ['sentence' => 'البيت جدا قريب', 'correct' => ['البيت', 'جدا', 'قريب'], 'extra' => ['بعيد']],
                        ],
                    ],
                    'c' => [
                        'words' => ['parkda', 'sağda'], 'blank' => 0,
                        'means' => [
                            'en' => ['sentence' => 'The park is on the right', 'correct' => ['the park', 'is', 'on the right'], 'extra' => ['on the left']],
                            'fr' => ['sentence' => 'Le parc est à droite', 'correct' => ['le parc', 'est', 'à droite'], 'extra' => ['à gauche']],
                            'es' => ['sentence' => 'El parque está a la derecha', 'correct' => ['el parque', 'está', 'a la derecha'], 'extra' => ['a la izquierda']],
                            'de' => ['sentence' => 'Der Park ist rechts', 'correct' => ['der Park', 'ist', 'rechts'], 'extra' => ['links']],
                            'ja' => ['sentence' => '公園は右にあります', 'correct' => ['公園は', '右に', 'あります'], 'extra' => ['左に']],
                            'ko' => ['sentence' => '공원은 오른쪽에 있어요', 'correct' => ['공원은', '오른쪽에', '있어요'], 'extra' => ['왼쪽에']],
                            'tr' => ['sentence' => 'park sağda', 'correct' => ['park', 'sağda'], 'extra' => ['gidin', 'dönün']],
                            'ru' => ['sentence' => 'парк справа', 'correct' => ['парк', 'справа'], 'extra' => ['слева']],
                            'ar' => ['sentence' => 'الحديقة على اليمين', 'correct' => ['الحديقة', 'على اليمين'], 'extra' => ['على اليسار']],
                        ],
                    ],
                ],
            ),

        ];
    }
}
