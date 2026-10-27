# Deploying the Languify backend to A2 Hosting

For the release that adds direct FCM push, the 20-notification catalogue and
native Apple sign-in. Written for the cPanel account `mhtechno`, deploying by
`git pull` over SSH rather than CI/CD.

Run everything from the repo root on the server unless a step says otherwise.

---

## 0. Before you deploy: rotate the leaked Firebase key

The service-account key was committed to
`github.com/Tim-Mh/languify_backend_internal` in commit `c5da9db`. **Deleting
the file does not fix it.** The key stays valid, and it stays in git history.

1. Firebase Console → Project Settings → **Service accounts** → Manage service
   account keys.
2. Delete the existing key, then **Add key → Create new key → JSON**.
3. Keep the downloaded file somewhere safe. It is the only copy.
4. Add `firebase-credentials.json` to `.gitignore` in both backend checkouts so
   this cannot recur.
5. Purge the old file from history (`git filter-repo --path firebase-credentials.json --invert-paths`)
   or delete and recreate the repo.

Do not skip this because the repo is private. Private repos leak through forks,
clones and CI logs, and the key grants server-side access to the Firebase
project.

---

## 1. Put the new key on the server

Place it **outside the repo**, not at the project root.

The code reads `config/services.php`:

```php
'credentials' => env('FIREBASE_CREDENTIALS') ?: base_path('firebase-credentials.json'),
```

The default works only because the domain's Document Root points at `public/`,
so the project root is not web-served. That is one cPanel misconfiguration away
from publishing your private key. Putting it outside the web tree entirely
removes that risk and also means it can never be committed by accident.

```bash
# On your machine — upload the freshly generated key
scp firebase-credentials.json mhtechno@<server>:/home/mhtechno/secrets/firebase-credentials.json
```

```bash
# On the server — lock it down
mkdir -p /home/mhtechno/secrets
chmod 700 /home/mhtechno/secrets
chmod 600 /home/mhtechno/secrets/firebase-credentials.json
```

`600` means only the account owner can read it. The web server runs as that same
user on cPanel, so PHP can still open it.

Confirm it is not reachable over the web. This must return 404:

```bash
curl -s -o /dev/null -w "%{http_code}\n" https://api.languify.us/firebase-credentials.json
```

---

## 2. Update `.env` on the server

Two new keys. Everything else in `.env` stays as it is.

```dotenv
# Absolute path to the service-account key from step 1.
FIREBASE_CREDENTIALS=/home/mhtechno/secrets/firebase-credentials.json

# The iOS bundle id, accepted as a native Sign in with Apple audience.
# The native sheet mints tokens against the bundle id, not the web Services ID.
APPLE_NATIVE_CLIENT_ID=us.languify.app
```

Check these existing values are still right while you are in there:

| Key | Should be |
| --- | --- |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://api.languify.us` |
| `FRONTEND_URLS` | must list the real frontend origin, or login breaks cross-subdomain |
| `SANCTUM_STATEFUL_DOMAINS` | same |
| `MAIL_HOST` / `MAIL_PORT` | `localhost` / `25` (local Exim, no auth) |
| `QUEUE_CONNECTION` | see step 5 |

`GOOGLE_CLIENT_ID`, `APPLE_CLIENT_ID` and friends are unchanged by this release.

---

## 3. Deploy

```bash
cd ~/path/to/backend

# Take a database snapshot first. Three migrations run below and there is no
# down-path you want to discover under pressure.
mysqldump -u <db_user> -p <db_name> > ~/backups/pre-fcm-$(date +%F-%H%M).sql

php artisan down --render="errors::503"

git pull origin main

# --no-dev keeps dev tooling off production; the optimised autoloader matters
# on shared hosting. This release adds firebase/php-jwt, so it is not optional.
composer install --no-dev --optimize-autoloader

php artisan migrate --force

# Rebuild every cache against the new config and routes. Clear before cache, or
# a stale config cache keeps the old FIREBASE_CREDENTIALS value.
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan up
```

`--force` on `migrate` is required: without it Laravel refuses to run
migrations in production.

### What the three new migrations do

| Migration | Change |
| --- | --- |
| `2026_08_05_120000_add_provider_to_device_tokens_table` | adds `provider` to `device_tokens`, so FCM and Expo tokens can coexist |
| `2026_08_05_130000_add_push_nudge_tracking_to_user_game_states` | dedupe columns so a sweep-fired nudge sends once |
| `2026_08_05_140000_add_renewal_reminder_to_user_subscriptions_table` | dedupe column for the yearly renewal reminder |

All three are additive column adds. Nothing is dropped or rewritten, so the
rollback risk is low, but take the dump anyway.

### If the target is more than one release behind, read this

`migrate` runs everything outstanding, not just this release's three. A server
that had not taken the previous release also picks up
`2026_08_04_120000_default_languages_to_inactive`, which ends with:

```php
DB::table('languages')->update(['is_active' => false]);
```

**That switches every existing language off**, which empties the native and
learning pickers. Learners already enrolled keep their course, progress and
lessons, since only the pickers read `is_active` — but nobody can sign up or add
a course until an admin turns languages back on.

