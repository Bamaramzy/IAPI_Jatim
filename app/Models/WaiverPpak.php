<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaiverPpak extends Model
{
    protected $fillable = [
        'nama_universitas',
        'akreditasi',
        'jumlah_waiver'
    ];
}
