<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Exception\ProcessTimedOutException;
use Symfony\Component\Process\Process;

/**
 * Renders a word or sentence to speech, and remembers it.
 *
 * WHY THIS EXISTS
 *
 * Both clients used to ask the device to read the text aloud: `speechSynthesis`
 * on the web, the system TTS engine on the phone. That only works for languages
 * the device has a voice installed for, and it fails silently when it does not —
 * the call is accepted, nothing plays, no error is raised, and the button just
 * looks dead.
 *
 * Chrome on Windows is the clearest case. It carries voices for English,
 * Spanish, French, German, Japanese, Korean and Russian, and none at all for
 * Arabic, Turkish or Azerbaijani. Three of the ten languages this app teaches
 * simply could not be heard, and no amount of voice-picking logic in the client
 * could fix that, because there was no voice on the machine to pick.
 *
 * So the audio is made here instead. eSpeak NG needs no account, no API key and
 * no network, has no quota that can run out and no vendor that can start
 * charging, and it speaks all ten languages including Azerbaijani, which even
 * the paid cloud engines mostly do not.
 *
 * HOW IT CACHES
 *
 * The catalogue is fixed, so a given word is rendered once, ever. The first
 * learner to reach it pays for the render — well under a second — and everyone
 * after that gets a file off disk. Nothing is generated for content nobody
 * opens, which is why this is on demand rather than a batch job.
 *
 * Files live in `storage/app/speech` rather than `public/`, so no storage
 * symlink is needed on the shared hosting this deploys to. The controller
 * serves them with a long cache header, so a browser only fetches each one
 * once anyway.
 *
 * WHY IT ENCODES
 *
 * eSpeak writes uncompressed WAV, which is about 56 KB for one word. Timed from
 * a phone, pushing those bytes took close to a second while the render itself
 * took under three tenths — so the wait on a tapped word was almost entirely
 * transfer, not speech. The same word as 32 kbps mono MP3 is 5-8 KB.
 *
 * The encoder is optional on purpose. A server without one keeps serving WAV,
 * exactly as before; the audio is bigger, never absent.
 */
class SpeechService
{
    /**
     * eSpeak NG's own voice identifiers, which are not always the language code
     * we use: English, French and Spanish are regional there, the rest are not.
     */
    public const VOICES = [
        'en' => 'en-us',
        'es' => 'es-es',
        'fr' => 'fr-fr',
        'de' => 'de',
        'ja' => 'ja',
        'ko' => 'ko',
        'tr' => 'tr',
        'ru' => 'ru',
        'ar' => 'ar',
        'az' => 'az',
    ];

    /**
     * Part of the cache key rather than something to purge by hand.
     *
     * The cache IS the audio learners hear, so changing the voice or the
     * speaking rate has to produce different filenames — otherwise the old
     * rendering is served forever and the setting appears to do nothing. Bump
     * this when the rendering changes.
     *
     * Deliberately NOT bumped for the MP3 change: the format lives in the file
     * extension instead, so the WAVs already on disk stay valid and are
     * re-encoded in place the next time each one is asked for, rather than
     * every word in the catalogue being re-rendered at once.
     */
    private const RENDER_VERSION = 1;

    public function supports(string $language): bool
    {
        return isset(self::VOICES[$language]);
    }

    /**
     * The absolute path to this text's audio, rendering it if this is the first
     * time it has been asked for. Null when it cannot be produced at all, which
     * the clients treat as "fall back to the device's own voice".
     *
     * The extension tells the caller what it got: `.mp3` when this server can
     * encode, `.wav` when it cannot.
     */
    public function render(string $text, string $language): ?string
    {
        $text = $this->normalise($text);

        if ($text === '' || ! $this->supports($language)) {
            return null;
        }

        $mp3 = $this->pathFor($text, $language, 'mp3');

        if ($this->isUsable($mp3)) {
            return $mp3;
        }

        $wav = $this->pathFor($text, $language, 'wav');

        // Already rendered by an older deploy, or by a request that ran before
        // an encoder was configured. Encoding it now costs one request rather
        // than a re-render, and every request after this one is small.
        if ($this->isUsable($wav)) {
            return $this->encode($wav, $mp3) ?? $wav;
        }

        return $this->generate($text, $language, $wav, $mp3);
    }

    private function isUsable(string $path): bool
    {
        return is_file($path) && filesize($path) > 0;
    }

    /**
     * Collapse whitespace so "un  café" and "un café" are one cache entry
     * rather than two, and strip control characters, which eSpeak would either
     * read out or choke on.
     */
    private function normalise(string $text): string
    {
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $text) ?? '';
        $text = preg_replace('/\s+/u', ' ', $text) ?? '';

