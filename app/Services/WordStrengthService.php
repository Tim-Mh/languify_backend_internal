<?php

namespace App\Services;

use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserWordStrength;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Adaptive practice engine. Tracks how well a learner knows each individual
 * course-language word (a 0-100 "strength" plus a spaced-repetition due date)
 * and, from that, assembles a "practice your weak words" session out of a
 * lesson's existing exercises — the ones testing the words the learner keeps
 * missing surface first.
 *
 * Currently wired up only for French Lesson 1, but nothing here is
 * lesson-specific: it works for any lesson whose exercises carry vocabulary.
 */
class WordStrengthService
{
    private const MAX_STRENGTH = 100;

    private const CORRECT_GAIN = 20;

    private const WRONG_PENALTY = 25;

    // Memory-decay model (Duolingo-style Half-Life Regression, simplified):
    // recall probability = 2^(-elapsed_minutes / half_life_minutes). A correct
    // answer multiplies the half-life (you remember it longer); a wrong answer
    // collapses it to LAPSE (it comes back almost immediately). Because recall
    // decays with real time, a mastered word resurfaces on its own.
    private const BASE_HALF_LIFE_MINUTES = 240;      // ~4h after the first correct

    private const HALF_LIFE_GROWTH = 2.5;            // each further correct

    private const MAX_HALF_LIFE_MINUTES = 86400;     // cap at ~60 days

    private const LAPSE_HALF_LIFE_MINUTES = 10;      // after a wrong answer

    // Recall assigned to an exercise that tests no trackable vocabulary (e.g.
    // an image-only match), so it sits between weak and mastered words when
    // picking a practice set — available, but not prioritized.
    private const NEUTRAL_RECALL = 0.5;

    // A word keeps its hint until predicted recall reaches this. Above it, the
    // learner has proven they remember it and the scaffolding can fade.
    private const RETENTION_THRESHOLD = 0.7;

    /**
     * The course-language vocabulary tokens an exercise tests (lowercased,
     * de-duplicated) — the same hoverable words the learner sees hints for.
     * Answering the exercise moves the strength of exactly these words.
     *
     * @return array<int, string>
     */
    public function tokensForData(array $data, string $type): array
    {
        $tokens = [];

        if ($type === 'translate') {
            foreach ($data['prompt_words'] ?? [] as $word) {
                $tokens[] = mb_strtolower($word['text']);
            }
        } elseif ($type === 'tap_word') {
            foreach ($data['words'] ?? [] as $word) {
                if (isset($word['en'])) {
                    $tokens[] = mb_strtolower($word['text']);
                }
            }
        } elseif (($type === 'multiple_choice' || $type === 'match_pairs') && ! empty($data['word_translation'])) {
            $tokens[] = mb_strtolower($data['word']);
        } elseif ($type === 'fill_blank' || $type === 'listen_select') {
            foreach ($data['options'] ?? [] as $option) {
                if (isset($option['en'])) {
                    $tokens[] = mb_strtolower($option['text']);
                }
            }
        }

        return array_values(array_unique($tokens));
    }

    /**
     * @return array<int, string>
     */
    public function tokensFor(Exercise $exercise): array
    {
        return $this->tokensForData($exercise->data, $exercise->type->value);
    }

    /**
     * The tokens an answer actually PROVES — used for recall credit, unlike
     * tokensForData() (every hoverable word, used for hints). For option-based
     * types only the correct answer counts, never the distractors, so getting a
     * listen/choice question right doesn't inflate recall of the wrong options.
     *
     * @return array<int, string>
     */
    public function testedTokensForData(array $data, string $type): array
    {
        return match ($type) {
            'translate' => array_values(array_unique(array_map(
                fn (array $w) => mb_strtolower($w['text']),
                $data['prompt_words'] ?? [],
            ))),
            'tap_word' => array_values(array_unique(array_map(
                fn (array $w) => mb_strtolower($w['text']),
                array_filter($data['words'] ?? [], fn (array $w) => isset($w['en'])),
            ))),
            'multiple_choice', 'match_pairs' => ! empty($data['word_translation'])
                ? [mb_strtolower($data['word'])]
                : (isset($data['correct_answer']) ? [mb_strtolower((string) $data['correct_answer'])] : []),
            'fill_blank', 'listen_select' => isset($data['correct_answer'])
                ? [mb_strtolower((string) $data['correct_answer'])]
                : [],
            default => [],
        };
    }

    /**
     * @return array<int, string>
     */
    public function testedTokensFor(Exercise $exercise): array
    {
        return $this->testedTokensForData($exercise->data, $exercise->type->value);
    }

