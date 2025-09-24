<?php

namespace App\Http\Controllers;

use App\Models\TataCara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TataCaraController extends Controller
{
    public function index()
    {
        $tatacaras = TataCara::latest()->paginate(10);
        return view('keanggotaan.tatacara.index', compact('tatacaras'));
    }

    public function create()
    {
        return view('keanggotaan.tatacara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string|max:255',
            'status'     => 'required|in:aktif,nonaktif',
            'file_pdf'   => 'nullable|mimes:pdf|max:20480',
            'link_drive' => 'nullable|url',
            'cover'      => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'status', 'link_drive']);

        if ($request->hasFile('file_pdf')) {
            $data['file_pdf'] = $request->file('file_pdf')->store('tatacara/pdf', 'public');
        }

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('tatacara/cover', 'public');
        }

        TataCara::create($data);

        return redirect()->route('tatacara.index')->with('success', 'Tata Cara berhasil ditambahkan');
    }

    public function edit(TataCara $tatacara)
    {
        return view('keanggotaan.tatacara.edit', compact('tatacara'));
    }

    public function update(Request $request, TataCara $tatacara)
    {
        $request->validate([
            'judul'      => 'required|string|max:255',
            'status'     => 'required|in:aktif,nonaktif',
            'file_pdf'   => 'nullable|mimes:pdf|max:20480',
            'link_drive' => 'nullable|url',
            'cover'      => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'status', 'link_drive']);

        if ($request->hasFile('file_pdf')) {
            if ($tatacara->file_pdf && Storage::disk('public')->exists($tatacara->file_pdf)) {
                Storage::disk('public')->delete($tatacara->file_pdf);
            }
            $data['file_pdf'] = $request->file('file_pdf')->store('tatacara/pdf', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($tatacara->cover && Storage::disk('public')->exists($tatacara->cover)) {
                Storage::disk('public')->delete($tatacara->cover);
            }
            $data['cover'] = $request->file('cover')->store('tatacara/cover', 'public');
        }

        $tatacara->update($data);

        return redirect()->route('tatacara.index')->with('success', 'Tata Cara berhasil diperbarui');
    }

    public function destroy(TataCara $tatacara)
    {
        if ($tatacara->file_pdf && Storage::disk('public')->exists($tatacara->file_pdf)) {
            Storage::disk('public')->delete($tatacara->file_pdf);
        }

        if ($tatacara->cover && Storage::disk('public')->exists($tatacara->cover)) {
            Storage::disk('public')->delete($tatacara->cover);
        }

        $tatacara->delete();
        return redirect()->route('tatacara.index')->with('success', 'Tata Cara berhasil dihapus');
    }
}
