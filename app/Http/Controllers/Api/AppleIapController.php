<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AppleIapService;
use AppStoreServerLibrary\SignedDataVerifier\VerificationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OA;

class AppleIapController extends Controller
{
    public function __construct(private AppleIapService $iap) {}

    #[OA\Post(
        path: '/api/shop/apple/verify',
        summary: 'Verify an Apple In-App Purchase and apply it to the account',
        description: 'The iOS app sends the signed transaction (JWS) StoreKit returned for a purchase or a '
            .'restore. The signature is verified against Apple\'s root certificates server-side — nothing from '
            .'the client is trusted — and the product is credited idempotently: gems for a consumable, an '
            .'active plan for a subscription. Safe to call repeatedly with the same transaction.',
        tags: ['Shop'],
        security: [['cookieAuth' => []]],
        requestBody: new OA\RequestBody(required: true, content: new OA\JsonContent(
            required: ['signedTransaction'],
            properties: [
                new OA\Property(property: 'signedTransaction', type: 'string', description: 'JWS from StoreKit'),
            ],
        )),
        responses: [
            new OA\Response(response: 200, description: 'Verification result', content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: 'kind', type: 'string', enum: ['gems', 'subscription', 'unknown']),
                    new OA\Property(property: 'status', type: 'string'),
                    new OA\Property(property: 'gems', type: 'integer', nullable: true),
                    new OA\Property(property: 'planKey', type: 'string', nullable: true),
                ],
            )),
            new OA\Response(response: 422, description: 'The transaction could not be verified'),
        ],
    )]
    public function verify(Request $request): JsonResponse
    {
        $data = $request->validate([
            'signedTransaction' => ['required', 'string'],
        ]);

        try {
            $transaction = $this->iap->decodeTransaction($data['signedTransaction']);
        } catch (VerificationException $e) {
            Log::warning('Apple IAP: transaction failed verification', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'The purchase could not be verified.'], 422);
        }

        return response()->json($this->iap->credit($request->user()->id, $transaction));
    }

    #[OA\Post(
        path: '/api/apple/webhook',
        summary: 'App Store Server Notifications (V2) endpoint',
        description: 'Registered in App Store Connect. Renewals, cancellations, refunds and expirations arrive '
            .'here as a signed payload, verified the same way as transactions. Always answers 200 for anything '
            .'authentic; Apple retries on any other status.',
        tags: ['Shop'],
        responses: [
            new OA\Response(response: 200, description: 'Processed'),
            new OA\Response(response: 401, description: 'Payload failed signature verification'),
        ],
    )]
    public function webhook(Request $request): JsonResponse
    {
        $signedPayload = (string) $request->input('signedPayload', '');

        try {
            $payload = $this->iap->decodeNotification($signedPayload);
        } catch (VerificationException $e) {
            Log::warning('Apple IAP: notification failed verification', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'Unverified.'], 401);
        }

        try {
            $this->iap->handleNotification($payload);
        } catch (\Throwable $e) {
            // Authentic but unprocessable — log loudly, answer 200 anyway.
            // A non-200 makes Apple resend the same payload for days, and a
            // deterministic failure would fail identically every retry.
            Log::error('Apple IAP: notification processing failed', [
                'type' => $payload->getNotificationType()?->value,
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
