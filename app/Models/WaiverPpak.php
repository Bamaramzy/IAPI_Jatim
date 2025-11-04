<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\WaiverPpakResource;

class WaiverPpak extends Model
{
    use HasActivityLog;
    protected $fillable = [
        'nama_universitas',
        'akreditasi',
        'jumlah_waiver'
    ];

    public function getFilamentUrl()
    {
        return WaiverPpakResource::getUrl('edit', ['record' => $this]);
    }
}
