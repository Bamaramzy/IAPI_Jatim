<?php

namespace App\Http\Controllers;

use App\Models\Direktori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DirektoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $direktoris = Direktori::latest()->paginate(10);
        return view('keanggotaan.direktori.index', compact('direktoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('keanggotaan.direktori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Direktori $direktori)
    {
        return view('keanggotaan.direktori.show', compact('direktori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Direktori $direktori)
    {
        return view('keanggotaan.direktori.edit', compact('direktori'));
    }

    /**
     * Update the specified resource in storage.
     */
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
            if ($direktori->file_pdf && Storage::disk('public')->exists($direktori->file_pdf)) {
                Storage::disk('public')->delete($direktori->file_pdf);
            }
            $data['file_pdf'] = $request->file('file_pdf')->store('direktori/pdf', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($direktori->cover && Storage::disk('public')->exists($direktori->cover)) {
                Storage::disk('public')->delete($direktori->cover);
            }
            $data['cover'] = $request->file('cover')->store('direktori/cover', 'public');
        }

        $direktori->update($data);

        return redirect()->route('direktori.index')->with('success', 'Direktori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
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
