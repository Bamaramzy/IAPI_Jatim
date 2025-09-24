<?php

namespace App\Http\Controllers;

use App\Models\AdArt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdArtController extends Controller
{
    public function index()
    {
        $adarts = AdArt::latest()->paginate(10);
        return view('keanggotaan.adart.index', compact('adarts'));
    }

    public function create()
    {
        return view('keanggotaan.adart.create');
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
            $data['file_pdf'] = $request->file('file_pdf')->store('adart/pdf', 'public');
        }

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('adart/cover', 'public');
        }

        AdArt::create($data);

        return redirect()->route('adart.index')->with('success', 'AD-ART berhasil ditambahkan');
    }

    public function edit(AdArt $adart)
    {
        return view('keanggotaan.adart.edit', compact('adart'));
    }

    public function update(Request $request, AdArt $adart)
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
            if ($adart->file_pdf && Storage::disk('public')->exists($adart->file_pdf)) {
                Storage::disk('public')->delete($adart->file_pdf);
            }
            $data['file_pdf'] = $request->file('file_pdf')->store('adart/pdf', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($adart->cover && Storage::disk('public')->exists($adart->cover)) {
                Storage::disk('public')->delete($adart->cover);
            }
            $data['cover'] = $request->file('cover')->store('adart/cover', 'public');
        }

        $adart->update($data);

        return redirect()->route('adart.index')->with('success', 'AD-ART berhasil diperbarui');
    }

    public function destroy(AdArt $adart)
    {
        if ($adart->file_pdf && Storage::disk('public')->exists($adart->file_pdf)) {
            Storage::disk('public')->delete($adart->file_pdf);
        }

        if ($adart->cover && Storage::disk('public')->exists($adart->cover)) {
            Storage::disk('public')->delete($adart->cover);
        }

        $adart->delete();
        return redirect()->route('adart.index')->with('success', 'AD-ART berhasil dihapus');
    }
}
