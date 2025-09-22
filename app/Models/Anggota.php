<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggotas';
    protected $fillable = [
        'no_urut',
        'no_reg_iapi',
        'nama_anggota',
        'izin_ap',
        'kategori',
        'nama_kap',
        'status_id',
        'korwil'
    ];
}