It is intended behaviour: seeding a language and publishing it became two
separate acts, so a half-written course can no longer reach the pickers by
accident. It is only a surprise when it arrives bundled with an unrelated
deploy. Check straight after migrating:

```bash
php artisan tinker --execute="echo \App\Models\Language::orderBy('code')->get(['code','name','is_active'])->toJson(JSON_PRETTY_PRINT);"
```

Re-publish through `/admin/language-activation`, or directly:

```bash
php artisan tinker --execute="\App\Models\Language::whereIn('code', ['en','es','fr','de','ja','ko'])->update(['is_active' => true]); echo 'activated';"
```

List only the languages that are actually ready to publish.

---

## 4. Cron

Everything is scheduled inside `routes/console.php`, so the server needs exactly
**one** cron entry driving Laravel's scheduler. If it is already there from a
previous deploy, leave it alone.

cPanel → Cron Jobs → add, **every minute**:

```
* * * * * cd /home/mhtechno/path/to/backend && /usr/local/bin/php artisan schedule:run >> /dev/null 2>&1
```

Check the PHP binary path first, since A2 often has several:

```bash
which php
php -v      # must be 8.3 or newer; composer.json requires ^8.3
```

That one entry drives all of these:

| Command | When |
| --- | --- |
| `notifications:daily-sweep` | hourly, `withoutOverlapping()` |
| `subscriptions:sync` | daily 00:10 |
| `subscriptions:expire` | daily 00:40 |
| `league:rollover` | weekly, Monday 00:00 |

`php artisan schedule:list` should show all four.

The sweep runs hourly rather than daily because each notification is timed to
the user's own local time, which lands at a different UTC instant per timezone.

---

## 5. Queue worker: only if `QUEUE_CONNECTION=database`

Push notifications are **not** queued. Neither are the subscription or family
emails. But `OtpNotification` and `PasswordResetNotification` are, so:

- **`QUEUE_CONNECTION=sync`** — nothing more to do, and this is the simpler
  choice at current scale since OTP delivery is latency-sensitive anyway.
- **`QUEUE_CONNECTION=database`** — a worker must actually be running or
  **OTP and password-reset emails never send.** Add a second cron entry:

```
* * * * * cd /home/mhtechno/path/to/backend && /usr/local/bin/php artisan queue:work --stop-when-empty --tries=3 >> /dev/null 2>&1
```

`--stop-when-empty` suits cron: the worker drains the queue and exits rather
than running forever, so overlapping invocations cannot pile up.

---

## 6. Verify

```bash
# Migrations landed
php artisan migrate:status | tail -5

# The provider column exists
php artisan tinker --execute="echo implode(', ', \Illuminate\Support\Facades\Schema::getColumnListing('device_tokens'));"

# Laravel can actually read the key — must print the path, then true
php artisan tinker --execute="\$p = config('services.fcm.credentials'); echo \$p, PHP_EOL; var_dump(is_readable(\$p));"

# The scheduler sees all three commands
php artisan schedule:list

# API is up. /api/languages sits behind auth, so an anonymous request returning
# 401 with {"message":"Unauthenticated."} is the healthy answer: it proves
# routing and middleware are both alive. A 500 or a connection error is not.
curl -s -o /dev/null -w "%{http_code}\n" https://api.languify.us/api/languages

# Languages are actually published. The endpoint above cannot show this without
# a token, so read it from the database.
php artisan tinker --execute="echo \App\Models\Language::orderBy('code')->get(['code','name','is_active'])->toJson(JSON_PRETTY_PRINT);"
```

Then the real end-to-end check, from the mobile app:

1. Sign in on a physical device. Emulators are never issued a push token.
2. Confirm a row appears in `device_tokens` with `provider = 'fcm'`.
3. Trigger a push and confirm it arrives.

```bash
# Watch for FCM failures while testing
tail -f storage/logs/laravel.log | grep -i "fcm\|firebase\|push"
```

A missing or unreadable credentials file is **not** a hard failure: FCM sends
are skipped with a log line, so a silent absence of notifications will show up
here rather than as an error to the user.

---

## Rollback

```bash
php artisan down
git reset --hard 819bda0        # the commit before the merge
composer install --no-dev --optimize-autoloader
php artisan config:clear && php artisan config:cache
php artisan up
```

The three new columns can stay. They are additive and the previous code ignores
them, so there is no need to reverse the migrations to get back to a working
state.

---

## Notes

- **Document Root must point at `public/`**, not the repo root. If it points at
  the root, `.env` and the whole application are web-reachable. Worth
  re-checking as part of any deploy.
- **Git auth** on this account is a GitHub classic PAT over HTTPS. Prefer being
  prompted for username and token over embedding the token in the remote URL,
  which would leave it in `.git/config` in plaintext.
- Mobile push will not work until the app is also shipped with the bare React
  Native build, since the Expo build issues `ExponentPushToken[…]` values. Both
  token shapes are accepted, so the two can be rolled out in either order.
