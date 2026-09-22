<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * One movement of a learner's gem balance.
 *
 * Append-only by contract: nothing in the application updates or deletes an
 * entry, which is why `$timestamps` is off and only `created_at` exists. The
 * balance column on user_game_states stays the fast answer; this is the
 * record that can prove it, or prove it wrong.
 *
 * @see \App\Support\GemLedger for the only supported way to write one.
 */
#[Fillable(['user_id', 'delta', 'balance_after', 'reason', 'created_at'])]
class GemLedgerEntry extends Model
{
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'delta' => 'integer',
            'balance_after' => 'integer',
            'created_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
