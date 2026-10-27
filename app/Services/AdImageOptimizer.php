<?php

namespace App\Services;

use App\Enums\AdPlacement;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Shrinks and re-encodes an uploaded ad image before it is stored.
 *
 * The admin page already compresses in the browser, so most uploads arrive
 * small. This is the server's safety net for anything that did not go through
 * that path: the image is fitted into the placement's box (never enlarged),
 * re-encoded as WebP and saved under a fresh random name. Plain PHP GD, so
 * there is nothing extra to install on the shared host.
 *
 * Never fails an upload: if GD cannot decode the file or has no WebP encoder,
 * the original is stored unchanged.
 */
class AdImageOptimizer
{
    private const WEBP_QUALITY = 90;

    private const DIRECTORY = 'ads';

    /** Stores the image on the public disk and returns its path. */
    public function store(UploadedFile $file, AdPlacement $placement): string
    {
        // Already a WebP that fits the box: the admin page compressed it in
        // the browser. Re-encoding it would only compress it a second time and
        // blur it, so it is stored exactly as sent.
        if ($this->alreadyOptimized($file, $placement)) {
            return $file->storeAs(self::DIRECTORY, Str::random(40).'.webp', 'public');
        }

        $optimized = $this->optimize($file, $placement);

        if ($optimized === null) {
            return $file->store(self::DIRECTORY, 'public');
        }

        $path = self::DIRECTORY.'/'.Str::random(40).'.webp';
        Storage::disk('public')->put($path, $optimized);

        return $path;
    }

    private function alreadyOptimized(UploadedFile $file, AdPlacement $placement): bool
    {
        if ($file->getMimeType() !== 'image/webp') {
            return false;
        }

        $size = @getimagesize($file->getRealPath());
        [$boxWidth, $boxHeight] = $placement->box();

        return $size !== false && $size[0] <= $boxWidth && $size[1] <= $boxHeight;
    }

    /** The WebP bytes, or null when GD cannot handle this file. */
    private function optimize(UploadedFile $file, AdPlacement $placement): ?string
    {
        if (! function_exists('imagewebp') || ! function_exists('imagecreatefromstring')) {
            return null;
        }

        $source = @imagecreatefromstring((string) file_get_contents($file->getRealPath()));

        if ($source === false) {
            return null;
        }

        [$boxWidth, $boxHeight] = $placement->box();
        $width = imagesx($source);
        $height = imagesy($source);
        $scale = min(1, $boxWidth / $width, $boxHeight / $height);
        $targetWidth = max(1, (int) round($width * $scale));
        $targetHeight = max(1, (int) round($height * $scale));

        $target = imagecreatetruecolor($targetWidth, $targetHeight);

        // Keep transparency: a PNG logo on a clear background must not turn black.
        imagealphablending($target, false);
        imagesavealpha($target, true);
        imagefill($target, 0, 0, imagecolorallocatealpha($target, 0, 0, 0, 127));

        imagecopyresampled($target, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

        ob_start();
        $encoded = imagewebp($target, null, self::WEBP_QUALITY);
        $bytes = ob_get_clean();

        imagedestroy($source);
        imagedestroy($target);

        return $encoded && $bytes ? $bytes : null;
    }
}
