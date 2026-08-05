<?php

namespace Database\Seeders;

use App\Enums\ChapterKey;
use App\Enums\ExerciseType;
use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Database\Seeder;

/**
 * Builds the Chapter 5 final test for every course: one unit, one lesson, ONE
 * paragraph_translation exercise (a single session). The final test is a
 * single capstone test, not a multi-session lesson like the content chapters.
 *
 * The paragraph is one ~150-word day that touches every theme the four content
 * chapters cover (family and greetings, a cafe and a meal, shopping, a goodbye)
 * so a learner who finished the course can read it in their own language and
 * translate it into the language they are learning.
 *
 * source_text carries the paragraph in all six languages (the learner reads
 * whichever is native); reference_translation is the course language.
 */
class FinalTestSeeder extends Seeder
{
    private const LANGS = ['en', 'es', 'de', 'fr', 'ja', 'ko'];

    public function run(): void
    {
        foreach (self::LANGS as $code) {
            $language = Language::where('code', $code)->first();
            if (! $language) {
                $this->command?->warn("no '$code' language row, skipping");

                continue;
            }

            $chapter = Chapter::where('language_id', $language->id)
                ->where('chapter_key', ChapterKey::FinalTest)
                ->first();
            if (! $chapter) {
                $this->command?->warn("no final test chapter for '$code', skipping");

                continue;
            }

            $unit = Unit::updateOrCreate(
                ['chapter_id' => $chapter->id, 'order_number' => 1],
                ['title' => 'Final Test'],
            );

            $lesson = Lesson::updateOrCreate(
                ['unit_id' => $unit->id, 'order_number' => 1],
                ['title' => 'Final Test: Paragraph Translation'],
            );

            Exercise::updateOrCreate(
                ['lesson_id' => $lesson->id, 'order_number' => 1],
                [
                    'type' => ExerciseType::ParagraphTranslation,
                    'session_number' => 1,
                    'data' => [
                        'source_text' => self::PARAGRAPH,
                        'reference_translation' => self::PARAGRAPH[$code],
                        'accepted_translations' => [],
                    ],
                ],
            );

            // A single-session test: remove any extra sessions a previous seed
            // (the old five-session version) may have left behind.
            Exercise::where('lesson_id', $lesson->id)->where('order_number', '>', 1)->delete();
        }
    }

    /**
     * The one capstone paragraph, authored in all six languages.
     *
     * @var array<string, string>
     */
    private const PARAGRAPH = [
        'en' => 'Good morning! My name is Sara, and I am very happy today. I live in a small house with my family. Every morning, my mother and my father drink coffee in the kitchen, and my brother and my sister eat bread with butter. In the afternoon, I walk to a small cafe with my friend. I order a tea, and my friend orders a coffee and a cake. The cafe is quiet, and the food is delicious. Later, I go to the supermarket to buy some fruit for dinner. I need apples, tomatoes, and a kilo of rice. The cashier is friendly, and I pay with my card. In the evening, my family eats dinner together, and we talk about our day. Before I sleep, I read a book. It is a very good day. Thank you and goodbye!',
        'es' => '¡Buenos días! Me llamo Sara y hoy estoy muy feliz. Vivo en una casa pequeña con mi familia. Cada mañana, mi madre y mi padre beben café en la cocina, y mi hermano y mi hermana comen pan con mantequilla. Por la tarde, camino a un pequeño café con mi amiga. Pido un té, y mi amiga pide un café y un pastel. El café es tranquilo y la comida es deliciosa. Más tarde, voy al supermercado a comprar fruta para la cena. Necesito manzanas, tomates y un kilo de arroz. La cajera es amable y pago con mi tarjeta. Por la noche, mi familia cena junta y hablamos de nuestro día. Antes de dormir, leo un libro. Es un día muy bueno. ¡Gracias y adiós!',
        'de' => 'Guten Morgen! Ich heiße Sara und heute bin ich sehr glücklich. Ich wohne in einem kleinen Haus mit meiner Familie. Jeden Morgen trinken meine Mutter und mein Vater Kaffee in der Küche, und mein Bruder und meine Schwester essen Brot mit Butter. Am Nachmittag gehe ich mit meiner Freundin in ein kleines Café. Ich bestelle einen Tee, und meine Freundin bestellt einen Kaffee und einen Kuchen. Das Café ist ruhig und das Essen ist köstlich. Später gehe ich zum Supermarkt, um Obst für das Abendessen zu kaufen. Ich brauche Äpfel, Tomaten und ein Kilo Reis. Die Kassiererin ist freundlich und ich bezahle mit meiner Karte. Am Abend isst meine Familie zusammen zu Abend und wir sprechen über unseren Tag. Bevor ich schlafe, lese ich ein Buch. Es ist ein sehr guter Tag. Danke und auf Wiedersehen!',
        'fr' => "Bonjour ! Je m'appelle Sara, et je suis très heureuse aujourd'hui. J'habite dans une petite maison avec ma famille. Chaque matin, ma mère et mon père boivent un café dans la cuisine, et mon frère et ma sœur mangent du pain avec du beurre. L'après-midi, je marche jusqu'à un petit café avec mon amie. Je commande un thé, et mon amie commande un café et un gâteau. Le café est calme, et la nourriture est délicieuse. Plus tard, je vais au supermarché pour acheter des fruits pour le dîner. J'ai besoin de pommes, de tomates et d'un kilo de riz. La caissière est gentille, et je paie avec ma carte. Le soir, ma famille dîne ensemble, et nous parlons de notre journée. Avant de dormir, je lis un livre. C'est une très bonne journée. Merci et au revoir !",
        'ja' => 'おはようございます！私の名前はサラで、今日はとても幸せです。私は家族と小さな家に住んでいます。毎朝、母と父は台所でコーヒーを飲んで、兄と姉はバターを塗ったパンを食べます。午後、私は友達と小さなカフェまで歩きます。私はお茶を注文して、友達はコーヒーとケーキを注文します。カフェは静かで、食べ物は美味しいです。後で、私は夕食のために果物を買いにスーパーへ行きます。りんごとトマトとご飯一キロが必要です。レジ係は親切で、私はカードで払います。夜に、家族は一緒に夕食を食べて、その日について話します。寝る前に、私は本を読みます。とてもいい日です。ありがとう、さようなら！',
        'ko' => '좋은 아침이에요! 제 이름은 사라이고, 오늘 저는 매우 행복합니다. 저는 가족과 함께 작은 집에 삽니다. 매일 아침, 어머니와 아버지는 부엌에서 커피를 마시고, 형제와 자매는 버터를 바른 빵을 먹습니다. 오후에 저는 친구와 함께 작은 카페까지 걸어갑니다. 저는 차를 주문하고, 친구는 커피와 케이크를 주문합니다. 카페는 조용하고 음식은 맛있습니다. 나중에 저는 저녁을 위해 과일을 사러 슈퍼마켓에 갑니다. 사과와 토마토와 밥 일 킬로가 필요합니다. 계산원은 친절하고 저는 카드로 계산합니다. 저녁에 가족은 함께 저녁을 먹고 우리의 하루에 대해 이야기합니다. 자기 전에 저는 책을 읽습니다. 아주 좋은 날입니다. 감사합니다, 안녕히 계세요!',
    ];
}
