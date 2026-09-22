<?php

namespace App\Services;

use App\Models\GemPack;
use App\Models\GemPurchase;
use App\Models\SubscriptionPlan;
use App\Models\UserGameState;
use App\Models\UserSubscription;
use App\Support\GemLedger;
use AppStoreServerLibrary\Models\Environment;
use AppStoreServerLibrary\Models\JWSTransactionDecodedPayload;
use AppStoreServerLibrary\Models\NotificationTypeV2;
use AppStoreServerLibrary\Models\ResponseBodyV2DecodedPayload;
use AppStoreServerLibrary\SignedDataVerifier;
use AppStoreServerLibrary\SignedDataVerifier\VerificationException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Apple In-App Purchase: verification and crediting.
 *
 * The iOS app buys through StoreKit and sends the signed transaction (a JWS)
 * here. Verification is cryptographic and local — the JWS carries its own
 * certificate chain, checked against Apple's root certificates on disk — so
 * no App Store Connect API key is involved anywhere.
 *
 * Product ids are the contract with App Store Connect:
 *
 *     us.languify.app.sub.{plan_key}     auto-renewable subscriptions
 *     us.languify.app.gems.{pack_key}    consumable gem packs
 *
 * The suffix must match `subscription_plans.key` / `gem_packs.key` exactly,
 * so a product Apple bills maps onto the same catalog row Stripe bills.
 *
 * A transaction is tried against the production verifier first and sandbox
 * second. That order matters beyond development: App Review purchases run in
 * the sandbox even inside a production build, so a release backend that only
 * accepted production signatures would fail review.
 */
class AppleIapService
{
    private const SUB_PREFIX = 'us.languify.app.sub.';

    private const GEMS_PREFIX = 'us.languify.app.gems.';

    /** @var array<string, SignedDataVerifier> */
    private array $verifiers = [];

    /**
     * Verifies the JWS and returns the decoded transaction.
     *
     * @throws VerificationException when neither environment accepts it
     */
    public function decodeTransaction(string $signedTransaction): JWSTransactionDecodedPayload
    {
        try {
            return $this->verifier(Environment::PRODUCTION)
                ->verifyAndDecodeSignedTransaction($signedTransaction);
        } catch (VerificationException) {
            return $this->verifier(Environment::SANDBOX)
                ->verifyAndDecodeSignedTransaction($signedTransaction);
        }
    }

    /**
     * Verifies the notification envelope from App Store Server Notifications.
     *
     * @throws VerificationException when neither environment accepts it
     */
    public function decodeNotification(string $signedPayload): ResponseBodyV2DecodedPayload
    {
        try {
            return $this->verifier(Environment::PRODUCTION)
                ->verifyAndDecodeNotification($signedPayload);
        } catch (VerificationException) {
            return $this->verifier(Environment::SANDBOX)
                ->verifyAndDecodeNotification($signedPayload);
        }
    }

    /**
     * Applies a verified purchase to the user's account. Idempotent: replaying
     * the same transaction (a retry, a restore, a double-tap) changes nothing.
     *
     * @return array{kind: string, status: string, gems?: int|null, planKey?: string}
     */
    public function credit(int $userId, JWSTransactionDecodedPayload $transaction): array
    {
        $productId = (string) $transaction->getProductId();

        if (str_starts_with($productId, self::GEMS_PREFIX)) {
            return $this->creditGems($userId, $transaction);
        }

        if (str_starts_with($productId, self::SUB_PREFIX)) {
            return $this->applySubscription($userId, $transaction);
        }

        Log::warning('Apple IAP: unrecognised product id', ['productId' => $productId]);

        return ['kind' => 'unknown', 'status' => 'unrecognised_product'];
    }

    private function creditGems(int $userId, JWSTransactionDecodedPayload $transaction): array
    {
        $packKey = substr((string) $transaction->getProductId(), strlen(self::GEMS_PREFIX));
        $pack = GemPack::where('key', $packKey)->first();

        if (! $pack) {
            Log::warning('Apple IAP: gem product has no catalog row', ['key' => $packKey]);

            return ['kind' => 'gems', 'status' => 'unrecognised_product'];
        }

        return DB::transaction(function () use ($userId, $pack, $transaction) {
            $transactionId = (string) $transaction->getTransactionId();

            // The unique column is the idempotency lock; the insert, not a
            // prior read, is what decides who credits.
            $purchase = GemPurchase::firstOrCreate(
                ['apple_transaction_id' => $transactionId],
                [
                    'user_id' => $userId,
                    'pack_key' => $pack->key,
                    'provider' => 'apple',
                    'gems_credited' => $pack->gems,
                    'amount_cents' => $pack->amount_cents,
                    'currency' => 'usd',
                    'status' => 'completed',
                ],
            );

            if (! $purchase->wasRecentlyCreated) {
                return [
                    'kind' => 'gems',
                    'status' => 'already_completed',
                    'gems' => UserGameState::where('user_id', $userId)->value('gems'),
                ];
            }

            UserGameState::firstOrCreate(['user_id' => $userId]);
            $state = UserGameState::where('user_id', $userId)->lockForUpdate()->firstOrFail();
            GemLedger::apply($state, $pack->gems, 'purchase.apple');
            $state->save();

            return ['kind' => 'gems', 'status' => 'completed', 'gems' => $state->gems];
        });
    }

