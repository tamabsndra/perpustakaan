<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::resource('buku', BukuController::class);
    Route::post('/borrow', [BukuController::class, 'borrow'])->name('buku.borrow');
    Route::post('/return', [BukuController::class, 'return'])->name('buku.return');
    Route::get('/my-books', [BukuController::class, 'mybook'])->name('buku.dipinjam');
    Route::get('/history', [BukuController::class, 'history'])->name('buku.history');
    Route::get('/trace', [BukuController::class, 'trace'])->name('buku.trace');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
