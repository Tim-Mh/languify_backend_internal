# Push notification test plan

Covers the FCM pipeline end to end, from the app obtaining a token to a tapped
notification landing on the right screen. Written against the bare React Native
build; the Expo builds route through `exp.host` instead and are not covered here.

Run the artisan commands on the server, from the repo root.

## Before you start

| Requirement | Why |
| --- | --- |
| A **physical** Android device | emulators are never issued a push token |
| The app built from `Languify_mobile` `a9af3c1` or later | earlier builds drop `provider` and 422 on registration |
| Notification permission granted | Android only ever prompts once; check Settings → Apps → Languify → Notifications |
| A test account you can sign in and out of freely | several cases sign out |

Two behaviours that look like failures and are not:

- **A push arriving while the app is open shows an in-app toast, not a system
  banner.** `PushProvider` suppresses the banner deliberately. Background or lock
  the phone to see a tray entry.
- **Quiet hours are 22:00–08:00 in the user's own timezone.** Nothing lands in
  that window except by bypassing `PushPolicy` directly.

## Helper commands

Keep these to hand; the cases below refer back to them.

```bash
# The user id under test
UID=292

# Current registration state
php artisan tinker --execute="echo \App\Models\DeviceToken::where('user_id',$UID)->get(['platform','provider','last_registered_at'])->toJson();"

# Send straight to the device, bypassing PushPolicy entirely
php artisan tinker --execute="\$t = \App\Models\DeviceToken::where('user_id',$UID)->value('token'); \$m = \App\Notifications\Messages\ExpoMessage::make(\App\Enums\NotificationCategory::Rewards,'TITLE','BODY')->deepLink('/rewards'); app(\App\Services\FcmPushService::class)->send([\$t], \$m); echo 'sent';"

# Today's policy counters
php artisan tinker --execute="echo \App\Models\NotificationPreference::where('user_id',$UID)->first()?->toJson();"

# Reset the counters so a capped case can be re-run
php artisan tinker --execute="\App\Models\NotificationPreference::where('user_id',$UID)->update(['sent_count'=>0,'nag_sent'=>false]); echo 'reset';"

# Watch for failures
tail -f storage/logs/laravel.log | grep -iE "fcm|push"
```

---

## A. Registration

| # | Case | Steps | Expected |
| --- | --- | --- | --- |
| A1 | Fresh install registers | Install, sign in | A row appears with `provider = fcm`, `platform = android` |
| A2 | Permission denied | Fresh install, decline the prompt | No row. App works normally, no error shown |
| A3 | Permission granted later | After A2, enable in system settings, sign out and in | Row appears |
| A4 | Re-launch is idempotent | Force-quit, reopen | Still exactly one row; `last_registered_at` updates |
| A5 | Emulator | Sign in on an emulator | No row, no crash. `pushUnavailableReason()` returns the emulator message |

**A6 — token moves between accounts.** Sign in as user X, confirm a row. Sign
out, sign in as user Y on the same phone. The row must **move** to Y, not
duplicate. Anything else means the previous learner's notifications reach the new
one.

```bash
php artisan tinker --execute="echo \App\Models\DeviceToken::all(['user_id','provider','last_registered_at'])->toJson();"
```

**A7 — sign-out revokes.** Sign out. The row must disappear, so the account stops
pushing to a phone it no longer has.

---

## B. Delivery

Use the direct-send helper for these, so no policy rule can mask the result.

| # | App state | Expected |
| --- | --- | --- |
| B1 | Foreground | In-app toast, **no** tray entry |
| B2 | Backgrounded | System notification in the tray, brand-pink icon |
| B3 | Force-quit | System notification in the tray |
| B4 | Phone locked | Notification on the lock screen |
| B5 | Airplane mode, then back online | Delivered once connectivity returns (FCM queues it) |

B2 and B3 exercise different code paths: a backgrounded app gets the message
drawn by Android from the `notification` block, while a force-quit app is woken
through `setBackgroundMessageHandler`.

---

## C. Deep links

Send with `->deepLink(...)` and tap the notification. Each must open the app on
that screen, not the home screen.

| # | Route | Expected screen |
| --- | --- | --- |
| C1 | `/rewards` | Rewards |
| C2 | `/streak` | Streak |
| C3 | `/shop` | Shop |
| C4 | `/lesson/1` | that lesson, with the id in params |
| C5 | `/chapter/1` | that chapter |
| C6 | *(no deepLink)* | opens the app, no navigation, no crash |
| C7 | `/nonexistent-route` | opens the app, no navigation, no crash |

**C8 — tap while signed out.** Send one, sign out in the app, then tap it. It
must **not** navigate: every deep-link target is behind auth, so it would bounce
back to the intro. `openTarget()` guards on `isSignedIn`.

Do C1 from all three app states — foreground, backgrounded, force-quit — since
cold start collects the tap through `getInitialNotification()` rather than the
listener.

---

## D. PushPolicy

These use `$user->notify(...)` rather than the direct send, so the policy applies.

