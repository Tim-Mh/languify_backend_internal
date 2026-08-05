<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Language;
use App\Models\UserCourse;
use App\Services\LessonProgressService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OA;

class CourseEnrollmentController extends Controller
{
    public function __construct(private LessonProgressService $progress) {}

    #[OA\Get(
        path: '/api/courses/mine',
        summary: 'List every language the user has ever enrolled in',
        description: 'Includes per-course chapter completion progress. One course is marked active at a time.',
        tags: ['Course Enrollment'],
        security: [['cookieAuth' => []]],
        responses: [new OA\Response(response: 200, description: 'Enrolled courses')],
    )]
    public function mine(Request $request): JsonResponse
    {
        $user = $request->user();

        $courses = UserCourse::where('user_id', $user->id)
            ->with('language', 'nativeLanguage')
            ->orderByDesc('is_active')
            ->orderByDesc('enrolled_at')
            ->get();

        return response()->json([
            'courses' => $courses->map(function (UserCourse $course) use ($user) {
                $chapters = Chapter::where('language_id', $course->language_id)->get(['id']);
                $completedCount = $chapters->filter(
                    fn ($chapter) => $this->progress->isChapterComplete($user, $chapter->id)
                )->count();

                return [
                    'id' => $course->id,
                    'languageId' => $course->language_id,
                    'code' => $course->language->code,
                    'name' => $course->language->name,
                    'flagEmoji' => $course->language->flag_emoji,
                    'nativeLanguageId' => $course->native_language_id,
                    'nativeLanguageName' => $course->nativeLanguage?->name,
                    'nativeLanguageCode' => $course->nativeLanguage?->code,
                    'nativeLanguageFlagEmoji' => $course->nativeLanguage?->flag_emoji,
                    'proficiencyLevel' => $course->proficiency_level,
                    'isActive' => $course->is_active,
                    'enrolledAt' => $course->enrolled_at,
                    'chaptersCompleted' => $completedCount,
                    'chaptersTotal' => $chapters->count(),
                ];
            }),
        ]);
    }

    #[OA\Post(
        path: '/api/courses/switch',
        summary: 'Switch the active course to a language the user is already enrolled in',
        description: 'Also syncs users.learning_language_id and users.native_language_id (each course remembers its own native-language pairing) so every other endpoint, including the UI language, follows the newly active course.',
        tags: ['Course Enrollment'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['languageId'],
            properties: [new OA\Property(property: 'languageId', type: 'integer', example: 7)],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Course switched successfully'),
            new OA\Response(response: 422, description: 'Not enrolled in that language'),
        ],
    )]
    public function switchCourse(Request $request): JsonResponse
    {
        // Accept a specific course id (a language can now have more than one
        // enrolment, one per native language). Falls back to languageId for
        // older clients — picks that language's most recent course.
        $data = $request->validate([
            'courseId' => ['sometimes', 'integer'],
            'languageId' => ['sometimes', 'integer', 'exists:languages,id'],
        ]);

        $user = $request->user();

        $query = UserCourse::where('user_id', $user->id);
        if (isset($data['courseId'])) {
            $query->where('id', $data['courseId']);
        } elseif (isset($data['languageId'])) {
            $query->where('language_id', $data['languageId'])->orderByDesc('enrolled_at');
        } else {
            return response()->json(['message' => 'A course id is required.'], 422);
        }

        $course = $query->first();

        if (! $course) {
            return response()->json(['message' => 'You are not enrolled in that course.'], 422);
        }

        DB::transaction(function () use ($user, $course) {
            UserCourse::where('user_id', $user->id)->update(['is_active' => false]);
            $course->forceFill(['is_active' => true])->save();

            $user->forceFill([
                'learning_language_id' => $course->language_id,
                'native_language_id' => $course->native_language_id ?? $user->native_language_id,
                'proficiency_level' => $course->proficiency_level ?? $user->proficiency_level,
            ])->save();
        });

        $user->refresh()->load('nativeLanguage', 'learningLanguage');

        return response()->json([
            'message' => 'Course switched successfully',
            'nativeLanguage' => $this->formatLanguage($user->nativeLanguage),
            'learningLanguage' => $this->formatLanguage($user->learningLanguage),
        ]);
    }

    #[OA\Delete(
        path: '/api/courses/{course}',
        summary: 'Remove a course from the learner\'s list',
        description: 'Deletes the ENROLMENT only. Every lesson and unit completion is keyed by the language PAIR '
            .'(learner, lesson, native language) rather than by the enrolment row, so none of it is touched. '
            .'Re-adding the same pair later picks the learner up exactly where they stopped instead of restarting '
            .'from zero. Removing a different pairing of the same language, say English to French after studying '
            .'German to French, is therefore a separate course with its own progress, and deleting one never '
            .'affects the other. If the deleted course was the active one, the most recent remaining course takes '
            .'over; if none remain, the learner is sent back to course selection.',
        tags: ['Course Enrollment'],
        security: [['cookieAuth' => []]],
        parameters: [new OA\PathParameter(name: 'course', description: 'Enrolment id', schema: new OA\Schema(type: 'integer'))],
        responses: [
            new OA\Response(response: 200, description: 'Course removed'),
            new OA\Response(response: 403, description: 'That course belongs to someone else'),
        ],
    )]
    public function destroy(Request $request, UserCourse $course): JsonResponse
    {
        $user = $request->user();

        abort_if($course->user_id !== $user->id, 403, 'That course does not belong to you.');

        $activated = DB::transaction(function () use ($user, $course) {
            $wasActive = (bool) $course->is_active;

            // Only the enrolment row goes. user_lesson_completions and
            // user_unit_completions are deliberately left alone: they are the
            // learner's progress, and they are what makes re-adding this pair
            // resume rather than restart.
            $course->delete();

            if (! $wasActive) {
                return null;
            }

            $next = UserCourse::where('user_id', $user->id)
                ->orderByDesc('enrolled_at')
                ->orderByDesc('id')
                ->first();

            if (! $next) {
                // Nothing left to study. Clearing the learning language sends
                // them back through course selection. The native language is
                // kept, since it drives the interface language and there is no
                // reason to reset that too.
                $user->forceFill(['learning_language_id' => null])->save();

                return null;
            }

            $next->forceFill(['is_active' => true])->save();

            $user->forceFill([
                'learning_language_id' => $next->language_id,
                'native_language_id' => $next->native_language_id ?? $user->native_language_id,
                'proficiency_level' => $next->proficiency_level ?? $user->proficiency_level,
            ])->save();

            return $next;
        });

        $user->refresh()->load('nativeLanguage', 'learningLanguage');

        return response()->json([
            'message' => 'Course removed. Your progress is saved if you add it again.',
            'activeCourseId' => $activated?->id,
            'hasCourse' => $user->learning_language_id !== null,
            'nativeLanguage' => $this->formatLanguage($user->nativeLanguage),
            'learningLanguage' => $this->formatLanguage($user->learningLanguage),
        ]);
    }

    private function formatLanguage(?Language $language): ?array
    {
        if (! $language) {
            return null;
        }

        return [
            'id' => $language->id,
            'code' => $language->code,
            'name' => $language->name,
            'nativeName' => $language->native_name,
            'flagEmoji' => $language->flag_emoji,
        ];
    }
}
