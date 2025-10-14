<?php

namespace App\Imports;

use App\Models\Anggota;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AnggotaImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    private $inserted = 0;
    private $updated = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['no_urut']) || !is_numeric($row['no_urut'])) {
                continue;
            }

            $anggota = Anggota::where('no_urut', $row['no_urut'])->first();

            $data = [
                'no_urut'      => (int) $row['no_urut'],
                'no_reg_iapi'  => $row['no_reg_iapi']  ?? '',
                'nama_anggota' => $row['nama_anggota'] ?? '',
                'izin_ap'      => $row['izin_ap']      ?? null,
                'kategori'     => $row['kategori']     ?? 'Anggota Umum',
                'nama_kap'     => $row['nama_kap']     ?? null,
                'status_id'    => $this->mapStatus($row['status_id'] ?? null),
                'korwil'       => $row['korwil']       ?? null,
            ];

            if ($anggota) {
                $anggota->update($data);
                $this->updated++;
            } else {
                Anggota::create($data);
                $this->inserted++;
            }
        }
    }

    private function mapStatus($value)
    {
        if (is_null($value)) return 'Aktif';
        $v = Str::lower(trim($value));

        if (Str::contains($v, 'aktif')) return 'Aktif';
        if (Str::contains($v, 'cuti'))  return 'Cuti Sementara';

        return 'Aktif';
    }

    public function getInsertedCount()
    {
        return $this->inserted;
    }

    public function getUpdatedCount()
    {
        return $this->updated;
    }
}
