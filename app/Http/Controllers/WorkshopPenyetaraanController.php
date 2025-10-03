<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pdf;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopPenyetaraanController extends Controller
{
    /** =======================
     * INDEX
     * ======================= */
    public function index()
    {
        $kategoris = Kategori::with(['pdfs', 'videos'])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('sertifikasi.ujian.tutorial.workshop_penyetaraan.index', compact('kategoris'));
    }

    /** =======================
     * CREATE
     * ======================= */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('sertifikasi.ujian.tutorial.workshop_penyetaraan.create', compact('kategoris'));
    }

    /** =======================
     * STORE
     * ======================= */
    public function store(Request $request)
    {
        $type = $request->input('type');

        if ($type === 'kategori') {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
            ]);
            Kategori::create($validated);

            return back()->with('success', 'Kategori berhasil ditambahkan.');
        }

        if ($type === 'pdf') {
            $validated = $request->validate([
                'kategori_id' => 'required|exists:workshop_penyetaraan_kategori,id',
                'judul'       => 'required|string|max:255',
                'pdf'         => 'nullable|mimes:pdf|max:5120|required_without:link_pdf',
                'link_pdf'    => 'nullable|url|required_without:pdf',
            ]);

            $filePath = null;
            if ($request->hasFile('pdf')) {
                $filePath = $request->file('pdf')->store('workshop_penyetaraan/pdf', 'public');
            } else {
                $filePath = $validated['link_pdf'];
            }

            Pdf::create([
                'kategori_id' => $validated['kategori_id'],
                'judul'       => $validated['judul'],
                'file_path'   => $filePath,
            ]);

            return back()->with('success', 'PDF berhasil ditambahkan.');
        }

        if ($type === 'video') {
            $validated = $request->validate([
                'kategori_id' => 'required|exists:workshop_penyetaraan_kategori,id',
                'judul'       => 'required|string|max:255',
                'link_url'    => 'required|url',
            ]);

            Video::create($validated);

            return back()->with('success', 'Video berhasil ditambahkan.');
        }

        return back()->with('error', 'Tipe data tidak dikenali.');
    }

    /** =======================
     * EDIT
     * ======================= */
    public function edit(Request $request, $id)
    {
        $type = $request->query('type', 'kategori');
        $kategoris = Kategori::all();

        if ($type === 'kategori') {
            $workshop = Kategori::findOrFail($id);
        } elseif ($type === 'pdf') {
            $workshop = Pdf::findOrFail($id);
        } elseif ($type === 'video') {
            $workshop = Video::findOrFail($id);
        } else {
            return back()->with('error', 'Tipe untuk edit tidak dikenali.');
        }

        return view('sertifikasi.ujian.tutorial.workshop_penyetaraan.edit', compact('workshop', 'kategoris', 'type'));
    }

    /** =======================
     * UPDATE
     * ======================= */
    public function update(Request $request, $id)
    {
        $type = $request->input('type');

        if ($type === 'kategori') {
            $workshop = Kategori::findOrFail($id);
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
            ]);
            $workshop->update($validated);

            return back()->with('success', 'Kategori berhasil diperbarui.');
        }

        if ($type === 'pdf') {
            $workshop = Pdf::findOrFail($id);
            $validated = $request->validate([
                'judul'    => 'required|string|max:255',
                'pdf'      => 'nullable|mimes:pdf|max:5120',
                'link_pdf' => 'nullable|url',
            ]);

            if ($request->hasFile('pdf')) {
                if ($workshop->file_path && Storage::disk('public')->exists($workshop->file_path)) {
                    Storage::disk('public')->delete($workshop->file_path);
                }
                $filePath = $request->file('pdf')->store('workshop_penyetaraan/pdf', 'public');
            } elseif ($request->filled('link_pdf')) {
                $filePath = $validated['link_pdf'];
            } else {
                $filePath = $workshop->file_path;
            }

            $workshop->update([
                'judul'     => $validated['judul'],
                'file_path' => $filePath,
            ]);

            return back()->with('success', 'PDF berhasil diperbarui.');
        }

        if ($type === 'video') {
            $workshop = Video::findOrFail($id);
            $validated = $request->validate([
                'judul'    => 'required|string|max:255',
                'link_url' => 'required|url',
            ]);

            $workshop->update($validated);

            return back()->with('success', 'Video berhasil diperbarui.');
        }

        return back()->with('error', 'Tipe untuk update tidak dikenali.');
    }

    /** =======================
     * DESTROY
     * ======================= */
    public function destroy(Request $request, $id)
    {
        $type = $request->input('type');

        if ($type === 'pdf') {
            $workshop = Pdf::findOrFail($id);
            if ($workshop->file_path && Storage::disk('public')->exists($workshop->file_path)) {
                Storage::disk('public')->delete($workshop->file_path);
            }
            $workshop->delete();

            return back()->with('success', 'PDF berhasil dihapus.');
        }

        if ($type === 'video') {
            $workshop = Video::findOrFail($id);
            $workshop->delete();

            return back()->with('success', 'Video berhasil dihapus.');
        }

        if ($type === 'kategori') {
            $workshop = Kategori::findOrFail($id);

            foreach ($workshop->pdfs as $pdf) {
                if ($pdf->file_path && Storage::disk('public')->exists($pdf->file_path)) {
                    Storage::disk('public')->delete($pdf->file_path);
                }
                $pdf->delete();
            }

            $workshop->videos()->delete();
            $workshop->delete();

            return back()->with('success', 'Kategori dan seluruh isinya berhasil dihapus.');
        }

        return back()->with('error', 'Tipe untuk delete tidak dikenali.');
    }
}
