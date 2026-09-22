<?php

namespace App\Support;

use App\Models\GemLedgerEntry;
use App\Models\UserGameState;

/**
 * The one way gems are allowed to move.
 *
 * Every caller used to write `$state->gems += $n` and save. That is fine until
 * the balance is wrong and there is nothing to reconcile it against: the
 * purchase tables say what was bought, but nothing said what was earned or
 * spent. CON-02 asks for consumption to be counted from an immutable ledger
 * rather than from a live row, and this is it.
 *
 * Deliberately NOT saving the state row. Almost every caller changes several
 * fields and saves once, inside a transaction it already opened; saving here
 * would either double-write or, worse, commit the balance separately from the
 * rest of the change. The ledger row is written now and the balance is saved
 * by the caller, both inside that same transaction, so a rollback takes both.
 */
class GemLedger
{
    /**
     * Apply a change to the balance and record why.
     *
     * @param  int  $delta  positive to credit, negative to spend
     * @param  string  $reason  short stable key, e.g. 'chest.daily'
     * @return int the balance after the change
     */
    public static function apply(UserGameState $state, int $delta, string $reason): int
    {
        if ($delta === 0) {
            // A movement of nothing is not a movement. Recording it would fill
            // the ledger with rows that say a reward paid out zero.
            return (int) $state->gems;
        }

        // Clamped at zero for the same reason the old call sites clamped: a
        // negative balance is not a thing a learner can have, and a refund
        // reversal can legitimately ask for more than is left.
        $balance = max(0, (int) $state->gems + $delta);

        // The delta that actually happened, which is not the requested one when
        // the clamp bit. Recording the request instead would make the ledger
        // disagree with the balance it is meant to verify.
        $applied = $balance - (int) $state->gems;

        $state->gems = $balance;

        if ($applied !== 0) {
            GemLedgerEntry::create([
                'user_id' => $state->user_id,
                'delta' => $applied,
                'balance_after' => $balance,
                'reason' => $reason,
                'created_at' => now(),
            ]);
        }

        return $balance;
    }

    /**
     * What the ledger says the balance should be.
     *
     * The reconciliation check: this and `user_game_states.gems` agreeing is
     * the point of keeping both.
     */
    public static function balanceFromLedger(int $userId): int
    {
        return (int) GemLedgerEntry::where('user_id', $userId)->sum('delta');
    }
}
