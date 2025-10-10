<?php

use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/trang-chu', function () {
    return view('home');
});

Route::get('/khach-hang', [AboutController::class, 'aboutClient'])->name('about-client');
Route::get('/gioi-thieu', [AboutController::class, 'aboutMe'])->name('about-me');
Route::get('/doi-tac', [AboutController::class, 'aboutPartner'])->name('about-partner');