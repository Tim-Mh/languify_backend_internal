<?php

namespace App\Enums;

/**
 * The subscription plan keys the app wires special perks to. NOTE: this is
 * deliberately NOT used as an Eloquent cast on user_subscriptions.plan_key —
 * admins can create arbitrary catalog plans with any key, and only these
 * three carry built-in perk logic (heart cap, streak freezes, family
 * inheritance). Any other key falls through to the base/non-subscriber
 * behavior. Compare with PlanKey::tryFrom($planKey) so unknown keys resolve
 * to null rather than throwing.
 */
enum PlanKey: string
{
    case Monthly = 'monthly';
    case Yearly = 'yearly';
    case Family = 'family';

    public function isFamily(): bool
    {
        return $this === self::Family;
    }
}
