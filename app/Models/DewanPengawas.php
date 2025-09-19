<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DewanPengawas extends Model
{
    use HasFactory;
    protected $table = 'dewan_pengawas';
    protected $fillable = ['nama', 'jabatan', 'gambar',];
}
