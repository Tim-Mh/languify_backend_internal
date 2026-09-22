<?php

namespace Database\Seeders\Support;

use App\Enums\ExerciseType;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Support\Str;

/**
 * Builds a Korean unit as 5 small lessons that ALL follow the same 10-step
 * shape, so a learner always knows what is coming and only the words get
 * harder:
 *
 *   1-2. Pick the picture          6. Fill the gap (short phrase)
 *   3. Write it in your language   7. A longer phrase (read, then build)
 *   4. The short phrase            8. Fill the gap (longer phrase)
 *   5. Build that phrase in Korean  9. Pick the Korean word   10. Listen
 *
 * This is the twin of the other course builders, only the language roles are
 * swapped. Korean is the LEARNING language, so content (words, phrases, tiles)
 * is authored in Korean, and the native languages a learner can take the
 * course in are English, Spanish, German, French and Japanese.
 *
 * Korean is written WITH spaces between 어절, so a phrase's `words` are the
 * space-separated tiles a learner assembles.
 *
 * NOTHING user-facing is hardcoded: every hint, prompt and word tile is stored
 * as an ['i18n' => [...]] map (under the field named `en` the frontend reads),
 * resolved per learner at request time by ExerciseContentService.
 */
class KoreanLessonBuilder
{
    /** Native languages a learner can take a Korean course in. */
    public const LANGS = ['en', 'es', 'de', 'fr', 'ja', 'tr', 'ru', 'ar', 'az'];

    /**
     * @param  array<string, string>  $picturePool  Korean label => image slug,
     *                                              used for wrong picture options.
     */
    public function __construct(private array $picturePool) {}

    /**
     * Write a unit's 5 lessons to the database, replacing whatever was there.
     *
     * @param  array<int, array>  $lessons  from lesson()
     */
    public function seedUnit(int $chapterId, int $orderNumber, string $title, array $lessons): void
    {
        // Keyed on (chapter_id, order_number) so re-seeding RENAMES the unit in
        // place rather than creating a second unit at the same position.
        $unit = Unit::updateOrCreate(
            ['chapter_id' => $chapterId, 'order_number' => $orderNumber],
            ['title' => $title]
        );

        Lesson::where('unit_id', $unit->id)->where('order_number', '>', count($lessons))->delete();

        foreach ($lessons as $lessonDef) {
            $lesson = Lesson::updateOrCreate(
                ['unit_id' => $unit->id, 'order_number' => $lessonDef['order']],
                ['title' => $lessonDef['title']]
            );

            $order = 0;

            foreach ($lessonDef['sessions'] as $sessionIndex => $sessionExercises) {
                foreach ($sessionExercises as $exercise) {
                    $order++;
                    Exercise::updateOrCreate(
                        ['lesson_id' => $lesson->id, 'order_number' => $order],
                        [
                            'type' => $exercise['type'],
                            'data' => $exercise['data'],
                            'session_number' => $sessionIndex + 1,
                        ]
                    );
                }
            }

            Exercise::where('lesson_id', $lesson->id)->where('order_number', '>', $order)->delete();
        }
    }

    /**
     * Which two phrases each session uses, and whether the learner READS it
     * (build the meaning in their own language) or BUILDS it (assemble the
     * Korean). Every session gets a different pair, so replaying a lesson is
     * never the same quiz twice, and the mode shifts from reading toward
     * producing as the sessions go on.
     */
    private const SESSION_PLAN = [
        0 => [['a', 'read'], ['b', 'read']],
        1 => [['a', 'build'], ['b', 'read']],
        2 => [['b', 'build'], ['c', 'read']],
        3 => [['c', 'read'], ['a', 'build']],
        4 => [['c', 'build'], ['b', 'build']],
    ];

    /**
     * Which word each of the four single-word drills asks about, per session.
     * Explicit permutations rather than "session + n": with 4 words and 5
     * sessions, simple rotation wraps around and makes session 5 an exact
     * replay of session 1.
     */
    private const WORD_ROTATION = [
        0 => [0, 1, 2, 3],
        1 => [1, 2, 3, 0],
        2 => [2, 3, 0, 1],
        3 => [3, 0, 1, 2],
        4 => [1, 3, 0, 2],
    ];

    /**
     * @param  array<string, array>  $phrases  keyed 'a' (short), 'b' (carries the
     *                                         lesson's grammar word), 'c' (long).
     */
    public function lesson(string $title, int $order, array $pictures, array $plain, array $phrases): array
    {
        // The lesson's own vocabulary feeds the single-word drills and the
        // distractor tiles, so a placeholder here leaks just as far as one in
        // a sentence. Checked at the door rather than at every use site.
        foreach (array_merge($pictures, $plain) as $word) {
            $this->rejectPlaceholder($word['ko'] ?? '');
        }

        // One session per lesson, to match
        // LessonProgressService::LESSON_TARGET_COMPLETIONS.
        //
        // A lesson used to be built as five progressive sessions, but only
        // the first is ever served now, so building the other four just
        // wrote rows nothing reads. Put this back to 5 to restore them:
        // SESSION_PLAN and WORD_ROTATION still describe all five
        // variations, so no content has to be rewritten to go back.
        $sessions = [];
        for ($session = 0; $session < 1; $session++) {
            $sessions[] = $this->session($session, $pictures, $plain, $phrases);
        }

        return ['title' => $title, 'order' => $order, 'sessions' => $sessions];
    }

