<?php

namespace App\Http\Controllers;

use App\Models\DewanPengurus;
use App\Models\DewanPengawas;

class StrukturController extends Controller
{
    public function index()
    {
        $ketua = DewanPengurus::where('jabatan', 'Ketua')->first();
        $pengurus = DewanPengurus::where('jabatan', '!=', 'Ketua')->get();
        $pengawas = DewanPengawas::all();

        return view('tentang.struktur', compact('ketua', 'pengurus', 'pengawas'));
    }
}
