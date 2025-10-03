<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = [
            'RPL ACPA',
            'RPL RNA',
            'CTA',
            'RPL PPAK',
            'SERTIFIKASI BPK',
        ];

        foreach ($kategoris as $nama) {
            Kategori::updateOrCreate(
                ['slug' => Str::slug($nama)], // agar tidak double jika seeder dijalankan ulang
                ['nama_kategori' => $nama]
            );
        }
    }
}
