<?php

use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about-client', [AboutController::class, 'aboutClient'])->name('about-client');
Route::get('/about-me', [AboutController::class, 'aboutMe'])->name('about-me');
Route::get('/about-partner', [AboutController::class, 'aboutPartner'])->name('about-partner');