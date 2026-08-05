<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Concerns\CreatesCourseContent;
use Tests\TestCase;

class CourseEnrollmentTest extends TestCase
{
    use CreatesCourseContent;
    use RefreshDatabase;

    public function test_selecting_a_course_enrolls_the_user(): void
    {
        $user = User::factory()->create();
        $native = Language::create(['code' => 'en', 'name' => 'English', 'native_name' => 'English', 'flag_emoji' => '🇺🇸']);
        $learning = Language::create(['code' => 'es', 'name' => 'Spanish', 'native_name' => 'Español', 'flag_emoji' => '🇪🇸']);

        $this->actingAs($user)->postJson('/api/course/select', [
            'nativeLanguageId' => $native->id,
            'learningLanguageId' => $learning->id,
        ])->assertOk();

        $this->actingAs($user)->getJson('/api/courses/mine')
            ->assertOk()
            ->assertJsonCount(1, 'courses')
            ->assertJsonPath('courses.0.code', 'es')
            ->assertJsonPath('courses.0.isActive', true);
    }

    public function test_switching_between_two_enrolled_courses(): void
    {
        $user = User::factory()->create();
        $native = Language::create(['code' => 'en', 'name' => 'English', 'native_name' => 'English', 'flag_emoji' => '🇺🇸']);
        $spanish = Language::create(['code' => 'es', 'name' => 'Spanish', 'native_name' => 'Español', 'flag_emoji' => '🇪🇸']);
        $german = Language::create(['code' => 'de', 'name' => 'German', 'native_name' => 'Deutsch', 'flag_emoji' => '🇩🇪']);

        $this->actingAs($user)->postJson('/api/course/select', [
            'nativeLanguageId' => $native->id, 'learningLanguageId' => $spanish->id,
        ]);
        $this->actingAs($user)->postJson('/api/course/select', [
            'nativeLanguageId' => $native->id, 'learningLanguageId' => $german->id,
        ]);

        // Now enrolled in both, German active.
        $this->actingAs($user)->getJson('/api/courses/mine')->assertJsonCount(2, 'courses');
        $this->assertSame($german->id, $user->fresh()->learning_language_id);

        $this->actingAs($user)->postJson('/api/courses/switch', ['languageId' => $spanish->id])
            ->assertOk()
            ->assertJsonPath('learningLanguage.code', 'es');

        $this->assertSame($spanish->id, $user->fresh()->learning_language_id);
    }

    public function test_switching_to_a_course_not_enrolled_in_fails(): void
    {
        $user = User::factory()->create();
        $this->enrollUserInCourse($user);
        $unrelated = Language::create(['code' => 'ja', 'name' => 'Japanese', 'native_name' => '日本語', 'flag_emoji' => '🇯🇵']);

        $this->actingAs($user)->postJson('/api/courses/switch', ['languageId' => $unrelated->id])
            ->assertStatus(422);
    }

    public function test_course_endpoints_require_authentication(): void
    {
        $this->getJson('/api/courses/mine')->assertUnauthorized();
    }
}
