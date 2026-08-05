<?php

namespace Tests\Feature;

use App\Models\Language;
use App\Models\User;
use App\Models\UserCompletedLanguage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_display_name_can_be_updated(): void
    {
        $user = User::factory()->create(['full_name' => 'Old Name']);

        $this->actingAs($user)->patchJson('/api/profile', ['fullName' => 'Mark Test'])
            ->assertOk()
            ->assertJson(['fullName' => 'Mark Test']);

        $this->assertSame('Mark Test', $user->fresh()->full_name);
    }

    public function test_display_name_cannot_be_blank(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->patchJson('/api/profile', ['fullName' => ''])
            ->assertStatus(422);
    }

    public function test_completed_languages_lists_finished_courses(): void
    {
        $user = User::factory()->create();
        $language = Language::create(['code' => 'de', 'name' => 'German', 'native_name' => 'Deutsch', 'flag_emoji' => '🇩🇪']);

        UserCompletedLanguage::create([
            'user_id' => $user->id,
            'language_id' => $language->id,
            'xp_at_completion' => 4200,
            'completed_at' => now(),
        ]);

        $this->actingAs($user)->getJson('/api/profile/completed-languages')
            ->assertOk()
            ->assertJsonPath('completedLanguages.0.code', 'de')
            ->assertJsonPath('completedLanguages.0.xp', 4200);
    }

    public function test_profile_endpoints_require_authentication(): void
    {
        $this->patchJson('/api/profile', ['fullName' => 'X'])->assertUnauthorized();
        $this->getJson('/api/profile/completed-languages')->assertUnauthorized();
    }
}
