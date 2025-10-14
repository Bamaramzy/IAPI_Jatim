<?php

namespace App\Http\Controllers;

use App\Models\PeraturanSpap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeraturanSpapController extends Controller
{
    public function index()
    {
        $peraturans = PeraturanSpap::latest()->paginate(10);
        return view('peraturan.standar_profesional.index', compact('peraturans'));
    }

    public function indexVisitor()
    {
        $peraturans = PeraturanSpap::orderBy('created_at', 'desc')->get();
        return view('peraturan.standar_profesional.indexvisitor', compact('peraturans'));
    }

    public function create()
    {
        return view('peraturan.standar_profesional.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori'    => 'required|string|max:255',
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pdf_1_judul' => 'nullable|string|max:255',
            'pdf_1_url'   => 'nullable|url',
            'pdf_2_judul' => 'nullable|string|max:255',
            'pdf_2_url'   => 'nullable|url',
            'pdf_3_judul' => 'nullable|string|max:255',
            'pdf_3_url'   => 'nullable|url',
        ]);

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('spap/thumbnails', 'public');
        }

        PeraturanSpap::create($data);

        return redirect()->route('peraturan_spap.index')->with('success', 'Data SPAP berhasil ditambahkan.');
    }

    public function edit(PeraturanSpap $peraturanSpap)
    {
        return view('peraturan.standar_profesional.edit', compact('peraturanSpap'));
    }

    public function update(Request $request, PeraturanSpap $peraturanSpap)
    {
        $data = $request->validate([
            'kategori'    => 'required|string|max:255',
            'judul'       => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'pdf_1_judul' => 'nullable|string|max:255',
            'pdf_1_url'   => 'nullable|url',
            'pdf_2_judul' => 'nullable|string|max:255',
            'pdf_2_url'   => 'nullable|url',
            'pdf_3_judul' => 'nullable|string|max:255',
            'pdf_3_url'   => 'nullable|url',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($peraturanSpap->thumbnail && Storage::disk('public')->exists($peraturanSpap->thumbnail)) {
                Storage::disk('public')->delete($peraturanSpap->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('spap/thumbnails', 'public');
        }

        $peraturanSpap->update($data);

        return redirect()->route('peraturan_spap.index')->with('success', 'Data SPAP berhasil diperbarui.');
    }

    public function destroy(PeraturanSpap $peraturanSpap)
    {
        if ($peraturanSpap->thumbnail && Storage::disk('public')->exists($peraturanSpap->thumbnail)) {
            Storage::disk('public')->delete($peraturanSpap->thumbnail);
        }

        $peraturanSpap->delete();

        return redirect()->route('peraturan_spap.index')->with('success', 'Data SPAP berhasil dihapus.');
    }
}
