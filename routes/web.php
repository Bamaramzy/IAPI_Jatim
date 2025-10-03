<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\{
    ProfileController,
    InformasiController,
    DewanPengurusController,
    DewanPengawasController,
    StrukturController,
    AnggotaController,
    DirektoriController,
    AdArtController,
    TataCaraController,
    PelatihanController,
    PplController,
    BrevetController,
    BrevetCController,
    BrevetKuasaController,
    TestCenterController,
    WaiverPpakController,
    CFIController,
    WorkshopABController,
    WorkshopPenyetaraanController,
    JalurRegulerController,
    JalurWorkshopController,
    SilabusController
};
use App\Models\{Informasi, Anggota, Direktori, AdArt, TataCara};

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

Route::prefix('pelatihan')->group(function () {
    Route::get('/tentang', fn() => view('pelatihan.tentang_pelatihan.tentang'))->name('visitor.pelatihan');
    Route::get('/jadwal', [PelatihanController::class, 'indexVisitor'])->name('visitor.pelatihan.jadwal');
    Route::get('/panduan-ppl', [PplController::class, 'indexVisitor'])->name('visitor.ppl');

    Route::prefix('brevet')->group(function () {
        Route::get('/a-b', [BrevetController::class, 'indexVisitor'])->name('visitor.brevet_a_b');
        Route::get('/c', [BrevetCController::class, 'indexVisitor'])->name('visitor.brevet_c');
        Route::get('/kuasa', [BrevetKuasaController::class, 'indexVisitor'])->name('visitor.brevet_kuasa');
    });
});

Route::get('/sertifikasi/test-center', [TestCenterController::class, 'indexVisitor'])->name('visitor.test_center');
Route::get('/sertifikasi/waiver-ppak', [WaiverPpakController::class, 'indexVisitor'])->name('visitor.waiver_ppak');
Route::get('/sertifikasi/cfi', [CFIController::class, 'indexVisitor'])->name('visitor.cfi');
Route::get('/sertifikasi/workshop-a-b', [WorkshopABController::class, 'indexVisitor'])->name('visitor.workshop_ab');
Route::get('/sertifikasi/ujian/jalur-reguler', [JalurRegulerController::class, 'indexVisitor'])->name('visitor.jalur_reguler');
Route::get('/sertifikasi/ujian/jalur-workshop-penyetaraan', [JalurWorkshopController::class, 'index'])->name('visitor.jalur_workshop');
Route::get('/sertifikasi/ujian/silabus', [SilabusController::class, 'indexVisitor'])->name('visitor.silabus_ujian');
Route::get('/sertifikasi/ujian/proses-penerbitan', fn() => view('sertifikasi.ujian.proses_penerbitan.proses'))->name('visitor.proses_penerbitan');
Route::get('/sertifikasi/ujian/tutorial/workshop-penyetaraan', [WorkshopPenyetaraanController::class, 'indexVisitor'])->name('visitor.workshop_penyetaraan');


Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resources([
        'informasi'             => InformasiController::class,
        'dewan_pengurus'        => DewanPengurusController::class,
        'dewan_pengawas'        => DewanPengawasController::class,
        'anggota'               => AnggotaController::class,
        'direktori'             => DirektoriController::class,
        'adart'                 => AdArtController::class,
        'tatacara'              => TataCaraController::class,
        'pelatihan'             => PelatihanController::class,
        'ppl'                   => PplController::class,
        'brevets'               => BrevetController::class,
        'brevets_c'             => BrevetCController::class,
        'brevets_kuasa'         => BrevetKuasaController::class,
        'test_center'           => TestCenterController::class,
        'waiver_ppak'           => WaiverPpakController::class,
        'cfi'                   => CFIController::class,
        'workshop_ab'           => WorkshopABController::class,
        'workshop_penyetaraan'  => WorkshopPenyetaraanController::class,
        'jalur_reguler'         => JalurRegulerController::class,
        'silabus_ujian'         => SilabusController::class,
    ]);

    Route::prefix('workshop_penyetaraan')->group(function () {
        Route::post('{kategori}/pdf', [WorkshopPenyetaraanController::class, 'storePdf'])->name('workshop_penyetaraan.storePdf');
        Route::post('{kategori}/video', [WorkshopPenyetaraanController::class, 'storeVideo'])->name('workshop_penyetaraan.storeVideo');
        Route::delete('pdf/{pdf}', [WorkshopPenyetaraanController::class, 'destroyPdf'])->name('workshop_penyetaraan.destroyPdf');
        Route::delete('video/{video}', [WorkshopPenyetaraanController::class, 'destroyVideo'])->name('workshop_penyetaraan.destroyVideo');
    });

    Route::get('anggota/import', [AnggotaController::class, 'showImportForm'])->name('anggota.import.form');
    Route::post('anggota/import', [AnggotaController::class, 'import'])->name('anggota.import');
});

require __DIR__ . '/auth.php';