    private function session(int $session, array $pictures, array $plain, array $phrases): array
    {
        $words = array_merge($pictures, $plain);
        $count = count($words);
        [$first, $second] = self::SESSION_PLAN[$session];
        $rotation = self::WORD_ROTATION[$session];
        $pick = fn (int $slot) => $words[$rotation[$slot] % $count];

        $render = fn (array $step) => $step[1] === 'read'
            ? $this->phraseToNative($phrases[$step[0]])
            : $this->phraseToKorean($phrases[$step[0]]);

        return [
            $this->pickPicture($pictures[0], $pictures[1]),
            $this->pickPicture($pictures[1], $pictures[0]),
            $this->singleWord($pick(0), $words),
            $render($first),
            $this->fillBlank($phrases[$first[0]], $words),
            $render($second),
            $this->fillBlank($phrases[$second[0]], $words),
            $this->singleWord($pick(1), $words),
            $this->pickKoreanWord($pick(2)),
            $this->listenAndPick($words, $pick(3)),
        ];
    }

    /** Steps 1-2: "Which one of these is X?", Korean options, each a picture. */
    private function pickPicture(array $word, array $sibling): array
    {
        $options = [[$word['ko'], $word['img']], [$sibling['ko'], $sibling['img']]];

        foreach ($this->picturePool as $ko => $img) {
            if (count($options) >= 4) {
                break;
            }
            if (in_array($ko, array_column($options, 0), true)) {
                continue;
            }
            $options[] = [$ko, $img];
        }

        return ['type' => ExerciseType::MatchPairs, 'data' => [
            'word' => $this->nativePrompt($word['ko']),
            'options' => array_map(fn (array $o) => [
                'text' => $o[0],
                'image' => '/images/exercises/'.$o[1].'.svg',
            ], $options),
            'correct_answer' => $word['ko'],
        ]];
    }

    /** Step 3: one Korean word, hover shows its meaning, tap the native tile. */
    private function singleWord(array $word, array $lessonWords): array
    {
        $distractors = [];
        foreach ($lessonWords as $other) {
            if ($other['ko'] === $word['ko']) {
                continue;
            }
            $distractors[] = $other['ko'];
            if (count($distractors) >= 3) {
                break;
            }
        }

        $bank = [];
        $correct = [];
        foreach (self::LANGS as $lang) {
            $answer = $this->meaning($word['ko'], $lang);
            $tiles = [$answer];
            foreach ($distractors as $other) {
                $tiles[] = $this->meaning($other, $lang);
            }
            $bank[$lang] = $tiles;
            $correct[$lang] = [$answer];
        }

        return ['type' => ExerciseType::Translate, 'data' => [
            'prompt_words' => [['text' => $word['ko'], 'en' => KoreanVocabulary::hint($word['ko'])]],
            'word_bank' => ['i18n' => $bank],
            'correct' => ['i18n' => $correct],
        ]];
    }

    /**
     * Steps 4 & 7: read the Korean phrase, build its meaning in your own
     * language.
     *
     * The answer comes from the per-language `correct` array the seeder
     * authors, NOT from glossing the Korean tiles one by one. Glossing tied
     * the English answer to Korean word order, so the moment the Korean was
     * fixed to be verb-final the English came out as "cat table on is". Each
     * language now states its own word order, the way the Japanese course
     * already did.
     */
    private function phraseToNative(array $phrase): array
    {
        $bank = [];
        $correct = [];

        foreach (self::LANGS as $lang) {
            $tr = $phrase['tr'][$lang] ?? $phrase['tr']['en'];
            $correct[$lang] = $tr['correct'];
            $bank[$lang] = array_merge($tr['correct'], $tr['extra'] ?? []);
        }

        return ['type' => ExerciseType::Translate, 'data' => [
            'prompt_words' => $this->koreanWords($phrase),
            'word_bank' => ['i18n' => $bank],
            'correct' => ['i18n' => $correct],
        ]];
    }

    /**
     * Build the phrase in Korean (production). The learner is TOLD what to
     * say, in their own language, without which they can only guess the
     * intended sentence from the individual word hints, which misleads whenever
     * the two languages order words differently.
     */
    private function phraseToKorean(array $phrase): array
    {
        $translation = [];
        foreach (self::LANGS as $lang) {
            $translation[$lang] = ($phrase['tr'][$lang] ?? $phrase['tr']['en'])['sentence'];
        }

        return ['type' => ExerciseType::TapWord, 'data' => [
            'target_sentence' => implode(' ', $phrase['words']),
            'sentence_translation' => ['i18n' => $translation],
            'words' => $this->koreanWords($phrase),
            'correct_order' => $phrase['words'],
        ]];
    }

