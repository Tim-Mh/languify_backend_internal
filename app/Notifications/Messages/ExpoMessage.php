<?php

namespace App\Notifications\Messages;

use App\Enums\NotificationCategory;

/**
 * One push notification, in the shape Expo's push service accepts.
 *
 * The mirror of MailMessage for the 'expo' channel: a notification's toExpo()
 * builds one of these and the channel turns it into the request body. Named
 * methods rather than a raw array so a typo is a fatal error at the call site
 * instead of a silently missing title on a live notification.
 *
 * The category is a constructor argument rather than another chained setter
 * because it is not decoration: PushPolicy reads it to decide whether the
 * learner has switched this kind of notification off, and Android reads it as
 * the channel to deliver on. A message without one could not be sent at all,
 * so it must be impossible to build.
 *
 * Every message must also deep link. A push that promises a chest and then
 * drops the learner on the home screen is worse than no push.
 */
class ExpoMessage
{
    private array $data = [];

    public function __construct(
        private NotificationCategory $category,
        private string $title,
        private string $body,
    ) {}

    public static function make(NotificationCategory $category, string $title, string $body): self
    {
        return new self($category, $title, $body);
    }

    /**
     * The in-app route to open on tap, e.g. '/rewards' or '/lesson/42'. Must be
     * a path the mobile app actually has a screen for — see the app's
     * app/(app) directory.
     */
    public function deepLink(string $route): self
    {
        $this->data['url'] = $route;

        return $this;
    }

    /** Extra payload for the app, merged alongside the deep link. */
    public function with(array $data): self
    {
        $this->data = [...$this->data, ...$data];

        return $this;
    }

    public function category(): NotificationCategory
    {
        return $this->category;
    }

    /**
     * The per-device request body. The token is added by the channel, which is
     * what lets one message fan out to every device a learner has.
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'data' => $this->data,
            // Android delivers on a channel of this name, which the app creates
            // at startup (src/lib/push.js). The learner can silence each one in
            // system settings, which is the OS-level half of the same opt-out
            // the in-app settings screen offers.
            'channelId' => $this->category->value,
            // Expo's own default tone. Not vibration: the app deliberately has
            // none, and each Android channel is created with it disabled.
            'sound' => 'default',
        ];
    }
}
