<?php

namespace App\Http\Controllers;

use App\Models\WaiverPpak;
use Illuminate\Http\Request;

class WaiverPpakController extends Controller
{
    public function index()
    {
        $waivers = WaiverPpak::latest()->paginate(10);

        return view('sertifikasi.waiver_ppak.index', compact('waivers'));
    }

    public function indexVisitor(Request $request)
    {
        $sort      = $request->get('sort', 'id');
        $direction = $request->get('direction', 'asc');
        $search    = $request->get('search');

        $waivers = WaiverPpak::when($search, function ($query, $search) {
            return $query->where('nama_universitas', 'like', "%{$search}%");
        })
            ->orderBy($sort, $direction)
            ->paginate(10);

        return view('sertifikasi.waiver_ppak.indexvisitor', compact('waivers'));
    }

    public function create()
    {
        return view('sertifikasi.waiver_ppak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_universitas' => 'required|string|max:255',
            'akreditasi'       => 'required|string|max:100',
            'jumlah_waiver'    => 'required|string|max:50',
        ]);

        WaiverPpak::create($validated);

        return redirect()
            ->route('waiver_ppak.index')
            ->with('success', 'Data Waiver berhasil ditambahkan');
    }

    public function edit(WaiverPpak $waiver_ppak)
    {
        return view('sertifikasi.waiver_ppak.edit', compact('waiver_ppak'));
    }

    public function update(Request $request, WaiverPpak $waiver_ppak)
    {
        $validated = $request->validate([
            'nama_universitas' => 'required|string|max:255',
            'akreditasi'       => 'required|string|max:100',
            'jumlah_waiver'    => 'required|string|max:50',
        ]);

        $waiver_ppak->update($validated);

        return redirect()
            ->route('waiver_ppak.index')
            ->with('success', 'Data Waiver berhasil diperbarui');
    }

    public function destroy(WaiverPpak $waiver_ppak)
    {
        $waiver_ppak->delete();

        return redirect()
            ->route('waiver_ppak.index')
            ->with('success', 'Data Waiver berhasil dihapus');
    }
}
