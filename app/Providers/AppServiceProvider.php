<?php

namespace App\Providers;

use App\Notifications\Channels\ExpoChannel;
use Illuminate\Mail\MailManager;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Apple\AppleExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransportFactory;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerRelaxedSmtpDriver();
        $this->registerExpoPushChannel();

        Event::listen(SocialiteWasCalled::class, [AppleExtendSocialite::class, 'handle']);
    }

    /**
     * Makes 'expo' usable in a notification's via(), alongside 'mail'.
     *
     * Through resolved() rather than a direct extend() so the channel manager is
     * only built when something actually notifies — registering it eagerly would
     * boot the notification system on every request, including the ones that
     * never send anything.
     */
    private function registerExpoPushChannel(): void
    {
        Notification::resolved(function (ChannelManager $manager) {
            $manager->extend('expo', fn ($app) => $app->make(ExpoChannel::class));
        });
    }

    /**
     * Override the built-in 'smtp' mail driver so the underlying Symfony
     * SocketStream receives stream options that disable peer-cert
     * verification.
     *
     * Why this exists:
     * A2 Hosting (our host) MITMs outbound SSL/TLS on ports 465 and 587 and
     * presents their own cert. PHP 8.4 tightened stream-context defaults, so
     * Symfony Mailer's STARTTLS step fails with:
     *   "Peer certificate CN=... did not match expected CN=..."
     *
     * Neither of the usual workarounds is viable on Laravel 12:
     *   - Adding a 'stream' key to config/mail.php — MailManager::configureSmtpTransport()
     *     silently ignores it (only source_ip and timeout are passed through).
     *   - stream_context_set_default() in boot — Symfony's SocketStream always
     *     creates its own explicit context for stream_socket_client(), so the
     *     process-wide default never applies.
     *
     * Only correct fix: replace the 'smtp' mailer driver entirely and call
     * setStreamOptions() on the SocketStream ourselves. That's what this
     * extension does. Inert for the current localhost:25 plaintext Exim
     * setup (no TLS negotiation happens), but needed if the mailer is ever
     * pointed at an external TLS host (e.g. the commented-out Gmail SMTP
     * fallback in .env) while still on A2. Confirmed working via the same
     * fix in the theunsentletters-backend sibling project.
     *
     * The connection is still encrypted; we just stop enforcing that the
     * cert CN match the destination host. A2 already sits in the middle of
     * the network, so stricter cert verification on top of a hostile network
     * doesn't buy security — it just breaks mail delivery.
     */
    private function registerRelaxedSmtpDriver(): void
    {
        $this->app->resolving(MailManager::class, function (MailManager $manager) {
            $manager->extend('smtp', function (array $config) {
                $factory = new EsmtpTransportFactory();

                $scheme = $config['scheme'] ?? null;
                if (! $scheme) {
                    $encryption = $config['encryption'] ?? env('MAIL_ENCRYPTION');
                    $port = $config['port'] ?? null;

                    if ($encryption === 'ssl' || ($port == 465 && ! $encryption)) {
                        $scheme = 'smtps';
                    } elseif ($encryption === 'tls' && $port == 465) {
                        $scheme = 'smtps';
                    } else {
                        $scheme = 'smtp';
                    }
                }

                $transport = $factory->create(new Dsn(
                    $scheme,
                    $config['host'] ?? '127.0.0.1',
                    $config['username'] ?? null,
                    $config['password'] ?? null,
                    $config['port'] ?? null,
                    $config,
                ));

                $stream = $transport->getStream();
                if ($stream instanceof SocketStream) {
                    $stream->setStreamOptions([
                        'ssl' => [
                            'verify_peer'       => false,
                            'verify_peer_name'  => false,
                            'allow_self_signed' => true,
                        ],
                    ]);

                    if (isset($config['timeout'])) {
                        $stream->setTimeout($config['timeout']);
                    }
                    if (isset($config['source_ip'])) {
                        $stream->setSourceIp($config['source_ip']);
                    }
                }

                return $transport;
            });
        });
    }
}
