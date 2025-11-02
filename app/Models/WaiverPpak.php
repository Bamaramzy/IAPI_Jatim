<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Model;

class WaiverPpak extends Model
{
    use HasActivityLog;
    protected $fillable = [
        'nama_universitas',
        'akreditasi',
        'jumlah_waiver'
    ];
}
