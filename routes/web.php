<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiController;
use Illuminate\Support\Facades\Route;
use App\Models\Informasi;

Route::get('/', function () {
    $informasis = Informasi::latest()->take(3)->get();
    return view('welcome', compact('informasis'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/beranda', [InformasiController::class, 'index'])->name('beranda');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('informasi', InformasiController::class);
});

require __DIR__ . '/auth.php';
