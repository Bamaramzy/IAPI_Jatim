<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DewanPengurusController;
use App\Http\Controllers\DewanPengawasController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DirektoriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Anggota;

Route::get('/', function () {
    $informasis = Informasi::latest()->take(3)->get();
    return view('welcome', compact('informasis'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/beranda', [InformasiController::class, 'index'])->name('beranda');

Route::get('/tentang/sejarah', function () {
    return view('tentang.sejarah');
})->name('tentang.sejarah');

Route::get('/tentang/visimisi', function () {
    return view('tentang.visimisi');
})->name('tentang.visimisi');

Route::get('/tentang/struktur', [StrukturController::class, 'index'])->name('tentang.struktur');

Route::get('/keanggotaan/anggota', function (Request $request) {
    $query = Anggota::query();

    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }
    if ($request->filled('status')) {
        $query->where('status_id', $request->status);
    }
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('nama_anggota', 'like', "%{$request->search}%")
                ->orWhere('nama_kap', 'like', "%{$request->search}%");
        });
    }

    $anggota = $query->orderBy('nama_anggota')->paginate(10);

    return view('keanggotaan.anggota.indexvisitor', compact('anggota'));
})->name('visitor.anggota');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('informasi', InformasiController::class);
    Route::resource('dewan_pengurus', DewanPengurusController::class);
    Route::resource('dewan_pengawas', DewanPengawasController::class);
    Route::resource('anggota', AnggotaController::class)
        ->parameters(['anggota' => 'anggota']);

    Route::get('anggota/import', [AnggotaController::class, 'showImportForm'])->name('anggota.import.form');
    Route::post('anggota/import', [AnggotaController::class, 'import'])->name('anggota.import');
    Route::resource('direktori', DirektoriController::class);
});

require __DIR__ . '/auth.php';
