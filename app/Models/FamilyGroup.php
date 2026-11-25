<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['owner_id'])]
class FamilyGroup extends Model
{
    use HasFactory;

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function invites(): HasMany
    {
        return $this->hasMany(FamilyInvite::class);
    }

    public function pendingInvites(): HasMany
    {
        return $this->invites()->where('status', 'pending');
    }

    /**
     * Pending invites that can still be accepted, so they hold a seat. An
     * invite past its expires_at keeps status 'pending' until someone tries
     * it, but it can never be used, so it must not count against the plan.
     * pendingInvites() stays as it is so the owner's list still shows the
     * stale ones, which they can resend or revoke.
     */
    public function seatHoldingInvites(): HasMany
    {
        return $this->pendingInvites()->where('expires_at', '>', now());
    }
}
