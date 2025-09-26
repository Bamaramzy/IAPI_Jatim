<?php

namespace App\Http\Controllers;

use App\Models\Ppl;
use Illuminate\Http\Request;

class PplController extends Controller
{
    public function index()
    {
        $ppls = Ppl::latest()->paginate(10);

        return view('pelatihan.ppl.index', compact('ppls'));
    }
    public function indexVisitor()
    {
        $ppls = Ppl::where('status', 'publish')->latest()->paginate(10);

        return view('pelatihan.ppl.indexvisitor', compact('ppls'));
    }
    public function create()
    {
        return view('pelatihan.ppl.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_url' => 'nullable|string',
            'pdf_url'   => 'nullable|string',
            'status'    => 'nullable|string|in:publish,draft',
        ]);

        $pdfUrl = $this->convertDriveLink($request->pdf_url);

        Ppl::create([
            'video_url' => $request->video_url,
            'pdf_url'   => $pdfUrl,
            'status'    => $request->status ?? 'draft',
        ]);

        return redirect()->route('ppl.index')->with('success', 'PPL berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'video_url' => 'nullable|string',
            'pdf_url'   => 'nullable|string',
            'status'    => 'nullable|string|in:publish,draft',
        ]);

        $ppl = Ppl::findOrFail($id);

        $pdfUrl = $this->convertDriveLink($request->pdf_url);

        $ppl->update([
            'video_url' => $request->video_url,
            'pdf_url'   => $pdfUrl,
            'status'    => $request->status ?? 'draft',
        ]);

        return redirect()->route('ppl.index')->with('success', 'PPL berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $ppl = Ppl::findOrFail($id);
        $ppl->delete();

        return redirect()->route('ppl.index')->with('success', 'PPL berhasil dihapus.');
    }

    // 🔹 helper untuk ubah link google drive ke preview
    private function convertDriveLink($url)
    {
        if (!$url) return null;

        if (preg_match('/\/d\/(.*?)\//', $url, $matches)) {
            return "https://drive.google.com/file/d/{$matches[1]}/preview";
        }

        return $url;
    }
}
