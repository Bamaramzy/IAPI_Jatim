<?php

namespace App\Http\Controllers;

use App\Models\TestCenter;
use Illuminate\Http\Request;

class TestCenterController extends Controller
{
    public function index(Request $request)
    {
        $query = TestCenter::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('kode', 'like', "%{$search}%")
                    ->orWhere('kota', 'like', "%{$search}%");
            });
        }

        $testcenters = $query->latest()->paginate(10);
        return view('sertifikasi.test_center.index', compact('testcenters'));
    }

    public function indexVisitor(Request $request)
    {
        $query = TestCenter::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('kode', 'like', "%{$search}%")
                    ->orWhere('kota', 'like', "%{$search}%");
            });
        }

        $testcenters = $query->latest()->paginate(10);

        return view('sertifikasi.test_center.indexvisitor', compact('testcenters'));
    }

    public function create()
    {
        return view('sertifikasi.test_center.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode'    => 'required|string|max:50|unique:test_centers,kode',
            'nama'    => 'required|string|max:255',
            'alamat'  => 'required|string',
            'kota'    => 'required|string|max:100',
            'telepon' => 'nullable|string|max:100',
        ]);

        TestCenter::create($request->only(['kode', 'nama', 'alamat', 'kota', 'telepon']));

        return redirect()->route('test_center.index')->with('success', 'Test Center berhasil ditambahkan');
    }

    public function edit(TestCenter $test_center)
    {
        return view('sertifikasi.test_center.edit', compact('test_center'));
    }

    public function update(Request $request, TestCenter $test_center)
    {
        $request->validate([
            'kode'    => 'required|string|max:50|unique:test_centers,kode,' . $test_center->id,
            'nama'    => 'required|string|max:255',
            'alamat'  => 'required|string',
            'kota'    => 'required|string|max:100',
            'telepon' => 'nullable|string|max:100',
        ]);

        $test_center->update($request->only(['kode', 'nama', 'alamat', 'kota', 'telepon']));

        return redirect()->route('test_center.index')->with('success', 'Test Center berhasil diperbarui');
    }

    public function destroy(TestCenter $test_center)
    {
        $test_center->delete();

        return redirect()->route('test_center.index')->with('success', 'Test Center berhasil dihapus');
    }
}
