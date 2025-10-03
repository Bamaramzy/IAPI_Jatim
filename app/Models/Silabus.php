<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Silabus extends Model
{
    protected $table = 'silabus';
    protected $fillable = [
        'kategori_utama',
        'sub_kategori',
        'judul',
        'deskripsi',
        'pdf_file',
        'pdf_link',
        'gambar',
        'gambar_link',
        'ilustrasi_link',
    ];
}
