@csrf
@if (isset($ad_image))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Image {{ isset($ad_image) ? '(leave blank to keep the current image)' : '' }}</label>
        @if (isset($ad_image))
            <img src="{{ $ad_image->url() }}" alt="Ad" class="mb-2 h-24 w-36 object-cover rounded border">
        @endif
        <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
        @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Placement</label>
        <select name="placement" class="w-full border rounded px-3 py-2">
            @foreach ($placements as $value => $label)
                <option value="{{ $value }}" {{ old('placement', $ad_image->placement->value ?? 'home_primary') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        <p class="text-xs text-gray-500 mt-1">Which ad section this creative belongs to. Each section rotates through its own creatives independently, so the two home slots never show the same ad at the same time. Website slots want a landscape image (around 580&times;400); the mobile app slot fills the whole phone screen, so it wants a portrait one (around 1080&times;1920).</p>
        @error('placement') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Product name <span class="text-gray-400 font-normal">(optional)</span></label>
        <input type="text" name="product_name" maxlength="60" placeholder="e.g. The Unsent Letters" value="{{ old('product_name', $ad_image->product_name ?? '') }}" class="w-full border rounded px-3 py-2">
        <p class="text-xs text-gray-500 mt-1">Shown as the caption under the image in the learner's sidebar. Keep it short (max 60 characters) &mdash; the slot is only 300px wide. Leave blank to show the image on its own.</p>
        @error('product_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-2">
        <label class="block text-sm font-medium mb-1">Click-through URL <span class="text-gray-400 font-normal">(optional)</span></label>
        <input type="url" name="target_url" placeholder="https://example.com" value="{{ old('target_url', $ad_image->target_url ?? '') }}" class="w-full border rounded px-3 py-2">
        <p class="text-xs text-gray-500 mt-1">Where the learner is sent when they click the ad. Leave blank to show the ad without a link.</p>
        @error('target_url') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order_number" min="1" value="{{ old('order_number', $ad_image->order_number ?? 1) }}" class="w-full border rounded px-3 py-2">
        @error('order_number') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $ad_image->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.ad-images.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
