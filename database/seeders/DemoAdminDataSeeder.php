<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Fills the admin panel with stand-in learners and everything they would
 * leave behind (lessons played, streaks, gem purchases, subscriptions and
 * renewals, a family plan, chest claims, badges, ad views and clicks, contact
 * messages), so every admin page can be judged with realistic numbers.
 *
 * It only ADDS learner activity. Languages, courses, exercises and the
 * reward/price catalog are read, never changed.
 *
 * Development only. Every account starts with the email prefix below, has an
 * unusable password, and is written with the query builder so no mail, push
 * or webhook fires. Re-running clears the previous run first:
 *
 *     php artisan db:seed --class=DemoAdminDataSeeder
 *
 * To remove it all without adding more:
 *
 *     DEMO_DATA=remove php artisan db:seed --class=DemoAdminDataSeeder
 */
class DemoAdminDataSeeder extends Seeder
{
    /** Every account and message this seeder owns starts with this. */
    private const EMAIL_PREFIX = 'demo-admin+';

    private const LEARNERS = 60;

    private const NAMES = [
        'Ayesha Khan', 'Bilal Ahmed', 'Sara Malik', 'Usman Tariq', 'Hina Raza', 'Hamza Iqbal', 'Zainab Ali', 'Fahad Sheikh',
        'Mariam Qureshi', 'Ali Hassan', 'Noor Fatima', 'Omar Farooq', 'Emma Wilson', 'Lucas Martin', 'Sofia Garcia', 'Yuki Sato',
        'Min-jun Park', 'Lena Schmidt', 'Pierre Laurent', 'Elif Yilmaz', 'Ivan Petrov', 'Layla Haddad', 'Rustam Aliyev', 'Carlos Ruiz',
        'Aiko Tanaka', 'Hannah Becker', 'Mehmet Kaya', 'Nadia Rahman', 'Tom Baker', 'Chloe Martin', 'Daniel Kim', 'Fatima Zahra',
        'Ahmed Mansoor', 'Isabella Rossi', 'Leo Fischer', 'Mia Johnson', 'Kenji Watanabe', 'Anya Ivanova', 'Youssef Amin', 'Grace Lee',
        'Saad Javed', 'Iqra Nawaz', 'Hassan Raza', 'Amna Siddiqui', 'Rohan Mehta', 'Priya Sharma', 'Jack Thompson', 'Olivia Brown',
        'Mateo Lopez', 'Camille Dubois', 'Jonas Weber', 'Selin Demir', 'Dmitri Volkov', 'Rania Saleh', 'Kamran Mirza', 'Sana Butt',
        'Ethan Clark', 'Lucia Fernandez', 'Haruto Suzuki', 'Zoya Ansari',
    ];

    private const TIMEZONES = [
        'Asia/Karachi', 'Asia/Karachi', 'Asia/Karachi', 'Asia/Dubai', 'Asia/Kolkata', 'Europe/London', 'Europe/Berlin',
        'Europe/Paris', 'America/New_York', 'America/Chicago', 'America/Sao_Paulo', 'Asia/Tokyo', 'Asia/Seoul',
        'Europe/Istanbul', 'Europe/Moscow', 'Africa/Cairo', 'Asia/Baku', 'Australia/Sydney',
    ];

    private const MESSAGES = [
        'The audio on some Japanese words is too quiet. Could you make it louder?',
        'I bought the Adventure Pack but the gems took a minute to show up. All fine now, just letting you know.',
        'Please add Italian! I would pay for a yearly plan straight away.',
        'How do I cancel auto-renew on my monthly plan? I could not find it on my phone.',
        'Love the app, my streak is 40 days now. The elephant is adorable.',
        'One of the restaurant lessons marked my answer wrong even though it was right ("une table pour deux").',
        'Can I share my family plan with my parents in another country?',
        'The app logged me out after the update and my password reset email went to spam.',
    ];

