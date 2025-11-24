<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pdf;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopPenyetaraanController extends Controller
{
    public function indexVisitor(Request $request)
    {
        $kategoriList = Kategori::orderBy('nama_kategori')->get();

        $kategoriAktif = $request->query('kategori');
        if (!$kategoriAktif && $kategoriList->isNotEmpty()) {
            $kategoriAktif = $kategoriList->first()->id;
        }

        $pdfList = Pdf::query()
            ->when($kategoriAktif, fn($q) => $q->where('kategori_id', $kategoriAktif))
            ->orderBy('created_at', 'desc')
            ->get();

        $videoList = Video::query()
            ->when($kategoriAktif, fn($q) => $q->where('kategori_id', $kategoriAktif))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('sertifikasi.ujian.tutorial.workshop_penyetaraan.indexvisitor', compact(
            'kategoriList',
            'kategoriAktif',
            'pdfList',
            'videoList'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id'        => 'nullable|exists:workshop_penyetaraan_kategori,id',
            'nama_kategori'      => 'nullable|string|max:255',
            'judul'              => 'required|string|max:255',

            // PDF
            'file_path'          => 'nullable|mimes:pdf|max:5120',
            'link_url'           => 'nullable|url',
            'preview_thumbnail'  => 'nullable|image|max:2048',

            // Video
            'video_file'         => 'nullable|mimetypes:video/mp4,video/x-msvideo,video/quicktime|max:51200',
            'video_url'          => 'nullable|url',
            'thumbnail_url'      => 'nullable|image|max:2048',
        ]);

        // Buat / temukan kategori
        $kategori = $request->filled('kategori_id')
            ? Kategori::find($request->kategori_id)
            : Kategori::create(['nama_kategori' => $request->nama_kategori ?? $request->judul]);

        /**
         * Simpan PDF
         */
        if ($request->hasFile('file_path') || $request->filled('link_url')) {
            $filePath = $request->hasFile('file_path')
                ? $request->file('file_path')->store('workshop_penyetaraan/pdf', 'public')
                : null;

            $thumbPath = $request->hasFile('preview_thumbnail')
                ? $request->file('preview_thumbnail')->store('workshop_penyetaraan/thumbnails', 'public')
                : null;

            Pdf::create([
                'kategori_id'       => $kategori->id,
                'judul'             => $request->judul,
                'file_path'         => $filePath,
                'link_url'          => $request->link_url,
                'preview_thumbnail' => $thumbPath,
            ]);
        }

        /**
         * Simpan Video
         */
        if ($request->hasFile('video_file') || $request->filled('video_url')) {
            $videoPath = $request->hasFile('video_file')
                ? $request->file('video_file')->store('workshop_penyetaraan/video', 'public')
                : null;

            $thumbPath = $request->hasFile('thumbnail_url')
                ? $request->file('thumbnail_url')->store('workshop_penyetaraan/thumbnails', 'public')
                : null;

            Video::create([
                'kategori_id'  => $kategori->id,
                'judul'        => $request->judul,
                'video_url'    => $request->video_url ?? $videoPath,
                'thumbnail_url' => $thumbPath,
            ]);
        }

        return redirect()->route('workshop_penyetaraan.index')
            ->with('success', 'Workshop Penyetaraan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $type = $request->input('type');

        switch ($type) {
            case 'kategori':
                $validated = $request->validate(['nama_kategori' => 'required|string|max:255']);
                Kategori::findOrFail($id)->update($validated);
                break;

            case 'pdf':
                $pdf = Pdf::findOrFail($id);
                $validated = $request->validate([
                    'judul'             => 'required|string|max:255',
                    'file_path'         => 'nullable|mimes:pdf|max:5120',
                    'link_url'          => 'nullable|url',
                    'preview_thumbnail' => 'nullable|image|max:2048',
                ]);

                if ($request->hasFile('file_path')) {
                    if ($pdf->file_path && Storage::disk('public')->exists($pdf->file_path)) {
                        Storage::disk('public')->delete($pdf->file_path);
                    }
                    $pdfFile = $request->file('file_path')->store('workshop_penyetaraan/pdf', 'public');
                } else {
                    $pdfFile = $pdf->file_path;
                }

                if ($request->hasFile('preview_thumbnail')) {
                    if ($pdf->preview_thumbnail && Storage::disk('public')->exists($pdf->preview_thumbnail)) {
                        Storage::disk('public')->delete($pdf->preview_thumbnail);
                    }
                    $thumb = $request->file('preview_thumbnail')->store('workshop_penyetaraan/thumbnails', 'public');
                } else {
                    $thumb = $pdf->preview_thumbnail;
                }

                $pdf->update([
                    'judul'             => $validated['judul'],
                    'file_path'         => $pdfFile,
                    'link_url'          => $request->link_url ?? $pdf->link_url,
                    'preview_thumbnail' => $thumb,
                ]);
                break;

            case 'video':
                $video = Video::findOrFail($id);
                $validated = $request->validate([
                    'judul'         => 'required|string|max:255',
                    'video_file'    => 'nullable|mimetypes:video/mp4,video/x-msvideo,video/quicktime|max:51200',
                    'video_url'     => 'nullable|url',
                    'thumbnail_url' => 'nullable|image|max:2048',
                ]);

                if ($request->hasFile('video_file')) {
                    if ($video->video_url && Storage::disk('public')->exists($video->video_url)) {
                        Storage::disk('public')->delete($video->video_url);
                    }
                    $videoPath = $request->file('video_file')->store('workshop_penyetaraan/video', 'public');
                } else {
                    $videoPath = $video->video_url;
                }

                if ($request->hasFile('thumbnail_url')) {
                    if ($video->thumbnail_url && Storage::disk('public')->exists($video->thumbnail_url)) {
                        Storage::disk('public')->delete($video->thumbnail_url);
                    }
                    $thumbPath = $request->file('thumbnail_url')->store('workshop_penyetaraan/thumbnails', 'public');
                } else {
                    $thumbPath = $video->thumbnail_url;
                }

                $video->update([
                    'judul'         => $validated['judul'],
                    'video_url'     => $request->video_url ?? $videoPath,
                    'thumbnail_url' => $thumbPath,
                ]);
                break;
        }

        return redirect()->route('workshop_penyetaraan.index')
            ->with('success', ucfirst($type) . ' berhasil diperbarui.');
    }

    public function destroyPdf($id)
    {
        $pdf = Pdf::findOrFail($id);
        if ($pdf->file_path && Storage::disk('public')->exists($pdf->file_path)) {
            Storage::disk('public')->delete($pdf->file_path);
        }
        if ($pdf->preview_thumbnail && Storage::disk('public')->exists($pdf->preview_thumbnail)) {
            Storage::disk('public')->delete($pdf->preview_thumbnail);
        }
        $pdf->delete();

        return back()->with('success', 'PDF berhasil dihapus.');
    }

    public function destroyVideo($id)
    {
        $video = Video::findOrFail($id);
        if ($video->thumbnail_url && Storage::disk('public')->exists($video->thumbnail_url)) {
            Storage::disk('public')->delete($video->thumbnail_url);
        }
        $video->delete();

        return back()->with('success', 'Video berhasil dihapus.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::with(['pdfs', 'videos'])->findOrFail($id);

        foreach ($kategori->pdfs as $pdf) {
            if ($pdf->file_path && Storage::disk('public')->exists($pdf->file_path)) {
                Storage::disk('public')->delete($pdf->file_path);
            }
            if ($pdf->preview_thumbnail && Storage::disk('public')->exists($pdf->preview_thumbnail)) {
                Storage::disk('public')->delete($pdf->preview_thumbnail);
            }
            $pdf->delete();
        }

        foreach ($kategori->videos as $video) {
            if ($video->thumbnail_url && Storage::disk('public')->exists($video->thumbnail_url)) {
                Storage::disk('public')->delete($video->thumbnail_url);
            }
            $video->delete();
        }

        $kategori->delete();

        return back()->with('success', 'Kategori dan seluruh isinya berhasil dihapus.');
    }
}
