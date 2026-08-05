<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('legal_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->longText('content');
            $table->timestamps();
        });

        $now = now();

        $terms = <<<'HTML'
        <p>Welcome to Languify. These Terms and Conditions ("Terms") govern your access to and use of the Languify website, app, and related services (the "Service"). By creating an account or using the Service, you agree to be bound by these Terms.</p>

        <h2>1. Eligibility</h2>
        <p>You must be at least 13 years old to create an account. If you are under the age of majority in your jurisdiction, you confirm that a parent or legal guardian has reviewed and agreed to these Terms on your behalf.</p>

        <h2>2. Your Account</h2>
        <p>You are responsible for maintaining the confidentiality of your login credentials and for all activity that occurs under your account. Please notify us immediately if you suspect any unauthorized use of your account.</p>

        <h2>3. Subscriptions and Purchases</h2>
        <p>Languify offers optional in-app purchases (such as gem packs and heart refills) and recurring subscription plans. All payments are processed securely through Stripe. Prices are shown at the time of purchase and may change from time to time; changes will not affect purchases already completed.</p>
        <p>Subscriptions renew automatically at the end of each billing period unless cancelled beforehand. You may cancel your subscription at any time; cancellation takes effect at the end of the current billing period. Purchased gems and completed billing periods are generally non-refundable, except where required by applicable law.</p>

        <h2>4. Acceptable Use</h2>
        <ul>
        <li>Do not attempt to disrupt, reverse-engineer, or gain unauthorized access to the Service.</li>
        <li>Do not use automated tools (bots, scripts) to farm rewards, XP, or in-app currency.</li>
        <li>Do not upload or share content that is unlawful, abusive, or infringes on the rights of others.</li>
        </ul>

        <h2>5. Intellectual Property</h2>
        <p>All course content, software, graphics, and branding on Languify are owned by us or our licensors and are protected by intellectual property laws. You may use the Service for personal, non-commercial language learning only.</p>

        <h2>6. Termination</h2>
        <p>We may suspend or terminate your account if you violate these Terms. You may stop using the Service and close your account at any time.</p>

        <h2>7. Disclaimers &amp; Limitation of Liability</h2>
        <p>The Service is provided "as is" without warranties of any kind. To the fullest extent permitted by law, Languify is not liable for any indirect, incidental, or consequential damages arising from your use of the Service.</p>

        <h2>8. Changes to These Terms</h2>
        <p>We may update these Terms from time to time. Material changes will be communicated through the app or by email. Continued use of the Service after changes take effect constitutes acceptance of the revised Terms.</p>

        <h2>9. Contact Us</h2>
        <p>If you have questions about these Terms, please visit our <a href="/contact">Contact Us</a> page.</p>
        HTML;

        $privacy = <<<'HTML'
        <p>This Privacy Policy explains how Languify ("we", "us") collects, uses, and protects your information when you use our Service.</p>

        <h2>1. Information We Collect</h2>
        <ul>
        <li><strong>Account information:</strong> name, email address, and password (stored securely, never in plain text).</li>
        <li><strong>Learning data:</strong> your course progress, exercise results, streaks, and preferences, used to personalize your learning experience.</li>
        <li><strong>Payment information:</strong> if you make a purchase or subscribe, payment is processed directly by Stripe. We do not store your full card details on our servers.</li>
        <li><strong>Usage data:</strong> device type, app interactions, and timezone, used to improve the Service and keep daily streaks accurate.</li>
        </ul>

        <h2>2. How We Use Your Information</h2>
        <p>We use your information to provide and improve the Service, personalize your course content, process payments, communicate important updates, and maintain the security of your account.</p>

        <h2>3. Sharing Your Information</h2>
        <p>We do not sell your personal information. We share data only with trusted service providers who help us operate the Service (such as Stripe for payment processing and our email provider for account verification), and only to the extent necessary for them to perform their services.</p>

        <h2>4. Data Retention</h2>
        <p>We retain your account and learning data for as long as your account is active. If you delete your account, we will remove or anonymize your personal information within a reasonable period, except where retention is required by law.</p>

        <h2>5. Your Rights</h2>
        <p>You may access, correct, or request deletion of your personal data at any time from your Profile settings, or by contacting us. Depending on your location, you may have additional rights under laws such as the GDPR or CCPA.</p>

        <h2>6. Children's Privacy</h2>
        <p>Languify is not directed at children under 13, and we do not knowingly collect personal information from children under that age.</p>

        <h2>7. Security</h2>
        <p>We use industry-standard measures, including encrypted password storage and secure payment processing, to protect your information. No method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.</p>

        <h2>8. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time. We will notify you of material changes through the app or by email.</p>

        <h2>9. Contact Us</h2>
        <p>If you have questions about this Privacy Policy or how your data is handled, please visit our <a href="/contact">Contact Us</a> page.</p>
        HTML;

        $contact = <<<'HTML'
        <p>We'd love to hear from you! Whether you have a question, feedback, or ran into an issue, here's how to reach us.</p>

        <h2>Support</h2>
        <p>For account help, billing questions, or bug reports, email us at <a href="mailto:support@languify.us">support@languify.us</a>. We aim to respond within 1-2 business days.</p>

        <h2>Business &amp; Partnerships</h2>
        <p>For partnership or media inquiries, reach out to <a href="mailto:hello@languify.us">hello@languify.us</a>.</p>

        <h2>Follow Us</h2>
        <p>Stay up to date with new languages, features, and learning tips on our social channels.</p>
        HTML;

        DB::table('legal_pages')->insert([
            ['slug' => 'terms', 'title' => 'Terms and Conditions', 'content' => $terms, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'privacy', 'title' => 'Privacy Policy', 'content' => $privacy, 'created_at' => $now, 'updated_at' => $now],
            ['slug' => 'contact', 'title' => 'Contact Us', 'content' => $contact, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_pages');
    }
};
