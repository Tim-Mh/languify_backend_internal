@extends('layouts.admin')

@php
    $editing = $campaign->exists;
    $maxImages = \App\Http\Controllers\Admin\AdCampaignController::MAX_IMAGES_PER_UPLOAD;
    // Where each placement appears, shown under the placement picker.
    $where = [
        'home_sidebar' => 'Shown in the two small cards in the right-hand sidebar of the website home page.',
        'lesson_complete' => 'Shown as a large popup on the website right after a learner finishes a lesson.',
        'mobile_lesson_complete' => 'Shown full-screen in the mobile app right after a learner finishes a lesson.',
    ];
@endphp

@section('title', $editing ? 'Edit ad product' : 'Add ad product')

@section('content')
    <div class="mx-auto max-w-3xl space-y-5">
        <a href="{{ route('admin.ads.index') }}" class="inline-flex items-center gap-1 text-sm font-bold text-gray-500 hover:text-gray-900">
            <svg class="h-4 w-4" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" /></svg>
            Back to ads
        </a>

        {{-- Current images sit outside the main form: each has its own small
             toggle/delete form, and forms cannot be nested. --}}
        @if ($editing)
            <section class="card p-6" aria-labelledby="current-heading">
                <h2 id="current-heading" class="font-display text-lg font-bold text-ink-900">Current images</h2>
                <p class="mt-1 text-sm text-gray-500">Each image is shown as its own ad. Switching one off or deleting it takes effect straight away, no Save needed.</p>
                @if ($campaign->ads->isEmpty())
                    <p class="mt-4 text-sm font-semibold text-amber-700">No images yet, so this product is not shown anywhere. Add some below.</p>
                @else
                    <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        @foreach ($campaign->ads as $ad)
                            <div class="overflow-hidden rounded-xl ring-1 ring-gray-200">
                                <img src="{{ $ad->url() }}" alt="{{ $ad->image_alt }}" loading="lazy" class="h-28 w-full bg-gray-50 object-contain {{ $ad->is_active ? '' : 'opacity-30 grayscale' }}">
                                <div class="flex items-center justify-between gap-2 border-t border-gray-100 px-2 py-1.5">
                                    <form action="{{ route('admin.ads.toggle', $ad) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" role="switch" aria-checked="{{ $ad->is_active ? 'true' : 'false' }}" aria-label="Show image {{ $loop->iteration }}"
                                            class="relative h-6 w-11 shrink-0 rounded-full transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 {{ $ad->is_active ? 'bg-emerald-500' : 'bg-gray-300' }}">
                                            <span class="absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow transition {{ $ad->is_active ? 'translate-x-5' : '' }}"></span>
                                        </button>
                                        <span class="text-xs font-bold {{ $ad->is_active ? 'text-emerald-700' : 'text-gray-500' }}">{{ $ad->is_active ? 'On' : 'Off' }}</span>
                                    </form>
                                    <form action="{{ route('admin.ads.destroy', $ad) }}" method="POST"
                                        data-confirm="This image will be removed from the ad, along with its views and clicks." data-confirm-title="Delete this image?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="icon-btn hover:!bg-rose-50 hover:!text-rose-600" aria-label="Delete image {{ $loop->iteration }}" title="Delete">
                                            <svg class="h-5 w-5" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @endif

        <form id="ad-form" method="POST" enctype="multipart/form-data"
            action="{{ $editing ? route('admin.ad-campaigns.update', $campaign) : route('admin.ad-campaigns.store') }}"
            class="space-y-5" novalidate>
            @csrf

            <div class="card p-6">
                <div id="form-errors" class="mb-5 hidden space-y-1 rounded-xl bg-rose-50 px-4 py-3 text-sm font-semibold text-rose-800 ring-1 ring-rose-200"></div>

                <div class="space-y-5">

                <div>
                    <label for="placement" class="field-label">Where it is shown</label>
                    @if ($editing)
                        <p class="text-ink-900">{{ $campaign->placement->label() }} <span class="text-sm text-gray-400">(cannot be changed)</span></p>
                        <input type="hidden" id="placement" value="{{ $campaign->placement->value }}">
                    @else
                        <select id="placement" name="placement" class="field-input">
                            @foreach ($placements as $option)
                                <option value="{{ $option->value }}" @selected($campaign->placement === $option)>{{ $option->label() }}</option>
                            @endforeach
                        </select>
                    @endif
                    <p id="placement-where" class="field-hint"></p>
                    <p id="placement-guidance" class="field-hint font-semibold text-ink-800"></p>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="product_name" class="field-label">Product name</label>
                        <input id="product_name" name="product_name" maxlength="120" value="{{ $campaign->product_name }}" class="field-input" required>
                        <p class="field-hint">Also used as the image description and to group views and clicks on the stats page.</p>
                    </div>
                    <div>
                        <label for="link_url" class="field-label">Web link</label>
                        <input id="link_url" name="link_url" type="url" maxlength="2048" placeholder="https://" value="{{ $campaign->link_url }}" class="field-input" required>
                        <p class="field-hint">Opens when a learner taps the ad. Must start with http:// or https://.</p>
                    </div>
                </div>

                <label class="flex cursor-pointer items-start justify-between gap-4 border-t border-gray-100 pt-5">
                    <span>
                        <span class="block font-bold text-ink-900">Show this product</span>
                        <span class="block text-xs text-gray-500">Switched off, none of its images are shown, but they and their stats are kept.</span>
                    </span>
                    <input type="checkbox" name="is_active" value="1" @checked($campaign->is_active) class="peer sr-only">
                    <span class="relative mt-1 h-6 w-11 shrink-0 rounded-full bg-gray-300 transition after:absolute after:left-0.5 after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:shadow after:transition peer-checked:bg-brand-500 peer-checked:after:translate-x-5 peer-focus-visible:ring-2 peer-focus-visible:ring-brand-500 peer-focus-visible:ring-offset-2" aria-hidden="true"></span>
                </label>

                <div class="border-t border-gray-100 pt-5">
                    <label for="images" class="field-label">{{ $editing ? 'Add more images' : 'Images' }}</label>
                    <input id="images" type="file" accept="image/jpeg,image/png,image/webp" multiple
                        class="block w-full min-w-0 text-sm text-gray-600 file:mr-3 file:cursor-pointer file:rounded-xl file:border-0 file:bg-brand-50 file:px-4 file:py-2.5 file:font-bold file:text-brand-700 hover:file:bg-brand-100">
                    <p class="field-hint">
                        Up to {{ $maxImages }} images at a time, JPG, PNG or WebP. Each one is shrunk and compressed in your browser before it is uploaded, so large photos are fine.
                    </p>
                    <p id="picker-message" class="mt-2 hidden rounded-xl bg-amber-50 px-3 py-2 text-sm font-semibold text-amber-800"></p>
                    <div id="previews" class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3"></div>
                </div>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.ads.index') }}" class="btn-secondary">Cancel</a>
                <button id="save" type="submit" class="btn-primary px-6">Save</button>
            </div>
        </form>
    </div>
