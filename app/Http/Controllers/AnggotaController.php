<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Imports\AnggotaImport;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_anggota', 'like', "%{$search}%")
                    ->orWhere('no_reg_iapi', 'like', "%{$search}%")
                    ->orWhere('nama_kap', 'like', "%{$search}%");
            });
        }

        if ($kategori = $request->input('kategori')) {
            $query->where('kategori', $kategori);
        }

        if ($korwil = $request->input('korwil')) {
            $query->where('korwil', $korwil);
        }

        $anggota = $query->orderBy('nama_anggota', 'asc')->paginate(10);

        $kategoriList = Anggota::select('kategori')->distinct()->pluck('kategori')->filter()->values();
        $korwilList = Anggota::select('korwil')->distinct()->pluck('korwil')->filter()->values();

        return view('keanggotaan.anggota.index', compact('anggota', 'kategoriList', 'korwilList'));
    }

    public function create()
    {
        $lastNoUrut = Anggota::max('no_urut') ?? 0;
        $nextNoUrut = $lastNoUrut + 1;

        return view('keanggotaan.anggota.create', compact('nextNoUrut'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_urut' => 'required|integer',
            'no_reg_iapi' => 'required|string|max:50',
            'nama_anggota' => 'required|string|max:255',
            'izin_ap' => 'nullable|string|max:100',
            'kategori' => 'required|string',
            'nama_kap' => 'nullable|string|max:255',
            'status_id' => 'required|string',
            'korwil' => 'nullable|string|max:100',
        ]);

        Anggota::create($validated);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit(Anggota $anggota)
    {
        return view('keanggotaan.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validated = $request->validate([
            'no_urut' => 'required|integer',
            'no_reg_iapi' => 'required|string|max:50',
            'nama_anggota' => 'required|string|max:255',
            'izin_ap' => 'nullable|string|max:100',
            'kategori' => 'required|string',
            'nama_kap' => 'nullable|string|max:255',
            'status_id' => 'required|string',
            'korwil' => 'nullable|string|max:100',
        ]);

        $anggota->update($validated);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus');
    }

    public function showImportForm()
    {
        return view('keanggotaan.anggota.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $import = new AnggotaImport();
        Excel::import($import, $request->file('file'));

        $inserted = method_exists($import, 'getInsertedCount') ? $import->getInsertedCount() : 0;
        $updated = method_exists($import, 'getUpdatedCount') ? $import->getUpdatedCount() : 0;

        return redirect()->route('anggota.index')->with(
            'success',
            "Import selesai! {$inserted} data baru ditambahkan dan {$updated} data diperbarui."
        );
    }

    public function reset()
    {
        return redirect()->route('anggota.index');
    }
}
