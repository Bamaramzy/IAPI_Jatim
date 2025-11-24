<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{

    public function indexVisitor()
    {
        $jadwals = Pelatihan::where('status', 'publish')
            ->orderBy('tanggal_mulai', 'asc')
            ->paginate(6);

        return view('pelatihan.jadwal.indexvisitor', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'           => 'required|string|max:255',
            'kategori'        => 'required|in:Tatap Muka,Webinar,Hybrid',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'waktu_mulai'     => 'required',
            'waktu_selesai'   => 'required',
            'lokasi'          => 'required|string|max:255',
            'brosur'          => 'nullable|image|max:2048',
            'link'       => 'required|string',
            'status'          => 'required|in:draft,publish',
        ]);

        if ($request->hasFile('brosur')) {
            $data['brosur'] = $request->file('brosur')->store('pelatihan/brosur', 'public');
        }

        Pelatihan::create($data);

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function update(Request $request, Pelatihan $pelatihan)
    {
        $data = $request->validate([
            'judul'           => 'required|string|max:255',
            'kategori'        => 'required|in:Tatap Muka,Webinar,Hybrid',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'waktu_mulai'     => 'required',
            'waktu_selesai'   => 'required',
            'lokasi'          => 'required|string|max:255',
            'brosur'          => 'nullable|image|max:2048',
            'link'       => 'required|string',
            'status'          => 'required|in:draft,publish',
        ]);

        if ($request->hasFile('brosur')) {
            if ($pelatihan->brosur && Storage::disk('public')->exists($pelatihan->brosur)) {
                Storage::disk('public')->delete($pelatihan->brosur);
            }
            $data['brosur'] = $request->file('brosur')->store('pelatihan/brosur', 'public');
        }

        $pelatihan->update($data);

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil diperbarui.');
    }

    public function destroy(Pelatihan $pelatihan)
    {
        if ($pelatihan->brosur && Storage::disk('public')->exists($pelatihan->brosur)) {
            Storage::disk('public')->delete($pelatihan->brosur);
        }

        $pelatihan->delete();

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil dihapus.');
    }
}
