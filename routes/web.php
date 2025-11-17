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
    SilabusController,
    PeraturanProfesiController,
    PeraturanSpapController,
    HomeController
};
use App\Models\{Anggota, Direktori, AdArt, TataCara};

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

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
        if ($request->filled('status_id')) {
            $query->where('status_id', $request->status_id);
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
        $query = Direktori::query()->where('status', 'aktif');

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
        $query = AdArt::query()->where('status', 'publish');

        if ($request->filled('search')) {
            $query->where('judul', 'like', "%{$request->search}%");
        }

        $adarts = $query->orderBy('created_at', 'desc')->paginate(9);
        return view('keanggotaan.adart.indexvisitor', compact('adarts'));
    })->name('visitor.adart');

    Route::get('/tata-cara', function (Request $request) {
        $query = TataCara::query()->where('status', 'aktif');

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
        Route::get('/a-b', function () {
            $brevets = \App\Models\Brevet::where('status', 'publish')
                ->orderBy('created_at', 'asc')
                ->get();

            return view('pelatihan.brevet_perpajakan.brevet_a_dan_b.indexvisitor', compact('brevets'));
        });
        Route::get('/c', function () {
            $brevetsC = \App\Models\BrevetC::where('status', 'publish')
                ->orderBy('created_at', 'asc')
                ->get();

            return view('pelatihan.brevet_perpajakan.brevet_c.indexvisitor', compact('brevetsC'));
        });
        Route::get('/kuasa', function () {
            $brevetsKuasa = \App\Models\BrevetKuasa::where('status', 'publish')
                ->orderBy('created_at', 'asc')
                ->get();

            return view('pelatihan.brevet_perpajakan.brevet_kuasa.indexvisitor', compact('brevetsKuasa'));
        });
    });
});

Route::prefix('sertifikasi')->group(function () {
    Route::get('/test-center', [TestCenterController::class, 'indexVisitor'])->name('visitor.test_center');
    Route::get('/waiver-ppak', [WaiverPpakController::class, 'indexVisitor'])->name('visitor.waiver_ppak');
    Route::get('/cfi', [CFIController::class, 'indexVisitor'])->name('visitor.cfi');
    Route::get('/workshop-a-b', [WorkshopABController::class, 'indexVisitor'])->name('visitor.workshop_ab');

    Route::prefix('ujian')->group(function () {
        Route::get('/jalur-reguler', [JalurRegulerController::class, 'indexVisitor'])->name('visitor.jalur_reguler');
        Route::get('/jalur-workshop-penyetaraan', [JalurWorkshopController::class, 'index'])->name('visitor.jalur_workshop');
        Route::get('/silabus', [SilabusController::class, 'indexVisitor'])->name('visitor.silabus');
        Route::view('/proses-penerbitan', 'sertifikasi.ujian.proses_penerbitan.proses')->name('visitor.proses_penerbitan');
    });

    Route::prefix('ujian/tutorial')->group(function () {
        Route::get('/workshop-penyetaraan', [WorkshopPenyetaraanController::class, 'indexVisitor'])->name('visitor.workshop_penyetaraan');
        Route::view('/tata-tertib', 'sertifikasi.ujian.tutorial.tata_tertib.tatatertib')->name('visitor.tata_tertib');
    });
});

Route::prefix('peraturan')->group(function () {
    Route::get('/profesi', [PeraturanProfesiController::class, 'indexVisitor'])->name('visitor.peraturan_profesi');
    Route::get('/spap', [PeraturanSpapController::class, 'indexVisitor'])->name('visitor.peraturan_spap');
    Route::get('/kode-etik', fn() => view('peraturan.kode_etik.kode_etik'))->name('visitor.kode_etik');
});

// Route::get('/dashboard', fn() => view('dashboard'))
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  Route::resources([
    //      'informasi'             => InformasiController::class,
    //      'dewan_pengurus'        => DewanPengurusController::class,
    //      'dewan_pengawas'        => DewanPengawasController::class,
    //      'direktori'             => DirektoriController::class,
    //      'adart'                 => AdArtController::class,
    //      'tatacara'              => TataCaraController::class,
    //      'pelatihan'             => PelatihanController::class,
    //      'ppl'                   => PplController::class,
    //      'brevets'               => BrevetController::class,
    //      'brevets_c'             => BrevetCController::class,
    //      'brevets_kuasa'         => BrevetKuasaController::class,
    //      'test_center'           => TestCenterController::class,
    //      'waiver_ppak'           => WaiverPpakController::class,
    //      'cfi'                   => CFIController::class,
    //      'workshop_ab'           => WorkshopABController::class,
    //      'workshop_penyetaraan'  => WorkshopPenyetaraanController::class,
    //      'jalur_reguler'         => JalurRegulerController::class,
    //      'silabus_ujian'         => SilabusController::class,
    //      'peraturan_profesi'     => PeraturanProfesiController::class,
    //      'peraturan_spap'        => PeraturanSpapController::class,
    //  ]);

    Route::resource('anggota', AnggotaController::class)->parameters(['anggota' => 'anggota']);

    Route::prefix('workshop_penyetaraan')->group(function () {
        Route::get('{kategori}/pdf/create', [WorkshopPenyetaraanController::class, 'createPdf'])->name('workshop_penyetaraan.createPdf');
        Route::get('{kategori}/video/create', [WorkshopPenyetaraanController::class, 'createVideo'])->name('workshop_penyetaraan.createVideo');
        Route::post('{kategori}/pdf', [WorkshopPenyetaraanController::class, 'storePdf'])->name('workshop_penyetaraan.storePdf');
        Route::post('{kategori}/video', [WorkshopPenyetaraanController::class, 'storeVideo'])->name('workshop_penyetaraan.storeVideo');
        Route::delete('pdf/{pdf}', [WorkshopPenyetaraanController::class, 'destroyPdf'])->name('workshop_penyetaraan.destroyPdf');
        Route::delete('video/{video}', [WorkshopPenyetaraanController::class, 'destroyVideo'])->name('workshop_penyetaraan.destroyVideo');
    });

    Route::get('anggota/import', [AnggotaController::class, 'showImportForm'])->name('anggota.import.form');
    Route::post('anggota/import', [AnggotaController::class, 'import'])->name('anggota.import');
});

require __DIR__ . '/auth.php';
