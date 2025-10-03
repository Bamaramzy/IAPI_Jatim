<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeraturanProfesi extends Model
{
    protected $table = 'peraturan_profesi';
    protected $fillable = [
        'kategori',
        'judul',
        'file_path',
        'link_url',
    ];
}
