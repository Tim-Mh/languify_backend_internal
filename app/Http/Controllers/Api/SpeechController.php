<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SpeechService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class SpeechController extends Controller
{
    public function __construct(private readonly SpeechService $speech) {}

    #[OA\Get(
        path: '/api/speech',
        summary: 'Pronunciation audio for a word or sentence',
        description: 'Returns audio of the text spoken in the given language, rendering it on first request and serving it from disk afterwards. MP3 where this server can encode, WAV where it cannot. Public on purpose: an <audio> element and the phone\'s player both fetch this directly, and neither carries the session cookie cleanly across subdomains. Nothing here is user data — it is the pronunciation of catalogue content.',
        tags: ['Speech'],
        parameters: [
            new OA\Parameter(name: 'lang', in: 'query', required: true, description: 'Language code', schema: new OA\Schema(type: 'string', enum: ['en', 'es', 'fr', 'de', 'ja', 'ko', 'tr', 'ru', 'ar', 'az'])),
            new OA\Parameter(name: 'text', in: 'query', required: true, description: 'The text to speak', schema: new OA\Schema(type: 'string', maxLength: 300)),
        ],
        responses: [
            new OA\Response(response: 200, description: 'Audio', content: new OA\MediaType(mediaType: 'audio/mpeg')),
            new OA\Response(response: 422, description: 'Unknown language, or text missing or too long'),
            new OA\Response(response: 503, description: 'No speech engine on this server; the client falls back to the device voice'),
        ],
    )]
    public function show(Request $request): BinaryFileResponse|Response
    {
        $data = $request->validate([
            'lang' => ['required', 'string', Rule::in(array_keys(SpeechService::VOICES))],
            'text' => ['required', 'string', 'max:'.config('speech.max_characters')],
        ]);

        $path = $this->speech->render($data['text'], $data['lang']);

        if ($path === null) {
            // 503 rather than 404: the text is fine, this server just cannot
            // say it right now. Both clients read that as "use the device
            // voice instead" rather than "there is nothing to play".
            return response('', 503);
        }

        return response()->file($path, [
            // Taken from the file rather than assumed: this server serves MP3
            // when it has an encoder and WAV when it does not, and a player
            // handed the wrong type refuses audio it could have played.
            'Content-Type' => str_ends_with($path, '.mp3') ? 'audio/mpeg' : 'audio/wav',
            // The file for a given text can never change — the rendering
            // settings are part of its name — so it is safe to let browsers and
            // phones keep it forever and never ask again.
            'Cache-Control' => 'public, max-age=31536000, immutable',
        ]);
    }
}
