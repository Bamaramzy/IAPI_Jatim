<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Imports\AnggotaImport;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
{
    public function index()
    {
        // Data ditampilkan per 10 (pagination)
        $anggota = Anggota::paginate(10);
        return view('keanggotaan.anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('keanggotaan.anggota.create');
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

    // ✅ Form untuk upload Excel
    public function showImportForm()
    {
        return view('keanggotaan.anggota.import');
    }

    // ✅ Proses Import Excel
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new AnggotaImport, $request->file('file'));

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diimport!');
    }
}
