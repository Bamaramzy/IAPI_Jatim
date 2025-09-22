<?php

namespace App\Imports;

use App\Models\Anggota;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AnggotaImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    public function model(array $row)
    {
        if (empty($row['no_urut']) || !is_numeric($row['no_urut'])) {
            return null; // skip row
        }

        $statusRaw = $row['status_id'] ?? null;

        return new Anggota([
            'no_urut'      => (int) $row['no_urut'],
            'no_reg_iapi'  => $row['no_reg_iapi']  ?? '',
            'nama_anggota' => $row['nama_anggota'] ?? '',
            'izin_ap'      => $row['izin_ap']      ?? null,
            'kategori'     => $row['kategori']     ?? 'Anggota Umum',
            'nama_kap'     => $row['nama_kap']     ?? null,
            'status_id'    => $this->mapStatus($statusRaw),
            'korwil'       => $row['korwil']       ?? null,
        ]);
    }


    private function mapStatus($value)
    {
        if (is_null($value)) return 'Aktif';
        $v = Str::lower(trim($value));

        if (Str::contains($v, 'aktif')) return 'Aktif';
        if (Str::contains($v, 'cuti'))  return 'Cuti Sementara';

        return 'Aktif';
    }
}