    public function run(): void
    {
        if (app()->environment('production')) {
            $this->command?->warn('DemoAdminDataSeeder is a development tool and will not run in production.');

            return;
        }

        $this->clear();

        if (env('DEMO_DATA') === 'remove') {
            $this->command?->info('Demo admin data removed.');

            return;
        }

        mt_srand(20261123);
        $now = Carbon::now();

        $languages = DB::table('languages')->where('is_learnable', true)->pluck('id')->all();
        $lessonsByLanguage = DB::table('lessons')
            ->join('units', 'units.id', '=', 'lessons.unit_id')
            ->join('chapters', 'chapters.id', '=', 'units.chapter_id')
            ->orderBy('chapters.order_number')->orderBy('units.order_number')->orderBy('lessons.order_number')
            ->get(['lessons.id', 'chapters.language_id'])
            ->groupBy('language_id')
            ->map(fn ($rows) => $rows->pluck('id')->all());
        $packs = DB::table('gem_packs')->get()->keyBy('key');
        $plans = DB::table('subscription_plans')->get()->keyBy('key');
        $badges = DB::table('badges')->pluck('key')->all();
        $ads = DB::table('ads')->join('ad_campaigns', 'ad_campaigns.id', '=', 'ads.ad_campaign_id')
            ->where('ads.is_active', true)->where('ad_campaigns.is_active', true)
            ->get(['ads.id', 'ad_campaigns.placement']);
        $units = DB::table('units')->pluck('id')->all();
        $password = Hash::make(Str::random(40));

        $users = [];
        foreach (array_slice(self::NAMES, 0, self::LEARNERS) as $i => $name) {
            // More sign-ups recently than long ago, like a growing app.
            $daysAgo = (int) floor(120 * (mt_rand(0, 1000) / 1000) ** 2);
            $joined = $now->copy()->subDays($daysAgo)->setTime(mt_rand(6, 23), mt_rand(0, 59))->min($now->copy()->subMinutes(mt_rand(5, 300)));
            $learning = $languages[array_rand($languages)];
            $native = $languages[array_rand($languages)];

            $id = DB::table('users')->insertGetId([
                'full_name' => $name,
                'email' => self::EMAIL_PREFIX.Str::slug($name, '.').'@example.com',
                'email_verified_at' => mt_rand(1, 10) > 1 ? $joined->copy()->addMinutes(3) : null,
                'password' => $password,
                'role' => 'user',
                'is_tester' => $i < 2,
                'native_language_id' => $native,
                'learning_language_id' => $learning,
                'proficiency_level' => ['beginner', 'some_knowledge', 'intermediate'][mt_rand(0, 2)],
                'streak_goal_days' => [7, 14, 30, 50][mt_rand(0, 3)],
                'timezone' => self::TIMEZONES[array_rand(self::TIMEZONES)],
                'created_at' => $joined,
                'updated_at' => $joined,
            ]);

            DB::table('user_courses')->insert([
                'user_id' => $id, 'language_id' => $learning, 'native_language_id' => $native,
                'proficiency_level' => 'beginner', 'is_active' => true, 'enrolled_at' => $joined,
                'created_at' => $joined, 'updated_at' => $joined,
            ]);

            $users[] = ['id' => $id, 'name' => $name, 'joined' => $joined, 'learning' => $learning, 'native' => $native];
        }

        $plays = [];
        $activity = [];
        $chests = [];
        foreach ($users as &$user) {
            $lessons = $lessonsByLanguage[$user['learning']] ?? [];
            $daysSinceJoin = (int) $user['joined']->copy()->startOfDay()->diffInDays($now->copy()->startOfDay());
            // Some learners stick with it, some try it once and stop.
            $keen = mt_rand(1, 100);
            $chance = $keen > 70 ? 75 : ($keen > 30 ? 35 : 8);
            $position = 0;
            $completed = [];
            $streak = 0;
            $longest = 0;
            $lastDay = null;
            $xp = 0;

            for ($d = 0; $d <= $daysSinceJoin; $d++) {
                $day = $user['joined']->copy()->startOfDay()->addDays($d);
                if ($d > 0 && mt_rand(1, 100) > $chance) {
                    $streak = 0;

                    continue;
                }

                $activity[] = ['user_id' => $user['id'], 'activity_date' => $day->toDateString(), 'created_at' => $day, 'updated_at' => $day];
                $streak++;
                $longest = max($longest, $streak);
                $lastDay = $day;

                for ($n = mt_rand(1, $keen > 70 ? 6 : 3); $n > 0 && $lessons; $n--) {
                    // Mostly new lessons, sometimes a replay of an earlier one.
                    $replay = $position > 0 && mt_rand(1, 100) <= 30;
                    $lesson = $replay ? $lessons[mt_rand(0, min($position, count($lessons)) - 1)] : $lessons[min($position++, count($lessons) - 1)];
                    $at = $day->copy()->setTime(mt_rand(7, 22), mt_rand(0, 59));
                    if ($at->greaterThan($now)) {
                        $at = $now->copy()->subMinutes(mt_rand(1, 60));
                    }
                    $plays[] = ['user_id' => $user['id'], 'lesson_id' => $lesson, 'played_at' => $at];
                    $mistakes = mt_rand(0, 4);
                    $completed[$lesson] = ['mistakes' => $mistakes, 'at' => $at, 'count' => ($completed[$lesson]['count'] ?? 0) + 1];
                    $xp += $replay ? 0 : 10 + ($mistakes === 0 ? 5 : 0);
                }

                if (mt_rand(1, 100) <= 70) {
                    $chests[] = ['user_id' => $user['id'], 'chest_type' => 'daily', 'reference' => $day->toDateTimeString(),
                        'gems_awarded' => mt_rand(20, 30), 'xp_awarded' => 0, 'hearts_awarded' => 0, 'claimed_at' => $day->copy()->setTime(mt_rand(8, 22), 5)->min($now)];
                }
            }

            $rows = [];
            foreach ($completed as $lesson => $c) {
                $rows[] = ['user_id' => $user['id'], 'lesson_id' => $lesson, 'native_language_id' => $user['native'],
                    'completions_count' => $c['count'], 'mistakes' => $c['mistakes'], 'is_perfect' => $c['mistakes'] === 0,
                    'xp_awarded' => 10, 'completed_at' => $c['at'], 'created_at' => $c['at'], 'updated_at' => $c['at']];
            }
            foreach (array_chunk($rows, 200) as $chunk) {
                DB::table('user_lesson_completions')->insert($chunk);
            }

            // A streak only survives if the last active day was today or yesterday.
            $alive = $lastDay && $lastDay->diffInDays($now->copy()->startOfDay()) <= 1;
            $user['lessonsDone'] = count($completed);
            $user['xp'] = $xp;
            $user['streak'] = $alive ? $streak : 0;
            $user['longest'] = $longest;

            DB::table('user_game_states')->insert([
                'user_id' => $user['id'], 'total_xp' => $xp, 'today_xp' => 0, 'today_date' => $now->toDateString(),
                'streak' => $user['streak'], 'longest_streak' => $longest, 'last_lesson_date' => $lastDay?->toDateString(),
                'lessons_today' => 0, 'lessons_mastered_today' => 0, 'max_lessons_in_a_day' => mt_rand(1, 6),
                'total_lessons_completed' => count($completed), 'perfect_lessons' => count(array_filter($completed, fn ($c) => $c['mistakes'] === 0)),
                'units_completed_count' => intdiv(count($completed), 5), 'gems' => mt_rand(0, 900), 'hearts' => mt_rand(0, 5),
                'created_at' => $user['joined'], 'updated_at' => $now,
            ]);

            // Unit bonus chests for every fifth lesson finished.
            // A unit's bonus chest opens once, so each claim is a different unit.
            $unitPicks = $units;
            shuffle($unitPicks);
            foreach (array_slice($unitPicks, 0, intdiv(count($completed), 5)) as $unit) {
                $chests[] = ['user_id' => $user['id'], 'chest_type' => 'unit_bonus', 'reference' => (string) $unit,
                    'gems_awarded' => mt_rand(10, 59), 'xp_awarded' => mt_rand(10, 29), 'hearts_awarded' => 1, 'claimed_at' => $this->between($user['joined'], $now)];
            }
            foreach ([3 => 0, 7 => 50, 30 => 150] as $days => $gems) {
                if ($longest >= $days) {
                    $chests[] = ['user_id' => $user['id'], 'chest_type' => 'streak', 'reference' => (string) $days,
                        'gems_awarded' => $gems, 'xp_awarded' => 0, 'hearts_awarded' => 0, 'claimed_at' => $this->between($user['joined']->copy()->addDays($days)->min($now), $now)];
                }
            }
        }
        unset($user);

        foreach (array_chunk($plays, 500) as $chunk) {
            DB::table('lesson_plays')->insert($chunk);
        }
        foreach (array_chunk($activity, 500) as $chunk) {
            DB::table('user_activity_days')->insert($chunk);
        }
        foreach (array_chunk(array_map(fn ($c) => $c + ['created_at' => $c['claimed_at'], 'updated_at' => $c['claimed_at']], $chests), 500) as $chunk) {
            DB::table('chest_claims')->insert($chunk);
        }

        $this->badges($users, $badges);
        $subscribers = $this->subscriptions($users, $plans, $now);
        $this->family($users, $subscribers, $now);
        $this->gemPurchases($users, $packs, $now);
        $this->adEvents($users, $ads, $now);
        $this->messages($now);
        $this->gemLedger($users, $now);
        $this->dailyQuests($users, $now);
        $this->devices($users, $now);

        $this->command?->info(sprintf(
            'Demo admin data: %d learners, %d lesson plays, %d chest claims.',
            count($users), count($plays), count($chests),
        ));
    }

