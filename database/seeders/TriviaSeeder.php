<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\TriviaQuestion;
use App\Models\TriviaTopic;
use Illuminate\Database\Seeder;

/**
 * Trivia is scoped per learning language. Science is fully localized (question
 * text AND options) into each course language; Math questions are localized but
 * their options stay as numerals/maths notation; the English grammar topic is
 * left in English for every course (it tests English specifically).
 *
 * Languages without an explicit translation fall back to English.
 */
class TriviaSeeder extends Seeder
{
    private const LANGS = ['en', 'fr', 'es', 'de', 'ja', 'ko', 'tr', 'ru', 'ar', 'az'];

    public function run(): void
    {
        $science = $this->scienceQuestions();
        $math = $this->mathQuestions();
        $english = $this->englishQuestions();
        $meta = $this->topicMeta();

        foreach (Language::all() as $language) {
            $code = in_array($language->code, self::LANGS, true) ? $language->code : 'en';

            $this->seedTopic($language->id, 'science', 'flask', 1, $meta['science'], $code, array_map(
                fn ($item) => [
                    'q' => ($item['tr'][$code] ?? $item['tr']['en'])['q'],
                    'o' => ($item['tr'][$code] ?? $item['tr']['en'])['o'],
                    'c' => $item['c'],
                ],
                $science,
            ));

            $this->seedTopic($language->id, 'math', 'calculator', 2, $meta['math'], $code, array_map(
                fn ($item) => [
                    'q' => $item['tr'][$code] ?? $item['tr']['en'],
                    'o' => $item['o'], // numerals / maths notation stay as-is
                    'c' => $item['c'],
                ],
                $math,
            ));

            // English grammar topic — identical English for every course.
            $this->seedTopic($language->id, 'english', 'book-open', 3, $meta['english'], 'en', $english);
        }
    }

    /**
     * @param  array<int, array{q: string, o: array<int, string>, c: int}>  $questions
     */
    private function seedTopic(int $languageId, string $key, string $icon, int $order, array $meta, string $code, array $questions): void
    {
        $m = $meta[$code] ?? $meta['en'];

        $topic = TriviaTopic::updateOrCreate(
            ['language_id' => $languageId, 'key' => $key],
            ['title' => $m['title'], 'description' => $m['description'], 'icon' => $icon, 'order_number' => $order],
        );

        // Wipe and re-insert so switching languages never leaves stale (e.g.
        // English) questions behind next to the new localized ones.
        $topic->questions()->delete();

        foreach ($questions as $index => $question) {
            TriviaQuestion::create([
                'topic_id' => $topic->id,
                'question' => $question['q'],
                'options' => $question['o'],
                'correct_index' => $question['c'],
                'order_number' => $index + 1,
            ]);
        }
    }

    private function topicMeta(): array
    {
        return [
            'science' => [
                'en' => ['title' => 'Science', 'description' => 'Explore the wonders of biology, physics, and the universe.'],
                'fr' => ['title' => 'Sciences', 'description' => "Explorez les merveilles de la biologie, de la physique et de l'univers."],
                'es' => ['title' => 'Ciencias', 'description' => 'Explora las maravillas de la biología, la física y el universo.'],
                'de' => ['title' => 'Wissenschaft', 'description' => 'Entdecke die Wunder der Biologie, Physik und des Universums.'],
                'ja' => ['title' => '科学', 'description' => '生物学、物理学、宇宙の不思議を探検しよう。'],
                'ko' => ['title' => '과학', 'description' => '생물학, 물리학, 우주의 신비를 탐험하세요.'],
                'tr' => ['title' => 'Bilim', 'description' => 'Biyolojinin, fiziğin ve evrenin harikalarını keşfet.'],
                'ru' => ['title' => 'Наука', 'description' => 'Проверьте свои знания о мире вокруг нас.'],
                'ar' => ['title' => 'العلوم', 'description' => 'اكتشف عجائب الأحياء والفيزياء والكون.'],
                'az' => ['title' => 'Elm', 'description' => 'Biologiya, fizika və kainatın möcüzələrini kəşf et.'],
            ],
            'math' => [
                'en' => ['title' => 'Mathematics', 'description' => 'Master numbers, patterns, and logic with fun problems.'],
                'fr' => ['title' => 'Mathématiques', 'description' => 'Maîtrisez les nombres, les motifs et la logique avec des problèmes amusants.'],
                'es' => ['title' => 'Matemáticas', 'description' => 'Domina los números, los patrones y la lógica con problemas divertidos.'],
                'de' => ['title' => 'Mathematik', 'description' => 'Meistere Zahlen, Muster und Logik mit unterhaltsamen Aufgaben.'],
                'ja' => ['title' => '数学', 'description' => '楽しい問題で数字、パターン、論理をマスターしよう。'],
                'ko' => ['title' => '수학', 'description' => '재미있는 문제로 숫자, 패턴, 논리를 익히세요.'],
                'tr' => ['title' => 'Matematik', 'description' => 'Eğlenceli problemlerle sayıları, örüntüleri ve mantığı öğren.'],
                'ru' => ['title' => 'Математика', 'description' => 'Освойте числа, закономерности и логику в увлекательных задачах.'],
                'ar' => ['title' => 'الرياضيات', 'description' => 'أتقن الأرقام والأنماط والمنطق من خلال مسائل ممتعة.'],
                'az' => ['title' => 'Riyaziyyat', 'description' => 'Əyləncəli məsələlərlə ədədləri, naxışları və məntiqi mənimsə.'],
            ],
            'english' => [
                'en' => ['title' => 'English', 'description' => 'Sharpen your vocabulary, grammar, and language skills.'],
            ],
        ];
    }

