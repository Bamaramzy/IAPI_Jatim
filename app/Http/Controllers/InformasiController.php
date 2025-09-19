<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasis = Informasi::latest()->get();
        return view('informasi.index', compact('informasis'));
    }

    public function create()
    {
        return view('informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            // Pastikan folder 'informasis' ada
            if (!Storage::disk('public')->exists('informasis')) {
                Storage::disk('public')->makeDirectory('informasis');
            }

            $validated['gambar'] = $request->file('gambar')->store('informasis', 'public');
        }

        Informasi::create($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function edit(Informasi $informasi)
    {
        return view('informasi.edit', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
                Storage::disk('public')->delete($informasi->gambar);
            }

            // Pastikan folder 'informasis' ada
            if (!Storage::disk('public')->exists('informasis')) {
                Storage::disk('public')->makeDirectory('informasis');
            }

            $validated['gambar'] = $request->file('gambar')->store('informasis', 'public');
        }

        $informasi->update($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy(Informasi $informasi)
    {
        // Hapus gambar lama jika ada
        if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
}