    private function badges(array $users, array $badges): void
    {
        $rows = [];
        foreach ($users as $user) {
            $earned = array_keys(array_filter([
                'lesson-1' => $user['lessonsDone'] >= 1,
                'lesson-25' => $user['lessonsDone'] >= 25,
                'lesson-100' => $user['lessonsDone'] >= 100,
                'streak-3' => $user['longest'] >= 3,
                'streak-7' => $user['longest'] >= 7,
                'streak-30' => $user['longest'] >= 30,
                'xp-100' => $user['xp'] >= 100,
                'xp-1000' => $user['xp'] >= 1000,
            ]));

            foreach (array_intersect($earned, $badges) as $key) {
                $at = $user['joined']->copy()->addDays(mt_rand(0, 20))->min(Carbon::now());
                $rows[] = ['user_id' => $user['id'], 'badge_key' => $key, 'earned_at' => $at, 'created_at' => $at, 'updated_at' => $at];
            }
        }
        DB::table('user_badges')->insert($rows);
    }

    /** One row per payment: a monthly plan running three months has three rows. */
    private function subscriptions(array $users, $plans, Carbon $now): array
    {
        // [user index, plan, provider, status, months running, auto-renew off]
        $setup = [
            [0, 'family', 'stripe', 'active', 3, false],
            [3, 'monthly', 'stripe', 'active', 4, false],
            [5, 'monthly', 'stripe', 'active', 1, true],
            [7, 'yearly', 'apple', 'active', 1, false],
            [9, 'yearly', 'stripe', 'active', 1, false],
            [11, 'monthly', 'apple', 'active', 1, false],
            [13, 'monthly', 'stripe', 'past_due', 2, false],
            [15, 'monthly', 'stripe', 'canceled', 2, true],
            [17, 'monthly', 'apple', 'expired', 3, false],
            [19, 'family', 'apple', 'active', 2, false],
            [21, 'monthly', 'stripe', 'incomplete', 1, false],
            [23, 'monthly', 'stripe', 'active', 2, false],
        ];

        $subscribers = [];
        foreach ($setup as [$index, $planKey, $provider, $status, $months, $cancelling]) {
            $user = $users[$index] ?? null;
            $plan = $plans[$planKey] ?? null;
            if (! $user || ! $plan) {
                continue;
            }
            $yearly = $plan->interval === 'year';
            // The latest payment lands within the last few weeks; earlier
            // renewals go back a month at a time from there.
            $payments = $yearly ? 1 : $months;
            $latest = $now->copy()->subDays(mt_rand(1, 25))->subMinutes(mt_rand(0, 600));

            for ($m = 0; $m < $payments; $m++) {
                $paidAt = $latest->copy()->subMonths($payments - 1 - $m);
                $last = $m === $payments - 1;
                $periodEnd = $yearly ? $paidAt->copy()->addYear() : $paidAt->copy()->addMonth();
                $rowStatus = $last ? $status : 'expired';
                if ($last && $status === 'expired') {
                    $periodEnd = $now->copy()->subDays(mt_rand(3, 20));
                }
                if ($last && $status === 'past_due') {
                    $periodEnd = $now->copy()->subDays(2);
                }

                DB::table('user_subscriptions')->insert([
                    'user_id' => $user['id'], 'plan_key' => $planKey, 'provider' => $provider,
                    'amount_cents' => $rowStatus === 'incomplete' ? null : $plan->amount_cents,
                    'stripe_customer_id' => $provider === 'stripe' ? 'cus_demo'.$user['id'] : null,
                    'stripe_subscription_id' => $provider === 'stripe' ? 'sub_demo'.$user['id'].'_'.$m : null,
                    'apple_original_transaction_id' => $provider === 'apple' ? '2000000'.$user['id'].str_pad((string) $m, 4, '0', STR_PAD_LEFT) : null,
                    'status' => $rowStatus,
                    'cancel_at_period_end' => $last && $cancelling,
                    'canceled_at' => $last && $status === 'canceled' ? $now->copy()->subDays(mt_rand(1, 10)) : null,
                    'current_period_end' => $periodEnd,
                    'created_at' => $paidAt, 'updated_at' => $paidAt,
                ]);
            }

            if (in_array($status, ['active', 'trialing'], true)) {
                $subscribers[$index] = $planKey;
            }
        }

        return $subscribers;
    }

