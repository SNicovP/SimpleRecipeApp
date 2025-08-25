<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeTypeController;
use App\Http\Controllers\Api\RecipeApiController;
use Illuminate\Support\Facades\Route;

// Public homepage
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route, only accessible to authenticated and verified users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recipe management
    Route::resource('/recipe', RecipeController::class);

    // Recipe type management
    Route::resource('/recipeType', RecipeTypeController::class);
});

// Public API route
Route::get('/api/recipe', [RecipeApiController::class, 'index']);

require __DIR__.'/auth.php';