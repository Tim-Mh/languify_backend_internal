<?php

namespace App\Console\Commands;

use App\Services\LeagueService;
use Illuminate\Console\Command;

/**
 * Weekly league promotion/demotion/re-bucketing. Scheduled for Monday
 * 00:00 UTC in routes/console.php — the first scheduled command in this
 * codebase to run on a fixed global instant rather than lazily per-user.
 *
 * --force re-runs the rollover even if this week's already been processed,
 * for on-demand testing. Note: re-running without any new XP earned in
 * between re-ranks an all-zero-XP cohort, so everyone's points delta
 * degenerates to whatever an arbitrary user_id tie-break produces —
 * expected for a same-week re-test, not a bug.
 */
class RolloverLeagues extends Command
{
    protected $signature = 'league:rollover {--force : Re-run even if this week was already processed}';

    protected $description = 'Promote/demote league cohorts, reset weekly XP, and re-bucket for the new week';

    public function handle(LeagueService $leagues): int
    {
        $summary = $leagues->rolloverWeek((bool) $this->option('force'));

        if ($summary['skipped'] ?? false) {
            $this->info('League rollover already ran for this week — skipped. Use --force to re-run.');

            return self::SUCCESS;
        }

        foreach ($summary as $tierName => $counts) {
            $this->info("{$tierName}: {$counts['promoted']} promoted, {$counts['demoted']} demoted, {$counts['stayed']} stayed");
        }

        return self::SUCCESS;
    }
}