    private function family(array $users, array $subscribers, Carbon $now): void
    {
        foreach ([0 => [30, 31, 32], 19 => [33]] as $ownerIndex => $memberIndexes) {
            $owner = $users[$ownerIndex] ?? null;
            if (! $owner || ($subscribers[$ownerIndex] ?? null) !== 'family') {
                continue;
            }
            $group = DB::table('family_groups')->insertGetId(['owner_id' => $owner['id'], 'created_at' => $now->copy()->subDays(60), 'updated_at' => $now]);
            foreach ($memberIndexes as $index) {
                $joined = $now->copy()->subDays(mt_rand(5, 50));
                DB::table('family_members')->insert(['family_group_id' => $group, 'user_id' => $users[$index]['id'], 'joined_at' => $joined, 'created_at' => $joined, 'updated_at' => $joined]);
            }
            DB::table('family_invites')->insert([
                'family_group_id' => $group, 'email' => self::EMAIL_PREFIX.'invite'.$group.'@example.com', 'token' => Str::random(64),
                'status' => 'pending', 'invited_by' => $owner['id'], 'expires_at' => $now->copy()->addDays(4),
                'created_at' => $now->copy()->subDays(3), 'updated_at' => $now->copy()->subDays(3),
            ]);
        }
    }

    private function gemPurchases(array $users, $packs, Carbon $now): void
    {
        if ($packs->isEmpty()) {
            return;
        }
        $keys = $packs->keys()->all();
        $rows = [];
        for ($i = 0; $i < 45; $i++) {
            $user = $users[array_rand($users)];
            $pack = $packs[$keys[mt_rand(1, 10) <= 5 ? 0 : (mt_rand(1, 10) <= 7 ? 1 : count($keys) - 1)]];
            $at = $this->between($user['joined'], $now);
            $apple = mt_rand(1, 10) <= 3;
            $rows[] = [
                'user_id' => $user['id'], 'pack_key' => $pack->key, 'provider' => $apple ? 'apple' : 'stripe',
                'gems_credited' => $pack->gems, 'amount_cents' => $pack->amount_cents, 'currency' => 'usd',
                'stripe_checkout_session_id' => $apple ? null : 'cs_demo_'.Str::random(24),
                'apple_transaction_id' => $apple ? '2000000'.mt_rand(100000000, 999999999) : null,
                // About one in eight checkouts is abandoned and never paid.
                'status' => mt_rand(1, 8) === 1 ? 'pending' : 'completed',
                'created_at' => $at, 'updated_at' => $at,
            ];
        }
        DB::table('gem_purchases')->insert($rows);
    }

