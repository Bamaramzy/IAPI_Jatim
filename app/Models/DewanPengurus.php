<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DewanPengurus extends Model
{
    use HasFactory;
    protected $table = 'dewan_pengurus';
    protected $fillable = ['nama', 'jabatan', 'gambar',];
}