        return mb_substr(trim($text), 0, config('speech.max_characters'));
    }

    private function pathFor(string $text, string $language, string $extension): string
    {
        $hash = hash('sha256', self::RENDER_VERSION.'|'.$language.'|'.$text);

        // Sharded by the first two characters: one directory holding tens of
        // thousands of files is slow to stat on the shared hosting this runs on.
        return storage_path("app/speech/{$language}/".substr($hash, 0, 2)."/{$hash}.{$extension}");
    }

    private function generate(string $text, string $language, string $wav, string $mp3): ?string
    {
        $directory = dirname($wav);

        if (! is_dir($directory) && ! @mkdir($directory, 0755, true) && ! is_dir($directory)) {
            Log::warning('speech: could not create cache directory', ['directory' => $directory]);

            return null;
        }

        // Rendered to a temporary name and moved into place, so a request that
        // arrives while this one is still writing either sees no file or sees a
        // complete one — never a half-written header that the player rejects
        // and then caches as broken.
        $temp = $wav.'.'.bin2hex(random_bytes(6)).'.tmp';

        $command = [
            config('speech.binary'),
            '-v', self::VOICES[$language],
            '-s', (string) config('speech.words_per_minute'),
            '-w', $temp,
        ];

        if ($dataPath = config('speech.data_path')) {
            $command[] = '--path='.$dataPath;
        }

        $process = new Process($command);

        // The text goes in on stdin rather than as an argument. Passing it on
        // the command line means the shell's code page decides how the bytes
        // are read, which mangles every non-Latin script — the exact languages
        // this exists for.
        $process->setInput($text);
        $process->setTimeout(15);

        try {
            $process->run();
        } catch (ProcessTimedOutException) {
            @unlink($temp);
            Log::warning('speech: render timed out', ['language' => $language]);

            return null;
        } catch (\Throwable $e) {
            // Shared hosting often disables proc_open, and Process throws
            // rather than returning a failure code when it cannot start at all.
            // That must degrade to "this server cannot speak" — which the
            // clients answer by using the device's own voice — not to a 500.
            @unlink($temp);
            Log::warning('speech: could not start the renderer', [
                'language' => $language,
                'error' => $e->getMessage(),
            ]);

            return null;
        }

        if (! $process->isSuccessful() || ! is_file($temp) || filesize($temp) === 0) {
            @unlink($temp);
            Log::warning('speech: render failed', [
                'language' => $language,
                'exit' => $process->getExitCode(),
                'error' => trim($process->getErrorOutput()),
            ]);

            return null;
        }

        if (! @rename($temp, $wav)) {
            @unlink($temp);

            return null;
        }

        return $this->encode($wav, $mp3) ?? $wav;
    }

    /**
     * Re-encodes a rendered WAV to MP3 and returns the new path, or null when
     * this server has no encoder or the encode failed — in which case the
     * caller serves the WAV, which is correct, just larger.
     *
     * The WAV is deleted once its MP3 exists. It is never served again, and
     * keeping both would hold ten times the disk for no benefit.
     */
    private function encode(string $wav, string $mp3): ?string
    {
        $encoder = config('speech.encoder');

        if (! $encoder) {
            return null;
        }

        $temp = $mp3.'.'.bin2hex(random_bytes(6)).'.tmp.mp3';
        $bitrate = (int) config('speech.bitrate');

        // Recognised by name so either tool can be dropped in — a host with no
        // root has whichever of them was easiest to get hold of.
        $command = str_contains(basename($encoder), 'lame')
            ? [$encoder, '-b', (string) $bitrate, '-m', 'm', '--quiet', $wav, $temp]
            : [
                $encoder, '-y', '-loglevel', 'error',
                '-i', $wav,
                '-ac', '1',
                '-codec:a', 'libmp3lame', '-b:a', $bitrate.'k',
                '-f', 'mp3', $temp,
            ];

        try {
            $process = new Process($command);
            $process->setTimeout(15);
            $process->run();
        } catch (\Throwable $e) {
            @unlink($temp);
            Log::warning('speech: could not start the encoder', ['error' => $e->getMessage()]);

            return null;
        }

        if (! $process->isSuccessful() || ! is_file($temp) || filesize($temp) === 0) {
            @unlink($temp);
            Log::warning('speech: encode failed', [
                'exit' => $process->getExitCode(),
                'error' => trim($process->getErrorOutput()),
            ]);

            return null;
        }

        if (! @rename($temp, $mp3)) {
            @unlink($temp);

            return null;
        }

        @unlink($wav);

        return $mp3;
    }
}
