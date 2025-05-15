<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return to_route('contacts');
})->name('home');

Route::get('contacts', function () {
    return Inertia::render('Contacts');
})->middleware(['auth', 'verified'])->name('contacts');

Route::get('messages', function () {
    return Inertia::render('Messages');
})->middleware(['auth', 'verified'])->name('messages');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