    private function adEvents(array $users, $ads, Carbon $now): void
    {
        if ($ads->isEmpty()) {
            return;
        }
        $rows = [];
        for ($d = 29; $d >= 0; $d--) {
            for ($n = mt_rand(15, 40); $n > 0; $n--) {
                $ad = $ads[mt_rand(0, $ads->count() - 1)];
                $user = $users[array_rand($users)];
                $at = $now->copy()->subDays($d)->setTime(mt_rand(7, 23), mt_rand(0, 59))->min($now);
                $placement = $ad->placement instanceof \BackedEnum ? $ad->placement->value : $ad->placement;
                $rows[] = ['ad_id' => $ad->id, 'type' => 'view', 'placement' => $placement, 'user_id' => $user['id'], 'created_at' => $at];
                // Roughly one view in twenty gets tapped.
                if (mt_rand(1, 20) === 1) {
                    $rows[] = ['ad_id' => $ad->id, 'type' => 'click', 'placement' => $placement, 'user_id' => $user['id'], 'created_at' => $at->copy()->addSeconds(4)];
                }
            }
        }
        foreach (array_chunk($rows, 500) as $chunk) {
            DB::table('ad_events')->insert($chunk);
        }
    }

    /**
     * A believable gems history per learner that ends on the balance their
     * game state already shows: an opening balance, then chests, quests and
     * lesson bonuses in, heart refills and avatar items out.
     */
    private function gemLedger(array $users, Carbon $now): void
    {
        $balances = DB::table('user_game_states')->whereIn('user_id', array_column($users, 'id'))->pluck('gems', 'user_id');
        $bought = DB::table('gem_purchases')->where('status', 'completed')->whereIn('user_id', array_column($users, 'id'))
            ->get(['user_id', 'gems_credited', 'created_at'])->groupBy('user_id');
        $rows = [];

        foreach ($users as $user) {
            $events = [];
            foreach ($bought[$user['id']] ?? [] as $purchase) {
                $events[] = ['shop.gems_purchase', (int) $purchase->gems_credited, Carbon::parse($purchase->created_at)];
            }
            for ($n = mt_rand(3, 12); $n > 0; $n--) {
                [$reason, $delta] = [
                    ['chest.reward', mt_rand(20, 30)], ['quest.claim', [10, 25, 35][mt_rand(0, 2)]], ['lesson.bonus', 5],
                    ['shop.hearts_refill', -[200, 400, 600][mt_rand(0, 2)]], ['avatar.unlock', -20], ['league.weekly', 10],
                ][mt_rand(0, 5)];
                $events[] = [$reason, $delta, $this->between($user['joined'], $now)];
            }
            usort($events, fn ($a, $b) => $a[2] <=> $b[2]);

            // Work backwards from today's balance so the history adds up, and
            // never let the balance dip below zero part way through: drop a
            // spend that would, or an earning if the opening would be negative.
            $target = (int) ($balances[$user['id']] ?? 0);
            while (true) {
                $opening = $target - array_sum(array_column($events, 1));
                $running = $opening;
                $dip = null;
                foreach ($events as $k => $event) {
                    $running += $event[1];
                    if ($running < 0) {
                        $dip = $k;
                        break;
                    }
                }
                if ($opening >= 0 && $dip === null) {
                    break;
                }
                $drop = $opening < 0
                    ? array_key_last(array_filter($events, fn ($e) => $e[1] > 0))
                    : array_key_first(array_filter($events, fn ($e) => $e[1] < 0));
                unset($events[$drop]);
                $events = array_values($events);
            }

            $balance = $opening;
            $rows[] = ['user_id' => $user['id'], 'delta' => $opening, 'balance_after' => $opening, 'reason' => 'ledger.opening_balance', 'created_at' => $user['joined']];
            foreach ($events as [$reason, $delta, $at]) {
                $balance += $delta;
                $rows[] = ['user_id' => $user['id'], 'delta' => $delta, 'balance_after' => $balance, 'reason' => $reason, 'created_at' => $at];
            }
        }
        foreach (array_chunk($rows, 500) as $chunk) {
            DB::table('gem_ledger_entries')->insert($chunk);
        }
    }

