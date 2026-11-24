<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * The one screen that decides which languages the web app and the mobile app
 * actually offer.
 *
 * Separate from LanguageController on purpose. That one edits a language's
 * details (code, name, flag, is_learnable) and is a normal create/edit/delete
 * CRUD flow. This one does a single thing to every language at once, from one
 * list, with no Save button — because publishing a language is the action an
 * admin performs most often and it should not cost four clicks.
 *
 * `is_active` is read by exactly one place, Api\CourseController::languages(),
 * which feeds both the native-language picker and the learning-language picker.
 * So unticking a box hides the language from anyone choosing a course; it does
 * not touch learners already enrolled in it, whose progress and lessons load
 * through separate queries.
 */
class LanguageActivationController extends Controller
{
    /** The switches live on the Languages list now; old links land there. */
    public function index(): RedirectResponse
    {
        return redirect()->route('admin.languages.index');
    }

    /**
     * Toggle one language. Answers JSON so the checkbox can save in place
     * without a page reload.
     *
     * Validated by hand rather than with $request->validate(). bootstrap/app.php
     * limits JSON exception rendering to api/* routes, so a thrown
     * ValidationException here would come back as a 302 redirect that the
     * checkbox's fetch() cannot read as a failure.
     */
    public function update(Request $request, Language $language): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'is_active' => ['required', 'boolean'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $language->update(['is_active' => $request->boolean('is_active')]);

        return response()->json([
            'isActive' => $language->is_active,
            'message' => $language->is_active
                ? "{$language->name} is now live."
                : "{$language->name} is now hidden.",
        ]);
    }
}
