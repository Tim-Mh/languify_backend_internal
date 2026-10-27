@extends('layouts.admin')

@php($editing = $campaign->exists)
@php($maxImages = \App\Http\Controllers\Admin\AdCampaignController::MAX_IMAGES_PER_UPLOAD)

@section('title', $editing ? 'Edit Ad' : 'Add Ad')

@section('content')
    @if (session('status'))
        <div class="mb-4 rounded bg-green-100 text-green-800 px-4 py-2 text-sm">{{ session('status') }}</div>
    @endif

    <a href="{{ route('admin.ads.index') }}" class="text-sm text-blue-600 hover:underline">&larr; Back to ads</a>

    {{-- Current images sit outside the main form: each has its own small
         toggle/delete form, and forms cannot be nested. --}}
    @if ($editing)
        <div class="bg-white rounded-lg shadow p-6 mt-4 max-w-3xl">
            <h2 class="font-semibold mb-1">Current images</h2>
            <p class="text-sm text-gray-500 mb-4">Changes here apply immediately.</p>
            @if ($campaign->ads->isEmpty())
                <p class="text-sm text-gray-500">No images yet. Add some below.</p>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    @foreach ($campaign->ads as $ad)
                        <div class="border rounded-lg overflow-hidden">
                            <img src="{{ $ad->url() }}" alt="{{ $ad->image_alt }}" loading="lazy" class="w-full h-28 object-contain bg-gray-50 {{ $ad->is_active ? '' : 'opacity-30 grayscale' }}">
                            <div class="flex items-center justify-between px-2 py-2 text-sm">
                                <form action="{{ route('admin.ads.toggle', $ad) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2 py-0.5 rounded text-xs font-medium {{ $ad->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                        {{ $ad->is_active ? 'On' : 'Off' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST"
                                    data-confirm="This image will be removed from the ad, along with its views and clicks." data-confirm-title="Delete this image?">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-xs">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @endif

    <form id="ad-form" method="POST" enctype="multipart/form-data"
        action="{{ $editing ? route('admin.ad-campaigns.update', $campaign) : route('admin.ad-campaigns.store') }}"
        class="bg-white rounded-lg shadow p-6 mt-4 max-w-3xl space-y-5" novalidate>
        @csrf

        <div id="form-errors" class="hidden rounded bg-red-50 border border-red-200 text-red-800 px-4 py-3 text-sm"></div>

        <div>
            <label for="placement" class="block text-sm font-medium mb-1">Show on</label>
            @if ($editing)
                <p class="text-sm text-gray-700">{{ $campaign->placement->label() }} <span class="text-gray-400">(cannot be changed)</span></p>
                <input type="hidden" id="placement" value="{{ $campaign->placement->value }}">
            @else
                <select id="placement" name="placement" class="w-full border rounded px-3 py-2">
                    @foreach ($placements as $option)
                        <option value="{{ $option->value }}" @selected($campaign->placement === $option)>{{ $option->label() }}</option>
                    @endforeach
                </select>
            @endif
            <p id="placement-guidance" class="text-xs text-gray-500 mt-1"></p>
        </div>

        <div>
            <label for="product_name" class="block text-sm font-medium mb-1">Product name</label>
            <input id="product_name" name="product_name" maxlength="120" value="{{ $campaign->product_name }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label for="link_url" class="block text-sm font-medium mb-1">Web link</label>
            <input id="link_url" name="link_url" type="url" maxlength="2048" placeholder="https://" value="{{ $campaign->link_url }}" class="w-full border rounded px-3 py-2" required>
            <p class="text-xs text-gray-500 mt-1">Must start with http:// or https://. Tapping the ad opens this link.</p>
        </div>

        <label class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" @checked($campaign->is_active)>
            <span class="text-sm">Show this ad</span>
        </label>

        <div>
            <label for="images" class="block text-sm font-medium mb-1">{{ $editing ? 'Add more images' : 'Images' }}</label>
            <input id="images" type="file" accept="image/jpeg,image/png,image/webp" multiple class="block w-full text-sm">
            <p class="text-xs text-gray-500 mt-1">
                Up to {{ $maxImages }} images at a time. JPG, PNG or WebP. Each image is shrunk and compressed in your browser before it is uploaded.
            </p>
            <p id="picker-message" class="hidden text-xs text-amber-700 mt-1"></p>
            <div id="previews" class="grid grid-cols-2 sm:grid-cols-3 gap-3 mt-3"></div>
        </div>

        <div class="flex items-center gap-3">
            <button id="save" type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-60">Save</button>
            <a href="{{ route('admin.ads.index') }}" class="text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
@endsection