**D1 — daily cap.** `MAX_PER_DAY` is 3 across all categories combined.

```bash
php artisan tinker --execute="\App\Models\NotificationPreference::where('user_id',292)->update(['sent_count'=>0,'nag_sent'=>false]);"
# Fire four. The first three arrive, the fourth does not.
php artisan tinker --execute="\$u=\App\Models\User::find(292); for(\$i=1;\$i<=4;\$i++){ \$u->notify(new \App\Notifications\HeartsFullNotification()); } echo 'done';"
```

**D2 — billing bypasses the cap.** With `sent_count` at 3 already, a Billing
notification must still arrive. A declined card cannot be suppressed because the
learner had three league updates.

**D3 — low priority cannot take the last slot.** Set `sent_count` to 2, then send
`DailyChestReadyNotification` (marked `lowPriority()`). It must be refused, so the
final slot stays free for a streak-at-risk or billing push.

**D4 — quiet hours.** Set the user's timezone so local time is between 22:00 and
08:00, then send anything. Nothing may arrive, including Billing.

```bash
php artisan tinker --execute="\App\Models\User::where('id',292)->update(['timezone'=>'Pacific/Kiritimati']); echo 'tz set - check local hour';"
```

**D5 — one nag per day.** Two nag-category notifications on the same day must
yield exactly one.

**D6 — counters reset at local midnight.** Cap the user, roll their timezone over
midnight, confirm sending resumes.

---

## E. Category preferences

Six categories: `reminders`, `rewards`, `league`, `progress`, `family`, `billing`.

| # | Case | Expected |
| --- | --- | --- |
| E1 | Switch a category off in-app, send that category | Not delivered |
| E2 | Other categories still send | Delivered |
| E3 | Switch it back on | Delivered again |
| E4 | Preferences row auto-creates on first read | Row exists with everything on |

**E5 — Android channel toggles.** Settings → Apps → Languify → Notifications
lists seven channels (`default`, `reminders`, `rewards`, `league`, `progress`,
`family`, `billing`). Switch one off at OS level: the push still sends
server-side, but Android suppresses it. That is per-category opt-out working.

**E6 — no vibration.** No channel may vibrate. Android bakes this in at channel
creation, so a regression needs a new channel id, not an edit.

---

## F. Real triggers

Push fires from two places. Neither registration nor plain lesson completion is
one of them.

**Real time**

| Trigger | Notification |
| --- | --- |
| Streak broken | `StreakBrokenNotification` |
| Streak milestone reached | `StreakMilestoneNotification` |
| Daily streak goal reached | `StreakGoalReachedNotification` |
| Streak freeze consumed | `StreakFreezeUsedNotification` |
| League rollover | `LeagueResultNotification` |
| Subscription confirmed / cancelled / expired | matching notification |
| Payment failed | `PaymentFailedNotification` |
| Family invite accepted, member removed, plan cancelled | matching notification |

**Hourly sweep** (`notifications:daily-sweep`)

Lesson reminder, re-engagement, setup incomplete, unclaimed badge, league zone,
daily chest ready, hearts full, renewal reminder.

```bash
php artisan notifications:daily-sweep
```

Safe to run by hand: every sweep-fired send is dedupe-guarded by a column.

**F1** — complete a lesson that hits the daily streak goal, confirm
`StreakGoalReachedNotification` arrives.
**F2** — let hearts refill fully, run the sweep, confirm `HeartsFullNotification`.
**F3** — run the sweep twice in a row; the second must send nothing.

---

## G. Failure modes

| # | Case | Expected |
| --- | --- | --- |
| G1 | Bad credential | `Invalid JWT Signature` logged, no crash, other sends unaffected |
| G2 | Missing credential file | Skip logged, Expo-provider sends still work |
| G3 | Stale token (app uninstalled) | FCM reports it unregistered and the row is pruned |
| G4 | Malformed token | 422 at registration, no row |
| G5 | User with no device | `ExpoChannel` returns early, no error |
| G6 | Mixed providers on one account | Expo tokens go to `exp.host`, FCM tokens to FCM |

**G3 is worth doing deliberately.** Register, uninstall the app, then send. The
dead token must be removed rather than retried forever.

---

## H. Regression watch

The sweep runs hourly under cron with output sent to `/dev/null`, so a crash in
it is invisible. It has already happened once: an undefined variable killed every
notification for hours with no visible symptom.

After any change to `SendDailyNotifications` or the notification classes:

```bash
php artisan notifications:daily-sweep && echo "SWEEP OK"
```

It must print its counts line. Anything else means every notification is down.

---

## Recording results

| Case | Result | Notes |
| --- | --- | --- |
| A1 | | |
| B1 | | |
| B2 | | |
| C1 | | |
| D1 | | |
| E1 | | |
| F1 | | |

Copy the rows you actually run. For anything that fails, capture
`storage/logs/laravel.log` around the timestamp and, where the device is
implicated, `adb logcat | grep -iE "fcm|notifee|push"`.
