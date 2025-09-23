<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direktori extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'link_drive',
        'file_pdf',
        'cover',
        'status'
    ];
}
