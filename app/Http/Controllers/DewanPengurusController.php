<?php

namespace App\Http\Controllers;

use App\Models\DewanPengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DewanPengurusController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('dewan_pengurus', 'public');
        }

        DewanPengurus::create($validated);

        return redirect()->route('dewan_pengurus.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, DewanPengurus $dewan_penguru)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($dewan_penguru->gambar) {
                Storage::disk('public')->delete($dewan_penguru->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('dewan_pengurus', 'public');
        }

        $dewan_penguru->update($validated);

        return redirect()->route('dewan_pengurus.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(DewanPengurus $dewan_penguru)
    {
        if ($dewan_penguru->gambar) {
            Storage::disk('public')->delete($dewan_penguru->gambar);
        }

        $dewan_penguru->delete();

        return redirect()->route('dewan_pengurus.index')->with('success', 'Data berhasil dihapus.');
    }
}
