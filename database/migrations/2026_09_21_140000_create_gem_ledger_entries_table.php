<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Every movement of a learner's gem balance, append-only.
 *
 * The balance lives in a single mutable column, `user_game_states.gems`, and
 * sixteen places add to or subtract from it. That works right up until the
 * moment it does not: a bad deploy, a partial refund, a race nobody spotted,
 * and the number is simply wrong with nothing to compare it against. The
 * purchase tables record what was BOUGHT, but nothing records what was
 * EARNED or SPENT, so a balance cannot be rebuilt.
 *
 * This is the record. One row per movement, written in the same transaction
 * as the balance change, so the two cannot disagree: if the caller rolls back,
 * the entry goes with it.
 *
 * `balance_after` is stored rather than derived. Summing deltas gives the same
 * answer only if no row is ever missing, and the whole point is to be able to
 * find the row where the sum and the stored balance part company.
 *
 * Nothing updates or deletes these rows. There is deliberately no updated_at.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gem_ledger_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Signed: positive is earned or bought, negative is spent or
            // reversed. Never zero -- a movement of nothing is not a movement.
            $table->integer('delta');

            // The balance immediately after this entry was applied, so an
            // audit can find exactly where the running total diverged.
            $table->unsignedInteger('balance_after');

            // Why it moved, e.g. 'chest.daily', 'shop.hearts_refill',
            // 'league.weekly'. A short stable key rather than prose, so it can
            // be grouped and counted.
            $table->string('reason', 64);

            $table->timestamp('created_at')->useCurrent();

            // The two questions actually asked of this table: one learner's
            // history, and how much a given source has paid out.
            $table->index(['user_id', 'created_at']);
            $table->index('reason');
        });

        // Opening balance for everyone who already has gems, so the ledger
        // reconciles from day one instead of appearing to owe them nothing.
        DB::table('user_game_states')
            ->where('gems', '>', 0)
            ->orderBy('id')
            ->chunk(500, function ($rows) {
                $entries = [];

                foreach ($rows as $row) {
                    $entries[] = [
                        'user_id' => $row->user_id,
                        'delta' => (int) $row->gems,
                        'balance_after' => (int) $row->gems,
                        'reason' => 'ledger.opening_balance',
                        'created_at' => now(),
                    ];
                }

                if ($entries) {
                    DB::table('gem_ledger_entries')->insert($entries);
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('gem_ledger_entries');
    }
};