    /** Today's three quests for learners who practised recently, some done. */
    private function dailyQuests(array $users, Carbon $now): void
    {
        $quests = DB::table('quests')->where('is_active', true)->get();
        if ($quests->count() === 0) {
            return;
        }
        $rows = [];
        foreach ($users as $user) {
            if ($user['streak'] === 0) {
                continue;
            }
            foreach ($quests->shuffle()->take(3) as $quest) {
                $progress = mt_rand(0, $quest->target_count);
                $done = $progress >= $quest->target_count;
                $rows[] = [
                    'user_id' => $user['id'], 'quest_id' => $quest->id, 'target_count' => $quest->target_count,
                    'gems_reward' => $quest->gems_reward, 'xp_reward' => $quest->xp_reward, 'quest_date' => $now->toDateString(),
                    'progress' => $progress, 'completed_at' => $done ? $now : null, 'claimed_at' => $done && mt_rand(0, 1) ? $now : null,
                    'created_at' => $now->copy()->startOfDay(), 'updated_at' => $now,
                ];
            }
        }
        DB::table('user_daily_quests')->insert($rows);
    }

    /** Push devices for most learners, and a few who switched some notifications off. */
    private function devices(array $users, Carbon $now): void
    {
        foreach ($users as $i => $user) {
            if ($i % 5 !== 4) {
                $seen = $this->between($user['joined'], $now);
                DB::table('device_tokens')->insert([
                    'user_id' => $user['id'], 'token' => 'demo-'.Str::random(60), 'provider' => 'fcm',
                    'platform' => $i % 3 === 0 ? 'ios' : 'android', 'last_registered_at' => $seen,
                    'created_at' => $user['joined'], 'updated_at' => $seen,
                ]);
            }
            if ($i % 4 === 1) {
                DB::table('notification_preferences')->insert([
                    'user_id' => $user['id'], 'reminders' => mt_rand(0, 1), 'rewards' => true, 'league' => mt_rand(0, 1),
                    'progress' => true, 'family' => true, 'billing' => true, 'sent_count' => 0, 'nag_sent' => false,
                    'created_at' => $user['joined'], 'updated_at' => $now,
                ]);
            }
        }
    }

