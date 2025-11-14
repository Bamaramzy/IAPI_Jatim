<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Pelatihan;

class HomeController extends Controller
{
    public function welcome()
    {
        $informasis = Informasi::latest()->get();
        $jadwals = Pelatihan::where('status', 'publish')
            ->orderBy('tanggal_mulai', 'desc')
            ->limit(6)
            ->get();

        return view('welcome', compact('informasis', 'jadwals'));
    }
}
