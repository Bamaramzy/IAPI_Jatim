<?php

namespace App\Http\Controllers;

use App\Models\DewanPengawas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DewanPengawasController extends Controller
{
    public function index()
    {
        $pengawas = DewanPengawas::all();
        return view('dewan_pengawas.index', compact('pengawas'));
    }

    public function create()
    {
        return view('dewan_pengawas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->only('nama', 'jabatan');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('dewan', 'public');
        }

        DewanPengawas::create($data);

        return redirect()->route('dewan_pengawas.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(DewanPengawas $dewanPengawas)
    {
        return view('dewan_pengawas.edit', compact('dewanPengawas'));
    }

    public function update(Request $request, DewanPengawas $dewanPengawas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->only('nama', 'jabatan');

        if ($request->hasFile('gambar')) {
            if ($dewanPengawas->gambar) {
                Storage::disk('public')->delete($dewanPengawas->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('dewan', 'public');
        }

        $dewanPengawas->update($data);

        return redirect()->route('dewan_pengawas.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(DewanPengawas $dewanPengawas)
    {
        if ($dewanPengawas->gambar) {
            Storage::disk('public')->delete($dewanPengawas->gambar);
        }

        $dewanPengawas->delete();

        return redirect()->route('dewan_pengawas.index')->with('success', 'Data berhasil dihapus');
    }
}
