<?php

namespace Database\Seeders;

use App\Models\LegalPage;
use Illuminate\Database\Seeder;

/**
 * The public "delete your account" page.
 *
 * Google Play requires a URL, reachable without installing the app, that names
 * the app, spells out the steps to request deletion, and says what is erased,
 * what is kept and for how long. Play shows the link on the store listing, so
 * it has to work for someone who has never had the app.
 *
 * It is a `legal_pages` row rather than hardcoded markup so the admin can edit
 * the wording — and the retention periods — without a deploy, exactly like the
 * Terms and the Privacy Policy. English only to start with; the admin editor
 * offers the other nine locales the moment somebody wants to write them.
 *
 * Idempotent, and deliberately `firstOrCreate` on the body: re-running this
 * must never overwrite wording the admin has since revised.
 */
class DeleteAccountPageSeeder extends Seeder
{
    public function run(): void
    {
        LegalPage::firstOrCreate(
            ['slug' => 'delete-account', 'locale' => LegalPage::SOURCE_LOCALE],
            [
                'title' => 'Delete Your Languify Account',
                'content' => $this->content(),
            ],
        );
    }

    private function content(): string
    {
        return <<<'HTML'
<p>This page explains how to delete your <strong>Languify</strong> account and what happens to your data when you do. It applies to the Languify mobile app and to languify.us.</p>

<h2>Delete your account from inside the app</h2>
<p>This is the fastest route and takes effect immediately.</p>
<ol>
<li>Open Languify and sign in.</li>
<li>Go to <strong>Profile</strong>.</li>
<li>Scroll to the bottom and tap <strong>Delete account</strong>.</li>
<li>Confirm when asked. Your account is deleted straight away and you are signed out.</li>
</ol>
<p>The same option is on the Profile page of the website if you would rather use a browser.</p>

<h2>Request deletion without the app</h2>
<p>If you have uninstalled Languify or cannot sign in, send us a request instead.</p>
<ol>
<li>Go to the <a href="/contact">Contact page</a>.</li>
<li>Enter the email address on your Languify account, so we can find it.</li>
<li>Write "Delete my account" in the message and send it.</li>
</ol>
<p>We action these within <strong>30 days</strong> of receiving the request, and usually sooner. We may reply first to confirm the request came from the account holder.</p>

<h2>What is deleted</h2>
<p>Deleting your account erases all of the following, permanently and immediately:</p>
<ul>
<li>Your name and email address</li>
<li>Your password and any linked Google or Apple sign-in</li>
<li>Every course you were enrolled in, and all learning progress: lessons completed, XP, streaks, badges, quests and league standing</li>
<li>Your hearts and gems, including any you had bought</li>
<li>Your avatar</li>
<li>Any family plan you own, along with its memberships. Members of that plan revert to the free tier.</li>
</ul>
<p>An active subscription is cancelled as part of the deletion, so you are not billed again. Deleting your account does not itself produce a refund for a period already paid for.</p>

<h2>What is kept, and for how long</h2>
<ul>
<li><strong>Payment records.</strong> Payments are processed by Stripe, which keeps transaction records to meet its own tax and accounting obligations. These are held by Stripe rather than by us, and we cannot delete them on request. They contain no learning data.</li>
<li><strong>Messages you sent us.</strong> If you have written to us through the Contact page, that message and the name and email you supplied are kept as a support record for up to <strong>24 months</strong>, then deleted.</li>
</ul>
<p>Nothing else is retained. There is no archived copy of a deleted account, and it cannot be restored, so please make sure you want to delete before confirming.</p>

<h2>Questions</h2>
<p>If anything here is unclear, or you want to know what data we hold before deciding, ask us through the <a href="/contact">Contact page</a> and we will answer.</p>
HTML;
    }
}
