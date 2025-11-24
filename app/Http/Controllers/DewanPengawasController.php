<?php

namespace App\Http\Controllers;

use App\Models\DewanPengawas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DewanPengawasController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('dewan_pengawas', 'public');
        }

        DewanPengawas::create($validated);

        return redirect()->route('dewan_pengawas.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, DewanPengawas $dewan_pengawa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($dewan_pengawa->gambar) {
                Storage::disk('public')->delete($dewan_pengawa->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('dewan_pengawas', 'public');
        }

        $dewan_pengawa->update($validated);

        return redirect()->route('dewan_pengawas.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(DewanPengawas $dewan_pengawa)
    {
        if ($dewan_pengawa->gambar) {
            Storage::disk('public')->delete($dewan_pengawa->gambar);
        }

        $dewan_pengawa->delete();

        return redirect()->route('dewan_pengawas.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
