<?php

use App\Http\Controllers\Admin\AdImageController;
use App\Http\Controllers\Admin\AdSettingController;
use App\Http\Controllers\Admin\AlphabetLetterController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\AvatarOptionController;
use App\Http\Controllers\Admin\BadgeController;
use App\Http\Controllers\Admin\BadgeTierController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ChestClaimController;
use App\Http\Controllers\Admin\ChestRewardConfigController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContentTreeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExerciseController;
use App\Http\Controllers\Admin\ExerciseInstructionController;
use App\Http\Controllers\Admin\FamilyGroupController;
use App\Http\Controllers\Admin\GemPackController;
use App\Http\Controllers\Admin\GemPurchaseController;
use App\Http\Controllers\Admin\HeartRefillTierController;
use App\Http\Controllers\Admin\LanguageActivationController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LeagueTierController;
use App\Http\Controllers\Admin\LegalPageController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuestController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\SubscriptionPlanController;
use App\Http\Controllers\Admin\TriviaQuestionController;
use App\Http\Controllers\Admin\TriviaTopicController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login']);
    });

    Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/content-tree', [ContentTreeController::class, 'index'])->name('content-tree');

        Route::resource('users', UserController::class)->except(['create', 'store']);
        Route::post('/users/{user}/adjust-game-state', [UserController::class, 'adjustGameState'])->name('users.adjust-game-state');

        Route::resource('languages', LanguageController::class)->except('show');

        // Publish/unpublish languages. Separate from the languages resource so
        // the sidebar can expose activation on its own without also exposing
        // the full language CRUD.
        Route::get('/language-activation', [LanguageActivationController::class, 'index'])->name('language-activation.index');
        Route::patch('/language-activation/{language}', [LanguageActivationController::class, 'update'])->name('language-activation.update');

        Route::resource('chapters', ChapterController::class)->except('show');
        Route::resource('units', UnitController::class)->except('show');
        Route::resource('lessons', LessonController::class)->except('show');
        Route::resource('exercises', ExerciseController::class)->except('show');
        Route::resource('exercise-instructions', ExerciseInstructionController::class)->except('show');
        Route::resource('alphabet-letters', AlphabetLetterController::class)->except('show');
        Route::resource('avatar-options', AvatarOptionController::class)->except('show');

        Route::resource('trivia-topics', TriviaTopicController::class)->except('show');
        Route::resource('trivia-questions', TriviaQuestionController::class)->except('show');

        Route::resource('badges', BadgeController::class)->except('show');
        Route::resource('badge-tiers', BadgeTierController::class)->except('show');
        Route::resource('league-tiers', LeagueTierController::class)->except('show');
        Route::resource('quests', QuestController::class)->except('show');
        Route::resource('chest-reward-configs', ChestRewardConfigController::class)->except('show');
        Route::get('/chest-claims', [ChestClaimController::class, 'index'])->name('chest-claims.index');

        Route::resource('gem-packs', GemPackController::class)->except('show');
        Route::resource('heart-refill-tiers', HeartRefillTierController::class)->except('show');
        Route::resource('subscription-plans', SubscriptionPlanController::class)->except('show');
        Route::get('/gem-purchases', [GemPurchaseController::class, 'index'])->name('gem-purchases.index');
        Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
        Route::get('/family-groups', [FamilyGroupController::class, 'index'])->name('family-groups.index');
        Route::resource('ad-images', AdImageController::class)->except('show');
        Route::put('ad-settings', [AdSettingController::class, 'update'])->name('ad-settings.update');

        Route::resource('legal-pages', LegalPageController::class)->only(['index', 'edit', 'update']);
        Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'destroy']);
    });
});
