<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return to_route('contacts');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('contacts', [ContactController::class, 'show'])->name('contacts');

    Route::get('contacts/add', [ContactController::class, 'create']);
    Route::post('contacts', [ContactController::class, 'store']);

    Route::get('contacts/{id}/edit', [ContactController::class, 'edit']);
    Route::put('contacts/{id}', [ContactController::class, 'update']);

    Route::delete('contacts/{id}', [ContactController::class, 'destroy']);

    Route::get('messages', function () {
        return Inertia::render('MessageList');
    })->name('messages');
});


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
