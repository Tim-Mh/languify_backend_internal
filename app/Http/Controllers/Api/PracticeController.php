<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\ExerciseInstruction;
use App\Models\Lesson;
use App\Services\WordStrengthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function __construct(private WordStrengthService $words) {}

    /**
     * Record one answer so the app learns which words the user knows. Called on
     * every answer in both normal lessons and practice sessions.
     */
    public function recordAttempt(Request $request, Exercise $exercise): JsonResponse
    {
        $validated = $request->validate(['correct' => ['required', 'boolean']]);

        $this->authorizeExerciseAccess($request, $exercise);

        $this->words->recordAttempt($request->user(), $exercise, (bool) $validated['correct']);

        return response()->json(['recorded' => true]);
    }

    /**
     * A "practice your weak words" session for a lesson: the same response
     * shape as the normal exercises endpoint, but the exercise set is chosen
     * adaptively from the words the learner is weakest on (and every word's
     * hint is left on, since this is remediation). Does not advance lesson
     * mastery or sessions — it's pure practice.
     */
    public function lesson(Request $request, Lesson $lesson): JsonResponse
    {
        $user = $request->user();
        $lesson->load('unit.chapter');
        $this->authorizeLessonAccess($request, $lesson);

        $exercises = $this->words->practiceExercisesForLesson($user, $lesson);

        $instructionsByType = ExerciseInstruction::where('language_id', $user->native_language_id)
            ->get()
            ->keyBy(fn (ExerciseInstruction $instruction) => $instruction->exercise_type->value);

        return response()->json([
            'lesson' => [
                'id' => $lesson->id,
                'title' => $lesson->title,
            ],
            'practice' => true,
            'exercises' => $exercises->map(fn (Exercise $exercise) => [
                'id' => $exercise->id,
                'type' => $exercise->type->value,
                'instruction' => $exercise->resolveInstruction($instructionsByType->get($exercise->type->value)),
                'data' => $exercise->data,
                'orderNumber' => $exercise->order_number,
            ]),
        ]);
    }

    private function authorizeExerciseAccess(Request $request, Exercise $exercise): void
    {
        $exercise->loadMissing('lesson.unit.chapter');
        $this->authorizeLessonAccess($request, $exercise->lesson);
    }

    private function authorizeLessonAccess(Request $request, Lesson $lesson): void
    {
        $user = $request->user();

        if (! $user->learning_language_id) {
            abort(422, 'Please select a course first.');
        }

        $lesson->loadMissing('unit.chapter');

        if ($lesson->unit->chapter->language_id !== $user->learning_language_id) {
            abort(403, 'This content does not belong to your selected course.');
        }
    }
}
