<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Models\Chapter;
use App\Models\Language;
use Database\Seeders\Support\FrenchLessonBuilder;
use Illuminate\Database\Seeder;

class FrUnitConversation09Seeder extends Seeder
{
    private const PICTURES = [
        'Livre' => 'book', 'École' => 'school', 'Café' => 'coffee',
        'Maison' => 'house', 'Ami' => 'friend', 'Professeur' => 'teacher',
    ];

    /**
     * French Chapter 2, Unit 9 — expressing opinions.
     *
     * "je pense que" and "je crois que" are the point of the unit: French needs
     * the "que" that English can drop ("I think it is true" vs "je pense que
     * c'est vrai"). Teaching "que" alongside them, rather than on its own,
     * makes that visible.
     */
    public function run(): void
    {
        $language = Language::where('code', 'fr')->firstOrFail();

        $chapter = Chapter::where('language_id', $language->id)
            ->where('chapter_key', ChapterKey::Conversation)
            ->firstOrFail();

        $builder = new FrenchLessonBuilder(self::PICTURES);

        $builder->seedUnit($chapter->id, 9, 'Unit 9: Expressing Opinions', $this->lessonsData($builder));
    }

    private function lessonsData(FrenchLessonBuilder $builder): array
    {
        return [
            $builder->lesson('Lesson 1: I Think', 1,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'École', 'img' => 'school']],
                plain: [['fr' => 'Je pense'], ['fr' => 'Intéressant']],
                phrases: [
                    'a' => [
                        'words' => ['je pense', 'que', 'oui'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I think that yes', 'correct' => ['I think', 'that', 'yes'], 'extra' => ['interesting']],
                            'az' => ['sentence' => 'düşünürəm o bəli', 'correct' => ['düşünürəm', 'o', 'bəli'], 'extra' => ['maraqlı']],
                            'ar' => ['sentence' => 'أفكر ذلك نعم', 'correct' => ['أفكر', 'ذلك', 'نعم'], 'extra' => ['مثير للاهتمام']],
                            'ru' => ['sentence' => 'я думаю тот да', 'correct' => ['я', 'думаю', 'тот', 'да'], 'extra' => ['интересно']],
                            'es' => ['sentence' => 'Pienso que sí', 'correct' => ['pienso', 'que', 'sí'], 'extra' => ['interesante']],
                            'de' => ['sentence' => 'Ich denke dass ja', 'correct' => ['ich denke', 'dass', 'ja'], 'extra' => ['interessant']],
                            'ja' => ['sentence' => '私ははいと思う', 'correct' => ['私', 'は', 'はい', 'と', '思う'], 'extra' => ['面白い']],
                            'ko' => ['sentence' => '나는 네라고 생각한다', 'correct' => ['나는', '네라고', '생각한다'], 'extra' => ['흥미로운']],
                            'tr' => ['sentence' => 'bence evet', 'correct' => ['bence', 'evet'], 'extra' => ['ilginç']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'livre', 'intéressant'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'An interesting book', 'correct' => ['an', 'interesting', 'book'], 'extra' => ['school']],
                            'az' => ['sentence' => 'bir maraqlı kitab', 'correct' => ['bir', 'maraqlı', 'kitab'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'مثير للاهتمام كتاب', 'correct' => ['مثير للاهتمام', 'كتاب'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'интересно книга', 'correct' => ['интересно', 'книга'], 'extra' => ['школа']],
                            'es' => ['sentence' => 'Un libro interesante', 'correct' => ['un', 'libro', 'interesante'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Ein interessantes Buch', 'correct' => ['ein', 'interessant', 'Buch'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '面白い本', 'correct' => ['面', '白い', '本'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '흥미로운 책', 'correct' => ['흥미로운', '책'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'ilginç bir kitap', 'correct' => ['ilginç', 'bir', 'kitap'], 'extra' => ['okul']],
                        ],
                    ],
                    'c' => [
                        'words' => ['une', 'école', 'et', 'un', 'livre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A school and a book', 'correct' => ['a', 'school', 'and', 'a', 'book'], 'extra' => ['interesting']],
                            'az' => ['sentence' => 'bir məktəb və bir kitab', 'correct' => ['bir', 'məktəb', 'və', 'bir', 'kitab'], 'extra' => ['maraqlı']],
                            'ar' => ['sentence' => 'مدرسة و كتاب', 'correct' => ['مدرسة', 'و', 'كتاب'], 'extra' => ['مثير للاهتمام']],
                            'ru' => ['sentence' => 'школа и книга', 'correct' => ['школа', 'и', 'книга'], 'extra' => ['интересно']],
                            'es' => ['sentence' => 'Una escuela y un libro', 'correct' => ['una', 'escuela', 'y', 'un', 'libro'], 'extra' => ['interesante']],
                            'de' => ['sentence' => 'Eine Schule und ein Buch', 'correct' => ['eine', 'Schule', 'und', 'ein', 'Buch'], 'extra' => ['interessant']],
                            'ja' => ['sentence' => '学校と本', 'correct' => ['学校', 'と', '本'], 'extra' => ['面白い']],
                            'ko' => ['sentence' => '학교와 책', 'correct' => ['학교와', '책'], 'extra' => ['흥미로운']],
                            'tr' => ['sentence' => 'bir okul ve bir kitap', 'correct' => ['bir', 'okul', 've', 'bir', 'kitap'], 'extra' => ['ilginç']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 2: I Believe', 2,
                pictures: [['fr' => 'Café', 'img' => 'coffee'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Je crois'], ['fr' => 'Important']],
                phrases: [
                    'a' => [
                        'words' => ['je crois', 'que', 'oui'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'I believe that yes', 'correct' => ['I believe', 'that', 'yes'], 'extra' => ['important']],
                            'az' => ['sentence' => 'inanıram o bəli', 'correct' => ['inanıram', 'o', 'bəli'], 'extra' => ['vacib']],
                            'ar' => ['sentence' => 'أعتقد ذلك نعم', 'correct' => ['أعتقد', 'ذلك', 'نعم'], 'extra' => ['مهم']],
                            'ru' => ['sentence' => 'я думаю тот да', 'correct' => ['я думаю', 'тот', 'да'], 'extra' => ['важно']],
                            'es' => ['sentence' => 'Creo que sí', 'correct' => ['creo', 'que', 'sí'], 'extra' => ['importante']],
                            'de' => ['sentence' => 'Ich glaube dass ja', 'correct' => ['ich glaube', 'dass', 'ja'], 'extra' => ['wichtig']],
                            'ja' => ['sentence' => '私ははいと信じる', 'correct' => ['私', 'は', 'はい', 'と', '信じる'], 'extra' => ['重要な']],
                            'ko' => ['sentence' => '나는 네라고 믿는다', 'correct' => ['나는', '네라고', '믿는다'], 'extra' => ['중요한']],
                            'tr' => ['sentence' => 'bence evet', 'correct' => ['bence', 'evet'], 'extra' => ['önemli']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'est", 'important'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'This is important', 'correct' => ['this is', 'important'], 'extra' => ['I believe', 'coffee']],
                            'az' => ['sentence' => 'bu vacib', 'correct' => ['bu', 'vacib'], 'extra' => ['inanıram', 'qəhvə']],
                            'ar' => ['sentence' => 'هذا مهم', 'correct' => ['هذا', 'مهم'], 'extra' => ['أعتقد', 'قهوة']],
                            'ru' => ['sentence' => 'это важно', 'correct' => ['это', 'важно'], 'extra' => ['я думаю', 'кофе']],
                            'es' => ['sentence' => 'Este es importante', 'correct' => ['este es', 'importante'], 'extra' => ['creo', 'café']],
                            'de' => ['sentence' => 'Das ist wichtig', 'correct' => ['das ist', 'wichtig'], 'extra' => ['ich glaube', 'Kaffee']],
                            'ja' => ['sentence' => 'これは重要です', 'correct' => ['これは', '重要', 'です'], 'extra' => ['私は信じる', 'コーヒー']],
                            'ko' => ['sentence' => '이것은 중요합니다', 'correct' => ['이것은', '중요합니다'], 'extra' => ['나는 믿는다', '커피']],
                            'tr' => ['sentence' => 'bu önemli', 'correct' => ['bu', 'önemli'], 'extra' => ['bence', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['un', 'café', 'et', 'une', 'maison'], 'blank' => 4,
                        'tr' => [
                            'en' => ['sentence' => 'A coffee and a house', 'correct' => ['a', 'coffee', 'and', 'a', 'house'], 'extra' => ['important']],
                            'az' => ['sentence' => 'bir qəhvə və bir ev', 'correct' => ['bir', 'qəhvə', 'və', 'bir', 'ev'], 'extra' => ['vacib']],
                            'ar' => ['sentence' => 'قهوة و بيت', 'correct' => ['قهوة', 'و', 'بيت'], 'extra' => ['مهم']],
                            'ru' => ['sentence' => 'кофе и дом', 'correct' => ['кофе', 'и', 'дом'], 'extra' => ['важно']],
                            'es' => ['sentence' => 'Un café y una casa', 'correct' => ['un', 'café', 'y', 'una', 'casa'], 'extra' => ['importante']],
                            'de' => ['sentence' => 'Ein Kaffee und ein Haus', 'correct' => ['ein', 'Kaffee', 'und', 'ein', 'Haus'], 'extra' => ['wichtig']],
                            'ja' => ['sentence' => 'コーヒーと家', 'correct' => ['コーヒー', 'と', '家'], 'extra' => ['重要な']],
                            'ko' => ['sentence' => '커피와 집', 'correct' => ['커피와', '집'], 'extra' => ['중요한']],
                            'tr' => ['sentence' => 'bir kahve ve bir ev', 'correct' => ['bir', 'kahve', 've', 'bir', 'ev'], 'extra' => ['önemli']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 3: True & False', 3,
                pictures: [['fr' => 'Ami', 'img' => 'friend'], ['fr' => 'Professeur', 'img' => 'teacher']],
                plain: [['fr' => 'Vrai'], ['fr' => 'Faux']],
                phrases: [
                    'a' => [
                        'words' => ["c'est", 'vrai'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'This is true', 'correct' => ['this is', 'true'], 'extra' => ['false', 'friend']],
                            'az' => ['sentence' => 'bu düzgün', 'correct' => ['bu', 'düzgün'], 'extra' => ['səhv', 'dost']],
                            'ar' => ['sentence' => 'هذا صحيح', 'correct' => ['هذا', 'صحيح'], 'extra' => ['خطأ', 'صديق']],
                            'ru' => ['sentence' => 'это правильно', 'correct' => ['это', 'правильно'], 'extra' => ['неверно', 'друг']],
                            'es' => ['sentence' => 'Este es verdadero', 'correct' => ['este es', 'verdadero'], 'extra' => ['falso', 'amigo']],
                            'de' => ['sentence' => 'Das ist wahr', 'correct' => ['das ist', 'wahr'], 'extra' => ['falsch', 'Freund']],
                            'ja' => ['sentence' => 'これは本当です', 'correct' => ['これは', '本当', 'です'], 'extra' => ['偽の', '友達']],
                            'ko' => ['sentence' => '이것은 진실입니다', 'correct' => ['이것은', '진실입니다'], 'extra' => ['거짓의', '친구']],
                            'tr' => ['sentence' => 'bu doğru', 'correct' => ['bu', 'doğru'], 'extra' => ['yanlış', 'arkadaş']],
                        ],
                    ],
                    'b' => [
                        'words' => ["c'est", 'faux'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'This is false', 'correct' => ['this is', 'false'], 'extra' => ['true', 'teacher']],
                            'az' => ['sentence' => 'bu səhv', 'correct' => ['bu', 'səhv'], 'extra' => ['düzgün', 'müəllim']],
                            'ar' => ['sentence' => 'هذا خطأ', 'correct' => ['هذا', 'خطأ'], 'extra' => ['صحيح', 'معلم']],
                            'ru' => ['sentence' => 'это неверно', 'correct' => ['это', 'неверно'], 'extra' => ['правильно', 'учитель']],
                            'es' => ['sentence' => 'Este es falso', 'correct' => ['este es', 'falso'], 'extra' => ['verdadero', 'profesor']],
                            'de' => ['sentence' => 'Das ist falsch', 'correct' => ['das ist', 'falsch'], 'extra' => ['wahr', 'Lehrer']],
                            'ja' => ['sentence' => 'これは偽です', 'correct' => ['これは', '偽', 'です'], 'extra' => ['本当の', '先生']],
                            'ko' => ['sentence' => '이것은 거짓입니다', 'correct' => ['이것은', '거짓입니다'], 'extra' => ['진실한', '선생님']],
                            'tr' => ['sentence' => 'bu yanlış', 'correct' => ['bu', 'yanlış'], 'extra' => ['doğru', 'öğretmen']],
                        ],
                    ],
                    'c' => [
                        'words' => ['mon', 'ami', 'et', 'le', 'professeur'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My friend and the teacher', 'correct' => ['my', 'friend', 'and', 'the', 'teacher'], 'extra' => ['true']],
                            'az' => ['sentence' => 'mənim dost və müəllim', 'correct' => ['mənim', 'dost', 'və', 'müəllim'], 'extra' => ['düzgün']],
                            'ar' => ['sentence' => 'صديق و معلم', 'correct' => ['صديق', 'و', 'معلم'], 'extra' => ['صحيح']],
                            'ru' => ['sentence' => 'мой друг и учитель', 'correct' => ['мой', 'друг', 'и', 'учитель'], 'extra' => ['правильно']],
                            'es' => ['sentence' => 'Mi amigo y el profesor', 'correct' => ['mi', 'amigo', 'y', 'el', 'profesor'], 'extra' => ['verdadero']],
                            'de' => ['sentence' => 'Mein Freund und der Lehrer', 'correct' => ['mein', 'Freund', 'und', 'der', 'Lehrer'], 'extra' => ['wahr']],
                            'ja' => ['sentence' => '私の友達と先生', 'correct' => ['私の', '友達', 'と', '先生'], 'extra' => ['本当の']],
                            'ko' => ['sentence' => '나의 친구와 선생님', 'correct' => ['나의', '친구와', '선생님'], 'extra' => ['진실한']],
                            'tr' => ['sentence' => 'arkadaşım ve öğretmen', 'correct' => ['arkadaşım', 've', 'öğretmen'], 'extra' => ['doğru']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 4: Prefer & Better', 4,
                pictures: [['fr' => 'Livre', 'img' => 'book'], ['fr' => 'Café', 'img' => 'coffee']],
                plain: [['fr' => 'Préférer'], ['fr' => 'Meilleur']],
                phrases: [
                    'a' => [
                        'words' => ['préférer', 'le', 'café'], 'blank' => 0,
                        'tr' => [
                            'en' => ['sentence' => 'To prefer the coffee', 'correct' => ['to prefer', 'the', 'coffee'], 'extra' => ['better', 'book']],
                            'az' => ['sentence' => 'üstünlük verirəm qəhvə', 'correct' => ['üstünlük verirəm', 'qəhvə'], 'extra' => ['daha yaxşı', 'kitab']],
                            'ar' => ['sentence' => 'إلى أفضل قهوة', 'correct' => ['إلى', 'أفضل', 'قهوة'], 'extra' => ['أحسن', 'كتاب']],
                            'ru' => ['sentence' => 'в предпочитаю кофе', 'correct' => ['в', 'предпочитаю', 'кофе'], 'extra' => ['лучше', 'книга']],
                            'es' => ['sentence' => 'Preferir el café', 'correct' => ['preferir', 'el', 'café'], 'extra' => ['mejor', 'libro']],
                            'de' => ['sentence' => 'Den Kaffee bevorzugen', 'correct' => ['den', 'Kaffee', 'bevorzugen'], 'extra' => ['besser', 'Buch']],
                            'ja' => ['sentence' => 'コーヒーを好む', 'correct' => ['コーヒー', 'を', '好む'], 'extra' => ['より良い', '本']],
                            'ko' => ['sentence' => '커피를 선호하다', 'correct' => ['커피를', '선호하다'], 'extra' => ['더 좋은', '책']],
                            'tr' => ['sentence' => 'kahveyi tercih etmek', 'correct' => ['kahveyi', 'tercih', 'etmek'], 'extra' => ['daha iyi', 'kitap']],
                        ],
                    ],
                    'b' => [
                        'words' => ['un', 'meilleur', 'livre'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A better book', 'correct' => ['a', 'better', 'book'], 'extra' => ['to prefer', 'coffee']],
                            'az' => ['sentence' => 'bir daha yaxşı kitab', 'correct' => ['bir', 'daha yaxşı', 'kitab'], 'extra' => ['üstünlük verirəm', 'qəhvə']],
                            'ar' => ['sentence' => 'أحسن كتاب', 'correct' => ['أحسن', 'كتاب'], 'extra' => ['إلى', 'أفضل', 'قهوة']],
                            'ru' => ['sentence' => 'лучше книга', 'correct' => ['лучше', 'книга'], 'extra' => ['в', 'предпочитаю', 'кофе']],
                            'es' => ['sentence' => 'Un mejor libro', 'correct' => ['un', 'mejor', 'libro'], 'extra' => ['preferir', 'café']],
                            'de' => ['sentence' => 'Ein besseres Buch', 'correct' => ['ein', 'besser', 'Buch'], 'extra' => ['bevorzugen', 'Kaffee']],
                            'ja' => ['sentence' => 'より良い本', 'correct' => ['より', '良い', '本'], 'extra' => ['好む', 'コーヒー']],
                            'ko' => ['sentence' => '더 좋은 책', 'correct' => ['더', '좋은', '책'], 'extra' => ['선호하다', '커피']],
                            'tr' => ['sentence' => 'daha iyi bir kitap', 'correct' => ['daha', 'iyi', 'bir', 'kitap'], 'extra' => ['tercih etmek', 'kahve']],
                        ],
                    ],
                    'c' => [
                        'words' => ['préférer', 'un', 'meilleur', 'livre'], 'blank' => 2,
                        'tr' => [
                            'en' => ['sentence' => 'To prefer a better book', 'correct' => ['to prefer', 'a', 'better', 'book'], 'extra' => ['coffee']],
                            'az' => ['sentence' => 'üstünlük verirəm bir daha yaxşı kitab', 'correct' => ['üstünlük verirəm', 'bir', 'daha yaxşı', 'kitab'], 'extra' => ['qəhvə']],
                            'ar' => ['sentence' => 'إلى أفضل أحسن كتاب', 'correct' => ['إلى', 'أفضل', 'أحسن', 'كتاب'], 'extra' => ['قهوة']],
                            'ru' => ['sentence' => 'в предпочитаю лучше книга', 'correct' => ['в', 'предпочитаю', 'лучше', 'книга'], 'extra' => ['кофе']],
                            'es' => ['sentence' => 'Preferir un mejor libro', 'correct' => ['preferir', 'un', 'mejor', 'libro'], 'extra' => ['café']],
                            'de' => ['sentence' => 'Ein besseres Buch bevorzugen', 'correct' => ['bevorzugen', 'ein', 'besser', 'Buch'], 'extra' => ['Kaffee']],
                            'ja' => ['sentence' => 'より良い本を好む', 'correct' => ['より', '良い', '本', 'を', '好む'], 'extra' => ['コーヒー']],
                            'ko' => ['sentence' => '더 좋은 책을 선호하다', 'correct' => ['더', '좋은', '책을', '선호하다'], 'extra' => ['커피']],
                            'tr' => ['sentence' => 'daha iyi bir kitap tercih etmek', 'correct' => ['daha', 'iyi', 'bir', 'kitap', 'tercih', 'etmek'], 'extra' => ['kahve']],
                        ],
                    ],
                ],
            ),
            $builder->lesson('Lesson 5: I Think It Is True', 5,
                pictures: [['fr' => 'École', 'img' => 'school'], ['fr' => 'Maison', 'img' => 'house']],
                plain: [['fr' => 'Je pense'], ['fr' => 'Vrai']],
                phrases: [
                    'a' => [
                        'words' => ['je pense', 'que', "c'est", 'vrai'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'I think that this is true', 'correct' => ['I think', 'that', 'this is', 'true'], 'extra' => ['false']],
                            'az' => ['sentence' => 'düşünürəm o bu düzgün', 'correct' => ['düşünürəm', 'o', 'bu', 'düzgün'], 'extra' => ['səhv']],
                            'ar' => ['sentence' => 'أفكر ذلك هذا صحيح', 'correct' => ['أفكر', 'ذلك', 'هذا', 'صحيح'], 'extra' => ['خطأ']],
                            'ru' => ['sentence' => 'я думаю тот это правильно', 'correct' => ['я', 'думаю', 'тот', 'это', 'правильно'], 'extra' => ['неверно']],
                            'es' => ['sentence' => 'Pienso que este es verdadero', 'correct' => ['pienso', 'que', 'este es', 'verdadero'], 'extra' => ['falso']],
                            'de' => ['sentence' => 'Ich denke dass das wahr ist', 'correct' => ['ich denke', 'dass', 'das wahr', 'ist'], 'extra' => ['falsch']],
                            'ja' => ['sentence' => '私はこれは本当だと思う', 'correct' => ['私', 'は', 'これは', '本当', 'だ', 'と', '思う'], 'extra' => ['偽の']],
                            'ko' => ['sentence' => '나는 이것이 진실이라고 생각한다', 'correct' => ['나는', '이것이', '진실이라고', '생각한다'], 'extra' => ['거짓의']],
                            'tr' => ['sentence' => 'bence bu doğru', 'correct' => ['bence', 'bu', 'doğru'], 'extra' => ['yanlış']],
                        ],
                    ],
                    'b' => [
                        'words' => ['une', 'école', 'ici'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'A school here', 'correct' => ['a', 'school', 'here'], 'extra' => ['house', 'true']],
                            'az' => ['sentence' => 'bir məktəb burada', 'correct' => ['bir', 'məktəb', 'burada'], 'extra' => ['ev', 'düzgün']],
                            'ar' => ['sentence' => 'مدرسة هنا', 'correct' => ['مدرسة', 'هنا'], 'extra' => ['بيت', 'صحيح']],
                            'ru' => ['sentence' => 'школа здесь', 'correct' => ['школа', 'здесь'], 'extra' => ['дом', 'правильно']],
                            'es' => ['sentence' => 'Una escuela aquí', 'correct' => ['una', 'escuela', 'aquí'], 'extra' => ['casa', 'verdadero']],
                            'de' => ['sentence' => 'Eine Schule hier', 'correct' => ['eine', 'Schule', 'hier'], 'extra' => ['Haus', 'wahr']],
                            'ja' => ['sentence' => 'ここの学校', 'correct' => ['ここ', 'の', '学校'], 'extra' => ['家', '本当の']],
                            'ko' => ['sentence' => '여기 학교', 'correct' => ['여기', '학교'], 'extra' => ['집', '진실한']],
                            'tr' => ['sentence' => 'burada bir okul', 'correct' => ['burada', 'bir', 'okul'], 'extra' => ['ev', 'doğru']],
                        ],
                    ],
                    'c' => [
                        'words' => ['ma', 'maison', 'est', 'bien'], 'blank' => 1,
                        'tr' => [
                            'en' => ['sentence' => 'My house is good', 'correct' => ['my', 'house', 'is', 'well'], 'extra' => ['school']],
                            'az' => ['sentence' => 'mənim ev yaxşıyam', 'correct' => ['mənim', 'ev', 'yaxşıyam'], 'extra' => ['məktəb']],
                            'ar' => ['sentence' => 'بيت بخير', 'correct' => ['بيت', 'بخير'], 'extra' => ['مدرسة']],
                            'ru' => ['sentence' => 'мой дом хорошо', 'correct' => ['мой', 'дом', 'хорошо'], 'extra' => ['школа']],
                            'es' => ['sentence' => 'Mi casa es bien', 'correct' => ['mi', 'casa', 'es', 'bien'], 'extra' => ['escuela']],
                            'de' => ['sentence' => 'Mein Haus ist gut', 'correct' => ['mein', 'Haus', 'ist', 'gut'], 'extra' => ['Schule']],
                            'ja' => ['sentence' => '私の家はよいです', 'correct' => ['私の', '家', 'は', 'よい', 'です'], 'extra' => ['学校']],
                            'ko' => ['sentence' => '나의 집은 좋습니다', 'correct' => ['나의', '집은', '좋습니다'], 'extra' => ['학교']],
                            'tr' => ['sentence' => 'evim iyi', 'correct' => ['evim', 'iyi'], 'extra' => ['okul']],
                        ],
                    ],
                ],
            ),
        ];
    }
}
