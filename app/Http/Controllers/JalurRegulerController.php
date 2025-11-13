<?php

namespace App\Http\Controllers;

use App\Models\JalurReguler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JalurRegulerController extends Controller
{
    public function index()
    {
        $jalurRegulers = JalurReguler::latest()->paginate(10);
        return view('sertifikasi.ujian.jalur_reguler.index', compact('jalurRegulers'));
    }

    public function indexVisitor(Request $request)
    {
        $query = JalurReguler::query();
        $kategori = $request->get('kategori', 'Informasi Umum');
        $query->where('kategori', $kategori);
        $jalurRegulers = $query->latest()->paginate(10);

        return view('sertifikasi.ujian.jalur_reguler.indexvisitor', compact('jalurRegulers', 'kategori'));
    }

    public function create()
    {
        return view('sertifikasi.ujian.jalur_reguler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul'    => 'required|string|max:255',
            'konten'   => 'nullable|string',
            'file'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'link'     => 'nullable|url',
        ]);

        $data = $request->only(['kategori', 'judul', 'konten', 'link']);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('jalur_reguler/files', 'public');
        }

        JalurReguler::create($data);

        return redirect()->route('jalur_reguler.index')
            ->with('success', 'Data Jalur Reguler berhasil ditambahkan');
    }

    public function edit(JalurReguler $jalur_reguler)
    {
        return view('sertifikasi.ujian.jalur_reguler.edit', compact('jalur_reguler'));
    }

    public function update(Request $request, JalurReguler $jalur_reguler)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul'    => 'required|string|max:255',
            'konten'   => 'nullable|string',
            'file'     => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'link'     => 'nullable|url',
        ]);

        $data = $request->only(['kategori', 'judul', 'konten', 'link']);

        if ($request->hasFile('file')) {
            if ($jalur_reguler->file && Storage::disk('public')->exists($jalur_reguler->file)) {
                Storage::disk('public')->delete($jalur_reguler->file);
            }
            $data['file'] = $request->file('file')->store('jalur_reguler/files', 'public');
        }

        $jalur_reguler->update($data);

        return redirect()->route('jalur_reguler.index')
            ->with('success', 'Data Jalur Reguler berhasil diperbarui');
    }

    public function destroy(JalurReguler $jalur_reguler)
    {
        if ($jalur_reguler->file && Storage::disk('public')->exists($jalur_reguler->file)) {
            Storage::disk('public')->delete($jalur_reguler->file);
        }

        $jalur_reguler->delete();

        return redirect()->route('jalur_reguler.index')
            ->with('success', 'Data Jalur Reguler berhasil dihapus');
    }
}
