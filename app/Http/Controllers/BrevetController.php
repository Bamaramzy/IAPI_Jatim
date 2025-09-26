<?php

namespace App\Http\Controllers;

use App\Models\Brevet;
use Illuminate\Http\Request;

class BrevetController extends Controller
{
    public function index()
    {
        $brevets = Brevet::latest()->paginate(10);

        return view('pelatihan.brevet_perpajakan.brevet_a_dan_b.index', compact('brevets'));
    }

    public function indexVisitor()
    {
        $brevets = Brevet::where('status', 'publish')->latest()->paginate(10);

        return view('pelatihan.brevet_perpajakan.brevet_a_dan_b.indexvisitor', compact('brevets'));
    }

    public function create()
    {
        return view('pelatihan.brevet_perpajakan.brevet_a_dan_b.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'brosur'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_daftar' => 'nullable|string',
            'status'      => 'nullable|string|in:publish,draft',
        ]);

        $brosurPath = $this->uploadBrosur($request);

        Brevet::create([
            'judul'       => $request->judul,
            'brosur'      => $brosurPath,
            'link_daftar' => $request->link_daftar,
            'status'      => $request->status ?? 'draft',
        ]);

        return redirect()->route('brevets.index')->with('success', 'Brevet A & B berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $brevet = Brevet::findOrFail($id);

        return view('pelatihan.brevet_perpajakan.brevet_a_dan_b.edit', compact('brevet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'brosur'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_daftar' => 'nullable|string',
            'status'      => 'nullable|string|in:publish,draft',
        ]);

        $brevet = Brevet::findOrFail($id);

        $brosurPath = $brevet->brosur;
        if ($request->hasFile('brosur')) {
            $brosurPath = $this->uploadBrosur($request);
        }

        $brevet->update([
            'judul'       => $request->judul,
            'brosur'      => $brosurPath,
            'link_daftar' => $request->link_daftar,
            'status'      => $request->status ?? 'draft',
        ]);

        return redirect()->route('brevets.index')->with('success', 'Brevet A & B berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $brevet = Brevet::findOrFail($id);
        $brevet->delete();

        return redirect()->route('brevets.index')->with('success', 'Brevet A & B berhasil dihapus.');
    }

    private function uploadBrosur(Request $request)
    {
        if ($request->hasFile('brosur')) {
            return $request->file('brosur')->store('brosur', 'public');
        }
        return null;
    }
}