@endsection


@push('scripts')
<script>
(() => {
    const MAX_IMAGES = {{ $maxImages }}
    const MAX_PICK_BYTES = 20 * 1024 * 1024
    const MAX_UPLOAD_BYTES = 2 * 1024 * 1024
    const BOXES = @json(collect($placements)->mapWithKeys(fn ($p) => [$p->value => $p->box()]));
    const GUIDANCE = @json(collect($placements)->mapWithKeys(fn ($p) => [$p->value => $p->guidance()]));
    const WHERE = @json($where);
    const EDITING = @json($editing);

    const form = document.getElementById('ad-form')
    const placement = document.getElementById('placement')
    const guidance = document.getElementById('placement-guidance')
    const where = document.getElementById('placement-where')
    const input = document.getElementById('images')
    const previews = document.getElementById('previews')
    const pickerMessage = document.getElementById('picker-message')
    const errors = document.getElementById('form-errors')
    const save = document.getElementById('save')

    let picked = []

    const showGuidance = () => {
        where.textContent = WHERE[placement.value] ?? ''
        guidance.textContent = 'Ideal image: ' + GUIDANCE[placement.value]
    }
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
            card.className = 'relative overflow-hidden rounded-xl ring-1 ring-gray-200'
            const img = document.createElement('img')
            img.src = URL.createObjectURL(file)
            img.alt = file.name
            img.className = 'w-full h-28 object-contain bg-gray-50'
            img.onload = () => URL.revokeObjectURL(img.src)
            const name = document.createElement('p')
            name.className = 'truncate border-t border-gray-100 px-2 py-1.5 text-xs font-semibold text-gray-600'
            name.textContent = file.name + ' (' + mb(file.size) + ')'
            const remove = document.createElement('button')
            remove.type = 'button'
            remove.className = 'absolute right-1.5 top-1.5 flex h-7 w-7 items-center justify-center rounded-full bg-white/95 text-lg leading-none text-gray-700 shadow ring-1 ring-gray-200 hover:bg-rose-50 hover:text-rose-600'
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
