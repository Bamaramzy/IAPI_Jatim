<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeraturanSpap extends Model
{
    use HasFactory;
    protected $table = 'peraturan_spap';
    protected $fillable = [
        'kategori',
        'judul',
        'deskripsi',
        'thumbnail',
        'pdf_1_judul',
        'pdf_1_url',
        'pdf_2_judul',
        'pdf_2_url',
        'pdf_3_judul',
        'pdf_3_url',
    ];
}
