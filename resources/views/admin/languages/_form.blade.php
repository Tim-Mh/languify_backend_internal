@csrf
@if (isset($language))
    @method('PUT')
@endif

<div class="grid grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Code (e.g. en, es)</label>
        <input type="text" name="code" value="{{ old('code', $language->code ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="10">
        @error('code') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Flag Emoji</label>
        <input type="text" name="flag_emoji" value="{{ old('flag_emoji', $language->flag_emoji ?? '') }}" class="w-full border rounded px-3 py-2" maxlength="10">
        @error('flag_emoji') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Name (in English)</label>
        <input type="text" name="name" value="{{ old('name', $language->name ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Native Name</label>
        <input type="text" name="native_name" value="{{ old('native_name', $language->native_name ?? '') }}" class="w-full border rounded px-3 py-2">
        @error('native_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $language->is_active ?? true) ? 'checked' : '' }}>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    <a href="{{ route('admin.languages.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
</div>
