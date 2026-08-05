<?php

use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\Language;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * @return array<string, string>
     */
    private function paragraphs(): array
    {
        return [
            'en' => "Every morning, I wake up early and greet my family. We eat breakfast together and talk about our plans for the day. After breakfast, my sister and I walk to the restaurant near our house. The waiter greets us kindly and gives us the menu. I usually order a coffee and some bread with butter, while my sister prefers tea and fruit. We talk about our friends and our work while we wait for the food. The restaurant is quiet, and the food is always delicious. After we finish eating, we pay the bill and thank the waiter. Later in the afternoon, I go to the supermarket to buy groceries for dinner. I need vegetables, rice, chicken, and some fresh fruit. The cashier is friendly and asks if I found everything I needed. I pay with my card and put the groceries in my bag. On my way home, I meet my neighbor, and we talk for a few minutes about the weather. When I arrive home, I start cooking dinner for my family. We eat together, share stories about our day, and laugh a lot. Before going to bed, I read for a while and then sleep well, ready for a new day tomorrow.",
            'es' => "Cada mañana, me despierto temprano y saludo a mi familia. Desayunamos juntos y hablamos sobre nuestros planes para el día. Después del desayuno, mi hermana y yo caminamos hasta el restaurante cerca de nuestra casa. El camarero nos saluda amablemente y nos da el menú. Normalmente pido un café y un poco de pan con mantequilla, mientras que mi hermana prefiere té y fruta. Hablamos sobre nuestros amigos y nuestro trabajo mientras esperamos la comida. El restaurante es tranquilo, y la comida siempre es deliciosa. Después de terminar de comer, pagamos la cuenta y le agradecemos al camarero. Más tarde por la tarde, voy al supermercado a comprar comida para la cena. Necesito verduras, arroz, pollo y algo de fruta fresca. La cajera es amable y me pregunta si encontré todo lo que necesitaba. Pago con mi tarjeta y pongo las compras en mi bolsa. De camino a casa, me encuentro con mi vecino, y hablamos un poco sobre el clima. Cuando llego a casa, empiezo a cocinar la cena para mi familia. Comemos juntos, compartimos historias sobre nuestro día y nos reímos mucho. Antes de dormir, leo un rato y luego duermo bien, listo para un nuevo día mañana.",
            'de' => "Jeden Morgen wache ich früh auf und begrüße meine Familie. Wir frühstücken zusammen und sprechen über unsere Pläne für den Tag. Nach dem Frühstück gehen meine Schwester und ich zum Restaurant in der Nähe unseres Hauses. Der Kellner begrüßt uns freundlich und gibt uns die Speisekarte. Normalerweise bestelle ich einen Kaffee und etwas Brot mit Butter, während meine Schwester Tee und Obst bevorzugt. Wir sprechen über unsere Freunde und unsere Arbeit, während wir auf das Essen warten. Das Restaurant ist ruhig, und das Essen ist immer köstlich. Nachdem wir gegessen haben, bezahlen wir die Rechnung und danken dem Kellner. Später am Nachmittag gehe ich zum Supermarkt, um Lebensmittel für das Abendessen zu kaufen. Ich brauche Gemüse, Reis, Hähnchen und etwas frisches Obst. Die Kassiererin ist freundlich und fragt, ob ich alles gefunden habe, was ich brauchte. Ich bezahle mit meiner Karte und packe die Einkäufe in meine Tasche. Auf dem Weg nach Hause treffe ich meinen Nachbarn, und wir sprechen kurz über das Wetter. Wenn ich zu Hause ankomme, fange ich an, das Abendessen für meine Familie zu kochen. Wir essen zusammen, teilen Geschichten über unseren Tag und lachen viel. Bevor ich schlafen gehe, lese ich eine Weile und schlafe dann gut, bereit für einen neuen Tag morgen.",
            'fr' => "Chaque matin, je me réveille tôt et je salue ma famille. Nous prenons le petit-déjeuner ensemble et parlons de nos projets pour la journée. Après le petit-déjeuner, ma sœur et moi marchons jusqu'au restaurant près de notre maison. Le serveur nous accueille gentiment et nous donne le menu. D'habitude, je commande un café et du pain avec du beurre, tandis que ma sœur préfère du thé et des fruits. Nous parlons de nos amis et de notre travail en attendant le repas. Le restaurant est calme, et la nourriture est toujours délicieuse. Après avoir fini de manger, nous payons l'addition et remercions le serveur. Plus tard dans l'après-midi, je vais au supermarché pour acheter des provisions pour le dîner. J'ai besoin de légumes, de riz, de poulet et de fruits frais. La caissière est gentille et me demande si j'ai trouvé tout ce dont j'avais besoin. Je paie avec ma carte et je mets les courses dans mon sac. En rentrant chez moi, je rencontre mon voisin, et nous parlons un peu du temps qu'il fait. Quand j'arrive à la maison, je commence à préparer le dîner pour ma famille. Nous mangeons ensemble, partageons des histoires sur notre journée et rions beaucoup. Avant de me coucher, je lis pendant un moment, puis je dors bien, prêt pour un nouveau jour demain.",
            'ja' => "毎朝、私は早く起きて家族に挨拶します。私たちは一緒に朝食を食べて、その日の予定について話します。朝食の後、妹と私は家の近くのレストランまで歩きます。ウェイターは親切に私たちを迎えて、メニューを渡してくれます。私はいつもコーヒーとバター付きのパンを注文しますが、妹は紅茶と果物が好きです。食事を待っている間、友達や仕事について話します。レストランは静かで、食べ物はいつも美味しいです。食べ終わった後、私たちは会計をしてウェイターにお礼を言います。午後になると、私は夕食の食材を買うためにスーパーマーケットに行きます。野菜、米、鶏肉、新鮮な果物が必要です。レジ係は親切で、必要な物がすべて見つかったか尋ねます。私はカードで支払いをして、買い物袋に品物を入れます。家に帰る途中、隣人に会い、天気について少し話します。家に着くと、家族のために夕食を作り始めます。私たちは一緒に食べて、その日の出来事を話し、たくさん笑います。寝る前に、しばらく本を読んでからよく眠り、明日の新しい一日に備えます。",
            'ko' => "매일 아침, 저는 일찍 일어나서 가족에게 인사합니다. 우리는 함께 아침을 먹고 그날의 계획에 대해 이야기합니다. 아침 식사 후, 여동생과 저는 집 근처에 있는 식당까지 걸어갑니다. 웨이터는 친절하게 우리를 맞이하고 메뉴를 줍니다. 저는 보통 커피와 버터를 바른 빵을 주문하고, 여동생은 차와 과일을 더 좋아합니다. 우리는 음식을 기다리는 동안 친구들과 일에 대해 이야기합니다. 식당은 조용하고, 음식은 항상 맛있습니다. 식사를 마친 후, 우리는 계산을 하고 웨이터에게 감사 인사를 합니다. 오후가 되면, 저는 저녁 식사 재료를 사기 위해 슈퍼마켓에 갑니다. 채소, 쌀, 닭고기, 그리고 신선한 과일이 필요합니다. 계산원은 친절하게 필요한 것을 모두 찾았는지 물어봅니다. 저는 카드로 계산을 하고 물건을 가방에 담습니다. 집으로 돌아오는 길에 이웃을 만나서 날씨에 대해 잠깐 이야기합니다. 집에 도착하면, 가족을 위해 저녁을 요리하기 시작합니다. 우리는 함께 먹고 그날 있었던 일들을 이야기하며 많이 웃습니다. 자기 전에 잠시 책을 읽고 나서 잘 자고, 내일의 새로운 하루를 준비합니다.",
        ];
    }

    public function up(): void
    {
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement(
                "ALTER TABLE exercises MODIFY COLUMN type ENUM("
                ."'match_pairs', 'fill_blank', 'tap_word', 'listen_select', 'multiple_choice', 'paragraph_translation'"
                .") NOT NULL"
            );
        }

        $sourceText = $this->paragraphs();

        foreach ($sourceText as $code => $referenceTranslation) {
            $language = Language::where('code', $code)->first();

            if (! $language) {
                continue;
            }

            $chapter = Chapter::where('language_id', $language->id)->where('chapter_key', 'final_test')->first();

            if (! $chapter) {
                continue;
            }

            $unit = Unit::firstOrCreate(
                ['chapter_id' => $chapter->id, 'order_number' => 1],
                ['title' => 'Final Test'],
            );

            $lesson = Lesson::firstOrCreate(
                ['unit_id' => $unit->id, 'order_number' => 1],
                ['title' => 'Final Test: Paragraph Translation'],
            );

            // Replace whatever exercises this lesson had (e.g. English's original
            // 30 multi-type exercises) with the single paragraph-translation
            // exercise — the lesson/unit rows themselves are kept so any
            // historical completion records stay intact.
            Exercise::where('lesson_id', $lesson->id)->delete();

            Exercise::create([
                'lesson_id' => $lesson->id,
                'type' => 'paragraph_translation',
                'data' => [
                    'source_text' => $sourceText,
                    'reference_translation' => $referenceTranslation,
                ],
                'order_number' => 1,
            ]);
        }
    }

    public function down(): void
    {
        foreach ($this->paragraphs() as $code => $referenceTranslation) {
            $language = Language::where('code', $code)->first();

            if (! $language) {
                continue;
            }

            $chapter = Chapter::where('language_id', $language->id)->where('chapter_key', 'final_test')->first();

            if (! $chapter) {
                continue;
            }

            $unit = Unit::where('chapter_id', $chapter->id)->where('order_number', 1)->first();

            if (! $unit) {
                continue;
            }

            $lesson = Lesson::where('unit_id', $unit->id)->where('order_number', 1)->first();

            if ($lesson) {
                Exercise::where('lesson_id', $lesson->id)->where('type', 'paragraph_translation')->delete();
            }
        }

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement(
                "ALTER TABLE exercises MODIFY COLUMN type ENUM("
                ."'match_pairs', 'fill_blank', 'tap_word', 'listen_select', 'multiple_choice'"
                .") NOT NULL"
            );
        }
    }
};