    /** Steps 6 & 8: a Korean phrase with one word missing. */
    private function fillBlank(array $phrase, array $lessonWords): array
    {
        $index = $phrase['blank'];
        $answer = $phrase['words'][$index];

        $sentence = implode(' ', array_map(
            fn (string $word, int $i) => $i === $index ? '____' : $word,
            $phrase['words'],
            array_keys($phrase['words']),
        ));

        $translation = [];
        foreach (self::LANGS as $lang) {
            $translation[$lang] = ($phrase['tr'][$lang] ?? $phrase['tr']['en'])['sentence'];
        }

        // Wrong answers: this lesson's own words first, then the wider
        // dictionary. Anything overlapping the answer is skipped so only one
        // option can be right.
        $candidates = array_merge(array_column($lessonWords, 'ko'), KoreanVocabulary::all());
        $options = [];
        foreach ($candidates as $candidate) {
            if (str_contains($candidate, $answer) || str_contains($answer, $candidate)) {
                continue;
            }
            if (in_array($candidate, array_column($options, 0), true)) {
                continue;
            }
            $options[] = [$candidate, KoreanVocabulary::hint($candidate)];
            if (count($options) >= 3) {
                break;
            }
        }
        $options[] = [$answer, KoreanVocabulary::hint($answer)];

        return ['type' => ExerciseType::FillBlank, 'data' => [
            'sentence' => $sentence,
            'sentence_translation' => ['i18n' => $translation],
            'options' => array_map(fn (array $o) => ['text' => $o[0], 'en' => $o[1]], $options),
            'correct_answer' => $answer,
        ]];
    }

    /** Step 9: your language shown, pick the matching Korean word. */
    private function pickKoreanWord(array $word): array
    {
        $correct = $word['ko'];
        $options = [$correct];

        foreach (KoreanVocabulary::all() as $candidate) {
            if (count($options) >= 4) {
                break;
            }
            if (str_contains($candidate, $correct) || str_contains($correct, $candidate)) {
                continue;
            }
            if (in_array($candidate, $options, true)) {
                continue;
            }
            $options[] = $candidate;
        }

        return ['type' => ExerciseType::MultipleChoice, 'data' => [
            'word' => $this->nativePrompt($word['ko']),
            'options' => $options,
            'correct_answer' => $correct,
        ]];
    }

    /** Step 10: hear the Korean, pick it from Korean options. */
    private function listenAndPick(array $words, array $word): array
    {
        $options = [[$word['ko'], KoreanVocabulary::hint($word['ko'])]];
        $seen = [$word['ko'] => true];

        foreach ($words as $other) {
            // Guard on the surface form rather than on the entry: a unit can
            // introduce the same word twice, and adding it again would show the
            // learner two identical tiles to choose between.
            if (isset($seen[$other['ko']])) {
                continue;
            }
            $seen[$other['ko']] = true;
            $options[] = [$other['ko'], KoreanVocabulary::hint($other['ko'])];
            if (count($options) >= 4) {
                break;
            }
        }

        return ['type' => ExerciseType::ListenSelect, 'data' => [
            'audio_text' => $word['ko'],
            'audio_url' => '/audio/exercises/'.Str::slug($word['ko']).'.mp3',
            'options' => array_map(fn (array $o) => ['text' => $o[0], 'en' => $o[1]], $options),
            'correct_answer' => $word['ko'],
        ]];
    }

    /** The phrase's Korean tiles, each carrying its native-language hint. */
    private function koreanWords(array $phrase): array
    {
        return array_map(
            function (string $word) {
                $this->rejectPlaceholder($word);

                return ['text' => $word, 'en' => KoreanVocabulary::hint($word)];
            },
            $phrase['words'],
        );
    }

    /**
     * A word the learner sees has to be something they could actually write.
     * ~ marks the slot a noun goes into: it belongs in a hint, never in a
     * tile. Learners were being asked to place a tile reading "~위에".
     */
    private function rejectPlaceholder(string $word): void
    {
        if (str_contains($word, '~') || str_contains($word, '～')) {
            throw new \LogicException(
                "Korean word \"{$word}\" is a gloss template, not a word. ".
                'Attach the particle to its noun and put the placeholder in the hint.'
            );
        }
    }

    /** A Korean word's meaning in one language (falls back to the word). */
    private function meaning(string $korean, string $lang): string
    {
        $meanings = KoreanVocabulary::meanings($korean);

        return $meanings[$lang] ?? $korean;
    }

    /** A Korean word's meaning in every language, capitalised, as a prompt. */
    private function nativePrompt(string $korean): array
    {
        $prompts = [];
        foreach (KoreanVocabulary::meanings($korean) as $lang => $text) {
            $prompts[$lang] = mb_strtoupper(mb_substr($text, 0, 1)).mb_substr($text, 1);
        }

        return ['i18n' => $prompts];
    }
}
