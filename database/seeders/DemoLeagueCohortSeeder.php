<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserAvatar;
use App\Models\UserGameState;
use App\Models\UserLeague;
use App\Services\LeagueService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Fills a league cohort with stand-in learners, so the leaderboard can be seen
 * at the size it actually reaches in production.
 *
 * A cohort holds 30 (LeagueService::COHORT_SIZE), and a fresh install has one
 * or two real accounts in it — which is not enough to tell whether the podium,
 * the rank chips and the scrolling pack below them hold up. This puts the
 * cohort at capacity with plausible weekly XP so the screen can be judged.
 *
 * Development only. Every account it creates is marked with the email prefix
 * below and given an unusable password, and re-running the seeder clears its
 * previous accounts first, so it is idempotent and leaves nothing behind that
 * cannot be found again:
 *
 *     php artisan db:seed --class=DemoLeagueCohortSeeder
 *
 * To remove them without adding more:
 *
 *     User::where('email', 'like', 'demo-league+%')->delete();
 */
class DemoLeagueCohortSeeder extends Seeder
{
    /** Every account this seeder owns starts with this, and nothing else does. */
    private const EMAIL_PREFIX = 'demo-league+';

    private const NAMES = [
        'Ava Bennett', 'Liam Okafor', 'Sofia Rossi', 'Noah Lindqvist', 'Mia Fernández',
        'Kai Nakamura', 'Elena Petrova', 'Omar Haddad', 'Chloe Dubois', 'Arjun Mehta',
        'Freya Andersen', 'Mateo Silva', 'Yuki Tanaka', 'Nora Haugen', 'Diego Morales',
        'Amara Nwosu', 'Lukas Weber', 'Isla Campbell', 'Ravi Kapoor', 'Zara Ahmed',
        'Tomas Novak', 'Leila Karim', 'Finn O\'Sullivan', 'Hana Kim', 'Gabriel Costa',
        'Ingrid Bauer', 'Samuel Adeyemi', 'Clara Moreau', 'Dmitri Volkov', 'Priya Nair',
    ];

    public function __construct(private LeagueService $leagues) {}

    public function run(): void
    {
        if (app()->environment('production')) {
            $this->command?->warn('DemoLeagueCohortSeeder is a development tool and will not run in production.');

            return;
        }

        // Clear a previous run first, so re-seeding tops the cohort up rather
        // than stacking a second set of thirty on top of the first.
        $removed = User::where('email', 'like', self::EMAIL_PREFIX.'%')->delete();
        if ($removed > 0) {
            $this->command?->info("Removed {$removed} demo learners from a previous run.");
        }

        // Join whichever cohort a real account is already in, so the seeded
        // learners land on the board that account actually sees. Falling back to
        // the lowest tier matches what ensureEnrolled would do for a new user.
        $host = User::whereNotIn('email', [self::EMAIL_PREFIX])
            ->where('email', 'not like', self::EMAIL_PREFIX.'%')
            ->whereHas('gameState')
            ->first();

        if (! $host) {
            $this->command?->error('No real user to build a cohort around. Register an account first.');

            return;
        }

        $league = $this->leagues->ensureEnrolled($host);

        // One short of the cohort size: the host takes the remaining seat.
        $count = LeagueService::COHORT_SIZE - 1;

        foreach (array_slice(self::NAMES, 0, $count) as $index => $name) {
            $user = User::create([
                'full_name' => $name,
                'email' => self::EMAIL_PREFIX.($index + 1).'@languify.test',
                // Never signed in to. A random hash rather than a shared known
                // one, so these are not a set of accounts with a guessable
                // password sitting in a database that might get copied.
                'password' => Hash::make(bin2hex(random_bytes(16))),
                'email_verified_at' => now(),
                'native_language_id' => $host->native_language_id,
                'learning_language_id' => $host->learning_language_id,
            ]);

            // Spread across the range rather than uniform random: a believable
            // board has a couple of runaway leaders, a dense middle, and a tail
            // that has barely started.
            $weeklyXp = (int) round(1400 * (1 - $index / $count) ** 2.2) + random_int(0, 60);

            UserGameState::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'weekly_league_xp' => $weeklyXp,
                    'total_xp' => $weeklyXp * random_int(3, 12),
                    'streak' => random_int(0, 40),
                ],
            );

            // Varied faces, so the avatars in the list are visibly different
            // people rather than thirty copies of the default.
            UserAvatar::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'skin_color' => ['ffdbb4', 'edb98a', 'd08b5b', 'ae5d29', '9e5622', '763900'][$index % 6],
                    'hair' => 'short'.str_pad((string) (($index % 16) + 1), 2, '0', STR_PAD_LEFT),
                    'hair_color' => ['0e0e0e', '3a1f1f', '6c4545', 'a55728', 'd6b370', 'e8e1e1'][$index % 6],
                    'eyes' => 'variant'.str_pad((string) (($index % 26) + 1), 2, '0', STR_PAD_LEFT),
                    'eyebrows' => 'variant'.str_pad((string) (($index % 15) + 1), 2, '0', STR_PAD_LEFT),
                    'mouth' => 'variant'.str_pad((string) (($index % 30) + 1), 2, '0', STR_PAD_LEFT),
                    'background_color' => ['b6e3f4', 'c0aede', 'd1d4f9', 'ffd5dc', 'ffdfbf', 'c8f4de'][$index % 6],
                ],
            );

            UserLeague::create([
                'user_id' => $user->id,
                'league_tier_id' => $league->league_tier_id,
                'league_points' => random_int(0, 40),
                'cohort_group_number' => $league->cohort_group_number,
                'week_start_date' => $league->week_start_date,
            ]);
        }

        $this->command?->info(
            "Seeded {$count} demo learners into tier {$league->league_tier_id}, ".
            "cohort {$league->cohort_group_number}, week {$league->week_start_date->toDateString()}."
        );
    }
}
