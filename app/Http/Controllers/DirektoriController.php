<?php

namespace App\Http\Controllers;

use App\Models\Direktori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirektoriController extends Controller
{
    public function index(Request $request)
    {
        $direktoris = Direktori::latest()->paginate(9);

        if ($request->routeIs('visitor.direktori')) {
            return view('keanggotaan.direktori.indexvisitor', compact('direktoris'));
        }

        return view('keanggotaan.direktori.index', compact('direktoris'));
    }

    public function create()
    {
        return view('keanggotaan.direktori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link_drive' => 'nullable|url',
            'status' => 'required|in:aktif,nonaktif',
            'file_pdf' => 'nullable|mimes:pdf|max:20480',
            'cover' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'link_drive', 'status']);

        if ($request->hasFile('file_pdf')) {
            $data['file_pdf'] = $request->file('file_pdf')->store('direktori/pdf', 'public');
        }

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('direktori/cover', 'public');
        }

        Direktori::create($data);

        return redirect()->route('direktori.index')->with('success', 'Direktori berhasil ditambahkan');
    }

    public function show(Direktori $direktori)
    {
        return view('keanggotaan.direktori.show', compact('direktori'));
    }

    public function edit(Direktori $direktori)
    {
        return view('keanggotaan.direktori.edit', compact('direktori'));
    }

    public function update(Request $request, Direktori $direktori)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'link_drive' => 'nullable|url',
            'status' => 'required|in:aktif,nonaktif',
            'file_pdf' => 'nullable|mimes:pdf|max:20480',
            'cover' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'link_drive', 'status']);

        if ($request->hasFile('file_pdf')) {
            if ($direktori->file_pdf && Storage::exists('public/' . $direktori->file_pdf)) {
                Storage::delete('public/' . $direktori->file_pdf);
            }
            $path = $request->file('file_pdf')->store('direktori/pdf', 'public');
            $direktori->file_pdf = $path;
        }

        if ($request->hasFile('cover')) {
            if ($direktori->cover && Storage::exists('public/' . $direktori->cover)) {
                Storage::delete('public/' . $direktori->cover);
            }
            $coverPath = $request->file('cover')->store('direktori/cover', 'public');
            $direktori->cover = $coverPath;
        }

        $direktori->update($data);

        return redirect()->route('direktori.index')->with('success', 'Direktori berhasil diperbarui');
    }

    public function destroy(Direktori $direktori)
    {
        if ($direktori->file_pdf && Storage::disk('public')->exists($direktori->file_pdf)) {
            Storage::disk('public')->delete($direktori->file_pdf);
        }

        if ($direktori->cover && Storage::disk('public')->exists($direktori->cover)) {
            Storage::disk('public')->delete($direktori->cover);
        }

        $direktori->delete();

        return redirect()->route('direktori.index')->with('success', 'Direktori berhasil dihapus');
    }
}
