<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DewanPengurusController;
use App\Http\Controllers\DewanPengawasController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DirektoriController;
use App\Http\Controllers\AdArtController;
use App\Http\Controllers\TataCaraController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PplController;
use App\Http\Controllers\BrevetController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Anggota;
use App\Models\Direktori;
use App\Models\AdArt;
use App\Models\TataCara;

Route::get('/', function () {
    $informasis = Informasi::latest()->take(3)->get();
    return view('welcome', compact('informasis'));
})->name('home');

Route::get('/beranda', [InformasiController::class, 'index'])->name('beranda');

Route::prefix('tentang')->group(function () {
    Route::view('/sejarah', 'tentang.sejarah')->name('tentang.sejarah');
    Route::view('/visimisi', 'tentang.visimisi')->name('tentang.visimisi');
    Route::get('/struktur', [StrukturController::class, 'index'])->name('tentang.struktur');
});

Route::prefix('keanggotaan')->group(function () {
    Route::get('/anggota', function (Request $request) {
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

    Route::get('/direktori', function (Request $request) {
        $query = Direktori::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', "%{$request->search}%")
                    ->orWhere('deskripsi', 'like', "%{$request->search}%");
            });
        }

        $direktoris = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('keanggotaan.direktori.indexvisitor', compact('direktoris'));
    })->name('visitor.direktori');

    Route::get('/ad-art', function (Request $request) {
        $query = AdArt::query()->where('status', 'aktif');

        if ($request->filled('search')) {
            $query->where('judul', 'like', "%{$request->search}%");
        }

        $adarts = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('keanggotaan.adart.indexvisitor', compact('adarts'));
    })->name('visitor.adart');

    Route::get('/tata-cara', function (Request $request) {
        $query = TataCara::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('judul', 'like', "%{$request->search}%");
        }

        $tatacaras = $query->orderBy('created_at', 'desc')->paginate(9);

        return view('keanggotaan.tatacara.indexvisitor', compact('tatacaras'));
    })->name('visitor.tatacara');

    Route::view('/info', 'keanggotaan.info.info')->name('visitor.info');
});

Route::get('/pelatihan/jadwal', [PelatihanController::class, 'indexVisitor'])->name('visitor.pelatihan');
Route::get('/pelatihan/panduan-ppl', [\App\Http\Controllers\PplController::class, 'indexvisitor'])->name('ppl.visitor');
Route::get('/pelatihan/brevet/a-b', [BrevetController::class, 'indexvisitor'])->name('visitor.brevet');
Route::get('/pelatihan/brevet/c', [BrevetController::class, 'indexVisitorC'])->name('visitor.brevet_c');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'informasi'      => InformasiController::class,
        'dewan_pengurus' => DewanPengurusController::class,
        'dewan_pengawas' => DewanPengawasController::class,
        'anggota'        => AnggotaController::class,
        'direktori'      => DirektoriController::class,
        'adart'         => AdArtController::class,
        'tatacara'       => TataCaraController::class,
        'pelatihan'      => PelatihanController::class,
        'ppl'            => PplController::class,
        'brevets'       => BrevetController::class
    ]);

    Route::get('anggota/import', [AnggotaController::class, 'showImportForm'])->name('anggota.import.form');
    Route::post('anggota/import', [AnggotaController::class, 'import'])->name('anggota.import');
});

require __DIR__ . '/auth.php';