@push('scripts')
<script>
(() => {
    const MAX_IMAGES = {{ $maxImages }}
    const MAX_PICK_BYTES = 20 * 1024 * 1024
    const MAX_UPLOAD_BYTES = 2 * 1024 * 1024
    const BOXES = @json(collect($placements)->mapWithKeys(fn ($p) => [$p->value => $p->box()]));
    const GUIDANCE = @json(collect($placements)->mapWithKeys(fn ($p) => [$p->value => $p->guidance()]));
    const EDITING = @json($editing);

    const form = document.getElementById('ad-form')
    const placement = document.getElementById('placement')
    const guidance = document.getElementById('placement-guidance')
    const input = document.getElementById('images')
    const previews = document.getElementById('previews')
    const pickerMessage = document.getElementById('picker-message')
    const errors = document.getElementById('form-errors')
    const save = document.getElementById('save')

    let picked = []

    const showGuidance = () => { guidance.textContent = 'Recommended size: ' + GUIDANCE[placement.value] }
    showGuidance()
    placement.addEventListener('change', showGuidance)

    const mb = (bytes) => (bytes / 1024 / 1024).toFixed(2) + ' MB'

    function note(text) {
        pickerMessage.textContent = text
        pickerMessage.classList.toggle('hidden', !text)
    }

    function renderPreviews() {
        previews.replaceChildren(...picked.map((file, index) => {
            const card = document.createElement('div')
            card.className = 'relative border rounded-lg overflow-hidden'
            const img = document.createElement('img')
            img.src = URL.createObjectURL(file)
            img.alt = file.name
            img.className = 'w-full h-28 object-contain bg-gray-50'
            img.onload = () => URL.revokeObjectURL(img.src)
            const name = document.createElement('p')
            name.className = 'text-xs text-gray-600 px-2 py-1 truncate'
            name.textContent = file.name + ' (' + mb(file.size) + ')'
            const remove = document.createElement('button')
            remove.type = 'button'
            remove.className = 'absolute top-1 right-1 bg-white/90 rounded-full w-6 h-6 text-gray-700 shadow hover:bg-red-50'
            remove.setAttribute('aria-label', 'Remove ' + file.name)
            remove.textContent = '×'
            remove.onclick = () => { picked.splice(index, 1); note(''); renderPreviews() }
            card.append(img, name, remove)
            return card
        }))
    }

    input.addEventListener('change', () => {
        const messages = []
        for (const file of input.files) {
            if (!/^image\/(jpeg|png|webp)$/.test(file.type)) { messages.push(file.name + ' is not a JPG, PNG or WebP image.'); continue }
            if (file.size > MAX_PICK_BYTES) { messages.push(file.name + ' is over 20 MB and was skipped.'); continue }
            if (picked.length >= MAX_IMAGES) { messages.push('Only ' + MAX_IMAGES + ' images can be uploaded at a time. Save, then add more from Edit.'); break }
            picked.push(file)
        }
        input.value = ''
        note(messages.join(' '))
        renderPreviews()
    })

    const toBlob = (canvas, type, quality) => new Promise((resolve) => canvas.toBlob(resolve, type, quality))

    /**
     * Shrinks an image to fit the placement's box (never enlarging it) and
     * re-encodes it as WebP, or JPEG where the browser has no WebP encoder.
     * Falls back to the original when compressing would not help or fails.
     */
    async function compress(file, [boxWidth, boxHeight]) {
        try {
            const bitmap = await createImageBitmap(file)
            const scale = Math.min(1, boxWidth / bitmap.width, boxHeight / bitmap.height)
            const canvas = document.createElement('canvas')
            canvas.width = Math.max(1, Math.round(bitmap.width * scale))
            canvas.height = Math.max(1, Math.round(bitmap.height * scale))
            canvas.getContext('2d').drawImage(bitmap, 0, 0, canvas.width, canvas.height)
            bitmap.close?.()

            let blob = await toBlob(canvas, 'image/webp', 0.92)
            if (!blob || blob.type !== 'image/webp') blob = await toBlob(canvas, 'image/jpeg', 0.92)
            if (!blob) return file

            // An already right-sized original that is smaller wins.
            if (scale === 1 && blob.size >= file.size) return file

            const extension = blob.type === 'image/webp' ? '.webp' : '.jpg'
            return new File([blob], file.name.replace(/\.[^.]+$/, '') + extension, { type: blob.type })
        } catch {
            return file
        }
    }

    function showErrors(list) {
        errors.replaceChildren(...list.map((text) => Object.assign(document.createElement('p'), { textContent: text })))
        errors.classList.toggle('hidden', list.length === 0)
        if (list.length) errors.scrollIntoView({ behavior: 'smooth', block: 'center' })
    }

    form.addEventListener('submit', async (event) => {
        event.preventDefault()
        showErrors([])

        if (!EDITING && picked.length === 0) {
            showErrors(['Choose at least one image.'])
            return
        }

        save.disabled = true
        let done = false
        try {
            const box = BOXES[placement.value]
            let files = picked

            if (files.length) {
                save.textContent = 'Optimizing images…'
                files = await Promise.all(picked.map((file) => compress(file, box)))
                const tooBig = files.filter((file) => file.size > MAX_UPLOAD_BYTES)
                if (tooBig.length) {
                    showErrors(tooBig.map((file) => file.name + ' is still ' + mb(file.size) + ' after compression. The limit is 2 MB, so please use a smaller image.'))
                    return
                }
            }

            // Only the compressed files are sent; the originals never leave the browser.
            const data = new FormData(form)
            for (const file of files) data.append('images[]', file, file.name)

            save.textContent = files.length ? 'Uploading ' + files.length + ' ' + (files.length === 1 ? 'image' : 'images') + '…' : 'Saving…'

            const response = await fetch(form.action, {
                method: 'POST',
                body: data,
                headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                credentials: 'same-origin',
            })

            if (response.ok) {
                done = true
                window.location.href = (await response.json()).redirect
                return
            }

            if (response.status === 422) {
                const body = await response.json()
                showErrors(Object.values(body.errors ?? {}).flat().map((text) =>
                    text.replace(/images\.(\d+)/, (_, i) => files[i] ? files[i].name : 'An image')))
            } else if (response.status === 413) {
                showErrors(['The upload is too large for the server. Try fewer or smaller images.'])
            } else if (response.status === 419) {
                showErrors(['Your session expired. Reload the page and try again.'])
            } else {
                showErrors(['Saving failed (HTTP ' + response.status + '). Please try again.'])
            }
        } catch {
            showErrors(['Could not reach the server. Check your connection and try again.'])
        } finally {
            // Left disabled on success so the page cannot be submitted twice while it navigates away.
            if (!done) {
                save.disabled = false
                save.textContent = 'Save'
            }
        }
    })
})()
</script>
@endpush
