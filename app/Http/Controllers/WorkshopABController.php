<?php

namespace App\Http\Controllers;

use App\Models\WorkshopAB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopABController extends Controller
{
    /**
     * Menampilkan daftar Workshop A-B (Admin)
     */
    public function index()
    {
        $workshops = WorkshopAB::orderBy('created_at', 'asc')->get();
        return view('sertifikasi.workshop_ab.index', compact('workshops'));
    }

    /**
     * Menampilkan daftar Workshop A-B (Visitor/Public)
     */
    public function indexVisitor()
    {
        $workshop_ab = \App\Models\WorkshopAB::latest()->first();
        return view('sertifikasi.workshop_ab.indexvisitor', compact('workshop_ab'));
    }

    /**
     * Form Tambah
     */
    public function create()
    {
        return view('sertifikasi.workshop_ab.create');
    }

    /**
     * Simpan Data Baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pdf'       => 'nullable|mimes:pdf|max:5120',
            'link_pdf'  => 'nullable|url',
            'link_form' => 'nullable|url',
        ]);

        if ($request->hasFile('pdf')) {
            $validated['pdf'] = $request->file('pdf')->store('workshops/pdf', 'public');
        }

        WorkshopAB::create($validated);

        return redirect()
            ->route('workshop_ab.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Form Edit
     */
    public function edit(WorkshopAB $workshop_ab)
    {
        return view('sertifikasi.workshop_ab.edit', compact('workshop_ab'));
    }

    /**
     * Update Data
     */
    public function update(Request $request, WorkshopAB $workshop_ab)
    {
        $validated = $request->validate([
            'pdf'       => 'nullable|mimes:pdf|max:5120',
            'link_pdf'  => 'nullable|url',
            'link_form' => 'nullable|url',
        ]);

        // replace pdf jika ada upload baru
        if ($request->hasFile('pdf')) {
            if ($workshop_ab->pdf && Storage::disk('public')->exists($workshop_ab->pdf)) {
                Storage::disk('public')->delete($workshop_ab->pdf);
            }
            $validated['pdf'] = $request->file('pdf')->store('workshops/pdf', 'public');
        }

        $workshop_ab->update($validated);

        return redirect()
            ->route('workshop_ab.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Hapus Data
     */
    public function destroy(WorkshopAB $workshop_ab)
    {
        if ($workshop_ab->pdf && Storage::disk('public')->exists($workshop_ab->pdf)) {
            Storage::disk('public')->delete($workshop_ab->pdf);
        }

        $workshop_ab->delete();

        return redirect()
            ->route('workshop_ab.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
