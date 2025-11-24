<?php

namespace App\Http\Controllers;

use App\Models\BrevetC;
use Illuminate\Http\Request;

class BrevetCController extends Controller
{

    public function indexVisitor()
    {
        $brevets = BrevetC::where('status', 'publish')->latest()->paginate(10);

        return view('pelatihan.brevet_perpajakan.brevet_c.indexvisitor', compact('brevets'));
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

        BrevetC::create([
            'judul'       => $request->judul,
            'brosur'      => $brosurPath,
            'link_daftar' => $request->link_daftar,
            'status'      => $request->status ?? 'draft',
        ]);

        return redirect()->route('brevets_c.index')->with('success', 'Brevet C berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $brevet = BrevetC::findOrFail($id);

        return view('pelatihan.brevet_perpajakan.brevet_c.edit', compact('brevet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'brosur'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'link_daftar' => 'nullable|string',
            'status'      => 'nullable|string|in:publish,draft',
        ]);

        $brevet = BrevetC::findOrFail($id);

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

        return redirect()->route('brevets_c.index')->with('success', 'Brevet C berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $brevet = BrevetC::findOrFail($id);
        $brevet->delete();

        return redirect()->route('brevets_c.index')->with('success', 'Brevet C berhasil dihapus.');
    }

    private function uploadBrosur(Request $request)
    {
        if ($request->hasFile('brosur')) {
            return $request->file('brosur')->store('brosur_c', 'public');
        }
        return null;
    }
}
