<?php

namespace App\Notifications\Channels;

use App\Models\User;
use App\Notifications\Messages\ExpoMessage;
use App\Services\ExpoPushService;
use App\Services\FcmPushService;
use App\Services\PushPolicy;
use Illuminate\Notifications\Notification;

/**
 * The 'expo' notification channel.
 *
 * Registered under that name in AppServiceProvider, so an existing notification
 * opts in by adding it to via() and writing a toExpo():
 *
 *     public function via(object $notifiable): array
 *     {
 *         return ['mail', 'expo'];
 *     }
 *
 *     public function toExpo(object $notifiable): ExpoMessage
 *     {
 *         return ExpoMessage::make('Your daily chest is ready', 'Free gems waiting.')
 *             ->deepLink('/rewards')
 *             ->channel('rewards');
 *     }
 *
 * Nothing else about the notification changes, and the mail side is untouched.
 *
 * The name is historical: 'expo' now means "push", and the channel routes each
 * device token to the service that understands it — Expo-wrapped tokens from
 * the Expo builds through Expo's relay, raw FCM tokens from the bare React
 * Native build straight through FCM. Notifications never know the difference.
 */
class ExpoChannel
{
    public function __construct(
        private ExpoPushService $expo,
        private FcmPushService $fcm,
        private PushPolicy $policy,
    ) {}

    public function send(object $notifiable, Notification $notification): void
    {
        // A notifiable with no devices is the common case, not an edge one:
        // every learner on the web app, and anyone who declined the permission
        // prompt. Checked before building the message so nothing is computed
        // for a send that cannot happen.
        $tokens = $notifiable->routeNotificationFor('expo', $notification);

        if (empty($tokens)) {
            return;
        }

        // Guards the transitional state where a notification lists 'expo' in
        // via() but has not been given a toExpo() yet. Without this that is a
        // fatal BadMethodCallException on a live send, which for a notification
        // fired inside a lesson completion would take the whole request down.
        if (! method_exists($notification, 'toExpo')) {
            return;
        }

        $message = $notification->toExpo($notifiable);

        if (! $message instanceof ExpoMessage) {
            return;
        }

        // The daily cap and the learner's own category toggles.
        // Checked here rather than at each call site so a notification cannot
        // opt out of them by forgetting to ask — and last, because the check
        // counts the send, and counting one that never went out would silently
        // eat somebody else's slot.
        //
        // Only for real users: Notification::route(...) targets an address with
        // no account behind it, so there are no preferences to consult and
        // nothing to count against.
        if ($notifiable instanceof User && ! $this->policy->allows($notifiable, $message->category(), $message->isLowPriority())) {
            return;
        }

        // routeNotificationForExpo returns token => provider. A plain list of
        // tokens (an older override, or an on-demand route) still works: its
        // numeric keys fall through to the Expo path, which is what every
        // token was before providers existed.
        $byProvider = ['expo' => [], 'fcm' => []];

        foreach ($tokens as $key => $value) {
            if (is_int($key)) {
                $byProvider['expo'][] = $value;
            } else {
                $byProvider[$value === 'fcm' ? 'fcm' : 'expo'][] = $key;
            }
        }

        $this->expo->send($byProvider['expo'], $message);
        $this->fcm->send($byProvider['fcm'], $message);
    }
}
