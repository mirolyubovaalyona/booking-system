<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Resources\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('resources', ResourceController::class);

Route::prefix('resources')->group(function () {
    Route::get('/', [ResourceController::class, 'index']);
    Route::get('/create', [ResourceController::class, 'create']);
    Route::post('/', [ResourceController::class, 'store']);

    
    Route::prefix('{resource_id}')->group(function () {
        Route::get('/', [ResourceController::class, 'show']);
        Route::get('/edit', [ResourceController::class, 'edit']);
        Route::patch('/', [ResourceController::class, 'update']);
        Route::delete('/', [ResourceController::class, 'destroy']);
    });
});

require __DIR__.'/auth.php';

