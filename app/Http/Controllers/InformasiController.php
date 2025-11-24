<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{

    public function welcome()
    {
        $informasis = Informasi::latest()->get();
        return view('welcome', compact('informasis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            if (!Storage::disk('public')->exists('informasis')) {
                Storage::disk('public')->makeDirectory('informasis');
            }

            $validated['gambar'] = $request->file('gambar')->store('informasis', 'public');
        }

        Informasi::create($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function update(Request $request, Informasi $informasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
                Storage::disk('public')->delete($informasi->gambar);
            }

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
        if ($informasi->gambar && Storage::disk('public')->exists($informasi->gambar)) {
            Storage::disk('public')->delete($informasi->gambar);
        }

        $informasi->delete();
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }
}