    private function applySubscription(int $userId, JWSTransactionDecodedPayload $transaction): array
    {
        $planKey = substr((string) $transaction->getProductId(), strlen(self::SUB_PREFIX));
        $plan = SubscriptionPlan::where('key', $planKey)->first();

        if (! $plan) {
            Log::warning('Apple IAP: subscription product has no catalog row', ['key' => $planKey]);

            return ['kind' => 'subscription', 'status' => 'unrecognised_product'];
        }

        $expiresAt = self::toDateTime($transaction->getExpiresDate());
        $revoked = $transaction->getRevocationDate() !== null;
        $active = ! $revoked && $expiresAt !== null && $expiresAt->isFuture();

        UserSubscription::updateOrCreate(
            ['apple_original_transaction_id' => (string) $transaction->getOriginalTransactionId()],
            [
                'user_id' => $userId,
                'plan_key' => $plan->key,
                'provider' => 'apple',
                'amount_cents' => $plan->amount_cents,
                'status' => $active ? 'active' : 'expired',
                'current_period_end' => $expiresAt,
                'cancel_at_period_end' => false,
                'canceled_at' => null,
            ],
        );

        return [
            'kind' => 'subscription',
            'status' => $active ? 'completed' : 'not_active',
            'planKey' => $plan->key,
        ];
    }

    /**
     * Applies an App Store Server Notification. Renewals, cancellations,
     * refunds and expirations all arrive here, keyed by the subscription's
     * originalTransactionId — the user never has the app open for any of it.
     */
    public function handleNotification(ResponseBodyV2DecodedPayload $payload): void
    {
        $type = $payload->getNotificationType();
        $data = $payload->getData();

        if ($type === NotificationTypeV2::TEST || $data === null) {
            return;
        }

        $signedTransaction = $data->getSignedTransactionInfo();

        if ($signedTransaction === null) {
            return;
        }

        $transaction = $this->decodeTransaction($signedTransaction);
        $productId = (string) $transaction->getProductId();

        // A refunded gem pack takes the gems back (floored at zero — they may
        // already be spent, and a negative wallet punishes future earning).
        if (str_starts_with($productId, self::GEMS_PREFIX)) {
            if ($type === NotificationTypeV2::REFUND) {
                $this->revokeGems((string) $transaction->getTransactionId());
            }

            return;
        }

        $record = UserSubscription::where(
            'apple_original_transaction_id',
            (string) $transaction->getOriginalTransactionId(),
        )->first();

        if (! $record) {
            Log::warning('Apple IAP: notification for unknown subscription', [
                'type' => $type?->value,
                'originalTransactionId' => $transaction->getOriginalTransactionId(),
            ]);

            return;
        }

        // One rule instead of one branch per notification type: the
        // transaction payload always carries the current truth, so state is
        // recomputed from it wholesale. The only extra signal is auto-renew
        // intent, which lives in the renewal info.
        $expiresAt = self::toDateTime($transaction->getExpiresDate());
        $revoked = $transaction->getRevocationDate() !== null;
        $active = ! $revoked && $expiresAt !== null && $expiresAt->isFuture();

        $record->status = $active ? 'active' : 'expired';
        $record->current_period_end = $expiresAt;

        $signedRenewalInfo = $data->getSignedRenewalInfo();

        if ($signedRenewalInfo !== null) {
            $renewalInfo = $this->decodeRenewalInfo($signedRenewalInfo);
            $stopping = $renewalInfo->getAutoRenewStatus()?->value === 0;
            $record->cancel_at_period_end = $stopping;
            $record->canceled_at = $stopping ? ($record->canceled_at ?? now()) : null;
        }

        // Keep the plan in step when Apple reports a different product (an
        // upgrade or crossgrade picked in the App Store, not in our UI).
        $planKey = substr($productId, strlen(self::SUB_PREFIX));

        if ($planKey !== $record->plan_key && SubscriptionPlan::where('key', $planKey)->exists()) {
            $record->plan_key = $planKey;
        }

        $record->save();
    }

    private function revokeGems(string $appleTransactionId): void
    {
        DB::transaction(function () use ($appleTransactionId) {
            $purchase = GemPurchase::where('apple_transaction_id', $appleTransactionId)
                ->where('status', 'completed')
                ->lockForUpdate()
                ->first();

            if (! $purchase) {
                return;
            }

            $purchase->status = 'refunded';
            $purchase->save();

            $state = UserGameState::where('user_id', $purchase->user_id)->lockForUpdate()->first();

            if ($state) {
                GemLedger::apply($state, -$purchase->gems_credited, 'purchase.apple_refund');
                $state->save();
            }
        });
    }

    private function decodeRenewalInfo(string $signedRenewalInfo)
    {
        try {
            return $this->verifier(Environment::PRODUCTION)
                ->verifyAndDecodeRenewalInfo($signedRenewalInfo);
        } catch (VerificationException) {
            return $this->verifier(Environment::SANDBOX)
                ->verifyAndDecodeRenewalInfo($signedRenewalInfo);
        }
    }

    private function verifier(Environment $environment): SignedDataVerifier
    {
        return $this->verifiers[$environment->value] ??= new SignedDataVerifier(
            rootCertificates: $this->rootCertificates(),
            enableOnlineChecks: false,
            environment: $environment,
            bundleId: config('services.apple_iap.bundle_id'),
            appAppleId: config('services.apple_iap.app_apple_id'),
        );
    }

    /** @return string[] DER contents of Apple's root certificates. */
    private function rootCertificates(): array
    {
        $files = glob(config('services.apple_iap.root_certificates_path').'/*.cer') ?: [];

        return array_values(array_filter(array_map(
            fn (string $file) => file_get_contents($file) ?: null,
            $files,
        )));
    }

    private static function toDateTime(?int $milliseconds): ?Carbon
    {
        return $milliseconds === null
            ? null
            : Carbon::createFromTimestampMs($milliseconds);
    }
}
