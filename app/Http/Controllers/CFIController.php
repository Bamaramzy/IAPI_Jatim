<?php

namespace App\Http\Controllers;

use App\Models\CFI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CFIController extends Controller
{

    public function indexVisitor()
    {
        $cfis = Cfi::orderBy('created_at', 'asc')->get();
        return view('sertifikasi.cfi.indexvisitor', compact('cfis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'link'   => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('cfis', 'public');
        }

        CFI::create($validated);

        return redirect()->route('cfi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(CFI $cfi)
    {
        return view('sertifikasi.cfi.edit', compact('cfi'));
    }

    public function update(Request $request, CFI $cfi)
    {
        $validated = $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'link'   => 'nullable|url',
        ]);

        if ($request->hasFile('gambar')) {
            if ($cfi->gambar && Storage::disk('public')->exists($cfi->gambar)) {
                Storage::disk('public')->delete($cfi->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('cfis', 'public');
        }

        $cfi->update($validated);

        return redirect()->route('cfi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(CFI $cfi)
    {
        if ($cfi->gambar && Storage::disk('public')->exists($cfi->gambar)) {
            Storage::disk('public')->delete($cfi->gambar);
        }

        $cfi->delete();

        return redirect()->route('cfi.index')->with('success', 'Data berhasil dihapus.');
    }
}