    /**
     * Of the given course-language tokens, the subset the learner has NOT yet
     * retained — never practiced, or predicted recall below the retention
     * threshold. Used to keep a word's hint on until it's genuinely learned,
     * instead of removing help at a fixed session boundary.
     *
     * @param  array<int, string>  $tokens
     * @return array<string, true>
     */
    public function unretainedTokens(User $user, array $tokens): array
    {
        $tokens = array_values(array_unique(array_map('mb_strtolower', $tokens)));

        if ($tokens === []) {
            return [];
        }

        // No course selected yet — nothing is "retained", so hint everything.
        if (! $user->learning_language_id) {
            return array_fill_keys($tokens, true);
        }

        $rows = UserWordStrength::where('user_id', $user->id)
            ->where('language_id', $user->learning_language_id)
            ->whereIn('word', $tokens)
            ->get()
            ->keyBy('word');

        $now = Carbon::now();
        $weak = [];

        foreach ($tokens as $token) {
            $row = $rows->get($token);

            if ($row === null || $this->recallProbability($row, $now) < self::RETENTION_THRESHOLD) {
                $weak[$token] = true;
            }
        }

        return $weak;
    }

    /**
     * Record one answer, moving the strength of every vocabulary word the
     * exercise tests. Correct raises strength and pushes the word's next review
     * out; wrong drops it and brings the word back soon. Called on every answer
     * in both normal lessons and practice, so normal play seeds the data the
     * practice picker later reads.
     */
    public function recordAttempt(User $user, Exercise $exercise, bool $correct): void
    {
        $languageId = $user->learning_language_id;

        if (! $languageId) {
            return;
        }

        $now = Carbon::now();

        foreach ($this->testedTokensFor($exercise) as $word) {
            $row = UserWordStrength::firstOrNew([
                'user_id' => $user->id,
                'language_id' => $languageId,
                'word' => $word,
            ]);

            $row->times_seen = ($row->times_seen ?? 0) + 1;
            $row->last_seen_at = $now;

            if ($correct) {
                $row->times_correct = ($row->times_correct ?? 0) + 1;
                $row->consecutive_correct = ($row->consecutive_correct ?? 0) + 1;
                $row->strength = min(self::MAX_STRENGTH, ($row->strength ?? 0) + self::CORRECT_GAIN);

                // Lengthen the half-life: grow the current one, or start from
                // the base if this is the word's first correct answer.
                $current = $row->half_life_minutes ?? self::BASE_HALF_LIFE_MINUTES;
                $row->half_life_minutes = (int) min(self::MAX_HALF_LIFE_MINUTES, round($current * self::HALF_LIFE_GROWTH));
            } else {
                $row->consecutive_correct = 0;
                $row->strength = max(0, ($row->strength ?? 0) - self::WRONG_PENALTY);
                $row->half_life_minutes = self::LAPSE_HALF_LIFE_MINUTES;
            }

            // due_at is when recall is predicted to fall to 50% (= one half-life
            // out), kept for indexing/inspection; ranking uses live recall.
            $row->due_at = $now->copy()->addMinutes($row->half_life_minutes);
            $row->save();
        }
    }

    /**
     * Predicted probability the learner still recalls this word right now, per
     * the half-life model: p = 2^(-elapsed / half_life). 1.0 immediately after
     * a correct answer, decaying toward 0 as time passes.
     */
    private function recallProbability(UserWordStrength $row, Carbon $now): float
    {
        if ($row->last_seen_at === null) {
            return 0.0;
        }

        $halfLife = $row->half_life_minutes ?: self::LAPSE_HALF_LIFE_MINUTES;
        $elapsed = max(0.0, $row->last_seen_at->diffInMinutes($now));

        return 2 ** (-$elapsed / $halfLife);
    }

    /**
     * Build a practice session for a lesson: the exercises testing the
     * learner's weakest / most-overdue words, weakest first. A word never seen
     * counts as maximally weak, so a fresh learner still gets a full sample and
     * a word they keep missing surfaces ahead of ones they've mastered.
     *
     * @return Collection<int, Exercise>
     */
    public function practiceExercisesForLesson(User $user, Lesson $lesson, int $limit = 8): Collection
    {
        $exercises = $lesson->exercises()
            ->orderBy('session_number')
            ->orderBy('order_number')
            ->get();

        if ($exercises->isEmpty()) {
            return $exercises;
        }

        $rows = UserWordStrength::where('user_id', $user->id)
            ->where('language_id', $user->learning_language_id)
            ->get()
            ->keyBy('word');

        $now = Carbon::now();

        return $exercises
            ->sortBy(fn (Exercise $exercise) => $this->practiceRecall($exercise, $rows, $now))
            ->take($limit)
            ->values();
    }

    /**
     * The lowest current recall probability among an exercise's tested words
     * (lower = more urgent to practice). Token-less exercises get a neutral
     * value; a never-practiced word scores 0 (maximally weak). Because recall
     * decays with real elapsed time, a word mastered long ago naturally sinks
     * back to the top of the practice queue.
     *
     * @param  Collection<string, UserWordStrength>  $rows
     */
    private function practiceRecall(Exercise $exercise, Collection $rows, Carbon $now): float
    {
        $tokens = $this->tokensFor($exercise);

        if ($tokens === []) {
            return self::NEUTRAL_RECALL;
        }

        $recalls = array_map(function (string $word) use ($rows, $now) {
            $row = $rows->get($word);

            return $row === null ? 0.0 : $this->recallProbability($row, $now);
        }, $tokens);

        return min($recalls);
    }
}
