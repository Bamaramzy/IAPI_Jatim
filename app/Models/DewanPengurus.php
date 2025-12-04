<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\DewanPengurusResource;

class DewanPengurus extends Model
{
    use HasFactory;
    use HasActivityLog;
    protected $table = 'dewan_pengurus';
    protected $fillable = [
        'nama',
        'jabatan',
        'gambar',
    ];

    public function getFilamentUrl(): string
    {
        return DewanPengurusResource::getUrl('edit', ['record' => $this]);
    }
}
