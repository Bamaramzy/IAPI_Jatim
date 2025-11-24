<?php

namespace App\Http\Controllers;

use App\Models\Silabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SilabusController extends Controller
{

    public function indexVisitor(Request $request)
    {
        $kategori = $request->get('kategori');
        $sub      = $request->get('sub');

        $kategoriList = Silabus::select('kategori_utama')->distinct()->pluck('kategori_utama');
        $subList      = Silabus::select('sub_kategori')->distinct()->pluck('sub_kategori');

        $query = Silabus::query()
            ->when($kategori, fn($q) => $q->where('kategori_utama', $kategori))
            ->when($sub, fn($q) => $q->where('sub_kategori', $sub))
            ->orderBy('created_at', 'desc');

        $silabus = $query->get()
            ->groupBy('kategori_utama')
            ->map(fn($group) => $group->groupBy('sub_kategori'));

        return view(
            'sertifikasi.ujian.silabus_ujian.indexvisitor',
            compact('silabus', 'kategori', 'sub', 'kategoriList', 'subList')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_utama' => 'required|string|max:100',
            'sub_kategori'   => 'required|string|max:50',
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'pdf_file'       => 'nullable|file|mimes:pdf',
            'pdf_link'       => 'nullable|url',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png',
            'gambar_link'    => 'nullable|url',
            'ilustrasi_link' => 'nullable|url',
        ]);

        if ($request->hasFile('pdf_file')) {
            $validated['pdf_file'] = $request->file('pdf_file')->store('silabus/pdf', 'public');
        }

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('silabus/gambar', 'public');
        }

        Silabus::create($validated);

        return redirect()
            ->route('silabus_ujian.index')
            ->with('success', 'Data Silabus berhasil ditambahkan.');
    }

    public function update(Request $request, Silabus $silabus_ujian)
    {
        $validated = $request->validate([
            'kategori_utama' => 'required|string|max:100',
            'sub_kategori'   => 'required|string|max:50',
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'pdf_file'       => 'nullable|file|mimes:pdf',
            'pdf_link'       => 'nullable|url',
            'gambar'         => 'nullable|image|mimes:jpg,jpeg,png',
            'gambar_link'    => 'nullable|url',
            'ilustrasi_link' => 'nullable|url',
        ]);

        if ($request->hasFile('pdf_file')) {
            if ($silabus_ujian->pdf_file) Storage::disk('public')->delete($silabus_ujian->pdf_file);
            $validated['pdf_file'] = $request->file('pdf_file')->store('silabus/pdf', 'public');
        }

        if ($request->hasFile('gambar')) {
            if ($silabus_ujian->gambar) Storage::disk('public')->delete($silabus_ujian->gambar);
            $validated['gambar'] = $request->file('gambar')->store('silabus/gambar', 'public');
        }

        $silabus_ujian->update($validated);

        return redirect()
            ->route('silabus_ujian.index')
            ->with('success', 'Data Silabus berhasil diperbarui.');
    }

    public function destroy(Silabus $silabus_ujian)
    {
        if ($silabus_ujian->pdf_file) Storage::disk('public')->delete($silabus_ujian->pdf_file);
        if ($silabus_ujian->gambar) Storage::disk('public')->delete($silabus_ujian->gambar);

        $silabus_ujian->delete();

        return redirect()
            ->route('silabus_ujian.index')
            ->with('success', 'Data Silabus berhasil dihapus.');
    }
}
