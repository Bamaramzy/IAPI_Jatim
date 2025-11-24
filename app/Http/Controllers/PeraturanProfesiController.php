<?php

namespace App\Http\Controllers;

use App\Models\PeraturanProfesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeraturanProfesiController extends Controller
{

    public function indexVisitor()
    {
        $peraturans = PeraturanProfesi::orderBy('created_at', 'desc')->get();
        return view('peraturan.profesi.indexvisitor', compact('peraturans'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required|in:regulasi,asosiasi,pengurus',
            'judul'    => 'required|string|max:255',
            'file'     => 'nullable|file|mimes:pdf|max:2048',
            'link_url' => 'nullable|url',
        ]);

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('peraturan_profesi', 'public');
        }

        PeraturanProfesi::create($data);

        return redirect()->route('peraturan_profesi.index')->with('success', 'Peraturan berhasil ditambahkan.');
    }

    public function update(Request $request, PeraturanProfesi $peraturanProfesi)
    {
        $data = $request->validate([
            'kategori' => 'required|in:regulasi,asosiasi,pengurus',
            'judul'    => 'required|string|max:255',
            'file'     => 'nullable|file|mimes:pdf|max:2048',
            'link_url' => 'nullable|url',
        ]);

        if ($request->hasFile('file')) {
            if ($peraturanProfesi->file_path && Storage::disk('public')->exists($peraturanProfesi->file_path)) {
                Storage::disk('public')->delete($peraturanProfesi->file_path);
            }
            $data['file_path'] = $request->file('file')->store('peraturan_profesi', 'public');
        }

        $peraturanProfesi->update($data);

        return redirect()->route('peraturan_profesi.index')->with('success', 'Peraturan berhasil diperbarui.');
    }

    public function destroy(PeraturanProfesi $peraturanProfesi)
    {
        if ($peraturanProfesi->file_path && Storage::disk('public')->exists($peraturanProfesi->file_path)) {
            Storage::disk('public')->delete($peraturanProfesi->file_path);
        }

        $peraturanProfesi->delete();

        return redirect()->route('peraturan_profesi.index')->with('success', 'Peraturan berhasil dihapus.');
    }
}
