<?php

namespace App\Models;

use App\Traits\HasActivityLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DewanPengawas extends Model
{
    use HasFactory;
    use HasActivityLog;
    protected $table = 'dewan_pengawas';
    protected $fillable = ['nama', 'jabatan', 'gambar',];
}
