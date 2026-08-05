<?php

namespace Tests\Feature;

use App\Models\AlphabetLetter;
use App\Models\Language;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlphabetTest extends TestCase
{
    use RefreshDatabase;

    public function test_alphabet_requires_course_selected(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->getJson('/api/course/alphabet')->assertStatus(422);
    }

    public function test_alphabet_returns_letters_ordered_for_the_selected_language_only(): void
    {
        $spanish = Language::create(['code' => 'es', 'name' => 'Spanish', 'native_name' => 'Español', 'flag_emoji' => '🇪🇸']);
        $german = Language::create(['code' => 'de', 'name' => 'German', 'native_name' => 'Deutsch', 'flag_emoji' => '🇩🇪']);

        AlphabetLetter::create(['language_id' => $spanish->id, 'character' => 'B', 'order_number' => 2]);
        AlphabetLetter::create(['language_id' => $spanish->id, 'character' => 'A', 'order_number' => 1]);
        AlphabetLetter::create(['language_id' => $german->id, 'character' => 'Z', 'order_number' => 1]);

        $user = User::factory()->create();
        $user->forceFill(['learning_language_id' => $spanish->id])->save();

        $response = $this->actingAs($user)->getJson('/api/course/alphabet')->assertOk();

        $response->assertJsonPath('language.code', 'es')
            ->assertJsonCount(2, 'letters')
            ->assertJsonPath('letters.0.character', 'A')
            ->assertJsonPath('letters.1.character', 'B');
    }
}
