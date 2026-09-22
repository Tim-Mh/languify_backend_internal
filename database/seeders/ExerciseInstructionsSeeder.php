<?php

namespace Database\Seeders;

use App\Enums\ExerciseType;
use App\Models\ExerciseInstruction;
use App\Models\Language;
use Illuminate\Database\Seeder;

/**
 * What each exercise asks the learner to do, in the learner's own language.
 *
 * WHY THIS EXISTS
 *
 * `exercise_instructions` was empty. Every row is keyed by (exercise type,
 * native language), and with none of them present `Exercise::resolveInstruction()`
 * returned null for every exercise, so the API sent `instruction: null` and both
 * clients fell back to a hardcoded English string. A learner studying English
 * with Arabic as their native language therefore met an English instruction on
 * every single exercise, which is exactly the half of the product that is meant
 * to be in their own language.
 *
 * This is the one part of exercise content that IS translated per native
 * language. The words and sentences deliberately are not: they are authored once
 * in the language being learned, which is what stops a ten-language catalogue
 * turning into a ninety-pair one.
 *
 * NO PLACEHOLDERS, DELIBERATELY
 *
 * The template syntax supports `{word}`, interpolated from the exercise's raw
 * `data`. That is a trap here: on this catalogue `data['word']` holds the i18n
 * MAP rather than a string, so `{word}` would interpolate to "Array" in front of
 * the learner. Instructions that name no field cannot misfire, and an exercise
 * already shows the word it is asking about.
 *
 * Idempotent, keyed on (exercise_type, language_id), so re-running updates the
 * wording rather than duplicating it.
 */
class ExerciseInstructionsSeeder extends Seeder
{
    /**
     * Keyed by exercise type, then by language code.
     *
     * Written as instructions rather than labels: "Listen and choose what you
     * hear" tells a learner what to do, where "Listen and select" names the
     * exercise for whoever built it.
     */
    private const INSTRUCTIONS = [
        'match_pairs' => [
            'en' => 'Choose the correct picture',
            'fr' => 'Choisissez la bonne image',
            'es' => 'Elige la imagen correcta',
            'de' => 'Wähle das richtige Bild',
            'ja' => '正しい絵を選びましょう',
            'ko' => '알맞은 그림을 고르세요',
            'tr' => 'Doğru resmi seç',
            'ru' => 'Выберите правильную картинку',
            'ar' => 'اختر الصورة الصحيحة',
            'az' => 'Düzgün şəkli seç',
        ],
        'multiple_choice' => [
            'en' => 'Choose the correct answer',
            'fr' => 'Choisissez la bonne réponse',
            'es' => 'Elige la respuesta correcta',
            'de' => 'Wähle die richtige Antwort',
            'ja' => '正しい答えを選びましょう',
            'ko' => '정답을 고르세요',
            'tr' => 'Doğru cevabı seç',
            'ru' => 'Выберите правильный ответ',
            'ar' => 'اختر الإجابة الصحيحة',
            'az' => 'Düzgün cavabı seç',
        ],
        'fill_blank' => [
            'en' => 'Fill in the blank',
            'fr' => 'Complétez la phrase',
            'es' => 'Completa la frase',
            'de' => 'Fülle die Lücke',
            'ja' => '空欄を埋めましょう',
            'ko' => '빈칸을 채우세요',
            'tr' => 'Boşluğu doldur',
            'ru' => 'Заполните пропуск',
            'ar' => 'أكمل الفراغ',
            'az' => 'Boşluğu doldur',
        ],
        'tap_word' => [
            'en' => 'Build the sentence',
            'fr' => 'Construisez la phrase',
            'es' => 'Construye la frase',
            'de' => 'Bilde den Satz',
            'ja' => '文を組み立てましょう',
            'ko' => '문장을 완성하세요',
            'tr' => 'Cümleyi oluştur',
            'ru' => 'Составьте предложение',
            'ar' => 'كوّن الجملة',
            'az' => 'Cümləni qur',
        ],
        'listen_select' => [
            'en' => 'Listen and choose what you hear',
            'fr' => 'Écoutez et choisissez ce que vous entendez',
            'es' => 'Escucha y elige lo que oyes',
            'de' => 'Höre zu und wähle, was du hörst',
            'ja' => '聞こえたものを選びましょう',
            'ko' => '듣고 들리는 것을 고르세요',
            'tr' => 'Dinle ve duyduğunu seç',
            'ru' => 'Послушайте и выберите то, что услышали',
            'ar' => 'استمع واختر ما تسمعه',
            'az' => 'Dinlə və eşitdiyini seç',
        ],
        'translate' => [
            'en' => 'Translate this sentence',
            'fr' => 'Traduisez cette phrase',
            'es' => 'Traduce esta frase',
            'de' => 'Übersetze diesen Satz',
            'ja' => 'この文を訳しましょう',
            'ko' => '이 문장을 번역하세요',
            'tr' => 'Bu cümleyi çevir',
            'ru' => 'Переведите это предложение',
            'ar' => 'ترجم هذه الجملة',
            'az' => 'Bu cümləni tərcümə et',
        ],
        'paragraph_translation' => [
            'en' => 'Translate the paragraph',
            'fr' => 'Traduisez le paragraphe',
            'es' => 'Traduce el párrafo',
            'de' => 'Übersetze den Absatz',
            'ja' => '段落を訳しましょう',
            'ko' => '문단을 번역하세요',
            'tr' => 'Paragrafı çevir',
            'ru' => 'Переведите абзац',
            'ar' => 'ترجم الفقرة',
            'az' => 'Abzası tərcümə et',
        ],
    ];

    public function run(): void
    {
        $languages = Language::pluck('id', 'code');

        foreach (self::INSTRUCTIONS as $type => $byLanguage) {
            $exerciseType = ExerciseType::from($type);

            foreach ($byLanguage as $code => $template) {
                $languageId = $languages[$code] ?? null;

                if ($languageId === null) {
                    continue;
                }

                ExerciseInstruction::updateOrCreate(
                    ['exercise_type' => $exerciseType, 'language_id' => $languageId],
                    // No fallback template: these name no field, so the primary
                    // can never be unsatisfiable and a second copy of the same
                    // sentence would only be one more thing to keep translated.
                    ['template' => $template, 'fallback_template' => null],
                );
            }
        }
    }
}
