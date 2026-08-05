<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AvatarOption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AvatarOptionController extends Controller
{
    private const ATTRIBUTE_TYPES = ['skinColor', 'hair', 'hairColor', 'eyes', 'eyebrows', 'mouth', 'backgroundColor'];

    public function index(Request $request): View
    {
        $selectedType = $request->query('attribute_type', self::ATTRIBUTE_TYPES[0]);

        return view('admin.avatar-options.index', [
            'attributeTypes' => self::ATTRIBUTE_TYPES,
            'selectedType' => $selectedType,
            'options' => AvatarOption::where('attribute_type', $selectedType)->orderBy('order_number')->get(),
        ]);
    }

    public function create(Request $request): View
    {
        $selectedType = $request->query('attribute_type', self::ATTRIBUTE_TYPES[0]);
        $nextOrder = (int) (AvatarOption::where('attribute_type', $selectedType)->max('order_number') ?? 0) + 1;

        return view('admin.avatar-options.create', [
            'attributeTypes' => self::ATTRIBUTE_TYPES,
            'selectedType' => $selectedType,
            'nextOrder' => $nextOrder,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        AvatarOption::create($data);

        return redirect()->route('admin.avatar-options.index', ['attribute_type' => $data['attribute_type']])
            ->with('status', 'Option created.');
    }

    public function edit(AvatarOption $avatar_option): View
    {
        return view('admin.avatar-options.edit', [
            'attributeTypes' => self::ATTRIBUTE_TYPES,
            'option' => $avatar_option,
        ]);
    }

    public function update(Request $request, AvatarOption $avatar_option): RedirectResponse
    {
        $data = $this->validateData($request, $avatar_option);
        $avatar_option->update($data);

        return redirect()->route('admin.avatar-options.index', ['attribute_type' => $data['attribute_type']])
            ->with('status', 'Option updated.');
    }

    public function destroy(AvatarOption $avatar_option): RedirectResponse
    {
        $attributeType = $avatar_option->attribute_type;
        $avatar_option->delete();

        return redirect()->route('admin.avatar-options.index', ['attribute_type' => $attributeType])
            ->with('status', 'Option deleted.');
    }

    private function validateData(Request $request, ?AvatarOption $option = null): array
    {
        $data = $request->validate([
            'attribute_type' => ['required', 'string', Rule::in(self::ATTRIBUTE_TYPES)],
            'value' => [
                'required', 'string', 'max:64',
                Rule::unique('avatar_options')->where('attribute_type', $request->input('attribute_type'))->ignore($option?->id),
            ],
            'price_gems' => ['required', 'integer', 'min:0'],
            'order_number' => ['required', 'integer', 'min:0'],
            'is_default' => ['sometimes', 'boolean'],
        ]);

        $data['is_default'] = $request->boolean('is_default');

        return $data;
    }
}
