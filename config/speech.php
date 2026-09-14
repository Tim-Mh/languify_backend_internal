<?php

return [

    /*
    |--------------------------------------------------------------------------
    | eSpeak NG binary
    |--------------------------------------------------------------------------
    |
    | Pronunciation is rendered on this server rather than by the learner's
    | browser or phone, because the device only speaks languages it has a voice
    | installed for and most do not have one for Arabic, Turkish or
    | Azerbaijani — the request is accepted, nothing is heard, and no error is
    | raised.
    |
    | eSpeak NG is a few megabytes, needs no account or API key, and covers
    | every language this app teaches. Leave this as the bare command to use
    | whatever is on PATH, or give an absolute path when it is installed
    | somewhere the web user cannot see.
    |
    */

    'binary' => env('ESPEAK_BINARY', 'espeak-ng'),

    /*
    |--------------------------------------------------------------------------
    | Voice data directory
    |--------------------------------------------------------------------------
    |
    | eSpeak looks for `espeak-ng-data` next to where it was installed. A
    | package manager puts both in the right place and this can stay empty; a
    | build into a home directory — which is the only option on shared hosting
    | with no root — leaves the binary unable to find its voices, and it fails
    | with "no default voice found" rather than anything about a path.
    |
    | Set this to the directory CONTAINING `espeak-ng-data`, e.g.
    | /home/mhtechno/opt/espeak-ng/share.
    |
    */

    'data_path' => env('ESPEAK_DATA_PATH'),

    /*
    |--------------------------------------------------------------------------
    | Speaking rate
    |--------------------------------------------------------------------------
    |
    | Words per minute. eSpeak's own default is 175, which is a comfortable
    | reading speed and too fast to imitate. 150 matches the deliberately slow
    | rate the clients ask their local voices for.
    |
    */

    'words_per_minute' => (int) env('ESPEAK_WPM', 150),

    /*
    |--------------------------------------------------------------------------
    | Longest phrase
    |--------------------------------------------------------------------------
    |
    | The endpoint is public — audio has to be reachable by an <audio> tag and
    | by the phone's player, neither of which carries the session cookie
    | cleanly across subdomains — so the length cap is what stops the cache
    | being filled with someone else's novel.
    |
    */

    'max_characters' => (int) env('ESPEAK_MAX_CHARACTERS', 300),

    /*
    |--------------------------------------------------------------------------
    | Audio encoder
    |--------------------------------------------------------------------------
    |
    | eSpeak writes uncompressed WAV: about 56 KB for a single word. Measured
    | from a phone, sending those bytes took roughly a second — far longer than
    | rendering them — so a tapped word waited on the network rather than on the
    | speech engine. Re-encoded to MP3 the same word is 5-8 KB.
    |
    | Give the absolute path to `ffmpeg` or `lame`; the command is recognised by
    | its name. Leaving this empty serves WAV exactly as before, which is what
    | happens on a server with no encoder installed — the audio is simply
    | larger, never missing.
    |
    */

    'encoder' => env('SPEECH_ENCODER'),

    /*
    | Mono speech at 32 kbps is indistinguishable from the WAV for a synthesised
    | voice, and an order of magnitude smaller.
    */

    'bitrate' => (int) env('SPEECH_BITRATE', 32),

];
