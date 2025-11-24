<?php

namespace App\Http\Controllers;

use App\Models\BrevetKuasa;
use Illuminate\Http\Request;

class BrevetKuasaController extends Controller
{

    public function indexVisitor()
    {
        $brevets = BrevetKuasa::where('status', 'publish')->latest()->paginate(10);

        return view('pelatihan.brevet_perpajakan.brevet_kuasa.indexvisitor', compact('brevets'));
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

        BrevetKuasa::create([
            'judul'       => $request->judul,
            'brosur'      => $brosurPath,
            'link_daftar' => $request->link_daftar,
            'status'      => $request->status ?? 'draft',
        ]);

        return redirect()->route('brevets_kuasa.index')->with('success', 'Brevet Kuasa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $brevet = BrevetKuasa::findOrFail($id);

        return view('pelatihan.brevet_perpajakan.brevet_kuasa.edit', compact('brevet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'brosur'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_daftar' => 'nullable|string',
            'status'      => 'nullable|string|in:publish,draft',
        ]);

        $brevet = BrevetKuasa::findOrFail($id);

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

        return redirect()->route('brevets_kuasa.index')->with('success', 'Brevet Kuasa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $brevet = BrevetKuasa::findOrFail($id);
        $brevet->delete();

        return redirect()->route('brevets_kuasa.index')->with('success', 'Brevet Kuasa berhasil dihapus.');
    }

    private function uploadBrosur(Request $request)
    {
        if ($request->hasFile('brosur')) {
            return $request->file('brosur')->store('brosur_kuasa', 'public');
        }
        return null;
    }
}
