<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JalurReguler extends Model
{
    protected $fillable =
    [
        'kategori',
        'judul',
        'konten',
        'file',
        'link'
    ];
}
