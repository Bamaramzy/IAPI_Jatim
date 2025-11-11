<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\AnggotaResource;

class Anggota extends Model
{
    use HasFactory;
    use HasActivityLog;
    protected $table = 'anggotas';
    protected $fillable = [
        'no_urut',
        'no_reg_iapi',
        'nama_anggota',
        'izin_ap',
        'kategori',
        'nama_kap',
        'status_id',
        'korwil',
        'terdaftar_pada',
    ];

    public function getFilamentUrl(): string
    {
        return AnggotaResource::getUrl('edit', ['record' => $this]);
    }
}
