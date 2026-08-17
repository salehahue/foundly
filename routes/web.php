<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


// Public item routes
Route::resource('items', ItemController::class)
    ->only(['index', 'show']);


// Login required item actions
Route::middleware('auth')->group(function () {
    Route::get('/report-item', [ItemController::class, 'create'])
        ->name('items.report');
    //    Route::get('/items/create', [ItemController::class, 'create'])
    //        ->name('items.create');

    Route::post('/items', [ItemController::class, 'store'])
        ->name('items.store');

    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])
        ->name('items.edit');

    Route::put('/items/{item}', [ItemController::class, 'update'])
        ->name('items.update');

    Route::delete('/items/{item}', [ItemController::class, 'destroy'])
        ->name('items.destroy');


    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__ . '/auth.php';
