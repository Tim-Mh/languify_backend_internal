<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Fixed global instant (not per-user timezone, unlike every other reset in
// this app) so an entire ~30-person cohort rolls over at the same moment.
Schedule::command('league:rollover')->weeklyOn(1, '00:00')->timezone('UTC');

// Hourly, not daily — each check inside is gated to a specific LOCAL hour
// per user (see SendDailyNotifications), which lands at a different UTC
// instant for every timezone. withoutOverlapping() matters here: the sweep
// sends synchronous, non-queued mail over a chunked user scan, so a slow run
// (SMTP hiccups, a large user base) can plausibly take over an hour — without
// this, two overlapping runs would both read the same "not sent yet" flags
// and could double-send.
// Every five minutes rather than hourly. Almost everything inside is
// gated to a specific LOCAL hour AND a once-per-day marker, so running
// more often cannot double-send those. What it buys is the checks that
// are not hour-gated, above all the welcome push, which should land
// while the learner still has the app open rather than up to an hour
// later.
Schedule::command('notifications:daily-sweep')->everyFiveMinutes()->withoutOverlapping();

// Auto-renew safety net. Renewals normally arrive as an invoice.paid webhook,
// but a missed delivery (or an unset signing secret) would leave a learner
// charged by Stripe and never granted the time locally. This asks Stripe
// directly for the authoritative period end, so renewals still land even with
// the webhook down. Runs first, so a plan that renewed overnight is extended
// before the expiry sweep below looks at it.
Schedule::command('subscriptions:sync')->dailyAt('00:10')->withoutOverlapping();

// Flip plans past their period end to 'expired' so stored status matches
// reality. Access already drops live off current_period_end, so this is data
// hygiene and the lapse emails, not the enforcement path.
Schedule::command('subscriptions:expire')->dailyAt('00:40');