    private function scienceQuestions(): array
    {
        return [
            ['c' => 0, 'tr' => [
                'en' => ['q' => 'What is the chemical symbol for water?', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']],
                'fr' => ['q' => "Quel est le symbole chimique de l'eau ?", 'o' => ['H2O', 'CO2', 'O2', 'NaCl']],
                'es' => ['q' => '¿Cuál es el símbolo químico del agua?', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']],
                'de' => ['q' => 'Was ist das chemische Symbol für Wasser?', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']],
                'ja' => ['q' => '水の化学記号は？', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']],
                'ko' => ['q' => '물의 화학 기호는?', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']],
                'tr' => ['q' => 'Suyun kimyasal sembolü nedir?', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']], 'ru' => ['q' => 'Какой химический символ у воды?', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']], 'ar' => ['q' => 'ما هو الرمز الكيميائي للماء؟', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']], 'az' => ['q' => 'Suyun kimyəvi simvolu nədir?', 'o' => ['H2O', 'CO2', 'O2', 'NaCl']],
            ]],
            ['c' => 1, 'tr' => [
                'en' => ['q' => 'Which planet is known as the Red Planet?', 'o' => ['Venus', 'Mars', 'Jupiter', 'Saturn']],
                'fr' => ['q' => 'Quelle planète est appelée la planète rouge ?', 'o' => ['Vénus', 'Mars', 'Jupiter', 'Saturne']],
                'es' => ['q' => '¿Qué planeta se conoce como el planeta rojo?', 'o' => ['Venus', 'Marte', 'Júpiter', 'Saturno']],
                'de' => ['q' => 'Welcher Planet ist als der Rote Planet bekannt?', 'o' => ['Venus', 'Mars', 'Jupiter', 'Saturn']],
                'ja' => ['q' => '赤い惑星として知られている惑星は？', 'o' => ['金星', '火星', '木星', '土星']],
                'ko' => ['q' => '붉은 행성으로 알려진 행성은?', 'o' => ['금성', '화성', '목성', '토성']],
                'tr' => ['q' => 'Hangi gezegen Kızıl Gezegen olarak bilinir?', 'o' => ['Venüs', 'Mars', 'Jüpiter', 'Satürn']], 'ru' => ['q' => 'Какую планету называют Красной планетой?', 'o' => ['Венера', 'Марс', 'Юпитер', 'Сатурн']], 'ar' => ['q' => 'أي كوكب يعرف بالكوكب الأحمر؟', 'o' => ['الزهرة', 'المريخ', 'المشتري', 'زحل']], 'az' => ['q' => 'Hansı planet Qırmızı Planet kimi tanınır?', 'o' => ['Venera', 'Mars', 'Yupiter', 'Saturn']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'What gas do plants absorb from the air to make food?', 'o' => ['Oxygen', 'Nitrogen', 'Carbon Dioxide', 'Hydrogen']],
                'fr' => ['q' => "Quel gaz les plantes absorbent-elles dans l'air pour fabriquer leur nourriture ?", 'o' => ['Oxygène', 'Azote', 'Dioxyde de carbone', 'Hydrogène']],
                'es' => ['q' => '¿Qué gas absorben las plantas del aire para producir alimento?', 'o' => ['Oxígeno', 'Nitrógeno', 'Dióxido de carbono', 'Hidrógeno']],
                'de' => ['q' => 'Welches Gas nehmen Pflanzen aus der Luft auf, um Nahrung herzustellen?', 'o' => ['Sauerstoff', 'Stickstoff', 'Kohlendioxid', 'Wasserstoff']],
                'ja' => ['q' => '植物が養分を作るために空気から吸収する気体は？', 'o' => ['酸素', '窒素', '二酸化炭素', '水素']],
                'ko' => ['q' => '식물이 양분을 만들기 위해 공기에서 흡수하는 기체는?', 'o' => ['산소', '질소', '이산화탄소', '수소']],
                'tr' => ['q' => 'Bitkiler besin üretmek için havadan hangi gazı alır?', 'o' => ['Oksijen', 'Azot', 'Karbondioksit', 'Hidrojen']], 'ru' => ['q' => 'Какой газ растения поглощают из воздуха для питания?', 'o' => ['Кислород', 'Азот', 'Углекислый газ', 'Водород']], 'ar' => ['q' => 'ما الغاز الذي تمتصه النباتات من الهواء لصنع الغذاء؟', 'o' => ['الأكسجين', 'النيتروجين', 'ثاني أكسيد الكربون', 'الهيدروجين']], 'az' => ['q' => 'Bitkilər qida hazırlamaq üçün havadan hansı qazı udur?', 'o' => ['Oksigen', 'Azot', 'Karbon qazı', 'Hidrogen']],
            ]],
            ['c' => 0, 'tr' => [
                'en' => ['q' => 'How many bones are in the adult human body?', 'o' => ['206', '150', '300', '180']],
                'fr' => ['q' => "Combien d'os y a-t-il dans le corps humain adulte ?", 'o' => ['206', '150', '300', '180']],
                'es' => ['q' => '¿Cuántos huesos hay en el cuerpo humano adulto?', 'o' => ['206', '150', '300', '180']],
                'de' => ['q' => 'Wie viele Knochen hat der erwachsene menschliche Körper?', 'o' => ['206', '150', '300', '180']],
                'ja' => ['q' => '成人の人体には骨がいくつありますか？', 'o' => ['206', '150', '300', '180']],
                'ko' => ['q' => '성인의 인체에는 뼈가 몇 개 있나요?', 'o' => ['206', '150', '300', '180']],
                'tr' => ['q' => 'Yetişkin bir insan vücudunda kaç kemik vardır?', 'o' => ['206', '150', '300', '180']], 'ru' => ['q' => 'Сколько костей в теле взрослого человека?', 'o' => ['206', '150', '300', '180']], 'ar' => ['q' => 'كم عدد العظام في جسم الإنسان البالغ؟', 'o' => ['206', '150', '300', '180']], 'az' => ['q' => 'Yetkin insan bədənində neçə sümük var?', 'o' => ['206', '150', '300', '180']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'What is the powerhouse of the cell?', 'o' => ['Nucleus', 'Ribosome', 'Mitochondria', 'Golgi Body']],
                'fr' => ['q' => "Quel est le centre énergétique de la cellule ?", 'o' => ['Noyau', 'Ribosome', 'Mitochondrie', 'Appareil de Golgi']],
                'es' => ['q' => '¿Cuál es la central energética de la célula?', 'o' => ['Núcleo', 'Ribosoma', 'Mitocondria', 'Aparato de Golgi']],
                'de' => ['q' => 'Was ist das Kraftwerk der Zelle?', 'o' => ['Zellkern', 'Ribosom', 'Mitochondrium', 'Golgi-Apparat']],
                'ja' => ['q' => '細胞のエネルギー源となる器官は？', 'o' => ['核', 'リボソーム', 'ミトコンドリア', 'ゴルジ体']],
                'ko' => ['q' => '세포의 발전소는?', 'o' => ['핵', '리보솜', '미토콘드리아', '골지체']],
                'tr' => ['q' => 'Hücrenin enerji merkezi nedir?', 'o' => ['Çekirdek', 'Ribozom', 'Mitokondri', 'Golgi cisimciği']], 'ru' => ['q' => 'Что является энергетической станцией клетки?', 'o' => ['Ядро', 'Рибосома', 'Митохондрия', 'Аппарат Гольджи']], 'ar' => ['q' => 'ما هو مصدر طاقة الخلية؟', 'o' => ['النواة', 'الريبوسوم', 'الميتوكوندريا', 'جهاز غولجي']], 'az' => ['q' => 'Hüceyrənin enerji mənbəyi nədir?', 'o' => ['Nüvə', 'Ribosom', 'Mitoxondri', 'Holci aparatı']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'What force pulls objects toward the Earth?', 'o' => ['Friction', 'Magnetism', 'Gravity', 'Tension']],
                'fr' => ['q' => 'Quelle force attire les objets vers la Terre ?', 'o' => ['Frottement', 'Magnétisme', 'Gravité', 'Tension']],
                'es' => ['q' => '¿Qué fuerza atrae los objetos hacia la Tierra?', 'o' => ['Fricción', 'Magnetismo', 'Gravedad', 'Tensión']],
                'de' => ['q' => 'Welche Kraft zieht Objekte zur Erde?', 'o' => ['Reibung', 'Magnetismus', 'Schwerkraft', 'Spannung']],
                'ja' => ['q' => '物体を地球に引き寄せる力は？', 'o' => ['摩擦', '磁力', '重力', '張力']],
                'ko' => ['q' => '물체를 지구로 끌어당기는 힘은?', 'o' => ['마찰력', '자기력', '중력', '장력']],
                'tr' => ['q' => 'Hangi kuvvet cisimleri Dünya’ya doğru çeker?', 'o' => ['Sürtünme', 'Manyetizma', 'Yer çekimi', 'Gerilim']], 'ru' => ['q' => 'Какая сила притягивает предметы к Земле?', 'o' => ['Трение', 'Магнетизм', 'Гравитация', 'Натяжение']], 'ar' => ['q' => 'ما القوة التي تجذب الأجسام نحو الأرض؟', 'o' => ['الاحتكاك', 'المغناطيسية', 'الجاذبية', 'الشد']], 'az' => ['q' => 'Hansı qüvvə cisimləri Yerə tərəf çəkir?', 'o' => ['Sürtünmə', 'Maqnetizm', 'Cazibə', 'Gərginlik']],
            ]],
            ['c' => 1, 'tr' => [
                'en' => ['q' => 'At what temperature does water boil at sea level?', 'o' => ['90°C', '100°C', '120°C', '80°C']],
                'fr' => ['q' => "À quelle température l'eau bout-elle au niveau de la mer ?", 'o' => ['90°C', '100°C', '120°C', '80°C']],
                'es' => ['q' => '¿A qué temperatura hierve el agua a nivel del mar?', 'o' => ['90°C', '100°C', '120°C', '80°C']],
                'de' => ['q' => 'Bei welcher Temperatur kocht Wasser auf Meereshöhe?', 'o' => ['90°C', '100°C', '120°C', '80°C']],
                'ja' => ['q' => '海面で水は何度で沸騰しますか？', 'o' => ['90°C', '100°C', '120°C', '80°C']],
                'ko' => ['q' => '해수면에서 물은 몇 도에서 끓나요?', 'o' => ['90°C', '100°C', '120°C', '80°C']],
                'tr' => ['q' => 'Deniz seviyesinde su kaç derecede kaynar?', 'o' => ['90°C', '100°C', '120°C', '80°C']], 'ru' => ['q' => 'При какой температуре вода кипит на уровне моря?', 'o' => ['90°C', '100°C', '120°C', '80°C']], 'ar' => ['q' => 'عند أي درجة حرارة يغلي الماء عند مستوى سطح البحر؟', 'o' => ['90°C', '100°C', '120°C', '80°C']], 'az' => ['q' => 'Dəniz səviyyəsində su hansı temperaturda qaynayır?', 'o' => ['90°C', '100°C', '120°C', '80°C']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'Which planet is closest to the Sun?', 'o' => ['Earth', 'Venus', 'Mercury', 'Mars']],
                'fr' => ['q' => 'Quelle planète est la plus proche du Soleil ?', 'o' => ['Terre', 'Vénus', 'Mercure', 'Mars']],
                'es' => ['q' => '¿Qué planeta está más cerca del Sol?', 'o' => ['Tierra', 'Venus', 'Mercurio', 'Marte']],
                'de' => ['q' => 'Welcher Planet ist der Sonne am nächsten?', 'o' => ['Erde', 'Venus', 'Merkur', 'Mars']],
                'ja' => ['q' => '太陽に最も近い惑星は？', 'o' => ['地球', '金星', '水星', '火星']],
                'ko' => ['q' => '태양에 가장 가까운 행성은?', 'o' => ['지구', '금성', '수성', '화성']],
                'tr' => ['q' => 'Güneş’e en yakın gezegen hangisidir?', 'o' => ['Dünya', 'Venüs', 'Merkür', 'Mars']], 'ru' => ['q' => 'Какая планета ближе всего к Солнцу?', 'o' => ['Земля', 'Венера', 'Меркурий', 'Марс']], 'ar' => ['q' => 'أي كوكب هو الأقرب إلى الشمس؟', 'o' => ['الأرض', 'الزهرة', 'عطارد', 'المريخ']], 'az' => ['q' => 'Hansı planet Günəşə ən yaxındır?', 'o' => ['Yer', 'Venera', 'Merkuri', 'Mars']],
            ]],
            ['c' => 1, 'tr' => [
                'en' => ['q' => 'What is the process by which plants make their own food?', 'o' => ['Respiration', 'Photosynthesis', 'Digestion', 'Evaporation']],
                'fr' => ['q' => 'Quel est le processus par lequel les plantes fabriquent leur nourriture ?', 'o' => ['Respiration', 'Photosynthèse', 'Digestion', 'Évaporation']],
                'es' => ['q' => '¿Cuál es el proceso por el que las plantas producen su propio alimento?', 'o' => ['Respiración', 'Fotosíntesis', 'Digestión', 'Evaporación']],
                'de' => ['q' => 'Wie heißt der Prozess, mit dem Pflanzen ihre Nahrung herstellen?', 'o' => ['Atmung', 'Photosynthese', 'Verdauung', 'Verdunstung']],
                'ja' => ['q' => '植物が自ら養分を作る過程は？', 'o' => ['呼吸', '光合成', '消化', '蒸発']],
                'ko' => ['q' => '식물이 스스로 양분을 만드는 과정은?', 'o' => ['호흡', '광합성', '소화', '증발']],
                'tr' => ['q' => 'Bitkilerin kendi besinini üretme sürecine ne denir?', 'o' => ['Solunum', 'Fotosentez', 'Sindirim', 'Buharlaşma']], 'ru' => ['q' => 'Как называется процесс, которым растения создают себе пищу?', 'o' => ['Дыхание', 'Фотосинтез', 'Пищеварение', 'Испарение']], 'ar' => ['q' => 'ما اسم العملية التي تصنع بها النباتات غذاءها؟', 'o' => ['التنفس', 'التمثيل الضوئي', 'الهضم', 'التبخر']], 'az' => ['q' => 'Bitkilərin öz qidasını hazırladığı proses necə adlanır?', 'o' => ['Tənəffüs', 'Fotosintez', 'Həzm', 'Buxarlanma']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'What is the largest organ in the human body?', 'o' => ['Heart', 'Liver', 'Skin', 'Brain']],
                'fr' => ['q' => 'Quel est le plus grand organe du corps humain ?', 'o' => ['Cœur', 'Foie', 'Peau', 'Cerveau']],
                'es' => ['q' => '¿Cuál es el órgano más grande del cuerpo humano?', 'o' => ['Corazón', 'Hígado', 'Piel', 'Cerebro']],
                'de' => ['q' => 'Was ist das größte Organ im menschlichen Körper?', 'o' => ['Herz', 'Leber', 'Haut', 'Gehirn']],
                'ja' => ['q' => '人体で最も大きい臓器は？', 'o' => ['心臓', '肝臓', '皮膚', '脳']],
                'ko' => ['q' => '인체에서 가장 큰 장기는?', 'o' => ['심장', '간', '피부', '뇌']],
                'tr' => ['q' => 'İnsan vücudundaki en büyük organ hangisidir?', 'o' => ['Kalp', 'Karaciğer', 'Deri', 'Beyin']], 'ru' => ['q' => 'Какой орган самый большой в теле человека?', 'o' => ['Сердце', 'Печень', 'Кожа', 'Мозг']], 'ar' => ['q' => 'ما أكبر عضو في جسم الإنسان؟', 'o' => ['القلب', 'الكبد', 'الجلد', 'الدماغ']], 'az' => ['q' => 'İnsan bədənində ən böyük orqan hansıdır?', 'o' => ['Ürək', 'Qaraciyər', 'Dəri', 'Beyin']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'Which gas do humans need to breathe to survive?', 'o' => ['Carbon Dioxide', 'Nitrogen', 'Oxygen', 'Helium']],
                'fr' => ['q' => 'Quel gaz les humains doivent-ils respirer pour survivre ?', 'o' => ['Dioxyde de carbone', 'Azote', 'Oxygène', 'Hélium']],
                'es' => ['q' => '¿Qué gas necesitan respirar los humanos para sobrevivir?', 'o' => ['Dióxido de carbono', 'Nitrógeno', 'Oxígeno', 'Helio']],
                'de' => ['q' => 'Welches Gas müssen Menschen zum Überleben atmen?', 'o' => ['Kohlendioxid', 'Stickstoff', 'Sauerstoff', 'Helium']],
                'ja' => ['q' => '人間が生きるために吸う必要がある気体は？', 'o' => ['二酸化炭素', '窒素', '酸素', 'ヘリウム']],
                'ko' => ['q' => '사람이 살기 위해 호흡해야 하는 기체는?', 'o' => ['이산화탄소', '질소', '산소', '헬륨']],
                'tr' => ['q' => 'İnsanların yaşamak için soluduğu gaz hangisidir?', 'o' => ['Karbondioksit', 'Azot', 'Oksijen', 'Helyum']], 'ru' => ['q' => 'Какой газ нужен человеку для дыхания?', 'o' => ['Углекислый газ', 'Азот', 'Кислород', 'Гелий']], 'ar' => ['q' => 'ما الغاز الذي يحتاجه الإنسان للتنفس؟', 'o' => ['ثاني أكسيد الكربون', 'النيتروجين', 'الأكسجين', 'الهيليوم']], 'az' => ['q' => 'İnsan yaşamaq üçün hansı qazla nəfəs alır?', 'o' => ['Karbon qazı', 'Azot', 'Oksigen', 'Helium']],
            ]],
            ['c' => 1, 'tr' => [
                'en' => ['q' => 'What is the closest star to Earth?', 'o' => ['Proxima Centauri', 'The Sun', 'Sirius', 'Polaris']],
                'fr' => ['q' => "Quelle est l'étoile la plus proche de la Terre ?", 'o' => ['Proxima Centauri', 'Le Soleil', 'Sirius', 'Polaris']],
                'es' => ['q' => '¿Cuál es la estrella más cercana a la Tierra?', 'o' => ['Próxima Centauri', 'El Sol', 'Sirio', 'Polaris']],
                'de' => ['q' => 'Welcher Stern ist der Erde am nächsten?', 'o' => ['Proxima Centauri', 'Die Sonne', 'Sirius', 'Polarstern']],
                'ja' => ['q' => '地球に最も近い恒星は？', 'o' => ['プロキシマ・ケンタウリ', '太陽', 'シリウス', '北極星']],
                'ko' => ['q' => '지구에서 가장 가까운 항성은?', 'o' => ['프록시마 센타우리', '태양', '시리우스', '북극성']],
                'tr' => ['q' => 'Dünya’ya en yakın yıldız hangisidir?', 'o' => ['Proxima Centauri', 'Güneş', 'Sirius', 'Kutup Yıldızı']], 'ru' => ['q' => 'Какая звезда ближе всего к Земле?', 'o' => ['Проксима Центавра', 'Солнце', 'Сириус', 'Полярная звезда']], 'ar' => ['q' => 'ما أقرب نجم إلى الأرض؟', 'o' => ['بروكسيما قنطورس', 'الشمس', 'الشعرى', 'النجم القطبي']], 'az' => ['q' => 'Yerə ən yaxın ulduz hansıdır?', 'o' => ['Proksima Kentavr', 'Günəş', 'Sirius', 'Qütb ulduzu']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'What do we call an animal that eats only plants?', 'o' => ['Carnivore', 'Omnivore', 'Herbivore', 'Predator']],
                'fr' => ['q' => "Comment appelle-t-on un animal qui ne mange que des plantes ?", 'o' => ['Carnivore', 'Omnivore', 'Herbivore', 'Prédateur']],
                'es' => ['q' => '¿Cómo se llama a un animal que solo come plantas?', 'o' => ['Carnívoro', 'Omnívoro', 'Herbívoro', 'Depredador']],
                'de' => ['q' => 'Wie nennt man ein Tier, das nur Pflanzen frisst?', 'o' => ['Fleischfresser', 'Allesfresser', 'Pflanzenfresser', 'Raubtier']],
                'ja' => ['q' => '植物だけを食べる動物を何と呼びますか？', 'o' => ['肉食動物', '雑食動物', '草食動物', '捕食者']],
                'ko' => ['q' => '식물만 먹는 동물을 무엇이라고 하나요?', 'o' => ['육식동물', '잡식동물', '초식동물', '포식자']],
                'tr' => ['q' => 'Sadece bitki yiyen hayvana ne denir?', 'o' => ['Etçil', 'Hepçil', 'Otçul', 'Avcı']], 'ru' => ['q' => 'Как называют животное, которое ест только растения?', 'o' => ['Хищник', 'Всеядное', 'Травоядное', 'Охотник']], 'ar' => ['q' => 'ماذا نسمي الحيوان الذي يأكل النباتات فقط؟', 'o' => ['آكل اللحوم', 'آكل كل شيء', 'آكل العشب', 'مفترس']], 'az' => ['q' => 'Yalnız bitki yeyən heyvana nə deyilir?', 'o' => ['Ətyeyən', 'Hərşeyyeyən', 'Otyeyən', 'Yırtıcı']],
            ]],
            ['c' => 2, 'tr' => [
                'en' => ['q' => 'What natural satellite orbits the Earth?', 'o' => ['The Sun', 'Mars', 'The Moon', 'Venus']],
                'fr' => ['q' => 'Quel satellite naturel orbite autour de la Terre ?', 'o' => ['Le Soleil', 'Mars', 'La Lune', 'Vénus']],
                'es' => ['q' => '¿Qué satélite natural orbita la Tierra?', 'o' => ['El Sol', 'Marte', 'La Luna', 'Venus']],
                'de' => ['q' => 'Welcher natürliche Satellit umkreist die Erde?', 'o' => ['Die Sonne', 'Mars', 'Der Mond', 'Venus']],
                'ja' => ['q' => '地球を周回する自然の衛星は？', 'o' => ['太陽', '火星', '月', '金星']],
                'ko' => ['q' => '지구를 도는 자연 위성은?', 'o' => ['태양', '화성', '달', '금성']],
                'tr' => ['q' => 'Dünya’nın etrafında dönen doğal uydu hangisidir?', 'o' => ['Güneş', 'Mars', 'Ay', 'Venüs']], 'ru' => ['q' => 'Какой естественный спутник вращается вокруг Земли?', 'o' => ['Солнце', 'Марс', 'Луна', 'Венера']], 'ar' => ['q' => 'ما القمر الطبيعي الذي يدور حول الأرض؟', 'o' => ['الشمس', 'المريخ', 'القمر', 'الزهرة']], 'az' => ['q' => 'Yerin ətrafında hansı təbii peyk fırlanır?', 'o' => ['Günəş', 'Mars', 'Ay', 'Venera']],
            ]],
            ['c' => 1, 'tr' => [
                'en' => ['q' => 'What is the study of living organisms called?', 'o' => ['Geology', 'Biology', 'Chemistry', 'Physics']],
                'fr' => ['q' => "Comment appelle-t-on l'étude des organismes vivants ?", 'o' => ['Géologie', 'Biologie', 'Chimie', 'Physique']],
                'es' => ['q' => '¿Cómo se llama el estudio de los organismos vivos?', 'o' => ['Geología', 'Biología', 'Química', 'Física']],
                'de' => ['q' => 'Wie nennt man die Lehre von den Lebewesen?', 'o' => ['Geologie', 'Biologie', 'Chemie', 'Physik']],
                'ja' => ['q' => '生物を研究する学問は？', 'o' => ['地質学', '生物学', '化学', '物理学']],
                'ko' => ['q' => '생물을 연구하는 학문은?', 'o' => ['지질학', '생물학', '화학', '물리학']],
                'tr' => ['q' => 'Canlı organizmaları inceleyen bilime ne denir?', 'o' => ['Jeoloji', 'Biyoloji', 'Kimya', 'Fizik']], 'ru' => ['q' => 'Как называется наука о живых организмах?', 'o' => ['Геология', 'Биология', 'Химия', 'Физика']], 'ar' => ['q' => 'ماذا يسمى علم الكائنات الحية؟', 'o' => ['الجيولوجيا', 'الأحياء', 'الكيمياء', 'الفيزياء']], 'az' => ['q' => 'Canlı orqanizmləri öyrənən elm necə adlanır?', 'o' => ['Geologiya', 'Biologiya', 'Kimya', 'Fizika']],
            ]],
        ];
    }

    private function mathQuestions(): array
    {
        return [
            ['c' => 1, 'o' => ['54', '56', '64', '48'], 'tr' => ['en' => 'What is 7 × 8?', 'fr' => 'Combien font 7 × 8 ?', 'es' => '¿Cuánto es 7 × 8?', 'de' => 'Was ist 7 × 8?', 'ja' => '7 × 8 は？', 'ko' => '7 × 8은?', 'tr' => '7 × 8 kaçtır?', 'ru' => 'Сколько будет 7 × 8?', 'ar' => 'كم يساوي 7 × 8؟', 'az' => '7 × 8 neçə edir?']],
            ['c' => 2, 'o' => ['6', '7', '8', '9'], 'tr' => ['en' => 'What is the square root of 64?', 'fr' => 'Quelle est la racine carrée de 64 ?', 'es' => '¿Cuál es la raíz cuadrada de 64?', 'de' => 'Was ist die Quadratwurzel von 64?', 'ja' => '64 の平方根は？', 'ko' => '64의 제곱근은?', 'tr' => '64’ün karekökü kaçtır?', 'ru' => 'Чему равен квадратный корень из 64?', 'ar' => 'ما الجذر التربيعي للعدد 64؟', 'az' => '64-ün kvadrat kökü neçədir?']],
            ['c' => 1, 'o' => ['5', '6', '7', '8'], 'tr' => ['en' => 'How many sides does a hexagon have?', 'fr' => 'Combien de côtés a un hexagone ?', 'es' => '¿Cuántos lados tiene un hexágono?', 'de' => 'Wie viele Seiten hat ein Sechseck?', 'ja' => '六角形の辺の数は？', 'ko' => '육각형의 변은 몇 개인가요?', 'tr' => 'Bir altıgenin kaç kenarı vardır?', 'ru' => 'Сколько сторон у шестиугольника?', 'ar' => 'كم ضلعا للشكل السداسي؟', 'az' => 'Altıbucaqlının neçə tərəfi var?']],
            ['c' => 2, 'o' => ['20', '25', '30', '35'], 'tr' => ['en' => 'What is 15% of 200?', 'fr' => 'Combien font 15 % de 200 ?', 'es' => '¿Cuánto es el 15 % de 200?', 'de' => 'Was sind 15 % von 200?', 'ja' => '200 の 15% は？', 'ko' => '200의 15%는?', 'tr' => '200’ün %15’i kaçtır?', 'ru' => 'Сколько будет 15% от 200?', 'ar' => 'كم يساوي 15% من 200؟', 'az' => '200-ün 15%-i neçədir?']],
            ['c' => 1, 'o' => ['2', '3', '4', '6'], 'tr' => ['en' => 'What is 12 ÷ 4?', 'fr' => 'Combien font 12 ÷ 4 ?', 'es' => '¿Cuánto es 12 ÷ 4?', 'de' => 'Was ist 12 ÷ 4?', 'ja' => '12 ÷ 4 は？', 'ko' => '12 ÷ 4는?', 'tr' => '12 ÷ 4 kaçtır?', 'ru' => 'Сколько будет 12 ÷ 4?', 'ar' => 'كم يساوي 12 ÷ 4؟', 'az' => '12 ÷ 4 neçə edir?']],
            ['c' => 1, 'o' => ['90°', '180°', '270°', '360°'], 'tr' => ['en' => 'What is the sum of the angles in a triangle?', 'fr' => "Quelle est la somme des angles d'un triangle ?", 'es' => '¿Cuál es la suma de los ángulos de un triángulo?', 'de' => 'Was ist die Summe der Winkel in einem Dreieck?', 'ja' => '三角形の内角の和は？', 'ko' => '삼각형의 내각의 합은?', 'tr' => 'Bir üçgenin iç açıları toplamı kaçtır?', 'ru' => 'Чему равна сумма углов треугольника?', 'ar' => 'كم مجموع زوايا المثلث؟', 'az' => 'Üçbucağın bucaqlarının cəmi neçədir?']],
            ['c' => 2, 'o' => ['18', '72', '81', '99'], 'tr' => ['en' => 'What is 9 squared?', 'fr' => 'Combien font 9 au carré ?', 'es' => '¿Cuánto es 9 al cuadrado?', 'de' => 'Was ist 9 zum Quadrat?', 'ja' => '9 の 2 乗は？', 'ko' => '9의 제곱은?', 'tr' => '9’un karesi kaçtır?', 'ru' => 'Сколько будет 9 в квадрате?', 'ar' => 'كم يساوي 9 تربيع؟', 'az' => '9-un kvadratı neçədir?']],
            ['c' => 3, 'o' => ['20', '24', '30', '32'], 'tr' => ['en' => 'What number comes next: 2, 4, 8, 16, ...?', 'fr' => 'Quel nombre vient ensuite : 2, 4, 8, 16, ... ?', 'es' => '¿Qué número sigue: 2, 4, 8, 16, ...?', 'de' => 'Welche Zahl kommt als Nächstes: 2, 4, 8, 16, ...?', 'ja' => '次に来る数は：2, 4, 8, 16, ...？', 'ko' => '다음에 올 숫자는: 2, 4, 8, 16, ...?', 'tr' => 'Sıradaki sayı nedir: 2, 4, 8, 16, ...?', 'ru' => 'Какое число следующее: 2, 4, 8, 16, ...?', 'ar' => 'ما العدد التالي: 2، 4، 8، 16، ...؟', 'az' => 'Növbəti ədəd hansıdır: 2, 4, 8, 16, ...?']],
            ['c' => 0, 'o' => ['63', '67', '73', '53'], 'tr' => ['en' => 'What is 100 − 37?', 'fr' => 'Combien font 100 − 37 ?', 'es' => '¿Cuánto es 100 − 37?', 'de' => 'Was ist 100 − 37?', 'ja' => '100 − 37 は？', 'ko' => '100 − 37은?', 'tr' => '100 − 37 kaçtır?', 'ru' => 'Сколько будет 100 − 37?', 'ar' => 'كم يساوي 100 − 37؟', 'az' => '100 − 37 neçə edir?']],
            ['c' => 2, 'o' => ['100', '110', '120', '90'], 'tr' => ['en' => 'How many minutes are in 2 hours?', 'fr' => 'Combien de minutes y a-t-il dans 2 heures ?', 'es' => '¿Cuántos minutos hay en 2 horas?', 'de' => 'Wie viele Minuten sind in 2 Stunden?', 'ja' => '2 時間は何分ですか？', 'ko' => '2시간은 몇 분인가요?', 'tr' => '2 saat kaç dakikadır?', 'ru' => 'Сколько минут в 2 часах?', 'ar' => 'كم دقيقة في ساعتين؟', 'az' => '2 saatda neçə dəqiqə var?']],
            ['c' => 3, 'o' => ['25', '60', '100', '120'], 'tr' => ['en' => 'What is 5 factorial (5!)?', 'fr' => 'Combien font 5 factorielle (5!) ?', 'es' => '¿Cuánto es 5 factorial (5!)?', 'de' => 'Was ist 5 Fakultät (5!)?', 'ja' => '5 の階乗 (5!) は？', 'ko' => '5 팩토리얼(5!)은?', 'tr' => '5 faktöriyel (5!) kaçtır?', 'ru' => 'Сколько будет 5 факториал (5!)?', 'ar' => 'كم يساوي مضروب 5 (5!)؟', 'az' => '5 faktorial (5!) neçədir?']],
            ['c' => 2, 'o' => ['34%', '43%', '75%', '60%'], 'tr' => ['en' => 'What is 3/4 written as a percentage?', 'fr' => 'Comment écrit-on 3/4 en pourcentage ?', 'es' => '¿Cómo se escribe 3/4 como porcentaje?', 'de' => 'Wie schreibt man 3/4 als Prozentsatz?', 'ja' => '3/4 をパーセントで表すと？', 'ko' => '3/4을 백분율로 나타내면?', 'tr' => '3/4 yüzde olarak nasıl yazılır?', 'ru' => 'Как записать 3/4 в процентах?', 'ar' => 'كيف تكتب 3/4 كنسبة مئوية؟', 'az' => '3/4 faizlə necə yazılır?']],
        ];
    }

    /** English grammar topic — left in English for every course. */
    private function englishQuestions(): array
    {
        return [
            ['q' => "Which word is a synonym for 'happy'?", 'o' => ['Joyful', 'Angry', 'Tired', 'Bored'], 'c' => 0],
            ['q' => "What is the plural of 'child'?", 'o' => ['Childs', 'Childes', 'Children', 'Childrens'], 'c' => 2],
            ['q' => "Which word is an antonym of 'brave'?", 'o' => ['Bold', 'Cowardly', 'Fearless', 'Strong'], 'c' => 1],
            ['q' => "What is the past tense of 'go'?", 'o' => ['Goed', 'Gone', 'Went', 'Going'], 'c' => 2],
            ['q' => "What part of speech is the word 'quickly'?", 'o' => ['Noun', 'Verb', 'Adverb', 'Adjective'], 'c' => 2],
            ['q' => "Who wrote 'Romeo and Juliet'?", 'o' => ['Charles Dickens', 'William Shakespeare', 'Jane Austen', 'Mark Twain'], 'c' => 1],
            ['q' => 'What is a group of words expressing a complete thought called?', 'o' => ['Phrase', 'Clause', 'Sentence', 'Paragraph'], 'c' => 2],
            ['q' => "Which word means 'very large'?", 'o' => ['Tiny', 'Enormous', 'Narrow', 'Slim'], 'c' => 1],
            ['q' => "What is the opposite of 'ancient'?", 'o' => ['Modern', 'Old', 'Historic', 'Aged'], 'c' => 0],
            ['q' => "What is the plural of 'mouse' (the animal)?", 'o' => ['Mouses', 'Mice', 'Mices', 'Meese'], 'c' => 1],
            ['q' => 'A word that describes a noun is called a/an:', 'o' => ['Verb', 'Adverb', 'Adjective', 'Pronoun'], 'c' => 2],
            ['q' => "What is the past tense of 'eat'?", 'o' => ['Eated', 'Ate', 'Eaten', 'Eating'], 'c' => 1],
            ['q' => 'Which punctuation mark ends a question?', 'o' => ['Period', 'Exclamation mark', 'Question mark', 'Comma'], 'c' => 2],
            ['q' => 'Words that sound the same but have different meanings are called:', 'o' => ['Synonyms', 'Antonyms', 'Homophones', 'Acronyms'], 'c' => 2],
            ['q' => 'Which of these words is a conjunction?', 'o' => ['Quickly', 'And', 'Happy', 'Under'], 'c' => 1],
            ['q' => "What is the main verb in 'They have been working all day'?", 'o' => ['Have', 'Been', 'Working', 'Day'], 'c' => 2],
            ['q' => 'Which word is spelled correctly?', 'o' => ['Recieve', 'Receive', 'Receeve', 'Receve'], 'c' => 1],
            ['q' => 'What do we call the person who tells the story?', 'o' => ['Author', 'Narrator', 'Protagonist', 'Editor'], 'c' => 1],
            ['q' => 'Which of these words is a pronoun?', 'o' => ['Quickly', 'She', 'Under', 'Green'], 'c' => 1],
            ['q' => "What is the term for a word that imitates a sound, like 'buzz'?", 'o' => ['Onomatopoeia', 'Alliteration', 'Metaphor', 'Simile'], 'c' => 0],
        ];
    }
}
