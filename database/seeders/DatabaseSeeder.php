<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Foundational catalog only, in dependency order (languages must exist
     * before alphabets/trivia can attach to them). Each of these is
     * idempotent, so `db:seed` is safe to re-run without `migrate:fresh`.
     * The full per-unit course CONTENT (the 200+ per-language Unit content
     * seeders) is deliberately NOT orchestrated here — it's seeded
     * separately by running those seeders directly.
     */
    public function run(): void
    {
        $this->call([
            NewLanguagesSetupSeeder::class, // Language rows + 5-chapter scaffolding
            AlphabetLettersSeeder::class,   // needs languages
            AvatarOptionsSeeder::class,
            TriviaSeeder::class,            // needs languages
        ]);

        // A convenience login for local development only — never seed a
        // known-credential account into a real environment. firstOrCreate so
        // re-seeding doesn't collide on the unique email.
        if (App::environment('local')) {
            User::firstOrCreate(
                ['email' => 'test@example.com'],
                ['full_name' => 'Test User'],
            );
        }
    }
}