    private function messages(Carbon $now): void
    {
        foreach (self::MESSAGES as $i => $message) {
            $name = self::NAMES[($i * 7) % count(self::NAMES)];
            $at = $now->copy()->subDays($i * 4 + mt_rand(0, 3))->setTime(mt_rand(8, 22), mt_rand(0, 59));
            DB::table('contact_messages')->insert([
                'name' => $name, 'email' => self::EMAIL_PREFIX.Str::slug($name, '.').'@example.com',
                'message' => $message, 'created_at' => $at, 'updated_at' => $at,
            ]);
        }
    }

    /** A random moment between two times. */
    private function between(Carbon $from, Carbon $to): Carbon
    {
        $seconds = max(0, (int) $from->diffInSeconds($to));

        return $from->copy()->addSeconds(mt_rand(0, $seconds));
    }

    /** Removes everything a previous run created. */
    private function clear(): void
    {
        $ids = DB::table('users')->where('email', 'like', self::EMAIL_PREFIX.'%')->pluck('id');
        if ($ids->isNotEmpty()) {
            // Ad events keep their row when a learner is deleted (user_id goes
            // null), so they are removed explicitly. Everything else cascades.
            DB::table('ad_events')->whereIn('user_id', $ids)->delete();
            DB::table('users')->whereIn('id', $ids)->delete();
        }
        DB::table('contact_messages')->where('email', 'like', self::EMAIL_PREFIX.'%')->delete();
        DB::table('family_invites')->where('email', 'like', self::EMAIL_PREFIX.'%')->delete();
    }
}
